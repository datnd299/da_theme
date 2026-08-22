<?php
add_action('template_redirect', 'dawp_handle_virtual_pages');
function dawp_handle_virtual_pages() {
    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
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
<<<<<<< HEAD
    $pages = [
        'about-us'             => ['slug' => 'about',                'title' => 'About Chronel Shop', 'desc' => 'Learn about Chronel Shop, a modern luxury watch boutique for mechanical timepieces, refined accessories and confident ownership support.', 'keywords' => 'Chronel Shop, about Chronel Shop, luxury watch boutique, mechanical watches, fine timepieces', 'css' => 'tw-about.css', 'canonical_path' => 'about-us', 'schema_type' => 'AboutPage', 'image' => 'https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=86'],
        'journal'              => ['slug' => 'journal',              'title' => 'Chronel Shop Journal', 'desc' => 'Read Chronel Shop stories about luxury watch design, finishing, mechanical movements and collection guidance.', 'keywords' => 'Chronel Shop journal, watch design, mechanical watch guide, watchmaking craft, luxury watches', 'css' => 'tw-journal.css', 'canonical_path' => 'journal', 'schema_type' => 'CollectionPage', 'image' => get_template_directory_uri() . '/assets/img/home/4f4052da-979c-4247-8cf0-dd25f7fb048e.jpg'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'Chronel Shop FAQs', 'desc' => 'Find answers about Chronel Shop orders, U.S. shipping, 30-day returns, refunds, luxury watches, payments, privacy and support.', 'keywords' => 'Chronel Shop FAQ, shipping questions, return questions, refund help, order support, luxury watch store', 'css' => 'tw-faq.css', 'canonical_path' => 'faq', 'schema_type' => 'FAQPage'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact Chronel Shop', 'desc' => 'Contact Chronel Shop support for order help, tracking, returns, refunds, product questions, luxury watch guidance or privacy requests.', 'keywords' => 'contact Chronel Shop, Chronel Shop support, order help, return support, luxury watch support', 'css' => 'tw-contact.css', 'canonical_path' => 'contact-us', 'schema_type' => 'ContactPage', 'image' => get_template_directory_uri() . '/assets/img/gallery/Customer_support_scene_in_office_202607161445.jpeg'],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Chronel Shop U.S. shipping, free standard delivery, handling times, transit windows, carrier details and tracking support.', 'keywords' => 'Chronel Shop shipping policy, free U.S. shipping, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review Chronel Shop U.S. shipping, free standard delivery, handling times, transit windows, carrier details and tracking support.', 'keywords' => 'Chronel Shop shipping policy, free U.S. shipping, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read the Chronel Shop return and refund policy, including 30-day eligibility, free return shipping, refund timing and damaged orders.', 'keywords' => 'Chronel Shop return policy, refund policy, free returns, 30-day returns, refund timing', 'css' => 'tw-ship.css', 'canonical_path' => 'return-refund-policy', 'schema_type' => 'WebPage'],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read Chronel Shop terms and conditions for website use, luxury watch orders, payments, shipping, returns, privacy and support.', 'keywords' => 'Chronel Shop terms, terms and conditions, store policies, website terms, luxury watch orders', 'css' => 'tw-terms.css', 'canonical_path' => 'terms-conditions', 'schema_type' => 'WebPage'],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how Chronel Shop collects, uses, protects and manages customer information, cookies, payment security and privacy requests.', 'keywords' => 'Chronel Shop privacy policy, customer data, cookies, payment security, privacy requests', 'css' => 'tw-privacy.css', 'canonical_path' => 'privacy-policy', 'schema_type' => 'PrivacyPolicy'],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Your Chronel Shop Order', 'desc' => 'Track your Chronel Shop order online using your order ID and billing email, or contact support for shipment status help.', 'keywords' => 'track Chronel Shop order, order tracking, shipment status, order status, tracking help', 'css' => 'track-order.css', 'canonical_path' => 'track-order', 'schema_type' => 'WebPage'],
=======
    return [
        'about-us'             => ['slug' => 'about',                'title' => 'About luxurytheme', 'desc' => 'Learn more about luxurytheme, a modern online store for practical home, technology and everyday lifestyle products.', 'keywords' => 'luxurytheme, about luxurytheme, home essentials store, online lifestyle store', 'css' => 'tw-about.css', 'canonical_path' => 'about-us', 'schema_type' => 'AboutPage', 'image' => 'https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=86'],
        'faq'                  => ['slug' => 'faq',                  'title' => 'luxurytheme FAQs', 'desc' => 'Find answers to frequently asked questions about shipping, returns, products, payments and support at luxurytheme.', 'keywords' => 'luxurytheme FAQ, shipping questions, return questions, order support', 'css' => 'tw-faq.css', 'canonical_path' => 'faq', 'schema_type' => 'FAQPage'],
        'contact-us'           => ['slug' => 'contact',              'title' => 'Contact luxurytheme', 'desc' => 'Contact luxurytheme support for help with orders, tracking, returns, refunds, product questions or privacy requests.', 'keywords' => 'contact luxurytheme, luxurytheme support, order help, return support', 'css' => 'tw-contact.css', 'canonical_path' => 'contact-us', 'schema_type' => 'ContactPage', 'image' => get_template_directory_uri() . '/assets/img/gallery/Customer_support_scene_in_office_202607161445.jpeg'],
        'shipping-returns'     => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review luxurytheme shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'luxurytheme shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'shipping-policy'      => ['slug' => 'shipping-policy',      'title' => 'Shipping Policy', 'desc' => 'Review luxurytheme shipping options, delivery times, order handling, carrier details and U.S. delivery support.', 'keywords' => 'luxurytheme shipping policy, delivery times, shipping support, order handling', 'css' => 'tw-ship.css', 'canonical_path' => 'shipping-policy', 'schema_type' => 'WebPage'],
        'return-refund-policy' => ['slug' => 'return-refund-policy', 'title' => 'Return & Refund Policy', 'desc' => 'Read the luxurytheme return and refund policy, including return eligibility, return shipping, exchanges and refund timing.', 'keywords' => 'luxurytheme return policy, refund policy, returns, refund timing', 'css' => 'tw-ship.css', 'canonical_path' => 'return-refund-policy', 'schema_type' => 'WebPage'],
        'terms-conditions'     => ['slug' => 'terms-conditions',     'title' => 'Terms & Conditions', 'desc' => 'Read the luxurytheme terms and conditions for browsing the website, placing orders, payments, policies and customer support.', 'keywords' => 'luxurytheme terms, terms and conditions, store policies, website terms', 'css' => 'tw-terms.css', 'canonical_path' => 'terms-conditions', 'schema_type' => 'WebPage'],
        'privacy-policy'       => ['slug' => 'privacy',              'title' => 'Privacy Policy', 'desc' => 'Learn how luxurytheme collects, uses, protects and manages customer information, cookies, privacy requests and account data.', 'keywords' => 'luxurytheme privacy policy, customer data, cookies, privacy requests', 'css' => 'tw-privacy.css', 'canonical_path' => 'privacy-policy', 'schema_type' => 'PrivacyPolicy'],
        'track-order'          => ['slug' => 'track-order',          'title' => 'Track Your luxurytheme Order', 'desc' => 'Track your luxurytheme order online using your order ID and billing email, or contact support for shipment help.', 'keywords' => 'track luxurytheme order, order tracking, shipment status, order status', 'css' => 'track-order.css', 'canonical_path' => 'track-order', 'schema_type' => 'WebPage'],
>>>>>>> dcfaa17ffbda8ec1285a68abf9ec66d4f3f93fe1
    ];

    foreach (dawp_journal_posts() as $post) {
        $pages['journal/' . $post['slug']] = [
            'slug'           => 'journal-post',
            'title'          => $post['title'],
            'desc'           => $post['excerpt'],
            'keywords'       => implode(', ', [$post['category'], 'Chronel Shop journal', 'luxury watches']),
            'css'            => 'tw-journal.css',
            'canonical_path' => 'journal/' . $post['slug'],
            'schema_type'    => 'Article',
            'image'          => $post['image'],
            'image_alt'      => $post['alt'],
            'date_published' => $post['date_iso'],
            'date_modified'  => $post['date_modified'] ?? $post['date_iso'],
            'author'         => 'Chronel Shop Editorial',
            'category'       => $post['category'],
        ];
    }

    return $pages;
}

