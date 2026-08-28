<?php
/**
 * Contact page template part for Corvelshop.
 *
 * @package dawp
 */

$theme_uri      = get_template_directory_uri();
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@corvelshop.com';
$contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$hero_image     = $theme_uri . '/assets/images/home/luxuryimagecollection/6.jpg';
$detail_image   = $theme_uri . '/assets/images/home/luxuryimagecollection/7.jpg';

$status_messages = [
    'sent'    => __('Your message has been received. Our support team aims to reply within 1 business day.', 'dawp'),
    'invalid' => __('Please check the required fields and try again.', 'dawp'),
    'failed'  => __('We could not send your message right now. Please email us directly.', 'dawp'),
];

$topics = [
    __('Order question', 'dawp'),
    __('Tracking help', 'dawp'),
    __('Return request', 'dawp'),
    __('Product or size question', 'dawp'),
    __('Damaged or incorrect item', 'dawp'),
    __('Other', 'dawp'),
];
?>

<div class="cv-contact bg-[#F5F2EB] text-[#171A19]">
    <section class="relative overflow-hidden bg-[#0D0F0F] text-white">
        <div class="absolute inset-0">
            <?php
            echo qb_responsive_image(
                $hero_image,
                __('Silver luxury watch on ivory architectural surface', 'dawp'),
                [
                    'class'   => 'h-full w-full object-cover object-center opacity-72',
                    'width'   => 1536,
                    'height'  => 1024,
                    'widths'  => [768, 1024, 1360, 1536],
                    'sizes'   => '100vw',
                    'loading' => 'eager',
                ]
            );
            ?>
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(13,15,15,.95),rgba(13,15,15,.68)_45%,rgba(13,15,15,.18)_86%)]"></div>
        </div>

        <div class="relative mx-auto grid min-h-[520px] w-[min(100%-40px,1360px)] items-center py-20 md:min-h-[660px] md:w-[min(100%-80px,1360px)] md:py-24">
            <div class="max-w-[650px]">
                <p class="mb-5 text-[12px] font-semibold uppercase tracking-[.26em] text-[#B38A52]"><?php esc_html_e('Contact Corvelshop', 'dawp'); ?></p>
                <h1 class="font-serif text-[clamp(42px,6vw,58px)] leading-[1.02] tracking-normal"><?php esc_html_e('Support with Precision.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-[510px] text-[16px] leading-7 text-[#D8D6CF]"><?php esc_html_e('Questions about an order, delivery, return, or watch detail are handled through one focused support desk.', 'dawp'); ?></p>
                <div class="mt-9 flex flex-wrap gap-3">
                    <a class="cv-btn cv-btn--light" href="#contact-form"><?php esc_html_e('Write to Support', 'dawp'); ?></a>
                    <a class="cv-btn cv-btn--ghost" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 md:w-[min(100%-80px,1360px)] md:grid-cols-12">
            <div class="md:col-span-5">
                <p class="cv-kicker"><?php esc_html_e('Support Desk', 'dawp'); ?></p>
                <h2 class="cv-heading"><?php esc_html_e('Direct, clear, and handled with care.', 'dawp'); ?></h2>
                <p class="mt-5 max-w-[470px] text-[15px] leading-7 text-[#5E625F]"><?php esc_html_e('Use the form for the fastest routing. Include your order number when your message is about an existing purchase.', 'dawp'); ?></p>
            </div>

            <div class="grid gap-4 md:col-span-6 md:col-start-7 sm:grid-cols-2">
                <div class="border border-[#B8B8B2]/55 bg-white p-6">
                    <span class="cv-detail-line"></span>
                    <h3 class="cv-detail-title"><?php esc_html_e('Email', 'dawp'); ?></h3>
                    <a class="break-words text-[15px] font-medium text-[#263C33] transition duration-300 hover:text-[#B38A52]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                </div>
                <div class="border border-[#B8B8B2]/55 bg-white p-6">
                    <span class="cv-detail-line"></span>
                    <h3 class="cv-detail-title"><?php esc_html_e('Response', 'dawp'); ?></h3>
                    <p class="text-[15px] leading-7 text-[#5E625F]"><?php esc_html_e('Within 1 business day.', 'dawp'); ?></p>
                </div>
                <div class="border border-[#B8B8B2]/55 bg-white p-6">
                    <span class="cv-detail-line"></span>
                    <h3 class="cv-detail-title"><?php esc_html_e('Orders', 'dawp'); ?></h3>
                    <p class="text-[15px] leading-7 text-[#5E625F]"><?php esc_html_e('Tracking, delivery, returns, and order changes.', 'dawp'); ?></p>
                </div>
                <div class="border border-[#B8B8B2]/55 bg-white p-6">
                    <span class="cv-detail-line"></span>
                    <h3 class="cv-detail-title"><?php esc_html_e('Products', 'dawp'); ?></h3>
                    <p class="text-[15px] leading-7 text-[#5E625F]"><?php esc_html_e('Fit, materials, styling, and product details.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-form" class="bg-white py-16 md:py-24">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 md:w-[min(100%-80px,1360px)] md:grid-cols-12">
            <div class="md:col-span-5">
                <div class="sticky top-24">
                    <p class="cv-kicker"><?php esc_html_e('Message', 'dawp'); ?></p>
                    <h2 class="cv-heading"><?php esc_html_e('Tell us what needs attention.', 'dawp'); ?></h2>
                    <p class="mt-5 text-[15px] leading-7 text-[#5E625F]"><?php esc_html_e('A precise message helps us resolve the request faster. For order support, add the order number and checkout email.', 'dawp'); ?></p>
                    <div class="mt-8 overflow-hidden">
                        <?php
                        echo qb_responsive_image(
                            $detail_image,
                            __('Modern black luxury watch campaign image', 'dawp'),
                            [
                                'class'   => 'aspect-[16/10] md:aspect-[16/11] w-full object-cover transition duration-500 hover:scale-[1.02]',
                                'width'   => 1024,
                                'height'  => 1280,
                                'widths'  => [480, 768, 1024],
                                'sizes'   => '(max-width: 768px) 100vw, 38vw',
                                'loading' => 'lazy',
                            ]
                        );
                        ?>
                    </div>
                </div>
            </div>

            <div class="md:col-span-6 md:col-start-7">
                <?php if (isset($status_messages[$contact_status])) : ?>
                    <div class="mb-6 border px-5 py-4 text-[14px] leading-6 <?php echo 'sent' === $contact_status ? 'border-[#263C33]/25 bg-[#263C33]/8 text-[#263C33]' : 'border-[#B38A52]/35 bg-[#B38A52]/10 text-[#171A19]'; ?>">
                        <?php echo esc_html($status_messages[$contact_status]); ?>
                    </div>
                <?php endif; ?>

                <form class="grid gap-5" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="dawp_contact_form">
                    <?php wp_nonce_field('dawp_contact_form', 'dawp_contact_nonce'); ?>
                    <div class="hidden" aria-hidden="true">
                        <label for="contact-website"><?php esc_html_e('Website', 'dawp'); ?></label>
                        <input id="contact-website" type="text" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-[12px] font-semibold uppercase tracking-[.18em] text-[#171A19]" for="contact-name"><?php esc_html_e('Name', 'dawp'); ?></label>
                            <input id="contact-name" class="min-h-12 w-full border border-[#B8B8B2]/65 bg-[#F5F2EB] px-4 text-[15px] text-[#171A19] outline-none transition duration-300 placeholder:text-[#777] focus:border-[#263C33] focus:bg-white" type="text" name="contact_name" autocomplete="name" required>
                        </div>
                        <div>
                            <label class="mb-2 block text-[12px] font-semibold uppercase tracking-[.18em] text-[#171A19]" for="contact-email"><?php esc_html_e('Email', 'dawp'); ?></label>
                            <input id="contact-email" class="min-h-12 w-full border border-[#B8B8B2]/65 bg-[#F5F2EB] px-4 text-[15px] text-[#171A19] outline-none transition duration-300 placeholder:text-[#777] focus:border-[#263C33] focus:bg-white" type="email" name="contact_email" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-[12px] font-semibold uppercase tracking-[.18em] text-[#171A19]" for="contact-topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="contact-topic" class="min-h-12 w-full border border-[#B8B8B2]/65 bg-[#F5F2EB] px-4 text-[15px] text-[#171A19] outline-none transition duration-300 focus:border-[#263C33] focus:bg-white" name="contact_topic" required>
                                <option value=""><?php esc_html_e('Select a topic', 'dawp'); ?></option>
                                <?php foreach ($topics as $topic) : ?>
                                    <option value="<?php echo esc_attr($topic); ?>"><?php echo esc_html($topic); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="mb-2 block text-[12px] font-semibold uppercase tracking-[.18em] text-[#171A19]" for="contact-order"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                            <input id="contact-order" class="min-h-12 w-full border border-[#B8B8B2]/65 bg-[#F5F2EB] px-4 text-[15px] text-[#171A19] outline-none transition duration-300 placeholder:text-[#777] focus:border-[#263C33] focus:bg-white" type="text" name="contact_order" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>" autocomplete="off">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-[12px] font-semibold uppercase tracking-[.18em] text-[#171A19]" for="contact-message"><?php esc_html_e('Message', 'dawp'); ?></label>
                        <textarea id="contact-message" class="min-h-[180px] w-full resize-y border border-[#B8B8B2]/65 bg-[#F5F2EB] px-4 py-3 text-[15px] leading-7 text-[#171A19] outline-none transition duration-300 placeholder:text-[#777] focus:border-[#263C33] focus:bg-white" name="contact_message" required></textarea>
                    </div>

                    <label class="flex gap-3 text-[13px] leading-6 text-[#5E625F]">
                        <input class="mt-1 h-4 w-4 shrink-0 accent-[#263C33]" type="checkbox" name="contact_consent" required>
                        <span><?php esc_html_e('I agree that Corvelshop may use this information to respond to my request.', 'dawp'); ?></span>
                    </label>

                    <button class="cv-btn cv-btn--dark w-full sm:w-fit" type="submit"><?php esc_html_e('Send Message', 'dawp'); ?></button>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-[#0D0F0F] py-16 text-white md:py-24">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:items-center">
            <div class="md:col-span-5">
                <p class="mb-4 text-[12px] font-semibold uppercase tracking-[.24em] text-[#B38A52]"><?php esc_html_e('Before You Write', 'dawp'); ?></p>
                <h2 class="font-serif text-[clamp(30px,4vw,42px)] leading-tight"><?php esc_html_e('A few details make support faster.', 'dawp'); ?></h2>
            </div>
            <div class="grid gap-6 md:col-span-6 md:col-start-7 sm:grid-cols-3">
                <div class="border-t border-white/20 pt-5">
                    <h3 class="mb-3 text-[12px] font-semibold uppercase tracking-[.2em] text-white"><?php esc_html_e('Order', 'dawp'); ?></h3>
                    <p class="text-[14px] leading-6 text-[#D8D6CF]"><?php esc_html_e('Add your order number and checkout email.', 'dawp'); ?></p>
                </div>
                <div class="border-t border-white/20 pt-5">
                    <h3 class="mb-3 text-[12px] font-semibold uppercase tracking-[.2em] text-white"><?php esc_html_e('Delivery', 'dawp'); ?></h3>
                    <p class="text-[14px] leading-6 text-[#D8D6CF]"><?php esc_html_e('Check tracking first for the latest carrier scan.', 'dawp'); ?></p>
                </div>
                <div class="border-t border-white/20 pt-5">
                    <h3 class="mb-3 text-[12px] font-semibold uppercase tracking-[.2em] text-white"><?php esc_html_e('Returns', 'dawp'); ?></h3>
                    <p class="text-[14px] leading-6 text-[#D8D6CF]"><?php esc_html_e('Contact support before sending an item back.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 md:py-18">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-7 border-y border-[#B8B8B2]/55 py-12 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:items-center">
            <div class="md:col-span-6">
                <p class="cv-kicker"><?php esc_html_e('Need a Shortcut?', 'dawp'); ?></p>
                <h2 class="cv-heading"><?php esc_html_e('Order status lives one step away.', 'dawp'); ?></h2>
            </div>
            <div class="flex flex-wrap gap-3 md:col-span-5 md:col-start-8">
                <a class="cv-btn cv-btn--dark" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                <a class="cv-btn border-[#263C33] bg-transparent text-[#263C33] hover:border-[#B38A52] hover:text-[#B38A52]" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
