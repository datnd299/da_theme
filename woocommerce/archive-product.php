<?php
/**
 * Shopmivo Shop / Archive Product Template
 * Design System: Independent general merchandise store, conversion-first.
 */
defined('ABSPATH') || exit;

get_header();

global $wp_query;

$shop_url       = get_permalink(wc_get_page_id('shop'));
$queried_object = get_queried_object();
$page_title     = (is_product_category() || is_product_tag()) ? single_term_title('', false) : __('All Products', 'dawp');
$total_products = isset($wp_query->found_posts) ? (int) $wp_query->found_posts : 0;
$product_label  = $total_products === 1 ? __('product', 'dawp') : __('products', 'dawp');
$current_url    = is_product_category() || is_product_tag() ? get_term_link($queried_object) : $shop_url;
$current_url    = is_wp_error($current_url) ? $shop_url : $current_url;
$search_term    = get_search_query();
$min_price      = isset($_GET['min_price']) ? wc_clean(wp_unslash($_GET['min_price'])) : '';
$max_price      = isset($_GET['max_price']) ? wc_clean(wp_unslash($_GET['max_price'])) : '';

$uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
$exclude_terms = $uncategorized ? [(int) $uncategorized->term_id] : [];

$top_categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'exclude'    => $exclude_terms,
    'orderby'    => 'count',
    'order'      => 'DESC',
]);
$top_categories = is_wp_error($top_categories) ? [] : $top_categories;

$all_categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'exclude'    => $exclude_terms,
    'orderby'    => 'name',
    'order'      => 'ASC',
]);
$all_categories = is_wp_error($all_categories) ? [] : $all_categories;

$product_tags = get_terms([
    'taxonomy'   => 'product_tag',
    'hide_empty' => true,
    'number'     => 8,
    'orderby'    => 'count',
    'order'      => 'DESC',
]);
$product_tags = is_wp_error($product_tags) ? [] : $product_tags;

$product_type_links = [
    ['title' => __('Tools', 'dawp'), 'url' => home_url('/product-category/tools/')],
    ['title' => __('Houseware', 'dawp'), 'url' => home_url('/product-category/houseware/')],
    ['title' => __('Vehicle Service', 'dawp'), 'url' => home_url('/product-category/vehicle-service/')],
];
$vehicle_links = [
    ['title' => __('Gift and Toy', 'dawp'), 'url' => home_url('/product-category/gift-and-toy/')],
    ['title' => __('Pet Supplies', 'dawp'), 'url' => home_url('/product-category/pet-supplies/')],
    ['title' => __('Clothing and Accessories', 'dawp'), 'url' => home_url('/product-category/clothing-accessories/')],
];
$curated_category_links = array_merge($product_type_links, $vehicle_links);

$category_children = [];
foreach ($top_categories as $category) {
    $children = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => (int) $category->term_id,
        'exclude'    => $exclude_terms,
        'number'     => 4,
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);
    $category_children[$category->term_id] = is_wp_error($children) ? [] : $children;
}

$attribute_filters = [];
foreach (wc_get_attribute_taxonomies() as $attribute) {
    $taxonomy = wc_attribute_taxonomy_name($attribute->attribute_name);
    if (! taxonomy_exists($taxonomy)) {
        continue;
    }

    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => true,
        'number'     => 8,
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);

    if (! is_wp_error($terms) && ! empty($terms)) {
        $attribute_filters[] = [
            'label'    => $attribute->attribute_label,
            'taxonomy' => $taxonomy,
            'query'    => 'filter_' . sanitize_title($attribute->attribute_name),
            'terms'    => $terms,
        ];
    }
}

$featured_category_cards = [];
foreach (array_slice($top_categories, 0, 6) as $category) {
    $featured_category_cards[] = [
        'title' => $category->name,
        'url'   => get_term_link($category),
        'count' => (int) $category->count,
    ];
}
if (empty($featured_category_cards)) {
    foreach (array_slice($curated_category_links, 0, 6) as $link) {
        $featured_category_cards[] = [
            'title' => $link['title'],
            'url'   => $link['url'],
            'count' => null,
        ];
    }
}
$support_links = [
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
];

$active_filters = [];
if ($search_term) {
    $active_filters[] = sprintf(__('Search: %s', 'dawp'), $search_term);
}
if (is_product_category() || is_product_tag()) {
    $active_filters[] = $page_title;
}
if ($min_price !== '' || $max_price !== '') {
    $price_label = trim(sprintf(
        '%s%s',
        $min_price !== '' ? wc_price((float) $min_price) : __('Any', 'dawp'),
        $max_price !== '' ? ' - ' . wc_price((float) $max_price) : '+'
    ));
    $active_filters[] = sprintf(__('Price: %s', 'dawp'), wp_strip_all_tags($price_label));
}
foreach ($attribute_filters as $filter) {
    if (empty($_GET[$filter['query']])) {
        continue;
    }
    $active_slugs = array_map('sanitize_title', explode(',', wc_clean(wp_unslash($_GET[$filter['query']]))));
    foreach ($filter['terms'] as $term) {
        if (in_array($term->slug, $active_slugs, true)) {
            $active_filters[] = $filter['label'] . ': ' . $term->name;
        }
    }
}
?>

