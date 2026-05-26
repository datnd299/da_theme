<?php
/**
 * Refund & Return Policy template part - Shopshive
 * Structure based on a customer-friendly 30-day return policy format.
 * Sections: Hero, Overview, Return Costs, Common Scenarios, How To Return,
 * Refund Process, Exchanges, Non-Returnable Items, Contact CTA.
 */

$store_name     = 'Shopshive';
$website_domain = 'shopshive.com';
$support_email  = 'support@shopshive.com';
$support_url    = '/contact-us/';
$faq_url        = '/faqs/';
$last_updated   = 'January 2, 2024';
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="Refund and return policy hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/25 to-[#E8567A]/15"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Policy</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(36px,5.5vw,64px);font-weight:300">
      Refund &amp; <em>Return Policy</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-2xl leading-relaxed">
      Shop with confidence. This policy explains our 30-day return window, return costs, refund timing, exchanges, and how to request help with your order.
    </p>

    <div class="mt-10 flex flex-wrap justify-center gap-4">
      <?php
        $hero_badges = [
          '30-Day Easy Returns',
          '$0 Restocking Fee',
          'Support Through The Process',
        ];
        foreach ( $hero_badges as $badge ) :
      ?>
      <div class="flex items-center gap-2 bg-white/75 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]"><?php echo esc_html( $badge ); ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== POLICY CONTENT ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Refund and return policy content">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-10 lg:gap-14 items-start">

      <!-- ===== SIDEBAR ===== -->
      <aside class="lg:sticky lg:top-28">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#F5E6DC]">
          <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">On This Page</p>
          <nav class="space-y-3" aria-label="Refund and return policy sections">
            <?php
              $toc = [
                [ 'href' => '#easy-returns', 'label' => '30-Day Easy Returns' ],
                [ 'href' => '#overview', 'label' => 'Return Policy Overview' ],
                [ 'href' => '#return-costs', 'label' => 'Return Costs' ],
                [ 'href' => '#common-scenarios', 'label' => 'Common Return Scenarios' ],
                [ 'href' => '#how-to-return', 'label' => 'How To Return An Item' ],
                [ 'href' => '#refund-process', 'label' => 'Refund Process' ],
                [ 'href' => '#exchanges', 'label' => 'Exchanges' ],
                [ 'href' => '#non-returnable', 'label' => 'Non-Returnable Items' ],
                [ 'href' => '#questions', 'label' => 'Questions?' ],
                [ 'href' => '#contact-info', 'label' => 'Contact Information' ],
              ];

              foreach ( $toc as $item ) :
            ?>
            <a href="<?php echo esc_url( $item['href'] ); ?>" class="block text-[13px] text-[#2B2B2B]/60 hover:text-[#E8567A] transition-colors">
              <?php echo esc_html( $item['label'] ); ?>
            </a>
            <?php endforeach; ?>
          </nav>
        </div>
      </aside>

      <!-- ===== MAIN CONTENT ===== -->
      <div class="space-y-6">

        <!-- 30-DAY RETURNS -->
        <div id="easy-returns" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">30-Day Easy Returns</h2>
          </div>

          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p><strong class="text-[#2B2B2B]">Last Updated on <?php echo esc_html( $last_updated ); ?></strong></p>
            <p>At <?php echo esc_html( $store_name ); ?>, we want you to shop with confidence. If you are not satisfied with your purchase for any reason, we offer a clear and customer-friendly return process for most items sold on our website.</p>
            <p>You have <strong class="text-[#2B2B2B]">30 days from the day you receive your order</strong> to request a return for most items.</p>
            <p>To be eligible, items must be unused, uninstalled if applicable, in original condition, and returned with all original packaging, tags or labels, manuals, accessories, and included parts. Items should be packed securely to prevent damage during return shipping.</p>
            <p><strong class="text-[#2B2B2B]">Restocking Fee: $0.</strong> We do not charge restocking fees for eligible returns.</p>
          </div>
        </div>

        <!-- OVERVIEW -->
        <div id="overview" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16v16H4z"/><path d="M4 9h16"/><path d="M9 4v16"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Return Policy Overview</h2>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php
              $overview_cards = [
                [ 'title' => 'Return Window', 'copy' => '30 days from the day you receive your order, unless the product page states a different return window.' ],
                [ 'title' => 'Condition', 'copy' => 'Items must be unused, uninstalled, in original condition, and returned with original packaging, tags or labels, accessories, manuals, and parts.' ],
                [ 'title' => 'Easy Returns', 'copy' => 'Our support team will assist you through the process from return approval to refund confirmation.' ],
                [ 'title' => 'Restocking Fee', 'copy' => '$0 — we do not charge any restocking fees for eligible returns.' ],
              ];

              foreach ( $overview_cards as $card ) :
            ?>
            <div class="bg-[#FDF8F4] border border-[#F5E6DC] rounded-xl p-5">
              <h3 class="font-semibold text-[#2B2B2B] text-[15px] mb-2"><?php echo esc_html( $card['title'] ); ?></h3>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed"><?php echo esc_html( $card['copy'] ); ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- RETURN COSTS -->
        <div id="return-costs" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Return Costs</h2>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="bg-[#FDF8F4] border border-[#F5E6DC] rounded-xl p-6">
              <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#E8567A] mb-3">No Cost To Customer</p>
              <h3 class="font-semibold text-[#2B2B2B] text-lg mb-3">Defective, Damaged, Or Incorrect Products</h3>
              <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
                <p>We cover return shipping or provide a prepaid return label if:</p>
                <ul>
                  <li>You received the wrong item.</li>
                  <li>The item arrived damaged due to the carrier.</li>
                  <li>The item is defective, missing essential parts, or not functioning as intended.</li>
                </ul>
                <p>We may request photos or videos of the item and packaging to help resolve the issue quickly.</p>
              </div>
            </div>

            <div class="bg-[#FDF8F4] border border-[#F5E6DC] rounded-xl p-6">
              <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#E8567A] mb-3">Customer Pays Return Shipping</p>
              <h3 class="font-semibold text-[#2B2B2B] text-lg mb-3">Customer Remorse / Change Of Mind</h3>
              <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
                <p>The customer pays the actual return shipping cost when:</p>
                <ul>
                  <li>You ordered the wrong item, size, color, model, or compatibility.</li>
                  <li>The item does not fit or does not match your preference.</li>
                  <li>You no longer want the item.</li>
                  <li>You made a mistake when placing the order.</li>
                </ul>
                <p>Original shipping costs are non-refundable.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- COMMON SCENARIOS -->
        <div id="common-scenarios" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a4 4 0 0 1-4 4H7l-4 4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Common Return Scenarios</h2>
          </div>

          <div class="space-y-4">
            <?php
              $scenarios = [
                [
                  'title' => 'Order Cancellations After Ordering',
                  'copy'  => 'You may request an order cancellation within 9 hours after placing the order, as long as the order has not been processed or shipped. Once an order has been shipped, it can no longer be canceled; you may request a return after delivery in accordance with this policy.',
                ],
                [
                  'title' => 'Damaged On Arrival',
                  'copy'  => 'If your order arrives damaged, please contact us within 30 days of delivery and include photos of the item and the packaging, including the shipping label. We will help with a replacement or refund at no cost to you.',
                ],
                [
                  'title' => 'Wrong Product / Missing Items',
                  'copy'  => 'If you received the wrong product or your order is missing items, parts, or accessories, please contact us within 30 days of delivery. We may request photos for verification.',
                ],
                [
                  'title' => 'Never Arrived / Lost Packages',
                  'copy'  => 'If your package shows no tracking updates for an extended period or is marked delivered but you did not receive it, please contact us within 30 days of the delivery date or tracking status. We will investigate with the carrier and, if confirmed lost or misdelivered, arrange a replacement or refund as appropriate.',
                ],
              ];

              foreach ( $scenarios as $scenario ) :
            ?>
            <div class="bg-[#FDF8F4] border border-[#F5E6DC] rounded-xl p-5">
              <h3 class="font-semibold text-[#2B2B2B] text-[15px] mb-2"><?php echo esc_html( $scenario['title'] ); ?></h3>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed"><?php echo esc_html( $scenario['copy'] ); ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- HOW TO RETURN -->
        <div id="how-to-return" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">How To Return An Item</h2>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <?php
              $return_steps = [
                [ 'step' => '01', 'title' => 'Contact Us', 'copy' => 'Contact our support team with your order number and reason for return.' ],
                [ 'step' => '02', 'title' => 'Pack Your Item', 'copy' => 'Repack the item securely in its original packaging, including all accessories, tags, labels, manuals, and documents.' ],
                [ 'step' => '03', 'title' => 'Send It Back', 'copy' => 'Ship your return using the instructions provided in your return authorization email.' ],
              ];

              foreach ( $return_steps as $step ) :
            ?>
            <div class="bg-[#FDF8F4] border border-[#F5E6DC] rounded-xl p-5">
              <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-[#E8567A] text-white text-xs font-bold mb-4"><?php echo esc_html( $step['step'] ); ?></span>
              <h3 class="font-semibold text-[#2B2B2B] text-[15px] mb-2"><?php echo esc_html( $step['title'] ); ?></h3>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed"><?php echo esc_html( $step['copy'] ); ?></p>
            </div>
            <?php endforeach; ?>
          </div>

          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p><strong class="text-[#2B2B2B]">Return Authorization Required:</strong> Please do not send items back without first receiving return approval or authorization. Return instructions and the return shipping address will be provided after we review your request.</p>
            <p><strong class="text-[#2B2B2B]">What to include in your request:</strong> order number, email used at checkout, item(s) you want to return, reason for return, and photos or video if the item is damaged, defective, incorrect, or the package arrived damaged.</p>
            <p><strong class="text-[#2B2B2B]">Packaging requirement:</strong> Please include all parts, accessories, manuals, and original packaging when returning an item.</p>
          </div>
        </div>

        <!-- REFUND PROCESS -->
        <div id="refund-process" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10"/><path d="M20.49 15a9 9 0 0 1-14.85 3.36L1 14"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Refund Process</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p><strong class="text-[#2B2B2B]">Inspection:</strong> Once we receive your return, we will inspect the item to ensure it meets our return criteria.</p>
            <p><strong class="text-[#2B2B2B]">Refund Timing:</strong> After approval, your refund will be processed to the original payment method. It typically takes up to 7 days for the refund to appear, depending on your bank or payment provider.</p>
            <p>If your return is approved but the item is missing parts, shows signs of use, or is returned in non-original condition, we may be unable to issue a refund and may offer to send the item back to you.</p>
            <p><strong class="text-[#2B2B2B]">Refund Method:</strong> Approved refunds are issued to the original payment method whenever possible. If the original payment method is unavailable, we may offer an alternative method, such as store credit, only with your consent.</p>
          </div>
        </div>

        <!-- EXCHANGES -->
        <div id="exchanges" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Exchanges</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>If you would like to exchange an item for a different size, color, or model, please contact our customer support team. Exchanges are subject to stock availability.</p>
            <p>In some cases, the fastest option is to return the original item for a refund and place a new order.</p>
          </div>
        </div>

        <!-- NON-RETURNABLE -->
        <div id="non-returnable" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><line x1="9" y1="9" x2="15" y2="15"/><line x1="15" y1="9" x2="9" y2="15"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Non-Returnable Items</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>For hygiene, safety, and product integrity reasons, some items are not eligible for return. These items will be clearly marked as non-returnable on their product pages. Examples may include, but are not limited to:</p>
            <ul>
              <li>Items marked Final Sale or Non-Returnable.</li>
              <li>Gift cards or digital products/downloads.</li>
              <li>Personal care, hygiene, and intimate items.</li>
              <li>Perishable goods, including food, beverages, or supplements if applicable.</li>
              <li>Items that have been used, installed, assembled, modified, or damaged after delivery.</li>
              <li>Items missing original packaging, serial number labels, accessories, manuals, or included parts.</li>
              <li>Certain hazardous materials or restricted items that cannot be shipped back safely.</li>
            </ul>
          </div>
        </div>

        <!-- QUESTIONS -->
        <div id="questions" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-11 h-11 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 1 1 5.82 1c0 2-3 2-3 4"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Questions?</h2>
          </div>
          <div class="prose prose-sm max-w-none text-[#2B2B2B]/65 leading-relaxed">
            <p>If you have questions about this Refund & Return Policy, please visit our <a href="<?php echo esc_url( $faq_url ); ?>" class="text-[#E8567A] font-semibold">FAQs page</a> or contact our customer service team.</p>
          </div>
        </div>

        <!-- CONTACT INFO -->
        <div id="contact-info" class="bg-[#F5E6DC] rounded-2xl p-8 lg:p-10 border border-[#F2A8BC]/40">
          <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Contact Information</p>
          <h2 class="text-[#2B2B2B] font-semibold text-xl mb-4" style="font-family:'Playfair Display',serif">Need Help With A Return?</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-white/70 rounded-xl p-5 border border-white/60">
              <p class="text-xs uppercase tracking-[0.12em] text-[#2B2B2B]/50 mb-1">Store Name</p>
              <p class="font-semibold text-[#2B2B2B]"><?php echo esc_html( $store_name ); ?></p>
            </div>
            <div class="bg-white/70 rounded-xl p-5 border border-white/60">
              <p class="text-xs uppercase tracking-[0.12em] text-[#2B2B2B]/50 mb-1">Website</p>
              <p class="font-semibold text-[#2B2B2B]"><?php echo esc_html( $website_domain ); ?></p>
            </div>
            <div class="bg-white/70 rounded-xl p-5 border border-white/60">
              <p class="text-xs uppercase tracking-[0.12em] text-[#2B2B2B]/50 mb-1">Email</p>
              <p class="font-semibold text-[#2B2B2B]"><?php echo esc_html( $support_email ); ?></p>
            </div>
            <div class="bg-white/70 rounded-xl p-5 border border-white/60">
              <p class="text-xs uppercase tracking-[0.12em] text-[#2B2B2B]/50 mb-1">Customer Service Hours</p>
              <p class="font-semibold text-[#2B2B2B]">Monday–Friday, 9:00 AM – 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)</p>
            </div>
          </div>

          <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed mb-6">
            We aim to reply within 1 business day. Please include your order number, the email used at checkout, and any photos or videos related to your return request.
          </p>

          <div class="flex flex-wrap gap-3">
            <a href="mailto:<?php echo esc_attr( $support_email ); ?>"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#2B2B2B] transition-colors duration-300">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <?php echo esc_html( $support_email ); ?>
            </a>
            <a href="<?php echo esc_url( $support_url ); ?>"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-[#2B2B2B] text-sm font-semibold rounded-full border border-[#E8567A]/30 hover:text-[#E8567A] transition-colors duration-300">
              Submit A Support Request
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>