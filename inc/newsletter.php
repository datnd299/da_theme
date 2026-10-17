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

    $site_name = dawp_store_fact('brand');
    $subject   = 'Thank you for joining ' . $site_name . '!';
    $message   = "Hi there,\n\nThanks for joining the MozTire list.\n\nYou'll get tire-season reminders, new brand arrivals, and member-only offers. No spam, unsubscribe anytime.\n\nDrive safe,\nThe " . $site_name . " Team";
    $headers   = ['Content-Type: text/plain; charset=UTF-8'];

    $sent = wp_mail($email, $subject, $message, $headers);

    if ($sent) {
        wp_send_json_success(['message' => "You're on the list. Check your inbox for a welcome email."]);
    } else {
        wp_send_json_error(['message' => 'Something went wrong. Please try again later.']);
    }
}

// Contact submissions are stored in wp-admin so no message is lost if mail delivery fails.
add_action('init', 'dawp_register_contact_submission_cpt');
function dawp_register_contact_submission_cpt() {
    register_post_type('dawp_contact', [
        'labels'          => [
            'name'          => 'Contact Submissions',
            'singular_name' => 'Contact Submission',
            'menu_name'     => 'Contact Submissions',
            'all_items'     => 'All Submissions',
            'not_found'     => 'No submissions found',
        ],
        'public'          => false,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'menu_position'   => 25,
        'menu_icon'       => 'dashicons-email-alt',
        'supports'        => ['title', 'editor'],
        'capability_type' => 'post',
        'capabilities'    => ['create_posts' => 'do_not_allow'],
        'map_meta_cap'    => true,
    ]);
}

add_action('add_meta_boxes', 'dawp_contact_meta_boxes');
function dawp_contact_meta_boxes() {
    add_meta_box('dawp_contact_details', 'Submission Details', 'dawp_contact_meta_box_cb', 'dawp_contact', 'normal', 'high');
}

function dawp_contact_meta_box_cb($post) {
    $fields = ['_contact_email' => 'Email', '_contact_topic' => 'Topic', '_contact_mail_sent' => 'Email delivered', '_contact_ip' => 'IP Address'];
    echo '<table class="form-table"><tbody>';
    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr><th>' . esc_html($label) . '</th><td>' . esc_html($value !== '' ? $value : '—') . '</td></tr>';
    }
    echo '</tbody></table>';
}

function dawp_altcha_base_url() {
    return 'https://altcha.moztire.com';
}

// Fails closed: an empty payload, network error or non-200 response all count as unverified.
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

add_action('wp_ajax_nopriv_dawp_contact', 'dawp_contact_submit');
add_action('wp_ajax_dawp_contact', 'dawp_contact_submit');

function dawp_contact_submit() {
    if (!check_ajax_referer('dawp_contact_nonce', 'nonce', false)) {
        wp_send_json_error(['message' => 'Your session expired. Please refresh the page and try again.']);
    }

    // Honeypot: bots fill the hidden field; pretend success so they don't retry.
    if (trim((string) wp_unslash($_POST['company_website'] ?? '')) !== '') {
        wp_send_json_success(['message' => 'Thank you! Your message has been sent.']);
    }

    $name    = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $email   = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $subject = sanitize_text_field(wp_unslash($_POST['subject'] ?? 'general'));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    if (empty($name) || !is_email($email) || empty($message)) {
        wp_send_json_error(['message' => 'Please fill in all required fields.']);
    }

    $altcha = sanitize_text_field(wp_unslash($_POST['altcha'] ?? ''));
    if (!dawp_altcha_verify($altcha)) {
        wp_send_json_error(['message' => 'Please complete the "I\'m not a robot" check and try again.', 'captcha' => true]);
    }

    $site_name     = dawp_store_fact('brand');
    $support_email = dawp_store_fact('email');

    $subject_labels = [
        'general'  => 'General Inquiry',
        'order'    => 'Order Support',
        'product'  => 'Product Question',
        'fitment'  => 'Tire Size / Fitment Help',
        'shipping' => 'Shipping Question',
        'return'   => 'Returns & Refunds',
        'other'    => 'Other',
    ];
    $subject_label = $subject_labels[$subject] ?? 'General Inquiry';

    $admin_subject = '[' . $site_name . '] Contact: ' . $subject_label . ' from ' . $name;
    $admin_body    = "Name: {$name}\nEmail: {$email}\nSubject: {$subject_label}\n\n{$message}";
    $mail_sent     = wp_mail($support_email, $admin_subject, $admin_body, [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ]);

    $post_id = wp_insert_post([
        'post_type'    => 'dawp_contact',
        'post_status'  => 'publish',
        'post_title'   => sprintf('[%s] %s (%s)', $subject_label, $name, $email),
        'post_content' => $message,
    ]);

    if (!$post_id || is_wp_error($post_id)) {
        if (!$mail_sent) {
            wp_send_json_error(['message' => 'We could not send your message right now. Please email us at ' . $support_email . '.']);
        }
    } else {
        update_post_meta($post_id, '_contact_email', $email);
        update_post_meta($post_id, '_contact_topic', $subject_label);
        update_post_meta($post_id, '_contact_mail_sent', $mail_sent ? 'Yes' : 'No');
        update_post_meta($post_id, '_contact_ip', sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? '')));
    }

    $confirm_subject = 'We received your message – ' . $site_name;
    $confirm_body    = "Hi {$name},\n\nThank you for reaching out! We've received your message and our tire support team will reply within 1 business day.\n\nDrive safe,\nThe {$site_name} Team";
    wp_mail($email, $confirm_subject, $confirm_body, ['Content-Type: text/plain; charset=UTF-8']);

    wp_send_json_success(['message' => 'Thank you, ' . $name . '! Your message has been sent. We\'ll reply within 1 business day.']);
}
