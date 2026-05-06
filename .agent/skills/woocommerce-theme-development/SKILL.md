---
name: woocommerce-theme-development
description: Skill for AI agents (Claude Code, Cursor, Windsurf...) to develop a simple WooCommerce theme focused on selling. Clearly defines the allowed file scope, how to write pure CSS using CSS variables to style WooCommerce classes, and a youthful, dynamic design pattern optimized for conversion. Strictly do not modify files outside the allowed scope.
---

# Skill: WooCommerce Theme Developer (Conversion-First, CSS Variables Only)

## 1. Project Structure and File Scope

Website information is defined in `.plans/site.md` — MUST BE STRICTLY FOLLOWED.

### 1.1. Theme Folder Structure & File Rules — STRICT COMPLIANCE REQUIRED

**AI IS ALLOWED to modify:**

* `assets/css/tailwind-input.css` → Tailwind theme tokens
* `assets/css/shop.css` → CSS for shop page only (pure CSS, no Tailwind)
* `assets/css/product.css` → CSS for product page only (pure CSS, no Tailwind)
* `assets/css/cart.css` → CSS for cart page only (pure CSS, no Tailwind)
* `assets/css/checkout.css` → CSS for checkout page only (pure CSS, no Tailwind)
* `template-parts/*.php` → Templates for other pages using HTML + PHP + Tailwind (no dependency on other CSS files)

**AI IS ALLOWED to read (to understand HTML structure):**

* All files in `/.plans/templates/*.html`

---

## 2. CSS Rules — Pure CSS + Variables

### 2.1. Non-negotiable Principles

**DO NOT use `@apply`** with Tailwind utilities inside CSS files.
Reason: clearly separate "theme tokens" (defined in `tailwind-input.css`) and "WooCommerce styling" (pure CSS in the other 4 files). When tokens change, all WooCommerce styles update automatically.

**ONLY USE:**

* Pure CSS (selectors + properties)
* CSS variables from `tailwind-input.css` (via `var(--color-foreground)`, etc.)
* Standard pseudo-classes, pseudo-elements, media queries
* Modern CSS nesting (well-supported since 2023)

---

### 2.2. Structure of `tailwind-input.css`

This is the **single source of truth** for theme tokens. All values for colors, fonts, spacing, easing must be defined here.

```css
@import "tailwindcss";

@theme {
  /* === COLORS === */
  /* Background layers */
  --color-background: #FDFBF7;        /* Main background */
  --color-surface: #FFFFFF;           /* Cards, modals */
  --color-surface-alt: #F5F2EC;       /* Secondary background, hover state */

  /* Text */
  --color-foreground: #1A1512;        /* Primary text */
  --color-foreground-muted: #6B635C;  /* Secondary text */
  --color-muted: #8B9D83;             /* Captions, placeholders */
}
```

**Rules when editing `tailwind-input.css`:**

* Only add/edit variables inside the `@theme` block, DO NOT write CSS rules
* Use naming pattern: `--color-*`, `--font-*`, `--radius-*`, `--shadow-*`
* When adding new variables, group them under section comments (COLORS, TYPOGRAPHY...)
* DO NOT remove default variables (background, surface, foreground, muted, font-sans, font-heading, ease-fluid)

---

### 2.4. Selector Principles

* **Prioritize native WooCommerce classes** (`.woocommerce`, `.product`, `.cart_item`, `.woocommerce-Price-amount`, etc.)
* **Do not use `!important`** unless overriding inline plugin styles (must include comment explaining why)
* **No nesting deeper than 3 levels**
* **Do not use ID selectors** (`#...`) for styling
* **Minimal specificity** — a single class is sufficient, avoid combining with tags

---

## 6. Standard Workflow for AI Agent

When receiving a request, the AI agent must follow this sequence:

### Step 1: Identify Scope

Which page does the request belong to? Shop / Product / Cart / Checkout / Theme tokens?
→ Determine 1–2 files to modify within the allowed set.

---

### Step 2: Read HTML Reference

Read the corresponding file in `templates/[page].html` to understand:

* How WooCommerce renders HTML
* Which classes are used
* Which elements need styling

---

### Step 3: Check Theme Tokens

Review the current `tailwind-input.css`.
If required variables are missing → add them inside the `@theme` block.

---

### Step 4: Write CSS

Edit the appropriate CSS file. Follow:

* Pure CSS, no `@apply`
* All colors/fonts/radius/easing must use `var(--*)`
* Keep selectors concise, prioritize WooCommerce classes
* Mobile-first: base styles for mobile, use `@media (min-width: ...)` for desktop

---

### Step 5: Self-check

Run through the checklist in Section 7 before finishing.

---

### Step 6: Report

Summarize:

* Files modified
* CSS blocks added/changed
* New variables added to `tailwind-input.css` (if any)
* Notes for the user (if dependencies with HTML templates exist)

---

## 7. Pre-output Checklist

Before committing CSS, the AI must verify:

* [ ] Only modified files within the 5 allowed files?
* [ ] No usage of `@apply`?
* [ ] No hard-coded hex/rgb values? All colors use `var(--color-*)`?
* [ ] No hard-coded font names? Use `var(--font-*)`?
* [ ] Easing and duration use `var(--ease-*)`, `var(--duration-*)`?
* [ ] No `!important` (or properly justified with comments)?
* [ ] No ID selectors used for styling?
* [ ] Minimal specificity?
* [ ] Mobile-first approach (base = mobile, media query = desktop)?
* [ ] Animations only use `transform`, `opacity`, `color`, `background`?
* [ ] Consistent border radius (system: card lg, button pill, input md)?
* [ ] Primary CTA has high contrast and is clearly visible?
* [ ] Price is clearly visible on product cards?
* [ ] Product grid has 2 columns on mobile (not 1 column)?
* [ ] Touch targets ≥ 44px on mobile (buttons, links, quantity controls)?
* [ ] Form inputs have clear focus states?
* [ ] No blocking entry animations on product grid?

---

## 8. When to Stop and Ask the User

The AI agent MUST stop and ask if:

1. The user requests modifying files outside the allowed 5 files
2. The user requests adding JS, plugins, or changing the build pipeline
3. HTML in `templates/` does not match actual WooCommerce classes (ask user to verify)
4. Theme tokens (colors/fonts) need to be changed → confirm before editing `tailwind-input.css`
5. The request conflicts with the checklist in Section 7

**Do not expand scope on your own. Better to ask more than to break the theme.**
