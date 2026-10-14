<?php get_header(); while (have_posts()) : the_post(); ?>
<?php if (function_exists('woocommerce_breadcrumb')) woocommerce_breadcrumb(); ?>
<div class="hm-wrap hm-sec"><?php if (!(function_exists('is_cart') && (is_cart() || is_checkout()))) : ?><h1><?php the_title(); ?></h1><?php endif; ?><div class="hm-pagebody"><?php the_content(); ?></div></div>
<?php endwhile; get_footer();
