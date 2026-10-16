#!/usr/bin/env node
/**
 * Bulk-import scraped ShopBase products (products_shopbase.json format) into
 * the theme's POD variant system via the wc-pod/v1/import/* endpoints
 * (inc/pod-variants/bulk-import.php). Same flow as scripts/pod-import.mjs.
 *
 * Source → POD mapping:
 *   - garment (Zip Up Hoodie, Bomber Jacket, …) read from the title → the
 *     product-type category (inc/product-categories.php) + SKU code
 *   - Size option → POD Size (the Style's size set, surcharges from SIZE_SURCHARGE)
 *   - Color option → POD Color (hex from COLOR_HEX, same palette as big_pod);
 *     without one every variant gets the hidden placeholder Color "none"
 *   - every other option (Service, Product Type, Style, Type, PACK, …) → POD
 *     Type (Style); several such options combine into "Army / Polo Shirt".
 *     None → the garment name. Each variant takes the mockups that follow its
 *     swatch image in `images` (Color swatch first, then the Style ones)
 *   - "Title" option (ShopBase "Default Title") is ignored
 *   - custom_options[].name (Name, Rank, Years Of Service, …) → product tags
 *   - collections → branch categories (army, navy, … — the header menu slugs)
 *
 * Usage:
 *   node scripts/proudlywear-import.mjs --dry-run                 # transform + stats only
 *   node scripts/proudlywear-import.mjs --dump payload.json       # write transformed payload
 *   node scripts/proudlywear-import.mjs --setup                   # sizes/styles/categories only
 *   node scripts/proudlywear-import.mjs                           # setup, then products
 *   node scripts/proudlywear-import.mjs --skip-setup              # products only
 *
 * Options:
 *   --file <a,b,…>       source JSON file(s), comma-separated (default: every
 *                        scripts/products_shopbase.json + products_shopbase_<n>.json, merged)
 *   --site <url>         store URL (default https://proudlywear.com)
 *   --batch <n>          products per request (default 25, max 100)
 *   --concurrency <n>    parallel requests (default 2)
 *   --limit <n>          only import the first n products (testing)
 *   --only <id,id>       only these source ids
 *   --state <path>       resume file (default proudlywear-import-state.json); done ids are skipped
 *   --force              ignore the state file and re-send everything (updates in place)
 *   --query-auth         send key/secret as query params (hosts that strip Authorization)
 *   --new-arrivals <n>   newest n source ids also get "New Arrivals" (default 200)
 */

import { readFileSync, writeFileSync, appendFileSync, existsSync, readdirSync } from 'node:fs';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

/* ---------------------------------------------------------------------
 * Args
 * ------------------------------------------------------------------ */

const args = process.argv.slice(2);
const flag = (name) => args.includes(`--${name}`);
const opt = (name, def) => {
  const i = args.indexOf(`--${name}`);
  return i >= 0 && args[i + 1] !== undefined ? args[i + 1] : def;
};

// WooCommerce REST API key (Read/Write). Env vars WC_KEY / WC_SECRET override these.
const WC_KEY = process.env.WC_KEY || 'ck_c2e569b8241c18c20319ad811ae4c6327035eaa8';
const WC_SECRET = process.env.WC_SECRET || 'cs_011ec7c5a6891a1c33e57179ace6c052cbe59305';
const SITE_URL = 'https://proudlywear.com';

// Source files: --file a.json,b.json, or every products_shopbase.json +
// products_shopbase_<n>.json next to this script (in numeric order). They are
// merged (deduped by id) before the transform, so Style size sets, SKUs and
// New Arrivals are computed over the whole catalog.
const SCRIPT_DIR = fileURLToPath(new URL('.', import.meta.url));
const FILES = opt('file', '')
  ? opt('file', '').split(',').map((s) => s.trim()).filter(Boolean)
  : readdirSync(SCRIPT_DIR)
    .map((f) => [f, f.match(/^products_shopbase(?:_(\d+))?\.json$/)])
    .filter(([, m]) => m)
    .sort((a, b) => (+(a[1][1] || 1)) - (+(b[1][1] || 1)))
    .map(([f]) => join(SCRIPT_DIR, f));
const SITE = (opt('site', SITE_URL) || '').replace(/\/+$/, '');
const BATCH = Math.min(100, parseInt(opt('batch', '25'), 10));
const CONCURRENCY = parseInt(opt('concurrency', '2'), 10);
const LIMIT = parseInt(opt('limit', '0'), 10);
const ONLY = opt('only', '') ? new Set(opt('only', '').split(',').map((s) => s.trim())) : null;
const STATE_FILE = opt('state', 'proudlywear-import-state.json');
const ERROR_LOG = STATE_FILE.replace(/\.json$/, '') + '-errors.jsonl';
const NEW_ARRIVALS = parseInt(opt('new-arrivals', '200'), 10);

/* ---------------------------------------------------------------------
 * Catalog config
 * ------------------------------------------------------------------ */

