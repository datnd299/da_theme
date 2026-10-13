#!/usr/bin/env node
/**
 * Bulk-import scraped POD products (artsholic_all.json format) into the
 * theme's POD variant system via the wc-pod/v1/import/* endpoints
 * (inc/pod-variants/bulk-import.php).
 *
 * Usage:
 *   node scripts/pod-import.mjs --dry-run                 # transform + stats only
 *   node scripts/pod-import.mjs --dump payload.json       # write transformed payload
 *   node scripts/pod-import.mjs --setup
 *   node scripts/pod-import.mjs
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

// WooCommerce REST API key (Read/Write). Env vars WC_KEY / WC_SECRET override these.
const WC_KEY = process.env.WC_KEY || 'ck_aa90a5fbbec6cab3b1ad3865e8dbda72081ade16';
const WC_SECRET = process.env.WC_SECRET || 'cs_cb2684749f7d5ade7ed4096e9dd48c78d53091fe';
const SITE_URL = 'https://slicktee.com';

const FILE = opt('file', 'artsholic_all.json');
const SITE = (opt('site', SITE_URL) || '').replace(/\/+$/, '');
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
  'vintage-shirts': { name: 'Vintage T-Shirt', code: 'TEE', sizes: ladder(FULL, [0, 1, 2, 3, 4, 5, 6, 7]) },
  'classic-tee': { name: 'Classic Tee', code: 'CTEE', sizes: ladder(['xs', ...FULL.slice(0, 7)], [0, 0, 1, 1, 2, 2, 3, 3]) },
  'vintage-tank-top': { name: 'Vintage Tank Top', code: 'TANK', sizes: ladder(SHORT, [0, 0, 1, 1, 2]) },
  'vintage-sweatshirt': { name: 'Vintage Sweatshirt', code: 'SWT', sizes: ladder(FULL, [0, 0, 2, 2, 4, 4, 6, 6]) },
  'vintage-hoodie': { name: 'Vintage Hoodie', code: 'HOOD', sizes: ladder(FULL, [0, 0, 2, 2, 4, 4, 6, 6]) },
  'vintage-shirt-for-kids': { name: 'Kids Vintage Tee', code: 'KID', sizes: ladder(SHORT, [0, 0, 1, 1, 2]) },
  'vintage-shorts': { name: 'Vintage Shorts', code: 'SHRT', sizes: ladder(FULL, [0, 1, 2, 3, 4, 5, 6, 7]) },
  'vintage-caps': { name: 'Vintage Cap', code: 'CAP', sizes: { 'one-size': 0 } },
};
// Order matters: the first matching category decides the style.
const TYPE_PRIORITY = ['vintage-shirt-for-kids', 'vintage-caps', 'vintage-shorts', 'vintage-hoodie',
  'vintage-sweatshirt', 'vintage-tank-top', 'classic-tee', 'vintage-shirts'];
// Fallback when a product has no garment category: SKU code in the image filename.
const IMAGE_CODE_TYPES = {
  TX: 'vintage-shirts', '2TX': 'vintage-shirts', TANK: 'vintage-tank-top',
  SWEAT: 'vintage-sweatshirt', HD: 'vintage-hoodie', '2HD': 'vintage-hoodie', GT: 'classic-tee', KID: 'vintage-shirt-for-kids'
};

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

// Source mockups carry an ARTSHOLIC hang tag; imagor overlays a pre-rotated
// SlickTee tag on it. Geometry per mockup set was measured by template-matching
// the old tag on samples of every folder × code × colour, on the image
// normalised to 1000×1000 (older sweatshirt shots are 600×600).
const IMAGOR = 'https://imagor.polpod.cc/unsafe';
// Pre-rotated, pre-scaled tag images (imagor's watermark ignores fractional
// size ratios, so each scale is its own file); cx/cy = card centre in the image.
// Scale 1 = the old tag at ≈ 162×48 px. r* = clockwise tilt, l22 = 22.25° counter-clockwise.
const TAG_IMAGES = {
  r14: { src: 'image-mcp.polpod.cc/files/in-00eb974fe00f47b35957.png', cx: 95, cy: 51.2 },
  'r10-081': { src: 'image-mcp.polpod.cc/files/in-5275aa013c6468942fb7.webp', cx: 78.6, cy: 38.9 },
  'r10-093': { src: 'image-mcp.polpod.cc/files/in-af82bd2210674b3de54e.webp', cx: 89.8, cy: 44.4 },
  'r10-106': { src: 'image-mcp.polpod.cc/files/in-4e56f5d2aa635f52ee73.webp', cx: 102.6, cy: 51 },
  'r10-110': { src: 'image-mcp.polpod.cc/files/in-29fbc64a03d55afbe3df.webp', cx: 106.8, cy: 53 },
  'r10-117': { src: 'image-mcp.polpod.cc/files/in-4dc7a0ab7d30342638a2.webp', cx: 113.4, cy: 56 },
  'r10-121': { src: 'image-mcp.polpod.cc/files/in-54934056e2beae7211bc.webp', cx: 117.6, cy: 58.1 },
  'l22-111': { src: 'image-mcp.polpod.cc/files/in-3846401663185e479b7e.webp', cx: 108.4, cy: 70 },
  'l22-122': { src: 'image-mcp.polpod.cc/files/in-4623634fffda8a091234.webp', cx: 119.1, cy: 77 },
};
// [tag image, old tag centre x, centre y] on the 1000×1000 mockup
const TAGS = {
  classic: ['r14', 684.5, 144],
  front: ['r10-121', 723.9, 116], // Vintage Shirts (TX-230)
  front2406: ['r10-106', 683.2, 110.2],
  front2409: ['r10-093', 693, 99.5],
  back: ['r10-093', 767.4, 81.6], // 2-sided back shot (2TX, 2-Sided)
  back2504: ['r10-081', 755.5, 69.3],
  back2406: ['r10-093', 743.2, 81.7],
  kids: ['r10-110', 757, 95.2],
  tank: ['r10-093', 699, 98.5],
  sweat: ['r10-117', 715.4, 104.2],
  sweatGreen: ['r10-117', 726.8, 104.6],
  hoodWarm: ['l22-111', 205.6, 926.8], // Apricot / Coffee / Rose Red
  hoodDark: ['l22-111', 215.7, 927.2], // Black / Dark Gray / Military Green
  hood2409: ['l22-122', 212.2, 925.1], // 2024/09 colours (not Black) + 2025/08 Black
  hoodBack: ['l22-111', 236, 927], // 2-sided hoodie (2HD)
};

// Which TAGS entry fits a source image, or null to leave it untouched.
function tagFor(typeKey, twoSided, url) {
  const file = url.split('/').pop();
  const dir = url.split('/').slice(-3, -1).join('/');
  const color = file.replace(/(-\d)?\.\w+$/, '').split('-').pop().toLowerCase();
  switch (typeKey) {
    case 'classic-tee': return 'classic';
    case 'vintage-shirt-for-kids': return 'kids';
    case 'vintage-tank-top': return 'tank';
    case 'vintage-sweatshirt': return color === 'militarygreen' ? 'sweatGreen' : 'sweat';
    case 'vintage-shirts':
      if (twoSided) return dir === '2024/06' && /-2TX-(?!230)/i.test(file) ? 'back2406' : 'back';
      if (/-2TX-230-/i.test(file)) return 'back';
      if (/-2TX-/i.test(file)) return 'back2504';
      if (/-TX-(?!230)/i.test(file)) return dir === '2024/06' ? 'front2406' : 'front2409';
      return 'front';
    case 'vintage-hoodie':
      if (!/-HD[-.]/i.test(file)) return 'hoodBack'; // 2HD + uncoded ANI-1713.jpg-style files
      if (dir === '2024/09') return color === 'black' ? 'hoodDark' : 'hood2409';
      if (dir === '2025/08' && color === 'black') return 'hood2409';
      return ['apricot', 'coffee', 'rosered'].includes(color) ? 'hoodWarm' : 'hoodDark';
    default: return null;
  }
}

function retagImage(url, key) {
  const [img, cx, cy] = TAGS[key];
  const tag = TAG_IMAGES[img];
  const x = Math.round(cx - tag.cx);
  const y = Math.round(cy - tag.cy);
  return `${IMAGOR}/1000x1000/filters:watermark(${tag.src},${x},${y},0)/${url}`;
}

/* ---------------------------------------------------------------------
 * Transform
 * ------------------------------------------------------------------ */