function dawp_journal_posts() {
    $image = static function ($url) {
        return $url . '?auto=format&fit=crop&w=1600&q=82';
    };

    return [
        [
            'slug'     => 'why-restraint-makes-a-watch-feel-expensive',
            'category' => __('Design', 'dawp'),
            'date'     => __('Aug 12, 2026', 'dawp'),
            'date_iso' => '2026-08-12',
            'title'    => __('Why restraint makes a watch feel expensive.', 'dawp'),
            'excerpt'  => __('The proportions, contrast and quiet decisions that separate timeless design from decoration.', 'dawp'),
            'image'    => get_template_directory_uri() . '/assets/img/home/4f4052da-979c-4247-8cf0-dd25f7fb048e.jpg',
            'alt'      => __('Minimal luxury interior with refined materials', 'dawp'),
            'body'     => [
                __('Luxury watch design is often strongest when it edits more than it adds. A balanced dial, controlled case thickness and clear hierarchy give the eye a place to rest.', 'dawp'),
                __('Restraint also makes materials matter. A polished bevel, a brushed bracelet link or a single applied marker can feel more deliberate when the surrounding surface stays quiet.', 'dawp'),
                __('That quiet confidence is especially visible on the wrist. A watch with fewer competing details tends to move between tailoring, casual layers and evening wear without feeling like it is asking for attention.', 'dawp'),
                __('Look closely at the negative space around the hands, the distance between hour markers and the way the bezel frames the dial. These choices can make a simple watch feel calm rather than plain.', 'dawp'),
                __('When choosing a watch, look for proportion first: lug length, dial opening, crown scale and bracelet taper. These small relationships decide whether the piece feels composed on the wrist.', 'dawp'),
                __('The best restrained designs still reward a second look. They may reveal a subtle sunray finish, a softened case flank or a carefully matched date wheel, details that feel personal because they are discovered slowly.', 'dawp'),
            ],
        ],
        [
            'slug'     => 'inside-the-finishing-process',
            'category' => __('Craft', 'dawp'),
            'date'     => __('Aug 8, 2026', 'dawp'),
            'date_iso' => '2026-08-08',
            'title'    => __('Inside the finishing process.', 'dawp'),
            'excerpt'  => __('A closer look at brushing, polishing and dial texture.', 'dawp'),
            'image'    => $image('https://images.unsplash.com/photo-1539874754764-5a96559165b0'),
            'alt'      => __('Watch components and tools on a workbench', 'dawp'),
            'body'     => [
                __('Finishing turns engineering into character. Brushed surfaces soften reflections, polished edges catch light, and textured dials add depth without sacrificing legibility.', 'dawp'),
                __('The best cases combine contrasts with discipline. Transitions should feel crisp, surfaces should align cleanly, and every highlight should support the shape of the watch.', 'dawp'),
                __('Brushing is not simply a matte treatment. The direction, grain and consistency of the lines change how a case wears in daylight, while polished chamfers define the architecture without adding extra ornament.', 'dawp'),
                __('Dial finishing follows the same principle. A lacquer surface can feel formal and glassy, a grained texture can feel more relaxed, and applied indexes create shadows that printed markers cannot always provide.', 'dawp'),
                __('Before buying, inspect the bracelet edges, clasp action, dial printing and case transitions. These details reveal how carefully the watch was made.', 'dawp'),
                __('If possible, view the watch under more than one light source. Strong boutique lighting can flatter almost anything, but natural light makes uneven polishing, cloudy crystals and rough transitions easier to notice.', 'dawp'),
            ],
        ],
        [
            'slug'     => 'choosing-your-first-mechanical-watch',
            'category' => __('Guide', 'dawp'),
            'date'     => __('Aug 2, 2026', 'dawp'),
            'date_iso' => '2026-08-02',
            'title'    => __('Choosing your first mechanical watch.', 'dawp'),
            'excerpt'  => __('A calm guide to size, movement and everyday wear.', 'dawp'),
            'image'    => $image('https://images.unsplash.com/photo-1524592094714-0f0654e20314'),
            'alt'      => __('Elegant wrist watch worn with a suit', 'dawp'),
            'body'     => [
                __('Start with daily comfort. Case diameter matters, but lug-to-lug length, thickness and bracelet flexibility often matter more once the watch is on your wrist.', 'dawp'),
                __('Automatic movements suit most first-time mechanical owners because they wind through normal wear. Hand-wound pieces feel more ritualistic, while date windows add everyday practicality.', 'dawp'),
                __('Think about where the watch will spend most of its time. If it needs to handle office days, travel and weekends, a balanced dial, reliable water resistance and a comfortable strap system will matter more than novelty.', 'dawp'),
                __('Try not to choose by diameter alone. Two watches with the same case size can wear completely differently depending on bezel width, case shape, crystal height and how sharply the lugs curve toward the wrist.', 'dawp'),
                __('Choose a watch that fits your real routine. A versatile first piece should handle work, travel and evenings without needing a full wardrobe built around it.', 'dawp'),
                __('For a first mechanical watch, confidence often comes from simplicity. Pick something you enjoy checking every day, understand the basic care rhythm, and leave room for your taste to evolve with experience.', 'dawp'),
            ],
        ],
    ];
}

