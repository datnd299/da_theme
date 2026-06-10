<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;900&family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-[#141217] font-body antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count = 0;
if (function_exists('WC') && WC() && isset(WC()->cart) && WC()->cart) {
    $cart_count = WC()->cart->get_cart_contents_count();
}

$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = home_url('/my-account/');
$account_id  = (int) get_option('woocommerce_myaccount_page_id');
if ($account_id > 0) {
    $account_permalink = get_permalink($account_id);
    if ($account_permalink) {
        $account_url = $account_permalink;
    }
}

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
];
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#EEE5EF] bg-white shadow-lg shadow-[#141217]/10" role="banner">
    <div class="bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]">
        <div class="mx-auto flex max-w-7xl items-center justify-center px-4 py-2 text-center text-xs font-black uppercase tracking-[0.18em] text-white sm:px-6 lg:px-8">
            <?php esc_html_e('Everyday footwear for comfort, style, and confident steps', 'dawp'); ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="inline-flex shrink-0 items-center"
               aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'House of Shoes Online'); ?>">
                <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/image.png', [
                         'width'   => 96,
                         'height'  => 96,
                         'srcset'  => [[48, 48], [96, 96], [144, 144]],
                         'sizes'   => '48px',
                         'loading' => 'eager',
                     ]); ?>
                     alt="<?php echo esc_attr(get_bloginfo('name') ?: 'House of Shoes Online'); ?>"
                     class="h-12 w-12 rounded-full object-contain">
            </a>

            <nav class="hidden items-center justify-center gap-6 lg:flex" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"
                       class="whitespace-nowrap text-sm font-black uppercase tracking-wide text-[#141217] transition hover:text-[#E6007E]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-3">
                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      class="hidden items-center md:flex">
                    <label for="house-shoes-header-search" class="sr-only">
                        <?php esc_html_e('Search products', 'dawp'); ?>
                    </label>
                    <input id="house-shoes-header-search"
                           type="search"
                           name="s"
                           placeholder="<?php esc_attr_e('Search shoes', 'dawp'); ?>"
                           class="h-10 w-36 rounded-full border border-[#EEE5EF] bg-[#F6F5F7] px-4 text-sm text-[#141217] placeholder:text-[#6F625D] outline-none transition focus:border-[#E6007E] focus:bg-white lg:w-44">
                </form>

                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#EEE5EF] text-[#141217] transition hover:border-[#E6007E] hover:text-[#E6007E] md:hidden"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>"
                        onclick="document.getElementById('house-shoes-mobile-search').classList.toggle('hidden')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>

                <a href="<?php echo esc_url($account_url); ?>"
                   class="hidden h-10 w-10 items-center justify-center rounded-full border border-[#EEE5EF] text-[#141217] transition hover:border-[#E6007E] hover:text-[#E6007E] sm:inline-flex"
                   aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>"
                   class="relative inline-flex min-h-10 items-center justify-center rounded-full bg-[#E6007E] px-4 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]"
                   aria-label="<?php esc_attr_e('Shopping Cart', 'dawp'); ?>">
                    <?php esc_html_e('Bag', 'dawp'); ?>
                    <span class="ml-1">(<?php echo esc_html($cart_count); ?>)</span>
                </a>

                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#EEE5EF] text-[#141217] transition hover:border-[#E6007E] hover:text-[#E6007E] lg:hidden"
                        aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>"
                        onclick="document.getElementById('house-shoes-mobile-menu').classList.toggle('hidden')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="house-shoes-mobile-search" class="hidden border-t border-[#EEE5EF] bg-white md:hidden">
        <form role="search"
              method="get"
              action="<?php echo esc_url(home_url('/')); ?>"
              class="mx-auto flex max-w-7xl items-center gap-2 px-4 py-3">
            <input type="search"
                   name="s"
                   placeholder="<?php esc_attr_e('Search shoes...', 'dawp'); ?>"
                   autofocus
                   class="h-10 flex-1 rounded-full border border-[#EEE5EF] bg-[#F6F5F7] px-4 text-sm text-[#141217] placeholder:text-[#6F625D] outline-none focus:border-[#E6007E] focus:bg-white">
            <button type="submit"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#E6007E] text-white transition hover:bg-[#7C3AED]"
                    aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>

    <div id="house-shoes-mobile-menu" class="hidden border-t border-[#EEE5EF] bg-white lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-2xl px-4 py-3 text-sm font-black uppercase tracking-wide text-[#141217] transition hover:bg-[#F3E8FF] hover:text-[#E6007E]">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
