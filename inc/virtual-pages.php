<?php
/**
 * Virtual pages — hardcoded static pages served from template-parts.
 * See .plans/site.md §3.
 */

defined('ABSPATH') || exit;

/**
 * Old paths from the previous brand, and shorter aliases, mapped to live routes.
 */
function dawp_virtual_page_redirects() {
    return [
        'shipping-returns'     => 'service-warranty',
        'shipping-policy'      => 'service-warranty',
        'warranty'             => 'service-warranty',
        'return-refund-policy' => 'returns',
        'refund-return-policy' => 'returns',
        'shop-by-theme'        => 'collections',
        'shop-by-categories'   => 'collections',
        'about'                => 'about-us',
        'contact'              => 'contact-us',
        'bespoke'              => 'custom',
        'custom-watches'       => 'custom',
    ];
}

add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri   = dawp_current_virtual_page_key(false);
    $virtual_pages = dawp_virtual_page_map();
    $redirects     = dawp_virtual_page_redirects();

    if (isset($redirects[$request_uri])) {
        wp_safe_redirect(home_url('/' . $redirects[$request_uri] . '/'), 301);
        exit;
    }

    if (!isset($virtual_pages[$request_uri])) {
        return;
    }

    $page = $virtual_pages[$request_uri];
    status_header(200);
    nocache_headers();

    global $wp_query;
    $wp_query->is_404      = false;
    $wp_query->is_page     = true;
    $wp_query->is_singular = true;

    get_header();
    echo '<main class="virtual-page virtual-page--' . esc_attr($page['slug']) . '">';
    get_template_part('template-parts/page', $page['slug']);
    echo '</main>';
    get_footer();
    exit;
}

function dawp_virtual_page_map() {
    return [
        'home' => [
            'slug'        => 'home',
            'title'       => 'Home',
            'css'         => 'tw/tw-home.css',
            'seo_title'   => 'CHRONEL | Handcrafted Luxury Watches, Made in America',
            'description' => 'CHRONEL builds luxury watches by hand in the United States, powered by Japanese automatic movements. Four collections, a five-year movement warranty, and lifetime service.',
            'image'       => 'assets/img/hero/hero-watch.svg',
            'canonical'   => home_url('/'),
            'schema_type' => 'CollectionPage',
        ],
        'collections' => [
            'slug'        => 'collections',
            'title'       => 'Collections',
            'css'         => 'tw/tw-collections.css',
            'seo_title'   => 'Collections | CHRONEL Handcrafted Watches',
            'description' => 'Four CHRONEL collections: The Meridian dress watch, The Abyss diver, The Sovereign day-date, and The Aviator with a second time zone.',
            'image'       => 'assets/img/watches/meridian.svg',
            'schema_type' => 'CollectionPage',
        ],
        'custom' => [
            'slug'        => 'custom',
            'title'       => 'Bespoke',
            'css'         => 'tw/tw-custom.css',
            'seo_title'   => 'Bespoke Commission | CHRONEL Custom Watches',
            'description' => 'Commission a CHRONEL watch built to your specification. Case, dial, hands, and engraving decided with our atelier, then assembled by hand over twelve weeks.',
            'image'       => 'assets/img/atelier/workbench.svg',
            'schema_type' => 'Service',
        ],
        'about-us' => [
            'slug'        => 'about',
            'title'       => 'The Atelier',
            'css'         => 'tw/tw-about.css',
            'seo_title'   => 'The Atelier | How a CHRONEL Watch Is Made',
            'description' => 'Inside the CHRONEL atelier: 316L steel cases finished by hand, sapphire crystals, and Japanese automatic movements regulated in five positions before delivery.',
            'image'       => 'assets/img/atelier/movement.svg',
            'schema_type' => 'AboutPage',
        ],
        'contact-us' => [
            'slug'        => 'contact',
            'title'       => 'Contact',
            'css'         => 'tw/tw-contact.css',
            'seo_title'   => 'Contact CHRONEL | Client Care',
            'description' => 'Reach CHRONEL client care for orders, servicing, warranty claims, bespoke commissions, and delivery questions. Monday to Friday, 9:00 AM to 6:00 PM PST.',
            'image'       => 'assets/img/logo-chronel.svg',
            'schema_type' => 'ContactPage',
        ],
        'faq' => [
            'slug'        => 'faq',
            'title'       => 'FAQ',
            'css'         => 'tw/tw-faq.css',
            'seo_title'   => 'Frequently Asked Questions | CHRONEL',
            'description' => 'Answers on CHRONEL movements, water resistance, sizing, servicing intervals, the five-year warranty, insured shipping, returns, and bespoke commissions.',
            'image'       => 'assets/img/watches/meridian.svg',
            'schema_type' => 'FAQPage',
        ],
        'service-warranty' => [
            'slug'        => 'shipping-policy',
            'title'       => 'Service & Warranty',
            'css'         => 'tw/tw-legal.css',
            'seo_title'   => 'Shipping, Service & Warranty | CHRONEL',
            'description' => 'CHRONEL ships insured and signature-required across the United States, and covers every movement for five years with a lifetime service programme.',
            'image'       => 'assets/img/atelier/workbench.svg',
            'schema_type' => 'WebPage',
        ],
        'returns' => [
            'slug'        => 'refund-return-policy',
            'title'       => 'Returns',
            'css'         => 'tw/tw-legal.css',
            'seo_title'   => 'Returns & Refunds | CHRONEL',
            'description' => 'Return an unworn CHRONEL watch within 30 days in its original condition, with box, papers, and links. Refunds are issued to the original payment method.',
            'image'       => 'assets/img/watches/abyss.svg',
            'schema_type' => 'WebPage',
        ],
        'terms-conditions' => [
            'slug'        => 'terms-conditions',
            'title'       => 'Terms & Conditions',
            'css'         => 'tw/tw-legal.css',
            'seo_title'   => 'Terms & Conditions | CHRONEL',
            'description' => 'The terms governing use of the CHRONEL website, orders, pricing, bespoke commissions, warranty coverage, and limitation of liability.',
            'image'       => 'assets/img/logo-chronel.svg',
            'schema_type' => 'WebPage',
        ],
        'privacy-policy' => [
            'slug'        => 'privacy',
            'title'       => 'Privacy Policy',
            'css'         => 'tw/tw-legal.css',
            'seo_title'   => 'Privacy Policy | CHRONEL',
            'description' => 'How CHRONEL collects, uses, and protects personal information for orders, payment, delivery, servicing records, and client care.',
            'image'       => 'assets/img/logo-chronel.svg',
            'schema_type' => 'PrivacyPolicy',
        ],
        'track-order' => [
            'slug'        => 'track-order',
            'title'       => 'Track Your Order',
            'css'         => 'track-order.css',
            'seo_title'   => 'Track Your Order | CHRONEL',
            'description' => 'Follow a CHRONEL order from the atelier to your door with your order number and the email used at checkout.',
            'image'       => 'assets/img/watches/aviator.svg',
            'schema_type' => 'WebPage',
        ],
    ];
}

