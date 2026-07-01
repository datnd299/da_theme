<?php
/**
 * One Shop Vibe - Shop / Archive Product Template
 * Design System: Beauty essentials, conversion-first
 */
defined('ABSPATH') || exit;

get_header();

$archive_title = is_shop() ? __('All Products', 'dawp') : woocommerce_page_title(false);
$archive_summary = __('Browse tire options with clear product details, pricing, and fitment reminders.', 'dawp');
$archive_eyebrow = __('Rubyinstar Tire Shop', 'dawp');
$archive_cover = get_theme_file_uri('/assets/img/gallery/Rubyinstar/tire-hero-road.png');
$archive_tags = [
    __('Tire size', 'dawp'),
    __('Rim size', 'dawp'),
    __('Vehicle fit', 'dawp'),
];

if ( is_product_category() ) {
    $cat = get_queried_object();
    $category_data = function_exists('dawp_tire_category_data') ? dawp_tire_category_data($cat->slug) : null;

    if ($category_data) {
        $archive_summary = $category_data['summary'] ?? $category_data['description'];
        $archive_eyebrow = $category_data['eyebrow'] ?? __('Shop Tire Category', 'dawp');
        $archive_cover = function_exists('dawp_tire_category_cover_url')
            ? dawp_tire_category_cover_url($cat->slug)
            : $archive_cover;
        $archive_tags = $category_data['tags'] ?? $archive_tags;
    } elseif (! empty($cat->description)) {
        $archive_summary = wp_strip_all_tags($cat->description);
    }
} elseif ( is_product_tag() ) {
    $tag = get_queried_object();

    if (! empty($tag->description)) {
        $archive_summary = wp_strip_all_tags($tag->description);
    }
}
?>

<div class="shop-page">
<div class="shop-container">

    <?php
    // Breadcrumb
    ?>
    <nav class="shop-breadcrumb" aria-label="Breadcrumbbb">
        <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
        <span aria-hidden="true">&rsaquo;</span>
        <?php if ( is_product_category() ) :
            $cat = get_queried_object(); ?>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>">Shop</a>
            <span aria-hidden="true">&rsaquo;</span>
            <span><?php echo esc_html( $cat->name ); ?></span>
        <?php elseif ( is_product_tag() ) :
            $tag = get_queried_object(); ?>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>">Shop</a>
            <span aria-hidden="true">&rsaquo;</span>
            <span><?php echo esc_html( $tag->name ); ?></span>
        <?php else : ?>
            <span>Shop</span>
        <?php endif; ?>
    </nav>

    <section class="shop-hero" aria-labelledby="shopArchiveTitle">
        <img
            class="shop-hero__image"
            src="<?php echo esc_url($archive_cover); ?>"
            alt="<?php echo esc_attr($archive_title); ?>"
            loading="eager"
            decoding="async"
            fetchpriority="high"
        >
        <div class="shop-hero__shade"></div>
        <div class="shop-hero__content">
            <p class="shop-hero__eyebrow"><?php echo esc_html($archive_eyebrow); ?></p>
            <h1 class="shop-hero__title" id="shopArchiveTitle"><?php echo esc_html($archive_title); ?></h1>
            <p class="shop-hero__summary"><?php echo esc_html($archive_summary); ?></p>

            <?php if (! empty($archive_tags)) : ?>
                <div class="shop-hero__tags" aria-label="<?php esc_attr_e('Category highlights', 'dawp'); ?>">
                    <?php foreach ($archive_tags as $tag) : ?>
                        <span><?php echo esc_html($tag); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <p class="shop-hero__note">
                <?php esc_html_e('Please confirm tire size, rim size, load index, speed rating, and vehicle compatibility before ordering.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <?php
    // Toolbar: count + filter toggle + sort
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
    // Sidebar overlay
    ?>
    <div class="shop-sidebar-overlay" id="shopSidebarOverlay" aria-hidden="true"></div>

    <?php
    // Layout
    ?>
    <div class="shop-layout">

        <?php // Sidebar ?>
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
            $categories = function_exists('dawp_tire_product_category_terms') ? dawp_tire_product_category_terms() : [];
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
            <div class="shop-sidebar__widget">
                <h3 class="shop-sidebar__title">Categories</h3>
                <ul class="shop-sidebar__categories">
                    <li>
                        <a
                            href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>"
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

        <?php // Main Product Area ?>
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
                    <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>">
                        Browse all products &rarr;
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
