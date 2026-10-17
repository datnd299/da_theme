<?php
/**
 * FAQ — MozTire. Content: inc/faq-items.php (also used for FAQPage schema).
 */
$f = dawp_store_facts();
$groups = [];
foreach (dawp_get_faq_items() as $item) {
    $groups[$item['group']][] = $item;
}

dawp_page_hero([
    'title'   => 'Tire Shopping FAQ',
    'eyebrow' => 'Help center',
    'lead'    => 'Sizing and fitment, shipping, returns, warranties and payment, answered in plain English.',
    'crumb'   => 'FAQ',
]);
?>

<div class="mz-policy">
    <div class="mz-container mz-policy__grid">
        <aside class="mz-policy__toc" aria-label="<?php esc_attr_e('FAQ topics', 'dawp'); ?>">
            <p class="mz-policy__toc-title">Topics</p>
            <ol>
                <?php foreach (array_keys($groups) as $i => $group) : ?>
                    <li><a href="#faq-<?php echo (int) $i; ?>"><?php echo esc_html($group); ?></a></li>
                <?php endforeach; ?>
            </ol>
            <div class="mz-policy__help">
                <strong>Didn&rsquo;t find it?</strong>
                <a href="mailto:<?php echo esc_attr($f['email']); ?>"><?php echo esc_html($f['email']); ?></a>
                <span>We reply <?php echo esc_html($f['response_time']); ?>.</span>
            </div>
        </aside>

        <div class="mz-policy__content">
            <?php $i = 0; foreach ($groups as $group => $items) : ?>
                <section id="faq-<?php echo (int) $i++; ?>" class="mz-section-card">
                    <h2 class="mt-0 mb-2 font-heading text-2xl font-black"><?php echo esc_html($group); ?></h2>
                    <?php foreach ($items as $item) : ?>
                        <details class="mz-faq">
                            <summary><?php echo esc_html($item['question']); ?></summary>
                            <div class="mz-faq__answer mz-prose"><p><?php echo wp_kses_post($item['answer']); ?></p></div>
                        </details>
                    <?php endforeach; ?>
                </section>
            <?php endforeach; ?>

            <section class="flex flex-wrap items-center justify-between gap-4 rounded-lg bg-ink p-6 text-white md:p-8">
                <div>
                    <h2 class="m-0 font-heading text-xl font-black">Need help picking a size?</h2>
                    <p class="mt-1 mb-0 text-white/70">Our guide explains every number on your sidewall.</p>
                </div>
                <a class="mz-btn mz-btn--primary" href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">Open the Size Guide</a>
            </section>
        </div>
    </div>
</div>
