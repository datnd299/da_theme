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
        'shipping-returns'     => 'shipping-policy',
        'warranty'             => 'service-warranty',
        'return-refund-policy' => 'returns',
        'refund-return-policy' => 'returns',
        'billing'              => 'billing-terms',
        'billing-policy'       => 'billing-terms',
        'terms-of-service'     => 'terms-conditions',
        'terms'                => 'terms-conditions',
        'shop-by-theme'        => 'shop',
        'shop-by-categories'   => 'shop',
        'collections'          => 'shop',
        'about'                => 'about-us',
        'contact'              => 'contact-us',
        'custom'               => '',
        'bespoke'              => '',
        'custom-watches'       => '',
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
            'seo_title'   => 'CHRONEL | Handcrafted Luxury Watches',
            'description' => 'CHRONEL builds luxury watches by hand in the United States, powered by carefully selected automatic movements. Four collections, a five-year movement warranty, and lifetime service.',
            'image'       => 'assets/img/hero/hero-watch.png',
            'canonical'   => home_url('/'),
            'schema_type' => 'CollectionPage',
        ],
        'about-us' => [
            'slug'        => 'about',
            'title'       => 'The Atelier',
            'seo_title'   => 'The Atelier | How a CHRONEL Watch Is Made',
            'description' => 'Inside the CHRONEL atelier: 316L steel cases finished by hand, sapphire crystals, and carefully selected automatic movements regulated in five positions before delivery.',
            'image'       => 'assets/img/atelier/movement.jpeg',
            'schema_type' => 'AboutPage',
        ],
        'contact-us' => [
            'slug'        => 'contact',
            'title'       => 'Contact',
            'seo_title'   => 'Contact CHRONEL | Client Care',
            'description' => 'Reach CHRONEL client care for orders, servicing, warranty claims, and delivery questions. Monday to Friday, 9:00 AM to 5:00 PM Eastern Time.',
            'image'       => 'assets/img/chronel_logo_black.png',
            'schema_type' => 'ContactPage',
        ],
        'faq' => [
            'slug'        => 'faq',
            'title'       => 'FAQ',
            'seo_title'   => 'Frequently Asked Questions | CHRONEL',
            'description' => 'Answers on CHRONEL movements, water resistance, sizing, servicing intervals, the five-year warranty, insured shipping, and returns.',
            'image'       => 'assets/img/watches/meridian.jpeg',
            'schema_type' => 'FAQPage',
        ],
        'shipping-policy' => [
            'slug'        => 'shipping-policy',
            'title'       => 'Shipping Policy',
            'seo_title'   => 'Shipping Policy | CHRONEL',
            'description' => 'CHRONEL order cutoff, handling, and transit times, and how insured delivery works across the United States.',
            'image'       => 'assets/img/atelier/workbench.jpeg',
            'schema_type' => 'WebPage',
        ],
        'service-warranty' => [
            'slug'        => 'service-warranty',
            'title'       => 'Service & Warranty',
            'seo_title'   => 'Service & Warranty | CHRONEL',
            'description' => 'CHRONEL covers every movement for five years and offers a lifetime service programme for as long as you own the watch.',
            'image'       => 'assets/img/atelier/movement.jpeg',
            'schema_type' => 'WebPage',
        ],
        'returns' => [
            'slug'        => 'refund-return-policy',
            'title'       => 'Return & Refund Policy',
            'seo_title'   => 'Return & Refund Policy | CHRONEL',
            'description' => 'Return an unworn CHRONEL watch within 30 days in its original condition, with box, papers, and links. Refunds are issued to the original payment method.',
            'image'       => 'assets/img/watches/abyss.jpeg',
            'schema_type' => 'WebPage',
        ],
        'billing-terms' => [
            'slug'        => 'billing-terms',
            'title'       => 'Billing Terms & Conditions',
            'seo_title'   => 'Billing Terms & Conditions | CHRONEL',
            'description' => 'How CHRONEL charges and processes payment: accepted methods, currency, sales tax, billing accuracy, and payment security.',
            'image'       => 'assets/img/chronel_logo_black.png',
            'schema_type' => 'WebPage',
        ],
        'terms-conditions' => [
            'slug'        => 'terms-conditions',
            'title'       => 'Terms of Service',
            'seo_title'   => 'Terms of Service | CHRONEL',
            'description' => 'The terms governing use of the CHRONEL website, orders, pricing, warranty coverage, and limitation of liability.',
            'image'       => 'assets/img/chronel_logo_black.png',
            'schema_type' => 'WebPage',
        ],
        'privacy-policy' => [
            'slug'        => 'privacy',
            'title'       => 'Privacy Policy',
            'seo_title'   => 'Privacy Policy | CHRONEL',
            'description' => 'How CHRONEL collects, uses, and protects personal information for orders, payment, delivery, servicing records, and client care.',
            'image'       => 'assets/img/chronel_logo_black.png',
            'schema_type' => 'PrivacyPolicy',
        ],
        'track-order' => [
            'slug'        => 'track-order',
            'title'       => 'Track Your Order',
            'css'         => 'track-order.css',
            'seo_title'   => 'Track Your Order | CHRONEL',
            'description' => 'Follow a CHRONEL order from the atelier to your door with your order number and the email used at checkout.',
            'image'       => 'assets/img/watches/aviator.jpeg',
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

    foreach ((array) $pages[$request_uri]['css'] as $index => $css) {
        $css_file_name = ltrim($css, '/');
        $css_file_path = get_template_directory() . '/assets/css/' . $css_file_name;
        $css_file_url  = get_template_directory_uri() . '/assets/css/' . $css_file_name;

        wp_enqueue_style(
            'dawp-virtual-page-' . sanitize_title($request_uri) . ($index ? '-' . $index : ''),
            $css_file_url,
            ['dawp-main'],
            file_exists($css_file_path) ? filemtime($css_file_path) : '1.0.0'
        );
    }
}
