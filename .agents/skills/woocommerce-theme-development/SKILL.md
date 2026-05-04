---
name: woocommerce-theme-development
description: Teaches the AI to design WooCommerce themes that look professional and modern. Focuses on customizing layouts, styling elements, and implementing advanced features to create high-quality e-commerce experiences.
---

# Theme Directory Structure
 
This reference describes the complete file layout of a hardcoded WooCommerce theme and what each file is responsible for.
 
## Full layout
 
```
my-shop-theme/
│
├── style.css                       # Theme metadata header (required by WP)
├── functions.php                   # Bootstrap: load inc/* files
├── index.php                       # Mandatory fallback template
├── screenshot.png                  # 1200x900 preview shown in Appearance → Themes
│
├── header.php                      # Opening HTML, <head>, <body>, site header, hardcoded menu
├── footer.php                      # Hardcoded footer columns, closing HTML
├── sidebar-shop.php                # Category list for the shop page (left column)
│
├── front-page.php                  # Homepage — auto-used by WP for the front page
├── page.php                        # Default page template (rarely hit, virtual pages handle most)
├── single.php                      # Single blog post template
│
├── woocommerce.php                 # Master wrapper for ALL Woo pages (shop, cart, checkout, etc.)
│
├── inc/
│   ├── theme-setup.php             # add_theme_support(), enqueue scripts/styles
│   ├── menu.php                    # PHP array of menu items + render function
│   ├── virtual-pages.php           # template_redirect handler for /faq/, /about-us/, etc.
│   └── woo-tweaks.php              # Optional Woo hook tweaks (remove sidebar from single product, etc.)
│
├── template-parts/
│   ├── page-home.php               # Homepage hero, featured products, categories
│   ├── page-shipping-returns.php
│   ├── page-terms.php
│   ├── page-privacy.php
│   ├── page-faq.php
│   ├── page-support.php
│   ├── page-about.php
│   ├── page-track-order.php        # Renders [woocommerce_order_tracking] shortcode
│   ├── page-wishlist.php
│   └── page-contact.php            # Static contact form or shortcode
│
├── woocommerce/                    # Override Woo templates
│   ├── archive-product.php         # Shop page with sidebar-left + products-right layout
│   ├── content-product.php         # Single product card in the loop (optional)
│   └── single-product.php          # Single product page (optional)
│
└── assets/
    ├── css/main.css                # All site styles (CSS custom properties at top for theming)
    ├── js/main.js                  # Mobile menu toggle, etc.
    └── images/
        └── logo.png                # Site logo
```
 
## What each file does
 
### Theme metadata
 
**`style.css`** — Must start with the WordPress theme header comment block. WordPress reads `Theme Name`, `Version`, `Text Domain`, etc. from here. The actual CSS can be empty (real styles live in `assets/css/main.css`) but the file must exist.
 
**`screenshot.png`** — Optional but recommended. 1200×900 PNG shown in Appearance → Themes.
 
### Bootstrap
 
**`functions.php`** — Just loads files from `inc/`:
```php
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/menu.php';
require_once get_template_directory() . '/inc/virtual-pages.php';
require_once get_template_directory() . '/inc/woo-tweaks.php';
```
 
**`index.php`** — WordPress requires this file to exist for a theme to be valid. It's a fallback when no more specific template matches. In this theme it's rarely hit because virtual pages and `front-page.php` cover almost every URL.
 
### Layout files
 
**`header.php`** — Renders `<!DOCTYPE html>` through the opening of the main content area. Calls `wp_head()`, includes the site logo, and renders the main menu by calling `mytheme_render_main_menu()` (defined in `inc/menu.php`).
 
**`footer.php`** — Renders footer HTML (hardcoded columns, copyright line) and calls `wp_footer()` before closing `</body></html>`.
 
**`sidebar-shop.php`** — Loaded by `archive-product.php` via `get_sidebar('shop')`. Queries `product_cat` taxonomy and renders a category list. No widget areas.
 
### Page templates
 
**`front-page.php`** — WordPress automatically uses this for the homepage. Includes `template-parts/page-home.php`.
 
