<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$about_hero_image_path = 'assets/img/gallery/Living_ecosystem_with_smart_tech_202607161304.jpeg';
$about_hero_image_file = get_theme_file_path($about_hero_image_path);
$about_hero_image_url = add_query_arg(
    'ver',
    file_exists($about_hero_image_file) ? filemtime($about_hero_image_file) : time(),
    get_theme_file_uri($about_hero_image_path)
);

$about_departments_image_path = 'assets/img/gallery/Stainless_steel_kitchen_range_counter_202607161438.jpeg';
$about_departments_image_file = get_theme_file_path($about_departments_image_path);
$about_departments_image_url = add_query_arg(
    'ver',
    file_exists($about_departments_image_file) ? filemtime($about_departments_image_file) : time(),
    get_theme_file_uri($about_departments_image_path)
);

$standards = [
    [
        'title' => 'Useful Everyday Products',
        'copy' => 'We focus on practical products across home, technology, outdoor, family, care and supply routines.',
    ],
    [
        'title' => 'Clear Shopping Experience',
        'copy' => 'Departments, product details and policies are organized so customers can compare and shop with confidence.',
    ],
    [
        'title' => 'Reliable Order Support',
        'copy' => 'Orders are processed with tracking, transparent shipping expectations and friendly customer assistance.',
    ],
];

$departments = function_exists('dawp_lbq_product_categories') ? wp_list_pluck(dawp_lbq_product_categories(), 'name') : [
    'Home, Garden & Tools',
    'Electronics',
    'Sports & Outdoors',
    'Toys & Outdoor Play',
    'Beauty & Personal Care',
    'Pets',
    'School, Office & Art Supplies',
];

$trust = [
    [
        'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.4-2.8 8.4-7 10-4.2-1.6-7-5.6-7-10V6z"/><path d="M9 12l2 2 4-5"/></svg>',
        'label' => 'Secure Checkout',
        'detail' => 'Protected payment flow from cart to confirmation.',
    ],
    [
        'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h11v10H3z"/><path d="M14 9h4l3 3v4h-7z"/><path d="M7 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M18 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>',
        'label' => 'Fast Shipping',
        'detail' => 'Most orders arrive in an estimated 4-7 business days.',
    ],
    [
        'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12a7 7 0 0 1 12-4.9"/><path d="M17 4v3.1h-3.1"/><path d="M19 12a7 7 0 0 1-12 4.9"/><path d="M7 20v-3.1h3.1"/><text x="12" y="15" text-anchor="middle">30</text></svg>',
        'label' => '30-Day Returns',
        'detail' => 'Eligible items can be returned within 30 days after delivery.',
    ],
    [
        'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 13v-1a8 8 0 0 1 16 0v1"/><path d="M4 13h3v5H4z"/><path d="M17 13h3v5h-3z"/><path d="M9 20h4a4 4 0 0 0 4-4"/><path d="M13 20v-2"/></svg>',
        'label' => 'Order Tracking',
        'detail' => 'Tracking information is shared after shipment.',
    ],
];
?>

<section class="tgm-about-hero">
    <div class="tgm-container tgm-about-hero__grid">
        <div class="tgm-about-hero__content">
            <p class="tgm-eyebrow">About Topgoodmart</p>
            <h1>A Modern Store For Everyday Departments</h1>
            <p>Topgoodmart helps American shoppers discover quality products across home, garden, tools, electronics, sports, toys, beauty, pets and supplies with a clean, reliable shopping experience.</p>
            <div class="tgm-hero__actions">
                <a class="tgm-btn tgm-btn--primary" href="<?php echo esc_url($shop_url); ?>">Shop Products</a>
                <a class="tgm-btn tgm-btn--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Support</a>
            </div>
        </div>
        <div class="tgm-about-hero__media">
            <?php echo dawp_get_responsive_image($about_hero_image_url, 'Bright modern home with furniture and everyday living products', '', 760, 560, 'eager', '(max-width: 900px) 100vw, 50vw', 'high'); ?>
            <div class="tgm-about-hero__badge">
                <strong>Built For Smarter Shopping</strong>
                <span>Organized departments, helpful policies and everyday value.</span>
            </div>
        </div>
    </div>
