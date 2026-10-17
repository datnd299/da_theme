<?php
/**
 * Terms & Conditions — MozTire
 */
$f = dawp_store_facts();
$email = '<a href="mailto:' . esc_attr($f['email']) . '">' . esc_html($f['email']) . '</a>';

dawp_page_hero([
    'title'   => 'Terms & Conditions',
    'eyebrow' => 'Store terms',
    'lead'    => 'The terms that apply when you use ' . esc_html($f['domain']) . ' and buy tires from MozTire.',
]);

dawp_policy_body([
    [
        'id'    => 'agreement',
        'title' => 'Agreement to these terms',
        'html'  => '
            <p>These Terms &amp; Conditions govern your use of ' . esc_html($f['domain']) . ' (the "site") operated by ' . esc_html($f['brand']) . '. By browsing the site or placing an order, you agree to these terms and to our <a href="/privacy-policy/">Privacy Policy</a>, <a href="/payment-policy/">Payment Policy</a>, <a href="/shipping-policy/">Shipping Policy</a> and <a href="/refund-return-policy/">Refund &amp; Return Policy</a>, which are part of these terms.</p>
            <p>You must be at least 18 years old, or have the consent of a parent or guardian, to place an order. The site is intended for customers in the United States.</p>',
    ],
    [
        'id'    => 'products',
        'title' => 'Product information',
        'html'  => '
            <p>We work to list accurate tire specifications, including brand, tire line, size, load index, speed rating, load range, season, sidewall style and tread warranty, as provided by manufacturers and suppliers. Product photos are representative; sidewall lettering, tread details and DOT manufacture dates may vary slightly from the image.</p>
            <p>All tires we sell are new. If you find an error in a listing, please contact us before ordering. Manufacturer specifications can change without notice.</p>',
    ],
    [
        'id'    => 'fitment',
        'title' => 'Fitment responsibility',
        'html'  => '
            <p>You are responsible for choosing tires that match your vehicle. Before ordering, confirm the size, load index, speed rating and load range against your vehicle\'s tire placard, owner\'s manual or a qualified tire professional. Our <a href="/tire-size-guide/">Tire Size Guide</a> and support team can help, but final fitment is the buyer\'s decision.</p>
            <p>Tires must be mounted, balanced and installed by a qualified installer. MozTire does not install tires and is not responsible for installation work performed by third parties.</p>',
    ],
    [
        'id'    => 'pricing',
        'title' => 'Pricing and payment',
        'html'  => '
            <p>All prices are in ' . esc_html($f['currency']) . '. Each listing shows whether the price is for a single tire or a set. Applicable sales tax is calculated at checkout from your shipping address. Standard ground shipping is free on every order to the contiguous U.S.</p>
            <p><strong>Payment is made through PayPal.</strong> You may pay with your PayPal account or, where PayPal offers it, by debit or credit card through PayPal. Any PayPal Pay Later option is offered and governed by PayPal, not MozTire. Payment is captured when you place your order, and MozTire never stores your full card or bank details. Details are in our <a href="/payment-policy/">Payment Policy</a>.</p>
            <p>We reserve the right to correct pricing or typographical errors. If an order was placed at an incorrect price, we will contact you before shipping and you may confirm at the correct price or cancel for a full refund to PayPal.</p>',
    ],
    [
        'id'    => 'orders',
        'title' => 'Order acceptance',
        'html'  => '
            <p>After you pay, you see an order confirmation page and receive a confirmation email with an order number beginning with ' . esc_html($f['order_prefix']) . '. This confirms we received your order; a contract for the tires is formed when we ship them.</p>
            <p>We may decline or cancel an order, in whole or in part, for reasons such as stock availability, suspected fraud, address verification issues, an unconfirmed PayPal payment, or pricing errors. If we cancel a paid order, you receive a full refund to your original PayPal payment.</p>',
    ],
    [
        'id'    => 'shipping-returns',
        'title' => 'Shipping, returns and warranties',
        'html'  => '
            <p>We offer free standard ground shipping on every order to ' . esc_html($f['ship_area']) . ', as described in our <a href="/shipping-policy/">Shipping Policy</a>. Risk of loss passes to you on delivery; damage or loss in transit is handled by MozTire.</p>
            <p>New, unmounted tires may be returned within ' . (int) $f['return_window'] . ' days of delivery under our <a href="/refund-return-policy/">Refund &amp; Return Policy</a>. Tires that have been mounted or used cannot be returned for change of mind. Refunds are issued through PayPal to the original payment.</p>
            <p>Tires are covered by their manufacturer\'s limited warranty. MozTire does not provide a separate warranty beyond what the manufacturer offers and what is required by law, but we will help you with manufacturer claims.</p>',
    ],
    [
        'id'    => 'disputes-payment',
        'title' => 'Payment disputes',
        'html'  => '
            <p>If you have a problem with a charge or an order, please contact us first at ' . $email . ' so we can resolve it quickly. You keep any rights you have under PayPal\'s policies, including PayPal Purchase Protection and the PayPal Resolution Center. If you open a dispute or chargeback, we will share order, shipping and tracking records with PayPal to resolve it.</p>',
    ],
    [
        'id'    => 'accounts',
        'title' => 'Accounts',
        'html'  => '
            <p>You can check out as a guest or create an account. If you create an account, keep your login details confidential and tell us promptly about any unauthorized use. You are responsible for activity under your account. We may suspend accounts involved in fraud or misuse of the site.</p>',
    ],
    [
        'id'    => 'use',
        'title' => 'Use of the site',
        'html'  => '
            <p>You agree not to misuse the site, including by attempting to gain unauthorized access, interfering with its operation, placing fraudulent orders, scraping content at scale, or using it for unlawful purposes.</p>
            <p>Site content, design, text and graphics belong to MozTire or its licensors and may not be copied without permission. Tire brand names, tire line names and logos are trademarks of their respective owners and are used only to identify products.</p>',
    ],
    [
        'id'    => 'liability',
        'title' => 'Disclaimer and limitation of liability',
        'html'  => '
            <p>Except for the manufacturer\'s warranty and rights you have by law, the site and its content are provided "as is". To the fullest extent permitted by law, MozTire is not liable for indirect, incidental or consequential damages arising from use of the site or products, including damages caused by improper fitment, installation, inflation, maintenance or misuse. Our total liability for any claim relating to an order is limited to the amount you paid for that order.</p>
            <p>Nothing in these terms limits rights you have under applicable consumer protection laws that cannot be waived.</p>',
    ],
    [
        'id'    => 'law',
        'title' => 'Governing law and changes',
        'html'  => '
            <p>These terms are governed by the laws of the United States and the state in which MozTire operates, without regard to conflict-of-law rules. We may update these terms at any time; the version posted when you place an order applies to that order.</p>',
    ],
    [
        'id'    => 'contact',
        'title' => 'Contact',
        'html'  => '<p>Questions about these terms? Email ' . $email . ' or use our <a href="/contact-us/">contact form</a>. We are available ' . esc_html($f['hours']) . '.</p>',
    ],
], 'October 17, 2026');