**`page.php`** — Standard WordPress page template. In this theme it's rarely used because static pages are virtual. Kept as a fallback.
 
**`single.php`** — Single blog post. Optional; only matters if the user enables blog posts.
 
### WooCommerce wrapper
 
**`woocommerce.php`** — Crucial file. WordPress looks for this at the theme root and uses it as the wrapper for **every** WooCommerce-related URL (shop, single product, cart, checkout, my-account). It typically just calls `woocommerce_content()` between `get_header()` and `get_footer()`. The shop-specific layout (sidebar + products) lives in `woocommerce/archive-product.php` instead.
 
### Includes
 
**`inc/theme-setup.php`** — Hooks into `after_setup_theme` to declare features (`title-tag`, `post-thumbnails`, `woocommerce`, `wc-product-gallery-*`). Hooks into `wp_enqueue_scripts` to load CSS/JS.
 
**`inc/menu.php`** — Defines `mytheme_main_menu_items()` returning an array of `['title' => ..., 'url' => ..., 'children' => [...]]`. Defines `mytheme_render_main_menu()` which echoes the `<ul class="main-menu">` markup with active-state classes.
 
**`inc/virtual-pages.php`** — Hooks into `template_redirect`, parses the request URI, and if it matches a known slug (e.g., `faq`, `about-us`), loads the matching `template-parts/page-*.php` file.
 
**`inc/woo-tweaks.php`** — Optional. Common tweaks: remove the result count, change products-per-row, add `nofollow` to facets, etc.
 
### Template parts
 
Each file in `template-parts/` is a self-contained chunk of HTML/PHP for one virtual page. They do NOT call `get_header()` or `get_footer()` — `inc/virtual-pages.php` wraps them.
 
### WooCommerce overrides
 
Files placed in `theme/woocommerce/` automatically replace the equivalent file in `wp-content/plugins/woocommerce/templates/`. Only override what you need to customize. The most common overrides:
 
- **`archive-product.php`** — The shop page. This is where the left-sidebar + right-products layout is implemented.
- **`content-product.php`** — How a single product appears in the product grid. Override to customize the product card.
- **`single-product.php`** — The single product detail page.
You generally do NOT need to override cart, checkout, or my-account templates — Woo's defaults work and overriding them creates a maintenance burden when Woo updates.


# Virtual Pages Pattern

The "virtual pages" technique lets the theme respond to URLs like `/faq/`, `/about-us/`, `/contact-us/` without those pages existing in the database. This is the key mechanism that makes the theme "install-and-go" with no admin configuration.

## How it works

WordPress processes every request through a routing pipeline. By the time the `template_redirect` hook fires, WordPress has already decided what kind of request this is — usually a 404 for our virtual URLs, since no post matches the slug.

We hook into `template_redirect`, check if the URI matches our list of virtual slugs, and if so:
1. Override the 404 status with `status_header(200)`
2. Disable caching headers that WP set assuming this was an error
3. Load `header.php` + the matching template part + `footer.php`
4. Call `exit` to prevent WordPress from continuing with its 404 template

## Implementation

```php
// inc/virtual-pages.php

add_action('template_redirect', 'mytheme_handle_virtual_pages');

function mytheme_handle_virtual_pages() {
    // Get the request path, stripped of query string and slashes
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    // Map of slug → template part name (without "template-parts/" prefix and ".php" suffix)
    $virtual_pages = mytheme_virtual_page_map();

    if (!isset($virtual_pages[$request_uri])) {
        return; // Not one of ours, let WP continue normally
    }

    $page = $virtual_pages[$request_uri];

    // Override the 404 that WP probably set
    status_header(200);
    nocache_headers();

    // Set globals so wp_title() and similar work correctly
    global $wp_query;
    $wp_query->is_404 = false;
    $wp_query->is_page = true;
    $wp_query->is_singular = true;

    // Render the page
    get_header();
    echo '<main class="virtual-page virtual-page--' . esc_attr($page['slug']) . '">';
    get_template_part('template-parts/page', $page['slug']);
    echo '</main>';
    get_footer();
    exit;
}

function mytheme_virtual_page_map() {
    return [
        'shipping-returns' => ['slug' => 'shipping-returns', 'title' => 'Shipping & Returns'],
        'terms-conditions' => ['slug' => 'terms',            'title' => 'Terms & Conditions'],
        'privacy-policy'   => ['slug' => 'privacy',          'title' => 'Privacy Policy'],
        'faq'              => ['slug' => 'faq',              'title' => 'FAQ'],
        'support'          => ['slug' => 'support',          'title' => 'Support'],
        'about-us'         => ['slug' => 'about',            'title' => 'About Us'],
        'track-my-order'   => ['slug' => 'track-order',      'title' => 'Track My Order'],
        'wishlist'         => ['slug' => 'wishlist',          'title' => 'Wishlist'],
        'contact-us'       => ['slug' => 'contact',          'title' => 'Contact Us'],
    ];
}
```

