# NorthTimeCo.com — Homepage Plan

## 1. Homepage Structure

### Top Bar

**FREE SHIPPING ON ALL ORDERS**

---

### Header

**Navigation**
- Watches
- Men's Watches
- Women's Watches
- Automatic Watches
- New Arrivals
- About Us

**Actions**
- Search
- Account
- Wishlist
- Cart

---

## 2. Hero Section

### Headline

**TIMEPIECES THAT DEFINE YOUR STYLE**

### Description

Discover carefully selected timepieces designed for everyday wear and timeless style.

### Primary CTA

**SHOP ALL WATCHES**

### Secondary CTA

**EXPLORE NEW ARRIVALS**

### Design

Use a large premium watch image as the main visual. Keep the copy short and let the product photography be the focal point.

---

## 3. Shop by Category

### Heading

**SHOP BY CATEGORY**

Four main categories:

### Men's Watches
Classic and contemporary timepieces for every occasion.

### Women's Watches
Elegant designs made to complement your style.

### Automatic Watches
Discover the craftsmanship of mechanical movements.

### New Arrivals
Explore our latest watches and newest collections.

Each category should use a large image with the category name and a clear **SHOP NOW** CTA.

---

## 4. Best Sellers

### Heading

**BEST SELLERS**

Discover the watches our customers love most.

Display 4 products on desktop and 2 products on mobile.

### Product Card

- Product image
- Brand
- Product name
- Price
- Rating
- Sale badge when applicable
- Wishlist
- Quick view

### CTA

**SHOP BEST SELLERS**

---

## 5. New Arrivals

### Heading

**NEW ARRIVALS**

Fresh styles and new timepieces, carefully selected for you.

Display 4–8 products.

### CTA

**VIEW ALL**

---

## 6. Why North Time Co.

### Heading

**SHOP WITH CONFIDENCE**

Use four feature blocks:

### Free Shipping
Free shipping on every order across the US.

### 30-Day Returns
Shop with confidence with our easy return policy.

### Secure Checkout
Safe and secure payment for every purchase.

### Quality Timepieces
Carefully selected watches built for style and everyday wear.

---

## 7. Featured Collection

### Heading

**TIMELESS BY DESIGN**

A carefully curated collection of watches made to complement every moment.

### CTA

**EXPLORE THE COLLECTION**

Use a large lifestyle/product image with minimal text.

---

## 8. Newsletter

### Heading

**STAY IN THE LOOP**

Get updates on new arrivals, exclusive offers, and the latest from North Time Co.

### Form

**Input:** Enter your email

**Button:** SUBSCRIBE

Keep this section simple and visually clean.

---

## 9. Footer

### SHOP
- All Watches
- Men's Watches
- Women's Watches
- Automatic Watches
- New Arrivals

### CUSTOMER SERVICE
- Contact Us
- Shipping
- Returns
- Warranty
- FAQ

### ABOUT
- About Us

### POLICIES
- Privacy Policy
- Terms & Conditions
- Return Policy

---

# Homepage Visual Hierarchy

```text
FREE SHIPPING ON ALL ORDERS

HEADER

HERO
Large product image
Strong headline
Primary CTA

SHOP BY CATEGORY
4 category cards

BEST SELLERS
Product grid

NEW ARRIVALS
Product grid

WHY NORTH TIME CO.
4 trust points

FEATURED COLLECTION
Large editorial image

NEWSLETTER

FOOTER
```

---

# WooCommerce Implementation

Recommended WooCommerce homepage sections:

- Featured Products
- Best Selling Products
- Newest Products
- Product Categories
- Sale Products where applicable

Use WooCommerce product/category data dynamically instead of hardcoding products.

The homepage should primarily drive users toward:
1. Product discovery
2. Category browsing
3. Product detail pages
4. Add to cart
5. Checkout

Keep the homepage relatively short and conversion-focused.

---

## Implementation notes (2026-09-03)

- The WooCommerce product catalog on this install is reused across several
  prior theme branches and does not have `Men's Watches` / `Women's Watches` /
  `Automatic Watches` product categories. Per project decision, the "Shop by
  Category" section and nav use the plan's exact labels/copy but link
  generically to the shop page (or the shop page sorted by date for "New
  Arrivals") rather than creating new taxonomy terms or reassigning products.
- Best Sellers and New Arrivals are pulled live from WooCommerce (`total_sales`
  and publish date respectively), per the "use WooCommerce data dynamically"
  rule above, scoped to the 8 existing watch-related `product_cat` terms
  (`dive-watches`, `field-watches`, `dress-watches`, `chronograph-watches`,
  `minimalist`, `sport-outdoor`, `vintage-leather`, `luxury-style`).
- IMPORTANT: as of 2026-09-03 all 39 published products in this install's
  catalog are leftover, unrelated inventory from prior theme branches reused
  on this WooCommerce install (veteran-themed apparel, generic clothing,
  power tools) — none are assigned to any watch category. Scoping the query
  to watch categories means Best Sellers / New Arrivals correctly render an
  empty "new watches coming soon" state rather than showing hats or shirts as
  watches. These sections will populate automatically once real watch
  products are added to those categories — no theme code changes needed.
- The bundled `assets/img/{minimal,sport,vintage,luxury}.webp` stock photos
  are reused for the hero / category / featured-collection imagery for the
  same reason (no usable real watch product photos exist yet).
  `assets/img/logo.png`/`.webp` are the real North Time Co. logo (navy watch
  + "NorthTimeCo" wordmark, trimmed and alpha-keyed to a transparent
  background, ~9 KB webp / ~39 KB png fallback). `logo-light.png`/`.webp` are
  the same artwork recoloured white for the dark footer. Both the header and
  the footer render the logo via a `<picture>` element at `h-14 sm:h-16`.
  The dark `logo.png` URL also feeds the Organization JSON-LD `logo` and the
  fallback `og:image` in `inc/seo.php`.
  `sport.webp` was also excluded from homepage use because it's a stock photo
  of a watch with a visible unrelated third-party brand name ("Gemius Army")
  printed on the dial.
