import { execSync } from 'child_process';
import { writeFileSync, rmSync } from 'fs';
import { resolve, dirname } from 'path';
import { fileURLToPath } from 'url';

const __dirname = dirname(fileURLToPath(import.meta.url));
const root = resolve(__dirname, '..');

// The site chrome (header + footer + side cart) renders on every page. Every
// per-page bundle must scan it too: page bundles load *after* tw-main.css, and
// an unconditional utility a page uses (e.g. the contact form's `hidden`
// honeypot) would otherwise re-declare later in the cascade and clobber the
// header's responsive variants (`lg:flex`, `lg:block`), collapsing the desktop
// header to its mobile layout. Scanning the chrome here keeps each bundle's
// utility set complete and correctly ordered.
const CHROME = './header.php,./footer.php,./inc/side-cart.php';

// Per-page Tailwind builds. `content` is a comma-separated list of PHP/HTML
// files (paths relative to the theme root) whose classes should be scanned.
const builds = [
  { output: './assets/css/tw/tw-home.css',     content: `./template-parts/page-home.php,${CHROME}` },
  { output: './assets/css/tw/tw-about.css',    content: `./template-parts/page-about.php,${CHROME}` },
  { output: './assets/css/tw/tw-404.css',      content: `./404.php,${CHROME}` },
  { output: './assets/css/tw/tw-main.css',     content: CHROME },
  { output: './assets/css/tw/tw-faq.css',      content: `./template-parts/page-faq.php,${CHROME}` },
  { output: './assets/css/tw/tw-contact.css',  content: `./template-parts/page-contact.php,${CHROME}` },
  { output: './assets/css/tw/tw-track.css',    content: `./template-parts/page-track-order.php,${CHROME}` },
  // Shared by all policy / legal pages — the markup lives in the renderer.
  { output: './assets/css/tw/tw-legal.css',    content: `./inc/store-info.php,${CHROME}` },
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