The corresponding template parts live at:
- `template-parts/page-shipping-returns.php`
- `template-parts/page-terms.php`
- `template-parts/page-privacy.php`
- ...etc

WordPress's `get_template_part('template-parts/page', $slug)` resolves `$slug = 'faq'` to `template-parts/page-faq.php`.

## SEO and the `<title>` tag

By default, `wp_title()` and `add_theme_support('title-tag')` will produce a generic title for our virtual pages. Improve this with a filter:

```php
add_filter('document_title_parts', 'mytheme_virtual_page_title');

function mytheme_virtual_page_title($parts) {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $map = mytheme_virtual_page_map();
    if (isset($map[$request_uri])) {
        $parts['title'] = $map[$request_uri]['title'];
    }
    return $parts;
}
```

## Conflicts to avoid

The virtual page handler runs on EVERY request, so be careful not to swallow URLs that belong to:

**WooCommerce:**
- `/shop/` — the shop archive
- `/cart/` — the cart page
- `/checkout/` — the checkout
- `/my-account/` — my account
- `/product/...` — single product URLs
- `/product-category/...` — category archives
- `/product-tag/...` — tag archives

**WordPress core:**
- `/wp-admin/`
- `/wp-login.php`
- `/feed/`, `/rss/`, `/comments/feed/`
- `/?s=...` (search)

The map approach above is safe because it only matches exact slugs, not prefixes. But never add `shop`, `cart`, `checkout`, or `my-account` to the virtual page map.

## Alternative: rewrite rules

A more "WordPress-native" approach is to register custom rewrite rules and a custom query var, then check the query var in `template_include`. This is cleaner architecturally but has a downside: rewrite rules must be flushed on theme activation, which is fragile and can leave the site broken if the theme is deactivated without cleanup.

For a hardcoded "install and forget" theme, `template_redirect` is the better choice — no flush required, fewer moving parts.

## Why not use `wp_insert_post()` on theme activation?

Some themes create their pages programmatically via `register_activation_hook` style code in `after_switch_theme`. This works but violates the user's "no database content" requirement and creates orphaned posts if the theme is later switched. Virtual pages keep the database clean.

## Trade-offs

What you LOSE with virtual pages:
- No content editing through wp-admin (intentional for this theme!)
- Page builder plugins (Elementor, Beaver Builder) cannot edit these pages
- The "page" objects don't exist, so plugins that iterate all pages won't see them

What you KEEP:
- Clean URLs
- Correct HTTP status codes
- Working `<title>` tags (with the filter above)
- Theme remains a single self-contained package

## Active link detection

When rendering the menu, you'll want to know which page is currently active. Use the same URI parsing:

```php
function mytheme_is_current_page($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $target  = trim(parse_url($url, PHP_URL_PATH), '/');
    return $current === $target;
}
```

Used in the menu render function to add an `aria-current="page"` attribute and a CSS class.


# WooCommerce Template Overrides

This reference explains how WooCommerce's template system works and which files to override to achieve the "sidebar left, products right" shop layout.

## How Woo's template system works

WooCommerce ships with templates in `wp-content/plugins/woocommerce/templates/`. When Woo needs to render something — a product card, the cart table, the checkout form — it calls `wc_get_template()`, which checks for an override in this order:

1. `wp-content/themes/{active-theme}/woocommerce/{template-name}.php`
2. `wp-content/plugins/woocommerce/templates/{template-name}.php`

