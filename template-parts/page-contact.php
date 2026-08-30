<?php
/**
 * Template Part: page-contact
 *
 * @package dawp
 */

$store_name    = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Velmo Custom';
$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@velmocustom.com';
$support_mailto = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Velmo Custom support request', 'dawp'), __('Please include your order number if this is about an existing order.', 'dawp')) : 'mailto:' . $support_email;
$store_address = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
$track_url     = home_url('/track-order/');
$faq_url       = home_url('/faq/');
$hero_image    = get_template_directory_uri() . '/assets/images/luxuryimagecollection (2)/35.jpg';
$detail_image  = get_template_directory_uri() . '/assets/images/luxuryimagecollection (2)/36.jpg';
$status        = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

$status_messages = [
    'sent'    => __('Thank you. Your message has been sent and our support team will reply within 1 business day.', 'dawp'),
    'invalid' => __('Please review the form and make sure all required fields are complete.', 'dawp'),
    'failed'  => __('We could not send your message right now. Please email support directly.', 'dawp'),
];

$topics = [
    'Order question',
    'Tracking help',
    'Return request',
    'Product or size question',
    'Damaged or incorrect item',
    'Other',
];
?>

<section class="ot-contact-hero">
  <div class="ot-wrap ot-contact-hero__grid">
    <div class="ot-contact-hero__copy">
      <span class="ot-kicker"><?php esc_html_e('Contact Us', 'dawp'); ?></span>
      <h1><?php esc_html_e('We are here to help.', 'dawp'); ?></h1>
      <p><?php echo esc_html(sprintf(__('Questions about an order, delivery, return, or watch detail? Send a note to %s support and we will route it to the right place.', 'dawp'), $store_name)); ?></p>
      <div class="ot-actions">
        <a class="ot-btn ot-btn--dark" href="#contact-form"><?php esc_html_e('Send Message', 'dawp'); ?></a>
        <a class="ot-btn ot-btn--ghost" href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
      </div>
    </div>
    <figure class="ot-contact-hero__image">
      <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Minimal watch detail on a clean surface', 'dawp'); ?>" loading="eager">
    </figure>
  </div>
</section>

<section class="ot-contact-assurance" aria-label="<?php esc_attr_e('Customer support highlights', 'dawp'); ?>">
  <div class="ot-wrap ot-contact-assurance__grid">
    <div>
      <span><?php esc_html_e('Response', 'dawp'); ?></span>
      <strong><?php esc_html_e('Within 1 business day', 'dawp'); ?></strong>
      <p><?php esc_html_e('Most messages are answered Monday-Friday during customer service hours.', 'dawp'); ?></p>
    </div>
    <div>
      <span><?php esc_html_e('Orders', 'dawp'); ?></span>
      <strong><?php esc_html_e('Include your order number', 'dawp'); ?></strong>
      <p><?php esc_html_e('It helps us check shipping, delivery, returns, and account details faster.', 'dawp'); ?></p>
    </div>
    <div>
      <span><?php esc_html_e('Support', 'dawp'); ?></span>
      <strong><?php esc_html_e('Clear next steps', 'dawp'); ?></strong>
      <p><?php esc_html_e('We will confirm what we need and explain the next action plainly.', 'dawp'); ?></p>
    </div>
  </div>
</section>

<section class="ot-contact-main" id="contact-form">
  <div class="ot-wrap ot-contact-main__grid">
    <aside class="ot-contact-panel">
      <span class="ot-kicker"><?php esc_html_e('Support Details', 'dawp'); ?></span>
      <h2><?php esc_html_e('Tell us what happened. We will take it from there.', 'dawp'); ?></h2>
      <div class="ot-contact-methods">
        <div>
          <span><?php esc_html_e('Email', 'dawp'); ?></span>
          <a href="<?php echo esc_url($support_mailto); ?>"><?php echo esc_html($support_email); ?></a>
        </div>
        <div>
          <span><?php esc_html_e('Hours', 'dawp'); ?></span>
          <p><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?></p>
        </div>
        <?php if ($store_address) : ?>
          <div>
            <span><?php esc_html_e('Address', 'dawp'); ?></span>
            <p><?php echo esc_html($store_address); ?></p>
          </div>
        <?php endif; ?>
      </div>
      <a class="ot-text-link" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('Read FAQ', 'dawp'); ?></a>
    </aside>

    <div class="ot-contact-form-wrap">
      <?php if ($status && isset($status_messages[$status])) : ?>
        <div class="ot-contact-alert ot-contact-alert--<?php echo esc_attr($status); ?>" role="status">
          <?php echo esc_html($status_messages[$status]); ?>
        </div>
      <?php endif; ?>

      <form class="ot-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
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
            <?php foreach ($topics as $topic) : ?>
              <option value="<?php echo esc_attr($topic); ?>"><?php echo esc_html($topic); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="ot-form-row">
          <label for="contact-order"><?php esc_html_e('Order Number', 'dawp'); ?></label>
          <input id="contact-order" type="text" name="contact_order" autocomplete="off" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
        </div>
        <div class="ot-form-row ot-form-row--full">
          <label for="contact-message"><?php esc_html_e('Message', 'dawp'); ?></label>
          <textarea id="contact-message" name="contact_message" rows="6" required></textarea>
        </div>
        <label class="ot-contact-consent">
          <input type="checkbox" name="contact_consent" value="1" required>
          <span><?php esc_html_e('I agree to be contacted about this request using the information provided.', 'dawp'); ?></span>
        </label>
        <button class="ot-btn ot-btn--dark" type="submit"><?php esc_html_e('Submit Request', 'dawp'); ?></button>
      </form>
    </div>
  </div>
</section>

<section class="ot-contact-editorial">
  <div class="ot-wrap ot-contact-editorial__grid">
    <figure class="ot-contact-editorial__image">
      <img src="<?php echo esc_url($detail_image); ?>" alt="<?php esc_attr_e('Watch packaging prepared for customer delivery', 'dawp'); ?>" loading="lazy">
    </figure>
    <div class="ot-contact-editorial__copy">
      <span class="ot-kicker"><?php esc_html_e('Before You Send', 'dawp'); ?></span>
      <h2><?php esc_html_e('A few details help us move faster.', 'dawp'); ?></h2>
      <p><?php esc_html_e('For delivery, damage, or return requests, include your order number, checkout email, and any helpful photos or tracking details in your message.', 'dawp'); ?></p>
    </div>
  </div>
</section>
