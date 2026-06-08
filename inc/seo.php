<?php
/**
 * SEO metadata for virtual template-part pages.
 *
 * Rank Math can manage normal posts/pages directly. These pages are rendered
 * from theme routes, so we feed Rank Math the same metadata through its filters.
 *
 * @package dawp
 */

function dawp_get_request_path() {
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && ($path === $home_path || strpos($path, $home_path . '/') === 0)) {
        $path = trim(substr($path, strlen($home_path)), '/');
    }

    return $path;
}

function dawp_virtual_seo_pages() {
    $brand = get_bloginfo('name') ?: 'Slicktee';

    return [
        '__front_page__' => [
            'title'       => $brand . ' | Graphic Tees, Hoodies & Streetwear Essentials',
            'description' => 'Shop Slicktee for modern graphic tees, oversized silhouettes, casual hoodies, and everyday streetwear essentials built for clean daily style.',
            'url'         => home_url('/'),
            'image'       => 'assets/img/gallery/Slichtee/image_banner%231.png',
            'schema'      => 'WebPage',
        ],
        'about-us' => [
            'title'       => 'About Slicktee | Modern Graphic Streetwear Apparel',
            'description' => 'Learn about Slicktee, a modern streetwear apparel brand focused on clean graphic tees, oversized fits, casual hoodies, and everyday essentials.',
            'image'       => 'assets/img/gallery/Slichtee/About_image.png',
            'schema'      => 'AboutPage',
        ],
        'faq' => [
            'title'       => 'FAQ | Slicktee Orders, Shipping, Returns & Support',
            'description' => 'Find answers about Slicktee orders, shipping times, returns, refunds, sizing, payments, tracking, and customer support.',
            'image'       => 'assets/img/gallery/Slichtee/contact_banner.png',
            'schema'      => 'FAQPage',
        ],
        'contact-us' => [
            'title'       => 'Contact Slicktee | Customer Support',
            'description' => 'Contact Slicktee support for help with orders, shipping, returns, sizing, product details, tracking, or general customer service questions.',
            'image'       => 'assets/img/gallery/Slichtee/contact_banner.png',
            'schema'      => 'ContactPage',
        ],
        'shipping-policy' => [
            'title'       => 'Shipping Policy | Slicktee',
            'description' => 'Review Slicktee shipping locations, free standard U.S. shipping, processing times, tracking details, carriers, and delivery support.',
            'image'       => 'assets/img/gallery/Slichtee/banner_image%232.png',
            'schema'      => 'WebPage',
        ],
        'return-refund-policy' => [
            'title'       => 'Return & Refund Policy | Slicktee',
            'description' => 'Read Slicktee return eligibility, 30-day return window, return shipping fees, damaged item support, exchange rules, and refund timing.',
            'image'       => 'assets/img/gallery/Slichtee/Relaxed_Fit%20_Oversized_Tees.png',
            'schema'      => 'WebPage',
        ],
        'terms-conditions' => [
            'title'       => 'Terms & Conditions | Slicktee',
            'description' => 'Review the terms and conditions for browsing Slicktee, placing apparel orders, using checkout, submitting reviews, and contacting support.',
            'image'       => 'assets/img/gallery/Slichtee/Original_direction.png',
            'schema'      => 'WebPage',
        ],
        'privacy-policy' => [
            'title'       => 'Privacy Policy | Slicktee',
            'description' => 'Learn how Slicktee collects, uses, shares, and protects customer data when you browse, shop, checkout, or contact support.',
            'image'       => 'assets/img/gallery/Slichtee/about_image%232.png',
            'schema'      => 'PrivacyPolicy',
        ],
        'track-order' => [
            'title'       => 'Track Your Order | Slicktee',
            'description' => 'Track your Slicktee order status with your order details and get help following your shipment from checkout to delivery.',
            'image'       => 'assets/img/gallery/Slichtee/contact_banner.png',
            'schema'      => 'WebPage',
            'robots'      => ['noindex' => 'noindex', 'follow' => 'follow'],
        ],
    ];
}

function dawp_get_current_seo_page() {
    $pages = dawp_virtual_seo_pages();

    if (is_front_page()) {
        return $pages['__front_page__'];
    }

    $path = dawp_get_request_path();

    if (!isset($pages[$path])) {
        return null;
    }

    $page = $pages[$path];
    $page['url'] = $page['url'] ?? home_url('/' . $path . '/');

    return $page;
}

