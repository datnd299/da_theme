<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_responsive_image')) {
    function dawp_get_responsive_image($image_url, $alt, $class, $width, $height, $loading = 'lazy', $sizes = '', $fetchpriority = '') {
        if (empty($image_url)) {
            return '';
        }

        $fetchpriority_attr = $fetchpriority ? ' fetchpriority="' . esc_attr($fetchpriority) . '"' : '';

        if (preg_match('#^(data:|blob:)#i', $image_url)) {
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

        $host = wp_parse_url($image_url, PHP_URL_HOST);
        $local_hosts = ['localhost', '127.0.0.1', '::1'];
        if ($host && in_array(strtolower($host), $local_hosts, true)) {
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

        if (strpos($image_url, 'https://i0.wp.com/') === 0) {
            $cdn_url = strtok($image_url, '?');
        } else {
            $cdn_url = preg_replace('#^https?://#', 'https://i0.wp.com/', $image_url);
        }

        $ratio = $height > 0 ? $width / $height : 1;

        if ($width <= 80) {
            $sizes_arr = array_values(array_unique(array_filter([(int) $width, (int) $width * 2, min((int) $width * 3, 240)])));
        } elseif ($width <= 240) {
            $sizes_arr = array_values(array_unique(array_filter([120, 160, (int) $width, min((int) $width * 2, 480)])));
        } elseif ($width <= 640) {
            $sizes_arr = array_values(array_unique(array_filter([240, 320, 480, (int) $width, min((int) $width * 2, 1024)])));
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

if (!function_exists('dawp_home_image_assets')) {
    function dawp_home_image_assets() {
        return [
            '21.png',
            '22.png',
            '23.png',
            '24.png',
            '25.png',
            '26.png',
            '27.png',
            '28.png',
            '29.png',
            '30.png',
            '31.png',
            '32.png',
            '33.png',
            '34.png',
            '35.png',
            '36.png',
        ];
    }
}

if (!function_exists('dawp_normalize_home_image_file')) {
    function dawp_normalize_home_image_file($file) {
        $file = basename(ltrim((string) $file, '/'));
        $legacy_map = [
            'collectible-building-blocks.jpg' => '21.png',
            'wooden-toy-collection.jpg'      => '35.png',
            'wooden-shape-blocks.jpg'        => '30.png',
            'collectible-desk-figures.png'   => '27.png',
            'modular-display-build.png'      => '33.png',
            'mystery-box-display.png'        => '36.png',
            'collector-shelf-display.png'    => '32.png',
        ];

        return $legacy_map[$file] ?? $file;
    }
}

if (!function_exists('dawp_home_image_url')) {
    function dawp_home_image_url($file) {
        $file = dawp_normalize_home_image_file($file);
        if (!$file) {
            $file = dawp_home_image_assets()[0];
        }

        $path = get_template_directory() . '/assets/img/home/' . $file;
        $url  = get_template_directory_uri() . '/assets/img/home/' . $file;

        if (file_exists($path)) {
            $url = add_query_arg('ver', filemtime($path), $url);
        }

        return $url;
    }
}

if (!function_exists('dawp_home_image_file')) {
    function dawp_home_image_file($index = 0, $avoid = []) {
        $assets = dawp_home_image_assets();
        $avoid = array_filter(array_map(static function($file) {
            return basename((string) $file);
        }, (array) $avoid));
        $avoid = array_map('dawp_normalize_home_image_file', $avoid);

        if ($avoid) {
            $available = array_values(array_diff($assets, $avoid));
            if ($available) {
                $assets = $available;
            }
        }

        return $assets[(int) $index % count($assets)];
    }
}

if (!function_exists('dawp_get_home_responsive_image')) {
    function dawp_get_home_responsive_image($file, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $width = 1200, $height = 900) {
        $url = dawp_home_image_url($file);

        return dawp_get_responsive_image(
            $url,
            $alt,
            $class,
            $width,
            $height,
            $loading,
            $sizes,
            'eager' === $loading ? 'high' : 'auto'
        );
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
