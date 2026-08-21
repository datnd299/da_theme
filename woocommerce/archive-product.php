<?php
/**
 * Shop archive — all watches, a collection, a tag, or product search results.
 * Markup only. Styling lives in assets/css/shop.css; behaviour in assets/js/main.js.
 */

defined('ABSPATH') || exit;

get_header();

global $wp_query;

$shop_url    = get_permalink(wc_get_page_id('shop'));
$total       = (int) $wp_query->found_posts;
$collections = function_exists('dawp_collections') ? dawp_collections() : [];

$eyebrow     = __('The catalogue', 'dawp');
$title       = __('All Watches', 'dawp');
$description = __('Every reference currently built in the atelier. Each one is hand-assembled around a Japanese automatic movement.', 'dawp');

if (is_search()) {
    $eyebrow     = __('Search', 'dawp');
    /* translators: %s: search term */
    $title       = sprintf(__('Results for “%s”', 'dawp'), get_search_query());
    $description = __('References matching your search across every collection.', 'dawp');
} elseif (is_product_tag()) {
    $term        = get_queried_object();
    $eyebrow     = __('Tagged', 'dawp');
    $title       = $term ? $term->name : __('Watches', 'dawp');
    $description = __('References sharing this characteristic across the four collections.', 'dawp');
} elseif (is_product_category()) {
    $term    = get_queried_object();
    $title   = $term ? $term->name : __('Collection', 'dawp');
    $eyebrow = __('Collection', 'dawp');

    $term_description = $term ? term_description($term->term_id, 'product_cat') : '';

    if ($term_description) {
        $description = wp_strip_all_tags($term_description);
    }

    foreach ($collections as $index => $collection) {
        if ($term && $collection['slug'] === $term->slug) {
            $eyebrow = $collection['kicker'];
            break;
        }
        unset($index);
    }
}
?>

<main class="shop">
    <div class="container">

        <nav class="shop-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span class="shop-breadcrumb__sep" aria-hidden="true">/</span>
            <?php if (is_product_category() || is_product_tag() || is_search()) : ?>
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Watches', 'dawp'); ?></a>
                <span class="shop-breadcrumb__sep" aria-hidden="true">/</span>
                <span class="shop-breadcrumb__current"><?php echo esc_html($title); ?></span>
            <?php else : ?>
                <span class="shop-breadcrumb__current"><?php esc_html_e('Watches', 'dawp'); ?></span>
            <?php endif; ?>
        </nav>

        <header class="shop-header">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php echo esc_html($eyebrow); ?></p>
            <h1 class="shop-header__title"><?php echo esc_html($title); ?></h1>
            <p class="shop-header__copy"><?php echo esc_html($description); ?></p>
        </header>

        <div class="shop-toolbar">
            <div class="shop-toolbar__left">
                <button class="shop-filter-btn" type="button" data-shop-filter-open aria-expanded="false" aria-controls="shop-sidebar">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M4 6h16M7 12h10M10 18h4"/></svg>
                    <?php esc_html_e('Collections', 'dawp'); ?>
                </button>
                <span class="shop-count">
                    <?php
                    printf(
                        /* translators: %s: number of watches */
                        esc_html(_n('%s watch', '%s watches', $total, 'dawp')),
                        esc_html(number_format_i18n($total))
                    );
                    ?>
                </span>
            </div>
            <div class="shop-toolbar__right">
                <?php woocommerce_catalog_ordering(); ?>
            </div>
        </div>

        <div class="shop-layout">

            <div class="shop-sidebar-overlay" data-shop-filter-close hidden></div>

            <aside class="shop-sidebar" id="shop-sidebar">
                <div class="shop-sidebar__header">
                    <h2 class="shop-sidebar__mobile-title"><?php esc_html_e('Collections', 'dawp'); ?></h2>
                    <button class="shop-sidebar__close" type="button" data-shop-filter-close aria-label="<?php esc_attr_e('Close collections', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>
                    </button>
                </div>

                <nav class="shop-sidebar__widget" aria-label="<?php esc_attr_e('Collections', 'dawp'); ?>">
                    <h3 class="shop-sidebar__title"><?php esc_html_e('Browse', 'dawp'); ?></h3>
                    <ul class="shop-sidebar__list">
                        <li>
                            <a href="<?php echo esc_url($shop_url); ?>" <?php echo is_shop() ? 'aria-current="page"' : ''; ?>>
                                <?php esc_html_e('All watches', 'dawp'); ?>
                            </a>
                        </li>
                        <?php
                        foreach ($collections as $collection) {
                            $term = get_term_by('slug', $collection['slug'], 'product_cat');

                            if (! $term || is_wp_error($term)) {
                                continue;
                            }
                            ?>
                            <li>
                                <a href="<?php echo esc_url(get_term_link($term)); ?>" <?php echo is_product_category($term->slug) ? 'aria-current="page"' : ''; ?>>
                                    <?php echo esc_html($collection['name']); ?>
                                    <span class="shop-sidebar__count"><?php echo esc_html((int) $term->count); ?></span>
                                </a>
                            </li>
                            <?php
                        }

                        $limited = get_term_by('slug', 'limited-editions', 'product_cat');

                        if ($limited && ! is_wp_error($limited)) :
                            ?>
                            <li>
                                <a href="<?php echo esc_url(get_term_link($limited)); ?>" <?php echo is_product_category($limited->slug) ? 'aria-current="page"' : ''; ?>>
                                    <?php echo esc_html($limited->name); ?>
                                    <span class="shop-sidebar__count"><?php echo esc_html((int) $limited->count); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <div class="shop-sidebar__note">
                    <h3 class="shop-sidebar__title"><?php esc_html_e('Not listed?', 'dawp'); ?></h3>
                    <p><?php esc_html_e('A commission starts from any collection and changes what needs changing.', 'dawp'); ?></p>
                    <a class="c-link" href="<?php echo esc_url(home_url('/custom/')); ?>"><?php esc_html_e('Bespoke', 'dawp'); ?></a>
                </div>

                <?php if (is_active_sidebar('shop-sidebar')) { dynamic_sidebar('shop-sidebar'); } ?>
            </aside>

            <div class="shop-main">
                <?php if (woocommerce_product_loop()) : ?>

                    <ul class="shop-products">
                        <?php
                        while (have_posts()) :
                            the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;
                        ?>
                    </ul>

                    <div class="shop-pagination">
                        <?php do_action('woocommerce_after_shop_loop'); ?>
                    </div>

                <?php else : ?>

                    <div class="shop-empty">
                        <span class="c-rule c-rule--center" aria-hidden="true"></span>
                        <h2><?php esc_html_e('Nothing here yet.', 'dawp'); ?></h2>
                        <p><?php esc_html_e('This collection has no watches available at the moment. New references are added as they leave the bench.', 'dawp'); ?></p>
                        <div class="shop-empty__actions">
                            <a class="c-btn" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('All watches', 'dawp'); ?></a>
                            <a class="c-btn-ghost" href="<?php echo esc_url(home_url('/custom/')); ?>"><?php esc_html_e('Commission one', 'dawp'); ?></a>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
