<?php
/**
 * Product gallery as hm-gallery.
 * @version 10.5.0
 */
defined('ABSPATH') || exit;
global $product;
$ids = array_filter(array_merge([$product->get_image_id()], $product->get_gallery_image_ids()));
$main = $ids ? wp_get_attachment_image_url($ids[0], 'woocommerce_single') : wc_placeholder_img_src('woocommerce_single');
?>
<div class="hm-gallery woocommerce-product-gallery">
<img class="hm-gallery__main" src="<?php echo esc_url($main); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
<?php if (count($ids) > 1) : ?><div class="hm-gallery__thumbs"><?php foreach ($ids as $i => $id) : $src = wp_get_attachment_image_url($id, 'woocommerce_single'); ?><button type="button" aria-pressed="<?php echo $i ? 'false' : 'true'; ?>" data-src="<?php echo esc_url($src); ?>" aria-label="View <?php echo $i + 1; ?>"><?php echo wp_get_attachment_image($id, 'woocommerce_gallery_thumbnail', false, ['alt' => '']); ?></button><?php endforeach; ?></div><?php endif; ?>
</div>
