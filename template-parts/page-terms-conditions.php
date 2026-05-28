<?php
/**
 * Template Part: Terms & Conditions Page
 */

defined('ABSPATH') || exit;

$support_email = 'support@myveganblog.com';
$updated_date  = 'May 28, 2026';
$terms_image   = get_template_directory_uri() . '/assets/img/All_image/image copy 2.png';

$terms_sections = [
    [
        'number' => '01',
        'title'  => __('Agreement To These Terms', 'dawp'),
        'body'   => [
            __('This website is operated by Myveganblog. By accessing our website, browsing products, creating an account, placing an order, or contacting us for support, you agree to these Terms & Conditions and the policies referenced on this site.', 'dawp'),
            __('If you do not agree with these terms, you should not use the website or purchase products from Myveganblog.', 'dawp'),
        ],
    ],
    [
        'number' => '02',
        'title'  => __('Online Store Use', 'dawp'),
        'body'   => [
            __('You may use this site only for lawful purposes and in a way that does not interfere with the security, availability, or normal operation of the store. You may not misuse the website, attempt unauthorized access, transmit harmful code, scrape store data, or use our content for unauthorized commercial purposes.', 'dawp'),
            __('You are responsible for keeping account information accurate and for maintaining the confidentiality of any account credentials used on our site.', 'dawp'),
        ],
    ],
    [
        'number' => '03',
        'title'  => __('Products, Materials & Availability', 'dawp'),
        'body'   => [
            __('Myveganblog offers women\'s leather shoes, women\'s sandals, women\'s handbags, and fashion accessories. Product descriptions, images, colors, sizes, dimensions, finishes, materials, and care notes are provided to help customers make informed choices.', 'dawp'),
            __('We make reasonable efforts to display products accurately, but screen settings, photography, lighting, supplier updates, and inventory changes may affect how colors or details appear. Product availability, pricing, and descriptions may change without notice.', 'dawp'),
        ],
    ],
    [
        'number' => '04',
        'title'  => __('Orders, Billing & Payment', 'dawp'),
        'body'   => [
            __('When placing an order, you agree to provide current, complete, and accurate billing, shipping, contact, and payment information. Orders may be reviewed for accuracy, availability, payment authorization, fraud prevention, and shipping eligibility.', 'dawp'),
            __('We reserve the right to refuse, cancel, or limit an order when information appears inaccurate, payment cannot be authorized, inventory is unavailable, shipping restrictions apply, or activity appears suspicious or inconsistent with normal customer use.', 'dawp'),
        ],
    ],
    [
        'number' => '05',
        'title'  => __('Shipping & Delivery', 'dawp'),
        'body'   => [
            __('Shipping timeframes, handling times, cutoff times, delivery estimates, tracking, delivery issues, address errors, and carrier delays are described in our Shipping Policy. Delivery estimates are not guarantees and may be affected by carrier conditions, weather, holidays, address issues, or partner-shipped items.', 'dawp'),
            __('Customers are responsible for providing a complete and accurate shipping address before submitting an order. If an address is incorrect or incomplete, delivery may be delayed, returned, or unable to be completed.', 'dawp'),
        ],
    ],
    [
        'number' => '06',
        'title'  => __('Returns, Refunds & Exchanges', 'dawp'),
        'body'   => [
            __('Eligible returns, refund timing, return authorization, return shipping responsibilities, exchange availability, product condition requirements, and non-returnable items are described in our Return & Refund Policy.', 'dawp'),
            __('Footwear must be unworn and free of outdoor wear, stains, odor, heavy creasing, or sole marks. Handbags and accessories must be unused, undamaged, and returned with original packaging, tags, straps, dust bags, or included accessories where applicable.', 'dawp'),
        ],
    ],
    [
        'number' => '07',
        'title'  => __('Accuracy, Errors & Store Changes', 'dawp'),
        'body'   => [
            __('Occasionally, the site may contain typographical errors, pricing errors, product availability inaccuracies, image discrepancies, shipping estimate errors, or other omissions. We reserve the right to correct errors, update information, cancel affected orders, or change store content at any time as permitted by applicable law.', 'dawp'),
            __('We may update, suspend, or discontinue any part of the website or product assortment without prior notice.', 'dawp'),
        ],
    ],
    [
        'number' => '08',
        'title'  => __('Intellectual Property', 'dawp'),
        'body'   => [
            __('The website design, page content, photography selections, graphics, logos, text, product presentation, and other site materials are owned by or licensed to Myveganblog and are protected by applicable intellectual property laws.', 'dawp'),
            __('You may not copy, reproduce, modify, sell, redistribute, or exploit our website content without written permission from Myveganblog.', 'dawp'),
        ],
    ],
    [
        'number' => '09',
        'title'  => __('Privacy', 'dawp'),
        'body'   => [
            __('Your submission of personal information through the website is governed by our Privacy Policy. Please review that policy to understand how we collect, use, share, and protect customer information.', 'dawp'),
        ],
    ],
    [
        'number' => '10',
        'title'  => __('Limitation Of Liability', 'dawp'),
        'body'   => [
            __('To the fullest extent permitted by applicable law, Myveganblog is not liable for indirect, incidental, special, consequential, or punitive damages arising from website use, product use, shipping delays, service interruptions, data loss, unauthorized access, or inability to use the site.', 'dawp'),
            __('Nothing in these terms is intended to limit rights that cannot be limited under applicable consumer protection laws.', 'dawp'),
        ],
    ],
    [
        'number' => '11',
        'title'  => __('Changes To These Terms', 'dawp'),
        'body'   => [
            __('We may update these Terms & Conditions from time to time to reflect store changes, legal requirements, or operational updates. The updated date shown on this page indicates when the terms were last revised.', 'dawp'),
            __('Continued use of the website after updates means you accept the revised terms.', 'dawp'),
        ],
    ],
];
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <section class="relative overflow-hidden bg-[#241F1D] px-4 py-20 text-white sm:px-6 lg:px-8 lg:py-24">
        <div class="absolute inset-0 opacity-35">
            <img src="<?php echo esc_url($terms_image); ?>" alt="<?php esc_attr_e('White women\'s leather shoe for store terms', 'dawp'); ?>" class="h-full w-full object-cover" loading="eager">
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.98)_0%,rgba(36,31,29,0.78)_52%,rgba(36,31,29,0.42)_100%)]"></div>
        </div>
        <div class="relative mx-auto grid w-[min(100%,1180px)] gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
            <div class="max-w-3xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></span>
                <h1 class="mt-7 font-serif text-4xl leading-tight text-white sm:text-6xl"><?php esc_html_e('Terms for using Myveganblog.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('Please review these terms before using our website or purchasing women\'s shoes, handbags, and accessories from Myveganblog.', 'dawp'); ?>
                </p>
            </div>
            <div class="rounded-[28px] border border-white/18 bg-white/10 p-6 backdrop-blur sm:p-8">
                <dl class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Store', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Updated', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($updated_date); ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-4 md:grid-cols-3">
            <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6 transition-colors hover:bg-[#F4ECE5]">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Shipping', 'dawp'); ?></span>
                <h2 class="mt-3 font-serif text-2xl text-[#2F2A28]"><?php esc_html_e('Delivery terms', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Review processing, transit estimates, tracking, and delivery issue guidance.', 'dawp'); ?></p>
            </a>
            <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6 transition-colors hover:bg-[#F4ECE5]">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Returns', 'dawp'); ?></span>
                <h2 class="mt-3 font-serif text-2xl text-[#2F2A28]"><?php esc_html_e('Refund conditions', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Understand return authorization, item condition, refunds, and exchanges.', 'dawp'); ?></p>
            </a>
            <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6 transition-colors hover:bg-[#F4ECE5]">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Privacy', 'dawp'); ?></span>
                <h2 class="mt-3 font-serif text-2xl text-[#2F2A28]"><?php esc_html_e('Data practices', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('See how customer information is collected, used, and protected.', 'dawp'); ?></p>
            </a>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-8 lg:grid-cols-[280px_1fr]">
            <aside class="h-fit rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] lg:sticky lg:top-24">
                <h2 class="font-serif text-2xl text-[#2F2A28]"><?php esc_html_e('Key Terms', 'dawp'); ?></h2>
                <p class="mt-4 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('These terms cover store use, orders, product information, shipping, returns, privacy, and customer responsibilities.', 'dawp'); ?></p>
                <div class="mt-6 rounded-2xl bg-[#F4ECE5] p-5">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Support', 'dawp'); ?></span>
                    <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="mt-2 block break-words text-sm font-bold text-[#2F2A28] hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a>
                </div>
            </aside>

            <div class="space-y-5">
                <?php foreach ($terms_sections as $section) : ?>
                    <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#F4ECE5] font-serif text-xl text-[#C98A8A]"><?php echo esc_html($section['number']); ?></span>
                            <div>
                                <h2 class="font-serif text-2xl leading-tight text-[#2F2A28] sm:text-3xl"><?php echo esc_html($section['title']); ?></h2>
                                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                                    <?php foreach ($section['body'] as $paragraph) : ?>
                                        <p><?php echo esc_html($paragraph); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-6 rounded-[28px] bg-[#2F2A28] p-8 text-white sm:p-10 lg:grid-cols-[1fr_auto] lg:items-center lg:p-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Questions About These Terms', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight sm:text-4xl"><?php esc_html_e('Customer support is available on business days.', 'dawp'); ?></h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-white/76">
                    <?php printf(esc_html__('Email %s during Business Hours: Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00.', 'dawp'), esc_html($support_email)); ?>
                </p>
            </div>
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28]">
                <?php esc_html_e('Contact Support', 'dawp'); ?>
            </a>
        </div>
    </section>
</main>
