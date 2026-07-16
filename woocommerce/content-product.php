<?php
/**
 * Content-product: single product card in the shop loop.
 */
defined('ABSPATH') || exit;

global $product;
if (empty($product) || !$product->is_visible()) return;

$cats     = get_the_terms($product->get_id(), 'product_cat');
$cat_name = (!is_wp_error($cats) && !empty($cats)) ? $cats[0]->name : '';

// Detect the "related products" loop via WooCommerce's own loop prop
// (set by woocommerce_related_products()) rather than is_product(). The
// related-products section is fetched over AJAX (see dawp_ajax_load_related_products()
// in inc/theme-setup.php), and admin-ajax.php requests never satisfy
// is_product() since there's no singular-product main query to match against.
$is_related_loop = 'related' === wc_get_loop_prop('name');

// Card width varies by grid context: 2/4-col "related products" on a single
// product page vs. 2/3/4-col shop/category archive grid (see product.css /
// shop.css). The default WP `sizes` guesses 100vw, causing mobile to fetch a
// far larger image than the ~150-290px card actually needs.
$card_sizes = $is_related_loop
    ? '(min-width: 768px) calc((min(100vw, 1280px) - 108px) / 4), calc((100vw - 48px) / 2)'
    : '(min-width: 1180px) calc((min(100vw, 1280px) - 114px) / 4), (min-width: 1024px) calc((100vw - 88px) / 3), (min-width: 700px) calc((100vw - 72px) / 3), calc((100vw - 48px) / 2)';

// Perf: `.product-card__shell` is a fixed-aspect-ratio box (3:4 for
// "related products" in product.css, 4:5 for the shop/category grid in
// shop.css) filled via object-fit:cover, so request crops from the
// i0.wp.com CDN pipeline (inc/responsive-images.php) at that same ratio
// instead of WooCommerce's uncropped 'woocommerce_single' size. That size's
// auto-generated srcset only steps 300w -> 600w, which forces every 2x-DPR
// mobile card (~140-190px wide, 2-per-row) to download the 600w candidate --
// ~4x the pixels the card actually renders.
$card_ratio = $is_related_loop ? 4 / 3 : 5 / 4;
$card_widths = [160, 240, 320, 440, 600, 800];
$card_srcset_steps = array_map(
    fn($w) => [$w, (int) round($w * $card_ratio)],
    $card_widths
);
?>
<li <?php wc_product_class('product-card', $product); ?>>
    <?php
    // wc_product_class() above just incremented WooCommerce's loop counter,
    // so it now holds this card's 1-based position. Only eager-load the
    // very first card of an archive/shop grid (it's the likely LCP element);
    // everything else -- including "related products" on a single product
    // page, which is always below the fold -- lazy-loads.
    $is_first_in_grid = !$is_related_loop && 1 === (int) wc_get_loop_prop('loop', 0);
    $image_id = $product->get_image_id();
    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        if (!$image_alt) {
            $image_alt = $product->get_name();
        }
        $image_attrs_str = dawp_i0_img_attrs($image_url, [
            'width'   => 480,
            'height'  => (int) round(480 * $card_ratio),
            'srcset'  => $card_srcset_steps,
            'sizes'   => $card_sizes,
            'loading' => $is_first_in_grid ? 'eager' : 'lazy',
        ]);
        if ($is_first_in_grid) {
            $image_attrs_str .= ' fetchpriority="high"';
        }
        $image_html = sprintf(
            '<img class="product-card__img" alt="%s" %s>',
            esc_attr($image_alt),
            $image_attrs_str
        );
    } else {
        $image_attrs = [
            'class'   => 'product-card__img',
            'loading' => $is_first_in_grid ? 'eager' : 'lazy',
            'sizes'   => $card_sizes,
        ];
        if ($is_first_in_grid) {
            $image_attrs['fetchpriority'] = 'high';
        }
        $image_html = $product->get_image('woocommerce_single', $image_attrs);
    }
    ?>
    <a href="<?php the_permalink(); ?>" class="product-card__link" aria-label="<?php the_title_attribute(); ?>">

        <div class="product-card__shell">
            <div class="product-card__inner">
                <div class="product-card__img-wrap">
                    <?php echo $image_html; ?>
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
