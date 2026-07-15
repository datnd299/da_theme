<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_single_product_summary', 'dawp_single_product_trust_badges', 31);
add_action('woocommerce_after_single_product_summary', 'dawp_single_product_pride_banner', 8);

function dawp_product_icon($path, $label = '') {
    return sprintf(
        '<svg class="dawp-product-icon" viewBox="0 0 24 24" aria-hidden="%1$s" role="img">%2$s</svg>',
        $label ? 'false' : 'true',
        $path
    );
}

function dawp_single_product_trust_badges() {
    $badges = array(
        array(
            'icon' => '<path d="M12 3l7 3v5c0 4.5-2.9 8.5-7 10-4.1-1.5-7-5.5-7-10V6l7-3z"/><path d="M8.8 12.1l2.1 2.1 4.5-5"/>',
            'title' => __('Proudly American Style', 'dawp'),
            'copy' => __('Red, white, and blue designs made for everyday pride.', 'dawp'),
        ),
        array(
            'icon' => '<path d="M4 7h10v10H4z"/><path d="M14 10h3l3 3v4h-6z"/><path d="M7 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M17 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>',
            'title' => __('U.S. Shipping', 'dawp'),
            'copy' => __('Packed with care and shipped across the United States.', 'dawp'),
        ),
        array(
            'icon' => '<path d="M12 2l2.7 6.1 6.6.6-5 4.4 1.5 6.5L12 16.2 6.2 19.6l1.5-6.5-5-4.4 6.6-.6L12 2z"/>',
            'title' => __('Gift-Ready Favorite', 'dawp'),
            'copy' => __('A meaningful pick for families and proud Americans.', 'dawp'),
        ),
    );
    ?>
    <section class="dawp-product-trust" aria-label="<?php esc_attr_e('Product trust highlights', 'dawp'); ?>">
        <?php foreach ($badges as $badge) : ?>
            <div class="dawp-product-trust__item">
                <span class="dawp-product-trust__icon"><?php echo dawp_product_icon($badge['icon']); ?></span>
                <span>
                    <strong><?php echo esc_html($badge['title']); ?></strong>
                    <small><?php echo esc_html($badge['copy']); ?></small>
                </span>
            </div>
        <?php endforeach; ?>
    </section>
    <?php
}

function dawp_single_product_pride_banner() {
    ?>
    <section class="dawp-pride-banner" aria-label="<?php esc_attr_e('American pride product message', 'dawp'); ?>">
        <div class="dawp-pride-banner__emblem" aria-hidden="true">
            <span>★</span>
        </div>
        <div class="dawp-pride-banner__content">
            <p><?php esc_html_e('American Pride Collection', 'dawp'); ?></p>
            <h2><?php esc_html_e('Wear the colors. Carry the pride.', 'dawp'); ?></h2>
            <small><?php esc_html_e('Patriotic shirts and gifts made for proud everyday moments.', 'dawp'); ?></small>
        </div>
    </section>
    <?php
}

