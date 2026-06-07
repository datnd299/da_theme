<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_current_virtual_page_key(false);
    $virtual_pages = dawp_virtual_page_map();

    if ($request_uri === 'shipping-returns') {
        wp_safe_redirect(home_url('/shipping-policy/'), 301);
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
            'seo_title'   => 'Shop Kelli Boutique | Women & Girls Clothing',
            'description' => 'Shop curated boutique clothing for women, young girls, baby girls, and mommy and me matching outfits with free U.S. standard shipping.',
            'image'       => 'assets/img/banner_baby.png',
            'canonical'   => home_url('/'),
        ],
        'about-us' => [
            'slug'        => 'about',
            'title'       => 'About Us',
            'css'         => 'tw/tw-about.css',
            'seo_title'   => 'About Shop Kelli Boutique | Family Fashion',
            'description' => 'Learn about Shop Kelli Boutique, a Merced, California boutique curating warm clothing for women, girls, and mommy and me family moments.',
            'image'       => 'assets/img/store_about.png',
        ],
        'faq' => [
            'slug'        => 'faq',
            'title'       => 'FAQ',
            'css'         => 'tw/tw-faq.css',
            'seo_title'   => 'Shop Kelli FAQ | Shipping, Returns & Orders',
            'description' => 'Find answers about Shop Kelli orders, checkout, free U.S. shipping, delivery tracking, returns, refunds, payment security, and support.',
            'image'       => 'assets/img/support_contact.png',
            'schema_type' => 'FAQPage',
        ],
        'contact-us' => [
            'slug'        => 'contact',
            'title'       => 'Contact Us',
            'css'         => 'tw/tw-contact.css',
            'seo_title'   => 'Contact Shop Kelli Boutique | Customer Support',
            'description' => 'Contact Shop Kelli Boutique for order help, sizing questions, styling support, shipping issues, returns, refunds, and customer service.',
            'image'       => 'assets/img/support_contact.png',
        ],
        'shipping-policy' => [
            'slug'        => 'shipping-policy',
            'title'       => 'Shipping Policy',
            'css'         => 'tw/tw-ship.css',
            'seo_title'   => 'Shipping Policy | Shop Kelli Boutique',
            'description' => 'Review Shop Kelli shipping policy, including free standard U.S. shipping, 1-3 business day handling, 5-7 business day transit, and tracking.',
            'image'       => 'assets/img/banner_baby.png',
        ],
        'refund-return-policy' => [
            'slug'        => 'refund-return-policy',
            'title'       => 'Refund & Return Policy',
            'css'         => 'tw/tw-ship.css',
            'seo_title'   => 'Refund & Return Policy | Shop Kelli Boutique',
            'description' => 'Review Shop Kelli returns and refunds, including the 30-day return window, eligible item condition, return shipping fees, and refund timing.',
            'image'       => 'assets/img/support_contact.png',
        ],
        'terms-conditions' => [
            'slug'        => 'terms-conditions',
            'title'       => 'Terms & Conditions',
            'css'         => 'tw/tw-terms.css',
            'seo_title'   => 'Terms & Conditions | Shop Kelli Boutique',
            'description' => 'Read Shop Kelli Boutique terms and conditions for website use, online orders, payment security, product accuracy, returns, and policies.',
            'image'       => 'assets/img/logo.jpg',
        ],
        'privacy-policy' => [
            'slug'        => 'privacy',
            'title'       => 'Privacy Policy',
            'css'         => 'tw/tw-privacy.css',
            'seo_title'   => 'Privacy Policy | Shop Kelli Boutique',
            'description' => 'Read how Shop Kelli Boutique collects, uses, protects, and shares personal information for orders, checkout, shipping, analytics, and support.',
            'image'       => 'assets/img/logo.jpg',
        ],
        'track-order' => [
            'slug'        => 'track-order',
            'title'       => 'Track Order',
            'css'         => 'track-order.css',
            'seo_title'   => 'Track Your Order | Shop Kelli Boutique',
            'description' => 'Track your Shop Kelli Boutique order status securely using your order details, or contact customer support for shipment and delivery help.',
            'image'       => 'assets/img/support_contact.png',
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
