<?php
/**
 * Shop filters with live counts — MozTire.
 *
 * Filtering itself is WooCommerce-native:
 *   ?filter_season=winter,all-weather   (attributes, OR inside one attribute)
 *   ?filter_product_brand=12,34         (brand term IDs, WooCommerce Brands)
 *   ?min_price=80&max_price=250         (price)
 * This file only works out which values still have products, and how many.
 *
 * Counting: the current shop query (category / brand archive / search / visibility)
 * is cloned without the attribute, brand and price filters, its SQL is captured
 * without running it, then each facet is counted against it with every *other*
 * active filter applied — so multi-select inside a group keeps working.
 * Results are cached for an hour; a shop manager can clear them with ?clear_shop_cache=1.
 */

defined('ABSPATH') || exit;

// ?clear_shop_cache=1 (shop managers only): drop facet counts + size catalog transients, then reload without the param.
add_action('init', static function () {
    if (empty($_GET['clear_shop_cache']) || ! current_user_can('manage_woocommerce')) {
        return;
    }

    global $wpdb;
    $wpdb->query(
        "DELETE FROM {$wpdb->options}
         WHERE option_name LIKE '\_transient\_dawp\_facets\_%' OR option_name LIKE '\_transient\_timeout\_dawp\_facets\_%'"
    );
    delete_transient('dawp_size_catalog');
    delete_transient('dawp_flotation_sizes');

    wp_safe_redirect(remove_query_arg('clear_shop_cache'));
    exit;
});

// One tire has one season / one width: several values in a group means "any of".
add_filter('woocommerce_layered_nav_default_query_type', static function () {
    return 'or';
});

/* ------------------------------------------------------------------
 * State + URLs
 * ------------------------------------------------------------------ */

/**
 * Current filter state from the query string.
 */
function dawp_shop_state() {
    $brands = [];
    if (! empty($_GET['filter_product_brand'])) {
        $brands = array_values(array_filter(array_map('absint', explode(',', wp_unslash($_GET['filter_product_brand'])))));
    }

    $price = static function ($key) {
        return (isset($_GET[$key]) && $_GET[$key] !== '') ? max(0, (float) wp_unslash($_GET[$key])) : null;
    };

    return [
        'filters'   => dawp_tire_active_filters(),
        'brands'    => $brands,
        'min_price' => $price('min_price'),
        'max_price' => $price('max_price'),
    ];
}

/**
 * URL for a state on the current archive (search / ordering kept, pagination dropped).
 */
function dawp_shop_state_url($state, $base = '') {
    $url = $base ? $base : dawp_tire_archive_base_url();
    $url = dawp_tire_filter_url($state['filters'], $url);

    if (! empty($state['brands'])) {
        $url = add_query_arg('filter_product_brand', implode(',', array_unique($state['brands'])), $url);
    }
    if ($state['min_price'] !== null) {
        $url = add_query_arg('min_price', (int) floor($state['min_price']), $url);
    }
    if ($state['max_price'] !== null) {
        $url = add_query_arg('max_price', (int) ceil($state['max_price']), $url);
    }

    return $url;
}

function dawp_shop_toggle_brand_url($term_id) {
    $state = dawp_shop_state();
    $state['brands'] = in_array($term_id, $state['brands'], true)
        ? array_values(array_diff($state['brands'], [$term_id]))
        : array_merge($state['brands'], [$term_id]);

    return dawp_shop_state_url($state);
}

/**
 * Hidden inputs that carry the rest of the state through a GET form (size / price forms).
 *
 * @param string[] $skip query keys the form itself sets.
 */
function dawp_shop_state_inputs($skip = []) {
    $parts = wp_parse_url(dawp_shop_state_url(dawp_shop_state()));
    parse_str($parts['query'] ?? '', $args);

    foreach ($args as $key => $value) {
        if (in_array($key, $skip, true) || is_array($value)) {
            continue;
        }
        printf('<input type="hidden" name="%s" value="%s">', esc_attr($key), esc_attr($value));
    }
}

/* ------------------------------------------------------------------
 * Counting
 * ------------------------------------------------------------------ */

