<?php
/**
 * Customer photo reviews shared by the homepage carousel and the single
 * product page "What customers say" section. Each review keeps the product it was written for,
 * so on product pages it is shown as a store review, not as a review of
 * the current product (no rating/schema impact).
 *
 * Reviews come from customers of the owner's previous store, which now
 * trades as ProudlyWear (same business — confirmed by the owner 2026-10-15).
 * Only add real customer reviews; never invent or borrow them. While the
 * list is empty, the homepage section and the "Customer photos" block are
 * not rendered.
 */

defined('ABSPATH') || exit;

/**
 * Review format:
 * [
 *     'author'  => 'Mike R.',
 *     'img'     => 'mike',            // assets/images/home/reviews/mike.webp (480px wide)
 *     'h'       => 640,               // image height at 480px wide
 *     'slug'    => 'product-slug',    // optional: product it was written for (link shown if it exists)
 *     'product' => 'Product name',    // optional
 *     'title'   => 'Optional title',
 *     'text'    => 'Review text',
 * ]
 */
function dawp_showcase_reviews() {
    return [
        ['author' => 'Michael M.', 'img' => 'michael', 'h' => 638, 'slug' => '', 'product' => __('Jacket', 'dawp'), 'title' => 'It fits perfect', 'text' => 'I have received my jacket and it fits perfect. Thank you so much for that, and hopefully we continue doing business in the future. God bless you all'],
        ['author' => 'Wayne D.', 'img' => 'wayne', 'h' => 640, 'slug' => '', 'product' => __('Hoodie', 'dawp'), 'title' => 'I love my hoodie', 'text' => 'I love my hoodie. Thank you.'],
        ['author' => 'Benita W.', 'img' => 'benita', 'h' => 640, 'slug' => '', 'product' => '', 'title' => 'It is perfect. He loved it!', 'text' => 'It is perfect. He loved it!'],
        ['author' => 'Raymond O.', 'img' => 'raymond', 'h' => 640, 'slug' => '', 'product' => __('Navy sweat jacket & hat', 'dawp'), 'title' => 'It’s 5 stars', 'text' => 'I’m overjoyed with my purchase. It did not take long at all, it’s exactly what it advertises, and I’m grateful that they thought of us veterans. I will wear my Navy sweat jacket and hat with pride.'],
        ['author' => 'Leonard M.', 'img' => 'leonard', 'h' => 686, 'slug' => '', 'product' => __('Bomber jacket', 'dawp'), 'title' => 'Loving my bomber jacket', 'text' => 'Me loving my bomber jacket.'],
        ['author' => 'James C.', 'img' => 'james', 'h' => 640, 'slug' => '', 'product' => '', 'title' => 'Thanks, nice!', 'text' => 'Got my package today, thanks, nice.'],
    ];
}

/**
 * Customer photos for the homepage gallery (tiles of the old store's
 * customer collage): assets/images/home/gallery/customer-NN.webp.
 */
function dawp_customer_gallery_images() {
    $images = [];
    for ($i = 1; $i <= 12; $i++) {
        $images[] = get_template_directory_uri() . sprintf('/assets/images/home/gallery/customer-%02d.webp', $i);
    }
    return $images;
}

/** Alt text / link for a review's product (both optional). */
function dawp_showcase_review_alt($review) {
    return empty($review['product'])
        ? sprintf(__('Photo from customer %s', 'dawp'), $review['author'])
        : sprintf(__('Customer photo of %s', 'dawp'), $review['product']);
}

function dawp_showcase_review_product($review) {
    return empty($review['slug']) ? null : get_page_by_path($review['slug'], OBJECT, 'product');
}

function dawp_showcase_review_img($review) {
    return get_template_directory_uri() . '/assets/images/home/reviews/' . $review['img'] . '.webp';
}

/**
 * A few reviews for one product page: the review written for this product
 * (if any) first, then a per-product rotation so pages don't all match.
 */
