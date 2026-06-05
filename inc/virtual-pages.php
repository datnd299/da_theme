<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_current_virtual_page_path();
    $virtual_pages = dawp_virtual_page_map();

    if ($request_uri === 'shipping-returns') {
        wp_safe_redirect(home_url('/shipping-policy/'), 301);
        exit;
    }

    if ($request_uri === 'home') {
        wp_safe_redirect(home_url('/'), 301);
        exit;
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
    $theme_uri = get_template_directory_uri();
    $hero_image = dawp_i0_image_url($theme_uri . '/assets/img/toyocartv/toyocartv-hero.png', 1200, 675);
    $accessory_image = dawp_i0_image_url($theme_uri . '/assets/img/toyocartv/toyocartv-accessories.png', 1200, 900);

    return [
        'home' => [
            'slug'  => 'home',
            'title' => 'Home',
            'css'   => 'tw/tw-home.css',
            'seo'   => [
                'title'       => 'Car Accessories for Cleaner, Easier Everyday Drives',
                'description' => 'Shop practical Tacoma, 4Runner, FJ Cruiser, and Tundra-style accessories, including interior organizers, exterior add-ons, and driver lifestyle merch.',
                'canonical'   => home_url('/'),
                'image'       => $hero_image,
                'schema_type' => 'WebPage',
            ],
        ],
        'about-us' => [
            'slug'  => 'about',
            'title' => 'About Us',
            'css'   => 'tw/tw-about.css',
            'seo'   => [
                'title'       => 'About ToyocarTV',
                'description' => 'Learn about ToyocarTV, an independent auto accessories store for practical truck and SUV interior, exterior, and driver lifestyle products.',
                'image'       => $hero_image,
                'schema_type' => 'AboutPage',
            ],
        ],
        'faq' => [
            'slug'  => 'faq',
            'title' => 'FAQ',
            'css'   => 'tw/tw-faq.css',
            'seo'   => [
                'title'       => 'ToyocarTV FAQ',
                'description' => 'Find answers about ToyocarTV orders, U.S. shipping, tracking, returns, refunds, product compatibility, secure checkout, and support.',
                'image'       => $accessory_image,
                'schema_type' => 'FAQPage',
                'faqs'        => dawp_virtual_page_faq_schema_items(),
            ],
        ],
        'contact-us' => [
            'slug'  => 'contact',
            'title' => 'Contact Us',
            'css'   => 'tw/tw-contact.css',
            'seo'   => [
                'title'       => 'Contact ToyocarTV Support',
                'description' => 'Contact ToyocarTV for order help, product questions, compatibility concerns, tracking support, returns, and customer service.',
                'image'       => $accessory_image,
                'schema_type' => 'ContactPage',
            ],
        ],
        'shipping-policy' => [
            'slug'  => 'shipping-policy',
            'title' => 'Shipping Policy',
            'css'   => 'tw/tw-ship.css',
            'seo'   => [
                'title'       => 'Shipping Policy',
                'description' => 'Review ToyocarTV U.S. shipping locations, free standard shipping, processing times, carrier details, tracking, delivery issues, and support.',
                'image'       => $accessory_image,
                'schema_type' => 'WebPage',
            ],
        ],
        'refund-return-policy' => [
            'slug'  => 'refund-return-policy',
            'title' => 'Refund & Return Policy',
            'css'   => 'tw/tw-ship.css',
            'seo'   => [
                'title'       => 'Refund & Return Policy',
                'description' => 'Review ToyocarTV return eligibility, 30-day return window, refund timing, return shipping fees, exchanges, and non-returnable items.',
                'image'       => $accessory_image,
                'schema_type' => 'WebPage',
            ],
        ],
        'terms-conditions' => [
            'slug'  => 'terms-conditions',
            'title' => 'Terms & Conditions',
            'css'   => 'tw/tw-terms.css',
            'seo'   => [
                'title'       => 'Terms & Conditions',
                'description' => 'Read the ToyocarTV terms covering website use, purchases, product information, compatibility, shipping, returns, privacy, and customer responsibilities.',
                'image'       => $accessory_image,
                'schema_type' => 'WebPage',
            ],
        ],
        'privacy-policy' => [
            'slug'  => 'privacy',
            'title' => 'Privacy Policy',
            'css'   => 'tw/tw-privacy.css',
            'seo'   => [
                'title'       => 'Privacy Policy',
                'description' => 'Learn how ToyocarTV collects, uses, protects, and shares personal information for orders, accounts, payments, shipping, support, cookies, and analytics.',
                'image'       => $accessory_image,
                'schema_type' => 'WebPage',
            ],
        ],
        'track-order' => [
            'slug'  => 'track-order',
            'title' => 'Track Order',
            'css'   => 'track-order.css',
            'seo'   => [
                'title'       => 'Track Your ToyocarTV Order',
                'description' => 'Track your ToyocarTV order using your order number and checkout email, and get support if shipment tracking is delayed.',
                'image'       => $accessory_image,
                'schema_type' => 'WebPage',
            ],
        ],
    ];
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $page = dawp_current_seo_page();
    if ($page) {
        $parts['title'] = $page['seo']['title'] ?? $page['title'];
    }
    return $parts;
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_current_virtual_page_path();
    $pages = dawp_virtual_page_map();

    // Không phải virtual page hoặc page không cấu hình css
    if (!isset($pages[$request_uri]) || empty($pages[$request_uri]['css'])) {
        return;
    }

    $css_file_name = ltrim($pages[$request_uri]['css'], '/');
    $css_file_path = get_template_directory() . '/assets/css/' . $css_file_name;
    $css_file_url  = get_template_directory_uri() . '/assets/css/' . $css_file_name;

    wp_enqueue_style(
        'dawp-virtual-page-' . sanitize_title($pages[$request_uri]['slug']),
        $css_file_url,
        [],
        file_exists($css_file_path) ? filemtime($css_file_path) : '1.0.0'
    );
}

