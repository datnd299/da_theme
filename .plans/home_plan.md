# Medial Market — Homepage Plan

Template: `template-parts/page-home.php` (styles inline, tokens from `main.css`).

## Goals

- Get visitors to a product or category in one click (search, category cards, chips)
- Show prices and Add to cart immediately (best sellers, new arrivals)
- Answer "can I trust this store?" with shipping, returns, checkout and support facts

## Sections

1. **Hero (50/50)** — eyebrow "Free U.S. shipping on every order"; H1 "Furnish every room for less."; copy about the six departments; CTAs: Shop All Products (orange) + Browse Categories (outline); trust ticks; living-room image (eager, fetchpriority high) with "6 departments, 1 checkout" tag.
2. **Shop by category** — six image cards from `dawp_lbq_product_categories()` (image key per category).
3. **Best sellers** — `wc_get_products` orderby popularity, 8 items.
4. **Department promos** — Kitchen & Dining (Dining.jpeg) and Outdoor & Patio (Summer_Patio_Edit.jpeg) banners.
5. **New arrivals** — newest 8, excluding the first 4 best sellers.
6. **Popular searches** — chips linking to `?s=…&post_type=product` (Sofas, Bar Stools, Nightstands, Patio Sets, Gazebos, Area Rugs, Bookcases, Standing Desks, Kitchen Carts, Cat Trees, Dog Kennels, Kids Table Sets).
7. **Why Medial Market** — honest prices, free standard shipping, 30-day returns, people who answer.
8. **Support CTA** — teal panel with Contact Support + Track an Order.

## Rules

- No testimonials, review counts or ratings that do not come from real WooCommerce reviews
- No newsletter form unless it is wired to a real list
- No countdowns, pop-ups or auto-playing sliders
