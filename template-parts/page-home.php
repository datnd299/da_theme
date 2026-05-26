<?php
$img_base = get_template_directory_uri() . '/assets/img/';

$categories = [
    [
        'title' => __('Formal Shoes', 'dawp'),
        'copy'  => __('Polished footwear for office days, formal events, and smart casual outfits.', 'dawp'),
        'image' => 'broge-category-formal-shoes.png',
        'url'   => home_url('/product-category/formal-shoes/'),
    ],
    [
        'title' => __('Leather Dress Shoes', 'dawp'),
        'copy'  => __('Refined dress shoes with a polished finish for business and occasion wear.', 'dawp'),
        'image' => 'broge-category-leather-dress-shoes.png',
        'url'   => home_url('/product-category/leather-dress-shoes/'),
    ],
    [
        'title' => __('Brogue Shoes', 'dawp'),
        'copy'  => __('Classic detailing for formal looks, evening style, and confident steps.', 'dawp'),
        'image' => 'broge-category-brogue-shoes.png',
        'url'   => home_url('/product-category/brogue-shoes/'),
    ],
];

$formal_highlights = [
    __('Office-ready style', 'dawp'),
    __('Smart casual outfits', 'dawp'),
    __('Evening occasions', 'dawp'),
    __('Clean formal silhouettes', 'dawp'),
];

$detail_cards = [
    [
        'title' => __('Leather Dress Shoes', 'dawp'),
        'copy'  => __('Polished dress footwear for business and formal occasions.', 'dawp'),
    ],
    [
        'title' => __('Brogue Shoes', 'dawp'),
        'copy'  => __('Decorative perforation and classic detail for refined styling.', 'dawp'),
    ],
    [
        'title' => __('Care & Fit Notes', 'dawp'),
        'copy'  => __('Review material, size, fit, and care details before ordering.', 'dawp'),
    ],
];

$trust_cards = [
    __('Secure Checkout', 'dawp'),
    __('Tracking Included', 'dawp'),
    __('30-Day Returns', 'dawp'),
    __('Size Guide & Fit Notes', 'dawp'),
];

$feedback_cards = [
    [
        'title' => __('Fit & Comfort', 'dawp'),
        'copy'  => __('Clear sizing and fit details help make dress shoe shopping easier.', 'dawp'),
    ],
    [
        'title' => __('Formal Style', 'dawp'),
        'copy'  => __('Polished silhouettes make these shoes easy to pair with office and occasion outfits.', 'dawp'),
    ],
    [
        'title' => __('Product Details', 'dawp'),
        'copy'  => __('Material, care, and return information should be easy to review before ordering.', 'dawp'),
    ],
];
?>

