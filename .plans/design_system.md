# Shopmivo — Design System

## Overview

Shopmivo is an independent general merchandise store organized by broad shopping categories:

```txt
Tools
Houseware
Vehicle Service
Gift and Toy
Pet Supplies
Clothing and Accessories
```

The design should feel:

```txt
bold
clean
practical
one-stop-shop
easy to shop
value-focused
GMC-safe
```

The visual style should appeal to U.S. households doing everyday shopping across many categories — the general-store equivalent of a Walmart-style shopping experience, but as an independent retailer.

Important rule:

```txt
Use red, black, and white as the main visual direction — the existing site color system carries over unchanged from the previous build. Do not imitate Walmart's official branding or claim affiliation.
```

The website should feel like an independent general merchandise store, not an official Walmart website.

---

## Brand Personality

Core style:

```txt
Bold Everyday General Store
```

Brand feeling:

* Broad but organized
* Utility-focused
* Family-friendly
* Practical everyday value
* Strong visual contrast
* Clear category navigation
* Trustworthy ecommerce

Avoid:

```txt
official Walmart look
cheap dropshipping marketplace
cluttered catch-all catalog feel
messy warehouse dump
```

---

## Color Palette

### Racing Red

```txt
#D71920
```

Use for primary CTA buttons, active states, category highlights, sale-safe accents, and small visual energy.

### Deep Black

```txt
#161A1E
```

Use for header, footer, hero overlays, dark sections, and bold contrast.

### Off-Road Charcoal

```txt
#2B3742
```

Use for dark card backgrounds, section depth, product highlight panels, and strong secondary surfaces.

### Clean White

```txt
#FFFFFF
```

Use for product cards, forms, clean page sections, and readable content.

### Garage Silver

```txt
#E5E7EB
```

Use for borders, light section backgrounds, product grids, and neutral dividers.

### Steel Gray

```txt
#6B7280
```

Use for body text, product metadata, helper text, and policy notes.

### Asphalt Gray

```txt
#111827
```

Use for headings, strong text, navigation, and deep neutral contrast.

### Signal Red Dark

```txt
#A70F14
```

Use for hover states, dark red accents, and stronger CTA interaction.

---

## Color Usage Rules

Main usage:

```txt
Hero / Header: Deep Black + Racing Red accent
Main background: Clean White or Garage Silver
Cards: Clean White
Primary CTA: Racing Red
CTA hover: Signal Red Dark or Deep Black
Text: Asphalt Gray
Body text: Steel Gray
Footer: Deep Black
```

Use red strategically:

* Primary buttons
* Active nav states
* Category card accents
* Small labels
* Important CTA strips
* Product hover lines

Avoid using red everywhere. The site should feel bold, not visually noisy.

Do not use:

```txt
official Walmart logo/brand lockups
Walmart spark/badge shapes
Walmart official type treatment
Walmart official slogans
```

---

## Typography

Recommended fonts:

```txt
Oswald
Barlow Condensed
Rajdhani
Inter
Manrope
Plus Jakarta Sans
```

Best pairing:

```txt
Headings: Oswald or Barlow Condensed
Body/UI: Inter or Manrope
```

Typography style:

* Headings: strong, condensed, bold
* Body: clean and readable
* Buttons: bold uppercase
* Category labels: short and direct
* Product names: clear, not keyword-stuffed

Avoid:

```txt
luxury serif fonts
playful fonts
thin fashion fonts
script fonts
overly futuristic fonts
```

---

## Type Scale

### Hero Heading

```txt
Font: Oswald / Barlow Condensed
Size: 56–72px desktop
Weight: 700
Line height: 0.95–1.05
Letter spacing: -0.02em
```

### Section Heading

```txt
Size: 36–48px
Weight: 700
Line height: 1.05
```

### Card Title

```txt
Size: 22–28px
Weight: 700
Line height: 1.15
```

### Body Text

```txt
Size: 16–18px
Weight: 400
Line height: 1.65
```

### Eyebrow / Label

```txt
Size: 12px
Weight: 800
Letter spacing: 0.14em
Text transform: uppercase
Color: Racing Red
```

### Button Text

