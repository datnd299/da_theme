<?php
/**
 * Clean shop and product taxonomy archive template.
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$term         = (is_product_category() || is_product_tag()) ? get_queried_object() : null;

$title       = is_shop() ? __('Shop', 'dawp') : woocommerce_page_title(false);
$description = __('Browse practical home, lifestyle, office, outdoor, pet, beauty and electronics essentials.', 'dawp');
$eyebrow     = __('Catalog', 'dawp');

if ($term && !is_wp_error($term)) {
    $term_description = term_description($term->term_id, $term->taxonomy);
    $description      = $term_description ? wp_strip_all_tags($term_description) : $description;
    $eyebrow          = is_product_tag() ? __('Product Tag', 'dawp') : __('Product Category', 'dawp');
}

$categories = function_exists('dawp_lbq_product_category_terms') ? dawp_lbq_product_category_terms() : [];
$total      = isset($GLOBALS['wp_query']->found_posts) ? (int) $GLOBALS['wp_query']->found_posts : 0;
?>

<main class="shop-page" id="main-content">
    <div class="shop-container">
        <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <?php if (is_shop()) : ?>
                <span><?php esc_html_e('Shop', 'dawp'); ?></span>
            <?php else : ?>
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php echo esc_html($title); ?></span>
            <?php endif; ?>
        </nav>

        <section class="shop-hero" aria-labelledby="shop-title">
            <div>
                <p class="shop-hero__eyebrow"><?php echo esc_html($eyebrow); ?></p>
                <h1 class="shop-hero__title" id="shop-title"><?php echo esc_html($title); ?></h1>
                <?php if ($description) : ?>
                    <p class="shop-hero__description"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
            <div class="shop-hero__stats" aria-label="<?php esc_attr_e('Catalog summary', 'dawp'); ?>">
                <strong><?php echo esc_html(number_format_i18n($total)); ?></strong>
                <span><?php echo esc_html(_n('product', 'products', $total, 'dawp')); ?></span>
            </div>
        </section>

        <div class="shop-toolbar">
            <button class="shop-filter-toggle" type="button" aria-expanded="false" aria-controls="shopFilters">
                <span aria-hidden="true">Filter</span>
                <?php esc_html_e('Categories', 'dawp'); ?>
            </button>
            <p class="shop-toolbar__count">
                <?php
                printf(
                    esc_html(_n('%s product found', '%s products found', $total, 'dawp')),
                    esc_html(number_format_i18n($total))
                );
                ?>
            </p>
            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <div class="shop-drawer-backdrop" data-shop-close hidden></div>

        <div class="shop-layout">
            <aside class="shop-filters" id="shopFilters" aria-label="<?php esc_attr_e('Shop categories and filters', 'dawp'); ?>">
                <div class="shop-filters__head">
                    <h2><?php esc_html_e('Categories', 'dawp'); ?></h2>
                    <button class="shop-filters__close" type="button" data-shop-close aria-label="<?php esc_attr_e('Close filters', 'dawp'); ?>">x</button>
                </div>

                <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                    <ul class="shop-category-list">
                        <li>
                            <a href="<?php echo esc_url($shop_url); ?>" <?php echo is_shop() ? 'aria-current="page"' : ''; ?>>
                                <span><?php esc_html_e('All Products', 'dawp'); ?></span>
                                <small><?php echo esc_html(number_format_i18n($total)); ?></small>
                            </a>
                        </li>
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <a href="<?php echo esc_url(get_term_link($category)); ?>" <?php echo is_product_category($category->slug) ? 'aria-current="page"' : ''; ?>>
                                    <span><?php echo esc_html($category->name); ?></span>
                                    <small><?php echo esc_html(number_format_i18n((int) $category->count)); ?></small>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (is_active_sidebar('shop-sidebar')) : ?>
                    <div class="shop-widget-area">
                        <?php dynamic_sidebar('shop-sidebar'); ?>
                    </div>
                <?php endif; ?>
            </aside>

            <section class="shop-results" aria-label="<?php esc_attr_e('Products', 'dawp'); ?>">
                <?php if (woocommerce_product_loop()) : ?>
                    <?php do_action('woocommerce_before_shop_loop'); ?>

                    <ul class="products shop-products">
                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                    </ul>

                    <div class="shop-pagination">
                        <?php do_action('woocommerce_after_shop_loop'); ?>
                    </div>
                <?php else : ?>
                    <div class="shop-empty">
                        <?php do_action('woocommerce_no_products_found'); ?>
                        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Back to all products', 'dawp'); ?></a>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </div>
</main>

<script>
(function () {
    var toggle = document.querySelector('.shop-filter-toggle');
    var filters = document.getElementById('shopFilters');
    var closers = document.querySelectorAll('[data-shop-close]');

    if (!toggle || !filters) {
        return;
    }

    function setOpen(isOpen) {
        document.body.classList.toggle('shop-filter-open', isOpen);
        filters.classList.toggle('is-open', isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        closers.forEach(function (closer) {
            if (closer.classList.contains('shop-drawer-backdrop')) {
                closer.hidden = !isOpen;
            }
        });
    }

    toggle.addEventListener('click', function () {
        setOpen(!filters.classList.contains('is-open'));
    });

    closers.forEach(function (closer) {
        closer.addEventListener('click', function () {
            setOpen(false);
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });
})();
</script>

<?php
get_footer();
