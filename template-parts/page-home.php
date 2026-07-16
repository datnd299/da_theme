<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$categories = [
    [
        'name' => 'Home Essentials',
        'desc' => 'Storage, cleaning, organization and practical everyday upgrades.',
        'image' => get_theme_file_uri('assets/img/gallery/Modern_laundry_room_cleaning_sta…_202607161248.jpeg'),
        'href' => home_url('/product-category/home-essentials/'),
    ],
    [
        'name' => 'Furniture',
        'desc' => 'Comfortable pieces for living rooms, bedrooms and home offices.',
        'image' => get_theme_file_uri('assets/img/gallery/Living_room_furniture_set_neutra…_202607161252.jpeg'),
        'href' => home_url('/product-category/furniture/'),
    ],
    [
        'name' => 'Electronics',
        'desc' => 'Entertainment, audio, accessories and connected tech essentials.',
        'image' => get_theme_file_uri('assets/img/gallery/Home_entertainment_setup_televis…_202607161254.jpeg'),
        'href' => home_url('/product-category/electronics/'),
    ],
    [
        'name' => 'Smart Home',
        'desc' => 'Lighting, security, plugs and devices for a smarter routine.',
        'image' => get_theme_file_uri('assets/img/gallery/Smart_home_security_front_door_202607161256.jpeg'),
        'href' => home_url('/product-category/smart-home/'),
    ],
    [
        'name' => 'Kitchen & Dining',
        'desc' => 'Cookware, appliances, coffee gear and dining favorites.',
        'image' => get_theme_file_uri('assets/img/gallery/Cookware_on_induction_cooktop_202607161259.jpeg'),
        'href' => home_url('/product-category/kitchen-dining/'),
    ],
    [
        'name' => 'Outdoor & Garden',
        'desc' => 'Patio, grilling, garden and outdoor living picks.',
        'image' => get_theme_file_uri('assets/img/gallery/Garden_lounge_area_with_hanging_202607161300.jpeg'),
        'href' => home_url('/product-category/outdoor-garden/'),
    ],
];

$fallback_products = [
    ['name' => 'Smart LED Floor Lamp', 'brand' => 'Topgood Home', 'price' => '$49.99', 'old' => '$69.99', 'image' => 'https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?auto=format&fit=crop&w=700&q=82'],
    ['name' => 'Compact Air Fryer Oven', 'brand' => 'KitchenPro', 'price' => '$89.99', 'old' => '$119.99', 'image' => 'https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?auto=format&fit=crop&w=700&q=82'],
    ['name' => 'Wireless Charging Station', 'brand' => 'VoltEase', 'price' => '$34.99', 'old' => '', 'image' => 'https://images.unsplash.com/photo-1616410011236-7a42121dd981?auto=format&fit=crop&w=700&q=82'],
    ['name' => 'Modern Storage Cabinet', 'brand' => 'RoomReady', 'price' => '$129.99', 'old' => '$159.99', 'image' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=700&q=82'],
    ['name' => 'Smart Security Camera', 'brand' => 'SafeNest', 'price' => '$59.99', 'old' => '$79.99', 'image' => 'https://images.unsplash.com/photo-1558002038-bb4237b214c4?auto=format&fit=crop&w=700&q=82'],
    ['name' => 'Patio Bistro Chair Set', 'brand' => 'OpenAir', 'price' => '$149.99', 'old' => '', 'image' => 'https://images.unsplash.com/photo-1598902108854-10e335adac99?auto=format&fit=crop&w=700&q=82'],
    ['name' => 'Bluetooth Sound Bar', 'brand' => 'ClearWave', 'price' => '$74.99', 'old' => '$99.99', 'image' => 'https://images.unsplash.com/photo-1545454675-3531b543be5d?auto=format&fit=crop&w=700&q=82'],
    ['name' => 'Countertop Coffee Maker', 'brand' => 'BrewDaily', 'price' => '$64.99', 'old' => '', 'image' => 'https://images.unsplash.com/photo-1517668808822-9ebb02f2a0e6?auto=format&fit=crop&w=700&q=82'],
];

$wc_products = [];
if (class_exists('WooCommerce')) {
    $query = new WP_Query([
        'post_type' => 'product',
        'posts_per_page' => 8,
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_stock_status',
                'value' => 'instock',
            ],
        ],
    ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $product = wc_get_product(get_the_ID());
            if ($product) {
                $wc_products[] = $product;
            }
        }
        wp_reset_postdata();
    }
}
?>

