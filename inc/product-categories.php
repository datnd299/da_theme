<?php
/**
 * Product category defaults for WristUnion.
 *
 * The catalog is organised into three shopping categories — Field & Everyday,
 * Dive, and Dress & Heritage. "Custom Shop" is a landing page (see
 * template-parts/page-custom-shop is not used; the Custom Shop lives on the
 * homepage customization section and routes quote requests through the
 * Contact page), not a product category.
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
        'dive' => [
            'name'        => __('Dive', 'dawp'),
            'description' => __('Water-resistant watches with a rotating timing bezel, screw-down crown, and high-contrast dials made to be read underwater.', 'dawp'),
            'short'       => __('Water resistant. Rotating timing bezel.', 'dawp'),
        ],
        'dress-heritage' => [
            'name'        => __('Dress & Heritage', 'dawp'),
            'description' => __('Slim cases, restrained dials, and classic proportions for the wrist that sits under a cuff.', 'dawp'),
            'short'       => __('Slim, restrained, made to sit under a cuff.', 'dawp'),
        ],
    ];
}
