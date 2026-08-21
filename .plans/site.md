# Site Definition - US Watch Store

This file is the single source of truth for brand, content, and copy across the theme.
Every editable file (header, footer, template-parts, woocommerce templates) MUST stay
consistent with the facts below. If a fact needs to change, update it here first.

## 1. Brand

- **Store name:** US Watch Store
- **Domain:** uswatchstore.com
- **Niche:** Watch retailer serving customers across the United States
- **Tagline:** "Precision Timepieces, Delivered Across America"
- **One-line positioning:** An American watch shop offering quartz, mechanical, smart,
  and digital watches for everyday wear, gifting, and collecting - curated for quality,
  backed by warranty, shipped fast from the US.
- **Tone of voice:** Confident, precise, no-nonsense. Short sentences. Avoid flowery
  language. Speak like a specialist retailer, not a lifestyle blog.
- **Order number prefix:** `USWS-` (see `custom_woocommerce_order_prefix` in
  `inc/theme-setup.php`)

## 2. Contact & Business Info

- **Support email:** support@uswatchstore.com
- **Business hours:** Monday - Friday, 9:00 AM - 6:00 PM EST
- **Store address (US):** 1420 Kettner Blvd, San Diego, CA 92101, United States
- **Instagram:** https://www.instagram.com/uswatchstore/
- **Facebook:** https://www.facebook.com/uswatchstore/
- **Placeholder notice:** address/social links are placeholders - replace with the real
  business details before launch.

## 3. Product Categories (WooCommerce `product_cat`)

Defined in `inc/product-categories.php`. Exactly four categories, no sub-niches:

| Slug | Name | Short card copy |
|---|---|---|
| `quartz-watches` | Quartz Watches | Battery-powered precision with reliable, low-maintenance timekeeping. |
| `mechanical-watches` | Mechanical Watches | Traditional automatic and hand-wound movements built for collectors. |
| `smartwatches` | Smartwatches | Connected watches with fitness tracking, notifications, and apps. |
| `digital-watches` | Digital Watches | Rugged, readable digital displays built for everyday durability. |

## 4. Value Propositions (used in hero, home highlights, product page trust badges)

1. **Free US Shipping** on all orders
2. **2-Year Warranty** on every watch
3. **30-Day Returns** - no questions asked
4. **Quality Assured** - every watch inspected before it ships

## 5. Page Content Map

- `front-page.php` → `template-parts/page-home.php`: Hero, 4-category grid, value
  props strip, new-arrivals product grid (dynamic WP_Query, keep), why-us section,
  testimonials, newsletter/CTA.
- `template-parts/page-about.php`: Brand story (why US Watch Store exists), what we
  stand for (quality inspection, curated brands across all 4 categories), timeline or
  pillars section, CTA to shop.
- `template-parts/page-contact.php`: Contact form (name/email/topic/order#/message -
  logic already in `inc/contact-form.php`, do not change field names), info blocks
  (email, hours, address), FAQ teaser linking to `/faq/`.
- `template-parts/page-faq.php`: Watch-specific FAQs - sizing/strap adjustment, water
  resistance ratings, battery replacement (quartz/digital), automatic movement care
  (mechanical), smartwatch compatibility (iOS/Android), warranty, shipping, returns,
  quality assurance.
- `template-parts/page-privacy.php`: Standard e-commerce privacy policy, brand name
  swapped to US Watch Store / uswatchstore.com.
- `template-parts/page-shipping-policy.php`: Processing 1-3 business days, US shipping
  3-7 business days, free shipping on all orders.
- `template-parts/page-return-refund-policy.php`: 30-day no-questions-asked returns,
  2-year warranty claims process, refund-to-original-payment-method terms.
- `template-parts/page-billing-terms.php`: Accepted payment methods (Visa, Mastercard,
  Amex, PayPal), when the card is charged, pricing/tax/currency terms, billing
  disputes and chargebacks.
- `template-parts/page-terms-of-service.php`: Standard site/store terms, brand name
  swapped.
- `template-parts/page-track-order.php`: Order tracking form/lookup, brand name
  swapped, keep existing logic/markup contract.
- `woocommerce/archive-product.php` (Shop): Shop hero copy, category filter chips for
  the 4 categories.
- `woocommerce/content-product.php` (Product card): generic, brand-agnostic - verify
  no leftover niche wording only.

## 6. Imagery Policy

Real logo artwork and watch product photography are available in `assets/img/`:

- `assets/img/logo.png` - wordmark logo, transparent background. Used via `<img>` in
  `header.php` and `footer.php` (wrapped in a white chip in the footer since the mark's
  navy/red palette needs a light backing on the dark footer).
- `assets/img/hero.png` - transparent-background watch cutout used in the homepage hero.
- `assets/img/about_1.webp`, `assets/img/about_2.webp` - supporting product photography
  used in `template-parts/page-about.php`.
- `assets/img/cat/{Quazt,mechanic,smart,digital}.webp` - one photo per watch category
  (quartz, mechanical, smartwatches, digital), used on the homepage category grid.

Inline SVG line-art icons (shield, mail, truck, etc.) are still used for small
non-photographic iconography (feature bullets, trust badges) - only the product/logo
imagery above was previously a placeholder.
