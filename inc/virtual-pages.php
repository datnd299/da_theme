<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = dawp_current_virtual_page_key(false);
    $virtual_pages = dawp_virtual_page_map();

    if ($request_uri === 'shipping-returns') {
        wp_safe_redirect(home_url('/shipping-policy/'), 301);
        exit;
    }

    if ($request_uri === 'return-refund-policy') {
        wp_safe_redirect(home_url('/refund-return-policy/'), 301);
        exit;
    }

    if (in_array($request_uri, ['shop-by-theme', 'shop-by-categories', 'brands'], true)) {
        wp_safe_redirect(home_url('/shop-by-brand/'), 301);
        exit;
    }

    if (in_array($request_uri, ['tire-size', 'size-guide'], true)) {
        wp_safe_redirect(home_url('/tire-size-guide/'), 301);
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
    echo '<main id="primary" class="virtual-page virtual-page--' . esc_attr($page['slug']) . '">';
    get_template_part('template-parts/page', $page['slug']);
    echo '</main>';
    get_footer();
    exit;
}

function dawp_virtual_page_map() {
    return [
        'home' => [
            'slug'        => 'home',
            'title'       => 'Tires for Cars, SUVs & Trucks',
            'css'         => 'tw/tw-home.css',
            'seo_title'   => 'MozTire | Shop Tires by Size, Brand & Vehicle Type',
            'description' => 'Find the right tires fast at MozTire. Search by tire size, brand, season or vehicle type and get free ground shipping to the contiguous U.S.',
            'image'       => 'assets/img/hero/home-hero.jpg',
            'canonical'   => home_url('/'),
            'schema_type' => 'CollectionPage',
        ],
        'shop-by-brand' => [
            'slug'        => 'shop-by-brand',
            'title'       => 'Shop Tires by Brand',
            'css'         => 'tw/tw-brands.css',
            'seo_title'   => 'Shop Tires by Brand | MozTire',
            'description' => 'Browse every tire brand MozTire carries. Compare passenger, SUV and light-truck tire lines, then narrow down by size, season and speed rating.',
            'image'       => 'assets/img/hero/shop-hero.jpg',
            'schema_type' => 'CollectionPage',
        ],
        'tire-size-guide' => [
            'slug'        => 'tire-size-guide',
            'title'       => 'Tire Size Guide',
            'css'         => 'tw/tw-guide.css',
            'seo_title'   => 'How to Read a Tire Size | MozTire Tire Size Guide',
            'description' => 'Learn what 225/65R17 102H means: width, aspect ratio, rim diameter, load index, speed rating, load range and season ratings, explained simply.',
            'image'       => 'assets/img/hero/support-hero.jpg',
            'schema_type' => 'WebPage',
        ],
        'about-us' => [
            'slug'        => 'about',
            'title'       => 'About Us',
            'css'         => 'tw/tw-about.css',
            'seo_title'   => 'About MozTire | Online Tire Store for U.S. Drivers',
            'description' => 'MozTire is an online tire store for U.S. drivers, built around clear tire specs, honest pricing and free ground shipping to the contiguous U.S.',
            'image'       => 'assets/img/hero/about-hero.jpg',
            'schema_type' => 'AboutPage',
        ],
        'faq' => [
            'slug'        => 'faq',
            'title'       => 'FAQ',
            'css'         => 'tw/tw-faq.css',
            'seo_title'   => 'Tire Shopping FAQ | Fitment, Shipping & Returns | MozTire',
            'description' => 'Answers about tire sizes and fitment, shipping times, installation, tread warranties, returns, refunds and secure checkout at MozTire.',
            'image'       => 'assets/img/hero/support-hero.jpg',
            'schema_type' => 'FAQPage',
        ],
        'contact-us' => [
            'slug'        => 'contact',
            'title'       => 'Contact Us',
            'css'         => 'tw/tw-contact.css',
            'seo_title'   => 'Contact MozTire | Tire Fitment & Order Support',
            'description' => 'Contact MozTire for help choosing a tire size, order updates, shipping questions, returns and refunds. We reply within 1 business day.',
            'image'       => 'assets/img/hero/support-hero.jpg',
            'schema_type' => 'ContactPage',
        ],
        'shipping-policy' => [
            'slug'        => 'shipping-policy',
            'title'       => 'Shipping Policy',
            'css'         => 'tw/tw-ship.css',
            'seo_title'   => 'Shipping Policy | MozTire',
            'description' => 'MozTire ships free by ground to the contiguous U.S.: orders process in 1-2 business days and arrive in 3-7 business days with tracking.',
            'image'       => 'assets/img/hero/tracking-hero.jpg',
            'schema_type' => 'WebPage',
        ],
        'refund-return-policy' => [
            'slug'        => 'refund-return-policy',
            'title'       => 'Refund & Return Policy',
            'css'         => 'tw/tw-ship.css',
            'seo_title'   => 'Refund & Return Policy | MozTire',
            'description' => 'Return new, unmounted and unused tires within 30 days of delivery. See eligibility, return shipping, inspection and refund timing at MozTire.',
            'image'       => 'assets/img/hero/tracking-hero.jpg',
            'schema_type' => 'WebPage',
        ],
        'payment-policy' => [
            'slug'        => 'payment-policy',
            'title'       => 'Payment Policy',
            'css'         => 'tw/tw-terms.css',
            'seo_title'   => 'Payment Policy | Secure PayPal Checkout | MozTire',
            'description' => 'Pay for your tires securely with PayPal at MozTire: accepted methods, when you are charged, refunds to PayPal and how payment disputes are handled.',
            'image'       => 'assets/img/hero/support-hero.jpg',
            'schema_type' => 'WebPage',
        ],
        'terms-conditions' => [
            'slug'        => 'terms-conditions',
            'title'       => 'Terms & Conditions',
            'css'         => 'tw/tw-terms.css',
            'seo_title'   => 'Terms & Conditions | MozTire',
            'description' => 'Terms for using moztire.com and buying tires online: orders, pricing, fitment responsibility, installation, warranties and store policies.',
            'image'       => 'assets/img/hero/support-hero.jpg',
            'schema_type' => 'WebPage',
        ],
        'privacy-policy' => [
            'slug'        => 'privacy',
            'title'       => 'Privacy Policy',
            'css'         => 'tw/tw-privacy.css',
            'seo_title'   => 'Privacy Policy | MozTire',
            'description' => 'How MozTire collects, uses, protects and shares personal information for orders, payments, shipping, analytics and customer support.',
            'image'       => 'assets/img/hero/support-hero.jpg',
            'schema_type' => 'PrivacyPolicy',
        ],
        'track-order' => [
            'slug'        => 'track-order',
            'title'       => 'Track Order',
            'css'         => 'track-order.css',
            'seo_title'   => 'Track Your Tire Order | MozTire',
            'description' => 'Track your MozTire order with your order number and billing email, or contact support for shipment and delivery help.',
            'image'       => 'assets/img/hero/tracking-hero.jpg',
            'schema_type' => 'WebPage',
        ],
    ];
}

