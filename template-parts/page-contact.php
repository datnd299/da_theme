<?php
/**
 * Template Part: page-contact
 */

$rubyinstar_gallery_uri = get_theme_file_uri('/assets/img/gallery/Rubyinstar/');

$images = [
    'hero'  => $rubyinstar_gallery_uri . 'tire-hero-road.png',
    'tread' => $rubyinstar_gallery_uri . 'all-season-tread.png',
];

$contact_cards = [
    [
        'title' => __('Company', 'dawp'),
        'copy'  => __('TIRE CAPITAL LLC — 324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'),
        'url'   => '',
        'icon'  => 'clipboard',
    ],
    [
        'title' => __('Email Support', 'dawp'),
        'copy'  => __('support@rubyinstar.com', 'dawp'),
        'url'   => 'mailto:support@rubyinstar.com',
        'icon'  => 'email',
    ],
    [
        'title' => __('Phone Support', 'dawp'),
        'copy'  => __('+1 888-798-4739', 'dawp'),
        'url'   => 'tel:+18887984739',
        'icon'  => 'phone',
    ],
    [
        'title' => __('Business Hours', 'dawp'),
        'copy'  => __('Monday – Friday, 9:00 AM – 5:00 PM (GMT-05:00) Eastern Standard Time (New York)', 'dawp'),
        'url'   => '',
        'icon'  => 'clock',
    ],
    [
        'title' => __('Order Help', 'dawp'),
        'copy'  => __('Include your order number, email address, tire size, and a short description of the issue so we can review it faster.', 'dawp'),
        'url'   => '',
        'icon'  => 'clipboard',
    ],
];

$help_topics = [
    __('Tire size or fitment questions before ordering', 'dawp'),
    __('Order status, tracking, or shipping timeline questions', 'dawp'),
    __('Return eligibility for unused, unmounted, undriven, undamaged tires in original condition', 'dawp'),
    __('Product specification questions such as rim size, load index, speed rating, or tire type', 'dawp'),
];
?>

