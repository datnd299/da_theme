<?php
/**
 * Shop / product archive template.
 */
defined('ABSPATH') || exit;

get_header();

global $wp_query;

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$queried      = get_queried_object();
$is_category  = is_product_category();
$is_tag       = is_product_tag();
$total        = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;
$page_title   = ($is_category || $is_tag) ? single_term_title('', false) : __('All Products', 'dawp');
$intro        = '';
$all_image_base  = get_template_directory_uri() . '/assets/img/All_image/';
$shop_hero_image = $all_image_base . 'banner.png';

if ($is_category && isset($queried->term_id)) {
    $thumbnail_id = (int) get_term_meta($queried->term_id, 'thumbnail_id', true);
    $term_hero_image = '';

    if ($thumbnail_id) {
        $term_hero_image = wp_get_attachment_image_url($thumbnail_id, 'full');
    }

    if (! $term_hero_image) {
        $category_hero_images = [
            'womens-leather-shoes' => $all_image_base . 'image.png',
            'womens-sandals'       => $all_image_base . 'image copy 5.png',
            'womens-handbags'      => $all_image_base . 'image copy 8.png',
            'fashion-accessories'  => $all_image_base . 'image copy 10.png',
        ];

        $category_slugs = [$queried->slug];
        $ancestor_ids   = get_ancestors($queried->term_id, 'product_cat');

        foreach ($ancestor_ids as $ancestor_id) {
            $ancestor = get_term($ancestor_id, 'product_cat');

            if ($ancestor && ! is_wp_error($ancestor)) {
                $category_slugs[] = $ancestor->slug;
            }
        }

        foreach ($category_slugs as $category_slug) {
            if (isset($category_hero_images[$category_slug])) {
                $term_hero_image = $category_hero_images[$category_slug];
                break;
            }
        }
    }

    if ($term_hero_image) {
        $shop_hero_image = $term_hero_image;
    }
}

if ($is_category || $is_tag) {
    $intro = term_description($queried);
}

if (! $intro) {
    $intro = __('Explore a curated edit of footwear, bags, and accessories selected for easy styling, everyday wear, and clear product details.', 'dawp');
}

$uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
$exclude_terms = $uncategorized ? [(int) $uncategorized->term_id] : [];
$top_categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'exclude'    => $exclude_terms,
    'number'     => 6,
    'orderby'    => 'count',
    'order'      => 'DESC',
]);

$sidebar_categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'exclude'    => $exclude_terms,
]);
?>

