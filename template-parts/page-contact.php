<?php
/**
 * Template Part: Contact
 *
 * @package dawp
 */
?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
    <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
    <div class="mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-24">
        <span class="mb-6 inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#E6007E] shadow-sm shadow-[#141217]/5">
            <?php esc_html_e('Contact Us', 'dawp'); ?>
        </span>
        <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl">
            <?php esc_html_e('We\'re Here To Help', 'dawp'); ?>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-[#5E5363]">
            <?php esc_html_e('Have a question about sizing, fit, or your recent order? Reach out to our support team.', 'dawp'); ?>
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:gap-16 items-start">
            <!-- Get In Touch Card -->
            <div class="relative overflow-hidden rounded-3xl border border-[#EEE5EF] bg-white p-8 shadow-xl shadow-[#141217]/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-[#141217]/10">
                <div class="absolute left-0 top-0 h-1.5 w-full bg-gradient-to-r from-[#E6007E] via-[#FF4FB8] to-[#7C3AED]"></div>
                
                <h2 class="font-heading text-3xl font-black text-[#141217]">
                    <?php esc_html_e('Get In Touch', 'dawp'); ?>
                </h2>
                <div class="mb-8 mt-4 h-1 w-16 rounded-full bg-gradient-to-r from-[#E6007E] to-[#7C3AED]"></div>
                
                <div class="flex flex-col divide-y divide-[#EEE5EF]/80">
                    <div class="flex items-start gap-5 py-6 first:pt-0">
                        <div class="mt-1 flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#F3E8FF] text-[#7C3AED] shadow-sm">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="mb-1 text-lg font-black text-[#141217]"><?php esc_html_e('Email Support', 'dawp'); ?></h3>
                            <a href="mailto:support@houseofshoesonline.com" class="text-[#E6007E] transition-colors hover:text-[#7C3AED] font-medium">support@houseofshoesonline.com</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 py-6">
                        <div class="mt-1 flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#F4DDE8] text-[#E6007E] shadow-sm">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="mb-1 text-lg font-black text-[#141217]"><?php esc_html_e('Business Hours', 'dawp'); ?></h3>
                            <p class="font-medium text-[#6F625D]"><?php esc_html_e('Monday – Friday: 9:00 AM – 6:00 PM EST', 'dawp'); ?></p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 py-6 pb-0">
                        <div class="mt-1 flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#F6F5F7] text-[#141217] shadow-sm">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="mb-1 text-lg font-black text-[#141217]"><?php esc_html_e('Business Address', 'dawp'); ?></h3>
                            <p class="font-medium leading-relaxed text-[#6F625D]">
                                <strong class="font-bold text-[#141217]"><?php esc_html_e('House of Shoes Online', 'dawp'); ?></strong><br>
                                <?php esc_html_e('4211 W Sahara Ave Ste C', 'dawp'); ?><br>
                                <?php esc_html_e('Las Vegas, NV 89102', 'dawp'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping & Returns Card -->
            <div class="relative h-full overflow-hidden rounded-3xl border border-[#EEE5EF] bg-white p-8 shadow-xl shadow-[#141217]/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-[#141217]/10">
                <div class="absolute left-0 top-0 h-1.5 w-full bg-gradient-to-r from-[#7C3AED] via-[#FF4FB8] to-[#E6007E]"></div>
                
                <h2 class="font-heading text-3xl font-black text-[#141217]">
                    <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                </h2>
                <div class="mb-8 mt-4 h-1 w-16 rounded-full bg-gradient-to-r from-[#7C3AED] to-[#E6007E]"></div>
                
                <div class="flex flex-col divide-y divide-[#EEE5EF]/80">
                    <div class="py-5 first:pt-0">
                        <h3 class="mb-2 flex items-center gap-2 text-lg font-black text-[#141217]">
                            <svg class="h-5 w-5 text-[#7C3AED]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <?php esc_html_e('Order Processing', 'dawp'); ?>
                        </h3>
                        <p class="text-[15px] leading-relaxed text-[#6F625D]"><?php esc_html_e('Orders are processed within 2–4 business days.', 'dawp'); ?></p>
                    </div>
                    
                    <div class="py-5">
                        <h3 class="mb-2 flex items-center gap-2 text-lg font-black text-[#141217]">
                            <svg class="h-5 w-5 text-[#E6007E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                            <?php esc_html_e('Shipping Time', 'dawp'); ?>
                        </h3>
                        <p class="text-[15px] leading-relaxed text-[#6F625D]"><?php esc_html_e('Standard US shipping typically takes 5–10 business days after dispatch. Tracking information is provided once your order ships.', 'dawp'); ?></p>
                    </div>
                    
                    <div class="py-5 pb-0">
                        <h3 class="mb-2 flex items-center gap-2 text-lg font-black text-[#141217]">
                            <svg class="h-5 w-5 text-[#141217]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"/></svg>
                            <?php esc_html_e('Returns', 'dawp'); ?>
                        </h3>
                        <p class="text-[15px] leading-relaxed text-[#6F625D]"><?php esc_html_e('Customers may request returns within 30 days of delivery. Eligible footwear should be unworn, undamaged, in original condition, and returned with original packaging.', 'dawp'); ?></p>
                        
                        <div class="mt-6">
                            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="inline-flex items-center gap-2 rounded-xl bg-[#F6F5F7] px-5 py-3 text-sm font-black uppercase tracking-wide text-[#141217] transition-all hover:bg-[#E6007E] hover:text-white">
                                <?php esc_html_e('View Full Policy', 'dawp'); ?> &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
