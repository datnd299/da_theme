<?php
/**
 * POD variant system — size chart per product category.
 *
 * Fallback source for the product page's Size Chart modal: a Type's own
 * chart (POD Variants > Types) wins; a Type without one uses the chart of
 * the product's category (or the nearest parent category that has one).
 */

if (!defined('ABSPATH')) {
    exit;
}

const POD_CAT_SIZE_CHART_META = 'pod_size_chart_html';

/* -----------------------------------------------------------------------
 * Admin: field on Products > Categories
 * -------------------------------------------------------------------- */

add_action('product_cat_add_form_fields', 'pod_cat_size_chart_add_field');
function pod_cat_size_chart_add_field() {
    wp_nonce_field('pod_cat_size_chart_save', 'pod_cat_size_chart_nonce');
    ?>
    <div class="form-field">
        <label for="pod-cat-size-chart"><?php esc_html_e('Size chart HTML', 'dawp'); ?></label>
        <textarea name="pod_size_chart_html" id="pod-cat-size-chart" rows="8" class="code"></textarea>
        <p><?php esc_html_e('Used for products in this category when their Style (POD Variants > Types) has no size chart. Use {theme_uri} for theme image paths.', 'dawp'); ?></p>
    </div>
    <?php
}

add_action('product_cat_edit_form_fields', 'pod_cat_size_chart_edit_field');
function pod_cat_size_chart_edit_field($term) {
    $chart = get_term_meta($term->term_id, POD_CAT_SIZE_CHART_META, true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="pod-cat-size-chart"><?php esc_html_e('Size chart HTML', 'dawp'); ?></label></th>
        <td>
            <?php wp_nonce_field('pod_cat_size_chart_save', 'pod_cat_size_chart_nonce'); ?>
            <textarea name="pod_size_chart_html" id="pod-cat-size-chart" rows="10" class="large-text code"><?php echo esc_textarea($chart); ?></textarea>
            <p class="description">
                <?php esc_html_e('Used for products in this category (and its sub-categories) when their Style (POD Variants > Types) has no size chart. Leave empty to add nothing.', 'dawp'); ?>
                <?php esc_html_e('Wrap the table in the existing .size-chart-wrap / .size-chart-table markup; use {theme_uri} for theme image paths.', 'dawp'); ?>
            </p>
        </td>
    </tr>
    <?php
}

add_action('created_product_cat', 'pod_cat_size_chart_save');
add_action('edited_product_cat', 'pod_cat_size_chart_save');
function pod_cat_size_chart_save($term_id) {
    if (!isset($_POST['pod_cat_size_chart_nonce'])
        || !wp_verify_nonce(sanitize_key($_POST['pod_cat_size_chart_nonce']), 'pod_cat_size_chart_save')
        || !current_user_can('manage_product_terms')) {
        return;
    }

    $chart = isset($_POST['pod_size_chart_html']) ? trim(wp_kses_post(wp_unslash($_POST['pod_size_chart_html']))) : '';
    if ($chart === '') {
        delete_term_meta($term_id, POD_CAT_SIZE_CHART_META);
    } else {
        update_term_meta($term_id, POD_CAT_SIZE_CHART_META, $chart);
    }
}

add_filter('manage_edit-product_cat_columns', function ($columns) {
    $columns['pod_size_chart'] = __('Size chart', 'dawp');
    return $columns;
});
add_filter('manage_product_cat_custom_column', function ($content, $column, $term_id) {
    if ($column !== 'pod_size_chart') {
        return $content;
    }
    return get_term_meta($term_id, POD_CAT_SIZE_CHART_META, true) === '' ? '—' : '✓';
}, 10, 3);

/* -----------------------------------------------------------------------
 * Lookup
 * -------------------------------------------------------------------- */

/**
 * Size chart HTML from the product's categories: the categories themselves
 * first (lowest term_id wins on ties), then their ancestors nearest-first.
 * '' when none has one.
 */
function pod_get_category_size_chart($product_id) {
    $terms = get_the_terms($product_id, 'product_cat');
    if (!$terms || is_wp_error($terms)) {
        return '';
    }
    usort($terms, function ($a, $b) {
        return $a->term_id <=> $b->term_id;
    });

    $levels = [wp_list_pluck($terms, 'term_id')];
    foreach ($terms as $term) {
        foreach (get_ancestors($term->term_id, 'product_cat', 'taxonomy') as $depth => $ancestor_id) {
            $levels[$depth + 1][] = $ancestor_id;
        }
    }
    ksort($levels);

    foreach ($levels as $term_ids) {
        foreach ($term_ids as $term_id) {
            $chart = get_term_meta($term_id, POD_CAT_SIZE_CHART_META, true);
            if ($chart !== '') {
                return $chart;
            }
        }
    }

    return '';
}
