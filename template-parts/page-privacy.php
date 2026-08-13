<?php
/**
 * Privacy Policy template part.
 *
 * @package dawp
 */

$store_name      = 'Meridova';
$site_url        = 'meridova.net';
$support_email   = 'support@meridova.net';
$support_address = dawp_get_store_address();
$operating_hours = 'Monday - Friday, 9:00 AM - 6:00 PM EST';
$product_scope   = 'home essentials, beauty and personal care accessories, fashion accessories, lifestyle items, and giftable everyday finds';
$contact_url     = home_url('/contact-us/');

$contact_cards = [
    [
        'type'  => 'text',
        'title' => __('Store Name', 'dawp'),
        'copy'  => $store_name,
    ],
    [
        'type'  => 'email',
        'title' => __('Support Email', 'dawp'),
        'copy'  => $support_email,
    ],
    [
        'type'  => 'text',
        'title' => __('Corporate Address', 'dawp'),
        'copy'  => $support_address,
    ],
    [
        'type'  => 'text',
        'title' => __('Operational Hours', 'dawp'),
        'copy'  => $operating_hours,
    ],
    [
        'type'  => 'contact',
        'title' => __('Contact Page', 'dawp'),
        'copy'  => __('Contact Us', 'dawp'),
    ],
];
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
    <section class="ese-page ese-privacy-policy ese-hero">
        <div class="ese-wrap ese-hero__grid">
            <div class="ese-hero__content">
                <p class="ese-eyebrow"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
                <h1 class="ese-title"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
                <p class="ese-updated"><?php esc_html_e('Last Updated: June 5, 2026', 'dawp'); ?></p>
                <p class="ese-copy">
                    <?php
                    printf(
                        esc_html__('At %1$s, available via %2$s (the "Site"), we are deeply committed to protecting the privacy, security, and personal data of our customers. This Privacy Policy outlines how your personal information is collected, used, protected, and shared when you visit, browse, interact with, or make a purchase from our store.', 'dawp'),
                        esc_html($store_name),
                        esc_html($site_url)
                    );
                    ?>
                </p>
                <div class="ese-actions">
                    <a class="ese-button" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a class="ese-button ese-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <section class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="text-base leading-8 text-[#475467]">
                        <?php esc_html_e('We primarily serve and target adult consumers within the United States. By utilizing our Site, you acknowledge and agree to the data collection and processing methodologies described below.', 'dawp'); ?>
                    </p>
                </section>

                <section id="information-we-collect" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('1. Information We Collect', 'dawp'); ?></p>
                    <div class="space-y-5 text-base leading-8 text-[#475467]">
                        <p><?php esc_html_e('To fulfill your orders and provide a seamless shopping experience, we collect two primary categories of data:', 'dawp'); ?></p>
                        <div>
                            <h3 class="font-heading text-xl font-black uppercase leading-tight text-[#101828]"><?php esc_html_e('A. Information You Provide Directly', 'dawp'); ?></h3>
                            <p class="mt-3"><strong class="font-black text-[#101828]"><?php esc_html_e('Contact & Account Data:', 'dawp'); ?></strong> <?php esc_html_e('Your full name, email address, physical shipping address, billing address, and phone number.', 'dawp'); ?></p>
                            <p class="mt-3"><strong class="font-black text-[#101828]"><?php esc_html_e('Order & Support Information:', 'dawp'); ?></strong> <?php esc_html_e('Items placed in your cart, purchase history, and transcripts or messages submitted via our contact forms or customer support channels.', 'dawp'); ?></p>
                        </div>
                        <div>
                            <h3 class="font-heading text-xl font-black uppercase leading-tight text-[#101828]"><?php esc_html_e('B. Information Collected Automatically', 'dawp'); ?></h3>
                            <p class="mt-3"><?php esc_html_e('When you access the Site, our servers and third-party tools automatically log certain technical tracking metrics, including:', 'dawp'); ?></p>
                            <div class="mt-4 space-y-3">
                                <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Device architecture, operating system, browser type, and IP address.', 'dawp'); ?></span></p>
                                <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Approximate geo-location data, referral sources, and detailed time-stamped interaction data such as pages viewed and links clicked.', 'dawp'); ?></span></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="secure-payment" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('2. Secure Payment Processing & Encryption', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p>
                            <?php
                            printf(
                                esc_html__('Your financial security is our highest priority. %s does not store, collect, or retain your raw credit card numbers or payment credentials on our servers.', 'dawp'),
                                esc_html($store_name)
                            );
                            ?>
                        </p>
                        <p><?php esc_html_e('All transactions are processed through certified, industry-leading, third-party payment gateways such as Stripe or PayPal. All data transmissions during the checkout process are protected using industry-standard SSL (Secure Sockets Layer) encryption technology and comply fully with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="how-we-use-information" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('3. How We Use Your Information', 'dawp'); ?></p>
                    <p class="text-base leading-8 text-[#475467]"><?php esc_html_e('We utilize your personal information based on lawful business grounds, specifically to:', 'dawp'); ?></p>
                    <div class="mt-4 space-y-3 text-base leading-8 text-[#475467]">
                        <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Process, build, track, and deliver your commercial orders.', 'dawp'); ?></span></p>
                        <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Send transactional updates, order confirmations, and tracking links.', 'dawp'); ?></span></p>
                        <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Review transactions against potential risks, fraud, or unauthorized chargebacks.', 'dawp'); ?></span></p>
                        <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Provide customer support and process standard 30-day product returns.', 'dawp'); ?></span></p>
                        <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Optimize website responsiveness, UI layout, and overall catalog appeal.', 'dawp'); ?></span></p>
                        <p class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-[#101828]"></span><span><?php esc_html_e('Send marketing communications where explicit consent is granted, featuring an instantaneous unsubscribe mechanism.', 'dawp'); ?></span></p>
                    </div>
                </section>

                <section id="third-party-sharing" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('4. Third-Party Information Sharing', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><?php esc_html_e('We do not sell, rent, trade, or monetize your personal information to third parties. We only share operational data with trusted service providers who assist us in running our storefront, including:', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('E-commerce Platform & Analytics:', 'dawp'); ?></strong> <?php esc_html_e('Utilities that power our store infrastructure and behavioral analysis tools like Google Analytics.', 'dawp'); ?></p>
                        <p>
                            <strong class="font-black text-[#101828]"><?php esc_html_e('Logistics & Fulfillment:', 'dawp'); ?></strong>
                            <?php
                            printf(
                                esc_html__('Shipping carriers such as USPS, UPS, and FedEx, plus fulfillment hubs used to deliver %s.', 'dawp'),
                                esc_html($product_scope)
                            );
                            ?>
                        </p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Legal Compliance:', 'dawp'); ?></strong> <?php esc_html_e('We may release data if required to do so by lawful subpoenas, court orders, or federal regulations to protect our property rights and customer safety.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="cookies-tracking" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('5. Cookies and Tracking Technologies', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><?php esc_html_e('Our Site uses cookies, which are small text files saved to your local device, to maintain essential storefront functionality:', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Functional Cookies:', 'dawp'); ?></strong> <?php esc_html_e('To remember items added to your shopping cart and maintain secure active checkout sessions.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('Analytical Cookies:', 'dawp'); ?></strong> <?php esc_html_e('To monitor aggregated traffic trends and site speed metrics.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You can disable or delete cookies entirely via your personal web browser settings. Please note that blocking all cookies may break core e-commerce functions, such as keeping items in your cart during checkout.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="privacy-rights" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('6. Your US State Privacy Rights (CCPA/CPRA Compliance)', 'dawp'); ?></p>
                    <div class="space-y-4 text-base leading-8 text-[#475467]">
                        <p><?php esc_html_e('If you are a resident of the United States, including states with active data privacy acts like California, Virginia, or Colorado, you possess specific statutory rights regarding your personal data:', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('The Right to Know/Access:', 'dawp'); ?></strong> <?php esc_html_e('Request disclosure of what personal data we have collected about you.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('The Right to Delete:', 'dawp'); ?></strong> <?php esc_html_e('Request the permanent deletion of your collected data, excluding records we are legally required to keep for federal tax audits and accounting.', 'dawp'); ?></p>
                        <p><strong class="font-black text-[#101828]"><?php esc_html_e('The Right to Correct:', 'dawp'); ?></strong> <?php esc_html_e('Request corrections to inaccurate personal records.', 'dawp'); ?></p>
                        <p>
                            <strong class="font-black text-[#101828]"><?php esc_html_e('The Right to Opt-Out:', 'dawp'); ?></strong>
                            <?php
                            printf(
                                esc_html__('%s does not sell your personal data. You may explicitly opt out of targeted third-party advertising tracking at any time.', 'dawp'),
                                esc_html($store_name)
                            );
                            ?>
                        </p>
                        <p><?php esc_html_e('To exercise any of these state-specific consumer protection rights, please contact our Data Privacy Officer at the email address provided below.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="data-retention" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('7. Data Retention', 'dawp'); ?></p>
                    <p class="text-base leading-8 text-[#475467]">
                        <?php esc_html_e('When you place an order through the Site, we will retain your order information for our internal business records unless and until you ask us to delete this information. This is necessary to satisfy legal, accounting, tax reporting, and dispute resolution mandates.', 'dawp'); ?>
                    </p>
                </section>

                <section id="contact-privacy-officer" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('8. Contact Our Privacy Officer', 'dawp'); ?></p>
                    <p class="text-base leading-8 text-[#475467]">
                        <?php esc_html_e('For privacy inquiries, data extraction requests, or questions regarding this policy, please reach out to our team:', 'dawp'); ?>
                    </p>

                    <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <?php foreach ($contact_cards as $card) : ?>
                            <article class="rounded-[1.25rem] border border-[#E5E7EB] bg-white p-5">
                                <h3 class="text-sm font-black uppercase tracking-wide text-[#101828]">
                                    <?php echo esc_html($card['title']); ?>
                                </h3>
                                <p class="mt-3 break-words text-base leading-7 text-[#475467]">
                                    <?php if ('email' === $card['type']) : ?>
                                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition hover:text-[#2563EB]"><?php echo esc_html($card['copy']); ?></a>
                                    <?php elseif ('contact' === $card['type']) : ?>
                                        <a href="<?php echo esc_url($contact_url); ?>" class="transition hover:text-[#2563EB]"><?php echo esc_html($card['copy']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($card['copy']); ?>
                                    <?php endif; ?>
                                </p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