function dawp_current_virtual_page_key($include_front_page = true) {
    $request_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path    = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && ($request_path === $home_path || strpos($request_path, $home_path . '/') === 0)) {
        $request_path = trim(substr($request_path, strlen($home_path)), '/');
    }

    if ($include_front_page && ($request_path === '' || (function_exists('is_front_page') && is_front_page()))) {
        return 'home';
    }

    return $request_path;
}

function dawp_get_current_virtual_page($include_front_page = true) {
    $key = dawp_current_virtual_page_key($include_front_page);
    $map = dawp_virtual_page_map();

    return isset($map[$key]) ? array_merge(['path' => $key], $map[$key]) : null;
}

function dawp_virtual_page_canonical($page) {
    if (!empty($page['canonical'])) {
        return $page['canonical'];
    }

    return home_url('/' . trim($page['path'], '/') . '/');
}

function dawp_virtual_page_image_url($page) {
    if (empty($page['image'])) {
        return '';
    }

    return get_template_directory_uri() . '/' . ltrim($page['image'], '/');
}

function dawp_virtual_page_image_path($page) {
    if (empty($page['image'])) {
        return '';
    }

    return get_template_directory() . '/' . ltrim($page['image'], '/');
}

function dawp_virtual_page_modified_time($page, $format = 'c') {
    $timestamps = [];

    if (!empty($page['slug'])) {
        $template_path = get_template_directory() . '/template-parts/page-' . $page['slug'] . '.php';

        if (file_exists($template_path)) {
            $timestamps[] = filemtime($template_path);
        }
    }

    $image_path = dawp_virtual_page_image_path($page);

    if ($image_path && file_exists($image_path)) {
        $timestamps[] = filemtime($image_path);
    }

    $timestamp = $timestamps ? max($timestamps) : filemtime(__FILE__);

    return gmdate($format, $timestamp);
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $page = dawp_get_current_virtual_page(true);

    if ($page) {
        $parts['title'] = $page['title'];
    }

    return $parts;
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_current_virtual_page_key(false);
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
