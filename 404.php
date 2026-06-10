<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();

$shop_url    = home_url('/shop/');
$contact_url = home_url('/contact-us/');

$quick_links = [
    ['title' => __('Everyday Sneakers', 'dawp'),    'url' => home_url('/product-category/everyday-sneakers/'),  'accent' => '#7C3AED'],
    ['title' => __('Boots', 'dawp'),                'url' => home_url('/product-category/boots/'),              'accent' => '#FF4FB8'],
    ['title' => __('Sandals & Slides', 'dawp'),     'url' => home_url('/product-category/sandals-slides/'),     'accent' => '#E6007E'],
];

$support_links = [
    ['title' => __('Track Order', 'dawp'),          'url' => home_url('/track-order/')],
    ['title' => __('Shipping Policy', 'dawp'),      'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
    ['title' => __('FAQ', 'dawp'),                  'url' => home_url('/faq/')],
];
?>

<main id="primary" class="site-main bg-[#FFF7FB] font-body text-[#141217]">
    <section class="relative overflow-hidden">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
        <div class="absolute inset-y-0 right-0 hidden w-[42%] bg-[linear-gradient(135deg,#F3E8FF_0%,#F4DDE8_100%)] lg:block"></div>

        <div class="relative mx-auto grid min-h-[calc(100dvh-120px)] max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8 lg:py-24">
            <div class="max-w-2xl">
                <div class="mb-7 flex flex-wrap items-center gap-3">
                    <span class="inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#E6007E] shadow-sm shadow-[#141217]/5">
                        <?php esc_html_e('Page Not Found', 'dawp'); ?>
                    </span>
                    <span class="hidden h-px w-16 bg-[#F0C7DC] sm:block"></span>
                    <span class="text-sm font-extrabold text-[#7C3AED]">
                        <?php esc_html_e('404', 'dawp'); ?>
                    </span>
                </div>

                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('This page stepped out.', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('The link may be outdated or the page has moved. Browse our footwear collections, return home, or contact support if you were looking for an order detail.', 'dawp'); ?>
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                        <?php esc_html_e('Shop Shoes', 'dawp'); ?>
                    </a>

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6007E] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#E6007E] transition hover:bg-[#F3E8FF]">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>

                <div class="mt-10 grid max-w-2xl grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php foreach ($support_links as $index => $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="group border-l-4 <?php echo 1 === $index ? 'border-[#7C3AED]' : 'border-[#E6007E]'; ?> bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                            <span class="text-xs font-black uppercase tracking-[0.16em] <?php echo 1 === $index ? 'text-[#7C3AED]' : 'text-[#E6007E]'; ?>">
                                <?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                            </span>
                            <span class="mt-2 block font-heading text-xl font-black leading-tight text-[#141217]">
                                <?php echo esc_html($link['title']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-[2rem] bg-white p-4 shadow-2xl shadow-[#7C3AED]/15">
                    <div class="rounded-[1.5rem] bg-[#141217] p-6 text-white sm:p-8 lg:p-10">
                        <p class="text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]">
                            <?php esc_html_e('Find Your Next Step', 'dawp'); ?>
                        </p>

                        <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <?php foreach ($quick_links as $index => $link) : ?>
                                <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-3xl border border-white/10 bg-white/8 p-5 transition hover:-translate-y-1 hover:border-[#FF4FB8] hover:bg-white/10">
                                    <span class="flex h-11 w-11 items-center justify-center rounded-full text-sm font-black text-white" style="background-color: <?php echo esc_attr($link['accent']); ?>;">
                                        <?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                                    </span>
                                    <span class="mt-5 block font-heading text-2xl font-black leading-tight text-white">
                                        <?php echo esc_html($link['title']); ?>
                                    </span>
                                    <span class="mt-3 block text-sm font-bold leading-6 text-white/72">
                                        <?php esc_html_e('Browse the collection', 'dawp'); ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-8 rounded-3xl border border-white/10 bg-white/8 p-5">
                            <p class="font-heading text-2xl font-black leading-tight">
                                <?php esc_html_e('Still need help?', 'dawp'); ?>
                            </p>
                            <p class="mt-3 text-sm leading-6 text-white/72">
                                <?php esc_html_e('Tell us what page or order information you were trying to reach and our support team can help.', 'dawp'); ?>
                            </p>
                            <a href="<?php echo esc_url($contact_url); ?>" class="mt-5 inline-flex min-h-11 items-center justify-center rounded-full bg-[#E6007E] px-6 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#FF4FB8]">
                                <?php esc_html_e('Contact Support', 'dawp'); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pointer-events-none absolute -right-7 top-8 hidden h-24 w-24 rounded-full border border-white/80 lg:block"></div>
                <div class="pointer-events-none absolute -bottom-8 -left-4 hidden h-20 w-20 rounded-full bg-[#E6007E]/10 lg:block"></div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
