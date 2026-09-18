<?php
/**
 * POD variant system — table names + schema install/upgrade.
 */

if (!defined('ABSPATH')) {
    exit;
}

/* -----------------------------------------------------------------------
 * Table names
 * -------------------------------------------------------------------- */

function pod_table_types() {
    global $wpdb;
    return $wpdb->prefix . 'pod_types';
}

function pod_table_colors() {
    global $wpdb;
    return $wpdb->prefix . 'pod_colors';
}

function pod_table_sizes() {
    global $wpdb;
    return $wpdb->prefix . 'pod_sizes';
}

function pod_table_variants() {
    global $wpdb;
    return $wpdb->prefix . 'pod_variants';
}

function pod_table_size_prices() {
    global $wpdb;
    return $wpdb->prefix . 'pod_size_prices';
}

/* -----------------------------------------------------------------------
 * Schema install / upgrade — dbDelta only re-runs when the version option
 * doesn't match, not on every request.
 * -------------------------------------------------------------------- */

add_action('after_switch_theme', 'pod_maybe_upgrade_db');
add_action('init', 'pod_maybe_upgrade_db');
function pod_maybe_upgrade_db() {
    if (get_option('pod_variants_db_version') !== POD_VARIANTS_DB_VERSION) {
        pod_install_tables();
    }
}

function pod_install_tables() {
    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE " . pod_table_types() . " (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(64) NOT NULL,
        slug VARCHAR(64) NOT NULL,
        sort_order SMALLINT UNSIGNED NOT NULL DEFAULT 0,
        size_chart_html LONGTEXT NULL,
        UNIQUE KEY uq_slug (slug)
    ) $charset_collate;
    CREATE TABLE " . pod_table_colors() . " (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(64) NOT NULL,
        slug VARCHAR(64) NOT NULL,
        hex_code CHAR(7) NULL,
        sort_order SMALLINT UNSIGNED NOT NULL DEFAULT 0,
        UNIQUE KEY uq_slug (slug)
    ) $charset_collate;
    CREATE TABLE " . pod_table_sizes() . " (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(16) NOT NULL,
        slug VARCHAR(16) NOT NULL,
        sort_order SMALLINT UNSIGNED NOT NULL DEFAULT 0,
        UNIQUE KEY uq_slug (slug)
    ) $charset_collate;
    CREATE TABLE " . pod_table_variants() . " (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id BIGINT UNSIGNED NOT NULL,
        type_id BIGINT UNSIGNED NOT NULL,
        color_id BIGINT UNSIGNED NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        sale_price DECIMAL(10,2) NULL,
        image_urls JSON NOT NULL,
        sku VARCHAR(64) NOT NULL,
        is_active TINYINT(1) NOT NULL DEFAULT 1,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        UNIQUE KEY uq_variant (product_id, type_id, color_id),
        KEY idx_type_color (type_id, color_id),
        KEY idx_sku (sku)
    ) $charset_collate;
    CREATE TABLE " . pod_table_size_prices() . " (
        type_id BIGINT UNSIGNED NOT NULL,
        size_id BIGINT UNSIGNED NOT NULL,
        surcharge DECIMAL(10,2) NOT NULL DEFAULT 0,
        PRIMARY KEY (type_id, size_id)
    ) $charset_collate;";

    dbDelta($sql);

    update_option('pod_variants_db_version', POD_VARIANTS_DB_VERSION);
}
