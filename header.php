<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;700;800;900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white font-sans text-[#101828] antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/');

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];

$support_email = 'support@eliteshopexpress.com';
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#E5E7EB] bg-white/95 text-[#101828] shadow-sm backdrop-blur" role="banner">
    <div class="bg-[#101828] text-white">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-2 px-4 py-2 text-center text-xs font-bold sm:flex-row sm:px-6 lg:px-8">
            <p class="uppercase tracking-[0.16em] text-[#67E8F9]">
                <?php esc_html_e('Everyday essentials, delivered with ease', 'dawp'); ?>
            </p>
            <p class="text-white/75">
                <?php esc_html_e('Support:', 'dawp'); ?>
                <a class="font-black text-white hover:text-[#67E8F9]" href="mailto:<?php echo esc_attr($support_email); ?>">
                    <?php echo esc_html($support_email); ?>
                </a>
                <span class="mx-2 text-white/30" aria-hidden="true">|</span>
                <?php esc_html_e('Mon-Fri, 9:00 AM-6:00 PM EST', 'dawp'); ?>
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="group inline-flex h-12 w-[160px] shrink-0 items-center justify-start sm:h-14 sm:w-[205px]"
               aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'Elite Shop Express'); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/elite-shop-express-logo.png'); ?>"
                     alt="<?php echo esc_attr(get_bloginfo('name') ?: 'Elite Shop Express'); ?>"
                     class="block h-full w-full object-contain object-left transition duration-200 group-hover:scale-[1.02]"
                     width="799"
                     height="245"
                     decoding="async"
                     fetchpriority="high">
            </a>

            <nav class="hidden flex-1 items-center justify-center gap-5 lg:flex" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"
                       class="whitespace-nowrap text-sm font-black uppercase tracking-wide text-[#475467] transition hover:text-[#2563EB]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2 sm:gap-3">
                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      autocomplete="off"
                      class="hidden items-center xl:flex">
                    <label for="elite-header-search" class="sr-only">
                        <?php esc_html_e('Search products', 'dawp'); ?>
                    </label>
                    <input id="elite-header-search"
                           type="search"
                           name="s"
                           autocomplete="off"
                           placeholder="<?php esc_attr_e('Search essentials', 'dawp'); ?>"
                           class="h-11 w-48 rounded-full border border-[#D0D5DD] bg-[#F8FAFC] px-4 text-sm text-[#101828] placeholder:text-[#667085] outline-none transition focus:border-[#2563EB] focus:bg-white focus:ring-2 focus:ring-[#DBEAFE]">
                    <input type="hidden" name="post_type" value="product">
                </form>

                <button type="button"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[#D0D5DD] text-[#475467] transition hover:border-[#2563EB] hover:text-[#2563EB] xl:hidden"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>"
                        onclick="document.getElementById('elite-mobile-search').classList.toggle('hidden')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>

                <a href="<?php echo esc_url($account_url); ?>"
                   class="hidden h-11 w-11 items-center justify-center rounded-full border border-[#D0D5DD] text-[#475467] transition hover:border-[#2563EB] hover:text-[#2563EB] sm:inline-flex"
                   aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>"
                   class="relative inline-flex min-h-11 items-center justify-center rounded-full bg-[#2563EB] px-4 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#06B6D4]"
                   aria-label="<?php esc_attr_e('Shopping Cart', 'dawp'); ?>">
                    <?php esc_html_e('Cart', 'dawp'); ?>
                    <span class="ml-1">(<?php echo esc_html($cart_count); ?>)</span>
                </a>

                <button type="button"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[#D0D5DD] text-[#475467] transition hover:border-[#2563EB] hover:text-[#2563EB] lg:hidden"
                        aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>"
                        onclick="document.getElementById('elite-mobile-menu').classList.toggle('hidden')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="elite-mobile-search" class="hidden border-t border-[#E5E7EB] bg-white xl:hidden">
        <form role="search"
              method="get"
              action="<?php echo esc_url(home_url('/')); ?>"
              autocomplete="off"
              class="mx-auto flex max-w-7xl items-center gap-2 px-4 py-3 sm:px-6 lg:px-8">
            <label for="elite-mobile-search-input" class="sr-only">
                <?php esc_html_e('Search products', 'dawp'); ?>
            </label>
            <input id="elite-mobile-search-input"
                   type="search"
                   name="s"
                   autocomplete="off"
                   placeholder="<?php esc_attr_e('Search home, care, accessories...', 'dawp'); ?>"
                   class="h-11 flex-1 rounded-full border border-[#D0D5DD] bg-[#F8FAFC] px-4 text-sm text-[#101828] placeholder:text-[#667085] outline-none focus:border-[#2563EB] focus:bg-white focus:ring-2 focus:ring-[#DBEAFE]">
            <input type="hidden" name="post_type" value="product">
            <button type="submit"
                    class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#101828] text-white transition hover:bg-[#2563EB]"
                    aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>

    <div id="elite-mobile-menu" class="hidden border-t border-[#E5E7EB] bg-white lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-xl px-4 py-3 text-sm font-black uppercase tracking-wide text-[#475467] transition hover:bg-[#F3F7FB] hover:text-[#2563EB]">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
