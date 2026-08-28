<?php
/**
 * Content-product: single product card in the shop loop.
 */
defined('ABSPATH') || exit;

global $product;
if (empty($product) || !$product->is_visible()) return;

/**
 * Fire the standard shop-loop hook. This custom card replaces WooCommerce's
 * default loop markup, but WooCommerce (and plugins) also hang non-visual
 * behaviour off `woocommerce_shop_loop` — most importantly per-product
 * structured data (WC_Structured_Data::generate_product_data), which Google
 * Shopping / free listings read on category and search pages.
 */
do_action('woocommerce_shop_loop');

$cats     = get_the_terms($product->get_id(), 'product_cat');
$cat_name = (!is_wp_error($cats) && !empty($cats)) ? $cats[0]->name : '';
$image_id = $product->get_image_id();
$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'woocommerce_single') : '';
$image_url = $image_url ?: (function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_single') : '');
?>
<li <?php wc_product_class('product-card', $product); ?>>
    <a href="<?php the_permalink(); ?>" class="product-card__link" aria-label="<?php the_title_attribute(); ?>">

        <div class="product-card__shell">
            <div class="product-card__inner">
                <div class="product-card__img-wrap">
                    <?php
                    echo qb_responsive_image(
                        $image_url,
                        $product->get_name(),
                        [
                            'class'  => 'product-card__img',
                            'width'  => 560,
                            'height' => 560,
                            'widths' => [240, 320, 420, 560],
                            'sizes'  => '(max-width: 760px) 50vw, (max-width: 1180px) 33vw, 25vw',
                        ]
                    );
                    ?>
                </div>

                <?php if ($product->is_on_sale()) : ?>
                    <span class="product-card__badge">Sale</span>
                <?php endif; ?>

                <div class="product-card__cta" aria-hidden="true">
                    <span>View</span>
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                </div>
            </div>
        </div>

        <div class="product-card__meta">
            <div class="product-card__info">
                <h3 class="product-card__title"><?php the_title(); ?></h3>
                <?php if ($cat_name) : ?>
                    <span class="product-card__cat"><?php echo esc_html($cat_name); ?></span>
                <?php endif; ?>
            </div>
            <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
        </div>

    </a>
</li>
