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
    $default_image = dawp_imagewatch_url('1.png');
    $policy_date = '2026-08-28';

    return [
        'about-us'             => ['slug' => 'about',                'title' => 'About Reluxwatches', 'desc' => 'Learn more about Reluxwatches, a modern ecommerce store for watches and watch accessories.', 'keywords' => 'Reluxwatches, about Reluxwatches, modern watches, watch accessories', 'css' => 'tw-about.css', 'canonical_path' => 'about-us', 'schema_type' => 'AboutPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches modern watches and accessories'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'Reluxwatches FAQs', 'desc' => 'Find answers to frequently asked questions about shipping, returns, products, payments and support at Reluxwatches.', 'keywords' => 'Reluxwatches FAQ, shipping questions, return questions, order support', 'css' => 'tw-faq.css', 'canonical_path' => 'faq', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches customer help and shopping FAQs'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Reluxwatches', 'desc' => 'Contact Reluxwatches support for help with orders, tracking, returns, refunds, product questions or privacy requests.', 'keywords' => 'contact Reluxwatches, Reluxwatches support, order help, return support', 'css' => 'tw-contact.css', 'canonical_path' => 'contact-us', 'schema_type' => 'ContactPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches customer support'],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Reluxwatches shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Reluxwatches shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches shipping policy', 'date_modified' => $policy_date],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Reluxwatches shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'Reluxwatches shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches shipping policy', 'date_modified' => $policy_date],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read the Reluxwatches return and refund policy, including return eligibility, return shipping, exchanges and refund timing.', 'keywords' => 'Reluxwatches return policy, refund policy, returns, refund timing', 'css' => 'tw-ship.css', 'canonical_path' => 'return-refund-policy', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches return and refund policy', 'date_modified' => $policy_date],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read the Reluxwatches terms and conditions for browsing the website, placing orders, payments, policies and customer support.', 'keywords' => 'Reluxwatches terms, terms and conditions, store policies, website terms', 'css' => 'tw-terms.css', 'canonical_path' => 'terms-conditions', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches terms and conditions', 'date_modified' => $policy_date],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how Reluxwatches collects, uses, protects and manages customer information, cookies, privacy requests and account data.', 'keywords' => 'Reluxwatches privacy policy, customer data, cookies, privacy requests', 'css' => 'tw-privacy.css', 'canonical_path' => 'privacy-policy', 'schema_type' => 'PrivacyPolicy', 'image' => $default_image, 'image_alt' => 'Reluxwatches privacy policy', 'date_modified' => $policy_date],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Your Reluxwatches Order', 'desc' => 'Track your Reluxwatches order online using your order ID and billing email, or contact support for shipment help.', 'keywords' => 'track Reluxwatches order, order tracking, shipment status, order status', 'css' => 'track-order.css', 'canonical_path' => 'track-order', 'schema_type' => 'WebPage', 'image' => $default_image, 'image_alt' => 'Reluxwatches order tracking'],
    ];
}

function dawp_home_page_seo_data() {
    return [
        'slug'           => 'home',
        'title'          => 'Reluxwatches - Modern Watches for Modern Life',
        'desc'           => 'Shop Reluxwatches for modern everyday watches, statement pieces, minimal styles and watch accessories.',
        'keywords'       => 'Reluxwatches, modern watches, everyday watches, statement watches, watch accessories',
        'canonical_path' => '',
        'schema_type'    => 'WebSite',
        'image'          => dawp_imagewatch_url('2.png'),
        'image_alt'      => 'Reluxwatches modern wristwatch campaign',
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

    return dawp_imagewatch_url('1.png');
}

function dawp_imagewatch_url($filename) {
    return get_theme_file_uri('assets/img/imagewatch/' . ltrim($filename, '/'));
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
        'name'  => 'Reluxwatches',
        'url'   => home_url('/'),
        'logo'  => get_theme_file_uri('assets/img/imagewatch/logowatch.png'),
        'email' => 'support@reluxwatches.com',
        'contactPoint' => [
            [
                '@type'       => 'ContactPoint',
                'email'       => 'support@reluxwatches.com',
                'contactType' => 'customer support',
                'areaServed'  => 'US',
                'availableLanguage' => ['en'],
            ],
        ],
    ];

    $street = trim((string) get_option('woocommerce_store_address', ''));
    $street_2 = trim((string) get_option('woocommerce_store_address_2', ''));

    if ($street !== '') {
        $country_state = trim((string) get_option('woocommerce_default_country', ''));
        $country = $country_state;
        $region  = '';

        if (strpos($country_state, ':') !== false) {
            [$country, $region] = array_pad(explode(':', $country_state, 2), 2, '');
        }

        $address = array_filter([
            'streetAddress'   => $street_2 !== '' ? $street . ', ' . $street_2 : $street,
            'addressLocality' => trim((string) get_option('woocommerce_store_city', '')),
            'addressRegion'   => $region,
            'postalCode'      => trim((string) get_option('woocommerce_store_postcode', '')),
            'addressCountry'  => $country,
        ]);

        $address['@type'] = 'PostalAddress';
        $schema['address'] = $address;
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

/**
 * FAQ structured data.
 *
 * Policy templates register the exact FAQ array they render on screen via
 * dawp_register_faq_schema(); the FAQPage JSON-LD is then printed in the footer
 * from that same data, so the markup always matches the visible content.
 */
function dawp_register_faq_schema($items) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    if (!isset($GLOBALS['dawp_faq_schema_items']) || !is_array($GLOBALS['dawp_faq_schema_items'])) {
        $GLOBALS['dawp_faq_schema_items'] = [];
    }

    foreach ($items as $item) {
        if (empty($item['question']) || empty($item['answer'])) {
            continue;
        }

        $GLOBALS['dawp_faq_schema_items'][] = [
            'question' => wp_strip_all_tags((string) $item['question']),
            'answer'   => wp_strip_all_tags((string) $item['answer']),
        ];
    }
}

add_action('wp_footer', 'dawp_print_faq_schema', 20);
function dawp_print_faq_schema() {
    $items = $GLOBALS['dawp_faq_schema_items'] ?? [];

    if (!$items) {
        return;
    }

    $entities = [];

    foreach ($items as $item) {
        $entities[] = [
            '@type'          => 'Question',
            'name'           => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $item['answer'],
            ],
        ];
    }

    $schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ];

    echo "\n" . '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
}

