<?php
/**
 * Homepage template part.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$gallery_uri = $theme_uri . '/assets/img/gallery/Mytire/';
$home_uri    = $gallery_uri . 'Home/';
$shop_url    = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$asset = static function ($file) use ($gallery_uri) {
    return $gallery_uri . $file;
};

$home_asset = static function ($file) use ($home_uri) {
    return $home_uri . $file;
};

$blog_images = [
    'how-to-read-tire-size-before-ordering-online'              => $asset('Blog/How_to_Read_Tire Size.jpg'),
    'all-season-vs-performance-tires-which-one-fits-your-drive' => $asset('Blog/Which_One_Fits_Your_Drive.jpg'),
    'when-should-you-replace-your-tires'                        => $asset('Blog/When_Should_You_Replace_Your_Tires.jpg'),
    'how-to-compare-budget-mid-range-and-premium-tires'         => $asset('Blog/How_to_Compare_Budged.jpg'),
    'shopping-tire-deals-without-choosing-the-wrong-fit'        => $asset('Blog/Shopping Tire_Deals_Without_Choosing_the_Wrong_Fit.jpg'),
];

$blog_query = new WP_Query([
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'category_name'       => 'blog',
    'ignore_sticky_posts' => true,
    'orderby'             => 'date',
    'order'               => 'ASC',
]);
?>

<div class="mytire-rack-home">
    <a class="mytire-feedback" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Feedback', 'dawp'); ?></a>

    <section class="mytire-rack-hero" aria-labelledby="mytire-home-title">
        <div class="mytire-rack-hero__inner">
            <p class="mytire-eyebrow"><?php esc_html_e('Online tires, sharper prices, smarter matching.', 'dawp'); ?></p>
            <h1 id="mytire-home-title"><?php esc_html_e('Mytire helps you find the right tire faster.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Shop competitive tire prices across trusted brands, filter by exact size, and catch timely offers on the tire lines that fit your vehicle.', 'dawp'); ?></p>
            <a class="mytire-red-button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Find My Tire Size', 'dawp'); ?></a>
        </div>
    </section>

    <section class="mytire-how" aria-labelledby="mytire-how-title">
        <h2 id="mytire-how-title"><?php esc_html_e('How It Works', 'dawp'); ?></h2>
        <p class="mytire-how__intro"><?php esc_html_e('Start with the tire size your vehicle needs, then compare the right options without getting lost in products that do not fit.', 'dawp'); ?></p>
        <div class="mytire-how__grid">
            <article>
                <div class="mytire-how__icon" aria-hidden="true">
                    <span>1</span>
                    <img src="<?php echo esc_url($home_asset('Filter_by_Exact_Size.jpg')); ?>" width="360" height="300" alt="" loading="lazy" decoding="async">
                </div>
                <h3><?php esc_html_e('Filter by Exact Size', 'dawp'); ?></h3>
                <p><?php esc_html_e('Use our smart tire filter to narrow results by width, profile, rim size, vehicle type, and the driving need for your route.', 'dawp'); ?></p>
            </article>
            <article>
                <div class="mytire-how__icon" aria-hidden="true">
                    <span>2</span>
                    <img src="<?php echo esc_url($home_asset('Compare_Brands_and_Prices.jpg')); ?>" width="360" height="300" alt="" loading="lazy" decoding="async">
                </div>
                <h3><?php esc_html_e('Compare Brands and Prices', 'dawp'); ?></h3>
                <p><?php esc_html_e('Browse budget, mid-range, and premium brands side by side so you can pick the best value for your route.', 'dawp'); ?></p>
            </article>
            <article>
                <div class="mytire-how__icon" aria-hidden="true">
                    <span>3</span>
                    <img src="<?php echo esc_url($home_asset('Order_Online_With_Support.jpg')); ?>" width="360" height="300" alt="" loading="lazy" decoding="async">
                </div>
                <h3><?php esc_html_e('Order Online With Support', 'dawp'); ?></h3>
                <p><?php esc_html_e('Our team helps before and after checkout, from size checks to delivery updates and after-sales questions.', 'dawp'); ?></p>
            </article>
        </div>
    </section>

    <section class="mytire-guide" aria-labelledby="mytire-guide-title">
        <div class="mytire-guide__image">
            <img src="<?php echo esc_url($home_asset('Smart_Tire_Matching.jpg')); ?>" width="1400" height="800" alt="<?php esc_attr_e('Smart tire matching preview', 'dawp'); ?>" loading="lazy" decoding="async">
        </div>
        <div class="mytire-guide__copy">
            <p class="mytire-guide__kicker"><?php esc_html_e('Not sure which size to buy?', 'dawp'); ?></p>
            <h2 id="mytire-guide-title"><?php esc_html_e('Smart Tire Matching', 'dawp'); ?></h2>
            <p><?php esc_html_e('Mytire turns tire shopping into a clear shortlist. Enter the size you need, compare available brands, and spot the best-priced options without scrolling through mismatched products.', 'dawp'); ?></p>
            <a class="mytire-red-button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Start With Tire Size', 'dawp'); ?></a>
        </div>
    </section>

    <section class="mytire-deals" aria-labelledby="mytire-deals-title">
        <h2 id="mytire-deals-title"><?php esc_html_e('Mytire Deals', 'dawp'); ?></h2>
        <div class="mytire-deal-row">
            <a class="mytire-deal-card" href="<?php echo esc_url($shop_url); ?>">
                <img src="<?php echo esc_url($home_asset('Mytire_deal.jpg')); ?>" width="640" height="960" alt="<?php esc_attr_e('Mytire deal promotion', 'dawp'); ?>" loading="lazy" decoding="async">
            </a>
            <a class="mytire-deal-card" href="<?php echo esc_url(home_url('/shop-by-brand/')); ?>">
                <img src="<?php echo esc_url($home_asset('Brand_Picks.jpg')); ?>" width="640" height="960" alt="<?php esc_attr_e('Brand picks promotion', 'dawp'); ?>" loading="lazy" decoding="async">
            </a>
            <a class="mytire-deal-card" href="<?php echo esc_url(home_url('/shop-by-rim-size/')); ?>">
                <img src="<?php echo esc_url($home_asset('Size_match.jpg')); ?>" width="640" height="960" alt="<?php esc_attr_e('Size match promotion', 'dawp'); ?>" loading="lazy" decoding="async">
            </a>
        </div>
    </section>

    <section class="mytire-tests" aria-labelledby="mytire-tests-title">
        <p class="mytire-tests__kicker"><?php esc_html_e('Helpful shopping notes from Mytire', 'dawp'); ?></p>
        <h2 id="mytire-tests-title"><?php esc_html_e('Buy Smarter Online', 'dawp'); ?></h2>
        <p><?php esc_html_e('Clear guides help you understand sizing, brand tiers, and promotion timing before you choose your next set.', 'dawp'); ?></p>
        <a class="mytire-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Eligible Tires', 'dawp'); ?> <span>&gt;</span></a>
        <?php if ($blog_query->have_posts()) : ?>
            <div class="mytire-test-grid">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <?php
                    $blog_slug  = get_post_field('post_name', get_the_ID());
                    $blog_image = $blog_images[$blog_slug] ?? get_the_post_thumbnail_url(get_the_ID(), 'large');

                    if (!$blog_image) {
                        $blog_image = get_post_meta(get_the_ID(), '_dawp_blog_image', true);
                    }

                    if (!$blog_image) {
                        $blog_image = $home_asset('the_right_tire_faster.jpg');
                    }
                    ?>
                    <article class="mytire-test-card">
                        <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                            <img src="<?php echo esc_url($blog_image); ?>" width="520" height="250" alt="" loading="lazy" decoding="async">
                            <div>
                                <h3><?php the_title(); ?></h3>
                                <p class="mytire-test-card__date"><?php echo esc_html(get_the_date()); ?></p>
                                <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                                <span class="mytire-pill-button"><?php esc_html_e('Read Blog', 'dawp'); ?> &gt;</span>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </section>

    <section class="mytire-guide mytire-guide--brands" aria-labelledby="mytire-brand-guide-title">
        <div class="mytire-guide__image">
            <img <?php echo dawp_responsive_image_attrs($home_asset('Find_the_Right_Brand_Range.jpg'), 700, 420, '(max-width: 900px) 100vw, 50vw', [420, 700, 980]); ?> alt="<?php esc_attr_e('Find the right tire brand range preview', 'dawp'); ?>" loading="lazy" decoding="async">
        </div>
        <div class="mytire-guide__copy">
            <p class="mytire-guide__kicker"><?php esc_html_e('Shop by the name you trust', 'dawp'); ?></p>
            <h2 id="mytire-brand-guide-title"><?php esc_html_e('Find the Right Brand Range', 'dawp'); ?></h2>
            <p><?php esc_html_e('Browse familiar tire makers side by side, from premium touring picks to dependable everyday options. Start with a brand you know, then compare available sizes, prices, and offers in one focused place.', 'dawp'); ?></p>
            <a class="mytire-red-button" href="<?php echo esc_url(home_url('/shop-by-brand/')); ?>"><?php esc_html_e('Shop by Brand', 'dawp'); ?></a>
        </div>
    </section>

    <section class="mytire-brand-cta" aria-labelledby="mytire-brand-cta-title">
        <p class="mytire-brand-cta__kicker"><?php esc_html_e('Ready to compare your options?', 'dawp'); ?></p>
        <h2 id="mytire-brand-cta-title"><?php esc_html_e('Pick the Brand. Match the Size. Order With Confidence.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Explore tire ranges from trusted names, check fitment by size, and move from browsing to checkout with clear pricing and support from Mytire.', 'dawp'); ?></p>
        <small><?php esc_html_e('*Availability and offers may vary by product and service area.', 'dawp'); ?></small>
        <a class="mytire-pill-button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Start Shopping', 'dawp'); ?></a>
    </section>

    <section class="mytire-service" aria-labelledby="mytire-service-title">
        <div class="mytire-service__image">
            <img src="<?php echo esc_url($home_asset('Customer_Support.jpg')); ?>" width="780" height="430" alt="<?php esc_attr_e('Customer support representative helping with tire after-sales care', 'dawp'); ?>" loading="lazy" decoding="async">
        </div>
        <div class="mytire-service__copy">
            <h2 id="mytire-service-title"><?php esc_html_e('Quick Support, Clear After-Sales Care', 'dawp'); ?></h2>
            <p><?php esc_html_e('Questions about fitment, brands, delivery, or an order you already placed? Reach Mytire for quick help before purchase and dependable follow-up after checkout.', 'dawp'); ?></p>
            <a class="mytire-outline-button" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Mytire Support', 'dawp'); ?></a>
        </div>
    </section>
</div>
