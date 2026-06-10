<?php
/**
 * Single Product Template — TireZap
 * @package tirezap
 */

defined('ABSPATH') || exit;

get_header();

/**
 * woocommerce_before_main_content hook
 */
do_action('woocommerce_before_main_content');
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10   ">
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <?php wc_get_template_part('content', 'single-product'); ?>
    <?php endwhile; ?>
</div>

<?php
/**
 * woocommerce_after_main_content hook
 */
do_action('woocommerce_after_main_content');

get_footer();
