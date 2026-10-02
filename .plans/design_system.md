# Medial Market — Design System

## Direction

Friendly, bright, value-focused home store. Clear prices, big search, orange buy buttons, calm teal brand. Conversion first; lifestyle photography supports, never hides, the products.

Avoid: dark themes, flash-sale banners, countdowns, serif display fonts, more than one accent color per component.

---

## Color Tokens

Defined in `assets/css/tailwind-input.css` (`@theme`) and mirrored in `assets/css/main.css` (`:root`). Templates and WooCommerce CSS must use `var(--color-*)`.

| Token | Hex | Use |
|---|---|---|
| `--color-foreground` | `#13343B` | Deep teal ink: headings, text, announcement bar, footer |
| `--color-foreground-muted` | `#55656A` | Body copy, descriptions |
| `--color-muted` | `#6B7A7E` | Captions, meta |
| `--color-accent` | `#0F6E5E` | Brand teal: links, search button, nav "Shop All", secondary buttons |
| `--color-accent-hover` | `#0A5246` | Teal hover |
| `--color-accent-soft` | `#E3F1ED` | Icon chips, active nav pill |
| `--color-accent-blush` | `#F08A3C` | Logo dot, small highlights only |
| `--color-value` | `#C2410C` | Add to cart, Proceed to checkout, Place order, sale price/badge |
| `--color-value-hover` | `#9A3412` | Value hover |
| `--color-value-soft` | `#FFF1E6` | Value tint |
| `--color-background` | `#FFFFFF` | Page |
| `--color-surface` | `#F3F7F5` | Soft mint sections, cards hover |
| `--color-surface-alt` | `#FBF8F3` | Warm alt section |
| `--color-border` | `#DDE6E2` | Borders, dividers |
| `--color-star` | `#E8A317` | Rating stars |
| `--color-success` | `#2E7D5B` | Check marks, success notices |
| `--color-alert` | `#B42318` | Errors |

White text on `--color-value` = 5.2:1, on `--color-accent` = 6.1:1 (AA).

---

## Typography

* Headings: **Plus Jakarta Sans** 700–800 (`--font-heading`)
* Body / UI: **Inter** 400–700 (`--font-sans`)
* Loaded from Google Fonts in `header.php` with `display=swap`

Scale: hero `clamp(2.2rem, 5vw, 3.6rem)`; section H2 `clamp(1.5rem, 2.6vw, 2.1rem)`; product title `.9rem/600`; price `1.08rem/800`.

---

## Layout

* Container: `min(100% - 32px, 1280px)`
* Section padding: 48px mobile / 64px desktop
* Product grid: 2 cols mobile → 3 tablet (≥640px) → 4 desktop (≥1024px)
* Category grid: 2 → 3 cols
* Radius: cards 16px, buttons pill, inputs pill/10px

---

## Components

**Header (not sticky):** dark announcement bar → logo + pill search (teal border, teal "Search" button) + Track / Account / Cart (orange count badge) → category nav row (Shop All teal pill + 6 categories, About/Contact right). Mobile: hamburger + logo + icons, full-width search always visible, drawer menu.

**Buttons:** primary buy = orange pill (`--color-value`); secondary = outlined ink pill; on-image = white pill.

**Product card:** 1:1 image, sale badge (orange pill), category caption, 2-line title, stars only when real reviews exist, price (sale in orange, regular struck), full-width orange Add to cart.

**Footer:** mint trust strip (4 icons) → dark teal main area (logo on white chip, contact, Shop / Customer Care / Policies) → copyright + payment logos.

---

## Motion

Image hover scale 1.04–1.05, color transitions 150–250ms, button press scale .98. No auto-playing carousels, no pop-ups on load.

---

## Logo

`assets/img/medialmarket-logo.svg` — teal rounded-square house/M mark with orange dot, "Medial" wordmark + spaced "MARKET".
