<?php
/**
 * Template Part: page-shop-by-rim-size
 */

$rubyinstar_gallery_uri = get_theme_file_uri('/assets/img/gallery/Rubyinstar/');
$hero_image = $rubyinstar_gallery_uri . 'tire-hero-road.png';
$tread_image = $rubyinstar_gallery_uri . 'all-season-tread.png';

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$rim_sizes = [
    'R15' => ['185/55R15', '185/60R15', '185/65R15', '195/55R15', '195/60R15', '195/65R15', '205/50R15', '205/60R15', '205/65R15', '205/70R15', '205/75R15', '215/65R15', '215/70R15', '215/75R15', '225/70R15', '225/75R15', '235/60R15', '235/70R15', '235/75R15', '255/60R15', '255/70R15', '265/75R15', '275/60R15', '31x10.50R15', '33X12.50R15'],
    'R16' => ['205/50R16', '205/55R16', '205/60R16', '205/65R16', '205/70R16', '215/55R16', '215/60R16', '215/65R16', '215/70R16', '215/85R16', '225/60R16', '225/65R16', '225/70R16', '225/75R16', '235/60R16', '235/65R16', '235/70R16', '235/85R16', '245/70R16', '245/75R16', '265/70R16', '265/75R16', '285/75R16', '305/70R16', '315/75R16'],
    'R17' => ['205/50R17', '215/45R17', '215/50R17', '215/55R17', '225/45R17', '225/50R17', '225/55R17', '225/60R17', '225/65R17', '235/45R17', '235/55R17', '235/60R17', '235/65R17', '245/45R17', '245/65R17', '245/70R17', '245/75R17', '255/60R17', '255/65R17', '255/70R17', '255/75R17', '255/80R17', '265/65R17', '265/70R17', '275/70R17', '285/70R17', '285/75R17', '295/70R17', '315/70R17'],
    'R18' => ['225/40R18', '225/45R18', '225/50R18', '225/55R18', '225/60R18', '235/40R18', '235/45R18', '235/50R18', '235/55R18', '235/60R18', '235/65R18', '245/40R18', '245/45R18', '245/60R18', '255/40R18', '255/55R18', '255/60R18', '255/65R18', '255/70R18', '265/35R18', '265/60R18', '265/65R18', '265/70R18', '275/65R18', '275/70R18', '285/65R18', '285/75R18', '295/70R18'],
    'R19' => ['225/40R19', '225/45R19', '225/55R19', '235/35R19', '235/40R19', '235/45R19', '235/50R19', '235/55R19', '245/35R19', '245/40R19', '245/45R19', '245/55R19', '255/35R19', '255/40R19', '255/45R19', '255/50R19', '255/60R19', '275/35R19', '285/35R19'],
    'R20' => ['235/55R20', '245/40R20', '245/45R20', '245/50R20', '255/50R20', '255/55R20', '265/50R20', '265/60R20', '275/40R20', '275/45R20', '275/55R20', '275/60R20', '275/65R20', '285/55R20', '285/60R20', '285/65R20', '295/55R20', '295/60R20', '295/65R20', '305/50R20', '305/55R20', '33X12.50R20', '35x12.50R20', '37X12.50R20'],
    'R22' => ['265/35R22', '265/40R22', '275/50R22', '285/45R22', '305/40R22', '305/45R22', '33X12.50R22', '35X12.50R22'],
    'R24' => ['305/35R24'],
];

$custom_links = [
    '31x10.50R15' => '/product-category/r15/31x10-50r15/',
    '33X12.50R15' => '/product-category/r15/33x12-50r15/',
    '33X12.50R20' => '/product-category/r20/33x12-50r20/',
    '35x12.50R20' => '/product-category/r20/35x12-50r20/',
    '37X12.50R20' => '/product-category/r20/37x12-50r20/',
    '33X12.50R22' => '/product-category/r22/33x12-50r22/',
    '35X12.50R22' => '/product-category/r22/35x12-50r22-2/',
];

