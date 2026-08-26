<?php
/**
 * Dynamic New Drops page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url        = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$shop_url        = $shop_url ?: home_url('/shop/');
$collections_url = home_url('/collections/');
$contact_url     = home_url('/contact-us/');
$culture_url     = home_url('/culture-notes/');
$drops_image      = static function ($file, $alt, $loading = 'lazy', $sizes = '100vw') {
    if (function_exists('dawp_get_home_responsive_image')) {
        return dawp_get_home_responsive_image($file, $alt, '', $loading, $sizes);
    }

    return '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/homepage/brickgo/' . $file) . '" alt="' . esc_attr($alt) . '" loading="' . esc_attr($loading) . '" decoding="async">';
};

$explore_banners = [
    [
        'url'         => $shop_url,
        'title'       => __('SHOP ALL', 'dawp'),
        'description' => __('Every figure, build, box, and display piece.', 'dawp'),
        'image'       => '15.png',
        'alt'         => __('A mixed collection of wooden toy buildings and display pieces', 'dawp'),
    ],
    [
        'url'         => $collections_url,
        'title'       => __('COLLECTIONS', 'dawp'),
        'description' => __('Browse the catalog by WooCommerce category.', 'dawp'),
        'image'       => '8.png',
        'alt'         => __('Colorful wooden shape blocks grouped for a collection display', 'dawp'),
    ],
    [
        'url'         => $contact_url,
        'title'       => __('CONTACT', 'dawp'),
        'description' => __('Questions about an order, release, or return.', 'dawp'),
        'image'       => '3.png',
        'alt'         => __('Collectible building pieces arranged beside order support materials', 'dawp'),
    ],
    [
        'url'         => $culture_url,
        'title'       => __('CULTURE NOTES', 'dawp'),
        'description' => __('Display ideas and collecting habits.', 'dawp'),
        'image'       => '20.png',
        'alt'         => __('Collected wooden miniatures styled as a display inspiration scene', 'dawp'),
    ],
];

$products = new WP_Query([
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'posts_per_page'      => 50,
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
]);
?>

<section class="home-hero" aria-labelledby="new-drops-title">
    <div class="home-shell home-hero__grid">
        <div class="home-hero__content">
            <p class="home-kicker"><?php esc_html_e('New Drops', 'dawp'); ?></p>
            <h1 id="new-drops-title"><?php esc_html_e('NEW OBSESSIONS JUST LANDED.', 'dawp'); ?></h1>
            <p><?php esc_html_e('The newest WooCommerce products, ordered by release date and refreshed automatically as products are published.', 'dawp'); ?></p>
            <div class="home-actions">
                <a class="home-btn home-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
                <a class="home-btn home-btn--light" href="<?php echo esc_url($collections_url); ?>"><?php esc_html_e('Collections', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
        <div class="home-hero__media">
            <?php echo $drops_image('11.png', __('Fresh collectible architecture builds arranged on a gallery shelf', 'dawp'), 'eager', '(min-width: 900px) 54vw, 100vw'); ?>
            <div class="home-hero__label"><span><?php esc_html_e('Latest first', 'dawp'); ?></span><strong><?php esc_html_e('Around 50 newest products', 'dawp'); ?></strong></div>
        </div>
    </div>
</section>

<section class="home-section home-section--surface" aria-labelledby="new-drops-grid-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Fresh arrivals', 'dawp'); ?></p>
                <h2 id="new-drops-grid-title"><?php esc_html_e('JUST DROPPED.', 'dawp'); ?></h2>
            </div>
        </div>
        <?php if ($products->have_posts()) : ?>
            <div class="home-product-grid">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <?php $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : false; ?>
                    <?php if (!$product) { continue; } ?>
                    <article class="home-product-card">
                        <a class="home-product-card__image" href="<?php the_permalink(); ?>">
                            <span class="home-badge"><?php esc_html_e('NEW', 'dawp'); ?></span>
                            <?php echo $product->get_image('woocommerce_thumbnail', ['loading' => 'lazy']); ?>
                        </a>
                        <div class="home-product-card__body">
                            <p><?php echo esc_html(function_exists('wc_get_product_category_list') && wc_get_product_category_list($product->get_id(), ', ', '', '') ? wp_strip_all_tags(wc_get_product_category_list($product->get_id(), ', ', '', '')) : __('Collectible', 'dawp')); ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <strong><?php echo wp_kses_post($product->get_price_html()); ?></strong>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('New products will appear here after they are published in WooCommerce.', 'dawp'); ?></p>
        <?php endif; ?>
    </div>
</section>

<section class="home-section" aria-labelledby="new-drops-banners-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Keep exploring', 'dawp'); ?></p>
                <h2 id="new-drops-banners-title"><?php esc_html_e('NEXT MOVES.', 'dawp'); ?></h2>
            </div>
        </div>
        <div class="home-picks">
            <?php foreach ($explore_banners as $banner) : ?>
                <article class="home-pick-card">
                    <?php echo $drops_image($banner['image'], $banner['alt'], 'lazy', '(min-width: 900px) 33vw, 82vw'); ?>
                    <div>
                        <p><?php esc_html_e('Editorial path', 'dawp'); ?></p>
                        <h3><?php echo esc_html($banner['title']); ?></h3>
                        <a href="<?php echo esc_url($banner['url']); ?>"><?php echo esc_html($banner['description']); ?> &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
