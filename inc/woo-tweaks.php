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

    if (preg_match('/^CV\s*-\s*(\d+)$/i', $tracking_id, $matches)) {
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
    ?>
    <div class="product-service-notes" aria-label="<?php esc_attr_e('Purchase benefits', 'dawp'); ?>">
        <div class="product-service-note">
            <span class="product-service-note__icon" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </span>
            <span class="product-service-note__body">
                <span class="product-service-note__title"><?php esc_html_e('Carefully selected automatic movement', 'dawp'); ?></span>
                <span class="product-service-note__text"><?php esc_html_e('24 jewels, 28,800 vph, regulated in five positions.', 'dawp'); ?></span>
            </span>
        </div>
        <div class="product-service-note">
            <span class="product-service-note__icon" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
            </span>
            <span class="product-service-note__body">
                <span class="product-service-note__title"><?php esc_html_e('Five-year movement warranty', 'dawp'); ?></span>
                <span class="product-service-note__text"><?php esc_html_e('Backed by our lifetime service programme.', 'dawp'); ?></span>
            </span>
        </div>
        <div class="product-service-note">
            <span class="product-service-note__icon" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            </span>
            <span class="product-service-note__body">
                <span class="product-service-note__title"><?php esc_html_e('Insured delivery, included', 'dawp'); ?></span>
                <span class="product-service-note__text"><?php esc_html_e('Signature required, fully insured across the United States.', 'dawp'); ?></span>
            </span>
        </div>
        <div class="product-service-note">
            <span class="product-service-note__icon" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </span>
            <span class="product-service-note__body">
                <span class="product-service-note__title"><?php esc_html_e('Individually numbered', 'dawp'); ?></span>
                <span class="product-service-note__text"><?php esc_html_e('Serial engraved on the case back and recorded on the certificate.', 'dawp'); ?></span>
            </span>
        </div>
    </div>
    <?php
}

function dawp_single_product_atelier_banner() {
    $banner_img = get_template_directory_uri() . '/assets/images/home/luxuryimagecollection/1.jpg';
    ?>
    <div class="atelier-dark-banner">
        <div class="atelier-dark-banner__img-wrap">
            <img class="atelier-dark-banner__img" src="<?php echo esc_url($banner_img); ?>" alt="Watchmaker Atelier Movement">
        </div>
        <div class="atelier-dark-banner__content">
            <span class="atelier-dark-banner__tag"><?php esc_html_e('CALIBRE CH-01', 'dawp'); ?></span>
            <h2 class="atelier-dark-banner__title"><?php esc_html_e('Assembled by one watchmaker, start to finish.', 'dawp'); ?></h2>
            <p class="atelier-dark-banner__desc"><?php esc_html_e('Every movement is cased, timed, and inspected by the same hands. Nothing leaves the atelier until it holds its rate across five positions.', 'dawp'); ?></p>
            <a href="#tab-description" class="atelier-dark-banner__link"><?php esc_html_e('INSIDE THE ATELIER', 'dawp'); ?></a>
        </div>
    </div>
    <?php
}

function dawp_get_store_address_line() {
    $countries = null;

    if (function_exists('WC') && WC() && isset(WC()->countries)) {
        $countries = WC()->countries;
    }

    $address_1 = $countries ? $countries->get_base_address() : get_option('woocommerce_store_address', '');
    $address_2 = $countries ? $countries->get_base_address_2() : get_option('woocommerce_store_address_2', '');
    $city      = $countries ? $countries->get_base_city() : get_option('woocommerce_store_city', '');
    $postcode  = $countries ? $countries->get_base_postcode() : get_option('woocommerce_store_postcode', '');
    $state     = $countries ? $countries->get_base_state() : '';
    // Corvelshop is U.S.-only per every policy page; key off the theme's market
    // country rather than the WooCommerce base-country option.
    $country   = function_exists('dawp_store_country') ? dawp_store_country() : ($countries ? $countries->get_base_country() : 'US');

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

    $city_region = trim(implode(', ', array_filter([$city, trim($state . ' ' . $postcode)])));
    $parts       = array_filter([$address_1, $address_2, $city_region]);

    if ($country && 'US' !== strtoupper($country)) {
        $country_name = $country;

        if ($countries) {
            $country_names = $countries->get_countries();

            if (isset($country_names[$country])) {
                $country_name = $country_names[$country];
            }
        }

        $parts[] = $country_name;
    }

    return implode(', ', $parts);
}
