<?php
/**
 * FAQs page — Maison editorial layout.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Celvia';
$site_domain    = 'Celvia';
$support_email  = 'support@celviaus.com';
$store_address  = 'Loom Agency LLC, 198 Bear Branch Rd, Reevesville, SC 29471, US';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$shipping_url = home_url('/shipping-policy/');
$returns_url  = home_url('/return-refund-policy/');
$privacy_url  = home_url('/privacy-policy/');
$terms_url    = home_url('/terms-conditions/');
$track_url    = home_url('/track-order/');
$contact_url  = home_url('/contact-us/');
$last_updated = __('May 29, 2026', 'dawp');

$policy_highlights = [
    [
        'title' => __('Free U.S. Shipping', 'dawp'),
        'copy'  => __('Standard shipping is free nationwide within the United States, with no minimum purchase requirement.', 'dawp'),
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unused items may be returned within 30 days of documented delivery.', 'dawp'),
    ],
    [
        'title' => __('Secure Checkout', 'dawp'),
        'copy'  => __('Payments are processed through encrypted checkout and certified third-party payment gateways.', 'dawp'),
    ],
];

$faq_groups = [
    [
        'label' => __('Orders & Shipping', 'dawp'),
        'items' => [
            [
                'question' => __('Where does Celvia ship?', 'dawp'),
                'answer'   => __('Celvia currently ships exclusively within the United States domestic market. If a destination or carrier limitation prevents delivery to your address, checkout will notify you before payment is processed.', 'dawp'),
            ],
            [
                'question' => __('How much does shipping cost?', 'dawp'),
                'answer'   => __('Standard U.S. shipping is free ($0.00) for all orders nationwide with no minimum purchase requirement. If optional upgraded shipping is available, the exact cost is displayed at checkout before payment.', 'dawp'),
            ],
            [
                'question' => __('What is the daily order cutoff time?', 'dawp'),
                'answer'   => __('The daily order cutoff time is 5:00 PM (GMT-08:00) Pacific Standard Time (Monday to Friday). Orders placed after the cutoff begin processing on the following business day.', 'dawp'),
            ],
            [
                'question' => __('How long does order handling and delivery take?', 'dawp'),
                'answer'   => __('Order handling takes 3-5 business days (Monday to Friday), excluding standard U.S. public holidays. Standard transit takes 10-15 business days (Monday to Friday), so estimated delivery is 13-20 business days total from the date of purchase.', 'dawp'),
            ],
            [
                'question' => __('Which carriers do you use?', 'dawp'),
                'answer'   => __('Orders are shipped with trusted domestic U.S. carriers such as USPS, UPS, FedEx, or DHL. The final carrier is selected when your package is labeled and prepared for dispatch.', 'dawp'),
            ],
            [
                'question' => __('Will I receive tracking information?', 'dawp'),
                'answer'   => __('Yes. Once your order is dispatched, an automated shipping confirmation email with a direct tracking link and courier details is sent to the email address used at checkout.', 'dawp'),
            ],
            [
                'question' => __('Why did my items ship separately?', 'dawp'),
                'answer'   => __('Multi-item orders may ship in separate packages if products are prepared from different fulfillment batches or require different packing methods. You will receive tracking details for each package when available.', 'dawp'),
            ],
            [
                'question' => __('Can I change my shipping address after placing an order?', 'dawp'),
                'answer'   => __('Contact support as soon as possible with your order number and the correct address. Address changes cannot be guaranteed once an order has entered processing, been labeled, or shipped.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Returns & Refunds', 'dawp'),
        'items' => [
            [
                'question' => __('What is the return window?', 'dawp'),
                'answer'   => __('You must initiate your return request within 30 days of delivery. Returns are accepted for eligible defective and non-defective products in new condition.', 'dawp'),
            ],
            [
                'question' => __('Which products are eligible for return?', 'dawp'),
                'answer'   => __('Eligible items must be unused, undamaged, and in their original, unaltered condition (New only) with all original packaging, manuals, labels, parts, accessories, boxes, and included components.', 'dawp'),
            ],
            [
                'question' => __('How do I start a return?', 'dawp'),
                'answer'   => __('Email support or use the Contact Us page within 30 days of delivery. Include your order number, checkout email, item(s) you want to return, the return reason, and photos or videos if the item arrived damaged or incorrect.', 'dawp'),
            ],
            [
                'question' => __('Who pays return shipping?', 'dawp'),
                'answer'   => __('Celvia covers return shipping for all eligible returns, including change of mind, within 30 days of delivery. We email you a prepaid shipping label at no cost to you.', 'dawp'),
            ],
            [
                'question' => __('Do you charge restocking fees?', 'dawp'),
                'answer'   => __('No. Celvia does not charge restocking fees ($0.00) for eligible returns.', 'dawp'),
            ],
            [
                'question' => __('Do you offer exchanges?', 'dawp'),
                'answer'   => __('We do not process direct one-for-one product exchanges. To get a different size, color, or model, return the original eligible item for a refund and place a new order on the website.', 'dawp'),
            ],
            [
                'question' => __('When will I receive my refund?', 'dawp'),
                'answer'   => __('Once your return package is received, we inspect it within 1-2 business days. Approved refunds are processed automatically to the original payment method within 7 business days. If you have not received your refund after 15 business days of approval, contact support after checking with your bank or credit card company.', 'dawp'),
            ],
            [
                'question' => __('Which items are non-returnable?', 'dawp'),
                'answer'   => __('Items marked as Final Sale or Non-Returnable, gift cards or digital products/downloads, personalized or custom-made items, hygiene-sensitive sealed or consumable items with broken seals, and items used, installed, altered, or damaged after delivery are not eligible for return.', 'dawp'),
            ],
            [
                'question' => __('What should I do if my package is damaged or lost?', 'dawp'),
                'answer'   => __('For damaged orders, contact us within 30 days of delivery with photos of the item, shipping packaging, and shipping label. For missing packages, stalled tracking, or packages marked delivered but not received, contact us within 30 days of the recorded delivery date so we can investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Products & Store', 'dawp'),
        'items' => [
            [
                'question' => __('What does Celvia sell?', 'dawp'),
                'answer'   => __('Celvia focuses on luxury watches, fine timepieces, limited editions, mechanical references and premium accessories.', 'dawp'),
            ],
            [
                'question' => __('Do product photos and colors always look exactly the same in person?', 'dawp'),
                'answer'   => __('We work to present descriptions, images, prices, materials, dimensions, and availability as accurately as reasonably possible. Small differences in color, texture, or appearance may occur because of screen settings, digital photography lighting, or supplier updates.', 'dawp'),
            ],
            [
                'question' => __('Do you sell counterfeit or replica products?', 'dawp'),
                'answer'   => __('No. Celvia does not sell counterfeit goods, replica logos, unauthorized branded items, dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
            ],
            [
                'question' => __('Do your products make medical, safety, or treatment claims?', 'dawp'),
                'answer'   => __('No. Our catalog is focused on luxury watches, fine timepieces and premium accessories. We do not sell dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
            ],
            [
                'question' => __('Where can I find product details?', 'dawp'),
                'answer'   => __('Product pages include available details such as item use, materials, dimensions, capacity, care notes, price, and availability. Please review the product page before ordering and contact support if you need clarification.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Payment, Privacy & Support', 'dawp'),
        'items' => [
            [
                'question' => __('Is checkout secure?', 'dawp'),
                'answer'   => __('Yes. Checkout transactions are executed over an encrypted SSL connection and payment processing is handled by certified third-party payment gateways that follow PCI-DSS standards.', 'dawp'),
            ],
            [
                'question' => __('Does Celvia store my full credit card number?', 'dawp'),
                'answer'   => __('No. Celvia does not store, view, or retain raw credit card numbers or sensitive payment credentials on our corporate servers.', 'dawp'),
            ],
            [
                'question' => __('How is my information used?', 'dawp'),
                'answer'   => __('Customer information is used to process, bill, manage, and ship orders; send tracking and invoices; provide support; handle returns; improve site performance; prevent fraud; and meet legal or accounting obligations.', 'dawp'),
            ],
            [
                'question' => __('Can I request access, correction, or deletion of my personal data?', 'dawp'),
                'answer'   => __('Depending on your location and applicable U.S. state privacy laws, you may request access to, correction of, or deletion of personal data we maintain. Submit privacy requests through support.', 'dawp'),
            ],
            [
                'question' => __('How do I contact Celvia?', 'dawp'),
                'answer'   => sprintf(
                    /* translators: 1: email address, 2: business hours, 3: store address */
                    __('Email %1$s or use the Contact Us page. Customer service hours are %2$s. Our business address is %3$s.', 'dawp'),
                    $support_email,
                    $business_hours,
                    $store_address
                ),
            ],
        ],
    ],
];

