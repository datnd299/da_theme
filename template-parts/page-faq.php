<?php
/**
 * Template Part: Frequently Asked Questions
 *
 * Customer-facing FAQ content aligned with Shop Kelli's shipping, returns,
 * privacy, and terms pages.
 */

$store_name       = 'Shop Kelli Boutique';
$support_email    = 'support@shopkelli.com';
$mailing_address  = dawp_get_woocommerce_store_address();
$support_hours    = 'Monday-Friday, 10:00 AM-6:00 PM PST';
$contact_page_url = home_url('/contact-us/');
$shipping_policy  = home_url('/shipping-policy/');
$return_policy    = home_url('/refund-return-policy/');
$privacy_policy   = home_url('/privacy-policy/');
$terms_policy     = home_url('/terms-conditions/');
$track_order_url  = home_url('/track-order/');

$faq_sections = array(
    array(
        'title' => __('Orders & Checkout', 'dawp'),
        'items' => array(
            array(
                'question' => __('Where can I buy Shop Kelli products?', 'dawp'),
                'answer'   => __('Products shown on shopkelli.com are available for direct purchase through our online store. Customers can add available items to the cart and complete checkout on the website.', 'dawp'),
            ),
            array(
                'question' => __('Can my order be cancelled or changed after checkout?', 'dawp'),
                'answer'   => __('Please contact us as soon as possible if you need to request a change or cancellation. We cannot guarantee changes after an order has entered processing, shipment preparation, or carrier handoff.', 'dawp'),
            ),
            array(
                'question' => __('Why was my order cancelled?', 'dawp'),
                'answer'   => __('An order may be cancelled if an item becomes unavailable, billing or shipping information cannot be verified, a delivery limitation applies, or a pricing or product listing error must be corrected. If this happens, we will notify you using the contact information provided at checkout.', 'dawp'),
            ),
        ),
    ),
    array(
        'title' => __('Shipping & Delivery', 'dawp'),
        'items' => array(
            array(
                'question' => __('Where do you ship?', 'dawp'),
                'answer'   => __('Shop Kelli currently ships exclusively within the United States. If a product, destination, or carrier limitation prevents delivery to your specific address, you will be notified at checkout before payment is completed.', 'dawp'),
            ),
            array(
                'question' => __('How much is shipping?', 'dawp'),
                'answer'   => __('Standard U.S. shipping is free for all orders nationwide, with no minimum purchase requirement. Optional upgraded shipping, when available, will show its exact cost at checkout before you pay.', 'dawp'),
            ),
            array(
                'question' => __('How long does delivery take?', 'dawp'),
                'answer'   => __('Orders are processed in 1-3 business days after purchase. Standard transit takes 5-7 business days, so the estimated delivery window is 6-10 business days total from the date of purchase.', 'dawp'),
            ),
            array(
                'question' => __('What is your order cutoff time?', 'dawp'),
                'answer'   => __('Our order cutoff time is 5:00 PM (GMT-08:00) Pacific Standard Time. Orders placed after the cutoff begin processing on the following business day.', 'dawp'),
            ),
        ),
        'links' => array(
            array(
                'label' => __('Read Shipping Policy', 'dawp'),
                'url'   => $shipping_policy,
                'style' => 'secondary',
            ),
            array(
                'label' => __('Track Order', 'dawp'),
                'url'   => $track_order_url,
                'style' => 'primary',
            ),
        ),
    ),
    array(
        'title' => __('Tracking & Delivery Issues', 'dawp'),
        'items' => array(
            array(
                'question' => __('How do I track my order?', 'dawp'),
                'answer'   => __('After your order ships, we send a shipping confirmation email with a tracking link and carrier details. Orders may ship with USPS, UPS, FedEx, or DHL, depending on the package and destination.', 'dawp'),
            ),
            array(
                'question' => __('Why did I receive multiple tracking numbers?', 'dawp'),
                'answer'   => __('Orders containing multiple boutique clothing pieces, accessories, mommy and me styles, or girls collection items may ship separately from different fulfillment batches. Each shipment will have its own tracking number.', 'dawp'),
            ),
            array(
                'question' => __('What should I do if my package is delayed, lost, or marked delivered but missing?', 'dawp'),
                'answer'   => __('Contact customer support within 30 days of the recorded delivery date or the expected delivery issue. Please include your order number, checkout email address, complete delivery address, and any carrier tracking details so we can investigate with the carrier.', 'dawp'),
            ),
            array(
                'question' => __('What if my item arrives damaged or incorrect?', 'dawp'),
                'answer'   => __('Contact us within 30 days of delivery with your order number and clear photos of the item, packaging, and shipping label. For defective, damaged, incorrect, or carrier-damaged products, we cover the return shipping cost and will arrange the appropriate replacement or refund.', 'dawp'),
            ),
        ),
    ),
    array(
        'title' => __('Returns & Refunds', 'dawp'),
        'items' => array(
            array(
                'question' => __('What is your return window?', 'dawp'),
                'answer'   => __('Eligible return requests must be initiated within 30 days of delivery. Items must be unworn, unused, undamaged, and returned in their original condition with packaging, tags, labels, care cards, garment bags, boxes, and included accessories.', 'dawp'),
            ),
            array(
                'question' => __('Do you charge a restocking fee?', 'dawp'),
                'answer'   => __('No. Shop Kelli does not charge restocking fees for eligible returns.', 'dawp'),
            ),
            array(
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer'   => __('For defective, damaged, incorrect, or carrier-damaged products, Shop Kelli covers 100% of return shipping and provides a prepaid label by email. For customer remorse, including wrong size, wrong color, changed mind, or does not fit, the customer is responsible for return shipping and the label cost may be deducted from the refund.', 'dawp'),
            ),
            array(
                'question' => __('When will I receive my refund?', 'dawp'),
                'answer'   => __('After your return package is received, we inspect the item within 1-2 business days. If approved, the refund is issued to your original payment method within 7 business days. If you have not received a refund after 15 business days of approval, please contact us after checking with your bank or card issuer.', 'dawp'),
            ),
            array(
                'question' => __('How do I start a return?', 'dawp'),
                'answer'   => __('Email us or use the Contact Us page within 30 days of delivery. Include your order number, checkout email, item(s) you want to return, reason for return, and photos or videos if the item is damaged, defective, or incorrect. Do not ship an item back without return authorization.', 'dawp'),
            ),
            array(
                'question' => __('Do you offer exchanges?', 'dawp'),
                'answer'   => __('We do not process direct one-for-one exchanges. To get a different size, color, or style, please return the original eligible item for a refund and place a new order on the website.', 'dawp'),
            ),
            array(
                'question' => __('Which items are non-returnable?', 'dawp'),
                'answer'   => __('Final sale or non-returnable items, gift cards, digital products, personalized or custom-made items, certain hygiene-sensitive items with broken seals, and items worn, washed, altered, or damaged after delivery are not eligible for return.', 'dawp'),
            ),
        ),
        'links' => array(
            array(
                'label' => __('Read Refund & Return Policy', 'dawp'),
                'url'   => $return_policy,
                'style' => 'secondary',
            ),
            array(
                'label' => $support_email,
                'url'   => 'mailto:' . $support_email,
                'style' => 'primary',
            ),
        ),
    ),
    array(
        'title' => __('Payment, Privacy & Security', 'dawp'),
        'items' => array(
            array(
                'question' => __('Is checkout secure?', 'dawp'),
                'answer'   => __('Yes. Checkout uses SSL-protected payment transmission through WooCommerce and certified third-party payment gateways. Shop Kelli does not store raw credit card numbers on local storefront servers.', 'dawp'),
            ),
            array(
                'question' => __('What payment methods are available?', 'dawp'),
                'answer'   => __('At least one conventional payment method is available during checkout, such as credit card, debit card, invoicing, or another supported payment option shown before order completion. The checkout page displays the full order cost before payment is submitted.', 'dawp'),
            ),
            array(
                'question' => __('How do you use my personal information?', 'dawp'),
                'answer'   => __('We use order and device information to process payments, fulfill orders, coordinate shipping, communicate order status, screen transactions for risk, and improve the store experience according to our Privacy Policy.', 'dawp'),
            ),
        ),
        'links' => array(
            array(
                'label' => __('Read Privacy Policy', 'dawp'),
                'url'   => $privacy_policy,
                'style' => 'secondary',
            ),
            array(
                'label' => __('Read Terms', 'dawp'),
                'url'   => $terms_policy,
                'style' => 'secondary',
            ),
        ),
    ),
);

