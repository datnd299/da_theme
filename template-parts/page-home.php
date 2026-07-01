<?php
/**
 * Homepage template.
 */

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$asset = static function ($path) {
    return get_theme_file_uri('/assets/img/gallery/Rubyinstar/' . ltrim($path, '/'));
};

$categories = [
    ['title' => __('Passenger Car Tires', 'dawp'), 'copy' => __('Quiet, dependable tires for sedans, compacts, and daily commuter vehicles.', 'dawp'), 'image' => $asset('all-season-tread.png')],
    ['title' => __('SUV & Crossover Tires', 'dawp'), 'copy' => __('Stable, comfortable options for family vehicles, errands, and road trips.', 'dawp'), 'image' => $asset('category-suv-crossover-tires.png')],
    ['title' => __('Truck Tires', 'dawp'), 'copy' => __('Durable tire choices for pickups, work vehicles, towing, and heavier loads.', 'dawp'), 'image' => $asset('category-light-truck-tires.png')],
    ['title' => __('Performance Tires', 'dawp'), 'copy' => __('Responsive grip and confident control for drivers who want a sharper feel.', 'dawp'), 'image' => $asset('category-performance-tires.png')],
    ['title' => __('All Season Tires', 'dawp'), 'copy' => __('Balanced year-round performance for simple ownership in changing conditions.', 'dawp'), 'image' => $asset('category-all-season-tires.png')],
];

$fallback_products = [
    ['brand' => 'Michelin', 'model' => 'Defender 2', 'size' => '215/55R17', 'type' => 'All Season', 'price' => '$189.99', 'badge' => 'Best Seller'],
    ['brand' => 'Goodyear', 'model' => 'Assurance ComfortDrive', 'size' => '225/60R18', 'type' => 'Touring', 'price' => '$174.99', 'badge' => 'Popular Choice'],
    ['brand' => 'Continental', 'model' => 'TrueContact Tour', 'size' => '205/55R16', 'type' => 'All Season', 'price' => '$159.99', 'badge' => 'Free Shipping'],
    ['brand' => 'Bridgestone', 'model' => 'Dueler H/L', 'size' => '235/65R17', 'type' => 'SUV', 'price' => '$196.99', 'badge' => 'SUV Pick'],
    ['brand' => 'Pirelli', 'model' => 'Scorpion AS Plus', 'size' => '245/60R18', 'type' => 'All Season', 'price' => '$209.99', 'badge' => 'Road Trip Ready'],
    ['brand' => 'Firestone', 'model' => 'Destination LE3', 'size' => '265/70R17', 'type' => 'Truck', 'price' => '$187.99', 'badge' => 'Truck Value'],
    ['brand' => 'Yokohama', 'model' => 'Avid Ascend GT', 'size' => '225/55R17', 'type' => 'Touring', 'price' => '$166.99', 'badge' => 'Everyday Pick'],
    ['brand' => 'Cooper', 'model' => 'Endeavor Plus', 'size' => '235/55R18', 'type' => 'Crossover', 'price' => '$178.99', 'badge' => 'Great Value'],
];

$trust_items = [
    [__('Easy Online Shopping', 'dawp'), __('Compare sizes, styles, and prices from home with a clear path to checkout.', 'dawp')],
    [__('Competitive Pricing', 'dawp'), __('Practical tire options for everyday drivers without inflated promises.', 'dawp')],
    [__('Reliable Delivery', 'dawp'), __('Track your order from shipment through arrival with straightforward updates.', 'dawp')],
    [__('Customer Support', 'dawp'), __('Get help when you need confidence choosing the right tire for your vehicle.', 'dawp')],
];

$product_query = null;
if (class_exists('WooCommerce')) {
    $product_query = new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => 8,
        'post_status'    => 'publish',
    ]);
}
?>

