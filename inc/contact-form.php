<?php
/**
 * Contact form handling.
 *
 * @package dawp
 */

add_action('wp_ajax_dawp_contact_form', 'dawp_handle_contact_form');
add_action('wp_ajax_nopriv_dawp_contact_form', 'dawp_handle_contact_form');

function dawp_handle_contact_form() {
    if (
        ! isset($_POST['nonce']) ||
        ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'dawp_contact_form')
    ) {
        wp_send_json_error(
            ['message' => __('Your session expired. Please refresh the page and try again.', 'dawp')],
            403
        );
    }

    $honeypot = isset($_POST['company']) ? trim((string) wp_unslash($_POST['company'])) : '';

    if ('' !== $honeypot) {
        wp_send_json_error(
            ['message' => __('We could not send your message. Please try again.', 'dawp')],
            400
        );
    }

    $name     = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email    = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone    = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $order_id = isset($_POST['order_id']) ? sanitize_text_field(wp_unslash($_POST['order_id'])) : '';
    $topic    = isset($_POST['topic']) ? sanitize_text_field(wp_unslash($_POST['topic'])) : '';
    $message  = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if ('' === $name || '' === $email || '' === $message) {
        wp_send_json_error(
            ['message' => __('Please fill in your name, email, and message.', 'dawp')],
            422
        );
    }

    if (! is_email($email)) {
        wp_send_json_error(
            ['message' => __('Please enter a valid email address.', 'dawp')],
            422
        );
    }

    $recipient = apply_filters('dawp_contact_form_recipient', 'support@houseofshoesonline.com');
    $subject   = sprintf(
        /* translators: %s: customer name */
        __('New contact message from %s', 'dawp'),
        $name
    );

    $body_lines = [
        sprintf(__('Name: %s', 'dawp'), $name),
        sprintf(__('Email: %s', 'dawp'), $email),
    ];

    if ('' !== $phone) {
        $body_lines[] = sprintf(__('Phone: %s', 'dawp'), $phone);
    }

    if ('' !== $order_id) {
        $body_lines[] = sprintf(__('Order Number: %s', 'dawp'), $order_id);
    }

    if ('' !== $topic) {
        $body_lines[] = sprintf(__('Topic: %s', 'dawp'), $topic);
    }

    $body_lines[] = '';
    $body_lines[] = __('Message:', 'dawp');
    $body_lines[] = $message;

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s <%s>', $name, $email),
    ];

    $sent = wp_mail($recipient, $subject, implode("\n", $body_lines), $headers);

    if (! $sent) {
        wp_send_json_error(
            ['message' => __('We could not send your message right now. Please email support@houseofshoesonline.com directly.', 'dawp')],
            500
        );
    }

    wp_send_json_success(
        ['message' => __('Thanks, your message has been sent. Our support team will reply as soon as possible.', 'dawp')]
    );
}
