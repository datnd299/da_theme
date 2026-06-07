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
        'about-us'             => ['slug' => 'about',                'title' => 'About Us', 'desc' => 'Learn more about LBQ Shop, our story, and our commitment to providing high-quality beauty and fashion accessories.', 'css' => 'tw-about.css'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'FAQs', 'desc' => 'Find answers to frequently asked questions about shipping, returns, products, and more at LBQ Shop.', 'css' => 'tw-faq.css'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Us', 'desc' => 'Get in touch with LBQ Shop for support, inquiries, or assistance with your orders.', 'css' => 'tw-contact.css'],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review our shipping options, delivery times, and rates for LBQ Shop orders within the US.', 'css' => 'tw-ship.css'],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review our shipping options, delivery times, and rates for LBQ Shop orders within the US.', 'css' => 'tw-ship.css'],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read our return and refund policy to learn how to return products and get your money back.', 'css' => 'tw-ship.css'],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read the terms of service and conditions for using the LBQ Shop website and services.', 'css' => 'tw-terms.css'],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how LBQ Shop handles your data, protects your privacy, and secures your information.', 'css' => 'tw-privacy.css'],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Order', 'desc' => 'Track the status of your LBQ Shop order online using your tracking details.', 'css' => 'track-order.css'],
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

// Integrate with Rank Math SEO for virtual pages
function dawp_virtual_page_is_active() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $map = dawp_virtual_page_map();
    if (isset($map[$request_uri])) {
        return $map[$request_uri];
    }
    return false;
}

// Rank Math Title
add_filter('rank_math/frontend/title', function($title) {
    if ($page = dawp_virtual_page_is_active()) {
        $sep = apply_filters('document_title_separator', '-');
        return $page['title'] . ' ' . $sep . ' ' . get_bloginfo('name');
    }
    return $title;
});

// Rank Math Description
add_filter('rank_math/frontend/description', function($description) {
    if ($page = dawp_virtual_page_is_active()) {
        return $page['desc'];
    }
    return $description;
});

// Rank Math Canonical
add_filter('rank_math/frontend/canonical', function($canonical) {
    if ($page = dawp_virtual_page_is_active()) {
        $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
        return home_url('/' . $request_uri . '/');
    }
    return $canonical;
});

// Rank Math OpenGraph Title (FB + Twitter)
$dawp_rm_og_title = function($title) {
    if ($page = dawp_virtual_page_is_active()) {
        $sep = apply_filters('document_title_separator', '-');
        return $page['title'] . ' ' . $sep . ' ' . get_bloginfo('name');
    }
    return $title;
};
add_filter('rank_math/opengraph/facebook/title', $dawp_rm_og_title);
add_filter('rank_math/opengraph/twitter/title', $dawp_rm_og_title);

// Rank Math OpenGraph Description
$dawp_rm_og_desc = function($desc) {
    if ($page = dawp_virtual_page_is_active()) {
        return $page['desc'];
    }
    return $desc;
};
add_filter('rank_math/opengraph/facebook/description', $dawp_rm_og_desc);
add_filter('rank_math/opengraph/twitter/description', $dawp_rm_og_desc);

// Rank Math OpenGraph URL
add_filter('rank_math/opengraph/url', function($url) {
    if ($page = dawp_virtual_page_is_active()) {
        $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
        return home_url('/' . $request_uri . '/');
    }
    return $url;
});

// Rank Math Robots (allow indexing)
add_filter('rank_math/frontend/robots', function($robots) {
    if (dawp_virtual_page_is_active()) {
        $robots['index'] = 'index';
        $robots['follow'] = 'follow';
    }
    return $robots;
});
