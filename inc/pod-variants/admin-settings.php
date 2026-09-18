<?php
/**
 * POD variant system — admin settings page (wp-admin > WooCommerce > POD Variants).
 *
 * CRUD for the Type/Color/Size lookup tables. Only these small lookup
 * tables (~10-30 rows each) get a wp-admin UI; the 20k product/variant rows
 * themselves still come in through the external import API + REST sync
 * endpoint (see .plans/pod-variants-plan.md, section 7).
 */

if (!defined('ABSPATH')) {
    exit;
}

function pod_lookup_entities() {
    return [
        'type' => [
            'table'           => pod_table_types(),
            'label'           => __('Type', 'dawp'),
            'label_plural'    => __('Types', 'dawp'),
            'has_hex'         => false,
            'has_size_chart'  => true,
        ],
        'color' => [
            'table'           => pod_table_colors(),
            'label'           => __('Color', 'dawp'),
            'label_plural'    => __('Colors', 'dawp'),
            'has_hex'         => true,
            'has_size_chart'  => false,
        ],
        'size' => [
            'table'           => pod_table_sizes(),
            'label'           => __('Size', 'dawp'),
            'label_plural'    => __('Sizes', 'dawp'),
            'has_hex'         => false,
            'has_size_chart'  => false,
        ],
    ];
}

add_action('admin_menu', 'pod_register_admin_menu');
function pod_register_admin_menu() {
    add_submenu_page(
        'woocommerce',
        __('POD Variant Settings', 'dawp'),
        __('POD Variants', 'dawp'),
        'manage_woocommerce',
        'pod-settings',
        'pod_render_settings_page'
    );
}

function pod_redirect_settings($tab, $extra_args = []) {
    wp_safe_redirect(add_query_arg(array_merge(['page' => 'pod-settings', 'tab' => $tab], $extra_args), admin_url('admin.php')));
    exit;
}

function pod_admin_error_message($code) {
    switch ($code) {
        case 'empty_name':
            return __('Name is required.', 'dawp');
        case 'duplicate_slug':
            return __('That slug is already in use.', 'dawp');
        default:
            return __('Something went wrong.', 'dawp');
    }
}

add_action('admin_post_pod_save_lookup', 'pod_admin_save_lookup');
function pod_admin_save_lookup() {
    if (!current_user_can('manage_woocommerce')) {
        wp_die(__('You do not have permission to do this.', 'dawp'));
    }
    check_admin_referer('pod_save_lookup');

    $entities = pod_lookup_entities();
    $entity   = sanitize_key($_POST['entity'] ?? '');
    if (!isset($entities[$entity])) {
        wp_die(__('Invalid item type.', 'dawp'));
    }
    $config = $entities[$entity];

    $name = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    if ($name === '') {
        pod_redirect_settings($entity, ['error' => 'empty_name']);
    }

    $slug = sanitize_title(wp_unslash($_POST['slug'] ?? ''));
    if ($slug === '') {
        $slug = sanitize_title($name);
    }

    $data = [
        'name'       => $name,
        'slug'       => $slug,
        'sort_order' => absint($_POST['sort_order'] ?? 0),
    ];
    $format = ['%s', '%s', '%d'];

    if ($config['has_hex']) {
        $hex              = sanitize_hex_color(wp_unslash($_POST['hex_code'] ?? ''));
        $data['hex_code'] = $hex ?: null;
        $format[]         = '%s';
    }

    if (!empty($config['has_size_chart'])) {
        $chart_html               = wp_kses_post(wp_unslash($_POST['size_chart_html'] ?? ''));
        $data['size_chart_html']  = $chart_html !== '' ? $chart_html : null;
        $format[]                 = '%s';
    }

    global $wpdb;
    $id = absint($_POST['id'] ?? 0);

    $result = $id
        ? $wpdb->update($config['table'], $data, ['id' => $id], $format, ['%d'])
        : $wpdb->insert($config['table'], $data, $format);

    if ($result === false) {
        pod_redirect_settings($entity, ['error' => 'duplicate_slug']);
    }

    // A Type with no rows in wp_pod_size_prices renders an empty Size list
    // on the product page (nothing to pick, add-to-cart stays disabled) —
    // seed every existing Size at 0 surcharge so a new Type always starts
    // usable; edit individual surcharges from the Type's edit screen.
    if ($entity === 'type' && !$id) {
        pod_seed_default_size_prices((int) $wpdb->insert_id);
    }

    pod_flush_lookup_cache();
    pod_redirect_settings($entity, ['updated' => 1]);
}

