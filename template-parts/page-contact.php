<?php
/**
 * Contact page- WristUnion.
 *
 * The form posts to admin-post.php and is handled by dawp_handle_contact_form()
 * in inc/contact-form.php. Field names, the action (`lbq_contact_form`), the
 * nonce (`lbq_contact_nonce`), and the topic keys must match that handler.
 * A `?topic=` query param preselects the matching topic.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email          = function_exists('dawp_store_email') ? dawp_store_email() : 'support@wristunion.com';
$address        = function_exists('dawp_store_address') ? dawp_store_address() : '';
$business_hours = __('Monday to Friday, 9:00 AM to 5:00 PM EST', 'dawp');
$status         = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$topic_pre      = isset($_GET['topic']) ? sanitize_key(wp_unslash($_GET['topic'])) : '';

$topics = [
    'order'   => __('Order or tracking question', 'dawp'),
    'return'  => __('Return or refund request', 'dawp'),
    'product' => __('Product question', 'dawp'),
    'privacy' => __('Privacy request', 'dawp'),
    'other'   => __('General support', 'dawp'),
];

if (!isset($topics[$topic_pre])) {
    $topic_pre = 'order';
}

$info_cards = [
    ['label' => __('Email', 'dawp'),         'value' => '<a class="font-semibold text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'],
    ['label' => __('Support hours', 'dawp'), 'value' => esc_html($business_hours)],
    ['label' => __('Response time', 'dawp'), 'value' => esc_html__('A real person replies within 1 business day.', 'dawp')],
];

if ($address) {
    $info_cards[] = ['label' => __('Business address', 'dawp'), 'value' => esc_html($address)];
}
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-8 py-16 sm:px-14 lg:py-20">
            <p class="text-[11px] font-medium uppercase tracking-brand text-accent"><?php esc_html_e('Contact', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-[clamp(2rem,5vw,3rem)] font-bold leading-[1.05]"><?php esc_html_e('Talk to the workshop', 'dawp'); ?></h1>
            <p class="mt-5 font-serif text-lg leading-8 text-white/80">
                <?php esc_html_e('A question about an order or a return, a product detail, or a privacy request- send a message and we reply within 1 business day.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto grid max-w-5xl gap-12 px-8 sm:px-14 lg:grid-cols-2">

            <div>
                <h2 class="font-heading text-lg font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Details', 'dawp'); ?></h2>
                <dl class="mt-5 divide-y divide-line border-y border-line">
                    <?php foreach ($info_cards as $card) : ?>
                        <div class="flex flex-col gap-1 py-3 sm:flex-row sm:items-baseline sm:justify-between sm:gap-6">
                            <dt class="shrink-0 text-xs font-semibold uppercase tracking-label text-muted"><?php echo esc_html($card['label']); ?></dt>
                            <dd class="text-sm leading-6 text-foreground sm:text-right"><?php echo wp_kses_post($card['value']); ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>

                <div class="mt-6 border border-line bg-surface p-5">
                    <h3 class="font-heading text-sm font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Before you write', 'dawp'); ?></h3>
                    <ul class="mt-3 grid gap-2 font-serif text-sm leading-6 text-foreground-muted">
                        <li><a class="text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track an existing order', 'dawp'); ?></a></li>
                        <li><a class="text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('How our watches are designed and made', 'dawp'); ?></a></li>
                        <li><a class="text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping times and costs', 'dawp'); ?></a></li>
                        <li><a class="text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Start a return or refund', 'dawp'); ?></a></li>
                    </ul>
                </div>
            </div>

            <div>
                <h2 class="font-heading text-lg font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Send a message', 'dawp'); ?></h2>

                <?php if ($status === 'success') : ?>
                    <div class="mt-5 border border-success bg-surface p-4 text-sm font-medium text-foreground" role="status">
                        <?php esc_html_e('Thanks- your message has been sent. We reply within 1 business day.', 'dawp'); ?>
                    </div>
                <?php elseif ($status === 'error') : ?>
                    <div class="mt-5 border border-alert bg-surface p-4 text-sm font-medium text-foreground" role="alert">
                        <?php esc_html_e('Something went wrong. Please check the required fields and try again.', 'dawp'); ?>
                    </div>
                <?php elseif ($status === 'captcha') : ?>
                    <div class="mt-5 border border-alert bg-surface p-4 text-sm font-medium text-foreground" role="alert">
                        <?php esc_html_e('We could not verify that you are human. Please complete the verification and try again.', 'dawp'); ?>
                    </div>
                <?php endif; ?>

                <form class="mt-5 grid gap-4 border border-line bg-surface p-6" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>

                    <div class="hidden" aria-hidden="true">
                        <label for="company_website"><?php esc_html_e('Company website', 'dawp'); ?></label>
                        <input type="text" id="company_website" name="company_website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_name"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-alert">*</span></label>
                        <input class="min-h-11 border border-line bg-background px-3 text-sm text-foreground outline-none transition focus:border-blued" type="text" id="contact_name" name="contact_name" required autocomplete="name">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_email"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-alert">*</span></label>
                        <input class="min-h-11 border border-line bg-background px-3 text-sm text-foreground outline-none transition focus:border-blued" type="email" id="contact_email" name="contact_email" required autocomplete="email">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                        <select class="min-h-11 border border-line bg-background px-3 text-sm text-foreground outline-none transition focus:border-blued" id="contact_topic" name="contact_topic">
                            <?php foreach ($topics as $key => $label) : ?>
                                <option value="<?php echo esc_attr($key); ?>" <?php selected($topic_pre, $key); ?>><?php echo esc_html($label); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="order_number"><?php esc_html_e('Order number', 'dawp'); ?> <span class="font-normal text-muted"><?php esc_html_e('(optional)', 'dawp'); ?></span></label>
                        <input class="min-h-11 border border-line bg-background px-3 text-sm text-foreground outline-none transition focus:border-blued" type="text" id="order_number" name="order_number" placeholder="<?php esc_attr_e('e.g. WU-1234', 'dawp'); ?>" autocomplete="off">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_message"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-alert">*</span></label>
                        <textarea class="min-h-32 border border-line bg-background px-3 py-2 text-sm text-foreground outline-none transition focus:border-blued" id="contact_message" name="contact_message" rows="6" required placeholder="<?php esc_attr_e('Your order number, if you have one, and how we can help.', 'dawp'); ?>"></textarea>
                    </div>

                    <?php if (defined('DAWP_TURNSTILE_SITE_KEY') && DAWP_TURNSTILE_SITE_KEY) : ?>
                        <div class="cf-turnstile mt-1" data-sitekey="<?php echo esc_attr(DAWP_TURNSTILE_SITE_KEY); ?>" data-theme="auto"></div>
                        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
                    <?php endif; ?>

                    <button type="submit" class="mt-1 inline-flex min-h-12 items-center justify-center border border-primary bg-primary px-7 text-xs font-semibold uppercase tracking-button text-white transition hover:bg-transparent hover:text-primary">
                        <?php esc_html_e('Send message', 'dawp'); ?>
                    </button>

                    <p class="font-serif text-xs leading-5 text-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: %s: privacy policy link */
                                __('We use your details only to answer your enquiry. See our %s.', 'dawp'),
                                '<a class="underline decoration-line underline-offset-4" href="' . esc_url(home_url('/privacy-policy/')) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>'
                            ),
                            ['a' => ['class' => [], 'href' => []]]
                        );
                        ?>
                    </p>
                </form>
            </div>

        </div>
    </section>
</div>