<div class="shop-page">
    <section class="shop-hero">
        <div class="shop-container shop-hero__inner">
            <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <?php if (is_product_category() || is_product_tag()) : ?>
                    <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop', 'dawp'); ?></a>
                    <span aria-hidden="true">/</span>
                    <span><?php echo esc_html($page_title); ?></span>
                <?php else : ?>
                    <span><?php esc_html_e('Shop', 'dawp'); ?></span>
                <?php endif; ?>
            </nav>

            <div class="shop-hero__grid">
                <div class="shop-hero__copy">
                    <p class="shop-eyebrow"><?php esc_html_e('Independent General Merchandise Store', 'dawp'); ?></p>
                    <h1 class="shop-hero__title"><?php echo esc_html($page_title); ?></h1>
                    <p class="shop-hero__text">
                        <?php esc_html_e('Browse Tools, Houseware, Vehicle Service, Gift and Toy, Pet Supplies, and Clothing and Accessories organized by category. Review each product page for sizing and details before ordering.', 'dawp'); ?>
                    </p>
                    <div class="shop-hero__actions">
                        <a href="#shopProducts" class="shop-btn shop-btn--primary"><?php esc_html_e('Shop Products', 'dawp'); ?></a>
                        <button type="button" class="shop-btn shop-btn--outline shop-filter-btn" id="shopFilterBtn" aria-expanded="false" aria-controls="shopSidebar">
                            <?php esc_html_e('Open Filters', 'dawp'); ?>
                        </button>
                    </div>
                </div>

                <div class="shop-hero__panel" aria-label="<?php esc_attr_e('Shop highlights', 'dawp'); ?>">
                    <div>
                        <span><?php echo esc_html(number_format_i18n($total_products)); ?></span>
                        <p><?php echo esc_html($product_label); ?></p>
                    </div>
                    <div>
                        <span><?php echo esc_html(number_format_i18n(count($all_categories))); ?></span>
                        <p><?php esc_html_e('active categories', 'dawp'); ?></p>
                    </div>
                    <div>
                        <span><?php esc_html_e('30', 'dawp'); ?></span>
                        <p><?php esc_html_e('day returns on eligible unused items', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="shop-container">
        <?php if (! empty($featured_category_cards)) : ?>
            <section class="shop-category-strip" aria-labelledby="shopCategoryStripTitle">
                <div class="shop-section-heading">
                    <p class="shop-eyebrow"><?php esc_html_e('Start With A Category', 'dawp'); ?></p>
                    <h2 id="shopCategoryStripTitle"><?php esc_html_e('Popular collections across the store', 'dawp'); ?></h2>
                </div>
                <div class="shop-category-strip__grid">
                    <?php foreach ($featured_category_cards as $card) : ?>
                        <a class="shop-category-card" href="<?php echo esc_url($card['url']); ?>">
                            <?php if ($card['count'] !== null) : ?>
                                <span class="shop-category-card__count"><?php echo esc_html(number_format_i18n((int) $card['count'])); ?></span>
                            <?php endif; ?>
                            <strong><?php echo esc_html($card['title']); ?></strong>
                            <small><?php esc_html_e('Browse collection', 'dawp'); ?></small>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <div class="shop-toolbar">
            <div class="shop-toolbar__summary">
                <strong><?php printf(esc_html__('%1$s %2$s', 'dawp'), esc_html(number_format_i18n($total_products)), esc_html($product_label)); ?></strong>
                <span><?php esc_html_e('Filter by collection, price, tags, and available product attributes.', 'dawp'); ?></span>
            </div>

            <div class="shop-toolbar__controls">
                <?php woocommerce_catalog_ordering(); ?>
            </div>
        </div>

        <?php if (! empty($active_filters)) : ?>
            <div class="shop-active-filters" aria-label="<?php esc_attr_e('Active filters', 'dawp'); ?>">
                <?php foreach ($active_filters as $filter_label) : ?>
                    <span><?php echo esc_html($filter_label); ?></span>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($current_url); ?>"><?php esc_html_e('Clear filters', 'dawp'); ?></a>
            </div>
        <?php endif; ?>

        <div class="shop-sidebar-overlay" id="shopSidebarOverlay" aria-hidden="true"></div>

        <div class="shop-layout">
            <aside class="shop-sidebar" id="shopSidebar" aria-label="<?php esc_attr_e('Product filters', 'dawp'); ?>">
                <div class="shop-sidebar__header">
                    <h2 class="shop-sidebar__mobile-title"><?php esc_html_e('Filter Products', 'dawp'); ?></h2>
                    <button type="button" class="shop-sidebar__close" id="shopSidebarClose" aria-label="<?php esc_attr_e('Close filters', 'dawp'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </button>
                </div>

                <form role="search" method="get" class="shop-filter-search" action="<?php echo esc_url($shop_url); ?>">
                    <label for="shop-filter-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <div>
                        <input id="shop-filter-search" type="search" name="s" value="<?php echo esc_attr($search_term); ?>" placeholder="<?php esc_attr_e('Tools, houseware, gifts...', 'dawp'); ?>">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit" aria-label="<?php esc_attr_e('Search products', 'dawp'); ?>">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"/>
                                <line x1="16.65" y1="16.65" x2="21" y2="21"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="shop-sidebar__widget">
                    <h3 class="shop-sidebar__title"><?php esc_html_e('Collections', 'dawp'); ?></h3>
                    <ul class="shop-sidebar__categories">
                        <li>
                            <a href="<?php echo esc_url($shop_url); ?>" <?php echo is_shop() ? 'aria-current="page"' : ''; ?>>
                                <?php esc_html_e('All Accessories', 'dawp'); ?>
                                <span class="count"><?php echo esc_html(number_format_i18n((int) wp_count_posts('product')->publish)); ?></span>
                            </a>
                        </li>
                        <?php if (! empty($top_categories)) : ?>
                            <?php foreach ($top_categories as $category) : ?>
                                <li>
                                    <a href="<?php echo esc_url(get_term_link($category)); ?>" <?php echo is_product_category($category->slug) ? 'aria-current="page"' : ''; ?>>
                                        <?php echo esc_html($category->name); ?>
                                        <span class="count"><?php echo esc_html(number_format_i18n((int) $category->count)); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php foreach ($curated_category_links as $link) : ?>
                                <li>
                                    <a href="<?php echo esc_url($link['url']); ?>">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <form method="get" class="shop-price-filter" action="<?php echo esc_url($current_url); ?>">
                    <h3 class="shop-sidebar__title"><?php esc_html_e('Price Range', 'dawp'); ?></h3>
                    <div class="shop-price-filter__fields">
                        <label>
                            <span><?php esc_html_e('Min', 'dawp'); ?></span>
                            <input type="number" min="0" step="1" name="min_price" value="<?php echo esc_attr($min_price); ?>" placeholder="0">
                        </label>
                        <label>
                            <span><?php esc_html_e('Max', 'dawp'); ?></span>
                            <input type="number" min="0" step="1" name="max_price" value="<?php echo esc_attr($max_price); ?>" placeholder="250">
                        </label>
                    </div>
                    <?php foreach ($_GET as $key => $value) :
                        if (in_array($key, ['min_price', 'max_price', 'paged'], true)) {
                            continue;
                        }
                        if (is_array($value)) {
                            continue;
                        }
                    ?>
                        <input type="hidden" name="<?php echo esc_attr(wc_clean(wp_unslash($key))); ?>" value="<?php echo esc_attr(wc_clean(wp_unslash($value))); ?>">
                    <?php endforeach; ?>
                    <button type="submit"><?php esc_html_e('Apply Price', 'dawp'); ?></button>
                </form>

                <?php foreach ($attribute_filters as $filter) : ?>
                    <div class="shop-sidebar__widget">
                        <h3 class="shop-sidebar__title"><?php echo esc_html($filter['label']); ?></h3>
                        <ul class="shop-filter-list">
                            <?php foreach ($filter['terms'] as $term) :
                                $filter_url = add_query_arg($filter['query'], $term->slug, $current_url);
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($filter_url); ?>">
                                        <?php echo esc_html($term->name); ?>
                                        <span><?php echo esc_html(number_format_i18n((int) $term->count)); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>

                <?php if (! empty($product_tags)) : ?>
                    <div class="shop-sidebar__widget">
                        <h3 class="shop-sidebar__title"><?php esc_html_e('Product Tags', 'dawp'); ?></h3>
                        <div class="shop-tag-cloud">
                            <?php foreach ($product_tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_term_link($tag)); ?>"><?php echo esc_html($tag->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="shop-sidebar__note">
                    <strong><?php esc_html_e('Before you order', 'dawp'); ?></strong>
                    <p><?php esc_html_e('Always check product photos, dimensions, materials, and included items before ordering.', 'dawp'); ?></p>
                </div>
            </aside>

            <main class="shop-main" id="shopProducts">
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
                        <p><?php esc_html_e('No products found for the selected filters.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse all products', 'dawp'); ?> &rarr;</a>
                    </div>
                <?php endif; ?>
            </main>
        </div>

        <section class="shop-collection-map" aria-labelledby="shopCollectionMapTitle">
            <div class="shop-section-heading">
                <p class="shop-eyebrow"><?php esc_html_e('Store Directory', 'dawp'); ?></p>
                <h2 id="shopCollectionMapTitle"><?php esc_html_e('All categories gathered in one place', 'dawp'); ?></h2>
            </div>
            <div class="shop-collection-map__grid">
                <?php if (! empty($top_categories)) : ?>
                    <?php foreach ($top_categories as $category) : ?>
                        <article class="shop-collection-group">
                            <a class="shop-collection-group__title" href="<?php echo esc_url(get_term_link($category)); ?>">
                                <?php echo esc_html($category->name); ?>
                                <span><?php echo esc_html(number_format_i18n((int) $category->count)); ?></span>
                            </a>
                            <?php if (! empty($category_children[$category->term_id])) : ?>
                                <ul>
                                    <?php foreach ($category_children[$category->term_id] as $child) : ?>
                                        <li><a href="<?php echo esc_url(get_term_link($child)); ?>"><?php echo esc_html($child->name); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <p><?php esc_html_e('Browse products and details in this category.', 'dawp'); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                <?php else : ?>
                    <article class="shop-collection-group">
                        <a class="shop-collection-group__title" href="<?php echo esc_url($shop_url); ?>">
                            <?php esc_html_e('Product Type', 'dawp'); ?>
                            <span><?php echo esc_html(number_format_i18n(count($product_type_links))); ?></span>
                        </a>
                        <ul>
                            <?php foreach ($product_type_links as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                    <article class="shop-collection-group">
                        <a class="shop-collection-group__title" href="<?php echo esc_url($shop_url); ?>">
                            <?php esc_html_e('More Categories', 'dawp'); ?>
                            <span><?php echo esc_html(number_format_i18n(count($vehicle_links))); ?></span>
                        </a>
                        <ul>
                            <?php foreach ($vehicle_links as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                    <article class="shop-collection-group">
                        <a class="shop-collection-group__title" href="<?php echo esc_url(home_url('/faq/')); ?>">
                            <?php esc_html_e('Shopping Support', 'dawp'); ?>
                            <span><?php echo esc_html(number_format_i18n(count($support_links))); ?></span>
                        </a>
                        <ul>
                            <?php foreach ($support_links as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endif; ?>
            </div>
        </section>

        <section class="shop-info-grid" aria-label="<?php esc_attr_e('Shopping support', 'dawp'); ?>">
            <article>
                <span><?php esc_html_e('01', 'dawp'); ?></span>
                <h2><?php esc_html_e('Shop by category', 'dawp'); ?></h2>
                <p><?php esc_html_e('Use the category links to start broadly, then narrow by collection, price, tag, or product attribute when available.', 'dawp'); ?></p>
                <div class="shop-link-list">
                    <?php foreach ($vehicle_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                    <?php endforeach; ?>
                </div>
            </article>
            <article>
                <span><?php esc_html_e('02', 'dawp'); ?></span>
                <h2><?php esc_html_e('Review details before you buy', 'dawp'); ?></h2>
                <p><?php esc_html_e('Check dimensions, material, finish, included items, and return condition before ordering.', 'dawp'); ?></p>
            </article>
            <article>
                <span><?php esc_html_e('03', 'dawp'); ?></span>
                <h2><?php esc_html_e('Support and policies', 'dawp'); ?></h2>
                <p><?php esc_html_e('Find shipping, returns, tracking, and common order questions from the support pages below.', 'dawp'); ?></p>
                <div class="shop-link-list">
                    <?php foreach ($support_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                    <?php endforeach; ?>
                </div>
            </article>
        </section>
    </div>
</div>

<script>
(function () {
    var filterBtn = document.getElementById('shopFilterBtn');
    var sidebar = document.getElementById('shopSidebar');
    var overlay = document.getElementById('shopSidebarOverlay');
    var closeBtn = document.getElementById('shopSidebarClose');

    function openSidebar() {
        if (!sidebar || !overlay || !filterBtn) return;
        sidebar.classList.add('is-open');
        overlay.classList.add('is-open');
        overlay.removeAttribute('aria-hidden');
        filterBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        if (!sidebar || !overlay || !filterBtn) return;
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        filterBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (filterBtn) filterBtn.addEventListener('click', openSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && sidebar && sidebar.classList.contains('is-open')) {
            closeSidebar();
        }
    });
})();
</script>

<?php get_footer(); ?>
