<?php
/**
 * Homepage template part for Velmo Custom.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$image_base  = $theme_uri . '/assets/images/luxuryimagecollection%20(2)/';
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$about_url   = home_url('/about-us/');
$contact_url = home_url('/contact-us/');

$velmo_image = static function ($file, $alt, $class = '', $loading = 'lazy') use ($image_base) {
    $src = $image_base . rawurlencode($file);

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
        <?php echo $velmo_image('34.jpg', __('Velmo Custom luxury watch campaign', 'dawp'), 'vm-cover', 'eager'); ?>
    </div>
    <div class="vm-hero__shade" aria-hidden="true"></div>
    <div class="vm-wrap vm-hero__content">
        <span class="vm-kicker"><?php esc_html_e('Velmo Custom', 'dawp'); ?></span>
        <h1><?php esc_html_e('Crafted with Precision.', 'dawp'); ?></h1>
        <p><?php esc_html_e('Luxury timepieces selected for clarity, proportion and enduring mechanical character.', 'dawp'); ?></p>
        <a class="vm-button vm-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover The Collection', 'dawp'); ?></a>
    </div>
</section>

<section class="vm-intro">
    <div class="vm-wrap vm-intro__grid">
        <p><?php esc_html_e('A calm, highly edited watch destination where craftsmanship, precision and the timepiece itself remain at the center.', 'dawp'); ?></p>
        <div>
            <span><?php esc_html_e('Maison Direction', 'dawp'); ?></span>
            <strong><?php esc_html_e('Heritage Precision / Contemporary Elegance / Quiet Craftsmanship', 'dawp'); ?></strong>
        </div>
    </div>
</section>

<?php if (!empty($featured_products)) : ?>
    <section class="vm-novelties">
        <div class="vm-wrap">
            <div class="vm-section-head vm-section-head--center">
                <span class="vm-kicker"><?php esc_html_e('Featured Timepieces', 'dawp'); ?></span>
                <h2><?php esc_html_e('Discover our selection', 'dawp'); ?></h2>
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
        <?php echo $velmo_image('27.jpg', __('Watch dial and finishing detail', 'dawp'), 'vm-cover'); ?>
    </figure>
    <div class="vm-split__copy">
        <span class="vm-kicker"><?php esc_html_e('Exceptional Craftsmanship', 'dawp'); ?></span>
        <h2><?php esc_html_e('Precision in Every Detail.', 'dawp'); ?></h2>
        <p><?php esc_html_e('The beauty of a watch begins in restraint: polished edges, measured markers, controlled negative space and materials that reward a closer look.', 'dawp'); ?></p>
        <a class="vm-link" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('Explore our craft', 'dawp'); ?></a>
    </div>
</section>

<section class="vm-feature">
    <div class="vm-feature__media" aria-hidden="true">
        <?php echo $velmo_image('28.jpg', __('Velmo Custom macro watch movement', 'dawp'), 'vm-cover'); ?>
    </div>
    <div class="vm-wrap vm-feature__content">
        <span class="vm-kicker"><?php esc_html_e('Signature Details', 'dawp'); ?></span>
        <h2><?php esc_html_e('Defined by the quiet work of finishing.', 'dawp'); ?></h2>
        <a class="vm-button vm-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View Timepieces', 'dawp'); ?></a>
    </div>
</section>

<?php if (!empty($latest_products)) : ?>
    <section class="vm-collection">
        <div class="vm-wrap">
            <div class="vm-section-head">
                <div>
                    <span class="vm-kicker"><?php esc_html_e('Latest Collection', 'dawp'); ?></span>
                    <h2><?php esc_html_e('Designed to Endure.', 'dawp'); ?></h2>
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
        <span class="vm-kicker"><?php esc_html_e('The House of Velmo', 'dawp'); ?></span>
        <h2><?php esc_html_e('A modern maison for considered timepieces.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Velmo Custom brings an editorial eye to luxury watch ecommerce: selective, precise and intentionally quiet.', 'dawp'); ?></p>
        <a class="vm-link" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('Discover the maison', 'dawp'); ?></a>
    </div>
    <figure class="vm-split__image">
        <?php echo $velmo_image('29.jpg', __('Velmo Custom maison editorial image', 'dawp'), 'vm-cover'); ?>
    </figure>
</section>

<section class="vm-boutique">
    <div class="vm-wrap vm-boutique__grid">
        <figure>
            <?php echo $velmo_image('30.jpg', __('Velmo Custom boutique consultation', 'dawp'), 'vm-cover'); ?>
        </figure>
        <div>
            <span class="vm-kicker"><?php esc_html_e('Concierge', 'dawp'); ?></span>
            <h2><?php esc_html_e('Guidance for a precise choice.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Ask about sizing, movement character, finishing, delivery or the details that matter before selecting your next watch.', 'dawp'); ?></p>
            <a class="vm-button vm-button--dark" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
        </div>
    </div>
</section>

<section class="vm-newsletter">
    <div class="vm-wrap vm-newsletter__grid">
        <div>
            <span class="vm-kicker"><?php esc_html_e('Newsletter', 'dawp'); ?></span>
            <h2><?php esc_html_e('New arrivals, quietly announced.', 'dawp'); ?></h2>
        </div>
        <form action="<?php echo esc_url(home_url('/')); ?>" method="post">
            <label class="qb-sr-only" for="vm-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="vm-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" required>
            <button class="vm-button vm-button--dark" type="submit"><?php esc_html_e('Sign up', 'dawp'); ?></button>
        </form>
    </div>
</section>
