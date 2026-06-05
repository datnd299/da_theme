<?php
/**
 * Contact Us template part.
 *
 * @package dawp
 */

$theme_uri = get_template_directory_uri();
$hero_img  = $theme_uri . '/assets/img/elite/home-lifestyle-hero.png';

$quick_help = [
    [
        'number' => '01',
        'title'  => __('Track Your Order', 'dawp'),
        'copy'   => __('Use the tracking page when you have a tracking number or want to check an order status update.', 'dawp'),
        'url'    => home_url('/track-order/'),
        'color'  => '#2563EB',
    ],
    [
        'number' => '02',
        'title'  => __('Shipping Policy', 'dawp'),
        'copy'   => __('Review processing times, delivery expectations, tracking updates, and free standard U.S. shipping.', 'dawp'),
        'url'    => home_url('/shipping-policy/'),
        'color'  => '#06B6D4',
    ],
    [
        'number' => '03',
        'title'  => __('FAQ', 'dawp'),
        'copy'   => __('Find common answers about orders, products, payments, shipping, and support.', 'dawp'),
        'url'    => home_url('/faq/'),
        'color'  => '#C026D3',
    ],
    [
        'number' => '04',
        'title'  => __('Privacy Policy', 'dawp'),
        'copy'   => __('Learn how customer information is handled when shopping, checking out, or contacting support.', 'dawp'),
        'url'    => home_url('/privacy-policy/'),
        'color'  => '#65A30D',
    ],
];
?>

