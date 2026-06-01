<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $virtual_pages = dawp_virtual_page_map();

    if ($request_uri === 'shipping-returns') {
        wp_safe_redirect(home_url('/shipping-policy/'), 301);
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
    return [
        'home'                 => ['slug' => 'home',                 'title' => 'Home',                   'css' => 'tw/tw-home.css'],
        'about-us'             => ['slug' => 'about',                'title' => 'About Us',               'css' => 'tw/tw-about.css'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'FAQ',                    'css' => 'tw/tw-faq.css'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Us',             'css' => 'tw/tw-contact.css'],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy',        'css' => 'tw/tw-ship.css'],
        'refund-return-policy' => ['slug' => 'refund-return-policy', 'title' => 'Refund & Return Policy', 'css' => 'tw/tw-ship.css'],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions',     'css' => 'tw/tw-terms.css'],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy',         'css' => 'tw/tw-privacy.css'],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Order',            'css' => 'track-order.css'],
    ];
}

function dawp_virtual_page_seo_map() {
    return [
        'home' => [
            'title'       => 'Modern Formal Shoes for Men | Broge Shoes',
            'description' => 'Shop Broge Shoes for modern men\'s formal shoes, leather dress shoes, and brogue shoes with polished style, clear product details, and practical customer care.',
            'keywords'    => 'formal shoes, men\'s formal shoes, leather dress shoes, brogue shoes, Broge Shoes',
            'canonical'   => home_url('/'),
            'image'       => dawp_theme_image_url('broge-hero-formal-shoes.png'),
            'schema_type' => 'WebPage',
        ],
        'about-us' => [
            'title'       => 'About Broge Shoes | Men\'s Formal Footwear Store',
            'description' => 'Learn about Broge Shoes, a men\'s formal footwear store focused on polished dress shoes, leather dress shoes, brogue shoes, clear product details, and reliable support.',
            'keywords'    => 'about Broge Shoes, men\'s formal footwear, dress shoe store, brogue shoes',
            'canonical'   => home_url('/about-us/'),
            'image'       => dawp_theme_image_url('broge-work-events.png'),
            'schema_type' => 'AboutPage',
        ],
        'faq' => [
            'title'       => 'FAQ | Orders, Shipping, Returns & Refunds | Broge Shoes',
            'description' => 'Find answers about Broge Shoes orders, U.S. shipping timelines, tracking, returns, refunds, exchanges, and footwear condition requirements.',
            'keywords'    => 'Broge Shoes FAQ, shipping questions, return policy, refund questions, order tracking',
            'canonical'   => home_url('/faq/'),
            'image'       => dawp_theme_image_url('broge-customer-care.png'),
            'schema_type' => 'FAQPage',
        ],
        'contact-us' => [
            'title'       => 'Contact Broge Shoes | Customer Support',
            'description' => 'Contact Broge Shoes customer support for help with orders, sizing, shipping, tracking, returns, refunds, privacy requests, and product questions.',
            'keywords'    => 'contact Broge Shoes, customer support, shoe order help, shipping support, return support',
            'canonical'   => home_url('/contact-us/'),
            'image'       => dawp_theme_image_url('broge-customer-care.png'),
            'schema_type' => 'ContactPage',
        ],
        'shipping-policy' => [
            'title'       => 'Shipping Policy | U.S. Delivery & Tracking | Broge Shoes',
            'description' => 'Read the Broge Shoes shipping policy for U.S. delivery locations, free standard shipping, order handling times, transit estimates, carriers, and tracking support.',
            'keywords'    => 'Broge Shoes shipping policy, U.S. shipping, delivery time, order tracking, free standard shipping',
            'canonical'   => home_url('/shipping-policy/'),
            'image'       => dawp_theme_image_url('broge-customer-care.png'),
            'schema_type' => 'WebPage',
        ],
        'refund-return-policy' => [
            'title'       => 'Refund & Return Policy | Broge Shoes',
            'description' => 'Review the Broge Shoes refund and return policy, including 30-day return eligibility, footwear condition rules, return shipping fees, exchanges, and refund timing.',
            'keywords'    => 'Broge Shoes return policy, refund policy, 30 day returns, return shipping, exchanges',
            'canonical'   => home_url('/refund-return-policy/'),
            'image'       => dawp_theme_image_url('broge-customer-care.png'),
            'schema_type' => 'WebPage',
        ],
        'terms-conditions' => [
            'title'       => 'Terms & Conditions | Broge Shoes',
            'description' => 'Read the Broge Shoes terms and conditions for using brogeshoes.com, placing orders, payments, product information, shipping, returns, and website rules.',
            'keywords'    => 'Broge Shoes terms, terms and conditions, store terms, website rules',
            'canonical'   => home_url('/terms-conditions/'),
            'image'       => dawp_theme_image_url('Logo.png'),
            'schema_type' => 'WebPage',
        ],
        'privacy-policy' => [
            'title'       => 'Privacy Policy | Broge Shoes',
            'description' => 'Learn how Broge Shoes collects, uses, shares, protects, and retains customer information for orders, accounts, support, site security, and privacy requests.',
            'keywords'    => 'Broge Shoes privacy policy, customer information, privacy request, data protection',
            'canonical'   => home_url('/privacy-policy/'),
            'image'       => dawp_theme_image_url('Logo.png'),
            'schema_type' => 'WebPage',
        ],
        'track-order' => [
            'title'       => 'Track Your Order | Broge Shoes',
            'description' => 'Track your Broge Shoes order and find help for shipping confirmations, carrier updates, delivery delays, missing packages, and order support.',
            'keywords'    => 'track Broge Shoes order, order tracking, shipping confirmation, delivery support',
            'canonical'   => home_url('/track-order/'),
            'image'       => dawp_theme_image_url('broge-customer-care.png'),
            'schema_type' => 'WebPage',
        ],
    ];
}

