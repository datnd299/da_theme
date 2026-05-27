<?php
/**
 * Product archive and category template.
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$term         = is_product_taxonomy() ? get_queried_object() : null;
$title        = is_shop() ? get_the_title($shop_page_id) : woocommerce_page_title(false);
$description  = '';
$children     = [];
$has_filters  = is_active_sidebar('shop-sidebar');

if ($term instanceof WP_Term) {
    $description = term_description($term->term_id, $term->taxonomy);

    if ('product_cat' === $term->taxonomy) {
        $children = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => $term->term_id,
        ]);
    }
}

if (empty($children) || is_wp_error($children)) {
    $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
    $exclude       = $uncategorized instanceof WP_Term ? [$uncategorized->term_id] : [];
    $children      = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'exclude'    => $exclude,
        'number'     => 8,
    ]);
}
?>

<main class="shop-page" id="main-content">
    <div class="shop-container">
        <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'woocommerce'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span aria-hidden="true">/</span>
            <?php if (is_shop()) : ?>
                <span aria-current="page">Shop</span>
            <?php else : ?>
                <a href="<?php echo esc_url($shop_url); ?>">Shop</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page"><?php echo esc_html($title); ?></span>
            <?php endif; ?>
        </nav>

        <header class="shop-hero">
            <div class="shop-hero__content">
                <p class="shop-hero__eyebrow">Product Collection</p>
                <h1 class="shop-hero__title"><?php echo esc_html($title ?: __('Products', 'woocommerce')); ?></h1>
                <?php if ($description) : ?>
                    <div class="shop-hero__description">
                        <?php echo wp_kses_post(wpautop($description)); ?>
                    </div>
                <?php else : ?>
                    <p class="shop-hero__description">Explore selected handmade leather footwear with a clear, simple shopping layout.</p>
                <?php endif; ?>
            </div>

            <div class="shop-hero__summary" aria-label="Collection overview">
                <span class="shop-hero__count">
                    <?php
                    global $wp_query;
                    printf(
                        esc_html(_n('%d product', '%d products', (int) $wp_query->found_posts, 'woocommerce')),
                        (int) $wp_query->found_posts
                    );
                    ?>
                </span>
            </div>
        </header>

        <?php if (!empty($children) && !is_wp_error($children)) : ?>
            <section class="shop-categories" aria-label="Product categories">
                <a class="shop-category-chip<?php echo is_shop() ? ' is-active' : ''; ?>" href="<?php echo esc_url($shop_url); ?>">
                    All
                </a>
                <?php foreach ($children as $child) : ?>
                    <a
                        class="shop-category-chip<?php echo is_product_category($child->slug) ? ' is-active' : ''; ?>"
                        href="<?php echo esc_url(get_term_link($child)); ?>"
                    >
                        <span><?php echo esc_html($child->name); ?></span>
                        <small><?php echo (int) $child->count; ?></small>
                    </a>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <div class="shop-toolbar">
            <div class="shop-toolbar__left">
                <?php if ($has_filters) : ?>
                    <button class="shop-filter-btn" id="shopFilterBtn" type="button" aria-expanded="false" aria-controls="shopSidebar">
                        <span>Filter</span>
                    </button>
                <?php endif; ?>
                <span class="shop-toolbar__count">
                    <?php woocommerce_result_count(); ?>
                </span>
            </div>

            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <?php if ($has_filters) : ?>
            <div class="shop-sidebar-overlay" id="shopSidebarOverlay" aria-hidden="true"></div>
        <?php endif; ?>

        <div class="shop-layout<?php echo $has_filters ? ' has-sidebar' : ''; ?>">
            <?php if ($has_filters) : ?>
                <aside class="shop-sidebar" id="shopSidebar" aria-label="Product filters">
                    <div class="shop-sidebar__header">
                        <h2 class="shop-sidebar__mobile-title">Filters</h2>
                        <button class="shop-sidebar__close" id="shopSidebarClose" type="button" aria-label="Close filters">x</button>
                    </div>
                    <?php dynamic_sidebar('shop-sidebar'); ?>
                </aside>
            <?php endif; ?>

            <section class="shop-main" aria-label="Product list">
                <?php if (woocommerce_product_loop()) : ?>
                    <?php woocommerce_product_loop_start(); ?>
                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                    <?php woocommerce_product_loop_end(); ?>

                    <div class="shop-pagination">
                        <?php woocommerce_pagination(); ?>
                    </div>
                <?php else : ?>
                    <div class="shop-empty">
                        <h2>No products found</h2>
                        <p>This collection does not have matching products yet.</p>
                        <a href="<?php echo esc_url($shop_url); ?>">View all products</a>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </div>
</main>

<?php if ($has_filters) : ?>
<script>
(function () {
    var filterBtn = document.getElementById('shopFilterBtn');
    var sidebar = document.getElementById('shopSidebar');
    var overlay = document.getElementById('shopSidebarOverlay');
    var closeBtn = document.getElementById('shopSidebarClose');

    if (!filterBtn || !sidebar || !overlay) {
        return;
    }

    function openSidebar() {
        sidebar.classList.add('is-open');
        overlay.classList.add('is-open');
        overlay.removeAttribute('aria-hidden');
        filterBtn.setAttribute('aria-expanded', 'true');
        document.body.classList.add('shop-filter-open');
    }

    function closeSidebar() {
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        filterBtn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('shop-filter-open');
    }

    filterBtn.addEventListener('click', openSidebar);
    overlay.addEventListener('click', closeSidebar);
    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeSidebar();
        }
    });
})();
</script>
<?php endif; ?>

<?php get_footer(); ?>
