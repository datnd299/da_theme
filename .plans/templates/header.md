<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@800,500,700,400,900&f[]=satoshi@900,700,500,300,400&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="site-header__inner container">
            <div class="site-logo">
                <a href="<?php echo home_url('/'); ?>">LUMIÈRE</a>
            </div>
            <?php dawp_render_main_menu(); ?>
            <div class="header-actions">
                <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link">
                    Cart (<?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>)
                </a>
            </div>
            <button class="menu-toggle" aria-expanded="false" aria-controls="main-menu">
                <span class="screen-reader-text">Menu</span>
                <span class="hamburger"></span>
            </button>
        </div>
    </header>
    <div id="content" class="site-content">
