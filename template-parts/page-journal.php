<?php
/**
 * Journal listing page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$posts = function_exists('dawp_journal_posts') ? dawp_journal_posts() : [];
?>

<section class="journal-page">
    <div class="journal-wrap">
        <header class="journal-hero">
            <p class="journal-label"><?php esc_html_e('Journal', 'dawp'); ?></p>
            <h1><?php esc_html_e('Stories of time and design', 'dawp'); ?></h1>
            <p><?php esc_html_e('Editorial notes on mechanical watches, measured proportions, refined finishing and choosing a timepiece with confidence.', 'dawp'); ?></p>
        </header>

        <?php if (!empty($posts)) : ?>
            <div class="journal-feature">
                <a class="journal-card journal-card--feature" href="<?php echo esc_url(home_url('/journal/' . $posts[0]['slug'] . '/')); ?>">
                    <span class="journal-card__image">
                        <img src="<?php echo esc_url($posts[0]['image']); ?>" alt="<?php echo esc_attr($posts[0]['alt']); ?>" loading="eager" decoding="async">
                    </span>
                    <span class="journal-card__body">
                        <span class="journal-meta"><?php echo esc_html($posts[0]['category']); ?> · <?php echo esc_html($posts[0]['date']); ?></span>
                        <strong><?php echo esc_html($posts[0]['title']); ?></strong>
                        <span class="journal-excerpt"><?php echo esc_html($posts[0]['excerpt']); ?></span>
                    </span>
                </a>
            </div>

            <div class="journal-grid">
                <?php foreach (array_slice($posts, 1) as $post) : ?>
                    <a class="journal-card" href="<?php echo esc_url(home_url('/journal/' . $post['slug'] . '/')); ?>">
                        <span class="journal-card__image">
                            <img src="<?php echo esc_url($post['image']); ?>" alt="<?php echo esc_attr($post['alt']); ?>" loading="lazy" decoding="async">
                        </span>
                        <span class="journal-card__body">
                            <span class="journal-meta"><?php echo esc_html($post['category']); ?> · <?php echo esc_html($post['date']); ?></span>
                            <strong><?php echo esc_html($post['title']); ?></strong>
                            <span class="journal-excerpt"><?php echo esc_html($post['excerpt']); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
