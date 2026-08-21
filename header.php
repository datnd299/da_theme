<?php
/**
 * Theme header.
 *
 * Hallmark · genre: modern-minimal · nav: N12 (announcement banner + retracting
 * bar over an N1b-shaped three-section layout) · design-system: .plans/design_system.md (locked)
 * N12 knobs: banner fill=gradient(accent→accent-hover) · dismiss=yes · bar scroll=frost-on-scroll
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@uswatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$home_url       = home_url('/');
$theme_img_uri  = get_template_directory_uri() . '/assets/img';
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url       = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count     = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$category_url = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$shop_categories = [
    ['title' => __('Quartz Watches', 'dawp'), 'url' => $category_url('quartz-watches')],
    ['title' => __('Mechanical Watches', 'dawp'), 'url' => $category_url('mechanical-watches')],
    ['title' => __('Smartwatches', 'dawp'), 'url' => $category_url('smartwatches')],
    ['title' => __('Digital Watches', 'dawp'), 'url' => $category_url('digital-watches')],
];

$nav_links = [
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];

$store_schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'OnlineStore',
    'name'     => 'US Watch Store',
    'url'      => home_url('/'),
    'logo'     => $theme_img_uri . '/logo.png',
    'description' => __('An American watch shop offering quartz, mechanical, smart, and digital watches curated for quality with free US shipping.', 'dawp'),
    'email'       => $support_email,
    'address'     => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => '1420 Kettner Blvd',
        'addressLocality' => 'San Diego',
        'addressRegion'   => 'CA',
        'postalCode'      => '92101',
        'addressCountry'  => 'US',
    ],
    'priceRange'  => '$$',
    'hasMerchantReturnPolicy' => [
        '@type' => 'MerchantReturnPolicy',
        'applicableCountry' => 'US',
        'returnPolicyCategory' => 'https://schema.org/MerchantReturnFiniteReturnWindow',
        'merchantReturnDays' => 30,
        'returnMethod' => 'https://schema.org/ReturnByMail',
        'returnFees' => 'https://schema.org/FreeReturn',
        'merchantReturnLink' => home_url('/return-refund-policy/'),
    ],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Inter", "Manrope", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Manrope", "Inter", system-ui, sans-serif; }
        html { scroll-behavior: smooth; overflow-x: clip; }
        body { overflow-x: clip; }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            #site-header, #site-header * { transition-duration: 1ms !important; animation-duration: 1ms !important; }
        }
    </style>

    <script type="application/ld+json">
    <?php echo wp_json_encode($store_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-background antialiased text-foreground'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[600] focus:rounded-sm focus:bg-surface focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-foreground focus:shadow-card">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="fixed inset-x-0 top-0 z-50">
    <div id="site-banner" class="nav__banner flex h-10 items-center justify-center gap-3 bg-gradient-to-r from-accent to-accent-hover px-4 text-center text-xs font-bold text-white sm:h-9 sm:text-sm">
        <p class="truncate">
            <span class="hidden sm:inline"><?php esc_html_e('Free US shipping on all orders.', 'dawp'); ?></span>
            <span class="sm:hidden"><?php esc_html_e('Free shipping on all orders.', 'dawp'); ?></span>
            <a href="<?php echo esc_url($shop_url); ?>" class="ml-1 whitespace-nowrap underline decoration-white/50 underline-offset-2 transition hover:decoration-white"><?php esc_html_e('Shop now →', 'dawp'); ?></a>
        </p>
        <button type="button" id="site-banner-dismiss" class="absolute right-3 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-sm text-white/80 transition hover:bg-white/15 hover:text-white" aria-label="<?php esc_attr_e('Dismiss announcement', 'dawp'); ?>">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
    </div>

    <div id="site-bar" class="nav__bar border-b border-transparent bg-surface/0 transition-[background-color,border-color,box-shadow] duration-300 ease-out">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-4 sm:h-[4.25rem]">
                <a href="<?php echo esc_url($home_url); ?>" class="inline-flex shrink-0 items-center gap-2 text-foreground" aria-label="<?php esc_attr_e('US Watch Store home', 'dawp'); ?>">
                    <img src="<?php echo esc_url($theme_img_uri . '/logo.png'); ?>" alt="<?php esc_attr_e('US Watch Store', 'dawp'); ?>" class="h-8 w-auto shrink-0 sm:h-9" width="143" height="80">
                </a>

                <nav class="hidden items-center gap-1 xl:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                    <div class="group relative">
                        <button type="button" class="inline-flex items-center gap-1 rounded-sm px-3 py-2 text-sm font-bold text-foreground transition hover:bg-surface-alt hover:text-accent-hover" aria-expanded="false" aria-haspopup="true">
                            <?php esc_html_e('Shop', 'dawp'); ?>
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" class="transition group-hover:rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                        </button>
                        <div class="invisible absolute left-1/2 top-full z-10 w-64 -translate-x-1/2 translate-y-1 rounded-lg border border-border bg-surface p-2 opacity-0 shadow-card-hover transition duration-150 ease-out group-hover:visible group-hover:translate-y-2 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-2 group-focus-within:opacity-100">
                            <a href="<?php echo esc_url($shop_url); ?>" class="block rounded-sm px-3 py-2 text-sm font-extrabold text-accent-hover transition hover:bg-surface-alt"><?php esc_html_e('Shop All Watches', 'dawp'); ?></a>
                            <div class="my-1 h-px bg-border"></div>
                            <?php foreach ($shop_categories as $cat) : ?>
                                <a href="<?php echo esc_url($cat['url']); ?>" class="block rounded-sm px-3 py-2 text-sm text-foreground transition hover:bg-surface-alt"><?php echo esc_html($cat['title']); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php foreach ($nav_links as $item) : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="whitespace-nowrap rounded-sm px-3 py-2 text-sm font-bold text-foreground transition hover:bg-surface-alt hover:text-accent-hover">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>

                <div class="flex shrink-0 items-center gap-2">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-sm border border-border bg-surface px-3 py-2 lg:flex">
                        <label class="sr-only" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                        <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search watches', 'dawp'); ?>" class="w-36 bg-transparent text-sm text-foreground outline-none placeholder:text-muted xl:w-44">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit" class="ml-2 inline-flex h-8 w-8 items-center justify-center rounded-sm text-accent-hover transition hover:bg-surface-alt" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m16 16 4 4"></path>
                            </svg>
                        </button>
                    </form>

                    <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-sm border border-border text-accent-hover transition hover:bg-surface-alt md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 21a8 8 0 0 0-16 0"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger relative inline-flex h-11 w-11 items-center justify-center rounded-sm bg-accent text-white transition hover:bg-accent-hover" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path>
                        </svg>
                        <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : ''; ?>
                    </a>

                    <button type="button" class="menu-toggle inline-flex h-11 w-11 items-center justify-center rounded-sm border border-border text-accent-hover transition hover:bg-surface-alt xl:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="4" y1="7" x2="20" y2="7"></line>
                            <line x1="4" y1="12" x2="20" y2="12"></line>
                            <line x1="4" y1="17" x2="20" y2="17"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-store-menu" class="main-navigation hidden border-t border-border bg-surface xl:hidden">
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-sm border border-border bg-surface-alt px-4 py-3">
                    <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search quartz, mechanical, smart, digital', 'dawp'); ?>" class="w-full bg-transparent text-sm text-foreground outline-none placeholder:text-muted">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 inline-flex h-9 w-9 items-center justify-center rounded-sm bg-surface text-accent-hover" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m16 16 4 4"></path>
                        </svg>
                    </button>
                </form>

                <p class="mb-2 text-xs font-extrabold uppercase tracking-[0.14em] text-muted"><?php esc_html_e('Shop by category', 'dawp'); ?></p>
                <nav class="mb-4 grid gap-1" aria-label="<?php esc_attr_e('Shop categories', 'dawp'); ?>">
                    <a href="<?php echo esc_url($shop_url); ?>" class="rounded-sm px-4 py-2.5 text-sm font-extrabold text-accent-hover transition hover:bg-surface-alt"><?php esc_html_e('Shop All Watches', 'dawp'); ?></a>
                    <?php foreach ($shop_categories as $cat) : ?>
                        <a href="<?php echo esc_url($cat['url']); ?>" class="rounded-sm px-4 py-2.5 text-sm font-semibold text-foreground transition hover:bg-surface-alt"><?php echo esc_html($cat['title']); ?></a>
                    <?php endforeach; ?>
                </nav>

                <nav class="grid gap-1 border-t border-border pt-3" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                    <?php foreach ($nav_links as $item) : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="rounded-sm px-4 py-3 text-base font-bold text-foreground transition hover:bg-surface-alt hover:text-accent-hover">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>

                <div class="mt-4 grid gap-3 sm:grid-cols-2">
                    <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-accent px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-accent px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                        <?php esc_html_e('My Account', 'dawp'); ?>
                    </a>
                </div>

                <p class="mt-4 text-sm leading-6 text-muted">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: 1: support email, 2: business hours */
                            __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                            '<a class="font-bold text-accent-hover" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                            esc_html($business_hours)
                        ),
                        [
                            'a' => [
                                'class' => [],
                                'href'  => [],
                            ],
                        ]
                    );
                    ?>
                </p>
            </div>
        </div>
    </div>
</header>

<div id="content" class="site-content" style="padding-top: calc(var(--header-banner-h, 2.5rem) + var(--header-bar-h, 4.25rem));">
