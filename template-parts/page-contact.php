<?php
/**
 * Template Name: Contact Us
 * Template Part: page-contact
 */
$store_address = dawp_get_woocommerce_store_address();
?>

<main class="bg-[#FAF7F2]">
    <!-- Header Section -->
    <section class="py-16 lg:py-24 px-4 bg-white border-b border-[#E6DDD6]">
        <div class="max-w-3xl mx-auto text-center space-y-6">
            <div class="inline-block px-4 py-1.5 rounded-full bg-[#c98a8a]/10 text-[#c98a8a] text-sm font-bold uppercase tracking-widest">
                <?php esc_html_e('Get in Touch', 'dawp'); ?>
            </div>
            <h1 class="text-4xl lg:text-5xl font-serif text-[#2F2A28]">
                <?php esc_html_e('We’d Love to Hear from You', 'dawp'); ?>
            </h1>
            <p class="text-lg text-[#6F625D] leading-relaxed">
                <?php esc_html_e('Whether you have a question about sizing, styling, or your recent order, our boutique team is here to help you every step of the way.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <!-- Contact Info & Form Section -->
    <section class="py-20 px-4 lg:px-8">
        <div class="max-w-[1280px] mx-auto grid lg:grid-cols-12 gap-12 lg:gap-20">
            
            <!-- Left Side: Contact Details -->
            <div class="lg:col-span-5 space-y-12">
                
                <!-- Brand Support Image -->
                <div class="relative rounded-3xl overflow-hidden shadow-lg aspect-[16/10]">
                    <?php echo dawp_theme_image(
                        'assets/img/support_contact.png',
                        'Shop Kelli Support Desk',
                        900,
                        563,
                        array(array(400, 250), array(640, 400), array(900, 563)),
                        '(max-width: 1023px) calc(100vw - 32px), 493px',
                        array('class' => 'w-full h-full object-cover')
                    ); ?>
                </div>

                <div class="grid gap-8">
                    <!-- Support Hours -->
                    <div class="flex gap-5">
                        <div class="shrink-0 w-12 h-12 rounded-2xl bg-[#c98a8a] flex items-center justify-center text-white shadow-md">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-[#2F2A28] mb-1"><?php esc_html_e('Support Availability', 'dawp'); ?></h3>
                            <p class="text-[#6F625D] leading-relaxed">
                                <?php esc_html_e('Monday-Friday, 10:00 AM-6:00 PM PST', 'dawp'); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Email Support -->
                    <div class="flex gap-5">
                        <div class="shrink-0 w-12 h-12 rounded-2xl bg-[#c98a8a] flex items-center justify-center text-white shadow-md">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-[#2F2A28] mb-1"><?php esc_html_e('Email Support', 'dawp'); ?></h3>
                            <p class="text-[#6F625D] leading-relaxed">
                                <a href="mailto:support@shopkelli.com" class="hover:text-[#c98a8a] transition-colors">support@shopkelli.com</a>
                            </p>
                        </div>
                    </div>

                    <?php if ('' !== $store_address) : ?>
                        <!-- Physical Address (GMC Priority) -->
                        <div class="flex gap-5">
                            <div class="shrink-0 w-12 h-12 rounded-2xl bg-[#c98a8a] flex items-center justify-center text-white shadow-md">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-[#2F2A28] mb-1"><?php esc_html_e('Our Location', 'dawp'); ?></h3>
                                <p class="text-[#6F625D] leading-relaxed">
                                    <?php echo esc_html($store_address); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

            <!-- Right Side: Contact Form -->
            <div class="lg:col-span-7 bg-white p-8 lg:p-12 rounded-3xl border border-[#E6DDD6] shadow-sm">
                <form id="contact-form" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="contact_name" class="text-sm font-bold text-[#2F2A28]">
                                <?php esc_html_e('Your Name', 'dawp'); ?> <span class="text-[#c98a8a]">*</span>
                            </label>
                            <input type="text" id="contact_name" name="name" required
                                   class="w-full px-4 py-3 rounded-xl bg-[#FAF7F2] border border-[#E6DDD6] focus:outline-none focus:border-[#c98a8a] focus:ring-1 focus:ring-[#c98a8a] transition-all text-[#2F2A28]"
                                   placeholder="<?php esc_attr_e('e.g. Sarah Johnson', 'dawp'); ?>">
                        </div>
                        <div class="space-y-2">
                            <label for="contact_email" class="text-sm font-bold text-[#2F2A28]">
                                <?php esc_html_e('Email Address', 'dawp'); ?> <span class="text-[#c98a8a]">*</span>
                            </label>
                            <input type="email" id="contact_email" name="email" required
                                   class="w-full px-4 py-3 rounded-xl bg-[#FAF7F2] border border-[#E6DDD6] focus:outline-none focus:border-[#c98a8a] focus:ring-1 focus:ring-[#c98a8a] transition-all text-[#2F2A28]"
                                   placeholder="<?php esc_attr_e('sarah@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="contact_subject" class="text-sm font-bold text-[#2F2A28]">
                            <?php esc_html_e('Subject', 'dawp'); ?>
                        </label>
                        <select id="contact_subject" name="subject"
                                class="w-full px-4 py-3 rounded-xl bg-[#FAF7F2] border border-[#E6DDD6] focus:outline-none focus:border-[#c98a8a] transition-all text-[#2F2A28]">
                            <option value="general"><?php esc_html_e('General Inquiry', 'dawp'); ?></option>
                            <option value="order"><?php esc_html_e('Order Status', 'dawp'); ?></option>
                            <option value="styling"><?php esc_html_e('Styling Help', 'dawp'); ?></option>
                            <option value="return"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="contact_message" class="text-sm font-bold text-[#2F2A28]">
                            <?php esc_html_e('Your Message', 'dawp'); ?> <span class="text-[#c98a8a]">*</span>
                        </label>
                        <textarea id="contact_message" name="message" rows="5" required
                                  class="w-full px-4 py-3 rounded-xl bg-[#FAF7F2] border border-[#E6DDD6] focus:outline-none focus:border-[#c98a8a] focus:ring-1 focus:ring-[#c98a8a] transition-all text-[#2F2A28] resize-none"
                                  placeholder="<?php esc_attr_e('How can we help you today?', 'dawp'); ?>"></textarea>
                    </div>

                    <button type="submit"
                            class="w-full py-4 px-8 bg-[#c98a8a] text-white font-bold rounded-xl hover:bg-[#b37a7a] transition-all shadow-md active:scale-[0.98]">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>

                    <p id="contact-msg" aria-live="polite" style="display:none" class="text-sm text-center font-bold"></p>

                    <p class="text-xs text-[#9A8C86] text-center italic">
                        <?php esc_html_e('Our boutique team typically responds within 24 business hours.', 'dawp'); ?>
                    </p>
                </form>
            </div>

        </div>
    </section>

    <!-- Quick Help Section -->
    <section class="py-20 px-4 bg-white border-t border-[#E6DDD6]">
        <div class="max-w-[1280px] mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-2xl lg:text-3xl font-serif text-[#2F2A28]"><?php esc_html_e('Quick Answers', 'dawp'); ?></h2>
                <p class="text-[#6F625D] mt-2"><?php esc_html_e('Find what you need even faster.', 'dawp'); ?></p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="group p-6 rounded-2xl border border-[#E6DDD6] hover:bg-[#FAF7F2] hover:border-[#c98a8a] transition-all">
                    <h3 class="text-lg font-bold text-[#2F2A28] group-hover:text-[#c98a8a] transition-colors mb-2"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="text-sm text-[#6F625D] leading-relaxed"><?php esc_html_e('View our 5:00 PM (GMT-08:00) Pacific Standard Time cutoff, 1-3 business day handling time, 5-7 business day transit time, and free U.S. standard shipping details.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="group p-6 rounded-2xl border border-[#E6DDD6] hover:bg-[#FAF7F2] hover:border-[#c98a8a] transition-all">
                    <h3 class="text-lg font-bold text-[#2F2A28] group-hover:text-[#c98a8a] transition-colors mb-2"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h3>
                    <p class="text-sm text-[#6F625D] leading-relaxed"><?php esc_html_e('Review our 30-day return window, original-condition requirements, return shipping fee rules, no restocking fee, refund timing, and exchange handling.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="group p-6 rounded-2xl border border-[#E6DDD6] hover:bg-[#FAF7F2] hover:border-[#c98a8a] transition-all">
                    <h3 class="text-lg font-bold text-[#2F2A28] group-hover:text-[#c98a8a] transition-colors mb-2"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h3>
                    <p class="text-sm text-[#6F625D] leading-relaxed"><?php esc_html_e('Find answers to our most common customer inquiries.', 'dawp'); ?></p>
                </a>
            </div>
        </div>
    </section>
</main>
