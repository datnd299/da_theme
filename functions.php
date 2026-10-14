<?php
/**
 * Hartwell Mart theme functions.
 * Store rules (general-merchandise-store-guidelines): delivery only, free shipping,
 * free 30-day returns, handling 1-2 / transit 3-5 / delivery 4-7 business days (Mon-Fri),
 * no promotional content, no fabricated social proof, one price everywhere.
 */
defined('ABSPATH') || exit;
define('HM_VER', '1.1.0');
require_once __DIR__ . '/inc-hm-contact.php';

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('woocommerce');
    register_nav_menus(['departments' => 'Department bar', 'footer' => 'Footer']);
});

add_action('wp_enqueue_scripts', function () {
    $u = get_template_directory_uri();
    wp_enqueue_style('hm-fonts', 'https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;700;800&family=Public+Sans:wght@400;600;700&family=JetBrains+Mono:wght@500;600&display=swap', [], null);
    wp_enqueue_style('hm', $u . '/assets/css/hm.css', [], HM_VER);
    wp_enqueue_style('hm-woo', $u . '/assets/css/hm-woo.css', ['hm'], HM_VER);
    wp_enqueue_script('hm', $u . '/assets/js/hm.js', [], HM_VER, true);
    wp_enqueue_script('hm-woo', $u . '/assets/js/hm-woo.js', ['jquery'], HM_VER, true);
});

/* ---------- helpers ---------- */
function hm_part($name) { $f = get_template_directory() . '/parts/' . $name; return file_exists($f) ? file_get_contents($f) : ''; }
function hm_note($key) { static $n; if ($n === null) $n = json_decode(hm_part('notes.json'), true) ?: []; return $n[$key] ?? ''; }
function hm_tokens($html) {
    $home = trailingslashit(home_url('/'));
    $map = ['{HOME}' => $home, '{SHOP}' => wc_get_page_permalink('shop'), '{CART}' => wc_get_cart_url(), '{CHECKOUT}' => wc_get_checkout_url(),
        '{IMG}' => get_template_directory_uri() . '/assets/img/'];
    return strtr($html, $map);
}
/* Decorative lifestyle scenes (AI-generated, theme assets only; never product images, feed or schema). */
function hm_life_meta() {
    return [
        'hero' => ['A father and his young daughter fill a handmade cedar planter with soil on their sunny back porch.', 1600, 800],
        'dept-home-furniture-appliances' => ['A couple laughs while unpacking groceries in a bright kitchen with green cabinets and a cream refrigerator.', 1600, 600],
        'dept-smart-home' => ['A man relaxes on his sofa at dusk, adjusting the living-room lights from his phone.', 1600, 600],
        'dept-electronics' => ['A young woman works at a walnut desk by the window wearing over-ear headphones.', 1600, 600],
        'dept-patio' => ['A multigenerational family shares dinner on a backyard patio while the grandfather grills.', 1600, 600],
        'dept-sports-outdoors' => ['A couple loads bikes and camping gear into their car on a sunny morning by the woods.', 1600, 600],
        'guide-weekend-project' => ['A grandmother and grandson pot seedlings together at a cedar potting bench in the garden.', 1200, 800],
    ];
}
/** Category slug -> department banner image. */
function hm_dept_banner($slug) {
    $m = ['home-furniture-appliances' => 'dept-home-furniture-appliances', 'home-improvement-essentials' => 'dept-smart-home', 'electronics' => 'dept-electronics', 'patio-garden' => 'dept-patio', 'sports-outdoors' => 'dept-sports-outdoors'];
    return $m[$slug] ?? '';
}
function hm_pic($key, $class = '', $lazy = true, $alt = null) {
    $m = hm_life_meta(); if (!isset($m[$key])) return '';
    [$a, $w, $h] = $m[$key]; $u = get_template_directory_uri() . '/assets/img/life/';
    $alt = $alt ?? $a;
    if ($key === 'hero') {
        $f = 'hero-family-weekend-project-';
        return '<picture class="' . esc_attr($class) . '"><source type="image/webp" srcset="' . esc_url($u . $f . '1600w.webp') . ' 1600w, ' . esc_url($u . $f . '2400w.webp') . ' 2400w" sizes="(max-width: 1024px) 100vw, 800px"><img src="' . esc_url($u . $f . '1600w.jpg') . '" srcset="' . esc_url($u . $f . '1600w.jpg') . ' 1600w, ' . esc_url($u . $f . '2400w.jpg') . ' 2400w" sizes="(max-width: 1024px) 100vw, 800px" alt="' . esc_attr($alt) . '" width="1600" height="800" fetchpriority="high"></picture>';
    }
    return '<picture class="' . esc_attr($class) . '"><source type="image/webp" srcset="' . esc_url($u . $key . '.webp') . '"><img src="' . esc_url($u . $key . '.jpg') . '" alt="' . esc_attr($alt) . '" width="' . $w . '" height="' . $h . '"' . ($lazy ? ' loading="lazy"' : '') . ' decoding="async"></picture>';
}
function hm_img($f) { return get_template_directory_uri() . '/assets/img/' . $f; }
/** One useful feature line per product: first sentence of the short description. */
function hm_feature_line($product) {
    $t = trim(wp_strip_all_tags($product->get_short_description() ?: $product->get_description()));
    if (!$t) return '';
    $t = preg_split('/(?<=[.!?])\s|\n/', $t)[0];
    return wp_trim_words($t, 14, '…');
}
/** Factual feature tag: meta _hm_flag or attribute "feature-tag". Never sale badges. */
function hm_flag($product) { $f = $product->get_meta('_hm_flag'); return $f ? $f : $product->get_attribute('feature-tag'); }

