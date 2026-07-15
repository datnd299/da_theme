<?php
/**
 * Responsive image helpers backed by the WordPress.com image CDN.
 */

defined('ABSPATH') || exit;

function dawp_cdn_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    $host = strtolower($parts['host']);
    if ($host === 'localhost' || $host === '127.0.0.1' || $host === '::1' || str_ends_with($host, '.local')) {
        return $url;
    }

    if ($host === 'i0.wp.com') {
        $cdn_url = 'https://' . $parts['host'] . $parts['path'];
    } else {
        $path = '/' . implode('/', array_map('rawurlencode', explode('/', ltrim($parts['path'], '/'))));
        $cdn_url = 'https://i0.wp.com/' . $parts['host'] . $path;
    }

    $args = array('ssl' => '1');
    $width = absint($width);
    $height = absint($height);

    if ($width && $height) {
        $args[$mode === 'fit' ? 'fit' : 'resize'] = $width . ',' . $height;
    } elseif ($width) {
        $args['w'] = $width;
    }

    return add_query_arg($args, $cdn_url);
}

function dawp_theme_cdn_image_url($relative_path, $width = 0, $height = 0, $mode = 'resize') {
    $url = get_template_directory_uri() . '/' . ltrim($relative_path, '/');

    return dawp_cdn_image_url($url, $width, $height, $mode);
}

function dawp_responsive_image($url, $alt, $width, $height, $variants, $sizes, $attrs = array()) {
    $width = absint($width);
    $height = absint($height);

    $variants = array_values(array_filter(array_map(static function ($variant) {
        $variant_width = isset($variant[0]) ? absint($variant[0]) : 0;
        $variant_height = isset($variant[1]) ? absint($variant[1]) : 0;

        return $variant_width ? array($variant_width, $variant_height) : null;
    }, $variants)));

    $src_variant = array($width, $height);
    foreach ($variants as $variant) {
        if ((int) $variant[0] === $width) {
            $src_variant = $variant;
            break;
        }
    }
    $src = dawp_cdn_image_url($url, $src_variant[0], $src_variant[1] ?? 0);

    $srcset = array();
    foreach ($variants as $variant) {
        $srcset[] = dawp_cdn_image_url($url, $variant[0], $variant[1]) . ' ' . $variant[0] . 'w';
    }

    $default_attrs = array(
        'loading'  => 'lazy',
        'decoding' => 'async',
        'width'    => $width,
        'height'   => $height,
        'src'      => $src,
        'alt'      => $alt,
    );

    if (!empty($srcset)) {
        $default_attrs['srcset'] = implode(', ', $srcset);
        $default_attrs['sizes'] = $sizes;
    }

    $attrs = array_merge($default_attrs, $attrs);

    $html_attrs = array();
    foreach ($attrs as $name => $value) {
        if ($value === false || $value === null || $value === '') {
            continue;
        }

        $html_attrs[] = sprintf('%s="%s"', esc_attr($name), esc_attr($value));
    }

    return '<img ' . implode(' ', $html_attrs) . '>';
}

function dawp_theme_image($relative_path, $alt, $width, $height, $variants, $sizes, $attrs = array()) {
    $url = get_template_directory_uri() . '/' . ltrim($relative_path, '/');

    return dawp_responsive_image($url, $alt, $width, $height, $variants, $sizes, $attrs);
}

function dawp_product_responsive_image($product, $class = '', $sizes = '') {
    if (!class_exists('WC_Product') || !$product instanceof WC_Product) {
        return '';
    }

    $attachment_id = $product->get_image_id();
    $url = '';

    if ($attachment_id) {
        $image = wp_get_attachment_image_src($attachment_id, 'full');
        if ($image) {
            $url = $image[0];
        }
    }

    if (!$url) {
        $url = wc_placeholder_img_src('woocommerce_single');
    }

    return dawp_responsive_image(
        $url,
        $product->get_name(),
        300,
        300,
        array(
            array(240, 240),
            array(300, 300),
            array(400, 400),
            array(600, 600),
        ),
        $sizes ?: '(max-width: 767px) calc((100vw - 48px) / 2), (max-width: 1199px) calc((100vw - 360px) / 3), 300px',
        array('class' => $class)
    );
}
