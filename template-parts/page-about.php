<?php
/**
 * About page — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$img = static function ($name) {
    return get_template_directory_uri() . '/assets/images/home/' . $name . '.webp';
};

$values = [
    ['title' => __('Made by fans', 'dawp'), 'copy' => __('Our designs come from artists who love the shows, games, cartoons and movies as much as you do — and from ideas our community sends us.', 'dawp')],
    ['title' => __('Printed to order', 'dawp'), 'copy' => __('Nothing is mass-produced and left on a shelf. Each piece is printed after you order it, which means less waste and more choice.', 'dawp')],
    ['title' => __('Premium basics', 'dawp'), 'copy' => __('Premium cotton fabric, finely tailored, with a lived-in vintage wash. High-quality basics with no fluff.', 'dawp')],
    ['title' => __('Kinder inks', 'dawp'), 'copy' => __('Our direct-to-garment prints use Brother machines and inks that are non-hazardous, toxin-free, biodegradable and certified with an ECO PASSPORT by OEKO-TEX®.', 'dawp')],
];

$policies = [
    ['title' => __('Shipping Information', 'dawp'), 'url' => home_url('/shipping-returns/')],
    ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/shipping-returns/#returns')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms of Service', 'dawp'), 'url' => home_url('/terms-conditions/')],
];
?>

<div class="bg-[#FBF7EF] text-[#17140F]">
    <section class="border-b-2 border-[#17140F] py-14 sm:py-20" aria-labelledby="about-title">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
            <div>
                <span class="inline-flex -rotate-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]"><?php esc_html_e('About SlickTee', 'dawp'); ?></span>
                <h1 id="about-title" class="font-display mt-5 text-5xl uppercase leading-[0.95] sm:text-7xl"><?php esc_html_e('Art you can wear.', 'dawp'); ?><br><span class="text-[#D7351E]"><?php esc_html_e('Fandom you can feel.', 'dawp'); ?></span></h1>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-[#4A4339]"><?php esc_html_e('Welcome to SLICKTEE — a vibrant, passionate clothing brand built around art. We make vintage-style tees, hoodies, sweatshirts, tank tops, shorts and caps featuring artwork inspired by the anime, games, cartoons, comics and movies you love.', 'dawp'); ?></p>
                <p class="mt-4 max-w-xl text-base leading-relaxed text-[#4A4339]"><?php esc_html_e('Our customers’ interests are always our top priority. We hope you enjoy our products as much as we enjoy making them for you.', 'dawp'); ?></p>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center gap-2 rounded-[8px] border-2 border-[#17140F] bg-[#D7351E] px-7 text-sm font-extrabold uppercase tracking-wide text-[#FFFFFF] shadow-[4px_4px_0_#17140F] transition hover:translate-x-[2px] hover:translate-y-[2px] hover:bg-[#B32813] hover:shadow-[2px_2px_0_#17140F]">
                    <?php esc_html_e('Browse the collection', 'dawp'); ?> <span aria-hidden="true">→</span>
                </a>
            </div>
            <div class="relative">
                <img src="<?php echo esc_url($img('about-studio')); ?>" alt="<?php esc_attr_e('Printing an anime-style design onto a black tee in the SlickTee print studio', 'dawp'); ?>" width="1200" height="900" fetchpriority="high" class="block aspect-[4/3] w-full rounded-[14px] border-2 border-[#17140F] object-cover shadow-[8px_8px_0_#17140F]">
                <span class="absolute -bottom-4 -left-2 rotate-[-4deg] rounded-[4px] border-2 border-[#17140F] bg-[#FBF7EF] px-3 py-1.5 text-xs font-extrabold uppercase tracking-wide shadow-[3px_3px_0_#17140F] sm:-left-4"><?php esc_html_e('Every piece printed to order', 'dawp'); ?></span>
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-24" aria-labelledby="about-values-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 id="about-values-title" class="font-display text-4xl uppercase leading-none sm:text-5xl"><?php esc_html_e('We sweat the details', 'dawp'); ?></h2>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($values as $i => $value) : ?>
                    <article class="rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6">
                        <span class="font-display text-4xl text-[#D7351E]"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                        <h3 class="font-heading mt-3 text-lg font-extrabold uppercase"><?php echo esc_html($value['title']); ?></h3>
                        <p class="mt-2 text-sm leading-relaxed text-[#4A4339]"><?php echo esc_html($value['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="border-y-2 border-[#17140F] bg-[#F2B33D] py-14" aria-labelledby="about-feedback-title">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_1fr] lg:items-center lg:px-8">
            <div>
                <h2 id="about-feedback-title" class="font-display text-4xl uppercase leading-none sm:text-5xl"><?php esc_html_e('We love feedback', 'dawp'); ?></h2>
                <p class="mt-4 max-w-xl text-base leading-relaxed"><?php esc_html_e('We have a lot of fun coming up with designs and are always open to hearing from the community. Many of our collections started as a request from a customer — so tell us what you want to see next.', 'dawp'); ?></p>
            </div>
            <div class="flex flex-wrap gap-3 lg:justify-end">
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center rounded-[8px] border-2 border-[#17140F] bg-[#17140F] px-6 text-sm font-extrabold uppercase tracking-wide text-[#FBF7EF] transition hover:bg-[#FBF7EF] hover:text-[#17140F]"><?php esc_html_e('Suggest a design', 'dawp'); ?></a>
                <a href="https://www.trustpilot.com/review/slicktee.com" target="_blank" rel="noopener nofollow" class="inline-flex min-h-12 items-center rounded-[8px] border-2 border-[#17140F] bg-[#FBF7EF] px-6 text-sm font-extrabold uppercase tracking-wide transition hover:bg-[#17140F] hover:text-[#FBF7EF]"><?php esc_html_e('Reviews on Trustpilot ↗', 'dawp'); ?></a>
                <a href="https://www.sitejabber.com/reviews/slicktee.com" target="_blank" rel="noopener nofollow" class="inline-flex min-h-12 items-center rounded-[8px] border-2 border-[#17140F] bg-[#FBF7EF] px-6 text-sm font-extrabold uppercase tracking-wide transition hover:bg-[#17140F] hover:text-[#FBF7EF]"><?php esc_html_e('Reviews on Sitejabber ↗', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-24" aria-labelledby="about-business-title">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="rounded-[14px] border-2 border-[#17140F] bg-[#17140F] p-6 text-[#FBF7EF] sm:p-8">
                <h2 id="about-business-title" class="font-display text-3xl uppercase"><?php esc_html_e('Business information', 'dawp'); ?></h2>
                <address class="mt-5 grid gap-4 text-sm not-italic leading-6 text-[#FBF7EF]/80">
                    <span><strong class="block text-[#F2B33D]">SlickTee</strong>slicktee.com</span>
                    <span><strong class="block text-[#F2B33D]"><?php esc_html_e('US Address', 'dawp'); ?></strong>304 S. Jones Blvd #3456, Las Vegas, NV 89107, United States</span>
                    <span><strong class="block text-[#F2B33D]"><?php esc_html_e('Contact', 'dawp'); ?></strong><a class="underline hover:text-[#F2B33D]" href="mailto:support@slicktee.com">support@slicktee.com</a> · <?php esc_html_e('US', 'dawp'); ?> <a class="hover:text-[#F2B33D]" href="tel:+19093663939">+1 909-366-3939</a></span>
                </address>
            </div>
            <div class="rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6 sm:p-8">
                <h2 class="font-display text-3xl uppercase"><?php esc_html_e('Our policies', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-6 text-[#4A4339]"><?php esc_html_e('Clear rules, no fine-print surprises. Read how we ship, handle returns and protect your data.', 'dawp'); ?></p>
                <ul class="mt-5 grid gap-2">
                    <?php foreach ($policies as $policy) : ?>
                        <li><a href="<?php echo esc_url($policy['url']); ?>" class="flex min-h-12 items-center justify-between rounded-[8px] border-2 border-[#17140F] px-4 text-sm font-extrabold transition hover:bg-[#F2B33D]"><?php echo esc_html($policy['title']); ?><span aria-hidden="true">→</span></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</div>
