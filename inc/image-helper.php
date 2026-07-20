<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_responsive_image')) {
    function dawp_get_responsive_image($image_url, $alt, $class, $width, $height, $loading = 'lazy', $sizes = '', $fetchpriority = '') {
        if (empty($image_url)) {
            return '';
        }

        if (preg_match('#^(data:|blob:)#i', $image_url)) {
            $fetchpriority_attr = $fetchpriority ? ' fetchpriority="' . esc_attr($fetchpriority) . '"' : '';

            return sprintf(
                '<img loading="%s" decoding="async" width="%d" height="%d" src="%s" class="%s" alt="%s"%s>',
                esc_attr($loading),
                (int)$width,
                (int)$height,
                esc_url($image_url),
                esc_attr($class),
                esc_attr($alt),
                $fetchpriority_attr
            );
        }

        $query = wp_parse_url($image_url, PHP_URL_QUERY);
        if ($query) {
            $image_url = remove_query_arg(array_keys(wp_parse_args($query)), $image_url);
        }

        if (strpos($image_url, 'https://i0.wp.com/') === 0) {
            $cdn_url = strtok($image_url, '?');
        } else {
            $cdn_url = preg_replace('#^https?://#', 'https://i0.wp.com/', $image_url);
        }

        $ratio = $height > 0 ? $width / $height : 1;

        if ($width <= 120) {
            $sizes_arr = array_values(array_unique(array_filter([(int) $width, (int) $width * 2, (int) $width * 3])));
        } elseif ($width <= 320) {
            $sizes_arr = array_values(array_unique(array_filter([160, 240, (int) $width, min((int) $width * 2, 640)])));
        } else {
            $sizes_arr = array_values(array_unique(array_filter([320, 480, 768, 1024, (int) $width, min(max((int) $width * 2, 1200), 1600)])));
        }
        sort($sizes_arr);

        $srcset_arr = [];
        foreach ($sizes_arr as $w) {
            $h = (int) round($w / $ratio);
            $mode = $w === (int) $width ? 'fit' : 'resize';
            $srcset_arr[] = esc_url($cdn_url . '?' . $mode . '=' . $w . '%2C' . $h . '&ssl=1') . ' ' . $w . 'w';
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

if (!function_exists('dawp_get_product_responsive_image')) {
    function dawp_get_product_responsive_image($product, $class = '', $width = 360, $height = 360, $sizes = '(max-width: 699px) 82vw, (max-width: 899px) 50vw, 25vw') {
        if (!$product || !is_a($product, 'WC_Product')) {
            return '';
        }

        $image_id = (int) $product->get_image_id();

        if (!$image_id) {
            return $product->get_image('woocommerce_single', ['class' => $class, 'loading' => 'lazy']);
        }

        $image_url = wp_get_attachment_image_url($image_id, 'full');
        if (!$image_url) {
            return $product->get_image('woocommerce_single', ['class' => $class, 'loading' => 'lazy']);
        }

        $metadata = wp_get_attachment_metadata($image_id);
        if (!empty($metadata['width']) && !empty($metadata['height'])) {
            $ratio = (int) $metadata['width'] / (int) $metadata['height'];
            if ($ratio > 0) {
                $height = (int) round($width / $ratio);
            }
        }

        return dawp_get_responsive_image(
            $image_url,
            get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: $product->get_name(),
            $class,
            $width,
            $height,
            'lazy',
            $sizes
        );
    }
}