function dawp_current_journal_post() {
    $path = dawp_current_request_path();
    if (!str_starts_with($path, 'journal/')) {
        return false;
    }

    $slug = trim(substr($path, strlen('journal/')), '/');
    foreach (dawp_journal_posts() as $post) {
        if ($slug === $post['slug']) {
            return $post;
        }
    }

    return false;
}

function dawp_home_page_seo_data() {
    return [
        'slug'           => 'home',
<<<<<<< HEAD
        'title'          => 'Chronel Shop - Luxury Watches & Fine Timepieces',
        'desc'           => 'Shop Chronel Shop for luxury watches, fine mechanical timepieces, refined accessories, editorial guidance and confident after-purchase support.',
        'keywords'       => 'Chronel Shop, luxury watches, fine timepieces, mechanical watches, watch boutique, premium accessories',
=======
        'title'          => 'luxurytheme - Home, Electronics & Everyday Essentials',
        'desc'           => 'Shop luxurytheme for practical home essentials, furniture, electronics, smart home products, kitchen favorites and outdoor living picks.',
        'keywords'       => 'luxurytheme, home essentials, furniture, electronics, kitchen products, outdoor living',
>>>>>>> dcfaa17ffbda8ec1285a68abf9ec66d4f3f93fe1
        'canonical_path' => '',
        'schema_type'    => 'WebSite',
        'image'          => get_template_directory_uri() . '/assets/img/home/4f4052da-979c-4247-8cf0-dd25f7fb048e.jpg',
    ];
}

