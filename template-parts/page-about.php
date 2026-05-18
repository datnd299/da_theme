<?php
/**
 * Template Part: page-about
 */

$oneshopvibe_gallery_uri = get_theme_file_uri('/assets/img/gallery/Oneshopvibe/');

$images = [
    'mission' => $oneshopvibe_gallery_uri . 'Beauty_Organizers.png',
    'values' => $oneshopvibe_gallery_uri . 'Makeup_Tools_Beauty_Accessories.png',
];
?>

<div id="primary" class="bg-white font-body text-[#2D2633]">

    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#DCD5FF]">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.4),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(247,201,72,0.2),transparent_30%)]"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24 text-center">
            <p class="mb-5 inline-flex rounded-full bg-white px-5 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#2D2633] shadow-sm">
                <?php esc_html_e('About One Shop Vibe', 'dawp'); ?>
            </p>

            <h1 class="mx-auto max-w-4xl font-heading text-5xl font-black leading-[0.96] text-[#2D2633] sm:text-6xl lg:text-7xl">
                <?php esc_html_e('Beauty essentials for simple everyday confidence.', 'dawp'); ?>
            </h1>

            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-[#4F4657]">
                <?php esc_html_e('We bring you practical beauty accessories, makeup tools, and personal care essentials designed to make your daily routine easier, more organized, and stress-free.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <!-- Mission / Story -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="order-2 lg:order-1">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#6B6470]">
                    <?php esc_html_e('Our Mission', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-5xl">
                    <?php esc_html_e('Keeping self-care simple and affordable.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6B6470]">
                    <?php esc_html_e('At One Shop Vibe, we know that an organized vanity and the right tools can make all the difference in your day. Our goal is to provide simple, reliable, and affordable beauty helpers that support your everyday routine.', 'dawp'); ?>
                </p>
                <p class="mt-4 max-w-2xl text-base leading-8 text-[#6B6470]">
                    <?php esc_html_e('Whether you are looking for soft makeup sponges, organized cosmetic storage, or daily hair care essentials, our curated collection is focused on practical items that you will reach for time and time again.', 'dawp'); ?>
                </p>

                <div class="mt-8">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                        <?php esc_html_e('Shop All Essentials', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="order-1 overflow-hidden rounded-[1.25rem] border border-[#E5E7EB] bg-white p-3 shadow-sm lg:order-2">
                <img src="<?php echo esc_url($images['mission']); ?>"
                     alt="<?php esc_attr_e('Clean vanity setup with beauty organizers and makeup tools', 'dawp'); ?>"
                     class="aspect-[4/3] w-full rounded-2xl object-cover"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="bg-[#EAF7F0] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#6B6470]">
                <?php esc_html_e('What We Offer', 'dawp'); ?>
            </p>
            <h2 class="mx-auto max-w-2xl font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-5xl">
                <?php esc_html_e('Practical tools for polished routines.', 'dawp'); ?>
            </h2>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                <div class="rounded-2xl bg-white p-8 shadow-sm text-left">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-[#DCD5FF] text-[#2D2633]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-[#2D2633]"><?php esc_html_e('Everyday Practicality', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-6 text-[#6B6470]">
                        <?php esc_html_e('No confusing gimmicks. Just simple beauty accessories and tools designed to easily fit into your day-to-day life.', 'dawp'); ?>
                    </p>
                </div>
                
                <div class="rounded-2xl bg-white p-8 shadow-sm text-left">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-[#F7C948] text-[#2D2633]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-[#2D2633]"><?php esc_html_e('Clean & Organized', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-6 text-[#6B6470]">
                        <?php esc_html_e('We love an organized vanity. Our selection of cosmetic bags and storage boxes keep your essentials neat and easy to find.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-8 shadow-sm text-left">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-[#2D2633] text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-[#2D2633]"><?php esc_html_e('Accessible Quality', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-6 text-[#6B6470]">
                        <?php esc_html_e('Good tools shouldn\'t have to be expensive. We focus on affordable essentials without compromising on reliability.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust / Customer Care -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-[1.25rem] border border-[#E5E7EB] bg-white p-3 shadow-sm">
                <img src="<?php echo esc_url($images['values']); ?>"
                     alt="<?php esc_attr_e('Makeup brushes and accessories layout', 'dawp'); ?>"
                     class="aspect-[4/3] w-full rounded-2xl object-cover"
                     loading="lazy">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#6B6470]">
                    <?php esc_html_e('Shop With Confidence', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-5xl">
                    <?php esc_html_e('Clear details and reliable support.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6B6470]">
                    <?php esc_html_e('We want your shopping experience to be as smooth as your beauty routine. Our team is dedicated to providing transparent product details, straightforward policies, and responsive customer service.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="rounded-[1.25rem] border border-[#E5E7EB] bg-[#F6F7F9] p-5">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-[#2D2633]">
                            <?php esc_html_e('Order Processing', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm leading-6 text-[#6B6470]">
                            <?php esc_html_e('Orders are typically processed within 2-4 business days before standard dispatch.', 'dawp'); ?>
                        </p>
                    </div>
                    <div class="rounded-[1.25rem] border border-[#E5E7EB] bg-[#F6F7F9] p-5">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-[#2D2633]">
                            <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm leading-6 text-[#6B6470]">
                            <?php esc_html_e('Eligible unused items in original condition can be returned within 30 days.', 'dawp'); ?>
                        </p>
                    </div>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2D2633] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#2D2633] transition hover:bg-[#F6F7F9]">
                        <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
