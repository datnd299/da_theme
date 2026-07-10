# GraphicTShirtStore — Design System

> *The visual language, component library, and design rules for the patriotic apparel & custom gift brand.*

---

## 1. Design Direction

### Visual Identity

GraphicTShirtStore should look like a premium American heritage apparel brand — rugged, respectful, patriotic without being political, and product-focused.

| Attribute | Target |
|---|---|
| **Mood** | Warm, proud, respectful, rugged |
| **Vibe** | Premium POD, heritage Americana |
| **Perception** | Trustworthy, emotional, easy to shop |
| **Audience feel** | Familiar to veterans, welcoming to families |
| **Competitive stance** | Higher quality than generic POD, more respectful than parody brands |

### What The Design IS

- Product-heavy with clean layouts
- Warm heritage textures (antique white backgrounds, dark navy anchors)
- Bold typography with strong contrast
- Red for conversion, gold for premium accents
- Respectful flag and eagle imagery

### What The Design IS NOT

- Cheap POD marketplace aesthetic
- Political campaign style
- Fake official military look
- Overly tactical / survival-gear feel
- Cartoonish or parody-heavy

---

## 2. Color System

### Primary Palette

| Name | Hex | Role | Usage |
|---|---|---|---|
| **Patriot Navy** | `#0B1F3A` | Foundation anchor | Header, footer, hero, dark trust sections |
| **Heritage Red** | `#B31942` | Conversion driver | Primary CTAs, prices, badges, sale tags |
| **Antique White** | `#F7F2E8` | Warm backdrop | Heritage sections, tribute areas, about |
| **Clean White** | `#FFFFFF` | Card surface | Product cards, forms, policy pages |
| **Charcoal Ink** | `#111827` | Text primary | Headings, body copy |
| **Muted Gray** | `#6B7280` | Text secondary | Captions, helper notes, footer links |
| **Border Gray** | `#E5E7EB` | Structural lines | Card borders, dividers, form outlines |

### Accent Palette

| Name | Hex | Role | Usage Rules |
|---|---|---|---|
| **Heritage Gold** | `#C6A15B` | Premium accent | America 250 badges, limited-edition tags, premium callouts |
| **Flag Blue** | `#1E3A8A` | Secondary accent | Link hover states, secondary buttons, subtle backgrounds |
| **Deep Red** | `#991B1B` | Hover state | Primary CTA hover, deep red text emphasis |

### Color Usage Rules

```
Hero backgrounds:
  → Patriot Navy (#0B1F3A)

CTA buttons:
  → Heritage Red (#B31942) background
  → White text
  → Hover: Deep Red (#991B1B)

Secondary buttons:
  → Patriot Navy (#0B1F3A) background
  → White text

Ghost/outline buttons:
  → Transparent background
  → Heritage Red or Patriot Navy border

Prices:
  → Heritage Red (#B31942) — bold weight

Gold usage:
  → Heritage Gold (#C6A15B) — ONLY for:
    • America 250 collection
    • Premium/limited badges
    • Heritage callout sections
  → Do NOT overuse gold — it loses meaning

Links:
  → Heritage Red (#B31942) or Patriot Navy (#0B1F3A)
  → Underline on hover only

Borders:
  → Border Gray (#E5E7EB) for cards

Section backgrounds:
  → Antique White (#F7F2E8) for tribute sections
  → Clean White (#FFFFFF) for product sections
```

### Color Contrast Compliance

| Text on Background | Foreground | Background | Ratio | WCAG |
|---|---|---|---|---|
| Headings on white | `#111827` | `#FFFFFF` | 15.3:1 | AAA |
| Body on white | `#6B7280` | `#FFFFFF` | 4.3:1 | AA |
| White on navy | `#FFFFFF` | `#0B1F3A` | 13.2:1 | AAA |
| White on red | `#FFFFFF` | `#B31942` | 5.4:1 | AA |
| Red on white | `#B31942` | `#FFFFFF` | 4.2:1 | AA |

---

## 3. Typography

### Font Stack

