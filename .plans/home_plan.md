
# MyTire.co — Homepage Body V2

## Goal
Build a clean, modern tire shopping homepage inspired by PriorityTire.com.
Follow site.md and design-system.md.

IMPORTANT: Build ONLY the homepage body.
Do NOT include or modify the header, navigation, announcement bar, or footer.

## 1. Compact Hero
- White or light gray background.
- Headline: "Find the Right Tires at the Right Price"
- Subtitle: "Shop quality tires at competitive prices."
- Clean typography, minimal layout.
- No oversized banners, sliders, or decorative graphics.

## 2. Shop Tires by Size (MAIN FEATURE)
This is the most important section of the homepage.

Design a predefined tire size selector inspired by the provided reference screenshots.

Step 1 — Rim Diameter Tabs:
R15, R16, R17, R18, R19, R20, R22, R24.

- Horizontal tab navigation on desktop.
- Dark black background with yellow active tab.
- Mobile: horizontally scrollable tabs.
- Show the number of available tire sizes per diameter when real data exists.

Step 2 — Tire Size Grid:
- Display predefined tire sizes for the selected rim diameter.
- 4 columns desktop, 2 tablet, 2 mobile.
- White or light gray rectangular buttons with subtle gray borders.
- Black bold text, compact spacing.
- Yellow border/background on hover or selected state.
- Clicking a tire size navigates directly to its matching product category or filtered results page.

Examples:
R17: 205/50R17, 215/55R17, 225/60R17, 225/65R17, 235/65R17, 245/70R17.
R20: 235/55R20, 245/50R20, 255/55R20, 275/60R20, 285/65R20, 33X12.50R20.

IMPORTANT:
- These sizes are examples, not the complete catalog.
- Use the official MyTire tire-size list or product database as the source of truth.
- Never invent available tire sizes, product counts, or stock.
- Support both metric and flotation tire size formats.
- Use a normalized tire_size key to match products accurately.
- Only link to valid categories or filtered product results.
- If backend integration is unavailable, use clearly labeled demo data.

## 3. Shopping Benefits
Display three compact benefits:
- Competitive Prices
- Wide Tire Selection
- Great Value on Sets

Use minimal icons and short text.

## 4. Shop by Category
Four simple category cards:
- Passenger Tires
- SUV & Crossover Tires
- Light Truck Tires
- Trailer Tires

Use clean tire imagery, thin borders, and minimal styling.

## 5. Featured Tires
- Title: "Featured Tires"
- Display 4 product cards on desktop.
- Tire image, brand, model, size, price per tire, and Add to Cart.
- Use actual product data when connected.
- Never fabricate prices, reviews, or discounts.
- Simple View All Tires link.

## 6. Bulk Savings
- Compact light yellow promotional banner.
- Headline: "Buying More Tires? Get Better Value."
- Subtitle: "Explore competitive pricing for multiple-tire orders."
- Black Shop Tires button.
- No oversized graphics or animations.

## Design Rules
- Inspired by Priority Tire, but use original MyTire branding.
- Primary Yellow: #FFCC00.
- Black: #171717.
- White: #FFFFFF.
- Light Gray: #F7F7F7.
- Max content width: 1280px.
- Compact spacing, clean typography, subtle borders.
- Product-focused American e-commerce design.
- No gradients, carousels, glassmorphism, or excessive animations.

## Functional Requirements
- Tire diameter tabs switch the visible tire size grid.
- Tire size buttons navigate to matching product listings.
- Tire sizes must map to normalized product attributes.
- Do not hardcode example tire sizes as real inventory.
- Provide loading, empty, and error states.
- Responsive and keyboard accessible.

## Implementation
- Build homepage body only.
- Reuse existing components and design tokens.
- Do not create a new header or footer.
- Do not modify unrelated pages.
- Prioritize a realistic, fast, and functional tire shopping experience.