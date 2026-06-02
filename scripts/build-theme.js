import { execSync } from 'child_process';
import {
  readFileSync, writeFileSync, existsSync,
  mkdirSync, statSync, readdirSync, copyFileSync, rmSync, renameSync,
} from 'fs';
import { resolve, dirname, extname, join, basename } from 'path';
import { fileURLToPath } from 'url';

import postcss from 'postcss';
import cssnano from 'cssnano';
import { minify as terserMinify } from 'terser';

const __dirname = dirname(fileURLToPath(import.meta.url));
const root = resolve(__dirname, '..');

// ── Parse style.css ─────────────────────────────────────────────
const styleCss = readFileSync(resolve(root, 'style.css'), 'utf8');

const getMeta = (key) => {
  const m = styleCss.match(new RegExp(`^${key}:\\s*(.+)$`, 'm'));
  return m ? m[1].trim() : '';
};

const themeName    = getMeta('Theme Name');
const themeVersion = getMeta('Version');
const themeSlug    = themeName.toLowerCase().replace(/\s+/g, '');

if (!themeName) {
  console.error('Cannot parse Theme Name from style.css');
  process.exit(1);
}

const randomVersion = `1.${Math.floor(Math.random() * 9) + 1}.${String(Math.floor(Math.random() * 99) + 1).padStart(2, '0')}`;

console.log(`Theme   : ${themeName}`);
console.log(`Slug    : ${themeSlug}`);
console.log(`Version : ${themeVersion} → ${randomVersion}`);
console.log('');

// ── Build Tailwind ──────────────────────────────────────────────
console.log('Building Tailwind CSS...');
execSync('node scripts/build-tw.js', { cwd: root, stdio: 'inherit' });
console.log('');

// ── Prepare dist ────────────────────────────────────────────────
const distDir = resolve(root, 'dist', themeSlug);

if (existsSync(distDir)) rmSync(distDir, { recursive: true });
mkdirSync(distDir, { recursive: true });

const EXCLUDE = new Set(['node_modules', '.git', 'dist', 'scripts', '.plans', '.agent', '.claude', 'package.json', 'package-lock.json', 'README.md', 'skills-lock.json', 'yarn.lock']);

function shouldSkip(name) {
  return EXCLUDE.has(name) || name.startsWith('.') || name.endsWith('.zip');
}

function copyDir(src, dest) {
  mkdirSync(dest, { recursive: true });
  for (const entry of readdirSync(src)) {
    if (shouldSkip(entry)) continue;
    const s = join(src, entry);
    const d = join(dest, entry);
    statSync(s).isDirectory() ? copyDir(s, d) : copyFileSync(s, d);
  }
}

console.log(`Copying → dist/${themeSlug}/`);
copyDir(root, distDir);

console.log('Generating screenshot.png...');
generateThemeScreenshot({
  themeName,
  version: randomVersion,
  outputDir: distDir
});
console.log('');

// ── Minify CSS (cssnano) ───────────────────────────────────────
async function minifyCss(content, keepHeader = false) {
  let header = '';

  if (keepHeader) {
    const m = content.match(/^(\s*\/\*[\s\S]*?\*\/)/);
    if (m) {
      header = m[1].trim() + '\n';
      content = content.slice(m[0].length);
    }
  }

  const result = await postcss([
    cssnano({
      preset: ['default', {
        discardComments: { removeAll: true }
      }]
    })
  ]).process(content, { from: undefined });

  return header + result.css;
}

import { createCanvas } from 'canvas';

