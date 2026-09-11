<?php
/**
 * 2-Year Warranty Policy page for Reluxwatches.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Reluxwatches';
$support_email  = 'support@reluxwatches.com';
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM Pacific Time', 'dawp');
$contact_url    = home_url('/contact-us/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$last_updated   = __('September 11, 2026', 'dawp');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$warranty_coverage = [
    __('Duration: 24 months (2 years) from the date of delivery, at no additional cost.', 'dawp'),
    __('Collections Covered: All Reluxwatches watches, across The Voyager, The Odyssey, and The Eternal collections.', 'dawp'),
    __('What Is Covered: Manufacturing defects in the automatic movement, case, crystal, crown, dial, and hands.', 'dawp'),
    __('No Registration Required: Your order confirmation email or receipt serves as proof of purchase. There is nothing to activate.', 'dawp'),
    __('Eligibility: Valid for the original purchaser on orders placed directly through Reluxwatches.com.', 'dawp'),
];

$warranty_exclusions = [
    __('Normal wear and tear, including strap or band wear, minor scratches, and surface discoloration.', 'dawp'),
    __('Water damage caused by exceeding the watch\'s rated water resistance, or exposure to hot showers, saunas, or steam.', 'dawp'),
    __('Accidental damage, including drops, impacts, or crushing.', 'dawp'),
    __('Repairs, servicing, or modifications performed by anyone other than an authorized Reluxwatches service center.', 'dawp'),
    __('Loss or theft of the watch.', 'dawp'),
    __('Damage resulting from improper storage or failure to follow the included care instructions.', 'dawp'),
    __('Batteries: Not applicable. Every Reluxwatches watch is a self-winding automatic movement with no battery to replace.', 'dawp'),
];

$warranty_steps = [
    [
        'title' => __('Contact Support', 'dawp'),
        'copy'  => __('Email us or use our Contact Page within 24 months of delivery. Please include your order number, the email used at checkout, a description of the issue, and photos or videos of the defect.', 'dawp'),
    ],
    [
        'title' => __('Receive Approval & Instructions', 'dawp'),
        'copy'  => [
            __('Our support team reviews warranty requests within 1-2 business days. Once approved, we will email you a Warranty Claim Number (WCN) and service instructions. If the defect is confirmed as covered, we provide a prepaid shipping label.', 'dawp'),
            __('Pack the watch securely in protective packaging and write the WCN clearly on the outside of the box.', 'dawp'),
        ],
    ],
    [
        'title' => __('Ship to Our Service Center', 'dawp'),
        'copy'  => __('Attach the prepaid label we provide and drop the package at the carrier location. We recommend using a trackable shipping service so your watch can be monitored in transit.', 'dawp'),
    ],
];

$warranty_resolution = [
    __('Inspection: Once your watch is received, our service center inspects it within 3-5 business days to confirm the defect is covered under warranty.', 'dawp'),
    __('Repair or Replacement: If approved, we repair the movement or affected component, or replace the watch, at no cost to you.', 'dawp'),
    __('Discontinued Models: If your exact model is no longer available, we will offer a comparable model from the same collection or store credit of equal value.', 'dawp'),
    __('Turnaround Time: Total resolution time is typically 10-20 business days from the date we receive your watch, depending on parts availability.', 'dawp'),
    __('Return Shipping: We cover the cost of shipping your repaired or replacement watch back to you.', 'dawp'),
];

$warranty_scope = [
    __('This warranty applies only to watches purchased directly through Reluxwatches.com.', 'dawp'),
    __('Coverage is tied to the original purchaser and is not transferable, except when the watch was given as a verified gift with valid proof of purchase.', 'dawp'),
    __('This warranty is in addition to, and does not affect, any other consumer rights available to you under applicable law.', 'dawp'),
    __('Service is provided within the United States.', 'dawp'),
];

$contact_cards = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Email', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Contact Support', 'dawp'),
        'value' => __('Contact Us page', 'dawp'),
        'url'   => $contact_url,
    ],
    [
        'label' => __('Customer Service Hours', 'dawp'),
        'value' => $business_hours,
    ],
];

if ($store_address) {
    array_splice($contact_cards, 1, 0, [[
        'label' => __('Address', 'dawp'),
        'value' => $store_address,
    ]]);
}

$warranty_faqs = [
    [
        'question' => __('How long is the Reluxwatches warranty?', 'dawp'),
        'answer'   => __('Every Reluxwatches watch is covered by a 2-year (24-month) limited warranty against manufacturing defects, starting from the date of delivery.', 'dawp'),
    ],
    [
        'question' => __('Do I need to register my watch to activate the warranty?', 'dawp'),
        'answer'   => __('No. There is no registration step. Your order confirmation email or receipt is sufficient proof of purchase when you file a claim.', 'dawp'),
    ],
    [
        'question' => __('Does the warranty cover water damage?', 'dawp'),
        'answer'   => __('The warranty covers manufacturing defects only. Water damage caused by exceeding your watch\'s rated water resistance, or exposure to hot showers or saunas, is not covered.', 'dawp'),
    ],
    [
        'question' => __('Who pays for shipping on a warranty claim?', 'dawp'),
        'answer'   => __('Once a defect is confirmed as covered, Reluxwatches provides a prepaid label to send the watch to our service center and covers the cost of shipping it back to you.', 'dawp'),
    ],
    [
        'question' => __('What happens if my watch needs a battery?', 'dawp'),
        'answer'   => __('Reluxwatches watches are 100% automatic and self-winding, so there is no battery to replace or maintain.', 'dawp'),
    ],
];

if (function_exists('dawp_register_faq_schema')) {
    dawp_register_faq_schema($warranty_faqs);
}
?>

<div class="bg-white text-[#111111]">
    <section class="bg-[#FAFAFA] py-14 sm:py-20" aria-labelledby="warranty-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#405447]"><?php esc_html_e('2-Year Warranty Policy', 'dawp'); ?></p>
                <h1 id="warranty-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111111] sm:text-5xl">
                    <?php esc_html_e('Every Reluxwatches watch is covered for 2 years.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#777777]">
                    <?php esc_html_e('All Reluxwatches automatic watches, across The Voyager, The Odyssey, and The Eternal collections, are backed by a 2-year limited warranty against manufacturing defects.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#405447]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#111111]"><?php echo esc_html($last_updated); ?></p>
                <p class="mt-4 text-sm leading-7 text-[#777777]">
                    <?php esc_html_e('Need to start a warranty claim or ask about coverage? Contact our support team through the official channels below.', 'dawp'); ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#405447] px-6 text-sm font-bold text-white transition hover:bg-[#2F3F35]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#405447] bg-white px-6 text-sm font-bold text-[#405447] transition hover:bg-[#FAFAFA]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:px-8">
            <article class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#111111] sm:text-4xl"><?php esc_html_e('Warranty Coverage', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#777777]"><?php esc_html_e('Every Reluxwatches watch includes the following coverage:', 'dawp'); ?></p>
                <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#777777]">
                    <?php foreach ($warranty_coverage as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="rounded-md border border-[#E9E9E9] bg-[#FAFAFA] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#111111] sm:text-4xl"><?php esc_html_e('What This Warranty Does Not Cover', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#777777]"><?php esc_html_e('This warranty covers manufacturing defects only. It does not cover:', 'dawp'); ?></p>
                <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#777777]">
                    <?php foreach ($warranty_exclusions as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#111111] sm:text-4xl"><?php esc_html_e('How to File a Warranty Claim', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#777777]"><?php esc_html_e('Please follow our official 3-step process. Do not ship a watch back without prior authorization, as unauthorized shipments cannot be tracked or processed at our service center.', 'dawp'); ?></p>

                <div class="mt-6 grid gap-4">
                    <?php foreach ($warranty_steps as $index => $step) : ?>
                        <section class="rounded-md border border-[#E9E9E9] bg-[#FAFAFA] p-5">
                            <div class="flex items-start gap-4">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#405447] text-sm font-extrabold text-white"><?php echo esc_html((string) ($index + 1)); ?></span>
                                <div>
                                    <h3 class="font-heading text-lg font-extrabold text-[#111111]"><?php echo esc_html($step['title']); ?></h3>
                                    <div class="mt-4 space-y-4 text-sm leading-7 text-[#777777]">
                                        <?php foreach ((array) $step['copy'] as $paragraph) : ?>
                                            <p><?php echo esc_html($paragraph); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endforeach; ?>
                </div>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#405447] px-6 text-sm font-bold text-white transition hover:bg-[#2F3F35]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#405447] bg-white px-6 text-sm font-bold text-[#405447] transition hover:bg-[#FAFAFA]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </article>

            <article class="rounded-md border border-[#E9E9E9] bg-[#FAFAFA] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#111111] sm:text-4xl"><?php esc_html_e('Resolution & Turnaround', 'dawp'); ?></h2>
                <ul class="mt-6 grid gap-3 text-sm leading-7 text-[#777777]">
                    <?php foreach ($warranty_resolution as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#111111] sm:text-4xl"><?php esc_html_e('Scope & Limitations', 'dawp'); ?></h2>
                <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#777777]">
                    <?php foreach ($warranty_scope as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-md border border-[#405447] bg-white px-6 text-sm font-bold text-[#405447] transition hover:bg-[#FAFAFA]">
                    <?php esc_html_e('Shop Watches', 'dawp'); ?>
                </a>
            </article>

            <article class="rounded-md border border-[#E9E9E9] bg-[#FAFAFA] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#111111] sm:text-4xl"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                <div class="mt-6 rounded-md border border-[#E9E9E9] bg-white p-4 sm:p-5">
                    <dl class="grid gap-4 lg:grid-cols-2">
                        <?php foreach ($contact_cards as $card) : ?>
                            <div class="rounded-md border border-[#E9E9E9] bg-[#FFFFFF] p-4">
                                <dt class="text-sm font-extrabold text-[#111111]"><?php echo esc_html($card['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#777777]">
                                    <?php if (!empty($card['url'])) : ?>
                                        <a class="font-bold text-[#405447] underline decoration-[#405447]/40 underline-offset-4 transition hover:text-[#2F3F35]" href="<?php echo esc_url($card['url']); ?>"><?php echo esc_html($card['value']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($card['value']); ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </div>
            </article>

            <article class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#111111] sm:text-4xl"><?php esc_html_e('Warranty FAQs', 'dawp'); ?></h2>
                <div class="mt-6 divide-y divide-[#E9E9E9]">
                    <?php foreach ($warranty_faqs as $item) : ?>
                        <details class="group py-5 first:pt-0 last:pb-0">
                            <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#111111]">
                                <span><?php echo esc_html($item['question']); ?></span>
                                <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#FAFAFA] text-[#405447] transition group-open:rotate-45" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-3 text-sm leading-7 text-[#777777]"><?php echo esc_html($item['answer']); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </article>
        </div>
    </section>
</div>
