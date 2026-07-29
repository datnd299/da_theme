<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$gallery_image = static function ($filename) {
    return get_theme_file_uri('assets/img/gallery/' . $filename);
};

$categories = [
    [
        'name' => 'Home Essentials',
        'desc' => 'Storage, cleaning, organization and practical everyday upgrades.',
        'image' => $gallery_image('modern-laundry-room-cleaning-station-202607161248.jpeg'),
        'href' => home_url('/product-category/home-essentials/'),
    ],
    [
        'name' => 'Furniture',
        'desc' => 'Comfortable pieces for living rooms, bedrooms and home offices.',
        'image' => $gallery_image('living-room-furniture-set-neutral-202607161252.jpeg'),
        'href' => home_url('/product-category/furniture/'),
    ],
    [
        'name' => 'Electronics',
        'desc' => 'Entertainment, audio, accessories and connected tech essentials.',
        'image' => $gallery_image('home-entertainment-setup-television-202607161254.jpeg'),
        'href' => home_url('/product-category/electronics/'),
    ],
    [
        'name' => 'Smart Home',
        'desc' => 'Lighting, security, plugs and devices for a smarter routine.',
        'image' => $gallery_image('Smart_home_security_front_door_202607161256.jpeg'),
        'href' => home_url('/product-category/smart-home/'),
    ],
    [
        'name' => 'Kitchen & Dining',
        'desc' => 'Cookware, appliances, coffee gear and dining favorites.',
        'image' => $gallery_image('Cookware_on_induction_cooktop_202607161259.jpeg'),
        'href' => home_url('/product-category/kitchen-dining/'),
    ],
    [
        'name' => 'Outdoor & Garden',
        'desc' => 'Patio, grilling, garden and outdoor living picks.',
        'image' => $gallery_image('Garden_lounge_area_with_hanging_202607161300.jpeg'),
        'href' => home_url('/product-category/outdoor-garden/'),
    ],
];

if (function_exists('dawp_lbq_product_categories')) {
    $category_images = [
        'home-garden-tools' => $gallery_image('modern-laundry-room-cleaning-station-202607161248.jpeg'),
        'electronics' => $gallery_image('home-entertainment-setup-television-202607161254.jpeg'),
        'sports-outdoors' => $gallery_image('Hiking_boots_daypack_trekking_poles_202607241407.jpeg'),
        'toys-outdoor-play' => $gallery_image('Cornhole_boards_with_bean_bags_202607241407.jpeg'),
        'beauty-personal-care' => $gallery_image('wooden-hairbrushes-grooming-tools-202607241406.jpeg'),
        'pets' => $gallery_image('golden-retriever-puppy-eating-feed-202607241402.jpeg'),
        'school-office-art-supplies' => $gallery_image('creative-supply-setup-watercolor-202607241409.jpeg'),
    ];

    $categories = [];

    foreach (dawp_lbq_product_categories() as $slug => $category) {
        if ($slug === 'school-office-art-supplies') {
            continue;
        }

        $categories[] = [
            'name' => $category['name'],
            'desc' => $category['short'],
            'image' => $category_images[$slug] ?? $gallery_image('modern-living-room-smart-electronics-202607161235.jpeg'),
            'href' => function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : home_url('/product-category/' . trim($slug, '/') . '/'),
        ];
    }
}

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
            <p class="tgm-eyebrow">Home &bull; Electronics &bull; Outdoor &bull; Everyday Supplies</p>
            <h1>Everything You Need For Everyday Shopping</h1>
            <p class="tgm-hero__copy">Discover quality products across home, tech, sports, toys, beauty, pets and supplies at competitive prices.</p>
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
            <?php echo dawp_get_responsive_image($gallery_image('modern-living-room-smart-electronics-202607161235.jpeg'), 'Modern living room with smart home products', '', 700, 560, 'eager', '(max-width: 900px) 100vw, 50vw', 'high'); ?>
            <div class="tgm-hero__deal">
                <strong>Weekly Picks</strong>
                <span>Home, tech and everyday deals refreshed often.</span>
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
                    <?php echo dawp_get_responsive_image($category['image'], $category['name'], '', 520, 360, 'lazy', '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw'); ?>
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

<?php if (!empty($wc_products)) : ?>
<section class="tgm-section tgm-section--soft">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Popular now</p>
                <h2>Featured Products</h2>
                <p>Popular choices across everyday departments.</p>
            </div>
            <a class="tgm-link" href="<?php echo esc_url($shop_url); ?>">Shop all products</a>
        </div>
        <div class="tgm-product-grid">
            <?php foreach ($wc_products as $product) : ?>
                <article class="tgm-product">
                    <a class="tgm-product__image" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                        <?php
                        $product_image = dawp_get_responsive_attachment_image($product->get_image_id(), $product->get_name(), '', 520, 520, 'lazy', '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 25vw');
                        echo $product_image ?: $product->get_image('woocommerce_thumbnail');
                        ?>
                    </a>
                    <div class="tgm-product__body">
                        <p class="tgm-product__brand"><?php echo esc_html($product->get_attribute('brand') ?: 'Topgoodmart'); ?></p>
                        <h3><a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
                        <div class="tgm-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                        <p class="tgm-ship">Fast shipping available</p>
                        <a class="tgm-add" href="<?php echo esc_url($product->add_to_cart_url()); ?>" data-product_id="<?php echo esc_attr($product->get_id()); ?>">Add to Cart</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="tgm-section">
    <div class="tgm-container">
        <div class="tgm-section__head">
            <div>
                <p class="tgm-eyebrow">Curated collections</p>
                <h2>Trending Collections</h2>
            </div>
        </div>
        <div class="tgm-collection-grid">
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/electronics/')); ?>">
                <?php echo dawp_get_responsive_image($gallery_image('Living_ecosystem_with_smart_tech_202607161304.jpeg'), 'Smart home devices', '', 640, 420, 'lazy', '(max-width: 900px) 100vw, 33vw'); ?>
                <span><strong>Electronics Picks</strong><em>Audio, accessories and connected comfort.</em></span>
            </a>
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/home-garden-tools/')); ?>">
                <?php echo dawp_get_responsive_image($gallery_image('entryway-refresh-console-table-202607161305.jpeg'), 'Modern entryway with home organization and decor', '', 640, 420, 'lazy', '(max-width: 900px) 100vw, 33vw'); ?>
                <span><strong>Home Refresh</strong><em>Home, garden and tool essentials.</em></span>
            </a>
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/school-office-art-supplies/')); ?>">
                <?php echo dawp_get_responsive_image($gallery_image('creative-supply-setup-watercolor-202607241409.jpeg'), 'Creative school office and art supplies', '', 640, 420, 'lazy', '(max-width: 900px) 100vw, 33vw'); ?>
                <span><strong>Work & Study</strong><em>Office, school and creative supplies.</em></span>
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
