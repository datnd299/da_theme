<?php
/**
 * Template Name: Terms & Conditions
 * Template Part: page-terms-conditions
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
                    <?php esc_html_e('Store Terms', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Please review the terms that apply when browsing Slicktee, placing orders, using our website, or interacting with our ecommerce services.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Summary Cards -->
    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">01</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Website Use', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Use our website lawfully and responsibly when browsing or shopping.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">02</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Orders & Payments', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Orders are subject to availability, verification, and successful payment.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">03</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Product Info', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('We aim to present products clearly, but details may vary slightly.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">04</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Customer Policies', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Shipping, returns, privacy, and support policies are part of these terms.', 'dawp'); ?>
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
                        <?php esc_html_e('Terms Overview', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                        <?php esc_html_e('Clear Rules For Shopping.', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/80">
                        <?php esc_html_e('These terms explain how customers may use our website, place orders, and interact with Slicktee services.', 'dawp'); ?>
                    </p>

                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('Terms navigation', 'dawp'); ?>">
                        <a href="#acceptance" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Acceptance Of Terms', 'dawp'); ?>
                        </a>
                        <a href="#website-use" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Website Use', 'dawp'); ?>
                        </a>
                        <a href="#orders" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Orders & Payments', 'dawp'); ?>
                        </a>
                        <a href="#products" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Product Information', 'dawp'); ?>
                        </a>
                        <a href="#shipping-returns" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="#intellectual-property" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Intellectual Property', 'dawp'); ?>
                        </a>
                        <a href="#limitations" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Limitations', 'dawp'); ?>
                        </a>
                        <a href="#contact" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Contact Us', 'dawp'); ?>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Terms Body -->
            <div class="space-y-8">

                <!-- Acceptance -->
                <section id="acceptance" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Acceptance Of Terms', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Using Slicktee Means You Accept These Terms', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('By accessing our website, browsing products, creating an account, placing an order, or using any Slicktee service, you agree to be bound by these Terms & Conditions and any policies referenced on this website.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('If you do not agree with these terms, please do not use our website or place an order through our store.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Website Use -->
                <section id="website-use" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Website Use', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Responsible Use Of Our Store', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('You agree to use this website only for lawful purposes and in a way that does not damage, disable, interfere with, or disrupt the website, checkout system, customer accounts, or other users.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('You may not attempt to access restricted areas, misuse website features, upload harmful code, interfere with security systems, or use our store for fraudulent activity.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-8 rounded-2xl border border-[#E5E7EB] bg-white p-6">
                        <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                            <?php esc_html_e('Prohibited Activities', 'dawp'); ?>
                        </h3>

                        <ul class="mt-5 grid gap-3 text-sm leading-6 text-slickMuted sm:grid-cols-2">
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Fraudulent purchases or payment misuse', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Unauthorized access attempts', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Copying website content without permission', 'dawp'); ?>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <?php esc_html_e('Interfering with website functionality', 'dawp'); ?>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Orders -->
                <section id="orders" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Orders & Payments', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Order Acceptance And Payment', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('All orders placed through Slicktee are subject to product availability, payment authorization, fraud screening, and order verification. We reserve the right to cancel or refuse any order when necessary.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Customers are responsible for providing accurate billing, shipping, and contact information. Incorrect details may cause delays, failed delivery, or order cancellation.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Prices, promotions, and product availability may change without notice. The final order total will be shown at checkout before payment is completed.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Products -->
                <section id="products" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Product Information', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Product Details, Colors, And Fit', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We aim to display product names, images, descriptions, pricing, sizing, and availability as accurately as possible. However, slight variations may occur due to screen settings, photography, production updates, or inventory changes.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Customers should review size charts, product descriptions, and care information before placing an order. If you need help choosing a size or style, please contact our support team before checkout.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Shipping & Returns -->
                <section id="shipping-returns" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Customer Policy References', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Shipping, delivery, tracking, returns, refunds, and order issue procedures are described in our Shipping & Return Policy. That policy is part of these Terms & Conditions.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('By placing an order, you agree to review and follow the requirements for returns, including eligibility conditions and return request timelines.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-7">
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <!-- Intellectual Property -->
                <section id="intellectual-property" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Intellectual Property', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Brand, Content, And Design Rights', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('All website content, branding, page layouts, product presentation, graphics, text, images, logos, and design elements are owned by or licensed to Slicktee unless otherwise stated.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('You may not copy, reproduce, distribute, modify, resell, or commercially exploit website content without written permission from Slicktee.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Slicktee is committed to original apparel presentation and does not support unauthorized use of copyrighted, trademarked, celebrity, or protected third-party materials.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- User Content -->
                <section class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('User Content', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Reviews, Messages, And Submissions', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('If you submit reviews, messages, comments, photos, or other content to Slicktee, you are responsible for ensuring that the content is accurate, lawful, and does not violate the rights of others.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('We reserve the right to remove content that is misleading, offensive, unlawful, spam-like, or inconsistent with our store policies.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Limitation -->
                <section id="limitations" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Limitations', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Service Availability And Limitations', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We work to keep our website accurate, available, and secure, but we do not guarantee that the website will always be uninterrupted, error-free, or free from technical issues.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('To the fullest extent permitted by law, Slicktee is not responsible for indirect, incidental, or consequential damages arising from website use, order delays, carrier issues, or misuse of our services.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Updates -->
                <section class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Terms Updates', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Changes To These Terms', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We may update these Terms & Conditions from time to time. Any updates will be posted on this page. Continued use of the website after updates means you accept the revised terms.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <!-- Contact CTA -->
                <section id="contact" class="overflow-hidden rounded-3xl bg-slickBlack text-white shadow-xl shadow-black/10">
                    <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr]">
                        <div class="p-7 lg:p-10">
                            <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                                <?php esc_html_e('Questions About Terms?', 'dawp'); ?>
                            </p>

                            <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                                <?php esc_html_e('We Keep Support Direct.', 'dawp'); ?>
                            </h2>

                            <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                                <?php esc_html_e('If you have questions about these Terms & Conditions, your order, or our store policies, contact the Slicktee support team.', 'dawp'); ?>
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
                                 alt="<?php esc_attr_e('Slicktee customer terms and support', 'dawp'); ?>"
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
