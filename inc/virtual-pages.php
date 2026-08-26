<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $virtual_pages = dawp_virtual_page_map();

    if ('discover' === $request_uri) {
        wp_safe_redirect(home_url('/about-us/'), 301);
        exit;
    }

    if (preg_match('#^culture-notes/([^/]+)$#', $request_uri, $matches) && function_exists('dawp_get_culture_note')) {
        $note = dawp_get_culture_note(sanitize_title($matches[1]));

        if ($note) {
            status_header(200);
            nocache_headers();

            global $wp_query;
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
            $wp_query->is_singular = true;

            $GLOBALS['dawp_current_culture_note'] = $note;

            get_header();
            echo '<main class="virtual-page virtual-page--culture-note">';
            get_template_part('template-parts/page', 'culture-note');
            echo '</main>';
            get_footer();
            exit;
        }
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
        'about-us'             => ['slug' => 'about',                'title' => 'About Brickgo.com', 'desc' => 'Learn more about Brickgo.com, a modern collectible store for building sets, art figures, blind boxes and display pieces.', 'keywords' => 'Brickgo.com, about Brickgo.com, collectible store, building sets, art figures, blind boxes', 'css' => 'tw-about.css', 'canonical_path' => 'about-us', 'schema_type' => 'AboutPage', 'image' => dawp_home_image_url('2.png')],
        'faq'                  => ['slug' => 'faq',                  'title' => 'Brickgo.com FAQs', 'desc' => 'Find answers to frequently asked questions about shipping, returns, products, payments and support at Brickgo.com.', 'keywords' => 'Brickgo.com FAQ, shipping questions, return questions, order support', 'css' => 'tw-faq.css', 'canonical_path' => 'faq', 'schema_type' => 'FAQPage'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Brickgo.com', 'desc' => 'Contact Brickgo.com support for help with orders, tracking, returns, refunds, product questions or privacy requests.', 'keywords' => 'contact Brickgo.com, Brickgo.com support, order help, return support', 'css' => 'tw-contact.css', 'canonical_path' => 'contact-us', 'schema_type' => 'ContactPage', 'image' => dawp_home_image_url('17.png')],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Brickgo.com shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Brickgo.com shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Brickgo.com shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Brickgo.com shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read the Brickgo.com return and refund policy, including return eligibility, return shipping, exchanges and refund timing.', 'keywords' => 'Brickgo.com return policy, refund policy, returns, refund timing', 'css' => 'tw-ship.css', 'canonical_path' => 'return-refund-policy', 'schema_type' => 'WebPage'],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read the Brickgo.com terms and conditions for browsing the website, placing orders, payments, policies and customer support.', 'keywords' => 'Brickgo.com terms, terms and conditions, store policies, website terms', 'css' => 'tw-terms.css', 'canonical_path' => 'terms-conditions', 'schema_type' => 'WebPage'],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how Brickgo.com collects, uses, protects and manages customer information, cookies, privacy requests and account data.', 'keywords' => 'Brickgo.com privacy policy, customer data, cookies, privacy requests', 'css' => 'tw-privacy.css', 'canonical_path' => 'privacy-policy', 'schema_type' => 'PrivacyPolicy'],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Your Brickgo.com Order', 'desc' => 'Track your Brickgo.com order online using your order ID and billing email, or contact support for shipment help.', 'keywords' => 'track Brickgo.com order, order tracking, shipment status, order status', 'css' => 'track-order.css', 'canonical_path' => 'track-order', 'schema_type' => 'WebPage'],
        'collections'          => ['slug' => 'collections',          'title' => 'Collections', 'desc' => 'Browse all collectible product categories, from building sets and art figures to blind boxes, mini figures and display accessories.', 'keywords' => 'collectible categories, building sets, art figures, blind boxes, designer toys, mini figures', 'css' => 'tw-home.css', 'canonical_path' => 'collections', 'schema_type' => 'CollectionPage', 'image' => dawp_home_image_url('10.png')],
        'new-drops'            => ['slug' => 'new-drops',            'title' => 'New Drops', 'desc' => 'Shop the latest collectible products, newest first, with fresh building sets, art figures, blind boxes and display pieces.', 'keywords' => 'new drops, latest collectibles, new building sets, new art figures, new blind boxes', 'css' => 'tw-home.css', 'canonical_path' => 'new-drops', 'schema_type' => 'CollectionPage', 'image' => dawp_home_image_url('11.png')],
        'drops'                => ['slug' => 'drops',                'title' => 'Drops', 'desc' => 'Follow the latest collectible drops and release-inspired shopping edits.', 'keywords' => 'collectible drops, latest product drops, limited releases, new collectibles', 'css' => 'tw-home.css', 'canonical_path' => 'drops', 'schema_type' => 'CollectionPage', 'image' => dawp_home_image_url('19.png')],
        'culture-notes'        => ['slug' => 'culture-notes',        'title' => 'Culture Notes', 'desc' => 'Read collector stories, display ideas, building notes and clean collecting guides from Brickgo.com Culture Notes.', 'keywords' => 'culture notes, collector stories, display ideas, building sets, blind boxes, designer toys', 'css' => 'tw-culture-notes.css', 'canonical_path' => 'culture-notes', 'schema_type' => 'CollectionPage', 'image' => dawp_home_image_url('16.png')],
        'stories'              => ['slug' => 'culture-notes',        'title' => 'Culture Notes', 'desc' => 'Read collector stories, display ideas, building notes and clean collecting guides from Brickgo.com Culture Notes.', 'keywords' => 'culture notes, collector stories, display ideas, building sets, blind boxes, designer toys', 'css' => 'tw-culture-notes.css', 'canonical_path' => 'culture-notes', 'schema_type' => 'CollectionPage', 'image' => dawp_home_image_url('15.png')],
    ];
}

