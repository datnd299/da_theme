<?php
/**
 * POD variant system — lookup caching.
 *
 * Type/color/size lists and the size surcharge matrix are tiny (~10-30 rows
 * each) but read on every product/cart page, so they're cached as transients
 * (12h TTL — self-heals without needing an explicit invalidation hook from
 * the external import API; the admin settings CRUD also busts it directly).
 */

if (!defined('ABSPATH')) {
    exit;
}

function pod_get_lookup_cached($cache_key, $table) {
    $cached = get_transient($cache_key);
    if ($cached !== false) {
        return $cached;
    }

    global $wpdb;
    $rows = $wpdb->get_results("SELECT * FROM {$table} ORDER BY sort_order ASC, id ASC");

    $by_id = [];
    foreach ($rows as $row) {
        $by_id[(int) $row->id] = $row;
    }

    set_transient($cache_key, $by_id, 12 * HOUR_IN_SECONDS);

    return $by_id;
}

function pod_get_types() {
    return pod_get_lookup_cached('pod_types', pod_table_types());
}

function pod_get_colors() {
    return pod_get_lookup_cached('pod_colors', pod_table_colors());
}

function pod_get_sizes() {
    return pod_get_lookup_cached('pod_sizes', pod_table_sizes());
}

function pod_get_size_prices() {
    $cached = get_transient('pod_size_prices');
    if ($cached !== false) {
        return $cached;
    }

    global $wpdb;
    $rows = $wpdb->get_results('SELECT type_id, size_id, surcharge FROM ' . pod_table_size_prices());

    $by_type = [];
    foreach ($rows as $row) {
        $by_type[(int) $row->type_id][(int) $row->size_id] = (float) $row->surcharge;
    }

    set_transient('pod_size_prices', $by_type, 12 * HOUR_IN_SECONDS);

    return $by_type;
}

function pod_size_valid_for_type($type_id, $size_id) {
    $size_prices = pod_get_size_prices();
    return isset($size_prices[(int) $type_id][(int) $size_id]);
}

function pod_flush_lookup_cache() {
    delete_transient('pod_types');
    delete_transient('pod_colors');
    delete_transient('pod_sizes');
    delete_transient('pod_size_prices');
}

/**
 * Find a Type/Color lookup row by name (case-insensitive, trimmed) or
 * create one on the fly — lets the variants REST endpoint accept a plain
 * "T Shirt"/"Black" from a caller that doesn't want to pre-provision
 * Type/Color rows via the wp-admin settings page first. `slug` is derived
 * from `$name` via sanitize_title(); `sort_order`/`hex_code` are left at
 * their column defaults (0 / NULL) — edit those later on the settings page
 * if needed.
 */
function pod_get_or_create_lookup_id($table, $cache_key, $name) {
    $name = trim((string) $name);
    if ($name === '') {
        return 0;
    }

    foreach (pod_get_lookup_cached($cache_key, $table) as $id => $row) {
        if (strcasecmp($row->name, $name) === 0) {
            return (int) $id;
        }
    }

    global $wpdb;
    $slug = sanitize_title($name);

    $inserted = $wpdb->insert($table, ['name' => $name, 'slug' => $slug], ['%s', '%s']);
    if ($inserted) {
        pod_flush_lookup_cache();
        return (int) $wpdb->insert_id;
    }

    // Insert failed, most likely a race or a different name sanitizing to
    // the same slug (UNIQUE KEY uq_slug) — fall back to the existing row.
    $existing_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table} WHERE slug = %s", $slug));
    if ($existing_id) {
        pod_flush_lookup_cache();
    }

    return $existing_id ? (int) $existing_id : 0;
}

function pod_get_or_create_type_id($name) {
    return pod_get_or_create_lookup_id(pod_table_types(), 'pod_types', $name);
}

function pod_get_or_create_color_id($name) {
    return pod_get_or_create_lookup_id(pod_table_colors(), 'pod_colors', $name);
}
