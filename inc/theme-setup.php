<?php
/**
 * Theme setup, asset loading, and small platform tweaks.
 */

defined('ABSPATH') || exit;

add_action('after_setup_theme', 'dawp_setup');
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
}

add_filter('woocommerce_order_number', 'dawp_woocommerce_order_prefix', 10, 2);
function dawp_woocommerce_order_prefix($order_id, $order) {
    return 'CHR-' . $order_id;
}

/**
 * Cache-busting version for a theme-relative asset.
 */
function dawp_asset_version($relative_path) {
    $path = get_template_directory() . '/' . ltrim($relative_path, '/');

    return file_exists($path) ? (string) filemtime($path) : '1.0.0';
}

function dawp_asset_uri($relative_path) {
    return get_template_directory_uri() . '/' . ltrim($relative_path, '/');
}

add_action('wp_head', 'dawp_site_favicon', 1);
function dawp_site_favicon() {
    $favicon_url = dawp_asset_uri('assets/img/favicon.svg');
    ?>
    <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/svg+xml" sizes="any">
    <link rel="shortcut icon" href="<?php echo esc_url($favicon_url); ?>" type="image/svg+xml">
    <meta name="theme-color" content="#14140F">
    <?php
}

add_action('template_redirect', 'dawp_redirect_search_to_product');
function dawp_redirect_search_to_product() {
    if (is_search() && !isset($_GET['post_type'])) {
        wp_safe_redirect(add_query_arg('post_type', 'product', $_SERVER['REQUEST_URI']));
        exit;
    }
}

add_filter('template_include', 'dawp_search_template');
function dawp_search_template($template) {
    if (is_search() && get_query_var('post_type') === 'product') {
        $new_template = locate_template(['woocommerce/archive-product.php']);

        if ($new_template) {
            return $new_template;
        }
    }

    return $template;
}

add_action('wp_enqueue_scripts', 'dawp_scripts');
function dawp_scripts() {
    // Typography — Cormorant Garamond (display serif) + Jost (UI sans).
    wp_enqueue_style(
        'dawp-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500&family=Jost:wght@300;400;500&display=swap',
        [],
        null
    );

    // main.css holds the tokens and shared components; tw-main.css is the single
    // Tailwind bundle for every page (see scripts/build-tw.js for why it is one file).
    wp_enqueue_style('dawp-main', dawp_asset_uri('assets/css/main.css'), ['dawp-fonts'], dawp_asset_version('assets/css/main.css'));
    wp_enqueue_style('dawp-tw-main', dawp_asset_uri('assets/css/tw/tw-main.css'), ['dawp-main'], dawp_asset_version('assets/css/tw/tw-main.css'));

    if (is_front_page()) {
        wp_enqueue_style('dawp-home', dawp_asset_uri('assets/css/home.css'), ['dawp-tw-main'], dawp_asset_version('assets/css/home.css'));
        dawp_remove_block_styles();
    }

    if (class_exists('WooCommerce')) {
        $woo_sheets = [];

        if (function_exists('is_account_page') && is_account_page()) {
            $woo_sheets[] = 'account.css';
        } elseif (is_product()) {
            $woo_sheets[] = 'product.css';
        } elseif (is_cart()) {
            $woo_sheets[] = 'cart.css';
        } elseif (is_checkout()) {
            $woo_sheets[] = 'checkout.css';
        } elseif (is_woocommerce()) {
            $woo_sheets[] = 'shop.css';
        }

        foreach ($woo_sheets as $sheet) {
            wp_enqueue_style(
                'dawp-' . basename($sheet, '.css'),
                dawp_asset_uri('assets/css/' . $sheet),
                ['dawp-main'],
                dawp_asset_version('assets/css/' . $sheet)
            );
        }

        if ($woo_sheets) {
            dawp_remove_block_styles();
        }
    }

    wp_enqueue_script('dawp-main', dawp_asset_uri('assets/js/main.js'), [], dawp_asset_version('assets/js/main.js'), true);
    wp_localize_script('dawp-main', 'dawpAjax', [
        'url'          => admin_url('admin-ajax.php'),
        'nonce'        => wp_create_nonce('dawp_newsletter_nonce'),
        'contactNonce' => wp_create_nonce('dawp_contact_nonce'),
        // Side cart — wc-ajax endpoints run on the front end, where the cart exists.
        'wcAjaxUrl'    => class_exists('WC_AJAX') ? WC_AJAX::get_endpoint('%%endpoint%%') : '',
        'cartNonce'    => wp_create_nonce('dawp_cart_nonce'),
    ]);
}

add_action('wp_head', 'dawp_preconnect_fonts', 0);
function dawp_preconnect_fonts() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
}

/**
 * WooCommerce block stylesheets fight the theme's own CSS on pages we fully control.
 */
function dawp_remove_block_styles() {
    $handles = [
        'wc-blocks-style',
        'wc-blocks-vendors-style',
        'wc-block-style',
        'wc-blocks-packages-style',
        'wc-blocks-cart-block-style',
        'wc-blocks-style-cart',
    ];

    foreach ($handles as $handle) {
        wp_dequeue_style($handle);
        wp_deregister_style($handle);
    }

    global $wp_styles;

    if (!is_object($wp_styles)) {
        return;
    }

    $blocked_files = [
        '/blocks/cart.css',
        '/blocks/checkout.css',
        '/blocks/all-products.css',
        '/blocks/mini-cart.css',
        '/blocks/active-filters.css',
        '/blocks/price-filter.css',
        '/blocks/attribute-filter.css',
        '/blocks/stock-filter.css',
        '/blocks/rating-filter.css',
        '/blocks/featured-product.css',
        '/blocks/featured-category.css',
        '/blocks/product-categories.css',
        '/blocks/reviews.css',
    ];

    foreach ($wp_styles->registered as $handle => $style) {
        foreach ($blocked_files as $file) {
            if (!empty($style->src) && strpos($style->src, $file) !== false) {
                wp_dequeue_style($handle);
                wp_deregister_style($handle);
            }
        }
    }
}
