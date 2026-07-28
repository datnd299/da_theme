<?php
/**
 * Product card used by shop and product archives.
 */
defined('ABSPATH') || exit;

global $product;

if (!$product || !$product->is_visible()) {
    return;
}

$category_name = '';
$categories    = get_the_terms($product->get_id(), 'product_cat');

if (!is_wp_error($categories) && !empty($categories)) {
    $category_name = $categories[0]->name;
}
?>

<li <?php wc_product_class('product-card', $product); ?>>
    <a class="product-card__link" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
        <span class="product-card__media">
            <?php
            echo function_exists('dawp_get_product_responsive_image')
                ? dawp_get_product_responsive_image($product, 'product-card__image', 520, 520, '(max-width: 700px) 50vw, (max-width: 1024px) 33vw, 25vw')
                : $product->get_image('woocommerce_single', ['class' => 'product-card__image', 'loading' => 'lazy']);
            ?>
            <?php if ($product->is_on_sale()) : ?>
                <span class="product-card__badge"><?php esc_html_e('Sale', 'dawp'); ?></span>
            <?php endif; ?>
        </span>

        <span class="product-card__body">
            <?php if ($category_name) : ?>
                <span class="product-card__category"><?php echo esc_html($category_name); ?></span>
            <?php endif; ?>
            <span class="product-card__title"><?php the_title(); ?></span>
            <span class="product-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
        </span>
    </a>
</li>
