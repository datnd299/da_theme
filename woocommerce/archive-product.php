<?php
/**
 * Crowdfused - Shop / Archive Product Template
 * Design System: Modern general merchandise, conversion-first
 * Section 10: Category / Shop Page rules
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$archive_term = (is_product_category() || is_product_tag()) ? get_queried_object() : null;
$archive_title = __('All Products', 'dawp');
$archive_description = __('Browse practical home essentials, furniture, electronics, smart home products, kitchen favorites, and outdoor living products from Crowdfused.', 'dawp');
$archive_eyebrow = __('Crowdfused Collection', 'dawp');
$archive_slug = 'shop';
$home_image = static function ($filename) {
    return get_theme_file_uri('assets/img/home/' . $filename);
};
$new_home_image = static function ($filename) {
    return get_theme_file_uri('assets/img/New_homepage/' . $filename);
};

$shop_cover_images = [
    'shop' => [
        'url' => $new_home_image('Innovation_Made_Everyday.jpeg'),
        'alt' => __('Modern everyday products styled for innovation at home', 'dawp'),
    ],
    'home' => [
        'url' => $new_home_image('Kitchen_Home_Innovation_Smart_Tools_202607281513.jpeg'),
        'alt' => __('Smart kitchen and home tools arranged in a modern setting', 'dawp'),
    ],
    'garden-tools' => [
        'url' => $new_home_image('Patio_garden_handy_tools_202607281516.jpeg'),
        'alt' => __('Patio garden and handy tools for relaxed outdoor living', 'dawp'),
    ],
    'electronics' => [
        'url' => $new_home_image('Smart_home_connected_devices_202607281526.jpeg'),
        'alt' => __('Smart home connected devices in a clean modern home', 'dawp'),
    ],
    'sports-outdoors' => [
        'url' => $new_home_image('Outdoor&Adventure.jpeg'),
        'alt' => __('Outdoor and adventure gear selected for time outside', 'dawp'),
    ],
    'toys-outdoor-play' => [
        'url' => $home_image('Outdoor.jpeg'),
        'alt' => __('Outdoor living products for family time outside', 'dawp'),
    ],
    'beauty-personal-care' => [
        'url' => $new_home_image('Wellness_self-care_personal_care…_202607281533.jpeg'),
        'alt' => __('Wellness and self care products in a calm routine setting', 'dawp'),
    ],
    'pets' => [
        'url' => $home_image('Cozy_Bedroom_Layers.jpeg'),
        'alt' => __('Cozy home essentials styled for everyday comfort', 'dawp'),
    ],
    'school-office-art-supplies' => [
        'url' => $new_home_image('Office_desk_accessories_workspac…_202607281532.jpeg'),
        'alt' => __('Office desk accessories for focused productive days', 'dawp'),
    ],
];
if ($archive_term && !is_wp_error($archive_term)) {
    $archive_title = $archive_term->name;
    $archive_slug = $archive_term->slug;
    $term_description = term_description($archive_term->term_id, $archive_term->taxonomy);
    $archive_description = $term_description ? wp_strip_all_tags($term_description) : $archive_description;
    $archive_eyebrow = is_product_tag() ? __('Shop By Tag', 'dawp') : __('Shop By Category', 'dawp');
}

$archive_cover = $shop_cover_images[$archive_slug] ?? $shop_cover_images['shop'];

if ($archive_term && !is_wp_error($archive_term) && is_product_category() && !isset($shop_cover_images[$archive_slug])) {
    $thumbnail_id = (int) get_term_meta($archive_term->term_id, 'thumbnail_id', true);

    if ($thumbnail_id) {
        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');

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
}

global $wp_query;
$archive_total = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;
$categories = function_exists('dawp_lbq_product_category_terms') ? dawp_lbq_product_category_terms() : [];
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
        <div class="shop-header__media">
            <?php echo dawp_get_responsive_image($archive_cover['url'], $archive_cover['alt'], '', 640, 520, 'eager', '(max-width: 900px) 100vw, 42vw', 'high'); ?>
        </div>
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
                loadMoreContainer.className = 'flex justify-center mt-10 mb-10 w-full';
                loadMoreContainer.style.display = 'flex';
                loadMoreContainer.style.justifyContent = 'center';
                loadMoreContainer.style.marginTop = '2.5rem';
                loadMoreContainer.style.marginBottom = '2.5rem';
                loadMoreContainer.style.width = '100%';
                
                var loadMoreBtn = document.createElement('button');
                // Use exact classes from header to ensure they exist, plus inline styles for safety
                loadMoreBtn.className = 'inline-flex min-h-12 items-center justify-center rounded-md px-8 text-sm font-bold text-white transition cursor-pointer';
                loadMoreBtn.style.minHeight = '3rem';
                loadMoreBtn.style.paddingLeft = '2rem';
                loadMoreBtn.style.paddingRight = '2rem';
                loadMoreBtn.style.borderRadius = '999px';
                loadMoreBtn.style.backgroundColor = '#F58220';
                loadMoreBtn.style.color = '#ffffff';
                loadMoreBtn.style.fontWeight = '700';
                loadMoreBtn.style.fontSize = '0.875rem';
                loadMoreBtn.style.border = 'none';
                loadMoreBtn.style.cursor = 'pointer';
                loadMoreBtn.style.transition = 'background-color 0.2s';
                
                loadMoreBtn.onmouseover = function() { this.style.backgroundColor = '#E96F00'; };
                loadMoreBtn.onmouseout = function() { this.style.backgroundColor = '#F58220'; };

                loadMoreBtn.innerHTML = 'Load More Products';
                
                loadMoreContainer.appendChild(loadMoreBtn);
                paginationContainer.parentNode.insertBefore(loadMoreContainer, paginationContainer.nextSibling);
                
                loadMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var originalText = loadMoreBtn.innerHTML;
                    loadMoreBtn.innerHTML = 'Loading...';
                    loadMoreBtn.style.opacity = '0.7';
                    loadMoreBtn.style.pointerEvents = 'none';
                    
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
                                loadMoreBtn.style.opacity = '1';
                                loadMoreBtn.style.pointerEvents = 'auto';
                            } else {
                                loadMoreContainer.remove();
                            }
                        })
                        .catch(function(error) {
                            console.error('Error loading more products:', error);
                            loadMoreBtn.innerHTML = 'Error. Try Again';
                            loadMoreBtn.style.opacity = '1';
                            loadMoreBtn.style.pointerEvents = 'auto';
                        });
                });
            }
        }
    }
})();
</script>

<?php get_footer(); ?>
