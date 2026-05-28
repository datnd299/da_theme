# My Vegan Blog — Home Plan

## Homepage Goal

Build a clean feminine boutique homepage for:

```txt
Women’s Leather Shoes
Women’s Sandals
Women’s Handbags
Fashion Accessories
```

Main homepage message:

```txt
Women’s Shoes & Accessories For Everyday Style
```

The homepage should feel:

```txt
feminine
modern
clean
polished
boutique-inspired
everyday wearable
trustworthy
GMC-safe
```

Important structure rule:

Follow the saved homepage HTML structure pattern. Do not add extra creative sections that change the structure unless requested.

---

# Homepage Structure

Use this structure:

```txt
1. Hero Section
2. Shop By Collection
3. New Arrivals
4. Feature Section
5. Everyday Style Picks
6. Customer Favorites
7. Trust Section
8. About Brand
9. Newsletter
10. Gallery
```

This matches the standard homepage structure used in the current Antigravity/theme workflow.

---

# Section 1 — Hero Section

## Purpose

Introduce My Vegan Blog as a women’s shoes, handbags, and accessories store for polished everyday style.

## Content

Eyebrow:

```txt
Women’s Shoes & Accessories
```

Headline:

```txt
Women’s Shoes & Accessories For Everyday Style
```

Subheadline:

```txt
Discover women’s leather shoes, sandals, handbags, and fashion accessories designed for polished daily outfits, relaxed weekends, and confident everyday looks.
```

Primary CTA:

```txt
Shop Women’s Shoes
```

Secondary CTA:

```txt
Explore Handbags
```

Small trust card:

```txt
Polished everyday essentials
Shoes, handbags, and accessories made easy to style.
```

## Image Direction

Use clean feminine boutique imagery:

* Women’s shoes, handbags, or sandals on soft ivory / neutral background
* A styled handbag with simple outfit details
* Soft editorial fashion lighting
* Clean product/lifestyle composition
* No fake designer logos
* No text inside image
* No food, supplement, or vegan pantry visuals

## Design Notes

* Background: Ivory Cream `#F8F3EC` to soft blush / Canvas Soft gradient
* Text: Deep Charcoal `#2F2A28`
* Primary CTA: Dusty Rose `#C98A8A`
* Secondary CTA: Clean White with Deep Charcoal or Soft Sage border
* Hero should use text left + image stack right, matching saved structure

---

# Section 2 — Shop By Collection

## Purpose

Show the 4 core categories clearly so customers immediately understand the store niche.

## Collections

```txt
Women’s Leather Shoes
Women’s Sandals
Women’s Handbags
Fashion Accessories
```

## Category Card Copy

### Women’s Leather Shoes

```txt
Polished women’s shoes for daily outfits, office-ready looks, and easy styling.
```

### Women’s Sandals

```txt
Relaxed sandals for warm days, weekends, travel, and everyday comfort.
```

### Women’s Handbags

```txt
Everyday handbags designed for daily essentials and polished outfit pairing.
```

### Fashion Accessories

```txt
Simple finishing pieces that add a clean touch to everyday outfits.
```

## Image Direction

* Women’s Leather Shoes: polished flats, loafers, or leather-look shoes
* Women’s Sandals: simple sandals on lifestyle/neutral background
* Women’s Handbags: handbag styled with outfit essentials
* Fashion Accessories: wallet, scarf, belt, small bag, or accessory flat lay

## Design Notes

* Use 4 image-heavy category cards
* Overlay gradient from dark to transparent
* Bottom-aligned title and short description
* Card radius: 16–24px
* Do not add extra categories

---

# Section 3 — New Arrivals

## Purpose

Display latest WooCommerce products dynamically.

## Content

Eyebrow:

```txt
New Arrivals
```

Headline:

```txt
Fresh picks for everyday outfits
```

CTA:

```txt
View All
```

## Product Query

Use WooCommerce product grid:

```php
wc_get_products(array(
  'status'  => 'publish',
  'limit'   => 4,
  'orderby' => 'date',
  'order'   => 'DESC',
));
```

## Product Card Requirements

Each card should show:

```txt
Product image
Product title
Price
View Product button
```

## Design Notes

* Background: Canvas Soft `#F4ECE5` or Ivory Cream `#F8F3EC`
* Product cards: Clean White, thin border, soft hover shadow
* Price color: Dusty Rose `#C98A8A`

---

# Section 4 — Feature Section

## Purpose

Highlight the main footwear direction and connect products to everyday styling.

## Content

Eyebrow:

```txt
Polished Daily Footwear
```

Headline:

```txt
Shoes that make everyday outfits feel complete.
```

Paragraph:

```txt
From polished women’s shoes to easy sandals, My Vegan Blog focuses on wearable styles that pair naturally with workdays, weekends, travel moments, and simple daily looks.
```

CTA:

```txt
Shop Women’s Shoes
```

## Image Direction

* Feature image of women’s shoes or sandals with handbag/outfit styling
* Soft neutral backdrop
* Clean editorial composition
* No text inside image
* No fake designer logos

## Design Notes

* Use the saved structure: image left + rounded content card right
* Content card: Clean White, thin border, soft shadow
* CTA: Dusty Rose

---

# Section 5 — Everyday Style Picks

## Purpose

Replace generic seasonal picks with practical outfit-use cards for this fashion accessories niche.

## Content

Eyebrow:

```txt
Everyday Style Picks
```

Headline:

```txt
Simple pieces for polished daily moments
```

Short intro:

```txt
Shop by everyday style needs without making the experience feel overwhelming.
```

## Cards

### Workday Polish

```txt
Shoes and handbags that help simple office outfits feel more put together.
```

### Weekend Sandals

```txt
Easy sandals and accessories for relaxed days, errands, and travel plans.
```

### Everyday Bag Essentials

```txt
Handbags and small accessories made for daily essentials and outfit finishing.
```

## Design Notes

* Use 3 simple cards
* Background: Ivory Cream or Canvas Soft
* Cards: Clean White, Dusty Rose accent
* No heavy discount language

---

# Section 6 — Customer Favorites

## Purpose

Display a second WooCommerce product grid for favorites / boutique picks.

## Content

Eyebrow:

```txt
Customer Favorites
```

Headline:

```txt
Loved for everyday style
```

## Product Query

Use WooCommerce product grid:

```php
wc_get_products(array(
  'status'  => 'publish',
  'limit'   => 4,
  'orderby' => 'date',
  'order'   => 'ASC',
));
```

Fallback:

```php
If empty, run the same query again or use latest products.
```

## Design Notes

* Same product card style as New Arrivals
* Keep grid consistent
* Do not use fake reviews or fake star ratings

---

# Section 7 — Trust Section

## Purpose

Build GMC trust for a women’s footwear, handbag, and accessories store.

## Trust Cards

### Secure Checkout

```txt
A clean and protected checkout experience for every order.
```

### Tracking Included

```txt
Tracking details are provided once your order ships.
```

### 30-Day Returns

```txt
Returns are available on eligible unused items within 30 days of delivery.
```

### Size & Material Notes

```txt
Review sizing, material, care, and return conditions before ordering.
```

## Design Notes

* Use 4-card trust section
* Background: Ivory Cream / Canvas Soft or Deep Charcoal if strong contrast is needed
* Icon circles: Dusty Rose or Canvas Soft
* Keep copy clear and compliance-friendly

---

# Section 8 — About Brand

## Purpose

Explain brand direction in a short, warm, boutique-style way.

## Content

Eyebrow:

```txt
Our Boutique Direction
```

Headline:

```txt
A clean shopping place for shoes, handbags, and everyday accessories.
```

Paragraph:

```txt
My Vegan Blog brings together women’s shoes, sandals, handbags, and fashion accessories for customers who want simple pieces that are easy to wear, easy to pair, and easy to love in daily outfits.
```

CTA:

```txt
Learn About Us
```

## Image Direction

* Women’s handbag and shoe lifestyle image
* Neutral styling with soft feminine colors
* Product-focused but warm

## Design Notes

* Follow saved structure: image left + content right inside rounded background block
* Background: Canvas Soft or Ivory Cream
* CTA: secondary button

---

# Section 9 — Newsletter

## Purpose

Capture email signups for new arrivals, styling notes, and accessory updates.

## Content

Headline:

```txt
Join the style list
```

Paragraph:

```txt
Get updates on new arrivals, everyday outfit ideas, handbags, sandals, and simple fashion accessories.
```

Form placeholder:

```txt
Enter your email
```

Button:

```txt
Sign Up
```

## Design Notes

* Background: Deep Charcoal `#2F2A28` or Muted Plum `#6F4E66`
* Text: Ivory Cream / White
* Button: Dusty Rose
* Keep form simple and theme-compatible

---

# Section 10 — Gallery

## Purpose

End with visual lifestyle/product mood, matching the saved structure.

## Content

Eyebrow:

```txt
Boutique Style Notes
```

Headline:

```txt
From our gallery
```

## Image Direction

Use 6 gallery images:

```txt
gallery1.jpg
gallery2.jpg
gallery3.jpg
gallery4.jpg
gallery5.jpg
gallery6.jpg
```

Images should show:

* women’s shoes
* sandals
* handbags
* fashion accessory flat lays
* outfit details
* clean boutique lifestyle moments

Avoid:

```txt
text inside images
fake designer logos
food or supplement visuals
medical foot visuals
supplier collages
```

## Design Notes

* 2-column mobile, 3-column desktop gallery
* Rounded image cards
* Soft hover scale
* Background: Canvas Soft

---

# Homepage Image Assets

Suggested image filenames:

```txt
myveganblog-hero.png
myveganblog-secondary.png
women-leather-shoes.png
women-sandals.png
women-handbags.png
fashion-accessories.png
women-shoes-feature.png
myveganblog-about.png
gallery/gallery1.jpg
gallery/gallery2.jpg
gallery/gallery3.jpg
gallery/gallery4.jpg
gallery/gallery5.jpg
gallery/gallery6.jpg
```

---

# Copy Rules

Use:

```txt
women’s leather shoes
women’s sandals
women’s handbags
fashion accessories
polished everyday style
leather-look finish
faux leather
vegan leather-style
simple outfit essentials
modern feminine accessories
easy daily styling
```

Use only when verified by product data:

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

Avoid:

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

---

# Final Homepage Feeling

The homepage should feel like:

```txt
A clean feminine boutique homepage for women’s leather shoes, sandals, handbags, and fashion accessories, built around polished everyday style and clear GMC-safe shopping information.
```

It should be warm, modern, soft, easy to shop, and follow the saved homepage structure without unnecessary extra sections.