/**
 * SQL of the current product query without our facet filters (not executed).
 */
function dawp_facet_base_sql() {
    global $wp_query;

    $facet_taxonomies = array_merge(['product_brand'], array_column(dawp_tire_attributes(), 'tax'));
    $vars             = $wp_query->query_vars;

    if (! empty($vars['tax_query']) && is_array($vars['tax_query'])) {
        $vars['tax_query'] = array_values(array_filter($vars['tax_query'], static function ($clause) use ($facet_taxonomies) {
            return ! is_array($clause) || empty($clause['taxonomy']) || ! in_array($clause['taxonomy'], $facet_taxonomies, true);
        }));
    }

    unset($vars['paged'], $vars['wc_query'], $vars['meta_key']);
    $vars = array_merge($vars, [
        'fields'                 => 'ids',
        'nopaging'               => true,
        'posts_per_page'         => -1,
        'no_found_rows'          => true,
        'orderby'                => 'none',
        'cache_results'          => false,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
        'dawp_facet_base'        => true,
    ]);

    $sql     = '';
    $capture = static function ($posts, $query) use (&$sql) {
        if ($query->get('dawp_facet_base')) {
            $sql = $query->request;
            return [];
        }
        return $posts;
    };

    add_filter('posts_pre_query', $capture, 99, 2);
    new WP_Query($vars);
    remove_filter('posts_pre_query', $capture, 99);

    return trim((string) $sql);
}

/**
 * "object_id IN (...)" constraints for every active filter except $skip.
 */
function dawp_facet_constraints($column, $state, $skip) {
    global $wpdb;

    $sql = '';

    foreach ($state['filters'] as $taxonomy => $slugs) {
        if ($taxonomy === $skip || ! $slugs) {
            continue;
        }
        $in   = "'" . implode("','", array_map('esc_sql', $slugs)) . "'";
        $sql .= $wpdb->prepare(
            " AND {$column} IN (SELECT r.object_id FROM {$wpdb->term_relationships} r INNER JOIN {$wpdb->term_taxonomy} x ON x.term_taxonomy_id = r.term_taxonomy_id INNER JOIN {$wpdb->terms} t2 ON t2.term_id = x.term_id WHERE x.taxonomy = %s AND t2.slug IN ($in))",
            $taxonomy
        );
    }

    if ($skip !== 'product_brand' && $state['brands']) {
        $sql .= " AND {$column} IN (SELECT r.object_id FROM {$wpdb->term_relationships} r INNER JOIN {$wpdb->term_taxonomy} x ON x.term_taxonomy_id = r.term_taxonomy_id WHERE x.taxonomy = 'product_brand' AND x.term_id IN (" . implode(',', array_map('intval', $state['brands'])) . '))';
    }

    if ($skip !== 'price' && ($state['min_price'] !== null || $state['max_price'] !== null)) {
        $sql .= $wpdb->prepare(
            " AND {$column} IN (SELECT l.product_id FROM {$wpdb->wc_product_meta_lookup} l WHERE l.min_price <= %f AND l.max_price >= %f)",
            $state['max_price'] !== null ? $state['max_price'] : PHP_INT_MAX,
            $state['min_price'] !== null ? $state['min_price'] : 0
        );
    }

    return $sql;
}

/**
 * Counts for every filter group in the current context.
 *
 * @return array{terms: array<string, array<string,int>>, brands: array<int,int>, price: array{0: float, 1: float}|null}
 */
