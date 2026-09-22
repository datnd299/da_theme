<?php
/**
 * Shop and product category archive template for Clixframe.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$is_category   = is_product_category();
$queried_term  = $is_category ? get_queried_object() : null;
$category_data = $is_category && $queried_term && !is_wp_error($queried_term) ? qb_get_product_category_data($queried_term->slug) : null;
$shop_url      = get_permalink(wc_get_page_id('shop'));
$shop_url      = $shop_url ?: home_url('/shop/');
$brand_name    = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Clixframe';

if ($category_data) {
    $page_title  = $category_data['name'];
    $headline    = $category_data['headline'];
    $description = $category_data['description'];
    $hero_image  = qb_theme_asset_image_url($category_data['image']);
} elseif ($is_category && $queried_term && !is_wp_error($queried_term)) {
    $page_title  = $queried_term->name;
    $headline    = $queried_term->name;
    $description = $queried_term->description ?: 'Browse Velmos watch styles selected for confident form, refined materials, and everyday presence.';
    $thumbnail_id = get_term_meta((int) $queried_term->term_id, 'thumbnail_id', true);
    $hero_image  = $thumbnail_id ? wp_get_attachment_image_url((int) $thumbnail_id, 'large') : '';
    $hero_image  = $hero_image ?: get_template_directory_uri() . '/assets/images/home/luxuryimagecollection%20(1)/velmoscustome_image/68.jpg';
} else {
    $page_title  = 'All Watches';
    $headline    = 'Shop Velmos Watches.';
    $description = 'Discover the main watch collection distributed by velmoscustom, selected for clean presentation, considered materials, and precise product detail.';
    $hero_image  = get_template_directory_uri() . '/assets/images/home/luxuryimagecollection%20(1)/velmoscustome_image/68.jpg';
}

if (!$hero_image && function_exists('wc_placeholder_img_src')) {
    $hero_image = wc_placeholder_img_src('large');
}

$live_categories = function_exists('qb_get_live_product_categories') ? qb_get_live_product_categories() : [];

get_header();
?>

<div class="shop-page">
    <section class="shop-hero">
        <div class="shop-container shop-hero__grid">
            <div class="shop-hero__content">
                <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                    <span aria-hidden="true">/</span>
                    <?php if ($is_category) : ?>
                        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop', 'dawp'); ?></a>
                        <span aria-hidden="true">/</span>
                        <span><?php echo esc_html($page_title); ?></span>
                    <?php else : ?>
                        <span><?php esc_html_e('Shop', 'dawp'); ?></span>
                    <?php endif; ?>
                </nav>

                <p class="shop-eyebrow"><?php echo esc_html(sprintf(__('%s Collection', 'dawp'), $brand_name)); ?></p>
                <h1 class="shop-hero__title"><?php echo esc_html($headline); ?></h1>
                <p class="shop-hero__copy"><?php echo esc_html($description); ?></p>
            </div>

            <?php if ($hero_image) : ?>
                <div class="shop-hero__media">
                    <?php
                    echo qb_responsive_image(
                        $hero_image,
                        $page_title,
                        [
                            'width'         => 900,
                            'height'        => 1125,
                            'widths'        => [420, 640, 768, 900],
                            'sizes'         => '(max-width: 860px) calc(100vw - 32px), 44vw',
                            'loading'       => 'eager',
                            'fetchpriority' => 'high',
                        ]
                    );
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <div class="shop-container">
        <?php if (!empty($live_categories)) : ?>
            <nav class="shop-category-strip" aria-label="<?php esc_attr_e('Shop categories', 'dawp'); ?>">
                <a class="shop-category-strip__item <?php echo !$is_category ? 'is-active' : ''; ?>" href="<?php echo esc_url($shop_url); ?>">
                    <span><?php esc_html_e('All', 'dawp'); ?></span>
                </a>
                <?php foreach ($live_categories as $category) : ?>
                    <?php
                    $current = $queried_term && !is_wp_error($queried_term) && (int) $queried_term->term_id === (int) $category->term_id;
                    ?>
                    <a class="shop-category-strip__item <?php echo $current ? 'is-active' : ''; ?>" href="<?php echo esc_url(function_exists('qb_product_term_url') ? qb_product_term_url($category) : get_term_link($category)); ?>">
                        <span><?php echo esc_html($category->name); ?></span>
                    </a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>

        <div class="shop-toolbar">
            <div class="shop-toolbar__left">
                <span class="shop-toolbar__count">
                    <?php
                    global $wp_query;
                    $total = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;
                    printf(
                        esc_html(_n('%d product', '%d products', $total, 'dawp')),
                        $total
                    );
                    ?>
                </span>
                <button class="shop-filter-btn" id="shopFilterBtn" aria-expanded="false" aria-controls="shopSidebar" type="button">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="8" y1="12" x2="20" y2="12"></line>
                        <line x1="12" y1="18" x2="20" y2="18"></line>
                    </svg>
                    <?php esc_html_e('Filter', 'dawp'); ?>
                </button>
            </div>
        </div>

        <div class="shop-sidebar-overlay" id="shopSidebarOverlay" aria-hidden="true"></div>

        <div class="shop-layout">
            <aside class="shop-sidebar" id="shopSidebar" aria-label="<?php esc_attr_e('Product filters', 'dawp'); ?>">
                <div class="shop-sidebar__header">
                    <h2 class="shop-sidebar__mobile-title"><?php esc_html_e('Filter Products', 'dawp'); ?></h2>
                    <button class="shop-sidebar__close" id="shopSidebarClose" aria-label="<?php esc_attr_e('Close filters', 'dawp'); ?>" type="button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <div class="shop-sidebar__widget">
                    <h3 class="shop-sidebar__title"><?php esc_html_e('Watch Categories', 'dawp'); ?></h3>
                    <ul class="shop-sidebar__categories">
                        <li>
                            <a href="<?php echo esc_url($shop_url); ?>" <?php echo !$is_category ? 'aria-current="page"' : ''; ?>>
                                <span><?php esc_html_e('All Watches', 'dawp'); ?></span>
                            </a>
                        </li>
                        <?php foreach ($live_categories as $category) : ?>
                            <?php
                            $count = (int) $category->count;
                            $current = $queried_term && !is_wp_error($queried_term) && (int) $queried_term->term_id === (int) $category->term_id;
                            ?>
                            <li>
                                <a href="<?php echo esc_url(function_exists('qb_product_term_url') ? qb_product_term_url($category) : get_term_link($category)); ?>" <?php echo $current ? 'aria-current="page"' : ''; ?>>
                                    <span><?php echo esc_html($category->name); ?></span>
                                    <span class="count"><?php echo esc_html($count); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="shop-sidebar__note">
                    <strong><?php esc_html_e('Before ordering', 'dawp'); ?></strong>
                    <p><?php esc_html_e('Review case size, material or finish, strap details, movement notes, and care instructions on each product page.', 'dawp'); ?></p>
                </div>

                <?php
                if (is_active_sidebar('shop-sidebar')) {
                    dynamic_sidebar('shop-sidebar');
                }
                ?>
            </aside>

            <main class="shop-main" id="main-content">
                <?php if (woocommerce_product_loop()) : ?>
                    <?php woocommerce_product_loop_start(); ?>

                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <?php wc_get_template_part('content', 'product'); ?>
                    <?php endwhile; ?>

                    <?php woocommerce_product_loop_end(); ?>

                    <div class="shop-pagination">
                        <?php do_action('woocommerce_after_shop_loop'); ?>
                    </div>
                <?php else : ?>
                    <div class="shop-empty">
                        <h2><?php esc_html_e('No watches found in this collection.', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Browse all watches or check back as new pieces are added.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse All Watches', 'dawp'); ?></a>
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

    function openSidebar() {
        if (!sidebar || !overlay || !filterBtn) return;
        sidebar.classList.add('is-open');
        overlay.classList.add('is-open');
        overlay.removeAttribute('aria-hidden');
        filterBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        if (!sidebar || !overlay || !filterBtn) return;
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        filterBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (filterBtn) filterBtn.addEventListener('click', openSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && sidebar && sidebar.classList.contains('is-open')) {
            closeSidebar();
        }
    });
})();
</script>

<?php get_footer(); ?>
