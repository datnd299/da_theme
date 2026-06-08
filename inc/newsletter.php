<?php

add_action('admin_post_dawp_newsletter_signup', 'dawp_handle_newsletter_signup');
add_action('admin_post_nopriv_dawp_newsletter_signup', 'dawp_handle_newsletter_signup');

function dawp_handle_newsletter_signup() {
    $redirect_url = wp_get_referer() ? wp_get_referer() : home_url('/');

    if (
        ! isset($_POST['dawp_newsletter_nonce']) ||
        ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dawp_newsletter_nonce'])), 'dawp_newsletter_signup')
    ) {
        wp_safe_redirect(add_query_arg('newsletter', 'invalid', $redirect_url));
        exit;
    }

    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';

    if (! is_email($email)) {
        wp_safe_redirect(add_query_arg('newsletter', 'invalid_email', $redirect_url));
        exit;
    }

    $site_name = wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES);
    $to        = get_option('admin_email');
    $subject   = sprintf(__('[%s] New newsletter signup', 'dawp'), $site_name);
    $message   = sprintf(
        __("A visitor signed up for new drop updates.\n\nEmail: %s", 'dawp'),
        $email
    );

    $sent = wp_mail($to, $subject, $message);
    $status = $sent ? 'success' : 'failed';

    wp_safe_redirect(add_query_arg('newsletter', $status, $redirect_url));
    exit;
}