</section>

<section class="tgm-section">
    <div class="tgm-container tgm-about-story">
        <div>
            <p class="tgm-eyebrow">Our purpose</p>
            <h2>Helping customers upgrade daily life without the clutter.</h2>
        </div>
        <div class="tgm-about-story__copy">
            <p>Topgoodmart was shaped around a simple idea: online shopping should be organized, practical and easy to trust. Instead of feeling like a crowded marketplace, the store brings together useful products for home projects, connected living, outdoor activity, family routines, personal care and everyday supplies.</p>
            <p>Our goal is to make product discovery straightforward. Customers should be able to browse clear departments, compare product information and understand shipping, returns and support before placing an order.</p>
        </div>
    </div>
</section>

<section class="tgm-section tgm-section--soft">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">How we shop for you</p>
                <h2>Practical standards behind every department.</h2>
            </div>
        </div>
        <div class="tgm-about-card-grid">
            <?php foreach ($standards as $item) : ?>
                <article class="tgm-about-card">
                    <h3><?php echo esc_html($item['title']); ?></h3>
                    <p><?php echo esc_html($item['copy']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="tgm-section">
    <div class="tgm-container tgm-about-split">
        <div class="tgm-about-split__media">
            <?php echo dawp_get_responsive_image($about_departments_image_url, 'Kitchen and dining products in a clean modern home', '', 620, 520, 'lazy', '(max-width: 900px) 100vw, 48vw'); ?>
        </div>
        <div class="tgm-about-split__content">
            <p class="tgm-eyebrow">What we carry</p>
            <h2>Departments made for real homes and busy routines.</h2>
            <p>From home and garden tools to electronics, pet care, toys, beauty and school supplies, Topgoodmart focuses on categories customers can use often. The assortment is designed to support household projects, active routines, family needs and convenient online shopping.</p>
            <div class="tgm-about-tags" aria-label="Topgoodmart departments">
                <?php foreach ($departments as $department) : ?>
                    <span><?php echo esc_html($department); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="tgm-section tgm-section--blue">
    <div class="tgm-container">
        <div class="tgm-trust-grid">
            <?php foreach ($trust as $item) : ?>
                <article class="tgm-trust">
                    <span class="tgm-trust__icon"><?php echo wp_kses($item['icon'], [
                        'svg' => ['viewbox' => true, 'aria-hidden' => true],
                        'path' => ['d' => true],
                        'text' => ['x' => true, 'y' => true, 'text-anchor' => true],
                    ]); ?></span>
                    <h3><?php echo esc_html($item['label']); ?></h3>
                    <p><?php echo esc_html($item['detail']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="tgm-section">
    <div class="tgm-container tgm-about-policy">
        <div>
            <p class="tgm-eyebrow">Customer care</p>
            <h2>Transparent policies before and after checkout.</h2>
        </div>
        <div class="tgm-about-policy__grid">
            <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>">
                <strong>Shipping Policy</strong>
                <span>Processing, transit time and tracking details.</span>
            </a>
            <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>">
                <strong>Return & Refund Policy</strong>
                <span>Eligibility, return window and refund guidance.</span>
            </a>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>">
                <strong>Track Order</strong>
                <span>Check order progress after your purchase ships.</span>
            </a>
            <a href="<?php echo esc_url(home_url('/faq/')); ?>">
                <strong>FAQ</strong>
                <span>Quick answers for common shopping questions.</span>
            </a>
        </div>
    </div>
</section>

<section class="tgm-newsletter">
    <div class="tgm-container tgm-newsletter__inner">
        <div>
            <p class="tgm-eyebrow">Shop with confidence</p>
            <h2>Ready To Find Everyday Value?</h2>
            <p>Browse home, technology and lifestyle products built around practical needs and clear shopping support.</p>
        </div>
        <div class="tgm-newsletter__actions">
            <a class="tgm-btn tgm-btn--primary" href="<?php echo esc_url($shop_url); ?>">Shop Now</a>
            <a class="tgm-link" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Need help?</a>
        </div>
    </div>
</section>