So to customize any Woo template, copy it from the plugin directory into your theme's `woocommerce/` subfolder, then edit the copy. Woo's auto-loading takes care of the rest.

## The master wrapper: `woocommerce.php`

Place a file named `woocommerce.php` at your THEME ROOT (not inside `woocommerce/`). When this file exists, WordPress uses it as the template for every Woo-related URL — bypassing `archive-product.php`, `single-product.php`, `page-cart.php`, etc.

For most themes this is too aggressive. Don't use a root `woocommerce.php` if you want different layouts for shop vs. single product. Instead, override the specific template files inside `woocommerce/`.

For our hardcoded theme, we DO want a root `woocommerce.php` for cart/checkout/my-account (which all use a single-column layout) and override `archive-product.php` separately for the two-column shop layout.

```php
// /woocommerce.php (theme root)
<?php get_header(); ?>
<main class="woo-page">
    <div class="container">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer();
```

## The shop layout: `woocommerce/archive-product.php`

This is where the two-column "categories left, products right" structure goes. Copy from `wp-content/plugins/woocommerce/templates/archive-product.php` and modify:

```php
// /woocommerce/archive-product.php
<?php
/**
 * The Template for displaying product archives.
 */
defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="shop-layout">
    <aside class="shop-sidebar">
        <?php get_sidebar('shop'); ?>
    </aside>

    <div class="shop-main">
        <?php
        if (woocommerce_product_loop()) {
            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();
                    wc_get_template_part('content', 'product');
                }
            }

            woocommerce_product_loop_end();

            do_action('woocommerce_after_shop_loop');
        } else {
            do_action('woocommerce_no_products_found');
        }
        ?>
    </div>
</div>

<?php
get_footer('shop');
```

This file replaces ALL the default Woo hooks like `woocommerce_before_main_content`, `woocommerce_sidebar`, etc. — that's intentional. It gives you a clean two-column layout without Woo's wrapper divs interfering.

## Removing default Woo elements

If you keep the default `archive-product.php` but just want to remove or relocate elements, use hooks in `inc/woo-tweaks.php`:

```php
// Remove default sidebar (we render our own)
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Remove the default page title on shop archive
add_filter('woocommerce_show_page_title', '__return_false');

// Remove the result count and sort dropdown
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Change products per row (4 by default)
add_filter('loop_shop_columns', function() { return 3; });

// Change products per page
add_filter('loop_shop_per_page', function() { return 12; });
```

## The product card: `woocommerce/content-product.php`

Override this if you want to customize how each product appears in the shop grid. The default is fine for most cases. A common customization is to add a "Quick View" button or rearrange the image/title/price order:

```php
// /woocommerce/content-product.php
<?php
defined('ABSPATH') || exit;

global $product;
if (empty($product) || !$product->is_visible()) return;
?>
<li <?php wc_product_class('product-card', $product); ?>>
    <a href="<?php the_permalink(); ?>" class="product-card__link">
        <div class="product-card__image">
            <?php echo $product->get_image('woocommerce_thumbnail'); ?>
            <?php if ($product->is_on_sale()) : ?>
                <span class="product-card__badge">Sale</span>
            <?php endif; ?>
        </div>
        <h3 class="product-card__title"><?php the_title(); ?></h3>
        <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
    </a>
    <?php woocommerce_template_loop_add_to_cart(); ?>
</li>
```

## What NOT to override

Avoid overriding these unless you have a strong reason — they have lots of internal logic that Woo updates frequently:

- `cart/cart.php` — cart table
- `checkout/form-checkout.php` — checkout form
- `myaccount/*.php` — my account pages
- `single-product/add-to-cart/variable.php` — variation selector

Overriding these creates a maintenance burden. When Woo releases a new version, your override may miss new features or break. Style them with CSS instead whenever possible.

## Required `add_theme_support` calls

Without these, Woo will display an "incompatible theme" warning in the admin:

```php
add_theme_support('woocommerce');
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');
```

Place these inside an `after_setup_theme` callback in `inc/theme-setup.php`.

## Testing the override

