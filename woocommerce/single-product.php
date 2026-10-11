<?php
/**
 * Single Product Page
 */
defined('ABSPATH') || exit;
get_header();
?>

<main class="woo-page">
    <div class="container woo-page__container">
        <?php
        while (have_posts()) {
            the_post();
            wc_get_template_part('content', 'single-product');
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>
