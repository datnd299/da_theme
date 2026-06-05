<?php
/**
 * Template Part: Contact Us
 */

$theme_uri       = get_template_directory_uri();
$accessory_image = $theme_uri . '/assets/img/toyocartv/toyocartv-accessories.png';
$maps_url        = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode('1777 Canal St, Merced, CA 95340');
?>

<section class="bg-white">
    <div class="bg-[#080808] py-16 text-white lg:py-24">
        <div class="mx-auto grid w-[min(100%-32px,1180px)] gap-10 lg:grid-cols-[0.95fr_1fr] lg:items-center">
            <div>
                <span class="mb-4 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Contact Support', 'dawp'); ?></span>
                <h1 class="font-heading text-5xl font-black uppercase leading-none md:text-7xl"><?php esc_html_e('Need Help With An Order Or Accessory?', 'dawp'); ?></h1>
                <p class="mt-6 text-lg leading-8 text-white/76">
                    <?php esc_html_e('Send us your order number, product question, or compatibility concern. Our support team will reply within 24 business hours.', 'dawp'); ?>
                </p>
            </div>
            <?php
            echo dawp_responsive_image($accessory_image, [
                'alt'           => __('Auto accessory support scene', 'dawp'),
                'class'         => 'aspect-[16/10] w-full rounded-2xl object-cover opacity-90',
                'width'         => 1180,
                'height'        => 738,
                'srcset_widths' => [400, 640, 920, 1180],
                'sizes'         => '(max-width: 1023px) calc(100vw - 32px), 590px',
                'loading'       => 'eager',
            ]);
            ?>
        </div>
    </div>

    <div class="mx-auto grid w-[min(100%-32px,1180px)] gap-10 py-16 lg:grid-cols-[0.42fr_0.58fr] lg:py-20">
        <div class="space-y-5">
            <?php
            $contact_cards = [
                ['Email Support', 'support@toyocartv.com', 'mailto:support@toyocartv.com', ''],
                ['Support Hours', 'Monday-Friday, 9:00 AM-5:00 PM PST', '#contact-form', ''],
                ['Mailing Address', '1777 Canal St, Merced, CA 95340', $maps_url, 'external'],
            ];
            foreach ($contact_cards as $card) :
            ?>
                <a
                    href="<?php echo esc_url($card[2]); ?>"
                    class="block rounded-xl border border-[#E5E7EB] bg-[#F7F8FA] p-6 transition-colors hover:border-[#D71920]"
                    <?php if ($card[3] === 'external') : ?>
                        target="_blank" rel="noopener"
                    <?php endif; ?>
                >
                    <h2 class="text-lg font-black text-[#111827]"><?php echo esc_html($card[0]); ?></h2>
                    <p class="mt-2 font-bold text-[#D71920]"><?php echo esc_html($card[1]); ?></p>
                </a>
            <?php endforeach; ?>

            <div class="rounded-xl bg-[#111827] p-6 text-white">
                <h2 class="font-heading text-2xl font-black uppercase"><?php esc_html_e('Before You Install', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-6 text-white/72"><?php esc_html_e('For adhesive, mounting, or trim-based products, confirm fitment and surface compatibility before installation. Used, installed, modified, adhesive-applied, cut, trimmed, or damaged items may not be eligible for return unless defective, incorrect, or damaged on arrival.', 'dawp'); ?></p>
            </div>
        </div>

        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-card lg:p-10">
            <form id="contact-form" class="space-y-6">
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="contact_name" class="mb-2 block text-sm font-black text-[#111827]"><?php esc_html_e('Your Name', 'dawp'); ?> <span class="text-[#D71920]">*</span></label>
                        <input type="text" id="contact_name" name="name" required class="min-h-12 w-full rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] px-4 text-[#111827] focus:border-[#D71920] focus:outline-none" placeholder="<?php esc_attr_e('Your name', 'dawp'); ?>">
                    </div>
                    <div>
                        <label for="contact_email" class="mb-2 block text-sm font-black text-[#111827]"><?php esc_html_e('Email Address', 'dawp'); ?> <span class="text-[#D71920]">*</span></label>
                        <input type="email" id="contact_email" name="email" required class="min-h-12 w-full rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] px-4 text-[#111827] focus:border-[#D71920] focus:outline-none" placeholder="<?php esc_attr_e('you@example.com', 'dawp'); ?>">
                    </div>
                </div>

                <div>
                    <label for="contact_subject" class="mb-2 block text-sm font-black text-[#111827]"><?php esc_html_e('Subject', 'dawp'); ?></label>
                    <select id="contact_subject" name="subject" class="min-h-12 w-full rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] px-4 text-[#111827] focus:border-[#D71920] focus:outline-none">
                        <option value="general"><?php esc_html_e('General Inquiry', 'dawp'); ?></option>
                        <option value="order"><?php esc_html_e('Order Status', 'dawp'); ?></option>
                        <option value="fitment"><?php esc_html_e('Compatibility Question', 'dawp'); ?></option>
                        <option value="return"><?php esc_html_e('Return Request', 'dawp'); ?></option>
                    </select>
                </div>

                <div>
                    <label for="contact_message" class="mb-2 block text-sm font-black text-[#111827]"><?php esc_html_e('Your Message', 'dawp'); ?> <span class="text-[#D71920]">*</span></label>
                    <textarea id="contact_message" name="message" rows="6" required class="w-full resize-none rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] px-4 py-3 text-[#111827] focus:border-[#D71920] focus:outline-none" placeholder="<?php esc_attr_e('Include your order number, product name, or compatibility question.', 'dawp'); ?>"></textarea>
                </div>

                <button type="submit" class="w-full min-h-12 rounded-lg bg-[#D71920] px-8 text-sm font-black uppercase text-white hover:bg-[#A70F14] transition-colors">
                    <?php esc_html_e('Send Message', 'dawp'); ?>
                </button>

                <p id="contact-msg" aria-live="polite" style="display:none" class="text-center text-sm font-bold"></p>
                <p class="text-center text-xs leading-5 text-[#6B7280]"><?php esc_html_e('Please do not send payment card details through this form.', 'dawp'); ?></p>
            </form>
        </div>
    </div>

    <div class="bg-[#F7F8FA] py-16">
        <div class="mx-auto w-[min(100%-32px,1180px)]">
            <div class="mb-8 text-center">
                <h2 class="font-heading text-4xl font-black uppercase text-[#111827]"><?php esc_html_e('Quick Help', 'dawp'); ?></h2>
            </div>
            <div class="grid gap-5 md:grid-cols-3">
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="rounded-xl border border-[#E5E7EB] bg-white p-6 text-center hover:border-[#D71920]">
                    <h3 class="font-black text-[#111827]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Processing time, transit estimates, tracking, and U.S. shipping details.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="rounded-xl border border-[#E5E7EB] bg-white p-6 text-center hover:border-[#D71920]">
                    <h3 class="font-black text-[#111827]"><?php esc_html_e('Returns', 'dawp'); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Review eligibility, item condition, and refund timing before starting a return.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="rounded-xl border border-[#E5E7EB] bg-white p-6 text-center hover:border-[#D71920]">
                    <h3 class="font-black text-[#111827]"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Find fast answers about orders, compatibility, shipping, and returns.', 'dawp'); ?></p>
                </a>
            </div>
        </div>
    </div>
</section>
