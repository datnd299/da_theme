<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_virtual_page_request_path();
    $virtual_pages = dawp_virtual_page_map();

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
        'home' => [
            'slug' => 'home',
            'title' => 'Home',
            'seo_title' => 'Shop Avec Moi | Romantic Lingerie, Sleepwear & Robes',
            'description' => 'Shop romantic lingerie, sleepwear, robes, loungewear, bras, and intimate essentials from Shop Avec Moi with order tracking and eligible 30-day returns.',
            'css' => 'tw-home.css',
            'schema' => 'CollectionPage',
        ],
        'about-us' => [
            'slug' => 'about',
            'title' => 'About Us',
            'seo_title' => 'About Shop Avec Moi | Romantic Intimates Boutique',
            'description' => 'Learn about Shop Avec Moi, a boutique for romantic intimates, sleepwear, robes, loungewear, bras, and thoughtfully selected essentials.',
            'css' => 'tw-about.css',
            'schema' => 'AboutPage',
        ],
        'faq' => [
            'slug' => 'faq',
            'title' => 'FAQ',
            'seo_title' => 'FAQ | Shipping, Returns & Product Help | Shop Avec Moi',
            'description' => 'Find answers about Shop Avec Moi orders, shipping, returns, refunds, product care, sizing, payment, and customer support.',
            'css' => 'tw-faq.css',
            'schema' => 'FAQPage',
        ],
        'contact-us' => [
            'slug' => 'contact',
            'title' => 'Contact Us',
            'seo_title' => 'Contact Shop Avec Moi | Order, Shipping & Return Support',
            'description' => 'Contact Shop Avec Moi for help with orders, shipping, tracking, returns, refunds, sizing, product details, and customer support.',
            'css' => 'tw-contact.css',
            'schema' => 'ContactPage',
        ],
        'shipping-policy' => [
            'slug' => 'shipping-policy',
            'title' => 'Shipping Policy',
            'seo_title' => 'Shipping Policy | Delivery & Order Tracking | Shop Avec Moi',
            'description' => 'Review Shop Avec Moi shipping policy, including processing times, delivery estimates, order tracking, address accuracy, and shipping support.',
            'css' => 'tw-shipping-policy.css',
            'schema' => 'WebPage',
        ],
        'return-refund-policy' => [
            'slug' => 'return-refund-policy',
            'title' => 'Return & Refund Policy',
            'seo_title' => 'Return & Refund Policy | 30-Day Eligible Returns | Shop Avec Moi',
            'description' => 'Review Shop Avec Moi return and refund policy, including 30-day eligible returns, hygiene requirements, return shipping, inspections, and refund timing.',
            'css' => 'tw-return-refund-policy.css',
            'schema' => 'WebPage',
        ],
        'terms-conditions' => [
            'slug' => 'terms-conditions',
            'title' => 'Terms & Conditions',
            'seo_title' => 'Terms & Conditions | Shop Avec Moi',
            'description' => 'Read the Shop Avec Moi terms and conditions for website use, purchases, payment, shipping, returns, warranties, liability, and customer support.',
            'css' => 'tw-terms.css',
            'schema' => 'WebPage',
        ],
        'privacy-policy' => [
            'slug' => 'privacy',
            'title' => 'Privacy Policy',
            'seo_title' => 'Privacy Policy | Shop Avec Moi',
            'description' => 'Learn how Shop Avec Moi collects, uses, protects, and shares personal information for orders, payments, shipping, support, analytics, and marketing.',
            'css' => 'tw-privacy.css',
            'schema' => 'PrivacyPolicy',
        ],
        'track-order' => [
            'slug' => 'track-order',
            'title' => 'Track Order',
            'seo_title' => 'Track Your Order | Shop Avec Moi',
            'description' => 'Track your Shop Avec Moi order and check shipping progress using your order details or tracking information.',
            'css' => 'track-order.css',
            'schema' => 'WebPage',
        ],
        'product-category/lingerie-sets' => [
            'slug' => 'category-lingerie',
            'title' => 'Lingerie Sets',
            'seo_title' => 'Lingerie Sets | Romantic Intimates | Shop Avec Moi',
            'description' => 'Shop romantic lingerie sets from Shop Avec Moi, including coordinated intimates selected for feminine style, comfort, and everyday confidence.',
            'css' => 'tw-main.css',
            'schema' => 'CollectionPage',
        ],
        'product-category/sleepwear' => [
            'slug' => 'category-sleepwear',
            'title' => 'Sleepwear',
            'seo_title' => 'Sleepwear | Romantic Pajamas & Nightwear | Shop Avec Moi',
            'description' => 'Shop romantic sleepwear, pajamas, and nightwear from Shop Avec Moi for soft comfort, feminine styling, and relaxed evenings.',
            'css' => 'tw-main.css',
            'schema' => 'CollectionPage',
        ],
        'product-category/robes-loungewear' => [
            'slug' => 'category-robes',
            'title' => 'Robes & Loungewear',
            'seo_title' => 'Robes & Loungewear | Shop Avec Moi',
            'description' => 'Shop robes and loungewear from Shop Avec Moi, including soft layers and relaxed intimate styles for quiet mornings and evenings.',
            'css' => 'tw-main.css',
            'schema' => 'CollectionPage',
        ],
        'product-category/bras-bralettes' => [
            'slug' => 'category-bras',
            'title' => 'Bras & Bralettes',
            'seo_title' => 'Bras & Bralettes | Shop Avec Moi',
            'description' => 'Shop bras and bralettes from Shop Avec Moi, including romantic, comfortable intimate essentials for everyday wear and special moments.',
            'css' => 'tw-main.css',
            'schema' => 'CollectionPage',
        ],
        'product-category/intimate-essentials' => [
            'slug' => 'category-essentials',
            'title' => 'Intimate Essentials',
            'seo_title' => 'Intimate Essentials | Shop Avec Moi',
            'description' => 'Shop intimate essentials from Shop Avec Moi, including carefully selected pieces for comfort, confidence, and everyday romantic style.',
            'css' => 'tw-main.css',
            'schema' => 'CollectionPage',
        ],
    ];
}

