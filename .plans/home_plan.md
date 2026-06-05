# ToyocarTV — Home Plan

## Homepage Goal

Build a bold, practical, American-style auto accessories homepage for:

```txt
Tacoma Accessories
4Runner Accessories
FJ Cruiser Accessories
Tundra Accessories
```

The homepage should show many products, make shopping by vehicle collection easy, and build trust with clear policy/support messaging.

Main message:

```txt
Car Accessories For Cleaner, Easier Everyday Drives
```

The homepage should feel:

```txt
bold
rugged
American
truck/SUV-focused
easy to shop
product-heavy
trustworthy
GMC-safe
```

Important disclaimer:

```txt
ToyocarTV is an independent auto accessories store and is not affiliated with, endorsed by, or sponsored by Toyota Motor Corporation or any vehicle manufacturer. Vehicle model names are used only to help customers identify compatible-style product collections.
```

---

# Homepage Structure

Use 7 sections maximum:

```txt
1. Hero + Featured Product Strip
2. Shop By Vehicle Collection
3. New Arrivals Product Grid
4. Shop Interior / Exterior / Merch
5. Best-Selling Accessories Product Grid
6. Customer Feedback Slider
7. Trust + About + Newsletter CTA
```

This structure is shorter than the previous default homepage, but still shows many products and builds trust.

---

# Section 1 — Hero + Featured Product Strip

## Purpose

Introduce ToyocarTV as an independent auto accessories store organized by vehicle model collections.

## Content

Eyebrow:

```txt
Independent Auto Accessories Store
```

Headline:

```txt
Car Accessories For Cleaner, Easier Everyday Drives
```

Subheadline:

```txt
Shop Tacoma, 4Runner, FJ Cruiser, and Tundra-style accessory collections designed for practical interior organization, exterior add-ons, and driver lifestyle upgrades.
```

Primary CTA:

```txt
Shop Vehicle Collections
```

Secondary CTA:

```txt
Explore Interior Accessories
```

Small trust line:

```txt
Secure checkout. Tracking included. 30-day returns on eligible unused items.
```

## Featured Product Strip

Add a small horizontal strip under the hero with 3–4 quick links:

```txt
Interior Organizers
Exterior Add-Ons
Driver Merch
New Arrivals
```

## Image Direction

Use:

```txt
truck/SUV outdoor lifestyle
garage-style product scene
interior organizer detail
red/black/white automotive mood
```

Avoid:

```txt
Toyota logos
official dealership visuals
OEM claims
text inside images
```

## Design Notes

* Background: Deep Black `#080808` or Asphalt Gray `#111827`
* CTA: Racing Red `#D71920`
* Text: Clean White
* Use strong hero image with dark overlay
* Add disclaimer in small text near bottom or footer area

---

# Section 2 — Shop By Vehicle Collection

## Purpose

Help customers shop by vehicle model collection first, similar to the reference structure.

## Collections

```txt
Tacoma Accessories
4Runner Accessories
FJ Cruiser Accessories
Tundra Accessories
```

## Card Copy

### Tacoma Accessories

```txt
Interior, exterior, and driver lifestyle accessories for Tacoma-style truck owners.
```

### 4Runner Accessories

```txt
Practical interior, exterior, and merch picks for 4Runner-style adventures.
```

### FJ Cruiser Accessories

```txt
Utility-focused add-ons and lifestyle merch for FJ Cruiser-style vehicles.
```

### Tundra Accessories

```txt
Interior, exterior, and everyday accessories for Tundra-style truck owners.
```

## Card Sub-links

Each vehicle card can show:

```txt
Interior
Exterior
Merch
```

Example:

```txt
Tacoma Interior
Tacoma Exterior
Tacoma Merch
```

## Design Notes

* 4 large image cards
* Dark gradient overlay
* Red accent line
* Strong truck/SUV visuals
* No official manufacturer logos

---

# Section 3 — New Arrivals Product Grid

## Purpose

Show latest products and make homepage product-heavy.

## Content

Eyebrow:

```txt
New Arrivals
```

Headline:

```txt
Fresh accessories for your next drive
```

CTA:

```txt
View All Products
```

## Product Query

Use WooCommerce:

```php
wc_get_products(array(
  'status'  => 'publish',
  'limit'   => 8,
  'orderby' => 'date',
  'order'   => 'DESC',
));
```

## Product Card Requirements

Each card should include:

```txt
Product image
Product title
Price
Vehicle collection label if available
View Product CTA
```

## Design Notes

* Show 8 products instead of 4
* 4 columns desktop
* 2 columns mobile
* Price in Racing Red
* Product cards white with Garage Silver border

---

# Section 4 — Shop Interior / Exterior / Merch

## Purpose

Give another shopping path for users who do not want to browse by vehicle model.

## Content

Eyebrow:

```txt
Shop By Use
```

Headline:

```txt
Find the right upgrade for the way you drive
```

## Cards

### Interior Accessories

```txt
Organizers, holders, storage add-ons, and comfort upgrades for daily driving.
```

### Exterior Accessories

```txt
Simple exterior add-ons, guards, covers, and protective details for your vehicle.
```

### Driver Lifestyle Merch

```txt
Caps, shirts, stickers, keychains, and garage-friendly lifestyle picks.
```

## Design Notes

* Use 3 wide cards
* Include product preview images
* CTA on each card:

  * Shop Interior
  * Shop Exterior
  * Shop Merch

---

# Section 5 — Best-Selling Accessories Product Grid

## Purpose

Show more products and make the homepage feel active and commerce-focused.

