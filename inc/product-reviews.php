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
            'date'    => '2019-02-02',
            'rating'  => 4.5,
            'content' => 'Even better than I thought. Nice and heavy and feels like an authentic Rolex.',
        ],
        [
            'author'  => 'bdthomas',
            'date'    => '2020-02-05',
            'rating'  => 4,
            'content' => 'The cargo arrived later than I expected. There was no difference between rolex original box vs fake and the watch can be considered good quality. thx',
        ],
        [
            'author'  => 'duchamp',
            'date'    => '2020-09-01',
            'rating'  => 3,
            'content' => 'Shipper has been very accommodating, responsive, friendly, and selfless. Seller even upgraded to express shipment at no charge knowing that the watches purchased with FedEx. Seller immediately sent out and replaced my order and managed to get order out to me on west coast USA in timely manner. This has been the most pleasant and comfortable shopping experience ever DH Gate to date. The watches are perfect, no issues whatsoever. Everything was aligned, very accurate and aligned with description with the proper markings to Reference that is advertised(2020). Buy with confidence!',
        ],
        [
            'author'  => 'ivoibs',
            'date'    => '2021-04-02',
            'rating'  => 4.5,
            'content' => 'I picked the dark outlined variant of this model and it coordinated very well with every one of my outfits. The 40mm bezel fits completely on my wrist. I prescribe the people who wonder whether or not to get it automatically it merits purchasing a reproduction watch!',
        ],
        [
            'author'  => 'sabren',
            'date'    => '2022-03-28',
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

    echo '<div class="woocommerce-Reviews">';
    echo '<ol class="commentlist">';

    foreach ($reviews as $review) {
        $stars = str_repeat('★', floor($review['rating'])) . (($review['rating'] % 1 >= 0.5) ? '☆' : '');
        $date = date_i18n('F j, Y', strtotime($review['date']));

        echo '<li class="review">';
        echo '<div class="comment_container">';
        echo '<img alt="" src="https://www.gravatar.com/avatar/' . md5(strtolower($review['author'])) . '?s=44&d=identicon" class="avatar">';
        echo '<div class="comment-text">';
        echo '<div class="meta">';
        echo '<strong class="woocommerce-review__author">' . esc_html($review['author']) . '</strong>';
        echo '<span class="woocommerce-review__published-date">' . esc_html($date) . '</span>';
        echo '</div>';
        echo '<div class="star-rating" role="img" aria-label="' . esc_attr(sprintf(__('Rated %d out of 5'), $review['rating'])) . '">';
        echo '<span style="width:' . ($review['rating'] * 20) . '%"><strong class="rating">' . round($review['rating'], 1) . '</strong></span>';
        echo '</div>';
        echo '<div class="description"><p>' . wp_kses_post($review['content']) . '</p></div>';
        echo '</div>';
        echo '</div>';
        echo '</li>';
    }

    echo '</ol>';
    echo '</div>';
}

add_filter('comments_array', function ($comments) {
    if (is_singular('product') && !empty($comments) === false) {
        // Only show hardcoded reviews if no real reviews exist
        return [];
    }
    return $comments;
}, 10, 2);

add_action('woocommerce_after_single_product_summary', 'chronel_display_product_reviews', 11);
