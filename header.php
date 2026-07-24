<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-[#2F2A28] antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = function_exists('wc_get_page_id') && wc_get_page_id('myaccount') > 0
    ? get_permalink(wc_get_page_id('myaccount'))
    : home_url('/my-account/');
?>

<header class="sticky top-0 z-50 border-b border-[#E6DDD6] bg-white/95 backdrop-blur" role="banner">
    <div class="mx-auto flex h-16 w-[min(100%-32px,1180px)] items-center justify-between gap-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php echo dawp_theme_image(
                'assets/img/logo.jpg',
                get_bloginfo('name'),
                126,
                64,
                array(array(96, 49), array(126, 64), array(176, 89)),
                '126px',
                array('class' => 'h-9 w-auto rounded-sm', 'loading' => 'eager', 'fetchpriority' => 'high')
            ); ?>
            <span class="hidden text-sm font-extrabold uppercase tracking-[0.14em] text-[#A64B55] sm:inline">
                <?php bloginfo('name'); ?>
            </span>
        </a>

        <nav class="hidden items-center gap-6 text-sm font-bold text-[#6F625D] md:flex" aria-label="<?php esc_attr_e('Main navigation', 'dawp'); ?>">
            <a class="transition hover:text-[#A64B55]" href="#collections"><?php esc_html_e('Collections', 'dawp'); ?></a>
            <a class="transition hover:text-[#A64B55]" href="#new-arrivals"><?php esc_html_e('New Arrivals', 'dawp'); ?></a>
            <a class="transition hover:text-[#A64B55]" href="#story"><?php esc_html_e('Our Story', 'dawp'); ?></a>
            <a class="transition hover:text-[#A64B55]" href="#contact"><?php esc_html_e('Contact', 'dawp'); ?></a>
        </nav>

        <div class="flex items-center gap-2">
            <a href="<?php echo esc_url($account_url); ?>" class="hidden min-h-10 items-center justify-center rounded-md px-3 text-sm font-bold text-[#6F625D] transition hover:bg-[#FAF7F2] hover:text-[#A64B55] sm:inline-flex">
                <?php esc_html_e('Account', 'dawp'); ?>
            </a>
            <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex min-h-10 items-center justify-center rounded-md border border-[#E6DDD6] px-4 text-sm font-bold text-[#2F2A28] transition hover:border-[#A64B55] hover:text-[#A64B55]">
                <?php esc_html_e('Cart', 'dawp'); ?>
                <?php if ($cart_count > 0) : ?>
                    <span class="ml-2 rounded-full bg-[#A64B55] px-2 py-0.5 text-xs text-white"><?php echo esc_html($cart_count); ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</header>

<main id="content" class="site-content">
