<?php
/**
 * Template Part: FAQ Page
 *
 * Clear, policy-aligned answers for shipping, delivery, returns, refunds,
 * exchanges, and footwear condition requirements.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name      = 'Handed Shoes';
$support_email   = 'support@handedshoes.com';
$contact_url     = home_url('/contact-us/');
$track_url       = home_url('/track-order/');
$shipping_url    = home_url('/shipping-policy/');
$return_url      = home_url('/refund-return-policy/');
$size_url        = home_url('/size-guide/');
$privacy_url     = home_url('/privacy-policy/');
$terms_url       = home_url('/terms-conditions/');
$business_hours  = 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$response_time   = 'We aim to reply within 1 business day.';
$order_cutoff    = '5:00 PM (GMT-08:00) Pacific Standard Time (Los Angeles)';
$handling_time   = '1-2 business days, Monday to Friday';
$transit_time    = '5-7 business days, Monday to Friday';
$estimated_time  = 'usually 6-9 business days';

$faq_categories = [
    [
        'title' => 'Orders & Tracking',
        'icon'  => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line>',
        'items' => [
            [
                'question' => 'Can I cancel my order after placing it?',
                'answer'   => sprintf(
                    'You may request an order cancellation within 9 hours after placing the order, as long as the order has not been processed or shipped. Once an order has shipped, it can no longer be canceled, but you may request a return after delivery under our <a href="%s" class="text-accent hover:underline font-medium">Refund & Return Policy</a>.',
                    esc_url($return_url)
                ),
            ],
            [
                'question' => 'How do I track my order?',
                'answer'   => sprintf(
                    'Once your order ships, tracking information will be sent to the email address used at checkout. You can also use our <a href="%s" class="text-accent hover:underline font-medium">Order Tracking page</a>. Please allow up to 24-48 hours for tracking to update after the carrier receives the package.',
                    esc_url($track_url)
                ),
            ],
            [
                'question' => 'What information should I include when contacting support?',
                'answer'   => 'For order, shipping, or return questions, include your order number, the email used at checkout, delivery address, tracking number if available, product details, and photos or video when the item or package is damaged, defective, incorrect, or missing parts.',
            ],
        ],
    ],
    [
        'title' => 'Shipping & Delivery',
        'icon'  => '<rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle>',
        'items' => [
            [
                'question' => 'How long does delivery usually take?',
                'answer'   => sprintf(
                    'Orders placed before the %1$s cutoff can begin processing the same business day. Handling time is %2$s, and standard transit time is %3$s after dispatch. Most orders are delivered within %4$s. Some bulky, oversized, special-handling, freight, or partner-shipped items may take longer.',
                    esc_html($order_cutoff),
                    esc_html($handling_time),
                    esc_html($transit_time),
                    esc_html($estimated_time)
                ),
            ],
            [
                'question' => 'Where does Handed Shoes ship?',
                'answer'   => sprintf(
                    '%s currently ships to the United States. Some products may have restrictions due to size, weight, carrier limits, product type, or local regulations.',
                    esc_html($store_name)
                ),
            ],
            [
                'question' => 'How much does shipping cost?',
                'answer'   => sprintf(
                    'Shipping costs, available shipping methods, and any applicable fees are shown at checkout before payment is completed. Oversized or special-handling items may have different shipping requirements. See the <a href="%s" class="text-accent hover:underline font-medium">Shipping Policy</a> for full details.',
                    esc_url($shipping_url)
                ),
            ],
            [
                'question' => 'Why did my items arrive in separate packages?',
                'answer'   => 'Orders with multiple items may ship separately and arrive at different times when items are fulfilled from different warehouses, require different handling times, or need special packaging. You may receive more than one tracking number for the same order.',
            ],
            [
                'question' => 'What should I do if my package is delayed, lost, or marked delivered but not received?',
                'answer'   => 'Contact support with your order number, delivery address, tracking number, and a short description of the issue. If a package appears lost or has no tracking updates for an extended period, contact us within 30 days of the expected delivery date or latest tracking status so we can review the tracking information and may contact the carrier.',
            ],
            [
                'question' => 'Can I change my shipping address after ordering?',
                'answer'   => 'Customers are responsible for entering a complete and accurate shipping address at checkout. If you notice an address error, contact us as soon as possible. We can only update the address if the order has not yet been processed or shipped.',
            ],
        ],
    ],
    [
        'title' => 'Returns & Refunds',
        'icon'  => '<path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline>',
        'items' => [
            [
                'question' => 'What is your return window?',
                'answer'   => sprintf(
                    'You may request a return within 30 days from the day your order is delivered, unless the product page states a different return window. Eligible items must be unused, unworn, undamaged, in original condition, and returned with original packaging, tags, labels, accessories, manuals, and included parts where applicable. Read the full <a href="%s" class="text-accent hover:underline font-medium">Refund & Return Policy</a>.',
                    esc_url($return_url)
                ),
            ],
            [
                'question' => 'Do you charge a restocking fee?',
                'answer'   => 'No. We charge a $0 restocking fee for eligible returns.',
            ],
            [
                'question' => 'How do I start a return?',
                'answer'   => sprintf(
                    'Contact us at <a href="mailto:%1$s" class="text-accent hover:underline font-medium">%1$s</a> or through the <a href="%2$s" class="text-accent hover:underline font-medium">Contact page</a> with your order number, email used at checkout, item(s) you want to return, reason for return, and photos or video if the item is damaged, defective, incorrect, or the package arrived damaged. Please wait for return authorization and instructions before sending any item back.',
                    esc_attr($support_email),
                    esc_url($contact_url)
                ),
            ],
            [
                'question' => 'Who pays for return shipping?',
                'answer'   => 'We cover return shipping or provide a prepaid return label when you received the wrong item, the item arrived damaged due to the carrier, or the item is defective, missing essential parts, or not functioning as intended. For customer remorse, change of mind, wrong size, wrong color, wrong model, compatibility issues, or orders placed by mistake, the customer pays the actual return shipping cost. Original shipping costs are non-refundable.',
            ],
            [
                'question' => 'How long does a refund take?',
                'answer'   => 'Once we receive your return, we inspect the item to confirm it meets our return criteria. After approval, the refund is processed to the original payment method whenever possible. It typically takes up to 7 days for the refund to appear, depending on your bank or payment provider.',
            ],
            [
                'question' => 'Can I exchange for another size, color, or model?',
                'answer'   => 'Yes, exchanges may be available and are subject to stock availability. In some cases, the fastest option is to return the original item for a refund and place a new order.',
            ],
        ],
    ],
    [
        'title' => 'Footwear Condition & Sizing',
        'icon'  => '<path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line>',
        'items' => [
            [
                'question' => 'What footwear condition is required for returns?',
                'answer'   => 'Shoes must be unworn, undamaged, and free of outdoor wear, sole marks, stains, odor, and heavy creasing. Original packaging, tags, inserts, dust bags, or accessories should be included where applicable. Try shoes on a clean indoor surface to avoid marks on soles or uppers.',
            ],
            [
                'question' => 'What items are non-returnable?',
                'answer'   => 'Non-returnable items may include items marked Final Sale or Non-Returnable, gift cards or digital products, personal care or hygiene items where applicable, used or worn footwear, modified or damaged items, items missing original packaging or included parts, and restricted items that cannot be shipped back safely.',
            ],
            [
                'question' => 'How do I choose the right shoe size?',
                'answer'   => sprintf(
                    'Review the product details and our <a href="%s" class="text-accent hover:underline font-medium">Size Guide</a> before ordering. Because formal footwear can show wear quickly, check fit carefully on a clean indoor surface before outdoor use.',
                    esc_url($size_url)
                ),
            ],
        ],
    ],
];

$allowed_answer_html = [
    'a' => [
        'href'  => true,
        'class' => true,
    ],
];
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center mb-16">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block">Common Questions</span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight">Frequently Asked Questions</h1>
            <p class="text-foreground-muted text-lg max-w-2xl mx-auto leading-relaxed">
                Clear answers about shipping, delivery, returns, refunds, and formal footwear condition requirements. Need help with a specific order? <a href="<?php echo esc_url($contact_url); ?>" class="text-accent hover:underline font-medium">Contact our support team</a>.
            </p>
        </div>

        <div class="space-y-12">
            <?php foreach ($faq_categories as $category_index => $category) : ?>
                <div class="faq-category">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $category['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h2 class="font-heading text-3xl text-foreground font-semibold"><?php echo esc_html($category['title']); ?></h2>
                    </div>

                    <div class="space-y-4">
                        <?php foreach ($category['items'] as $item_index => $item) : ?>
                            <?php $panel_id = 'faq-panel-' . $category_index . '-' . $item_index; ?>
                            <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                                <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr($panel_id); ?>">
                                    <span class="font-medium text-lg text-foreground pr-8"><?php echo esc_html($item['question']); ?></span>
                                    <span class="faq-icon text-accent transition-transform duration-normal" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </span>
                                </button>
                                <div id="<?php echo esc_attr($panel_id); ?>" class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                                    <p><?php echo wp_kses($item['answer'], $allowed_answer_html); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-20 bg-accent-soft p-10 md:p-16 rounded-3xl text-center">
            <h3 class="font-heading text-3xl text-foreground font-bold mb-4">Still have questions?</h3>
            <p class="text-foreground-muted text-lg mb-8 max-w-xl mx-auto">
                Email us with your order number and details. Business hours: <?php echo esc_html($business_hours); ?>. <?php echo esc_html($response_time); ?>
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-accent text-white font-semibold rounded-full hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20">
                    Contact Support
                </a>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-white text-foreground font-semibold rounded-full border border-border hover:bg-surface-alt transition-colors">
                    Email Us Directly
                </a>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-border flex flex-wrap justify-center gap-x-8 gap-y-4 text-sm text-muted">
            <a href="<?php echo esc_url($shipping_url); ?>" class="hover:text-accent transition-colors">Shipping Policy</a>
            <a href="<?php echo esc_url($return_url); ?>" class="hover:text-accent transition-colors">Refund & Return Policy</a>
            <a href="<?php echo esc_url($privacy_url); ?>" class="hover:text-accent transition-colors">Privacy Policy</a>
            <a href="<?php echo esc_url($terms_url); ?>" class="hover:text-accent transition-colors">Terms of Service</a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqTriggers = document.querySelectorAll('.faq-trigger');

    faqTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            const isOpen = !content.classList.contains('hidden');

            content.classList.toggle('hidden', isOpen);
            this.setAttribute('aria-expanded', String(!isOpen));
            icon.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
        });
    });
});
</script>