/* ---------- business rules in WooCommerce output ---------- */
// Single price only: never show <del> regular/sale pairs.
add_filter('woocommerce_get_price_html', function ($html, $product) {
    if ($product->is_type('variable')) {
        $min = $product->get_variation_price('min', true); $max = $product->get_variation_price('max', true);
        return $min === $max ? wc_price($min) : wc_price($min) . ' – ' . wc_price($max);
    }
    $p = wc_get_price_to_display($product);
    return $p === '' ? '' : wc_price($p);
}, 100, 2);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_filter('woocommerce_sale_flash', '__return_empty_string');
// No ratings/stars/review counts (no real review system connected).
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_filter('woocommerce_product_get_rating_html', '__return_empty_string');
// No stock counts / urgency.
add_filter('woocommerce_get_stock_html', function ($html, $product) { return $product->is_in_stock() ? '' : '<p class="stock out-of-stock">Currently unavailable</p>'; }, 10, 2);
// No coupon field.
add_filter('woocommerce_coupons_enabled', '__return_false');
// No result / facet counts.
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
// Tabs: Overview / Specifications / Uses & care, built only from the product's own data. Empty tabs are hidden.
/** Split the product description into intro paragraphs and "Key Features" bullets, then sort bullets. */
function hm_desc_parts($product) {
    static $cache = [];
    $id = $product->get_id(); if (isset($cache[$id])) return $cache[$id];
    $text = str_replace("\r", '', wp_strip_all_tags($product->get_description()));
    $lines = array_values(array_filter(array_map('trim', explode("\n", $text)), 'strlen'));
    $intro = []; $bullets = [];
    foreach ($lines as $l) {
        if (preg_match('/^(?:[•\-\*–·]|\d+[.)])\s*(.+)$/u', $l, $m)) $bullets[] = trim($m[1]);
        elseif (preg_match('/^(key )?features:?$/i', $l)) continue;
        else $intro[] = $l;
    }
    $specs = []; $uses = []; $care = []; $features = []; $warranty = '';
    foreach ($bullets as $b) {
        if (preg_match('/warrant/i', $b)) { $warranty = $b; continue; }
        if (preg_match('/^([A-Za-z][A-Za-z \/&()-]{1,30}):\s*(.+)$/u', $b, $m)) { $specs[] = [$m[1], $m[2]]; continue; }
        if (preg_match('/\b(clean|wash|dishwasher|wipe|store|storage tip|maintain|maintenance|care|descal|replace (?:the )?filter)\b/i', $b) && !preg_match('/storage (?:bins?|shelf|ottoman|containers?)/i', $b)) { $care[] = $b; continue; }
        if (preg_match('/\b(ideal for|perfect for|great for|use(?:d)? (?:for|in|on|with)|suitable for|works with|compatible with)\b/i', $b)) { $uses[] = $b; continue; }
        if (preg_match('/\d\s*(?:ft|feet|in\b|inch|"|lb|lbs|oz|qt|quart|l\b|liter|litre|gal|gallon|w\b|watt|v\b|volt|mah|hz|ghz|mbps|k\b|psi|bar|°|mm|cm|m\b|pcs?|piece|cup|tier|seat|mp|p\b|hours?|hr)/iu', $b) || preg_match('/\d+\s*x\s*\d+/i', $b)) { $specs[] = ['', $b]; continue; }
        $features[] = $b;
    }
    // "Uses": intro sentences that name uses ("for camping, tailgating...").
    foreach ($intro as $p) foreach (preg_split('/(?<=[.!?])\s+/', $p) as $sen) if (preg_match('/\b(perfect for|ideal for|great for|for (?:camping|tailgating|beach|backyard|home offices?|small apartments|everyday|daily|families|gaming|video calls|travel))\b/i', $sen)) $uses[] = $sen;
    return $cache[$id] = compact('intro', 'features', 'specs', 'uses', 'care', 'warranty');
}
add_filter('woocommerce_product_tabs', function ($tabs) {
    global $product; if (!$product) return [];
    $d = hm_desc_parts($product); $out = [];
    if ($d['intro'] || $d['features']) $out['description'] = ['title' => 'Overview', 'priority' => 10, 'callback' => 'hm_tab_overview'];
    if ($d['specs'] || $product->has_attributes() || $product->has_weight() || $product->has_dimensions()) $out['additional_information'] = ['title' => 'Specifications', 'priority' => 20, 'callback' => 'hm_tab_specs'];
    if ($d['uses'] || $d['care'] || $product->get_meta('_hm_uses_care')) $out['uses_care'] = ['title' => 'Uses & care', 'priority' => 30, 'callback' => 'hm_tab_care'];
    return $out;
}, 98);
function hm_tab_overview() { global $product; $d = hm_desc_parts($product);
    foreach ($d['intro'] as $p) echo '<p>' . esc_html($p) . '</p>';
    if ($d['features']) { echo '<h3>Key features</h3><ul>'; foreach ($d['features'] as $b) echo '<li>' . esc_html($b) . '</li>'; echo '</ul>'; } }
