<?php
/**
 * Template Part: Track Your Order
 */

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$category_links = [];

if (function_exists('dawp_product_category_definitions')) {
    foreach (dawp_product_category_definitions() as $slug => $category) {
        $category_links[] = [
            'title' => $category['name'],
            'url'   => function_exists('dawp_product_category_url')
                ? dawp_product_category_url($slug)
                : home_url('/product-category/' . sanitize_title($slug) . '/'),
        ];
    }
} elseif (function_exists('get_terms') && taxonomy_exists('product_cat')) {
    $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'number'     => 5,
        'orderby'    => 'menu_order',
        'order'      => 'ASC',
    ]);

    if (! is_wp_error($terms)) {
        foreach ($terms as $term) {
            $term_link = get_term_link($term);

            if (! is_wp_error($term_link)) {
                $category_links[] = [
                    'title' => $term->name,
                    'url'   => $term_link,
                ];
            }
        }
    }
}

$support_email = 'support@scottosterbind.com';
$track_order_url = home_url('/track-order/');
$track_order_found = false;

if (function_exists('wc_get_order')) {
    $nonce_value = isset($_REQUEST['woocommerce-order-tracking-nonce'])
        ? wp_unslash($_REQUEST['woocommerce-order-tracking-nonce'])
        : (isset($_REQUEST['_wpnonce']) ? wp_unslash($_REQUEST['_wpnonce']) : '');

    if (isset($_REQUEST['orderid']) && wp_verify_nonce($nonce_value, 'woocommerce-order_tracking')) {
        $posted_order_id = function_exists('wc_clean')
            ? wc_clean(wp_unslash($_REQUEST['orderid']))
            : sanitize_text_field(wp_unslash($_REQUEST['orderid']));
        $posted_order_id = ltrim($posted_order_id, '#');
        $posted_order_id = apply_filters('woocommerce_shortcode_order_tracking_order_id', $posted_order_id);
        $posted_order_email = isset($_REQUEST['order_email']) ? sanitize_email(wp_unslash($_REQUEST['order_email'])) : '';
        $posted_order = $posted_order_id ? wc_get_order($posted_order_id) : false;

        $track_order_found = $posted_order
            && is_a($posted_order, 'WC_Order')
            && strtolower($posted_order->get_billing_email()) === strtolower($posted_order_email);
    }
}

$track_order_form = do_shortcode('[woocommerce_order_tracking]');

if ($track_order_form) {
    $track_order_form = preg_replace(
        '/(<form\b[^>]*\bclass="[^"]*\btrack_order\b[^"]*"[^>]*\baction=")[^"]*(")/i',
        '$1' . esc_url($track_order_url) . '$2',
        $track_order_form
    );
}
?>

<div id="primary" class="track-order-page">

    <section class="track-hero">
        <div class="track-hero__inner">
            <div class="track-hero__copy">
                <span class="track-hero__label"><?php esc_html_e('Scott Osterbind Order Status', 'dawp'); ?></span>
                <h1 class="track-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Enter your order number and billing email to review the latest order details available from Scott Osterbind.', 'dawp'); ?>
                </p>
                <div class="track-hero__actions">
                    <a href="<?php echo esc_url($shop_url); ?>" class="track-hero__button track-hero__button--primary">
                        <?php esc_html_e('Continue Shopping', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="track-hero__button track-hero__button--ghost">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="track-form-card track-form-card--hero">
                <div class="track-form-card__header">
                    <span><?php esc_html_e('Tracking Lookup', 'dawp'); ?></span>
                    <h2><?php esc_html_e('Find your order', 'dawp'); ?></h2>
                </div>
                <div class="track-form-card__body">
                    <?php echo $track_order_form; ?>
                    <?php if ($track_order_found) : ?>
                        <a href="<?php echo esc_url($track_order_url); ?>" class="track-back-button">
                            <?php esc_html_e('Track another order', 'dawp'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="track-form-section">
        <div class="track-form-section__inner">
            <div class="track-status-card" aria-label="<?php esc_attr_e('Order progress steps', 'dawp'); ?>">
                <span class="track-status-card__eyebrow"><?php esc_html_e('Typical Order Flow', 'dawp'); ?></span>
                <ol class="track-status-list">
                    <li>
                        <span></span>
                        <div>
                            <strong><?php esc_html_e('Order Confirmed', 'dawp'); ?></strong>
                            <p><?php esc_html_e('We receive your order details and begin product availability review.', 'dawp'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span></span>
                        <div>
                            <strong><?php esc_html_e('Packed & Shipped', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Tracking is added after fulfillment and carrier scan when available.', 'dawp'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span></span>
                        <div>
                            <strong><?php esc_html_e('Delivered', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Check the delivery record and contact support if anything looks off.', 'dawp'); ?></p>
                        </div>
                    </li>
                </ol>
            </div>

            <div class="track-help-box">
                <div class="track-help-box__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                </div>
                <div class="track-help-box__content">
                    <h4 class="track-help-box__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h4>
                    <p class="track-help-box__text">
                        <?php esc_html_e('If the tracking form cannot find your order, contact Scott Osterbind support at ', 'dawp'); ?>
                        <a href="<?php echo esc_url('mailto:' . $support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        <?php esc_html_e(' with your order number and we\'ll be happy to assist you.', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <div class="track-badges">
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    <?php esc_html_e('Secure Tracking', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <?php esc_html_e('Real-time Updates', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    <?php esc_html_e('Order Protection', 'dawp'); ?>
                </div>
            </div>

        </div>
    </section>

    <section class="track-more-section">
        <div class="track-more-section__inner">
            <div class="track-more-section__header">
                <span class="track-more-section__label"><?php esc_html_e('Quick Links', 'dawp'); ?></span>
                <h2 class="track-more-section__title"><?php esc_html_e('More ways we can help', 'dawp'); ?></h2>
                <p class="track-more-section__subtitle"><?php esc_html_e('Useful pages and current shop categories for a smoother Scott Osterbind order experience.', 'dawp'); ?></p>
            </div>
            <div class="track-more-grid">
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Learn about our shipping times, rates, and delivery details.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Contact Us', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Our support team is here to help with order and delivery questions.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('FAQs', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Find quick answers to our most common customer questions.', 'dawp'); ?></p>
                </a>
            </div>

            <div class="track-category-strip" aria-label="<?php esc_attr_e('Shop categories', 'dawp'); ?>">
                <a href="<?php echo esc_url($shop_url); ?>" class="track-category-link track-category-link--all">
                    <?php esc_html_e('Shop All Products', 'dawp'); ?>
                </a>
                <?php foreach ($category_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="track-category-link">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</div>
