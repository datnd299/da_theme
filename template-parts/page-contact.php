<?php
/**
 * Template Part: Contact Us
 */
?>

<main class="bg-surface text-foreground">
    <section class="relative overflow-hidden bg-foreground text-white">
        <div class="absolute inset-0">
            <?php echo dawp_responsive_image(get_template_directory_uri() . '/assets/img/All_image/image copy 8.png', [
                'alt'           => __('Assorted women\'s handbags styled for customer care', 'dawp'),
                'width'         => 1600,
                'height'        => 720,
                'class'         => 'h-full w-full object-cover opacity-45',
                'loading'       => 'eager',
                'fetchpriority' => 'high',
                'sizes'         => '100vw',
                'srcset'        => [[640, 288], [960, 432], [1280, 576], [1600, 720]],
            ]); ?>
            <div class="absolute inset-0 bg-foreground/60"></div>
        </div>

        <div class="relative mx-auto grid min-h-[520px] max-w-[1280px] items-end px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-3xl pb-6">
                <span class="mb-5 inline-flex rounded-full border border-white/35 bg-white/12 px-4 py-2 text-xs font-bold uppercase text-white">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </span>
                <h1 class="font-heading text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('We would love to hear from you', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/88 md:text-lg">
                    <?php esc_html_e('Questions about women\'s shoes, sandals, handbags, accessories, shipping, returns, or an existing order? Send a note and our team will get back to you within 24 business hours.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-[1280px] gap-8 lg:grid-cols-[0.88fr_1.12fr] lg:gap-12">
            <aside class="space-y-6">
                <div class="rounded-lg border border-border bg-background p-6 shadow-card sm:p-8">
                    <h2 class="font-heading text-2xl font-semibold text-foreground"><?php esc_html_e('Contact Details', 'dawp'); ?></h2>
                    <div class="mt-7 space-y-6">
                        <div class="flex gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-accent-soft text-accent" aria-hidden="true">
                                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"></path><path d="m22 6-10 7L2 6"></path></svg>
                            </span>
                            <div>
                                <h3 class="font-bold text-foreground"><?php esc_html_e('Email', 'dawp'); ?></h3>
                                <a href="mailto:support@myveganblog.com" class="mt-1 inline-flex text-foreground-muted transition-colors hover:text-accent">support@myveganblog.com</a>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-accent-soft text-accent" aria-hidden="true">
                                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                            </span>
                            <div>
                                <h3 class="font-bold text-foreground"><?php esc_html_e('Business Hours', 'dawp'); ?></h3>
                                <p class="mt-1 leading-7 text-foreground-muted">
                                    <?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00', 'dawp'); ?><br>
                                    <?php esc_html_e('Closed on weekends', 'dawp'); ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-accent-soft text-accent" aria-hidden="true">
                                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </span>
                            <div>
                                <h3 class="font-bold text-foreground"><?php esc_html_e('Location', 'dawp'); ?></h3>
                                <p class="mt-1 leading-7 text-foreground-muted"><?php echo esc_html(dawp_store_address()); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-border bg-background p-6 shadow-card sm:p-8">
                    <h2 class="font-heading text-2xl font-semibold text-foreground"><?php esc_html_e('Need a quick answer?', 'dawp'); ?></h2>
                    <div class="mt-5 grid gap-3">
                        <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="rounded-lg border border-border bg-surface px-4 py-3 font-bold text-foreground transition-colors hover:border-accent hover:bg-background hover:text-accent"><?php esc_html_e('Track an order', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="rounded-lg border border-border bg-surface px-4 py-3 font-bold text-foreground transition-colors hover:border-accent hover:bg-background hover:text-accent"><?php esc_html_e('Shipping policy', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="rounded-lg border border-border bg-surface px-4 py-3 font-bold text-foreground transition-colors hover:border-accent hover:bg-background hover:text-accent"><?php esc_html_e('Returns and refunds', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="rounded-lg border border-border bg-surface px-4 py-3 font-bold text-foreground transition-colors hover:border-accent hover:bg-background hover:text-accent"><?php esc_html_e('FAQ', 'dawp'); ?></a>
                    </div>
                </div>
            </aside>

            <section class="rounded-lg border border-border bg-background p-6 shadow-card sm:p-8 lg:p-12" aria-labelledby="contact-form-title">
                <div class="mb-8">
                    <h2 id="contact-form-title" class="font-heading text-3xl font-semibold text-foreground"><?php esc_html_e('Send us a message', 'dawp'); ?></h2>
                    <p class="mt-3 max-w-2xl leading-7 text-foreground-muted">
                        <?php esc_html_e('Include your order number if your question is about a recent purchase.', 'dawp'); ?>
                    </p>
                </div>

                <form id="contact-form" class="space-y-6" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" novalidate>
                    <input type="hidden" name="action" value="dawp_contact">
                    <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('dawp_contact_nonce')); ?>">
                    <div class="hidden" aria-hidden="true">
                        <label for="contact_website"><?php esc_html_e('Website', 'dawp'); ?></label>
                        <input type="text" id="contact_website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label for="contact_name" class="mb-2 block text-sm font-bold text-foreground"><?php esc_html_e('Your Name', 'dawp'); ?> <span class="text-accent">*</span></label>
                            <input type="text" id="contact_name" name="name" required autocomplete="name" class="min-h-12 w-full rounded-lg border border-border bg-surface px-4 py-3 text-foreground outline-none transition-colors placeholder:text-muted focus:border-accent focus:bg-background focus:ring-1 focus:ring-accent" placeholder="<?php esc_attr_e('Jane Smith', 'dawp'); ?>">
                        </div>
                        <div>
                            <label for="contact_email" class="mb-2 block text-sm font-bold text-foreground"><?php esc_html_e('Email Address', 'dawp'); ?> <span class="text-accent">*</span></label>
                            <input type="email" id="contact_email" name="email" required autocomplete="email" class="min-h-12 w-full rounded-lg border border-border bg-surface px-4 py-3 text-foreground outline-none transition-colors placeholder:text-muted focus:border-accent focus:bg-background focus:ring-1 focus:ring-accent" placeholder="<?php esc_attr_e('jane@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label for="contact_subject" class="mb-2 block text-sm font-bold text-foreground"><?php esc_html_e('Subject', 'dawp'); ?></label>
                            <select id="contact_subject" name="subject" class="min-h-12 w-full rounded-lg border border-border bg-surface px-4 py-3 text-foreground outline-none transition-colors focus:border-accent focus:bg-background focus:ring-1 focus:ring-accent">
                                <option value="general"><?php esc_html_e('General Inquiry', 'dawp'); ?></option>
                                <option value="order"><?php esc_html_e('Order Status', 'dawp'); ?></option>
                                <option value="sizing"><?php esc_html_e('Sizing Help', 'dawp'); ?></option>
                                <option value="return"><?php esc_html_e('Returns and Exchanges', 'dawp'); ?></option>
                            </select>
                        </div>
                        <div>
                            <label for="contact_order" class="mb-2 block text-sm font-bold text-foreground"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                            <input type="text" id="contact_order" name="order_number" autocomplete="off" class="min-h-12 w-full rounded-lg border border-border bg-surface px-4 py-3 text-foreground outline-none transition-colors placeholder:text-muted focus:border-accent focus:bg-background focus:ring-1 focus:ring-accent" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                    </div>

                    <div>
                        <label for="contact_message" class="mb-2 block text-sm font-bold text-foreground"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-accent">*</span></label>
                        <textarea id="contact_message" name="message" rows="7" required class="w-full resize-y rounded-lg border border-border bg-surface px-4 py-3 text-foreground outline-none transition-colors placeholder:text-muted focus:border-accent focus:bg-background focus:ring-1 focus:ring-accent" placeholder="<?php esc_attr_e('How can we help?', 'dawp'); ?>"></textarea>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-[1fr_auto] sm:items-center">
                        <p id="contact-msg" class="text-sm font-bold" aria-live="polite" style="display:none"></p>
                        <button type="submit" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-accent px-7 py-3 text-sm font-bold text-white shadow-lg shadow-accent/20 transition-colors hover:bg-accent-hover disabled:cursor-not-allowed disabled:opacity-70">
                            <?php esc_html_e('Send Message', 'dawp'); ?>
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </section>
</main>
