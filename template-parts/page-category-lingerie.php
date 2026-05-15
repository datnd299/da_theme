<?php
/**
 * Lingerie Sets Category Page
 */
$category_slug  = 'lingerie-sets';
$category_name  = 'Lingerie Sets';
$category_desc  = 'Soft lace and delicate matching pieces for romantic confidence.';
$category_image = get_theme_file_uri('/assets/img/gallery/Home/Lingerie_Sets.png');

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug, 'lingerie'],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
