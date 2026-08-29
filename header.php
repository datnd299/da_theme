<?php
/**
 * Theme header — YourWatchStore.
 *
 * Premium / minimal / modern. Static announcement bar + sticky nav bar,
 * three-section layout (brand · nav · actions). Tailwind utilities only.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
$home_url       = home_url('/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url       = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count     = (function_exists('WC') && WC() && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$dawp_category_url = static function ($slug) {
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
    ['title' => __('Dive Watches', 'dawp'), 'url' => $dawp_category_url('dive-watches')],
    ['title' => __('Field Watches', 'dawp'), 'url' => $dawp_category_url('field-watches')],
    ['title' => __('Dress Watches', 'dawp'), 'url' => $dawp_category_url('dress-watches')],
    ['title' => __('Chronograph Watches', 'dawp'), 'url' => $dawp_category_url('chronograph-watches')],
];

$nav_links = [
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];

$store_schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'OnlineStore',
    'name'        => 'YourWatchStore',
    'url'         => home_url('/'),
    'description' => __('Mechanical and automatic watches for everyday wear — dive, field, dress, and chronograph timepieces with free US shipping and 30-day returns.', 'dawp'),
    'email'       => $support_email,
    'priceRange'  => '$$',
];

$wc_address_1 = get_option('woocommerce_store_address');
if (!empty($wc_address_1)) {
    $wc_city         = get_option('woocommerce_store_city');
    $wc_postcode     = get_option('woocommerce_store_postcode');
    $default_country = explode(':', (string) get_option('woocommerce_default_country'));

    $store_schema['address'] = [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $wc_address_1,
        'addressLocality' => $wc_city,
        'addressRegion'   => $default_country[1] ?? '',
        'postalCode'      => $wc_postcode,
        'addressCountry'  => $default_country[0] ?? '',
    ];
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Inter", "Manrope", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Manrope", "Inter", system-ui, sans-serif; }
        html { scroll-behavior: smooth; }
        #site-header.is-scrolled .nav__bar { box-shadow: 0 1px 0 var(--color-border), 0 6px 20px rgba(17,17,17,0.06); }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            #site-header, #site-header * { transition-duration: 1ms !important; }
        }
    </style>

    <script type="application/ld+json">
    <?php echo wp_json_encode($store_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-background text-foreground antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[600] focus:rounded-sm focus:bg-foreground focus:px-4 focus:py-3 focus:text-sm focus:font-semibold focus:text-white">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="sticky top-0 z-50">
    <div id="site-banner" class="flex h-9 items-center justify-center gap-2 bg-foreground px-4 text-center text-xs font-medium tracking-wide text-white">
        <p class="truncate">
            <?php esc_html_e('Free US shipping on every order · 30-day returns', 'dawp'); ?>
        </p>
    </div>

    <div class="nav__bar border-b border-border bg-surface transition-shadow duration-300 ease-out">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-4 lg:h-[4.5rem]">

                <a href="<?php echo esc_url($home_url); ?>" class="shrink-0" aria-label="<?php esc_attr_e('YourWatchStore home', 'dawp'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.png'); ?>" alt="<?php esc_attr_e('YourWatchStore', 'dawp'); ?>" class="h-9 w-auto sm:h-10" width="179" height="100">
                </a>

                <nav class="hidden items-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Main navigation', 'dawp'); ?>">
                    <div class="group relative">
                        <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex items-center gap-1 rounded-sm px-3 py-2 text-sm font-semibold text-foreground transition hover:text-accent-blush" aria-haspopup="true">
                            <?php esc_html_e('Shop', 'dawp'); ?>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" class="transition group-hover:rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                        </a>
                        <div class="invisible absolute left-1/2 top-full z-10 w-60 -translate-x-1/2 translate-y-1 rounded-md border border-border bg-surface p-2 opacity-0 shadow-card-hover transition duration-150 ease-out group-hover:visible group-hover:translate-y-2 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-2 group-focus-within:opacity-100">
                            <a href="<?php echo esc_url($shop_url); ?>" class="block rounded-sm px-3 py-2 text-sm font-semibold text-foreground transition hover:bg-surface-alt"><?php esc_html_e('Shop All Watches', 'dawp'); ?></a>
                            <div class="my-1 h-px bg-border"></div>
                            <?php foreach ($shop_categories as $cat) : ?>
                                <a href="<?php echo esc_url($cat['url']); ?>" class="block rounded-sm px-3 py-2 text-sm text-foreground-muted transition hover:bg-surface-alt hover:text-foreground"><?php echo esc_html($cat['title']); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php foreach ($nav_links as $item) : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="whitespace-nowrap rounded-sm px-3 py-2 text-sm font-semibold text-foreground transition hover:text-accent-blush">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>

                <div class="flex shrink-0 items-center gap-1.5">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-sm border border-border bg-surface px-3 py-2 xl:flex">
                        <label class="sr-only" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                        <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search watches', 'dawp'); ?>" class="w-40 bg-transparent text-sm text-foreground outline-none placeholder:text-muted">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit" class="ml-2 inline-flex h-6 w-6 items-center justify-center text-foreground-muted transition hover:text-foreground" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                            <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                        </button>
                    </form>

                    <button type="button" id="sgs-mobile-search-toggle" class="inline-flex h-11 w-11 items-center justify-center rounded-sm text-foreground transition hover:bg-surface-alt xl:hidden" aria-expanded="false" aria-controls="sgs-mobile-search" aria-label="<?php esc_attr_e('Toggle search', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                    </button>

                    <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-sm text-foreground transition hover:bg-surface-alt md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </a>

                    <a href="<?php echo esc_url($cart_url); ?>" id="dawp-cart-toggle" class="site-cart-btn relative inline-flex h-11 w-11 items-center justify-center rounded-sm bg-foreground text-white transition hover:bg-accent-hover" aria-label="<?php esc_attr_e('Open cart', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path></svg>
                        <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : ''; ?>
                    </a>

                    <button type="button" id="sgs-mobile-toggle" class="inline-flex h-11 w-11 items-center justify-center rounded-sm text-foreground transition hover:bg-surface-alt lg:hidden" aria-expanded="false" aria-controls="sgs-mobile-menu" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
                    </button>
                </div>
            </div>

            <div id="sgs-mobile-search" class="hidden pb-4 xl:hidden">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center rounded-sm border border-border bg-surface-alt px-4 py-3">
                    <label class="sr-only" for="sgs-mobile-search-input"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="sgs-mobile-search-input" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search dive, field, dress, chronograph', 'dawp'); ?>" class="w-full bg-transparent text-sm text-foreground outline-none placeholder:text-muted">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 inline-flex h-8 w-8 items-center justify-center text-foreground" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <div id="sgs-mobile-menu" class="hidden border-t border-border bg-surface lg:hidden">
            <div class="mx-auto max-w-[1280px] px-4 py-4 sm:px-6">
                <p class="mb-2 text-xs font-bold uppercase tracking-[0.14em] text-muted"><?php esc_html_e('Shop by style', 'dawp'); ?></p>
                <nav class="mb-4 grid gap-1" aria-label="<?php esc_attr_e('Shop categories', 'dawp'); ?>">
                    <a href="<?php echo esc_url($shop_url); ?>" class="rounded-sm px-3 py-2.5 text-sm font-semibold text-foreground transition hover:bg-surface-alt"><?php esc_html_e('Shop All Watches', 'dawp'); ?></a>
                    <?php foreach ($shop_categories as $cat) : ?>
                        <a href="<?php echo esc_url($cat['url']); ?>" class="rounded-sm px-3 py-2.5 text-sm text-foreground-muted transition hover:bg-surface-alt hover:text-foreground"><?php echo esc_html($cat['title']); ?></a>
                    <?php endforeach; ?>
                </nav>

                <nav class="grid gap-1 border-t border-border pt-3" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
                    <?php foreach ($nav_links as $item) : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="rounded-sm px-3 py-3 text-base font-semibold text-foreground transition hover:bg-surface-alt">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endforeach; ?>
                    <a href="<?php echo esc_url($account_url); ?>" class="rounded-sm px-3 py-3 text-base font-semibold text-foreground transition hover:bg-surface-alt"><?php esc_html_e('My Account', 'dawp'); ?></a>
                </nav>

                <p class="mt-4 text-sm leading-6 text-foreground-muted">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: 1: support email, 2: business hours */
                            __('Questions? Email %1$s. Hours: %2$s.', 'dawp'),
                            '<a class="font-semibold text-accent-blush" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                            esc_html($business_hours)
                        ),
                        ['a' => ['class' => [], 'href' => []]]
                    );
                    ?>
                </p>
            </div>
        </div>
    </div>
</header>

<div id="content" class="site-content">
