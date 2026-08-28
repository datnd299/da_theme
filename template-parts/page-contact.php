<?php
/**
 * Template Part: page-contact
 *
 * @package dawp
 */

$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@corvelshop.com';
$contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$store_address  = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
?>

<style>
  .qb-page {
    --qb-blush: #ffb7c5;
    --qb-peach: #ffd6a5;
    --qb-lavender: #d8c7ff;
    --qb-mint: #cff5e7;
    --qb-gold: #d8a94e;
    --qb-plum: #2f1f35;
    --qb-gray: #f7f7fa;
    --qb-text: #4f4355;
    --qb-border: #eadfe8;
    background: #fff;
    color: var(--qb-text);
    font-family: "DM Sans", "Inter", system-ui, sans-serif;
  }

  .qb-page * {
    box-sizing: border-box;
  }

  .qb-page a {
    text-decoration: none;
  }

  .qb-wrap {
    width: min(100% - 32px, 1280px);
    margin-inline: auto;
  }

  .qb-section {
    padding: 72px 0;
  }

  .qb-eyebrow {
    margin: 0 0 12px;
    color: var(--qb-gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .18em;
    text-transform: uppercase;
  }

  .qb-title {
    margin: 0;
    color: var(--qb-plum);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(34px, 4.2vw, 58px);
    line-height: 1.04;
    letter-spacing: 0;
  }

  .qb-copy {
    margin: 18px 0 0;
    max-width: 680px;
    color: var(--qb-text);
    font-size: 17px;
    line-height: 1.75;
  }

  .qb-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    margin-top: 30px;
  }

  .qb-button {
    display: inline-flex;
    min-height: 48px;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--qb-plum);
    border-radius: 999px;
    background: var(--qb-plum);
    color: #fff;
    padding: 0 24px;
    font-size: 14px;
    font-weight: 800;
    transition: .2s ease;
  }

  .qb-button:hover {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: var(--qb-plum);
  }

  .qb-button--secondary {
    background: #fff;
    color: var(--qb-plum);
  }

  .qb-button--secondary:hover {
    border-color: var(--qb-plum);
    background: #fff4f6;
    color: var(--qb-plum);
  }

  .qb-plum .qb-button {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: var(--qb-plum);
  }

  .qb-plum .qb-button:hover {
    border-color: #fff;
    background: #fff;
    color: var(--qb-plum);
  }

  .qb-plum .qb-button--secondary {
    border-color: rgba(255,255,255,.7);
    background: #fff;
    color: var(--qb-plum);
  }

  .qb-hero {
    overflow: hidden;
    background:
      linear-gradient(135deg, rgba(255,183,197,.35), rgba(255,214,165,.38) 48%, rgba(207,245,231,.4)),
      #fff;
  }

  .qb-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.02fr) minmax(320px, .98fr);
    gap: 48px;
    align-items: center;
    padding: 78px 0;
  }

  .qb-contact-panel {
    border: 1px solid rgba(47,31,53,.12);
    border-radius: 24px;
    background: rgba(255,255,255,.78);
    padding: clamp(24px, 4vw, 44px);
    box-shadow: 0 24px 70px rgba(47,31,53,.14);
  }

  .qb-support-list {
    display: grid;
    gap: 14px;
    margin: 26px 0 0;
    padding: 0;
    list-style: none;
  }

  .qb-support-list li,
  .qb-info-card {
    border: 1px solid var(--qb-border);
    border-radius: 18px;
    background: #fff;
    padding: 18px;
  }

  .qb-support-list strong,
  .qb-info-card strong {
    display: block;
    color: var(--qb-plum);
    font-size: 15px;
  }

  .qb-support-list span,
  .qb-info-card span,
  .qb-info-card p {
    display: block;
    margin-top: 7px;
    color: #675a6c;
    font-size: 14px;
    line-height: 1.65;
  }

  .qb-soft {
    background: var(--qb-gray);
  }

  .qb-contact-grid {
    display: grid;
    grid-template-columns: .82fr 1.18fr;
    gap: 34px;
    align-items: start;
  }

  .qb-sidebar {
    position: sticky;
    top: 120px;
    display: grid;
    gap: 16px;
  }

  .qb-dark-card {
    border-radius: 24px;
    background: var(--qb-plum);
    padding: 28px;
    color: #fff;
  }

  .qb-dark-card .qb-eyebrow {
    color: var(--qb-peach);
  }

  .qb-dark-card h2,
  .qb-dark-card strong {
    color: #fff;
  }

  .qb-dark-card p,
  .qb-dark-card span {
    color: rgba(255,255,255,.78);
  }

  .qb-dark-card a {
    color: #fff;
  }

  .qb-form-card {
    border: 1px solid var(--qb-border);
    border-radius: 24px;
    background: #fff;
    padding: clamp(24px, 4vw, 42px);
    box-shadow: 0 16px 44px rgba(47,31,53,.08);
  }

  .qb-form-fallback {
    margin-top: 24px;
    border: 1px solid rgba(216,169,78,.28);
    border-radius: 18px;
    background: #fffaf1;
    padding: 18px;
    color: #675a6c;
    font-size: 14px;
    line-height: 1.65;
  }

  .qb-form-fallback a {
    color: var(--qb-plum);
    font-weight: 800;
  }

  .qb-contact-form {
    margin-top: 28px;
  }

  .qb-contact-form__grid {
    display: grid;
    gap: 16px;
  }

  .qb-contact-form__row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
  }

  .qb-contact-form label {
    display: grid;
    gap: 8px;
    color: var(--qb-plum);
    font-size: 14px;
    font-weight: 800;
  }

  .qb-contact-form input[type="text"],
  .qb-contact-form input[type="email"],
  .qb-contact-form select,
  .qb-contact-form textarea {
    width: 100%;
    min-height: 48px;
    border: 1px solid var(--qb-border);
    border-radius: 14px;
    background: #fff;
    color: var(--qb-text);
    padding: 12px 14px;
    font: inherit;
    outline: none;
  }

  .qb-contact-form select {
    appearance: none;
    background-image: linear-gradient(45deg, transparent 50%, var(--qb-plum) 50%), linear-gradient(135deg, var(--qb-plum) 50%, transparent 50%);
    background-position: calc(100% - 18px) 20px, calc(100% - 12px) 20px;
    background-size: 6px 6px, 6px 6px;
    background-repeat: no-repeat;
    padding-right: 36px;
  }

  .qb-contact-form textarea {
    min-height: 150px;
    resize: vertical;
  }

  .qb-contact-form input:focus,
  .qb-contact-form select:focus,
  .qb-contact-form textarea:focus {
    border-color: var(--qb-gold);
    box-shadow: 0 0 0 3px rgba(216,169,78,.16);
  }

  .qb-contact-form__consent {
    display: flex !important;
    grid-template-columns: none !important;
    align-items: flex-start;
    gap: 10px !important;
    color: #675a6c !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    line-height: 1.55;
  }

  .qb-contact-form__consent input {
    width: 18px;
    height: 18px;
    margin-top: 2px;
    accent-color: var(--qb-plum);
    flex: 0 0 auto;
  }

  .qb-contact-form__hidden {
    position: absolute;
    left: -9999px;
    width: 1px;
    height: 1px;
    overflow: hidden;
  }

  .qb-contact-form button[type="submit"] {
    display: inline-flex;
    min-height: 48px;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--qb-plum);
    border-radius: 999px;
    background: var(--qb-plum);
    color: #fff;
    padding: 0 26px;
    font-size: 14px;
    font-weight: 800;
    cursor: pointer;
    transition: .2s ease;
  }

  .qb-contact-form button[type="submit"]:hover {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: var(--qb-plum);
  }

  .qb-form-message {
    margin-top: 24px;
    border-radius: 16px;
    padding: 14px 16px;
    font-size: 14px;
    font-weight: 700;
    line-height: 1.55;
  }

  .qb-form-message--success {
    border: 1px solid rgba(55, 141, 91, .28);
    background: #f1fbf5;
    color: #27663f;
  }

  .qb-form-message--error {
    border: 1px solid rgba(190, 67, 67, .28);
    background: #fff4f4;
    color: #923030;
  }

  .qb-plum {
    background: var(--qb-plum);
    color: #fff;
  }

  .qb-plum .qb-title,
  .qb-plum .qb-copy {
    color: #fff;
  }

  .qb-policy-strip {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    margin-top: 32px;
  }

  .qb-policy-strip p {
    margin: 0;
    border-radius: 18px;
    background: rgba(255,255,255,.1);
    padding: 18px;
    color: rgba(255,255,255,.78);
    font-size: 14px;
    line-height: 1.65;
  }

  @media (max-width: 780px) {
    .qb-section {
      padding: 56px 0;
    }

    .qb-hero__grid,
    .qb-contact-grid {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .qb-hero__grid {
      padding: 58px 0;
    }

    .qb-sidebar {
      position: static;
    }

    .qb-policy-strip {
      grid-template-columns: 1fr;
    }

    .qb-actions {
      flex-direction: column;
    }

    .qb-contact-form__row {
      grid-template-columns: 1fr;
    }

    .qb-button {
      width: 100%;
    }

    .qb-contact-form button[type="submit"] {
      width: 100%;
    }
  }
</style>

<div class="qb-page qb-contact">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Contact Queen\'s Bracelet', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Support For Your Bracelet Order.', 'dawp'); ?></h1>
        <p class="qb-copy">
          <?php esc_html_e('Questions about an order, bracelet size, material details, shipping, tracking, returns, or product care? Send us a message and our support team will help with clear next steps.', 'dawp'); ?>
        </p>
        <div class="qb-actions">
          <a class="qb-button" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('View FAQ', 'dawp'); ?></a>
        </div>
      </div>

      <div class="qb-contact-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Support Details', 'dawp'); ?></p>
        <ul class="qb-support-list">
          <li>
            <strong><?php esc_html_e('Email', 'dawp'); ?></strong>
            <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
          </li>
          <li>
            <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
            <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></span>
          </li>
          <?php if ($store_address) : ?>
            <li>
              <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_address); ?></span>
            </li>
          <?php endif; ?>
          <li>
            <strong><?php esc_html_e('Primary Market', 'dawp'); ?></strong>
            <span><?php esc_html_e('United States customers shopping bracelet and fashion jewelry styles.', 'dawp'); ?></span>
          </li>
          <li>
            <strong><?php esc_html_e('Best For', 'dawp'); ?></strong>
            <span><?php esc_html_e('Order updates, tracking questions, product details, sizing help, shipping, returns, and policy support.', 'dawp'); ?></span>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-contact-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Before You Send', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Help us review your request faster.', 'dawp'); ?></h2>
          <p class="qb-copy" style="font-size:15px;">
            <?php esc_html_e('For order-related messages, include your order number and the email address used at checkout whenever possible.', 'dawp'); ?>
          </p>
        </div>

        <div class="qb-info-card">
          <strong><?php esc_html_e('Tracking Questions', 'dawp'); ?></strong>
          <p><?php esc_html_e('Tracking information is sent after an order ships. Please allow time for the carrier page to update after the tracking number is created.', 'dawp'); ?></p>
        </div>

        <div class="qb-info-card">
          <strong><?php esc_html_e('Return Requests', 'dawp'); ?></strong>
          <p><?php esc_html_e('Customers may request eligible returns by mail within 30 days from the delivery date. Contact support first before sending any item back.', 'dawp'); ?></p>
        </div>

        <div class="qb-info-card">
          <strong><?php esc_html_e('Damaged or Incorrect Items', 'dawp'); ?></strong>
          <p><?php esc_html_e('Include your order number and clear photos of the item, packaging, and issue so our support team can review the case.', 'dawp'); ?></p>
        </div>
      </aside>

      <div class="qb-form-card">
        <p class="qb-eyebrow"><?php esc_html_e('Send A Message', 'dawp'); ?></p>
        <h2 class="qb-title"><?php esc_html_e('Tell us what you need.', 'dawp'); ?></h2>
        <p class="qb-copy">
          <?php esc_html_e('Our support team can help with bracelet product details, size guidance, care instructions, shipping timelines, tracking, return eligibility, and order questions.', 'dawp'); ?>
        </p>

        <?php if ('sent' === $contact_status) : ?>
          <div class="qb-form-message qb-form-message--success" role="status">
            <?php esc_html_e('Thanks, your message has been sent. Our support team will reply during Customer Service Hours: Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?>
          </div>
        <?php elseif ('invalid' === $contact_status) : ?>
          <div class="qb-form-message qb-form-message--error" role="alert">
            <?php esc_html_e('Please check the required fields and submit the form again.', 'dawp'); ?>
          </div>
        <?php elseif ('failed' === $contact_status) : ?>
          <div class="qb-form-message qb-form-message--error" role="alert">
            <?php esc_html_e('We could not send the message right now. Please email support directly using the address below.', 'dawp'); ?>
          </div>
        <?php endif; ?>

        <form id="contact-form" class="qb-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <input type="hidden" name="action" value="dawp_contact_form">
          <?php wp_nonce_field('dawp_contact_form', 'dawp_contact_nonce'); ?>

          <div class="qb-contact-form__grid">
            <div class="qb-contact-form__row">
              <label for="contact_name">
                <?php esc_html_e('Your name', 'dawp'); ?>
                <input id="contact_name" name="contact_name" type="text" autocomplete="name" required>
              </label>

              <label for="contact_email">
                <?php esc_html_e('Email address', 'dawp'); ?>
                <input id="contact_email" name="contact_email" type="email" autocomplete="email" required>
              </label>
            </div>

            <div class="qb-contact-form__row">
              <label for="contact_topic">
                <?php esc_html_e('What can we help with?', 'dawp'); ?>
                <select id="contact_topic" name="contact_topic" required>
                  <option value=""><?php esc_html_e('Select a topic', 'dawp'); ?></option>
                  <option value="Order question"><?php esc_html_e('Order question', 'dawp'); ?></option>
                  <option value="Tracking help"><?php esc_html_e('Tracking help', 'dawp'); ?></option>
                  <option value="Return request"><?php esc_html_e('Return request', 'dawp'); ?></option>
                  <option value="Product or size question"><?php esc_html_e('Product or size question', 'dawp'); ?></option>
                  <option value="Damaged or incorrect item"><?php esc_html_e('Damaged or incorrect item', 'dawp'); ?></option>
                  <option value="Other"><?php esc_html_e('Other', 'dawp'); ?></option>
                </select>
              </label>

              <label for="contact_order">
                <?php esc_html_e('Order number', 'dawp'); ?>
                <input id="contact_order" name="contact_order" type="text" autocomplete="off" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
              </label>
            </div>

            <label for="contact_message">
              <?php esc_html_e('Message', 'dawp'); ?>
              <textarea id="contact_message" name="contact_message" required placeholder="<?php esc_attr_e('Tell us what happened and include any details that can help us review your request.', 'dawp'); ?>"></textarea>
            </label>

            <label class="qb-contact-form__consent" for="contact_consent">
              <input id="contact_consent" name="contact_consent" type="checkbox" required>
              <span><?php esc_html_e('I agree that Queen\'s Bracelet may use this information to respond to my support request.', 'dawp'); ?></span>
            </label>

            <label class="qb-contact-form__hidden" for="website">
              <?php esc_html_e('Website', 'dawp'); ?>
              <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
            </label>

            <div>
              <button type="submit"><?php esc_html_e('Send Message', 'dawp'); ?></button>
            </div>
          </div>
        </form>

        <div class="qb-form-fallback">
          <?php esc_html_e('If the contact form is unavailable, email us directly at', 'dawp'); ?>
          <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>.
          <?php esc_html_e('Customer Service Hours: Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-plum">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Clear expectations from checkout to delivery.', 'dawp'); ?></h2>
      <p class="qb-copy">
        <?php esc_html_e('Please review product material notes, bracelet length or adjustable sizing, clasp information where available, care instructions, shipping timelines, and return requirements before ordering.', 'dawp'); ?>
      </p>

      <div class="qb-policy-strip">
        <p><?php esc_html_e('Order cutoff is 5:00 PM Pacific Standard Time. Handling takes 1-3 business days, with fulfillment Monday-Friday excluding public holidays.', 'dawp'); ?></p>
        <p><?php esc_html_e('Standard U.S. shipping is free unless checkout shows otherwise, with 5-7 business day transit and usually 6-10 business days estimated delivery.', 'dawp'); ?></p>
        <p><?php esc_html_e('Returns are by mail within 30 days from delivery date after contacting support first. No restocking fee applies, and refunds are processed within 7 days after inspection approval.', 'dawp'); ?></p>
      </div>

      <div class="qb-actions">
        <a class="qb-button" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Shop Bracelets', 'dawp'); ?></a>
        <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Queen\'s Bracelet', 'dawp'); ?></a>
      </div>
    </div>
  </section>
</div>