function pod_seed_default_size_prices($type_id) {
    global $wpdb;
    $size_ids = $wpdb->get_col('SELECT id FROM ' . pod_table_sizes());
    foreach ($size_ids as $size_id) {
        $wpdb->insert(pod_table_size_prices(), [
            'type_id'   => $type_id,
            'size_id'   => (int) $size_id,
            'surcharge' => 0,
        ], ['%d', '%d', '%f']);
    }
}

add_action('admin_post_pod_save_type_sizes', 'pod_admin_save_type_sizes');
function pod_admin_save_type_sizes() {
    if (!current_user_can('manage_woocommerce')) {
        wp_die(__('You do not have permission to do this.', 'dawp'));
    }
    check_admin_referer('pod_save_type_sizes');

    $type_id = absint($_POST['type_id'] ?? 0);
    if (!$type_id) {
        wp_die(__('Invalid type.', 'dawp'));
    }

    $enabled_ids = isset($_POST['size_enabled']) && is_array($_POST['size_enabled'])
        ? array_map('absint', $_POST['size_enabled'])
        : [];
    $surcharges = isset($_POST['size_surcharge']) && is_array($_POST['size_surcharge'])
        ? wp_unslash($_POST['size_surcharge'])
        : [];

    global $wpdb;
    $table = pod_table_size_prices();
    $wpdb->delete($table, ['type_id' => $type_id], ['%d']);

    foreach ($enabled_ids as $size_id) {
        $surcharge = isset($surcharges[$size_id]) ? (float) $surcharges[$size_id] : 0;
        $wpdb->insert($table, [
            'type_id'   => $type_id,
            'size_id'   => $size_id,
            'surcharge' => $surcharge,
        ], ['%d', '%d', '%f']);
    }

    pod_flush_lookup_cache();
    pod_redirect_settings('type', ['edit' => $type_id, 'updated' => 1]);
}

add_action('admin_post_pod_delete_lookup', 'pod_admin_delete_lookup');
function pod_admin_delete_lookup() {
    if (!current_user_can('manage_woocommerce')) {
        wp_die(__('You do not have permission to do this.', 'dawp'));
    }
    check_admin_referer('pod_delete_lookup');

    $entities = pod_lookup_entities();
    $entity   = sanitize_key($_GET['entity'] ?? '');
    if (!isset($entities[$entity])) {
        wp_die(__('Invalid item type.', 'dawp'));
    }

    global $wpdb;
    $wpdb->delete($entities[$entity]['table'], ['id' => absint($_GET['id'] ?? 0)], ['%d']);

    pod_flush_lookup_cache();
    pod_redirect_settings($entity, ['updated' => 1]);
}

