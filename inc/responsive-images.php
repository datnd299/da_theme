<?php
/**
 * Responsive image helpers backed by the WordPress.com image CDN.
 *
 * @package dawp
 */

if (! defined('ABSPATH')) {
    exit;
}

function dawp_cdn_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    $host = $parts['host'];
    $path = $parts['path'];

    if ($host === 'i0.wp.com') {
        $path_parts = explode('/', ltrim($path, '/'), 2);
        if (count($path_parts) === 2) {
            $host = $path_parts[0];
            $path = '/' . $path_parts[1];
        }
    }

    $cdn_url = 'https://i0.wp.com/' . $host . $path;
    $args = [];

    if (! empty($parts['query'])) {
        wp_parse_str($parts['query'], $args);
        unset($args['fit'], $args['resize'], $args['w']);
    }

    $args['ssl'] = 1;

    if ($width > 0 && $height > 0) {
        $args[$mode === 'fit' ? 'fit' : 'resize'] = absint($width) . ',' . absint($height);
    } elseif ($width > 0) {
        $args['w'] = absint($width);
    }

    return add_query_arg($args, $cdn_url);
}

function dawp_cdn_image_srcset($url, $base_width, $base_height, array $widths) {
    $base_width  = max(1, absint($base_width));
    $base_height = max(1, absint($base_height));
    $srcset      = [];
    $widths      = array_values(array_unique(array_filter(array_map('absint', $widths))));
    sort($widths);

    foreach ($widths as $width) {
        $height = max(1, (int) round($width * $base_height / $base_width));

        $srcset[] = dawp_cdn_image_url($url, $width, $height) . ' ' . $width . 'w';
    }

    return implode(', ', $srcset);
}

function dawp_responsive_image_attrs($url, $width, $height, $sizes, array $srcset_widths = []) {
    $width  = absint($width);
    $height = absint($height);

    if (empty($srcset_widths)) {
        $srcset_widths = [400, 768, $width];
    }

    $srcset_widths[] = $width;

    return sprintf(
        'width="%1$d" height="%2$d" src="%3$s" srcset="%4$s" sizes="%5$s" decoding="async"',
        $width,
        $height,
        esc_url(dawp_cdn_image_url($url, $width, $height, 'fit')),
        esc_attr(dawp_cdn_image_srcset($url, $width, $height, $srcset_widths)),
        esc_attr($sizes)
    );
}
