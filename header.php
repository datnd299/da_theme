<?php
/**
 * Theme header — Maison layout: service bar, split nav / centred logo, search panel, mobile drawer.
 * Styles live in assets/css/main.css (HEADER section).
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email   = 'support@celviaus.com';
$rating_text     = __('Rated 4.8/5 based on 13,000+ Reviews', 'dawp');
$shipping_badge  = __('Secured Shipping & Customs Guarantee', 'dawp');
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_url      = get_template_directory_uri() . '/assets/img/logo/celvia-logo-black.svg';
$has_fibosearch = shortcode_exists('fibosearch');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$current_path = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$is_shop_area = (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product());

$megamenu_brands = function_exists('dawp_megamenu_brands') ? dawp_megamenu_brands() : [];

$nav_items = [
    ['title' => __('Watches', 'dawp'), 'url' => $shop_url, 'active' => $is_shop_area, 'megamenu' => true],
    ['title' => __('New Arrivals', 'dawp'), 'url' => add_query_arg('orderby', 'date', $shop_url), 'active' => false],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/'), 'active' => 'contact-us' === $current_path],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/'), 'active' => 'track-order' === $current_path],
];

$icon = static function ($name) {
    $paths = [
        'search'  => '<circle cx="11" cy="11" r="7"></circle><path d="m20 20-3.5-3.5"></path>',
        'account' => '<path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle>',
        'heart'   => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"></path>',
        'bag'     => '<path d="M5 8h14l-1 13H6z"></path><path d="M9 8V6a3 3 0 0 1 6 0v2"></path>',
        'menu'    => '<path d="M3 7h18"></path><path d="M3 12h18"></path><path d="M3 17h12"></path>',
        'close'   => '<path d="M6 6l12 12"></path><path d="M18 6 6 18"></path>',
        'caret'   => '<path d="m6 9 6 6 6-6"></path>',
    ];
    return '<svg viewBox="0 0 24 24" aria-hidden="true">' . ($paths[$name] ?? '') . '</svg>';
};
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Manrope:wght@400;500;600;700&display=swap">
    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="mx-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="site-header" class="mx-header" role="banner">
    <div class="mx-bar">
        <div class="mx-wrap mx-bar__row">
            <a class="mx-bar__item mx-bar__item--side" href="mailto:<?php echo esc_attr($support_email); ?>">
                <?php esc_html_e('Concierge', 'dawp'); ?> &middot; <?php echo esc_html($support_email); ?>
            </a>
            <span class="mx-bar__item mx-bar__item--center"><?php echo esc_html($rating_text); ?></span>
            <span class="mx-bar__item mx-bar__item--side mx-bar__item--end"><?php echo esc_html($shipping_badge); ?></span>
        </div>
    </div>

    <div class="mx-wrap mx-main">
        <div class="mx-main__start">
            <button type="button" class="mx-icon mx-menu-btn" aria-expanded="false" aria-controls="mx-drawer" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" data-mx-drawer-open>
                <?php echo $icon('menu'); ?>
            </button>

            <nav class="mx-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if (!empty($item['megamenu']) && !empty($megamenu_brands)) : ?>
                        <div class="mx-nav__item mx-nav__item--mega">
                            <a class="mx-nav__link<?php echo $item['active'] ? ' is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?> aria-haspopup="true">
                                <?php echo esc_html($item['title']); ?>
                                <span class="mx-caret"><?php echo $icon('caret'); ?></span>
                            </a>
                            <div class="mx-mega">
                                <div class="mx-wrap mx-mega__inner">
                                    <div class="mx-mega__brands">
                                        <p class="mx-eyebrow"><?php esc_html_e('Shop by Maison', 'dawp'); ?></p>
                                        <div class="mx-mega__grid">
                                            <?php foreach ($megamenu_brands as $brand) : ?>
                                                <div class="mx-mega__col">
                                                    <a class="mx-mega__brand" href="<?php echo esc_url($brand['url']); ?>"><?php echo esc_html($brand['title']); ?></a>
                                                    <?php if (!empty($brand['children'])) : ?>
                                                        <ul>
                                                            <?php foreach ($brand['children'] as $child) : ?>
                                                                <li><a href="<?php echo esc_url($child['url']); ?>"><?php echo esc_html($child['title']); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <a class="mx-mega__feature" href="<?php echo esc_url($shop_url); ?>">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/maison/collector-gold.jpg'); ?>" alt="" loading="lazy" width="640" height="480">
                                        <span class="mx-mega__feature-copy">
                                            <span class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('The Collector\'s Edit', 'dawp'); ?></span>
                                            <span class="mx-mega__feature-title"><?php esc_html_e('Timeless references, newly arrived', 'dawp'); ?></span>
                                            <span class="mx-mega__feature-cta"><?php esc_html_e('Shop all watches', 'dawp'); ?></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <a class="mx-nav__link<?php echo $item['active'] ? ' is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>
        </div>

        <a href="<?php echo esc_url($home_url); ?>" class="mx-logo" aria-label="<?php esc_attr_e('Celvia home', 'dawp'); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" width="170" height="51" alt="<?php esc_attr_e('Celvia', 'dawp'); ?>">
        </a>

        <div class="mx-main__end">
            <button type="button" class="mx-icon" aria-expanded="false" aria-controls="mx-search" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>" data-mx-search-toggle>
                <?php echo $icon('search'); ?>
            </button>
            <a href="<?php echo esc_url($account_url); ?>" class="mx-icon mx-hide-sm" aria-label="<?php esc_attr_e('Account', 'dawp'); ?>"><?php echo $icon('account'); ?></a>
            <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="mx-icon mx-hide-sm" aria-label="<?php esc_attr_e('Wishlist', 'dawp'); ?>"><?php echo $icon('heart'); ?></a>
            <a href="<?php echo esc_url($cart_url); ?>" class="mx-icon mx-icon--bag" id="dawp-cart-toggle" aria-label="<?php esc_attr_e('Shopping bag', 'dawp'); ?>">
                <?php echo $icon('bag'); ?>
                <span class="lux-cart-count<?php echo $cart_count > 0 ? '' : ' hidden'; ?>"><?php echo esc_html($cart_count); ?></span>
            </a>
        </div>
    </div>

    <div id="mx-search" class="mx-search" hidden>
        <div class="mx-wrap mx-search__inner">
            <?php if ($has_fibosearch) : ?>
                <div class="mx-search__fibo"><?php echo do_shortcode('[fibosearch layout="classic"]'); ?></div>
            <?php else : ?>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mx-search__form">
                    <label class="screen-reader-text" for="mx-search-input"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                    <?php echo $icon('search'); ?>
                    <input id="mx-search-input" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search by brand, model or reference', 'dawp'); ?>">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="mx-btn mx-btn--dark"><?php esc_html_e('Search', 'dawp'); ?></button>
                </form>
            <?php endif; ?>
            <?php if (!empty($megamenu_brands)) : ?>
                <p class="mx-search__hint">
                    <span><?php esc_html_e('Popular:', 'dawp'); ?></span>
                    <?php foreach (array_slice($megamenu_brands, 0, 5) as $brand) : ?>
                        <a href="<?php echo esc_url($brand['url']); ?>"><?php echo esc_html($brand['title']); ?></a>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</header>

<div class="mx-drawer" id="mx-drawer" aria-hidden="true">
    <div class="mx-drawer__overlay" data-mx-drawer-close></div>
    <div class="mx-drawer__panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Menu', 'dawp'); ?>">
        <div class="mx-drawer__head">
            <img src="<?php echo esc_url($logo_url); ?>" width="132" height="40" alt="<?php esc_attr_e('Celvia', 'dawp'); ?>">
            <button type="button" class="mx-icon" aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>" data-mx-drawer-close><?php echo $icon('close'); ?></button>
        </div>
        <nav class="mx-drawer__nav" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <?php if (!empty($item['megamenu']) && !empty($megamenu_brands)) : ?>
                    <div class="mx-drawer__group">
                        <button type="button" class="mx-drawer__link" aria-expanded="false" data-mobile-megamenu-trigger>
                            <?php echo esc_html($item['title']); ?>
                            <span class="mx-caret"><?php echo $icon('caret'); ?></span>
                        </button>
                        <div class="mx-drawer__sub" data-mobile-megamenu-panel>
                            <a href="<?php echo esc_url($item['url']); ?>"><?php esc_html_e('All Watches', 'dawp'); ?></a>
                            <?php foreach ($megamenu_brands as $brand) : ?>
                                <a href="<?php echo esc_url($brand['url']); ?>"><?php echo esc_html($brand['title']); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <a class="mx-drawer__link<?php echo $item['active'] ? ' is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
            <a class="mx-drawer__link" href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('My Account', 'dawp'); ?></a>
            <a class="mx-drawer__link" href="<?php echo esc_url(home_url('/wishlist/')); ?>"><?php esc_html_e('Wishlist', 'dawp'); ?></a>
        </nav>
        <div class="mx-drawer__foot">
            <p class="mx-eyebrow"><?php esc_html_e('Private Concierge', 'dawp'); ?></p>
            <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
        </div>
    </div>
</div>

<div id="content" class="site-content">
