<?php
/**
 * POD variant system — bulk import REST endpoints.
 *
 * The per-product flow in .plans/pod-import-guide.md (wc/v3/products, then
 * /variants) costs 2+ HTTP round-trips per design, and WC's own product
 * endpoint sideloads `images` into the Media Library — both unworkable at
 * ~20k designs. These two endpoints let an external script push a whole
 * catalog in batches instead:
 *
 * - `POST wc-pod/v1/import/setup`    — one-time upsert of Types (+ their
 *   per-size surcharges), Sizes, Colors and product categories, all keyed
 *   by slug so re-running is safe.
 * - `POST wc-pod/v1/import/products` — up to 100 products per call: creates
 *   or updates the WC simple product (matched by `_pod_source_id` meta, so
 *   re-runs update instead of duplicating), sets its main image as a
 *   da-sync virtual image (`images` custom attribute — nothing downloaded),
 *   then replaces its variant rows.
 *
 * Same `wc-pod/v1` namespace as rest-api.php so a WooCommerce Consumer
 * Key/Secret authenticates it.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('rest_api_init', 'pod_register_import_routes');
function pod_register_import_routes() {
    register_rest_route('wc-pod/v1', '/import/setup', [
        'methods'             => 'POST',
        'permission_callback' => function () {
            return current_user_can('manage_woocommerce');
        },
        'callback' => 'pod_rest_import_setup',
    ]);

    register_rest_route('wc-pod/v1', '/import/products', [
        'methods'             => 'POST',
        'permission_callback' => function () {
            return current_user_can('edit_products');
        },
        'callback' => 'pod_rest_import_products',
    ]);
}

/* -----------------------------------------------------------------------
 * Setup: lookups + size surcharges + categories
 * -------------------------------------------------------------------- */

/**
 * Body: {
 *   "sizes":      [{"name": "S", "slug": "s", "sort_order": 2}, ...],
 *   "colors":     [{"name": "Black", "slug": "black", "hex": "#111111", "sort_order": 1}, ...],
 *   "types":      [{"name": "Vintage T-Shirt", "slug": "vintage-t-shirt", "sort_order": 1,
 *                   "sizes": {"s": 0, "m": 1, "2xl": 4}}, ...],
 *   "categories": [{"name": "Anime", "slug": "anime", "parent": ""}, ...]
 * }
 * A type's "sizes" map REPLACES its whole size-surcharge set, so sizes
 * left out become unavailable for that type. Categories must list parents
 * before children.
 */
function pod_rest_import_setup(WP_REST_Request $request) {
    $report = ['sizes' => [], 'colors' => [], 'types' => [], 'categories' => []];

    foreach ((array) $request->get_param('sizes') as $size) {
        $report['sizes'][] = pod_import_upsert_lookup(pod_table_sizes(), $size, []);
    }
    foreach ((array) $request->get_param('colors') as $color) {
        $hex = isset($color['hex']) ? sanitize_hex_color($color['hex']) : null;
        $report['colors'][] = pod_import_upsert_lookup(pod_table_colors(), $color, ['hex_code' => $hex ?: null]);
    }

    pod_flush_lookup_cache();
    $size_by_slug = [];
    foreach (pod_get_sizes() as $id => $size) {
        $size_by_slug[$size->slug] = $id;
    }

    global $wpdb;
    foreach ((array) $request->get_param('types') as $type) {
        $row = pod_import_upsert_lookup(pod_table_types(), $type, []);
        if (!empty($row['id']) && isset($type['sizes']) && is_array($type['sizes'])) {
            $wpdb->delete(pod_table_size_prices(), ['type_id' => $row['id']], ['%d']);
            $row['sizes'] = 0;
            foreach ($type['sizes'] as $size_slug => $surcharge) {
                if (!isset($size_by_slug[$size_slug])) {
                    $row['missing_sizes'][] = $size_slug;
                    continue;
                }
                $wpdb->insert(
                    pod_table_size_prices(),
                    ['type_id' => $row['id'], 'size_id' => $size_by_slug[$size_slug], 'surcharge' => (float) $surcharge],
                    ['%d', '%d', '%f']
                );
                $row['sizes']++;
            }
        }
        $report['types'][] = $row;
    }

    foreach ((array) $request->get_param('categories') as $cat) {
        $report['categories'][] = pod_import_upsert_category($cat);
    }

    pod_flush_lookup_cache();

    return new WP_REST_Response($report, 200);
}

/**
 * Insert-or-update one Type/Color/Size row by slug. `$extra` holds
 * table-specific columns (hex_code for colors).
 */
