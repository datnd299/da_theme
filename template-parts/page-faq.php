<?php
/**
 * FAQ- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$dawp_faq_groups = [
    [
        'title' => __('Shipping', 'dawp'),
        'items' => [
            [__('Do you ship for free?', 'dawp'), __('Yes. Every order within the US ships free, no minimum required.', 'dawp')],
            [__('How fast will my watch ship?', 'dawp'), __('Orders placed before 3 PM EST on a business day dispatch the same day; otherwise they dispatch the next business day. Delivery takes 3-7 business days after dispatch.', 'dawp')],
            [__('Do you ship outside the US?', 'dawp'), __('Not yet- Watchfavor currently ships to US addresses only.', 'dawp')],
        ],
    ],
    [
        'title' => __('Returns & Warranty', 'dawp'),
        'items' => [
            [__('What is your return policy?', 'dawp'), __('Unworn watches in original packaging can be returned within 30 days of delivery for a full refund. See our Return & Refund Policy for details.', 'dawp')],
            [__('Who pays return shipping?', 'dawp'), __('Watchfavor covers return shipping when the return is due to a defect or our error; otherwise the customer covers the return label.', 'dawp')],
        ],
    ],
    [
        'title' => __('The Movement', 'dawp'),
        'items' => [
            [__('Are these watches automatic or quartz?', 'dawp'), __('Every Watchfavor watch runs on a self-winding automatic mechanical movement. No batteries.', 'dawp')],
            [__('How long does the power reserve last?', 'dawp'), __('Roughly 40-42 hours on a full wind, depending on the model. Wearing the watch daily keeps it wound through your natural wrist motion.', 'dawp')],
            [__('What is the water resistance?', 'dawp'), __('Case and reference-specific water resistance is listed on each product page. As a general rule, avoid hot showers and high-pressure water regardless of rating.', 'dawp')],
        ],
    ],
    [
        'title' => __('Sizing & Fit', 'dawp'),
        'items' => [
            [__('How do I find my case size?', 'dawp'), __('Case diameter, thickness and lug-to-lug are listed on every product page. Measure a watch you already own and compare against those numbers.', 'dawp')],
            [__('Can I resize the strap or bracelet?', 'dawp'), __('Yes- leather straps use a standard spring bar and can be swapped at any jeweler; steel bracelets can be sized by removing links.', 'dawp')],
        ],
    ],
    [
        'title' => __('Payment', 'dawp'),
        'items' => [
            [__('What payment methods do you accept?', 'dawp'), __('All checkout payments are processed securely through PayPal. You can pay with your PayPal balance, a linked bank account, or a Visa, Mastercard, Amex or Discover card- no PayPal account required for card payments.', 'dawp')],
            [__('When is my card charged?', 'dawp'), __('Your payment method is charged in full at the time of purchase, via PayPal.', 'dawp')],
            [__('How do refunds work if I paid with PayPal?', 'dawp'), __('Approved refunds are sent back through PayPal to your original payment method. It shows in your PayPal account within minutes, though it can take a few extra business days to post back to a linked card or bank.', 'dawp')],
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-4 py-14 text-center sm:px-6 lg:px-8 lg:py-16">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Support', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-semibold sm:text-4xl"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <?php foreach ($dawp_faq_groups as $group) : ?>
                <div class="mt-12 first:mt-0">
                    <h2 class="font-heading text-xs font-semibold uppercase tracking-brand text-accent-hover"><?php echo esc_html($group['title']); ?></h2>
                    <div class="mt-5 divide-y divide-line border-y border-line">
                        <?php foreach ($group['items'] as [$q, $a]) : ?>
                            <details class="group py-5">
                                <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-heading text-base font-medium text-primary marker:content-none">
                                    <?php echo esc_html($q); ?>
                                    <svg class="shrink-0 transition duration-normal group-open:rotate-45" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent-hover)" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
                                </summary>
                                <p class="mt-3 max-w-2xl text-sm leading-7 text-foreground-muted"><?php echo esc_html($a); ?></p>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="mt-14 rounded-lg border border-line bg-surface p-7 text-center shadow-card">
                <h2 class="font-heading text-lg font-semibold text-primary"><?php esc_html_e('Still have a question?', 'dawp'); ?></h2>
                <p class="mt-2 text-sm text-muted"><?php esc_html_e('We reply within 1 business day.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="mt-5 inline-flex min-h-11 items-center justify-center bg-primary px-7 font-heading text-xs font-semibold uppercase tracking-button text-white transition hover:bg-primary-soft">
                    <?php esc_html_e('Contact Us', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>
</div>
