<?php
/**
 * Template Part: About
 *
 * @package dawp
 */
?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
    <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
    <div class="absolute inset-y-0 right-0 hidden w-[46%] bg-[linear-gradient(135deg,#F3E8FF_0%,#F4DDE8_100%)] lg:block"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-24">
        <span class="mb-6 inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#E6007E] shadow-sm shadow-[#141217]/5">
            <?php esc_html_e('About Us', 'dawp'); ?>
        </span>
        <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
            <?php esc_html_e('Everyday Shoes For Comfort, Style, And Confident Steps', 'dawp'); ?>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-[#5E5363]">
            <?php esc_html_e('Welcome to House of Shoes Online. We are a modern footwear store focused on everyday shoes designed for comfort, casual style, and daily movement.', 'dawp'); ?>
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-20 lg:space-y-32">
            
            <!-- Our Mission -->
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
                <div>
                    <span class="mb-3 block text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Our Purpose', 'dawp'); ?></span>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217] lg:text-5xl"><?php esc_html_e('Our Mission', 'dawp'); ?></h2>
                </div>
                <div class="rounded-[2rem] bg-[#F6F5F7] p-8 sm:p-10">
                    <p class="text-xl leading-relaxed text-[#6F625D]">
                        <?php esc_html_e('At House of Shoes Online, we believe that the right footwear can transform your daily routine. Our mission is to help customers find sneakers, sandals, slides, slippers, boots, and everyday footwear styles made for daily routines, casual outfits, and comfortable wear.', 'dawp'); ?>
                    </p>
                </div>
            </div>
            
            <!-- What We Offer -->
            <div>
                <div class="mb-12 max-w-3xl">
                    <span class="mb-3 block text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Our Collection', 'dawp'); ?></span>
                    <h2 class="mb-6 font-heading text-4xl font-black leading-tight text-[#141217] lg:text-5xl"><?php esc_html_e('What We Offer', 'dawp'); ?></h2>
                    <p class="text-lg leading-relaxed text-[#6F625D]">
                        <?php esc_html_e('We curate a selection of footwear focused on practicality and style. Whether you need casual sneakers for running errands, comfortable slip-ons for the weekend, or cozy slippers for relaxing at home, we have you covered.', 'dawp'); ?>
                    </p>
                </div>
                
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="group rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#E6007E]/10">
                        <span class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-[#F3E8FF] text-sm font-black text-[#7C3AED]">01</span>
                        <h3 class="mb-3 font-heading text-xl font-black text-[#141217]"><?php esc_html_e('Everyday Sneakers', 'dawp'); ?></h3>
                        <p class="text-sm leading-relaxed text-[#6F625D]"><?php esc_html_e('Casual sneakers designed for daily outfits, easy movement, and everyday wear.', 'dawp'); ?></p>
                    </div>
                    <div class="group rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#FF4FB8]/10">
                        <span class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-[#F4DDE8] text-sm font-black text-[#E6007E]">02</span>
                        <h3 class="mb-3 font-heading text-xl font-black text-[#141217]"><?php esc_html_e('Comfort Shoes', 'dawp'); ?></h3>
                        <p class="text-sm leading-relaxed text-[#6F625D]"><?php esc_html_e('Comfort-focused shoes made for daily routines, walking, and easy everyday style.', 'dawp'); ?></p>
                    </div>
                    <div class="group rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#7C3AED]/10">
                        <span class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-[#F3E8FF] text-sm font-black text-[#7C3AED]">03</span>
                        <h3 class="mb-3 font-heading text-xl font-black text-[#141217]"><?php esc_html_e('Sandals & Slides', 'dawp'); ?></h3>
                        <p class="text-sm leading-relaxed text-[#6F625D]"><?php esc_html_e('Easy sandals and slides made for relaxed days, casual outfits, and everyday comfort.', 'dawp'); ?></p>
                    </div>
                    <div class="group rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#E6007E]/10">
                        <span class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-[#F4DDE8] text-sm font-black text-[#E6007E]">04</span>
                        <h3 class="mb-3 font-heading text-xl font-black text-[#141217]"><?php esc_html_e('Boots & Slippers', 'dawp'); ?></h3>
                        <p class="text-sm leading-relaxed text-[#6F625D]"><?php esc_html_e('Seasonal boots for confident steps and soft slippers designed for simple comfort at home.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Our Commitment -->
            <div class="overflow-hidden rounded-[2rem] bg-[#141217] text-white">
                <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr]">
                    <div class="p-8 sm:p-12 lg:p-16">
                        <span class="mb-3 block text-sm font-black uppercase tracking-[0.2em] text-[#F0C7DC]"><?php esc_html_e('Our Promise', 'dawp'); ?></span>
                        <h2 class="mb-6 font-heading text-4xl font-black leading-tight lg:text-5xl"><?php esc_html_e('Our Commitment', 'dawp'); ?></h2>
                        <p class="text-lg leading-relaxed text-white/80">
                            <?php esc_html_e('We are committed to providing a modern, clean, and footwear-focused shopping experience. We prioritize clear size information, fit notes, and easy return guidance so you can shop with confidence. Discover comfortable shoes selected for your everyday lifestyle.', 'dawp'); ?>
                        </p>
                    </div>
                    <div class="bg-[linear-gradient(135deg,#E6007E_0%,#7C3AED_100%)] p-8 sm:p-12 lg:p-16 flex flex-col justify-center">
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/20">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-bold text-lg"><?php esc_html_e('Modern Experience', 'dawp'); ?></span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/20">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-bold text-lg"><?php esc_html_e('Clear Size Guidance', 'dawp'); ?></span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/20">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-bold text-lg"><?php esc_html_e('Easy Returns', 'dawp'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
