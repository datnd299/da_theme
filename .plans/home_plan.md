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

---

# Homepage Plan

> Goal: Nail the first impression within 3 seconds — visitors should instantly understand "this is a beautiful women's fashion store with great deals and easy shopping." Each section flows naturally into the next, telling a cohesive visual story.

---

## Section 1 — Top Bar (Announcement)

**Purpose:** Surface key perks and create a gentle sense of urgency.

- Background: `#E8567A` · Text: white · Font: DM Sans 13px
- Suggested copy: `✦ Free Shipping On All Orders  ·  30-Day Easy Returns  ·  New Arrivals Every Week ✦`
- Auto-scrolling marquee on mobile, centered on desktop
- Dismissible via `✕` button; state saved to localStorage

---

## Section 2 — Navigation Bar

**Purpose:** Clear wayfinding with instant brand recognition.

**Layout (desktop):**
```
[Logo: Shopshive]   Dresses · Blouses & Shirts · Tops · Pants · Shorts · Footwear   [🔍] [♡] [🛒 (2)]
```

**Layout (mobile):**
```
[☰]   [Logo: Shopshive]   [🛒]
```

- Sticky; drop shadow transitions in after scrolling past 60px
- Mega-menu dropdown per category: featured image thumbnail + subcategory links
- Search icon expands into a full-width input bar on click
- Cart icon displays an item-count badge in brand-rose

---

## Section 3 — Hero Banner

**Purpose:** The first wow moment — showcasing the month's primary campaign.

**Layout:** Full-width, height `90vh` desktop / `70vh` mobile

```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│   [Model lifestyle photo — airy, natural light]        │
│                                                         │
│   ┌────────────────────────┐                           │
│   │  New Season.           │  ← Cormorant Garamond     │
│   │  New You.              │     64px, light weight    │
│   │                        │                           │
│   │  Explore the Spring    │  ← DM Sans 16px           │
│   │  Collection — styles   │                           │
│   │  for every story.      │                           │
│   │                        │                           │
│   │  [Shop Now →]          │  ← Primary button         │
│   └────────────────────────┘                           │
│                                                         │
│  ○ ● ○  (dot indicators)                               │
└─────────────────────────────────────────────────────────┘
```

- **Slideshow** of 3 slides: auto-advances every 5s, pauses on hover
- Text enters with a staggered fade-in-up animation when each slide becomes active
- Subtle gradient overlay (bottom-left) keeps text legible over any image
- Mobile: text block moves below the image in a stacked vertical layout

---

## Section 4 — Category Quick-Nav

**Purpose:** Let users jump directly to their favourite category without needing the menu.

**Layout:** Horizontal scroll on mobile · 6 equal tiles on desktop

```
┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐
│      │ │      │ │      │ │      │ │      │ │      │
│ img  │ │ img  │ │ img  │ │ img  │ │ img  │ │ img  │
│      │ │      │ │      │ │      │ │      │ │      │
│Dress │ │Blouse│ │ Tops │ │Pants │ │Short │ │Shoes │
└──────┘ └──────┘ └──────┘ └──────┘ └──────┘ └──────┘
```

- Tile: square image `aspect-ratio: 1/1`, border-radius `12px`
- Hover: image scales to `1.05`, rose overlay at 20% opacity
- Label: DM Sans 14px, uppercase, charcoal, centered below the image
- Section background: `#F5E6DC` (brand nude), padding `48px 0`

---

## Section 5 — New Arrivals

**Purpose:** Showcase the latest products — the primary reason customers return.

**Header:**
```
New Arrivals          [View All →]
Fresh styles, just landed.
```

**Product Grid:** 4 columns desktop · 2 columns mobile · gap `24px`

Each **Product Card** contains:
```
┌────────────────────┐
│ [NEW]              │  ← badge top-left
│                    │
│   [Product Image]  │  3:4 ratio
│                    │
│  ────────────────  │  ← Quick Add (slides up on hover)
│  + Quick Add       │
└────────────────────┘
Product Name          ← Playfair Display 15px
$29.99                ← DM Sans 14px, brand-rose
★★★★☆ (42)           ← caption size, sand color
```

- Wishlist icon (♡) top-right, toggles on click
- "NEW" badge: brand-rose pill
- Displays **8 products** by default; centered "Load More" button below
- Animation: fade-in-up staggered per card as they scroll into the viewport

---

## Section 6 — Promotional Banner (Mid-page)

