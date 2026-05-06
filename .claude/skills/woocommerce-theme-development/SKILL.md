---
name: woocommerce-theme-development
description: Skill for AI agents (Claude Code, Cursor, Windsurf...) to develop a simple WooCommerce theme focused on selling. Page content is hardcoded to ensure easy development and fast loading. Clearly defines the scope of editable files.
---

# Skill: WooCommerce Theme Developer (Conversion-Optimized)

## 1. Project Structure & File Scope

Website information is defined in `.plans/site.md` — **MUST BE STRICTLY FOLLOWED**.  
Design system is defined in `.plans/design_system.md` — **MUST BE STRICTLY FOLLOWED**.  
Reference HTML templates are defined in `/.plans/templates/*.html` — **READ ONLY to understand structure, DO NOT modify**.

### 1.1. Theme Folder Structure & File Rules — MANDATORY COMPLIANCE  
All file content must follow `.plans/site.md` and `.plans/design_system.md`.

**Main CSS file — AI IS ALLOWED to edit**
- `assets/css/main.css` → Main CSS file used across all pages, contains only pure CSS (no Tailwind), concise, includes shared styles (variables, common components)

**Header & Footer — AI IS ALLOWED to edit**
- `header.php` → Uses HTML + PHP + Tailwind  
- `footer.php` → Uses HTML + PHP + Tailwind  

**Static pages — AI IS ALLOWED to edit (use Tailwind)**
- `assets/css/tailwind-input.css` → Contains theme variables  
- `template-parts/page-home.php` → Homepage content (HTML + PHP + Tailwind)  
- `template-parts/page-contact.php` → Contact page  
- `template-parts/page-about.php` → About Us page  
- `template-parts/page-faq.php` → FAQ page  
- `template-parts/page-privacy.php` → Privacy Policy page  
- `template-parts/page-shipping-returns.php` → Shipping & Returns page  
- `template-parts/page-terms.php` → Terms & Conditions page  
- `404.php` → 404 page  

**WooCommerce pages & their CSS — AI IS ALLOWED to edit**
- `woocommerce/archive-product.php` → Shop page (HTML + PHP, NO Tailwind)  
- `woocommerce/content-product.php` → Product page (HTML + PHP, NO Tailwind)  
- `assets/css/shop.css` → Shop styles (pure CSS for WooCommerce classes), structure reference in `.plans/templates/shop.html`  
- `assets/css/product.css` → Product styles, reference `.plans/templates/product.html`  
- `assets/css/cart.css` → Cart styles, reference `.plans/templates/cart.html`  
- `assets/css/checkout.css` → Checkout & thank-you page styles, reference `.plans/templates/checkout.html` & `.plans/templates/thank-you.html`  
- `assets/css/track-order.css` → Track Order styles, reference `.plans/templates/track-order.html`  

**Global JS file — AI IS ALLOWED to edit**
- `assets/js/main.js` → Main JS file, pure JS only, concise  

### 1.2. Files/Folders NOT to read or modify
- `assets/css/tw/**` → Built Tailwind files  
- `dist/**` → Built theme output  

---

## 2. CSS Rules — Pure CSS + Variables

### 2.1. Mandatory Principles

**DO NOT use `@apply`** with Tailwind utilities in CSS files.  
Reason: separate “theme tokens” (defined in `tailwind-input.css`) from “WooCommerce styles” (pure CSS). When tokens change, styles update automatically.

**ONLY ALLOWED:**
- Pure CSS (selectors + properties)  
- CSS variables from `tailwind-input.css` (`var(--color-foreground)`, etc.)  
- Standard pseudo-classes, pseudo-elements, media queries  
- Modern CSS nesting (well-supported since 2023)  

---

### 2.2. Structure of `tailwind-input.css`

This is the **single source of truth** for theme tokens.  
All colors, fonts, spacing, easing must be defined here.

```css
@import "tailwindcss";

@theme {
  /* === COLORS === */
  /* Background layers */
  --color-background: #FDFBF7;        /* Main background */
  --color-surface: #FFFFFF;           /* Card, modal */
  --color-surface-alt: #F5F2EC;       /* Secondary background, hover */

  /* Text */
  --color-foreground: #1A1512;        /* Primary text */
  --color-foreground-muted: #6B635C;  /* Secondary text */
  --color-muted: #8B9D83;             /* Caption, placeholder */
}
````

**Rules when editing `tailwind-input.css`:**

* Only add/edit variables inside `@theme`, DO NOT write CSS rules
* Use naming: `--color-*`, `--font-*`, `--radius-*`, `--shadow-*`
* Group variables with comments (COLORS, TYPOGRAPHY, etc.)
* DO NOT remove default variables (background, surface, foreground, muted, font-sans, font-heading, ease-fluid)

---

### 2.4. Selector Principles

* **Prioritize WooCommerce default classes** (`.woocommerce`, `.product`, `.cart_item`, `.woocommerce-Price-amount`, etc.)
* **Do not use `!important`** unless overriding plugin inline styles (must include explanation)
* **Max nesting depth: 3 levels**
* **Do not use ID selectors** (`#...`)
* **Minimal specificity** — prefer single-class selectors, avoid combining with tags

---

## 6. Standard Workflow for AI Agent

When receiving a request, follow this order:

### Step 1: Identify scope

Which page? Shop / Product / Cart / Checkout / Theme tokens?
→ Determine 1–2 files to edit within allowed scope.

---

### Step 2: Read reference HTML

Check `templates/[page].html` to understand:

* WooCommerce HTML structure
* Classes used
* Elements needing styling

---

### Step 3: Check theme tokens

Review `tailwind-input.css`.
If missing variables → add them inside `@theme`.

---

### Step 4: Write CSS

Modify appropriate CSS file, ensuring:

* Pure CSS, no `@apply`
* All values use `var(--*)`
* Clean selectors, prioritize WooCommerce classes
* Mobile-first: base for mobile, use `@media (min-width: ...)` for desktop

---

### Step 5: Self-check

Validate against Section 7 checklist.

---

### Step 6: Report

Summarize:

* Edited files
* Added/modified CSS blocks
* New variables (if any)
* Notes for user (if HTML dependencies exist)

---

## 7. Pre-output Checklist

AI must verify:

* [ ] Only allowed files modified?
* [ ] No `@apply` used?
* [ ] No hardcoded colors (hex/rgb)? All use `var(--color-*)`?
* [ ] No hardcoded fonts? Use `var(--font-*)`?
* [ ] Easing & duration use `var(--ease-*)`, `var(--duration-*)`?
* [ ] No `!important` (or justified)?
* [ ] No ID selectors?
* [ ] Minimal specificity?
* [ ] Mobile-first?
* [ ] Animations only use `transform`, `opacity`, `color`, `background`?
* [ ] Consistent border radius (card lg, button pill, input md)?
* [ ] Primary CTA is prominent and high contrast?
* [ ] Product price clearly visible on product card?
* [ ] Product grid is 2 columns on mobile (not 1)?
* [ ] Touch targets ≥ 44px on mobile?
* [ ] Input fields have clear focus state?
* [ ] No animations blocking product grid rendering?

---

## 8. When AI MUST stop and ask the user

AI **must stop and ask** if:

1. Request involves files outside allowed scope
2. Request requires adding JS, plugins, or changing build pipeline
3. HTML in `templates/` does not match actual WooCommerce classes
4. Theme tokens (colors, fonts) need changes → must confirm first
5. Request conflicts with Section 7 checklist

**Do not expand scope on your own. Asking is safer than breaking the theme.**
