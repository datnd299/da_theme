<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        #mobile-drawer {
            transform: translateX(-100%);
            transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #mobile-drawer.is-open {
            transform: translateX(0);
        }
        #drawer-overlay {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.28s ease;
        }
        #drawer-overlay.is-open {
            opacity: 1;
            pointer-events: auto;
        }
        #site-header.scrolled {
            backdrop-filter: blur(10px);
            background: rgba(18, 18, 18, 0.94);
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$header_nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
];

$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
?>

<header id="site-header" class="sticky top-0 left-0 right-0 z-50 border-b border-white/10 bg-[#121212] text-white shadow-lg" role="banner">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-5 px-5 sm:px-8 lg:px-10">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex shrink-0 items-center" aria-label="<?php esc_attr_e('Handed Shoes Home', 'dawp'); ?>">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/logo.png'); ?>"
                alt="<?php esc_attr_e('Handed Shoes', 'dawp'); ?>"
                class="h-11 w-11 rounded-full object-contain"
            >
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
            <?php foreach ($header_nav_items as $item) : ?>
                <?php $is_current = function_exists('dawp_is_current_url') && dawp_is_current_url($item['url']); ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-full px-4 py-2 text-sm font-bold uppercase tracking-wider transition-colors <?php echo $is_current ? 'bg-[#A96538] text-white' : 'text-white/78 hover:bg-white/10 hover:text-white'; ?>"
                   <?php if ($is_current) echo 'aria-current="page"'; ?>>
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="ml-auto flex items-center gap-2 lg:ml-0">
            <a
                href="<?php echo esc_url($cart_url); ?>"
                class="relative flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-white/80 transition-colors hover:bg-white/10 hover:text-white"
                aria-label="<?php printf(esc_attr__('View cart (%d items)', 'dawp'), $cart_count); ?>"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="8" cy="21" r="1"></circle>
                    <circle cx="19" cy="21" r="1"></circle>
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                </svg>
                <?php if ($cart_count > 0) : ?>
                    <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#A96538] px-1 text-[11px] font-bold leading-none text-white">
                        <?php echo esc_html($cart_count); ?>
                    </span>
                <?php endif; ?>
            </a>
            <a
                href="<?php echo esc_url($account_url); ?>"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-white/80 transition-colors hover:bg-white/10 hover:text-white"
                aria-label="<?php esc_attr_e('My account', 'dawp'); ?>"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 21a8 8 0 0 0-16 0"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
        </div>

        <button id="menu-toggle"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-md text-white/80 transition-colors hover:bg-white/10 hover:text-white lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-drawer"
                aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </div>
</header>

<div id="drawer-overlay" class="fixed inset-0 z-40 bg-black/60" aria-hidden="true"></div>

<aside id="mobile-drawer"
       class="fixed top-0 left-0 z-50 h-full w-[calc(100%-4rem)] max-w-sm overflow-y-auto bg-[#121212] text-white shadow-2xl lg:hidden"
       aria-label="<?php esc_attr_e('Mobile Navigation', 'dawp'); ?>">
    <div class="flex h-16 items-center justify-between border-b border-white/10 px-5">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center" aria-label="<?php esc_attr_e('Handed Shoes Home', 'dawp'); ?>">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/logo.png'); ?>"
                alt="<?php esc_attr_e('Handed Shoes', 'dawp'); ?>"
                class="h-11 w-11 rounded-full object-contain"
            >
        </a>
        <button id="drawer-close"
                class="flex h-10 w-10 items-center justify-center rounded-md text-white/75 transition-colors hover:bg-white/10 hover:text-white"
                aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <nav class="py-3" aria-label="<?php esc_attr_e('Mobile Menu', 'dawp'); ?>">
        <?php foreach ($header_nav_items as $item) : ?>
            <?php $is_current = function_exists('dawp_is_current_url') && dawp_is_current_url($item['url']); ?>
            <a href="<?php echo esc_url($item['url']); ?>"
               class="flex items-center border-b border-white/10 px-5 py-4 text-sm font-bold uppercase tracking-wider transition-colors <?php echo $is_current ? 'bg-white/10 text-white' : 'text-white/78 hover:bg-white/5 hover:text-white'; ?>"
               <?php if ($is_current) echo 'aria-current="page"'; ?>>
                <?php echo esc_html($item['title']); ?>
            </a>
        <?php endforeach; ?>
        <a href="<?php echo esc_url($account_url); ?>"
           class="flex items-center border-b border-white/10 px-5 py-4 text-sm font-bold uppercase tracking-wider text-white/78 transition-colors hover:bg-white/5 hover:text-white">
            <?php esc_html_e('My Account', 'dawp'); ?>
        </a>
    </nav>
</aside>

<script>
(function () {
    var header = document.getElementById('site-header');
    var toggle = document.getElementById('menu-toggle');
    var drawer = document.getElementById('mobile-drawer');
    var overlay = document.getElementById('drawer-overlay');
    var closeBtn = document.getElementById('drawer-close');

    function openDrawer() {
        if (!drawer || !overlay || !toggle) return;
        drawer.classList.add('is-open');
        overlay.classList.add('is-open');
        toggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        if (!drawer || !overlay || !toggle) return;
        drawer.classList.remove('is-open');
        overlay.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            drawer && drawer.classList.contains('is-open') ? closeDrawer() : openDrawer();
        });
    }
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay) overlay.addEventListener('click', closeDrawer);

    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('scrolled', window.scrollY > 4);
        }, { passive: true });
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeDrawer();
    });
})();
</script>

<div id="content" class="site-content">
