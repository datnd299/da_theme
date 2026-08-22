<?php
/**
 * chronelshop.com - Shop / Archive Product Template
 * Design System: Modern Quiet Luxury
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$archive_term = (is_product_category() || is_product_tag()) ? get_queried_object() : null;
$archive_title = __('All Watches', 'dawp');
$archive_description = __('Browse the collection with a clean product-first view.', 'dawp');
$archive_eyebrow = __('Fine Timepieces', 'dawp');
$archive_slug = 'shop';
$listing_count = isset($GLOBALS['wp_query']) ? (int) $GLOBALS['wp_query']->found_posts : 0;
$iced_out_url = get_term_link('iced-out-watches', 'product_tag');
$new_arrivals_url = function_exists('dawp_new_arrivals_url') ? dawp_new_arrivals_url() : home_url('/product-category/new-arrivals/');
$shop_sidebar_links = [
    [
        'title' => __('All Watches', 'dawp'),
        'url' => $shop_url,
        'current' => is_shop(),
    ],
    [
        'title' => __('New Arrivals', 'dawp'),
        'url' => $new_arrivals_url,
        'current' => function_exists('dawp_is_new_arrivals_category_archive') && dawp_is_new_arrivals_category_archive(),
    ],
    [
        'title' => __('Best Sellers', 'dawp'),
        'url' => add_query_arg('orderby', 'popularity', $shop_url),
        'current' => isset($_GET['orderby']) && 'popularity' === sanitize_text_field(wp_unslash($_GET['orderby'])),
    ],
    [
        'title' => __('Iced Out Watches', 'dawp'),
        'url' => $iced_out_url,
        'current' => is_product_tag('iced-out-watches'),
    ],
];
$product_categories = [];

if (taxonomy_exists('product_cat')) {
    $product_categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'orderby' => 'count',
        'order' => 'DESC',
        'number' => 8,
        'exclude' => array_filter([(int) get_option('default_product_cat')]),
    ]);

    if (is_wp_error($product_categories)) {
        $product_categories = [];
    }
}

if (is_wp_error($shop_sidebar_links[3]['url'])) {
    $shop_sidebar_links[3]['url'] = add_query_arg([
        's'         => 'Iced Out Watches',
        'post_type' => 'product',
    ], home_url('/'));
}

if ($archive_term && !is_wp_error($archive_term)) {
    $archive_title = $archive_term->name;
    $archive_slug = $archive_term->slug;
    $term_description = term_description($archive_term->term_id, $archive_term->taxonomy);
    $archive_description = $term_description ? wp_strip_all_tags($term_description) : __('Products in this category, arranged for quick browsing.', 'dawp');
    $archive_eyebrow = is_product_tag() ? __('Reference Edit', 'dawp') : __('Collection', 'dawp');
}

?>

<div class="shop-page">
<div class="shop-container">

    <?php
    // Breadcrumb
    ?>
    <nav class="shop-breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
        <span aria-hidden="true">&gt;</span>
        <?php if ( is_product_category() ) :
            $cat = get_queried_object(); ?>
            <a href="<?php echo esc_url( $shop_url ); ?>">Shop</a>
            <span aria-hidden="true">&gt;</span>
            <span><?php echo esc_html( $cat->name ); ?></span>
        <?php elseif ( is_product_tag() ) :
            $tag = get_queried_object(); ?>
            <a href="<?php echo esc_url( $shop_url ); ?>">Shop</a>
            <span aria-hidden="true">&gt;</span>
            <span><?php echo esc_html( $tag->name ); ?></span>
        <?php else : ?>
            <span>Shop</span>
        <?php endif; ?>
    </nav>

    <?php
    // Page heading
    ?>
    <div class="shop-header">
        <div class="shop-header__content">
            <p class="shop-header__eyebrow"><?php echo esc_html($archive_eyebrow); ?></p>
            <h1 class="shop-header__title"><?php echo esc_html($archive_title); ?></h1>
            <?php if ($archive_description) : ?>
                <p class="shop-header__description"><?php echo esc_html($archive_description); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <?php
    // Toolbar: filter toggle + sort
    ?>
    <div class="shop-toolbar">
        <div class="shop-toolbar__left">
            <p class="shop-toolbar__count" aria-live="polite">
                <strong><?php echo esc_html(number_format_i18n($listing_count)); ?> <?php echo esc_html(_n('listing', 'listings', $listing_count, 'dawp')); ?></strong>
                <span><?php esc_html_e('including promoted listings', 'dawp'); ?></span>
            </p>
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
    // Sidebar overlay (mobile bottom sheet backdrop)
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

            <div class="shop-sidebar__widget">
                <h3 class="shop-sidebar__title"><?php esc_html_e('Watches', 'dawp'); ?></h3>
                <ul class="shop-sidebar__categories">
                    <?php foreach ($shop_sidebar_links as $link) : ?>
                        <li>
                            <a
                                href="<?php echo esc_url($link['url']); ?>"
                                <?php if (!empty($link['current'])) echo 'aria-current="page"'; ?>
                            >
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php if (!empty($product_categories)) : ?>
                <div class="shop-sidebar__widget">
                    <h3 class="shop-sidebar__title"><?php esc_html_e('Popular Categories', 'dawp'); ?></h3>
                    <ul class="shop-sidebar__categories">
                        <?php foreach ($product_categories as $cat) : ?>
                            <li>
                                <a
                                    href="<?php echo esc_url(get_term_link($cat)); ?>"
                                    <?php if (is_product_category($cat->slug)) echo 'aria-current="page"'; ?>
                                >
                                    <span><?php echo esc_html($cat->name); ?></span>
                                    <span class="count"><?php echo (int) $cat->count; ?></span>
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
                    <a href="<?php echo esc_url( $shop_url ); ?>">
                        Browse all products -&gt;
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
                loadMoreBtn.style.borderRadius = '2px';
                loadMoreBtn.style.backgroundColor = '#0B0B0B';
                loadMoreBtn.style.color = '#ffffff';
                loadMoreBtn.style.fontWeight = '700';
                loadMoreBtn.style.fontSize = '0.875rem';
                loadMoreBtn.style.border = 'none';
                loadMoreBtn.style.cursor = 'pointer';
                loadMoreBtn.style.transition = 'background-color 0.2s';
                
                loadMoreBtn.onmouseover = function() { this.style.backgroundColor = '#B89B5E'; };
                loadMoreBtn.onmouseout = function() { this.style.backgroundColor = '#0B0B0B'; };

                loadMoreBtn.innerHTML = 'Load More Product';
                
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
