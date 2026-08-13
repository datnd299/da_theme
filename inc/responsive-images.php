<?php
/**
 * Responsive image helpers backed by i0.wp.com resizing.
 *
 * @package dawp
 */

function dawp_is_local_env() {
    static $is_local = null;

    if ($is_local !== null) {
        return $is_local;
    }

    if (function_exists('wp_get_environment_type') && wp_get_environment_type() === 'local') {
        return $is_local = true;
    }

    $host = (string) wp_parse_url(home_url(), PHP_URL_HOST);

    return $is_local = (bool) preg_match(
        '/(^localhost$|\.local$|\.test$|\.localhost$|^127\.\d+\.\d+\.\d+$|^::1$|^192\.168\.|^10\.|^172\.(1[6-9]|2\d|3[01])\.)/i',
        $host
    );
}

function dawp_i0_source_url($url) {
    $url = html_entity_decode((string) $url);
    $url = preg_replace('/\?.*$/', '', $url);

    if (strpos($url, '//i0.wp.com/') !== false) {
        $url = preg_replace('#^https?://i0\.wp\.com/#', '', $url);
    } else {
        $url = preg_replace('#^https?://#', '', $url);
    }

    return 'https://i0.wp.com/' . ltrim($url, '/');
}

function dawp_i0_resize_url($url, $width, $height = 0) {
    if (dawp_is_local_env()) {
        return esc_url($url);
    }

    $width  = absint($width);
    $height = absint($height);

    if (!$width) {
        return esc_url($url);
    }

    $query = $height
        ? ['resize' => $width . ',' . $height, 'ssl' => 1]
        : ['w' => $width, 'ssl' => 1];

    return add_query_arg($query, dawp_i0_source_url($url));
}

function dawp_i0_srcset($url, $width, $height, $widths = []) {
    if (dawp_is_local_env()) {
        return '';
    }

    $width  = absint($width);
    $height = absint($height);

    if (!$width) {
        return '';
    }

    if (empty($widths)) {
        $widths = [400, 768, min(1300, $width), $width];
    }

    $widths = array_unique(array_filter(array_map('absint', $widths)));
    sort($widths);

    $srcset = [];

    foreach ($widths as $candidate_width) {
        if ($candidate_width > $width) {
            continue;
        }

        $candidate_height = $height ? (int) round($candidate_width * $height / $width) : 0;
        $srcset[] = esc_url(dawp_i0_resize_url($url, $candidate_width, $candidate_height)) . ' ' . $candidate_width . 'w';
    }

    return implode(', ', $srcset);
}

function dawp_responsive_image($args) {
    $defaults = [
        'src'           => '',
        'alt'           => '',
        'width'         => 0,
        'height'        => 0,
        'class'         => '',
        'sizes'         => '100vw',
        'srcset_widths' => [],
        'loading'       => 'lazy',
        'fetchpriority' => '',
    ];

    $args = wp_parse_args($args, $defaults);

    if (empty($args['src'])) {
        return '';
    }

    $width  = absint($args['width']);
    $height = absint($args['height']);

    $attributes = [
        'src'      => dawp_i0_resize_url($args['src'], $width, $height),
        'alt'      => $args['alt'],
        'class'    => $args['class'],
        'decoding' => 'async',
    ];

    if ($width) {
        $attributes['width'] = $width;
    }

    if ($height) {
        $attributes['height'] = $height;
    }

    if (!empty($args['loading'])) {
        $attributes['loading'] = $args['loading'];
    }

    if (!empty($args['fetchpriority'])) {
        $attributes['fetchpriority'] = $args['fetchpriority'];
    }

    $srcset = dawp_i0_srcset($args['src'], $width, $height, $args['srcset_widths']);
    if ($srcset) {
        $attributes['srcset'] = $srcset;
        $attributes['sizes']  = $args['sizes'];
    }

    $html = '<img';
    foreach ($attributes as $name => $value) {
        if ($value === '') {
            continue;
        }

        $html .= sprintf(' %s="%s"', esc_attr($name), esc_attr($value));
    }
    $html .= '>';

    return $html;
}

add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    if (is_admin() || empty($attr['src'])) {
        return $attr;
    }

    $full = wp_get_attachment_image_src($attachment->ID, 'full');
    if (!$full || empty($full[0]) || empty($full[1])) {
        return $attr;
    }

    $width  = !empty($attr['width']) ? absint($attr['width']) : absint($full[1]);
    $height = !empty($attr['height']) ? absint($attr['height']) : (!empty($full[2]) ? absint($full[2]) : 0);

    $attr['src']      = dawp_i0_resize_url($full[0], $width, $height);
    $attr['srcset']   = dawp_i0_srcset($full[0], absint($full[1]), !empty($full[2]) ? absint($full[2]) : 0, [300, 480, 768, 1024, 1300, absint($full[1])]);
    $attr['sizes']    = !empty($attr['sizes']) ? $attr['sizes'] : '(max-width: 768px) 100vw, 33vw';
    $attr['decoding'] = 'async';

    return $attr;
}, 20, 2);
