<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

add_filter('woocommerce_gateway_icon', function($icon, $gateway_id) {
    $payment_icons = [
        'paypal' => [
            'file' => 'image copy 3.png',
            'label' => __('PayPal', 'dawp'),
        ],
        'jcb' => [
            'file' => 'image copy.png',
            'label' => __('JCB', 'dawp'),
        ],
        'mastercard' => [
            'file' => 'image copy 2.png',
            'label' => __('MasterCard', 'dawp'),
        ],
        'visa' => [
            'file' => 'image copy 4.png',
            'label' => __('Visa', 'dawp'),
        ],
    ];

    $html = '<span class="dawp-payment-icons icon-box" aria-label="' . esc_attr__('Accepted payment methods', 'dawp') . '">';

    foreach ($payment_icons as $method) {
        $html .= sprintf(
            '<img class="dawp-payment-icon icon" src="%s" alt="%s" loading="lazy" decoding="async">',
            esc_url(get_theme_file_uri('/assets/img/gallery/Oneshopvibe/payment/' . $method['file'])),
            esc_attr($method['label'])
        );
    }

    $html .= '</span>';

    return $html;
}, 20, 2);

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
