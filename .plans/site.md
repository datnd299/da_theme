# Site Definition - US Watch Store / USWS

This file is the single source of truth for brand, content, and copy across the theme.
Every editable file (header, footer, template-parts, woocommerce templates) MUST stay
consistent with the facts below. If a fact needs to change, update it here first.

## 1. Brand

- **Store / company name:** US Watch Store
- **In-house watch label:** USWS (this is the only brand of watch sold here)
- **Domain:** uswatchstore.com
- **Niche:** US Watch Store designs and assembles its own line of self-winding
  automatic (mechanical) watches under the USWS label. USWS is the only brand sold on
  the site. No quartz, no smartwatches. Do NOT frame the brand story around "we used
  to resell / we stopped reselling" - just present USWS as our own watch line.
- **Tagline:** "Automatic watches, designed and assembled in-house."
- **One-line positioning:** USWS by US Watch Store is a small line of self-winding
  automatic watches offered in two styles - Classic and Elegant. Every watch is
  designed, assembled, timed, and inspected by USWS before it ships, backed by a
  2-year warranty and free US shipping.
- **Origin claim:** Watches are "designed and assembled by USWS." Do NOT claim a
  specific country or city of manufacture anywhere in the copy.
- **Movement:** Self-winding automatic only. Never mention quartz, battery,
  hand-wound, digital, or smart features.
- **Tone of voice:** Confident, precise, no-nonsense. Short sentences. Speak like a
  watchmaker who builds the product, not a lifestyle blog and not a marketplace.
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

Defined in `inc/product-categories.php`. Exactly two style families - both are
self-winding automatic watches, they differ only in design intent:

| Slug | Name | Short card copy |
|---|---|---|
| `classic-style` | Classic Style | Everyday automatics with legible dials and understated steel cases. |
| `elegant-style` | Elegant Style | Dress automatics with slim profiles, polished finishing, and refined detailing. |

## 4. Value Propositions (used in hero, home highlights, product page trust badges)

1. **Free US Shipping** on all orders
2. **2-Year Warranty** on every USWS watch
3. **30-Day Returns** - no questions asked
4. **Assembled & Timed In-House** - every watch is regulated and inspected before it ships

## 5. Page Content Map

- `front-page.php` -> `template-parts/page-home.php`: Hero, 2-style grid (Classic /
  Elegant), value props strip, new-arrivals product grid (dynamic WP_Query, keep),
  in-house craft section, why-USWS section, support/trust section.
- `template-parts/page-about.php`: Why USWS exists (a watch shop that decided to build
  its own instead of reselling), how a USWS watch is made (design -> assembly ->
  timing -> inspection), the two styles, standards, support.
- `template-parts/page-contact.php`: Contact form (name/email/topic/order#/message -
  logic already in `inc/contact-form.php`, do not change field names), info blocks
  (email, hours, address), FAQ teaser linking to `/faq/`.
- `template-parts/page-faq.php`: USWS-specific FAQs - what USWS is, automatic movement
  basics (winding, power reserve, accuracy tolerance, daily wear), strap/bracelet
  sizing, water resistance ratings, servicing an automatic, warranty, shipping,
  returns, in-house inspection. No quartz/battery/smartwatch content.
- `template-parts/page-privacy.php`: Standard e-commerce privacy policy, brand name
  US Watch Store / uswatchstore.com.
- `template-parts/page-shipping-policy.php`: Processing 1-3 business days, US shipping
  3-7 business days, free shipping on all orders.
- `template-parts/page-return-refund-policy.php`: 30-day no-questions-asked returns,
  2-year USWS warranty claims process (movement and assembly defects; no battery
  language), refund-to-original-payment-method terms.
- `template-parts/page-billing-terms.php`: Accepted payment methods (Visa, Mastercard,
  Amex, PayPal), when the card is charged, pricing/tax/currency terms, billing
  disputes and chargebacks.
- `template-parts/page-terms-of-service.php`: Standard site/store terms; US Watch Store
  is described as the maker of the USWS automatic watch line.
- `template-parts/page-track-order.php`: Order tracking form/lookup, brand name
  swapped, keep existing logic/markup contract.
- `woocommerce/archive-product.php` (Shop): Shop hero copy, category filter chips for
  the two styles.
- `woocommerce/content-product.php` (Product card): generic, brand-agnostic - verify
  no leftover niche wording only.

## 6. Imagery Policy

Logo artwork and USWS product photography live in `assets/img/`. The three watch
photos are transparent-background WebP cutouts (white studio background knocked out,
resized ~950px longest edge, ~55KB each):

- `assets/img/logo.png` - wordmark logo, transparent background. Used via `<img>` in
  `header.php` and `footer.php` (wrapped in a white chip in the footer since the mark's
  navy/red palette needs a light backing on the dark footer).
- `assets/img/hero.webp` - blue-dial Roman-numeral automatic on a steel bracelet;
  homepage hero (sits on the dark gradient, so it must stay a clean transparent cutout).
- `assets/img/cat/classic.webp` - black-dial steel automatic; Classic Style card, and
  the second About supporting figure.
- `assets/img/cat/elegant.webp` - blue-dial two-tone (steel/gold) automatic; Elegant
  Style card, and the About hero figure.

If the photos are replaced, re-run the knockout/resize pass (transparent WebP, longest
edge ~950px) so they keep working on both light panels and the dark hero.

Inline SVG line-art icons (gear, shield, magnifier, etc.) are still used for small
non-photographic iconography (feature bullets, trust badges).
