# luxurytheme.com — DESIGN SYSTEM

## 1. Design Direction

**Style:** Modern Quiet Luxury
**Mood:** Elegant, refined, timeless, premium
**Principle:** Product first. Luxury through simplicity.

Avoid:

* Too much gold
* Heavy gradients
* Large shadows
* Excessive rounded cards
* Loud animation
* Crowded layouts

---

## 2. Color System

```css
--black: #0B0B0B;
--charcoal: #1A1A1A;
--ivory: #F7F5F0;
--white: #FFFFFF;

--gold: #B89B5E;
--gold-light: #D1BD8A;

--gray-700: #555555;
--gray-500: #858585;
--gray-300: #CCCCCC;
--gray-200: #E5E2DC;
```

Use:

* Ivory / white for main backgrounds
* Black for text and premium dark sections
* Gold only as a subtle accent

---

## 3. Typography

### Display Font

**Cormorant Garamond**

Use for:

* Hero titles
* Collection titles
* Editorial headings

### UI Font

**Inter**

Use for:

* Navigation
* Body text
* Buttons
* Prices
* Forms
* Product details

---

## 4. Type Scale

```text
Display: 72px
H1: 52px
H2: 40px
H3: 30px
H4: 24px
Body Large: 18px
Body: 16px
Small: 14px
Label: 12px
```

Mobile:

```text
Display: 46px
H1: 38px
H2: 32px
H3: 26px
Body: 15px
```

Keep typography light and editorial.

---

## 5. Spacing

Base spacing:

```text
4 / 8 / 12 / 16 / 24 / 32 / 48 / 64 / 96 / 120px
```

Section spacing:

```text
Desktop: 96–120px
Mobile: 56–72px
```

Generous whitespace is part of the luxury look.

---

## 6. Layout

```text
Max width: 1440px
Content width: 1280px
Reading width: 720px
```

Page padding:

```text
Desktop: 48–64px
Tablet: 32px
Mobile: 20px
```

Grid:

```text
Desktop: 12 columns
Tablet: 8 columns
Mobile: 4 columns
```

---

## 7. Breakpoints

```css
--sm: 480px;
--md: 768px;
--lg: 1024px;
--xl: 1280px;
--2xl: 1536px;
```

Layouts should remain fluid between breakpoints.

---

## 8. Border & Radius

```css
--radius-sm: 2px;
--radius-md: 4px;
--radius-lg: 8px;
```

Default border:

```css
1px solid #E5E2DC;
```

Use borders more often than shadows.

---

## 9. Buttons

### Primary

```text
Background: Black
Text: White
Height: 50px
Radius: 2px
Padding: 0 28px
```

### Secondary

```text
Background: Transparent
Border: Black
Text: Black
```

Hover:

```text
Black background
White text
```

Buttons should feel clean and confident.

---

## 10. Header

```text
Desktop height: 80px
Mobile height: 64px
```

Main navigation:

```text
Watches
Collections
New Arrivals
Discover
Services
```

Utilities:

```text
Search
Account
Wishlist
Cart
```

Header may start transparent over hero and become solid on scroll.

---

## 11. Product Cards

Structure:

```text
Image
Status
Product Name
Collection
Price
Wishlist
```

Recommended image ratio:

```text
4:5
```

Rules:

* Minimal card styling
* No permanent shadow
* No strong border
* Large product image
* Clean typography

Desktop hover:

* Small image zoom
* Optional secondary image
* Subtle wishlist reveal

---

## 12. Product Grid

```text
Desktop: 4 columns
Tablet: 2–3 columns
Mobile: 2 columns
Featured mobile: 1 column
```

Keep generous gaps between products.

---

## 13. Hero

Hero style:

* Full-width photography
* Campaign video
* Split layout
* Large editorial text

Recommended height:

```text
Desktop: 80–100vh
Mobile: 70–90vh
```

Hero copy should remain short.

---

## 14. Photography

Preferred ratios:

```text
Hero: 16:9
Product: 4:5
Editorial: 3:4
Landscape: 3:2
```

Photography should feel:

* Cinematic
* Premium
* Detailed
* Minimal
* Product-focused

---

## 15. Forms

```text
Input height: 52px
Radius: 2px
Border: 1px solid gray
```

Use:

* Clear labels
* Minimal styling
* Strong focus states
* Comfortable mobile sizing

---

## 16. Icons

Use thin-line icons.

Recommended stroke:

```text
1.5–1.75px
```

Avoid cartoon or filled-style icon sets.

---

## 17. Motion

```css
--fast: 180ms;
--base: 300ms;
--slow: 500ms;
```

Recommended easing:

```css
cubic-bezier(0.22, 1, 0.36, 1);
```

Allowed:

* Fade
* Small slide-up
* Image reveal
* Slow zoom
* Product hover

Avoid:

* Bounce
* Fast movement
* Excessive parallax

---

## 18. Dark Sections

```text
Background: #0B0B0B
Primary text: #F7F5F0
Secondary text: #A8A8A8
Accent: #B89B5E
```

Use dark sections to create cinematic contrast.

Do not make every page fully dark.

---

## 19. Responsive Rules

Mobile should prioritize:

* Large imagery
* Simple navigation
* Swipe galleries
* Filter drawer
* Sticky purchase CTA
* Large tap targets
* Reduced animation

Do not simply shrink desktop layouts.

---

## 20. Accessibility

Minimum requirements:

* WCAG 2.2 AA target
* Visible focus state
* Semantic HTML
* Keyboard navigation
* Proper form labels
* Alt text
* Good contrast
* Reduced motion support

---

## 21. Core Components

```text
Header
MegaMenu
MobileMenu
Hero
Button
ProductCard
ProductGrid
CollectionCard
ImageText
EditorialSection
VideoSection
Accordion
Tabs
FilterDrawer
SearchOverlay
Gallery
Newsletter
Footer
```

Prefer reusable variants over duplicated components.

---

## 22. UX Rules

Every page must be:

* Easy to understand
* Easy to navigate
* Product-focused
* Visually calm
* Responsive
* Fast

Users should always understand:

```text
Where am I?
What can I do?
What happens next?
```

---

## 23. Luxury Rules

DO:

* Use whitespace
* Use strong photography
* Use restrained typography
* Use subtle motion
* Keep layouts clean
* Let products dominate

DON'T:

* Overuse gold
* Add too many effects
* Use aggressive promotions
* Over-round components
* Fill every empty space

---

## 24. Final Visual Identity

```text
Palette:
Warm Ivory + Deep Black + Champagne Gold

Typography:
Elegant Serif + Modern Sans Serif

Layout:
Spacious + Editorial + Precise

Motion:
Smooth + Subtle + Controlled

Overall:
Modern Quiet Luxury
```

> Quiet luxury should feel expensive because of restraint, not decoration.