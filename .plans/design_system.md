# Elite Shop Express — Design System

## 1. Brand Identity

**Store:** Elite Shop Express  
**Domain:** eliteshopexpress.com  
**Market:** US (English only)  
**Niche:** Home & Living, Lawn & Garden, Pet Care, Automotive  
**Persona:** Practical American homeowner — values reliability, clear pricing, fast shipping  

**Design philosophy:** Conversion-first. Every element must help users find a product, decide to buy it, or reduce checkout friction. This is NOT a fashion site — avoid editorial/lifestyle aesthetics. Think Home Depot clarity meets Amazon simplicity.

---

## 2. Color System

**Palette: "Trusted Hardware"** — clean, practical, American retail

| Token | Value | Usage |
|---|---|---|
| `--color-bg` | `#FFFFFF` | Page background |
| `--color-bg-subtle` | `#F5F5F5` | Section backgrounds, card backgrounds |
| `--color-text-primary` | `#111111` | Headings, product names |
| `--color-text-secondary` | `#555555` | Descriptions, meta, labels |
| `--color-text-muted` | `#888888` | Captions, breadcrumbs |
| `--color-accent` | `#E8470A` | Primary CTA buttons, sale badges, highlights |
| `--color-accent-hover` | `#C93D08` | Hover state for accent |
| `--color-navy` | `#1B3A5C` | Header background, footer, nav |
| `--color-navy-light` | `#254E7A` | Nav hover states |
| `--color-border` | `#E2E2E2` | Card borders, dividers |
| `--color-sale` | `#E8470A` | Sale price, discount badges |
| `--color-original-price` | `#888888` | Strikethrough original price |
| `--color-success` | `#1A8A3C` | In-stock, confirmation states |

**ZERO TOLERANCE:**
- Do NOT mix more than 3 colors in one component
- Do NOT use the accent orange for decorative purposes — only CTAs and urgency
- Do NOT use pure black `#000000` for text — use `#111111`

---

## 3. Typography

**Font stack:**
```css
--font-primary: 'Inter', 'Plus Jakarta Sans', system-ui, sans-serif;
```

Load via Google Fonts with `display=swap`.

**Scale:**

| Role | Class | Size | Weight |
|---|---|---|---|
| Hero heading | `.t-hero` | `clamp(2rem, 5vw, 3.5rem)` | 700 |
| Section heading | `.t-section` | `clamp(1.375rem, 3vw, 1.875rem)` | 600 |
| Product name | `.t-product` | `0.9375rem` (mobile) / `1rem` (desktop) | 500 |
| Price | `.t-price` | `1.125rem` | 700 |
| Body | `.t-body` | `0.9375rem` | 400 |
| Caption / meta | `.t-caption` | `0.75rem` | 400 |
| Badge / label | `.t-badge` | `0.6875rem` | 600, uppercase, `letter-spacing: 0.04em` |

---

## 4. Spacing System

```css
--space-xs:  4px;
--space-sm:  8px;
--space-md:  16px;
--space-lg:  24px;
--space-xl:  40px;
--space-2xl: 64px;
--space-3xl: 96px;
```

**Containers:**
```css
--container-max: 1280px;
--container-pad-mobile: 16px;
--container-pad-desktop: 24px;
```

**Section padding:** `py-12 md:py-16` (48px / 64px)  
**Grid gap:** `gap-3 md:gap-4` (12px / 16px)  
**Card padding:** `p-3 md:p-4`

---

## 5. Components

### 5.1 Header

**Desktop layout:**
```
[Navy bg, sticky, shadow-sm]
[Logo left] | [Nav: Home & Living | Lawn & Garden | Pet Care | Automotive | Sale] | [Search bar — visible] | [Account | Cart(badge)]
```

**Mobile layout:**
```
[Navy bg]
[☰ Menu] [Logo center] [🔍 Search] [🛒 Cart]
```

Rules:
- Sticky on scroll, `backdrop-filter: blur(8px)` when scrolled
- Search bar always visible on desktop (not icon-only)
- Cart badge always visible when count > 0
- Mobile: hamburger opens full-height slide drawer with category tree
- Phone number visible in top utility bar on desktop: `407-255-1197`

---

### 5.2 Product Card

**Image ratio:** `1/1` (square) for all categories — tools, appliances, accessories all photograph squarer

**Card anatomy:**
```
[Image 1:1, object-cover, eager for above-fold / lazy for below]
[Category label — optional]
[Product name — 2 lines max, ellipsis]
[Star rating + review count]
[Price row: $XX.XX | ~~$YY.YY~~ | [SAVE $Z] badge]
[Add to Cart button]
```

Rules:
- Price MUST be visible without hover/click
- "Add to Cart" button: full-width, accent orange background, minimum 44px height
- Sale badge: top-left corner, accent orange pill `SAVE 20%`
- Hover: image scale `1.03` + card `box-shadow` lift
- NO `1px solid #ccc` border — use `box-shadow: 0 1px 4px rgba(0,0,0,0.08)` or `bg-[--color-bg-subtle]`

---

### 5.3 Product Grid

| Breakpoint | Columns |
|---|---|
| Mobile (`< 640px`) | 2 (MANDATORY) |
| Tablet (`640px–1023px`) | 3 |
| Desktop (`≥ 1024px`) | 4 |

No masonry. No bento. Uniform grid only.

---

### 5.4 Hero Section

Allowed layouts (pick one per page build):
1. **Full-width image + CTA overlay** — dark gradient from bottom
2. **50/50 split** — image right, headline + CTA left
3. **Promo carousel** — max 3 slides, auto-play ≥ 5s, pause on hover