## Content

Eyebrow:

```txt
Customer Favorites
```

Headline:

```txt
Popular picks for truck and SUV owners
```

## Product Query

Use WooCommerce:

```php
wc_get_products(array(
  'status'  => 'publish',
  'limit'   => 8,
  'orderby' => 'popularity',
  'order'   => 'DESC',
));
```

Fallback if popularity data is unavailable:

```php
wc_get_products(array(
  'status'  => 'publish',
  'limit'   => 8,
  'orderby' => 'date',
  'order'   => 'DESC',
));
```

## Product Card Requirements

Same as New Arrivals:

```txt
Product image
Product title
Price
Vehicle collection label if available
View Product CTA
```

## Design Notes

* Show 8 products
* Keep card design consistent
* No fake reviews or fake star ratings

---

# Section 6 — Customer Feedback Slider

## Purpose

Build trust near the end of the homepage.

Important rule:

```txt
Do not use fake reviews, fake customer names, fake photos, or fake star ratings unless verified.
```

Use feedback-style trust slides that can later be replaced with verified reviews.

## Content

Eyebrow:

```txt
Customer Feedback
```

Headline:

```txt
What drivers look for in everyday auto accessories
```

Short intro:

```txt
Truck and SUV owners shop for accessories that are practical, easy to understand, and simple to use. These feedback areas can be replaced with verified customer reviews as the store grows.
```

## Slider Cards

### Slide 1 — Easy Organization

```txt
“Interior organizers and storage accessories help keep daily driving cleaner and less cluttered.”
```

### Slide 2 — Practical Add-Ons

```txt
“Simple exterior and interior add-ons make vehicle upgrades easier to shop and understand.”
```

### Slide 3 — Clear Product Details

```txt
“Compatibility notes, product photos, and installation details help customers order with more confidence.”
```

### Slide 4 — Driver Lifestyle

```txt
“Merch and small accessories are easy gift ideas for truck and SUV enthusiasts.”
```

## Design Notes

* Use slider/carousel layout
* Dark background: Deep Black or Off-Road Charcoal
* Cards: Clean White or dark cards with red accents
* No star rating unless reviews are verified
* Add CTA after slider:

```txt
Shop Popular Accessories
```

---

# Section 7 — Trust + About + Newsletter CTA

## Purpose

Combine trust, brand intro, disclaimer, and newsletter into one final compact section.

## Trust Cards

Use 4 cards:

```txt
Secure Checkout
Tracking Included
30-Day Returns
Compatibility Notes
```

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
Eligible unused, uninstalled items may be returned within 30 days of delivery.
```

### Compatibility Notes

```txt
Review product details and fitment notes before ordering.
```

## About Copy

Headline:

```txt
Built for truck and SUV accessory shoppers.
```

Paragraph:

```txt
ToyocarTV is an independent auto accessories store built for drivers who want practical interior, exterior, and lifestyle accessories organized by vehicle collection.
```

Disclaimer:

```txt
ToyocarTV is not affiliated with, endorsed by, or sponsored by Toyota Motor Corporation or any vehicle manufacturer.
```

## Newsletter

Headline:

```txt
Get new accessory drops and garage updates
```

Placeholder:

```txt
Enter your email
```

Button:

```txt
Sign Up
```

## Design Notes

* Use Deep Black footer-style section
* Red CTA
* White text
* Keep disclaimer readable
* Include links to:

  * About Us
  * Contact Us
  * Shipping Policy
  * Return & Refund Policy

---

# Homepage Product Display Strategy

To show many products, use:

```txt
8 New Arrivals
8 Customer Favorites
4 Vehicle Collection Cards
3 Use-Based Cards
4 Feedback Slides
4 Trust Cards
```

This gives the homepage a strong commerce feel without making it too long.

---

# Homepage Image Assets

Suggested image filenames:

```txt
toyocartv-hero.png
toyocartv-hero-secondary.png
tacoma-accessories.png
4runner-accessories.png
fj-cruiser-accessories.png
tundra-accessories.png
interior-accessories.png
exterior-accessories.png
driver-merch.png
toyocartv-about.png
gallery/gallery1.jpg
gallery/gallery2.jpg
gallery/gallery3.jpg
gallery/gallery4.jpg
```

Image rules:

```txt
No Toyota logos
No official Toyota assets
No license plates with personal data
No text inside images
No illegal modification visuals
No fake OEM visuals
```

---

# Copy Rules

Use:

```txt
independent auto accessories store
vehicle model collections
Tacoma-style accessories
4Runner-style accessories
FJ Cruiser-style accessories
Tundra-style accessories
interior accessories
exterior add-ons
driver lifestyle merch
compatible-style accessories
check product details before ordering
```

Use only when verified by product data:

```txt
fits Tacoma
fits 4Runner
fits FJ Cruiser
fits Tundra
OEM
genuine
factory-style
vehicle-specific fitment
```

Avoid:

```txt
Official Toyota
Toyota authorized
Toyota certified
Toyota partner
Toyota OEM
Genuine Toyota parts
Factory Toyota accessories
Toyota logo
Toyota badge
replica
dupe
illegal modification
guaranteed performance
safety guaranteed
```

---

# Final Homepage Feeling

The homepage should feel like:

```txt
A bold, independent American auto accessories store organized by Tacoma, 4Runner, FJ Cruiser, and Tundra-style vehicle collections, showing many practical products while building trust with clear feedback, policies, and compatibility notes.
```

It should be short, product-heavy, rugged, professional, easy to shop, and GMC-safe.