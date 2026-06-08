<?php
/**
 * Template Name: Contact Us
 * Template Part: page-contact
 */
?>

<main id="primary" class="bg-white text-slickText font-body">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28">
            <div class="max-w-3xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('Contact Slicktee', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Support For Your Next Fit.', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Questions about an order, shipping, returns, sizing, or product details? Send us a message and our support team will keep the answer clear.', 'dawp'); ?>
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="mailto:support@slicktee.com"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-7 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                        <?php esc_html_e('Email Support', 'dawp'); ?>
                    </a>

                    <a href="<?php echo esc_url(home_url('/faq/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
                        <?php esc_html_e('View FAQ', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-3 shadow-2xl shadow-black/40">
                    <?php dawp_responsive_theme_image(
                        'assets/img/gallery/Slichtee/contact_banner.png',
                        __('Slicktee customer support desk for apparel orders', 'dawp'),
                        'aspect-[4/5] w-full rounded-[1.35rem] object-cover opacity-90',
                        900,
                        1125,
                        [[480, 600], [768, 960], [900, 1125]],
                        '(max-width: 1023px) 100vw, 50vw',
                        'eager'
                    ); ?>
                </div>

                <div class="absolute -bottom-7 -left-4 hidden max-w-[260px] rounded-2xl border border-white/10 bg-white p-5 text-slickText shadow-2xl lg:block">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-slickGreen">
                        <?php esc_html_e('Response Window', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form + Details -->
    <section class="bg-slickSoft py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">

            <aside class="space-y-5 lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-3xl bg-slickBlack p-7 text-white shadow-xl shadow-black/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                        <?php esc_html_e('Support Details', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                        <?php esc_html_e('Need Help With An Order?', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/80">
                        <?php esc_html_e('Include your order number when your message is about tracking, shipping, returns, damaged items, or order changes.', 'dawp'); ?>
                    </p>

                    <div class="mt-7 grid gap-4">
                        <a href="mailto:support@slicktee.com"
                           class="rounded-2xl border border-white/10 bg-white/5 p-5 transition hover:border-slickLime hover:bg-white/10">
                            <span class="block text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Email', 'dawp'); ?></span>
                            <span class="mt-2 block text-base font-black text-white">support@slicktee.com</span>
                        </a>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <span class="block text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Business Hours', 'dawp'); ?></span>
                            <span class="mt-2 block text-sm font-black leading-6 text-white"><?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?></span>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <span class="block text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Address', 'dawp'); ?></span>
                            <span class="mt-2 block text-sm font-bold leading-6 text-white/75"><?php echo esc_html(dawp_get_store_address()); ?></span>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <span class="block text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Best For', 'dawp'); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-white/75"><?php esc_html_e('Order updates, product questions, sizing help, shipping, and returns.', 'dawp'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Before You Send', 'dawp'); ?>
                    </p>
                    <ul class="space-y-3 text-sm leading-6 text-slickMuted">
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><?php esc_html_e('Use the same email address used at checkout when possible.', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><?php esc_html_e('Add your order number for order-related questions.', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><?php esc_html_e('For damaged or incorrect items, include clear photos.', 'dawp'); ?></li>
                    </ul>
                </div>
            </aside>

            <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                    <?php esc_html_e('Send A Message', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText lg:text-5xl">
                    <?php esc_html_e('Tell us what you need.', 'dawp'); ?>
                </h2>

                <p class="mt-4 max-w-2xl text-base leading-7 text-slickMuted">
                    <?php esc_html_e('Our support team can help with order status, apparel fit, product details, shipping timelines, and return eligibility.', 'dawp'); ?>
                </p>

                <div id="contact-form-1">
                    <?php echo do_shortcode('[contact-form-7 id="5d357f1" title="Contact"]'); ?>
                </div>
            </div>

        </div>
    </section>

    <!-- Quick Help -->
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Quick Help', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText lg:text-5xl">
                        <?php esc_html_e('Find common answers faster.', 'dawp'); ?>
                    </h2>
                </div>

                <a href="<?php echo esc_url(home_url('/track-order/')); ?>"
                   class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                    <?php esc_html_e('Track Your Order', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="group rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">01</div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText group-hover:text-slickGreen">
                        <?php esc_html_e('Shipping & Return', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Review processing times, delivery expectations, tracking details, and return requirements.', 'dawp'); ?>
                    </p>
                </a>

                <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>" class="group rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">02</div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText group-hover:text-slickGreen">
                        <?php esc_html_e('Terms Conditions', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Review the terms that apply when using the website and placing orders.', 'dawp'); ?>
                    </p>
                </a>

                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="group rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">03</div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText group-hover:text-slickGreen">
                        <?php esc_html_e('FAQ', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Read answers about orders, products, payments, and support.', 'dawp'); ?>
                    </p>
                </a>

                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="group rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">04</div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText group-hover:text-slickGreen">
                        <?php esc_html_e('Privacy', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Learn how customer data is handled during shopping and support.', 'dawp'); ?>
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="overflow-hidden bg-slickBlack text-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8 lg:py-24">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Still Browsing?', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em] lg:text-6xl">
                    <?php esc_html_e('Shop clean graphic apparel.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                    <?php esc_html_e('Explore graphic tees, oversized silhouettes, hoodies, and streetwear essentials built for daily rotation.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                        <?php esc_html_e('Shop Now', 'dawp'); ?>
                    </a>

                    <a href="<?php echo esc_url(home_url('/product-category/graphic-tees/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
                        <?php esc_html_e('Graphic Tees', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="rounded-3xl border border-white/10 bg-white/5 p-7">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                        <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                            <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm leading-6 text-white/70">
                            <?php esc_html_e('Simple ordering and clear payment flow.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                        <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                            <?php esc_html_e('Tracking Included', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm leading-6 text-white/70">
                            <?php esc_html_e('Tracking details are sent after dispatch.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
