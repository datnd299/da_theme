<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
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
        #site-header.scrolled {
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
        }
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

<!-- Utility Bar -->
<div class="hidden md:flex bg-[#E8567A] text-white py-2">
    <div class="max-w-[1280px] w-full mx-auto px-6 flex items-center justify-center text-xs font-medium tracking-wide" style="font-family:'DM Sans',sans-serif">
        <span>✦ 0-1 Business Day Delivery Estimate ✦</span>
    </div>
</div>

<!-- Main Header -->
<header id="site-header" class="sticky top-0 left-0 right-0 z-50 bg-[#FDF8F4] border-b border-[#E8E0D8] transition-shadow duration-300" role="banner">
    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 h-16 lg:h-[72px] flex items-center justify-between gap-3">

        <!-- Hamburger (mobile) -->
        <button id="menu-toggle"
                class="flex lg:hidden items-center justify-center w-10 h-10 rounded-md text-[#2B2B2B]/60 hover:text-[#E8567A] hover:bg-[#F5E6DC] transition-colors shrink-0"
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
           aria-label="Shopshive">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shopshive-logo.svg'); ?>"
                 alt="Shopshive"
                 class="h-10 lg:h-11 w-auto"
                 loading="eager"
                 fetchpriority="high">
        </a>

        <!-- Nav (desktop) -->
        <nav class="hidden lg:flex items-center gap-0.5 flex-1 px-6"
             aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) :
                $is_current = dawp_is_current_url($item['url']);
                $is_sale    = strtolower($item['title']) === 'sale';
            ?>
            <a href="<?php echo esc_url($item['url']); ?>"
               class="relative px-3 py-2 text-[13px] font-semibold uppercase tracking-[0.08em] whitespace-nowrap transition-colors group
                      <?php echo $is_current
                          ? 'text-[#E8567A]'
                          : ($is_sale
                              ? 'text-[#E8567A] hover:text-[#d4415f]'
                              : 'text-[#2B2B2B] hover:text-[#E8567A]'); ?>"
               style="font-family:'DM Sans',sans-serif"
               <?php if ($is_current) echo 'aria-current="page"'; ?>>
                <?php echo esc_html($item['title']); ?>
                <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-[#E8567A] transition-transform duration-200 origin-left
                             <?php echo $is_current ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100'; ?>"></span>
            </a>
            <?php endforeach; ?>
        </nav>

        <!-- Search (desktop) -->
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
              class="hidden lg:flex items-center flex-1 max-w-[260px]">
            <div class="relative w-full">
                <input type="search"
                       name="s"
                       value="<?php echo esc_attr(get_search_query()); ?>"
                       placeholder="<?php esc_attr_e('Search products…', 'dawp'); ?>"
                       class="w-full h-9 pl-4 pr-10 text-sm bg-white border border-[#D4B8A0] rounded-md text-[#2B2B2B] placeholder:text-[#A89080] focus:outline-none focus:border-[#E8567A] transition-colors"
                       style="font-family:'DM Sans',sans-serif">
                <button type="submit"
                        class="absolute right-0 top-0 h-9 w-9 flex items-center justify-center text-[#A89080] hover:text-[#E8567A] transition-colors"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                    </svg>
                </button>
            </div>
        </form>

        <!-- Actions -->
        <div class="flex items-center gap-0.5 shrink-0">

            <!-- Search icon (mobile) -->
            <button id="mobile-search-toggle"
                    class="flex lg:hidden items-center justify-center w-10 h-10 rounded-md text-[#2B2B2B]/60 hover:text-[#E8567A] hover:bg-[#F5E6DC] transition-colors"
                    aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
            </button>

            <!-- Account (desktop) -->
            <a href="<?php echo esc_url($account_url); ?>"
               class="hidden lg:flex items-center justify-center w-10 h-10 rounded-md text-[#2B2B2B]/60 hover:text-[#E8567A] hover:bg-[#F5E6DC] transition-colors"
               aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
            </a>

            <!-- Cart -->
            <a href="<?php echo esc_url($cart_url); ?>"
               class="relative flex items-center justify-center w-10 h-10 rounded-md text-[#2B2B2B] hover:text-[#E8567A] hover:bg-[#F5E6DC] transition-colors"
               aria-label="<?php printf(esc_attr__('Cart (%d items)', 'dawp'), $cart_count); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                <?php if ($cart_count > 0) : ?>
                <span class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] flex items-center justify-center rounded-full bg-[#E8567A] text-white text-[10px] font-bold leading-none px-1"
                      aria-hidden="true">
                    <?php echo esc_html($cart_count); ?>
                </span>
                <?php endif; ?>
            </a>

        </div>
    </div>

    <!-- Mobile search bar -->
    <div id="mobile-search-bar" class="hidden lg:hidden border-t border-[#E8E0D8] px-4 py-3 bg-white">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
            <input type="search"
                   name="s"
                   value="<?php echo esc_attr(get_search_query()); ?>"
                   placeholder="<?php esc_attr_e('Search products…', 'dawp'); ?>"
                   class="w-full h-10 pl-4 pr-10 text-sm bg-[#FDF8F4] border border-[#D4B8A0] rounded-md text-[#2B2B2B] placeholder:text-[#A89080] focus:outline-none focus:border-[#E8567A] transition-colors">
            <button type="submit"
                    class="absolute right-0 top-0 h-10 w-10 flex items-center justify-center text-[#A89080] hover:text-[#E8567A]"
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
     class="fixed inset-0 z-40 bg-black/40"
     aria-hidden="true"></div>

<!-- Mobile drawer -->
<aside id="mobile-drawer"
       class="fixed top-0 left-0 z-50 h-full w-[calc(100%-4rem)] max-w-sm bg-[#FDF8F4] overflow-y-auto shadow-2xl"
       aria-label="<?php esc_attr_e('Mobile Navigation', 'dawp'); ?>">

    <!-- Drawer header -->
    <div class="flex items-center justify-between px-4 h-16 border-b border-[#E8E0D8]">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shopshive-logo.svg'); ?>"
                 alt="Shopshive"
                 class="h-10 w-auto">
        </a>
        <button id="drawer-close"
                class="w-10 h-10 flex items-center justify-center text-[#2B2B2B]/50 hover:text-[#E8567A] hover:bg-[#F5E6DC] rounded-md transition-colors"
                aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    <!-- Drawer nav -->
    <nav class="py-1" aria-label="<?php esc_attr_e('Mobile Menu', 'dawp'); ?>">
        <?php foreach ($nav_items as $item) :
            $is_current = dawp_is_current_url($item['url']);
            $is_sale    = strtolower($item['title']) === 'sale';
        ?>
        <a href="<?php echo esc_url($item['url']); ?>"
           class="flex items-center justify-between px-5 py-4 text-[13px] font-semibold uppercase tracking-[0.06em] border-b border-[#E8E0D8] transition-colors
                  <?php echo $is_current
                      ? 'text-[#E8567A] bg-[#F5E6DC]'
                      : ($is_sale
                          ? 'text-[#E8567A] hover:bg-[#F5E6DC]'
                          : 'text-[#2B2B2B] hover:text-[#E8567A] hover:bg-[#F5E6DC]'); ?>"
           style="font-family:'DM Sans',sans-serif"
           <?php if ($is_current) echo 'aria-current="page"'; ?>>
            <?php echo esc_html($item['title']); ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M9 18l6-6-6-6"/>
            </svg>
        </a>
        <?php endforeach; ?>
        <a href="<?php echo esc_url($account_url); ?>"
           class="flex items-center gap-2.5 px-5 py-4 text-sm font-medium text-[#2B2B2B]/60 hover:text-[#E8567A] hover:bg-[#F5E6DC] border-t border-[#D4B8A0] mt-2 transition-colors"
           style="font-family:'DM Sans',sans-serif">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
            </svg>
            <?php esc_html_e('My Account', 'dawp'); ?>
        </a>
    </nav>

    <!-- Drawer footer -->
    <div class="px-5 py-6 border-t border-[#E8E0D8]">
        <p class="text-xs text-[#A89080] mb-4 italic" style="font-family:'Cormorant Garamond',Georgia,serif">
            Open Doors To A World Of Fashion
        </p>
        <div class="flex items-center gap-2.5">
            <a href="https://www.facebook.com/shopshivedotcom"
               target="_blank" rel="noopener noreferrer"
               class="w-8 h-8 flex items-center justify-center rounded-md bg-[#F5E6DC] text-[#2B2B2B] hover:bg-[#E8567A] hover:text-white transition-colors"
               aria-label="Facebook">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true">
                    <path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12z"/>
                </svg>
            </a>
            <a href="https://www.pinterest.com/galgirlus/"
               target="_blank" rel="noopener noreferrer"
               class="w-8 h-8 flex items-center justify-center rounded-md bg-[#F5E6DC] text-[#2B2B2B] hover:bg-[#E8567A] hover:text-white transition-colors"
               aria-label="Pinterest">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true">
                    <path d="M12 0C5.373 0 0 5.373 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.632-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z"/>
                </svg>
            </a>
        </div>
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
