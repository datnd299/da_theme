<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        #mobile-drawer {
            transform: translateX(-100%);
            transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #mobile-drawer.is-open { transform: translateX(0); }
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
            box-shadow: 0 12px 32px rgba(17, 17, 17, 0.2);
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = function_exists('wc_get_page_id') && wc_get_page_id('myaccount') > 0
    ? get_permalink(wc_get_page_id('myaccount'))
    : home_url('/my-account/');
$nav_items   = [
    ['title' => __('Home', 'dawp'),       'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'),       'url' => home_url('/shop/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('About Us', 'dawp'),   'url' => home_url('/about-us/')],
];
?>

<div class="hidden md:block bg-[#3B2416] text-[#F5EFE6]">
    <div class="max-w-[1280px] mx-auto px-6 py-2 flex items-center justify-between gap-6 text-xs font-semibold">
        <span><?php esc_html_e('Modern formal shoes for classy steps', 'dawp'); ?></span>
        <span><?php esc_html_e('Support: support@brogeshoes.com', 'dawp'); ?></span>
    </div>
</div>

<header id="site-header" class="sticky top-0 left-0 right-0 z-50 bg-[#111111] text-white" role="banner">
    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 h-16 flex items-center justify-between gap-4">
        <button id="menu-toggle"
                class="flex lg:hidden items-center justify-center w-10 h-10 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors"
                aria-expanded="false"
                aria-controls="mobile-drawer"
                aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0 flex items-center text-white" aria-label="<?php esc_attr_e('Broge Shoes Home', 'dawp'); ?>">
            <?php
            echo dawp_responsive_theme_image('Logo.png', __('Broge Shoes', 'dawp'), [
                'class' => 'h-12 w-auto max-w-[180px] object-contain',
                'width' => 180,
                'height' => 105,
                'src_width' => 360,
                'widths' => [160, 240, 360],
                'sizes' => '180px',
                'loading' => 'eager',
                'fetchpriority' => 'high',
            ]);
            ?>
        </a>

        <nav class="hidden lg:flex items-center justify-center gap-1 flex-1" aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) :
                $is_current = function_exists('dawp_is_current_url') ? dawp_is_current_url($item['url']) : false;
            ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="px-4 py-2 text-sm font-bold rounded-md transition-colors <?php echo $is_current ? 'text-white bg-white/15' : 'text-white/80 hover:text-white hover:bg-white/10'; ?>"
                   <?php if ($is_current) echo 'aria-current="page"'; ?>>
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden xl:flex items-center w-full max-w-[300px]">
            <div class="relative w-full">
                <input type="search"
                       name="s"
                       value="<?php echo esc_attr(get_search_query()); ?>"
                       placeholder="<?php esc_attr_e('Search dress shoes', 'dawp'); ?>"
                       class="w-full h-10 pl-4 pr-10 text-sm bg-white/10 border border-white/20 rounded-md text-white placeholder:text-white/55 focus:outline-none focus:border-[#C8A45D] focus:bg-white/15 transition-colors">
                <button type="submit"
                        class="absolute right-0 top-0 h-10 w-10 flex items-center justify-center text-white/60 hover:text-white transition-colors"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>
            </div>
        </form>

        <div class="flex items-center gap-1 shrink-0">
            <button id="mobile-search-toggle"
                    class="flex xl:hidden items-center justify-center w-10 h-10 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors"
                    aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>

            <a href="<?php echo esc_url($account_url); ?>"
               class="hidden sm:flex items-center justify-center w-10 h-10 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors"
               aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"></path>
                </svg>
            </a>

            <a href="<?php echo esc_url($cart_url); ?>"
               class="relative flex items-center justify-center w-10 h-10 rounded-md text-white hover:bg-white/10 transition-colors"
               aria-label="<?php printf(esc_attr__('Cart (%d items)', 'dawp'), $cart_count); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 01-8 0"></path>
                </svg>
                <?php if ($cart_count > 0) : ?>
                    <span class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] flex items-center justify-center rounded-full bg-[#C8A45D] text-[#111111] text-[10px] font-bold leading-none px-1">
                        <?php echo esc_html($cart_count); ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
    </div>

    <div id="mobile-search-bar" class="hidden border-t border-white/10 px-4 py-3 bg-[#3B2416]">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
            <input type="search"
                   name="s"
                   value="<?php echo esc_attr(get_search_query()); ?>"
                   placeholder="<?php esc_attr_e('Search dress shoes', 'dawp'); ?>"
                   class="w-full h-10 pl-4 pr-10 text-sm bg-white/10 border border-white/25 rounded-md text-white placeholder:text-white/60 focus:outline-none focus:border-[#C8A45D]">
            <button type="submit"
                    class="absolute right-0 top-0 h-10 w-10 flex items-center justify-center text-white/65"
                    aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>
</header>

<div id="drawer-overlay" class="fixed inset-0 z-40 bg-black/55" aria-hidden="true"></div>

<aside id="mobile-drawer"
       class="fixed top-0 left-0 z-50 h-full w-[calc(100%-4rem)] max-w-sm bg-[#111111] text-white overflow-y-auto shadow-2xl"
       aria-label="<?php esc_attr_e('Mobile Navigation', 'dawp'); ?>">
    <div class="flex items-center justify-between px-4 h-16 border-b border-white/10">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center text-white">
            <?php
            echo dawp_responsive_theme_image('Logo.png', __('Broge Shoes', 'dawp'), [
                'class' => 'h-11 w-auto max-w-[170px] object-contain',
                'width' => 170,
                'height' => 99,
                'src_width' => 340,
                'widths' => [160, 240, 340],
                'sizes' => '170px',
                'loading' => 'eager',
            ]);
            ?>
        </a>
        <button id="drawer-close"
                class="w-10 h-10 flex items-center justify-center text-white/80 hover:text-white hover:bg-white/10 rounded-md transition-colors"
                aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <nav class="py-2" aria-label="<?php esc_attr_e('Mobile Menu', 'dawp'); ?>">
        <?php foreach ($nav_items as $item) :
            $is_current = function_exists('dawp_is_current_url') ? dawp_is_current_url($item['url']) : false;
        ?>
            <a href="<?php echo esc_url($item['url']); ?>"
               class="flex items-center px-5 py-4 text-sm font-bold border-b border-white/10 transition-colors <?php echo $is_current ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/5'; ?>"
               <?php if ($is_current) echo 'aria-current="page"'; ?>>
                <?php echo esc_html($item['title']); ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="px-5 py-6 border-t border-white/10">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#C8A45D] mb-3"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
        <a href="mailto:support@brogeshoes.com" class="text-sm text-white/80 hover:text-white">support@brogeshoes.com</a>
        <p class="mt-2 text-sm text-white/60"><?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp'); ?></p>
    </div>
</aside>

<script>
(function () {
    var header = document.getElementById('site-header');
    var toggle = document.getElementById('menu-toggle');
    var drawer = document.getElementById('mobile-drawer');
    var overlay = document.getElementById('drawer-overlay');
    var closeBtn = document.getElementById('drawer-close');
    var searchToggle = document.getElementById('mobile-search-toggle');
    var searchBar = document.getElementById('mobile-search-bar');

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

    if (searchToggle && searchBar) {
        searchToggle.addEventListener('click', function () {
            var hidden = searchBar.classList.toggle('hidden');
            if (!hidden) {
                var input = searchBar.querySelector('input');
                if (input) input.focus();
            }
        });
    }

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
