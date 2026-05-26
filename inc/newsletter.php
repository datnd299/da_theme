<?php
add_action('wp_ajax_nopriv_dawp_newsletter', 'dawp_newsletter_subscribe');
add_action('wp_ajax_dawp_newsletter', 'dawp_newsletter_subscribe');

function dawp_newsletter_subscribe() {
    if (!check_ajax_referer('dawp_newsletter_nonce', 'nonce', false)) {
        wp_send_json_error(['message' => 'Invalid request.']);
    }

    $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Please enter a valid email address.']);
    }

    $site_name = get_bloginfo('name');
    $subject   = 'Thank you for joining ' . $site_name . '!';
    $message   = "Hi there,\n\nThank you for joining Broge Shoes. You will be the first to know about new formal footwear arrivals, store updates, and customer support information.\n\nThe " . $site_name . " Team";
    $headers   = ['Content-Type: text/plain; charset=UTF-8'];

    $sent = wp_mail($email, $subject, $message, $headers);

    if ($sent) {
        wp_send_json_success(['message' => 'Thank you for joining us. A welcome email is on its way.']);
    } else {
        wp_send_json_error(['message' => 'Something went wrong. Please try again later.']);
    }
}

add_action('wp_ajax_nopriv_dawp_contact', 'dawp_contact_submit');
add_action('wp_ajax_dawp_contact', 'dawp_contact_submit');

function dawp_contact_submit() {
    if (!check_ajax_referer('dawp_contact_nonce', 'nonce', false)) {
        wp_send_json_error(['message' => 'Invalid request.']);
    }

    $honeypot        = sanitize_text_field(wp_unslash($_POST['website'] ?? ''));
    $privacy_confirm = sanitize_text_field(wp_unslash($_POST['privacy_confirm'] ?? ''));
    $name            = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $email           = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $subject         = sanitize_key(wp_unslash($_POST['subject'] ?? 'general'));
    $order_number    = sanitize_text_field(wp_unslash($_POST['order_number'] ?? ''));
    $message         = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    if ($honeypot !== '') {
        wp_send_json_success(['message' => 'Thank you. Your message has been received.']);
    }

    if (empty($name) || !is_email($email) || empty($message)) {
        wp_send_json_error(['message' => 'Please enter your name, a valid email address, and a message.']);
    }

    if ($privacy_confirm !== '1') {
        wp_send_json_error(['message' => 'Please confirm the privacy notice before sending your message.']);
    }

    $site_name   = get_bloginfo('name');
    $admin_email = get_option('admin_email');

    $subject_labels = [
        'general' => 'General Question',
        'order'   => 'Order or Tracking',
        'sizing'  => 'Sizing or Product Help',
        'return'  => 'Return or Refund',
        'privacy' => 'Privacy Request',
    ];
    $subject_label = $subject_labels[$subject] ?? 'General Question';

    $admin_subject = '[' . $site_name . '] Contact: ' . $subject_label . ' from ' . $name;
    $admin_body    = "Name: {$name}\nEmail: {$email}\nTopic: {$subject_label}\nOrder Number: " . ($order_number ?: 'Not provided') . "\n\nMessage:\n{$message}";
    $admin_headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    $sent_admin = wp_mail($admin_email, $admin_subject, $admin_body, $admin_headers);

    if (!$sent_admin) {
        wp_send_json_error(['message' => 'We could not send your message right now. Please email support@brogeshoes.com directly.']);
    }

    $confirm_subject = 'We received your message - ' . $site_name;
    $confirm_body    = "Hi {$name},\n\nThank you for contacting Broge Shoes. We received your message and our support team will reply during our Monday-Friday, 9:00 AM-5:00 PM PST business hours.\n\nTopic: {$subject_label}\nOrder Number: " . ($order_number ?: 'Not provided') . "\n\nFor urgent updates, you can also email support@brogeshoes.com.\n\nThe {$site_name} Team";
    wp_mail($email, $confirm_subject, $confirm_body, ['Content-Type: text/plain; charset=UTF-8']);

    wp_send_json_success(['message' => 'Thank you, ' . $name . '. Your message has been sent. We will reply during our Monday-Friday, 9:00 AM-5:00 PM PST business hours.']);
}
