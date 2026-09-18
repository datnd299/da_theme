# Design System — Eliteshop Express

Expanded from the CRO/design brief. Tokens live in `assets/css/tailwind-input.css` (`@theme`,
drives Tailwind utilities in `tw-*.css`) and `assets/css/main.css` (`:root`, drives pure-CSS
WooCommerce chrome). Both must stay in sync — see "Rules when editing tailwind-input.css" in
the `woocommerce-theme-development` skill.

## 1. Color

| Token | Value | Use |
|---|---|---|
| `--color-background` | `#FFFFFF` | Page background |
| `--color-surface` | `#F9FAFB` | Alternating section background |
| `--color-surface-alt` | `#F3F4F6` | Cards, inputs, hover fills |
| `--color-foreground` | `#111827` | Headings, primary text |
| `--color-foreground-muted` | `#4B5563` | Body copy, descriptions |
| `--color-muted` | `#6B7280` | Captions, meta, placeholders |
| `--color-accent` | `#FF5A5F` | Primary CTA (vibrant orange) — "Start Customizing", "Add to Cart" |
| `--color-accent-hover` | `#E14247` | Primary CTA hover/active |
| `--color-accent-soft` | `#FFF1F0` | CTA tint backgrounds, badges |
| `--color-accent-2` | `#0056D2` | Electric blue — secondary CTA, links, icons/step numbers |
| `--color-accent-2-hover` | `#003F9E` | Secondary accent hover |
| `--color-border` | `#E5E7EB` | Dividers, card borders, inputs |
| `--color-alert` | `#DC2626` | Error states (form validation) |
| `--color-success` | `#16A34A` | Trust badges, in-stock, confirmations |

Rationale: white/light-gray backgrounds keep colorful apparel mockups the visual focus; orange
is the loudest color on the page reserved for one job (drive the click); blue is a secondary
accent so the orange CTA never has to compete with another equally loud color.

## 2. Typography

- Headings: `'Poppins', 'Montserrat', system-ui, sans-serif` (`--font-heading`) — bold weights
  (600–800), used for H1–H3, hero headline, section titles.
- Body: `'Inter', system-ui, sans-serif` (`--font-sans`) — 400/500/600, body copy, nav, buttons.
- Load via Google Fonts `<link>` in `header.php` (same pattern as before): Poppins
  600/700/800 + Inter 400/500/600/700.
- Scale (Tailwind classes, mobile-first): H1 `text-4xl md:text-6xl font-extrabold`, H2
  `text-3xl md:text-4xl font-bold`, H3 `text-xl md:text-2xl font-bold`, body `text-base
  leading-relaxed`, caption `text-sm text-[color:var(--color-muted)]`.

## 3. Shape & Elevation

- Radius: `--radius-sm: 8px` (chips/badges), `--radius-md: 12px` (buttons/inputs),
  `--radius-lg: 20px` (cards/panels), `--radius-pill: 999px` (pill buttons, tags).
- Shadow: `--shadow-card: 0 1px 3px rgba(17,24,39,.06)`, `--shadow-card-hover: 0 12px 28px
  rgba(17,24,39,.12)` — soft, never harsh; used on product/category cards on hover only.
- Flat design: no gradients on content surfaces, no skeuomorphism. The only gradient allowed is
  a subtle two-stop brand wash (orange → transparent) behind the hero, used sparingly.

## 4. Imagery Policy (no photo assets available this pass)

No real lifestyle/product photography exists for this brand in the repo, and none is fabricated
here (no fake "real customer" photos, no stock images pretending to be verified UGC). Visuals
are built with inline SVG + CSS instead:

- Hero / product mockups: flat SVG apparel silhouettes (T-shirt, hoodie) with a placeholder
  print area, rendered in brand colors.
- Trust badges, step icons: inline SVG line icons (stroke, 2px, rounded caps) — consistent with
  existing header/footer icon style already used in this theme.
- Testimonials: initials avatar (colored circle + 2-letter initials) instead of a photo — avoids
  presenting a fabricated person's photo as a real customer.
- When real photography is available, swap the SVG placeholders in `page-home.php` for `<img>`
  using the `dawp_i0_img_attrs()` responsive-image helper (see `inc/responsive-images.php`),
  same pattern as `header.php`/`footer.php` logo usage in earlier branches.

## 5. Core Components (Tailwind utility patterns, defined inline per page — no new component
CSS files needed for the homepage)

- **Primary button:** `inline-flex items-center justify-center rounded-[var(--radius-pill)]
  bg-[#FF5A5F] px-7 py-3.5 text-sm font-bold text-white shadow-[var(--shadow-card)] transition
  hover:bg-[#E14247] hover:-translate-y-0.5`
- **Secondary button:** same shape, `border-2 border-[#111827] bg-transparent text-[#111827]
  hover:bg-[#111827] hover:text-white`
- **Section container:** `mx-auto max-w-7xl px-4 sm:px-6 lg:px-8`
- **Card:** `rounded-[20px] border border-[#E5E7EB] bg-white shadow-[var(--shadow-card)]
  transition hover:shadow-[var(--shadow-card-hover)]`
- **Eyebrow label:** `text-xs font-extrabold uppercase tracking-[0.16em] text-[#FF5A5F]`

## 6. Layout Conventions

- Mobile-first; product/category grids are always **2 columns minimum on mobile** (never 1),
  per the skill checklist.
- Touch targets ≥ 44px (buttons, nav links, icon buttons).
- Sticky header, no layout-shifting animations blocking first paint; only `transform`/`opacity`
  used for hover/scroll motion.
- Section rhythm: alternate `bg-white` / `bg-[#F9FAFB]` between sections for visual separation
  without borders.

## 7. Homepage Section Map (content brief → implementation)

1. Announcement bar (marquee) + main header — `header.php`
2. Hero — SVG apparel mockup, headline, dual CTA
3. Trust badge strip
4. How It Works — 3 steps
5. Shop by Category — Men/Women/Kids grid (→ `/shop/`, see `.plans/site.md` §3)
6. Customization engine live demo — text input swaps preview text/label on an SVG mockup (JS)
7. Trending Personalized Designs — card grid with hover image swap affordance + tags
8. Social proof — initials-avatar testimonial carousel
9. Footer — `footer.php`
