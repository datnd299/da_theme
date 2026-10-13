<?php
/**
 * Blog archive template.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

get_header();
?>
<main class="dawp-blog-archive">
    <header class="dawp-blog-archive__header">
        <p><?php esc_html_e('Mytire Blog', 'dawp'); ?></p>
        <h1><?php echo is_category() ? esc_html(single_cat_title('', false)) : esc_html__('Blog', 'dawp'); ?></h1>
        <div><?php esc_html_e('Practical tire buying guides, fitment tips, and maintenance advice to help you choose with confidence.', 'dawp'); ?></div>
    </header>

    <?php if (have_posts()) : ?>
        <div class="dawp-blog-archive__grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $blog_image = get_post_meta(get_the_ID(), '_dawp_blog_image', true);

                if (!$blog_image) {
                    $blog_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                }
                ?>
                <article <?php post_class('dawp-blog-archive__card'); ?>>
                    <a href="<?php the_permalink(); ?>">
                        <?php if ($blog_image) : ?>
                            <img src="<?php echo esc_url($blog_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy">
                        <?php endif; ?>
                        <div class="dawp-blog-archive__card-body">
                            <div class="dawp-blog-archive__meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                <span><?php esc_html_e('Guide', 'dawp'); ?></span>
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 34)); ?></p>
                            <span class="dawp-blog-archive__read"><?php esc_html_e('Read guide', 'dawp'); ?> &gt;</span>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="dawp-blog-archive__pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p class="dawp-blog-archive__empty"><?php esc_html_e('No blog posts found.', 'dawp'); ?></p>
    <?php endif; ?>
</main>
<?php
get_footer();
