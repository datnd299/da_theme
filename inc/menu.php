<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/'), 'megamenu' => true],
        ['title' => __('America 250', 'dawp'), 'url' => home_url('/product-category/america-250-collection/'), 'megamenu' => false],
        ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/'), 'megamenu' => false],
        ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/'), 'megamenu' => false],
        ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/'), 'megamenu' => false],
    ];
}

function dawp_megamenu_sections() {
    return [
        [
            'title' => __('Featured Collections', 'dawp'),
            'links' => [
                ['title' => __('Best Sellers', 'dawp'), 'url' => home_url('/product-category/best-sellers/'), 'description' => __('Customer favorites ready to gift.', 'dawp')],
                ['title' => __('Veteran Polo Shirts', 'dawp'), 'url' => home_url('/product-category/veteran-polo-shirts/'), 'description' => __('Polished service-pride apparel.', 'dawp')],
                ['title' => __('Veteran Hats', 'dawp'), 'url' => home_url('/product-category/veteran-hats/'), 'description' => __('Everyday caps with military pride.', 'dawp')],
                ['title' => __('America 250 Collection', 'dawp'), 'url' => home_url('/product-category/america-250-collection/'), 'description' => __('Commemorative patriotic designs.', 'dawp')],
            ],
        ],
        [
            'title' => __('Custom Gifts', 'dawp'),
            'links' => [
                ['title' => __('Custom Military Gifts', 'dawp'), 'url' => home_url('/product-category/custom-military-gifts/'), 'description' => __('Personalized names, ranks, and years.', 'dawp')],
                ['title' => __('Patriotic Accessories', 'dawp'), 'url' => home_url('/product-category/patriotic-accessories/'), 'description' => __('Small details with big meaning.', 'dawp')],
                ['title' => __('Father\'s Day Gifts', 'dawp'), 'url' => home_url('/product-category/fathers-day-gifts/'), 'description' => __('Thoughtful picks for military dads.', 'dawp')],
                ['title' => __('Christmas Gifts For Veterans', 'dawp'), 'url' => home_url('/product-category/christmas-gifts-for-veterans/'), 'description' => __('Holiday-ready veteran gifts.', 'dawp')],
            ],
        ],
        [
            'title' => __('Occasions', 'dawp'),
            'links' => [
                ['title' => __('Veterans Day Gifts', 'dawp'), 'url' => home_url('/product-category/veterans-day-gifts/'), 'description' => __('Honor service with lasting keepsakes.', 'dawp')],
                ['title' => __('Memorial Day Gifts', 'dawp'), 'url' => home_url('/product-category/memorial-day-gifts/'), 'description' => __('Respectful gifts for remembrance.', 'dawp')],
                ['title' => __('Independence Day Gifts', 'dawp'), 'url' => home_url('/product-category/independence-day-gifts/'), 'description' => __('Red, white, and blue celebration picks.', 'dawp')],
            ],
        ],
    ];
}

function dawp_product_category_slugs() {
    return [
        'best-sellers',
        'veteran-polo-shirts',
        'veteran-hats',
        'america-250-collection',
        'custom-military-gifts',
        'patriotic-accessories',
        'fathers-day-gifts',
        'veterans-day-gifts',
        'memorial-day-gifts',
        'independence-day-gifts',
        'christmas-gifts-for-veterans',
    ];
}

function dawp_is_current_url($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $target  = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');

    if ($current === '' && $target === '') {
        return true;
    }

    return $current !== '' && $current === $target;
}

function dawp_footer_columns() {
    $account_page_id = function_exists('wc_get_page_id') ? wc_get_page_id('myaccount') : 0;
    $account_url     = $account_page_id > 0 ? get_permalink($account_page_id) : home_url('/my-account/');

    return [
        [
            'title' => __('Shop', 'dawp'),
            'links' => [
                ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
                ['title' => __('Best Sellers', 'dawp'), 'url' => home_url('/product-category/best-sellers/')],
                ['title' => __('Veteran Polo Shirts', 'dawp'), 'url' => home_url('/product-category/veteran-polo-shirts/')],
                ['title' => __('Veteran Hats', 'dawp'), 'url' => home_url('/product-category/veteran-hats/')],
                ['title' => __('America 250 Collection', 'dawp'), 'url' => home_url('/product-category/america-250-collection/')],
                ['title' => __('Custom Military Gifts', 'dawp'), 'url' => home_url('/product-category/custom-military-gifts/')],
            ],
        ],
        [
            'title' => __('Help', 'dawp'),
            'links' => [
                ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
                ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
                ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
                ['title' => __('My Account', 'dawp'), 'url' => $account_url],
                ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
            ],
        ],
        [
            'title' => __('Policy', 'dawp'),
            'links' => [
                ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
                ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ],
        ],
    ];
}