function dawp_current_virtual_page_path() {
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && $path === $home_path) {
        return '';
    }

    if ($home_path !== '' && strpos($path, $home_path . '/') === 0) {
        $path = trim(substr($path, strlen($home_path)), '/');
    }

    return $path;
}

function dawp_current_seo_page() {
    $pages = dawp_virtual_page_map();

    if ((is_front_page() || dawp_current_virtual_page_path() === '') && isset($pages['home'])) {
        return dawp_prepare_virtual_page_seo('home', $pages['home']);
    }

    $path = dawp_current_virtual_page_path();

    if (!isset($pages[$path])) {
        return null;
    }

    return dawp_prepare_virtual_page_seo($path, $pages[$path]);
}

function dawp_prepare_virtual_page_seo($path, $page) {
    $page['seo'] = $page['seo'] ?? [];

    if (empty($page['seo']['canonical'])) {
        $page['seo']['canonical'] = home_url('/' . trim($path, '/') . '/');
    }

    if (empty($page['seo']['title'])) {
        $page['seo']['title'] = $page['title'] ?? get_bloginfo('name');
    }

    return $page;
}

function dawp_format_virtual_page_seo_title($page) {
    $title = $page['seo']['title'] ?? $page['title'] ?? '';
    $site_name = get_bloginfo('name') ?: 'ToyocarTV';

    if ($title === '' || stripos($title, $site_name) !== false) {
        return $title;
    }

    return $title . ' | ' . $site_name;
}

