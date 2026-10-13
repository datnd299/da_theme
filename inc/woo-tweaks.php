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
            'file' => 'paypal.png',
            'label' => __('PayPal', 'dawp'),
        ],
        'jcb' => [
            'file' => 'jcb.png',
            'label' => __('JCB', 'dawp'),
        ],
        'mastercard' => [
            'file' => 'mastercard.png',
            'label' => __('MasterCard', 'dawp'),
        ],
        'visa' => [
            'file' => 'visa.png',
            'label' => __('Visa', 'dawp'),
        ],
    ];

    $html = '<span class="dawp-payment-icons icon-box" aria-label="' . esc_attr__('Accepted payment methods', 'dawp') . '">';

    foreach ($payment_icons as $method) {
        $image_url = get_theme_file_uri('/assets/img/payment/' . $method['file']);

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

add_action('woocommerce_single_product_summary', 'dawp_product_retail_badge', 4);
function dawp_product_retail_badge() {
    global $product;

    if (! $product) {
        return;
    }

    $label = $product->is_on_sale()
        ? __('Limited tire deal', 'dawp')
        : __('Mytire verified fitment', 'dawp');

    echo '<div class="product_meta_top">';
    echo '<span aria-hidden="true"></span>';
    echo esc_html($label);
    echo '</div>';
}

add_action('woocommerce_single_product_summary', 'dawp_product_fitment_prompt', 21);
function dawp_product_fitment_prompt() {
    ?>
    <div class="product-fitment-prompt" aria-label="<?php esc_attr_e('Tire fitment reminder', 'dawp'); ?>">
        <strong><?php esc_html_e('Check before checkout', 'dawp'); ?></strong>
        <span><?php esc_html_e('Match size, rim diameter, load index, speed rating, and quantity with your vehicle requirements.', 'dawp'); ?></span>
    </div>
    <?php
}

add_action('woocommerce_single_product_summary', 'dawp_product_spec_snapshot', 22);
function dawp_product_spec_snapshot() {
    global $product;

    if (! $product) {
        return;
    }

    $specs = [];
    $attributes = $product->get_attributes();

    foreach ($attributes as $attribute) {
        if (! $attribute->get_visible()) {
            continue;
        }

        $label = wc_attribute_label($attribute->get_name());
        $value = $product->get_attribute($attribute->get_name());

        if ($label && $value) {
            $specs[] = [
                'label' => $label,
                'value' => wp_strip_all_tags($value),
            ];
        }

        if (count($specs) >= 4) {
            break;
        }
    }

    if (empty($specs) && $product->get_sku()) {
        $specs[] = [
            'label' => __('SKU', 'dawp'),
            'value' => $product->get_sku(),
        ];
    }

    $cats = wc_get_product_category_list($product->get_id(), ', ');
    ?>
    <div class="product-spec-snapshot" aria-label="<?php esc_attr_e('Product specification snapshot', 'dawp'); ?>">
        <?php if (! empty($specs)) : ?>
            <?php foreach ($specs as $spec) : ?>
                <div class="product-spec-snapshot__item">
                    <span><?php echo esc_html($spec['label']); ?></span>
                    <strong><?php echo esc_html($spec['value']); ?></strong>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ($cats) : ?>
            <div class="product-spec-snapshot__item">
                <span><?php esc_html_e('Category', 'dawp'); ?></span>
                <strong><?php echo wp_kses_post($cats); ?></strong>
            </div>
        <?php endif; ?>
    </div>
    <?php
}

add_action('woocommerce_single_product_summary', 'dawp_product_service_cards', 35);
function dawp_product_service_cards() {
    $cards = [
        [
            'icon' => 'M5 16h14M7 16V8h10v8M9 8V6h6v2',
            'title' => __('Secure checkout', 'dawp'),
            'copy' => __('Pay safely with major payment methods.', 'dawp'),
        ],
        [
            'icon' => 'M3 7h11v9H3zM14 10h4l3 3v3h-7zM7 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM17 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4z',
            'title' => __('Fast tire dispatch', 'dawp'),
            'copy' => __('Order online and track your tire delivery.', 'dawp'),
        ],
        [
            'icon' => 'M12 3l7 3v5c0 5-3 8-7 10-4-2-7-5-7-10V6z',
            'title' => __('Fitment support', 'dawp'),
            'copy' => __('Ask us before ordering the wrong size.', 'dawp'),
        ],
    ];
    ?>
    <div class="product-service-cards" aria-label="<?php esc_attr_e('Shopping benefits', 'dawp'); ?>">
        <?php foreach ($cards as $card) : ?>
            <div class="product-service-card">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="<?php echo esc_attr($card['icon']); ?>"></path>
                </svg>
                <div>
                    <strong><?php echo esc_html($card['title']); ?></strong>
                    <span><?php echo esc_html($card['copy']); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}

add_action('woocommerce_after_single_product_summary', 'dawp_product_buying_confidence', 15);
function dawp_product_buying_confidence() {
    ?>
    <section class="product-confidence" aria-label="<?php esc_attr_e('Tire buying guidance', 'dawp'); ?>">
        <div>
            <span><?php esc_html_e('Fitment first', 'dawp'); ?></span>
            <h2><?php esc_html_e('Buy tires with the checks that matter.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Use the sidewall size from your current tire or vehicle placard, then confirm load index, speed rating, season, and quantity before checkout.', 'dawp'); ?></p>
        </div>
        <ul>
            <li><?php esc_html_e('Confirm the full tire size, for example 225/65R17.', 'dawp'); ?></li>
            <li><?php esc_html_e('Match load and speed ratings to your vehicle needs.', 'dawp'); ?></li>
            <li><?php esc_html_e('Choose all-season, performance, winter, truck, or trailer use.', 'dawp'); ?></li>
        </ul>
    </section>
    <?php
}
