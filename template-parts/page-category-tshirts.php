<?php
/**
 * Dry-Fit T-Shirts Category Page
 */
$category_slug  = 'dry-fit-t-shirts';
$category_name  = 'Dry-Fit T-Shirts';
$category_desc  = 'Lightweight dry-fit style tops made for movement, comfort, and active routines.';
$category_image = 'https://images.unsplash.com/photo-1581655353564-df123a1eb820?q=80&w=2000&auto=format&fit=crop';

$products = [];
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'   => 'publish',
        'category' => [$category_slug],
        'limit'    => 12,
    ]);
}

include locate_template('template-parts/content-category.php');
