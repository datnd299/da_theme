import { spawnSync } from 'child_process';
import { dirname, join, resolve } from 'path';
import { fileURLToPath } from 'url';

const __dirname = dirname(fileURLToPath(import.meta.url));
const root = resolve(__dirname, '..');
const tailwindCli = join(root, 'node_modules', '@tailwindcss', 'cli', 'dist', 'index.mjs');

const builds = [
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-ship.css', content: './template-parts/page-shipping-returns.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-home.css', content: './template-parts/page-home.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-terms.css', content: './template-parts/page-terms-conditions.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-about.css', content: './template-parts/page-about.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-404.css', content: './404.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-main.css', content: './header.php,./footer.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-privacy.css', content: './template-parts/page-privacy.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-faq.css', content: './template-parts/page-faq.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-contact.css', content: './template-parts/page-contact.php' },
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-track.css', content: './template-parts/page-track-order.php' },
];

for (const { input, output, content } of builds) {
  console.log(`Building ${output}...`);

  const result = spawnSync(process.execPath, [
    tailwindCli,
    '-i', input,
    '-o', output,
    '--content', content,
    '--minify',
  ], {
    cwd: root,
    stdio: 'inherit',
    shell: false,
  });

  if (result.error) {
    throw result.error;
  }

  if (result.status !== 0) {
    process.exit(result.status ?? 1);
  }
}

console.log('All builds completed.');
