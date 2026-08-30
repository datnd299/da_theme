<?php
/**
 * SEO + structured data for Velmo Custom.
 *
 * No SEO plugin (Rank Math / Yoast) is active on this site, so the theme is
 * responsible for:
 *   - per-context <title> parts (title-tag support does the rest)
 *   - a real <meta name="description">
 *   - canonical + Open Graph / Twitter tags
 *   - Organization + WebSite JSON-LD (site-wide)
 *   - extending WooCommerce's Product JSON-LD with the fields Google Merchant
 *     Center / Google Shopping expect (brand, itemCondition, return + shipping
 *     policy) so the structured data matches the visible policy pages.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

/**
 * Storefront brand name. Filterable for reuse on other stores.
 */
function dawp_brand_name() {
    return apply_filters('dawp_brand_name', 'Zorex Craft');
}

/**
 * Primary market country (ISO 3166-1 alpha-2). Velmo Custom ships U.S.-only per
 * every policy page, so structured data / shipping data key off this rather
 * than the WooCommerce base-country option. Filterable.
 */
function dawp_store_country() {
    return apply_filters('dawp_store_country', 'US');
}

/**
 * Default meta description used when a more specific one is not available.
 */
function dawp_default_description() {
    return apply_filters(
        'dawp_default_description',
        'Velmo Custom is a refined luxury watch store focused on precision, craftsmanship, and timeless contemporary design.'
    );
}

/**
 * Title + description copy for the virtual (code-generated) pages.
 */
function dawp_get_virtual_seo() {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');

    $map = [
        'about-us' => [
            'title'       => 'About Us',
            'description' => 'Velmo Custom is a refined luxury watch store shaped by precision, craftsmanship, and timeless contemporary design.',
        ],
        'faq' => [
            'title'       => 'FAQ',
            'description' => 'Find answers to common questions about orders, shipping, returns, refunds, watch details, and support at Velmo Custom.',
        ],
        'contact-us' => [
            'title'       => 'Contact Us',
            'description' => 'Contact Velmo Custom for help with orders, returns, or product inquiries. Customer service hours: Monday-Friday, 9:00 AM-6:00 PM PST.',
        ],
        'shipping-policy' => [
            'title'       => 'Shipping Policy',
            'description' => 'Velmo Custom shipping policy: U.S. delivery, 5:00 PM PST cutoff, 1-3 business day handling, 5-7 business day transit, free standard shipping, and tracking support.',
        ],
        'return-refund-policy' => [
            'title'       => 'Return & Refund Policy',
            'description' => 'Velmo Custom return and refund policy: 30-day return window, return by mail, no restocking fee, and refunds to the original payment method within 7 business days.',
        ],
        'shipping-returns' => [
            'title'       => 'Shipping & Returns',
            'description' => 'Choose the Velmo Custom Shipping Policy or Return & Refund Policy for clear delivery, return, and refund details.',
        ],
        'terms-conditions' => [
            'title'       => 'Terms & Conditions',
            'description' => 'Read the terms and conditions for shopping at Velmo Custom, including purchase policies and site use guidelines.',
        ],
        'privacy-policy' => [
            'title'       => 'Privacy Policy',
            'description' => 'Learn how Velmo Custom collects, uses, and protects your personal information when you shop with us.',
        ],
        'track-order' => [
            'title'       => 'Track Your Order',
            'description' => 'Track your Velmo Custom order status. Enter your order number and email to check your delivery progress.',
        ],
    ];

    return $map[$uri] ?? null;
}

/* -------------------------------------------------------------------------
 * <title> parts
 * ---------------------------------------------------------------------- */

add_filter('document_title_parts', 'dawp_document_title_parts');
function dawp_document_title_parts($parts) {
    $virtual = dawp_get_virtual_seo();

    if ($virtual) {
        $parts['title'] = $virtual['title'];
        unset($parts['tagline']);
        return $parts;
    }

    if (is_front_page()) {
        $parts['title']   = dawp_brand_name();
        $parts['tagline'] = 'Modern Luxury Watches';
        return $parts;
    }

    if (function_exists('is_shop') && (is_shop() || is_product_taxonomy())) {
        if (is_product_category() || is_product_tag()) {
            $term = get_queried_object();
            if ($term && !is_wp_error($term)) {
                $parts['title'] = $term->name;
            }
        } else {
            $parts['title'] = 'Shop All Watches';
        }
        unset($parts['tagline']);
    }

    return $parts;
}

