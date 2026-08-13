<?php
/**
 * Rank Math integration for theme template pages.
 *
 * Rank Math automatically loads this file when the plugin is active.
 */

function dawp_rank_math_current_template_page() {
    return function_exists('dawp_current_template_page_seo') ? dawp_current_template_page_seo() : null;
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_template_page_title');
function dawp_rank_math_template_page_title($title) {
    $page = dawp_rank_math_current_template_page();
    return $page && !empty($page['seo_title']) ? $page['seo_title'] : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_template_page_description');
function dawp_rank_math_template_page_description($description) {
    $page = dawp_rank_math_current_template_page();
    return $page && !empty($page['description']) ? $page['description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_template_page_canonical');
function dawp_rank_math_template_page_canonical($canonical) {
    $page = dawp_rank_math_current_template_page();
    return $page ? dawp_template_page_canonical_url($page) : $canonical;
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_template_page_robots');
function dawp_rank_math_template_page_robots($robots) {
    if (!dawp_rank_math_current_template_page()) {
        return $robots;
    }

    $robots['index'] = 'index';
    $robots['follow'] = 'follow';
    return $robots;
}

add_filter('rank_math/opengraph/facebook/title', 'dawp_rank_math_template_page_og_title');
add_filter('rank_math/opengraph/twitter/title', 'dawp_rank_math_template_page_og_title');
function dawp_rank_math_template_page_og_title($title) {
    return dawp_rank_math_template_page_title($title);
}

add_filter('rank_math/opengraph/facebook/description', 'dawp_rank_math_template_page_og_description');
add_filter('rank_math/opengraph/twitter/description', 'dawp_rank_math_template_page_og_description');
function dawp_rank_math_template_page_og_description($description) {
    return dawp_rank_math_template_page_description($description);
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_template_page_og_image');
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_template_page_og_image');
function dawp_rank_math_template_page_og_image($image) {
    $page = dawp_rank_math_current_template_page();
    $page_image = $page ? dawp_template_page_image_url($page) : '';
    return $page_image ?: $image;
}

add_filter('rank_math/json_ld', 'dawp_rank_math_template_page_schema', 20, 2);
function dawp_rank_math_template_page_schema($data, $jsonld) {
    $page = dawp_rank_math_current_template_page();
    if (!$page) {
        return $data;
    }

    $url = dawp_template_page_canonical_url($page);
    $data['dawp_template_page'] = [
        '@type' => $page['schema_type'] ?? 'WebPage',
        '@id' => trailingslashit($url) . '#webpage',
        'url' => $url,
        'name' => $page['seo_title'] ?? $page['title'],
        'description' => $page['description'] ?? '',
        'isPartOf' => [
            '@id' => home_url('/#website'),
        ],
    ];

    $image = dawp_template_page_image_url($page);
    if ($image) {
        $data['dawp_template_page']['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url' => $image,
        ];
    }

    if (($page['schema_type'] ?? '') === 'FAQPage') {
        $data['dawp_template_page']['mainEntity'] = dawp_rank_math_faq_schema_entities();
    }

    return $data;
}

function dawp_rank_math_faq_schema_entities() {
    $questions = [
        'Where does Crestovia sell and ship products?' => 'Crestovia currently serves customers in the United States domestic market and ships exclusively within the United States.',
        'How much does standard shipping cost?' => 'Standard U.S. shipping is free on every order with no minimum purchase requirement.',
        'How long does delivery take?' => 'Most orders arrive within 11-18 business days from purchase, including 1-3 business days for handling and 10-15 business days for carrier transit.',
        'What is your return window?' => 'Eligible return requests must be initiated within 30 days of delivery, and items must be unused, undamaged, and returned with original packaging.',
        'How can I contact Crestovia?' => 'For order questions, shipping issues, returns, refunds, privacy requests, or policy inquiries, contact support@crestovia.net.',
    ];

    return array_map(
        static function ($question, $answer) {
            return [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer,
                ],
            ];
        },
        array_keys($questions),
        $questions
    );
}

add_filter('rank_math/frontend/breadcrumb/items', 'dawp_rank_math_template_page_breadcrumbs', 20, 2);
function dawp_rank_math_template_page_breadcrumbs($crumbs, $class) {
    $page = dawp_rank_math_current_template_page();
    if (!$page || ($page['slug'] ?? '') === 'home') {
        return $crumbs;
    }

    return [
        [
            esc_html__('Home', 'dawp'),
            home_url('/'),
        ],
        [
            $page['title'],
            dawp_template_page_canonical_url($page),
        ],
    ];
}
