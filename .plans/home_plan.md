# Homepage Plan — Elite Shop Express

## 1. Page Goal

Drive users to products fast, surface deals, and build trust within the first 3 seconds.

1. User understands what we sell immediately
2. User sees products and prices without any extra clicks
3. User has reasons to buy now (free shipping + trust signals)

---

## 2. Full Layout Structure (Top → Bottom)

1. Utility Bar (desktop only)
2. Header (sticky)
3. Trust Bar
4. Hero Section
5. Category Shortcuts
6. Best Sellers Grid
7. Promo Banner (mid-page)
8. Explore More Grid
9. Why Shop With Us
10. Newsletter Signup (inline)
11. Footer

---

## 3. Section Breakdown

---

### 3.1 Utility Bar (Desktop Only)

**Goal:** Surface contact info and credibility before anything else.

**Layout:** Full-width, `bg-[var(--color-navy)]`, `py-1.5`, `text-[--color-text-muted]`

**Content (centered flex row):**
```
📞 407-255-1197  |  Mon–Fri 9AM–6PM CST  |  Free Shipping on All Orders
```

- Phone is a `tel:` link: `<a href="tel:4072551197">`
- Text: `t-caption`, white/muted on navy
- Hidden on mobile (`hidden md:flex`)

---

### 3.2 Header (Sticky)

**Goal:** Navigation + Search + Cart access at all times.

**Desktop layout** (`bg-[var(--color-navy)]`, `h-16`, sticky, `shadow-sm`, `backdrop-filter: blur(8px)` when scrolled):
```
[Logo — left]  [Nav: Home & Living | Lawn & Garden | Pet Care | Car Parts | Automotive | Sale]  [Search bar — always visible]  [Account icon]  [Cart icon + badge]
```

**Mobile layout** (`bg-[var(--color-navy)]`, `h-14`):
```
[☰ Hamburger]  [Logo — center]  [🔍 Search icon]  [🛒 Cart + badge]
```

**Rules:**
- Logo: white version on navy bg
- Nav links: white text, `font-weight: 500`, hover → `bg-[--color-navy-light]`
- Search bar (desktop): white background, `rounded-md`, `h-9`, placeholder: *"Search products..."*
- Cart badge: accent orange pill, visible when count > 0
- Mobile: hamburger opens full-height slide drawer with full category tree + contact info at bottom
- `Sale` nav item: accent orange text to draw attention

---

### 3.3 Trust Bar

**Goal:** Eliminate friction immediately below the header.

**Layout:** Full-width strip, `bg-[var(--color-navy)]` (slightly lighter: `--color-navy-light`), `py-2`, white text

**Content (4 items, centered flex, `gap-6 md:gap-10`):**
```
🚚 Free Shipping on All Orders  |  ↩️ 30-Day Returns  |  🇺🇸 US-Based Support  |  📞 407-255-1197
```

- Desktop: all 4 items in one row with `|` dividers
- Mobile: 2×2 or horizontal scroll, hide phone number
- Font: `t-caption`, `font-weight: 500`

---

### 3.4 Hero Section

**Goal:** Primary conversion block — land the deal, drive click.

**Layout:** Full-width image with dark gradient overlay from bottom (Layout option 1 from design system)

**Desktop dimensions:** 16:9 aspect, max-height `560px`  
**Mobile dimensions:** 4:5 aspect

**Content (text overlay, bottom-left positioned):**
```
[Badge: "FREE SHIPPING ON EVERY ORDER"]
[H1: "Everything Your Home Needs — Shipped Free"]
[Subtext: "Shop Home & Garden, Pet Care, and Auto Parts. Delivered to your door."]
[Primary CTA: "Shop Now" — accent orange button]
[Secondary CTA: "Browse Categories" — ghost/underline link, white]
```

**Image:** Hero photo of a well-organized garage/home/garden setup or a lifestyle shot of home products. High-res, `fetchpriority="high"`, `loading="eager"`.

**Rules:**
- Headline must be concrete and actionable — no vague slogans
- Badge above headline: `t-badge`, white text, semi-transparent dark pill
- Primary CTA: `bg-[--color-accent]`, white text, `min-h-[44px]`, `px-6`, `rounded-[6px]`
- Free shipping trust signal must be visible in hero (badge or subtext)
- Gradient: `linear-gradient(to top, rgba(0,0,0,0.65) 0%, transparent 60%)`

---

### 3.5 Category Shortcuts

**Goal:** Get users into the right category in 1 click.

**Section label:** `t-section`, centered, `"Shop by Category"`

**Layout:**
- Mobile: horizontal scroll row (`overflow-x-auto`, `flex`, `gap-3`)
- Desktop: 5-column grid (`grid-cols-5`, `gap-4`)

