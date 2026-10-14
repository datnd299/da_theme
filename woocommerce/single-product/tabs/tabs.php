<?php
/**
 * Product tabs as hm-tabs (ARIA tabs, arrow keys handled by hm.js).
 * @version 9.8.0
 */
defined('ABSPATH') || exit;
$product_tabs = apply_filters('woocommerce_product_tabs', array());
if (empty($product_tabs)) return;
$first = true; ?>
<div class="hm-tabs woocommerce-tabs"><div role="tablist" aria-label="Product information">
<?php foreach ($product_tabs as $key => $t) : ?><button role="tab" id="hm-tab-<?php echo esc_attr($key); ?>" aria-controls="hm-panel-<?php echo esc_attr($key); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>"<?php echo $first ? '' : ' tabindex="-1"'; ?>><?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $t['title'], $key)); ?></button><?php $first = false; endforeach; ?>
</div>
<?php $first = true; foreach ($product_tabs as $key => $t) : ?>
<div role="tabpanel" id="hm-panel-<?php echo esc_attr($key); ?>" aria-labelledby="hm-tab-<?php echo esc_attr($key); ?>"<?php echo $first ? '' : ' hidden'; ?>><?php if (isset($t['callback'])) call_user_func($t['callback'], $key, $t); ?></div>
<?php $first = false; endforeach; ?>
<?php do_action('woocommerce_product_after_tabs'); ?>
</div>
