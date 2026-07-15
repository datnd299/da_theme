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
        'about-us'             => ['slug' => 'about',                'title' => 'About Topgoodmart', 'desc' => 'Learn more about Topgoodmart, a modern online store for practical home, technology and everyday lifestyle products.', 'css' => 'tw-about.css', 'canonical_path' => 'about-us', 'schema_type' => 'AboutPage', 'image' => 'https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=86'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'Topgoodmart FAQs', 'desc' => 'Find answers to frequently asked questions about shipping, returns, products, payments and support at Topgoodmart.', 'css' => 'tw-faq.css', 'canonical_path' => 'faq', 'schema_type' => 'FAQPage'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Topgoodmart', 'desc' => 'Contact Topgoodmart support for help with orders, tracking, returns, refunds, product questions or privacy requests.', 'css' => 'tw-contact.css', 'canonical_path' => 'contact-us', 'schema_type' => 'ContactPage', 'image' => 'https://images.unsplash.com/photo-1556745757-8d76bdb6984b?auto=format&fit=crop&w=1400&q=86'],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Topgoodmart shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Topgoodmart shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read the Topgoodmart return and refund policy, including return eligibility, return shipping, exchanges and refund timing.', 'css' => 'tw-ship.css', 'canonical_path' => 'return-refund-policy', 'schema_type' => 'WebPage'],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read the Topgoodmart terms and conditions for browsing the website, placing orders, payments, policies and customer support.', 'css' => 'tw-terms.css', 'canonical_path' => 'terms-conditions', 'schema_type' => 'WebPage'],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how Topgoodmart collects, uses, protects and manages customer information, cookies, privacy requests and account data.', 'css' => 'tw-privacy.css', 'canonical_path' => 'privacy-policy', 'schema_type' => 'PrivacyPolicy'],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Your Topgoodmart Order', 'desc' => 'Track your Topgoodmart order online using your order ID and billing email, or contact support for shipment help.', 'css' => 'track-order.css', 'canonical_path' => 'track-order', 'schema_type' => 'WebPage'],
    ];
}

function dawp_home_page_seo_data() {
    return [
        'slug'           => 'home',
        'title'          => 'Topgoodmart - Home, Electronics & Everyday Essentials',
        'desc'           => 'Shop Topgoodmart for practical home essentials, furniture, electronics, smart home products, kitchen favorites and outdoor living picks.',
        'canonical_path' => '',
        'schema_type'    => 'WebSite',
        'image'          => get_template_directory_uri() . '/assets/img/home/5f4f0066-d0af-4d77-af44-11e501dd5cc9 (1).png',
    ];
}

function dawp_current_request_path() {
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');

    if (function_exists('wp_make_link_relative')) {
        $home_path = trim(parse_url(wp_make_link_relative(home_url('/')), PHP_URL_PATH) ?? '', '/');
        if ($home_path && str_starts_with($path, $home_path . '/')) {
            $path = trim(substr($path, strlen($home_path)), '/');
        }
    }

    return $path;
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $request_uri = dawp_current_request_path();
    $map = dawp_virtual_page_map();
    if (isset($map[$request_uri])) {
        $parts['title'] = $map[$request_uri]['title'];
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

// Integrate with Rank Math SEO for virtual pages
function dawp_virtual_page_is_active() {
    $request_uri = dawp_current_request_path();
    $map = dawp_virtual_page_map();
    if (isset($map[$request_uri])) {
        return $map[$request_uri];
    }
    return false;
}

function dawp_rank_math_page_seo_data() {
    $virtual_page = dawp_virtual_page_is_active();
    if ($virtual_page) {
        return $virtual_page;
    }

    if (is_front_page() || is_home()) {
        return dawp_home_page_seo_data();
    }

    return false;
}

function dawp_rank_math_page_title($page) {
    if (empty($page['title'])) {
        return get_bloginfo('name');
    }

    if ('home' === ($page['slug'] ?? '')) {
        return $page['title'];
    }

    $sep = apply_filters('document_title_separator', '-');
    return $page['title'] . ' ' . $sep . ' ' . get_bloginfo('name');
}

function dawp_rank_math_page_url($page) {
    $path = isset($page['canonical_path']) ? trim($page['canonical_path'], '/') : dawp_current_request_path();
    return home_url($path ? '/' . $path . '/' : '/');
}

function dawp_rank_math_page_image($page) {
    if (!empty($page['image'])) {
        return $page['image'];
    }

    $logo = get_template_directory_uri() . '/assets/img/home/5f4f0066-d0af-4d77-af44-11e501dd5cc9 (1).png';
    return $logo;
}

function dawp_rank_math_organization_schema() {
    return [
        '@type' => 'Organization',
        '@id'   => home_url('/#organization'),
        'name'  => get_bloginfo('name'),
        'url'   => home_url('/'),
        'email' => 'support@topgoodmart.com',
        'logo'  => [
            '@type' => 'ImageObject',
            'url'   => get_template_directory_uri() . '/assets/img/home/5f4f0066-d0af-4d77-af44-11e501dd5cc9 (1).png',
        ],
    ];
}

function dawp_rank_math_website_schema() {
    return [
        '@type'       => 'WebSite',
        '@id'         => home_url('/#website'),
        'url'         => home_url('/'),
        'name'        => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
        'publisher'   => ['@id' => home_url('/#organization')],
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => home_url('/?s={search_term_string}&post_type=product'),
            'query-input' => 'required name=search_term_string',
        ],
    ];
}

function dawp_rank_math_faq_schema_entities($slug) {
    if ('faq' !== $slug) {
        return [];
    }

    $items = [
        [
            'question' => 'Where does Topgoodmart ship?',
            'answer'   => 'Topgoodmart currently ships exclusively within the United States domestic market.',
        ],
        [
            'question' => 'How much does shipping cost?',
            'answer'   => 'Shipping cost is shown during checkout before payment is processed.',
        ],
        [
            'question' => 'What is the return window?',
            'answer'   => 'Eligible products can be returned within 30 days after delivery.',
        ],
        [
            'question' => 'How do I contact Topgoodmart?',
            'answer'   => 'Customers can contact Topgoodmart support by email at support@topgoodmart.com or through the Contact Us page.',
        ],
    ];

    return array_map(static function($item) {
        return [
            '@type' => 'Question',
            'name'  => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $item['answer'],
            ],
        ];
    }, $items);
}

