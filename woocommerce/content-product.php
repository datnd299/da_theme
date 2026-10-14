<?php
/**
 * Product card (hm-card): factual flag, one feature line, single price, free-shipping note.
 * @version 9.4.0
 */
defined('ABSPATH') || exit;
global $product;
if (!is_a($product, WC_Product::class) || !$product->is_visible()) return;
$flag = hm_flag($product); $feat = hm_feature_line($product);
?>
<article <?php wc_product_class('hm-card', $product); ?>>
<?php if ($flag) : ?><span class="hm-card__flag"><?php echo esc_html($flag); ?></span><?php endif; ?>
<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><?php echo $product->get_image('woocommerce_thumbnail', ['class' => 'hm-card__img', 'loading' => 'lazy']); ?></a>
<a class="hm-card__title" href="<?php the_permalink(); ?>"><?php echo esc_html($product->get_name()); ?></a>
<?php if ($feat) : ?><p class="hm-card__feat"><?php echo esc_html($feat); ?></p><?php endif; ?>
<div class="hm-price"><?php echo $product->get_price_html(); ?></div><small>Free shipping</small>
<?php woocommerce_template_loop_add_to_cart(['class' => implode(' ', array_filter(['hm-btn', 'button', 'product_type_' . $product->get_type(), $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '', $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '']))]); ?>
</article>
