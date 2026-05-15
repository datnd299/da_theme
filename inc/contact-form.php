<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_dawp_contact',        'dawp_handle_contact_form');
add_action('wp_ajax_nopriv_dawp_contact', 'dawp_handle_contact_form');

function dawp_handle_contact_form() {
    if (!check_ajax_referer('dawp_contact_nonce', 'nonce', false)) {
        wp_send_json_error(['message' => __('Security check failed. Please refresh the page and try again.', 'dawp')]);
    }

    $name    = sanitize_text_field(wp_unslash($_POST['contact_name']    ?? ''));
    $email   = sanitize_email(wp_unslash($_POST['contact_email']   ?? ''));
    $subject = sanitize_text_field(wp_unslash($_POST['contact_subject'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['contact_message'] ?? ''));

    if (!$name || !$email || !$subject || !$message) {
        wp_send_json_error(['message' => __('Please fill in all required fields.', 'dawp')]);
    }

    if (!is_email($email)) {
        wp_send_json_error(['message' => __('Please enter a valid email address.', 'dawp')]);
    }

    if (strlen($message) < 10) {
        wp_send_json_error(['message' => __('Your message is too short. Please provide more detail.', 'dawp')]);
    }

    $to      = 'support@mybaapstore.com';
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    $body = sprintf(
        "Name: %s\nEmail: %s\nSubject: %s\n\nMessage:\n%s",
        $name,
        $email,
        $subject,
        $message
    );

    $sent = wp_mail($to, '[MyBaapStore] ' . $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['message' => __('Your message has been sent. Our team will respond within 24 hours.', 'dawp')]);
    } else {
        wp_send_json_error(['message' => __('There was a problem sending your message. Please email us directly at support@mybaapstore.com.', 'dawp')]);
    }
}
