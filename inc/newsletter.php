<?php
/**
 * AJAX handlers for the newsletter signup and the contact / bespoke enquiry form.
 */

defined('ABSPATH') || exit;

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

    $site_name = get_bloginfo('name') ?: dawp_brand('name');
    $subject   = 'Welcome to ' . $site_name;
    $message   = "Thank you for joining the {$site_name} register.\n\n"
        . "You will hear from us when a new reference leaves the atelier, when a limited series opens, and when we have something worth your attention. Nothing more often than that.\n\n"
        . "The {$site_name} Atelier";

    $sent = wp_mail($email, $subject, $message, ['Content-Type: text/plain; charset=UTF-8']);

    if ($sent) {
        wp_send_json_success(['message' => 'Thank you. Your confirmation is on its way.']);
    }

    wp_send_json_error(['message' => 'Something went wrong. Please try again later.']);
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

    // Optional fields, only present on the bespoke enquiry form.
    $collection = sanitize_text_field(wp_unslash($_POST['collection'] ?? ''));
    $budget     = sanitize_text_field(wp_unslash($_POST['budget'] ?? ''));

    if (empty($name) || !is_email($email) || empty($message)) {
        wp_send_json_error(['message' => 'Please complete every required field.']);
    }

    $site_name   = get_bloginfo('name') ?: dawp_brand('name');
    $admin_email = get_option('admin_email');

    $subject_labels = [
        'general'  => 'General Enquiry',
        'bespoke'  => 'Bespoke Commission',
        'order'    => 'Order Support',
        'service'  => 'Service & Warranty',
        'shipping' => 'Delivery',
        'return'   => 'Returns',
        'press'    => 'Press',
        'other'    => 'Other',
    ];
    $subject_label = $subject_labels[$subject] ?? 'General Enquiry';

    $admin_body = "Name: {$name}\nEmail: {$email}\nSubject: {$subject_label}\n";

    if ($collection !== '') {
        $admin_body .= "Collection of interest: {$collection}\n";
    }
    if ($budget !== '') {
        $admin_body .= "Indicative budget: {$budget}\n";
    }

    $admin_body .= "\n{$message}";

    wp_mail(
        $admin_email,
        '[' . $site_name . '] ' . $subject_label . ' — ' . $name,
        $admin_body,
        ['Reply-To: ' . $name . ' <' . $email . '>']
    );

    $is_bespoke   = ($subject === 'bespoke');
    $confirm_body = "Dear {$name},\n\n"
        . ($is_bespoke
            ? "Thank you for your interest in a bespoke commission. An atelier specialist will reply within two business days with a proposal and a quotation. Nothing is charged until the specification is agreed.\n\n"
            : "Thank you for writing to us. Client care will reply within one business day.\n\n")
        . "Client care is open Monday to Friday, 9:00 AM to 6:00 PM PST.\n\n"
        . "The {$site_name} Atelier";

    wp_mail(
        $email,
        ($is_bespoke ? 'Your commission enquiry — ' : 'We received your message — ') . $site_name,
        $confirm_body,
        ['Content-Type: text/plain; charset=UTF-8']
    );

    wp_send_json_success([
        'message' => $is_bespoke
            ? 'Thank you. An atelier specialist will reply within two business days.'
            : 'Thank you. Client care will reply within one business day.',
    ]);
}