function pod_import_upsert_lookup($table, $item, array $extra) {
    global $wpdb;

    $name = sanitize_text_field(trim((string) ($item['name'] ?? '')));
    $slug = sanitize_title($item['slug'] ?? $name);
    if ($name === '' || $slug === '') {
        return ['name' => $name, 'status' => 'error', 'error' => 'invalid_fields'];
    }

    $data = array_merge([
        'name'       => $name,
        'slug'       => $slug,
        'sort_order' => (int) ($item['sort_order'] ?? 0),
    ], $extra);

    $existing_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table} WHERE slug = %s", $slug));
    if ($existing_id) {
        $wpdb->update($table, $data, ['id' => (int) $existing_id]);
        return ['id' => (int) $existing_id, 'slug' => $slug, 'status' => 'updated'];
    }

    if ($wpdb->insert($table, $data) === false) {
        return ['slug' => $slug, 'status' => 'error', 'error' => 'db_error'];
    }

    return ['id' => (int) $wpdb->insert_id, 'slug' => $slug, 'status' => 'created'];
}

/**
 * Create a product_cat by slug if missing; an existing term is left as is
 * (name/description may have been edited in wp-admin since).
 */
function pod_import_upsert_category($cat) {
    $name   = sanitize_text_field(trim((string) ($cat['name'] ?? '')));
    $slug   = sanitize_title($cat['slug'] ?? $name);
    $parent = sanitize_title($cat['parent'] ?? '');
    if ($name === '' || $slug === '') {
        return ['name' => $name, 'status' => 'error', 'error' => 'invalid_fields'];
    }

    $term = get_term_by('slug', $slug, 'product_cat');
    if ($term) {
        return ['id' => (int) $term->term_id, 'slug' => $slug, 'status' => 'exists'];
    }

    $parent_id = 0;
    if ($parent !== '') {
        $parent_term = get_term_by('slug', $parent, 'product_cat');
        $parent_id   = $parent_term ? (int) $parent_term->term_id : 0;
    }

    $created = wp_insert_term($name, 'product_cat', ['slug' => $slug, 'parent' => $parent_id]);
    if (is_wp_error($created)) {
        return ['slug' => $slug, 'status' => 'error', 'error' => $created->get_error_code()];
    }

    return ['id' => (int) $created['term_id'], 'slug' => $slug, 'status' => 'created'];
}

/* -----------------------------------------------------------------------
 * Products
 * -------------------------------------------------------------------- */

/**
 * Body: { "products": [ {
 *   "source_id": "1925795",              // required, stable external id
 *   "name": "Sesshomaru Shirt, ...",     // required
 *   "sku": "ST-1925795",                 // optional WC product SKU
 *   "status": "publish",                 // optional, default publish
 *   "description": "<p>...</p>",
 *   "short_description": "...",
 *   "categories": ["anime", "vintage-shirts"],   // product_cat slugs
 *   "image": "https://...",              // main image (shop card), external
 *   "variants": [ { same item format as /products/{id}/variants } ]
 * }, ... ] }
 *
 * Variants not present in the payload are deleted, so the payload is the
 * product's full variant set. Each product is handled independently — check
 * `results[].status` per item (created / updated / partial / error).
 */
function pod_rest_import_products(WP_REST_Request $request) {
    $products = $request->get_param('products');
    if (!is_array($products) || empty($products)) {
        return new WP_Error('missing_products', __('"products" must be a non-empty array.', 'dawp'), ['status' => 400]);
    }
    if (count($products) > 100) {
        return new WP_Error('too_many_products', __('Max 100 products per request.', 'dawp'), ['status' => 400]);
    }

    $source_ids = [];
    foreach ($products as $item) {
        if (is_array($item) && !empty($item['source_id'])) {
            $source_ids[] = (string) $item['source_id'];
        }
    }
    $existing = pod_import_find_products_by_source_ids($source_ids);

    wp_defer_term_counting(true);

    $results = [];
    foreach (array_values($products) as $index => $item) {
        try {
            $result = pod_import_one_product($item, $existing);
        } catch (Throwable $e) {
            $result = ['status' => 'error', 'error' => $e->getMessage()];
        }
        $results[] = array_merge(['index' => $index, 'source_id' => $item['source_id'] ?? null], $result);
    }

    wp_defer_term_counting(false);

    return new WP_REST_Response(['results' => $results], 200);
}

function pod_import_find_products_by_source_ids(array $source_ids) {
    if (!$source_ids) {
        return [];
    }
    global $wpdb;
    $placeholders = implode(',', array_fill(0, count($source_ids), '%s'));
    $rows = $wpdb->get_results($wpdb->prepare(
        "SELECT pm.meta_value AS source_id, pm.post_id FROM {$wpdb->postmeta} pm
         INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id AND p.post_type = 'product'
         WHERE pm.meta_key = '_pod_source_id' AND pm.meta_value IN ({$placeholders})",
        $source_ids
    ));

    $map = [];
    foreach ($rows as $row) {
        $map[$row->source_id] = (int) $row->post_id;
    }
    return $map;
}

