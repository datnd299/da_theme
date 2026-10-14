#!/usr/bin/env node
/**
 * Bulk-import scraped ShopBase products (products_shopbase.json format) into
 * the theme's POD variant system via the wc-pod/v1/import/* endpoints
 * (inc/pod-variants/bulk-import.php). Same flow as scripts/pod-import.mjs.
 *
 * Source → POD mapping:
 *   - garment (Zip Up Hoodie, Bomber Jacket, …) read from the title → the
 *     product-type category (inc/product-categories.php) + SKU code
 *   - first non-Size option (ShopBase "Service": Army, Navy, …) → POD Type
 *     (Style), each with the 3 mockups that follow its swatch image in `images`
 *   - no colour: every variant gets the hidden placeholder Color "none"
 *   - Size option → the Style's size set (surcharges from SIZE_SURCHARGE)
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
 *   --file <path>        source JSON (default scripts/products_shopbase.json)
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

import { readFileSync, writeFileSync, appendFileSync, existsSync } from 'node:fs';
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

const FILE = opt('file', fileURLToPath(new URL('./products_shopbase.json', import.meta.url)));
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
  { key: 't-shirt', re: /t-?shirt|\btee\b|\bshirt\b/i, name: 'T-Shirt', code: 'TEE', category: 't-shirts' },
  { key: 'cap', re: /\bcap\b|\bhat\b/i, name: 'Cap', code: 'CAP', category: 'caps' },
  { key: 'flag', re: /\bflag\b/i, name: 'Flag', code: 'FLAG', category: 'flags' },
  { key: 'metal-sign', re: /metal sign|tin sign/i, name: 'Metal Sign', code: 'SIGN', category: 'metal-signs' },
];

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
// The source has no colour, but variant rows need one: the theme hides this
// slug everywhere (pod_is_placeholder_color()).
const PLACEHOLDER_COLOR = { name: 'None', slug: 'none' };

/* ---------------------------------------------------------------------
 * Transform
 * ------------------------------------------------------------------ */

