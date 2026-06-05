<?php
/**
 * Template Part: ToyocarTV Homepage
 */

$theme_uri                = get_template_directory_uri();
$hero_image_original      = $theme_uri . '/assets/img/toyocartv/toyocartv-hero.png';
$accessory_image_original = $theme_uri . '/assets/img/toyocartv/toyocartv-accessories.png';
$hero_image               = dawp_i0_image_url($hero_image_original, 1672, 941);
$accessory_image          = dawp_i0_image_url($accessory_image_original, 1448, 1086);
$card_image_base          = $theme_uri . '/assets/img/toyocartv/';
$shop_url                 = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!function_exists('toyocartv_category_url')) {
    function toyocartv_category_url($slug) {
        if (taxonomy_exists('product_cat')) {
            $term = get_term_by('slug', $slug, 'product_cat');

            if ($term && !is_wp_error($term)) {
                $link = get_term_link($term);

                if (!is_wp_error($link)) {
                    return $link;
                }
            }
        }

        return function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
    }
}

if (!function_exists('toyocartv_home_products')) {
    function toyocartv_home_products($args, $fallback_to_date = false) {
        if (!function_exists('wc_get_products')) {
            return [];
        }

        $defaults = [
            'status' => 'publish',
            'limit'  => 8,
            'return' => 'objects',
        ];

        $products = wc_get_products(array_merge($defaults, $args));

        if (empty($products) && $fallback_to_date) {
            $products = wc_get_products(array_merge($defaults, [
                'orderby' => 'date',
                'order'   => 'DESC',
            ]));
        }

        return $products;
    }
}

if (!function_exists('toyocartv_product_collection_label')) {
    function toyocartv_product_collection_label($product) {
        if (!$product || !function_exists('wc_get_product_terms')) {
            return __('Compatible-style accessory', 'dawp');
        }

        $terms = wc_get_product_terms($product->get_id(), 'product_cat', ['fields' => 'all']);

        foreach ($terms as $term) {
            $name = strtolower($term->name);

            if (strpos($name, 'tacoma') !== false || strpos($name, '4runner') !== false || strpos($name, 'fj cruiser') !== false || strpos($name, 'tundra') !== false) {
                return $term->name;
            }
        }

        return __('Compatible-style accessory', 'dawp');
    }
}

