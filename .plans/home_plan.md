# GraphicTShirtStore — Home Plan

> *Conversion-focused homepage blueprint: structure, content, components, and design rules for the patriotic apparel & custom gift brand.*

---

## 1. Homepage Goal

| Goal | Description |
|---|---|
| **Primary** | Help customers quickly find patriotic apparel, veteran tribute gear, and custom gifts |
| **Secondary** | Explain personalization value and build trust for first-time POD buyers |
| **Emotional** | Create a sense of American pride, service honor, and gift-giving meaning |
| **Commercial** | Drive clicks to product pages and add-to-cart within 3 scrolls |

### Key Performance Targets

| Metric | Target |
|---|---|
| Scroll depth (sections viewed) | 5+ of 7 |
| Click-through to product page | > 8% |
| Newsletter sign-up rate | 3% – 5% |
| Bounce rate | < 50% |
| Time on page | > 2 minutes |

---

## 2. Page Structure Overview

**7 sections — 1 hero + 6 content blocks.**

```
┌─────────────────────────────────────────────┐
│  SECTION 1: Hero + Trust Strip              │
│  Headline + Subheadline + CTAs + Quick Shop │
├─────────────────────────────────────────────┤
│  SECTION 2: Shop By Category                │
│  6 Category Cards with image + copy + CTA   │
├─────────────────────────────────────────────┤
│  SECTION 3: Best Sellers Product Grid       │
│  8 Products — 4 columns desktop             │
├─────────────────────────────────────────────┤
│  SECTION 4: Personalized Apparel Feature    │
│  Value prop: custom name, rank, service yrs │
├─────────────────────────────────────────────┤
│  SECTION 5: Gift By Occasion                │
│  6 Occasion cards — holiday / event gifts   │
├─────────────────────────────────────────────┤
│  SECTION 6: Customer Tributes               │
│  3 Tribute quotes + trust block             │
├─────────────────────────────────────────────┤
│  SECTION 7: Trust + About + Newsletter CTA  │
│  4 Trust cards + brand story + sign-up form │
└─────────────────────────────────────────────┘
```

---

## 3. Section 1 — Hero + Trust Strip

### Purpose

Immediately communicate what GraphicTShirtStore sells, who it's for, and why it matters — then let users start shopping or customizing.

### Hero Content

| Element | Content |
|---|---|
| **Eyebrow** | `American Patriotic Apparel & Custom Gifts` |
| **Headline H1** | `Wear The Freedom. Live The Pride.` |
| **Subheadline** | `Premium graphic tees, bomber jackets, hats, hoodies, and accessories — made for veterans, military families, and proud Americans.` |
| **Primary CTA** | `Shop Best Sellers` → `/best-sellers/` |
| **Secondary CTA** | `Customize Yours` → `/product-category/bomber-jackets/` |
| **Trust Line** | `Secure checkout. Tracking included. Custom gifts made with care.` |

### Visual

| Element | Specification |
|---|---|
| Background | Patriot Navy `#0B1F3A` |
| Hero image | Lifestyle photo: model wearing graphic tee or bomber jacket with American flag background |
| Overlay gradient | `linear-gradient(90deg, rgba(11,31,58,0.94) 0%, rgba(11,31,58,0.7) 50%, rgba(11,31,58,0.15) 100%)` |
| Min height | `clamp(70vh, 600px, 90vh)` desktop, `auto` mobile |
| Padding | `clamp(60px, 8vw, 120px)` top/bottom, `18px` sides |

### Quick-Shop Strip (Below Hero)

4 quick-link cards bridging hero and categories:

```
┌──────────────┐ ┌──────────────┐ ┌──────────────┐ ┌──────────────┐
│ American Flag│ │  Bomber      │ │   Veteran    │ │  Best        │
│ Tees         │ │  Jackets     │ │   Tribute    │ │  Sellers     │
│              │ │              │ │              │ │              │
│ Shop Now →   │ │ Shop Now →   │ │ Shop Now →   │ │ Shop Now →   │
└──────────────┘ └──────────────┘ └──────────────┘ └──────────────┘
```

