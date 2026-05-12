<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800;900&family=Noto+Serif:wght@600;700;800;900&display=swap&subset=vietnamese" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Noto Serif', 'serif'],
                        body: ['Be Vietnam Pro', 'sans-serif'],
                    },
                    colors: {
                        rainCream: '#FAF7F2',
                        rainIvory: '#FFF9EF',
                        rainMoss: '#123D2A',
                        rainLeaf: '#6F8F3A',
                        rainStraw: '#E7C873',
                        rainBamboo: '#8B5E34',
                        rainWood: '#2F2A28',
                        rainMuted: '#6F625D',
                    }
                }
            }
        }
    </script>

    <?php wp_head(); ?>
    <style>
        :root {
            --font-sans: 'Be Vietnam Pro', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-body: 'Be Vietnam Pro', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-heading: 'Noto Serif', Georgia, 'Times New Roman', serif;
            --default-font-family: var(--font-sans);
        }

        html,
        body,
        #content,
        .font-body {
            font-family: var(--font-sans) !important;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .font-heading {
            font-family: var(--font-heading) !important;
            font-feature-settings: 'kern' 1;
        }
    </style>
</head>

<body <?php body_class('bg-rainCream text-rainWood font-body antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$home_url = home_url('/');

$nav_items = [
    ['title' => __('Trang chủ', 'dawp'), 'url' => $home_url],
    ['title' => __('Câu chuyện', 'dawp'), 'url' => $home_url . '#khong-gian'],
    ['title' => __('Không gian', 'dawp'), 'url' => $home_url . '#ben-ao'],
    ['title' => __('Menu', 'dawp'), 'url' => $home_url . '#menu'],
    ['title' => __('Thư viện', 'dawp'), 'url' => $home_url . '#thu-vien'],
    ['title' => __('Liên hệ', 'dawp'), 'url' => $home_url . '#lien-he'],
];
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#D8C7A3]/70 bg-rainCream/95 text-rainWood shadow-sm backdrop-blur" role="banner">
    <div class="border-b border-[#D8C7A3]/60 bg-rainMoss text-white">
        <div class="mx-auto flex max-w-7xl items-center justify-center px-4 py-2 text-center text-xs font-black uppercase tracking-[0.18em] text-rainStraw sm:px-6 lg:px-8">
            <?php esc_html_e('Chuyện Của Mưa đang chuẩn bị mở cửa vào tháng 8 tại thành phố Điện Biên', 'dawp'); ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-5">
            <a href="<?php echo esc_url($home_url); ?>"
               class="group inline-flex items-center gap-3"
               aria-label="<?php esc_attr_e('Về trang chủ Chuyện Của Mưa', 'dawp'); ?>">
                <span class="flex h-11 w-11 items-center justify-center rounded-full border border-rainBamboo/25 bg-rainMoss font-heading text-2xl font-black text-rainStraw">
                    <?php esc_html_e('Mưa', 'dawp'); ?>
                </span>
                <span class="leading-none">
                    <span class="block font-heading text-3xl font-black uppercase tracking-tight text-rainMoss">
                        <?php esc_html_e('Chuyện Của Mưa', 'dawp'); ?>
                    </span>
                    <span class="mt-1 hidden text-xs font-black uppercase tracking-[0.18em] text-rainBamboo sm:block">
                        <?php esc_html_e('Bên ao, sau lưng là đồng lúa', 'dawp'); ?>
                    </span>
                </span>
            </a>

            <nav class="hidden items-center gap-7 lg:flex" aria-label="<?php esc_attr_e('Điều hướng chính', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"
                       class="text-sm font-black uppercase tracking-wide text-rainWood/78 transition hover:text-rainMoss">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex items-center gap-3">
                <a href="<?php echo esc_url($home_url . '#mo-cua'); ?>"
                   class="hidden min-h-11 items-center justify-center rounded-md bg-rainMoss px-5 text-xs font-black uppercase tracking-wide text-white transition hover:bg-rainBamboo sm:inline-flex">
                    <?php esc_html_e('Theo dõi mở cửa', 'dawp'); ?>
                </a>

                <button type="button"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-md border border-rainBamboo/25 text-rainMoss transition hover:border-rainMoss hover:bg-white lg:hidden"
                        aria-label="<?php esc_attr_e('Mở menu', 'dawp'); ?>"
                        aria-controls="rain-mobile-menu"
                        onclick="document.getElementById('rain-mobile-menu').classList.toggle('hidden')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="rain-mobile-menu" class="hidden border-t border-[#D8C7A3]/70 bg-rainIvory lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Điều hướng mobile', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-md px-3 py-3 text-sm font-black uppercase tracking-wide text-rainWood/78 transition hover:bg-rainCream hover:text-rainMoss">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url($home_url . '#mo-cua'); ?>"
               class="mt-2 inline-flex min-h-11 items-center justify-center rounded-md bg-rainMoss px-5 text-xs font-black uppercase tracking-wide text-white transition hover:bg-rainBamboo">
                <?php esc_html_e('Theo dõi ngày mở cửa', 'dawp'); ?>
            </a>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
