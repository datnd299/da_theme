<?php
/**
 * Contact page — ProudlyWear.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@proudlywear.com';
$privacy_url   = home_url('/privacy-policy/');

$status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

$form_topics = [
    'order'   => __('Order or tracking question', 'dawp'),
    'return'  => __('Return, exchange or damaged item', 'dawp'),
    'product' => __('Product, size or design question', 'dawp'),
    'privacy' => __('Privacy request', 'dawp'),
    'other'   => __('General support', 'dawp'),
];

$contact_cards = [
    [
        'title' => __('Email support', 'dawp'),
        'value' => $support_email,
        'href'  => 'mailto:' . $support_email,
        'note'  => __('Fastest way to reach us — reply within 24 hours.', 'dawp'),
        'icon'  => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
    ],
    [
        'title' => __('Track an order', 'dawp'),
        'value' => __('Order Tracking', 'dawp'),
        'href'  => home_url('/track-order/'),
        'note'  => __('Order number + billing email is all you need.', 'dawp'),
        'icon'  => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
    ],
];

$quick_tips = [
    ['title' => __('Production time', 'dawp'), 'copy' => __('Every order is printed to order and quality-checked in 2–3 business days before it ships.', 'dawp')],
    ['title' => __('Shipping time', 'dawp'), 'copy' => __('US orders arrive in 5–10 business days after dispatch. Free standard shipping on orders $49+.', 'dawp')],
    ['title' => __('Need to change something?', 'dawp'), 'copy' => __('Size, color, address changes and cancellations are possible within 24 hours of ordering, before production starts.', 'dawp')],
    ['title' => __('Something wrong?', 'dawp'), 'copy' => __('Damaged, defective or wrong item? Email photos within 7 days of delivery and we’ll replace or refund it.', 'dawp')],
];

$input_class = 'mt-2 block min-h-12 w-full rounded-md border border-border-strong bg-background px-4 text-base text-foreground outline-none transition placeholder:text-muted focus:border-accent-2 focus:ring-4 focus:ring-highlight-soft';
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border-strong py-14 sm:py-20" aria-labelledby="contact-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="font-stencil inline-flex items-center gap-2 border-y-2 border-foreground py-1 text-sm uppercase tracking-[0.2em]"><span class="text-accent" aria-hidden="true">★</span><?php esc_html_e('Contact Us', 'dawp'); ?></span>
            <h1 id="contact-title" class="font-display mt-5 max-w-3xl text-5xl uppercase leading-[1] sm:text-7xl"><?php esc_html_e('We’re here to help.', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-foreground-muted"><?php esc_html_e('Questions about sizing, an order update, or a problem we need to make right — send us a note and a real person will answer within 24 hours, Monday to Friday.', 'dawp'); ?></p>

            <div class="mt-10 grid gap-4 md:grid-cols-2">
                <?php foreach ($contact_cards as $card) : ?>
                    <a href="<?php echo esc_attr($card['href']); ?>" class="group flex gap-4 rounded-lg border border-border bg-[#FFFFFF] p-5 transition hover:-translate-y-1 hover:border-border-strong hover:shadow-card-hover">
                        <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-full border-2 border-highlight bg-foreground text-background" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $card['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
                        </span>
                        <span class="min-w-0">
                            <span class="block font-heading text-sm font-bold uppercase tracking-[0.16em] text-muted"><?php echo esc_html($card['title']); ?></span>
                            <span class="font-display mt-1 block break-words text-xl tracking-wide group-hover:text-accent"><?php echo esc_html($card['value']); ?></span>
                            <span class="mt-1 block text-sm text-foreground-muted"><?php echo esc_html($card['note']); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-14 sm:py-20" aria-labelledby="contact-form-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.2fr_0.8fr] lg:px-8">
            <div class="rounded-lg border border-border border-t-4 border-t-accent bg-[#FFFFFF] p-6 shadow-card sm:p-8">
                <h2 id="contact-form-title" class="font-display text-3xl uppercase sm:text-4xl"><?php esc_html_e('Send us a message', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php esc_html_e('Include your order number for order questions — it helps us answer faster.', 'dawp'); ?></p>

                <?php if ($status === 'success') : ?>
                    <div class="mt-6 rounded-md border border-success bg-[#E6F0EA] p-4 text-sm font-semibold leading-6 text-success" role="status">
                        <?php esc_html_e('Thank you! Your message has reached the ProudlyWear support team. We’ll reply within 24 hours, Monday to Friday.', 'dawp'); ?>
                    </div>
                <?php elseif ($status === 'error') : ?>
                    <div class="mt-6 rounded-md border border-alert bg-accent-soft p-4 text-sm font-semibold leading-6 text-alert" role="alert">
                        <?php esc_html_e('Please check the required fields and try again, or email support@proudlywear.com directly.', 'dawp'); ?>
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
                            <label for="contact-name" class="block text-sm font-bold"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-accent">*</span></label>
                            <input id="contact-name" name="contact_name" type="text" autocomplete="name" required class="<?php echo esc_attr($input_class); ?>" placeholder="<?php esc_attr_e('Your name', 'dawp'); ?>">
                        </div>
                        <div>
                            <label for="contact-email" class="block text-sm font-bold"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-accent">*</span></label>
                            <input id="contact-email" name="contact_email" type="email" autocomplete="email" required class="<?php echo esc_attr($input_class); ?>" placeholder="<?php esc_attr_e('you@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="contact-topic" class="block text-sm font-bold"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="contact-topic" name="contact_topic" class="<?php echo esc_attr($input_class); ?>">
                                <?php foreach ($form_topics as $value => $label) : ?>
                                    <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="order-number" class="block text-sm font-bold"><?php esc_html_e('Order number', 'dawp'); ?></label>
                            <input id="order-number" name="order_number" type="text" autocomplete="off" class="<?php echo esc_attr($input_class); ?>" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                    </div>

                    <div>
                        <label for="contact-message" class="block text-sm font-bold"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-accent">*</span></label>
                        <textarea id="contact-message" name="contact_message" rows="6" required class="<?php echo esc_attr($input_class); ?> resize-y py-3 leading-7" placeholder="<?php esc_attr_e('Tell us how we can help. For a damaged or wrong item, mention it here and reply to our email with photos.', 'dawp'); ?>"></textarea>
                    </div>

                    <p class="text-xs leading-5 text-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: %s: privacy policy link */
                                __('By submitting this form you agree that ProudlyWear may use your details to respond to your request. See our %s.', 'dawp'),
                                '<a class="font-bold text-foreground underline" href="' . esc_url($privacy_url) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>'
                            ),
                            ['a' => ['class' => [], 'href' => []]]
                        );
                        ?>
                    </p>

                    <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center rounded-md bg-accent px-8 font-heading text-base font-bold uppercase tracking-wider text-background shadow-ink transition hover:translate-y-[2px] hover:bg-accent-hover hover:shadow-none sm:w-auto">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>
                </form>
            </div>

            <aside class="grid content-start gap-6">
                <div class="rounded-lg border border-border bg-surface p-6">
                    <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Quick answers', 'dawp'); ?></h2>
                    <ul class="mt-4 grid gap-4">
                        <?php foreach ($quick_tips as $tip) : ?>
                            <li class="border-l-4 border-accent pl-4">
                                <p class="font-heading text-sm font-bold uppercase tracking-wide"><?php echo esc_html($tip['title']); ?></p>
                                <p class="mt-1 text-sm leading-6 text-foreground-muted"><?php echo esc_html($tip['copy']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="mt-5 text-xs leading-5 text-muted"><?php esc_html_e('Delivery can occasionally take longer around holidays or during severe weather.', 'dawp'); ?></p>
                </div>

                <div class="rounded-lg border-t-4 border-highlight bg-foreground p-6 text-background">
                    <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Store information', 'dawp'); ?></h2>
                    <dl class="mt-4 grid gap-4 text-sm leading-6 text-background/80">
                        <div><dt class="font-bold text-highlight">ProudlyWear</dt><dd>proudlywear.com</dd></div>
                        <div><dt class="font-bold text-highlight"><?php esc_html_e('Email', 'dawp'); ?></dt><dd><a class="underline hover:text-highlight" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd></div>
                        <div><dt class="font-bold text-highlight"><?php esc_html_e('Support hours', 'dawp'); ?></dt><dd><?php esc_html_e('Monday–Friday, 9am–5pm ET', 'dawp'); ?></dd></div>
                    </dl>
                </div>
            </aside>
        </div>
    </section>
</div>
