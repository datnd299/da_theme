<?php
/**
 * Homepage template.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$asset_base = trailingslashit(get_template_directory_uri()) . 'assets/images/luxuryimagecollection (3)/';
$shop_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!function_exists('zc_home_products')) {
    function zc_home_products($args = []) {
        if (!class_exists('WooCommerce')) {
            return [];
        }

        return wc_get_products(wp_parse_args($args, [
            'status' => 'publish',
            'limit'  => 4,
        ]));
    }
}

if (!function_exists('zc_home_product_card')) {
    function zc_home_product_card($product) {
        if (!$product instanceof WC_Product) {
            return;
        }

        $image_id = $product->get_image_id();
        $image    = $image_id ? wp_get_attachment_image($image_id, 'woocommerce_thumbnail', false, [
            'class'   => 'zc-product__image',
            'loading' => 'lazy',
        ]) : wc_placeholder_img('woocommerce_thumbnail', ['class' => 'zc-product__image']);
        ?>
        <article class="zc-product">
            <a class="zc-product__media" href="<?php echo esc_url($product->get_permalink()); ?>" aria-label="<?php echo esc_attr($product->get_name()); ?>">
                <?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </a>
            <div class="zc-product__body">
                <a class="zc-product__name" href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                <div class="zc-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
            </div>
        </article>
        <?php
    }
}

$featured_products = zc_home_products([
    'limit'    => 4,
    'featured' => true,
    'orderby'  => 'date',
    'order'    => 'DESC',
]);

if (count($featured_products) < 4) {
    $featured_products = zc_home_products([
        'limit'   => 4,
        'orderby' => 'date',
        'order'   => 'DESC',
    ]);
}

$latest_products = zc_home_products([
    'limit'   => 8,
    'orderby' => 'date',
    'order'   => 'DESC',
]);

$popular_products = zc_home_products([
    'limit'   => 4,
    'orderby' => 'popularity',
    'order'   => 'DESC',
]);

$style_categories = function_exists('qb_product_category_definitions') ? qb_product_category_definitions() : [];
?>

<section class="zc-hero">
    <div class="zc-wrap zc-hero__grid">
        <div class="zc-hero__copy">
            <span class="zc-kicker"><?php esc_html_e('Watches Worth Knowing', 'dawp'); ?></span>
            <h1><?php esc_html_e('Find Your Next Timepiece.', 'dawp'); ?></h1>
            <p><?php esc_html_e('A modern luxury watch destination built for clear discovery, confident comparison and collector-focused shopping.', 'dawp'); ?></p>
            <div class="zc-actions">
                <a class="zc-button zc-button--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="zc-button zc-button--secondary" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Zorex', 'dawp'); ?></a>
            </div>
        </div>

        <div class="zc-hero__visual" aria-hidden="true">
            <figure class="zc-hero__frame zc-hero__frame--main">
                <img src="<?php echo esc_url($asset_base . '41.jpg'); ?>" alt="">
            </figure>
            <figure class="zc-hero__frame zc-hero__frame--detail">
                <img src="<?php echo esc_url($asset_base . '42.jpg'); ?>" alt="">
            </figure>
            <div class="zc-hero__mark">
                <span><?php esc_html_e('Modern Icons', 'dawp'); ?></span>
                <strong><?php esc_html_e('Timeless Choices', 'dawp'); ?></strong>
            </div>
        </div>
    </div>
</section>

<section class="zc-trust" aria-label="<?php esc_attr_e('Store highlights', 'dawp'); ?>">
    <div class="zc-wrap zc-trust__grid">
        <div><span>01</span><strong><?php esc_html_e('Product-led discovery', 'dawp'); ?></strong></div>
        <div><span>02</span><strong><?php esc_html_e('Dynamic WooCommerce catalog', 'dawp'); ?></strong></div>
        <div><span>03</span><strong><?php esc_html_e('Built for collectors', 'dawp'); ?></strong></div>
    </div>
</section>

<?php if ($featured_products) : ?>
<section class="zc-section zc-section--white">
    <div class="zc-wrap">
        <div class="zc-section__head">
            <div>
                <span class="zc-kicker"><?php esc_html_e('Featured Products', 'dawp'); ?></span>
                <h2><?php esc_html_e('Discover Watches That Matter.', 'dawp'); ?></h2>
            </div>
            <a class="zc-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all', 'dawp'); ?></a>
        </div>
        <div class="zc-products zc-products--four">
            <?php foreach ($featured_products as $product) : ?>
                <?php zc_home_product_card($product); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="zc-style">
    <div class="zc-wrap zc-style__grid">
        <div class="zc-style__copy">
            <span class="zc-kicker"><?php esc_html_e('Shop by Style', 'dawp'); ?></span>
            <h2><?php esc_html_e('A cleaner way to browse luxury watches.', 'dawp'); ?></h2>
        </div>
        <div class="zc-style__list">
            <?php if ($style_categories) : ?>
                <?php $style_index = 0; ?>
                <?php foreach ($style_categories as $slug => $category) : ?>
                    <?php $style_index++; ?>
                    <a href="<?php echo esc_url(function_exists('qb_product_category_url') ? qb_product_category_url($slug) : home_url('/product-category/' . trailingslashit($slug))); ?>">
                        <span><?php echo esc_html(str_pad((string) $style_index, 2, '0', STR_PAD_LEFT)); ?></span>
                        <strong><?php echo esc_html($category['name']); ?></strong>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <a href="<?php echo esc_url($shop_url); ?>"><span>01</span><strong><?php esc_html_e('Dress Watches', 'dawp'); ?></strong></a>
                <a href="<?php echo esc_url($shop_url); ?>"><span>02</span><strong><?php esc_html_e('Sport Watches', 'dawp'); ?></strong></a>
                <a href="<?php echo esc_url($shop_url); ?>"><span>03</span><strong><?php esc_html_e('Daily Icons', 'dawp'); ?></strong></a>
                <a href="<?php echo esc_url($shop_url); ?>"><span>04</span><strong><?php esc_html_e('Collector Picks', 'dawp'); ?></strong></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($latest_products) : ?>
<section class="zc-section zc-section--chalk">
    <div class="zc-wrap">
        <div class="zc-section__head">
            <div>
                <span class="zc-kicker"><?php esc_html_e('Latest Watches', 'dawp'); ?></span>
                <h2><?php esc_html_e('Fresh arrivals, easy to compare.', 'dawp'); ?></h2>
            </div>
            <a class="zc-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop latest', 'dawp'); ?></a>
        </div>
        <div class="zc-products zc-products--eight">
            <?php foreach ($latest_products as $product) : ?>
                <?php zc_home_product_card($product); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="zc-collector">
    <figure class="zc-collector__media">
        <img src="<?php echo esc_url($asset_base . '43.jpg'); ?>" alt="<?php esc_attr_e('Luxury watch detail', 'dawp'); ?>">
    </figure>
    <div class="zc-wrap zc-collector__content">
        <span class="zc-kicker"><?php esc_html_e('Collector Feature', 'dawp'); ?></span>
        <h2><?php esc_html_e('Modern Icons. Timeless Choices.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Built around strong imagery, structured product information and a calm buying flow for people who know what they are looking at.', 'dawp'); ?></p>
        <a class="zc-button zc-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore the catalog', 'dawp'); ?></a>
    </div>
</section>

<?php if ($popular_products) : ?>
<section class="zc-section zc-section--white">
    <div class="zc-wrap zc-featured-grid">
        <aside class="zc-blue-panel">
            <span class="zc-kicker"><?php esc_html_e('Products', 'dawp'); ?></span>
            <h2><?php esc_html_e('Browse with clarity.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Product cards keep the essentials visible: image, name and live price from WooCommerce.', 'dawp'); ?></p>
        </aside>
        <div class="zc-products zc-products--four">
            <?php foreach ($popular_products as $product) : ?>
                <?php zc_home_product_card($product); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="zc-why">
    <div class="zc-wrap">
        <div class="zc-section__head">
            <div>
                <span class="zc-kicker"><?php esc_html_e('Why Zorex', 'dawp'); ?></span>
                <h2><?php esc_html_e('Trust comes from clarity.', 'dawp'); ?></h2>
            </div>
        </div>
        <div class="zc-why__grid">
            <article><span></span><h3><?php esc_html_e('Clean comparison', 'dawp'); ?></h3><p><?php esc_html_e('Structured grids help visitors scan products and prices without visual noise.', 'dawp'); ?></p></article>
            <article><span></span><h3><?php esc_html_e('Collector focus', 'dawp'); ?></h3><p><?php esc_html_e('Concise copy and editorial watch imagery support discovery without inflated claims.', 'dawp'); ?></p></article>
            <article><span></span><h3><?php esc_html_e('Commerce first', 'dawp'); ?></h3><p><?php esc_html_e('Shop, search, account and cart remain close to the buying journey on every screen.', 'dawp'); ?></p></article>
        </div>
    </div>
</section>

<section class="zc-editorial">
    <div class="zc-wrap zc-editorial__grid">
        <figure>
            <img src="<?php echo esc_url($asset_base . '44.jpg'); ?>" alt="<?php esc_attr_e('Watch collector desk', 'dawp'); ?>">
        </figure>
        <div>
            <span class="zc-kicker"><?php esc_html_e('Editorial', 'dawp'); ?></span>
            <h2><?php esc_html_e('Discovery creates interest. Clarity creates confidence.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Zorex Craft balances refined presentation with practical shopping paths, making the homepage feel premium without slowing down the catalog.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="zc-newsletter">
    <div class="zc-wrap zc-newsletter__grid">
        <div>
            <span class="zc-kicker"><?php esc_html_e('Newsletter', 'dawp'); ?></span>
            <h2><?php esc_html_e('Notes for collectors.', 'dawp'); ?></h2>
        </div>
        <form class="zc-newsletter__form" action="#" method="post">
            <label class="screen-reader-text" for="zc-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="zc-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>">
            <button class="zc-button zc-button--primary" type="submit"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
        </form>
    </div>
</section>