/* -------------------------------------------------------------------------
 * <meta name="description">, canonical, Open Graph, Twitter
 * ---------------------------------------------------------------------- */

/**
 * Resolve the best meta description for the current request.
 */
function dawp_current_description() {
    $virtual = dawp_get_virtual_seo();
    if ($virtual) {
        return $virtual['description'];
    }

    if (is_front_page()) {
        return dawp_default_description();
    }

    if (function_exists('is_product') && is_product()) {
        $product = wc_get_product(get_queried_object_id());
        if ($product) {
            $text = $product->get_short_description() ?: $product->get_description();
            $text = wp_strip_all_tags(do_shortcode($text));
            if ($text) {
                return wp_trim_words($text, 32, '');
            }
            return sprintf('Shop the %s at %s — modern luxury watches built for precision with presence.', $product->get_name(), dawp_brand_name());
        }
    }

    if (function_exists('is_shop') && is_shop()) {
        return sprintf('Shop modern luxury watches at %s — refined materials, clean presentation, and precise product detail.', dawp_brand_name());
    }

    if (is_product_category() || is_product_tag()) {
        $term = get_queried_object();
        if ($term && !is_wp_error($term) && !empty($term->description)) {
            return wp_trim_words(wp_strip_all_tags($term->description), 32, '');
        }
        if ($term && !is_wp_error($term)) {
            return sprintf('Browse %s at %s — modern luxury watches with confident form and refined presence.', $term->name, dawp_brand_name());
        }
    }

    if (is_singular()) {
        $excerpt = get_the_excerpt(get_queried_object_id());
        if ($excerpt) {
            return wp_trim_words(wp_strip_all_tags($excerpt), 32, '');
        }
    }

    return dawp_default_description();
}

/**
 * Canonical URL for the current request (theme handles the cases WP core does
 * not: virtual pages, shop, front page).
 */
function dawp_current_canonical() {
    if (dawp_get_virtual_seo()) {
        $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
        return home_url('/' . $path . '/');
    }

    if (is_front_page()) {
        return home_url('/');
    }

    if (function_exists('is_shop') && is_shop()) {
        $shop_id = wc_get_page_id('shop');
        return $shop_id ? get_permalink($shop_id) : home_url('/shop/');
    }

    if (is_product_category() || is_product_tag()) {
        $link = get_term_link(get_queried_object());
        return is_wp_error($link) ? '' : $link;
    }

    if (is_singular()) {
        return get_permalink(get_queried_object_id());
    }

    return '';
}

add_action('wp_head', 'dawp_head_meta', 1);
function dawp_head_meta() {
    if (is_admin()) {
        return;
    }

    $description = trim((string) dawp_current_description());
    $canonical   = dawp_current_canonical();
    $brand       = dawp_brand_name();

    // OG type + image.
    $og_type = is_singular('post') ? 'article' : 'website';
    $image   = '';

    if (function_exists('is_product') && is_product()) {
        $og_type = 'product';
        $product = wc_get_product(get_queried_object_id());
        if ($product && $product->get_image_id()) {
            $image = wp_get_attachment_image_url($product->get_image_id(), 'large');
        }
    } elseif (is_singular() && has_post_thumbnail(get_queried_object_id())) {
        $image = get_the_post_thumbnail_url(get_queried_object_id(), 'large');
    }

    if (!$image) {
        $image = get_template_directory_uri() . '/assets/images/home/luxuryimagecollection (1)/logobrand (2).png';
    }

    $title = wp_get_document_title();

    echo "\n<!-- Velmo Custom SEO -->\n";

    if ($description) {
        printf('<meta name="description" content="%s">' . "\n", esc_attr($description));
    }

    // WordPress core prints rel=canonical for singular views with a real object
    // ID; only emit our own for the cases it skips (virtual pages, shop, front
    // page, product taxonomies) to avoid a duplicate tag.
    $core_handles_canonical = is_singular() && get_queried_object_id() && !dawp_get_virtual_seo();
    if ($canonical && !$core_handles_canonical) {
        printf('<link rel="canonical" href="%s">' . "\n", esc_url($canonical));
    }

    printf('<meta property="og:site_name" content="%s">' . "\n", esc_attr($brand));
    printf('<meta property="og:type" content="%s">' . "\n", esc_attr($og_type));
    printf('<meta property="og:title" content="%s">' . "\n", esc_attr($title));
    if ($description) {
        printf('<meta property="og:description" content="%s">' . "\n", esc_attr($description));
    }
    if ($canonical) {
        printf('<meta property="og:url" content="%s">' . "\n", esc_url($canonical));
    }
    if ($image) {
        printf('<meta property="og:image" content="%s">' . "\n", esc_url($image));
    }

    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    printf('<meta name="twitter:title" content="%s">' . "\n", esc_attr($title));
    if ($description) {
        printf('<meta name="twitter:description" content="%s">' . "\n", esc_attr($description));
    }
    if ($image) {
        printf('<meta name="twitter:image" content="%s">' . "\n", esc_url($image));
    }

    echo "<!-- /Velmo Custom SEO -->\n\n";
}

