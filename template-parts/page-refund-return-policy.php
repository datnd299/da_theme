<?php
/**
 * Handed Shoes - Refund & Return Policy Page
 * Policy content adapted for formal footwear returns, refund timing, and support.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Handed Shoes';
$website_domain = 'handedshoes.com';
$support_email  = 'support@handedshoes.com';
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$contact_url    = home_url('/contact-us/');
$shop_url       = home_url('/shop/');
$shipping_url   = home_url('/shipping-policy/');
$return_address = $store_address;
$business_hours = 'Monday-Friday, 9:00 AM-5:00 PM PST.';
$response_time  = 'We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.';

$eligibility_items = [
    'Return Window: You must initiate your return request within 30 days of delivery.',
    'Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.',
    'Packaging: Items must be returned with all original packaging, tags, labels, certificates, care cards, pouches, boxes, and any included accessories.',
    'Restocking Fee: Free. We do not charge any restocking fees for eligible returns.',
];

$return_steps = [
    [
        'title' => 'Submit Your Return Request',
        'copy'  => 'Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.',
    ],
    [
        'title' => 'Receive Approval & Pack Your Item',
        'copy'  => 'Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.',
        'extra' => 'Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.',
    ],
    [
        'title' => 'Ship It Back To Our Returns Center',
        'copy'  => 'Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.',
    ],
];

$refund_items = [
    'Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.',
    'Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.',
    'Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.',
    'Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.',
    'Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.',
];

$non_returnable_items = [
    'Items explicitly marked as Final Sale or Non-Returnable on the product page.',
    'Gift cards or digital products/downloads.',
    'Personalized, engraved, resized, or custom-made items.',
    'Intimate apparel, swimwear, or hygiene-sensitive items such as earrings where the product seal has been broken.',
    'Items that have been worn, washed, altered, or damaged after delivery.',
];

$contact_details = [
    [
        'label' => 'Store Name',
        'value' => $store_name,
    ],
    [
        'label' => 'Address',
        'value' => $return_address,
    ],
    [
        'label' => 'Email',
        'value' => $support_email,
    ],
    [
        'label' => 'Contact Support',
        'value' => 'Contact Us page',
    ],
    [
        'label' => 'Customer Service Hours',
        'value' => $business_hours,
    ],
    [
        'label' => 'Response Time',
        'value' => $response_time,
    ],
];
?>

<main class="bg-[#F4F5F6] text-[#0B0B0D]">
  <section class="relative overflow-hidden bg-[#0B0B0D] text-white" aria-labelledby="return-policy-cover-title">
    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(11,11,13,0.98)_0%,rgba(26,26,29,0.9)_52%,rgba(11,11,13,0.96)_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#F4F5F6] to-transparent"></div>

    <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20 lg:px-10 lg:py-24">
      <div class="max-w-4xl">
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-white/60">Refund &amp; Return Policy</p>
        <h1 id="return-policy-cover-title" class="mt-5 max-w-3xl font-serif text-5xl font-semibold leading-[1.02] text-[#F4F5F6] sm:text-6xl lg:text-7xl">
          Shop Confidently With Clear Return Support
        </h1>
        <p class="mt-5 text-sm font-semibold text-white/60">Last updated: May 22, 2026</p>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
          Review return eligibility, footwear condition requirements, refund timing, and support steps before or after ordering formal shoes from <?php echo esc_html($store_name); ?>.
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
            Shop Handed Shoes
          </a>
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#0B0B0D]">
            Contact Support
          </a>
        </div>
      </div>

    </div>
  </section>

  <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-16 lg:px-10 lg:py-20">
    <section class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="return-eligibility-title">
      <h1 id="return-eligibility-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Return Eligibility
      </h1>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        To be eligible for a return, your item must meet the following criteria:
      </p>
      <ul class="mt-5 grid gap-3 text-base leading-7 text-[#5B5D63]">
        <?php foreach ($eligibility_items as $item) : ?>
          <li class="flex gap-3">
            <span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5B5D63]"></span>
            <span><?php echo esc_html($item); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="return-shipping-fees-title">
      <h2 id="return-shipping-fees-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Return Shipping Fees
      </h2>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn't fit):</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.
          </p>
        </article>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="delivery-issues-title">
      <h2 id="delivery-issues-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Common Delivery Issues
      </h2>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Damaged on Arrival</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Lost Packages / Never Arrived</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.
          </p>
        </article>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="return-item-title">
      <h2 id="return-item-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        How to Return an Item
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our returns center.
      </p>
      <div class="mt-6 grid gap-4">
        <?php foreach ($return_steps as $index => $step) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
            <div class="flex gap-4">
              <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0B0B0D] text-sm font-bold text-white"><?php echo esc_html((string) ($index + 1)); ?></span>
              <div>
                <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($step['title']); ?></h3>
                <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($step['copy']); ?></p>
                <?php if (!empty($step['extra'])) : ?>
                  <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($step['extra']); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <div class="mt-6 rounded-2xl border border-[#D9DADD] bg-white p-5 text-base leading-8 text-[#0B0B0D]">
        <strong><?php echo esc_html($store_name); ?> - Returns Department</strong><br>
        <?php echo esc_html($return_address); ?>
      </div>
      <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold text-white transition hover:bg-[#2F3033]">
          Contact Support
        </a>
        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
          <?php echo esc_html($support_email); ?>
        </a>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="exchanges-title">
      <h2 id="exchanges-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Exchanges
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="refund-process-title">
      <h2 id="refund-process-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Refund Process &amp; Timing
      </h2>
      <ul class="mt-5 grid gap-3 text-base leading-7 text-[#5B5D63]">
        <?php foreach ($refund_items as $item) : ?>
          <li class="flex gap-3">
            <span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5B5D63]"></span>
            <span><?php echo esc_html($item); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
        Email Support
      </a>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="non-returnable-title">
      <h2 id="non-returnable-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Non-Returnable Items
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        The following items are strictly non-returnable and final sale:
      </p>
      <ul class="mt-5 grid gap-3 text-base leading-7 text-[#5B5D63]">
        <?php foreach ($non_returnable_items as $item) : ?>
          <li class="flex gap-3">
            <span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5B5D63]"></span>
            <span><?php echo esc_html($item); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="contact-info-title">
      <h2 id="contact-info-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Contact Information
      </h2>
      <div class="mt-8 rounded-3xl border border-[#D9DADD] bg-white p-5 sm:p-6">
        <div class="grid gap-4 md:grid-cols-2">
          <?php foreach ($contact_details as $detail) : ?>
            <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5">
              <h3 class="text-sm font-bold text-[#0B0B0D]"><?php echo esc_html($detail['label']); ?></h3>
              <p class="mt-3 text-sm leading-7 text-[#5B5D63]"><?php echo esc_html($detail['value']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
</main>