<div class="shop-page">
    <div class="shop-container">
        <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <?php if ($is_category || $is_tag) : ?>
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php echo esc_html($page_title); ?></span>
            <?php else : ?>
                <span><?php esc_html_e('Shop', 'dawp'); ?></span>
            <?php endif; ?>
        </nav>

        <header class="shop-hero">
            <div class="shop-hero__media" aria-hidden="true">
                <img src="<?php echo esc_url($shop_hero_image); ?>" alt="" loading="eager">
            </div>
            <div class="shop-hero__content">
                <p class="shop-hero__eyebrow"><?php esc_html_e('Curated boutique edit', 'dawp'); ?></p>
                <h1 class="shop-hero__title"><?php echo esc_html($page_title); ?></h1>
                <div class="shop-hero__intro"><?php echo wp_kses_post(wpautop($intro)); ?></div>
            </div>
            <div class="shop-hero__stats" aria-label="<?php esc_attr_e('Shop highlights', 'dawp'); ?>">
                <div>
                    <strong><?php echo esc_html(number_format_i18n($total)); ?></strong>
                    <span><?php echo esc_html(_n('Product', 'Products', $total, 'dawp')); ?></span>
                </div>
                <div>
                    <strong><?php echo esc_html(is_wp_error($top_categories) ? 0 : count($top_categories)); ?></strong>
                    <span><?php esc_html_e('Collections', 'dawp'); ?></span>
                </div>
                <div>
                    <strong><?php esc_html_e('Easy', 'dawp'); ?></strong>
                    <span><?php esc_html_e('Everyday styling', 'dawp'); ?></span>
                </div>
            </div>
        </header>

        <?php if (! empty($top_categories) && ! is_wp_error($top_categories)) : ?>
            <section class="shop-category-strip" aria-label="<?php esc_attr_e('Featured categories', 'dawp'); ?>">
                <?php foreach ($top_categories as $category) :
                    $thumbnail_id = (int) get_term_meta($category->term_id, 'thumbnail_id', true);
                    $is_current   = $is_category && isset($queried->term_id) && (int) $queried->term_id === (int) $category->term_id;
                    ?>
                    <a class="shop-category-tile<?php echo $is_current ? ' is-active' : ''; ?>" href="<?php echo esc_url(get_term_link($category)); ?>" <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                        <span class="shop-category-tile__media">
                            <?php
                            if ($thumbnail_id) {
                                echo wp_get_attachment_image($thumbnail_id, 'woocommerce_thumbnail', false, [
                                    'class'   => 'shop-category-tile__img',
                                    'loading' => 'lazy',
                                ]);
                            } else {
                                echo wc_placeholder_img('woocommerce_thumbnail', ['class' => 'shop-category-tile__img']);
                            }
                            ?>
                        </span>
                        <span class="shop-category-tile__body">
                            <span class="shop-category-tile__name"><?php echo esc_html($category->name); ?></span>
                            <span class="shop-category-tile__count">
                                <?php printf(esc_html(_n('%s item', '%s items', $category->count, 'dawp')), esc_html(number_format_i18n($category->count))); ?>
                            </span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <div class="shop-toolbar">
            <div class="shop-toolbar__left">
                <button class="shop-filter-btn" id="shopFilterBtn" type="button" aria-expanded="false" aria-controls="shopSidebar">
                    <span aria-hidden="true" class="shop-filter-btn__icon"></span>
                    <?php esc_html_e('Filters', 'dawp'); ?>
                </button>
                <span class="shop-toolbar__count">
                    <?php printf(esc_html(_n('%s product found', '%s products found', $total, 'dawp')), esc_html(number_format_i18n($total))); ?>
                </span>
            </div>
            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <div class="shop-sidebar-overlay" id="shopSidebarOverlay" aria-hidden="true"></div>

        <div class="shop-layout">
            <aside class="shop-sidebar" id="shopSidebar" aria-label="<?php esc_attr_e('Product filters', 'dawp'); ?>">
                <div class="shop-sidebar__header">
                    <h2 class="shop-sidebar__mobile-title"><?php esc_html_e('Filters', 'dawp'); ?></h2>
                    <button class="shop-sidebar__close" id="shopSidebarClose" type="button" aria-label="<?php esc_attr_e('Close filters', 'dawp'); ?>">
                        <span aria-hidden="true"></span>
                    </button>
                </div>

                <?php if (! empty($sidebar_categories) && ! is_wp_error($sidebar_categories)) : ?>
                    <div class="shop-sidebar__widget">
                        <h3 class="shop-sidebar__title"><?php esc_html_e('Collections', 'dawp'); ?></h3>
                        <ul class="shop-sidebar__categories">
                            <li>
                                <a class="<?php echo (! $is_category && ! $is_tag) ? 'is-active' : ''; ?>" href="<?php echo esc_url($shop_url); ?>" <?php echo (! $is_category && ! $is_tag) ? 'aria-current="page"' : ''; ?>>
                                    <span><?php esc_html_e('All Products', 'dawp'); ?></span>
                                    <span class="count"><?php echo esc_html(number_format_i18n(wp_count_posts('product')->publish ?? 0)); ?></span>
                                </a>
                            </li>
                            <?php foreach ($sidebar_categories as $category) :
                                $is_current = $is_category && isset($queried->term_id) && (int) $queried->term_id === (int) $category->term_id;
                                ?>
                                <li>
                                    <a class="<?php echo $is_current ? 'is-active' : ''; ?>" href="<?php echo esc_url(get_term_link($category)); ?>" <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                                        <span><?php echo esc_html($category->name); ?></span>
                                        <span class="count"><?php echo esc_html(number_format_i18n($category->count)); ?></span>
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

            <main class="shop-main" id="main-content">
                <?php if (woocommerce_product_loop()) : ?>
                    <?php woocommerce_product_loop_start(); ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                    <?php woocommerce_product_loop_end(); ?>

                    <div class="shop-pagination">
                        <?php woocommerce_pagination(); ?>
                    </div>
                <?php else : ?>
                    <div class="shop-empty">
                        <h2><?php esc_html_e('No products found', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Try another collection or clear the current filters to keep browsing.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse all products', 'dawp'); ?></a>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>
</div>

<script>
(function () {
    var filterBtn = document.getElementById('shopFilterBtn');
    var sidebar = document.getElementById('shopSidebar');
    var overlay = document.getElementById('shopSidebarOverlay');
    var closeBtn = document.getElementById('shopSidebarClose');

    if (!filterBtn || !sidebar || !overlay) {
        return;
    }

    function openSidebar() {
        sidebar.classList.add('is-open');
        overlay.classList.add('is-open');
        overlay.removeAttribute('aria-hidden');
        filterBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        filterBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    filterBtn.addEventListener('click', openSidebar);
    overlay.addEventListener('click', closeSidebar);

    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && sidebar.classList.contains('is-open')) {
            closeSidebar();
        }
    });
})();
</script>

<?php get_footer(); ?>
