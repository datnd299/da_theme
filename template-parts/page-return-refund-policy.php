<?php
/**
 * Return & Refund Policy template part.
 *
 * @package dawp
 */

$store_name      = 'Elite Shop Express';
$support_email   = 'support@eliteshopexpress.com';
$support_address = '123 Market Street, New York, NY 10001';
$contact_url     = home_url('/contact-us/');

$eligibility_items = [
    __('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'),
    __('Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'),
    __('Packaging: Items must be returned with all original packaging, tags, labels, manuals, inserts, product boxes, protective packaging, and any included accessories.', 'dawp'),
    __('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'),
];

$shipping_fee_cards = [
    [
        'title' => __('Defective, Damaged, or Incorrect Products (wrong item, carrier damage, or defective):', 'dawp'),
        'copy'  => __('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'),
    ],
    [
        'title' => __('Customer Remorse (ordered wrong item, size, color, model, changed mind, or does not fit your needs):', 'dawp'),
        'copy'  => __('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label, sent via email, will be deducted from your final refund amount.', 'dawp'),
    ],
];

$delivery_issues = [
    [
        'title' => __('Damaged on Arrival', 'dawp'),
        'copy'  => __('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'),
    ],
    [
        'title' => __('Lost Packages / Never Arrived', 'dawp'),
        'copy'  => __('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'),
    ],
];

$return_steps = [
    [
        'number' => '1',
        'title'  => __('Submit Your Return Request', 'dawp'),
        'body'   => [
            __('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'),
        ],
    ],
    [
        'number' => '2',
        'title'  => __('Receive Approval & Pack Your Item', 'dawp'),
        'body'   => [
            __('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'),
            __('Repack the item securely in its original packaging with all included accessories, tags, manuals, inserts, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'),
        ],
    ],
    [
        'number' => '3',
        'title'  => __('Ship It Back to Our Returns Center', 'dawp'),
        'body'   => [
            __('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'),
        ],
    ],
];

$refund_items = [
    __('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'),
    __('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'),
    __('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'),
    __('Issues with Returns: If a return is approved but is found to be missing accessories, tags, manuals, inserts, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'),
    __('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'),
];

$non_returnable_items = [
    __('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'),
    __('Gift cards or digital products/downloads.', 'dawp'),
    __('Personalized, engraved, resized, or custom-made items.', 'dawp'),
    __('Beauty, personal care, grooming, intimate apparel, swimwear, or hygiene-sensitive items where the product seal has been broken.', 'dawp'),
    __('Items that have been worn, washed, altered, used, or damaged after delivery.', 'dawp'),
];

$contact_cards = [
    [
        'type'  => 'text',
        'title' => __('Store Name', 'dawp'),
        'copy'  => $store_name,
    ],
    [
        'type'  => 'text',
        'title' => __('Address', 'dawp'),
        'copy'  => $support_address,
    ],
    [
        'type'  => 'email',
        'title' => __('Email', 'dawp'),
        'copy'  => $support_email,
    ],
    [
        'type'  => 'contact',
        'title' => __('Contact Support', 'dawp'),
        'copy'  => __('Contact Us page', 'dawp'),
    ],
    [
        'type'  => 'text',
        'title' => __('Customer Service Hours', 'dawp'),
        'copy'  => __('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'),
    ],
    [
        'type'  => 'text',
        'title' => __('Response Time', 'dawp'),
        'copy'  => __('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'),
    ],
];
?>

