<?php
/**
 * Homepage template for Orvel Time.
 *
 * Keeps commerce data dynamic through WooCommerce while presenting a refined,
 * editorial storefront.
 */
defined('ABSPATH') || exit;

$theme_uri = get_template_directory_uri();
$shop_url  = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$about_url = home_url('/about-us/');
$hero_img  = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/13.jpg';
$edit_img  = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/14.jpg';
$life_img  = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/15.jpg';
$craft_img = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/16.jpg';
$atelier_img = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/17.jpg';

$featured_products = [];
$latest_products   = [];

if (function_exists('wc_get_products')) {
    $featured_products = wc_get_products([
        'status'   => 'publish',
        'limit'    => 3,
        'featured' => true,
        'orderby'  => 'date',
        'order'    => 'DESC',
    ]);

    if (count($featured_products) < 3) {
        $featured_products = wc_get_products([
            'status'  => 'publish',
            'limit'   => 3,
            'orderby' => 'date',
            'order'   => 'DESC',
        ]);
    }

    $featured_products = array_slice($featured_products, 0, 3);

    $latest_products = wc_get_products([
        'status'  => 'publish',
        'limit'   => 8,
        'orderby' => 'date',
        'order'   => 'DESC',
    ]);
}

if (!function_exists('dawp_home_product_card')) {
    function dawp_home_product_card($product) {
        if (!$product || !is_callable([$product, 'is_visible']) || !$product->is_visible()) {
            return;
        }

        $image_id  = $product->get_image_id();
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'woocommerce_single') : '';
        $image_url = $image_url ?: (function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_single') : '');
        ?>
        <article class="ot-product">
            <a class="ot-product__image" href="<?php echo esc_url($product->get_permalink()); ?>" aria-label="<?php echo esc_attr($product->get_name()); ?>">
                <?php
                if (function_exists('qb_responsive_image')) {
                    echo qb_responsive_image(
                        $image_url,
                        $product->get_name(),
                        [
                            'class'  => 'ot-product__photo',
                            'width'  => 620,
                            'height' => 760,
                            'widths' => [260, 360, 520, 620],
                            'sizes'  => '(max-width: 640px) 50vw, (max-width: 1024px) 33vw, 25vw',
                        ]
                    );
                } else {
                    printf('<img class="ot-product__photo" src="%s" alt="%s" loading="lazy">', esc_url($image_url), esc_attr($product->get_name()));
                }
                ?>
            </a>
            <div class="ot-product__meta">
                <a class="ot-product__name" href="<?php echo esc_url($product->get_permalink()); ?>">
                    <?php echo esc_html($product->get_name()); ?>
                </a>
                <div class="ot-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
            </div>
        </article>
        <?php
    }
}
?>

<section class="ot-hero">
    <div class="ot-wrap ot-hero__inner">
        <div class="ot-hero__content">
            <span class="ot-kicker"><?php esc_html_e('Orvel Time', 'dawp'); ?></span>
            <h1><?php esc_html_e('Precision Watches for a Modern Wardrobe.', 'dawp'); ?></h1>
            <p><?php esc_html_e('A focused collection of refined timepieces with clean proportions, tactile finishing and a quietly confident presence.', 'dawp'); ?></p>
            <div class="ot-actions">
                <a class="ot-btn ot-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="ot-btn ot-btn--ghost" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('Our Story', 'dawp'); ?></a>
            </div>
        </div>
        <div class="ot-hero__visual">
            <div class="ot-hero__frame ot-hero__frame--main">
                <img src="<?php echo esc_url($hero_img); ?>" alt="<?php esc_attr_e('Orvel Time watch campaign hero', 'dawp'); ?>" loading="eager">
            </div>
            <div class="ot-hero__frame ot-hero__frame--accent">
                <img src="<?php echo esc_url($atelier_img); ?>" alt="<?php esc_attr_e('Premium watch detail in studio light', 'dawp'); ?>" loading="eager">
            </div>
        </div>
    </div>
</section>

