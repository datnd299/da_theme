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
    $default_image = get_template_directory_uri() . '/assets/img/New_homepage/Innovation_fits_everyday_life_202607281529.jpeg';
    $policy_date = '2026-05-29';

    return [
        'about-us'             => ['slug' => 'about',                'title' => 'About Crowdfused', 'desc' => 'Learn more about Crowdfused, a modern online store for practical home, technology and everyday lifestyle products.', 'keywords' => 'Crowdfused, about Crowdfused, home essentials store, online lifestyle store', 'css' => 'tw-about.css', 'canonical_path' => 'about-us', 'schema_type' => 'AboutPage', 'image' => $default_image, 'image_alt' => 'Crowdfused home, technology and lifestyle products'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'Crowdfused FAQs', 'desc' => 'Find answers to frequently asked questions about shipping, returns, products, payments and support at Crowdfused.', 'keywords' => 'Crowdfused FAQ, shipping questions, return questions, order support', 'css' => 'tw-faq.css', 'canonical_path' => 'faq', 'schema_type' => 'FAQPage', 'image' => $default_image, 'image_alt' => 'Crowdfused customer help and shopping FAQs'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Crowdfused', 'desc' => 'Contact Crowdfused support for help with orders, tracking, returns, refunds, product questions or privacy requests.', 'keywords' => 'contact Crowdfused, Crowdfused support, order help, return support', 'css' => 'tw-contact.css', 'canonical_path' => 'contact-us', 'schema_type' => 'ContactPage', 'image' => $default_image, 'image_alt' => 'Crowdfused customer support'],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Crowdfused shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Crowdfused shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Crowdfused shipping policy', 'date_modified' => $policy_date],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Crowdfused shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Crowdfused shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Crowdfused shipping policy', 'date_modified' => $policy_date],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read the Crowdfused return and refund policy, including return eligibility, return shipping, exchanges and refund timing.', 'keywords' => 'Crowdfused return policy, refund policy, returns, refund timing', 'css' => 'tw-ship.css', 'canonical_path' => 'return-refund-policy', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Crowdfused return and refund policy', 'date_modified' => $policy_date],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read the Crowdfused terms and conditions for browsing the website, placing orders, payments, policies and customer support.', 'keywords' => 'Crowdfused terms, terms and conditions, store policies, website terms', 'css' => 'tw-terms.css', 'canonical_path' => 'terms-conditions', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Crowdfused terms and conditions', 'date_modified' => $policy_date],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how Crowdfused collects, uses, protects and manages customer information, cookies, privacy requests and account data.', 'keywords' => 'Crowdfused privacy policy, customer data, cookies, privacy requests', 'css' => 'tw-privacy.css', 'canonical_path' => 'privacy-policy', 'schema_type' => 'PrivacyPolicy', 'image' => $default_image, 'image_alt' => 'Crowdfused privacy policy', 'date_modified' => $policy_date],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Your Crowdfused Order', 'desc' => 'Track your Crowdfused order online using your order ID and billing email, or contact support for shipment help.', 'keywords' => 'track Crowdfused order, order tracking, shipment status, order status', 'css' => 'track-order.css', 'canonical_path' => 'track-order', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Crowdfused order tracking'],
    ];
}

function dawp_home_page_seo_data() {
    return [
        'slug'           => 'home',
        'title'          => 'Crowdfused - Home, Electronics & Everyday Essentials',
        'desc'           => 'Shop Crowdfused for practical home essentials, furniture, electronics, smart home products, kitchen favorites and outdoor living picks.',
        'keywords'       => 'Crowdfused, home essentials, furniture, electronics, kitchen products, outdoor living',
        'canonical_path' => '',
        'schema_type'    => 'WebSite',
        'image'          => get_template_directory_uri() . '/assets/img/New_homepage/Innovation_fits_everyday_life_202607281529.jpeg',
        'image_alt'      => 'Crowdfused home essentials and everyday products',
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

    return get_template_directory_uri() . '/assets/img/New_homepage/Innovation_fits_everyday_life_202607281529.jpeg';
}

function dawp_rank_math_page_image_alt($page) {
    return !empty($page['image_alt']) ? $page['image_alt'] : dawp_rank_math_page_title($page);
}

function dawp_rank_math_breadcrumb_schema($page) {
    $page_url = dawp_rank_math_page_url($page);
    $items = [
        [
            '@type'    => 'ListItem',
            'position' => 1,
            'name'     => get_bloginfo('name'),
            'item'     => home_url('/'),
        ],
    ];

    if ('home' !== ($page['slug'] ?? '')) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => $page['title'] ?? get_bloginfo('name'),
            'item'     => $page_url,
        ];
    }

    return [
        '@type'           => 'BreadcrumbList',
        '@id'             => $page_url . '#breadcrumb',
        'itemListElement' => $items,
    ];
}

