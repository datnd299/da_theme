<?php
/**
 * Terms & Conditions template part.
 *
 * @package dawp
 */

$store_name      = 'Meridova';
$site_url        = 'meridova.net';
$support_email   = 'support@meridova.net';
$support_address = dawp_get_store_address();
$contact_url     = home_url('/contact-us/');
$shipping_url    = home_url('/shipping-policy/');
$return_url      = home_url('/return-refund-policy/');
$privacy_url     = home_url('/privacy-policy/');
?>

<style>
  .ese-page { --ese-blue:#2563eb; --ese-cyan:#06b6d4; --ese-lime:#a3e635; --ese-ink:#101828; --ese-slate:#475467; background:#fff; color:var(--ese-slate); font-family:"Lato","Inter",system-ui,sans-serif; }
  .ese-page * { box-sizing:border-box; }
  .ese-page a { color:inherit; text-decoration:none; }
  .ese-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .ese-eyebrow { margin:0 0 12px; color:var(--ese-blue); font-size:12px; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
  .ese-title { margin:0; color:var(--ese-ink); font-family:"Lato","Inter",system-ui,sans-serif; font-size:clamp(36px,5vw,64px); font-weight:900; line-height:1.04; letter-spacing:0; text-transform:uppercase; }
  .ese-updated { margin:16px 0 0; color:var(--ese-ink); font-size:14px; font-weight:900; line-height:1.4; }
  .ese-copy { margin:18px 0 0; max-width:780px; color:var(--ese-slate); font-size:17px; line-height:1.75; }
  .ese-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--ese-ink); border-radius:999px; background:var(--ese-ink); color:#fff !important; padding:0 22px; font-size:14px; font-weight:900; transition:.2s ease; }
  .ese-button:hover { border-color:var(--ese-blue); background:var(--ese-blue); color:#fff !important; }
  .ese-button--secondary { background:#fff; color:var(--ese-ink) !important; }
  .ese-button--secondary:hover { border-color:var(--ese-blue); background:#eff6ff; color:var(--ese-blue) !important; }
  .ese-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .ese-hero { position:relative; overflow:hidden; background:linear-gradient(135deg,rgba(37,99,235,.14),rgba(6,182,212,.12) 48%,rgba(163,230,53,.16)),#f8fbff; }
  .ese-hero::before { content:""; position:absolute; inset:24px auto auto 8%; width:220px; height:220px; border-radius:999px; background:rgba(255,255,255,.56); filter:blur(8px); }
  .ese-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(37,99,235,.18); border-radius:999px; background:rgba(255,255,255,.28); }
  .ese-hero__grid { position:relative; z-index:1; display:grid; place-items:center; padding:82px 0 88px; text-align:center; }
  .ese-hero__content { max-width:880px; }
  .ese-hero .ese-copy { max-width:760px; margin-inline:auto; }
  .ese-hero .ese-actions { justify-content:center; }
  @media (max-width:680px) {
    .ese-hero__grid { padding:52px 0 56px; }
    .ese-actions { flex-direction:column; }
    .ese-button { width:100%; }
  }
</style>

<div class="bg-white font-body text-[#101828]">
    <section class="ese-page ese-terms-conditions ese-hero">
        <div class="ese-wrap ese-hero__grid">
            <div class="ese-hero__content">
                <p class="ese-eyebrow"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
                <h1 class="ese-title"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></h1>
                <p class="ese-updated"><?php esc_html_e('Last Updated: June 5, 2026', 'dawp'); ?></p>
                <p class="ese-copy"><?php esc_html_e('Welcome to Meridova! These Terms & Conditions govern your access to and use of meridova.net, including browsing our product catalog, creating an account, interacting with our customer support, or purchasing products from our online store.', 'dawp'); ?></p>
                <div class="ese-actions">
                    <a class="ese-button" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a class="ese-button ese-button--secondary" href="<?php echo esc_url($privacy_url); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <section class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="text-base leading-8 text-[#475467]">
                        <?php
                        printf(
                            esc_html__('The Site is operated by %1$s. Throughout the Site, the terms "we", "us", and "our" refer to %1$s. By accessing our Site or placing an order, you agree to be bound by these Terms and all operational policies referenced herein. If you do not agree with these terms, please discontinue using the website or placing orders.', 'dawp'),
                            esc_html($store_name)
                        );
                        ?>
                    </p>
                </section>

                <section id="online-store-terms" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('1. Online Store Terms & Eligibility', 'dawp'); ?></p>
                    <p class="text-base leading-8 text-[#475467]">
                        <?php esc_html_e('By agreeing to these Terms, you represent that you are at least the age of majority in your state, province, or country of residence. You may not use our website, products, or services for any unlawful, unauthorized, or fraudulent purpose. You agree not to misuse the website, interfere with its operational security, transmit harmful codes (viruses or malware), or harvest store data through automated scraping tools. You are entirely responsible for maintaining the confidentiality of your personal account credentials.', 'dawp'); ?>
                    </p>
                </section>

                <section id="store-scope" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('2. Store Scope & Product Representation', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><?php esc_html_e('Meridova is a lifestyle e-commerce store focused on practical, high-quality products for home essentials, beauty and personal care accessories, fashion accessories, lifestyle items, and giftable everyday finds.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We make every reasonable effort to display product descriptions, features, materials, sizing, and included components as accurately as possible. However, please note that actual product images, colors, and packaging details may vary slightly due to personal screen monitor settings, photography studio lighting, or periodic manufacturer updates. Product availability, descriptions, and pricing are subject to change without prior notice.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="orders-pricing-payment" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('3. Orders, Pricing, and Secure Payment', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Information Accuracy:', 'dawp'); ?></strong> <?php esc_html_e('When placing an order, you agree to provide current, complete, and accurate billing, shipping, contact, and payment information. Incorrect or incomplete information may delay or prevent delivery.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Order Review & Limitations:', 'dawp'); ?></strong> <?php esc_html_e('An order confirmation email does not guarantee final order acceptance. We reserve the absolute right to limit, refuse, or cancel any order if a pricing error occurs, inventory is unavailable, shipping restrictions apply, or fraud risk is flagged by our secure payment system.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Payment & No Hidden Fees:', 'dawp'); ?></strong> <?php esc_html_e('All prices on our Site are displayed and transacted in USD. Final totals, including shipping and taxes, are calculated dynamically and displayed clearly at checkout before your payment is completed. All payments are encrypted via SSL and processed through PCI-DSS compliant payment gateways.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="shipping-delivery" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('4. Shipping, Delivery, and Destination Responsibilities', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><?php esc_html_e('Your purchases and logistics are governed by our Shipping Policy. Meridova currently ships exclusively within the United States and provides free standard U.S. shipping for every order.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Cutoff, Handling & Transit Times:', 'dawp'); ?></strong> <?php esc_html_e('The daily order cutoff time is 5:00 PM (GMT-08:00) Pacific Standard Time. Order handling takes 1-3 business days, Monday through Friday, excluding standard U.S. public holidays. Standard domestic transit typically takes 5-7 business days after dispatch, with an estimated total delivery window of 6-10 business days from the date of purchase.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Tracking & Delays:', 'dawp'); ?></strong> <?php esc_html_e('Tracking information is provided by email once an order is dispatched. Delivery timelines are estimates, not guarantees, and may be affected by extreme weather, carrier capacity issues, regional holidays, high-volume shipping periods, incorrect addresses, or other conditions outside our control.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Address Accuracy & Full Policy:', 'dawp'); ?></strong> <?php esc_html_e('Customers are responsible for providing a complete and accurate shipping address before submitting an order. For full logistics details, carrier information, multi-item shipment rules, and delivery issue support steps, please review our comprehensive ', 'dawp'); ?><a href="<?php echo esc_url($shipping_url); ?>" class="font-black text-[#2563EB] transition hover:text-[#101828]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a><?php esc_html_e('.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="returns-refunds" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('5. Returns, Refunds & Exchanges', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><?php esc_html_e('We stand behind our products with a standard consumer protection policy:', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Return Window:', 'dawp'); ?></strong> <?php esc_html_e('Eligible returns may be requested within 30 days of documented delivery.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Condition Requirements:', 'dawp'); ?></strong> <?php esc_html_e('To qualify for a refund, items must be entirely unused, undamaged, in their original condition, and returned with all original packaging, tags, inserts, and included accessories intact.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Full Policy Access:', 'dawp'); ?></strong> <?php esc_html_e('Step-by-step instructions, return shipping address rules, and refund processing timeframes are detailed in our full ', 'dawp'); ?><a href="<?php echo esc_url($return_url); ?>" class="font-black text-[#2563EB] transition hover:text-[#101828]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a><?php esc_html_e('.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="privacy-intellectual-property" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('6. Privacy & Intellectual Property', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Data Privacy:', 'dawp'); ?></strong> <?php esc_html_e('Your submission of personal data through the storefront is strictly governed by our ', 'dawp'); ?><a href="<?php echo esc_url($privacy_url); ?>" class="font-black text-[#2563EB] transition hover:text-[#101828]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a><?php esc_html_e('.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Proprietary Content:', 'dawp'); ?></strong> <?php esc_html_e('All website designs, page layouts, text descriptions, graphics, logos, and custom photography selections are the exclusive property of Meridova and are protected by applicable copyright and intellectual property laws.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="limitation-of-liability" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('7. Limitation Of Liability', 'dawp'); ?></p>
                    <p class="text-base leading-8 text-[#475467]">
                        <?php esc_html_e('To the fullest extent permitted by applicable law, Meridova shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of website usage, product consumption, shipping carrier delays, or data interruptions.', 'dawp'); ?>
                    </p>
                </section>

                <section id="governing-law" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('8. Governing Law', 'dawp'); ?></p>
                    <p class="text-base leading-8 text-[#475467]">
                        <?php esc_html_e('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the State of New York, United States.', 'dawp'); ?>
                    </p>
                </section>

                <section id="contact-information" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('9. Contact Information', 'dawp'); ?></p>
                    <p class="text-base leading-8 text-[#475467]">
                        <?php esc_html_e('If you have questions, complaints, or require clarification regarding these Terms & Conditions, please contact our support team through our verified corporate channels:', 'dawp'); ?>
                    </p>

                    <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                            <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]"><?php esc_html_e('Store Name', 'dawp'); ?></h3>
                            <p class="mt-3 break-words text-base leading-7 text-[#475467]"><?php echo esc_html($store_name); ?></p>
                        </article>
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                            <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]"><?php esc_html_e('Website', 'dawp'); ?></h3>
                            <p class="mt-3 break-words text-base leading-7 text-[#475467]"><?php echo esc_html($site_url); ?></p>
                        </article>
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                            <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></h3>
                            <p class="mt-3 break-words text-base leading-7 text-[#475467]"><a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition hover:text-[#2563EB]"><?php echo esc_html($support_email); ?></a></p>
                        </article>
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                            <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]"><?php esc_html_e('Physical Business Address', 'dawp'); ?></h3>
                            <p class="mt-3 break-words text-base leading-7 text-[#475467]"><?php echo esc_html($support_address); ?></p>
                        </article>
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                            <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]"><?php esc_html_e('Customer Service Hours', 'dawp'); ?></h3>
                            <p class="mt-3 break-words text-base leading-7 text-[#475467]"><?php esc_html_e('Monday through Friday, 9:00 AM - 6:00 PM EST (New York Time)', 'dawp'); ?></p>
                        </article>
                        <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                            <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]"><?php esc_html_e('Contact Page', 'dawp'); ?></h3>
                            <p class="mt-3 break-words text-base leading-7 text-[#475467]"><a href="<?php echo esc_url($contact_url); ?>" class="transition hover:text-[#2563EB]"><?php esc_html_e('Contact Us', 'dawp'); ?></a></p>
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
