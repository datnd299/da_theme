<?php
/**
 * POD variant system — variant reads + WC product price sync.
 */

if (!defined('ABSPATH')) {
    exit;
}

/* -----------------------------------------------------------------------
 * Variant reads
 * -------------------------------------------------------------------- */

function pod_get_variant($variant_id) {
    static $cache = [];
    global $wpdb;

    $variant_id = (int) $variant_id;
    if ($variant_id <= 0) {
        return null;
    }
    if (array_key_exists($variant_id, $cache)) {
        return $cache[$variant_id];
    }

    $row = $wpdb->get_row($wpdb->prepare(
        'SELECT * FROM ' . pod_table_variants() . ' WHERE id = %d',
        $variant_id
    ));

    $cache[$variant_id] = $row ?: null;

    return $cache[$variant_id];
}

function pod_get_variants_for_product($product_id) {
    global $wpdb;

    $rows = $wpdb->get_results($wpdb->prepare(
        'SELECT * FROM ' . pod_table_variants() . ' WHERE product_id = %d AND is_active = 1 ORDER BY type_id ASC, color_id ASC',
        (int) $product_id
    ));

    foreach ($rows as $row) {
        $row->image_urls = json_decode($row->image_urls, true) ?: [];
    }

    return $rows;
}

/**
 * Types that (a) have at least one active variant for this product and
 * (b) have a non-empty size chart configured — i.e. the Types worth
 * offering as tabs in the product page's Size Chart modal. Types without a
 * chart are simply omitted rather than shown with an empty panel.
 */
function pod_get_size_chart_types_for_product($product_id) {
    $variants      = pod_get_variants_for_product($product_id);
    $available_ids = array_flip(array_unique(wp_list_pluck($variants, 'type_id')));

    $chart_types = [];
    foreach (pod_get_types() as $type_id => $type) {
        if (isset($available_ids[$type_id]) && !empty($type->size_chart_html)) {
            $chart_types[] = $type;
        }
    }

    return $chart_types;
}

function pod_product_has_variants($product_id) {
    static $cache = [];
    $product_id = (int) $product_id;

    if (!isset($cache[$product_id])) {
        global $wpdb;
        $count = $wpdb->get_var($wpdb->prepare(
            'SELECT COUNT(*) FROM ' . pod_table_variants() . ' WHERE product_id = %d AND is_active = 1',
            $product_id
        ));
        $cache[$product_id] = (int) $count > 0;
    }

    return $cache[$product_id];
}

/* -----------------------------------------------------------------------
 * Sync the WC product's own _price/_regular_price/_stock_status from the
 * cheapest active variant, so shop archive price/sort, structured data and
 * the Google Merchant feed aren't left at $0. Called from the REST sync
 * endpoint after the external import API writes/updates variants.
 * -------------------------------------------------------------------- */

function pod_sync_product_price($product_id) {
    global $wpdb;

    $product = wc_get_product($product_id);
    if (!$product) {
        return false;
    }

    $min_price = $wpdb->get_var($wpdb->prepare(
        'SELECT MIN(COALESCE(sale_price, price)) FROM ' . pod_table_variants() . ' WHERE product_id = %d AND is_active = 1',
        $product_id
    ));

    if ($min_price === null) {
        $product->set_stock_status('outofstock');
        $product->save();
        return false;
    }

    $product->set_regular_price($min_price);
    $product->set_price($min_price);
    $product->set_stock_status('instock');
    $product->save();

    wc_delete_product_transients($product_id);

    return true;
}
