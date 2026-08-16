# Smartbasketco — Design System

## Overview

Smartbasketco is a clean women’s shoes, handbags, and fashion accessories store. The design should feel modern, feminine, warm, polished, and boutique-inspired while staying clear and GMC-safe.

This system adapts the uploaded design system form into a fashion-accessories direction for:

```txt
Women’s Leather Shoes
Women’s Sandals
Women’s Handbags
Fashion Accessories
```

The brand pairs a warm ivory canvas with soft sage, dusty rose, mushroom taupe, and deep charcoal. The result should feel like a calm feminine boutique, not a loud discount fashion marketplace.

Key characteristics:

* Warm ivory canvas, never cold pure white as the main feeling.
* Dusty rose as the primary CTA and accent color.
* Deep charcoal text instead of pure black.
* Soft sage and mushroom taupe as supporting boutique tones.
* Rounded 12px cards and buttons for a clean professional look.
* Editorial product imagery focused on shoes, sandals, handbags, and accessories.
* GMC-safe material language: only use leather / vegan / cruelty-free / sustainable claims when product data confirms them.

---

## Colors

### Brand & Accent

* **Dusty Rose** (`{colors.primary}` — `#C98A8A`): Primary CTA, accent buttons, category highlights, price color, hover accents.
* **Soft Sage** (`{colors.secondary}` — `#A8BCA1`): Secondary accents, trust icons, soft category details.
* **Muted Plum** (`{colors.accent}` — `#6F4E66`): Small premium accents, badges, editorial highlights.

### Surface

* **Ivory Cream** (`{colors.canvas}` — `#F8F3EC`): Main page background.
* **Canvas Soft** (`{colors.canvas-soft}` — `#F4ECE5`): Soft section background and inset content areas.
* **Clean White** (`{colors.white}` — `#FFFFFF`): Product cards, form fields, policy cards.
* **Mushroom Taupe** (`{colors.surface-muted}` — `#C7B8AA`): Neutral decorative surface, borders, subtle background accents.

### Text

* **Deep Charcoal** (`{colors.ink}` — `#2F2A28`): Headings, main text, navigation, strong labels.
* **Charcoal Soft** (`{colors.ink-soft}` — `#423A36`): Secondary headings and strong body text.
* **Body** (`{colors.body}` — `#6F625D`): Default paragraph text.
* **Body Mid** (`{colors.body-mid}` — `#948984`): Metadata, helper text, captions.
* **Mute** (`{colors.mute}` — `#D8CEC6`): Borders, low-emphasis dividers, fine UI lines.

### Semantic

Keep semantic colors minimal and quiet:

* Success can use Soft Sage.
* Warning / attention can use Dusty Rose.
* Error should be used only in forms, not as a brand accent.

---

## Typography

### Font Family

Use a two-face system:

1. **Display / Heading Font** — Playfair Display, Cormorant Garamond, or Libre Baskerville.
2. **Body / UI Font** — Inter, Manrope, or Plus Jakarta Sans.

Rules:

* Headings should feel feminine, editorial, and premium.
* Body text should be readable, clean, and modern.
* Product cards should use simple, direct text.
* Avoid playful, childish, streetwear, or overly luxury fonts.

### Hierarchy

| Token                            | Size |  Weight | Line Height | Use                     |
| -------------------------------- | ---: | ------: | ----------: | ----------------------- |
| `{typography.display-xl}`        | 56px | 500–600 |         1.0 | Hero headline           |
| `{typography.display-lg}`        | 48px | 500–600 |        1.05 | Feature headline        |
| `{typography.display-md}`        | 36px | 500–600 |         1.1 | Section headline        |
| `{typography.display-sm}`        | 28px |     600 |         1.2 | Card / category title   |
| `{typography.body-lg}`           | 18px |     400 |         1.7 | Lead paragraph          |
| `{typography.body-md}`           | 16px |     400 |        1.65 | Default body            |
| `{typography.body-sm}`           | 14px |     400 |        1.55 | Captions / helper text  |
| `{typography.eyebrow-uppercase}` | 12px |     700 |         1.2 | Uppercase section label |
| `{typography.button-md}`         | 14px |     700 |         1.2 | Button label            |

### Principles

* Use sentence-case headlines.
* Use uppercase only for small eyebrows and labels.
* Keep product names readable and not keyword-stuffed.
* Do not overuse script fonts or decorative type.

---

## Layout

### Spacing System

Use a 4px-based spacing rhythm:

