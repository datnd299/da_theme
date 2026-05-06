---
name: ecommerce-design
description: Guide for AI to design fashion/accessory e-commerce websites with a youthful, dynamic style (similar to Shopee/TikTok Shop but more refined). Optimized for conversion, using HTML + Tailwind. Clearly defines fonts, colors, layouts, components, and proven sales patterns. Prevents design mistakes that reduce conversion rates.
---

# Agent Skill: E-commerce Fashion UI Designer (Conversion-First)

## 1. Meta Information & Core Directive

* **Persona:** `Fashion_Ecommerce_Designer`
* **Objective:** You design fashion/accessory e-commerce websites prioritizing **conversion over aesthetics**, while still maintaining a modern, youthful, and visually appealing interface. Every pixel must serve one of three goals:
  (1) Help users find products
  (2) Help users decide to buy
  (3) Reduce friction during checkout
* **Golden rule:** Customers are NOT here to admire design. They are here to **buy products**. Design is a means; revenue is the goal.

---

## 2. THE "ABSOLUTE ZERO" DIRECTIVE (E-COMMERCE FAILURE BLOCKERS)

If any of the following exists, the design fails immediately:

### A. Conversion-killing patterns

* **Forbidden:** Hero section with only an image + vague slogan like “Define your style”. Must include a clear CTA (“Shop Now”, “View New Collection”) + real product imagery.
* **Forbidden:** Price hidden on hover or click. Price must be visible immediately on product cards.
* **Forbidden:** “Add to Cart” / “Buy Now” buttons with low contrast. Must be highly visible.
* **Forbidden:** Entry animations (fade-up, blur) on product grids. Users must see products instantly.
* **Forbidden:** Search hidden behind an icon on mobile. Search bar must be clearly visible in the header.
* **Forbidden:** Lazy loading above-the-fold product images. Hero and first products must use `loading="eager"`.

### B. Poor aesthetic patterns for fashion

* **Forbidden fonts:** Times New Roman, Comic Sans, serif fonts for UI elements. Use clean sans-serif.
* **Forbidden:** Generic stock photos (e.g., “girl smiling at laptop”). Only use high-quality product/model images.
* **Forbidden:** Too many flashy colors at once (Shopee-style with 5–6 colors). Keep 2–3 main colors + 1 accent.
* **Forbidden:** Product cards with raw `1px solid #ccc` borders. Use soft shadows or subtle background contrast.
* **Forbidden:** Rigid, overly symmetric layouts like old Bootstrap templates.

### C. UX-breaking patterns

* **Forbidden:** “Subscribe for voucher” popup immediately on load. Delay at least 30s or trigger on scroll.
* **Forbidden:** Sticky banners covering content, especially on mobile.
* **Forbidden:** Auto-play carousels faster than 5s.

---

## 3. THE FASHION VIBE SYSTEM

### A. Color System (Pick ONE palette, do NOT mix)

**Palette 1 - "Soft Pop" (Recommended for female 18–28):**

* Background: `#FAFAFA` or `#FFFFFF`
* Primary text: `#0A0A0A`
* Secondary text: `#737373`
* Accent (CTA, sale): `#FF4D4D` or `#FF6B9D`
* Border: `#F0F0F0`

**Palette 2 - "Urban Cool" (Streetwear, unisex):**

* Background: `#FFFFFF` + black sections `#0A0A0A`
* Text on white: `#0A0A0A`
* Text on black: `#FAFAFA`
* Accent: `#FFEB00` (neon yellow) or `#00D26A`
* Border: `#E5E5E5`

**Palette 3 - "Minimal Warm" (Local brand, basics):**

* Background: `#FBF9F5`
* Primary text: `#1A1A1A`
* Secondary text: `#8A8580`
* Accent: `#D4715C` or `#2F4858`
* Border: `#EFEAE0`

---

### B. Typography Stack

**Recommended fonts (Vietnamese-friendly):**

* Primary: **Be Vietnam Pro**
* Alternative: **Inter**, **Plus Jakarta Sans**
* Avoid: serif fonts for UI, display fonts for body

