<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_responsive_image')) {
    function dawp_get_responsive_image($image_url, $alt, $class, $width, $height, $loading = 'lazy') {
        if (empty($image_url)) {
            return '';
        }

        // Convert the image URL to the i0.wp.com CDN URL
        $cdn_url = preg_replace('#^https?://#', 'https://i0.wp.com/', $image_url);

        // Calculate aspect ratio
        $ratio = $height > 0 ? $width / $height : 1;

        // Generate srcset
        $sizes_arr = [400, 768, $width, max((int)$width, 1376)];
        $sizes_arr = array_unique($sizes_arr);
        sort($sizes_arr);

        $srcset_arr = [];
        foreach ($sizes_arr as $w) {
            $h = round($w / $ratio);
            $srcset_arr[] = esc_url($cdn_url . '?resize=' . $w . '%2C' . $h . '&ssl=1') . ' ' . $w . 'w';
        }
        $srcset = implode(', ', $srcset_arr);

        // Generate sizes
        $sizes = '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
        
        $src = esc_url($cdn_url . '?fit=' . $width . '%2C' . $height . '&ssl=1');

        $html = sprintf(
            '<img loading="%s" decoding="async" width="%d" height="%d" src="%s" class="%s" alt="%s" srcset="%s" sizes="%s">',
            esc_attr($loading),
            (int)$width,
            (int)$height,
            $src,
            esc_attr($class),
            esc_attr($alt),
            $srcset,
            esc_attr($sizes)
        );

        return $html;
    }
}
