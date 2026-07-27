<?php
/**
 * Elite Shop Express — Shop / Archive Product Template
 * Design System: Trusted Hardware, conversion-first
 * Section 10: Category / Shop Page rules
 */
defined('ABSPATH') || exit;

get_header();
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
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>">Shop</a>
            <span aria-hidden="true">›</span>
            <span><?php echo esc_html( $cat->name ); ?></span>
        <?php elseif ( is_product_tag() ) :
            $tag = get_queried_object(); ?>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>">Shop</a>
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
        <h1 class="shop-header__title">
            <?php
            if ( is_product_category() || is_product_tag() ) {
                woocommerce_page_title();
            } else {
                echo 'All Products';
            }
            ?>
        </h1>
    </div>

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
                Categories
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
        <?php get_sidebar('shop'); ?>

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
                    <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>">
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