$size_url = static function ($rim, $size) use ($custom_links) {
    if (isset($custom_links[$size])) {
        return home_url($custom_links[$size]);
    }

    $child_slug = strtolower($size);
    $child_slug = preg_replace('/[\/x\s]+/', '-', $child_slug);
    $child_slug = preg_replace('/-+/', '-', $child_slug);
    $child_slug = trim($child_slug, '-');

    return home_url('/product-category/' . strtolower($rim) . '/' . $child_slug . '/');
};

$total_sizes = array_sum(array_map('count', $rim_sizes));
$popular_rims = ['R17', 'R18', 'R20'];
?>

<div id="primary" class="rim-size-page rim-size-page--rim">
    <section class="rim-hero">
        <img src="<?php echo esc_url($hero_image); ?>"
             alt="<?php esc_attr_e('Rubyinstar tire shop cover for shopping by rim size', 'dawp'); ?>"
             class="rim-hero__image"
             loading="eager"
             fetchpriority="high">
        <div class="rim-hero__overlay"></div>
        <div class="rim-hero__inner">
            <div class="rim-hero__copy">
                <p class="rim-eyebrow"><?php esc_html_e('Rubyinstar Rim Size Finder', 'dawp'); ?></p>
                <h1><?php esc_html_e('Shop By Rim Size', 'dawp'); ?></h1>
                <p><?php esc_html_e('Choose your wheel diameter first, then jump straight to the tire size category that matches the sidewall marking on your current tire.', 'dawp'); ?></p>
                <div class="rim-hero__actions">
                    <a href="#rim-size-tool" class="rim-button rim-button--primary"><?php esc_html_e('Find Tire Size', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="rim-button rim-button--ghost"><?php esc_html_e('Shop All Tires', 'dawp'); ?></a>
                </div>
            </div>
            <div class="rim-hero__finder-card rim-hero__rim-dock" aria-label="<?php esc_attr_e('Rim size shopping preview', 'dawp'); ?>">
                <div>
                    <span><?php esc_html_e('Rim groups', 'dawp'); ?></span>
                    <strong><?php echo esc_html(count($rim_sizes)); ?></strong>
                </div>
                <div>
                    <span><?php esc_html_e('Size links', 'dawp'); ?></span>
                    <strong><?php echo esc_html($total_sizes); ?></strong>
                </div>
                <p><?php esc_html_e('Pick the R number from your sidewall, then open the exact matching category.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="rim-quick-strip" aria-label="<?php esc_attr_e('How to shop by rim size', 'dawp'); ?>">
        <div>
            <strong><?php esc_html_e('1. Read the R number', 'dawp'); ?></strong>
            <span><?php esc_html_e('Example: 225/65R17 uses R17.', 'dawp'); ?></span>
        </div>
        <div>
            <strong><?php esc_html_e('2. Open the matching group', 'dawp'); ?></strong>
            <span><?php esc_html_e('Tabs are organized by wheel diameter.', 'dawp'); ?></span>
        </div>
        <div>
            <strong><?php esc_html_e('3. Choose exact size', 'dawp'); ?></strong>
            <span><?php esc_html_e('Each size links to its product category.', 'dawp'); ?></span>
        </div>
    </section>

    <section class="rim-intro">
        <div class="rim-intro__inner">
            <img src="<?php echo esc_url($tread_image); ?>"
                 alt="<?php esc_attr_e('Close-up tire tread used for Rubyinstar tire shopping guidance', 'dawp'); ?>"
                 loading="lazy">
            <div>
                <p class="rim-eyebrow rim-eyebrow--blue"><?php esc_html_e('How to use it', 'dawp'); ?></p>
                <h2><?php esc_html_e('Start with the R number on your tire.', 'dawp'); ?></h2>
                <p><?php esc_html_e('For example, 225/65R17 uses the R17 tab. This keeps browsing focused and reduces the chance of opening the wrong tire category.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section id="rim-size-tool" class="rim-tool" data-rim-tool>
        <div class="rim-tool__shell">
            <div class="rim-tool__sidebar">
                <div class="rim-tool__header">
                    <div>
                        <p class="rim-eyebrow rim-eyebrow--blue"><?php esc_html_e('Browse categories', 'dawp'); ?></p>
                        <h2><?php esc_html_e('Select a rim size', 'dawp'); ?></h2>
                    </div>
                    <label class="rim-search">
                        <span class="screen-reader-text"><?php esc_html_e('Search tire size', 'dawp'); ?></span>
                        <input type="search" data-rim-search placeholder="<?php esc_attr_e('Search 225/65R17...', 'dawp'); ?>">
                    </label>
                </div>

                <div class="tz-tabs-nav" role="tablist" aria-label="<?php esc_attr_e('Rim size tabs', 'dawp'); ?>">
                    <?php $is_first = true; ?>
                    <?php foreach ($rim_sizes as $rim => $sizes) : ?>
                        <button class="tz-tab-link<?php echo $is_first ? ' active' : ''; ?>"
                                type="button"
                                role="tab"
                                aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>"
                                aria-controls="panel-<?php echo esc_attr($rim); ?>"
                                data-target="<?php echo esc_attr($rim); ?>">
                            <span><?php echo esc_html($rim); ?></span>
                            <small><?php echo esc_html(sprintf(_n('%d size', '%d sizes', count($sizes), 'dawp'), count($sizes))); ?></small>
                        </button>
                        <?php $is_first = false; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="tz-content">
                <?php $is_first = true; ?>
                <?php foreach ($rim_sizes as $rim => $sizes) : ?>
                    <div class="tz-panel<?php echo $is_first ? ' active' : ''; ?>" id="panel-<?php echo esc_attr($rim); ?>" role="tabpanel">
                        <div class="tz-panel__top">
                            <div>
                                <h3><?php echo esc_html(sprintf(__('Tire sizes for %s wheels', 'dawp'), $rim)); ?></h3>
                                <p><?php esc_html_e('Tap a size to open the matching Rubyinstar product category.', 'dawp'); ?></p>
                            </div>
                            <?php if (in_array($rim, $popular_rims, true)) : ?>
                                <span><?php esc_html_e('Popular', 'dawp'); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="tz-grid">
                            <?php foreach ($sizes as $size) : ?>
                                <a class="tz-item"
                                   href="<?php echo esc_url($size_url($rim, $size)); ?>"
                                   data-size="<?php echo esc_attr(strtolower($size)); ?>">
                                    <?php echo esc_html($size); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php $is_first = false; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <p class="rim-no-results" data-rim-empty hidden><?php esc_html_e('No matching tire size found. Try searching by width, profile, or rim number such as R17.', 'dawp'); ?></p>
    </section>

    <section class="rim-support">
        <div>
            <h2><?php esc_html_e('Double-check before checkout', 'dawp'); ?></h2>
            <p><?php esc_html_e('Confirm tire size, rim size, load index, speed rating, vehicle requirements, and quantity before placing your order.', 'dawp'); ?></p>
        </div>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="rim-button rim-button--dark"><?php esc_html_e('Ask Rubyinstar Support', 'dawp'); ?></a>
    </section>
</div>

<script>
(function() {
    const tool = document.querySelector('[data-rim-tool]');
    if (!tool) return;

    const tabs = Array.from(tool.querySelectorAll('.tz-tab-link'));
    const panels = Array.from(tool.querySelectorAll('.tz-panel'));
    const search = tool.querySelector('[data-rim-search]');
    const empty = tool.querySelector('[data-rim-empty]');

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
        tool.querySelectorAll('.tz-item').forEach(item => item.hidden = false);
        if (empty) empty.hidden = true;
        activate(tab.dataset.target);
    }));

    if (search) {
        search.addEventListener('input', () => {
            const query = search.value.trim().toLowerCase().replace(/\s+/g, '');
            let matches = 0;

            if (!query) {
                tool.querySelectorAll('.tz-item').forEach(item => item.hidden = false);
                if (empty) empty.hidden = true;
                return;
            }

            panels.forEach(panel => {
                let panelMatches = 0;
                panel.querySelectorAll('.tz-item').forEach(item => {
                    const hit = item.dataset.size.replace(/\s+/g, '').includes(query);
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
                const hasMatch = panel && panel.querySelector('.tz-item:not([hidden])');
                tab.classList.toggle('active', !!hasMatch);
                tab.setAttribute('aria-selected', hasMatch ? 'true' : 'false');
            });

            if (empty) empty.hidden = matches > 0;
        });
    }
})();
</script>
