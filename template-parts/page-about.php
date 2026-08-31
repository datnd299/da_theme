<?php
/**
 * Template Part: page-about
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$asset_base = trailingslashit(get_template_directory_uri()) . 'assets/images/luxuryimagecollection (3)/';
$shop_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
?>

<section class="zc-about-hero">
    <div class="zc-wrap zc-about-hero__grid">
        <div class="zc-about-hero__copy">
            <span class="zc-kicker"><?php esc_html_e('About Zorex Craft', 'dawp'); ?></span>
            <h1><?php esc_html_e('Watches Worth Knowing.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Zorex Craft is a modern luxury watch store shaped around discovery, clear comparison and a collector-focused shopping experience.', 'dawp'); ?></p>
            <div class="zc-actions">
                <a class="zc-button zc-button--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="zc-button zc-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
            </div>
        </div>
        <div class="zc-about-hero__visual" aria-hidden="true">
            <figure class="zc-about-frame zc-about-frame--main">
                <img src="<?php echo esc_url($asset_base . '45.jpg'); ?>" alt="">
            </figure>
            <figure class="zc-about-frame zc-about-frame--detail">
                <img src="<?php echo esc_url($asset_base . '46.jpg'); ?>" alt="">
            </figure>
        </div>
    </div>
</section>

<section class="zc-about-strip" aria-label="<?php esc_attr_e('Brand principles', 'dawp'); ?>">
    <div class="zc-wrap zc-about-strip__grid">
        <div><span>01</span><strong><?php esc_html_e('Collector Focus', 'dawp'); ?></strong></div>
        <div><span>02</span><strong><?php esc_html_e('Clean Commerce', 'dawp'); ?></strong></div>
        <div><span>03</span><strong><?php esc_html_e('Confident Discovery', 'dawp'); ?></strong></div>
    </div>
</section>

<section class="zc-about-section zc-about-section--white">
    <div class="zc-wrap zc-about-statement">
        <span class="zc-kicker"><?php esc_html_e('Our Point of View', 'dawp'); ?></span>
        <h2><?php esc_html_e('Premium should still be practical.', 'dawp'); ?></h2>
        <p><?php esc_html_e('We build the shopping journey around strong watch imagery, structured product information and calm page layouts. The result is a store that feels refined without hiding the details people need before they buy.', 'dawp'); ?></p>
    </div>
</section>

<section class="zc-about-section zc-about-section--ice">
    <div class="zc-wrap zc-about-values">
        <article><span></span><h3><?php esc_html_e('Discovery first', 'dawp'); ?></h3><p><?php esc_html_e('Products appear early, categories stay clear and the catalog is designed for quick scanning across desktop and mobile.', 'dawp'); ?></p></article>
        <article><span></span><h3><?php esc_html_e('Information-led', 'dawp'); ?></h3><p><?php esc_html_e('Names, prices and available product details remain readable so every watch can be compared without visual clutter.', 'dawp'); ?></p></article>
        <article><span></span><h3><?php esc_html_e('No inflated claims', 'dawp'); ?></h3><p><?php esc_html_e('We keep the language direct and avoid unsupported heritage, certification, warranty or investment promises.', 'dawp'); ?></p></article>
    </div>
</section>

<section class="zc-about-editorial">
    <figure class="zc-about-editorial__media">
        <img src="<?php echo esc_url($asset_base . '47.jpg'); ?>" alt="<?php esc_attr_e('Watch detail on a collector desk', 'dawp'); ?>">
    </figure>
    <div class="zc-wrap zc-about-editorial__content">
        <span class="zc-kicker"><?php esc_html_e('Built for Collectors', 'dawp'); ?></span>
        <h2><?php esc_html_e('Discovery creates interest. Clarity creates confidence.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Zorex Craft presents modern icons and timeless choices with a commerce-first approach: refined enough to feel special, structured enough to shop with ease.', 'dawp'); ?></p>
        <a class="zc-button zc-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore the Catalog', 'dawp'); ?></a>
    </div>
</section>
