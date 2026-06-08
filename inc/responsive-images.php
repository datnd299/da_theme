<?php
/**
 * Responsive image helpers backed by the WordPress.com image CDN.
 *
 * @package dawp
 */

function dawp_cdn_image_url($url, $width, $height = null) {
    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    if ('i0.wp.com' === $parts['host'] || 'i1.wp.com' === $parts['host'] || 'i2.wp.com' === $parts['host']) {
        $cdn_url = 'https://' . $parts['host'] . $parts['path'];
    } else {
        $cdn_url = 'https://i0.wp.com/' . $parts['host'] . $parts['path'];
    }
    $query   = [
        'ssl' => '1',
    ];

    if ($width && $height) {
        $query = [
            'resize' => absint($width) . ',' . absint($height),
            'ssl'    => '1',
        ];
    } elseif ($width) {
        $query = [
            'w'   => absint($width),
            'ssl' => '1',
        ];
    }

    return add_query_arg($query, $cdn_url);
}

function dawp_cdn_image_srcset($url, $sources) {
    $srcset = [];

    foreach ($sources as $source) {
        $width  = isset($source[0]) ? absint($source[0]) : 0;
        $height = isset($source[1]) ? absint($source[1]) : null;

        if (!$width) {
            continue;
        }

        $srcset[] = dawp_cdn_image_url($url, $width, $height) . ' ' . $width . 'w';
    }

    return implode(', ', $srcset);
}

function dawp_theme_image_url($path) {
    return get_template_directory_uri() . '/' . ltrim($path, '/');
}

function dawp_responsive_theme_image($path, $alt, $class, $width, $height, $sources, $sizes, $loading = 'lazy') {
    $url = dawp_theme_image_url($path);

    printf(
        '<img loading="%1$s" decoding="async" width="%2$d" height="%3$d" src="%4$s" class="%5$s" alt="%6$s" srcset="%7$s" sizes="%8$s">',
        esc_attr($loading),
        absint($width),
        absint($height),
        esc_url(dawp_cdn_image_url($url, $width, $height)),
        esc_attr($class),
        esc_attr($alt),
        esc_attr(dawp_cdn_image_srcset($url, $sources)),
        esc_attr($sizes)
    );
}

function dawp_responsive_product_image($product, $class, $sizes) {
    $image_id = $product ? $product->get_image_id() : 0;
    $alt      = $product ? $product->get_name() : '';
    $url      = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';

    if (!$url && function_exists('wc_placeholder_img_src')) {
        $url = wc_placeholder_img_src('woocommerce_single');
    }

    if (!$url) {
        return;
    }

    printf(
        '<img loading="lazy" decoding="async" width="720" height="900" src="%1$s" class="%2$s" alt="%3$s" srcset="%4$s" sizes="%5$s">',
        esc_url(dawp_cdn_image_url($url, 720, 900)),
        esc_attr($class),
        esc_attr($alt),
        esc_attr(dawp_cdn_image_srcset($url, [[360, 450], [540, 675], [720, 900]])),
        esc_attr($sizes)
    );
}
