<?php
/**
 * 404 — not found.
 */

defined('ABSPATH') || exit;

get_header();

$dawp_collections = dawp_collections();
?>

<main class="bg-background">
    <section class="border-b border-border" aria-labelledby="error-title">
        <div class="container grid items-center gap-12 py-20 lg:grid-cols-[1.05fr_0.95fr] lg:gap-20 lg:py-32">

            <div>
                <span class="c-rule" aria-hidden="true"></span>
                <p class="c-eyebrow"><?php esc_html_e('Error 404', 'dawp'); ?></p>
                <h1 id="error-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('This page has stopped.', 'dawp'); ?></h1>
                <p class="c-lede"><?php esc_html_e('The address you followed does not exist, or the page has moved. Nothing is broken on your side.', 'dawp'); ?></p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a class="c-btn" href="<?php echo esc_url(home_url('/collections/')); ?>"><?php esc_html_e('The collections', 'dawp'); ?></a>
                    <a class="c-btn-ghost" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to home', 'dawp'); ?></a>
                </div>

                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-12 max-w-md">
                    <input type="hidden" name="post_type" value="product">
                    <label class="c-label" for="error-search"><?php esc_html_e('Search the catalogue', 'dawp'); ?></label>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <input class="c-field flex-1" id="error-search" type="search" name="s" placeholder="<?php esc_attr_e('Reference or collection', 'dawp'); ?>">
                        <button class="c-btn shrink-0" type="submit"><?php esc_html_e('Search', 'dawp'); ?></button>
                    </div>
                </form>
            </div>

            <div class="overflow-hidden border border-border bg-surface-alt">
                <img src="<?php echo esc_url(dawp_asset_uri('assets/img/watches/aviator.jpeg')); ?>"
                     alt="<?php esc_attr_e('A CHRONEL automatic watch', 'dawp'); ?>"
                     width="896" height="1200" decoding="async"
                     class="h-80 w-full object-cover lg:h-120">
            </div>
        </div>
    </section>

    <section class="section-y" aria-labelledby="error-collections-title">
        <div class="container">
            <div class="mb-12 max-w-xl">
                <span class="c-rule" aria-hidden="true"></span>
                <h2 id="error-collections-title" class="c-title"><?php esc_html_e('Perhaps you were looking for one of these.', 'dawp'); ?></h2>
            </div>

            <ul class="m-0 grid list-none grid-cols-2 gap-px border border-border bg-border p-0 lg:grid-cols-4">
                <?php foreach ($dawp_collections as $collection) : ?>
                    <li class="bg-background">
                        <a class="group flex h-full flex-col" href="<?php echo esc_url(dawp_product_category_url($collection['slug'])); ?>">
                            <span class="block overflow-hidden bg-surface-alt">
                                <img src="<?php echo esc_url(dawp_asset_uri($collection['image'])); ?>"
                                     alt="" width="896" height="1200" loading="lazy" decoding="async"
                                     class="h-64 w-full object-cover transition-transform duration-700 ease-fluid group-hover:scale-105">
                            </span>
                            <span class="p-6">
                                <span class="block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($collection['name']); ?></span>
                                <span class="mt-2 block text-caption text-foreground-muted"><?php echo esc_html($collection['tagline']); ?></span>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="mt-10 text-caption text-muted">
                <?php esc_html_e('Still lost?', 'dawp'); ?>
                <a class="text-accent-deep underline underline-offset-4" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Write to client care', 'dawp'); ?></a>.
            </p>
        </div>
    </section>
</main>

<?php get_footer(); ?>
