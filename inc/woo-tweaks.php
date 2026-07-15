<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Trust badges banner under the Add to Cart button
add_action('woocommerce_after_add_to_cart_form', 'da_theme_trust_badges_banner');
function da_theme_trust_badges_banner() {
    ?>
    <div class="trust-badges-banner">
        <div class="trust-badge">
            <svg class="trust-badge__icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M1 7h13v9H1z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                <path d="M14 10h4l4 3.5V16h-8z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                <circle cx="6" cy="18" r="1.8" stroke="currentColor" stroke-width="1.6"/>
                <circle cx="17.5" cy="18" r="1.8" stroke="currentColor" stroke-width="1.6"/>
            </svg>
            <span>Free Shipping</span>
        </div>
        <div class="trust-badge">
            <svg class="trust-badge__icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M12 2l7 3.2v5.4c0 4.7-3 8.9-7 10.4-4-1.5-7-5.7-7-10.4V5.2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Secure checkout</span>
        </div>
    </div>
    <?php
}

// Free shipping banner on the Cart page (block-based cart)
add_filter('render_block_woocommerce/cart', 'da_theme_cart_free_shipping_banner', 10, 2);
function da_theme_cart_free_shipping_banner($block_content, $block) {
    if (!function_exists('WC') || !WC()->cart) {
        return $block_content;
    }

    ob_start();
    ?>
    <div class="free-shipping-banner" role="status">
        <svg class="free-shipping-banner__icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M1 7h13v9H1z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
            <path d="M14 10h4l4 3.5V16h-8z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
            <circle cx="6" cy="18" r="1.8" stroke="currentColor" stroke-width="1.6"/>
            <circle cx="17.5" cy="18" r="1.8" stroke="currentColor" stroke-width="1.6"/>
        </svg>
        <p class="free-shipping-banner__message">Free Shipping</p>
    </div>
    <?php
    $banner = ob_get_clean();

    return $banner . $block_content;
}
