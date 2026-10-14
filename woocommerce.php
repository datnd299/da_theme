<?php
/* WooCommerce wrapper: shop/category archives and single products. Cart/checkout/account use page.php. */
get_header();
woocommerce_breadcrumb();
echo '<div class="hm-wrap">';
if (is_singular('product')) {
    while (have_posts()) { the_post(); wc_get_template_part('content', 'single-product'); }
} else {
    wc_get_template('archive-product.php');
}
echo '</div>';
get_footer();