function dawp_current_request_path() {
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');

    if (function_exists('wp_make_link_relative')) {
        $home_path = trim(parse_url(wp_make_link_relative(home_url('/')), PHP_URL_PATH) ?? '', '/');
        if ($home_path && str_starts_with($path, $home_path . '/')) {
            $path = trim(substr($path, strlen($home_path)), '/');
        }
    }

    return $path;
}

add_filter('document_title_parts', 'dawp_virtual_page_title');
function dawp_virtual_page_title($parts) {
    $request_uri = dawp_current_request_path();
    $map = dawp_virtual_page_map();
    if (isset($map[$request_uri])) {
        $parts['title'] = $map[$request_uri]['title'];
    }
    return $parts;
}


add_action('wp_enqueue_scripts', 'dawp_virtual_page_assets');

function dawp_virtual_page_assets() {
    $request_uri = dawp_current_request_path();
    $pages = dawp_virtual_page_map();

    // KhÃ´ng pháº£i virtual page hoáº·c page khÃ´ng cáº¥u hÃ¬nh css
    if (!isset($pages[$request_uri]) || empty($pages[$request_uri]['css'])) {
        return;
    }

    $css_file_name = ltrim($pages[$request_uri]['css'], '/');

    // ÄÆ°á»ng dáº«n váº­t lÃ½
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

// Integrate with Rank Math SEO for virtual pages
function dawp_virtual_page_is_active() {
    $request_uri = dawp_current_request_path();
    $map = dawp_virtual_page_map();
    if (isset($map[$request_uri])) {
        return $map[$request_uri];
    }
    return false;
}

function dawp_rank_math_page_seo_data() {
    $virtual_page = dawp_virtual_page_is_active();
    if ($virtual_page) {
        return $virtual_page;
    }

    if (is_front_page() || is_home()) {
        return dawp_home_page_seo_data();
    }

    return false;
}

function dawp_rank_math_page_title($page) {
    if (empty($page['title'])) {
        return get_bloginfo('name');
    }

    if ('home' === ($page['slug'] ?? '')) {
        return $page['title'];
    }

    $sep = apply_filters('document_title_separator', '-');
    return $page['title'] . ' ' . $sep . ' ' . get_bloginfo('name');
}

function dawp_rank_math_page_url($page) {
    $path = isset($page['canonical_path']) ? trim($page['canonical_path'], '/') : dawp_current_request_path();
    return home_url($path ? '/' . $path . '/' : '/');
}

function dawp_rank_math_page_image($page) {
    if (!empty($page['image'])) {
        return $page['image'];
    }

    return get_template_directory_uri() . '/assets/img/home/4f4052da-979c-4247-8cf0-dd25f7fb048e.jpg';
}

function dawp_rank_math_organization_schema() {
    return [
        '@type' => 'Organization',
        '@id'   => home_url('/#organization'),
        'name'  => get_bloginfo('name'),
        'url'   => home_url('/'),
<<<<<<< HEAD
        'email' => 'support@chronelshop.com',
        'logo'  => [
            '@type' => 'ImageObject',
            'url'   => get_template_directory_uri() . '/assets/img/logo/chronelshop-logo.svg',
=======
        'email' => 'support@luxurytheme.com',
        'logo'  => [
            '@type' => 'ImageObject',
            'url'   => get_template_directory_uri() . '/assets/img/home/luxurytheme-logo.png',
>>>>>>> dcfaa17ffbda8ec1285a68abf9ec66d4f3f93fe1
        ],
    ];
}

function dawp_rank_math_website_schema() {
    return [
        '@type'       => 'WebSite',
        '@id'         => home_url('/#website'),
        'url'         => home_url('/'),
        'name'        => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
        'publisher'   => ['@id' => home_url('/#organization')],
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => home_url('/?s={search_term_string}&post_type=product'),
            'query-input' => 'required name=search_term_string',
        ],
    ];
}

function dawp_rank_math_contact_points() {
    $phone = '757-804-6538';

    return [
        [
<<<<<<< HEAD
            '@type'       => 'ContactPoint',
            'telephone'   => '+1' . preg_replace('/[^0-9]/', '', $phone),
            'contactType' => 'customer support',
            'email'       => 'support@chronelshop.com',
            'areaServed'  => 'US',
            'availableLanguage' => ['en-US'],
=======
            'question' => 'Where does luxurytheme ship?',
            'answer'   => 'luxurytheme currently ships exclusively within the United States domestic market.',
        ],
        [
            'question' => 'How much does shipping cost?',
            'answer'   => 'Shipping cost is shown during checkout before payment is processed.',
        ],
        [
            'question' => 'What is the return window?',
            'answer'   => 'Eligible products can be returned within 30 days after delivery.',
        ],
        [
            'question' => 'How do I contact luxurytheme?',
            'answer'   => 'Customers can contact luxurytheme support by email at support@luxurytheme.com or through the Contact Us page.',
>>>>>>> dcfaa17ffbda8ec1285a68abf9ec66d4f3f93fe1
        ],
    ];
}

function dawp_rank_math_breadcrumb_schema($page) {
    $page_url = dawp_rank_math_page_url($page);

    return [
        '@type' => 'BreadcrumbList',
        '@id'   => $page_url . '#breadcrumb',
        'itemListElement' => [
            [
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Home',
                'item'     => home_url('/'),
            ],
            [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => $page['title'] ?? get_bloginfo('name'),
                'item'     => $page_url,
            ],
        ],
    ];
}

function dawp_rank_math_faq_schema_entities($slug) {
    $items = dawp_rank_math_faq_items($slug);
    if (!$items) {
        return [];
    }

    return array_map(static function($item) {
        return [
            '@type' => 'Question',
            'name'  => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $item['answer'],
            ],
        ];
    }, $items);
}

