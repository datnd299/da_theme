<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$shop_url = $shop_url ?: home_url('/shop/');
$discover_image = static function ($file, $alt, $loading = 'lazy', $sizes = '100vw') {
    if (function_exists('dawp_get_home_responsive_image')) {
        return dawp_get_home_responsive_image($file, $alt, '', $loading, $sizes);
    }

    return '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/home/' . $file) . '" alt="' . esc_attr($alt) . '" loading="' . esc_attr($loading) . '" decoding="async">';
};
?>
<section class="home-hero" aria-labelledby="discover-title">
    <div class="home-shell home-hero__grid">
        <div class="home-hero__content">
            <p class="home-kicker"><?php esc_html_e('Discover', 'dawp'); ?></p>
            <h1 id="discover-title"><?php esc_html_e('BUILD. COLLECT. DISPLAY.', 'dawp'); ?></h1>
            <p><?php esc_html_e('A clean hub for new releases, category browsing, and display-worthy objects.', 'dawp'); ?></p>
        </div>
        <div class="home-hero__media">
            <?php echo $discover_image('25.png', __('Curated collectible architecture and geometric builds on shelves', 'dawp'), 'eager', '(min-width: 900px) 54vw, 100vw'); ?>
        </div>
    </div>
</section>
<section class="home-section home-section--surface">
    <div class="home-shell home-collection-grid home-discover-grid">
        <?php foreach ([[add_query_arg('orderby', 'date', $shop_url), 'NEW ARRIVALS', 'Fresh finds', '26.png'], [$shop_url, 'CATEGORIES', 'Shop by category', '27.png'], [$shop_url, 'SHOP ALL', 'Full catalog', '28.png'], [home_url('/about-us/'), 'ABOUT', 'Why we curate', '29.png']] as $item) : ?>
            <a class="home-collection-card" href="<?php echo esc_url($item[0]); ?>">
                <?php echo $discover_image($item[3], '', 'lazy', '(min-width: 900px) 33vw, 82vw'); ?>
                <span><em><?php echo esc_html($item[2]); ?></em><strong><?php echo esc_html($item[1]); ?></strong><small><?php esc_html_e('Explore', 'dawp'); ?> &rarr;</small></span>
            </a>
        <?php endforeach; ?>
    </div>
</section>
