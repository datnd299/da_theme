<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background text-foreground font-sans antialiased'); ?>>

<?php
$cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url   = wc_get_cart_url();
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));

$main_menu_items = dawp_main_menu_items();
?>

<header id="site-header" class="fixed top-0 left-0 right-0 z-50 bg-background border-b border-surface-alt">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8 h-16 flex items-center justify-between gap-6">

        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>"
           class="text-xl font-bold tracking-widest uppercase text-foreground shrink-0">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.png'); ?>"
                 alt="<?php bloginfo('name'); ?>"
                 class="h-6 w-auto">
        </a>

        <!-- Nav desktop -->
        <nav class="hidden lg:flex items-center gap-1" aria-label="<?php esc_attr_e('Main Menu', 'dawp'); ?>">
            <?php foreach ($main_menu_items as $item) :
                $is_current = dawp_is_current_url($item['url']);
            ?>
            <a href="<?php echo esc_url($item['url']); ?>"
               class="px-4 py-2 text-sm font-medium rounded-full transition-colors <?php echo $is_current ? 'bg-foreground text-background' : 'text-foreground-muted hover:text-foreground hover:bg-surface'; ?>"
               <?php if ($is_current) echo 'aria-current="page"'; ?>>
                <?php echo esc_html($item['title']); ?>
            </a>
            <?php endforeach; ?>
        </nav>

        <!-- Actions -->
        <div class="flex items-center gap-3 shrink-0">

            <!-- Account -->
            <a href="<?php echo esc_url($account_url); ?>"
               class="hidden sm:flex items-center justify-center w-10 h-10 rounded-full hover:bg-surface transition-colors"
               aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
            </a>

            <!-- Cart -->
            <a href="<?php echo esc_url($cart_url); ?>"
               class="relative flex items-center justify-center w-10 h-10 rounded-full hover:bg-surface transition-colors"
               aria-label="<?php printf(esc_attr__('Cart (%d items)', 'dawp'), $cart_count); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                <?php if ($cart_count > 0) : ?>
                <span class="absolute -top-0.5 -right-0.5 w-5 h-5 flex items-center justify-center rounded-full bg-accent text-background text-[10px] font-bold leading-none">
                    <?php echo $cart_count; ?>
                </span>
                <?php endif; ?>
            </a>

            <!-- Hamburger (mobile) -->
            <button id="menu-toggle"
                    class="flex lg:hidden items-center justify-center w-10 h-10 rounded-full hover:bg-surface transition-colors"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    aria-label="<?php esc_attr_e('Toggle Menu', 'dawp'); ?>">
                <svg id="icon-open" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
                    <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
                <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true" class="hidden">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>

        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu"
         class="hidden lg:hidden border-t border-surface-alt bg-background">
        <?php
        $items = dawp_main_menu_items();
        foreach ($items as $item) :
            $is_current = dawp_is_current_url($item['url']);
        ?>
        <a href="<?php echo esc_url($item['url']); ?>"
           class="block px-6 py-3.5 text-sm font-medium border-b border-surface-alt last:border-b-0 <?php echo $is_current ? 'text-accent font-semibold' : 'text-foreground hover:text-foreground-muted'; ?>"
           <?php if ($is_current) echo 'aria-current="page"'; ?>>
            <?php echo esc_html($item['title']); ?>
        </a>
        <?php endforeach; ?>
        <a href="<?php echo esc_url($account_url); ?>"
           class="block px-6 py-3.5 text-sm font-medium text-foreground hover:text-foreground-muted">
            <?php esc_html_e('My Account', 'dawp'); ?>
        </a>
    </div>
</header>

<!-- Spacer để tránh content bị che bởi fixed header -->

<script>
(function () {
    var btn = document.getElementById('menu-toggle');
    var menu = document.getElementById('mobile-menu');
    var iconOpen = document.getElementById('icon-open');
    var iconClose = document.getElementById('icon-close');
    if (!btn || !menu) return;
    btn.addEventListener('click', function () {
        var isOpen = menu.classList.toggle('hidden');
        btn.setAttribute('aria-expanded', String(!isOpen));
        iconOpen.classList.toggle('hidden', !isOpen);
        iconClose.classList.toggle('hidden', isOpen);
    });
})();
</script>

<div id="content" class="site-content">
