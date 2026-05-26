<?php
get_header();
if ( have_posts() ) {
    $is_account_page = function_exists('is_account_page') && is_account_page();

    if ( $is_account_page ) {
        echo '<main class="account-page"><div class="account-page__container">';
        echo '<header class="account-page__header">';
        echo '<p class="account-page__eyebrow">' . esc_html__('Customer area', 'dawp') . '</p>';
        echo '<h1 class="account-page__title">' . esc_html__('My Account', 'dawp') . '</h1>';
        echo '<p class="account-page__subtitle">' . esc_html__('Manage your orders, addresses, and account details in one place.', 'dawp') . '</p>';
        echo '</header>';
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
