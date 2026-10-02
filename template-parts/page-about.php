<?php
/**
 * Medial Market about page template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri     = get_template_directory_uri();
$theme_dir     = get_template_directory();
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url   = home_url('/contact-us/');
$store_name    = dawp_store('name');
$support_email = dawp_store('email');
$support_phone = dawp_store('phone');
$store_address = dawp_store('address');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$mm_about_img = static function ($file, $alt, $width = 900, $height = 700, $loading = 'lazy', $sizes = '', $priority = '') use ($theme_uri, $theme_dir) {
    $url = $theme_uri . '/assets/img/home/' . $file;
    foreach (['assets/img/home/', 'assets/img/gallery/'] as $dir) {
        if (file_exists($theme_dir . '/' . $dir . $file)) {
            $url = add_query_arg('ver', filemtime($theme_dir . '/' . $dir . $file), $theme_uri . '/' . $dir . $file);
            break;
        }
    }

    return dawp_get_responsive_image($url, $alt, '', $width, $height, $loading, $sizes, $priority);
};

$categories = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [];

$principles = [
    [
        'title' => __('Focused on the home', 'dawp'),
        'copy'  => __('We stay in one lane: furniture, kitchen, outdoor, decor, kids and pet essentials. A focused catalog makes it easier to compare options and find the right fit.', 'dawp'),
    ],
    [
        'title' => __('Fair, visible pricing', 'dawp'),
        'copy'  => __('Prices are shown on every product card and product page. Standard U.S. shipping is free, and any optional upgrade is shown at checkout before you pay.', 'dawp'),
    ],
    [
        'title' => __('Clear product details', 'dawp'),
        'copy'  => __('Product pages list dimensions, materials, color options and what is included, so you know what is arriving before you order.', 'dawp'),
    ],
    [
        'title' => __('Policies in plain English', 'dawp'),
        'copy'  => __('Shipping times, the 30-day return window and refund timing are written out clearly and linked from every page of the store.', 'dawp'),
    ],
];

$facts = [
    ['label' => __('Shipping', 'dawp'), 'value' => __('Free standard shipping on U.S. orders, usually 4-7 business days', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['label' => __('Returns', 'dawp'), 'value' => __('30 days from delivery for unused items in original packaging', 'dawp'), 'url' => home_url('/return-refund-policy/')],
    ['label' => __('Payments', 'dawp'), 'value' => __('Visa, Mastercard, American Express and PayPal via secure checkout', 'dawp'), 'url' => home_url('/terms-conditions/')],
    ['label' => __('Support', 'dawp'), 'value' => __('Email replies within 1 business day, Monday to Friday', 'dawp'), 'url' => $contact_url],
];
?>

<style>
    .mm-about { color:var(--color-foreground); font-family:var(--font-sans); }
    .mm-about *, .mm-about *::before, .mm-about *::after { box-sizing:border-box; }
    .mm-about h1, .mm-about h2, .mm-about h3 { margin:0; color:var(--color-foreground); font-family:var(--font-heading); letter-spacing:-.01em; }
    .mm-about p { margin:0; }
    .mm-about__wrap { width:min(100% - 32px, 1280px); margin-inline:auto; }
    .mm-about__eyebrow { margin-bottom:12px; color:var(--color-accent); font-size:.78rem; font-weight:700; letter-spacing:.08em; text-transform:uppercase; }
    .mm-about__section { padding:48px 0; }
    .mm-about__section--soft { background:var(--color-surface); }
    .mm-about__btn { display:inline-flex; align-items:center; justify-content:center; min-height:48px; border:2px solid transparent; border-radius:var(--radius-pill); padding:0 26px; font-size:.95rem; font-weight:700; text-decoration:none; transition:background var(--duration-fast) var(--ease-fluid), color var(--duration-fast) var(--ease-fluid); }
    .mm-about__btn--value { background:var(--color-value); color:#fff; }
    .mm-about__btn--value:hover { background:var(--color-value-hover); color:#fff; }
    .mm-about__btn--ghost { border-color:var(--color-foreground); color:var(--color-foreground); }
    .mm-about__btn--ghost:hover { background:var(--color-foreground); color:#fff; }
    .mm-about__hero { background:linear-gradient(180deg, var(--color-surface) 0%, #fff 100%); }
    .mm-about__hero-grid { display:grid; gap:28px; align-items:center; padding:32px 0 48px; }
    .mm-about__hero h1 { font-size:clamp(2rem, 4.4vw, 3.2rem); font-weight:800; line-height:1.1; }
    .mm-about__lead { max-width:560px; margin-top:16px; color:var(--color-foreground-muted); font-size:1.05rem; line-height:1.7; }
    .mm-about__actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:26px; }
    .mm-about__media { border-radius:var(--radius-lg); overflow:hidden; aspect-ratio:4 / 3; box-shadow:var(--shadow-card-hover); }
    .mm-about__media img { display:block; width:100%; height:100%; object-fit:cover; }
    .mm-about__story { display:grid; gap:28px; align-items:center; }
    .mm-about__story h2, .mm-about__head h2 { font-size:clamp(1.5rem, 2.6vw, 2.1rem); font-weight:800; line-height:1.2; }
    .mm-about__story p:not(.mm-about__eyebrow) { margin-top:14px; color:var(--color-foreground-muted); line-height:1.75; }
    .mm-about__head { max-width:720px; margin-bottom:24px; }
    .mm-about__head p:not(.mm-about__eyebrow) { margin-top:10px; color:var(--color-foreground-muted); line-height:1.65; }
    .mm-about__cats { display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:12px; }
    .mm-about__cat { display:block; border:1px solid var(--color-border); border-radius:var(--radius-lg); background:#fff; padding:18px; color:inherit; text-decoration:none; transition:border-color var(--duration-fast) var(--ease-fluid), box-shadow var(--duration-fast) var(--ease-fluid); }
    .mm-about__cat:hover { border-color:var(--color-accent); box-shadow:var(--shadow-card); }
    .mm-about__cat h3 { font-size:1rem; font-weight:700; }
    .mm-about__cat p { margin-top:6px; color:var(--color-foreground-muted); font-size:.88rem; line-height:1.5; }
    .mm-about__cards { display:grid; gap:14px; }
    .mm-about__card { border:1px solid var(--color-border); border-radius:var(--radius-lg); background:#fff; padding:22px; }
    .mm-about__card h3 { font-size:1.05rem; font-weight:700; }
    .mm-about__card p { margin-top:8px; color:var(--color-foreground-muted); font-size:.92rem; line-height:1.65; }
    .mm-about__facts { display:grid; gap:12px; margin:0; }
    .mm-about__fact { display:block; border-left:4px solid var(--color-accent); border-radius:var(--radius-sm); background:#fff; padding:16px 18px; color:inherit; text-decoration:none; }
    .mm-about__fact strong { display:block; color:var(--color-accent); font-size:.78rem; font-weight:700; letter-spacing:.06em; text-transform:uppercase; }
    .mm-about__fact span { display:block; margin-top:6px; font-weight:600; line-height:1.5; }
    .mm-about__info { border-radius:var(--radius-lg); background:var(--color-foreground); color:rgba(255,255,255,.85); padding:28px; }
    .mm-about__info h2 { color:#fff; font-size:1.4rem; font-weight:800; }
    .mm-about__info dl { display:grid; gap:12px; margin:18px 0 0; }
    .mm-about__info dt { color:#fff; font-weight:700; }
    .mm-about__info dd { margin:2px 0 0; }
    .mm-about__info a { color:#FFD3B0; }
    @media (min-width: 640px) {
        .mm-about__cats { grid-template-columns:repeat(3, minmax(0, 1fr)); }
        .mm-about__cards { grid-template-columns:repeat(2, minmax(0, 1fr)); }
        .mm-about__facts { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 1024px) {
        .mm-about__section { padding:64px 0; }
        .mm-about__hero-grid { grid-template-columns:1fr 1.05fr; gap:56px; padding:48px 0 64px; }
        .mm-about__story { grid-template-columns:1fr 1fr; gap:56px; }
        .mm-about__cards { grid-template-columns:repeat(4, minmax(0, 1fr)); }
        .mm-about__trust { display:grid; grid-template-columns:1.4fr 1fr; gap:32px; align-items:start; }
    }
</style>

<div class="mm-about">
    <section class="mm-about__hero" aria-labelledby="mm-about-title">
        <div class="mm-about__wrap mm-about__hero-grid">
            <div>
                <p class="mm-about__eyebrow"><?php esc_html_e('About Medial Market', 'dawp'); ?></p>
                <h1 id="mm-about-title"><?php esc_html_e('Your budget-friendly market for a well-furnished home.', 'dawp'); ?></h1>
                <p class="mm-about__lead"><?php esc_html_e('Medial Market is an online home and living store serving customers across the United States. We bring furniture, kitchen, outdoor, decor, kids and pet essentials together in one place, at prices that leave room in the budget.', 'dawp'); ?></p>
                <div class="mm-about__actions">
                    <a class="mm-about__btn mm-about__btn--value" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All Products', 'dawp'); ?></a>
                    <a class="mm-about__btn mm-about__btn--ghost" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                </div>
            </div>
            <div class="mm-about__media">
                <?php echo $mm_about_img('Living_Room.jpeg', __('Bright living room with a gray sofa, media console and floor lamp', 'dawp'), 1376, 768, 'eager', '(max-width: 1023px) 100vw, 50vw', 'high'); ?>
            </div>
        </div>
    </section>

    <section class="mm-about__section" aria-labelledby="mm-about-story-title">
        <div class="mm-about__wrap mm-about__story">
            <div class="mm-about__media">
                <?php echo $mm_about_img('Home_essentials_on_shelf_202607171221.jpeg', __('Wooden shelf with folded linens, a ceramic pitcher and a potted plant', 'dawp'), 1376, 768, 'lazy', '(max-width: 1023px) 100vw, 50vw'); ?>
            </div>
            <div>
                <p class="mm-about__eyebrow"><?php esc_html_e('Why we exist', 'dawp'); ?></p>
                <h2 id="mm-about-story-title"><?php esc_html_e('A comfortable home should not require a big budget.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Setting up a first apartment, refreshing a living room, making space for a new baby or getting the patio ready for summer usually means buying from several different stores. Medial Market brings those everyday home categories into one organized shop.', 'dawp'); ?></p>
                <p><?php esc_html_e('We focus on practical pieces with clear specifications and honest prices, ship them free within the U.S., and keep a team available by email to answer questions before and after you buy.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="mm-about__section mm-about__section--soft" aria-labelledby="mm-about-cats-title">
        <div class="mm-about__wrap">
            <div class="mm-about__head">
                <p class="mm-about__eyebrow"><?php esc_html_e('What we carry', 'dawp'); ?></p>
                <h2 id="mm-about-cats-title"><?php esc_html_e('Six departments for every corner of the home', 'dawp'); ?></h2>
            </div>
            <div class="mm-about__cats">
                <?php foreach ($categories as $slug => $category) : ?>
                    <a class="mm-about__cat" href="<?php echo esc_url(dawp_product_category_url($slug)); ?>">
                        <h3><?php echo esc_html($category['name']); ?></h3>
                        <p><?php echo esc_html($category['short']); ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mm-about__section" aria-labelledby="mm-about-principles-title">
        <div class="mm-about__wrap">
            <div class="mm-about__head">
                <p class="mm-about__eyebrow"><?php esc_html_e('How we work', 'dawp'); ?></p>
                <h2 id="mm-about-principles-title"><?php esc_html_e('What you can expect when you shop with us', 'dawp'); ?></h2>
            </div>
            <div class="mm-about__cards">
                <?php foreach ($principles as $principle) : ?>
                    <article class="mm-about__card">
                        <h3><?php echo esc_html($principle['title']); ?></h3>
                        <p><?php echo esc_html($principle['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mm-about__section mm-about__section--soft" aria-labelledby="mm-about-trust-title">
        <div class="mm-about__wrap mm-about__trust">
            <div>
                <div class="mm-about__head">
                    <p class="mm-about__eyebrow"><?php esc_html_e('Store policies at a glance', 'dawp'); ?></p>
                    <h2 id="mm-about-trust-title"><?php esc_html_e('Know the details before you order', 'dawp'); ?></h2>
                </div>
                <div class="mm-about__facts">
                    <?php foreach ($facts as $fact) : ?>
                        <a class="mm-about__fact" href="<?php echo esc_url($fact['url']); ?>">
                            <strong><?php echo esc_html($fact['label']); ?></strong>
                            <span><?php echo esc_html($fact['value']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <aside class="mm-about__info" aria-labelledby="mm-about-info-title">
                <h2 id="mm-about-info-title"><?php esc_html_e('Business information', 'dawp'); ?></h2>
                <dl>
                    <div><dt><?php esc_html_e('Store name', 'dawp'); ?></dt><dd><?php echo esc_html($store_name); ?></dd></div>
                    <div><dt><?php esc_html_e('Website', 'dawp'); ?></dt><dd><?php echo esc_html(dawp_store('domain')); ?></dd></div>
                    <div><dt><?php esc_html_e('Email', 'dawp'); ?></dt><dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd></div>
                    <?php if ($support_phone) : ?>
                        <div><dt><?php esc_html_e('Phone', 'dawp'); ?></dt><dd><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $support_phone)); ?>"><?php echo esc_html($support_phone); ?></a></dd></div>
                    <?php endif; ?>
                    <?php if ($store_address) : ?>
                        <div><dt><?php esc_html_e('Address', 'dawp'); ?></dt><dd><?php echo esc_html($store_address); ?></dd></div>
                    <?php endif; ?>
                    <div><dt><?php esc_html_e('Support hours', 'dawp'); ?></dt><dd><?php echo esc_html(dawp_store('hours')); ?></dd></div>
                </dl>
            </aside>
        </div>
    </section>
</div>
