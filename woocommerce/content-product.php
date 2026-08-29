<?php
/**
 * Content-product: single product card in the shop / homepage loops.
 * Styles in assets/css/shop.css.
 */
defined('ABSPATH') || exit;

global $product;
if (empty($product) || !$product->is_visible()) return;

$cats     = get_the_terms($product->get_id(), 'product_cat');
$cat_name = (!is_wp_error($cats) && !empty($cats)) ? $cats[0]->name : '';
$rating   = $product->get_average_rating();
$rating_count = $product->get_rating_count();
?>
<li <?php wc_product_class('product-card', $product); ?>>
    <a href="<?php the_permalink(); ?>" class="product-card__link" aria-label="<?php the_title_attribute(); ?>">

        <div class="product-card__shell">
            <div class="product-card__inner">
                <div class="product-card__img-wrap">
                    <?php echo dawp_product_responsive_image(
                        $product,
                        'product-card__img',
                        '(max-width: 767px) calc((100vw - 40px) / 2), (max-width: 1199px) calc((100vw - 360px) / 3), 300px'
                    ); ?>
                </div>

                <?php if ($product->is_on_sale()) : ?>
                    <span class="product-card__badge">Sale</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="product-card__meta">
            <div class="product-card__info">
                <h3 class="product-card__title"><?php the_title(); ?></h3>
                <?php if ($cat_name) : ?>
                    <span class="product-card__cat"><?php echo esc_html($cat_name); ?></span>
                <?php endif; ?>
            </div>

            <?php if ($rating_count > 0) : ?>
                <div class="product-card__rating">
                    <?php echo wc_get_rating_html($rating, $rating_count); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <span class="review-count">(<?php echo esc_html($rating_count); ?>)</span>
                </div>
            <?php endif; ?>

            <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
        </div>
    </a>

    <?php
    if ($product->is_purchasable() && $product->is_in_stock() && !$product->is_type('variable')) {
        woocommerce_template_loop_add_to_cart(['class' => 'product-card__atc button ajax_add_to_cart']);
    } else {
        printf(
            '<a href="%s" class="product-card__atc product-card__atc--link">%s</a>',
            esc_url($product->get_permalink()),
            esc_html__('View watch', 'dawp')
        );
    }
    ?>
</li>
