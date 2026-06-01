<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_get_virtual_page_request_path();
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
        'home'             => [
            'slug'        => 'home',
            'title'       => 'Men\'s Formal Dress Shoes',
            'seo_title'   => 'Men\'s Formal Dress Shoes | Handed Shoes',
            'description' => 'Shop Handed Shoes for men\'s Oxford shoes, brogue shoes, loafers, and monk strap dress shoes for office, formal, and smart casual outfits.',
            'schema_type' => 'WebPage',
            'css'         => 'tw/tw-home.css',
        ],
        'about-us'         => [
            'slug'        => 'about',
            'title'       => 'About Us',
            'seo_title'   => 'About Handed Shoes | Men\'s Formal Footwear Store',
            'description' => 'Learn about Handed Shoes, our focus on refined men\'s formal footwear, clear product information, reliable support, shipping, and returns.',
            'schema_type' => 'AboutPage',
            'css'         => 'tw/tw-about.css',
        ],
        'faq'              => [
            'slug'        => 'faq',
            'title'       => 'FAQ',
            'seo_title'   => 'Frequently Asked Questions | Handed Shoes',
            'description' => 'Find answers about Handed Shoes orders, shipping, delivery tracking, returns, refunds, product condition rules, and customer support.',
            'schema_type' => 'FAQPage',
            'css'         => 'tw/tw-faq.css',
        ],
        'contact-us'       => [
            'slug'        => 'contact',
            'title'       => 'Contact Us',
            'seo_title'   => 'Contact Handed Shoes | Customer Support',
            'description' => 'Contact Handed Shoes customer support for help with orders, shipping, tracking, returns, refunds, sizing, and formal footwear questions.',
            'schema_type' => 'ContactPage',
            'css'         => 'tw/tw-contact.css',
        ],
        'shipping-policy'  => [
            'slug'        => 'shipping-policy',
            'title'       => 'Shipping Policy',
            'seo_title'   => 'Shipping Policy | Handed Shoes',
            'description' => 'Review Handed Shoes shipping locations, free standard U.S. shipping, order handling times, delivery tracking, carriers, and delivery issue support.',
            'schema_type' => 'WebPage',
            'css'         => 'tw/tw-ship.css',
        ],
        'refund-return-policy' => [
            'slug'        => 'refund-return-policy',
            'title'       => 'Refund & Return Policy',
            'seo_title'   => 'Refund & Return Policy | Handed Shoes',
            'description' => 'Review Handed Shoes return eligibility, footwear condition requirements, return shipping fees, refund timing, damaged items, and support steps.',
            'schema_type' => 'WebPage',
            'css'         => 'tw/tw-ship.css',
        ],
        'terms-conditions' => [
            'slug'        => 'terms-conditions',
            'title'       => 'Terms & Conditions',
            'seo_title'   => 'Terms & Conditions | Handed Shoes',
            'description' => 'Read the Handed Shoes terms and conditions covering site use, orders, payment, shipping, returns, intellectual property, and customer responsibilities.',
            'schema_type' => 'WebPage',
            'css'         => 'tw/tw-terms.css',
        ],
        'privacy-policy'   => [
            'slug'        => 'privacy',
            'title'       => 'Privacy Policy',
            'seo_title'   => 'Privacy Policy | Handed Shoes',
            'description' => 'Learn how Handed Shoes collects, uses, shares, protects, and retains personal information for orders, support, shipping, returns, and privacy rights.',
            'schema_type' => 'PrivacyPolicy',
            'css'         => 'tw/tw-privacy.css',
        ],
        'track-order'      => [
            'slug'        => 'track-order',
            'title'       => 'Track Order',
            'seo_title'   => 'Track Your Order | Handed Shoes',
            'description' => 'Track your Handed Shoes order with your order number and billing email, and find help for shipping updates, delivery issues, and customer support.',
            'schema_type' => 'WebPage',
            'css'         => 'track-order.css',
        ],
    ];
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $page = dawp_get_current_virtual_page();
    if ($page) {
        $parts['title'] = $page['title'];
    }
    return $parts;
}

function dawp_get_virtual_page_request_path() {
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path && 0 === strpos($path, $home_path . '/')) {
        $path = trim(substr($path, strlen($home_path)), '/');
    }

    return $path;
}

