<?php
/**
 * Template Part: page-shop-by-brand
 */

$rubyinstar_gallery_uri = get_theme_file_uri('/assets/img/gallery/Rubyinstar/');
$hero_image = $rubyinstar_gallery_uri . 'tire-hero-road.png';
$tread_image = $rubyinstar_gallery_uri . 'all-season-tread.png';

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$brand_groups = [
    'Premium' => [
        [
            'name' => 'Michelin',
            'slug' => 'michelin',
            'copy' => __('Premium touring, all-season, SUV, and performance tire options.', 'dawp'),
            'tags' => [__('Touring', 'dawp'), __('SUV', 'dawp'), __('Performance', 'dawp')],
        ],
        [
            'name' => 'Bridgestone',
            'slug' => 'bridgestone',
            'copy' => __('Well-known tire brand for daily drivers, SUVs, trucks, and seasonal needs.', 'dawp'),
            'tags' => [__('All-season', 'dawp'), __('SUV', 'dawp'), __('Truck', 'dawp')],
        ],
        [
            'name' => 'Continental',
            'slug' => 'continental',
            'copy' => __('Road comfort, braking confidence, touring, and premium passenger tires.', 'dawp'),
            'tags' => [__('Comfort', 'dawp'), __('Touring', 'dawp'), __('Passenger', 'dawp')],
        ],
        [
            'name' => 'Pirelli',
            'slug' => 'pirelli',
            'copy' => __('Performance-focused tires for sporty handling and premium road feel.', 'dawp'),
            'tags' => [__('Performance', 'dawp'), __('Summer', 'dawp'), __('Touring', 'dawp')],
        ],
    ],
    'Popular Daily' => [
        [
            'name' => 'Goodyear',
            'slug' => 'goodyear',
            'copy' => __('Popular all-season, touring, SUV, and light truck tire choices.', 'dawp'),
            'tags' => [__('All-season', 'dawp'), __('SUV', 'dawp'), __('Light truck', 'dawp')],
        ],
        [
            'name' => 'Cooper',
            'slug' => 'cooper',
            'copy' => __('Common choice for passenger vehicles, SUVs, trucks, and everyday value.', 'dawp'),
            'tags' => [__('Value', 'dawp'), __('Truck', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Firestone',
            'slug' => 'firestone',
            'copy' => __('Everyday tire options for commuters, family vehicles, SUVs, and trucks.', 'dawp'),
            'tags' => [__('Commuter', 'dawp'), __('SUV', 'dawp'), __('All-season', 'dawp')],
        ],
        [
            'name' => 'Hankook',
            'slug' => 'hankook',
            'copy' => __('Passenger, SUV, performance, and light truck tires at broad price points.', 'dawp'),
            'tags' => [__('Passenger', 'dawp'), __('Performance', 'dawp'), __('SUV', 'dawp')],
        ],
    ],
    'SUV & Truck' => [
        [
            'name' => 'BFGoodrich',
            'slug' => 'bfgoodrich',
            'copy' => __('Known for all-terrain, truck, SUV, and off-road capable tire lines.', 'dawp'),
            'tags' => [__('All-terrain', 'dawp'), __('Truck', 'dawp'), __('Off-road', 'dawp')],
        ],
        [
            'name' => 'Falken',
            'slug' => 'falken',
            'copy' => __('All-season, performance, SUV, and all-terrain options for mixed use.', 'dawp'),
            'tags' => [__('All-terrain', 'dawp'), __('Performance', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Toyo',
            'slug' => 'toyo',
            'copy' => __('Truck, SUV, highway, all-terrain, and performance tire categories.', 'dawp'),
            'tags' => [__('Truck', 'dawp'), __('Highway', 'dawp'), __('All-terrain', 'dawp')],
        ],
        [
            'name' => 'Nitto',
            'slug' => 'nitto',
            'copy' => __('Truck, off-road, street performance, and enthusiast-focused tire options.', 'dawp'),
            'tags' => [__('Truck', 'dawp'), __('Off-road', 'dawp'), __('Performance', 'dawp')],
        ],
    ],
    'Value & Broad Choice' => [
        [
            'name' => 'Kumho',
            'slug' => 'kumho',
            'copy' => __('Broad tire selection for passenger cars, crossovers, SUVs, and daily use.', 'dawp'),
            'tags' => [__('Value', 'dawp'), __('Passenger', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Nexen',
            'slug' => 'nexen',
            'copy' => __('Budget-friendly and mid-range options across common tire categories.', 'dawp'),
            'tags' => [__('Value', 'dawp'), __('Touring', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Yokohama',
            'slug' => 'yokohama',
            'copy' => __('Touring, performance, SUV, and light truck options with wide availability.', 'dawp'),
            'tags' => [__('Touring', 'dawp'), __('Performance', 'dawp'), __('Truck', 'dawp')],
        ],
        [
            'name' => 'Douglas',
            'slug' => 'douglas',
            'copy' => __('Walmart-exclusive tire brand commonly used for practical replacement needs.', 'dawp'),
            'tags' => [__('Walmart exclusive', 'dawp'), __('Value', 'dawp'), __('Everyday', 'dawp')],
        ],
    ],
];

$brand_url = static function ($brand) use ($shop_url) {
    return add_query_arg([
        's' => $brand['name'],
        'post_type' => 'product',
    ], $shop_url);
};

$all_brands = [];
foreach ($brand_groups as $brands) {
    $all_brands = array_merge($all_brands, $brands);
}

$total_brands = count($all_brands);
$popular_brands = ['Michelin', 'Goodyear', 'Bridgestone', 'Cooper'];
?>

<div id="primary" class="rim-size-page brand-page">
    <section class="rim-hero">
        <img src="<?php echo esc_url($hero_image); ?>"
             alt="<?php esc_attr_e('Rubyinstar tire shop cover for shopping by tire brand', 'dawp'); ?>"
             class="rim-hero__image"
             loading="eager"
             fetchpriority="high">
        <div class="rim-hero__overlay"></div>
        <div class="rim-hero__inner">
            <div class="rim-hero__copy">
                <p class="rim-eyebrow"><?php esc_html_e('Rubyinstar Brand Finder', 'dawp'); ?></p>
                <h1><?php esc_html_e('Shop By Brand', 'dawp'); ?></h1>
                <p><?php esc_html_e('Choose a known tire brand first, then jump straight to matching products or brand terms available in the Rubyinstar catalog.', 'dawp'); ?></p>
                <div class="rim-hero__actions">
                    <a href="#brand-tool" class="rim-button rim-button--primary"><?php esc_html_e('Find Tire Brand', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="rim-button rim-button--ghost"><?php esc_html_e('Shop All Tires', 'dawp'); ?></a>
                </div>
            </div>
            <div class="rim-hero__panel" aria-label="<?php esc_attr_e('Brand shopping summary', 'dawp'); ?>">
                <span><?php echo esc_html(count($brand_groups)); ?></span>
                <strong><?php esc_html_e('Brand groups', 'dawp'); ?></strong>
                <span><?php echo esc_html($total_brands); ?></span>
                <strong><?php esc_html_e('Featured brands', 'dawp'); ?></strong>
            </div>
        </div>
    </section>

    <section class="rim-intro">
        <div class="rim-intro__inner">
            <div>
                <p class="rim-eyebrow rim-eyebrow--blue"><?php esc_html_e('Selected from Walmart', 'dawp'); ?></p>
                <h2><?php esc_html_e('Start with the brand shoppers already compare.', 'dawp'); ?></h2>
                <p><?php esc_html_e('This list focuses on well-known tire brands that Walmart currently surfaces in its tire brand shopping experience, with a mix of premium, everyday, truck, SUV, and value choices.', 'dawp'); ?></p>
            </div>
            <img src="<?php echo esc_url($tread_image); ?>"
                 alt="<?php esc_attr_e('Close-up tire tread used for Rubyinstar tire brand shopping guidance', 'dawp'); ?>"
                 loading="lazy">
        </div>
    </section>

    <section id="brand-tool" class="rim-tool brand-tool" data-brand-tool>
        <div class="rim-tool__header">
            <div>
                <p class="rim-eyebrow rim-eyebrow--blue"><?php esc_html_e('Browse brands', 'dawp'); ?></p>
                <h2><?php esc_html_e('Select a tire brand', 'dawp'); ?></h2>
            </div>
            <label class="rim-search">
                <span class="screen-reader-text"><?php esc_html_e('Search tire brand', 'dawp'); ?></span>
                <input type="search" data-brand-search placeholder="<?php esc_attr_e('Search Michelin, Goodyear...', 'dawp'); ?>">
            </label>
        </div>

        <div class="tz-tabs-nav" role="tablist" aria-label="<?php esc_attr_e('Tire brand tabs', 'dawp'); ?>">
            <?php $is_first = true; ?>
            <?php foreach ($brand_groups as $group => $brands) : ?>
                <button class="tz-tab-link<?php echo $is_first ? ' active' : ''; ?>"
                        type="button"
                        role="tab"
                        aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>"
                        aria-controls="panel-<?php echo esc_attr(sanitize_title($group)); ?>"
                        data-target="<?php echo esc_attr(sanitize_title($group)); ?>">
                    <span><?php echo esc_html($group); ?></span>
                    <small><?php echo esc_html(count($brands)); ?></small>
                </button>
                <?php $is_first = false; ?>
            <?php endforeach; ?>
        </div>

        <div class="tz-content">
            <?php $is_first = true; ?>
            <?php foreach ($brand_groups as $group => $brands) : ?>
                <?php $group_id = sanitize_title($group); ?>
                <div class="tz-panel<?php echo $is_first ? ' active' : ''; ?>" id="panel-<?php echo esc_attr($group_id); ?>" role="tabpanel">
                    <div class="tz-panel__top">
                        <div>
                            <h3><?php echo esc_html(sprintf(__('%s tire brands', 'dawp'), $group)); ?></h3>
                            <p><?php esc_html_e('Tap a brand to search matching Rubyinstar products by brand keyword.', 'dawp'); ?></p>
                        </div>
                        <?php if ('premium' === $group_id) : ?>
                            <span><?php esc_html_e('Top picks', 'dawp'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="brand-grid">
                        <?php foreach ($brands as $brand) : ?>
                            <a class="brand-card"
                               href="<?php echo esc_url($brand_url($brand)); ?>"
                               data-brand="<?php echo esc_attr(strtolower($brand['name'] . ' ' . implode(' ', $brand['tags']))); ?>">
                                <span class="brand-card__top">
                                    <strong><?php echo esc_html($brand['name']); ?></strong>
                                    <?php if (in_array($brand['name'], $popular_brands, true)) : ?>
                                        <em><?php esc_html_e('Popular', 'dawp'); ?></em>
                                    <?php endif; ?>
                                </span>
                                <span class="brand-card__copy"><?php echo esc_html($brand['copy']); ?></span>
                                <span class="brand-card__tags">
                                    <?php foreach ($brand['tags'] as $tag) : ?>
                                        <small><?php echo esc_html($tag); ?></small>
                                    <?php endforeach; ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php $is_first = false; ?>
            <?php endforeach; ?>
        </div>

        <p class="rim-no-results" data-brand-empty hidden><?php esc_html_e('No matching tire brand found. Try searching by brand name, truck, SUV, all-season, performance, or value.', 'dawp'); ?></p>
    </section>

    <section class="rim-support">
        <div>
            <h2><?php esc_html_e('Choose brand after fitment.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Brand is only one part of tire selection. Confirm tire size, rim size, load index, speed rating, vehicle requirements, and quantity before placing your order.', 'dawp'); ?></p>
        </div>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="rim-button rim-button--dark"><?php esc_html_e('Ask Rubyinstar Support', 'dawp'); ?></a>
    </section>
</div>

<script>
(function() {
    const tool = document.querySelector('[data-brand-tool]');
    if (!tool) return;

    const tabs = Array.from(tool.querySelectorAll('.tz-tab-link'));
    const panels = Array.from(tool.querySelectorAll('.tz-panel'));
    const search = tool.querySelector('[data-brand-search]');
    const empty = tool.querySelector('[data-brand-empty]');

    function activate(target) {
        tabs.forEach(tab => {
            const active = tab.dataset.target === target;
            tab.classList.toggle('active', active);
            tab.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        panels.forEach(panel => panel.classList.toggle('active', panel.id === 'panel-' + target));
    }

    function resetCards() {
        tool.querySelectorAll('.brand-card').forEach(item => item.hidden = false);
        if (empty) empty.hidden = true;
    }

    tabs.forEach(tab => tab.addEventListener('click', () => {
        if (search) search.value = '';
        resetCards();
        activate(tab.dataset.target);
    }));

    if (search) {
        search.addEventListener('input', () => {
            const query = search.value.trim().toLowerCase().replace(/\s+/g, '');
            let matches = 0;

            if (!query) {
                resetCards();
                activate(tabs[0].dataset.target);
                return;
            }

            panels.forEach(panel => {
                let panelMatches = 0;
                panel.querySelectorAll('.brand-card').forEach(item => {
                    const haystack = item.dataset.brand.replace(/\s+/g, '');
                    const hit = haystack.includes(query);
                    item.hidden = !hit;
                    if (hit) {
                        panelMatches++;
                        matches++;
                    }
                });
                panel.classList.toggle('active', panelMatches > 0);
            });

            tabs.forEach(tab => {
                const panel = tool.querySelector('#panel-' + tab.dataset.target);
                const hasMatch = panel && panel.querySelector('.brand-card:not([hidden])');
                tab.classList.toggle('active', !!hasMatch);
                tab.setAttribute('aria-selected', hasMatch ? 'true' : 'false');
            });

            if (empty) empty.hidden = matches > 0;
        });
    }
})();
</script>
