<?php
/**
 * Lightweight SEO + structured-data layer for TimePiece Haven.
 *
 * The theme ships without an SEO plugin. This file adds:
 *   - a meta description per page context;
 *   - Open Graph + Twitter Card tags;
 *   - JSON-LD: Organization + WebSite sitewide, BreadcrumbList + Product on
 *     WooCommerce product pages.
 *
 * All output is escaped and only uses data already public on the page. Nothing
 * here fabricates ratings, reviews, or prices — Product JSON-LD is emitted only
 * from real WooCommerce product data.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Short, human descriptions for the theme's virtual policy / info pages
 * (see inc/virtual-pages.php). Keyed by request path.
 *
 * @return array<string,string>
 */
function dawp_seo_virtual_descriptions() {
    return [
        'about-us'                 => __('TimePiece Haven is an independent US watch retailer with four focused styles — Minimalist, Sport & Outdoor, Vintage & Leather, and Luxury Style.', 'dawp'),
        'faq'                      => __('Answers about shipping, returns, our watches, movements, water resistance, and payment at TimePiece Haven.', 'dawp'),
        'contact-us'               => __('Contact TimePiece Haven about an order, a return, a product question, or a privacy request. We reply within 1 business day.', 'dawp'),
        'track-order'              => __('Track a TimePiece Haven order with your order number and the email address used at checkout.', 'dawp'),
        'shipping-policy'          => __('How TimePiece Haven ships: free standard shipping on every US order, 1-3 business day processing, and 3-7 business day delivery with tracking.', 'dawp'),
        'return-refund-policy'     => __('TimePiece Haven accepts returns of unworn watches within 30 days of delivery. Read the full return, refund, and exchange policy.', 'dawp'),
        'billing-terms-conditions' => __('How payments are processed at TimePiece Haven: accepted methods, currency, when you are charged, the billing descriptor, and fraud screening.', 'dawp'),
        'terms-of-service'         => __('The terms that govern use of the TimePiece Haven website and any purchase you make from us.', 'dawp'),
        'privacy-policy'           => __('How TimePiece Haven collects, uses, shares, and protects your personal information, and how to exercise your privacy rights.', 'dawp'),
    ];
}

/**
 * Best-effort meta description for the current request.
 */
