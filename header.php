<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$home_url       = home_url('/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url       = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$checkout_url   = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/');
$wishlist_url   = home_url('/wishlist/');
$cart_count     = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$current_path   = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$logo_path      = get_template_directory() . '/assets/img/about/Logosite (1).png';
$logo_url       = get_template_directory_uri() . '/assets/img/about/Logosite (1).png';
$feature_image  = function_exists('dawp_home_image_url') ? dawp_home_image_url('6.png') : get_template_directory_uri() . '/assets/img/homepage/brickgo/6.png';
$feature_path   = get_template_directory() . '/assets/img/homepage/brickgo/6.png';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

if (file_exists($feature_path)) {
    $feature_image = add_query_arg('ver', filemtime($feature_path), $feature_image);
}

$is_shop_context = (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product());
$nav_items = [
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'active' => $is_shop_context, 'mega' => true],
    ['title' => __('New Drops', 'dawp'), 'url' => home_url('/new-drops/'), 'active' => 'new-drops' === $current_path],
    ['title' => __('Collections', 'dawp'), 'url' => home_url('/collections/'), 'active' => 0 === strpos($current_path, 'collections')],
    ['title' => __('Discover', 'dawp'), 'url' => home_url('/about-us/'), 'active' => 'about-us' === $current_path],
    ['title' => __('Culture', 'dawp'), 'url' => home_url('/culture-notes/'), 'active' => 0 === strpos($current_path, 'culture-notes') || 'stories' === $current_path],
];

$product_categories = [];
if (taxonomy_exists('product_cat')) {
    $product_categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'number'     => 8,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ]);

    if (is_wp_error($product_categories)) {
        $product_categories = [];
    }
}

$featured_links = [
    ['title' => __('New Drops', 'dawp'), 'url' => home_url('/new-drops/')],
    ['title' => __('Trending', 'dawp'), 'url' => add_query_arg('orderby', 'popularity', $shop_url)],
    ['title' => __('Bestsellers', 'dawp'), 'url' => add_query_arg('orderby', 'popularity', $shop_url)],
    ['title' => __('Limited Releases', 'dawp'), 'url' => home_url('/drops/')],
];

