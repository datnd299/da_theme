# Design System — US Watch Store ("Modern Steel & Blue")

Source of truth for all visual tokens. Matches `assets/css/tailwind-input.css`
(`@theme` block) exactly — if you change one, change both.

## 1. Color Tokens

```css
/* Backgrounds */
--color-background: #F7F9FB;      /* Page background — cool off-white */
--color-surface: #FFFFFF;         /* Cards, modals, header/footer panels */
--color-surface-alt: #EEF2F6;     /* Secondary background, hover states, stripes */

/* Text */
--color-foreground: #10151C;      /* Primary text — near-black steel */
--color-foreground-muted: #4B5563;/* Secondary text */
--color-muted: #64748B;           /* Captions, placeholders, meta */

/* Brand accent */
--color-accent: #1F4E79;          /* Navy steel — primary CTA, links, active states */
--color-accent-hover: #14324D;    /* Darker navy — hover/active */
--color-accent-soft: #E6EDF5;     /* Soft blue tint — badges, chip backgrounds */
--color-accent-blush: #5B7A99;    /* Secondary accent — muted steel blue */

/* UI */
--color-border: #E2E8F0;
--color-alert: #C0392B;           /* Errors, sale/urgency */
--color-success: #2F855A;         /* Confirmations, in-stock */
```

Do not use raw hex values in CSS files — always reference `var(--color-*)`.

## 2. Typography

- `--font-sans`: 'Inter', 'Manrope', system-ui, sans-serif — body copy
- `--font-heading`: 'Manrope', 'Inter', system-ui, sans-serif — headings, product
  names, CTAs
- Headings are bold/extrabold, tight tracking. Eyebrow labels (category tags, section
  labels) use uppercase + letter-spacing (`tracking-[0.14em]` or similar), small size,
  `--color-accent` or `--color-muted`.

## 3. Shape & Elevation

Sharp / geometric shape language — near-square corners, thin shadows, borders carry
edge definition instead of soft elevation.

- `--radius-sm: 2px` — buttons, inputs, chips, small tags
- `--radius-md: 4px` — cards, panels, form fields
- `--radius-lg: 6px` — larger panels, product cards, modals
- `--radius-pill: 999px` — reserved for true circles only (avatar/icon swatches,
  bullet dots). **Do not use for buttons or inputs** — those use `--radius-sm`.
- `--shadow-card`: thin resting shadow (`0 1px 2px rgba(...)`) — pair with a
  `1px solid var(--color-border)` on cards rather than relying on shadow alone.
- `--shadow-card-hover`: shallow hover shadow (`0 2px 6px rgba(...)`) — hover
  feedback should favor `border-color`/background shift over elevation lift.

## 4. Motion

- `--ease-fluid: cubic-bezier(0.4, 0, 0.2, 1)`
- `--duration-fast: 150ms` (hover/focus states)
- `--duration-normal: 250ms` (panel/drawer transitions)
- `--duration-slow: 400ms` (page-level reveal)
- Only animate `transform`, `opacity`, `color`, `background` — never layout
  properties.

## 5. Iconography & Imagery

No photography available (see `.plans/site.md` §6 Imagery Policy). Visual language is
built from:

- **Line-art SVG icons**, `stroke="currentColor"`, `stroke-width` 1.6–2.2, rounded
  line caps/joins — consistent with the existing header/cart SVG icons already in
  `header.php` / `footer.php`.
- **Category glyphs** (one distinct simple watch-face icon per category — quartz:
  clean round dial with sweeping second hand; mechanical: dial with visible
  gear/cog motif; smartwatch: rounded-square dial with a small notification dot;
  digital: rectangular LCD-style dial with segment-style digits).
- **Gradient panels** using `--color-accent` → `--color-accent-hover`, or
  `--color-surface-alt` → `--color-background`, for hero/section backgrounds instead
  of photos.

## 6. Component Conventions (carried over from base theme, unchanged)

- Product grid: 2 columns on mobile, up to 4 on desktop (`loop_shop_columns` filter in
  `inc/woo-tweaks.php`).
- Primary CTA: solid `--color-accent` background, white text, `--radius-sm`,
  high contrast, min-height 44px (touch target). No pill buttons.
- Price: bold, `--color-foreground`, clearly larger than surrounding text.
- Prefer WooCommerce default classes for selectors (`.woocommerce`, `.product`,
  `.cart_item`, etc.) per `.claude/skills/woocommerce-theme-development/SKILL.md`.
