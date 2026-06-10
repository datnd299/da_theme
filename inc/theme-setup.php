<?php
add_action('after_setup_theme', 'dawp_setup');
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
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
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.4');

    wp_enqueue_style('dawp-tw-main', get_template_directory_uri() . '/assets/css/tw/tw-main.css', [], '1.0.2');

    if ( is_front_page() ) {
        wp_enqueue_style('dawp-home', get_template_directory_uri() . '/assets/css/tw/tw-home.css', [], '1.0.2');
        dawp_remove_styles();
    }
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_product() ) {
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], '1.0.3');
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], '1.0.5');
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            wp_enqueue_style('dawp-checkout', get_template_directory_uri() . '/assets/css/checkout.css', [], '1.0.15');
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], '1.0.5');
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.2', true);

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

function dawp_i0_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
    if (!$url) {
        return '';
    }

    $parts = wp_parse_url($url);
    if (empty($parts['host'])) {
        $url = home_url($url);
        $parts = wp_parse_url($url);
    }

    if (empty($parts['host'])) {
        return $url;
    }

    $host = strtolower($parts['host']);
    $local_hosts = ['localhost', '127.0.0.1', '::1'];
    if (in_array($host, $local_hosts, true)) {
        return $url;
    }

    if ($host === 'i0.wp.com') {
        $path = $parts['path'] ?? '';
    } else {
        $path = '/' . $parts['host'] . ($parts['path'] ?? '');
    }

    $cdn_url = 'https://i0.wp.com' . $path;
    $query = ['ssl' => '1'];

    if ($width > 0 && $height > 0) {
        $query[$mode === 'fit' ? 'fit' : 'resize'] = absint($width) . ',' . absint($height);
    } elseif ($width > 0) {
        $query['w'] = absint($width);
    }

    return add_query_arg($query, $cdn_url);
}

function dawp_responsive_image($url, $args = []) {
    if (!$url) {
        return '';
    }

    $defaults = [
        'alt'           => '',
        'class'         => '',
        'width'         => 0,
        'height'        => 0,
        'widths'        => [400, 768, 1300],
        'sizes'         => '(max-width: 1300px) 100vw, 1300px',
        'loading'       => 'lazy',
        'decoding'      => 'async',
        'fetchpriority' => '',
        'mode'          => 'fit',
    ];
    $args = wp_parse_args($args, $defaults);

    $width = absint($args['width']);
    $height = absint($args['height']);
    $src_width = $width > 0 ? $width : max(array_map('absint', (array) $args['widths']));
    $src_height = $height > 0 ? $height : 0;

    $attrs = [
        'src'      => dawp_i0_image_url($url, $src_width, $src_height, $args['mode']),
        'alt'      => $args['alt'],
        'class'    => $args['class'],
        'sizes'    => $args['sizes'],
        'loading'  => $args['loading'],
        'decoding' => $args['decoding'],
    ];

    if ($width > 0) {
        $attrs['width'] = $width;
    }

    if ($height > 0) {
        $attrs['height'] = $height;
    }

    if (!empty($args['fetchpriority'])) {
        $attrs['fetchpriority'] = $args['fetchpriority'];
    }

    $srcset = [];
    foreach ((array) $args['widths'] as $candidate_width) {
        $candidate_width = absint($candidate_width);
        if ($candidate_width <= 0) {
            continue;
        }

        $candidate_height = 0;
        if ($width > 0 && $height > 0) {
            $candidate_height = max(1, (int) round($candidate_width * $height / $width));
        }

        $srcset[] = dawp_i0_image_url($url, $candidate_width, $candidate_height, 'resize') . ' ' . $candidate_width . 'w';
    }

    if ($srcset) {
        $attrs['srcset'] = implode(', ', array_unique($srcset));
    }

    $html = '<img';
    foreach ($attrs as $name => $value) {
        if ($value === '' || $value === null) {
            continue;
        }
        $html .= ' ' . esc_attr($name) . '="' . esc_attr($value) . '"';
    }
    $html .= '>';

    return $html;
}
