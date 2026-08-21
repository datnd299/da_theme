<?php
/**
 * FAQ page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Conversational FAQ
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@uswatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$shipping_url = home_url('/shipping-policy/');
$privacy_url  = home_url('/privacy-policy/');
$terms_url    = home_url('/terms-of-service/');
$track_url    = home_url('/track-order/');
$contact_url  = home_url('/contact-us/');

$faq_groups = [
    [
        'label' => __('Watch Care & Specs', 'dawp'),
        'items' => [
            [
                'question' => __('How do I size or adjust my watch strap?', 'dawp'),
                'answer'   => __('Most straps arrive close to a standard fit. Metal bracelets can be adjusted by removing or adding links; leather and silicone straps have multiple buckle holes for a quick adjustment at home. For a bracelet resize beyond the included links, a local jeweler or watch shop can help in a few minutes.', 'dawp'),
            ],
            [
                'question' => __('What do the water resistance ratings mean?', 'dawp'),
                'answer'   => __('Water resistance ratings tell you what a watch can handle, not how deep you can dive. 30M/3ATM: splash and rain resistant only - not for swimming or showering. 50M/5ATM: safe for swimming and light water activity. 100M/10ATM and above: safe for swimming, snorkeling, and most water sports. Check the specific rating on your watch’s product page.', 'dawp'),
            ],
            [
                'question' => __('How do I replace the battery in a quartz or digital watch?', 'dawp'),
                'answer'   => __('Quartz and digital watches run on a replaceable battery that typically lasts 1-3 years depending on the movement and features. When it runs low, any local watch or jewelry shop can swap it in minutes. We recommend a professional replacement so the case is resealed properly and water resistance is preserved.', 'dawp'),
            ],
            [
                'question' => __('How do I care for and wind a mechanical or automatic watch?', 'dawp'),
                'answer'   => __('Automatic watches wind themselves through wrist movement and typically hold a power reserve of 38-70 hours depending on the model - check your watch’s product page for the exact figure. If it stops, wind the crown 20-30 turns to restart it, or wear it daily to keep it running. A variance of about -10/+20 seconds per day is normal for a mechanical movement and is not a defect.', 'dawp'),
            ],
            [
                'question' => __('Does my smartwatch work with my phone?', 'dawp'),
                'answer'   => __('Our smartwatches pair with both iOS and Android phones over Bluetooth. Download the companion app listed on the product page, enable Bluetooth, and follow the in-app pairing steps. Some advanced features, such as cellular calling, may vary by phone platform - check the product page for specifics.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Orders & Shipping', 'dawp'),
        'items' => [
            [
                'question' => __('How long does order processing take?', 'dawp'),
                'answer'   => __('Orders are processed within 1-3 business days before dispatch. Processing does not include weekends or holidays.', 'dawp'),
            ],
            [
                'question' => __('How long does standard US shipping take?', 'dawp'),
                'answer'   => __('After dispatch, standard US shipping typically takes 3-7 business days depending on destination and carrier conditions.', 'dawp'),
            ],
            [
                'question' => __('Is shipping free?', 'dawp'),
                'answer'   => __('Yes. All orders ship free within the US.', 'dawp'),
            ],
            [
                'question' => __('Will I receive tracking information?', 'dawp'),
                'answer'   => __('Yes. Tracking information is provided once your order ships. Tracking may take a short time to update after the carrier receives the package.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Warranty & Returns', 'dawp'),
        'items' => [
            [
                'question' => __('What does the 2-year warranty cover?', 'dawp'),
                'answer'   => __('Every watch includes a 2-year warranty covering manufacturing defects and movement issues - such as a malfunctioning movement, faulty crown, or defective components under normal use.', 'dawp'),
            ],
            [
                'question' => __('What is not covered by the warranty?', 'dawp'),
                'answer'   => __('The warranty does not cover accidental damage, cracked crystals from impact, or water damage from exceeding the watch’s water resistance rating. Normal battery replacement and strap wear are also not covered.', 'dawp'),
            ],
            [
                'question' => __('What is the return window?', 'dawp'),
                'answer'   => __('You may request a return within 30 days of delivery for eligible items, no questions asked.', 'dawp'),
            ],
            [
                'question' => __('What condition must a returned watch be in?', 'dawp'),
                'answer'   => __('Returned watches must be unused, undamaged, in original condition, and include the original box, papers, and accessories.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Quality & Support', 'dawp'),
        'items' => [
            [
                'question' => __('How is watch quality assured?', 'dawp'),
                'answer'   => __('Every watch we sell is inspected for quality and proper function before it ships. Each listing states the movement type, materials, and specs clearly, and relevant model information is included with your order.', 'dawp'),
            ],
            [
                'question' => __('Do you sell replica or counterfeit watches?', 'dawp'),
                'answer'   => __('No. US Watch Store does not sell counterfeit, replica, or unauthorized branded watches.', 'dawp'),
            ],
            [
                'question' => __('Is checkout secure?', 'dawp'),
                'answer'   => __('Payments are processed through third-party payment providers. US Watch Store does not store full payment card numbers on its own systems.', 'dawp'),
            ],
            [
                'question' => __('How do I contact support?', 'dawp'),
                'answer'   => sprintf(
                    /* translators: 1: email address, 2: business hours */
                    __('Email %1$s. Business hours are %2$s.', 'dawp'),
                    $support_email,
                    $business_hours
                ),
            ],
        ],
    ],
];

