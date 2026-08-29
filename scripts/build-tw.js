import { execSync } from 'child_process';
import { writeFileSync, rmSync } from 'fs';
import { resolve, dirname } from 'path';
import { fileURLToPath } from 'url';

const __dirname = dirname(fileURLToPath(import.meta.url));
const root = resolve(__dirname, '..');

// Per-page Tailwind builds. `content` is a comma-separated list of PHP/HTML
// files (paths relative to the theme root) whose classes should be scanned.
const builds = [
  { output: './assets/css/tw/tw-home.css',     content: './template-parts/page-home.php' },
  { output: './assets/css/tw/tw-about.css',    content: './template-parts/page-about.php' },
  { output: './assets/css/tw/tw-404.css',      content: './404.php' },
  { output: './assets/css/tw/tw-main.css',     content: './header.php,./footer.php,./inc/side-cart.php' },
  { output: './assets/css/tw/tw-faq.css',      content: './template-parts/page-faq.php' },
  { output: './assets/css/tw/tw-contact.css',  content: './template-parts/page-contact.php' },
  { output: './assets/css/tw/tw-track.css',    content: './template-parts/page-track-order.php' },
  // Shared by all policy / legal pages — the markup lives in the renderer.
  { output: './assets/css/tw/tw-legal.css',    content: './inc/store-info.php' },
];

// Tailwind v4's `--content` CLI flag does not reliably register arbitrary
// values / theme-color utilities in this toolchain, so each build instead
// gets a tiny wrapper stylesheet that pulls in the shared theme tokens
// (tailwind-input.css) and declares its own `@source` files. The wrapper
// lives in assets/css/ so its relative `@import` and `@source` paths resolve.
for (const { output, content } of builds) {
  const sources = content
    .split(',')
    .map((p) => p.trim().replace(/^\.\//, ''))
    .map((p) => `@source "../../${p}";`)
    .join('\n');

  const wrapperPath = resolve(root, 'assets/css/_tw-build.css');
  writeFileSync(wrapperPath, `@import "./tailwind-input.css";\n${sources}\n`);

  try {
    const cmd = `npx @tailwindcss/cli -i ./assets/css/_tw-build.css -o ${output} --minify`;
    console.log(`Building ${output}...`);
    execSync(cmd, { cwd: root, stdio: 'inherit' });
  } finally {
    rmSync(wrapperPath, { force: true });
  }
}

console.log('All builds completed.');
