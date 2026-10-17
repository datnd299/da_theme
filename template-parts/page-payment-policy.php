<?php
/**
 * Payment Policy — MozTire (PayPal checkout)
 */
$f = dawp_store_facts();
$email = '<a href="mailto:' . esc_attr($f['email']) . '">' . esc_html($f['email']) . '</a>';

dawp_page_hero([
    'title'   => 'Payment Policy',
    'eyebrow' => 'Secure checkout with PayPal',
    'lead'    => 'How payment works at MozTire, when you are charged, and how refunds and payment issues are handled.',
]);

dawp_policy_body([
    [
        'id'    => 'overview',
        'title' => 'Payment at a glance',
        'html'  => '
            <ul class="mz-facts">
                <li><strong>PayPal</strong>Secure payment processor</li>
                <li><strong>USD</strong>All prices and charges</li>
                <li><strong>$0</strong>Extra payment fees from MozTire</li>
                <li><strong>' . esc_html($f['refund_issue']) . '</strong>Refunds issued after approval</li>
            </ul>
            <p>All MozTire orders are paid securely through <strong>PayPal</strong>. You can pay with your PayPal account or, where PayPal offers it, with a debit or credit card through PayPal without opening an account. Your payment details are entered on PayPal\'s secure pages, not on ' . esc_html($f['domain']) . '.</p>',
    ],
    [
        'id'    => 'methods',
        'title' => 'Accepted payment methods',
        'html'  => '
            <p>At checkout, select <strong>PayPal</strong> and you will be taken to PayPal (or a PayPal pop-up window) to complete payment. Depending on your PayPal account and eligibility, you can pay using:</p>
            <ul>
                <li><strong>PayPal balance</strong> in your PayPal account;</li>
                <li><strong>Bank account</strong> linked to your PayPal account;</li>
                <li><strong>Debit or credit cards</strong> such as Visa, Mastercard, American Express and Discover, either saved in your PayPal wallet or entered as a guest through PayPal\'s card checkout where available;</li>
                <li><strong>PayPal Pay Later</strong> options (for example Pay in 4 or Pay Monthly), if PayPal shows them to you.</li>
            </ul>
            <p>Pay Later offers are provided, approved and managed by PayPal (and its lending partners), not by MozTire. Eligibility, terms, interest and repayment schedules are set by PayPal. MozTire receives the full order payment and has no role in approving or servicing those plans.</p>
            <p>We do not accept cash, checks, money orders, wire transfers, cryptocurrency or gift cards from other retailers. We will never ask you to pay by email, text, phone or any method outside our checkout.</p>',
    ],
    [
        'id'    => 'how',
        'title' => 'How checkout works',
        'html'  => '
            <ol>
                <li>Add tires to your cart and review the quantity, size and price of each item.</li>
                <li>Go to checkout and enter your contact details and shipping address (or your installer\'s address).</li>
                <li>Review your order summary, including item subtotal, shipping (free ground shipping to the contiguous U.S.), sales tax and the final total.</li>
                <li>Click the PayPal button. Log in to PayPal, or choose to pay by card if offered, and approve the payment.</li>
                <li>You return to ' . esc_html($f['domain']) . ' and see your order confirmation page with an order number beginning with <strong>' . esc_html($f['order_prefix']) . '</strong>. A confirmation email follows shortly.</li>
            </ol>
            <p>PayPal also sends its own payment receipt to the email address on your PayPal account. Keep both emails for your records.</p>',
    ],
    [
        'id'    => 'charges',
        'title' => 'When you are charged',
        'html'  => '
            <p>Your payment is captured by PayPal when you approve and place your order. The amount charged is exactly the total shown on the checkout page in ' . esc_html($f['currency']) . '.</p>
            <ul>
                <li><strong>No hidden fees.</strong> MozTire does not add handling, surcharge or payment-processing fees.</li>
                <li><strong>Sales tax</strong> is calculated from your shipping address and shown before you pay.</li>
                <li><strong>Currency conversion:</strong> if your PayPal account or card is in another currency, PayPal or your card issuer may apply its own conversion rate and fees. These are outside MozTire\'s control.</li>
                <li><strong>Statement name:</strong> the charge appears in your PayPal activity and on your bank or card statement as a PayPal payment to MozTire (the exact wording depends on your bank).</li>
            </ul>',
    ],
    [
        'id'    => 'failed',
        'title' => 'Declined or incomplete payments',
        'html'  => '
            <p>An order is only confirmed after PayPal approves the payment. If a payment is declined, cancelled in the PayPal window, or the page closes before you return to our site, no order is placed and your tires are not reserved.</p>
            <p>If a payment is declined, please check your PayPal account or contact PayPal or your card issuer, then try again. MozTire cannot see the reason a payment was declined.</p>
            <p>Occasionally PayPal may place a payment on hold or mark it as pending for review. In that case we will wait until PayPal completes the payment before shipping. If it is not completed, the order is cancelled and nothing is charged.</p>',
    ],
    [
        'id'    => 'security',
        'title' => 'Payment security',
        'html'  => '
            <p>Our entire site, including checkout, runs over an encrypted HTTPS connection. Payment details are entered directly with PayPal, which handles them under its own security and PCI DSS compliance programs.</p>
            <p><strong>MozTire never receives or stores your full card number, card security code, bank login or PayPal password.</strong> From PayPal we receive only what is needed to fulfill your order, such as your name, email, shipping address, the payment status and a transaction ID.</p>
            <p>To protect customers, we may review orders for signs of fraud. We may contact you to verify an order, and we may cancel and fully refund an order we cannot verify.</p>',
    ],
    [
        'id'    => 'refunds',
        'title' => 'Refunds to PayPal',
        'html'  => '
            <p>All refunds, whether for a cancellation, a return or a delivery problem, are issued back through PayPal to the original payment. We cannot refund to a different account, card, store credit or by check.</p>
            <table>
                <thead><tr><th>How you paid</th><th>Where the refund goes</th><th>When it typically appears</th></tr></thead>
                <tbody>
                    <tr><td>PayPal balance</td><td>Your PayPal balance</td><td>Usually within minutes of us issuing it</td></tr>
                    <tr><td>Bank account linked to PayPal</td><td>Your PayPal balance or bank, per PayPal\'s rules</td><td>Up to several business days</td></tr>
                    <tr><td>Card through PayPal</td><td>The same card</td><td>Usually 5-10 business days, depending on your card issuer</td></tr>
                    <tr><td>PayPal Pay Later</td><td>Your Pay Later plan</td><td>Applied by PayPal to your remaining balance</td></tr>
                </tbody>
            </table>
            <p>Cancelled orders that have not shipped are refunded in full, usually within 1 business day. Returned tires are refunded within ' . esc_html($f['refund_issue']) . ' after they pass inspection, as described in our <a href="/refund-return-policy/">Refund &amp; Return Policy</a>. You receive an email from us and from PayPal when the refund is issued.</p>
            <p>PayPal does not return its original transaction fee to us on refunds, but MozTire never deducts that fee from your refund.</p>',
    ],
    [
        'id'    => 'disputes',
        'title' => 'Payment problems and PayPal disputes',
        'html'  => '
            <p>If something is wrong with your order or charge, such as a duplicate charge, an incorrect amount, a missing package or a damaged tire, please email ' . $email . ' first with your order number. Most issues are solved faster by us directly than through a dispute, and we reply ' . esc_html($f['response_time']) . '.</p>
            <p>You also have the right to open a dispute in your PayPal Resolution Center. Eligible purchases may be covered by <strong>PayPal Purchase Protection</strong>, according to PayPal\'s own terms and time limits. If you open a dispute, we will respond to PayPal with our order, shipping and tracking records and work with PayPal to reach a fair outcome.</p>
            <p>Please do not open a dispute and a return request for the same order at the same time, since this can delay your refund. If a dispute or chargeback is decided in your favor, we will not issue a second refund for the same amount.</p>',
    ],
    [
        'id'    => 'pricing',
        'title' => 'Pricing errors and order changes',
        'html'  => '
            <p>We work to keep prices accurate. If an item is listed at a clearly incorrect price, we will contact you before shipping. You can then confirm the order at the correct price or cancel it for a full refund through PayPal.</p>
            <p>To change an order after payment, such as a different size or quantity, email ' . $email . ' before it ships. If the total goes down, we refund the difference to PayPal. If it goes up, we cancel and refund the original order and ask you to place a new one, as we do not send separate payment requests.</p>',
    ],
    [
        'id'    => 'contact',
        'title' => 'Contact us',
        'html'  => '
            <p>Questions about a payment, charge or refund? Email ' . $email . ' or use our <a href="/contact-us/">contact form</a>. Include your ' . esc_html($f['order_prefix']) . ' order number and, if you have it, the PayPal transaction ID from your PayPal receipt. Our team is available ' . esc_html($f['hours']) . '.</p>
            <p>For questions about your PayPal account, Pay Later plan or a declined payment, please contact PayPal directly.</p>',
    ],
], 'October 17, 2026');