function pod_render_settings_page() {
    if (!current_user_can('manage_woocommerce')) {
        wp_die(__('You do not have permission to access this page.', 'dawp'));
    }

    $entities = pod_lookup_entities();
    $tab      = (!empty($_GET['tab']) && isset($entities[$_GET['tab']])) ? sanitize_key($_GET['tab']) : 'type';
    $config   = $entities[$tab];

    global $wpdb;
    $rows = $wpdb->get_results('SELECT * FROM ' . $config['table'] . ' ORDER BY sort_order ASC, id ASC');

    $edit_row = null;
    if (!empty($_GET['edit'])) {
        $edit_id = absint($_GET['edit']);
        foreach ($rows as $row) {
            if ((int) $row->id === $edit_id) {
                $edit_row = $row;
                break;
            }
        }
    }

    $type_size_names = [];
    if ($tab === 'type' && $rows) {
        $all_sizes = $wpdb->get_results('SELECT * FROM ' . pod_table_sizes() . ' ORDER BY sort_order ASC, id ASC');
        $size_name_by_id = [];
        foreach ($all_sizes as $size) {
            $size_name_by_id[(int) $size->id] = $size->name;
        }
        $assigned = $wpdb->get_results('SELECT type_id, size_id FROM ' . pod_table_size_prices());
        foreach ($assigned as $assignment) {
            $type_size_names[(int) $assignment->type_id][] = $size_name_by_id[(int) $assignment->size_id] ?? '';
        }
    }

    $type_sizes = [];
    $type_size_prices = [];
    if ($tab === 'type' && $edit_row) {
        $type_sizes = $wpdb->get_results('SELECT * FROM ' . pod_table_sizes() . ' ORDER BY sort_order ASC, id ASC');
        $price_rows = $wpdb->get_results($wpdb->prepare(
            'SELECT size_id, surcharge FROM ' . pod_table_size_prices() . ' WHERE type_id = %d',
            $edit_row->id
        ));
        foreach ($price_rows as $price_row) {
            $type_size_prices[(int) $price_row->size_id] = (float) $price_row->surcharge;
        }
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('POD Variant Settings', 'dawp'); ?></h1>

        <?php if (isset($_GET['updated'])) : ?>
            <div class="notice notice-success is-dismissible"><p><?php esc_html_e('Saved.', 'dawp'); ?></p></div>
        <?php elseif (isset($_GET['error'])) : ?>
            <div class="notice notice-error is-dismissible"><p><?php echo esc_html(pod_admin_error_message(sanitize_key($_GET['error']))); ?></p></div>
        <?php endif; ?>

        <h2 class="nav-tab-wrapper">
            <?php foreach ($entities as $key => $entity_config) : ?>
                <a href="<?php echo esc_url(add_query_arg(['page' => 'pod-settings', 'tab' => $key], admin_url('admin.php'))); ?>"
                   class="nav-tab <?php echo $tab === $key ? 'nav-tab-active' : ''; ?>">
                    <?php echo esc_html($entity_config['label_plural']); ?>
                </a>
            <?php endforeach; ?>
        </h2>

        <div style="display:flex;gap:32px;margin-top:20px;align-items:flex-start;flex-wrap:wrap;">
            <div style="flex:1;min-width:280px;max-width:400px;">
                <h2><?php echo $edit_row ? esc_html__('Edit', 'dawp') : esc_html__('Add new', 'dawp'); ?> <?php echo esc_html($config['label']); ?></h2>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <?php wp_nonce_field('pod_save_lookup'); ?>
                    <input type="hidden" name="action" value="pod_save_lookup">
                    <input type="hidden" name="entity" value="<?php echo esc_attr($tab); ?>">
                    <input type="hidden" name="id" value="<?php echo esc_attr($edit_row->id ?? 0); ?>">
                    <table class="form-table">
                        <tr>
                            <th><label for="pod-name"><?php esc_html_e('Name', 'dawp'); ?></label></th>
                            <td><input type="text" id="pod-name" name="name" class="regular-text" required value="<?php echo esc_attr($edit_row->name ?? ''); ?>"></td>
                        </tr>
                        <tr>
                            <th><label for="pod-slug"><?php esc_html_e('Slug', 'dawp'); ?></label></th>
                            <td>
                                <input type="text" id="pod-slug" name="slug" class="regular-text" value="<?php echo esc_attr($edit_row->slug ?? ''); ?>">
                                <p class="description"><?php esc_html_e('Leave blank to auto-generate from name.', 'dawp'); ?></p>
                            </td>
                        </tr>
                        <?php if ($config['has_hex']) : ?>
                        <tr>
                            <th><label for="pod-hex"><?php esc_html_e('Hex color', 'dawp'); ?></label></th>
                            <td><input type="text" id="pod-hex" name="hex_code" class="regular-text" placeholder="#1A1A1A" value="<?php echo esc_attr($edit_row->hex_code ?? ''); ?>"></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th><label for="pod-sort"><?php esc_html_e('Sort order', 'dawp'); ?></label></th>
                            <td><input type="number" id="pod-sort" name="sort_order" class="small-text" value="<?php echo esc_attr($edit_row->sort_order ?? 0); ?>"></td>
                        </tr>
                        <?php if (!empty($config['has_size_chart'])) : ?>
                        <tr>
                            <th><label for="pod-size-chart"><?php esc_html_e('Size chart HTML', 'dawp'); ?></label></th>
                            <td>
                                <textarea id="pod-size-chart" name="size_chart_html" rows="10" class="large-text code"><?php echo esc_textarea($edit_row->size_chart_html ?? ''); ?></textarea>
                                <p class="description">
                                    <?php esc_html_e('Shown in the product page "Size Chart" modal when a shopper picks this Type. Leave blank to hide this Type from the modal.', 'dawp'); ?>
                                    <?php esc_html_e('Wrap the table in the existing .size-chart-wrap / .size-chart-table markup (assets/css/product.css) to inherit the mobile-responsive styling.', 'dawp'); ?>
                                </p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <?php submit_button($edit_row ? __('Update', 'dawp') : __('Add', 'dawp')); ?>
                    <?php if ($edit_row) : ?>
                        <a href="<?php echo esc_url(add_query_arg(['page' => 'pod-settings', 'tab' => $tab], admin_url('admin.php'))); ?>"><?php esc_html_e('Cancel', 'dawp'); ?></a>
                    <?php endif; ?>
                </form>
            </div>

            <div style="flex:2;min-width:320px;">
                <table class="widefat fixed striped">
                    <thead>
                        <tr>
                            <th><?php esc_html_e('Name', 'dawp'); ?></th>
                            <th><?php esc_html_e('Slug', 'dawp'); ?></th>
                            <?php if ($config['has_hex']) : ?><th><?php esc_html_e('Color', 'dawp'); ?></th><?php endif; ?>
                            <?php if (!empty($config['has_size_chart'])) : ?><th><?php esc_html_e('Size chart', 'dawp'); ?></th><?php endif; ?>
                            <?php if ($tab === 'type') : ?><th><?php esc_html_e('Sizes', 'dawp'); ?></th><?php endif; ?>
                            <th><?php esc_html_e('Sort order', 'dawp'); ?></th>
                            <th><?php esc_html_e('Actions', 'dawp'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$rows) : ?>
                            <?php $colspan = 3 + ($config['has_hex'] ? 1 : 0) + (!empty($config['has_size_chart']) ? 1 : 0) + ($tab === 'type' ? 1 : 0); ?>
                            <tr><td colspan="<?php echo esc_attr($colspan); ?>"><?php esc_html_e('No items yet.', 'dawp'); ?></td></tr>
                        <?php endif; ?>
                        <?php foreach ($rows as $row) : ?>
                            <tr>
                                <td><?php echo esc_html($row->name); ?></td>
                                <td><?php echo esc_html($row->slug); ?></td>
                                <?php if ($config['has_hex']) : ?>
                                    <td>
                                        <?php if (!empty($row->hex_code)) : ?>
                                            <span style="display:inline-block;width:16px;height:16px;border:1px solid #ccc;vertical-align:middle;background:<?php echo esc_attr($row->hex_code); ?>"></span>
                                            <?php echo esc_html($row->hex_code); ?>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                                <?php if ($tab === 'type') : ?>
                                    <td>
                                        <?php if (!empty($type_size_names[(int) $row->id])) : ?>
                                            <?php echo esc_html(implode(', ', $type_size_names[(int) $row->id])); ?>
                                        <?php else : ?>
                                            <span style="color:#b32d2e;"><?php esc_html_e('None - cannot be added to cart', 'dawp'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                                <?php if (!empty($config['has_size_chart'])) : ?>
                                    <td><?php echo !empty($row->size_chart_html) ? esc_html__('Yes', 'dawp') : '&mdash;'; ?></td>
                                <?php endif; ?>
                                <td><?php echo esc_html($row->sort_order); ?></td>
                                <td>
                                    <a href="<?php echo esc_url(add_query_arg(['page' => 'pod-settings', 'tab' => $tab, 'edit' => $row->id], admin_url('admin.php'))); ?>"><?php esc_html_e('Edit', 'dawp'); ?></a>
                                    |
                                    <a href="<?php echo esc_url(wp_nonce_url(add_query_arg(['action' => 'pod_delete_lookup', 'entity' => $tab, 'id' => $row->id], admin_url('admin-post.php')), 'pod_delete_lookup')); ?>"
                                       onclick="return confirm('<?php echo esc_js(__('Delete this item?', 'dawp')); ?>');"><?php esc_html_e('Delete', 'dawp'); ?></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($tab === 'type' && $edit_row) : ?>
            <div style="flex:1;min-width:280px;max-width:400px;">
                <h2><?php esc_html_e('Sizes for this Type', 'dawp'); ?></h2>
                <p class="description"><?php esc_html_e('Pick which sizes shoppers can choose for this Type and the extra price each one adds. A Type with no sizes checked cannot be added to cart.', 'dawp'); ?></p>
                <?php if (!$type_sizes) : ?>
                    <p><?php esc_html_e('No sizes defined yet — add sizes in the Sizes tab first.', 'dawp'); ?></p>
                <?php else : ?>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <?php wp_nonce_field('pod_save_type_sizes'); ?>
                        <input type="hidden" name="action" value="pod_save_type_sizes">
                        <input type="hidden" name="type_id" value="<?php echo esc_attr($edit_row->id); ?>">
                        <table class="form-table">
                            <?php foreach ($type_sizes as $size) :
                                $is_enabled = array_key_exists((int) $size->id, $type_size_prices);
                                $surcharge  = $is_enabled ? $type_size_prices[(int) $size->id] : 0;
                            ?>
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" name="size_enabled[]" value="<?php echo esc_attr($size->id); ?>" <?php checked($is_enabled); ?>>
                                            <?php echo esc_html($size->name); ?>
                                        </label>
                                    </th>
                                    <td>
                                        <input type="number" step="0.01" min="0" name="size_surcharge[<?php echo esc_attr($size->id); ?>]" class="small-text" value="<?php echo esc_attr($surcharge); ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php submit_button(__('Save sizes', 'dawp')); ?>
                    </form>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
