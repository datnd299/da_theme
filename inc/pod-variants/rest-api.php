<?php
/**
 * POD variant system — REST endpoints for the external import API.
 *
 * `/sync` is called after writing product/variant rows directly to the DB
 * so price + caches stay in sync. `/variants` is a write endpoint for
 * callers that would rather upsert rows over HTTP than hold a DB
 * connection — same effect, then auto-syncs price, no separate `/sync`
 * call needed for that product.
 *
 * Namespace is `wc-pod/v1`, not `pod/v1` — WooCommerce's own REST
 * authentication (Consumer Key/Secret Basic Auth or OAuth1.0a) only
 * activates for routes starting with `wc/` or `wc-`
 * (WC_REST_Authentication::is_wc_namespace()), so the `wc-` prefix here is
 * what lets a caller authenticate with the same WooCommerce API key used
 * for `wc/v3/products` instead of needing a separate WP Application
 * Password. `current_user_can('edit_products')` still gates access on top
 * of that — the key's user must actually hold the capability.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('rest_api_init', 'pod_register_rest_routes');
function pod_register_rest_routes() {
    register_rest_route('wc-pod/v1', '/products/(?P<id>\d+)/sync', [
        'methods'             => 'POST',
        'permission_callback' => function () {
            return current_user_can('edit_products');
        },
        'callback' => function (WP_REST_Request $request) {
            $product_id = (int) $request['id'];
            pod_flush_lookup_cache();
            $synced = pod_sync_product_price($product_id);

            return new WP_REST_Response(['synced' => $synced], $synced ? 200 : 404);
        },
    ]);

    register_rest_route('wc-pod/v1', '/products/(?P<id>\d+)/variants', [
        'methods'             => 'POST',
        'permission_callback' => function () {
            return current_user_can('edit_products');
        },
        'callback' => 'pod_rest_upsert_variants',
    ]);
}

/**
 * Bulk upsert Style/Color variant rows for one product.
 *
 * Body: { "variants": [ { "type": "T Shirt", "color": "Black", "price": 19.99,
 * "sale_price": 15.99, "sku": "...", "image_urls": ["https://..."],
 * "is_active": true }, ... ] }
 *
 * "type"/"color" are plain Type/Color **names** (e.g. "T Shirt", "Black"),
 * matched case-insensitively against the existing lookup rows — a name with
 * no match is auto-created (slug derived via sanitize_title()) rather than
 * rejected, so a caller never has to pre-provision Type/Color rows on the
 * wp-admin settings page first. Auto-created Colors get no hex_code (NULL)
 * and everything gets sort_order 0 — edit those on the settings page after
 * if the swatch/ordering matters. Once resolved to a type_id/color_id, the
 * variant row itself upserts via the existing UNIQUE KEY (product_id,
 * type_id, color_id): a row that already exists for that combo is updated,
 * otherwise a new one is inserted. Every field except "type"/"color"/"price"
 * is optional — "sku" auto-generates and "is_active" defaults to true, same
 * as the per-product metabox. Each item is validated independently so one
 * bad row doesn't fail the whole batch; check `results[].status` per item.
 */
