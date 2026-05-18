<?php
/**
 * Activewear Bottoms Category Page
 */
$category_slug  = 'activewear-bottoms';
$category_name  = 'Activewear Bottoms';
$category_desc  = 'Comfortable activewear bottoms for workouts, warm-ups, and daily wear.';
$category_image = get_template_directory_uri() . '/assets/img/activewear_bottoms_category.png';

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
