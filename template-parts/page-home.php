<?php
/**
 * Medial Market home page template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri = get_template_directory_uri();
$theme_dir = get_template_directory();
$shop_url  = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$mm_asset = static function ($file) use ($theme_uri, $theme_dir) {
    foreach (['assets/img/home/', 'assets/img/gallery/'] as $dir) {
        $path = $theme_dir . '/' . $dir . $file;
        if (file_exists($path)) {
            return add_query_arg('ver', filemtime($path), $theme_uri . '/' . $dir . $file);
        }
    }

    return $theme_uri . '/assets/img/home/' . $file;
};

$mm_img = static function ($file, $alt, $class = '', $width = 900, $height = 700, $loading = 'lazy', $sizes = '', $priority = '') use ($mm_asset) {
    $url = $mm_asset($file);

    if (function_exists('dawp_get_responsive_image')) {
        return dawp_get_responsive_image($url, $alt, $class, $width, $height, $loading, $sizes, $priority);
    }

    return sprintf(
        '<img src="%s" alt="%s" class="%s" width="%d" height="%d" loading="%s" decoding="async">',
        esc_url($url),
        esc_attr($alt),
        esc_attr($class),
        (int) $width,
        (int) $height,
        esc_attr($loading)
    );
};

$mm_search_url = static function ($term) {
    return add_query_arg(['s' => $term, 'post_type' => 'product'], home_url('/'));
};

$mm_product_card = static function ($product_id) {
    if (!function_exists('wc_get_product')) {
        return;
    }

    $product = wc_get_product($product_id);
    if (!$product || !$product->is_visible()) {
        return;
    }

    $terms    = get_the_terms($product_id, 'product_cat');
    $category = '';
    if (!is_wp_error($terms) && !empty($terms)) {
        $category = $terms[0]->name;
    }

    $rating     = (float) $product->get_average_rating();
    $count      = (int) $product->get_rating_count();
    $link       = get_permalink($product_id);
    $is_simple  = $product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock();
    $on_sale    = $product->is_on_sale();
    ?>
    <article class="mm-card">
        <a class="mm-card__media" href="<?php echo esc_url($link); ?>" tabindex="-1" aria-hidden="true">
            <?php
            echo function_exists('dawp_get_product_responsive_image')
                ? dawp_get_product_responsive_image($product, 'mm-card__img', 420, 420, '(max-width: 639px) 46vw, (max-width: 1023px) 31vw, 23vw')
                : $product->get_image('woocommerce_thumbnail', ['class' => 'mm-card__img', 'loading' => 'lazy']);
            ?>
            <?php if ($on_sale) : ?><span class="mm-card__badge"><?php esc_html_e('Sale', 'dawp'); ?></span><?php endif; ?>
        </a>
        <div class="mm-card__body">
            <?php if ($category) : ?><p class="mm-card__cat"><?php echo esc_html($category); ?></p><?php endif; ?>
            <h3 class="mm-card__title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
            <?php if ($count > 0) : ?>
                <div class="mm-card__rating" aria-label="<?php echo esc_attr(sprintf(__('Rated %s out of 5', 'dawp'), number_format($rating, 1))); ?>">
                    <span class="mm-stars" style="--mm-rating:<?php echo esc_attr(max(0, min(100, $rating * 20))); ?>%" aria-hidden="true"></span>
                    <em>(<?php echo esc_html($count); ?>)</em>
                </div>
            <?php endif; ?>
            <div class="mm-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
            <a class="mm-card__cta<?php echo $is_simple ? ' add_to_cart_button ajax_add_to_cart' : ''; ?>" href="<?php echo esc_url($product->add_to_cart_url()); ?>" data-quantity="1" data-product_id="<?php echo esc_attr($product_id); ?>" data-product_sku="<?php echo esc_attr($product->get_sku()); ?>" rel="nofollow" aria-label="<?php echo esc_attr(sprintf(__('%1$s: %2$s', 'dawp'), $product->add_to_cart_text(), $product->get_name())); ?>">
                <?php echo esc_html($product->add_to_cart_text()); ?>
            </a>
        </div>
    </article>
    <?php
};

$categories = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [];

$popular_searches = [
    __('Sofas', 'dawp'),
    __('Bar Stools', 'dawp'),
    __('Nightstands', 'dawp'),
    __('Patio Sets', 'dawp'),
    __('Gazebos', 'dawp'),
    __('Area Rugs', 'dawp'),
    __('Bookcases', 'dawp'),
    __('Standing Desks', 'dawp'),
    __('Kitchen Carts', 'dawp'),
    __('Cat Trees', 'dawp'),
    __('Dog Kennels', 'dawp'),
    __('Kids Table Sets', 'dawp'),
];

$promos = [
    [
        'eyebrow' => __('Kitchen & Dining', 'dawp'),
        'title'   => __('Cook, serve and gather for less', 'dawp'),
        'copy'    => __('Cookware, bar stools, kitchen carts and small appliances that work hard every day.', 'dawp'),
        'image'   => 'Dining.jpeg',
        'url'     => dawp_product_category_url('kitchen-dining'),
        'cta'     => __('Shop Kitchen & Dining', 'dawp'),
    ],
    [
        'eyebrow' => __('Outdoor & Patio', 'dawp'),
        'title'   => __('Make the backyard your favorite room', 'dawp'),
        'copy'    => __('Conversation sets, umbrellas, gazebos and fire pits for easy outdoor living.', 'dawp'),
        'image'   => 'Summer_Patio_Edit.jpeg',
        'url'     => dawp_product_category_url('outdoor-patio'),
        'cta'     => __('Shop Outdoor & Patio', 'dawp'),
    ],
];

$values = [
    ['title' => __('Honest everyday prices', 'dawp'), 'copy' => __('Fair prices on the pieces homes actually use, without inflated "compare at" games.', 'dawp'), 'icon' => '<path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8z"></path><circle cx="7.5" cy="7.5" r="1.5"></circle>'],
    ['title' => __('Free standard shipping', 'dawp'), 'copy' => __('Every order ships free within the U.S. and usually arrives in 4-7 business days.', 'dawp'), 'icon' => '<path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="18.5" r="1.8"></circle><circle cx="17.5" cy="18.5" r="1.8"></circle>'],
    ['title' => __('30-day returns', 'dawp'), 'copy' => __('Changed your mind? Return unused items in original packaging within 30 days of delivery.', 'dawp'), 'icon' => '<path d="M3 12a9 9 0 1 0 3-6.7"></path><path d="M3 4v5h5"></path>'],
    ['title' => __('People who answer', 'dawp'), 'copy' => __('Questions about size, assembly or an order? Our U.S. support team replies within 1 business day.', 'dawp'), 'icon' => '<path d="M4 5h16v11H8l-4 4z"></path>'],
];

$best_sellers = [];
$new_arrivals = [];

if (function_exists('wc_get_products')) {
    $best_sellers = wc_get_products([
        'status'  => 'publish',
        'limit'   => 8,
        'orderby' => 'popularity',
        'return'  => 'ids',
    ]);

    $new_arrivals = wc_get_products([
        'status'  => 'publish',
        'limit'   => 8,
        'orderby' => 'date',
        'order'   => 'DESC',
        'return'  => 'ids',
        'exclude' => array_slice($best_sellers, 0, 4),
    ]);
}
?>

<style>
    .mm-home { color:var(--color-foreground); font-family:var(--font-sans); }
    .mm-home *, .mm-home *::before, .mm-home *::after { box-sizing:border-box; }
    .mm-home h1, .mm-home h2, .mm-home h3 { margin:0; color:var(--color-foreground); font-family:var(--font-heading); letter-spacing:-.01em; }
    .mm-home p { margin:0; }
    .mm-container { width:min(100% - 32px, 1280px); margin-inline:auto; }
    .mm-eyebrow { display:inline-flex; align-items:center; gap:8px; margin-bottom:12px; color:var(--color-accent); font-size:.78rem; font-weight:700; letter-spacing:.08em; text-transform:uppercase; }
    .mm-btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; min-height:48px; border:2px solid transparent; border-radius:var(--radius-pill); padding:0 26px; font-size:.95rem; font-weight:700; text-decoration:none; transition:background var(--duration-fast) var(--ease-fluid), color var(--duration-fast) var(--ease-fluid), transform var(--duration-fast) var(--ease-fluid); }
    .mm-btn:active { transform:scale(.98); }
    .mm-btn--value { background:var(--color-value); color:#fff; }
    .mm-btn--value:hover { background:var(--color-value-hover); color:#fff; }
    .mm-btn--ghost { border-color:var(--color-foreground); color:var(--color-foreground); background:transparent; }
    .mm-btn--ghost:hover { background:var(--color-foreground); color:#fff; }
    .mm-btn--light { background:#fff; color:var(--color-foreground); }
    .mm-btn--light:hover { background:var(--color-value-soft); color:var(--color-value-hover); }
    .mm-section { padding:48px 0; }
    .mm-section--soft { background:var(--color-surface); }
    .mm-section--warm { background:var(--color-surface-alt); }
    .mm-head { display:flex; flex-wrap:wrap; align-items:flex-end; justify-content:space-between; gap:12px 24px; margin-bottom:24px; }
    .mm-head h2 { font-size:clamp(1.5rem, 2.6vw, 2.1rem); font-weight:800; line-height:1.15; }
    .mm-head p:not(.mm-eyebrow) { max-width:560px; margin-top:8px; color:var(--color-foreground-muted); font-size:.95rem; line-height:1.6; }
    .mm-link { color:var(--color-accent); font-weight:700; text-decoration:none; white-space:nowrap; }
    .mm-link:hover { color:var(--color-accent-hover); text-decoration:underline; text-underline-offset:4px; }

    .mm-hero { background:linear-gradient(180deg, var(--color-surface) 0%, #fff 100%); }
    .mm-hero__grid { display:grid; gap:28px; padding:28px 0 44px; align-items:center; }
    .mm-hero h1 { font-size:clamp(2.2rem, 5vw, 3.6rem); font-weight:800; line-height:1.06; letter-spacing:-.02em; }
    .mm-hero h1 span { color:var(--color-accent); }
    .mm-hero__copy { max-width:540px; margin-top:16px; color:var(--color-foreground-muted); font-size:1.05rem; line-height:1.65; }
    .mm-hero__actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:26px; }
    .mm-hero__trust { display:flex; flex-wrap:wrap; gap:8px 18px; margin:26px 0 0; padding:0; list-style:none; color:var(--color-foreground); font-size:.88rem; font-weight:600; }
    .mm-hero__trust li { display:flex; align-items:center; gap:7px; }
    .mm-hero__trust svg { color:var(--color-success); }
    .mm-hero__media { position:relative; border-radius:var(--radius-lg); overflow:hidden; aspect-ratio:4 / 3; box-shadow:var(--shadow-card-hover); }
    .mm-hero__media img { display:block; width:100%; height:100%; object-fit:cover; }
    .mm-hero__tag { position:absolute; left:16px; bottom:16px; max-width:260px; border-radius:var(--radius-md); background:rgba(255,255,255,.95); padding:12px 14px; font-size:.84rem; line-height:1.4; box-shadow:var(--shadow-card); }
    .mm-hero__tag strong { display:block; color:var(--color-value); font-family:var(--font-heading); font-size:1rem; }

    .mm-cats { display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:12px; }
    .mm-cat { display:flex; flex-direction:column; border:1px solid var(--color-border); border-radius:var(--radius-lg); background:#fff; overflow:hidden; color:inherit; text-decoration:none; transition:box-shadow var(--duration-normal) var(--ease-fluid), border-color var(--duration-normal) var(--ease-fluid); }
    .mm-cat:hover { border-color:var(--color-accent); box-shadow:var(--shadow-card-hover); }
    .mm-cat__media { aspect-ratio:4 / 3; overflow:hidden; background:var(--color-surface); }
    .mm-cat__media img { display:block; width:100%; height:100%; object-fit:cover; transition:transform var(--duration-slow) var(--ease-fluid); }
    .mm-cat:hover .mm-cat__media img { transform:scale(1.05); }
    .mm-cat__body { padding:12px 14px 14px; }
    .mm-cat__body h3 { font-size:1rem; font-weight:700; line-height:1.25; }
    .mm-cat__body p { display:none; margin-top:4px; color:var(--color-foreground-muted); font-size:.84rem; line-height:1.45; }
    .mm-cat__body span { display:inline-block; margin-top:6px; color:var(--color-accent); font-size:.84rem; font-weight:700; }

    .mm-grid { display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:12px; }
    .mm-card { display:flex; flex-direction:column; border:1px solid var(--color-border); border-radius:var(--radius-lg); background:#fff; overflow:hidden; transition:box-shadow var(--duration-normal) var(--ease-fluid); }
    .mm-card:hover { box-shadow:var(--shadow-card-hover); }
    .mm-card__media { position:relative; display:block; aspect-ratio:1 / 1; overflow:hidden; background:var(--color-surface); }
    .mm-card__media img { display:block; width:100%; height:100%; object-fit:cover; transition:transform var(--duration-slow) var(--ease-fluid); }
    .mm-card:hover .mm-card__media img { transform:scale(1.04); }
    .mm-card__badge { position:absolute; left:10px; top:10px; border-radius:var(--radius-pill); background:var(--color-value); color:#fff; padding:4px 10px; font-size:.72rem; font-weight:800; letter-spacing:.03em; text-transform:uppercase; }
    .mm-card__body { display:flex; flex:1; flex-direction:column; gap:6px; padding:12px; }
    .mm-card__cat { color:var(--color-muted); font-size:.72rem; font-weight:600; letter-spacing:.04em; text-transform:uppercase; }
    .mm-card__title { font-family:var(--font-sans); font-size:.9rem; font-weight:600; line-height:1.35; }
    .mm-card__title a { display:-webkit-box; -webkit-box-orient:vertical; -webkit-line-clamp:2; overflow:hidden; color:var(--color-foreground); text-decoration:none; }
    .mm-card__title a:hover { color:var(--color-accent); }
    .mm-card__rating { display:flex; align-items:center; gap:6px; font-size:.78rem; }
    .mm-card__rating em { color:var(--color-muted); font-style:normal; }
    .mm-stars { position:relative; display:inline-block; font-size:.9rem; line-height:1; letter-spacing:1px; color:var(--color-border); }
    .mm-stars::before { content:"★★★★★"; }
    .mm-stars::after { content:"★★★★★"; position:absolute; left:0; top:0; width:var(--mm-rating); overflow:hidden; color:var(--color-star); white-space:nowrap; }
    .mm-card__price { margin-top:auto; color:var(--color-foreground); font-size:1.08rem; font-weight:800; }
    .mm-card__price del { color:var(--color-muted); font-size:.85rem; font-weight:500; }
    .mm-card__price ins { color:var(--color-value); text-decoration:none; }
    .mm-card__cta { display:flex; align-items:center; justify-content:center; min-height:44px; margin-top:6px; border-radius:var(--radius-pill); background:var(--color-value); color:#fff; font-size:.88rem; font-weight:700; text-decoration:none; transition:background var(--duration-fast) var(--ease-fluid); }
    .mm-card__cta:hover { background:var(--color-value-hover); color:#fff; }
    .mm-card__cta.added { background:var(--color-success); }
    .mm-home .added_to_cart { display:block; margin-top:6px; color:var(--color-accent); font-size:.84rem; font-weight:700; text-align:center; }
    .mm-empty { grid-column:1 / -1; border:1px dashed var(--color-border); border-radius:var(--radius-lg); padding:32px; color:var(--color-foreground-muted); text-align:center; }

    .mm-promos { display:grid; gap:16px; }
    .mm-promo { position:relative; display:flex; align-items:flex-end; min-height:320px; border-radius:var(--radius-lg); overflow:hidden; color:#fff; text-decoration:none; }
    .mm-promo img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition:transform var(--duration-slow) var(--ease-fluid); }
    .mm-promo:hover img { transform:scale(1.04); }
    .mm-promo::after { content:""; position:absolute; inset:0; background:linear-gradient(180deg, rgba(19,52,59,0) 25%, rgba(19,52,59,.86) 100%); }
    .mm-promo__body { position:relative; z-index:1; max-width:440px; padding:24px; }
    .mm-promo__body .mm-eyebrow { color:#FFD3B0; }
    .mm-promo__body h3 { color:#fff; font-size:clamp(1.35rem, 2.4vw, 1.75rem); font-weight:800; line-height:1.2; }
    .mm-promo__body p { margin:8px 0 16px; color:rgba(255,255,255,.88); font-size:.95rem; line-height:1.55; }

    .mm-chips { display:flex; flex-wrap:wrap; gap:10px; margin:0; padding:0; list-style:none; }
    .mm-chips a { display:inline-flex; align-items:center; min-height:44px; border:1px solid var(--color-border); border-radius:var(--radius-pill); background:#fff; padding:0 18px; color:var(--color-foreground); font-size:.9rem; font-weight:600; text-decoration:none; transition:border-color var(--duration-fast) var(--ease-fluid), color var(--duration-fast) var(--ease-fluid); }
    .mm-chips a:hover { border-color:var(--color-accent); color:var(--color-accent); }

    .mm-values { display:grid; gap:14px; }
    .mm-value { border-radius:var(--radius-lg); background:#fff; border:1px solid var(--color-border); padding:22px; }
    .mm-value svg { width:44px; height:44px; padding:10px; border-radius:var(--radius-pill); background:var(--color-accent-soft); color:var(--color-accent); }
    .mm-value h3 { margin-top:14px; font-size:1.05rem; font-weight:700; }
    .mm-value p { margin-top:6px; color:var(--color-foreground-muted); font-size:.9rem; line-height:1.6; }

    .mm-help { display:grid; gap:22px; align-items:center; border-radius:var(--radius-lg); background:var(--color-accent); color:#fff; padding:28px; }
    .mm-help h2 { color:#fff; font-size:clamp(1.4rem, 2.4vw, 1.9rem); font-weight:800; line-height:1.2; }
    .mm-help p { margin-top:8px; color:rgba(255,255,255,.88); line-height:1.6; }
    .mm-help__links { display:flex; flex-wrap:wrap; gap:10px; }

    @media (min-width: 640px) {
        .mm-cats { grid-template-columns:repeat(3, minmax(0, 1fr)); gap:16px; }
        .mm-cat__body p { display:block; }
        .mm-grid { grid-template-columns:repeat(3, minmax(0, 1fr)); gap:16px; }
        .mm-values { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 1024px) {
        .mm-section { padding:64px 0; }
        .mm-hero__grid { grid-template-columns:1fr 1.1fr; gap:56px; padding:48px 0 64px; }
        .mm-grid { grid-template-columns:repeat(4, minmax(0, 1fr)); gap:20px; }
        .mm-promos { grid-template-columns:repeat(2, minmax(0, 1fr)); gap:20px; }
        .mm-promo { min-height:380px; }
        .mm-values { grid-template-columns:repeat(4, minmax(0, 1fr)); }
        .mm-help { grid-template-columns:1.3fr 1fr; padding:40px 48px; }
        .mm-help__links { justify-content:flex-end; }
    }
</style>

<div class="mm-home">
    <section class="mm-hero" aria-labelledby="mm-hero-title">
        <div class="mm-container mm-hero__grid">
            <div>
                <p class="mm-eyebrow"><?php esc_html_e('Free U.S. shipping on every order', 'dawp'); ?></p>
                <h1 id="mm-hero-title"><?php esc_html_e('Furnish every room', 'dawp'); ?> <span><?php esc_html_e('for less.', 'dawp'); ?></span></h1>
                <p class="mm-hero__copy"><?php esc_html_e('Medial Market is your budget-friendly market for furniture, kitchen, outdoor, decor, kids and pet essentials. Practical pieces, fair prices and real people ready to help.', 'dawp'); ?></p>
                <div class="mm-hero__actions">
                    <a class="mm-btn mm-btn--value" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All Products', 'dawp'); ?></a>
                    <a class="mm-btn mm-btn--ghost" href="#mm-categories"><?php esc_html_e('Browse Categories', 'dawp'); ?></a>
                </div>
                <ul class="mm-hero__trust">
                    <?php foreach ([__('Free standard shipping', 'dawp'), __('30-day returns', 'dawp'), __('Secure checkout', 'dawp')] as $trust) : ?>
                        <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 5 5L20 7"></path></svg><?php echo esc_html($trust); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="mm-hero__media">
                <?php echo $mm_img('Living_Room.jpeg', __('Bright living room with a gray sofa, media console and floor lamp', 'dawp'), '', 1376, 768, 'eager', '(max-width: 1023px) 100vw, 52vw', 'high'); ?>
                <p class="mm-hero__tag"><strong><?php esc_html_e('6 departments, 1 checkout', 'dawp'); ?></strong><?php esc_html_e('Living room to backyard, nursery to pet corner.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section id="mm-categories" class="mm-section" aria-labelledby="mm-cat-title">
        <div class="mm-container">
            <div class="mm-head">
                <div>
                    <p class="mm-eyebrow"><?php esc_html_e('Shop by category', 'dawp'); ?></p>
                    <h2 id="mm-cat-title"><?php esc_html_e('Everything your home needs, in one place', 'dawp'); ?></h2>
                </div>
                <a class="mm-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all products →', 'dawp'); ?></a>
            </div>
            <div class="mm-cats">
                <?php foreach ($categories as $slug => $category) : ?>
                    <a class="mm-cat" href="<?php echo esc_url(dawp_product_category_url($slug)); ?>">
                        <span class="mm-cat__media"><?php echo $mm_img($category['image'], $category['name'], '', 560, 420, 'lazy', '(max-width: 639px) 46vw, 31vw'); ?></span>
                        <div class="mm-cat__body">
                            <h3><?php echo esc_html($category['name']); ?></h3>
                            <p><?php echo esc_html($category['short']); ?></p>
                            <span><?php esc_html_e('Shop now →', 'dawp'); ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mm-section mm-section--soft" aria-labelledby="mm-best-title">
        <div class="mm-container">
            <div class="mm-head">
                <div>
                    <p class="mm-eyebrow"><?php esc_html_e('Best sellers', 'dawp'); ?></p>
                    <h2 id="mm-best-title"><?php esc_html_e('What shoppers are bringing home', 'dawp'); ?></h2>
                </div>
                <a class="mm-link" href="<?php echo esc_url(add_query_arg('orderby', 'popularity', $shop_url)); ?>"><?php esc_html_e('See all best sellers →', 'dawp'); ?></a>
            </div>
            <div class="mm-grid">
                <?php if (!empty($best_sellers)) : ?>
                    <?php foreach ($best_sellers as $product_id) { $mm_product_card($product_id); } ?>
                <?php else : ?>
                    <p class="mm-empty"><?php esc_html_e('New products are being added. Check back soon.', 'dawp'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="mm-section" aria-label="<?php esc_attr_e('Featured departments', 'dawp'); ?>">
        <div class="mm-container mm-promos">
            <?php foreach ($promos as $promo) : ?>
                <a class="mm-promo" href="<?php echo esc_url($promo['url']); ?>">
                    <?php echo $mm_img($promo['image'], $promo['title'], '', 1376, 768, 'lazy', '(max-width: 1023px) 100vw, 50vw'); ?>
                    <div class="mm-promo__body">
                        <p class="mm-eyebrow"><?php echo esc_html($promo['eyebrow']); ?></p>
                        <h3><?php echo esc_html($promo['title']); ?></h3>
                        <p><?php echo esc_html($promo['copy']); ?></p>
                        <span class="mm-btn mm-btn--light"><?php echo esc_html($promo['cta']); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mm-section mm-section--soft" aria-labelledby="mm-new-title">
        <div class="mm-container">
            <div class="mm-head">
                <div>
                    <p class="mm-eyebrow"><?php esc_html_e('New arrivals', 'dawp'); ?></p>
                    <h2 id="mm-new-title"><?php esc_html_e('Just landed at Medial Market', 'dawp'); ?></h2>
                </div>
                <a class="mm-link" href="<?php echo esc_url(add_query_arg('orderby', 'date', $shop_url)); ?>"><?php esc_html_e('Shop new arrivals →', 'dawp'); ?></a>
            </div>
            <div class="mm-grid">
                <?php if (!empty($new_arrivals)) : ?>
                    <?php foreach ($new_arrivals as $product_id) { $mm_product_card($product_id); } ?>
                <?php else : ?>
                    <p class="mm-empty"><?php esc_html_e('New products are being added. Check back soon.', 'dawp'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="mm-section" aria-labelledby="mm-popular-title">
        <div class="mm-container">
            <div class="mm-head">
                <div>
                    <p class="mm-eyebrow"><?php esc_html_e('Popular searches', 'dawp'); ?></p>
                    <h2 id="mm-popular-title"><?php esc_html_e('Know what you need? Jump right in', 'dawp'); ?></h2>
                </div>
            </div>
            <ul class="mm-chips">
                <?php foreach ($popular_searches as $term) : ?>
                    <li><a href="<?php echo esc_url($mm_search_url($term)); ?>"><?php echo esc_html($term); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="mm-section mm-section--warm" aria-labelledby="mm-why-title">
        <div class="mm-container">
            <div class="mm-head">
                <div>
                    <p class="mm-eyebrow"><?php esc_html_e('Why Medial Market', 'dawp'); ?></p>
                    <h2 id="mm-why-title"><?php esc_html_e('Budget-friendly should still feel good', 'dawp'); ?></h2>
                    <p><?php esc_html_e('We keep the catalog focused on home and family essentials, price them fairly and make the policies easy to read before you buy.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="mm-values">
                <?php foreach ($values as $value) : ?>
                    <div class="mm-value">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $value['icon']; ?></svg>
                        <h3><?php echo esc_html($value['title']); ?></h3>
                        <p><?php echo esc_html($value['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mm-section" aria-labelledby="mm-help-title">
        <div class="mm-container">
            <div class="mm-help">
                <div>
                    <h2 id="mm-help-title"><?php esc_html_e('Questions before you order?', 'dawp'); ?></h2>
                    <p><?php echo esc_html(sprintf(__('Email %s for help with sizing, assembly, delivery or an existing order. We reply within 1 business day.', 'dawp'), dawp_store('email'))); ?></p>
                </div>
                <div class="mm-help__links">
                    <a class="mm-btn mm-btn--light" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a class="mm-btn mm-btn--light" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track an Order', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>