| Property | Value |
|---|---|
| Layout | 4 equal columns desktop, 2 columns tablet, 2 columns mobile |
| Background | Clean White |
| Border | 1px Border Gray, 8px radius |
| Shadow | `0 4px 12px rgba(0,0,0,0.06)` |
| Margin top | `-24px` (overlap hero slightly) |
| CTA text | Heritage Red `#B31942`, bold, uppercase |

---

## 4. Section 2 — Shop By Category

### Purpose

Let users visually browse product categories and find what they need quickly.

### Section Header

| Element | Content |
|---|---|
| **Eyebrow** | `Categories` |
| **Headline** | `Shop By Collection` |
| **CTA** | `View All →` |

### Category Cards — 6 Cards

```
┌─────────────────────────────────────────────────────────────┐
│                                                             │
│  ┌────────────┐ ┌────────────┐ ┌────────────┐              │
│  │ American   │ │ Veteran    │ │ Bomber     │              │
│  │ Flag Tees  │ │ Tribute    │ │ Jackets    │              │
│  │ ────────   │ │ ────────   │ │ ────────   │              │
│  │ Shop Col.  │ │ Shop Col.  │ │ Shop Col.  │              │
│  └────────────┘ └────────────┘ └────────────┘              │
│                                                             │
│  ┌────────────┐ ┌────────────┐ ┌────────────┐              │
│  │ Hats &     │ │ Premium    │ │ Patches &  │              │
│  │ Beanies    │ │ T-Shirts   │ │ Pins       │              │
│  │ ────────   │ │ ────────   │ │ ────────   │              │
│  │ Shop Col.  │ │ Shop Col.  │ │ Shop Col.  │              │
│  └────────────┘ └────────────┘ └────────────┘              │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

### Card Content

| Card | Eyebrow | Title | Description | CTA |
|---|---|---|---|---|
| 1 | American Flag Tees | Flag Collection | Graphic tees with bold American flag designs, distressed prints, and eagle graphics. | Shop Collection |
| 2 | Veteran Tribute | Service Honor | Veteran-inspired apparel that respectfully honors service, branch pride, and sacrifice. | Shop Collection |
| 3 | Bomber Jackets | Classic Bombers | MA-1 style bomber jackets with flag patches and custom name embroidery options. | Shop Collection |
| 4 | Hats & Beanies | Headwear | Snapbacks, dad hats, and beanies featuring flag embroidery and patriotic patchwork. | Shop Collection |
| 5 | Premium T-Shirts | Signature Tees | Heavy-weight cotton tees with vintage-style prints and American-made quality feel. | Shop Collection |
| 6 | Patches & Pins | Accessories | Patriotic patches, enamel pins, mugs, and accessories for everyday American pride. | Shop Collection |

### Design Specs

| Property | Value |
|---|---|
| Layout | 3 columns desktop, 2 columns tablet, 1 column mobile |
| Image ratio | 4:5 |
| Min height | `280px` desktop, `220px` mobile |
| Radius | `8px` |
| Overlay | `linear-gradient(180deg, transparent 40%, rgba(11,31,58,0.85) 100%)` |
| Title | Barlow Condensed 700, `clamp(1.1rem, 1.8vw, 1.4rem)`, white |
| Description | Inter 400, `0.85rem`, white at 80% opacity |
| Eyebrow | Heritage Red or Heritage Gold, uppercase, `0.72rem` |
| CTA | Heritage Red text, bold, uppercase, `0.75rem` |
| Hover | Image scale 1.05x, slight shadow lift |

---

## 5. Section 3 — Best Sellers Product Grid

### Purpose

Drive commerce immediately — show products with prices visible, no friction.

### Section Header

| Element | Content |
|---|---|
| **Eyebrow** | `Best Sellers` |
| **Headline** | `Patriotic Favorites Made To Honor Service` |
| **CTA** | `View All Best Sellers →` |

### Product Grid — 8 Products

| Property | Value |
|---|---|
| Layout | 4 columns desktop, 3 columns tablet, 2 columns mobile |
| Products | 8 (query: `orderby=popularity`, `limit=8`) |
| Image ratio | 1:1 square |
| Background | Clean White |
| Surface background | Antique White `#F7F2E8` |

