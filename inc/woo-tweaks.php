<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_single_product_summary', 'dawp_single_product_trust_badges', 31);
add_action('woocommerce_after_single_product_summary', 'dawp_single_product_pride_banner', 8);
add_action('woocommerce_after_single_product_summary', 'dawp_single_product_customer_stories', 15);

function dawp_product_icon($path, $label = '') {
    return sprintf(
        '<svg class="dawp-product-icon" viewBox="0 0 24 24" aria-hidden="%1$s" role="img">%2$s</svg>',
        $label ? 'false' : 'true',
        $path
    );
}

function dawp_single_product_trust_badges() {
    $badges = array(
        array(
            'icon' => '<path d="M12 3l7 3v5c0 4.5-2.9 8.5-7 10-4.1-1.5-7-5.5-7-10V6l7-3z"/><path d="M8.8 12.1l2.1 2.1 4.5-5"/>',
            'title' => __('Proudly American Style', 'dawp'),
            'copy' => __('Red, white, and blue designs made for everyday pride.', 'dawp'),
        ),
        array(
            'icon' => '<path d="M4 7h10v10H4z"/><path d="M14 10h3l3 3v4h-6z"/><path d="M7 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M17 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>',
            'title' => __('U.S. Shipping', 'dawp'),
            'copy' => __('Packed with care and shipped across the United States.', 'dawp'),
        ),
        array(
            'icon' => '<path d="M12 2l2.7 6.1 6.6.6-5 4.4 1.5 6.5L12 16.2 6.2 19.6l1.5-6.5-5-4.4 6.6-.6L12 2z"/>',
            'title' => __('Gift-Ready Favorite', 'dawp'),
            'copy' => __('A meaningful pick for families and proud Americans.', 'dawp'),
        ),
    );
    ?>
    <section class="dawp-product-trust" aria-label="<?php esc_attr_e('Product trust highlights', 'dawp'); ?>">
        <?php foreach ($badges as $badge) : ?>
            <div class="dawp-product-trust__item">
                <span class="dawp-product-trust__icon"><?php echo dawp_product_icon($badge['icon']); ?></span>
                <span>
                    <strong><?php echo esc_html($badge['title']); ?></strong>
                    <small><?php echo esc_html($badge['copy']); ?></small>
                </span>
            </div>
        <?php endforeach; ?>
    </section>
    <?php
}

function dawp_single_product_pride_banner() {
    ?>
    <section class="dawp-pride-banner" aria-label="<?php esc_attr_e('American pride product message', 'dawp'); ?>">
        <div class="dawp-pride-banner__emblem" aria-hidden="true">
            <span>★</span>
        </div>
        <div class="dawp-pride-banner__content">
            <p><?php esc_html_e('American Pride Collection', 'dawp'); ?></p>
            <h2><?php esc_html_e('Wear the colors. Carry the pride.', 'dawp'); ?></h2>
            <small><?php esc_html_e('Patriotic shirts and gifts made for proud everyday moments.', 'dawp'); ?></small>
        </div>
    </section>
    <?php
}

function dawp_single_product_customer_stories() {
    $stories = array(
        array(__('The print looked sharp and the patriotic colors felt respectful, not loud. My dad wore it the same weekend it arrived.', 'dawp'), __('Michael R.', 'dawp'), __('Verified buyer', 'dawp')),
        array(__('A thoughtful gift for our family gathering. The details made it feel personal and the ordering process was simple.', 'dawp'), __('Susan K.', 'dawp'), __('Texas', 'dawp')),
        array(__('Comfortable, clean design, and exactly the kind of American pride piece I wanted for everyday wear.', 'dawp'), __('James W.', 'dawp'), __('Verified buyer', 'dawp')),
        array(__('Bought this as a birthday gift and it felt special right away. The colors are rich and the message is easy to love.', 'dawp'), __('Patricia L.', 'dawp'), __('Florida', 'dawp')),
        array(__('The design has a strong patriotic look without feeling overdone. It was a hit at our family cookout.', 'dawp'), __('Robert H.', 'dawp'), __('Verified buyer', 'dawp')),
        array(__('Great gift for my husband. He liked the fit, the print, and the easy everyday style.', 'dawp'), __('Angela M.', 'dawp'), __('Verified buyer', 'dawp')),
        array(__('Everything arrived neatly packed and ready to give. The product looked even better in person.', 'dawp'), __('David C.', 'dawp'), __('Ohio', 'dawp')),
        array(__('A clean American pride piece that feels personal. I would absolutely order again.', 'dawp'), __('Karen T.', 'dawp'), __('Repeat customer', 'dawp')),
    );
    ?>
    <section class="dawp-customer-stories" data-review-slider aria-label="<?php esc_attr_e('Customer reviews', 'dawp'); ?>">
        <div class="dawp-customer-stories__heading">
            <div>
                <p><?php esc_html_e('Loved by Proud Customers', 'dawp'); ?></p>
                <h2><?php esc_html_e('Real gift moments, shared with pride.', 'dawp'); ?></h2>
            </div>
            <div class="dawp-customer-stories__controls" aria-label="<?php esc_attr_e('Review slider controls', 'dawp'); ?>">
                <button class="dawp-customer-stories__button" type="button" data-review-prev aria-label="<?php esc_attr_e('Previous reviews', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <button class="dawp-customer-stories__button" type="button" data-review-next aria-label="<?php esc_attr_e('Next reviews', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
                </button>
            </div>
        </div>
        <div class="dawp-customer-stories__viewport">
        <div class="dawp-customer-stories__track" data-review-track>
            <?php foreach ($stories as $story) : ?>
                <article class="dawp-customer-card" data-review-slide>
                    <div class="dawp-customer-card__stars" aria-label="<?php esc_attr_e('5 out of 5 stars', 'dawp'); ?>" aria-hidden="false">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p><?php echo esc_html($story[0]); ?></p>
                    <footer>
                        <strong><?php echo esc_html($story[1]); ?></strong>
                        <span><?php echo esc_html($story[2]); ?></span>
                    </footer>
                </article>
            <?php endforeach; ?>
        </div>
        </div>
        <div class="dawp-customer-stories__dots" aria-label="<?php esc_attr_e('Review slider pages', 'dawp'); ?>">
            <?php foreach ($stories as $index => $story) : ?>
                <button type="button" data-review-dot data-active="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr(sprintf(__('Go to review %d', 'dawp'), $index + 1)); ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}