$collection_links = [
    ['title' => __('Desk Collectibles', 'dawp'), 'url' => home_url('/collections/')],
    ['title' => __('Shelf Icons', 'dawp'), 'url' => home_url('/collections/')],
    ['title' => __('Big Builds', 'dawp'), 'url' => home_url('/collections/')],
    ['title' => __('Small Collectibles', 'dawp'), 'url' => home_url('/collections/')],
    ['title' => __('Gift Ideas', 'dawp'), 'url' => home_url('/collections/')],
    ['title' => __('Under $50', 'dawp'), 'url' => add_query_arg('max_price', '50', $shop_url)],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="tgm-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="site-header" class="tgm-header" role="banner" data-site-header>
    <div class="tgm-announcement">
        <div class="tgm-shell tgm-announcement__row">
            <p><?php esc_html_e('New collectible drops weekly. Built, packed, and ready for the shelf.', 'dawp'); ?></p>
            <a href="<?php echo esc_url(home_url('/drops/')); ?>"><?php esc_html_e('View drop calendar', 'dawp'); ?></a>
        </div>
    </div>

    <div class="tgm-shell tgm-header__bar">
        <a href="<?php echo esc_url($home_url); ?>" class="tgm-logo" aria-label="<?php esc_attr_e('Brickgo.com home', 'dawp'); ?>">
            <?php
            echo function_exists('dawp_get_responsive_image')
                ? dawp_get_responsive_image($logo_url, __('Brickgo.com', 'dawp'), '', 210, 60, 'eager', '(max-width: 680px) 150px, 210px', 'high')
                : '<img src="' . esc_url($logo_url) . '" width="210" height="60" alt="' . esc_attr__('Brickgo.com', 'dawp') . '" decoding="async" fetchpriority="high">';
            ?>
        </a>

        <nav class="tgm-primary-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <div class="tgm-primary-nav__item<?php echo !empty($item['mega']) ? ' has-mega' : ''; ?>">
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>>
                        <?php echo esc_html($item['title']); ?>
                    </a>
                    <?php if (!empty($item['mega'])) : ?>
                        <div class="tgm-mega" aria-label="<?php esc_attr_e('Shop menu', 'dawp'); ?>">
                            <div class="tgm-mega__grid">
                                <section>
                                    <h2><?php esc_html_e('New & Featured', 'dawp'); ?></h2>
                                    <ul>
                                        <?php foreach ($featured_links as $link) : ?>
                                            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </section>
                                <section>
                                    <h2><?php esc_html_e('Shop By Type', 'dawp'); ?></h2>
                                    <ul>
                                        <?php foreach ($product_categories as $category) : ?>
                                            <?php $category_url = get_term_link($category); ?>
                                            <?php if (!is_wp_error($category_url)) : ?>
                                                <li><a href="<?php echo esc_url($category_url); ?>"><?php echo esc_html($category->name); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <li><a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a></li>
                                    </ul>
                                </section>
                                <section>
                                    <h2><?php esc_html_e('Shop By Collection', 'dawp'); ?></h2>
                                    <ul>
                                        <?php foreach ($collection_links as $link) : ?>
                                            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </section>
                                <a class="tgm-mega__feature" href="<?php echo esc_url(home_url('/new-drops/')); ?>">
                                    <?php
                                    echo function_exists('dawp_get_responsive_image')
                                        ? dawp_get_responsive_image($feature_image, __('Editorial collectible building set arrangement', 'dawp'), '', 560, 420, 'lazy', '360px')
                                        : '<img src="' . esc_url($feature_image) . '" alt="' . esc_attr__('Editorial collectible building set arrangement', 'dawp') . '" loading="lazy" decoding="async">';
                                    ?>
                                    <span>
                                        <em><?php esc_html_e('Featured Drop', 'dawp'); ?></em>
                                        <strong><?php esc_html_e('Discover the latest drop', 'dawp'); ?></strong>
                                        <small><?php esc_html_e('Shop now', 'dawp'); ?> &rarr;</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </nav>

        <div class="tgm-header-actions">
            <button type="button" class="tgm-icon-button" data-search-toggle aria-expanded="false" aria-controls="tgm-search-panel" aria-label="<?php esc_attr_e('Open product search', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
            </button>
            <a class="tgm-icon-button tgm-hide-mobile" href="<?php echo esc_url($account_url); ?>" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <a class="tgm-icon-button tgm-hide-mobile" href="<?php echo esc_url($wishlist_url); ?>" aria-label="<?php esc_attr_e('Wishlist', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 4.6a5.4 5.4 0 0 0-7.6 0L12 5.8l-1.2-1.2a5.4 5.4 0 0 0-7.6 7.6L12 21l8.8-8.8a5.4 5.4 0 0 0 0-7.6z"></path></svg>
            </a>
            <a class="tgm-icon-button tgm-bag" href="<?php echo esc_url($cart_url); ?>" aria-label="<?php echo esc_attr(sprintf(__('Shopping bag, %d items', 'dawp'), $cart_count)); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8h12l-1 13H7L6 8Z"></path><path d="M9 8a3 3 0 0 1 6 0"></path></svg>
                <span><?php echo esc_html($cart_count); ?></span>
            </a>
            <button type="button" class="tgm-menu-button" data-menu-toggle aria-expanded="false" aria-controls="tgm-mobile-menu" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
            </button>
        </div>
    </div>

    <div id="tgm-search-panel" class="tgm-search-panel" data-search-panel hidden>
        <div class="tgm-shell">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="tgm-search-form">
                <label class="screen-reader-text" for="tgm-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="tgm-product-search" data-search-input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search figures, builds, blind boxes', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit"><?php esc_html_e('Search', 'dawp'); ?></button>
            </form>
        </div>
    </div>

    <div id="tgm-mobile-menu" class="tgm-mobile-menu" data-mobile-menu hidden>
        <div class="tgm-shell tgm-mobile-menu__inner">
            <nav aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </nav>
            <?php if ($product_categories) : ?>
                <div class="tgm-mobile-menu__categories">
                    <p><?php esc_html_e('Shop By Type', 'dawp'); ?></p>
                    <?php foreach ($product_categories as $category) : ?>
                        <?php $category_url = get_term_link($category); ?>
                        <?php if (!is_wp_error($category_url)) : ?>
                            <a href="<?php echo esc_url($category_url); ?>"><?php echo esc_html($category->name); ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="tgm-mobile-menu__utility">
                <a href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('Account', 'dawp'); ?></a>
                <a href="<?php echo esc_url($wishlist_url); ?>"><?php esc_html_e('Wishlist', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                <a href="<?php echo esc_url($checkout_url); ?>"><?php esc_html_e('Checkout', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</header>

<div id="content" class="site-content">
