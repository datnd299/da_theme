<?php
/**
 * Template Part: Contact Us
 */

$store_name      = 'Proudlywear';
$support_email   = 'support@proudlywear.com';
$store_address   = dawp_get_woocommerce_store_address();
$support_hours   = 'Monday-Friday, 10:00 AM-6:00 PM PST';
$track_order_url = home_url('/track-order/');
$shipping_url    = home_url('/shipping-policy/');
$returns_url     = home_url('/refund-return-policy/');
$faq_url         = home_url('/faq/');

$contact_cards = array(
    array(
        'label' => __('Email Support', 'dawp'),
        'title' => $support_email,
        'copy'  => __('Best for order questions, personalization details, return requests, and delivery issues.', 'dawp'),
        'url'   => 'mailto:' . $support_email,
    ),
    array(
        'label' => __('Support Hours', 'dawp'),
        'title' => $support_hours,
        'copy'  => __('We aim to reply within 24 business hours. Weekend and holiday replies may take longer.', 'dawp'),
        'url'   => '',
    ),
    array(
        'label' => __('Order Tracking', 'dawp'),
        'title' => __('Track Your Order', 'dawp'),
        'copy'  => __('Use your order details to check current shipment status before sending a support request.', 'dawp'),
        'url'   => $track_order_url,
    ),
);

$help_topics = array(
    array(__('Order Status', 'dawp'), __('Include your order number and checkout email so we can locate the purchase quickly.', 'dawp')),
    array(__('Custom Details', 'dawp'), __('Send the name, rank, service years, branch, or design detail exactly as it should appear.', 'dawp')),
    array(__('Returns & Refunds', 'dawp'), __('Tell us the item, reason for return, and include photos if the product arrived damaged or incorrect.', 'dawp')),
    array(__('Delivery Issues', 'dawp'), __('Share the tracking number, full shipping address, and what the carrier status currently shows.', 'dawp')),
);
?>

