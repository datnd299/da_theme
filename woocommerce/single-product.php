<?php
/**
 * Single Product Template — Mytire
 * @package Mytire
 */

defined('ABSPATH') || exit;

get_header();

/**
 * woocommerce_before_main_content hook
 */
do_action('woocommerce_before_main_content');
?>

<main class="product-page-shell" id="main-content">
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <?php wc_get_template_part('content', 'single-product'); ?>
    <?php endwhile; ?>
</main>

<?php
/**
 * woocommerce_after_main_content hook
 */
do_action('woocommerce_after_main_content');

get_footer();
