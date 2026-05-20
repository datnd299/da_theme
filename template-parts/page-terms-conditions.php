<?php
/**
 * Template Part: page-terms-conditions
 */

$support_email = 'support@scottosterbind.com';

$term_cards = [
    [
        'label' => __('Applies To', 'dawp'),
        'value' => __('Website Use', 'dawp'),
    ],
    [
        'label' => __('Checkout', 'dawp'),
        'value' => __('Order Terms', 'dawp'),
    ],
    [
        'label' => __('Products', 'dawp'),
        'value' => __('Handmade & Curated', 'dawp'),
    ],
    [
        'label' => __('Support', 'dawp'),
        'value' => __('Business Hours', 'dawp'),
    ],
];
?>

<div id="primary" class="bg-[#F8F1E7] font-body text-[#24211E]">
    <section class="bg-[#24211E] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C8A45D]"><?php esc_html_e('Scott Osterbind Store Terms', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#F8F1E7]">
                <?php esc_html_e('The terms that apply when you browse Scott Osterbind, create an account, place an order, use our services, or contact support.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#D8C3A5]">
                <?php esc_html_e('Last Updated: May 20, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($term_cards as $card) : ?>
                    <div class="rounded-lg border border-[#D8C3A5] border-t-4 border-t-[#9A6242] bg-white p-5 shadow-sm">
                        <p class="text-sm font-bold uppercase tracking-wide text-[#7A7B52]"><?php echo esc_html($card['label']); ?></p>
                        <p class="mt-2 font-heading text-2xl font-black text-[#5A3825]"><?php echo esc_html($card['value']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
                <aside class="rounded-lg border border-[#D8C3A5] bg-white p-4 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#9A6242]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <nav class="mt-4 space-y-2" aria-label="<?php esc_attr_e('Terms and conditions sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#9A6242] hover:bg-[#F8F1E7]" href="#terms-overview"><?php esc_html_e('Overview', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#7A7B52] hover:bg-[#F8F1E7]" href="#orders-billing"><?php esc_html_e('Orders & Billing', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#9A6242] hover:bg-[#F8F1E7]" href="#products-services"><?php esc_html_e('Products & Details', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#C8A45D] hover:bg-[#F8F1E7]" href="#prohibited-uses"><?php esc_html_e('Prohibited Uses', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#24211E] transition hover:border-[#C8A45D] hover:bg-[#F8F1E7]" href="#contact-terms"><?php esc_html_e('Contact', 'dawp'); ?></a>
                    </nav>
                </aside>

                <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                    <div class="max-w-none text-base leading-8 text-[#4F463F]
                        [&_a]:font-semibold [&_a]:text-[#9A6242] [&_a]:underline [&_a]:decoration-[#C8A45D] [&_a]:decoration-2 [&_a]:underline-offset-4 hover:[&_a]:text-[#5A3825]
                        [&_h2]:scroll-mt-24 [&_h2]:mt-10 [&_h2]:border-t [&_h2]:border-[#D8C3A5] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-tight [&_h2]:text-[#5A3825] md:[&_h2]:text-3xl
                        [&_li]:leading-7 [&_li]:pl-1 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#24211E] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">
                        <p class="rounded-lg border border-[#C8A45D]/60 bg-[#F8F1E7] p-4 font-medium text-[#5A3825]"><?php esc_html_e('Please read these Terms & Conditions carefully before using our website or placing an order. By accessing Scott Osterbind or buying from us, you agree to these terms and any policies referenced on this page.', 'dawp'); ?></p>

                        <h2 id="terms-overview"><?php esc_html_e('1. Overview and Acceptance of Terms', 'dawp'); ?></h2>
                        <p><?php esc_html_e('This website is operated by Scott Osterbind. Throughout the site, the terms "we", "us", and "our" refer to Scott Osterbind. We offer this website, including information, products, tools, and services available from this site, conditioned upon your acceptance of all terms, conditions, policies, and notices stated here.', 'dawp'); ?></p>
                        <p><?php esc_html_e('By visiting our site, creating an account, contacting us, submitting information, or purchasing something from us, you engage in our service and agree to be bound by these Terms & Conditions, including additional terms and policies referenced by link. If you do not agree to these terms, you should not access the website, use our services, or place an order.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('2. Online Store Terms', 'dawp'); ?></h2>
                        <p><?php esc_html_e('By agreeing to these terms, you represent that you are at least the age of majority in your state or place of residence, or that you are the age of majority and have given consent for any minor dependents to use this site under your supervision.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You may not use our products, website, or services for any illegal or unauthorized purpose. You must not transmit viruses, malicious code, spam, scraping tools, or any code designed to interfere with the operation or security of the website.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('3. General Conditions', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We reserve the right to refuse service to anyone for any reason at any time, where permitted by law. We may limit, suspend, or terminate access to the website or services if we believe a user has violated these terms, abused our systems, submitted false information, or engaged in harmful conduct.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You agree not to reproduce, duplicate, copy, sell, resell, exploit, scrape, or misuse any portion of the service, use of the service, access to the service, or contact on the website through which the service is provided, without express written permission from us.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('4. Accuracy, Completeness, and Timeliness of Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We work to provide accurate product, pricing, shipping, policy, and website information, but we do not guarantee that all information on this site is complete, current, or error-free. Website content is provided for general shopping and informational purposes and should not be relied upon as the sole basis for purchase decisions without reviewing the product page and checkout details.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Some information may be historical or no longer current and is provided for reference only. We may modify site content at any time, but we have no obligation to update every item immediately. You are responsible for reviewing current information before placing an order.', 'dawp'); ?></p>

                        <h2 id="products-services"><?php esc_html_e('5. Products, Materials, and Handmade Variation', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Scott Osterbind sells handmade jewelry, beaded pieces, vintage-inspired accessories, curated apparel, and artisan gifts. Product pages may include product type, materials, dimensions or fit where relevant, handmade or curated notes, care instructions, quantity included, shipping information, and return eligibility when available.', 'dawp'); ?></p>
                        <p class="rounded-lg border border-[#C8A45D]/60 bg-[#F8F1E7] p-4 font-medium text-[#5A3825]"><?php esc_html_e('Handmade and curated items may include slight natural variations in color, texture, bead pattern, finish, sizing, or material character. These variations are part of the handmade or curated nature of the item and are not automatically defects.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We make reasonable efforts to display product colors, textures, dimensions, materials, and images accurately. However, device screens, lighting, natural materials, handmade production, supplier variations, and packaging updates may make the actual product appear different from the website display.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We do not sell counterfeit products, fake designer items, unauthorized replicas, or products using protected logos without authorization. We also do not make medical, healing, or guaranteed wellness claims for beads, stones, crystals, or materials.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We reserve the right, but are not obligated, to limit sales of products or services to any person, household, geographic region, jurisdiction, account, payment method, or shipping address. Any offer for any product or service made on this site is void where prohibited.', 'dawp'); ?></p>

                        <h2 id="orders-billing"><?php esc_html_e('6. Orders, Billing, Shipping, and Account Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('You agree to provide current, complete, and accurate purchase, billing, shipping, account, email, and phone information for all purchases made through our store. Incorrect or incomplete information may delay fulfillment, prevent delivery, or affect return eligibility.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We may refuse, limit, hold, review, or cancel any order you place with us. Restrictions may include orders placed by or under the same customer account, payment method, billing address, shipping address, email, phone number, or suspected related customer information. If we change, hold, or cancel an order, we may attempt to notify you using the contact information provided when the order was placed.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('7. Shipping, Returns, Exchanges, and Refunds', 'dawp'); ?></h2>
                        <p>
                            <?php esc_html_e('Shipping, delivery estimates, address issues, return eligibility, item condition requirements, exchanges, and refunds are explained in our ', 'dawp'); ?>
                            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns Policy', 'dawp'); ?></a>.
                        </p>
                        <p><?php esc_html_e('A return request is not automatically approved. We may require an order number, product photos, packaging photos, carrier information, or other details before approving a return, replacement, refund, or store credit. Unauthorized returns may be refused or returned to sender.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('8. Pricing, Availability, and Service Changes', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Product prices, promotions, availability, shipping rates, descriptions, and service features may change without notice. We may modify, suspend, or discontinue all or part of the website, service, product catalog, or content at any time.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We are not liable to you or any third party for modifications, price changes, suspensions, discontinued products, unavailable services, or changes to website content, except where required by applicable law.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('9. Optional Tools, Third-Party Services, and Links', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We may provide access to third-party tools, payment services, carrier tracking pages, analytics tools, embedded content, or platform features that we do not monitor or control. These tools are provided "as is" and "as available" without warranties, representations, conditions, or endorsement from us.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Third-party links may direct you to websites that are not affiliated with us. We are not responsible for third-party content, accuracy, policies, products, services, websites, or transactions.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('10. User Comments, Reviews, Feedback, and Submissions', 'dawp'); ?></h2>
                        <p><?php esc_html_e('If you send submissions, reviews, photos, ideas, suggestions, proposals, feedback, or other materials to us by website form, email, social media, postal mail, or other channels, you agree that we may use those submissions for store operations, support, moderation, improvement, and lawful business purposes without obligation to maintain them in confidence, pay compensation, or respond.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You agree that your submissions will not violate any third-party rights and will not contain unlawful, abusive, obscene, defamatory, misleading, malicious, counterfeit, infringing, or harmful material.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('11. Personal Information', 'dawp'); ?></h2>
                        <p>
                            <?php esc_html_e('Your submission of personal information through the website, account features, checkout, contact forms, support requests, or order workflows is governed by our ', 'dawp'); ?>
                            <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>.
                        </p>

                        <h2><?php esc_html_e('12. Errors, Inaccuracies, and Omissions', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Occasionally there may be information on our site or in the service that contains typographical errors, inaccuracies, or omissions related to product descriptions, materials, sizing, pricing, promotions, offers, shipping charges, transit times, availability, images, or policy details.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We reserve the right to correct errors, inaccuracies, or omissions, and to change, update, refuse, or cancel orders if information in the service or on any related website is inaccurate at any time without prior notice, including after an order has been submitted, where permitted by law.', 'dawp'); ?></p>

                        <h2 id="prohibited-uses"><?php esc_html_e('13. Prohibited Uses', 'dawp'); ?></h2>
                        <p><?php esc_html_e('In addition to other prohibitions in these terms, you are prohibited from using the site, service, products, or content:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('for any unlawful purpose or to solicit others to perform unlawful acts;', 'dawp'); ?></li>
                            <li><?php esc_html_e('to violate any applicable international, federal, state, provincial, or local law, rule, regulation, or ordinance;', 'dawp'); ?></li>
                            <li><?php esc_html_e('to infringe upon or violate our intellectual property rights or the intellectual property rights of others;', 'dawp'); ?></li>
                            <li><?php esc_html_e('to submit false, misleading, fraudulent, incomplete, counterfeit, or inaccurate information;', 'dawp'); ?></li>
                            <li><?php esc_html_e('to upload or transmit viruses, malware, malicious code, spam, phishing attempts, scraping tools, or automated abuse;', 'dawp'); ?></li>
                            <li><?php esc_html_e('to interfere with or bypass website security, payment screening, fraud controls, account protections, or service functionality;', 'dawp'); ?></li>
                            <li><?php esc_html_e('to collect or track the personal information of others without lawful permission.', 'dawp'); ?></li>
                        </ul>
                        <p><?php esc_html_e('We reserve the right to terminate your use of the service or any related website for violating any prohibited use.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('14. Disclaimer of Warranties and Limitation of Liability', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We do not guarantee, represent, or warrant that your use of our service will be uninterrupted, timely, secure, error-free, or always available. We do not warrant that results obtained from the use of the service will be accurate or reliable.', 'dawp'); ?></p>
                        <p><?php esc_html_e('The service and all products delivered through the service are provided "as is" and "as available" unless expressly stated otherwise. To the fullest extent permitted by law, Scott Osterbind and our directors, officers, employees, affiliates, agents, contractors, suppliers, service providers, and licensors are not liable for indirect, incidental, punitive, special, consequential, or similar damages arising from your use of the website, service, or products.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('15. Indemnification and Severability', 'dawp'); ?></h2>
                        <p><?php esc_html_e('You agree to indemnify, defend, and hold harmless Scott Osterbind and our affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, and employees from any claim or demand, including reasonable attorneys fees, made by a third party due to or arising out of your breach of these terms, the documents they incorporate by reference, your misuse of the website or service, or your violation of any law or third-party rights.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If any provision of these Terms & Conditions is determined to be unlawful, void, or unenforceable, that provision will be enforceable to the fullest extent permitted by law. The unenforceable portion will be deemed severed from these terms, and the remaining provisions will remain in effect.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('16. Termination, Entire Agreement, and Governing Law', 'dawp'); ?></h2>
                        <p><?php esc_html_e('These terms are effective unless and until terminated by either you or us. You may terminate these terms by ceasing use of our website and services. We may terminate this agreement at any time without notice if we believe you have failed to comply with any term or policy.', 'dawp'); ?></p>
                        <p><?php esc_html_e('These terms, together with the policies referenced on the website, constitute the entire agreement between you and Scott Osterbind regarding your use of the website and services. These Terms & Conditions and any separate agreements through which we provide services are governed by and construed in accordance with the laws of the United States, without regard to conflict of law principles.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('17. Changes to Terms & Conditions', 'dawp'); ?></h2>
                        <p><?php esc_html_e('You can review the most current version of these Terms & Conditions on this page at any time. We reserve the right, at our sole discretion, to update, change, or replace any part of these terms by posting updates to our website. Continued use of or access to the website or service after changes are posted constitutes acceptance of those changes.', 'dawp'); ?></p>

                        <h2 id="contact-terms"><?php esc_html_e('18. Contact Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Questions about these Terms & Conditions should be sent to Scott Osterbind:', 'dawp'); ?></p>
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
