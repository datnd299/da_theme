<?php
/**
 * Dynamic collections page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$shop_url = $shop_url ?: home_url('/shop/');
$new_url  = home_url('/new-drops/');
$collections_image = static function ($file, $alt, $loading = 'lazy', $sizes = '100vw') {
    if (function_exists('dawp_get_home_responsive_image')) {
        return dawp_get_home_responsive_image($file, $alt, '', $loading, $sizes);
    }

    return '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/homepage/brickgo/' . $file) . '" alt="' . esc_attr($alt) . '" loading="' . esc_attr($loading) . '" decoding="async">';
};

$categories = [];
if (taxonomy_exists('product_cat')) {
    $categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ]);

    if (is_wp_error($categories)) {
        $categories = [];
    }
}
?>

<section class="home-hero" aria-labelledby="collections-title">
    <div class="home-shell home-hero__grid">
        <div class="home-hero__content">
            <p class="home-kicker"><?php esc_html_e('Collections', 'dawp'); ?></p>
            <h1 id="collections-title"><?php esc_html_e('SHOP BY SHAPE, SCALE, AND OBSESSION.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Every WooCommerce product category appears here automatically, so the page stays current as the catalog grows.', 'dawp'); ?></p>
            <div class="home-actions">
                <a class="home-btn home-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
                <a class="home-btn home-btn--light" href="<?php echo esc_url($new_url); ?>"><?php esc_html_e('New Drops', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
        <div class="home-hero__media">
            <?php echo $collections_image('10.png', __('Organized shelves of collectible figures, builds, and colorful bricks', 'dawp'), 'eager', '(min-width: 900px) 54vw, 100vw'); ?>
            <div class="home-hero__label"><span><?php esc_html_e('Auto updated', 'dawp'); ?></span><strong><?php esc_html_e('All product categories', 'dawp'); ?></strong></div>
        </div>
    </div>
</section>

<section class="home-section home-section--surface" aria-labelledby="collections-grid-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Browse the catalog', 'dawp'); ?></p>
                <h2 id="collections-grid-title"><?php esc_html_e('ALL COLLECTIONS.', 'dawp'); ?></h2>
            </div>
        </div>

        <?php if ($categories) : ?>
            <div class="home-product-grid">
                <?php foreach ($categories as $index => $category) : ?>
                    <?php
                    $category_link = get_term_link($category);
                    if (is_wp_error($category_link)) {
                        continue;
                    }
                    $thumbnail_id = (int) get_term_meta($category->term_id, 'thumbnail_id', true);
                    $image_html = $thumbnail_id ? wp_get_attachment_image($thumbnail_id, 'woocommerce_thumbnail', false, ['loading' => 'lazy']) : '';
                    ?>
                    <article class="home-product-card">
                        <a class="home-product-card__image" href="<?php echo esc_url($category_link); ?>">
                            <?php if ($image_html) : ?>
                                <?php echo $image_html; ?>
                            <?php else : ?>
                                <?php echo $collections_image(dawp_home_image_file($index, ['10.png']), $category->name, 'lazy', '(min-width: 900px) 25vw, 50vw'); ?>
                            <?php endif; ?>
                        </a>
                        <div class="home-product-card__body">
                            <p><?php echo esc_html(sprintf(_n('%s piece', '%s pieces', (int) $category->count, 'dawp'), number_format_i18n((int) $category->count))); ?></p>
                            <h3><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?></a></h3>
                            <strong><?php esc_html_e('Explore', 'dawp'); ?> &rarr;</strong>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('Product categories will appear here after they are added in WooCommerce.', 'dawp'); ?></p>
        <?php endif; ?>
    </div>
</section>
