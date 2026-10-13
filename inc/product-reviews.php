<?php
/**
 * Product Reviews Handler
 * Injects sample reviews into product pages
 */

function royalstyled_get_product_reviews($product_id = null) {
    global $product;
    if (!$product_id && $product) {
        $product_id = $product->get_id();
    }

    $reviews = [
        [
            'author'  => 'Marcus_T',
            'date'    => '2026-08-15',
            'rating'  => 4.5,
            'content' => 'Excellent watch. Arrived quickly and exactly as described. The quality is outstanding for the price. Highly recommend RoyalStyled.',
        ],
        [
            'author'  => 'JennyK',
            'date'    => '2026-08-22',
            'rating'  => 5,
            'content' => 'This is my second purchase from RoyalStyled. The attention to detail and craftsmanship is exceptional. Worth every penny.',
        ],
        [
            'author'  => 'DavidL',
            'date'    => '2026-09-03',
            'rating'  => 4,
            'content' => 'Beautiful watch, solid construction. Shipping was fast and the packaging protected it perfectly. Very happy with my purchase.',
        ],
        [
            'author'  => 'SarahM',
            'date'    => '2026-09-10',
            'rating'  => 4.5,
            'content' => 'The dial finish is stunning in person. Looks even better than the photos. Great customer service too—they answered my questions quickly.',
        ],
        [
            'author'  => 'RichardP',
            'date'    => '2026-09-18',
            'rating'  => 5,
            'content' => 'Premium quality at an accessible price point. The movement is smooth and accurate. I will definitely be ordering again.',
        ],
    ];

    return $reviews;
}

function royalstyled_display_product_reviews() {
    global $product;
    if (!$product) {
        return;
    }

    $reviews = royalstyled_get_product_reviews();
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
            <p><?php printf(esc_html(_n('Based on %d review', 'Based on %d reviews', count($reviews), 'dawp')), count($reviews)); ?></p>
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
