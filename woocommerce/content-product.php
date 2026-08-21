<?php
/**
 * Product card used by the shop loop, related products, and cross-sells.
 * Styled by .product-card in assets/css/main.css.
 */

defined('ABSPATH') || exit;

global $product;

if (empty($product) || ! $product->is_visible()) {
    return;
}

$terms          = get_the_terms($product->get_id(), 'product_cat');
$collection_name = (! is_wp_error($terms) && ! empty($terms)) ? $terms[0]->name : '';
?>
<li <?php wc_product_class('product-card', $product); ?>>
    <a class="product-card__link" href="<?php the_permalink(); ?>">

        <span class="product-card__media">
            <?php if ($product->is_on_sale()) : ?>
                <span class="product-card__badge"><?php esc_html_e('Sale', 'dawp'); ?></span>
            <?php endif; ?>

            <?php
            echo dawp_product_responsive_image(
                $product,
                'product-card__img',
                '(max-width: 767px) calc((100vw - 56px) / 2), (max-width: 1199px) calc((100vw - 400px) / 3), 300px'
            );
            ?>
        </span>

        <span class="product-card__body">
            <?php if ($collection_name) : ?>
                <span class="product-card__collection"><?php echo esc_html($collection_name); ?></span>
            <?php endif; ?>

            <span class="product-card__title"><?php the_title(); ?></span>

            <span class="product-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
        </span>
    </a>
</li>
