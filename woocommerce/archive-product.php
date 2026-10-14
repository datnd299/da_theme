<?php
/**
 * Shop / category archive body (rendered inside woocommerce.php, so no header/footer here).
 * Category "How to choose" guide: term meta hm_guide (HTML) or the category description.
 * @version 8.6.0
 */
defined('ABSPATH') || exit;
$term = is_product_category() ? get_queried_object() : null;
?>
<?php $hm_b = $term ? hm_dept_banner($term->slug) : ''; if ($hm_b) echo '<div class="hm-catbanner">' . hm_pic($hm_b, 'hm-catbanner__pic', false) . '</div>'; ?>
<h1><?php woocommerce_page_title(); ?></h1>
<?php do_action('woocommerce_archive_description'); ?>
<?php $guide = $term ? get_term_meta($term->term_id, 'hm_guide', true) : ''; if ($guide) echo '<div class="hm-guide" id="guide">' . wp_kses_post($guide) . '</div>'; ?>
<div class="hm-shop"><aside class="hm-filters" aria-label="Filters"><fieldset><legend>Departments</legend>
<?php foreach (hm_departments() as $d) echo '<a class="hm-filters__link' . ($term && $term->term_id === $d->term_id ? ' is-current' : '') . '" href="' . esc_url(get_term_link($d)) . '">' . esc_html($d->name) . '</a>'; ?>
</fieldset><?php if (is_active_sidebar('shop-filters')) dynamic_sidebar('shop-filters'); ?></aside>
<section><?php if (woocommerce_product_loop()) : ?>
<div class="hm-toolbar"><div class="hm-chips"></div><?php woocommerce_catalog_ordering(); ?></div>
<?php woocommerce_output_all_notices(); woocommerce_product_loop_start();
while (have_posts()) { the_post(); do_action('woocommerce_shop_loop'); wc_get_template_part('content', 'product'); }
woocommerce_product_loop_end(); echo '<nav class="hm-pager-wrap" aria-label="Pagination">'; woocommerce_pagination(); echo '</nav>';
else : echo hm_coming_soon($term ? html_entity_decode($term->name) : ''); endif; ?></section></div>
