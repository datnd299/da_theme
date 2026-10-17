<?php
/**
 * Product search — MozTire. FiboSearch does the searching; the theme only:
 *  1. tells FiboSearch which fields to index (brand, size category, descriptive attributes, keyword meta);
 *  2. sends a pure size query ("265/60R18") straight to its size category.
 *
 * After deploying, rebuild the index once: WooCommerce → FiboSearch → Indexer → Rebuild index.
 */

defined('ABSPATH') || exit;

/* 1. FiboSearch index scope -------------------------------------------------- */

$dawp_fibo_on = static function () {
    return 'on';
};
add_filter('dgwt/wcas/settings/load_value/key=search_in_product_attributes', $dawp_fibo_on);
add_filter('dgwt/wcas/settings/load_value/key=search_in_product_tax_product_brand', $dawp_fibo_on);
add_filter('dgwt/wcas/settings/load_value/key=search_in_product_tax_product_cat', $dawp_fibo_on);
add_filter('dgwt/wcas/settings/load_value/key=search_in_product_sku', $dawp_fibo_on);

// Hidden keywords: meta moztire_search_kw.
add_filter('dgwt/wcas/settings/load_value/key=search_in_custom_fields', static function ($value) {
    $fields = array_filter(array_map('trim', explode(',', (string) $value)));
    return implode(',', array_unique(array_merge($fields, ['moztire_search_kw'])));
});

// Index only Season, Tire Category, Vehicle Type, Features and Tire Line — not widths, load indexes, etc.
add_filter('dgwt/wcas/attribute_taxonomies', static function ($taxonomies) {
    $searchable = array_column(array_filter(dawp_tire_attributes(), static function ($a) {
        return ! empty($a['search']);
    }), 'tax');

    return array_values(array_intersect((array) $taxonomies, $searchable));
});

/* 2. "265/60R18" → size category ---------------------------------------------- */

add_action('template_redirect', 'dawp_size_search_redirect', 4);
function dawp_size_search_redirect() {
    if (! is_search() || empty($_GET['s'])) {
        return;
    }

    $query = trim(wp_unslash($_GET['s']));

    // Flotation sizes: "33x12.50R20" → its category.
    if (preg_match('/^\d{2}\s*x\s*\d{1,2}(?:\.\d{1,2})?\s*R\s*\d{2}$/i', $query)) {
        $wanted = strtolower(preg_replace('/\s+/', '', $query));
        foreach (dawp_flotation_sizes() as $term) {
            if (strtolower(preg_replace('/\s+/', '', $term->name)) === $wanted) {
                wp_safe_redirect(get_term_link($term));
                exit;
            }
        }
        return;
    }

    $size  = dawp_tire_parse_size($query);

    // Only a bare size (optionally with P/LT prefix and load/speed, e.g. "LT265/70R17 121S").
    if (! $size || ! preg_match('#^(?:P|LT)?\s*\d{3}\s*[/\-\s]\s*\d{2}\s*[/\-\s]?\s*Z?R?F?\s*-?\s*\d{2}(?:\.\d)?(?:\s+\d{2,3}(?:/\d{2,3})?\s*[A-Z])?$#i', $query)) {
        return;
    }

    $name = sprintf('%s/%sR%s', $size['width'], $size['aspect'], $size['rim']);
    foreach ([$name, 'LT' . $name, 'P' . $name] as $candidate) {
        $term = get_term_by('name', $candidate, 'product_cat') ?: get_term_by('slug', sanitize_title($candidate), 'product_cat');
        if ($term && ! is_wp_error($term)) {
            wp_safe_redirect(get_term_link($term));
            exit;
        }
    }

    // No size category: fall back to the width / aspect / rim attribute filters.
    $filters = [];
    foreach ($size as $key => $value) {
        $term = dawp_tire_find_term(dawp_tire_tax($key), $value);
        if (! $term) {
            return;
        }
        $filters[$term->taxonomy] = [$term->slug];
    }

    wp_safe_redirect(dawp_tire_filter_url($filters));
    exit;
}
