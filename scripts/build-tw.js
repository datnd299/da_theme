import { execSync } from 'child_process';

const builds = [
  { input: './assets/css/tailwind-input.css', output: './assets/css/tw/tw-ship.css', content: './template-parts/page-shipping-returns.php,./template-parts/page-shipping-policy.php,./template-parts/page-return-refund-policy.php' },
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
  const cmd = `npx @tailwindcss/cli -i ${input} -o ${output} --content "${content}" --minify`;
  console.log(`Building ${output}...`);
  execSync(cmd, { stdio: 'inherit' });
}

console.log('All builds completed.');