<div id="primary" class="bg-white font-body text-[#111111]">

    <!-- Hero -->
    <section class="relative min-h-[520px] overflow-hidden bg-[#050505] text-white">
        <img src="<?php echo esc_url($images['hero']); ?>"
             alt="<?php esc_attr_e('Road-ready tire image for Rubyinstar customer support', 'dawp'); ?>"
             class="absolute inset-0 h-full w-full object-cover"
             loading="eager"
             fetchpriority="high">
        <div class="absolute inset-0 bg-[#050505]/82 lg:bg-[linear-gradient(90deg,rgba(5,5,5,0.98)_0%,rgba(17,17,17,0.86)_48%,rgba(185,28,28,0.28)_100%)]"></div>

        <div class="relative mx-auto flex min-h-[520px] max-w-7xl items-center px-4 py-16 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-5 inline-flex rounded-md border border-[#FCA5A5]/50 bg-[#B91C1C]/20 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#FCA5A5]">
                    <?php esc_html_e('Contact Rubyinstar', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-5xl font-black leading-[0.98] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Support for tire fitment, orders, and delivery.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#E5E5E5]">
                    <?php esc_html_e('Contact us for help with tire specifications, order status, shipping, returns, tracking, and product fitment questions.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:items-start">

                <!-- Contact Info -->
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#DC2626]">
                        <?php esc_html_e('Customer Support', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#111111] lg:text-5xl">
                        <?php esc_html_e('Send the details we need to help review your request.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#525252]">
                        <?php esc_html_e('For tire orders, accurate information matters. Please include your order number when available, plus tire size, rim size, vehicle information, and any tracking details related to your question.', 'dawp'); ?>
                    </p>

                    <div class="mt-8 space-y-4">
                        <?php foreach ($contact_cards as $card) : ?>
                            <div class="rounded-lg border border-[#D4D4D4] bg-[#F5F5F5] p-5">
                                <div class="flex gap-4">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-md bg-[#111111] text-white">
                                        <?php if ($card['icon'] === 'email') : ?>
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        <?php elseif ($card['icon'] === 'phone') : ?>
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.26 1.13a11.04 11.04 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.72 21 3 14.28 3 6V5z" />
                                            </svg>
                                        <?php elseif ($card['icon'] === 'clock') : ?>
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        <?php else : ?>
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6m-7 4h8m-8 4h8m-8 4h5M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-black uppercase tracking-wide text-[#111111]">
                                            <?php echo esc_html($card['title']); ?>
                                        </h3>
                                        <p class="mt-2 text-sm leading-7 text-[#525252]">
                                            <?php if (! empty($card['url'])) : ?>
                                                <a href="<?php echo esc_url($card['url']); ?>" class="font-bold text-[#DC2626] transition hover:text-[#111111]">
                                                    <?php echo esc_html($card['copy']); ?>
                                                </a>
                                            <?php else : ?>
                                                <?php echo esc_html($card['copy']); ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="rounded-lg border border-[#D4D4D4] bg-[#F5F5F5] p-6 shadow-sm sm:p-8">
                    <h3 class="font-heading text-2xl font-black text-[#111111]">
                        <?php esc_html_e('Send a Message', 'dawp'); ?>
                    </h3>
                    <p class="mt-2 text-sm leading-7 text-[#525252]">
                        <?php esc_html_e('We usually review support messages during business hours. For order questions, include your order number if you have one.', 'dawp'); ?>
                    </p>

                    <?php
                    $contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
                    if ($contact_status === 'sent') :
                    ?>
                        <div class="mt-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800" role="status">
                            <?php esc_html_e('Thank you. Your message has been sent successfully.', 'dawp'); ?>
                        </div>
                    <?php elseif ($contact_status === 'invalid') : ?>
                        <div class="mt-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800" role="alert">
                            <?php esc_html_e('Please check your details and try again.', 'dawp'); ?>
                        </div>
                    <?php elseif ($contact_status === 'failed') : ?>
                        <div class="mt-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800" role="alert">
                            <?php esc_html_e('Sorry, your message could not be sent right now. Please email us directly at support@rubyinstar.com.', 'dawp'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="mt-6 space-y-5">
                        <input type="hidden" name="action" value="dawp_contact_submit">
                        <?php wp_nonce_field('dawp_contact_submit', 'dawp_contact_nonce'); ?>
                        <div class="hidden" aria-hidden="true">
                            <label for="website"><?php esc_html_e('Website', 'dawp'); ?></label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div>
                            <label for="name" class="mb-1 block text-sm font-bold text-[#111111]">
                                <?php esc_html_e('Full Name', 'dawp'); ?>
                            </label>
                            <input type="text" id="name" name="name" required class="block w-full rounded-md border border-[#D4D4D4] bg-white px-4 py-3 text-[#111111] focus:border-[#DC2626] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30">
                        </div>

                        <div>
                            <label for="email" class="mb-1 block text-sm font-bold text-[#111111]">
                                <?php esc_html_e('Email Address', 'dawp'); ?>
                            </label>
                            <input type="email" id="email" name="email" required class="block w-full rounded-md border border-[#D4D4D4] bg-white px-4 py-3 text-[#111111] focus:border-[#DC2626] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30">
                        </div>

                        <div>
                            <label for="subject" class="mb-1 block text-sm font-bold text-[#111111]">
                                <?php esc_html_e('Subject', 'dawp'); ?>
                            </label>
                            <input type="text" id="subject" name="subject" class="block w-full rounded-md border border-[#D4D4D4] bg-white px-4 py-3 text-[#111111] focus:border-[#DC2626] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30">
                        </div>

                        <div>
                            <label for="message" class="mb-1 block text-sm font-bold text-[#111111]">
                                <?php esc_html_e('Message', 'dawp'); ?>
                            </label>
                            <textarea id="message" name="message" rows="5" required class="block w-full rounded-md border border-[#D4D4D4] bg-white px-4 py-3 text-[#111111] focus:border-[#DC2626] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30"></textarea>
                        </div>

                        <button type="submit" class="inline-flex w-full min-h-12 items-center justify-center rounded-md bg-[#DC2626] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#111111]">
                            <?php esc_html_e('Send Message', 'dawp'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Topics -->
    <section class="bg-[#F5F5F5] py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-lg border border-[#D4D4D4] bg-white shadow-sm">
                <img src="<?php echo esc_url($images['tread']); ?>"
                     alt="<?php esc_attr_e('Tire tread detail for fitment and product specification support', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#DC2626]">
                    <?php esc_html_e('Before You Contact Us', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#111111] lg:text-5xl">
                    <?php esc_html_e('Helpful details make tire support faster.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#525252]">
                    <?php esc_html_e('Tire compatibility can depend on vehicle requirements and product specifications. The more specific your message is, the easier it is for support to review your question.', 'dawp'); ?>
                </p>

                <div class="mt-7 space-y-3">
                    <?php foreach ($help_topics as $topic) : ?>
                        <div class="flex gap-3 rounded-lg border border-[#D4D4D4] bg-white p-4">
                            <span class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#DC2626] text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <p class="text-sm font-semibold leading-7 text-[#111111]"><?php echo esc_html($topic); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-7 rounded-lg border border-[#FCA5A5]/60 bg-[#FEE2E2] p-5">
                    <p class="text-sm font-black uppercase tracking-[0.16em] text-[#991B1B]">
                        <?php esc_html_e('Fitment Reminder', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm font-semibold leading-7 text-[#111111]">
                        <?php esc_html_e('Please confirm your tire size, rim size, load index, speed rating, and vehicle compatibility before placing an order.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Policy Links -->
    <section class="bg-[#111111] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:items-center">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FCA5A5]">
                        <?php esc_html_e('Shipping, Returns & Tracking', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl">
                        <?php esc_html_e('Review policy information before opening a support request.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#D4D4D4]">
                        <?php esc_html_e('Orders are processed within 1-2 business days. Standard delivery within the United States takes 3-5 business days after dispatch, and all eligible tire orders ship free within our standard delivery zones.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"
                       class="rounded-lg border border-white/10 bg-white p-5 text-[#111111] transition hover:-translate-y-1 hover:shadow-md">
                        <h3 class="text-base font-black text-[#111111]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#525252]"><?php esc_html_e('Read processing, transit, tracking, and delivery details.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/returns-policy/')); ?>"
                       class="rounded-lg border border-white/10 bg-white p-5 text-[#111111] transition hover:-translate-y-1 hover:shadow-md">
                        <h3 class="text-base font-black text-[#111111]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#525252]"><?php esc_html_e('Review eligibility, return shipping costs, and refund timing.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/track-order/')); ?>"
                       class="rounded-lg border border-white/10 bg-white p-5 text-[#111111] transition hover:-translate-y-1 hover:shadow-md">
                        <h3 class="text-base font-black text-[#111111]"><?php esc_html_e('Track Your Order', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#525252]"><?php esc_html_e('Check available tracking details.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/faq/')); ?>"
                       class="rounded-lg border border-white/10 bg-white p-5 text-[#111111] transition hover:-translate-y-1 hover:shadow-md">
                        <h3 class="text-base font-black text-[#111111]"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#525252]"><?php esc_html_e('Find common support answers.', 'dawp'); ?></p>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
