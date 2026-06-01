<?php
add_action('after_setup_theme', 'dawp_setup');
add_filter('woocommerce_order_number', 'custom_woocommerce_order_prefix', 10, 2);

function custom_woocommerce_order_prefix($order_id, $order) {
    return 'SK-' . $order_id;
}

add_action('after_setup_theme', 'dawp_use_logo_favicon');
function dawp_use_logo_favicon() {
    remove_action('wp_head', 'wp_site_icon', 99);
}

add_action('wp_head', 'dawp_logo_favicon', 1);
function dawp_logo_favicon() {
    $favicon_url = get_template_directory_uri() . '/assets/img/Logo.png';
    ?>
    <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/png">
    <link rel="shortcut icon" href="<?php echo esc_url($favicon_url); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo esc_url($favicon_url); ?>">
    <?php
}

function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

function dawp_i0_image_url($url, $args = []) {
    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    $cdn_url = strtolower($parts['host']) === 'i0.wp.com'
        ? 'https://i0.wp.com' . $parts['path']
        : 'https://i0.wp.com/' . $parts['host'] . $parts['path'];
    $query = [];

    if (!empty($args['resize']) && is_array($args['resize'])) {
        $query['resize'] = absint($args['resize'][0]) . ',' . absint($args['resize'][1]);
    } elseif (!empty($args['fit']) && is_array($args['fit'])) {
        $query['fit'] = absint($args['fit'][0]) . ',' . absint($args['fit'][1]);
    } elseif (!empty($args['w'])) {
        $query['w'] = absint($args['w']);
    }

    $query['ssl'] = 1;

    return add_query_arg($query, $cdn_url);
}

function dawp_theme_image_meta($filename) {
    $images = [
        'Logo.png' => [2048, 1190],
        'broge-category-brogue-shoes.png' => [1254, 1254],
        'broge-category-formal-shoes.png' => [1254, 1254],
        'broge-category-leather-dress-shoes.png' => [1254, 1254],
        'broge-customer-care.png' => [1536, 1024],
        'broge-hero-formal-shoes.png' => [1774, 887],
        'broge-work-events.png' => [1536, 1024],
    ];

    return $images[$filename] ?? [0, 0];
}

function dawp_theme_image_url($filename) {
    return get_template_directory_uri() . '/assets/img/' . ltrim($filename, '/');
}

function dawp_get_woocommerce_store_address() {
    $address_1 = trim((string) get_option('woocommerce_store_address', ''));
    $address_2 = trim((string) get_option('woocommerce_store_address_2', ''));
    $city      = trim((string) get_option('woocommerce_store_city', ''));
    $postcode  = trim((string) get_option('woocommerce_store_postcode', ''));
    $location  = (string) get_option('woocommerce_default_country', '');

    $state = '';

    if ($location !== '') {
        [, $state] = array_pad(explode(':', $location, 2), 2, '');
    }

    $city_line = trim(implode(', ', array_filter([$city, $state])));
    if ($postcode !== '') {
        $city_line = trim($city_line . ' ' . $postcode);
    }

    return implode(', ', array_filter([$address_1, $address_2, $city_line]));
}

function dawp_responsive_theme_image($filename, $alt = '', $args = []) {
    [$natural_width, $natural_height] = dawp_theme_image_meta($filename);
    $display_width = !empty($args['width']) ? absint($args['width']) : $natural_width;
    $display_height = !empty($args['height']) ? absint($args['height']) : $natural_height;
    $base_url = dawp_theme_image_url($filename);
    $widths = !empty($args['widths']) && is_array($args['widths']) ? array_map('absint', $args['widths']) : [$display_width];
    $widths = array_values(array_unique(array_filter($widths)));
    sort($widths);

    $src_width = !empty($args['src_width']) ? absint($args['src_width']) : $display_width;
    $src_height = !empty($args['src_height'])
        ? absint($args['src_height'])
        : ($natural_width > 0 && $natural_height > 0 ? (int) round($src_width * $natural_height / $natural_width) : $display_height);

    $srcset = [];
    foreach ($widths as $width) {
        $height = $natural_width > 0 && $natural_height > 0 ? (int) round($width * $natural_height / $natural_width) : $display_height;
        $srcset[] = dawp_i0_image_url($base_url, ['resize' => [$width, $height]]) . ' ' . $width . 'w';
    }

    $attrs = [
        'src' => dawp_i0_image_url($base_url, ['fit' => [$src_width, $src_height]]),
        'alt' => $alt,
        'width' => $display_width,
        'height' => $display_height,
        'loading' => $args['loading'] ?? 'lazy',
        'decoding' => $args['decoding'] ?? 'async',
        'srcset' => implode(', ', $srcset),
        'sizes' => $args['sizes'] ?? '(max-width: ' . $display_width . 'px) 100vw, ' . $display_width . 'px',
    ];

    if (!empty($args['class'])) {
        $attrs['class'] = $args['class'];
    }

    if (!empty($args['fetchpriority'])) {
        $attrs['fetchpriority'] = $args['fetchpriority'];
    }

    $html = '<img';
    foreach ($attrs as $name => $value) {
        if ($value === '' || $value === null) {
            continue;
        }
        $escaped_value = in_array($name, ['src'], true) ? esc_url($value) : esc_attr($value);
        $html .= ' ' . esc_attr($name) . '="' . $escaped_value . '"';
    }
    $html .= '>';

    return $html;
}

