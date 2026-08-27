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
$cart_count     = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$current_path   = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$logo_path      = get_template_directory() . '/assets/img/gallery/logologo.png';
$logo_url       = get_template_directory_uri() . '/assets/img/gallery/logologo.png';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

$is_shop_context = (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product());
$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => $home_url, 'active' => '' === $current_path],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'active' => $is_shop_context],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/'), 'active' => 'contact-us' === $current_path],
    ['title' => __('Discover', 'dawp'), 'url' => home_url('/about-us/'), 'active' => 'about-us' === $current_path],
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
            <p><?php esc_html_e('Fresh collectibles added weekly. Built, packed, and ready for the shelf.', 'dawp'); ?></p>
            <a href="<?php echo esc_url(add_query_arg('orderby', 'date', $shop_url)); ?>"><?php esc_html_e('Shop new arrivals', 'dawp'); ?></a>
        </div>
    </div>

    <div class="tgm-shell tgm-header__bar">
        <a href="<?php echo esc_url($home_url); ?>" class="tgm-logo" aria-label="<?php esc_attr_e('Brickgoshop home', 'dawp'); ?>">
            <?php
            echo function_exists('dawp_get_responsive_image')
                ? dawp_get_responsive_image($logo_url, __('Brickgoshop', 'dawp'), '', 210, 60, 'eager', '(max-width: 680px) 150px, 210px', 'high')
                : '<img src="' . esc_url($logo_url) . '" width="210" height="60" alt="' . esc_attr__('Brickgoshop', 'dawp') . '" decoding="async" fetchpriority="high">';
            ?>
        </a>

        <nav class="tgm-primary-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <div class="tgm-primary-nav__item">
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>>
                        <?php echo esc_html($item['title']); ?>
                    </a>
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
            <div class="tgm-mobile-menu__utility">
                <a href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('Account', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                <a href="<?php echo esc_url($checkout_url); ?>"><?php esc_html_e('Checkout', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</header>

<div id="content" class="site-content">
