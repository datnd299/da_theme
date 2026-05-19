<footer class="bg-[#F3EDE2] text-[#4A3426] border-t border-[#D9D2C5]/60 relative overflow-hidden py-16 md:py-24">
    <!-- Faint background noise pattern for texture -->
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <filter id="noise-footer">
                <feTurbulence type="fractalNoise" baseFrequency="0.03" numOctaves="3" stitchTiles="stitch"/>
            </filter>
            <rect width="100%" height="100%" filter="url(#noise-footer)"/>
        </svg>
    </div>

    <div class="max-w-[1280px] mx-auto px-6 md:px-12 relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12 lg:gap-10">
            
            <!-- Column 1: Brand Info -->
            <div class="flex flex-col">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="font-serif font-semibold text-2xl tracking-[0.15em] text-[#4A3426] mb-6">
                    Bardic
                </a>
                <p class="text-[#7A6C5F] font-sans text-sm leading-[1.7] mb-5 max-w-sm">
                    Preserving the heritage of ancient music through hands-on craftsmanship. From our workshop to your hands.
                </p>
                <!-- Address & Email -->
                <div class="space-y-3 mb-6">
                    <div class="flex items-start gap-2.5">
                        <span class="shrink-0 mt-0.5 text-[#B08A57]">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        <span class="text-[#7A6C5F] font-sans text-xs leading-[1.6]">2000 Parkview Dr, South Holland, IL 60473</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="shrink-0 text-[#B08A57]">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        <a href="mailto:contact@bardicshop.com" class="text-[#7A6C5F] font-sans text-xs hover:text-[#B08A57] transition-colors duration-200">contact@bardicshop.com</a>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="shrink-0 text-[#B08A57]">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/>
                            </svg>
                        </span>
                        <a href="https://www.facebook.com/profile.php?id=61575013076791#" target="_blank" rel="noopener noreferrer" class="text-[#7A6C5F] font-sans text-xs hover:text-[#B08A57] transition-colors duration-200">Facebook</a>
                    </div>
                </div>
            </div>


            <!-- Column 2: Craft Links -->
            <div>
                <h4 class="font-sans text-xs font-semibold tracking-[0.2em] uppercase text-[#4A3426] mb-6">Craft</h4>
                <ul class="space-y-3.5 font-sans text-sm">
                    <li><a href="/shop?series=walnut" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Walnut Series</a></li>
                    <li><a href="/shop?series=nordic" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Nordic Series</a></li>
                    <li><a href="/shop?series=celtic" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Celtic Series</a></li>
                </ul>
            </div>

            <!-- Column 3: Support Links -->
            <div>
                <h4 class="font-sans text-xs font-semibold tracking-[0.2em] uppercase text-[#4A3426] mb-6">Support</h4>
                <ul class="space-y-3.5 font-sans text-sm">
                    <li><a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">About Us</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Track Your Order</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Frequently Asked Questions</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 4: Policies Links -->
            <div>
                <h4 class="font-sans text-xs font-semibold tracking-[0.2em] uppercase text-[#4A3426] mb-6">Policies</h4>
                <ul class="space-y-3.5 font-sans text-sm">
                    <li><a href="<?php echo esc_url( home_url( '/shipping-policy' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Shipping Policy</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/refund-return-policy' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Return & Refund Policy</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/billing-terms' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Billing Terms & Conditions</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/terms-of-service' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Terms of Service</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>" class="text-[#7A6C5F] hover:text-[#4A3426] transition-colors duration-200">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Column 5: Newsletter Tan Card -->
            <div>
                <div class="bg-[#FAF6F0] p-6 rounded-2xl border border-[#D9D2C5]/30 shadow-sm">
                    <h4 class="font-sans text-xs font-bold tracking-[0.15em] uppercase text-[#4A3426] mb-3">The Artisan Letter</h4>
                    <p class="text-[#7A6C5F] font-sans text-xs leading-[1.6] mb-5">
                        Join 5,000+ makers for monthly workshop updates, ancient tuning guides, and kit releases.
                    </p>
                    <form class="flex gap-2 relative">
                        <input type="email" placeholder="Email Address" class="w-full bg-[#F3EDE2] border border-[#D9D2C5]/60 rounded-xl px-4 py-2.5 text-xs text-[#4A3426] placeholder-[#7A6C5F]/60 focus:outline-none focus:ring-1 focus:ring-[#B08A57] focus:border-[#B08A57] transition-all" required />
                        <button type="submit" class="bg-[#4A3426] text-[#FAF6F0] w-9 h-9 rounded-xl flex items-center justify-center hover:bg-[#B08A57] hover:scale-102 transition-all shrink-0 shadow-sm" aria-label="Subscribe">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <div class="border-t border-[#D9D2C5]/60 mt-16 pt-8 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-[#7A6C5F] font-sans">
            <p>
                &copy; <?php echo date('Y'); ?> Bardic Artisan Workshop. Handcrafted for the modern bard.
            </p>
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <span class="text-[#7A6C5F] font-sans text-[11px] font-medium uppercase tracking-[0.2em] opacity-80">Secure Payments</span>
                <div class="flex items-center gap-2.5">
                    <!-- Visa -->
                    <div class="w-12 h-7 bg-[#FAF6F0] border border-[#D9D2C5] rounded flex items-center justify-center select-none px-1" title="Visa">
                        <img src="https://cdn.jsdelivr.net/gh/datatrans/payment-logos@master/assets/cards/visa.svg" alt="Visa" class="h-3.5 w-auto object-contain" />
                    </div>
                    <!-- Mastercard -->
                    <div class="w-12 h-7 bg-[#FAF6F0] border border-[#D9D2C5] rounded flex items-center justify-center select-none px-1" title="Mastercard">
                        <img src="https://cdn.jsdelivr.net/gh/datatrans/payment-logos@master/assets/cards/mastercard.svg" alt="Mastercard" class="h-5 w-auto object-contain" />
                    </div>
                    <!-- Paypal -->
                    <div class="w-12 h-7 bg-[#FAF6F0] border border-[#D9D2C5] rounded flex items-center justify-center select-none px-1" title="PayPal">
                        <img src="https://cdn.jsdelivr.net/gh/datatrans/payment-logos@master/assets/apm/paypal.svg" alt="PayPal" class="h-4.5 w-auto object-contain" />
                    </div>
                    <!-- Google Pay -->
                    <div class="w-12 h-7 bg-[#FAF6F0] border border-[#D9D2C5] rounded flex items-center justify-center select-none px-1" title="Google Pay">
                        <img src="https://cdn.jsdelivr.net/gh/datatrans/payment-logos@master/assets/wallets/google-pay.svg" alt="Google Pay" class="h-4.5 w-auto object-contain" />
                    </div>
                    <!-- Apple Pay -->
                    <div class="w-12 h-7 bg-[#FAF6F0] border border-[#D9D2C5] rounded flex items-center justify-center select-none px-1" title="Apple Pay">
                        <img src="https://cdn.jsdelivr.net/gh/datatrans/payment-logos@master/assets/wallets/apple-pay.svg" alt="Apple Pay" class="h-4.5 w-auto object-contain" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
