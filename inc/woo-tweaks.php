<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Category badge above the product title (single product)
add_action('woocommerce_single_product_summary', 'da_theme_product_eyebrow', 4);
function da_theme_product_eyebrow() {
    global $product;
    if (!($product instanceof WC_Product)) {
        return;
    }
    $terms = get_the_terms($product->get_id(), 'product_cat');
    $term  = ($terms && !is_wp_error($terms)) ? reset($terms) : null;
    ?>
    <div class="product-eyebrow">
        <?php if ($term) : ?>
            <a class="product-eyebrow__cat" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
        <?php endif; ?>
        <span class="product-eyebrow__tag"><?php esc_html_e('Printed to order', 'dawp'); ?></span>
    </div>
    <?php
}

// Trust badges + delivery/returns info under the Add to Cart button
add_action('woocommerce_after_add_to_cart_form', 'da_theme_trust_badges_banner');
function da_theme_trust_badges_banner() {
    $badges = [
        [
            'title' => __('Free US shipping', 'dawp'),
            'copy'  => __('On orders $49+ · tracked', 'dawp'),
            'icon'  => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        ],
        [
            'title' => __('30-day returns', 'dawp'),
            'copy'  => __('Damaged or wrong? Replaced free', 'dawp'),
            'icon'  => '<path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/>',
        ],
        [
            'title' => __('Secure checkout', 'dawp'),
            'copy'  => __('SSL · Visa, Mastercard, Amex, PayPal', 'dawp'),
            'icon'  => '<rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>',
        ],
    ];
    ?>
    <div class="trust-badges-banner">
        <?php foreach ($badges as $badge) : ?>
            <div class="trust-badge">
                <svg class="trust-badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $badge['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
                <span><strong><?php echo esc_html($badge['title']); ?></strong><?php echo esc_html($badge['copy']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="product-info-accordion">
        <details open>
            <summary><?php esc_html_e('Production & delivery', 'dawp'); ?></summary>
            <ul>
                <li><?php esc_html_e('Printed to order and quality-checked in 3–5 business days.', 'dawp'); ?></li>
                <li><?php esc_html_e('US delivery in 4–8 business days after dispatch, with tracking. We ship to all 50 states.', 'dawp'); ?></li>
                <li><?php esc_html_e('Free standard shipping on orders $49+. Under $49: $5.99 for the first item + $1.99 for each additional item.', 'dawp'); ?></li>
            </ul>
        </details>
        <details>
            <summary><?php esc_html_e('Changes, returns & refunds', 'dawp'); ?></summary>
            <ul>
                <li><?php esc_html_e('Change or cancel within 6 hours of ordering, before production starts.', 'dawp'); ?></li>
                <li><?php esc_html_e('Damaged, defective or wrong item? Email photos within 7 days of delivery for a free replacement or full refund.', 'dawp'); ?></li>
                <li><?php esc_html_e('Eligible unworn items can be returned within 30 days of delivery — check the size chart before ordering.', 'dawp'); ?></li>
            </ul>
            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Read the full policy →', 'dawp'); ?></a>
        </details>
    </div>
    <?php
}

// Shipping info banner on the Cart page (block-based cart)
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
        <p class="free-shipping-banner__message"><strong>Free standard US shipping on orders $49+</strong> &middot; Printed to order, tracked to your door</p>
    </div>
    <?php
    $banner = ob_get_clean();

    return $banner . $block_content;
}