**5 Categories (icon tile + label):**

| Category | Icon | Link |
|---|---|---|
| Home & Living | 🏠 (SVG house icon) | `/category/home-living` |
| Lawn & Garden | 🌿 (SVG leaf/plant icon) | `/category/lawn-garden` |
| Pet Care | 🐾 (SVG paw icon) | `/category/pet-care` |
| Car Parts | 🚗 (SVG car icon) | `/category/car-parts` |
| Automotive Tools | 🔧 (SVG wrench icon) | `/category/automotive-tools` |

**Tile design:**
- `bg-[--color-bg-subtle]`, `rounded-lg`, `p-4`
- SVG icon: `48px`, `color: --color-navy`
- Label: `t-body`, `font-weight: 500`, `color: --color-text-primary`, centered
- Hover: `box-shadow` lift + slight `translateY(-2px)`
- Entire tile is clickable (`<a>` wrapper)
- Mobile tile: fixed `width: 100px`, square-ish

---

### 3.6 Best Sellers Grid

**Goal:** Put top-selling products in front of the user immediately.

**Section header row:**
- Left: `t-section` — `"Best Sellers"`
- Right: `"View All →"` ghost link → `/shop`

**Product count:** 8 products

**Grid:**
- Mobile: 2 columns (`grid-cols-2`)
- Tablet: 3 columns (`grid-cols-3`)
- Desktop: 4 columns (`grid-cols-4`)
- `gap-3 md:gap-4`

**Product Card anatomy:**
```
[Image — 1:1 square, object-cover]
[Sale badge — top-left, accent orange pill: "SAVE 20%"]
[Product name — 2 lines max, ellipsis, t-product]
[Star rating + review count — t-caption]
[Price row: $XX.XX | ~~$YY.YY~~ (muted)]
[Add to Cart — full-width, accent orange, min-h-44px]
```

**Image loading:**
- First 8 products: `loading="eager"`
- Hover: `transform: scale(1.03)`, `transition: 200ms ease`

**Rules:**
- Price always visible — never hidden
- No entry animations
- No `1px solid #ccc` borders — use `box-shadow: 0 1px 4px rgba(0,0,0,0.08)`

---

### 3.7 Promo Banner (Mid-Page)

**Goal:** Inject urgency, push users toward the sale section.

**Layout:** Full-width, split 50/50 (text left, image right) on desktop; stacked on mobile

**Background:** `bg-[var(--color-navy)]`

**Content (text side):**
```
[Badge: "LIMITED TIME"]
[Headline: "Free Shipping on Every Order — No Minimum"]
[Sub: "Shop home, garden, pet, and auto products — all with free US delivery."]
[CTA: "Shop All Products" — accent orange button]
```

**Image side:** Product collage or lifestyle shot

**Rules:**
- Headline must reference a real, specific benefit
- CTA → `/shop`
- Image: `loading="lazy"` (below fold)

---

### 3.8 Explore More Grid

**Goal:** Let users browse a wider product selection.

**Section header row:**
- Left: `t-section` — `"Explore More Products"`
- Right: `"See All →"` ghost link → `/shop`

**Product count:** 8 products (different from Best Sellers)

**Grid:** Same as 3.6 (2 / 3 / 4 columns)

**Image loading:** All `loading="lazy"`

**Optional:** `"Load More"` button at bottom center (`bg-transparent`, `border-2 border-[--color-navy]`, secondary button style)

---

### 3.9 Why Shop With Us

**Goal:** Address objections, reinforce trust before footer.

**Section label:** `t-section`, centered — `"Why Shop With Us"`

**Layout:** 3-column grid on desktop, stacked on mobile

**3 Cards:**

| Icon | Heading | Body |
|---|---|---|
| 🚚 | Free Shipping on All Orders | Every order ships free — no minimum purchase required. |
| ↩️ | 30-Day Return Policy | Not happy? Return any item within 30 days, hassle-free. |
| 🇺🇸 | US-Based Support | Real humans, Mon–Fri 9AM–6PM CST. Call us at 407-255-1197. |

**Card design:**
- `bg-[--color-bg-subtle]`, `rounded-lg`, `p-6`
- Icon: `40px`, `color: --color-accent`
- Heading: `t-product`, `font-weight: 600`
- Body: `t-body`, `color: --color-text-secondary`
- No hover effects needed — static trust block

---

### 3.10 Newsletter Signup (Inline)

**Goal:** Capture email leads — NOT a popup.

**Trigger:** Visible after scrolling past product grids (inline section, not popup)

**Layout:** Full-width, `bg-[--color-bg-subtle]`, `py-12`

