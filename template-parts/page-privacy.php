<?php
/**
 * Privacy Policy — MozTire
 */
$f = dawp_store_facts();
$email = '<a href="mailto:' . esc_attr($f['email']) . '">' . esc_html($f['email']) . '</a>';

dawp_page_hero([
    'title'   => 'Privacy Policy',
    'eyebrow' => 'Your data',
    'lead'    => 'What information MozTire collects, why we collect it, who we share it with, and the choices you have.',
]);

dawp_policy_body([
    [
        'id'    => 'scope',
        'title' => 'Who we are and what this covers',
        'html'  => '
            <p>This Privacy Policy explains how ' . esc_html($f['brand']) . ' ("MozTire", "we", "us") collects, uses and shares personal information when you visit ' . esc_html($f['domain']) . ', create an account, place an order, pay through PayPal, subscribe to emails, or contact customer support.</p>
            <p>By using the website you agree to the practices described here. If you do not agree, please do not use the site.</p>',
    ],
    [
        'id'    => 'collect',
        'title' => 'Information we collect',
        'html'  => '
            <h3>Information you give us</h3>
            <ul>
                <li><strong>Order details:</strong> name, billing and shipping address (including an installer\'s address if you choose one), email, phone number and the tires you buy.</li>
                <li><strong>Account details:</strong> login email and password if you create an account.</li>
                <li><strong>Support messages:</strong> anything you send us, such as tire size, vehicle details, or photos for a return or warranty claim.</li>
                <li><strong>Newsletter:</strong> your email address if you subscribe.</li>
            </ul>
            <h3>Payment information from PayPal</h3>
            <p>All payments are processed by <strong>PayPal</strong>. You enter your payment details directly with PayPal, not on our site. <strong>We never receive or store your full card number, security code, bank login or PayPal password.</strong></p>
            <p>When you pay, PayPal shares with us only what we need to complete and support your order: your name, email address, shipping address, the payment status, the amount, and a PayPal transaction ID. PayPal\'s handling of your information is governed by the <a href="https://www.paypal.com/us/legalhub/privacy-full" target="_blank" rel="noopener">PayPal Privacy Statement</a>.</p>
            <h3>Information collected automatically</h3>
            <p>When you browse the site we collect device and usage data such as IP address, browser type, device type, pages viewed, search terms (including tire sizes searched), referring pages and approximate location derived from IP address, using cookies and similar technologies.</p>',
    ],
    [
        'id'    => 'use',
        'title' => 'How we use your information',
        'html'  => '
            <table>
                <thead><tr><th>Purpose</th><th>Information used</th></tr></thead>
                <tbody>
                    <tr><td>Process your order, confirm PayPal payment, ship your tires and send order and tracking emails</td><td>Order details, PayPal transaction details</td></tr>
                    <tr><td>Handle returns, refunds through PayPal, PayPal disputes and warranty questions</td><td>Order details, support messages, photos</td></tr>
                    <tr><td>Answer fitment and customer-service questions</td><td>Support messages, vehicle and tire details</td></tr>
                    <tr><td>Detect and prevent fraud and protect the site</td><td>Order, payment status, device and usage data</td></tr>
                    <tr><td>Improve our catalog, search and tire finder</td><td>Usage data, searches</td></tr>
                    <tr><td>Send marketing emails, only if you opted in</td><td>Email address</td></tr>
                    <tr><td>Meet legal, tax and accounting obligations</td><td>Order and payment records</td></tr>
                </tbody>
            </table>',
    ],
    [
        'id'    => 'share',
        'title' => 'How we share information',
        'html'  => '
            <p><strong>We do not sell your personal information, and we do not share it for cross-context behavioral advertising.</strong> We share it only with service providers who help us run the store, under terms that limit their use of it:</p>
            <ul>
                <li><strong>PayPal</strong>, to process payments, refunds and disputes, and to help prevent fraud;</li>
                <li><strong>Shipping carriers and fulfillment partners</strong> (such as UPS, FedEx or regional freight carriers), to deliver your order, including to your chosen installer;</li>
                <li><strong>Hosting, email, analytics and customer-support providers</strong> that run our website and communications;</li>
                <li><strong>Tire manufacturers</strong>, only when you ask us to help with a warranty claim;</li>
                <li><strong>Authorities or other parties</strong>, when required by law, or to protect our rights, customers and the security of the site.</li>
            </ul>
            <p>If MozTire is involved in a merger, acquisition or sale of assets, customer information may be transferred as part of that transaction, subject to this policy.</p>',
    ],
    [
        'id'    => 'cookies',
        'title' => 'Cookies',
        'html'  => '
            <ul>
                <li><strong>Essential cookies</strong> keep your cart, login and checkout working. PayPal may also set its own cookies when you use the PayPal checkout.</li>
                <li><strong>Analytics cookies</strong> help us understand which pages and tire sizes are popular so we can improve the site.</li>
            </ul>
            <p>You can block or delete cookies in your browser settings, but blocking essential cookies may stop the cart and checkout from working. Where your browser sends a Global Privacy Control signal, we treat it as a request to opt out as required by applicable law.</p>',
    ],
    [
        'id'    => 'retention',
        'title' => 'Data retention and security',
        'html'  => '
            <p>We keep order and payment records for as long as needed to fulfill orders, handle returns, refunds, PayPal disputes and warranty questions, and meet tax and legal requirements, typically up to 7 years. Support messages and newsletter data are kept until they are no longer needed or you ask us to delete them.</p>
            <p>We protect your information with HTTPS encryption across the entire site, restricted staff access and reputable service providers. Payment data is handled by PayPal, not stored by us. No online system is completely secure, so please use a strong, unique password for your account and never share it.</p>',
    ],
    [
        'id'    => 'rights',
        'title' => 'Your rights and choices',
        'html'  => '
            <p>Depending on where you live, including California under the CCPA/CPRA and other U.S. state privacy laws, you may have the right to:</p>
            <ul>
                <li>Know what personal information we hold about you and receive a copy;</li>
                <li>Correct inaccurate information;</li>
                <li>Request deletion of your information, subject to legal exceptions such as tax records;</li>
                <li>Opt out of the sale or sharing of personal information (we do not sell or share it);</li>
                <li>Opt out of marketing emails at any time using the unsubscribe link.</li>
            </ul>
            <p>To make a request, email ' . $email . ' from the address on your account or order. We will verify your identity and respond within 45 days, or the time required by law. You may use an authorized agent with written permission. We will not discriminate against you for exercising your rights.</p>
            <p>To manage information held by PayPal, such as saved cards or bank accounts, please use your PayPal account settings or contact PayPal.</p>',
    ],
    [
        'id'    => 'children',
        'title' => 'Children',
        'html'  => '
            <p>The website is intended for adults. We do not knowingly collect personal information from children under 13. If you believe a child has provided us with information, contact us and we will delete it.</p>',
    ],
    [
        'id'    => 'changes',
        'title' => 'Changes and contact',
        'html'  => '
            <p>We may update this policy from time to time. The "Last updated" date above shows when it last changed, and material changes apply only to information collected after the update. Questions about privacy? Email ' . $email . '.</p>',
    ],
], 'October 17, 2026');
