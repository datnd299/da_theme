<?php
/**
 * Hartwell Mart contact form (no plugin). Sends with wp_mail to support@hartwellmart.com,
 * Reply-To = customer. Protection: nonce, sanitization, honeypot, per-IP transient rate limit.
 */
defined('ABSPATH') || exit;

const HM_CONTACT_TO = 'support@hartwellmart.com';
function hm_contact_topics() {
    return ['' => 'Select a topic', 'order' => 'Order or tracking question', 'return' => 'Return or refund request', 'product' => 'Product question', 'privacy' => 'Privacy request', 'general' => 'General support'];
}
function hm_contact_state($set = null) { static $s = ['status' => '', 'errors' => [], 'values' => []]; if ($set !== null) $s = $set; return $s; }
function hm_contact_log($msg) { if (function_exists('wc_get_logger')) wc_get_logger()->info($msg, ['source' => 'hm-contact']); error_log('[hm-contact] ' . $msg); }

add_action('template_redirect', function () {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['hm_contact'])) return;
    $v = [
        'name'    => sanitize_text_field(wp_unslash($_POST['hm_name'] ?? '')),
        'email'   => sanitize_email(wp_unslash($_POST['hm_email'] ?? '')),
        'order'   => sanitize_text_field(wp_unslash($_POST['hm_order'] ?? '')),
        'topic'   => sanitize_key(wp_unslash($_POST['hm_topic'] ?? '')),
        'message' => sanitize_textarea_field(wp_unslash($_POST['hm_message'] ?? '')),
    ];
    $errors = [];
    if (!isset($_POST['hm_contact_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hm_contact_nonce'])), 'hm_contact')) $errors[] = 'Your session expired. Please reload the page and try again.';
    // Honeypot: real people never fill this hidden field. Pretend success so bots learn nothing.
    if (!empty($_POST['hm_website'])) { hm_contact_log('honeypot hit, discarded'); wp_safe_redirect(add_query_arg('hm_contact', 'sent', get_permalink()) . '#hm-contact'); exit; }
    $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : '0';
    $rk = 'hm_contact_rl_' . md5($ip);
    $count = (int) get_transient($rk);
    if ($count >= 3) $errors[] = 'You have sent several messages in a short time. Please wait 10 minutes, or email us directly.';
    if (mb_strlen($v['name']) < 2) $errors[] = 'Please enter your full name.';
    if (!is_email($v['email'])) $errors[] = 'Please enter a valid email address.';
    if (!array_key_exists($v['topic'], hm_contact_topics()) || $v['topic'] === '') $errors[] = 'Please select a topic.';
    if (mb_strlen($v['message']) < 10) $errors[] = 'Please enter a message (at least 10 characters).';
    if (mb_strlen($v['message']) > 5000) $errors[] = 'Please keep your message under 5,000 characters.';
    if (preg_match('/\b(?:\d[ -]?){13,19}\b/', $v['message'])) $errors[] = 'Your message looks like it contains a card number. Please remove it; we never need your card number by email.';
    if ($errors) { hm_contact_state(['status' => 'error', 'errors' => $errors, 'values' => $v]); hm_contact_log('validation failed: ' . count($errors) . ' error(s)'); return; }

    set_transient($rk, $count + 1, 10 * MINUTE_IN_SECONDS);
    $topics = hm_contact_topics();
    $subject = '[Hartwell Mart contact] ' . $topics[$v['topic']] . ($v['order'] ? ' · Order ' . $v['order'] : '');
    $body = "Name: {$v['name']}\nEmail: {$v['email']}\nOrder number: " . ($v['order'] ?: '-') . "\nTopic: {$topics[$v['topic']]}\n\n{$v['message']}\n\n--\nSent from " . home_url('/contact/') . ' on ' . wp_date('Y-m-d H:i T');
    $headers = ['Content-Type: text/plain; charset=UTF-8', 'From: Hartwell Mart <' . HM_CONTACT_TO . '>', 'Reply-To: ' . str_replace(["\r", "\n"], '', $v['name']) . ' <' . $v['email'] . '>'];
    $fail = '';
    $cb = function ($e) use (&$fail) { $fail = $e->get_error_message(); };
    add_action('wp_mail_failed', $cb);
    $ok = wp_mail(HM_CONTACT_TO, $subject, $body, $headers);
    remove_action('wp_mail_failed', $cb);
    hm_contact_log('wp_mail to ' . HM_CONTACT_TO . ' topic=' . $v['topic'] . ' result=' . ($ok ? 'true' : 'false') . ($fail ? ' error=' . $fail : ''));
    if ($ok) { wp_safe_redirect(add_query_arg('hm_contact', 'sent', get_permalink()) . '#hm-contact'); exit; }
    hm_contact_state(['status' => 'error', 'values' => $v, 'errors' => ['Sorry, your message could not be sent right now. Please email support@hartwellmart.com or call (984) 258-0710.']]);
});