function dawp_virtual_page_request_path() {
    $request_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && ($request_path === $home_path || strpos($request_path, $home_path . '/') === 0)) {
        $request_path = trim(substr($request_path, strlen($home_path)), '/');
    }

    return $request_path;
}

function dawp_get_current_virtual_page() {
    $request_uri = dawp_virtual_page_request_path();
    $map = dawp_virtual_page_map();
    $canonical_path = $request_uri;

    if ($request_uri === '' && is_front_page() && isset($map['home'])) {
        $request_uri = 'home';
        $canonical_path = '';
    }

    if (!isset($map[$request_uri])) {
        return null;
    }

    $page = $map[$request_uri];
    $page['path'] = $canonical_path;
    $page['canonical'] = $canonical_path === '' ? home_url('/') : home_url('/' . trim($canonical_path, '/') . '/');

    return $page;
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $page = dawp_get_current_virtual_page();

    if ($page) {
        $parts['title'] = $page['seo_title'] ?? $page['title'];
    }

    return $parts;
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title');
function dawp_rank_math_virtual_page_title($title) {
    $page = dawp_get_current_virtual_page();

    return $page ? ($page['seo_title'] ?? $page['title']) : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description');
function dawp_rank_math_virtual_page_description($description) {
    $page = dawp_get_current_virtual_page();

    return $page ? $page['description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical');
function dawp_rank_math_virtual_page_canonical($canonical) {
    $page = dawp_get_current_virtual_page();

    return $page ? $page['canonical'] : $canonical;
}

add_filter('rank_math/opengraph/facebook/title', 'dawp_rank_math_virtual_page_title');
add_filter('rank_math/opengraph/twitter/title', 'dawp_rank_math_virtual_page_title');
add_filter('rank_math/opengraph/facebook/description', 'dawp_rank_math_virtual_page_description');
add_filter('rank_math/opengraph/twitter/description', 'dawp_rank_math_virtual_page_description');

add_filter('rank_math/opengraph/url', 'dawp_rank_math_virtual_page_og_url');
function dawp_rank_math_virtual_page_og_url($url) {
    $page = dawp_get_current_virtual_page();

    return $page ? $page['canonical'] : $url;
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_virtual_page_image');
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_virtual_page_image');
function dawp_rank_math_virtual_page_image($image) {
    $page = dawp_get_current_virtual_page();

    if (!$page) {
        return $image;
    }

    return get_template_directory_uri() . '/assets/img/gallery/shopavecmoi_logo.png';
}

add_filter('rank_math/json_ld', 'dawp_rank_math_virtual_page_schema', 20);
function dawp_rank_math_virtual_page_schema($data) {
    $page = dawp_get_current_virtual_page();

    if (!$page) {
        return $data;
    }

    $schema_type = $page['schema'] ?? 'WebPage';
    $data['dawp_virtual_page'] = [
        '@type' => $schema_type,
        '@id' => $page['canonical'] . '#webpage',
        'url' => $page['canonical'],
        'name' => $page['seo_title'] ?? $page['title'],
        'description' => $page['description'],
        'isPartOf' => [
            '@id' => home_url('/#website'),
        ],
    ];

    return $data;
}

add_action('wp_head', 'dawp_virtual_page_fallback_meta', 1);
function dawp_virtual_page_fallback_meta() {
    if (defined('RANK_MATH_VERSION') || class_exists('RankMath')) {
        return;
    }

    $page = dawp_get_current_virtual_page();

    if (!$page) {
        return;
    }

    $title = $page['seo_title'] ?? $page['title'];
    $description = $page['description'];
    $canonical = $page['canonical'];
    $image = get_template_directory_uri() . '/assets/img/gallery/shopavecmoi_logo.png';
    ?>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
    <?php
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_virtual_page_request_path();
    $pages = dawp_virtual_page_map();

    // Không phải virtual page hoặc page không cấu hình css
    if (!isset($pages[$request_uri]) || empty($pages[$request_uri]['css'])) {
        return;
    }

    $css_file_name = ltrim($pages[$request_uri]['css'], '/');

    // Đường dẫn vật lý
    if (str_contains($css_file_name, 'tw-')) {
        $css_file_path = get_template_directory() . '/assets/css/tw/' . $css_file_name;
        $css_file_url = get_template_directory_uri() . '/assets/css/tw/' . $css_file_name;
    } else {
        $css_file_path = get_template_directory() . '/assets/css/' . $css_file_name;
        $css_file_url = get_template_directory_uri() . '/assets/css/' . $css_file_name;
    }

    wp_enqueue_style(
        'dawp-virtual-page-' . sanitize_title($pages[$request_uri]['slug']),
        $css_file_url,
        [],
        file_exists($css_file_path) ? filemtime($css_file_path) : '1.0.0'
    );
}

