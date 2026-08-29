import { chromium } from 'playwright';

const baseURL = process.env.SITE_URL || 'http://localhost';
const viewports = [
  { name: 'desktop', width: 1440, height: 1000 },
  { name: 'mobile', width: 390, height: 844 },
];
const paths = [
  '/',
  '/shop/',
  '/about-us/',
  '/contact-us/',
  '/faq/',
  '/shipping-policy/',
  '/return-refund-policy/',
  '/privacy-policy/',
  '/terms-conditions/',
  '/track-order/',
  '/cart/',
  '/checkout/',
  '/my-account/',
  '/not-a-real-page/',
];

const failures = [];
const notes = [];

function assert(condition, message) {
  if (!condition) failures.push(message);
}

function ignorableBrowserError(text) {
  return text.includes('fonts.googleapis.com')
    || text.includes('net::ERR_NETWORK_ACCESS_DENIED')
    || text.includes('status of 404 (Not Found)');
}

async function visible(page, selector) {
  return page.locator(selector).first().isVisible().catch(() => false);
}

async function run() {
  const browser = await chromium.launch();
  const requestContext = await browser.newContext();

  for (const viewport of viewports) {
    const context = await browser.newContext({ viewport });
    const page = await context.newPage();
    const browserErrors = [];
    page.on('console', (msg) => {
      if (msg.type() === 'error') browserErrors.push(msg.text());
    });
    page.on('requestfailed', (request) => {
      const failure = request.failure();
      browserErrors.push(`${request.url()} -> ${failure?.errorText || 'request failed'}`);
    });
    page.on('pageerror', (error) => browserErrors.push(error.message));

    for (const path of paths) {
      const url = new URL(path, baseURL).href;
      const response = await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 }).catch((error) => {
        failures.push(`${viewport.name} ${path}: navigation failed: ${error.message}`);
        return null;
      });
      if (!response) continue;

      const status = response.status();
      const title = (await page.title()).trim();
      const bodyVisible = await visible(page, 'body');
      const headerVisible = await visible(page, 'header, .qb-header');
      const footerVisible = await visible(page, 'footer, .qb-footer');
      const horizontalOverflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth + 2);

      notes.push(`${viewport.name} ${path} -> ${status} "${title}"`);
      if (path !== '/not-a-real-page/') assert(status < 400, `${viewport.name} ${path}: HTTP ${status}`);
      assert(title !== '', `${viewport.name} ${path}: empty title`);
      assert(bodyVisible, `${viewport.name} ${path}: body not visible`);
      assert(headerVisible, `${viewport.name} ${path}: header not visible`);
      assert(footerVisible, `${viewport.name} ${path}: footer not visible`);
      assert(!horizontalOverflow, `${viewport.name} ${path}: horizontal overflow`);
    }

    const relevantBrowserErrors = browserErrors.filter((error) => !ignorableBrowserError(error));
    assert(relevantBrowserErrors.length === 0, `${viewport.name}: browser errors:\n${relevantBrowserErrors.join('\n')}`);

    await page.goto(baseURL, { waitUntil: 'networkidle' });
    if (viewport.name === 'desktop') {
      await page.locator('.qb-header-nav a[href$="/shop/"]').click();
      await page.waitForLoadState('networkidle').catch(() => {});
      assert(/\/shop\/?/.test(page.url()), `desktop header Shop link did not navigate to /shop/; got ${page.url()}`);

      await page.goto(baseURL, { waitUntil: 'networkidle' });
      const search = page.locator('form[role="search"] input[type="search"], form[role="search"] input[name="s"]').first();
      assert(await search.isVisible().catch(() => false), 'desktop search input not visible');
      if (await search.isVisible().catch(() => false)) {
        await search.fill('watch');
        await search.press('Enter');
        await page.waitForLoadState('networkidle').catch(() => {});
        assert(/s=watch/.test(page.url()) || /\/product\//.test(page.url()), `desktop search submit went to unexpected URL; got ${page.url()}`);
      }

      await page.goto(new URL('/contact-us/', baseURL).href, { waitUntil: 'networkidle' });
      assert(await visible(page, 'input:visible, textarea:visible'), 'contact page has no visible input/textarea');
      await page.getByRole('link', { name: /track order/i }).first().click();
      assert(/\/track-order\/?/.test(page.url()), 'contact Track Order link did not navigate');
      assert(await visible(page, 'input[name="orderid"], input[name="order_id"], input:visible'), 'track order form input not visible');
    } else {
      const menuButton = page.locator('button[aria-controls], button[aria-label*="Menu"], .qb-menu-toggle, .qb-mobile-toggle').first();
      assert(await menuButton.isVisible().catch(() => false), 'mobile menu button not visible');
      if (await menuButton.isVisible().catch(() => false)) {
        await menuButton.click();
        assert(await page.getByRole('link', { name: /shop/i }).first().isVisible().catch(() => false), 'mobile nav Shop link not visible after opening');
      }
    }

    await context.close();
  }

  const linkPage = await requestContext.newPage();
  await linkPage.goto(baseURL, { waitUntil: 'networkidle' });
  const internalHrefs = await linkPage.locator('a[href]').evaluateAll((links) => {
    const origin = window.location.origin;
    return [...new Set(links.map((link) => link.href)
      .filter((href) => href.startsWith(origin))
      .filter((href) => !href.includes('wp-admin'))
      .slice(0, 50))];
  });
  await linkPage.close();

  for (const href of internalHrefs) {
    const response = await requestContext.request.get(href).catch((error) => {
      failures.push(`linked page ${href}: ${error.message}`);
      return null;
    });
    if (response) assert(response.status() < 400, `linked page ${href}: HTTP ${response.status()}`);
  }

  await requestContext.close();
  await browser.close();

  console.log(notes.join('\n'));
  if (failures.length) {
    console.error('\nFAILURES\n' + failures.join('\n'));
    process.exit(1);
  }
  console.log('\nOK');
}

run().catch((error) => {
  console.error(error);
  process.exit(1);
});
