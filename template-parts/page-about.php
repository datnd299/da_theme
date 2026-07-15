<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$standards = [
    [
        'title' => 'Useful Everyday Products',
        'copy' => 'We focus on practical home, technology and lifestyle products that make daily routines easier.',
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

$departments = [
    'Home Essentials',
    'Furniture',
    'Electronics',
    'Smart Home',
    'Kitchen & Dining',
    'Outdoor & Garden',
];

$trust = [
    ['label' => 'Secure Checkout', 'detail' => 'Protected payment flow from cart to confirmation.'],
    ['label' => 'Fast Shipping', 'detail' => 'Most orders arrive in an estimated 6-9 business days.'],
    ['label' => '30-Day Returns', 'detail' => 'Eligible items can be returned within 30 days after delivery.'],
    ['label' => 'Order Tracking', 'detail' => 'Tracking information is shared after shipment.'],
];
?>

<section class="tgm-about-hero">
    <div class="tgm-container tgm-about-hero__grid">
        <div class="tgm-about-hero__content">
            <p class="tgm-eyebrow">About Topgoodmart</p>
            <h1>A Modern Store For Home, Technology And Everyday Living</h1>
            <p>Topgoodmart helps American shoppers discover quality products across home essentials, furniture, electronics and smart lifestyle categories with a clean, reliable shopping experience.</p>
            <div class="tgm-hero__actions">
                <a class="tgm-btn tgm-btn--primary" href="<?php echo esc_url($shop_url); ?>">Shop Products</a>
                <a class="tgm-btn tgm-btn--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Support</a>
            </div>
        </div>
        <div class="tgm-about-hero__media">
            <?php echo dawp_get_responsive_image('https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=86', 'Bright modern home with furniture and everyday living products', '', 760, 560, 'eager', '(max-width: 900px) 100vw, 50vw', 'high'); ?>
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
            <p>Topgoodmart was shaped around a simple idea: online shopping should be organized, practical and easy to trust. Instead of feeling like a crowded marketplace, the store brings together useful products for the home, connected living, kitchen, outdoor spaces and everyday routines.</p>
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
            <?php echo dawp_get_responsive_image('https://images.unsplash.com/photo-1556911220-bff31c812dba?auto=format&fit=crop&w=1200&q=84', 'Kitchen and dining products in a clean modern home', '', 620, 520, 'lazy', '(max-width: 900px) 100vw, 45vw'); ?>
        </div>
        <div class="tgm-about-split__content">
            <p class="tgm-eyebrow">What we carry</p>
            <h2>Departments made for real homes and busy routines.</h2>
            <p>From storage and furniture to smart devices, coffee gear and patio picks, Topgoodmart focuses on categories customers can use often. The assortment is designed to support home upgrades, work-from-home spaces, family routines and convenient online shopping.</p>
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
                    <span><?php echo esc_html(substr($item['label'], 0, 1)); ?></span>
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
