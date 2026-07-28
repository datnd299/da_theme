<?php
/**
 * Template Name: About Us
 * Template Part: page-about
 */

defined('ABSPATH') || exit;

$all_image_base = get_template_directory_uri() . '/assets/img/All_image/';
$about_images = [
    'hero'      => $all_image_base . 'image copy 6.png',
    'boutique'  => $all_image_base . 'image copy 11.png',
    'market'    => $all_image_base . 'image copy.png',
    'handbag'   => $all_image_base . 'image copy 8.png',
];

$principles = [
    [
        'title' => __('Polished Everyday Style', 'dawp'),
        'copy'  => __('We focus on women\'s shoes, handbags, and accessories that fit real schedules, simple outfits, and repeatable daily styling.', 'dawp'),
        'icon'  => '<path d="M11 20A7 7 0 0 1 4 13c0-5 4-9 12-10 0 8-3 12-8 12"/><path d="M4 20c4-5 8-8 14-10"/>',
    ],
    [
        'title' => __('Clear, Useful Guidance', 'dawp'),
        'copy'  => __('Every product page is written to help shoppers understand size, material or finish, care, and styling details before ordering.', 'dawp'),
        'icon'  => '<path d="M4 4h16v16H4z"/><path d="M8 9h8"/><path d="M8 13h8"/><path d="M8 17h5"/>',
    ],
    [
        'title' => __('Easy Outfit Finishing', 'dawp'),
        'copy'  => __('Norvexa supports simple wardrobe choices with feminine footwear, practical handbags, and finishing accessories.', 'dawp'),
        'icon'  => '<path d="M12 21s-7-4.35-9-9.28C1.6 8.15 3.85 5 7.33 5c2.04 0 3.25 1.1 4.67 2.75C13.42 6.1 14.63 5 16.67 5 20.15 5 22.4 8.15 21 11.72 19 16.65 12 21 12 21Z"/>',
    ],
];

$process_steps = [
    ['number' => '01', 'title' => __('Wear', 'dawp'), 'copy' => __('Shoes and sandals are selected for polished daily outfits and relaxed weekends.', 'dawp')],
    ['number' => '02', 'title' => __('Carry', 'dawp'), 'copy' => __('Handbags are chosen for daily essentials, practical details, and easy styling.', 'dawp')],
    ['number' => '03', 'title' => __('Finish', 'dawp'), 'copy' => __('Accessories add simple finishing touches to everyday wardrobes.', 'dawp')],
];

