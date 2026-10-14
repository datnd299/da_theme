<?php get_header(); ?>
<div class="hm-wrap hm-sec"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article <?php post_class('hm-prose'); ?>><h1><?php the_title(); ?></h1><?php is_singular() ? the_content() : the_excerpt(); ?></article>
<?php endwhile; the_posts_pagination(); else : ?><h1>Nothing found</h1><p>Try a search above or <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">browse all departments</a>.</p><?php endif; ?></div>
<?php get_footer();
