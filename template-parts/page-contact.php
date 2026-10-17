<?php
/**
 * Contact page — Maison editorial layout.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Celvia';
$support_email  = 'support@celviaus.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$store_address  = 'Loom Agency LLC, 198 Bear Branch Rd, Reevesville, SC 29471, US';
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$track_url      = home_url('/track-order/');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/return-refund-policy/');
$faq_url        = home_url('/faq/');
$status         = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$img       = static fn($file) => get_template_directory_uri() . '/assets/img/' . $file;
$image_tag = static function ($src, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $w = 0, $h = 0) {
    $dims = $w && $h ? ' width="' . (int) $w . '" height="' . (int) $h . '"' : '';
    return '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="' . esc_attr($loading) . '" decoding="async" sizes="' . esc_attr($sizes) . '"' . $dims . '>';
};

$contact_methods = [
    [
        'title' => __('Customer Support Email', 'dawp'),
        'copy'  => __('For order questions, product details, returns, delivery updates and general assistance.', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
        'icon'  => '<path d="M4 6h16v12H4z"></path><path d="m4 8 8 5 8-5"></path>',
    ],
    [
        'title' => __('Order Tracking', 'dawp'),
        'copy'  => __('Follow your shipment once your tracking details have been sent after dispatch.', 'dawp'),
        'value' => __('Track an order', 'dawp'),
        'url'   => $track_url,
        'icon'  => '<path d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11z"></path><circle cx="12" cy="10" r="2"></circle>',
    ],
    [
        'title' => __('Returns & Refunds', 'dawp'),
        'copy'  => __('Start with the policy details, then contact support with your order number if you need help.', 'dawp'),
        'value' => __('Review returns', 'dawp'),
        'url'   => $returns_url,
        'icon'  => '<path d="M3 7v6h6"></path><path d="M21 17a9 9 0 0 0-15-6.7L3 13"></path>',
    ],
];

$support_steps = [
    [
        'title' => __('Share the right details', 'dawp'),
        'copy'  => __('Include your order number, checkout email, product name and a clear description so our team can review your request quickly.', 'dawp'),
    ],
    [
        'title' => __('We review your request', 'dawp'),
        'copy'  => __('Most messages are reviewed within 1 business day during our customer service hours, excluding weekends and holidays.', 'dawp'),
    ],
    [
        'title' => __('Receive helpful next steps', 'dawp'),
        'copy'  => __('We will guide you through tracking, product questions, shipping concerns, return eligibility or refund timing.', 'dawp'),
    ],
];

$quick_help = [
    [
        'title' => __('Shipping Timeline', 'dawp'),
        'copy'  => __('Orders are handled in 3-5 business days and usually arrive in 13-20 business days.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unused items may be returned within 30 days after delivery.', 'dawp'),
        'url'   => $returns_url,
    ],
    [
        'title' => __('Frequently Asked Questions', 'dawp'),
        'copy'  => __('Find fast answers about orders, shipping, returns, products and secure checkout.', 'dawp'),
        'url'   => $faq_url,
    ],
];

$contact_faqs = [
    [
        'question' => __('How quickly will support reply?', 'dawp'),
        'answer'   => __('We aim to reply within 1 business day during customer service hours. Response times may vary on weekends, holidays or high-volume periods.', 'dawp'),
    ],
    [
        'question' => __('What should I include for an order issue?', 'dawp'),
        'answer'   => __('Please include your order number, the email used at checkout, the item involved and photos if your package arrived damaged or incorrect.', 'dawp'),
    ],
    [
        'question' => __('Can I change an order after checkout?', 'dawp'),
        'answer'   => __('Contact us as soon as possible. Changes cannot be guaranteed once an order has entered processing, been labeled or shipped.', 'dawp'),
    ],
];
?>

<style>
    .mc { background:var(--color-background); color:var(--color-foreground); }
    .mc img { display:block; width:100%; height:100%; object-fit:cover; }
    .mc-title { margin:0; color:inherit; font-family:var(--font-heading); font-weight:400; line-height:1.04; letter-spacing:-.005em; }
    .mc-title em { color:var(--color-accent); font-style:italic; }
    .mc-copy { max-width:560px; margin:20px 0 0; color:var(--color-foreground-muted); font-size:16px; line-height:1.8; }
    .mc-section { padding:72px 0; }
    .mc-section--surface { background:var(--color-surface); }
    .mc-head { margin-bottom:40px; }
    .mc-head h2 { font-size:clamp(34px,4vw,52px); }

    /* Hero */
    .mc-hero { position:relative; isolation:isolate; display:flex; align-items:flex-end; min-height:min(72vh,680px); overflow:hidden; background:var(--color-ink); color:var(--color-surface); }
    .mc-hero__media { position:absolute; inset:0; z-index:-2; }
    .mc-hero__media img { object-position:65% 50%; }
    .mc-hero::after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(90deg, rgba(19,17,14,.92) 0%, rgba(19,17,14,.6) 50%, rgba(19,17,14,.15) 100%); }
    .mc-hero__content { padding:120px 0 52px; }
    .mc-hero h1 { max-width:720px; font-size:clamp(44px,6.4vw,86px); }
    .mc-hero .mc-copy { color:rgba(243,238,229,.76); }
    .mc-hero__ctas { display:flex; flex-wrap:wrap; gap:12px; margin-top:32px; }
    .mc-hero__foot { display:flex; flex-wrap:wrap; gap:10px 28px; margin-top:48px; padding-top:22px; border-top:1px solid var(--color-line-dark); color:rgba(243,238,229,.6); font-size:10.5px; font-weight:600; letter-spacing:.2em; text-transform:uppercase; }
    .mc-hero__foot span::before { content:"\2014"; margin-right:10px; color:var(--color-accent-light); }

    /* Contact methods */
    .mc-methods { display:grid; border-top:1px solid var(--color-border); }
    .mc-method { display:grid; grid-template-columns:44px 1fr; gap:16px; padding:28px 0; border-bottom:1px solid var(--color-border); color:inherit; text-decoration:none; transition:background var(--duration-normal) var(--ease-fluid); }
    .mc-method svg { width:26px; height:26px; color:var(--color-accent); fill:none; stroke:currentColor; stroke-width:1.4; stroke-linecap:round; stroke-linejoin:round; }
    .mc-method h3 { margin:0; color:var(--color-ink); font-family:var(--font-heading); font-size:28px; font-weight:400; line-height:1.15; }
    .mc-method p { margin:8px 0 0; color:var(--color-foreground-muted); font-size:14px; line-height:1.7; }
    .mc-method__value { display:inline-block; margin-top:16px; padding-bottom:4px; border-bottom:1px solid currentColor; color:var(--color-ink); font-size:11px; font-weight:700; letter-spacing:.18em; text-transform:uppercase; overflow-wrap:anywhere; transition:color var(--duration-fast) var(--ease-fluid); }
    .mc-method:hover .mc-method__value { color:var(--color-accent); }

    /* Form + details */
    .mc-main { display:grid; gap:48px; align-items:start; }
    .mc-main h2 { font-size:clamp(32px,3.6vw,46px); }
    .mc-form { display:grid; gap:20px; margin-top:32px; }
    .mc-form__row { display:grid; gap:20px; }
    .mc-field { display:grid; gap:8px; }
    .mc-field label { color:var(--color-ink); font-size:10.5px; font-weight:700; letter-spacing:.2em; text-transform:uppercase; }
    .mc-field input, .mc-field select, .mc-field textarea { width:100%; min-height:52px; padding:0 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); background:var(--color-surface-alt); color:var(--color-ink); font:inherit; font-size:15px; transition:border-color var(--duration-fast) var(--ease-fluid), box-shadow var(--duration-fast) var(--ease-fluid); }
    .mc-field textarea { min-height:160px; padding:14px 16px; resize:vertical; }
    .mc-field input::placeholder { color:var(--color-muted); }
    .mc-field input:focus, .mc-field select:focus, .mc-field textarea:focus { border-color:var(--color-accent); box-shadow:0 0 0 3px rgba(164,131,79,.16); outline:0; }
    .mc-honeypot { position:absolute; width:1px; height:1px; margin:-1px; overflow:hidden; clip:rect(0 0 0 0); clip-path:inset(50%); white-space:nowrap; }
    .mc-notice { padding:14px 16px; border:1px solid currentColor; border-radius:var(--radius-sm); background:var(--color-surface-alt); font-size:14px; font-weight:600; line-height:1.55; }
    .mc-notice--success { color:var(--color-success); }
    .mc-notice--error { color:var(--color-alert); }
    .mc-form__note { margin:0; color:var(--color-muted); font-size:13px; line-height:1.6; }
    .mc-form .mx-btn { justify-self:start; }
    .mc-details { padding:36px 28px; background:var(--color-ink); color:var(--color-surface); }
    .mc-details .mc-copy { margin-top:14px; color:rgba(243,238,229,.7); font-size:15px; }
    .mc-details dl { display:grid; margin:28px 0 0; border-top:1px solid var(--color-line-dark); }
    .mc-details dl div { padding:16px 0; border-bottom:1px solid var(--color-line-dark); }
    .mc-details dt { color:var(--color-accent-light); font-size:10.5px; font-weight:600; letter-spacing:.2em; text-transform:uppercase; }
    .mc-details dd { margin:6px 0 0; color:var(--color-surface); font-size:15px; line-height:1.6; }
    .mc-details a { color:inherit; text-decoration:underline; text-decoration-color:var(--color-accent-light); text-underline-offset:4px; overflow-wrap:anywhere; transition:color var(--duration-fast) var(--ease-fluid); }
    .mc-details a:hover { color:var(--color-accent-light); }

    /* Steps */
    .mc-steps { background:var(--color-ink); color:var(--color-surface); }
    .mc-steps__grid { display:grid; gap:36px; }
    .mc-steps h2 { font-size:clamp(34px,4vw,52px); }
    .mc-steps .mc-copy { color:rgba(243,238,229,.7); }
    .mc-steps__list { display:grid; border-top:1px solid var(--color-line-dark); }
    .mc-step { display:grid; grid-template-columns:44px 1fr; gap:14px; padding:22px 0; border-bottom:1px solid var(--color-line-dark); }
    .mc-step span { color:var(--color-accent-light); font-size:11px; font-weight:600; letter-spacing:.14em; line-height:2.4; }
    .mc-step h3 { margin:0; font-family:var(--font-heading); font-size:26px; font-weight:400; line-height:1.2; }
    .mc-step p { margin:6px 0 0; color:rgba(243,238,229,.62); font-size:14px; line-height:1.7; }

    /* Quick help + FAQ */
    .mc-assist { display:grid; gap:56px; }
    .mc-assist h2 { font-size:clamp(30px,3.2vw,42px); }
    .mc-index { margin-top:28px; border-top:1px solid var(--color-border); }
    .mc-index a { display:grid; grid-template-columns:1fr auto; gap:16px; align-items:center; padding:22px 0; border-bottom:1px solid var(--color-border); color:inherit; text-decoration:none; transition:padding var(--duration-normal) var(--ease-fluid), background var(--duration-normal) var(--ease-fluid); }
    .mc-index strong { display:block; color:var(--color-ink); font-family:var(--font-heading); font-size:24px; font-weight:400; line-height:1.2; }
    .mc-index small { display:block; margin-top:4px; color:var(--color-foreground-muted); font-size:14px; line-height:1.6; }
    .mc-index svg { width:18px; height:18px; color:var(--color-accent); fill:none; stroke:currentColor; stroke-width:1.5; }
    .mc-index a:hover { padding-inline:12px; background:var(--color-surface-alt); }
    .mc-faq { margin-top:28px; border-top:1px solid var(--color-border); }
    .mc-faq details { border-bottom:1px solid var(--color-border); }
    .mc-faq summary { display:flex; justify-content:space-between; align-items:center; gap:20px; min-height:44px; padding:22px 0; color:var(--color-ink); font-family:var(--font-heading); font-size:22px; line-height:1.25; cursor:pointer; list-style:none; }
    .mc-faq summary::-webkit-details-marker { display:none; }
    .mc-faq summary:focus-visible { outline:1px solid var(--color-accent); outline-offset:4px; }
    .mc-faq p { margin:0; padding:0 40px 24px 0; color:var(--color-foreground-muted); font-size:15px; line-height:1.75; }
    .mc-plus { position:relative; flex:none; width:14px; height:14px; color:var(--color-accent); transition:transform var(--duration-normal) var(--ease-fluid); }
    .mc-plus::before, .mc-plus::after { content:""; position:absolute; top:50%; left:0; width:100%; height:1px; background:currentColor; }
    .mc-plus::after { transform:rotate(90deg); }
    .mc-faq details[open] .mc-plus { transform:rotate(45deg); }

    /* CTA */
    .mc-cta { padding:88px 0; background:var(--color-surface); text-align:center; }
    .mc-cta h2 { max-width:760px; margin-inline:auto; font-size:clamp(36px,4.4vw,58px); }
    .mc-cta .mc-copy { margin-inline:auto; }
    .mc-cta__ctas { display:flex; flex-wrap:wrap; justify-content:center; gap:12px; margin-top:32px; }

    @media (max-width: 767px) {
        .mc-hero { min-height:auto; }
        .mc-hero__media { bottom:auto; height:62vw; min-height:260px; }
        .mc-hero::after { background:linear-gradient(180deg, rgba(19,17,14,0) 0%, rgba(19,17,14,.2) 30%, var(--color-ink) min(62vw,420px)); }
        .mc-hero__content { padding:calc(max(62vw,260px) - 70px) 0 44px; }
        .mc-hero__ctas .mx-btn, .mc-cta__ctas .mx-btn, .mc-form .mx-btn { flex:1 1 100%; justify-self:stretch; }
    }
    @media (min-width: 768px) {
        .mc-section { padding:104px 0; }
        .mc-methods { grid-template-columns:repeat(3,minmax(0,1fr)); gap:0 40px; border-top:0; }
        .mc-method { grid-template-columns:1fr; gap:22px; padding:32px 0 36px; border-top:1px solid var(--color-ink); border-bottom:0; }
        .mc-form__row { grid-template-columns:repeat(2,minmax(0,1fr)); }
        .mc-details { padding:44px 40px; }
        .mc-cta { padding:120px 0; }
    }
    @media (min-width: 1024px) {
        .mc-hero__content { padding:140px 0 68px; }
        .mc-main { grid-template-columns:minmax(0,1.25fr) minmax(340px,.75fr); gap:80px; }
        .mc-details { position:sticky; top:120px; }
        .mc-steps__grid { grid-template-columns:.85fr 1.15fr; gap:88px; align-items:start; }
        .mc-assist { grid-template-columns:1fr 1fr; gap:88px; }
    }
    @media (prefers-reduced-motion: reduce) {
        .mc * { transition:none !important; }
    }
