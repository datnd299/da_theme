<?php
/**
 * Return & refund policy page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Long Document (genuinely
 * ordinal return steps keep numbering - ordinal content is the documented
 * exception to the no-eyebrow rule)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@uswatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$last_updated   = __('August 21, 2026', 'dawp');
$contact_url    = home_url('/contact-us/');
$faq_url        = home_url('/faq/');
$shipping_url   = home_url('/shipping-policy/');
$terms_url      = home_url('/terms-of-service/');

$return_requirements = [
    __('Return requests must be made within 30 days of the delivery date shown in your tracking information, no questions asked.', 'dawp'),
    __('The watch must be unworn and undamaged, in original condition, with no alterations by an unauthorized party.', 'dawp'),
    __('Original box, protective packaging, tags, warranty papers, links, and any included accessories must be returned with the watch.', 'dawp'),
    __('Watches showing signs of wear, scent, adjusted bracelet links without the original links included, or accidental or water damage do not qualify for a standard return.', 'dawp'),
];

$return_process = [
    __('Email support@uswatchstore.com with your order number, the watch you would like to return, and the reason for the request.', 'dawp'),
    __('Wait for return instructions and a return authorization before sending anything back so the return can be matched to your order.', 'dawp'),
    __('Pack the watch securely in its original box with all papers and accessories, and ship it using a trackable, insured method.', 'dawp'),
    __('Once the return is received, we inspect it within 3-5 business days to confirm it meets the eligibility requirements.', 'dawp'),
    __('Eligible refunds are issued to the original payment method; you will receive an email confirmation once the refund is processed.', 'dawp'),
];

$warranty_claim = [
    __('Every watch is covered by a 2-year limited warranty, starting from the delivery date, against movement, battery, and factory-assembly defects from normal use.', 'dawp'),
    __('Accidental damage, water damage beyond the watch\'s rated resistance, damage from unauthorized repair or battery replacement, and normal wear (strap wear, crystal scratches, case scuffing, battery depletion after normal battery life) are not covered.', 'dawp'),
    __('To file a warranty claim, email support@uswatchstore.com with your order number, a description of the issue, and photos or video if applicable. We will confirm coverage and arrange a repair, replacement, or refund.', 'dawp'),
];

$sections = [
    [
        'title' => __('1. Return Eligibility in Full', 'dawp'),
        'copy'  => [
            __('Returns must be requested within 30 days of the delivery date shown in your tracking information. Requests submitted after 30 days cannot be accepted as a standard, no-questions-asked return.', 'dawp'),
            __('To qualify, the watch must be unworn, unaltered, and undamaged, in its original condition, with the original box, protective packaging, tags, warranty papers, links, and any included accessories.', 'dawp'),
            __('Items purchased through unauthorized resellers and watches damaged after delivery due to customer misuse are not eligible under this standard return policy, but may still qualify for a warranty claim if the issue is a covered defect. See Section 8.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Return Shipping Costs', 'dawp'),
        'copy'  => [
            __('Customers are responsible for return shipping costs on standard, no-questions-asked returns.', 'dawp'),
            __('If the item arrived damaged, defective, or different from what you ordered, US Watch Store covers the cost of return shipping and will provide a prepaid label or reimburse reasonable shipping costs. See Section 7.', 'dawp'),
            __('We recommend using a trackable, insured shipping method for standard returns. US Watch Store is not responsible for return packages lost or damaged in transit back to us.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Refund Processing and Timing', 'dawp'),
        'copy'  => [
            __('Once your return is received, we inspect it within 3-5 business days to confirm it meets the eligibility requirements in Section 1.', 'dawp'),
            __('US Watch Store charges $0 restocking fees. There are no hidden fees or restocking penalties applied to eligible returns.', 'dawp'),
            __('Approved refunds are issued to the original payment method used at checkout. Because shipping is free on all orders, refunds reflect the full product price paid; no shipping charge is deducted because none was collected.', 'dawp'),
            __('After a refund is issued, it may take an additional 5-10 business days for the credit to appear on your statement, depending on your bank or card issuer.', 'dawp'),
            __('If a return does not meet the eligibility requirements, we will contact you with options, which may include returning the item to you at your cost or offering a partial refund reflecting any diminished value.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Exchanges', 'dawp'),
        'copy'  => [
            __('We do not offer direct product-for-product exchanges. If you would like a different watch, model, or size, return the original item under this policy and place a new order for the item you prefer.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. How to Start a Return', 'dawp'),
        'copy'  => [
            __('Email support@uswatchstore.com with your order number, the watch you would like to return, and the reason for the request. Wait for return instructions and authorization before sending anything back so the return can be matched to your order and processed without delay.', 'dawp'),
            $store_address
                ? sprintf(__('Authorized returns are shipped to our store facility: US Watch Store Returns, %s.', 'dawp'), $store_address)
                : __('Authorized returns are shipped to our return facility specified in your return authorization instructions.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Refund Method', 'dawp'),
        'copy'  => [
            __('All eligible refunds, whether from a standard return, a warranty claim resolved as a refund, or a damaged or incorrect item, are issued to the original payment method used at checkout. US Watch Store does not issue cash refunds or refunds to a different payment method or third party.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Damaged, Defective, or Incorrect Items', 'dawp'),
        'copy'  => [
            __('If your order arrives damaged, defective, or different from what you ordered, contact support@uswatchstore.com within 7 days of delivery with your order number and photos of the issue.', 'dawp'),
            __('We will arrange a free replacement, exchange, or full refund, including any return shipping cost, at no charge to you.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. 2-Year Warranty in Full', 'dawp'),
        'copy'  => [
            __('Every watch purchased from US Watch Store includes a 2-year limited warranty, starting from the delivery date, covering defects in materials and workmanship affecting the movement, battery, and factory assembly under normal use.', 'dawp'),
            __('The warranty does not cover: accidental damage such as drops, impacts, or crushing; water damage exceeding the watch\'s rated water resistance; damage from unauthorized repair, battery replacement, or case-opening by a third party; normal wear such as strap wear, crystal scratches, or case scuffing; and battery depletion occurring after the applicable normal battery life.', 'dawp'),
            __('To file a warranty claim, email support@uswatchstore.com with your order number, a description of the issue, and photos or video if applicable. We will review the claim, confirm coverage, and arrange a repair, replacement, or refund at our discretion. Turnaround time is typically 10-15 business days after we receive the watch, where a physical inspection is required.', 'dawp'),
        ],
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'refresh' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'check'   => '<path d="m20 6-11 11-5-5"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<div class="bg-background text-foreground">
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="return-refund-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
                        <span class="inline-flex items-center rounded-sm border border-border bg-background px-2.5 py-1 text-xs font-semibold uppercase tracking-[0.08em] text-muted">
                            <?php echo esc_html(sprintf(__('Last Updated: %s', 'dawp'), $last_updated)); ?>
                        </span>
                    </div>
                    <h1 id="return-refund-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl">
                        <?php esc_html_e('30-day returns, no questions asked.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                        <?php esc_html_e('You may request a return within 30 days of delivery. Eligibility depends on the watch being unworn, undamaged, and returned with its original box, tags, and papers.', 'dawp'); ?>
                    </p>
                </div>

                <article class="rounded-md border border-border bg-background p-5 shadow-card">
                    <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent-blush">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $render_icon('refresh'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                    </div>
                    <p class="mt-4 text-xs font-extrabold uppercase tracking-[0.12em] text-accent-blush"><?php esc_html_e('Return Window', 'dawp'); ?></p>
                    <h2 class="mt-2 font-heading text-xl font-extrabold text-foreground"><?php esc_html_e('30 days, no questions asked', 'dawp'); ?></h2>
                    <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php esc_html_e('Eligible watches must be unworn, undamaged, and in original condition.', 'dawp'); ?></p>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-background py-14 sm:py-20" aria-labelledby="returns-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Eligibility', 'dawp'); ?></p>
                <h2 id="returns-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('What qualifies for a return.', 'dawp'); ?>
                </h2>

                <div class="mt-7 rounded-md border border-border bg-surface p-6">
                    <h3 class="font-heading text-lg font-extrabold text-foreground"><?php esc_html_e('Return eligibility', 'dawp'); ?></h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-foreground-muted">
                        <?php foreach ($return_requirements as $requirement) : ?>
                            <li class="flex gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-accent-blush" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                                <span><?php echo esc_html($requirement); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="mt-7 rounded-md border border-border bg-surface p-6">
                    <h3 class="font-heading text-lg font-extrabold text-foreground"><?php esc_html_e('2-year warranty', 'dawp'); ?></h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-foreground-muted">
                        <?php foreach ($warranty_claim as $claim) : ?>
                            <li class="flex gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-accent-blush" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                                <span><?php echo esc_html($claim); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="rounded-md border border-border bg-surface p-6 shadow-card">
                <h3 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('How to request a return', 'dawp'); ?></h3>
                <div class="mt-6 grid gap-4">
                    <?php foreach ($return_process as $index => $process) : ?>
                        <div class="flex gap-4 border-b border-border pb-4 last:border-0 last:pb-0">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-sm bg-accent-soft text-sm font-extrabold text-accent-hover"><?php echo esc_html($index + 1); ?></span>
                            <p class="text-sm leading-6 text-foreground-muted"><?php echo esc_html($process); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-7 rounded-md bg-background p-5">
                    <h4 class="font-heading text-lg font-extrabold text-foreground"><?php esc_html_e('Refunds and return shipping', 'dawp'); ?></h4>
                    <p class="mt-3 text-sm leading-6 text-foreground-muted">
                        <?php esc_html_e('Refunds are issued to the original payment method after the returned item is received and inspected. Customers are responsible for return shipping costs unless the item arrived damaged, defective, or incorrect.', 'dawp'); ?>
                    </p>
                </div>

                <a href="<?php echo esc_url($shipping_url); ?>" class="mt-6 inline-flex min-h-12 w-full items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                    <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Long Document: continuous prose, inline section heads, no card boxes -->
    <section class="bg-surface py-16 sm:py-24" aria-labelledby="returns-detail-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.7fr_1.3fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-border bg-background p-6">
                    <h2 id="returns-detail-title" class="font-heading text-xl font-extrabold text-foreground"><?php esc_html_e('Full return, refund & warranty terms', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-foreground-muted">
                        <?php esc_html_e('Return shipping costs, refund timing, exchanges, damaged items, and the full 2-year warranty terms.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid gap-3">
                        <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-5 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Terms of Service', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="max-w-[65ch] divide-y divide-border">
                <?php foreach ($sections as $section) : ?>
                    <article class="py-7 first:pt-0">
                        <h2 class="font-heading text-xl font-extrabold text-foreground"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                            <?php foreach ($section['copy'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-background py-14 sm:py-20" aria-labelledby="returns-help-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-border bg-surface p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 id="returns-help-title" class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Need help with a return?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: 1: support email, 2: business hours */
                                    __('Email %1$s with your order number. Business hours: %2$s.', 'dawp'),
                                    '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                    esc_html($business_hours)
                                ),
                                [
                                    'a' => [
                                        'class' => [],
                                        'href'  => [],
                                    ],
                                ]
                            );
                            ?>
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Read FAQ', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
