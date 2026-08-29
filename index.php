<?php
get_header();
if ( have_posts() ) {
    $is_account_page = function_exists('is_account_page') && is_account_page();

    if ( $is_account_page ) {
        ?>
        <main class="account-page">
            <section class="account-cover" style="--account-cover-bg:none" aria-label="<?php esc_attr_e('Account introduction', 'dawp'); ?>">
                <div class="account-cover__inner">
                    <nav class="account-cover__breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                        <span aria-hidden="true">/</span>
                        <span><?php esc_html_e('My Account', 'dawp'); ?></span>
                    </nav>
                    <p class="account-cover__eyebrow"><?php esc_html_e('Customer area', 'dawp'); ?></p>
                    <h1><?php esc_html_e('My Account', 'dawp'); ?></h1>
                    <p class="account-cover__copy"><?php esc_html_e('Manage orders, saved addresses, and account details in one secure place.', 'dawp'); ?></p>
                </div>
            </section>
            <div class="account-page__container">
        <?php
    }

    while ( have_posts() ) {
        the_post();
        the_content();
    }

    if ( $is_account_page ) {
        echo '</div></main>';
    }
}
get_footer();
