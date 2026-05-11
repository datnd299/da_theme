<?php
/**
 * Privacy Policy template part — Shopshive
 * Sections: Hero · Last Updated · TOC Sidebar · Policy Content · Contact CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="Privacy policy hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/25 to-[#E8567A]/15"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Legal</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(36px,5.5vw,64px);font-weight:300">
      Privacy <em>Policy</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-2xl leading-relaxed">
      Your privacy is important to us. This policy explains what data we collect, how we use it, and the choices you have when you shop with Shopshive.
    </p>

    <!-- Quick highlights -->
    <div class="mt-10 flex flex-wrap justify-center gap-4">
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Your Data Is Secure</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Full Transparency</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">You're In Control</span>
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
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Privacy policy content">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">

    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-12 lg:gap-16 items-start">

      <!-- Sidebar TOC -->
      <aside class="hidden lg:block" aria-label="Table of contents">
        <div class="sticky top-8 bg-white rounded-2xl p-6 shadow-sm border border-[#F5E6DC]">
          <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#E8567A] mb-5">Contents</p>
          <nav>
            <ol class="space-y-2.5">
              <?php
                $toc = [
                  '1. Introduction',
                  '2. Information We Collect',
                  '3. How We Use Your Information',
                  '4. Sharing &amp; Disclosure',
                  '5. Cookies &amp; Tracking',
                  '6. Data Security',
                  '7. Data Retention',
                  '8. Your Rights &amp; Choices',
                  '9. Children\'s Privacy',
                  '10. Third-Party Links',
                  '11. Changes to This Policy',
                  '12. Contact Us',
                ];
                $anchors = [
                  'introduction','information-we-collect','how-we-use',
                  'sharing-disclosure','cookies-tracking','data-security',
                  'data-retention','your-rights','childrens-privacy',
                  'third-party-links','policy-changes','contact',
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

      <!-- Policy Sections -->
      <div class="space-y-10">

        <!-- 1. Introduction -->
        <div id="introduction" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">01</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Introduction</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>Welcome to Shopshive ("we," "us," or "our"). We operate the website <strong class="text-[#2B2B2B]">shopshive.com</strong> (the "Site") and are committed to protecting your personal information and your right to privacy.</p>
            <p>This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our Site or make a purchase. Please read it carefully. If you disagree with its terms, please discontinue use of the Site.</p>
            <p>We reserve the right to make changes to this policy at any time. We will notify you of significant changes by updating the "Last Updated" date at the top of this page.</p>
          </div>
        </div>

        <!-- 2. Information We Collect -->
        <div id="information-we-collect" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">02</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Information We Collect</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p><strong class="text-[#2B2B2B]">Information you provide directly:</strong></p>
            <ul class="space-y-2 ml-4">
              <?php
                $direct = [
                  'Name, email address, phone number, and billing/shipping address when you place an order or create an account',
                  'Payment information (processed securely by our payment provider — we do not store full card details)',
                  'Messages and attachments you send via our contact form or support email',
                  'Reviews, feedback, or survey responses you submit voluntarily',
                ];
                foreach ( $direct as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <p><strong class="text-[#2B2B2B]">Information collected automatically:</strong></p>
            <ul class="space-y-2 ml-4">
              <?php
                $automatic = [
                  'IP address, browser type, operating system, and device identifiers',
                  'Pages visited, time spent on the Site, referring URLs, and click patterns',
                  'Cookie data and similar tracking technologies (see Section 5)',
                  'Purchase history and wishlist activity',
                ];
                foreach ( $automatic as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- 3. How We Use Your Information -->
        <div id="how-we-use" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">03</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">How We Use Your Information</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We use the information we collect to:</p>
            <ul class="space-y-2 ml-4">
              <?php
                $uses = [
                  'Process, fulfill, and ship your orders — and send you order confirmations and updates',
                  'Manage your account and provide customer support',
                  'Send transactional emails (receipts, shipping notifications, return confirmations)',
                  'Send promotional emails and newsletters if you have opted in (you may opt out at any time)',
                  'Personalize your shopping experience and recommend products you may love',
                  'Improve our Site, detect fraud, and monitor security',
                  'Comply with legal obligations and enforce our Terms & Conditions',
                ];
                foreach ( $uses as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <p>We will never sell your personal information to third parties for their own marketing purposes.</p>
          </div>
        </div>

        <!-- 4. Sharing & Disclosure -->
        <div id="sharing-disclosure" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">04</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Sharing &amp; Disclosure</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We may share your information only in the following circumstances:</p>
            <ul class="space-y-2 ml-4">
              <?php
                $sharing = [
                  'Service providers — shipping carriers, payment processors, and email platforms who assist us in operating our business, subject to confidentiality agreements',
                  'Analytics providers — we use anonymized or aggregated data to understand how our Site is used',
                  'Legal compliance — if required by law, regulation, court order, or to protect the rights and safety of Shopshive, our customers, or others',
                  'Business transfers — in the event of a merger, acquisition, or sale of assets, your information may be transferred as part of that transaction',
                ];
                foreach ( $sharing as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <p>In all cases, we share only the minimum information necessary and require recipients to protect your data in accordance with applicable law.</p>
          </div>
        </div>

        <!-- 5. Cookies & Tracking -->
        <div id="cookies-tracking" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">05</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Cookies &amp; Tracking Technologies</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We use cookies and similar technologies to improve your browsing experience, remember your preferences, and analyze Site traffic. The types of cookies we use include:</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
              <?php
                $cookies = [
                  ['Essential', 'Required for the Site to function — shopping cart, login sessions, and security.'],
                  ['Analytics', 'Help us understand how visitors interact with the Site (e.g., Google Analytics).'],
                  ['Functional', 'Remember your preferences such as currency, language, or recently viewed items.'],
                  ['Marketing', 'Used to deliver relevant ads and track campaign effectiveness. Only with your consent.'],
                ];
                foreach ( $cookies as $c ) :
              ?>
              <div class="bg-[#FDF8F4] rounded-xl p-4 border border-[#F5E6DC]">
                <p class="text-xs font-bold text-[#E8567A] uppercase tracking-wider mb-1"><?php echo esc_html($c[0]); ?></p>
                <p class="text-[13px] text-[#2B2B2B]/65 leading-snug"><?php echo esc_html($c[1]); ?></p>
              </div>
              <?php endforeach; ?>
            </div>
            <p>You can control cookies through your browser settings. Disabling certain cookies may affect Site functionality. By continuing to use our Site, you consent to our use of cookies as described here.</p>
          </div>
        </div>

        <!-- 6. Data Security -->
        <div id="data-security" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">06</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Data Security</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We take the security of your personal information seriously. We implement a variety of technical and organizational measures to protect your data, including:</p>
            <ul class="space-y-2 ml-4">
              <?php
                $security = [
                  'SSL/TLS encryption for all data transmitted between your browser and our servers',
                  'Secure, PCI-compliant payment processing — we never store full credit card numbers',
                  'Access controls that limit who within our organization can view your information',
                  'Regular security assessments and monitoring of our systems',
                ];
                foreach ( $security as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <p>Despite our efforts, no method of transmission over the internet or electronic storage is 100% secure. We cannot guarantee absolute security, and you share information with us at your own risk.</p>
          </div>
        </div>

        <!-- 7. Data Retention -->
        <div id="data-retention" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">07</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Data Retention</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We retain your personal information for as long as necessary to fulfill the purposes described in this policy, including:</p>
            <ul class="space-y-2 ml-4">
              <?php
                $retention = [
                  'Order and transaction records — kept for up to 7 years to comply with tax and accounting regulations',
                  'Account information — retained for as long as your account is active, or as needed to provide services',
                  'Marketing consent records — kept until you withdraw consent',
                  'Customer support communications — retained for up to 3 years',
                ];
                foreach ( $retention as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <p>When your data is no longer needed, we securely delete or anonymize it.</p>
          </div>
        </div>

        <!-- 8. Your Rights & Choices -->
        <div id="your-rights" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">08</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Your Rights &amp; Choices</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>Depending on your location, you may have the following rights regarding your personal information:</p>
            <ul class="space-y-2 ml-4">
              <?php
                $rights = [
                  'Access — request a copy of the personal information we hold about you',
                  'Correction — ask us to correct inaccurate or incomplete information',
                  'Deletion — request that we delete your personal information, subject to legal obligations',
                  'Portability — receive your data in a structured, machine-readable format',
                  'Opt-out of marketing — unsubscribe from promotional emails at any time via the link in any email or by contacting us',
                  'Withdraw consent — where processing is based on consent, you may withdraw it at any time',
                ];
                foreach ( $rights as $item ) :
              ?>
              <li class="flex items-start gap-3">
                <span class="flex-shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-[#E8567A]/50"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <p>To exercise any of these rights, please contact us at <a href="mailto:support@shopshive.com" class="text-[#E8567A] hover:underline">support@shopshive.com</a>. We will respond within 30 days.</p>
          </div>
        </div>

        <!-- 9. Children's Privacy -->
        <div id="childrens-privacy" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">09</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Children's Privacy</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>Our Site is not directed to children under the age of <strong class="text-[#2B2B2B]">13</strong>, and we do not knowingly collect personal information from anyone under 13 years of age.</p>
            <p>If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately at <a href="mailto:support@shopshive.com" class="text-[#E8567A] hover:underline">support@shopshive.com</a>. We will take prompt steps to delete such information from our records.</p>
          </div>
        </div>

        <!-- 10. Third-Party Links -->
        <div id="third-party-links" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">10</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Third-Party Links</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>Our Site may contain links to third-party websites such as our social media pages (Facebook, Pinterest) or partner services. These sites have their own privacy policies, and we have no control over their content or practices.</p>
            <p>We are not responsible for the privacy practices of any third-party sites and encourage you to review their policies before providing any personal information.</p>
          </div>
        </div>

        <!-- 11. Changes to This Policy -->
        <div id="policy-changes" class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-[#F5E6DC]">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">11</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Changes to This Policy</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>We may update this Privacy Policy from time to time to reflect changes in our practices, technology, or legal requirements. When we make changes, we will revise the "Last Updated" date at the top of this page.</p>
            <p>For significant changes, we may also notify you via email or a prominent notice on our Site. Your continued use of the Site following the posting of any changes constitutes your acceptance of the updated policy.</p>
          </div>
        </div>

        <!-- 12. Contact Us -->
        <div id="contact" class="bg-[#F5E6DC] rounded-2xl p-8 lg:p-10 border border-[#F2A8BC]/40">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-10 h-10 rounded-full bg-[#E8567A]/15 flex items-center justify-center flex-shrink-0">
              <span class="text-xs font-bold text-[#E8567A]">12</span>
            </div>
            <h2 class="text-[#2B2B2B] font-semibold text-xl" style="font-family:'Playfair Display',serif">Contact Us</h2>
          </div>
          <div class="text-[14px] text-[#2B2B2B]/70 leading-relaxed space-y-4">
            <p>If you have questions, concerns, or requests related to this Privacy Policy or your personal data, please reach out to us:</p>
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
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/70 mb-4">Privacy Questions?</p>
        <h2 class="mb-4 text-white leading-tight"
            style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(28px,4vw,48px);font-weight:300">
          We Value Your Privacy
        </h2>
        <p class="text-white/80 text-[15px] mb-10 max-w-lg mx-auto leading-relaxed">
          Our team is happy to answer any questions about how we handle your data. Reach out Monday through Saturday, 10:00 AM – 6:00 PM PST.
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
