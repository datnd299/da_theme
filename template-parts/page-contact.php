<?php
/**
 * Template Part: page-contact
 */
?>

<div id="primary" class="bg-white font-body text-[#2D2633]">

    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#DCD5FF]">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.4),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(247,201,72,0.2),transparent_30%)]"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24 text-center">
            <h1 class="mx-auto max-w-4xl font-heading text-5xl font-black leading-[0.96] text-[#2D2633] sm:text-6xl">
                <?php esc_html_e('Contact Us', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-[#4F4657]">
                <?php esc_html_e('We are here to help with your beauty essentials. Reach out to us for any questions or support.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-16 items-start">
                
                <!-- Contact Info -->
                <div>
                    <h2 class="font-heading text-3xl font-black leading-tight text-[#2D2633] sm:text-4xl mb-6">
                        <?php esc_html_e('Get in Touch', 'dawp'); ?>
                    </h2>
                    <p class="text-base leading-8 text-[#6B6470] mb-8">
                        <?php esc_html_e('Whether you have a question about an order, need help finding the right beauty tool, or just want to say hello, we’d love to hear from you.', 'dawp'); ?>
                    </p>

                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-[#EAF7F0] text-[#2D2633]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-black uppercase tracking-wide text-[#2D2633]">
                                    <?php esc_html_e('Email Support', 'dawp'); ?>
                                </h3>
                                <p class="mt-1 text-sm text-[#6B6470]">
                                    <a href="mailto:support@oneshopvibe.com" class="hover:text-[#F7C948] transition-colors">support@oneshopvibe.com</a>
                                </p>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-[#EAF7F0] text-[#2D2633]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-black uppercase tracking-wide text-[#2D2633]">
                                    <?php esc_html_e('Business Hours', 'dawp'); ?>
                                </h3>
                                <p class="mt-1 text-sm text-[#6B6470]">
                                    <?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-[#EAF7F0] text-[#2D2633]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-black uppercase tracking-wide text-[#2D2633]">
                                    <?php esc_html_e('Store Location', 'dawp'); ?>
                                </h3>
                                <p class="mt-1 text-sm text-[#6B6470]">
                                    <?php esc_html_e('500 Dekalb Ave Suite 316', 'dawp'); ?><br>
                                    <?php esc_html_e('Brooklyn, NY 11205', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="rounded-[1.25rem] border border-[#E5E7EB] bg-[#F6F7F9] p-8 shadow-sm">
                    <h3 class="font-heading text-2xl font-black text-[#2D2633] mb-6">
                        <?php esc_html_e('Send a Message', 'dawp'); ?>
                    </h3>
                    <?php
                    $contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
                    if ($contact_status === 'sent') :
                    ?>
                        <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800" role="status">
                            <?php esc_html_e('Thank you. Your message has been sent successfully.', 'dawp'); ?>
                        </div>
                    <?php elseif ($contact_status === 'invalid') : ?>
                        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800" role="alert">
                            <?php esc_html_e('Please check your details and try again.', 'dawp'); ?>
                        </div>
                    <?php elseif ($contact_status === 'failed') : ?>
                        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800" role="alert">
                            <?php esc_html_e('Sorry, your message could not be sent right now. Please email us directly.', 'dawp'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="space-y-5">
                        <input type="hidden" name="action" value="dawp_contact_submit">
                        <?php wp_nonce_field('dawp_contact_submit', 'dawp_contact_nonce'); ?>
                        <div class="hidden" aria-hidden="true">
                            <label for="website"><?php esc_html_e('Website', 'dawp'); ?></label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium text-[#2D2633] mb-1">
                                <?php esc_html_e('Full Name', 'dawp'); ?>
                            </label>
                            <input type="text" id="name" name="name" required class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-[#2D2633] focus:border-[#2D2633] focus:outline-none focus:ring-1 focus:ring-[#2D2633]">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-[#2D2633] mb-1">
                                <?php esc_html_e('Email Address', 'dawp'); ?>
                            </label>
                            <input type="email" id="email" name="email" required class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-[#2D2633] focus:border-[#2D2633] focus:outline-none focus:ring-1 focus:ring-[#2D2633]">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-[#2D2633] mb-1">
                                <?php esc_html_e('Subject', 'dawp'); ?>
                            </label>
                            <input type="text" id="subject" name="subject" class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-[#2D2633] focus:border-[#2D2633] focus:outline-none focus:ring-1 focus:ring-[#2D2633]">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-[#2D2633] mb-1">
                                <?php esc_html_e('Message', 'dawp'); ?>
                            </label>
                            <textarea id="message" name="message" rows="4" required class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-[#2D2633] focus:border-[#2D2633] focus:outline-none focus:ring-1 focus:ring-[#2D2633]"></textarea>
                        </div>

                        <button type="submit" class="inline-flex w-full min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                            <?php esc_html_e('Send Message', 'dawp'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