| Role | Font | Weight | Letter-spacing | Notes |
|---|---|---|---|---|
| **Hero / Display** | Barlow Condensed | 700, 800, 900 | `-0.02em` | Bold, compact, all-caps optional |
| **Section Headings** | Barlow Condensed | 600, 700 | `-0.01em` | Scannable, uppercase for short titles |
| **Product Names** | Inter | 600 | normal | Readable at small card sizes |
| **Price** | Inter | 700, 800 | normal | Heritage Red color |
| **Body / UI** | Inter | 400, 500 | normal | Clean, accessible |
| **Badges / Labels** | Barlow Condensed | 700 | `0.05em` | Uppercase, compact |
| **Navigation** | Inter | 600, 700 | `0.02em` | Uppercase links |
| **Small / Captions** | Inter | 500 | normal | Footer links, helper text |

> Fallback stack: `system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif`

### Type Scale

| Level | Size (Desktop) | Size (Mobile) | Weight | Line Height |
|---|---|---|---|---|
| Hero H1 | `clamp(2.8rem, 5vw, 4.5rem)` | `clamp(2rem, 8vw, 2.8rem)` | 800 | `0.95` |
| Section H2 | `clamp(1.5rem, 2.5vw, 2.2rem)` | `clamp(1.3rem, 5vw, 1.6rem)` | 700 | `1.1` |
| Category H3 | `clamp(1rem, 1.5vw, 1.3rem)` | `1rem` | 700 | `1.2` |
| Product Title | `1rem` | `0.9rem` | 600 | `1.25` |
| Body | `1rem` | `0.95rem` | 400 | `1.65` |
| Price | `clamp(1.15rem, 1.8vw, 1.4rem)` | `1.1rem` | 800 | `1` |
| Caption | `0.82rem` | `0.78rem` | 500 | `1.4` |
| Badge / Label | `0.72rem` | `0.7rem` | 700 | `1.2` |

### Typography Rules

- Hero headings: maximal two lines, avoid widows
- Section headings: bold, scannable, max 10 words
- Body text: never longer than 3 sentences per paragraph
- Prices: always Heritage Red, bold weight
- CTAs: uppercase, letter-spaced, high contrast
- No script, serif body, or display decorative fonts

---

## 4. Layout System

### Grid System

| Breakpoint | Width | Columns | Gutter |
|---|---|---|---|
| Mobile | `< 768px` | 2 (products), 1 (categories) | `12px` |
| Tablet | `768px – 1024px` | 3 (products), 2 (categories) | `16px` |
| Desktop | `> 1024px` | 4 (products), 3 (categories) | `20px` |
| Max container | `1280px` | — | `24px` padding |

### Section Spacing

```
Section padding:
  Desktop: 80px top & bottom
  Mobile: 56px top & bottom

Section margins:
  Between sections: 0 (use padding)
  Last section before footer: 0
```

### Component Layout Rules

| Component | Desktop Layout | Mobile Layout | Ratio |
|---|---|---|---|
| Product grid | 4 columns | 2 columns | 1:1 images |
| Category grid | 3 columns | 1 column | 4:5 images |
| Trust grid | 4 columns | 2 columns | Icon + text |
| Testimonial row | 3 columns | 1 column | — |
| Feature section | 2 columns (text + image) | Stacked | 1:1 or 16:9 |
| Newsletter | 2 columns (text + form) | Stacked | — |

---

## 5. Component Specifications

### 5.1 Header

| Element | Desktop | Mobile |
|---|---|---|
| Logo | Left, `200px` max-width | Left, `160px` |
| Navigation | Horizontal links, uppercase | Hamburger slide-out |
| Search | Full input with search icon | Icon that expands to full input |
| Cart | Icon with count badge | Same |
| Track Order | Text link in nav | In mobile menu |
| Sticky | Yes, `position: sticky; top: 0` | Same |

Navigation order:
```
Logo | Best Sellers | American Flag Tees | Bomber Jackets |
Hats & Beanies | Veteran Tribute | Accessories | Search | Cart
```

Quick-nav strip (below main nav):
```
American Flag Tees | Veteran Tribute | Bomber Jackets | Hats | Best Sellers | Gifts
```

### 5.2 Hero Section

