<?php
/**
 * Tire finder — MozTire.
 *
 * Products carry a Brand (product_brand) and the global tire attributes below.
 * Filtering uses WooCommerce's native layered-nav query args
 * (?filter_tire-width=225&filter_aspect-ratio=65&filter_rim-diameter=17), so no
 * plugin and no database change is required.
 */

defined('ABSPATH') || exit;

/**
 * Global tire attributes, in the order shoppers narrow down a tire.
 * 'size' => part of the tire size string, 'filter' => shown in the shop sidebar.
 */
function dawp_tire_attributes() {
    // Order = shop sidebar order. 'open' = expanded by default, 'search' = matched by keyword search.
    return [
        'width'      => ['tax' => 'pa_tire-width',     'label' => 'Width',          'filter' => true,  'open' => true,  'search' => false],
        'aspect'     => ['tax' => 'pa_aspect-ratio',   'label' => 'Aspect Ratio',   'filter' => true,  'open' => true,  'search' => false],
        'rim'        => ['tax' => 'pa_rim-diameter',   'label' => 'Rim Diameter',   'filter' => true,  'open' => true,  'search' => false],
        'season'     => ['tax' => 'pa_season',         'label' => 'Season',         'filter' => true,  'open' => true,  'search' => true],
        'category'   => ['tax' => 'pa_tire-category',  'label' => 'Tire Category',  'filter' => true,  'open' => true,  'search' => true],
        'vehicle'    => ['tax' => 'pa_vehicle-type',   'label' => 'Vehicle Type',   'filter' => true,  'open' => true,  'search' => true],
        'speed'      => ['tax' => 'pa_speed-rating',   'label' => 'Speed Rating',   'filter' => true,  'open' => false, 'search' => false],
        'load_range' => ['tax' => 'pa_load-range',     'label' => 'Load Range',     'filter' => true,  'open' => false, 'search' => false],
        'features'   => ['tax' => 'pa_tire-features',  'label' => 'Features',       'filter' => true,  'open' => false, 'search' => true],
        'service'    => ['tax' => 'pa_service-type',   'label' => 'Service Type',   'filter' => true,  'open' => false, 'search' => false],
        'sidewall'   => ['tax' => 'pa_sidewall',       'label' => 'Sidewall',       'filter' => true,  'open' => false, 'search' => false],
        'pack'       => ['tax' => 'pa_pack-size',      'label' => 'Pack Size',      'filter' => true,  'open' => false, 'search' => false],
        'warranty'   => ['tax' => 'pa_tread-warranty', 'label' => 'Tread Warranty', 'filter' => true,  'open' => false, 'search' => false],
        'load_index' => ['tax' => 'pa_load-index',     'label' => 'Load Index',     'filter' => false, 'open' => false, 'search' => false],
        'line'       => ['tax' => 'pa_tire-line',      'label' => 'Tire Line',      'filter' => false, 'open' => false, 'search' => true],
    ];
}

/**
 * Sort tire attribute values the way a shopper reads them:
 * speed ratings by their mph ("H (130 mph)" before "V (149 mph)"), everything else naturally (15 < 16, 95 < 121/118).
 */
function dawp_tire_sort_names($a, $b) {
    $mph = static function ($name) {
        return preg_match('/(\d+)\s*mph/i', $name, $m) ? (int) $m[1] : null;
    };
    $ma = $mph($a);
    $mb = $mph($b);

    if ($ma !== null && $mb !== null) {
        return $ma <=> $mb;
    }

    return strnatcasecmp($a, $b);
}

function dawp_tire_tax($key) {
    $attributes = dawp_tire_attributes();
    return isset($attributes[$key]) ? $attributes[$key]['tax'] : '';
}

function dawp_tire_filter_key($taxonomy) {
    return 'filter_' . preg_replace('/^pa_/', '', $taxonomy);
}

function dawp_shop_url() {
    $url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : '';
    return $url ? $url : home_url('/shop/');
}

/**
 * Terms of a tire attribute, sorted naturally (so 15 < 16 < 17 and 195 < 205).
 */
