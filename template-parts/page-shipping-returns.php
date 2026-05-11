<?php
/**
 * Template Name: Shipping & Return Policy
 * Template Part: page-shipping-return
 */

get_header();
?>

<main id="primary" class="bg-white text-slickText font-body">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Shipping & Return Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Clear delivery timelines, simple return rules, and transparent support for every Slicktee order.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Summary Cards -->
    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">
                    01
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('2–4 Business Days', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Order processing before your package leaves our fulfillment workflow.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">
                    02
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('5–10 Business Days', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Standard US shipping time after dispatch, depending on destination.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">
                    03
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Tracking Included', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Tracking details are sent once your order has shipped.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">
                    04
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Eligible unworn and unwashed items may be returned within 30 days.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">

            <!-- Sidebar -->
            <aside class="lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-3xl bg-slickBlack p-7 text-white shadow-xl shadow-black/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                        <?php esc_html_e('Policy Overview', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                        <?php esc_html_e('Simple. Clear. No Guesswork.', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/80">
                        <?php esc_html_e('We keep shipping, returns, and refunds straightforward so customers know what to expect before and after purchase.', 'dawp'); ?>
                    </p>

                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('Policy navigation', 'dawp'); ?>">
                        <a href="#shipping" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Shipping Information', 'dawp'); ?>
                        </a>
                        <a href="#tracking" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Tracking Information', 'dawp'); ?>
                        </a>
                        <a href="#returns" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Return Policy', 'dawp'); ?>
                        </a>
                        <a href="#refunds" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Refunds', 'dawp'); ?>
                        </a>
                        <a href="#order-issues" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Order Issues', 'dawp'); ?>
                        </a>
                        <a href="#contact" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Need Help?', 'dawp'); ?>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Policy Body -->
            <div class="space-y-8">

                <!-- Shipping Information -->
                <section id="shipping" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Shipping Information', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Order Processing & Delivery', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Orders are typically processed within 2–4 business days after your order is placed. Processing time includes order verification, preparation, and fulfillment before dispatch.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('After your order has been dispatched, standard US shipping typically takes 5–10 business days depending on destination, carrier conditions, and seasonal shipping volume.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Business days do not include weekends or public holidays. During high-volume periods, delivery may take slightly longer than usual.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Tracking -->
                <section id="tracking" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Tracking Information', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Tracking Your Order', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Once your order ships, you will receive tracking information by email. Please allow some time for the carrier tracking page to update after the tracking number is created.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('If your tracking has not updated after several business days, contact our support team and we will help review the status of your order.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-7">
                        <a href="<?php echo esc_url(home_url('/track-your-order/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                            <?php esc_html_e('Track Your Order', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <!-- Return Policy -->
                <section id="returns" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Return Policy', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('30-Day Return Window', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Customers may request a return within 30 days of delivery. To be eligible, items must be unused, unwashed, unworn, in original condition, and returned with original packaging where applicable.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('For apparel items, products must be free from wear, stains, odors, damage, or alteration. Items that do not meet these conditions may not qualify for return approval.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-8 rounded-2xl border border-[#E5E7EB] bg-slickSoft p-6">
                        <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                            <?php esc_html_e('Eligible Return Conditions', 'dawp'); ?>
                        </h3>

                        <ul class="mt-5 grid gap-3 text-sm leading-6 text-slickMuted sm:grid-cols-2">
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Unused and unworn item', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Unwashed apparel', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Original condition', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Original packaging where applicable', 'dawp'); ?>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Refunds -->
                <section id="refunds" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Refunds', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Refund Review Process', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Once a returned item is received and inspected, we will notify you about the approval status of your refund. Approved refunds are processed back to the original payment method.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Depending on your payment provider, it may take several business days for the refund to appear on your statement.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Shipping costs, if applicable, may not be refundable unless the return is due to an error on our side.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Order Issues -->
                <section id="order-issues" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Order Issues', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Damaged, Incorrect, or Missing Items', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('If you receive a damaged, incorrect, or incomplete order, please contact us as soon as possible with your order number and clear photos of the issue.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Our support team will review your case and help with the next steps. We recommend contacting us promptly so we can resolve the issue efficiently.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Contact CTA -->
                <section id="contact" class="overflow-hidden rounded-3xl bg-slickBlack text-white shadow-xl shadow-black/10">
                    <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr]">
                        <div class="p-7 lg:p-10">
                            <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                                <?php esc_html_e('Need Help?', 'dawp'); ?>
                            </p>

                            <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                                <?php esc_html_e('Support That Keeps It Clear.', 'dawp'); ?>
                            </h2>

                            <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                                <?php esc_html_e('If you have questions about shipping, returns, tracking, or order issues, reach out and our team will help you as soon as possible.', 'dawp'); ?>
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                                   class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                                </a>

                                <a href="mailto:support@slicktee.com"
                                   class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
                                    <?php esc_html_e('Email Us', 'dawp'); ?>
                                </a>
                            </div>
                        </div>

                        <div class="min-h-[300px] bg-slickGreen">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/slicktee-support.jpg'); ?>"
                                 alt="<?php esc_attr_e('Slicktee customer support assistance', 'dawp'); ?>"
                                 class="h-full w-full object-cover opacity-85">
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();