function dawp_seo_meta_description() {
    $desc = '';

    $request_uri = trim((string) wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
    $virtual     = dawp_seo_virtual_descriptions();

    if (isset($virtual[$request_uri])) {
        $desc = $virtual[$request_uri];
    } elseif (is_front_page()) {
        $desc = get_bloginfo('description', 'display')
            ?: __('An independent US watch retailer with four focused collections. Straightforward pricing, clear specs, and free insured shipping on every US order.', 'dawp');
    } elseif (function_exists('is_product') && is_product()) {
        $product = wc_get_product(get_queried_object_id());

        if ($product) {
            $desc = $product->get_short_description() ?: $product->get_description();
            $desc = wp_strip_all_tags($desc);
        }
    } elseif (function_exists('is_product_category') && (is_product_category() || is_product_tag() || is_tax())) {
        $term = get_queried_object();

        if ($term && !is_wp_error($term)) {
            $desc = $term->description ? wp_strip_all_tags($term->description) : $term->name;
        }
    } elseif (function_exists('is_shop') && is_shop()) {
        $desc = __('Browse every TimePiece Haven watch across Minimalist, Sport & Outdoor, Vintage & Leather, and Luxury Style. Genuine pieces only, free insured US shipping.', 'dawp');
    } elseif (is_singular()) {
        $desc = wp_strip_all_tags(get_the_excerpt(get_queried_object_id()));
    }

    if (!$desc) {
        $desc = get_bloginfo('description', 'display');
    }

    $desc = trim(preg_replace('/\s+/', ' ', (string) $desc));

    if (mb_strlen($desc) > 160) {
        $desc = rtrim(mb_substr($desc, 0, 157), " \t\n\r\0\x0B.,;:") . '…';
    }

    return $desc;
}

/**
 * Canonical URL for the current request (WP core only prints one on singular
 * views; virtual pages and the shop archive need help).
 */
function dawp_seo_canonical_url() {
    if (is_front_page()) {
        return home_url('/');
    }

    if (function_exists('is_shop') && is_shop() && function_exists('wc_get_page_permalink')) {
        return wc_get_page_permalink('shop');
    }

    if ((function_exists('is_product_category') && is_product_category()) || is_tax() || is_tag() || is_category()) {
        $link = get_term_link(get_queried_object());

        return is_wp_error($link) ? '' : $link;
    }

    if (is_singular()) {
        return get_permalink(get_queried_object_id());
    }

    $request_uri = trim((string) wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');

    if (isset(dawp_seo_virtual_descriptions()[$request_uri])) {
        return home_url('/' . $request_uri . '/');
    }

    return '';
}

add_action('wp_head', 'dawp_seo_head_tags', 1);
function dawp_seo_head_tags() {
    if (is_admin()) {
        return;
    }

    $description = dawp_seo_meta_description();
    $canonical   = dawp_seo_canonical_url();
    $site_name   = function_exists('dawp_store_name') ? dawp_store_name() : get_bloginfo('name');
    $title       = wp_get_document_title();

    $og_type  = (function_exists('is_product') && is_product()) ? 'product' : (is_singular() && !is_front_page() ? 'article' : 'website');
    $og_image = '';

    if (function_exists('is_product') && is_product()) {
        $product = wc_get_product(get_queried_object_id());

        if ($product && $product->get_image_id()) {
            $og_image = wp_get_attachment_image_url($product->get_image_id(), 'large');
        }
    }

    if (!$og_image && has_post_thumbnail(get_queried_object_id())) {
        $og_image = get_the_post_thumbnail_url(get_queried_object_id(), 'large');
    }

    if (!$og_image) {
        $og_image = get_theme_file_uri('assets/img/logo.png');
    }

    echo "\n<!-- TimePiece Haven SEO -->\n";

    if ($description) {
        printf('<meta name="description" content="%s">' . "\n", esc_attr($description));
    }

    if ($canonical) {
        printf('<link rel="canonical" href="%s">' . "\n", esc_url($canonical));
    }

    printf('<meta property="og:type" content="%s">' . "\n", esc_attr($og_type));
    printf('<meta property="og:site_name" content="%s">' . "\n", esc_attr($site_name));
    printf('<meta property="og:title" content="%s">' . "\n", esc_attr($title));

    if ($description) {
        printf('<meta property="og:description" content="%s">' . "\n", esc_attr($description));
    }

    if ($canonical) {
        printf('<meta property="og:url" content="%s">' . "\n", esc_url($canonical));
    }

    if ($og_image) {
        printf('<meta property="og:image" content="%s">' . "\n", esc_url($og_image));
    }

    printf('<meta name="twitter:card" content="%s">' . "\n", $og_image ? 'summary_large_image' : 'summary');
    printf('<meta name="twitter:title" content="%s">' . "\n", esc_attr($title));

    if ($description) {
        printf('<meta name="twitter:description" content="%s">' . "\n", esc_attr($description));
    }

    if ($og_image) {
        printf('<meta name="twitter:image" content="%s">' . "\n", esc_url($og_image));
    }
}

/**
 * Sitewide Organization + WebSite JSON-LD, plus a BreadcrumbList on product
 * pages.
 *
 * WooCommerce (WC_Structured_Data) emits its own Product + Offer schema on
 * single product pages, so this layer never adds a second Product node. This
 * theme replaces WooCommerce's content hooks, so WC does not emit a
 * BreadcrumbList or a full Organization on product pages — those are added here.
 */
add_action('wp_head', 'dawp_seo_json_ld', 20);
function dawp_seo_json_ld() {
    if (is_admin()) {
        return;
    }

    $home     = home_url('/');
    $is_prod  = function_exists('is_product') && is_product();
    $graph    = [dawp_seo_organization_data()];

    if ($is_prod) {
        $breadcrumb = dawp_seo_breadcrumb_node(get_queried_object_id());

        if ($breadcrumb) {
            $graph[] = $breadcrumb;
        }
    } else {
        $graph[] = [
            '@type'           => 'WebSite',
            '@id'             => $home . '#website',
            'url'             => $home,
            'name'            => (function_exists('dawp_store_name') ? dawp_store_name() : get_bloginfo('name')),
            'publisher'       => ['@id' => $home . '#organization'],
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => [
                    '@type'       => 'EntryPoint',
                    'urlTemplate' => $home . '?s={search_term_string}&post_type=product',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ];
    }

    echo "\n" . '<script type="application/ld+json">'
        . wp_json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>' . "\n";
}

/**
 * BreadcrumbList for a product: Home › Shop › [primary category] › Product.
 *
 * @param int $product_id
 * @return array<string,mixed>|null
 */
function dawp_seo_breadcrumb_node($product_id) {
    $product = $product_id ? wc_get_product($product_id) : null;

    if (!$product instanceof WC_Product) {
        return null;
    }

    $items = [['name' => __('Home', 'dawp'), 'item' => home_url('/')]];

    $shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : '';

    if ($shop) {
        $items[] = ['name' => __('Shop', 'dawp'), 'item' => $shop];
    }

    $terms = get_the_terms($product->get_id(), 'product_cat');

    if ($terms && !is_wp_error($terms)) {
        $link = get_term_link($terms[0]);

        if (!is_wp_error($link)) {
            $items[] = ['name' => $terms[0]->name, 'item' => $link];
        }
    }

    $items[] = ['name' => $product->get_name(), 'item' => get_permalink($product->get_id())];

    $elements = [];

    foreach ($items as $i => $entry) {
        $elements[] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $entry['name'],
            'item'     => $entry['item'],
        ];
    }

    return ['@type' => 'BreadcrumbList', 'itemListElement' => $elements];
}

/**
 * The Organization node used both by dawp_seo_json_ld() and to enrich the
 * Organization WooCommerce prints on product pages.
 *
 * @return array<string,mixed>
 */
function dawp_seo_organization_data() {
    $home  = home_url('/');
    $email = function_exists('dawp_store_email') ? dawp_store_email() : get_option('admin_email');

    $data = [
        '@type'        => 'Organization',
        '@id'          => $home . '#organization',
        'name'         => (function_exists('dawp_store_name') ? dawp_store_name() : get_bloginfo('name')),
        'url'          => $home,
        'logo'         => get_theme_file_uri('assets/img/logo.png'),
        'email'        => $email,
        'sameAs'       => [
            'https://www.instagram.com/timepiecehaven/',
            'https://www.facebook.com/timepiecehaven/',
        ],
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'contactType'       => 'customer support',
            'email'             => $email,
            'availableLanguage' => 'English',
            'areaServed'        => 'US',
        ],
    ];

    // Only publish a PostalAddress once the WooCommerce store address is a real
    // US address. While the base country is still a placeholder (see project
    // notes), emitting it would put a knowingly-wrong address into schema.
    $base_country = (function_exists('WC') && WC()->countries) ? WC()->countries->get_base_country() : '';

    if ('US' === $base_country && function_exists('dawp_store_address_parts')) {
        $parts = dawp_store_address_parts();

        if (count($parts) >= 2) {
            $data['address'] = [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $parts[0],
                'addressLocality' => $parts[1] ?? '',
                'addressRegion'   => $parts[2] ?? '',
                'addressCountry'  => end($parts),
            ];
        }
    }

    return $data;
}

// Enrich the Organization node WooCommerce outputs on product pages.
add_filter('woocommerce_structured_data_organization', 'dawp_seo_filter_wc_organization');
function dawp_seo_filter_wc_organization($markup) {
    return array_merge((array) $markup, dawp_seo_organization_data());
}
