<?php
/**
 * POD variant system — per-product metabox on the product edit screen.
 *
 * Lets an admin manage this product's own Style x Color variant rows
 * (price/sale price/SKU/images) directly in wp-admin, instead of only via
 * the external import API. Scope is deliberately per-product only — the
 * Type/Color/Size lookup tables themselves are still managed on the
 * dedicated settings page (admin-settings.php), and bulk import of the
 * 20k-product catalog still goes through the REST sync endpoint.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('add_meta_boxes', 'pod_register_variant_metabox');
function pod_register_variant_metabox() {
    add_meta_box(
        'pod-variants-metabox',
        __('BigPod Variants & Pricing', 'dawp'),
        'pod_render_variant_metabox',
        'product',
        'normal',
        'high'
    );
}

function pod_redirect_product_edit($product_id, $extra_args = []) {
    wp_safe_redirect(add_query_arg(array_merge(['post' => $product_id, 'action' => 'edit'], $extra_args), admin_url('post.php')));
    exit;
}

function pod_variant_error_message($code) {
    switch ($code) {
        case 'invalid_fields':
            return __('Please choose a Type, a Color, and enter a price greater than 0.', 'dawp');
        case 'duplicate_variant':
            return __('This Type + Color combination already exists for this product.', 'dawp');
        default:
            return __('Something went wrong.', 'dawp');
    }
}

add_action('admin_post_pod_save_variant', 'pod_admin_save_variant');
function pod_admin_save_variant() {
    if (!current_user_can('edit_products')) {
        wp_die(__('You do not have permission to do this.', 'dawp'));
    }
    check_admin_referer('pod_save_variant');

    $product_id = absint($_POST['product_id'] ?? 0);
    if (!$product_id || get_post_type($product_id) !== 'product') {
        wp_die(__('Invalid product.', 'dawp'));
    }

    $types  = pod_get_types();
    $colors = pod_get_colors();

    $type_id  = absint($_POST['type_id'] ?? 0);
    $color_id = absint($_POST['color_id'] ?? 0);
    $price    = (float) ($_POST['price'] ?? 0);

    if (!isset($types[$type_id]) || !isset($colors[$color_id]) || $price <= 0) {
        pod_redirect_product_edit($product_id, ['pod_error' => 'invalid_fields']);
    }

    $sale_raw   = trim(wp_unslash($_POST['sale_price'] ?? ''));
    $sale_price = $sale_raw === '' ? null : (float) $sale_raw;

    $sku = sanitize_text_field(wp_unslash($_POST['sku'] ?? ''));
    if ($sku === '') {
        $sku = 'POD-' . $product_id . '-' . $type_id . '-' . $color_id;
    }

    $images = [];
    foreach (preg_split('/\r\n|\r|\n/', wp_unslash($_POST['image_urls'] ?? '')) as $line) {
        $line = trim($line);
        if ($line !== '') {
            $images[] = esc_url_raw($line);
        }
    }

    $is_active = !empty($_POST['is_active']) ? 1 : 0;

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

    global $wpdb;
    $id = absint($_POST['id'] ?? 0);

    $result = $id
        ? $wpdb->update($wpdb->prefix . 'pod_variants', $data, ['id' => $id, 'product_id' => $product_id], $format, ['%d', '%d'])
        : $wpdb->insert($wpdb->prefix . 'pod_variants', $data, $format);

    if ($result === false) {
        pod_redirect_product_edit($product_id, ['pod_error' => 'duplicate_variant']);
    }

    pod_sync_product_price($product_id);
    pod_redirect_product_edit($product_id, ['pod_updated' => 1]);
}

add_action('admin_post_pod_delete_variant', 'pod_admin_delete_variant');
function pod_admin_delete_variant() {
    if (!current_user_can('edit_products')) {
        wp_die(__('You do not have permission to do this.', 'dawp'));
    }
    check_admin_referer('pod_delete_variant');

    $product_id = absint($_GET['product_id'] ?? 0);
    $id         = absint($_GET['id'] ?? 0);

    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'pod_variants', ['id' => $id, 'product_id' => $product_id], ['%d', '%d']);

    pod_sync_product_price($product_id);
    pod_redirect_product_edit($product_id, ['pod_updated' => 1]);
}

function pod_render_variant_metabox($post) {
    $product_id = $post->ID;
    $types      = pod_get_types();
    $colors     = pod_get_colors();

    if (empty($types) || empty($colors)) {
        printf(
            '<p>%s</p>',
            sprintf(
                /* translators: %s: link to the POD Variants settings page */
                esc_html__('Create at least one Type and Color first on the %s page.', 'dawp'),
                '<a href="' . esc_url(admin_url('admin.php?page=pod-settings')) . '">' . esc_html__('POD Variants settings', 'dawp') . '</a>'
            )
        );
        return;
    }

    global $wpdb;
    $rows = $wpdb->get_results($wpdb->prepare(
        'SELECT * FROM ' . pod_table_variants() . ' WHERE product_id = %d ORDER BY type_id ASC, color_id ASC',
        $product_id
    ));

    $edit_row = null;
    if (!empty($_GET['pod_edit_variant'])) {
        $edit_id = absint($_GET['pod_edit_variant']);
        foreach ($rows as $row) {
            if ((int) $row->id === $edit_id) {
                $edit_row = $row;
                break;
            }
        }
    }

    if (isset($_GET['pod_updated'])) : ?>
        <div class="notice notice-success inline"><p><?php esc_html_e('Saved.', 'dawp'); ?></p></div>
    <?php elseif (isset($_GET['pod_error'])) : ?>
        <div class="notice notice-error inline"><p><?php echo esc_html(pod_variant_error_message(sanitize_key($_GET['pod_error']))); ?></p></div>
    <?php endif;

    $wc_product = wc_get_product($product_id);
    if ($wc_product) {
        printf(
            '<p>%s <strong>%s</strong> (%s)</p>',
            esc_html__('Current synced price:', 'dawp'),
            wp_kses_post(wc_price($wc_product->get_price())),
            esc_html($wc_product->get_stock_status())
        );
    }
    ?>

    <table class="widefat fixed striped" style="margin-bottom:16px;">
        <thead>
            <tr>
                <th><?php esc_html_e('Type', 'dawp'); ?></th>
                <th><?php esc_html_e('Color', 'dawp'); ?></th>
                <th><?php esc_html_e('Price', 'dawp'); ?></th>
                <th><?php esc_html_e('Sale price', 'dawp'); ?></th>
                <th><?php esc_html_e('SKU', 'dawp'); ?></th>
                <th><?php esc_html_e('Images', 'dawp'); ?></th>
                <th><?php esc_html_e('Active', 'dawp'); ?></th>
                <th><?php esc_html_e('Actions', 'dawp'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!$rows) : ?>
                <tr><td colspan="8"><?php esc_html_e('No variants yet — add the first one below.', 'dawp'); ?></td></tr>
            <?php endif; ?>
            <?php foreach ($rows as $row) :
                $images = json_decode($row->image_urls, true) ?: [];
                ?>
                <tr>
                    <td><?php echo esc_html($types[$row->type_id]->name ?? '#' . $row->type_id); ?></td>
                    <td><?php echo esc_html($colors[$row->color_id]->name ?? '#' . $row->color_id); ?></td>
                    <td><?php echo wp_kses_post(wc_price($row->price)); ?></td>
                    <td><?php echo $row->sale_price !== null ? wp_kses_post(wc_price($row->sale_price)) : '&mdash;'; ?></td>
                    <td><?php echo esc_html($row->sku); ?></td>
                    <td><?php echo count($images); ?></td>
                    <td><?php echo $row->is_active ? esc_html__('Yes', 'dawp') : esc_html__('No', 'dawp'); ?></td>
                    <td>
                        <a href="<?php echo esc_url(add_query_arg(['post' => $product_id, 'action' => 'edit', 'pod_edit_variant' => $row->id], admin_url('post.php')) . '#pod-variants-metabox'); ?>"><?php esc_html_e('Edit', 'dawp'); ?></a>
                        |
                        <a href="<?php echo esc_url(wp_nonce_url(add_query_arg(['action' => 'pod_delete_variant', 'product_id' => $product_id, 'id' => $row->id], admin_url('admin-post.php')), 'pod_delete_variant')); ?>"
                           onclick="return confirm('<?php echo esc_js(__('Delete this variant?', 'dawp')); ?>');"><?php esc_html_e('Delete', 'dawp'); ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4><?php echo $edit_row ? esc_html__('Edit variant', 'dawp') : esc_html__('Add new variant', 'dawp'); ?></h4>
    <?php
    // Not a <form>: this metabox already sits inside the product edit
    // screen's own <form id="post">, and nested forms are invalid HTML —
    // the browser drops the inner tag, so these fields (required ones,
    // plus `action`/`_wpnonce`) would hijack the product's own Update.
    // Fields carry data-name instead of name, so the product form never
    // submits them; the button below posts them via a detached form.
    ?>
    <div id="pod-variant-form" data-url="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" data-name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce('pod_save_variant')); ?>">
        <input type="hidden" data-name="action" value="pod_save_variant">
        <input type="hidden" data-name="product_id" value="<?php echo esc_attr($product_id); ?>">
        <input type="hidden" data-name="id" value="<?php echo esc_attr($edit_row->id ?? 0); ?>">
        <table class="form-table">
            <tr>
                <th><label for="pod-variant-type"><?php esc_html_e('Type', 'dawp'); ?></label></th>
                <td>
                    <select id="pod-variant-type" data-name="type_id" data-required>
                        <option value=""><?php esc_html_e('— Select —', 'dawp'); ?></option>
                        <?php foreach ($types as $id => $type) : ?>
                            <option value="<?php echo esc_attr($id); ?>" <?php selected($edit_row->type_id ?? '', $id); ?>><?php echo esc_html($type->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="pod-variant-color"><?php esc_html_e('Color', 'dawp'); ?></label></th>
                <td>
                    <select id="pod-variant-color" data-name="color_id" data-required>
                        <option value=""><?php esc_html_e('— Select —', 'dawp'); ?></option>
                        <?php foreach ($colors as $id => $color) : ?>
                            <option value="<?php echo esc_attr($id); ?>" <?php selected($edit_row->color_id ?? '', $id); ?>><?php echo esc_html($color->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="pod-variant-price"><?php esc_html_e('Price', 'dawp'); ?></label></th>
                <td><input type="number" step="0.01" min="0" id="pod-variant-price" data-name="price" class="regular-text" data-required value="<?php echo esc_attr($edit_row->price ?? ''); ?>"></td>
            </tr>
            <tr>
                <th><label for="pod-variant-sale-price"><?php esc_html_e('Sale price', 'dawp'); ?></label></th>
                <td>
                    <input type="number" step="0.01" min="0" id="pod-variant-sale-price" data-name="sale_price" class="regular-text" value="<?php echo esc_attr($edit_row->sale_price ?? ''); ?>">
                    <p class="description"><?php esc_html_e('Leave blank for no sale.', 'dawp'); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="pod-variant-sku"><?php esc_html_e('SKU', 'dawp'); ?></label></th>
                <td>
                    <input type="text" id="pod-variant-sku" data-name="sku" class="regular-text" value="<?php echo esc_attr($edit_row->sku ?? ''); ?>">
                    <p class="description"><?php esc_html_e('Leave blank to auto-generate.', 'dawp'); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="pod-variant-images"><?php esc_html_e('Image URLs', 'dawp'); ?></label></th>
                <td>
                    <textarea id="pod-variant-images" data-name="image_urls" rows="4" class="large-text" placeholder="https://...&#10;https://..."><?php
                        echo esc_textarea($edit_row ? implode("\n", json_decode($edit_row->image_urls, true) ?: []) : '');
                    ?></textarea>
                    <p class="description"><?php esc_html_e('One external image URL per line. First line = main image.', 'dawp'); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="pod-variant-active"><?php esc_html_e('Active', 'dawp'); ?></label></th>
                <td><input type="checkbox" id="pod-variant-active" data-name="is_active" value="1" <?php checked($edit_row ? (bool) $edit_row->is_active : true); ?>></td>
            </tr>
        </table>
        <p class="submit">
            <button type="button" class="button button-primary" id="pod-variant-submit"><?php echo $edit_row ? esc_html__('Update variant', 'dawp') : esc_html__('Add variant', 'dawp'); ?></button>
            <?php if ($edit_row) : ?>
                <a href="<?php echo esc_url(add_query_arg(['post' => $product_id, 'action' => 'edit'], admin_url('post.php'))); ?>"><?php esc_html_e('Cancel', 'dawp'); ?></a>
            <?php endif; ?>
        </p>
    </div>
    <script>
    (function () {
        var box = document.getElementById('pod-variant-form');
        document.getElementById('pod-variant-submit').addEventListener('click', function () {
            var fields = box.querySelectorAll('[data-name]');
            for (var i = 0; i < fields.length; i++) {
                if (fields[i].hasAttribute('data-required') && !fields[i].value) {
                    alert(<?php echo wp_json_encode(pod_variant_error_message('invalid_fields')); ?>);
                    fields[i].focus();
                    return;
                }
            }
            var form = document.createElement('form');
            form.method = 'post';
            form.action = box.getAttribute('data-url');
            fields.forEach(function (field) {
                if (field.type === 'checkbox' && !field.checked) {
                    return;
                }
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = field.getAttribute('data-name');
                input.value = field.value;
                form.appendChild(input);
            });
            document.body.appendChild(form);
            form.submit();
        });
    })();
    </script>
    <?php
}
