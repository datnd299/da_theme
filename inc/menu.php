<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Services', 'dawp'), 'url' => home_url('/services/')],
        ['title' => __('How We Grow', 'dawp'), 'url' => home_url('/how-we-grow/')],
        ['title' => __('Work', 'dawp'), 'url' => home_url('/work/')],
        ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ];
}
function dawp_is_current_url($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $target  = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');
    if ($current === '' && $target === '') return true;
    return $current !== '' && $current === $target;
}

function dawp_footer_columns() {
    return [];
}
