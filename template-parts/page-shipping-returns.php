<?php
/**
 * Shipping & Returns page — Eliteshop Express.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@eliteshopexpress.com';
$contact_url   = home_url('/contact-us/');
$track_url     = home_url('/track-order/');
$faq_url       = home_url('/faq/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$highlights = [
    [
        'title' => __('2-4 Business Days', 'dawp'),
        'copy'  => __('Processing time before your personalized order ships.', 'dawp'),
        'icon'  => '<path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path>',
    ],
    [
        'title' => __('5-7 Business Days', 'dawp'),
        'copy'  => __('Standard US shipping after your order is dispatched.', 'dawp'),
        'icon'  => '<path d="M10 17h4V5H3v12h2"></path><path d="M14 8h4l3 3v6h-3"></path><circle cx="7" cy="17" r="2"></circle><circle cx="16" cy="17" r="2"></circle>',
    ],
    [
        'title' => __('Free Over $50', 'dawp'),
        'copy'  => __('Free standard US shipping on orders over $50.', 'dawp'),
        'icon'  => '<path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6"></path><path d="M2 7h20v5H2z"></path><path d="M12 22V7"></path><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7Z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7Z"></path>',
    ],
];
?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="ship-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></p>
            <h1 id="ship-title" class="mt-4 max-w-3xl font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                <?php esc_html_e('Printed to order, shipped from the USA.', 'dawp'); ?>
            </h1>
            <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                <?php esc_html_e('Because every item is personalized and printed just for you, here is exactly what to expect from checkout to delivery — and what happens if something goes wrong.', 'dawp'); ?>
            </p>

            <div class="mt-10 grid gap-4 sm:grid-cols-3">
                <?php foreach ($highlights as $item) : ?>
                    <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 shadow-[var(--shadow-card)]">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-[var(--radius-md)] bg-[#FFF1F0] text-[#FF5A5F]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $item['icon']; ?></svg>
                        </span>
                        <p class="font-heading mt-4 text-lg font-bold text-[#111827]"><?php echo esc_html($item['title']); ?></p>
                        <p class="mt-1 text-sm leading-relaxed text-[#4B5563]"><?php echo esc_html($item['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="ship-details-title">
        <div class="mx-auto grid max-w-5xl gap-10 px-4 sm:px-6 lg:px-8">
            <div>
                <h2 id="ship-details-title" class="font-heading text-2xl font-bold text-[#111827] sm:text-3xl"><?php esc_html_e('Processing & shipping', 'dawp'); ?></h2>
                <div class="mt-5 grid gap-5 text-base leading-8 text-[#4B5563]">
                    <p><?php esc_html_e('Every product is print-on-demand — nothing is pre-made, which means each order goes into production only after you place it. Processing takes 2-4 business days (Monday-Friday, excluding holidays) before your order ships.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Once dispatched, standard US shipping typically takes 5-7 business days. You\'ll receive a tracking link by email as soon as your order leaves our facility, and you can always look it up on our Track Order page.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Orders shipping within the US over $50 automatically qualify for free standard shipping at checkout. We currently ship within the United States only.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="returns" class="scroll-mt-24">
                <h2 id="returns-title" class="font-heading text-2xl font-bold text-[#111827] sm:text-3xl"><?php esc_html_e('Returns & replacements', 'dawp'); ?></h2>
                <div class="mt-5 grid gap-5 text-base leading-8 text-[#4B5563]">
                    <p><?php esc_html_e('Because every item is printed specifically with your personalization, we are unable to accept returns or exchanges for buyer\'s remorse, incorrect size selection, or a change of mind once an order enters production.', 'dawp'); ?></p>
                    <p><?php esc_html_e('That said, we stand behind our print quality. If your item arrives damaged, defective, or with a printing error that is our mistake, email us a photo within 30 days of delivery and we will send a free replacement or a full refund — no return shipping required.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Ordered the wrong size or spotted a typo right after checkout? Contact us immediately with your order number — we can usually make an update if production hasn\'t started yet.', 'dawp'); ?></p>
                </div>
            </div>

            <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6 sm:p-8">
                <h2 class="font-heading text-xl font-bold text-[#111827]"><?php esc_html_e('How to request a replacement', 'dawp'); ?></h2>
                <ol class="mt-4 grid gap-3 text-sm leading-relaxed text-[#4B5563]">
                    <li><span class="font-bold text-[#111827]">1.</span> <?php esc_html_e('Email support@eliteshopexpress.com with your order number.', 'dawp'); ?></li>
                    <li><span class="font-bold text-[#111827]">2.</span> <?php esc_html_e('Attach a clear photo of the damaged, defective, or misprinted item.', 'dawp'); ?></li>
                    <li><span class="font-bold text-[#111827]">3.</span> <?php esc_html_e('We\'ll confirm and send a free replacement or refund, usually within 1-2 business days.', 'dawp'); ?></li>
                </ol>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-6 text-sm font-bold text-white transition hover:bg-[#E14247]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white"><?php esc_html_e('Read FAQ', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F9FAFB] py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Shop With Confidence', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-2xl font-extrabold text-[#111827]"><?php esc_html_e('Personalized apparel, backed by real support.', 'dawp'); ?></h2>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#111827] px-6 text-sm font-bold text-white transition hover:bg-[#FF5A5F]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
