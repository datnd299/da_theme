<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$home_url = home_url('/');
$cv_url = home_url('/wp-content/uploads/huyen-trang-cv.pdf');
$portfolio_email = 'huyen.trang@example.com';

$nav_items = [
    ['title' => __('Portfolio', 'dawp'), 'url' => home_url('/#portfolio')],
    ['title' => __('About', 'dawp'), 'url' => home_url('/#about')],
    ['title' => __('Experience', 'dawp'), 'url' => home_url('/#experience')],
    ['title' => __('Project', 'dawp'), 'url' => home_url('/#featured-project')],
    ['title' => __('Certificates', 'dawp'), 'url' => home_url('/#education')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/#contact')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Be Vietnam Pro", "Inter", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Be Vietnam Pro", "Inter", system-ui, sans-serif; }
        html { scroll-behavior: smooth; }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#E5E7EB] bg-white/95 backdrop-blur" role="banner">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="group flex min-w-0 items-center gap-3" aria-label="<?php esc_attr_e('Hồ Thị Huyền Trang portfolio home', 'dawp'); ?>">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#0F3D5E] text-sm font-extrabold text-white shadow-sm transition group-hover:bg-[#0A2F48]">
                    HT
                </span>
                <span class="min-w-0">
                    <span class="block truncate text-base font-extrabold leading-5 text-[#0F3D5E] sm:text-lg">Hồ Thị Huyền Trang</span>
                    <span class="mt-0.5 hidden truncate text-xs font-semibold text-[#667085] sm:block">English Language Student · Tourism & Communication</span>
                </span>
            </a>

            <nav class="hidden items-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Main portfolio navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-full px-4 py-2 text-sm font-bold text-[#334155] transition hover:bg-[#DCEEFF] hover:text-[#0F3D5E]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-3">
                <a href="mailto:<?php echo esc_attr($portfolio_email); ?>" class="hidden min-h-11 items-center justify-center rounded-full border border-[#0F3D5E]/20 bg-white px-5 text-sm font-bold text-[#0F3D5E] transition hover:bg-[#DCEEFF] sm:inline-flex">
                    <?php esc_html_e('Liên hệ', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($cv_url); ?>" class="hidden min-h-11 items-center justify-center rounded-full bg-[#0F3D5E] px-5 text-sm font-bold text-white transition hover:bg-[#0A2F48] md:inline-flex">
                    <?php esc_html_e('Tải CV', 'dawp'); ?>
                </a>

                <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[#E5E7EB] text-[#0F3D5E] transition hover:bg-[#DCEEFF] lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open portfolio menu', 'dawp'); ?>" aria-controls="portfolio-mobile-menu" onclick="const menu=document.getElementById('portfolio-mobile-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="17" x2="20" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="portfolio-mobile-menu" class="hidden border-t border-[#E5E7EB] bg-white lg:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile portfolio navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-2xl px-4 py-3 text-base font-bold text-[#334155] transition hover:bg-[#DCEEFF] hover:text-[#0F3D5E]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                <a href="mailto:<?php echo esc_attr($portfolio_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0F3D5E]/20 px-5 text-sm font-bold text-[#0F3D5E] transition hover:bg-[#DCEEFF]">
                    <?php esc_html_e('Liên hệ với tôi', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($cv_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0F3D5E] px-5 text-sm font-bold text-white transition hover:bg-[#0A2F48]">
                    <?php esc_html_e('Tải CV', 'dawp'); ?>
                </a>
            </div>
        </div>
    </div>
</header>

<div id="content" class="site-content">
