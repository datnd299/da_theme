<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name    = dawp_store('name');
$support_email = dawp_store('email');
$support_phone = dawp_store('phone');
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url   = home_url('/contact-us/');
$about_url     = home_url('/about-us/');
$track_url     = home_url('/track-order/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_path     = get_template_directory() . '/assets/img/medialmarket-logo.svg';
$logo_url      = dawp_store('logo');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

$current_path = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$current_term = (function_exists('is_product_category') && is_product_category()) ? get_queried_object() : null;

$category_nav = [];
foreach ((function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : []) as $slug => $category) {
    $category_nav[] = [
        'title'  => $category['name'],
        'url'    => dawp_product_category_url($slug),
        'active' => $current_term && !empty($current_term->slug) && $current_term->slug === $slug,
    ];
}

$page_nav = [
    ['title' => __('About Us', 'dawp'), 'url' => $about_url, 'active' => 'about-us' === $current_path],
    ['title' => __('Contact', 'dawp'), 'url' => $contact_url, 'active' => 'contact-us' === $current_path],
];

$shop_active = (function_exists('is_shop') && is_shop()) || (function_exists('is_product') && is_product());

/**
 * Per-page meta description.
 *
 * Reuses the same page data already defined in inc/virtual-pages.php so the
 * static pages and the homepage keep one single source of truth. Shop,
 * product-category and single-product pages get their own description here.
 * Always prints, regardless of whether an SEO plugin is active.
 */
$dawp_meta_description = '';

if (function_exists('dawp_virtual_page_is_active') && ($dawp_vp_page = dawp_virtual_page_is_active())) {
    $dawp_meta_description = $dawp_vp_page['desc'] ?? '';
} elseif ((is_front_page() || is_home()) && function_exists('dawp_home_page_seo_data')) {
    $dawp_home_seo = dawp_home_page_seo_data();
    $dawp_meta_description = $dawp_home_seo['desc'] ?? '';
} elseif (function_exists('is_shop') && is_shop()) {
    $dawp_meta_description = __('Shop Medial Market for budget-friendly furniture, kitchen and dining, outdoor and patio, home decor, kids and pet essentials, with free U.S. standard shipping and 30-day returns.', 'dawp');
} elseif (function_exists('is_product_category') && is_product_category()) {
    $dawp_term = get_queried_object();
    if ($dawp_term && !is_wp_error($dawp_term)) {
        $dawp_cat_desc = trim(wp_strip_all_tags($dawp_term->description ?? ''));
        $dawp_meta_description = $dawp_cat_desc !== ''
            ? $dawp_cat_desc
            : sprintf(__('Shop %s at Medial Market: practical home pieces at honest prices, with free U.S. standard shipping and easy returns.', 'dawp'), $dawp_term->name);
    }
} elseif (function_exists('is_product') && is_product()) {
    $dawp_product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
    if ($dawp_product) {
        $dawp_excerpt = trim(wp_strip_all_tags($dawp_product->get_short_description() ?: $dawp_product->get_description()));
        $dawp_meta_description = $dawp_excerpt !== ''
            ? wp_html_excerpt($dawp_excerpt, 160, '…')
            : sprintf(__('Buy %s at Medial Market. Free U.S. standard shipping, secure checkout and 30-day returns.', 'dawp'), $dawp_product->get_name());
    }
}

$icon_search = '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($dawp_meta_description) : ?>
    <meta name="description" content="<?php echo esc_attr($dawp_meta_description); ?>">
    <?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap">

    <style>
        body { margin:0; font-family:var(--font-sans); color:var(--color-foreground); background:var(--color-background); letter-spacing:0; text-rendering:optimizeLegibility; }
        html { scroll-behavior:smooth; }
        .mm-skip { position:absolute; left:-999px; top:auto; width:1px; height:1px; overflow:hidden; }
        .mm-skip:focus { position:fixed; left:16px; top:16px; z-index:100; width:auto; height:auto; border-radius:var(--radius-sm); background:var(--color-background); padding:12px 16px; color:var(--color-accent); font-weight:700; box-shadow:var(--shadow-card-hover); }
        .mm-wrap { width:min(100% - 32px, 1280px); margin-inline:auto; }
        .mm-announce { background:var(--color-foreground); color:#fff; font-size:.8rem; line-height:1.3; }
        .mm-announce__row { display:flex; align-items:center; justify-content:center; gap:22px; min-height:36px; }
        .mm-announce__row p { margin:0; display:flex; align-items:center; gap:7px; }
        .mm-announce__row p:not(:first-child) { display:none; }
        .mm-announce strong { color:#FFD3B0; font-weight:700; }
        .mm-header { position:relative; z-index:50; background:#fff; border-bottom:1px solid var(--color-border); }
        .mm-header__main { display:grid; grid-template-columns:auto 1fr auto; grid-template-areas:"menu logo actions" "search search search"; align-items:center; gap:10px 12px; padding:10px 0 12px; }
        .mm-logo { grid-area:logo; display:inline-flex; align-items:center; justify-self:start; text-decoration:none; }
        .mm-logo img { display:block; width:auto; height:38px; }
        .mm-search { grid-area:search; display:flex; align-items:stretch; min-width:0; height:46px; border:2px solid var(--color-accent); border-radius:var(--radius-pill); background:#fff; overflow:hidden; }
        .mm-search input { flex:1; min-width:0; border:0; padding:0 18px; outline:0; color:var(--color-foreground); font:inherit; font-size:.92rem; background:transparent; }
        .mm-search input::placeholder { color:var(--color-muted); }
        .mm-search button { display:inline-flex; align-items:center; justify-content:center; gap:6px; border:0; padding:0 18px; background:var(--color-accent); color:#fff; font:inherit; font-size:.88rem; font-weight:700; cursor:pointer; transition:background var(--duration-fast) var(--ease-fluid); }
        .mm-search button:hover { background:var(--color-accent-hover); }
        .mm-search button span { display:none; }
        .mm-search:focus-within { box-shadow:0 0 0 4px var(--color-accent-soft); }
        .mm-actions { grid-area:actions; display:flex; align-items:center; justify-content:flex-end; gap:4px; }
        .mm-action, .mm-menu-toggle { position:relative; display:inline-flex; align-items:center; justify-content:center; gap:8px; min-width:44px; min-height:44px; border:0; border-radius:var(--radius-md); background:transparent; padding:0 8px; color:var(--color-foreground); font:inherit; font-size:.84rem; font-weight:600; line-height:1.15; text-decoration:none; cursor:pointer; transition:background var(--duration-fast) var(--ease-fluid), color var(--duration-fast) var(--ease-fluid); }
        .mm-action:hover, .mm-menu-toggle:hover { background:var(--color-surface); color:var(--color-accent); }
        .mm-action__label { display:none; text-align:left; }
        .mm-action__label small { display:block; color:var(--color-muted); font-size:.7rem; font-weight:500; }
        .mm-menu-toggle { grid-area:menu; }
        .mm-cart-count { position:absolute; left:24px; top:3px; display:flex; align-items:center; justify-content:center; min-width:20px; height:20px; border:2px solid #fff; border-radius:var(--radius-pill); background:var(--color-value); color:#fff; padding:0 4px; font-size:.68rem; font-weight:800; }
        .mm-nav-bar { display:none; border-top:1px solid var(--color-border); }
        .mm-nav { display:flex; align-items:center; gap:4px; min-height:48px; }
        .mm-nav a { flex:none; border-radius:var(--radius-pill); padding:8px 14px; color:var(--color-foreground); font-size:.88rem; font-weight:600; text-decoration:none; transition:background var(--duration-fast) var(--ease-fluid), color var(--duration-fast) var(--ease-fluid); }
        .mm-nav a:hover { background:var(--color-surface); color:var(--color-accent); }
        .mm-nav a.is-current { background:var(--color-accent-soft); color:var(--color-accent-hover); }
        .mm-nav .mm-nav__shop { background:var(--color-accent); color:#fff; }
        .mm-nav .mm-nav__shop:hover, .mm-nav .mm-nav__shop.is-current { background:var(--color-accent-hover); color:#fff; }
        .mm-nav__end { display:flex; gap:4px; margin-left:auto; }
        .mm-drawer { display:none; border-top:1px solid var(--color-border); background:#fff; padding:12px 0 18px; max-height:calc(100vh - 140px); overflow-y:auto; }
        .mm-drawer.is-open { display:block; }
        .mm-drawer h2 { margin:10px 0 8px; color:var(--color-muted); font-size:.72rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase; }
        .mm-drawer nav { display:grid; gap:4px; }
        .mm-drawer a { display:flex; align-items:center; min-height:44px; border-radius:var(--radius-md); background:var(--color-surface); padding:0 14px; color:var(--color-foreground); font-size:.95rem; font-weight:600; text-decoration:none; }
        .mm-drawer a.is-current { background:var(--color-accent); color:#fff; }
        @media (min-width: 640px) {
            .mm-announce__row p:nth-child(2) { display:flex; }
            .mm-search button span { display:inline; }
        }
        @media (min-width: 1024px) {
            .mm-announce__row p:nth-child(3) { display:flex; }
            .mm-header__main { grid-template-columns:auto minmax(0, 1fr) auto; grid-template-areas:"logo search actions"; gap:28px; padding:14px 0; }
            .mm-logo img { height:46px; }
            .mm-search { max-width:640px; width:100%; justify-self:center; height:48px; }
            .mm-actions { gap:10px; }
            .mm-action__label { display:block; }
            .mm-menu-toggle, .mm-drawer, .mm-drawer.is-open { display:none; }
            .mm-nav-bar { display:block; }
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="mm-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<div class="mm-announce">
    <div class="mm-wrap mm-announce__row">
        <p><strong><?php esc_html_e('Free standard shipping', 'dawp'); ?></strong> <?php esc_html_e('on every U.S. order', 'dawp'); ?></p>
        <p><?php esc_html_e('30-day returns on eligible items', 'dawp'); ?></p>
        <p><?php esc_html_e('Secure checkout with Visa, Mastercard, Amex & PayPal', 'dawp'); ?></p>
    </div>
</div>

<header id="site-header" class="mm-header" role="banner">
    <div class="mm-wrap mm-header__main">
        <button type="button" class="mm-menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mm-drawer" onclick="const d=document.getElementById('mm-drawer'); const open=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!open)); d.classList.toggle('is-open');">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
        </button>

        <a href="<?php echo esc_url($home_url); ?>" class="mm-logo" aria-label="<?php echo esc_attr(sprintf(__('%s home', 'dawp'), $store_name)); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" width="198" height="44" alt="<?php echo esc_attr($store_name); ?>" decoding="async" fetchpriority="high">
        </a>

        <form role="search" method="get" action="<?php echo esc_url($home_url); ?>" class="mm-search">
            <label class="screen-reader-text" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
            <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search sofas, patio sets, cookware, pet beds…', 'dawp'); ?>">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>"><?php echo $icon_search; ?><span><?php esc_html_e('Search', 'dawp'); ?></span></button>
        </form>

        <div class="mm-actions">
            <a href="<?php echo esc_url($track_url); ?>" class="mm-action" aria-label="<?php esc_attr_e('Track order', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="18.5" r="1.8"></circle><circle cx="17.5" cy="18.5" r="1.8"></circle></svg>
                <span class="mm-action__label"><small><?php esc_html_e('Orders', 'dawp'); ?></small><?php esc_html_e('Track', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url($account_url); ?>" class="mm-action" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span class="mm-action__label"><small><?php esc_html_e('Sign in', 'dawp'); ?></small><?php esc_html_e('Account', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url($cart_url); ?>" class="mm-action" aria-label="<?php echo esc_attr(sprintf(__('Shopping cart, %d items', 'dawp'), $cart_count)); ?>">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="20" r="1.4"></circle><circle cx="18" cy="20" r="1.4"></circle><path d="M2 3h3l2.6 12.2a2 2 0 0 0 2 1.6h8.2a2 2 0 0 0 2-1.5L21.5 7H6"></path></svg>
                <?php if ($cart_count > 0) : ?><span class="mm-cart-count"><?php echo esc_html($cart_count); ?></span><?php endif; ?>
                <span class="mm-action__label"><small><?php echo esc_html(sprintf(_n('%d item', '%d items', $cart_count, 'dawp'), $cart_count)); ?></small><?php esc_html_e('Cart', 'dawp'); ?></span>
            </a>
        </div>
    </div>

    <div class="mm-nav-bar">
        <nav class="mm-wrap mm-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <a class="mm-nav__shop<?php echo $shop_active ? ' is-current' : ''; ?>" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a>
            <?php foreach ($category_nav as $item) : ?>
                <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
            <span class="mm-nav__end">
                <?php foreach ($page_nav as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </span>
        </nav>
    </div>

    <div id="mm-drawer" class="mm-drawer">
        <div class="mm-wrap">
            <h2><?php esc_html_e('Shop by category', 'dawp'); ?></h2>
            <nav aria-label="<?php esc_attr_e('Mobile category navigation', 'dawp'); ?>">
                <a class="<?php echo $shop_active ? 'is-current' : ''; ?>" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a>
                <?php foreach ($category_nav as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </nav>
            <h2><?php esc_html_e('Help', 'dawp'); ?></h2>
            <nav aria-label="<?php esc_attr_e('Mobile help navigation', 'dawp'); ?>">
                <?php foreach ($page_nav as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQs', 'dawp'); ?></a>
                <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