<div class="bg-white font-body text-[#101828]">
    <section class="relative overflow-hidden bg-[#F3F7FB]">
        <div class="absolute inset-x-0 top-0 h-24 bg-white"></div>
        <div class="absolute bottom-0 left-0 h-28 w-full bg-white"></div>

        <div class="relative mx-auto max-w-7xl px-4 pb-14 pt-10 sm:px-6 lg:px-8 lg:pb-20 lg:pt-16">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[1.25fr_0.75fr] lg:items-center">
                <div class="max-w-4xl">
                    <p class="mb-5 inline-flex rounded-full bg-[#DBEAFE] px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]">
                        <?php esc_html_e('Contact Elite Shop Express', 'dawp'); ?>
                    </p>

                    <h1 class="font-heading text-4xl font-black uppercase leading-[0.98] text-[#101828] sm:text-5xl lg:text-[4.25rem]">
                        <?php esc_html_e('Get clear help with your order.', 'dawp'); ?>
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475467]">
                        <?php esc_html_e('Questions about an order, shipping, returns, product details, or account support? Send us a message and include your order number when available.', 'dawp'); ?>
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#contact-form-1"
                           class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2563EB] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#06B6D4]">
                            <?php esc_html_e('Send A Message', 'dawp'); ?>
                        </a>

                        <a href="<?php echo esc_url(home_url('/track-order/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2563EB]/25 bg-white px-7 text-sm font-black uppercase tracking-wide text-[#2563EB] transition hover:bg-[#101828] hover:text-white">
                            <?php esc_html_e('Track Order', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1 lg:justify-self-end">
                    <a href="mailto:support@eliteshopexpress.com"
                       class="group grid grid-cols-[auto_1fr] items-center gap-5 border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-[#2563EB]/30 hover:shadow-xl hover:shadow-[#101828]/10 lg:w-[26rem]">
                        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-[#2563EB] text-sm font-black text-white">@</span>
                        <span class="min-w-0">
                            <span class="block text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('Support Email', 'dawp'); ?></span>
                            <span class="mt-2 block break-words text-base font-black leading-6 text-[#101828] group-hover:text-[#2563EB]">support@eliteshopexpress.com</span>
                        </span>
                    </a>

                    <div class="grid grid-cols-[auto_1fr] items-center gap-5 border border-[#E5E7EB] bg-white p-6 shadow-sm lg:w-[26rem]">
                        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-[#101828] text-sm font-black text-white">9-6</span>
                        <span class="min-w-0">
                            <span class="block text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('Business Hours', 'dawp'); ?></span>
                            <span class="mt-2 block text-base font-black leading-6 text-[#101828]"><?php esc_html_e('Monday - Friday', 'dawp'); ?></span>
                            <span class="mt-1 block text-sm leading-6 text-[#475467]"><?php esc_html_e('9:00 AM - 6:00 PM EST', 'dawp'); ?></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 overflow-hidden rounded-[2rem] bg-[#101828] shadow-2xl shadow-[#101828]/15 lg:grid-cols-[0.82fr_1.18fr]">
                <div class="p-6 text-white sm:p-8 lg:p-10">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                        <?php esc_html_e('Before contacting us', 'dawp'); ?>
                    </p>

                    <div class="mt-6 grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
                        <div class="border-l-2 border-[#67E8F9] pl-4">
                            <p class="font-heading text-xl font-black uppercase leading-tight"><?php esc_html_e('Order number', 'dawp'); ?></p>
                            <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Include it for order questions when available.', 'dawp'); ?></p>
                        </div>
                        <div class="border-l-2 border-[#A3E635] pl-4">
                            <p class="font-heading text-xl font-black uppercase leading-tight"><?php esc_html_e('Checkout email', 'dawp'); ?></p>
                            <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Use the email address tied to your order.', 'dawp'); ?></p>
                        </div>
                        <div class="border-l-2 border-[#FACC15] pl-4">
                            <p class="font-heading text-xl font-black uppercase leading-tight"><?php esc_html_e('Clear details', 'dawp'); ?></p>
                            <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Add photos for damaged or incorrect items.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="relative min-h-[300px] lg:min-h-[390px]">
                    <img src="<?php echo esc_url($hero_img); ?>"
                         alt="<?php esc_attr_e('Clean customer support setting for everyday ecommerce orders', 'dawp'); ?>"
                         class="h-full min-h-[300px] w-full object-cover object-center lg:min-h-[390px]">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-[#101828]/45 via-transparent to-transparent lg:bg-gradient-to-r"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <aside class="space-y-5 lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-[2rem] bg-[#101828] p-7 text-white shadow-xl shadow-[#101828]/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                        <?php esc_html_e('Support Details', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-3xl font-black uppercase leading-tight">
                        <?php esc_html_e('Need help with your order?', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/78">
                        <?php esc_html_e('For order-related questions, please include your order number and the email address used at checkout. This helps us review your request faster.', 'dawp'); ?>
                    </p>

                    <div class="mt-7 grid gap-4">
                        <a href="mailto:support@eliteshopexpress.com"
                           class="rounded-2xl border border-white/10 bg-white/5 p-5 transition hover:border-[#67E8F9] hover:bg-white/10">
                            <span class="block text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Email', 'dawp'); ?></span>
                            <span class="mt-2 block break-words text-base font-black text-white">support@eliteshopexpress.com</span>
                        </a>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <span class="block text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Business Hours', 'dawp'); ?></span>
                            <span class="mt-2 block text-base font-black text-white"><?php esc_html_e('Monday - Friday', 'dawp'); ?></span>
                            <span class="mt-1 block text-sm leading-6 text-white/75"><?php esc_html_e('9:00 AM - 6:00 PM EST', 'dawp'); ?></span>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <span class="block text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Best For', 'dawp'); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-white/75"><?php esc_html_e('Order updates, product questions, shipping, returns, damaged items, incorrect items, and account help.', 'dawp'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="border border-[#E5E7EB] bg-[#F8FAFC] p-7">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]">
                        <?php esc_html_e('Before You Send', 'dawp'); ?>
                    </p>
                    <ul class="space-y-3 text-sm leading-6 text-[#475467]">
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#2563EB]"></span><?php esc_html_e('Use the same email address used at checkout when possible.', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#2563EB]"></span><?php esc_html_e('Add your order number for order-related questions.', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#2563EB]"></span><?php esc_html_e('For damaged or incorrect items, include clear photos and a short description.', 'dawp'); ?></li>
                    </ul>
                </div>
            </aside>

            <div class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]">
                    <?php esc_html_e('Send A Message', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Tell us what you need.', 'dawp'); ?>
                </h2>

                <p class="mt-4 max-w-2xl text-base leading-7 text-[#475467]">
                    <?php esc_html_e('Our support team can help with order status, product details, shipping timelines, return eligibility, and general shopping questions.', 'dawp'); ?>
                </p>

                <div id="contact-form-1" class="mt-8">
                    <?php echo do_shortcode('[contact-form-7 id="5d357f1" title="Contact"]'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F3F7FB] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#06B6D4]"><?php esc_html_e('Quick Help', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                        <?php esc_html_e('Find common information faster.', 'dawp'); ?>
                    </h2>
                </div>

                <a href="<?php echo esc_url(home_url('/track-order/')); ?>"
                   class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#101828] px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#2563EB]">
                    <?php esc_html_e('Track Your Order', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($quick_help as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="group border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#101828]/10">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full text-sm font-black text-white" style="background-color: <?php echo esc_attr($item['color']); ?>">
                            <?php echo esc_html($item['number']); ?>
                        </div>
                        <h3 class="font-heading text-xl font-black uppercase leading-tight text-[#101828] group-hover:text-[#2563EB]">
                            <?php echo esc_html($item['title']); ?>
                        </h3>
                        <p class="mt-3 text-sm leading-6 text-[#475467]">
                            <?php echo esc_html($item['copy']); ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
