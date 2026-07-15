<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_responsive_image')) {
    function dawp_get_responsive_image($image_url, $alt, $class, $width, $height, $loading = 'lazy', $sizes = '', $fetchpriority = '') {
        if (empty($image_url)) {
            return '';
        }

        $image_url = remove_query_arg(array_keys(wp_parse_args(wp_parse_url($image_url, PHP_URL_QUERY))), $image_url);

        if (strpos($image_url, 'https://i0.wp.com/') === 0) {
            $cdn_url = strtok($image_url, '?');
        } else {
            $cdn_url = preg_replace('#^https?://#', 'https://i0.wp.com/', $image_url);
        }

        $ratio = $height > 0 ? $width / $height : 1;

        if ($width <= 240) {
            $sizes_arr = array_values(array_unique(array_filter([(int) $width, (int) $width * 2, (int) $width * 3])));
        } else {
            $sizes_arr = array_values(array_unique(array_filter([320, 480, 768, 1024, (int) $width, min(max((int) $width * 2, 1200), 1600)])));
        }
        sort($sizes_arr);

        $srcset_arr = [];
        foreach ($sizes_arr as $w) {
            $h = (int) round($w / $ratio);
            $srcset_arr[] = esc_url($cdn_url . '?resize=' . $w . '%2C' . $h . '&ssl=1') . ' ' . $w . 'w';
        }
        $srcset = implode(', ', $srcset_arr);

        if (!$sizes) {
            $sizes = '(max-width: ' . (int) $width . 'px) 100vw, ' . (int) $width . 'px';
        }
        
        $src = esc_url($cdn_url . '?fit=' . $width . '%2C' . $height . '&ssl=1');
        $fetchpriority_attr = $fetchpriority ? ' fetchpriority="' . esc_attr($fetchpriority) . '"' : '';

        $html = sprintf(
            '<img loading="%s" decoding="async" width="%d" height="%d" src="%s" class="%s" alt="%s" srcset="%s" sizes="%s"%s>',
            esc_attr($loading),
            (int)$width,
            (int)$height,
            $src,
            esc_attr($class),
            esc_attr($alt),
            $srcset,
            esc_attr($sizes),
            $fetchpriority_attr
        );

        return $html;
    }
}