function dawp_current_virtual_page_key($include_front_page = true) {
    $request_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path    = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && ($request_path === $home_path || strpos($request_path, $home_path . '/') === 0)) {
        $request_path = trim(substr($request_path, strlen($home_path)), '/');
    }

    if ($include_front_page && ($request_path === '' || (function_exists('is_front_page') && is_front_page()))) {
        return 'home';
    }

    return $request_path;
}

function dawp_get_current_virtual_page($include_front_page = true) {
    $key = dawp_current_virtual_page_key($include_front_page);
    $map = dawp_virtual_page_map();

    return isset($map[$key]) ? array_merge(['path' => $key], $map[$key]) : null;
}

function dawp_virtual_page_canonical($page) {
    if (!empty($page['canonical'])) {
        return $page['canonical'];
    }

    return home_url('/' . trim($page['path'], '/') . '/');
}

function dawp_virtual_page_image_url($page) {
    if (empty($page['image'])) {
        return '';
    }

    return get_template_directory_uri() . '/' . ltrim($page['image'], '/');
}

function dawp_virtual_page_image_path($page) {
    if (empty($page['image'])) {
        return '';
    }

    return get_template_directory() . '/' . ltrim($page['image'], '/');
}

function dawp_virtual_page_modified_time($page, $format = 'c') {
    $timestamps = [];

    if (!empty($page['slug'])) {
        $template_path = get_template_directory() . '/template-parts/page-' . $page['slug'] . '.php';

        if (file_exists($template_path)) {
            $timestamps[] = filemtime($template_path);
        }
    }

    $image_path = dawp_virtual_page_image_path($page);

    if ($image_path && file_exists($image_path)) {
        $timestamps[] = filemtime($image_path);
    }

    $timestamp = $timestamps ? max($timestamps) : filemtime(__FILE__);

    return gmdate($format, $timestamp);
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $page = dawp_get_current_virtual_page(true);

    if ($page) {
        $parts['title'] = $page['title'];
    }

    return $parts;
}

add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');
function dawp_virtual_page_assets() {
    $request_uri = dawp_current_virtual_page_key(false);
    $pages       = dawp_virtual_page_map();

    if (!isset($pages[$request_uri]) || empty($pages[$request_uri]['css'])) {
        return;
    }

    $css_file_name = ltrim($pages[$request_uri]['css'], '/');
    $css_file_path = get_template_directory() . '/assets/css/' . $css_file_name;
    $css_file_url  = get_template_directory_uri() . '/assets/css/' . $css_file_name;

    wp_enqueue_style(
        'dawp-virtual-page-' . sanitize_title($request_uri),
        $css_file_url,
        ['dawp-main'],
        file_exists($css_file_path) ? filemtime($css_file_path) : '1.0.0'
    );
}
