<?php
/**
 * Journal article page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$post = function_exists('dawp_current_journal_post') ? dawp_current_journal_post() : false;

if (!$post) {
    return;
}
?>

<article class="journal-page journal-article">
    <div class="journal-wrap journal-article__wrap">
        <a class="journal-back" href="<?php echo esc_url(home_url('/journal/')); ?>"><?php esc_html_e('Back to Journal', 'dawp'); ?></a>
        <header class="journal-article__header">
            <p class="journal-label"><?php echo esc_html($post['category']); ?> · <?php echo esc_html($post['date']); ?></p>
            <h1><?php echo esc_html($post['title']); ?></h1>
            <p><?php echo esc_html($post['excerpt']); ?></p>
        </header>

        <figure class="journal-article__media">
            <img src="<?php echo esc_url($post['image']); ?>" alt="<?php echo esc_attr($post['alt']); ?>" loading="eager" decoding="async">
        </figure>

        <div class="journal-article__content">
            <?php foreach ($post['body'] as $paragraph) : ?>
                <p><?php echo esc_html($paragraph); ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</article>
