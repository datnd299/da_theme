<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_current_virtual_page_key(false);
    $virtual_pages = dawp_virtual_page_map();

    if ($request_uri === 'shipping-returns') {
        wp_safe_redirect(home_url('/shipping-policy/'), 301);
        exit;
    }

    if ($request_uri === 'return-refund-policy') {
        wp_safe_redirect(home_url('/refund-return-policy/'), 301);
        exit;
    }

    if ($request_uri === 'shop-by-theme') {
        wp_safe_redirect(home_url('/shop-by-categories/'), 301);
        exit;
    }

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
        'home' => [
            'slug'        => 'home',
            'title'       => 'Home',
            'css'         => 'tw/tw-home.css',
            'seo_title'   => 'YourWatchStore | Automatic & Mechanical Watches for Everyday Wear',
            'description' => 'Shop automatic dive, field, dress, and chronograph watches built for daily wear. Free US shipping and 30-day returns on every order.',
            'canonical'   => home_url('/'),
            'schema_type' => 'CollectionPage',
        ],
        'about-us' => [
            'slug'        => 'about',
            'title'       => 'About Us',
            'css'         => 'tw/tw-about.css',
            'seo_title'   => 'About YourWatchStore | Everyday Mechanical Watches',
            'description' => 'YourWatchStore curates automatic dive, field, dress, and chronograph watches designed for everyday wear, with free US shipping and 30-day returns.',
            'schema_type' => 'AboutPage',
        ],
        'shop-by-categories' => [
            'slug'        => 'shop-by-categories',
            'title'       => 'Shop By Style',
            'css'         => 'tw/tw-shop-by-categories.css',
            'seo_title'   => 'Shop Watches by Style | YourWatchStore',
            'description' => 'Browse YourWatchStore by style: dive watches, field watches, dress watches, and chronograph watches. Free US shipping on every order.',
            'schema_type' => 'CollectionPage',
        ],
        'faq' => [
            'slug'        => 'faq',
            'title'       => 'FAQ',
            'css'         => 'tw/tw-faq.css',
            'seo_title'   => 'YourWatchStore FAQ | Shipping, Returns & Watch Care',
            'description' => 'Answers about YourWatchStore orders, free US shipping, delivery times, order tracking, 30-day returns, refunds, payment security, and watch care.',
            'schema_type' => 'FAQPage',
        ],
        'contact-us' => [
            'slug'        => 'contact',
            'title'       => 'Contact Us',
            'css'         => 'tw/tw-contact.css',
            'seo_title'   => 'Contact YourWatchStore | Customer Support',
            'description' => 'Contact YourWatchStore for help with orders, shipping, order tracking, returns, refunds, delivery issues, and watch questions.',
            'schema_type' => 'ContactPage',
        ],
        'shipping-policy' => [
            'slug'        => 'shipping-policy',
            'title'       => 'Shipping Policy',
            'css'         => 'tw/tw-ship.css',
            'seo_title'   => 'Shipping Policy | YourWatchStore',
            'description' => 'YourWatchStore shipping policy: free standard US shipping, 1-3 business day handling, 3-7 business day transit, and tracking on every order.',
            'schema_type' => 'WebPage',
        ],
        'refund-return-policy' => [
            'slug'        => 'refund-return-policy',
            'title'       => 'Refund & Return Policy',
            'css'         => 'tw/tw-ship.css',
            'seo_title'   => 'Refund & Return Policy | YourWatchStore',
            'description' => 'YourWatchStore returns and refunds: 30-day return window, unworn condition with box and papers, return shipping terms, and refund timing.',
            'schema_type' => 'WebPage',
        ],
        'terms-conditions' => [
            'slug'        => 'terms-conditions',
            'title'       => 'Terms & Conditions',
            'css'         => 'tw/tw-terms.css',
            'seo_title'   => 'Terms & Conditions | YourWatchStore',
            'description' => 'YourWatchStore terms and conditions for website use, online watch orders, payment security, pricing, product accuracy, returns, and store policies.',
            'schema_type' => 'WebPage',
        ],
        'billing-terms-conditions' => [
            'slug'        => 'billing-terms-conditions',
            'title'       => 'Billing Terms & Conditions',
            'css'         => 'tw/tw-terms.css',
            'seo_title'   => 'Billing Terms & Conditions | YourWatchStore',
            'description' => 'YourWatchStore billing terms: accepted payment methods, USD pricing, when your card is charged, taxes, declined payments, refunds, and chargeback policy.',
            'schema_type' => 'WebPage',
        ],
        'privacy-policy' => [
            'slug'        => 'privacy',
            'title'       => 'Privacy Policy',
            'css'         => 'tw/tw-privacy.css',
            'seo_title'   => 'Privacy Policy | YourWatchStore',
            'description' => 'How YourWatchStore collects, uses, protects, and shares personal information for orders, checkout, shipping, analytics, and customer support.',
            'schema_type' => 'PrivacyPolicy',
        ],
        'track-order' => [
            'slug'        => 'track-order',
            'title'       => 'Track Order',
            'css'         => 'tw/tw-track.css',
            'seo_title'   => 'Track Your Order | YourWatchStore',
            'description' => 'Track your YourWatchStore order status using your order details, or contact customer support for shipment and delivery help.',
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
    $pages = dawp_virtual_page_map();

    // Không phải virtual page hoặc page không cấu hình css
    if (!isset($pages[$request_uri]) || empty($pages[$request_uri]['css'])) {
        return;
    }

    $css_file_name = ltrim($pages[$request_uri]['css'], '/');
    $css_file_path = get_template_directory() . '/assets/css/' . $css_file_name;
    $css_file_url  = get_template_directory_uri() . '/assets/css/' . $css_file_name;

    wp_enqueue_style(
        'dawp-virtual-page-' . sanitize_title($pages[$request_uri]['slug']),
        $css_file_url,
        [],
        file_exists($css_file_path) ? filemtime($css_file_path) : '1.0.0'
    );
}