const SKU_PREFIX = 'PW';

const SIZES = [
  ['XS', 'xs'], ['S', 's'], ['M', 'm'], ['L', 'l'], ['XL', 'xl'], ['2XL', '2xl'],
  ['3XL', '3xl'], ['4XL', '4xl'], ['5XL', '5xl'], ['6XL', '6xl'], ['One Size', 'one-size'],
  ['Single', 'single'], ['Twin', 'twin'], ['Queen', 'queen'], ['King', 'king'], ['Super King', 'super-king'],
];
// The source only exposes one price per product, so oversize surcharges are
// ours: S–XL at the base price, +$2 for 2XL and +$1 per size above.
const SIZE_SURCHARGE = { xs: 0, s: 0, m: 0, l: 0, xl: 0, '2xl': 2, '3xl': 3, '4xl': 4, '5xl': 5, '6xl': 6, 'one-size': 0 };

// Garment, matched against the title in this order (zip hoodie before
// hoodie, sweatshirt before shirt, …). `category` is the product-type
// category slug from inc/product-categories.php; `name` is the Style used
// when a product has no Service option.
const GARMENTS = [
  { key: 'zip-hoodie', re: /zip[\s-]*(up\s+)?hoodie/i, name: 'Zip Up Hoodie', code: 'ZHD', category: 'hoodies' },
  { key: 'hoodie', re: /hoodie/i, name: 'Hoodie', code: 'HD', category: 'hoodies' },
  { key: 'bomber-jacket', re: /bomber/i, name: 'Bomber Jacket', code: 'BMB', category: 'bomber-jackets' },
  { key: 'sweatshirt', re: /sweatshirt/i, name: 'Sweatshirt', code: 'SWT', category: 'sweatshirts' },
  { key: 'polo', re: /polo/i, name: 'Polo Shirt', code: 'POLO', category: 'polo-shirts' },
  // Before t-shirt: "Hawaiian Shirt" would otherwise match \bshirt\b.
  { key: 'hawaiian-shirt', re: /hawaii/i, name: 'Hawaiian Shirt', code: 'HAW', category: 'hawaiian-shirts' },
  { key: 't-shirt', re: /t-?shirt|\btee\b|\bshirt\b/i, name: 'T-Shirt', code: 'TEE', category: 't-shirts' },
  { key: 'cap', re: /\bcap\b|\bhat\b/i, name: 'Cap', code: 'CAP', category: 'caps' },
  { key: 'flag', re: /\bflag\b/i, name: 'Flag', code: 'FLAG', category: 'flags' },
  { key: 'metal-sign', re: /metal sign|tin sign/i, name: 'Metal Sign', code: 'SIGN', category: 'metal-signs' },
  // Added after the first import: kept below the originals so products that
  // already matched one of the entries above keep their garment/SKU.
  // sizeless: no Size (One Size, hidden on the product page); a Size option
  // in the source (phone models "Ip 8", "Ip X"…) becomes part of the Style.
  { key: 'phone-case', re: /phone\s*case|\bip\s*case/i, name: 'Phone Case', code: 'PHC', category: 'phone-cases', sizeless: true },
  { key: 'car-seat-cover', re: /car\s*seat/i, name: 'Car Seat Covers', code: 'CSC', category: 'accessories' },
  { key: 'leather-vest', re: /\bvests?\b/i, name: 'Leather Vest', code: 'VEST', category: 'jackets-vests' },
  { key: 'jacket', re: /\bjackets?\b/i, name: 'Leather Jacket', code: 'LJKT', category: 'jackets-vests' },
  { key: 'jersey', re: /\bjerseys?\b/i, name: 'Baseball Jersey', code: 'JRSY', category: 'baseball-jerseys' },
  { key: 'hats', re: /\bcaps\b|\bhats\b/i, name: 'Cap', code: 'CAP', category: 'caps' },
  { key: 'flags', re: /\bflags\b/i, name: 'Flag', code: 'FLAG', category: 'flags' },
  { key: 'sweater', re: /\bsweaters?\b/i, name: 'Sweater', code: 'SWTR', category: 'sweatshirts' },
  { key: 'tank-top', re: /tank\s*top|legging/i, name: 'Tank Top & Legging', code: 'TANK', category: 't-shirts' },
  { key: 'shirts', re: /\bshirts\b|hawaii/i, name: 'T-Shirt', code: 'TEE', category: 't-shirts' },
  { key: 'bedding', re: /bedding|quilt|duvet/i, name: 'Bedding Set', code: 'BED', category: 'home-decor' },
  { key: 'canvas', re: /\bcanvas\b/i, name: 'Canvas', code: 'CNV', category: 'home-decor' },
  { key: 'doormat', re: /door\s*mat/i, name: 'Doormat', code: 'MAT', category: 'home-decor' },
  { key: 'ornament', re: /\bornaments?\b/i, name: 'Ornament', code: 'ORN', category: 'home-decor' },
  { key: 'tumbler', re: /\btumblers?\b/i, name: 'Tumbler', code: 'TMB', category: 'drinkware' },
  { key: 'mug', re: /\bmugs?\b/i, name: 'Mug', code: 'MUG', category: 'drinkware' },
  { key: 'dog-tag', re: /dog\s*tags?/i, name: 'Dog Tag', code: 'TAG', category: 'accessories' },
  { key: 'necklace', re: /\bnecklaces?\b/i, name: 'Necklace', code: 'NCK', category: 'accessories' },
  { key: 'decal', re: /\bdecals?\b|\bstickers?\b/i, name: 'Decal', code: 'DCL', category: 'accessories' },
  { key: 'mask', re: /\bmasks?\b/i, name: 'Face Mask', code: 'MASK', category: 'accessories' },
  { key: 'wood-sign', re: /wood\s*signs?|wreath/i, name: 'Wood Sign', code: 'WSGN', category: 'home-decor' },
];
// Products whose title matched one of the original 9 entries were imported by
// the first version of this script; their Style names/size sets and SKUs must
// not change (see transform()). Hawaiian shirts were part of t-shirt then, so
// they stay core and keep weighting the Style size sets as before.
const CORE_KEYS = ['zip-hoodie', 'hoodie', 'bomber-jacket', 'sweatshirt', 'polo', 'hawaiian-shirt', 't-shirt', 'cap', 'flag', 'metal-sign'];
const CORE_GARMENTS = new Set(GARMENTS.filter((g) => CORE_KEYS.includes(g.key)));
// Title without a garment word ("… Collection", "Unique Lest We Forget …"):
// try the ShopBase collections ("U.S.Army Cap", "Hoodie & Zip Up Hoodies"),
// then the option values (Type: Zip Hoodie/Cap), then the handle; apparel
// sizes → T-Shirt, anything else → a generic gift.
const FALLBACK_APPAREL = GARMENTS.find((g) => g.key === 't-shirt');
const FALLBACK_GIFT = { key: 'gift', name: 'Veteran Gift', code: 'GIFT', category: 'accessories' };

