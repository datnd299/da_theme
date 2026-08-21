<?php
/**
 * Collections page — the four CHRONEL collections.
 */

defined('ABSPATH') || exit;

$dawp_collections = dawp_collections();
?>

<!-- ============================================================ HERO -->
<section class="border-b border-border bg-background" aria-labelledby="collections-hero-title">
    <div class="container py-16 lg:py-28">
        <nav class="mb-10 flex items-center gap-2 text-caption text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a class="transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <span class="text-foreground"><?php esc_html_e('Collections', 'dawp'); ?></span>
        </nav>

        <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-end">
            <div class="max-w-3xl">
                <span class="c-rule" aria-hidden="true"></span>
                <p class="c-eyebrow"><?php esc_html_e('The collections', 'dawp'); ?></p>
                <h1 id="collections-hero-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('Four watches. One movement. No compromises in between.', 'dawp'); ?></h1>
                <p class="c-lede"><?php esc_html_e('Every CHRONEL shares the same Japanese automatic calibre, the same 316L steel, and the same sapphire crystal. What changes is the purpose each one was drawn for.', 'dawp'); ?></p>
            </div>
            <a class="c-btn shrink-0" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('All watches', 'dawp'); ?></a>
        </div>
    </div>
</section>

<!-- ============================================================ COLLECTION SECTIONS -->
<?php foreach ($dawp_collections as $index => $collection) :
    $is_even   = ($index % 2 === 1);
    $cat_url   = dawp_product_category_url($collection['slug']);
    $band_bg   = $is_even ? 'bg-surface-alt' : 'bg-background';
    ?>
    <section class="border-b border-border <?php echo esc_attr($band_bg); ?> section-y" aria-labelledby="collection-<?php echo esc_attr($collection['slug']); ?>">
        <div class="container grid items-center gap-12 lg:grid-cols-2 lg:gap-24">

            <div class="<?php echo $is_even ? 'lg:order-2' : ''; ?>">
                <a class="group block overflow-hidden border border-border bg-background" href="<?php echo esc_url($cat_url); ?>">
                    <img src="<?php echo esc_url(dawp_asset_uri($collection['image'])); ?>"
                         alt="<?php echo esc_attr(sprintf(__('%s watch', 'dawp'), $collection['name'])); ?>"
                         width="896" height="1200" loading="lazy" decoding="async"
                         class="h-105 w-full object-cover transition-transform duration-700 ease-fluid group-hover:scale-105 lg:h-140">
                </a>
            </div>

            <div class="<?php echo $is_even ? 'lg:order-1' : ''; ?>">
                <span class="c-rule" aria-hidden="true"></span>
                <p class="c-eyebrow"><?php echo esc_html($collection['kicker']); ?></p>
                <h2 id="collection-<?php echo esc_attr($collection['slug']); ?>" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php echo esc_html($collection['name']); ?></h2>
                <p class="mt-4 text-body text-accent-deep"><?php echo esc_html($collection['tagline']); ?></p>
                <p class="c-lede"><?php echo esc_html($collection['summary']); ?></p>

                <ul class="m-0 mt-10 list-none p-0">
                    <?php foreach ($collection['specs'] as $spec) : ?>
                        <li class="flex items-center gap-4 border-t border-border py-4 text-body-sm text-foreground-muted">
                            <span class="h-px w-6 shrink-0 bg-accent" aria-hidden="true"></span>
                            <?php echo esc_html($spec); ?>
                        </li>
                    <?php endforeach; ?>
                    <li class="border-t border-border"></li>
                </ul>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a class="c-btn" href="<?php echo esc_url($cat_url); ?>"><?php printf(esc_html__('Explore %s', 'dawp'), esc_html($collection['name'])); ?></a>
                    <a class="c-btn-ghost" href="<?php echo esc_url(home_url('/custom/')); ?>"><?php esc_html_e('Commission one', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<!-- ============================================================ COMPARISON -->
<section class="border-b border-border bg-background section-y" aria-labelledby="compare-title">
    <div class="container">
        <div class="mb-12 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('At a glance', 'dawp'); ?></p>
            <h2 id="compare-title" class="c-title"><?php esc_html_e('Side by side.', 'dawp'); ?></h2>
        </div>

        <div class="overflow-x-auto border border-border">
            <table class="w-full min-w-[720px] border-collapse text-left">
                <caption class="sr-only"><?php esc_html_e('Specifications compared across the four CHRONEL collections', 'dawp'); ?></caption>
                <thead>
                    <tr class="bg-surface-alt">
                        <th scope="col" class="border-b border-border p-5 text-eyebrow font-medium uppercase tracking-wide text-muted"><?php esc_html_e('Collection', 'dawp'); ?></th>
                        <th scope="col" class="border-b border-border p-5 text-eyebrow font-medium uppercase tracking-wide text-muted"><?php esc_html_e('Case', 'dawp'); ?></th>
                        <th scope="col" class="border-b border-border p-5 text-eyebrow font-medium uppercase tracking-wide text-muted"><?php esc_html_e('Bezel', 'dawp'); ?></th>
                        <th scope="col" class="border-b border-border p-5 text-eyebrow font-medium uppercase tracking-wide text-muted"><?php esc_html_e('Complication', 'dawp'); ?></th>
                        <th scope="col" class="border-b border-border p-5 text-eyebrow font-medium uppercase tracking-wide text-muted"><?php esc_html_e('Water resistance', 'dawp'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dawp_compare = [
                        ['The Meridian', '39mm steel', 'Fluted', 'Date', '100m'],
                        ['The Abyss', '41mm steel', 'Rotating dive', 'Date', '200m'],
                        ['The Sovereign', '40mm gold finish', 'Fluted', 'Day and date', '100m'],
                        ['The Aviator', '42mm steel', '24-hour scale', 'Second time zone', '100m'],
                    ];
                    foreach ($dawp_compare as $row) : ?>
                        <tr>
                            <th scope="row" class="border-b border-border p-5 font-heading text-h3 font-light text-foreground"><?php echo esc_html($row[0]); ?></th>
                            <td class="border-b border-border p-5 text-body-sm text-foreground-muted"><?php echo esc_html($row[1]); ?></td>
                            <td class="border-b border-border p-5 text-body-sm text-foreground-muted"><?php echo esc_html($row[2]); ?></td>
                            <td class="border-b border-border p-5 text-body-sm text-foreground-muted"><?php echo esc_html($row[3]); ?></td>
                            <td class="border-b border-border p-5 text-body-sm text-foreground-muted"><?php echo esc_html($row[4]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <p class="mt-6 text-caption text-muted"><?php esc_html_e('All four share the calibre CH-01 Japanese automatic movement, a sapphire crystal, and a five-year movement warranty.', 'dawp'); ?></p>
    </div>
</section>

<!-- ============================================================ CTA -->
<section class="bg-ink text-on-ink section-y" aria-labelledby="collections-cta-title">
    <div class="container max-w-3xl text-center">
        <span class="c-rule c-rule--center" aria-hidden="true"></span>
        <p class="text-eyebrow font-medium uppercase tracking-wide text-accent"><?php esc_html_e('Not sure which one', 'dawp'); ?></p>
        <h2 id="collections-cta-title" class="mt-4 font-heading text-h2 font-light leading-[1.05] text-on-ink"><?php esc_html_e('Tell us how you spend your days.', 'dawp'); ?></h2>
        <p class="mx-auto mt-6 max-w-xl text-body-sm text-on-ink-muted"><?php esc_html_e('Client care will recommend a reference and a case size based on your wrist and how you intend to wear it. No obligation.', 'dawp'); ?></p>
        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a class="c-btn c-btn--on-ink" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Ask client care', 'dawp'); ?></a>
            <a class="c-btn-ghost c-btn-ghost--on-ink" href="<?php echo esc_url(home_url('/custom/')); ?>"><?php esc_html_e('Commission a watch', 'dawp'); ?></a>
        </div>
    </div>
</section>
