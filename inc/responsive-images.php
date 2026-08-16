<?php
defined('ABSPATH') || exit;

function dawp_is_local_image_host($host) {
    $site_host = wp_parse_url(home_url(), PHP_URL_HOST);

    if ($site_host && strcasecmp($host, $site_host) === 0) {
        return true;
    }

    return (bool) preg_match('/(^localhost$|\.local$|\.test$|\.localhost$|^127\.0\.0\.1$|^::1$)/i', $host);
}

function dawp_i0_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    // Local/dev host — Photon can't reach it, so serve the original untouched.
    if (dawp_is_local_image_host($parts['host'])) {
        return $url;
    }

    $args = ['ssl' => '1'];

    if ($width > 0 && $height > 0) {
        $args[$mode === 'fit' ? 'fit' : 'resize'] = absint($width) . ',' . absint($height);
    } elseif ($width > 0) {
        $args['w'] = absint($width);
    }

    // Already served from a wp.com (Photon) host — don't wrap it again.
    if (preg_match('/(^|\.)wp\.com$/i', $parts['host'])) {
        return add_query_arg($args, $url);
    }

    $path = implode('/', array_map('rawurlencode', explode('/', ltrim($parts['path'], '/'))));
    $cdn_url = 'https://i0.wp.com/' . $parts['host'] . '/' . $path;

    return add_query_arg($args, $cdn_url);
}

function dawp_image_srcset($url, array $candidates) {
    $srcset = [];

    foreach ($candidates as $candidate) {
        if (empty($candidate[0])) {
            continue;
        }

        $width = absint($candidate[0]);
        $height = !empty($candidate[1]) ? absint($candidate[1]) : 0;
        $srcset[] = esc_url(dawp_i0_image_url($url, $width, $height)) . ' ' . $width . 'w';
    }

    return implode(', ', array_unique($srcset));
}

function dawp_responsive_image($url, array $args = []) {
    $width = absint($args['width'] ?? 1200);
    $height = absint($args['height'] ?? $width);
    $attrs = [
        'src'      => dawp_i0_image_url($url, $width, $height, 'fit'),
        'alt'      => $args['alt'] ?? '',
        'width'    => $width,
        'height'   => $height,
        'class'    => $args['class'] ?? '',
        'loading'  => $args['loading'] ?? 'lazy',
        'decoding' => $args['decoding'] ?? 'async',
        'sizes'    => $args['sizes'] ?? '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px',
    ];

    if (!empty($args['fetchpriority'])) {
        $attrs['fetchpriority'] = $args['fetchpriority'];
    }

    $candidates = $args['srcset'] ?? [
        [400, (int) round($height * 400 / max(1, $width))],
        [768, (int) round($height * 768 / max(1, $width))],
        [$width, $height],
    ];

    $attrs['srcset'] = dawp_image_srcset($url, $candidates);

    $html = '<img';
    foreach ($attrs as $name => $value) {
        if ($value === '') {
            continue;
        }
        $html .= sprintf(' %s="%s"', esc_attr($name), esc_attr($value));
    }
    $html .= '>';

    return $html;
}

function dawp_attachment_image_cdn_attrs($attr) {
    if (!empty($attr['src'])) {
        $width = !empty($attr['width']) ? absint($attr['width']) : 0;
        $height = !empty($attr['height']) ? absint($attr['height']) : 0;
        $attr['src'] = dawp_i0_image_url($attr['src'], $width, $height, $width && $height ? 'fit' : 'resize');
    }

    if (!empty($attr['srcset'])) {
        $sources = [];

        foreach (explode(',', $attr['srcset']) as $source) {
            $source = trim($source);

            if (!preg_match('/^(\S+)\s+(\d+w|\d+(?:\.\d+)?x)$/', $source, $matches)) {
                continue;
            }

            $descriptor = $matches[2];
            $src_width = substr($descriptor, -1) === 'w' ? absint($descriptor) : 0;
            $sources[] = esc_url(dawp_i0_image_url(html_entity_decode($matches[1]), $src_width)) . ' ' . $descriptor;
        }

        if ($sources) {
            $attr['srcset'] = implode(', ', $sources);
        }
    }

    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'dawp_attachment_image_cdn_attrs', 20);
