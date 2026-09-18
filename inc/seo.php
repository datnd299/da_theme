<?php
/**
 * Lightweight SEO defaults for the blank agency build.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

function dawp_brand_name() {
    return apply_filters('dawp_brand_name', get_bloginfo('name') ?: 'Digital Agency');
}

function dawp_default_description() {
    return apply_filters(
        'dawp_default_description',
        'A modern agency website focused on marketing, business growth, and multi-platform revenue performance.'
    );
}

function dawp_get_virtual_seo() {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');

    $map = [
        'services' => [
            'title'       => 'Services',
            'description' => dawp_default_description(),
        ],
        'about-us' => [
            'title'       => 'About',
            'description' => dawp_default_description(),
        ],
        'faq' => [
            'title'       => 'FAQ',
            'description' => dawp_default_description(),
        ],
        'contact-us' => [
            'title'       => 'Contact',
            'description' => dawp_default_description(),
        ],
        'terms-conditions' => [
            'title'       => 'Terms & Conditions',
            'description' => dawp_default_description(),
        ],
        'privacy-policy' => [
            'title'       => 'Privacy Policy',
            'description' => dawp_default_description(),
        ],
    ];

    return $map[$uri] ?? null;
}

add_filter('document_title_parts', 'dawp_document_title_parts');
function dawp_document_title_parts($parts) {
    $virtual = dawp_get_virtual_seo();

    if ($virtual) {
        $parts['title'] = $virtual['title'];
        unset($parts['tagline']);
        return $parts;
    }

    if (is_front_page()) {
        $parts['title'] = dawp_brand_name();
        unset($parts['tagline']);
    }

    return $parts;
}

function dawp_current_description() {
    $virtual = dawp_get_virtual_seo();

    if ($virtual) {
        return $virtual['description'];
    }

    if (is_singular()) {
        $excerpt = get_the_excerpt(get_queried_object_id());
        if ($excerpt) {
            return wp_trim_words(wp_strip_all_tags($excerpt), 32, '');
        }
    }

    return dawp_default_description();
}

function dawp_current_canonical() {
    if (dawp_get_virtual_seo()) {
        $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
        return home_url('/' . $path . '/');
    }

    if (is_front_page()) {
        return home_url('/');
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
    $title       = wp_get_document_title();
    $brand       = dawp_brand_name();

    echo "\n<!-- DA theme SEO -->\n";

    if ($description) {
        printf('<meta name="description" content="%s">' . "\n", esc_attr($description));
    }

    $core_handles_canonical = is_singular() && get_queried_object_id() && !dawp_get_virtual_seo();
    if ($canonical && !$core_handles_canonical) {
        printf('<link rel="canonical" href="%s">' . "\n", esc_url($canonical));
    }

    printf('<meta property="og:site_name" content="%s">' . "\n", esc_attr($brand));
    printf('<meta property="og:type" content="website">' . "\n");
    printf('<meta property="og:title" content="%s">' . "\n", esc_attr($title));
    printf('<meta property="og:description" content="%s">' . "\n", esc_attr($description));
    if ($canonical) {
        printf('<meta property="og:url" content="%s">' . "\n", esc_url($canonical));
    }

    echo '<meta name="twitter:card" content="summary">' . "\n";
    printf('<meta name="twitter:title" content="%s">' . "\n", esc_attr($title));
    printf('<meta name="twitter:description" content="%s">' . "\n", esc_attr($description));
    echo "<!-- /DA theme SEO -->\n\n";
}

add_action('wp', function () {
    if (dawp_get_virtual_seo() || is_front_page()) {
        remove_action('wp_head', 'rel_canonical');
    }
});

add_action('wp_head', 'dawp_org_website_schema', 20);
function dawp_org_website_schema() {
    if (is_admin()) {
        return;
    }

    $home  = home_url('/');
    $graph = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type' => 'Organization',
                '@id'   => $home . '#organization',
                'name'  => dawp_brand_name(),
                'url'   => $home,
            ],
            [
                '@type'      => 'WebSite',
                '@id'        => $home . '#website',
                'url'        => $home,
                'name'       => dawp_brand_name(),
                'publisher'  => ['@id' => $home . '#organization'],
                'inLanguage' => get_bloginfo('language'),
            ],
        ],
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>' . "\n";
}
