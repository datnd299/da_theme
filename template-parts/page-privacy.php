<?php
/**
 * Template Part: page-privacy
 */
?>

<div id="primary" class="bg-[#F7FAF9] font-body text-[#17202A]">
    <section class="bg-[#102A2C] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#F6A21A]"><?php esc_html_e('Rubyinstar Privacy', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Privacy Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#D7DEE8]">
                <?php esc_html_e('How Rubyinstar collects, uses, protects, and shares customer information for tire shopping, checkout, fulfillment, and support.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#B8C3D1]">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
                <aside class="rounded-lg border border-[#E5E7EB] bg-white p-4 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#5B6472]"><?php esc_html_e('Privacy Sections', 'dawp'); ?></p>
                    <nav class="mt-4 space-y-2" aria-label="<?php esc_attr_e('Privacy policy sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#privacy-overview"><?php esc_html_e('Overview', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#information-collect"><?php esc_html_e('Information We Collect', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#payment-security"><?php esc_html_e('Payment Security', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#privacy-use"><?php esc_html_e('How We Use It', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#cookies"><?php esc_html_e('Cookies', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#111827] hover:bg-[#F4F6F8]" href="#privacy-rights"><?php esc_html_e('Your Rights', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#111827] hover:bg-[#F4F6F8]" href="#privacy-contact"><?php esc_html_e('Contact', 'dawp'); ?></a>
                    </nav>
                </aside>

                <article class="rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                    <div class="max-w-none text-base leading-8 text-[#4B5563]
                        [&_a]:font-semibold [&_a]:text-[#2563EB] [&_a]:underline [&_a]:decoration-[#BFDBFE] [&_a]:decoration-2 [&_a]:underline-offset-4 hover:[&_a]:text-[#0B1F33]
                        [&_h2]:scroll-mt-24 [&_h2]:mt-10 [&_h2]:border-t [&_h2]:border-[#E5E7EB] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-tight [&_h2]:text-[#0B1F33] md:[&_h2]:text-3xl
                        [&_li]:leading-7 [&_li]:pl-1 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#111827] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">

                        <p id="privacy-overview" class="scroll-mt-24 rounded-lg border border-[#BFDBFE] bg-[#EFF6FF] p-4 font-medium text-[#111827]"><?php esc_html_e('At Rubyinstar ("we", "us", or "our"), available at rubyinstar.com, the privacy and security of our customers are our top priorities. This Privacy Policy outlines how we collect, use, protect, and handle your personal information when you purchase tires, create an account, or interact with our customer support.', 'dawp'); ?></p>

                        <h2 id="information-collect"><?php esc_html_e('1. Information We Collect', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We only collect personal information that is necessary to process your orders and provide an optimal shopping experience. This includes:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Contact Information:', 'dawp'); ?></strong> <?php esc_html_e('Name, shipping address, billing address, email address, and phone number.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Order & Tire Details:', 'dawp'); ?></strong> <?php esc_html_e('Tire size, specification choices, order history, and customer service inquiries.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Technical Data:', 'dawp'); ?></strong> <?php esc_html_e('IP address, browser type, and device information gathered via cookies to improve website functionality and site security.', 'dawp'); ?></li>
                        </ul>
                        <p class="rounded-lg border border-[#BFDBFE] bg-[#EFF6FF] p-4 font-medium text-[#111827]">🔒 <strong><?php esc_html_e('Important Note:', 'dawp'); ?></strong> <?php esc_html_e('Rubyinstar does NOT collect or store sensitive personal information such as Social Security numbers, government IDs, medical records, or financial account credentials.', 'dawp'); ?></p>

                        <h2 id="payment-security"><?php esc_html_e('2. Payment Security & Data Protection', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We implement industry-standard security measures to maintain the safety of your personal information.', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Secure Checkout (SSL):', 'dawp'); ?></strong> <?php esc_html_e('All sensitive and credit card information you supply is transmitted via Secure Socket Layer (SSL) technology and encrypted into our payment gateway providers\' database.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('No Storage of Financial Data:', 'dawp'); ?></strong> <?php esc_html_e('Rubyinstar does NOT store, view, or retain your full credit card numbers, CVV codes, or bank account credentials on our servers. All transactions are securely processed directly through authorized, PCI-compliant third-party payment processors.', 'dawp'); ?></li>
                        </ul>

                        <h2 id="privacy-use"><?php esc_html_e('3. How We Use and Share Your Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We use your information strictly to operate our e-commerce store and fulfill your requests. We do not sell, rent, trade, or share your personal data with third parties for their independent marketing or commercial purposes.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We only share data with trusted service providers necessary to complete your transaction:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Payment Processors:', 'dawp'); ?></strong> <?php esc_html_e('To securely authorize and complete payments or process refunds.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Shipping Carriers & Fulfillment Partners:', 'dawp'); ?></strong> <?php esc_html_e('To print shipping labels, deliver your tires, and provide tracking updates.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Analytics Tools (including Google Analytics):', 'dawp'); ?></strong> <?php esc_html_e('To analyze website traffic, monitor performance, and optimize our product pages.', 'dawp'); ?></li>
                        </ul>

                        <h2 id="cookies"><?php esc_html_e('4. Cookies and Tracking Technologies', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We use cookies and similar technologies to enhance your browsing experience, remember items in your shopping cart, and understand how you interact with our website. You can choose to disable cookies through your browser settings; however, doing so may affect your ability to use certain checkout and account features.', 'dawp'); ?></p>

                        <h2 id="privacy-rights"><?php esc_html_e('5. Your Data Rights and Choices', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Depending on your location (including rights under CCPA/CPRA and other US state laws), you have the right to:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('Access, update, or correct your personal information.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Request the permanent deletion of your data.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Opt out of technical tracking and analytics cookies.', 'dawp'); ?></li>
                        </ul>
                        <p><?php esc_html_e('To exercise any of these rights, please submit a request directly to support@rubyinstar.com. We will process and respond to verified requests within standard legal timeframes.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('6. Children\'s Privacy', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Our website is designed for adult vehicle owners and is not directed toward children. We do not knowingly collect personal information from individuals under the age of 13.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('7. Changes to This Policy', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We may update this Privacy Policy periodically to reflect changes in our business practices or legal obligations. Any updates will be posted directly on this page with a revised "Last Updated" date.', 'dawp'); ?></p>

                        <h2 id="privacy-contact"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('For any privacy-related questions, data requests, or compliance inquiries, please feel free to reach out to us:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Store Name:', 'dawp'); ?></strong> <?php esc_html_e('Rubyinstar', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Website URL:', 'dawp'); ?></strong> <?php esc_html_e('rubyinstar.com', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Customer Support Email:', 'dawp'); ?></strong> <a href="mailto:support@rubyinstar.com">support@rubyinstar.com</a></li>
                            <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday - Friday, 9:00 AM - 5:00 PM (GMT-08:00) Pacific Standard Time (Los Angeles)', 'dawp'); ?></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