function dawp_rank_math_organization_schema() {
    $schema = [
        '@type' => 'Organization',
        '@id'   => home_url('/#organization'),
        'name'  => get_bloginfo('name'),
        'url'   => home_url('/'),
        'email' => 'support@Crowdfused.com',
        'telephone' => '826-207-1399',
        'logo'  => [
            '@type' => 'ImageObject',
            'url'   => get_template_directory_uri() . '/assets/img/logo_file/logo_crowd_cropped.png',
        ],
        'contactPoint' => [
            [
                '@type'       => 'ContactPoint',
                'telephone'   => '826-207-1399',
                'email'       => 'support@Crowdfused.com',
                'contactType' => 'customer support',
                'areaServed'  => 'US',
                'availableLanguage' => ['en'],
            ],
        ],
    ];

    if (function_exists('dawp_get_store_address')) {
        $address = dawp_get_store_address();
        if ($address) {
            $schema['address'] = [
                '@type' => 'PostalAddress',
                'streetAddress' => $address,
            ];
        }
    }

    return $schema;
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
    $faq_items = dawp_rank_math_faq_items($slug);
    if (!$faq_items) {
        return [];
    }

    return array_map(static function($item) {
        return [
            '@type' => 'Question',
            'name'  => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $item['answer'],
            ],
        ];
    }, $faq_items);
}

function dawp_rank_math_faq_items($slug) {
    $items = [
        [
            'question' => 'Where does Crowdfused ship?',
            'answer'   => 'Crowdfused currently ships exclusively within the United States domestic market.',
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
            'question' => 'How do I contact Crowdfused?',
            'answer'   => 'Customers can contact Crowdfused support by email at support@Crowdfused.com or through the Contact Us page.',
        ],
    ];

    if ('faq' === $slug) {
        return array_merge($items, [
            [
                'question' => 'What is the daily order cutoff time?',
                'answer'   => 'The daily order cutoff time is 5:00 PM Pacific Standard Time, Monday to Friday.',
            ],
            [
                'question' => 'Which carriers do you use?',
                'answer'   => 'Orders are shipped with trusted domestic U.S. carriers such as USPS, UPS, FedEx, or DHL.',
            ],
            [
                'question' => 'Is checkout secure?',
                'answer'   => 'Checkout transactions use an encrypted SSL connection and certified third-party payment gateways.',
            ],
        ]);
    }

    if ('shipping-policy' === $slug) {
        return [
            [
                'question' => 'Where does Crowdfused ship?',
                'answer'   => 'Crowdfused currently ships exclusively within the United States domestic market.',
            ],
            [
                'question' => 'How long does shipping take?',
                'answer'   => 'Order handling takes 1-2 business days and standard transit takes 3-5 business days.',
            ],
            [
                'question' => 'How much does standard U.S. shipping cost?',
                'answer'   => 'Standard U.S. shipping is free for eligible orders.',
            ],
        ];
    }

    if ('return-refund-policy' === $slug) {
        return [
            [
                'question' => 'What is the return window?',
                'answer'   => 'Eligible products can be returned within 30 days after delivery.',
            ],
            [
                'question' => 'Who pays return shipping?',
                'answer'   => 'Customers are responsible for return shipping costs unless otherwise stated by support.',
            ],
            [
                'question' => 'When will I receive my refund?',
                'answer'   => 'Approved refunds are processed to the original payment method after the returned item is received and inspected.',
            ],
        ];
    }

    if ('terms-conditions' === $slug) {
        return [
            [
                'question' => 'What do these Terms cover?',
                'answer'   => 'These Terms govern access to Crowdfused, browsing the catalog, contacting support, and purchasing products through Crowdfused.com.',
            ],
            [
                'question' => 'Are shipping, returns, and privacy terms included?',
                'answer'   => 'Shipping, returns, refunds, and privacy terms are integrated through the Shipping Policy, Return & Refund Policy, and Privacy Policy.',
            ],
        ];
    }

    return [];
}

