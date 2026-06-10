# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Build Commands

```bash
npm run build:tw      # Compile Tailwind CSS for all page variants
npm run build:theme   # Full build: Tailwind + minify CSS/JS + package to dist/*.zip
```

## Architecture

### Template Structure
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
- `template-parts/page-shipping-policy.php` → Shipping Policy page
- `template-parts/page-return-refund-policy.php` → Return & Refund Policy page
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


### Skills
Two Claude Code skills are installed and govern design/dev standards:
- `.claude/skills/woocommerce-theme-development/SKILL.md` — defines allowed file scope and CSS conventions
- `.claude/skills/ecommerce-design/SKILL.md` — design system patterns for conversion-optimized e-commerce UI

Always read these skills before making UI or WooCommerce-related changes.