function hm_contact_form() {
    $s = hm_contact_state(); $v = $s['values'];
    $f = function ($k) use ($v) { return esc_attr($v[$k] ?? ''); };
    ob_start(); ?>
<form class="hm-panel hm-contact" id="hm-contact" method="post" action="<?php echo esc_url(get_permalink()); ?>#hm-contact" novalidate>
<h2>Send us a message</h2>
<?php if (isset($_GET['hm_contact']) && $_GET['hm_contact'] === 'sent' && $s['status'] !== 'error') : ?>
<div class="hm-alert hm-alert--ok" role="status"><strong>Thanks, your message is on its way.</strong> We reply by email within 1 business day (Monday - Friday, 10:00 AM - 5:00 PM).</div>
<?php endif; if ($s['status'] === 'error') : ?>
<div class="hm-alert hm-alert--err" role="alert"><strong>Please check the form:</strong><ul><?php foreach ($s['errors'] as $e) echo '<li>' . esc_html($e) . '</li>'; ?></ul></div>
<?php endif; ?>
<div class="hm-form">
<div class="hm-field"><label for="hm_name">Full name *</label><input id="hm_name" name="hm_name" type="text" autocomplete="name" required maxlength="120" value="<?php echo $f('name'); ?>"></div>
<div class="hm-field"><label for="hm_email">Email *</label><input id="hm_email" name="hm_email" type="email" autocomplete="email" required maxlength="190" value="<?php echo $f('email'); ?>"></div>
<div class="hm-field"><label for="hm_order">Order number (optional)</label><input id="hm_order" name="hm_order" type="text" maxlength="40" value="<?php echo $f('order'); ?>"></div>
<div class="hm-field"><label for="hm_topic">Topic *</label><select id="hm_topic" name="hm_topic" required><?php foreach (hm_contact_topics() as $k => $t) echo '<option value="' . esc_attr($k) . '"' . selected($v['topic'] ?? '', $k, false) . ($k === '' ? ' disabled' . (empty($v['topic']) ? ' selected' : '') : '') . '>' . esc_html($t) . '</option>'; ?></select></div>
<div class="hm-field hm-full"><label for="hm_message">Message *</label><textarea id="hm_message" name="hm_message" rows="6" required maxlength="5000"><?php echo esc_textarea($v['message'] ?? ''); ?></textarea></div>
<div class="hm-hp" aria-hidden="true"><label for="hm_website">Leave this field empty</label><input id="hm_website" name="hm_website" type="text" tabindex="-1" autocomplete="off"></div>
</div>
<p class="hm-contact__note"><small>Please don’t include card numbers or other payment details in your message. We will never ask for them by email. See our <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a>.</small></p>
<?php wp_nonce_field('hm_contact', 'hm_contact_nonce'); ?><input type="hidden" name="hm_contact" value="1">
<button class="hm-btn hm-btn--brick" type="submit">Send message</button>
</form>
<?php return ob_get_clean();
}