// Rank Math Title
add_filter('rank_math/frontend/title', function($title) {
    if ($page = dawp_rank_math_page_seo_data()) {
        return dawp_rank_math_page_title($page);
    }
    return $title;
});

// Rank Math Description
add_filter('rank_math/frontend/description', function($description) {
    if ($page = dawp_rank_math_page_seo_data()) {
        return $page['desc'];
    }
    return $description;
});

// Rank Math Canonical
add_filter('rank_math/frontend/canonical', function($canonical) {
    if ($page = dawp_rank_math_page_seo_data()) {
        return dawp_rank_math_page_url($page);
    }
    return $canonical;
});

// Rank Math OpenGraph Title (FB + Twitter)
$dawp_rm_og_title = function($title) {
    if ($page = dawp_rank_math_page_seo_data()) {
        return dawp_rank_math_page_title($page);
    }
    return $title;
};
add_filter('rank_math/opengraph/facebook/title', $dawp_rm_og_title);
add_filter('rank_math/opengraph/twitter/title', $dawp_rm_og_title);

// Rank Math OpenGraph Description
$dawp_rm_og_desc = function($desc) {
    if ($page = dawp_rank_math_page_seo_data()) {
        return $page['desc'];
    }
    return $desc;
};
add_filter('rank_math/opengraph/facebook/description', $dawp_rm_og_desc);
add_filter('rank_math/opengraph/twitter/description', $dawp_rm_og_desc);

// Rank Math OpenGraph URL
add_filter('rank_math/opengraph/url', function($url) {
    if ($page = dawp_rank_math_page_seo_data()) {
        return dawp_rank_math_page_url($page);
    }
    return $url;
});

$dawp_rm_og_image = function($image) {
    if ($page = dawp_rank_math_page_seo_data()) {
        return dawp_rank_math_page_image($page);
    }
    return $image;
};
add_filter('rank_math/opengraph/facebook/image', $dawp_rm_og_image);
add_filter('rank_math/opengraph/twitter/image', $dawp_rm_og_image);

add_filter('rank_math/opengraph/type', function($type) {
    return dawp_rank_math_page_seo_data() ? 'website' : $type;
});

// Rank Math Robots (allow indexing)
add_filter('rank_math/frontend/robots', function($robots) {
    if (dawp_rank_math_page_seo_data()) {
        $robots['index'] = 'index';
        $robots['follow'] = 'follow';
    }
    return $robots;
});

add_filter('rank_math/json_ld', function($data) {
    $page = dawp_rank_math_page_seo_data();
    if (!$page) {
        return $data;
    }

    $page_url = dawp_rank_math_page_url($page);
    $title = dawp_rank_math_page_title($page);
    $schema_type = $page['schema_type'] ?? 'WebPage';

    $data['dawp_organization'] = dawp_rank_math_organization_schema();
    $data['dawp_website'] = dawp_rank_math_website_schema();

    if ('WebSite' === $schema_type) {
        $data['dawp_website']['description'] = $page['desc'];

        return $data;
    }

    $data['dawp_webpage'] = [
        '@type'       => $schema_type,
        '@id'         => $page_url . '#webpage',
        'url'         => $page_url,
        'name'        => $title,
        'description' => $page['desc'],
        'isPartOf'    => ['@id' => home_url('/#website')],
        'publisher'   => ['@id' => home_url('/#organization')],
        'inLanguage'  => get_bloginfo('language'),
    ];

    $faq_entities = dawp_rank_math_faq_schema_entities($page['slug'] ?? '');
    if ($faq_entities) {
        $data['dawp_webpage']['mainEntity'] = $faq_entities;
    }

    return $data;
});