<style>
  .ese-page { --ese-blue:#2563eb; --ese-cyan:#06b6d4; --ese-lime:#a3e635; --ese-ink:#101828; --ese-slate:#475467; --ese-border:#dbe3ef; background:#fff; color:var(--ese-slate); font-family:"Lato","Inter",system-ui,sans-serif; }
  .ese-page * { box-sizing:border-box; }
  .ese-page a { color:inherit; text-decoration:none; }
  .ese-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .ese-eyebrow { margin:0 0 12px; color:var(--ese-blue); font-size:12px; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
  .ese-title { margin:0; color:var(--ese-ink); font-family:"Lato","Inter",system-ui,sans-serif; font-size:clamp(36px,5vw,64px); font-weight:900; line-height:1.04; letter-spacing:0; text-transform:uppercase; }
  .ese-updated { margin:16px 0 0; color:var(--ese-ink); font-size:14px; font-weight:900; line-height:1.4; }
  .ese-copy { margin:18px 0 0; max-width:780px; color:var(--ese-slate); font-size:17px; line-height:1.75; }
  .ese-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--ese-ink); border-radius:999px; background:var(--ese-ink); color:#fff !important; padding:0 22px; font-size:14px; font-weight:900; transition:.2s ease; }
  .ese-button:hover { border-color:var(--ese-blue); background:var(--ese-blue); color:#fff !important; }
  .ese-button--secondary { background:#fff; color:var(--ese-ink) !important; }
  .ese-button--secondary:hover { border-color:var(--ese-blue); background:#eff6ff; color:var(--ese-blue) !important; }
  .ese-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .ese-hero { position:relative; overflow:hidden; background:linear-gradient(135deg,rgba(37,99,235,.14),rgba(6,182,212,.12) 48%,rgba(163,230,53,.16)),#f8fbff; }
  .ese-hero::before { content:""; position:absolute; inset:24px auto auto 8%; width:220px; height:220px; border-radius:999px; background:rgba(255,255,255,.56); filter:blur(8px); }
  .ese-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(37,99,235,.18); border-radius:999px; background:rgba(255,255,255,.28); }
  .ese-hero__grid { position:relative; z-index:1; display:grid; place-items:center; padding:82px 0 88px; text-align:center; }
  .ese-hero__content { max-width:880px; }
  .ese-hero .ese-copy { max-width:760px; margin-inline:auto; }
  .ese-hero .ese-actions { justify-content:center; }
  @media (max-width:680px) {
    .ese-hero__grid { padding:52px 0 56px; }
    .ese-actions { flex-direction:column; }
    .ese-button { width:100%; }
  }
</style>

<div class="bg-white font-body text-[#101828]">
    <section class="ese-page ese-return-refund-policy ese-hero">
        <div class="ese-wrap ese-hero__grid">
            <div class="ese-hero__content">
                <p class="ese-eyebrow"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
                <h1 class="ese-title"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h1>
                <p class="ese-updated"><?php esc_html_e('Last Updated: June 5, 2026', 'dawp'); ?></p>
                <p class="ese-copy"><?php esc_html_e('This policy explains return eligibility, return shipping fees, common delivery issues, refund timing, exchanges, and customer support details for Elite Shop Express orders.', 'dawp'); ?></p>
                <div class="ese-actions">
                    <a class="ese-button" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a class="ese-button ese-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F3F7FB] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <section id="return-eligibility" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Return Eligibility', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475467]">
                    <?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?>
                </p>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#475467]">
                    <?php foreach ($eligibility_items as $item) : ?>
                        <p class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span>
                            <span><?php echo esc_html($item); ?></span>
                        </p>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="return-shipping-fees" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Return Shipping Fees', 'dawp'); ?>
                </h2>
                <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
                    <?php foreach ($shipping_fee_cards as $card) : ?>
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-[#F8FAFC] p-5">
                            <h3 class="font-heading text-xl font-black leading-tight text-[#101828]">
                                <?php echo esc_html($card['title']); ?>
                            </h3>
                            <p class="mt-4 text-base leading-8 text-[#475467]">
                                <?php echo esc_html($card['copy']); ?>
                            </p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="common-delivery-issues" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Common Delivery Issues', 'dawp'); ?>
                </h2>
                <div class="mt-6 space-y-6">
                    <?php foreach ($delivery_issues as $issue) : ?>
                        <div>
                            <h3 class="font-heading text-xl font-black leading-tight text-[#101828]">
                                <?php echo esc_html($issue['title']); ?>
                            </h3>
                            <p class="mt-3 text-base leading-8 text-[#475467]">
                                <?php echo esc_html($issue['copy']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="how-to-return" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('How to Return an Item', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475467]">
                    <?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?>
                </p>

                <div class="mt-6 space-y-4">
                    <?php foreach ($return_steps as $step) : ?>
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-[#F8FAFC] p-5">
                            <div class="grid grid-cols-[auto_1fr] gap-3">
                                <div class="flex h-7 w-7 items-center justify-center rounded-full bg-[#101828] text-xs font-black text-white">
                                    <?php echo esc_html($step['number']); ?>
                                </div>
                                <div>
                                    <h3 class="font-heading text-xl font-black leading-tight text-[#101828]">
                                        <?php echo esc_html($step['title']); ?>
                                    </h3>
                                    <div class="mt-3 space-y-3 text-base leading-8 text-[#475467]">
                                        <?php foreach ($step['body'] as $paragraph) : ?>
                                            <p><?php echo esc_html($paragraph); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="mt-5 rounded-[1.25rem] border border-[#FACC15] bg-[#FFF7ED] p-5">
                    <p class="font-heading text-base font-black uppercase leading-tight text-[#101828]">
                        <?php echo esc_html($store_name); ?> <?php esc_html_e('- Returns Department', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-base leading-7 text-[#101828]">
                        <?php echo esc_html($support_address); ?>
                    </p>
                </div>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-11 items-center justify-center rounded-full bg-[#101828] px-5 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#2563EB]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-11 items-center justify-center rounded-full border border-[#2563EB] px-5 text-xs font-black tracking-wide text-[#101828] transition hover:bg-[#101828] hover:text-white">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </section>

            <section id="exchanges" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Exchanges', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475467]">
                    <?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, model, or product, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?>
                </p>
            </section>

            <section id="refund-process" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Refund Process & Timing', 'dawp'); ?>
                </h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#475467]">
                    <?php foreach ($refund_items as $item) : ?>
                        <p class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span>
                            <span><?php echo esc_html($item); ?></span>
                        </p>
                    <?php endforeach; ?>
                </div>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-7 inline-flex min-h-11 items-center justify-center rounded-full border border-[#2563EB] px-5 text-xs font-black uppercase tracking-wide text-[#101828] transition hover:bg-[#101828] hover:text-white">
                    <?php esc_html_e('Email Support', 'dawp'); ?>
                </a>
            </section>

            <section id="non-returnable-items" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Non-Returnable Items', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475467]">
                    <?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?>
                </p>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#475467]">
                    <?php foreach ($non_returnable_items as $item) : ?>
                        <p class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span>
                            <span><?php echo esc_html($item); ?></span>
                        </p>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="contact-information" class="rounded-[2rem] border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Contact Information', 'dawp'); ?>
                </h2>
                <div class="mt-6 rounded-[1.25rem] border border-[#E5E7EB] bg-[#F8FAFC] p-4">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <?php foreach ($contact_cards as $card) : ?>
                            <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                                <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]">
                                    <?php echo esc_html($card['title']); ?>
                                </h3>
                                <p class="mt-3 break-words text-base leading-7 text-[#475467]">
                                    <?php if ('email' === $card['type']) : ?>
                                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition hover:text-[#2563EB]"><?php echo esc_html($card['copy']); ?></a>
                                    <?php elseif ('contact' === $card['type']) : ?>
                                        <a href="<?php echo esc_url($contact_url); ?>" class="transition hover:text-[#2563EB]"><?php echo esc_html($card['copy']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($card['copy']); ?>
                                    <?php endif; ?>
                                </p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
