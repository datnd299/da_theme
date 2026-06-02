<?php
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/menu.php';
require_once get_template_directory() . '/inc/virtual-pages.php';
require_once get_template_directory() . '/inc/woo-tweaks.php';
require_once get_template_directory() . '/inc/newsletter.php';
require_once get_template_directory() . '/inc/store-info.php';

function dawp_i0_image_url($url, $width = 0, $height = 0, $mode = 'resize') {
    $parts = wp_parse_url($url);

    if (empty($parts['host']) || empty($parts['path'])) {
        return $url;
    }

    $path = $parts['host'] . $parts['path'];
    $args = array('ssl' => '1');

    if ($width > 0 && $height > 0) {
        $args[$mode] = absint($width) . ',' . absint($height);
    } elseif ($width > 0) {
        $args['w'] = absint($width);
    }

    return add_query_arg($args, 'https://i0.wp.com/' . ltrim($path, '/'));
}

function dawp_i0_srcset($url, $original_width, $original_height, $widths, $mode = 'resize') {
    $srcset = array();

    foreach ($widths as $width) {
        $width  = absint($width);
        $height = $original_width > 0 ? (int) round($width * $original_height / $original_width) : 0;

        if ($width <= 0 || $height <= 0) {
            continue;
        }

        $srcset[] = esc_url(dawp_i0_image_url($url, $width, $height, $mode)) . ' ' . $width . 'w';
    }

    return implode(', ', $srcset);
}

function dawp_i0_attachment_image_attributes($attr, $attachment, $size) {
    if (empty($attr['src'])) {
        return $attr;
    }

    $metadata = wp_get_attachment_metadata($attachment->ID);
    $width    = !empty($metadata['width']) ? (int) $metadata['width'] : 1200;
    $height   = !empty($metadata['height']) ? (int) $metadata['height'] : 1200;
    $sizes    = array(400, 768, 1024, 1300);

    $src_width        = min(768, $width);
    $src              = wp_get_attachment_url($attachment->ID);
    $src              = $src ? $src : $attr['src'];
    $attr['src']      = dawp_i0_image_url($src, $src_width, (int) round($src_width * $height / $width));
    $attr['srcset']   = dawp_i0_srcset($src, $width, $height, array_filter($sizes, function ($candidate) use ($width) {
        return $candidate <= $width;
    }));
    $attr['sizes']    = empty($attr['sizes']) ? '(max-width: 700px) 50vw, (max-width: 1100px) 33vw, 300px' : $attr['sizes'];
    $attr['decoding'] = 'async';

    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'dawp_i0_attachment_image_attributes', 10, 3);
