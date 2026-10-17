<?php
/**
 * Shared product descriptions per product category.
 *
 * Each product_cat gets an extra "Shared product description" (HTML, term
 * meta) set on Products > Categories. Wherever a product's description is
 * shown, it becomes: the product's own description (if any) + the shared
 * descriptions of every category the product is in, ordered by each
 * category's "Order" field. The product's stored post_content is never
 * changed — the merge happens only at display/feed time, so editing a
 * category updates all ~20k imported products at once.
 */

if (!defined('ABSPATH')) {
    exit;
}

const DAWP_CAT_DESC_META       = 'dawp_product_desc';
const DAWP_CAT_DESC_ORDER_META = 'dawp_product_desc_order';

/* -----------------------------------------------------------------------
 * Admin: fields on Products > Categories
 * -------------------------------------------------------------------- */

add_action('product_cat_add_form_fields', 'dawp_cat_desc_add_fields');
function dawp_cat_desc_add_fields() {
    wp_nonce_field('dawp_cat_desc_save', 'dawp_cat_desc_nonce');
    ?>
    <div class="form-field">
        <label for="dawp-product-desc"><?php esc_html_e('Shared product description', 'dawp'); ?></label>
        <textarea name="dawp_product_desc" id="dawp-product-desc" rows="6"></textarea>
        <p><?php esc_html_e('Appended below the description of every product in this category (HTML allowed).', 'dawp'); ?></p>
    </div>
    <div class="form-field">
        <label for="dawp-product-desc-order"><?php esc_html_e('Shared description order', 'dawp'); ?></label>
        <input type="number" name="dawp_product_desc_order" id="dawp-product-desc-order" value="10" min="0" step="1">
        <p><?php esc_html_e('When a product is in several categories, lower numbers are shown first.', 'dawp'); ?></p>
    </div>
    <?php
}

