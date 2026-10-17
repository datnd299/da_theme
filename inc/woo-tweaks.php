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
            'highlight' => true,
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
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/></svg>
                    <strong><?php esc_html_e('Free standard US shipping on orders $49+.', 'dawp'); ?></strong>
                </li>
                <li><?php esc_html_e('Printed to order and quality-checked in 2–3 business days.', 'dawp'); ?></li>
                <li><?php esc_html_e('US delivery in 5–10 business days after dispatch, with tracking. We ship to all 50 states.', 'dawp'); ?></li>
            </ul>
        </details>
        <details>
            <summary><?php esc_html_e('Changes, returns & refunds', 'dawp'); ?></summary>
            <ul>
                <li><?php esc_html_e('Change or cancel within 24 hours of ordering, before production starts.', 'dawp'); ?></li>
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

/* ---------------------------------------------------------------
 * Spend & Save — tiered order discount
 * Highest tier reached by the cart item subtotal applies (not cumulative).
 * ------------------------------------------------------------- */
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
        <p class="spend-save-box__title"><span aria-hidden="true">★</span> <?php esc_html_e('Spend more, save more', 'dawp'); ?></p>
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

/*
 * ── Product attributes hidden from shop filters & FiboSearch ──
 * "images" is a data attribute (image URLs), not something shoppers filter or search by.
 */
function dawp_ignored_attribute_names() {
    return ['images'];
}

function dawp_is_ignored_attribute($name) {
    $name = strtolower(trim((string) $name));
    $name = preg_replace('/^pa_/', '', $name);

    return in_array(sanitize_title($name), dawp_ignored_attribute_names(), true);
}

// Global attribute taxonomies (pa_*) FiboSearch indexes when "Search in attributes" is on
add_filter('dgwt/wcas/attribute_taxonomies', static function ($taxonomies) {
    return array_values(array_filter((array) $taxonomies, static function ($taxonomy) {
        return !dawp_is_ignored_attribute($taxonomy);
    }));
});

// Attributes attached to a product (global + custom)
add_filter('dgwt/wcas/product/attributes', static function ($attributes) {
    foreach ((array) $attributes as $key => $attribute) {
        $name = is_object($attribute) && method_exists($attribute, 'get_name') ? $attribute->get_name() : $key;
        if (dawp_is_ignored_attribute($name)) {
            unset($attributes[$key]);
        }
    }
    return $attributes;
});

// Raw custom (non-taxonomy) attributes from _product_attributes meta
add_filter('dgwt/wcas/product/custom_attributes', static function ($attributes) {
    foreach ((array) $attributes as $key => $attribute) {
        $name = is_array($attribute) && isset($attribute['name']) ? $attribute['name'] : $key;
        if (dawp_is_ignored_attribute($name)) {
            unset($attributes[$key]);
        }
    }
    return $attributes;
});

/**
 * Long free-text attributes: printed in the Description tab, so kept out of the
 * shop filter panel and the "Additional information" table (still searchable).
 */
function dawp_text_attribute_names() {
    return ['design_des'];
}

add_filter('woocommerce_display_product_attributes', static function ($attributes) {
    foreach (array_keys($attributes) as $key) {
        $name = preg_replace('/^attribute_(pa_)?/', '', $key);
        if (in_array($name, dawp_text_attribute_names(), true) || dawp_is_ignored_attribute($name)) {
            unset($attributes[$key]);
        }
    }
    return $attributes;
});

/**
 * Global attributes for the shop filter panel: [taxonomy, query key, label, terms], skipping ignored/empty ones.
 */
function dawp_shop_filter_attributes() {
    $groups = [];

    foreach (wc_get_attribute_taxonomies() as $attribute) {
        if (
            dawp_is_ignored_attribute($attribute->attribute_name)
            || dawp_is_ignored_attribute($attribute->attribute_label)
            || in_array($attribute->attribute_name, dawp_text_attribute_names(), true)
        ) {
            continue;
        }

        $taxonomy = wc_attribute_taxonomy_name($attribute->attribute_name);
        if (!taxonomy_exists($taxonomy)) {
            continue;
        }

        $terms = get_terms([
            'taxonomy'   => $taxonomy,
            'hide_empty' => true,
            'orderby'    => 'name',
        ]);
        if (empty($terms) || is_wp_error($terms)) {
            continue;
        }

        $groups[] = [
            'taxonomy' => $taxonomy,
            'key'      => 'filter_' . $attribute->attribute_name,
            'label'    => $attribute->attribute_label,
            'terms'    => $terms,
        ];
    }

    return $groups;
}