function dawp_current_virtual_page_key() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $pages       = dawp_virtual_page_map();

    if ($request_uri === '' && is_front_page()) {
        return 'home';
    }

    return isset($pages[$request_uri]) ? $request_uri : '';
}

function dawp_current_virtual_page_seo() {
    $key = dawp_current_virtual_page_key();
    if ($key === '') {
        return [];
    }

    $seo = dawp_virtual_page_seo_map();
    return $seo[$key] ?? [];
}

function dawp_is_rank_math_active() {
    return defined('RANK_MATH_VERSION') || class_exists('RankMath');
}

add_filter('pre_get_document_title', 'dawp_virtual_page_document_title');
function dawp_virtual_page_document_title($title) {
    if (dawp_is_rank_math_active()) {
        return $title;
    }

    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['title']) ? $seo['title'] : $title;
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $seo = dawp_current_virtual_page_seo();
    if (!empty($seo['title'])) {
        $parts['title'] = $seo['title'];
    }
    return $parts;
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title');
function dawp_rank_math_virtual_page_title($title) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['title']) ? $seo['title'] : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description');
function dawp_rank_math_virtual_page_description($description) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['description']) ? $seo['description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical');
function dawp_rank_math_virtual_page_canonical($canonical) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['canonical']) ? $seo['canonical'] : $canonical;
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_virtual_page_robots');
function dawp_rank_math_virtual_page_robots($robots) {
    if (empty(dawp_current_virtual_page_seo())) {
        return $robots;
    }

    $robots['index']  = 'index';
    $robots['follow'] = 'follow';

    return $robots;
}

add_filter('wp_robots', 'dawp_virtual_page_wp_robots');
function dawp_virtual_page_wp_robots($robots) {
    if (dawp_is_rank_math_active() || empty(dawp_current_virtual_page_seo())) {
        return $robots;
    }

    $robots['index']  = true;
    $robots['follow'] = true;

    return $robots;
}

add_filter('rank_math/frontend/show_keywords', 'dawp_rank_math_virtual_page_show_keywords');
function dawp_rank_math_virtual_page_show_keywords($show) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['keywords']) ? true : $show;
}

add_filter('rank_math/frontend/keywords', 'dawp_rank_math_virtual_page_keywords');
function dawp_rank_math_virtual_page_keywords($keywords) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['keywords']) ? $seo['keywords'] : $keywords;
}

add_filter('rank_math/opengraph/type', 'dawp_rank_math_virtual_page_og_type');
function dawp_rank_math_virtual_page_og_type($type) {
    return empty(dawp_current_virtual_page_seo()) ? $type : 'website';
}

add_filter('rank_math/opengraph/url', 'dawp_rank_math_virtual_page_og_url');
function dawp_rank_math_virtual_page_og_url($url) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['canonical']) ? $seo['canonical'] : $url;
}

foreach (['facebook', 'twitter'] as $network) {
    add_filter("rank_math/opengraph/{$network}/title", 'dawp_rank_math_virtual_page_social_title');
    add_filter("rank_math/opengraph/{$network}/description", 'dawp_rank_math_virtual_page_social_description');
    add_filter("rank_math/opengraph/{$network}/image", 'dawp_rank_math_virtual_page_social_image');
}

function dawp_rank_math_virtual_page_social_title($title) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['title']) ? $seo['title'] : $title;
}

function dawp_rank_math_virtual_page_social_description($description) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['description']) ? $seo['description'] : $description;
}

function dawp_rank_math_virtual_page_social_image($image) {
    $seo = dawp_current_virtual_page_seo();
    return !empty($seo['image']) ? $seo['image'] : $image;
}

