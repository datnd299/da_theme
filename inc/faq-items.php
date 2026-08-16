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
            ['group' => 'The Watch', 'question' => 'Who makes a CHRONEL watch?', 'answer' => 'We do. CHRONEL is an independent atelier. Every watch is assembled, regulated, and inspected by hand in the United States before it is cased and sealed.'],
            ['group' => 'The Watch', 'question' => 'What movement is inside?', 'answer' => 'A Japanese automatic movement, imported from Japan and fitted in our atelier. It runs at 28,800 vibrations per hour, carries 24 jewels, and holds a power reserve of approximately 40 hours. We regulate every movement in five positions before delivery.'],
            ['group' => 'The Watch', 'question' => 'Does the watch need a battery?', 'answer' => 'No. The movement is mechanical and self-winding. It draws its energy from the motion of your wrist. If the watch has been at rest, wind the crown 25 to 30 turns to restart it.'],
            ['group' => 'The Watch', 'question' => 'How accurate is it?', 'answer' => 'Each movement leaves the atelier regulated to within -10 to +20 seconds per day under normal wear. Accuracy varies with position, temperature, and how much the watch is worn.'],
            ['group' => 'The Watch', 'question' => 'What are the cases and crystals made of?', 'answer' => 'Cases are 316L stainless steel, hand-brushed and polished. Crystals are sapphire with an anti-reflective coating on the underside. The case back is screwed down and gasket-sealed.'],
            ['group' => 'The Watch', 'question' => 'How water resistant are they?', 'answer' => 'The Meridian, The Sovereign, and The Aviator are rated to 100 metres. The Abyss is rated to 200 metres with a screw-down crown. Water resistance depends on intact gaskets, so have them checked at each service.'],
            ['group' => 'The Watch', 'question' => 'Is each watch numbered?', 'answer' => 'Yes. Every CHRONEL carries an individual serial number engraved on the case back and recorded on the certificate that ships with the watch.'],

            // --- Ordering & sizing ---
            ['group' => 'Ordering', 'question' => 'How do I choose a size?', 'answer' => 'Case diameters run from 39mm to 42mm. A 39mm or 40mm case suits a wrist under 7 inches; 41mm and 42mm suit larger wrists. If you are unsure, contact client care with your wrist measurement and we will advise.'],
            ['group' => 'Ordering', 'question' => 'Can the bracelet be adjusted?', 'answer' => 'Yes. Every bracelet ships with removable links and a sizing tool. If you prefer, send us your wrist measurement at checkout and we will size the bracelet before it leaves the atelier at no cost.'],
            ['group' => 'Ordering', 'question' => 'Can I have the watch engraved?', 'answer' => 'Case-back engraving is available on request. Contact client care before ordering, or note it in the enquiry form on the Bespoke page. Engraved watches are made to order and are not eligible for return unless they arrive faulty.'],
            ['group' => 'Ordering', 'question' => 'When is my order confirmed?', 'answer' => 'Your order is accepted when our system sends a confirmation email to the address used at checkout. We may decline or cancel an order in cases of suspected payment fraud, a pricing error, or a stock discrepancy. Where a paid order is cancelled by us, the full amount is refunded to the original payment method.'],
            ['group' => 'Ordering', 'question' => 'Can I change or cancel an order?', 'answer' => 'Contact client care as soon as possible. We can usually amend an order before it enters final inspection. Once a watch has been sized, engraved, or handed to the carrier, changes are no longer possible.'],

            // --- Bespoke ---
            ['group' => 'Bespoke', 'question' => 'What is a bespoke commission?', 'answer' => 'A single watch built to your specification. You choose the case finish, bezel, dial colour, hand set, and engraving with our atelier. There is no configurator on this site; every commission begins with a conversation.'],
            ['group' => 'Bespoke', 'question' => 'How long does a commission take?', 'answer' => 'Approximately twelve weeks from the moment the specification is agreed. Complex dial work can extend this. You receive a progress note at each of the four stages.'],
            ['group' => 'Bespoke', 'question' => 'How do I start a commission?', 'answer' => 'Send an enquiry through the <a href="/custom/">Bespoke page</a>. An atelier specialist replies within two business days with a proposal and a quotation. Nothing is charged until the specification is agreed.'],
            ['group' => 'Bespoke', 'question' => 'Are bespoke watches returnable?', 'answer' => 'A commissioned watch is made for one person and cannot be returned for a change of mind. The five-year movement warranty and lifetime service programme apply in full.'],

            // --- Delivery ---
            ['group' => 'Delivery', 'question' => 'Where do you ship?', 'answer' => 'CHRONEL ships within the United States. Shipping is complimentary, fully insured, and requires an adult signature on delivery.'],
            ['group' => 'Delivery', 'question' => 'How long does delivery take?', 'answer' => 'In-stock watches are prepared in 1 to 3 business days and arrive within 2 to 5 business days of dispatch. Bespoke commissions follow the twelve-week schedule agreed with the atelier.'],
            ['group' => 'Delivery', 'question' => 'How do I track my watch?', 'answer' => 'A dispatch email with a tracking link is sent the moment your watch leaves the atelier. You can also use the <a href="/track-order/">Track Your Order page</a> with your order number and checkout email.'],
            ['group' => 'Delivery', 'question' => 'What if the package is delayed or lost?', 'answer' => 'Every shipment is insured for its full value. Contact client care within 30 days of the expected delivery date with your order number and we will open a claim with the carrier and arrange a replacement or refund.'],

            // --- Service, warranty & returns ---
            ['group' => 'Service & Returns', 'question' => 'What does the warranty cover?', 'answer' => 'Five years on the movement from the delivery date, covering defects in materials and workmanship. It does not cover normal wear, water damage from a compromised gasket that was not serviced, accidental damage, or work carried out by a third party.'],
            ['group' => 'Service & Returns', 'question' => 'What is the lifetime service programme?', 'answer' => 'For as long as you own the watch, we service it at cost. We recommend a full service every five to seven years: the movement is disassembled, cleaned, lubricated, regulated, and the gaskets replaced.'],
            ['group' => 'Service & Returns', 'question' => 'What is the return window?', 'answer' => 'Thirty days from delivery. The watch must be unworn and returned in its original condition with the box, papers, certificate, and every removed link. Sized bracelets are fine; scratches on the case, crystal, or clasp are not.'],
            ['group' => 'Service & Returns', 'question' => 'Who pays for return shipping?', 'answer' => 'If a watch arrives faulty, damaged, or incorrect, we cover return shipping and send a prepaid insured label. For a change of mind, return shipping and insurance are the client\'s responsibility.'],
            ['group' => 'Service & Returns', 'question' => 'When is a refund issued?', 'answer' => 'We inspect returned watches within two business days of receipt. Approved refunds are issued to the original payment method within seven business days. Banks may take a further few days to post the credit.'],
            ['group' => 'Service & Returns', 'question' => 'How do I contact client care?', 'answer' => 'Write to <a href="mailto:support@chronelwatches.com">support@chronelwatches.com</a> or use the <a href="/contact-us/">Contact page</a>. Client care is open Monday to Friday, 9:00 AM to 6:00 PM PST, and replies within one business day.'],
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
