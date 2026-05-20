<?php
/**
 * Template Part: page-privacy
 */

$support_email = 'support@scottosterbind.com';
?>

<div id="primary" class="bg-[#F8F1E7] font-body text-[#24211E]">
    <section class="bg-[#24211E] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C8A45D]"><?php esc_html_e('Scott Osterbind Privacy', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Privacy Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#F8F1E7]">
                <?php esc_html_e('How we collect, use, protect, and share customer information for browsing, checkout, fulfillment, returns, and support.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#D8C3A5]">
                <?php esc_html_e('Last Updated: May 20, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
                <aside class="rounded-lg border border-[#D8C3A5] bg-white p-4 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#9A6242]"><?php esc_html_e('Privacy Sections', 'dawp'); ?></p>
                    <nav class="mt-4 space-y-2" aria-label="<?php esc_attr_e('Privacy policy sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#9A6242] hover:bg-[#F8F1E7]" href="#privacy-overview"><?php esc_html_e('Overview', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#9A6242] hover:bg-[#F8F1E7]" href="#information-collect"><?php esc_html_e('Information We Collect', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#7A7B52] hover:bg-[#F8F1E7]" href="#privacy-use"><?php esc_html_e('How We Use It', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#C8A45D] hover:bg-[#F8F1E7]" href="#privacy-rights"><?php esc_html_e('Rights & Choices', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#C8A45D] hover:bg-[#F8F1E7]" href="#privacy-contact"><?php esc_html_e('Contact', 'dawp'); ?></a>
                    </nav>
                </aside>

                <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                    <div class="max-w-none text-base leading-8 text-[#4F463F]
                        [&_a]:font-semibold [&_a]:text-[#9A6242] [&_a]:underline [&_a]:decoration-[#C8A45D] [&_a]:decoration-2 [&_a]:underline-offset-4 hover:[&_a]:text-[#5A3825]
                        [&_h2]:scroll-mt-24 [&_h2]:mt-10 [&_h2]:border-t [&_h2]:border-[#D8C3A5] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-tight [&_h2]:text-[#5A3825] md:[&_h2]:text-3xl
                        [&_li]:leading-7 [&_li]:pl-1 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#24211E] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">
                        <p id="privacy-overview" class="scroll-mt-24 rounded-lg border border-[#C8A45D]/60 bg-[#F8F1E7] p-4 font-medium text-[#5A3825]"><?php esc_html_e('This Privacy Policy explains how Scott Osterbind ("we", "us", or "our") collects, uses, shares, protects, and retains personal information when you visit scottosterbind.com, create an account, contact us, use tracking or support features, or purchase handmade jewelry, vintage-inspired accessories, curated apparel, or artisan gifts from our online store.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('1. Scope of This Privacy Policy', 'dawp'); ?></h2>
                        <p><?php esc_html_e('This policy applies to personal information collected through our website, checkout, customer account features, contact forms, order support, email communications, advertising activity, analytics tools, and related ecommerce services. It does not apply to websites, applications, payment providers, shipping carriers, social platforms, or other third parties that we do not own or control.', 'dawp'); ?></p>
                        <p><?php esc_html_e('By using our website or placing an order, you acknowledge that your information will be handled as described in this Privacy Policy. If you do not agree with this policy, please do not use the website or submit personal information through it.', 'dawp'); ?></p>

                        <h2 id="information-collect"><?php esc_html_e('2. Information We Collect', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We collect information reasonably needed to operate our boutique, process purchases, provide support, improve the shopping experience, protect the website, and meet legal obligations. The types of information we may collect include:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Contact details:', 'dawp'); ?></strong> <?php esc_html_e('name, email address, phone number, billing address, shipping address, and other details you provide when placing an order, creating an account, or contacting us.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Order and product information:', 'dawp'); ?></strong> <?php esc_html_e('products purchased, item names, sizes, materials, quantities, order number, order status, return or exchange details, customer notes, and customer service history.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Payment-related information:', 'dawp'); ?></strong> <?php esc_html_e('payment method type, transaction status, fraud screening signals, billing details, and limited payment references from our payment processors. We do not store full credit card numbers or full payment credentials on our servers.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Device and technical data:', 'dawp'); ?></strong> <?php esc_html_e('IP address, browser type, operating system, device identifiers, referring pages, language settings, approximate location from IP address, cookie identifiers, and website log data.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Website usage data:', 'dawp'); ?></strong> <?php esc_html_e('pages viewed, products viewed, search terms, cart activity, checkout steps, filter activity, links clicked, session timing, and other interactions with our website.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Communications:', 'dawp'); ?></strong> <?php esc_html_e('messages you send to us, form submissions, email support requests, review content, feedback, and photos or attachments you provide for damaged, defective, incorrect, return, or exchange requests.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Marketing preferences:', 'dawp'); ?></strong> <?php esc_html_e('email subscription status, consent records, opt-out choices, campaign interactions, and promotional preferences where applicable.', 'dawp'); ?></li>
                        </ul>

                        <h2><?php esc_html_e('3. Information You Should Not Send Us', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We do not need sensitive information such as Social Security numbers, government ID numbers, bank account numbers, health records, medical diagnoses, biometric data, precise geolocation, racial or ethnic origin, religious beliefs, political opinions, or similar sensitive categories to sell or support our products. Please do not include sensitive information in forms, emails, reviews, or return photos unless we specifically request a limited detail required to resolve an order issue.', 'dawp'); ?></p>

                        <h2 id="privacy-use"><?php esc_html_e('4. How We Use Your Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We use personal information for business purposes connected to our online store, including to:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('process, confirm, fulfill, ship, track, deliver, cancel, return, exchange, or refund orders;', 'dawp'); ?></li>
                            <li><?php esc_html_e('display product information, product materials, sizing notes, care details, and return eligibility;', 'dawp'); ?></li>
                            <li><?php esc_html_e('process payments securely through third-party payment processors and help prevent chargebacks or payment fraud;', 'dawp'); ?></li>
                            <li><?php esc_html_e('send order confirmations, shipping updates, return instructions, refund notices, account notices, security alerts, and policy updates;', 'dawp'); ?></li>
                            <li><?php esc_html_e('provide customer support, respond to questions, investigate delivery issues, and review damaged, defective, incorrect, or missing item claims;', 'dawp'); ?></li>
                            <li><?php esc_html_e('operate customer accounts, shopping carts, saved preferences, and checkout functions;', 'dawp'); ?></li>
                            <li><?php esc_html_e('measure website performance, improve product pages, and make the store easier to use;', 'dawp'); ?></li>
                            <li><?php esc_html_e('send marketing emails or promotional messages only where permitted by law and your preferences;', 'dawp'); ?></li>
                            <li><?php esc_html_e('show or measure advertising, including retargeting and conversion measurement where allowed;', 'dawp'); ?></li>
                            <li><?php esc_html_e('detect, prevent, and respond to fraud, abuse, spam, unauthorized access, security incidents, policy violations, or illegal activity;', 'dawp'); ?></li>
                            <li><?php esc_html_e('maintain records, enforce our Terms & Conditions, comply with tax, accounting, consumer protection, ecommerce, and legal obligations, and resolve disputes.', 'dawp'); ?></li>
                        </ul>

                        <h2><?php esc_html_e('5. Cookies and Similar Technologies', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We use cookies, pixels, tags, scripts, local storage, log files, and similar technologies to keep the website functional and understand how customers use it. Some cookies are necessary for cart, checkout, account login, security, language preferences, and fraud prevention. Other cookies may help us remember preferences, measure traffic, understand product interest, improve page performance, or deliver relevant advertising.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You can set your browser to block or delete cookies. If you disable cookies, some parts of the website may not work correctly, including cart, checkout, account login, saved preferences, and security features. Third-party advertising and analytics partners may also offer their own privacy controls or opt-out tools.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('6. Payment Processing and Secure Checkout', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Checkout pages and pages that collect personal information should be protected by HTTPS/SSL. Payment information is processed by trusted third-party payment processors. Scott Osterbind does not store full credit card numbers, card security codes, or complete payment credentials on our website servers. Payment processors may collect and process payment details according to their own privacy notices and security standards.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('7. When We Share Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We do not sell, rent, or trade customer contact information to third parties for their independent marketing. We share personal information only when needed to operate the store, fulfill purchases, protect customers, comply with law, or complete a transaction you requested. We may share information with:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Payment processors and fraud prevention providers:', 'dawp'); ?></strong> <?php esc_html_e('to authorize payments, process refunds, verify billing details, and reduce fraudulent transactions.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Shipping carriers and fulfillment partners:', 'dawp'); ?></strong> <?php esc_html_e('to prepare orders, create shipping labels, deliver packages, provide tracking, and resolve delivery claims.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Website, hosting, security, and ecommerce providers:', 'dawp'); ?></strong> <?php esc_html_e('to operate the website, store records, maintain checkout, manage accounts, send transactional emails, and keep the site secure.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Analytics and advertising partners:', 'dawp'); ?></strong> <?php esc_html_e('to measure website activity, understand marketing performance, improve campaigns, and show relevant advertising where permitted.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Professional advisers and legal authorities:', 'dawp'); ?></strong> <?php esc_html_e('when needed for accounting, legal, insurance, compliance, fraud investigation, lawful requests, or protection of rights, property, customers, or public safety.', 'dawp'); ?></li>
                        </ul>

                        <h2><?php esc_html_e('8. Advertising, Analytics, and Google Services', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We may use analytics and advertising tools, including services from Google and other partners, to understand how visitors find and use our website, measure conversions, improve product listings, and present more relevant ads. These services may use cookies, device identifiers, IP addresses, browser data, page events, purchase events, and similar information to provide reporting, measurement, fraud prevention, and advertising features.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We do not authorize advertising partners to use customer personal information in a way that violates applicable law or platform policies. You can manage some ad personalization choices through your browser settings, device settings, cookie controls, or privacy tools provided by the relevant advertising platform.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('9. Data Security and Retention', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We use reasonable administrative, technical, and organizational safeguards designed to protect personal information, including HTTPS/SSL for pages that collect personal information, access controls, security monitoring, order review, and third-party payment processing. However, no website, online transmission, or storage system can be guaranteed to be completely secure.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We retain personal information for as long as reasonably necessary for order fulfillment, customer support, returns, refunds, fraud prevention, tax and accounting records, legal compliance, dispute resolution, and enforcement of our agreements. When information is no longer needed, we may delete, de-identify, aggregate, or securely archive it according to operational and legal requirements.', 'dawp'); ?></p>

                        <h2 id="privacy-rights"><?php esc_html_e('10. Your Privacy Rights and Choices', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Depending on where you live, you may have rights regarding your personal information. These may include the right to request access, correction, deletion, portability, restriction, objection, withdrawal of consent, or information about how we collect, use, and share personal information. Some U.S. state privacy laws may also provide rights to opt out of certain targeted advertising, sale, or sharing of personal information as those terms are defined by law.', 'dawp'); ?></p>
                        <p><?php printf(esc_html__('To make a privacy request, contact %s. We may need enough information to verify your identity and locate the relevant order, account, or contact record. We will review and respond to requests according to applicable law. Some information may be retained when required for legal, security, fraud prevention, accounting, transaction, or dispute purposes.', 'dawp'), esc_html($support_email)); ?></p>

                        <h2><?php esc_html_e('11. California and U.S. State Privacy Notice', 'dawp'); ?></h2>
                        <p><?php esc_html_e('If a state privacy law applies to your relationship with us, the categories of personal information we may collect are described in Section 2, the purposes are described in Section 4, and the categories of parties with whom we may share information are described in Section 7. We do not knowingly sell personal information in the traditional sense of exchanging customer data for money. Some analytics or advertising activities may be considered "sharing" or "targeted advertising" under certain state laws. You may contact us to ask about available opt-out choices.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We do not knowingly collect, use, or disclose sensitive personal information for the purpose of inferring characteristics about customers. We will not discriminate against you for exercising privacy rights, but certain website or order features may not work without information needed to provide them.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('12. Children, International Visitors, and Third-Party Links', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Our website is intended for adults and is not directed to children under 13. We do not knowingly collect personal information from children under 13. If you access the website from outside the United States, your information may be processed in the United States or other locations where our service providers operate.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Our website may include links to third-party websites, payment providers, carrier tracking pages, embedded tools, or other services. Their privacy practices are governed by their own notices, not this Privacy Policy.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('13. Product, Shipping, Return, and Checkout Transparency', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Privacy works together with transparent store policies. We aim to show product prices, product availability, materials, dimensions or sizing where relevant, shipping options, taxes, fees, payment methods, and purchase conditions before checkout is completed. Our Shipping & Returns page explains processing time, estimated transit time, return eligibility, return steps, refund timing, and item condition requirements.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Customers are responsible for providing accurate billing, shipping, email, and phone information and for reviewing product materials, sizing, care notes, and return eligibility before ordering.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('14. Changes to This Privacy Policy', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We may update this Privacy Policy from time to time to reflect changes in our practices, technology, legal requirements, or store operations. When we update it, we will revise the "Last Updated" date above. The updated policy applies when posted on this page unless a different effective date is stated.', 'dawp'); ?></p>

                        <h2 id="privacy-contact"><?php esc_html_e('15. Contact Us', 'dawp'); ?></h2>
                        <p><?php esc_html_e('For privacy questions, account requests, data requests, order-related privacy concerns, or questions about this policy, contact Scott Osterbind:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Email:', 'dawp'); ?></strong> <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></li>
                            <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Website:', 'dawp'); ?></strong> <?php esc_html_e('scottosterbind.com', 'dawp'); ?></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
