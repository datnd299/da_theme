<?php
add_action('after_setup_theme', 'dawp_setup');
add_filter('woocommerce_order_number', 'custom_woocommerce_order_prefix', 10, 2);
add_action('wp_head', 'dawp_logo_favicon', 99);
add_action('login_head', 'dawp_logo_favicon', 99);
add_action('admin_head', 'dawp_logo_favicon', 99);

function custom_woocommerce_order_prefix($order_id, $order) {
    return 'SK-' . $order_id;
}
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    remove_action('wp_head', 'wp_site_icon', 99);
    remove_action('login_head', 'wp_site_icon', 99);
    remove_action('admin_head', 'wp_site_icon', 99);
}

function dawp_logo_favicon() {
    $favicon_path = get_template_directory() . '/assets/img/gallery/logo.png';
    $favicon_url = function_exists('dawp_theme_image_url')
        ? dawp_theme_image_url('assets/img/gallery/logo.png', 192, 192, 'fit')
        : get_template_directory_uri() . '/assets/img/gallery/logo.png';

    if (file_exists($favicon_path) && !function_exists('dawp_theme_image_url')) {
        $favicon_url = add_query_arg('v', filemtime($favicon_path), $favicon_url);
    }
    ?>
    <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/png">
    <link rel="shortcut icon" href="<?php echo esc_url($favicon_url); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo esc_url($favicon_url); ?>">
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

function dawp_asset_version($relative_path, $fallback = '1.0.0') {
    $file_path = get_template_directory() . '/' . ltrim($relative_path, '/');
    return file_exists($file_path) ? filemtime($file_path) : $fallback;
}

add_action('wp_enqueue_scripts', 'dawp_scripts');
function dawp_scripts() {
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', [], dawp_asset_version('assets/css/main.css'));

    wp_enqueue_style('dawp-tw-main', get_template_directory_uri() . '/assets/css/tw/tw-main.css', [], dawp_asset_version('assets/css/tw/tw-main.css'));

    if ( is_front_page() ) {
        wp_enqueue_style('dawp-home', get_template_directory_uri() . '/assets/css/tw/tw-home.css', [], dawp_asset_version('assets/css/tw/tw-home.css'));
        dawp_remove_styles();
    }

    if ( is_404() ) {
        wp_enqueue_style('dawp-404', get_template_directory_uri() . '/assets/css/tw/tw-404.css', [], dawp_asset_version('assets/css/tw/tw-404.css'));
    }
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_product() ) {
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], dawp_asset_version('assets/css/product.css'));
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], dawp_asset_version('assets/css/cart.css'));
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            wp_enqueue_style('dawp-checkout', get_template_directory_uri() . '/assets/css/checkout.css', [], dawp_asset_version('assets/css/checkout.css'));
            dawp_remove_styles();
        } elseif ( is_account_page() ) {
            wp_enqueue_style('dawp-account', get_template_directory_uri() . '/assets/css/account.css', [], dawp_asset_version('assets/css/account.css'));
            dawp_remove_styles();
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], dawp_asset_version('assets/css/shop.css'));
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], dawp_asset_version('assets/js/main.js'), true);

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
