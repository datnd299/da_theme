<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'dawp_single_product_category_label', 4);
add_action('woocommerce_after_add_to_cart_button', 'dawp_single_product_wishlist_button', 20);
add_action('woocommerce_single_product_summary', 'dawp_single_product_benefits', 31);
add_filter('woocommerce_product_tabs', 'dawp_single_product_policy_tabs', 30);

function dawp_single_product_category_label() {
    global $product;

    if (!$product instanceof WC_Product) {
        return;
    }

    $terms = get_the_terms($product->get_id(), 'product_cat');

    if (empty($terms) || is_wp_error($terms)) {
        return;
    }

    $term = reset($terms);
    ?>
    <a class="product_meta_top" href="<?php echo esc_url(get_term_link($term)); ?>">
        <?php echo esc_html($term->name); ?>
    </a>
    <?php
}

function dawp_single_product_wishlist_button() {
    global $product;

    if (!$product instanceof WC_Product) {
        return;
    }

    echo '<div class="dawp-product-wishlist">';

    if (shortcode_exists('yith_wcwl_add_to_wishlist')) {
        echo do_shortcode('[yith_wcwl_add_to_wishlist product_id="' . absint($product->get_id()) . '"]');
    } elseif (shortcode_exists('ti_wishlists_addtowishlist')) {
        echo do_shortcode('[ti_wishlists_addtowishlist product_id="' . absint($product->get_id()) . '"]');
    } else {
        echo '<button type="button" class="dawp-wishlist-button" aria-label="' . esc_attr__('Save this product to wishlist', 'dawp') . '">';
        echo '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"/></svg>';
        echo '<span>' . esc_html__('Save to Wishlist', 'dawp') . '</span>';
        echo '</button>';
    }

    echo '</div>';
}

function dawp_single_product_policy_tabs($tabs) {
    $policy_pages = [
        'dawp_shipping' => [
            'title'    => __('Shipping', 'dawp'),
            'priority' => 42,
            'slug'     => 'shipping-policy',
        ],
        'dawp_returns' => [
            'title'    => __('Returns', 'dawp'),
            'priority' => 44,
            'slug'     => 'return-refund-policy',
        ],
    ];

    foreach ($policy_pages as $key => $tab) {
        $page = get_page_by_path($tab['slug']);

        if (!$page instanceof WP_Post || trim(wp_strip_all_tags($page->post_content)) === '') {
            continue;
        }

        $tabs[$key] = [
            'title'    => $tab['title'],
            'priority' => $tab['priority'],
            'callback' => 'dawp_single_product_policy_tab_content',
            'page_id'  => $page->ID,
        ];
    }

    return $tabs;
}

function dawp_single_product_policy_tab_content($key, $tab) {
    if (empty($tab['page_id'])) {
        return;
    }

    $page = get_post((int) $tab['page_id']);

    if (!$page instanceof WP_Post) {
        return;
    }

    echo '<div class="dawp-policy-tab">';
    echo apply_filters('the_content', $page->post_content);
    echo '</div>';
}