After placing files in `woocommerce/`, no flush or activation is needed. Reload the shop page and the override takes effect immediately. If it doesn't:
- Check the file path exactly matches the plugin's path (case-sensitive)
- Check the theme is the active theme, not a parent of a child theme
- Clear any caching plugins

## Sidebar implementation

The shop sidebar is `sidebar-shop.php` at the theme root. It's loaded by `archive-product.php` via `get_sidebar('shop')`. Recommended content:

```php
<?php
$categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'parent'     => 0, // top-level only
]);
?>
<div class="shop-sidebar__widget">
    <h3 class="shop-sidebar__title"><?php esc_html_e('Categories', 'mytheme'); ?></h3>
    <ul class="shop-sidebar__categories">
        <?php foreach ($categories as $cat) : ?>
            <li>
                <a href="<?php echo esc_url(get_term_link($cat)); ?>">
                    <?php echo esc_html($cat->name); ?>
                    <span class="shop-sidebar__count">(<?php echo (int) $cat->count; ?>)</span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="shop-sidebar__widget">
    <h3 class="shop-sidebar__title"><?php esc_html_e('Price Range', 'mytheme'); ?></h3>
    <?php echo do_shortcode('[woocommerce_price_filter]'); ?>
</div>
```

The `[woocommerce_price_filter]` shortcode is a built-in Woo shortcode that renders a working price slider — no custom code needed.

# Hardcoded Menu Pattern

This reference describes how to render the main navigation menu from a PHP array, without using `wp_nav_menu()` or storing menu items in the database.

## Why hardcode the menu

Standard WordPress themes use `wp_nav_menu()`, which requires the admin to:
1. Go to Appearance → Menus
2. Create a new menu
3. Add items to it
4. Assign it to a theme location

For an "install and run" theme, this is too much friction. Hardcoding lets the menu work immediately on activation, with the same structure on every install.

The trade-off: the admin cannot edit the menu through wp-admin. For this theme, that's intentional.

## The data structure

Menu items are PHP arrays:

```php
[
    'title'    => 'Shop',
    'url'      => home_url('/shop/'),
    'children' => [], // optional, for dropdowns
]
```

Always build URLs with `home_url()` so they work regardless of the site's domain or whether it's installed in a subdirectory.

## Implementation

```php
// inc/menu.php

/**
 * Defines the main menu structure.
 * Edit this array to change the menu without touching markup.
 */
function mytheme_main_menu_items() {
    return [
        [
            'title' => __('Home', 'mytheme'),
            'url'   => home_url('/'),
        ],
        [
            'title' => __('Shop', 'mytheme'),
            'url'   => home_url('/shop/'),
        ],
        [
            'title'    => __('Information', 'mytheme'),
            'url'      => '#',
            'children' => [
                ['title' => __('About Us',          'mytheme'), 'url' => home_url('/about-us/')],
                ['title' => __('FAQ',               'mytheme'), 'url' => home_url('/faq/')],
                ['title' => __('Shipping & Returns','mytheme'), 'url' => home_url('/shipping-returns/')],
                ['title' => __('Terms & Conditions','mytheme'), 'url' => home_url('/terms-conditions/')],
                ['title' => __('Privacy Policy',    'mytheme'), 'url' => home_url('/privacy-policy/')],
            ],
        ],
        [
            'title' => __('Track My Order', 'mytheme'),
            'url'   => home_url('/track-my-order/'),
        ],
        [
            'title' => __('Wishlist', 'mytheme'),
            'url'   => home_url('/wishlist/'),
        ],
        [
            'title' => __('Support', 'mytheme'),
            'url'   => home_url('/support/'),
        ],
        [
            'title' => __('Contact Us', 'mytheme'),
            'url'   => home_url('/contact-us/'),
        ],
        [
            'title' => __('My Account', 'mytheme'),
            'url'   => home_url('/my-account/'),
        ],
    ];
}

/**
 * Renders the main menu as a nested <ul>.
 */
function mytheme_render_main_menu() {
    $items = mytheme_main_menu_items();
    if (empty($items)) {
        return;
    }
    ?>
    <nav class="main-nav" aria-label="<?php esc_attr_e('Main Menu', 'mytheme'); ?>">
        <ul class="main-menu">
            <?php foreach ($items as $item) :
                $has_children = !empty($item['children']);
                $is_current   = mytheme_is_current_url($item['url']);
                $classes      = ['menu-item'];
                if ($has_children) $classes[] = 'menu-item--has-children';
                if ($is_current)   $classes[] = 'menu-item--current';
                ?>
                <li class="<?php echo esc_attr(implode(' ', $classes)); ?>">
                    <a href="<?php echo esc_url($item['url']); ?>"
                       <?php if ($is_current) echo 'aria-current="page"'; ?>>
                        <?php echo esc_html($item['title']); ?>
                    </a>
                    <?php if ($has_children) : ?>
                        <ul class="submenu">
                            <?php foreach ($item['children'] as $child) :
                                $child_current = mytheme_is_current_url($child['url']); ?>
                                <li class="menu-item <?php echo $child_current ? 'menu-item--current' : ''; ?>">
                                    <a href="<?php echo esc_url($child['url']); ?>"
                                       <?php if ($child_current) echo 'aria-current="page"'; ?>>
                                        <?php echo esc_html($child['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php
}

/**
 * Determines if the given URL matches the current request.
 */
function mytheme_is_current_url($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $target  = trim(parse_url($url, PHP_URL_PATH), '/');
    if ($current === '' && $target === '') return true; // home
    return $current !== '' && $current === $target;
}
```