function generateThemeScreenshot({ themeName, version, outputDir }) {
  const width = 1200;
  const height = 900;

  const canvas = createCanvas(width, height);
  const ctx = canvas.getContext('2d');

  const rand = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

  const getContrastColor = (r, g, b) => {
    const yiq = (r * 299 + g * 587 + b * 114) / 1000;
    return yiq >= 128 ? '#111' : '#fff';
  };

  // ── Background random ───────────────────────────────────
  const bgR = rand(0, 255);
  const bgG = rand(0, 255);
  const bgB = rand(0, 255);

  ctx.fillStyle = `rgb(${bgR}, ${bgG}, ${bgB})`;
  ctx.fillRect(0, 0, width, height);

  // ── Main text color (dùng chung cho tất cả text) ────────
  const mainColor = getContrastColor(bgR, bgG, bgB);

  // ── Noise text (cùng màu nhưng alpha thấp) ──────────────
  const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillStyle = mainColor;

  for (let i = 0; i < 120; i++) {
    const x = rand(0, width);
    const y = rand(0, height);
    const fontSize = rand(10, 28);

    ctx.font = `${fontSize}px monospace`;
    ctx.globalAlpha = 0.08 + Math.random() * 0.12; // random opacity nhẹ

    const char = chars[rand(0, chars.length - 1)];
    ctx.fillText(char, x, y);
  }

  ctx.globalAlpha = 1;

  // ── Theme Name ─────────────────────────────────────────
  ctx.fillStyle = mainColor;
  ctx.font = 'bold 64px sans-serif';
  ctx.fillText(themeName, width / 2, height / 2 - 40);

  // ── Version ────────────────────────────────────────────
  ctx.font = '28px sans-serif';
  ctx.globalAlpha = 0.8;
  ctx.fillText(`Version ${version}`, width / 2, height - 80);

  ctx.globalAlpha = 1;

  // ── Save ───────────────────────────────────────────────
  const buffer = canvas.toBuffer('image/png');
  writeFileSync(join(outputDir, 'screenshot.png'), buffer);
}

// ── Minify JS (Terser) ─────────────────────────────────────────
async function minifyJs(content) {
  const result = await terserMinify(content, {
    compress: true,
    mangle: true,
    format: {
      comments: false
    }
  });

  return result.code || '';
}

// ── Process files ──────────────────────────────────────────────
const TEXT_EXTS = new Set(['.php', '.css', '.js', '.json', '.txt', '.html', '.md']);

async function processFile(filePath) {
  const ext = extname(filePath).toLowerCase();
  if (!TEXT_EXTS.has(ext)) return;

  let content = readFileSync(filePath, 'utf8');

  // Replace text domain
  content = content.replaceAll('dawp', themeSlug);

  // Replace version hardcoded
  content = content.replaceAll("'1.0.2'", `'${randomVersion}'`);

  if (themeVersion) {
    content = content.replaceAll(themeVersion, randomVersion);
  }

  if (ext === '.css') {
    const isRootStyle =
      basename(filePath) === 'style.css' &&
      dirname(filePath) === distDir;

    content = await minifyCss(content, isRootStyle);

  } else if (ext === '.js') {
    content = await minifyJs(content);
  }

  writeFileSync(filePath, content, 'utf8');
}

async function walkAndProcess(dir) {
  for (const entry of readdirSync(dir)) {
    const full = join(dir, entry);
    if (statSync(full).isDirectory()) {
      await walkAndProcess(full);
    } else {
      await processFile(full);
    }
  }
}

console.log('Processing files...');
await walkAndProcess(distDir);

// ── Rename assets/css & assets/js files + subdirs ─────────────
const ASSET_RENAME_DIRS = ['assets/css', 'assets/js'];

function randomToken(usedNames) {
  const chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
  let name;
  do {
    const len = Math.floor(Math.random() * 6) + 5; // 5–10 chars
    name = Array.from({ length: len }, () => chars[Math.floor(Math.random() * chars.length)]).join('');
  } while (usedNames.has(name));
  usedNames.add(name);
  return name;
}

