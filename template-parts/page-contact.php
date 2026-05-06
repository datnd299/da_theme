<?php
/**
 * Template Part: Contact Us Page
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
      <p class="text-[#E8470A] text-xs font-semibold uppercase tracking-widest mb-3">Customer Support</p>
      <h1 class="text-white text-[clamp(2rem,5vw,3.25rem)] font-bold leading-tight mb-5 max-w-[720px]">
        Contact Us
      </h1>
      <p class="text-slate-300 text-base leading-relaxed max-w-[600px] mb-8">
        At Elite Shop Express, customer satisfaction is our top priority. Our support team is ready to help with order questions, returns, product assistance, and anything else you need.
      </p>
      <div class="flex flex-wrap gap-3">
        <a href="mailto:support@eliteshopexpress.com"
           class="inline-flex items-center gap-2 bg-[#E8470A] hover:bg-[#C93D08] active:scale-[0.97] text-white font-semibold text-[0.9375rem] px-6 py-3 rounded-md min-h-[44px] transition-colors duration-150 no-underline">
          Email Us Now
        </a>
        <a href="tel:4072551197"
           class="inline-flex items-center gap-2 bg-transparent hover:bg-[#475569] border-2 border-slate-500 text-slate-300 font-semibold text-[0.9375rem] px-6 py-[10px] rounded-md min-h-[44px] transition-colors duration-150 no-underline">
          📞 407-255-1197
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

    <!-- Quick Contact Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mb-16">
      <?php
      $contact_cards = [
        [ 'icon' => '📧', 'label' => 'Email',          'value' => 'support@eliteshopexpress.com', 'href' => 'mailto:support@eliteshopexpress.com', 'sub' => 'Reply within 24–48 hours' ],
        [ 'icon' => '📞', 'label' => 'Phone',          'value' => '407-255-1197',                  'href' => 'tel:4072551197',                      'sub' => 'Tap to call us' ],
        [ 'icon' => '🕒', 'label' => 'Business Hours', 'value' => 'Mon – Fri, 9AM – 6PM CST',      'href' => null,                                  'sub' => 'Closed weekends & holidays' ],
        [ 'icon' => '📍', 'label' => 'Address',        'value' => '3589 South Orange Ave, Orlando, FL 32806', 'href' => null,                       'sub' => 'United States' ],
        [ 'icon' => '📦', 'label' => 'Track Order',    'value' => 'Track My Package',              'href' => home_url( '/track-order/' ),           'sub' => 'Real-time order status' ],
      ];
      foreach ( $contact_cards as $card ) : ?>
        <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-6">
          <p class="text-2xl mb-3 leading-none"><?php echo $card['icon']; ?></p>
          <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1"><?php echo esc_html( $card['label'] ); ?></p>
          <?php if ( $card['href'] ) : ?>
            <a href="<?php echo esc_url( $card['href'] ); ?>" class="text-[0.9375rem] font-semibold text-[#1B3A5C] underline break-all leading-snug"><?php echo esc_html( $card['value'] ); ?></a>
          <?php else : ?>
            <p class="text-[0.9375rem] font-semibold text-[#111111] leading-snug m-0"><?php echo esc_html( $card['value'] ); ?></p>
          <?php endif; ?>
          <p class="text-xs text-[#888888] mt-1 m-0"><?php echo esc_html( $card['sub'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Sections stack -->
    <div class="grid grid-cols-1 gap-16">

      <!-- ══════════════════════════════════════════ -->
      <!--  PART I: GET IN TOUCH                      -->
      <!-- ══════════════════════════════════════════ -->

      <div class="border-b border-[#E2E2E2] pb-4">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-1">Part I</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111]">Get in Touch</h2>
      </div>

      <!-- ── EMAIL SUPPORT ── -->
      <section id="email-support">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">📧 Email Support</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">General Inquiries & Order Support</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-4">
          For general inquiries, order support, or returns, please contact us at:
        </p>
        <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-6 flex gap-4 items-start mb-4">
          <span class="text-2xl flex-shrink-0">📧</span>
          <div>
            <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1">Email Address</p>
            <a href="mailto:support@eliteshopexpress.com" class="text-[0.9375rem] text-[#1B3A5C] font-semibold underline">support@eliteshopexpress.com</a>
          </div>
        </div>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75]">
          We aim to respond to all emails within <strong class="text-[#111111]">24–48 business hours</strong>.
        </p>
      </section>

      <!-- ── PHONE SUPPORT ── -->
      <section id="phone-support">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">📞 Phone Support</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Prefer to Speak With Us?</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-6">
          Give us a call and a member of our support team will be happy to assist you directly.
        </p>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(240px,1fr))] gap-4">

          <!-- Phone card -->
          <div class="border border-[#E2E2E2] rounded-md p-6 flex gap-4 items-start">
            <span class="text-[1.75rem] flex-shrink-0 leading-none mt-0.5">📞</span>
            <div>
              <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1">Phone Number</p>
              <a href="tel:4072551197" class="text-[1.125rem] font-bold text-[#E8470A]">407-255-1197</a>
              <p class="text-xs text-[#888888] mt-1 m-0">Tap to call on mobile</p>
            </div>
          </div>

          <!-- Hours card -->
          <div class="border border-[#E2E2E2] rounded-md p-6 flex gap-4 items-start">
            <span class="text-[1.75rem] flex-shrink-0 leading-none mt-0.5">🕒</span>
            <div>
              <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1">Business Hours</p>
              <p class="text-[0.9375rem] text-[#555555] leading-[1.5] m-0">Monday – Friday<br><strong class="text-[#111111]">9:00 AM – 6:00 PM (CST)</strong></p>
              <p class="text-xs text-[#888888] mt-1 m-0">Closed weekends & public holidays</p>
            </div>
          </div>

        </div>
      </section>

      <!-- ── BUSINESS ADDRESS ── -->
      <section id="business-address">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">📍 Business Address</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Our Location</h2>
        <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-6 flex gap-4 items-start">
          <span class="text-2xl flex-shrink-0">📍</span>
          <div>
            <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1">Elite Shop Express</p>
            <address class="text-[0.9375rem] text-[#555555] not-italic leading-[1.75] m-0">
              3589 South Orange Avenue<br>
              Orlando, FL 32806<br>
              United States
            </address>
          </div>
        </div>
      </section>

      <!-- ══════════════════════════════════════════ -->
      <!--  PART II: CONTACT FORM                     -->
      <!-- ══════════════════════════════════════════ -->

      <div class="border-b border-[#E2E2E2] pb-4">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-1">Part II</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111]">Send Us a Message</h2>
      </div>

      <!-- ── CONTACT FORM ── -->
      <section id="contact-form">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">✉️ Contact Form</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-2">We'll Get Back to You ASAP</h2>
        <p class="text-[0.9375rem] text-[#555555] mb-8">Fill out the form below and our team will respond as soon as possible.</p>

        <?php if ( function_exists( 'wpcf7_contact_form' ) ) : ?>
          <!-- If Contact Form 7 is installed, output a shortcode -->
          <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-8">
            <?php echo do_shortcode( '[contact-form-7 id="1" title="Contact form 1"]' ); ?>
          </div>
        <?php else : ?>
          <!-- Fallback native HTML form -->
          <form id="contact-form-main" method="post" action="#contact-form" class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-8 grid gap-5">
            <?php wp_nonce_field( 'elite_contact_form', 'elite_contact_nonce' ); ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label for="contact-name" class="block text-[0.875rem] font-semibold text-[#111111] mb-1.5">
                  Your Name <span class="text-[#E8470A]">*</span>
                </label>
                <input
                  type="text"
                  id="contact-name"
                  name="contact_name"
                  required
                  placeholder="John Smith"
                  class="w-full border border-[#E2E2E2] rounded-md px-4 py-3 text-[0.9375rem] text-[#111111] bg-white placeholder-[#888888] focus:outline-none focus:border-[#1B3A5C] focus:ring-2 focus:ring-[#1B3A5C]/20 transition-colors duration-150 min-h-[44px]"
                >
              </div>
              <div>
                <label for="contact-email" class="block text-[0.875rem] font-semibold text-[#111111] mb-1.5">
                  Email Address <span class="text-[#E8470A]">*</span>
                </label>
                <input
                  type="email"
                  id="contact-email"
                  name="contact_email"
                  required
                  placeholder="you@example.com"
                  class="w-full border border-[#E2E2E2] rounded-md px-4 py-3 text-[0.9375rem] text-[#111111] bg-white placeholder-[#888888] focus:outline-none focus:border-[#1B3A5C] focus:ring-2 focus:ring-[#1B3A5C]/20 transition-colors duration-150 min-h-[44px]"
                >
              </div>
            </div>

            <div>
              <label for="contact-order" class="block text-[0.875rem] font-semibold text-[#111111] mb-1.5">
                Order Number <span class="text-[#888888] font-normal">(if applicable)</span>
              </label>
              <input
                type="text"
                id="contact-order"
                name="contact_order"
                placeholder="#12345"
                class="w-full border border-[#E2E2E2] rounded-md px-4 py-3 text-[0.9375rem] text-[#111111] bg-white placeholder-[#888888] focus:outline-none focus:border-[#1B3A5C] focus:ring-2 focus:ring-[#1B3A5C]/20 transition-colors duration-150 min-h-[44px]"
              >
            </div>

            <div>
              <label for="contact-message" class="block text-[0.875rem] font-semibold text-[#111111] mb-1.5">
                Your Message <span class="text-[#E8470A]">*</span>
              </label>
              <textarea
                id="contact-message"
                name="contact_message"
                required
                rows="6"
                placeholder="Tell us how we can help..."
                class="w-full border border-[#E2E2E2] rounded-md px-4 py-3 text-[0.9375rem] text-[#111111] bg-white placeholder-[#888888] focus:outline-none focus:border-[#1B3A5C] focus:ring-2 focus:ring-[#1B3A5C]/20 transition-colors duration-150 resize-y"
              ></textarea>
            </div>

            <div class="flex flex-wrap gap-4 items-center justify-between">
              <button
                type="submit"
                id="contact-submit"
                class="inline-flex items-center gap-2 bg-[#E8470A] hover:bg-[#C93D08] active:scale-[0.97] text-white font-semibold text-[0.9375rem] px-8 py-3 rounded-md min-h-[44px] transition-colors duration-150 cursor-pointer border-none"
              >
                Send Message →
              </button>
              <p class="text-xs text-[#888888] m-0">We respond within 24–48 business hours</p>
            </div>
          </form>
        <?php endif; ?>
      </section>

      <!-- ══════════════════════════════════════════ -->
      <!--  PART III: HELPFUL LINKS & SOCIAL          -->
      <!-- ══════════════════════════════════════════ -->

      <div class="border-b border-[#E2E2E2] pb-4">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-1">Part III</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111]">Need Help Faster?</h2>
      </div>

      <!-- ── SELF-HELP RESOURCES ── -->
      <section id="self-help">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">🔍 Self-Help Resources</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Find Answers Instantly</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-6">
          Before contacting us, you may find quick answers to common questions in one of these sections:
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <?php
          $help_links = [
            [
              'icon'  => '🚚',
              'title' => 'Shipping & Returns',
              'desc'  => 'Learn about processing times, delivery windows, free shipping, and our 30-day return policy.',
              'url'   => home_url( '/shipping-returns/' ),
              'cta'   => 'View Shipping Policy',
            ],
            [
              'icon'  => '❓',
              'title' => 'FAQ',
              'desc'  => 'Get instant answers to the most common questions about orders, payments, delivery, and returns.',
              'url'   => home_url( '/faq/' ),
              'cta'   => 'Browse FAQs',
            ],
            [
              'icon'  => '📋',
              'title' => 'Terms & Conditions',
              'desc'  => 'Read our full terms of service, purchase agreement, and legal policies.',
              'url'   => home_url( '/terms-and-conditions/' ),
              'cta'   => 'Read Terms',
            ],
            [
              'icon'  => '🛒',
              'title' => 'Browse Our Shop',
              'desc'  => 'Find the perfect product for your home, garden, pet, or vehicle at the best price.',
              'url'   => home_url( '/shop/' ),
              'cta'   => 'Shop Now',
            ],
          ];
          foreach ( $help_links as $link ) : ?>
            <div class="border border-[#E2E2E2] rounded-md p-6 flex flex-col gap-3">
              <span class="text-2xl leading-none"><?php echo $link['icon']; ?></span>
              <div class="flex-1">
                <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1"><?php echo esc_html( $link['title'] ); ?></p>
                <p class="text-sm text-[#555555] leading-[1.65] m-0"><?php echo esc_html( $link['desc'] ); ?></p>
              </div>
              <a href="<?php echo esc_url( $link['url'] ); ?>" class="text-[0.875rem] font-semibold text-[#1B3A5C] underline hover:text-[#E8470A] transition-colors duration-150">
                <?php echo esc_html( $link['cta'] ); ?> →
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ── STAY CONNECTED ── -->
      <section id="stay-connected" class="bg-[#1B3A5C] rounded-md px-8 py-10">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">🔗 Stay Connected</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-white mb-4">Follow Us on Facebook</h2>
        <p class="text-base text-slate-300 leading-[1.75] mb-6 max-w-[580px]">
          Stay updated with our latest products, exclusive promotions, and announcements. Follow us on Facebook and join our growing community.
        </p>
        <a href="https://www.facebook.com/eliteshopexpress/"
           target="_blank"
           rel="noopener noreferrer"
           class="inline-flex items-center gap-2 bg-[#1877F2] hover:opacity-90 active:scale-[0.97] text-white font-semibold text-[0.9375rem] px-6 py-3 rounded-md min-h-[44px] transition-opacity duration-150 no-underline">
          👍 facebook.com/eliteshopexpress
        </a>
      </section>

    </div><!-- /sections stack -->
  </div><!-- /container -->

  <!-- ░░ BOTTOM CTA BAND ░░ -->
  <div class="bg-[#E8470A] py-12 px-6 text-center">
    <div class="max-w-[640px] mx-auto">
      <h2 class="text-[clamp(1.5rem,3vw,2rem)] font-bold text-white mb-3">We're Here for You</h2>
      <p class="text-base text-white/85 mb-7">At Elite Shop Express, every customer matters. Your questions and feedback help us serve you better.</p>
      <div class="flex flex-wrap gap-3 justify-center">
        <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"
           class="inline-flex items-center gap-2 bg-white hover:opacity-90 text-[#E8470A] font-bold text-[0.9375rem] px-8 py-3.5 rounded-md no-underline min-h-[44px] transition-opacity duration-150">
          Browse All Products →
        </a>
        <a href="mailto:support@eliteshopexpress.com"
           class="inline-flex items-center gap-2 bg-transparent border-2 border-white/70 hover:border-white text-white font-semibold text-[0.9375rem] px-6 py-3 rounded-md no-underline min-h-[44px] transition-colors duration-150">
          Email Support
        </a>
      </div>
    </div>
  </div>

</div><!-- /contact-page -->