<div class="broge-home">
    <section class="broge-hero" aria-labelledby="broge-hero-title">
        <div class="broge-container broge-hero__grid">
            <div class="broge-hero__content">
                <p class="broge-eyebrow"><?php esc_html_e("Men's Formal Footwear", 'dawp'); ?></p>
                <h1 id="broge-hero-title"><?php esc_html_e('Modern Formal Shoes For Classy Steps', 'dawp'); ?></h1>
                <p class="broge-hero__lead">
                    <?php esc_html_e('Discover formal shoes, leather dress shoes, and brogue shoes designed for office days, smart casual looks, special occasions, and confident evenings.', 'dawp'); ?>
                </p>
                <div class="broge-actions">
                    <a class="broge-btn broge-btn--primary" href="<?php echo esc_url(home_url('/product-category/formal-shoes/')); ?>">
                        <?php esc_html_e('Shop Formal Shoes', 'dawp'); ?>
                    </a>
                    <a class="broge-btn broge-btn--ghost" href="<?php echo esc_url(home_url('/product-category/brogue-shoes/')); ?>">
                        <?php esc_html_e('Explore Brogue Shoes', 'dawp'); ?>
                    </a>
                </div>
                <p class="broge-hero__trust"><?php esc_html_e('Polished styles. Clear size guidance. Reliable customer support.', 'dawp'); ?></p>
            </div>
            <div class="broge-hero__media">
                <img src="<?php echo esc_url($img_base . 'broge-hero-formal-shoes.png'); ?>"
                     alt="<?php esc_attr_e('Brown brogue dress shoes on a dark premium surface', 'dawp'); ?>"
                     loading="eager"
                     fetchpriority="high">
            </div>
        </div>
    </section>

    <section class="broge-section broge-shop-style" aria-labelledby="broge-style-title">
        <div class="broge-container">
            <div class="broge-section-head">
                <p class="broge-eyebrow broge-eyebrow--dark"><?php esc_html_e('Shop By Style', 'dawp'); ?></p>
                <h2 id="broge-style-title"><?php esc_html_e('Three refined categories. One formal focus.', 'dawp'); ?></h2>
            </div>
            <div class="broge-category-grid">
                <?php foreach ($categories as $category) : ?>
                    <a class="broge-category-card" href="<?php echo esc_url($category['url']); ?>">
                        <span class="broge-category-card__image">
                            <img src="<?php echo esc_url($img_base . $category['image']); ?>"
                                 alt="<?php echo esc_attr($category['title']); ?>"
                                 loading="lazy">
                        </span>
                        <span class="broge-category-card__body">
                            <span class="broge-category-card__title"><?php echo esc_html($category['title']); ?></span>
                            <span class="broge-category-card__copy"><?php echo esc_html($category['copy']); ?></span>
                            <span class="broge-text-link"><?php esc_html_e('Shop style', 'dawp'); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="broge-section broge-formal" aria-labelledby="broge-formal-title">
        <div class="broge-container broge-split">
            <div class="broge-split__media">
                <img src="<?php echo esc_url($img_base . 'broge-work-events.png'); ?>"
                     alt="<?php esc_attr_e('Formal shoes arranged with a suit for work and events', 'dawp'); ?>"
                     loading="lazy">
            </div>
            <div class="broge-split__content">
                <p class="broge-eyebrow broge-eyebrow--dark"><?php esc_html_e('Formal Shoes', 'dawp'); ?></p>
                <h2 id="broge-formal-title"><?php esc_html_e('Polished footwear for work, events, and evening plans.', 'dawp'); ?></h2>
                <p><?php esc_html_e('From office-ready silhouettes to occasion-focused styles, Broge Shoes offers formal footwear made for refined outfits and confident everyday presentation.', 'dawp'); ?></p>
                <ul class="broge-check-list">
                    <?php foreach ($formal_highlights as $highlight) : ?>
                        <li><?php echo esc_html($highlight); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="broge-btn broge-btn--primary" href="<?php echo esc_url(home_url('/product-category/formal-shoes/')); ?>">
                    <?php esc_html_e('Shop Formal Shoes', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="broge-section broge-details" aria-labelledby="broge-details-title">
        <div class="broge-container broge-details__grid">
            <div class="broge-details__content">
                <p class="broge-eyebrow"><?php esc_html_e('Dress Shoes & Brogue Details', 'dawp'); ?></p>
                <h2 id="broge-details-title"><?php esc_html_e('Classic details with a modern formal edge.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Explore leather dress shoes and brogue shoes with polished finishes, refined silhouettes, and classic detailing designed for business, formal events, and smart casual looks.', 'dawp'); ?></p>
                <div class="broge-mini-grid">
                    <?php foreach ($detail_cards as $card) : ?>
                        <div class="broge-mini-card">
                            <h3><?php echo esc_html($card['title']); ?></h3>
                            <p><?php echo esc_html($card['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="broge-actions">
                    <a class="broge-btn broge-btn--primary" href="<?php echo esc_url(home_url('/product-category/leather-dress-shoes/')); ?>">
                        <?php esc_html_e('Shop Leather Dress Shoes', 'dawp'); ?>
                    </a>
                    <a class="broge-btn broge-btn--ghost" href="<?php echo esc_url(home_url('/product-category/brogue-shoes/')); ?>">
                        <?php esc_html_e('View Brogue Shoes', 'dawp'); ?>
                    </a>
                </div>
            </div>
            <div class="broge-details__media">
                <img src="<?php echo esc_url($img_base . 'broge-category-brogue-shoes.png'); ?>"
                     alt="<?php esc_attr_e('Close-up brogue perforation and stitching details', 'dawp'); ?>"
                     loading="lazy">
            </div>
        </div>
    </section>

    <section class="broge-section broge-care" aria-labelledby="broge-care-title">
        <div class="broge-container broge-care__grid">
            <div>
                <p class="broge-eyebrow"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                <h2 id="broge-care-title"><?php esc_html_e('Clear support for size, fit, shipping, and returns.', 'dawp'); ?></h2>
                <p><?php esc_html_e("Shop men's formal footwear with clear product details, size guidance, order tracking, and customer support when you need help.", 'dawp'); ?></p>
                <div class="broge-trust-grid">
                    <?php foreach ($trust_cards as $card) : ?>
                        <div class="broge-trust-card"><?php echo esc_html($card); ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="broge-policy-card">
                <img src="<?php echo esc_url($img_base . 'broge-customer-care.png'); ?>"
                     alt="<?php esc_attr_e('Dress shoes packed with care instructions and size guidance', 'dawp'); ?>"
                     loading="lazy">
                <div class="broge-policy-card__body">
                    <p><?php esc_html_e('Please review the size guide, fit note, material or finish, care instructions, and return conditions before placing an order.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Orders placed before 5:00 PM Pacific Standard Time begin processing the same business day. Orders placed after the cutoff begin processing the next business day. Handling time is 1-2 business days and transit usually takes 5-7 business days.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Eligible footwear must be unworn, undamaged, free of outdoor wear, stains, heavy creasing, or sole marks, and returned with original packaging where applicable within 30 days of delivery.', 'dawp'); ?></p>
                    <div class="broge-actions">
                        <a class="broge-btn broge-btn--primary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a class="broge-btn broge-btn--ghost" href="<?php echo esc_url(home_url('/contact-us/')); ?>">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="broge-section broge-feedback" aria-labelledby="broge-feedback-title">
        <div class="broge-container">
            <div class="broge-section-head">
                <p class="broge-eyebrow broge-eyebrow--dark"><?php esc_html_e('Customer Feedback', 'dawp'); ?></p>
                <h2 id="broge-feedback-title"><?php esc_html_e('What customers look for in a refined dress shoe.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Customers choose formal footwear for fit, polish, comfort, and confidence. These feedback areas can be updated with verified customer reviews as the store grows.', 'dawp'); ?></p>
            </div>
            <div class="broge-feedback-grid">
                <?php foreach ($feedback_cards as $card) : ?>
                    <article class="broge-feedback-card">
                        <h3><?php echo esc_html($card['title']); ?></h3>
                        <p>&ldquo;<?php echo esc_html($card['copy']); ?>&rdquo;</p>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="broge-feedback__cta">
                <a class="broge-btn broge-btn--dark" href="<?php echo esc_url(home_url('/shop/')); ?>">
                    <?php esc_html_e('Shop Formal Footwear', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>
</div>