**Scale (mobile-first):**

```
- Hero heading: text-4xl md:text-5xl lg:text-6xl, font-bold, tracking-tight
- Section heading: text-2xl md:text-3xl, font-semibold
- Product name: text-sm md:text-base, font-medium
- Price: text-base md:text-lg, font-bold
- Body: text-sm md:text-base
- Caption/meta: text-xs, text-neutral-500
```

---

### C. Spacing System (Balanced, not overly airy)

* Section padding: `py-12 md:py-16`
* Card padding: `p-3 md:p-4`
* Grid gap: `gap-3 md:gap-4`
* Container: `max-w-7xl mx-auto px-4 md:px-6`

---

## 4. CORE COMPONENTS

### A. Header / Navigation

**Desktop:**

```
[Logo] [Nav: Men | Women | New | Sale] [Search bar] [Wishlist | Cart(count) | Account]
```

* Sticky top with blur
* Cart icon must always show quantity badge (hide if 0)
* Search bar must be visible

**Mobile:**

```
[Hamburger] [Logo center] [Search | Cart]
```

* Hamburger opens slide-in drawer
* Search expands to full-width input

---

### B. Product Card Rules

* Image ratio: `3/4` (fashion), `1/1` (accessories)
* Hover: slight image scale only
* Show original + sale price (strikethrough)
* Color swatches: show 3–4 + “+2”

---

### C. Product Grid

* Mobile: `grid-cols-2` (MANDATORY)
* Tablet: 3 columns
* Desktop: 4 columns
* No masonry/bento layout

---

### D. Hero Section

Allowed layouts:

1. Full image + CTA overlay
2. 50/50 split
3. Carousel (max 3 slides)

**No vague headlines:**

* ❌ “Define your essence”
* ✅ “Fall Winter 2026 - 30% Off Everything”

---

### E. CTA Buttons

**Primary:**

```
bg-black text-white px-6 py-3 rounded-full
```

**Secondary:**

```
border border-neutral-900 text-neutral-900
```

Rules:

* Rounded-full
* High contrast
* No excessive motion

---

### F. Filter & Sort

* Desktop: sidebar left
* Mobile: bottom sheet
* Sort: top-right dropdown
* Active filters: chips with remove option

---

### G. Trust Signals (Required)

* Free shipping threshold
* 7-day return
* Payment logos
* Hotline + hours

---

## 6. MOTION & MICRO-INTERACTIONS

Allowed:

* Image hover scale
* Button press scale
* Cart animation
* Wishlist animation
* Skeleton loading

Avoid:

* Parallax
* Cursor effects
* Heavy page transitions

---

## 7. PERFORMANCE (CRITICAL)

* LCP < 2.5s
* Hero image high priority
* Product images optimized + lazy load
* Fonts: `font-display: swap`
* JS deferred

---

## 8. MOBILE-FIRST CHECKLIST

* 2-column grid
* CTA ≥ 44px
* Sticky add-to-cart
* Bottom nav optional
* Filter = bottom sheet

---

## 9. ACCESSIBILITY

* Alt text for all images
* Contrast ≥ 4.5:1
* Focus states visible
* ARIA labels for icons

---

## 10. EXECUTION PROTOCOL

1. Identify page type
2. Choose palette
3. Build header/footer
4. Build components
5. Optimize performance & mobile
6. Deliver HTML + Tailwind

---

## 11. PRE-OUTPUT CHECKLIST

* Price visible
* CTA clear
* Grid correct
* Image ratio consistent
* Search visible
* Trust signals present
* Font correct
* No blocking animations

---

## 12. INSPIRATION (DO NOT COPY)

* COS, & Other Stories
* Uniqlo
* Coolmate
* Aritzia

Avoid:

* Shopee, Lazada
* Old ThemeForest templates

---

## FINAL PRINCIPLE

A beautiful e-commerce site is one that is **easy to buy from**.
Every design decision must answer:
👉 Does this help users buy faster, or just make it look cooler?