<section class="ot-assurance">
    <div class="ot-wrap ot-assurance__grid">
        <div>
            <span><?php esc_html_e('01', 'dawp'); ?></span>
            <strong><?php esc_html_e('Curated Selection', 'dawp'); ?></strong>
            <p><?php esc_html_e('A tight edit of versatile silhouettes for everyday wear.', 'dawp'); ?></p>
        </div>
        <div>
            <span><?php esc_html_e('02', 'dawp'); ?></span>
            <strong><?php esc_html_e('Premium Finish', 'dawp'); ?></strong>
            <p><?php esc_html_e('Balanced cases, considered dials and tactile material contrast.', 'dawp'); ?></p>
        </div>
        <div>
            <span><?php esc_html_e('03', 'dawp'); ?></span>
            <strong><?php esc_html_e('Ready to Gift', 'dawp'); ?></strong>
            <p><?php esc_html_e('Polished presentation made for personal milestones.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<?php if (!empty($featured_products)) : ?>
<section class="ot-section ot-section--pearl">
    <div class="ot-wrap">
        <div class="ot-section__head">
            <div>
                <span class="ot-kicker"><?php esc_html_e('Featured Watches', 'dawp'); ?></span>
                <h2><?php esc_html_e('Designed with Intention.', 'dawp'); ?></h2>
            </div>
            <a class="ot-text-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View Collection', 'dawp'); ?></a>
        </div>
        <div class="ot-featured-layout">
            <aside class="ot-featured-note">
                <span class="ot-kicker"><?php esc_html_e('Season Edit', 'dawp'); ?></span>
                <h3><?php esc_html_e('Three signatures, chosen for proportion, polish and daily versatility.', 'dawp'); ?></h3>
                <a class="ot-text-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse the Edit', 'dawp'); ?></a>
            </aside>
            <div class="ot-products ot-products--featured">
                <?php foreach ($featured_products as $product) : ?>
                    <?php dawp_home_product_card($product); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="ot-editorial">
    <div class="ot-wrap ot-editorial__grid">
        <div class="ot-editorial__copy">
            <span class="ot-kicker"><?php esc_html_e('Design Language', 'dawp'); ?></span>
            <h2><?php esc_html_e('Built Around Clarity, Balance and Restraint.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Every line is reduced to what matters: legible dials, measured case profiles and textures that catch light without shouting.', 'dawp'); ?></p>
            <a class="ot-btn ot-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore Pieces', 'dawp'); ?></a>
        </div>
        <div class="ot-editorial__image">
            <img src="<?php echo esc_url($edit_img); ?>" alt="<?php esc_attr_e('Orvel Time watch in a warm editorial setting', 'dawp'); ?>" loading="lazy">
        </div>
    </div>
</section>

<?php if (!empty($latest_products)) : ?>
<section class="ot-section ot-section--white">
    <div class="ot-wrap">
        <div class="ot-section__head">
            <div>
                <span class="ot-kicker"><?php esc_html_e('The Collection', 'dawp'); ?></span>
                <h2><?php esc_html_e('Made for Every Moment.', 'dawp'); ?></h2>
            </div>
            <a class="ot-text-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a>
        </div>
        <div class="ot-products">
            <?php foreach ($latest_products as $product) : ?>
                <?php dawp_home_product_card($product); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="ot-statement">
    <div class="ot-wrap ot-statement__inner">
        <span class="ot-kicker"><?php esc_html_e('Brand Statement', 'dawp'); ?></span>
        <h2><?php esc_html_e('Quiet design creates confidence. Editorial imagery creates desire. The watch remains the hero.', 'dawp'); ?></h2>
    </div>
</section>

<section class="ot-craft">
    <div class="ot-wrap ot-craft__grid">
        <div class="ot-craft__copy">
            <span class="ot-kicker"><?php esc_html_e('Craftsmanship', 'dawp'); ?></span>
            <h2><?php esc_html_e('Details Define the Difference.', 'dawp'); ?></h2>
            <div class="ot-details">
                <div>
                    <span></span>
                    <h3><?php esc_html_e('Balanced Case', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Clean proportions with a profile made for daily presence.', 'dawp'); ?></p>
                </div>
                <div>
                    <span></span>
                    <h3><?php esc_html_e('Tactile Finish', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Brushed metal, warm light and restrained detail at every angle.', 'dawp'); ?></p>
                </div>
                <div>
                    <span></span>
                    <h3><?php esc_html_e('Refined Dial', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Precise markers and calm negative space for effortless reading.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
        <div class="ot-craft__image">
            <img src="<?php echo esc_url($craft_img); ?>" alt="<?php esc_attr_e('Watch detail with premium materials', 'dawp'); ?>" loading="lazy">
            <div class="ot-craft__badge" aria-hidden="true">
                <span><?php esc_html_e('01', 'dawp'); ?></span>
                <strong><?php esc_html_e('Atelier Grade', 'dawp'); ?></strong>
            </div>
        </div>
    </div>
</section>

<section class="ot-lifestyle">
    <div class="ot-lifestyle__media" aria-hidden="true">
        <img src="<?php echo esc_url($life_img); ?>" alt="" loading="lazy">
    </div>
    <div class="ot-lifestyle__shade" aria-hidden="true"></div>
    <div class="ot-wrap ot-lifestyle__inner">
        <div class="ot-lifestyle__content">
            <span class="ot-kicker"><?php esc_html_e('Lifestyle Campaign', 'dawp'); ?></span>
            <h2><?php esc_html_e('Designed for the rhythm of modern life.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Refined silhouettes, quiet materials and everyday precision for every hour that asks more of you.', 'dawp'); ?></p>
            <div class="ot-lifestyle__actions">
                <a class="ot-btn ot-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover Watches', 'dawp'); ?></a>
                <span><?php esc_html_e('Automatic and quartz collections', 'dawp'); ?></span>
            </div>
        </div>
    </div>
</section>

<section class="ot-newsletter">
    <div class="ot-wrap ot-newsletter__grid">
        <div>
            <span class="ot-kicker"><?php esc_html_e('Journal', 'dawp'); ?></span>
            <h2><?php esc_html_e('Notes on time, materials and design.', 'dawp'); ?></h2>
        </div>
        <form class="ot-newsletter__form" method="post" action="<?php echo esc_url(home_url('/')); ?>">
            <label class="screen-reader-text" for="ot-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="ot-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" required>
            <button class="ot-btn ot-btn--dark" type="submit"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
        </form>
    </div>
</section>
