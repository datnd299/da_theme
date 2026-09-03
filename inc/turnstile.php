<?php
/**
 * Cloudflare Turnstile integration for the contact form.
 */

if (!defined('DAWP_TURNSTILE_SITE_KEY')) {
    define('DAWP_TURNSTILE_SITE_KEY', '0x4AAAAAAEmGxEUz8Fta07Rd');
}
if (!defined('DAWP_TURNSTILE_SECRET')) {
    define('DAWP_TURNSTILE_SECRET', '0x4AAAAAAEmGxHagct_O_msV04bE90Wfrmo');
}

function dawp_turnstile_site_key() {
    return (string) DAWP_TURNSTILE_SITE_KEY;
}

function dawp_turnstile_secret() {
    return (string) DAWP_TURNSTILE_SECRET;
}

function dawp_turnstile_enabled() {
    return dawp_turnstile_site_key() !== '' && dawp_turnstile_secret() !== '';
}

/**
 * Render the Turnstile widget markup for a form.
 */
function dawp_turnstile_field() {
    if (!dawp_turnstile_enabled()) {
        return;
    }
    ?>
    <div class="cf-turnstile" data-sitekey="<?php echo esc_attr(dawp_turnstile_site_key()); ?>" data-theme="light"></div>
    <?php
}

/**
 * Load the Turnstile API script on the contact page only.
 */
add_action('wp_enqueue_scripts', 'dawp_turnstile_assets');
function dawp_turnstile_assets() {
    if (!dawp_turnstile_enabled()) {
        return;
    }
    if (dawp_current_virtual_page_path() !== 'contact-us') {
        return;
    }
    wp_enqueue_script(
        'cloudflare-turnstile',
        'https://challenges.cloudflare.com/turnstile/v0/api.js',
        [],
        null,
        true
    );
}

add_filter('script_loader_tag', 'dawp_turnstile_script_attrs', 10, 2);
function dawp_turnstile_script_attrs($tag, $handle) {
    if ($handle === 'cloudflare-turnstile' && strpos($tag, 'async') === false) {
        $tag = str_replace(' src=', ' async defer src=', $tag);
    }
    return $tag;
}

/**
 * Verify a Turnstile token with the Cloudflare siteverify endpoint.
 *
 * @return bool True when the token is valid.
 */
function dawp_turnstile_verify($token) {
    if (!dawp_turnstile_enabled()) {
        return true;
    }

    $token = trim((string) $token);
    if ($token === '') {
        return false;
    }

    $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        'timeout' => 10,
        'body'    => [
            'secret'   => dawp_turnstile_secret(),
            'response' => $token,
            'remoteip' => dawp_get_client_ip(),
        ],
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);

    return !empty($body['success']);
}

function dawp_get_client_ip() {
    $keys = ['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
    foreach ($keys as $key) {
        if (empty($_SERVER[$key])) {
            continue;
        }
        $ip = trim(explode(',', wp_unslash($_SERVER[$key]))[0]);
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return $ip;
        }
    }
    return '';
}