add_filter('rank_math/opengraph/twitter/card_type', 'dawp_rank_math_virtual_page_twitter_card_type');
function dawp_rank_math_virtual_page_twitter_card_type($type) {
    return empty(dawp_current_virtual_page_seo()) ? $type : 'summary_large_image';
}

add_filter('rank_math/json_ld', 'dawp_rank_math_virtual_page_schema', 99, 2);
function dawp_rank_math_virtual_page_schema($data, $jsonld) {
    $seo = dawp_current_virtual_page_seo();
    if (empty($seo)) {
        return $data;
    }

    $page_id = trailingslashit($seo['canonical']) . '#webpage';
    $data['dawp_virtual_page'] = [
        '@type'       => $seo['schema_type'] ?? 'WebPage',
        '@id'         => $page_id,
        'url'         => $seo['canonical'],
        'name'        => $seo['title'],
        'description' => $seo['description'],
        'isPartOf'    => ['@id' => home_url('/#website')],
        'publisher'   => ['@id' => home_url('/#organization')],
        'inLanguage'  => get_bloginfo('language'),
    ];

    if (!empty($seo['image'])) {
        $data['dawp_virtual_page']['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url'   => $seo['image'],
        ];
    }

    if (($seo['schema_type'] ?? '') === 'FAQPage') {
        $data['dawp_virtual_page']['mainEntity'] = dawp_virtual_page_faq_schema_items();
    }

    return $data;
}

function dawp_virtual_page_faq_schema_items() {
    $items = [
        [
            'name' => 'What happens after I place an order?',
            'text' => 'After checkout, Broge Shoes reviews and processes your order before fulfillment. Standard handling takes 1-3 business days, Monday to Friday, excluding standard U.S. public holidays.',
        ],
        [
            'name' => 'How long does delivery take?',
            'text' => 'Order handling takes 1-3 business days and transit usually takes 5-7 business days after handling is complete. The total estimated delivery time is 6-10 business days from purchase.',
        ],
        [
            'name' => 'What is your return window?',
            'text' => 'Broge Shoes accepts eligible returns initiated within 30 days of delivery. Items must be unworn, unused, undamaged, in original condition, and returned with original packaging and accessories.',
        ],
        [
            'name' => 'How do I start a return?',
            'text' => 'Email support@brogeshoes.com or use the Contact Us page within 30 days of delivery. Include your order number, checkout email, item details, return reason, and photos or videos if damaged.',
        ],
        [
            'name' => 'When will I receive my refund?',
            'text' => 'After your return is received, inspected within 1-2 business days, and approved, your refund is processed back to the original payment method within 7 business days.',
        ],
    ];

    return array_map(
        static function ($item) {
            return [
                '@type'          => 'Question',
                'name'           => $item['name'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => $item['text'],
                ],
            ];
        },
        $items
    );
}

add_action('wp_head', 'dawp_virtual_page_fallback_seo_tags', 2);
function dawp_virtual_page_fallback_seo_tags() {
    if (dawp_is_rank_math_active()) {
        return;
    }

    $seo = dawp_current_virtual_page_seo();
    if (empty($seo)) {
        return;
    }

    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => $seo['schema_type'] ?? 'WebPage',
        '@id'         => trailingslashit($seo['canonical']) . '#webpage',
        'url'         => $seo['canonical'],
        'name'        => $seo['title'],
        'description' => $seo['description'],
        'isPartOf'    => ['@id' => home_url('/#website')],
        'publisher'   => ['@id' => home_url('/#organization')],
        'inLanguage'  => get_bloginfo('language'),
    ];

    if (!empty($seo['image'])) {
        $schema['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url'   => $seo['image'],
        ];
    }

    if (($seo['schema_type'] ?? '') === 'FAQPage') {
        $schema['mainEntity'] = dawp_virtual_page_faq_schema_items();
    }
    ?>
    <meta name="description" content="<?php echo esc_attr($seo['description']); ?>">
    <?php if (!empty($seo['keywords'])) : ?>
    <meta name="keywords" content="<?php echo esc_attr($seo['keywords']); ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo esc_url($seo['canonical']); ?>">
    <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr($seo['title']); ?>">
    <meta property="og:description" content="<?php echo esc_attr($seo['description']); ?>">
    <meta property="og:url" content="<?php echo esc_url($seo['canonical']); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php if (!empty($seo['image'])) : ?>
    <meta property="og:image" content="<?php echo esc_url($seo['image']); ?>">
    <?php endif; ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($seo['title']); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($seo['description']); ?>">
    <?php if (!empty($seo['image'])) : ?>
    <meta name="twitter:image" content="<?php echo esc_url($seo['image']); ?>">
    <?php endif; ?>
    <script type="application/ld+json"><?php echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
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
