<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_current_virtual_page_path();
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
    $image_base = get_template_directory_uri() . '/assets/img/All_image/';

    return [
        'home' => [
            'slug'            => 'home',
            'title'           => 'Home',
            'seo_title'       => 'Norvexa | Women\'s Shoes, Handbags & Fashion Accessories',
            'seo_description' => 'Shop Norvexa for women\'s leather shoes, sandals, handbags, and fashion accessories made for polished everyday style, weekends, travel, and gifting.',
            'seo_image'       => $image_base . 'banner.png',
            'css'             => 'tw/tw-home.css',
        ],
        'about-us' => [
            'slug'            => 'about',
            'title'           => 'About Us',
            'seo_title'       => 'About Norvexa | Practical Women\'s Style Boutique',
            'seo_description' => 'Learn about Norvexa, a women\'s fashion accessories store focused on polished everyday footwear, handbags, clear product guidance, and wearable style.',
            'seo_image'       => $image_base . 'image copy 6.png',
            'css'             => 'tw/tw-about.css',
        ],
        'faq' => [
            'slug'            => 'faq',
            'title'           => 'FAQ',
            'seo_title'       => 'FAQ | Norvexa Orders, Shipping, Returns & Support',
            'seo_description' => 'Find answers about Norvexa orders, payments, shipping times, tracking, returns, refunds, product sizing, and customer support.',
            'seo_image'       => $image_base . 'image copy 10.png',
            'css'             => 'tw/tw-faq.css',
        ],
        'contact-us' => [
            'slug'            => 'contact',
            'title'           => 'Contact Us',
            'seo_title'       => 'Contact Norvexa | Customer Support',
            'seo_description' => 'Contact Norvexa customer support for questions about women\'s shoes, sandals, handbags, accessories, shipping, returns, refunds, or an existing order.',
            'seo_image'       => $image_base . 'image copy 8.png',
            'css'             => 'tw/tw-contact.css',
        ],
        'shipping-policy' => [
            'slug'            => 'shipping-policy',
            'title'           => 'Shipping Policy',
            'seo_title'       => 'Shipping Policy | Norvexa U.S. Delivery & Tracking',
            'seo_description' => 'Review Norvexa shipping locations, free U.S. standard shipping, order handling time, delivery estimates, tracking details, and carrier support.',
            'seo_image'       => $image_base . 'image copy 5.png',
            'css'             => 'tw/tw-ship.css',
        ],
        'refund-return-policy' => [
            'slug'            => 'refund-return-policy',
            'title'           => 'Refund & Return Policy',
            'seo_title'       => 'Refund & Return Policy | Norvexa 30-Day Returns',
            'seo_description' => 'Read Norvexa return eligibility, 30-day return window, return shipping fees, refund timing, exchanges, non-returnable items, and support details.',
            'seo_image'       => $image_base . 'image copy 6.png',
            'css'             => 'tw/tw-ship.css',
        ],
        'terms-conditions' => [
            'slug'            => 'terms-conditions',
            'title'           => 'Terms & Conditions',
            'seo_title'       => 'Terms & Conditions | Norvexa Store Policies',
            'seo_description' => 'Review the Norvexa terms and conditions for website use, orders, payments, shipping, returns, product information, privacy, and customer responsibilities.',
            'seo_image'       => $image_base . 'image copy 2.png',
            'css'             => 'tw/tw-terms.css',
        ],
        'privacy-policy' => [
            'slug'            => 'privacy',
            'title'           => 'Privacy Policy',
            'seo_title'       => 'Privacy Policy | Norvexa Customer Data Protection',
            'seo_description' => 'Learn how Norvexa collects, uses, protects, and shares customer information for orders, payments, shipping, support, cookies, and privacy requests.',
            'seo_image'       => $image_base . 'image copy 6.png',
            'css'             => 'tw/tw-privacy.css',
        ],
        'track-order' => [
            'slug'            => 'track-order',
            'title'           => 'Track Order',
            'seo_title'       => 'Track Your Order | Norvexa',
            'seo_description' => 'Track your Norvexa order status with your order details and get help with shipment updates, delivery questions, and customer support.',
            'seo_image'       => $image_base . 'banner.png',
            'css'             => 'track-order.css',
        ],
    ];
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $page = dawp_current_virtual_page();
    if ($page) {
        $parts['title'] = $page['seo_title'] ?? $page['title'];
    }
    return $parts;
}

function dawp_current_virtual_page_path() {
    return trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
}

function dawp_current_virtual_page() {
    $map = dawp_virtual_page_map();
    $path = dawp_current_virtual_page_path();

    if ($path === '' && function_exists('is_front_page') && is_front_page()) {
        return $map['home'] ?? null;
    }

    return $map[$path] ?? null;
}

function dawp_current_virtual_page_url() {
    $path = dawp_current_virtual_page_path();

    if ($path === '' || $path === 'home') {
        return home_url('/');
    }

    return home_url('/' . ($path ? $path . '/' : ''));
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title');
function dawp_rank_math_virtual_page_title($title) {
    $page = dawp_current_virtual_page();

    return $page && !empty($page['seo_title']) ? $page['seo_title'] : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description');
function dawp_rank_math_virtual_page_description($description) {
    $page = dawp_current_virtual_page();

    return $page && !empty($page['seo_description']) ? $page['seo_description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical');
function dawp_rank_math_virtual_page_canonical($canonical) {
    return dawp_current_virtual_page() ? dawp_current_virtual_page_url() : $canonical;
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_virtual_page_robots');
function dawp_rank_math_virtual_page_robots($robots) {
    if (!dawp_current_virtual_page()) {
        return $robots;
    }

    $robots['index']  = 'index';
    $robots['follow'] = 'follow';

    return $robots;
}

add_filter('rank_math/opengraph/type', 'dawp_rank_math_virtual_page_og_type');
function dawp_rank_math_virtual_page_og_type($type) {
    return dawp_current_virtual_page() ? 'website' : $type;
}

add_filter('rank_math/opengraph/url', 'dawp_rank_math_virtual_page_og_url');
function dawp_rank_math_virtual_page_og_url($url) {
    return dawp_current_virtual_page() ? dawp_current_virtual_page_url() : $url;
}

add_filter('rank_math/opengraph/facebook/og_title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/twitter/twitter_title', 'dawp_rank_math_virtual_page_social_title');
function dawp_rank_math_virtual_page_social_title($title) {
    $page = dawp_current_virtual_page();

    return $page && !empty($page['seo_title']) ? $page['seo_title'] : $title;
}

add_filter('rank_math/opengraph/facebook/og_description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/twitter/twitter_description', 'dawp_rank_math_virtual_page_social_description');
function dawp_rank_math_virtual_page_social_description($description) {
    $page = dawp_current_virtual_page();

    return $page && !empty($page['seo_description']) ? $page['seo_description'] : $description;
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_virtual_page_social_image');
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_virtual_page_social_image');
function dawp_rank_math_virtual_page_social_image($image) {
    $page = dawp_current_virtual_page();

    return $page && !empty($page['seo_image']) ? $page['seo_image'] : $image;
}

add_filter('rank_math/opengraph/twitter/card_type', 'dawp_rank_math_virtual_page_twitter_card');
function dawp_rank_math_virtual_page_twitter_card($type) {
    return dawp_current_virtual_page() ? 'summary_large_image' : $type;
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_current_virtual_page_path();
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