<section class="tgm-hero">
    <div class="tgm-container tgm-hero__grid">
        <div class="tgm-hero__content">
            <p class="tgm-eyebrow">Modern Home &bull; Electronics &bull; Lifestyle</p>
            <h1>Everything You Need For Modern Living</h1>
            <p class="tgm-hero__copy">Discover quality products for your home, technology and everyday lifestyle at competitive prices.</p>
            <div class="tgm-hero__actions">
                <a class="tgm-btn tgm-btn--primary" href="<?php echo esc_url($shop_url); ?>">Shop Now</a>
                <a class="tgm-btn tgm-btn--secondary" href="<?php echo esc_url(home_url('/shop/?on_sale=1')); ?>">Explore Deals</a>
            </div>
            <div class="tgm-hero__proof" aria-label="Shopping benefits">
                <span>Secure checkout</span>
                <span>Fast U.S. shipping</span>
                <span>30-day returns</span>
            </div>
        </div>
        <div class="tgm-hero__media">
            <img loading="eager" decoding="async" fetchpriority="high" width="700" height="560" src="<?php echo esc_url(get_theme_file_uri('assets/img/gallery/Modern_living_room_smart_electro…_202607161235.jpeg')); ?>" alt="Modern living room with smart home products">
            <div class="tgm-hero__deal">
                <strong>Weekly Picks</strong>
                <span>Home, tech and kitchen deals refreshed often.</span>
            </div>
        </div>
    </div>
</section>

<section class="tgm-section">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Departments</p>
                <h2>Shop By Category</h2>
            </div>
            <a class="tgm-link" href="<?php echo esc_url($shop_url); ?>">View all categories</a>
        </div>
        <div class="tgm-category-grid">
            <?php foreach ($categories as $category) : ?>
                <a class="tgm-category" href="<?php echo esc_url($category['href']); ?>">
                    <img loading="lazy" decoding="async" width="520" height="360" src="<?php echo esc_url($category['image']); ?>" alt="<?php echo esc_attr($category['name']); ?>">
                    <span class="tgm-category__body">
                        <strong><?php echo esc_html($category['name']); ?></strong>
                        <span><?php echo esc_html($category['desc']); ?></span>
                        <em>Shop category</em>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="tgm-section tgm-section--soft">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Popular now</p>
                <h2>Featured Products</h2>
                <p>Popular choices for every home and lifestyle.</p>
            </div>
            <a class="tgm-link" href="<?php echo esc_url($shop_url); ?>">Shop all products</a>
        </div>
        <div class="tgm-product-grid">
            <?php if (!empty($wc_products)) : ?>
                <?php foreach ($wc_products as $product) : ?>
                    <article class="tgm-product">
                        <a class="tgm-product__image" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                            <?php echo $product->get_image('woocommerce_thumbnail'); ?>
                            <?php if ($product->is_on_sale()) : ?><span class="tgm-sale">Sale</span><?php endif; ?>
                        </a>
                        <div class="tgm-product__body">
                            <p class="tgm-product__brand"><?php echo esc_html($product->get_attribute('brand') ?: 'Topgoodmart'); ?></p>
                            <h3><a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
                            <div class="tgm-rating" aria-label="Rated <?php echo esc_attr($product->get_average_rating() ?: '5'); ?> out of 5">&#9733;&#9733;&#9733;&#9733;&#9733; <span><?php echo esc_html($product->get_review_count() ?: '12'); ?></span></div>
                            <div class="tgm-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                            <p class="tgm-ship">Fast shipping available</p>
                            <a class="tgm-add" href="<?php echo esc_url($product->add_to_cart_url()); ?>" data-product_id="<?php echo esc_attr($product->get_id()); ?>">Add to Cart</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else : ?>
                <?php foreach ($fallback_products as $product) : ?>
                    <article class="tgm-product">
                        <div class="tgm-product__image">
                            <?php echo dawp_get_responsive_image($product['image'], $product['name'], '', 520, 520, 'lazy', '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 25vw'); ?>
                            <?php if (!empty($product['old'])) : ?><span class="tgm-sale">Sale</span><?php endif; ?>
                        </div>
                        <div class="tgm-product__body">
                            <p class="tgm-product__brand"><?php echo esc_html($product['brand']); ?></p>
                            <h3><?php echo esc_html($product['name']); ?></h3>
                            <div class="tgm-rating">&#9733;&#9733;&#9733;&#9733;&#9733; <span>24</span></div>
                            <div class="tgm-product__price"><strong><?php echo esc_html($product['price']); ?></strong><?php if ($product['old']) : ?><del><?php echo esc_html($product['old']); ?></del><?php endif; ?></div>
                            <p class="tgm-ship">Fast shipping available</p>
                            <a class="tgm-add" href="<?php echo esc_url($shop_url); ?>">Add to Cart</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="tgm-section">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Curated collections</p>
                <h2>Trending Collections</h2>
            </div>
        </div>
        <div class="tgm-collection-grid">
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/smart-home/')); ?>">
                <img loading="lazy" decoding="async" width="640" height="420" src="<?php echo esc_url(get_theme_file_uri('assets/img/gallery/Living_ecosystem_with_smart_tech_202607161304.jpeg')); ?>" alt="Smart home devices">
                <span><strong>Smart Living</strong><em>Lighting, security and connected comfort.</em></span>
            </a>
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/furniture/')); ?>">
                <img loading="lazy" decoding="async" width="640" height="420" src="<?php echo esc_url(get_theme_file_uri('assets/img/gallery/Entryway_refresh_console_table_m…_202607161305.jpeg')); ?>" alt="Modern home furniture">
                <span><strong>Home Refresh</strong><em>Furniture and organization essentials.</em></span>
            </a>
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/kitchen-dining/')); ?>">
                <img loading="lazy" decoding="async" width="640" height="420" src="<?php echo esc_url(get_theme_file_uri('assets/img/gallery/Dining_area_with_kitchen_favorites_202607161311.jpeg')); ?>" alt="Kitchen appliances and cookware">
                <span><strong>Kitchen Favorites</strong><em>Appliances, cookware and coffee gear.</em></span>
            </a>
        </div>
    </div>
