# CHRONEL — Design System

> Source of truth for tokens. Every value here exists as a CSS variable in
> `assets/css/tailwind-input.css` (`@theme`) and is mirrored on `:root` in
> `assets/css/main.css` so pure-CSS WooCommerce files can use it.

---

## 1. Direction

**Ivory + Champagne Gold.** Bright, warm, and quiet. The page is paper; the watch is the
subject. Gold appears only as a hairline, a rule, or a small mark — never as a large fill.
Contrast comes from generous whitespace and one deep ink section per page, not from color.

Principles:

1. **Air first.** Sections breathe at 96–160px vertical rhythm on desktop.
2. **Hairlines, not shadows.** 1px `--color-border` separates things. Shadows are near-invisible.
3. **Near-square corners.** Luxury reads as precision. 2–4px radius. Pills only for small tags.
4. **Type does the work.** A high-contrast serif for display, a geometric sans for everything else.
5. **Uppercase micro-labels.** Eyebrows and buttons are uppercase with wide tracking.
6. **Motion is slow and small.** 400–700ms, `--ease-fluid`, transform/opacity only.

---

## 2. Color tokens

### Backgrounds
| Token | Value | Use |
|---|---|---|
| `--color-background` | `#FAF8F4` | Page ground — ivory |
| `--color-surface` | `#FFFFFF` | Cards, inputs |
| `--color-surface-alt` | `#F2EEE6` | Alternating bands, hover |
| `--color-ink` | `#14140F` | Deep sections, footer |
| `--color-ink-soft` | `#1F1F1A` | Raised areas inside deep sections |

### Text
| Token | Value | Use |
|---|---|---|
| `--color-foreground` | `#1A1A18` | Headings, body |
| `--color-foreground-muted` | `#6E6A63` | Secondary copy |
| `--color-muted` | `#9A9389` | Captions, meta, placeholders |
| `--color-on-ink` | `#F4F1EA` | Text on deep sections |
| `--color-on-ink-muted` | `#A39D92` | Secondary text on deep sections |

### Brand
| Token | Value | Use |
|---|---|---|
| `--color-accent` | `#B08D4F` | Champagne gold — rules, marks, links |
| `--color-accent-hover` | `#96763C` | Gold, pressed |
| `--color-accent-soft` | `#E8DCC4` | Pale gold fills, badges |
| `--color-accent-deep` | `#7A5F2E` | Gold on light, needs contrast |

### UI
| Token | Value | Use |
|---|---|---|
| `--color-border` | `#E3DDD2` | Hairlines |
| `--color-border-strong` | `#C9C0B1` | Inputs, focus |
| `--color-border-ink` | `#2C2C25` | Hairlines on deep sections |
| `--color-alert` | `#A33A2A` | Errors |
| `--color-success` | `#4A6B4F` | Success |

**Contrast:** `--color-foreground` on `--color-background` = 15.4:1. `--color-foreground-muted`
on `--color-background` = 5.3:1. `--color-accent-deep` on `--color-background` = 5.6:1 — use
`--color-accent-deep` (not `--color-accent`) for gold *text* on light grounds.

---

## 3. Typography

| Token | Stack |
|---|---|
| `--font-heading` | `'Cormorant Garamond', 'Playfair Display', Georgia, serif` |
| `--font-sans` | `'Jost', 'Inter', system-ui, sans-serif` |

Loaded from Google Fonts in `header.php` with `preconnect`, weights 300/400/500/600 only.

### Scale
| Token | Clamp | Use |
|---|---|---|
| `--text-display` | `clamp(2.75rem, 1.6rem + 5.2vw, 6rem)` | Hero |
| `--text-h1` | `clamp(2.25rem, 1.5rem + 3.2vw, 4rem)` | Page title |
| `--text-h2` | `clamp(1.75rem, 1.3rem + 2vw, 2.75rem)` | Section title |
| `--text-h3` | `clamp(1.25rem, 1.1rem + 0.7vw, 1.625rem)` | Card title |
| `--text-body` | `clamp(1rem, 0.97rem + 0.15vw, 1.0625rem)` | Body |
| `--text-body-sm` | `clamp(0.9375rem, 0.92rem + 0.1vw, 1rem)` | Secondary |
| `--text-caption` | `clamp(0.8125rem, 0.8rem + 0.08vw, 0.875rem)` | Meta |
| `--text-eyebrow` | `0.6875rem` | Uppercase label, `--tracking-wide` |

### Tracking
`--tracking-wide: 0.22em` (eyebrows, buttons) · `--tracking-brand: 0.42em` (wordmark) ·
`--tracking-tight: -0.02em` (display serif).

Display serif is set in **300 weight**, never bold. Sans is 400 for body, 500 for labels.

---

## 4. Space, radius, elevation

```
--space-xs 4  --space-sm 8   --space-md 16  --space-lg 24
--space-xl 40 --space-2xl 64 --space-3xl 96 --space-4xl 160

--radius-sm 2px  --radius-md 3px  --radius-lg 4px  --radius-pill 999px

--shadow-card       0 1px 2px rgba(26,26,24,.04)
--shadow-card-hover 0 12px 40px rgba(26,26,24,.10)
--shadow-ink        0 24px 60px rgba(20,20,15,.28)
```

Container: `--container-max: 1360px`, padding 20px mobile / 40px desktop.
Narrow reading column: `--container-narrow: 760px`.

---

## 5. Components

**Button — primary.** Ink fill, ivory text, 2px radius, uppercase 0.22em tracking, 500 weight,
min-height 52px (48px mobile), 32px horizontal padding. Hover: background → `--color-accent-deep`.

**Button — ghost.** Transparent, 1px `--color-foreground` border, same metrics. Hover: fills ink.

**Link — quiet.** Uppercase micro-label with a 1px underline drawn as a `::after` that grows
from 0 → 100% on hover over 400ms.

**Card — collection.** No shadow at rest. 1px border. Image sits on `--color-surface-alt`.
Hover: image `scale(1.03)`, border → `--color-accent`, over 600ms.

**Rule — gold.** A 32px × 1px `--color-accent` bar above section titles. Used once per section.

**Input.** 1px `--color-border-strong`, 3px radius, 52px tall, 16px font (prevents iOS zoom).
Focus: border → `--color-accent`, plus a 3px `--color-accent-soft` ring.

**Deep section.** `--color-ink` ground, `--color-on-ink` text, `--color-border-ink` hairlines.
One per page maximum, used for the atelier/movement narrative.

---

## 6. Layout rules

- Product grid: **2 columns on mobile**, 3 on tablet, 4 on desktop. Never 1 on mobile.
- Collection grid: 1 / 2 / 4.
- Touch targets ≥ 44px.
- Section padding: `clamp(64px, 9vw, 160px)` block.
- Images: `aspect-ratio` locked, `object-fit: contain` for watches on `--color-surface-alt`.

---

## 7. Prohibited

- `@apply` in any `.css` file.
- Hardcoded hex/rgb outside `tailwind-input.css` and `:root` in `main.css`.
- ID selectors, `!important` (unless overriding a plugin inline style, with a comment).
- Nesting deeper than 3 levels.
- Animating anything but `transform`, `opacity`, `color`, `background-color`, `border-color`.
