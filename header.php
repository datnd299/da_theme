<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        #drawer-overlay.is-open { opacity: 1; pointer-events: auto; }
        #site-header.scrolled { backdrop-filter: blur(8px); }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = wc_get_cart_url();
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
$nav_items   = dawp_main_menu_items();
?>

<!-- Utility Bar — desktop only -->
<div class="hidden md:flex bg-[#A64B55] text-white py-1.5">
    <div class="max-w-[1280px] w-full mx-auto px-6 flex items-center justify-center gap-6 text-xs text-white">



        <span>Free Shipping on All Orders</span>
    </div>
</div>

<!-- Main Header -->
<header id="site-header" class="sticky top-0 left-0 right-0 z-50 bg-[#A64B55] shadow-sm" role="banner">
    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 h-14 lg:h-16 flex items-center justify-between gap-3">

        <!-- Hamburger (mobile) -->
        <button id="menu-toggle"
                class="flex lg:hidden items-center justify-center w-10 h-10 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors shrink-0"
                aria-expanded="false"
                aria-controls="mobile-drawer"
                aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
            <svg id="icon-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>

        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>"
           class="shrink-0"
           aria-label="Shopkelli">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.jpg'); ?>"
                 alt="Shopkelli"
                 class="h-8 w-auto"
                 loading="eager"
                 fetchpriority="high">
        </a>

        <!-- Nav (desktop) -->
        <nav class="hidden lg:flex items-center gap-0.5 flex-1 px-4"
             aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) :
                $is_current = dawp_is_current_url($item['url']);
                $is_sale    = strtolower($item['title']) === 'sale';
            ?>
            <a href="<?php echo esc_url($item['url']); ?>"
               class="px-3 py-2 text-sm font-bold rounded-md whitespace-nowrap transition-colors
                      <?php echo $is_current
                          ? 'text-white bg-white/20'
                          : ($is_sale
                              ? 'text-white border-b-2 border-white'
                              : 'text-white hover:bg-white/10'); ?>"
               <?php if ($is_current) echo 'aria-current="page"'; ?>>
                <?php echo esc_html($item['title']); ?>
            </a>
            <?php endforeach; ?>
        </nav>

        <!-- Search (desktop) -->
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
              class="hidden lg:flex items-center flex-1 max-w-xs">
            <div class="relative w-full">
                <input type="search"
                       name="s"
                       value="<?php echo esc_attr(get_search_query()); ?>"
                       placeholder="<?php esc_attr_e('Search products…', 'dawp'); ?>"
                       class="w-full h-9 pl-4 pr-10 text-sm bg-white/15 border border-white/30 rounded-md text-white placeholder:text-white/60 focus:outline-none focus:border-white focus:bg-white/20 transition-colors">
                <button type="submit"
                        class="absolute right-0 top-0 h-9 w-9 flex items-center justify-center text-white/60 hover:text-white transition-colors"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                    </svg>
                </button>
            </div>
        </form>

        <!-- Actions -->
        <div class="flex items-center gap-1 shrink-0">

            <!-- Search icon (mobile) -->
            <button id="mobile-search-toggle"
                    class="flex lg:hidden items-center justify-center w-10 h-10 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors"
                    aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
            </button>

            <!-- Account (desktop) -->
            <a href="<?php echo esc_url($account_url); ?>"
               class="hidden lg:flex items-center justify-center w-10 h-10 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors"
               aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
            </a>

            <!-- Cart -->
            <a href="<?php echo esc_url($cart_url); ?>"
               class="relative flex items-center justify-center w-10 h-10 rounded-md text-white hover:bg-white/10 transition-colors"
               aria-label="<?php printf(esc_attr__('Cart (%d items)', 'dawp'), $cart_count); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                <?php if ($cart_count > 0) : ?>
                <span class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] flex items-center justify-center rounded-full bg-white text-[#A64B55] text-[10px] font-bold leading-none px-1 shadow-sm"
                      aria-hidden="true">
                    <?php echo esc_html($cart_count); ?>
                </span>
                <?php endif; ?>
            </a>

        </div>
    </div>

    <!-- Mobile search bar -->
    <div id="mobile-search-bar" class="hidden lg:hidden border-t border-white/20 px-4 py-3 bg-[#963C46]">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
            <input type="search"
                   name="s"
                   value="<?php echo esc_attr(get_search_query()); ?>"
                   placeholder="<?php esc_attr_e('Search products…', 'dawp'); ?>"
                   class="w-full h-10 pl-4 pr-10 text-sm bg-white/20 border border-white/30 rounded-md text-white placeholder:text-white/70 focus:outline-none focus:border-white transition-colors">
            <button type="submit"
                    class="absolute right-0 top-0 h-10 w-10 flex items-center justify-center text-white/60"
                    aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
            </button>
        </form>
    </div>
</header>

<!-- Drawer overlay -->
<div id="drawer-overlay"
     class="fixed inset-0 z-40 bg-black/50"
     aria-hidden="true"></div>

<!-- Mobile drawer -->
<aside id="mobile-drawer"
       class="fixed top-0 left-0 z-50 h-full w-[calc(100%-4rem)] max-w-sm bg-[#A64B55] overflow-y-auto shadow-2xl"
       aria-label="<?php esc_attr_e('Mobile Navigation', 'dawp'); ?>">

    <!-- Drawer header -->
    <div class="flex items-center justify-between px-4 h-14 border-b border-white/10">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.jpg'); ?>"
                 alt="Shopkelli"
                 class="h-7 w-auto">
        </a>
        <button id="drawer-close"
                class="w-10 h-10 flex items-center justify-center text-white/80 hover:text-white hover:bg-white/10 rounded-md transition-colors"
                aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    <!-- Drawer nav -->
    <nav class="py-2" aria-label="<?php esc_attr_e('Mobile Menu', 'dawp'); ?>">
        <?php foreach ($nav_items as $item) :
            $is_current = dawp_is_current_url($item['url']);
            $is_sale    = strtolower($item['title']) === 'sale';
        ?>
        <a href="<?php echo esc_url($item['url']); ?>"
           class="flex items-center px-5 py-3.5 text-sm font-medium border-b border-white/10 transition-colors
                  <?php echo $is_current
                      ? 'text-accent'
                      : ($is_sale
                          ? 'text-accent hover:bg-white/5'
                          : 'text-white/80 hover:text-white hover:bg-white/5'); ?>"
           <?php if ($is_current) echo 'aria-current="page"'; ?>>
            <?php echo esc_html($item['title']); ?>
        </a>
        <?php endforeach; ?>
        <a href="<?php echo esc_url($account_url); ?>"
           class="flex items-center gap-2.5 px-5 py-3.5 text-sm font-medium text-white/80 hover:text-white hover:bg-white/5 border-t border-white/20 mt-2 transition-colors">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
            </svg>
            <?php esc_html_e('My Account', 'dawp'); ?>
        </a>
    </nav>

    <!-- Drawer footer -->
    <div class="px-5 py-5 border-t border-white/10">


    </div>
</aside>

<script>
(function () {
    var header      = document.getElementById('site-header');
    var toggle      = document.getElementById('menu-toggle');
    var drawer      = document.getElementById('mobile-drawer');
    var overlay     = document.getElementById('drawer-overlay');
    var closeBtn    = document.getElementById('drawer-close');
    var srchToggle  = document.getElementById('mobile-search-toggle');
    var srchBar     = document.getElementById('mobile-search-bar');

    function openDrawer() {
        drawer.classList.add('is-open');
        overlay.classList.add('is-open');
        toggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }
    function closeDrawer() {
        drawer.classList.remove('is-open');
        overlay.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (toggle)   toggle.addEventListener('click', function () {
        drawer.classList.contains('is-open') ? closeDrawer() : openDrawer();
    });
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay)  overlay.addEventListener('click', closeDrawer);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeDrawer();
    });

    if (srchToggle && srchBar) {
        srchToggle.addEventListener('click', function () {
            var hidden = srchBar.classList.toggle('hidden');
            if (!hidden) srchBar.querySelector('input').focus();
        });
    }

    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('scrolled', window.scrollY > 4);
        }, { passive: true });
    }
})();
</script>

<div id="content" class="site-content">