function buildRenameMaps() {
  const fileMap = new Map(); // oldBasename → newBasename  (e.g. main.css → xk7p2.css)
  const dirMap  = new Map(); // oldDirName  → newDirName   (e.g. tw     → ab3qr)
  const used    = new Set();

  function walk(dir) {
    if (!existsSync(dir)) return;
    for (const entry of readdirSync(dir)) {
      const full = join(dir, entry);
      if (statSync(full).isDirectory()) {
        if (!dirMap.has(entry)) dirMap.set(entry, randomToken(used));
        walk(full);
      } else {
        const ext = extname(entry).toLowerCase();
        if ((ext === '.css' || ext === '.js') && !fileMap.has(entry))
          fileMap.set(entry, randomToken(used) + ext);
      }
    }
  }

  for (const d of ASSET_RENAME_DIRS) walk(join(distDir, d));
  return { fileMap, dirMap };
}

async function applyRenaming(fileMap, dirMap) {
  console.log('Renaming asset files:');
  for (const [o, n] of fileMap) console.log(`  ${o} → ${n}`);
  console.log('Renaming asset dirs:');
  for (const [o, n] of dirMap) console.log(`  ${o}/ → ${n}/`);
  console.log('');

  // Sort longest key first to prevent substring collision
  // e.g. replace 'tw-main.css' before 'main.css', otherwise 'main.css' → 'abc'
  // turns 'tw-main.css' into 'tw-abc' and the tw-main.css entry never matches.
  const sortedFiles = [...fileMap.entries()].sort((a, b) => b[0].length - a[0].length);
  const sortedDirs  = [...dirMap.entries()].sort((a, b) => b[0].length - a[0].length);

  // Phase 1: update all text-file references (files first, then dirs)
  async function updateRefs(dir) {
    for (const entry of readdirSync(dir)) {
      const full = join(dir, entry);
      if (statSync(full).isDirectory()) { await updateRefs(full); continue; }
      const ext = extname(full).toLowerCase();
      if (!TEXT_EXTS.has(ext)) continue;
      let content = readFileSync(full, 'utf8');
      let changed = false;
      for (const [o, n] of sortedFiles) {
        if (content.includes(o)) { content = content.replaceAll(o, n); changed = true; }
      }
      for (const [o, n] of sortedDirs) {
        const pattern = o + '/';
        if (content.includes(pattern)) { content = content.replaceAll(pattern, n + '/'); changed = true; }
      }
      if (changed) writeFileSync(full, content, 'utf8');
    }
  }
  await updateRefs(distDir);

  // Phase 2: rename files (while dirs still have original names)
  function renameFiles(dir) {
    if (!existsSync(dir)) return;
    for (const entry of readdirSync(dir)) {
      const full = join(dir, entry);
      if (statSync(full).isDirectory()) renameFiles(full);
      else if (fileMap.has(entry)) renameSync(full, join(dir, fileMap.get(entry)));
    }
  }
  for (const d of ASSET_RENAME_DIRS) renameFiles(join(distDir, d));

  // Phase 3: rename dirs bottom-up (children before parents)
  function renameDirs(dir) {
    if (!existsSync(dir)) return;
    for (const entry of readdirSync(dir)) {
      const full = join(dir, entry);
      if (!statSync(full).isDirectory()) continue;
      renameDirs(full); // recurse first
      if (dirMap.has(entry)) renameSync(full, join(dir, dirMap.get(entry)));
    }
  }
  for (const d of ASSET_RENAME_DIRS) renameDirs(join(distDir, d));
}

console.log('Renaming assets...');
const { fileMap, dirMap } = buildRenameMaps();
await applyRenaming(fileMap, dirMap);

// ── Zip ────────────────────────────────────────────────────────
const distRoot = resolve(root, 'dist');
const zipFile  = `${themeSlug}.zip`;
const zipPath  = join(distRoot, zipFile);

if (existsSync(zipPath)) rmSync(zipPath);

console.log(`Packaging → dist/${zipFile}`);
execSync(`zip -r ${zipFile} ${themeSlug}`, { cwd: distRoot, stdio: 'inherit' });

console.log(`\nDone → dist/${zipFile}`);