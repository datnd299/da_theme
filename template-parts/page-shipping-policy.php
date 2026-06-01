<?php
/**
 * Handed Shoes - Shipping Policy Page
 * Policy content adapted for formal footwear orders, delivery tracking, and support.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name      = 'Handed Shoes';
$website_domain  = 'handedshoes.com';
$support_email   = 'support@handedshoes.com';
$store_address   = dawp_get_store_address();
$contact_url     = home_url('/contact-us/');
$track_url       = home_url('/track-order/');
$order_cutoff    = '5:00 PM (GMT-08:00) Pacific Standard Time';
$handling_time   = '1-3 business days';
$transit_time    = '5-7 business days, Monday to Friday';
$estimated_time  = '6-10 business days total from the date of purchase';
$response_time   = 'Within 24 business hours.';

$timeline_cards = [
    [
        'label' => 'Order Cutoff Time',
        'copy'  => $order_cutoff . '.',
    ],
    [
        'label' => 'Order Handling Time',
        'copy'  => $handling_time . '. Orders placed after cutoff begin processing the following business day.',
    ],
    [
        'label' => 'Transit Time',
        'copy'  => $transit_time . '.',
    ],
    [
        'label' => 'Estimated Delivery Time',
        'copy'  => $estimated_time . '.',
    ],
];

$issue_details = [
    'Your exact Order Number, such as #HS1001.',
    'The specific Email Address utilized during checkout.',
    'The full and complete Delivery Address.',
    'Clear, well-lit photos if the package container or footwear item arrived damaged.',
];

$contact_details = [
    [
        'label' => 'Store Name',
        'value' => $store_name,
    ],
    [
        'label' => 'Customer Support Email',
        'value' => $support_email,
    ],
    [
        'label' => 'Address',
        'value' => $store_address,
    ],
    [
        'label' => 'Website',
        'value' => $website_domain,
    ],
    [
        'label' => 'Response Time',
        'value' => $response_time,
    ],
];
?>

<main class="bg-[#F4F5F6] py-14 text-[#0B0B0D] sm:py-16 lg:py-20">
  <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
    <section class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-locations-title">
      <h1 id="shipping-locations-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Shipping Locations &amp; Market
      </h1>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We currently ship exclusively within the United States. <?php echo esc_html($store_name); ?> serves customers shopping from the United States domestic market.
      </p>
      <p class="mt-4 text-base leading-8 text-[#5B5D63]">
        If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.
      </p>
      <div class="mt-5 border-l-4 border-[#D2A64A] bg-[#FFF8E8] px-5 py-5 text-base leading-8 text-[#5B5D63] sm:px-6">
        Some footwear orders may ship separately if items are prepared from different fulfillment batches or require distinct packing methods to protect shoe shape, finish, and original packaging during transit.
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-costs-title">
      <h2 id="shipping-costs-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Shipping Fees &amp; Costs
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Standard U.S. Shipping</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Optional Upgraded Shipping</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.
          </p>
        </article>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="delivery-times-title">
      <h2 id="delivery-times-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Order Processing &amp; Delivery Times
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <?php foreach ($timeline_cards as $card) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-white p-5">
            <h3 class="text-sm font-bold text-[#0B0B0D]"><?php echo esc_html($card['label']); ?></h3>
            <p class="mt-3 text-sm leading-7 text-[#5B5D63]"><?php echo esc_html($card['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
      <p class="mt-6 text-base leading-8 text-[#5B5D63]">
        Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="multi-item-title">
      <h2 id="multi-item-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Multi-Item Orders &amp; Specialized Handling
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        If your purchase includes multiple pairs of shoes or different footwear styles, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.
      </p>
      <p class="mt-4 text-base leading-8 text-[#5B5D63]">
        You will receive unique tracking numbers for each package. Certain formal footwear, premium finishes, or high-demand styles may require extra preparation time due to address reviews, holiday volume spikes, or protective packing protocols.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="carrier-title">
      <h2 id="carrier-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Carrier Services &amp; Delivery Tracking
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        To guarantee safe and efficient delivery, <?php echo esc_html($store_name); ?> partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.
      </p>
      <div class="mt-6 flex flex-wrap gap-3">
        <span class="rounded-full border border-[#D9DADD] bg-white px-6 py-3 text-sm font-bold text-[#0B0B0D]">USPS</span>
        <span class="rounded-full border border-[#D9DADD] bg-white px-6 py-3 text-sm font-bold text-[#0B0B0D]">UPS</span>
        <span class="rounded-full border border-[#D9DADD] bg-white px-6 py-3 text-sm font-bold text-[#0B0B0D]">FedEx</span>
        <span class="rounded-full border border-[#D9DADD] bg-white px-6 py-3 text-sm font-bold text-[#0B0B0D]">DHL</span>
      </div>
      <p class="mt-6 text-base leading-8 text-[#5B5D63]">
        The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.
      </p>
      <a href="<?php echo esc_url($track_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
        Track Order
      </a>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="delivery-issues-title">
      <h2 id="delivery-issues-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Resolving Delivery Issues &amp; Damaged Shipments
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.
      </p>
      <p class="mt-4 text-base leading-8 text-[#5B5D63]">
        To help us investigate and resolve the issue with the carrier swiftly, please provide:
      </p>
      <ul class="mt-5 grid gap-3 text-base leading-7 text-[#5B5D63]">
        <?php foreach ($issue_details as $detail) : ?>
          <li class="flex gap-3">
            <span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5B5D63]"></span>
            <span><?php echo esc_html($detail); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold text-white transition hover:bg-[#2F3033]">
          Contact Support
        </a>
        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
          <?php echo esc_html($support_email); ?>
        </a>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="support-contact-title">
      <h2 id="support-contact-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Customer Support Contact Information
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.
      </p>
      <div class="mt-8 rounded-3xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
        <div class="grid gap-4 md:grid-cols-2">
          <?php foreach ($contact_details as $detail) : ?>
            <article class="rounded-2xl border border-[#D9DADD] bg-white p-5">
              <h3 class="text-sm font-bold text-[#0B0B0D]"><?php echo esc_html($detail['label']); ?></h3>
              <p class="mt-3 text-sm leading-7 text-[#5B5D63]"><?php echo esc_html($detail['value']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
</main>