function dawp_get_seo_image_url($page) {
    if (empty($page['image'])) {
        return '';
    }

    return esc_url_raw(get_template_directory_uri() . '/' . ltrim($page['image'], '/'));
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_title');
function dawp_rank_math_title($title) {
    $page = dawp_get_current_seo_page();
    return $page['title'] ?? $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_description');
function dawp_rank_math_description($description) {
    $page = dawp_get_current_seo_page();
    return $page['description'] ?? $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_canonical');
function dawp_rank_math_canonical($canonical) {
    $page = dawp_get_current_seo_page();
    return $page['url'] ?? $canonical;
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_robots');
function dawp_rank_math_robots($robots) {
    $page = dawp_get_current_seo_page();
    return !empty($page['robots']) ? $page['robots'] : $robots;
}

add_filter('rank_math/opengraph/type', 'dawp_rank_math_og_type');
function dawp_rank_math_og_type($type) {
    return dawp_get_current_seo_page() ? 'website' : $type;
}

add_filter('rank_math/opengraph/url', 'dawp_rank_math_og_url');
function dawp_rank_math_og_url($url) {
    $page = dawp_get_current_seo_page();
    return $page['url'] ?? $url;
}

foreach (['facebook', 'twitter'] as $network) {
    add_filter("rank_math/opengraph/{$network}/image", 'dawp_rank_math_social_image');
    add_filter("rank_math/opengraph/{$network}/title", 'dawp_rank_math_social_title');
    add_filter("rank_math/opengraph/{$network}/description", 'dawp_rank_math_social_description');
    add_filter("rank_math/opengraph/{$network}/og_title", 'dawp_rank_math_social_title');
    add_filter("rank_math/opengraph/{$network}/og_description", 'dawp_rank_math_social_description');
}

function dawp_rank_math_social_image($image) {
    $page = dawp_get_current_seo_page();
    $seo_image = $page ? dawp_get_seo_image_url($page) : '';

    return $seo_image ?: $image;
}

function dawp_rank_math_social_title($title) {
    $page = dawp_get_current_seo_page();
    return $page['title'] ?? $title;
}

function dawp_rank_math_social_description($description) {
    $page = dawp_get_current_seo_page();
    return $page['description'] ?? $description;
}

add_filter('rank_math/opengraph/twitter/card_type', 'dawp_rank_math_twitter_card_type');
function dawp_rank_math_twitter_card_type($type) {
    return dawp_get_current_seo_page() ? 'summary_large_image' : $type;
}

add_filter('rank_math/json_ld', 'dawp_rank_math_json_ld', 99, 2);
function dawp_rank_math_json_ld($data, $jsonld) {
    $page = dawp_get_current_seo_page();

    if (!$page) {
        return $data;
    }

    $site_url = home_url('/');
    $page_url = $page['url'];
    $image = dawp_get_seo_image_url($page);
    $schema_type = $page['schema'] ?? 'WebPage';

    $data['dawp_virtual_page'] = array_filter([
        '@type'       => $schema_type,
        '@id'         => trailingslashit($page_url) . '#webpage',
        'url'         => $page_url,
        'name'        => $page['title'],
        'description' => $page['description'],
        'isPartOf'    => ['@id' => trailingslashit($site_url) . '#website'],
        'publisher'   => ['@id' => trailingslashit($site_url) . '#organization'],
        'image'       => $image,
    ]);

    return $data;
}

function dawp_is_rank_math_active() {
    return defined('RANK_MATH_VERSION') || class_exists('RankMath') || class_exists('\RankMath\Helper');
}

add_filter('pre_get_document_title', 'dawp_fallback_virtual_document_title');
function dawp_fallback_virtual_document_title($title) {
    if (dawp_is_rank_math_active()) {
        return $title;
    }

    $page = dawp_get_current_seo_page();
    return $page['title'] ?? $title;
}

add_filter('wp_robots', 'dawp_fallback_virtual_wp_robots');
function dawp_fallback_virtual_wp_robots($robots) {
    if (dawp_is_rank_math_active()) {
        return $robots;
    }

    $page = dawp_get_current_seo_page();

    if (empty($page['robots'])) {
        return $robots;
    }

    if (isset($page['robots']['noindex'])) {
        $robots['noindex'] = true;
        unset($robots['index']);
    }

    if (isset($page['robots']['follow'])) {
        $robots['follow'] = true;
        unset($robots['nofollow']);
    }

    return $robots;
}

add_action('wp_head', 'dawp_fallback_virtual_seo_tags', 2);
function dawp_fallback_virtual_seo_tags() {
    if (dawp_is_rank_math_active()) {
        return;
    }

    $page = dawp_get_current_seo_page();

    if (!$page) {
        return;
    }

    $image = dawp_get_seo_image_url($page);
    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => $page['schema'] ?? 'WebPage',
        '@id'         => trailingslashit($page['url']) . '#webpage',
        'url'         => $page['url'],
        'name'        => $page['title'],
        'description' => $page['description'],
        'image'       => $image,
        'isPartOf'    => [
            '@type' => 'WebSite',
            'url'   => home_url('/'),
            'name'  => get_bloginfo('name'),
        ],
    ];
    ?>
    <meta name="description" content="<?php echo esc_attr($page['description']); ?>">
    <link rel="canonical" href="<?php echo esc_url($page['url']); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr($page['title']); ?>">
    <meta property="og:description" content="<?php echo esc_attr($page['description']); ?>">
    <meta property="og:url" content="<?php echo esc_url($page['url']); ?>">
    <?php if ($image) : ?>
        <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <?php endif; ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($page['title']); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($page['description']); ?>">
    <?php if ($image) : ?>
        <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
    <?php endif; ?>
    <script type="application/ld+json"><?php echo wp_json_encode(array_filter($schema), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php
}
