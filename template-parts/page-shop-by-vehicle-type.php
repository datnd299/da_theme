<?php
/**
 * Template Part: page-shop-by-vehicle-type
 */

$rubyinstar_gallery_uri = get_theme_file_uri('/assets/img/gallery/Rubyinstar/');
$hero_image = $rubyinstar_gallery_uri . 'suv-trailer-tires.png';
$intro_image = $rubyinstar_gallery_uri . 'category-light-truck-tires.png';

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$category_url = static function ($slug) {
    return function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . sanitize_title($slug) . '/');
};

$vehicle_types = [
    'suv-crossover' => [
        'name' => __('SUV & Crossover', 'dawp'),
        'short' => __('SUV', 'dawp'),
        'summary' => __('Balanced tire choices for crossovers, family SUVs, and all-weather daily driving.', 'dawp'),
        'image' => $rubyinstar_gallery_uri . 'category-suv-crossover-tires.png',
        'primary_slug' => 'suv-crossover-tires',
        'primary_label' => __('Shop SUV Tires', 'dawp'),
        'keywords' => 'suv crossover cuv family utility road trip awd',
        'fits' => [__('SUVs', 'dawp'), __('Crossovers', 'dawp'), __('CUVs', 'dawp'), __('Family vehicles', 'dawp')],
        'recommendations' => [
            ['label' => __('SUV & Crossover Tires', 'dawp'), 'slug' => 'suv-crossover-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
            ['label' => __('Winter Tires', 'dawp'), 'slug' => 'winter-tires'],
        ],
    ],
    'pickup-light-truck' => [
        'name' => __('Pickup & Light Truck', 'dawp'),
        'short' => __('Truck', 'dawp'),
        'summary' => __('Durable tires for pickups, light trucks, work use, towing, and heavier everyday loads.', 'dawp'),
        'image' => $rubyinstar_gallery_uri . 'category-light-truck-tires.png',
        'primary_slug' => 'light-truck-tires',
        'primary_label' => __('Shop Truck Tires', 'dawp'),
        'keywords' => 'truck pickup light truck lt hauling work utility load towing',
        'fits' => [__('Pickups', 'dawp'), __('Light trucks', 'dawp'), __('Work vehicles', 'dawp'), __('Towing and hauling', 'dawp')],
        'recommendations' => [
            ['label' => __('Light Truck Tires', 'dawp'), 'slug' => 'light-truck-tires'],
            ['label' => __('SUV & Crossover Tires', 'dawp'), 'slug' => 'suv-crossover-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
        ],
    ],
    'performance-sport' => [
        'name' => __('Performance & Sport', 'dawp'),
        'short' => __('Sport', 'dawp'),
        'summary' => __('Responsive tire options for sport sedans, coupes, and drivers who want confident handling.', 'dawp'),
        'image' => $rubyinstar_gallery_uri . 'category-performance-tires.png',
        'primary_slug' => 'performance-tires',
        'primary_label' => __('Shop Performance Tires', 'dawp'),
        'keywords' => 'performance sport sporty handling coupe sedan high performance street',
        'fits' => [__('Sport sedans', 'dawp'), __('Performance coupes', 'dawp'), __('Street driving', 'dawp'), __('Responsive handling', 'dawp')],
        'recommendations' => [
            ['label' => __('Performance Tires', 'dawp'), 'slug' => 'performance-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
            ['label' => __('Winter Tires', 'dawp'), 'slug' => 'winter-tires'],
        ],
    ],
    'trailer-rv' => [
        'name' => __('Trailer & Towable', 'dawp'),
        'short' => __('Trailer', 'dawp'),
        'summary' => __('Trailer-specific tires for utility trailers, cargo trailers, campers, and towable equipment.', 'dawp'),
        'image' => $rubyinstar_gallery_uri . 'category-trailer-tires.png',
        'primary_slug' => 'trailer-tires',
        'primary_label' => __('Shop Trailer Tires', 'dawp'),
        'keywords' => 'trailer towable utility cargo rv towing st special trailer',
        'fits' => [__('Utility trailers', 'dawp'), __('Cargo trailers', 'dawp'), __('Campers', 'dawp'), __('Towable equipment', 'dawp')],
        'recommendations' => [
            ['label' => __('Trailer Tires', 'dawp'), 'slug' => 'trailer-tires'],
            ['label' => __('Light Truck Tires', 'dawp'), 'slug' => 'light-truck-tires'],
        ],
    ],
    'winter-ready' => [
        'name' => __('Winter & Cold-Weather', 'dawp'),
        'short' => __('Winter', 'dawp'),
        'summary' => __('Seasonal tire choices for drivers who regularly face cold temperatures, snow, or slush.', 'dawp'),
        'image' => $rubyinstar_gallery_uri . 'category-winter-tires.png',
        'primary_slug' => 'winter-tires',
        'primary_label' => __('Shop Winter Tires', 'dawp'),
        'keywords' => 'winter snow cold weather seasonal ice slush sedan suv truck',
        'fits' => [__('Cold weather', 'dawp'), __('Winter roads', 'dawp'), __('Seasonal tire sets', 'dawp'), __('Snow and slush', 'dawp')],
        'recommendations' => [
            ['label' => __('Winter Tires', 'dawp'), 'slug' => 'winter-tires'],
            ['label' => __('SUV & Crossover Tires', 'dawp'), 'slug' => 'suv-crossover-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
        ],
    ],
];

?>

<style>
    .vehicle-type-page {
        --vehicle-navy: #0B1F3A;
        --vehicle-navy-light: #12294f;
        --vehicle-orange: #F97316;
        --vehicle-orange-dark: #DB5F0B;
        --vehicle-white: #FFFFFF;
        --vehicle-gray: #F5F6F8;
        --vehicle-text: #111827;
        --vehicle-soft: #6B7280;
        --vehicle-border: #E5E7EB;
        background: var(--vehicle-white);
        color: var(--vehicle-text);
        font-family: Inter, system-ui, sans-serif;
        overflow: hidden;
    }

    .vehicle-type-page * {
        box-sizing: border-box;
    }

    .vehicle-type-page a {
        color: inherit;
        text-decoration: none;
    }

    .vehicle-container {
        width: min(100% - 40px, 1280px);
        margin: 0 auto;
    }

    .vehicle-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--vehicle-orange);
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.08em;
        margin: 0;
        text-transform: uppercase;
    }

    .vehicle-eyebrow::before {
        width: 18px;
        height: 2px;
        border-radius: 2px;
        background: var(--vehicle-orange);
        content: "";
    }

    .vehicle-btn {
        display: inline-flex;
        min-height: 48px;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 10px;
        padding: 0 26px;
        font-size: 15px;
        font-weight: 800;
        transition: background 0.16s ease, border-color 0.16s ease, box-shadow 0.16s ease, transform 0.16s ease;
        white-space: nowrap;
    }

    .vehicle-btn:hover {
        transform: translateY(-1px);
    }

    .vehicle-btn--primary {
        background: var(--vehicle-orange);
        box-shadow: 0 8px 20px -8px rgba(249, 115, 22, 0.55);
        color: #fff;
    }

    .vehicle-btn--primary:hover {
        background: var(--vehicle-orange-dark);
        color: #fff;
    }

    .vehicle-btn--ghost {
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        background: transparent;
        color: #fff;
    }

    .vehicle-btn--ghost:hover {
        border-color: #fff;
        color: #fff;
    }

    .vehicle-hero {
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(1100px 480px at 85% -10%, rgba(249, 115, 22, 0.16), transparent 60%),
            linear-gradient(180deg, var(--vehicle-navy) 0%, #0d2547 60%, #0f2a52 100%);
        color: #fff;
    }

    .vehicle-hero__inner {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        padding: 56px 0 48px;
    }

    .vehicle-hero h1 {
        max-width: 660px;
        margin: 16px 0 18px;
        color: #fff;
        font-family: "Plus Jakarta Sans", Inter, system-ui, sans-serif;
        font-size: clamp(32px, 5vw, 52px);
        font-weight: 800;
        letter-spacing: 0;
        line-height: 1.12;
        text-wrap: balance;
    }

    .vehicle-hero__copy > p:not(.vehicle-eyebrow) {
        max-width: 560px;
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 17px;
        line-height: 1.65;
    }

    .vehicle-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 28px;
    }

    .vehicle-visual {
        position: relative;
    }

    .vehicle-visual__photo {
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.5);
    }

    .vehicle-visual__photo img {
        width: 100%;
        height: 340px;
        object-fit: cover;
    }

    .vehicle-badge {
        position: absolute;
        bottom: -22px;
        left: -18px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 16px 30px -10px rgba(0, 0, 0, 0.35);
        color: var(--vehicle-navy);
        padding: 14px 18px;
    }

    .vehicle-badge__ring {
        display: flex;
        width: 42px;
        height: 42px;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--vehicle-gray);
    }

    .vehicle-badge strong {
        display: block;
        font-family: "Plus Jakarta Sans", Inter, system-ui, sans-serif;
        font-size: 15px;
    }

    .vehicle-badge span {
        color: var(--vehicle-soft);
        font-size: 12px;
    }

    .vehicle-tread-line {
        position: absolute;
        inset: auto 0 0;
        height: 10px;
        background-image: repeating-linear-gradient(100deg, rgba(255,255,255,.12) 0 10px, transparent 10px 22px);
        opacity: 0.5;
    }

    .vehicle-section {
        padding: 64px 0;
    }

    .vehicle-section--gray {
        background: var(--vehicle-gray);
    }

    .vehicle-section-head {
        max-width: 660px;
        margin: 0 auto 40px;
        text-align: center;
    }

    .vehicle-section-head--split {
        display: flex;
        max-width: none;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 34px;
        text-align: left;
    }

    .vehicle-section-head h2,
    .vehicle-support h2 {
        margin: 12px 0 0;
        color: var(--vehicle-navy);
        font-family: "Plus Jakarta Sans", Inter, system-ui, sans-serif;
        font-size: clamp(26px, 3.4vw, 36px);
        font-weight: 800;
        letter-spacing: 0;
        line-height: 1.15;
    }

    .vehicle-section-head p,
    .vehicle-support p {
        margin: 12px 0 0;
        color: var(--vehicle-soft);
        font-size: 15.5px;
        line-height: 1.6;
    }

    .vehicle-intro {
        display: grid;
        grid-template-columns: 1fr;
        gap: 28px;
        align-items: center;
    }

    .vehicle-intro img {
        width: 100%;
        aspect-ratio: 16 / 10;
        border-radius: 16px;
        object-fit: cover;
        box-shadow: 0 18px 34px -18px rgba(11,31,58,.25);
    }

    .vehicle-tool {
        border: 1px solid var(--vehicle-border);
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 24px 50px -28px rgba(11,31,58,.35);
        padding: 22px;
    }

    .vehicle-tool__top {
        display: grid;
        gap: 18px;
        margin-bottom: 18px;
    }

    .vehicle-search input {
        width: 100%;
        min-height: 46px;
        border: 1.5px solid var(--vehicle-border);
        border-radius: 9px;
        background: #fff;
        color: var(--vehicle-text);
        font: inherit;
        padding: 0 14px;
        outline: none;
    }

    .vehicle-search input:focus {
        border-color: var(--vehicle-orange);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
    }

    .vehicle-type-page .tz-content {
        display: grid;
        gap: 22px;
        border: 0;
        border-radius: 0;
        background: transparent;
        box-shadow: none;
    }

    .vehicle-type-page .tz-panel {
        display: block;
        padding: 0;
    }

    .vehicle-panel__layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        align-items: stretch;
    }

    .vehicle-panel__layout > img {
        width: 100%;
        aspect-ratio: 4 / 3;
        border-radius: 14px;
        object-fit: cover;
    }

    .vehicle-panel .tz-panel__top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 18px;
    }

    .vehicle-panel .tz-panel__top h3 {
        margin: 0;
        color: var(--vehicle-navy);
        font-family: "Plus Jakarta Sans", Inter, system-ui, sans-serif;
        font-size: 24px;
        font-weight: 800;
        line-height: 1.15;
    }

    .vehicle-panel .tz-panel__top p {
        margin: 8px 0 0;
        color: var(--vehicle-soft);
        font-size: 14.5px;
        line-height: 1.6;
    }

    .vehicle-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }

    .vehicle-tags span {
        border-radius: 6px;
        background: var(--vehicle-gray);
        color: var(--vehicle-soft);
        font-size: 12.5px;
        font-weight: 700;
        padding: 5px 9px;
    }

    .vehicle-category-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .vehicle-primary-card,
    .vehicle-type-page .tz-item {
        border: 1px solid var(--vehicle-border);
        border-radius: 10px;
        background: #fff;
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease, background 0.18s ease, color 0.18s ease;
    }

    .vehicle-primary-card {
        display: grid;
        gap: 7px;
        min-height: 116px;
        align-content: center;
        background: var(--vehicle-navy);
        color: #fff;
        padding: 22px;
    }

    .vehicle-primary-card strong {
        color: #fff;
        font-family: "Plus Jakarta Sans", Inter, system-ui, sans-serif;
        font-size: 21px;
        font-weight: 800;
    }

    .vehicle-primary-card span {
        color: rgba(255, 255, 255, 0.76);
        font-size: 14px;
        line-height: 1.55;
    }

    .vehicle-type-page .tz-item {
        display: flex;
        min-height: 54px;
        align-items: center;
        justify-content: center;
        color: var(--vehicle-navy);
        font-size: 14px;
        font-weight: 800;
        padding: 12px;
        text-align: center;
    }

    .vehicle-primary-card:hover,
    .vehicle-type-page .tz-item:hover {
        transform: translateY(-3px);
        border-color: transparent;
        box-shadow: 0 18px 34px -18px rgba(11,31,58,.25);
    }

    .vehicle-primary-card:hover {
        background: var(--vehicle-navy-light);
    }

    .vehicle-type-page .tz-item:hover {
        color: var(--vehicle-orange);
    }

    .vehicle-no-results {
        margin: 18px 0 0;
        border: 1px solid #fed7aa;
        border-radius: 10px;
        background: #fff7ed;
        color: #9a3412;
        font-weight: 800;
        padding: 16px 18px;
    }

    .vehicle-support {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        border-radius: 24px;
        background: linear-gradient(120deg, var(--vehicle-navy) 0%, #163a6b 100%);
        color: #fff;
        padding: 44px 32px;
        position: relative;
        overflow: hidden;
    }

    .vehicle-support::before {
        position: absolute;
        right: -60px;
        top: -60px;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(249,115,22,.35), transparent 70%);
        content: "";
    }

    .vehicle-support > * {
        position: relative;
    }

    .vehicle-support h2 {
        color: #fff;
        margin-top: 0;
    }

    .vehicle-support p {
        max-width: 680px;
        color: rgba(255,255,255,.84);
    }

    @media (min-width: 768px) {
        .vehicle-container {
            width: min(100% - 64px, 1280px);
        }

        .vehicle-intro {
            grid-template-columns: 0.9fr 1.1fr;
        }

        .vehicle-tool__top {
            grid-template-columns: minmax(0, 1fr) 340px;
            align-items: end;
        }

        .vehicle-category-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .vehicle-primary-card {
            grid-column: span 3;
        }
    }

    @media (min-width: 1024px) {
        .vehicle-hero__inner {
            grid-template-columns: 1.05fr 0.95fr;
            align-items: center;
            padding: 76px 0 64px;
        }

        .vehicle-panel__layout {
            grid-template-columns: minmax(260px, 0.42fr) minmax(0, 1fr);
        }
    }

    @media (max-width: 640px) {
        .vehicle-container {
            width: min(100% - 32px, 1280px);
        }

        .vehicle-section {
            padding: 48px 0;
        }

        .vehicle-tool {
            overflow: hidden;
            padding: 18px 0 18px 16px;
        }

        .vehicle-tool__top {
            padding-right: 16px;
        }

        .vehicle-type-page .tz-content {
            display: flex;
            gap: 16px;
            margin-right: -16px;
            overflow-x: auto;
            padding: 2px 16px 10px 0;
            scroll-padding-left: 0;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }

        .vehicle-type-page .tz-content::-webkit-scrollbar {
            display: none;
        }

        .vehicle-type-page .tz-panel {
            flex: 0 0 min(86%, 360px);
            scroll-snap-align: start;
        }

        .vehicle-type-page .tz-panel[hidden] {
            display: none;
        }

        .vehicle-panel__layout {
            height: 100%;
        }

        .vehicle-panel__layout > img {
            aspect-ratio: 16 / 10;
        }

        .vehicle-badge {
            display: none;
        }

        .vehicle-section-head--split,
        .vehicle-support {
            align-items: stretch;
            flex-direction: column;
        }

        .vehicle-actions,
        .vehicle-btn {
            width: 100%;
        }

        .vehicle-panel .tz-panel__top {
            flex-direction: column;
        }

        .vehicle-category-grid {
            gap: 10px;
        }

        .vehicle-primary-card {
            min-height: 108px;
            padding: 18px;
        }
    }