function dawp_tire_terms($taxonomy, $hide_empty = true) {
    static $cache = [];
    $cache_key = $taxonomy . ($hide_empty ? ':1' : ':0');

    if (isset($cache[$cache_key])) {
        return $cache[$cache_key];
    }

    $terms = [];
    if ($taxonomy && taxonomy_exists($taxonomy)) {
        $found = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => $hide_empty]);
        if (! is_wp_error($found)) {
            $terms = $found;
            usort($terms, static function ($a, $b) {
                return dawp_tire_sort_names($a->name, $b->name);
            });
        }
    }

    $cache[$cache_key] = $terms;
    return $terms;
}

/**
 * Size-select options: real attribute terms when the catalog has them,
 * otherwise the common U.S. passenger / light-truck sizes.
 *
 * @return array slug => label
 */
function dawp_tire_size_options($key) {
    $options = [];

    foreach (dawp_tire_terms(dawp_tire_tax($key)) as $term) {
        $options[$term->slug] = $term->name;
    }

    if ($options) {
        return $options;
    }

    $fallback = [
        'width'  => range(155, 335, 10),
        'aspect' => range(30, 85, 5),
        'rim'    => range(14, 24),
    ];

    foreach ($fallback[$key] ?? [] as $value) {
        $options[(string) $value] = (string) $value;
    }

    return $options;
}

/**
 * Parse "225/65R17", "225 65 17", "LT265/70R17 121S" into its three numbers.
 */
function dawp_tire_parse_size($string) {
    if (! preg_match('#(?:^|[^0-9])(\d{3})\s*[/\-\s]\s*(\d{2})\s*[/\-\s]?\s*Z?R?F?\s*-?\s*(\d{2}(?:\.\d)?)(?:[^0-9]|$)#i', (string) $string, $m)) {
        return null;
    }

    return ['width' => $m[1], 'aspect' => $m[2], 'rim' => $m[3]];
}

/**
 * Find an attribute term by its visible name or slug ("17", "17 in", "17-inch").
 */
function dawp_tire_find_term($taxonomy, $value) {
    if (! taxonomy_exists($taxonomy)) {
        return null;
    }

    foreach (['slug', 'name'] as $field) {
        $term = get_term_by($field, $value, $taxonomy);
        if ($term && ! is_wp_error($term)) {
            return $term;
        }
    }

    foreach (dawp_tire_terms($taxonomy, false) as $term) {
        if (preg_match('/^\s*(\d+(?:\.\d+)?)/', $term->name, $m) && (float) $m[1] === (float) $value) {
            return $term;
        }
    }

    return null;
}

/**
 * Shop URL for a set of filters: [ 'pa_tire-width' => '225', ... ].
 */
function dawp_tire_filter_url($filters, $base = '') {
    $args = [];

    foreach ($filters as $taxonomy => $slugs) {
        $slugs = array_filter((array) $slugs, 'strlen');
        if ($slugs) {
            $args[dawp_tire_filter_key($taxonomy)] = implode(',', $slugs);
        }
    }

    return add_query_arg($args, $base ? $base : dawp_shop_url());
}

/**
 * Filters currently applied through the query string.
 *
 * @return array taxonomy => slug[]
 */
function dawp_tire_active_filters() {
    $active = [];

    foreach (dawp_tire_attributes() as $attribute) {
        $key = dawp_tire_filter_key($attribute['tax']);
        if (! empty($_GET[$key])) {
            $slugs = array_filter(array_map('sanitize_title', explode(',', wp_unslash($_GET[$key]))));
            if ($slugs) {
                $active[$attribute['tax']] = $slugs;
            }
        }
    }

    return $active;
}

/**
 * Archive URL without pagination, keeping search / ordering args.
 */
function dawp_tire_archive_base_url() {
    $base = dawp_shop_url();

    if (function_exists('is_product_taxonomy') && is_product_taxonomy()) {
        $link = get_term_link(get_queried_object());
        if (! is_wp_error($link)) {
            $base = $link;
        }
    }

    foreach (['s', 'post_type', 'orderby'] as $keep) {
        if (isset($_GET[$keep]) && $_GET[$keep] !== '') {
            $base = add_query_arg($keep, sanitize_text_field(wp_unslash($_GET[$keep])), $base);
        }
    }

    return $base;
}