### Product Card Specs

```
┌──────────────────┐
│                  │
│  [Product Image] │
│                  │
│  Customizable    │  ← Badge (Heritage Red bkg, white text)
│                  │
│  American Flag   │  ← Title (Inter 600, 1rem)
│  Distressed Tee  │
│                  │
│  $29.99          │  ← Price (Inter 800, Heritage Red)
│                  │
│  ┌─────────────┐ │
│  │  Shop Now   │ │  ← CTA (Heritage Red bkg, white text, full width)
│  └─────────────┘ │
└──────────────────┘
```

| Element | Specification |
|---|---|
| Border | `1px solid #E5E7EB` |
| Radius | `8px` |
| Shadow | `0 4px 16px rgba(0,0,0,0.04)` |
| Badge | Heritage Red `#B31942` or Heritage Gold `#C6A15B`, `0.72rem`, uppercase |
| Hover | `translateY(-3px)`, border Heritage Red, shadow `0 8px 24px rgba(0,0,0,0.1)` |

### Badge Options

| Badge | Color | When To Use |
|---|---|---|
| Best Seller | Heritage Red | Top 3 most popular products |
| Customizable | Heritage Gold | Products with name/rank/service years options |
| America 250 | Heritage Gold | Limited-edition anniversary items |
| New | Heritage Red | Products added in last 30 days |

---

## 6. Section 4 — Personalized Apparel Feature

### Purpose

Explain a key differentiator: custom name, rank, and service years personalization.

### Section Layout

```
┌──────────────────────────────────────────────────────────────┐
│  ┌──────────────────────────┐  ┌──────────────────────────┐  │
│  │  Personalized With Pride │  │                          │  │
│  │                          │  │     [Product Mockup]     │  │
│  │  Custom apparel that     │  │     Custom Bomber        │  │
│  │  carries name, rank,     │  │     Jacket with name     │  │
│  │  and service years.      │  │     & flag patch         │  │
│  │                          │  │                          │  │
│  │  ✓ Custom name options   │  │                          │  │
│  │  ✓ Rank & service years  │  │                          │  │
│  │  ✓ Branch-inspired       │  │                          │  │
│  │  ✓ Gift-ready for Vets   │  │                          │  │
│  │                          │  │                          │  │
│  │  [Shop Custom Gifts]     │  │                          │  │
│  └──────────────────────────┘  └──────────────────────────┘  │
└──────────────────────────────────────────────────────────────┘
```

### Section Header

| Element | Content |
|---|---|
| **Eyebrow** | `Personalized With Pride` |
| **Headline** | `Custom Apparel That Carries Name, Rank, And Service Years` |
| **CTA** | `Shop Custom Gifts` → `/product-category/veteran-tribute/` |

### Copy Content

**Paragraph:**
> Many GraphicTShirtStore products can be personalized with details that matter — from a veteran's name to service years, rank, or branch-inspired artwork. These are not just everyday apparel pieces; they are meaningful gifts made to honor service and legacy.

**Feature points:**
- Custom name options
- Rank & service years
- Branch-inspired designs
- Gift-ready for veterans and families

**Custom product note:**
> *Please review all personalization details carefully before placing your order. Personalized items may require additional production time and may not be eligible for return unless defective, damaged, or incorrect.*

### Design Specs

| Property | Value |
|---|---|
| Layout | 2 columns (text left, image right) |
| Desktop | Grid, side by side |
| Mobile | Stacked (image on top) |
| Background | Clean White |
| Image ratio | 4:5 or 1:1 |
| Visual | Custom bomber jacket close-up showing name + flag patch |

---

## 7. Section 5 — Gift By Occasion

### Purpose

Capture seasonal gift shoppers by occasion — Veterans Day, Father's Day, Memorial Day, Independence Day, America 250, Christmas.

### Section Header

| Element | Content |
|---|---|
| **Eyebrow** | `Gift By Occasion` |
| **Headline** | `Meaningful Patriotic Gifts For Moments That Matter` |

### Occasion Cards — 6 Cards

