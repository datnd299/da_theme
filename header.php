<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
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
            box-shadow: 0 14px 30px rgba(47, 42, 40, 0.1);
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : wp_login_url();
$site_name   = get_bloginfo('name');
$logo_url    = get_template_directory_uri() . '/assets/img/gallery/Logo_all (10).png';

$nav_items = [
    ['title' => __('Home', 'dawp'),    'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'),    'url' => home_url('/shop/')],
    ['title' => __('About', 'dawp'),   'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>

<div class="hidden bg-[#2F2A28] px-4 py-2 text-center text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8] md:block">
    <?php esc_html_e('Free shipping on all orders', 'dawp'); ?>
</div>

<header id="site-header" class="sticky left-0 right-0 top-0 z-50 border-b border-[#E6DDD6] bg-white/95 backdrop-blur" role="banner">
    <div class="mx-auto flex h-16 w-[min(100%,1280px)] items-center justify-between gap-3 px-4 lg:h-20 lg:px-6">
        <button id="menu-toggle"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-md text-[#2F2A28] transition-colors hover:bg-[#F4ECE5] lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-drawer"
                aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0" aria-label="<?php echo esc_attr($site_name); ?>">
            <img
                src="<?php echo esc_url($logo_url); ?>"
                alt="<?php echo esc_attr($site_name); ?>"
                class="h-12 w-auto lg:h-14"
                decoding="async">
        </a>

        <nav class="hidden flex-1 items-center justify-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) :
                $is_current = function_exists('dawp_is_current_url') ? dawp_is_current_url($item['url']) : false;
            ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-full px-4 py-2 text-sm font-bold text-[#2F2A28] transition-colors hover:bg-[#F4ECE5] hover:text-[#C98A8A] <?php echo $is_current ? 'bg-[#F4ECE5] text-[#C98A8A]' : ''; ?>"
                   <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="flex shrink-0 items-center justify-end gap-1">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden lg:block">
                <label class="sr-only" for="header-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <div class="relative">
                    <input id="header-search"
                           type="search"
                           name="s"
                           value="<?php echo esc_attr(get_search_query()); ?>"
                           placeholder="<?php esc_attr_e('Search products', 'dawp'); ?>"
                           class="h-10 w-56 rounded-full border border-[#D8CEC6] bg-[#F8F3EC] pl-4 pr-10 text-sm text-[#2F2A28] outline-none transition-colors placeholder:text-[#948984] focus:border-[#C98A8A]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="absolute right-0 top-0 flex h-10 w-10 items-center justify-center text-[#6F625D] transition-colors hover:text-[#C98A8A]" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <button id="mobile-search-toggle" class="flex h-10 w-10 items-center justify-center rounded-md text-[#2F2A28] transition-colors hover:bg-[#F4ECE5] lg:hidden" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>

            <a href="<?php echo esc_url($account_url); ?>" class="hidden h-10 w-10 items-center justify-center rounded-md text-[#2F2A28] transition-colors hover:bg-[#F4ECE5] lg:flex" aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"></path>
                </svg>
            </a>

            <a href="<?php echo esc_url($cart_url); ?>" class="relative flex h-10 w-10 items-center justify-center rounded-md text-[#2F2A28] transition-colors hover:bg-[#F4ECE5]" aria-label="<?php printf(esc_attr__('Cart (%d items)', 'dawp'), $cart_count); ?>">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <path d="M3 6h18"></path>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <?php if ($cart_count > 0) : ?>
                    <span class="absolute -right-0.5 -top-0.5 flex h-[18px] min-w-[18px] items-center justify-center rounded-full bg-[#C98A8A] px-1 text-[10px] font-bold leading-none text-white" aria-hidden="true">
                        <?php echo esc_html($cart_count); ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
    </div>

    <div id="mobile-search-bar" class="hidden border-t border-[#E6DDD6] bg-white px-4 py-3 lg:hidden">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
            <label class="sr-only" for="mobile-header-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
            <input id="mobile-header-search"
                   type="search"
                   name="s"
                   value="<?php echo esc_attr(get_search_query()); ?>"
                   placeholder="<?php esc_attr_e('Search products', 'dawp'); ?>"
                   class="h-11 w-full rounded-full border border-[#D8CEC6] bg-[#F8F3EC] pl-4 pr-11 text-sm text-[#2F2A28] outline-none focus:border-[#C98A8A]">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" class="absolute right-0 top-0 flex h-11 w-11 items-center justify-center text-[#6F625D]" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>
</header>

<div id="drawer-overlay" class="fixed inset-0 z-40 bg-black/45" aria-hidden="true"></div>

<aside id="mobile-drawer" class="fixed left-0 top-0 z-50 h-full w-[calc(100%-4rem)] max-w-sm overflow-y-auto bg-white shadow-2xl" aria-label="<?php esc_attr_e('Mobile Navigation', 'dawp'); ?>">
    <div class="flex h-16 items-center justify-between border-b border-[#E6DDD6] px-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0" aria-label="<?php echo esc_attr($site_name); ?>">
            <img
                src="<?php echo esc_url($logo_url); ?>"
                alt="<?php echo esc_attr($site_name); ?>"
                class="h-12 w-auto"
                decoding="async">
        </a>
        <button id="drawer-close" class="flex h-10 w-10 items-center justify-center rounded-md text-[#2F2A28] transition-colors hover:bg-[#F4ECE5]" aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>">
            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
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
               class="flex items-center border-b border-[#E6DDD6] px-5 py-4 text-sm font-bold transition-colors <?php echo $is_current ? 'bg-[#F4ECE5] text-[#C98A8A]' : 'text-[#2F2A28] hover:bg-[#F8F3EC]'; ?>"
               <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                <?php echo esc_html($item['title']); ?>
            </a>
        <?php endforeach; ?>

        <a href="<?php echo esc_url($account_url); ?>" class="mt-2 flex items-center gap-3 px-5 py-4 text-sm font-bold text-[#2F2A28] transition-colors hover:bg-[#F8F3EC]">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <circle cx="12" cy="8" r="4"></circle>
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"></path>
            </svg>
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
            var isHidden = searchBar.classList.toggle('hidden');
            if (!isHidden) {
                var input = searchBar.querySelector('input[type="search"]');
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
