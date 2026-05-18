<?php
/**
 * Template Part: page-shipping-returns
 */
?>

<div id="primary" class="bg-white font-body text-[#2D2633]">
    <!-- Hero -->
    <section class="bg-[#EAF7F0] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-6xl">
                <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg leading-8 text-[#6B6470]">
                <?php esc_html_e('Everything you need to know about getting your beauty essentials and our return process.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-12">
                <!-- Shipping -->
                <div class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-8 shadow-sm">
                    <div class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#F7C948]">
                        <svg class="h-6 w-6 text-[#2D2633]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h2 class="font-heading text-3xl font-black text-[#2D2633] mb-4">
                        <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                    </h2>
                    <div class="prose prose-lg text-[#6B6470] max-w-none">
                        <p><?php esc_html_e('At One Shop Vibe, we want to get your beauty essentials to you as quickly as possible. Here is what to expect when you place an order with us:', 'dawp'); ?></p>
                        <ul class="list-disc pl-5 mt-4 space-y-2 font-medium">
                            <li><strong><?php esc_html_e('Processing Time:', 'dawp'); ?></strong> <?php esc_html_e('Orders are processed within 2–4 business days.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Shipping Time:', 'dawp'); ?></strong> <?php esc_html_e('After dispatch, standard US shipping typically takes 5–10 business days depending on the destination and carrier conditions.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Order Tracking:', 'dawp'); ?></strong> <?php esc_html_e('Tracking information is provided via email once your order ships, so you can follow its journey to your door.', 'dawp'); ?></li>
                        </ul>
                    </div>
                </div>

                <!-- Returns -->
                <div class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-8 shadow-sm">
                    <div class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#DCD5FF]">
                        <svg class="h-6 w-6 text-[#2D2633]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                        </svg>
                    </div>
                    <h2 class="font-heading text-3xl font-black text-[#2D2633] mb-4">
                        <?php esc_html_e('Return Policy', 'dawp'); ?>
                    </h2>
                    <div class="prose prose-lg text-[#6B6470] max-w-none">
                        <p><?php esc_html_e('We want you to love your everyday self-care tools. If you are not completely satisfied, you may request a return within 30 days of delivery.', 'dawp'); ?></p>
                        
                        <h3 class="text-xl font-bold text-[#2D2633] mt-6 mb-3"><?php esc_html_e('Eligibility Conditions', 'dawp'); ?></h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><?php esc_html_e('Items must be unused and undamaged.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Items must be in their original condition.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Items should be returned with their original packaging where applicable.', 'dawp'); ?></li>
                        </ul>

                        <div class="mt-6 p-4 bg-[#F6F7F9] rounded-xl border-l-4 border-[#2D2633]">
                            <p class="text-sm font-bold text-[#2D2633] uppercase tracking-wide mb-1"><?php esc_html_e('Hygiene & Personal Care Items', 'dawp'); ?></p>
                            <p class="text-sm"><?php esc_html_e('For personal care and beauty accessories, return eligibility may depend on hygiene and original condition requirements. Opened or used personal care tools cannot be accepted for health and safety reasons.', 'dawp'); ?></p>
                        </div>

                        <p class="mt-6"><?php esc_html_e('To initiate a return, please contact our support team at support@oneshopvibe.com with your order number and the reason for your return. We will provide you with further instructions.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