| Card | Title | Description | CTA |
|---|---|---|---|
| 1 | Father's Day Gifts | A meaningful gift for the veteran who carries the story. | Shop Gifts |
| 2 | Veterans Day Gifts | Personalized apparel made to honor service years and family legacy. | Shop Gifts |
| 3 | Memorial Day Gifts | Remember and honor with patriotic tribute products. | Shop Gifts |
| 4 | Independence Day Gifts | Celebrate freedom with flag tees, hats, and accessories. | Shop Gifts |
| 5 | America 250th Anniversary | Exclusive collection celebrating 250 years of American pride. | Explore |
| 6 | Christmas Gifts For Veterans | Give a gift that says thank you better than words. | Shop Gifts |

### Design Specs

| Property | Value |
|---|---|
| Layout | 3 columns desktop, 2 tablet, 1 mobile |
| Card style | Icon + text, Heritage Gold accent for America 250 |
| Background | Antique White `#F7F2E8` |
| Card background | Clean White |
| Radius | `8px` |
| CTA | Heritage Red text, uppercase, bold |

---

## 8. Section 6 — Customer Tributes

### Purpose

Build emotional trust with genuine-feeling tribute statements (never fake reviews).

### Important Compliance Rule

> Do not use fake names, fake photos, fake star ratings, or fake customer stories. These are tribute-style statements, not verified reviews.

### Section Header

| Element | Content |
|---|---|
| **Eyebrow** | `Customer Tributes` |
| **Headline** | `Gift Moments Built Around Service, Memory, And Pride` |
| **Intro** | Many customers choose personalized veteran apparel as a way to honor service, remember family legacy, and give a gift with meaning. |

### Tribute Cards

| Card | Statement |
|---|---|
| 1 | *"A gift that helps families honor a father's years of service."* |
| 2 | *"A custom bomber jacket that carries name, rank, and service years with pride."* |
| 3 | *"A simple way to show American pride without saying too much."* |

### Design Specs

| Property | Value |
|---|---|
| Background | Patriot Navy `#0B1F3A` |
| Text | White (heading), white at 85% (tributes) |
| Card background | Clean White with subtle shadow |
| Layout | 3 cards row desktop, 1 column mobile |
| CTA below | `Shop Meaningful Gifts` — Heritage Red button |
| Radius | `8px` |

---

## 9. Section 7 — Trust + About + Newsletter CTA

### Purpose

Close the homepage with credibility, brand clarity, and email capture.

### Section Layout

```
┌──────────────────────────────────────────────────────────────┐
│  4 Trust Cards                                               │
│  ┌─────────┐ ┌─────────┐ ┌─────────┐ ┌─────────┐          │
│  │Secure   │ │Tracking │ │30-Day   │ │Persona- │          │
│  │Checkout │ │Included │ │Returns  │ │lization │          │
│  │         │ │         │ │         │ │Support  │          │
│  └─────────┘ └─────────┘ └─────────┘ └─────────┘          │
│                                                             │
│  ┌─────────────────────────────────────────────────────┐   │
│  │  [Logo]                                              │   │
│  │                                                     │   │
│  │  Patriotic apparel and gifts made to honor service. │   │
│  │                                                     │   │
│  │  GraphicTShirtStore is a patriotic apparel and      │   │
│  │  custom gift brand created for veterans, military   │   │
│  │  families, and proud Americans.                     │   │
│  │                                                     │   │
│  │  [Learn More →]                                     │   │
│  └─────────────────────────────────────────────────────┘   │
│                                                             │
│  ┌─────────────────────────────────────────────────────┐   │
│  │  [Newsletter] Get drops & gift ideas                │   │
│  │  [____________________] [Sign Up]                   │   │
│  └─────────────────────────────────────────────────────┘   │
└──────────────────────────────────────────────────────────────┘
```

### Trust Cards

| Icon | Title | Description |
|---|---|---|
| Shield | Secure Checkout | A safe and simple checkout experience for every order. |
| Truck | Tracking Included | Tracking details are provided once your order ships. |
| Calendar | 30-Day Returns | Eligible non-personalized items may be returned within 30 days of delivery. |
| Headset | Personalization Support | Review your custom name, rank, and service details carefully before ordering. |

