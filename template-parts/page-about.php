<?php
/**
 * About page template for Orvel Time.
 */
defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url = home_url('/contact-us/');
$hero_img    = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/20.jpg';
$accent_img  = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/21.jpg';
$story_img   = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/22.jpg';
$craft_img   = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/23.jpg';
$life_img    = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/24.jpg';
?>

<section class="ot-hero">
    <div class="ot-wrap ot-hero__inner">
        <div class="ot-hero__content">
            <span class="ot-kicker"><?php esc_html_e('About Orvel Time', 'dawp'); ?></span>
            <h1><?php esc_html_e('Time, Refined.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Orvel Time is a contemporary watch store shaped by elegant design, premium presentation and understated luxury.', 'dawp'); ?></p>
            <div class="ot-actions">
                <a class="ot-btn ot-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="ot-btn ot-btn--ghost" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
            </div>
        </div>
        <div class="ot-hero__visual">
            <div class="ot-hero__frame ot-hero__frame--main">
                <img src="<?php echo esc_url($hero_img); ?>" alt="<?php esc_attr_e('Orvel Time watch in an editorial still life', 'dawp'); ?>" loading="eager">
            </div>
            <div class="ot-hero__frame ot-hero__frame--accent">
                <img src="<?php echo esc_url($accent_img); ?>" alt="<?php esc_attr_e('Close detail of a refined watch dial', 'dawp'); ?>" loading="eager">
            </div>
        </div>
    </div>
</section>

<section class="ot-assurance">
    <div class="ot-wrap ot-assurance__grid">
        <div>
            <span><?php esc_html_e('01', 'dawp'); ?></span>
            <strong><?php esc_html_e('Quiet Luxury', 'dawp'); ?></strong>
            <p><?php esc_html_e('Modern watches with calm presence, warm materials and restrained detail.', 'dawp'); ?></p>
        </div>
        <div>
            <span><?php esc_html_e('02', 'dawp'); ?></span>
            <strong><?php esc_html_e('Editorial Minimalism', 'dawp'); ?></strong>
            <p><?php esc_html_e('A focused visual language where the timepiece remains the hero.', 'dawp'); ?></p>
        </div>
        <div>
            <span><?php esc_html_e('03', 'dawp'); ?></span>
            <strong><?php esc_html_e('Daily Refinement', 'dawp'); ?></strong>
            <p><?php esc_html_e('Considered proportions for workdays, weekends and personal milestones.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="ot-editorial">
    <div class="ot-wrap ot-editorial__grid">
        <div class="ot-editorial__copy">
            <span class="ot-kicker"><?php esc_html_e('Brand Idea', 'dawp'); ?></span>
            <h2><?php esc_html_e('Modern Form. Timeless Presence.', 'dawp'); ?></h2>
            <p><?php esc_html_e('We curate watches for people who value clarity over noise: legible dials, balanced cases and finishes that feel precise without being loud.', 'dawp'); ?></p>
            <a class="ot-btn ot-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View Collection', 'dawp'); ?></a>
        </div>
        <div class="ot-editorial__image">
            <img src="<?php echo esc_url($story_img); ?>" alt="<?php esc_attr_e('Orvel Time watch styled with warm stone and soft light', 'dawp'); ?>" loading="lazy">
        </div>
    </div>
</section>

<section class="ot-statement">
    <div class="ot-wrap ot-statement__inner">
        <span class="ot-kicker"><?php esc_html_e('Core Principle', 'dawp'); ?></span>
        <h2><?php esc_html_e('Quiet design creates confidence. Editorial imagery creates desire. The watch remains the hero.', 'dawp'); ?></h2>
    </div>
</section>

<section class="ot-craft">
    <div class="ot-wrap ot-craft__grid">
        <div class="ot-craft__copy">
            <span class="ot-kicker"><?php esc_html_e('Our Point of View', 'dawp'); ?></span>
            <h2><?php esc_html_e('Designed with Intention.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Orvel Time brings together contemporary horology, warm neutrals and tactile presentation for a collection that feels refined from first glance to daily wear.', 'dawp'); ?></p>
            <div class="ot-details">
                <div>
                    <span></span>
                    <h3><?php esc_html_e('Clarity', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Clean markers, calm spacing and silhouettes that are easy to read.', 'dawp'); ?></p>
                </div>
                <div>
                    <span></span>
                    <h3><?php esc_html_e('Balance', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Measured case profiles and versatile proportions for everyday use.', 'dawp'); ?></p>
                </div>
                <div>
                    <span></span>
                    <h3><?php esc_html_e('Restraint', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Subtle bronze notes, warm pearl space and details that never compete.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
        <div class="ot-craft__image">
            <img src="<?php echo esc_url($craft_img); ?>" alt="<?php esc_attr_e('Premium watch materials and tactile finishing', 'dawp'); ?>" loading="lazy">
            <div class="ot-craft__badge" aria-hidden="true">
                <span><?php esc_html_e('Orvel', 'dawp'); ?></span>
                <strong><?php esc_html_e('Time Refined', 'dawp'); ?></strong>
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
            <span class="ot-kicker"><?php esc_html_e('The Collection', 'dawp'); ?></span>
            <h2><?php esc_html_e('Made for Every Moment.', 'dawp'); ?></h2>
            <p><?php esc_html_e('A calm edit of refined watches for the rhythm of modern life, from focused mornings to milestone evenings.', 'dawp'); ?></p>
            <div class="ot-lifestyle__actions">
                <a class="ot-btn ot-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover Watches', 'dawp'); ?></a>
                <span><?php esc_html_e('Elegant design. Premium presentation.', 'dawp'); ?></span>
            </div>
        </div>
    </div>
</section>
