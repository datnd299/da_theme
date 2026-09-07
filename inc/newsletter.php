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

// Contact form handler lives in inc/contact-form.php (adds Turnstile CAPTCHA).
