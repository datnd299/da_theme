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
        'label' => __('About USWS', 'dawp'),
        'items' => [
            [
                'question' => __('What is USWS?', 'dawp'),
                'answer'   => __('USWS is the in-house watch line from US Watch Store. We design the watch, choose the movement, assemble it, regulate it, and inspect it before it ships. It is the only brand of watch sold on this site.', 'dawp'),
            ],
            [
                'question' => __('Where are USWS watches made?', 'dawp'),
                'answer'   => __('USWS watches are designed and assembled by our own team. Each watch is regulated on a timing machine and inspected before dispatch.', 'dawp'),
            ],
            [
                'question' => __('What is the difference between Classic Style and Elegant Style?', 'dawp'),
                'answer'   => __('Both run the same self-winding automatic movement. Classic Style is built for daily wear - legible dials, understated steel cases. Elegant Style is the dress version - slimmer profiles, polished finishing, and more refined detailing. It is a design choice, not a quality tier.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Automatic Movement & Care', 'dawp'),
        'items' => [
            [
                'question' => __('How does a self-winding automatic watch work?', 'dawp'),
                'answer'   => __('A rotor inside the watch spins as your wrist moves and winds the mainspring automatically. There is no battery. Wear the watch regularly and it stays running on its own.', 'dawp'),
            ],
            [
                'question' => __('What is the power reserve, and what happens if my watch stops?', 'dawp'),
                'answer'   => __('A fully wound USWS movement holds roughly 38-42 hours of power reserve when off the wrist - check your watch\'s product page for the exact figure. If it stops, wind the crown about 20-30 turns to restart it, reset the time, and put it back on your wrist.', 'dawp'),
            ],
            [
                'question' => __('How accurate is an automatic watch?', 'dawp'),
                'answer'   => __('A mechanical movement is not quartz-accurate. A daily variance of about -10 to +20 seconds per day is normal and within specification for a USWS automatic - it is not a defect. Accuracy also shifts slightly with how much you wear it and the positions it rests in overnight.', 'dawp'),
            ],
            [
                'question' => __('How do I size or adjust the strap or bracelet?', 'dawp'),
                'answer'   => __('Leather and rubber straps have multiple buckle holes for a quick adjustment at home. Steel bracelets are sized by removing or adding links; a local jeweler or watch shop can do this in a few minutes, or you can use a link-removal tool.', 'dawp'),
            ],
            [
                'question' => __('What do the water resistance ratings mean?', 'dawp'),
                'answer'   => __('Water resistance ratings describe conditions, not diving depth. 30M/3ATM: splash and rain only - not for swimming. 50M/5ATM: fine for hand-washing and light splashing. 100M/10ATM and above: suitable for swimming and snorkeling. Never operate the crown while the watch is wet, and check the rating on your watch\'s product page.', 'dawp'),
            ],
            [
                'question' => __('Does an automatic watch need servicing?', 'dawp'),
                'answer'   => __('Like any mechanical watch, a USWS automatic benefits from a movement service every few years to keep timekeeping and water resistance within spec. Have servicing done by a qualified watchmaker; unauthorized case-opening voids the warranty.', 'dawp'),
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
                'answer'   => __('Every USWS watch includes a 2-year warranty covering defects in the automatic movement and factory assembly under normal use - such as a movement that will not wind or hold time within spec, a faulty crown, or a defective component.', 'dawp'),
            ],
            [
                'question' => __('What is not covered by the warranty?', 'dawp'),
                'answer'   => __('The warranty does not cover accidental damage, cracked crystals from impact, water damage from exceeding the rated resistance, damage from unauthorized case-opening or service, normal wear such as strap wear and case scuffing, or the normal timekeeping variance of a mechanical movement.', 'dawp'),
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
                'question' => __('How is each watch checked before it ships?', 'dawp'),
                'answer'   => __('Every USWS watch is assembled by our team, regulated on a timing machine, and then inspected - rotor wind, crown action, water-resistance seals, and bracelet hardware - before it is packed. Case size, power reserve, water resistance, and materials are stated on each product page.', 'dawp'),
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
                    <?php esc_html_e('Quick answers about USWS automatic watches.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                    <?php esc_html_e('What USWS is, how a self-winding automatic works, strap sizing, water resistance, servicing, warranty, shipping, and returns.', 'dawp'); ?>
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
                        <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('One automatic movement, finished two ways.', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted"><?php esc_html_e('Browse USWS in Classic and Elegant styles, with clear policy information available before checkout.', 'dawp'); ?></p>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Shop Watches', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
