<?php
/**
 * Theme header for Queen's Bracelet.
 *
 * @package dawp
 */

$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
$account_url = $account_url ?: home_url('/my-account/');

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class('qb-site'); ?>>
<?php wp_body_open(); ?>

<style>
  .qb-site-header {
    --qb-blush: #ffb7c5;
    --qb-cream: #fff8f4;
    --qb-gold: #d8a94e;
    --qb-plum: #2f1f35;
    --qb-text: #4f4355;
    --qb-border: #eadfe8;
    position: sticky;
    top: 0;
    z-index: 50;
    border-bottom: 1px solid var(--qb-border);
    background: rgba(255,255,255,.96);
    color: var(--qb-text);
    font-family: "DM Sans", "Inter", system-ui, sans-serif;
    box-shadow: 0 10px 28px rgba(47,31,53,.07);
    backdrop-filter: blur(14px);
  }

  .qb-site-header * {
    box-sizing: border-box;
  }

  .qb-site-header a {
    color: inherit;
    text-decoration: none;
  }

  .qb-header-wrap {
    width: min(100% - 32px, 1280px);
    margin-inline: auto;
  }

  .qb-announcement {
    background: linear-gradient(90deg, rgba(255,183,197,.34), rgba(255,214,165,.42), rgba(216,199,255,.24));
    color: var(--qb-plum);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .12em;
    line-height: 1.4;
    text-align: center;
    text-transform: uppercase;
  }

  .qb-announcement .qb-header-wrap {
    padding: 9px 0;
  }

  .qb-header-main {
    display: grid;
    grid-template-columns: auto minmax(0, 1fr) auto;
    gap: 24px;
    align-items: center;
    min-height: 78px;
  }

  .qb-logo {
    display: inline-flex;
    align-items: center;
    color: var(--qb-plum);
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
    gap: clamp(14px, 1.6vw, 26px);
  }

  .qb-header-nav a {
    color: var(--qb-text);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: .04em;
    white-space: nowrap;
    transition: color .2s ease;
  }

  .qb-header-nav a:hover {
    color: var(--qb-gold);
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

  .qb-header-search input[type="search"] {
    width: 180px;
    min-height: 42px;
    border: 1px solid var(--qb-border);
    border-radius: 999px;
    background: var(--qb-cream);
    color: var(--qb-plum);
    font: inherit;
    font-size: 14px;
    outline: none;
    padding: 0 15px;
    transition: border-color .2s ease, box-shadow .2s ease;
  }

  .qb-header-search input[type="search"]:focus {
    border-color: var(--qb-gold);
    box-shadow: 0 0 0 3px rgba(216,169,78,.16);
  }

  .qb-icon-link,
  .qb-menu-toggle,
  .qb-search-toggle {
    display: inline-flex;
    width: 42px;
    height: 42px;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--qb-border);
    border-radius: 999px;
    background: #fff;
    color: var(--qb-plum);
    cursor: pointer;
    transition: border-color .2s ease, background .2s ease, color .2s ease;
  }

  .qb-icon-link:hover,
  .qb-menu-toggle:hover,
  .qb-search-toggle:hover {
    border-color: var(--qb-gold);
    background: var(--qb-cream);
    color: var(--qb-gold);
  }

  .qb-site-header .qb-cart-link {
    display: inline-flex;
    min-height: 42px;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--qb-plum);
    border-radius: 999px;
    background: var(--qb-plum);
    color: #fff;
    font-size: 13px;
    font-weight: 800;
    padding: 0 17px;
    box-shadow: 0 8px 18px rgba(47,31,53,.18);
    transition: border-color .2s ease, background .2s ease, color .2s ease, box-shadow .2s ease;
  }

  .qb-site-header .qb-cart-link:hover {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: var(--qb-plum);
    box-shadow: 0 8px 18px rgba(216,169,78,.24);
  }

  .qb-search-toggle,
  .qb-menu-toggle {
    display: none;
  }

  .qb-mobile-panel {
    display: none;
    border-top: 1px solid var(--qb-border);
    background: #fff;
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
    min-height: 44px;
    border: 1px solid var(--qb-border);
    border-radius: 999px;
    padding: 0 15px;
    font: inherit;
    outline: none;
  }

  .qb-mobile-search button {
    border: 0;
    border-radius: 999px;
    background: var(--qb-plum);
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
    border-radius: 12px;
    color: var(--qb-plum);
    font-size: 15px;
    font-weight: 800;
    padding: 12px 14px;
  }

  .qb-mobile-nav a:hover {
    background: var(--qb-cream);
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

    .qb-cart-link .qb-cart-text {
      display: none;
    }
  }
</style>

<header id="masthead" class="qb-site-header" role="banner">
    <div class="qb-announcement">
        <div class="qb-header-wrap">
            <?php esc_html_e('Bracelet styles for everyday confidence, meaningful gifts, and personal expression', 'dawp'); ?>
        </div>
    </div>

    <div class="qb-header-wrap qb-header-main">
        <a class="qb-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e("Queen's Bracelet home", 'dawp'); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/image.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        </a>

        <nav class="qb-header-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="qb-header-actions">
            <form class="qb-header-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <label class="qb-sr-only" for="qb-header-search"><?php esc_html_e('Search bracelets', 'dawp'); ?></label>
                <input id="qb-header-search" type="search" name="s" placeholder="<?php esc_attr_e('Search bracelets', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
            </form>

            <button class="qb-search-toggle" type="button" aria-label="<?php esc_attr_e('Open search', 'dawp'); ?>" aria-controls="qb-mobile-search" onclick="document.getElementById('qb-mobile-search').classList.toggle('is-open')">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg>
            </button>

            <a class="qb-icon-link qb-account-link" href="<?php echo esc_url($account_url); ?>" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>

            <a class="qb-cart-link" href="<?php echo esc_url($cart_url); ?>" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                <span class="qb-cart-text"><?php esc_html_e('Bag', 'dawp'); ?></span>
                <span>&nbsp;(<?php echo esc_html($cart_count); ?>)</span>
            </a>

            <button class="qb-menu-toggle" type="button" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="qb-mobile-menu" onclick="document.getElementById('qb-mobile-menu').classList.toggle('is-open')">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
            </button>
        </div>
    </div>

    <div id="qb-mobile-search" class="qb-mobile-panel qb-mobile-search">
        <div class="qb-header-wrap">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <label class="qb-sr-only" for="qb-mobile-search-field"><?php esc_html_e('Search bracelets', 'dawp'); ?></label>
                <input id="qb-mobile-search-field" type="search" name="s" placeholder="<?php esc_attr_e('Search bracelets...', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit"><?php esc_html_e('Search', 'dawp'); ?></button>
            </form>
        </div>
    </div>

    <div id="qb-mobile-menu" class="qb-mobile-panel">
        <nav class="qb-header-wrap qb-mobile-nav" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
