<?php
/**
 * Contact page template for Orvel Time.
 */
defined('ABSPATH') || exit;

$theme_uri = get_template_directory_uri();
$shop_url  = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$faq_url   = home_url('/faq/');
$hero_img  = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/18.jpg';
$detail_img = $theme_uri . '/assets/images/home/luxuryimagecollection (1)/19.jpg';
$status    = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

$status_messages = [
    'sent'    => __('Thank you. Your note has been received.', 'dawp'),
    'invalid' => __('Please complete the required fields and try again.', 'dawp'),
    'failed'  => __('We could not send your message. Please email us directly.', 'dawp'),
];
?>

<section class="ot-contact-hero">
    <div class="ot-wrap ot-contact-hero__grid">
        <div class="ot-contact-hero__copy">
            <span class="ot-kicker"><?php esc_html_e('Contact Orvel Time', 'dawp'); ?></span>
            <h1><?php esc_html_e('Here for Every Considered Detail.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Questions about an order, a timepiece or a return are handled with the same care as the collection itself.', 'dawp'); ?></p>
            <div class="ot-actions">
                <a class="ot-btn ot-btn--dark" href="#contact-form"><?php esc_html_e('Send a Note', 'dawp'); ?></a>
                <a class="ot-btn ot-btn--ghost" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('Read FAQ', 'dawp'); ?></a>
            </div>
        </div>
        <div class="ot-contact-hero__image">
            <img src="<?php echo esc_url($hero_img); ?>" alt="<?php esc_attr_e('Orvel Time watch detail in warm editorial light', 'dawp'); ?>" loading="eager">
        </div>
    </div>
</section>

<section class="ot-contact-assurance">
    <div class="ot-wrap ot-contact-assurance__grid">
        <div>
            <span><?php esc_html_e('01', 'dawp'); ?></span>
            <strong><?php esc_html_e('Order Support', 'dawp'); ?></strong>
            <p><?php esc_html_e('Status, tracking and delivery questions for your recent purchase.', 'dawp'); ?></p>
        </div>
        <div>
            <span><?php esc_html_e('02', 'dawp'); ?></span>
            <strong><?php esc_html_e('Product Guidance', 'dawp'); ?></strong>
            <p><?php esc_html_e('Help choosing proportions, finishes and everyday wear details.', 'dawp'); ?></p>
        </div>
        <div>
            <span><?php esc_html_e('03', 'dawp'); ?></span>
            <strong><?php esc_html_e('Returns Care', 'dawp'); ?></strong>
            <p><?php esc_html_e('Clear assistance for returns, exchanges and gift concerns.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="ot-contact-main" id="contact-form">
    <div class="ot-wrap ot-contact-main__grid">
        <aside class="ot-contact-panel">
            <span class="ot-kicker"><?php esc_html_e('Customer Care', 'dawp'); ?></span>
            <h2><?php esc_html_e('A calm path to the right answer.', 'dawp'); ?></h2>
            <div class="ot-contact-methods">
                <div>
                    <span><?php esc_html_e('Email', 'dawp'); ?></span>
                    <a href="mailto:<?php echo esc_attr(dawp_contact_support_email()); ?>"><?php echo esc_html(dawp_contact_support_email()); ?></a>
                </div>
                <div>
                    <span><?php esc_html_e('Response Window', 'dawp'); ?></span>
                    <p><?php esc_html_e('Within 1-2 business days', 'dawp'); ?></p>
                </div>
                <div>
                    <span><?php esc_html_e('Need Order Details?', 'dawp'); ?></span>
                    <p><?php esc_html_e('Include your order number so we can review it quickly.', 'dawp'); ?></p>
                </div>
            </div>
            <a class="ot-text-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Return to Collection', 'dawp'); ?></a>
        </aside>

        <div class="ot-contact-form-wrap">
            <?php if ($status && isset($status_messages[$status])) : ?>
                <div class="ot-contact-alert ot-contact-alert--<?php echo esc_attr($status); ?>">
                    <?php echo esc_html($status_messages[$status]); ?>
                </div>
            <?php endif; ?>

            <form class="ot-contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="dawp_contact_form">
                <?php wp_nonce_field('dawp_contact_form', 'dawp_contact_nonce'); ?>
                <div class="ot-contact-hidden" aria-hidden="true">
                    <label for="contact-website"><?php esc_html_e('Website', 'dawp'); ?></label>
                    <input id="contact-website" type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="ot-form-row">
                    <label for="contact-name"><?php esc_html_e('Name', 'dawp'); ?></label>
                    <input id="contact-name" type="text" name="contact_name" autocomplete="name" required>
                </div>
                <div class="ot-form-row">
                    <label for="contact-email"><?php esc_html_e('Email', 'dawp'); ?></label>
                    <input id="contact-email" type="email" name="contact_email" autocomplete="email" required>
                </div>
                <div class="ot-form-row">
                    <label for="contact-topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                    <select id="contact-topic" name="contact_topic" required>
                        <option value=""><?php esc_html_e('Select a topic', 'dawp'); ?></option>
                        <option><?php esc_html_e('Order question', 'dawp'); ?></option>
                        <option><?php esc_html_e('Tracking help', 'dawp'); ?></option>
                        <option><?php esc_html_e('Return request', 'dawp'); ?></option>
                        <option><?php esc_html_e('Product or size question', 'dawp'); ?></option>
                        <option><?php esc_html_e('Damaged or incorrect item', 'dawp'); ?></option>
                        <option><?php esc_html_e('Other', 'dawp'); ?></option>
                    </select>
                </div>
                <div class="ot-form-row">
                    <label for="contact-order"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                    <input id="contact-order" type="text" name="contact_order" autocomplete="off">
                </div>
                <div class="ot-form-row ot-form-row--full">
                    <label for="contact-message"><?php esc_html_e('Message', 'dawp'); ?></label>
                    <textarea id="contact-message" name="contact_message" rows="6" required></textarea>
                </div>
                <label class="ot-contact-consent">
                    <input type="checkbox" name="contact_consent" required>
                    <span><?php esc_html_e('I agree to be contacted about this request.', 'dawp'); ?></span>
                </label>
                <button class="ot-btn ot-btn--dark" type="submit"><?php esc_html_e('Submit Request', 'dawp'); ?></button>
            </form>
        </div>
    </div>
</section>

<section class="ot-contact-editorial">
    <div class="ot-wrap ot-contact-editorial__grid">
        <div class="ot-contact-editorial__image">
            <img src="<?php echo esc_url($detail_img); ?>" alt="<?php esc_attr_e('Refined Orvel Time watch materials', 'dawp'); ?>" loading="lazy">
        </div>
        <div class="ot-contact-editorial__copy">
            <span class="ot-kicker"><?php esc_html_e('Before You Write', 'dawp'); ?></span>
            <h2><?php esc_html_e('Small details help us move faster.', 'dawp'); ?></h2>
            <p><?php esc_html_e('For order support, include the order number and email used at checkout. For product guidance, share the model or finish you are considering.', 'dawp'); ?></p>
        </div>
    </div>
</section>
