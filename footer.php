</main>

<footer id="contact" class="border-t border-[#E6DDD6] bg-[#2F2A28] text-white">
    <?php $contact_email = sanitize_email(get_option('admin_email')); ?>
    <div class="mx-auto grid w-[min(100%-32px,1180px)] gap-8 py-10 md:grid-cols-[1.2fr_0.8fr_0.8fr]">
        <div>
            <p class="font-serif text-3xl font-bold"><?php bloginfo('name'); ?></p>
            <p class="mt-3 max-w-md text-sm leading-6 text-white/75">
                <?php esc_html_e('A simple boutique homepage for women, girls, and family-friendly everyday style.', 'dawp'); ?>
            </p>
        </div>
        <div>
            <h2 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white/60"><?php esc_html_e('Shop', 'dawp'); ?></h2>
            <div class="mt-4 grid gap-2 text-sm text-white/75">
                <a class="transition hover:text-white" href="#collections"><?php esc_html_e('Collections', 'dawp'); ?></a>
                <a class="transition hover:text-white" href="#new-arrivals"><?php esc_html_e('New Arrivals', 'dawp'); ?></a>
                <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a>
            </div>
        </div>
        <div>
            <h2 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white/60"><?php esc_html_e('Support', 'dawp'); ?></h2>
            <div class="mt-4 grid gap-2 text-sm text-white/75">
                <?php if ($contact_email) : ?>
                    <a class="transition hover:text-white" href="<?php echo esc_url('mailto:' . $contact_email); ?>"><?php echo esc_html($contact_email); ?></a>
                <?php endif; ?>
                <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/my-account/')); ?>"><?php esc_html_e('My Account', 'dawp'); ?></a>
                <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/cart/')); ?>"><?php esc_html_e('Cart', 'dawp'); ?></a>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10 py-5">
        <div class="mx-auto flex w-[min(100%-32px,1180px)] flex-col gap-2 text-xs text-white/55 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to home', 'dawp'); ?></a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
