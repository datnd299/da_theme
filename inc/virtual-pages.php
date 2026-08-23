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
        'about-us'             => ['slug' => 'about',                'title' => 'About Chronel', 'desc' => 'Learn more about Chronel, a curated online store for luxury watches, fine timepieces and premium accessories.', 'keywords' => 'Chronel, about Chronel, luxury watch store, fine timepieces', 'css' => 'tw-about.css', 'canonical_path' => 'about-us', 'schema_type' => 'AboutPage', 'image' => 'https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=86'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'Chronel FAQs', 'desc' => 'Find answers to frequently asked questions about shipping, returns, products, payments and support at Chronel.', 'keywords' => 'Chronel FAQ, shipping questions, return questions, order support', 'css' => 'tw-faq.css', 'canonical_path' => 'faq', 'schema_type' => 'FAQPage'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Chronel', 'desc' => 'Contact Chronel support for help with orders, tracking, returns, refunds, product questions or privacy requests.', 'keywords' => 'contact Chronel, Chronel support, order help, return support', 'css' => 'tw-contact.css', 'canonical_path' => 'contact-us', 'schema_type' => 'ContactPage', 'image' => get_template_directory_uri() . '/assets/img/gallery/Customer_support_scene_in_office_202607161445.jpeg'],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Chronel shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Chronel shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Chronel shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Chronel shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read the Chronel return and refund policy, including return eligibility, return shipping, exchanges and refund timing.', 'keywords' => 'Chronel return policy, refund policy, returns, refund timing', 'css' => 'tw-ship.css', 'canonical_path' => 'return-refund-policy', 'schema_type' => 'WebPage'],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read the Chronel terms and conditions for browsing the website, placing orders, payments, policies and customer support.', 'keywords' => 'Chronel terms, terms and conditions, store policies, website terms', 'css' => 'tw-terms.css', 'canonical_path' => 'terms-conditions', 'schema_type' => 'WebPage'],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how Chronel collects, uses, protects and manages customer information, cookies, privacy requests and account data.', 'keywords' => 'Chronel privacy policy, customer data, cookies, privacy requests', 'css' => 'tw-privacy.css', 'canonical_path' => 'privacy-policy', 'schema_type' => 'PrivacyPolicy'],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Your Chronel Order', 'desc' => 'Track your Chronel order online using your order ID and billing email, or contact support for shipment help.', 'keywords' => 'track Chronel order, order tracking, shipment status, order status', 'css' => 'track-order.css', 'canonical_path' => 'track-order', 'schema_type' => 'WebPage'],
    ];
}

function dawp_home_page_seo_data() {
    return [
        'slug'           => 'home',
        'title'          => 'Chronel - Luxury Watches & Fine Timepieces',
        'desc'           => 'Shop Chronel for luxury watches, fine timepieces, limited editions, mechanical references and premium accessories.',
        'keywords'       => 'Chronel, luxury watches, fine timepieces, Swiss watches, watch collections',
        'canonical_path' => '',
        'schema_type'    => 'WebSite',
        'image'          => get_template_directory_uri() . '/assets/img/home/Home_essentials_on_shelf_202607171221.jpeg',
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

    return get_template_directory_uri() . '/assets/img/home/Home_essentials_on_shelf_202607171221.jpeg';
}

function dawp_rank_math_organization_schema() {
    return [
        '@type' => 'Organization',
        '@id'   => home_url('/#organization'),
        'name'  => get_bloginfo('name'),
        'url'   => home_url('/'),
        'email' => 'support@chronelshop.com',
        'logo'  => [
            '@type' => 'ImageObject',
            'url'   => get_template_directory_uri() . '/assets/img/logo/chronel-logo-black.png',
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
            'question' => 'Where does Chronel ship?',
            'answer'   => 'Chronel currently ships exclusively within the United States domestic market.',
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
            'question' => 'How do I contact Chronel?',
            'answer'   => 'Customers can contact Chronel support by email at support@chronelshop.com or through the Contact Us page.',
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

