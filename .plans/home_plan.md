# Proudlywear — Home Plan

## Homepage Goal

Build a short, emotional, product-heavy homepage for a patriotic POD apparel and custom gift brand.

Main purpose:

* Show best-selling products early
* Make veteran-inspired categories easy to shop
* Highlight personalized products
* Build trust for custom POD orders
* Create emotional meaning around service, legacy, and American pride

Core message:

> Honor The Service. Wear The Legacy.

Homepage feeling:

* Patriotic
* Respectful
* Emotional
* Trustworthy
* Product-heavy
* Easy to shop
* Older-audience friendly

---

# Homepage Structure

Use 7 sections maximum:

1. **Hero + Best Seller Strip**
2. **Shop By Collection**
3. **Best Sellers Product Grid**
4. **Personalized Veteran Apparel Feature**
5. **Gift By Occasion / America 250**
6. **Customer Tributes & Gift Moments**
7. **Trust + About + Newsletter CTA**

---

# Section 1 — Hero + Best Seller Strip

## Purpose

Immediately communicate what Proudlywear sells and why it matters.

## Hero Eyebrow

```txt
Patriotic Apparel & Custom Gifts
```

## Hero Headline

```txt
Honor The Service. Wear The Legacy.
```

## Hero Subheadline

```txt
Shop custom veteran polos, patriotic hats, mugs, accessories, and America-inspired gifts made for veterans, military families, and proud Americans.
```

## Primary CTA

```txt
Shop Best Sellers
```

## Secondary CTA

```txt
Customize Yours
```

## Trust Line

```txt
Secure checkout. Tracking included. Custom gifts made with care.
```

## Best Seller Strip

Show 3–4 quick links under hero:

```txt
Veteran Polos
Veteran Hats
America 250 Collection
Custom Military Gifts
```

## Visual Direction

Use:

* Veteran wearing custom polo
* Folded polo + patriotic hat
* American flag background
* Product close-up showing name, rank, or service years

Avoid:

* Official military logos
* Political visuals
* Fake military endorsement
* Too much text inside images

---

# Section 2 — Shop By Collection

## Purpose

Help users quickly choose the right product group.

## Collections

Use 6 cards:

```txt
Best Sellers
Veteran Polo Shirts
Veteran Hats
America 250 Collection
Custom Military Gifts
Patriotic Accessories
```

## Card Copy

**Best Sellers**

```txt
Customer-favorite patriotic apparel and veteran-inspired gifts.
```

**Veteran Polo Shirts**

```txt
Custom polos made to carry a veteran’s name, service years, and earned pride.
```

**Veteran Hats**

```txt
Patriotic caps and veteran-inspired designs for everyday pride.
```

**America 250 Collection**

```txt
Celebrate America’s 250th Anniversary with meaningful patriotic apparel and gifts.
```

**Custom Military Gifts**

```txt
Personalized gifts made for fathers, husbands, grandfathers, and proud service families.
```

**Patriotic Accessories**

```txt
Mugs, caps, and everyday accessories made for proud Americans.
```

## Design Notes

* 3 columns desktop
* 2 columns tablet
* 1 column mobile
* Use image cards or clean cards with product imagery
* CTA on each card: `Shop Collection`

---

# Section 3 — Best Sellers Product Grid

## Purpose

Make homepage commerce-focused and show products early.

## Content

Eyebrow:

```txt
Best Sellers
```

Headline:

```txt
Patriotic favorites made to honor service and pride
```

CTA:

