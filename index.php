<?php
get_header();
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        if ( function_exists('is_account_page') && is_account_page() ) : ?>
            <main class="account-page" aria-labelledby="account-page-title">
                <section class="account-page__header">
                    <p class="account-page__eyebrow"><?php esc_html_e('Customer account', 'dawp'); ?></p>
                    <h1 id="account-page-title"><?php esc_html_e('My Account', 'dawp'); ?></h1>
                    <p><?php esc_html_e('Review your orders, manage saved addresses, and keep your account details up to date.', 'dawp'); ?></p>
                </section>

                <div class="account-page__content">
                    <?php the_content(); ?>
                </div>
            </main>
        <?php else :
            the_content();
        endif;
    }
}
get_footer();
