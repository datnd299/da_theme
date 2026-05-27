<?php
get_header();

$is_account_page = function_exists('is_account_page') && is_account_page();

if ( $is_account_page ) : ?>
    <main class="woo-page woo-account-page">
        <div class="container" style="padding-top:6rem; padding-bottom:6rem; min-height:60vh;">
            <header class="woo-account-hero">
                <p class="woo-account-kicker"><?php esc_html_e('Customer area', 'dawp'); ?></p>
                <h1><?php esc_html_e('My Account', 'dawp'); ?></h1>
                <p><?php esc_html_e('Manage orders, addresses, account details, and support information in one place.', 'dawp'); ?></p>
            </header>

            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    the_content();
                }
            }
            ?>
        </div>
    </main>
<?php
else :
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();
        }
    }
endif;
get_footer();
