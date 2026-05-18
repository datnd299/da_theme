<?php
get_header();
if ( have_posts() ) {
    $is_account_page = function_exists('is_account_page') && is_account_page();

    if ( $is_account_page ) {
        echo '<main class="account-page"><div class="account-page__container">';
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
