<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <!-- Add Google Fonts: Cormorant Garamond & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
    <!-- Tailwind CSS v4 Browser Compiler for Instant Local Preview -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body <?php body_class('bg-[#FAF6F0] font-sans text-[#4A3426] antialiased flex flex-col min-h-screen'); ?>>
<?php wp_body_open(); ?>

<!-- 1. Announcement Bar -->
<div class="bg-[#4A3426] text-[#FAF6F0] text-center py-2.5 text-[10px] sm:text-xs tracking-[0.2em] font-sans uppercase z-50 relative border-b border-[#FAF6F0]/10">
    Handcrafted DIY Lyre Kits Inspired by Ancient Music
</div>

<!-- 2. Header -->
<header class="bg-[#FAF6F0] text-[#4A3426] px-6 md:px-12 py-5 flex justify-between items-center border-b border-[#D9D2C5]/40 sticky top-0 z-50 backdrop-blur-md bg-opacity-95">
    <!-- Left Logo -->
    <div class="flex items-center">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="font-serif font-semibold text-2xl tracking-[0.15em] text-[#4A3426] hover:text-[#B08A57] transition-colors duration-300">
            Bardic
        </a>
    </div>

    <!-- Center Navigation Links (Hidden on Mobile) -->
    <nav class="hidden lg:flex items-center gap-10 text-xs uppercase tracking-[0.2em] font-sans font-medium">
        <a href="/shop?series=walnut" class="text-[#7A6C5F] hover:text-[#B08A57] hover:border-b hover:border-[#B08A57] pb-1 transition-all duration-300">Walnut Series</a>
        <a href="/shop?series=nordic" class="text-[#7A6C5F] hover:text-[#B08A57] hover:border-b hover:border-[#B08A57] pb-1 transition-all duration-300">Nordic Series</a>
        <a href="/shop?series=celtic" class="text-[#7A6C5F] hover:text-[#B08A57] hover:border-b hover:border-[#B08A57] pb-1 transition-all duration-300">Celtic Series</a>
        <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="text-[#7A6C5F] hover:text-[#B08A57] hover:border-b hover:border-[#B08A57] pb-1 transition-all duration-300">Contact Us</a>
        <a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>" class="text-[#7A6C5F] hover:text-[#B08A57] hover:border-b hover:border-[#B08A57] pb-1 transition-all duration-300">Tracking</a>
    </nav>

    <!-- Right Actions & CTA -->
    <div class="flex items-center gap-6">
        <!-- Search icon/button (Minimalist) -->
        <a href="/?s=&post_type=product" class="hover:text-[#B08A57] transition-colors duration-200 p-1 text-[#7A6C5F]" title="Search our collection">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </a>

        <!-- Cart Link -->
        <?php 
        $cart_url = '/cart';
        $cart_count = 0;
        if ( class_exists( 'WooCommerce' ) ) {
            $cart_url = wc_get_cart_url();
            if ( WC()->cart ) {
                $cart_count = WC()->cart->get_cart_contents_count();
            }
        }
        ?>
        <a href="<?php echo esc_url( $cart_url ); ?>" class="hover:text-[#B08A57] transition-colors duration-200 flex items-center gap-1.5 relative p-1 text-[#7A6C5F]" title="Shopping Cart">
            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <?php if ($cart_count > 0): ?>
            <span class="absolute -top-1 -right-1 bg-[#B08A57] text-[#FAF6F0] text-[9px] font-bold w-3.5 h-3.5 rounded-full flex items-center justify-center shadow-sm">
                <?php echo esc_html( $cart_count ); ?>
            </span>
            <?php endif; ?>
        </a>

        <!-- Header CTA Button -->
        <a href="/shop" class="hidden sm:inline-flex justify-center items-center bg-[#4A3426] text-[#FAF6F0] font-sans font-semibold text-xs tracking-wider uppercase px-6 py-3 rounded-full hover:bg-[#B08A57] hover:text-[#FAF6F0] hover:shadow-md transition-all duration-300">
            Begin Crafting
        </a>

        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-toggle" class="lg:hidden p-1 text-[#4A3426] hover:text-[#B08A57] transition-colors" aria-label="Toggle menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path id="hamburger-icon" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" />
                <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="mobile-menu" class="fixed inset-0 top-[112px] bg-[#FAF6F0] z-40 translate-x-full transition-transform duration-300 ease-in-out lg:hidden flex flex-col px-8 py-10 border-t border-[#D9D2C5]/30">
    <nav class="flex flex-col gap-6 text-lg font-serif text-[#4A3426]">
        <a href="/shop?series=walnut" class="hover:text-[#B08A57] transition-colors border-b border-[#D9D2C5]/20 pb-3">Walnut Series</a>
        <a href="/shop?series=nordic" class="hover:text-[#B08A57] transition-colors border-b border-[#D9D2C5]/20 pb-3">Nordic Series</a>
        <a href="/shop?series=celtic" class="hover:text-[#B08A57] transition-colors border-b border-[#D9D2C5]/20 pb-3">Celtic Series</a>
        <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="hover:text-[#B08A57] transition-colors border-b border-[#D9D2C5]/20 pb-3">Contact Us</a>
        <a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>" class="hover:text-[#B08A57] transition-colors border-b border-[#D9D2C5]/20 pb-3">Tracking</a>
    </nav>
    <div class="mt-auto border-t border-[#D9D2C5]/40 pt-8 flex flex-col gap-5">
        <a href="/shop" class="w-full inline-flex justify-center items-center bg-[#4A3426] text-[#FAF6F0] font-sans font-semibold text-sm tracking-wider uppercase py-4 rounded-full hover:bg-[#B08A57] hover:text-[#FAF6F0] transition-colors duration-300">
            Begin Crafting
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    if (toggleBtn && mobileMenu) {
        toggleBtn.addEventListener('click', function() {
            const isOpen = !mobileMenu.classList.contains('translate-x-full');
            if (isOpen) {
                mobileMenu.classList.add('translate-x-full');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            } else {
                mobileMenu.classList.remove('translate-x-full');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        });
    }
});
</script>
