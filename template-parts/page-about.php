<?php
/**
 * About page template part for Corvelshop.
 *
 * @package dawp
 */

$theme_uri        = get_template_directory_uri();
$shop_url         = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url      = home_url('/contact-us/');
$hero_image       = $theme_uri . '/assets/images/home/luxuryimagecollection/3.jpg';
$statement_image  = $theme_uri . '/assets/images/home/luxuryimagecollection/4.jpg';
$editorial_image  = $theme_uri . '/assets/images/home/luxuryimagecollection/5.jpg';
?>

<div class="cv-about bg-[#F5F2EB] text-[#171A19]">
    <section class="relative overflow-hidden bg-[#0D0F0F] text-white">
        <div class="mx-auto grid min-h-[calc(92svh-78px)] w-[min(100%-40px,1360px)] gap-10 py-14 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:items-center md:py-20">
            <div class="relative z-10 md:col-span-5">
                <p class="mb-5 text-[12px] font-semibold uppercase tracking-[.26em] text-[#B38A52]"><?php esc_html_e('About Corvelshop', 'dawp'); ?></p>
                <h1 class="font-serif text-[clamp(42px,6vw,64px)] leading-[.98] tracking-normal"><?php esc_html_e('Precision with Presence.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-[500px] text-[16px] leading-7 text-[#D8D6CF]"><?php esc_html_e('Corvelshop is a modern watch destination built for strong silhouettes, refined materials, and a shopping experience that feels considered from first glance to final checkout.', 'dawp'); ?></p>
                <div class="mt-9 flex flex-wrap gap-3">
                    <a class="cv-btn cv-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                    <a class="cv-btn cv-btn--ghost" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                </div>
            </div>

            <div class="md:col-span-7">
                <div class="relative overflow-hidden border border-white/12">
                    <?php
                    echo qb_responsive_image(
                        $hero_image,
                        __('Corvelshop modern luxury watch editorial scene', 'dawp'),
                        [
                            'class'   => 'aspect-[4/5] w-full object-cover object-center opacity-95 md:aspect-[16/11]',
                            'width'   => 1536,
                            'height'  => 1024,
                            'widths'  => [640, 960, 1280, 1536],
                            'sizes'   => '(max-width: 768px) 100vw, 58vw',
                            'loading' => 'eager',
                        ]
                    );
                    ?>
                    <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(13,15,15,.08),rgba(13,15,15,.42))]"></div>
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between border-t border-white/18 bg-[#0D0F0F]/62 px-5 py-4 text-[11px] uppercase tracking-[.2em] text-[#D8D6CF] backdrop-blur-sm">
                        <span><?php esc_html_e('Modern Time', 'dawp'); ?></span>
                        <span><?php esc_html_e('Refined Form', 'dawp'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 md:w-[min(100%-80px,1360px)] md:grid-cols-12">
            <div class="md:col-span-5">
                <p class="cv-kicker"><?php esc_html_e('Brand Idea', 'dawp'); ?></p>
                <h2 class="cv-heading"><?php esc_html_e('Modern luxury without unnecessary excess.', 'dawp'); ?></h2>
            </div>
            <div class="space-y-6 text-[16px] leading-7 text-[#5E625F] md:col-span-6 md:col-start-7">
                <p><?php esc_html_e('Corvelshop brings together contemporary watch design, confident styling, and a premium ecommerce experience for customers who want presence without noise.', 'dawp'); ?></p>
                <p><?php esc_html_e('Our point of view is simple: the watch should lead. Photography creates desire, clean product presentation creates trust, and every detail should feel deliberate.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 md:py-24">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:items-center">
            <div class="md:col-span-6">
                <div class="overflow-hidden">
                    <?php
                    echo qb_responsive_image(
                        $statement_image,
                        __('Refined watch detail with dark editorial styling', 'dawp'),
                        [
                            'class'   => 'aspect-[5/6] w-full object-cover object-center transition duration-500 hover:scale-[1.02] md:aspect-[4/5]',
                            'width'   => 1536,
                            'height'  => 1024,
                            'widths'  => [640, 960, 1280, 1536],
                            'sizes'   => '(max-width: 768px) 100vw, 50vw',
                            'loading' => 'lazy',
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="md:col-span-5 md:col-start-8">
                <p class="cv-kicker"><?php esc_html_e('Editorial Standard', 'dawp'); ?></p>
                <h2 class="cv-heading"><?php esc_html_e('Designed to be noticed. Edited to stay refined.', 'dawp'); ?></h2>
                <div class="mt-8 grid gap-7 sm:grid-cols-3 md:grid-cols-1">
                    <div>
                        <span class="cv-detail-line"></span>
                        <h3 class="cv-detail-title"><?php esc_html_e('Presence', 'dawp'); ?></h3>
                        <p class="cv-detail-copy"><?php esc_html_e('Strong forms, clean proportions, and styling with quiet confidence.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <span class="cv-detail-line"></span>
                        <h3 class="cv-detail-title"><?php esc_html_e('Material', 'dawp'); ?></h3>
                        <p class="cv-detail-copy"><?php esc_html_e('Steel, leather, smoked glass, ivory surfaces, and restrained metallic detail.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <span class="cv-detail-line"></span>
                        <h3 class="cv-detail-title"><?php esc_html_e('Clarity', 'dawp'); ?></h3>
                        <p class="cv-detail-copy"><?php esc_html_e('A focused store experience built for scanning, comparing, and choosing well.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#0D0F0F] text-white">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 py-16 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:py-24">
            <div class="md:col-span-5">
                <p class="mb-5 text-[12px] font-semibold uppercase tracking-[.24em] text-[#B38A52]"><?php esc_html_e('Campaign Rhythm', 'dawp'); ?></p>
                <h2 class="font-serif text-[clamp(32px,4vw,46px)] leading-tight"><?php esc_html_e('A store with the restraint of an editorial page.', 'dawp'); ?></h2>
                <p class="mt-6 text-[16px] leading-7 text-[#D8D6CF]"><?php esc_html_e('Dark campaign sections build atmosphere. Light shopping sections keep every choice clear.', 'dawp'); ?></p>
            </div>
            <div class="md:col-span-6 md:col-start-7">
                <div class="overflow-hidden">
                    <?php
                    echo qb_responsive_image(
                        $editorial_image,
                        __('Silver luxury watch on ivory architectural surface', 'dawp'),
                        [
                            'class'   => 'aspect-[16/10] w-full object-cover transition duration-500 hover:scale-[1.02]',
                            'width'   => 1536,
                            'height'  => 1024,
                            'widths'  => [640, 960, 1280, 1536],
                            'sizes'   => '(max-width: 768px) 100vw, 50vw',
                            'loading' => 'lazy',
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24">
        <div class="mx-auto w-[min(100%-40px,1360px)] border-y border-[#B8B8B2]/55 py-12 md:w-[min(100%-80px,1360px)] md:py-16">
            <div class="grid gap-10 md:grid-cols-12">
                <div class="md:col-span-4">
                    <p class="cv-kicker"><?php esc_html_e('Corvel Standard', 'dawp'); ?></p>
                    <h2 class="cv-heading"><?php esc_html_e('Built around the details.', 'dawp'); ?></h2>
                </div>
                <div class="grid gap-7 sm:grid-cols-3 md:col-span-7 md:col-start-6">
                    <div>
                        <span class="cv-detail-line"></span>
                        <h3 class="cv-detail-title"><?php esc_html_e('Dynamic Store', 'dawp'); ?></h3>
                        <p class="cv-detail-copy"><?php esc_html_e('Products, pricing, stock, checkout, and account flows stay powered by WooCommerce.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <span class="cv-detail-line"></span>
                        <h3 class="cv-detail-title"><?php esc_html_e('Clear Policies', 'dawp'); ?></h3>
                        <p class="cv-detail-copy"><?php esc_html_e('Straightforward support pages for shipping, returns, privacy, and order tracking.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <span class="cv-detail-line"></span>
                        <h3 class="cv-detail-title"><?php esc_html_e('Refined Service', 'dawp'); ?></h3>
                        <p class="cv-detail-copy"><?php esc_html_e('Secure checkout, careful presentation, and support when a customer needs a human answer.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#263C33] py-14 text-white md:py-18">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-7 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:items-center">
            <div class="md:col-span-7">
                <p class="mb-4 text-[12px] font-semibold uppercase tracking-[.24em] text-[#D7B987]"><?php esc_html_e('Corvelshop', 'dawp'); ?></p>
                <h2 class="font-serif text-[clamp(30px,3.6vw,42px)] leading-tight"><?php esc_html_e('Time, made distinct.', 'dawp'); ?></h2>
            </div>
            <div class="flex flex-wrap gap-3 md:col-span-4 md:col-start-9 md:justify-end">
                <a class="cv-btn cv-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore Watches', 'dawp'); ?></a>
                <a class="cv-btn cv-btn--ghost" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
