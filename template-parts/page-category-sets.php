<?php
/**
 * Training Sets Category Page
 */
$category_slug  = 'training-sets';
$category_name  = 'Training Sets';
$category_desc  = 'Matching activewear sets for simple, coordinated training looks.';
$category_image = 'https://images.unsplash.com/photo-1518310383802-640c2de311b2?q=80&w=2000&auto=format&fit=crop';

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
