<?php
/**
 * Responsive image helpers backed by the i0.wp.com CDN.
 *
 * @package dawp
 */

function qb_i0_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
    $url = trim((string) $url);

    if (!$url || 0 === strpos($url, 'data:')) {
        return $url;
    }

    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    $host = $parts['host'];

    if (!qb_can_use_i0_image_cdn($host)) {
        return $url;
    }

    $path = $parts['path'];

    if ('i0.wp.com' === $host) {
        $path = preg_replace('#^/+#', '', $path);
    } else {
        $path = $host . $path;
    }

    $query = ['ssl' => 1];

    if ($width && $height) {
        $query[$mode] = absint($width) . ',' . absint($height);
    } elseif ($width) {
        $query['w'] = absint($width);
    }

    return add_query_arg($query, 'https://i0.wp.com/' . ltrim($path, '/'));
}

function qb_can_use_i0_image_cdn($host) {
    $host = strtolower(trim((string) $host, '[]'));

    if (!$host || 'localhost' === $host || qb_string_ends_with($host, '.local') || qb_string_ends_with($host, '.test')) {
        return false;
    }

    if (filter_var($host, FILTER_VALIDATE_IP)) {
        if (filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return true;
        }

        return false;
    }

    return true;
}

function qb_string_ends_with($value, $suffix) {
    $value = (string) $value;
    $suffix = (string) $suffix;

    if ('' === $suffix) {
        return true;
    }

    return substr($value, -strlen($suffix)) === $suffix;
}

function qb_i0_srcset($url, $intrinsic_width, $intrinsic_height, $widths, $mode = 'resize') {
    $parts = wp_parse_url($url);

    if (!empty($parts['host']) && !qb_can_use_i0_image_cdn($parts['host'])) {
        return '';
    }

    $srcset = [];
    $ratio = $intrinsic_width && $intrinsic_height ? $intrinsic_height / $intrinsic_width : 0;

    foreach (array_unique(array_filter(array_map('absint', (array) $widths))) as $width) {
        if ($intrinsic_width && $width > $intrinsic_width) {
            continue;
        }

        $height = $ratio ? (int) round($width * $ratio) : 0;
        $srcset[] = qb_i0_image_url($url, $width, $height, $mode) . ' ' . $width . 'w';
    }

    return implode(', ', $srcset);
}

function qb_responsive_image($url, $alt = '', $args = []) {
    if (!$url) {
        return '';
    }

    $defaults = [
        'width'         => 1300,
        'height'        => 0,
        'widths'        => [400, 768, 1024, 1300],
        'sizes'         => '(max-width: 1300px) 100vw, 1300px',
        'class'         => '',
        'loading'       => 'lazy',
        'decoding'      => 'async',
        'fetchpriority' => '',
        'mode'          => 'resize',
    ];

    $args = wp_parse_args($args, $defaults);

    $width = absint($args['width']);
    $height = absint($args['height']);
    $src = qb_i0_image_url($url, $width, $height, $args['mode']);
    $srcset = qb_i0_srcset($url, $width, $height, $args['widths'], $args['mode']);

    $attrs = [
        'src'      => $src,
        'alt'      => esc_attr($alt),
        'width'    => $width,
        'height'   => $height,
        'srcset'   => $srcset,
        'sizes'    => $args['sizes'],
        'loading'  => $args['loading'],
        'decoding' => $args['decoding'],
    ];

    if ($args['class']) {
        $attrs['class'] = $args['class'];
    }

    if ($args['fetchpriority']) {
        $attrs['fetchpriority'] = $args['fetchpriority'];
    }

    $html_attrs = [];

    foreach ($attrs as $name => $value) {
        if ('' === $value || 0 === $value || null === $value) {
            continue;
        }

        $html_attrs[] = sprintf(
            '%s="%s"',
            esc_attr($name),
            'src' === $name ? esc_url($value) : esc_attr($value)
        );
    }

    return '<img ' . implode(' ', $html_attrs) . '>';
}
