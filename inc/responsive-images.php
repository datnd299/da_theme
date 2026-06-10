<?php
/**
 * Responsive image helpers with WordPress.com image CDN URLs.
 */

function dawp_i0_host() {
    $host = wp_parse_url(home_url('/'), PHP_URL_HOST);

    if (!$host || in_array($host, ['localhost', '127.0.0.1'], true) || substr($host, -5) === '.test') {
        return 'handedshoes.com';
    }

    return $host;
}

function dawp_i0_encode_path($path) {
    $path = '/' . ltrim(str_replace('\\', '/', $path), '/');
    $parts = array_map(function ($part) {
        return rawurlencode(rawurldecode($part));
    }, explode('/', $path));

    return implode('/', $parts);
}

function dawp_i0_from_url($url, $width = 0, $height = 0, $mode = 'resize') {
    if (!$url) {
        return '';
    }

    $parts = wp_parse_url($url);
    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    if ($parts['host'] === 'i0.wp.com') {
        return $url;
    }

    $host = in_array($parts['host'], ['localhost', '127.0.0.1'], true) ? dawp_i0_host() : $parts['host'];
    $query = ['ssl' => '1'];

    if ($width > 0 && $height > 0 && $mode === 'resize') {
        $query = ['resize' => absint($width) . ',' . absint($height)] + $query;
    } elseif ($width > 0 && $height > 0 && $mode === 'fit') {
        $query = ['fit' => absint($width) . ',' . absint($height)] + $query;
    } elseif ($width > 0) {
        $query = ['w' => absint($width)] + $query;
    }

    return 'https://i0.wp.com/' . $host . dawp_i0_encode_path($parts['path']) . '?' . http_build_query($query, '', '&');
}

function dawp_theme_image_url($relative_path, $width = 0, $height = 0, $mode = 'resize') {
    $path = '/wp-content/themes/' . get_template() . '/' . ltrim($relative_path, '/');
    $url = 'https://' . dawp_i0_host() . dawp_i0_encode_path($path);

    return dawp_i0_from_url($url, $width, $height, $mode);
}

function dawp_theme_image_srcset($relative_path, $original_width, $original_height, array $widths) {
    $srcset = [];
    $ratio = $original_height > 0 ? $original_height / $original_width : 1;

    foreach ($widths as $width) {
        $width = min(absint($width), absint($original_width));
        if ($width <= 0 || isset($srcset[$width])) {
            continue;
        }

        $height = max(1, (int) round($width * $ratio));
        $srcset[$width] = dawp_theme_image_url($relative_path, $width, $height) . ' ' . $width . 'w';
    }

    return implode(', ', $srcset);
}

function dawp_responsive_theme_image($relative_path, $alt, $original_width, $original_height, array $args = []) {
    $src_width = isset($args['src_width']) ? absint($args['src_width']) : absint($original_width);
    $src_width = min($src_width, absint($original_width));
    $src_height = max(1, (int) round($src_width * ($original_height / $original_width)));
    $widths = $args['widths'] ?? [400, 768, 1024, $src_width];
    $attrs = [
        'loading' => $args['loading'] ?? 'lazy',
        'decoding' => $args['decoding'] ?? 'async',
        'width' => $src_width,
        'height' => $src_height,
        'src' => dawp_theme_image_url($relative_path, $src_width, $src_height, 'fit'),
        'class' => $args['class'] ?? '',
        'alt' => $alt,
        'srcset' => dawp_theme_image_srcset($relative_path, $original_width, $original_height, $widths),
        'sizes' => $args['sizes'] ?? '(max-width: ' . $src_width . 'px) 100vw, ' . $src_width . 'px',
    ];

    $html = '<img';
    foreach ($attrs as $name => $value) {
        if ($value === '') {
            continue;
        }
        $html .= ' ' . esc_attr($name) . '="' . esc_attr($value) . '"';
    }
    $html .= '>';

    return $html;
}

add_filter('wp_get_attachment_image_src', function ($image) {
    if (is_admin() || !is_array($image) || empty($image[0])) {
        return $image;
    }

    $image[0] = dawp_i0_from_url($image[0], $image[1] ?? 0, $image[2] ?? 0);

    return $image;
}, 10, 1);

add_filter('wp_calculate_image_srcset', function ($sources) {
    if (is_admin() || !is_array($sources)) {
        return $sources;
    }

    foreach ($sources as $width => $source) {
        if (!empty($source['url'])) {
            $height = !empty($source['height']) ? (int) $source['height'] : 0;
            $sources[$width]['url'] = $height > 0
                ? dawp_i0_from_url($source['url'], (int) $width, $height)
                : dawp_i0_from_url($source['url'], (int) $width, 0, 'w');
        }
    }

    return $sources;
}, 10, 1);
