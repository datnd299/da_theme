<?php
/**
 * Shop / product archive template.
 */
defined('ABSPATH') || exit;

get_header();

$shop_url       = get_permalink(wc_get_page_id('shop'));
$queried_object = get_queried_object();
$is_term_page   = is_product_category() || is_product_tag();
$archive_title  = $is_term_page ? single_term_title('', false) : __('Formal Footwear Collection', 'dawp');
$archive_desc   = $is_term_page ? term_description() : __('Explore polished dress shoes selected for office wear, formal occasions, and smart casual wardrobes.', 'dawp');
$archive_desc   = trim(wp_strip_all_tags($archive_desc));

if (empty($archive_desc)) {
    $archive_desc = __('Refined Oxford shoes, brogues, loafers, and monk strap styles with clear product details, fit notes, and reliable checkout.', 'dawp');
}

$hero_image = '';
if (is_product_category() && isset($queried_object->term_id)) {
    $thumbnail_id = get_term_meta($queried_object->term_id, 'thumbnail_id', true);
    if ($thumbnail_id) {
        $hero_image = wp_get_attachment_image_url($thumbnail_id, 'large');
    }
}

$uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
$exclude_terms = $uncategorized ? [(int) $uncategorized->term_id] : [];
$categories    = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'exclude'    => $exclude_terms,
]);

global $wp_query;
$total_products = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;

$current_min_price = isset($_GET['min_price']) ? wc_clean(wp_unslash($_GET['min_price'])) : '';
$current_max_price = isset($_GET['max_price']) ? wc_clean(wp_unslash($_GET['max_price'])) : '';
$current_min_price = is_numeric($current_min_price) ? $current_min_price : '';
$current_max_price = is_numeric($current_max_price) ? $current_max_price : '';
$has_price_filter  = $current_min_price !== '' || $current_max_price !== '';
$price_action_url  = $is_term_page && !is_wp_error($queried_object) ? get_term_link($queried_object) : $shop_url;
$price_action_url  = is_wp_error($price_action_url) ? $shop_url : $price_action_url;
$clear_price_url   = remove_query_arg(['min_price', 'max_price', 'paged']);
?>

