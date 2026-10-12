#!/usr/bin/env node
/**
 * Bulk-import scraped POD products (artsholic_all.json format) into the
 * theme's POD variant system via the wc-pod/v1/import/* endpoints
 * (inc/pod-variants/bulk-import.php).
 *
 * Usage:
 *   node scripts/pod-import.mjs --dry-run                 # transform + stats only
 *   node scripts/pod-import.mjs --dump payload.json       # write transformed payload
 *   WC_KEY=ck_... WC_SECRET=cs_... node scripts/pod-import.mjs --site https://slicktee.com --setup
 *   WC_KEY=ck_... WC_SECRET=cs_... node scripts/pod-import.mjs --site https://slicktee.com
 *
 * Options:
 *   --file <path>        source JSON (default artsholic_all.json)
 *   --batch <n>          products per request (default 25, max 100)
 *   --concurrency <n>    parallel requests (default 2)
 *   --limit <n>          only import the first n products (testing)
 *   --only <id,id>       only these source ids
 *   --state <path>       resume file (default pod-import-state.json); done ids are skipped
 *   --force              ignore the state file and re-send everything (updates in place)
 *   --query-auth         send key/secret as query params (hosts that strip Authorization)
 *   --new-arrivals <n>   newest n source ids also get "New Arrivals" (default 1000)
 */

import { readFileSync, writeFileSync, appendFileSync, existsSync } from 'node:fs';

/* ---------------------------------------------------------------------
 * Args
 * ------------------------------------------------------------------ */

const args = process.argv.slice(2);
const flag = (name) => args.includes(`--${name}`);
const opt = (name, def) => {
  const i = args.indexOf(`--${name}`);
  return i >= 0 && args[i + 1] !== undefined ? args[i + 1] : def;
};

const FILE = opt('file', 'artsholic_all.json');
const SITE = (opt('site', '') || '').replace(/\/+$/, '');
const BATCH = Math.min(100, parseInt(opt('batch', '25'), 10));
const CONCURRENCY = parseInt(opt('concurrency', '2'), 10);
const LIMIT = parseInt(opt('limit', '0'), 10);
const ONLY = opt('only', '') ? new Set(opt('only', '').split(',').map((s) => s.trim())) : null;
const STATE_FILE = opt('state', 'pod-import-state.json');
const ERROR_LOG = STATE_FILE.replace(/\.json$/, '') + '-errors.jsonl';
const NEW_ARRIVALS = parseInt(opt('new-arrivals', '1000'), 10);

/* ---------------------------------------------------------------------
 * Catalog config
 * ------------------------------------------------------------------ */

const SIZES = [
  ['XS', 'xs'], ['S', 's'], ['M', 'm'], ['L', 'l'], ['XL', 'xl'],
  ['2XL', '2xl'], ['3XL', '3xl'], ['4XL', '4xl'], ['5XL', '5xl'], ['One Size', 'one-size'],
];

const ladder = (slugs, steps) => Object.fromEntries(slugs.map((s, i) => [s, steps[i]]));
const FULL = ['s', 'm', 'l', 'xl', '2xl', '3xl', '4xl', '5xl'];
const SHORT = ['s', 'm', 'l', 'xl', '2xl'];

