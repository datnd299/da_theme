<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Category sticker above the product title (single product)
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
            'title' => __('Free shipping $49+', 'dawp'),
            'copy'  => __('Tracked delivery worldwide', 'dawp'),
            'icon'  => '<path d="M1 7h13v9H1z"/><path d="M14 10h4l4 3.5V16h-8z"/><circle cx="6" cy="18" r="1.8"/><circle cx="17.5" cy="18" r="1.8"/>',
            'highlight' => true,
        ],
        [
            'title' => __('Free fixes', 'dawp'),
            'copy'  => __('Misprint or damage? Replaced free', 'dawp'),
            'icon'  => '<path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/>',
        ],
        [
            'title' => __('Secure checkout', 'dawp'),
            'copy'  => __('256-bit SSL · Visa, Amex, PayPal', 'dawp'),
            'icon'  => '<rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>',
        ],
    ];
    ?>
    <div class="trust-badges-banner">
        <?php foreach ($badges as $badge) : ?>
            <div class="trust-badge<?php echo empty($badge['highlight']) ? '' : ' trust-badge--highlight'; ?>">
                <svg class="trust-badge__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $badge['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
                <span><strong><?php echo esc_html($badge['title']); ?></strong><?php echo esc_html($badge['copy']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>

    <?php da_theme_spend_save_box(); ?>

    <div class="product-info-accordion">
        <details>
            <summary><?php esc_html_e('Production & delivery', 'dawp'); ?></summary>
            <ul>
                <li class="product-info-accordion__highlight">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 7h13v9H1z"/><path d="M14 10h4l4 3.5V16h-8z"/><circle cx="6" cy="18" r="1.8"/><circle cx="17.5" cy="18" r="1.8"/></svg>
                    <strong><?php esc_html_e('Free shipping on orders over $49.', 'dawp'); ?></strong>
                </li>
                <li><?php esc_html_e('Printed, cut and finished to order in 2–3 business days.', 'dawp'); ?></li>
                <li><?php esc_html_e('Delivered 5–10 business days after dispatch, with tracking.', 'dawp'); ?></li>
            </ul>
        </details>
        <details>
            <summary><?php esc_html_e('Changes, returns & refunds', 'dawp'); ?></summary>
            <ul>
                <li><?php esc_html_e('Change or cancel within 24 hours of ordering.', 'dawp'); ?></li>
                <li><?php esc_html_e('Damaged, misprinted or wrong item? Email a photo within 14 days for a free replacement or refund.', 'dawp'); ?></li>
                <li><?php esc_html_e('Made-to-order items can’t be returned for change of mind or size — check the size chart first.', 'dawp'); ?></li>
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
        <p class="free-shipping-banner__message">Free shipping on orders over $49 &middot; Printed to order, tracked delivery</p>
    </div>
    <?php
    $banner = ob_get_clean();

    return $banner . $block_content;
}

/* ---------------------------------------------------------------
 * Spend & Save — tiered order discount
 * Highest tier reached by the cart item subtotal applies (not cumulative).
 * ------------------------------------------------------------- */
// Free-shipping threshold (USD, item subtotal) — keep in sync with the WC shipping zone
function da_theme_free_shipping_min() {
    return 49;
}

function da_theme_spend_save_tiers() {
    // threshold (USD, item subtotal) => percent off
    return [69 => 5, 99 => 10, 139 => 15];
}

function da_theme_spend_save_percent($subtotal) {
    $percent = 0;
    foreach (da_theme_spend_save_tiers() as $threshold => $off) {
        if ($subtotal >= $threshold) {
            $percent = $off;
        }
    }
    return $percent;
}

// Apply the discount as a negative fee so it works with the block cart & checkout
add_action('woocommerce_cart_calculate_fees', 'da_theme_spend_save_discount');
function da_theme_spend_save_discount($cart) {
    if (is_admin() && !wp_doing_ajax()) {
        return;
    }
    $subtotal = (float) $cart->get_subtotal();
    $percent  = da_theme_spend_save_percent($subtotal);
    if (!$percent) {
        return;
    }
    $cart->add_fee(
        /* translators: %d: discount percent */
        sprintf(__('Spend & Save (%d%% off)', 'dawp'), $percent),
        -round($subtotal * $percent / 100, wc_get_price_decimals()),
        false
    );
}

// Promo box on the single product page (rendered under the trust badges)
function da_theme_spend_save_box() {
    ?>
    <div class="spend-save-box">
        <p class="spend-save-box__title"><?php esc_html_e('Spend more, save more', 'dawp'); ?></p>
        <ul class="spend-save-box__tiers">
            <?php foreach (da_theme_spend_save_tiers() as $threshold => $off) : ?>
                <li>
                    <strong><?php echo esc_html(sprintf(__('%d%% OFF', 'dawp'), $off)); ?></strong>
                    <span><?php echo esc_html(sprintf(__('orders $%d+', 'dawp'), $threshold)); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="spend-save-box__note"><?php esc_html_e('Applied automatically at checkout. No code needed.', 'dawp'); ?></p>
    </div>
    <?php
}