function hm_tab_specs() { global $product; $d = hm_desc_parts($product);
    $rows = $d['specs'];
    if ($product->has_weight()) $rows[] = ['Weight', wc_format_weight($product->get_weight())];
    if ($product->has_dimensions()) $rows[] = ['Dimensions', wc_format_dimensions($product->get_dimensions(false))];
    $labeled = array_filter($rows, function ($r) { return $r[0] !== ''; }); $plain = array_filter($rows, function ($r) { return $r[0] === ''; });
    if ($labeled) { echo '<table class="hm-specs">'; foreach ($labeled as $r) echo '<tr><th>' . esc_html($r[0]) . '</th><td>' . esc_html($r[1]) . '</td></tr>'; echo '</table>'; }
    if ($plain) { echo '<ul>'; foreach ($plain as $r) echo '<li>' . esc_html($r[1]) . '</li>'; echo '</ul>'; }
    if ($product->has_attributes()) wc_display_product_attributes($product); }
function hm_tab_care() { global $product; $d = hm_desc_parts($product); $c = $product->get_meta('_hm_uses_care');
    if ($c) { echo wp_kses_post(wpautop($c)); return; }
    if ($d['uses']) { echo '<h3>Good for</h3><ul>'; foreach ($d['uses'] as $u) echo '<li>' . esc_html($u) . '</li>'; echo '</ul>'; }
    if ($d['care']) { echo '<h3>Care</h3><ul>'; foreach ($d['care'] as $u) echo '<li>' . esc_html($u) . '</li>'; echo '</ul>'; } }

