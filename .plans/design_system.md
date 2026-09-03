# Design System

## Design Direction

**Style:** Modern premium watch ecommerce

The visual identity should feel:
- Premium
- Minimal
- Sophisticated
- Trustworthy
- Modern
- Clean

Avoid an overly luxurious or flashy look. The product should remain the main focus.

---

## Color Palette

### Primary Background
`#F7F7F5`

Warm off-white for the main page background.

### Surface
`#FFFFFF`

Used for product cards, navigation elements, and clean content areas.

### Primary Text
`#171717`

Near-black for headings and important content.

### Secondary Text
`#6B6B6B`

Used for descriptions, metadata, and supporting text.

### Accent
`#A88B5A`

Muted gold used sparingly for premium details, hover states, icons, or small highlights.

### Border
`#E5E5E2`

Very subtle borders and separators.

---

## Typography

Use a combination of serif and sans-serif typography.

### Headings
Elegant serif font.

Examples:
- Cormorant Garamond
- Playfair Display
- DM Serif Display

Use for:
- Hero heading
- Section headings
- Large promotional statements

### Body / UI
Modern sans-serif.

Examples:
- Inter
- Manrope
- DM Sans

Use for:
- Navigation
- Product names
- Prices
- Buttons
- Descriptions
- Forms

### Typography Rules

- Large editorial-style headings
- Short paragraphs
- Strong visual hierarchy
- Avoid excessive bold text
- Use uppercase selectively for navigation and CTAs

---

## Layout

### Container

Maximum width:

`1280px`

Desktop horizontal padding:

`32–48px`

Mobile horizontal padding:

`16–20px`

### Grid

Product grid:

- Desktop: 4 columns
- Tablet: 2–3 columns
- Mobile: 2 columns

Category grid:

- Desktop: 4 columns
- Tablet: 2 columns
- Mobile: 1–2 columns depending on image ratio

---

## Spacing

Use generous whitespace to create a premium appearance.

Suggested spacing scale:

- XS: `8px`
- SM: `12px`
- MD: `20px`
- LG: `32px`
- XL: `48px`
- 2XL: `72px`
- 3XL: `96px`

Major homepage sections should generally have `72–120px` vertical spacing on desktop.

---

## Buttons

### Primary Button

Dark background with white text.

Example:

`SHOP ALL WATCHES`

Properties:
- Height: 48–52px
- Horizontal padding: 24–32px
- Uppercase
- Letter spacing: 0.08em
- Font size: 12–14px
- Minimal border radius: 0–2px

### Secondary Button

Transparent background with dark border.

Example:

`EXPLORE NEW ARRIVALS`

Use secondary buttons less prominently than primary CTAs.

---

## Product Cards

Keep product cards clean and image-focused.

### Structure

```text
PRODUCT IMAGE
Brand
Product Name
★★★★★
$XXX
```

### Behavior

On hover:
- Slight image zoom
- Reveal secondary product image if available
- Show wishlist icon
- Keep animation subtle

Avoid excessive shadows, gradients, or rounded UI elements.

---

## Product Photography

Product photography is one of the most important parts of the design.

### Recommended Style

- Clean background
- Consistent lighting
- High resolution
- Product centered
- Consistent image ratio
- Minimal visual clutter

Use lifestyle photography in hero and promotional sections, while product grids should prioritize clean product images.

---

## Responsive Design

### Desktop

Prioritize:
- Large hero imagery
- Four-column product grids
- Spacious sections
- Full navigation

### Tablet

- Reduce spacing
- 2–3 column grids
- Maintain large product imagery

### Mobile

- Compact header
- Hamburger menu
- 2-column product grid
- Full-width CTAs where appropriate
- Shorter hero copy
- Reduced section spacing

The mobile experience should remain fast and product-focused.

---

## Implementation mapping (2026-09-03)

Maps this palette/type system onto the theme's existing token layer
(`assets/css/tailwind-input.css` `@theme` block + `assets/css/main.css`
`:root`, both of which every page — not just the homepage — reads from):

- `--color-background` → `#F7F7F5`
- `--color-surface` → `#FFFFFF`
- `--color-foreground` → `#171717`
- `--color-foreground-muted` / `--color-muted` → `#6B6B6B`
- `--color-accent` → `#A88B5A` (hover: a darker gold, `#8F764A`)
- `--color-border` / `--color-line` → `#E5E5E2`
- `--color-primary` (dark sections, primary button fill) → `#171717`, matching
  the "Primary Button: dark background with white text" spec
- `--font-heading` → `Playfair Display` (serif, loaded via Google Fonts)
- `--font-sans` → `Inter` (already the theme's body font, kept)

Heading font was changed from Poppins (sans) to Playfair Display (serif) to
satisfy the "combination of serif and sans-serif" rule — this is a sitewide
token, so it also reflows onto legal/FAQ/track-order pages already built on
these variables.