?>

<main class="sk-policy-page bg-surface">
    <section class="sk-policy-hero">
        <div class="container mx-auto max-w-6xl px-4">
            <div class="sk-policy-hero__inner text-center">
                <span class="mb-4 block text-sm font-bold uppercase tracking-widest text-accent"><?php esc_html_e('Customer Care', 'dawp'); ?></span>
                <h1 class="font-heading text-4xl font-bold tracking-tight text-foreground md:text-5xl lg:text-6xl"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
                <p class="mt-5 text-sm font-bold uppercase tracking-widest text-foreground"><?php esc_html_e('Last Updated: May 30, 2026', 'dawp'); ?></p>
                <p class="sk-policy-hero__copy mx-auto mt-6 max-w-3xl text-lg leading-relaxed text-foreground-muted">
                    <?php esc_html_e('Find clear answers about Shop Kelli orders, shipping, returns, refunds, payment security, and customer support before you complete your purchase.', 'dawp'); ?>
                </p>
                <div class="mt-7 flex flex-wrap justify-center gap-4">
                    <a href="<?php echo esc_url($contact_page_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-foreground px-6 text-sm font-bold text-white transition-colors hover:bg-accent">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($track_order_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-6 text-sm font-bold text-foreground transition-colors hover:border-accent hover:text-accent">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="sk-policy-body">
        <div class="container mx-auto max-w-6xl px-4">
            <div class="space-y-8">
                <?php foreach ($faq_sections as $section_index => $faq_section) : ?>
                    <section class="rounded-3xl border border-border bg-background p-6 shadow-card md:p-10">
                        <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php echo esc_html($faq_section['title']); ?></h2>

                        <div class="mt-7 space-y-4">
                            <?php foreach ($faq_section['items'] as $item_index => $faq_item) : ?>
                                <details class="group rounded-2xl border border-border bg-background shadow-card transition-colors hover:border-accent" <?php echo 0 === $section_index && 0 === $item_index ? 'open' : ''; ?>>
                                    <summary class="flex cursor-pointer list-none items-center justify-between gap-5 p-5 text-left [&::-webkit-details-marker]:hidden">
                                        <span class="text-lg font-medium leading-snug text-foreground"><?php echo esc_html($faq_item['question']); ?></span>
                                        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full border border-border text-xl font-medium leading-none text-accent transition-colors group-open:border-accent group-open:bg-accent group-open:text-white">
                                            <span class="group-open:hidden" aria-hidden="true">+</span>
                                            <span class="hidden group-open:block" aria-hidden="true">-</span>
                                        </span>
                                    </summary>
                                    <div class="border-t border-border px-5 pb-5 pt-4">
                                        <p class="leading-relaxed text-foreground-muted"><?php echo esc_html($faq_item['answer']); ?></p>
                                    </div>
                                </details>
                            <?php endforeach; ?>
                        </div>

                        <?php if (! empty($faq_section['links'])) : ?>
                            <div class="mt-7 flex flex-wrap gap-4">
                                <?php foreach ($faq_section['links'] as $link) : ?>
                                    <?php
                                    $link_classes = 'inline-flex min-h-12 items-center justify-center rounded-full px-6 text-sm font-bold transition-colors ';
                                    $link_classes .= 'primary' === $link['style']
                                        ? 'bg-foreground text-white hover:bg-accent'
                                        : 'border border-foreground text-foreground hover:border-accent hover:text-accent';
                                    ?>
                                    <a href="<?php echo esc_url($link['url']); ?>" class="<?php echo esc_attr($link_classes); ?>">
                                        <?php echo esc_html($link['label']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>

                <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Customer Support', 'dawp'); ?></h2>
                    <p class="mt-5 leading-relaxed text-foreground-muted">
                        <?php esc_html_e('For order questions, shipment issues, returns, refunds, product questions, or privacy requests, contact Shop Kelli through the verified support channels below. We aim to reply within 1 business day, and response times may vary during weekends, holidays, or high-volume periods.', 'dawp'); ?>
                    </p>

                    <div class="mt-6 rounded-3xl border border-border bg-background p-4 md:p-5">
                        <div class="grid gap-4 md:grid-cols-2">
                            <div class="rounded-2xl border border-border p-5">
                                <h3 class="font-bold text-foreground"><?php esc_html_e('Store Name', 'dawp'); ?></h3>
                                <p class="mt-3 text-foreground-muted"><?php echo esc_html($store_name); ?></p>
                            </div>

                            <div class="rounded-2xl border border-border p-5">
                                <h3 class="font-bold text-foreground"><?php esc_html_e('Customer Support Email', 'dawp'); ?></h3>
                                <p class="mt-3 text-foreground-muted"><a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition-colors hover:text-accent"><?php echo esc_html($support_email); ?></a></p>
                            </div>

                            <div class="rounded-2xl border border-border p-5">
                                <h3 class="font-bold text-foreground"><?php esc_html_e('Physical Mailing Address', 'dawp'); ?></h3>
                                <p class="mt-3 leading-relaxed text-foreground-muted"><?php echo esc_html($mailing_address); ?></p>
                            </div>

                            <div class="rounded-2xl border border-border p-5">
                                <h3 class="font-bold text-foreground"><?php esc_html_e('Support Availability', 'dawp'); ?></h3>
                                <p class="mt-3 text-foreground-muted"><?php echo esc_html($support_hours); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-7 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url($contact_page_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-foreground px-6 text-sm font-bold text-white transition-colors hover:bg-accent">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-6 text-sm font-bold text-foreground transition-colors hover:border-accent hover:text-accent">
                            <?php echo esc_html($support_email); ?>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
