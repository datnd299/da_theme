<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
        ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
        ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
        ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
        ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
    ];
}

function dawp_render_main_menu() {
    $items = dawp_main_menu_items();
    if (empty($items)) return;
    ?>
    <nav class="main-nav" aria-label="<?php esc_attr_e('Main Menu', 'dawp'); ?>">
        <ul class="main-menu">
            <?php foreach ($items as $item) :
                $is_current = dawp_is_current_url($item['url']);
                $classes = ['menu-item'];
                if ($is_current) $classes[] = 'menu-item--current';
            ?>
                <li class="<?php echo esc_attr(implode(' ', $classes)); ?>">
                    <a href="<?php echo esc_url($item['url']); ?>" <?php if ($is_current) echo 'aria-current="page"'; ?>>
                        <?php echo esc_html($item['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php
}

function dawp_is_current_url($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $target  = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');
    if ($current === '' && $target === '') return true;
    return $current !== '' && $current === $target;
}

function dawp_footer_columns() {
    return [
        [
            'title' => 'Information',
            'links' => [
                ['title' => 'About Us', 'url' => home_url('/about-us/')],
                ['title' => 'FAQ', 'url' => home_url('/faq/')],
            ],
        ],
        [
            'title' => 'Customer Service',
            'links' => [
                ['title' => 'Contact Us', 'url' => home_url('/contact-us/')],
                ['title' => 'Shipping & Returns', 'url' => home_url('/shipping-returns/')],
                ['title' => 'Terms & Conditions', 'url' => home_url('/terms-conditions/')],
                ['title' => 'Privacy Policy', 'url' => home_url('/privacy-policy/')],
            ],
        ],
    ];
}
