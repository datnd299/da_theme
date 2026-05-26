<?php
/**
 * Shipping Policy template part - Shopshive
 * Sections: Hero, Policy Content, Delivery Issues, Contact CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="Shipping policy hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/25 to-[#E8567A]/15"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Policy</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(36px,5.5vw,64px);font-weight:300">
      Shipping <em>Policy</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-2xl leading-relaxed">
      Clear handling times, delivery estimates, tracking updates, carrier details, and support information for Shopshive orders shipped within the United States.
    </p>

    <div class="mt-10 flex flex-wrap justify-center gap-4">
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">5:00 PM PST Cutoff</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">6-9 Business Day Estimate</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Email Tracking</span>
      </div>
    </div>
  </div>
</section>

<!-- ===== POLICY CONTENT ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Shipping policy content">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-10 lg:gap-14 items-start">
      <aside class="lg:sticky lg:top-28">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F5E6DC]">
          <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">On This Page</p>
          <nav class="space-y-3" aria-label="Shipping policy sections">
            <?php
              $toc = [
                ['href' => '#shipping-locations', 'label' => 'Shipping Locations'],
                ['href' => '#delivery-times', 'label' => 'Delivery Times'],
                ['href' => '#carrier-services', 'label' => 'Carrier Services'],
                ['href' => '#shipping-costs', 'label' => 'Shipping Costs'],
                ['href' => '#tracking-orders', 'label' => 'Tracking Your Order'],
                ['href' => '#delivery-issues', 'label' => 'Delivery Issues'],
                ['href' => '#shipping-contact', 'label' => 'Contact Information'],
              ];

              foreach ( $toc as $item ) :
            ?>
            <a href="<?php echo esc_url( $item['href'] ); ?>" class="block text-[13px] text-[#2B2B2B]/60 hover:text-[#E8567A] transition-colors"><?php echo esc_html( $item['label'] ); ?></a>
            <?php endforeach; ?>
          </nav>
        </div>
      </aside>

      <div class="space-y-6">
        <div id="shipping-locations" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Shipping Locations</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>Shopshive currently ships customer orders within the USA.</p>
            <p>Some items may have shipping restrictions due to size, weight, carrier limits, or local regulations. If we cannot ship an item to your address, you will see it at checkout or our support team will contact you using the order contact details you provided.</p>
          </div>
        </div>

        <div id="delivery-times" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Delivery Times</h2>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <?php
              $timelines = [
                ['label' => 'Order cutoff time', 'value' => '5:00 PM PST, Los Angeles'],
                ['label' => 'Order handling time', 'value' => '1-2 business days, Monday-Friday'],
                ['label' => 'Transit time', 'value' => '5-7 business days, Monday-Friday'],
                ['label' => 'Estimated delivery time', 'value' => 'Usually 6-9 business days'],
              ];

              foreach ( $timelines as $timeline ) :
            ?>
            <div class="bg-[#FDF8F4] border border-[#F5E6DC] rounded-xl p-5">
              <p class="text-[11px] uppercase tracking-[0.14em] text-[#E8567A] font-semibold mb-2"><?php echo esc_html( $timeline['label'] ); ?></p>
              <p class="text-[14px] text-[#2B2B2B] font-semibold leading-snug"><?php echo esc_html( $timeline['value'] ); ?></p>
            </div>
            <?php endforeach; ?>
          </div>

          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>Orders placed after the cutoff time begin processing the next business day. Delivery may take longer for bulky items, special handling, or items shipped directly from a brand or partner.</p>
            <p>If your order contains multiple items, they may ship separately and arrive in multiple packages.</p>
          </div>
        </div>

        <div id="carrier-services" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Carrier Services</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>We ship with trusted U.S. carriers, including USPS, UPS, and FedEx. The carrier used for your order depends on package size, weight, destination, and service availability.</p>
            <p>Oversized items may ship with specialized carriers or freight service when needed.</p>
          </div>
        </div>

        <div id="shipping-costs" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Shipping Costs</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>Most U.S. orders qualify for free shipping with no minimum, unless the product page or checkout states otherwise.</p>
            <p>If paid shipping applies because of an item type, oversized package, freight delivery, or remote area, the exact cost will be shown at checkout before payment is submitted.</p>
          </div>
        </div>

        <div id="tracking-orders" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Tracking Your Order</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>Once your order ships, we will send tracking information to the email address used at checkout. Tracking may take a short time to update after the carrier receives the package.</p>
            <p>You can also check your order status on our <a href="<?php echo esc_url( home_url( '/track-order/' ) ); ?>" class="text-[#E8567A] hover:underline">Track Order</a> page.</p>
          </div>
        </div>

        <div id="delivery-issues" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Delivery Issues</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>If tracking stops updating, an item arrives damaged, a package is missing, or the carrier marks an order as delivered but you did not receive it, contact us so we can help review the issue.</p>
            <p>To help us resolve it faster, include your order number, shipping address, and photos of any damaged package or product.</p>
          </div>
        </div>

        <div id="shipping-contact" class="bg-[#F5E6DC] rounded-2xl p-8 lg:p-10 border border-[#F2A8BC]/40">
          <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Contact Information</p>
          <h2 class="text-[#2B2B2B] font-semibold text-xl mb-4" style="font-family:'Playfair Display',serif">Questions About Shipping?</h2>
          <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed mb-6">
            Email our customer service team with your order number and shipping question. We aim to respond within 1 business day during business hours, Monday-Friday, 9:00 AM - 5:00 PM PST.
          </p>
          <a href="mailto:support@shopshive.com"
             class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#2B2B2B] transition-colors duration-300">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            support@shopshive.com
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