/**
 * Current archive URL with one attribute value toggled on/off (brand + price filters kept).
 */
function dawp_tire_toggle_filter_url($taxonomy, $slug) {
    $state = dawp_shop_state();
    $slugs = $state['filters'][$taxonomy] ?? [];

    $state['filters'][$taxonomy] = in_array($slug, $slugs, true)
        ? array_values(array_diff($slugs, [$slug]))
        : array_merge($slugs, [$slug]);

    return dawp_shop_state_url($state);
}

/* ------------------------------------------------------------------
 * Product helpers
 * ------------------------------------------------------------------ */

function dawp_product_tire_terms($product, $key) {
    $taxonomy = dawp_tire_tax($key);
    if (! $product || ! $taxonomy || ! taxonomy_exists($taxonomy)) {
        return [];
    }

    $terms = wc_get_product_terms($product->get_id(), $taxonomy, ['fields' => 'names']);
    return is_wp_error($terms) ? [] : $terms;
}

function dawp_product_tire_value($product, $key, $separator = ', ') {
    return implode($separator, dawp_product_tire_terms($product, $key));
}

/**
 * Brand name to display: the Brands taxonomy, or the product-level "Brand" attribute
 * on products whose global attributes have not been filled in yet.
 */
function dawp_product_brand_name($product) {
    $term = dawp_product_brand($product);
    if ($term) {
        return $term->name;
    }

    return $product ? trim((string) $product->get_attribute('Brand')) : '';
}

function dawp_product_brand($product) {
    if (! $product || ! taxonomy_exists('product_brand')) {
        return null;
    }

    $terms = get_the_terms($product->get_id(), 'product_brand');
    return (! empty($terms) && ! is_wp_error($terms)) ? $terms[0] : null;
}

/**
 * "225/65R17" (plus "102H" service description when available).
 */
function dawp_product_tire_size($product, $with_service = true) {
    $width  = dawp_product_tire_value($product, 'width', '/');
    $aspect = dawp_product_tire_value($product, 'aspect', '/');
    $rim    = dawp_product_tire_value($product, 'rim', '/');
    $size   = '';

    if ($width && $aspect && $rim) {
        $size = sprintf('%s/%sR%s', (int) $width, (int) $aspect, preg_replace('/[^0-9.]/', '', $rim));
    } elseif ($product) {
        $parsed = dawp_tire_parse_size($product->get_name());
        if ($parsed) {
            $size = sprintf('%s/%sR%s', $parsed['width'], $parsed['aspect'], $parsed['rim']);
        }
    }

    if ($size && $with_service) {
        $service = trim(dawp_product_tire_value($product, 'load_index', '/') . dawp_product_tire_value($product, 'speed', '/'));
        if ($service !== '') {
            $size .= ' ' . $service;
        }
    }

    return $size;
}

/**
 * Short spec chips for cards / product summary.
 */
function dawp_product_tire_chips($product, $keys = ['season', 'vehicle', 'warranty']) {
    $chips = [];

    foreach ($keys as $key) {
        $value = dawp_product_tire_value($product, $key, ' / ');
        if ($value !== '') {
            $chips[$key] = $value;
        }
    }

    return $chips;
}

/* ------------------------------------------------------------------
 * Size catalog — product categories are tire sizes ("265/60R18")
 * ------------------------------------------------------------------ */

/**
 * Every size category that has products, sorted by width → aspect → rim.
 * Cached for an hour (the catalog changes constantly; exact freshness is not needed).
 *
 * @return array[] ['w' => '265', 'a' => '60', 'r' => '18', 'name' => '265/60R18', 'slug' => '...', 'count' => 211]
 */
