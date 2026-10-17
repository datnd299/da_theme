<?php
/**
 * Shipping Policy — MozTire
 */
$f = dawp_store_facts();
$email = '<a href="mailto:' . esc_attr($f['email']) . '">' . esc_html($f['email']) . '</a>';
$damage_days = (int) $f['damage_report'];

dawp_page_hero([
    'title'   => 'Shipping Policy',
    'eyebrow' => 'Free shipping on every order',
    'lead'    => 'Free ground shipping to the contiguous U.S. with no minimum order. Here is where we ship, how long it takes, and what to do if something goes wrong.',
    'image'   => 'assets/img/hero/tracking-hero.jpg',
]);

dawp_policy_body([
    [
        'id'    => 'overview',
        'title' => 'Shipping at a glance',
        'html'  => '
            <ul class="mz-facts">
                <li><strong>FREE</strong>Shipping on every order</li>
                <li><strong>' . esc_html($f['processing']) . '</strong>Order processing</li>
                <li><strong>' . esc_html($f['transit']) . '</strong>Ground transit</li>
                <li><strong>48 states</strong>Contiguous U.S.</li>
            </ul>
            <p class="mz-callout"><strong>Free shipping, no minimum.</strong> Whether you order one tire or a full set of four, standard ground shipping to any eligible address in ' . esc_html($f['ship_area']) . ' costs $0. There are no handling fees, fuel surcharges or oversize fees.</p>
            <p>Every shipment includes tracking. Your order total, including any sales tax, is shown at checkout before you pay with PayPal.</p>',
    ],
    [
        'id'    => 'where',
        'title' => 'Where we ship',
        'html'  => '
            <p>We ship to residential and business addresses in ' . esc_html($f['ship_area']) . ', including tire shops and installers.</p>
            <h3>Locations we do not ship to</h3>
            <ul>
                <li>Alaska and Hawaii;</li>
                <li>Puerto Rico, Guam, the U.S. Virgin Islands and other U.S. territories;</li>
                <li>APO, FPO and DPO military addresses;</li>
                <li>P.O. boxes and parcel lockers (tires are too large for them);</li>
                <li>Any address outside the United States.</li>
            </ul>
            <p>If your address cannot be served, checkout will let you know before any payment is taken.</p>',
    ],
    [
        'id'    => 'cost',
        'title' => 'Shipping cost',
        'html'  => '
            <table>
                <thead><tr><th>Order</th><th>Shipping method</th><th>Cost</th></tr></thead>
                <tbody>
                    <tr><td>Any order, any quantity, contiguous U.S.</td><td>Standard ground</td><td><strong>FREE</strong></td></tr>
                    <tr><td>Shipping to an installer or tire shop</td><td>Standard ground</td><td><strong>FREE</strong></td></tr>
                </tbody>
            </table>
            <p>We do not currently offer paid expedited, overnight or same-day delivery. Applicable state and local sales tax is calculated from your shipping address and shown at checkout. MozTire does not charge handling fees.</p>',
    ],
    [
        'id'    => 'timing',
        'title' => 'Processing and delivery times',
        'html'  => '
            <table>
                <thead><tr><th>Stage</th><th>Typical time</th></tr></thead>
                <tbody>
                    <tr><td>Order processing (payment confirmed, tires picked, inspected and labeled)</td><td>' . esc_html($f['processing']) . '</td></tr>
                    <tr><td>Ground transit after the carrier picks up</td><td>' . esc_html($f['transit']) . '</td></tr>
                    <tr><td><strong>Estimated total, order to doorstep</strong></td><td><strong>' . esc_html($f['delivery_total']) . '</strong></td></tr>
                </tbody>
            </table>
            <p>Orders paid before ' . esc_html($f['cutoff']) . ' on a business day begin processing the same day. Orders placed after the cutoff, on weekends, or on U.S. federal holidays begin processing the next business day. Business days are Monday through Friday, excluding federal holidays.</p>
            <p>Processing starts only after PayPal confirms your payment. If PayPal holds a payment for review, processing begins once the payment is completed.</p>
            <p>Delivery times are estimates, not guarantees. Severe weather, peak seasons, carrier delays and rural or remote delivery areas can add time. Rural areas may take 1-2 extra business days.</p>',
    ],
    [
        'id'    => 'carriers',
        'title' => 'Carriers and tracking',
        'html'  => '
            <p>Tires ship by ' . esc_html($f['carriers']) . ', depending on size, weight and destination. We choose the carrier; specific carrier requests cannot be guaranteed.</p>
            <ul>
                <li><strong>Shipping confirmation:</strong> when your order leaves our warehouse, we email you tracking numbers and links.</li>
                <li><strong>Order status anytime:</strong> use our <a href="/track-order/">Track Order</a> page with your order number and billing email.</li>
                <li><strong>Multiple packages:</strong> tires usually ship as individual packages. A set of four may arrive as four parcels with separate tracking numbers and, occasionally, on different days. This is normal.</li>
                <li><strong>Signature:</strong> most deliveries do not require a signature. The carrier may leave tires at your door, garage or business reception.</li>
            </ul>',
    ],
    [
        'id'    => 'installer',
        'title' => 'Shipping to an installer',
        'html'  => '
            <p>You can have your tires shipped free directly to a tire shop or installer of your choice:</p>
            <ol>
                <li>Call the shop first and confirm they accept customer-supplied tires and deliveries for customers.</li>
                <li>Ask about their mounting, balancing, valve stem, TPMS service and old-tire disposal fees.</li>
                <li>At checkout, enter the shop\'s business name and address as the shipping address, and put your own name and phone number in the order so the shop can match the tires to you.</li>
                <li>Share your tracking numbers with the shop and book your installation appointment for after the expected delivery date.</li>
            </ol>
            <p>Installation is not included in your purchase. It is arranged and paid for directly with the installer, and MozTire is not responsible for third-party installation work.</p>',
    ],
    [
        'id'    => 'delivery-issues',
        'title' => 'Damaged, missing or delayed packages',
        'html'  => '
            <p><strong>Inspect every tire on arrival, before mounting.</strong> Do not install a tire that appears damaged.</p>
            <table>
                <thead><tr><th>Problem</th><th>What to do</th><th>What we do</th></tr></thead>
                <tbody>
                    <tr><td>Tire damaged in transit</td><td>Email us within ' . $damage_days . ' days of delivery with your order number and photos of the tire, packaging and shipping label</td><td>Send a free replacement or a full refund to PayPal, and arrange free pickup or return</td></tr>
                    <tr><td>Wrong tire received</td><td>Email us within ' . $damage_days . ' days of delivery with a photo of the sidewall size</td><td>Send the correct tire free and provide a prepaid return label</td></tr>
                    <tr><td>Marked delivered but not received</td><td>Check your property, neighbors and building office, then contact us within ' . $damage_days . ' days of the delivery scan</td><td>Open a carrier investigation and reship or refund once it is resolved</td></tr>
                    <tr><td>Some tires arrived, others did not</td><td>Check each tracking number, then contact us if one has not moved in 3 business days</td><td>Trace the missing package with the carrier</td></tr>
                    <tr><td>No tracking movement for 5 business days</td><td>Contact us with your order number</td><td>Follow up with the carrier and keep you updated</td></tr>
                </tbody>
            </table>
            <p>Carrier investigations usually take 5-10 business days. Damage and loss in transit are covered by MozTire at no cost to you.</p>',
    ],
    [
        'id'    => 'address',
        'title' => 'Address accuracy',
        'html'  => '
            <p>Please double-check your shipping address at checkout, including apartment, suite or unit numbers. If a package is returned to us because the address was incomplete or incorrect, or because delivery was refused, we will contact you. We can reship it free once to a corrected address, or refund the order to PayPal.</p>
            <p>Address changes after shipment may not be possible. Carriers may charge address-correction fees, which we will tell you about before making any change.</p>',
    ],
    [
        'id'    => 'changes',
        'title' => 'Order changes and cancellations',
        'html'  => '
            <p>Need to change your shipping address or cancel? Email ' . $email . ' as soon as possible with your order number. We can update or cancel orders that have not yet shipped, and cancelled orders are refunded in full to your PayPal payment. After an order ships, it follows our <a href="/refund-return-policy/">Refund &amp; Return Policy</a>.</p>',
    ],
    [
        'id'    => 'contact',
        'title' => 'Contact us',
        'html'  => '
            <p>Questions about shipping? Email ' . $email . ' or use our <a href="/contact-us/">contact form</a>. Our team is available ' . esc_html($f['hours']) . ' and replies ' . esc_html($f['response_time']) . '.</p>',
    ],
], 'October 17, 2026');
