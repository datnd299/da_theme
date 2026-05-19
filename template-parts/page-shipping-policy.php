<?php
/**
 * Template Part: Shipping Policy
 * Bardic – Shipping Policy
 */
?>
<section class="bg-[#FAF6F0] pt-20 pb-14 px-6 md:px-12 border-b border-[#D9D2C5]/40">
    <div class="max-w-[820px] mx-auto">
        <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Policies</span>
        <h1 class="font-serif text-4xl md:text-5xl text-[#4A3426] leading-[1.1] mb-5 font-medium">Shipping Policy</h1>
        <p class="text-[#7A6C5F] font-sans text-sm">Last updated: May 19, 2026</p>
    </div>
</section>
<section class="bg-[#FAF6F0] py-16 px-6 md:px-12">
    <div class="max-w-[820px] mx-auto space-y-10 font-sans text-[#7A6C5F] text-sm leading-[1.85]">

        <div>
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">1. Shipping Areas & Costs</h2>
            <p class="mb-4">At Bardic, we are dedicated to delivering high-quality DIY Lyre Kits to your doorstep quickly and safely.</p>
            <ul class="space-y-2 pl-5 mb-4">
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Shipping Area:</strong> We provide shipping exclusively to the Continental United States (the 48 lower states).</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Shipping Costs:</strong> We offer <strong>FREE SHIPPING</strong> on all orders delivered within the Continental United States. No minimum purchase is required.</span></li>
                <li class="flex items-start gap-2"><span class="text-[#B08A57] mt-1.5 shrink-0">●</span><span><strong>Exclusions:</strong> At this time, we do not ship to Alaska, Hawaii, U.S. Territories, or international destinations.</span></li>
            </ul>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-4 font-medium">2. Delivery Timeline</h2>
            <p class="mb-4">All our DIY kits are processed and shipped during business days (Monday to Friday, excluding public holidays).</p>
            <div class="bg-[#F3EDE2] rounded-2xl overflow-hidden border border-[#D9D2C5]/40 mb-4">
                <?php
                $times = [
                    ['Order Handling Time',          '3–5 business days (Monday - Friday)'],
                    ['Transit Time',                 '3–5 business days (Monday - Friday)'],
                    ['Total Estimated Delivery Time', '7–10 business days'],
                ];
                foreach ($times as $i => [$dest, $est]):
                ?>
                <div class="flex justify-between items-center px-6 py-4 <?= $i > 0 ? 'border-t border-[#D9D2C5]/40' : '' ?>">
                    <span class="font-semibold text-[#4A3426]"><?= $dest ?></span>
                    <span class="text-[#B08A57] font-medium"><?= $est ?></span>
                </div>
                <?php endforeach; ?>
            </div>
            <p class="text-xs text-[#7A6C5F]/70">Note: Orders placed on weekends or after business hours will begin processing on the following business day.</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">3. Order Tracking</h2>
            <p>Once your package is on its way, you will receive a Shipping Confirmation email containing your tracking number. You can monitor your delivery status directly through the carrier’s official website. Please allow 24-48 hours for tracking information to be updated by the carrier.</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">4. Address Changes</h2>
            <p>We strive to process orders as quickly as possible. If you need to change your shipping address, please contact us at <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] hover:underline">contact@bardicshop.com</a> as soon as possible after placing your order. Once the order has been handed over to the carrier, we are unable to redirect the package.</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">5. Taxes</h2>
            <p>For all orders, sales tax will be calculated and applied at checkout based on your state's local tax laws. The final total, including applicable taxes, will be clearly displayed before you confirm your purchase.</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">6. Delivery Issues & Damaged Goods</h2>
            <p>Your satisfaction is our priority. If your order arrives damaged or if you have any issues with the delivery, please contact us at <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] hover:underline">contact@bardicshop.com</a> within 48 hours of the scheduled delivery. We will investigate with the carrier and provide a replacement or full refund to ensure you have what you need to complete your instrument.</p>
        </div>

        <div class="border-t border-[#D9D2C5]/40 pt-8 bg-[#F3EDE2] rounded-2xl p-8 !mt-4 font-sans text-xs space-y-2">
            <h2 class="font-serif text-xl text-[#4A3426] mb-3 font-medium">7. Contact Information</h2>
            <p>If you have any questions regarding our shipping process, please reach out to us:</p>
            <p><strong>Store Name:</strong> Bardic</p>
            <p><strong>Email:</strong> <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] hover:underline">contact@bardicshop.com</a></p>
            <p><strong>Business Address:</strong> 2000 Parkview Dr, South Holland, IL 60473</p>
            <p><strong>Customer Service Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM (EST)</p>
        </div>
    </div>
</section>