// Product page buy box: delivery + returns notes around add-to-cart.
add_action('woocommerce_single_product_summary', function () { echo '<div class="hm-buybox">' . hm_note('product'); }, 29);
add_action('woocommerce_single_product_summary', function () { global $product; $w = $product ? hm_desc_parts($product)['warranty'] : ''; echo '<p><small>Free 30-day returns' . ($w ? ' · Manufacturer warranty: ' . esc_html($w) : '') . '</small></p></div>'; }, 31);
add_action('woocommerce_single_product_summary', function () { global $product; echo '<span class="hm-kicker" style="color:var(--hm-brick)">' . esc_html(wp_strip_all_tags(wc_get_product_category_list($product->get_id(), ' · '))) . ($product->get_sku() ? ' · Model ' . esc_html($product->get_sku()) : '') . '</span>'; }, 4);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_filter('woocommerce_product_related_products_heading', function () { return 'Finish the job with'; });
add_filter('woocommerce_output_related_products_args', function ($a) { $a['posts_per_page'] = 4; $a['columns'] = 4; return $a; });
// Shipping label reads "Free".
add_filter('woocommerce_cart_shipping_method_full_label', function ($label, $method) { return $method->method_id === 'free_shipping' ? 'Free' : $label; }, 10, 2);
// Checkout + cart delivery notes.
add_action('woocommerce_review_order_after_order_total', function () { echo '<tr class="hm-note-row"><td colspan="2">' . hm_note('checkout') . '</td></tr>'; });
add_action('woocommerce_after_cart_totals', function () { echo hm_note('cart'); });
// Breadcrumbs / wrappers.
add_filter('woocommerce_breadcrumb_defaults', function ($d) { $d['wrap_before'] = '<nav class="hm-wrap hm-crumbs" aria-label="Breadcrumb">'; $d['wrap_after'] = '</nav>'; $d['delimiter'] = ' / '; return $d; });
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('loop_shop_per_page', function () { return 12; });
add_filter('loop_shop_columns', function () { return 3; });
add_filter('woocommerce_add_to_cart_fragments', function ($f) { $f['b.hm-badge'] = '<b class="hm-badge">' . (int) WC()->cart->get_cart_contents_count() . '</b>'; return $f; });
add_action('widgets_init', function () { register_sidebar(['name' => 'Shop filters', 'id' => 'shop-filters', 'before_widget' => '<fieldset class="%2$s">', 'after_widget' => '</fieldset>', 'before_title' => '<legend>', 'after_title' => '</legend>']); });

