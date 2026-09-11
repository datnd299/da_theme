<?php
/**
 * Theme header for Zorex Craft.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$cart_count  = (class_exists('WooCommerce') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
$account_url = $account_url ?: home_url('/my-account/');
$brand_name  = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Zorex Craft';
$logo_url    = get_template_directory_uri() . '/assets/images/Zorexwatch/watchlogonew.png';
$nav_items   = function_exists('dawp_main_menu_items') ? dawp_main_menu_items() : [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Watches', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;800&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class('qb-site'); ?>>
<?php wp_body_open(); ?>

<style>
  .qb-site-header {
    --qb-cream: #f4f0e8;
    --qb-gold: #b67849;
    --qb-ink: #102f46;
    --qb-text: #181a1b;
    --qb-muted: #707579;
    --qb-border: #ded8cd;
    --qb-soft: #fbfaf7;
    position: sticky;
    top: 0;
    z-index: 50;
    border-bottom: 1px solid rgba(16, 47, 70, .12);
    background:
      linear-gradient(180deg, rgba(255, 255, 255, .96), rgba(251, 250, 247, .92));
    color: var(--qb-text);
    font-family: "DM Sans", "Inter", system-ui, sans-serif;
    box-shadow: 0 12px 34px rgba(16, 47, 70, .08);
    backdrop-filter: blur(18px);
  }

  .qb-site-header * {
    box-sizing: border-box;
  }

  .qb-site-header a {
    color: inherit;
    text-decoration: none;
  }

  .qb-header-wrap {
    width: min(100% - 36px, 1320px);
    margin-inline: auto;
  }

  .qb-announcement {
    border-bottom: 1px solid rgba(16, 47, 70, .12);
    background: #fff;
    color: var(--qb-ink);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .22em;
    line-height: 1.4;
    text-align: center;
    text-transform: uppercase;
  }

  .qb-announcement .qb-header-wrap {
    padding: 8px 0;
  }

  .qb-header-main {
    display: grid;
    grid-template-columns: auto minmax(0, 1fr) auto;
    gap: 28px;
    align-items: center;
    min-height: 78px;
  }

  .qb-logo {
    display: inline-flex;
    align-items: center;
    line-height: 1;
  }

  .qb-logo img {
    display: block;
    width: auto;
    height: 54px;
    max-width: 190px;
    object-fit: contain;
  }

  .qb-header-nav {
    display: flex;
    justify-content: center;
    gap: clamp(18px, 2vw, 34px);
  }

  .qb-header-nav a {
    position: relative;
    color: var(--qb-text);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .12em;
    line-height: 1;
    padding: 33px 0 29px;
    text-transform: uppercase;
    white-space: nowrap;
    transition: color .2s ease, transform .2s ease;
  }

  .qb-header-nav a::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 21px;
    width: 22px;
    height: 2px;
    background: var(--qb-gold);
    opacity: 0;
    transform: translateX(-50%) scaleX(.35);
    transform-origin: center;
    transition: opacity .2s ease, transform .2s ease;
  }

  .qb-header-nav a:hover,
  .qb-header-nav a.is-current {
    color: var(--qb-gold);
  }

  .qb-header-nav a:hover::after,
  .qb-header-nav a.is-current::after {
    opacity: 1;
    transform: translateX(-50%) scaleX(1);
  }

  .qb-header-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
  }

  .qb-header-search {
    display: flex;
    align-items: center;
  }

  .qb-header-search input[type="search"],
  .qb-mobile-search input[type="search"] {
    min-height: 44px;
    border: 1px solid rgba(16, 47, 70, .16);
    border-radius: 999px;
    background: var(--qb-soft);
    color: var(--qb-ink);
    font: inherit;
    font-size: 13px;
    outline: none;
    padding: 0 18px;
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
  }

  .qb-header-search input[type="search"] {
    width: 190px;
  }

  .qb-header-search input[type="search"]:focus,
  .qb-mobile-search input[type="search"]:focus {
    border-color: var(--qb-ink);
    background: #fff;
    box-shadow: 0 0 0 4px rgba(16, 47, 70, .10);
  }

  .qb-icon-link,
  .qb-menu-toggle,
  .qb-search-toggle {
    display: inline-flex;
    width: 42px;
    height: 42px;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(16, 47, 70, .16);
    border-radius: 999px;
    background: var(--qb-soft);
    color: var(--qb-ink);
    cursor: pointer;
    transition: border-color .2s ease, background .2s ease, color .2s ease, transform .2s ease;
  }

  .qb-icon-link:hover,
  .qb-menu-toggle:hover,
  .qb-search-toggle:hover {
    border-color: var(--qb-gold);
    background: #fff;
    color: var(--qb-gold);
    transform: translateY(-1px);
  }

  .qb-site-header .qb-cart-link {
    display: inline-flex;
    min-height: 44px;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--qb-ink);
    border-radius: 999px;
    background: var(--qb-ink);
    color: #fff;
    box-shadow: 0 10px 24px rgba(16, 47, 70, .16);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .08em;
    padding: 0 18px;
    text-transform: uppercase;
    transition: border-color .2s ease, background .2s ease, color .2s ease, transform .2s ease, box-shadow .2s ease;
  }

  .qb-site-header .qb-cart-link:hover {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: #fff;
    box-shadow: 0 12px 28px rgba(182, 120, 73, .24);
    transform: translateY(-1px);
  }

  .qb-search-toggle,
  .qb-menu-toggle,
  .qb-cart-link .qb-cart-icon {
    display: none;
  }

  .qb-cart-link .qb-cart-text,
  .qb-cart-link .dawp-cart-count {
    display: inline;
  }

  .qb-mobile-panel {
    display: none;
    border-top: 1px solid rgba(16, 47, 70, .12);
    background: rgba(255, 255, 255, .97);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, .7);
  }

  .qb-mobile-panel.is-open {
    display: block;
  }

  .qb-mobile-search form {
    display: flex;
    gap: 10px;
    padding: 14px 0;
  }

  .qb-mobile-search input[type="search"] {
    min-width: 0;
    flex: 1;
    background: #fff;
  }

  .qb-mobile-search button {
    border: 0;
    border-radius: 999px;
    background: var(--qb-ink);
    color: #fff;
    font: inherit;
    font-size: 13px;
    font-weight: 800;
    padding: 0 18px;
  }

  .qb-mobile-nav {
    display: grid;
    gap: 4px;
    padding: 12px 0 16px;
  }

  .qb-mobile-nav a {
    border-radius: 999px;
    color: var(--qb-ink);
    font-size: 15px;
    font-weight: 800;
    padding: 12px 16px;
  }

  .qb-mobile-nav a:hover,
  .qb-mobile-nav a.is-current {
    background: var(--qb-cream);
    color: var(--qb-gold);
  }

  .qb-sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    overflow: hidden;
    clip: rect(1px, 1px, 1px, 1px);
    white-space: nowrap;
  }

  @media (max-width: 1120px) {
    .qb-header-nav,
    .qb-header-search,
    .qb-account-link {
      display: none;
    }

    .qb-header-main {
      grid-template-columns: auto auto;
      justify-content: space-between;
    }

    .qb-search-toggle,
    .qb-menu-toggle {
      display: inline-flex;
    }
  }

  @media (max-width: 760px) {
    .qb-header-wrap {
      width: min(100% - 16px, 1280px);
    }
  }

  @media (max-width: 520px) {
    .qb-announcement {
      font-size: 10px;
      letter-spacing: .08em;
    }

    .qb-header-main {
      min-height: 70px;
      gap: 14px;
    }

    .qb-logo img {
      height: 46px;
      max-width: 150px;
    }

    .qb-site-header .qb-cart-link {
      width: 42px;
      padding: 0;
    }

    .qb-cart-link .qb-cart-text,
    .qb-cart-link .dawp-cart-count {
      display: none;
    }

    .qb-cart-link .qb-cart-icon {
      display: block;
      width: 19px;
      height: 19px;
    }
  }

  @media (max-width: 380px) {
    .qb-header-main {
      gap: 10px;
    }

    .qb-header-actions {
      gap: 7px;
    }

    .qb-logo img {
      height: 42px;
      max-width: 124px;
    }

    .qb-icon-link,
    .qb-menu-toggle,
    .qb-search-toggle,
    .qb-site-header .qb-cart-link {
      width: 38px;
      height: 38px;
      min-height: 38px;
      flex: 0 0 38px;
    }
  }
</style>

<header id="masthead" class="qb-site-header" role="banner">
    <div class="qb-announcement">
        <div class="qb-header-wrap">
            <?php esc_html_e('Zorex Craft - Original watches from our brand', 'dawp'); ?>
        </div>
    </div>

    <div class="qb-header-wrap qb-header-main">
        <a class="qb-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(sprintf(__('%s home', 'dawp'), $brand_name)); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($brand_name); ?>">
        </a>

        <nav class="qb-header-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <?php $is_current = function_exists('dawp_is_current_url') && dawp_is_current_url($item['url']); ?>
                <a class="<?php echo $is_current ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="qb-header-actions">
            <form class="qb-header-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" autocomplete="off">
                <label class="qb-sr-only" for="qb-header-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="qb-header-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" autocomplete="off" autocapitalize="off" spellcheck="false" placeholder="<?php esc_attr_e('Search watches', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
            </form>

            <button class="qb-search-toggle" type="button" aria-label="<?php esc_attr_e('Open search', 'dawp'); ?>" aria-controls="qb-mobile-search" aria-expanded="false" data-qb-toggle="qb-mobile-search">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg>
            </button>

            <a class="qb-icon-link qb-account-link" href="<?php echo esc_url($account_url); ?>" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>

            <a class="qb-cart-link" id="dawp-cart-toggle" href="<?php echo esc_url($cart_url); ?>" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>" aria-haspopup="dialog" aria-controls="dawp-cart-drawer">
                <svg class="qb-cart-icon" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 7h12l-1 13H7L6 7Z"></path><path d="M9 7a3 3 0 0 1 6 0"></path></svg>
                <span class="qb-cart-text"><?php esc_html_e('Bag', 'dawp'); ?></span>
                <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : '<span class="dawp-cart-count">&nbsp;(' . esc_html($cart_count) . ')</span>'; ?>
            </a>

            <button class="qb-menu-toggle" type="button" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="qb-mobile-menu" aria-expanded="false" data-qb-toggle="qb-mobile-menu">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
            </button>
        </div>
    </div>

    <div id="qb-mobile-search" class="qb-mobile-panel qb-mobile-search">
        <div class="qb-header-wrap">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" autocomplete="off">
                <label class="qb-sr-only" for="qb-mobile-search-field"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="qb-mobile-search-field" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" autocomplete="off" autocapitalize="off" spellcheck="false" placeholder="<?php esc_attr_e('Search watches...', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit"><?php esc_html_e('Search', 'dawp'); ?></button>
            </form>
        </div>
    </div>

    <div id="qb-mobile-menu" class="qb-mobile-panel">
        <nav class="qb-header-wrap qb-mobile-nav" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <?php $is_current = function_exists('dawp_is_current_url') && dawp_is_current_url($item['url']); ?>
                <a class="<?php echo $is_current ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<script>
  document.addEventListener('click', function(event) {
    var toggle = event.target.closest('[data-qb-toggle]');

    if (!toggle) {
      return;
    }

    var panel = document.getElementById(toggle.getAttribute('data-qb-toggle'));

    if (!panel) {
      return;
    }

    var isOpen = panel.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
  });
</script>

<div id="content" class="site-content">
