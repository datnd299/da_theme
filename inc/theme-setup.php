<?php
add_action('after_setup_theme', 'dawp_setup');
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('widgets_init', 'dawp_register_sidebars');
function dawp_register_sidebars() {
    register_sidebar([
        'name'          => __('Shop Sidebar', 'dawp'),
        'id'            => 'shop-sidebar',
        'description'   => __('Optional filters shown under the main product categories on shop archives.', 'dawp'),
        'before_widget' => '<div id="%1$s" class="shop-sidebar__widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="shop-sidebar__title">',
        'after_title'   => '</h3>',
    ]);
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
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.2');

    wp_enqueue_style('dawp-tw-main', get_template_directory_uri() . '/assets/css/tw/tw-main.css', [], '1.0.2');

    if ( is_front_page() ) {
        $home_css = get_template_directory() . '/assets/css/tw/tw-home.css';
        wp_enqueue_style(
            'dawp-home',
            get_template_directory_uri() . '/assets/css/tw/tw-home.css',
            [],
            file_exists($home_css) ? filemtime($home_css) : '1.0.2'
        );
        dawp_remove_styles();
    }
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_product() ) {
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], '1.0.2');
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], '1.0.3');
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            $checkout_css = get_template_directory() . '/assets/css/checkout.css';
            wp_enqueue_style(
                'dawp-checkout',
                get_template_directory_uri() . '/assets/css/checkout.css',
                [],
                file_exists($checkout_css) ? filemtime($checkout_css) : '1.0.5'
            );
        } elseif ( function_exists('is_account_page') && is_account_page() ) {
            $account_css = get_template_directory() . '/assets/css/account.css';
            wp_enqueue_style(
                'dawp-account',
                get_template_directory_uri() . '/assets/css/account.css',
                ['dawp-main'],
                file_exists($account_css) ? filemtime($account_css) : '1.0.0'
            );
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], '1.0.4');
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