function pod_rest_upsert_variants(WP_REST_Request $request) {
    $product_id = (int) $request['id'];
    if (get_post_type($product_id) !== 'product') {
        return new WP_Error('invalid_product', __('Product not found.', 'dawp'), ['status' => 404]);
    }

    $variants = $request->get_param('variants');
    if (!is_array($variants) || empty($variants)) {
        return new WP_Error('missing_variants', __('"variants" must be a non-empty array.', 'dawp'), ['status' => 400]);
    }
    if (count($variants) > 500) {
        return new WP_Error('too_many_variants', __('Max 500 variants per request.', 'dawp'), ['status' => 400]);
    }

    // Name (lowercased) => id, seeded from the existing lookups and grown
    // in-place as new Type/Color names are auto-created below, so the same
    // new name appearing twice in one batch is only inserted once.
    $type_by_name = [];
    foreach (pod_get_types() as $id => $type) {
        $type_by_name[strtolower($type->name)] = $id;
    }
    $color_by_name = [];
    foreach (pod_get_colors() as $id => $color) {
        $color_by_name[strtolower($color->name)] = $id;
    }

    global $wpdb;
    $table   = pod_table_variants();
    $results = [];

    foreach (array_values($variants) as $index => $item) {
        if (!is_array($item)) {
            $results[] = ['index' => $index, 'status' => 'error', 'error' => 'invalid_item'];
            continue;
        }

        $type_name  = sanitize_text_field(trim((string) ($item['type'] ?? '')));
        $color_name = sanitize_text_field(trim((string) ($item['color'] ?? '')));
        $price      = isset($item['price']) ? (float) $item['price'] : 0;

        if ($type_name === '' || $color_name === '' || $price <= 0) {
            $results[] = [
                'index' => $index,
                'type'  => $type_name,
                'color' => $color_name,
                'status' => 'error',
                'error' => 'invalid_fields',
            ];
            continue;
        }

        $type_key  = strtolower($type_name);
        $color_key = strtolower($color_name);

        if (!isset($type_by_name[$type_key])) {
            $new_id = pod_get_or_create_type_id($type_name);
            if ($new_id) {
                $type_by_name[$type_key] = $new_id;
            }
        }
        if (!isset($color_by_name[$color_key])) {
            $new_id = pod_get_or_create_color_id($color_name);
            if ($new_id) {
                $color_by_name[$color_key] = $new_id;
            }
        }

        if (empty($type_by_name[$type_key]) || empty($color_by_name[$color_key])) {
            $results[] = [
                'index' => $index,
                'type'  => $type_name,
                'color' => $color_name,
                'status' => 'error',
                'error' => 'lookup_create_failed',
            ];
            continue;
        }

        $type_id  = $type_by_name[$type_key];
        $color_id = $color_by_name[$color_key];

        $sale_price = null;
        if (array_key_exists('sale_price', $item) && $item['sale_price'] !== null && $item['sale_price'] !== '') {
            $sale_price = (float) $item['sale_price'];
        }

        $images = [];
        if (!empty($item['image_urls']) && is_array($item['image_urls'])) {
            foreach ($item['image_urls'] as $url) {
                $url = esc_url_raw((string) $url);
                if ($url !== '') {
                    $images[] = $url;
                }
            }
        }

        $sku = isset($item['sku']) ? sanitize_text_field((string) $item['sku']) : '';
        if ($sku === '') {
            $sku = 'POD-' . $product_id . '-' . $type_id . '-' . $color_id;
        }

        $is_active = array_key_exists('is_active', $item) ? (int) (bool) $item['is_active'] : 1;

        $data = [
            'product_id' => $product_id,
            'type_id'    => $type_id,
            'color_id'   => $color_id,
            'price'      => $price,
            'sale_price' => $sale_price,
            'image_urls' => wp_json_encode($images),
            'sku'        => $sku,
            'is_active'  => $is_active,
        ];
        $format = ['%d', '%d', '%d', '%f', '%f', '%s', '%s', '%d'];

        $existing_id = $wpdb->get_var($wpdb->prepare(
            "SELECT id FROM {$table} WHERE product_id = %d AND type_id = %d AND color_id = %d",
            $product_id, $type_id, $color_id
        ));

        if ($existing_id) {
            $ok         = $wpdb->update($table, $data, ['id' => (int) $existing_id], $format, ['%d']);
            $variant_id = (int) $existing_id;
            $status     = 'updated';
        } else {
            $ok         = $wpdb->insert($table, $data, $format);
            $variant_id = $ok ? (int) $wpdb->insert_id : null;
            $status     = 'created';
        }

        if ($ok === false) {
            $results[] = [
                'index' => $index,
                'type'  => $type_name,
                'color' => $color_name,
                'status' => 'error',
                'error' => 'db_error',
            ];
            continue;
        }

        $results[] = [
            'index'  => $index,
            'id'     => $variant_id,
            'type'   => $type_name,
            'color'  => $color_name,
            'status' => $status,
        ];
    }

    return new WP_REST_Response([
        'product_id' => $product_id,
        'results'    => $results,
        'synced'     => pod_sync_product_price($product_id),
    ], 200);
}