if (!function_exists('toyocartv_product_card')) {
    function toyocartv_product_card($product) {
        if (!$product) {
            return;
        }
        ?>
        <article class="tt-product-card">
            <a class="tt-product-card__media" href="<?php echo esc_url($product->get_permalink()); ?>" aria-label="<?php echo esc_attr($product->get_name()); ?>">
                <?php
                echo dawp_product_responsive_image($product, [
                    'class'         => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail',
                    'width'         => 600,
                    'height'        => 600,
                    'srcset_widths' => [260, 360, 520, 600],
                    'sizes'         => '(max-width: 760px) 86vw, (max-width: 1100px) 50vw, 25vw',
                    'loading'       => 'lazy',
                ]);
                ?>
            </a>
            <div class="tt-product-card__body">
                <span class="tt-product-card__meta"><?php echo esc_html(toyocartv_product_collection_label($product)); ?></span>
                <h3>
                    <a href="<?php echo esc_url($product->get_permalink()); ?>">
                        <?php echo esc_html($product->get_name()); ?>
                    </a>
                </h3>
                <div class="tt-product-card__foot">
                    <span class="tt-product-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                    <a class="tt-product-card__link" href="<?php echo esc_url($product->get_permalink()); ?>">
                        <?php esc_html_e('View Product', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </article>
        <?php
    }
}

if (!function_exists('toyocartv_home_reviews')) {
    function toyocartv_home_reviews($limit = 3) {
        if (!function_exists('get_comments')) {
            return [];
        }

        return get_comments([
            'status'     => 'approve',
            'type'       => 'review',
            'number'     => $limit,
            'post_type'  => 'product',
            'orderby'    => 'comment_date_gmt',
            'order'      => 'DESC',
            'meta_query' => [
                [
                    'key'     => 'rating',
                    'compare' => 'EXISTS',
                ],
            ],
        ]);
    }
}

if (!function_exists('toyocartv_review_initials')) {
    function toyocartv_review_initials($name) {
        $name  = trim((string) $name);
        $parts = preg_split('/\s+/', $name);

        if (empty($parts[0])) {
            return 'CR';
        }

        $first = strtoupper(substr($parts[0], 0, 1));
        $last  = !empty($parts[1]) ? strtoupper(substr(end($parts), 0, 1)) : '';

        return $first . $last;
    }
}

$vehicle_collections = [
    [
        'title' => 'Tacoma Accessories',
        'copy'  => 'Interior, exterior, and driver lifestyle accessories for Tacoma-style truck owners.',
        'slug'  => 'tacoma-accessories',
        'image' => dawp_i0_image_url($card_image_base . 'home-card-tacoma.png', 560, 720),
        'links' => [
            ['Tacoma Interior', 'tacoma-interior'],
            ['Tacoma Exterior', 'tacoma-exterior'],
            ['Tacoma Merch', 'tacoma-merch'],
        ],
    ],
    [
        'title' => '4Runner Accessories',
        'copy'  => 'Practical interior, exterior, and merch picks for 4Runner-style adventures.',
        'slug'  => '4runner-accessories',
        'image' => dawp_i0_image_url($card_image_base . 'home-card-4runner.png', 560, 720),
        'links' => [
            ['4Runner Interior', '4runner-interior'],
            ['4Runner Exterior', '4runner-exterior'],
            ['4Runner Merch', '4runner-merch'],
        ],
    ],
    [
        'title' => 'FJ Cruiser Accessories',
        'copy'  => 'Utility-focused add-ons and lifestyle merch for FJ Cruiser-style vehicles.',
        'slug'  => 'fj-cruiser-accessories',
        'image' => dawp_i0_image_url($card_image_base . 'home-card-fj-cruiser.png', 560, 720),
        'links' => [
            ['FJ Cruiser Interior', 'fj-cruiser-interior'],
            ['FJ Cruiser Exterior', 'fj-cruiser-exterior'],
            ['FJ Cruiser Merch', 'fj-cruiser-merch'],
        ],
    ],
    [
        'title' => 'Tundra Accessories',
        'copy'  => 'Interior, exterior, and everyday accessories for Tundra-style truck owners.',
        'slug'  => 'tundra-accessories',
        'image' => dawp_i0_image_url($card_image_base . 'home-card-tundra.png', 560, 720),
        'links' => [
            ['Tundra Interior', 'tundra-interior'],
            ['Tundra Exterior', 'tundra-exterior'],
            ['Tundra Merch', 'tundra-merch'],
        ],
    ],
];

$use_cards = [
    [
        'title' => 'Interior Accessories',
        'copy'  => 'Organizers, holders, storage add-ons, and comfort upgrades for daily driving.',
        'cta'   => 'Shop Interior',
        'slug'  => 'interior-accessories',
        'image' => dawp_i0_image_url($card_image_base . 'home-card-interior.png', 760, 720),
    ],
    [
        'title' => 'Exterior Accessories',
        'copy'  => 'Simple exterior add-ons, guards, covers, and protective details for your vehicle.',
        'cta'   => 'Shop Exterior',
        'slug'  => 'exterior-accessories',
        'image' => dawp_i0_image_url($card_image_base . 'home-card-exterior.png', 760, 720),
    ],
    [
        'title' => 'Driver Lifestyle Merch',
        'copy'  => 'Caps, shirts, stickers, keychains, and garage-friendly lifestyle picks.',
        'cta'   => 'Shop Merch',
        'slug'  => 'driver-merch',
        'image' => dawp_i0_image_url($card_image_base . 'home-card-merch.png', 760, 720),
    ],
];

$new_arrivals = toyocartv_home_products([
    'orderby' => 'date',
    'order'   => 'DESC',
]);

$customer_favorites = toyocartv_home_products([
    'orderby' => 'popularity',
    'order'   => 'DESC',
], true);

$customer_reviews = toyocartv_home_reviews(10);
$sample_customer_reviews = [
    [
        'author'  => 'Michael Carter',
        'product' => 'Interior Organizer',
        'rating'  => 5,
        'text'    => 'The organizer keeps small items in place and makes the cabin feel cleaner during daily driving.',
    ],
    [
        'author'  => 'Sarah Nguyen',
        'product' => 'Exterior Add-On',
        'rating'  => 5,
        'text'    => 'The product details were easy to understand, and the accessory matched the practical look I wanted.',
    ],
    [
        'author'  => 'David Miller',
        'product' => 'Truck Storage Accessory',
        'rating'  => 5,
        'text'    => 'A useful upgrade for keeping everyday gear organized without making the vehicle feel crowded.',
    ],
    [
        'author'  => 'Emily Johnson',
        'product' => 'Driver Lifestyle Merch',
        'rating'  => 4,
        'text'    => 'Good everyday merch with a clean style. It works well as a small gift for a truck enthusiast.',
    ],
    [
        'author'  => 'Chris Anderson',
        'product' => 'Console Accessory',
        'rating'  => 5,
        'text'    => 'Simple, practical, and easy to use. It helped reduce clutter around the center console.',
    ],
    [
        'author'  => 'Jessica Brown',
        'product' => 'Protective Exterior Detail',
        'rating'  => 5,
        'text'    => 'The accessory gives the vehicle a more finished look while still feeling subtle and functional.',
    ],
    [
        'author'  => 'Daniel Wilson',
        'product' => 'Storage Tray',
        'rating'  => 4,
        'text'    => 'Helpful for daily essentials like keys, cards, and cables. The cabin feels easier to manage.',
    ],
    [
        'author'  => 'Amanda Lee',
        'product' => 'Interior Upgrade',
        'rating'  => 5,
        'text'    => 'The fitment notes made shopping easier, and the accessory is a practical addition for regular use.',
    ],
    [
        'author'  => 'Ryan Thompson',
        'product' => 'Garage-Friendly Merch',
        'rating'  => 5,
        'text'    => 'Clean design and easy to pair with other truck lifestyle items. Nice addition to the collection.',
    ],
    [
        'author'  => 'Olivia Martinez',
        'product' => 'Everyday Auto Accessory',
        'rating'  => 5,
        'text'    => 'A straightforward accessory that makes the vehicle more convenient without adding anything complicated.',
    ],
];
$using_sample_reviews = empty($customer_reviews);
$homepage_reviews     = $using_sample_reviews ? $sample_customer_reviews : $customer_reviews;
?>

<style>
    .toyocartv-home {
        --tt-red: #D71920;
        --tt-red-dark: #A70F14;
        --tt-black: #080808;
        --tt-charcoal: #1F2933;
        --tt-asphalt: #111827;
        --tt-silver: #E5E7EB;
        --tt-steel: #6B7280;
        --tt-white: #FFFFFF;
        background: var(--tt-white);
        color: var(--tt-asphalt);
        font-family: Inter, Manrope, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        overflow: hidden;
    }

    .toyocartv-home * {
        box-sizing: border-box;
    }

    .tt-container {
        width: min(100% - 32px, 1180px);
        margin: 0 auto;
    }

    .tt-section {
        padding: 78px 0;
    }

    .tt-section--soft {
        background: #F7F8FA;
    }

    .tt-section--dark {
        background: var(--tt-black);
        color: var(--tt-white);
    }

    .tt-eyebrow {
        color: var(--tt-red);
        display: inline-flex;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .14em;
        line-height: 1.2;
        margin-bottom: 14px;
        text-transform: uppercase;
    }

    .tt-heading {
        color: var(--tt-asphalt);
        font-family: Oswald, "Barlow Condensed", Impact, sans-serif;
        font-size: clamp(34px, 4vw, 52px);
        font-weight: 800;
        letter-spacing: 0;
        line-height: 1.02;
        margin: 0;
        text-transform: uppercase;
    }

    .tt-section--dark .tt-heading,
    .tt-hero .tt-heading {
        color: var(--tt-white);
    }

    .tt-copy {
        color: var(--tt-steel);
        font-size: 17px;
        line-height: 1.68;
        margin: 16px 0 0;
    }

    .tt-section--dark .tt-copy,
    .tt-hero .tt-copy {
        color: rgba(255, 255, 255, .78);
    }

    .tt-section-head {
        align-items: end;
        display: flex;
        gap: 24px;
        justify-content: space-between;
        margin-bottom: 34px;
    }

    .tt-section-head__content {
        max-width: 720px;
    }

    .tt-button {
        align-items: center;
        border: 1px solid transparent;
        border-radius: 12px;
        display: inline-flex;
        font-size: 13px;
        font-weight: 900;
        gap: 10px;
        justify-content: center;
        letter-spacing: .06em;
        min-height: 48px;
        padding: 14px 20px;
        text-decoration: none;
        text-transform: uppercase;
        transition: background .2s ease, border-color .2s ease, color .2s ease, transform .2s ease;
        white-space: nowrap;
    }

    .tt-button:hover {
        transform: translateY(-1px);
    }

    .tt-button--primary {
        background: var(--tt-red);
        border-color: var(--tt-red);
        color: var(--tt-white);
    }

    .tt-button--primary:hover {
        background: var(--tt-red-dark);
        border-color: var(--tt-red-dark);
        color: var(--tt-white);
    }

    .tt-button--dark {
        background: var(--tt-black);
        border-color: var(--tt-black);
        color: var(--tt-white);
    }

    .tt-button--dark:hover {
        background: var(--tt-charcoal);
        border-color: var(--tt-charcoal);
        color: var(--tt-white);
    }

    .tt-button--outline {
        background: transparent;
        border-color: rgba(17, 24, 39, .65);
        color: var(--tt-asphalt);
    }

    .tt-button--outline:hover {
        background: var(--tt-asphalt);
        border-color: var(--tt-asphalt);
        color: var(--tt-white);
    }

    .tt-button--light-outline {
        background: rgba(255, 255, 255, .04);
        border-color: rgba(255, 255, 255, .38);
        color: var(--tt-white);
    }

    .tt-button--light-outline:hover {
        background: var(--tt-white);
        border-color: var(--tt-white);
        color: var(--tt-black);
    }

    .tt-hero {
        background: var(--tt-black);
        color: var(--tt-white);
        min-height: 720px;
        padding: 76px 0 36px;
        position: relative;
    }

    .tt-hero:before,
    .tt-hero:after {
        content: "";
        inset: 0;
        pointer-events: none;
        position: absolute;
    }

    .tt-hero:before {
        background:
            linear-gradient(90deg, rgba(8, 8, 8, .96) 0%, rgba(8, 8, 8, .88) 36%, rgba(8, 8, 8, .34) 70%, rgba(8, 8, 8, .58) 100%),
            url('<?php echo esc_url($hero_image); ?>') center right / cover no-repeat;
    }

    .tt-hero:after {
        background: linear-gradient(180deg, rgba(8, 8, 8, 0) 60%, #080808 100%);
    }

    .tt-hero__grid {
        align-items: center;
        display: grid;
        gap: 48px;
        grid-template-columns: minmax(0, .95fr) minmax(320px, .72fr);
        min-height: 560px;
        position: relative;
        z-index: 1;
    }

    .tt-hero .tt-heading {
        font-size: clamp(46px, 7vw, 76px);
        max-width: 780px;
    }

    .tt-hero__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 30px;
    }

    .tt-hero__trust {
        align-items: center;
        color: rgba(255, 255, 255, .78);
        display: flex;
        flex-wrap: wrap;
        font-size: 14px;
        gap: 12px;
        margin-top: 22px;
    }

    .tt-hero__trust span {
        align-items: center;
        display: inline-flex;
        gap: 8px;
    }

    .tt-hero__trust span:before {
        background: var(--tt-red);
        border-radius: 999px;
        content: "";
        height: 7px;
        width: 7px;
    }

    .tt-hero-panel {
        align-self: end;
        background: rgba(17, 24, 39, .78);
        border: 1px solid rgba(255, 255, 255, .14);
        border-radius: 22px;
        box-shadow: 0 28px 80px rgba(0, 0, 0, .35);
        padding: 24px;
        backdrop-filter: blur(12px);
    }

    .tt-hero-panel__label {
        color: rgba(255, 255, 255, .66);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .tt-hero-panel__number {
        color: var(--tt-white);
        display: block;
        font-family: Oswald, Impact, sans-serif;
        font-size: 58px;
        font-weight: 800;
        line-height: 1;
        margin: 8px 0;
    }

    .tt-hero-panel p {
        color: rgba(255, 255, 255, .76);
        line-height: 1.55;
        margin: 0;
    }

    .tt-feature-strip {
        display: grid;
        gap: 12px;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        margin-top: -38px;
        position: relative;
        z-index: 3;
    }

    .tt-feature-strip a {
        align-items: center;
        background: var(--tt-white);
        border: 1px solid rgba(229, 231, 235, .85);
        border-radius: 14px;
        box-shadow: 0 18px 42px rgba(17, 24, 39, .12);
        color: var(--tt-asphalt);
        display: flex;
        font-weight: 900;
        justify-content: space-between;
        min-height: 72px;
        padding: 18px;
        text-decoration: none;
        text-transform: uppercase;
    }

    .tt-feature-strip a span {
        background: var(--tt-red);
        border-radius: 999px;
        height: 10px;
        width: 10px;
    }

    .tt-vehicle-grid,
    .tt-product-grid,
    .tt-use-grid,
    .tt-review-grid,
    .tt-trust-grid {
        display: grid;
        gap: 20px;
    }

    .tt-vehicle-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .tt-vehicle-card {
        background: var(--tt-black);
        border-radius: 20px;
        color: var(--tt-white);
        min-height: 360px;
        overflow: hidden;
        position: relative;
        text-decoration: none;
    }

    .tt-vehicle-card:before {
        background:
            linear-gradient(180deg, rgba(8, 8, 8, .22) 0%, rgba(8, 8, 8, .64) 52%, rgba(8, 8, 8, .98) 100%),
            linear-gradient(90deg, rgba(8, 8, 8, .78) 0%, rgba(8, 8, 8, .42) 54%, rgba(8, 8, 8, .16) 100%),
            var(--tt-card-image, url('<?php echo esc_url($hero_image); ?>')) center / cover no-repeat;
        content: "";
        inset: 0;
        position: absolute;
        transform: scale(1.02);
        transition: transform .35s ease;
    }

    .tt-vehicle-card:nth-child(2):before {
        background-position: 70% center;
    }

    .tt-vehicle-card:nth-child(3):before {
        background-position: 44% center;
    }

    .tt-vehicle-card:nth-child(4):before {
        background-position: 88% center;
    }

    .tt-vehicle-card:hover:before {
        transform: scale(1.08);
    }

    .tt-vehicle-card__content {
        inset: auto 0 0 0;
        padding: 24px;
        position: absolute;
        z-index: 1;
    }

    .tt-vehicle-card__content:before {
        background: var(--tt-red);
        content: "";
        display: block;
        height: 4px;
        margin-bottom: 18px;
        width: 54px;
    }

    .tt-vehicle-card h3 {
        font-family: Oswald, Impact, sans-serif;
        font-size: 29px;
        font-weight: 800;
        line-height: 1.08;
        margin: 0 0 10px;
        text-shadow: 0 2px 12px rgba(0, 0, 0, .72);
        text-transform: uppercase;
    }

    .tt-vehicle-card p {
        color: rgba(255, 255, 255, .94);
        font-size: 14px;
        line-height: 1.55;
        margin: 0 0 16px;
        text-shadow: 0 1px 10px rgba(0, 0, 0, .72);
    }

    .tt-sub-links {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tt-sub-links span {
        background: rgba(8, 8, 8, .34);
        border: 1px solid rgba(255, 255, 255, .42);
        border-radius: 999px;
        color: var(--tt-white);
        font-size: 12px;
        font-weight: 800;
        padding: 7px 10px;
        text-shadow: 0 1px 8px rgba(0, 0, 0, .68);
    }

    .tt-product-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .tt-product-card {
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 16px;
        overflow: hidden;
        transition: box-shadow .2s ease, transform .2s ease, border-color .2s ease;
    }

    .tt-product-card:hover {
        border-color: rgba(215, 25, 32, .35);
        box-shadow: 0 18px 38px rgba(17, 24, 39, .12);
        transform: translateY(-2px);
    }

    .tt-product-card__media {
        align-items: center;
        background: #F3F4F6;
        display: flex;
        height: 245px;
        justify-content: center;
        overflow: hidden;
    }

    .tt-product-card__media img {
        height: 100%;
        object-fit: cover;
        transition: transform .25s ease;
        width: 100%;
    }

    .tt-product-card:hover .tt-product-card__media img {
        transform: scale(1.04);
    }

    .tt-product-card__body {
        padding: 18px;
    }

    .tt-product-card__meta {
        color: var(--tt-steel);
        display: block;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .tt-product-card h3 {
        font-size: 16px;
        font-weight: 900;
        line-height: 1.34;
        margin: 0;
        min-height: 44px;
    }

    .tt-product-card h3 a {
        color: var(--tt-asphalt);
        text-decoration: none;
    }

    .tt-product-card__foot {
        align-items: center;
        display: flex;
        gap: 12px;
        justify-content: space-between;
        margin-top: 18px;
    }

    .tt-product-card__price {
        color: var(--tt-red);
        font-weight: 900;
    }

    .tt-product-card__price del {
        color: var(--tt-steel);
        display: block;
        font-size: 12px;
        font-weight: 600;
    }

    .tt-product-card__link {
        color: var(--tt-asphalt);
        font-size: 12px;
        font-weight: 900;
        text-decoration: none;
        text-transform: uppercase;
    }

    .tt-empty-products {
        background: var(--tt-white);
        border: 1px dashed rgba(107, 114, 128, .42);
        border-radius: 16px;
        color: var(--tt-steel);
        grid-column: 1 / -1;
        padding: 30px;
        text-align: center;
    }

    .tt-empty-products strong {
        color: var(--tt-asphalt);
        display: block;
        font-size: 20px;
        margin-bottom: 8px;
    }

    .tt-use-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .tt-use-card {
        background: var(--tt-black);
        border-radius: 20px;
        color: var(--tt-white);
        min-height: 360px;
        overflow: hidden;
        position: relative;
        text-decoration: none;
    }

    .tt-use-card:before {
        background:
            linear-gradient(180deg, rgba(8, 8, 8, .04) 0%, rgba(8, 8, 8, .58) 54%, rgba(8, 8, 8, .95) 100%),
            var(--tt-card-image, url('<?php echo esc_url($accessory_image); ?>')) center / cover no-repeat;
        content: "";
        inset: 0;
        position: absolute;
        transition: transform .35s ease;
    }

    .tt-use-card:nth-child(2):before {
        background-position: 78% center;
    }

    .tt-use-card:nth-child(3):before {
        background-position: 22% center;
    }

    .tt-use-card:hover:before {
        transform: scale(1.06);
    }

    .tt-use-card__body {
        inset: auto 0 0 0;
        padding: 28px;
        position: absolute;
        z-index: 1;
    }

    .tt-use-card__body h3 {
        font-family: Oswald, Impact, sans-serif;
        font-size: 32px;
        font-weight: 800;
        line-height: 1.05;
        margin: 0 0 12px;
        text-transform: uppercase;
    }

    .tt-use-card__body p {
        color: rgba(255, 255, 255, .78);
        line-height: 1.55;
        margin: 0 0 20px;
    }

    .tt-use-card__cta {
        color: var(--tt-white);
        display: inline-flex;
        font-size: 13px;
        font-weight: 900;
        letter-spacing: .06em;
        text-transform: uppercase;
    }

    .tt-use-actions {
        align-items: center;
        display: none;
        gap: 10px;
    }

    .tt-use-actions button {
        align-items: center;
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 12px;
        color: var(--tt-asphalt);
        cursor: pointer;
        display: inline-flex;
        font-size: 20px;
        font-weight: 900;
        height: 44px;
        justify-content: center;
        transition: background .2s ease, border-color .2s ease, color .2s ease;
        width: 44px;
    }

    .tt-use-actions button:hover {
        background: var(--tt-black);
        border-color: var(--tt-black);
        color: var(--tt-white);
    }

    .tt-review-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .tt-review-carousel {
        display: grid;
        gap: 20px;
        grid-auto-columns: calc((100% - 40px) / 3);
        grid-auto-flow: column;
        overflow-x: auto;
        padding: 4px 2px 18px;
        scroll-snap-type: x mandatory;
        scrollbar-color: var(--tt-red) rgba(17, 24, 39, .12);
    }

    .tt-review-card {
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 18px;
        box-shadow: 0 16px 34px rgba(17, 24, 39, .08);
        min-height: 280px;
        padding: 26px;
        scroll-snap-align: start;
    }

    .tt-review-card__head {
        align-items: center;
        display: flex;
        gap: 14px;
        margin-bottom: 20px;
    }

    .tt-review-card__avatar {
        align-items: center;
        background: var(--tt-black);
        border-radius: 14px;
        color: var(--tt-white);
        display: flex;
        flex: 0 0 52px;
        font-size: 14px;
        font-weight: 900;
        height: 52px;
        justify-content: center;
        letter-spacing: .08em;
        width: 52px;
    }

    .tt-review-card h3 {
        color: var(--tt-asphalt);
        font-size: 17px;
        font-weight: 900;
        line-height: 1.25;
        margin: 0 0 5px;
    }

    .tt-review-card__product {
        color: var(--tt-steel);
        display: block;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.4;
    }

    .tt-review-card__product a {
        color: var(--tt-asphalt);
        text-decoration: underline;
        text-decoration-color: rgba(215, 25, 32, .35);
        text-underline-offset: 4px;
    }

    .tt-review-card__rating {
        align-items: center;
        display: flex;
        gap: 10px;
        margin-bottom: 18px;
    }

    .tt-review-card__score {
        background: rgba(215, 25, 32, .1);
        border-radius: 999px;
        color: var(--tt-red);
        display: inline-flex;
        font-size: 13px;
        font-weight: 900;
        line-height: 1;
        padding: 8px 10px;
    }

    .tt-review-card__rating span:last-child {
        color: var(--tt-steel);
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    .tt-review-card p {
        color: var(--tt-asphalt);
        font-size: 17px;
        font-weight: 800;
        line-height: 1.55;
        margin: 0;
    }

    .tt-review-actions {
        align-items: center;
        display: flex;
        gap: 10px;
    }

    .tt-review-actions button {
        align-items: center;
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 12px;
        color: var(--tt-asphalt);
        cursor: pointer;
        display: inline-flex;
        font-size: 20px;
        font-weight: 900;
        height: 44px;
        justify-content: center;
        transition: background .2s ease, border-color .2s ease, color .2s ease;
        width: 44px;
    }

    .tt-review-actions button:hover {
        background: var(--tt-black);
        border-color: var(--tt-black);
        color: var(--tt-white);
    }

    .tt-feedback {
        display: grid;
        gap: 28px;
        grid-template-columns: minmax(0, .82fr) minmax(0, 1.35fr);
    }

    .tt-feedback-track {
        display: grid;
        gap: 16px;
        grid-auto-columns: minmax(280px, 1fr);
        grid-auto-flow: column;
        overflow-x: auto;
        padding-bottom: 12px;
        scroll-snap-type: x mandatory;
        scrollbar-color: var(--tt-red) rgba(255, 255, 255, .12);
    }

    .tt-feedback-card {
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .12);
        border-radius: 18px;
        display: flex;
        flex-direction: column;
        min-height: 255px;
        overflow: hidden;
        padding: 0;
        scroll-snap-align: start;
    }

    .tt-feedback-card__media {
        aspect-ratio: 16 / 10;
        background: rgba(255, 255, 255, .06);
        border-bottom: 1px solid rgba(255, 255, 255, .12);
        overflow: hidden;
    }

    .tt-feedback-card__media img {
        display: block;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .35s ease;
        width: 100%;
    }

    .tt-feedback-card:hover .tt-feedback-card__media img {
        transform: scale(1.04);
    }

    .tt-feedback-card__body {
        padding: 24px 26px 28px;
    }

    .tt-feedback-card span {
        color: var(--tt-red);
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .tt-feedback-card p {
        color: rgba(255, 255, 255, .84);
        font-size: 20px;
        font-weight: 800;
        line-height: 1.45;
        margin: 20px 0 0;
    }

    .tt-slider-controls {
        display: flex;
        gap: 10px;
        margin-top: 22px;
    }

    .tt-slider-controls button {
        align-items: center;
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 12px;
        color: var(--tt-white);
        cursor: pointer;
        display: inline-flex;
        font-size: 20px;
        font-weight: 900;
        height: 44px;
        justify-content: center;
        width: 44px;
    }

    .tt-trust-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .tt-trust-card {
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 16px;
        padding: 24px;
    }

    .tt-trust-card__icon {
        align-items: center;
        background: rgba(215, 25, 32, .1);
        border-radius: 12px;
        color: var(--tt-red);
        display: flex;
        height: 44px;
        justify-content: center;
        margin-bottom: 18px;
        width: 44px;
    }

    .tt-trust-card__icon svg {
        height: 22px;
        width: 22px;
    }

    .tt-trust-card h3 {
        font-size: 17px;
        font-weight: 900;
        margin: 0 0 8px;
    }

    .tt-trust-card p {
        color: var(--tt-steel);
        line-height: 1.55;
        margin: 0;
    }

    .tt-final {
        display: grid;
        gap: 34px;
        grid-template-columns: minmax(0, 1fr) minmax(320px, .72fr);
        margin-top: 48px;
    }

    .tt-about-panel,
    .tt-newsletter {
        border-radius: 22px;
        padding: 34px;
    }

    .tt-about-panel {
        background: #F7F8FA;
        border: 1px solid var(--tt-silver);
    }

    .tt-about-panel h3,
    .tt-newsletter h3 {
        font-family: Oswald, Impact, sans-serif;
        font-size: 36px;
        font-weight: 800;
        line-height: 1.08;
        margin: 0 0 14px;
        text-transform: uppercase;
    }

    .tt-about-panel p {
        color: var(--tt-steel);
        line-height: 1.68;
        margin: 0 0 16px;
    }

    .tt-disclaimer {
        border-left: 4px solid var(--tt-red);
        color: var(--tt-asphalt);
        font-size: 14px;
        font-weight: 700;
        line-height: 1.55;
        margin-top: 22px;
        padding-left: 16px;
    }

    .tt-policy-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 24px;
    }

    .tt-policy-links a {
        color: var(--tt-asphalt);
        font-size: 13px;
        font-weight: 900;
        text-decoration: underline;
        text-decoration-color: rgba(215, 25, 32, .35);
        text-underline-offset: 5px;
        text-transform: uppercase;
    }

    .tt-newsletter {
        background:
            linear-gradient(180deg, rgba(8, 8, 8, .70), rgba(8, 8, 8, .92)),
            url('<?php echo esc_url($accessory_image); ?>') center / cover no-repeat;
        color: var(--tt-white);
    }

    .tt-newsletter p {
        color: rgba(255, 255, 255, .78);
        line-height: 1.6;
        margin: 0 0 24px;
    }

    .tt-newsletter form {
        display: flex;
        gap: 10px;
    }

    .tt-newsletter input {
        background: rgba(255, 255, 255, .12);
        border: 1px solid rgba(255, 255, 255, .22);
        border-radius: 12px;
        color: var(--tt-white);
        min-height: 50px;
        min-width: 0;
        padding: 0 16px;
        width: 100%;
    }

    .tt-newsletter input::placeholder {
        color: rgba(255, 255, 255, .68);
    }

    .tt-newsletter button {
        cursor: pointer;
    }

    #newsletter-msg {
        display: none;
        font-size: 14px;
        font-weight: 800;
        margin-top: 12px;
    }

    @media (max-width: 1100px) {
        .tt-vehicle-grid,
        .tt-product-grid,
        .tt-review-grid,
        .tt-trust-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .tt-hero__grid,
        .tt-feedback,
        .tt-final {
            grid-template-columns: 1fr;
        }

        .tt-hero-panel {
            max-width: 430px;
        }

        .tt-review-carousel {
            grid-auto-columns: calc((100% - 20px) / 2);
        }
    }

    @media (max-width: 760px) {
        .tt-section {
            padding: 58px 0;
        }

        .tt-section-head {
            align-items: start;
            flex-direction: column;
        }

        .tt-hero {
            min-height: auto;
            padding: 58px 0 34px;
        }

        .tt-hero:before {
            background:
                linear-gradient(180deg, rgba(8, 8, 8, .90) 0%, rgba(8, 8, 8, .82) 48%, rgba(8, 8, 8, .94) 100%),
                url('<?php echo esc_url($hero_image); ?>') center right / cover no-repeat;
        }

        .tt-hero__grid {
            min-height: 560px;
        }

        .tt-hero__actions,
        .tt-newsletter form {
            flex-direction: column;
        }

        .tt-button {
            width: 100%;
        }

        .tt-feature-strip,
        .tt-product-grid,
        .tt-review-grid,
        .tt-trust-grid {
            grid-template-columns: 1fr;
        }

        .tt-product-grid--mobile-slider {
            display: grid;
            gap: 14px;
            grid-auto-columns: minmax(260px, 86%);
            grid-auto-flow: column;
            grid-template-columns: none;
            margin-left: -16px;
            margin-right: -16px;
            overflow-x: auto;
            padding: 2px 16px 18px;
            scroll-padding-left: 16px;
            scroll-snap-type: x mandatory;
            scrollbar-color: var(--tt-red) rgba(17, 24, 39, .12);
        }

        .tt-product-grid--mobile-slider .tt-product-card {
            scroll-snap-align: start;
        }

        .tt-vehicle-grid {
            display: grid;
            gap: 14px;
            grid-auto-columns: minmax(260px, 86%);
            grid-auto-flow: column;
            grid-template-columns: none;
            margin-left: -16px;
            margin-right: -16px;
            overflow-x: auto;
            padding: 2px 16px 18px;
            scroll-padding-left: 16px;
            scroll-snap-type: x mandatory;
            scrollbar-color: var(--tt-red) rgba(17, 24, 39, .12);
        }

        .tt-vehicle-card {
            scroll-snap-align: start;
        }

        .tt-use-actions {
            display: flex;
            width: 100%;
        }

        .tt-use-actions button {
            flex: 1;
        }

        .tt-use-grid {
            display: grid;
            gap: 14px;
            grid-auto-columns: minmax(260px, 86%);
            grid-auto-flow: column;
            grid-template-columns: none;
            margin-left: -16px;
            margin-right: -16px;
            overflow-x: auto;
            padding: 2px 16px 18px;
            scroll-padding-left: 16px;
            scroll-snap-type: x mandatory;
            scrollbar-color: var(--tt-red) rgba(17, 24, 39, .12);
        }

        .tt-use-card {
            scroll-snap-align: start;
        }

        .tt-feature-strip {
            margin-top: 0;
            padding-top: 16px;
        }

        .tt-review-actions {
            width: 100%;
        }

        .tt-review-actions button {
            flex: 1;
        }

        .tt-review-carousel {
            grid-auto-columns: 100%;
        }

        .tt-vehicle-card,
        .tt-use-card {
            min-height: 330px;
        }

        .tt-product-card__media {
            height: 230px;
        }

        .tt-about-panel,
        .tt-newsletter {
            padding: 26px;
        }
    }
</style>

<div class="toyocartv-home">
    <section class="tt-hero">
        <div class="tt-container tt-hero__grid">
            <div>
                <span class="tt-eyebrow"><?php esc_html_e('Independent Auto Accessories Store', 'dawp'); ?></span>
                <h1 class="tt-heading"><?php esc_html_e('Car Accessories For Cleaner, Easier Everyday Drives', 'dawp'); ?></h1>
                <p class="tt-copy">
                    <?php esc_html_e('Shop Tacoma, 4Runner, FJ Cruiser, and Tundra-style accessory collections designed for practical interior organization, exterior add-ons, and driver lifestyle upgrades.', 'dawp'); ?>
                </p>
                <div class="tt-hero__actions">
                    <a class="tt-button tt-button--primary" href="#vehicle-collections"><?php esc_html_e('Shop Vehicle Collections', 'dawp'); ?></a>
                    <a class="tt-button tt-button--light-outline" href="<?php echo esc_url(toyocartv_category_url('interior-accessories')); ?>"><?php esc_html_e('Explore Interior Accessories', 'dawp'); ?></a>
                </div>
                <div class="tt-hero__trust" aria-label="<?php esc_attr_e('Store trust notes', 'dawp'); ?>">
                    <span><?php esc_html_e('Secure checkout', 'dawp'); ?></span>
                    <span><?php esc_html_e('Tracking included', 'dawp'); ?></span>
                    <span><?php esc_html_e('30-day returns on eligible unused items', 'dawp'); ?></span>
                </div>
            </div>

            <aside class="tt-hero-panel" aria-label="<?php esc_attr_e('Homepage shopping summary', 'dawp'); ?>">
                <span class="tt-hero-panel__label"><?php esc_html_e('Shop By Collection', 'dawp'); ?></span>
                <strong class="tt-hero-panel__number">4</strong>
                <p><?php esc_html_e('Tacoma, 4Runner, FJ Cruiser, and Tundra-style accessory collections built for practical interior, exterior, and driver lifestyle shopping.', 'dawp'); ?></p>
            </aside>
        </div>
    </section>

    <div class="tt-container tt-feature-strip" aria-label="<?php esc_attr_e('Quick shopping links', 'dawp'); ?>">
        <a href="<?php echo esc_url(toyocartv_category_url('interior-accessories')); ?>"><?php esc_html_e('Interior Organizers', 'dawp'); ?><span aria-hidden="true"></span></a>
        <a href="<?php echo esc_url(toyocartv_category_url('exterior-accessories')); ?>"><?php esc_html_e('Exterior Add-Ons', 'dawp'); ?><span aria-hidden="true"></span></a>
        <a href="<?php echo esc_url(toyocartv_category_url('driver-merch')); ?>"><?php esc_html_e('Driver Merch', 'dawp'); ?><span aria-hidden="true"></span></a>
        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('New Arrivals', 'dawp'); ?><span aria-hidden="true"></span></a>
    </div>

    <section id="vehicle-collections" class="tt-section">
        <div class="tt-container">
            <div class="tt-section-head">
                <div class="tt-section-head__content">
                    <span class="tt-eyebrow"><?php esc_html_e('Shop By Vehicle Collection', 'dawp'); ?></span>
                    <h2 class="tt-heading"><?php esc_html_e('Start with your truck or SUV style', 'dawp'); ?></h2>
                    <p class="tt-copy"><?php esc_html_e('Browse practical compatible-style accessory collections by vehicle model name, then review product details before ordering.', 'dawp'); ?></p>
                </div>
                <a class="tt-button tt-button--outline" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All Products', 'dawp'); ?></a>
            </div>

            <div class="tt-vehicle-grid">
                <?php foreach ($vehicle_collections as $collection) : ?>
                    <a class="tt-vehicle-card" href="<?php echo esc_url(toyocartv_category_url($collection['slug'])); ?>" style="--tt-card-image: url('<?php echo esc_url($collection['image']); ?>');">
                        <div class="tt-vehicle-card__content">
                            <h3><?php echo esc_html($collection['title']); ?></h3>
                            <p><?php echo esc_html($collection['copy']); ?></p>
                            <div class="tt-sub-links" aria-label="<?php echo esc_attr($collection['title'] . ' subcategories'); ?>">
                                <?php foreach ($collection['links'] as $link) : ?>
                                    <span><?php echo esc_html($link[0]); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tt-section tt-section--soft">
        <div class="tt-container">
            <div class="tt-section-head">
                <div class="tt-section-head__content">
                    <span class="tt-eyebrow"><?php esc_html_e('New Arrivals', 'dawp'); ?></span>
                    <h2 class="tt-heading"><?php esc_html_e('Fresh accessories for your next drive', 'dawp'); ?></h2>
                </div>
                <a class="tt-button tt-button--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All Products', 'dawp'); ?></a>
            </div>

            <div class="tt-product-grid">
                <?php if (!empty($new_arrivals)) : ?>
                    <?php foreach ($new_arrivals as $product) : ?>
                        <?php toyocartv_product_card($product); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="tt-empty-products">
                        <strong><?php esc_html_e('Products are being added to this collection.', 'dawp'); ?></strong>
                        <?php esc_html_e('Use the vehicle and accessory category links to prepare the store structure while published products are loading in WooCommerce.', 'dawp'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="tt-section">
        <div class="tt-container">
            <div class="tt-section-head">
                <div class="tt-section-head__content">
                    <span class="tt-eyebrow"><?php esc_html_e('Shop By Use', 'dawp'); ?></span>
                    <h2 class="tt-heading"><?php esc_html_e('Find the right upgrade for the way you drive', 'dawp'); ?></h2>
                </div>
                <div class="tt-use-actions" aria-label="<?php esc_attr_e('Shop by use slider controls', 'dawp'); ?>">
                    <button type="button" data-tt-use-slide="prev" aria-label="<?php esc_attr_e('Previous shop by use slide', 'dawp'); ?>">&lsaquo;</button>
                    <button type="button" data-tt-use-slide="next" aria-label="<?php esc_attr_e('Next shop by use slide', 'dawp'); ?>">&rsaquo;</button>
                </div>
            </div>

            <div class="tt-use-grid" data-tt-use-track>
                <?php foreach ($use_cards as $card) : ?>
                    <a class="tt-use-card" href="<?php echo esc_url(toyocartv_category_url($card['slug'])); ?>" style="--tt-card-image: url('<?php echo esc_url($card['image']); ?>');">
                        <div class="tt-use-card__body">
                            <h3><?php echo esc_html($card['title']); ?></h3>
                            <p><?php echo esc_html($card['copy']); ?></p>
                            <span class="tt-use-card__cta"><?php echo esc_html($card['cta']); ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tt-section tt-section--soft">
        <div class="tt-container">
            <div class="tt-section-head">
                <div class="tt-section-head__content">
                    <span class="tt-eyebrow"><?php esc_html_e('Customer Favorites', 'dawp'); ?></span>
                    <h2 class="tt-heading"><?php esc_html_e('Popular picks for truck and SUV owners', 'dawp'); ?></h2>
                </div>
                <a class="tt-button tt-button--outline" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Popular Accessories', 'dawp'); ?></a>
            </div>

            <div class="tt-product-grid<?php echo !empty($customer_favorites) ? ' tt-product-grid--mobile-slider' : ''; ?>">
                <?php if (!empty($customer_favorites)) : ?>
                    <?php foreach ($customer_favorites as $product) : ?>
                        <?php toyocartv_product_card($product); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="tt-empty-products">
                        <strong><?php esc_html_e('Customer favorite products will appear here.', 'dawp'); ?></strong>
                        <?php esc_html_e('This section uses WooCommerce product data and avoids fake ratings, names, or review claims.', 'dawp'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="tt-section tt-section--dark">
        <div class="tt-container tt-feedback">
            <div>
                <span class="tt-eyebrow"><?php esc_html_e('Customer Feedback', 'dawp'); ?></span>
                <h2 class="tt-heading"><?php esc_html_e('What drivers look for in everyday auto accessories', 'dawp'); ?></h2>
                <p class="tt-copy"><?php esc_html_e('Truck and SUV owners shop for accessories that are practical, easy to understand, and simple to use. These feedback areas can be replaced with verified customer reviews as the store grows.', 'dawp'); ?></p>
                <div class="tt-slider-controls" aria-label="<?php esc_attr_e('Feedback slider controls', 'dawp'); ?>">
                    <button type="button" data-tt-slide="prev" aria-label="<?php esc_attr_e('Previous feedback slide', 'dawp'); ?>">&lsaquo;</button>
                    <button type="button" data-tt-slide="next" aria-label="<?php esc_attr_e('Next feedback slide', 'dawp'); ?>">&rsaquo;</button>
                </div>
                <a class="tt-button tt-button--primary" href="<?php echo esc_url($shop_url); ?>" style="margin-top: 28px;"><?php esc_html_e('Shop Popular Accessories', 'dawp'); ?></a>
            </div>

            <div class="tt-feedback-track" data-tt-feedback-track>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <?php
                        echo dawp_responsive_image($card_image_base . 'home-feedback-organization.png', [
                            'alt'           => __('Interior organizer and storage accessories arranged for a vehicle', 'dawp'),
                            'width'         => 640,
                            'height'        => 400,
                            'srcset_widths' => [320, 480, 640],
                            'sizes'         => '(max-width: 760px) 86vw, (max-width: 1100px) 50vw, 640px',
                            'loading'       => 'lazy',
                        ]);
                        ?>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('Easy Organization', 'dawp'); ?></span>
                        <p><?php esc_html_e('Interior organizers and storage accessories help keep daily driving cleaner and less cluttered.', 'dawp'); ?></p>
                    </div>
                </article>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <?php
                        echo dawp_responsive_image($card_image_base . 'home-feedback-addons.png', [
                            'alt'           => __('Truck and SUV accessories staged outside a garage', 'dawp'),
                            'width'         => 640,
                            'height'        => 400,
                            'srcset_widths' => [320, 480, 640],
                            'sizes'         => '(max-width: 760px) 86vw, (max-width: 1100px) 50vw, 640px',
                            'loading'       => 'lazy',
                        ]);
                        ?>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('Practical Add-Ons', 'dawp'); ?></span>
                        <p><?php esc_html_e('Simple exterior and interior add-ons make vehicle upgrades easier to shop and understand.', 'dawp'); ?></p>
                    </div>
                </article>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <?php
                        echo dawp_responsive_image($card_image_base . 'home-feedback-details.png', [
                            'alt'           => __('Auto accessory product details and organized parts on a work surface', 'dawp'),
                            'width'         => 640,
                            'height'        => 400,
                            'srcset_widths' => [320, 480, 640],
                            'sizes'         => '(max-width: 760px) 86vw, (max-width: 1100px) 50vw, 640px',
                            'loading'       => 'lazy',
                        ]);
                        ?>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('Clear Product Details', 'dawp'); ?></span>
                        <p><?php esc_html_e('Compatibility notes, product photos, and installation details help customers order with more confidence.', 'dawp'); ?></p>
                    </div>
                </article>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <?php
                        echo dawp_responsive_image($card_image_base . 'home-feedback-lifestyle.png', [
                            'alt'           => __('Driver lifestyle merch and vehicle accessories displayed near a truck', 'dawp'),
                            'width'         => 640,
                            'height'        => 400,
                            'srcset_widths' => [320, 480, 640],
                            'sizes'         => '(max-width: 760px) 86vw, (max-width: 1100px) 50vw, 640px',
                            'loading'       => 'lazy',
                        ]);
                        ?>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('Driver Lifestyle', 'dawp'); ?></span>
                        <p><?php esc_html_e('Merch and small accessories are easy gift ideas for truck and SUV enthusiasts.', 'dawp'); ?></p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="tt-section">
        <div class="tt-container">
            <div class="tt-section-head">
                <div class="tt-section-head__content">
                    <span class="tt-eyebrow"><?php esc_html_e('Customer Reviews', 'dawp'); ?></span>
                    <h2 class="tt-heading"><?php esc_html_e('What customers say about practical accessories', 'dawp'); ?></h2>
                    <?php if ($using_sample_reviews) : ?>
                        <p class="tt-copy"><?php esc_html_e('See what customers value most in practical truck and SUV accessories. Approved WooCommerce product reviews will replace these homepage examples automatically when available.', 'dawp'); ?></p>
                    <?php else : ?>
                        <p class="tt-copy"><?php esc_html_e('Browse up to 10 approved WooCommerce product reviews. The slider shows three reviews first on desktop, then scrolls horizontally for the rest.', 'dawp'); ?></p>
                    <?php endif; ?>
                </div>
                <?php if (count($homepage_reviews) > 1) : ?>
                    <div class="tt-review-actions" aria-label="<?php esc_attr_e('Customer review slider controls', 'dawp'); ?>">
                        <button type="button" data-tt-review-slide="prev" aria-label="<?php esc_attr_e('Previous customer reviews', 'dawp'); ?>">&lsaquo;</button>
                        <button type="button" data-tt-review-slide="next" aria-label="<?php esc_attr_e('Next customer reviews', 'dawp'); ?>">&rsaquo;</button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="tt-review-carousel" data-tt-review-track>
                <?php foreach ($homepage_reviews as $review) : ?>
                    <?php
                    if ($using_sample_reviews) {
                        $review_author       = $review['author'];
                        $review_rating       = $review['rating'];
                        $review_product_name = $review['product'];
                        $review_product_url  = '';
                        $review_text         = $review['text'];
                        $review_label        = __('Customer Review', 'dawp');
                    } else {
                        $review_author       = $review->comment_author ? $review->comment_author : __('Customer', 'dawp');
                        $review_rating       = max(1, min(5, (int) get_comment_meta($review->comment_ID, 'rating', true)));
                        $review_product      = function_exists('wc_get_product') ? wc_get_product($review->comment_post_ID) : null;
                        $review_product_name = $review_product ? $review_product->get_name() : get_the_title($review->comment_post_ID);
                        $review_product_url  = $review_product ? $review_product->get_permalink() : get_permalink($review->comment_post_ID);
                        $review_text         = wp_trim_words(wp_strip_all_tags($review->comment_content), 30, '...');
                        $review_label        = __('Product Review', 'dawp');
                    }
                    ?>
                    <article class="tt-review-card">
                        <div class="tt-review-card__head">
                            <div class="tt-review-card__avatar" aria-hidden="true"><?php echo esc_html(toyocartv_review_initials($review_author)); ?></div>
                            <div>
                                <h3><?php echo esc_html($review_author); ?></h3>
                                <?php if ($review_product_name) : ?>
                                    <span class="tt-review-card__product">
                                        <?php if ($review_product_url) : ?>
                                            <a href="<?php echo esc_url($review_product_url); ?>"><?php echo esc_html($review_product_name); ?></a>
                                        <?php else : ?>
                                            <?php echo esc_html($review_product_name); ?>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tt-review-card__rating">
                            <span class="tt-review-card__score"><?php echo esc_html($review_rating); ?>/5</span>
                            <span><?php echo esc_html($review_label); ?></span>
                        </div>
                        <p><?php echo esc_html($review_text); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tt-section">
        <div class="tt-container">
            <div class="tt-trust-grid">
                <article class="tt-trust-card">
                    <div class="tt-trust-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3l7 3v5c0 5-3 8.5-7 10-4-1.5-7-5-7-10V6l7-3z"/>
                            <path d="M9 12l2 2 4-5"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Secure Checkout', 'dawp'); ?></h3>
                    <p><?php esc_html_e('A clean and protected checkout experience for every order.', 'dawp'); ?></p>
                </article>
                <article class="tt-trust-card">
                    <div class="tt-trust-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 7h11v10H3z"/>
                            <path d="M14 10h4l3 3v4h-7z"/>
                            <circle cx="7" cy="19" r="2"/>
                            <circle cx="18" cy="19" r="2"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Tracking Included', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Tracking details are provided once your order ships.', 'dawp'); ?></p>
                </article>
                <article class="tt-trust-card">
                    <div class="tt-trust-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12a9 9 0 0 1 15.5-6.2"/>
                            <path d="M18.5 3.5v5h-5"/>
                            <path d="M21 12a9 9 0 0 1-15.5 6.2"/>
                            <path d="M5.5 20.5v-5h5"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('30-Day Returns', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Eligible unused, uninstalled items may be returned within 30 days of delivery.', 'dawp'); ?></p>
                </article>
                <article class="tt-trust-card">
                    <div class="tt-trust-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 4h8l2 3v13H6V7l2-3z"/>
                            <path d="M9 10h6"/>
                            <path d="M9 14h4"/>
                            <path d="M8 4v3h10"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Compatibility Notes', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Review product details and fitment notes before ordering.', 'dawp'); ?></p>
                </article>
            </div>

            <div class="tt-final">
                <section class="tt-about-panel" aria-labelledby="toyocartv-about-heading">
                    <span class="tt-eyebrow"><?php esc_html_e('About ToyocarTV', 'dawp'); ?></span>
                    <h3 id="toyocartv-about-heading"><?php esc_html_e('Built for truck and SUV accessory shoppers.', 'dawp'); ?></h3>
                    <p><?php esc_html_e('ToyocarTV is an independent auto accessories store built for drivers who want practical interior, exterior, and lifestyle accessories organized by vehicle collection.', 'dawp'); ?></p>
                    <div class="tt-disclaimer">
                        <?php esc_html_e('ToyocarTV is an independent auto accessories store and is not affiliated with, endorsed by, or sponsored by Toyota Motor Corporation or any vehicle manufacturer. Vehicle model names are used only to help customers identify compatible-style product collections.', 'dawp'); ?>
                    </div>
                    <div class="tt-policy-links">
                        <a href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Us', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
                    </div>
                </section>

                <section class="tt-newsletter" aria-labelledby="toyocartv-newsletter-heading">
                    <span class="tt-eyebrow"><?php esc_html_e('Garage Updates', 'dawp'); ?></span>
                    <h3 id="toyocartv-newsletter-heading"><?php esc_html_e('Get new accessory drops and garage updates', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Join the list for new arrivals, vehicle collection updates, and practical accessory picks.', 'dawp'); ?></p>
                    <form id="newsletter-form">
                        <label class="screen-reader-text" for="toyocartv-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                        <input id="toyocartv-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>" required>
                        <button class="tt-button tt-button--primary" type="submit"><?php esc_html_e('Sign Up', 'dawp'); ?></button>
                    </form>
                    <div id="newsletter-msg" role="status" aria-live="polite"></div>
                </section>
            </div>
        </div>
    </section>
</div>

<script>
    window.dawpAjax = window.dawpAjax || {
        url: <?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>,
        nonce: <?php echo wp_json_encode(wp_create_nonce('dawp_newsletter_nonce')); ?>,
        contactNonce: <?php echo wp_json_encode(wp_create_nonce('dawp_contact_nonce')); ?>
    };

    document.addEventListener('DOMContentLoaded', function () {
        function setupHorizontalSlider(trackSelector, prevSelector, nextSelector, fallbackAmount) {
            var track = document.querySelector(trackSelector);
            var prev = document.querySelector(prevSelector);
            var next = document.querySelector(nextSelector);

            if (!track || !prev || !next) {
                return;
            }

            function scrollTrack(direction) {
                var amount = Math.max(fallbackAmount, track.clientWidth * 0.92);
                track.scrollBy({ left: direction * amount, behavior: 'smooth' });
            }

            prev.addEventListener('click', function () { scrollTrack(-1); });
            next.addEventListener('click', function () { scrollTrack(1); });
        }

        setupHorizontalSlider('[data-tt-review-track]', '[data-tt-review-slide="prev"]', '[data-tt-review-slide="next"]', 320);
        setupHorizontalSlider('[data-tt-feedback-track]', '[data-tt-slide="prev"]', '[data-tt-slide="next"]', 280);
        setupHorizontalSlider('[data-tt-use-track]', '[data-tt-use-slide="prev"]', '[data-tt-use-slide="next"]', 260);
    });
</script>
