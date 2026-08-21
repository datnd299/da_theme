<?php
/**
 * FAQ — grouped accordions, content shared with the JSON-LD schema.
 */

defined('ABSPATH') || exit;

$dawp_faq_groups = dawp_get_faq_groups();
?>

<!-- ============================================================ HERO -->
<section class="border-b border-border bg-background" aria-labelledby="faq-hero-title">
    <div class="container py-16 lg:py-24">
        <nav class="mb-10 flex items-center gap-2 text-caption text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a class="transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <span class="text-foreground"><?php esc_html_e('FAQ', 'dawp'); ?></span>
        </nav>

        <div class="max-w-3xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Questions', 'dawp'); ?></p>
            <h1 id="faq-hero-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('Everything worth knowing before you buy.', 'dawp'); ?></h1>
            <p class="c-lede"><?php esc_html_e('The watch, the movement, ordering, delivery, and what happens for the rest of the time you own it. If something is missing, write to us.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<!-- ============================================================ FAQ -->
<section class="border-b border-border bg-background section-y" aria-labelledby="faq-list-title">
    <div class="container grid gap-12 lg:grid-cols-[260px_1fr] lg:gap-20">

        <nav class="lg:sticky lg:top-40 lg:self-start" aria-label="<?php esc_attr_e('FAQ sections', 'dawp'); ?>">
            <p class="c-eyebrow"><?php esc_html_e('Sections', 'dawp'); ?></p>
            <ul class="m-0 list-none space-y-3 p-0">
                <?php foreach (array_keys($dawp_faq_groups) as $group) : ?>
                    <li>
                        <a class="text-body-sm text-foreground-muted transition-colors duration-400 ease-fluid hover:text-accent-deep" href="#faq-<?php echo esc_attr(sanitize_title($group)); ?>"><?php echo esc_html($group); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="mt-10 border-t border-border pt-8">
                <p class="text-body-sm text-foreground-muted"><?php esc_html_e('Still unsure?', 'dawp'); ?></p>
                <a class="c-link mt-3 inline-block" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Ask client care', 'dawp'); ?></a>
            </div>
        </nav>

        <div>
            <h2 id="faq-list-title" class="sr-only"><?php esc_html_e('Frequently asked questions', 'dawp'); ?></h2>

            <?php foreach ($dawp_faq_groups as $group => $items) : ?>
                <div id="faq-<?php echo esc_attr(sanitize_title($group)); ?>" class="mb-16 scroll-mt-40 last:mb-0">
                    <h3 class="mb-6 font-heading text-h2 font-light leading-none text-foreground"><?php echo esc_html($group); ?></h3>

                    <?php foreach ($items as $item) : ?>
                        <details class="c-accordion">
                            <summary>
                                <span><?php echo esc_html($item['question']); ?></span>
                                <svg class="c-accordion__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
                            </summary>
                            <div class="c-accordion__panel">
                                <?php echo wp_kses_post(wpautop($item['answer'])); ?>
                            </div>
                        </details>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ CTA -->
<section class="bg-ink text-on-ink section-y" aria-labelledby="faq-cta-title">
    <div class="container max-w-3xl text-center">
        <span class="c-rule c-rule--center" aria-hidden="true"></span>
        <p class="text-eyebrow font-medium uppercase tracking-wide text-accent"><?php esc_html_e('Client care', 'dawp'); ?></p>
        <h2 id="faq-cta-title" class="mt-4 font-heading text-h2 font-light leading-[1.05] text-on-ink"><?php esc_html_e('A person answers every message.', 'dawp'); ?></h2>
        <p class="mx-auto mt-6 max-w-xl text-body-sm text-on-ink-muted"><?php echo esc_html(dawp_brand('hours')); ?><?php esc_html_e('. We reply within one business day.', 'dawp'); ?></p>
        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a class="c-btn c-btn--on-ink" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact us', 'dawp'); ?></a>
            <a class="c-btn-ghost c-btn-ghost--on-ink" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track your order', 'dawp'); ?></a>
        </div>
    </div>
</section>
