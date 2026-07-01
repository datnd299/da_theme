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
            'file' => 'imagecopy3.png',
            'label' => __('PayPal', 'dawp'),
        ],
        'jcb' => [
            'file' => 'imagecopy.png',
            'label' => __('JCB', 'dawp'),
        ],
        'mastercard' => [
            'file' => 'imagecopy2.png',
            'label' => __('MasterCard', 'dawp'),
        ],
        'visa' => [
            'file' => 'imagecopy4.png',
            'label' => __('Visa', 'dawp'),
        ],
    ];

    $html = '<span class="dawp-payment-icons icon-box" aria-label="' . esc_attr__('Accepted payment methods', 'dawp') . '">';

    foreach ($payment_icons as $method) {
        $image_url = get_theme_file_uri('/assets/img/gallery/Oneshopvibe/payment/' . $method['file']);

        $html .= sprintf(
            '<img class="dawp-payment-icon icon" %s alt="%s" loading="lazy">',
            dawp_responsive_image_attrs($image_url, 80, 48, '80px', [80, 120, 160]),
            esc_attr($method['label'])
        );
    }

    $html .= '</span>';

    return $html;
}, 20, 2);

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