$quick_links = [
    [
        'title' => __('Track Order', 'dawp'),
        'copy'  => __('Use your order details to check shipment status.', 'dawp'),
        'url'   => $track_url,
    ],
    [
        'title' => __('Shipping & Returns', 'dawp'),
        'copy'  => __('Review processing, delivery estimates, return eligibility, and refunds.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('Privacy Policy', 'dawp'),
        'copy'  => __('Learn how customer information is collected, used, and protected.', 'dawp'),
        'url'   => $privacy_url,
    ],
    [
        'title' => __('Terms & Conditions', 'dawp'),
        'copy'  => __('Read the store terms for website use and purchases.', 'dawp'),
        'url'   => $terms_url,
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="faq-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('FAQ', 'dawp'); ?></p>
                <h1 id="faq-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl">
                    <?php esc_html_e('Quick answers for shopping with US Watch Store.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                    <?php esc_html_e('Find clear answers about sizing, water resistance, battery and movement care, warranty coverage, shipping, returns, and quality for our watch store.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-border bg-background p-6 shadow-card">
                <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Need direct help?', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-foreground-muted">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: 1: support email, 2: business hours */
                            __('Email %1$s with your order number or product question. Business hours: %2$s.', 'dawp'),
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
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-background py-14 sm:py-20" aria-labelledby="faq-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-border bg-background p-6 shadow-card">
                    <h2 id="faq-content-title" class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Helpful links', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-foreground-muted"><?php esc_html_e('Review the full policy pages for complete details before placing an order or requesting a return.', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($quick_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="rounded-md border border-border bg-background p-4 transition hover:border-accent hover:bg-surface-alt">
                                <span class="block font-heading text-base font-extrabold text-foreground"><?php echo esc_html($link['title']); ?></span>
                                <span class="mt-2 block text-sm leading-6 text-foreground-muted"><?php echo esc_html($link['copy']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>

            <div class="grid gap-8">
                <?php foreach ($faq_groups as $group) : ?>
                    <section class="rounded-md border border-border bg-background p-6 shadow-card" aria-labelledby="<?php echo esc_attr(sanitize_title($group['label'])); ?>">
                        <h2 id="<?php echo esc_attr(sanitize_title($group['label'])); ?>" class="font-heading text-2xl font-extrabold text-foreground"><?php echo esc_html($group['label']); ?></h2>
                        <div class="mt-6 divide-y divide-border">
                            <?php foreach ($group['items'] as $item) : ?>
                                <details class="group py-5 first:pt-0 last:pb-0">
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-foreground [&::-webkit-details-marker]:hidden">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-sm bg-accent-soft text-accent-hover transition group-open:rotate-45" aria-hidden="true">+</span>
                                    </summary>
                                    <p class="mt-3 max-w-[65ch] text-sm leading-7 text-foreground-muted"><?php echo esc_html($item['answer']); ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-border bg-background p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Precision watches for everyday wear, gifting, and collecting.', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted"><?php esc_html_e('Browse quartz, mechanical, smart, and digital watches with clear policy information available before checkout.', 'dawp'); ?></p>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Shop Watches', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
