<?php
/**
 * Shared layout for GraphicShirt store policy pages.
 *
 * Expects $policy_title, $policy_intro, $policy_updated, and $policy_sections.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@graphicshirt.com';
$contact_url   = home_url('/contact-us/');
?>

<div class="bg-white text-[#102A43]">
    <section class="bg-[#F7F3EA] py-14 sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('GraphicShirt Store Policy', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl"><?php echo esc_html($policy_title); ?></h1>
            <p class="mt-5 max-w-3xl text-base leading-8 text-[#52657A]"><?php echo esc_html($policy_intro); ?></p>
            <p class="mt-5 text-sm font-semibold text-[#52657A]"><?php echo esc_html(sprintf(__('Last updated: %s', 'dawp'), $policy_updated)); ?></p>
        </div>
    </section>

    <section class="bg-[#FBFCFE] py-14 sm:py-20">
        <div class="mx-auto grid max-w-5xl gap-5 px-4 sm:px-6 lg:px-8">
            <?php foreach ($policy_sections as $section) : ?>
                <article class="rounded-md border border-[#D6DEE8] bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="font-heading text-xl font-extrabold text-[#102A43] sm:text-2xl"><?php echo esc_html($section['title']); ?></h2>
                    <div class="mt-4 space-y-4 text-sm leading-7 text-[#52657A] sm:text-base">
                        <?php foreach ($section['copy'] as $paragraph) : ?>
                            <p><?php echo wp_kses_post($paragraph); ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!empty($section['items'])) : ?>
                        <ul class="mt-5 space-y-3 text-sm leading-7 text-[#52657A] sm:text-base">
                            <?php foreach ($section['items'] as $item) : ?>
                                <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#B83232]"></span><span><?php echo wp_kses_post($item); ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-[#F7F3EA] py-12">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-[#D6DEE8] bg-white p-6 sm:flex sm:items-center sm:justify-between sm:gap-8 sm:p-8">
                <div>
                    <h2 class="font-heading text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Questions about this policy?', 'dawp'); ?></h2>
                    <p class="mt-3 text-sm leading-7 text-[#52657A]">Email <a class="font-bold text-[#9B2C2C] underline" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>. <?php esc_html_e('Support hours are Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></p>
                </div>
                <a href="<?php echo esc_url($contact_url); ?>" class="mt-5 inline-flex min-h-12 shrink-0 items-center justify-center rounded-md bg-[#102A43] px-6 text-sm font-bold text-white transition hover:bg-[#9B2C2C] sm:mt-0"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