// Style (POD Type) per garment category. Size surcharges follow the source
// store's per-size pricing for the most common base price of each style.
const TYPES = {
  'vintage-shirts':         { name: 'Vintage T-Shirt',    code: 'TEE',  sizes: ladder(FULL, [0, 1, 2, 3, 4, 5, 6, 7]) },
  'classic-tee':            { name: 'Classic Tee',        code: 'CTEE', sizes: ladder(['xs', ...FULL.slice(0, 7)], [0, 0, 1, 1, 2, 2, 3, 3]) },
  'vintage-tank-top':       { name: 'Vintage Tank Top',   code: 'TANK', sizes: ladder(SHORT, [0, 0, 1, 1, 2]) },
  'vintage-sweatshirt':     { name: 'Vintage Sweatshirt', code: 'SWT',  sizes: ladder(FULL, [0, 0, 2, 2, 4, 4, 6, 6]) },
  'vintage-hoodie':         { name: 'Vintage Hoodie',     code: 'HOOD', sizes: ladder(FULL, [0, 0, 2, 2, 4, 4, 6, 6]) },
  'vintage-shirt-for-kids': { name: 'Kids Vintage Tee',   code: 'KID',  sizes: ladder(SHORT, [0, 0, 1, 1, 2]) },
  'vintage-shorts':         { name: 'Vintage Shorts',     code: 'SHRT', sizes: ladder(FULL, [0, 1, 2, 3, 4, 5, 6, 7]) },
  'vintage-caps':           { name: 'Vintage Cap',        code: 'CAP',  sizes: { 'one-size': 0 } },
};
// Order matters: the first matching category decides the style.
const TYPE_PRIORITY = ['vintage-shirt-for-kids', 'vintage-caps', 'vintage-shorts', 'vintage-hoodie',
  'vintage-sweatshirt', 'vintage-tank-top', 'classic-tee', 'vintage-shirts'];
// Fallback when a product has no garment category: SKU code in the image filename.
const IMAGE_CODE_TYPES = { TX: 'vintage-shirts', '2TX': 'vintage-shirts', TANK: 'vintage-tank-top',
  SWEAT: 'vintage-sweatshirt', HD: 'vintage-hoodie', '2HD': 'vintage-hoodie', GT: 'classic-tee', KID: 'vintage-shirt-for-kids' };

const COLOR_ALIASES = {
  ArmyGreen: 'Army Green', DarkBlue: 'Dark Blue', DeminBlue: 'Denim Blue', 'Demin Blue': 'Denim Blue',
  AncoraRed: 'Ancora Red', RoseRed: 'Rose Red', GrassGreen: 'Grass Green',
};
const COLOR_HEX = {
  Black: '#1B1B1B', White: '#F5F5F2', Apricot: '#F2C9A0', 'Rose Red': '#C2185B', Coffee: '#6F4E37',
  Grey: '#8E8E8E', Gray: '#8A8A8A', 'Dark Gray': '#4A4A4A', 'Light Grey': '#C9C9C9', 'Light Gray': '#C9C9C9',
  Pink: '#F4A7B9', 'Army Green': '#4B5320', 'Military Green': '#5B5F3A', 'Grass Green': '#4CAF50',
  Green: '#2E7D32', 'Dark Green': '#1E4D2B', Purple: '#6A3D9A', 'Purple Haze': '#8E7CC3', Brown: '#7B4B2A',
  'Light Brown': '#A9805B', Blue: '#2D5DA8', 'Light Blue': '#9CC3E6', 'Sky Blue': '#87CEEB', 'Dark Blue': '#1F2F5C',
  'Denim Blue': '#4A6A8C', Navy: '#1C2541', Khaki: '#C3B091', Sand: '#D8C8A8', Carbon: '#3B3B3B',
  'Wine Red': '#722F37', Watermelon: '#F0566A', 'Ancora Red': '#B3262D', Cherry: '#9B111E',
  Yellow: '#F2C94C', Orange: '#F2994A', 'Pirate Gray': '#5E6064',
};

// Source category name → slug where it differs from a plain slugify
// (mirrors the source store's slugs, which the theme menus link to).
const CATEGORY_SLUGS = { 'Vintage Tank Tops': 'vintage-tank-top' };
const SKIP_CATEGORIES = new Set(['#REF!']);

