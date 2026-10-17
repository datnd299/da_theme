<?php
/**
 * Chronel - Shop / Archive Product Template
 * Design System: Modern Quiet Luxury
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$archive_term = (is_product_category() || is_product_tag()) ? get_queried_object() : null;
$archive_title = __('All Watches', 'dawp');
$archive_description = __('Explore refined mechanical timepieces selected for proportion, finishing and confident everyday wear.', 'dawp');
$archive_eyebrow = __('Fine Timepieces', 'dawp');
$archive_slug = 'shop';
$shop_cover_images = [
    'shop' => [
        'url' => get_theme_file_uri('assets/img/maison/hero-diver.jpg'),
        'alt' => __('Steel dive watch resting on dark slate', 'dawp'),
    ],
    'iced-out-watches' => [
        'url' => get_theme_file_uri('assets/img/maison/collector-gold.jpg'),
        'alt' => __('Gold dress watch on cream silk', 'dawp'),
    ],
];
if ($archive_term && !is_wp_error($archive_term)) {
    $archive_title = $archive_term->name;
    $archive_slug = $archive_term->slug;
    $term_description = term_description($archive_term->term_id, $archive_term->taxonomy);
    $archive_description = $term_description ? wp_strip_all_tags($term_description) : $archive_description;
    $archive_eyebrow = is_product_tag() ? __('Reference Edit', 'dawp') : __('Collection', 'dawp');
}

global $wp_query;
$archive_total = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;
$categories = function_exists('dawp_lbq_product_category_terms') ? dawp_lbq_product_category_terms() : [];

// The shop-header sub-category strip shows either the current category's
// children, or — on the main shop archive — every top-level category.
$subcat_terms = [];
if ($archive_term && !is_wp_error($archive_term) && is_product_category()) {
    $child_terms = get_terms([
        'taxonomy'   => 'product_cat',
        'parent'     => $archive_term->term_id,
        'hide_empty' => false,
    ]);

    if (!is_wp_error($child_terms)) {
        $subcat_terms = $child_terms;
    }
} elseif (is_shop()) {
    $subcat_terms = $categories;
}

$child_categories = [];
foreach ($subcat_terms as $subcat_term) {
    $child_image = '';
    $thumbnail_id = (int) get_term_meta($subcat_term->term_id, 'thumbnail_id', true);

    if ($thumbnail_id) {
        $child_image = wp_get_attachment_image_url($thumbnail_id, 'medium');
    }

    if (!$child_image && function_exists('dawp_get_category_image_url')) {
        $child_image = dawp_get_category_image_url($subcat_term->term_id);
    }

    $child_categories[] = [
        'name'  => $subcat_term->name,
        'link'  => get_term_link($subcat_term),
        'image' => $child_image,
    ];
}

// A parent category shows its children instead of a cover image; only a
// leaf category (no children) gets its own image in shop-header__media.
$archive_cover = $shop_cover_images[$archive_slug] ?? $shop_cover_images['shop'];

if ($archive_term && !is_wp_error($archive_term) && is_product_category() && empty($child_categories) && !isset($shop_cover_images[$archive_slug])) {
    $thumbnail_id = (int) get_term_meta($archive_term->term_id, 'thumbnail_id', true);
    $thumbnail_url = $thumbnail_id ? wp_get_attachment_image_url($thumbnail_id, 'full') : '';

    if (!$thumbnail_url && function_exists('dawp_get_category_image_url')) {
        $thumbnail_url = dawp_get_category_image_url($archive_term->term_id);
    }

    if ($thumbnail_url) {
        $archive_cover = [
            'url' => $thumbnail_url,
            'alt' => sprintf(
                /* translators: %s: product category name */
                __('%s collection cover image', 'dawp'),
                $archive_title
            ),
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
    <div class="shop-header<?php echo empty($child_categories) ? '' : ' shop-header--stacked'; ?>">
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

        <?php if (empty($child_categories)) : ?>
        <div class="shop-header__media">
            <?php echo dawp_get_responsive_image($archive_cover['url'], $archive_cover['alt'], '', 640, 520, 'eager', '(max-width: 900px) 100vw, 42vw', 'high'); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($child_categories)) : ?>
        <div class="shop-subcats" aria-label="<?php esc_attr_e('Categories', 'dawp'); ?>">
            <ul class="shop-subcats__list">
                <?php foreach ($child_categories as $child) : ?>
                <li class="shop-subcats__item">
                    <a href="<?php echo esc_url($child['link']); ?>" class="shop-subcats__link">
                        <span class="shop-subcats__thumb">
                            <?php if ($child['image']) : ?>
                                <?php echo dawp_get_responsive_image($child['image'], $child['name'], 'shop-subcats__img', 96, 96, 'lazy', '96px'); ?>
                            <?php else : ?>
                                <span class="shop-subcats__thumb--fallback"><?php echo esc_html(mb_substr($child['name'], 0, 1)); ?></span>
                            <?php endif; ?>
                        </span>
                        <span class="shop-subcats__name"><?php echo esc_html($child['name']); ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
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
            // Categories widget
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

    // --- Load More Products logic ---
    var paginationContainer = document.querySelector('.shop-pagination');
    if (paginationContainer) {
        var wooPagination = paginationContainer.querySelector('.woocommerce-pagination');
        if (wooPagination) {
            var nextLink = wooPagination.querySelector('.next');
            wooPagination.style.display = 'none';

            if (nextLink) {
                var loadMoreContainer = document.createElement('div');
                loadMoreContainer.className = 'shop-load-more';

                var loadMoreBtn = document.createElement('button');
                loadMoreBtn.type = 'button';
                loadMoreBtn.className = 'shop-load-more__btn';
                loadMoreBtn.textContent = 'Load More Watches';

                loadMoreContainer.appendChild(loadMoreBtn);
                paginationContainer.parentNode.insertBefore(loadMoreContainer, paginationContainer.nextSibling);

                loadMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var originalText = loadMoreBtn.innerHTML;
                    loadMoreBtn.innerHTML = 'Loading...';
                    loadMoreBtn.setAttribute('aria-busy', 'true');
                    
                    fetch(nextLink.href)
                        .then(function(response) { return response.text(); })
                        .then(function(html) {
                            var parser = new DOMParser();
                            var doc = parser.parseFromString(html, 'text/html');
                            
                            var newProducts = doc.querySelectorAll('ul.products li.product, li.product-card');
                            var productContainer = document.querySelector('ul.products');
                            
                            if (newProducts.length > 0 && productContainer) {
                                newProducts.forEach(function(product) {
                                    productContainer.appendChild(product);
                                });
                            }
                            
                            var newNextLink = doc.querySelector('.woocommerce-pagination .next');
                            if (newNextLink) {
                                nextLink.href = newNextLink.href;
                                loadMoreBtn.innerHTML = originalText;
                                loadMoreBtn.removeAttribute('aria-busy');
                            } else {
                                loadMoreContainer.remove();
                            }
                        })
                        .catch(function(error) {
                            console.error('Error loading more products:', error);
                            loadMoreBtn.innerHTML = 'Error. Try Again';
                            loadMoreBtn.removeAttribute('aria-busy');
                        });
                });
            }
        }
    }
})();
</script>

<?php get_footer(); ?>
