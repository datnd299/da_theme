<?php
/**
 * Default page template.
 *
 * WooCommerce account pages are regular WordPress pages that render a
 * shortcode, so they do not use woocommerce.php.
 *
 * @package dawp
 */

get_header();

$is_account_page = function_exists('is_account_page') && is_account_page();
?>

<?php if ($is_account_page) : ?>
    <main class="account-page">
        <section class="account-page__hero">
            <div class="account-page__hero-inner">
                <p class="account-page__eyebrow"><?php esc_html_e('Customer Account', 'dawp'); ?></p>
                <h1 class="account-page__title"><?php the_title(); ?></h1>
                <p class="account-page__intro"><?php esc_html_e('Sign in to view orders, manage account details, and update saved addresses.', 'dawp'); ?></p>
            </div>
        </section>

        <section class="account-page__content" aria-label="<?php esc_attr_e('Account content', 'dawp'); ?>">
            <div class="account-page__inner">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </section>
    </main>
<?php else : ?>
    <main class="site-page">
        <div class="site-page__inner">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </main>
<?php endif; ?>

<?php get_footer(); ?>
