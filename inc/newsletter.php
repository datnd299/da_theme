<?php
/**
 * Newsletter sign-up handling for Reluxwatches.
 *
 * Lightweight: stores each address as a `dawp_subscriber` post so the list is
 * visible in wp-admin. No third-party provider is called.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'dawp_register_subscriber_cpt');
function dawp_register_subscriber_cpt() {
    register_post_type('dawp_subscriber', [
        'labels'          => [
            'name'          => 'Newsletter',
            'singular_name' => 'Subscriber',
            'menu_name'     => 'Newsletter',
            'all_items'     => 'Subscribers',
            'search_items'  => 'Search Subscribers',
            'not_found'     => 'No subscribers yet',
        ],
        'public'          => false,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'menu_position'   => 26,
        'menu_icon'       => 'dashicons-email',
        'supports'        => ['title'],
        'capability_type' => 'post',
        'capabilities'    => ['create_posts' => 'do_not_allow'],
        'map_meta_cap'    => true,
    ]);
}

add_action('admin_post_nopriv_dawp_newsletter', 'dawp_handle_newsletter_form');
add_action('admin_post_dawp_newsletter', 'dawp_handle_newsletter_form');

function dawp_handle_newsletter_form() {
    $redirect_base = home_url('/');
    $referer       = wp_get_referer();

    if ($referer && strpos($referer, home_url()) === 0) {
        $redirect_base = remove_query_arg('newsletter', $referer);
    }

    $redirect = static function ($status) use ($redirect_base) {
        wp_safe_redirect(add_query_arg('newsletter', $status, $redirect_base) . '#newsletter');
        exit;
    };

    $nonce = isset($_POST['dawp_newsletter_nonce']) ? sanitize_text_field(wp_unslash($_POST['dawp_newsletter_nonce'])) : '';

    if (!$nonce || !wp_verify_nonce($nonce, 'dawp_newsletter')) {
        $redirect('error');
    }

    // Honeypot — bots fill this, humans never see it.
    $honeypot = isset($_POST['company_website']) ? trim((string) wp_unslash($_POST['company_website'])) : '';
    if ($honeypot !== '') {
        $redirect('success');
    }

    $email = isset($_POST['newsletter_email']) ? sanitize_email(wp_unslash($_POST['newsletter_email'])) : '';

    if (!$email || !is_email($email)) {
        $redirect('error');
    }

    $existing = get_posts([
        'post_type'      => 'dawp_subscriber',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'title'          => $email,
        'no_found_rows'  => true,
    ]);

    if (!empty($existing)) {
        $redirect('exists');
    }

    wp_insert_post([
        'post_type'   => 'dawp_subscriber',
        'post_status' => 'publish',
        'post_title'  => $email,
        'post_date'   => current_time('mysql'),
    ]);

    $redirect('success');
}

/**
 * Render the homepage newsletter form (markup + status message).
 */
function dawp_newsletter_form() {
    $status = isset($_GET['newsletter']) ? sanitize_key(wp_unslash($_GET['newsletter'])) : '';

    $messages = [
        'success' => __('Thanks — you are on the list. Watch your inbox for new arrivals and updates.', 'dawp'),
        'exists'  => __('You are already subscribed with this email address.', 'dawp'),
        'error'   => __('Please enter a valid email address and try again.', 'dawp'),
    ];

    if (isset($messages[$status])) {
        $tone = 'error' === $status ? 'is-error' : 'is-success';
        printf(
            '<p class="newsletter-alert %s" role="%s">%s</p>',
            esc_attr($tone),
            'error' === $status ? 'alert' : 'status',
            esc_html($messages[$status])
        );
    }
    ?>
    <form class="newsletter-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="dawp_newsletter">
        <?php wp_nonce_field('dawp_newsletter', 'dawp_newsletter_nonce'); ?>
        <span class="newsletter-hp" aria-hidden="true">
            <label for="company_website"><?php esc_html_e('Company website', 'dawp'); ?></label>
            <input id="company_website" name="company_website" type="text" tabindex="-1" autocomplete="off">
        </span>
        <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" aria-label="<?php esc_attr_e('Email address', 'dawp'); ?>" required>
        <button type="submit"><?php esc_html_e('JOIN', 'dawp'); ?> &rarr;</button>
    </form>
    <?php
}
