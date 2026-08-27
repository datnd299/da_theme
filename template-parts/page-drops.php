<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$shop_url = $shop_url ?: home_url('/shop/');
$drops_image = static function ($file, $alt, $loading = 'lazy', $sizes = '100vw') {
    if (function_exists('dawp_get_home_responsive_image')) {
        return dawp_get_home_responsive_image($file, $alt, '', $loading, $sizes);
    }

    return '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/home/' . $file) . '" alt="' . esc_attr($alt) . '" loading="' . esc_attr($loading) . '" decoding="async">';
};
$latest_products = new WP_Query([
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'posts_per_page'      => 8,
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
]);
?>
<section class="home-drop" aria-labelledby="drops-title">
    <div class="home-shell home-drop__grid">
        <div>
            <p class="home-kicker"><?php esc_html_e('Drops', 'dawp'); ?></p>
            <h2 id="drops-title"><?php esc_html_e('GET THE DROP.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Release energy without the noise. Follow the latest published products and keep an eye on the next collectible edit.', 'dawp'); ?></p>
            <div class="home-actions">
                <a class="home-btn home-btn--dark" href="<?php echo esc_url(add_query_arg('orderby', 'date', $shop_url)); ?>"><?php esc_html_e('Shop New Arrivals', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
                <a class="home-btn home-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
        <div class="home-drop__media">
            <?php echo $drops_image('30.png', __('Colorful limited collectible tower staged for an upcoming drop', 'dawp'), 'eager', '(min-width: 900px) 40vw, 100vw'); ?>
        </div>
    </div>
</section>
<section class="home-section home-section--surface" aria-labelledby="drops-latest-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Recently released', 'dawp'); ?></p>
                <h2 id="drops-latest-title"><?php esc_html_e('LATEST DROPS.', 'dawp'); ?></h2>
            </div>
            <a class="home-text-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
        </div>
        <?php if ($latest_products->have_posts()) : ?>
            <div class="home-product-row">
                <?php while ($latest_products->have_posts()) : $latest_products->the_post(); ?>
                    <?php $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : false; ?>
                    <?php if (!$product) { continue; } ?>
                    <article class="home-product-card">
                        <a class="home-product-card__image" href="<?php the_permalink(); ?>">
                            <span class="home-badge"><?php esc_html_e('NEW', 'dawp'); ?></span>
                            <?php echo $product->get_image('woocommerce_thumbnail', ['loading' => 'lazy']); ?>
                        </a>
                        <div class="home-product-card__body">
                            <p><?php esc_html_e('Latest release', 'dawp'); ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <strong><?php echo wp_kses_post($product->get_price_html()); ?></strong>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('Published WooCommerce products will appear here automatically.', 'dawp'); ?></p>
        <?php endif; ?>
    </div>
</section>
