<?php
/**
 * SEO defaults for theme virtual pages.
 *
 * Rank Math can optimize regular WordPress and WooCommerce routes directly.
 * These virtual pages do not have editable WP page objects, so the theme
 * provides their metadata through Rank Math frontend filters.
 *
 * @package dawp
 */

if (!function_exists('dawp_seo_page_data')) {
function dawp_seo_page_data() {
    return [
        'about-us' => [
            'title'       => 'About Us',
            'description' => 'Learn about House of Shoes Online, a footwear store focused on everyday shoes, casual sneakers, sandals, slides, slippers, boots, comfort, and daily style.',
            'schema_type' => 'AboutPage',
        ],
        'faq' => [
            'title'       => 'FAQ',
            'description' => 'Find quick answers about House of Shoes Online orders, U.S. shipping, returns, refunds, sizing, payments, tracking, and customer support.',
            'schema_type' => 'FAQPage',
        ],
        'contact-us' => [
            'title'       => 'Contact Us',
            'description' => 'Contact House of Shoes Online for help with footwear sizing, fit, orders, shipping, returns, refunds, and product questions.',
            'schema_type' => 'ContactPage',
        ],
        'shipping-policy' => [
            'title'       => 'Shipping Policy',
            'description' => 'Review House of Shoes Online shipping locations, free standard U.S. shipping, processing times, delivery estimates, tracking, and support details.',
            'schema_type' => 'WebPage',
        ],
        'return-refund-policy' => [
            'title'       => 'Return & Refund Policy',
            'description' => 'Review House of Shoes Online return eligibility, 30-day return window, refund timing, exchanges, return shipping fees, and support details.',
            'schema_type' => 'WebPage',
        ],
        'terms-conditions' => [
            'title'       => 'Terms & Conditions',
            'description' => 'Read the House of Shoes Online terms for website use, footwear orders, payments, product information, shipping, returns, privacy, and support.',
            'schema_type' => 'WebPage',
        ],
        'privacy-policy' => [
            'title'       => 'Privacy Policy',
            'description' => 'Learn how House of Shoes Online collects, uses, protects, and shares customer information for browsing, checkout, orders, and support.',
            'schema_type' => 'WebPage',
        ],
        'track-order' => [
            'title'       => 'Track Order',
            'description' => 'Track your House of Shoes Online order status with your order details and follow shipment updates from checkout to delivery.',
            'schema_type' => 'WebPage',
            'robots'      => [
                'index'  => 'noindex',
                'follow' => 'follow',
            ],
        ],
    ];
}
}

