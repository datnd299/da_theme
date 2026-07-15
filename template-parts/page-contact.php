<?php
if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Topgoodmart';
$support_email  = 'support@topgoodmart.com';
$business_hours = 'Monday - Friday, 9:00 AM - 5:00 PM Pacific Time';
$store_address  = function_exists('dawp_get_store_address') && dawp_get_store_address() ? dawp_get_store_address() : '4803 N Milwaukee Ave, Chicago, IL 60630';
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$status         = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$support_cards = [
    [
        'title' => 'Order Support',
        'copy'  => 'Questions about order status, shipping updates, tracking links or address details.',
        'meta'  => 'Include your order number when available.',
    ],
    [
        'title' => 'Returns & Refunds',
        'copy'  => 'Start a return, report a damaged item or ask about refund timing and eligibility.',
        'meta'  => 'Returns are available within 30 days of delivery.',
    ],
    [
        'title' => 'Product Questions',
        'copy'  => 'Need help comparing products, checking details or understanding everyday use cases?',
        'meta'  => 'Send the product name or page link.',
    ],
    [
        'title' => 'Privacy Requests',
        'copy'  => 'Submit access, correction or deletion requests related to your customer information.',
        'meta'  => 'We may ask for details to verify the request.',
    ],
];

$contact_topics = [
    'order'   => 'Order or tracking question',
    'return'  => 'Return or refund request',
    'product' => 'Product question',
    'privacy' => 'Privacy request',
    'other'   => 'General support',
];
?>

