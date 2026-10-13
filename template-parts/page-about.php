<?php
/**
 * About page template part.
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

$asset = static function ($file) use ($home_uri) {
    return $home_uri . $file;
};
?>

<div class="mytire-about">
    <a class="mytire-about__feedback" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Feedback', 'dawp'); ?></a>

    <section class="mytire-about-hero" aria-labelledby="mytire-about-title">
        <div class="mytire-about-hero__inner">
            <p class="mytire-about__eyebrow"><?php esc_html_e('About Mytire', 'dawp'); ?></p>
            <h1 id="mytire-about-title"><?php esc_html_e('A clearer way to buy tires online.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Mytire helps drivers move from guesswork to a confident shortlist: the right size, the right brand range, and support when they need a second look before ordering.', 'dawp'); ?></p>
            <a class="mytire-about__button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Find My Tire Size', 'dawp'); ?></a>
        </div>
    </section>

    <section class="mytire-about-proof" aria-label="<?php esc_attr_e('Mytire shopping strengths', 'dawp'); ?>">
        <article>
            <strong><?php esc_html_e('Size First', 'dawp'); ?></strong>
            <span><?php esc_html_e('Filter by exact tire dimensions before comparing options.', 'dawp'); ?></span>
        </article>
        <article>
            <strong><?php esc_html_e('Trusted Brands', 'dawp'); ?></strong>
            <span><?php esc_html_e('Browse familiar names across everyday, touring, SUV, and performance needs.', 'dawp'); ?></span>
        </article>
        <article>
            <strong><?php esc_html_e('Real Support', 'dawp'); ?></strong>
            <span><?php esc_html_e('Ask for help before checkout and get follow-up after your order.', 'dawp'); ?></span>
        </article>
    </section>

    <section class="mytire-about-story" aria-labelledby="mytire-about-story-title">
        <div class="mytire-about-story__image">
            <img src="<?php echo esc_url($asset('Smart_Tire_Matching.jpg')); ?>" width="1400" height="800" alt="<?php esc_attr_e('Smart tire matching preview', 'dawp'); ?>" loading="lazy" decoding="async">
        </div>
        <div class="mytire-about-story__copy">
            <p class="mytire-about__kicker"><?php esc_html_e('Why we built Mytire', 'dawp'); ?></p>
            <h2 id="mytire-about-story-title"><?php esc_html_e('Tire shopping should feel focused, not overwhelming.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Many tire searches start with hundreds of products and not enough context. Mytire puts fitment first, then helps shoppers compare price, brand range, and practical driving needs in a simpler flow.', 'dawp'); ?></p>
            <p><?php esc_html_e('The result is a store experience built around the way people actually choose tires: confirm the size, compare what fits, then order with a team close by when questions come up.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="mytire-about-values" aria-labelledby="mytire-about-values-title">
        <p class="mytire-about__kicker"><?php esc_html_e('What guides us', 'dawp'); ?></p>
        <h2 id="mytire-about-values-title"><?php esc_html_e('Built for confident decisions.', 'dawp'); ?></h2>
        <div class="mytire-about-values__grid">
            <article>
                <img src="<?php echo esc_url($asset('Filter_by_Exact_Size.jpg')); ?>" width="420" height="320" alt="" loading="lazy" decoding="async">
                <h3><?php esc_html_e('Fitment before everything', 'dawp'); ?></h3>
                <p><?php esc_html_e('We keep size and compatibility at the front of the journey so shoppers spend time on tires that make sense for their vehicle.', 'dawp'); ?></p>
            </article>
            <article>
                <img src="<?php echo esc_url($asset('Compare_Brands_and_Prices.jpg')); ?>" width="420" height="320" alt="" loading="lazy" decoding="async">
                <h3><?php esc_html_e('Clear value comparison', 'dawp'); ?></h3>
                <p><?php esc_html_e('Budget, mid-range, and premium choices should be easy to scan side by side, with pricing and offers visible where they matter.', 'dawp'); ?></p>
            </article>
            <article>
                <img src="<?php echo esc_url($asset('Customer_Support.jpg')); ?>" width="420" height="320" alt="" loading="lazy" decoding="async">
                <h3><?php esc_html_e('Support that stays useful', 'dawp'); ?></h3>
                <p><?php esc_html_e('From pre-purchase questions to order follow-up, we aim to keep help direct, practical, and easy to reach.', 'dawp'); ?></p>
            </article>
        </div>
    </section>

    <section class="mytire-about-guide" aria-labelledby="mytire-about-guide-title">
        <div class="mytire-about-guide__copy">
            <p class="mytire-about__kicker"><?php esc_html_e('How we help', 'dawp'); ?></p>
            <h2 id="mytire-about-guide-title"><?php esc_html_e('From tire size to checkout, the path stays simple.', 'dawp'); ?></h2>
            <ol>
                <li><?php esc_html_e('Start with the size printed on your current tire or vehicle recommendation.', 'dawp'); ?></li>
                <li><?php esc_html_e('Compare matching products by brand, price, season, and driving style.', 'dawp'); ?></li>
                <li><?php esc_html_e('Order online and contact Mytire support whenever you need a quick fitment check.', 'dawp'); ?></li>
            </ol>
            <a class="mytire-about__outline" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        </div>
        <div class="mytire-about-guide__image">
            <img src="<?php echo esc_url($asset('Order_Online_With_Support.jpg')); ?>" width="900" height="700" alt="<?php esc_attr_e('Online tire order support preview', 'dawp'); ?>" loading="lazy" decoding="async">
        </div>
    </section>

    <section class="mytire-about-cta" aria-labelledby="mytire-about-cta-title">
        <p class="mytire-about__kicker"><?php esc_html_e('Ready when you are', 'dawp'); ?></p>
        <h2 id="mytire-about-cta-title"><?php esc_html_e('Pick the size. Compare the brands. Order with confidence.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Explore tire ranges from trusted names and find the options that fit your vehicle, budget, and road ahead.', 'dawp'); ?></p>
        <a class="mytire-about__button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Start Shopping', 'dawp'); ?></a>
    </section>
</div>
