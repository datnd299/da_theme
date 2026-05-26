<?php
/**
 * FAQ page template part — Shopshive
 * Sections: Hero · Category Tabs · Accordion FAQ · Contact Strip · CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="FAQ hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/20 to-[#E8567A]/10"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Help Center</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(40px,6vw,68px);font-weight:300">
      Frequently Asked<br><em>Questions</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-xl leading-relaxed mb-10">
      Everything you need to know about shopping with Shopshive — from orders and shipping to returns and sizing.
    </p>
    <a href="<?php echo esc_url( home_url('/contact/') ); ?>"
       class="inline-flex items-center gap-2 px-7 py-3.5 border border-[#E8567A] text-[#E8567A] text-sm font-semibold rounded-full hover:bg-[#E8567A] hover:text-white transition-all duration-300">
      Still Have Questions? Contact Us
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>

<!-- ===== FAQ ACCORDION ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Frequently asked questions">
  <div class="max-w-[860px] mx-auto px-6 lg:px-12">

    <?php
      $faq_groups = [
        [
          'category' => 'Shipping & Delivery',
          'icon'     => '<path d="M1 3h15v13H1z"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>',
          'items'    => [
            [
              'q' => 'What is your delivery estimate?',
              'a' => 'The current estimated delivery time is 0-1 business days for all destinations within the United States. Delivery estimates may move to the next eligible business day after cutoff times, public holidays, or carrier exceptions.',
            ],
            [
              'q' => 'What is the order cutoff time?',
              'a' => 'The order cutoff time is 2:00 PM Pacific Standard Time (Los Angeles). Orders placed after that cutoff may be handled on the next eligible business day.',
            ],
            [
              'q' => 'How long is handling and transit time?',
              'a' => 'Handling time is 0-1 business days, fulfilled Monday through Saturday. Carrier transit time is currently estimated at 0 business days for all destinations.',
            ],
            [
              'q' => 'Do you ship internationally?',
              'a' => 'Currently we ship within the United States only. We\'re working on expanding internationally — stay tuned by following us on Facebook and Pinterest for updates.',
            ],
            [
              'q' => 'How do I track my order?',
              'a' => 'Once your order ships, you\'ll receive a confirmation email with your tracking number and a direct link to follow your package. You can also visit our Track Order page anytime and enter your order number.',
            ],
            [
              'q' => 'My package shows delivered but I haven\'t received it. What should I do?',
              'a' => 'We\'re sorry to hear that! Please first check around your property and with neighbors or building management. If it\'s still missing after 24 hours, email us at support@shopshive.com and we\'ll investigate right away.',
            ],
          ],
        ],
        [
          'category' => 'Returns & Exchanges',
          'icon'     => '<polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/>',
          'items'    => [
            [
              'q' => 'What is your return policy?',
              'a' => 'We accept returns for defective and non-defective products within 30 days of delivery. Products must be new, unused, and in their original condition with packaging and tags intact.',
            ],
            [
              'q' => 'How do I start a return or exchange?',
              'a' => 'Email support@shopshive.com with your order number and reason for return or exchange. Our team will provide mail return instructions and a download-and-print return label.',
            ],
            [
              'q' => 'Who pays for the return label?',
              'a' => 'Returns are accepted by mail. Return labels are download-and-print labels, and return label cost is the customer\'s responsibility unless support confirms otherwise.',
            ],
            [
              'q' => 'When will I receive my refund?',
              'a' => 'Refunds are processed within 10 days after your returned item is received and inspected. There is no restocking fee.',
            ],
            [
              'q' => 'Can I exchange for a different size or color?',
              'a' => 'Yes. We accept exchanges on eligible items within 30 days of delivery, subject to stock availability and the item being new and unused.',
            ],
          ],
        ],
        [
          'category' => 'Orders & Payment',
          'icon'     => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
          'items'    => [
            [
              'q' => 'What payment methods do you accept?',
              'a' => 'We accept all major credit and debit cards including Visa, Mastercard, American Express, and Discover. All transactions are encrypted and processed through our secure checkout.',
            ],
            [
              'q' => 'Can I modify or cancel my order after placing it?',
              'a' => 'We process orders quickly, so please contact us immediately at support@shopshive.com if you need to modify or cancel. If your order has already shipped, you\'ll need to use our return process instead.',
            ],
            [
              'q' => 'I entered the wrong shipping address. What can I do?',
              'a' => 'Contact us right away at support@shopshive.com with your order number and the correct address. If your order hasn\'t shipped yet, we can update it at no charge. Once shipped, unfortunately we cannot reroute it.',
            ],
            [
              'q' => 'My order says "processing" for a long time. Is this normal?',
              'a' => 'Orders are prepared for shipment within 0-1 business days, Monday through Saturday. If your order has been processing longer than expected, please reach out and we\'ll look into it right away.',
            ],
            [
              'q' => 'Will I receive an order confirmation?',
              'a' => 'Yes — you\'ll receive an order confirmation email immediately after placing your order. If you don\'t see it within a few minutes, please check your spam folder or contact us at support@shopshive.com.',
            ],
          ],
        ],
        [
          'category' => 'Sizing & Products',
          'icon'     => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>',
          'items'    => [
            [
              'q' => 'How do I find my correct size?',
              'a' => 'Each product page includes a detailed size guide with measurements. We recommend measuring your bust, waist, and hips and comparing them to our size chart. When in doubt between two sizes, we suggest sizing up for a more comfortable fit.',
            ],
            [
              'q' => 'Do your clothes run true to size?',
              'a' => 'Most of our styles run true to size, but this can vary by cut and fabric. We note any fit variations (e.g., "runs small" or "oversized") directly on the product page. Customer reviews also often mention sizing tips.',
            ],
            [
              'q' => 'Are the colors accurate in the photos?',
              'a' => 'We photograph all items in natural light to show colors as accurately as possible. However, monitor settings can slightly affect how colors appear on screen. If you\'re unsure about a color, feel free to email us for more details.',
            ],
            [
              'q' => 'How should I care for my Shopshive clothing?',
              'a' => 'Care instructions are printed on the label inside each garment and also listed on the product page. We generally recommend cold machine wash and air dry to preserve the shape, color, and quality of your pieces.',
            ],
            [
              'q' => 'An item I want is out of stock. Will it be restocked?',
              'a' => 'We restock popular items regularly. If an item you love is out of stock, email us at support@shopshive.com with the product name and size — we\'ll notify you as soon as it\'s back, or suggest similar styles you might love.',
            ],
          ],
        ],
        [
          'category' => 'General',
          'icon'     => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
          'items'    => [
            [
              'q' => 'How can I contact Shopshive customer support?',
              'a' => 'You can reach us by email at support@shopshive.com. We\'re available Monday through Saturday, 10:00 AM to 6:00 PM PST. We aim to respond to all emails within 24 hours.',
            ],
            [
              'q' => 'Do I need an account to shop?',
              'a' => 'No — you can check out as a guest. However, creating an account lets you track your orders, save your details for faster checkout, and view your order history all in one place.',
            ],
            [
              'q' => 'Is my personal information safe?',
              'a' => 'Absolutely. We take privacy seriously and use industry-standard SSL encryption to protect your personal and payment information. We never sell or share your data with third parties. View our Privacy Policy for full details.',
            ],
            [
              'q' => 'Do you have a physical store I can visit?',
              'a' => 'We are an online-only retailer. This allows us to offer a wider selection and better prices without the overhead of a physical location. Our full catalog is always available at shopshive.com.',
            ],
            [
              'q' => 'How do I stay updated on new arrivals and promotions?',
              'a' => 'Follow us on Facebook at @shopshivedotcom and Pinterest at @galgirlus for the latest arrivals, style inspiration, and exclusive promotions. You can also sign up for our newsletter at checkout.',
            ],
          ],
        ],
      ];
    ?>

    <?php foreach ( $faq_groups as $group_index => $group ) : ?>

    <!-- Category heading -->
    <div class="<?php echo $group_index > 0 ? 'mt-14' : ''; ?> mb-6">
      <div class="flex items-center gap-3 mb-1">
        <div class="w-9 h-9 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $group['icon']; ?>
          </svg>
        </div>
        <h2 class="text-[#2B2B2B] font-semibold"
            style="font-family:'Playfair Display',serif;font-size:clamp(18px,2.5vw,24px)">
          <?php echo esc_html( $group['category'] ); ?>
        </h2>
      </div>
      <div class="h-px bg-[#D4B8A0]/60 mt-4"></div>
    </div>

    <!-- Accordion items -->
    <div class="space-y-3">
      <?php foreach ( $group['items'] as $item_index => $item ) :
        $item_id = 'faq-' . $group_index . '-' . $item_index;
      ?>
      <div class="faq-item bg-white rounded-xl border border-[#F5E6DC] overflow-hidden hover:border-[#F2A8BC] transition-colors duration-200">
        <button
          type="button"
          class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left"
          aria-expanded="false"
          aria-controls="<?php echo esc_attr($item_id); ?>"
        >
          <span class="font-semibold text-[#2B2B2B] text-[15px] leading-snug">
            <?php echo esc_html( $item['q'] ); ?>
          </span>
          <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-full bg-[#F5E6DC] flex items-center justify-center transition-all duration-300">
            <svg class="faq-plus" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <svg class="faq-minus hidden" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/></svg>
          </span>
        </button>
        <div
          id="<?php echo esc_attr($item_id); ?>"
          class="faq-panel hidden px-6 pb-5"
          role="region"
        >
          <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed border-t border-[#F5E6DC] pt-4">
            <?php echo esc_html( $item['a'] ); ?>
          </p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <?php endforeach; ?>

  </div>
</section>

<!-- ===== CONTACT STRIP ===== -->
<section class="bg-[#F5E6DC] py-16 lg:py-20" aria-label="Contact support">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-12">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Need More Help?</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        We're Here For You
      </h2>
      <p class="mt-4 text-[14px] text-[#2B2B2B]/60 max-w-md mx-auto leading-relaxed">
        Didn't find what you were looking for? Our friendly team is happy to help — reach out any time.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">

      <div class="bg-white rounded-2xl p-7 shadow-sm flex flex-col items-center text-center gap-4 hover:shadow-md transition-shadow duration-300">
        <div class="w-14 h-14 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.9h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <div>
          <h3 class="font-semibold text-[#2B2B2B] mb-1" style="font-family:'Playfair Display',serif">Business Hours</h3>
          <p class="text-[12px] text-[#2B2B2B]/50 mt-1">Mon – Sat, 10 AM – 6 PM PST</p>
        </div>
      </div>

      <div class="bg-white rounded-2xl p-7 shadow-sm flex flex-col items-center text-center gap-4 hover:shadow-md transition-shadow duration-300">
        <div class="w-14 h-14 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <div>
          <h3 class="font-semibold text-[#2B2B2B] mb-1" style="font-family:'Playfair Display',serif">Email Us</h3>
          <a href="mailto:support@shopshive.com" class="text-[14px] text-[#E8567A] font-medium hover:underline">support@shopshive.com</a>
          <p class="text-[12px] text-[#2B2B2B]/50 mt-1">We reply within 24 hours</p>
        </div>
      </div>

      <div class="bg-white rounded-2xl p-7 shadow-sm flex flex-col items-center text-center gap-4 hover:shadow-md transition-shadow duration-300">
        <div class="w-14 h-14 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <div>
          <h3 class="font-semibold text-[#2B2B2B] mb-1" style="font-family:'Playfair Display',serif">Send A Message</h3>
          <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="text-[14px] text-[#E8567A] font-medium hover:underline">Contact Form</a>
          <p class="text-[12px] text-[#2B2B2B]/50 mt-1">Quick &amp; easy online form</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="bg-[#2B2B2B] py-16 lg:py-20" aria-label="Shop now call to action">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12 text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#F2A8BC] mb-5">Keep Exploring</p>
    <h2 class="mb-4 text-white leading-tight"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(32px,5vw,56px);font-weight:300">
      Ready To Find Your<br><em>Next Favorite Look?</em>
    </h2>
    <p class="text-white/60 text-base mb-8 max-w-lg mx-auto leading-relaxed">
      Hundreds of styles, 0-1 business day delivery estimates, and 30-day returns.
    </p>
    <a href="<?php echo esc_url( home_url('/shop/') ); ?>"
       class="inline-flex items-center gap-2 px-8 py-4 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
      Shop The Collection
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>

<script>
(function () {
  document.querySelectorAll('.faq-trigger').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item    = btn.closest('.faq-item');
      var panel   = item.querySelector('.faq-panel');
      var plus    = btn.querySelector('.faq-plus');
      var minus   = btn.querySelector('.faq-minus');
      var open    = btn.getAttribute('aria-expanded') === 'true';

      // Close all others
      document.querySelectorAll('.faq-item').forEach(function (other) {
        if (other !== item) {
          other.querySelector('.faq-trigger').setAttribute('aria-expanded', 'false');
          other.querySelector('.faq-panel').classList.add('hidden');
          other.querySelector('.faq-plus').classList.remove('hidden');
          other.querySelector('.faq-minus').classList.add('hidden');
          other.querySelector('.faq-icon').classList.remove('bg-[#E8567A]');
          other.querySelector('.faq-plus').setAttribute('stroke', '#E8567A');
        }
      });

      // Toggle current
      if (open) {
        btn.setAttribute('aria-expanded', 'false');
        panel.classList.add('hidden');
        plus.classList.remove('hidden');
        minus.classList.add('hidden');
        btn.querySelector('.faq-icon').classList.remove('bg-[#E8567A]');
      } else {
        btn.setAttribute('aria-expanded', 'true');
        panel.classList.remove('hidden');
        plus.classList.add('hidden');
        minus.classList.remove('hidden');
        btn.querySelector('.faq-icon').classList.add('bg-[#E8567A]');
        minus.setAttribute('stroke', '#fff');
      }
    });
  });
})();
</script>
