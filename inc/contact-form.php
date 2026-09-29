<?php
/**
 * Contact form handling.
 *
 * @package dawp
 */

function dawp_contact_support_email() {
    return 'support@corvelshop.com';
}

function dawp_altcha_url($path = '') {
    return 'https://altcha.corvelshop.com' . $path;
}

/**
 * Verify an ALTCHA payload against the self-hosted server. Fails closed and
 * rejects replays of an already-accepted payload.
 */
function dawp_verify_altcha($payload) {
    if ('' === $payload || strlen($payload) > 4096) {
        return false;
    }

    $replay_key = 'dawp_altcha_' . md5($payload);
    if (get_transient($replay_key)) {
        return false;
    }

    $response = wp_remote_post(dawp_altcha_url('/verify'), [
        'timeout' => 8,
        'headers' => ['Content-Type' => 'application/json'],
        'body'    => wp_json_encode(['payload' => $payload]),
    ]);

    if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
        return false;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    if (empty($data['verified']) || true !== $data['verified']) {
        return false;
    }

    set_transient($replay_key, 1, DAY_IN_SECONDS);
    return true;
}

function dawp_contact_form_redirect($status) {
    $redirect = wp_get_referer();

    if (!$redirect) {
        $redirect = home_url('/contact-us/');
    }

    $redirect = remove_query_arg(['contact_status'], $redirect);
    wp_safe_redirect(add_query_arg('contact_status', $status, $redirect) . '#contact-form');
    exit;
}

function dawp_handle_contact_form() {
    if (
        !isset($_POST['dawp_contact_nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dawp_contact_nonce'])), 'dawp_contact_form')
    ) {
        dawp_contact_form_redirect('invalid');
    }

    $honeypot = isset($_POST['website']) ? trim(sanitize_text_field(wp_unslash($_POST['website']))) : '';
    if ('' !== $honeypot) {
        dawp_contact_form_redirect('sent');
    }

    $altcha = isset($_POST['altcha']) ? trim(wp_unslash($_POST['altcha'])) : '';
    if (!dawp_verify_altcha($altcha)) {
        dawp_contact_form_redirect('captcha');
    }

    $name        = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
    $email       = isset($_POST['contact_email']) ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
    $topic       = isset($_POST['contact_topic']) ? sanitize_text_field(wp_unslash($_POST['contact_topic'])) : '';
    $order       = isset($_POST['contact_order']) ? sanitize_text_field(wp_unslash($_POST['contact_order'])) : '';
    $message     = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';
    $consent     = isset($_POST['contact_consent']);
    $valid_topics = ['Order question', 'Tracking help', 'Return request', 'Warranty claim', 'Product or size question', 'Damaged or incorrect item', 'Other'];

    if (
        '' === $name ||
        '' === $email ||
        !is_email($email) ||
        '' === $message ||
        !$consent ||
        !in_array($topic, $valid_topics, true)
    ) {
        dawp_contact_form_redirect('invalid');
    }

    $subject = sprintf(
        /* translators: %s: contact form topic. */
        __('Corvel contact: %s', 'dawp'),
        $topic
    );

    $body = [
        sprintf('Name: %s', $name),
        sprintf('Email: %s', $email),
        sprintf('Topic: %s', $topic),
        sprintf('Order number: %s', $order ? $order : 'Not provided'),
        '',
        'Message:',
        $message,
    ];

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s <%s>', $name, $email),
    ];

    $sent = wp_mail(dawp_contact_support_email(), $subject, implode("\n", $body), $headers);

    dawp_contact_form_redirect($sent ? 'sent' : 'failed');
}

add_action('admin_post_dawp_contact_form', 'dawp_handle_contact_form');
add_action('admin_post_nopriv_dawp_contact_form', 'dawp_handle_contact_form');

/**
 * Homepage newsletter sign-up: forwards the opt-in to the support inbox.
 */
function dawp_handle_newsletter() {
    $redirect = home_url('/');
    $status   = 'invalid';
    $email    = isset($_POST['newsletter_email']) ? sanitize_email(wp_unslash($_POST['newsletter_email'])) : '';

    if (
        isset($_POST['dawp_newsletter_nonce']) &&
        wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dawp_newsletter_nonce'])), 'dawp_newsletter') &&
        is_email($email)
    ) {
        $sent   = wp_mail(dawp_contact_support_email(), __('Corvel newsletter sign-up', 'dawp'), sprintf('Email: %s', $email));
        $status = $sent ? 'sent' : 'failed';
    }

    wp_safe_redirect(add_query_arg('newsletter', $status, $redirect) . '#cv-newsletter');
    exit;
}

add_action('admin_post_dawp_newsletter', 'dawp_handle_newsletter');
add_action('admin_post_nopriv_dawp_newsletter', 'dawp_handle_newsletter');