<main class="bg-[#FFFFFF] text-[#111827]">
  <section class="relative overflow-hidden bg-[#0B1F3A] text-white">
    <div class="absolute inset-0 bg-gradient-to-br from-[#0B1F3A] via-[#153866] to-[#B31942] opacity-95"></div>
    <div class="absolute inset-0 opacity-20">
      <div class="h-full w-full bg-[linear-gradient(120deg,transparent_0_35%,rgba(255,255,255,.18)_35%_42%,transparent_42%_100%)]"></div>
    </div>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 py-12 md:px-6 md:py-16 lg:grid-cols-2 lg:py-20">
      <div>
        <p class="inline-flex rounded-lg border border-[#C6A15B]/40 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">
          <?php esc_html_e('Customer Support', 'dawp'); ?>
        </p>
        <h1 class="mt-5 max-w-3xl text-4xl font-extrabold leading-none md:text-6xl lg:text-7xl">
          <?php esc_html_e('We are here to help.', 'dawp'); ?>
        </h1>
        <p class="mt-6 max-w-xl text-base leading-7 text-white/80 md:text-lg">
          <?php esc_html_e('Contact Proudlywear for order updates, custom gift details, shipping questions, returns, refunds, or product support.', 'dawp'); ?>
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]">
            <?php esc_html_e('Email Support', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url($track_order_url); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">
            <?php esc_html_e('Track Order', 'dawp'); ?>
          </a>
        </div>
      </div>

      <div class="rounded-lg border border-white/15 bg-white/10 p-5 shadow-2xl md:p-6">
        <div class="rounded-lg bg-white p-5 text-[#111827] md:p-6">
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Fastest Support', 'dawp'); ?></p>
          <h2 class="mt-3 text-2xl font-extrabold md:text-3xl"><?php esc_html_e('Send the right details once.', 'dawp'); ?></h2>
          <p class="mt-3 text-sm leading-6 text-[#6B7280]">
            <?php esc_html_e('For the quickest reply, include your order number, checkout email, product name, and photos when relevant.', 'dawp'); ?>
          </p>
          <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-4">
              <strong class="block text-sm"><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span class="mt-1 block text-sm text-[#6B7280]"><?php esc_html_e('Within 24 business hours', 'dawp'); ?></span>
            </div>
            <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-4">
              <strong class="block text-sm"><?php esc_html_e('Support Email', 'dawp'); ?></strong>
              <span class="mt-1 block text-sm text-[#6B7280]"><?php echo esc_html($support_email); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Contact Options', 'dawp'); ?></p>
          <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl"><?php esc_html_e('Choose the support path that fits.', 'dawp'); ?></h2>
        </div>
        <p class="max-w-xl text-sm leading-7 text-[#6B7280] md:text-base">
          <?php esc_html_e('Most questions can be handled by email or the form below. Tracking and policy links are available for quick self-service.', 'dawp'); ?>
        </p>
      </div>

      <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
        <?php foreach ($contact_cards as $card) : ?>
          <?php if ($card['url']) : ?>
            <a href="<?php echo esc_url($card['url']); ?>" class="group rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
              <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-[#0B1F3A] text-sm font-extrabold text-white">PW</span>
              <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.14em] text-[#B31942]"><?php echo esc_html($card['label']); ?></p>
              <h3 class="mt-2 text-xl font-extrabold text-[#111827]"><?php echo esc_html($card['title']); ?></h3>
              <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($card['copy']); ?></p>
            </a>
          <?php else : ?>
            <div class="group rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
              <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-[#0B1F3A] text-sm font-extrabold text-white">PW</span>
              <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.14em] text-[#B31942]"><?php echo esc_html($card['label']); ?></p>
              <h3 class="mt-2 text-xl font-extrabold text-[#111827]"><?php echo esc_html($card['title']); ?></h3>
              <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($card['copy']); ?></p>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 md:px-6 lg:grid-cols-12">
      <div class="lg:col-span-7">
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Send A Message', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl"><?php esc_html_e('Tell us what you need.', 'dawp'); ?></h2>
        <p class="mt-4 max-w-2xl text-sm leading-7 text-[#6B7280] md:text-base">
          <?php esc_html_e('Use this form for order questions, custom product help, return requests, damaged items, or general support.', 'dawp'); ?>
        </p>

        <form id="contact-form" class="mt-8 rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-5 shadow-sm md:p-8">
          <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <label class="block">
              <span class="mb-2 block text-sm font-extrabold text-[#111827]"><?php esc_html_e('Name', 'dawp'); ?></span>
              <input type="text" name="name" required autocomplete="name" class="min-h-[48px] w-full rounded-lg border border-[#E5E7EB] bg-white px-4 text-sm outline-none focus:border-[#C6A15B] focus:ring-2 focus:ring-[#C6A15B]">
            </label>

            <label class="block">
              <span class="mb-2 block text-sm font-extrabold text-[#111827]"><?php esc_html_e('Email', 'dawp'); ?></span>
              <input type="email" name="email" required autocomplete="email" class="min-h-[48px] w-full rounded-lg border border-[#E5E7EB] bg-white px-4 text-sm outline-none focus:border-[#C6A15B] focus:ring-2 focus:ring-[#C6A15B]">
            </label>
          </div>

          <label class="mt-4 block">
            <span class="mb-2 block text-sm font-extrabold text-[#111827]"><?php esc_html_e('Topic', 'dawp'); ?></span>
            <select name="subject" class="min-h-[48px] w-full rounded-lg border border-[#E5E7EB] bg-white px-4 text-sm outline-none focus:border-[#C6A15B] focus:ring-2 focus:ring-[#C6A15B]">
              <option value="general"><?php esc_html_e('General Inquiry', 'dawp'); ?></option>
              <option value="order"><?php esc_html_e('Order Status', 'dawp'); ?></option>
              <option value="styling"><?php esc_html_e('Product or Custom Gift Help', 'dawp'); ?></option>
              <option value="return"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></option>
            </select>
          </label>

          <label class="mt-4 block">
            <span class="mb-2 block text-sm font-extrabold text-[#111827]"><?php esc_html_e('Message', 'dawp'); ?></span>
            <textarea name="message" required rows="6" class="w-full rounded-lg border border-[#E5E7EB] bg-white px-4 py-3 text-sm leading-6 outline-none focus:border-[#C6A15B] focus:ring-2 focus:ring-[#C6A15B]"></textarea>
          </label>

          <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center">
            <button type="submit" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#0B1F3A]">
              <?php esc_html_e('Send Message', 'dawp'); ?>
            </button>
            <p id="contact-msg" class="hidden text-sm font-bold" aria-live="polite"></p>
          </div>
        </form>
      </div>

      <aside class="lg:col-span-5">
        <div class="sticky top-0 rounded-lg bg-[#0B1F3A] p-6 text-white md:p-8">
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]"><?php esc_html_e('Before You Send', 'dawp'); ?></p>
          <h2 class="mt-3 text-2xl font-extrabold md:text-3xl"><?php esc_html_e('Helpful details speed things up.', 'dawp'); ?></h2>
          <div class="mt-6 space-y-4">
            <?php foreach ($help_topics as $topic) : ?>
              <div class="rounded-lg border border-white/15 bg-white/10 p-4">
                <h3 class="text-base font-extrabold"><?php echo esc_html($topic[0]); ?></h3>
                <p class="mt-2 text-sm leading-6 text-white/75"><?php echo esc_html($topic[1]); ?></p>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="mt-6 rounded-lg border border-white/15 bg-white/10 p-4">
            <h3 class="text-base font-extrabold"><?php echo esc_html($store_name); ?></h3>
            <p class="mt-2 text-sm leading-6 text-white/75"><a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition hover:text-white"><?php echo esc_html($support_email); ?></a></p>
            <p class="mt-1 text-sm leading-6 text-white/75"><?php echo esc_html($support_hours); ?></p>
            <?php if ('' !== $store_address) : ?>
              <p class="mt-1 text-sm leading-6 text-white/75"><?php echo esc_html($store_address); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </aside>
    </div>
  </section>

  <section class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
        <a href="<?php echo esc_url($shipping_url); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <h3 class="text-xl font-extrabold text-[#111827]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
          <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Review processing time, delivery estimates, carriers, and tracking details.', 'dawp'); ?></p>
        </a>
        <a href="<?php echo esc_url($returns_url); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <h3 class="text-xl font-extrabold text-[#111827]"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></h3>
          <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Learn how return requests, refund timing, and eligible items are handled.', 'dawp'); ?></p>
        </a>
        <a href="<?php echo esc_url($faq_url); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <h3 class="text-xl font-extrabold text-[#111827]"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
          <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Find quick answers to common questions before contacting support.', 'dawp'); ?></p>
        </a>
      </div>
    </div>
  </section>
</main>
