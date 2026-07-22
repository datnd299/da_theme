<?php
/**
 * Template Part: FAQ Page
 */

?>

<section class="bg-[#F7F8FA] py-16 lg:py-24">
    <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-12 text-center">
            <span class="mb-4 block text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Customer Help', 'dawp'); ?></span>
            <h1 class="font-heading text-5xl font-black uppercase leading-none text-[#111827] md:text-6xl"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
            <p class="mx-auto mt-5 max-w-3xl text-lg leading-8 text-[#6B7280]">
                <?php esc_html_e('Last Updated: June 3, 2026', 'dawp'); ?>
            </p>
            <p class="mx-auto mt-4 max-w-4xl text-lg leading-8 text-[#6B7280]">
                <?php esc_html_e('Find fast answers about Shopmivo orders, U.S. shipping, tracking, returns, refunds, products, checkout security, and customer support.', 'dawp'); ?>
            </p>
        </div>

        <div class="space-y-8">
            <section class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-6 hover:border-[#D71920]">
                        <h2 class="text-lg font-black text-[#111827]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('U.S. shipping, order handling, transit times, carrier details, and delivery support.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-6 hover:border-[#D71920]">
                        <h2 class="text-lg font-black text-[#111827]"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('30-day return eligibility, return shipping fees, refunds, and non-returnable items.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-6 hover:border-[#D71920]">
                        <h2 class="text-lg font-black text-[#111827]"><?php esc_html_e('Track Order', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('Use your order details to check the latest available shipment status.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="rounded-lg border border-[#E5E7EB] bg-[#111827] p-6 text-white hover:border-[#D71920]">
                        <h2 class="text-lg font-black"><?php esc_html_e('Contact Support', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-white/72"><?php esc_html_e('Send your order number, product question, or return request.', 'dawp'); ?></p>
                    </a>
                </div>
            </section>

            <section id="orders-shipping" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Orders & Shipping', 'dawp'); ?></h2>
                <div class="mt-6 space-y-4">
                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('Where does Shopmivo ship?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('Shopmivo currently ships exclusively within the United States. If a product, destination, or carrier limitation prevents delivery to your address, that restriction will be shown at checkout before payment is processed.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('How much does shipping cost?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('Standard U.S. shipping is free for all orders nationwide, with no minimum purchase requirement. If optional upgraded shipping is available, the exact cost will be displayed clearly at checkout before you complete payment.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('How long does delivery take?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('Orders are processed in 1-3 business days after the order cutoff time of 5:00 PM Pacific Standard Time. Standard transit time is 5-7 business days, so the estimated delivery window is 6-10 business days from purchase.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('Which carriers do you use?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('Shopmivo ships orders through trusted domestic U.S. carriers, including USPS, UPS, FedEx, or DHL. The final carrier is selected when your package is labeled and prepared for shipment.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('Will multiple items ship together?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('Some multi-item orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods. You will receive tracking details for each package once available.', 'dawp'); ?></p>
                    </details>
                </div>
            </section>

            <section id="tracking-delivery" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Tracking & Delivery Issues', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-5 md:grid-cols-2">
                    <div class="rounded-lg bg-[#F7F8FA] p-6">
                        <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('How do I track my order?', 'dawp'); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#6B7280]">
                            <?php esc_html_e('Once your order ships, a shipping confirmation email with a direct tracking link and courier details will be sent to the email address used at checkout. You can also use our', 'dawp'); ?>
                            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="font-bold text-[#D71920] hover:underline"><?php esc_html_e('Track Order page', 'dawp'); ?></a>.
                        </p>
                    </div>
                    <div class="rounded-lg bg-[#111827] p-6 text-white">
                        <h3 class="text-xl font-black"><?php esc_html_e('What if tracking stops updating?', 'dawp'); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-white/72"><?php esc_html_e('If tracking stops updating, shows an extended delay, or is marked delivered but you did not receive the package, contact support with your order number, checkout email, full delivery address, and any relevant photos if damage is involved.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="mt-6 rounded-lg border border-[#F2C94C] bg-[#FFF7E6] p-5 leading-8 text-[#111827]">
                    <?php esc_html_e('If your package or item arrives damaged, contact us within 30 days of delivery with photos of the item, shipping packaging, and shipping label so we can investigate and arrange a replacement or refund if eligible.', 'dawp'); ?>
                </div>
            </section>

            <section id="returns-refunds" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></h2>
                <div class="mt-6 space-y-4">
                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('What is your return window?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('Eligible unused items in original condition may be returned within 30 days of delivery.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('What condition must a return be in?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('Returned items must be unused, undamaged, and in original condition with original packaging, tags, labels, manuals, and included accessories where applicable.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('Who pays return shipping?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('For defective, damaged, or incorrect products, Shopmivo covers 100% of return shipping and provides a prepaid label by email. For customer remorse, such as ordering the wrong item or changing your mind, the prepaid label cost is deducted from the final refund.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('Do you charge restocking fees?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('No. Shopmivo does not charge restocking fees for eligible returns.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('How long does a refund take?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('After your return package is received, we inspect the item within 1-2 business days. If approved, the refund is processed to your original payment method within 7 business days. If you have not received your refund after 15 business days of approval, please check with your bank or card company first, then contact us.', 'dawp'); ?></p>
                    </details>

                    <details class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                        <summary class="cursor-pointer text-lg font-black text-[#111827]"><?php esc_html_e('Do you offer exchanges?', 'dawp'); ?></summary>
                        <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('We do not process direct one-for-one exchanges. To get a different size, color, or item, return the original purchase through the approved return process and place a new order on our website.', 'dawp'); ?></p>
                    </details>
                </div>
            </section>

            <section id="products-categories" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Products & Categories', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-5 md:grid-cols-2">
                    <div class="rounded-lg bg-[#F7F8FA] p-6">
                        <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('How do I find the right product?', 'dawp'); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('Browse by category — Tools, Houseware, Vehicle Service, Gift and Toy, Pet Supplies, or Clothing and Accessories — then review the product page for sizing, materials, and included items before placing an order.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-lg bg-[#F7F8FA] p-6">
                        <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Is Shopmivo affiliated with Walmart?', 'dawp'); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('No. Shopmivo is an independent general merchandise store and is not affiliated with, endorsed by, or sponsored by Walmart Inc. or any other retailer.', 'dawp'); ?></p>
                    </div>
                </div>
            </section>

            <section id="payments-privacy" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Payments & Privacy', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-5 md:grid-cols-2">
                    <div class="rounded-lg bg-[#111827] p-6 text-white">
                        <h3 class="text-xl font-black"><?php esc_html_e('Is checkout secure?', 'dawp'); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-white/72"><?php esc_html_e('Yes. Checkout uses encrypted HTTPS/SSL connections, and payments are handled by trusted third-party payment processors that comply with PCI-DSS standards. Shopmivo does not store, view, or retain your raw credit card numbers on our servers.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-lg bg-[#F7F8FA] p-6">
                        <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('How is my personal information used?', 'dawp'); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#6B7280]">
                            <?php esc_html_e('We use order, contact, and website interaction information to process payments, fulfill orders, send order updates, screen for risk, respond to support requests, and operate the store. More details are available in our', 'dawp'); ?>
                            <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="font-bold text-[#D71920] hover:underline"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>.
                        </p>
                    </div>
                </div>
            </section>

            <section id="contact-information" class="rounded-xl border border-dashed border-[#D71920]/35 bg-white p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Still Need Help?', 'dawp'); ?></h2>
                <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('For order support, return requests, delivery issues, or product questions, contact Shopmivo through our official support channels below. Please include your order number and checkout email when asking about an existing order.', 'dawp'); ?></p>
                <dl class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-lg bg-[#F7F8FA] p-5">
                        <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                        <dd class="font-bold text-[#111827]">Shopmivo</dd>
                    </div>
                    <div class="rounded-lg bg-[#F7F8FA] p-5">
                        <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt>
                        <dd><a href="mailto:support@shopmivo.com" class="font-bold text-[#111827] hover:text-[#D71920]">support@shopmivo.com</a></dd>
                    </div>
                    <div class="rounded-lg bg-[#F7F8FA] p-5">
                        <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Physical Business Address', 'dawp'); ?></dt>
                        <dd class="font-bold text-[#111827]">1777 Canal St, Merced, CA 95340, United States</dd>
                    </div>
                    <div class="rounded-lg bg-[#F7F8FA] p-5">
                        <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Customer Service Hours', 'dawp'); ?></dt>
                        <dd class="font-bold text-[#111827]">Monday-Friday, 9:00 AM-5:00 PM PST (Los Angeles)</dd>
                    </div>
                    <div class="rounded-lg bg-[#F7F8FA] p-5">
                        <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Response Time', 'dawp'); ?></dt>
                        <dd class="font-bold text-[#111827]"><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></dd>
                    </div>
                    <div class="rounded-lg bg-[#F7F8FA] p-5">
                        <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Contact Page', 'dawp'); ?></dt>
                        <dd><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="font-bold text-[#111827] hover:text-[#D71920]"><?php esc_html_e('Contact Us', 'dawp'); ?></a></dd>
                    </div>
                </dl>
            </section>
        </div>
    </div>
</section>
