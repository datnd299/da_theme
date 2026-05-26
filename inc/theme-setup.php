<?php
add_action('after_setup_theme', 'dawp_setup');
add_filter('woocommerce_order_number', 'dawp_woocommerce_order_prefix', 10, 2);

if (!function_exists('dawp_woocommerce_order_prefix')) {
function dawp_woocommerce_order_prefix($order_id, $order) {
    return 'SLK-' . $order_id;
}
}

if (!function_exists('dawp_setup')) {
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
}

add_action('wp_head', 'dawp_favicon', 1);
add_action('admin_head', 'dawp_favicon', 1);
add_action('login_head', 'dawp_favicon', 1);
if (!function_exists('dawp_favicon')) {
function dawp_favicon() {
    $favicon_url = get_template_directory_uri() . '/assets/img/image.png';
    ?>
    <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo esc_url($favicon_url); ?>">
    <?php
}
}

add_action('template_redirect', 'redirect_search_to_product');
if (!function_exists('redirect_search_to_product')) {
function redirect_search_to_product() {
    // Chỉ xử lý khi là trang search và chưa có post_type
    if (is_search() && !isset($_GET['post_type'])) {
        wp_safe_redirect(
            add_query_arg('post_type', 'product', $_SERVER['REQUEST_URI'])
        );
        exit;
    }
}
}

add_filter('template_include', 'theme_search_template');
if (!function_exists('theme_search_template')) {
function theme_search_template($template) {
    if (is_search() && get_query_var('post_type') === 'product') {
        $new_template = locate_template(array('woocommerce/archive-product.php'));
        if ($new_template) {
            return $new_template;
        }
    }
    return $template;
}
}

if (!function_exists('dawp_hidden_product_category_slugs')) {
function dawp_hidden_product_category_slugs() {
    return ['mens-shoes'];
}
}

add_filter('get_terms', 'dawp_hide_removed_product_categories', 10, 4);
if (!function_exists('dawp_hide_removed_product_categories')) {
function dawp_hide_removed_product_categories($terms, $taxonomies, $args, $term_query) {
    if (is_wp_error($terms) || !in_array('product_cat', (array) $taxonomies, true)) {
        return $terms;
    }

    $hidden_slugs = dawp_hidden_product_category_slugs();

    return array_values(array_filter((array) $terms, function ($term) use ($hidden_slugs) {
        return !is_object($term) || empty($term->slug) || !in_array($term->slug, $hidden_slugs, true);
    }));
}
}

add_action('template_redirect', 'dawp_redirect_removed_product_categories');
if (!function_exists('dawp_redirect_removed_product_categories')) {
function dawp_redirect_removed_product_categories() {
    if (!function_exists('is_product_category') || !is_product_category()) {
        return;
    }

    $term = get_queried_object();
    if ($term && !empty($term->slug) && in_array($term->slug, dawp_hidden_product_category_slugs(), true)) {
        wp_safe_redirect(get_permalink(wc_get_page_id('shop')));
        exit;
    }
}
}

add_action('wp_enqueue_scripts', 'dawp_scripts');
if (!function_exists('dawp_scripts')) {
function dawp_scripts() {
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.2');

    wp_enqueue_style('dawp-tw-main', get_template_directory_uri() . '/assets/css/tw/tw-main.css', [], '1.0.2');

    if ( is_front_page() ) {
        wp_enqueue_style('dawp-home', get_template_directory_uri() . '/assets/css/tw/tw-home.css', [], '1.0.2');
        dawp_remove_styles();
    }

    if ( is_404() ) {
        wp_enqueue_style('dawp-404', get_template_directory_uri() . '/assets/css/tw/tw-404.css', [], '1.0.2');
    }
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_product() ) {
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], '1.0.2');
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], '1.0.2');
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            wp_enqueue_style('dawp-checkout', get_template_directory_uri() . '/assets/css/checkout.css', [], '1.0.4');
        } elseif ( is_account_page() ) {
            wp_enqueue_style('dawp-account', get_template_directory_uri() . '/assets/css/account.css', [], '1.0.5');
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], '1.0.2');
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.2', true);

    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');

    if ('contact-us' === $request_uri) {
        wp_localize_script(
            'dawp-main',
            'dawpContactForm',
            [
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('dawp_contact_form'),
            ]
        );
    }
}
}

if (!function_exists('dawp_remove_styles')) {
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
}
