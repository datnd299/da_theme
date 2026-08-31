<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

add_filter('woocommerce_get_catalog_ordering_args', 'dawp_force_oldest_product_archive_ordering', 99);
add_action('pre_get_posts', 'dawp_force_oldest_product_archive_query', 99);
add_filter('woocommerce_sale_flash', 'dawp_sale_flash_label', 10, 3);

function dawp_is_oldest_first_product_archive() {
    return !is_admin()
        && function_exists('is_shop')
        && function_exists('is_product_category')
        && (is_shop() || is_product_category());
}

function dawp_force_oldest_product_archive_ordering($args) {
    if (!dawp_is_oldest_first_product_archive()) {
        return $args;
    }

    return [
        'orderby'  => 'date',
        'order'    => 'ASC',
        'meta_key' => '',
    ];
}

function dawp_force_oldest_product_archive_query($query) {
    if (!$query->is_main_query() || !dawp_is_oldest_first_product_archive()) {
        return;
    }

    $query->set('orderby', 'date');
    $query->set('order', 'ASC');
    $query->set('meta_key', '');
}

function dawp_sale_flash_label($html, $post, $product) {
    return '<span class="onsale">' . esc_html__('Sale', 'dawp') . '</span>';
}

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_filter('woocommerce_shortcode_order_tracking_order_id', 'dawp_normalize_tracking_order_id', 9);

function dawp_normalize_tracking_order_id($order_id) {
    $tracking_id = trim((string) $order_id);

    if ($tracking_id === '') {
        return $order_id;
    }

    $tracking_id = ltrim($tracking_id, '#');
    $tracking_id = trim($tracking_id);

    if (ctype_digit($tracking_id)) {
        return $tracking_id;
    }

    if (preg_match('/^(?:OT|CV)\s*-\s*(\d+)$/i', $tracking_id, $matches)) {
        return $matches[1];
    }

    return $order_id;
}

add_action('woocommerce_before_account_navigation', 'dawp_my_account_page_title', 5);
add_action('woocommerce_before_customer_login_form', 'dawp_my_account_page_title', 5);
add_action('woocommerce_single_product_summary', 'dawp_single_product_service_notes', 35);
add_action('woocommerce_after_single_product_summary', 'dawp_single_product_atelier_banner', 5);

function dawp_my_account_page_title() {
    if (!is_account_page()) {
        return;
    }

    $account_page_id = wc_get_page_id('myaccount');
    $title = $account_page_id > 0 ? get_the_title($account_page_id) : __('My Account', 'dawp');

    echo '<h1 class="qb-account-title">' . esc_html($title) . '</h1>';
}

function dawp_single_product_service_notes() {
    $notes = [
        [
            'icon'  => 'map',
            'title' => __('U.S. domestic shipping', 'dawp'),
            'text'  => __('We currently ship exclusively within the United States domestic market.', 'dawp'),
        ],
        [
            'icon'  => 'truck',
            'title' => __('Free standard shipping', 'dawp'),
            'text'  => __('Standard U.S. shipping is free nationwide with no minimum purchase requirement.', 'dawp'),
        ],
        [
            'icon'  => 'clock',
            'title' => __('Estimated delivery', 'dawp'),
            'text'  => __('Handling takes 1-3 business days and transit takes 5-7 business days.', 'dawp'),
        ],
        [
            'icon'  => 'refresh',
            'title' => __('30-day return window', 'dawp'),
            'text'  => __('Eligible returns may be initiated within 30 days of delivery after contacting support.', 'dawp'),
        ],
    ];

    echo '<div class="product-service-notes" aria-label="' . esc_attr__('Order and policy highlights', 'dawp') . '">';

    foreach ($notes as $note) {
        echo '<div class="product-service-note">';
        echo '<span class="product-service-note__icon" aria-hidden="true">' . dawp_product_service_note_icon($note['icon']) . '</span>';
        echo '<span class="product-service-note__body">';
        echo '<strong class="product-service-note__title">' . esc_html($note['title']) . '</strong>';
        echo '<span class="product-service-note__text">' . esc_html($note['text']) . '</span>';
        echo '</span>';
        echo '</div>';
    }

    echo '</div>';
}

function dawp_single_product_atelier_banner() {
    
}

function dawp_product_service_note_icon($icon) {
    $icons = [
        'map' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" focusable="false"><path d="M9 18l-6 3V6l6-3 6 3 6-3v15l-6 3-6-3z"/><path d="M9 3v15"/><path d="M15 6v15"/></svg>',
        'truck' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" focusable="false"><path d="M10 17h4V5H2v12h3"/><path d="M14 8h4l4 4v5h-3"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/></svg>',
        'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" focusable="false"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>',
        'refresh' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" focusable="false"><path d="M20 11a8.1 8.1 0 0 0-15.5-2M4 5v4h4"/><path d="M4 13a8.1 8.1 0 0 0 15.5 2M20 19v-4h-4"/></svg>',
    ];

    return $icons[$icon] ?? $icons['clock'];
}

function dawp_get_store_address_parts() {
    $countries = null;

    if (function_exists('WC') && WC() && isset(WC()->countries)) {
        $countries = WC()->countries;
    }

    $address_1 = $countries ? $countries->get_base_address() : get_option('woocommerce_store_address', '');
    $address_2 = $countries ? $countries->get_base_address_2() : get_option('woocommerce_store_address_2', '');
    $city      = $countries ? $countries->get_base_city() : get_option('woocommerce_store_city', '');
    $postcode  = $countries ? $countries->get_base_postcode() : get_option('woocommerce_store_postcode', '');
    $state     = $countries ? $countries->get_base_state() : get_option('woocommerce_store_state', '');
    $country   = $countries ? $countries->get_base_country() : get_option('woocommerce_store_country', '');

    $address_1 = trim(wp_strip_all_tags((string) $address_1));
    $address_2 = trim(wp_strip_all_tags((string) $address_2));
    $city      = trim(wp_strip_all_tags((string) $city));
    $postcode  = trim(wp_strip_all_tags((string) $postcode));

    if (!$country && !$state) {
        $default_location = (string) get_option('woocommerce_default_country', '');
        $country          = $default_location;

        if (strpos($default_location, ':') !== false) {
            list($country, $state) = array_pad(explode(':', $default_location, 2), 2, '');
        }
    }

    $country = trim(wp_strip_all_tags($country));
    $state   = trim(wp_strip_all_tags($state));

    if ($country && $state && $countries) {
        $states = $countries->get_states($country);

        if (isset($states[$state])) {
            $state = $states[$state];
        }
    }

    $country_name = $country;

    if ($country) {
        if ($countries) {
            $country_names = $countries->get_countries();

            if (isset($country_names[$country])) {
                $country_name = $country_names[$country];
            }
        }
    }

    return [
        'address_1'    => $address_1,
        'address_2'    => $address_2,
        'city'         => $city,
        'state'        => $state,
        'postcode'     => $postcode,
        'country'      => $country,
        'country_name' => $country_name,
    ];
}

function dawp_get_store_address_line() {
    $address     = dawp_get_store_address_parts();
    $city_region = trim(implode(', ', array_filter([$address['city'], trim($address['state'] . ' ' . $address['postcode'])])));
    $parts       = array_filter([$address['address_1'], $address['address_2'], $city_region]);

    if ($address['country_name']) {
        $parts[] = $address['country_name'];
    }

    return implode(', ', $parts);
}

function dawp_get_store_country_code() {
    $address = dawp_get_store_address_parts();

    return $address['country'] ?: 'US';
}