```txt
Size: 14px
Weight: 800
Letter spacing: 0.06em
Text transform: uppercase
```

---

## Layout Style

Use a clean general-merchandise ecommerce layout.

Follow the saved homepage structure:

```txt
1. Hero Section
2. Shop By Category
3. New Arrivals
4. Shop By Need
5. Customer Favorites
6. Customer Feedback
7. Customer Reviews
8. Trust Section
9. About Brand
10. Newsletter
```

Do not add extra homepage sections unless requested.

---

## Container & Grid

Main container:

```txt
width: min(100% - 32px, 1180px)
margin: 0 auto
```

Grid rules:

```txt
Hero: 2 columns desktop, stacked mobile
Category cards: 3 columns desktop, 2 tablet, 1 mobile (horizontal scroll)
Product grid: 4 columns desktop, 2 mobile
Trust cards: 4 columns desktop, 2 tablet, 1 mobile
```

Spacing:

```txt
Section padding: 64–88px
Card gap: 18–24px
Card padding: 20–32px
Hero gap: 40–56px
```

---

## Shapes

Border radius:

```txt
Small: 8px
Cards: 14–18px
Hero image/card: 22–28px
Buttons: 10–12px
Pills/badges: 999px
```

For this site, buttons should **not** be too soft or feminine. Use strong rounded rectangles rather than very soft boutique pills.

Recommended button radius:

```txt
12px
```

---

## Buttons

### Primary Button

Use for main conversion CTAs.

```txt
Background: #D71920
Text: #FFFFFF
Border: #D71920
Hover background: #A70F14
Radius: 12px
Text: uppercase, bold
```

Example CTAs:

```txt
Shop All Categories
Shop Tools
Explore Houseware
```

### Secondary Button

Use for supporting CTAs.

```txt
Background: #161A1E
Text: #FFFFFF
Border: #161A1E
Hover background: #2B3742
Radius: 12px
```

### Outline Button

Use on white/light sections.

```txt
Background: transparent
Text: #111827
Border: #111827
Hover background: #111827
Hover text: #FFFFFF
Radius: 12px
```

### Dark Section Outline Button

Use on black hero/footer sections.

```txt
Background: transparent
Text: #FFFFFF
Border: rgba(255,255,255,0.45)
Hover background: #FFFFFF
Hover text: #161A1E
```

---

## Cards

### Category Card

Use for:

```txt
Tools
Houseware
Vehicle Service
Gift and Toy
Pet Supplies
Clothing and Accessories
```

Style:

```txt
Dark card background (Deep Black / Off-Road Charcoal)
Large centered category icon
Bottom-aligned title
Short description
Red accent line or CTA
Radius: 18–22px
```

Since category photography isn't always available across a wide catalog, category cards use a flat dark background with a bold line-icon instead of a photo — this keeps the card style consistent with the rest of the site.

### Product Card

Style:

```txt
Background: #FFFFFF
Border: 1px solid #E5E7EB
Radius: 14–18px
Subtle shadow on hover
Large product image
Clear title
Price in Racing Red
CTA button or link
```

Product card must include:

```txt
Product image
Product title
Price
View Product CTA
```

Optional metadata:

```txt
Category
Subcategory
```

### Feature Card

Use for major highlight sections.

Style:

```txt
Background: #FFFFFF
Border: 1px solid #E5E7EB
Radius: 22–28px
Padding: 32–40px
Shadow: subtle
```

### Dark Feature Card

Use for bold section impact.

```txt
Background: #161A1E or #2B3742
Text: #FFFFFF
Accent: #D71920
Border: rgba(255,255,255,0.10)
```

---

## Homepage Section Rules

### Hero Section

Hero message:

```txt
Everything You Need, All In One Place
```

Subheadline:

```txt
Shop Tools, Houseware, Vehicle Service, Gift and Toy, Pet Supplies, and Clothing and Accessories — all at everyday low prices.
```

Hero visual:

* Dark overlay with red accent shapes (no single-subject photo needed)
* Red CTA
* Secondary dark/outline CTA
* Small trust panel or category count highlight

Hero should feel bold and practical.

Do not use official Walmart logos or retailer-branded graphics.

---

### Shop By Category

Use 6 cards:

