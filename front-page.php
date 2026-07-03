<?php
/**
 * Front page template.
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/page', 'home'); ?>
</main>

<?php
get_footer();
