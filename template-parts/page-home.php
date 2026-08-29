<?php
/**
 * Brickygo homepage.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url        = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$cart_url        = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url     = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$drops_url       = add_query_arg('orderby', 'date', $shop_url);

if (!function_exists('bgs_home_image')) {
    function bgs_home_image($file, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $width = 1200, $height = 900) {
        if (function_exists('dawp_get_home_responsive_image')) {
            return dawp_get_home_responsive_image($file, $alt, $class, $loading, $sizes, $width, $height);
        }

        $src = esc_url(get_template_directory_uri() . '/assets/img/home/' . basename($file));
        return sprintf('<img src="%s" alt="%s" class="%s" loading="%s" width="%d" height="%d" decoding="async">', $src, esc_attr($alt), esc_attr($class), esc_attr($loading), (int) $width, (int) $height);
    }
}

if (!function_exists('bgs_get_products')) {
    function bgs_get_products($args = []) {
        if (!function_exists('wc_get_products')) {
            return [];
        }

        return wc_get_products(wp_parse_args($args, [
            'status' => 'publish',
            'limit'  => 4,
            'return' => 'objects',
        ]));
    }
}

if (!function_exists('bgs_render_product_card')) {
    function bgs_render_product_card($product, $badge = '') {
        if (!$product || !is_a($product, 'WC_Product')) {
            return;
        }

        $product_id = $product->get_id();
        $permalink  = get_permalink($product_id);
        $image      = function_exists('dawp_get_product_responsive_image')
            ? dawp_get_product_responsive_image($product, 'bgs-product-card__img', 560, 560, '(max-width: 699px) 46vw, (max-width: 1023px) 31vw, 23vw')
            : $product->get_image('woocommerce_single', ['class' => 'bgs-product-card__img']);
        ?>
        <article class="bgs-product-card">
            <a class="bgs-product-card__media" href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($product->get_name()); ?>">
                <?php if ($badge) : ?>
                    <span class="bgs-badge"><?php echo esc_html($badge); ?></span>
                <?php elseif ($product->is_on_sale()) : ?>
                    <span class="bgs-badge"><?php esc_html_e('Drop Price', 'dawp'); ?></span>
                <?php endif; ?>
                <?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </a>
            <div class="bgs-product-card__body">
                <p><?php echo esc_html(wp_strip_all_tags(wc_get_product_category_list($product_id, ', ')) ?: __('Collectible', 'dawp')); ?></p>
                <h3><a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
                <div class="bgs-product-card__foot">
                    <strong><?php echo wp_kses_post($product->get_price_html()); ?></strong>
                    <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>
                        <a class="bgs-add add_to_cart_button ajax_add_to_cart" href="<?php echo esc_url($product->add_to_cart_url()); ?>" data-quantity="1" data-product_id="<?php echo esc_attr($product_id); ?>" aria-label="<?php echo esc_attr(sprintf(__('Add %s to cart', 'dawp'), $product->get_name())); ?>">
                            <?php esc_html_e('Add', 'dawp'); ?>
                        </a>
                    <?php else : ?>
                        <a class="bgs-add" href="<?php echo esc_url($permalink); ?>"><?php esc_html_e('View', 'dawp'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </article>
        <?php
    }
}

if (!function_exists('bgs_category_terms')) {
    function bgs_category_terms() {
        if (function_exists('dawp_lbq_product_category_terms')) {
            $terms = dawp_lbq_product_category_terms();
            if ($terms) {
                return array_slice($terms, 0, 7);
            }
        }

        if (!taxonomy_exists('product_cat')) {
            return [];
        }

        $terms = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'number'     => 7,
            'orderby'    => 'menu_order',
        ]);

        return is_wp_error($terms) ? [] : $terms;
    }
}

if (!function_exists('bgs_term_card_copy')) {
    function bgs_term_card_copy($term) {
        $copy = get_term_meta((int) $term->term_id, 'dawp_category_card_copy', true);
        return $copy ?: wp_trim_words(term_description($term, 'product_cat'), 13, '');
    }
}

$new_products    = bgs_get_products(['limit' => 8, 'orderby' => 'date', 'order' => 'DESC']);
$categories      = array_slice(bgs_category_terms(), 0, 4);
$category_images   = ['23.png', '24.png', '25.png', '26.png', '27.png', '28.png', '29.png'];
?>

<div class="bgs-home bgs-home--simple">
    <section class="bgs-hero" aria-labelledby="bgs-hero-title">
        <div class="bgs-shell bgs-hero__grid bgs-hero__grid--refresh">
            <div class="bgs-hero__content">
                <p class="bgs-kicker"><?php esc_html_e('Curated display pieces', 'dawp'); ?></p>
                <h1 id="bgs-hero-title"><?php esc_html_e('BUILD YOUR NEXT SHELF STORY.', 'dawp'); ?></h1>
                <p><?php esc_html_e('Fresh building sets, desk figures and small-run collectibles chosen for people who actually display what they buy.', 'dawp'); ?></p>
                <div class="bgs-actions">
                    <a class="bgs-btn bgs-btn--lime" href="<?php echo esc_url($drops_url); ?>"><?php esc_html_e('New Arrivals', 'dawp'); ?><span aria-hidden="true">-></span></a>
                    <a class="bgs-btn bgs-btn--ghost" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a>
                </div>
            </div>
            <div class="bgs-hero__showcase">
                <div class="bgs-hero__media">
                    <?php echo bgs_home_image('21.png', __('Colorful display collectibles arranged in a clean studio scene.', 'dawp'), 'bgs-hero__img', 'eager', '(max-width: 899px) 100vw, 58vw', 1320, 1060); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <div class="bgs-hero__tag">
                        <span><?php esc_html_e('Shelf Edit', 'dawp'); ?></span>
                        <strong><?php esc_html_e('Small builds, big personality.', 'dawp'); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bgs-section" aria-labelledby="bgs-style-title">
        <div class="bgs-shell">
            <div class="bgs-section__head">
                <p class="bgs-kicker"><?php esc_html_e('Categories', 'dawp'); ?></p>
                <h2 id="bgs-style-title"><?php esc_html_e('SHOP BY STYLE.', 'dawp'); ?></h2>
            </div>
            <div class="bgs-category-grid">
                <?php foreach ($categories as $index => $term) : ?>
                    <a class="bgs-category-card" href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo bgs_home_image($category_images[$index % count($category_images)], $term->name, 'bgs-category-card__img', 'lazy', '(max-width: 699px) 48vw, (max-width: 1023px) 31vw, 18vw', 520, 420); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        <span>
                            <strong><?php echo esc_html($term->name); ?></strong>
                            <small><?php echo esc_html(bgs_term_card_copy($term)); ?></small>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bgs-section bgs-section--paper" aria-labelledby="bgs-drops-title">
        <div class="bgs-shell">
            <div class="bgs-section__bar">
                <div>
                    <p class="bgs-kicker"><?php esc_html_e('New arrivals', 'dawp'); ?></p>
                    <h2 id="bgs-drops-title"><?php esc_html_e('JUST DROPPED.', 'dawp'); ?></h2>
                </div>
                <a class="bgs-text-link" href="<?php echo esc_url($drops_url); ?>"><?php esc_html_e('View all', 'dawp'); ?><span aria-hidden="true">-></span></a>
            </div>
            <div class="bgs-product-grid">
                <?php foreach ($new_products as $product) : ?>
                    <?php bgs_render_product_card($product, __('New', 'dawp')); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bgs-editorial" aria-labelledby="bgs-edit-title">
        <div class="bgs-shell bgs-editorial__grid">
            <div class="bgs-editorial__media">
                <?php echo bgs_home_image('22.png', __('Graphic collectible display with violet lighting and clean negative space.', 'dawp'), 'bgs-editorial__img', 'lazy', '(max-width: 899px) 100vw, 48vw', 980, 980); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
            <div class="bgs-editorial__content">
                <p class="bgs-kicker"><?php esc_html_e('Display Culture', 'dawp'); ?></p>
                <h2 id="bgs-edit-title"><?php esc_html_e('FOR SHELVES, DESKS AND DAILY SETUPS.', 'dawp'); ?></h2>
                <p><?php esc_html_e('A cleaner way to shop collectibles: focused categories, fresh drops and pieces made to be seen.', 'dawp'); ?></p>
                <a class="bgs-btn bgs-btn--ink" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore', 'dawp'); ?><span aria-hidden="true">-></span></a>
            </div>
        </div>
    </section>

</div>
