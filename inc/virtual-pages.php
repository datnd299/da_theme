<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
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
        'about-us'         => ['slug' => 'about',            'title' => 'About Us', 'css' => 'tw-about.css'],
        'faq'              => ['slug' => 'faq',              'title' => 'FAQ', 'css' => 'tw-faq.css'],
        'contact-us'       => ['slug' => 'contact',          'title' => 'Contact Us', 'css' => 'tw-contact.css'],
        'shipping-policy'  => ['slug' => 'shipping',         'title' => 'Shipping Policy',   'css' => 'tw-ship.css'],
        'returns-policy'   => ['slug' => 'returns',          'title' => 'Return & Refund Policy', 'css' => 'tw-ship.css'],
        'terms-conditions' => ['slug' => 'terms-conditions', 'title' => 'Terms & Conditions', 'css' => 'tw-terms.css'],
        'privacy-policy'   => ['slug' => 'privacy',          'title' => 'Privacy Policy', 'css' => 'tw-privacy.css'],
        'track-order'   => ['slug' => 'track-order',          'title' => 'Track Order', 'css' => 'track-order.css'],
        'shop-by-rim-size' => ['slug' => 'shop-by-rim-size',  'title' => 'Shop By Rim Size', 'css' => 'rim-size.css'],
        'shop-by-brand' => ['slug' => 'shop-by-brand',  'title' => 'Shop By Brand', 'css' => 'rim-size.css'],
        'shop-by-vehicle-type' => ['slug' => 'shop-by-vehicle-type', 'title' => 'Shop By Vehicle Type', 'css' => 'rim-size.css'],
    ];
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $map = dawp_virtual_page_map();
    if (isset($map[$request_uri])) {
        $parts['title'] = $map[$request_uri]['title'];
    }
    return $parts;
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
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

