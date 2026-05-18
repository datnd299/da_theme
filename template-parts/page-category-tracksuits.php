<?php
/**
 * Tracksuits Category Page
 */
$category_slug  = 'tracksuits';
$category_name  = 'Tracksuits';
$category_desc  = 'Comfortable tracksuits for training days, casual movement, and everyday sportswear style.';
$category_image = get_template_directory_uri() . '/assets/img/tracksuits_category.png';

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