| Component | Specification |
|---|---|
| Background | Patriot Navy (`#0B1F3A`) with overlay gradient |
| Overlay | `linear-gradient(90deg, rgba(11,31,58,0.92) 0%, rgba(11,31,58,0.7) 50%, rgba(11,31,58,0.2) 100%)` |
| Min height | `70vh` desktop, `auto` mobile |
| Padding | `clamp(60px, 8vw, 120px) 18px` |
| Headline | Barlow Condensed 800, white, `text-shadow` for readability |
| Subheadline | Inter 400, white at 85% opacity, max-width `640px` |
| CTAs | Primary (Heritage Red) + Secondary (ghost white border) |
| Visual | Product/lifestyle image behind overlay, `object-fit: cover` |
| Trust line | Small text below CTAs: "Secure checkout. Tracking included. Custom gifts made with care." |

### 5.3 Quick-Shop Strip (Below Hero)

Four quick-link cards in a row:

```
┌────────────┐ ┌────────────┐ ┌────────────┐ ┌────────────┐
│  American   │ │  Bomber    │ │   Veteran  │ │ Best       │
│  Flag Tees  │ │  Jackets   │ │   Tribute  │ │ Sellers    │
└────────────┘ └────────────┘ └────────────┘ └────────────┘
```

Design: White cards with navy border, Heritage Red CTA text, equal width grid.

### 5.4 Category Cards

| Property | Value |
|---|---|
| Image ratio | 4:5 |
| Overlay | Dark gradient bottom-to-top |
| Title | Barlow Condensed 700, white |
| Description | Inter 400, white at 80% opacity |
| CTA | "Shop Collection" in Heritage Red |
| Hover | Scale image 1.05x, slight shadow lift |

Grid: 3 columns desktop, 2 tablet, 1 mobile.

### 5.5 Product Cards

| Property | Value |
|---|---|
| Image ratio | 1:1 square |
| Background | Clean White |
| Border | 1px Border Gray |
| Radius | 8px |
| Badge | Heritage Red or Heritage Gold, uppercase, compact |
| Title | Inter 600, `1rem` |
| Price | Inter 800, Heritage Red |
| CTA | Heritage Red button, white text, full-width |
| Hover | Translate Y -3px, border Heritage Red, shadow lift |
| Badge options | "Best Seller", "Customizable", "America 250", "New" |

### 5.6 Trust Cards

4 cards in a grid:

| Icon | Title | Description |
|---|---|---|
| Shield | Secure Checkout | A safe and simple checkout experience. |
| Truck | Tracking Included | Tracking details provided once your order ships. |
| Calendar | 30-Day Returns | Eligible non-personalized items may be returned within 30 days. |
| Headset | Personalization Support | Review your custom name, rank, and service details carefully. |

Design: White card, Patriot Navy icon background, clean layout, `min-height: 200px`.

### 5.7 Newsletter Component

| Property | Value |
|---|---|
| Background | Clean White with subtle border |
| Layout | 2-column grid (text left, form right) |
| Headline | "Get new patriotic drops and gift ideas" |
| Input | Full-width email, `min-height: 48px` |
| CTA | Heritage Red button, "Sign Up" |
| Stack on mobile | Single column |

### 5.8 Testimonial / Tribute Cards

| Property | Value |
|---|---|
| Background | Dark Navy or Antique White section |
| Card | White, rounded, shadow |
| Content | Tribute statement (not fake review), max 3 lines |
| Layout | 3 cards per row desktop, 1 per row mobile |
| CTA below row | "Shop Meaningful Gifts" |

---

## 6. Button System

### Button Styles

| Variant | Background | Text | Border | Hover |
|---|---|---|---|---|
| **Primary** | Heritage Red `#B31942` | White | Heritage Red | Deep Red `#991B1B` |
| **Secondary** | Patriot Navy `#0B1F3A` | White | Patriot Navy | Heritage Red |
| **Ghost** | Transparent | Heritage Red | Heritage Red | Fill Heritage Red, text white |
| **Dark** | Dark Navy `#0B1F3A` | White | Dark Navy | Heritage Red |
| **Gold** | Heritage Gold `#C6A15B` | White | Heritage Gold | Darker gold |

### Button Sizing

| Size | Height | Padding Horizontal | Font Size |
|---|---|---|---|
| Default | `50px` | `28px` | `0.85rem` |
| Small (section heads) | `44px` | `22px` | `0.78rem` |
| Large (hero) | `54px` | `36px` | `0.9rem` |

### Button Rules

