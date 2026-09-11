<?php
/**
 * Track Order- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$order  = null;
$error  = '';
$looked = false;

if (!empty($_GET['track_order']) && !empty($_GET['track_email'])) {
    $looked        = true;
    $raw_number    = sanitize_text_field(wp_unslash($_GET['track_order']));
    $email         = sanitize_email(wp_unslash($_GET['track_email']));
    $order_id      = (int) preg_replace('/[^0-9]/', '', $raw_number);

    if ($order_id && is_email($email) && function_exists('wc_get_order')) {
        $candidate = wc_get_order($order_id);

        if ($candidate instanceof WC_Order && strtolower($candidate->get_billing_email()) === strtolower($email)) {
            $order = $candidate;
        } else {
            $error = __('We could not find an order matching that order number and email address. Double-check both and try again.', 'dawp');
        }
    } else {
        $error = __('Please enter a valid order number and the email address used at checkout.', 'dawp');
    }
}

$dawp_steps = ['pending' => 1, 'processing' => 2, 'on-hold' => 2, 'completed' => 3];

if ($order instanceof WC_Order) {
    $status = $order->get_status();
    $step   = $dawp_steps[$status] ?? 1;

    if (in_array($status, ['cancelled', 'refunded', 'failed'], true)) {
        $step = 0;
    }
}
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-4 py-14 text-center sm:px-6 lg:px-8 lg:py-16">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Support', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-semibold sm:text-4xl"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
            <p class="mx-auto mt-5 max-w-xl text-base leading-8 text-white/75"><?php esc_html_e('Enter your order number and the email address used at checkout.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-xl px-4 sm:px-6 lg:px-8">
            <form method="get" class="space-y-5 rounded-lg border border-line bg-surface p-7 shadow-card">
                <div>
                    <label for="track_order" class="font-heading text-xs font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                    <input type="text" id="track_order" name="track_order" required placeholder="WF-10234" value="<?php echo esc_attr($_GET['track_order'] ?? ''); ?>" class="mt-2 w-full min-h-12 border border-line bg-background px-4 text-sm text-foreground outline-none transition focus:border-accent">
                </div>
                <div>
                    <label for="track_email" class="font-heading text-xs font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Email Address', 'dawp'); ?></label>
                    <input type="email" id="track_email" name="track_email" required value="<?php echo esc_attr($_GET['track_email'] ?? ''); ?>" class="mt-2 w-full min-h-12 border border-line bg-background px-4 text-sm text-foreground outline-none transition focus:border-accent">
                </div>
                <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center bg-primary px-8 font-heading text-xs font-semibold uppercase tracking-button text-white transition hover:bg-primary-soft">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </button>
            </form>

            <?php if ($error) : ?>
                <p class="mt-6 rounded-md border border-alert bg-surface-alt px-5 py-4 text-sm text-alert" role="alert"><?php echo esc_html($error); ?></p>
            <?php endif; ?>

            <?php if ($order instanceof WC_Order) : ?>
                <div class="mt-10">
                    <h2 class="font-heading text-lg font-semibold text-primary"><?php echo esc_html(sprintf(__('Order %s', 'dawp'), $order->get_order_number())); ?></h2>
                    <p class="mt-1 text-sm text-muted"><?php echo esc_html($order->get_date_created() ? $order->get_date_created()->date_i18n('F j, Y') : ''); ?></p>

                    <?php if ($step > 0) : ?>
                        <div class="mt-8 flex items-center justify-between">
                            <?php
                            $labels = [__('Order Placed', 'dawp'), __('Processing', 'dawp'), __('Completed', 'dawp')];
                            foreach ($labels as $i => $label) :
                                $n = $i + 1;
                                $reached = $n <= $step;
                                ?>
                                <div class="flex flex-1 flex-col items-center text-center">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-full border text-xs font-semibold <?php echo $reached ? 'border-accent bg-accent text-primary' : 'border-line bg-surface text-muted'; ?>"><?php echo esc_html($n); ?></span>
                                    <span class="mt-2 text-xs <?php echo $reached ? 'text-primary' : 'text-muted'; ?>"><?php echo esc_html($label); ?></span>
                                </div>
                                <?php if ($n < count($labels)) : ?>
                                    <span class="mb-6 h-px flex-1 <?php echo $n < $step ? 'bg-accent' : 'bg-line'; ?>"></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <p class="mt-8 font-heading text-xs font-semibold uppercase tracking-label text-muted"><?php esc_html_e('Status', 'dawp'); ?></p>
                    <p class="mt-1 text-base text-foreground"><?php echo esc_html(wc_get_order_status_name($order->get_status())); ?></p>

                    <div class="mt-8 divide-y divide-line border-y border-line">
                        <?php foreach ($order->get_items() as $item) : ?>
                            <div class="flex items-center justify-between py-4 text-sm">
                                <span class="text-foreground"><?php echo esc_html($item->get_name()); ?> × <?php echo esc_html($item->get_quantity()); ?></span>
                                <span class="text-muted"><?php echo wp_kses_post($order->get_formatted_line_subtotal($item)); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-8 flex justify-between text-sm font-semibold text-primary">
                        <span><?php esc_html_e('Order Total', 'dawp'); ?></span>
                        <span><?php echo wp_kses_post($order->get_formatted_order_total()); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <p class="mt-10 text-center text-sm text-muted">
                <?php esc_html_e('Need help with your order?', 'dawp'); ?>
                <a href="<?php echo esc_url(home_url('/contact-us/?topic=order')); ?>" class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent-hover"><?php esc_html_e('Contact us', 'dawp'); ?></a>
            </p>
        </div>
    </section>
</div>