function dawp_single_product_benefits() {
    if (!is_product()) {
        return;
    }

    $benefits = [
        [
            'title' => __('Fast Shipping', 'dawp'),
            'copy'  => __('Reliable delivery across the United States.', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h11v10H3z"/><path d="M14 10h4l3 3v4h-7z"/><path d="M7 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M18 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>',
        ],
        [
            'title' => __('Secure Checkout', 'dawp'),
            'copy'  => __('Protected payment experience from cart to confirmation.', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.6-2.9 8-7 10-4.1-2-7-5.4-7-10V6z"/><path d="M9 12l2 2 4-5"/></svg>',
        ],
        [
            'title' => __('Easy Returns', 'dawp'),
            'copy'  => __('Simple 30-day return process after delivery.', 'dawp'),
            'icon'  => '<span aria-hidden="true">30</span>',
        ],
        [
            'title' => __('Friendly Support', 'dawp'),
            'copy'  => __('Helpful service whenever you need order guidance.', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12a8 8 0 0 1 16 0v4a3 3 0 0 1-3 3h-2"/><path d="M4 13h3v5H4z"/><path d="M17 13h3v5h-3z"/><path d="M10 19h5"/></svg>',
        ],
    ];
    ?>
    <section class="tgm-product-benefits" aria-label="<?php esc_attr_e('Shopping benefits', 'dawp'); ?>">
        <?php foreach ($benefits as $benefit) : ?>
            <article class="tgm-product-benefit">
                <div class="tgm-product-benefit__icon"><?php echo $benefit['icon']; ?></div>
                <div class="tgm-product-benefit__content">
                    <h2><?php echo esc_html($benefit['title']); ?></h2>
                    <p><?php echo esc_html($benefit['copy']); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
    <?php
}

/**
 * Get the formatted store address from WooCommerce settings.
 *
 * @return string
 */
function dawp_get_store_address() {
    $address = [
        'address_1' => trim((string) get_option('woocommerce_store_address', '')),
        'address_2' => trim((string) get_option('woocommerce_store_address_2', '')),
        'city'      => trim((string) get_option('woocommerce_store_city', '')),
        'postcode'  => trim((string) get_option('woocommerce_store_postcode', '')),
        'country'   => '',
        'state'     => '',
    ];

    $country_state = trim((string) get_option('woocommerce_default_country', ''));

    if (strpos($country_state, ':') !== false) {
        [$address['country'], $address['state']] = array_pad(explode(':', $country_state, 2), 2, '');
    } else {
        $address['country'] = $country_state;
    }

    $woocommerce = function_exists('WC') ? WC() : null;

    if ($woocommerce && !empty($woocommerce->countries) && method_exists($woocommerce->countries, 'get_formatted_address')) {
        $formatted = $woocommerce->countries->get_formatted_address($address, ', ');

        if ($formatted) {
            return trim(wp_strip_all_tags($formatted));
        }
    }

    $country = $address['country'];
    $state   = $address['state'];

    if ($woocommerce && !empty($woocommerce->countries)) {
        $countries = $woocommerce->countries->get_countries();
        $states    = $country ? $woocommerce->countries->get_states($country) : [];

        if ($state && is_array($states) && isset($states[$state])) {
            $state = $states[$state];
        }

        if ($country && isset($countries[$country])) {
            $country = $countries[$country];
        }
    }

    $city_line = trim(implode(' ', array_filter([$address['city'], $state, $address['postcode']])));
    $parts     = array_filter([$address['address_1'], $address['address_2'], $city_line, $country]);

    return implode(', ', $parts);
}

/**
 * Get store contact values from WooCommerce/site settings with temporary fallbacks.
 *
 * @param string $key Contact field key.
 * @return string
 */
function dawp_get_store_contact($key) {
    $fallbacks = [
        'name'    => 'Brickgo.com',
        'email'   => 'support@brickgo.com',
        'phone'   => '757-804-6538',
        'address' => '57 Calvert St, Woodbridge, VA 22191-2840',
        'domain'  => 'https://brickgo.com',
    ];

    switch ($key) {
        case 'name':
            $value = get_option('woocommerce_email_from_name');
            $value = $value ?: get_bloginfo('name');
            break;
        case 'email':
            $value = get_option('woocommerce_email_from_address');
            $value = $value ?: get_option('admin_email');
            break;
        case 'phone':
            $value = get_option('woocommerce_store_phone');
            $value = $value ?: get_theme_mod('dawp_store_phone');
            break;
        case 'address':
            $value = dawp_get_store_address();
            break;
        case 'domain':
            $value = home_url('/');
            break;
        default:
            $value = '';
            break;
    }

    return trim((string) ($value ?: ($fallbacks[$key] ?? '')));
}