**Content (centered, max-width `480px`):**
```
[Heading: "Get Deals in Your Inbox"]
[Sub: "Subscribe for exclusive offers, new arrivals, and tips."]
[Email input + "Subscribe" button — side by side on desktop, stacked on mobile]
[Fine print: "No spam. Unsubscribe anytime."]
```

**Button:** Accent orange, primary style, `min-h-[44px]`

**Rules:**
- NEVER auto-trigger as popup on page load
- Email input: full-width on mobile

---

### 3.11 Footer

**Goal:** Final trust + navigation anchor.

**Layout:** 4-column grid on desktop (`grid-cols-4`), stacked on mobile, `bg-[var(--color-navy)]`, white text

**Column 1 — Brand:**
- Logo (white version)
- 1-line description: *"Your trusted source for home, garden, pet, and auto products."*
- Facebook link: `facebook.com/eliteshopexpress/`

**Column 2 — Shop:**
- Home & Living
- Lawn & Garden
- Pet Care
- Car Parts & Accessories
- Automotive Tools

**Column 3 — Help:**
- Shipping Policy
- Return Policy
- Contact Us
- FAQ

**Column 4 — Contact:**
- 📍 3589 South Orange Avenue, Orlando, FL 32806
- ✉️ support@eliteshopexpress.com
- 📞 `<a href="tel:4072551197">407-255-1197</a>`
- 🕐 Mon–Fri, 9AM–6PM CST

**Bottom bar** (border-top, `pt-4`):
- Left: `© 2026 Elite Shop Express. All rights reserved.`
- Center: Payment icons (Visa, Mastercard, PayPal, Amex)
- Right: Privacy Policy | Terms of Service

---

## 4. Trust Signals Placement

| Signal | Placement |
|---|---|
| Free Shipping | Utility bar, trust bar, hero badge, promo banner, why-shop section, footer |
| 30-Day Returns | Trust bar, why-shop section, footer |
| US Address | Footer column 4 |
| Phone Number | Utility bar, why-shop section, footer column 4 |
| Business Hours | Utility bar, footer column 4 |
| Facebook | Footer column 1 |

---

## 5. Spacing

- Section spacing: `py-12 md:py-16`
- Grid gap: `gap-3 md:gap-4`
- Container: `max-w-[1280px] mx-auto px-4 md:px-6`
- Card padding: `p-3 md:p-4`

---

## 6. Performance Rules

- Hero image: `fetchpriority="high"`, `loading="eager"`, WebP format
- First 8 product images (Best Sellers): `loading="eager"`
- All other images: `loading="lazy"`
- Google Fonts: `Inter` with `&display=swap`
- No render-blocking JS above the fold

---

## 7. Mobile-First Checklist

- [ ] 2-column product grid on all product sections
- [ ] All tap targets ≥ 44px (buttons, nav links, category tiles)
- [ ] Search accessible from header
- [ ] Trust bar visible (condensed) on mobile
- [ ] Category shortcuts: horizontal scroll row
- [ ] Newsletter: stacked input + button layout
- [ ] Phone number: `tel:` link throughout
- [ ] No popup on page load

---

## 8. Pre-Output Checklist (before coding)

- [ ] Price visible immediately on every product card
- [ ] "Add to Cart" CTA: high contrast, ≥ 44px height
- [ ] 2-col product grid on mobile
- [ ] No entry/fade-up animations on product cards
- [ ] Search bar visible in header (desktop)
- [ ] Free Shipping signal in hero
- [ ] Inter font loaded via Google Fonts
- [ ] Hero headline is concrete and actionable
- [ ] All images have alt text
- [ ] Phone number uses `tel:` link
- [ ] No `border-radius: 9999px` — use `6px`
- [ ] No more than 3 colors per component

---

## 9. Content Strings

| Element | Copy |
|---|---|
| Hero H1 | "Everything Your Home Needs — Shipped Free" |
| Hero sub | "Shop Home & Garden, Pet Care, and Auto Parts. Delivered to your door." |
| Hero CTA primary | "Shop Now" |
| Hero CTA secondary | "Browse Categories" |
| Promo headline | "Free Shipping on Every Order — No Minimum" |
| Promo sub | "Shop home, garden, pet, and auto products — all with free US delivery." |
| Promo CTA | "Shop All Products" |
| Newsletter headline | "Get Deals in Your Inbox" |
| Newsletter sub | "Subscribe for exclusive offers, new arrivals, and tips." |
| Newsletter fine print | "No spam. Unsubscribe anytime." |
| Why shop heading | "Why Shop With Us" |
| Footer tagline | "Your trusted source for home, garden, pet, and auto products." |
