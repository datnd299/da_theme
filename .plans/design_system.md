# Shopshive Design System

> *"Open Doors To A World Of Fashion"* — A design language for modern women's fast fashion.

---

## Brand Essence

Shopshive is bold, accessible, and trend-forward. The visual identity should feel like flipping through a glossy fashion editorial — aspirational but never cold, energetic but never overwhelming. Every screen is an invitation to explore.

---

## Color Palette

### Primary Colors

| Token | Hex | Usage |
|---|---|---|
| `--color-brand-rose` | `#E8567A` | CTAs, highlights, active states |
| `--color-brand-nude` | `#F5E6DC` | Backgrounds, cards, soft sections |
| `--color-brand-charcoal` | `#2B2B2B` | Body text, headings |

### Secondary Colors

| Token | Hex | Usage |
|---|---|---|
| `--color-accent-blush` | `#F2A8BC` | Hover states, badges, tags |
| `--color-accent-sand` | `#D4B8A0` | Borders, dividers, muted UI |
| `--color-accent-ivory` | `#FDF8F4` | Page background, form fields |

### Semantic Colors

| Token | Hex | Usage |
|---|---|---|
| `--color-success` | `#5BAD8A` | Order confirmed, in-stock |
| `--color-warning` | `#E8A23A` | Low stock, promotions |
| `--color-error` | `#D94F4F` | Form errors, out-of-stock |

---

## Typography

### Font Stack

```
Display / Hero:   "Cormorant Garamond", Georgia, serif
Headings:         "Playfair Display", serif
Body:             "DM Sans", sans-serif
Labels / UI:      "DM Sans", sans-serif
```

### Type Scale

| Level | Size | Weight | Usage |
|---|---|---|---|
| `hero` | 56–72px | 300 (Light) | Hero banners, campaign titles |
| `h1` | 40px | 500 | Page titles |
| `h2` | 28px | 600 | Section headings |
| `h3` | 20px | 600 | Card titles, sub-sections |
| `body-lg` | 16px | 400 | Product descriptions |
| `body` | 14px | 400 | General content |
| `caption` | 12px | 400 | Labels, metadata, prices |

**Line heights:** Hero `1.1` · Headings `1.25` · Body `1.6`

---

## Spacing System

Based on a **4px base unit**.

```
xs   = 4px
sm   = 8px
md   = 16px
lg   = 24px
xl   = 32px
2xl  = 48px
3xl  = 64px
4xl  = 96px
```

---

## Layout & Grid

- **Max container width:** 1280px
- **Column grid:** 12-column, `24px` gutters
- **Mobile breakpoint:** < 768px → 4 columns, `16px` gutters
- **Tablet breakpoint:** 768–1024px → 8 columns
- Product grids: **4-up** desktop · **2-up** tablet · **2-up** mobile

---

## Components

### Buttons

```
Primary:   bg #E8567A, text white, rounded-full, px-6 py-3
Secondary: bg transparent, border 1.5px #E8567A, text #E8567A
Ghost:     no border, text #2B2B2B, underline on hover
```

- Border radius: `9999px` (pill shape) for primary actions
- Hover: darken brand-rose by 10%, subtle scale `1.02`
- Active: scale `0.98`
- Disabled: opacity `0.4`, cursor not-allowed

### Product Cards

- White background, `8px` border radius
- Soft shadow: `0 2px 12px rgba(0,0,0,0.07)`
- Hover: shadow deepens + image scales `1.03` (300ms ease)
- Badge overlay (top-left): "NEW", "SALE" in brand-rose pill
- Quick-add CTA slides up from bottom on hover

### Navigation

- Sticky top bar, background `#FDF8F4` with `1px` bottom border `#E8E0D8`
- Logo: "Shopshive" in Cormorant Garamond, 28px, charcoal
- Category links: DM Sans 13px, uppercase, letter-spacing `0.08em`
- Active underline: 2px brand-rose
- Mobile: hamburger → full-screen overlay, links stacked with generous padding

### Forms & Inputs

- Height: `48px`, border `1.5px solid #D4B8A0`
- Border radius: `8px`
- Focus: border color switches to `#E8567A`, no outline, soft glow
- Placeholder text: `#A89080`

---

## Iconography

- Style: **Outline icons**, 1.5px stroke weight
- Recommended library: Heroicons or Lucide
- Size: `20px` default · `24px` for navigation · `16px` for inline
- Color: inherits from parent text color

---

## Imagery & Photography

- **Tone:** Bright, airy, natural light — no heavy filters
- **Models:** Diverse, confident, lifestyle-forward poses
- **Backgrounds:** Clean white OR soft lifestyle settings (café, street, studio)
- **Product shots:** Pure white background, multiple angles
- **Aspect ratios:** Hero `16:9` · Product cards `3:4` · Campaign banners `2:1`
- Avoid: dark moody shots, heavy retouching, cluttered backgrounds

---

## Motion & Animation

- **Easing:** `cubic-bezier(0.25, 0, 0.1, 1)` — soft deceleration
- **Durations:** Micro `150ms` · Standard `300ms` · Page transitions `400ms`
- Hero text: staggered fade-in-up (each line +80ms delay)
- Product grid: fade-in on scroll, staggered by column
- Avoid: bouncy springs, long delays, motion that blocks interaction

---

## Tone & Voice (UI Copy)

- **Friendly, not salesy.** "You'll love this" over "BUY NOW!"
- **Inclusive.** "For every body, every occasion."
- Short sentences. Active voice. Warm punctuation (em dash, not exclamation overload).
- Error messages: kind and solution-focused — *"That size is sold out — try the next size up?"*

---

## Accessibility

- Minimum contrast ratio: **4.5:1** for all body text
- All interactive elements keyboard-navigable
- Focus rings: `2px solid #E8567A` with `2px offset`
- Images: descriptive `alt` text required
- Touch targets: minimum `44×44px`