function dawp_size_catalog() {
    static $catalog = null;

    if ($catalog !== null) {
        return $catalog;
    }

    $catalog = get_transient('dawp_size_catalog');
    if (is_array($catalog)) {
        return $catalog;
    }

    $catalog = [];
    $terms   = taxonomy_exists('product_cat') ? get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true]) : [];

    foreach (is_wp_error($terms) ? [] : $terms as $term) {
        $size = dawp_tire_parse_size($term->name);
        if ($size) {
            $catalog[] = ['w' => $size['width'], 'a' => $size['aspect'], 'r' => $size['rim'], 'name' => $term->name, 'slug' => $term->slug, 'count' => (int) $term->count];
        }
    }

    usort($catalog, static function ($x, $y) {
        return [(float) $x['w'], (float) $x['a'], (float) $x['r']] <=> [(float) $y['w'], (float) $y['a'], (float) $y['r']];
    });

    set_transient('dawp_size_catalog', $catalog, HOUR_IN_SECONDS);

    return $catalog;
}

/**
 * Flotation / off-road size categories that don't fit Width/Ratio/Rim, e.g. "33X12.50R20".
 *
 * @return WP_Term[]
 */
function dawp_flotation_sizes() {
    $terms = get_transient('dawp_flotation_sizes');

    if (! is_array($terms)) {
        $terms = [];
        $all   = taxonomy_exists('product_cat') ? get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true]) : [];
        foreach (is_wp_error($all) ? [] : $all as $term) {
            if (preg_match('/^\s*\d{2}\s*x\s*\d{1,2}(?:\.\d{1,2})?\s*R\s*\d{2}/i', $term->name)) {
                $terms[] = $term;
            }
        }
        usort($terms, static function ($a, $b) {
            return strnatcasecmp($a->name, $b->name);
        });
        set_transient('dawp_flotation_sizes', $terms, HOUR_IN_SECONDS);
    }

    return $terms;
}

/**
 * Size currently being viewed: size category archive, or ?size_w=&size_a=&size_r=.
 */
function dawp_current_size() {
    if (function_exists('is_product_category') && is_product_category()) {
        $size = dawp_tire_parse_size(get_queried_object()->name);
        if ($size) {
            return ['w' => $size['width'], 'a' => $size['aspect'], 'r' => $size['rim']];
        }
    }

    return [
        'w' => isset($_GET['size_w']) ? sanitize_text_field(wp_unslash($_GET['size_w'])) : '',
        'a' => isset($_GET['size_a']) ? sanitize_text_field(wp_unslash($_GET['size_a'])) : '',
        'r' => isset($_GET['size_r']) ? sanitize_text_field(wp_unslash($_GET['size_r'])) : '',
    ];
}

/**
 * Width → Ratio → Rim dropdowns over the size catalog (options cascade in assets/js/main.js).
 * The form submits to the home URL; dawp_size_picker_redirect() sends it to the size category.
 */
function dawp_size_picker_fields($id, $labels = ['Width', 'Aspect Ratio', 'Rim Diameter']) {
    $tree = [];
    foreach (dawp_size_catalog() as $size) {
        $tree[$size['w']][$size['a']][] = $size['r'];
    }

    $current = dawp_current_size();
    $keys    = ['w' => 'size_w', 'a' => 'size_a', 'r' => 'size_r'];
    $i       = 0;
    ?>
    <input type="hidden" data-size-tree value="<?php echo esc_attr(wp_json_encode($tree)); ?>">
    <?php foreach ($keys as $k => $name) :
        $options = [];
        if ($k === 'w') {
            $options = array_keys($tree);
        } elseif ($k === 'a' && $current['w'] !== '' && isset($tree[$current['w']])) {
            $options = array_keys($tree[$current['w']]);
        } elseif ($k === 'r' && isset($tree[$current['w']][$current['a']])) {
            $options = $tree[$current['w']][$current['a']];
        }
        ?>
        <div class="tf__field">
            <label for="<?php echo esc_attr($id . '-' . $name); ?>"><?php echo esc_html($labels[$i++]); ?></label>
            <select id="<?php echo esc_attr($id . '-' . $name); ?>" name="<?php echo esc_attr($name); ?>" data-size-level="<?php echo esc_attr($k); ?>" required <?php disabled(! $options); ?>>
                <option value=""><?php echo $k === 'w' ? 'Select' : '—'; ?></option>
                <?php foreach ($options as $value) : ?>
                    <option value="<?php echo esc_attr($value); ?>" <?php selected((string) $current[$k], (string) $value); ?>><?php echo esc_html($k === 'r' ? 'R' . $value : $value); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endforeach;
}

