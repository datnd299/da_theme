<?php defined('ABSPATH') || exit; ?><!doctype html>
<html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com"><?php wp_head(); ?></head>
<body <?php body_class('hm-body'); ?>><?php wp_body_open(); ?>
<a class="hm-skip" href="#main">Skip to content</a>
<div class="hm-strip"><div class="hm-wrap"><span><?php echo wp_kses_post(hm_part('strip.html')); ?></span><span><a href="<?php echo esc_url(home_url('/about/')); ?>">About</a><a href="<?php echo esc_url(home_url('/contact/')); ?>">Help &amp; Contact</a><a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>">Track order</a></span></div></div>
<?php
$ic = function ($d) { return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">' . $d . '</svg>'; };
$depts = hm_departments();
$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
?>
<header class="hm-mast"><div class="hm-wrap hm-mast__row">
<a class="hm-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Hartwell Mart home"><span class="hm-logo__mark">H</span><span><span class="hm-logo__name">Hartwell Mart</span><span class="hm-logo__tag">Goods for every project</span></span></a>
<form class="hm-search" role="search" action="<?php echo esc_url(home_url('/')); ?>"><input type="hidden" name="post_type" value="product"><label class="hm-sr" for="hm-q">Search products</label><select name="product_cat" aria-label="Department"><option value="">All</option><?php foreach ($depts as $d) echo '<option value="' . esc_attr($d->slug) . '">' . esc_html($d->name) . '</option>'; ?></select><input id="hm-q" name="s" type="search" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="What are you working on? Try “deck stain” or “stand mixer”"><button>Search</button></form>
<nav class="hm-actions" aria-label="Account"><button class="hm-burger" aria-expanded="false" aria-label="Open departments menu">☰</button>
<a class="hm-act" href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"><?php echo $ic('<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/>'); ?><span>Account</span></a>
<a class="hm-act" href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php echo $ic('<path d="M3 4h2l2.5 11h11L21 7H6"/><circle cx="9" cy="20" r="1.5"/><circle cx="17" cy="20" r="1.5"/>'); ?><span>Cart</span><b class="hm-badge"><?php echo (int) $count; ?></b></a></nav>
</div><nav class="hm-dept" aria-label="Departments"><ul class="hm-dept__list">
<li class="hm-dept__item hm-dept__item--all"><button class="hm-dept__btn" data-hm-mega aria-expanded="false" aria-controls="hm-mega-all">☰ All Departments</button><?php echo hm_mega('all'); ?></li>
<?php foreach (array_slice($depts, 0, 7) as $i => $d) : ?><li class="hm-dept__item"><button class="hm-dept__btn" data-hm-mega aria-expanded="false" aria-controls="hm-mega-<?php echo $i; ?>"><?php echo esc_html($d->name); ?></button><?php echo hm_mega($i, $d); ?></li><?php endforeach; ?>
</ul></nav></header>
<main id="main">