// ShopBase collection → branch category, first match wins per collection.
// Slugs match the header's "Shop by Branch" menu.
const BRANCHES = [
  { re: /space\s*force/i, slug: 'space-force', name: 'Space Force Veterans' },
  { re: /coast\s*guard/i, slug: 'coast-guard', name: 'Coast Guard Veterans' },
  { re: /marine/i, slug: 'marine-corps', name: 'Marine Veterans' },
  { re: /air\s*force/i, slug: 'air-force', name: 'Air Force Veterans' },
  { re: /navy/i, slug: 'navy', name: 'Navy Veterans' },
  { re: /army/i, slug: 'army', name: 'Army Veterans' },
  { re: /vietnam/i, slug: 'vietnam-veteran', name: 'Vietnam Veterans' },
  { re: /^u\.?s\.?\s*veterans?$/i, slug: 'us-veteran', name: 'U.S. Veterans' },
];

// Option value cleanup ("Army2" is a second Army design, not a typo).
const VALUE_ALIASES = {
  Army2: 'Army II', Marine2: 'Marine II', 'Air Force2': 'Air Force II', Navy2: 'Navy II',
  'Coast Guard2': 'Coast Guard II', 'Space Force2': 'Space Force II',
};
// Products without a Color option still need one per variant row: the theme
// hides this slug everywhere (pod_is_placeholder_color()).
const PLACEHOLDER_COLOR = { name: 'None', slug: 'none' };

// Color palette shared with big_pod (scripts/pod-import.mjs) + the extra
// names this source uses. Unlisted names (Color1, Marine 2, …) get no hex.
const COLOR_ALIASES = { Pupple: 'Purple', Cayon: 'Cyan', Skyblue: 'Sky Blue' };
const COLOR_HEX = {
  Black: '#1B1B1B', White: '#F5F5F2', Apricot: '#F2C9A0', 'Rose Red': '#C2185B', Coffee: '#6F4E37',
  Grey: '#8E8E8E', Gray: '#8A8A8A', 'Dark Gray': '#4A4A4A', 'Light Grey': '#C9C9C9', 'Light Gray': '#C9C9C9',
  Pink: '#F4A7B9', 'Army Green': '#4B5320', 'Military Green': '#5B5F3A', 'Grass Green': '#4CAF50',
  Green: '#2E7D32', 'Dark Green': '#1E4D2B', Purple: '#6A3D9A', 'Purple Haze': '#8E7CC3', Brown: '#7B4B2A',
  'Light Brown': '#A9805B', Blue: '#2D5DA8', 'Light Blue': '#9CC3E6', 'Sky Blue': '#87CEEB', 'Dark Blue': '#1F2F5C',
  'Denim Blue': '#4A6A8C', Navy: '#1C2541', Khaki: '#C3B091', Sand: '#D8C8A8', Carbon: '#3B3B3B',
  'Wine Red': '#722F37', Watermelon: '#F0566A', 'Ancora Red': '#B3262D', Cherry: '#9B111E',
  Yellow: '#F2C94C', Orange: '#F2994A', 'Pirate Gray': '#5E6064',
  Red: '#C62828', Cyan: '#26C6DA', Violet: '#7E57C2', Silver: '#BDBDBD', Gold: '#C9A227', 'Old Green': '#556B2F',
};