$trust_items = [
    __('Women\'s leather shoes, sandals, handbags, and accessories', 'dawp'),
    __('Clear product notes for sizing, finish, material, and care', 'dawp'),
    __('Practical styles for workdays, weekends, travel, and gifting', 'dawp'),
    __('Support for questions about products, orders, shipping, and returns', 'dawp'),
];
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <section class="relative overflow-hidden bg-[#241F1D] text-white">
        <div class="absolute inset-0">
            <?php echo dawp_responsive_image($about_images['hero'], [
                'alt'           => __('Women\'s shoes and accessories styled for everyday outfits', 'dawp'),
                'width'         => 1600,
                'height'        => 900,
                'class'         => 'h-full w-full object-cover opacity-62',
                'loading'       => 'eager',
                'fetchpriority' => 'high',
                'sizes'         => '100vw',
                'srcset'        => [[640, 360], [960, 540], [1280, 720], [1600, 900]],
            ]); ?>
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.96)_0%,rgba(36,31,29,0.76)_46%,rgba(36,31,29,0.18)_100%)]"></div>
        </div>

        <div class="relative mx-auto grid min-h-[560px] w-[min(100%,1180px)] content-end px-4 pb-8 pt-20 sm:px-6 lg:min-h-[680px] lg:px-8 lg:pb-12">
            <div class="max-w-3xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]">
                    <?php esc_html_e('About Norvexa', 'dawp'); ?>
                </span>
                <h1 class="mt-7 max-w-4xl font-serif text-4xl leading-[1.04] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Polished women\'s style made practical.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('Norvexa is a women\'s fashion accessories store focused on polished everyday style, feminine footwear, handbags, and simple outfit-finishing essentials.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors duration-300 hover:bg-[#E8D8C8]">
                        <?php esc_html_e('Shop The Boutique', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 py-3 text-sm font-bold text-white transition-colors duration-300 hover:border-white hover:bg-white/10">
                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="mt-12 grid gap-3 border-t border-white/18 pt-5 sm:grid-cols-3">
                <?php foreach ($process_steps as $step) : ?>
                    <div>
                        <span class="block font-serif text-2xl text-white"><?php echo esc_html($step['number']); ?></span>
                        <p class="mt-1 text-sm leading-6 text-white/72"><?php echo esc_html($step['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] items-center gap-10 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="overflow-hidden rounded-[8px] bg-[#2F2A28]">
                <?php echo dawp_responsive_image($about_images['boutique'], [
                    'alt'     => __('Women browsing a fashion boutique', 'dawp'),
                    'width'   => 680,
                    'height'  => 850,
                    'class'   => 'aspect-[4/5] w-full object-cover opacity-95',
                    'sizes'   => '(min-width: 1024px) 540px, 100vw',
                    'srcset'  => [[360, 450], [573, 716], [680, 850]],
                ]); ?>
            </div>
            <div class="lg:pl-8">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Our Point Of View', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight text-[#2F2A28] sm:text-5xl">
                    <?php esc_html_e('Everyday style should feel clear, polished, and genuinely wearable.', 'dawp'); ?>
                </h2>
                <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                    <p><?php esc_html_e('We built Norvexa around a simple idea: daily style works best when it is practical. A good pair of shoes should be easy to wear, a handbag should support real routines, and accessories should finish an outfit without overcomplicating it.', 'dawp'); ?></p>
                    <p><?php esc_html_e('We focus on helpful product choices: polished shoes, relaxed sandals, practical handbags, thoughtful product notes, and simple accessories that are easy to return to.', 'dawp'); ?></p>
                </div>
                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <?php foreach ($process_steps as $step) : ?>
                        <div class="border-t border-[#D8CEC6] pt-4">
                            <span class="text-xs font-bold text-[#C98A8A]"><?php echo esc_html($step['number']); ?></span>
                            <h3 class="mt-2 font-serif text-xl text-[#2F2A28]"><?php echo esc_html($step['title']); ?></h3>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F4ECE5] px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)]">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('What Guides Us', 'dawp'); ?></span>
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('The standards behind every product edit.', 'dawp'); ?></h2>
                </div>
                <p class="max-w-md text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Norvexa is built for shoppers who want useful style pieces without confusing claims, fake luxury signals, or unrelated products.', 'dawp'); ?></p>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <?php foreach ($principles as $principle) : ?>
                    <article class="min-h-[270px] rounded-[8px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8">
                        <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-full bg-[#C98A8A]/14 text-[#C98A8A]">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $principle['icon']; ?></svg>
                        </div>
                        <h3 class="font-serif text-2xl text-[#2F2A28]"><?php echo esc_html($principle['title']); ?></h3>
                        <p class="mt-4 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($principle['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-4 lg:grid-cols-[1.1fr_0.9fr]">
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="group relative min-h-[480px] overflow-hidden rounded-[8px] bg-[#2F2A28]">
                <?php echo dawp_responsive_image($about_images['handbag'], [
                    'alt'     => __('Women\'s handbag styled with accessories', 'dawp'),
                    'width'   => 820,
                    'height'  => 620,
                    'class'   => 'absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
                    'sizes'   => '(min-width: 1024px) 620px, 100vw',
                    'srcset'  => [[480, 363], [573, 433], [820, 620]],
                ]); ?>
                <div class="absolute inset-0 bg-gradient-to-t from-[#2F2A28]/92 via-[#2F2A28]/24 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Wardrobe First', 'dawp'); ?></span>
                    <h3 class="mt-3 max-w-xl font-serif text-3xl leading-tight text-white sm:text-5xl"><?php esc_html_e('Shoes and accessories that make outfits feel complete.', 'dawp'); ?></h3>
                    <p class="mt-4 max-w-lg text-sm leading-6 text-white/78"><?php esc_html_e('From daily footwear to practical handbags, our product direction is built around easy pairing, clear details, and wearable style.', 'dawp'); ?></p>
                </div>
            </a>

            <div class="grid gap-4">
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="group grid min-h-[232px] grid-cols-[42%_1fr] overflow-hidden rounded-[8px] border border-[#D8CEC6] bg-white transition-colors hover:bg-[#F4ECE5]">
                    <?php echo dawp_responsive_image($about_images['market'], [
                        'alt'     => __('Women\'s handbag on a neutral background', 'dawp'),
                        'width'   => 360,
                        'height'  => 360,
                        'class'   => 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
                        'sizes'   => '(min-width: 1024px) 235px, 42vw',
                        'srcset'  => [[220, 220], [360, 360], [573, 573]],
                    ]); ?>
                    <div class="flex flex-col justify-end p-5 sm:p-6">
                        <span class="text-xs font-bold text-[#C98A8A]"><?php esc_html_e('Product Details', 'dawp'); ?></span>
                        <h3 class="mt-3 font-serif text-2xl leading-tight text-[#2F2A28]"><?php esc_html_e('Better choices for daily outfits.', 'dawp'); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Simple notes on sizing, materials, finishes, dimensions, and care.', 'dawp'); ?></p>
                    </div>
                </a>

                <div class="rounded-[8px] bg-[#2F2A28] p-6 text-white sm:p-8">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Reader Confidence', 'dawp'); ?></span>
                    <h3 class="mt-4 font-serif text-3xl leading-tight"><?php esc_html_e('A site experience built for straightforward decisions.', 'dawp'); ?></h3>
                    <ul class="mt-6 grid gap-3 text-sm leading-6 text-white/78">
                        <?php foreach ($trust_items as $item) : ?>
                            <li class="flex gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#E8D8C8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                                <span><?php echo esc_html($item); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] items-center gap-8 border-y border-[#D8CEC6] py-10 lg:grid-cols-[1fr_auto]">
            <div class="max-w-2xl">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Ready To Explore', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight text-[#2F2A28] sm:text-5xl">
                    <?php esc_html_e('Find your next everyday style piece.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Start with polished shoes, browse relaxed sandals, or choose a handbag and accessories that finish your daily outfits.', 'dawp'); ?>
                </p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2F2A28] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]">
                    <?php esc_html_e('Shop Now', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#D8CEC6] px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors hover:border-[#C98A8A] hover:text-[#C98A8A]">
                    <?php esc_html_e('Read FAQ', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>
</main>
