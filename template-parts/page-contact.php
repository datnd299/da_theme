<?php
/**
 * Contact page template part - Shopshive
 * Sections: Hero - Contact Cards - Contact Form - FAQ Teaser - CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="Contact hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/20 to-[#E8567A]/10"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Get In Touch</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(40px,6vw,68px);font-weight:300">
      We'd Love To<br><em>Hear From You</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-xl leading-relaxed">
      Questions about your order, styling advice, or just want to say hello? Our team is always happy to help.
    </p>
  </div>
</section>

<!-- ===== CONTACT CARDS ===== -->
<section class="bg-[#FDF8F4] py-16 lg:py-20" aria-label="Contact information">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Email -->
      <div class="bg-white rounded-2xl p-7 shadow-sm border border-[#F5E6DC] hover:shadow-md hover:border-[#F2A8BC] transition-all duration-300 flex flex-col items-center text-center gap-4">
        <div class="w-14 h-14 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <div>
          <h3 class="font-semibold text-[#2B2B2B] mb-1" style="font-family:'Playfair Display',serif">Email Us</h3>
          <a href="mailto:support@shopshive.com" class="text-[14px] text-[#E8567A] font-medium hover:underline">support@shopshive.com</a>
          <p class="text-[12px] text-[#2B2B2B]/50 mt-1">We reply within 24 hours</p>
        </div>
      </div>

      <!-- Address -->
      <div class="bg-white rounded-2xl p-7 shadow-sm border border-[#F5E6DC] hover:shadow-md hover:border-[#F2A8BC] transition-all duration-300 flex flex-col items-center text-center gap-4">
        <div class="w-14 h-14 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div>
          <h3 class="font-semibold text-[#2B2B2B] mb-1" style="font-family:'Playfair Display',serif">Our Address</h3>
          <p class="text-[14px] text-[#2B2B2B]/65 leading-snug">885 Roselyn Lakes, South Vidashire, IL 37334</p>
        </div>
      </div>

      <!-- Hours -->
      <div class="bg-white rounded-2xl p-7 shadow-sm border border-[#F5E6DC] hover:shadow-md hover:border-[#F2A8BC] transition-all duration-300 flex flex-col items-center text-center gap-4">
        <div class="w-14 h-14 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div>
          <h3 class="font-semibold text-[#2B2B2B] mb-1" style="font-family:'Playfair Display',serif">Business Hours</h3>
          <p class="text-[14px] text-[#2B2B2B]/65 leading-snug">Monday - Saturday<br>10:00 AM - 6:00 PM PST</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== CONTACT FORM + SIDE INFO ===== -->
<section class="bg-[#FDF8F4] pb-20 lg:pb-28" aria-label="Send us a message">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 lg:gap-16">

      <!-- Form -->
      <div class="lg:col-span-3">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Send A Message</p>
        <h2 class="mb-8 text-[#2B2B2B] leading-tight"
            style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
          How Can We Help?
        </h2>
        <?php if ( function_exists('wpcf7') ) : ?>
        <div class="contact-form-2">
          <?php echo do_shortcode('[contact-form-7 id="04e6e73" title="Contact"]'); ?>
        </div>
        <?php else : ?>
        <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="space-y-5" novalidate>
          <?php wp_nonce_field('shopshive_contact', 'shopshive_contact_nonce'); ?>
          <input type="hidden" name="action" value="shopshive_contact">

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label for="cf-name" class="block text-[12px] font-semibold uppercase tracking-[0.12em] text-[#2B2B2B]/60 mb-2">Your Name <span class="text-[#E8567A]">*</span></label>
              <input id="cf-name" type="text" name="cf_name" required placeholder="e.g. Jane Smith"
                     class="w-full h-12 px-4 rounded-lg border border-[#D4B8A0] bg-white text-[14px] text-[#2B2B2B] placeholder-[#A89080]
                            focus:outline-none focus:border-[#E8567A] focus:ring-2 focus:ring-[#E8567A]/20 transition-colors duration-200">
            </div>
            <div>
              <label for="cf-email" class="block text-[12px] font-semibold uppercase tracking-[0.12em] text-[#2B2B2B]/60 mb-2">Email Address <span class="text-[#E8567A]">*</span></label>
              <input id="cf-email" type="email" name="cf_email" required placeholder="you@example.com"
                     class="w-full h-12 px-4 rounded-lg border border-[#D4B8A0] bg-white text-[14px] text-[#2B2B2B] placeholder-[#A89080]
                            focus:outline-none focus:border-[#E8567A] focus:ring-2 focus:ring-[#E8567A]/20 transition-colors duration-200">
            </div>
          </div>

          <div>
            <label for="cf-subject" class="block text-[12px] font-semibold uppercase tracking-[0.12em] text-[#2B2B2B]/60 mb-2">Subject</label>
            <select id="cf-subject" name="cf_subject"
                    class="w-full h-12 px-4 rounded-lg border border-[#D4B8A0] bg-white text-[14px] text-[#2B2B2B]
                           focus:outline-none focus:border-[#E8567A] focus:ring-2 focus:ring-[#E8567A]/20 transition-colors duration-200 appearance-none cursor-pointer">
              <option value="">Select a topic...</option>
              <option value="order">Order Status / Tracking</option>
              <option value="returns">Returns & Exchanges</option>
              <option value="product">Product Question</option>
              <option value="sizing">Sizing Help</option>
              <option value="payment">Payment Issue</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div>
            <label for="cf-order" class="block text-[12px] font-semibold uppercase tracking-[0.12em] text-[#2B2B2B]/60 mb-2">Order Number <span class="text-[#2B2B2B]/30">(optional)</span></label>
            <input id="cf-order" type="text" name="cf_order" placeholder="#12345"
                   class="w-full h-12 px-4 rounded-lg border border-[#D4B8A0] bg-white text-[14px] text-[#2B2B2B] placeholder-[#A89080]
                          focus:outline-none focus:border-[#E8567A] focus:ring-2 focus:ring-[#E8567A]/20 transition-colors duration-200">
          </div>

          <div>
            <label for="cf-message" class="block text-[12px] font-semibold uppercase tracking-[0.12em] text-[#2B2B2B]/60 mb-2">Message <span class="text-[#E8567A]">*</span></label>
            <textarea id="cf-message" name="cf_message" required rows="6" placeholder="Tell us how we can help you..."
                      class="w-full px-4 py-3 rounded-lg border border-[#D4B8A0] bg-white text-[14px] text-[#2B2B2B] placeholder-[#A89080] leading-relaxed resize-none
                             focus:outline-none focus:border-[#E8567A] focus:ring-2 focus:ring-[#E8567A]/20 transition-colors duration-200"></textarea>
          </div>

          <button type="submit"
                  class="inline-flex items-center gap-2 px-8 py-4 bg-[#E8567A] text-white text-sm font-semibold rounded-full
                         hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
            Send Message
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
          </button>
        </form>
        <?php endif; ?>
      </div>

      <!-- Side info -->
      <div class="lg:col-span-2 flex flex-col gap-8">

        <!-- Quick promises -->
        <div class="bg-[#F5E6DC] rounded-2xl p-8">
          <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Our Promise To You</p>
          <ul class="space-y-5">
            <li class="flex items-start gap-4">
              <div class="flex-shrink-0 w-9 h-9 rounded-full bg-white flex items-center justify-center mt-0.5">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <p class="font-semibold text-[14px] text-[#2B2B2B]">Reply within 24 hours</p>
                <p class="text-[13px] text-[#2B2B2B]/55 leading-snug mt-0.5">We read every message and respond promptly on business days.</p>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <div class="flex-shrink-0 w-9 h-9 rounded-full bg-white flex items-center justify-center mt-0.5">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <p class="font-semibold text-[14px] text-[#2B2B2B]">0-1 business day delivery estimate</p>
                <p class="text-[13px] text-[#2B2B2B]/55 leading-snug mt-0.5">Orders use a 2:00 PM PST cutoff, with 0-1 business day handling and 0 business day transit estimates.</p>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <div class="flex-shrink-0 w-9 h-9 rounded-full bg-white flex items-center justify-center mt-0.5">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <p class="font-semibold text-[14px] text-[#2B2B2B]">30-day mail returns</p>
                <p class="text-[13px] text-[#2B2B2B]/55 leading-snug mt-0.5">Returns and exchanges are accepted within 30 days for new, unused products.</p>
              </div>
            </li>
          </ul>
        </div>

        <!-- Social links -->
        <div class="bg-white rounded-2xl p-8 border border-[#F5E6DC]">
          <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Follow Us</p>
          <div class="flex flex-col gap-3">
            <a href="https://www.facebook.com/shopshivedotcom" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3 text-[14px] text-[#2B2B2B]/70 hover:text-[#E8567A] transition-colors duration-200 group">
              <div class="w-9 h-9 rounded-full bg-[#F5E6DC] group-hover:bg-[#F2A8BC]/30 flex items-center justify-center transition-colors duration-200 flex-shrink-0">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
              </div>
              <span>@shopshivedotcom</span>
            </a>
            <a href="https://www.pinterest.com/galgirlus/" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3 text-[14px] text-[#2B2B2B]/70 hover:text-[#E8567A] transition-colors duration-200 group">
              <div class="w-9 h-9 rounded-full bg-[#F5E6DC] group-hover:bg-[#F2A8BC]/30 flex items-center justify-center transition-colors duration-200 flex-shrink-0">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12c0 4.24 2.65 7.86 6.39 9.29-.09-.78-.17-1.98.04-2.83.18-.77 1.24-5.26 1.24-5.26s-.32-.63-.32-1.57c0-1.47.85-2.57 1.91-2.57.9 0 1.34.68 1.34 1.49 0 .91-.58 2.27-.88 3.53-.25 1.05.52 1.91 1.55 1.91 1.86 0 3.29-1.96 3.29-4.79 0-2.5-1.8-4.25-4.37-4.25-2.98 0-4.72 2.23-4.72 4.54 0 .9.35 1.86.78 2.39a.31.31 0 0 1 .07.3c-.08.33-.26 1.05-.29 1.2-.05.19-.16.23-.37.14-1.39-.65-2.26-2.68-2.26-4.32 0-3.51 2.55-6.74 7.35-6.74 3.86 0 6.86 2.75 6.86 6.42 0 3.83-2.41 6.91-5.76 6.91-1.13 0-2.19-.59-2.55-1.28l-.69 2.59c-.25.97-.93 2.18-1.39 2.92.05.01.1.02.15.02C17.52 22 22 17.52 22 12S17.52 2 12 2z"/></svg>
              </div>
              <span>@galgirlus</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ===== FAQ TEASER ===== -->
<section class="bg-[#F5E6DC] py-16 lg:py-20" aria-label="Quick answers">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-12">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Quick Answers</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        Common Questions
      </h2>
      <p class="mt-4 text-[14px] text-[#2B2B2B]/60 max-w-md mx-auto leading-relaxed">
        Find quick answers below - or reach out and we'll get back to you within 24 hours.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-4xl mx-auto mb-10">

      <?php
        $faqs = [
          ['q' => 'How long does shipping take?',         'a' => 'The current estimated delivery time is 0-1 business days for all destinations, based on a 2:00 PM PST cutoff.'],
          ['q' => 'Can I return or exchange my order?',   'a' => 'Yes - we accept returns and exchanges within 30 days of delivery for new, unused products.'],
          ['q' => 'How do I track my order?',             'a' => 'Once your order ships, you\'ll receive a tracking link via email. You can also use our Track Order page.'],
          ['q' => 'What payment methods do you accept?',  'a' => 'We accept all major credit cards (Visa, Mastercard, Amex, Discover) via our secure checkout.'],
        ];
        foreach ( $faqs as $faq ) :
      ?>
      <div class="bg-white rounded-xl p-6 shadow-sm border border-white hover:border-[#F2A8BC] hover:shadow-md transition-all duration-300">
        <h3 class="font-semibold text-[#2B2B2B] text-[15px] mb-2 flex items-start gap-2">
          <span class="flex-shrink-0 w-5 h-5 rounded-full bg-[#F5E6DC] flex items-center justify-center mt-0.5">
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
          </span>
          <?php echo esc_html($faq['q']); ?>
        </h3>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed pl-7"><?php echo esc_html($faq['a']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center">
      <a href="<?php echo esc_url( home_url('/faq/') ); ?>"
         class="inline-flex items-center gap-2 px-7 py-3.5 border border-[#E8567A] text-[#E8567A] text-sm font-semibold rounded-full hover:bg-[#E8567A] hover:text-white transition-all duration-300">
        View All FAQs
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="bg-[#2B2B2B] py-16 lg:py-20" aria-label="Shop now call to action">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12 text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#F2A8BC] mb-5">Explore The Store</p>
    <h2 class="mb-4 text-white leading-tight"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(32px,5vw,56px);font-weight:300">
      While You're Here -<br><em>Discover Something Beautiful</em>
    </h2>
    <p class="text-white/60 text-base mb-8 max-w-lg mx-auto leading-relaxed">
      Hundreds of styles, 0-1 business day delivery estimates, and 30-day returns. Fashion that truly opens doors.
    </p>
    <a href="<?php echo esc_url( home_url('/shop/') ); ?>"
       class="inline-flex items-center gap-2 px-8 py-4 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
      Shop The Collection
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>