// WordPress core only prints rel=canonical for singular views with a real
// object ID, so it is safe to keep it enabled alongside ours (our early
// wp_head hook covers the virtual pages / shop that core skips). Prevent a
// duplicate tag on standard singular pages by removing core's copy there.
add_action('wp', function () {
    if (dawp_get_virtual_seo() || (function_exists('is_shop') && is_shop()) || is_front_page()) {
        remove_action('wp_head', 'rel_canonical');
    }
});

/* -------------------------------------------------------------------------
 * Organization + WebSite JSON-LD (site-wide)
 * ---------------------------------------------------------------------- */

add_action('wp_head', 'dawp_org_website_schema', 20);
function dawp_org_website_schema() {
    if (is_admin()) {
        return;
    }

    $brand = dawp_brand_name();
    $home  = home_url('/');
    $logo  = get_template_directory_uri() . '/assets/images/home/luxuryimagecollection (1)/logobrand (2).png';
    $email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@velmocustom.com';

    $organization = [
        '@type'  => 'Organization',
        '@id'    => $home . '#organization',
        'name'   => $brand,
        'url'    => $home,
        'logo'   => [
            '@type' => 'ImageObject',
            'url'   => $logo,
        ],
        'email'        => $email,
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'contactType'       => 'customer support',
            'email'             => $email,
            'availableLanguage' => 'English',
            'areaServed'        => dawp_store_country(),
            'hoursAvailable'    => [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens'     => '09:00',
                'closes'    => '18:00',
            ],
        ],
    ];

    $address = dawp_schema_postal_address();
    if ($address) {
        $organization['address'] = $address;
    }

    $website = [
        '@type'           => 'WebSite',
        '@id'             => $home . '#website',
        'url'             => $home,
        'name'            => $brand,
        'publisher'       => ['@id' => $home . '#organization'],
        'inLanguage'      => get_bloginfo('language'),
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => [
                '@type'       => 'EntryPoint',
                'urlTemplate' => home_url('/?s={search_term_string}&post_type=product'),
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];

    $graph = [
        '@context' => 'https://schema.org',
        '@graph'   => [$organization, $website],
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>' . "\n";
}

/**
 * PostalAddress node built from the WooCommerce store address, when set.
 */
function dawp_schema_postal_address() {
    if (!function_exists('WC') || !WC() || !isset(WC()->countries)) {
        return null;
    }

    $countries = WC()->countries;
    $street    = trim(wp_strip_all_tags((string) $countries->get_base_address()));
    $street2   = trim(wp_strip_all_tags((string) $countries->get_base_address_2()));
    $city      = trim(wp_strip_all_tags((string) $countries->get_base_city()));
    $postcode  = trim(wp_strip_all_tags((string) $countries->get_base_postcode()));
    $state     = trim(wp_strip_all_tags((string) $countries->get_base_state()));
    $country   = trim(wp_strip_all_tags((string) $countries->get_base_country()));

    if (!$street && !$city) {
        return null;
    }

    $address = ['@type' => 'PostalAddress'];
    if ($street) {
        $address['streetAddress'] = trim($street . ' ' . $street2);
    }
    if ($city) {
        $address['addressLocality'] = $city;
    }
    if ($state) {
        $address['addressRegion'] = $state;
    }
    if ($postcode) {
        $address['postalCode'] = $postcode;
    }
    if ($country) {
        $address['addressCountry'] = $country;
    }

    return $address;
}

/* -------------------------------------------------------------------------
 * Extend WooCommerce Product JSON-LD for Merchant Center / Shopping
 * ---------------------------------------------------------------------- */

/**
 * Brand for a product: WooCommerce Brands taxonomy → a "brand" attribute →
 * the storefront name.
 */
function dawp_get_product_brand($product) {
    if (!$product instanceof WC_Product) {
        return dawp_brand_name();
    }

    foreach (['product_brand', 'pwb-brand', 'yith_product_brand'] as $taxonomy) {
        if (!taxonomy_exists($taxonomy)) {
            continue;
        }
        $terms = get_the_terms($product->get_id(), $taxonomy);
        if ($terms && !is_wp_error($terms)) {
            return $terms[0]->name;
        }
    }

    foreach (['brand', 'pa_brand'] as $attribute) {
        $value = $product->get_attribute($attribute);
        if ($value) {
            return $value;
        }
    }

    return dawp_brand_name();
}

/**
 * Return policy node mirroring template-parts/page-return-refund-policy.php.
 */
function dawp_merchant_return_policy() {
    return [
        '@type'                => 'MerchantReturnPolicy',
        'applicableCountry'    => dawp_store_country(),
        'returnPolicyCategory' => 'https://schema.org/MerchantReturnFiniteReturnWindow',
        'merchantReturnDays'   => 30,
        'returnMethod'         => 'https://schema.org/ReturnByMail',
    ];
}

/**
 * Shipping node mirroring template-parts/page-shipping-policy.php
 * (free U.S. standard shipping, 1-3 day handling, 5-7 day transit).
 */
function dawp_offer_shipping_details() {
    $currency = function_exists('get_woocommerce_currency') ? get_woocommerce_currency() : 'USD';

    return [
        '@type'               => 'OfferShippingDetails',
        'shippingRate'        => [
            '@type'    => 'MonetaryAmount',
            'value'    => 0,
            'currency' => $currency,
        ],
        'shippingDestination' => [
            '@type'          => 'DefinedRegion',
            'addressCountry' => dawp_store_country(),
        ],
        'deliveryTime'        => [
            '@type'        => 'ShippingDeliveryTime',
            'handlingTime' => [
                '@type'    => 'QuantitativeValue',
                'minValue' => 1,
                'maxValue' => 3,
                'unitCode' => 'DAY',
            ],
            'transitTime'  => [
                '@type'    => 'QuantitativeValue',
                'minValue' => 5,
                'maxValue' => 7,
                'unitCode' => 'DAY',
            ],
        ],
    ];
}

add_filter('woocommerce_structured_data_product', 'dawp_structured_data_product', 20, 2);
function dawp_structured_data_product($markup, $product) {
    if (empty($markup) || !is_array($markup)) {
        return $markup;
    }

    $brand = dawp_get_product_brand($product);
    if ($brand) {
        $markup['brand'] = [
            '@type' => 'Brand',
            'name'  => $brand,
        ];
    }

    // MPN falls back to the SKU so listings always carry an identifier pair.
    if (empty($markup['mpn']) && !empty($markup['sku'])) {
        $markup['mpn'] = (string) $markup['sku'];
    }

    return $markup;
}

add_filter('woocommerce_structured_data_product_offer', 'dawp_structured_data_product_offer', 20, 2);
function dawp_structured_data_product_offer($offer, $product) {
    if (empty($offer) || !is_array($offer)) {
        return $offer;
    }

    $offer['itemCondition']           = 'https://schema.org/NewCondition';
    $offer['hasMerchantReturnPolicy'] = dawp_merchant_return_policy();
    $offer['shippingDetails']         = dawp_offer_shipping_details();

    return $offer;
}
