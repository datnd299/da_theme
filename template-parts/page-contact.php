<?php
/**
 * Contact page template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@shopavecmoi.com';
$business_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST';
$shop_url = home_url('/shop/');
$shipping_url = home_url('/shipping-policy/');
$returns_url = home_url('/return-refund-policy/');
$faq_url = home_url('/faq/');
$track_url = home_url('/track-order/');
$store_address = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';

if (function_exists('wc_get_page_permalink')) {
    $wc_shop_url = wc_get_page_permalink('shop');
    if ($wc_shop_url) {
        $shop_url = $wc_shop_url;
    }
}

$support_cards = [
    [
        'title' => 'Order Support',
        'copy'  => 'For order status, shipping updates, address questions, or returns, include your order number so we can help faster.',
    ],
    [
        'title' => 'Product & Fit',
        'copy'  => 'Ask about sizing, fabric feel, garment details, or styling before choosing a delicate piece.',
    ],
    [
        'title' => 'Returns',
        'copy'  => 'Eligible unworn, unwashed, unused items may be returned within 30 days of delivery, subject to hygiene conditions.',
    ],
];

$email_prompts = [
    'Your order number, if your message is order-related.',
    'The product name, size, and color if you are asking about fit or availability.',
    'Clear photos if an item arrived damaged, incorrect, or incomplete.',
    'The email address used at checkout so we can locate your order.',
];

$quick_links = [
    [
        'title' => 'Track Your Order',
        'copy'  => 'Check shipment progress once tracking information has been provided.',
        'url'   => $track_url,
    ],
    [
        'title' => 'Shipping Policy',
        'copy'  => 'Review processing times, delivery estimates, tracking, and address details.',
        'url'   => $shipping_url,
    ],
    [
        'title' => 'Return & Refund Policy',
        'copy'  => 'Review return eligibility, hygiene requirements, and refund timing.',
        'url'   => $returns_url,
    ],
    [
        'title' => 'FAQ',
        'copy'  => 'Find quick answers about orders, fit, product care, payment, and support.',
        'url'   => $faq_url,
    ],
];

$mailto_subject = rawurlencode('Shop Avec Moi Support Request');
$mailto_body = rawurlencode("Hello Shop Avec Moi,\n\nOrder number:\nQuestion:\n\nThank you.");
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Customer Care</p>
                <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl lg:text-7xl">
                    Contact Shop Avec Moi
                </h1>
                <p class="mt-6 max-w-xl text-base leading-7 text-[#6D5875] sm:text-lg">
                    We are here for order questions, sizing help, product details, shipping support, and return guidance for your intimate apparel purchase.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#6E3A8A]" href="mailto:<?php echo esc_attr($support_email); ?>?subject=<?php echo esc_attr($mailto_subject); ?>&body=<?php echo esc_attr($mailto_body); ?>">
                        Email Support
                    </a>
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-white/70" href="<?php echo esc_url($track_url); ?>">
                        Track An Order
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] border border-[#E8DFF0] bg-white p-6 shadow-2xl shadow-[#3B1748]/10 lg:p-8">
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Support Details</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748]">
                    Email us for a clear, personal reply.
                </h2>
                <div class="mt-7 grid gap-4">
                    <div class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5">
                        <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Email</p>
                        <a class="mt-2 block break-words font-heading text-3xl leading-tight text-[#3B1748] transition hover:text-[#6E3A8A]" href="mailto:<?php echo esc_attr($support_email); ?>">
                            <?php echo esc_html($support_email); ?>
                        </a>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Business Hours</p>
                        <p class="mt-2 text-base font-semibold leading-7 text-[#3B1748]"><?php echo esc_html($business_hours); ?></p>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">Messages received outside business hours are reviewed on the next business day.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact-form" class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-[#6E3A8A]">Direct Inquiry</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                    Send us a message
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-[#6D5875]">
                    Our care team will get back to you within 24-48 business hours. For order inquiries, please include your order number for faster service.
                </p>
            </div>

            <div class="mt-12 rounded-[2.5rem] border border-[#E8DFF0] bg-[#FBF4FF] p-8 md:p-12">
                <form action="#" method="POST" class="grid gap-6">
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="grid gap-2">
                            <label for="first-name" class="px-1 text-xs font-bold uppercase tracking-wider text-[#3B1748]">First Name</label>
                            <input type="text" id="first-name" name="first-name" required class="h-14 rounded-2xl border border-[#E8DFF0] bg-white px-5 text-[#24132E] outline-none transition focus:border-[#6E3A8A] focus:ring-1 focus:ring-[#6E3A8A]">
                        </div>
                        <div class="grid gap-2">
                            <label for="last-name" class="px-1 text-xs font-bold uppercase tracking-wider text-[#3B1748]">Last Name</label>
                            <input type="text" id="last-name" name="last-name" required class="h-14 rounded-2xl border border-[#E8DFF0] bg-white px-5 text-[#24132E] outline-none transition focus:border-[#6E3A8A] focus:ring-1 focus:ring-[#6E3A8A]">
                        </div>
                    </div>
                    
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="grid gap-2">
                            <label for="email" class="px-1 text-xs font-bold uppercase tracking-wider text-[#3B1748]">Email Address</label>
                            <input type="email" id="email" name="email" required class="h-14 rounded-2xl border border-[#E8DFF0] bg-white px-5 text-[#24132E] outline-none transition focus:border-[#6E3A8A] focus:ring-1 focus:ring-[#6E3A8A]">
                        </div>
                        <div class="grid gap-2">
                            <label for="order-number" class="px-1 text-xs font-bold uppercase tracking-wider text-[#3B1748]">Order Number (Optional)</label>
                            <input type="text" id="order-number" name="order-number" placeholder="#0000" class="h-14 rounded-2xl border border-[#E8DFF0] bg-white px-5 text-[#24132E] outline-none transition focus:border-[#6E3A8A] focus:ring-1 focus:ring-[#6E3A8A]">
                        </div>
                    </div>

                    <div class="grid gap-2">
                        <label for="subject" class="px-1 text-xs font-bold uppercase tracking-wider text-[#3B1748]">Subject</label>
                        <select id="subject" name="subject" class="h-14 rounded-2xl border border-[#E8DFF0] bg-white px-5 text-[#24132E] outline-none transition focus:border-[#6E3A8A] focus:ring-1 focus:ring-[#6E3A8A]">
                            <option value="general">General Inquiry</option>
                            <option value="order">Order Status</option>
                            <option value="sizing">Sizing & Fit</option>
                            <option value="returns">Returns & Exchanges</option>
                        </select>
                    </div>

                    <div class="grid gap-2">
                        <label for="message" class="px-1 text-xs font-bold uppercase tracking-wider text-[#3B1748]">Message</label>
                        <textarea id="message" name="message" rows="4" required class="rounded-2xl border border-[#E8DFF0] bg-white p-5 text-[#24132E] outline-none transition focus:border-[#6E3A8A] focus:ring-1 focus:ring-[#6E3A8A]"></textarea>
                    </div>

                    <button type="submit" class="mt-2 inline-flex h-16 items-center justify-center rounded-2xl bg-[#3B1748] px-10 text-base font-bold text-white shadow-lg shadow-[#3B1748]/20 transition duration-300 hover:bg-[#6E3A8A] hover:shadow-xl hover:shadow-[#6E3A8A]/20">
                        Send Message
                    </button>
                </form>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2">
                <div class="flex items-center gap-4 rounded-3xl border border-[#E8DFF0] bg-white p-6 transition hover:border-[#6E3A8A]">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#FBF4FF] text-[#3B1748]">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#3B1748]">Call Support</h3>
                        <p class="text-sm text-[#6D5875]">+1 (888) 123-4567</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 rounded-3xl border border-[#E8DFF0] bg-white p-6 transition hover:border-[#6E3A8A]">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#FBF4FF] text-[#3B1748]">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#3B1748]">Our Studio</h3>
                        <p class="text-sm text-[#6D5875]"><?php echo esc_html($store_address); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">How We Can Help</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                    Support for orders, fit, and delicate pieces.
                </h2>
                <p class="mt-4 text-base leading-7 text-[#6D5875]">
                    Shop Avec Moi support is focused on clear answers and careful handling for intimate apparel questions.
                </p>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($support_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#FBF4FF] text-[#3B1748]">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                        </div>
                        <h3 class="font-heading text-3xl leading-tight text-[#3B1748]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#3B1748] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[0.72fr_1.28fr] lg:items-start">
            <aside class="rounded-[2rem] border border-white/15 bg-white/10 p-6 text-white lg:p-8">
                <p class="text-sm font-semibold uppercase text-white">Before You Email</p>
                <h2 class="mt-3 font-heading text-3xl leading-tight text-white">A few details help us respond faster.</h2>
                <p class="mt-4 text-sm leading-6 text-white/75">
                    If your message is about an order or return, include as much relevant detail as possible in your first email.
                </p>
                <a class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>?subject=<?php echo esc_attr($mailto_subject); ?>&body=<?php echo esc_attr($mailto_body); ?>">
                    Start Email
                </a>
            </aside>

            <div class="grid gap-4 md:grid-cols-2">
                <?php foreach ($email_prompts as $prompt) : ?>
                    <div class="rounded-2xl border border-white/15 bg-white/10 p-5 text-sm font-semibold leading-6 text-white">
                        <?php echo esc_html($prompt); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Quick Links</p>
                    <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                        Find the right help page.
                    </h2>
                </div>
                <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($shop_url); ?>">
                    Continue Shopping
                </a>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <?php foreach ($quick_links as $link) : ?>
                    <a class="group rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#3B1748]/10" href="<?php echo esc_url($link['url']); ?>">
                        <h3 class="font-heading text-3xl leading-tight text-[#3B1748]"><?php echo esc_html($link['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($link['copy']); ?></p>
                        <span class="mt-5 inline-flex text-sm font-semibold text-[#6E3A8A] transition group-hover:text-[#3B1748]">View page</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
