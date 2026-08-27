<?php
/**
 * Brickgoshop contact page template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url          = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$faq_url           = home_url('/faq/');
$track_url         = home_url('/track-order/');
$shipping_url      = home_url('/shipping-policy/');
$returns_url       = home_url('/return-refund-policy/');
$privacy_url       = home_url('/privacy-policy/');
$contact_status    = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$support_email     = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickgo.com';
$support_email     = $support_email ?: 'support@brickgo.com';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!function_exists('bgs_contact_image')) {
    function bgs_contact_image($file, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $width = 980, $height = 760) {
        if (function_exists('dawp_get_home_responsive_image')) {
            return dawp_get_home_responsive_image($file, $alt, $class, $loading, $sizes, $width, $height);
        }

        $src = esc_url(get_template_directory_uri() . '/assets/img/home/' . basename($file));
        return sprintf('<img src="%s" alt="%s" class="%s" loading="%s" width="%d" height="%d" decoding="async">', $src, esc_attr($alt), esc_attr($class), esc_attr($loading), (int) $width, (int) $height);
    }
}

$support_cards = [
    [
        'eyebrow' => __('Orders', 'dawp'),
        'title'   => __('Tracking and delivery help', 'dawp'),
        'copy'    => __('Need a shipment update or order detail checked? Include your order number so the team can move faster.', 'dawp'),
        'url'     => $track_url,
        'label'   => __('Track order', 'dawp'),
    ],
    [
        'eyebrow' => __('Returns', 'dawp'),
        'title'   => __('Returns and refunds', 'dawp'),
        'copy'    => __('Start with the policy, then send a note if your collectible arrived damaged or something feels off.', 'dawp'),
        'url'     => $returns_url,
        'label'   => __('View policy', 'dawp'),
    ],
    [
        'eyebrow' => __('Product', 'dawp'),
        'title'   => __('Product questions', 'dawp'),
        'copy'    => __('Ask about scale, display fit, gifting, or product details before you add a piece to the shelf.', 'dawp'),
        'url'     => $shop_url,
        'label'   => __('Shop all', 'dawp'),
    ],
];

$topics = [
    'order'   => __('Order or tracking question', 'dawp'),
    'return'  => __('Return or refund request', 'dawp'),
    'product' => __('Product question', 'dawp'),
    'privacy' => __('Privacy request', 'dawp'),
    'other'   => __('General support', 'dawp'),
];
?>

<style>
    .bgs-contact{--bgs-contact-bg:#f6f7ef;--bgs-contact-paper:#fff;--bgs-contact-ink:#14151a;--bgs-contact-muted:#625e68;--bgs-contact-violet:#315dff;--bgs-contact-lime:#d9ff4a;--bgs-contact-coral:#ff6a4c;--bgs-contact-ice:#ddf3f0;--bgs-contact-line:#16131f21;background:var(--bgs-contact-bg);color:var(--bgs-contact-ink);font-family:"Space Grotesk","Geist",var(--font-sans);letter-spacing:0;overflow:clip}.bgs-contact *{box-sizing:border-box}.bgs-contact p,.bgs-contact h1,.bgs-contact h2,.bgs-contact h3{margin:0}.bgs-contact a{color:inherit}.bgs-contact__shell{width:min(100% - 32px,1240px);margin-inline:auto}.bgs-contact__kicker{color:var(--bgs-contact-violet);text-transform:uppercase;margin-bottom:12px;font-size:.72rem;font-weight:950;line-height:1.2}.bgs-contact h1,.bgs-contact h2{color:var(--bgs-contact-ink);text-transform:uppercase;font-weight:950;letter-spacing:0;line-height:1.02}.bgs-contact h1{max-width:720px;font-size:clamp(2.35rem,5.4vw,4rem)}.bgs-contact h2{max-width:720px;font-size:clamp(1.8rem,3.6vw,2.5rem)}.bgs-contact h3{color:var(--bgs-contact-ink);font-size:clamp(1.06rem,1.7vw,1.28rem);font-weight:920;line-height:1.16}.bgs-contact__lead,.bgs-contact__copy{color:var(--bgs-contact-muted);font-size:clamp(.98rem,1.5vw,1.12rem);font-weight:620;line-height:1.62}.bgs-contact__lead{max-width:600px;margin-top:18px}.bgs-contact__copy{max-width:650px;margin-top:12px}.bgs-contact__hero{background:linear-gradient(90deg,#315dff1f 0 1px,transparent 1px),linear-gradient(0deg,#14151a14 0 1px,transparent 1px),var(--bgs-contact-bg);background-size:38px 38px;padding:clamp(34px,5vw,70px) 0 clamp(42px,6vw,82px)}.bgs-contact__hero-grid,.bgs-contact__main-grid,.bgs-contact__cta-grid{display:grid;gap:clamp(26px,5vw,72px);align-items:center}.bgs-contact__hero-media{background:var(--bgs-contact-ink);border:1px solid var(--bgs-contact-ink);border-radius:8px;min-height:clamp(340px,48vw,580px);overflow:hidden;position:relative}.bgs-contact__hero-media:before{background:var(--bgs-contact-lime);content:"";z-index:1;width:clamp(110px,24vw,240px);height:clamp(64px,16vw,150px);position:absolute;bottom:0;left:0}.bgs-contact__hero-media:after{background:var(--bgs-contact-coral);content:"";z-index:1;width:clamp(92px,18vw,180px);height:clamp(42px,9vw,88px);position:absolute;top:0;right:0}.bgs-contact__image{width:100%;height:100%;min-height:inherit;object-fit:cover;filter:saturate(1.08) contrast(1.03);position:relative;z-index:2}.bgs-contact__tag{z-index:3;background:var(--bgs-contact-paper);border:1px solid var(--bgs-contact-ink);border-radius:6px;box-shadow:8px 8px 0 var(--bgs-contact-lime);gap:5px;max-width:calc(100% - 32px);padding:12px 14px;display:grid;position:absolute;bottom:16px;left:16px}.bgs-contact__tag span,.bgs-contact__proof span,.bgs-contact__card span,.bgs-contact__method span{color:var(--bgs-contact-violet);text-transform:uppercase;font-size:.7rem;font-weight:950;line-height:1.25}.bgs-contact__tag strong{font-size:.96rem;line-height:1.25}.bgs-contact__actions{flex-wrap:wrap;gap:12px;margin-top:24px;display:flex}.bgs-contact__btn,.bgs-contact__text-link{justify-content:center;align-items:center;text-decoration:none;transition:background .22s,border-color .22s,color .22s,transform .22s;display:inline-flex}.bgs-contact__btn{border:1px solid var(--bgs-contact-ink);text-transform:uppercase;border-radius:999px;gap:8px;min-height:44px;padding:0 18px;font-size:.8rem;font-weight:950}.bgs-contact__btn--lime{background:var(--bgs-contact-lime);color:var(--bgs-contact-ink)}.bgs-contact__btn--ghost{background:transparent;border-color:var(--bgs-contact-line);color:var(--bgs-contact-ink)}.bgs-contact__text-link{color:var(--bgs-contact-ink);text-transform:uppercase;gap:8px;min-height:38px;font-size:.8rem;font-weight:950}.bgs-contact__proof{border-top:1px solid var(--bgs-contact-line);grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;max-width:640px;margin-top:clamp(24px,4vw,42px);padding-top:16px;display:grid}.bgs-contact__proof strong{color:var(--bgs-contact-ink);font-size:clamp(1rem,1.6vw,1.22rem);font-weight:950}.bgs-contact__section{padding:clamp(46px,6vw,78px) 0}.bgs-contact__section--paper{background:var(--bgs-contact-paper)}.bgs-contact__section-head{border-top:1px solid var(--bgs-contact-line);margin-bottom:22px;padding-top:16px}.bgs-contact__cards{grid-template-columns:1fr;gap:14px;display:grid}.bgs-contact__card{background:var(--bgs-contact-paper);border:1px solid var(--bgs-contact-line);border-radius:8px;min-height:220px;padding:20px;display:flex;flex-direction:column;transition:border-color .22s,transform .22s}.bgs-contact__card p{color:var(--bgs-contact-muted);margin-top:10px;font-size:.95rem;font-weight:620;line-height:1.55}.bgs-contact__card .bgs-contact__text-link{align-self:flex-start;margin-top:auto;padding-top:18px}.bgs-contact__main{background:var(--bgs-contact-ice);padding:clamp(48px,6vw,82px) 0}.bgs-contact__form-wrap,.bgs-contact__methods{background:var(--bgs-contact-paper);border:1px solid var(--bgs-contact-line);border-radius:8px}.bgs-contact__form-wrap{padding:clamp(18px,3vw,30px)}.bgs-contact__form{display:grid;gap:14px;margin-top:22px}.bgs-contact__field{display:grid;gap:7px}.bgs-contact__field label{color:var(--bgs-contact-ink);text-transform:uppercase;font-size:.72rem;font-weight:950}.bgs-contact__field input,.bgs-contact__field select,.bgs-contact__field textarea{width:100%;border:1px solid var(--bgs-contact-line);border-radius:8px;background:#fff;color:var(--bgs-contact-ink);min-height:46px;padding:0 13px;font-size:.96rem;font-weight:620;outline:none;transition:border-color .18s,box-shadow .18s}.bgs-contact__field textarea{min-height:136px;padding-block:12px;resize:vertical}.bgs-contact__field input:focus,.bgs-contact__field select:focus,.bgs-contact__field textarea:focus{border-color:var(--bgs-contact-violet);box-shadow:0 0 0 3px #315dff1c}.bgs-contact__honeypot{clip-path:inset(50%);white-space:nowrap;width:1px;height:1px;position:absolute;overflow:hidden}.bgs-contact__submit{background:var(--bgs-contact-violet);border:1px solid var(--bgs-contact-violet);border-radius:999px;color:#fff;cursor:pointer;text-transform:uppercase;justify-content:center;align-items:center;gap:8px;min-height:48px;padding:0 20px;font-weight:950;display:inline-flex}.bgs-contact__notice{border:1px solid var(--bgs-contact-line);border-radius:8px;margin-top:18px;padding:13px 15px;font-size:.94rem;font-weight:760;line-height:1.45}.bgs-contact__notice--success{background:var(--bgs-contact-lime);color:var(--bgs-contact-ink);border-color:var(--bgs-contact-ink)}.bgs-contact__notice--error{background:#fff0ec;color:var(--bgs-contact-ink);border-color:var(--bgs-contact-coral)}.bgs-contact__methods{align-self:start;padding:clamp(18px,3vw,26px)}.bgs-contact__method-list{display:grid;gap:12px;margin-top:20px}.bgs-contact__method{border:1px solid var(--bgs-contact-line);border-radius:8px;padding:16px}.bgs-contact__method a{color:var(--bgs-contact-violet);font-weight:900;text-decoration:underline;text-decoration-color:#315dff57;text-underline-offset:4px;word-break:break-word}.bgs-contact__method p{color:var(--bgs-contact-muted);margin-top:8px;font-size:.94rem;font-weight:620;line-height:1.5}.bgs-contact__quick-links{border-top:1px solid var(--bgs-contact-line);display:flex;flex-wrap:wrap;gap:10px;margin-top:18px;padding-top:18px}.bgs-contact__quick-links a{border:1px solid var(--bgs-contact-line);border-radius:999px;min-height:36px;padding:8px 13px;text-decoration:none;text-transform:uppercase;font-size:.72rem;font-weight:950}.bgs-contact__cta{background:var(--bgs-contact-violet);color:#fff;padding:clamp(44px,6vw,70px) 0}.bgs-contact__cta-grid{border-top:1px solid #ffffff47;gap:24px;padding-top:clamp(22px,3.5vw,34px)}.bgs-contact__cta h2,.bgs-contact__cta p,.bgs-contact__cta .bgs-contact__kicker{color:#fff}.bgs-contact__cta .bgs-contact__btn--lime{border-color:var(--bgs-contact-ink);color:var(--bgs-contact-ink)}.bgs-contact__cta .bgs-contact__btn--ghost{background:#ffffff12;border-color:#ffffffb8;color:#fff}@media (hover:hover){.bgs-contact__btn:hover,.bgs-contact__text-link:hover,.bgs-contact__submit:hover{transform:translateY(-2px)}.bgs-contact__card:hover{border-color:var(--bgs-contact-coral);transform:translateY(-3px)}}@media (min-width:700px){.bgs-contact__cards{grid-template-columns:repeat(3,minmax(0,1fr))}.bgs-contact__form-grid{grid-template-columns:repeat(2,minmax(0,1fr));display:grid;gap:14px}.bgs-contact__submit{justify-self:start}}@media (min-width:900px){.bgs-contact__shell{width:min(100% - 48px,1240px)}.bgs-contact__hero-grid{grid-template-columns:.92fr 1.08fr}.bgs-contact__main-grid{grid-template-columns:1.05fr .75fr;align-items:start}.bgs-contact__cta-grid{grid-template-columns:repeat(2,minmax(0,1fr));align-items:center}.bgs-contact__cta-actions{justify-self:end}}@media (max-width:699px){.bgs-contact__shell{width:min(100% - 24px,1240px)}.bgs-contact h1{font-size:clamp(2.25rem,10vw,2.75rem)}.bgs-contact__actions .bgs-contact__btn,.bgs-contact__submit{width:100%}.bgs-contact__proof{grid-template-columns:1fr}.bgs-contact__tag{right:14px;left:14px}.bgs-contact__cards{display:flex;gap:14px;overflow-x:auto;padding-bottom:4px;scroll-snap-type:x mandatory;scrollbar-width:none}.bgs-contact__cards::-webkit-scrollbar{display:none}.bgs-contact__card{flex:0 0 clamp(17rem,82vw,21rem);scroll-snap-align:start}}@media (prefers-reduced-motion:reduce){.bgs-contact *,.bgs-contact :before,.bgs-contact :after{scroll-behavior:auto!important;transition-duration:.01ms!important}}
</style>

<div class="bgs-contact">
    <section class="bgs-contact__hero" aria-labelledby="bgs-contact-title">
        <div class="bgs-contact__shell bgs-contact__hero-grid">
            <div>
                <p class="bgs-contact__kicker"><?php esc_html_e('Contact Brickgoshop', 'dawp'); ?></p>
                <h1 id="bgs-contact-title"><?php esc_html_e('Need help with your shelf story?', 'dawp'); ?></h1>
                <p class="bgs-contact__lead"><?php esc_html_e('Send us your order question, product note, return request or privacy message. The support team keeps it clear, useful and collector-friendly.', 'dawp'); ?></p>
                <div class="bgs-contact__actions">
                    <a class="bgs-contact__btn bgs-contact__btn--lime" href="#bgs-contact-form"><?php esc_html_e('Send a message', 'dawp'); ?><span aria-hidden="true">-&gt;</span></a>
                    <a class="bgs-contact__btn bgs-contact__btn--ghost" href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track order', 'dawp'); ?></a>
                </div>
                <div class="bgs-contact__proof" aria-label="<?php esc_attr_e('Support highlights', 'dawp'); ?>">
                    <span><strong><?php esc_html_e('Order help', 'dawp'); ?></strong></span>
                    <span><strong><?php esc_html_e('Returns', 'dawp'); ?></strong></span>
                    <span><strong><?php esc_html_e('Products', 'dawp'); ?></strong></span>
                </div>
            </div>
            <div class="bgs-contact__hero-media">
                <?php echo bgs_contact_image('22.png', __('Colorful collectible display pieces arranged on a desk setup.', 'dawp'), 'bgs-contact__image', 'eager', '(max-width: 899px) 100vw, 58vw', 1320, 1060); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <div class="bgs-contact__tag">
                    <span><?php esc_html_e('Support desk', 'dawp'); ?></span>
                    <strong><?php esc_html_e('Fast details make faster answers.', 'dawp'); ?></strong>
                </div>
            </div>
        </div>
    </section>

    <section class="bgs-contact__section bgs-contact__section--paper" aria-labelledby="bgs-contact-support-title">
        <div class="bgs-contact__shell">
            <div class="bgs-contact__section-head">
                <p class="bgs-contact__kicker"><?php esc_html_e('Start here', 'dawp'); ?></p>
                <h2 id="bgs-contact-support-title"><?php esc_html_e('The fastest path depends on the question.', 'dawp'); ?></h2>
            </div>
            <div class="bgs-contact__cards">
                <?php foreach ($support_cards as $card) : ?>
                    <article class="bgs-contact__card">
                        <span><?php echo esc_html($card['eyebrow']); ?></span>
                        <h3><?php echo esc_html($card['title']); ?></h3>
                        <p><?php echo esc_html($card['copy']); ?></p>
                        <a class="bgs-contact__text-link" href="<?php echo esc_url($card['url']); ?>"><?php echo esc_html($card['label']); ?><span aria-hidden="true">-&gt;</span></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bgs-contact__main" aria-labelledby="bgs-contact-form-title">
        <div class="bgs-contact__shell bgs-contact__main-grid">
            <div class="bgs-contact__form-wrap" id="bgs-contact-form">
                <p class="bgs-contact__kicker"><?php esc_html_e('Message us', 'dawp'); ?></p>
                <h2 id="bgs-contact-form-title"><?php esc_html_e('Tell us what you need.', 'dawp'); ?></h2>
                <p class="bgs-contact__copy"><?php esc_html_e('For order support, include the order number and the email used at checkout.', 'dawp'); ?></p>

                <?php if ('success' === $contact_status) : ?>
                    <div class="bgs-contact__notice bgs-contact__notice--success" role="status"><?php esc_html_e('Thanks. Your message was sent, and the support team will review it shortly.', 'dawp'); ?></div>
                <?php elseif ('error' === $contact_status) : ?>
                    <div class="bgs-contact__notice bgs-contact__notice--error" role="alert"><?php esc_html_e('Something was missing. Please check your name, email and message, then try again.', 'dawp'); ?></div>
                <?php endif; ?>

                <form class="bgs-contact__form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>
                    <div class="bgs-contact__honeypot" aria-hidden="true">
                        <label for="company_website"><?php esc_html_e('Company website', 'dawp'); ?></label>
                        <input id="company_website" name="company_website" type="text" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="bgs-contact__form-grid">
                        <div class="bgs-contact__field">
                            <label for="contact_name"><?php esc_html_e('Name', 'dawp'); ?></label>
                            <input id="contact_name" name="contact_name" type="text" autocomplete="name" required>
                        </div>
                        <div class="bgs-contact__field">
                            <label for="contact_email"><?php esc_html_e('Email', 'dawp'); ?></label>
                            <input id="contact_email" name="contact_email" type="email" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="bgs-contact__form-grid">
                        <div class="bgs-contact__field">
                            <label for="contact_topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="contact_topic" name="contact_topic">
                                <?php foreach ($topics as $key => $label) : ?>
                                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="bgs-contact__field">
                            <label for="order_number"><?php esc_html_e('Order number', 'dawp'); ?></label>
                            <input id="order_number" name="order_number" type="text" autocomplete="off" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="bgs-contact__field">
                        <label for="contact_message"><?php esc_html_e('Message', 'dawp'); ?></label>
                        <textarea id="contact_message" name="contact_message" required></textarea>
                    </div>

                    <button class="bgs-contact__submit" type="submit"><?php esc_html_e('Submit message', 'dawp'); ?><span aria-hidden="true">-&gt;</span></button>
                </form>
            </div>

            <aside class="bgs-contact__methods" aria-labelledby="bgs-contact-methods-title">
                <p class="bgs-contact__kicker"><?php esc_html_e('Support details', 'dawp'); ?></p>
                <h2 id="bgs-contact-methods-title"><?php esc_html_e('Keep the details close.', 'dawp'); ?></h2>
                <div class="bgs-contact__method-list">
                    <div class="bgs-contact__method">
                        <span><?php esc_html_e('Email', 'dawp'); ?></span>
                        <p><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></p>
                        <p><?php esc_html_e('Best for product questions, order notes and support follow-ups.', 'dawp'); ?></p>
                    </div>
                    <div class="bgs-contact__method">
                        <span><?php esc_html_e('Before writing', 'dawp'); ?></span>
                        <p><?php esc_html_e('Have your order number, checkout email and a clear photo ready if the item arrived damaged.', 'dawp'); ?></p>
                    </div>
                    <div class="bgs-contact__method">
                        <span><?php esc_html_e('Privacy', 'dawp'); ?></span>
                        <p><?php esc_html_e('For account or data requests, choose Privacy request in the topic field so it reaches the right queue.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="bgs-contact__quick-links">
                    <a href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('FAQs', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shipping_url); ?>"><?php esc_html_e('Shipping', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($privacy_url); ?>"><?php esc_html_e('Privacy', 'dawp'); ?></a>
                </div>
            </aside>
        </div>
    </section>

    <section class="bgs-contact__cta" aria-labelledby="bgs-contact-cta-title">
        <div class="bgs-contact__shell bgs-contact__cta-grid">
            <div>
                <p class="bgs-contact__kicker"><?php esc_html_e('Still browsing?', 'dawp'); ?></p>
                <h2 id="bgs-contact-cta-title"><?php esc_html_e('Find the next piece while we help.', 'dawp'); ?></h2>
                <p class="bgs-contact__copy"><?php esc_html_e('Fresh builds, desk figures and display collectibles are waiting in the shop.', 'dawp'); ?></p>
            </div>
            <div class="bgs-contact__actions bgs-contact__cta-actions">
                <a class="bgs-contact__btn bgs-contact__btn--lime" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop collectibles', 'dawp'); ?><span aria-hidden="true">-&gt;</span></a>
                <a class="bgs-contact__btn bgs-contact__btn--ghost" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('Read FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
