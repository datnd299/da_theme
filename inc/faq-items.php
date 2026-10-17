<?php
/**
 * Shared FAQ content for the FAQ page and JSON-LD schema — MozTire.
 * Numbers come from dawp_store_facts() so they always match the policy pages.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_faq_items')) {
    function dawp_get_faq_items() {
        $f = dawp_store_facts();
        $email = '<a href="mailto:' . esc_attr($f['email']) . '">' . esc_html($f['email']) . '</a>';

        return [
            // Fitment
            ['group' => 'Choosing the right tire', 'question' => 'How do I find my tire size?', 'answer' => 'Your size is printed on the sidewall of your current tires, for example 225/65R17. You can also find the original-equipment size on the tire placard inside the driver-side door jamb or in your owner\'s manual. Our <a href="/tire-size-guide/">Tire Size Guide</a> explains every part of the code.'],
            ['group' => 'Choosing the right tire', 'question' => 'What do the numbers in 225/65R17 102H mean?', 'answer' => '225 is the tread width in millimeters, 65 is the aspect ratio (sidewall height as a percentage of width), R means radial construction, and 17 is the wheel (rim) diameter in inches. 102 is the load index and H is the speed rating.'],
            ['group' => 'Choosing the right tire', 'question' => 'Can I search by size on MozTire?', 'answer' => 'Yes. Use the tire finder on the homepage or shop page to pick width, aspect ratio and rim diameter, or simply type a size like 225/65R17 into the search bar. You can then narrow the results by brand, season, vehicle type, speed rating, load range and more.'],
            ['group' => 'Choosing the right tire', 'question' => 'Can I use a different size than my vehicle came with?', 'answer' => 'We recommend the size, load index and speed rating listed on your vehicle\'s tire placard. Changing size can affect speedometer accuracy, clearance, handling and safety systems. If you want to change size, confirm it with a qualified tire professional before ordering.'],
            ['group' => 'Choosing the right tire', 'question' => 'Should I replace all four tires at once?', 'answer' => 'Replacing tires in sets of four keeps handling balanced, and many all-wheel-drive vehicles require matching tread depth on all four tires. At minimum, replace tires in pairs on the same axle. Check your vehicle manufacturer\'s guidance.'],
            ['group' => 'Choosing the right tire', 'question' => 'What is the difference between all-season, all-weather and winter tires?', 'answer' => 'All-season tires are built for year-round driving in mild climates. All-weather tires carry the Three-Peak Mountain Snowflake symbol and handle moderate snow while staying on all year. Winter tires use softer compounds and deep siping for the best grip on snow and ice below about 45°F.'],
            ['group' => 'Choosing the right tire', 'question' => 'Does the price shown cover one tire or a set?', 'answer' => 'Each listing shows its pack size. Unless the listing says it is a set, the price is for a single tire. Choose the quantity you need in the cart before checkout.'],

            // Orders & shipping
            ['group' => 'Shipping & delivery', 'question' => 'Where do you ship?', 'answer' => 'We ship to residential and business addresses in ' . $f['ship_area'] . '. We do not currently ship to Alaska, Hawaii, U.S. territories, APO/FPO addresses or outside the United States.'],
            ['group' => 'Shipping & delivery', 'question' => 'How much does shipping cost?', 'answer' => $f['free_shipping'] . ' The final total, including any applicable sales tax, is shown at checkout before you pay.'],
            ['group' => 'Shipping & delivery', 'question' => 'How long does delivery take?', 'answer' => 'Orders are processed in ' . $f['processing'] . ' and ground transit takes ' . $f['transit'] . ', so most orders arrive within ' . $f['delivery_total'] . ' of purchase. Orders placed after ' . $f['cutoff'] . ' or on weekends and holidays begin processing the next business day.'],
            ['group' => 'Shipping & delivery', 'question' => 'Can I ship tires directly to my installer?', 'answer' => 'Yes. Enter your installer\'s business name and address as the shipping address at checkout and add your name and phone number so the shop can identify your order. Please call the installer first to confirm they accept customer-supplied tires.'],
            ['group' => 'Shipping & delivery', 'question' => 'How do I track my order?', 'answer' => 'Once your tires ship, we email a tracking number and carrier link. You can also check status anytime on the <a href="/track-order/">Track Order page</a> using your order number and billing email.'],
            ['group' => 'Shipping & delivery', 'question' => 'Why did my tires arrive in separate packages?', 'answer' => 'Tires usually ship individually, so a set of four may arrive as four packages with separate tracking numbers, sometimes on different days. Your order is complete once all packages are delivered.'],
            ['group' => 'Shipping & delivery', 'question' => 'Do you install tires?', 'answer' => 'MozTire is an online store and does not offer installation. Tires should be mounted and balanced by a qualified tire installer, and we recommend a wheel alignment check when replacing tires.'],

            // Returns & warranty
            ['group' => 'Returns, refunds & warranty', 'question' => 'What is your return policy?', 'answer' => 'You can return new tires within ' . $f['return_window'] . ' days of delivery if they are unmounted, unused, and free of any installation marks. See the <a href="/refund-return-policy/">Refund &amp; Return Policy</a> for full details.'],
            ['group' => 'Returns, refunds & warranty', 'question' => 'Can I return tires that have been mounted or driven on?', 'answer' => 'Mounted, installed or driven tires cannot be returned for change of mind. If a mounted tire has a manufacturing defect, it may be covered by the manufacturer\'s warranty; contact us and we will help you start a claim.'],
            ['group' => 'Returns, refunds & warranty', 'question' => 'Who pays for return shipping?', 'answer' => 'If we shipped the wrong tire or it arrived damaged or defective, we provide a prepaid return label. For other eligible returns, such as ordering the wrong size, the cost of return shipping is the customer\'s responsibility. There is no restocking fee.'],
            ['group' => 'Returns, refunds & warranty', 'question' => 'When will I get my refund?', 'answer' => 'We inspect returned tires within ' . $f['refund_inspect'] . ' of receiving them. Approved refunds go back to the original payment method within ' . $f['refund_issue'] . '. Your bank may take a few more days to post it.'],
            ['group' => 'Returns, refunds & warranty', 'question' => 'What is a tread-life (mileage) warranty?', 'answer' => 'Many tires carry a manufacturer tread-life warranty, shown as Tread Warranty on the product page. It is provided by the tire manufacturer, not MozTire, and typically requires proof of purchase, proper rotation and inflation records. We are happy to help with the paperwork.'],

            // Payment & account
            ['group' => 'Payment & privacy', 'question' => 'Is checkout secure?', 'answer' => 'Yes. Checkout runs over an encrypted HTTPS connection and payments are processed by PayPal. You enter your payment details with PayPal, so MozTire never receives or stores your full card or bank details.'],
            ['group' => 'Payment & privacy', 'question' => 'Which payment methods do you accept?', 'answer' => 'All orders are paid through PayPal. You can pay with your PayPal balance or linked bank, or with a debit or credit card through PayPal where it is offered. The full order total is shown before you pay. See our <a href="/payment-policy/">Payment Policy</a> for details.'],
            ['group' => 'Payment & privacy', 'question' => 'How are refunds paid?', 'answer' => 'Refunds go back through PayPal to the payment you used. PayPal balance refunds usually appear within minutes; card or bank refunds can take 5-10 business days to post.'],
            ['group' => 'Payment & privacy', 'question' => 'Can I change or cancel my order?', 'answer' => 'Contact us as soon as possible at ' . $email . '. We can change or cancel an order before it ships. Once tires have shipped, the order follows our return policy.'],
            ['group' => 'Payment & privacy', 'question' => 'How can I contact customer support?', 'answer' => 'Email ' . $email . ' or use the <a href="/contact-us/">Contact Us page</a>. Our team is available ' . $f['hours'] . ' and replies ' . $f['response_time'] . '.'],
        ];
    }
}
