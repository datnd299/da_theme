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
        <?php if ( is_product_category() || is_product_tag() ) :
            $archive_description = term_description();
            if ( $archive_description ) : ?>
                <div class="shop-header__description">
                    <?php echo wp_kses_post( wpautop( $archive_description ) ); ?>
                </div>
            <?php endif;
        endif; ?>
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
            $shop_url      = get_permalink( wc_get_page_id('shop') );
            $mega_sections = function_exists('dawp_megamenu_sections') ? dawp_megamenu_sections() : [];
            ?>
            <div class="shop-sidebar__widget shop-sidebar__widget--open">
                <h3 class="shop-sidebar__title">Shop</h3>
                <ul class="shop-sidebar__categories">
                    <li>
                        <a
                            href="<?php echo esc_url( $shop_url ); ?>"
                            <?php if ( is_shop() ) echo 'aria-current="page"'; ?>
                        >
                            All Products
                        </a>
                    </li>
                </ul>
            </div>

            <?php foreach ( $mega_sections as $section_index => $section ) :
                if ( empty( $section['links'] ) ) {
                    continue;
                }
                $section_items        = [];
                $section_has_current  = false;

                foreach ( $section['links'] as $link ) {
                    $path = trim( parse_url( $link['url'], PHP_URL_PATH ) ?? '', '/' );
                    $slug = basename( $path );
                    $term = $slug ? get_term_by( 'slug', $slug, 'product_cat' ) : false;

                    if ( ! $term || is_wp_error( $term ) ) {
                        continue;
                    }

                    $is_current = is_product_category( $term->slug );
                    if ( $is_current ) {
                        $section_has_current = true;
                    }

                    $section_items[] = [
                        'title'      => $link['title'],
                        'term'       => $term,
                        'is_current' => $is_current,
                    ];
                }

                if ( empty( $section_items ) ) {
                    continue;
                }

                $panel_id = 'shop-sidebar-section-' . (int) $section_index;
                ?>
            <div class="shop-sidebar__widget shop-sidebar__widget--accordion <?php echo $section_has_current ? 'shop-sidebar__widget--open' : ''; ?>">
                <h3 class="shop-sidebar__title">
                    <button
                        class="shop-sidebar__toggle"
                        type="button"
                        aria-expanded="<?php echo $section_has_current ? 'true' : 'false'; ?>"
                        aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                    >
                        <span><?php echo esc_html( $section['title'] ); ?></span>
                        <svg class="shop-sidebar__toggle-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path d="M6 9l6 6 6-6"/>
                        </svg>
                    </button>
                </h3>
                <ul class="shop-sidebar__categories shop-sidebar__panel" id="<?php echo esc_attr( $panel_id ); ?>">
                    <?php foreach ( $section_items as $item ) : ?>
                        <li>
                            <a
                                href="<?php echo esc_url( get_term_link( $item['term'] ) ); ?>"
                                <?php if ( $item['is_current'] ) echo 'aria-current="page"'; ?>
                            >
                                <?php echo esc_html( $item['title'] ); ?>
                                <span class="count">(<?php echo (int) $item['term']->count; ?>)</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>

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
    sidebar.querySelectorAll('.shop-sidebar__toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            var widget = toggle.closest('.shop-sidebar__widget--accordion');
            var isOpen = widget.classList.toggle('shop-sidebar__widget--open');
            toggle.setAttribute('aria-expanded', String(isOpen));
        });
    });
    // Close on Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && sidebar.classList.contains('is-open')) {
            closeSidebar();
        }
    });
})();
</script>

<?php get_footer(); ?>
