<?php
/**
 * Contact page template part.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$theme_uri   = get_template_directory_uri();
$gallery_uri = $theme_uri . '/assets/img/gallery/Mytire/';
$home_uri    = $gallery_uri . 'Home/';
$shop_url    = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$asset = static function ($file) use ($home_uri) {
    return $home_uri . $file;
};

$status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$status_messages = [
    'sent'    => __('Thank you. Your message has been sent and our support team will reply as soon as possible.', 'dawp'),
    'failed'  => __('Sorry, we could not send your message right now. Please email support@Mytire.co directly.', 'dawp'),
    'invalid' => __('Please check your contact details and message, then try again.', 'dawp'),
];
?>

<div class="mytire-rack-home mytire-contact-page">
    <a class="mytire-feedback" href="#contact-form"><?php esc_html_e('Feedback', 'dawp'); ?></a>

    <section class="mytire-rack-hero mytire-contact-hero" aria-labelledby="contact-title">
        <div class="mytire-rack-hero__inner">
            <p class="mytire-eyebrow"><?php esc_html_e('Contact Mytire', 'dawp'); ?></p>
            <h1 id="contact-title"><?php esc_html_e('Get clear help before or after your tire order.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Ask about tire fitment, product details, shipping, returns, or an order you already placed. Our team keeps support practical and easy to follow.', 'dawp'); ?></p>
            <div class="mytire-contact-actions">
                <a class="mytire-red-button" href="#contact-form"><?php esc_html_e('Send a Message', 'dawp'); ?></a>
                <a class="mytire-outline-button" href="mailto:support@Mytire.co"><?php esc_html_e('Email Support', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="mytire-how mytire-contact-channels" aria-labelledby="contact-options-title">
        <h2 id="contact-options-title"><?php esc_html_e('Choose the Route That Fits Your Question', 'dawp'); ?></h2>
        <p class="mytire-how__intro"><?php esc_html_e('Send the details you have now. We will help narrow the next step, whether you are still comparing tires or checking an existing order.', 'dawp'); ?></p>
        <div class="mytire-how__grid">
            <article>
                <div class="mytire-how__icon" aria-hidden="true">
                    <span>1</span>
                    <img src="<?php echo esc_url($asset('Smart_Tire_Matching.jpg')); ?>" width="360" height="300" alt="" loading="lazy" decoding="async">
                </div>
                <h3><?php esc_html_e('Product & Fitment', 'dawp'); ?></h3>
                <p><?php esc_html_e('Need help checking size, brand range, load rating, or speed rating before checkout? Send us the tire details you are comparing.', 'dawp'); ?></p>
            </article>
            <article>
                <div class="mytire-how__icon" aria-hidden="true">
                    <span>2</span>
                    <img src="<?php echo esc_url($asset('Order_Online_With_Support.jpg')); ?>" width="360" height="300" alt="" loading="lazy" decoding="async">
                </div>
                <h3><?php esc_html_e('Order Support', 'dawp'); ?></h3>
                <p><?php esc_html_e('For an existing order, include your order number and the email used at checkout so we can review it faster.', 'dawp'); ?></p>
            </article>
            <article>
                <div class="mytire-how__icon" aria-hidden="true">
                    <span>3</span>
                    <img src="<?php echo esc_url($asset('Customer_Support.jpg')); ?>" width="360" height="300" alt="" loading="lazy" decoding="async">
                </div>
                <h3><?php esc_html_e('Shipping & Returns', 'dawp'); ?></h3>
                <p><?php esc_html_e('Questions about delivery timing, tracking, damage, returns, or refunds are routed to support for clear next steps.', 'dawp'); ?></p>
            </article>
        </div>
    </section>

    <section class="mytire-guide mytire-contact-form-section" aria-labelledby="contact-form-title">
        <aside class="mytire-guide__copy mytire-contact-details">
            <p class="mytire-guide__kicker"><?php esc_html_e('Contact Details', 'dawp'); ?></p>
            <h2 id="contact-form-title"><?php esc_html_e('Tell us what you need and we will point you in the right direction.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Share the most useful details you have: tire size, product name, order number, delivery issue, or photos you can send later by email.', 'dawp'); ?></p>

            <div class="mytire-contact-info-list">
                <div class="mytire-contact-info">
                    <p><?php esc_html_e('Email', 'dawp'); ?></p>
                    <a href="mailto:support@Mytire.co">support@Mytire.co</a>
                </div>
                <div class="mytire-contact-info">
                    <p><?php esc_html_e('Business Hours', 'dawp'); ?></p>
                    <strong><?php esc_html_e('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp'); ?></strong>
                </div>
                <div class="mytire-contact-info">
                    <p><?php esc_html_e('Company', 'dawp'); ?></p>
                    <strong><?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?></strong>
                    <span><?php esc_html_e('324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'); ?></span>
                </div>
            </div>
        </aside>

        <div id="contact-form" class="mytire-contact-form-wrap">
            <?php if ($status && isset($status_messages[$status])) : ?>
                <div class="mytire-contact-status mytire-contact-status--<?php echo esc_attr($status); ?>">
                    <?php echo esc_html($status_messages[$status]); ?>
                </div>
            <?php endif; ?>

            <form class="mytire-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <input type="hidden" name="action" value="dawp_contact_submit">
                <?php wp_nonce_field('dawp_contact_submit', 'dawp_contact_nonce'); ?>
                <p class="mytire-contact-hp">
                    <label for="contact-website"><?php esc_html_e('Website', 'dawp'); ?></label>
                    <input id="contact-website" name="website" type="text" tabindex="-1" autocomplete="off">
                </p>

                <div class="mytire-contact-fields">
                    <p>
                        <label for="contact-name"><?php esc_html_e('Name', 'dawp'); ?></label>
                        <input id="contact-name" name="name" type="text" autocomplete="name" required>
                    </p>
                    <p>
                        <label for="contact-email"><?php esc_html_e('Email', 'dawp'); ?></label>
                        <input id="contact-email" name="email" type="email" autocomplete="email" required>
                    </p>
                </div>

                <p>
                    <label for="contact-subject"><?php esc_html_e('Subject', 'dawp'); ?></label>
                    <input id="contact-subject" name="subject" type="text" placeholder="<?php esc_attr_e('Order support, tire fitment, shipping, returns...', 'dawp'); ?>">
                </p>

                <p>
                    <label for="contact-message"><?php esc_html_e('Message', 'dawp'); ?></label>
                    <textarea id="contact-message" name="message" placeholder="<?php esc_attr_e('Include tire size, order number, product name, or any details that help us assist you.', 'dawp'); ?>" required></textarea>
                </p>

                <button class="mytire-red-button" type="submit"><?php esc_html_e('Submit Message', 'dawp'); ?></button>
            </form>
        </div>
    </section>

    <section class="mytire-brand-cta" aria-labelledby="contact-next-title">
        <p class="mytire-brand-cta__kicker"><?php esc_html_e('What happens next', 'dawp'); ?></p>
        <h2 id="contact-next-title"><?php esc_html_e('We review your message and reply with practical next steps.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Most support inquiries receive a reply within 1-2 business days. For order questions, keeping your order number handy helps us move faster.', 'dawp'); ?></p>
        <div class="mytire-contact-cta-actions">
            <a class="mytire-pill-button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Tires', 'dawp'); ?></a>
            <a class="mytire-outline-button" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Visit FAQ', 'dawp'); ?></a>
        </div>
    </section>
</div>
