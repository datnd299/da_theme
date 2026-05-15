<?php
/**
 * Robes & Loungewear Category Page
 */
$category_slug  = 'robes-loungewear';
$category_name  = 'Robes & Loungewear';
$category_desc  = 'At-home elegance made for comfort, layering, and slow mornings in soft textures.';
$category_image = get_theme_file_uri('/assets/img/gallery/Home/Robes_Loungewear.png');

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug, 'robes', 'loungewear'],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
