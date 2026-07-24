<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_responsive_image')) {
    function dawp_get_responsive_image($image_url, $alt, $class, $width, $height, $loading = 'lazy', $sizes = '', $fetchpriority = '', $fit_mode = 'crop') {
        if (empty($image_url)) {
            return '';
        }

        $image_url = strtok($image_url, '?');

        if (strpos($image_url, '//') === 0) {
            $image_url = 'https:' . $image_url;
        }

        if (!wp_parse_url($image_url, PHP_URL_HOST)) {
            $image_url = home_url($image_url);
        }

        if (strpos($image_url, 'https://i0.wp.com/') === 0 || strpos($image_url, 'http://i0.wp.com/') === 0) {
            $cdn_url = preg_replace('#^http://#', 'https://', $image_url);
        } else {
            $cdn_url = preg_replace('#^https?://#', 'https://i0.wp.com/', $image_url);
        }

        $ratio = $height > 0 ? $width / $height : 1;

        if ($width <= 240) {
            $sizes_arr = array_values(array_unique(array_filter([(int) $width, min((int) $width * 2, 480), min((int) $width * 3, 720)])));
        } else {
            $sizes_arr = array_values(array_unique(array_filter([320, 480, 768, 1024, (int) $width, min(max((int) $width * 2, 1200), 1600)])));
        }
        sort($sizes_arr);

        $fit_mode = 'contain' === $fit_mode ? 'contain' : 'crop';

        $srcset_arr = [];
        foreach ($sizes_arr as $w) {
            if ('contain' === $fit_mode) {
                $srcset_arr[] = esc_url($cdn_url . '?resize=' . $w . '&ssl=1') . ' ' . $w . 'w';
                continue;
            }

            $h = (int) round($w / $ratio);
            $srcset_arr[] = esc_url($cdn_url . '?resize=' . $w . '%2C' . $h . '&ssl=1') . ' ' . $w . 'w';
        }
        $srcset = implode(', ', $srcset_arr);

        if (!$sizes) {
            $sizes = '(max-width: ' . (int) $width . 'px) 100vw, ' . (int) $width . 'px';
        }
        
        if ('contain' === $fit_mode) {
            $src = esc_url($cdn_url . '?resize=' . $width . '&ssl=1');
        } else {
            $src = esc_url($cdn_url . '?fit=' . $width . '%2C' . $height . '&ssl=1');
        }
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

if (!function_exists('dawp_get_responsive_attachment_image')) {
    function dawp_get_responsive_attachment_image($attachment_id, $alt = '', $class = '', $width = 520, $height = 520, $loading = 'lazy', $sizes = '', $fetchpriority = '', $fit_mode = 'crop') {
        $attachment_id = (int) $attachment_id;

        if (!$attachment_id) {
            return '';
        }

        $image_src = wp_get_attachment_image_src($attachment_id, 'full');

        if (!$image_src || empty($image_src[0])) {
            return '';
        }

        if (!$alt) {
            $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        }

        if (!$alt) {
            $alt = get_the_title($attachment_id);
        }

        return dawp_get_responsive_image(
            $image_src[0],
            $alt,
            $class,
            $width ?: (int) $image_src[1],
            $height ?: (int) $image_src[2],
            $loading,
            $sizes,
            $fetchpriority,
            $fit_mode
        );
    }
}
