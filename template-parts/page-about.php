<?php
/**
 * About Us page — Eliteshop Express.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$values = [
    [
        'title' => __('Made in the USA', 'dawp'),
        'copy'  => __('Every order is printed and shipped from our own facilities in the United States — no overseas drop-shipping.', 'dawp'),
        'icon'  => '<path d="M4 6h16v12H4z"></path><path d="M4 10h16M8 6v4"></path>',
    ],
    [
        'title' => __('Print-to-Order Quality', 'dawp'),
        'copy'  => __('Nothing sits on a shelf. Your design is printed fresh for you, checked, and packed with care.', 'dawp'),
        'icon'  => '<path d="m12 2 2.6 6.3L21 9l-4.9 4.3L17.4 20 12 16.7 6.6 20l1.3-6.7L3 9l6.4-.7Z"></path>',
    ],
    [
        'title' => __('Personalization First', 'dawp'),
        'copy'  => __('We built our own live-preview customization engine so you always see exactly what will print.', 'dawp'),
        'icon'  => '<path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"></path>',
    ],
    [
        'title' => __('Real Customer Support', 'dawp'),
        'copy'  => __('A real team answers order and personalization questions — usually within 1 business day.', 'dawp'),
        'icon'  => '<path d="M4 4h16v12H7l-3 3z"></path>',
    ],
];
?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="about-title">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('About Us', 'dawp'); ?></p>
                <h1 id="about-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                    <?php esc_html_e('Apparel that\'s made to be yours.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-xl text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Eliteshop Express started with a simple idea: buying a T-shirt shouldn\'t mean settling for whatever\'s on the rack. Every piece we make is personalized, printed to order, and shipped from right here in the USA.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-7 py-3.5 text-sm font-bold text-white transition hover:bg-[#E14247]">
                        <?php esc_html_e('Start Customizing', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-7 py-3.5 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white">
                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="mx-auto aspect-square w-full max-w-sm rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-10 shadow-[var(--shadow-card-hover)]">
                <svg viewBox="0 0 200 200" class="h-full w-full" role="img" aria-label="<?php esc_attr_e('Eliteshop Express apparel mockup', 'dawp'); ?>">
                    <path d="M62,18 L84,8 C90,24 110,24 116,8 L138,18 L172,48 L150,72 L138,60 L138,188 L62,188 L62,60 L50,72 L28,48 Z" fill="#0056D2"></path>
                    <text x="100" y="118" text-anchor="middle" font-family="Poppins, Montserrat, sans-serif" font-weight="800" font-size="18" fill="#FFFFFF">SINCE '24</text>
                </svg>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="story-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <h2 id="story-title" class="font-heading text-3xl font-bold text-[#111827] sm:text-4xl"><?php esc_html_e('Our story', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('We were tired of "personalized" shops that just slapped a name on a generic template. So we built our own print-on-demand system from the ground up — one design, thousands of possible combinations of name, text, color, and style.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Today, every order that comes through Eliteshop Express is printed one at a time, checked by hand, and shipped from the USA — whether it\'s a gift for a dog mom, a birth-year tee, or a matching set for best friends.', 'dawp'); ?>
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 sm:gap-6">
                <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6">
                    <p class="font-heading text-3xl font-extrabold text-[#111827]">10K+</p>
                    <p class="mt-1 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Happy customers', 'dawp'); ?></p>
                </div>
                <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6">
                    <p class="font-heading text-3xl font-extrabold text-[#111827]">4.8/5</p>
                    <p class="mt-1 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Average rating', 'dawp'); ?></p>
                </div>
                <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6">
                    <p class="font-heading text-3xl font-extrabold text-[#111827]">2-4</p>
                    <p class="mt-1 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Day print turnaround', 'dawp'); ?></p>
                </div>
                <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6">
                    <p class="font-heading text-3xl font-extrabold text-[#111827]">100%</p>
                    <p class="mt-1 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Made in the USA', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="values-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('What We Stand For', 'dawp'); ?></p>
                <h2 id="values-title" class="mt-3 font-heading text-3xl font-bold text-[#111827] sm:text-4xl"><?php esc_html_e('Our promise to every customer', 'dawp'); ?></h2>
            </div>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($values as $value) : ?>
                    <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 shadow-[var(--shadow-card)]">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-[var(--radius-md)] bg-[#FFF1F0] text-[#FF5A5F]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $value['icon']; ?></svg>
                        </span>
                        <h3 class="font-heading mt-4 text-base font-bold text-[#111827]"><?php echo esc_html($value['title']); ?></h3>
                        <p class="mt-2 text-sm leading-relaxed text-[#4B5563]"><?php echo esc_html($value['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[var(--radius-lg)] bg-[#111827] p-8 sm:p-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Ready When You Are', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-2xl font-extrabold text-white sm:text-3xl"><?php esc_html_e('Make something that\'s 100% you.', 'dawp'); ?></h2>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-7 text-sm font-bold text-white transition hover:bg-[#E14247]">
                        <?php esc_html_e('Start Customizing', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