const decode = (s) => String(s)
  .replace(/&#8217;|&#039;|&#39;/g, '’').replace(/&#8211;/g, '–').replace(/&amp;/g, '&')
  .replace(/&quot;/g, '"').replace(/&#(\d+);/g, (_, n) => String.fromCharCode(+n));

const slugify = (s) => decode(s).toLowerCase().replace(/['’]/g, '').replace(/&/g, ' ')
  .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');

const categorySlug = (name) => CATEGORY_SLUGS[decode(name)] || slugify(name);

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

    const twoSided = catSlugs.includes('2-sided');
    const seen = new Set();
    const variants = [];
    for (const c of p.colors) {
      const color = COLOR_ALIASES[c.name] || c.name;
      if (!c.image || seen.has(color)) continue;
      seen.add(color);
      colors.set(color, slugify(color));
      const tag = tagFor(typeKey, twoSided, c.image);
      variants.push({
        type: type.name,
        color,
        price: p.price,
        sku: `ST-${p.id}-${type.code}-${slugify(color).toUpperCase()}`,
        image_urls: [tag ? retagImage(c.image, tag) : c.image],
      });
    }
    if (!variants.length) { skipped.push([p.id, 'no usable colors']); continue; }

    const main = variants.find((v) => v.color === 'Black') || variants[0];
    const name = decode(p.name);

    products.push({
      source_id: String(p.id),
      name,
      sku: `ST-${p.id}`,
      categories: [...new Set(catSlugs)],
      image: main.image_urls[0],
      // Descriptions come from the category-level shared text
      // (inc/category-descriptions.php); empty strings clear the per-product
      // ones left by older imports.
      description: '',
      short_description: '',
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
  const key = WC_KEY;
  const secret = WC_SECRET;
  if (!SITE || !key || !secret) {
    throw new Error('Fill in WC_KEY / WC_SECRET at the top of scripts/pod-import.mjs (WooCommerce REST API key, Read/Write).');
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
