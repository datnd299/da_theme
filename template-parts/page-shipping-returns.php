<?php
/**
 * Template Part: Shipping & Returns Page
 * Store: Elite Shop Express
 * Design System: Trusted Hardware — clean, practical, conversion-first
 */
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="font-[Inter,system-ui,sans-serif] bg-white text-[#111111]">

  <!-- ░░ HERO BANNER ░░ -->
  <div class="bg-[#1B3A5C] py-14 px-6">
    <div class="max-w-[1280px] mx-auto">
      <p class="text-[#E8470A] text-xs font-semibold uppercase tracking-widest mb-3">Policy Information</p>
      <h1 class="text-white text-[clamp(2rem,5vw,3.25rem)] font-bold leading-tight mb-5 max-w-[720px]">
        Shipping &amp; Returns
      </h1>
      <p class="text-slate-300 text-base leading-relaxed max-w-[600px] mb-8">
        At Elite Shop Express, we are committed to delivering your orders quickly, reliably, and hassle-free. Everything you need to know about our shipping and return policy is right here.
      </p>
      <div class="flex flex-wrap gap-3">
        <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"
           class="inline-flex items-center gap-2 bg-[#E8470A] hover:bg-[#C93D08] active:scale-[0.97] text-white font-semibold text-[0.9375rem] px-6 py-3 rounded-md min-h-[44px] transition-colors duration-150 no-underline">
          Shop Now
        </a>
        <a href="mailto:support@eliteshopexpress.com"
           class="inline-flex items-center gap-2 bg-transparent hover:bg-[#475569] border-2 border-slate-500 text-slate-300 font-semibold text-[0.9375rem] px-6 py-[10px] rounded-md min-h-[44px] transition-colors duration-150 no-underline">
          Contact Support
        </a>
      </div>
    </div>
  </div>

  <!-- ░░ TRUST BAR ░░ -->
  <div class="bg-[#254E7A] py-3 px-6">
    <div class="max-w-[1280px] mx-auto flex flex-wrap gap-4 gap-x-8 justify-center items-center">
      <span class="text-white text-[0.8125rem] font-medium whitespace-nowrap">🚚 Free Shipping on All Orders</span>
      <span class="text-white text-[0.8125rem] font-medium whitespace-nowrap">↩️ 30-Day Returns</span>
      <span class="text-white text-[0.8125rem] font-medium whitespace-nowrap">🇺🇸 US-Based Support</span>
      <a href="tel:4072551197" class="text-white text-[0.8125rem] font-medium no-underline whitespace-nowrap">📞 407-255-1197</a>
    </div>
  </div>

  <!-- ░░ MAIN CONTENT ░░ -->
  <div class="max-w-[1280px] mx-auto px-6 py-16">

    <!-- Quick Stats -->
    <div class="grid grid-cols-[repeat(auto-fit,minmax(180px,1fr))] gap-4 mb-16">
      <?php
      $stats = [
        [ 'val' => 'Free',      'label' => 'Shipping',        'sub'  => 'On all US orders' ],
        [ 'val' => '3–5 Days',  'label' => 'Order Processing', 'sub'  => 'Business days' ],
        [ 'val' => '7–10 Days', 'label' => 'Delivery Time',    'sub'  => 'After dispatch' ],
        [ 'val' => '30 Days',   'label' => 'Return Window',    'sub'  => 'Hassle-free returns' ],
      ];
      foreach ( $stats as $s ) : ?>
        <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-6">
          <p class="text-[1.625rem] font-bold text-[#111111] mb-1"><?php echo esc_html( $s['val'] ); ?></p>
          <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1"><?php echo esc_html( $s['label'] ); ?></p>
          <p class="text-xs text-[#888888] m-0"><?php echo esc_html( $s['sub'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Sections stack -->
    <div class="grid grid-cols-1 gap-16">

      <!-- ══════════════════════════════════════════ -->
      <!--  PART I: SHIPPING                          -->
      <!-- ══════════════════════════════════════════ -->

      <!-- Section heading -->
      <div class="border-b border-[#E2E2E2] pb-4">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-1">Part I</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111]">Shipping Information</h2>
      </div>

      <!-- ── ORDER PROCESSING ── -->
      <section id="order-processing">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">📦 Order Processing</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Processed Within 3–5 Business Days</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-4">
          All orders are carefully processed within <strong class="text-[#111111]">3–5 business days</strong> (Monday to Friday, excluding holidays). During peak seasons or high-demand periods, processing times may be slightly extended, but we always aim to dispatch your order as quickly as possible.
        </p>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75]">
          Once your order has been processed and shipped, you will receive a confirmation email with tracking details.
        </p>
      </section>

      <!-- ── SHIPPING TIME ── -->
      <section id="shipping-time">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">🚚 Shipping Time</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">7–10 Business Days After Dispatch</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-6">
          After dispatch, standard shipping within the United States typically takes <strong class="text-[#111111]">7–10 business days</strong>. Please note that delivery times may vary depending on your location, weather conditions, and carrier delays.
        </p>
        <div class="overflow-x-auto rounded-md border border-[#E2E2E2]">
          <table class="w-full text-left text-sm text-[#555555]">
            <thead class="bg-[#F5F5F5] text-[#111111] font-semibold border-b border-[#E2E2E2]">
              <tr>
                <th class="px-5 py-4">Destination</th>
                <th class="px-5 py-4">Processing</th>
                <th class="px-5 py-4">Transit</th>
                <th class="px-5 py-4 text-right">Cost</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-5 py-4 font-medium text-[#111111]">United States (all states)</td>
                <td class="px-5 py-4">3–5 Business Days</td>
                <td class="px-5 py-4">7–10 Business Days</td>
                <td class="px-5 py-4 text-right font-bold text-[#1A8A3C]">FREE</td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="text-xs text-[#888888] mt-3 italic">Business days are Monday – Friday, excluding US federal holidays. Delivery times are estimates and not guaranteed.</p>
      </section>

      <!-- ── SHIPPING COST ── -->
      <section id="shipping-cost">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">💰 Shipping Cost</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Free Standard Shipping on All Orders</h2>
        <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-6 flex gap-4 items-start">
          <span class="text-2xl flex-shrink-0">✅</span>
          <div>
            <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1">No Hidden Fees</p>
            <p class="text-[0.9375rem] text-[#555555] leading-[1.75] m-0">We proudly offer FREE Standard Shipping on all orders. What you see at checkout is exactly what you pay — no surprises.</p>
          </div>
        </div>
      </section>

      <!-- ── ORDER TRACKING ── -->
      <section id="order-tracking">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">📍 Order Tracking</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Track Your Package in Real Time</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-6">
          As soon as your order is shipped, you will receive a <strong class="text-[#111111]">tracking number</strong> via email. This allows you to monitor your package in real time from our warehouse to your doorstep. If you have any issues tracking your order, feel free to contact our support team.
        </p>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4">
          <?php
          $tracking_features = [
            [ 'icon' => '📧', 'title' => 'Email Notification',   'desc' => 'Tracking number sent as soon as your order ships' ],
            [ 'icon' => '📦', 'title' => 'Real-Time Updates',    'desc' => 'Monitor your package every step of the way' ],
            [ 'icon' => '💬', 'title' => 'Support Available',    'desc' => 'Our team is ready to help with tracking issues' ],
          ];
          foreach ( $tracking_features as $feat ) : ?>
            <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-4 flex items-start gap-3">
              <span class="text-2xl flex-shrink-0 leading-none"><?php echo $feat['icon']; ?></span>
              <div>
                <p class="text-sm font-semibold text-[#111111] mb-0.5"><?php echo esc_html( $feat['title'] ); ?></p>
                <p class="text-xs text-[#888888] m-0"><?php echo esc_html( $feat['desc'] ); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ── IMPORTANT NOTES ── -->
      <section id="shipping-notes">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">⚠️ Important Notes</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Before You Complete Your Order</h2>
        <div class="space-y-3">
          <?php
          $notes = [
            'Please ensure your shipping address is correct before completing your order.',
            'We are not responsible for delays caused by incorrect or incomplete addresses.',
            'Delivery times are estimates and not guaranteed.',
            'We do not ship to P.O. Boxes or APO/FPO addresses.',
          ];
          foreach ( $notes as $note ) : ?>
            <div class="flex gap-3 items-start p-4 border border-[#E2E2E2] rounded-md">
              <span class="text-[#E8470A] font-bold flex-shrink-0 mt-0.5">!</span>
              <p class="text-[0.9375rem] text-[#555555] m-0 leading-[1.65]"><?php echo esc_html( $note ); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ══════════════════════════════════════════ -->
      <!--  PART II: RETURNS & REFUNDS               -->
      <!-- ══════════════════════════════════════════ -->

      <!-- Section heading -->
      <div class="border-b border-[#E2E2E2] pb-4">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-1">Part II</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111]">Returns &amp; Refunds</h2>
      </div>

      <!-- ── 30-DAY RETURN POLICY ── -->
      <section id="return-policy" class="bg-[#1B3A5C] rounded-md px-8 py-10">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">↩️ 30-Day Return Policy</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-white mb-4">Shop With Confidence</h2>
        <p class="text-base text-slate-300 leading-[1.75] mb-6">
          We want you to shop with confidence. If you're not completely satisfied with your purchase, you may request a return within <strong class="text-white">30 days</strong> of receiving your order.
        </p>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(220px,1fr))] gap-4">
          <?php
          $eligibility = [
            [ 'icon' => '✅', 'text' => 'Item is unused and in its original condition' ],
            [ 'icon' => '📦', 'text' => 'Item is in its original packaging' ],
            [ 'icon' => '🧾', 'text' => 'Proof of purchase (order confirmation or receipt) is required' ],
          ];
          foreach ( $eligibility as $e ) : ?>
            <div class="flex gap-3 items-start">
              <span class="text-xl flex-shrink-0"><?php echo $e['icon']; ?></span>
              <p class="text-[0.9375rem] text-slate-300 leading-[1.65] m-0"><?php echo esc_html( $e['text'] ); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ── HOW TO RETURN ── -->
      <section id="how-to-return">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">🔄 How to Request a Return</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-2">Simple 3-Step Process</h2>
        <p class="text-[0.9375rem] text-[#555555] mb-8">Contact us at <a href="mailto:support@eliteshopexpress.com" class="text-[#1B3A5C] font-semibold underline">support@eliteshopexpress.com</a> to initiate a return.</p>

        <div class="grid grid-cols-1 gap-4 mb-8">
          <?php
          $steps = [
            [ 'num' => '01', 'title' => 'Contact Our Support Team', 'desc' => 'Email support@eliteshopexpress.com with your order number, reason for return, and photos of the item (if damaged or defective). Our team will review your request within 1–2 business days.' ],
            [ 'num' => '02', 'title' => 'Receive Return Authorization', 'desc' => 'Once approved, we will send you return instructions and a Return Merchandise Authorization (RMA) number. Do not ship items back without prior approval — unauthorized returns will not be accepted.' ],
            [ 'num' => '03', 'title' => 'Ship Your Item Back', 'desc' => 'Pack your item securely in its original packaging with all tags attached. Drop off at any authorized carrier location and keep your tracking number until your refund is confirmed.' ],
          ];
          foreach ( $steps as $step ) : ?>
            <div class="flex gap-4 items-start border border-[#E2E2E2] rounded-md p-6">
              <span class="w-9 h-9 bg-[#1B3A5C] text-white font-bold text-sm flex items-center justify-center rounded-md flex-shrink-0"><?php echo esc_html( $step['num'] ); ?></span>
              <div>
                <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1.5"><?php echo esc_html( $step['title'] ); ?></p>
                <p class="text-sm text-[#555555] leading-[1.65] m-0"><?php echo esc_html( $step['desc'] ); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ── REFUNDS ── -->
      <section id="refunds">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">💵 Refunds</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Your Refund, Step by Step</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-6">
          Once your returned item is received and inspected, approved refunds will be issued to your original payment method. Please allow <strong class="text-[#111111]">5–10 business days</strong> for the refund to appear, depending on your bank or payment provider.
        </p>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(260px,1fr))] gap-4">
          <?php
          $refund_steps = [
            [ 'icon' => '📬', 'title' => 'Item Received & Inspected', 'desc' => 'We inspect returned items within 1–2 business days of receiving them. You will be notified by email of the outcome.' ],
            [ 'icon' => '✅', 'title' => 'Refund Approved',           'desc' => 'If approved, your refund is issued to your original payment method within 5–10 business days.' ],
            [ 'icon' => '❓', 'title' => 'Refund Not Received?',      'desc' => 'If more than 15 business days have passed since approval, contact us with your order number and we will look into it right away.' ],
          ];
          foreach ( $refund_steps as $r ) : ?>
            <div class="border border-[#E2E2E2] rounded-md p-6 flex gap-4 items-start">
              <span class="text-[1.75rem] flex-shrink-0 leading-none mt-0.5"><?php echo $r['icon']; ?></span>
              <div>
                <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1.5"><?php echo esc_html( $r['title'] ); ?></p>
                <p class="text-sm text-[#555555] leading-[1.65] m-0"><?php echo esc_html( $r['desc'] ); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ── NON-RETURNABLE + DAMAGED (2-col on desktop) ── -->
      <div class="grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-6">

        <!-- Non-Returnable Items -->
        <section id="non-returnable" class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-8">
          <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">❌ Non-Returnable Items</p>
          <h2 class="text-xl font-semibold text-[#111111] mb-4">Items Not Eligible for Return</h2>
          <ul class="space-y-2.5">
            <?php
            $non_returnable = [
              'Items marked as final sale',
              'Used or damaged items not due to our error',
              'Items returned without prior authorization',
              'Items missing original packaging or tags',
            ];
            foreach ( $non_returnable as $item ) : ?>
              <li class="flex gap-3 items-start">
                <span class="text-[#E8470A] font-bold flex-shrink-0">×</span>
                <p class="text-[0.9375rem] text-[#555555] m-0 leading-[1.65]"><?php echo esc_html( $item ); ?></p>
              </li>
            <?php endforeach; ?>
          </ul>
        </section>

        <!-- Damaged or Incorrect Items -->
        <section id="damaged-items" class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-8">
          <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">📦 Damaged or Incorrect Items</p>
          <h2 class="text-xl font-semibold text-[#111111] mb-3">We Make It Right, Immediately</h2>
          <p class="text-[0.9375rem] text-[#555555] leading-[1.75] m-0">
            If you receive a damaged, defective, or incorrect item, please contact us within <strong class="text-[#111111]">7 days of delivery</strong>. Include your order number, a description of the issue, and photos of the item and packaging. We will resolve the issue promptly by offering a replacement or refund at no additional cost.
          </p>
        </section>

      </div>

      <!-- ── CONTACT US ── -->
      <section id="contact-us">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">Contact Us</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-2">Questions? We're Here to Help.</h2>
        <p class="text-[0.9375rem] text-[#555555] mb-8">If you have any questions about shipping or returns, feel free to reach out. We respond within 1 business day.</p>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(240px,1fr))] gap-4">

          <!-- Email -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">📧</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Email</p>
              <a href="mailto:support@eliteshopexpress.com"
                 class="text-[0.9375rem] text-[#1B3A5C] font-semibold underline break-all">
                support@eliteshopexpress.com
              </a>
            </div>
          </div>

          <!-- Phone -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">📞</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Phone</p>
              <a href="tel:4072551197" class="text-[0.9375rem] text-[#1B3A5C] font-semibold underline">407-255-1197</a>
            </div>
          </div>

          <!-- Business Hours -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">🕒</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Business Hours</p>
              <p class="text-[0.9375rem] text-[#111111] leading-[1.5] m-0">Mon – Fri<br>9:00 AM – 6:00 PM CST</p>
            </div>
          </div>

          <!-- Address -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">📍</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Address</p>
              <p class="text-[0.9375rem] text-[#111111] leading-[1.5] m-0">3589 South Orange Avenue,<br>Orlando, FL 32806, US</p>
            </div>
          </div>

        </div>
      </section>

    </div><!-- /sections stack -->
  </div><!-- /container -->

  <!-- ░░ BOTTOM CTA BAND ░░ -->
  <div class="bg-[#E8470A] py-12 px-6 text-center">
    <div class="max-w-[640px] mx-auto">
      <h2 class="text-[clamp(1.5rem,3vw,2rem)] font-bold text-white mb-3">Ready to Shop?</h2>
      <p class="text-base text-white/85 mb-7">Free shipping on every order. 30-day returns. Real-time tracking. Your satisfaction is our priority.</p>
      <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"
         class="inline-flex items-center gap-2 bg-white hover:opacity-90 text-[#E8470A] font-bold text-[0.9375rem] px-8 py-3.5 rounded-md no-underline min-h-[44px] transition-opacity duration-150">
        Browse All Products →
      </a>
    </div>
  </div>

</div><!-- /shipping-returns-page -->