- All CTAs: uppercase, letter-spaced `0.06em` – `0.08em`, font-weight 800
- All buttons: `8px` border radius
- All buttons: minimum `44px` height on mobile (accessibility)
- Button hover: `translateY(-2px)` lift + shadow intensify
- Primary CTA shadow: `0 2px 8px rgba(179,25,66,0.3)`

---

## 7. Form Elements

| Element | Height | Border | Focus | Radius |
|---|---|---|---|---|
| Text input | `48px` | `1.5px solid #E5E7EB` | Heritage Red ring + shadow | `8px` |
| Select dropdown | `48px` | Same as input | Same | `8px` |
| Textarea | `48px` min, `140px` default | Same | Same | `8px` |
| Search input | `48px` | `1px solid rgba(255,255,255,0.18)` on dark | Heritage Red ring | `8px` |

Form labels: uppercase, letter-spaced `0.08em`, font-size `0.72rem`, Muted Gray color, above field.

---

## 8. Navigation & Links

### Text Links

| State | Color | Decoration |
|---|---|---|
| Default | Heritage Red or Charcoal Ink | None |
| Hover | Heritage Red or Patriot Navy | Underline |
| Active | Heritage Red | Underline |
| In footer | Muted Gray | None on default, underline on hover |

### Breadcrumbs

```
Home / American Flag Tees / Classic Distressed Flag Tee
```

Style: Muted Gray text, Heritage Red current page, `>` separator.

---

## 9. Image & Visual Guidelines

### Product Photography

| Type | Spec | Notes |
|---|---|---|
| Primary image | White or light gray background | Product-focused, no clutter |
| Lifestyle image | Model wearing on brick wall or street scene | Natural lighting, not studio |
| Detail image | Close-up of print, embroidery, fabric | Show texture |
| Gift set image | Multiple products arranged | For gift bundles |

### Image Rules

- No text-heavy image banners (text belongs in HTML)
- No political campaign imagery
- No unauthorized military logos, seals, or insignia
- No AI-generated faces
- No excessive Photoshop filters or HDR effects
- No watermarks

### Hero / Section Background Images

- Use lifestyle photography with overlay gradients
- Never white — always anchor with Patriot Navy or dark overlay
- Opacity on hero images: 60% – 75%
- Gradient overlay ensures text readability

---

## 10. Iconography

- Use solid, bold icons (Font Awesome Solid or Heroicons Solid)
- Icon sizes: `20px – 24px` in UI, `32px – 40px` in trust cards
- Trust icons: shield, truck, calendar, headset
- Category icons: flag, jacket, hat, tee, medal, gift
- Social icons: Facebook, Instagram, X/Twitter
- Avoid thin, luxury-style line icons

---

## 11. Loading States & Animations

| Element | Animation | Duration | Easing |
|---|---|---|---|
| Button hover | translateY(-2px) + background | 180ms | ease |
| Card hover | translateY(-3px) + shadow | 180ms | ease |
| Category card image | scale(1.05) | 500ms | ease |
| Page transitions | fade in | 300ms | ease |
| Skeleton loading | Pulse shimmer | 1.5s | linear |

---

## 12. Mobile-Specific Rules

- 2-column product grids
- 1-column category grids
- All tap targets minimum 44px
- Hero height: auto (no fixed vh on mobile)
- Hamburger menu: slide-out from left
- Search: icon that expands to full-width input
- Cart: always visible in header
- Footer: single-column stack
- No sticky banners blocking content
- Prices always visible (never hover-only)

---

## 13. Accessibility Guidelines

| Requirement | Standard |
|---|---|
| Color contrast | WCAG AA minimum (4.5:1 normal, 3:1 large) |
| Focus indicators | Visible outline, Heritage Red ring |
| Skip navigation link | First focusable element |
| Alt text on all images | Descriptive, not keyword-stuffed |
| Form labels | Visible labels, not placeholders only |
| Touch targets | Minimum 44px on mobile |
| Heading hierarchy | Single h1 per page, sequential h2-h6 |

---

## 14. Final Design Statement

> The GraphicTShirtStore design system creates a warm, respectful, and product-focused visual identity — anchored in Patriot Navy, driven by Heritage Red, and elevated by Heritage Gold — that feels premium, trustworthy, and unmistakably American without being political or cheap.

---

*Version: 1.0 | GraphicTShirtStore Design System*
