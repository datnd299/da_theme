<?php
add_action('after_setup_theme', 'dawp_setup');
add_filter('woocommerce_order_number', 'custom_woocommerce_order_prefix', 10, 2);

function custom_woocommerce_order_prefix($order_id, $order) {
    return dawp_store_fact('order_prefix') . $order_id;
}

// Order tracking form: accept "MZT-1234", "mzt1234" or "1234".
add_filter('woocommerce_shortcode_order_tracking_order_id', 'dawp_strip_order_prefix');
function dawp_strip_order_prefix($order_id) {
    return preg_replace('/^\s*' . preg_quote(rtrim(dawp_store_fact('order_prefix'), '-'), '/') . '-?/i', '', (string) $order_id);
}
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('wp_head', 'dawp_site_favicon', 1);
function dawp_site_favicon() {
    $favicon_url = get_template_directory_uri() . '/assets/img/favicon.svg';
    ?>
    <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/svg+xml" sizes="any">
    <link rel="shortcut icon" href="<?php echo esc_url($favicon_url); ?>" type="image/svg+xml">
    <?php
}

add_action('template_redirect', 'redirect_search_to_product');
function redirect_search_to_product() {
    // Chỉ xử lý khi là trang search và chưa có post_type
    if (is_search() && !isset($_GET['post_type'])) {
        wp_safe_redirect(
            add_query_arg('post_type', 'product', $_SERVER['REQUEST_URI'])
        );
        exit;
    }
}
add_filter('template_include', 'theme_search_template');
function theme_search_template($template) {
    if (is_search() && get_query_var('post_type') === 'product') {
        $new_template = locate_template(array('woocommerce/archive-product.php'));
        if ($new_template) {
            return $new_template;
        }
    }
    return $template;
}

add_action('wp_enqueue_scripts', 'dawp_scripts');
function dawp_scripts() {
    $ver = static function ($file) {
        $path = get_template_directory() . '/assets/' . $file;
        return file_exists($path) ? (string) filemtime($path) : '1.0.0';
    };
    $css = static function ($handle, $file, $deps = []) use ($ver) {
        wp_enqueue_style($handle, get_template_directory_uri() . '/assets/css/' . $file, $deps, $ver('css/' . $file));
    };

    $css('dawp-main', 'main.css');
    $css('dawp-tw-main', 'tw/tw-main.css', ['dawp-main']);

    if (is_404()) {
        $css('dawp-404', 'tw/tw-404.css', ['dawp-tw-main']);
    }

    if (is_front_page()) {
        dawp_remove_styles();
    }

    if (class_exists('WooCommerce')) {
        $is_product_search = is_search() && get_query_var('post_type') === 'product';

        if (function_exists('is_account_page') && is_account_page()) {
            $css('dawp-account', 'account.css', ['dawp-main']);
            dawp_remove_styles();
        } elseif (is_product()) {
            $css('dawp-product', 'product.css', ['dawp-main']);
            dawp_remove_styles();
        } elseif (is_cart()) {
            $css('dawp-cart', 'cart.css', ['dawp-main']);
            dawp_remove_styles();
        } elseif (is_checkout()) {
            $css('dawp-checkout', 'checkout.css', ['dawp-main']);
        } elseif (is_woocommerce() || $is_product_search) {
            $css('dawp-shop', 'shop.css', ['dawp-main']);
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], $ver('js/main.js'), true);
    wp_localize_script('dawp-main', 'dawpAjax', [
        'url'          => admin_url('admin-ajax.php'),
        'nonce'        => wp_create_nonce('dawp_newsletter_nonce'),
        'contactNonce' => wp_create_nonce('dawp_contact_nonce'),
    ]);
}

function dawp_remove_styles() {
    wp_dequeue_style( 'wc-blocks-style' );
    // wp_dequeue_style( 'photoswipe-default-skin' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-vendors-style' );
    wp_dequeue_style( 'wc-block-style' );
    wp_dequeue_style( 'wc-blocks-packages-style' );

    wp_deregister_style( 'wc-blocks-style' );
    wp_deregister_style( 'wc-blocks-vendors-style' );
    wp_deregister_style( 'wc-block-style' );
    wp_deregister_style( 'wc-blocks-packages-style' );

    wp_dequeue_style( 'wc-blocks-cart-block-style' );
    wp_deregister_style( 'wc-blocks-cart-block-style' );
    
    // Một số version dùng handle khác:
    wp_dequeue_style( 'wc-blocks-style-cart' );
    wp_deregister_style( 'wc-blocks-style-cart' );
    global $wp_styles;
    
    if ( ! is_object( $wp_styles ) ) return;
    $blocked_files = array(
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
    );
    
    foreach ( $wp_styles->registered as $handle => $style ) {
        foreach ( $blocked_files as $file ) {
            if ( strpos( $style->src, $file ) !== false ) {
                wp_dequeue_style( $handle );
                wp_deregister_style( $handle );
            }
        }
    }
}
