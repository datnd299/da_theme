<?php
/**
 * Single blog post template.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

get_header();

while (have_posts()) :
    the_post();

    $blog_image = get_post_meta(get_the_ID(), '_dawp_blog_image', true);

    if (!$blog_image) {
        $blog_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    }
    ?>
    <main class="dawp-blog-single">
        <article <?php post_class('dawp-blog-single__article'); ?>>
            <header class="dawp-blog-single__hero">
                <?php $blog_category = get_category_by_slug('blog'); ?>
                <?php if ($blog_category) : ?>
                    <a class="dawp-blog-single__back" href="<?php echo esc_url(get_category_link($blog_category)); ?>">
                        <?php esc_html_e('Mytire Blog', 'dawp'); ?>
                    </a>
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>
                <div class="dawp-blog-single__meta">
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                    <span><?php echo esc_html(get_the_author()); ?></span>
                    <span><?php esc_html_e('Tire Guide', 'dawp'); ?></span>
                </div>
            </header>

            <?php if ($blog_image) : ?>
                <figure class="dawp-blog-single__image">
                    <img src="<?php echo esc_url($blog_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="eager">
                </figure>
            <?php endif; ?>

            <div class="dawp-blog-single__content">
                <?php the_content(); ?>
            </div>

            <footer class="dawp-blog-single__cta">
                <h2><?php esc_html_e('Ready to compare tire options?', 'dawp'); ?></h2>
                <p><?php esc_html_e('Start with your correct size, then compare brands, categories, and pricing before ordering.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0 ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/')); ?>">
                    <?php esc_html_e('Shop Tires', 'dawp'); ?>
                </a>
            </footer>
        </article>
    </main>
<?php
endwhile;

get_footer();
