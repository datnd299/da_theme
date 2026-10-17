<?php
/**
 * Empty-cart content for the WooCommerce Cart block.
 *
 * Replaces the block's default "Your cart is currently empty" / "New in store"
 * content (hidden in cart.css) with a tire finder, best-selling tires and
 * store promises read from dawp_store_facts().
 */

add_filter('render_block', 'dawp_enhance_empty_cart_block', 10, 2);

function dawp_enhance_empty_cart_block($block_content, $block) {
    $empty_cart_blocks = ['woocommerce/empty-cart', 'woocommerce/empty-cart-block'];

    if (empty($block['blockName']) || !in_array($block['blockName'], $empty_cart_blocks, true)) {
        return $block_content;
    }

    return dawp_render_empty_cart_intro() . $block_content . dawp_render_empty_cart_extras();
}

function dawp_render_empty_cart_intro() {
    ob_start();
    ?>
    <section class="cart-empty-intro" aria-labelledby="cart-empty-title">
        <div class="cart-empty-intro__copy">
            <span class="cart-empty-intro__eyebrow"><?php esc_html_e('Your cart is empty', 'dawp'); ?></span>
            <h2 id="cart-empty-title"><?php esc_html_e('Let’s find tires that fit.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Enter the size printed on your sidewall (for example 225/65R17), or browse by brand. Every order ships free by ground to the contiguous U.S.', 'dawp'); ?></p>
            <a class="cart-empty-intro__link" href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">
                <?php esc_html_e('How to read your tire size', 'dawp'); ?>
            </a>
        </div>
        <div class="cart-empty-intro__finder">
            <?php dawp_tire_finder(['id' => 'cart-tf', 'variant' => 'hero', 'title' => 'Find tires that fit']); ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function dawp_render_empty_cart_extras() {
    $tires = function_exists('dawp_featured_tires') ? dawp_featured_tires(4) : [];

    ob_start();
    ?>
    <section class="cart-empty-extras" aria-label="<?php esc_attr_e('Popular tires', 'dawp'); ?>">
        <?php if (!empty($tires)) : ?>
            <div class="cart-empty-section-head">
                <h2><?php esc_html_e('Popular tires right now', 'dawp'); ?></h2>
                <a href="<?php echo esc_url(dawp_shop_url()); ?>"><?php esc_html_e('Shop all tires', 'dawp'); ?></a>
            </div>
            <ul class="tire-grid tire-grid--4">
                <?php
                foreach ($tires as $product) {
                    dawp_render_tire_card($product);
                }
                ?>
            </ul>
        <?php endif; ?>

        <ul class="cart-empty-promises">
            <li>
                <strong><?php esc_html_e('Free ground shipping', 'dawp'); ?></strong>
                <span><?php echo esc_html(sprintf('Ships in %s, delivered in %s.', dawp_store_fact('processing'), dawp_store_fact('transit'))); ?></span>
            </li>
            <li>
                <strong><?php echo esc_html(sprintf('%d-day returns', dawp_store_fact('return_window'))); ?></strong>
                <span><?php esc_html_e('On new tires that have not been mounted or driven on.', 'dawp'); ?></span>
            </li>
            <li>
                <strong><?php esc_html_e('Ship to your installer', 'dawp'); ?></strong>
                <span><?php esc_html_e('Use your local shop’s name and address as the shipping address at checkout.', 'dawp'); ?></span>
            </li>
        </ul>
    </section>
    <?php
    return ob_get_clean();
}
