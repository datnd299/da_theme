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

        /* Megamenu — hidden on mobile */
        #megamenu-shop { display: none; }
        @media (min-width: 1024px) {
            #megamenu-shop {
                display: block;
                position: absolute;
                top: calc(100% + 8px);
                left: 0;
                width: 660px;
                z-index: 100;
                border-radius: 12px;
                overflow: hidden;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-8px);
                pointer-events: none;
                transition: opacity 0.22s ease, transform 0.22s ease, visibility 0s 0.22s;
            }
            #megamenu-shop.is-open {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
                pointer-events: auto;
                transition: opacity 0.22s ease, transform 0.22s ease;
            }
        }
        .mega-link {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            color: #2F2A28;
            padding: 5px 0;
            transition: color 0.15s ease, padding-left 0.15s ease;
        }
        .mega-link:hover { color: #A64B55; padding-left: 4px; }
        .mega-link-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #DFA39A;
            flex-shrink: 0;
        }

        /* Mobile drawer sub-nav */
        .drawer-sub-nav {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.28s ease;
        }
        .drawer-sub-nav.is-open { max-height: 700px; }
        .sub-chevron { transition: transform 0.22s ease; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count    = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url      = wc_get_cart_url();
$account_url   = get_permalink(get_option('woocommerce_myaccount_page_id'));
$nav_items     = dawp_main_menu_items();
$mega_sections = dawp_megamenu_sections();
?>

<!-- Main Header -->
<header id="site-header" class="sticky top-0 left-0 right-0 z-50 bg-[#A64B55] shadow-sm" role="banner">
    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 h-14 lg:h-16 flex items-center justify-between gap-3">

        <!-- Hamburger (mobile) -->
        <button id="menu-toggle"
                class="flex lg:hidden items-center justify-center w-10 h-10 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors shrink-0"
                aria-expanded="false"
                aria-controls="mobile-drawer"
                aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>

        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0" aria-label="Shopkelli">
            <?php echo dawp_theme_image(
                'assets/img/logo.jpg',
                'Shopkelli',
                126,
                64,
                array(array(96, 49), array(126, 64), array(176, 89)),
                '126px',
                array('class' => 'h-8 w-auto', 'loading' => 'eager', 'fetchpriority' => 'high')
            ); ?>
        </a>

        <!-- Nav (desktop) -->
        <nav class="hidden lg:flex items-center gap-0.5 flex-1 px-4"
             aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) :
                $is_current = dawp_is_current_url($item['url']);
                $has_mega   = !empty($item['megamenu']);
            ?>
            <?php if ($has_mega) : ?>
            <div id="megamenu-trigger" class="relative">
                <a href="<?php echo esc_url($item['url']); ?>"
                   id="megamenu-btn"
                   class="flex items-center gap-1 px-3 py-2 text-sm font-bold rounded-md whitespace-nowrap transition-colors
                          <?php echo $is_current ? 'text-white bg-white/20' : 'text-white hover:bg-white/10'; ?>"
                   <?php if ($is_current) echo 'aria-current="page"'; ?>>
                    <?php echo esc_html($item['title']); ?>
                    <svg id="megamenu-chevron" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="transition:transform 0.22s ease;">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </a>
                <div id="megamenu-shop"
                     role="region"
                     aria-label="<?php esc_attr_e('Shop Categories', 'dawp'); ?>">
                    <div class="bg-white border border-[#E6DDD6] shadow-2xl">
                        <div class="px-5 py-5">
                            <div class="grid grid-cols-3 gap-5">

                                <?php foreach ($mega_sections as $section) : ?>
                                <div>
                                    <h3 class="text-[11px] font-bold uppercase tracking-widest text-[#A64B55] mb-3 pb-2 border-b border-[#E6DDD6]">
                                        <?php echo esc_html($section['title']); ?>
                                    </h3>
                                    <ul class="space-y-0.5">
                                        <?php foreach ($section['links'] as $link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($link['url']); ?>" class="mega-link">
                                                <span class="mega-link-dot"></span>
                                                <?php echo esc_html($link['title']); ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endforeach; ?>

                                <!-- Lifestyle image column -->
                                <div class="relative rounded-xl overflow-hidden" style="min-height:150px;">
                                    <?php echo dawp_theme_image(
                                        'assets/img/Mother_and_daughter_in_boutique_202605071526.jpeg',
                                        'Shop Kelli Boutique',
                                        400,
                                        250,
                                        array(array(240, 150), array(320, 200), array(400, 250)),
                                        '220px',
                                        array('class' => 'absolute inset-0 w-full h-full object-cover')
                                    ); ?>
                                    <div class="absolute inset-0" style="background:linear-gradient(to top,rgba(166,75,85,0.55) 0%,transparent 55%);"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-3">
                                        <p class="text-white text-xs font-semibold leading-tight drop-shadow">
                                            <?php esc_html_e('Warm styles for every season', 'dawp'); ?>
                                        </p>
                                    </div>
                                </div>

                                <!-- Featured CTA column -->
                                <div class="flex flex-col">
                                    <h3 class="text-[11px] font-bold uppercase tracking-widest text-[#A64B55] mb-3 pb-2 border-b border-[#E6DDD6]">
                                        <?php esc_html_e('Our Boutique', 'dawp'); ?>
                                    </h3>
                                    <div class="flex-1 rounded-xl bg-[#FAF7F2] border border-[#E6DDD6] p-4 flex flex-col justify-between">
                                        <div>
                                            <p class="text-[10px] font-semibold uppercase tracking-wider text-[#9A8C86] mb-1">
                                                <?php esc_html_e('Full Collection', 'dawp'); ?>
                                            </p>
                                            <p class="text-sm font-bold text-[#2F2A28] leading-snug">
                                                <?php esc_html_e('Shop Everything We Love', 'dawp'); ?>
                                            </p>
                                            <p class="text-xs text-[#6F625D] mt-1.5 leading-relaxed">
                                                <?php esc_html_e('Browse our complete boutique — women, girls, and family styles all in one place.', 'dawp'); ?>
                                            </p>
                                        </div>
                                        <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                                           class="mt-3 inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-[#A64B55] text-white text-xs font-semibold hover:bg-[#8f3e48] transition-colors">
                                            <?php esc_html_e('Shop All Products', 'dawp'); ?>
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M5 12h14M12 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <a href="<?php echo esc_url($item['url']); ?>"
               class="px-3 py-2 text-sm font-bold rounded-md whitespace-nowrap transition-colors
                      <?php echo $is_current ? 'text-white bg-white/20' : 'text-white hover:bg-white/10'; ?>"
               <?php if ($is_current) echo 'aria-current="page"'; ?>>
                <?php echo esc_html($item['title']); ?>
            </a>
            <?php endif; ?>
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
            <?php echo dawp_theme_image(
                'assets/img/logo.jpg',
                'Shopkelli',
                110,
                56,
                array(array(88, 45), array(110, 56), array(154, 78)),
                '110px',
                array('class' => 'h-7 w-auto', 'loading' => 'eager')
            ); ?>
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
            $has_mega   = !empty($item['megamenu']);
        ?>
        <?php if ($has_mega) : ?>
        <!-- Shop All with expandable sub-nav -->
        <div class="border-b border-white/10">
            <div class="flex items-center">
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="flex-1 flex items-center px-5 py-3.5 text-sm font-medium text-white/90 hover:text-white transition-colors">
                    <?php echo esc_html($item['title']); ?>
                </a>
                <button class="drawer-sub-toggle w-12 h-12 flex items-center justify-center text-white/60 hover:text-white transition-colors shrink-0"
                        aria-expanded="false"
                        aria-label="<?php esc_attr_e('Expand shop categories', 'dawp'); ?>">
                    <svg class="sub-chevron" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>
            <div class="drawer-sub-nav bg-[#8B3A44]">
                <?php foreach ($mega_sections as $section) : ?>
                <div class="px-5 py-3 border-t border-white/5">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-white/45 mb-2">
                        <?php echo esc_html($section['title']); ?>
                    </p>
                    <?php foreach ($section['links'] as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>"
                       class="flex items-center gap-2 py-1.5 text-sm text-white/75 hover:text-white transition-colors">
                        <span class="w-1 h-1 rounded-full bg-white/40 shrink-0"></span>
                        <?php echo esc_html($link['title']); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
                <div class="px-5 py-4 border-t border-white/10">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-white/20 text-white text-sm font-semibold hover:bg-white/30 transition-colors">
                        <?php esc_html_e('View All Products', 'dawp'); ?>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <?php else : ?>
        <a href="<?php echo esc_url($item['url']); ?>"
           class="flex items-center px-5 py-3.5 text-sm font-medium border-b border-white/10 transition-colors
                  <?php echo $is_current ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/5'; ?>"
           <?php if ($is_current) echo 'aria-current="page"'; ?>>
            <?php echo esc_html($item['title']); ?>
        </a>
        <?php endif; ?>
        <?php endforeach; ?>

        <!-- My Account -->
        <a href="<?php echo esc_url($account_url); ?>"
           class="flex items-center gap-2.5 px-5 py-3.5 text-sm font-medium text-white/80 hover:text-white hover:bg-white/5 border-t border-white/20 mt-2 transition-colors">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
            </svg>
            <?php esc_html_e('My Account', 'dawp'); ?>
        </a>
    </nav>

    <!-- Drawer footer -->
    <div class="px-5 py-5 border-t border-white/10"></div>
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
    var megaTrigger = document.getElementById('megamenu-trigger');
    var megaPanel   = document.getElementById('megamenu-shop');
    var megaChevron = document.getElementById('megamenu-chevron');

    /* --- Mobile drawer --- */
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

    /* --- Search bar (mobile) --- */
    if (srchToggle && srchBar) {
        srchToggle.addEventListener('click', function () {
            var hidden = srchBar.classList.toggle('hidden');
            if (!hidden) srchBar.querySelector('input').focus();
        });
    }

    /* --- Scroll effect --- */
    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('scrolled', window.scrollY > 4);
        }, { passive: true });
    }

    /* --- Megamenu (desktop hover + click) --- */
    var megaTimer;
    function openMega() {
        clearTimeout(megaTimer);
        if (!megaPanel) return;
        megaPanel.classList.add('is-open');
        if (megaChevron) megaChevron.style.transform = 'rotate(180deg)';
    }
    function scheduleMegaClose() {
        megaTimer = setTimeout(function () {
            if (!megaPanel) return;
            megaPanel.classList.remove('is-open');
            if (megaChevron) megaChevron.style.transform = '';
        }, 120);
    }
    if (megaTrigger && megaPanel) {
        megaTrigger.addEventListener('mouseenter', openMega);
        megaTrigger.addEventListener('mouseleave', scheduleMegaClose);
        megaPanel.addEventListener('mouseenter', function () { clearTimeout(megaTimer); });
        megaPanel.addEventListener('mouseleave', scheduleMegaClose);
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeDrawer();
            clearTimeout(megaTimer);
            if (megaPanel) {
                megaPanel.classList.remove('is-open');
                if (megaChevron) megaChevron.style.transform = '';
            }
        }
    });

    /* --- Mobile drawer sub-nav toggle --- */
    document.querySelectorAll('.drawer-sub-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var row    = btn.parentElement;
            var subNav = row.nextElementSibling;
            var chevron = btn.querySelector('.sub-chevron');
            var isOpen  = subNav.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', String(isOpen));
            if (chevron) chevron.style.transform = isOpen ? 'rotate(180deg)' : '';
        });
    });
})();
</script>

<div id="content" class="site-content">
