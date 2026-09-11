<?php
/**
 * Product category defaults for Watchfavor.
 *
 * The catalog is organised into three collections, each pulled from the
 * homepage content brief- The Timeless Reverie, The Celestial Odyssey and
 * The Kinetic Sonata.
 *
 * These labels are used by the homepage collections section, the
 * header/footer navigation, the About page, and the 404 page.
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
        'timeless-reverie' => [
            'name'        => __('The Timeless Reverie', 'dawp'),
            'description' => __('Dress watches built for quiet moments- white enamel dials, slim steel cases, hand-stitched leather straps.', 'dawp'),
            'short'       => __('Where moments stand still.', 'dawp'),
            'icon'        => 'M12 4a8 8 0 100 16 8 8 0 000-16zm0 3v5l3.5 2',
        ],
        'celestial-odyssey' => [
            'name'        => __('The Celestial Odyssey', 'dawp'),
            'description' => __('Sport watches for the bold- brushed steel cases, high-legibility dials, built to keep pace with restless days.', 'dawp'),
            'short'       => __('Forged for the bold and the restless.', 'dawp'),
            'icon'        => 'M12 3l1.8 4.6L18 9l-3.8 2.2L12 16l-2.2-4.8L6 9l4.2-1.4L12 3z',
        ],
        'kinetic-sonata' => [
            'name'        => __('The Kinetic Sonata', 'dawp'),
            'description' => __('Open-heart automatics with gold- and silver-toned finishing, every gear and bridge on display.', 'dawp'),
            'short'       => __('Listen to the heartbeat of craftsmanship.', 'dawp'),
            'icon'        => 'M4 12h3l2-6 4 12 2-6h5',
        ],
    ];
}
