<?php
/**
 * Template Part: page-contact
 */

$gallery_uri = get_theme_file_uri('/assets/img/gallery/ScottOsterbind/');

$images = [
    'hero'    => $gallery_uri . 'contact-support-workspace.png',
    'curated' => $gallery_uri . 'contact-sizing-details.png',
];

$contact_cards = [
    [
        'title' => __('Email Support', 'dawp'),
        'copy'  => __('support@scottosterbind.com', 'dawp'),
        'url'   => 'mailto:support@scottosterbind.com',
        'icon'  => 'email',
    ],
    [
        'title' => __('Business Hours', 'dawp'),
        'copy'  => __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp'),
        'url'   => '',
        'icon'  => 'clock',
    ],
    [
        'title' => __('Order Help', 'dawp'),
        'copy'  => __('Include your order number, email address, product name, and a short description so we can review your request faster.', 'dawp'),
        'url'   => '',
        'icon'  => 'clipboard',
    ],
];

$help_topics = [
    __('Questions about bracelet sizing, materials, product details, or care notes', 'dawp'),
    __('Order status, tracking, processing time, or shipping timeline questions', 'dawp'),
    __('Return eligibility for unused, unworn, undamaged items in original condition', 'dawp'),
    __('Gift, styling, or category questions for handmade and curated pieces', 'dawp'),
];
?>

