import { execSync } from 'child_process';
import {
  readFileSync, writeFileSync, existsSync,
  mkdirSync, statSync, readdirSync, copyFileSync, rmSync,
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

// ── Zip ────────────────────────────────────────────────────────
const distRoot = resolve(root, 'dist');
const zipFile  = `${themeSlug}.zip`;
const zipPath  = join(distRoot, zipFile);

if (existsSync(zipPath)) rmSync(zipPath);

console.log(`Packaging → dist/${zipFile}`);
execSync(`zip -r ${zipFile} ${themeSlug}`, { cwd: distRoot, stdio: 'inherit' });

console.log(`\nDone → dist/${zipFile}`);