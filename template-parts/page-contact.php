<?php
/**
 * Handed Shoes — Contact Us Page + Working WordPress Contact Form
 *
 * IMPORTANT:
 * - The HTML page section can be used in your Contact page template.
 * - The form submits to admin-post.php using action="handedshoes_contact_submit".
 * - For the form to work, place the handler block below in functions.php or a small custom plugin.
 */

/* =========================================================
 * CONTACT FORM HANDLER — place in functions.php or plugin
 * ========================================================= */
if (!function_exists('handedshoes_contact_form_handler')) {
    function handedshoes_contact_form_handler() {
        if (!isset($_POST['handedshoes_contact_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['handedshoes_contact_nonce'])), 'handedshoes_contact_form')) {
            wp_safe_redirect(home_url('/contact-us/?contact_status=invalid'));
            exit;
        }

        // Honeypot spam check.
        if (!empty($_POST['website'])) {
            wp_safe_redirect(home_url('/contact-us/?contact_status=success'));
            exit;
        }

        $name        = isset($_POST['customer_name']) ? sanitize_text_field(wp_unslash($_POST['customer_name'])) : '';
        $email       = isset($_POST['customer_email']) ? sanitize_email(wp_unslash($_POST['customer_email'])) : '';
        $subject     = isset($_POST['contact_subject']) ? sanitize_text_field(wp_unslash($_POST['contact_subject'])) : '';
        $order       = isset($_POST['order_number']) ? sanitize_text_field(wp_unslash($_POST['order_number'])) : '';
        $message     = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
        $consent     = isset($_POST['contact_consent']) ? sanitize_text_field(wp_unslash($_POST['contact_consent'])) : '';

        if (empty($name) || empty($email) || empty($subject) || empty($message) || empty($consent) || !is_email($email)) {
            wp_safe_redirect(home_url('/contact-us/?contact_status=error'));
            exit;
        }

        $to           = 'support@handedshoes.com';
        $mail_subject = 'New Contact Request — Handed Shoes: ' . $subject;
        $body         = "New contact request from Handed Shoes website:\n\n";
        $body        .= "Name: {$name}\n";
        $body        .= "Email: {$email}\n";
        $body        .= "Subject: {$subject}\n";
        $body        .= "Order Number: " . ($order ? $order : 'Not provided') . "\n\n";
        $body        .= "Message:\n{$message}\n\n";
        $body        .= "Submitted from: " . home_url('/contact-us/') . "\n";

        $headers = [
            'Content-Type: text/plain; charset=UTF-8',
            'Reply-To: ' . $name . ' <' . $email . '>',
        ];

        $sent = wp_mail($to, $mail_subject, $body, $headers);

        if ($sent) {
            wp_safe_redirect(home_url('/contact-us/?contact_status=success'));
        } else {
            wp_safe_redirect(home_url('/contact-us/?contact_status=error'));
        }
        exit;
    }
}

add_action('admin_post_handedshoes_contact_submit', 'handedshoes_contact_form_handler');
add_action('admin_post_nopriv_handedshoes_contact_submit', 'handedshoes_contact_form_handler');
?>

<!-- Handed Shoes — Contact Us Page HTML -->
<main class="bg-[#F4F5F6] text-[#0B0B0D]">
  <!-- ================= CONTACT FORM + INFO ================= -->
  <section class="bg-[#F4F5F6] py-16 sm:py-20 lg:py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <!-- Contact Info -->
      <aside class="space-y-5">
        <div>
          <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Customer Support</p>
          <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
            Clear help before and after your order.
          </h2>
          <p class="mt-5 text-base leading-8 text-[#5B5D63]/72">
            Please include your order number if your message is about an existing purchase. For footwear questions, mention the product name, size, color, and the issue you need help with.
          </p>
        </div>

        <div class="rounded-3xl border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#5B5D63]">Email</p>
          <a href="mailto:support@handedshoes.com" class="mt-2 inline-flex text-lg font-bold text-[#0B0B0D] hover:text-[#0B0B0D]">support@handedshoes.com</a>
        </div>

        <div class="rounded-3xl border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#5B5D63]">Address</p>
          <p class="mt-2 text-sm leading-7 text-[#5B5D63]/72"><?php echo esc_html(function_exists('dawp_get_store_address') ? dawp_get_store_address() : ''); ?></p>
        </div>

        <div class="rounded-3xl border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#5B5D63]">Business Hours</p>
          <p class="mt-2 text-sm leading-7 text-[#5B5D63]/72">Monday – Friday, 9:00 AM – 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)</p>
        </div>

        <div class="rounded-3xl border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#5B5D63]">Response Time</p>
          <p class="mt-2 text-sm leading-7 text-[#5B5D63]/72">We aim to reply within 1 business day.</p>
        </div>

        <div class="rounded-3xl border border-[#5B5D63]/10 bg-[#0B0B0D] p-6 text-white shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#5B5D63]">Helpful Links</p>
          <div class="mt-5 grid gap-3">
            <a href="/track-order/" class="text-sm font-bold text-white/85 hover:text-[#5B5D63]">Track Order →</a>
            <a href="/shipping-policy/" class="text-sm font-bold text-white/85 hover:text-[#5B5D63]">Shipping Policy →</a>
            <a href="/refund-return-policy/" class="text-sm font-bold text-white/85 hover:text-[#5B5D63]">Return & Refund Policy →</a>
            <a href="/faq/" class="text-sm font-bold text-white/85 hover:text-[#5B5D63]">FAQs →</a>
          </div>
        </div>
      </aside>

      <!-- Contact Form -->
      <div class="rounded-[2rem] border border-[#5B5D63]/10 bg-white p-6 shadow-2xl shadow-[#5B5D63]/10 sm:p-8 lg:p-10">
        <?php if (isset($_GET['contact_status'])) : ?>
          <?php if ($_GET['contact_status'] === 'success') : ?>
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-sm font-semibold text-green-800">
              Thank you. Your message has been sent successfully. Our support team will reply as soon as possible.
            </div>
          <?php elseif ($_GET['contact_status'] === 'invalid') : ?>
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm font-semibold text-red-800">
              Security verification failed. Please refresh the page and try again.
            </div>
          <?php else : ?>
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm font-semibold text-red-800">
              We could not send your message. Please check all required fields or email us directly.
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Send A Message</p>
        <h2 class="mt-3 font-serif text-4xl font-semibold text-[#0B0B0D]">How can we help?</h2>
        <p class="mt-4 text-sm leading-7 text-[#5B5D63]/70">
          Fill out the form below. Fields marked with an asterisk are required.
        </p>

        <form class="mt-8 grid gap-5" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <input type="hidden" name="action" value="handedshoes_contact_submit" />
          <?php wp_nonce_field('handedshoes_contact_form', 'handedshoes_contact_nonce'); ?>

          <!-- Honeypot field: hidden from users -->
          <div class="hidden" aria-hidden="true">
            <label for="website">Website</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off" />
          </div>

          <div class="grid gap-5 sm:grid-cols-2">
            <div>
              <label for="customer_name" class="mb-2 block text-sm font-bold text-[#0B0B0D]">Full Name *</label>
              <input id="customer_name" name="customer_name" type="text" required autocomplete="name" class="min-h-12 w-full rounded-2xl border border-[#5B5D63]/15 bg-[#F4F5F6] px-4 text-sm text-[#0B0B0D] outline-none transition placeholder:text-[#5B5D63]/40 focus:border-[#0B0B0D] focus:bg-white" placeholder="Your name" />
            </div>
            <div>
              <label for="customer_email" class="mb-2 block text-sm font-bold text-[#0B0B0D]">Email Address *</label>
              <input id="customer_email" name="customer_email" type="email" required autocomplete="email" class="min-h-12 w-full rounded-2xl border border-[#5B5D63]/15 bg-[#F4F5F6] px-4 text-sm text-[#0B0B0D] outline-none transition placeholder:text-[#5B5D63]/40 focus:border-[#0B0B0D] focus:bg-white" placeholder="you@example.com" />
            </div>
          </div>

          <div class="grid gap-5 sm:grid-cols-2">
            <div>
              <label for="contact_subject" class="mb-2 block text-sm font-bold text-[#0B0B0D]">Subject *</label>
              <select id="contact_subject" name="contact_subject" required class="min-h-12 w-full rounded-2xl border border-[#5B5D63]/15 bg-[#F4F5F6] px-4 text-sm text-[#0B0B0D] outline-none transition focus:border-[#0B0B0D] focus:bg-white">
                <option value="">Select a topic</option>
                <option value="Order Support">Order Support</option>
                <option value="Shipping Question">Shipping Question</option>
                <option value="Return Or Refund">Return Or Refund</option>
                <option value="Size Or Fit Help">Size Or Fit Help</option>
                <option value="Product Question">Product Question</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div>
              <label for="order_number" class="mb-2 block text-sm font-bold text-[#0B0B0D]">Order Number</label>
              <input id="order_number" name="order_number" type="text" class="min-h-12 w-full rounded-2xl border border-[#5B5D63]/15 bg-[#F4F5F6] px-4 text-sm text-[#0B0B0D] outline-none transition placeholder:text-[#5B5D63]/40 focus:border-[#0B0B0D] focus:bg-white" placeholder="Optional" />
            </div>
          </div>

          <div>
            <label for="message" class="mb-2 block text-sm font-bold text-[#0B0B0D]">Message *</label>
            <textarea id="message" name="message" required rows="7" class="w-full rounded-2xl border border-[#5B5D63]/15 bg-[#F4F5F6] px-4 py-3 text-sm text-[#0B0B0D] outline-none transition placeholder:text-[#5B5D63]/40 focus:border-[#0B0B0D] focus:bg-white" placeholder="Tell us how we can help. For order questions, include product name, size, color, and any useful details."></textarea>
          </div>

          <label class="flex gap-3 rounded-2xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-4 text-sm leading-6 text-[#5B5D63]/75">
            <input type="checkbox" name="contact_consent" value="yes" required class="mt-1 h-4 w-4 rounded border-[#5B5D63]/25 text-[#0B0B0D]" />
            <span>I confirm that the information provided is accurate and agree to be contacted by Handed Shoes regarding this request.</span>
          </label>

          <button type="submit" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-8 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#2F3033]">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- ================= SUPPORT TOPICS ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Support Topics</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Common questions we can help with.
        </h2>
      </div>

      <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Size & Fit</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/70">Ask about fit notes and shoe style differences before ordering.</p>
        </article>
        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Shipping</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/70">Get help with tracking, delivery timelines, multiple packages, or delivery issues.</p>
        </article>
        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Returns</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/70">Review return eligibility, footwear condition rules, and refund steps.</p>
        </article>
        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Product Details</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/70">Ask about shoe type, closure, material or finish, care instructions, and styling use.</p>
        </article>
      </div>
    </div>
  </section>
</main>

