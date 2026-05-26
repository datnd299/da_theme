<?php
/**
 * Shipping & Returns template part - Shopshive
 * Sections: Hero, Shipping Policy, Returns & Exchanges, Process Steps, FAQ, Contact CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="Shipping and returns hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/25 to-[#E8567A]/15"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Policies</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(36px,5.5vw,64px);font-weight:300">
      Shipping &amp; <em>Returns</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-2xl leading-relaxed">
      Clear timelines, simple mail returns, and support when you need it. Here is how shipping, exchanges, and refunds work at Shopshive.
    </p>

    <div class="mt-10 flex flex-wrap justify-center gap-4">
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">0-1 Business Day Delivery</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">30-Day Returns &amp; Exchanges</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16v16H4z"/><path d="M4 8h16"/><path d="M8 4v16"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Returns By Mail</span>
      </div>
    </div>
  </div>
</section>

<!-- ===== SHIPPING POLICY ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Shipping policy">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-14">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Getting It To You</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        Shipping Policy
      </h2>
      <p class="mt-4 text-[14px] text-[#2B2B2B]/60 max-w-xl mx-auto leading-relaxed">
        Delivery estimates are based on order cutoff, handling time, and carrier transit time for all destinations.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
        $shipping_items = [
          [
            'title' => 'Order Cutoff',
            'copy'  => 'Orders placed before 2:00 PM Pacific Standard Time (Los Angeles) are handled using the same business-day cutoff.',
            'icon'  => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
          ],
          [
            'title' => 'Handling Time',
            'copy'  => 'Orders are prepared for shipment within 0-1 business days. Handling is fulfilled Monday through Saturday.',
            'icon'  => '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/>',
          ],
          [
            'title' => 'Transit Time',
            'copy'  => 'Carrier transit time is currently estimated at 0 business days for all destinations, with shipments moving Monday through Saturday.',
            'icon'  => '<rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>',
          ],
          [
            'title' => 'Total Delivery Time',
            'copy'  => 'Estimated delivery time for all customer locations is 0-1 business days after the order is placed.',
            'icon'  => '<path d="M20 6 9 17l-5-5"/>',
          ],
          [
            'title' => 'Order Tracking',
            'copy'  => 'Once your order ships, you will receive tracking details by email. You can also check your status on our Track Order page.',
            'icon'  => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',
          ],
          [
            'title' => 'Shipping Area',
            'copy'  => 'We currently ship to customer addresses within the United States. Delivery estimates may be adjusted during holidays or carrier exceptions.',
            'icon'  => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
          ],
        ];

        foreach ( $shipping_items as $item ) :
      ?>
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo wp_kses( $item['icon'], [ 'circle' => [ 'cx' => true, 'cy' => true, 'r' => true ], 'polyline' => [ 'points' => true ], 'path' => [ 'd' => true ], 'rect' => [ 'x' => true, 'y' => true, 'width' => true, 'height' => true ], 'polygon' => [ 'points' => true ], 'line' => [ 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ] ] ); ?></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif"><?php echo esc_html( $item['title'] ); ?></h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed"><?php echo esc_html( $item['copy'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="mt-10 bg-[#F5E6DC] border border-[#F2A8BC]/40 rounded-2xl p-6 lg:p-8">
      <h3 class="text-[#2B2B2B] font-semibold text-lg mb-2" style="font-family:'Playfair Display',serif">Estimated delivery summary</h3>
      <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
        For all destinations, the current estimated delivery time is <strong class="text-[#2B2B2B]">0-1 business days</strong>. If an order is placed after the cutoff time, or during a public holiday, the estimate may move to the next eligible business day.
      </p>
    </div>
  </div>
</section>

<!-- ===== RETURNS & EXCHANGES ===== -->
<section class="bg-[#F5E6DC] py-20 lg:py-28" aria-label="Returns and exchanges policy">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
      <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Hassle-Free</p>
        <h2 class="mb-6 text-[#2B2B2B] leading-tight"
            style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
          Returns &amp; Exchanges
        </h2>
        <p class="text-[14px] lg:text-[15px] text-[#2B2B2B]/70 leading-relaxed mb-8">
          We accept returns for both defective and non-defective products, and we accept exchanges on eligible items. Products must be new and returned within 30 days.
        </p>

        <ul class="space-y-5">
          <?php
            $return_points = [
              [ 'title' => 'Returns Accepted', 'copy' => 'We accept returns for defective and non-defective products.' ],
              [ 'title' => 'Exchanges Accepted', 'copy' => 'Eligible products can be exchanged when you need a different size, color, or replacement.' ],
              [ 'title' => 'Product Condition', 'copy' => 'Returned products must be new, unused, and in their original condition with packaging and tags intact.' ],
              [ 'title' => '30-Day Return Window', 'copy' => 'You have 30 days from delivery to request a return or exchange.' ],
            ];

            foreach ( $return_points as $point ) :
          ?>
          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#E8567A]/15 flex items-center justify-center mt-0.5">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] text-[15px] mb-1"><?php echo esc_html( $point['title'] ); ?></h4>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed"><?php echo esc_html( $point['copy'] ); ?></p>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="space-y-6">
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-white">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16v16H4z"/><path d="M4 8h16"/><path d="M8 4v16"/></svg>
            </div>
            <h3 class="font-semibold text-[#2B2B2B] text-lg" style="font-family:'Playfair Display',serif">Return Method &amp; Label</h3>
          </div>
          <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed mb-4">
            Returns are accepted <strong class="text-[#2B2B2B]">by mail</strong>. Return labels are provided as download-and-print labels, and return label cost is the customer's responsibility unless our support team confirms otherwise.
          </p>
          <ul class="space-y-2">
            <li class="flex items-center gap-3 text-[13px] text-[#2B2B2B]/60"><span class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#D4B8A0]"></span>Currency: USD</li>
            <li class="flex items-center gap-3 text-[13px] text-[#2B2B2B]/60"><span class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#D4B8A0]"></span>Return label: Download and print</li>
            <li class="flex items-center gap-3 text-[13px] text-[#2B2B2B]/60"><span class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#D4B8A0]"></span>Return label cost: Customer responsibility</li>
          </ul>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-sm border border-white">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <h3 class="font-semibold text-[#2B2B2B] text-lg" style="font-family:'Playfair Display',serif">Fees &amp; Refunds</h3>
          </div>
          <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed mb-4">
            There is <strong class="text-[#2B2B2B]">no restocking fee</strong>. Refunds are processed within <strong class="text-[#2B2B2B]">10 days</strong> after the returned item is received and inspected.
          </p>
          <a href="mailto:support@shopshive.com"
             class="inline-flex items-center gap-2 text-[#E8567A] text-[13px] font-semibold hover:underline">
            Email support@shopshive.com
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== HOW TO RETURN - STEPS ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="How to return an order">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-14">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Simple Process</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        How To Start A Return
      </h2>
      <p class="mt-4 text-[14px] text-[#2B2B2B]/60 max-w-xl mx-auto leading-relaxed">
        Use the mail return process below within 30 days of delivery.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
      <div class="hidden md:block absolute top-[52px] left-[calc(16.67%+16px)] right-[calc(16.67%+16px)] h-px bg-[#F2A8BC]/50 z-0"></div>

      <?php
        $steps = [
          [
            'label' => 'Step 01',
            'title' => 'Contact Us',
            'copy'  => 'Email support@shopshive.com with your order number and reason for return or exchange.',
            'icon'  => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>',
          ],
          [
            'label' => 'Step 02',
            'title' => 'Download & Print',
            'copy'  => 'Use the return instructions and download-and-print label provided by our support team.',
            'icon'  => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>',
          ],
          [
            'label' => 'Step 03',
            'title' => 'Ship & Refund',
            'copy'  => 'Mail the new, unused item back to us. Refunds are processed within 10 days after inspection.',
            'icon'  => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
          ],
        ];

        foreach ( $steps as $step ) :
      ?>
      <div class="relative z-10 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-[#E8567A] flex items-center justify-center mb-6 shadow-lg shadow-[#E8567A]/20">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo wp_kses( $step['icon'], [ 'path' => [ 'd' => true ], 'polyline' => [ 'points' => true ], 'line' => [ 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ], 'rect' => [ 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true ] ] ); ?></svg>
        </div>
        <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#E8567A] mb-2"><?php echo esc_html( $step['label'] ); ?></span>
        <h3 class="font-semibold text-[#2B2B2B] text-lg mb-3" style="font-family:'Playfair Display',serif"><?php echo esc_html( $step['title'] ); ?></h3>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed"><?php echo esc_html( $step['copy'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== FAQ STRIP ===== -->
<section class="bg-[#2B2B2B] py-16 lg:py-20" aria-label="Common questions">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-12">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#F2A8BC] mb-4">Quick Answers</p>
      <h2 class="text-white leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(22px,3vw,32px);font-weight:500">
        Frequently Asked Questions
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-4xl mx-auto">
      <?php
        $faqs = [
          [
            'q' => 'What is your delivery estimate?',
            'a' => 'The current estimated delivery time is 0-1 business days for all destinations.',
          ],
          [
            'q' => 'What is the order cutoff time?',
            'a' => 'The order cutoff time is 2:00 PM Pacific Standard Time, Los Angeles.',
          ],
          [
            'q' => 'Do you accept returns and exchanges?',
            'a' => 'Yes. We accept returns for defective and non-defective products, and we accept exchanges on eligible items.',
          ],
          [
            'q' => 'How long do I have to return an item?',
            'a' => 'Returns must be requested within 30 days of delivery. Products must be new and unused.',
          ],
          [
            'q' => 'Who pays for the return label?',
            'a' => 'Return labels are download-and-print labels, and label cost is the customer responsibility unless support confirms otherwise.',
          ],
          [
            'q' => 'How long does a refund take?',
            'a' => 'Refunds are processed within 10 days after your returned item is received and inspected.',
          ],
        ];
        foreach ( $faqs as $faq ) :
      ?>
      <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-colors duration-300">
        <h4 class="font-semibold text-white text-[15px] mb-2"><?php echo esc_html( $faq['q'] ); ?></h4>
        <p class="text-[13px] text-white/60 leading-relaxed"><?php echo esc_html( $faq['a'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-10">
      <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"
         class="inline-flex items-center gap-2 text-[#F2A8BC] text-sm font-semibold hover:text-white transition-colors duration-300">
        View All FAQs
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ===== CONTACT / SUPPORT CTA ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-24" aria-label="Contact support">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="bg-[#E8567A] rounded-3xl px-8 py-14 lg:py-16 lg:px-16 text-center relative overflow-hidden">
      <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full bg-white/10 pointer-events-none"></div>
      <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-white/5 pointer-events-none"></div>

      <div class="relative z-10">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/70 mb-4">Still Have Questions?</p>
        <h2 class="mb-4 text-white leading-tight"
            style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(28px,4vw,48px);font-weight:300">
          We're Here To Help
        </h2>
        <p class="text-white/80 text-[15px] mb-10 max-w-lg mx-auto leading-relaxed">
          Our support team is available Monday through Saturday, 10:00 AM - 6:00 PM PST. Reach out anytime and we will guide you through shipping, return, or exchange questions.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="mailto:support@shopshive.com"
             class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-[#E8567A] text-sm font-semibold rounded-full hover:bg-[#FDF8F4] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            support@shopshive.com
          </a>
        </div>

        <p class="mt-6 text-white/50 text-xs">Mon - Sat &nbsp;·&nbsp; 10:00 AM - 6:00 PM PST</p>
      </div>
    </div>
  </div>
</section>
