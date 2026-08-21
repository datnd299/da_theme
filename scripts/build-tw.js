import { execSync } from 'child_process';

/**
 * Tailwind v4 has no `--content` flag — it auto-detects sources from the working
 * directory, honouring .gitignore. Per-page builds therefore produced ten
 * byte-identical files, so the theme ships a single bundle instead.
 *
 * Add new directories to ignore via .gitignore, not here.
 */
const input = './assets/css/tailwind-input.css';
const output = './assets/css/tw/tw-main.css';

console.log(`Building ${output}...`);
execSync(`npx @tailwindcss/cli -i ${input} -o ${output} --minify`, { stdio: 'inherit' });
console.log('Build completed.');
