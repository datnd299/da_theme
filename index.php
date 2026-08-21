<?php
/**
 * Fallback template. Also catches WooCommerce account pages rendered outside woocommerce.php.
 */

defined('ABSPATH') || exit;

get_header();

$is_account = function_exists('is_account_page') && is_account_page();
?>
<main class="<?php echo esc_attr($is_account ? 'woo-page account-page' : 'page-fallback'); ?>">

    <?php if ($is_account) : ?>
        <section class="woo-cover" aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
            <div class="container">
                <nav class="woo-cover__breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                    <span aria-hidden="true">/</span>
                    <span><?php esc_html_e('My Account', 'dawp'); ?></span>
                </nav>
                <span class="c-rule" aria-hidden="true"></span>
                <p class="c-eyebrow"><?php esc_html_e('Client area', 'dawp'); ?></p>
                <h1><?php esc_html_e('My Account', 'dawp'); ?></h1>
                <p class="woo-cover__copy"><?php esc_html_e('Your orders, addresses, and the service record for every watch you own.', 'dawp'); ?></p>
            </div>
        </section>
    <?php endif; ?>

    <div class="container woo-page__body">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>
    </div>
</main>
<?php get_footer(); ?>
