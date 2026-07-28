<?php
$categories = function_exists('dawp_lbq_product_category_terms') ? dawp_lbq_product_category_terms() : [];
?>
<div class="shop-sidebar__header">
    <h2 class="shop-sidebar__mobile-title"><?php esc_html_e('Penapis', 'dawp'); ?></h2>
    <button id="filterClose" class="shop-sidebar__close" aria-label="<?php esc_attr_e('Tutup penapis', 'dawp'); ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
</div>
<div class="shop-sidebar__widget">
    <h3 class="shop-sidebar__title"><?php esc_html_e('Koleksi Pilihan', 'dawp'); ?></h3>
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
