<?php
/**
 * Privacy Policy- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

dawp_render_legal([
    'title'   => __('Privacy Policy', 'dawp'),
    'updated' => __('September 11, 2026', 'dawp'),
    'intro'   => __('This Privacy Policy explains what personal information Watchfavor collects when you visit watchfavor.com or place an order, how we use and share it, and the choices and rights you have. By using this site, you agree to the practices described below.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Information We Collect', 'dawp'),
            'body'    => '<p>' . esc_html__('We collect information you provide directly to us and information collected automatically as you use the site.', 'dawp') . '</p>'
                . '<p><strong>' . esc_html__('Information you give us:', 'dawp') . '</strong> ' . esc_html__('name, email address, shipping and billing address, phone number, and any details you include in an order note, contact form, or customer service message.', 'dawp') . '</p>'
                . '<p><strong>' . esc_html__('Payment information:', 'dawp') . '</strong> ' . esc_html__('Watchfavor never sees or stores your full card number. All payments are processed by PayPal; PayPal collects your card, bank or PayPal account details directly and shares with us only the transaction status, amount, order reference, and buyer name/email needed to fulfill your order.', 'dawp') . '</p>'
                . '<p><strong>' . esc_html__('Information collected automatically:', 'dawp') . '</strong> ' . esc_html__('IP address, browser and device type, pages viewed, referring URL, and approximate location, collected through cookies and similar technologies as described below.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('How We Use Your Information', 'dawp'),
            'body'    => '<ul>'
                . '<li>' . esc_html__('To process, verify, ship and fulfill your orders, and to process payments and refunds through PayPal', 'dawp') . '</li>'
                . '<li>' . esc_html__('To communicate about your order, shipping updates, returns, and customer support requests', 'dawp') . '</li>'
                . '<li>' . esc_html__('To send marketing emails or promotions, only if you opted in, and you may unsubscribe at any time', 'dawp') . '</li>'
                . '<li>' . esc_html__('To maintain your shopping cart and account, and remember your preferences', 'dawp') . '</li>'
                . '<li>' . esc_html__('To analyze site traffic and improve our products, content and customer experience', 'dawp') . '</li>'
                . '<li>' . esc_html__('To detect, investigate and prevent fraud, unauthorized transactions, and abuse of our site', 'dawp') . '</li>'
                . '<li>' . esc_html__('To comply with tax, accounting, and other legal obligations', 'dawp') . '</li>'
                . '</ul>',
        ],
        [
            'heading' => __('Sharing Your Information', 'dawp'),
            'body'    => '<p>' . esc_html__('We do not sell or rent your personal information. We share information only with service providers who need it to operate the store, and only to the extent required to provide their service:', 'dawp') . '</p>'
                . '<ul>'
                . '<li>' . esc_html__('PayPal- to process payments and refunds. PayPal acts as an independent controller of the data it collects; its use of your information is governed by the PayPal Privacy Statement at paypal.com/privacy.', 'dawp') . '</li>'
                . '<li>' . esc_html__('Shipping carriers (such as USPS and UPS)- to deliver your order and provide tracking.', 'dawp') . '</li>'
                . '<li>' . esc_html__('Website hosting, email delivery, and analytics providers- to run the site, send order and support emails, and understand site performance.', 'dawp') . '</li>'
                . '<li>' . esc_html__('Government or law enforcement authorities, when required to comply with a legal obligation, protect our rights, or investigate fraud.', 'dawp') . '</li>'
                . '</ul>',
        ],
        [
            'heading' => __('Payment Processing & PayPal', 'dawp'),
            'body'    => '<p>' . esc_html__('All checkout payments on watchfavor.com are processed securely by PayPal. When you pay, you are directed to PayPal to complete the transaction using your PayPal balance, linked bank account, or a credit/debit card- a PayPal account is not required to pay by card.', 'dawp') . '</p>'
                . '<p>' . esc_html__('Because PayPal handles the payment step directly, your full card or bank details are entered into PayPal\'s systems, not ours, and are never stored on Watchfavor servers. PayPal\'s collection and use of your payment information is described in PayPal\'s own privacy policy and terms.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Cookies & Tracking Technologies', 'dawp'),
            'body'    => '<p>' . esc_html__('We use cookies and similar technologies to keep your cart working, remember sign-in and preferences, measure site traffic, and understand which pages and products are most useful to visitors. PayPal may also set its own cookies during checkout for fraud prevention and to keep your payment session secure.', 'dawp') . '</p>'
                . '<p>' . esc_html__('You can control or disable cookies in your browser settings at any time. Blocking cookies may prevent parts of the site, including checkout, from working correctly.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Data Security', 'dawp'),
            'body'    => '<p>' . esc_html__('This site uses SSL/TLS encryption to protect data in transit. Payment data is handled entirely within PayPal\'s PCI-DSS compliant systems- we never transmit or store your full payment card number. We limit access to personal information to staff and service providers who need it to operate the store.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Data Retention', 'dawp'),
            'body'    => '<p>' . esc_html__('We retain order and account information for as long as needed to fulfill orders, provide warranty and customer service, comply with tax, accounting and other legal obligations, and resolve disputes. When information is no longer needed for these purposes, we delete or anonymize it.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Your Rights & Choices', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('Depending on where you live, you may have the right to request access to, correction of, or deletion of your personal information, to object to or restrict certain processing, or to receive a copy of your data. You may also opt out of marketing emails at any time using the unsubscribe link in any email, or by <a href="%s">contacting us</a>.', 'dawp')),
                esc_url(home_url('/contact-us/?topic=privacy'))
            ) . '</p>'
                . '<p>' . esc_html__('California residents have specific rights under the California Consumer Privacy Act (CCPA), including the right to know what personal information we collect and to request deletion of it. We do not sell personal information. EU/UK visitors may have rights under the GDPR, including the right to lodge a complaint with a supervisory authority.', 'dawp') . '</p>',
        ],
        [
            'heading' => __("Children's Privacy", 'dawp'),
            'body'    => '<p>' . esc_html__('This site is not directed to children under 16, and we do not knowingly collect personal information from children. If you believe a child has provided us with personal information, please contact us and we will delete it.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Third-Party Links', 'dawp'),
            'body'    => '<p>' . esc_html__('Our site may link to third-party sites, including PayPal during checkout and social media platforms. We are not responsible for the privacy practices of those third parties; please review their own privacy policies.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Changes to This Policy', 'dawp'),
            'body'    => '<p>' . esc_html__('We may update this Privacy Policy from time to time to reflect changes in our practices or for legal reasons. The "Last updated" date above reflects the most recent revision. Material changes will be posted on this page.', 'dawp') . '</p>',
        ],
    ],
]);
