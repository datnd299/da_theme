# CHRONEL — Site Specification

> Source of truth for all copy, structure, and naming in this theme.
> Language: **English (US market)**. Tone: **luxury, minimal, sparing** — short declarative
> sentences, no exclamation marks, no hype adjectives, no emoji.

---

## 1. Brand

| Field | Value |
|---|---|
| Brand name | **CHRONEL** |
| Domain | chronelwatches.com |
| Category | Independent online watch store (retailer) |
| Market | United States |
| Positioning | An independent online watch store. CHRONEL does **not** manufacture watches; it selects dress, dive, statement, and pilot watches from established makers and describes each one plainly. |
| Support email | support@chronelwatches.com |
| Product questions email | atelier@chronelwatches.com (label it "Product questions", never "The atelier") |
| Support hours | Monday – Friday, 9:00 AM – 5:00 PM (GMT-05:00) Eastern Time (New York) |
| Support response time | Within 1 business day |
| Order number prefix | `CHR-` |

### 1.1a Fulfillment & shipping (used across Shipping Policy, FAQ, Terms of Service)

| Field | Value |
|---|---|
| Order cutoff time | 5:00 PM (GMT-05:00) Eastern Time (New York). Orders placed after cutoff, or on a weekend/holiday, begin processing the next business day — the order keeps its place in line. |
| Order handling time | 1–2 business days, Monday to Friday. Covers order verification, packing, and dispatch. |
| Transit time | 3–5 business days, Monday to Friday. |
| Total estimated delivery time | 4–7 business days (handling + transit), for in-stock watches shipped within the United States. |
| Payment processor | PayPal. Accepts PayPal balance and Visa/Mastercard/American Express via PayPal Checkout — no PayPal account required to pay by card. |

### 1.1 Brand voice rules

- Sentences are short. One idea per sentence.
- Say what a thing **is**, not how exciting it is.
- Numbers over adjectives: `5 years`, `30 days`, `4–7 business days`.
- Never write "best", "amazing", "stunning", "unbeatable".
- **Never compare CHRONEL to other watch brands** in marketing copy. Product pages and product
  data, however, **must** state the real maker/brand of each watch (GMC `brand` must match).
- Describe design language generically: *fluted bezel*, *dive bezel*, *day-date display*,
  *pilot dial*, *oyster-style bracelet is NOT allowed* → use *three-link bracelet*.

### 1.2 Product truth (what we may claim)

CHRONEL is a **retailer**. Products are made by other brands. Google Merchant Center treats
any mismatch between site copy and the real product as Misrepresentation.

- **Never claim** CHRONEL makes, assembles, finishes, regulates, tests, engraves, or numbers
  watches. No "atelier", "by hand", "handcrafted", "watchmaker", "bench", in-house calibre
  (e.g. "CH-01"), serial numbers, certificates, or founding/staff figures that are not verified.
- **Never state site-wide specs** (movement type, jewels, vph, case material, crystal, water
  resistance, case size). These vary by model and live only on each product page, as supplied
  by the maker.
- May claim: a curated selection; plain descriptions; the store policies below.
- Warranty: 5 years on the movement, lifetime service program (store policy — confirm before changing).

---

## 2. Collections (WooCommerce `product_cat`)

Exactly four. These are the only top-level collections.

| Slug | Name | Character | Signature |
|---|---|---|---|
| `the-meridian` | **The Meridian** | Everyday dress watches | Clean dials, everyday sizes |
| `the-abyss` | **The Abyss** | Dive-style watches | Rotating bezels, luminous markers |
| `the-sovereign` | **The Sovereign** | Statement watches | Gold-tone and two-tone finishes, bold dials |
| `the-aviator` | **The Aviator** | Pilot-style watches | Large legible numerals, pilot dials |

Collection descriptions describe the *style* of watch only — never construction or specs.

Supporting category: `limited-editions` (used for badges/filters, not shown as a main collection).

---

## 3. Pages & routes

Static pages are hardcoded PHP in `template-parts/` and served as virtual pages.

| Route | Template part | Purpose |
|---|---|---|
| `/` | `page-home.php` | Hero, collections, how we choose, movement types, service |
| `/about-us/` | `page-about.php` | Who we are, how we choose, movement types, principles |
| `/contact-us/` | `page-contact.php` | Contact form + details |
| `/faq/` | `page-faq.php` | Ownership, service, shipping, returns |
| `/shipping-policy/` | `page-shipping-policy.php` | Shipping Policy — cutoff, handling, transit, delivery |
| `/service-warranty/` | `page-service-warranty.php` | Warranty & lifetime service programme |
| `/returns/` | `page-refund-return-policy.php` | Return & Refund Policy |
| `/billing-terms/` | `page-billing-terms.php` | Billing Terms & Conditions — payment, currency, billing |
| `/privacy-policy/` | `page-privacy.php` | Privacy Policy |
| `/terms-conditions/` | `page-terms-conditions.php` | Terms of Service |
| `/track-order/` | `page-track-order.php` | Order tracking |
| `/shop/` | `woocommerce/archive-product.php` | All watches |
| 404 | `404.php` | Not found |

CHRONEL no longer offers bespoke/custom commissions. `/collections/` and `/custom/`
redirect (301) to `/shop/` and `/` respectively — see `dawp_virtual_page_redirects()`
in `inc/virtual-pages.php`.

---

## 4. Homepage sections (in order)

1. **Hero** — full-bleed, one watch, one line of copy, two links (Collections / About Us).
2. **Collections** — the four collections as tall cards.
3. **Featured watches** — live WooCommerce products (falls back to nothing if empty).
4. **How we choose** — selection story, split layout, three proof points.
5. **The Movement** — automatic / mechanical / quartz explained; specs are per model.
6. **Service & Warranty** — four assurances.
7. **Newsletter** — single field, restrained.

---

## 5. Navigation

**Primary:** Home · Shop · Contact Us · Track Order
**Utility:** Search · Account · Cart
**Footer columns:** Collections · Maison · Client Care · Legal

---

## 6. Standard copy blocks

- Tagline: `Fewer watches, chosen with care.`
- Hero line: `Time, well chosen.`
- Shipping: `Complimentary insured shipping on every order within the United States.`
- Delivery estimate: `4-7 business days: 1-2 business days handling, 3-5 business days transit.`
- Returns: `30 days to return an unworn watch in its original condition.`
- Warranty: `Five-year movement warranty. Lifetime service.`

---

## 7. Assets

All imagery is **vector (SVG)**, drawn in-house, stored in `assets/img/`.

| Path | Use |
|---|---|
| `assets/img/logo-chronel.svg` | Wordmark, dark on light |
| `assets/img/logo-chronel-light.svg` | Wordmark, light on dark |
| `assets/img/favicon.svg` | Brand mark only |
| `assets/img/watches/{meridian,abyss,sovereign,aviator}.svg` | Collection watches |
| `assets/img/hero/hero-watch.svg` | Homepage hero watch |
| `assets/img/atelier/{movement,workbench}.svg` | Mood imagery (movement explainer, About) — never captioned as our workshop |
| `assets/img/payment/{visa,mastercard,amex,paypal}.svg` | Checkout trust row |
