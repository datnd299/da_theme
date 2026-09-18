<?php
/**
 * POD variant system — image proxy.
 *
 * POD variant `image_urls` point straight at the external supplier's own
 * host, so serving them as-is leaks that host to anyone viewing source or
 * the network tab. The da-sync plugin already solves exactly this for its
 * own product images (DaImageCDN + CeasarCipher in da-sync.php): it
 * obfuscates the origin URL into a path segment served from an
 * `image.<domain>` CDN host that decodes it server-side and streams the
 * real image back. This mirrors that same encoding byte-for-byte so POD
 * images ride the same already-deployed CDN infra (da_sync's `image_cdn`
 * option) instead of needing a second proxy service stood up for it.
 */

if (!defined('ABSPATH')) {
    exit;
}

const POD_IMAGE_CIPHER_ALPHABET = "a0b1c2d3e4f5g6h7i8j9klmnopqrstuvwxyz.ABCDEFGHIJKLMNOPQRSTUVWXYZ";

/**
 * Same Caesar-shift substitution cipher as DaSync\Util\CeasarCipher::encode()
 * — kept as a standalone function here rather than depending on the da-sync
 * plugin being active, since POD variants must keep working even on
 * branches/environments where that plugin is disabled.
 */
function pod_image_cipher_encode($str, $shift = 5) {
    if ($str === '' || !is_string($str)) {
        return $str;
    }
    static $chars = null, $map = null;
    if ($chars === null) {
        $chars = str_split(POD_IMAGE_CIPHER_ALPHABET);
        $map   = array_flip($chars);
    }
    $length = count($chars);
    $out    = '';
    foreach (str_split($str) as $ch) {
        $at  = $map[$ch] ?? null;
        $out .= $at === null ? $ch : $chars[($at + $shift) % $length];
    }
    return $out;
}

/**
 * CDN host to proxy through, same source of truth da-sync itself uses
 * (`da_sync` option's `image_cdn`), so both systems point at the same
 * decoding endpoint. Empty when unconfigured (e.g. local dev over http)
 * rather than guessing at a fallback host — callers skip proxying in that
 * case and serve the origin URL directly.
 */
function pod_image_cdn_base() {
    static $base = null;
    if ($base !== null) {
        return $base;
    }

    $da_options = get_option('da_sync');
    if (!empty($da_options['image_cdn'])) {
        return $base = rtrim($da_options['image_cdn'], '/');
    }

    $site_url = get_site_url();
    if (str_starts_with($site_url, 'https://')) {
        return $base = rtrim(str_replace('https://', 'https://image.', $site_url), '/');
    }

    return $base = '';
}

/**
 * Rewrite one external image URL into an obfuscated CDN URL that hides the
 * origin host. Same three steps as DaImageCDN::compute_image_downsize():
 * urlencode the URL (with '%' swapped for '___' so it survives as a path
 * segment), md5 that for the filename, then cipher-encode it for the path.
 */
function pod_proxy_image_url($url) {
    $url = (string) $url;
    if ($url === '' || !preg_match('#^https?://#i', $url)) {
        return $url;
    }

    $cdn_base = pod_image_cdn_base();
    if ($cdn_base === '') {
        return $url;
    }

    $encoded = urlencode($url);
    $encoded = str_replace('%', '___', $encoded);
    $name    = md5($encoded);
    $cipher  = pod_image_cipher_encode($encoded);

    return "$cdn_base/$cipher/$name.jpg";
}

function pod_proxy_image_urls($urls) {
    return array_map('pod_proxy_image_url', (array) $urls);
}