```txt
View All Best Sellers
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

Fallback:

```php
wc_get_products(array(
  'status'  => 'publish',
  'limit'   => 8,
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
Sale price if available
Customizable badge if applicable
View Product / Customize Now CTA
```

## Design Notes

* Show 8 products
* 4 columns desktop
* 2 columns mobile
* Price in Heritage Red
* Product image ratio: 1/1 for mixed grid

---

# Section 4 — Personalized Veteran Apparel Feature

## Purpose

Explain the emotional and custom value of Proudlywear products.

## Eyebrow

```txt
Personalized With Pride
```

## Headline

```txt
Custom apparel that carries name, rank, and service years.
```

## Paragraph

```txt
Many Proudlywear products can be personalized with details that matter — from a veteran’s name to service years, rank, or branch-inspired artwork. These are not just everyday apparel pieces; they are meaningful gifts made to honor service and legacy.
```

## Feature Points

```txt
Custom name options
Rank and service years
Branch-inspired designs
Gift-ready for veterans and families
```

## CTA

```txt
Shop Custom Gifts
```

## Custom Product Note

```txt
Please review all personalization details carefully before placing your order. Personalized items may require additional production time.
```

## Visual Direction

Use:

* Close-up of custom polo details
* Shirt + hat gift set
* Veteran-inspired product mockup
* Warm patriotic background

---

# Section 5 — Gift By Occasion / America 250

## Purpose

Help gift shoppers browse by moment or holiday.

## Eyebrow

```txt
Gift By Occasion
```

## Headline

```txt
Meaningful patriotic gifts for moments that matter
```

## Cards

Use 6 cards:

```txt
Father’s Day Gifts
Veterans Day Gifts
Memorial Day Gifts
Independence Day Gifts
America 250th Anniversary
Christmas Gifts For Veterans
```

## Copy Examples

```txt
A meaningful gift for the veteran who carries the story.
```

```txt
Personalized apparel made to honor service years, family legacy, and American pride.
```

```txt
Celebrate America’s 250th with patriotic apparel and custom gifts.
```

## Design Notes

* 3 columns desktop
* 2 columns tablet
* 1 column mobile
* Use Antique White background
* Use Heritage Gold accents lightly
* Avoid fake urgency

---

# Section 6 — Customer Tributes & Gift Moments

## Purpose

Build trust and emotional connection near the end of the homepage.

Important:

```txt
Do not use fake reviews, fake names, fake photos, or fake star ratings.
```

If verified reviews are unavailable, use tribute-style statements.

## Eyebrow

```txt
Customer Tributes
```

## Headline

```txt
Gift moments built around service, memory, and pride
```

## Intro

```txt
Many customers choose personalized veteran apparel as a way to honor service, remember family legacy, and give a gift with meaning.
```

## Slider Cards

**Slide 1 — Family Legacy**

```txt
A gift that helps families honor a father’s years of service.
```

**Slide 2 — Personalized Pride**

```txt
A custom polo that carries name, rank, and service years with pride.
```

**Slide 3 — Patriotic Keepsake**

```txt
A meaningful keepsake for Veterans Day, Father’s Day, and everyday wear.
```

**Slide 4 — Quiet American Pride**

```txt
A simple way to show American pride without saying too much.
```

## CTA

```txt
Shop Meaningful Gifts
```

## Design Notes

* Use slider/carousel layout
* Dark Navy background
* White cards or dark cards with gold accents
* No fake star rating unless verified

---

# Section 7 — Trust + About + Newsletter CTA

## Purpose

Close the homepage with trust, brand clarity, and email capture.

## Trust Cards

Use 4 cards:

```txt
Secure Checkout
Tracking Included
30-Day Returns
Personalization Support
```

## Trust Copy

**Secure Checkout**

```txt
A safe and simple checkout experience for every order.
```

**Tracking Included**

```txt
Tracking details are provided once your order ships.
```

**30-Day Returns**

```txt
Eligible non-personalized items may be returned within 30 days of delivery.
```

**Personalization Support**

```txt
Review your custom name, rank, and service details carefully before ordering.
```

## About Headline

```txt
Patriotic apparel and gifts made to honor service.
```

## About Paragraph

```txt
Proudlywear is a patriotic POD apparel and custom gift store created for veterans, military families, and proud Americans who want meaningful products that carry service, legacy, and American pride.
```

## Newsletter Headline

```txt
Get new patriotic drops and gift ideas
```

## Newsletter Placeholder

```txt
Enter your email
```

## Newsletter Button

```txt
Sign Up
```

## Footer Reminder

Footer must include:

```txt
About Us
Contact Us
Shipping Policy
Return & Refund Policy
Privacy Policy
Terms of Service
FAQ
Track Order
```

---

# Homepage Product Strategy

Homepage should show:

```txt
8 Best Sellers
6 Collection Cards
6 Occasion Cards
4 Tribute Slides
4 Trust Cards
```

This gives the homepage enough product and trust content without making it too long.

---

# Suggested Image Assets

Use these image names for homepage HTML later:

```txt
proudlywear-hero.png
proudlywear-hero-secondary.png
best-sellers.png
veteran-polo-shirts.png
veteran-hats.png
america-250-collection.png
custom-military-gifts.png
patriotic-accessories.png
personalized-veteran-apparel.png
father-day-gifts.png
veterans-day-gifts.png
memorial-day-gifts.png
independence-day-gifts.png
america-250-gifts.png
christmas-veteran-gifts.png
```

Image rules:

```txt
No official military logos
No unauthorized seals
No political campaign visuals
No fake military endorsement
No text-heavy banners
No AI-looking faces
```

---

# Final Homepage Feeling

The homepage should feel like:

> A patriotic American custom gift homepage that quickly shows products, explains personalization value, helps customers shop by collection or occasion, and builds trust around service, legacy, and American pride.