function dawp_showcase_reviews_for_product($product_id, $count = 3) {
    $reviews = dawp_showcase_reviews();
    $slug    = get_post_field('post_name', $product_id);

    $own = array_values(array_filter($reviews, static fn($r) => $r['slug'] === $slug));
    $others = array_values(array_filter($reviews, static fn($r) => $r['slug'] !== $slug));
    $offset = $others ? $product_id % count($others) : 0;
    $others = array_merge(array_slice($others, $offset), array_slice($others, 0, $offset));

    return array_slice(array_merge($own, $others), 0, $count);
}

// Reviews tab keeps WooCommerce's own reviews + form; the photo reviews get their own section below.
add_filter('woocommerce_product_tabs', 'dawp_showcase_reviews_tab', 30);
function dawp_showcase_reviews_tab($tabs) {
    if (isset($tabs['reviews'])) {
        $tabs['reviews']['title'] = __('Reviews', 'woocommerce');
    }
    return $tabs;
}

/**
 * "What customers say" — always-visible photo review carousel on the single
 * product page, between the tabs and Related products. Prev/next buttons use
 * the shared [data-carousel] script in main.js. Styles: product.css.
 */
add_action('woocommerce_after_single_product_summary', 'dawp_pdp_reviews_section', 15);
function dawp_pdp_reviews_section() {
    global $product;
    $reviews = $product instanceof WC_Product ? dawp_showcase_reviews_for_product($product->get_id(), count(dawp_showcase_reviews())) : [];

    if (!$reviews) {
        return;
    }
    ?>
    <section class="dawp-pdp-reviews" data-carousel aria-labelledby="dawp-pdp-reviews-title">
        <div class="dawp-pdp-reviews__head">
            <div>
                <p class="dawp-pdp-reviews__eyebrow"><span aria-hidden="true">★</span> <?php esc_html_e('Customer photos', 'dawp'); ?></p>
                <h2 id="dawp-pdp-reviews-title" class="dawp-pdp-reviews__title"><?php esc_html_e('What customers say', 'dawp'); ?></h2>
            </div>
            <div class="dawp-pdp-reviews__nav">
                <button type="button" data-carousel-prev aria-label="<?php esc_attr_e('Previous review', 'dawp'); ?>">←</button>
                <button type="button" data-carousel-next aria-label="<?php esc_attr_e('Next review', 'dawp'); ?>">→</button>
            </div>
        </div>

        <ul class="dawp-pdp-reviews__track" data-carousel-track>
            <?php foreach ($reviews as $review) :
                $review_product = dawp_showcase_review_product($review);
                ?>
                <li class="dawp-pdp-review">
                    <img src="<?php echo esc_url(dawp_showcase_review_img($review)); ?>" alt="<?php echo esc_attr(dawp_showcase_review_alt($review)); ?>" width="480" height="<?php echo esc_attr($review['h']); ?>" loading="lazy" class="dawp-pdp-review__img">
                    <figure class="dawp-pdp-review__body">
                        <span class="dawp-pdp-review__stars" role="img" aria-label="<?php esc_attr_e('5 out of 5 stars', 'dawp'); ?>">★★★★★</span>
                        <?php if (!empty($review['title'])) : ?>
                            <p class="dawp-pdp-review__title"><?php echo esc_html($review['title']); ?></p>
                        <?php endif; ?>
                        <blockquote class="dawp-pdp-review__text">“<?php echo esc_html($review['text']); ?>”</blockquote>
                        <figcaption class="dawp-pdp-review__meta">
                            <span class="dawp-pdp-review__author">— <?php echo esc_html($review['author']); ?></span>
                            <?php if ($review_product) : ?>
                                <a href="<?php echo esc_url(get_permalink($review_product)); ?>"><?php echo esc_html($review['product']); ?></a>
                            <?php elseif (!empty($review['product'])) : ?>
                                <span><?php echo esc_html($review['product']); ?></span>
                            <?php endif; ?>
                        </figcaption>
                    </figure>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <?php
}
