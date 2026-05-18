<?php
/**
 * Template Part: Privacy Policy Page
 * Brand: UK Official Store
 * Description: Clear, GMC-aware privacy policy for activewear ecommerce.
 */

$brand_name = 'UK Official Store';
$support_email = 'support@ukofficialstore.com';
$business_hours = 'Monday - Friday, 9:00 AM - 6:00 PM EST';
$last_updated = 'May 18, 2026';
?>

<div class="bg-[#f8fafc] text-navy">
    <!-- Hero Section -->
    <section class="relative bg-navy py-20 md:py-28 overflow-hidden text-white">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue/20 rounded-full blur-[120px] -mr-64 -mt-64"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-lime/10 rounded-full blur-[100px] -ml-48 -mb-48"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 relative z-10">
            <div class="max-w-4xl">
                <nav class="flex items-center gap-2 mb-8 text-blue font-bold uppercase tracking-[0.2em] text-xs">
                    <a href="/" class="hover:text-lime transition-colors">Home</a>
                    <span class="text-white/30">/</span>
                    <span>Legal</span>
                </nav>
                <h1 class="text-5xl md:text-6xl font-heading font-black mb-6 leading-[1.1] tracking-tight">
                    Privacy <span class="text-blue">Policy.</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-400 leading-relaxed font-light max-w-3xl">
                    A clear explanation of how <?php echo esc_html($brand_name); ?> collects, uses, protects, and shares customer information when you browse, shop, track orders, or contact support.
                </p>
                <div class="mt-10 grid sm:grid-cols-3 gap-4 max-w-4xl">
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">SSL</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Secure checkout data</p>
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">No</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Raw card storage</p>
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">Email</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Privacy request support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content with Sticky Sidebar -->
    <section class="py-16 md:py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">

                <!-- Sticky Navigation Sidebar -->
                <aside class="lg:w-1/4">
                    <div class="lg:sticky lg:top-32 space-y-1">
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-navy/30 mb-5 ml-4">Policy Sections</p>
                        <a href="#overview" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Overview</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#information" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Information We Collect</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#use" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">How We Use Data</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#payments" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Payments & Security</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#cookies" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Cookies & Advertising</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#sharing" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Sharing Information</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#rights" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Your Rights</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#contact" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Contact</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>

                        <div class="mt-8 p-6 bg-navy rounded-2xl text-white">
                            <p class="text-[10px] font-black uppercase tracking-[0.25em] text-blue mb-3">Privacy help</p>
                            <p class="text-sm text-gray-300 leading-relaxed mb-5">For account, order, or privacy requests, email us and include the order number or checkout email when relevant.</p>
                            <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-block w-full py-3 bg-blue text-white text-center text-xs font-bold rounded-xl hover:bg-white hover:text-navy transition-all">Email Support</a>
                        </div>
                    </div>
                </aside>

                <!-- Content Area -->
                <div class="lg:w-3/4">
                    <div class="prose prose-blue max-w-none text-foreground-muted privacy-policy">

                        <!-- Overview Section -->
                        <div id="overview" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Privacy Overview
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">We collect only the information needed to run a clear ecommerce experience.</h2>
                            <p class="lead text-lg text-navy font-medium">
                                This Privacy Policy explains how <?php echo esc_html($brand_name); ?> handles information when you visit our website, create or use a customer account, place an order, request a return, track a shipment, subscribe to marketing, or contact support.
                            </p>
                            <p>
                                Our website sells activewear and sportswear products, including dry-fit style t-shirts, tracksuits, training sets, tank tops, and activewear bottoms. The information we collect is used to process orders, deliver products, provide support, improve the shopping experience, prevent fraud, and meet applicable legal or tax obligations.
                            </p>
                            <p>
                                We aim to keep privacy information easy to find and written in plain language. This supports customer trust and helps shoppers understand what happens before, during, and after checkout.
                            </p>

                            <div class="grid md:grid-cols-3 gap-5 mt-8 not-prose">
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Order Data</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Used to process payment, prepare items, ship packages, and provide tracking.</p>
                                </div>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Support Data</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Used to answer questions about sizing, delivery, returns, defects, or refunds.</p>
                                </div>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Site Data</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Used to keep the store secure, measure performance, and improve product discovery.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Information Section -->
                        <div id="information" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Information We Collect
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Types of personal information collected.</h2>
                            <p>
                                The exact information collected depends on how you use the site. We may collect the following categories of information directly from you, automatically through the website, or from service providers that help us operate the store.
                            </p>

                            <div class="bg-white p-6 md:p-8 rounded-2xl border border-border shadow-sm not-prose my-8">
                                <div class="grid md:grid-cols-2 gap-8">
                                    <div>
                                        <h3 class="text-lg font-bold text-navy mb-3">Checkout and order information</h3>
                                        <p class="text-foreground-muted leading-relaxed">
                                            Name, email address, phone number, billing address, shipping address, product selections, size or color selections, order number, payment status, shipment status, and return or refund history.
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-navy mb-3">Customer support information</h3>
                                        <p class="text-foreground-muted leading-relaxed">
                                            Messages you send to us, order details you provide, product photos for damaged or incorrect item claims, fit or sizing questions, and records needed to resolve support cases.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Information you provide</h3>
                            <ul>
                                <li>Contact details such as name, email address, phone number, and shipping or billing address.</li>
                                <li>Order details such as purchased items, sizes, colors, quantities, discount codes, delivery preferences, and customer notes.</li>
                                <li>Account details if customer account features are available, such as login email, order history, saved addresses, and account preferences.</li>
                                <li>Return and support details such as photos, issue descriptions, package condition, size labels, and communication history.</li>
                                <li>Marketing preferences such as newsletter subscription status, email preferences, and opt-out requests.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Information collected automatically</h3>
                            <ul>
                                <li>Device and browser details, such as IP address, browser type, operating system, language settings, and approximate location based on technical data.</li>
                                <li>Website usage details, such as pages viewed, products clicked, cart activity, checkout steps, referring URLs, timestamps, and error logs.</li>
                                <li>Cookie and analytics identifiers used to remember cart contents, measure traffic, prevent fraud, and understand how customers use the website.</li>
                            </ul>
                        </div>

                        <!-- Use Section -->
                        <div id="use" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                How We Use Data
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">How your information supports shopping, delivery, and support.</h2>
                            <p>
                                We use customer information for specific business purposes connected to running an activewear ecommerce store. We do not use your information in ways that are unrelated to the services requested without an appropriate reason or consent where required.
                            </p>
                            <ul>
                                <li><strong>Order processing:</strong> To confirm purchases, process payment, prepare items, verify order details, and send order confirmations.</li>
                                <li><strong>Shipping and tracking:</strong> To provide carriers with delivery details, send tracking notifications, and help resolve delivery issues.</li>
                                <li><strong>Customer support:</strong> To answer questions, help with sizing or product information, investigate damaged or incorrect items, and process return or refund requests.</li>
                                <li><strong>Store security:</strong> To detect fraud, prevent unauthorized transactions, troubleshoot technical errors, and protect the integrity of checkout.</li>
                                <li><strong>Website improvement:</strong> To understand product browsing behavior, improve navigation, fix performance issues, and make product pages easier to use.</li>
                                <li><strong>Marketing communication:</strong> To send promotional emails or updates only where permitted, and to honor unsubscribe or opt-out preferences.</li>
                                <li><strong>Legal and operational records:</strong> To maintain transaction records, comply with tax or accounting duties, enforce store policies, and respond to lawful requests.</li>
                            </ul>

                            <div class="bg-navy rounded-2xl p-6 md:p-10 text-white relative overflow-hidden not-prose mt-8">
                                <div class="absolute top-0 right-0 w-64 h-64 bg-blue/10 rounded-full blur-[80px] -mr-32 -mt-32"></div>
                                <div class="relative z-10 grid md:grid-cols-2 gap-8">
                                    <div>
                                        <p class="text-blue font-bold uppercase tracking-widest text-xs mb-3">Activewear-specific support</p>
                                        <div class="text-3xl font-black mb-4">Fit, condition, and return review</div>
                                        <p class="text-gray-400 leading-relaxed">
                                            Because activewear is worn close to the body, we may review product photos, tags, packaging, and condition details when handling return, exchange, damaged item, or incorrect item requests.
                                        </p>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Order numbers help us verify purchases before making account or refund changes.</p>
                                        </div>
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Photos may be requested for damaged, defective, incorrect, or condition-related claims.</p>
                                        </div>
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Support records help us avoid duplicate cases and provide consistent responses.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payments Section -->
                        <div id="payments" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Payments & Security
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Secure checkout and payment handling.</h2>
                            <p>
                                Checkout pages are intended to use secure SSL encryption to protect personal information submitted during payment and transaction processing. Payment card details are handled by secure payment processors, and we do not store full raw credit card numbers on our website servers.
                            </p>
                            <p>
                                Payment processors may collect and process payment information, billing details, fraud signals, and transaction identifiers according to their own privacy and security practices. We receive limited information needed to confirm payment status, complete fulfillment, issue refunds, and maintain order records.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Security measures</h3>
                            <ul>
                                <li>SSL encryption for sensitive data transmitted through checkout and account areas.</li>
                                <li>Limited access to customer information based on business need.</li>
                                <li>Use of payment processors and ecommerce tools designed for secure transaction handling.</li>
                                <li>Monitoring for suspicious checkout behavior, unauthorized access attempts, and technical errors.</li>
                                <li>Reasonable administrative, technical, and organizational safeguards to protect personal information.</li>
                            </ul>
                            <p>
                                No website, system, or transmission method is completely risk-free. If we become aware of a security issue affecting your information, we will take appropriate steps based on the nature of the issue and applicable requirements.
                            </p>
                        </div>

                        <!-- Cookies Section -->
                        <div id="cookies" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Cookies & Advertising
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Cookies help the store work and help us measure performance.</h2>
                            <p>
                                Cookies, pixels, tags, and similar technologies may be used to keep the cart working, remember preferences, understand website traffic, measure campaign performance, prevent fraud, and improve product discovery.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Types of cookies we may use</h3>
                            <ul>
                                <li><strong>Essential cookies:</strong> Required for cart functionality, checkout, account login, security, and session management.</li>
                                <li><strong>Analytics cookies:</strong> Help us understand pages viewed, products clicked, checkout flow performance, and site errors.</li>
                                <li><strong>Advertising cookies:</strong> May help measure ads, understand campaign results, and show more relevant offers where permitted.</li>
                                <li><strong>Preference cookies:</strong> Remember choices such as region, currency, language, or recently viewed products where available.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Managing cookies</h3>
                            <p>
                                You can usually control cookies through your browser settings. Blocking some cookies may affect cart, checkout, login, product recommendation, or tracking features. Where a cookie consent tool is available on the site, you can use it to manage optional cookie preferences.
                            </p>
                            <p>
                                We may use analytics and advertising tools, including tools connected to search, shopping, or social platforms, to understand store performance and campaign effectiveness. These tools may process browser, device, and interaction data according to their own policies.
                            </p>
                        </div>

                        <!-- Sharing Section -->
                        <div id="sharing" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Sharing Information
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">We share information only when needed to operate the store.</h2>
                            <p>
                                We do not sell personal information as a standalone customer list. We may share limited information with service providers and partners that help us run the website, process transactions, fulfill orders, provide support, measure performance, and comply with legal requirements.
                            </p>

                            <div class="grid md:grid-cols-2 gap-5 my-8 not-prose">
                                <div class="bg-white rounded-2xl border border-border p-6 summary-card">
                                    <h3 class="text-lg font-bold text-navy mb-3">Fulfillment partners</h3>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Shipping carriers, warehouse or fulfillment services, return processors, and delivery support tools may receive order and address details.</p>
                                </div>
                                <div class="bg-white rounded-2xl border border-border p-6 summary-card">
                                    <h3 class="text-lg font-bold text-navy mb-3">Store operations</h3>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Ecommerce platforms, payment processors, fraud tools, email providers, analytics tools, and support systems may process limited customer data.</p>
                                </div>
                            </div>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Situations where sharing may occur</h3>
                            <ul>
                                <li>With payment processors to authorize payments, verify fraud signals, process refunds, and maintain transaction records.</li>
                                <li>With shipping carriers and fulfillment providers to deliver orders, provide tracking, and resolve delivery issues.</li>
                                <li>With email and support tools to send order updates, respond to customer messages, and manage support cases.</li>
                                <li>With analytics and advertising providers to measure website performance and campaign results, subject to applicable consent and opt-out settings.</li>
                                <li>With professional advisers, tax, accounting, compliance, or legal providers when needed for business records or obligations.</li>
                                <li>With authorities, courts, or other parties if required by law, to enforce policies, or to protect rights, safety, customers, or the website.</li>
                                <li>In connection with a business transfer, such as a merger, acquisition, restructuring, or sale of assets, where customer records are part of the transferred business.</li>
                            </ul>
                        </div>

                        <!-- Retention Section -->
                        <div id="retention" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Retention & Transfers
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">How long we keep information.</h2>
                            <p>
                                We keep personal information only for as long as reasonably necessary for the purposes described in this policy, unless a longer period is required or permitted by law. Retention periods may vary based on order status, tax or accounting rules, warranty or return needs, fraud prevention, dispute handling, and customer support history.
                            </p>
                            <ul>
                                <li>Order and transaction records may be kept for accounting, tax, audit, refund, chargeback, and legal record purposes.</li>
                                <li>Support records may be kept to resolve issues, maintain service quality, and protect against repeat fraud or duplicate claims.</li>
                                <li>Marketing records are kept until you unsubscribe, opt out, or the information is no longer needed for the original purpose.</li>
                                <li>Technical logs may be kept for security, troubleshooting, analytics, and fraud prevention for a limited operational period.</li>
                            </ul>
                            <p>
                                Because ecommerce tools, payment processors, carriers, and support providers may operate in different locations, your information may be processed in countries other than where you live. When this occurs, we rely on appropriate safeguards and service provider commitments where required.
                            </p>
                        </div>

                        <!-- Rights Section -->
                        <div id="rights" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Your Privacy Rights
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">You can ask us about your personal information.</h2>
                            <p>
                                Depending on where you live, you may have rights to access, correct, delete, restrict, or receive a copy of certain personal information. You may also have the right to object to or opt out of certain processing, including some marketing or targeted advertising activities.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Requests you can make</h3>
                            <ul>
                                <li>Request confirmation of whether we process information associated with your email address or order.</li>
                                <li>Request access to certain personal information connected to your account, orders, or support history.</li>
                                <li>Request correction of inaccurate contact, shipping, billing, or account information.</li>
                                <li>Request deletion of eligible personal information, subject to records we must keep for legal, tax, fraud prevention, dispute, or transaction purposes.</li>
                                <li>Unsubscribe from promotional emails by using the unsubscribe link in the email or contacting support.</li>
                                <li>Ask questions about cookies, advertising preferences, or available opt-out options.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">How we verify requests</h3>
                            <p>
                                To protect customer accounts and order records, we may ask you to verify your identity before completing a privacy request. Verification may include confirming the order number, checkout email, shipping details, or other information reasonably connected to the request.
                            </p>
                            <p>
                                We will not discriminate against you for exercising privacy rights. Some requests may be limited if we need information to complete an order, process a refund, comply with law, prevent fraud, or maintain security.
                            </p>
                        </div>

                        <!-- Children Section -->
                        <div id="children" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Additional Notices
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Children, policy updates, and third-party links.</h2>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Children's privacy</h3>
                            <p>
                                Our website is intended for general ecommerce customers and is not directed to children under 13. We do not knowingly collect personal information from children under 13. If you believe a child has provided personal information to us, contact us so we can review and take appropriate action.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Third-party links and platforms</h3>
                            <p>
                                Our website may link to third-party services, payment pages, carrier tracking pages, social platforms, or product-related resources. Their privacy practices are controlled by their own policies, not this Privacy Policy. Review their policies before submitting information to them.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Changes to this policy</h3>
                            <p>
                                We may update this Privacy Policy to reflect changes in our store operations, service providers, legal requirements, or customer support process. The "Last Updated" date shows when the current version became effective.
                            </p>
                        </div>

                        <!-- Contact Section -->
                        <div id="contact" class="scroll-mt-32 mb-16 policy-section policy-section-last">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-navy text-white font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Contact
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Contact us about privacy.</h2>
                            <p>
                                If you have questions about this Privacy Policy, want to make a privacy request, or need help with information connected to an order, contact our support team.
                            </p>

                            <div class="space-y-4 not-prose mt-8">
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8m-18 8h18a2 2 0 002-2V8a2 2 0 00-2-2H3a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Email support</h4>
                                        <p class="text-foreground-muted leading-relaxed"><a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-blue font-bold hover:underline"><?php echo esc_html($support_email); ?></a></p>
                                    </div>
                                </div>
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Business hours</h4>
                                        <p class="text-foreground-muted leading-relaxed"><?php echo esc_html($business_hours); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-14 pt-8 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-6">
                            <p class="text-sm font-bold text-navy/40 uppercase tracking-widest">Last Updated: <?php echo esc_html($last_updated); ?></p>
                            <div class="flex flex-wrap justify-center gap-4">
                                <a href="/shipping-returns/" class="text-sm font-bold text-blue hover:underline">Shipping & Returns</a>
                                <span class="text-border">|</span>
                                <a href="/terms-conditions/" class="text-sm font-bold text-blue hover:underline">Terms & Conditions</a>
                                <span class="text-border">|</span>
                                <a href="/contact-us/" class="text-sm font-bold text-blue hover:underline">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support CTA Section -->
    <section class="py-20 md:py-32 bg-navy relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle,rgba(59,130,246,0.3)_0%,transparent_70%)]"></div>
        </div>
        <div class="mx-auto max-w-5xl px-6 relative z-10 text-center">
            <h2 class="text-4xl md:text-6xl font-heading font-black text-white mb-8">Need privacy or order help?</h2>
            <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto">
                Contact our support team for privacy requests, account questions, checkout concerns, or help with order information.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="px-12 py-5 bg-blue hover:bg-white hover:text-navy text-white font-bold rounded-2xl transition-all duration-300 shadow-lg shadow-blue/20">
                    Email Support
                </a>
                <a href="/contact-us/" class="px-12 py-5 border-2 border-white/20 hover:border-white text-white font-bold rounded-2xl transition-all duration-300">
                    Contact Us
                </a>
                <a href="/shipping-returns/" class="px-12 py-5 border-2 border-white/20 hover:border-white text-white font-bold rounded-2xl transition-all duration-300">
                    Shipping & Returns
                </a>
            </div>
        </div>
    </section>
