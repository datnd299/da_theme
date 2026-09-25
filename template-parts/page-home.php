<?php
/**
 * Homepage template part for Velmo.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$about_url   = home_url('/about-us/');
$contact_url = home_url('/contact-us/');

$newsletter_status   = isset($_GET['newsletter_status']) ? sanitize_key(wp_unslash($_GET['newsletter_status'])) : '';
$newsletter_messages = [
    'sent'    => __('Thank you. Your sign-up request has been received.', 'dawp'),
    'invalid' => __('Please enter a valid email address and confirm your consent.', 'dawp'),
    'failed'  => __('We could not process your sign-up right now. Please try again later or contact support.', 'dawp'),
];

$velmo_image = static function ($file, $alt, $class = '', $loading = 'lazy') {
    $src = qb_velmo_image_url($file);

    if (function_exists('qb_responsive_image')) {
        return qb_responsive_image($src, $alt, [
            'class'   => $class,
            'width'   => 1440,
            'height'  => 980,
            'widths'  => [420, 640, 900, 1200, 1440],
            'sizes'   => '(max-width: 760px) 100vw, 70vw',
            'loading' => $loading,
        ]);
    }

    return sprintf('<img class="%s" src="%s" alt="%s" loading="%s">', esc_attr($class), esc_url($src), esc_attr($alt), esc_attr($loading));
};

$render_product = static function ($product_id) {
    $product = wc_get_product($product_id);

    if (!$product || !$product->is_visible()) {
        return;
    }

    $image_id  = $product->get_image_id();
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'woocommerce_single') : '';
    $image_url = $image_url ?: (function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_single') : '');
    ?>
    <article class="vm-product">
        <a class="vm-product__media" href="<?php echo esc_url(get_permalink($product_id)); ?>" aria-label="<?php echo esc_attr($product->get_name()); ?>">
            <?php
            if (function_exists('qb_responsive_image')) {
                echo qb_responsive_image($image_url, $product->get_name(), [
                    'class'  => 'vm-product__image',
                    'width'  => 620,
                    'height' => 760,
                    'widths' => [260, 360, 480, 620],
                    'sizes'  => '(max-width: 700px) 50vw, (max-width: 1100px) 33vw, 25vw',
                ]);
            } else {
                echo wp_kses_post($product->get_image('woocommerce_single', ['class' => 'vm-product__image']));
            }
            ?>
        </a>
        <div class="vm-product__info">
            <h3><a href="<?php echo esc_url(get_permalink($product_id)); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
            <div><?php echo wp_kses_post($product->get_price_html()); ?></div>
        </div>
    </article>
    <?php
};

$featured_products = [];
$latest_products   = [];

if (class_exists('WooCommerce')) {
    $featured_products = wc_get_products([
        'status'   => 'publish',
        'featured' => true,
        'limit'    => 4,
        'return'   => 'ids',
    ]);

    if (count($featured_products) < 4) {
        $featured_products = array_values(array_unique(array_merge($featured_products, wc_get_products([
            'status'  => 'publish',
            'orderby' => 'date',
            'order'   => 'DESC',
            'limit'   => 4,
            'return'  => 'ids',
        ]))));
        $featured_products = array_slice($featured_products, 0, 4);
    }

    $latest_products = wc_get_products([
        'status'  => 'publish',
        'orderby' => 'date',
        'order'   => 'DESC',
        'limit'   => 6,
        'return'  => 'ids',
    ]);
}
?>

<section class="vm-hero">
    <div class="vm-hero__media" aria-hidden="true">
        <?php echo $velmo_image('70-v2.jpg', __('Velmo chronograph with a marbled black case and sparkling blue dial', 'dawp'), 'vm-cover', 'eager'); ?>
    </div>
    <div class="vm-hero__shade" aria-hidden="true"></div>
    <div class="vm-wrap vm-hero__content">
        <span class="vm-kicker"><?php esc_html_e('Velmo', 'dawp'); ?></span>
        <h1><?php esc_html_e('Velmo Watches, Crafted with Precision.', 'dawp'); ?></h1>
        <p><?php esc_html_e('Discover the Velmo watch collection: refined timepieces with clear design, dependable detail, and confident daily wear.', 'dawp'); ?></p>
        <a class="vm-button vm-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover The Collection', 'dawp'); ?></a>
    </div>
</section>

<section class="vm-intro">
    <div class="vm-wrap vm-intro__grid">
        <div class="vm-intro__copy">
            <span><?php esc_html_e('Brand Direction', 'dawp'); ?></span>
            <h2><?php esc_html_e('Selected watches. Clear details. Confident choice.', 'dawp'); ?></h2>
        </div>
        <div class="vm-intro__notes" aria-label="<?php esc_attr_e('Velmo brand direction', 'dawp'); ?>">
            <span><?php esc_html_e('Brand Direction', 'dawp'); ?></span>
            <ul>
                <li><?php esc_html_e('Precise Detail', 'dawp'); ?></li>
                <li><?php esc_html_e('Refined Presence', 'dawp'); ?></li>
                <li><?php esc_html_e('Dependable Service', 'dawp'); ?></li>
            </ul>
        </div>
    </div>
</section>

<?php if (!empty($featured_products)) : ?>
    <section class="vm-novelties">
        <div class="vm-wrap">
            <div class="vm-section-head vm-section-head--center">
                <span class="vm-kicker"><?php esc_html_e('Featured Velmo Watches', 'dawp'); ?></span>
                <h2><?php esc_html_e('Selected models for a confident choice', 'dawp'); ?></h2>
            </div>
            <div class="vm-product-row">
                <?php foreach ($featured_products as $product_id) : ?>
                    <?php $render_product($product_id); ?>
                <?php endforeach; ?>
            </div>
            <div class="vm-center">
                <a class="vm-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Show all timepieces', 'dawp'); ?></a>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="vm-split vm-split--image-left">
    <figure class="vm-split__image">
        <?php echo $velmo_image('58-v2.jpg', __('Velmo skeleton watch with a rose-gold-tone bezel and brown leather strap', 'dawp'), 'vm-cover'); ?>
    </figure>
    <div class="vm-split__copy">
        <span class="vm-kicker"><?php esc_html_e('Signature Details', 'dawp'); ?></span>
        <h2><?php esc_html_e('Detail that earns attention.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Every Velmo watch is presented around the details that matter most: case shape, dial balance, material finish, wearing presence, and the confidence of the full purchase experience.', 'dawp'); ?></p>
        <a class="vm-link" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('Explore Velmo', 'dawp'); ?></a>
    </div>
</section>

<section class="vm-feature">
    <div class="vm-feature__media" aria-hidden="true">
        <?php echo $velmo_image('59-v2.jpg', __('Velmo blue-dial chronograph in silver and rose-gold tones', 'dawp'), 'vm-cover'); ?>
    </div>
    <div class="vm-wrap vm-feature__content">
        <span class="vm-kicker"><?php esc_html_e('Signature Details', 'dawp'); ?></span>
        <h2><?php esc_html_e('A focused collection, delivered with care.', 'dawp'); ?></h2>
        <a class="vm-button vm-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View Timepieces', 'dawp'); ?></a>
    </div>
</section>

<?php if (!empty($latest_products)) : ?>
    <section class="vm-collection">
        <div class="vm-wrap">
            <div class="vm-section-head">
                <div>
                    <span class="vm-kicker"><?php esc_html_e('Latest Velmo Collection', 'dawp'); ?></span>
                    <h2><?php esc_html_e('New arrivals from the Velmo lineup.', 'dawp'); ?></h2>
                </div>
                <a class="vm-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop collection', 'dawp'); ?></a>
            </div>
            <div class="vm-product-grid">
                <?php foreach ($latest_products as $product_id) : ?>
                    <?php $render_product($product_id); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="vm-split vm-split--text-left">
    <div class="vm-split__copy">
        <span class="vm-kicker"><?php esc_html_e('About Velmo', 'dawp'); ?></span>
        <h2><?php esc_html_e('A watch house built on precision.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Velmo presents its collection with a focus on refined timepieces, transparent product information, and support before and after purchase.', 'dawp'); ?></p>
        <a class="vm-link" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('Learn about Velmo', 'dawp'); ?></a>
    </div>
    <figure class="vm-split__image">
        <?php echo $velmo_image('60-v2.jpg', __('Velmo rose-gold-tone skeleton chronograph on a navy backdrop', 'dawp'), 'vm-cover'); ?>
    </figure>
</section>

<section class="vm-boutique">
    <div class="vm-wrap vm-boutique__grid">
        <figure>
            <?php echo $velmo_image('61-v2.jpg', __('Velmo open-heart watch with a blue strap on black marble', 'dawp'), 'vm-cover'); ?>
        </figure>
        <div>
            <span class="vm-kicker"><?php esc_html_e('Customer Support', 'dawp'); ?></span>
            <h2><?php esc_html_e('Guidance before you choose.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Ask about fit, materials, product detail, delivery, returns, or anything you want to confirm before selecting your Velmo watch.', 'dawp'); ?></p>
            <a class="vm-button vm-button--dark" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
        </div>
    </div>
</section>

<section class="vm-newsletter" id="newsletter">
    <div class="vm-wrap vm-newsletter__grid">
        <div>
            <span class="vm-kicker"><?php esc_html_e('Newsletter', 'dawp'); ?></span>
            <h2><?php esc_html_e('Velmo arrivals and updates.', 'dawp'); ?></h2>
        </div>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="dawp_newsletter_form">
            <?php wp_nonce_field('dawp_newsletter_form', 'dawp_newsletter_nonce'); ?>
            <div class="vm-newsletter__trap" aria-hidden="true">
                <label for="vm-newsletter-website"><?php esc_html_e('Website', 'dawp'); ?></label>
                <input id="vm-newsletter-website" type="text" name="website" tabindex="-1" autocomplete="off">
            </div>
            <label class="qb-sr-only" for="vm-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="vm-newsletter-email" type="email" name="email" autocomplete="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" required>
            <button class="vm-button vm-button--dark" type="submit"><?php esc_html_e('Sign up', 'dawp'); ?></button>
            <label class="vm-newsletter__consent">
                <input type="checkbox" name="newsletter_consent" value="1" required>
                <span><?php
                    printf(
                        /* translators: %s: privacy policy link. */
                        esc_html__('I agree to receive Velmo arrivals and updates by email and can unsubscribe at any time. See our %s.', 'dawp'),
                        '<a href="' . esc_url(home_url('/privacy-policy/')) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>'
                    );
                ?></span>
            </label>
            <?php if ($newsletter_status && isset($newsletter_messages[$newsletter_status])) : ?>
                <p class="vm-newsletter__status vm-newsletter__status--<?php echo esc_attr($newsletter_status); ?>" role="status"><?php echo esc_html($newsletter_messages[$newsletter_status]); ?></p>
            <?php endif; ?>
        </form>
    </div>
</section>
