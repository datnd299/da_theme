<?php
/**
 * Rank Math SEO integration for theme virtual pages.
 *
 * Rank Math automatically loads this file from the active theme when the
 * plugin is active, so these filters stay scoped to Rank Math output.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_rm_current_page')) {
    function dawp_rm_current_page() {
        return function_exists('dawp_rank_math_page_seo_data') ? dawp_rank_math_page_seo_data() : false;
    }
}

if (!function_exists('dawp_rm_page_title')) {
    function dawp_rm_page_title($page) {
        return function_exists('dawp_rank_math_page_title') ? dawp_rank_math_page_title($page) : get_bloginfo('name');
    }
}

if (!function_exists('dawp_rm_page_url')) {
    function dawp_rm_page_url($page) {
        return function_exists('dawp_rank_math_page_url') ? dawp_rank_math_page_url($page) : home_url('/');
    }
}

if (!function_exists('dawp_rm_page_image')) {
    function dawp_rm_page_image($page) {
        return function_exists('dawp_rank_math_page_image') ? dawp_rank_math_page_image($page) : '';
    }
}

add_filter('rank_math/frontend/title', function($title) {
    $page = dawp_rm_current_page();
    return $page ? dawp_rm_page_title($page) : $title;
});

add_filter('rank_math/frontend/description', function($description) {
    $page = dawp_rm_current_page();
    return $page && !empty($page['desc']) ? $page['desc'] : $description;
});

add_filter('rank_math/frontend/canonical', function($canonical) {
    $page = dawp_rm_current_page();
    return $page ? dawp_rm_page_url($page) : $canonical;
});

add_filter('rank_math/frontend/robots', function($robots) {
    if (dawp_rm_current_page()) {
        $robots['index']  = 'index';
        $robots['follow'] = 'follow';
    }

    return $robots;
});

add_filter('rank_math/frontend/show_keywords', function($show) {
    $page = dawp_rm_current_page();
    return $page && !empty($page['keywords']) ? true : $show;
});

add_filter('rank_math/frontend/keywords', function($keywords) {
    $page = dawp_rm_current_page();
    return $page && !empty($page['keywords']) ? $page['keywords'] : $keywords;
});

$dawp_rm_social_title = function($title) {
    $page = dawp_rm_current_page();
    return $page ? dawp_rm_page_title($page) : $title;
};
add_filter('rank_math/opengraph/facebook/title', $dawp_rm_social_title);
add_filter('rank_math/opengraph/twitter/title', $dawp_rm_social_title);

$dawp_rm_social_description = function($description) {
    $page = dawp_rm_current_page();
    return $page && !empty($page['desc']) ? $page['desc'] : $description;
};
add_filter('rank_math/opengraph/facebook/description', $dawp_rm_social_description);
add_filter('rank_math/opengraph/twitter/description', $dawp_rm_social_description);

add_filter('rank_math/opengraph/url', function($url) {
    $page = dawp_rm_current_page();
    return $page ? dawp_rm_page_url($page) : $url;
});

$dawp_rm_social_image = function($image) {
    $page = dawp_rm_current_page();
    $page_image = $page ? dawp_rm_page_image($page) : '';
    return $page_image ?: $image;
};
add_filter('rank_math/opengraph/facebook/image', $dawp_rm_social_image);
add_filter('rank_math/opengraph/twitter/image', $dawp_rm_social_image);

$dawp_rm_social_image_alt = function($alt) {
    $page = dawp_rm_current_page();
    return $page ? dawp_rm_page_title($page) : $alt;
};
add_filter('rank_math/opengraph/facebook/image_alt', $dawp_rm_social_image_alt);
add_filter('rank_math/opengraph/twitter/image_alt', $dawp_rm_social_image_alt);

add_filter('rank_math/opengraph/type', function($type) {
    return dawp_rm_current_page() ? 'website' : $type;
});

add_filter('rank_math/opengraph/twitter/card_type', function($type) {
    return dawp_rm_current_page() ? 'summary_large_image' : $type;
});

add_filter('rank_math/opengraph/facebook/site_name', function($site_name) {
    return dawp_rm_current_page() ? get_bloginfo('name') : $site_name;
});

add_filter('rank_math/opengraph/facebook/locale', function($locale) {
    return dawp_rm_current_page() ? get_locale() : $locale;
});

add_filter('rank_math/json_ld', function($data) {
    $page = dawp_rm_current_page();
    if (!$page) {
        return $data;
    }

    $page_url    = dawp_rm_page_url($page);
    $title       = dawp_rm_page_title($page);
    $image       = dawp_rm_page_image($page);
    $schema_type = $page['schema_type'] ?? 'WebPage';

    if (function_exists('dawp_rank_math_organization_schema')) {
        $data['dawp_organization'] = dawp_rank_math_organization_schema();
    }

    if (function_exists('dawp_rank_math_website_schema')) {
        $data['dawp_website'] = dawp_rank_math_website_schema();
    }

    if ('WebSite' === $schema_type) {
        if (isset($data['dawp_website'])) {
            $data['dawp_website']['description'] = $page['desc'] ?? '';
        }

        return $data;
    }

    $data['dawp_webpage'] = [
        '@type'       => $schema_type,
        '@id'         => $page_url . '#webpage',
        'url'         => $page_url,
        'name'        => $title,
        'headline'    => $title,
        'description' => $page['desc'] ?? '',
        'isPartOf'    => ['@id' => home_url('/#website')],
        'publisher'   => ['@id' => home_url('/#organization')],
        'inLanguage'  => get_bloginfo('language'),
    ];

    if ($image) {
        $data['dawp_webpage']['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url'   => $image,
        ];
    }

    $faq_entities = function_exists('dawp_rank_math_faq_schema_entities') ? dawp_rank_math_faq_schema_entities($page['slug'] ?? '') : [];
    if ($faq_entities) {
        $data['dawp_webpage']['mainEntity'] = $faq_entities;
    }

    return $data;
}, 99);
