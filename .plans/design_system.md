# Design System — SlickTee ("retro print shop")

Tokens live in `assets/css/tailwind-input.css` (`@theme`) and `assets/css/main.css` (`:root`,
drives the pure-CSS WooCommerce pages). Both must stay in sync.

## 1. Color

| Token | Value | Use |
|---|---|---|
| `--color-background` | `#FBF7EF` | Cream "print paper" page background |
| `--color-surface` | `#F4EDE0` | Alternate sections, panels |
| `--color-surface-alt` | `#EBE1CF` | Hover fills, inputs |
| `--color-foreground` | `#17140F` | Ink — text, 2px borders, hard shadows, dark bands |
| `--color-foreground-muted` | `#4A4339` | Body copy |
| `--color-muted` | `#6F665A` | Captions, meta |
| `--color-accent` | `#D7351E` | Vermilion — primary CTA, prices (white text OK, 4.7:1) |
| `--color-accent-hover` | `#B32813` | CTA hover |
| `--color-accent-soft` | `#FBE3DC` | Tints, focus rings |
| `--color-accent-2` | `#1F3A68` | Prussian blue — secondary buttons/links in WC (white text OK) |
| `--color-highlight` | `#F2B33D` | Mustard — stickers, badges, ticker, hover fills. **Ink text only** |
| `--color-border` | `#E3D7C2` | Soft dividers |

## 2. Typography

- Display: `Anton` (`--font-display`, `.font-display`) — uppercase hero/section titles only.
- Headings: `Archivo` 600–900 (`--font-heading`) — card titles, WooCommerce headings.
- Body: `DM Sans` 400/500/700 (`--font-sans`).
- Loaded via one Google Fonts `<link>` in `header.php`.

## 3. Shape & Elevation

- Radius: sm 4px (stickers/badges), md 8px (buttons/inputs), lg 14px (cards), pill for chips.
- Borders: 2px ink on cards, buttons, inputs.
- Shadows: hard offset, no blur — `--shadow-ink: 4px 4px 0 ink`, `--shadow-card-hover: 6px 6px 0 ink`.
  Hover = translate(-3px,-3px) + hard shadow ("sticker lift"); primary buttons press in on hover.
- Texture: subtle 14px dot grid on hero / shop header only.

## 4. Imagery

- AI-generated (kie GPT Image 2.5, 1K) product-category flat-lays on cream paper and a print-studio
  photo, saved as WebP in `assets/images/home/` (hero 1200×900, cat-* 700×700, about-studio 1200×900).
- All artwork is original — no recognisable copyrighted characters (two early drafts that
  resembled Casper / Gundam were discarded).
- No fabricated customer photos, testimonials or rating counts.

## 5. Components (Tailwind, inline per page)

- **Primary button:** `rounded-[8px] border-2 border-[#17140F] bg-[#D7351E] text-white font-extrabold uppercase shadow-[4px_4px_0_#17140F] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0_#17140F]`
- **Secondary button:** same shape, cream bg, ink text, `hover:bg-[#17140F] hover:text-[#FBF7EF]`
- **Card:** `rounded-[14px] border-2 border-[#17140F] bg-white hover:-translate-x-[3px] hover:-translate-y-[3px] hover:shadow-[6px_6px_0_#17140F]`
- **Sticker eyebrow:** `-rotate-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] text-xs font-extrabold uppercase`
- **Section title:** `font-display text-4xl sm:text-5xl uppercase` + small vermilion eyebrow above.

## 6. Layout

- Mobile-first; product/category grids always ≥ 2 columns on mobile.
- Touch targets ≥ 44px. Header is not sticky.
- Section rhythm: cream → surface (with ink top/bottom borders) → ink band → vermilion CTA band.