function dawp_shop_facets() {
    global $wpdb;
    static $result = null;

    if ($result !== null) {
        return $result;
    }

    $result = ['terms' => [], 'brands' => [], 'price' => null];
    $base   = dawp_facet_base_sql();
    if ($base === '') {
        return $result;
    }

    $state     = dawp_shop_state();
    // Fixed 1-hour cache: products are edited constantly, so keying on the product cache
    // version would recount on almost every request.
    $cache_key = 'dawp_facets_' . md5($base . wp_json_encode($state));
    $cached    = get_transient($cache_key);

    if (is_array($cached)) {
        return $result = $cached;
    }

    foreach (dawp_tire_attributes() as $attribute) {
        $taxonomy = $attribute['tax'];
        if (empty($attribute['filter']) || ! taxonomy_exists($taxonomy)) {
            continue;
        }

        $rows = $wpdb->get_results($wpdb->prepare(
            "SELECT t.slug, COUNT(DISTINCT tr.object_id) AS c
             FROM {$wpdb->term_relationships} tr
             INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
             INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id
             WHERE tt.taxonomy = %s AND tr.object_id IN ($base)" . dawp_facet_constraints('tr.object_id', $state, $taxonomy) . '
             GROUP BY t.slug',
            $taxonomy
        )); // phpcs:ignore WordPress.DB.PreparedSQL

        foreach ((array) $rows as $row) {
            $result['terms'][$taxonomy][$row->slug] = (int) $row->c;
        }
    }

    if (taxonomy_exists('product_brand')) {
        $rows = $wpdb->get_results(
            "SELECT tt.term_id, COUNT(DISTINCT tr.object_id) AS c
             FROM {$wpdb->term_relationships} tr
             INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
             WHERE tt.taxonomy = 'product_brand' AND tr.object_id IN ($base)" . dawp_facet_constraints('tr.object_id', $state, 'product_brand') . '
             GROUP BY tt.term_id'
        ); // phpcs:ignore WordPress.DB.PreparedSQL

        foreach ((array) $rows as $row) {
            $result['brands'][(int) $row->term_id] = (int) $row->c;
        }
    }

    $range = $wpdb->get_row(
        "SELECT MIN(l.min_price) AS lo, MAX(l.max_price) AS hi FROM {$wpdb->wc_product_meta_lookup} l
         WHERE l.product_id IN ($base)" . dawp_facet_constraints('l.product_id', $state, 'price')
    ); // phpcs:ignore WordPress.DB.PreparedSQL

    if ($range && $range->hi !== null) {
        $result['price'] = [(float) $range->lo, (float) $range->hi];
    }

    set_transient($cache_key, $result, HOUR_IN_SECONDS);

    return $result;
}

/* ------------------------------------------------------------------
 * Active filter chips
 * ------------------------------------------------------------------ */

function dawp_shop_active_chips() {
    $state = dawp_shop_state();
    $chips = [];

    foreach ($state['filters'] as $taxonomy => $slugs) {
        foreach ($slugs as $slug) {
            $term    = get_term_by('slug', $slug, $taxonomy);
            $chips[] = [
                'label' => wc_attribute_label($taxonomy) . ': ' . ($term ? $term->name : $slug),
                'url'   => dawp_tire_toggle_filter_url($taxonomy, $slug),
            ];
        }
    }

    foreach ($state['brands'] as $brand_id) {
        $term    = get_term($brand_id, 'product_brand');
        $chips[] = [
            'label' => 'Brand: ' . (($term && ! is_wp_error($term)) ? $term->name : $brand_id),
            'url'   => dawp_shop_toggle_brand_url($brand_id),
        ];
    }

    if ($state['min_price'] !== null || $state['max_price'] !== null) {
        $no_price              = $state;
        $no_price['min_price'] = null;
        $no_price['max_price'] = null;
        $chips[] = [
            'label' => sprintf(
                'Price: %s – %s',
                wp_strip_all_tags(wc_price((float) $state['min_price'], ['decimals' => 0])),
                $state['max_price'] !== null ? wp_strip_all_tags(wc_price($state['max_price'], ['decimals' => 0])) : 'max'
            ),
            'url'   => dawp_shop_state_url($no_price),
        ];
    }

    return $chips;
}

/* ------------------------------------------------------------------
 * Sidebar
 * ------------------------------------------------------------------ */