</section>

<section class="tgm-section tgm-section--blue">
    <div class="tgm-container">
        <div class="tgm-trust-grid">
            <?php
            $trust = [
                [
                    'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h11v10H3z"/><path d="M14 9h4l3 3v4h-7z"/><path d="M7 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M18 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>',
                    'title' => 'Fast Shipping',
                    'copy' => 'Reliable delivery across the United States.',
                ],
                [
                    'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.4-2.8 8.4-7 10-4.2-1.6-7-5.6-7-10V6z"/><path d="M9 12l2 2 4-5"/></svg>',
                    'title' => 'Secure Checkout',
                    'copy' => 'Protected payment experience from cart to confirmation.',
                ],
                [
                    'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12a7 7 0 0 1 12-4.9"/><path d="M17 4v3.1h-3.1"/><path d="M19 12a7 7 0 0 1-12 4.9"/><path d="M7 20v-3.1h3.1"/><text x="12" y="15" text-anchor="middle">30</text></svg>',
                    'title' => 'Easy Returns',
                    'copy' => 'Simple 30-day return process after delivery.',
                ],
                [
                    'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 13v-1a8 8 0 0 1 16 0v1"/><path d="M4 13h3v5H4z"/><path d="M17 13h3v5h-3z"/><path d="M9 20h4a4 4 0 0 0 4-4"/><path d="M13 20v-2"/></svg>',
                    'title' => 'Friendly Support',
                    'copy' => 'Helpful service whenever you need order guidance.',
                ],
            ];
            foreach ($trust as $item) :
            ?>
                <article class="tgm-trust">
                    <span class="tgm-trust__icon"><?php echo wp_kses($item['icon'], [
                        'svg' => ['viewbox' => true, 'aria-hidden' => true],
                        'path' => ['d' => true],
                        'text' => ['x' => true, 'y' => true, 'text-anchor' => true],
                    ]); ?></span>
                    <h3><?php echo esc_html($item['title']); ?></h3>
                    <p><?php echo esc_html($item['copy']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="tgm-section">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Customer confidence</p>
                <h2>Trusted By Everyday Shoppers</h2>
            </div>
        </div>
        <div class="tgm-review-row" aria-label="Customer reviews">
            <?php
            $reviews = [
                ['name' => 'Megan R.', 'location' => 'Austin, TX', 'text' => 'The site made it easy to compare products and my kitchen order arrived right inside the delivery estimate.'],
                ['name' => 'Chris L.', 'location' => 'Denver, CO', 'text' => 'Clean shopping experience, clear pricing and useful product details. I found home office upgrades quickly.'],
                ['name' => 'Ashley P.', 'location' => 'Tampa, FL', 'text' => 'I liked the mix of home and tech products. Checkout felt straightforward and tracking was easy to follow.'],
            ];
            foreach ($reviews as $review) :
            ?>
                <article class="tgm-review">
                    <div class="tgm-rating">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p><?php echo esc_html($review['text']); ?></p>
                    <strong><?php echo esc_html($review['name']); ?></strong>
                    <span><?php echo esc_html($review['location']); ?></span>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="tgm-newsletter">
    <div class="tgm-container tgm-newsletter__inner">
        <div>
            <p class="tgm-eyebrow">Deals and launches</p>
            <h2>Stay Updated With New Deals</h2>
            <p>Get exclusive offers, product launches and seasonal savings delivered to your inbox.</p>
        </div>
        <form class="tgm-newsletter__form" action="#" method="post">
            <label class="screen-reader-text" for="tgm-email">Email address</label>
            <input id="tgm-email" type="email" name="email" placeholder="Email address" required>
            <button type="submit">Subscribe</button>
        </form>
    </div>
</section>
