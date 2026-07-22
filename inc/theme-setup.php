<?php
add_action('after_setup_theme', 'dawp_setup');
add_filter('woocommerce_order_number', 'custom_woocommerce_order_prefix', 10, 2);

function custom_woocommerce_order_prefix($order_id, $order) {
    return 'TC-' . $order_id;
}
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
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
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.6');

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
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], '1.0.6');
            dawp_remove_styles();
        } elseif ( is_account_page() ) {
            wp_enqueue_style('dawp-account', get_template_directory_uri() . '/assets/css/account.css', [], '1.0.6');
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], '1.0.7');
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            wp_enqueue_style('dawp-checkout', get_template_directory_uri() . '/assets/css/checkout.css', [], '1.0.7');
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], '1.0.6');
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.3', true);
    wp_localize_script('dawp-main', 'dawpAjax', [
        'url'          => admin_url('admin-ajax.php'),
        'nonce'        => wp_create_nonce('dawp_newsletter_nonce'),
        'contactNonce' => wp_create_nonce('dawp_contact_nonce'),
    ]);
}

add_filter('the_content', 'dawp_append_cart_policy_snapshot', 20);
function dawp_append_cart_policy_snapshot($content) {
    if (!function_exists('is_cart') || !is_cart() || !in_the_loop() || !is_main_query()) {
        return $content;
    }

    return $content . dawp_render_cart_policy_snapshot();
}

function dawp_render_cart_policy_snapshot() {
    $cart_policy_items = [
        [
            'label'  => __('Shipping Cost', 'dawp'),
            'value'  => __('Free', 'dawp'),
            'detail' => __('Standard U.S. shipping is free for all orders nationwide.', 'dawp'),
            'url'    => home_url('/shipping-policy/'),
        ],
        [
            'label'  => __('Handling Time', 'dawp'),
            'value'  => __('1-3 Business Days', 'dawp'),
            'detail' => __('Orders placed after the 5:00 PM PST cutoff begin processing the next business day.', 'dawp'),
            'url'    => home_url('/shipping-policy/#processing-delivery'),
        ],
        [
            'label'  => __('Transit Estimate', 'dawp'),
            'value'  => __('5-7 Business Days', 'dawp'),
            'detail' => __('Estimated total delivery time is 6-10 business days from purchase.', 'dawp'),
            'url'    => home_url('/shipping-policy/#processing-delivery'),
        ],
        [
            'label'  => __('Return Window', 'dawp'),
            'value'  => __('30 Days', 'dawp'),
            'detail' => __('Eligible unused items may be returned after approval.', 'dawp'),
            'url'    => home_url('/refund-return-policy/'),
        ],
        [
            'label'  => __('Tracking', 'dawp'),
            'value'  => __('Included', 'dawp'),
            'detail' => __('Tracking details are emailed once your order ships.', 'dawp'),
            'url'    => home_url('/track-order/'),
        ],
        [
            'label'  => __('Support', 'dawp'),
            'value'  => __('Mon-Fri', 'dawp'),
            'detail' => __('Email support with order, product, delivery, or return questions.', 'dawp'),
            'url'    => home_url('/contact-us/'),
        ],
    ];

    ob_start();
    ?>
    <section class="cart-policy-snapshot" aria-labelledby="cart-policy-snapshot-heading">
        <div class="cart-policy-snapshot__inner">
            <div class="cart-policy-snapshot__header">
                <span class="cart-policy-snapshot__eyebrow"><?php esc_html_e('Order Confidence', 'dawp'); ?></span>
                <h2 id="cart-policy-snapshot-heading"><?php esc_html_e('Policy snapshot before checkout', 'dawp'); ?></h2>
                <p><?php esc_html_e('Review the key shipping, tracking, return, and support details that apply to Shopmivo orders.', 'dawp'); ?></p>
            </div>

            <div class="cart-policy-snapshot__grid">
                <?php foreach ($cart_policy_items as $policy_item) : ?>
                    <a class="cart-policy-snapshot__item" href="<?php echo esc_url($policy_item['url']); ?>">
                        <span class="cart-policy-snapshot__label"><?php echo esc_html($policy_item['label']); ?></span>
                        <strong><?php echo esc_html($policy_item['value']); ?></strong>
                        <span class="cart-policy-snapshot__detail"><?php echo esc_html($policy_item['detail']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php

    return ob_get_clean();
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
