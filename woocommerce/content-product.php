<?php
/**
 * Content-product: single product card in the shop loop.
 */
defined('ABSPATH') || exit;

global $product;
if (empty($product) || !$product->is_visible()) return;

$cats     = get_the_terms($product->get_id(), 'product_cat');
$cat_name = '';
$image_id = $product->get_image_id();
$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'woocommerce_single') : '';

if (!$image_url && function_exists('wc_placeholder_img_src')) {
    $image_url = wc_placeholder_img_src('woocommerce_single');
}

if (!is_wp_error($cats) && !empty($cats)) {
    foreach ($cats as $cat) {
        if (!in_array($cat->slug, dawp_hidden_product_category_slugs(), true)) {
            $cat_name = $cat->name;
            break;
        }
    }
}
?>
<li <?php wc_product_class('product-card', $product); ?>>
    <a href="<?php the_permalink(); ?>" class="product-card__link" aria-label="<?php the_title_attribute(); ?>">

        <div class="product-card__shell">
            <div class="product-card__inner">
                <div class="product-card__img-wrap">
                    <img <?php echo dawp_i0_img_attrs($image_url, [
                             'width'  => 600,
                             'height' => 600,
                             'srcset' => [[300, 300], [450, 450], [600, 600], [900, 900]],
                             'sizes'  => '(max-width: 640px) 50vw, (max-width: 1024px) 33vw, 280px',
                         ]); ?>
                         class="product-card__img"
                         alt="<?php echo esc_attr($product->get_name()); ?>">
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
