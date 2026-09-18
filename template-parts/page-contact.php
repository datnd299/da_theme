<?php
defined('ABSPATH') || exit;
dawp_clixframe_pages_style();
$status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
?>
<div class="cf-page">
  <section class="cf-hero">
    <div class="container cf-hero__grid">
      <div>
        <div class="cf-eyebrow"><span class="cf-dot"></span>GROWTH INQUIRY</div>
        <h1>START BUILDING YOUR NEXT STAGE OF <em>GROWTH.</em></h1>
        <p class="cf-lead">Tell us what you are trying to improve: acquisition, conversion, operations, retention or the whole customer journey.</p>
        <div class="cf-actions"><a class="btn ghost" href="mailto:<?php echo esc_attr(dawp_clixframe_email()); ?>"><?php echo esc_html(dawp_clixframe_email()); ?></a></div>
      </div>
      <div class="cf-panel" id="contact-form">
        <div class="cf-topline"><b>CONTACT CLIXFRAME</b><span class="cf-status">READY</span></div>
        <?php if ('sent' === $status) : ?><div class="cf-alert">Your inquiry has been sent. We will review it and respond soon.</div><?php endif; ?>
        <?php if (in_array($status, ['invalid', 'failed'], true)) : ?><div class="cf-alert">Please check the required fields and try again.</div><?php endif; ?>
        <form class="cf-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <input type="hidden" name="action" value="dawp_contact_form">
          <?php wp_nonce_field('dawp_contact_form', 'dawp_contact_nonce'); ?>
          <label>Name<input type="text" name="contact_name" required></label>
          <label>Email<input type="email" name="contact_email" required></label>
          <label>Growth focus<select name="contact_topic" required><option>Growth inquiry</option><option>Paid media</option><option>Conversion optimization</option><option>Digital operations</option><option>Partnership</option><option>Other</option></select></label>
          <label class="cf-hidden">Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          <input type="hidden" name="contact_order" value="">
          <label>What should improve?<textarea name="contact_message" required></textarea></label>
          <label><span><input type="checkbox" name="contact_consent" required> I agree to be contacted about this inquiry.</span></label>
          <button class="btn primary" type="submit">Send Inquiry</button>
        </form>
      </div>
    </div>
  </section>
  <section class="cf-section cf-section--paper">
    <div class="container">
      <header class="cf-intro"><div class="cf-eyebrow">WHAT HELPS US MOVE FAST</div><h2>Useful context for a growth conversation.</h2></header>
      <div class="cf-grid">
        <article class="cf-card"><small>OBJECTIVE</small><h3>What outcome matters?</h3><p>Revenue, qualified leads, lower CPA, retention, better customer operations or channel expansion.</p></article>
        <article class="cf-card"><small>CURRENT SYSTEM</small><h3>What is live now?</h3><p>Channels, funnels, CRM, customer care process, analytics and existing performance constraints.</p></article>
        <article class="cf-card"><small>URGENCY</small><h3>Where is the pressure?</h3><p>The part of the journey that needs attention first so the work starts with leverage.</p></article>
      </div>
    </div>
  </section>
</div>
