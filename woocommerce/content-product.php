<?php
/**
 * Product card used in shop and product taxonomy archives.
 */
defined('ABSPATH') || exit;

global $product;

if (empty($product) || ! $product->is_visible()) {
    return;
}

$product_id    = $product->get_id();
$categories    = get_the_terms($product_id, 'product_cat');
$category_name = (! is_wp_error($categories) && ! empty($categories)) ? $categories[0]->name : '';
$rating_count  = $product->get_rating_count();
$average       = $product->get_average_rating();
?>

<li <?php wc_product_class('product-card', $product); ?>>
    <div class="product-card__media">
        <a href="<?php the_permalink(); ?>" class="product-card__image-link" aria-label="<?php the_title_attribute(); ?>">
            <?php echo $product->get_image('woocommerce_thumbnail', ['class' => 'product-card__img', 'loading' => 'lazy']); ?>
        </a>

        <div class="product-card__badges">
            <?php if ($product->is_on_sale()) : ?>
                <span class="product-card__badge product-card__badge--sale"><?php esc_html_e('Sale', 'dawp'); ?></span>
            <?php endif; ?>
            <?php if (! $product->is_in_stock()) : ?>
                <span class="product-card__badge product-card__badge--stock"><?php esc_html_e('Out of stock', 'dawp'); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="product-card__body">
        <?php if ($category_name) : ?>
            <span class="product-card__cat"><?php echo esc_html($category_name); ?></span>
        <?php endif; ?>

        <h3 class="product-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if ($rating_count > 0) : ?>
            <div class="product-card__rating">
                <?php echo wc_get_rating_html($average, $rating_count); ?>
                <span><?php echo esc_html(number_format_i18n($rating_count)); ?></span>
            </div>
        <?php endif; ?>

        <div class="product-card__footer">
            <div class="product-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
            <?php
            woocommerce_template_loop_add_to_cart([
                'class' => implode(' ', array_filter([
                    'button',
                    'product-card__button',
                    'product_type_' . $product->get_type(),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                    $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                ])),
            ]);
            ?>
        </div>
    </div>
</li>
