<?php
/**
 * POD (print-on-demand) variant system — loader.
 *
 * Custom tables hold the style/color/size price+image matrix instead of
 * WooCommerce Variable Product variations (which would explode wp_posts /
 * wp_postmeta at ~20k designs x up to 100 style/color combos each).
 * Cart, checkout, orders, payment stay 100% WooCommerce — these files only
 * feed the right price/labels into WC's own hooks.
 *
 * Split into focused files under inc/pod-variants/ (schema, lookup cache,
 * variant reads/price sync, REST API, cart/order hooks, admin settings UI,
 * front-end selector) instead of one large file, so each concern can be
 * reviewed/changed independently.
 *
 * See .plans/pod-variants-plan.md for the full design rationale.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('POD_VARIANTS_DB_VERSION', '1.1.0');

$pod_variants_dir = get_template_directory() . '/inc/pod-variants/';

require_once $pod_variants_dir . 'schema.php';
require_once $pod_variants_dir . 'image-proxy.php';
require_once $pod_variants_dir . 'lookup-cache.php';
require_once $pod_variants_dir . 'variant-data.php';
require_once $pod_variants_dir . 'rest-api.php';
require_once $pod_variants_dir . 'cart.php';
require_once $pod_variants_dir . 'admin-settings.php';
require_once $pod_variants_dir . 'product-metabox.php';
require_once $pod_variants_dir . 'variants-list-admin.php';
require_once $pod_variants_dir . 'frontend.php';

unset($pod_variants_dir);