<main id="primary" class="home-page">
    <section class="home-hero">
        <img class="home-hero__media" src="<?php echo esc_url($asset('tire-hero-road.png')); ?>" alt="">
        <div class="home-hero__inner">
            <div class="home-hero__copy">
                <p class="home-eyebrow"><?php esc_html_e('Online Tire Shopping Made Simple', 'dawp'); ?></p>
                <h1><?php esc_html_e('Find The Right Tires For Your Vehicle', 'dawp'); ?></h1>
                <p><?php esc_html_e('Shop trusted tire options with clear pricing, practical fit guidance, and convenient delivery for everyday drivers.', 'dawp'); ?></p>
                <div class="home-actions">
                    <a class="home-btn home-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Tires', 'dawp'); ?></a>
                    <a class="home-btn home-btn--ghost" href="#tire-finder"><?php esc_html_e('Find My Tire Size', 'dawp'); ?></a>
                </div>
            </div>

            <form id="tire-finder" class="home-finder" role="search" method="get" action="<?php echo esc_url($shop_url); ?>">
                <div class="home-finder__head">
                    <div>
                        <span><?php esc_html_e('Tire Finder', 'dawp'); ?></span>
                        <h2><?php esc_html_e('Start With Your Vehicle', 'dawp'); ?></h2>
                    </div>
                    <a href="<?php echo esc_url(home_url('/shop-by-rim-size/')); ?>"><?php esc_html_e('Search by size', 'dawp'); ?></a>
                </div>
                <div class="home-finder__grid">
                    <?php foreach ([__('Year', 'dawp'), __('Make', 'dawp'), __('Model', 'dawp'), __('Trim', 'dawp')] as $label) : ?>
                        <label>
                            <span><?php echo esc_html($label); ?></span>
                            <select>
                                <option><?php printf(esc_html__('Select %s', 'dawp'), esc_html($label)); ?></option>
                            </select>
                        </label>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="post_type" value="product">
                <button class="home-btn home-btn--dark" type="submit"><?php esc_html_e('Search Tires', 'dawp'); ?></button>
                <p><?php esc_html_e('Not sure what fits? Start by vehicle, check your tire sidewall, or browse by category below.', 'dawp'); ?></p>
            </form>
        </div>
    </section>

    <section class="home-strip" aria-label="<?php esc_attr_e('Shopping benefits', 'dawp'); ?>">
        <div><?php esc_html_e('Secure Checkout', 'dawp'); ?></div>
        <div><?php esc_html_e('Order Tracking', 'dawp'); ?></div>
        <div><?php esc_html_e('Transparent Shipping', 'dawp'); ?></div>
        <div><?php esc_html_e('Easy Returns', 'dawp'); ?></div>
    </section>

    <section class="home-section home-section--surface">
        <div class="home-section__head">
            <div>
                <p class="home-eyebrow"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                <h2><?php esc_html_e('Choose Tires For How You Drive', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url(home_url('/shop-by-vehicle-type/')); ?>"><?php esc_html_e('View Categories', 'dawp'); ?></a>
        </div>
        <div class="home-category-grid">
            <?php foreach ($categories as $index => $category) : ?>
                <a class="home-category <?php echo 0 === $index ? 'home-category--feature' : ''; ?>" href="<?php echo esc_url($shop_url); ?>">
                    <img src="<?php echo esc_url($category['image']); ?>" alt="<?php echo esc_attr($category['title']); ?>">
                    <span><?php esc_html_e('Shop Category', 'dawp'); ?></span>
                    <h3><?php echo esc_html($category['title']); ?></h3>
                    <p><?php echo esc_html($category['copy']); ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="home-section">
        <div class="home-section__head">
            <div>
                <p class="home-eyebrow"><?php esc_html_e('Featured Tires', 'dawp'); ?></p>
                <h2><?php esc_html_e('Popular Tires For Everyday Drivers', 'dawp'); ?></h2>
            </div>
            <a class="home-btn home-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All Tires', 'dawp'); ?></a>
        </div>
        <div class="home-product-grid">
            <?php if ($product_query && $product_query->have_posts()) : ?>
                <?php while ($product_query->have_posts()) : $product_query->the_post(); global $product; ?>
                    <article class="home-product">
                        <a class="home-product__image" href="<?php the_permalink(); ?>">
                            <?php echo $product ? $product->get_image('woocommerce_thumbnail') : get_the_post_thumbnail(get_the_ID(), 'woocommerce_thumbnail'); ?>
                        </a>
                        <span><?php esc_html_e('Free Shipping', 'dawp'); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php esc_html_e('All Season | Everyday Driving', 'dawp'); ?></p>
                        <div>
                            <strong><?php echo $product ? wp_kses_post($product->get_price_html()) : ''; ?></strong>
                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Shop Now', 'dawp'); ?></a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <?php foreach ($fallback_products as $item) : ?>
                    <article class="home-product">
                        <a class="home-product__image" href="<?php echo esc_url($shop_url); ?>">
                            <img src="<?php echo esc_url($asset('all-season-tread.png')); ?>" alt="">
                        </a>
                        <span><?php echo esc_html($item['badge']); ?></span>
                        <h3><?php echo esc_html($item['brand'] . ' ' . $item['model']); ?></h3>
                        <p><?php echo esc_html($item['size']); ?> | <?php echo esc_html($item['type']); ?></p>
                        <div>
                            <strong><?php echo esc_html($item['price']); ?></strong>
                            <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Now', 'dawp'); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="home-deal">
        <div>
            <p class="home-eyebrow"><?php esc_html_e('Seasonal Picks', 'dawp'); ?></p>
            <h2><?php esc_html_e('Quality Tires At Better Prices', 'dawp'); ?></h2>
            <p><?php esc_html_e('Explore dependable tire options for daily commutes, family vehicles, work trucks, and longer highway drives.', 'dawp'); ?></p>
            <div class="home-deal__chips">
                <span><?php esc_html_e('All Season Deals', 'dawp'); ?></span>
                <span><?php esc_html_e('SUV Tire Savings', 'dawp'); ?></span>
                <span><?php esc_html_e('Truck Tire Offers', 'dawp'); ?></span>
            </div>
            <a class="home-btn home-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Deals', 'dawp'); ?></a>
        </div>
        <img src="<?php echo esc_url($asset('suv-trailer-tires.png')); ?>" alt="">
    </section>

    <section class="home-section home-section--surface">
        <div class="home-section__center">
            <p class="home-eyebrow"><?php esc_html_e('Why Rubyinstar', 'dawp'); ?></p>
            <h2><?php esc_html_e('Confidence Before Checkout', 'dawp'); ?></h2>
        </div>
        <div class="home-trust-grid">
            <?php foreach ($trust_items as $item) : ?>
                <article class="home-trust">
                    <span aria-hidden="true"></span>
                    <h3><?php echo esc_html($item[0]); ?></h3>
                    <p><?php echo esc_html($item[1]); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="home-proof">
        <div>
            <p class="home-eyebrow"><?php esc_html_e('Customer Feedback', 'dawp'); ?></p>
            <h2><?php esc_html_e('What Customers Say', 'dawp'); ?></h2>
        </div>
        <?php foreach ([__('Easy shopping experience with clear product information.', 'dawp'), __('Good value and a convenient delivery process.', 'dawp'), __('I found the right tires without a complicated search.', 'dawp')] as $quote) : ?>
            <blockquote><?php echo esc_html($quote); ?></blockquote>
        <?php endforeach; ?>
    </section>

    <section class="home-newsletter">
        <div>
            <p class="home-eyebrow"><?php esc_html_e('Stay Ready', 'dawp'); ?></p>
            <h2><?php esc_html_e('Get Tire Deals & Updates', 'dawp'); ?></h2>
            <p><?php esc_html_e('Receive new offers, tire tips, and product updates.', 'dawp'); ?></p>
        </div>
        <form>
            <label class="sr-only" for="rubyinstar-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="rubyinstar-newsletter-email" type="email" placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>">
            <button class="home-btn home-btn--primary" type="submit"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
        </form>
    </section>
</main>