add_filter('wp_get_attachment_image_attributes', 'dawp_i0_attachment_image_attributes', 20, 3);
function dawp_i0_attachment_image_attributes($attr, $attachment, $size) {
    if (empty($attr['src']) || empty($attachment->ID)) {
        return $attr;
    }

    $full_url = wp_get_attachment_url($attachment->ID);
    if (!$full_url) {
        return $attr;
    }

    $width = !empty($attr['width']) ? absint($attr['width']) : 0;
    $height = !empty($attr['height']) ? absint($attr['height']) : 0;

    if ($width > 0 && $height > 0) {
        $attr['src'] = dawp_i0_image_url($full_url, ['fit' => [$width, $height]]);
    } else {
        $attr['src'] = dawp_i0_image_url($full_url);
    }

    if (empty($attr['srcset'])) {
        return $attr;
    }

    $srcset_widths = [];
    foreach (explode(',', $attr['srcset']) as $candidate) {
        if (preg_match('/\s+(\d+)w\s*$/', trim($candidate), $matches)) {
            $srcset_widths[] = absint($matches[1]);
        }
    }

    if ($width > 0) {
        $srcset_widths[] = $width;
    }

    $srcset_widths = array_values(array_unique(array_filter($srcset_widths)));
    sort($srcset_widths);

    if (empty($srcset_widths)) {
        return $attr;
    }

    $aspect_ratio = ($width > 0 && $height > 0) ? $height / $width : 1;
    $srcset = [];

    foreach ($srcset_widths as $srcset_width) {
        $srcset_height = max(1, (int) round($srcset_width * $aspect_ratio));
        $srcset[] = dawp_i0_image_url($full_url, ['resize' => [$srcset_width, $srcset_height]]) . ' ' . $srcset_width . 'w';
    }

    $attr['srcset'] = implode(', ', $srcset);

    return $attr;
}
add_action('template_redirect', 'redirect_search_to_product');
function redirect_search_to_product() {
    // Chỉ xử lý khi là trang search và chưa có post_type
    if (is_search() && !isset($_GET['post_type'])) {
        wp_safe_redirect(
            add_query_arg('post_type', 'product', $_SERVER['REQUEST_URI'])
        );
        exit;
    }
}
add_filter('template_include', 'theme_search_template');
function theme_search_template($template) {
    if (is_search() && get_query_var('post_type') === 'product') {
        $new_template = locate_template(array('woocommerce/archive-product.php'));
        if ($new_template) {
            return $new_template;
        }
    }
    return $template;
}

add_action('wp_enqueue_scripts', 'dawp_scripts');
function dawp_scripts() {
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.7');

    wp_enqueue_style('dawp-tw-main', get_template_directory_uri() . '/assets/css/tw/tw-main.css', [], '1.0.2');

    if ( is_front_page() ) {
        wp_enqueue_style('dawp-home', get_template_directory_uri() . '/assets/css/tw/tw-home.css', [], '1.0.2');
        wp_enqueue_style('dawp-broge-home', get_template_directory_uri() . '/assets/css/broge-home.css', ['dawp-home'], '1.0.0');
        dawp_remove_styles();
    }
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_product() ) {
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], '1.0.7');
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], '1.0.7');
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            wp_enqueue_style('dawp-checkout', get_template_directory_uri() . '/assets/css/checkout.css', [], '1.0.7');
        } elseif ( function_exists('is_account_page') && is_account_page() ) {
            wp_enqueue_style('dawp-account', get_template_directory_uri() . '/assets/css/account.css', ['dawp-main'], '1.0.1');
            dawp_remove_styles();
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], '1.0.7');
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.3', true);
    wp_localize_script('dawp-main', 'dawpAjax', [
        'url'          => admin_url('admin-ajax.php'),
        'nonce'        => wp_create_nonce('dawp_newsletter_nonce'),
        'contactNonce' => wp_create_nonce('dawp_contact_nonce'),
    ]);

    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
}

function dawp_remove_styles() {
    wp_dequeue_style( 'wc-blocks-style' );
    // wp_dequeue_style( 'photoswipe-default-skin' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-vendors-style' );
    wp_dequeue_style( 'wc-block-style' );
    wp_dequeue_style( 'wc-blocks-packages-style' );

    wp_deregister_style( 'wc-blocks-style' );
    wp_deregister_style( 'wc-blocks-vendors-style' );
    wp_deregister_style( 'wc-block-style' );
    wp_deregister_style( 'wc-blocks-packages-style' );

    wp_dequeue_style( 'wc-blocks-cart-block-style' );
    wp_deregister_style( 'wc-blocks-cart-block-style' );
    
    // Một số version dùng handle khác:
    wp_dequeue_style( 'wc-blocks-style-cart' );
    wp_deregister_style( 'wc-blocks-style-cart' );
    global $wp_styles;
    
    if ( ! is_object( $wp_styles ) ) return;
    $blocked_files = array(
        '/blocks/cart.css',
        '/blocks/checkout.css',
        '/blocks/all-products.css',
        '/blocks/mini-cart.css',
        '/blocks/active-filters.css',
        '/blocks/price-filter.css',
        '/blocks/attribute-filter.css',
        '/blocks/stock-filter.css',
        '/blocks/rating-filter.css',
        '/blocks/featured-product.css',
        '/blocks/featured-category.css',
        '/blocks/product-categories.css',
        '/blocks/reviews.css',
    );
    
    foreach ( $wp_styles->registered as $handle => $style ) {
        foreach ( $blocked_files as $file ) {
            if ( strpos( $style->src, $file ) !== false ) {
                wp_dequeue_style( $handle );
                wp_deregister_style( $handle );
            }
        }
    }
}
