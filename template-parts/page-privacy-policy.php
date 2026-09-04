<?php
/**
 * Privacy Policy — North Time Co.
 *
 * Hardcoded policy content. Covers what personal data is collected, how it is
 * used and shared, cookies, retention, security, and user rights (including
 * CCPA/CPRA and GDPR/UK GDPR) — as required by Google Merchant Center and
 * common privacy law. Kept consistent with the Terms of Service, Contact page,
 * and Billing Terms & Conditions.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email     = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';
$store     = function_exists('dawp_store_name') ? dawp_store_name() : 'North Time Co.';
$site_host = wp_parse_url(home_url(), PHP_URL_HOST);

dawp_render_legal([
    'title'   => __('Privacy Policy', 'dawp'),
    'updated' => __('September 4, 2026', 'dawp'),
    'intro'   => sprintf(
        /* translators: 1: store name, 2: website host */
        __('This Privacy Policy explains how %1$s ("we", "us", "our") collects, uses, shares, and protects personal information when you visit %2$s, place an order, or contact us. It also describes your privacy rights and how to exercise them.', 'dawp'),
        $store,
        $site_host
    ),
    'sections' => [
        [
            'heading' => __('Information we collect', 'dawp'),
            'body'    => '<p>' . esc_html__('We collect the following categories of personal information:', 'dawp') . '</p>'
                . '<p><strong>' . esc_html__('Information you give us:', 'dawp') . '</strong></p><ul>'
                . '<li>' . esc_html__('Contact details: name, email address, phone number (if you provide it), shipping address, and billing address;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Order details: the items you buy, order value, and order history;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Payment information: this is entered directly with PayPal, our payment processor. We receive a confirmation and limited details such as the payment method and, for card payments, the card type and last four digits, but not your full card number;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Communications: messages you send us by email or through our contact form, and your marketing preferences.', 'dawp') . '</li>'
                . '</ul>'
                . '<p><strong>' . esc_html__('Information collected automatically:', 'dawp') . '</strong></p><ul>'
                . '<li>' . esc_html__('Device and usage data: IP address, browser type, operating system, referring pages, pages viewed, and the dates and times of visits;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Cookies and similar technologies (see the Cookies section below).', 'dawp') . '</li>'
                . '</ul>'
                . '<p><strong>' . esc_html__('Information from third parties:', 'dawp') . '</strong> ' . esc_html__('We may receive fraud-screening results and delivery status updates from PayPal and our shipping carriers, and aggregated analytics from our analytics providers.', 'dawp') . '</p>'
                . '<p>' . esc_html__('We do not knowingly collect sensitive categories of data (such as health information, precise geolocation, or government identifiers) and we ask that you do not send them to us.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('How we use your information', 'dawp'),
            'body'    => '<ul>'
                . '<li>' . esc_html__('To process and deliver your orders, take payment, and issue refunds;', 'dawp') . '</li>'
                . '<li>' . esc_html__('To provide customer support and respond to your questions and warranty claims;', 'dawp') . '</li>'
                . '<li>' . esc_html__('To send transactional messages such as order confirmations and shipping updates;', 'dawp') . '</li>'
                . '<li>' . esc_html__('To prevent, detect, and investigate fraud, abuse, and security incidents;', 'dawp') . '</li>'
                . '<li>' . esc_html__('To send marketing emails where you have opted in, and to measure whether they are useful;', 'dawp') . '</li>'
                . '<li>' . esc_html__('To understand and improve our website, products, and service through analytics;', 'dawp') . '</li>'
                . '<li>' . esc_html__('To comply with our legal, tax, and accounting obligations and to enforce our terms.', 'dawp') . '</li>'
                . '</ul>'
                . '<p>' . esc_html__('Where required by law, our legal bases for processing are: performance of our contract with you (to fulfil orders), our legitimate interests (to run and secure the business and improve our service), your consent (for optional cookies and marketing), and compliance with a legal obligation.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('How we share your information', 'dawp'),
            'body'    => '<p>' . esc_html__('We do not sell your personal information. We share it only with:', 'dawp') . '</p><ul>'
                . '<li><strong>' . esc_html__('Payment processors', 'dawp') . '</strong> ' . esc_html__('(PayPal) to take payment and screen for fraud;', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('Shipping carriers', 'dawp') . '</strong> ' . esc_html__('(such as USPS and UPS) to deliver your order and provide tracking;', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('Technology providers', 'dawp') . '</strong> ' . esc_html__('that host the website, send our email, and provide analytics and security services, acting on our instructions;', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('Professional advisors and authorities', 'dawp') . '</strong> ' . esc_html__('where necessary to comply with the law, respond to a lawful request, or protect our rights, property, or safety;', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('A successor entity', 'dawp') . '</strong> ' . esc_html__('if the business is involved in a merger, acquisition, or sale of assets, subject to this policy.', 'dawp') . '</li>'
                . '</ul>',
        ],
        [
            'heading' => __('Cookies and tracking technologies', 'dawp'),
            'body'    => '<p>' . esc_html__('We use cookies and similar technologies for the following purposes:', 'dawp') . '</p><ul>'
                . '<li><strong>' . esc_html__('Essential:', 'dawp') . '</strong> ' . esc_html__('to keep your cart and session working and to secure the checkout. These cannot be switched off;', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('Analytics:', 'dawp') . '</strong> ' . esc_html__('to understand how the site is used so we can improve it;', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('Advertising:', 'dawp') . '</strong> ' . esc_html__('to measure our marketing and, where enabled, to show relevant ads on other sites.', 'dawp') . '</li>'
                . '</ul>'
                . '<p>' . esc_html__('You can control non-essential cookies through our cookie banner (where shown) and through your browser settings. Blocking some cookies may affect how the site works. Where we offer a "Do Not Sell or Share My Personal Information" control, you can also use it to opt out of advertising cookies.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Marketing communications', 'dawp'),
            'body'    => '<p>' . esc_html__('We send marketing email only if you opt in, for example by subscribing to our newsletter. You can unsubscribe at any time using the link in any marketing email or by contacting us. Unsubscribing from marketing does not stop transactional messages about your orders.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Data retention', 'dawp'),
            'body'    => '<p>' . esc_html__('We keep order and transaction records for as long as needed to provide the service and then for the period required by tax and accounting law (generally up to 7 years). Support messages are kept for up to 3 years. Marketing data is kept until you unsubscribe or ask us to delete it. Analytics data is retained on a rolling basis according to each provider\'s settings.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Security', 'dawp'),
            'body'    => '<p>' . esc_html__('The website uses TLS encryption. Payments are handled by PayPal, a PCI-DSS compliant processor, and we do not store card numbers. We limit access to personal data to staff and providers who need it. No method of transmission or storage is completely secure, so we cannot guarantee absolute security, but we work to protect your information and to notify you and the authorities of a data breach where the law requires it.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('International data transfers', 'dawp'),
            'body'    => '<p>' . esc_html__('We are based in the United States and process data there. If you contact us from outside the United States, your information will be transferred to and processed in the United States. Where required, we rely on appropriate safeguards such as Standard Contractual Clauses for transfers of personal data from the EEA or the UK.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Your privacy rights', 'dawp'),
            'body'    => '<p>' . esc_html__('Depending on where you live, you may have the right to:', 'dawp') . '</p><ul>'
                . '<li>' . esc_html__('Access the personal information we hold about you and request a copy;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Correct information that is inaccurate or incomplete;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Delete your personal information, subject to legal record-keeping requirements;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Opt out of marketing and of any "sale" or "sharing" of personal information for targeted advertising;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Restrict or object to certain processing, and request data portability;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Withdraw consent where processing is based on consent;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Not receive discriminatory treatment for exercising your rights.', 'dawp') . '</li>'
                . '</ul>'
                . '<p>' . sprintf(
                    /* translators: %s: support email link */
                    wp_kses_post(__('To make a request, email us at %s. We will verify your request and respond within the time required by law (generally 45 days under US state laws, or one month under the GDPR). You may use an authorized agent where the law allows.', 'dawp')),
                    '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
                ) . '</p>',
        ],
        [
            'heading' => __('California privacy rights', 'dawp'),
            'body'    => '<p>' . esc_html__('California residents have the rights described above under the CCPA/CPRA, including the right to know, delete, correct, and opt out of the sale or sharing of personal information, and to limit the use of sensitive personal information. In the past 12 months we have collected the categories of information described in "Information we collect" for the purposes described in "How we use your information", and disclosed identifiers, commercial information, and internet activity to the service providers described in "How we share your information". We do not sell personal information for money, and we do not knowingly sell or share the personal information of anyone under 16.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('EEA and UK privacy rights', 'dawp'),
            'body'    => '<p>' . esc_html__('If you are in the European Economic Area or the United Kingdom, you also have the right to lodge a complaint with your local data protection authority. We would appreciate the chance to address your concern first, so please contact us before doing so.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Children\'s privacy', 'dawp'),
            'body'    => '<p>' . esc_html__('This website is not directed to children, and we do not knowingly collect personal information from anyone under 16. If you believe a child has provided us with personal information, contact us and we will delete it.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Third-party links', 'dawp'),
            'body'    => '<p>' . esc_html__('Our website may contain links to other sites, such as PayPal and our carriers. This policy does not apply to those sites, and we are not responsible for their content or privacy practices. Please review their policies before providing any information.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Changes to this policy', 'dawp'),
            'body'    => '<p>' . esc_html__('We may update this policy to reflect changes in our practices or the law. The "last updated" date shows when it last changed. Significant changes will be highlighted on this page or communicated by email where appropriate.', 'dawp') . '</p>',
        ],
    ],
]);
