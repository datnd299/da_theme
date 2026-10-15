<?php
/**
 * Customer photo reviews shared by the homepage carousel and the single
 * product Reviews tab. Each review keeps the product it was written for,
 * so on product pages it is shown as a store review, not as a review of
 * the current product (no rating/schema impact).
 */

defined('ABSPATH') || exit;

function dawp_showcase_reviews() {
    return [
        ['author' => 'Ally', 'img' => 'ally', 'h' => 613, 'slug' => 'munchlax-shirt-snorlax-shirt-pokemon-shirt-anime-shirt-vintage-tee', 'product' => 'Munchlax Shirt, Snorlax Shirt, Vintage Tee', 'text' => 'They really hit the nail on the head with the vintage look and feel of these shirts! I got this one and one other, I love the inspiration from the hulk, such a classic design, vibrant but not too bright, blends perfectly with the ashy tone going on with the shirt! I highly recommend to any Pokemon fans who want that vintage oversized fit but don’t want to spend vintage type of money, the price point for these are actually very reasonable too. I wish I could shout this brand to the rooftops. I got so many compliments on both shirts. I got a size large despite me being 5’2 and 125lbs, because I wasn’t sure how oversized it would actually be, but oh yeah, it’s oversized but in the best way. And if I ever want a tighter fit I can always just tie the shirt up and it still looks amazing! Thank you so much! 6/5 stars if I could! Much love 🫶'],
        ['author' => 'Balti', 'img' => 'balti', 'h' => 983, 'slug' => 'neon-genesis-evangelion-tank-top-anime-tank-top-vintage-tank-top', 'product' => 'Neon Genesis Evangelion Tank Top', 'text' => 'Insane look. Got some compliments already from random people in the streets.'],
        ['author' => 'Johnathan T.', 'img' => 'johnathan', 'h' => 640, 'slug' => 'gundam-tank-top-anime-tank-top-vintage-tank-top', 'product' => 'Gundam Tank Top', 'text' => 'My fav Gundam on a tank?! I need more Heavyarms prints please lol I was sent the wrong size originally and I notified customer service the same day I got it in the mail. They responded so fast and had a new shirt in the correct size out to me within the week, free of charge!!'],
        ['author' => 'Francisco G.', 'img' => 'francisco', 'h' => 854, 'slug' => 'rayquaza-shirt-pokemon-shirt-anime-shirt-vintage-t-shirt-2-sided', 'product' => 'Rayquaza Shirt, Vintage T-Shirt 2-Sided', 'text' => 'This shirt is perfect.'],
        ['author' => 'Tayloreonn', 'img' => 'tayloreonn', 'h' => 640, 'slug' => 'espeon-shirt-anime-vintage-tee', 'product' => 'Espeon Shirt, Vintage Tee', 'text' => 'I love this shirt so much! I got it in the lavender and it’s the perfect oversized espeon moment!'],
        ['author' => 'Ryan J.', 'img' => 'ryan', 'h' => 640, 'slug' => 'sesshomaru-inuyasha-anime-streetwear-vintage-unisex-oversized-t-shirt', 'product' => 'Sesshomaru Shirt, Inuyasha Shirt', 'title' => 'Love the Shirt', 'text' => 'The shirt was comfy and fit great. Nice and soft and also flexible. I got to to wear the shirt to meet David Kaye the voice actor for Sesshomaru!!'],
    ];
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

// Prepend the photo reviews to the Reviews tab; WC's own reviews + form follow.
add_filter('woocommerce_product_tabs', 'dawp_showcase_reviews_tab', 30);
function dawp_showcase_reviews_tab($tabs) {
    if (isset($tabs['reviews'])) {
        $tabs['reviews']['callback'] = 'dawp_showcase_reviews_render_tab';
    }
    return $tabs;
}

function dawp_showcase_reviews_render_tab() {
    global $product;
    $reviews = $product instanceof WC_Product ? dawp_showcase_reviews_for_product($product->get_id()) : [];

    if ($reviews) : ?>
        <section class="dawp-store-reviews" aria-labelledby="dawp-store-reviews-title">
            <h2 id="dawp-store-reviews-title" class="woocommerce-Reviews-title"><?php esc_html_e('Customer photos', 'dawp'); ?> <span><?php esc_html_e('— from across the store', 'dawp'); ?></span></h2>
            <ul class="dawp-store-reviews__list">
                <?php foreach ($reviews as $review) :
                    $review_product = get_page_by_path($review['slug'], OBJECT, 'product');
                    ?>
                    <li class="dawp-store-review">
                        <img src="<?php echo esc_url(dawp_showcase_review_img($review)); ?>" alt="<?php echo esc_attr(sprintf(__('Customer photo of %s', 'dawp'), $review['product'])); ?>" width="480" height="<?php echo esc_attr($review['h']); ?>" loading="lazy" class="dawp-store-review__img">
                        <figure class="dawp-store-review__body">
                            <span class="dawp-store-review__stars" role="img" aria-label="<?php esc_attr_e('5 out of 5 stars', 'dawp'); ?>">★★★★★</span>
                            <?php if (!empty($review['title'])) : ?>
                                <p class="dawp-store-review__title"><?php echo esc_html($review['title']); ?></p>
                            <?php endif; ?>
                            <blockquote class="dawp-store-review__text">“<?php echo esc_html($review['text']); ?>”</blockquote>
                            <figcaption class="dawp-store-review__meta">
                                <span class="dawp-store-review__author">— <?php echo esc_html($review['author']); ?></span>
                                <?php if ($review_product) : ?>
                                    <a href="<?php echo esc_url(get_permalink($review_product)); ?>"><?php echo esc_html($review['product']); ?></a>
                                <?php else : ?>
                                    <span><?php echo esc_html($review['product']); ?></span>
                                <?php endif; ?>
                            </figcaption>
                        </figure>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif;

    comments_template();
}
