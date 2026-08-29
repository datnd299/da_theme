<?php
/**
 * FAQ page — YourWatchStore. Tailwind utilities only.
 * Questions/answers come from dawp_get_faq_items() (shared with JSON-LD).
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
$faq_items      = function_exists('dawp_get_faq_items') ? dawp_get_faq_items() : [];

$answer_kses = [
    'a'      => ['href' => [], 'class' => [], 'target' => [], 'rel' => []],
    'strong' => [],
    'em'     => [],
    'br'     => [],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Help Center', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('Orders, shipping, watch care, returns, and support — answered.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <?php if (!empty($faq_items)) : ?>
            <div class="divide-y divide-border border-y border-border">
                <?php foreach ($faq_items as $item) : ?>
                    <details class="group">
                        <summary class="flex cursor-pointer list-none items-start justify-between gap-4 py-5 text-left font-heading text-base font-bold text-foreground marker:hidden [&::-webkit-details-marker]:hidden">
                            <span><?php echo esc_html($item['question']); ?></span>
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-muted transition group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
                        </summary>
                        <div class="pb-5 text-base leading-7 text-foreground-muted [&_a]:font-semibold [&_a]:text-accent-blush [&_a]:underline [&_a]:underline-offset-2">
                            <?php echo wp_kses($item['answer'], $answer_kses); ?>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="mt-10 rounded-md border border-border bg-surface-alt p-6">
            <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Still need help?', 'dawp'); ?></h2>
            <p class="mt-2 text-sm leading-6 text-foreground-muted">
                <?php
                printf(
                    wp_kses(__('Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a> or use the <a class="font-semibold text-accent-blush underline underline-offset-2" href="%2$s">Contact Us page</a>. Support hours: %3$s.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                    esc_attr($support_email),
                    esc_url(home_url('/contact-us/')),
                    esc_html($business_hours)
                );
                ?>
            </p>
        </div>
    </section>
</div>
