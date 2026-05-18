<?php
/**
 * Default page template.
 *
 * Keeps shortcode-driven pages such as WooCommerce My Account inside the
 * theme's page shell instead of falling back to the bare index.php output.
 */

get_header();
?>

<main id="primary" class="site-main page-shell">
    <div class="page-shell__inner">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>
    </div>
</main>

<?php
get_footer();
