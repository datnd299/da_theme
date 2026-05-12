<?php
/**
 * Template Name: Privacy Policy
 * Template Part: page-privacy-policy
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
                    <?php esc_html_e('Customer Privacy', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Learn how Slicktee collects, uses, protects, and manages customer information when you browse or shop with us.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Trust Cards -->
    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">
                    01
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Payment and checkout information is handled through secure ecommerce systems.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">
                    02
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Order Support', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('We use customer details to process orders, provide tracking, and support purchases.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">
                    03
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('No Data Selling', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('We do not sell customer personal information to unrelated third parties.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">
                    04
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Clear Contact', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Customers may contact us with privacy questions at any time.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <!-- Main Policy Content -->
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">

            <!-- Sidebar -->
            <aside class="lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-3xl bg-slickBlack p-7 text-white shadow-xl shadow-black/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                        <?php esc_html_e('Policy Sections', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                        <?php esc_html_e('Privacy Made Clear.', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/80">
                        <?php esc_html_e('This page explains what information we collect, why we collect it, how it is used, and how customers can contact us.', 'dawp'); ?>
                    </p>

                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('Privacy policy navigation', 'dawp'); ?>">
                        <a href="#information" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Information We Collect', 'dawp'); ?>
                        </a>
                        <a href="#usage" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('How We Use Data', 'dawp'); ?>
                        </a>
                        <a href="#cookies" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Cookies', 'dawp'); ?>
                        </a>
                        <a href="#sharing" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Information Sharing', 'dawp'); ?>
                        </a>
                        <a href="#security" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Security', 'dawp'); ?>
                        </a>
                        <a href="#rights" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Your Rights', 'dawp'); ?>
                        </a>
                        <a href="#contact" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Contact Us', 'dawp'); ?>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Policy Body -->
            <div class="space-y-8">

                <!-- Intro -->
                <section class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Overview', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Our Commitment To Privacy', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Slicktee respects your privacy. This Privacy Policy explains how we collect, use, store, and protect information when you visit our website, place an order, contact support, or interact with our online store.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('By using our website, you agree to the practices described in this Privacy Policy. We may update this policy from time to time to reflect changes in our store, legal requirements, or ecommerce operations.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Information We Collect -->
                <section id="information" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Information We Collect', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Customer & Order Information', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('When you place an order or interact with Slicktee, we may collect information needed to complete your purchase and provide support. This may include your name, email address, shipping address, billing address, phone number, order details, and communication history.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('We may also collect basic technical information such as browser type, device type, pages viewed, referral source, IP address, and website usage data to help improve our website performance and shopping experience.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-8 rounded-2xl border border-[#E5E7EB] bg-white p-6">
                        <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                            <?php esc_html_e('Examples Of Information Collected', 'dawp'); ?>
                        </h3>

                        <ul class="mt-5 grid gap-3 text-sm leading-6 text-slickMuted sm:grid-cols-2">
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Name and contact details', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Shipping and billing address', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Order and transaction details', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Website usage information', 'dawp'); ?>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- How We Use Information -->
                <section id="usage" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('How We Use Information', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('How Your Information Helps Us Serve You', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We use customer information to process orders, confirm payments, arrange shipping, send tracking updates, respond to customer service requests, manage returns, prevent fraud, improve our website, and communicate important store updates.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('If you choose to join our newsletter, we may use your email address to send product updates, new drop announcements, and promotional messages. You may unsubscribe from marketing emails at any time.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Cookies -->
                <section id="cookies" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Cookies & Tracking', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Cookies Help Improve Your Shopping Experience', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Our website may use cookies and similar technologies to remember preferences, keep items in your cart, improve site performance, understand traffic patterns, and support ecommerce functionality.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('You can control or disable cookies through your browser settings. Some website features may not function properly if cookies are disabled.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Sharing -->
                <section id="sharing" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Information Sharing', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('When Information May Be Shared', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We may share necessary information with trusted service providers who help operate our store, process payments, fulfill orders, ship products, send emails, provide analytics, or support customer service.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('These providers only receive information needed to perform their services. We do not sell customer personal information to unrelated third parties.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('We may also disclose information if required by law, legal process, fraud prevention, or to protect the rights and safety of Slicktee, our customers, or others.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Security -->
                <section id="security" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Security', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Protecting Customer Information', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We use reasonable administrative, technical, and organizational measures to help protect customer information from unauthorized access, misuse, loss, or disclosure.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('While no online system can be guaranteed completely secure, we work to maintain a safe and trustworthy ecommerce environment for our customers.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Your Rights -->
                <section id="rights" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Your Choices', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Access, Update, Or Request Help', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('You may contact us to request help with your personal information, update order contact details, ask privacy questions, or request that we review information associated with your customer account.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Marketing emails include unsubscribe options. You may opt out of promotional email communication at any time.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Children -->
                <section class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Children’s Privacy', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Our Store Is Intended For Adults', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Slicktee is intended for use by adults or individuals who have permission from a parent or guardian to shop online. We do not knowingly collect personal information from children without appropriate consent.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Policy Updates -->
                <section class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Policy Updates', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Changes To This Privacy Policy', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We may update this Privacy Policy from time to time. Any updates will be posted on this page with the revised content. We encourage customers to review this page periodically.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Contact CTA -->
                <section id="contact" class="overflow-hidden rounded-3xl bg-slickBlack text-white shadow-xl shadow-black/10">
                    <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr]">
                        <div class="p-7 lg:p-10">
                            <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                                <?php esc_html_e('Privacy Questions?', 'dawp'); ?>
                            </p>

                            <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                                <?php esc_html_e('We Keep Support Clear.', 'dawp'); ?>
                            </h2>

                            <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                                <?php esc_html_e('If you have questions about this Privacy Policy or how your information is handled, contact our support team and we will help you review your request.', 'dawp'); ?>
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
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/contact_banner.png'); ?>"
                                 alt="<?php esc_attr_e('Slicktee customer privacy and support', 'dawp'); ?>"
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