</style>

<div class="mc">
    <section class="mc-hero" aria-labelledby="mc-title">
        <div class="mc-hero__media">
            <?php echo $image_tag($img('maison/concierge-wrist.jpg'), __('Sport chronograph worn with a tailored suit', 'dawp'), '', 'eager', '100vw', 1672, 941); ?>
        </div>
        <div class="mx-wrap mc-hero__content">
            <p class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('Contact Celvia', 'dawp'); ?></p>
            <h1 id="mc-title" class="mc-title"><?php echo wp_kses(__('Concierge support for <em>confident</em> watch ownership.', 'dawp'), ['em' => []]); ?></h1>
            <p class="mc-copy"><?php esc_html_e('Questions about a reference, sizing, delivery, quality or a return? Our customer care team is here to help from discovery to ownership.', 'dawp'); ?></p>
            <div class="mc-hero__ctas">
                <a class="mx-btn mx-btn--light" href="#mc-form-title"><?php esc_html_e('Send a Message', 'dawp'); ?></a>
                <a class="mx-btn mx-btn--ghost-light" href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
            </div>
            <div class="mc-hero__foot">
                <span><?php esc_html_e('Reply within 1 business day', 'dawp'); ?></span>
                <span><?php esc_html_e('Mon - Fri, 9 AM - 5 PM PT', 'dawp'); ?></span>
                <span><?php esc_html_e('U.S. customer care', 'dawp'); ?></span>
            </div>
        </div>
    </section>

    <section class="mc-section" aria-labelledby="mc-methods-title">
        <div class="mx-wrap">
            <div class="mc-head">
                <p class="mx-eyebrow"><?php esc_html_e('How To Reach Us', 'dawp'); ?></p>
                <h2 id="mc-methods-title" class="mc-title"><?php esc_html_e('Choose the path that fits your question.', 'dawp'); ?></h2>
                <p class="mc-copy"><?php esc_html_e('Whether you need order guidance, tracking details or return information, these links keep the next step clear.', 'dawp'); ?></p>
            </div>
            <div class="mc-methods">
                <?php foreach ($contact_methods as $method) : ?>
                    <a class="mc-method" href="<?php echo esc_url($method['url']); ?>">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><?php echo $method['icon']; ?></svg>
                        <div>
                            <h3><?php echo esc_html($method['title']); ?></h3>
                            <p><?php echo esc_html($method['copy']); ?></p>
                            <span class="mc-method__value"><?php echo esc_html($method['value']); ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mc-section mc-section--surface" aria-labelledby="mc-form-title">
        <div class="mx-wrap mc-main">
            <div>
                <p class="mx-eyebrow"><?php esc_html_e('Send A Message', 'dawp'); ?></p>
                <h2 id="mc-form-title" class="mc-title"><?php echo wp_kses(__('Tell us how we can <em>help</em>.', 'dawp'), ['em' => []]); ?></h2>
                <p class="mc-copy"><?php esc_html_e('For the fastest help, include your order number and the email used at checkout, plus as much detail as possible.', 'dawp'); ?></p>
                <form class="mc-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <label class="mc-honeypot" for="mc-company"><?php esc_html_e('Company website', 'dawp'); ?></label>
                    <input class="mc-honeypot" id="mc-company" type="text" name="company_website" tabindex="-1" autocomplete="off">
                    <?php if ($status === 'success') : ?>
                        <div class="mc-notice mc-notice--success" role="status"><?php esc_html_e('Thank you. Your message has been received and our support team will reply as soon as possible.', 'dawp'); ?></div>
                    <?php elseif ($status === 'error') : ?>
                        <div class="mc-notice mc-notice--error" role="alert"><?php esc_html_e('Please check the required fields and try again.', 'dawp'); ?></div>
                    <?php endif; ?>
                    <div class="mc-form__row">
                        <div class="mc-field">
                            <label for="mc-name"><?php esc_html_e('Full Name', 'dawp'); ?></label>
                            <input id="mc-name" name="contact_name" type="text" autocomplete="name" required>
                        </div>
                        <div class="mc-field">
                            <label for="mc-email"><?php esc_html_e('Email Address', 'dawp'); ?></label>
                            <input id="mc-email" name="contact_email" type="email" autocomplete="email" required>
                        </div>
                    </div>
                    <div class="mc-form__row">
                        <div class="mc-field">
                            <label for="mc-order"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                            <input id="mc-order" name="order_number" type="text" autocomplete="off" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                        <div class="mc-field">
                            <label for="mc-topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="mc-topic" name="contact_topic" required>
                                <option value=""><?php esc_html_e('Select a topic', 'dawp'); ?></option>
                                <option value="order"><?php esc_html_e('Order or tracking question', 'dawp'); ?></option>
                                <option value="return"><?php esc_html_e('Return or refund request', 'dawp'); ?></option>
                                <option value="product"><?php esc_html_e('Product question', 'dawp'); ?></option>
                                <option value="privacy"><?php esc_html_e('Privacy request', 'dawp'); ?></option>
                                <option value="other"><?php esc_html_e('General support', 'dawp'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="mc-field">
                        <label for="mc-message"><?php esc_html_e('Message', 'dawp'); ?></label>
                        <textarea id="mc-message" name="contact_message" required></textarea>
                    </div>
                    <p class="mc-form__note"><?php esc_html_e('Please do not include full payment card numbers or sensitive account credentials in your message.', 'dawp'); ?></p>
                    <button class="mx-btn mx-btn--dark" type="submit"><?php esc_html_e('Send Message', 'dawp'); ?></button>
                </form>
            </div>

            <aside class="mc-details" aria-labelledby="mc-details-title">
                <p class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('Customer Care Details', 'dawp'); ?></p>
                <h2 id="mc-details-title" class="mc-title"><?php esc_html_e('Support at a glance.', 'dawp'); ?></h2>
                <p class="mc-copy"><?php esc_html_e('Our team supports shoppers across the United States with clear, policy-aligned guidance.', 'dawp'); ?></p>
                <dl>
                    <div>
                        <dt><?php esc_html_e('Store', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($store_name); ?></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Email', 'dawp'); ?></dt>
                        <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                    </div>
                    <?php if ($store_address) : ?>
                        <div>
                            <dt><?php esc_html_e('Business Address', 'dawp'); ?></dt>
                            <dd><?php echo esc_html($store_address); ?></dd>
                        </div>
                    <?php endif; ?>
                    <div>
                        <dt><?php esc_html_e('Business Hours', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($business_hours); ?></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Response Time', 'dawp'); ?></dt>
                        <dd><?php esc_html_e('We aim to reply within 1 business day.', 'dawp'); ?></dd>
                    </div>
                </dl>
            </aside>
        </div>
    </section>

    <section class="mc-section mc-steps" aria-labelledby="mc-steps-title">
        <div class="mx-wrap mc-steps__grid">
            <div>
                <p class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('What Happens Next', 'dawp'); ?></p>
                <h2 id="mc-steps-title" class="mc-title"><?php esc_html_e('A simple path from question to resolution.', 'dawp'); ?></h2>
            </div>
            <div class="mc-steps__list">
                <?php foreach ($support_steps as $index => $step) : ?>
                    <div class="mc-step">
                        <span><?php echo esc_html(sprintf('%02d', $index + 1)); ?></span>
                        <div>
                            <h3><?php echo esc_html($step['title']); ?></h3>
                            <p><?php echo esc_html($step['copy']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mc-section" aria-label="<?php esc_attr_e('Quick help', 'dawp'); ?>">
        <div class="mx-wrap mc-assist">
            <div>
                <p class="mx-eyebrow"><?php esc_html_e('Quick Help', 'dawp'); ?></p>
                <h2 class="mc-title"><?php esc_html_e('Helpful policy details before you write.', 'dawp'); ?></h2>
                <div class="mc-index">
                    <?php foreach ($quick_help as $item) : ?>
                        <a href="<?php echo esc_url($item['url']); ?>">
                            <span>
                                <strong><?php echo esc_html($item['title']); ?></strong>
                                <small><?php echo esc_html($item['copy']); ?></small>
                            </span>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div>
                <p class="mx-eyebrow"><?php esc_html_e('Contact FAQs', 'dawp'); ?></p>
                <h2 class="mc-title"><?php esc_html_e('A few notes that make support easier.', 'dawp'); ?></h2>
                <div class="mc-faq">
                    <?php foreach ($contact_faqs as $item) : ?>
                        <details>
                            <summary><?php echo esc_html($item['question']); ?><span class="mc-plus" aria-hidden="true"></span></summary>
                            <p><?php echo esc_html($item['answer']); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="mc-cta" aria-labelledby="mc-cta-title">
        <div class="mx-wrap">
            <p class="mx-eyebrow"><?php esc_html_e('Private Guidance', 'dawp'); ?></p>
            <h2 id="mc-cta-title" class="mc-title"><?php echo wp_kses(__('Still browsing? Explore references selected for <em>lasting</em> wear.', 'dawp'), ['em' => []]); ?></h2>
            <p class="mc-copy"><?php esc_html_e('Discover classic, sport, heritage and limited watches selected for proportion, movement quality and quiet presence.', 'dawp'); ?></p>
            <div class="mc-cta__ctas">
                <a class="mx-btn mx-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="mx-btn" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('View FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
