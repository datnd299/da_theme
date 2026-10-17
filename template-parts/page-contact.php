<?php
/**
 * Contact Us — MozTire. Form handled by dawp_contact (inc/newsletter.php) via assets/js/main.js;
 * ALTCHA captcha served by altcha.moztire.com and verified server-side.
 */
$f = dawp_store_facts();
$address = dawp_get_woocommerce_store_address();

dawp_page_hero([
    'title'   => 'Talk to a tire specialist',
    'eyebrow' => 'Contact MozTire',
    'lead'    => 'Questions about sizing, an order, shipping or a return? Send us a message and we&rsquo;ll reply ' . esc_html($f['response_time']) . '.',
    'crumb'   => 'Contact Us',
]);

$field = 'h-12 w-full rounded-md border-[1.5px] border-border bg-background px-4 text-foreground outline-none focus:border-accent focus:ring-3 focus:ring-accent-soft';
?>

<section class="bg-surface py-12 md:py-16">
    <div class="mz-container grid gap-6 lg:grid-cols-[1fr_380px]">
        <div class="rounded-lg border border-border bg-background p-6 md:p-8">
            <h2 class="mt-0 mb-1 font-heading text-2xl font-black">Send a message</h2>
            <p class="mt-0 mb-6 text-foreground-muted">For fitment help, include your vehicle (year, make, model, trim) and the size on your current tires.</p>

            <form id="contact-form" class="grid gap-4 sm:grid-cols-2" novalidate>
                <div class="grid gap-1">
                    <label for="contact-name" class="text-sm font-bold">Full name *</label>
                    <input id="contact-name" name="name" type="text" required autocomplete="name" class="<?php echo esc_attr($field); ?>">
                </div>
                <div class="grid gap-1">
                    <label for="contact-email" class="text-sm font-bold">Email *</label>
                    <input id="contact-email" name="email" type="email" required autocomplete="email" class="<?php echo esc_attr($field); ?>">
                </div>
                <div class="grid gap-1 sm:col-span-2">
                    <label for="contact-subject" class="text-sm font-bold">Topic</label>
                    <select id="contact-subject" name="subject" class="<?php echo esc_attr($field); ?>">
                        <option value="fitment">Tire size / fitment help</option>
                        <option value="order">Order status</option>
                        <option value="shipping">Shipping question</option>
                        <option value="return">Returns &amp; refunds</option>
                        <option value="product">Product question</option>
                        <option value="other">Something else</option>
                    </select>
                </div>
                <div class="grid gap-1 sm:col-span-2">
                    <label for="contact-message" class="text-sm font-bold">Message *</label>
                    <textarea id="contact-message" name="message" rows="6" required placeholder="e.g. 2019 Toyota RAV4 XLE, current tires 225/65R17. Looking for a quiet all-season tire." class="<?php echo esc_attr($field); ?> h-auto py-3"></textarea>
                </div>
                <div class="hidden" aria-hidden="true">
                    <label for="contact-company-website">Company website</label>
                    <input id="contact-company-website" name="company_website" type="text" tabindex="-1" autocomplete="off">
                </div>
                <div class="mz-contact-captcha sm:col-span-2">
                    <altcha-widget challenge="<?php echo esc_url(dawp_altcha_base_url() . '/challenge'); ?>" name="altcha"></altcha-widget>
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="mz-btn mz-btn--primary w-full sm:w-auto">Send Message</button>
                    <p id="contact-msg" class="mt-3 mb-0 hidden text-sm font-semibold" role="status"></p>
                </div>
            </form>
            <script type="module" src="<?php echo esc_url(dawp_altcha_base_url() . '/altcha.min.js'); ?>" async></script>
        </div>

        <aside class="grid content-start gap-4">
            <div class="rounded-lg bg-ink p-6 text-white">
                <h2 class="mt-0 mb-4 font-heading text-xl font-black">Customer support</h2>
                <dl class="m-0 grid gap-4 text-sm">
                    <div>
                        <dt class="font-bold text-accent-blush">Email</dt>
                        <dd class="m-0"><a class="underline underline-offset-4" href="mailto:<?php echo esc_attr($f['email']); ?>"><?php echo esc_html($f['email']); ?></a></dd>
                    </div>
                    <div>
                        <dt class="font-bold text-accent-blush">Hours</dt>
                        <dd class="m-0 text-white/80"><?php echo esc_html($f['hours']); ?></dd>
                    </div>
                    <div>
                        <dt class="font-bold text-accent-blush">Response time</dt>
                        <dd class="m-0 text-white/80">We reply <?php echo esc_html($f['response_time']); ?>.</dd>
                    </div>
                    <?php if ($address) : ?>
                        <div>
                            <dt class="font-bold text-accent-blush">Business address</dt>
                            <dd class="m-0 text-white/80"><?php echo esc_html($address); ?></dd>
                        </div>
                    <?php endif; ?>
                </dl>
            </div>
            <div class="rounded-lg border border-border bg-background p-6">
                <h2 class="mt-0 mb-3 font-heading text-lg font-black">Quick answers</h2>
                <ul class="m-0 grid list-none gap-1 p-0">
                    <li><a class="flex min-h-10 items-center justify-between font-semibold hover:text-accent" href="<?php echo esc_url(home_url('/track-order/')); ?>">Track my order <span aria-hidden="true">&rarr;</span></a></li>
                    <li><a class="flex min-h-10 items-center justify-between font-semibold hover:text-accent" href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">How to read a tire size <span aria-hidden="true">&rarr;</span></a></li>
                    <li><a class="flex min-h-10 items-center justify-between font-semibold hover:text-accent" href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>">Start a return <span aria-hidden="true">&rarr;</span></a></li>
                    <li><a class="flex min-h-10 items-center justify-between font-semibold hover:text-accent" href="<?php echo esc_url(home_url('/faq/')); ?>">All FAQs <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </div>
        </aside>
    </div>
</section>
