# Gudwear.com Design System

## Core Design Philosophy

Gudwear.com should feel like a clean, natural, and trustworthy women's fashion store for comfortable everyday clothing.

The website experience must be:

* Calm
* Modern
* Comfortable
* Mature
* Fresh
* Easy to browse
* Boutique-inspired
* GMC-safe

Gudwear.com is not a fast-fashion trend site, teen brand, clubwear store, luxury runway label, or random marketplace.

---

# Design Archetype

Gudwear.com =

**Good Everyday Wear For Women**

Visual identity should combine:

* Relaxed boutique fashion
* Natural colors
* Olive and stone accents
* Clean ecommerce structure
* Realistic lifestyle photography
* Clear product discovery
* Trust-first shopping

The site should feel more fresh and grounded than overly sweet. Keep the femininity subtle.

---

# Layout Rules

Use:

* Spacious sections
* Large lifestyle imagery
* Clean product grids
* Simple category cards
* Rounded corners, generally 8px-24px depending on component scale
* Clear typography and readable copy
* Alternating ivory, white, and stone/olive-tint bands

Avoid:

* Crowded product walls
* Flashy animations
* Harsh sale banners
* Heavy discount styling
* Low contrast text
* Nested cards

---

# Grid & Containers

Desktop:

* Main container: `max-w-7xl`
* Category cards: 3 columns
* Product grids: 4 columns
* Feature sections: 2-column image + copy

Tablet:

* Category and product cards: 2 columns
* Keep images large and text blocks short

Mobile:

* Story sections: 1 column
* Product grids: 2 columns when suitable
* Large tap targets
* Short copy

Padding:

* Mobile: `px-4`
* Tablet: `px-6`
* Desktop: `px-8`

Section spacing:

* Mobile: `py-14` to `py-16`
* Desktop: `py-20` to `py-24`

---

# Color System

Gudwear.com should feel natural, fresh, and lightly polished.

## Primary Palette

### Warm Ivory

```txt
#FBF7EF
```

Use for main soft backgrounds and calm page atmosphere.

### Olive Green

```txt
#6F7F58
```

Use for primary buttons, badges, hover accents, and natural brand emphasis.

### Deep Ink

```txt
#24312B
```

Use for headings, dark CTA blocks, footer, and strong contrast.

### Clay Rose

```txt
#B98273
```

Use sparingly for warm secondary accents, small labels, and soft contrast.

### Mist Blue

```txt
#DDE8EA
```

Use for cool supporting background bands and quiet visual breaks.

## Neutral Palette

### Clean White

```txt
#FFFFFF
```

Use for product cards, forms, header, and content panels.

### Stone

```txt
#E9E1D3
```

Use for alternate sections, borders, and soft category backgrounds.

### Gentle Border

```txt
#D8D0C2
```

Use for borders, dividers, product cards, and inputs.

### Main Text

```txt
#263029
```

Use for body text and product titles.

### Muted Text

```txt
#687268
```

Use for descriptions and secondary metadata.

---

# Color Usage Rules

Light sections:

* Background: `#FBF7EF`, `#FFFFFF`, or `#E9E1D3`
* Heading: `#24312B`
* Body: `#687268`
* CTA: `#6F7F58`

Accent sections:

* Use `#DDE8EA` or soft olive-tint backgrounds
* Keep text contrast strong with `#24312B`
* Use `#B98273` only as a secondary detail

Dark sections:

* Background: `#24312B`
* Heading: `#FFFFFF`
* Body: white/80
* Accent: `#E9E1D3` or `#DDE8EA`

Avoid:

* Neon colors
* Bright red urgency
* All-pink palettes
* Heavy brown/orange dominance
* Low contrast pastel text

---

# Typography

Heading fonts may use:

* Lora
* Playfair Display
* Cormorant Garamond
* Merriweather
* DM Serif Display

Body fonts may use:

* Inter
* DM Sans
* Source Sans 3
* Be Vietnam Pro
* Nunito Sans

Headings should feel soft but clear. Body copy should be short, practical, and easy to scan.

---

# Imagery

Images should sell comfort, real-life wearability, and natural polish.

Use:

* Women aged around 30-45
* Relaxed tops, tunics, blouses, dresses, and soft bottoms
* Natural indoor or outdoor light
* Home, cafe, garden, sidewalk, and weekend settings
* Fabric texture and relaxed movement

Avoid:

* Teen models
* Nightclub poses
* Luxury runway styling
* Harsh studio lighting
* Copyrighted graphics
* Fake logos
* Low-quality product screenshots

---

# UI Components

Primary buttons:

* Background: `#6F7F58`
* Text: `#FFFFFF`
* Hover: `#24312B`

Secondary buttons:

* Background: white or transparent
* Border: `#6F7F58`
* Text: `#24312B`
* Hover: `#E9E1D3`

Product cards:

* White background
* Gentle border `#D8D0C2`
* Consistent image ratio
* Minimal badges
* Light hover shadow

Category cards:

* Lifestyle image
* Category name
* One short style line
* Clear category link

Trust cards:

* Simple icon or check mark
* Short benefit title
* One practical sentence

---

# Header & Footer

Header:

* Clean white or warm ivory
* Logo: Gudwear.com
* Navigation: New Arrivals, Casual Tops, Tunic Tops, Blouses & Shirts, Dresses, Contact
* Text: Deep Ink
* Hover: Olive Green

Footer:

* Background: Deep Ink `#24312B`
* Include brand summary, categories, care links, policy links, support email, and business hours
* Text: white and white/75

---

# Homepage Design Rules

Hero:

* Introduce Gudwear.com clearly
* Headline: `Good Everyday Wear For Women`
* Subheadline: relaxed tops, tunics, blouses, and easy wardrobe pieces made for comfort and quiet confidence
* CTAs: Shop Casual Tops, Explore Tunics
* Visual: realistic mature woman in relaxed everyday clothing

Shop by Style:

* Relaxed Tops
* Easy Tunics
* Polished Blouses

Featured sections:

* Tunic Tops
* Soft Graphic Tops
* Blouses & Shirts

Trust section:

* Why Women Choose Gudwear.com
* Comfortable fits
* Natural details
* Easy repeat styling
* Clear product information
* Secure checkout
* 30-day returns

Newsletter:

* Use `gudwear-newsletter-email` as the input id
* Copy should mention Gudwear.com, new arrivals, seasonal favorites, and everyday outfit ideas

---

# Content Rules

Use words like:

* good
* easy
* relaxed
* comfortable
* natural
* polished
* everyday
* wearable
* soft
* simple
* confident

Avoid words like:

* sexy
* viral
* crazy sale
* luxury guaranteed
* clubwear
* bodycon
* hot

---

# Technical Stack Rules

Recommended stack:

* WooCommerce
* TailwindCSS
* Modular PHP templates
* Lightweight JavaScript only

Performance priorities:

* Compressed images
* Lazy-loaded product images
* Clean DOM
* Minimal plugins

Final design goal:

> Gudwear.com should look like a clean, trustworthy women's fashion store offering comfortable everyday pieces with a fresh olive, ivory, and stone visual direction.
