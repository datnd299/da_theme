<?php
/**
 * Contact form handling for Brickygo.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Cloudflare Turnstile keys for the contact form.
 * Override in wp-config.php if the site keys ever change.
 */
if (!defined('DAWP_TURNSTILE_SITE_KEY')) {
    define('DAWP_TURNSTILE_SITE_KEY', '0x4AAAAAAErXDKsmm4x-QEd_');
}
if (!defined('DAWP_TURNSTILE_SECRET_KEY')) {
    define('DAWP_TURNSTILE_SECRET_KEY', '0x4AAAAAAErXDOMpxLICNPAwjOHcalWSXfY');
}

/**
 * Whether Turnstile CAPTCHA is configured.
 */
function dawp_turnstile_enabled() {
    return DAWP_TURNSTILE_SITE_KEY !== '' && DAWP_TURNSTILE_SECRET_KEY !== '';
}

/**
 * Output the Turnstile widget markup inside the contact form.
 */
function dawp_turnstile_widget() {
    if (!dawp_turnstile_enabled()) {
        return;
    }

    printf(
        '<div class="bgs-contact__turnstile cf-turnstile" data-sitekey="%s" data-theme="light"></div>',
        esc_attr(DAWP_TURNSTILE_SITE_KEY)
    );
}

/**
 * Load the Turnstile API script on the contact page only.
 */
add_action('wp_enqueue_scripts', 'dawp_turnstile_enqueue');
function dawp_turnstile_enqueue() {
    if (!dawp_turnstile_enabled() || !function_exists('dawp_current_request_path')) {
        return;
    }

    if ('contact-us' !== dawp_current_request_path()) {
        return;
    }

    wp_enqueue_script('cloudflare-turnstile', 'https://challenges.cloudflare.com/turnstile/v0/api.js', [], null, true);
}

/**
 * Verify a Turnstile token against the Cloudflare siteverify endpoint.
 */
function dawp_turnstile_verify($token) {
    if (!dawp_turnstile_enabled()) {
        return true;
    }

    if ($token === '') {
        return false;
    }

    $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        'timeout' => 10,
        'body'    => [
            'secret'   => DAWP_TURNSTILE_SECRET_KEY,
            'response' => $token,
            'remoteip' => sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? '')),
        ],
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);

    return !empty($body['success']);
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
        echo '<tr><th>' . esc_html($labels[$i]) . '</th><td>' . esc_html($value ?: '—') . '</td></tr>';
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

    $turnstile_token = isset($_POST['cf-turnstile-response']) ? sanitize_text_field(wp_unslash($_POST['cf-turnstile-response'])) : '';
    if (!dawp_turnstile_verify($turnstile_token)) {
        wp_safe_redirect(add_query_arg('contact_status', 'captcha', $redirect_base));
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

    $support_email = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickygo.com';
    $subject       = sprintf('[Brickygo] %s', $topic_label);
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
