# Design System — ProudlyWear ("Heritage Patriotic")

Tokens live in `assets/css/tailwind-input.css` (`@theme`) and `assets/css/main.css` (`:root`,
drives the pure-CSS WooCommerce pages). Both must stay in sync. Templates use the token utilities
(`bg-background`, `text-foreground`, `bg-accent`, `border-border-strong`, `shadow-ink`…), not raw hex.

## 1. Color

| Token | Value | Use |
|---|---|---|
| `--color-background` | `#F7F4EE` | Warm canvas page background |
| `--color-surface` | `#EFEAE0` | Alternate sections, panels |
| `--color-surface-alt` | `#E4DDCF` | Khaki hover fills, image wells |
| `--color-foreground` | `#0F1E33` | Navy ink — text, dark bands, footer |
| `--color-foreground-muted` | `#3B4859` | Body copy |
| `--color-muted` | `#66707E` | Captions, meta |
| `--color-accent` | `#B31942` | Old Glory red — primary CTA, prices, eyebrows (white text OK) |
| `--color-accent-hover` | `#8F1435` | CTA hover |
| `--color-accent-soft` | `#F7DDE3` | Tints, error backgrounds |
| `--color-accent-2` | `#0A3161` | Old Glory blue — branch tiles, search band, secondary (white text OK) |
| `--color-highlight` | `#C8A24A` | Brass — medals, stars, rules on navy. **Navy text only** on brass |
| `--color-highlight-soft` | `#F3E8CC` | Focus rings |
| `--color-olive` | `#4A5233` | Reserved accent |
| `--color-border` / `--color-border-strong` | `#DCD4C4` / `#B3AA98` | Soft dividers / input & card outlines |

## 2. Typography

- Display: `Oswald` 600 (`--font-display`, `.font-display`) — uppercase titles, card names.
- Stencil: `Saira Stencil One` (`--font-stencil`, `.font-stencil`) — eyebrow labels, step numbers, 404 only.
- Headings/UI: `Barlow Semi Condensed` 500–700 (`--font-heading`) — nav, buttons, labels (uppercase, wide tracking).
- Body: `Barlow` 400–700 (`--font-sans`).
- One Google Fonts `<link>` in `header.php`.

## 3. Shape & Elevation

- Radius: sm 2px, md 4px (buttons/inputs), lg 6px (cards), pill for counters only.
- Borders: 1px `border`/`border-strong`; 3–4px red or brass top rules mark featured cards/panels.
- Shadows: `--shadow-ink: 0 3px 0 navy` (solid buttons press down on hover), `--shadow-card-hover`
  soft lift for cards/dropdowns. Card hover = translateY(-4px) + soft shadow.
- Motifs: ★ stars, red/white/blue `.flag-stripe`, stencil eyebrow between two navy rules, brass "Proudly Served" medal.

## 4. Imagery

- AI-generated (snapgen GPT Image 2, 1K) WebP in `assets/images/home/`: `hero` (veteran on porch, 1200×900),
  `about-shop` (print table, 1200×900), `cat-tees|hoodies|sweatshirts|polos|bombers|caps|flags|signs` (700×700,
  flat-lays on canvas).
- Never show official military seals, emblems, insignia or recognisable real people; no fake customer
  photos, testimonials or rating counts.

## 5. Components (Tailwind, inline per page)

- **Primary button:** `rounded-md bg-accent font-heading font-bold uppercase tracking-wider text-background shadow-ink hover:translate-y-[2px] hover:bg-accent-hover hover:shadow-none`
- **Secondary button:** `rounded-md border-2 border-foreground … hover:bg-foreground hover:text-background`
- **Card:** `rounded-lg border border-border bg-[#FFFFFF] hover:-translate-y-1 hover:shadow-card-hover`
- **Stencil eyebrow:** `font-stencil border-y-2 border-foreground uppercase tracking-[0.2em]` with red ★ either side
- **Section eyebrow:** red `font-heading` uppercase + ★; **Section title:** `font-display text-4xl sm:text-5xl uppercase`

## 6. Layout

- Mobile-first; product/category grids always ≥ 2 columns on mobile. Touch targets ≥ 44px. Header not sticky.
- Section rhythm: canvas → khaki surface (border-y) → navy band → canvas → blue CTA band → khaki promise strip → navy footer.
