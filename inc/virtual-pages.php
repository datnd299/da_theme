<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_current_request_path();
    $virtual_pages = dawp_virtual_page_map();

    if (!isset($virtual_pages[$request_uri])) {
        return;
    }

    $page = $virtual_pages[$request_uri];
    status_header(200);
    nocache_headers();

    global $wp_query;
    $wp_query->is_404 = false;
    $wp_query->is_page = true;
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
        'about-us' => [
            'slug' => 'about',
            'title' => 'About Us',
            'seo_title' => 'About Crestovia | Beauty Essentials & Personal Care',
            'description' => 'Learn about Crestovia, a U.S. beauty essentials store offering practical makeup tools, beauty accessories, hair care items, and personal care products.',
            'schema_type' => 'AboutPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Beauty_Organizers.png',
            'css' => 'tw-about.css',
        ],
        'faq' => [
            'slug' => 'faq',
            'title' => 'FAQ',
            'seo_title' => 'FAQ | Orders, Shipping, Returns & Support | Crestovia',
            'description' => 'Find answers about Crestovia orders, free U.S. shipping, delivery times, returns, refunds, payments, privacy, and customer support.',
            'schema_type' => 'FAQPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Beauty_Essentials_Personal_Care.png',
            'css' => 'tw-faq.css',
        ],
        'contact-us' => [
            'slug' => 'contact',
            'title' => 'Contact Us',
            'seo_title' => 'Contact Crestovia | Customer Support',
            'description' => 'Contact Crestovia customer support for order help, shipping questions, returns, refunds, and beauty essentials product support.',
            'schema_type' => 'ContactPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Beauty_Accessories.png',
            'css' => 'tw-contact.css',
        ],
        'shipping-policy' => [
            'slug' => 'shipping-policy',
            'title' => 'Shipping Policy',
            'seo_title' => 'Shipping Policy | Free U.S. Shipping | Crestovia',
            'description' => 'Review Crestovia shipping locations, free standard U.S. shipping, 1-3 business day handling, 10-15 business day transit, tracking, and support details.',
            'schema_type' => 'WebPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Beauty_Essentials_Personal_Care.png',
            'css' => 'tw-policy.css',
        ],
        'return-refund-policy' => [
            'slug' => 'return-refund-policy',
            'title' => 'Return & Refund Policy',
            'seo_title' => 'Return & Refund Policy | Crestovia',
            'description' => 'Read Crestovia return eligibility, 30-day return window, return shipping fees, refund timing, exchanges, damaged items, and customer support details.',
            'schema_type' => 'WebPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Makeup_Tools_Beauty_Accessories.png',
            'css' => 'tw-policy.css',
        ],
        'terms-conditions' => [
            'slug' => 'terms-conditions',
            'title' => 'Terms & Conditions',
            'seo_title' => 'Terms & Conditions | Crestovia',
            'description' => 'Read the terms that govern Crestovia website use, order placement, payments, shipping, returns, refunds, and customer support.',
            'schema_type' => 'WebPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Beauty_Organizers.png',
            'css' => 'tw-terms.css',
        ],
        'privacy-policy' => [
            'slug' => 'privacy',
            'title' => 'Privacy Policy',
            'seo_title' => 'Privacy Policy | Crestovia',
            'description' => 'Learn how Crestovia collects, uses, protects, and shares personal information when you browse, contact support, or place an order.',
            'schema_type' => 'WebPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Personal_care.png',
            'css' => 'tw-privacy.css',
        ],
        'track-order' => [
            'slug' => 'track-order',
            'title' => 'Track Order',
            'seo_title' => 'Track Your Order | Crestovia',
            'description' => 'Track your Crestovia order with your order number and billing email, review delivery progress, and contact support for shipment help.',
            'schema_type' => 'WebPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Beauty_Accessories.png',
            'css' => 'track-order.css',
        ],
    ];
}

function dawp_template_page_seo_map() {
    return [
        'home' => [
            'slug' => 'home',
            'title' => 'Home',
            'seo_title' => 'Crestovia | Beauty Essentials & Personal Care',
            'description' => 'Shop Crestovia for everyday beauty essentials, makeup tools, hair care accessories, beauty organizers, and practical personal care products.',
            'schema_type' => 'CollectionPage',
            'image' => '/assets/img/gallery/Oneshopvibe/Beauty_Essentials_Personal_Care.png',
            'path' => '',
        ],
    ];
}

function dawp_current_request_path() {
    $request_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
    $home_path = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && ($request_path === $home_path || str_starts_with($request_path, $home_path . '/'))) {
        $request_path = trim(substr($request_path, strlen($home_path)), '/');
    }

    return $request_path;
}

function dawp_current_template_page_seo() {
    $request_path = dawp_current_request_path();
    $virtual_pages = dawp_virtual_page_map();

    if (isset($virtual_pages[$request_path])) {
        $page = $virtual_pages[$request_path];
        $page['path'] = $request_path;
        return $page;
    }

    if (($request_path === '' || is_front_page()) && isset(dawp_template_page_seo_map()['home'])) {
        return dawp_template_page_seo_map()['home'];
    }

    return null;
}

function dawp_template_page_canonical_url($page) {
    $path = isset($page['path']) ? trim($page['path'], '/') : '';
    return $path === '' ? home_url('/') : home_url('/' . $path . '/');
}

function dawp_template_page_image_url($page) {
    if (empty($page['image'])) {
        return '';
    }

    return str_starts_with($page['image'], 'http') ? $page['image'] : get_theme_file_uri($page['image']);
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $page = dawp_current_template_page_seo();
    if ($page) {
        $parts['title'] = $page['title'];
    }
    return $parts;
}

add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_current_request_path();
    $pages = dawp_virtual_page_map();

    // Không phải virtual page hoặc page không cấu hình css
    if (!isset($pages[$request_uri]) || empty($pages[$request_uri]['css'])) {
        return;
    }

    $css_file_name = ltrim($pages[$request_uri]['css'], '/');

    // Đường dẫn vật lý
    if (str_contains($css_file_name, 'tw-')) {
        $css_file_path = get_template_directory() . '/assets/css/tw/' . $css_file_name;
        $css_file_url = get_template_directory_uri() . '/assets/css/tw/' . $css_file_name;
    } else {
        $css_file_path = get_template_directory() . '/assets/css/' . $css_file_name;
        $css_file_url = get_template_directory_uri() . '/assets/css/' . $css_file_name;
    }

    wp_enqueue_style(
        'dawp-virtual-page-' . sanitize_title($pages[$request_uri]['slug']),
        $css_file_url,
        [],
        file_exists($css_file_path) ? filemtime($css_file_path) : '1.0.0'
    );
}

