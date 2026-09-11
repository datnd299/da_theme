<?php
/**
 * Homepage template.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$asset_base = trailingslashit(get_template_directory_uri()) . 'assets/images/Zorexwatch/';
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
            <span class="zc-kicker"><?php esc_html_e('Zorex Craft Watches', 'dawp'); ?></span>
            <h1><?php esc_html_e('Timepieces Designed by Zorex.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Explore Zorex Craft watches made for refined daily wear, clear product detail and a direct brand shopping experience.', 'dawp'); ?></p>
            <div class="zc-actions">
                <a class="zc-button zc-button--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="zc-button zc-button--secondary" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Zorex', 'dawp'); ?></a>
            </div>
        </div>

        <div class="zc-hero__visual" aria-hidden="true">
            <figure class="zc-hero__frame zc-hero__frame--main">
                <img src="<?php echo esc_url($asset_base . '9.png'); ?>" alt="">
            </figure>
            <figure class="zc-hero__frame zc-hero__frame--detail">
                <img src="<?php echo esc_url($asset_base . '10.png'); ?>" alt="">
            </figure>
            <div class="zc-hero__mark">
                <span><?php esc_html_e('Zorex Design', 'dawp'); ?></span>
                <strong><?php esc_html_e('Made to Wear', 'dawp'); ?></strong>
            </div>
        </div>
    </div>
</section>

<section class="zc-trust" aria-label="<?php esc_attr_e('Store highlights', 'dawp'); ?>">
    <div class="zc-wrap zc-trust__grid">
        <div><span>01</span><strong><?php esc_html_e('Zorex original watches', 'dawp'); ?></strong></div>
        <div><span>02</span><strong><?php esc_html_e('Direct brand catalog', 'dawp'); ?></strong></div>
        <div><span>03</span><strong><?php esc_html_e('Clear product details', 'dawp'); ?></strong></div>
    </div>
</section>

<?php if ($featured_products) : ?>
<section class="zc-section zc-section--white">
    <div class="zc-wrap">
        <div class="zc-section__head">
            <div>
                <span class="zc-kicker"><?php esc_html_e('Featured Zorex Watches', 'dawp'); ?></span>
                <h2><?php esc_html_e('Signature pieces from our line.', 'dawp'); ?></h2>
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
            <h2><?php esc_html_e('Browse the Zorex range by style.', 'dawp'); ?></h2>
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
                <span class="zc-kicker"><?php esc_html_e('Latest Zorex Watches', 'dawp'); ?></span>
                <h2><?php esc_html_e('New releases, easy to compare.', 'dawp'); ?></h2>
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
        <img src="<?php echo esc_url($asset_base . '11.png'); ?>" alt="<?php esc_attr_e('Luxury watch detail', 'dawp'); ?>">
    </figure>
    <div class="zc-wrap zc-collector__content">
        <span class="zc-kicker"><?php esc_html_e('Brand Detail', 'dawp'); ?></span>
        <h2><?php esc_html_e('Designed for presence, built for everyday rhythm.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Each Zorex Craft watch is presented with clear imagery, essential specifications and a calm buying flow from our brand to your wrist.', 'dawp'); ?></p>
        <a class="zc-button zc-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore Zorex watches', 'dawp'); ?></a>
    </div>
</section>

<?php if ($popular_products) : ?>
<section class="zc-section zc-section--white">
    <div class="zc-wrap zc-featured-grid">
        <aside class="zc-blue-panel">
            <span class="zc-kicker"><?php esc_html_e('Products', 'dawp'); ?></span>
            <h2><?php esc_html_e('Choose with clarity.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Zorex product cards keep the essentials visible: image, model name and current price.', 'dawp'); ?></p>
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
            <article><span></span><h3><?php esc_html_e('Direct from Zorex', 'dawp'); ?></h3><p><?php esc_html_e('The site focuses on our own watch line, with no reseller positioning or third-party brand claims.', 'dawp'); ?></p></article>
            <article><span></span><h3><?php esc_html_e('Details first', 'dawp'); ?></h3><p><?php esc_html_e('Concise copy and close-up watch imagery make materials, sizing and finish easier to understand.', 'dawp'); ?></p></article>
            <article><span></span><h3><?php esc_html_e('Easy to order', 'dawp'); ?></h3><p><?php esc_html_e('Shop, search, account and cart remain close to the buying journey on every screen.', 'dawp'); ?></p></article>
        </div>
    </div>
</section>

<section class="zc-editorial">
    <div class="zc-wrap zc-editorial__grid">
        <figure>
            <img src="<?php echo esc_url($asset_base . '13.png'); ?>" alt="<?php esc_attr_e('Watch collector desk', 'dawp'); ?>">
        </figure>
        <div>
            <span class="zc-kicker"><?php esc_html_e('Zorex Notes', 'dawp'); ?></span>
            <h2><?php esc_html_e('A focused watch brand should be easy to understand.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Zorex Craft pairs refined presentation with practical shopping paths, so visitors can review our watches without unnecessary claims or distractions.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="zc-newsletter">
    <div class="zc-wrap zc-newsletter__grid">
        <div>
            <span class="zc-kicker"><?php esc_html_e('Newsletter', 'dawp'); ?></span>
            <h2><?php esc_html_e('Notes from Zorex.', 'dawp'); ?></h2>
        </div>
        <form class="zc-newsletter__form" action="#" method="post">
            <label class="screen-reader-text" for="zc-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="zc-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>">
            <button class="zc-button zc-button--primary" type="submit"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
        </form>
    </div>
</section>
