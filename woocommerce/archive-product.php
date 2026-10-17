<?php
/**
 * ProudlyWear — Shop / Archive Product Template
 * Design System: Heritage Patriotic, conversion-first
 * Section 10: Category / Shop Page rules
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$archive_term = (is_product_category() || is_product_tag()) ? get_queried_object() : null;
$archive_title = __('All Products', 'dawp');
$archive_description = __('Veteran and military family apparel — tees, hoodies, polos, caps, flags and metal signs with original patriotic designs, every piece printed to order.', 'dawp');
$archive_eyebrow = __('ProudlyWear Collection', 'dawp');

if ($archive_term && !is_wp_error($archive_term)) {
    $archive_title = $archive_term->name;
    $term_description = term_description($archive_term->term_id, $archive_term->taxonomy);
    $archive_description = $term_description ? wp_strip_all_tags($term_description) : $archive_description;
    $archive_eyebrow = is_product_tag() ? __('Shop By Tag', 'dawp') : __('Shop By Category', 'dawp');
}

global $wp_query;
$archive_total = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;
$category_chips = [];

// Only the main product-type categories (same list as the header "Products" menu)
foreach (dawp_main_product_categories() as $slug => $label) {
    $term = get_term_by('slug', $slug, 'product_cat');

    if (!$term || is_wp_error($term) || (int) $term->count === 0) {
        continue;
    }

    $term_link = get_term_link($term);

    if (is_wp_error($term_link)) {
        continue;
    }

    $category_chips[] = [
        'name'    => $label,
        'slug'    => $term->slug,
        'url'     => $term_link,
        'count'   => (int) $term->count,
        'current' => is_product_category($term->slug),
    ];
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

            <?php // 1. Search (FiboSearch) ?>
            <div class="shop-sidebar__widget shop-sidebar__search">
                <h3 class="shop-sidebar__title"><?php esc_html_e('Search', 'dawp'); ?></h3>
                <?php
                if (shortcode_exists('fibosearch')) {
                    echo do_shortcode('[fibosearch layout="classic" style="solaris" submit_btn="1" mobile_overlay="0" darken_bg="0"]');
                } else {
                    get_product_search_form();
                }
                ?>
            </div>

            <?php // 2. Main product-type categories ?>
            <?php if (!empty($category_chips)) : ?>
            <div class="shop-sidebar__widget">
                <h3 class="shop-sidebar__title"><?php esc_html_e('Categories', 'dawp'); ?></h3>
                <ul class="shop-sidebar__categories">
                    <li>
                        <a href="<?php echo esc_url($shop_url); ?>" <?php if (is_shop()) echo 'aria-current="page"'; ?>>
                            <?php esc_html_e('All Products', 'dawp'); ?>
                        </a>
                    </li>
                    <?php foreach ($category_chips as $chip) : ?>
                        <li>
                            <a href="<?php echo esc_url($chip['url']); ?>" <?php if ($chip['current']) echo 'aria-current="page"'; ?>>
                                <?php echo esc_html($chip['name']); ?>
                                <span class="count">(<?php echo (int) $chip['count']; ?>)</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php
            // 3. Global attributes — WooCommerce layered nav (?filter_{attr}=slug,slug)
            $filter_groups = dawp_shop_filter_attributes();
            $filter_base   = ($archive_term && !is_wp_error($archive_term)) ? get_term_link($archive_term) : $shop_url;
            $kept_args     = [];
            foreach ($_GET as $arg => $value) {
                if (is_string($value) && preg_match('/^(filter_|query_type_|orderby$|min_price$|max_price$|s$|post_type$)/', $arg)) {
                    $kept_args[sanitize_key($arg)] = sanitize_text_field(wp_unslash($value));
                }
            }
            $has_active_filters = (bool) preg_grep('/^filter_/', array_keys($kept_args));

            foreach ($filter_groups as $group) :
                $chosen = isset($kept_args[$group['key']]) ? array_filter(explode(',', $kept_args[$group['key']])) : [];
                $query_type_key = 'query_type_' . substr($group['key'], 7);
                ?>
                <details class="shop-sidebar__widget shop-filter" <?php echo $chosen ? 'open' : ''; ?>>
                    <summary class="shop-sidebar__title shop-filter__toggle"><?php echo esc_html($group['label']); ?></summary>
                    <ul class="shop-sidebar__categories shop-filter__list">
                        <?php foreach ($group['terms'] as $term) :
                            $is_chosen = in_array($term->slug, $chosen, true);
                            $next      = $is_chosen ? array_diff($chosen, [$term->slug]) : array_merge($chosen, [$term->slug]);
                            $args      = $kept_args;
                            unset($args[$group['key']], $args[$query_type_key]);
                            if ($next) {
                                $args[$group['key']]   = implode(',', $next);
                                $args[$query_type_key] = 'or';
                            }
                            ?>
                            <li>
                                <a
                                    href="<?php echo esc_url(add_query_arg($args, $filter_base)); ?>"
                                    rel="nofollow"
                                    <?php if ($is_chosen) echo 'aria-current="true"'; ?>
                                >
                                    <span class="shop-filter__check" aria-hidden="true"></span>
                                    <span class="shop-filter__name"><?php echo esc_html($term->name); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </details>
            <?php endforeach; ?>

            <?php if ($has_active_filters) :
                $clear_args = array_filter($kept_args, static function ($arg) {
                    return !preg_match('/^(filter_|query_type_)/', $arg);
                }, ARRAY_FILTER_USE_KEY);
                ?>
                <a class="button shop-filter__clear" href="<?php echo esc_url(add_query_arg($clear_args, $filter_base)); ?>">
                    <?php esc_html_e('Clear filters', 'dawp'); ?>
                </a>
            <?php endif; ?>
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
