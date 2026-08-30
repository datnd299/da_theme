<?php
/**
 * About page template part for Velmo Custom.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$image_base  = $theme_uri . '/assets/images/luxuryimagecollection%20(2)/';
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
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
?>

<section class="vm-about-hero">
    <div class="vm-about-wrap vm-about-hero__grid">
        <div class="vm-about-hero__copy">
            <span class="vm-kicker"><?php esc_html_e('About Velmo Custom', 'dawp'); ?></span>
            <h1><?php esc_html_e('A modern maison for considered timepieces.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Velmo Custom is a refined luxury watch store focused on precision, craftsmanship and timeless contemporary design.', 'dawp'); ?></p>
            <a class="vm-button vm-button--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover The Collection', 'dawp'); ?></a>
        </div>
        <div class="vm-about-hero__visual" aria-hidden="true">
            <figure class="vm-about-frame vm-about-frame--large">
                <?php echo $velmo_image('31.jpg', __('Velmo Custom editorial watch composition', 'dawp'), 'vm-cover', 'eager'); ?>
            </figure>
            <figure class="vm-about-frame vm-about-frame--small">
                <?php echo $velmo_image('32.jpg', __('Luxury watch dial finishing detail', 'dawp'), 'vm-cover'); ?>
            </figure>
        </div>
    </div>
</section>

<section class="vm-about-statement">
    <div class="vm-about-wrap vm-about-statement__grid">
        <span class="vm-kicker"><?php esc_html_e('Crafted with Precision', 'dawp'); ?></span>
        <h2><?php esc_html_e('Craftsmanship creates distinction. Precision creates trust. The timepiece remains the hero.', 'dawp'); ?></h2>
    </div>
</section>

<section class="vm-about-values">
    <div class="vm-about-wrap vm-about-values__grid">
        <article>
            <span><?php esc_html_e('01', 'dawp'); ?></span>
            <h3><?php esc_html_e('Heritage Precision', 'dawp'); ?></h3>
            <p><?php esc_html_e('We look for clear proportions, legible details and mechanical character that feels composed rather than loud.', 'dawp'); ?></p>
        </article>
        <article>
            <span><?php esc_html_e('02', 'dawp'); ?></span>
            <h3><?php esc_html_e('Contemporary Elegance', 'dawp'); ?></h3>
            <p><?php esc_html_e('Every presentation is edited with restraint: calm space, exact typography and photography that lets the watch speak.', 'dawp'); ?></p>
        </article>
        <article>
            <span><?php esc_html_e('03', 'dawp'); ?></span>
            <h3><?php esc_html_e('Quiet Craftsmanship', 'dawp'); ?></h3>
            <p><?php esc_html_e('Finishing, material, dial balance and wearing presence guide how each timepiece earns its place in the collection.', 'dawp'); ?></p>
        </article>
    </div>
</section>

<section class="vm-about-split">
    <figure class="vm-about-split__image">
        <?php echo $velmo_image('33.jpg', __('Macro view of a luxury watch movement', 'dawp'), 'vm-cover'); ?>
    </figure>
    <div class="vm-about-split__copy">
        <span class="vm-kicker"><?php esc_html_e('The Art of Time', 'dawp'); ?></span>
        <h2><?php esc_html_e('Defined by Detail.', 'dawp'); ?></h2>
        <p><?php esc_html_e('A watch is measured in more than specifications. It is the weight of the case, the rhythm of the dial, the patience of finishing and the confidence of design that will still feel exact years from now.', 'dawp'); ?></p>
    </div>
</section>

<section class="vm-about-feature">
    <div class="vm-about-feature__media" aria-hidden="true">
        <?php echo $velmo_image('34.jpg', __('Velmo Custom luxury watch maison story', 'dawp'), 'vm-cover'); ?>
    </div>
    <div class="vm-about-feature__shade" aria-hidden="true"></div>
    <div class="vm-about-wrap vm-about-feature__content">
        <span class="vm-kicker"><?php esc_html_e('Maison Direction', 'dawp'); ?></span>
        <h2><?php esc_html_e('Heritage precision, contemporary elegance and quiet craftsmanship.', 'dawp'); ?></h2>
    </div>
</section>

<section class="vm-about-concierge">
    <div class="vm-about-wrap vm-about-concierge__grid">
        <div>
            <span class="vm-kicker"><?php esc_html_e('Concierge', 'dawp'); ?></span>
            <h2><?php esc_html_e('Guidance for a precise choice.', 'dawp'); ?></h2>
        </div>
        <div>
            <p><?php esc_html_e('Ask about sizing, movement character, finishing, delivery or the small details that shape a confident selection.', 'dawp'); ?></p>
            <a class="vm-button vm-button--dark" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
        </div>
    </div>
</section>
