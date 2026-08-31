<?php
/**
 * Template Part: page-contact
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$asset_base     = trailingslashit(get_template_directory_uri()) . 'assets/images/luxuryimagecollection (3)/';
$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@zorexcraft.com';
$support_mailto = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Zorex Craft support request', 'dawp')) : 'mailto:' . $support_email;
$store_address  = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
$contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$track_url      = home_url('/track-order/');
?>

<section class="zc-contact-hero">
    <div class="zc-wrap zc-contact-hero__grid">
        <div class="zc-contact-hero__copy">
            <span class="zc-kicker"><?php esc_html_e('Contact Zorex Craft', 'dawp'); ?></span>
            <h1><?php esc_html_e('How can we help?', 'dawp'); ?></h1>
            <p><?php esc_html_e('Questions about an order, a watch, tracking or returns? Send a clear note and include your order number when relevant.', 'dawp'); ?></p>
        </div>
        <figure class="zc-contact-hero__media">
            <img src="<?php echo esc_url($asset_base . '48.jpg'); ?>" alt="<?php esc_attr_e('Luxury watch on a clean desk', 'dawp'); ?>">
        </figure>
    </div>
</section>

<section class="zc-contact-strip">
    <div class="zc-wrap zc-contact-strip__grid">
        <div><span><?php esc_html_e('Email', 'dawp'); ?></span><strong><a href="<?php echo esc_url($support_mailto); ?>"><?php echo esc_html($support_email); ?></a></strong></div>
        <div><span><?php esc_html_e('Hours', 'dawp'); ?></span><strong><?php esc_html_e('Mon-Fri, 9:00 AM-6:00 PM PST', 'dawp'); ?></strong></div>
        <div><span><?php esc_html_e('Response', 'dawp'); ?></span><strong><?php esc_html_e('Usually within 1 business day', 'dawp'); ?></strong></div>
        <div><span><?php esc_html_e('Tracking', 'dawp'); ?></span><strong><a href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a></strong></div>
    </div>
</section>

<section class="zc-contact-main" id="contact-form">
    <div class="zc-wrap zc-contact-main__grid">
        <aside class="zc-contact-panel">
            <span class="zc-kicker"><?php esc_html_e('Support Details', 'dawp'); ?></span>
            <h2><?php esc_html_e('Send the details once. We will take it from there.', 'dawp'); ?></h2>
            <div class="zc-contact-methods">
                <div><span><?php esc_html_e('Order Help', 'dawp'); ?></span><p><?php esc_html_e('Include your order number and checkout email for faster review.', 'dawp'); ?></p></div>
                <div><span><?php esc_html_e('Product Questions', 'dawp'); ?></span><p><?php esc_html_e('Ask about sizing, product details, availability or comparison notes before checkout.', 'dawp'); ?></p></div>
                <?php if ($store_address) : ?>
                    <div><span><?php esc_html_e('Store Address', 'dawp'); ?></span><p><?php echo esc_html($store_address); ?></p></div>
                <?php endif; ?>
            </div>
        </aside>

        <div class="zc-contact-form-wrap">
            <?php if ($contact_status) : ?>
                <div class="zc-contact-alert zc-contact-alert--<?php echo esc_attr($contact_status); ?>">
                    <?php
                    if ('sent' === $contact_status) {
                        esc_html_e('Thank you. Your message has been sent.', 'dawp');
                    } elseif ('failed' === $contact_status) {
                        esc_html_e('The message could not be sent. Please email support directly.', 'dawp');
                    } else {
                        esc_html_e('Please check the required fields and try again.', 'dawp');
                    }
                    ?>
                </div>
            <?php endif; ?>

            <form class="zc-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <input type="hidden" name="action" value="dawp_contact_form">
                <?php wp_nonce_field('dawp_contact_form', 'dawp_contact_nonce'); ?>
                <div class="zc-contact-hidden">
                    <label for="zc-contact-website"><?php esc_html_e('Website', 'dawp'); ?></label>
                    <input id="zc-contact-website" type="text" name="website" tabindex="-1" autocomplete="off">
                </div>
                <div class="zc-form-row"><label for="zc-contact-name"><?php esc_html_e('Name', 'dawp'); ?></label><input id="zc-contact-name" type="text" name="contact_name" required autocomplete="name"></div>
                <div class="zc-form-row"><label for="zc-contact-email"><?php esc_html_e('Email', 'dawp'); ?></label><input id="zc-contact-email" type="email" name="contact_email" required autocomplete="email"></div>
                <div class="zc-form-row">
                    <label for="zc-contact-topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
                    <select id="zc-contact-topic" name="contact_topic" required>
                        <option value="Order question"><?php esc_html_e('Order question', 'dawp'); ?></option>
                        <option value="Tracking help"><?php esc_html_e('Tracking help', 'dawp'); ?></option>
                        <option value="Return request"><?php esc_html_e('Return request', 'dawp'); ?></option>
                        <option value="Product or size question"><?php esc_html_e('Product or size question', 'dawp'); ?></option>
                        <option value="Damaged or incorrect item"><?php esc_html_e('Damaged or incorrect item', 'dawp'); ?></option>
                        <option value="Other"><?php esc_html_e('Other', 'dawp'); ?></option>
                    </select>
                </div>
                <div class="zc-form-row"><label for="zc-contact-order"><?php esc_html_e('Order Number', 'dawp'); ?></label><input id="zc-contact-order" type="text" name="contact_order" autocomplete="off"></div>
                <div class="zc-form-row zc-form-row--full"><label for="zc-contact-message"><?php esc_html_e('Message', 'dawp'); ?></label><textarea id="zc-contact-message" name="contact_message" rows="7" required></textarea></div>
                <label class="zc-contact-consent"><input type="checkbox" name="contact_consent" required><span><?php esc_html_e('I agree to be contacted about this request.', 'dawp'); ?></span></label>
                <button class="zc-button zc-button--primary" type="submit"><?php esc_html_e('Send Message', 'dawp'); ?></button>
            </form>
        </div>
    </div>
</section>

<section class="zc-contact-editorial">
    <div class="zc-wrap zc-contact-editorial__grid">
        <figure><img src="<?php echo esc_url($asset_base . '49.jpg'); ?>" alt="<?php esc_attr_e('Collector watch detail', 'dawp'); ?>"></figure>
        <div>
            <span class="zc-kicker"><?php esc_html_e('Before You Write', 'dawp'); ?></span>
            <h2><?php esc_html_e('Need policy details?', 'dawp'); ?></h2>
            <p><?php esc_html_e('For shipping, returns and common order questions, the policy pages may answer the essentials immediately.', 'dawp'); ?></p>
            <div class="zc-actions">
                <a class="zc-button zc-button--secondary" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQ', 'dawp'); ?></a>
                <a class="zc-button zc-button--secondary" href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                <a class="zc-button zc-button--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</section>
