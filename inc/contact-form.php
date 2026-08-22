<?php
/**
<<<<<<< HEAD
 * Contact form handling for Chronel Shop.
=======
 * Contact form handling for luxurytheme.
>>>>>>> dcfaa17ffbda8ec1285a68abf9ec66d4f3f93fe1
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'dawp_register_contact_submission_cpt');
function dawp_register_contact_submission_cpt() {
    register_post_type('lbq_contact', [
        'labels'             => [
            'name'               => 'Contact Submissions',
            'singular_name'      => 'Contact Submission',
            'menu_name'          => 'Contact Submissions',
            'all_items'          => 'All Submissions',
            'view_item'          => 'View Submission',
            'search_items'       => 'Search Submissions',
            'not_found'          => 'No submissions found',
            'not_found_in_trash' => 'No submissions in Trash',
        ],
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-email-alt',
        'supports'           => ['title', 'editor'],
        'capability_type'    => 'post',
        'capabilities'       => ['create_posts' => 'do_not_allow'],
        'map_meta_cap'       => true,
    ]);
}

add_filter('post_row_actions', 'dawp_contact_remove_row_actions', 10, 2);
function dawp_contact_remove_row_actions($actions, $post) {
    if ($post->post_type === 'lbq_contact') {
        unset($actions['inline hide-if-no-js'], $actions['trash'], $actions['clone']);
        $actions['trash'] = '<a href="' . get_delete_post_link($post->ID) . '" class="submitdelete">' . __('Delete') . '</a>';
    }
    return $actions;
}

add_action('add_meta_boxes', 'dawp_contact_meta_boxes');
function dawp_contact_meta_boxes() {
    add_meta_box('lbq_contact_details', 'Submission Details', 'dawp_contact_meta_box_cb', 'lbq_contact', 'normal', 'high');
}
function dawp_contact_meta_box_cb($post) {
    $fields = ['_contact_email', '_contact_topic', '_contact_order', '_contact_ip'];
    $labels = ['Email', 'Topic', 'Order Number', 'IP Address'];
    echo '<table class="form-table"><tbody>';
    foreach ($fields as $i => $key) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr><th>' . esc_html($labels[$i]) . '</th><td>' . esc_html($value ?: 'â€”') . '</td></tr>';
    }
    echo '</tbody></table>';
}

add_action('admin_post_nopriv_lbq_contact_form', 'dawp_handle_contact_form');
add_action('admin_post_lbq_contact_form', 'dawp_handle_contact_form');

function dawp_handle_contact_form() {
    $redirect_base = home_url('/contact-us/');
    $referer       = wp_get_referer();

    if ($referer && strpos($referer, home_url()) === 0) {
        $redirect_base = remove_query_arg('contact_status', $referer);
    }

    $nonce = isset($_POST['lbq_contact_nonce']) ? sanitize_text_field(wp_unslash($_POST['lbq_contact_nonce'])) : '';

    if (!$nonce || !wp_verify_nonce($nonce, 'lbq_contact_form')) {
        wp_safe_redirect(add_query_arg('contact_status', 'error', $redirect_base));
        exit;
    }

    $honeypot = isset($_POST['company_website']) ? trim((string) wp_unslash($_POST['company_website'])) : '';
    if ($honeypot !== '') {
        wp_safe_redirect(add_query_arg('contact_status', 'success', $redirect_base));
        exit;
    }

    $topics = [
        'order'   => 'Order or tracking question',
        'return'  => 'Return or refund request',
        'product' => 'Product question',
        'privacy' => 'Privacy request',
        'other'   => 'General support',
    ];

    $name         = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
    $email        = isset($_POST['contact_email']) ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
    $topic_key    = isset($_POST['contact_topic']) ? sanitize_key(wp_unslash($_POST['contact_topic'])) : 'other';
    $order_number = isset($_POST['order_number']) ? sanitize_text_field(wp_unslash($_POST['order_number'])) : '';
    $message      = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';

    if ($name === '' || !is_email($email) || $message === '') {
        wp_safe_redirect(add_query_arg('contact_status', 'error', $redirect_base));
        exit;
    }

    if (!isset($topics[$topic_key])) {
        $topic_key = 'other';
    }

    $topic_label = $topics[$topic_key];

    $post_id = wp_insert_post([
        'post_type'    => 'lbq_contact',
        'post_status'  => 'publish',
        'post_title'   => sprintf('[%s] %s <%s>', $topic_label, $name, $email),
        'post_content' => $message,
        'post_date'    => current_time('mysql'),
    ]);

    if ($post_id && !is_wp_error($post_id)) {
        update_post_meta($post_id, '_contact_email', $email);
        update_post_meta($post_id, '_contact_topic', $topic_label);
        update_post_meta($post_id, '_contact_order', $order_number);
        update_post_meta($post_id, '_contact_ip', sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? '')));
    }

<<<<<<< HEAD
    $support_email = 'support@chronelshop.com';
    $subject       = sprintf('[Chronel Shop] %s', $topic_label);
=======
    $support_email = 'support@luxurytheme.com';
    $subject       = sprintf('[luxurytheme] %s', $topic_label);
>>>>>>> dcfaa17ffbda8ec1285a68abf9ec66d4f3f93fe1
    $body          = sprintf(
        "New contact form submission.\n\nName: %s\nEmail: %s\nTopic: %s\nOrder number: %s\n\nMessage:\n%s",
        $name,
        $email,
        $topic_label,
        $order_number !== '' ? $order_number : 'Not provided',
        $message
    );

    wp_mail($support_email, $subject, $body, [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s <%s>', $name, $email),
    ]);

    wp_safe_redirect(add_query_arg('contact_status', 'success', $redirect_base));
    exit;
}
