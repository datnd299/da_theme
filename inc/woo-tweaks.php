<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_single_product_summary', 'dawp_single_product_benefits', 45);
function dawp_single_product_benefits() {
    if (!is_product()) {
        return;
    }

    $benefits = [
        [
            'title' => __('Preparing Watches', 'dawp'),
            'copy'  => __('3-5 Day', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>',
        ],
        [
            'title' => __('Express Delivery', 'dawp'),
            'copy'  => __('10-15 Business Days', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h11v10H3z"/><path d="M14 10h4l3 3v4h-7z"/><path d="M7 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M18 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>',
        ],
        [
            'title' => __('Warranty', 'dawp'),
            'copy'  => __('2 Years', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.6-2.9 8-7 10-4.1-2-7-5.4-7-10V6z"/><path d="M9 12l2 2 4-5"/></svg>',
        ],
        [
            'title' => __('Free 30-Days Returns', 'dawp'),
            'copy'  => __('More Details', 'dawp'),
            'link'  => home_url('/return-refund-policy/'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4v6h6"/><path d="M20 20v-6h-6"/><path d="M5 15a8 8 0 0 0 14.5 3.5M19 9A8 8 0 0 0 4.5 5.5"/></svg>',
        ],
    ];
    ?>
    <section class="tgm-product-benefits" aria-label="<?php esc_attr_e('Shopping benefits', 'dawp'); ?>">
        <?php foreach ($benefits as $benefit) : ?>
            <article class="tgm-product-benefit">
                <div class="tgm-product-benefit__icon"><?php echo $benefit['icon']; ?></div>
                <div class="tgm-product-benefit__content">
                    <h2><?php echo esc_html($benefit['title']); ?></h2>
                    <?php if (!empty($benefit['link'])) : ?>
                        <p><a href="<?php echo esc_url($benefit['link']); ?>"><?php echo esc_html($benefit['copy']); ?></a></p>
                    <?php else : ?>
                        <p><?php echo esc_html($benefit['copy']); ?></p>
                    <?php endif; ?>
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

