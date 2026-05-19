<?php
/**
 * Template Part: Billing Terms & Conditions
 * Bardic – Billing Terms & Conditions
 */
?>
<section class="bg-[#FAF6F0] pt-20 pb-14 px-6 md:px-12 border-b border-[#D9D2C5]/40">
    <div class="max-w-[820px] mx-auto">
        <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Policies</span>
        <h1 class="font-serif text-4xl md:text-5xl text-[#4A3426] leading-[1.1] mb-5 font-medium">Billing Terms &amp; Conditions</h1>
        <p class="text-[#7A6C5F] font-sans text-sm">Last updated: May 19, 2026</p>
    </div>
</section>
<section class="bg-[#FAF6F0] py-16 px-6 md:px-12">
    <div class="max-w-[820px] mx-auto space-y-10 font-sans text-[#7A6C5F] text-sm leading-[1.85]">

        <div>
            <p>At Bardic, we prioritize your security and convenience. This document outlines our billing practices to ensure a transparent shopping experience for all our customers.</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-4 font-medium">1. Accepted Payment Methods</h2>
            <p class="mb-4">We accept the following secure payment methods for all purchases within the United States:</p>
            <div class="flex flex-wrap gap-3 mb-4">
                <?php foreach(['Visa', 'MasterCard', 'American Express', 'Discover', 'Apple Pay', 'Google Pay', 'PayPal'] as $method): ?>
                <span class="bg-[#F3EDE2] border border-[#D9D2C5]/60 text-[#4A3426] font-medium px-4 py-2 rounded-full text-xs"><?= $method ?></span>
                <?php endforeach; ?>
            </div>
            <p>All transactions are processed in U.S. Dollars (USD).</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">2. Payment Processing &amp; Security</h2>
            <ul class="space-y-2 pl-5">
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Immediate Payment:</strong> Payment must be made in full at the time of purchase.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Order Processing:</strong> Orders will only be processed and shipped once payment is confirmed.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Secure Encryption:</strong> We use Secure Sockets Layer (SSL) technology and comply with PCI DSS standards to encrypt your payment information.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Data Privacy:</strong> Bardic does not store or have access to your full credit card details. All payment data is handled by our secure, third-party payment processors.</span></li>
            </ul>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">3. Pricing and Taxes</h2>
            <ul class="space-y-2 pl-5">
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span>All prices listed on our website are in USD.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span>Prices are subject to change without prior notice.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Sales Tax:</strong> Applicable sales tax will be calculated based on your shipping address and displayed clearly at checkout before you finalize your order.</span></li>
            </ul>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">4. Order Confirmation &amp; Declines</h2>
            <ul class="space-y-2 pl-5">
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span>Once a payment is successful, you will receive an automated Order Confirmation email.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span>If your payment is declined, your order will be automatically cancelled. We recommend contacting your bank or card issuer for more information regarding declined transactions.</span></li>
            </ul>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">5. Fraud Prevention</h2>
            <p>To protect our customers and our business, Bardic reserves the right to flag or cancel any transaction that appears fraudulent or unauthorized. In some cases, we may request additional identity verification before processing high-value orders.</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">6. Refunds and Disputes</h2>
            <ul class="space-y-2 pl-5">
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Refunds:</strong> All refunds are processed back to the original payment method used during checkout. Please refer to our Return & Refund Policy for more details.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Disputes:</strong> If you notice any discrepancies or unauthorized charges, please contact our support team at <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] hover:underline">contact@bardicshop.com</a> immediately. We are committed to resolving issues fairly and promptly.</span></li>
            </ul>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8 bg-[#F3EDE2] rounded-2xl p-8 !mt-4 font-sans text-xs space-y-2">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">7. Contact Information</h2>
            <p><strong>Store Name:</strong> Bardic</p>
            <p><strong>Address:</strong> 2000 Parkview Dr, South Holland, IL 60473</p>
            <p><strong>Email:</strong> <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] hover:underline">contact@bardicshop.com</a></p>
            <p><strong>Customer Service Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM (EST)</p>
        </div>
    </div>
</section>
