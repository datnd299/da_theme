<?php
/**
 * Bras & Bralettes Category Page
 */
$category_slug  = 'bras-bralettes';
$category_name  = 'Bras & Bralettes';
$category_desc  = 'Delicate support and feminine shapes for everyday intimacy and soft confidence.';
$category_image = get_theme_file_uri('/assets/img/gallery/Home/bras.png');

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug, 'bralettes', 'bras'],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
