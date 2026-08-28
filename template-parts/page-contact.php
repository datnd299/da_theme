<?php
/**
 * Premium contact page template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri      = get_template_directory_uri();
$theme_dir      = get_template_directory();
$store_name     = 'chronelshop.com';
$support_email  = 'support@chronelshop.com';
$support_phone  = '757-804-6538';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$track_url      = home_url('/track-order/');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/return-refund-policy/');
$faq_url        = home_url('/faq/');
$status         = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$mmd_contact_asset = static function ($file) use ($theme_uri, $theme_dir) {
    $relative = 'assets/img/gallery/' . $file;
    $path     = $theme_dir . '/' . $relative;

    if (!file_exists($path)) {
        $relative = 'assets/img/home/' . $file;
        $path     = $theme_dir . '/' . $relative;
    }

    $url = $theme_uri . '/' . $relative;

    if (file_exists($path)) {
        return add_query_arg('ver', filemtime($path), $url);
    }

    return $url;
};

$mmd_contact_img = static function ($file, $alt, $class = '', $width = 900, $height = 700, $loading = 'lazy', $sizes = '') use ($mmd_contact_asset) {
    $url = $mmd_contact_asset($file);

    if (function_exists('dawp_get_responsive_image')) {
        return dawp_get_responsive_image($url, $alt, $class, $width, $height, $loading, $sizes);
    }

    return sprintf(
        '<img src="%s" alt="%s" class="%s" width="%d" height="%d" loading="%s" decoding="async">',
        esc_url($url),
        esc_attr($alt),
        esc_attr($class),
        (int) $width,
        (int) $height,
        esc_attr($loading)
    );
};

$mmd_contact_remote_img = static function ($url, $alt, $class = '', $width = 900, $height = 700, $loading = 'lazy', $sizes = '', $fetchpriority = '') {
    if (function_exists('dawp_get_responsive_image')) {
        return dawp_get_responsive_image($url, $alt, $class, $width, $height, $loading, $sizes, $fetchpriority);
    }

    return sprintf(
        '<img src="%s" alt="%s" class="%s" width="%d" height="%d" loading="%s" decoding="async">',
        esc_url($url),
        esc_attr($alt),
        esc_attr($class),
        (int) $width,
        (int) $height,
        esc_attr($loading)
    );
};

$contact_images = [
    'hero'    => 'https://images.unsplash.com/photo-1522312346375-d1a52e2b99b3?auto=format&fit=crop&w=1400&q=84',
    'detail'  => 'https://images.unsplash.com/photo-1547996160-81dfa63595aa?auto=format&fit=crop&w=900&q=84',
    'atelier' => 'https://cdn.shopify.com/s/files/1/0266/7141/5373/files/store-wa_893407f6-a744-4df8-b7a4-2baf29ec209e.jpg?v=1580744810',
];

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
    .mmd-contact { --mmd-ink:#0B0B0B; --mmd-charcoal:#1A1A1A; --mmd-text:#555555; --mmd-muted:#858585; --mmd-ivory:#F7F5F0; --mmd-line:#E5E2DC; --mmd-accent:#B89B5E; --mmd-accent-light:#D1BD8A; --mmd-white:#FFFFFF; color:var(--mmd-text); background:var(--mmd-white); font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; }
    .mmd-contact * { box-sizing:border-box; }
    .mmd-contact p { margin:0; }
    .mmd-contact h1, .mmd-contact h2, .mmd-contact h3 { margin:0; color:var(--mmd-ink); font-family:Inter, "Avenir Next", Arial, sans-serif; font-weight:800; line-height:1.05; letter-spacing:0; }
    .mmd-contact-container { width:min(100% - 48px, 1280px); margin-inline:auto; }
    .mmd-contact-eyebrow { margin:0 0 10px; color:var(--mmd-accent); font-size:.68rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase; }
    .mmd-contact-btn { display:inline-flex; align-items:center; justify-content:center; min-height:44px; border:1px solid var(--mmd-ink); border-radius:2px; padding:0 22px; font-size:.78rem; font-weight:700; letter-spacing:.035em; text-decoration:none; text-transform:uppercase; transition:background .18s ease, color .18s ease, border-color .18s ease, transform .18s ease; }
    .mmd-contact-btn:hover { transform:translateY(-1px); }
    .mmd-contact-btn--primary { background:var(--mmd-ink); color:#fff; }
    .mmd-contact-btn--primary:hover { background:var(--mmd-accent); border-color:var(--mmd-accent); color:var(--mmd-ink); }
    .mmd-contact-btn--secondary { background:transparent; color:var(--mmd-ink); }
    .mmd-contact-btn--secondary:hover { background:var(--mmd-ink); color:#fff; }
    .mmd-contact-link { color:var(--mmd-accent); font-weight:800; text-decoration:none; overflow-wrap:anywhere; }
    .mmd-contact-link:hover { color:var(--mmd-ink); text-decoration:underline; text-underline-offset:4px; }
    .mmd-contact-hero { background:linear-gradient(90deg, rgba(184,155,94,.16), rgba(255,255,255,0) 42%), var(--mmd-ivory); border-bottom:1px solid var(--mmd-line); }
    .mmd-contact-hero__grid { display:grid; gap:30px; min-height:500px; padding:42px 0; }
    .mmd-contact-hero__content { display:flex; flex-direction:column; justify-content:center; max-width:640px; }
    .mmd-contact-hero h1 { font-size:clamp(2.05rem, 3.6vw, 3.35rem); line-height:1.1; }
    .mmd-contact-hero__copy { max-width:590px; margin-top:18px; color:var(--mmd-charcoal); font-size:clamp(.96rem, 1.2vw, 1.05rem); line-height:1.7; }
    .mmd-contact-hero__actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:30px; }
    .mmd-contact-hero__media { align-self:center; height:clamp(300px, 34vw, 430px); position:relative; overflow:hidden; background:var(--mmd-ink); box-shadow:0 28px 70px rgba(11,11,11,.18); }
    .mmd-contact-hero__media:after { content:""; position:absolute; inset:0; background:linear-gradient(180deg, rgba(11,11,11,0), rgba(11,11,11,.46)); pointer-events:none; }
    .mmd-contact-hero__media img { width:100%; height:100%; object-fit:cover; object-position:center; }
    .mmd-contact-hero__note { position:absolute; right:18px; bottom:18px; z-index:1; max-width:290px; background:rgba(247,245,240,.94); border:1px solid rgba(209,189,138,.72); padding:16px; color:var(--mmd-ink); font-size:.84rem; font-weight:700; line-height:1.5; backdrop-filter:blur(10px); }
    .mmd-contact-section { padding:68px 0; }
    .mmd-contact-section--soft { background:var(--mmd-ivory); }
    .mmd-contact-section__head { display:flex; align-items:end; justify-content:space-between; gap:24px; margin-bottom:28px; }
    .mmd-contact-section__head h2, .mmd-contact-form-card h2, .mmd-contact-sidebar h2, .mmd-contact-cta h2 { font-size:clamp(1.7rem, 2.8vw, 2.55rem); line-height:1.12; }
    .mmd-contact-section__head p:not(.mmd-contact-eyebrow) { max-width:610px; margin-top:10px; font-size:.95rem; line-height:1.62; }
    .mmd-contact-methods, .mmd-contact-help, .mmd-contact-steps, .mmd-contact-faq-grid { display:grid; gap:18px; }
    .mmd-contact-card, .mmd-contact-step, .mmd-contact-help-card, .mmd-contact-form-card, .mmd-contact-sidebar, .mmd-contact-faq { background:#fff; border:1px solid var(--mmd-line); border-radius:4px; transition:border-color .18s ease, box-shadow .18s ease, transform .18s ease; }
    .mmd-contact-card, .mmd-contact-step, .mmd-contact-help-card, .mmd-contact-faq { padding:24px; }
    .mmd-contact-card:hover, .mmd-contact-help-card:hover, .mmd-contact-faq:hover { border-color:var(--mmd-accent); box-shadow:0 18px 34px rgba(11,11,11,.09); transform:translateY(-3px); }
    .mmd-contact-card svg { width:32px; height:32px; margin-bottom:15px; color:var(--mmd-accent); fill:none; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; }
    .mmd-contact-card h3, .mmd-contact-step h3, .mmd-contact-help-card h3, .mmd-contact-faq summary { font-family:Inter, Arial, sans-serif; font-size:.95rem; font-weight:800; line-height:1.34; }
    .mmd-contact-card p, .mmd-contact-step p, .mmd-contact-help-card p, .mmd-contact-faq p { margin-top:10px; font-size:.92rem; line-height:1.6; }
    .mmd-contact-card a, .mmd-contact-help-card a { display:inline-flex; margin-top:16px; color:var(--mmd-accent); font-size:.78rem; font-weight:800; letter-spacing:.05em; text-decoration:none; text-transform:uppercase; }
    .mmd-contact-main { display:grid; gap:28px; align-items:start; }
    .mmd-contact-form-card, .mmd-contact-sidebar { padding:26px; }
    .mmd-contact-form-card__image { margin-top:22px; overflow:hidden; border:1px solid var(--mmd-line); background:var(--mmd-ink); }
    .mmd-contact-form-card__image img { width:100%; aspect-ratio:16/7; height:auto; object-fit:cover; }
    .mmd-contact-form-card p, .mmd-contact-sidebar p { margin-top:12px; line-height:1.65; font-size:.95rem; }
    .mmd-contact-form { display:grid; gap:14px; margin-top:24px; }
    .mmd-contact-field { display:grid; gap:8px; }
    .mmd-contact-field label { color:var(--mmd-ink); font-size:.78rem; font-weight:800; letter-spacing:.05em; text-transform:uppercase; }
    .mmd-contact-field input, .mmd-contact-field select, .mmd-contact-field textarea { width:100%; border:1px solid var(--mmd-line); border-radius:2px; background:#fff; color:var(--mmd-ink); font:inherit; min-height:48px; padding:0 14px; transition:border-color .18s ease, box-shadow .18s ease; }
    .mmd-contact-field textarea { min-height:150px; padding:14px; resize:vertical; }
    .mmd-contact-field input:focus, .mmd-contact-field select:focus, .mmd-contact-field textarea:focus { border-color:var(--mmd-accent); box-shadow:0 0 0 3px rgba(184,155,94,.18); outline:0; }
    .mmd-contact-form__row { display:grid; gap:14px; }
    .mmd-contact-honeypot { clip:rect(0 0 0 0); clip-path:inset(50%); height:1px; margin:-1px; overflow:hidden; position:absolute; white-space:nowrap; width:1px; }
    .mmd-contact-notice { border-radius:3px; padding:13px 14px; font-size:.9rem; font-weight:800; line-height:1.5; }
    .mmd-contact-notice--success { border:1px solid #B9D8C6; background:#F0FAF3; color:#286642; }
    .mmd-contact-notice--error { border:1px solid #E3B5AA; background:#FFF2EF; color:#8A3327; }
    .mmd-contact-form__note { color:var(--mmd-muted); font-size:.86rem; line-height:1.55; }
    .mmd-contact-form button { cursor:pointer; }
    .mmd-contact-sidebar dl { display:grid; gap:16px; margin:22px 0 0; }
    .mmd-contact-sidebar div { border-top:1px solid var(--mmd-line); padding-top:16px; }
    .mmd-contact-sidebar dt { color:var(--mmd-ink); font-size:.78rem; font-weight:800; letter-spacing:.05em; text-transform:uppercase; }
    .mmd-contact-sidebar dd { margin:7px 0 0; font-size:.94rem; line-height:1.55; }
    .mmd-contact-steps { counter-reset:contact-step; }
    .mmd-contact-step { position:relative; padding-left:70px; }
    .mmd-contact-step:before { counter-increment:contact-step; content:counter(contact-step, decimal-leading-zero); position:absolute; left:22px; top:22px; display:flex; align-items:center; justify-content:center; width:34px; height:34px; border:1px solid var(--mmd-accent-light); background:var(--mmd-ivory); color:var(--mmd-ink); font-weight:800; }
    .mmd-contact-sidebar__image { margin-top:22px; overflow:hidden; border:1px solid var(--mmd-line); background:var(--mmd-ink); }
    .mmd-contact-sidebar__image img { width:100%; aspect-ratio:4/3; height:auto; object-fit:cover; }
    .mmd-contact-help-card { display:block; color:inherit; text-decoration:none; }
    .mmd-contact-faq summary { cursor:pointer; list-style:none; color:var(--mmd-ink); }
    .mmd-contact-faq summary::-webkit-details-marker { display:none; }
    .mmd-contact-faq summary span { color:var(--mmd-accent); float:right; font-family:Inter, Arial, sans-serif; }
    .mmd-contact-cta { background:var(--mmd-ink); color:#fff; padding:62px 0; }
    .mmd-contact-cta__inner { display:grid; gap:22px; align-items:center; }
    .mmd-contact-cta h2 { color:#fff; }
    .mmd-contact-cta p { max-width:640px; margin-top:12px; color:rgba(255,255,255,.76); line-height:1.65; }
    .mmd-contact-cta .mmd-contact-eyebrow { color:var(--mmd-accent-light); }
    .mmd-contact-cta__actions { display:flex; flex-wrap:wrap; gap:12px; }
    .mmd-contact-cta .mmd-contact-btn--primary { border-color:#fff; background:#fff; color:var(--mmd-ink); }
    .mmd-contact-cta .mmd-contact-btn--primary:hover { border-color:var(--mmd-accent); background:var(--mmd-accent); color:#fff; }
    .mmd-contact-cta .mmd-contact-btn--secondary { border-color:rgba(255,255,255,.55); color:#fff; }
    .mmd-contact-cta .mmd-contact-btn--secondary:hover { border-color:#fff; background:#fff; color:var(--mmd-ink); }
    @media (min-width:700px) { .mmd-contact-methods, .mmd-contact-help, .mmd-contact-steps, .mmd-contact-faq-grid { grid-template-columns:repeat(3, minmax(0, 1fr)); } .mmd-contact-form__row { grid-template-columns:repeat(2, minmax(0, 1fr)); } }
    @media (min-width:900px) { .mmd-contact-hero__grid { grid-template-columns:.94fr 1.06fr; } .mmd-contact-main { grid-template-columns:minmax(0, 1.1fr) minmax(320px, .72fr); } .mmd-contact-cta__inner { grid-template-columns:1fr auto; } .mmd-contact-cta__actions { justify-content:flex-end; } }
    @media (max-width:699px) { .mmd-contact-container { width:min(100% - 40px, 1280px); } .mmd-contact-hero__grid { min-height:0; } .mmd-contact-hero__media { height:300px; } .mmd-contact-section { padding:50px 0; } .mmd-contact-section__head { align-items:start; flex-direction:column; } .mmd-contact-methods, .mmd-contact-help, .mmd-contact-steps, .mmd-contact-faq-grid { display:flex; gap:14px; margin-inline:0; overflow-x:auto; padding-inline:0; padding-bottom:4px; scroll-snap-type:x mandatory; scrollbar-width:none; } .mmd-contact-methods::-webkit-scrollbar, .mmd-contact-help::-webkit-scrollbar, .mmd-contact-steps::-webkit-scrollbar, .mmd-contact-faq-grid::-webkit-scrollbar { display:none; } .mmd-contact-card, .mmd-contact-help-card, .mmd-contact-step, .mmd-contact-faq { flex:0 0 clamp(17rem, 82vw, 21rem); max-width:clamp(17rem, 82vw, 21rem); scroll-snap-align:start; } .mmd-contact-hero__note { left:14px; right:14px; } .mmd-contact-cta__actions .mmd-contact-btn, .mmd-contact-form button { width:100%; } }
</style>

<div class="mmd-contact">
    <section class="mmd-contact-hero" aria-labelledby="mmd-contact-title">
        <div class="mmd-contact-container mmd-contact-hero__grid">
            <div class="mmd-contact-hero__content">
                <p class="mmd-contact-eyebrow"><?php esc_html_e('Contact chronelshop.com', 'dawp'); ?></p>
                <h1 id="mmd-contact-title"><?php esc_html_e('Concierge support for confident watch ownership.', 'dawp'); ?></h1>
                <p class="mmd-contact-hero__copy"><?php esc_html_e('Questions about a reference, sizing, delivery, authentication or a return? Our customer care team is here to help from discovery to ownership.', 'dawp'); ?></p>
                <div class="mmd-contact-hero__actions">
                    <a class="mmd-contact-btn mmd-contact-btn--primary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                    <a class="mmd-contact-btn mmd-contact-btn--secondary" href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                </div>
            </div>
            <div class="mmd-contact-hero__media">
                <?php echo $mmd_contact_remote_img($contact_images['hero'], __('Close-up of a refined luxury watch on the wrist', 'dawp'), '', 980, 760, 'eager', '(min-width: 900px) 50vw, 100vw', 'high'); ?>
                <div class="mmd-contact-hero__note"><?php esc_html_e('For the fastest help, include your order number and the email used at checkout.', 'dawp'); ?></div>
            </div>
        </div>
    </section>

    <section class="mmd-contact-section" aria-labelledby="mmd-contact-methods-title">
        <div class="mmd-contact-container">
            <div class="mmd-contact-section__head">
                <div>
                    <p class="mmd-contact-eyebrow"><?php esc_html_e('How To Reach Us', 'dawp'); ?></p>
                    <h2 id="mmd-contact-methods-title"><?php esc_html_e('Choose the support path that fits your question.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Whether you need order guidance, tracking details or return information, these links keep the next step clear.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="mmd-contact-methods">
                <?php foreach ($contact_methods as $method) : ?>
                    <article class="mmd-contact-card">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><?php echo $method['icon']; ?></svg>
                        <h3><?php echo esc_html($method['title']); ?></h3>
                        <p><?php echo esc_html($method['copy']); ?></p>
                        <a href="<?php echo esc_url($method['url']); ?>"><?php echo esc_html($method['value']); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-contact-section mmd-contact-section--soft" aria-labelledby="mmd-contact-form-title">
        <div class="mmd-contact-container mmd-contact-main">
            <article class="mmd-contact-form-card">
                <p class="mmd-contact-eyebrow"><?php esc_html_e('Send A Message', 'dawp'); ?></p>
                <h2 id="mmd-contact-form-title"><?php esc_html_e('Tell us how we can help.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Use the secure form below to reach our support team. Add as much detail as possible so we can respond with useful next steps.', 'dawp'); ?></p>
                <div class="mmd-contact-form-card__image">
                    <?php echo $mmd_contact_remote_img($contact_images['detail'], __('Refined luxury watch collection arranged on dark fabric', 'dawp'), '', 920, 402, 'lazy', '(min-width: 900px) 55vw, 100vw'); ?>
                </div>
                <form class="mmd-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <label class="mmd-contact-honeypot" for="mmd-contact-company"><?php esc_html_e('Company website', 'dawp'); ?></label>
                    <input class="mmd-contact-honeypot" id="mmd-contact-company" type="text" name="company_website" tabindex="-1" autocomplete="off">
                    <?php if ($status === 'success') : ?>
                        <div class="mmd-contact-notice mmd-contact-notice--success" role="status"><?php esc_html_e('Thank you. Your message has been received and our support team will reply as soon as possible.', 'dawp'); ?></div>
                    <?php elseif ($status === 'error') : ?>
                        <div class="mmd-contact-notice mmd-contact-notice--error" role="alert"><?php esc_html_e('Please check the required fields and try again.', 'dawp'); ?></div>
                    <?php endif; ?>
                    <div class="mmd-contact-form__row">
                        <div class="mmd-contact-field">
                            <label for="mmd-contact-name"><?php esc_html_e('Full Name', 'dawp'); ?></label>
                            <input id="mmd-contact-name" name="contact_name" type="text" autocomplete="name" required>
                        </div>
                        <div class="mmd-contact-field">
                            <label for="mmd-contact-email"><?php esc_html_e('Email Address', 'dawp'); ?></label>
                            <input id="mmd-contact-email" name="contact_email" type="email" autocomplete="email" required>
                        </div>
                    </div>
                    <div class="mmd-contact-form__row">
                        <div class="mmd-contact-field">
                            <label for="mmd-contact-order"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                            <input id="mmd-contact-order" name="order_number" type="text" autocomplete="off" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                        <div class="mmd-contact-field">
                            <label for="mmd-contact-topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="mmd-contact-topic" name="contact_topic" required>
                                <option value=""><?php esc_html_e('Select a topic', 'dawp'); ?></option>
                                <option value="order"><?php esc_html_e('Order or tracking question', 'dawp'); ?></option>
                                <option value="return"><?php esc_html_e('Return or refund request', 'dawp'); ?></option>
                                <option value="product"><?php esc_html_e('Product question', 'dawp'); ?></option>
                                <option value="privacy"><?php esc_html_e('Privacy request', 'dawp'); ?></option>
                                <option value="other"><?php esc_html_e('General support', 'dawp'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="mmd-contact-field">
                        <label for="mmd-contact-message"><?php esc_html_e('Message', 'dawp'); ?></label>
                        <textarea id="mmd-contact-message" name="contact_message" required></textarea>
                    </div>
                    <p class="mmd-contact-form__note"><?php esc_html_e('Please do not include full payment card numbers or sensitive account credentials in your message.', 'dawp'); ?></p>
                    <button class="mmd-contact-btn mmd-contact-btn--primary" type="submit"><?php esc_html_e('Send Message', 'dawp'); ?></button>
                </form>
            </article>

            <aside class="mmd-contact-sidebar" aria-labelledby="mmd-contact-details-title">
                <p class="mmd-contact-eyebrow"><?php esc_html_e('Customer Care Details', 'dawp'); ?></p>
                <h2 id="mmd-contact-details-title"><?php esc_html_e('Support information at a glance.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Our team supports shoppers across the United States with clear, policy-aligned guidance.', 'dawp'); ?></p>
                <div class="mmd-contact-sidebar__image">
                    <?php echo $mmd_contact_remote_img($contact_images['atelier'], __('Luxury watch showroom prepared for private client guidance', 'dawp'), '', 640, 480, 'lazy', '(min-width: 900px) 32vw, 100vw'); ?>
                </div>
                <dl>
                    <div>
                        <dt><?php esc_html_e('Store', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($store_name); ?></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Email', 'dawp'); ?></dt>
                        <dd><a class="mmd-contact-link" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Phone', 'dawp'); ?></dt>
                        <dd><a class="mmd-contact-link" href="tel:<?php echo esc_attr($support_phone); ?>"><?php echo esc_html($support_phone); ?></a></dd>
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

    <section class="mmd-contact-section" aria-labelledby="mmd-contact-steps-title">
        <div class="mmd-contact-container">
            <div class="mmd-contact-section__head">
                <div>
                    <p class="mmd-contact-eyebrow"><?php esc_html_e('What Happens Next', 'dawp'); ?></p>
                    <h2 id="mmd-contact-steps-title"><?php esc_html_e('A simple path from question to resolution.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-contact-steps">
                <?php foreach ($support_steps as $step) : ?>
                    <article class="mmd-contact-step">
                        <h3><?php echo esc_html($step['title']); ?></h3>
                        <p><?php echo esc_html($step['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-contact-section mmd-contact-section--soft" aria-labelledby="mmd-contact-help-title">
        <div class="mmd-contact-container">
            <div class="mmd-contact-section__head">
                <div>
                    <p class="mmd-contact-eyebrow"><?php esc_html_e('Quick Help', 'dawp'); ?></p>
                    <h2 id="mmd-contact-help-title"><?php esc_html_e('Helpful policy details before you write.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-contact-help">
                <?php foreach ($quick_help as $item) : ?>
                    <a class="mmd-contact-help-card" href="<?php echo esc_url($item['url']); ?>">
                        <h3><?php echo esc_html($item['title']); ?></h3>
                        <p><?php echo esc_html($item['copy']); ?></p>
                        <span><?php esc_html_e('Learn more', 'dawp'); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-contact-section" aria-labelledby="mmd-contact-faq-title">
        <div class="mmd-contact-container">
            <div class="mmd-contact-section__head">
                <div>
                    <p class="mmd-contact-eyebrow"><?php esc_html_e('Contact FAQs', 'dawp'); ?></p>
                    <h2 id="mmd-contact-faq-title"><?php esc_html_e('A few notes that make support easier.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-contact-faq-grid">
                <?php foreach ($contact_faqs as $item) : ?>
                    <details class="mmd-contact-faq">
                        <summary><?php echo esc_html($item['question']); ?> <span aria-hidden="true">+</span></summary>
                        <p><?php echo esc_html($item['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-contact-cta" aria-labelledby="mmd-contact-cta-title">
        <div class="mmd-contact-container mmd-contact-cta__inner">
            <div>
                <p class="mmd-contact-eyebrow"><?php esc_html_e('Private Guidance', 'dawp'); ?></p>
                <h2 id="mmd-contact-cta-title"><?php esc_html_e('Still browsing? Explore references selected for lasting wear.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Discover classic, sport, heritage and limited watches selected for proportion, movement quality and quiet presence.', 'dawp'); ?></p>
            </div>
            <div class="mmd-contact-cta__actions">
                <a class="mmd-contact-btn mmd-contact-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="mmd-contact-btn mmd-contact-btn--secondary" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('View FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>


