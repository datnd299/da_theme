<?php
get_header();
if ( have_posts() ) {
    $is_cart_page = function_exists('is_cart') && is_cart();
    $is_account_page = function_exists('is_account_page') && is_account_page();

    if ( $is_cart_page ) {
        $cart_count = ( function_exists('WC') && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
        echo '<main class="woo-page woo-page--cart"><div class="woo-page__container woo-page__container--cart">';
        echo '<header class="cart-page-header">';
        echo '<div>';
        echo '<p class="cart-page-header__eyebrow">' . esc_html__('Shopping bag', 'dawp') . '</p>';
        echo '<h1 class="cart-page-header__title">' . esc_html__('Your Cart', 'dawp') . '</h1>';
        echo '<p class="cart-page-header__copy">' . esc_html__('Review your pieces, apply a code, and continue to secure checkout.', 'dawp') . '</p>';
        echo '</div>';
        echo '<div class="cart-page-header__meta">';
        printf(
            esc_html(_n('%d item', '%d items', $cart_count, 'dawp')),
            absint($cart_count)
        );
        echo '</div>';
        echo '</header>';
        echo '<div class="cart-progress" aria-label="' . esc_attr__('Checkout progress', 'dawp') . '">';
        echo '<span class="is-current">' . esc_html__('Cart', 'dawp') . '</span>';
        echo '<span>' . esc_html__('Checkout', 'dawp') . '</span>';
        echo '<span>' . esc_html__('Confirmation', 'dawp') . '</span>';
        echo '</div>';
    } elseif ( $is_account_page ) {
        echo '<main class="account-page"><div class="account-page__container">';
    }

    while ( have_posts() ) {
        the_post();
        the_content();
    }

    if ( $is_cart_page ) {
        echo '<div class="cart-service-row" aria-label="' . esc_attr__('Store assurances', 'dawp') . '">';
        echo '<span>' . esc_html__('Secure checkout', 'dawp') . '</span>';
        echo '<span>' . esc_html__('Order support', 'dawp') . '</span>';
        echo '<span>' . esc_html__('Easy returns', 'dawp') . '</span>';
        echo '</div>';
        echo '</div></main>';
    } elseif ( $is_account_page ) {
        echo '</div></main>';
    }
}
get_footer();
