<?php
/**
 * SEO metadata and schema for virtual pages served from template-parts.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title');
function dawp_rank_math_virtual_page_title($title) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['seo_title'] : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description');
function dawp_rank_math_virtual_page_description($description) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical');
function dawp_rank_math_virtual_page_canonical($canonical) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? dawp_virtual_page_canonical($page) : $canonical;
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_virtual_page_robots');
function dawp_rank_math_virtual_page_robots($robots) {
    $page = dawp_get_current_virtual_page(true);

    if (!$page) {
        return $robots;
    }

    $robots['index']  = 'index';
    $robots['follow'] = 'follow';

    return $robots;
}

add_filter('rank_math/opengraph/type', 'dawp_rank_math_virtual_page_og_type');
function dawp_rank_math_virtual_page_og_type($type) {
    return dawp_get_current_virtual_page(true) ? 'website' : $type;
}

add_filter('rank_math/opengraph/url', 'dawp_rank_math_virtual_page_og_url');
function dawp_rank_math_virtual_page_og_url($url) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? dawp_virtual_page_canonical($page) : $url;
}

add_filter('rank_math/opengraph/site_name', 'dawp_rank_math_virtual_page_site_name');
function dawp_rank_math_virtual_page_site_name($site_name) {
    return dawp_get_current_virtual_page(true) ? get_bloginfo('name') : $site_name;
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_virtual_page_og_image');
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_virtual_page_og_image');
function dawp_rank_math_virtual_page_og_image($image) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? dawp_virtual_page_image_url($page) : $image;
}

add_filter('rank_math/opengraph/facebook/image_alt', 'dawp_rank_math_virtual_page_image_alt');
add_filter('rank_math/opengraph/twitter/image_alt', 'dawp_rank_math_virtual_page_image_alt');
function dawp_rank_math_virtual_page_image_alt($alt) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['title'] . ' - ' . get_bloginfo('name') : $alt;
}

add_filter('rank_math/opengraph/facebook/og:title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/facebook/og_title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/facebook/title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/twitter/twitter:title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/twitter/twitter_title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/twitter/title', 'dawp_rank_math_virtual_page_social_title');
function dawp_rank_math_virtual_page_social_title($title) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['seo_title'] : $title;
}

add_filter('rank_math/opengraph/facebook/og:description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/facebook/og_description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/facebook/description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/twitter/twitter:description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/twitter/twitter_description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/twitter/description', 'dawp_rank_math_virtual_page_social_description');
function dawp_rank_math_virtual_page_social_description($description) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['description'] : $description;
}

add_filter('rank_math/opengraph/twitter/card_type', 'dawp_rank_math_virtual_page_twitter_card');
function dawp_rank_math_virtual_page_twitter_card($type) {
    return dawp_get_current_virtual_page(true) ? 'summary_large_image' : $type;
}

add_filter('rank_math/sitemap/page_content', 'dawp_rank_math_virtual_page_sitemap');
function dawp_rank_math_virtual_page_sitemap($content) {
    $lastmod = '2026-05-30T00:00:00+00:00';

    foreach (dawp_virtual_page_map() as $path => $page) {
        if ($path === 'home') {
            continue;
        }

        $page['path'] = $path;
        $content .= "\n<url>\n";
        $content .= "\t<loc>" . esc_url(dawp_virtual_page_canonical($page)) . "</loc>\n";
        $content .= "\t<lastmod>" . esc_html($lastmod) . "</lastmod>\n";
        $content .= "</url>";
    }

    return $content;
}

add_filter('rank_math/json_ld', 'dawp_rank_math_virtual_page_schema', 99, 2);
function dawp_rank_math_virtual_page_schema($data, $jsonld) {
    $page = dawp_get_current_virtual_page(true);

    if (!$page) {
        return $data;
    }

    $canonical   = dawp_virtual_page_canonical($page);
    $schema_type = !empty($page['schema_type']) ? $page['schema_type'] : 'WebPage';
    $schema      = [
        '@type'        => $schema_type,
        '@id'          => $canonical . '#webpage',
        'url'          => $canonical,
        'name'         => $page['seo_title'],
        'description'  => $page['description'],
        'isPartOf'     => [
            '@id' => home_url('/#website'),
        ],
        'inLanguage'   => get_bloginfo('language') ?: 'en-US',
        'dateModified' => '2026-05-30',
    ];

    if ($page['path'] === 'faq') {
        $schema['mainEntity'] = dawp_rank_math_faq_entities();
    }

    $image = dawp_virtual_page_image_url($page);

    if ($image) {
        $schema['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url'   => $image,
        ];
        $schema['thumbnailUrl'] = $image;
    }

    $schema_key = $schema_type === 'FAQPage' ? 'FAQPage' : 'WebPage';

    if (!empty($data[$schema_key]) && is_array($data[$schema_key])) {
        $schema = array_merge($data[$schema_key], $schema);
    }

    $data[$schema_key] = $schema;

    return $data;
}

function dawp_rank_math_faq_entities() {
    $entities = [];

    foreach (dawp_get_faq_items() as $item) {
        $entities[] = [
            '@type'          => 'Question',
            'name'           => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags($item['answer']),
            ],
        ];
    }

    return $entities;
}