add_action('template_redirect', 'dawp_size_picker_redirect', 3);
function dawp_size_picker_redirect() {
    if (empty($_GET['size_w']) || empty($_GET['size_a']) || empty($_GET['size_r'])) {
        return;
    }

    $want = [
        'w' => sanitize_text_field(wp_unslash($_GET['size_w'])),
        'a' => sanitize_text_field(wp_unslash($_GET['size_a'])),
        'r' => sanitize_text_field(wp_unslash($_GET['size_r'])),
    ];

    // Keep any other filters (brand, price, season…) on the destination.
    $keep = [];
    foreach ($_GET as $key => $value) {
        if (! in_array($key, ['size_w', 'size_a', 'size_r', 's', 'post_type', 'paged'], true) && is_string($value) && $value !== '') {
            $keep[sanitize_key($key)] = sanitize_text_field(wp_unslash($value));
        }
    }

    foreach (dawp_size_catalog() as $size) {
        if ($size['w'] === $want['w'] && $size['a'] === $want['a'] && (float) $size['r'] === (float) $want['r']) {
            $link = get_term_link($size['slug'], 'product_cat');
            if (! is_wp_error($link)) {
                wp_safe_redirect(add_query_arg($keep, $link));
                exit;
            }
        }
    }

    // Unknown combination: let search try it (FiboSearch / size redirect).
    wp_safe_redirect(add_query_arg(['s' => sprintf('%s/%sR%s', $want['w'], $want['a'], $want['r']), 'post_type' => 'product'], home_url('/')));
    exit;
}

/**
 * Has this attribute been filled in on enough products to be useful as a filter link?
 * While attributes are being added to the catalog, links fall back to keyword search.
 */
function dawp_attribute_ready($taxonomy, $slugs = []) {
    $min   = (int) apply_filters('dawp_attribute_ready_min_products', 50);
    $total = 0;

    foreach (dawp_tire_terms($taxonomy) as $term) {
        if (! $slugs || in_array($term->slug, $slugs, true)) {
            $total += (int) $term->count;
        }
    }

    return $total >= $min;
}

/* ------------------------------------------------------------------
 * Finder widget (home hero, shop, 404)
 * ------------------------------------------------------------------ */

function dawp_tire_vehicle_types() {
    $terms = dawp_tire_terms(dawp_tire_tax('vehicle'));

    if ($terms && dawp_attribute_ready(dawp_tire_tax('vehicle'))) {
        return array_map(static function ($term) {
            return ['label' => $term->name, 'url' => dawp_tire_filter_url([$term->taxonomy => $term->slug])];
        }, $terms);
    }

    $search = static function ($q) {
        return add_query_arg(['s' => $q, 'post_type' => 'product'], home_url('/'));
    };

    return [
        ['label' => 'Passenger Car', 'url' => $search('passenger')],
        ['label' => 'SUV / Crossover', 'url' => $search('SUV')],
        ['label' => 'Pickup Truck', 'url' => $search('truck')],
        ['label' => 'Light Truck (LT)', 'url' => $search('LT')],
        ['label' => 'Performance', 'url' => $search('performance')],
        ['label' => 'Minivan', 'url' => $search('minivan')],
    ];
}

function dawp_tire_brands($limit = 0) {
    if (! taxonomy_exists('product_brand')) {
        return [];
    }

    $terms = get_terms([
        'taxonomy'   => 'product_brand',
        'hide_empty' => true,
        'orderby'    => $limit ? 'count' : 'name',
        'order'      => $limit ? 'DESC' : 'ASC',
        'number'     => $limit,
    ]);

    return is_wp_error($terms) ? [] : $terms;
}

/**
 * Render the finder.
 *
 * @param array $args 'id' (unique prefix), 'variant' ('hero' | 'bar'), 'title'.
 */
