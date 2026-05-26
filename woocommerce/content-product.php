<?php
/**
 * Product card used in shop and category loops.
 */
defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}

$cats         = get_the_terms($product->get_id(), 'product_cat');
$cat_name     = (!is_wp_error($cats) && !empty($cats)) ? $cats[0]->name : '';
$loop_index   = (int) wc_get_loop_prop('loop', 0);
$image_attrs  = [
    'class'    => 'product-card__img',
    'loading'  => $loop_index < 4 ? 'eager' : 'lazy',
    'decoding' => 'async',
];
$stock_label  = $product->is_in_stock() ? __('Available', 'dawp') : __('Out of stock', 'dawp');
$detail_label = $cat_name ? $cat_name : __('Dress Shoes', 'dawp');
?>

<li <?php wc_product_class('product-card', $product); ?>>
    <a href="<?php the_permalink(); ?>" class="product-card__link" aria-label="<?php the_title_attribute(); ?>">
        <div class="product-card__shell">
            <div class="product-card__inner">
                <div class="product-card__img-wrap">
                    <?php echo $product->get_image('woocommerce_single', $image_attrs); ?>
                </div>

                <div class="product-card__badges">
                    <?php if ($product->is_on_sale()) : ?>
                        <span class="product-card__badge product-card__badge--sale"><?php esc_html_e('Sale', 'dawp'); ?></span>
                    <?php endif; ?>
                    <span class="product-card__badge"><?php echo esc_html($detail_label); ?></span>
                </div>

                <div class="product-card__cta" aria-hidden="true">
                    <span><?php esc_html_e('View Details', 'dawp'); ?></span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M7 17L17 7M17 7H7M17 7V17"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="product-card__meta">
            <div class="product-card__info">
                <?php if ($cat_name) : ?>
                    <span class="product-card__cat"><?php echo esc_html($cat_name); ?></span>
                <?php endif; ?>
                <h3 class="product-card__title"><?php the_title(); ?></h3>
            </div>

            <div class="product-card__footer">
                <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
                <span class="product-card__stock"><?php echo esc_html($stock_label); ?></span>
            </div>
        </div>
    </a>
</li>
