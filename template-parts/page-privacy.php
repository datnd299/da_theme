<?php
/**
 * Template Part: Privacy Policy Page
 * Brand: UK Official Store
 */

$brand_name = 'UK Official Store';
$domain_name = 'ukofficialstore.com';
$support_email = 'support@ukofficialstore.com';
$store_address = function_exists('dawp_store_address') ? dawp_store_address() : '4803 N Milwaukee Ave, Chicago, IL 60630';
$business_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST';
$last_updated = 'June 8, 2026';
?>

<div class="bg-[#f8fafc] text-navy">
    <section class="relative bg-navy py-20 md:py-28 overflow-hidden text-white">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue/20 rounded-full blur-[120px] -mr-64 -mt-64"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-lime/10 rounded-full blur-[100px] -ml-48 -mb-48"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 relative z-10">
            <div class="max-w-4xl">
                <nav class="flex items-center gap-2 mb-8 text-blue font-bold uppercase tracking-widest text-xs">
                    <a href="/" class="hover:text-lime transition-colors">Home</a>
                    <span class="text-white/30">/</span>
                    <span>Legal</span>
                </nav>
                <h1 class="text-5xl md:text-6xl font-heading font-black mb-6 leading-tight">Privacy <span class="text-blue">Policy.</span></h1>
                <p class="text-lg md:text-xl text-gray-400 leading-relaxed font-light max-w-3xl">
                    This Privacy Policy explains how <?php echo esc_html($domain_name); ?> collects, uses, and discloses your Personal Information when you visit, browse, or make a purchase.
                </p>
                <p class="mt-8 text-sm font-bold uppercase tracking-widest text-white/50">Last Updated: <?php echo esc_html($last_updated); ?></p>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
                <aside class="lg:w-1/4">
                    <div class="lg:sticky lg:top-32 space-y-1">
                        <p class="text-[10px] font-black uppercase tracking-widest text-navy/30 mb-5 ml-4">Policy Sections</p>
                        <?php
                        $policy_sections = array(
                            'collecting-info' => 'Collecting Information',
                            'minors' => 'Minors & Children',
                            'sharing-info' => 'Sharing Information',
                            'advertising' => 'Behavioral Advertising',
                            'security' => 'Payment Security',
                            'gdpr' => 'GDPR Compliance',
                            'ccpa' => 'CCPA Compliance',
                            'retention' => 'Data Retention',
                            'cookies' => 'Cookies Notice',
                            'updates' => 'Policy Updates',
                            'contact' => 'Contact Channels',
                        );
                        foreach ($policy_sections as $section_id => $section_label) :
                        ?>
                            <a href="#<?php echo esc_attr($section_id); ?>" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                                <span class="font-bold text-sm"><?php echo esc_html($section_label); ?></span>
                                <span class="text-blue group-hover:translate-x-1 transition-transform">&rarr;</span>
                            </a>
                        <?php endforeach; ?>

                        <div class="mt-8 p-6 bg-navy rounded-2xl text-white">
                            <p class="text-[10px] font-black uppercase tracking-widest text-blue mb-3">Privacy Support</p>
                            <p class="text-sm text-gray-300 leading-relaxed mb-5">Contact us with questions regarding our data collection and processing methodologies.</p>
                            <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-block w-full py-3 bg-blue text-white text-center text-xs font-bold rounded-xl hover:bg-white hover:text-navy transition-all">Email Privacy Team</a>
                        </div>
                    </div>
                </aside>

                <div class="lg:w-3/4">
                    <div class="prose prose-blue max-w-none text-foreground-muted terms-policy">
                        <div class="mb-16 policy-section">
                            <div class="inline-flex px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">Policy Overview</div>
                            <p class="lead text-lg text-navy font-medium">This Privacy Policy explains how <?php echo esc_html($domain_name); ?> (the “Site”, “we”, “us”, or “our”) collects, uses, and discloses your Personal Information when you visit, browse, or make a activewear, apparel or accessory purchase from the Site. By utilizing our Site, you acknowledge and agree to the data collection and processing methodologies described in this policy.</p>
                        </div>

                        <div id="collecting-info" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">1</span>
                            <h2>Collecting Personal Information</h2>
                            <p>When you visit the Site, we collect certain information about your device, your interaction with the Site, and information necessary to process your purchases. We may also collect additional information if you contact us for customer support.</p>
                            <ul>
                                <li><strong>Device Information:</strong> Collected automatically via cookies, log files, web beacons, tags, or pixels when you access our Site. This includes browser type, IP address, time zone, individual cookie data, what products you view, and search terms.</li>
                                <li><strong>Order Information:</strong> Collected directly from you to fulfill our contract. This includes your name, billing address, shipping address, payment information (processed securely through third-party gateways), email address, and phone number.</li>
                                <li><strong>Customer Support Information:</strong> Collected directly from you during any customer service interaction to provide high-quality support.</li>
                            </ul>
                        </div>

                        <div id="minors" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">2</span>
                            <h2>Minors &amp; Children's Privacy</h2>
                            <p>The Site is not intended for individuals under the age of 18. We do not intentionally or knowingly collect Personal Information from children. If you are a parent or guardian and believe your child has provided us with Personal Information, please contact us immediately at our official support channels listed below to request prompt deletion.</p>
                        </div>

                        <div id="sharing-info" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">3</span>
                            <h2>Sharing Personal Information</h2>
                            <p>We share your Personal Information with trusted service providers to help us provide our e-commerce services and fulfill our transactional contracts with you, as described above. For example:</p>
                            <ul>
                                <li>We use WordPress and WooCommerce to power our online store. You can read more about how WordPress uses your Personal Information here: <a href="https://wordpress.org/about/privacy/" target="_blank" rel="noopener">https://wordpress.org/about/privacy/</a>.</li>
                                <li>We may share your Personal Information to comply with applicable federal laws and regulations, to respond to a subpoena, search warrant, or other lawful requests for information we receive, or to otherwise protect our legal rights.</li>
                            </ul>
                        </div>

                        <div id="advertising" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">4</span>
                            <h2>Behavioral Advertising &amp; Marketing</h2>
                            <p>As described above, we use your Personal Information to provide you with targeted advertisements or marketing communications we believe may be of interest to you.</p>
                            <ul>
                                <li>We use Google Analytics to help us understand how our customers interact with the Site. Learn more: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">https://policies.google.com/privacy</a>. You can opt out here: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">https://tools.google.com/dlpage/gaoptout</a>.</li>
                                <li>We share data regarding your store interactions and purchases with our verified advertising partners through cookies or similar background tracking technologies.</li>
                            </ul>
                            <p>You can proactively opt out of targeted advertising via these specialized portals:</p>
                            <ul>
                                <li><strong>FACEBOOK:</strong> <a href="https://www.facebook.com/settings/?tab=ads" target="_blank" rel="noopener">https://www.facebook.com/settings/?tab=ads</a></li>
                                <li><strong>GOOGLE:</strong> <a href="https://www.google.com/settings/ads/anonymous" target="_blank" rel="noopener">https://www.google.com/settings/ads/anonymous</a></li>
                                <li><strong>DIGITAL ADVERTISING ALLIANCE PORTAL:</strong> <a href="http://optout.aboutads.info/" target="_blank" rel="noopener">http://optout.aboutads.info/</a></li>
                            </ul>
                        </div>

                        <div id="security" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">5</span>
                            <h2>Payment Security &amp; Data Encryption (GMC MANDATORY)</h2>
                            <p>To guarantee consumer transaction safety, <?php echo esc_html($domain_name); ?> operates a secure digital environment. All checkout data transfers are encrypted using SSL (Secure Sockets Layer) technology.</p>
                            <p>Furthermore, we do not store or process raw financial credentials or credit card numbers on our local databases. All transactions are routed directly to third-party payment infrastructure nodes that comply fully with the global Payment Card Industry Data Security Standard (PCI-DSS).</p>
                        </div>

                        <div id="gdpr" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">6</span>
                            <h2>Lawful Basis &amp; GDPR Compliance</h2>
                            <p>Pursuant to the General Data Protection Regulation (“GDPR”), if you are a resident of the European Economic Area (“EEA”), we process your personal information under the following lawful bases:</p>
                            <ul>
                                <li>Your explicit consent.</li>
                                <li>The performance of the commercial purchase contract between you and the Site.</li>
                                <li>Compliance with our regional legal and tax obligations.</li>
                                <li>For our legitimate commercial interests, which do not override your fundamental rights and freedoms.</li>
                            </ul>
                            <p>If you are a resident of the EEA, you have the right to access the Personal Information we hold about you, to port it to a new service, and to ask that your Personal Information be corrected, updated, or erased. To exercise these rights, please email us at <?php echo esc_html($support_email); ?>. Your personal data will be initially processed in Ireland and then transferred outside of Europe for storage and further handling (including to Canada and the United States).</p>
                        </div>

                        <div id="ccpa" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">7</span>
                            <h2>California Consumer Privacy Act (CCPA)</h2>
                            <p>If you are a resident of California, you have the right to access the Personal Information we hold about you (also known as the “Right to Know”), to port it to a digital service, and to ask that your Personal Information be corrected, updated, or erased. To exercise these rights or to designate an authorized agent to submit these requests on your behalf, please contact us using the contact registries at the bottom of this page.</p>
                        </div>

                        <div id="retention" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">8</span>
                            <h2>Retention and Automatic Decision-Making</h2>
                            <p><strong>Data Retention:</strong> When you place an order through the Site, we will securely retain your Personal Information for our business registries unless and until you formally ask us to erase this information.</p>
                            <p><strong>Automated Decision-Making:</strong> We DO NOT engage in fully automated decision-making that has a legal or otherwise significant effect using customer data. Our processor WordPress uses limited automated decision-making solely to prevent transaction fraud (such as temporary denylisting of specific IP addresses or credit cards associated with repeated failed transaction attempts).</p>
                        </div>

                        <div id="cookies" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">9</span>
                            <h2>Cookies Notice</h2>
                            <p>A cookie is a small amount of information downloaded to your device when you visit our Site. Cookies optimize your browsing experience by allowing the storefront to remember your core actions and preferences (such as login states, cart persistence, and region selections).</p>
                            <p>We utilize the following essential cookies to maintain operational e-commerce functions:</p>
                            <div class="overflow-x-auto mt-4 mb-6">
                                <table class="w-full text-sm text-left border-collapse">
                                    <thead>
                                        <tr class="bg-surface-alt">
                                            <th class="p-3 border-b border-border">Cookie Name</th>
                                            <th class="p-3 border-b border-border">Duration</th>
                                            <th class="p-3 border-b border-border">Purpose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-3 border-b border-border font-mono text-xs">woocommerce_cart_hash</td>
                                            <td class="p-3 border-b border-border">Session</td>
                                            <td class="p-3 border-b border-border">Helps WooCommerce determine when cart contents / data changes.</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 border-b border-border font-mono text-xs">woocommerce_items_in_cart</td>
                                            <td class="p-3 border-b border-border">Session</td>
                                            <td class="p-3 border-b border-border">Helps WooCommerce determine when cart contents / data changes.</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 border-b border-border font-mono text-xs">wp_woocommerce_session_</td>
                                            <td class="p-3 border-b border-border">2 Days</td>
                                            <td class="p-3 border-b border-border">Contains a unique code for each customer so the cart data can be found in the database.</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 border-b border-border font-mono text-xs">woocommerce_recently_viewed</td>
                                            <td class="p-3 border-b border-border">Session</td>
                                            <td class="p-3 border-b border-border">Powers the Recently Viewed Products widget on the store storefront.</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 border-b border-border font-mono text-xs">store_notice[notice id]</td>
                                            <td class="p-3 border-b border-border">Session</td>
                                            <td class="p-3 border-b border-border">Allows customers to dismiss the visual Store Notice.</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 border-b border-border font-mono text-xs">woocommerce_snooze_suggestions</td>
                                            <td class="p-3 border-b border-border">2 Days</td>
                                            <td class="p-3 border-b border-border">Allows dashboard users to manage internal recommendations.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>You can control and manage cookies through your browser controls (often found in your browser’s “Tools” or “Preferences” menu). For detailed tracking compliance information, please visit <a href="https://www.allaboutcookies.org" target="_blank" rel="noopener">www.allaboutcookies.org</a>.</p>
                        </div>

                        <div id="updates" class="scroll-mt-32 mb-16 policy-section">
                            <span class="section-number">10</span>
                            <h2>Do Not Track &amp; Policy Updates</h2>
                            <p>Because there is no consistent global industry understanding of how to respond to “Do Not Track” signals, we do not alter our background data collection and usage practices when we detect such a signal from your browser. We may update this Privacy Policy from time to time to reflect, for example, changes to our retail operations or for legal and regulatory reasons.</p>
                        </div>

                        <div id="contact" class="scroll-mt-32 mb-16 policy-section policy-section-last">
                            <span class="section-number">11</span>
                            <h2>Business Identity &amp; Customer Contact Channels</h2>
                            <p>For any questions regarding our data security practices, to exercise your consumer data rights, or to lodge a formal inquiry, please contact our privacy compliance department via our verified channels:</p>
                            <div class="grid md:grid-cols-2 gap-5 mt-8 not-prose">
                                <div class="contact-card"><span>Store/Brand Name</span><strong><?php echo esc_html($brand_name); ?></strong></div>
                                <div class="contact-card"><span>Customer Support Email</span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></div>
                                <div class="contact-card"><span>Physical Business Address</span><strong><?php echo esc_html($store_address); ?></strong></div>
                                <div class="contact-card"><span>Customer Service Hours</span><strong><?php echo esc_html($business_hours); ?></strong></div>
                                <div class="contact-card"><span>Contact Page</span><a href="/contact-us/">Contact Us</a></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    html { scroll-behavior: smooth; }
    .terms-policy { color: #4b5563; font-size: 16px; line-height: 1.78; }
    .terms-policy .policy-section { position: relative; padding-bottom: 3.5rem; border-bottom: 1px solid #e5e7eb; }
    .terms-policy .policy-section-last { padding-bottom: 0; border-bottom: 0; }
    .terms-policy h2 { margin: 0 0 1.25rem; color: #0b1f33; font-family: "Plus Jakarta Sans", "Inter", sans-serif; font-size: clamp(1.75rem, 4vw, 2.25rem); font-weight: 900; line-height: 1.2; }
    .terms-policy p { margin: 0 0 1rem; }
    .terms-policy a { color: #2563eb; font-weight: 700; }
    .terms-policy a:hover { text-decoration: underline; }
    .terms-policy ul { display: grid; gap: .7rem; margin: .75rem 0 1rem; padding: 0; list-style: none; }
    .terms-policy li { position: relative; padding-left: 1.45rem; }
    .terms-policy li::before { content: ""; position: absolute; left: 0; top: .72em; width: .45rem; height: .45rem; border-radius: 999px; background: #2563eb; }
    .terms-policy .section-number { display: inline-flex; align-items: center; justify-content: center; width: 2.25rem; height: 2.25rem; margin-bottom: 1rem; border-radius: 999px; background: #dbeafe; color: #2563eb; font-weight: 900; }
    .terms-policy .contact-card { display: flex; flex-direction: column; gap: .5rem; padding: 1.5rem; border: 1px solid #e5e7eb; border-radius: 1rem; background: #fff; }
    .terms-policy .contact-card span { color: #6b7280; font-size: .7rem; font-weight: 900; letter-spacing: .1em; text-transform: uppercase; }
    .terms-policy .contact-card strong, .terms-policy .contact-card a { color: #0b1f33; font-size: 1rem; overflow-wrap: anywhere; }
</style>
