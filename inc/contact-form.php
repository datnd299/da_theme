<?php
/**
 * Contact form handler + Cloudflare Turnstile CAPTCHA.
 *
 * Keys can be overridden from wp-config.php by defining
 * DAWP_TURNSTILE_SITE_KEY / DAWP_TURNSTILE_SECRET_KEY before this file loads.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('DAWP_TURNSTILE_SITE_KEY')) {
    define('DAWP_TURNSTILE_SITE_KEY', '0x4AAAAAAErXDKsmm4x-QEd_');
}

if (!defined('DAWP_TURNSTILE_SECRET_KEY')) {
    define('DAWP_TURNSTILE_SECRET_KEY', '0x4AAAAAAErXDOMpxLICNPAwjOHcalWSXfY');
}

/**
 * True when Turnstile is configured and should be enforced.
 */
function dawp_turnstile_enabled() {
    return DAWP_TURNSTILE_SITE_KEY !== '' && DAWP_TURNSTILE_SECRET_KEY !== '';
}

/**
 * Render the Turnstile widget markup for a form.
 */
function dawp_turnstile_widget() {
    if (!dawp_turnstile_enabled()) {
        return;
    }
    printf(
        '<div class="cf-turnstile" data-sitekey="%s" data-theme="light"></div>',
        esc_attr(DAWP_TURNSTILE_SITE_KEY)
    );
}

/**
 * Load the Turnstile API script + expose the site key on the contact page.
 */
add_action('wp_enqueue_scripts', 'dawp_turnstile_assets', 20);
function dawp_turnstile_assets() {
    if (!dawp_turnstile_enabled()) {
        return;
    }
    if (function_exists('dawp_current_virtual_page_key') && dawp_current_virtual_page_key(false) !== 'contact-us') {
        return;
    }

    wp_enqueue_script(
        'cloudflare-turnstile',
        'https://challenges.cloudflare.com/turnstile/v0/api.js',
        [],
        null,
        true
    );

    wp_localize_script('dawp-main', 'dawpTurnstile', [
        'siteKey' => DAWP_TURNSTILE_SITE_KEY,
    ]);
}

/**
 * Verify a Turnstile token server-side.
 */
function dawp_turnstile_verify($token, $remote_ip = '') {
    if (!dawp_turnstile_enabled()) {
        return true;
    }
    if (empty($token)) {
        return false;
    }

    $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        'timeout' => 10,
        'body'    => [
            'secret'   => DAWP_TURNSTILE_SECRET_KEY,
            'response' => $token,
            'remoteip' => $remote_ip,
        ],
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);

    return !empty($body['success']);
}

add_action('wp_ajax_nopriv_dawp_contact', 'dawp_contact_submit');
add_action('wp_ajax_dawp_contact', 'dawp_contact_submit');

function dawp_contact_submit() {
    if (!check_ajax_referer('dawp_contact_nonce', 'nonce', false)) {
        wp_send_json_error(['message' => 'Invalid request.']);
    }

    $token     = sanitize_text_field(wp_unslash($_POST['cf-turnstile-response'] ?? ''));
    $remote_ip = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? ''));

    if (!dawp_turnstile_verify($token, $remote_ip)) {
        wp_send_json_error(['message' => 'Captcha verification failed. Please try again.']);
    }

    $name    = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $email   = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $subject = sanitize_text_field(wp_unslash($_POST['subject'] ?? 'general'));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    if (empty($name) || !is_email($email) || empty($message)) {
        wp_send_json_error(['message' => 'Please fill in all required fields.']);
    }

    $site_name   = get_bloginfo('name');
    $admin_email = get_option('admin_email');

    $subject_labels = [
        'general'  => 'General Inquiry',
        'order'    => 'Order Support',
        'product'  => 'Product Question',
        'shipping' => 'Shipping Question',
        'return'   => 'Returns & Refunds',
        'other'    => 'Other',
    ];
    $subject_label = $subject_labels[$subject] ?? 'General Inquiry';

    $admin_subject = '[' . $site_name . '] Contact: ' . $subject_label . ' from ' . $name;
    $admin_body    = "Name: {$name}\nEmail: {$email}\nSubject: {$subject_label}\n\n{$message}";
    wp_mail($admin_email, $admin_subject, $admin_body, ['Reply-To: ' . $name . ' <' . $email . '>']);

    $confirm_subject = 'We received your message – ' . $site_name;
    $confirm_body    = "Hi {$name},\n\nThanks for reaching out. We've received your message and our support team will get back to you within one business day (Mon-Fri, 9:00 AM - 5:00 PM EST).\n\n- The {$site_name} Team";
    wp_mail($email, $confirm_subject, $confirm_body, ['Content-Type: text/plain; charset=UTF-8']);

    wp_send_json_success(['message' => 'Thanks, ' . $name . '. Your message has been sent — we usually reply within one business day.']);
}
