<?php
/**
 * Elite Shop Express — Shop / Archive Product Template
 * Design System: Trusted Hardware, conversion-first
 * Section 10: Category / Shop Page rules
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$archive_term = (is_product_category() || is_product_tag()) ? get_queried_object() : null;
$archive_title = __('All Products', 'dawp');
$archive_description = __('Browse practical beauty accessories, makeup organizers, fashion accents, everyday essentials, and small giftable finds from LBQ Shop.', 'dawp');
$archive_eyebrow = __('LBQ Shop Collection', 'dawp');

if ($archive_term && !is_wp_error($archive_term)) {
    $archive_title = $archive_term->name;
    $term_description = term_description($archive_term->term_id, $archive_term->taxonomy);
    $archive_description = $term_description ? wp_strip_all_tags($term_description) : $archive_description;
    $archive_eyebrow = is_product_tag() ? __('Shop By Tag', 'dawp') : __('Shop By Category', 'dawp');
}

global $wp_query;
$archive_total = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;
$category_chips = [];

if (function_exists('dawp_lbq_product_categories')) {
    foreach (dawp_lbq_product_categories() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (!$term || is_wp_error($term)) {
            continue;
        }

        $term_link = get_term_link($term);

        if (is_wp_error($term_link)) {
            continue;
        }

        $category_chips[] = [
            'name'    => $term->name,
            'slug'    => $term->slug,
            'url'     => $term_link,
            'count'   => (int) $term->count,
            'current' => is_product_category($term->slug),
        ];
    }
}
?>

<div class="shop-page">
<div class="shop-container">

    <?php
    // ── Breadcrumb ─────────────────────────────────────────
    ?>
    <nav class="shop-breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
        <span aria-hidden="true">›</span>
        <?php if ( is_product_category() ) :
            $cat = get_queried_object(); ?>
            <a href="<?php echo esc_url( $shop_url ); ?>">Shop</a>
            <span aria-hidden="true">›</span>
            <span><?php echo esc_html( $cat->name ); ?></span>
        <?php elseif ( is_product_tag() ) :
            $tag = get_queried_object(); ?>
            <a href="<?php echo esc_url( $shop_url ); ?>">Shop</a>
            <span aria-hidden="true">›</span>
            <span><?php echo esc_html( $tag->name ); ?></span>
        <?php else : ?>
            <span>Shop</span>
        <?php endif; ?>
    </nav>

    <?php
    // ── Page heading ───────────────────────────────────────
    ?>
    <div class="shop-header">
        <div class="shop-header__content">
            <p class="shop-header__eyebrow"><?php echo esc_html($archive_eyebrow); ?></p>
            <h1 class="shop-header__title"><?php echo esc_html($archive_title); ?></h1>
            <?php if ($archive_description) : ?>
                <p class="shop-header__description"><?php echo esc_html($archive_description); ?></p>
            <?php endif; ?>
            <div class="shop-header__meta">
                <span>
                    <?php
                    printf(
                        esc_html(_n('%d product', '%d products', $archive_total, 'dawp')),
                        $archive_total
                    );
                    ?>
                </span>
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop all products', 'dawp'); ?></a>
            </div>
        </div>
    </div>

    <?php if (!empty($category_chips)) : ?>
        <nav class="shop-category-nav" aria-label="<?php esc_attr_e('Product categories', 'dawp'); ?>">
            <a href="<?php echo esc_url($shop_url); ?>" class="<?php echo is_shop() ? 'is-current' : ''; ?>">
                <?php esc_html_e('All', 'dawp'); ?>
            </a>
            <?php foreach ($category_chips as $chip) : ?>
                <a
                    href="<?php echo esc_url($chip['url']); ?>"
                    class="<?php echo $chip['current'] ? 'is-current' : ''; ?>"
                    <?php echo $chip['current'] ? 'aria-current="page"' : ''; ?>
                >
                    <span><?php echo esc_html($chip['name']); ?></span>
                    <span class="count"><?php echo esc_html($chip['count']); ?></span>
                </a>
            <?php endforeach; ?>
        </nav>
    <?php endif; ?>

    <?php
    // ── Toolbar: count + filter toggle + sort ──────────────
    ?>
    <div class="shop-toolbar">
        <div class="shop-toolbar__left">
            <span class="shop-toolbar__count">
                <?php
                global $wp_query;
                $total = $wp_query->found_posts;
                printf(
                    '%d %s',
                    $total,
                    $total === 1 ? 'product' : 'products'
                );
                ?>
            </span>
            <button
                class="shop-filter-btn"
                id="shopFilterBtn"
                aria-expanded="false"
                aria-controls="shopSidebar"
            >
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <line x1="4" y1="6" x2="20" y2="6"/>
                    <line x1="8" y1="12" x2="20" y2="12"/>
                    <line x1="12" y1="18" x2="20" y2="18"/>
                </svg>
                Filter
            </button>
        </div>

        <?php woocommerce_catalog_ordering(); ?>
    </div>

    <?php
    // ── Sidebar overlay (mobile bottom sheet backdrop) ─────
    ?>
    <div class="shop-sidebar-overlay" id="shopSidebarOverlay" aria-hidden="true"></div>

    <?php
    // ── Layout ─────────────────────────────────────────────
    ?>
    <div class="shop-layout">

        <?php // ── Sidebar ────────────────────────────────── ?>
        <aside class="shop-sidebar" id="shopSidebar" aria-label="Product filters">
            <div class="shop-sidebar__header">
                <h2 class="shop-sidebar__mobile-title">Filter Products</h2>
                <button
                    class="shop-sidebar__close"
                    id="shopSidebarClose"
                    aria-label="Close filters"
                >
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            <?php
            // Categories widget
            $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
            $categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'parent'     => 0,
                'exclude'    => $uncategorized && !is_wp_error($uncategorized) ? [(int) $uncategorized->term_id] : [],
            ]);
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
            <div class="shop-sidebar__widget">
                <h3 class="shop-sidebar__title">Categories</h3>
                <ul class="shop-sidebar__categories">
                    <li>
                        <a
                            href="<?php echo esc_url( $shop_url ); ?>"
                            <?php if ( is_shop() ) echo 'aria-current="page"'; ?>
                        >
                            All Products
                        </a>
                    </li>
                    <?php foreach ( $categories as $cat ) :
                        $is_current = ( is_product_category( $cat->slug ) ); ?>
                        <li>
                            <a
                                href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                                <?php if ( $is_current ) echo 'aria-current="page"'; ?>
                            >
                                <?php echo esc_html( $cat->name ); ?>
                                <span class="count">(<?php echo (int) $cat->count; ?>)</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php
            // Price filter / other widgets
            if ( is_active_sidebar('shop-sidebar') ) {
                dynamic_sidebar('shop-sidebar');
            }
            ?>
        </aside>

        <?php // ── Main Product Area ────────────────────────── ?>
        <main class="shop-main" id="main-content">

            <?php if ( woocommerce_product_loop() ) : ?>

                <?php woocommerce_product_loop_start(); ?>

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php wc_get_template_part('content', 'product'); ?>
                    <?php endwhile; ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php // Pagination ?>
                <div class="shop-pagination">
                    <?php do_action('woocommerce_after_shop_loop'); ?>
                </div>

            <?php else : ?>
                <div class="shop-empty">
                    <p>No products found in this collection.</p>
                    <a href="<?php echo esc_url( $shop_url ); ?>">
                        Browse all products →
                    </a>
                </div>
            <?php endif; ?>

        </main><!-- .shop-main -->
    </div><!-- .shop-layout -->

</div><!-- .shop-container -->
</div><!-- .shop-page -->

<script>
(function () {
    var filterBtn   = document.getElementById('shopFilterBtn');
    var sidebar     = document.getElementById('shopSidebar');
    var overlay     = document.getElementById('shopSidebarOverlay');
    var closeBtn    = document.getElementById('shopSidebarClose');

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

    if (filterBtn && sidebar) {
        filterBtn.addEventListener('click', openSidebar);
    }
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }
    // Close on Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && sidebar.classList.contains('is-open')) {
            closeSidebar();
        }
    });
})();
</script>

<?php get_footer(); ?>
