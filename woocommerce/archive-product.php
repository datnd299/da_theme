<?php
/**
 * Shop / product taxonomy archive — MozTire
 * Styles: assets/css/shop.css (+ .tf / .tire-card in main.css). Behaviour: assets/js/main.js.
 */
defined('ABSPATH') || exit;

get_header();

global $wp_query;

$shop_url   = dawp_shop_url();
$active     = dawp_tire_active_filters();
$attributes = dawp_tire_attributes();
$term       = is_product_taxonomy() ? get_queried_object() : null;
$is_brand   = $term && $term->taxonomy === 'product_brand';
$total      = (int) $wp_query->found_posts;

// Size string from the active width / aspect / rim filters, e.g. "225/65R17".
$size_parts = [];
foreach (['width', 'aspect', 'rim'] as $key) {
    $tax = dawp_tire_tax($key);
    if (! empty($active[$tax]) && count($active[$tax]) === 1) {
        $found = get_term_by('slug', $active[$tax][0], $tax);
        $size_parts[$key] = $found ? $found->name : $active[$tax][0];
    }
}
$size_label = count($size_parts) === 3
    ? sprintf('%s/%sR%s', (int) $size_parts['width'], (int) $size_parts['aspect'], preg_replace('/[^0-9.]/', '', $size_parts['rim']))
    : '';

// Hero copy
$eyebrow = 'MozTire catalog';
$title   = 'All Tires';
$lead    = 'Passenger, SUV and light-truck tires with full specs and free ground shipping to the contiguous U.S.';

if (is_search()) {
    $eyebrow = 'Search results';
    $title   = sprintf('Results for “%s”', get_search_query());
} elseif ($term) {
    $title   = $term->name;
    $eyebrow = $is_brand ? 'Tire brand' : (isset($attributes) && strpos($term->taxonomy, 'pa_') === 0 ? wc_attribute_label($term->taxonomy) : 'Tire collection');
    $desc    = term_description($term->term_id, $term->taxonomy);
    $lead    = $desc ? wp_strip_all_tags($desc) : sprintf('Every %s tire we carry, with size, season, load and speed specs on each listing.', $term->name);
}

if (! $size_label && $term && $term->taxonomy === 'product_cat' && dawp_tire_parse_size($term->name)) {
    $size_label = $term->name;
    $term_title = '';
}

if ($size_label) {
    $eyebrow = 'Tires that fit';
    $title   = ($term && ! isset($term_title)) ? sprintf('%s tires in %s', $term->name, $size_label) : sprintf('Tires in %s', $size_label);
    $lead    = 'Double-check the load index and speed rating against your door-jamb placard before you order.';
}

$brand_logo = $is_brand ? (int) get_term_meta($term->term_id, 'thumbnail_id', true) : 0;

$chips = dawp_shop_active_chips();
$clear_url = $term ? get_term_link($term) : $shop_url;
if (is_search()) {
    $clear_url = add_query_arg(['s' => get_search_query(), 'post_type' => 'product'], home_url('/'));
}

?>

<main id="primary" class="shop">
    <section class="mz-hero shop-hero" style="<?php echo esc_attr(sprintf("--mz-hero-image:url('%s')", esc_url(dawp_theme_cdn_image_url('assets/img/hero/shop-hero.jpg', 1600, 0)))); ?>">
        <div class="mz-container shop-hero__inner">
            <nav class="mz-hero__crumbs" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">/</span>
                <?php if ($term || is_search()) : ?>
                    <a href="<?php echo esc_url($shop_url); ?>">Tires</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page"><?php echo esc_html($term ? $term->name : 'Search'); ?></span>
                <?php else : ?>
                    <span aria-current="page">Tires</span>
                <?php endif; ?>
            </nav>
            <div class="shop-hero__row">
                <?php if ($brand_logo) : ?>
                    <span class="shop-hero__logo"><?php echo wp_get_attachment_image($brand_logo, 'medium', false, ['alt' => $term->name]); ?></span>
                <?php endif; ?>
                <div>
                    <p class="mz-hero__eyebrow"><?php echo esc_html($eyebrow); ?></p>
                    <h1><?php echo esc_html($title); ?></h1>
                    <p class="mz-hero__lead"><?php echo esc_html(wp_trim_words($lead, 40)); ?></p>
                </div>
            </div>
        </div>
    </section>

    <div class="mz-container shop__finder">
        <?php dawp_tire_finder(['id' => 'shop-tf', 'variant' => 'bar', 'title' => $size_label ? 'Change tire size' : 'Search by tire size']); ?>
    </div>

    <div class="mz-container shop__body">
        <div class="shop-toolbar">
            <div class="shop-toolbar__left">
                <button type="button" class="shop-toolbar__filter" data-shop-filter-open aria-controls="shop-filters" aria-expanded="false">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M7 12h10M10 18h4"/></svg>
                    Filters<?php if ($chips) : ?> <span class="shop-toolbar__badge"><?php echo count($chips); ?></span><?php endif; ?>
                </button>
                <p class="shop-toolbar__count"><strong><?php echo esc_html(number_format_i18n($total)); ?></strong> <?php echo esc_html(_n('tire', 'tires', $total, 'dawp')); ?></p>
            </div>
            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <?php if ($chips) : ?>
            <ul class="shop-chips" aria-label="Active filters">
                <?php foreach ($chips as $chip) : ?>
                    <li><a class="shop-chip" href="<?php echo esc_url($chip['url']); ?>" rel="nofollow"><?php echo esc_html($chip['label']); ?> <span aria-hidden="true">&times;</span><span class="sr-only">Remove filter</span></a></li>
                <?php endforeach; ?>
                <li><a class="shop-chips__clear" href="<?php echo esc_url($clear_url); ?>" rel="nofollow">Clear all</a></li>
            </ul>
        <?php endif; ?>

        <div class="shop-layout">
            <div class="shop-filters__overlay" data-shop-filter-close hidden></div>
            <aside class="shop-filters" id="shop-filters" aria-label="Tire filters">
                <?php dawp_render_shop_filters(); ?>
            </aside>

            <div class="shop-results">
                <?php if (woocommerce_product_loop() && have_posts()) : ?>
                    <ul class="tire-grid">
                        <?php while (have_posts()) : the_post();
                            dawp_render_tire_card(wc_get_product(get_the_ID()));
                        endwhile; ?>
                    </ul>
                    <div class="shop-pagination">
                        <?php woocommerce_pagination(); ?>
                    </div>
                <?php else : ?>
                    <div class="shop-empty">
                        <h2>No tires match those filters</h2>
                        <p>Try removing a filter, or check the size on your sidewall. If you can&rsquo;t find your size, we can help you look.</p>
                        <div class="shop-empty__actions">
                            <a class="mz-btn mz-btn--primary" href="<?php echo esc_url($clear_url); ?>">Clear Filters</a>
                            <a class="mz-btn mz-btn--outline" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Ask for Help</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
