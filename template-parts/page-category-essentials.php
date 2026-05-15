<?php
/**
 * Intimate Essentials Category Page
 */
$category_slug  = 'intimate-essentials';
$category_name  = 'Intimate Essentials';
$category_desc  = 'Refined basics designed for softness, comfort, and effortless everyday ease.';
$category_image = get_theme_file_uri('/assets/img/gallery/Home/intimate.png');

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug, 'essentials'],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
