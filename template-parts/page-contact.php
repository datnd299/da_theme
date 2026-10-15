<?php
/**
 * Contact page — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@slicktee.com';
$us_phone      = '+1 909-366-3939';
$us_address    = '304 S. Jones Blvd #3456, Las Vegas, NV 89107, United States';
$privacy_url   = home_url('/privacy-policy/');

$status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

$form_topics = [
    'order'   => __('Order or tracking question', 'dawp'),
    'return'  => __('Misprint, damage or wrong item', 'dawp'),
    'product' => __('Product, size or design question', 'dawp'),
    'privacy' => __('Privacy request', 'dawp'),
    'other'   => __('General support', 'dawp'),
];

$contact_cards = [
    [
        'title' => __('Email', 'dawp'),
        'value' => $support_email,
        'href'  => 'mailto:' . $support_email,
        'note'  => __('Fastest way to reach us — reply within 24 hours.', 'dawp'),
        'icon'  => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
    ],
    [
        'title' => __('US Phone', 'dawp'),
        'value' => $us_phone,
        'href'  => 'tel:+19093663939',
        'note'  => __('Mon–Fri 10am–6pm · Sat 8am–6pm', 'dawp'),
        'icon'  => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2Z"/>',
    ],
];

$quick_tips = [
    ['title' => __('Production time', 'dawp'), 'copy' => __('Every order is printed, cut and finished to order in 2–3 business days before shipping.', 'dawp')],
    ['title' => __('Shipping time', 'dawp'), 'copy' => __('Orders arrive in 5–10 business days after dispatch.', 'dawp')],
    ['title' => __('Need to change something?', 'dawp'), 'copy' => __('Size, color, quantity or address changes and cancellations are possible within 24 hours of ordering.', 'dawp')],
    ['title' => __('Something wrong?', 'dawp'), 'copy' => __('Damaged, misprinted or wrong item? Email a photo within 14 days of delivery and we’ll replace or refund it.', 'dawp')],
];

$input_class = 'mt-2 block min-h-12 w-full rounded-[8px] border-2 border-[#17140F] bg-[#FFFFFF] px-4 text-sm text-[#17140F] outline-none transition placeholder:text-[#6F665A] focus:border-[#D7351E] focus:ring-4 focus:ring-[#FBE3DC]';
?>

<div class="bg-[#FBF7EF] text-[#17140F]">
    <section class="border-b-2 border-[#17140F] py-14 sm:py-20" aria-labelledby="contact-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex -rotate-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]"><?php esc_html_e('Contact Us', 'dawp'); ?></span>
            <h1 id="contact-title" class="font-display mt-5 max-w-3xl text-5xl uppercase leading-[0.95] sm:text-7xl"><?php esc_html_e('Talk to a real human.', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-[#4A4339]"><?php esc_html_e('Whether you’re looking for answers, want to fix a problem with an order, or just want to tell us how we did — we’re here and happy to help.', 'dawp'); ?></p>

            <div class="mt-10 grid gap-4 md:grid-cols-2">
                <?php foreach ($contact_cards as $card) : ?>
                    <a href="<?php echo esc_attr($card['href']); ?>" class="group flex gap-4 rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-5 transition hover:-translate-x-[3px] hover:-translate-y-[3px] hover:shadow-[6px_6px_0_#17140F]">
                        <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-[8px] bg-[#D7351E] text-[#FFFFFF]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $card['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
                        </span>
                        <span class="min-w-0">
                            <span class="block text-xs font-extrabold uppercase tracking-[0.16em] text-[#6F665A]"><?php echo esc_html($card['title']); ?></span>
                            <span class="mt-1 block break-words font-heading text-lg font-extrabold group-hover:text-[#D7351E]"><?php echo esc_html($card['value']); ?></span>
                            <span class="mt-1 block text-sm text-[#4A4339]"><?php echo esc_html($card['note']); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-14 sm:py-20" aria-labelledby="contact-form-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.2fr_0.8fr] lg:px-8">
            <div class="rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6 shadow-[6px_6px_0_#17140F] sm:p-8">
                <h2 id="contact-form-title" class="font-display text-3xl uppercase sm:text-4xl"><?php esc_html_e('Send us a message', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-[#4A4339]"><?php esc_html_e('Include your order number for order questions — it helps us answer faster.', 'dawp'); ?></p>

                <?php if ($status === 'success') : ?>
                    <div class="mt-6 rounded-[8px] border-2 border-[#2E7D4F] bg-[#E8F3EC] p-4 text-sm font-semibold leading-6 text-[#1F5A37]" role="status">
                        <?php esc_html_e('Thanks! Your message has reached the SlickTee support team. We’ll reply within 24 hours.', 'dawp'); ?>
                    </div>
                <?php elseif ($status === 'error') : ?>
                    <div class="mt-6 rounded-[8px] border-2 border-[#C42B1C] bg-[#FBE3DC] p-4 text-sm font-semibold leading-6 text-[#8A1E12]" role="alert">
                        <?php esc_html_e('Please check the required fields and try again, or email support@slicktee.com directly.', 'dawp'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="mt-7 grid gap-5">
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>

                    <div class="hidden" aria-hidden="true">
                        <label for="company-website"><?php esc_html_e('Company website', 'dawp'); ?></label>
                        <input id="company-website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="contact-name" class="block text-sm font-extrabold"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-[#D7351E]">*</span></label>
                            <input id="contact-name" name="contact_name" type="text" autocomplete="name" required class="<?php echo esc_attr($input_class); ?>" placeholder="<?php esc_attr_e('Your name', 'dawp'); ?>">
                        </div>
                        <div>
                            <label for="contact-email" class="block text-sm font-extrabold"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-[#D7351E]">*</span></label>
                            <input id="contact-email" name="contact_email" type="email" autocomplete="email" required class="<?php echo esc_attr($input_class); ?>" placeholder="<?php esc_attr_e('you@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="contact-topic" class="block text-sm font-extrabold"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="contact-topic" name="contact_topic" class="<?php echo esc_attr($input_class); ?>">
                                <?php foreach ($form_topics as $value => $label) : ?>
                                    <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="order-number" class="block text-sm font-extrabold"><?php esc_html_e('Order number', 'dawp'); ?></label>
                            <input id="order-number" name="order_number" type="text" autocomplete="off" class="<?php echo esc_attr($input_class); ?>" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                    </div>

                    <div>
                        <label for="contact-message" class="block text-sm font-extrabold"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-[#D7351E]">*</span></label>
                        <textarea id="contact-message" name="contact_message" rows="6" required class="<?php echo esc_attr($input_class); ?> resize-y py-3 leading-7" placeholder="<?php esc_attr_e('Tell us how we can help. For a misprint or damage, mention it here and reply to our email with a photo.', 'dawp'); ?>"></textarea>
                    </div>

                    <p class="text-xs leading-5 text-[#6F665A]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: %s: privacy policy link */
                                __('By submitting this form you agree that SlickTee may use your details to respond to your request. See our %s.', 'dawp'),
                                '<a class="font-bold text-[#17140F] underline" href="' . esc_url($privacy_url) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>'
                            ),
                            ['a' => ['class' => [], 'href' => []]]
                        );
                        ?>
                    </p>

                    <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center rounded-[8px] border-2 border-[#17140F] bg-[#D7351E] px-8 text-sm font-extrabold uppercase tracking-wide text-[#FFFFFF] shadow-[4px_4px_0_#17140F] transition hover:translate-x-[2px] hover:translate-y-[2px] hover:bg-[#B32813] hover:shadow-[2px_2px_0_#17140F] sm:w-auto">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>
                </form>
            </div>

            <aside class="grid content-start gap-6">
                <div class="rounded-[14px] border-2 border-[#17140F] bg-[#F4EDE0] p-6">
                    <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Quick tips', 'dawp'); ?></h2>
                    <ul class="mt-4 grid gap-4">
                        <?php foreach ($quick_tips as $tip) : ?>
                            <li class="border-l-4 border-[#D7351E] pl-4">
                                <p class="text-sm font-extrabold uppercase tracking-wide"><?php echo esc_html($tip['title']); ?></p>
                                <p class="mt-1 text-sm leading-6 text-[#4A4339]"><?php echo esc_html($tip['copy']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="mt-5 text-xs leading-5 text-[#6F665A]"><?php esc_html_e('Delivery can occasionally take longer around holidays or during severe weather.', 'dawp'); ?></p>
                </div>

                <div class="rounded-[14px] border-2 border-[#17140F] bg-[#17140F] p-6 text-[#FBF7EF]">
                    <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Business information', 'dawp'); ?></h2>
                    <address class="mt-4 grid gap-4 text-sm not-italic leading-6 text-[#FBF7EF]/80">
                        <span><strong class="block text-[#F2B33D]">SlickTee</strong>slicktee.com</span>
                        <span><strong class="block text-[#F2B33D]"><?php esc_html_e('US Address', 'dawp'); ?></strong><?php echo esc_html($us_address); ?></span>
                        <span><strong class="block text-[#F2B33D]"><?php esc_html_e('Support hours', 'dawp'); ?></strong><?php esc_html_e('Mon–Fri 10am–6pm · Saturday 8am–6pm', 'dawp'); ?></span>
                    </address>
                </div>
            </aside>
        </div>
    </section>
</div>
