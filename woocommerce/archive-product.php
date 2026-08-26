<?php
/**
 * Shop and product taxonomy archives.
 */
defined('ABSPATH') || exit;

get_header();

$shop_page_id = wc_get_page_id('shop');
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$term         = is_product_category() || is_product_tag() ? get_queried_object() : null;
$title        = woocommerce_page_title(false);
$description  = '';

if ($term && !is_wp_error($term)) {
    $description = term_description($term->term_id, $term->taxonomy);
} elseif ($shop_page_id > 0) {
    $shop_page = get_post($shop_page_id);
    $description = $shop_page ? apply_filters('the_content', $shop_page->post_excerpt ?: $shop_page->post_content) : '';
}

$description = wp_trim_words(wp_strip_all_tags($description), 28, '...');
$categories  = function_exists('dawp_lbq_product_category_terms') ? dawp_lbq_product_category_terms() : [];
?>

<main class="shop-page" id="main-content">
    <div class="shop-shell">
        <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <?php if (is_product_category() || is_product_tag()) : ?>
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php echo esc_html($title); ?></span>
            <?php else : ?>
                <span><?php esc_html_e('Shop', 'dawp'); ?></span>
            <?php endif; ?>
        </nav>

        <header class="shop-heading">
            <div>
                <h1><?php echo esc_html($title); ?></h1>
                <?php if ($description) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
        </header>

        <div class="shop-controls" aria-label="<?php esc_attr_e('Catalog controls', 'dawp'); ?>">
            <div class="shop-controls__left">
                <button class="shop-filter-toggle" type="button" aria-expanded="false" aria-controls="shopFilters">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 6h16M7 12h10M10 18h4"/>
                    </svg>
                    <span><?php esc_html_e('Filters', 'dawp'); ?></span>
                </button>
                <?php woocommerce_result_count(); ?>
            </div>
            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <div class="shop-filter-overlay" data-shop-filter-overlay hidden></div>

        <div class="shop-layout">
            <aside class="shop-filters" id="shopFilters" aria-label="<?php esc_attr_e('Product filters', 'dawp'); ?>">
                <div class="shop-filters__head">
                    <strong><?php esc_html_e('Filters', 'dawp'); ?></strong>
                    <button class="shop-filter-close" type="button" aria-label="<?php esc_attr_e('Close filters', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M18 6 6 18M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                    <section class="shop-filter-group">
                        <h2><?php esc_html_e('Category', 'dawp'); ?></h2>
                        <ul class="shop-category-list">
                            <li>
                                <a href="<?php echo esc_url($shop_url); ?>" <?php echo is_shop() ? 'aria-current="page"' : ''; ?>>
                                    <span><?php esc_html_e('All Products', 'dawp'); ?></span>
                                </a>
                            </li>
                            <?php foreach ($categories as $category) : ?>
                                <li>
                                    <a href="<?php echo esc_url(get_term_link($category)); ?>" <?php echo is_product_category($category->slug) ? 'aria-current="page"' : ''; ?>>
                                        <span><?php echo esc_html($category->name); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                <?php endif; ?>

                <?php if (is_active_sidebar('shop-sidebar')) : ?>
                    <?php dynamic_sidebar('shop-sidebar'); ?>
                <?php endif; ?>
            </aside>

            <section class="shop-products" aria-label="<?php esc_attr_e('Products', 'dawp'); ?>">
                <?php if (woocommerce_product_loop()) : ?>
                    <?php do_action('woocommerce_before_shop_loop'); ?>
                    <?php woocommerce_product_loop_start(); ?>
                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                    <?php woocommerce_product_loop_end(); ?>
                    <?php do_action('woocommerce_after_shop_loop'); ?>
                <?php else : ?>
                    <?php do_action('woocommerce_no_products_found'); ?>
                <?php endif; ?>
            </section>
        </div>
    </div>
</main>

<script>
(function () {
    var toggle = document.querySelector('.shop-filter-toggle');
    var panel = document.getElementById('shopFilters');
    var close = document.querySelector('.shop-filter-close');
    var overlay = document.querySelector('[data-shop-filter-overlay]');

    if (!toggle || !panel || !overlay) {
        return;
    }

    function setOpen(isOpen) {
        panel.classList.toggle('is-open', isOpen);
        overlay.hidden = !isOpen;
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        document.documentElement.classList.toggle('shop-filter-is-open', isOpen);
    }

    toggle.addEventListener('click', function () {
        setOpen(true);
    });

    if (close) {
        close.addEventListener('click', function () {
            setOpen(false);
        });
    }

    overlay.addEventListener('click', function () {
        setOpen(false);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });
})();
</script>

<?php get_footer(); ?>
