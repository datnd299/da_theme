<?php
/**
 * Elite Shop Express — Shop / Archive Product Template
 * Design System: Trusted Hardware, conversion-first
 * Section 10: Category / Shop Page rules
 */
defined('ABSPATH') || exit;

$broge_category_pages = [
    'formal-shoes' => [
        'label'      => __('Formal Shoes', 'dawp'),
        'eyebrow'    => __("Men's Formal Footwear", 'dawp'),
        'lead'       => __('Clean, polished shoes for office days, formal events, dinners, and smart casual outfits.', 'dawp'),
        'image'      => 'broge-category-formal-shoes.png',
        'image_alt'  => __('Formal leather shoes styled for work and special occasions', 'dawp'),
        'highlights' => [
            __('Office-ready polish', 'dawp'),
            __('Event and dinner styling', 'dawp'),
            __('Smart casual pairing', 'dawp'),
        ],
    ],
    'leather-dress-shoes' => [
        'label'      => __('Leather Dress Shoes', 'dawp'),
        'eyebrow'    => __('Refined Dress Footwear', 'dawp'),
        'lead'       => __('Leather dress shoes with a refined finish for business wear, formal occasions, and confident everyday presentation.', 'dawp'),
        'image'      => 'broge-category-leather-dress-shoes.png',
        'image_alt'  => __('Polished leather dress shoes with a refined formal finish', 'dawp'),
        'highlights' => [
            __('Business-ready finish', 'dawp'),
            __('Classic formal profile', 'dawp'),
            __('Easy suit pairing', 'dawp'),
        ],
    ],
    'brogue-shoes' => [
        'label'      => __('Brogue Shoes', 'dawp'),
        'eyebrow'    => __('Classic Brogue Detail', 'dawp'),
        'lead'       => __('Brogue shoes with decorative detailing for formal looks, evening style, and sharp smart casual outfits.', 'dawp'),
        'image'      => 'broge-category-brogue-shoes.png',
        'image_alt'  => __('Close up brogue shoes with perforated detailing and stitching', 'dawp'),
        'highlights' => [
            __('Detailed brogue styling', 'dawp'),
            __('Formal and smart casual', 'dawp'),
            __('Distinctive classic look', 'dawp'),
        ],
    ],
];

$queried_category = is_product_category() ? get_queried_object() : null;
$active_category_page = (
    $queried_category instanceof WP_Term
    && isset($broge_category_pages[$queried_category->slug])
) ? $broge_category_pages[$queried_category->slug] : null;
$img_base = get_template_directory_uri() . '/assets/img/';

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
    <?php if ( $active_category_page ) : ?>
        <section class="shop-category-hero" aria-labelledby="shop-category-title">
            <div class="shop-category-hero__content">
                <p class="shop-category-hero__eyebrow"><?php echo esc_html( $active_category_page['eyebrow'] ); ?></p>
                <h1 id="shop-category-title"><?php woocommerce_page_title(); ?></h1>
                <p class="shop-category-hero__lead">
                    <?php echo esc_html( $active_category_page['lead'] ); ?>
                </p>
                <ul class="shop-category-hero__highlights">
                    <?php foreach ( $active_category_page['highlights'] as $highlight ) : ?>
                        <li><?php echo esc_html( $highlight ); ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="shop-category-hero__meta" aria-label="<?php esc_attr_e('Category summary', 'dawp'); ?>">
                    <span><?php printf( esc_html( _n( '%d product', '%d products', (int) $queried_category->count, 'dawp' ) ), (int) $queried_category->count ); ?></span>
                    <span><?php esc_html_e('Size and fit notes on product pages', 'dawp'); ?></span>
                </div>
            </div>
            <div class="shop-category-hero__media">
                <img src="<?php echo esc_url( $img_base . $active_category_page['image'] ); ?>"
                     alt="<?php echo esc_attr( $active_category_page['image_alt'] ); ?>"
                     loading="eager">
            </div>
        </section>

        <nav class="shop-category-tabs" aria-label="<?php esc_attr_e('Product categories', 'dawp'); ?>">
            <?php foreach ( $broge_category_pages as $slug => $category_page ) :
                $term = get_term_by( 'slug', $slug, 'product_cat' );
                $url = $term ? get_term_link( $term ) : home_url( '/product-category/' . $slug . '/' );
                if ( is_wp_error( $url ) ) {
                    $url = home_url( '/product-category/' . $slug . '/' );
                }
                ?>
                <a href="<?php echo esc_url( $url ); ?>" <?php echo $queried_category->slug === $slug ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html( $category_page['label'] ); ?>
                </a>
            <?php endforeach; ?>
        </nav>
    <?php else : ?>
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
            $categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'parent'     => 0,
                'exclude'    => [ get_term_by('slug', 'uncategorized', 'product_cat')->term_id ?? 0 ],
            ]);
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
            <div class="shop-sidebar__widget">
                <h3 class="shop-sidebar__title">Categories</h3>
                <ul class="shop-sidebar__categories">
                    <li>
                        <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>">
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