// Custom-option names → one tag per field, whatever the wording/casing.
const TAG_ALIASES = { name: 'Name', rank: 'Rank', 'years of service': 'Years Of Service' };

/* ---------------------------------------------------------------------
 * Transform
 * ------------------------------------------------------------------ */

const decode = (s) => String(s)
  .replace(/&#8217;|&#039;|&#39;/g, '’').replace(/&#8211;/g, '–').replace(/&amp;/g, '&')
  .replace(/&quot;/g, '"').replace(/&#(\d+);/g, (_, n) => String.fromCharCode(+n));

const slugify = (s) => decode(s).toLowerCase().replace(/['’]/g, '').replace(/&/g, ' ')
  .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');

const isSizeOption = (o) => /^size$/i.test(o.name.trim());
const isColorOption = (o) => /^colou?r$/i.test(o.name.trim());
const isTitleOption = (o) => /^(default\s+)?title$/i.test(o.name.trim())
  || (o.values || []).every((v) => /^default title$/i.test(String(v.name).trim()));

const cleanName = (title) => decode(title).replace(/\s+/g, ' ').trim().replace(/\.+$/, '');
// Option values: drop control chars (a "\bRed" exists), nbsp → space.
const cleanValue = (s) => decode(s).replace(/[\u0000-\u001f\u007f]/g, '').replace(/\s+/g, ' ').trim();

// One spelling per size: ″ → ", "House Flag (29.5" x 39.5")" / "House Flag : …"
// → "House Flag: …", "3ft x 5ft (36x60in)" → "(36in x 60in)", "TWIN" → "Twin".
function cleanSize(raw) {
  let s = cleanValue(raw).replace(/[″“”]/g, '"').replace(/\s*:\s*/, ': ');
  s = s.replace(/^((?:House|Garden) Flag) \((.+)\)$/i, '$1: $2');
  s = s.replace(/\((\d+)x(\d+)in\)$/i, '($1in x $2in)').replace(/\s*\(DHL Shipping\)$/i, '');
  if (/^[A-Z ]{4,}$/.test(s)) s = s.toLowerCase().replace(/\b\w/g, (c) => c.toUpperCase());
  return s;
}

function cleanTag(raw) {
  const s = cleanValue(raw).replace(/\(\s*(required|e\.g\b[^)]*)\s*\)/gi, '').replace(/\s+/g, ' ').trim();
  return TAG_ALIASES[s.toLowerCase()] || s;
}

// Size families. ShopBase lists one flat Size option even when the Style
// values need different sets (Product Type "Polo Shirt" + "Quilt Bedding Set"
// with S…5XL + Twin…King), so a product's sizes are split per family and each
// Style value takes only its own family's sizes.
const APPAREL_SIZES = new Set(['xs', 's', 'm', 'l', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', 'normal', 'one-size']);
const BED_SIZES = new Set(['single', 'twin', 'queen', 'king', 'super-king']);
const sizeFamily = (slug) => (APPAREL_SIZES.has(slug) ? 'apparel' : BED_SIZES.has(slug) ? 'bed' : 'other');
const valueFamily = (name) => (/bed|quilt|blanket/i.test(name) ? 'bed' : /flag|pillow|sign/i.test(name) ? 'other' : 'apparel');

// Suffix that tells apart a Style name reused with another size set
// ("Army" on hoodies vs "Army (Flag)" on flags); a size range when the
// family label says nothing new ("Army (S–6XL)").
function sizeSetLabel(slugs, names, garment, base) {
  const has = (re) => slugs.some((s) => re.test(s));
  const range = names.length > 1 ? `${names[0]}–${names.at(-1)}` : names[0];
  let label = garment;
  if (slugs.every((s) => BED_SIZES.has(s))) label = 'Bedding';
  else if (has(/^\dft/) && has(/^(house|garden)-flag/)) label = 'Flag Set';
  else if (has(/^\dft|^horizontal/)) label = 'Flag';
  else if (has(/^(house|garden)-flag/)) label = 'House & Garden Flag';
  else if (slugs.every((s) => APPAREL_SIZES.has(s)) && slugs.length > 1) label = range;
  return label === base ? range : label;
}

// pod_variants.sku is VARCHAR(64): longer ones ("…-SET-3-PAY-FOR-2-BLUE-RED-GRAY-
// FREESHIPPING") fail with db_error, so cut them and keep them distinct with a hash.
function fitSku(sku) {
  if (sku.length <= 64) return sku;
  let h = 0;
  for (const c of sku) h = (h * 31 + c.charCodeAt(0)) >>> 0;
  return `${sku.slice(0, 57).replace(/-+$/, '')}-${h.toString(36).toUpperCase().padStart(6, '0').slice(0, 6)}`;
}

// Cartesian product of value lists: [[a,b],[x]] → [[a,x],[b,x]].
const combine = (lists) => lists.reduce((acc, list) => acc.flatMap((head) => list.map((v) => [...head, v])), [[]]);

// Design code in the title, e.g. "… Zip Up Hoodie BTTN131021, …" → BTTN131021.
const designCode = (title) => (title.match(/\b([A-Z]{3,5}\d{5,8})\b/) || [])[1] || '';

// → [garment, core]; core = matched by title with an original entry.
function findGarment(p, title) {
  const byTitle = GARMENTS.find((x) => x.re.test(title));
  if (byTitle) return [byTitle, CORE_GARMENTS.has(byTitle)];
  // The garment most of its collections name ("U.S.Army Cap", "U.S.Navy Cap",
  // "Hoodie & Zip Up Hoodies" → Cap); ties go to the GARMENTS order.
  const votes = new Map();
  for (const c of p.collections || []) {
    const g = GARMENTS.find((x) => x.re.test(decode(c)));
    if (g) votes.set(g, (votes.get(g) || 0) + 1);
  }
  if (votes.size) return [[...votes].sort((a, b) => b[1] - a[1] || GARMENTS.indexOf(a[0]) - GARMENTS.indexOf(b[0]))[0][0], false];
  const optionText = (p.options || []).filter((o) => !isSizeOption(o) && !isColorOption(o))
    .flatMap((o) => o.values.map((v) => v.name)).join(' ');
  for (const text of [optionText, (p.handle || '').replace(/-/g, ' ')]) {
    const g = text && GARMENTS.find((x) => x.re.test(text));
    if (g) return [g, false];
  }
  const sizeOpt = (p.options || []).find(isSizeOption);
  const apparel = sizeOpt && sizeOpt.values.some((v) => APPAREL_SIZES.has(slugify(cleanSize(v.name))));
  return [apparel ? FALLBACK_APPAREL : FALLBACK_GIFT, false];
}

function transform(source) {
  const newest = new Set([...source].sort((a, b) => (b.id > a.id ? 1 : -1)).slice(0, NEW_ARRIVALS).map((p) => String(p.id)));
  const categories = new Map(); // slug → {name, slug, parent}
  // Size order = setup order (SIZES, then first seen), so the same set listed
  // in another order ("Garden, House" / "House, Garden") is one set.
  const knownOrder = SIZES.map(([, slug]) => slug);
  const sizeRank = (slug) => (knownOrder.includes(slug) ? knownOrder.indexOf(slug) : knownOrder.length + [...sizeNames.keys()].indexOf(slug));
  const styleSets = new Map(); // base Style name → Map(size-set key → {sizes, count, garment})
  const sizeNames = new Map(); // size slug → display name
  const colorNames = new Set();
  const unmappedCollections = new Map();
  const usedSkus = new Set();
  const products = [];
  const skipped = [];

  // Core products (importable by the first version) go first, in source
  // order, so their sizes, SKUs and Style names come out exactly as before;
  // the products added later only append to them.
  const picked = source.map((p) => [p, ...findGarment(p, cleanName(p.title || ''))]);
  for (const [p, garment, core] of [...picked.filter((x) => x[2]), ...picked.filter((x) => !x[2])]) {
    const id = String(p.id);
    const title = cleanName(p.title || '');
    if (!title) { skipped.push([id, 'no title']); continue; }
    if (!(p.price > 0)) { skipped.push([id, 'no price']); continue; }

    const catSlugs = [garment.category];
    for (const raw of p.collections || []) {
      const name = decode(raw).trim();
      const branch = BRANCHES.find((b) => b.re.test(name));
      if (!branch) { unmappedCollections.set(name, (unmappedCollections.get(name) || 0) + 1); continue; }
      categories.set(branch.slug, { name: branch.name, slug: branch.slug, parent: '' });
      catSlugs.push(branch.slug);
    }
    if (newest.has(id)) catSlugs.push('new-arrivals');

    const options = (p.options || []).filter((o) => o.values?.length && !isTitleOption(o));
    const sizeOpt = garment.sizeless ? null : options.find(isSizeOption);
    const colorOpt = options.find(isColorOption);
    let styleOpts = options.filter((o) => o !== sizeOpt && !isColorOption(o));
    // Sizeless: a lone "Product Type: Ip Case" says nothing next to the models.
    if (garment.sizeless && styleOpts.length > 1) styleOpts = styleOpts.filter((o) => o.values.length > 1);

    const sizes = [];
    for (const v of sizeOpt ? sizeOpt.values : [{ name: 'One Size' }]) {
      const name = cleanSize(v.name);
      const slug = slugify(name);
      if (!slug || sizes.includes(slug)) continue;
      if (!sizeNames.has(slug)) sizeNames.set(slug, name);
      sizes.push(slug);
    }

    // Each swatch image (of any option) starts its own block of mockups in
    // `images`, running up to the next swatch's image. An option with no
    // swatches but one image per value maps them by position.
    const srcs = (p.images || []).map((i) => i.src).filter(Boolean);
    if (!srcs.length) { skipped.push([id, 'no images']); continue; }
    const starts = [...new Set(options.flatMap((o) => o.values.map((v) => srcs.indexOf(v.image))))]
      .filter((i) => i >= 0).sort((a, b) => a - b);
    const blockOf = (opt, idx) => {
      const v = opt.values[idx];
      const start = srcs.indexOf(v.image);
      if (start >= 0) return srcs.slice(start, starts.find((i) => i > start) ?? srcs.length);
      if (!opt.values.some((x) => x.image) && opt.values.length === srcs.length) return [srcs[idx]];
      return null;
    };

    const code = designCode(p.title || '');
    let sku = code ? `${SKU_PREFIX}-${code}` : `${SKU_PREFIX}-${id}`;
    if (usedSkus.has(sku)) sku = `${SKU_PREFIX}-${id}`;
    usedSkus.add(sku);

    // [option, value index] pairs; Style combos × Colors = variant rows.
    const styleCombos = styleOpts.length
      ? combine(styleOpts.map((o) => o.values.map((_, i) => [o, i])))
      : [[]];
    const colorPicks = colorOpt ? colorOpt.values.map((_, i) => [colorOpt, i]) : [null];

    const families = new Set(sizes.map(sizeFamily));
    const seen = new Set();
    const variants = [];
    for (const combo of styleCombos) {
      const names = combo.map(([o, i]) => { const n = cleanValue(o.values[i].name); return VALUE_ALIASES[n] || n; });
      let style = combo.length ? names.join(' / ') : garment.name;
      // Sizeless styles share the one-size set with caps, so a bare "Army"
      // would show as "Army (Cap)": name them "Army Phone Case", "iPhone 12".
      if (garment.sizeless && combo.length) {
        style = combo.map(([o], k) => (isSizeOption(o) ? names[k].replace(/^ip\b/i, 'iPhone') : `${names[k]} ${garment.name}`)).join(' / ');
      }
      if (!style) continue;

      let comboSizes = sizes;
      if (families.size > 1) {
        const fam = valueFamily(`${names.join(' ')} ${families.has('apparel') && !names.length ? garment.name : ''}`);
        const own = sizes.filter((s) => sizeFamily(s) === fam);
        if (own.length) comboSizes = own;
      }
      comboSizes = [...comboSizes].sort((a, b) => sizeRank(a) - sizeRank(b));
      const setKey = comboSizes.join(',');
      if (!styleSets.has(style)) styleSets.set(style, new Map());
      const sets = styleSets.get(style);
      if (!sets.has(setKey)) sets.set(setKey, { sizes: comboSizes, count: 0, lateCount: 0, garment: garment.name });
      sets.get(setKey)[core ? 'count' : 'lateCount']++;

      for (const pick of colorPicks) {
        const rawColor = pick ? cleanValue(pick[0].values[pick[1]].name) : PLACEHOLDER_COLOR.name;
        const color = COLOR_ALIASES[rawColor] || rawColor;
        const key = `${style.toLowerCase()}|${color.toLowerCase()}`;
        if (!color || seen.has(key)) continue;
        seen.add(key);

        let images = null;
        for (const [o, i] of pick ? [pick, ...combo] : combo) if (!images) images = blockOf(o, i);

        if (pick) colorNames.add(color);
        // type + sku are finalised below, once every product's size sets are known.
        variants.push({
          type: style,
          color,
          price: p.price,
          sku: `${sku}-${garment.code}`,
          image_urls: images || srcs,
          _setKey: setKey,
          _colorSku: pick ? `-${slugify(color).toUpperCase()}` : '',
        });
      }
    }

    const tags = [];
    for (const c of p.custom_options || []) {
      const tag = cleanTag(c.name || '');
      if (tag && !tags.some((t) => t.toLowerCase() === tag.toLowerCase())) tags.push(tag);
    }
    if (!variants.length) { skipped.push([id, 'no usable variants']); continue; }

    products.push({
      source_id: id,
      name: title,
      sku,
      categories: [...new Set(catSlugs)],
      tags,
      // images[0] is the store's featured shot (all designs together).
      image: srcs[0] || variants[0].image_urls[0],
      // Descriptions come from the category-level shared text; empty strings
      // clear per-product ones left by older imports.
      description: '',
      short_description: '',
      variants,
    });
  }

  // A POD Style has one global size set, so a Style name used with several
  // size sets is split: the most-used set keeps the plain name, the others
  // get a suffix ("Army (Flag)", "Polo Shirt (Bedding)").
  const styleName = new Map(); // `${base}|${setKey}` → final name
  const styleSizes = new Map(); // final name → size slugs (insertion order = setup sort order)
  const styleSlugs = new Map(); // final name's slug → size-set key
  // Two passes: size sets used by core products are named by core usage only
  // (= the names already on the site); sets only the later products use are
  // named afterwards and never take over an existing name.
  for (const late of [false, true]) {
    for (const [base, sets] of styleSets) {
      const ranked = [...sets].filter(([, s]) => (late ? !s.count : s.count))
        .sort((a, b) => (late ? b[1].lateCount - a[1].lateCount : b[1].count - a[1].count));
      for (const [n, [setKey, set]] of ranked.entries()) {
        const label = sizeSetLabel(set.sizes, set.sizes.map((s) => sizeNames.get(s)), set.garment, base);
        // Styles are upserted by slug, so a new "Army (Cap)" must not land on
        // the existing "Army Cap". The core pass keeps the original name-only
        // check so the names already on the site don't move.
        const taken = (nm) => (late
          ? styleSlugs.has(slugify(nm)) && styleSlugs.get(slugify(nm)) !== setKey
          : styleSizes.has(nm) && styleSizes.get(nm).join(',') !== setKey);
        let name = n === 0 && !(late && taken(base)) ? base : `${base} (${label})`;
        for (let k = 2; taken(name); k++) name = `${base} (${label} ${k})`;
        styleName.set(`${base}|${setKey}`, name);
        styleSizes.set(name, set.sizes);
        styleSlugs.set(slugify(name), setKey);
      }
    }
  }
  for (const p of products) {
    for (const v of p.variants) {
      v.type = styleName.get(`${v.type}|${v._setKey}`);
      v.sku = fitSku(`${v.sku}-${slugify(v.type).toUpperCase()}${v._colorSku}`);
      delete v._setKey;
      delete v._colorSku;
    }
  }

  // Oldest first so the newest designs end up with the newest post dates.
  products.sort((a, b) => (BigInt(a.source_id) < BigInt(b.source_id) ? -1 : 1));

  categories.set('new-arrivals', { name: 'New Arrivals', slug: 'new-arrivals', parent: '' });
  categories.set('best-seller', { name: 'Best Sellers', slug: 'best-seller', parent: '' });

  const knownSizes = new Set(SIZES.map(([, slug]) => slug));
  const extraSizes = [...sizeNames].filter(([slug]) => !knownSizes.has(slug)).map(([slug, name]) => [name, slug]);

  const setup = {
    sizes: [...SIZES, ...extraSizes].map(([name, slug], i) => ({ name, slug, sort_order: i + 1 })),
    colors: [
      { ...PLACEHOLDER_COLOR, hex: null, sort_order: 0 },
      ...[...colorNames].map((name, i) => ({ name, slug: slugify(name), hex: COLOR_HEX[name] || null, sort_order: i + 1 })),
    ],
    // Each Style has exactly the size set of the products using it.
    types: [...styleSizes.entries()].map(([name, sizes], i) => ({
      name,
      slug: slugify(name),
      sort_order: i + 1,
      sizes: Object.fromEntries([...sizes].map((s) => [s, SIZE_SURCHARGE[s] ?? 0])),
    })),
    // Product-type categories are created by inc/product-categories.php; only
    // branch + merchandising categories are sent here (all top level).
    categories: [...categories.values()],
  };

  return { setup, products, skipped, unmappedCollections };
}

/* ---------------------------------------------------------------------
 * HTTP
 * ------------------------------------------------------------------ */

async function post(path, body, attempt = 1) {
  const key = WC_KEY;
  const secret = WC_SECRET;
  if (!SITE || !key || !secret) {
    throw new Error('Set WC_KEY / WC_SECRET (env or top of scripts/proudlywear-import.mjs) — WooCommerce REST API key, Read/Write.');
  }
  let url = `${SITE}/wp-json/wc-pod/v1${path}`;
  const headers = { 'Content-Type': 'application/json' };
  if (flag('query-auth')) {
    url += `?consumer_key=${encodeURIComponent(key)}&consumer_secret=${encodeURIComponent(secret)}`;
  } else {
    headers.Authorization = 'Basic ' + Buffer.from(`${key}:${secret}`).toString('base64');
  }

  try {
    const res = await fetch(url, { method: 'POST', headers, body: JSON.stringify(body), signal: AbortSignal.timeout(300000) });
    const text = await res.text();
    let json;
    try { json = JSON.parse(text); } catch { json = null; }
    if (!res.ok || !json) {
      const err = new Error(`HTTP ${res.status}: ${text.slice(0, 300)}`);
      err.status = res.status;
      throw err;
    }
    return json;
  } catch (e) {
    const retryable = !e.status || e.status >= 500 || e.status === 429;
    if (retryable && attempt < 5) {
      const wait = 2000 * attempt * attempt;
      console.warn(`  retry ${attempt} in ${wait / 1000}s: ${e.message}`);
      await new Promise((r) => setTimeout(r, wait));
      return post(path, body, attempt + 1);
    }
    throw e;
  }
}

/* ---------------------------------------------------------------------
 * Main
 * ------------------------------------------------------------------ */

if (!FILES.length) throw new Error('No source files (scripts/products_shopbase*.json or --file).');
const sourceById = new Map();
for (const f of FILES) {
  const rows = JSON.parse(readFileSync(f, 'utf8'));
  let added = 0;
  for (const p of rows) if (!sourceById.has(String(p.id))) { sourceById.set(String(p.id), p); added++; }
  console.log(`  ${f.split('/').pop()}: ${rows.length} products${added < rows.length ? ` (${rows.length - added} duplicate ids)` : ''}`);
}
const source = [...sourceById.values()];
const { setup, products: allProducts, skipped, unmappedCollections } = transform(source);

let products = ONLY ? allProducts.filter((p) => ONLY.has(p.source_id)) : allProducts;
if (LIMIT) products = products.slice(0, LIMIT);

const variantCount = products.reduce((n, p) => n + p.variants.length, 0);
const byType = {};
for (const p of products) byType[p.categories[0]] = (byType[p.categories[0]] || 0) + 1;
console.log(`Source: ${source.length} | importable: ${allProducts.length} | selected: ${products.length} | variants: ${variantCount} | skipped: ${skipped.length}`);
console.log('By garment:', byType);
console.log(`Setup: ${setup.sizes.length} sizes, ${setup.colors.length} colors, ${setup.types.length} styles, ${setup.categories.length} categories`);
const tagCount = {};
for (const p of products) for (const t of p.tags) tagCount[t] = (tagCount[t] || 0) + 1;
console.log('Tags:', tagCount);
if (skipped.length) console.log('Skipped:', skipped.map(([id, why]) => `${id} (${why})`).join(', '));
if (unmappedCollections.size) console.log('Collections without a category:', Object.fromEntries(unmappedCollections));

if (opt('dump', '')) {
  writeFileSync(opt('dump', ''), JSON.stringify({ setup, products }, null, 1));
  console.log(`Wrote ${opt('dump', '')}`);
}
if (flag('dry-run') || opt('dump', '')) process.exit(0);

// Sizes + per-Style size surcharges only come from /import/setup (the product
// endpoint auto-creates Styles without sizes), so it always runs first —
// it upserts by slug, so repeating it is safe.
if (!flag('skip-setup')) {
  const report = await post('/import/setup', setup);
  for (const [k, rows] of Object.entries(report)) {
    const errs = rows.filter((r) => r.status === 'error' || r.missing_sizes);
    console.log(`  ${k}: ${rows.length} rows${errs.length ? `, problems: ${JSON.stringify(errs)}` : ''}`);
  }
  console.log('Setup done.');
  if (flag('setup')) process.exit(0);
}

const state = !flag('force') && existsSync(STATE_FILE) ? JSON.parse(readFileSync(STATE_FILE, 'utf8')) : { done: {} };
const todo = products.filter((p) => !state.done[p.source_id]);
const batches = [];
for (let i = 0; i < todo.length; i += BATCH) batches.push(todo.slice(i, i + BATCH));
console.log(`To import: ${todo.length} products in ${batches.length} batches (${products.length - todo.length} already done)`);

const saveState = () => writeFileSync(STATE_FILE, JSON.stringify(state));
let next = 0;
let ok = 0;
let failed = 0;
const started = Date.now();

async function worker() {
  while (next < batches.length) {
    const n = next++;
    const batch = batches[n];
    try {
      const { results } = await post('/import/products', { products: batch });
      for (const r of results) {
        if (r.status === 'created' || r.status === 'updated') {
          state.done[r.source_id] = r.product_id;
          ok++;
        } else {
          failed++;
          appendFileSync(ERROR_LOG, JSON.stringify(r) + '\n');
          if (r.status === 'partial') state.done[r.source_id] = r.product_id;
        }
      }
    } catch (e) {
      failed += batch.length;
      appendFileSync(ERROR_LOG, JSON.stringify({ batch: batch.map((p) => p.source_id), error: e.message }) + '\n');
      console.error(`  batch ${n + 1} failed: ${e.message}`);
    }
    saveState();
    const done = ok + failed;
    const rate = done / ((Date.now() - started) / 1000);
    const eta = rate > 0 ? Math.round((todo.length - done) / rate / 60) : '?';
    console.log(`  batch ${n + 1}/${batches.length} — ok ${ok}, failed ${failed}, ${rate.toFixed(1)}/s, ETA ${eta} min`);
  }
}

await Promise.all(Array.from({ length: CONCURRENCY }, worker));
console.log(`Finished: ${ok} ok, ${failed} failed${failed ? ` (see ${ERROR_LOG})` : ''}.`);