</div>

<style>
    html {
        scroll-behavior: smooth;
    }

    .privacy-policy {
        color: #4b5563;
        font-size: 16px;
        line-height: 1.78;
    }

    .privacy-policy .policy-section {
        padding-bottom: 3.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .privacy-policy .policy-section-last {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .privacy-policy .policy-label {
        line-height: 1;
    }

    .privacy-policy .policy-section p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .privacy-policy .policy-section p:last-child {
        margin-bottom: 0;
    }

    .privacy-policy .lead {
        line-height: 1.65;
        margin-bottom: 1rem;
    }

    .privacy-policy .policy-section h2,
    .privacy-policy .policy-section h3,
    .privacy-policy .policy-section h4 {
        letter-spacing: 0;
    }

    .privacy-policy .policy-section h3 {
        line-height: 1.25;
    }

    .privacy-policy .policy-section a {
        color: #2563eb;
        font-weight: 700;
        text-decoration: none;
    }

    .privacy-policy .policy-section a:hover {
        text-decoration: underline;
    }

    .privacy-policy .policy-section ul {
        display: grid;
        gap: 0.7rem;
        margin: 0.75rem 0 0;
        padding: 0;
        list-style: none;
    }

    .privacy-policy .policy-section li {
        position: relative;
        padding-left: 1.45rem;
        line-height: 1.65;
    }

    .privacy-policy .policy-section li::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0.72em;
        width: 0.45rem;
        height: 0.45rem;
        border-radius: 999px;
        background: #2563eb;
    }

    .privacy-policy .summary-card {
        box-shadow: 0 12px 28px rgba(11, 31, 51, 0.04);
    }

    @media (max-width: 767px) {
        .privacy-policy {
            font-size: 15px;
            line-height: 1.72;
        }

        .privacy-policy .policy-section {
            padding-bottom: 2.5rem;
        }

        .privacy-policy .policy-label {
            margin-bottom: 1rem;
        }
    }
</style>
