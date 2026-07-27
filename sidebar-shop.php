<?php
defined('ABSPATH') || exit;

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : get_post_type_archive_link('product');
$uncat        = get_term_by('slug', 'uncategorized', 'product_cat');
$exclude      = $uncat ? [(int) $uncat->term_id] : [];
$categories   = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'exclude'    => $exclude,
]);
?>

<aside class="shop-sidebar" id="shopSidebar" aria-label="<?php esc_attr_e('Product categories and filters', 'dawp'); ?>">
    <div class="shop-sidebar__header">
        <h2 class="shop-sidebar__mobile-title"><?php esc_html_e('Categories', 'dawp'); ?></h2>
        <button
            class="shop-sidebar__close"
            id="shopSidebarClose"
            aria-label="<?php esc_attr_e('Close categories', 'dawp'); ?>"
        >
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    <?php if (! empty($categories) && ! is_wp_error($categories)) : ?>
        <div class="shop-sidebar__widget">
            <h3 class="shop-sidebar__title"><?php esc_html_e('Main Categories', 'dawp'); ?></h3>
            <ul class="shop-sidebar__categories">
                <li>
                    <a href="<?php echo esc_url($shop_url); ?>" <?php echo is_shop() ? 'aria-current="page"' : ''; ?>>
                        <?php esc_html_e('All Products', 'dawp'); ?>
                        <span class="count"><?php echo esc_html((string) wp_count_posts('product')->publish); ?></span>
                    </a>
                </li>

                <?php foreach ($categories as $cat) : ?>
                    <li>
                        <a
                            href="<?php echo esc_url(get_term_link($cat)); ?>"
                            <?php echo is_product_category($cat->slug) ? 'aria-current="page"' : ''; ?>
                        >
                            <?php echo esc_html($cat->name); ?>
                            <span class="count"><?php echo esc_html((string) $cat->count); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (is_active_sidebar('shop-sidebar')) : ?>
        <?php dynamic_sidebar('shop-sidebar'); ?>
    <?php endif; ?>
</aside>
