<?php
/**
 * Default page template.
 *
 * My Account is rendered as a normal WordPress page with a WooCommerce
 * shortcode, so it needs its own wrapper instead of falling through to index.php.
 *
 * @package dawp
 */

get_header();

$is_account_page = function_exists('is_account_page') && is_account_page();
$account_shell_class = is_user_logged_in()
    ? 'dawp-account-shell dawp-account-shell--logged-in'
    : 'dawp-account-shell dawp-account-shell--guest';

if (have_posts()) :
    while (have_posts()) :
        the_post();

        if ($is_account_page) :
            ?>
            <main id="primary" class="dawp-account-page">
                <section class="dawp-account-hero" aria-labelledby="dawp-account-title">
                    <div class="dawp-account-hero__inner">
                        <p class="dawp-account-hero__eyebrow"><?php esc_html_e('Account Center', 'dawp'); ?></p>
                        <h1 id="dawp-account-title"><?php the_title(); ?></h1>
                        <p class="dawp-account-hero__copy">
                            <?php esc_html_e('Manage your orders, saved addresses, downloads, and account details in one place.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <div class="<?php echo esc_attr($account_shell_class); ?>">
                    <?php the_content(); ?>
                </div>
            </main>
            <?php
        else :
            the_content();
        endif;
    endwhile;
endif;

get_footer();
