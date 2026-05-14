<?php
/**
 * Template Part: Track Your Order
 */

$support_email = 'support@mybaapstore.com';
$contact_url   = home_url('/contact-us/');
$faq_url       = home_url('/faq/');
$shipping_url  = home_url('/shipping-returns/');

$mybaap_category_url = static function ($slug) {
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
        'name' => __('Smart Gadgets', 'dawp'),
        'copy' => __('Small useful devices for everyday convenience.', 'dawp'),
        'url'  => $mybaap_category_url('smart-gadgets'),
    ],
    [
        'name' => __('Home & Kitchen Gadgets', 'dawp'),
        'copy' => __('Practical helpers for home, kitchen, and drinkware routines.', 'dawp'),
        'url'  => $mybaap_category_url('home-kitchen-gadgets'),
    ],
    [
        'name' => __('Personal Care Devices', 'dawp'),
        'copy' => __('Simple grooming tools for regular personal care.', 'dawp'),
        'url'  => $mybaap_category_url('personal-care-devices'),
    ],
    [
        'name' => __('Camera & Tech Accessories', 'dawp'),
        'copy' => __('Useful camera, video, and device accessories for daily use.', 'dawp'),
        'url'  => $mybaap_category_url('camera-tech-accessories'),
    ],
    [
        'name' => __('Daily Tools', 'dawp'),
        'copy' => __('Compact accessories for travel, organization, and small tasks.', 'dawp'),
        'url'  => $mybaap_category_url('daily-tools'),
    ],
];
?>

<main class="track-order-page">

    <!-- Hero Section -->
    <section class="track-hero">
        <div class="track-hero__inner">
            <span class="track-hero__label"><?php esc_html_e('Order Status', 'dawp'); ?></span>
            <h1 class="track-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
            <p class="track-hero__desc">
                <?php esc_html_e('Enter your order details below to follow your MyBaapStore order from checkout to delivery.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="track-form-section">
        <div class="track-form-section__inner">

            <!-- Form Card -->
            <div class="track-form-card">
                <div class="track-form-card__body">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>

            <!-- Help Box -->
            <div class="track-help-box">
                <div class="track-help-box__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                </div>
                <div class="track-help-box__content">
                    <h4 class="track-help-box__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h4>
                    <p class="track-help-box__text">
                        <?php esc_html_e('If you have any trouble, please reach out to the MyBaapStore support team at ', 'dawp'); ?>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        <?php esc_html_e(' with your order number and we will be happy to assist you.', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <!-- Trust Badges -->
            <div class="track-badges">
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    <?php esc_html_e('Secure Lookup', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <?php esc_html_e('Tracking Included', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    <?php esc_html_e('Clear Order Details', 'dawp'); ?>
                </div>
            </div>

        </div>
    </section>

    <!-- More Ways Section -->
    <section class="track-more-section">
        <div class="track-more-section__inner">
            <div class="track-more-section__header">
                <h2 class="track-more-section__title"><?php esc_html_e('More Ways We Can Help', 'dawp'); ?></h2>
                <p class="track-more-section__subtitle"><?php esc_html_e('Everything you need for a smooth MyBaapStore shopping experience.', 'dawp'); ?></p>
            </div>
            <div class="track-more-grid">
                <a href="<?php echo esc_url($shipping_url); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Review processing times, delivery estimates, and return details.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url($contact_url); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Contact Us', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Our support team can help with order, product, and delivery questions.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url($faq_url); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Find quick answers to our most common customer questions.', 'dawp'); ?></p>
                </a>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section class="track-category-section" aria-labelledby="track-category-title">
        <div class="track-category-section__inner">
            <div class="track-category-section__header">
                <span class="track-category-section__label"><?php esc_html_e('Shop By Category', 'dawp'); ?></span>
                <h2 id="track-category-title" class="track-category-section__title"><?php esc_html_e('Practical gadgets organized by everyday use.', 'dawp'); ?></h2>
                <p class="track-category-section__subtitle"><?php esc_html_e('Explore focused categories for home routines, grooming, tech accessories, and compact daily tools.', 'dawp'); ?></p>
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

</main>