function dawp_home_page_seo_data() {
    return [
        'slug'           => 'home',
        'title'          => 'Brickgo.com - Build. Collect. Display.',
        'desc'           => 'Shop Brickgo.com for collectible toys, building sets, designer figures, art toys, blind boxes, mini figures and display pieces.',
        'keywords'       => 'Brickgo.com, collectible toys, building sets, designer figures, blind boxes, mini figures',
        'canonical_path' => '',
        'schema_type'    => 'WebSite',
        'image'          => dawp_home_image_url('9.png'),
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
    if (preg_match('#^culture-notes/([^/]+)$#', $request_uri, $matches) && function_exists('dawp_get_culture_note')) {
        $note = dawp_get_culture_note(sanitize_title($matches[1]));
        if ($note) {
            $parts['title'] = $note['title'];
            return $parts;
        }
    }
    if (isset($map[$request_uri])) {
        $parts['title'] = $map[$request_uri]['title'];
    }
    return $parts;
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_current_request_path();
    $pages = dawp_virtual_page_map();

    if (preg_match('#^culture-notes/([^/]+)$#', $request_uri, $matches) && function_exists('dawp_get_culture_note') && dawp_get_culture_note(sanitize_title($matches[1]))) {
        $css_file_path = get_template_directory() . '/assets/css/tw/tw-culture-notes.css';
        wp_enqueue_style(
            'dawp-virtual-page-culture-note',
            get_template_directory_uri() . '/assets/css/tw/tw-culture-notes.css',
            [],
            file_exists($css_file_path) ? filemtime($css_file_path) : '1.0.0'
        );
        return;
    }

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
    if (preg_match('#^culture-notes/([^/]+)$#', $request_uri, $matches) && function_exists('dawp_get_culture_note')) {
        $note = dawp_get_culture_note(sanitize_title($matches[1]));
        if ($note) {
            return [
                'slug'           => 'culture-note',
                'title'          => $note['title'],
                'desc'           => $note['summary'],
                'keywords'       => 'culture notes, collector stories, display ideas, collectibles',
                'canonical_path' => $request_uri,
                'schema_type'    => 'Article',
                'image'          => dawp_home_image_url($note['image']),
            ];
        }
    }
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

    return dawp_home_image_url('9.png');
}

function dawp_rank_math_organization_schema() {
    $support_email = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickgo.com';

    return [
        '@type' => 'Organization',
        '@id'   => home_url('/#organization'),
        'name'  => get_bloginfo('name'),
        'url'   => home_url('/'),
        'email' => $support_email,
        'logo'  => [
            '@type' => 'ImageObject',
            'url'   => get_template_directory_uri() . '/assets/img/about/Logosite (1).png',
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

    $store_name    = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('name') : 'Brickgo.com';
    $support_email = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickgo.com';
    $items = [
        [
            'question' => 'Where does Brickgo.com ship?',
            'answer'   => 'Brickgo.com currently ships exclusively within the United States domestic market.',
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
            'question' => 'How do I contact Brickgo.com?',
            'answer'   => sprintf('Customers can contact %s support by email at %s or through the Contact Us page.', $store_name, $support_email),
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

