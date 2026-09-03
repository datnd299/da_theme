<?php
/**
 * Terms of Service — North Time Co.
 *
 * Hardcoded policy content: general terms of sale and website use, including
 * disclaimers and limitation of liability. Watch warranties vary by model and
 * are stated on each product page. Kept consistent with the Billing Terms &
 * Conditions, Shipping Policy, Return & Refund Policy, and Privacy Policy.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email     = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';
$store     = function_exists('dawp_store_name') ? dawp_store_name() : 'North Time Co.';
$governing = function_exists('dawp_store_governing_law') ? dawp_store_governing_law() : 'the United States';
$site_host = wp_parse_url(home_url(), PHP_URL_HOST);

dawp_render_legal([
    'title'   => __('Terms of Service', 'dawp'),
    'updated' => __('September 3, 2026', 'dawp'),
    'intro'   => sprintf(
        /* translators: 1: store name, 2: website host */
        __('These Terms of Service govern your use of %1$s (%2$s) and any purchase you make from us. By browsing this website or placing an order, you agree to these terms. Please also read our Privacy Policy, Shipping Policy, Return & Refund Policy, and Billing Terms & Conditions, which form part of these terms.', 'dawp'),
        $store,
        $site_host
    ),
    'sections' => [
        [
            'heading' => __('Who we are', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %1$s: store name */
                esc_html__('%1$s is an independent retailer of wristwatches and watch accessories serving customers in the United States. In these terms, "we", "us", and "our" refer to %1$s, and "you" refers to the person using the website or placing an order.', 'dawp'),
                esc_html($store)
            ) . '</p>',
        ],
        [
            'heading' => __('Eligibility', 'dawp'),
            'body'    => '<p>' . esc_html__('You must be at least 18 years old, or the age of majority in your state, and able to enter into a binding contract to place an order. By ordering, you confirm that the payment method used is yours and that the information you provide is accurate and complete.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Products, descriptions, and availability', 'dawp'),
            'body'    => '<p>' . esc_html__('We describe each watch as accurately as we can, including its movement, case size, strap material, and water resistance rating. Product photos are representative; slight variation in color or finish can occur between screens and production batches. All items are new and genuine, supplied in their original manufacturer packaging. We do not sell replica or counterfeit goods.', 'dawp') . '</p>'
                . '<p>' . esc_html__('Stock and pricing can change without notice. If an item becomes unavailable after you order, we will notify you and issue a full refund.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Orders and acceptance', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: billing terms link */
                wp_kses_post(__('An order confirmation is an acknowledgment, not acceptance. We accept an order only when we dispatch it. We may refuse or cancel an order as set out in our %s, including for stock, pricing errors, failed payment or verification, or suspected fraud or resale activity.', 'dawp')),
                '<a href="' . esc_url(home_url('/billing-terms-conditions/')) . '">' . esc_html__('Billing Terms & Conditions', 'dawp') . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Pricing and payment', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: billing terms link */
                wp_kses_post(__('All prices are in US Dollars and exclude sales tax, which is added at checkout where applicable. Accepted payment methods, the currency, when you are charged, and the billing descriptor are described in our %s.', 'dawp')),
                '<a href="' . esc_url(home_url('/billing-terms-conditions/')) . '">' . esc_html__('Billing Terms & Conditions', 'dawp') . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Shipping, returns, and refunds', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: 1: shipping policy link, 2: return & refund policy link */
                wp_kses_post(__('Delivery times, costs, and destinations are described in our %1$s. Your right to return an item and how refunds are issued are described in our %2$s.', 'dawp')),
                '<a href="' . esc_url(home_url('/shipping-policy/')) . '">' . esc_html__('Shipping Policy', 'dawp') . '</a>',
                '<a href="' . esc_url(home_url('/return-refund-policy/')) . '">' . esc_html__('Return & Refund Policy', 'dawp') . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Product warranty', 'dawp'),
            'body'    => '<p>' . esc_html__('A manufacturer warranty is included with some, but not all, watches. Where a warranty applies, its length and terms are stated on that product\'s page and in the paperwork supplied with the watch. Watches sold without a stated warranty are covered only by the return rights in our Return & Refund Policy and by any rights you have under applicable consumer law.', 'dawp') . '</p>'
                . '<p>' . esc_html__('A manufacturer warranty does not cover normal wear, battery depletion, water exposure beyond the watch\'s stated resistance rating, accidental damage, scratches, or damage from unauthorized repair or modification. Straps, batteries, and crystals are consumable parts.', 'dawp') . '</p>'
                . '<p>' . sprintf(
                    /* translators: %s: support email link */
                    wp_kses_post(__('If your watch develops a fault, email %s with your order number and photos of the issue and we will advise the next step, including any manufacturer warranty service that applies.', 'dawp')),
                    '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
                ) . '</p>',
        ],
        [
            'heading' => __('Acceptable use of the website', 'dawp'),
            'body'    => '<p>' . esc_html__('You agree not to use this website to break the law, infringe our or others\' rights, place fraudulent orders, interfere with the site\'s operation or security, scrape or copy content at scale, or resell our products in a way that misrepresents them as authorized dealer stock.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Intellectual property', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: store name */
                esc_html__('All content on this website, including text, product photography, graphics, logos, and page design, is owned by %s or its licensors and is protected by copyright and trademark law. You may not reproduce or use it for commercial purposes without our written permission.', 'dawp'),
                esc_html($store)
            ) . '</p>',
        ],
        [
            'heading' => __('Disclaimers', 'dawp'),
            'body'    => '<p>' . esc_html__('The website is provided "as is" and "as available". Except for any manufacturer warranty supplied with a product and the rights you have under applicable consumer law, we make no other warranties, express or implied, including implied warranties of merchantability or fitness for a particular purpose. We do not warrant that the website will be uninterrupted or error-free.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Limitation of liability', 'dawp'),
            'body'    => '<p>' . esc_html__('To the fullest extent permitted by law, our total liability for any claim connected with an order is limited to the amount you paid for that order. We are not liable for indirect, incidental, or consequential losses. Nothing in these terms limits liability that cannot be limited by law, including for death or personal injury caused by negligence, or for fraud.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Indemnification', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: store name */
                esc_html__('You agree to indemnify and hold %s harmless from claims, losses, and expenses arising out of your breach of these terms or your misuse of the website.', 'dawp'),
                esc_html($store)
            ) . '</p>',
        ],
        [
            'heading' => __('Third-party links', 'dawp'),
            'body'    => '<p>' . esc_html__('The website may link to third-party sites, such as payment providers or carriers. We are not responsible for the content or practices of those sites; their terms and privacy policies apply when you use them.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Dispute resolution', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: support email link */
                wp_kses_post(__('If you have a dispute, please contact us first at %s so we can try to resolve it informally. Most issues are settled quickly this way.', 'dawp')),
                '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Governing law', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: governing-law jurisdiction */
                esc_html__('These terms are governed by the laws of %s, without regard to conflict-of-law rules. The courts of that jurisdiction have exclusive jurisdiction over any dispute, subject to any mandatory consumer-protection rights available to you where you live.', 'dawp'),
                esc_html($governing)
            ) . '</p>',
        ],
        [
            'heading' => __('Changes to these terms', 'dawp'),
            'body'    => '<p>' . esc_html__('We may update these terms from time to time. The version in effect when you place an order applies to that order. Continued use of the website after an update means you accept the revised terms. The "last updated" date at the top of this page shows when it was last changed.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Severability', 'dawp'),
            'body'    => '<p>' . esc_html__('If any part of these terms is found to be unenforceable, the rest remains in full effect.', 'dawp') . '</p>',
        ],
    ],
]);
