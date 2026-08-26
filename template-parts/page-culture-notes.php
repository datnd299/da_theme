<?php
/**
 * Culture Notes virtual page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

$culture_image = static function ($file, $alt, $class = '', $loading = 'lazy', $sizes = '100vw') {
    if (function_exists('dawp_get_home_responsive_image')) {
        return dawp_get_home_responsive_image($file, $alt, $class, $loading, $sizes);
    }

    $file = function_exists('dawp_normalize_home_image_file') ? dawp_normalize_home_image_file($file) : basename((string) $file);

    return '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/homepage/brickgo/' . $file) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="' . esc_attr($loading) . '" decoding="async">';
};

$culture_notes = function_exists('dawp_culture_notes') ? dawp_culture_notes() : [];
$featured_slugs = ['collected-not-crowded-shelf', 'weekend-build-you-keep-out', 'cleaner-blind-box-start'];
$note_slugs = ['desk-objects-less-temporary', 'clean-display-pieces', 'collectible-gift-without-whole-shelf', 'seasonal-collection-rotation'];
$featured = array_intersect_key($culture_notes, array_flip($featured_slugs));
$notes = array_intersect_key($culture_notes, array_flip($note_slugs));
?>

<section class="culture-hero" aria-labelledby="culture-hero-title">
    <div class="culture-shell culture-hero__grid">
        <div class="culture-hero__content">
            <p class="culture-kicker"><?php esc_html_e('Culture Notes', 'dawp'); ?></p>
            <h1 id="culture-hero-title"><?php esc_html_e('STORIES FOR COLLECTORS.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Display ideas, collecting habits, build notes, and small rituals for people who like objects with personality.', 'dawp'); ?></p>
        </div>
        <div class="culture-hero__media">
            <?php echo $culture_image('16.png', __('Collector wall shelves with display-ready builds and figures', 'dawp'), '', 'eager', '(min-width: 900px) 48vw, 100vw'); ?>
            <span><?php esc_html_e('Shelf notes, build notes, better collecting.', 'dawp'); ?></span>
        </div>
    </div>
</section>

<section class="culture-section culture-section--surface" aria-labelledby="culture-featured-title">
    <div class="culture-shell">
        <div class="culture-section__head">
            <div>
                <p class="culture-kicker"><?php esc_html_e('Start here', 'dawp'); ?></p>
                <h2 id="culture-featured-title"><?php esc_html_e('EDITOR PICKS.', 'dawp'); ?></h2>
            </div>
        </div>
        <div class="culture-featured-grid">
            <?php foreach ($featured as $slug => $story) : ?>
                <?php $index = array_search($slug, $featured_slugs, true); ?>
                <article class="culture-story-card <?php echo 0 === $index ? 'culture-story-card--large' : ''; ?>">
                    <?php echo $culture_image($story['image'], $story['title'], '', 'lazy', 0 === $index ? '(min-width: 900px) 55vw, 100vw' : '(min-width: 900px) 28vw, 82vw'); ?>
                    <div>
                        <p><?php echo esc_html($story['category']); ?> <span><?php echo esc_html($story['read']); ?></span></p>
                        <h3><?php echo esc_html($story['title']); ?></h3>
                        <p class="culture-story-card__summary"><?php echo esc_html($story['summary']); ?></p>
                        <a href="<?php echo esc_url(dawp_culture_note_url($slug)); ?>"><?php esc_html_e('Read Story', 'dawp'); ?> &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="culture-section" aria-labelledby="culture-latest-title">
    <div class="culture-shell">
        <div class="culture-section__head">
            <div>
                <p class="culture-kicker"><?php esc_html_e('More notes', 'dawp'); ?></p>
                <h2 id="culture-latest-title"><?php esc_html_e('LATEST READS.', 'dawp'); ?></h2>
            </div>
        </div>
        <div class="culture-note-grid">
            <?php foreach ($notes as $slug => $note) : ?>
                <article class="culture-note-card">
                    <?php echo $culture_image($note['image'], $note['title'], '', 'lazy', '(min-width: 900px) 25vw, 82vw'); ?>
                    <div>
                        <p><?php echo esc_html($note['category']); ?></p>
                        <h3><?php echo esc_html($note['title']); ?></h3>
                        <span><?php echo esc_html($note['summary']); ?></span>
                        <a href="<?php echo esc_url(dawp_culture_note_url($slug)); ?>"><?php esc_html_e('Read Note', 'dawp'); ?> &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="culture-cta" aria-labelledby="culture-cta-title">
    <div class="culture-shell culture-cta__inner">
        <div>
            <p class="culture-kicker"><?php esc_html_e('Collector edit', 'dawp'); ?></p>
            <h2 id="culture-cta-title"><?php esc_html_e('FIND PIECES WORTH WRITING ABOUT.', 'dawp'); ?></h2>
        </div>
        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop the edit', 'dawp'); ?> &rarr;</a>
    </div>
</section>