function pod_import_category_ids(array $slugs) {
    static $by_slug = null;
    if ($by_slug === null) {
        $by_slug = [];
        $terms   = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
        foreach (is_wp_error($terms) ? [] : $terms as $term) {
            $by_slug[$term->slug] = (int) $term->term_id;
        }
    }

    $ids = [];
    foreach ($slugs as $slug) {
        $slug = sanitize_title($slug);
        if (isset($by_slug[$slug])) {
            $ids[] = $by_slug[$slug];
        }
    }
    return array_values(array_unique($ids));
}

function pod_import_one_product($item, array $existing) {
    if (!is_array($item)) {
        return ['status' => 'error', 'error' => 'invalid_item'];
    }

    $source_id = sanitize_text_field((string) ($item['source_id'] ?? ''));
    $name      = sanitize_text_field(html_entity_decode((string) ($item['name'] ?? ''), ENT_QUOTES, 'UTF-8'));
    $variants  = $item['variants'] ?? null;

    $prices = [];
    foreach (is_array($variants) ? $variants : [] as $variant) {
        if (is_array($variant) && isset($variant['price']) && (float) $variant['price'] > 0) {
            $prices[] = (float) $variant['price'];
        }
    }
    if ($source_id === '' || $name === '' || !$prices) {
        return ['status' => 'error', 'error' => 'invalid_fields'];
    }

    $product_id = $existing[$source_id] ?? 0;
    $product    = $product_id ? wc_get_product($product_id) : new WC_Product_Simple();
    if (!$product) {
        $product = new WC_Product_Simple();
    }
    $is_new = !$product->get_id();

    $product->set_name($name);
    $product->set_status(in_array($item['status'] ?? '', ['publish', 'draft', 'pending', 'private'], true) ? $item['status'] : 'publish');
    if (isset($item['description'])) {
        $product->set_description(wp_kses_post((string) $item['description']));
    }
    if (isset($item['short_description'])) {
        $product->set_short_description(wp_kses_post((string) $item['short_description']));
    }
    if (!empty($item['sku'])) {
        $product->set_sku(sanitize_text_field((string) $item['sku']));
    }
    if (isset($item['categories']) && is_array($item['categories'])) {
        $product->set_category_ids(pod_import_category_ids($item['categories']));
    }

    // Main (shop card) image as a da-sync virtual image: a hidden custom
    // `images` attribute holding [{origin, src}] — the same format da-sync
    // reads in da_sync_get_attribute_images(), served via its image CDN.
    $image = !empty($item['image']) ? esc_url_raw((string) $item['image']) : '';
    $attributes = $product->get_attributes();
    if ($image !== '') {
        $attribute = new WC_Product_Attribute();
        $attribute->set_name('images');
        $attribute->set_options([wp_json_encode([['origin' => $image, 'src' => $image]], JSON_UNESCAPED_SLASHES)]);
        $attribute->set_visible(false);
        $attribute->set_variation(false);
        $attributes['images'] = $attribute;
    }
    $product->set_attributes($attributes);

    // Same "from" price pod_sync_product_price() would set, set up front so
    // the product only needs one save instead of save + sync re-save.
    $min_price = min($prices);
    $product->set_regular_price($min_price);
    $product->set_sale_price('');
    $product->set_stock_status('instock');
    $product->update_meta_data('_pod_source_id', $source_id);

    $product_id = $product->save();
    if (!$product_id) {
        return ['status' => 'error', 'error' => 'product_save_failed'];
    }

    $variant_results = pod_upsert_variants($product_id, array_values($variants));

    $kept_ids = [];
    $errors   = [];
    foreach ($variant_results as $result) {
        if ($result['status'] === 'error') {
            $errors[] = $result;
        } else {
            $kept_ids[] = (int) $result['id'];
        }
    }

    global $wpdb;
    $table = pod_table_variants();
    if ($kept_ids) {
        $wpdb->query($wpdb->prepare(
            "DELETE FROM {$table} WHERE product_id = %d AND id NOT IN (" . implode(',', array_map('intval', $kept_ids)) . ')',
            $product_id
        ));
    }

    // Some variants failed → the price set above may not match what's
    // actually active, so let the canonical sync recompute it.
    if ($errors) {
        pod_sync_product_price($product_id);
    } else {
        wc_delete_product_transients($product_id);
    }

    return [
        'product_id' => $product_id,
        'status'     => $errors ? 'partial' : ($is_new ? 'created' : 'updated'),
        'variants'   => count($kept_ids),
        'errors'     => $errors,
    ];
}