/* ---------- structured data ---------- */
function hm_ship_countries() { return 'US'; // US-only store (skill rule 3).
}
function hm_ship_countries_legacy() {
    $k = array_keys(WC()->countries->get_shipping_countries());
    return count($k) === 1 ? $k[0] : (count($k) && count($k) <= 10 ? $k : WC()->countries->get_base_country());
}
function hm_cutoff_time() {
    $d = new DateTime('now', new DateTimeZone('America/Los_Angeles'));
    return '17:00:00' . $d->format('P'); // -07:00 (PDT) or -08:00 (PST)
}
function hm_decode_names(&$a) {
    foreach ($a as $k => &$v) { if (is_array($v)) hm_decode_names($v); elseif (is_string($v) && $k !== 'url' && $k !== '@id') $v = html_entity_decode(html_entity_decode($v, ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES | ENT_HTML5, 'UTF-8'); }
}
foreach (['breadcrumblist', 'product', 'website', 'order'] as $hm_t) add_filter('woocommerce_structured_data_' . $hm_t, function ($m) { if (is_array($m)) hm_decode_names($m); return $m; }, 99);
/* WC's output escapes '&' as HTML (&amp;) inside JSON-LD; print the same data with JSON escapes instead. */
add_action('init', function () {
    if (!function_exists('WC') || !WC()->structured_data) return;
    $sd = WC()->structured_data;
    if (remove_action('wp_footer', [$sd, 'output_structured_data'], 10)) {
        add_action('wp_footer', function () use ($sd) {
            ob_start(); $sd->output_structured_data(); $html = ob_get_clean();
            echo preg_replace_callback('#(<script type="application/ld\+json">)(.*?)(</script>)#s', function ($m) { return $m[1] . str_replace('&amp;', '\\u0026', $m[2]) . $m[3]; }, $html);
        }, 10);
    }
}, 20);
function hm_shipping_details() {
    return [
        '@type' => 'OfferShippingDetails',
        'shippingRate' => ['@type' => 'MonetaryAmount', 'value' => 0, 'currency' => get_woocommerce_currency()],
        'shippingDestination' => ['@type' => 'DefinedRegion', 'addressCountry' => hm_ship_countries()],
        'deliveryTime' => [
            '@type' => 'ShippingDeliveryTime',
            'cutoffTime' => hm_cutoff_time(), // 5:00 PM Pacific Time, current LA offset
            'businessDays' => ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['https://schema.org/Monday', 'https://schema.org/Tuesday', 'https://schema.org/Wednesday', 'https://schema.org/Thursday', 'https://schema.org/Friday']],
            'handlingTime' => ['@type' => 'QuantitativeValue', 'minValue' => 1, 'maxValue' => 2, 'unitCode' => 'DAY'],
            'transitTime' => ['@type' => 'QuantitativeValue', 'minValue' => 3, 'maxValue' => 5, 'unitCode' => 'DAY'],
        ],
    ];
}
function hm_return_policy() {
    return [
        '@type' => 'MerchantReturnPolicy',
        'applicableCountry' => hm_ship_countries(),
        'returnPolicyCategory' => 'https://schema.org/MerchantReturnFiniteReturnWindow',
        'merchantReturnDays' => 30,
        'returnMethod' => 'https://schema.org/ReturnByMail',
        'returnFees' => 'https://schema.org/FreeReturn',
        'returnShippingFeesAmount' => ['@type' => 'MonetaryAmount', 'value' => 0, 'currency' => get_woocommerce_currency()],
        'merchantReturnLink' => home_url('/returns-refunds/'),
    ];
}
// Extend WooCommerce's own Product JSON-LD (one source, no duplicates).
add_filter('woocommerce_structured_data_product', function ($markup, $product) {
    unset($markup['aggregateRating'], $markup['review']);
    if (empty($markup['brand'])) $markup['brand'] = ['@type' => 'Brand', 'name' => hm_brand($product)];
    if (!hm_has_identifier($product)) {
        unset($markup['gtin'], $markup['gtin8'], $markup['gtin12'], $markup['gtin13'], $markup['gtin14'], $markup['mpn'], $markup['isbn']);
        $markup['additionalProperty'] = [['@type' => 'PropertyValue', 'name' => 'identifier_exists', 'value' => 'false']];
    }
    if (!empty($markup['offers'])) {
        foreach ($markup['offers'] as &$o) {
            unset($o['priceSpecification']);
            $o['price'] = wc_format_decimal(wc_get_price_to_display($product), wc_get_price_decimals());
            $o['priceCurrency'] = get_woocommerce_currency();
            $o['shippingDetails'] = hm_shipping_details();
            $o['hasMerchantReturnPolicy'] = hm_return_policy();
        }
    }
    return $markup;
}, 20, 2);
// OnlineStore + WebSite on the front page (business details are placeholders until launch).
add_action('wp_head', function () {
    if (!is_front_page()) return;
    $org = [
        '@context' => 'https://schema.org', '@type' => 'OnlineStore', 'name' => 'Hartwell Mart', 'url' => home_url('/'),
        'telephone' => '+1-984-258-0710', 'email' => 'support@hartwellmart.com',
        'address' => ['@type' => 'PostalAddress', 'streetAddress' => '705 Keystone Park Dr, Unit 27', 'addressLocality' => 'Morrisville', 'addressRegion' => 'NC', 'postalCode' => '27560-6101', 'addressCountry' => 'US'],
        'openingHoursSpecification' => [['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '10:00', 'closes' => '17:00']],
        'hasMerchantReturnPolicy' => hm_return_policy(),
    ];
    $site = ['@context' => 'https://schema.org', '@type' => 'WebSite', 'name' => 'Hartwell Mart', 'url' => home_url('/'),
        'potentialAction' => ['@type' => 'SearchAction', 'target' => home_url('/?s={search_term_string}&post_type=product'), 'query-input' => 'required name=search_term_string']];
    echo '<script type="application/ld+json">' . wp_json_encode($org) . "</script>\n<script type=\"application/ld+json\">" . wp_json_encode($site) . "</script>\n";
});

/* ---------- department bar ---------- */
/** True when at least one product is published. */
function hm_has_products() {
    static $h = null; if ($h === null) $h = (bool) get_posts(['post_type' => 'product', 'post_status' => 'publish', 'numberposts' => 1, 'fields' => 'ids']);
    return $h;
}
/** Empty-catalog note (pre-launch). */
function hm_coming_soon($where = '') {
    return '<div class="hm-soon" role="status"><span class="hm-kicker" style="color:var(--hm-brick)">Products coming soon</span><h2>We are stocking the shelves' . ($where ? ' in ' . esc_html($where) : '') . '.</h2><p>New products are on the way. In the meantime, read our buying guides or <a href="' . esc_url(home_url('/contact/')) . '">contact us</a> with any question.</p></div>';
}
function hm_departments() {
    static $t; if ($t !== null) return $t;
    $t = get_terms(['taxonomy' => 'product_cat', 'parent' => 0, 'hide_empty' => hm_has_products()]); // pre-launch (no products): keep the departments navigable
    if (!is_wp_error($t)) $t = array_values(array_filter($t, function ($x) { return $x->slug !== 'uncategorized' && (hm_has_products() || hm_dept_banner($x->slug)); })); // empty catalog: only the 5 real departments
    return $t = is_wp_error($t) ? [] : $t;
}
function hm_mega($id, $term = null) {
    $cols = '';
    foreach ($term ? [$term] : hm_departments() as $p) {
        $kids = get_terms(['taxonomy' => 'product_cat', 'parent' => $p->term_id, 'hide_empty' => true, 'number' => 6]);
        $li = '';
        if ($kids && !is_wp_error($kids)) foreach ($kids as $k) $li .= '<li><a href="' . esc_url(get_term_link($k)) . '">' . esc_html($k->name) . '</a></li>';
        $li .= '<li><a href="' . esc_url(get_term_link($p)) . '">Shop all ' . esc_html($p->name) . '</a></li>';
        $cols .= '<div><h4>' . esc_html($p->name) . '</h4><ul>' . $li . '</ul></div>';
    }
    // Guide block only when the category has real buying-guide content (rendered at #guide on the category page).
    $guide = '';
    if ($term && get_term_meta($term->term_id, 'hm_guide', true)) {
        $name = html_entity_decode($term->name);
        $guide = '<div class="hm-mega__guide"><span class="hm-kicker">How to choose</span><h3>New to ' . esc_html(strtolower($name)) . '? Start with our buying guide</h3><a class="hm-btn hm-btn--brick" href="' . esc_url(get_term_link($term)) . '#guide">Read the guide</a></div>';
    }
    return '<div class="hm-mega" id="hm-mega-' . esc_attr($id) . '" role="region" aria-label="' . esc_attr($term ? html_entity_decode($term->name) : 'All Departments') . '"><div class="hm-mega__in">' . $cols . $guide . '</div></div>';
}

/* ---------- product identifiers / brand ---------- */
function hm_brand($product) {
    $t = get_the_terms($product->get_id(), 'product_brand');
    return ($t && !is_wp_error($t)) ? html_entity_decode($t[0]->name) : 'Hartwell Mart';
}
/** Real identifier = a stored GTIN, or an MPN not flagged as internal. Internal TGM-MPN-* codes are not real MPNs. */
function hm_has_identifier($product) {
    if ($product->get_meta('_hm_identifier_exists') === 'no') return false;
    return (bool) $product->get_global_unique_id();
}

/* ---------- meta descriptions ---------- */
function hm_meta_description() {
    $clip = function ($t) {
        $t = trim(preg_replace('/\s+/', ' ', html_entity_decode(wp_strip_all_tags(strip_shortcodes((string) $t)), ENT_QUOTES, 'UTF-8')));
        if (mb_strlen($t) <= 160) return preg_replace('/\s*(?:…|\.){2,}$/u', '.', $t);
        $out = '';
        foreach (preg_split('/(?<=[.!?])\s+/u', $t) as $sen) { $try = $out === '' ? $sen : $out . ' ' . $sen; if (mb_strlen($try) > 160) break; $out = $try; }
        if ($out === '') { $w = mb_substr($t, 0, 158); $w = preg_replace('/\s+\S*$/u', '', $w); $out = rtrim($w, ' ,;:-') . '.'; }
        return preg_replace('/\s*(?:…|\.){2,}$/u', '.', $out);
    };
    if (is_front_page()) return 'Hartwell Mart: home, kitchen, electronics, smart home and patio goods with free shipping on every order, delivery in 4-7 business days and free 30-day returns.';
    if (function_exists('is_shop') && is_shop()) return 'Shop all Hartwell Mart departments: home, furniture, electronics, smart home and patio & garden. Free shipping, delivery in 4-7 business days, free returns.';
    if (function_exists('is_product_category') && is_product_category()) {
        $t = get_queried_object(); $d = $clip(term_description($t));
        return $d ?: $clip(html_entity_decode($t->name) . ' at Hartwell Mart: practical picks with buying guides, free shipping on every order and free 30-day returns.');
    }
    if (function_exists('is_product') && is_product()) {
        $p = wc_get_product(get_queried_object_id());
        return $p ? $clip($p->get_short_description() ?: $p->get_description()) : '';
    }
    if (is_page()) {
        $map = [
            'shipping-policy' => 'Hartwell Mart shipping policy: free shipping on every order, handling in 1-2 business days, transit in 3-5, and delivery in 4-7 business days (Mon-Fri).',
            'returns-refunds' => 'Hartwell Mart returns & refunds: free returns within 30 days of delivery with a prepaid label, no return shipping cost and no restocking fee.',
            'privacy-policy' => 'How Hartwell Mart collects, uses and protects your personal information, how cookies are used, and how to request access, correction or deletion.',
            'terms-of-service' => 'Terms of service for shopping at Hartwell Mart: orders, pricing, payment, free shipping, delivery times, free 30-day returns and liability.',
            'contact' => 'Contact Hartwell Mart about an order, a product or a return by phone, email or the contact form. Real people answer.',
            'about' => 'About Hartwell Mart: one online store for home, kitchen, electronics and patio needs, with clear product information and simple free returns.',
            'cart' => 'Review the items in your Hartwell Mart cart. Shipping is free on every order and delivery takes 4-7 business days.',
            'checkout' => 'Secure checkout at Hartwell Mart. Free shipping, delivery in 4-7 business days and free 30-day returns.',
            'faq' => 'Hartwell Mart FAQ: free shipping, US-only delivery in 4-7 business days, payment methods, free 30-day returns, damaged items and how to contact us.',
            'billing-terms' => 'Hartwell Mart billing terms: Visa, Mastercard, American Express and PayPal, prices in USD, when you are charged, sales tax and refunds.',
            'my-account' => 'Sign in to your Hartwell Mart account to see orders, track deliveries and manage addresses.',
        ];
        $slug = get_post_field('post_name', get_queried_object_id());
        if (isset($map[$slug])) return $map[$slug];
        return $clip(get_the_excerpt(get_queried_object_id()));
    }
    return get_bloginfo('description');
}
add_action('wp_head', function () { $d = hm_meta_description(); if ($d) echo '<meta name="description" content="' . esc_attr($d) . '">' . "\n"; }, 1);

/* Accepted payment methods (display only; gateway settings unchanged). */
function hm_payment_methods() { return ['Visa', 'Mastercard', 'American Express', 'PayPal']; }
add_action('woocommerce_review_order_before_payment', function () {
    echo '<p class="hm-paymethods"><strong>We accept:</strong> ' . esc_html(implode(', ', hm_payment_methods())) . '</p>';
});
