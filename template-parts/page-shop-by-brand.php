<?php
/**
 * Shop by Brand — MozTire. Lists every product_brand term A–Z.
 */
$brands  = dawp_tire_brands();
$grouped = [];
foreach ($brands as $brand) {
    $letter = strtoupper(substr(remove_accents($brand->name), 0, 1));
    $grouped[ctype_alpha($letter) ? $letter : '#'][] = $brand;
}
ksort($grouped);

dawp_page_hero([
    'title'   => 'Shop Tires by Brand',
    'eyebrow' => count($brands) ? count($brands) . ' brands in stock' : 'Tire brands',
    'lead'    => 'Pick a brand to see its tire lines, then narrow down by size, season and speed rating.',
    'image'   => 'assets/img/hero/shop-hero.jpg',
    'crumb'   => 'Shop by Brand',
]);
?>

<section class="bg-surface py-12 md:py-16">
    <div class="mz-container">
        <?php if ($grouped) : ?>
            <nav class="sticky top-0 z-10 -mx-4 mb-8 flex gap-1 overflow-x-auto bg-surface/95 px-4 py-3 backdrop-blur" aria-label="<?php esc_attr_e('Jump to letter', 'dawp'); ?>">
                <?php foreach (array_keys($grouped) as $letter) : ?>
                    <a href="#brands-<?php echo esc_attr($letter === '#' ? 'num' : $letter); ?>" class="inline-flex size-11 shrink-0 items-center justify-center rounded-md border border-border bg-background font-heading font-black hover:border-foreground"><?php echo esc_html($letter); ?></a>
                <?php endforeach; ?>
            </nav>

            <div class="grid gap-10">
                <?php foreach ($grouped as $letter => $items) : ?>
                    <section id="brands-<?php echo esc_attr($letter === '#' ? 'num' : $letter); ?>" class="scroll-mt-24" aria-label="<?php echo esc_attr($letter); ?>">
                        <h2 class="mt-0 mb-4 flex items-center gap-3 font-heading text-3xl font-black"><span class="inline-flex size-12 items-center justify-center rounded-md bg-ink text-accent-blush"><?php echo esc_html($letter); ?></span></h2>
                        <ul class="m-0 grid list-none grid-cols-2 gap-3 p-0 sm:grid-cols-3 lg:grid-cols-5">
                            <?php foreach ($items as $brand) :
                                $logo_id = (int) get_term_meta($brand->term_id, 'thumbnail_id', true);
                                ?>
                                <li>
                                    <a href="<?php echo esc_url(get_term_link($brand)); ?>" class="flex h-full min-h-28 flex-col items-center justify-center gap-2 rounded-lg border border-border bg-background p-4 text-center transition-shadow hover:border-foreground hover:shadow-card-hover">
                                        <?php if ($logo_id) : ?>
                                            <?php echo wp_get_attachment_image($logo_id, 'medium', false, ['class' => 'max-h-10 w-auto object-contain', 'alt' => $brand->name, 'loading' => 'lazy']); ?>
                                            <span class="sr-only"><?php echo esc_html($brand->name); ?></span>
                                        <?php else : ?>
                                            <span class="font-heading text-lg font-black"><?php echo esc_html($brand->name); ?></span>
                                        <?php endif; ?>
                                        <span class="text-xs font-semibold text-muted"><?php echo esc_html(sprintf(_n('%d tire', '%d tires', $brand->count, 'dawp'), $brand->count)); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="rounded-lg border border-dashed border-border bg-background p-8 text-center">
                <h2 class="mt-0 font-heading text-2xl font-black">Brands are on their way</h2>
                <p class="text-foreground-muted">We&rsquo;re adding brands to the catalog. Meanwhile, search by size to see every tire in stock.</p>
                <a class="mz-btn mz-btn--primary" href="<?php echo esc_url(dawp_shop_url()); ?>">Browse All Tires</a>
            </div>
        <?php endif; ?>

        <div class="mt-12">
            <?php dawp_tire_finder(['id' => 'brand-tf', 'variant' => 'bar', 'title' => 'Or search by tire size']); ?>
        </div>
    </div>
</section>
