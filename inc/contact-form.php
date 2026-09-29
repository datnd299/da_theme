<?php
/**
 * Contact form handling.
 *
 * @package dawp
 */

function dawp_contact_support_email() {
    return 'support@orveltime.com';
}

function dawp_altcha_base_url() {
    return 'https://altcha.orveltime.com';
}

function dawp_altcha_verify($payload) {
    if ('' === $payload) {
        return false;
    }

    $response = wp_remote_post(dawp_altcha_base_url() . '/verify', [
        'timeout' => 10,
        'headers' => ['Content-Type' => 'application/json'],
        'body'    => wp_json_encode(['payload' => $payload]),
    ]);

    if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
        return false;
    }

    $result = json_decode(wp_remote_retrieve_body($response), true);

    return is_array($result) && !empty($result['verified']);
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

    $altcha = isset($_POST['altcha']) ? sanitize_text_field(wp_unslash($_POST['altcha'])) : '';
    if (!dawp_altcha_verify($altcha)) {
        dawp_contact_form_redirect('captcha');
    }

    $name       = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
    $email       = isset($_POST['contact_email']) ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
    $topic       = isset($_POST['contact_topic']) ? sanitize_text_field(wp_unslash($_POST['contact_topic'])) : '';
    $order       = isset($_POST['contact_order']) ? sanitize_text_field(wp_unslash($_POST['contact_order'])) : '';
    $message     = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';
    $consent     = isset($_POST['contact_consent']);
    $valid_topics = ['Order question', 'Tracking help', 'Return request', 'Product or size question', 'Damaged or incorrect item', 'Other'];

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
        __('Orvel contact: %s', 'dawp'),
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
