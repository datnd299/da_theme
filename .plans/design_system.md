# DESIGN_SYSTEM.MD — RELUX WATCHES

This documents the design tokens and component conventions already implemented in the theme (`assets/css/tailwind-input.css`, `header.php`, `footer.php`, `template-parts/*.php`). Any new UI must reuse these tokens instead of introducing new colors, fonts, or radii.

---

## Colors

| Token | Value | Use |
|---|---|---|
| `--color-background` | `#FFFFFF` | Page background |
| `--color-surface` | `#FAFAFA` | Soft section background, cards on white |
| `--color-surface-alt` | `#FFFFFF` | Alt surface |
| `--color-foreground` | `#111111` | Primary text, headings |
| `--color-foreground-muted` | `#777777` | Body copy, secondary text |
| `--color-muted` | `#777777` | Captions |
| `--color-accent` | `#405447` | Primary CTA, links, eyebrow labels, active nav state |
| `--color-accent-hover` | `#2F3F35` | CTA hover state |
| `--color-border` | `#E9E9E9` | Card borders, dividers |
| `--color-alert` | `#E64A3B` | Errors |
| `--color-success` | `#43A047` | Success / in-stock indicators |

Header/footer use a scoped inline variable set (`--cf-ink`, `--cf-text`, `--cf-accent: #405447`, etc.) that mirrors these tokens — keep them in sync if the accent color ever changes.

Do not introduce black/gold luxury styling. Do not add more than the accent above — one primary accent, no secondary bright colors.

---

## Typography

* `--font-sans`: `'Inter', Arial, sans-serif` — body copy, UI
* `--font-heading`: `'Manrope', 'Inter', Arial, sans-serif` — headings where used

Static/marketing pages (home, about, shop) use system-stack `Inter, Geist, Arial, sans-serif` inline for self-contained page styles — keep consistent with this stack, do not add serif fonts.

Scale (mobile-first, matches `page-home.php` / `page-about.php`):

* H1: `clamp(40px, 4.5–5vw, 58px)`, weight 600, tight tracking (`-.035em` to `-.045em`)
* H2: `clamp(28–30px, 3vw, 38px)`, weight 600
* H3: `18–20px`, weight 600
* Body: `15–16px`, `line-height: 1.65–1.72`, color `var(--muted)` / `#777777`
* Eyebrow label: `11–12px`, uppercase, `letter-spacing: .14em`, weight 700, accent color

---

## Spacing & Layout

* Container: `max-width: 1280–1380px`, side padding `32–64px` (responsive)
* Section padding: `~112px` desktop / `~78px` mobile (marketing pages), `48–62px` for `.tgm-section`-style blocks
* Card padding: `20–24px`
* Grid gap: `16–28px`

---

## Radius & Shadows

* `--radius-sm: 4px`, `--radius-md: 8px`, `--radius-lg: 12px`, `--radius-pill: 999px`
* `--shadow-card: 0 1px 4px rgba(34,34,34,.07)`
* `--shadow-card-hover: 0 10px 30px rgba(64,84,71,.16)`

Policy pages (Tailwind-based: FAQ, Terms, Privacy, Return & Refund, Warranty) use `rounded-md` cards with `border-[#E9E9E9]` and `shadow-sm` — keep new policy-style pages consistent with this pattern.

---

## Motion

* `--ease-fluid: cubic-bezier(0.4, 0, 0.2, 1)`
* `--duration-fast: 150ms`, `--duration-normal: 250ms`, `--duration-slow: 400ms`
* Hover: subtle image scale (`transform: scale(1.025–1.05)`), card lift (`translateY(-3px to -4px)`) with border-color + shadow transition. No heavy transitions, no auto-playing carousels.

---

## Components

* **Header** (`header.php`): sticky, blurred background, logo + centered nav + search/account/cart icons. Nav: Home, Shop, Contact Us, About Us.
* **Footer** (`footer.php`): dark (`#111`) footer, 4-column grid (About, Shop, Company, Policy). Policy column carries: 2-Year Warranty, Shipping Policy, Return & Refund Policy, Privacy Policy, Terms & Conditions.
* **Product card**: image (contain, padded), category label, name, price — see `.tgm-product` / `.product-card` classes.
* **Collections**: 3 named collections only — The Voyager, The Odyssey, The Eternal. Never introduce a 4th generic category (e.g. "Accessories", "New Arrivals") — those concepts are folded into the 3 collections. Category data source of truth: `inc/product-categories.php`.
* **Trust signals**: 2-Year Warranty, Automatic Movement (no battery), Free US Shipping — surface these on home hero, product split sections, and footer tagline.
* **Policy pages**: hero (eyebrow + H1 + intro) + "Last Updated" card, then a stack of `rounded-md border` article cards (coverage/eligibility, steps, FAQs, contact info). Follow `template-parts/page-warranty.php` or `page-return-refund-policy.php` as the reference structure for any new policy page.

---

## Copywriting Rules

* Every watch is **automatic / self-winding mechanical** — never write "battery", "quartz", or generic "modern watches" copy.
* Reference collections by their full name: "The Voyager", "The Odyssey", "The Eternal" (not "Voyager collection" alone on first mention).
* Mention the 2-year warranty as a recurring trust signal (hero, product split section, footer, about, FAQ) — not just on the policy page itself.
