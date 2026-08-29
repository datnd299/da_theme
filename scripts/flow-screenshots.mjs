import { chromium } from 'playwright';

const baseURL = process.env.SITE_URL || 'http://localhost';
const shots = [
  ['home-desktop', '/', 1440, 1000],
  ['shop-desktop', '/shop/', 1440, 1000],
  ['contact-desktop', '/contact-us/', 1440, 1000],
  ['home-mobile', '/', 390, 844],
  ['shop-mobile', '/shop/', 390, 844],
  ['menu-mobile', '/', 390, 844],
];

const browser = await chromium.launch();
for (const [name, path, width, height] of shots) {
  const context = await browser.newContext({ viewport: { width, height } });
  const page = await context.newPage();
  await page.goto(new URL(path, baseURL).href, { waitUntil: 'networkidle' });
  if (name === 'menu-mobile') {
    await page.locator('.qb-menu-toggle').click();
  }
  await page.screenshot({ path: `scripts/${name}.png`, fullPage: false });
  await context.close();
}
await browser.close();
console.log('screenshots saved in scripts/*.png');
