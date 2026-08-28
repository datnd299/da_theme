<?php
/**
 * Reluxwatches - Shop / Archive Product Template
 * Design System: Modern watches, conversion-first
 * Section 10: Category / Shop Page rules
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$archive_term = (is_product_category() || is_product_tag()) ? get_queried_object() : null;
$archive_title = __('All Products', 'dawp');
$archive_description = __('Browse modern watches, statement pieces, minimal styles, sport watches and accessories from Reluxwatches.', 'dawp');
$archive_eyebrow = __('Reluxwatches Collection', 'dawp');
$archive_slug = 'shop';
$home_image = static function ($filename) {
    return get_theme_file_uri('assets/img/home/' . $filename);
};
$new_home_image = static function ($filename) {
    return get_theme_file_uri('assets/img/New_homepage/' . $filename);
};
$imagewatch = static function ($filename) {
    return get_theme_file_uri('assets/img/imagewatch/' . $filename);
};

$shop_cover_images = [
    'shop' => [
        'url' => $imagewatch('1.png'),
        'alt' => __('Modern Reluxwatches collection cover', 'dawp'),
    ],
    'watches' => [
        'url' => $imagewatch('2.png'),
        'alt' => __('Modern everyday watches collection', 'dawp'),
    ],
    'new-arrivals' => [
        'url' => $imagewatch('3.png'),
        'alt' => __('New Reluxwatches arrivals', 'dawp'),
    ],
    'minimal' => [
        'url' => $imagewatch('4.png'),
        'alt' => __('Minimal watch collection', 'dawp'),
    ],
    'sport' => [
        'url' => $imagewatch('5.png'),
        'alt' => __('Sport watch collection', 'dawp'),
    ],
    'statement' => [
        'url' => $imagewatch('6.png'),
        'alt' => __('Statement watch collection', 'dawp'),
    ],
    'accessories' => [
        'url' => $imagewatch('7.png'),
        'alt' => __('Watch accessories and details collection', 'dawp'),
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
?>

<div class="shop-page">
<div class="shop-container">

    <?php
    // Breadcrumb
    ?>
    <nav class="shop-breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
        <span aria-hidden="true">&rsaquo;</span>
        <?php if ( is_product_category() ) :
            $cat = get_queried_object(); ?>
            <a href="<?php echo esc_url( $shop_url ); ?>">Shop</a>
            <span aria-hidden="true">&rsaquo;</span>
            <span><?php echo esc_html( $cat->name ); ?></span>
        <?php elseif ( is_product_tag() ) :
            $tag = get_queried_object(); ?>
            <a href="<?php echo esc_url( $shop_url ); ?>">Shop</a>
            <span aria-hidden="true">&rsaquo;</span>
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
        </div>

        <?php woocommerce_catalog_ordering(); ?>
    </div>

    <?php
    // Layout
    ?>
    <div class="shop-layout">

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
                loadMoreBtn.style.backgroundColor = '#405447';
                loadMoreBtn.style.color = '#ffffff';
                loadMoreBtn.style.fontWeight = '700';
                loadMoreBtn.style.fontSize = '0.875rem';
                loadMoreBtn.style.border = 'none';
                loadMoreBtn.style.cursor = 'pointer';
                loadMoreBtn.style.transition = 'background-color 0.2s';
                
                loadMoreBtn.onmouseover = function() { this.style.backgroundColor = '#2F3F35'; };
                loadMoreBtn.onmouseout = function() { this.style.backgroundColor = '#405447'; };

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
