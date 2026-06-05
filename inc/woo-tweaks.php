<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

add_filter('woocommerce_get_catalog_ordering_args', 'dawp_force_oldest_product_archive_ordering', 99);
add_action('pre_get_posts', 'dawp_force_oldest_product_archive_query', 99);

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

    if (preg_match('/^QB\s*-\s*(\d+)$/i', $tracking_id, $matches)) {
        return $matches[1];
    }

    return $order_id;
}

add_action('woocommerce_before_account_navigation', 'dawp_my_account_page_title', 5);
add_action('woocommerce_before_customer_login_form', 'dawp_my_account_page_title', 5);

function dawp_my_account_page_title() {
    if (!is_account_page()) {
        return;
    }

    $account_page_id = wc_get_page_id('myaccount');
    $title = $account_page_id > 0 ? get_the_title($account_page_id) : __('My Account', 'dawp');

    echo '<h1 class="qb-account-title">' . esc_html($title) . '</h1>';
}

function dawp_get_store_address_line() {
    $address_1 = trim(wp_strip_all_tags((string) get_option('woocommerce_store_address', '')));
    $address_2 = trim(wp_strip_all_tags((string) get_option('woocommerce_store_address_2', '')));
    $city      = trim(wp_strip_all_tags((string) get_option('woocommerce_store_city', '')));
    $postcode  = trim(wp_strip_all_tags((string) get_option('woocommerce_store_postcode', '')));

    $default_location = (string) get_option('woocommerce_default_country', '');
    $country          = $default_location;
    $state            = '';

    if (strpos($default_location, ':') !== false) {
        list($country, $state) = array_pad(explode(':', $default_location, 2), 2, '');
    }

    $country = trim(wp_strip_all_tags($country));
    $state   = trim(wp_strip_all_tags($state));

    $city_region = trim(implode(', ', array_filter([$city, trim($state . ' ' . $postcode)])));
    $parts       = array_filter([$address_1, $address_2, $city_region]);

    if ($country && 'US' !== strtoupper($country)) {
        $country_name = $country;

        if (function_exists('WC') && WC() && isset(WC()->countries)) {
            $countries = WC()->countries->get_countries();

            if (isset($countries[$country])) {
                $country_name = $countries[$country];
            }
        }

        $parts[] = $country_name;
    }

    return implode(', ', $parts);
}
