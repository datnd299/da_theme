<?php
/**
 * Terms of Service- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

dawp_render_legal([
    'title'   => __('Terms of Service', 'dawp'),
    'updated' => __('September 11, 2026', 'dawp'),
    'intro'   => __('These Terms of Service govern your access to and use of the Watchfavor website and any purchase you make from us. Please read them carefully before placing an order.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Acceptance of Terms', 'dawp'),
            'body'    => '<p>' . esc_html__('By accessing or using this website, browsing our products, or placing an order, you agree to be bound by these Terms of Service and our Privacy Policy. If you do not agree, please do not use this site.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Eligibility', 'dawp'),
            'body'    => '<p>' . esc_html__('You must be at least 18 years old, or the age of majority in your jurisdiction, and able to form a legally binding contract to place an order on this site. By ordering, you represent that you meet this requirement.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Use of the Site', 'dawp'),
            'body'    => '<p>' . esc_html__('You agree to use this site only for lawful purposes. You may not attempt to disrupt or overload its operation, access accounts or data without authorization, introduce malicious code, scrape or copy site content without permission, or use the site to submit false or fraudulent orders.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Account Registration', 'dawp'),
            'body'    => '<p>' . esc_html__('You may need to create an account to place an order or track purchases. You are responsible for keeping your account credentials confidential and for all activity under your account. Notify us immediately if you suspect unauthorized use.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Products & Pricing', 'dawp'),
            'body'    => '<p>' . esc_html__('We make every effort to display accurate product descriptions, specifications, images and pricing, all listed in US Dollars. Colors and finish may vary slightly from photos due to display settings and natural material variation.', 'dawp') . '</p>'
                . '<p>' . esc_html__('In the event of a pricing, description or listing error, we reserve the right to cancel any order placed at the incorrect price or based on the incorrect listing, and to issue a full refund through PayPal, even after an order confirmation has been sent.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Orders & Acceptance', 'dawp'),
            'body'    => '<p>' . esc_html__('Placing an order through checkout is an offer to purchase, which we may accept or decline for any lawful reason, including suspected fraud, pricing errors, or unavailable inventory. A contract of sale is formed only when we confirm and dispatch your order.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Payment', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('All payments on this site are processed securely through PayPal, which accepts PayPal balance, linked bank payments, and major credit/debit cards without requiring a PayPal account. Your payment method is charged at the time your order is placed. See our <a href="%s">Billing Terms & Conditions</a> for full details.', 'dawp')),
                esc_url(home_url('/billing-terms-conditions/'))
            ) . '</p>',
        ],
        [
            'heading' => __('Shipping & Delivery', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('We currently ship to addresses within the United States only. Estimated delivery times, costs and carrier information are set out in our <a href="%s">Shipping Policy</a>, which forms part of these Terms.', 'dawp')),
                esc_url(home_url('/shipping-policy/'))
            ) . '</p>',
        ],
        [
            'heading' => __('Returns, Refunds & Warranty', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('Returns, refunds, exchanges and warranty coverage are governed by our <a href="%s">Return & Refund Policy</a>, which forms part of these Terms.', 'dawp')),
                esc_url(home_url('/return-refund-policy/'))
            ) . '</p>',
        ],
        [
            'heading' => __('Intellectual Property', 'dawp'),
            'body'    => '<p>' . esc_html__('All content on this site- including product designs, photography, graphics, text, logos and the Watchfavor name and marks- is the property of Watchfavor or its licensors and is protected by copyright and trademark law. You may not reproduce, distribute, or create derivative works from this content without our prior written permission.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Third-Party Links & Services', 'dawp'),
            'body'    => '<p>' . esc_html__('Our checkout process links to PayPal, a third-party service with its own terms of use and privacy policy. We are not responsible for the availability, content, or practices of PayPal or any other third-party site linked from ours.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Disclaimer of Warranties', 'dawp'),
            'body'    => '<p>' . esc_html__('This site and its content are provided "as is" without warranties of any kind, express or implied, except for the express product warranty described in our Return & Refund Policy. We do not warrant that the site will be uninterrupted, secure, or error-free.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Limitation of Liability', 'dawp'),
            'body'    => '<p>' . esc_html__('To the fullest extent permitted by law, Watchfavor and its owners, employees and suppliers are not liable for any indirect, incidental, special or consequential damages arising from your use of this site or products purchased from it. Our total liability for any claim is limited to the amount you paid for the product giving rise to the claim.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Indemnification', 'dawp'),
            'body'    => '<p>' . esc_html__('You agree to indemnify and hold Watchfavor harmless from any claims, losses, or expenses arising from your misuse of this site or violation of these Terms.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Governing Law & Dispute Resolution', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: governing jurisdiction */
                esc_html__('These Terms are governed by the laws of %s, without regard to its conflict-of-law principles. Any dispute arising from these Terms or your use of this site will be resolved in the state or federal courts located in that jurisdiction, and you consent to their personal jurisdiction.', 'dawp'),
                esc_html(dawp_store_governing_law())
            ) . '</p>',
        ],
        [
            'heading' => __('Severability', 'dawp'),
            'body'    => '<p>' . esc_html__('If any provision of these Terms is found unenforceable, that provision will be limited or eliminated to the minimum extent necessary, and the remaining provisions will remain in full effect.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Changes to These Terms', 'dawp'),
            'body'    => '<p>' . esc_html__('We may update these Terms from time to time. The "Last updated" date above reflects the most recent revision. Continued use of the site after changes are posted constitutes acceptance of the revised Terms.', 'dawp') . '</p>',
        ],
    ],
]);