function dawp_get_current_virtual_page() {
    $request_uri = dawp_get_virtual_page_request_path();
    $map = dawp_virtual_page_map();

    if (function_exists('is_front_page') && is_front_page() && isset($map['home'])) {
        return array_merge(
            [
                'path'        => '',
                'seo_title'   => $map['home']['title'],
                'description' => '',
                'schema_type' => 'WebPage',
            ],
            $map['home'],
            [
                'path' => '',
            ]
        );
    }

    if (!isset($map[$request_uri])) {
        return null;
    }

    return array_merge(
        [
            'path'        => $request_uri,
            'seo_title'   => $map[$request_uri]['title'],
            'description' => '',
            'schema_type' => 'WebPage',
        ],
        $map[$request_uri]
    );
}

function dawp_get_virtual_page_canonical($page) {
    if ('' === trim($page['path'], '/')) {
        return home_url('/');
    }

    return home_url('/' . trim($page['path'], '/') . '/');
}

function dawp_get_virtual_page_image_url() {
    $image_path = get_template_directory() . '/assets/img/Home/section_one.png';
    $image_url = get_template_directory_uri() . '/assets/img/Home/section_one.png';

    if (!file_exists($image_path)) {
        $image_path = get_template_directory() . '/assets/img/gallery/logo.png';
        $image_url = get_template_directory_uri() . '/assets/img/gallery/logo.png';
    }

    if (file_exists($image_path)) {
        $image_url = add_query_arg('v', filemtime($image_path), $image_url);
    }

    return $image_url;
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title', 20);
function dawp_rank_math_virtual_page_title($title) {
    $page = dawp_get_current_virtual_page();
    return $page ? $page['seo_title'] : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description', 20);
function dawp_rank_math_virtual_page_description($description) {
    $page = dawp_get_current_virtual_page();
    return ($page && !empty($page['description'])) ? $page['description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical', 20);
function dawp_rank_math_virtual_page_canonical($canonical) {
    $page = dawp_get_current_virtual_page();
    return $page ? dawp_get_virtual_page_canonical($page) : $canonical;
}

add_filter('rank_math/opengraph/facebook/title', 'dawp_rank_math_virtual_page_title', 20);
add_filter('rank_math/opengraph/facebook/description', 'dawp_rank_math_virtual_page_description', 20);
add_filter('rank_math/opengraph/twitter/title', 'dawp_rank_math_virtual_page_title', 20);
add_filter('rank_math/opengraph/twitter/description', 'dawp_rank_math_virtual_page_description', 20);
add_filter('rank_math/opengraph/type', 'dawp_rank_math_virtual_page_og_type', 20);
add_filter('rank_math/opengraph/url', 'dawp_rank_math_virtual_page_og_url', 20);
add_filter('rank_math/opengraph/twitter/card_type', 'dawp_rank_math_virtual_page_twitter_card', 20);

function dawp_rank_math_virtual_page_og_type($type) {
    return dawp_get_current_virtual_page() ? 'website' : $type;
}

function dawp_rank_math_virtual_page_og_url($url) {
    $page = dawp_get_current_virtual_page();
    return $page ? dawp_get_virtual_page_canonical($page) : $url;
}

function dawp_rank_math_virtual_page_twitter_card($type) {
    return dawp_get_current_virtual_page() ? 'summary_large_image' : $type;
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_virtual_page_image', 20);
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_virtual_page_image', 20);
function dawp_rank_math_virtual_page_image($image) {
    return dawp_get_current_virtual_page() ? dawp_get_virtual_page_image_url() : $image;
}

add_filter('rank_math/json_ld', 'dawp_rank_math_virtual_page_schema', 20, 2);
function dawp_rank_math_virtual_page_schema($data, $jsonld) {
    $page = dawp_get_current_virtual_page();

    if (!$page) {
        return $data;
    }

    $canonical = dawp_get_virtual_page_canonical($page);
    $page_id = trailingslashit($canonical) . '#webpage';

    $data['WebPage'] = [
        '@type'       => $page['schema_type'],
        '@id'         => $page_id,
        'url'         => $canonical,
        'name'        => $page['seo_title'],
        'description' => $page['description'],
        'isPartOf'    => [
            '@id' => home_url('/#website'),
        ],
        'primaryImageOfPage' => [
            '@id' => trailingslashit($canonical) . '#primaryimage',
        ],
    ];

    $data['primaryImage'] = [
        '@type' => 'ImageObject',
        '@id'   => trailingslashit($canonical) . '#primaryimage',
        'url'   => dawp_get_virtual_page_image_url(),
    ];

    return $data;
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_get_virtual_page_request_path();
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