**Purpose:** Build urgency and spotlight a major deal or seasonal campaign.

**Layout:** Full-width, height `280px` desktop · `200px` mobile

```
┌─────────────────────────────────────────────────────────┐
│  Background: blush gradient (#F2A8BC → #F5E6DC)        │
│                                                         │
│         Up to 40% Off                                   │
│         Summer Essentials                               │
│                                                         │
│         [Shop the Sale →]                              │
└─────────────────────────────────────────────────────────┘
```

- Typography: Cormorant Garamond 52px + DM Sans body
- Optional: add a countdown timer for time-limited sales
- Can swap to an editorial split layout (text left, image right)

---

## Section 7 — Best Sellers

**Purpose:** Social proof — "here's what everyone is buying right now."

**Header:**
```
Best Sellers          [View All →]
Our most-loved pieces, right now.
```

- Same layout as New Arrivals, but badge changes to `🔥 Best Seller` (warning amber color)
- Shows **4 products** — compact, no load more
- Background: white `#FFFFFF` to visually separate from the previous section

---

## Section 8 — Trust & Benefits Bar

**Mục đích:** Giải tỏa lo ngại mua hàng (shipping, return, payment).

**Layout:** 4 cột ngang · background `#FDF8F4` · border top/bottom `1px solid #E8E0D8`

```
[🚚 Free Shipping]    [🔄 30-Day Returns]    [💳 Secure Payment]    [📞 Live Support]
On all orders         Easy & hassle-free      Multiple cards          Mon–Sat, 10–6 PST
```

- Icon: outline style, 32px, brand-rose
- Label: DM Sans 14px 600 (semibold)
- Sub-label: DM Sans 12px, sand color
- Mobile: 2×2 grid

---

## Section 9 — Email Sign-up

**Mục đích:** Xây dựng email list — đây là kênh retention quan trọng nhất.

**Layout:** Centered, padding `96px 0`, background `#2B2B2B` (charcoal)

```
        Join the Shopshive Circle
   Get early access to new arrivals, exclusive
   offers, and style inspiration — straight to
   your inbox.

   [  Enter your email address  ] [Subscribe →]

        🔒 No spam. Unsubscribe anytime.
```

- Heading: Cormorant Garamond 40px, ivory white
- Input + button: inline trên desktop · stacked trên mobile
- Micro-copy bên dưới: DM Sans 12px, opacity 60%
- Success state: input ẩn, thay bằng `"✓ You're in! Check your inbox."` fade-in

---

## Section 10 — Footer

**Layout:** 4-column grid · background `#1E1E1E` · text `#C8BEB6`

```
┌─────────────┬─────────────┬─────────────┬─────────────┐
│  Shopshive  │   Shop      │   Help      │   Connect   │
│             │             │             │             │
│ Open Doors  │ Dresses     │ Contact Us  │ Facebook    │
│ To A World  │ Blouses     │ Shipping    │ Pinterest   │
│ Of Fashion. │ Tops        │ Returns     │             │
│             │ Pants       │ Size Guide  │ 📞 (760)    │
│             │ Shorts      │ FAQ         │  383 0494   │
│             │ Footwear    │             │             │
└─────────────┴─────────────┴─────────────┴─────────────┘

        © 2024 Shopshive. All rights reserved.
        Privacy Policy  ·  Terms of Service
```

- Logo: Cormorant Garamond 24px, ivory
- Links: DM Sans 13px, hover color brand-rose
- Social icons: 20px outline, hover scale `1.15`
- Bottom bar: `1px solid #333`, caption size, centered

---

## Responsive Behavior Summary

| Section | Desktop | Mobile |
|---|---|---|
| Hero Banner | Full-width, text overlay left | Stacked: image top, text bottom |
| Category Nav | 6-tile row | Horizontal scroll |
| Product Grids | 4-up | 2-up |
| Trust Bar | 4-column | 2×2 grid |
| Email Signup | Inline input+button | Stacked |
| Footer | 4-column | 2-column then 1-column |

---

## Page Load & Performance Notes

- Hero image: WebP format, lazy-load slides 2 & 3
- Product images: lazy-load, `aspect-ratio` set để tránh layout shift
- Fonts: preload Cormorant Garamond + DM Sans woff2
- Above-the-fold: target **LCP < 2.5s** — hero image phải được preload
- Animations: chỉ chạy khi `prefers-reduced-motion: no-preference`