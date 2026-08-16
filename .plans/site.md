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
| Category | Handcrafted luxury custom watches |
| Market | United States |
| Positioning | An independent American atelier. Each watch is assembled and finished by hand, powered by a Japanese automatic movement. |
| Support email | support@chronelwatches.com |
| Atelier email | atelier@chronelwatches.com |
| Support hours | Monday – Friday, 9:00 AM – 6:00 PM PST |
| Order number prefix | `CHR-` |

### 1.1 Brand voice rules

- Sentences are short. One idea per sentence.
- Say what a thing **is**, not how exciting it is.
- Numbers over adjectives: `28,800 vph`, `200m`, `316L`, `5 years`.
- Never write "best", "amazing", "stunning", "unbeatable".
- **Never name, reference, or compare to any other watch brand.** Not in copy, alt text,
  meta descriptions, schema, or code comments. CHRONEL is described only on its own terms.
- Describe design language generically: *fluted bezel*, *dive bezel*, *day-date display*,
  *pilot dial*, *oyster-style bracelet is NOT allowed* → use *three-link bracelet*.

### 1.2 Product truth (what we may claim)

- Cases: 316L stainless steel, hand-brushed and polished.
- Movements: **Japanese automatic**, imported from Japan. 24 jewels, 28,800 vph, ~40h reserve.
- Crystal: sapphire, anti-reflective coating.
- Assembly: by hand, in our United States atelier.
- Water resistance: 100m standard, 200m on The Abyss.
- Warranty: 5 years on the movement, lifetime service program.
- Each piece carries an individual serial number.

---

## 2. Collections (WooCommerce `product_cat`)

Exactly four. These are the only top-level collections.

| Slug | Name | Character | Signature |
|---|---|---|---|
| `the-meridian` | **The Meridian** | The everyday dress watch | Fluted bezel, sunburst dial, date at 3 |
| `the-abyss` | **The Abyss** | The dive watch | 60-minute rotating bezel, 200m, luminous markers |
| `the-sovereign` | **The Sovereign** | The statement piece | Day and date display, champagne dial, five-link bracelet |
| `the-aviator` | **The Aviator** | The pilot's watch | 24-hour scale, second time zone hand, deep blue dial |

Supporting category: `limited-editions` (used for badges/filters, not shown as a main collection).

---

## 3. Pages & routes

Static pages are hardcoded PHP in `template-parts/` and served as virtual pages.

| Route | Template part | Purpose |
|---|---|---|
| `/` | `page-home.php` | Hero, collections, atelier story, movement, service |
| `/collections/` | `page-collections.php` | The four collections, side by side |
| `/custom/` | `page-custom.php` | Bespoke commission service — **enquiry form only, no configurator** |
| `/about-us/` | `page-about.php` | Atelier story, craft process, people |
| `/contact-us/` | `page-contact.php` | Contact form + details |
| `/faq/` | `page-faq.php` | Ownership, service, shipping, returns |
| `/service-warranty/` | `page-shipping-policy.php` | Shipping, delivery, warranty & service |
| `/returns/` | `page-refund-return-policy.php` | Returns and refunds |
| `/privacy-policy/` | `page-privacy.php` | Privacy |
| `/terms-conditions/` | `page-terms-conditions.php` | Terms |
| `/track-order/` | `page-track-order.php` | Order tracking |
| `/shop/` | `woocommerce/archive-product.php` | All watches |
| 404 | `404.php` | Not found |

### 3.1 Custom page — scope

The custom service is **presented, not configured**. The page explains the commission
process in four steps and ends in a single enquiry form (`#contact-form`, reusing the
existing AJAX handler). There is no live builder, no price calculator, no product variants.

---

## 4. Homepage sections (in order)

1. **Hero** — full-bleed, one watch, one line of copy, two links (Collections / The Atelier).
2. **Collections** — the four collections as tall cards.
3. **Featured watches** — live WooCommerce products (falls back to nothing if empty).
4. **The Atelier** — craft story, split layout, three proof points.
5. **The Movement** — Japanese automatic caliber, specification list.
6. **Bespoke** — quiet band linking to `/custom/`.
7. **Service & Warranty** — four assurances.
8. **Newsletter** — single field, restrained.

---

## 5. Navigation

**Primary:** Collections · The Atelier · Bespoke · Service · Contact
**Utility:** Search · Account · Cart
**Footer columns:** Collections · Maison · Client Care · Legal

---

## 6. Standard copy blocks

- Tagline: `Hand-assembled in America. Powered by Japan.`
- Hero line: `Time, measured by hand.`
- Shipping: `Complimentary insured shipping on every order within the United States.`
- Returns: `30 days to return an unworn watch in its original condition.`
- Warranty: `Five-year movement warranty. Lifetime service.`
- Bespoke: `A watch built to your specification, one at a time.`

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
| `assets/img/atelier/{movement,workbench}.svg` | Craft illustrations |
| `assets/img/payment/{visa,mastercard,amex,paypal}.svg` | Checkout trust row |
