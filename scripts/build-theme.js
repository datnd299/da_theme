import { execSync } from 'child_process';
import {
  readFileSync, writeFileSync, existsSync,
  mkdirSync, statSync, readdirSync, copyFileSync, rmSync,
} from 'fs';
import { resolve, dirname, extname, join, basename, relative } from 'path';
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
const CRC_TABLE = Array.from({ length: 256 }, (_, n) => {
  let c = n;
  for (let k = 0; k < 8; k++) c = c & 1 ? 0xedb88320 ^ (c >>> 1) : c >>> 1;
  return c >>> 0;
});

function crc32(buffer) {
  let crc = 0xffffffff;
  for (const byte of buffer) crc = CRC_TABLE[(crc ^ byte) & 0xff] ^ (crc >>> 8);
  return (crc ^ 0xffffffff) >>> 0;
}

function dosDateTime(date) {
  const time =
    (date.getHours() << 11) |
    (date.getMinutes() << 5) |
    Math.floor(date.getSeconds() / 2);
  const dosDate =
    ((date.getFullYear() - 1980) << 9) |
    ((date.getMonth() + 1) << 5) |
    date.getDate();

  return { time, date: dosDate };
}

function collectZipFiles(dir, baseDir = dir) {
  const files = [];

  for (const entry of readdirSync(dir)) {
    const full = join(dir, entry);
    if (statSync(full).isDirectory()) {
      files.push(...collectZipFiles(full, baseDir));
    } else {
      files.push(full);
    }
  }

  return files;
}

function createZipFromDirectory(sourceDir, outputPath, rootName) {
  const localParts = [];
  const centralParts = [];
  let offset = 0;

  for (const filePath of collectZipFiles(sourceDir)) {
    const data = readFileSync(filePath);
    const stats = statSync(filePath);
    const name = `${rootName}/${relative(sourceDir, filePath).replaceAll('\\', '/')}`;
    const nameBuffer = Buffer.from(name, 'utf8');
    const { time, date } = dosDateTime(stats.mtime);
    const checksum = crc32(data);

    const localHeader = Buffer.alloc(30);
    localHeader.writeUInt32LE(0x04034b50, 0);
    localHeader.writeUInt16LE(20, 4);
    localHeader.writeUInt16LE(0x0800, 6);
    localHeader.writeUInt16LE(0, 8);
    localHeader.writeUInt16LE(time, 10);
    localHeader.writeUInt16LE(date, 12);
    localHeader.writeUInt32LE(checksum, 14);
    localHeader.writeUInt32LE(data.length, 18);
    localHeader.writeUInt32LE(data.length, 22);
    localHeader.writeUInt16LE(nameBuffer.length, 26);
    localHeader.writeUInt16LE(0, 28);

    localParts.push(localHeader, nameBuffer, data);

    const centralHeader = Buffer.alloc(46);
    centralHeader.writeUInt32LE(0x02014b50, 0);
    centralHeader.writeUInt16LE(20, 4);
    centralHeader.writeUInt16LE(20, 6);
    centralHeader.writeUInt16LE(0x0800, 8);
    centralHeader.writeUInt16LE(0, 10);
    centralHeader.writeUInt16LE(time, 12);
    centralHeader.writeUInt16LE(date, 14);
    centralHeader.writeUInt32LE(checksum, 16);
    centralHeader.writeUInt32LE(data.length, 20);
    centralHeader.writeUInt32LE(data.length, 24);
    centralHeader.writeUInt16LE(nameBuffer.length, 28);
    centralHeader.writeUInt16LE(0, 30);
    centralHeader.writeUInt16LE(0, 32);
    centralHeader.writeUInt16LE(0, 34);
    centralHeader.writeUInt16LE(0, 36);
    centralHeader.writeUInt32LE(0, 38);
    centralHeader.writeUInt32LE(offset, 42);
    centralParts.push(centralHeader, nameBuffer);

    offset += localHeader.length + nameBuffer.length + data.length;
  }

  const centralSize = centralParts.reduce((size, part) => size + part.length, 0);
  const end = Buffer.alloc(22);
  end.writeUInt32LE(0x06054b50, 0);
  end.writeUInt16LE(0, 4);
  end.writeUInt16LE(0, 6);
  end.writeUInt16LE(centralParts.length / 2, 8);
  end.writeUInt16LE(centralParts.length / 2, 10);
  end.writeUInt32LE(centralSize, 12);
  end.writeUInt32LE(offset, 16);
  end.writeUInt16LE(0, 20);

  writeFileSync(outputPath, Buffer.concat([...localParts, ...centralParts, end]));
}

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
createZipFromDirectory(distDir, zipPath, themeSlug);

console.log(`\nDone → dist/${zipFile}`);
