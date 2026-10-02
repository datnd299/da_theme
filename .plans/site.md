# Medial Market — Site.md

## Store Information

* **Website:** medialmarket.com
* **Brand name:** Medial Market (always two words, never "MedialMarket")
* **Tagline:** Your Budget-Friendly Home Market
* **Language:** English
* **Primary Market:** United States (ships to U.S. addresses only)
* **Store Type:** Budget-friendly home & living e-commerce
* **Support email:** support@medialmarket.com
* **Phone / business address:** pending — set in `inc/store-info.php` (rows are hidden while empty)
* **Support hours:** Monday – Friday, 9:00 AM – 5:00 PM, GMT-08:00 Pacific Standard Time
* **Order number prefix:** `MDM-`

All business details live in `inc/store-info.php` (`dawp_store()`); templates must read from there instead of hardcoding.

---

# Brand Positioning

Medial Market is a U.S. online home and living store that brings practical furniture, kitchen, outdoor, decor, kids and pet essentials together in one organized shop, at prices that leave room in the budget.

The storefront should feel:

* Friendly
* Practical
* Trustworthy
* Organized
* Value-focused (not cheap)

Avoid:

* Flash-sale / countdown styling
* Fake "compare at" discounts
* Marketplace clutter
* Categories outside home & living (electronics, auto, beauty, apparel, supplements)

---

# Target Audience

* Renters and first-time homeowners furnishing on a budget
* Young families (nursery, kids room, backyard play)
* Pet owners
* Age 25–55, U.S. nationwide

Shopping motivation: furnish a room, replace a worn piece, get the patio ready, make space for a baby or pet — without overspending.

---

# Main Categories (theme-defined in `inc/product-categories.php`)

| Slug | Name | Covers |
|---|---|---|
| `furniture` | Furniture | Sofas, accent chairs, beds, dressers, nightstands, dining sets, desks, bookcases, storage |
| `kitchen-dining` | Kitchen & Dining | Cookware, small appliances, utensils, bar stools, kitchen carts, organization |
| `outdoor-patio` | Outdoor & Patio | Patio sets, umbrellas, gazebos, fire pits, garden tools, sheds |
| `home-decor` | Home Decor & Bedding | Rugs, mirrors, lamps, faux plants, bedding, decorative accents |
| `kids-baby` | Kids & Baby | Kids furniture, play kitchens, ride-on toys, high chairs, baby gear |
| `pets` | Pets | Dog kennels, cat trees, pet beds, pet gates |

Imported leaf categories from the old site (e.g. Bar Stools, Gazebos, Cat Trees) should be set as children of these six.

---

# Homepage Structure

1. Announcement bar (free shipping · 30-day returns · secure checkout)
2. Header: logo, large search, Track / Account / Cart, category nav (not sticky)
3. Hero 50/50: "Furnish every room for less." + Shop All Products CTA
4. Shop by category (6 image cards)
5. Best sellers (product grid, price + Add to cart visible)
6. Two department promo banners (Kitchen & Dining, Outdoor & Patio)
7. New arrivals
8. Popular searches (chips linking to product search)
9. Why Medial Market (4 value points)
10. Support CTA (Contact / Track Order)
11. Footer: trust strip, contact, Shop / Customer Care / Policies, payment logos

No testimonials or star claims unless they come from real WooCommerce reviews.

---

# Trust Elements (required)

* Free standard U.S. shipping on every order
* 30-day returns
* Secure checkout (Visa, Mastercard, American Express, PayPal)
* Order tracking page
* Email support with 1-business-day reply

---

# Shipping Information

* Order cutoff: 5:00 PM (GMT-08:00) Pacific Standard Time
* Handling time: 1–2 business days (Monday–Friday)
* Transit time: 3–5 business days (Monday–Friday)
* Estimated delivery: usually 4–7 business days
* Standard U.S. shipping: free, no minimum
* Carriers: USPS, UPS, FedEx, DHL
* Tracking provided once orders ship

---

# Return & Refund

* Return window: 30 days after delivery
* Eligible: unused, original condition, original packaging, all parts/accessories included
* Return address is sent with the return authorization (until a business address is published)

---

# Brand Tone

Use: warm, plain-spoken, helpful, honest about prices and timelines.
Avoid: hype, urgency tricks, "luxury/premium" claims, invented statistics (customer counts, founding year, ratings).

---

# GMC Compliance Direction

* One clear niche: home & living
* Consistent business info on About, Contact, footer and policies
* Policies match checkout and WooCommerce shipping settings
* No fake reviews, no misleading discounts
* Mobile-friendly, fast, secure checkout
