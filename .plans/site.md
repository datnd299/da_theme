# Site Info — SlickTee (slicktee.com)

Content source: adapted 2026-10-12 from the previous brand's live site (home, about, contact, FAQs, shipping,
refund, payment methods, privacy, terms, DMCA), captured 2026-10-12. Redesigned on the
`anime.com` branch (forked from `big_pod`), keeping all POD features.

## 1. Business

- **Brand:** SlickTee (written SLICKTEE in the wordmark; domain slicktee.com). Tagline: "Fan Art Merch". Logo: red tee-shaped badge with an "S" + Anton wordmark, inline SVG in header/footer; favicon at `assets/images/favicon.svg`.
- **Legal entity:** not published — brand name SlickTee only (no Ltd / company number until the owner confirms the registered entity)
- **US Address:** 304 S. Jones Blvd #3456, Las Vegas, NV 89107, United States
- **Email:** support@slicktee.com — replies within 24 hours
- **Phones:** US +1 909-366-3939
- **Support hours:** Mon–Fri 10am–6pm, Saturday 8am–6pm
- **Model:** Print-on-demand fan art apparel — vintage-washed tees, hoodies, sweatshirts, tank
  tops, shorts, leg pants, caps, kids' shirts, classic tees. Built on the theme's own
  `wp_pod_variants` engine (Style × Color × Size) — see `.plans/pod-variants-plan.md`.
- **Market:** Worldwide (US is the main market). Prices in USD.
- **Positioning:** fan-made artwork from anime, games, cartoons, comics, horror and movies.
  Never claim products are "officially licensed" or endorsed; footer + Terms §7 carry a
  fan-art / trademark-owner disclaimer and a DMCA notice process.
- **Production claims allowed (from the live About page):** premium cotton, vintage wash,
  DTG printing with Brother machines and OEKO-TEX® ECO PASSPORT certified inks.
- **Reviews:** homepage shows a carousel of real customer photo reviews supplied by the owner
  (texts verbatim except old "Artsholic" brand mentions removed; photos in `assets/images/home/reviews/`). No fabricated testimonials,
  edited quotes or aggregate rating numbers on the site.

## 2. Fulfillment & Policy Facts (used in header, footer, FAQ, shipping, terms)

- Processing: 2–3 business days (made to order)
- Shipping after dispatch: 5–10 business days; tracking on every order
- Shipping fee: **free shipping on orders over $49**; under $49, shipping is calculated at checkout. Do not state any other per-item shipping rate.
- Spend & Save (auto, no code): 5% off item subtotal $69+, 10% off $99+, 15% off $139+ (highest tier only; logic in inc/woo-tweaks.php)
- No shipping to APO/FPO or PO boxes
- Lost package: report within 4 days after estimated delivery → free reprint + reship
- Changes/cancellation: within 24 hours of ordering; afterwards in production, no changes
- Returns: bespoke goods — only damaged, defective print, wrong size/color/design/style sent;
  request within 14 days of receipt with photo; no return shipping/restocking fees in those cases
- Refunds: full or partial; PayPal immediate, cards 5–10 business days
- Payments: Visa, Mastercard, American Express, PayPal; charged when the order is placed
- Governing law in Terms: England & Wales (+ consumer's local mandatory protections)

## 3. Pages & Routing (existing theme routes — do not add new ones)

| URL | Template | Notes |
|---|---|---|
| `/` | `template-parts/page-home.php` | Hero, fandom ticker, shop by product (8 tiles), shop by fandom, live best sellers, why us, order steps, search + reviews CTA |
| `/about-us/` | `template-parts/page-about.php` | |
| `/contact-us/` | `template-parts/page-contact.php` | Form posts to `admin-post.php?action=lbq_contact_form` (`inc/contact-form.php`, mails support@slicktee.com) |
| `/faq/` | `template-parts/page-faq.php` | Includes `#size-guide` (live site's /size-guide/ equivalent) |
| `/shipping-returns/` | `template-parts/page-shipping-returns.php` | `#shipping`, `#delivery-issues`, `#cancel`, `#returns` |
| `/privacy-policy/` | `template-parts/page-privacy.php` | |
| `/terms-conditions/` | `template-parts/page-terms-conditions.php` | `#payment` (payment methods), `#ip` (DMCA) |
| `/track-order/` | `template-parts/page-track-order.php` | Pure CSS `assets/css/track-order.css` |
| `404.php` | Not-found page | |

## 4. Product categories (live slicktee.com slugs, linked via `dawp_product_category_url()`)

- Product types: `vintage-shirts`, `vintage-shirt-for-kids`, `vintage-tank-top`,
  `vintage-sweatshirt`, `vintage-hoodie`, `vintage-shorts`, `vintage-caps`,
  `vintage-leg-pants`, `classic-tee`
- Fandoms: `anime` (child `pokemon`), `cartoon-animated`, `game-art`, `horror`,
  `marvel-comics`, `movies`
- Collections: `new-arrivals`, `best-seller`

These slugs do not exist in the local dev DB (links fall back to `/product-category/<slug>/`).

## 5. Header Navigation

Products (dropdown of product types) · Fandoms (dropdown) · New Arrivals · Best Sellers ·
Track Order · FAQs. Icons: search, account, cart (side-cart drawer via `.xoo-wsc-cart-trigger`).
Top marquee: worldwide shipping, printed to order, free replacement for misprints, secure checkout.

## 6. Footer

Yellow promise strip (Worldwide Shipping, Secure Payments, Easy Fixes, Premium Cotton) →
ink footer: brand + UK/US addresses + company number · Shop · Help · Policies (Shipping,
Refund & Return, Cancel/Change, Payment Methods, Privacy, Terms, DMCA) + Customer Care
(email, phones, hours) · fan-art disclaimer + payment icons (Visa, Mastercard, Amex, PayPal).