function dawp_is_rank_math_active() {
    return defined('RANK_MATH_VERSION') || defined('RANK_MATH_FILE') || class_exists('\RankMath\Helper');
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title', 20);
function dawp_rank_math_virtual_page_title($title) {
    $page = dawp_current_seo_page();
    return $page ? dawp_format_virtual_page_seo_title($page) : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description', 20);
function dawp_rank_math_virtual_page_description($description) {
    $page = dawp_current_seo_page();
    return $page && !empty($page['seo']['description']) ? $page['seo']['description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical', 20);
function dawp_rank_math_virtual_page_canonical($canonical) {
    $page = dawp_current_seo_page();
    return $page && !empty($page['seo']['canonical']) ? $page['seo']['canonical'] : $canonical;
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_virtual_page_robots', 20);
function dawp_rank_math_virtual_page_robots($robots) {
    if (!dawp_current_seo_page()) {
        return $robots;
    }

    $robots['index'] = 'index';
    $robots['follow'] = 'follow';

    return $robots;
}

add_filter('rank_math/opengraph/facebook/title', 'dawp_rank_math_virtual_page_og_title', 20);
add_filter('rank_math/opengraph/twitter/title', 'dawp_rank_math_virtual_page_og_title', 20);
function dawp_rank_math_virtual_page_og_title($title) {
    $page = dawp_current_seo_page();
    return $page ? dawp_format_virtual_page_seo_title($page) : $title;
}

add_filter('rank_math/opengraph/facebook/description', 'dawp_rank_math_virtual_page_og_description', 20);
add_filter('rank_math/opengraph/twitter/description', 'dawp_rank_math_virtual_page_og_description', 20);
function dawp_rank_math_virtual_page_og_description($description) {
    $page = dawp_current_seo_page();
    return $page && !empty($page['seo']['description']) ? $page['seo']['description'] : $description;
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_virtual_page_og_image', 20);
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_virtual_page_og_image', 20);
function dawp_rank_math_virtual_page_og_image($image) {
    $page = dawp_current_seo_page();
    return $page && !empty($page['seo']['image']) ? $page['seo']['image'] : $image;
}

add_filter('rank_math/opengraph/type', 'dawp_rank_math_virtual_page_og_type', 20);
function dawp_rank_math_virtual_page_og_type($type) {
    return dawp_current_seo_page() ? 'website' : $type;
}

add_filter('rank_math/opengraph/twitter/card', 'dawp_rank_math_virtual_page_twitter_card', 20);
function dawp_rank_math_virtual_page_twitter_card($card) {
    return dawp_current_seo_page() ? 'summary_large_image' : $card;
}

add_filter('rank_math/json_ld', 'dawp_rank_math_virtual_page_schema', 20, 2);
function dawp_rank_math_virtual_page_schema($data, $jsonld) {
    $page = dawp_current_seo_page();

    if (!$page) {
        return $data;
    }

    $canonical = $page['seo']['canonical'];
    $description = $page['seo']['description'] ?? '';
    $schema_type = $page['seo']['schema_type'] ?? 'WebPage';
    $language = get_bloginfo('language') ?: 'en-US';

    $webpage = [
        '@type'       => $schema_type,
        '@id'         => trailingslashit($canonical) . '#webpage',
        'url'         => $canonical,
        'name'        => dawp_format_virtual_page_seo_title($page),
        'description' => $description,
        'isPartOf'    => ['@id' => home_url('/#website')],
        'inLanguage'  => $language,
        'dateModified'=> '2026-06-03',
    ];

    if (!empty($page['seo']['image'])) {
        $webpage['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url'   => $page['seo']['image'],
        ];
    }

    if ($schema_type === 'FAQPage' && !empty($page['seo']['faqs'])) {
        $webpage['mainEntity'] = $page['seo']['faqs'];
    }

    $data['dawp_virtual_page'] = $webpage;

    return $data;
}

add_filter('rank_math/sitemap/page_content', 'dawp_rank_math_virtual_page_sitemap', 20);
function dawp_rank_math_virtual_page_sitemap($content) {
    $pages = dawp_virtual_page_map();
    $lastmod = gmdate('c', strtotime('2026-06-03 00:00:00 UTC'));

    foreach ($pages as $path => $page) {
        if ($path === 'home') {
            continue;
        }

        $page = dawp_prepare_virtual_page_seo($path, $page);
        $canonical = $page['seo']['canonical'] ?? '';

        if ($canonical === '') {
            continue;
        }

        $content .= "\n<url>\n";
        $content .= "\t<loc>" . esc_url($canonical) . "</loc>\n";
        $content .= "\t<lastmod>" . esc_html($lastmod) . "</lastmod>\n";
        $content .= "</url>\n";
    }

    return $content;
}

add_action('wp_head', 'dawp_virtual_page_fallback_meta', 1);
function dawp_virtual_page_fallback_meta() {
    if (dawp_is_rank_math_active()) {
        return;
    }

    $page = dawp_current_seo_page();

    if (!$page) {
        return;
    }

    $title = dawp_format_virtual_page_seo_title($page);
    $description = $page['seo']['description'] ?? '';
    $canonical = $page['seo']['canonical'] ?? '';
    $image = $page['seo']['image'] ?? '';
    ?>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <?php if ($image) : ?>
    <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
    <?php else : ?>
    <meta name="twitter:card" content="summary">
    <?php endif; ?>
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <?php
}

function dawp_virtual_page_faq_schema_items() {
    $items = [
        [
            'question' => 'Where does ToyocarTV ship?',
            'answer'   => 'ToyocarTV currently ships within the United States. Product, destination, or carrier restrictions are shown at checkout when applicable.',
        ],
        [
            'question' => 'How much does shipping cost?',
            'answer'   => 'Standard U.S. shipping is free for all orders nationwide. Optional upgraded shipping costs are shown at checkout when available.',
        ],
        [
            'question' => 'How long does delivery take?',
            'answer'   => 'Orders are usually processed in 1-3 business days, with standard transit time of 5-7 business days.',
        ],
        [
            'question' => 'What is your return window?',
            'answer'   => 'Eligible unused and uninstalled automotive accessories and driver lifestyle items may be returned within 30 days of delivery.',
        ],
        [
            'question' => 'Is ToyocarTV affiliated with Toyota?',
            'answer'   => 'No. ToyocarTV is an independent auto accessories store and is not affiliated with, endorsed by, or sponsored by Toyota Motor Corporation or any vehicle manufacturer.',
        ],
    ];

    return array_map(
        function ($item) {
            return [
                '@type'          => 'Question',
                'name'           => $item['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => $item['answer'],
                ],
            ];
        },
        $items
    );
}