$quick_links = [
    [
        'title' => __('Track Order', 'dawp'),
        'copy'  => __('Check shipment status after your tracking email arrives.', 'dawp'),
        'url'   => $track_url,
    ],
    [
        'title' => __('Shipping Policy', 'dawp'),
        'copy'  => __('Review U.S. shipping scope, free standard shipping, handling, transit, carriers, and tracking.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('Return & Refund Policy', 'dawp'),
        'copy'  => __('Review eligibility, return shipping fees, RMA steps, refund timing, and non-returnable items.', 'dawp'),
        'url'   => $returns_url,
    ],
    [
        'title' => __('Privacy Policy', 'dawp'),
        'copy'  => __('Learn how customer information, cookies, payment security, retention, and privacy requests are handled.', 'dawp'),
        'url'   => $privacy_url,
    ],
    [
        'title' => __('Terms & Conditions', 'dawp'),
        'copy'  => __('Read the store terms covering website use, orders, payments, policies, and limitations.', 'dawp'),
        'url'   => $terms_url,
    ],
];
?>

<style>
    .mf { background:var(--color-background); color:var(--color-foreground); }
    .mf-title { margin:0; color:inherit; font-family:var(--font-heading); font-weight:400; line-height:1.04; letter-spacing:-.005em; }
    .mf-title em { color:var(--color-accent); font-style:italic; }
    .mf-copy { max-width:600px; margin:20px 0 0; color:var(--color-foreground-muted); font-size:16px; line-height:1.8; }

    /* Hero */
    .mf-hero { padding:88px 0 56px; border-bottom:1px solid var(--color-border); background:var(--color-surface); text-align:center; }
    .mf-hero h1 { max-width:820px; margin-inline:auto; font-size:clamp(44px,6.4vw,84px); }
    .mf-hero .mf-copy { margin-inline:auto; }
    .mf-updated { margin:22px 0 0; color:var(--color-muted); font-size:10.5px; font-weight:600; letter-spacing:.2em; text-transform:uppercase; }
    .mf-updated strong { color:var(--color-ink); font-weight:700; }
    .mf-jump { display:flex; flex-wrap:wrap; justify-content:center; gap:8px; margin-top:34px; }
    .mf-jump a { display:inline-flex; align-items:center; min-height:44px; padding:0 18px; border:1px solid var(--color-border); border-radius:var(--radius-pill); background:var(--color-surface-alt); color:var(--color-ink); font-size:11px; font-weight:700; letter-spacing:.14em; text-decoration:none; text-transform:uppercase; transition:background var(--duration-fast) var(--ease-fluid), color var(--duration-fast) var(--ease-fluid), border-color var(--duration-fast) var(--ease-fluid); }
    .mf-jump a:hover { border-color:var(--color-ink); background:var(--color-ink); color:var(--color-surface-alt); }

    /* Highlights */
    .mf-highlights { display:grid; border-bottom:1px solid var(--color-border); }
    .mf-highlight { padding:26px 0; border-bottom:1px solid var(--color-border); }
    .mf-highlight:last-child { border-bottom:0; }
    .mf-highlight strong { display:block; color:var(--color-ink); font-family:var(--font-heading); font-size:24px; font-weight:400; line-height:1.2; }
    .mf-highlight strong::before { content:"\2014"; margin-right:10px; color:var(--color-accent); }
    .mf-highlight p { margin:6px 0 0; color:var(--color-foreground-muted); font-size:14px; line-height:1.7; }

    /* Layout */
    .mf-body { padding:72px 0; }
    .mf-layout { display:grid; gap:64px; }
    .mf-group { scroll-margin-top:130px; }
    .mf-group + .mf-group { margin-top:64px; }
    .mf-group__head { display:flex; align-items:baseline; gap:18px; padding-bottom:18px; border-bottom:1px solid var(--color-ink); }
    .mf-group__head span { color:var(--color-accent); font-size:11px; font-weight:600; letter-spacing:.14em; }
    .mf-group__head h2 { font-size:clamp(30px,3.4vw,44px); }
    .mf-item { border-bottom:1px solid var(--color-border); }
    .mf-item summary { display:flex; justify-content:space-between; align-items:center; gap:24px; min-height:44px; padding:22px 0; color:var(--color-ink); font-family:var(--font-heading); font-size:22px; line-height:1.3; cursor:pointer; list-style:none; transition:color var(--duration-fast) var(--ease-fluid); }
    .mf-item summary::-webkit-details-marker { display:none; }
    .mf-item summary:hover { color:var(--color-accent); }
    .mf-item summary:focus-visible { outline:1px solid var(--color-accent); outline-offset:4px; }
    .mf-item p { max-width:720px; margin:0; padding:0 40px 26px 0; color:var(--color-foreground-muted); font-size:15px; line-height:1.8; }
    .mf-plus { position:relative; flex:none; width:14px; height:14px; color:var(--color-accent); transition:transform var(--duration-normal) var(--ease-fluid); }
    .mf-plus::before, .mf-plus::after { content:""; position:absolute; top:50%; left:0; width:100%; height:1px; background:currentColor; }
    .mf-plus::after { transform:rotate(90deg); }
    .mf-item[open] .mf-plus { transform:rotate(45deg); }

    /* Aside */
    .mf-aside h2 { font-size:clamp(30px,3vw,40px); }
    .mf-aside .mf-copy { font-size:15px; }
    .mf-links { margin-top:28px; border-top:1px solid var(--color-border); }
    .mf-links a { display:grid; grid-template-columns:1fr auto; gap:16px; align-items:center; padding:20px 0; border-bottom:1px solid var(--color-border); color:inherit; text-decoration:none; transition:padding var(--duration-normal) var(--ease-fluid), background var(--duration-normal) var(--ease-fluid); }
    .mf-links strong { display:block; color:var(--color-ink); font-family:var(--font-heading); font-size:22px; font-weight:400; line-height:1.2; }
    .mf-links small { display:block; margin-top:4px; color:var(--color-foreground-muted); font-size:13px; line-height:1.6; }
    .mf-links svg { width:18px; height:18px; color:var(--color-accent); fill:none; stroke:currentColor; stroke-width:1.5; }
    .mf-links a:hover { padding-inline:12px; background:var(--color-surface-alt); }

    /* Still need help */
    .mf-help { padding:80px 0; background:var(--color-ink); color:var(--color-surface); }
    .mf-help__grid { display:grid; gap:40px; }
    .mf-help h2 { font-size:clamp(36px,4.4vw,58px); }
    .mf-help .mf-copy { color:rgba(243,238,229,.7); }
    .mf-help dl { display:grid; margin:0; border-top:1px solid var(--color-line-dark); }
    .mf-help dl div { padding:18px 0; border-bottom:1px solid var(--color-line-dark); }
    .mf-help dt { color:var(--color-accent-light); font-size:10.5px; font-weight:600; letter-spacing:.2em; text-transform:uppercase; }
    .mf-help dd { margin:6px 0 0; font-size:15px; line-height:1.6; }
    .mf-help a:not(.mx-btn) { color:inherit; text-decoration:underline; text-decoration-color:var(--color-accent-light); text-underline-offset:4px; overflow-wrap:anywhere; transition:color var(--duration-fast) var(--ease-fluid); }
    .mf-help a:not(.mx-btn):hover { color:var(--color-accent-light); }
    .mf-help__ctas { display:flex; flex-wrap:wrap; gap:12px; margin-top:32px; }

    @media (max-width: 767px) {
        .mf-jump { flex-wrap:nowrap; justify-content:flex-start; margin-inline:-16px; padding-inline:16px; overflow-x:auto; scrollbar-width:none; }
        .mf-jump::-webkit-scrollbar { display:none; }
        .mf-jump a { flex:none; }
        .mf-item summary { font-size:20px; }
        .mf-item p { padding-right:0; }
        .mf-help__ctas .mx-btn { flex:1 1 100%; }
    }
    @media (min-width: 768px) {
        .mf-hero { padding:120px 0 72px; }
        .mf-highlights { grid-template-columns:repeat(3,minmax(0,1fr)); gap:40px; }
        .mf-highlight { padding:32px 0; border-bottom:0; }
        .mf-body, .mf-help { padding:112px 0; }
    }
    @media (min-width: 1024px) {
        .mf-layout { grid-template-columns:minmax(0,1.4fr) minmax(300px,.6fr); gap:88px; align-items:start; }
        .mf-aside { position:sticky; top:120px; }
        .mf-help__grid { grid-template-columns:1fr 1fr; gap:88px; align-items:start; }
    }
    @media (prefers-reduced-motion: reduce) {
        .mf * { transition:none !important; }
    }
</style>

<div class="mf">
    <section class="mf-hero" aria-labelledby="faq-title">
        <div class="mx-wrap">
            <p class="mx-eyebrow"><?php esc_html_e('FAQs', 'dawp'); ?></p>
            <h1 id="faq-title" class="mf-title"><?php echo wp_kses(__('Quick answers for shopping with <em>Celvia</em>.', 'dawp'), ['em' => []]); ?></h1>
            <p class="mf-copy">
                <?php
                echo esc_html(
                    sprintf(
                        /* translators: 1: store name, 2: site domain */
                        __('Find policy-aligned answers about orders, shipping, returns, refunds, products, privacy, and support when shopping with %1$s through %2$s.', 'dawp'),
                        $store_name,
                        $site_domain
                    )
                );
                ?>
            </p>
            <p class="mf-updated"><?php esc_html_e('Last Updated', 'dawp'); ?> &middot; <strong><?php echo esc_html($last_updated); ?></strong></p>
            <nav class="mf-jump" aria-label="<?php esc_attr_e('FAQ topics', 'dawp'); ?>">
                <?php foreach ($faq_groups as $group) : ?>
                    <a href="#<?php echo esc_attr(sanitize_title($group['label'])); ?>"><?php echo esc_html($group['label']); ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
    </section>

    <div class="mx-wrap">
        <div class="mf-highlights">
            <?php foreach ($policy_highlights as $highlight) : ?>
                <div class="mf-highlight">
                    <strong><?php echo esc_html($highlight['title']); ?></strong>
                    <p><?php echo esc_html($highlight['copy']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <section class="mf-body" aria-label="<?php esc_attr_e('Frequently asked questions', 'dawp'); ?>">
        <div class="mx-wrap mf-layout">
            <div>
                <?php foreach ($faq_groups as $index => $group) : ?>
                    <?php $group_id = sanitize_title($group['label']); ?>
                    <section class="mf-group" id="<?php echo esc_attr($group_id); ?>" aria-labelledby="<?php echo esc_attr($group_id); ?>-title">
                        <div class="mf-group__head">
                            <span><?php echo esc_html(sprintf('%02d', $index + 1)); ?></span>
                            <h2 id="<?php echo esc_attr($group_id); ?>-title" class="mf-title"><?php echo esc_html($group['label']); ?></h2>
                        </div>
                        <?php foreach ($group['items'] as $item) : ?>
                            <details class="mf-item">
                                <summary><?php echo esc_html($item['question']); ?><span class="mf-plus" aria-hidden="true"></span></summary>
                                <p><?php echo esc_html($item['answer']); ?></p>
                            </details>
                        <?php endforeach; ?>
                    </section>
                <?php endforeach; ?>
            </div>

            <aside class="mf-aside" aria-labelledby="faq-links-title">
                <p class="mx-eyebrow"><?php esc_html_e('Store Policies', 'dawp'); ?></p>
                <h2 id="faq-links-title" class="mf-title"><?php esc_html_e('Helpful links', 'dawp'); ?></h2>
                <p class="mf-copy"><?php esc_html_e('This FAQ summarizes the current store policies. Review the full policy pages for complete details before placing an order, requesting a return, or submitting a privacy request.', 'dawp'); ?></p>
                <div class="mf-links">
                    <?php foreach ($quick_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>">
                            <span>
                                <strong><?php echo esc_html($link['title']); ?></strong>
                                <small><?php echo esc_html($link['copy']); ?></small>
                            </span>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
                        </a>
                    <?php endforeach; ?>
                </div>
            </aside>
        </div>
    </section>

    <section class="mf-help" aria-labelledby="faq-help-title">
        <div class="mx-wrap mf-help__grid">
            <div>
                <p class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                <h2 id="faq-help-title" class="mf-title"><?php echo wp_kses(__('Still need <em>help</em>?', 'dawp'), ['em' => []]); ?></h2>
                <p class="mf-copy">
                    <?php
                    echo esc_html(
                        sprintf(
                            /* translators: 1: email address, 2: business hours */
                            __('Email %1$s or use the Contact Us page with your order number, checkout email, and a short description of the issue. Customer service hours are %2$s.', 'dawp'),
                            $support_email,
                            $business_hours
                        )
                    );
                    ?>
                </p>
                <div class="mf-help__ctas">
                    <a class="mx-btn mx-btn--light" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    <a class="mx-btn mx-btn--ghost-light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                </div>
            </div>
            <dl>
                <div>
                    <dt><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt>
                    <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                </div>
                <div>
                    <dt><?php esc_html_e('Business Address', 'dawp'); ?></dt>
                    <dd><?php echo esc_html($store_address); ?></dd>
                </div>
            </dl>
        </div>
    </section>
</div>
