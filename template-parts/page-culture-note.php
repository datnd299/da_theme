<?php
/**
 * Single Culture Note virtual page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$note = $GLOBALS['dawp_current_culture_note'] ?? null;

if (!$note) {
    return;
}

$back_url = home_url('/culture-notes/');
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

$note_image = static function ($file, $alt, $class = '', $loading = 'lazy', $sizes = '100vw') {
    if (function_exists('dawp_get_home_responsive_image')) {
        return dawp_get_home_responsive_image($file, $alt, $class, $loading, $sizes);
    }

    $file = basename((string) $file);
    if (function_exists('dawp_normalize_home_image_file')) {
        $file = dawp_normalize_home_image_file($file);
    }

    return '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/homepage/brickgo/' . $file) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="' . esc_attr($loading) . '" decoding="async">';
};
?>

<article class="culture-article">
    <header class="culture-article__hero">
        <div class="culture-shell culture-article__grid">
            <div class="culture-article__intro">
                <a class="culture-article__back" href="<?php echo esc_url($back_url); ?>"><?php esc_html_e('Culture Notes', 'dawp'); ?></a>
                <p class="culture-kicker"><?php echo esc_html($note['category']); ?> <span><?php echo esc_html($note['read']); ?></span></p>
                <h1><?php echo esc_html($note['title']); ?></h1>
                <p><?php echo esc_html($note['summary']); ?></p>
                <time datetime="<?php echo esc_attr(date('Y-m-d', strtotime($note['date']))); ?>"><?php echo esc_html($note['date']); ?></time>
            </div>
            <div class="culture-article__media">
                <?php echo $note_image($note['image'], $note['title'], '', 'eager', '(min-width: 900px) 48vw, 100vw'); ?>
            </div>
        </div>
    </header>

    <div class="culture-article__body culture-shell">
        <?php foreach ($note['content'] as $paragraph) : ?>
            <p><?php echo esc_html($paragraph); ?></p>
        <?php endforeach; ?>
        <div class="culture-article__footer">
            <a href="<?php echo esc_url($back_url); ?>"><?php esc_html_e('Back to Culture Notes', 'dawp'); ?> &rarr;</a>
            <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop collector pieces', 'dawp'); ?> &rarr;</a>
        </div>
    </div>
</article>
