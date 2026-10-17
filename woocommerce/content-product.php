<?php
/**
 * Content-product: one tire card inside any WooCommerce product loop
 * (related products, upsells, shortcodes). Markup lives in dawp_render_tire_card().
 */
defined('ABSPATH') || exit;

global $product;
if (empty($product) || ! $product->is_visible()) {
    return;
}

dawp_render_tire_card($product, 'li');
