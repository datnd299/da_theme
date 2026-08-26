<?php
/**
 * Homepage template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url        = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$new_url         = home_url('/new-drops/');
$collections_url = home_url('/collections/');
$stories_url     = home_url('/culture-notes/');

$home_image = static function ($file, $alt, $class = '', $loading = 'lazy', $sizes = '100vw') {
    if (function_exists('dawp_get_home_responsive_image')) {
        return dawp_get_home_responsive_image($file, $alt, $class, $loading, $sizes);
    }

    return '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/homepage/brickgo/' . $file) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="' . esc_attr($loading) . '" decoding="async">';
};

$product_category_url = static function ($slug) use ($shop_url) {
    if (function_exists('get_term_by') && taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $url = get_term_link($term);

            if (!is_wp_error($url)) {
                return $url;
            }
        }
    }

    return add_query_arg('product_cat', $slug, $shop_url);
};

$fallback_products = [
    ['badge' => 'NEW', 'category' => 'Building Set', 'name' => 'Modular Studio Build', 'price' => '$68.00', 'image' => '13.png'],
    ['badge' => 'LIMITED', 'category' => 'Art Figure', 'name' => 'Chrome Meadow Figure', 'price' => '$42.00', 'image' => '6.png'],
    ['badge' => 'LOW STOCK', 'category' => 'Blind Box', 'name' => 'Pocket Form Mystery Box', 'price' => '$16.00', 'image' => '10.png'],
    ['badge' => 'NEW', 'category' => 'Display Piece', 'name' => 'Desk Totem Collector Edition', 'price' => '$54.00', 'image' => '17.png'],
];

$fallback_collector_picks = [
    ['category' => 'Designer Toy', 'name' => 'Soft Signal Display Figure', 'price' => '$78.00', 'image' => '14.png'],
    ['category' => 'Building Set', 'name' => 'Gallery Block Architecture Kit', 'price' => '$96.00', 'image' => '5.png'],
    ['category' => 'Mini Figure', 'name' => 'Tiny Mood Shelf Set', 'price' => '$32.00', 'image' => '19.png'],
];

$get_wc_products = static function ($args = []) {
    if (!function_exists('wc_get_products')) {
        return [];
    }

    return wc_get_products(array_merge([
        'status'  => 'publish',
        'limit'   => 8,
        'orderby' => 'date',
        'order'   => 'DESC',
        'return'  => 'objects',
    ], $args));
};

$format_wc_product = static function ($product, $badge = '') {
    if (!$product || !is_a($product, 'WC_Product')) {
        return null;
    }

    $category = __('Collectible', 'dawp');
    $terms = get_the_terms($product->get_id(), 'product_cat');
    if (!empty($terms) && !is_wp_error($terms)) {
        $category = $terms[0]->name;
    }

    return [
        'id'       => $product->get_id(),
        'badge'    => $badge,
        'category' => $category,
        'name'     => $product->get_name(),
        'price'    => $product->get_price_html(),
        'url'      => get_permalink($product->get_id()),
        'product'  => $product,
    ];
};

$format_wc_products = static function ($items, $badges = []) use ($format_wc_product) {
    $products = [];
    foreach ($items as $index => $product) {
        $formatted = $format_wc_product($product, $badges[$index] ?? '');
        if ($formatted) {
            $products[] = $formatted;
        }
    }

    return $products;
};

$latest_products = $format_wc_products(
    $get_wc_products(['limit' => 4, 'orderby' => 'date', 'order' => 'DESC']),
    ['NEW', 'NEW', 'NEW', 'NEW']
);

$trending_products = $format_wc_products(
    $get_wc_products(['limit' => 7, 'meta_key' => 'total_sales', 'orderby' => 'meta_value_num', 'order' => 'DESC'])
);

if (count($trending_products) < 7) {
    $known_ids = wp_list_pluck($trending_products, 'id');
    $more_products = $format_wc_products($get_wc_products([
        'limit'   => 7 - count($trending_products),
        'orderby' => 'date',
        'order'   => 'DESC',
        'exclude' => $known_ids,
    ]));
    $trending_products = array_merge($trending_products, $more_products);
}

$collector_picks = $format_wc_products(
    $get_wc_products(['limit' => 3, 'featured' => true, 'orderby' => 'date', 'order' => 'DESC'])
);

if (count($collector_picks) < 3) {
    $known_ids = wp_list_pluck($collector_picks, 'id');
    $more_picks = $format_wc_products($get_wc_products([
        'limit'   => 3 - count($collector_picks),
        'orderby' => 'rand',
        'exclude' => $known_ids,
    ]));
    $collector_picks = array_merge($collector_picks, $more_picks);
}

$products = $latest_products ?: $fallback_products;
$trending_products = $trending_products ?: array_merge($fallback_products, $fallback_collector_picks);
$collector_picks = $collector_picks ?: $fallback_collector_picks;

$product_card = static function ($product, $index = 0, $loading = 'lazy', $sizes = '(min-width: 900px) 25vw, 50vw') use ($home_image, $shop_url) {
    $url = $product['url'] ?? $shop_url;
    $name = $product['name'] ?? '';
    $badge = $product['badge'] ?? '';
    $category = $product['category'] ?? __('Collectible', 'dawp');
    $price = $product['price'] ?? '';
    ?>
    <article class="home-product-card">
        <a class="home-product-card__image" href="<?php echo esc_url($url); ?>">
            <?php if ($badge || $index % 3 === 0) : ?><span class="home-badge"><?php echo esc_html($badge ?: __('NEW', 'dawp')); ?></span><?php endif; ?>
            <button class="home-wishlist" type="button" aria-label="<?php echo esc_attr(sprintf(__('Save %s to wishlist', 'dawp'), $name)); ?>">&hearts;</button>
            <?php
            if (!empty($product['product']) && is_a($product['product'], 'WC_Product')) {
                echo function_exists('dawp_get_product_responsive_image')
                    ? dawp_get_product_responsive_image($product['product'], '', 520, 520, $sizes)
                    : $product['product']->get_image('woocommerce_thumbnail', ['loading' => $loading]);
            } else {
                echo $home_image($product['image'] ?? dawp_home_image_file($index), $name, '', $loading, $sizes);
            }
            ?>
        </a>
        <div class="home-product-card__body">
            <p><?php echo esc_html($category); ?></p>
            <h3><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($name); ?></a></h3>
            <strong><?php echo wp_kses_post($price); ?></strong>
        </div>
    </article>
    <?php
};
?>

<section class="home-hero" aria-labelledby="home-hero-title">
    <div class="home-shell home-hero__grid">
        <div class="home-hero__content">
            <p class="home-kicker"><?php esc_html_e('Build. Collect. Display.', 'dawp'); ?></p>
            <h1 id="home-hero-title"><?php esc_html_e('BUILT TO COLLECT.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Creative objects for building, collecting, and displaying. New forms, clean shelves, zero boring corners.', 'dawp'); ?></p>
            <div class="home-actions">
                <a class="home-btn home-btn--dark" href="<?php echo esc_url($new_url); ?>"><?php esc_html_e('Shop New Drops', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
                <a class="home-btn home-btn--light" href="<?php echo esc_url($collections_url); ?>"><?php esc_html_e('Explore Collections', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
        <div class="home-hero__media">
            <?php echo $home_image('9.png', __('Colorful collectible castle build on a clean display shelf', 'dawp'), 'home-hero__image', 'eager', '(min-width: 900px) 54vw, 100vw'); ?>
            <div class="home-hero__label">
                <span><?php esc_html_e('Drop 024', 'dawp'); ?></span>
                <strong><?php esc_html_e('Studio scale display builds', 'dawp'); ?></strong>
            </div>
        </div>
    </div>
</section>

<section class="home-section" aria-labelledby="home-category-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Shop by universe', 'dawp'); ?></p>
                <h2 id="home-category-title"><?php esc_html_e('FIND YOUR THING.', 'dawp'); ?></h2>
            </div>
        </div>
        <div class="home-universe">
            <?php
            $universes = [
                ['title' => 'BUILD', 'meta' => 'Building Sets', 'copy' => 'Architecture-inspired kits and satisfying mechanical forms.', 'image' => '13.png', 'url' => $shop_url],
                ['title' => 'COLLECT', 'meta' => 'Art Figures', 'copy' => 'Original display figures with personality and shelf presence.', 'image' => '12.png', 'url' => $shop_url],
                ['title' => 'DISCOVER', 'meta' => 'Designer Toys', 'copy' => 'Fresh shapes, odd little objects, and conversation starters.', 'image' => '14.png', 'url' => home_url('/about-us/')],
                ['title' => 'UNBOX', 'meta' => 'Blind Boxes', 'copy' => 'Small surprises built for trading, gifting, and repeat discovery.', 'image' => '10.png', 'url' => $shop_url],
            ];
            foreach ($universes as $item) :
                ?>
                <a class="home-universe-card" href="<?php echo esc_url($item['url']); ?>">
                    <?php echo $home_image($item['image'], sprintf(__('%s collectible category image', 'dawp'), $item['meta']), '', 'lazy', '(min-width: 900px) 25vw, 78vw'); ?>
                    <span>
                        <em><?php echo esc_html($item['meta']); ?></em>
                        <strong><?php echo esc_html($item['title']); ?></strong>
                        <small><?php echo esc_html($item['copy']); ?></small>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="home-section home-section--surface" aria-labelledby="home-drops-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Fresh arrivals', 'dawp'); ?></p>
                <h2 id="home-drops-title"><?php esc_html_e('JUST DROPPED.', 'dawp'); ?></h2>
            </div>
            <a class="home-text-link" href="<?php echo esc_url($new_url); ?>"><?php esc_html_e('View all', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="home-product-row">
            <?php foreach ($products as $index => $product) : ?>
                <?php $product_card($product, $index, 'eager', '(min-width: 900px) 25vw, 55vw'); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="home-editorial" aria-labelledby="home-editorial-title">
    <div class="home-shell home-editorial__grid">
        <div class="home-editorial__media">
            <?php echo $home_image('16.png', __('Collectibles arranged across floating wall shelves', 'dawp'), '', 'lazy', '(min-width: 900px) 50vw, 100vw'); ?>
        </div>
        <div class="home-editorial__content">
            <p class="home-kicker"><?php esc_html_e('Display culture', 'dawp'); ?></p>
            <h2 id="home-editorial-title"><?php esc_html_e('MORE THAN A TOY.', 'dawp'); ?></h2>
            <p><?php esc_html_e('The best collectibles earn their spot: on a desk, beside a monitor, under warm light, or right where guests notice them first.', 'dawp'); ?></p>
            <a class="home-btn home-btn--dark" href="<?php echo esc_url($collections_url); ?>"><?php esc_html_e('Explore the Collection', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</section>

<section class="home-section" aria-labelledby="home-trending-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Most watched', 'dawp'); ?></p>
                <h2 id="home-trending-title"><?php esc_html_e('TRENDING NOW.', 'dawp'); ?></h2>
            </div>
        </div>
        <div class="home-product-grid">
            <?php foreach ($trending_products as $index => $product) : ?>
                <?php $product_card($product, $index, 'lazy', '(min-width: 900px) 25vw, 50vw'); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="home-section home-section--surface" aria-labelledby="home-collections-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Curated paths', 'dawp'); ?></p>
                <h2 id="home-collections-title"><?php esc_html_e('COLLECTIONS WORTH EXPLORING.', 'dawp'); ?></h2>
            </div>
        </div>
        <div class="home-collection-grid">
            <?php
            $collections = [
                ['title' => 'FOR YOUR DESK', 'label' => 'Display Collectibles', 'slug' => 'display-collectibles', 'image' => '17.png'],
                ['title' => 'SHELF ICONS', 'label' => 'Art Figures', 'slug' => 'art-figures', 'image' => '18.png'],
                ['title' => 'BIG BUILDS', 'label' => 'Building Sets', 'slug' => 'building-sets', 'image' => '5.png'],
                ['title' => 'SMALL OBSESSIONS', 'label' => 'Mini Figures', 'slug' => 'mini-figures', 'image' => '20.png'],
                ['title' => 'UNDER $50', 'label' => 'Gift Ideas', 'slug' => 'gift-ideas', 'image' => '1.png'],
            ];
            foreach ($collections as $collection) :
                ?>
                <a class="home-collection-card" href="<?php echo esc_url($product_category_url($collection['slug'])); ?>">
                    <?php echo $home_image($collection['image'], $collection['title'], '', 'lazy', '(min-width: 900px) 33vw, 82vw'); ?>
                    <span>
                        <em><?php echo esc_html($collection['label']); ?></em>
                        <strong><?php echo esc_html($collection['title']); ?></strong>
                        <small><?php esc_html_e('Shop category', 'dawp'); ?> &rarr;</small>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="home-drop" aria-labelledby="home-next-drop-title">
    <div class="home-shell home-drop__grid">
        <div>
            <p class="home-kicker"><?php esc_html_e('Next drop', 'dawp'); ?></p>
            <h2 id="home-next-drop-title"><?php esc_html_e('DROP 024', 'dawp'); ?></h2>
            <p><?php esc_html_e('A compact run of sculptural desk collectibles arrives Sep 12 at 10:00.', 'dawp'); ?></p>
            <div class="home-countdown" aria-label="<?php esc_attr_e('Drop countdown', 'dawp'); ?>">
                <span><strong>04</strong>D</span><span><strong>12</strong>H</span><span><strong>08</strong>M</span>
            </div>
            <div class="home-actions">
                <a class="home-btn home-btn--red" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Now', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
                <a class="home-btn home-btn--light" href="<?php echo esc_url($new_url); ?>"><?php esc_html_e('View Drop', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
        <div class="home-drop__media">
            <?php echo $home_image('6.png', __('Upcoming geometric collectible display build', 'dawp'), '', 'lazy', '(min-width: 900px) 40vw, 100vw'); ?>
        </div>
    </div>
</section>

<section class="home-section" aria-labelledby="home-picks-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Curator edit', 'dawp'); ?></p>
                <h2 id="home-picks-title"><?php esc_html_e("COLLECTOR'S PICKS.", 'dawp'); ?></h2>
            </div>
        </div>
        <div class="home-picks">
            <?php foreach ($collector_picks as $index => $pick) : ?>
                <article class="home-pick-card">
                    <?php
                    if (!empty($pick['product']) && is_a($pick['product'], 'WC_Product')) {
                        echo function_exists('dawp_get_product_responsive_image')
                            ? dawp_get_product_responsive_image($pick['product'], '', 640, 640, '(min-width: 900px) 33vw, 82vw')
                            : $pick['product']->get_image('woocommerce_thumbnail', ['loading' => 'lazy']);
                    } else {
                        echo $home_image($pick['image'] ?? dawp_home_image_file($index), $pick['name'], '', 'lazy', '(min-width: 900px) 33vw, 82vw');
                    }
                    ?>
                    <div>
                        <p><?php echo esc_html($pick['category']); ?></p>
                        <h3><?php echo esc_html($pick['name']); ?></h3>
                        <strong><?php echo wp_kses_post($pick['price']); ?></strong>
                        <a href="<?php echo esc_url($pick['url'] ?? $shop_url); ?>"><?php esc_html_e('Shop pick', 'dawp'); ?> &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="home-section home-section--surface" aria-labelledby="home-stories-title">
    <div class="home-shell">
        <div class="home-section__head">
            <div>
                <p class="home-kicker"><?php esc_html_e('Culture notes', 'dawp'); ?></p>
                <h2 id="home-stories-title"><?php esc_html_e('STORIES FOR COLLECTORS.', 'dawp'); ?></h2>
            </div>
            <a class="home-text-link" href="<?php echo esc_url($stories_url); ?>"><?php esc_html_e('Read more', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="home-story-grid">
            <?php
            $culture_notes = function_exists('dawp_culture_notes') ? dawp_culture_notes() : [];
            $story_slugs = ['collected-not-crowded-shelf', 'weekend-build-you-keep-out', 'cleaner-blind-box-start'];
            $stories = array_intersect_key($culture_notes, array_flip($story_slugs));
            foreach ($stories as $slug => $story) :
                ?>
                <article class="home-story-card">
                    <?php echo $home_image($story['image'], $story['title'], '', 'lazy', '(min-width: 900px) 33vw, 82vw'); ?>
                    <div>
                        <p><?php echo esc_html($story['category']); ?></p>
                        <h3><?php echo esc_html($story['title']); ?></h3>
                        <a href="<?php echo esc_url(dawp_culture_note_url($slug)); ?>"><?php esc_html_e('Read Story', 'dawp'); ?> &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="home-newsletter" aria-labelledby="home-newsletter-title">
    <div class="home-shell home-newsletter__grid">
        <div>
            <p class="home-kicker"><?php esc_html_e('Inbox drop list', 'dawp'); ?></p>
            <h2 id="home-newsletter-title"><?php esc_html_e('GET THE DROP.', 'dawp'); ?></h2>
            <p><?php esc_html_e('New releases, collector stories, and pieces worth discovering.', 'dawp'); ?></p>
        </div>
        <form class="home-newsletter__form" action="<?php echo esc_url(home_url('/')); ?>" method="post">
            <label class="screen-reader-text" for="home-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="home-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" required>
            <button type="submit"><?php esc_html_e('Join', 'dawp'); ?><span aria-hidden="true">&rarr;</span></button>
        </form>
    </div>
</section>
