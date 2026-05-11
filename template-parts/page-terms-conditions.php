<?php
/**
 * Terms & Conditions template part — Shopshive
 * Sections: Hero · Last Updated · Terms Content · Contact CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="Terms and conditions hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/25 to-[#E8567A]/15"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Legal</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(36px,5.5vw,64px);font-weight:300">
      Terms &amp; <em>Conditions</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-2xl leading-relaxed">
      Please read these terms carefully before using our website or placing an order. By shopping with Shopshive, you agree to be bound by the following terms.
    </p>

    <!-- Quick highlights -->
    <div class="mt-10 flex flex-wrap justify-center gap-4">
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Secure Shopping</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Safe &amp; Flexible Payment</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">30-Day Returns</span>
      </div>
    </div>
  </div>
</section>

<!-- ===== LAST UPDATED STRIP ===== -->
<div class="bg-[#2B2B2B] py-3.5" aria-label="Last updated date">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12 flex flex-col sm:flex-row items-center justify-between gap-2">
    <p class="text-xs text-white/50">
      Last updated: <strong class="text-white/80">May 1, 2025</strong>
    </p>
    <p class="text-xs text-white/50">
      Questions? <a href="mailto:support@shopshive.com" class="text-[#F2A8BC] hover:text-white transition-colors duration-200">support@shopshive.com</a>
    </p>
  </div>
</div>

<!-- ===== MAIN CONTENT ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Terms and conditions content">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">

    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-12 lg:gap-16 items-start">

      <!-- Sidebar TOC (sticky on desktop) -->
      <aside class="hidden lg:block" aria-label="Table of contents">
        <div class="sticky top-8 bg-white rounded-2xl p-6 shadow-sm border border-[#F5E6DC]">
          <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#E8567A] mb-5">Contents</p>
          <nav>
            <ol class="space-y-2.5">
              <?php
                $toc = [
                  '1. Acceptance of Terms',
                  '2. Use of Our Website',
                  '3. Account Registration',
                  '4. Products &amp; Orders',
                  '5. Pricing &amp; Payment',
                  '6. Shipping &amp; Delivery',
                  '7. Returns &amp; Refunds',
                  '8. Intellectual Property',
                  '9. Disclaimer of Warranties',
                  '10. Limitation of Liability',
                  '11. Privacy',
                  '12. Governing Law',
                  '13. Changes to Terms',
                  '14. Contact Us',
                ];
                $anchors = [
                  'acceptance','use-of-website','account-registration','products-orders',
                  'pricing-payment','shipping-delivery','returns-refunds','intellectual-property',
                  'disclaimer','limitation','privacy','governing-law','changes','contact',
                ];
                foreach ( $toc as $i => $label ) :
              ?>
              <li>
                <a href="#<?php echo esc_attr($anchors[$i]); ?>"
                   class="flex items-start gap-2 text-[13px] text-[#2B2B2B]/60 hover:text-[#E8567A] transition-colors duration-200 leading-snug group">
                  <span class="flex-shrink-0 mt-0.5 w-1.5 h-1.5 rounded-full bg-[#D4B8A0] group-hover:bg-[#E8567A] transition-colors duration-200"></span>
                  <?php echo $label; ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ol>
          </nav>
        </div>
      </aside>

      <!-- Terms Sections -->
      <div class="space-y-10">

        <!-- 1. Acceptance of Terms -->
        <div id="acceptance" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">01</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Acceptance of Terms</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>By accessing or using the Shopshive website at <strong class="text-[#2B2B2B]">shopshive.com</strong> (the "Site"), placing an order, or otherwise engaging with our services, you confirm that you have read, understood, and agree to be bound by these Terms &amp; Conditions ("Terms").</p>
            <p>If you do not agree to these Terms, please do not use our Site or services. These Terms apply to all visitors, users, and customers of Shopshive.</p>
            <p>We reserve the right to update these Terms at any time. Continued use of the Site after changes are posted constitutes your acceptance of the revised Terms.</p>
          </div>
        </div>

        <!-- 2. Use of Our Website -->
        <div id="use-of-website" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">02</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Use of Our Website</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>You agree to use the Site only for lawful purposes and in a manner that does not infringe the rights of others or restrict or inhibit their use of the Site. Prohibited behavior includes but is not limited to:</p>
            <ul class="space-y-2 ml-4">
              <?php
                $prohibited = [
                  'Using the Site to transmit harmful, offensive, or fraudulent content',
                  'Attempting to gain unauthorized access to any part of the Site or its systems',
                  'Scraping, crawling, or harvesting data from the Site without written permission',
                  'Using automated bots or scripts to place orders or interact with the Site',
                  'Impersonating another person or entity',
                  'Engaging in any activity that could damage, disable, or overburden our infrastructure',
                ];
                foreach ( $prohibited as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <p>We reserve the right to terminate access to the Site for any user who violates these terms.</p>
          </div>
        </div>

        <!-- 3. Account Registration -->
        <div id="account-registration" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">03</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Account Registration</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>You may browse the Site without registering. However, to place an order or access certain features, you may be required to create an account.</p>
            <p>When registering, you agree to provide accurate, current, and complete information. You are responsible for maintaining the confidentiality of your account credentials and for all activity that occurs under your account.</p>
            <p>Notify us immediately at <a href="mailto:support@shopshive.com" class="text-[#E8567A] hover:underline">support@shopshive.com</a> if you suspect any unauthorized use of your account. Shopshive is not liable for any loss resulting from unauthorized use of your credentials.</p>
          </div>
        </div>

        <!-- 4. Products & Orders -->
        <div id="products-orders" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">04</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Products &amp; Orders</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>All product descriptions, images, and availability information on our Site are provided in good faith. We make every effort to display product colors and details accurately, however, we cannot guarantee that your device's display will perfectly reflect the actual product.</p>
            <p>Placing an order constitutes an offer to purchase. We reserve the right to accept or decline any order at our discretion. Your order is confirmed when you receive an email order confirmation from us.</p>
            <p>We reserve the right to limit order quantities and to cancel orders that appear fraudulent, that are placed by resellers for commercial purposes, or that violate these Terms in any way.</p>
          </div>
        </div>

        <!-- 5. Pricing & Payment -->
        <div id="pricing-payment" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">05</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Pricing &amp; Payment</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>All prices on the Site are displayed in <strong class="text-[#2B2B2B]">US Dollars (USD)</strong> and are subject to change without notice. Prices do not include applicable taxes, which will be calculated and displayed at checkout.</p>
            <p>We accept multiple credit and debit cards as well as other payment methods available at checkout. All transactions are processed securely using industry-standard encryption.</p>
            <p>By submitting a payment, you represent and warrant that you are authorized to use the payment method provided and that the information you supply is accurate. Shopshive reserves the right to cancel orders if payment cannot be verified or is declined.</p>
            <p>In the event a product is listed at an incorrect price due to a typographical error, we reserve the right to cancel the order and issue a full refund.</p>
          </div>
        </div>

        <!-- 6. Shipping & Delivery -->
        <div id="shipping-delivery" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">06</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Shipping &amp; Delivery</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We offer <strong class="text-[#2B2B2B]">free standard shipping</strong> on all orders within the United States. Estimated delivery times are <strong class="text-[#2B2B2B]">5–10 business days</strong> after order processing (1–3 business days). These are estimates and not guaranteed.</p>
            <p>Shopshive is not liable for delays caused by carriers, weather, customs, or other circumstances beyond our reasonable control. Risk of loss and title for items purchased pass to you upon delivery to the carrier.</p>
            <p>For full details, please review our <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="text-[#E8567A] hover:underline">Shipping &amp; Returns Policy</a>.</p>
          </div>
        </div>

        <!-- 7. Returns & Refunds -->
        <div id="returns-refunds" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">07</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Returns &amp; Refunds</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We accept returns and exchanges within <strong class="text-[#2B2B2B]">30 days</strong> of the delivery date, provided items are unworn, unwashed, and have all original tags attached. Items marked "Final Sale" are not eligible for return.</p>
            <p>Refunds are issued to the original payment method within <strong class="text-[#2B2B2B]">5–7 business days</strong> of us receiving and inspecting the returned item. Shipping costs for returns are the customer's responsibility unless the item is damaged or incorrect.</p>
            <p>For complete information, please see our <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="text-[#E8567A] hover:underline">Returns Policy</a>.</p>
          </div>
        </div>

        <!-- 8. Intellectual Property -->
        <div id="intellectual-property" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">08</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Intellectual Property</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>All content on the Shopshive Site — including but not limited to text, graphics, logos, images, product photographs, and software — is the property of Shopshive or its content suppliers and is protected by applicable intellectual property laws.</p>
            <p>You may not reproduce, distribute, modify, create derivative works from, publicly display, or commercially exploit any content from this Site without our prior written consent.</p>
            <p>Any trademarks, service marks, and logos appearing on the Site are the property of their respective owners. Use of these marks without express permission is strictly prohibited.</p>
          </div>
        </div>

        <!-- 9. Disclaimer of Warranties -->
        <div id="disclaimer" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">09</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Disclaimer of Warranties</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>The Site and all content, products, and services provided through it are offered on an <strong class="text-[#2B2B2B]">"as is" and "as available"</strong> basis, without warranties of any kind, either express or implied.</p>
            <p>Shopshive does not warrant that the Site will be uninterrupted, error-free, or free of viruses or other harmful components. We do not warrant that the results of using the Site will be accurate or reliable.</p>
            <p>To the fullest extent permissible by applicable law, Shopshive disclaims all warranties, including implied warranties of merchantability, fitness for a particular purpose, and non-infringement.</p>
          </div>
        </div>

        <!-- 10. Limitation of Liability -->
        <div id="limitation" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">10</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Limitation of Liability</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>To the maximum extent permitted by law, Shopshive and its officers, employees, agents, and partners shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of or inability to use the Site or its services.</p>
            <p>Our total liability to you for any claim arising from your use of the Site or purchase of products shall not exceed the amount you paid for the specific order giving rise to the claim.</p>
            <p>Some jurisdictions do not allow the exclusion or limitation of certain damages, so the above limitations may not apply to you.</p>
          </div>
        </div>

        <!-- 11. Privacy -->
        <div id="privacy" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">11</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Privacy</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>Your privacy matters to us. Our collection, use, and handling of your personal information is governed by our <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="text-[#E8567A] hover:underline">Privacy Policy</a>, which is incorporated into these Terms by reference.</p>
            <p>By using our Site and services, you consent to the collection and use of your information as described in our Privacy Policy. We encourage you to read it to understand our practices.</p>
          </div>
        </div>

        <!-- 12. Governing Law -->
        <div id="governing-law" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">12</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Governing Law &amp; Dispute Resolution</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>These Terms shall be governed by and construed in accordance with the laws of the <strong class="text-[#2B2B2B]">State of California</strong>, United States, without regard to its conflict of law provisions.</p>
            <p>Any disputes arising out of or relating to these Terms or your use of the Site shall first be attempted to be resolved through good-faith negotiation. If unresolved, disputes shall be submitted to binding arbitration in accordance with applicable rules, or resolved in the courts of competent jurisdiction in California.</p>
          </div>
        </div>

        <!-- 13. Changes to Terms -->
        <div id="changes" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">13</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Changes to Terms</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We reserve the right to modify these Terms at any time. When we make changes, we will update the "Last Updated" date at the top of this page. Significant changes may also be communicated via email or a notice on the Site.</p>
            <p>Your continued use of the Site following the posting of any changes constitutes your acceptance of those changes. We encourage you to review these Terms periodically.</p>
          </div>
        </div>

        <!-- 14. Contact Us -->
        <div id="contact" class="bg-[#F5E6DC] rounded-2xl p-8 lg:p-10 border border-[#F2A8BC]/40">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#E8567A]/15 flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">14</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Contact Us</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>If you have any questions, concerns, or requests regarding these Terms &amp; Conditions, please reach out to us:</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
              <div class="flex items-start gap-3">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-0.5" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <div>
                  <p class="text-xs font-semibold text-[#2B2B2B] mb-0.5">Email</p>
                  <a href="mailto:support@shopshive.com" class="text-[#E8567A] hover:underline">support@shopshive.com</a>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-0.5" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.9h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <div>
                  <p class="text-xs font-semibold text-[#2B2B2B] mb-0.5">Phone</p>
                  <a href="tel:+17603830494" class="text-[#E8567A] hover:underline">+1 (760) 383 0494</a>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-0.5" aria-hidden="true"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/><path d="M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>
                <div>
                  <p class="text-xs font-semibold text-[#2B2B2B] mb-0.5">Address</p>
                  <p class="text-[#2B2B2B]/70">1777 Canal St, Merced, CA, United States</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-0.5" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <div>
                  <p class="text-xs font-semibold text-[#2B2B2B] mb-0.5">Business Hours</p>
                  <p class="text-[#2B2B2B]/70">Mon – Sat, 10:00 AM – 6:00 PM PST</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.space-y-10 -->
    </div><!-- /.grid -->
  </div>
</section>

<!-- ===== CONTACT CTA ===== -->
<section class="bg-[#FDF8F4] pb-20 lg:pb-24" aria-label="Contact support CTA">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">

    <div class="bg-[#E8567A] rounded-3xl px-8 py-14 lg:py-16 lg:px-16 text-center relative overflow-hidden">
      <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full bg-white/10 pointer-events-none"></div>
      <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-white/5 pointer-events-none"></div>

      <div class="relative z-10">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/70 mb-4">Questions About Our Terms?</p>
        <h2 class="mb-4 text-white leading-tight"
            style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(28px,4vw,48px);font-weight:300">
          We're Here To Help
        </h2>
        <p class="text-white/80 text-[15px] mb-10 max-w-lg mx-auto leading-relaxed">
          Our support team is available Monday through Saturday, 10:00 AM – 6:00 PM PST. Don't hesitate to reach out with any questions.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="mailto:support@shopshive.com"
             class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-[#E8567A] text-sm font-semibold rounded-full hover:bg-[#FDF8F4] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            support@shopshive.com
          </a>
          <a href="tel:+17603830494"
             class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-transparent border-2 border-white text-white text-sm font-semibold rounded-full hover:bg-white/10 transition-all duration-300">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.9h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            +1 (760) 383 0494
          </a>
        </div>

        <p class="mt-6 text-white/50 text-xs">Mon – Sat &nbsp;·&nbsp; 10:00 AM – 6:00 PM PST</p>
      </div>
    </div>

  </div>
</section>
