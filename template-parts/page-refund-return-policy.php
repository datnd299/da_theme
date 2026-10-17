<?php
/**
 * Refund & Return Policy — MozTire
 */
$f = dawp_store_facts();
$email = '<a href="mailto:' . esc_attr($f['email']) . '">' . esc_html($f['email']) . '</a>';
$days  = (int) $f['return_window'];
$damage_days = (int) $f['damage_report'];

dawp_page_hero([
    'title'   => 'Refund & Return Policy',
    'eyebrow' => $days . '-day returns',
    'lead'    => 'Ordered the wrong size or changed your mind? New, unmounted tires can be returned within ' . $days . ' days of delivery for a refund to your PayPal payment.',
    'image'   => 'assets/img/hero/tracking-hero.jpg',
]);

dawp_policy_body([
    [
        'id'    => 'overview',
        'title' => 'Returns at a glance',
        'html'  => '
            <ul class="mz-facts">
                <li><strong>' . $days . ' days</strong>From delivery to request a return</li>
                <li><strong>$0</strong>Restocking fee</li>
                <li><strong>' . esc_html($f['refund_inspect']) . '</strong>Inspection after we receive it</li>
                <li><strong>' . esc_html($f['refund_issue']) . '</strong>Refund issued to PayPal</li>
            </ul>
            <p>Original shipping was free, so nothing is deducted from your refund for outbound shipping. If we made a mistake or a tire arrived damaged or defective, return shipping is free too.</p>
            <p class="mz-callout"><strong>Before you mount:</strong> please confirm the size, load index and speed rating match your vehicle. Once a tire is mounted on a wheel, it can no longer be returned for change of mind.</p>',
    ],
    [
        'id'    => 'eligibility',
        'title' => 'Which tires can be returned',
        'html'  => '
            <p>You may return tires purchased from MozTire within <strong>' . $days . ' days of the delivery date</strong> if they are:</p>
            <ul>
                <li>New, unused and never mounted on a wheel or installed on a vehicle;</li>
                <li>Free of mounting or balancing marks, bead lubricant, scuffs, wheel-weight marks, cuts or punctures;</li>
                <li>Returned with their original labels and stickers still attached;</li>
                <li>Kept clean and dry, away from direct sunlight, chemicals and sources of ozone.</li>
            </ul>
            <h3>Not eligible for return</h3>
            <ul>
                <li>Tires that have been mounted, installed, driven on, or show any signs of use;</li>
                <li>Tires damaged after delivery, or by improper storage or handling;</li>
                <li>Items marked as final sale on the product page;</li>
                <li>Requests made more than ' . $days . ' days after delivery.</li>
            </ul>
            <p>A mounted tire with a manufacturing defect may still be covered by the manufacturer\'s warranty. See <a href="#warranty">Warranty claims</a> below.</p>',
    ],
    [
        'id'    => 'damaged',
        'title' => 'Damaged, defective or incorrect tires',
        'html'  => '
            <p>If a tire arrives damaged in transit, has a visible defect, or is not the tire you ordered, email ' . $email . ' within <strong>' . $damage_days . ' days of delivery</strong> and do not mount it. Include your order number and photos of:</p>
            <ul>
                <li>The full sidewall showing the size and DOT code;</li>
                <li>The damage or defect up close;</li>
                <li>The packaging and shipping label.</li>
            </ul>
            <p>Once confirmed, we will send a replacement at no cost or issue a full refund to PayPal, whichever you prefer. We cover all return shipping with a prepaid label or carrier pickup.</p>',
    ],
    [
        'id'    => 'how',
        'title' => 'How to start a return',
        'html'  => '
            <ol>
                <li><strong>Contact us</strong> at ' . $email . ' or through the <a href="/contact-us/">contact form</a> within ' . $days . ' days of delivery.</li>
                <li><strong>Tell us</strong> your ' . esc_html($f['order_prefix']) . ' order number, the email used at checkout, which tires you are returning, and the reason.</li>
                <li><strong>Get your return authorization (RA).</strong> We reply ' . esc_html($f['response_time']) . ' with an RA number, return address and shipping instructions.</li>
                <li><strong>Pack securely.</strong> Write the RA number on each package or on a label taped to each tire. Tires may be shipped without a box if wrapped and labeled as instructed.</li>
                <li><strong>Ship within 14 days</strong> of receiving your RA and keep your tracking numbers until the refund is issued.</li>
            </ol>
            <p>Please do not send tires back without a return authorization. Unauthorized returns may be delayed or refused.</p>',
    ],
    [
        'id'    => 'shipping',
        'title' => 'Return shipping costs',
        'html'  => '
            <table>
                <thead><tr><th>Reason for return</th><th>Return shipping</th></tr></thead>
                <tbody>
                    <tr><td>We shipped the wrong tire, or it arrived damaged or defective</td><td><strong>Free</strong>. MozTire provides a prepaid label or carrier pickup</td></tr>
                    <tr><td>Wrong size ordered, changed mind, no longer needed</td><td><strong>Paid by the customer</strong>. Use our discounted label (the cost is shown before you agree and deducted from your refund) or ship with any tracked carrier</td></tr>
                </tbody>
            </table>
            <p>There is no restocking fee on eligible returns, and no deduction for the original free shipping.</p>',
    ],
    [
        'id'    => 'refunds',
        'title' => 'Refunds to PayPal',
        'html'  => '
            <p>All refunds are issued through PayPal to the original payment used for the order. We cannot refund to a different account or card.</p>
            <ol>
                <li>When your return arrives, we inspect it within ' . esc_html($f['refund_inspect']) . ' and email you the result.</li>
                <li>Approved refunds are issued through PayPal within ' . esc_html($f['refund_issue']) . '. You receive a refund email from us and a refund notification from PayPal.</li>
                <li>Refunds to your PayPal balance usually appear within minutes. Refunds to a card or bank used through PayPal can take 5-10 more business days to post, depending on your bank or card issuer. Pay Later refunds are applied by PayPal to your plan.</li>
            </ol>
            <table>
                <thead><tr><th>Situation</th><th>Refund amount</th></tr></thead>
                <tbody>
                    <tr><td>Order cancelled before shipping</td><td>Full order total, usually within 1 business day</td></tr>
                    <tr><td>Damaged, defective or incorrect tire</td><td>Full price of the tire plus any tax paid on it</td></tr>
                    <tr><td>Change-of-mind return, eligible condition</td><td>Price of the tire plus tax, minus return label cost if you used ours</td></tr>
                    <tr><td>Partial return from a set</td><td>Price of the returned tires plus the tax paid on them</td></tr>
                </tbody>
            </table>
            <p>If a returned tire does not meet the eligibility conditions, we will contact you with photos and, at your choice, ship it back to you at your cost or discuss a partial refund.</p>
            <p>If you have not received an approved refund after 10 business days, please check your PayPal activity and your bank first, then contact us at ' . $email . '. If you prefer, you can also contact PayPal through its Resolution Center; please see our <a href="/payment-policy/">Payment Policy</a>.</p>',
    ],
    [
        'id'    => 'exchanges',
        'title' => 'Exchanges',
        'html'  => '
            <p>We do not process direct exchanges. To get a different size or model, return the original tires for a refund and place a new order (with free shipping again). If you are worried about stock, place the new order first and we will refund the return once it is received.</p>',
    ],
    [
        'id'    => 'cancellations',
        'title' => 'Cancellations',
        'html'  => '
            <p>You can cancel for a full refund any time before your order ships. Email ' . $email . ' with your order number. Once an order has shipped, it can no longer be cancelled and is handled as a return. Refused deliveries are treated as change-of-mind returns.</p>',
    ],
    [
        'id'    => 'warranty',
        'title' => 'Warranty claims',
        'html'  => '
            <p>Tires are covered by their manufacturer\'s limited warranty, which may include workmanship and materials coverage and, for many models, a tread-life (mileage) warranty shown as <em>Tread Warranty</em> on the product page. Warranties are provided by the tire manufacturer, not by MozTire, and are subject to the manufacturer\'s terms, such as proper inflation, regular rotation, alignment records and normal use.</p>
            <p>If you believe a tire is defective, keep your MozTire order confirmation and installation receipt, then contact us with your order number and photos. We will help you gather the documents needed and connect you with the manufacturer\'s claim process. Warranty decisions and any pro-rated credit are made by the manufacturer.</p>',
    ],
    [
        'id'    => 'contact',
        'title' => 'Contact us',
        'html'  => '
            <p>Questions about a return? Email ' . $email . '. We are available ' . esc_html($f['hours']) . ' and reply ' . esc_html($f['response_time']) . '.</p>',
    ],
], 'October 17, 2026');
