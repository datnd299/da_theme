<?php
/**
 * Product Reviews Handler
 * Injects sample reviews into product pages
 */

function chronel_get_product_reviews($product_id = null) {
    global $product;
    if (!$product_id && $product) {
        $product_id = $product->get_id();
    }

    $reviews = [
        [
            'author'  => 'Hilarn',
            'date'    => '2023-02-02',
            'rating'  => 4.5,
            'content' => 'Even better than I thought. Nice and heavy and feels like an authentic Rolex.',
        ],
        [
            'author'  => 'bdthomas',
            'date'    => '2024-02-05',
            'rating'  => 4,
            'content' => 'The cargo arrived later than I expected. There was no difference between rolex original box vs fake and the watch can be considered good quality. thx',
        ],
        [
            'author'  => 'duchamp',
            'date'    => '2025-09-01',
            'rating'  => 3,
            'content' => 'Shipper has been very accommodating, responsive, friendly, and selfless. Seller even upgraded to express shipment at no charge knowing that the watches purchased with FedEx. Seller immediately sent out and replaced my order and managed to get order out to me on west coast USA in timely manner. The watches are perfect, no issues whatsoever. Everything was aligned, very accurate and aligned with description with the proper markings to Reference that is advertised(2020). Buy with confidence!',
        ],
        [
            'author'  => 'ivoibs',
            'date'    => '2026-04-02',
            'rating'  => 4.5,
            'content' => 'I picked the dark outlined variant of this model and it coordinated very well with every one of my outfits. The 40mm bezel fits completely on my wrist. I prescribe the people who wonder whether or not to get it automatically it merits purchasing a reproduction watch!',
        ],
        [
            'author'  => 'sabren',
            'date'    => '2026-03-28',
            'rating'  => 4,
            'content' => 'At the cost this is a phenomenal watch. Just minor issue I have is the dial is very somewhat slanted counterclockwise. Yet, you\'d just notification on a nearby assessment and at the cost I look at that as a success',
        ],
    ];

    return $reviews;
}

function chronel_display_product_reviews() {
    global $product;
    if (!$product) {
        return;
    }

    $reviews = chronel_get_product_reviews();
    if (empty($reviews)) {
        return;
    }

    $average = array_sum(array_column($reviews, 'rating')) / count($reviews);
    $stars   = function ($rating) {
        return '<span class="star-rating" role="img" aria-label="' . esc_attr(sprintf(__('Rated %s out of 5', 'dawp'), round($rating, 1))) . '">'
            . '<span style="width:' . ($rating * 20) . '%"></span></span>';
    };
    ?>
    <div class="pdp-review-summary">
        <strong class="pdp-review-summary__score"><?php echo esc_html(number_format($average, 1)); ?></strong>
        <div>
            <?php echo $stars($average); ?>
            <p><?php printf(esc_html(_n('Based on %d review', 'Based on %d reviews', 135, 'dawp')), 135); ?></p>
        </div>
    </div>
    <ol class="pdp-review-list">
        <?php foreach ($reviews as $review) : ?>
            <li class="pdp-review">
                <header class="pdp-review__head">
                    <span class="pdp-review__avatar" aria-hidden="true"><?php echo esc_html(strtoupper(mb_substr($review['author'], 0, 1))); ?></span>
                    <div>
                        <strong class="pdp-review__author"><?php echo esc_html($review['author']); ?></strong>
                        <time datetime="<?php echo esc_attr($review['date']); ?>"><?php echo esc_html(date_i18n('F j, Y', strtotime($review['date']))); ?></time>
                    </div>
                    <?php echo $stars($review['rating']); ?>
                </header>
                <p class="pdp-review__text"><?php echo esc_html($review['content']); ?></p>
            </li>
        <?php endforeach; ?>
    </ol>
    <?php
}

add_filter('woocommerce_product_review_comment_form_args', function ($args) {
    $args['title_reply'] = __('Write a Review', 'dawp');
    return $args;
});
