<?php
add_action( 'wp_ajax_da_contact_form', 'da_handle_contact_form' );
add_action( 'wp_ajax_nopriv_da_contact_form', 'da_handle_contact_form' );

function da_handle_contact_form() {
    if ( ! check_ajax_referer( 'da_contact_nonce', 'nonce', false ) ) {
        wp_send_json_error( 'Security check failed.' );
    }

    $first_name   = sanitize_text_field( $_POST['first_name'] ?? '' );
    $last_name    = sanitize_text_field( $_POST['last_name'] ?? '' );
    $email        = sanitize_email( $_POST['email'] ?? '' );
    $order_number = sanitize_text_field( $_POST['order_number'] ?? '' );
    $message      = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $first_name || ! $last_name || ! is_email( $email ) || ! $message ) {
        wp_send_json_error( 'Please fill in all required fields.' );
    }

    $to      = get_option( 'admin_email' );
    $subject = 'New Contact Message from ' . $first_name . ' ' . $last_name;
    $body    = "Name: {$first_name} {$last_name}\n"
             . "Email: {$email}\n"
             . ( $order_number ? "Order #: {$order_number}\n" : '' )
             . "\nMessage:\n{$message}";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>',
    ];

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( 'Your message has been sent. We\'ll reply within 24–48 business hours.' );
    } else {
        wp_send_json_error( 'Failed to send message. Please email us directly.' );
    }
}
