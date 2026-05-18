<?php
/**
 * Tank Tops Category Page
 */
$category_slug  = 'tank-tops';
$category_name  = 'Tank Tops';
$category_desc  = 'Training-ready tank tops designed for easy movement and everyday gym style.';
$category_image = 'https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?q=80&w=2000&auto=format&fit=crop';

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
