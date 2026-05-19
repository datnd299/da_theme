<?php
/**
 * Template Part: FAQ
 * Bardic – Frequently Asked Questions
 */
$faqs = [
    [
        'q' => 'How long will it take to receive my order?',
        'a' => 'We strive to deliver your DIY Lyre Kits as quickly as possible. Order handling time is 3-5 business days. Transit time is 3-5 business days. The total estimated delivery time is 7-10 business days.'
    ],
    [
        'q' => 'Do you offer free shipping?',
        'a' => 'Yes! We offer free shipping on all orders delivered within the Continental United States (48 lower states). There is no minimum purchase required.'
    ],
    [
        'q' => 'Where is Bardic located?',
        'a' => 'We are a United States-based business. Our headquarters is located in Illinois.'
    ],
    [
        'q' => 'Do you have a physical store location I can visit?',
        'a' => 'Currently, Bardic operates exclusively as an online boutique. This allows us to eliminate the overhead costs of a brick-and-mortar store and pass those savings directly to you.'
    ],
    [
        'q' => 'What if I receive a defective or damaged product?',
        'a' => 'If you receive a defective or damaged item, please contact us within 48 hours of delivery. We will provide a replacement or full refund at no cost to you.'
    ],
    [
        'q' => 'Can I cancel my order after it\'s placed?',
        'a' => 'You can cancel your order within 12 hours of placement. Please contact our support team immediately if you need to make changes.'
    ],
    [
        'q' => 'What is your return policy?',
        'a' => 'We offer a 30-day return window. Items must be unused and in their original packaging. Please review our Return & Refund Policy for complete details.'
    ],
    [
        'q' => 'Do you offer any quality guarantees?',
        'a' => 'Yes, we include "The Artisan\'s Insurance" with every kit. If you break or lose a component during assembly, we will provide a free replacement—you simply cover the shipping.'
    ],
    [
        'q' => 'When will I receive my refund?',
        'a' => 'Once we receive and inspect your return, your refund will be processed back to your original payment method. It typically takes 5-7 business days for the refund to appear in your account.'
    ],
    [
        'q' => 'Do you ship to Alaska, Hawaii, or internationally?',
        'a' => 'Currently, we only ship to the Continental United States. We do not ship to Alaska, Hawaii, or international destinations.'
    ],
    [
        'q' => 'How can I track my order?',
        'a' => 'Once your order ships, you will receive an email with a tracking number. You can track your package on the carrier\'s website.'
    ],
    [
        'q' => 'Is my payment information secure?',
        'a' => 'Absolutely. We use SSL encryption and follow PCI DSS standards. We do not store your credit card details; all payments are handled by secure, third-party processors.'
    ]
];
?>

<!-- Hero -->
<section class="bg-[#FAF6F0] pt-20 pb-16 px-6 md:px-12 border-b border-[#D9D2C5]/40">
    <div class="max-w-[820px] mx-auto text-center">
        <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Help Center</span>
        <h1 class="font-serif text-4xl md:text-5xl text-[#4A3426] leading-[1.1] mb-5 font-medium">Frequently Asked Questions</h1>
        <p class="text-[#7A6C5F] font-sans text-base leading-[1.8] max-w-xl mx-auto">
            Everything you need to know about your Bardic kit — from assembly to tuning, shipping to returns.
        </p>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="bg-[#FAF6F0] py-16 px-6 md:px-12">
    <div class="max-w-[760px] mx-auto space-y-3">
        <?php foreach ($faqs as $i => $faq): ?>
        <details class="group bg-white border border-[#D9D2C5]/50 rounded-2xl overflow-hidden transition-all duration-300 hover:border-[#B08A57]/40" <?= $i === 0 ? 'open' : '' ?>>
            <summary class="flex items-center justify-between gap-4 px-7 py-5 cursor-pointer list-none select-none">
                <span class="font-sans font-semibold text-[#4A3426] text-sm md:text-base leading-snug pr-4"><?= esc_html($faq['q']) ?></span>
                <span class="shrink-0 w-7 h-7 rounded-full border border-[#D9D2C5] flex items-center justify-center text-[#B08A57] transition-transform duration-300 group-open:rotate-45">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                </span>
            </summary>
            <p class="px-7 pb-6 pt-1 text-[#7A6C5F] font-sans text-sm leading-[1.8] border-t border-[#D9D2C5]/30"><?= esc_html($faq['a']) ?></p>
        </details>
        <?php endforeach; ?>
    </div>
</section>

<!-- Still Have Questions CTA -->
<section class="bg-[#F3EDE2] py-16 px-6 md:px-12 border-t border-[#D9D2C5]/40 text-center">
    <div class="max-w-[520px] mx-auto">
        <h2 class="font-serif text-2xl text-[#4A3426] mb-3 font-medium">Still Have a Question?</h2>
        <p class="text-[#7A6C5F] font-sans text-sm leading-[1.7] mb-7">Our team typically responds within 1–2 business days. We'd love to help.</p>
        <a href="mailto:contact@bardicshop.com" class="inline-flex items-center gap-2 bg-[#4A3426] text-[#FAF6F0] px-8 py-3.5 rounded-full font-sans text-sm font-semibold tracking-wide hover:bg-[#B08A57] transition-all duration-300">
            Contact Support
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>
</section>
