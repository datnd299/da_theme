<?php
wp_enqueue_style(
    'dawp-home',
    get_template_directory_uri() . '/assets/css/tw/tw-home.css',
    [],
    function_exists('dawp_asset_ver') ? dawp_asset_ver('assets/css/tw/tw-home.css') : '1.0.0'
);

get_header();
?>
<main class="front-page-content">
    <?php get_template_part('template-parts/page', 'home'); ?>
</main>
<?php
get_footer();