```txt
4px, 8px, 12px, 16px, 24px, 32px, 48px, 64px, 80px
```

Recommended:

* Section padding: 56–80px top/bottom.
* Card padding: 20–32px.
* Product grid gap: 16–24px.
* Hero gap: 40–56px.

### Grid & Container

* Main container: `w-[min(100%-32px,1180px)]`.
* Hero: 2-column split on desktop, stacked on mobile.
* Category cards: 4-up desktop, 2-up tablet, 1-up mobile.
* Product grids: 4-up desktop, 2-up mobile.
* Trust cards: 4-up desktop, 2-up tablet, 1-up mobile.

### Homepage Structure

Follow the saved homepage structure pattern:

```txt
1. Hero Section
2. Shop By Collection
3. New Arrivals
4. Feature Section
5. Seasonal / Everyday Style Picks
6. Customer Favorites
7. Trust Section
8. About Brand
9. Newsletter
10. Gallery
```

Do not add extra homepage sections unless requested.

---

## Elevation & Depth

| Level                     | Treatment                                       | Use                                |
| ------------------------- | ----------------------------------------------- | ---------------------------------- |
| Level 0 — Flat            | No shadow, clean background                     | Hero and simple bands              |
| Level 1 — Hairline        | 1px border using `#D8CEC6`                      | Product cards, forms, policy cards |
| Level 2 — Soft Card       | Subtle shadow `0 12px 30px rgba(47,42,40,0.08)` | Feature cards, category cards      |
| Level 3 — Editorial Frame | White border + soft shadow                      | Hero images, about images          |

Keep shadows soft and boutique-like, not tech-heavy.

---

## Shapes

### Border Radius Scale

| Token            |  Value | Use                                |
| ---------------- | -----: | ---------------------------------- |
| `{rounded.none}` |    0px | Full-width sections                |
| `{rounded.sm}`   |    8px | Inputs, small badges               |
| `{rounded.md}`   |   12px | Buttons, product cards             |
| `{rounded.lg}`   |   16px | Category cards, small image frames |
| `{rounded.xl}`   |   24px | Feature panels                     |
| `{rounded.2xl}`  |   28px | Hero images, major content blocks  |
| `{rounded.pill}` | 9999px | CTA buttons, tags                  |

For this website, buttons can use pill shape, matching the feminine boutique direction.

---

## Components

### Buttons

**`button-primary`**

* Background: `{colors.primary}` `#C98A8A`
* Text: `#FFFFFF`
* Border: `#C98A8A`
* Hover: background `{colors.ink}` `#2F2A28`
* Shape: pill or 12px rounded
* Use for main CTAs such as Shop Women’s Shoes, Explore Handbags, View Product.

**`button-secondary`**

* Background: `#FFFFFF`
* Text: `{colors.ink}` `#2F2A28`
* Border: `{colors.mute}` `#D8CEC6`
* Hover: `{colors.canvas}` `#F8F3EC`
* Use for About, Size Guide, Contact, secondary navigation CTAs.

**`button-outline-sage`**

* Background: transparent or white
* Text: `{colors.secondary}` deepened if needed
* Border: `{colors.secondary}`
* Hover: `{colors.canvas-soft}`
* Use for category and policy links.

### Cards & Containers

**`product-card`**

* Background: Clean White
* Border: `1px solid #D8CEC6`
* Radius: 16px
* Shadow: subtle on hover
* Image: square product image
* Content: title, price, View Product CTA

**`category-card`**

* Image-heavy card with gradient overlay
* Rounded 16–24px
* Bottom-aligned category title and short line
* Use for the four categories:

  * Women’s Leather Shoes
  * Women’s Sandals
  * Women’s Handbags
  * Fashion Accessories

**`feature-card`**

* Background: Clean White
* Border: `#D8CEC6`
* Radius: 28px
* Padding: 32–40px
* Use for feature story sections.

**`trust-card`**

* Background: Clean White or Canvas Soft
* Icon circle: Canvas Soft + Dusty Rose
* Title: serif heading
* Body: muted text

### Inputs & Forms

**`text-input`**

* Background: White
* Text: Deep Charcoal
* Border: `#D8CEC6`
* Focus border: Dusty Rose
* Radius: 12px
* Padding: 12–16px

**`newsletter-form`**

* Dark or dusty rose section background
* White input or translucent input on dark
* Primary CTA button in Dusty Rose

### Navigation

**`nav-bar`**