</style>

<div id="primary" class="vehicle-type-page">
    <section class="vehicle-hero">
        <div class="vehicle-container vehicle-hero__inner">
            <div class="vehicle-hero__copy">
                <p class="vehicle-eyebrow"><?php esc_html_e('Rubyinstar Vehicle Guide', 'dawp'); ?></p>
                <h1><?php esc_html_e('Shop By Vehicle Type', 'dawp'); ?></h1>
                <p><?php esc_html_e('Start with your vehicle style to quickly narrow the tire categories that match everyday driving, family travel, work use, towing, or seasonal conditions.', 'dawp'); ?></p>
                <div class="vehicle-actions">
                    <a href="#vehicle-type-tool" class="vehicle-btn vehicle-btn--primary"><?php esc_html_e('Browse Vehicle Types', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="vehicle-btn vehicle-btn--ghost"><?php esc_html_e('Shop All Tires', 'dawp'); ?></a>
                </div>
            </div>

            <div class="vehicle-visual">
                <div class="vehicle-visual__photo">
                    <img src="<?php echo esc_url($hero_image); ?>"
                         alt="<?php esc_attr_e('Rubyinstar tire shop cover for shopping by vehicle type', 'dawp'); ?>"
                         loading="eager"
                         fetchpriority="high">
                </div>
                <div class="vehicle-badge">
                    <span class="vehicle-badge__ring">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0B1F3A" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/></svg>
                    </span>
                    <div>
                        <strong><?php esc_html_e('Fit First', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Then verify tire size', 'dawp'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="vehicle-tread-line"></div>
    </section>

    <section class="vehicle-section vehicle-section--gray">
        <div class="vehicle-container vehicle-intro">
            <div class="vehicle-section-head vehicle-section-head--split">
                <div>
                    <p class="vehicle-eyebrow"><?php esc_html_e('Simple Shopping Flow', 'dawp'); ?></p>
                    <h2><?php esc_html_e('Choose the right category before comparing tire sizes.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Vehicle type is a helpful first step. Before ordering, always verify the exact sidewall size, load index, speed rating, and fitment details for your specific vehicle.', 'dawp'); ?></p>
                </div>
            </div>
            <img src="<?php echo esc_url($intro_image); ?>"
                 alt="<?php esc_attr_e('Light truck tire category used for Rubyinstar vehicle type shopping guidance', 'dawp'); ?>"
                 loading="lazy">
        </div>
    </section>

    <section id="vehicle-type-tool" class="vehicle-section" data-vehicle-tool>
        <div class="vehicle-container">
            <div class="vehicle-tool">
                <div class="vehicle-tool__top">
                    <div class="vehicle-section-head vehicle-section-head--split">
                        <div>
                            <p class="vehicle-eyebrow"><?php esc_html_e('Browse Tire Categories', 'dawp'); ?></p>
                            <h2><?php esc_html_e('Select a vehicle type', 'dawp'); ?></h2>
                        </div>
                    </div>
                    <label class="vehicle-search">
                        <span class="screen-reader-text"><?php esc_html_e('Search vehicle type', 'dawp'); ?></span>
                        <input type="search" data-vehicle-search placeholder="<?php esc_attr_e('Search SUV, truck, trailer...', 'dawp'); ?>">
                    </label>
                </div>

                <div class="tz-content">
                    <?php $is_first = true; ?>
                    <?php foreach ($vehicle_types as $key => $type) : ?>
                        <div class="tz-panel vehicle-panel<?php echo $is_first ? ' active' : ''; ?>"
                             id="panel-<?php echo esc_attr($key); ?>"
                             role="tabpanel"
                             data-vehicle-panel
                             data-keywords="<?php echo esc_attr(strtolower($type['name'] . ' ' . $type['summary'] . ' ' . $type['keywords'])); ?>">
                            <div class="vehicle-panel__layout">
                                <img src="<?php echo esc_url($type['image']); ?>"
                                     alt="<?php echo esc_attr($type['name']); ?>"
                                     loading="lazy">
                                <div>
                                    <div class="tz-panel__top">
                                        <div>
                                            <h3><?php echo esc_html($type['name']); ?></h3>
                                            <p><?php echo esc_html($type['summary']); ?></p>
                                        </div>
                                    </div>

                                    <div class="vehicle-tags" aria-label="<?php echo esc_attr(sprintf(__('Common uses for %s', 'dawp'), $type['name'])); ?>">
                                        <?php foreach ($type['fits'] as $fit) : ?>
                                            <span><?php echo esc_html($fit); ?></span>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="vehicle-category-grid">
                                        <a class="vehicle-primary-card"
                                           href="<?php echo esc_url($category_url($type['primary_slug'])); ?>">
                                            <strong><?php echo esc_html($type['primary_label']); ?></strong>
                                            <span><?php esc_html_e('View the most relevant tire category for this vehicle type.', 'dawp'); ?></span>
                                        </a>

                                        <?php foreach ($type['recommendations'] as $recommendation) : ?>
                                            <?php if ($recommendation['slug'] === $type['primary_slug']) : ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                            <a class="tz-item"
                                               href="<?php echo esc_url($category_url($recommendation['slug'])); ?>"
                                               data-vehicle-item="<?php echo esc_attr(strtolower($recommendation['label'] . ' ' . $type['name'] . ' ' . $type['keywords'])); ?>">
                                                <?php echo esc_html($recommendation['label']); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $is_first = false; ?>
                    <?php endforeach; ?>
                </div>

                <p class="vehicle-no-results" data-vehicle-empty hidden><?php esc_html_e('No matching vehicle type found. Try car, SUV, truck, trailer, performance, or winter.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="vehicle-section">
        <div class="vehicle-container">
            <div class="vehicle-support">
                <div>
                    <h2><?php esc_html_e('Need help choosing the right tire category?', 'dawp'); ?></h2>
                    <p><?php esc_html_e('If you are unsure which category fits your vehicle or driving needs, Rubyinstar support can help you compare options before you place an order.', 'dawp'); ?></p>
                </div>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="vehicle-btn vehicle-btn--primary"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>

<script>
(function() {
    const tool = document.querySelector('[data-vehicle-tool]');
    if (!tool) return;

    const panels = Array.from(tool.querySelectorAll('[data-vehicle-panel]'));
    const search = tool.querySelector('[data-vehicle-search]');
    const empty = tool.querySelector('[data-vehicle-empty]');

    if (search) {
        search.addEventListener('input', () => {
            const query = search.value.trim().toLowerCase().replace(/\s+/g, ' ');
            let matches = 0;

            if (!query) {
                panels.forEach(panel => {
                    panel.hidden = false;
                });
                if (empty) empty.hidden = true;
                return;
            }

            panels.forEach(panel => {
                const text = (panel.dataset.keywords || '').toLowerCase();
                const itemText = Array.from(panel.querySelectorAll('[data-vehicle-item]')).map(item => item.dataset.vehicleItem || '').join(' ');
                const hit = (text + ' ' + itemText).includes(query);
                panel.hidden = !hit;
                if (hit) matches++;
            });

            if (empty) empty.hidden = matches > 0;
        });
    }
})();
</script>
