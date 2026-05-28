<?php
defined('ABSPATH') || exit;

function dawp_i0_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    $path = implode('/', array_map('rawurlencode', array_map('rawurldecode', explode('/', $parts['path']))));
    $query_args = [];

    if (! empty($parts['query'])) {
        wp_parse_str($parts['query'], $query_args);
        unset($query_args['fit'], $query_args['resize'], $query_args['w'], $query_args['h'], $query_args['ssl']);
    }

    $cdn_path = preg_match('/^i\d\.wp\.com$/', $parts['host'])
        ? $path
        : '/' . $parts['host'] . $path;
    $cdn_url = 'https://i0.wp.com' . $cdn_path;

    if (! empty($query_args)) {
        $cdn_url = add_query_arg($query_args, $cdn_url);
    }
    $args = ['ssl' => '1'];

    if ($width > 0 && $height > 0) {
        $args[$mode === 'fit' ? 'fit' : 'resize'] = (int) $width . ',' . (int) $height;
    } elseif ($width > 0) {
        $args['w'] = (int) $width;
    }

    return add_query_arg($args, $cdn_url);
}

function dawp_i0_image_srcset($url, array $sizes) {
    $items = [];

    foreach ($sizes as $size) {
        $width = isset($size[0]) ? (int) $size[0] : 0;
        $height = isset($size[1]) ? (int) $size[1] : 0;

        if ($width <= 0) {
            continue;
        }

        $items[] = dawp_i0_image_url($url, $width, $height) . ' ' . $width . 'w';
    }

    return implode(', ', $items);
}

function dawp_responsive_image_attrs($url, $width, $height, array $srcset_sizes, $sizes, $class = '', $loading = 'lazy', $fetchpriority = '') {
    $attrs = [
        'src'      => dawp_i0_image_url($url, (int) $width, (int) $height, 'fit'),
        'width'    => (int) $width,
        'height'   => (int) $height,
        'decoding' => 'async',
        'srcset'   => dawp_i0_image_srcset($url, $srcset_sizes),
        'sizes'    => $sizes,
    ];

    if ($class !== '') {
        $attrs['class'] = $class;
    }

    if ($loading !== '') {
        $attrs['loading'] = $loading;
    }

    if ($fetchpriority !== '') {
        $attrs['fetchpriority'] = $fetchpriority;
    }

    $html = [];

    foreach ($attrs as $name => $value) {
        if ($value === '' || $value === null) {
            continue;
        }

        $html[] = sprintf('%s="%s"', esc_attr($name), esc_attr($value));
    }

    return implode(' ', $html);
}

add_filter('wp_get_attachment_image_attributes', function ($attr) {
    if (empty($attr['src'])) {
        return $attr;
    }

    $width = ! empty($attr['width']) ? (int) $attr['width'] : 0;
    $height = ! empty($attr['height']) ? (int) $attr['height'] : 0;

    $attr['src'] = dawp_i0_image_url($attr['src'], $width, $height, 'fit');

    if (! empty($attr['srcset'])) {
        $ratio = $width > 0 && $height > 0 ? $height / $width : 0;
        $entries = array_map('trim', explode(',', $attr['srcset']));
        $converted = [];

        foreach ($entries as $entry) {
            if (! preg_match('/^(.+)\s+(\d+)w$/', $entry, $matches)) {
                continue;
            }

            $entry_width = (int) $matches[2];
            $entry_height = $ratio > 0 ? (int) round($entry_width * $ratio) : 0;
            $converted[] = dawp_i0_image_url($matches[1], $entry_width, $entry_height) . ' ' . $entry_width . 'w';
        }

        if (! empty($converted)) {
            $attr['srcset'] = implode(', ', $converted);
        }
    }

    return $attr;
}, 10, 1);
