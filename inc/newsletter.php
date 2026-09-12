<?php
/**
 * Newsletter signup handling.
 *
 * @package dawp
 */

function dawp_newsletter_redirect($status) {
    $redirect = wp_get_referer();

    if (!$redirect) {
        $redirect = home_url('/');
    }

    $redirect = remove_query_arg(['newsletter_status'], $redirect);
    wp_safe_redirect(add_query_arg('newsletter_status', $status, $redirect) . '#ot-newsletter-email');
    exit;
}

function dawp_handle_newsletter_signup() {
    if (
        !isset($_POST['dawp_newsletter_nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dawp_newsletter_nonce'])), 'dawp_newsletter_signup')
    ) {
        dawp_newsletter_redirect('invalid');
    }

    $honeypot = isset($_POST['newsletter_website']) ? trim(sanitize_text_field(wp_unslash($_POST['newsletter_website']))) : '';
    if ('' !== $honeypot) {
        dawp_newsletter_redirect('subscribed');
    }

    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';

    if ('' === $email || !is_email($email)) {
        dawp_newsletter_redirect('invalid');
    }

    $brand_name = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Orvel';

    $subject = sprintf(
        /* translators: %s: brand name. */
        __('%s newsletter signup', 'dawp'),
        $brand_name
    );

    $body = sprintf("New newsletter signup:\n%s", $email);

    $headers = ['Content-Type: text/plain; charset=UTF-8'];
    if (function_exists('dawp_contact_support_email')) {
        $headers[] = sprintf('Reply-To: %s', $email);
    }

    $sent = wp_mail(
        function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : get_option('admin_email'),
        $subject,
        $body,
        $headers
    );

    dawp_newsletter_redirect($sent ? 'subscribed' : 'failed');
}

add_action('admin_post_dawp_newsletter_signup', 'dawp_handle_newsletter_signup');
add_action('admin_post_nopriv_dawp_newsletter_signup', 'dawp_handle_newsletter_signup');