function dawp_render_shop_filters() {
    $state      = dawp_shop_state();
    $facets     = dawp_shop_facets();
    $attributes = dawp_tire_attributes();
    $term       = is_product_taxonomy() ? get_queried_object() : null;
    $is_brand   = $term && $term->taxonomy === 'product_brand';
    $is_size    = $term && $term->taxonomy === 'product_cat' && dawp_tire_parse_size($term->name);
    $check      = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>';

    // Visible values of one attribute: has products here, or is selected.
    $values = static function ($taxonomy) use ($facets, $state) {
        $counts = $facets['terms'][$taxonomy] ?? [];
        $chosen = $state['filters'][$taxonomy] ?? [];
        $out    = [];
        foreach (dawp_tire_terms($taxonomy, false) as $t) {
            $count = $counts[$t->slug] ?? 0;
            if ($count > 0 || in_array($t->slug, $chosen, true)) {
                $out[] = ['term' => $t, 'count' => $count, 'on' => in_array($t->slug, $chosen, true)];
            }
        }
        return $out;
    };

    $render_list = static function ($key, $attribute) use ($values, $state, $check) {
        $items = $values($attribute['tax']);
        if (! $items) {
            return;
        }
        $chosen = $state['filters'][$attribute['tax']] ?? [];
        ?>
        <details class="shop-filter" <?php echo ($chosen || $attribute['open']) ? 'open' : ''; ?>>
            <summary><?php echo esc_html($attribute['label']); ?><?php if ($chosen) : ?> <span class="shop-filter__on"><?php echo count($chosen); ?></span><?php endif; ?></summary>
            <ul class="shop-filter__list">
                <?php foreach ($items as $item) : ?>
                    <li>
                        <a class="shop-filter__opt<?php echo $item['on'] ? ' is-active' : ''; ?>" href="<?php echo esc_url(dawp_tire_toggle_filter_url($attribute['tax'], $item['term']->slug)); ?>" rel="nofollow" <?php echo $item['on'] ? 'aria-current="true"' : ''; ?>>
                            <span class="shop-filter__box"><?php echo $check; // phpcs:ignore ?></span>
                            <span class="shop-filter__name"><?php echo esc_html($item['term']->name); ?></span>
                            <span class="shop-filter__count"><?php echo (int) $item['count']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </details>
        <?php
    };
    ?>
    <div class="shop-filters__head">
        <p class="shop-filters__title">Filter tires</p>
        <button type="button" class="shop-filters__close" data-shop-filter-close aria-label="Close filters">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
        </button>
    </div>

    <?php
    /* 1. Size — Width → Ratio → Rim over the size categories (attribute filters as fallback) */
    if (dawp_size_catalog()) :
        ?>
        <details class="shop-filter" open>
            <summary>Tire Size<?php if ($is_size) : ?> <span class="shop-filter__on">1</span><?php endif; ?></summary>
            <form class="shop-size" method="get" action="<?php echo esc_url(home_url('/')); ?>" data-size-picker data-size-autosubmit>
                <?php
                // Brand / price / attribute filters travel to the new size page.
                dawp_shop_state_inputs(['s', 'post_type', 'orderby']);
                dawp_size_picker_fields('shop-size', ['Width', 'Ratio', 'Rim']);
                ?>
                <button type="submit" class="shop-size__apply">Show size</button>
            </form>
            <?php if ($is_size) :
                $all_sizes = dawp_shop_state_url($state, dawp_shop_url());
                ?>
                <a class="shop-filter__reset" href="<?php echo esc_url($all_sizes); ?>" rel="nofollow">All sizes</a>
            <?php endif; ?>
        </details>
        <?php
    else :
        $size_keys   = ['width', 'aspect', 'rim'];
        $size_chosen = array_filter(array_map(static function ($k) use ($state) {
            return $state['filters'][dawp_tire_tax($k)][0] ?? '';
        }, array_combine($size_keys, $size_keys)));
        $size_from_cat = $is_size ? dawp_tire_parse_size($term->name) : null;
        $size_skip     = [];
        foreach ($size_keys as $k) {
            $size_skip[] = dawp_tire_filter_key(dawp_tire_tax($k));
        }
        ?>
        <details class="shop-filter" open>
            <summary>Tire Size<?php if ($size_chosen || $is_size) : ?> <span class="shop-filter__on"><?php echo $is_size ? 1 : count($size_chosen); ?></span><?php endif; ?></summary>
            <form class="shop-size" method="get" action="<?php echo esc_url($is_size ? dawp_shop_url() : dawp_tire_archive_base_url()); ?>" data-shop-autosubmit>
                <?php
                if (! $is_size) {
                    dawp_shop_state_inputs($size_skip);
                }
                foreach ($size_keys as $k) :
                    $taxonomy = dawp_tire_tax($k);
                    $selected = $size_chosen[$k] ?? '';
                    $options  = [];
                    if ($is_size || ! taxonomy_exists($taxonomy)) {
                        foreach (dawp_tire_size_options($k) as $slug => $label) {
                            $options[] = ['slug' => $slug, 'label' => $label, 'count' => null];
                        }
                        if ($size_from_cat && ! $selected) {
                            $match    = dawp_tire_find_term($taxonomy, $size_from_cat[$k]);
                            $selected = $match ? $match->slug : (string) $size_from_cat[$k];
                        }
                    } else {
                        foreach ($values($taxonomy) as $item) {
                            $options[] = ['slug' => $item['term']->slug, 'label' => $item['term']->name, 'count' => $item['count']];
                        }
                    }
                    ?>
                    <label class="shop-size__field">
                        <span><?php echo esc_html(['width' => 'Width', 'aspect' => 'Ratio', 'rim' => 'Rim'][$k]); ?></span>
                        <select name="<?php echo esc_attr(dawp_tire_filter_key($taxonomy)); ?>">
                            <option value="">Any</option>
                            <?php foreach ($options as $option) : ?>
                                <option value="<?php echo esc_attr($option['slug']); ?>" <?php selected($selected, $option['slug']); ?>><?php echo esc_html($option['label'] . ($option['count'] !== null ? ' (' . $option['count'] . ')' : '')); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                <?php endforeach; ?>
                <button type="submit" class="shop-size__apply">Apply</button>
            </form>
            <?php if ($size_chosen) :
                $no_size = $state;
                foreach ($size_keys as $k) {
                    unset($no_size['filters'][dawp_tire_tax($k)]);
                }
                ?>
                <a class="shop-filter__reset" href="<?php echo esc_url(dawp_shop_state_url($no_size)); ?>" rel="nofollow">Clear size</a>
            <?php elseif ($is_size) : ?>
                <p class="shop-filter__note">Showing size <strong><?php echo esc_html($term->name); ?></strong>. Pick another size to search the whole catalog.</p>
            <?php endif; ?>
        </details>
        <?php
    endif;

    /* 2–3. Season, Tire Category */
    $render_list('season', $attributes['season']);
    $render_list('category', $attributes['category']);

    /* 4. Brand — search box, top 10 by count, "show all" */
    if (! $is_brand && $facets['brands']) :
        $brand_counts = $facets['brands'];
        foreach ($state['brands'] as $id) {
            $brand_counts[$id] = $brand_counts[$id] ?? 0;
        }
        $brand_terms = get_terms(['taxonomy' => 'product_brand', 'include' => array_keys($brand_counts), 'hide_empty' => false]);
        $brand_terms = is_wp_error($brand_terms) ? [] : $brand_terms;
        usort($brand_terms, static function ($a, $b) use ($brand_counts, $state) {
            $sa = in_array($a->term_id, $state['brands'], true);
            $sb = in_array($b->term_id, $state['brands'], true);
            if ($sa !== $sb) {
                return $sa ? -1 : 1;
            }
            return [$brand_counts[$b->term_id], $a->name] <=> [$brand_counts[$a->term_id], $b->name];
        });
        $limit = max(10, count($state['brands']));
        ?>
        <details class="shop-filter" open>
            <summary>Brand<?php if ($state['brands']) : ?> <span class="shop-filter__on"><?php echo count($state['brands']); ?></span><?php endif; ?></summary>
            <div class="shop-brands" data-brand-filter>
                <?php if (count($brand_terms) > $limit) : ?>
                    <label class="sr-only" for="shop-brand-search">Search brands</label>
                    <input id="shop-brand-search" class="shop-brands__search" type="search" placeholder="Search <?php echo (int) count($brand_terms); ?> brands" data-brand-search autocomplete="off">
                <?php endif; ?>
                <ul class="shop-filter__list shop-filter__list--tall">
                    <?php foreach ($brand_terms as $i => $brand) :
                        $on = in_array($brand->term_id, $state['brands'], true);
                        ?>
                        <li <?php echo $i >= $limit ? 'class="is-extra" hidden' : ''; ?> data-brand-name="<?php echo esc_attr(strtolower($brand->name)); ?>">
                            <a class="shop-filter__opt<?php echo $on ? ' is-active' : ''; ?>" href="<?php echo esc_url(dawp_shop_toggle_brand_url($brand->term_id)); ?>" rel="nofollow" <?php echo $on ? 'aria-current="true"' : ''; ?>>
                                <span class="shop-filter__box"><?php echo $check; // phpcs:ignore ?></span>
                                <span class="shop-filter__name"><?php echo esc_html($brand->name); ?></span>
                                <span class="shop-filter__count"><?php echo (int) $brand_counts[$brand->term_id]; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p class="shop-brands__empty" data-brand-empty hidden>No brand matches.</p>
                <?php if (count($brand_terms) > $limit) : ?>
                    <button type="button" class="shop-filter__more" data-brand-more aria-expanded="false">Show all <?php echo (int) count($brand_terms); ?> brands</button>
                <?php endif; ?>
            </div>
        </details>
    <?php endif;

    /* 5. Vehicle Type */
    $render_list('vehicle', $attributes['vehicle']);

    /* 6. Price */
    if ($facets['price'] && $facets['price'][1] > $facets['price'][0]) :
        $lo  = (int) floor($facets['price'][0]);
        $hi  = (int) ceil($facets['price'][1]);
        $min = $state['min_price'] !== null ? (int) max($lo, $state['min_price']) : $lo;
        $max = $state['max_price'] !== null ? (int) min($hi, $state['max_price']) : $hi;
        $symbol = html_entity_decode(get_woocommerce_currency_symbol());
        ?>
        <details class="shop-filter" open>
            <summary>Price<?php if ($state['min_price'] !== null || $state['max_price'] !== null) : ?> <span class="shop-filter__on">1</span><?php endif; ?></summary>
            <form class="shop-price" method="get" action="<?php echo esc_url(dawp_tire_archive_base_url()); ?>" data-price-filter data-currency="<?php echo esc_attr($symbol); ?>">
                <?php dawp_shop_state_inputs(['min_price', 'max_price']); ?>
                <div class="shop-price__track">
                    <span class="shop-price__fill" data-price-fill></span>
                    <input type="range" min="<?php echo $lo; ?>" max="<?php echo $hi; ?>" step="1" value="<?php echo $min; ?>" aria-label="Minimum price" data-price-range="min">
                    <input type="range" min="<?php echo $lo; ?>" max="<?php echo $hi; ?>" step="1" value="<?php echo $max; ?>" aria-label="Maximum price" data-price-range="max">
                </div>
                <div class="shop-price__inputs">
                    <label><span><?php echo esc_html($symbol); ?></span><input type="number" name="min_price" min="<?php echo $lo; ?>" max="<?php echo $hi; ?>" value="<?php echo $min; ?>" aria-label="Minimum price" data-price-input="min"></label>
                    <span aria-hidden="true">–</span>
                    <label><span><?php echo esc_html($symbol); ?></span><input type="number" name="max_price" min="<?php echo $lo; ?>" max="<?php echo $hi; ?>" value="<?php echo $max; ?>" aria-label="Maximum price" data-price-input="max"></label>
                    <button type="submit" class="shop-size__apply">Go</button>
                </div>
            </form>
        </details>
    <?php endif;

    /* 7–8. Everything else, collapsed unless active */
    foreach (['speed', 'load_range', 'features', 'service', 'sidewall', 'pack', 'warranty'] as $key) {
        $render_list($key, $attributes[$key]);
    }
    ?>

    <div class="shop-filters__help">
        <strong>Not sure about a spec?</strong>
        <a href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">See what each one means</a>
    </div>
    <?php
}