if (!function_exists('dawp_current_virtual_page_key')) {
function dawp_current_virtual_page_key() {
    $request_uri = trim(wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $seo_pages   = dawp_seo_page_data();

    return isset($seo_pages[$request_uri]) ? $request_uri : '';
}
}

if (!function_exists('dawp_current_seo_page')) {
function dawp_current_seo_page() {
    $key = dawp_current_virtual_page_key();

    if ('' === $key) {
        return null;
    }

    $pages = dawp_seo_page_data();
    $page  = $pages[$key];

    $page['path']      = $key;
    $page['url']       = home_url('/' . trailingslashit($key));
    $page['site_name'] = get_bloginfo('name') ?: 'House of Shoes Online';
    $page['full_title'] = sprintf('%s - %s', $page['title'], $page['site_name']);

    return $page;
}
}

add_filter('document_title_parts', 'dawp_seo_document_title_parts');
if (!function_exists('dawp_seo_document_title_parts')) {
function dawp_seo_document_title_parts($parts) {
    $page = dawp_current_seo_page();

    if ($page) {
        $parts['title'] = $page['title'];
    }

    return $parts;
}
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title');
if (!function_exists('dawp_rank_math_virtual_page_title')) {
function dawp_rank_math_virtual_page_title($title) {
    $page = dawp_current_seo_page();

    return $page ? $page['full_title'] : $title;
}
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description');
if (!function_exists('dawp_rank_math_virtual_page_description')) {
function dawp_rank_math_virtual_page_description($description) {
    $page = dawp_current_seo_page();

    return $page ? $page['description'] : $description;
}
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical');
if (!function_exists('dawp_rank_math_virtual_page_canonical')) {
function dawp_rank_math_virtual_page_canonical($canonical) {
    $page = dawp_current_seo_page();

    return $page ? $page['url'] : $canonical;
}
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_virtual_page_robots');
if (!function_exists('dawp_rank_math_virtual_page_robots')) {
function dawp_rank_math_virtual_page_robots($robots) {
    $page = dawp_current_seo_page();

    if (!$page || empty($page['robots'])) {
        return $robots;
    }

    return array_merge($robots, $page['robots']);
}
}

add_filter('rank_math/opengraph/facebook/title', 'dawp_rank_math_virtual_page_og_title');
add_filter('rank_math/opengraph/twitter/title', 'dawp_rank_math_virtual_page_og_title');
if (!function_exists('dawp_rank_math_virtual_page_og_title')) {
function dawp_rank_math_virtual_page_og_title($title) {
    $page = dawp_current_seo_page();

    return $page ? $page['full_title'] : $title;
}
}

add_filter('rank_math/opengraph/facebook/description', 'dawp_rank_math_virtual_page_og_description');
add_filter('rank_math/opengraph/twitter/description', 'dawp_rank_math_virtual_page_og_description');
if (!function_exists('dawp_rank_math_virtual_page_og_description')) {
function dawp_rank_math_virtual_page_og_description($description) {
    $page = dawp_current_seo_page();

    return $page ? $page['description'] : $description;
}
}

add_filter('rank_math/opengraph/facebook/url', 'dawp_rank_math_virtual_page_og_url');
add_filter('rank_math/opengraph/twitter/url', 'dawp_rank_math_virtual_page_og_url');
if (!function_exists('dawp_rank_math_virtual_page_og_url')) {
function dawp_rank_math_virtual_page_og_url($url) {
    $page = dawp_current_seo_page();

    return $page ? $page['url'] : $url;
}
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_virtual_page_og_image');
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_virtual_page_og_image');
if (!function_exists('dawp_rank_math_virtual_page_og_image')) {
function dawp_rank_math_virtual_page_og_image($image) {
    $page = dawp_current_seo_page();

    return $page ? get_template_directory_uri() . '/assets/img/image.png' : $image;
}
}

add_filter('rank_math/json_ld', 'dawp_rank_math_virtual_page_schema', 20);
if (!function_exists('dawp_rank_math_virtual_page_schema')) {
function dawp_rank_math_virtual_page_schema($data) {
    $page = dawp_current_seo_page();

    if (!$page) {
        return $data;
    }

    $page_id = untrailingslashit($page['url']) . '#webpage';
    $data['dawp_virtual_page'] = [
        '@type'       => $page['schema_type'],
        '@id'         => $page_id,
        'url'         => $page['url'],
        'name'        => $page['title'],
        'description' => $page['description'],
        'isPartOf'    => [
            '@id' => home_url('/#website'),
        ],
    ];

    if ('FAQPage' === $page['schema_type'] && function_exists('dawp_faq_schema_questions')) {
        $questions = dawp_faq_schema_questions();

        if (!empty($questions)) {
            $data['dawp_virtual_page']['mainEntity'] = $questions;
        }
    }

    return $data;
}
}

if (!function_exists('dawp_faq_schema_questions')) {
function dawp_faq_schema_questions() {
    return [
        [
            '@type'          => 'Question',
            'name'           => 'How do I know if my order was placed successfully?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => 'After checkout, you should receive an order confirmation email with your order details. Check spam or promotions folders first, then contact support if you still need help.',
            ],
        ],
        [
            '@type'          => 'Question',
            'name'           => 'How much does shipping cost?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => 'Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement.',
            ],
        ],
        [
            '@type'          => 'Question',
            'name'           => 'What is your return window?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => 'You must initiate your return request within 30 days of delivery. Eligible footwear must be unworn, unused, undamaged, clean, and returned with original packaging and included accessories.',
            ],
        ],
    ];
}
}

add_action('wp_head', 'dawp_virtual_page_fallback_meta', 2);
if (!function_exists('dawp_virtual_page_fallback_meta')) {
function dawp_virtual_page_fallback_meta() {
    if (defined('RANK_MATH_VERSION')) {
        return;
    }

    $page = dawp_current_seo_page();

    if (!$page) {
        return;
    }
    ?>
    <meta name="description" content="<?php echo esc_attr($page['description']); ?>">
    <?php if (!empty($page['robots'])) : ?>
    <meta name="robots" content="<?php echo esc_attr(implode(', ', $page['robots'])); ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo esc_url($page['url']); ?>">
    <meta property="og:title" content="<?php echo esc_attr($page['full_title']); ?>">
    <meta property="og:description" content="<?php echo esc_attr($page['description']); ?>">
    <meta property="og:url" content="<?php echo esc_url($page['url']); ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/assets/img/image.png'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($page['full_title']); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($page['description']); ?>">
    <meta name="twitter:image" content="<?php echo esc_url(get_template_directory_uri() . '/assets/img/image.png'); ?>">
    <?php
}
}