### About Block

| Element | Content |
|---|---|
| **Headline** | `Patriotic Apparel And Gifts Made To Honor Service` |
| **Paragraph** | GraphicTShirtStore is a patriotic apparel and custom gift brand created for veterans, military families, and proud Americans who want meaningful products that carry service, legacy, and American pride. |
| **CTA** | `Learn More →` → `/about-us/` |

### Newsletter

| Element | Content |
|---|---|
| **Headline** | `Get New Patriotic Drops And Gift Ideas` |
| **Input placeholder** | `Enter your email` |
| **CTA** | `Sign Up` |
| **Background** | Clean White with subtle border |

### Trust Cards Design Specs

| Property | Value |
|---|---|
| Layout | 4 columns desktop, 2 columns tablet, 1 column mobile |
| Icon background | Patriot Navy `#0B1F3A` |
| Icon size | `44px x 44px` |
| Card min height | `200px` |
| Card border | `1px solid #E5E7EB` |

---

## 10. Homepage Product Strategy Summary

| Element | Quantity | Source |
|---|---|---|
| Hero CTAs | 2 | Manual links |
| Quick-shop cards | 4 | Manual links |
| Category cards | 6 | With image overlay |
| Best seller products | 8 | WooCommerce query (`popularity`, `limit=8`) |
| Feature section | 1 | Static content |
| Occasion cards | 6 | Static content |
| Tribute cards | 3 | Static content |
| Trust cards | 4 | Static content |
| Newsletter form | 1 | Email capture |

---

## 11. Responsive Behavior Summary

| Section | Desktop (>1024px) | Tablet (768–1024px) | Mobile (<768px) |
|---|---|---|---|
| Hero | Full vh, image visible, 2 CTAs | Shortened, image visible | Auto height, image cropped, stacked CTAs |
| Quick shop | 4 columns | 2 columns | 2 columns |
| Categories | 3 columns | 2 columns | 1 column |
| Products | 4 columns | 3 columns | 2 columns |
| Feature | 2 columns side by side | 2 columns | Stacked, image top |
| Occasions | 3 columns | 2 columns | 1 column |
| Tributes | 3 columns | 2 columns | 1 column |
| Trust | 4 columns | 2 columns | 2 columns |
| Newsletter | 2 columns side by side | Stacked | Stacked |

---

## 12. Image Assets Needed

| Image | Section | Suggested Filename | Specs |
|---|---|---|---|
| Hero lifestyle | Section 1 | `gts-hero.jpg` | 1920x1080, webp |
| Quick shop flag tee | Strip | `gts-quick-flag.jpg` | 400x300, webp |
| Quick shop bomber | Strip | `gts-quick-bomber.jpg` | 400x300, webp |
| Quick shop veteran | Strip | `gts-quick-veteran.jpg` | 400x300, webp |
| Quick shop best seller | Strip | `gts-quick-best.jpg` | 400x300, webp |
| Category — Flag Tees | Section 2 | `cat-flag-tees.jpg` | 600x750, webp |
| Category — Veteran | Section 2 | `cat-veteran.jpg` | 600x750, webp |
| Category — Bomber | Section 2 | `cat-bomber.jpg` | 600x750, webp |
| Category — Hats | Section 2 | `cat-hats.jpg` | 600x750, webp |
| Category — Tees | Section 2 | `cat-tees.jpg` | 600x750, webp |
| Category — Accessories | Section 2 | `cat-accessories.jpg` | 600x750, webp |
| Product placeholder | Section 3 | `tire-placeholder.svg` | 600x600, svg/png |
| Feature bomber close-up | Section 4 | `gts-feature-bomber.jpg` | 600x750, webp |
| Newsletter background | Section 7 | — | None needed |

---

## 13. Final Homepage Feeling

The GraphicTShirtStore homepage should feel like:

> A patriotic American apparel homepage that immediately shows premium graphic tees, bomber jackets, and veteran tribute gear — helps customers shop by category or occasion, explains personalization value, builds trust for POD ordering, and captures emails, all within a warm, respectful, and product-focused layout.

---

*Version: 1.0 | GraphicTShirtStore Home Plan*
