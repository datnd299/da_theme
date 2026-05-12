<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Be Vietnam Pro", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        html { scroll-behavior: smooth; }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$home = home_url('/');
$nav_items = [
    ['title' => __('Trang chủ', 'dawp'), 'url' => $home],
    ['title' => __('Giới thiệu', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Hành trình chuyên môn', 'dawp'), 'url' => home_url('/#hanh-trinh')],
    ['title' => __('Chuyên môn Nhi khoa', 'dawp'), 'url' => home_url('/#chuyen-mon')],
    ['title' => __('Triết lý chăm sóc', 'dawp'), 'url' => home_url('/#triet-ly')],
    ['title' => __('Liên hệ', 'dawp'), 'url' => home_url('/#lien-he')],
];
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#DFF3F8] bg-white/95 shadow-sm backdrop-blur" role="banner">
    <div class="bg-[#EEF9FC]">
        <div class="mx-auto flex max-w-7xl items-center justify-center px-4 py-2 text-center text-xs font-semibold leading-5 text-[#2F80A8] sm:px-6 lg:px-8">
            <?php esc_html_e('Bác sĩ Chuyên khoa I Nhi khoa - Giám đốc chuyên môn Phòng khám The Medcare Hà Nội', 'dawp'); ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home); ?>" class="flex min-w-0 items-center gap-3" aria-label="<?php esc_attr_e('Trang chủ Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?>">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#DFF3F8] text-lg font-extrabold text-[#2F80A8]">
                    LH
                </span>
                <span class="min-w-0">
                    <span class="block truncate text-base font-extrabold leading-5 text-[#12324A] sm:text-lg">
                        <?php esc_html_e('Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?>
                    </span>
                    <span class="mt-1 block truncate text-xs font-semibold text-[#52606D]">
                        <?php esc_html_e('Chuyên khoa I Nhi khoa', 'dawp'); ?>
                    </span>
                </span>
            </a>

            <nav class="hidden items-center gap-6 lg:flex" aria-label="<?php esc_attr_e('Điều hướng chính', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="whitespace-nowrap text-sm font-semibold text-[#52606D] transition hover:text-[#2F80A8]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-3">
                <a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="hidden min-h-11 items-center justify-center rounded-full bg-[#2F80A8] px-5 text-sm font-bold text-white transition hover:bg-[#12324A] sm:inline-flex">
                    <?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?>
                </a>

                <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[#DFF3F8] text-[#12324A] transition hover:bg-[#EEF9FC] lg:hidden" aria-label="<?php esc_attr_e('Mở menu', 'dawp'); ?>" aria-controls="doctor-mobile-menu" onclick="document.getElementById('doctor-mobile-menu').classList.toggle('hidden')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="doctor-mobile-menu" class="hidden border-t border-[#DFF3F8] bg-white lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Điều hướng mobile', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>" class="rounded-2xl px-4 py-3 text-sm font-semibold text-[#52606D] transition hover:bg-[#EEF9FC] hover:text-[#2F80A8]">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="mt-2 inline-flex min-h-12 items-center justify-center rounded-full bg-[#2F80A8] px-5 text-sm font-bold text-white transition hover:bg-[#12324A]">
                <?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?>
            </a>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
