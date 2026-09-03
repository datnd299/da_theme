<?php
/**
 * Contact page — North Time Co.
 *
 * The form posts to admin-post.php and is handled by dawp_handle_contact_form()
 * in inc/contact-form.php. The field names, the action (`lbq_contact_form`),
 * the nonce (`lbq_contact_nonce`), and the topic keys must match that handler.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email          = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';
$address        = function_exists('dawp_store_address') ? dawp_store_address() : '';
$business_hours = __('Monday to Friday, 9:00 AM to 5:00 PM EST', 'dawp');
$status         = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

$topics = [
    'order'   => __('Order or tracking question', 'dawp'),
    'return'  => __('Return or refund request', 'dawp'),
    'product' => __('Product question', 'dawp'),
    'privacy' => __('Privacy request', 'dawp'),
    'other'   => __('General support', 'dawp'),
];

$info_cards = [
    [
        'label' => __('Email', 'dawp'),
        'value' => '<a class="font-semibold text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>',
    ],
    [
        'label' => __('Support hours', 'dawp'),
        'value' => esc_html($business_hours),
    ],
    [
        'label' => __('Response time', 'dawp'),
        'value' => esc_html__('We reply to every message within 1 business day.', 'dawp'),
    ],
];

if ($address) {
    $info_cards[] = [
        'label' => __('Business address', 'dawp'),
        'value' => esc_html($address),
    ];
}
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Contact', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-bold uppercase leading-tight sm:text-4xl"><?php esc_html_e('Contact us', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-8 text-white/80">
                <?php esc_html_e('Questions about an order, a return, a product, or a privacy request? Send us a message and we will respond within 1 business day.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-6xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">

            <div>
                <h2 class="font-heading text-lg font-bold uppercase text-foreground"><?php esc_html_e('Store details', 'dawp'); ?></h2>
                <dl class="mt-5 grid gap-4">
                    <?php foreach ($info_cards as $card) : ?>
                        <div class="rounded-xl border border-line bg-white p-5">
                            <dt class="text-xs font-semibold uppercase tracking-wide text-muted"><?php echo esc_html($card['label']); ?></dt>
                            <dd class="mt-1 text-sm leading-6 text-foreground"><?php echo wp_kses_post($card['value']); ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>

                <div class="mt-6 rounded-xl border border-line bg-white p-5">
                    <h3 class="font-heading text-sm font-bold uppercase text-foreground"><?php esc_html_e('Before you write', 'dawp'); ?></h3>
                    <ul class="mt-3 grid gap-2 text-sm leading-6 text-muted">
                        <li><a class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track an existing order', 'dawp'); ?></a></li>
                        <li><a class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping times and costs', 'dawp'); ?></a></li>
                        <li><a class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Start a return or refund', 'dawp'); ?></a></li>
                        <li><a class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Read the FAQ', 'dawp'); ?></a></li>
                    </ul>
                </div>
            </div>

            <div>
                <h2 class="font-heading text-lg font-bold uppercase text-foreground"><?php esc_html_e('Send a message', 'dawp'); ?></h2>

                <?php if ($status === 'success') : ?>
                    <div class="mt-5 rounded-xl border border-success bg-white p-4 text-sm font-medium text-foreground" role="status">
                        <?php esc_html_e('Thanks — your message has been sent. We will respond within 1 business day.', 'dawp'); ?>
                    </div>
                <?php elseif ($status === 'error') : ?>
                    <div class="mt-5 rounded-xl border border-alert bg-white p-4 text-sm font-medium text-foreground" role="alert">
                        <?php esc_html_e('Something went wrong. Please check the required fields and try again.', 'dawp'); ?>
                    </div>
                <?php endif; ?>

                <form class="mt-5 grid gap-4 rounded-xl border border-line bg-white p-6" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>

                    <div class="hidden" aria-hidden="true">
                        <label for="company_website"><?php esc_html_e('Company website', 'dawp'); ?></label>
                        <input type="text" id="company_website" name="company_website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_name"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-alert">*</span></label>
                        <input class="min-h-11 rounded-lg border border-line bg-white px-3 text-sm text-foreground outline-none transition focus:border-primary focus:ring-2 focus:ring-accent/40" type="text" id="contact_name" name="contact_name" required autocomplete="name">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_email"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-alert">*</span></label>
                        <input class="min-h-11 rounded-lg border border-line bg-white px-3 text-sm text-foreground outline-none transition focus:border-primary focus:ring-2 focus:ring-accent/40" type="email" id="contact_email" name="contact_email" required autocomplete="email">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                        <select class="min-h-11 rounded-lg border border-line bg-white px-3 text-sm text-foreground outline-none transition focus:border-primary focus:ring-2 focus:ring-accent/40" id="contact_topic" name="contact_topic">
                            <?php foreach ($topics as $key => $label) : ?>
                                <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="order_number"><?php esc_html_e('Order number', 'dawp'); ?> <span class="font-normal text-muted"><?php esc_html_e('(optional)', 'dawp'); ?></span></label>
                        <input class="min-h-11 rounded-lg border border-line bg-white px-3 text-sm text-foreground outline-none transition focus:border-primary focus:ring-2 focus:ring-accent/40" type="text" id="order_number" name="order_number" placeholder="<?php esc_attr_e('e.g. NTC-1234', 'dawp'); ?>" autocomplete="off">
                    </div>

                    <div class="grid gap-1.5">
                        <label class="text-sm font-semibold text-foreground" for="contact_message"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-alert">*</span></label>
                        <textarea class="min-h-32 rounded-lg border border-line bg-white px-3 py-2 text-sm text-foreground outline-none transition focus:border-primary focus:ring-2 focus:ring-accent/40" id="contact_message" name="contact_message" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="mt-1 inline-flex min-h-12 items-center justify-center rounded-lg bg-accent px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-accent-hover">
                        <?php esc_html_e('Send message', 'dawp'); ?>
                    </button>

                    <p class="text-xs leading-5 text-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: %s: privacy policy link */
                                __('We use your details only to answer your enquiry. See our %s.', 'dawp'),
                                '<a class="underline decoration-accent decoration-2 underline-offset-4" href="' . esc_url(home_url('/privacy-policy/')) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>'
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
