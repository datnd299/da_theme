<?php
/**
 * Template Part: Shopmivo Homepage
 */

$theme_uri = get_template_directory_uri();
$shop_url  = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!function_exists('shopmivo_category_url')) {
    function shopmivo_category_url($slug) {
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

if (!function_exists('shopmivo_home_products')) {
    function shopmivo_home_products($args, $fallback_to_date = false) {
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

if (!function_exists('shopmivo_product_collection_label')) {
    function shopmivo_product_collection_label($product) {
        if (!$product || !function_exists('wc_get_product_terms')) {
            return __('Everyday essential', 'dawp');
        }

        $terms = wc_get_product_terms($product->get_id(), 'product_cat', ['fields' => 'all']);

        if (!empty($terms) && !is_wp_error($terms)) {
            return $terms[0]->name;
        }

        return __('Everyday essential', 'dawp');
    }
}

if (!function_exists('shopmivo_product_card')) {
    function shopmivo_product_card($product) {
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
                <span class="tt-product-card__meta"><?php echo esc_html(shopmivo_product_collection_label($product)); ?></span>
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

if (!function_exists('shopmivo_home_reviews')) {
    function shopmivo_home_reviews($limit = 3) {
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

if (!function_exists('shopmivo_review_initials')) {
    function shopmivo_review_initials($name) {
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

if (!function_exists('shopmivo_icon')) {
    function shopmivo_icon($name) {
        $icons = [
            'tools'     => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94z"/>',
            'houseware' => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
            'vehicle'   => '<path d="M5 11l1.5-4.5A2 2 0 0 1 8.4 5h7.2a2 2 0 0 1 1.9 1.5L19 11"/><rect x="3" y="11" width="18" height="6" rx="2"/><circle cx="7.5" cy="17.5" r="1.5"/><circle cx="16.5" cy="17.5" r="1.5"/>',
            'gift'      => '<polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/>',
            'pet'       => '<circle cx="4.5" cy="9.5" r="2"/><circle cx="9" cy="5" r="2"/><circle cx="15" cy="5" r="2"/><circle cx="19.5" cy="9.5" r="2"/><path d="M12 12c-3.2 0-7.5 2.1-7.5 6.1A2.9 2.9 0 0 0 7.4 21c1.6 0 2.1-1 4.6-1s3 1 4.6 1a2.9 2.9 0 0 0 2.9-2.9c0-4-4.3-6.1-7.5-6.1z"/>',
            'clothing'  => '<path d="M16 3l6 3-2 4-3-1v11a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V9l-3 1-2-4 6-3a4 4 0 0 0 8 0z"/>',
            'bag'       => '<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/>',
            'grid'      => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>',
            'clipboard' => '<path d="M8 4h8l2 3v13H6V7l2-3z"/><path d="M9 10h6"/><path d="M9 14h4"/><path d="M8 4v3h10"/>',
            'tag'       => '<path d="M20.59 13.41L13.42 20.58a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><circle cx="7" cy="7" r="1.5"/>',
        ];
        return isset($icons[$name]) ? $icons[$name] : '';
    }
}

$vehicle_collections = [
    [
        'title' => 'Tools',
        'copy'  => 'Hand tools, power tool accessories, and tool storage for home and garage projects.',
        'slug'  => 'tools',
        'icon'  => 'tools',
        'image' => 'hand-tools.jpeg',
        'links' => [
            ['Hand Tools', 'hand-tools'],
            ['Power Tool Accessories', 'power-tool-accessories'],
            ['Tool Storage', 'tool-storage'],
        ],
    ],
    [
        'title' => 'Houseware',
        'copy'  => 'Kitchenware, home storage, and cleaning essentials for a well-run household.',
        'slug'  => 'houseware',
        'icon'  => 'houseware',
        'image' => 'modern-kitchenware.jpeg',
        'links' => [
            ['Kitchenware', 'kitchenware'],
            ['Home Storage', 'home-storage'],
            ['Cleaning Essentials', 'cleaning-essentials'],
        ],
    ],
    [
        'title' => 'Vehicle Service',
        'copy'  => 'Car care essentials, maintenance tools, and simple accessories for any vehicle.',
        'slug'  => 'vehicle-service',
        'icon'  => 'vehicle',
        'image' => 'car-care-products.jpeg',
        'links' => [
            ['Car Care', 'car-care'],
            ['Maintenance Tools', 'maintenance-tools'],
            ['Interior & Exterior Accessories', 'interior-exterior-accessories'],
        ],
    ],
    [
        'title' => 'Gift and Toy',
        'copy'  => 'Toys, games, and gift-ready picks for kids and gift shoppers of every occasion.',
        'slug'  => 'gift-and-toy',
        'icon'  => 'gift',
        'image' => 'colorful-kids-toys.jpeg',
        'links' => [
            ['Kids Toys', 'kids-toys'],
            ['Games & Puzzles', 'games-puzzles'],
            ['Gift Sets', 'gift-sets'],
        ],
    ],
    [
        'title' => 'Pet Supplies',
        'copy'  => 'Food, accessories, and everyday essentials for dogs, cats, and other pets.',
        'slug'  => 'pet-supplies',
        'icon'  => 'pet',
        'image' => 'pet-supplies-flatlay.jpeg',
        'links' => [
            ['Dog Supplies', 'dog-supplies'],
            ['Cat Supplies', 'cat-supplies'],
            ['Pet Accessories', 'pet-accessories'],
        ],
    ],
    [
        'title' => 'Clothing and Accessories',
        'copy'  => 'Everyday apparel and accessories for men and women at value prices.',
        'slug'  => 'clothing-accessories',
        'icon'  => 'clothing',
        'image' => 'casual-apparel.jpeg',
        'links' => [
            ["Men's Clothing", 'mens-clothing'],
            ["Women's Clothing", 'womens-clothing'],
            ['Accessories', 'accessories'],
        ],
    ],
];

$use_cards = [
    [
        'title' => 'Home & Garage Essentials',
        'copy'  => 'Tools, storage, and houseware picks to keep every home project and household running.',
        'cta'   => 'Shop Home & Garage',
        'slug'  => 'tools',
        'icon'  => 'tools',
        'image' => 'home-garage-essentials.jpeg',
    ],
    [
        'title' => 'Gifts & Toys For Everyone',
        'copy'  => 'Toys, games, and gift sets ready for birthdays, holidays, and every occasion.',
        'cta'   => 'Shop Gifts & Toys',
        'slug'  => 'gift-and-toy',
        'icon'  => 'gift',
        'image' => 'festive-gifts-toys.jpeg',
    ],
    [
        'title' => 'Pet Care Favorites',
        'copy'  => 'Everyday food, accessories, and comfort items for dogs, cats, and other pets.',
        'cta'   => 'Shop Pet Supplies',
        'slug'  => 'pet-supplies',
        'icon'  => 'pet',
        'image' => 'pet-care-products.jpeg',
    ],
];

$new_arrivals = shopmivo_home_products([
    'orderby'  => 'date',
    'order'    => 'DESC',
    'category' => ['tools'],
], true);

$customer_favorites = shopmivo_home_products([
    'orderby' => 'popularity',
    'order'   => 'DESC',
], true);

$customer_reviews = shopmivo_home_reviews(10);
$sample_customer_reviews = [
    [
        'author'  => 'Michael Carter',
        'product' => 'Hand Tool Set',
        'rating'  => 5,
        'text'    => 'Solid everyday tool set at a fair price. Everything I needed for a weekend of small home repairs.',
    ],
    [
        'author'  => 'Sarah Nguyen',
        'product' => 'Kitchen Storage Set',
        'rating'  => 5,
        'text'    => 'The product details were easy to understand, and the containers matched exactly what I expected.',
    ],
    [
        'author'  => 'David Miller',
        'product' => 'Car Care Kit',
        'rating'  => 5,
        'text'    => 'A useful kit for keeping the car clean without buying a dozen separate products.',
    ],
    [
        'author'  => 'Emily Johnson',
        'product' => 'Kids Building Set',
        'rating'  => 4,
        'text'    => 'Good quality toy with a clean design. It works well as a small birthday gift.',
    ],
    [
        'author'  => 'Chris Anderson',
        'product' => 'Pet Bed',
        'rating'  => 5,
        'text'    => 'Simple, comfortable, and easy to clean. Our dog took to it right away.',
    ],
    [
        'author'  => 'Jessica Brown',
        'product' => "Men's Everyday T-Shirt",
        'rating'  => 5,
        'text'    => 'Great fit and fabric for the price. Ordered two more colors after the first one arrived.',
    ],
    [
        'author'  => 'Daniel Wilson',
        'product' => 'Home Storage Bins',
        'rating'  => 4,
        'text'    => 'Helpful for organizing the garage. Stack neatly and the sizing is accurate.',
    ],
    [
        'author'  => 'Amanda Lee',
        'product' => 'Gift Set Bundle',
        'rating'  => 5,
        'text'    => 'The product details made shopping easy, and the set felt like great value as a gift.',
    ],
    [
        'author'  => 'Ryan Thompson',
        'product' => 'Tool Storage Box',
        'rating'  => 5,
        'text'    => 'Durable build and easy to organize. Nice addition to the garage setup.',
    ],
    [
        'author'  => 'Olivia Martinez',
        'product' => 'Cat Accessory Bundle',
        'rating'  => 5,
        'text'    => 'A straightforward bundle that covered everything we needed without any extra hassle.',
    ],
];
$using_sample_reviews = empty($customer_reviews);
$homepage_reviews     = $using_sample_reviews ? $sample_customer_reviews : $customer_reviews;
?>

<style>
    .shopmivo-home {
        --tt-red: #D71920;
        --tt-red-dark: #A70F14;
        --tt-black: #161A1E;
        --tt-charcoal: #2B3742;
        --tt-asphalt: #111827;
        --tt-silver: #E5E7EB;
        --tt-steel: #6B7280;
        --tt-white: #FFFFFF;
        background: var(--tt-white);
        color: var(--tt-asphalt);
        font-family: Inter, Manrope, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        overflow: hidden;
    }

    .shopmivo-home * {
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
        background: #F7F8FA;
        color: var(--tt-asphalt);
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

    .tt-copy {
        color: var(--tt-steel);
        font-size: 17px;
        line-height: 1.68;
        margin: 16px 0 0;
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
        background: transparent;
        border-color: rgba(17, 24, 39, .65);
        color: var(--tt-asphalt);
    }

    .tt-button--light-outline:hover {
        background: var(--tt-asphalt);
        border-color: var(--tt-asphalt);
        color: var(--tt-white);
    }

    .tt-hero {
        background: var(--tt-white) url('<?php echo esc_url($theme_uri); ?>/assets/img/banner.jpeg') center center / cover no-repeat;
        color: var(--tt-asphalt);
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
            radial-gradient(1100px 620px at 82% 18%, rgba(215, 25, 32, .12), transparent 60%),
            linear-gradient(100deg, rgba(255, 255, 255, .8) 0%, rgba(255, 255, 255, .5) 34%, rgba(255, 255, 255, .16) 58%, rgba(255, 255, 255, 0) 82%);
    }

    .tt-hero:after {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0) 78%, #FFFFFF 100%);
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
        color: var(--tt-steel);
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
        background: rgba(255, 255, 255, .92);
        border: 1px solid var(--tt-silver);
        border-radius: 22px;
        box-shadow: 0 28px 80px rgba(17, 24, 39, .14);
        padding: 24px;
        backdrop-filter: blur(12px);
    }

    .tt-hero-panel__label {
        color: var(--tt-steel);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .tt-hero-panel__number {
        color: var(--tt-asphalt);
        display: block;
        font-family: Oswald, Impact, sans-serif;
        font-size: 58px;
        font-weight: 800;
        line-height: 1;
        margin: 8px 0;
    }

    .tt-hero-panel p {
        color: var(--tt-steel);
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
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .tt-vehicle-card {
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 20px;
        color: var(--tt-asphalt);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        text-decoration: none;
        transition: box-shadow .2s ease, transform .2s ease, border-color .2s ease;
    }

    .tt-vehicle-card:hover {
        border-color: rgba(215, 25, 32, .35);
        box-shadow: 0 18px 38px rgba(17, 24, 39, .12);
        transform: translateY(-2px);
    }

    .tt-vehicle-card__media {
        background-color: #F3F4F6;
        background-position: center;
        background-size: cover;
        height: 168px;
        position: relative;
    }

    .tt-vehicle-card__icon {
        align-items: center;
        background: rgba(255, 255, 255, .95);
        border-radius: 14px;
        box-shadow: 0 8px 20px rgba(17, 24, 39, .14);
        color: var(--tt-red);
        display: flex;
        height: 52px;
        justify-content: center;
        left: 20px;
        position: absolute;
        top: 20px;
        width: 52px;
    }

    .tt-vehicle-card__icon svg {
        height: 26px;
        width: 26px;
    }

    .tt-vehicle-card__content {
        padding: 22px 24px 24px;
    }

    .tt-vehicle-card__content:before {
        background: var(--tt-red);
        content: "";
        display: block;
        height: 4px;
        margin-bottom: 16px;
        width: 54px;
    }

    .tt-vehicle-card h3 {
        font-family: Oswald, Impact, sans-serif;
        font-size: 25px;
        font-weight: 800;
        line-height: 1.1;
        margin: 0 0 8px;
        text-transform: uppercase;
    }

    .tt-vehicle-card p {
        color: var(--tt-steel);
        font-size: 14px;
        line-height: 1.55;
        margin: 0 0 16px;
    }

    .tt-sub-links {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tt-sub-links span {
        background: #F3F4F6;
        border: 1px solid var(--tt-silver);
        border-radius: 999px;
        color: var(--tt-asphalt);
        font-size: 12px;
        font-weight: 800;
        padding: 7px 10px;
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
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        display: -webkit-box;
        font-size: 16px;
        font-weight: 900;
        line-clamp: 3;
        line-height: 1.34;
        margin: 0;
        min-height: 64px;
        overflow: hidden;
        text-overflow: ellipsis;
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
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 20px;
        color: var(--tt-asphalt);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        text-decoration: none;
        transition: box-shadow .2s ease, transform .2s ease, border-color .2s ease;
    }

    .tt-use-card:hover {
        border-color: rgba(215, 25, 32, .35);
        box-shadow: 0 18px 38px rgba(17, 24, 39, .12);
        transform: translateY(-2px);
    }

    .tt-use-card__media {
        background-color: #F3F4F6;
        background-position: center;
        background-size: cover;
        height: 200px;
        position: relative;
    }

    .tt-use-card__icon {
        align-items: center;
        background: rgba(255, 255, 255, .95);
        border-radius: 14px;
        box-shadow: 0 8px 20px rgba(17, 24, 39, .14);
        color: var(--tt-red);
        display: flex;
        height: 52px;
        justify-content: center;
        left: 24px;
        position: absolute;
        top: 24px;
        width: 52px;
    }

    .tt-use-card__icon svg {
        height: 26px;
        width: 26px;
    }

    .tt-use-card__body {
        padding: 24px 28px 28px;
    }

    .tt-use-card__body h3 {
        font-family: Oswald, Impact, sans-serif;
        font-size: 27px;
        font-weight: 800;
        line-height: 1.08;
        margin: 0 0 10px;
        text-transform: uppercase;
    }

    .tt-use-card__body p {
        color: var(--tt-steel);
        line-height: 1.55;
        margin: 0 0 18px;
    }

    .tt-use-card__cta {
        color: var(--tt-asphalt);
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
        overscroll-behavior-x: contain;
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
        overscroll-behavior-x: contain;
        padding-bottom: 12px;
        scroll-snap-type: x mandatory;
        scrollbar-color: var(--tt-red) rgba(255, 255, 255, .12);
    }

    .tt-feedback-card {
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 18px;
        box-shadow: 0 16px 34px rgba(17, 24, 39, .08);
        display: flex;
        flex-direction: column;
        min-height: 255px;
        overflow: hidden;
        padding: 0;
        scroll-snap-align: start;
    }

    .tt-feedback-card__media {
        align-items: center;
        aspect-ratio: 16 / 10;
        background: #F3F4F6;
        border-bottom: 1px solid var(--tt-silver);
        display: flex;
        justify-content: center;
        overflow: hidden;
    }

    .tt-feedback-card__media .tt-feedback-card__icon {
        align-items: center;
        background: rgba(215, 25, 32, .16);
        border-radius: 16px;
        color: var(--tt-red);
        display: flex;
        height: 64px;
        justify-content: center;
        width: 64px;
    }

    .tt-feedback-card__media .tt-feedback-card__icon svg {
        height: 32px;
        width: 32px;
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
        color: var(--tt-asphalt);
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

    .tt-slider-controls button:hover {
        background: var(--tt-black);
        border-color: var(--tt-black);
        color: var(--tt-white);
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
            radial-gradient(720px 420px at 85% 0%, rgba(215, 25, 32, .1), transparent 62%),
            linear-gradient(155deg, #FFFFFF 0%, #F7F8FA 100%);
        border: 1px solid var(--tt-silver);
        color: var(--tt-asphalt);
    }

    .tt-newsletter p {
        color: var(--tt-steel);
        line-height: 1.6;
        margin: 0 0 24px;
    }

    .tt-newsletter form {
        display: flex;
        gap: 10px;
    }

    .tt-newsletter input {
        background: var(--tt-white);
        border: 1px solid var(--tt-silver);
        border-radius: 12px;
        color: var(--tt-asphalt);
        min-height: 50px;
        min-width: 0;
        padding: 0 16px;
        width: 100%;
    }

    .tt-newsletter input::placeholder {
        color: var(--tt-steel);
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
                radial-gradient(720px 420px at 70% 0%, rgba(215, 25, 32, .1), transparent 60%),
                linear-gradient(180deg, rgba(255, 255, 255, .78) 0%, rgba(255, 255, 255, .42) 45%, rgba(255, 255, 255, .12) 70%, rgba(255, 255, 255, 0) 100%);
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
        .tt-review-grid,
        .tt-trust-grid {
            grid-template-columns: 1fr;
        }

        .tt-product-grid {
            gap: 12px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
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
            overscroll-behavior-x: contain;
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
            overscroll-behavior-x: contain;
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
            overscroll-behavior-x: contain;
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

<div class="shopmivo-home">
    <section class="tt-hero">
        <div class="tt-container tt-hero__grid">
            <div>
                <span class="tt-eyebrow"><?php esc_html_e('Independent General Merchandise Store', 'dawp'); ?></span>
                <h1 class="tt-heading"><?php esc_html_e('Everything You Need, All In One Place', 'dawp'); ?></h1>
                <p class="tt-copy">
                    <?php esc_html_e('Shop Tools, Houseware, Vehicle Service, Gift and Toy, Pet Supplies, and Clothing and Accessories — all at everyday low prices.', 'dawp'); ?>
                </p>
                <div class="tt-hero__actions">
                    <a class="tt-button tt-button--primary" href="#shop-categories"><?php esc_html_e('Shop All Categories', 'dawp'); ?></a>
                    <a class="tt-button tt-button--light-outline" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e("Explore Today's Picks", 'dawp'); ?></a>
                </div>
                <div class="tt-hero__trust" aria-label="<?php esc_attr_e('Store trust notes', 'dawp'); ?>">
                    <span><?php esc_html_e('Secure checkout', 'dawp'); ?></span>
                    <span><?php esc_html_e('Tracking included', 'dawp'); ?></span>
                    <span><?php esc_html_e('30-day returns on eligible items', 'dawp'); ?></span>
                </div>
            </div>

            <aside class="tt-hero-panel" aria-label="<?php esc_attr_e('Homepage shopping summary', 'dawp'); ?>">
                <span class="tt-hero-panel__label"><?php esc_html_e('Shop By Category', 'dawp'); ?></span>
                <strong class="tt-hero-panel__number">6</strong>
                <p><?php esc_html_e('Tools, Houseware, Vehicle Service, Gift and Toy, Pet Supplies, and Clothing and Accessories — everything sorted into one easy-to-shop store.', 'dawp'); ?></p>
            </aside>
        </div>
    </section>

    <div class="tt-container tt-feature-strip" aria-label="<?php esc_attr_e('Quick shopping links', 'dawp'); ?>">
        <a href="<?php echo esc_url(shopmivo_category_url('tools')); ?>"><?php esc_html_e('Tools', 'dawp'); ?><span aria-hidden="true"></span></a>
        <a href="<?php echo esc_url(shopmivo_category_url('houseware')); ?>"><?php esc_html_e('Houseware', 'dawp'); ?><span aria-hidden="true"></span></a>
        <a href="<?php echo esc_url(shopmivo_category_url('pet-supplies')); ?>"><?php esc_html_e('Pet Supplies', 'dawp'); ?><span aria-hidden="true"></span></a>
        <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('New Arrivals', 'dawp'); ?><span aria-hidden="true"></span></a>
    </div>

    <section id="shop-categories" class="tt-section">
        <div class="tt-container">
            <div class="tt-section-head">
                <div class="tt-section-head__content">
                    <span class="tt-eyebrow"><?php esc_html_e('Shop By Category', 'dawp'); ?></span>
                    <h2 class="tt-heading"><?php esc_html_e('Six categories, one easy store', 'dawp'); ?></h2>
                    <p class="tt-copy"><?php esc_html_e('Browse everyday essentials by category, then review product details before ordering.', 'dawp'); ?></p>
                </div>
                <a class="tt-button tt-button--outline" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All Products', 'dawp'); ?></a>
            </div>

            <div class="tt-vehicle-grid">
                <?php foreach ($vehicle_collections as $collection) : ?>
                    <a class="tt-vehicle-card" href="<?php echo esc_url(shopmivo_category_url($collection['slug'])); ?>">
                        <div class="tt-vehicle-card__media" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/img/' . $collection['image']); ?>');">
                            <div class="tt-vehicle-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo shopmivo_icon($collection['icon']); ?></svg>
                            </div>
                        </div>
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
                    <h2 class="tt-heading"><?php esc_html_e('Fresh picks across every category', 'dawp'); ?></h2>
                </div>
                <a class="tt-button tt-button--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All Products', 'dawp'); ?></a>
            </div>

            <div class="tt-product-grid">
                <?php if (!empty($new_arrivals)) : ?>
                    <?php foreach ($new_arrivals as $product) : ?>
                        <?php shopmivo_product_card($product); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="tt-empty-products">
                        <strong><?php esc_html_e('Products are being added to this collection.', 'dawp'); ?></strong>
                        <?php esc_html_e('Use the category links to prepare the store structure while published products are loading in WooCommerce.', 'dawp'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="tt-section">
        <div class="tt-container">
            <div class="tt-section-head">
                <div class="tt-section-head__content">
                    <span class="tt-eyebrow"><?php esc_html_e('Shop By Need', 'dawp'); ?></span>
                    <h2 class="tt-heading"><?php esc_html_e('Find the right pick for what you need today', 'dawp'); ?></h2>
                </div>
                <div class="tt-use-actions" aria-label="<?php esc_attr_e('Shop by need slider controls', 'dawp'); ?>">
                    <button type="button" data-tt-use-slide="prev" aria-label="<?php esc_attr_e('Previous shop by need slide', 'dawp'); ?>">&lsaquo;</button>
                    <button type="button" data-tt-use-slide="next" aria-label="<?php esc_attr_e('Next shop by need slide', 'dawp'); ?>">&rsaquo;</button>
                </div>
            </div>

            <div class="tt-use-grid" data-tt-use-track>
                <?php foreach ($use_cards as $card) : ?>
                    <a class="tt-use-card" href="<?php echo esc_url(shopmivo_category_url($card['slug'])); ?>">
                        <div class="tt-use-card__media" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/img/' . $card['image']); ?>');">
                            <div class="tt-use-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo shopmivo_icon($card['icon']); ?></svg>
                            </div>
                        </div>
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
                    <h2 class="tt-heading"><?php esc_html_e('Popular picks across every category', 'dawp'); ?></h2>
                </div>
                <a class="tt-button tt-button--outline" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Popular Picks', 'dawp'); ?></a>
            </div>

            <div class="tt-product-grid<?php echo !empty($customer_favorites) ? ' tt-product-grid--mobile-slider' : ''; ?>">
                <?php if (!empty($customer_favorites)) : ?>
                    <?php foreach ($customer_favorites as $product) : ?>
                        <?php shopmivo_product_card($product); ?>
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
                <h2 class="tt-heading"><?php esc_html_e('What shoppers look for in an everyday general store', 'dawp'); ?></h2>
                <p class="tt-copy"><?php esc_html_e('Shoppers come to Shopmivo for products that are practical, easy to understand, and simple to buy. These feedback areas can be replaced with verified customer reviews as the store grows.', 'dawp'); ?></p>
                <div class="tt-slider-controls" aria-label="<?php esc_attr_e('Feedback slider controls', 'dawp'); ?>">
                    <button type="button" data-tt-slide="prev" aria-label="<?php esc_attr_e('Previous feedback slide', 'dawp'); ?>">&lsaquo;</button>
                    <button type="button" data-tt-slide="next" aria-label="<?php esc_attr_e('Next feedback slide', 'dawp'); ?>">&rsaquo;</button>
                </div>
                <a class="tt-button tt-button--primary" href="<?php echo esc_url($shop_url); ?>" style="margin-top: 28px;"><?php esc_html_e('Shop Popular Picks', 'dawp'); ?></a>
            </div>

            <div class="tt-feedback-track" data-tt-feedback-track>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <div class="tt-feedback-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo shopmivo_icon('bag'); ?></svg>
                        </div>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('Easy Everyday Shopping', 'dawp'); ?></span>
                        <p><?php esc_html_e('One simple checkout for tools, houseware, and everything in between, without shopping five different stores.', 'dawp'); ?></p>
                    </div>
                </article>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <div class="tt-feedback-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo shopmivo_icon('grid'); ?></svg>
                        </div>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('One Store, Every Category', 'dawp'); ?></span>
                        <p><?php esc_html_e('Tools, houseware, pet supplies, and more organized clearly so nothing gets lost in a giant catalog.', 'dawp'); ?></p>
                    </div>
                </article>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <div class="tt-feedback-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo shopmivo_icon('clipboard'); ?></svg>
                        </div>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('Clear Product Details', 'dawp'); ?></span>
                        <p><?php esc_html_e('Sizing, materials, and included items are listed clearly so customers can order with confidence.', 'dawp'); ?></p>
                    </div>
                </article>
                <article class="tt-feedback-card">
                    <div class="tt-feedback-card__media">
                        <div class="tt-feedback-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo shopmivo_icon('tag'); ?></svg>
                        </div>
                    </div>
                    <div class="tt-feedback-card__body">
                        <span><?php esc_html_e('Value You Can Trust', 'dawp'); ?></span>
                        <p><?php esc_html_e('Everyday low prices across every category, from tools and toys to pet supplies and clothing.', 'dawp'); ?></p>
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
                    <h2 class="tt-heading"><?php esc_html_e('What customers say about shopping at Shopmivo', 'dawp'); ?></h2>
                    <?php if ($using_sample_reviews) : ?>
                        <p class="tt-copy"><?php esc_html_e('See what customers value most across every category. Approved WooCommerce product reviews will replace these homepage examples automatically when available.', 'dawp'); ?></p>
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
                            <div class="tt-review-card__avatar" aria-hidden="true"><?php echo esc_html(shopmivo_review_initials($review_author)); ?></div>
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
                            <path d="M20.59 13.41L13.42 20.58a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                            <circle cx="7" cy="7" r="1.5"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Everyday Low Prices', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Quality products at prices that make sense for every budget.', 'dawp'); ?></p>
                </article>
            </div>

            <div class="tt-final">
                <section class="tt-about-panel" aria-labelledby="shopmivo-about-heading">
                    <span class="tt-eyebrow"><?php esc_html_e('About Shopmivo', 'dawp'); ?></span>
                    <h3 id="shopmivo-about-heading"><?php esc_html_e('Built for everyday, one-stop shoppers.', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Shopmivo is an independent general merchandise store built for households who want tools, houseware, vehicle service essentials, gifts and toys, pet supplies, and clothing — all in one place.', 'dawp'); ?></p>
                    <div class="tt-disclaimer">
                        <?php esc_html_e('Shopmivo is an independent general merchandise store and is not affiliated with, endorsed by, or sponsored by Walmart Inc. or any other retailer.', 'dawp'); ?>
                    </div>
                    <div class="tt-policy-links">
                        <a href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Us', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
                    </div>
                </section>

                <section class="tt-newsletter" aria-labelledby="shopmivo-newsletter-heading">
                    <span class="tt-eyebrow"><?php esc_html_e('Shopmivo Deals', 'dawp'); ?></span>
                    <h3 id="shopmivo-newsletter-heading"><?php esc_html_e('Get new arrivals and everyday deals', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Join the list for new arrivals, seasonal picks, and deals across every category.', 'dawp'); ?></p>
                    <form id="newsletter-form">
                        <label class="screen-reader-text" for="shopmivo-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                        <input id="shopmivo-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>" required>
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