**Required hero elements:**
- Concrete headline: ✅ `"Free Shipping on All Orders — Shop Home & Garden"` ❌ `"Elevate Your Space"`
- Primary CTA button (accent orange)
- Secondary CTA link (underline or ghost)
- At least one trust signal visible (free shipping icon or badge)

---

### 5.5 CTA Buttons

**Primary (Add to Cart, Shop Now, Buy Now):**
```css
background: var(--color-accent);   /* #E8470A */
color: #FFFFFF;
padding: 12px 24px;
border-radius: 6px;
font-weight: 600;
min-height: 44px;
```

**Secondary (View Details, Learn More):**
```css
background: transparent;
border: 2px solid var(--color-navy);
color: var(--color-navy);
padding: 10px 24px;
border-radius: 6px;
```

**Ghost / text link:**
```css
color: var(--color-accent);
text-decoration: underline;
```

No `border-radius: 9999px` (rounded-full) — this site uses a practical `6px` radius to signal reliability, not fashion.

---

### 5.6 Trust Bar

Displayed below header (desktop) or in footer (mobile):

```
🚚 Free Shipping on All Orders  |  ↩️ 30-Day Returns  |  🇺🇸 US-Based Support  |  📞 407-255-1197
```

Colors: white text on navy background, `py-2`

---

### 5.7 Category Navigation (Homepage)

Icon + label grid showing top-level categories:

```
[Home & Living] [Lawn & Garden] [Pet Care] [Car Parts] [Automotive Tools]
```

- Mobile: horizontal scroll row, `overflow-x-auto`
- Desktop: 5-column grid
- Each tile: category icon (SVG) + label, `bg-[--color-bg-subtle]`, `rounded-lg`, hover lift

---

### 5.8 Footer

**Layout:**
```
[Logo + short description]  [Categories]  [Help]  [Contact]
[Payment logos]  [Copyright]  [Policy links]
```

**Contact info (required):**
- 📍 3589 South Orange Avenue, Orlando, FL 32806
- ✉️ support@eliteshopexpress.com
- 📞 407-255-1197
- 🕐 Mon–Fri, 9AM–6PM CST
- 🔗 facebook.com/eliteshopexpress/

---

### 5.9 Filter & Sort (Category/Shop pages)

- Desktop: sticky left sidebar, 280px wide
- Mobile: bottom sheet triggered by "Filter" button
- Sort dropdown: top-right, options — Featured / Price Low–High / Price High–Low / Newest / Best Rated
- Active filters: chips row above grid with `×` remove buttons

---

## 6. Motion & Micro-interactions

**Allowed:**
- Product image hover scale `transform: scale(1.03)`, `transition: 200ms ease`
- Button press `scale(0.97)`, `transition: 100ms`
- Cart count badge pop on add
- Skeleton loaders for product grids
- Smooth drawer open/close

**FORBIDDEN:**
- Fade-up / slide-up animations on product cards (delays product visibility)
- Parallax scrolling
- Entry animations on above-the-fold content
- Auto-play carousels faster than 5s

---

## 7. Performance Rules

- LCP target: < 2.5s
- Hero image: `loading="eager"`, `fetchpriority="high"`
- First 8 product images: `loading="eager"`
- Remaining products: `loading="lazy"`
- Fonts: Google Fonts with `&display=swap`
- No render-blocking JS above the fold

---

## 8. Mobile-First Checklist

- [ ] 2-column product grid
- [ ] All tap targets ≥ 44px
- [ ] Sticky "Add to Cart" on product detail page
- [ ] Search visible in header (not icon-only)
- [ ] Filter = bottom sheet
- [ ] Trust bar visible on mobile (inside footer)
- [ ] Phone number tap-to-call (`tel:` link)

---

## 9. Trust Signals (Required on Every Page)

| Signal | Placement |
|---|---|
| Free Shipping | Hero, trust bar, product card, cart |
| 30-Day Returns | Trust bar, product page, footer |
| US Address | Footer |
| Phone Number | Header utility bar (desktop), footer |
| Business Hours | Footer |
| Facebook link | Footer |

---

## 10. Page-Specific Rules

### Homepage
- Trust bar below header
- Category nav tiles
- Hero banner
- Featured/bestseller product grid (8–12 products)
- "Why Shop With Us" section (icons: Free Shipping, Returns, Support)
- Newsletter signup (NOT a popup — inline section, delayed or on-scroll)

### Category / Shop Page
- Breadcrumb
- Page heading + product count
- Filter sidebar (desktop) / filter button (mobile)
- Sort dropdown
- Product grid
- Pagination or "Load More"

### Product Page
- Breadcrumb
- Image gallery (zoom on click)
- Product title, SKU, price (sale + original)
- Short description bullets
- Sticky "Add to Cart" on mobile
- Trust badges inline: Free Shipping / Returns / Secure Checkout
- Tabs: Description / Specifications / Reviews
- Related products (4 cards)

### Cart
- Line items with image, name, variant, qty stepper, remove
- Order summary: subtotal, shipping (Free), total
- Trust row (Free Shipping, Returns, Secure)
- "Continue Shopping" + "Proceed to Checkout"

---

## 11. Pre-Output Checklist

Before shipping any component or page:

- [ ] Price visible immediately (no hover required)
- [ ] "Add to Cart" CTA high contrast and ≥ 44px
- [ ] 2-col grid on mobile
- [ ] No entry animations on product cards
- [ ] Search bar visible in header
- [ ] Trust signals present
- [ ] Inter font loaded correctly
- [ ] Hero has a concrete, actionable headline
- [ ] Images have alt text
- [ ] Phone number is a `tel:` link