<style>
    .tgm-contact-grid{align-items:start;gap:18px;display:grid}.tgm-contact-form,.tgm-contact-panel{background:#fff;border:1px solid #d9dee7;border-radius:8px;box-shadow:0 10px 28px #11182714}.tgm-contact-form{gap:16px;padding:18px;display:grid}.tgm-form-row{gap:7px;display:grid}.tgm-form-row label{color:#111827;font-size:.9rem;font-weight:900}.tgm-form-row label span{color:#6b7280;font-weight:700}.tgm-form-row input,.tgm-form-row select,.tgm-form-row textarea{background:#fff;border:1px solid #cfd7e3;border-radius:8px;width:100%;min-height:46px;padding:10px 12px;color:#111827}.tgm-form-row textarea{min-height:150px;line-height:1.55}.tgm-form-row input:focus,.tgm-form-row select:focus,.tgm-form-row textarea:focus{border-color:#0046be;outline:3px solid #0046be24}.tgm-form-submit{border:0;cursor:pointer;width:100%;padding:0 22px}.tgm-honeypot{clip:rect(0 0 0 0);clip-path:inset(50%);white-space:nowrap;width:1px;height:1px;margin:-1px;position:absolute;overflow:hidden}.tgm-form-notice{border-radius:8px;padding:13px 14px;font-size:.92rem;font-weight:800;line-height:1.45}.tgm-form-notice--success{color:#065f46;background:#dcfce7;border:1px solid #86efac}.tgm-form-notice--error{color:#991b1b;background:#fee2e2;border:1px solid #fecaca}.tgm-contact-panel{padding:20px}.tgm-contact-panel h3{color:#050505;margin:0;font-size:1.35rem;font-weight:900}.tgm-contact-panel dl{gap:16px;margin:18px 0 0;display:grid}.tgm-contact-panel dt{color:#0046be;text-transform:uppercase;font-size:.75rem;font-weight:900;letter-spacing:.08em}.tgm-contact-panel dd{color:#374151;margin:5px 0 0;line-height:1.6}.tgm-contact-panel dd a{color:#0046be;font-weight:900;text-decoration:none}.tgm-contact-panel dd a:hover{text-decoration:underline;text-underline-offset:3px}.tgm-contact-panel__links{border-top:1px solid #e5e7eb;gap:12px;margin-top:20px;padding-top:18px;display:grid}@media (min-width:768px){.tgm-contact-grid{grid-template-columns:minmax(0,1.2fr) minmax(280px,.8fr);gap:22px}.tgm-contact-form{grid-template-columns:repeat(2,minmax(0,1fr));padding:24px}.tgm-form-row--wide,.tgm-form-notice,.tgm-form-submit{grid-column:1/-1}.tgm-form-submit{justify-self:start;width:auto}.tgm-contact-panel{position:sticky;top:96px;padding:24px}}
</style>

<section class="tgm-hero">
    <div class="tgm-container tgm-hero__grid">
        <div class="tgm-hero__content">
            <p class="tgm-eyebrow">Contact <?php echo esc_html($store_name); ?></p>
            <h1>We Are Here To Help</h1>
            <p class="tgm-hero__copy">Send us a message about orders, products, returns or account questions. Our support team will review your request and reply during business hours.</p>
            <div class="tgm-hero__actions">
                <a class="tgm-btn tgm-btn--primary" href="mailto:<?php echo esc_attr($support_email); ?>">Email Support</a>
                <a class="tgm-btn tgm-btn--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a>
            </div>
            <div class="tgm-hero__proof" aria-label="Support details">
                <span>U.S. customer support</span>
                <span>Secure form</span>
                <span>Helpful order guidance</span>
            </div>
        </div>
        <div class="tgm-hero__media">
            <img src="https://images.unsplash.com/photo-1556745757-8d76bdb6984b?auto=format&fit=crop&w=1400&q=86" alt="Customer support desk with laptop and shopping packages" width="700" height="560" loading="eager" decoding="async">
            <div class="tgm-hero__deal">
                <strong>Support Hours</strong>
                <span><?php echo esc_html($business_hours); ?></span>
            </div>
        </div>
    </div>
</section>

<section class="tgm-section">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Support options</p>
                <h2>Choose The Best Way To Reach Us</h2>
                <p>Use the form for detailed requests, or email us directly if you already have the information ready.</p>
            </div>
        </div>
        <div class="tgm-trust-grid contact-support-slider">
            <?php foreach ($support_cards as $card) : ?>
                <article class="tgm-trust contact-support-card">
                    <span>?</span>
                    <h3><?php echo esc_html($card['title']); ?></h3>
                    <p><?php echo esc_html($card['copy']); ?></p>
                    <p><strong><?php echo esc_html($card['meta']); ?></strong></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="tgm-section tgm-section--soft">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Send a message</p>
                <h2>Contact Form</h2>
                <p>Share a few details so our team can route your request correctly.</p>
            </div>
        </div>

        <div class="tgm-contact-grid">
            <form class="tgm-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>
                <input type="hidden" name="action" value="lbq_contact_form">
                <label class="tgm-honeypot" for="company-website">Company website</label>
                <input class="tgm-honeypot" id="company-website" type="text" name="company_website" tabindex="-1" autocomplete="off">

                <?php if ($status === 'success') : ?>
                    <div class="tgm-form-notice tgm-form-notice--success" role="status">Thank you. Your message has been received and our support team will reply as soon as possible.</div>
                <?php elseif ($status === 'error') : ?>
                    <div class="tgm-form-notice tgm-form-notice--error" role="alert">Please check the required fields and try again.</div>
                <?php endif; ?>

                <div class="tgm-form-row">
                    <label for="contact-name">Full name</label>
                    <input id="contact-name" type="text" name="contact_name" autocomplete="name" required>
                </div>
                <div class="tgm-form-row">
                    <label for="contact-email">Email address</label>
                    <input id="contact-email" type="email" name="contact_email" autocomplete="email" required>
                </div>
                <div class="tgm-form-row">
                    <label for="contact-topic">What can we help with?</label>
                    <select id="contact-topic" name="contact_topic" required>
                        <?php foreach ($contact_topics as $value => $label) : ?>
                            <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="tgm-form-row">
                    <label for="order-number">Order number <span>optional</span></label>
                    <input id="order-number" type="text" name="order_number" autocomplete="off">
                </div>
                <div class="tgm-form-row tgm-form-row--wide">
                    <label for="contact-message">Message</label>
                    <textarea id="contact-message" name="contact_message" rows="6" required></textarea>
                </div>
                <button class="tgm-btn tgm-btn--secondary tgm-form-submit" type="submit">Send Message</button>
            </form>

            <aside class="tgm-contact-panel">
                <h3>Customer Support</h3>
                <dl>
                    <div>
                        <dt>Email</dt>
                        <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                    </div>
                    <div>
                        <dt>Hours</dt>
                        <dd><?php echo esc_html($business_hours); ?></dd>
                    </div>
                    <div>
                        <dt>Business Address</dt>
                        <dd><?php echo esc_html($store_address); ?></dd>
                    </div>
                </dl>
                <div class="tgm-contact-panel__links">
                    <a class="tgm-link" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>">Shipping Policy</a>
                    <a class="tgm-link" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>">Return & Refund Policy</a>
                    <a class="tgm-link" href="<?php echo esc_url(home_url('/faq/')); ?>">FAQs</a>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="tgm-newsletter">
    <div class="tgm-container tgm-newsletter__inner">
        <div>
            <p class="tgm-eyebrow">Before you write</p>
            <h2>Looking For Order Updates?</h2>
            <p>Use your tracking details for the fastest shipment update, or browse the shop for current products and deals.</p>
        </div>
        <div class="tgm-newsletter__actions">
            <a class="tgm-btn tgm-btn--primary" href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a>
            <a class="tgm-link" href="<?php echo esc_url($shop_url); ?>">Continue Shopping</a>
        </div>
    </div>
</section>