const DESCRIPTIONS = {
  'vintage-shirts': ['Oversized unisex fit with dropped shoulders', 'Vintage wash gives every tee a soft, lived-in look and feel'],
  'classic-tee': ['Classic unisex fit for everyday wear', 'Soft premium cotton that holds its shape'],
  'vintage-tank-top': ['Relaxed sleeveless cut for warm days and layering', 'Vintage-washed for a soft, broken-in feel'],
  'vintage-sweatshirt': ['Crewneck with ribbed cuffs and hem', 'Vintage wash for a faded, broken-in look'],
  'vintage-hoodie': ['Drawstring hood and front kangaroo pocket', 'Vintage wash for a faded, broken-in look'],
  'vintage-shirt-for-kids': ['Kids sizing with the same vintage-wash look as our adult tees', 'Soft cotton that is comfortable for all-day play'],
  'vintage-shorts': ['Elastic waistband for an easy, relaxed fit', 'Vintage-washed fabric with a soft hand feel'],
  'vintage-caps': ['Adjustable strap fits most head sizes', 'Washed cotton crown with a pre-curved brim'],
};

/* ---------------------------------------------------------------------
 * Transform
 * ------------------------------------------------------------------ */

const decode = (s) => String(s)
  .replace(/&#8217;|&#039;|&#39;/g, '’').replace(/&#8211;/g, '–').replace(/&amp;/g, '&')
  .replace(/&quot;/g, '"').replace(/&#(\d+);/g, (_, n) => String.fromCharCode(+n));

const slugify = (s) => decode(s).toLowerCase().replace(/['’]/g, '').replace(/&/g, ' ')
  .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');

const categorySlug = (name) => CATEGORY_SLUGS[decode(name)] || slugify(name);

const esc = (s) => s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

function imageCode(url) {
  const parts = url.split('/').pop().split('-');
  return parts.length > 2 ? parts[2].replace(/\..*$/, '') : '';
}

function transform(source) {
  const newest = new Set([...source].sort((a, b) => b.id - a.id).slice(0, NEW_ARRIVALS).map((p) => p.id));
  const categories = new Map(); // slug → {name, slug, parent}
  const colors = new Map();
  const products = [];
  const skipped = [];

  for (const p of source) {
    if (!p.colors?.length) { skipped.push([p.id, 'no colors/images']); continue; }
    if (!(p.price > 0)) { skipped.push([p.id, 'no price']); continue; }

    const catSlugs = [];
    for (const raw of p.categories) {
      const parts = decode(raw).split(' > ').map((s) => s.trim());
      if (SKIP_CATEGORIES.has(parts[0])) continue;
      const parentSlug = categorySlug(parts[0]);
      categories.set(parentSlug, { name: parts[0], slug: parentSlug, parent: '' });
      catSlugs.push(parentSlug);
      if (parts[1]) {
        const childSlug = parts[1] === 'Caps' ? `caps-${parentSlug}` : categorySlug(parts[1]);
        categories.set(childSlug, { name: parts[1], slug: childSlug, parent: parentSlug });
        catSlugs.push(childSlug);
      }
    }

    let typeKey = TYPE_PRIORITY.find((k) => catSlugs.includes(k));
    if (!typeKey) typeKey = IMAGE_CODE_TYPES[imageCode(p.colors[0].image)];
    if (!typeKey) { skipped.push([p.id, 'unknown style']); continue; }
    const type = TYPES[typeKey];
    if (!catSlugs.includes(typeKey)) catSlugs.push(typeKey);
    if (newest.has(p.id)) catSlugs.push('new-arrivals');

    const seen = new Set();
    const variants = [];
    for (const c of p.colors) {
      const color = COLOR_ALIASES[c.name] || c.name;
      if (!c.image || seen.has(color)) continue;
      seen.add(color);
      colors.set(color, slugify(color));
      variants.push({
        type: type.name,
        color,
        price: p.price,
        sku: `ST-${p.id}-${type.code}-${slugify(color).toUpperCase()}`,
        image_urls: [c.image],
      });
    }
    if (!variants.length) { skipped.push([p.id, 'no usable colors']); continue; }

    const main = variants.find((v) => v.color === 'Black') || variants[0];
    const name = decode(p.name);
    const bullets = [...DESCRIPTIONS[typeKey],
      'Printed to order with DTG printing and OEKO-TEX® ECO PASSPORT certified inks',
      'Made to order: production takes 5–7 business days before dispatch'];

    products.push({
      source_id: String(p.id),
      name,
      sku: `ST-${p.id}`,
      categories: [...new Set(catSlugs)],
      image: main.image_urls[0],
      short_description: `${type.name} with fan-made artwork, available in ${variants.length} color${variants.length > 1 ? 's' : ''}.`,
      description: `<h2>${esc(name)}</h2>\n<ul>\n${bullets.map((b) => `<li>${esc(b)}</li>`).join('\n')}\n</ul>\n` +
        '<p>Fan-made design. Not affiliated with or endorsed by any rights holder.</p>',
      variants,
    });
  }

  // Oldest first so the newest designs end up with the newest post dates.
  products.sort((a, b) => Number(a.source_id) - Number(b.source_id));

  categories.set('best-seller', categories.get('best-seller') || { name: 'Best Seller', slug: 'best-seller', parent: '' });
  categories.set('new-arrivals', { name: 'New Arrivals', slug: 'new-arrivals', parent: '' });
  for (const k of TYPE_PRIORITY) {
    if (!categories.has(k)) categories.set(k, { name: k.replace(/-/g, ' ').replace(/\b\w/g, (m) => m.toUpperCase()), slug: k, parent: '' });
  }

  const colorList = [...colors.entries()].sort(([a], [b]) => (a === 'Black' ? -1 : b === 'Black' ? 1 : a.localeCompare(b)));
  const setup = {
    sizes: SIZES.map(([name, slug], i) => ({ name, slug, sort_order: i + 1 })),
    colors: colorList.map(([name, slug], i) => ({ name, slug, hex: COLOR_HEX[name] || null, sort_order: i + 1 })),
    types: TYPE_PRIORITY.slice().reverse().map((k, i) => ({ name: TYPES[k].name, slug: slugify(TYPES[k].name), sort_order: i + 1, sizes: TYPES[k].sizes })),
    // Parents first.
    categories: [...categories.values()].sort((a, b) => (a.parent ? 1 : 0) - (b.parent ? 1 : 0)),
  };

  return { setup, products, skipped };
}

/* ---------------------------------------------------------------------
 * HTTP
 * ------------------------------------------------------------------ */

async function post(path, body, attempt = 1) {
  const key = process.env.WC_KEY;
  const secret = process.env.WC_SECRET;
  if (!SITE || !key || !secret) {
    throw new Error('Set --site plus WC_KEY / WC_SECRET env vars (WooCommerce REST API key, Read/Write).');
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
const { setup, products: allProducts, skipped } = transform(source);

let products = ONLY ? allProducts.filter((p) => ONLY.has(p.source_id)) : allProducts;
if (LIMIT) products = products.slice(0, LIMIT);

const variantCount = products.reduce((n, p) => n + p.variants.length, 0);
const byType = {};
for (const p of products) byType[p.variants[0].type] = (byType[p.variants[0].type] || 0) + 1;
console.log(`Source: ${source.length} | importable: ${allProducts.length} | selected: ${products.length} | variants: ${variantCount} | skipped: ${skipped.length}`);
console.log('By style:', byType);
console.log(`Setup: ${setup.sizes.length} sizes, ${setup.colors.length} colors, ${setup.types.length} styles, ${setup.categories.length} categories`);
if (skipped.length) console.log('Skipped:', skipped.map(([id, why]) => `${id} (${why})`).join(', '));

if (opt('dump', '')) {
  writeFileSync(opt('dump', ''), JSON.stringify({ setup, products }, null, 1));
  console.log(`Wrote ${opt('dump', '')}`);
}
if (flag('dry-run') || opt('dump', '')) process.exit(0);

if (flag('setup')) {
  const report = await post('/import/setup', setup);
  for (const [k, rows] of Object.entries(report)) {
    const errs = rows.filter((r) => r.status === 'error' || r.missing_sizes);
    console.log(`  ${k}: ${rows.length} rows${errs.length ? `, problems: ${JSON.stringify(errs)}` : ''}`);
  }
  console.log('Setup done.');
  process.exit(0);
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