In `header.php`, just call:

```php
<?php mytheme_render_main_menu(); ?>
```

## Mobile menu toggle

Add a hamburger button in `header.php`:

```html
<button class="menu-toggle" aria-expanded="false" aria-controls="main-menu">
    <span class="screen-reader-text">Menu</span>
    <span class="hamburger"></span>
</button>
```

And in `assets/js/main.js`:

```javascript
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.main-nav');
    if (!toggle || !menu) return;

    toggle.addEventListener('click', () => {
        const expanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', !expanded);
        menu.classList.toggle('is-open');
    });
});
```

## Cart count in the menu

To show the cart count next to the My Account or Cart link, use Woo's helper:

```php
[
    'title' => __('Cart', 'mytheme') . ' (' . WC()->cart->get_cart_contents_count() . ')',
    'url'   => wc_get_cart_url(),
],
```

For this to update without a full page reload, add Woo's fragments support — but that's beyond the basic scope. A simple page reload after add-to-cart is acceptable for a hardcoded theme.

## Internationalization

Wrap all menu titles in `__('...', 'mytheme')` so the menu can be translated via `.po`/`.mo` files even though it's hardcoded. The user can replace the text directly if they don't need translations.

## Adding new menu items later

To add or remove items, edit the array in `inc/menu.php`. No database changes, no admin clicks. The change ships with the next theme update.

## Why not `wp_nav_menu()` with a fallback?

You COULD register a menu location and provide a fallback that renders the hardcoded menu when no menu is assigned. This gives the admin the OPTION to override:

```php
wp_nav_menu([
    'theme_location' => 'main',
    'fallback_cb'    => 'mytheme_render_main_menu',
]);
```

This is a more flexible pattern, but it violates the "install and forget" requirement for this skill — the moment the admin creates a menu in wp-admin, the hardcoded menu disappears, and they may not know why. For a true hardcoded theme, render the static menu directly without `wp_nav_menu()`.

## Footer menu

The same pattern works for footer columns. Define `mytheme_footer_columns()` in `inc/menu.php` returning multiple columns of links:

```php
function mytheme_footer_columns() {
    return [
        [
            'title' => 'Information',
            'links' => [
                ['title' => 'About Us', 'url' => home_url('/about-us/')],
                ['title' => 'FAQ',      'url' => home_url('/faq/')],
            ],
        ],
        [
            'title' => 'Customer Service',
            'links' => [
                ['title' => 'Contact Us',     'url' => home_url('/contact-us/')],
                ['title' => 'Shipping & Returns', 'url' => home_url('/shipping-returns/')],
                ['title' => 'Track My Order', 'url' => home_url('/track-my-order/')],
            ],
        ],
        // ...
    ];
}
```

And render in `footer.php` with a similar foreach loop.