function dawp_rank_math_faq_items($slug) {
    $items = [
        'faq' => [
            ['question' => 'Where does Chronel Shop ship?', 'answer' => 'Chronel Shop currently ships exclusively within the United States domestic market.'],
            ['question' => 'How much does shipping cost?', 'answer' => 'Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement.'],
            ['question' => 'What is the return window?', 'answer' => 'Eligible products can be returned within 30 days after delivery.'],
            ['question' => 'How do I contact Chronel Shop?', 'answer' => 'Customers can contact Chronel Shop support by email at support@chronelshop.com, by phone at 757-804-6538, or through the Contact Us page.'],
            ['question' => 'What does Chronel Shop sell?', 'answer' => 'Chronel Shop focuses on luxury watches, fine timepieces, limited editions, mechanical references and premium accessories.'],
        ],
        'shipping-policy' => [
            ['question' => 'Where does chronelshop.com ship?', 'answer' => 'chronelshop.com currently ships exclusively within the United States domestic market.'],
            ['question' => 'How much does standard shipping cost?', 'answer' => 'Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement.'],
            ['question' => 'How long will my order take to arrive?', 'answer' => 'Order handling takes 1-2 business days and standard transit takes 3-5 business days, so estimated delivery is 4-7 business days total from the date of purchase.'],
            ['question' => 'Will I receive tracking information?', 'answer' => 'Yes. Once your order is dispatched, we send a shipping confirmation email with a direct tracking link and courier details.'],
        ],
        'return-refund-policy' => [
            ['question' => 'What is the return window?', 'answer' => 'You must initiate your return request within 30 days of delivery.'],
            ['question' => 'Who pays return shipping?', 'answer' => 'chronelshop.com covers return shipping for all eligible returns within 30 days of delivery.'],
            ['question' => 'Do you charge restocking fees?', 'answer' => 'No. chronelshop.com does not charge restocking fees for eligible returns.'],
            ['question' => 'When will I receive my refund?', 'answer' => 'Approved refunds are processed automatically to the original payment method within 7 business days after inspection.'],
        ],
        'terms-conditions' => [
            ['question' => 'What do these Terms cover?', 'answer' => 'These Terms govern access to chronelshop.com, browsing the catalog, creating an account, contacting support, and purchasing products.'],
            ['question' => 'When is an order accepted?', 'answer' => 'An order confirmation email means we received your purchase request. Orders may still be reviewed, declined, canceled, or limited when necessary.'],
            ['question' => 'Which policies are part of the customer agreement?', 'answer' => 'Shipping, returns, refunds, and privacy terms are integrated through the Shipping Policy, Return & Refund Policy, and Privacy Policy.'],
        ],
        'contact' => [
            ['question' => 'How can I contact Chronel Shop?', 'answer' => 'Email support@chronelshop.com, call 757-804-6538, or use the Contact Us page.'],
            ['question' => 'What should I include in a support request?', 'answer' => 'Include your order number, checkout email, product name if relevant, and a clear description of your question or issue.'],
            ['question' => 'Can support help with returns or tracking?', 'answer' => 'Yes. Chronel Shop support can help with order tracking, returns, refunds, product questions and privacy requests.'],
        ],
    ];

    return $items[$slug] ?? [];
}

