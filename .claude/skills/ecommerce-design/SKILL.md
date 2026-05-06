---
name: ecommerce-design
description: Guide for AI to design e-commerce websites tailored to the user's requested niche. Conversion-optimized, using HTML + Tailwind. Clearly defines fonts, colors, layouts, components, and proven sales patterns. Avoids design mistakes that reduce conversion rates. Website structure and content are aligned with the US market, using English language.
---

# Agent Skill: E-commerce UI Design (Conversion-First)

## 1. Overview & Core Directives

* **Persona:** `Ecommerce_Designer`

* **Goal:** Design e-commerce websites with **conversion prioritized over aesthetics**, while still maintaining a modern, youthful, and appealing interface. Every pixel must serve one of three purposes:

  1. Help users find products  
  2. Help users decide to purchase  
  3. Reduce friction in the checkout process  

* **Golden Rule:** Customers are NOT here to admire design. They come to **buy**. Design is a tool; revenue is the goal.

---

## 2. “ABSOLUTE ZERO” RULES (PREVENT E-COMMERCE FAILURE)

If any of the following mistakes occur → the design fails immediately:

### A. Conversion-killing patterns

* **Forbidden:** Hero section with only an image + vague slogan like “Define your style”. Must include a clear CTA (“Shop Now”, “View New Collection”) + real product imagery.  
* **Forbidden:** Hiding prices on hover or click. Prices must be visible immediately on product cards.  
* **Forbidden:** Low-contrast “Add to Cart” / “Buy Now” buttons. Must be highly prominent.  
* **Forbidden:** Hiding search behind an icon on mobile. Search bar must be clearly visible in the header.  
* **Forbidden:** Lazy loading product images above-the-fold. Hero and initial products must use `loading="eager"`.  

### B. Poor aesthetic patterns (fashion context)

* **Forbidden fonts:** Times New Roman, Comic Sans, serif fonts for UI. Use modern sans-serif.  
* **Forbidden:** Too many bright colors at once. Stick to 2–4 main colors + 1 accent.  
* **Forbidden:** Rigid, overly symmetric layouts like old Bootstrap templates.  

### C. UX-breaking patterns

* **Forbidden:** “Subscribe for voucher” popup immediately on load. Delay at least 30s or trigger on scroll.  
* **Forbidden:** Sticky banners blocking content, especially on mobile.  
* **Forbidden:** Auto-playing carousels faster than 5 seconds.  

---

## 3. “VIBE” SYSTEM

### A. Color System (adapt based on audience)

**Palette 1 - "Soft Pop" (female 18–28):**

* Background: `#FAFAFA` or `#FFFFFF`  
* Primary text: `#0A0A0A`  
* Secondary text: `#737373`  
* Accent (CTA, sale): `#FF4D4D` or `#FF6B9D`  
* Border: `#F0F0F0`  

**Palette 2 - "Urban Cool" (streetwear, unisex):**

* Background: `#FFFFFF` + black sections `#0A0A0A`  
* Text on white: `#0A0A0A`  
* Text on black: `#FAFAFA`  
* Accent: `#FFEB00` (neon yellow) or `#00D26A`  
* Border: `#E5E5E5`  

**Palette 3 - "Minimal Warm" (local/basic brands):**

* Background: `#FBF9F5`  
* Primary text: `#1A1A1A`  
* Secondary text: `#8A8580`  
* Accent: `#D4715C` or `#2F4858`  
* Border: `#EFEAE0`  

---

### B. Typography

**Recommended fonts (popular in US e-commerce):**

* Examples: **Inter, Open Sans, Poppins, Satoshi, Plus Jakarta Sans**  
* Avoid: serif fonts for UI, decorative fonts for main content  

**Scale (mobile-first):**

```

* Hero heading: text-4xl md:text-5xl lg:text-6xl, font-bold, tracking-tight
* Section heading: text-2xl md:text-3xl, font-semibold
* Product name: text-sm md:text-base, font-medium
* Price: text-base md:text-lg, font-bold
* Body text: text-sm md:text-base
* Caption/meta: text-xs, text-neutral-500

```

---

### C. Spacing (balanced, not too airy)

* Section padding: `py-12 md:py-16`  
* Card padding: `p-3 md:p-4`  
* Grid gap: `gap-3 md:gap-4`  
* Container: `max-w-7xl mx-auto px-4 md:px-6`  

---

## 4. CORE COMPONENTS

### A. Header / Navigation

**Desktop:**

```

[Logo] [Menu: Categories | Shop | Track Order | About | Customizable] [Search Bar] [Wishlist | Cart(count) | Account]

```

* Sticky top with blur  
* Cart icon always shows item count (hidden if = 0)  
* Search must be clearly visible  

**Mobile:**

```

[Hamburger] [Centered Logo] [Search | Cart]

```

* Slide-in menu  
* Search expands full width  

---

### B. Product Card

* Image ratio: `3/4` (fashion), `1/1` (accessories)  
* Hover: subtle image scale only  
* Show original price + sale price (strikethrough)  
* Color swatches: show 3–4 + “+2”  

---

### C. Product Grid

* Mobile: `grid-cols-2` (**REQUIRED**)  
* Tablet: 3 columns  
* Desktop: 4 columns  
* Do not use masonry/bento layouts  

---

### D. Hero Section

Valid layouts:

1. Full image + CTA overlay  
2. 50/50 split  
3. Carousel (max 3 slides)  

**Avoid vague headlines:**

* ❌ “Define your essence”  
* ✅ “Fall Winter 2026 - Up to 30% Off”  

---

### F. Filter & Sort

* Desktop: left sidebar  
* Mobile: bottom sheet  
* Sort: top-right dropdown  
* Active filters: removable chips  

---

### G. Trust Signals (REQUIRED)

* Free shipping threshold  
* Return policy duration  
* Payment method logos  
* Hotline + working hours  

---

## 6. MOTION & MICRO-INTERACTIONS

Suggested:

* Image hover effects  
* Button click scaling  
* Cart animation  
* Wishlist animation  
* Skeleton loading  
* Parallax  
* Cursor effects  

Avoid:

* Heavy transitions  

---

## 7. PERFORMANCE (CRITICAL)

* LCP < 2.5s  
* Prioritize hero loading  
* Optimize product images + lazy load  
* Font: `font-display: swap`  
* Defer JavaScript  

---

## 8. MOBILE-FIRST CHECKLIST

* 2-column grid  
* CTA ≥ 44px  
* Sticky add-to-cart  
* Bottom navigation (optional)  
* Filters = bottom sheet  

---

## 9. ACCESSIBILITY

* Alt text for all images  
* Contrast ≥ 4.5:1  
* Clear focus states  
* ARIA labels for icons  

---

## 10. EXECUTION PROCESS

1. Identify page type  
2. Choose palette  
3. Build header/footer  
4. Build components  
5. Optimize performance & mobile  
6. Output HTML + Tailwind  

---

## 11. PRE-OUTPUT CHECKLIST

* Prices visible  
* Clear CTA  
* Correct grid  
* Consistent image ratios  
* Visible search  
* Trust signals present  
* Proper fonts  
* No obstructive animations  

---

## FINAL PRINCIPLE

A beautiful e-commerce website is one that is **easy to buy from**.