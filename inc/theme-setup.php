<?php
add_action('after_setup_theme', 'dawp_setup');
add_filter('woocommerce_order_number', 'custom_woocommerce_order_prefix', 10, 2);
add_filter('woocommerce_shortcode_order_tracking_order_id', 'dawp_normalize_tracking_order_number', 9);

function custom_woocommerce_order_prefix($order_id, $order) {
    return 'SO-' . $order_id;
}

function dawp_normalize_tracking_order_number($order_id) {
    $order_id = trim((string) $order_id);

    if (preg_match('/^(SO|SLK)[-\s#]*(\d+)$/i', $order_id, $matches)) {
        return $matches[2];
    }

    return $order_id;
}

function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_filter('document_title_parts', 'dawp_brand_document_title_parts', 20);
function dawp_brand_document_title_parts($parts) {
    $brand_name = 'Scott Osterbind';
    $brand_slogan = 'Handmade Jewelry & Vintage-Inspired Accessories';

    if (is_front_page() || is_home()) {
        $parts['title'] = $brand_name . ' - ' . $brand_slogan;
        unset($parts['site'], $parts['tagline']);

        return $parts;
    }

    $parts['site'] = $brand_name;
    unset($parts['tagline']);

    return $parts;
}

add_action('wp_head', 'dawp_favicon_links', 100);
add_action('login_head', 'dawp_favicon_links', 100);
function dawp_favicon_links() {
    $favicon_32 = get_theme_file_uri('/assets/img/favicon-scott-32.png');
    $favicon_512 = get_theme_file_uri('/assets/img/favicon-scott.png');
    $apple_touch_icon = get_theme_file_uri('/assets/img/apple-touch-icon-scott.png');
    ?>
    <link rel="icon" href="<?php echo esc_url($favicon_32); ?>" sizes="32x32" type="image/png">
    <link rel="icon" href="<?php echo esc_url($favicon_512); ?>" sizes="512x512" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo esc_url($apple_touch_icon); ?>">
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
    wp_enqueue_style('dawp-tw-main', get_template_directory_uri() . '/assets/css/tw/tw-main.css', [], '1.0.2');
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', ['dawp-tw-main'], '1.0.6');

    if ( is_front_page() ) {
        wp_enqueue_style('dawp-home', get_template_directory_uri() . '/assets/css/tw/tw-home.css', [], '1.0.2');
        dawp_remove_styles();
    }

    if ( is_404() ) {
        wp_enqueue_style('dawp-404', get_template_directory_uri() . '/assets/css/tw/tw-404.css', ['dawp-tw-main'], '1.0.3');
    }
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_product() ) {
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], '1.0.3');
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], '1.0.5');
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            wp_enqueue_style('dawp-checkout', get_template_directory_uri() . '/assets/css/checkout.css', [], '1.0.10');
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], '1.0.6');
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.2', true);

    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
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
