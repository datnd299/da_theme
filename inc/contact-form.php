<?php
add_action('admin_post_dawp_contact_submit', 'dawp_handle_contact_form');
add_action('admin_post_nopriv_dawp_contact_submit', 'dawp_handle_contact_form');

function dawp_handle_contact_form() {
    $redirect_url = wp_get_referer() ?: home_url('/contact-us/');

    if (
        ! isset($_POST['dawp_contact_nonce']) ||
        ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dawp_contact_nonce'])), 'dawp_contact_submit')
    ) {
        dawp_contact_redirect($redirect_url, 'invalid');
    }

    $honeypot = isset($_POST['website']) ? trim((string) wp_unslash($_POST['website'])) : '';
    if ($honeypot !== '') {
        dawp_contact_redirect($redirect_url, 'sent');
    }

    $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field(wp_unslash($_POST['subject'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if ($name === '' || $email === '' || $message === '' || ! is_email($email)) {
        dawp_contact_redirect($redirect_url, 'invalid');
    }

    $to = 'support@rubyinstar.com';
    $site_name = wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES);
    $mail_subject = $subject !== ''
        ? sprintf('[%s] %s', $site_name, $subject)
        : sprintf('[%s] New contact form message', $site_name);

    $mail_body = sprintf(
        "Name: %s\nEmail: %s\nSubject: %s\n\nMessage:\n%s\n",
        $name,
        $email,
        $subject !== '' ? $subject : 'N/A',
        $message
    );

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s <%s>', $name, $email),
    ];

    $sent = wp_mail($to, $mail_subject, $mail_body, $headers);

    dawp_contact_redirect($redirect_url, $sent ? 'sent' : 'failed');
}

function dawp_contact_redirect($redirect_url, $status) {
    $redirect_url = remove_query_arg('contact_status', $redirect_url);
    wp_safe_redirect(add_query_arg('contact_status', $status, $redirect_url));
    exit;
}
