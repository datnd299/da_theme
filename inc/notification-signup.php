<?php
/**
 * Homepage notification signup handling.
 *
 * @package dawp
 */

add_action('admin_post_dawp_notification_signup', 'dawp_handle_notification_signup');
add_action('admin_post_nopriv_dawp_notification_signup', 'dawp_handle_notification_signup');

function dawp_handle_notification_signup() {
    $redirect_url = wp_get_referer() ?: home_url('/');
    $redirect_url = remove_query_arg('notify_signup', $redirect_url);
    $redirect_url = strtok($redirect_url, '#');

    $nonce = isset($_POST['dawp_notify_nonce']) ? sanitize_text_field(wp_unslash($_POST['dawp_notify_nonce'])) : '';
    if (!wp_verify_nonce($nonce, 'dawp_notification_signup')) {
        wp_safe_redirect(add_query_arg('notify_signup', 'error', $redirect_url) . '#notify-signup');
        exit;
    }

    $honeypot = isset($_POST['website']) ? trim(sanitize_text_field(wp_unslash($_POST['website']))) : '';
    if ('' !== $honeypot) {
        wp_safe_redirect(add_query_arg('notify_signup', 'success', $redirect_url) . '#notify-signup');
        exit;
    }

    $email = isset($_POST['notify_email']) ? sanitize_email(wp_unslash($_POST['notify_email'])) : '';
    if (!is_email($email)) {
        wp_safe_redirect(add_query_arg('notify_signup', 'invalid', $redirect_url) . '#notify-signup');
        exit;
    }

    $email       = strtolower($email);
    $subscribers = get_option('dawp_notification_subscribers', []);

    if (!is_array($subscribers)) {
        $subscribers = [];
    }

    $subscriber_emails = array_column($subscribers, 'email');
    if (!in_array($email, $subscriber_emails, true)) {
        $subscribers[] = [
            'email'      => $email,
            'created_at' => current_time('mysql'),
        ];

        update_option('dawp_notification_subscribers', $subscribers, false);
    }

    $support_email = 'support@meridova.net';
    $site_name     = wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES);
    $subject       = sprintf(__('New notification signup on %s', 'dawp'), $site_name);
    $message       = sprintf(
        "A customer asked to receive store notifications.\n\nEmail: %s\nPage: %s\nSubmitted: %s",
        $email,
        $redirect_url,
        current_time('mysql')
    );
    $headers       = ['Reply-To: ' . $email];

    wp_mail($support_email, $subject, $message, $headers);

    wp_safe_redirect(add_query_arg('notify_signup', 'success', $redirect_url) . '#notify-signup');
    exit;
}
