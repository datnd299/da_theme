<?php
/**
 * Theme header for the doctor portfolio.
 *
 * @package dawp
 */

$header_links = [
    ['title' => __('Trang chủ', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Giới thiệu', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Hành trình chuyên môn', 'dawp'), 'url' => home_url('/#hanh-trinh')],
    ['title' => __('Chuyên môn Nhi khoa', 'dawp'), 'url' => home_url('/#chuyen-mon')],
    ['title' => __('Triết lý chăm sóc', 'dawp'), 'url' => home_url('/#triet-ly')],
    ['title' => __('Liên hệ', 'dawp'), 'url' => home_url('/#lien-he')],
];

$current_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site doctor-site">
    <a class="screen-reader-text skip-link" href="#content">
        <?php esc_html_e('Bỏ qua nội dung chính', 'dawp'); ?>
    </a>

    <header id="site-header" class="doctor-site-header" role="banner">
        <div class="doctor-topbar">
            <div class="doctor-topbar__inner">
                <?php esc_html_e('Thông tin trên website mang tính giới thiệu chuyên môn và tham khảo, không thay thế thăm khám trực tiếp.', 'dawp'); ?>
            </div>
        </div>

        <div class="doctor-header__inner">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="doctor-brand" aria-label="<?php esc_attr_e('Trang chủ Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?>">
                <span class="doctor-brand__mark" aria-hidden="true">LH</span>
                <span>
                    <span class="doctor-brand__name"><?php esc_html_e('Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?></span>
                    <span class="doctor-brand__role"><?php esc_html_e('Chuyên khoa I Nhi khoa', 'dawp'); ?></span>
                </span>
            </a>

            <nav class="doctor-nav" aria-label="<?php esc_attr_e('Menu chính', 'dawp'); ?>">
                <?php foreach ($header_links as $link) : ?>
                    <?php
                    $link_path  = trim(parse_url($link['url'], PHP_URL_PATH) ?? '', '/');
                    $is_current = $current_path === $link_path && false === strpos($link['url'], '#');
                    ?>
                    <a href="<?php echo esc_url($link['url']); ?>" <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <a class="doctor-btn doctor-btn--primary doctor-header__cta" href="<?php echo esc_url(home_url('/#lien-he')); ?>">
                <?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?>
            </a>

        </div>
    </header>

    <div id="content" class="site-content">