add_action('product_cat_edit_form_fields', 'dawp_cat_desc_edit_fields');
function dawp_cat_desc_edit_fields($term) {
    $desc  = get_term_meta($term->term_id, DAWP_CAT_DESC_META, true);
    $order = get_term_meta($term->term_id, DAWP_CAT_DESC_ORDER_META, true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="dawp_product_desc"><?php esc_html_e('Shared product description', 'dawp'); ?></label></th>
        <td>
            <?php
            wp_nonce_field('dawp_cat_desc_save', 'dawp_cat_desc_nonce');
            wp_editor($desc, 'dawp_product_desc', [
                'textarea_name' => 'dawp_product_desc',
                'textarea_rows' => 10,
                'media_buttons' => false,
            ]);
            ?>
            <p class="description"><?php esc_html_e('Appended below the description of every product in this category. Leave empty to add nothing.', 'dawp'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="dawp-product-desc-order"><?php esc_html_e('Shared description order', 'dawp'); ?></label></th>
        <td>
            <input type="number" name="dawp_product_desc_order" id="dawp-product-desc-order" value="<?php echo esc_attr($order === '' ? 10 : (int) $order); ?>" min="0" step="1" style="width:100px">
            <p class="description"><?php esc_html_e('When a product is in several categories, lower numbers are shown first.', 'dawp'); ?></p>
        </td>
    </tr>
    <?php
}

add_action('created_product_cat', 'dawp_cat_desc_save');
add_action('edited_product_cat', 'dawp_cat_desc_save');
function dawp_cat_desc_save($term_id) {
    if (!isset($_POST['dawp_cat_desc_nonce'])
        || !wp_verify_nonce(sanitize_key($_POST['dawp_cat_desc_nonce']), 'dawp_cat_desc_save')
        || !current_user_can('manage_product_terms')) {
        return;
    }

    $desc = isset($_POST['dawp_product_desc']) ? trim(wp_kses_post(wp_unslash($_POST['dawp_product_desc']))) : '';
    if ($desc === '') {
        delete_term_meta($term_id, DAWP_CAT_DESC_META);
    } else {
        update_term_meta($term_id, DAWP_CAT_DESC_META, $desc);
    }

    $order = isset($_POST['dawp_product_desc_order']) ? absint($_POST['dawp_product_desc_order']) : 10;
    update_term_meta($term_id, DAWP_CAT_DESC_ORDER_META, $order);
}

// "Shared desc" column on the category list so it's clear which are set.
add_filter('manage_edit-product_cat_columns', function ($columns) {
    $columns['dawp_product_desc'] = __('Shared desc', 'dawp');
    return $columns;
});
add_filter('manage_product_cat_custom_column', function ($content, $column, $term_id) {
    if ($column !== 'dawp_product_desc') {
        return $content;
    }
    if (get_term_meta($term_id, DAWP_CAT_DESC_META, true) === '') {
        return '—';
    }
    $order = get_term_meta($term_id, DAWP_CAT_DESC_ORDER_META, true);
    return '✓ <span class="description">#' . esc_html($order === '' ? 10 : (int) $order) . '</span>';
}, 10, 3);

/* -----------------------------------------------------------------------
 * Building the combined description
 * -------------------------------------------------------------------- */

/**
 * Shared descriptions (HTML) of the product's categories, in display order.
 */
function dawp_category_descriptions($product_id) {
    $terms = get_the_terms($product_id, 'product_cat');
    if (!$terms || is_wp_error($terms)) {
        return [];
    }

    $items = [];
    foreach ($terms as $term) {
        $desc = get_term_meta($term->term_id, DAWP_CAT_DESC_META, true);
        if ($desc === '') {
            continue;
        }
        $order   = get_term_meta($term->term_id, DAWP_CAT_DESC_ORDER_META, true);
        $items[] = ['order' => $order === '' ? 10 : (int) $order, 'name' => $term->name, 'desc' => $desc];
    }

    usort($items, function ($a, $b) {
        return [$a['order'], $a['name']] <=> [$b['order'], $b['name']];
    });

    // Two categories with the same text shouldn't print it twice.
    return array_values(array_unique(wp_list_pluck($items, 'desc')));
}

/**
 * Artwork description from the "design_des" attribute (global pa_design_des or custom).
 */
function dawp_product_design_description($product_id) {
    $product = wc_get_product($product_id);
    if (!$product) {
        return '';
    }

    return trim(wp_strip_all_tags((string) $product->get_attribute('design_des')));
}

/**
 * Design description + product description + category descriptions, as HTML.
 */
function dawp_combined_product_description($product) {
    $product = $product instanceof WC_Product ? $product : wc_get_product($product);
    if (!$product) {
        return '';
    }
    $product_id = $product->get_parent_id() ?: $product->get_id();

    $parts  = [];
    $design = dawp_product_design_description($product_id);
    if ($design !== '') {
        $parts[] = $design;
    }
    $own = trim((string) get_post_field('post_content', $product_id));
    if ($own !== '') {
        $parts[] = $own;
    }
    foreach (dawp_category_descriptions($product_id) as $desc) {
        $parts[] = $desc;
    }

    return implode("\n\n", $parts);
}

function dawp_plain_text_description($html) {
    return trim(preg_replace('/\s+/', ' ', wp_strip_all_tags(strip_shortcodes($html))));
}

/* -----------------------------------------------------------------------
 * Display: single product Description tab, structured data, product feed
 * -------------------------------------------------------------------- */

// WC only adds the Description tab when post_content is non-empty, so
// (re)register it whenever the combined description has content.
add_filter('woocommerce_product_tabs', 'dawp_cat_desc_product_tabs', 20);
function dawp_cat_desc_product_tabs($tabs) {
    global $product;
    if (!$product instanceof WC_Product || dawp_combined_product_description($product) === '') {
        return $tabs;
    }

    $tabs['description'] = array_merge(
        ['title' => __('Description', 'woocommerce'), 'priority' => 10],
        $tabs['description'] ?? [],
        ['callback' => 'dawp_cat_desc_render_tab']
    );

    return $tabs;
}

function dawp_cat_desc_render_tab() {
    global $product;

    $heading = apply_filters('woocommerce_product_description_heading', __('Description', 'woocommerce'));
    if ($heading) {
        echo '<h2>' . esc_html($heading) . '</h2>';
    }

    $design = dawp_product_design_description($product->get_id());
    if ($design !== '') {
        echo '<div class="product-design-description">' . wpautop(esc_html($design)) . '</div>';
    }

    // Product's own content keeps going through the_content (shortcodes,
    // autop, other plugins' content filters) exactly like WC's template.
    $own =trim((string) get_post_field('post_content', $product->get_id()));
    if ($own !== '') {
        the_content();
    }

    foreach (dawp_category_descriptions($product->get_id()) as $desc) {
        echo '<div class="product-category-description">' . wpautop(do_shortcode(wp_kses_post($desc))) . '</div>';
    }
}

add_filter('woocommerce_structured_data_product', function ($markup, $product) {
    $text = dawp_plain_text_description(dawp_combined_product_description($product));
    if ($text !== '') {
        $markup['description'] = $text;
    }
    return $markup;
}, 20, 2);

// CTX Product Feed (Google Merchant Center): plain-text and HTML variants.
add_filter('woo_feed_filter_product_description', function ($description, $product) {
    $text = dawp_plain_text_description(dawp_combined_product_description($product));
    return $text !== '' ? $text : $description;
}, 20, 2);
add_filter('woo_feed_filter_product_description_with_html', function ($description, $product) {
    $html = dawp_combined_product_description($product);
    return $html !== '' ? $html : $description;
}, 20, 2);
