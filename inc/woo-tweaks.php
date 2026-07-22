<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_after_single_product_summary', 'dawp_product_trust_strip', 5);
function dawp_product_trust_strip() {
    if (!is_product()) return;
    ?>
    <div class="product-trust-strip">
        <div class="product-trust-strip__item">
            <div class="product-trust-strip__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
            </div>
            <div class="product-trust-strip__content">
                <span class="product-trust-strip__title">Buy Now Pay Later</span>
                <span class="product-trust-strip__sub">Pay using Klarna or Afterpay</span>
            </div>
        </div>
        <div class="product-trust-strip__item">
            <div class="product-trust-strip__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 4v4h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            </div>
            <div class="product-trust-strip__content">
                <span class="product-trust-strip__title">Free Shipping US</span>
                <span class="product-trust-strip__sub">On most of our products</span>
            </div>
        </div>
        <div class="product-trust-strip__item">
            <div class="product-trust-strip__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3z"/><path d="M3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
            </div>
            <div class="product-trust-strip__content">
                <span class="product-trust-strip__title">We've Got Your Back</span>
                <span class="product-trust-strip__sub">24/7 Prime customer support</span>
            </div>
        </div>
        <div class="product-trust-strip__item">
            <div class="product-trust-strip__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div class="product-trust-strip__content">
                <span class="product-trust-strip__title">55K+ Happy Customers</span>
                <span class="product-trust-strip__sub">Over 34,245 Successfully Shipped Orders</span>
            </div>
        </div>
    </div>
    <?php
}

add_action('woocommerce_after_add_to_cart_form', 'dawp_product_urgency_signals');
function dawp_product_urgency_signals() {
    if (!is_product()) return;
    ?>
    <div class="product-urgency">
        <div class="product-urgency__stock">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M13.5 0.67s.74 2.65.74 4.8c0 2.06-1.35 3.73-3.41 3.73-2.07 0-3.63-1.67-3.63-3.73l.03-.36C5.21 7.51 4 10.62 4 14c0 4.42 3.58 8 8 8s8-3.58 8-8C20 8.61 17.41 3.8 13.5 0.67zM11.71 19c-1.78 0-3.22-1.4-3.22-3.14 0-1.62 1.05-2.76 2.81-3.12 1.77-.36 3.6-1.21 4.62-2.58.39 1.29.59 2.65.59 4.04 0 2.65-2.15 4.8-4.8 4.8z"/></svg>
            <span>Only <strong>11</strong> items left in stock</span>
        </div>
        <div class="product-urgency__viewers">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            <span>There are <strong>41</strong> people viewing this product right now.</span>
        </div>
    </div>
    <?php
}

add_filter('woocommerce_product_tabs', 'dawp_add_custom_product_tabs');
function dawp_add_custom_product_tabs($tabs) {
    $tabs['shipping_info'] = [
        'title'    => 'Shipping',
        'priority' => 25,
        'callback' => 'dawp_shipping_tab_content',
    ];
    $tabs['return_warranty'] = [
        'title'    => 'Return &amp; Warranty',
        'priority' => 26,
        'callback' => 'dawp_return_warranty_tab_content',
    ];
    return $tabs;
}

function dawp_shipping_tab_content() {
    $policy_url = home_url('/shipping-returns/');
    ?>
    <ul class="product-tab-list">
        <li>🚚 <strong>Express shipping:</strong> Get your package in just a few days! Now available for various products and locations.</li>
        <li>🛒 <strong>Informed checkout:</strong> Detail shipping costs and times are available at checkout.</li>
        <li>🛡️ <strong>Package Safety:</strong> Get a refund or replacement for your damaged or lost package. For more details, please visit our Return policy &amp; Refund policy.</li>
        <li>🎯 <strong>Thorough Tracking:</strong> Stay in the loop with our precise order tracking.</li>
        <li>🔎 <a href="<?php echo esc_url($policy_url); ?>">Read more about our Shipping policy.</a></li>
    </ul>
    <?php
}

function dawp_return_warranty_tab_content() {
    $policy_url = home_url('/shipping-returns/');
    ?>
    <p class="product-tab-lead">🛡️ Your joy is our priority, and we've got your back every step of the way!</p>
    <ul class="product-tab-list">
        <li>6 hours to cancel or modify order seamlessly.</li>
        <li>7 business days after delivery for a replacement or refund if deemed appropriate — no return shipping required!</li>
        <li>A replacement item is processed within 1–7 business days after confirmation.</li>
        <li>Funds back in your account within 3–5 business days after confirmation.</li>
        <li>We have 24/7/365 tickets and email support. Please contact us if you need further assistance.</li>
        <li>🔎 <a href="<?php echo esc_url($policy_url); ?>">Read more about our Return policy and Refund policy.</a></li>
    </ul>
    <?php
}

function dawp_get_woocommerce_store_address() {
    $countries = function_exists('WC') && WC() ? WC()->countries : null;

    if ($countries) {
        $address_1 = $countries->get_base_address();
        $address_2 = $countries->get_base_address_2();
        $city      = $countries->get_base_city();
        $state     = $countries->get_base_state();
        $postcode  = $countries->get_base_postcode();
        $country   = $countries->get_base_country();
    } else {
        $address_1       = get_option('woocommerce_store_address', '');
        $address_2       = get_option('woocommerce_store_address_2', '');
        $city            = get_option('woocommerce_store_city', '');
        $country_state   = explode(':', get_option('woocommerce_default_country', ''), 2);
        $country         = $country_state[0] ?? '';
        $state           = $country_state[1] ?? '';
        $postcode        = get_option('woocommerce_store_postcode', '');
    }

    $address_parts = array_filter(array_map('trim', [
        wp_strip_all_tags($address_1),
        wp_strip_all_tags($address_2),
    ]));

    $city_state_postcode = trim(implode(', ', array_filter([
        wp_strip_all_tags($city),
        trim(implode(' ', array_filter([
            wp_strip_all_tags($state),
            wp_strip_all_tags($postcode),
        ]))),
    ])));

    if ($city_state_postcode) {
        $address_parts[] = $city_state_postcode;
    }

    if (!$address_parts && $country) {
        $address_parts[] = wp_strip_all_tags($country);
    }

    return implode(', ', $address_parts);
}