function dawp_tire_finder($args = []) {
    $args = wp_parse_args($args, [
        'id'      => 'tf',
        'variant' => 'hero',
        'title'   => 'Find tires that fit',
    ]);

    $id      = sanitize_html_class($args['id']);
    $active  = dawp_tire_active_filters();
    $seasons = dawp_tire_terms(dawp_tire_tax('season'));
    $brands  = dawp_tire_brands();
    $fields  = [
        'width'  => ['label' => 'Width'],
        'aspect' => ['label' => 'Aspect Ratio'],
        'rim'    => ['label' => 'Rim Diameter'],
    ];
    ?>
    <div class="tf tf--<?php echo esc_attr($args['variant']); ?>" data-tire-finder>
        <div class="tf__head">
            <p class="tf__title"><?php echo esc_html($args['title']); ?></p>
            <div class="tf__tabs" role="tablist" aria-label="<?php esc_attr_e('Search tires by', 'dawp'); ?>">
                <button type="button" role="tab" class="tf__tab" id="<?php echo esc_attr($id); ?>-tab-size" aria-controls="<?php echo esc_attr($id); ?>-size" aria-selected="true">By Size</button>
                <button type="button" role="tab" class="tf__tab" id="<?php echo esc_attr($id); ?>-tab-vehicle" aria-controls="<?php echo esc_attr($id); ?>-vehicle" aria-selected="false" tabindex="-1">By Vehicle</button>
                <button type="button" role="tab" class="tf__tab" id="<?php echo esc_attr($id); ?>-tab-brand" aria-controls="<?php echo esc_attr($id); ?>-brand" aria-selected="false" tabindex="-1">By Brand</button>
            </div>
        </div>

        <div class="tf__panel" role="tabpanel" id="<?php echo esc_attr($id); ?>-size" aria-labelledby="<?php echo esc_attr($id); ?>-tab-size">
            <?php if (dawp_size_catalog()) : ?>
            <form class="tf__form" method="get" action="<?php echo esc_url(home_url('/')); ?>" data-size-picker>
                <?php dawp_size_picker_fields($id); ?>
                <button type="submit" class="tf__submit">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/></svg>
                    Show Tires
                </button>
            <?php else : ?>
            <form class="tf__form" method="get" action="<?php echo esc_url(dawp_shop_url()); ?>" data-tire-size-form>
                <?php foreach ($fields as $key => $field) :
                    $taxonomy = dawp_tire_tax($key);
                    $selected = $active[$taxonomy][0] ?? '';
                    $select_id = $id . '-' . $key;
                    ?>
                    <div class="tf__field">
                        <label for="<?php echo esc_attr($select_id); ?>"><?php echo esc_html($field['label']); ?></label>
                        <select id="<?php echo esc_attr($select_id); ?>" name="<?php echo esc_attr(dawp_tire_filter_key($taxonomy)); ?>">
                            <option value="">Any</option>
                            <?php foreach (dawp_tire_size_options($key) as $slug => $label) : ?>
                                <option value="<?php echo esc_attr($slug); ?>" <?php selected($selected, $slug); ?>><?php echo esc_html($label); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endforeach; ?>

                <?php if ($seasons && dawp_attribute_ready(dawp_tire_tax('season'))) :
                    $season_tax = dawp_tire_tax('season');
                    $selected   = $active[$season_tax][0] ?? '';
                    ?>
                    <div class="tf__field">
                        <label for="<?php echo esc_attr($id); ?>-season">Season</label>
                        <select id="<?php echo esc_attr($id); ?>-season" name="<?php echo esc_attr(dawp_tire_filter_key($season_tax)); ?>">
                            <option value="">Any season</option>
                            <?php foreach ($seasons as $term) : ?>
                                <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($selected, $term->slug); ?>><?php echo esc_html($term->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <button type="submit" class="tf__submit">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/></svg>
                    Show Tires
                </button>
            <?php endif; ?>
            </form>
            <p class="tf__help">
                Find your size on the tire sidewall:
                <span class="tf__size" aria-label="225 slash 65 R 17">
                    <b>225</b>/<b>65</b>R<b>17</b>
                </span>
                <a href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">How to read a tire size</a>
            </p>
            <?php if ($flotation = dawp_flotation_sizes()) : ?>
                <p class="tf__help tf__help--sizes">
                    Off-road flotation sizes:
                    <?php foreach ($flotation as $term) : ?>
                        <a class="tf__mini" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html(strtoupper($term->name)); ?></a>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="tf__panel" role="tabpanel" id="<?php echo esc_attr($id); ?>-vehicle" aria-labelledby="<?php echo esc_attr($id); ?>-tab-vehicle" hidden>
            <div class="tf__chips">
                <?php foreach (dawp_tire_vehicle_types() as $vehicle) : ?>
                    <a class="tf__chip" href="<?php echo esc_url($vehicle['url']); ?>"><?php echo esc_html($vehicle['label']); ?></a>
                <?php endforeach; ?>
            </div>
            <p class="tf__help">Not sure? The correct size is printed on the driver-side door jamb sticker and in your owner's manual.</p>
        </div>

        <div class="tf__panel" role="tabpanel" id="<?php echo esc_attr($id); ?>-brand" aria-labelledby="<?php echo esc_attr($id); ?>-tab-brand" hidden>
            <?php if ($brands) : ?>
                <div class="tf__chips">
                    <?php foreach (array_slice($brands, 0, 18) as $brand) : ?>
                        <a class="tf__chip" href="<?php echo esc_url(get_term_link($brand)); ?>"><?php echo esc_html($brand->name); ?></a>
                    <?php endforeach; ?>
                </div>
                <?php if (count($brands) > 18) : ?>
                    <p class="tf__help"><a href="<?php echo esc_url(home_url('/shop-by-brand/')); ?>">See all <?php echo (int) count($brands); ?> brands</a></p>
                <?php endif; ?>
            <?php else : ?>
                <p class="tf__help">Brands appear here as soon as they are in stock. <a href="<?php echo esc_url(dawp_shop_url()); ?>">Browse all tires</a></p>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

/* ------------------------------------------------------------------
 * Tire card (shop grid, homepage, related products, empty cart)
 * ------------------------------------------------------------------ */

function dawp_render_tire_card($product, $tag = 'li') {
    if (! $product instanceof WC_Product) {
        return;
    }

    $url   = get_permalink($product->get_id());
    $brand = dawp_product_brand_name($product);
    $size  = dawp_product_tire_size($product);
    $chips = dawp_product_tire_chips($product);
    $tag   = in_array($tag, ['li', 'div', 'article'], true) ? $tag : 'li';
    ?>
    <<?php echo $tag; ?> class="tire-card">
        <a class="tire-card__media" href="<?php echo esc_url($url); ?>" tabindex="-1" aria-hidden="true">
            <?php if (! $product->is_in_stock()) : ?>
                <span class="tire-card__badge tire-card__badge--oos">Out of stock</span>
            <?php elseif ($product->is_on_sale()) : ?>
                <span class="tire-card__badge">Sale</span>
            <?php endif; ?>
            <?php echo dawp_product_responsive_image($product, '', '(max-width: 899px) calc((100vw - 44px) / 2), 300px'); // phpcs:ignore ?>
        </a>
        <div class="tire-card__body">
            <?php if ($brand) : ?>
                <p class="tire-card__brand"><?php echo esc_html($brand); ?></p>
            <?php endif; ?>
            <h3 class="tire-card__title"><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
            <?php if ($size) : ?>
                <span class="tire-card__size"><?php echo esc_html($size); ?></span>
            <?php endif; ?>
            <?php if ($chips) : ?>
                <ul class="tire-card__chips">
                    <?php foreach ($chips as $chip) : ?>
                        <li><?php echo esc_html($chip); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="tire-card__foot">
                <span class="tire-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
            </div>
        </div>
    </<?php echo $tag; ?>>
    <?php
}

/**
 * Best sellers, falling back to newest products.
 */
function dawp_featured_tires($limit = 8) {
    if (! function_exists('wc_get_products')) {
        return [];
    }

    $args = ['status' => 'publish', 'limit' => $limit, 'visibility' => 'catalog', 'stock_status' => 'instock'];
    $products = wc_get_products($args + ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'total_sales']);

    if (count($products) < $limit) {
        $products = wc_get_products($args + ['orderby' => 'date', 'order' => 'DESC']);
    }

    return $products;
}
