<?php
/**
 * Responsive image helpers backed by the i0.wp.com CDN.
 *
 * @package dawp
 */

if (!function_exists('dawp_i0_image_url')) {
    function dawp_i0_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
        $url = trim((string) $url);

        if ($url === '' || strpos($url, 'data:') === 0) {
            return $url;
        }

        $parts = wp_parse_url($url);
        if (empty($parts['host']) || empty($parts['path'])) {
            return $url;
        }

        $host = $parts['host'];
        $path = $parts['path'];

        if ($host === 'i0.wp.com') {
            $cdn_url = 'https://i0.wp.com' . $path;
        } else {
            $cdn_url = 'https://i0.wp.com/' . $host . $path;
        }

        $query = [];

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
