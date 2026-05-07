<?php
/**
 * Template Name: About Us
 * Template Part: page-about
 */
?>

<main class="bg-[#FAF7F2]">
    <!-- Hero Section -->
    <section class="relative h-[500px] lg:h-[650px] flex items-center justify-center overflow-hidden">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/store_about.png'); ?>" 
             alt="About Shop Kelli Boutique" 
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="relative z-10 text-center px-4 max-w-3xl">
            <h1 class="text-4xl lg:text-6xl font-serif text-white mb-6 drop-shadow-md">
                <?php esc_html_e('The Heart of Our Boutique', 'dawp'); ?>
            </h1>
            <p class="text-lg lg:text-xl text-white/95 leading-relaxed font-medium max-w-2xl mx-auto">
                <?php esc_html_e('Welcome to Shop Kelli, where every piece is chosen with love for women, young girls, and the families that bring them joy.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-20 px-4 lg:px-8">
        <div class="max-w-[1280px] mx-auto grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <div class="inline-block px-4 py-1.5 rounded-full bg-[#c98a8a]/10 text-[#c98a8a] text-sm font-bold uppercase tracking-widest">
                    <?php esc_html_e('Our Journey', 'dawp'); ?>
                </div>
                <h2 class="text-3xl lg:text-4xl font-serif text-[#2F2A28]">
                    <?php esc_html_e('From a Local Boutique to Your Doorstep', 'dawp'); ?>
                </h2>
                <div class="space-y-6 text-[#6F625D] leading-relaxed text-lg">
                    <p>
                        <?php esc_html_e('Shop Kelli began as a dream in the heart of Merced, California. We started as a small, local boutique with a simple mission: to provide women and young girls with beautiful, high-quality clothing that feels as good as it looks.', 'dawp'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('Our founder envisioned a space that felt less like a store and more like a community, a place where mothers could find the perfect outfit for their daughters, and women could discover styles that celebrate their unique journey.', 'dawp'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('Today, we are thrilled to bring that same warm, family-oriented boutique experience online, serving families across the United States with the same care and personal touch that defined our very first days.', 'dawp'); ?>
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-[#E8D8C8] rounded-2xl -rotate-2"></div>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/about_babyandmom.png'); ?>" 
                     alt="Mommy and Daughter laughing" 
                     class="relative rounded-xl shadow-xl w-full h-auto object-cover aspect-square">
            </div>
        </div>
    </section>

    <!-- Brand Values Section -->
    <section class="bg-white py-20 px-4 lg:px-8 border-y border-[#E6DDD6]">
        <div class="max-w-[1280px] mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-serif text-[#2F2A28] mb-4">
                    <?php esc_html_e('What Defines Us', 'dawp'); ?>
                </h2>
                <p class="text-[#6F625D] max-w-2xl mx-auto text-lg">
                    <?php esc_html_e('At Shop Kelli, we believe fashion is more than just clothes,it’s about the memories you make in them.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="p-8 rounded-2xl bg-[#FAF7F2] border border-[#E6DDD6] text-center space-y-4">
                    <div class="w-16 h-16 bg-[#c98a8a]/10 rounded-full flex items-center justify-center mx-auto text-[#c98a8a]">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#2F2A28]"><?php esc_html_e('Family First', 'dawp'); ?></h3>
                    <p class="text-[#6F625D] leading-relaxed">
                        <?php esc_html_e('We specialize in mommy & me styles and family-friendly fashion because we know that the best moments are shared.', 'dawp'); ?>
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="p-8 rounded-2xl bg-[#FAF7F2] border border-[#E6DDD6] text-center space-y-4">
                    <div class="w-16 h-16 bg-[#c98a8a]/10 rounded-full flex items-center justify-center mx-auto text-[#c98a8a]">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#2F2A28]"><?php esc_html_e('Authentic Quality', 'dawp'); ?></h3>
                    <p class="text-[#6F625D] leading-relaxed">
                        <?php esc_html_e('We hand-select every item in our collection, ensuring that comfort and durability never compromise on boutique style.', 'dawp'); ?>
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="p-8 rounded-2xl bg-[#FAF7F2] border border-[#E6DDD6] text-center space-y-4">
                    <div class="w-16 h-16 bg-[#c98a8a]/10 rounded-full flex items-center justify-center mx-auto text-[#c98a8a]">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v4l3 3"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#2F2A28]"><?php esc_html_e('Transparent Trust', 'dawp'); ?></h3>
                    <p class="text-[#6F625D] leading-relaxed">
                        <?php esc_html_e('As a real boutique, we value honesty. No hidden fees, clear shipping times, and a support team that actually cares.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- GMC Compliance & Trust Section -->
    <section class="py-20 px-4 lg:px-8 bg-[#FAF7F2]">
        <div class="max-w-[1000px] mx-auto bg-white p-10 lg:p-16 rounded-3xl shadow-sm border border-[#E6DDD6]">
            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-2xl font-serif text-[#2F2A28] mb-6"><?php esc_html_e('Visit Us or Get in Touch', 'dawp'); ?></h2>
                    <p class="text-[#6F625D] mb-8 leading-relaxed">
                        <?php esc_html_e('Transparency is key to our relationship with you. We are a registered business based in California, and we are always here to help with your orders or questions.', 'dawp'); ?>
                    </p>
                    <div class="space-y-6">
                        <div class="flex gap-4 items-start">
                            <div class="mt-1 text-[#c98a8a]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#2F2A28]"><?php esc_html_e('Our Boutique Location', 'dawp'); ?></h4>
                                <p class="text-[#6F625D]"><?php esc_html_e('1777 Canal St, Merced, CA, 95340, United States', 'dawp'); ?></p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="mt-1 text-[#c98a8a]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#2F2A28]"><?php esc_html_e('Customer Support', 'dawp'); ?></h4>
                                <p class="text-[#6F625D]"><?php esc_html_e('support@shopkelli.com', 'dawp'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-[#F5F3F1] p-8 rounded-2xl flex flex-col justify-center text-center space-y-6">
                    <h3 class="text-xl font-bold text-[#2F2A28]"><?php esc_html_e('Need Assistance?', 'dawp'); ?></h3>
                    <p class="text-[#6F625D]">
                        <?php esc_html_e('Our team is available Monday – Saturday, 10:00 AM – 6:00 PM (PST) to help you with sizing, styling, or order tracking.', 'dawp'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" 
                       class="inline-block px-8 py-3 bg-[#c98a8a] text-white font-bold rounded-lg hover:bg-[#b37a7a] transition-colors shadow-md">
                        <?php esc_html_e('Contact Us Today', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Final Brand Message -->
    <section class="py-20 text-center px-4 bg-[#FAF7F2]">
        <div class="max-w-2xl mx-auto space-y-6">
            <h2 class="text-3xl font-serif text-[#2F2A28]">
                <?php esc_html_e('Join Our Boutique Community', 'dawp'); ?>
            </h2>
            <p class="text-lg text-[#6F625D] leading-relaxed italic">
                <?php esc_html_e('"Shop Kelli is more than a store. It’s a celebration of family, the joy of motherhood, and the beautiful outfits we wear along the way."', 'dawp'); ?>
            </p>
            <div class="pt-6">
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="text-[#c98a8a] font-bold border-b-2 border-[#c98a8a] hover:text-[#b37a7a] hover:border-[#b37a7a] transition-all pb-1">
                    <?php esc_html_e('Explore Our Collections', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>
</main>
