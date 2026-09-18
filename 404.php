<?php
/**
 * 404 Not Found template.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

get_header();
?>

<main class="da-empty da-empty--404">
    <h1><?php esc_html_e('Page not found', 'dawp'); ?></h1>
    <p><?php esc_html_e('This page is empty or no longer exists.', 'dawp'); ?></p>
    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to home', 'dawp'); ?></a>
</main>

<?php
get_footer();
