<?php
/**
 * Sleepwear Category Page
 */
$category_slug  = 'sleepwear';
$category_name  = 'Sleepwear';
$category_desc  = 'Satin, lace-trim, and soft nightwear for quiet evenings and restful nights.';
$category_image = get_theme_file_uri('/assets/img/gallery/Home/Sleep_wear.png');

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
