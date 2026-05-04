<?php
$categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'parent'     => 0,
]);
?>
<div class="shop-sidebar__widget">
    <h3 class="shop-sidebar__title"><?php esc_html_e('Curated Collections', 'dawp'); ?></h3>
    <ul class="shop-sidebar__categories">
        <?php foreach ($categories as $cat) : ?>
            <li>
                <a href="<?php echo esc_url(get_term_link($cat)); ?>">
                    <?php echo esc_html($cat->name); ?>
                    <span class="shop-sidebar__count">(<?php echo (int) $cat->count; ?>)</span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="shop-sidebar__widget">
    <h3 class="shop-sidebar__title"><?php esc_html_e('Price Range', 'dawp'); ?></h3>
    <?php echo do_shortcode('[woocommerce_price_filter]'); ?>
</div>
