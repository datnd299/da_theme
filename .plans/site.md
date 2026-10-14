# Site Info — ProudlyWear (proudlywear.com)

Rebuilt 2026-10-14 on the `proudlywear.com` branch from the SlickTee POD theme (keeps the
`wp_pod_variants` engine, side cart, contact form). Content modelled on proudvet365.com
(veteran apparel), rewritten for ProudlyWear — no text, reviews or business details copied.

## 1. Business

- **Brand:** ProudlyWear (wordmark "Proudly" navy + "Wear" red; domain proudlywear.com).
  Tagline: "Proudly Served · Proudly Worn". Logo: inline SVG shield (navy field, white star,
  red/white stripes, brass outline) in header/footer; favicon `assets/images/favicon.svg`.
- **Legal entity / address / phone:** NOT published yet — owner to confirm. Until then the site
  shows email + contact form + support hours only. Add them to footer, contact, privacy, terms and
  shipping pages together when known.
- **Email:** support@proudlywear.com — replies within 24 hours, Monday–Friday
- **Support hours:** Monday–Friday, 9am–5pm ET
- **Model:** Print-on-demand veteran & military-family apparel and home goods — t-shirts,
  hoodies & zip-ups, sweatshirts, polo shirts, bomber jackets, hats & caps, flags, metal signs.
- **Market:** United States only (all 50 states). Prices in USD.
- **Positioning:** "Served with honor. Worn with pride." For veterans of every branch/era and
  their families. Original artwork only.
- **Must NOT claim:** official licensing or DoD/VA/branch endorsement; official seals, emblems or
  insignia; "veteran-owned"; donations/charity; "Made in USA"; reviews/ratings (no review
  platform set up yet); coupon codes that don't exist in WooCommerce.
- Footer + Terms "Intellectual property" + FAQ carry the non-affiliation disclaimer.

## 2. Fulfillment & Policy Facts (header, footer, home, FAQ, contact, track, shipping, terms)

- Production: 3–5 business days (made to order, quality-checked)
- US delivery after dispatch: 4–8 business days (total ~7–13 business days); tracking on every order,
  first update can take 2–5 business days
- Shipping fee: **free standard US shipping on orders $49+** (subtotal after discounts);
  under $49: $5.99 first item + $1.99 each additional → WooCommerce shipping zone must match
- No shipping to APO/FPO/DPO, PO boxes or outside the US
- Changes/cancellation: within 6 hours of ordering, before production → full refund
- Returns: 30 calendar days from delivery, unworn/unwashed/original condition; return
  authorization by email first; customer pays return shipping for change of mind/size; no restocking fee;
  personalized items not returnable for change of mind
- Damaged/defective/wrong item: report within 7 days with photos → free replacement or full refund, no return shipping
- Late/lost: contact 5 business days after estimated delivery → reship or full refund
- Refunds: processed within 5 business days of approval; bank 5–10 business days
- Payments: Visa, Mastercard, American Express, PayPal; charged when the order is placed
- Governing law in Terms: United States + customer's state of residence

## 3. Pages & Routing (existing theme routes — do not add new ones)

| URL | Template | Notes |
|---|---|---|
| `/` | `template-parts/page-home.php` | Hero, honor ticker, live New Arrivals, 8 category tiles, live Best Sellers, shop by branch (navy band), "Why wear military apparel?" (6 points), order steps, search + "Have a question?" |
| `/about-us/` | `template-parts/page-about.php` | Story, mission, range, promises, non-affiliation note |
| `/contact-us/` | `template-parts/page-contact.php` | Form posts to `admin-post.php?action=lbq_contact_form` (`inc/contact-form.php`, mails support@proudlywear.com) |
| `/faq/` | `template-parts/page-faq.php` | Groups `#orders #changes #shipping #returns #products` + `#size-guide` |
| `/shipping-returns/` | `template-parts/page-shipping-returns.php` | `#shipping`, `#delivery-issues`, `#cancel`, `#returns` |
| `/privacy-policy/` | `template-parts/page-privacy.php` | |
| `/terms-conditions/` | `template-parts/page-terms-conditions.php` | `#payment` (payment methods), `#ip` (DMCA + non-affiliation) |
| `/track-order/` | `template-parts/page-track-order.php` | Pure CSS `assets/css/track-order.css` |
| `404.php` | Not-found page | "This page went AWOL." |

## 4. Product categories (linked via `dawp_product_category_url()`)

- Product types (also auto-created by `inc/product-categories.php`, shown as shop chips when non-empty):
  `t-shirts`, `hoodies`, `sweatshirts`, `polo-shirts`, `bomber-jackets`, `caps`, `flags`, `metal-signs`
- Branches: `army`, `navy`, `air-force`, `marine-corps`, `coast-guard`, `military-family`
  (labels "Army Veterans" etc. — create in WooCommerce when products are imported)
- Collections: `new-arrivals`, `best-seller` (homepage rows fall back to newest / most-sold when empty)

## 5. Header Navigation

Shop (dropdown: product types) · By Branch (dropdown) · New Arrivals · Best Sellers · Track Order · FAQs.
Icons: search (FiboSearch or native), account, cart (side-cart drawer via `.xoo-wsc-cart-trigger`).
Side cart (`inc/side-cart.php`): navy header + flag rule, free-shipping progress bar toward $49
(`DAWP_FREE_SHIPPING_MIN`, subtotal after discounts, refreshed as a fragment), footer hidden when empty.
Top: thin red/white/blue flag stripe + navy marquee (free US shipping $49+, proudly serving those who
served, printed to order, 30-day returns, secure checkout).

## 6. Footer

Khaki promise strip (Free US Shipping $49+, Secure Checkout, 30-Day Returns, Made to Order) → flag stripe →
navy footer: logo + blurb + email/hours/contact link · Shop · Customer Care · Policies (Shipping, Return &
Refund, Cancel/Change, Payment Methods, Privacy, Terms, DMCA) · non-affiliation disclaimer · payment icons.
