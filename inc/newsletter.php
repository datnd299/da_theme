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
    $message   = "Hi there,\n\nThank you for joining our boutique community! We're so glad to have you.\n\nYou'll be the first to know about new arrivals, seasonal collections, and warm family-friendly style inspiration.\n\nWith love,\nThe " . $site_name . " Team";
    $headers   = ['Content-Type: text/plain; charset=UTF-8'];

    $sent = wp_mail($email, $subject, $message, $headers);

    if ($sent) {
        wp_send_json_success(['message' => 'Thank you for joining us! A warm welcome is on its way to your inbox.']);
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
        'general' => 'General Inquiry',
        'order'   => 'Order Status',
        'styling' => 'Styling Help',
        'return'  => 'Returns & Refunds',
    ];
    $subject_label = $subject_labels[$subject] ?? 'General Inquiry';

    $admin_subject = '[' . $site_name . '] Contact: ' . $subject_label . ' from ' . $name;
    $admin_body    = "Name: {$name}\nEmail: {$email}\nSubject: {$subject_label}\n\n{$message}";
    wp_mail($admin_email, $admin_subject, $admin_body, ['Reply-To: ' . $name . ' <' . $email . '>']);

    $confirm_subject = 'We received your message – ' . $site_name;
    $confirm_body    = "Hi {$name},\n\nThank you for reaching out! We've received your message and our boutique team will get back to you within 24 business hours.\n\nWith love,\nThe {$site_name} Team";
    wp_mail($email, $confirm_subject, $confirm_body, ['Content-Type: text/plain; charset=UTF-8']);

    wp_send_json_success(['message' => 'Thank you, ' . $name . '! Your message has been sent. We\'ll get back to you within 24 hours.']);
}
