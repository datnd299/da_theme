<?php
/**
 * About page template part for Velmo.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url = home_url('/contact-us/');

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
?>

<section class="vm-about-hero">
    <div class="vm-about-wrap vm-about-hero__grid">
        <div class="vm-about-hero__copy">
            <span class="vm-kicker"><?php esc_html_e('About Velmo', 'dawp'); ?></span>
            <h1><?php esc_html_e('Crafted with Precision.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Velmo is a refined luxury watch store focused on precision, craftsmanship and timeless contemporary design.', 'dawp'); ?></p>
            <a class="vm-button vm-button--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover The Collection', 'dawp'); ?></a>
        </div>
        <div class="vm-about-hero__visual" aria-hidden="true">
            <figure class="vm-about-frame vm-about-frame--large">
                <?php echo $velmo_image('62-v2.jpg', __('Velmo chronograph with a white dial and blue leather strap', 'dawp'), 'vm-cover', 'eager'); ?>
            </figure>
            <figure class="vm-about-frame vm-about-frame--small">
                <?php echo $velmo_image('63-v2.jpg', __('Velmo skeleton chronograph with green sub-dials', 'dawp'), 'vm-cover'); ?>
            </figure>
        </div>
    </div>
</section>

<section class="vm-about-statement">
    <div class="vm-about-wrap vm-about-statement__grid">
        <span class="vm-kicker"><?php esc_html_e('Our Point of View', 'dawp'); ?></span>
        <h2><?php esc_html_e('A watch should feel considered from the first detail to the day it arrives on your wrist.', 'dawp'); ?></h2>
    </div>
</section>

<section class="vm-about-values">
    <div class="vm-about-wrap vm-about-values__grid">
        <article>
            <span><?php esc_html_e('01', 'dawp'); ?></span>
            <h3><?php esc_html_e('Selected With Purpose', 'dawp'); ?></h3>
            <p><?php esc_html_e('Velmo focuses on watches with clear proportions, practical wearability, and details that stay appealing beyond the first impression.', 'dawp'); ?></p>
        </article>
        <article>
            <span><?php esc_html_e('02', 'dawp'); ?></span>
            <h3><?php esc_html_e('One Focused Destination', 'dawp'); ?></h3>
            <p><?php esc_html_e('Velmo brings its collection, order support, and after-purchase service together in one place.', 'dawp'); ?></p>
        </article>
        <article>
            <span><?php esc_html_e('03', 'dawp'); ?></span>
            <h3><?php esc_html_e('Clear Product Detail', 'dawp'); ?></h3>
            <p><?php esc_html_e('Material, finish, dial layout, sizing, and delivery details are presented so customers can compare confidently before ordering.', 'dawp'); ?></p>
        </article>
    </div>
</section>

<section class="vm-about-split">
    <figure class="vm-about-split__image">
        <?php echo $velmo_image('64-v2.jpg', __('Velmo moon-phase watch in rose gold with a brown leather strap', 'dawp'), 'vm-cover'); ?>
    </figure>
    <div class="vm-about-split__copy">
        <span class="vm-kicker"><?php esc_html_e('The Velmo Experience', 'dawp'); ?></span>
        <h2><?php esc_html_e('Built around confident selection.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Choosing a watch is personal. Velmo keeps the experience focused on what customers need to know: how the watch looks, how it wears, how it is supported, and why it belongs in the collection.', 'dawp'); ?></p>
    </div>
</section>

<section class="vm-about-feature">
    <div class="vm-about-feature__media" aria-hidden="true">
        <?php echo $velmo_image('65-v2.jpg', __('Velmo black tonneau watch with a visible tourbillon', 'dawp'), 'vm-cover'); ?>
    </div>
    <div class="vm-about-feature__shade" aria-hidden="true"></div>
    <div class="vm-about-wrap vm-about-feature__content">
        <span class="vm-kicker"><?php esc_html_e('Brand Direction', 'dawp'); ?></span>
        <h2><?php esc_html_e('Precise detail, refined presence, and dependable service.', 'dawp'); ?></h2>
    </div>
</section>

<section class="vm-about-concierge">
    <div class="vm-about-wrap vm-about-concierge__grid">
        <div>
            <span class="vm-kicker"><?php esc_html_e('Customer Support', 'dawp'); ?></span>
            <h2><?php esc_html_e('Here when details matter.', 'dawp'); ?></h2>
        </div>
        <div>
            <p><?php esc_html_e('Ask about sizing, materials, product availability, delivery, returns, or any detail that helps you choose the right Velmo watch.', 'dawp'); ?></p>
            <a class="vm-button vm-button--dark" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
        </div>
    </div>
</section>