const decode = (s) => String(s)
  .replace(/&#8217;|&#039;|&#39;/g, '’').replace(/&#8211;/g, '–').replace(/&amp;/g, '&')
  .replace(/&quot;/g, '"').replace(/&#(\d+);/g, (_, n) => String.fromCharCode(+n));

const slugify = (s) => decode(s).toLowerCase().replace(/['’]/g, '').replace(/&/g, ' ')
  .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');

const isSizeOption = (o) => /^size$/i.test(o.name.trim());

const cleanName = (title) => decode(title).replace(/\s+/g, ' ').trim().replace(/\.+$/, '');

// Design code in the title, e.g. "… Zip Up Hoodie BTTN131021, …" → BTTN131021.
const designCode = (title) => (title.match(/\b([A-Z]{3,5}\d{5,8})\b/) || [])[1] || '';

function transform(source) {
  const newest = new Set([...source].sort((a, b) => (b.id > a.id ? 1 : -1)).slice(0, NEW_ARRIVALS).map((p) => String(p.id)));
  const categories = new Map(); // slug → {name, slug, parent}
  const styleSizes = new Map(); // Style name → Set(size slug), in first-seen order
  const unmappedCollections = new Map();
  const usedSkus = new Set();
  const products = [];
  const skipped = [];

  for (const p of source) {
    const id = String(p.id);
    const title = cleanName(p.title || '');
    if (!title) { skipped.push([id, 'no title']); continue; }
    if (!(p.price > 0)) { skipped.push([id, 'no price']); continue; }

    const garment = GARMENTS.find((g) => g.re.test(title));
    if (!garment) { skipped.push([id, 'unknown garment']); continue; }

    const catSlugs = [garment.category];
    for (const raw of p.collections || []) {
      const name = decode(raw).trim();
      const branch = BRANCHES.find((b) => b.re.test(name));
      if (!branch) { unmappedCollections.set(name, (unmappedCollections.get(name) || 0) + 1); continue; }
      categories.set(branch.slug, { name: branch.name, slug: branch.slug, parent: '' });
      catSlugs.push(branch.slug);
    }
    if (newest.has(id)) catSlugs.push('new-arrivals');

    const sizeOpt = (p.options || []).find(isSizeOption);
    const sizes = sizeOpt ? sizeOpt.values.map((v) => slugify(v.name)) : ['one-size'];

    // Service option → POD Styles. Each swatch image starts its own block of
    // mockups in `images`, running up to the next swatch's image.
    const srcs = (p.images || []).map((i) => i.src).filter(Boolean);
    const styleOpt = (p.options || []).find((o) => !isSizeOption(o));
    const values = styleOpt?.values?.length ? styleOpt.values : [{ name: garment.name, image: srcs[0] || '' }];
    const starts = values.map((v) => srcs.indexOf(v.image)).filter((i) => i >= 0).sort((a, b) => a - b);

    const code = designCode(p.title || '');
    let sku = code ? `${SKU_PREFIX}-${code}` : `${SKU_PREFIX}-${id}`;
    if (usedSkus.has(sku)) sku = `${SKU_PREFIX}-${id}`;
    usedSkus.add(sku);

    const seen = new Set();
    const variants = [];
    for (const v of values) {
      const style = VALUE_ALIASES[v.name.trim()] || v.name.trim();
      if (!style || seen.has(style)) continue;
      const start = srcs.indexOf(v.image);
      const end = starts.find((i) => i > start) ?? srcs.length;
      const images = start >= 0 ? srcs.slice(start, end) : (v.image ? [v.image] : []);
      if (!images.length) continue;
      seen.add(style);
      if (!styleSizes.has(style)) styleSizes.set(style, new Set());
      for (const s of sizes) styleSizes.get(style).add(s);
      variants.push({
        type: style,
        color: PLACEHOLDER_COLOR.name,
        price: p.price,
        sku: `${sku}-${garment.code}-${slugify(style).toUpperCase()}`,
        image_urls: images,
      });
    }
    if (!variants.length) { skipped.push([id, 'no usable variants']); continue; }

    products.push({
      source_id: id,
      name: title,
      sku,
      categories: [...new Set(catSlugs)],
      // images[0] is the store's featured shot (all designs together).
      image: srcs[0] || variants[0].image_urls[0],
      // Descriptions come from the category-level shared text; empty strings
      // clear per-product ones left by older imports.
      description: '',
      short_description: '',
      variants,
    });
  }

  // Oldest first so the newest designs end up with the newest post dates.
  products.sort((a, b) => (BigInt(a.source_id) < BigInt(b.source_id) ? -1 : 1));

  categories.set('new-arrivals', { name: 'New Arrivals', slug: 'new-arrivals', parent: '' });
  categories.set('best-seller', { name: 'Best Sellers', slug: 'best-seller', parent: '' });

  const knownSizes = new Set(SIZES.map(([, slug]) => slug));
  const extraSizes = [...new Set([...styleSizes.values()].flatMap((s) => [...s]))].filter((s) => !knownSizes.has(s));

  const setup = {
    sizes: [...SIZES, ...extraSizes.map((s) => [s.toUpperCase(), s])].map(([name, slug], i) => ({ name, slug, sort_order: i + 1 })),
    colors: [{ ...PLACEHOLDER_COLOR, hex: null, sort_order: 0 }],
    // A Style's size set is the union over every product that offers it.
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

const source = JSON.parse(readFileSync(FILE, 'utf8'));
const { setup, products: allProducts, skipped, unmappedCollections } = transform(source);

let products = ONLY ? allProducts.filter((p) => ONLY.has(p.source_id)) : allProducts;
if (LIMIT) products = products.slice(0, LIMIT);

const variantCount = products.reduce((n, p) => n + p.variants.length, 0);
const byType = {};
for (const p of products) byType[p.categories[0]] = (byType[p.categories[0]] || 0) + 1;
console.log(`Source: ${source.length} | importable: ${allProducts.length} | selected: ${products.length} | variants: ${variantCount} | skipped: ${skipped.length}`);
console.log('By garment:', byType);
console.log(`Setup: ${setup.sizes.length} sizes, ${setup.colors.length} colors, ${setup.types.length} styles, ${setup.categories.length} categories`);
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