<div class="shop-page">
    <div class="shop-container">

        <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <?php if ($is_term_page) : ?>
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php echo esc_html($archive_title); ?></span>
            <?php else : ?>
                <span><?php esc_html_e('Shop', 'dawp'); ?></span>
            <?php endif; ?>
        </nav>

        <header class="shop-hero<?php echo $hero_image ? ' shop-hero--with-image' : ''; ?>">
            <div class="shop-hero__content">
                <span class="shop-hero__eyebrow"><?php esc_html_e('Handed Shoes', 'dawp'); ?></span>
                <h1 class="shop-hero__title"><?php echo esc_html($archive_title); ?></h1>
                <p class="shop-hero__desc"><?php echo esc_html($archive_desc); ?></p>
                <div class="shop-hero__actions" aria-label="<?php esc_attr_e('Shopping benefits', 'dawp'); ?>">
                    <span><?php esc_html_e('Secure Checkout', 'dawp'); ?></span>
                    <span><?php esc_html_e('Tracking Included', 'dawp'); ?></span>
                    <span><?php esc_html_e('30-Day Returns', 'dawp'); ?></span>
                </div>
            </div>

            <div class="shop-hero__panel">
                <?php if ($hero_image) : ?>
                    <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($archive_title); ?>" loading="eager">
                <?php else : ?>
                    <div class="shop-hero__stat">
                        <strong><?php echo esc_html(number_format_i18n($total_products)); ?></strong>
                        <span><?php esc_html_e('available styles', 'dawp'); ?></span>
                    </div>
                    <div class="shop-hero__notes">
                        <span><?php esc_html_e('Fit notes', 'dawp'); ?></span>
                        <span><?php esc_html_e('Material details', 'dawp'); ?></span>
                        <span><?php esc_html_e('Care guidance', 'dawp'); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
            <section class="shop-category-strip" aria-label="<?php esc_attr_e('Product categories', 'dawp'); ?>">
                <a class="shop-category-chip<?php echo is_shop() ? ' is-active' : ''; ?>" href="<?php echo esc_url($shop_url); ?>">
                    <span><?php esc_html_e('All Products', 'dawp'); ?></span>
                    <small><?php echo esc_html(number_format_i18n($total_products)); ?></small>
                </a>
                <?php foreach ($categories as $cat) : ?>
                    <a class="shop-category-chip<?php echo is_product_category($cat->slug) ? ' is-active' : ''; ?>" href="<?php echo esc_url(get_term_link($cat)); ?>">
                        <span><?php echo esc_html($cat->name); ?></span>
                        <small><?php echo esc_html(number_format_i18n((int) $cat->count)); ?></small>
                    </a>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <div class="shop-toolbar">
            <div class="shop-toolbar__left">
                <span class="shop-toolbar__count">
                    <?php
                    printf(
                        esc_html(_n('%s product', '%s products', $total_products, 'dawp')),
                        esc_html(number_format_i18n($total_products))
                    );
                    ?>
                </span>
                <button class="shop-filter-btn" id="shopFilterBtn" aria-expanded="false" aria-controls="shopSidebar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <line x1="4" y1="6" x2="20" y2="6"/>
                        <line x1="8" y1="12" x2="20" y2="12"/>
                        <line x1="12" y1="18" x2="20" y2="18"/>
                    </svg>
                    <span><?php esc_html_e('Filter', 'dawp'); ?></span>
                </button>
            </div>

            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <div class="shop-sidebar-overlay" id="shopSidebarOverlay" aria-hidden="true"></div>

        <div class="shop-layout">
            <aside class="shop-sidebar" id="shopSidebar" aria-label="<?php esc_attr_e('Product filters', 'dawp'); ?>">
                <div class="shop-sidebar__header">
                    <h2 class="shop-sidebar__mobile-title"><?php esc_html_e('Filter Products', 'dawp'); ?></h2>
                    <button class="shop-sidebar__close" id="shopSidebarClose" aria-label="<?php esc_attr_e('Close filters', 'dawp'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </button>
                </div>

                <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                    <div class="shop-sidebar__widget">
                        <h3 class="shop-sidebar__title"><?php esc_html_e('Collections', 'dawp'); ?></h3>
                        <ul class="shop-sidebar__categories">
                            <li>
                                <a href="<?php echo esc_url($shop_url); ?>" <?php echo is_shop() ? 'aria-current="page"' : ''; ?>>
                                    <span><?php esc_html_e('All Products', 'dawp'); ?></span>
                                    <span class="count"><?php echo esc_html(number_format_i18n($total_products)); ?></span>
                                </a>
                            </li>
                            <?php foreach ($categories as $cat) : ?>
                                <li>
                                    <a href="<?php echo esc_url(get_term_link($cat)); ?>" <?php echo is_product_category($cat->slug) ? 'aria-current="page"' : ''; ?>>
                                        <span><?php echo esc_html($cat->name); ?></span>
                                        <span class="count"><?php echo esc_html(number_format_i18n((int) $cat->count)); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="shop-sidebar__widget">
                    <h3 class="shop-sidebar__title"><?php esc_html_e('Filter by Price', 'dawp'); ?></h3>
                    <form class="shop-price-filter" method="get" action="<?php echo esc_url($price_action_url); ?>">
                        <div class="shop-price-filter__fields">
                            <label>
                                <span><?php esc_html_e('Min', 'dawp'); ?></span>
                                <input
                                    type="number"
                                    name="min_price"
                                    min="0"
                                    step="1"
                                    inputmode="numeric"
                                    value="<?php echo esc_attr($current_min_price); ?>"
                                    placeholder="<?php esc_attr_e('0', 'dawp'); ?>"
                                >
                            </label>
                            <label>
                                <span><?php esc_html_e('Max', 'dawp'); ?></span>
                                <input
                                    type="number"
                                    name="max_price"
                                    min="0"
                                    step="1"
                                    inputmode="numeric"
                                    value="<?php echo esc_attr($current_max_price); ?>"
                                    placeholder="<?php esc_attr_e('Any', 'dawp'); ?>"
                                >
                            </label>
                        </div>

                        <?php foreach (['orderby', 's', 'post_type'] as $preserved_arg) : ?>
                            <?php
                            if (!isset($_GET[$preserved_arg]) || is_array($_GET[$preserved_arg]) || $_GET[$preserved_arg] === '') {
                                continue;
                            }

                            $preserved_value = wc_clean(wp_unslash($_GET[$preserved_arg]));
                            ?>
                            <input type="hidden" name="<?php echo esc_attr($preserved_arg); ?>" value="<?php echo esc_attr($preserved_value); ?>">
                        <?php endforeach; ?>

                        <div class="shop-price-filter__actions">
                            <button type="submit"><?php esc_html_e('Apply Price', 'dawp'); ?></button>
                            <?php if ($has_price_filter) : ?>
                                <a href="<?php echo esc_url($clear_price_url); ?>"><?php esc_html_e('Clear', 'dawp'); ?></a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>

                <?php if (is_active_sidebar('shop-sidebar')) : ?>
                    <?php dynamic_sidebar('shop-sidebar'); ?>
                <?php endif; ?>
            </aside>

            <main class="shop-main" id="main-content">
                <?php if (woocommerce_product_loop()) : ?>
                    <?php woocommerce_product_loop_start(); ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                    <?php woocommerce_product_loop_end(); ?>

                    <div class="shop-pagination">
                        <?php do_action('woocommerce_after_shop_loop'); ?>
                    </div>
                <?php else : ?>
                    <div class="shop-empty">
                        <p><?php esc_html_e('No products found in this collection.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse all products', 'dawp'); ?></a>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>
</div>

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
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        filterBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    filterBtn.addEventListener('click', openSidebar);
    overlay.addEventListener('click', closeSidebar);

    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && sidebar.classList.contains('is-open')) {
            closeSidebar();
        }
    });
})();
</script>

<?php get_footer(); ?>
