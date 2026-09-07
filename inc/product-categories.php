<?php
/**
 * Product category defaults for WristUnion.
 *
 * The catalog is organised into two shopping categories- Field & Everyday
 * and Heritage.
 *
 * These labels are used by the homepage category grid, the header/footer
 * navigation, the About page, and the 404 page.
 *
 * NOTE: This theme does NOT create taxonomy terms. The store owner should
 * create the matching product categories in WooCommerce > Products >
 * Categories with the slugs below. Until a term exists, its links fall back
 * to /product-category/<slug>/ (see inc/menu.php) or the shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'field-everyday' => [
            'name'        => __('Field & Everyday', 'dawp'),
            'description' => __('Durable, easy-wearing watches built for daily use, with legible dials and hard-wearing straps. Clear specs on every listing.', 'dawp'),
            'short'       => __('Worn every day. Tough, and easy to pair.', 'dawp'),
        ],
        'heritage' => [
            'name'        => __('Heritage', 'dawp'),
            'description' => __('Classic proportions and restrained dials drawn from mid-century design. Slim cases made to sit under a cuff.', 'dawp'),
            'short'       => __('Classic proportions. Restrained dials.', 'dawp'),
        ],
    ];
}
