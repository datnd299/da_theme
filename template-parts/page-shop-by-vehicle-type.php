<?php
/**
 * Template Part: page-shop-by-vehicle-type
 */

$tizezap_gallery_uri = get_theme_file_uri('/assets/img/gallery/Tizezap/');
$hero_image = $tizezap_gallery_uri . 'suv-trailer-tires.png';
$intro_image = $tizezap_gallery_uri . 'category-light-truck-tires.png';

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$category_url = static function ($slug) {
    return function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . sanitize_title($slug) . '/');
};

$vehicle_types = [
    'passenger-car' => [
        'name' => __('Passenger Car & Sedan', 'dawp'),
        'short' => __('Car', 'dawp'),
        'summary' => __('Daily commuters, compact cars, sedans, coupes, and practical road-use vehicles.', 'dawp'),
        'image' => $tizezap_gallery_uri . 'category-all-season-tires.png',
        'primary_slug' => 'all-season-tires',
        'primary_label' => __('Shop Car Tires', 'dawp'),
        'keywords' => 'car sedan coupe compact commuter passenger all-season touring daily',
        'fits' => [__('Sedan', 'dawp'), __('Coupe', 'dawp'), __('Compact', 'dawp'), __('Daily commuter', 'dawp')],
        'recommendations' => [
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
            ['label' => __('Performance Tires', 'dawp'), 'slug' => 'performance-tires'],
            ['label' => __('Winter Tires', 'dawp'), 'slug' => 'winter-tires'],
        ],
    ],
    'suv-crossover' => [
        'name' => __('SUV & Crossover', 'dawp'),
        'short' => __('SUV', 'dawp'),
        'summary' => __('Family SUVs, crossovers, CUVs, and everyday vehicles that need stable road manners.', 'dawp'),
        'image' => $tizezap_gallery_uri . 'category-suv-crossover-tires.png',
        'primary_slug' => 'suv-crossover-tires',
        'primary_label' => __('Shop SUV Tires', 'dawp'),
        'keywords' => 'suv crossover cuv family utility road trip awd',
        'fits' => [__('SUV', 'dawp'), __('Crossover', 'dawp'), __('CUV', 'dawp'), __('Family vehicle', 'dawp')],
        'recommendations' => [
            ['label' => __('SUV & Crossover Tires', 'dawp'), 'slug' => 'suv-crossover-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
            ['label' => __('Winter Tires', 'dawp'), 'slug' => 'winter-tires'],
        ],
    ],
    'pickup-light-truck' => [
        'name' => __('Pickup & Light Truck', 'dawp'),
        'short' => __('Truck', 'dawp'),
        'summary' => __('Pickup trucks, light-duty work vehicles, utility driving, hauling, and loaded road use.', 'dawp'),
        'image' => $tizezap_gallery_uri . 'category-light-truck-tires.png',
        'primary_slug' => 'light-truck-tires',
        'primary_label' => __('Shop Truck Tires', 'dawp'),
        'keywords' => 'truck pickup light truck lt hauling work utility load towing',
        'fits' => [__('Pickup', 'dawp'), __('Light truck', 'dawp'), __('Work vehicle', 'dawp'), __('Utility driving', 'dawp')],
        'recommendations' => [
            ['label' => __('Light Truck Tires', 'dawp'), 'slug' => 'light-truck-tires'],
            ['label' => __('SUV & Crossover Tires', 'dawp'), 'slug' => 'suv-crossover-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
        ],
    ],
    'performance-sport' => [
        'name' => __('Performance & Sport', 'dawp'),
        'short' => __('Sport', 'dawp'),
        'summary' => __('Sport sedans, performance coupes, and drivers prioritizing sharper road response.', 'dawp'),
        'image' => $tizezap_gallery_uri . 'category-performance-tires.png',
        'primary_slug' => 'performance-tires',
        'primary_label' => __('Shop Performance Tires', 'dawp'),
        'keywords' => 'performance sport sporty handling coupe sedan high performance street',
        'fits' => [__('Sport sedan', 'dawp'), __('Performance coupe', 'dawp'), __('Street performance', 'dawp'), __('Responsive handling', 'dawp')],
        'recommendations' => [
            ['label' => __('Performance Tires', 'dawp'), 'slug' => 'performance-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
            ['label' => __('Winter Tires', 'dawp'), 'slug' => 'winter-tires'],
        ],
    ],
    'trailer-rv' => [
        'name' => __('Trailer & Towable', 'dawp'),
        'short' => __('Trailer', 'dawp'),
        'summary' => __('Utility trailers, cargo trailers, towables, and trailer-specific replacement needs.', 'dawp'),
        'image' => $tizezap_gallery_uri . 'category-trailer-tires.png',
        'primary_slug' => 'trailer-tires',
        'primary_label' => __('Shop Trailer Tires', 'dawp'),
        'keywords' => 'trailer towable utility cargo rv towing st special trailer',
        'fits' => [__('Utility trailer', 'dawp'), __('Cargo trailer', 'dawp'), __('Towable', 'dawp'), __('Trailer use', 'dawp')],
        'recommendations' => [
            ['label' => __('Trailer Tires', 'dawp'), 'slug' => 'trailer-tires'],
            ['label' => __('Light Truck Tires', 'dawp'), 'slug' => 'light-truck-tires'],
        ],
    ],
    'winter-ready' => [
        'name' => __('Cold-Weather Vehicle', 'dawp'),
        'short' => __('Winter', 'dawp'),
        'summary' => __('Vehicles that regularly drive in cold temperatures, winter roads, or seasonal conditions.', 'dawp'),
        'image' => $tizezap_gallery_uri . 'category-winter-tires.png',
        'primary_slug' => 'winter-tires',
        'primary_label' => __('Shop Winter Tires', 'dawp'),
        'keywords' => 'winter snow cold weather seasonal ice slush sedan suv truck',
        'fits' => [__('Cold weather', 'dawp'), __('Winter roads', 'dawp'), __('Seasonal set', 'dawp'), __('Snow-ready driving', 'dawp')],
        'recommendations' => [
            ['label' => __('Winter Tires', 'dawp'), 'slug' => 'winter-tires'],
            ['label' => __('SUV & Crossover Tires', 'dawp'), 'slug' => 'suv-crossover-tires'],
            ['label' => __('All-Season Tires', 'dawp'), 'slug' => 'all-season-tires'],
        ],
    ],
];

$total_links = array_sum(array_map(static function ($type) {
    return count($type['recommendations']);
}, $vehicle_types));
$popular_types = ['suv-crossover', 'pickup-light-truck', 'passenger-car'];
?>

<div id="primary" class="rim-size-page vehicle-type-page">
    <section class="rim-hero">
        <img <?php echo dawp_responsive_image_attrs($hero_image, 1600, 900, '100vw', [768, 1200, 1600]); ?>
             alt="<?php esc_attr_e('Tizezap tire shop cover for shopping by vehicle type', 'dawp'); ?>"
             class="rim-hero__image"
             loading="eager"
             fetchpriority="high">
        <div class="rim-hero__overlay"></div>
        <div class="rim-hero__inner">
            <div class="rim-hero__copy">
                <p class="rim-eyebrow"><?php esc_html_e('Tizezap Vehicle Type Finder', 'dawp'); ?></p>
                <h1><?php esc_html_e('Shop By Vehicle Type', 'dawp'); ?></h1>
                <p><?php esc_html_e('Choose the vehicle group that best matches how the tire will be used, then open the most relevant Tizezap tire category.', 'dawp'); ?></p>
                <div class="rim-hero__actions">
                    <a href="#vehicle-type-tool" class="rim-button rim-button--primary"><?php esc_html_e('Find Vehicle Tires', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="rim-button rim-button--ghost"><?php esc_html_e('Shop All Tires', 'dawp'); ?></a>
                </div>
            </div>
            <div class="rim-hero__panel" aria-label="<?php esc_attr_e('Vehicle type shopping summary', 'dawp'); ?>">
                <span><?php echo esc_html(count($vehicle_types)); ?></span>
                <strong><?php esc_html_e('Vehicle groups', 'dawp'); ?></strong>
                <span><?php echo esc_html($total_links); ?></span>
                <strong><?php esc_html_e('Category paths', 'dawp'); ?></strong>
            </div>
        </div>
    </section>

    <section class="rim-intro">
        <div class="rim-intro__inner">
            <div>
                <p class="rim-eyebrow rim-eyebrow--blue"><?php esc_html_e('How to use it', 'dawp'); ?></p>
                <h2><?php esc_html_e('Start with the vehicle, then confirm the tire size.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Vehicle type helps narrow the category, but the final tire still needs to match the sidewall size, load index, speed rating, and manufacturer fitment requirements.', 'dawp'); ?></p>
            </div>
            <img <?php echo dawp_responsive_image_attrs($intro_image, 640, 480, '(max-width: 1023px) 100vw, 40vw', [360, 520, 640]); ?>
                 alt="<?php esc_attr_e('Light truck tire category used for Tizezap vehicle type shopping guidance', 'dawp'); ?>"
                 loading="lazy">
        </div>
    </section>

    <section id="vehicle-type-tool" class="rim-tool vehicle-tool" data-vehicle-tool>
        <div class="rim-tool__header">
            <div>
                <p class="rim-eyebrow rim-eyebrow--blue"><?php esc_html_e('Browse categories', 'dawp'); ?></p>
                <h2><?php esc_html_e('Select a vehicle type', 'dawp'); ?></h2>
            </div>
            <label class="rim-search">
                <span class="screen-reader-text"><?php esc_html_e('Search vehicle type', 'dawp'); ?></span>
                <input type="search" data-vehicle-search placeholder="<?php esc_attr_e('Search SUV, truck, trailer...', 'dawp'); ?>">
            </label>
        </div>

        <div class="tz-tabs-nav" role="tablist" aria-label="<?php esc_attr_e('Vehicle type tabs', 'dawp'); ?>">
            <?php $is_first = true; ?>
            <?php foreach ($vehicle_types as $key => $type) : ?>
                <button class="tz-tab-link<?php echo $is_first ? ' active' : ''; ?>"
                        type="button"
                        role="tab"
                        aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>"
                        aria-controls="panel-<?php echo esc_attr($key); ?>"
                        data-target="<?php echo esc_attr($key); ?>">
                    <span><?php echo esc_html($type['short']); ?></span>
                    <small><?php echo esc_html(count($type['recommendations'])); ?></small>
                </button>
                <?php $is_first = false; ?>
            <?php endforeach; ?>
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
                        <img <?php echo dawp_responsive_image_attrs($type['image'], 420, 315, '(max-width: 767px) 100vw, 420px', [300, 420, 560]); ?>
                             alt="<?php echo esc_attr($type['name']); ?>"
                             loading="lazy">
                        <div>
                            <div class="tz-panel__top">
                                <div>
                                    <h3><?php echo esc_html($type['name']); ?></h3>
                                    <p><?php echo esc_html($type['summary']); ?></p>
                                </div>
                                <?php if (in_array($key, $popular_types, true)) : ?>
                                    <span><?php esc_html_e('Popular', 'dawp'); ?></span>
                                <?php endif; ?>
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
                                    <span><?php esc_html_e('Open the best starting category for this vehicle type.', 'dawp'); ?></span>
                                </a>

                                <?php foreach ($type['recommendations'] as $recommendation) : ?>
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

        <p class="rim-no-results" data-vehicle-empty hidden><?php esc_html_e('No matching vehicle type found. Try SUV, truck, car, trailer, performance, or winter.', 'dawp'); ?></p>
    </section>

    <section class="rim-support">
        <div>
            <h2><?php esc_html_e('Vehicle type is only the first filter', 'dawp'); ?></h2>
            <p><?php esc_html_e('Before checkout, confirm the exact tire size, rim diameter, load index, speed rating, fitment notes, and quantity for your specific vehicle.', 'dawp'); ?></p>
        </div>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="rim-button rim-button--dark"><?php esc_html_e('Ask Tizezap Support', 'dawp'); ?></a>
    </section>
</div>

<script>
(function() {
    const tool = document.querySelector('[data-vehicle-tool]');
    if (!tool) return;

    const tabs = Array.from(tool.querySelectorAll('.tz-tab-link'));
    const panels = Array.from(tool.querySelectorAll('[data-vehicle-panel]'));
    const search = tool.querySelector('[data-vehicle-search]');
    const empty = tool.querySelector('[data-vehicle-empty]');

    function activate(target) {
        tabs.forEach(tab => {
            const active = tab.dataset.target === target;
            tab.classList.toggle('active', active);
            tab.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        panels.forEach(panel => panel.classList.toggle('active', panel.id === 'panel-' + target));
    }

    tabs.forEach(tab => tab.addEventListener('click', () => {
        if (search) search.value = '';
        panels.forEach(panel => panel.hidden = false);
        if (empty) empty.hidden = true;
        activate(tab.dataset.target);
    }));

    if (search) {
        search.addEventListener('input', () => {
            const query = search.value.trim().toLowerCase().replace(/\s+/g, ' ');
            let matches = 0;

            if (!query) {
                panels.forEach(panel => {
                    panel.hidden = false;
                    panel.classList.remove('active');
                });
                if (panels[0]) panels[0].classList.add('active');
                tabs.forEach((tab, index) => {
                    tab.classList.toggle('active', index === 0);
                    tab.setAttribute('aria-selected', index === 0 ? 'true' : 'false');
                });
                if (empty) empty.hidden = true;
                return;
            }

            panels.forEach(panel => {
                const text = (panel.dataset.keywords || '').toLowerCase();
                const itemText = Array.from(panel.querySelectorAll('[data-vehicle-item]')).map(item => item.dataset.vehicleItem || '').join(' ');
                const hit = (text + ' ' + itemText).includes(query);
                panel.hidden = !hit;
                panel.classList.toggle('active', hit);
                if (hit) matches++;
            });

            tabs.forEach(tab => {
                const panel = tool.querySelector('#panel-' + tab.dataset.target);
                const hasMatch = panel && !panel.hidden;
                tab.classList.toggle('active', !!hasMatch);
                tab.setAttribute('aria-selected', hasMatch ? 'true' : 'false');
            });

            if (empty) empty.hidden = matches > 0;
        });
    }
})();
</script>
