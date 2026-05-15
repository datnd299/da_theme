<?php
/**
 * Contact form handling for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_post_nopriv_lbq_contact_form', 'dawp_handle_contact_form');
add_action('admin_post_lbq_contact_form', 'dawp_handle_contact_form');

/**
 * Validate and email contact form submissions.
 */
function dawp_handle_contact_form() {
    $redirect_url = wp_get_referer() ?: home_url('/contact-us/');
    $redirect_url = remove_query_arg('contact_status', $redirect_url);

    $nonce = isset($_POST['lbq_contact_nonce']) ? sanitize_text_field(wp_unslash($_POST['lbq_contact_nonce'])) : '';

    if (!$nonce || !wp_verify_nonce($nonce, 'lbq_contact_form')) {
        wp_safe_redirect(add_query_arg('contact_status', 'error', $redirect_url));
        exit;
    }

    $honeypot = isset($_POST['company_website']) ? trim((string) wp_unslash($_POST['company_website'])) : '';

    if ($honeypot !== '') {
        wp_safe_redirect(add_query_arg('contact_status', 'success', $redirect_url));
        exit;
    }

    $topics = [
        'order'   => __('Order or tracking question', 'dawp'),
        'return'  => __('Return or refund request', 'dawp'),
        'product' => __('Product question', 'dawp'),
        'privacy' => __('Privacy request', 'dawp'),
        'other'   => __('General support', 'dawp'),
    ];

    $name         = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
    $email        = isset($_POST['contact_email']) ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
    $topic_key    = isset($_POST['contact_topic']) ? sanitize_key(wp_unslash($_POST['contact_topic'])) : 'other';
    $order_number = isset($_POST['order_number']) ? sanitize_text_field(wp_unslash($_POST['order_number'])) : '';
    $message      = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';

    if ($name === '' || !is_email($email) || $message === '') {
        wp_safe_redirect(add_query_arg('contact_status', 'error', $redirect_url));
        exit;
    }

    if (!isset($topics[$topic_key])) {
        $topic_key = 'other';
    }

    $support_email = 'support@lbqshop.com';
    $subject       = sprintf('[LBQ Shop] %s', $topics[$topic_key]);
    $body          = sprintf(
        "New contact form submission from LBQ Shop.\n\nName: %s\nEmail: %s\nTopic: %s\nOrder number: %s\n\nMessage:\n%s\n\nSubmitted from: %s",
        $name,
        $email,
        $topics[$topic_key],
        $order_number !== '' ? $order_number : 'Not provided',
        $message,
        home_url('/contact-us/')
    );
    $headers       = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s', $email),
    ];

    $sent = wp_mail($support_email, $subject, $body, $headers);

    wp_safe_redirect(add_query_arg('contact_status', $sent ? 'success' : 'error', $redirect_url));
    exit;
}
