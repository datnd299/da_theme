<?php
/**
 * Responsive image helpers using WordPress.com image CDN.
 */

if (!function_exists('dawp_i0_image_url')) {
    function dawp_i0_image_url($url, $width = null, $height = null, $mode = 'resize') {
        $url = trim((string) $url);

        if ($url === '' || preg_match('/\.svg(?:\?.*)?$/i', $url)) {
            return $url;
        }

        $parts = wp_parse_url($url);

        if (empty($parts['host']) || empty($parts['path'])) {
            return $url;
        }

        if ($parts['host'] === 'i0.wp.com') {
            $source = ltrim($parts['path'], '/');
        } else {
            $source = $parts['host'] . $parts['path'];
        }

        $cdn_url = 'https://i0.wp.com/' . ltrim($source, '/');
        $args    = ['ssl' => 1];
        $width   = $width ? (int) $width : 0;
        $height  = $height ? (int) $height : 0;

        if ($width > 0 && $height > 0) {
            $args[$mode === 'fit' ? 'fit' : 'resize'] = $width . ',' . $height;
        } elseif ($width > 0) {
            $args['w'] = $width;
        }

        return add_query_arg($args, $cdn_url);
    }
}

if (!function_exists('dawp_i0_srcset')) {
    function dawp_i0_srcset($url, $width, $height, $srcset_widths) {
        $width  = (int) $width;
        $height = (int) $height;

        if ($url === '' || $width <= 0 || $height <= 0 || empty($srcset_widths)) {
            return '';
        }

        $srcset_widths = array_values(array_unique(array_map('intval', (array) $srcset_widths)));
        sort($srcset_widths);

        $items = [];
        foreach ($srcset_widths as $srcset_width) {
            if ($srcset_width <= 0 || $srcset_width > $width) {
                continue;
            }

            $srcset_height = max(1, (int) round($srcset_width * $height / $width));
            $items[]       = dawp_i0_image_url($url, $srcset_width, $srcset_height) . ' ' . $srcset_width . 'w';
        }

        return implode(', ', $items);
    }
}

if (!function_exists('dawp_responsive_image')) {
    function dawp_responsive_image($url, $args = []) {
        $defaults = [
            'alt'             => '',
            'class'           => '',
            'width'           => 1200,
            'height'          => 800,
            'src_width'       => null,
            'src_height'      => null,
            'srcset_widths'   => [400, 768, 1024, 1200],
            'sizes'           => '(max-width: 1200px) 100vw, 1200px',
            'loading'         => 'lazy',
            'decoding'        => 'async',
            'fetchpriority'   => '',
        ];
        $args = wp_parse_args($args, $defaults);

        $width      = max(1, (int) $args['width']);
        $height     = max(1, (int) $args['height']);
        $src_width  = $args['src_width'] ? max(1, (int) $args['src_width']) : $width;
        $src_height = $args['src_height'] ? max(1, (int) $args['src_height']) : $height;

        $attrs = [
            'src'      => dawp_i0_image_url($url, $src_width, $src_height),
            'alt'      => $args['alt'],
            'width'    => $width,
            'height'   => $height,
            'loading'  => $args['loading'],
            'decoding' => $args['decoding'],
            'class'    => $args['class'],
            'srcset'   => dawp_i0_srcset($url, $width, $height, $args['srcset_widths']),
            'sizes'    => $args['sizes'],
        ];

        if ($args['fetchpriority'] !== '') {
            $attrs['fetchpriority'] = $args['fetchpriority'];
        }

        $html = '<img';
        foreach ($attrs as $name => $value) {
            if ($value === '') {
                continue;
            }

            $escaped_value = $name === 'src' ? esc_url($value) : esc_attr($value);
            $html .= sprintf(' %s="%s"', esc_attr($name), $escaped_value);
        }
        $html .= '>';

        return $html;
    }
}

if (!function_exists('dawp_product_responsive_image')) {
    function dawp_product_responsive_image($product, $args = []) {
        if (!$product || !is_a($product, 'WC_Product')) {
            return '';
        }

        $image_id = $product->get_image_id();

        if (!$image_id) {
            return $product->get_image('woocommerce_thumbnail', [
                'class'   => isset($args['class']) ? $args['class'] : '',
                'loading' => isset($args['loading']) ? $args['loading'] : 'lazy',
            ]);
        }

        $image_url = wp_get_attachment_image_url($image_id, 'full');

        if (!$image_url) {
            return '';
        }

        $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

        return dawp_responsive_image($image_url, wp_parse_args($args, [
            'alt'           => $alt !== '' ? $alt : $product->get_name(),
            'class'         => '',
            'width'         => 600,
            'height'        => 600,
            'srcset_widths' => [260, 360, 520, 600],
            'sizes'         => '(max-width: 760px) 86vw, (max-width: 1100px) 50vw, 25vw',
            'loading'       => 'lazy',
        ]));
    }
}
