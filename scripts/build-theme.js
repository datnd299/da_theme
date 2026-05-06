import { execSync } from 'child_process';
import { readFileSync, existsSync } from 'fs';
import { resolve, dirname } from 'path';
import { fileURLToPath } from 'url';

const __dirname = dirname(fileURLToPath(import.meta.url));
const root = resolve(__dirname, '..');

// --- Parse style.css ---
const styleCss = readFileSync(resolve(root, 'style.css'), 'utf8');

const get = (key) => {
  const match = styleCss.match(new RegExp(`^${key}:\\s*(.+)$`, 'm'));
  return match ? match[1].trim() : '';
};

const themeName = get('Theme Name');
const themeSlug = themeName.toLowerCase().replace(/\s+/g, '');

if (!themeName) {
  console.error('Could not parse Theme Name from style.css');
  process.exit(1);
}

console.log(`Theme : ${themeName}`);
console.log(`Slug  : ${themeSlug}`);
console.log('');

// --- Build Tailwind ---
console.log('Building Tailwind CSS...');
execSync('node scripts/build-tw.js', { cwd: root, stdio: 'inherit' });
console.log('');

// --- Package zip ---
const zipName = `${themeSlug}.zip`;
const parentDir = resolve(root, '..');
const folderName = root.split('/').pop();

console.log(`Packaging → ${zipName}`);
execSync(`zip -r ${zipName} ${folderName} --exclude "*.git*" --exclude "*/node_modules/*" --exclude "*.zip"`, {
  cwd: parentDir,
  stdio: 'inherit',
});

console.log(`\nDone: ${parentDir}/${zipName}`);
