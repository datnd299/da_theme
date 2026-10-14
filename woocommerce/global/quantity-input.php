<?php
/**
 * Quantity input wrapped in the hm-qty stepper.
 * @version 10.1.0
 */
defined('ABSPATH') || exit;
$label = !empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'woocommerce'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity', 'woocommerce');
?>
<div class="quantity hm-qty"<?php echo 'hidden' === $type ? ' hidden' : ''; ?>>
	<?php do_action('woocommerce_before_quantity_input_field'); ?>
	<?php if ('hidden' !== $type && $max_value !== $min_value) : ?><button type="button" data-step="-1" aria-label="Decrease">−</button><?php endif; ?>
	<label class="screen-reader-text hm-sr" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_attr($label); ?></label>
	<input type="<?php echo esc_attr($type); ?>" <?php echo $readonly ? 'readonly="readonly"' : ''; ?> id="<?php echo esc_attr($input_id); ?>" class="<?php echo esc_attr(join(' ', (array) $classes)); ?>" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($input_value); ?>" aria-label="<?php esc_attr_e('Product quantity', 'woocommerce'); ?>" <?php if (in_array($type, ['text', 'search', 'tel', 'url', 'email', 'password'], true)) : ?>size="4"<?php endif; ?> min="<?php echo esc_attr($min_value); ?>" <?php if (0 < $max_value) : ?>max="<?php echo esc_attr($max_value); ?>"<?php endif; ?> <?php if (!$readonly) : ?>step="<?php echo esc_attr($step); ?>" placeholder="<?php echo esc_attr($placeholder); ?>" inputmode="<?php echo esc_attr($inputmode); ?>" autocomplete="<?php echo esc_attr(isset($autocomplete) ? $autocomplete : 'on'); ?>"<?php endif; ?> />
	<?php if ('hidden' !== $type && $max_value !== $min_value) : ?><button type="button" data-step="1" aria-label="Increase">+</button><?php endif; ?>
	<?php do_action('woocommerce_after_quantity_input_field'); ?>
</div>
