import { execSync } from 'child_process';

const input = './assets/css/tailwind-input.css';
const builds = [
  { output: './assets/css/tw/tw-main.css', content: './header.php,./footer.php' },
  { output: './assets/css/tw/tw-home.css', content: './template-parts/page-home.php' },
  { output: './assets/css/tw/tw-brands.css', content: './template-parts/page-shop-by-brand.php' },
  { output: './assets/css/tw/tw-guide.css', content: './template-parts/page-tire-size-guide.php' },
  { output: './assets/css/tw/tw-about.css', content: './template-parts/page-about.php' },
  { output: './assets/css/tw/tw-faq.css', content: './template-parts/page-faq.php' },
  { output: './assets/css/tw/tw-contact.css', content: './template-parts/page-contact.php' },
  { output: './assets/css/tw/tw-ship.css', content: './template-parts/page-shipping-policy.php,./template-parts/page-refund-return-policy.php' },
  { output: './assets/css/tw/tw-terms.css', content: './template-parts/page-terms-conditions.php' },
  { output: './assets/css/tw/tw-privacy.css', content: './template-parts/page-privacy.php' },
  { output: './assets/css/tw/tw-404.css', content: './404.php' },
];

for (const { output, content } of builds) {
  const cmd = `npx @tailwindcss/cli -i ${input} -o ${output} --content "${content}" --minify`;
  console.log(`Building ${output}...`);
  execSync(cmd, { stdio: 'inherit' });
}

console.log('All builds completed.');
