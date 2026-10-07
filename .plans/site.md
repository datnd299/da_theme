# Site Definition - US Watch Store

This file is the single source of truth for brand, content, and copy across the theme.
Every editable file (header, footer, template-parts, woocommerce templates) MUST stay
consistent with the facts below. If a fact needs to change, update it here first.

## 1. Brand

- **Store / company name:** US Watch Store (no separate watch label - the old "USWS"
  in-house label is retired; never use "USWS" anywhere in the copy)
- **Domain:** uswatchstore.com
- **Niche:** US Watch Store is an online watch **retailer**. It sells a curated range
  of everyday and dress watches for men and women - automatic and quartz, analog and
  digital - sourced from established watch suppliers. It does NOT design, make, or
  assemble watches. Never describe the store as a watchmaker or claim an in-house
  line / own brand. Do not name third-party brands in site copy (product titles
  carry their own brand names).
- **Tagline:** "Quality watches for every day, shipped free across the US."
- **One-line positioning:** US Watch Store is an online watch shop offering a
  hand-picked range of men's and women's watches in two style families - Classic and
  Elegant. Every watch is checked before it ships, with 30-day returns and free US
  shipping. The store does NOT offer a warranty - never mention a warranty in copy.
- **Origin claim:** Do NOT claim where watches are made. Product pages carry the
  specifics.
- **Movement:** Mixed catalog - automatic (self-winding) and quartz. Each product page
  states its own movement type; site-wide copy should not promise one type only.
- **Tone of voice:** Confident, precise, helpful. Short sentences. Speak like a
  knowledgeable watch shop that picks and checks what it sells, not a lifestyle blog
  and not a faceless marketplace.
- **Order number prefix:** `UWS-` (see `custom_woocommerce_order_prefix` in
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

Defined in `inc/product-categories.php`. Two style families - each mixes automatic
and quartz pieces for men and women, they differ only in design intent:

| Slug | Name | Short card copy |
|---|---|---|
| `classic-style` | Classic Style | Everyday watches with legible dials and hard-wearing cases. |
| `elegant-style` | Elegant Style | Dress watches with slim profiles, polished finishing, and refined detailing. |

## 4. Value Propositions (used in hero, home highlights, product page trust badges)

1. **Free US Shipping** on all orders
2. **Secure Checkout** - encrypted payments
3. **30-Day Returns** - no questions asked
4. **Checked Before It Ships** - every watch is unboxed, set, and inspected before dispatch

## 5. Page Content Map

- `front-page.php` -> `template-parts/page-home.php`: Hero, 2-style grid (Classic /
  Elegant), value props strip, new-arrivals product grid (dynamic WP_Query, keep),
  how-we-pick section, why-US-Watch-Store section, support/trust section.
- `template-parts/page-about.php`: Who US Watch Store is (an online watch shop),
  how we choose and check what we sell (select -> inspect -> set -> pack), the two
  styles, standards, support.
- `template-parts/page-contact.php`: Contact form (name/email/topic/order#/message -
  logic already in `inc/contact-form.php`, do not change field names), info blocks
  (email, hours, address), FAQ teaser linking to `/faq/`.
- `template-parts/page-faq.php`: Store FAQs - who we are, choosing a watch,
  automatic vs quartz basics (winding, power reserve, battery, accuracy), strap/bracelet
  sizing, water resistance ratings, servicing, shipping, returns, pre-ship
  inspection.
- `template-parts/page-privacy.php`: Standard e-commerce privacy policy, brand name
  US Watch Store / uswatchstore.com.
- `template-parts/page-shipping-policy.php`: Processing 1-3 business days, US shipping
  3-7 business days, free shipping on all orders.
- `template-parts/page-return-refund-policy.php`: 30-day no-questions-asked returns,
  damaged/defective/incorrect-on-arrival handling (no warranty), refund-to-original-
  payment-method terms.
- `template-parts/page-billing-terms.php`: Accepted payment methods (Visa, Mastercard,
  Amex, PayPal), when the card is charged, pricing/tax/currency terms, billing
  disputes and chargebacks.
- `template-parts/page-terms-of-service.php`: Standard site/store terms; US Watch Store
  is described as an online retailer of watches.
- `template-parts/page-track-order.php`: Order tracking form/lookup, brand name
  swapped, keep existing logic/markup contract.
- `woocommerce/archive-product.php` (Shop): Shop hero copy, category filter chips for
  the two styles.
- `woocommerce/content-product.php` (Product card): generic, brand-agnostic - verify
  no leftover niche wording only.

## 6. Imagery Policy

Logo artwork and product photography live in `assets/img/`. The three watch
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
