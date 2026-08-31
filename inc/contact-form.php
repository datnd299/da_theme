<?php
/**
 * Contact form handling.
 *
 * @package dawp
 */

function dawp_contact_support_email() {
    return 'support@zorexcraft.com';
}

function dawp_contact_mail_from() {
    return dawp_contact_support_email();
}

function dawp_contact_mail_from_name() {
    return 'Zorex Craft';
}

add_filter('wp_mail_from', 'dawp_contact_mail_from');
add_filter('wp_mail_from_name', 'dawp_contact_mail_from_name');

function dawp_contact_mailto_url($subject = '', $body = '') {
    $email = sanitize_email(dawp_contact_support_email());

    if (!$email) {
        $email = 'support@zorexcraft.com';
    }

    $query = [];

    if ('' !== $subject) {
        $query['subject'] = wp_strip_all_tags($subject);
    }

    if ('' !== $body) {
        $query['body'] = wp_strip_all_tags($body);
    }

    return 'mailto:' . $email . ($query ? '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986) : '');
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

    $name        = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
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
        __('Zorex Craft contact: %s', 'dawp'),
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
