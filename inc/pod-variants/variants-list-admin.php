<?php
/**
 * POD variant system — global "all variants" list screen (wp-admin > WooCommerce > All POD Variants).
 *
 * The per-product metabox (product-metabox.php) already does full CRUD, but
 * only scoped to whichever product happens to be open — with ~20k products
 * there's no way to search/browse the wp_pod_variants table across products
 * from there. This screen adds a paginated, searchable, filterable list of
 * every variant row; editing still happens on the owning product's edit
 * screen (deep-links into the existing metabox) so the actual save/validate
 * logic isn't duplicated — this file only lists + deletes.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

add_action('admin_menu', 'pod_register_variants_list_menu');
function pod_register_variants_list_menu() {
    add_submenu_page(
        'woocommerce',
        __('All POD Variants', 'dawp'),
        __('All POD Variants', 'dawp'),
        'edit_products',
        'pod-variants-list',
        'pod_render_variants_list_page'
    );
}

function pod_variants_list_base_url() {
    return admin_url('admin.php?page=pod-variants-list');
}

class POD_Variants_List_Table extends WP_List_Table {
    private $types;
    private $colors;

    public function __construct() {
        parent::__construct([
            'singular' => 'pod_variant',
            'plural'   => 'pod_variants',
            'ajax'     => false,
        ]);
        $this->types  = pod_get_types();
        $this->colors = pod_get_colors();
    }

    public function get_columns() {
        return [
            'image'   => __('Image', 'dawp'),
            'product' => __('Product', 'dawp'),
            'type'    => __('Type', 'dawp'),
            'color'   => __('Color', 'dawp'),
            'price'   => __('Price', 'dawp'),
            'sku'     => __('SKU', 'dawp'),
            'active'  => __('Active', 'dawp'),
            'actions' => __('Actions', 'dawp'),
        ];
    }

    protected function get_filters() {
        return [
            'filter_type'   => isset($_REQUEST['filter_type']) ? absint($_REQUEST['filter_type']) : 0,
            'filter_color'  => isset($_REQUEST['filter_color']) ? absint($_REQUEST['filter_color']) : 0,
            'filter_active' => isset($_REQUEST['filter_active']) && $_REQUEST['filter_active'] !== '' ? sanitize_key($_REQUEST['filter_active']) : '',
            's'             => isset($_REQUEST['s']) ? sanitize_text_field(wp_unslash($_REQUEST['s'])) : '',
        ];
    }

    public function prepare_items() {
        global $wpdb;

        $this->_column_headers = [$this->get_columns(), [], []];

        $filters = $this->get_filters();
        $where   = ['1=1'];
        $args    = [];

        if ($filters['filter_type']) {
            $where[] = 'v.type_id = %d';
            $args[]  = $filters['filter_type'];
        }
        if ($filters['filter_color']) {
            $where[] = 'v.color_id = %d';
            $args[]  = $filters['filter_color'];
        }
        if ($filters['filter_active'] === 'active') {
            $where[] = 'v.is_active = 1';
        } elseif ($filters['filter_active'] === 'inactive') {
            $where[] = 'v.is_active = 0';
        }
        if ($filters['s'] !== '') {
            $where[] = '(v.sku LIKE %s OR p.post_title LIKE %s)';
            $like    = '%' . $wpdb->esc_like($filters['s']) . '%';
            $args[]  = $like;
            $args[]  = $like;
        }

        $where_sql = implode(' AND ', $where);
        $table     = pod_table_variants();

        $count_sql   = "SELECT COUNT(*) FROM {$table} v LEFT JOIN {$wpdb->posts} p ON p.ID = v.product_id WHERE {$where_sql}";
        $total_items = (int) ($args ? $wpdb->get_var($wpdb->prepare($count_sql, $args)) : $wpdb->get_var($count_sql));

        $per_page     = 20;
        $current_page = $this->get_pagenum();

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page'    => $per_page,
            'total_pages' => (int) ceil($total_items / $per_page),
        ]);

        $select_sql = "SELECT v.*, p.post_title FROM {$table} v LEFT JOIN {$wpdb->posts} p ON p.ID = v.product_id
                        WHERE {$where_sql} ORDER BY v.id DESC LIMIT %d OFFSET %d";
        $select_args = array_merge($args, [$per_page, ($current_page - 1) * $per_page]);

        $this->items = $wpdb->get_results($wpdb->prepare($select_sql, $select_args));
    }

    protected function column_default($item, $column_name) {
        switch ($column_name) {
            case 'type':
                return esc_html($this->types[$item->type_id]->name ?? '#' . $item->type_id);
            case 'color':
                return esc_html($this->colors[$item->color_id]->name ?? '#' . $item->color_id);
            case 'price':
                $price_html = wp_kses_post(wc_price($item->price));
                if ($item->sale_price !== null) {
                    $price_html = '<del>' . wp_kses_post(wc_price($item->price)) . '</del> <ins>' . wp_kses_post(wc_price($item->sale_price)) . '</ins>';
                }
                return $price_html;
            case 'sku':
                return esc_html($item->sku);
            case 'active':
                return $item->is_active ? esc_html__('Yes', 'dawp') : '<span style="color:#b32d2e;">' . esc_html__('No', 'dawp') . '</span>';
            default:
                return '';
        }
    }

    protected function column_image($item) {
        $images = json_decode($item->image_urls, true) ?: [];
        if (empty($images[0])) {
            return '&mdash;';
        }
        return sprintf(
            '<img src="%s" alt="" style="width:40px;height:40px;object-fit:cover;border:1px solid #ccc;">',
            esc_url(pod_proxy_image_url($images[0]))
        );
    }

    protected function column_product($item) {
        if (!$item->product_id || !$item->post_title) {
            return sprintf('#%d ' . esc_html__('(deleted product)', 'dawp'), (int) $item->product_id);
        }
        $edit_url = add_query_arg(
            ['post' => $item->product_id, 'action' => 'edit'],
            admin_url('post.php')
        ) . '#pod-variants-metabox';
        return sprintf('<a href="%s">%s</a><br><span class="description">#%d</span>', esc_url($edit_url), esc_html($item->post_title), (int) $item->product_id);
    }

    protected function column_actions($item) {
        $edit_url = add_query_arg(
            ['post' => $item->product_id, 'action' => 'edit', 'pod_edit_variant' => $item->id],
            admin_url('post.php')
        ) . '#pod-variants-metabox';

        $delete_url = wp_nonce_url(
            add_query_arg(
                [
                    'action'      => 'pod_delete_variant_from_list',
                    'id'          => $item->id,
                    'product_id'  => $item->product_id,
                    'redirect_to' => urlencode($this->current_list_url()),
                ],
                admin_url('admin-post.php')
            ),
            'pod_delete_variant_from_list'
        );

        return sprintf(
            '<a href="%s">%s</a> | <a href="%s" onclick="return confirm(\'%s\');">%s</a>',
            esc_url($edit_url),
            esc_html__('Edit', 'dawp'),
            esc_url($delete_url),
            esc_js(__('Delete this variant?', 'dawp')),
            esc_html__('Delete', 'dawp')
        );
    }

    private function current_list_url() {
        $filters = $this->get_filters();
        return add_query_arg(array_merge(array_filter([
            'filter_type'   => $filters['filter_type'] ?: null,
            'filter_color'  => $filters['filter_color'] ?: null,
            'filter_active' => $filters['filter_active'] ?: null,
            's'             => $filters['s'] !== '' ? $filters['s'] : null,
            'paged'         => $this->get_pagenum() > 1 ? $this->get_pagenum() : null,
        ]), []), pod_variants_list_base_url());
    }

    public function no_items() {
        esc_html_e('No variants found.', 'dawp');
    }

    protected function extra_tablenav($which) {
        if ($which !== 'top') {
            return;
        }
        $filters = $this->get_filters();
        ?>
        <div class="alignleft actions">
            <select name="filter_type">
                <option value=""><?php esc_html_e('All Types', 'dawp'); ?></option>
                <?php foreach ($this->types as $id => $type) : ?>
                    <option value="<?php echo esc_attr($id); ?>" <?php selected($filters['filter_type'], $id); ?>><?php echo esc_html($type->name); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="filter_color">
                <option value=""><?php esc_html_e('All Colors', 'dawp'); ?></option>
                <?php foreach ($this->colors as $id => $color) : ?>
                    <option value="<?php echo esc_attr($id); ?>" <?php selected($filters['filter_color'], $id); ?>><?php echo esc_html($color->name); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="filter_active">
                <option value=""><?php esc_html_e('All statuses', 'dawp'); ?></option>
                <option value="active" <?php selected($filters['filter_active'], 'active'); ?>><?php esc_html_e('Active', 'dawp'); ?></option>
                <option value="inactive" <?php selected($filters['filter_active'], 'inactive'); ?>><?php esc_html_e('Inactive', 'dawp'); ?></option>
            </select>
            <?php submit_button(__('Filter', 'dawp'), '', 'filter_action', false); ?>
        </div>
        <?php
    }
}

add_action('admin_post_pod_delete_variant_from_list', 'pod_admin_delete_variant_from_list');
function pod_admin_delete_variant_from_list() {
    if (!current_user_can('edit_products')) {
        wp_die(__('You do not have permission to do this.', 'dawp'));
    }
    check_admin_referer('pod_delete_variant_from_list');

    $product_id = absint($_GET['product_id'] ?? 0);
    $id         = absint($_GET['id'] ?? 0);

    global $wpdb;
    $wpdb->delete(pod_table_variants(), ['id' => $id, 'product_id' => $product_id], ['%d', '%d']);

    if ($product_id) {
        pod_sync_product_price($product_id);
    }

    $redirect_to = !empty($_GET['redirect_to']) ? urldecode(wp_unslash($_GET['redirect_to'])) : pod_variants_list_base_url();
    wp_safe_redirect(add_query_arg('updated', 1, $redirect_to));
    exit;
}

function pod_render_variants_list_page() {
    if (!current_user_can('edit_products')) {
        wp_die(__('You do not have permission to access this page.', 'dawp'));
    }

    $list_table = new POD_Variants_List_Table();
    $list_table->prepare_items();
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('All POD Variants', 'dawp'); ?></h1>
        <p class="description">
            <?php esc_html_e('Every row in the wp_pod_variants table across all products. Edit opens the variant on its product\'s edit screen; use this list to search, filter, and delete.', 'dawp'); ?>
        </p>

        <?php if (isset($_GET['updated'])) : ?>
            <div class="notice notice-success is-dismissible"><p><?php esc_html_e('Saved.', 'dawp'); ?></p></div>
        <?php endif; ?>

        <form method="get">
            <input type="hidden" name="page" value="pod-variants-list">
            <?php
            $list_table->search_box(__('Search SKU or product', 'dawp'), 'pod-variant-search');
            $list_table->display();
            ?>
        </form>
    </div>
    <?php
}
