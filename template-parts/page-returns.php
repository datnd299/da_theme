<?php
/**
 * Template Part: page-returns
 */
?>

<div id="primary" class="bg-[#F7FAF9] font-body text-[#17202A]">
    <section class="bg-[#102A2C] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#F6A21A]"><?php esc_html_e('Rubyinstar Customer Care', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#D7DEE8]">
                <?php esc_html_e('Thank you for shopping with Rubyinstar. Our return process is clear, transparent, and focused on unused tires that remain in original condition.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#B8C3D1]">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-3 lg:gap-6">
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F97316] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Return Window', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('30 Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Restocking Fee', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('$0 — None', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#111827] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Support Response', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-12 grid gap-10 lg:mt-14 lg:grid-cols-[240px_minmax(0,1fr)] lg:items-start lg:gap-10">
                <aside class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#5B6472]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <nav class="mt-5 space-y-3" aria-label="<?php esc_attr_e('Return policy sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#return-window"><?php esc_html_e('Return Window', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#return-conditions"><?php esc_html_e('Return Conditions', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#return-shipping"><?php esc_html_e('Shipping & Fees', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#return-process"><?php esc_html_e('How to Return', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#111827] hover:bg-[#F4F6F8]" href="#refunds-exchanges"><?php esc_html_e('Refunds & Exchanges', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#111827] hover:bg-[#F4F6F8]" href="#contact-info"><?php esc_html_e('Contact Information', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#2563EB] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy &rarr;', 'dawp'); ?></a>
                    </nav>
                </aside>

                <div class="space-y-10">
                    <article class="scroll-mt-24 rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#F97316] text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6M5 15a7 7 0 0011.7 3.2M19 9A7 7 0 007.3 5.8" />
                            </svg>
                        </div>
                        <h2 class="font-heading text-3xl font-black leading-tight text-[#0B1F33]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h2>
                        <div class="mt-6 max-w-none text-base leading-7 text-[#4B5563] [&_h3+ol]:mt-5 [&_h3+p]:mt-5 [&_h3+ul]:mt-5 [&_li]:leading-7 [&_p+p]:mt-4">

                            <h3 id="return-window" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#F97316] bg-[#FFF7ED] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('1. Return Window', 'dawp'); ?></h3>
                            <p><?php esc_html_e('You have 30 days from the date of delivery to request a return for your eligible tires.', 'dawp'); ?></p>

                            <h3 id="return-conditions" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#F97316] bg-[#FFF7ED] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('2. Return Conditions', 'dawp'); ?></h3>
                            <p><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Condition:', 'dawp'); ?></strong> <?php esc_html_e('The tire must be unused, unmounted, undriven, undamaged, and in its original condition.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Packaging:', 'dawp'); ?></strong> <?php esc_html_e('Original labels, tags, and packaging must be intact.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Proof of Purchase:', 'dawp'); ?></strong> <?php esc_html_e('A valid order number or order confirmation email is required.', 'dawp'); ?></li>
                            </ul>
                            <p class="mt-6 font-bold text-[#0B1F33]"><?php esc_html_e('Non-Returnable Items:', 'dawp'); ?></p>
                            <ul class="mt-3 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('Tires that have been mounted, balanced, installed, or driven on.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Tires damaged due to improper installation, misuse, or road hazards.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Items marked as "Final Sale" or "Clearance" at the time of purchase.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="return-shipping" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#F97316] bg-[#FFF7ED] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('3. Return Shipping & Fees', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li>
                                    <strong><?php esc_html_e('Return Shipping Cost:', 'dawp'); ?></strong>
                                    <ul class="mt-3 list-disc space-y-2 pl-6">
                                        <li><?php esc_html_e('If the return is due to our error (incorrect, defective, or damaged item), Rubyinstar will cover 100% of the return shipping costs.', 'dawp'); ?></li>
                                        <li><?php esc_html_e('For customer remorse (ordered wrong size, changed mind, etc.), the customer is responsible for the actual return shipping costs.', 'dawp'); ?></li>
                                    </ul>
                                </li>
                                <li><strong><?php esc_html_e('Restocking Fee:', 'dawp'); ?></strong> <?php esc_html_e('We do NOT charge any restocking fees ($0).', 'dawp'); ?></li>
                            </ul>

                            <h3 id="return-process" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#111827] bg-[#F4F6F8] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('4. How to Initiate a Return', 'dawp'); ?></h3>
                            <ol class="mt-5 list-decimal space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Contact Us:', 'dawp'); ?></strong> <?php esc_html_e('Email our support team at support@rubyinstar.com within 30 days of delivery. Please provide your order number, tire model/size, and clear photos of the items.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Get Return Authorization:', 'dawp'); ?></strong> <?php esc_html_e('Our team will review your request within 1–2 business days and provide a return authorization along with the specific return shipping address. Please do not send items back without this authorization.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Ship the Item:', 'dawp'); ?></strong> <?php esc_html_e('Securely pack the tires and ship them using a trackable shipping service.', 'dawp'); ?></li>
                            </ol>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#111827] bg-[#F4F6F8] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('5. Damaged, Defective, or Incorrect Items', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Please inspect your order upon arrival. If you receive a damaged, defective, or incorrect tire, please contact us at support@rubyinstar.com within 7 days of delivery. We will arrange a free replacement or a full refund at no additional cost to you.', 'dawp'); ?></p>

                            <h3 id="refunds-exchanges" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#111827] bg-[#F4F6F8] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('6. Refunds & Exchanges', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Refund Processing:', 'dawp'); ?></strong> <?php esc_html_e('Once we receive and inspect your returned item, we will send you an email notification. Approved refunds will be processed automatically to your original method of payment.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Timeline:', 'dawp'); ?></strong> <?php esc_html_e('Refunds are typically processed within 5–10 business days after we receive the return. Please note that your bank or credit card company may take additional time to post the credit to your account.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Exchanges:', 'dawp'); ?></strong> <?php esc_html_e('We offer exchanges for incorrect, damaged, or defective items. If the item is out of stock, a full refund will be issued.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="contact-info" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Contact Information', 'dawp'); ?></h3>
                            <p><?php esc_html_e('For any questions regarding our Return and Refund Policy, please contact us:', 'dawp'); ?></p>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Store Name:', 'dawp'); ?></strong> <?php esc_html_e('Rubyinstar', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Website:', 'dawp'); ?></strong> <?php esc_html_e('rubyinstar.com', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Email:', 'dawp'); ?></strong> <a href="mailto:support@rubyinstar.com" class="text-[#2563EB] underline hover:no-underline">support@rubyinstar.com</a></li>
                                <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday - Friday, 9:00 AM - 5:00 PM (GMT-08:00) Pacific Standard Time (Los Angeles)', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Response Time:', 'dawp'); ?></strong> <?php esc_html_e('Within 1–2 business days', 'dawp'); ?></li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.virtual-page--returns > #primary{background:#fff;color:#111}
.virtual-page--returns > #primary > section:first-child{position:relative;overflow:hidden;background:#050505}
.virtual-page--returns > #primary > section:first-child:before{position:absolute;inset:0;background:linear-gradient(90deg,rgba(5,5,5,.96),rgba(5,5,5,.76) 52%,rgba(5,5,5,.36)),linear-gradient(180deg,rgba(5,5,5,0) 58%,#050505);content:""}
.virtual-page--returns > #primary > section:first-child > div{position:relative;z-index:1}
.virtual-page--returns [class*="text-[#F6A21A]"]{color:#fbbf24}
.virtual-page--returns [class*="text-[#2563EB]"]{color:#991b1b}
.virtual-page--returns [class*="border-t-[#2563EB]"],.virtual-page--returns [class*="border-t-[#F97316]"],.virtual-page--returns [class*="border-t-[#111827]"]{border-top-color:#dc2626}
.virtual-page--returns [class*="border-l-4"]{border-left-color:#dc2626;background:#fef2f2}
.virtual-page--returns aside,.virtual-page--returns article,.virtual-page--returns [class*="rounded-lg"],.virtual-page--returns [class*="rounded-md"]{border-radius:8px}
</style>