<div id="primary" class="bg-white font-body text-[#24211E]">

    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#F8F1E7]">
        <div class="mx-auto grid min-h-[480px] max-w-7xl grid-cols-1 items-center gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[minmax(0,0.92fr)_minmax(0,1.08fr)] lg:px-8 lg:py-20">
            <div class="relative z-10">
                <p class="mb-5 inline-flex rounded-full border border-[#C8A45D]/60 bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.16em] text-[#7A7B52]">
                    <?php esc_html_e('Contact Scott Osterbind', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.98] text-[#5A3825] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Support for handmade jewelry, curated finds, and your order.', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#4F463F]">
                    <?php esc_html_e('Reach out for help with product details, bracelet sizing, materials, order tracking, shipping, returns, and general boutique support.', 'dawp'); ?>
                </p>
            </div>

            <div class="overflow-hidden rounded-lg border border-[#D8C3A5] bg-white shadow-xl">
                <img src="<?php echo esc_url($images['hero']); ?>"
                     alt="<?php esc_attr_e('Warm artisan jewelry workspace for Scott Osterbind customer support', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="eager"
                     fetchpriority="high">
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:items-start">

                <!-- Contact Info -->
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#9A6242]">
                        <?php esc_html_e('Customer Support', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#5A3825] lg:text-5xl">
                        <?php esc_html_e('Send clear details so we can help quickly.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#4F463F]">
                        <?php esc_html_e('For order questions, include your order number when available. For product questions, include the item name, material or size question, and any detail that helps us understand what you need.', 'dawp'); ?>
                    </p>

                    <div class="mt-8 space-y-4">
                        <?php foreach ($contact_cards as $card) : ?>
                            <div class="rounded-lg border border-[#D8C3A5] bg-[#F8F1E7] p-5">
                                <div class="flex gap-4">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#9A6242] text-white">
                                        <?php if ($card['icon'] === 'email') : ?>
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
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
                                        <h3 class="text-sm font-black uppercase tracking-wide text-[#5A3825]">
                                            <?php echo esc_html($card['title']); ?>
                                        </h3>
                                        <p class="mt-2 text-sm leading-7 text-[#4F463F]">
                                            <?php if (! empty($card['url'])) : ?>
                                                <a href="<?php echo esc_url($card['url']); ?>" class="font-bold text-[#9A6242] transition hover:text-[#5A3825]">
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
                <div class="rounded-lg border border-[#D8C3A5] bg-[#F8F1E7] p-6 shadow-sm sm:p-8">
                    <h3 class="font-heading text-2xl font-black text-[#5A3825]">
                        <?php esc_html_e('Send a Message', 'dawp'); ?>
                    </h3>
                    <p class="mt-2 text-sm leading-7 text-[#4F463F]">
                        <?php esc_html_e('We review support messages during business hours. For order questions, include your order number if you have one.', 'dawp'); ?>
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
                            <?php esc_html_e('Sorry, your message could not be sent right now. Please email us directly at support@scottosterbind.com.', 'dawp'); ?>
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
                            <label for="name" class="mb-1 block text-sm font-bold text-[#5A3825]">
                                <?php esc_html_e('Full Name', 'dawp'); ?>
                            </label>
                            <input type="text" id="name" name="name" required class="block w-full rounded-md border border-[#D8C3A5] bg-white px-4 py-3 text-[#24211E] focus:border-[#9A6242] focus:outline-none focus:ring-1 focus:ring-[#9A6242]">
                        </div>

                        <div>
                            <label for="email" class="mb-1 block text-sm font-bold text-[#5A3825]">
                                <?php esc_html_e('Email Address', 'dawp'); ?>
                            </label>
                            <input type="email" id="email" name="email" required class="block w-full rounded-md border border-[#D8C3A5] bg-white px-4 py-3 text-[#24211E] focus:border-[#9A6242] focus:outline-none focus:ring-1 focus:ring-[#9A6242]">
                        </div>

                        <div>
                            <label for="subject" class="mb-1 block text-sm font-bold text-[#5A3825]">
                                <?php esc_html_e('Subject', 'dawp'); ?>
                            </label>
                            <input type="text" id="subject" name="subject" class="block w-full rounded-md border border-[#D8C3A5] bg-white px-4 py-3 text-[#24211E] focus:border-[#9A6242] focus:outline-none focus:ring-1 focus:ring-[#9A6242]">
                        </div>

                        <div>
                            <label for="message" class="mb-1 block text-sm font-bold text-[#5A3825]">
                                <?php esc_html_e('Message', 'dawp'); ?>
                            </label>
                            <textarea id="message" name="message" rows="5" required class="block w-full rounded-md border border-[#D8C3A5] bg-white px-4 py-3 text-[#24211E] focus:border-[#9A6242] focus:outline-none focus:ring-1 focus:ring-[#9A6242]"></textarea>
                        </div>

                        <button type="submit" class="inline-flex w-full min-h-12 items-center justify-center rounded-full bg-[#9A6242] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#5A3825]">
                            <?php esc_html_e('Send Message', 'dawp'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Topics -->
    <section class="bg-[#F8F1E7] py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-lg border border-[#D8C3A5] bg-white shadow-sm">
                <img src="<?php echo esc_url($images['curated']); ?>"
                     alt="<?php esc_attr_e('Curated vintage-inspired accessories for product and order support', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#9A6242]">
                    <?php esc_html_e('Before You Contact Us', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#5A3825] lg:text-5xl">
                    <?php esc_html_e('Helpful details make boutique support faster.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4F463F]">
                    <?php esc_html_e('Handmade and curated items can vary by material, size, and finish. Specific product names, order numbers, and photos when relevant help us respond more accurately.', 'dawp'); ?>
                </p>

                <div class="mt-7 space-y-3">
                    <?php foreach ($help_topics as $topic) : ?>
                        <div class="flex gap-3 rounded-lg border border-[#D8C3A5] bg-white p-4">
                            <span class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-[#7A7B52] text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <p class="text-sm font-semibold leading-7 text-[#24211E]"><?php echo esc_html($topic); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-7 rounded-lg border border-[#C8A45D]/60 bg-white p-5">
                    <p class="text-sm font-black uppercase tracking-[0.16em] text-[#9A6242]">
                        <?php esc_html_e('Handmade Item Note', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm font-semibold leading-7 text-[#5A3825]">
                        <?php esc_html_e('Slight natural variations in bead pattern, color, texture, and finish may be part of the handmade or curated character of an item.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Policy Links -->
    <section class="bg-[#24211E] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:items-center">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C8A45D]">
                        <?php esc_html_e('Shipping, Returns & Tracking', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl">
                        <?php esc_html_e('Review policy information before opening a support request.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#F8F1E7]">
                        <?php esc_html_e('Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch, depending on destination and carrier conditions.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                       class="rounded-lg border border-[#D8C3A5] bg-white p-5 text-[#24211E] transition hover:-translate-y-1 hover:shadow-md">
                        <h3 class="text-base font-black text-[#5A3825]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#4F463F]"><?php esc_html_e('Read timelines and return conditions.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/track-order/')); ?>"
                       class="rounded-lg border border-[#D8C3A5] bg-white p-5 text-[#24211E] transition hover:-translate-y-1 hover:shadow-md">
                        <h3 class="text-base font-black text-[#5A3825]"><?php esc_html_e('Track Your Order', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#4F463F]"><?php esc_html_e('Check available tracking details.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/faq/')); ?>"
                       class="rounded-lg border border-[#D8C3A5] bg-white p-5 text-[#24211E] transition hover:-translate-y-1 hover:shadow-md">
                        <h3 class="text-base font-black text-[#5A3825]"><?php esc_html_e('FAQs', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#4F463F]"><?php esc_html_e('Find common support answers.', 'dawp'); ?></p>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
