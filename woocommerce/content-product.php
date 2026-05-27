<?php
/**
 * Product card in archive loops.
 */
defined('ABSPATH') || exit;

global $product;
if (empty($product) || !$product->is_visible()) return;

$cats      = get_the_terms($product->get_id(), 'product_cat');
$cat_name  = (!is_wp_error($cats) && !empty($cats)) ? $cats[0]->name : '';
$permalink = get_permalink($product->get_id());
?>
<li <?php wc_product_class('product-card', $product); ?>>
    <a href="<?php echo esc_url($permalink); ?>" class="product-card__link" aria-label="<?php echo esc_attr(sprintf('View product %s', get_the_title())); ?>">
        <div class="product-card__shell">
            <?php echo $product->get_image('woocommerce_thumbnail', ['class' => 'product-card__img', 'loading' => 'lazy']); ?>

            <?php if ($product->is_on_sale()) : ?>
                <span class="product-card__badge">Sale</span>
            <?php endif; ?>
        </div>

        <div class="product-card__meta">
            <?php if ($cat_name) : ?>
                <span class="product-card__cat"><?php echo esc_html($cat_name); ?></span>
            <?php endif; ?>
            <h3 class="product-card__title"><?php the_title(); ?></h3>
            <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
            <span class="product-card__action">View details</span>
        </div>
    </a>
</li>
