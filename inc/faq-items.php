<?php
/**
 * Shared FAQ content for the FAQ page and its JSON-LD schema.
 * Grouped by 'group' so the FAQ page can render sections.
 */

defined('ABSPATH') || exit;

if (!function_exists('dawp_get_faq_items')) {
    function dawp_get_faq_items() {
        return [
            // --- The watch ---
            ['group' => 'The Watch', 'question' => 'Who makes the watches you sell?', 'answer' => 'CHRONEL is an independent watch store. We do not manufacture watches; we select them from established makers. The brand and model of each watch are shown on its product page.'],
            ['group' => 'The Watch', 'question' => 'What movement is inside?', 'answer' => 'It depends on the watch. We carry automatic, mechanical, and quartz models. The movement type and the maker\'s specifications are listed on each product page.'],
            ['group' => 'The Watch', 'question' => 'Does the watch need a battery?', 'answer' => 'Quartz watches run on a battery. Automatic and mechanical watches do not: an automatic winds from the motion of your wrist, and a mechanical watch is wound by the crown. The product page states which type you are buying.'],
            ['group' => 'The Watch', 'question' => 'How accurate is it?', 'answer' => 'Quartz movements are generally the most accurate. Mechanical and automatic movements typically vary by several seconds a day and are affected by position, temperature, and how often the watch is worn. Where the maker publishes an accuracy figure, it is listed on the product page.'],
            ['group' => 'The Watch', 'question' => 'What are the cases and crystals made of?', 'answer' => 'Materials vary by model. Case material, crystal type, and strap or bracelet material are listed on each product page.'],
            ['group' => 'The Watch', 'question' => 'How water resistant are they?', 'answer' => 'Water resistance varies by model and is listed on each product page. Ratings assume intact gaskets and a fully closed crown, so have them checked if the watch has been opened or serviced.'],

            // --- Ordering & sizing ---
            ['group' => 'Ordering', 'question' => 'How do I choose a size?', 'answer' => 'Case diameter is listed on each product page. As a guide, a 38mm to 40mm case suits a wrist under 7 inches; 41mm and above suits larger wrists. If you are unsure, contact client care with your wrist measurement and we will advise.'],
            ['group' => 'Ordering', 'question' => 'Can the bracelet be adjusted?', 'answer' => 'Most bracelets have removable links. If you prefer, send us your wrist measurement at checkout and we will size the bracelet before it ships at no cost.'],
            ['group' => 'Ordering', 'question' => 'Can I have the watch engraved?', 'answer' => 'Case-back engraving is available on request. Contact client care before ordering, or note it in the message field at checkout. Engraved watches are made to order and are not eligible for return unless they arrive faulty.'],
            ['group' => 'Ordering', 'question' => 'When is my order confirmed?', 'answer' => 'Your order is accepted when our system sends a confirmation email to the address used at checkout. We may decline or cancel an order in cases of suspected payment fraud, a pricing error, or a stock discrepancy. Where a paid order is cancelled by us, the full amount is refunded to the original payment method.'],
            ['group' => 'Ordering', 'question' => 'Can I change or cancel an order?', 'answer' => 'Contact client care as soon as possible. We can usually amend an order before it is packed. Once a watch has been sized, engraved, or handed to the carrier, changes are no longer possible.'],

            // --- Delivery ---
            ['group' => 'Delivery', 'question' => 'Where do you ship?', 'answer' => 'CHRONEL ships within the United States. Shipping is complimentary, fully insured, and requires an adult signature on delivery.'],
            ['group' => 'Delivery', 'question' => 'How long does delivery take?', 'answer' => 'Orders placed before 5:00 PM (GMT-05:00) Eastern Time are handled in 1 to 2 business days, then arrive within 3 to 5 business days of dispatch — 4 to 7 business days in total. See the <a href="/shipping-policy/">Shipping Policy</a> for details.'],
            ['group' => 'Delivery', 'question' => 'How do I track my watch?', 'answer' => 'A dispatch email with a tracking link is sent the moment your watch ships. You can also use the <a href="/track-order/">Track Your Order page</a> with your order number and checkout email.'],
            ['group' => 'Delivery', 'question' => 'What if the package is delayed or lost?', 'answer' => 'Every shipment is insured for its full value. Contact client care within 30 days of the expected delivery date with your order number and we will open a claim with the carrier and arrange a replacement or refund.'],

            // --- Service, warranty & returns ---
            ['group' => 'Service & Returns', 'question' => 'What does the warranty cover?', 'answer' => 'Five years on the movement from the delivery date, covering defects in materials and workmanship. It does not cover normal wear, water damage from a compromised gasket that was not serviced, accidental damage, or work carried out by a third party.'],
            ['group' => 'Service & Returns', 'question' => 'What is the return window?', 'answer' => 'Thirty days from delivery. The watch must be unworn and returned in its original condition with the box, papers, and every removed link. Sized bracelets are fine; scratches on the case, crystal, or clasp are not.'],
            ['group' => 'Service & Returns', 'question' => 'Who pays for return shipping?', 'answer' => 'If a watch arrives faulty, damaged, or incorrect, we cover return shipping and send a prepaid insured label. For a change of mind, return shipping and insurance are the client\'s responsibility.'],
            ['group' => 'Service & Returns', 'question' => 'When is a refund issued?', 'answer' => 'We inspect returned watches within two business days of receipt. Approved refunds are issued to the original payment method within seven business days. Banks may take a further few days to post the credit.'],
            ['group' => 'Service & Returns', 'question' => 'How do I contact client care?', 'answer' => 'Write to <a href="mailto:support@chronelwatches.com">support@chronelwatches.com</a> or use the <a href="/contact-us/">Contact page</a>. Client care is open Monday to Friday, 9:00 AM to 5:00 PM (GMT-05:00) Eastern Time, and replies within 1 business day.'],
        ];
    }
}

if (!function_exists('dawp_get_faq_groups')) {
    /**
     * FAQ items keyed by group, preserving the order they are defined in.
     */
    function dawp_get_faq_groups() {
        $groups = [];

        foreach (dawp_get_faq_items() as $item) {
            $group = $item['group'] ?? 'General';
            $groups[$group][] = $item;
        }

        return $groups;
    }
}