```txt
Tools
Houseware
Vehicle Service
Gift and Toy
Pet Supplies
Clothing and Accessories
```

Each card can preview its 3 subcategories.

Design:

* Icon cards on dark backgrounds
* Red CTA accent
* Short copy

---

### New Arrivals

WooCommerce grid:

```php
wc_get_products(array(
  'status'  => 'publish',
  'limit'   => 4,
  'orderby' => 'date',
  'order'   => 'DESC',
));
```

Product cards should be clean, white, and easy to scan.

---

### Shop By Need

Use 3 cards grouping categories by everyday need, e.g.:

```txt
Home & Garage Essentials
Gifts & Toys For Everyone
Pet Care Favorites
```

Design:

* Icon card left/content right or icon-on-dark card
* Red CTA
* Clean white/garage silver background

Copy should focus on practical use and everyday value, not performance claims.

---

### Customer Favorites

Second WooCommerce grid.

Use 4 products.

Avoid fake reviews or fake star ratings.

---

### Trust Section

Use 4 trust cards:

```txt
Secure Checkout
Tracking Included
30-Day Returns
Everyday Low Prices
```

Trust copy should mention:

```txt
check product details
review return policy
keep packaging
contact support
```

---

### About Brand

Position Shopmivo clearly as independent:

```txt
Shopmivo is an independent general merchandise store built for households who want tools, houseware, vehicle service essentials, gifts and toys, pet supplies, and clothing — all in one place.
```

Include short disclaimer:

```txt
Shopmivo is not affiliated with, endorsed by, or sponsored by Walmart Inc. or any other retailer.
```

---

### Newsletter

Purpose:

```txt
new arrivals
seasonal picks
deals across every category
```

Design:

* Deep Black background
* Red CTA
* White text

---

## Image Direction

Use:

* Clean product shots on neutral backgrounds
* Icon-based category tiles where photography isn't available
* Simple lifestyle scenes (home, garage, family, pets) when real photography exists
* Clean product mockups

Avoid:

```txt
Walmart official logos
dealership/retailer-branded photos
cheap supplier collage images
text inside images
```

Preferred image mood:

```txt
bold
clean
practical everyday life
organized
modern retail
```

---

## Product Page Requirements

Every product page should include:

```txt
Product type
Category / subcategory
Material or contents
Dimensions or size if relevant
Included items
Use/care instructions if applicable
Shipping note
Return condition
Clear product images
```

---

## Trust & Compliance Elements

Always include:

```txt
Secure Checkout
Tracking Included
30-Day Returns
Customer Support
Shipping Policy
Return & Refund Policy
Independent Store Disclaimer
```

Important disclaimer:

```txt
Shopmivo is an independent general merchandise store and is not affiliated with, endorsed by, or sponsored by Walmart Inc. or any other retailer. Product names and categories are used only to help customers navigate the catalog.
```

---

## GMC-Safe Rules

Do not use:

```txt
Official Walmart
Walmart authorized
Walmart certified
Walmart partner
Walmart logo
Walmart spark badge
replica
dupe
guaranteed lowest price anywhere
fake urgency claims
```

Use safe wording:

```txt
independent general merchandise store
everyday essentials
value pricing
one-stop shopping
practical everyday use
check product details before ordering
```

---

## Do's and Don'ts

### Do

* Use red, black, and white as the main brand palette.
* Keep the design bold, clean, and practical.
* Organize navigation by the 6 main categories.
* Add clear independent-store disclaimer.
* Keep product cards clean and easy to scan.
* Use strong red CTAs for conversion.
* Follow the saved homepage structure.

### Don't

* Don't imitate Walmart's official website.
* Don't use Walmart logos, badges, or official assets.
* Don't claim official, authorized, or partner status with any retailer.
* Don't overload the design with too many red blocks.
* Don't add extra homepage sections unless requested.

---

## Final Feeling

Shopmivo should look like:

> A bold, independent general merchandise store organized by Tools, Houseware, Vehicle Service, Gift and Toy, Pet Supplies, and Clothing and Accessories.

The website should feel practical, clean, trustworthy, easy to shop, and built for everyday U.S. households while remaining GMC-safe.