* Background: Ivory Cream or Clean White
* Text: Deep Charcoal
* Active/hover: Dusty Rose

**`footer`**

* Background: Deep Charcoal
* Text: Ivory Cream
* Links hover: Dusty Rose

---

## Signature Sections

### `hero-band`

* Background: gradient from Ivory Cream to Canvas Soft / soft blush.
* Text: Deep Charcoal.
* CTA: Dusty Rose.
* Layout: text left, image stack right.
* Image style: rounded 28px, white border, soft shadow.

Hero headline:

```txt
Women’s Shoes & Accessories For Everyday Style
```

Hero subheadline:

```txt
Discover women’s leather shoes, sandals, handbags, and fashion accessories designed for polished daily outfits, relaxed weekends, and confident everyday looks.
```

### `shop-by-collection`

Use 4 image cards:

```txt
Women’s Leather Shoes
Women’s Sandals
Women’s Handbags
Fashion Accessories
```

### `product-grid`

Use WooCommerce `wc_get_products` for:

```txt
New Arrivals
Customer Favorites
```

### `feature-section`

Recommended feature:

```txt
Polished Shoes For Daily Looks
```

### `style-picks`

Use 3 cards for everyday use cases:

```txt
Workday Polish
Weekend Sandals
Everyday Bag Essentials
```

### `trust-section`

Use 4 trust cards:

```txt
Secure Checkout
Tracking Included
30-Day Returns
Size & Material Notes
```

### `about-brand`

Short brand story focused on women’s shoes, handbags, and accessories.

### `newsletter`

Soft boutique email capture for new arrivals, styling notes, and accessory updates.

### `gallery`

Use clean lifestyle / product imagery without text inside images.

---

## Image Direction

Use:

* Women’s shoes on soft ivory or neutral backgrounds
* Sandals in warm lifestyle scenes
* Handbags styled with simple outfits
* Accessories flat lays
* Clean product photography
* Soft editorial fashion styling
* Everyday outfit moments

Avoid:

```txt
fake designer logos
luxury replica visuals
supplier collage images
medical foot visuals
food or supplement visuals
text inside images
overly flashy discount graphics
```

---

## Product Card Rules

Product cards should include:

```txt
Product image
Product title
Price
View Product CTA
```

Optional metadata:

```txt
Material / finish note
Color option note
Size availability note
```

Avoid:

```txt
fake sale urgency
fake reviews
countdown timers
designer-inspired wording
keyword-stuffed names
```

---

## Trust Elements

Always include:

```txt
Secure Checkout
Tracking Included
30-Day Returns
Size Guide
Material Details
Care Instructions
Bag Dimensions
Customer Support
```

For footwear:

```txt
Fit notes
Size guide
Return condition
```

For handbags/accessories:

```txt
Dimensions
Strap/handle details
Material/finish
Care instructions
```

---

## GMC-Safe Rules

Do not use unless verified:

```txt
genuine leather
real leather
vegan leather
certified vegan
cruelty-free
sustainable
eco-friendly
organic
recycled materials
designer brand
luxury brand
```

Avoid completely:

```txt
replica
dupe
designer-inspired
1:1 copy
fake luxury
official brand if not authorized
medical comfort claims
guaranteed pain relief
fake reviews
countdown timers
```

Safe wording:

```txt
women’s leather shoes
women’s sandals
women’s handbags
fashion accessories
leather-look finish
faux leather
vegan leather-style
polished everyday style
modern feminine accessories
easy daily styling
```

---

## Do’s and Don’ts

### Do

* Use Dusty Rose as the main conversion color.
* Keep the page warm, feminine, and boutique-like.
* Use soft ivory and cream backgrounds instead of cold white.
* Keep category paths clear and simple.
* Use real material claims only when product data confirms them.
* Use clean product images and lifestyle accessory styling.
* Follow the saved homepage structure exactly unless requested otherwise.

### Don’t

* Don’t make the site look like a vegan food blog.
* Don’t use fake luxury or designer-replica styling.
* Don’t add unrelated categories.
* Don’t overclaim leather, vegan, cruelty-free, eco, or sustainability terms.
* Don’t use loud marketplace colors or heavy red discount graphics.
* Don’t add extra homepage sections that change the saved structure.

---

## Final Feeling

Smartbasketco should look like:

> A clean feminine boutique offering women’s leather shoes, sandals, handbags, and fashion accessories for polished everyday style.

The website should feel warm, modern, easy to shop, fashion-focused, trustworthy, and GMC-safe.