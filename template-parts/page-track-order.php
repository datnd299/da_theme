<?php
/**
 * Track order page for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@lbqshop.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$contact_url    = home_url('/contact-us/');
$faq_url        = home_url('/faq/');
$shipping_url   = home_url('/shipping-returns/');
$terms_url      = home_url('/terms-conditions/');
$privacy_url    = home_url('/privacy-policy/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$lbq_category_url = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$category_links = [
    [
        'name' => __('Beauty Accessories', 'dawp'),
        'copy' => __('Everyday tools and small beauty helpers for simple routines.', 'dawp'),
        'url'  => $lbq_category_url('beauty-accessories'),
    ],
    [
        'name' => __('Makeup Bags & Organizers', 'dawp'),
        'copy' => __('Travel-friendly cases and cosmetic storage for cleaner carry.', 'dawp'),
        'url'  => $lbq_category_url('makeup-bags-organizers'),
    ],
    [
        'name' => __('Fashion Accessories', 'dawp'),
        'copy' => __('Simple outfit accents selected for polished everyday style.', 'dawp'),
        'url'  => $lbq_category_url('fashion-accessories'),
    ],
    [
        'name' => __('Everyday Style Essentials', 'dawp'),
        'copy' => __('Practical pieces for beauty, organization, travel, and daily use.', 'dawp'),
        'url'  => $lbq_category_url('everyday-style-essentials'),
    ],
    [
        'name' => __('Giftable Finds', 'dawp'),
        'copy' => __('Pretty, useful accessories made for thoughtful small gifts.', 'dawp'),
        'url'  => $lbq_category_url('giftable-finds'),
    ],
];

$help_links = [
    [
        'title' => __('Shipping & Returns', 'dawp'),
        'copy'  => __('Review processing, delivery estimates, returns, and refund details.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('Contact Support', 'dawp'),
        'copy'  => __('Send your order number and delivery question to our support team.', 'dawp'),
        'url'   => $contact_url,
    ],
    [
        'title' => __('FAQs', 'dawp'),
        'copy'  => __('Find quick answers about orders, products, privacy, and store policies.', 'dawp'),
        'url'   => $faq_url,
    ],
];

$policy_links = [
    ['title' => __('Terms', 'dawp'), 'url' => $terms_url],
    ['title' => __('Privacy', 'dawp'), 'url' => $privacy_url],
    ['title' => __('My Account', 'dawp'), 'url' => $account_url],
];
?>

<div class="track-order-page">
    <section class="track-hero" aria-labelledby="track-order-title">
        <div class="track-hero__inner">
            <div class="track-hero__copy">
                <p class="track-eyebrow"><?php esc_html_e('Order Tracking', 'dawp'); ?></p>
                <h1 id="track-order-title" class="track-hero__title"><?php esc_html_e('Track your LBQ Shop order.', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Enter your order ID and billing email to check your shipment status, order items, and delivery details.', 'dawp'); ?>
                </p>
                <div class="track-hero__actions">
                    <a href="#track-order-form" class="track-button track-button--primary"><?php esc_html_e('Check Order Status', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="track-button track-button--ghost"><?php esc_html_e('Continue Shopping', 'dawp'); ?></a>
                </div>
            </div>

            <div class="track-hero__panel" aria-label="<?php esc_attr_e('Order timeline', 'dawp'); ?>">
                <div class="track-timeline">
                    <div class="track-timeline__item">
                        <span class="track-timeline__icon" aria-hidden="true">1</span>
                        <div>
                            <h2><?php esc_html_e('Order placed', 'dawp'); ?></h2>
                            <p><?php esc_html_e('Your checkout details are received securely.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="track-timeline__item">
                        <span class="track-timeline__icon" aria-hidden="true">2</span>
                        <div>
                            <h2><?php esc_html_e('Processing', 'dawp'); ?></h2>
                            <p><?php esc_html_e('Orders are prepared within 2-4 business days.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="track-timeline__item">
                        <span class="track-timeline__icon" aria-hidden="true">3</span>
                        <div>
                            <h2><?php esc_html_e('On the way', 'dawp'); ?></h2>
                            <p><?php esc_html_e('Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="track-order-form" class="track-form-section" aria-labelledby="track-form-title">
        <div class="track-form-section__inner">
            <div class="track-section-heading">
                <p class="track-eyebrow"><?php esc_html_e('Lookup', 'dawp'); ?></p>
                <h2 id="track-form-title"><?php esc_html_e('Find your order details.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Use the order ID from your confirmation email and the billing email used at checkout.', 'dawp'); ?></p>
            </div>

            <div class="track-form-layout">
                <div class="track-form-card">
                    <div class="track-form-card__body">
                        <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                    </div>
                </div>

                <aside class="track-support-card" aria-labelledby="track-support-title">
                    <div class="track-support-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 16v-4"></path>
                            <path d="M12 8h.01"></path>
                        </svg>
                    </div>
                    <h2 id="track-support-title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h2>
                    <p>
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Email %1$s with your order number. Business hours: %2$s.', 'dawp'),
                                '<a href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                esc_html($business_hours)
                            ),
                            [
                                'a' => [
                                    'href' => [],
                                ],
                            ]
                        );
                        ?>
                    </p>
                    <div class="track-policy-links">
                        <?php foreach ($policy_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>

            <div class="track-badges" aria-label="<?php esc_attr_e('Store service highlights', 'dawp'); ?>">
                <div class="track-badge">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    <?php esc_html_e('Secure Lookup', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 17h4V5H3v12h2"></path><path d="M14 8h4l3 3v6h-3"></path><circle cx="7" cy="17" r="2"></circle><circle cx="16" cy="17" r="2"></circle></svg>
                    <?php esc_html_e('Tracking After Dispatch', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                    <?php esc_html_e('2-4 Day Processing', 'dawp'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="track-more-section" aria-labelledby="track-helpful-title">
        <div class="track-more-section__inner">
            <div class="track-section-heading track-section-heading--center">
                <p class="track-eyebrow"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                <h2 id="track-helpful-title"><?php esc_html_e('Helpful links for your order.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Review the same store support pages used across LBQ Shop.', 'dawp'); ?></p>
            </div>

            <div class="track-more-grid">
                <?php foreach ($help_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="track-more-card">
                        <span class="track-more-card__title"><?php echo esc_html($link['title']); ?></span>
                        <span class="track-more-card__desc"><?php echo esc_html($link['copy']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="track-category-section" aria-labelledby="track-category-title">
        <div class="track-category-section__inner">
            <div class="track-category-section__header">
                <p class="track-eyebrow"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                <h2 id="track-category-title"><?php esc_html_e('Beauty and style categories from LBQ Shop.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Explore the same product categories featured across the current store experience.', 'dawp'); ?></p>
            </div>

            <div class="track-category-grid">
                <?php foreach ($category_links as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="track-category-card">
                        <span class="track-category-card__name"><?php echo esc_html($category['name']); ?></span>
                        <span class="track-category-card__copy"><?php echo esc_html($category['copy']); ?></span>
                        <span class="track-category-card__cta"><?php esc_html_e('Shop category', 'dawp'); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
