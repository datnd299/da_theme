<?php
/**
 * Responsive image helpers backed by the i0.wp.com CDN.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_is_local_env')) {
    /**
     * i0.wp.com can only fetch publicly reachable URLs, so on a local/dev
     * install (e.g. http://localhost:8080) the proxy would just fail to
     * load the image. Detect that case and let callers skip the CDN.
     */
    function dawp_is_local_env() {
        static $is_local = null;

        if ($is_local !== null) {
            return $is_local;
        }

        if (function_exists('wp_get_environment_type') && wp_get_environment_type() === 'local') {
            return $is_local = true;
        }

        $host = wp_parse_url(home_url(), PHP_URL_HOST);

        if (empty($host)) {
            return $is_local = false;
        }

        if ($host === 'localhost' || $host === '127.0.0.1' || $host === '::1') {
            return $is_local = true;
        }

        return $is_local = (bool) preg_match('/\.(local|test|localhost)$/i', $host);
    }
}

if (!function_exists('dawp_i0_image_url')) {
    function dawp_i0_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
        $url = trim((string) $url);

        if ($url === '' || strpos($url, 'data:') === 0 || dawp_is_local_env()) {
            return $url;
        }

        $parts = wp_parse_url($url);

        if (empty($parts['host']) || empty($parts['path'])) {
            return $url;
        }

        $host = $parts['host'];
        $path = $parts['path'];

        $cdn_url = ($host === 'i0.wp.com') ? 'https://i0.wp.com' . $path : 'https://i0.wp.com/' . $host . $path;

        $query = [];

        if (!empty($parts['query'])) {
            wp_parse_str($parts['query'], $query);
        }

        if ($width > 0 && $height > 0) {
            $query[$mode === 'fit' ? 'fit' : 'resize'] = (int) $width . ',' . (int) $height;
        } elseif ($width > 0) {
            $query['w'] = (int) $width;
        }

        $query['ssl'] = '1';

        return add_query_arg($query, $cdn_url);
    }
}

if (!function_exists('dawp_i0_srcset')) {
    function dawp_i0_srcset($url, array $sizes, $mode = 'resize') {
        $srcset = [];

        foreach ($sizes as $size) {
            $width  = isset($size[0]) ? (int) $size[0] : 0;
            $height = isset($size[1]) ? (int) $size[1] : 0;

            if ($width <= 0) {
                continue;
            }

            $srcset[] = dawp_i0_image_url($url, $width, $height, $mode) . ' ' . $width . 'w';
        }

        return implode(', ', $srcset);
    }
}

if (!function_exists('dawp_i0_img_attrs')) {
    function dawp_i0_img_attrs($url, array $args = []) {
        $defaults = [
            'width'    => 800,
            'height'   => 800,
            'srcset'   => [],
            'sizes'    => '(max-width: 800px) 100vw, 800px',
            'mode'     => 'resize',
            'loading'  => 'lazy',
            'decoding' => 'async',
        ];

        $args   = wp_parse_args($args, $defaults);
        $width  = (int) $args['width'];
        $height = (int) $args['height'];
        $srcset = !empty($args['srcset']) ? $args['srcset'] : [[$width, $height]];

        $attrs = [
            'src'      => dawp_i0_image_url($url, $width, $height, $args['mode']),
            'srcset'   => dawp_i0_srcset($url, $srcset, $args['mode']),
            'sizes'    => $args['sizes'],
            'width'    => $width,
            'height'   => $height,
            'loading'  => $args['loading'],
            'decoding' => $args['decoding'],
        ];

        $html = '';

        foreach ($attrs as $name => $value) {
            if ($value === '' || $value === false || $value === null) {
                continue;
            }

            $html .= sprintf(' %s="%s"', esc_attr($name), esc_attr($value));
        }

        return trim($html);
    }
}

/**
 * Auto-route core WP/WooCommerce attachment images (product gallery,
 * thumbnails, etc.) through the i0.wp.com CDN so they get resized on
 * the fly for the viewport that requested them, without needing to
 * override WooCommerce's single-product templates.
 */
if (!function_exists('dawp_i0_filter_attachment_image_src')) {
    function dawp_i0_filter_attachment_image_src($image, $attachment_id, $size, $icon) {
        if (is_admin() || empty($image[0])) {
            return $image;
        }

        $width  = !empty($image[1]) ? (int) $image[1] : 0;
        $height = !empty($image[2]) ? (int) $image[2] : 0;

        $image[0] = dawp_i0_image_url($image[0], $width, $height);

        return $image;
    }
    add_filter('wp_get_attachment_image_src', 'dawp_i0_filter_attachment_image_src', 10, 4);
}

if (!function_exists('dawp_i0_filter_image_srcset')) {
    function dawp_i0_filter_image_srcset($sources, $size_array, $image_src, $image_meta, $attachment_id) {
        if (is_admin() || empty($sources)) {
            return $sources;
        }

        foreach ($sources as $width => $source) {
            if (empty($source['url'])) {
                continue;
            }

            $sources[$width]['url'] = dawp_i0_image_url($source['url'], (int) $source['value']);
        }

        return $sources;
    }
    add_filter('wp_calculate_image_srcset', 'dawp_i0_filter_image_srcset', 10, 5);
}
