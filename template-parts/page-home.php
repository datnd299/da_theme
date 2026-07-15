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
        'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=900&q=82',
        'href' => home_url('/product-category/home-essentials/'),
    ],
    [
        'name' => 'Furniture',
        'desc' => 'Comfortable pieces for living rooms, bedrooms and home offices.',
        'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=900&q=82',
        'href' => home_url('/product-category/furniture/'),
    ],
    [
        'name' => 'Electronics',
        'desc' => 'Entertainment, audio, accessories and connected tech essentials.',
        'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=82',
        'href' => home_url('/product-category/electronics/'),
    ],
    [
        'name' => 'Smart Home',
        'desc' => 'Lighting, security, plugs and devices for a smarter routine.',
        'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=900&q=82',
        'href' => home_url('/product-category/smart-home/'),
    ],
    [
        'name' => 'Kitchen & Dining',
        'desc' => 'Cookware, appliances, coffee gear and dining favorites.',
        'image' => 'https://images.unsplash.com/photo-1556911220-bff31c812dba?auto=format&fit=crop&w=900&q=82',
        'href' => home_url('/product-category/kitchen-dining/'),
    ],
    [
        'name' => 'Outdoor & Garden',
        'desc' => 'Patio, grilling, garden and outdoor living picks.',
        'image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=900&q=82',
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
            <?php echo dawp_get_responsive_image('https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1400&q=86', 'Modern living room with smart home products', '', 700, 560, 'eager', '(max-width: 900px) 100vw, 50vw', 'high'); ?>
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
                <?php echo dawp_get_responsive_image('https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=900&q=82', 'Smart home devices', '', 640, 420, 'lazy', '(max-width: 760px) 100vw, 33vw'); ?>
                <span><strong>Smart Living</strong><em>Lighting, security and connected comfort.</em></span>
            </a>
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/furniture/')); ?>">
                <?php echo dawp_get_responsive_image('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=900&q=82', 'Modern home furniture', '', 640, 420, 'lazy', '(max-width: 760px) 100vw, 33vw'); ?>
                <span><strong>Home Refresh</strong><em>Furniture and organization essentials.</em></span>
            </a>
            <a class="tgm-collection" href="<?php echo esc_url(home_url('/product-category/kitchen-dining/')); ?>">
                <?php echo dawp_get_responsive_image('https://images.unsplash.com/photo-1556911220-bff31c812dba?auto=format&fit=crop&w=900&q=82', 'Kitchen appliances and cookware', '', 640, 420, 'lazy', '(max-width: 760px) 100vw, 33vw'); ?>
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
                ['icon' => '>', 'title' => 'Fast Shipping', 'copy' => 'Reliable delivery across the United States.'],
                ['icon' => '$', 'title' => 'Secure Checkout', 'copy' => 'Protected payment experience from cart to confirmation.'],
                ['icon' => '30', 'title' => 'Easy Returns', 'copy' => 'Simple 30-day return process after delivery.'],
                ['icon' => '?', 'title' => 'Friendly Support', 'copy' => 'Helpful service whenever you need order guidance.'],
            ];
            foreach ($trust as $item) :
            ?>
                <article class="tgm-trust">
                    <span><?php echo esc_html($item['icon']); ?></span>
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
