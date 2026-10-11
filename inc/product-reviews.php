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
            'content' => 'Shipper has been very accommodating, responsive, friendly, and selfless. Seller even upgraded to express shipment at no charge knowing that the watches purchased with FedEx. Seller immediately sent out and replaced my order and managed to get order out to me on west coast USA in timely manner. The watches are perfect, no issues whatsoever. Everything was aligned, very accurate and aligned with description. Buy with confidence!',
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

function chronel_display_quality_check() {
    $icons = [
        'finish'   => '<path d="M12 3l2.6 5.3 5.9.9-4.3 4.1 1 5.8L12 16.4 6.8 19.1l1-5.8L3.5 9.2l5.9-.9z"/>',
        'material' => '<path d="M6 3h12l3 6-9 12L3 9z"/><path d="M3 9h18M9 3l3 18M15 3l-3 18"/>',
        'movement' => '<circle cx="12" cy="12" r="8"/><path d="M12 7v5l3 2"/>',
        'value'    => '<path d="M20 12l-8 8-9-9V3h8z"/><circle cx="7.5" cy="7.5" r="1.5"/>',
        'trust'    => '<path d="M12 3l8 3v6c0 4.5-3.4 8.3-8 9-4.6-.7-8-4.5-8-9V6z"/><path d="M8.5 12l2.5 2.5 4.5-5"/>',
    ];
    $groups = [
        [
            'icon'  => 'finish',
            'title' => __('Product Finish & Precision', 'dawp'),
            'items' => [
                __('Design, dimensions, thickness, and weight match specifications exactly', 'dawp'),
                __('Logo, dial, indices, hands, engravings, and serial numbers positioned with razor-sharp accuracy', 'dawp'),
                __('Comfortable fit with exceptional overall finishing quality', 'dawp'),
            ],
        ],
        [
            'icon'  => 'material',
            'title' => __('Premium Materials & Craftsmanship', 'dawp'),
            'items' => [
                __('Stainless Steel 316L/904L with sapphire crystal and ceramic bezel', 'dawp'),
                __('Select models feature premium gold plating for enhanced luxury', 'dawp'),
                __('Every detail—screw threads, water-resistance gaskets, bezel clicks—crafted with meticulous precision', 'dawp'),
            ],
        ],
        [
            'icon'  => 'movement',
            'title' => __('Reliable Swiss & Japanese Movements', 'dawp'),
            'items' => [
                __('Premium automatic movements (Seiko NH35/NH36, Miyota 9015, Sellita SW200-1, ETA 2824-2) selected per model', 'dawp'),
                __('Renowned movements engineered for durability with easy-to-access parts for maintenance', 'dawp'),
                __('Tested for stability, accuracy, power reserve, rotor smoothness, and silent operation', 'dawp'),
            ],
        ],
        [
            'icon'  => 'value',
            'title' => __('Fair Pricing & Exceptional Value', 'dawp'),
            'items' => [
                __('Competitive pricing delivering maximum quality for your investment', 'dawp'),
                __('Premium craftsmanship at accessible price points', 'dawp'),
            ],
        ],
        [
            'icon'  => 'trust',
            'title' => __('Trusted Seller & Buyer Protection', 'dawp'),
            'items' => [
                __('Serving tens of thousands of satisfied customers worldwide', 'dawp'),
                __('Transparent exchange, return, and warranty policies designed to protect your purchase', 'dawp'),
                __('Responsive customer support and reliable shipping', 'dawp'),
            ],
        ],
    ];
    ?>
    <div class="pdp-quality-check">
        <h3 class="pdp-quality-check__title"><?php esc_html_e('Quality Check & Standards', 'dawp'); ?></h3>

        <div class="quality-check-grid">
            <?php foreach ($groups as $group) : ?>
                <div class="quality-check-item">
                    <div class="quality-check-item__head">
                        <span class="quality-check-item__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?php echo $icons[$group['icon']]; // phpcs:ignore WordPress.Security.EscapeOutput -- static SVG ?></svg>
                        </span>
                        <h4><?php echo esc_html($group['title']); ?></h4>
                    </div>
                    <ul>
                        <?php foreach ($group['items'] as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}
