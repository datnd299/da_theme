# Site Info — Eliteshop Express (eliteshopexpress.com)

## 1. Business

- **Brand:** Eliteshop Express
- **Domain:** eliteshopexpress.com
- **Model:** Print-on-demand (POD) personalized apparel — T-Shirts, Hoodies, Long Sleeve Tees,
  Crewnecks, Tank Tops. Every design can be personalized (name, text, initials, photo-based
  "pet portrait" style prints). Built on the theme's own `wp_pod_variants` engine
  (Style × Color, size handled via `wp_pod_size_prices`) — see `.plans/pod-variants-plan.md`.
  No traditional WooCommerce Variable Products.
- **Market:** United States only. Prices in USD. Never claim "Made in the USA" / "printed in the USA" / "shipped from the USA" anywhere.
- **Positioning:** Modern, trustworthy, CRO-focused storefront. Personalization is the core
  differentiator — every section should reinforce "make it yours," not generic catalog browsing.
- **Support email:** support@eliteshopexpress.com
- **Business hours:** Monday–Friday, 9:00 AM–6:00 PM EST
- **Company address (placeholder — verify/replace with the real registered business address
  before launch):** 447 Broadway, 2nd Floor, New York, NY 10013, United States
- **Social:** none displayed (removed 2026-10-09)

## 2. Fulfillment & Policy Facts (used across footer, shipping, FAQ, terms)

- Processing time: 2–4 business days before a design goes into production/print
- US shipping: 5–7 business days after dispatch (standard); no international shipping for now
- Free shipping threshold: orders over $50 (US)
- Returns: non-personalized items returnable within 30 days of delivery (unworn/unwashed, customer pays
  return shipping, no restocking fee, email first). **Personalized items are final sale** unless damaged,
  defective, misprinted or incorrect — report within 30 days with photo → free replacement or full refund
  incl. shipping, usually no return needed
- Cancellations/changes: free before production starts; not possible once printing begins
- Refunds: to original payment method within 3–5 business days of approval (+5–10 days bank posting)
- Lost packages: contact us if not delivered within 15 business days of dispatch
- Secure checkout via WooCommerce (cards, PayPal, Apple Pay icons in footer — decorative only,
  do not claim a payment method isn't actually wired up in WooCommerce settings)
- Order tracking: `/track-order/` page, order number + email lookup

## 3. Pages & Routing (existing theme routes — do not add new ones)

| URL | Template | Notes |
|---|---|---|
| `/` | `front-page.php` → `template-parts/page-home.php` | Homepage, this brief's main focus |
| `/shop/` | WooCommerce shop (not modified this pass) | |
| `/about-us/` | `template-parts/page-about.php` (virtual page) | |
| `/contact-us/` | `template-parts/page-contact.php` (virtual page) | Form posts to `admin-post.php?action=lbq_contact_form`, see `inc/contact-form.php` (not edited) |
| `/faq/` | `template-parts/page-faq.php` (virtual page) | |
| `/privacy-policy/` | `template-parts/page-privacy.php` (virtual page) | |
| `/shipping-returns/` | `template-parts/page-shipping-returns.php` (virtual page) | |
| `/terms-conditions/` | `template-parts/page-terms-conditions.php` (virtual page) | |
| `/track-order/` | `template-parts/page-track-order.php` (virtual page) | Uses pure CSS `assets/css/track-order.css`, not Tailwind |
| `404.php` | Not-found page | |

Nav/footer category links (Men / Women / Kids / Personalized Gifts) point to `/shop/` —
the store's WooCommerce product categories still belong to the previous "beauty accessories"
catalog in the database; creating real apparel categories is a site-config/DB change and is
**out of scope** for this pass (per explicit instruction not to touch site config or DB).

## 4. Header Navigation

Home, Men, Women, Kids, Personalized Gifts, How It Works (anchor to homepage section),
Track Order. Icons: search, account, cart (side-cart drawer via `.xoo-wsc-cart-trigger`,
already wired in `inc/side-cart.php` + `assets/js/main.js`).

## 5. Footer Columns

1. Brand — wordmark, short blurb, company address (GMC business-identity signal). No social links.
2. Shop — Shop All, Men, Women, Kids, Personalized Gifts (→ `/shop/`)
3. Support — About Us, How It Works, FAQ, Track Order, Contact Us, My Account
4. Policy — Privacy Policy, Terms & Conditions, Shipping Policy, Return & Refund Policy
   (`/shipping-returns/#returns`) — added for Google Merchant Center policy discoverability
5. Customer Care — support email, business hours, reply time, accepted payment icons. No newsletter form.

## 6. Out of scope this pass (explicitly not touched)

- WooCommerce product/shop/cart/checkout templates and their CSS
  (`archive-product.php`, `content-product.php`, `shop.css`, `cart.css`, `checkout.css`)
- Any `inc/*.php` file (menu helpers, product categories, contact form backend, POD variants)
- WordPress site config (site title/tagline, permalinks, WooCommerce settings) and database
  content (products, categories, pages, options)
