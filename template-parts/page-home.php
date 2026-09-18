<?php
/**
 * Homepage content — Eliteshop Express.
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

/**
 * Small inline "tee" mockup reused across the hero, category and product
 * cards — no product photography exists for this brand yet, so visuals are
 * built as flat SVG instead of fabricating stock/lifestyle photos.
 */
$dawp_tee_svg = static function ($fill = '#FF5A5F', $label = '', $label_color = '#FFFFFF', $extra_id = '') {
    ob_start();
    ?>
    <svg viewBox="0 0 200 200" class="h-full w-full" role="img" aria-label="<?php echo esc_attr($label ? sprintf(__('Apparel mockup printed with "%s"', 'dawp'), $label) : __('Apparel mockup', 'dawp')); ?>">
        <path
            <?php echo $extra_id ? 'id="' . esc_attr($extra_id) . '"' : ''; ?>
            d="M62,18 L84,8 C90,24 110,24 116,8 L138,18 L172,48 L150,72 L138,60 L138,188 L62,188 L62,60 L50,72 L28,48 Z"
            fill="<?php echo esc_attr($fill); ?>"
        ></path>
        <?php if ($label) : ?>
            <text x="100" y="118" text-anchor="middle" font-family="Poppins, Montserrat, sans-serif" font-weight="800" font-size="20" fill="<?php echo esc_attr($label_color); ?>"><?php echo esc_html($label); ?></text>
        <?php endif; ?>
    </svg>
    <?php
    return ob_get_clean();
};
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="relative overflow-hidden bg-white">
    <div class="pointer-events-none absolute inset-x-0 top-0 h-full bg-[radial-gradient(circle_at_80%_0%,rgba(255,90,95,0.10),transparent_55%)]" aria-hidden="true"></div>

    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-2 lg:items-center lg:gap-8 lg:px-8 lg:py-24">
        <div>
            <span class="inline-flex items-center gap-2 rounded-[var(--radius-pill)] bg-[#FFF1F0] px-4 py-1.5 text-xs font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]">
                <?php esc_html_e('Personalized apparel, made in the USA', 'dawp'); ?>
            </span>

            <h1 class="font-heading mt-5 text-4xl font-extrabold leading-[1.05] text-[#111827] sm:text-5xl lg:text-6xl">
                <?php esc_html_e('Wear Your Vibe.', 'dawp'); ?><br>
                <span class="text-[#FF5A5F]"><?php esc_html_e('100% You.', 'dawp'); ?></span>
            </h1>

            <p class="mt-5 max-w-lg text-lg leading-relaxed text-[#4B5563]">
                <?php esc_html_e('Design a T-shirt, hoodie or tank top that\'s truly one of a kind — in just a few clicks. Add your name, your vibe, anything you love.', 'dawp'); ?>
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-4">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-8 py-3.5 text-sm font-bold text-white shadow-[var(--shadow-card)] transition hover:-translate-y-0.5 hover:bg-[#E14247]">
                    <?php esc_html_e('Start Customizing', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-8 py-3.5 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white">
                    <?php esc_html_e('Shop Bestsellers', 'dawp'); ?>
                </a>
            </div>

            <dl class="mt-10 grid max-w-md grid-cols-3 gap-4 border-t border-[#E5E7EB] pt-6">
                <div>
                    <dt class="font-heading text-2xl font-extrabold text-[#111827]">10K+</dt>
                    <dd class="text-xs font-semibold uppercase tracking-wide text-[#6B7280]"><?php esc_html_e('Happy customers', 'dawp'); ?></dd>
                </div>
                <div>
                    <dt class="font-heading text-2xl font-extrabold text-[#111827]">4.8/5</dt>
                    <dd class="text-xs font-semibold uppercase tracking-wide text-[#6B7280]"><?php esc_html_e('Average rating', 'dawp'); ?></dd>
                </div>
                <div>
                    <dt class="font-heading text-2xl font-extrabold text-[#111827]"><?php esc_html_e('100%', 'dawp'); ?></dt>
                    <dd class="text-xs font-semibold uppercase tracking-wide text-[#6B7280]"><?php esc_html_e('Made in the USA', 'dawp'); ?></dd>
                </div>
            </dl>
        </div>

        <div class="relative mx-auto w-full max-w-sm">
            <div class="absolute -inset-6 -z-10 rounded-[40px] bg-[#FFF1F0]" aria-hidden="true"></div>
            <div class="relative aspect-square w-full rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-10 shadow-[var(--shadow-card-hover)]">
                <?php echo $dawp_tee_svg('#FF5A5F', 'ALEX', '#FFFFFF'); ?>
            </div>
            <div class="absolute -bottom-5 -left-5 flex items-center gap-2 rounded-[var(--radius-md)] border border-[#E5E7EB] bg-white px-4 py-3 shadow-[var(--shadow-card)]">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#0056D2]/10 text-[#0056D2]">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>
                </span>
                <span class="text-xs font-bold text-[#111827]"><?php esc_html_e('Design added to cart', 'dawp'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     TRUST BADGES
     ============================================================ -->
<section class="border-y border-[#E5E7EB] bg-[#F9FAFB]">
    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-6 px-4 py-8 sm:px-6 lg:grid-cols-4 lg:px-8">
        <?php
        $trust_badges = [
            [
                'title' => __('Printed & Shipped from the USA', 'dawp'),
                'icon'  => '<path d="M4 6h16v12H4z"></path><path d="M4 10h16M8 6v4"></path>',
            ],
            [
                'title' => __('Premium Quality Material', 'dawp'),
                'icon'  => '<path d="m12 2 2.6 6.3L21 9l-4.9 4.3L17.4 20 12 16.7 6.6 20l1.3-6.7L3 9l6.4-.7Z"></path>',
            ],
            [
                'title' => __('Secure Checkout', 'dawp'),
                'icon'  => '<rect x="4" y="10" width="16" height="10" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path>',
            ],
            [
                'title' => __('Easy Returns', 'dawp'),
                'icon'  => '<path d="M3 12a9 9 0 1 0 3-6.7"></path><path d="M3 4v5h5"></path>',
            ],
        ];
        foreach ($trust_badges as $badge) :
            ?>
            <div class="flex items-center gap-3">
                <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-[var(--radius-md)] bg-white text-[#FF5A5F] shadow-[var(--shadow-card)]" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $badge['icon']; ?></svg>
                </span>
                <span class="text-sm font-bold leading-tight text-[#111827]"><?php echo esc_html($badge['title']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================================================
     HOW IT WORKS
     ============================================================ -->
<section id="how-it-works" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#FF5A5F]"><?php esc_html_e('How It Works', 'dawp'); ?></span>
            <h2 class="font-heading mt-3 text-3xl font-bold text-[#111827] sm:text-4xl"><?php esc_html_e('Personalize it in 3 easy steps', 'dawp'); ?></h2>
        </div>

        <div class="mt-12 grid gap-8 sm:grid-cols-3">
            <?php
            $steps = [
                [
                    'title' => __('Choose Your Canvas', 'dawp'),
                    'desc'  => __('Pick a T-shirt, hoodie, long sleeve or tank top in the fit and color you love.', 'dawp'),
                    'icon'  => '<path d="M4 8 9 4l3 3 3-3 5 4-3 4-2-1v9H6v-9l-2 1Z"></path>',
                ],
                [
                    'title' => __('Make It Yours', 'dawp'),
                    'desc'  => __('Add your name, a favorite phrase or your style — change fonts and colors until it feels right.', 'dawp'),
                    'icon'  => '<path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"></path>',
                ],
                [
                    'title' => __('We Bring It To Life', 'dawp'),
                    'desc'  => __('We print and ship it from the USA, straight to your door — no minimums, one at a time.', 'dawp'),
                    'icon'  => '<rect x="3" y="10" width="13" height="8" rx="1"></rect><path d="M16 13h3.5L21 16v2h-5"></path><circle cx="7" cy="19" r="1.6"></circle><circle cx="18" cy="19" r="1.6"></circle>',
                ],
            ];
            foreach ($steps as $i => $step) :
                ?>
                <div class="relative rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-7">
                    <span class="font-heading absolute -top-4 left-7 inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#0056D2] text-sm font-extrabold text-white"><?php echo esc_html($i + 1); ?></span>
                    <span class="mt-2 inline-flex h-14 w-14 items-center justify-center rounded-[var(--radius-md)] bg-[#FFF1F0] text-[#FF5A5F]" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $step['icon']; ?></svg>
                    </span>
                    <h3 class="font-heading mt-5 text-lg font-bold text-[#111827]"><?php echo esc_html($step['title']); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-[#4B5563]"><?php echo esc_html($step['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SHOP BY CATEGORY
     ============================================================ -->
<section class="bg-[#F9FAFB] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#FF5A5F]"><?php esc_html_e('Shop By Category', 'dawp'); ?></span>
                <h2 class="font-heading mt-3 text-3xl font-bold text-[#111827] sm:text-4xl"><?php esc_html_e('Find your fit', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url($shop_url); ?>" class="hidden text-sm font-bold text-[#0056D2] hover:text-[#003F9E] sm:inline-flex"><?php esc_html_e('View all products →', 'dawp'); ?></a>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-3">
            <?php
            $categories = [
                ['title' => __("Men's Apparel", 'dawp'), 'desc' => __('Tees, hoodies, crewnecks & tanks', 'dawp'), 'fill' => '#111827'],
                ['title' => __("Women's Apparel", 'dawp'), 'desc' => __('Tees, hoodies, long sleeves & tanks', 'dawp'), 'fill' => '#FF5A5F'],
                ['title' => __("Kids' Zone", 'dawp'), 'desc' => __('Playful, personalized tees for kids', 'dawp'), 'fill' => '#0056D2'],
            ];
            foreach ($categories as $cat) :
                ?>
                <a href="<?php echo esc_url($shop_url); ?>" class="group col-span-2 flex items-center gap-5 rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-5 shadow-[var(--shadow-card)] transition hover:-translate-y-0.5 hover:shadow-[var(--shadow-card-hover)] sm:col-span-1 sm:flex-col sm:items-start sm:gap-4 sm:p-6">
                    <span class="h-16 w-16 shrink-0 rounded-[var(--radius-md)] bg-[#F9FAFB] p-2.5 sm:h-24 sm:w-24 sm:p-4">
                        <?php echo $dawp_tee_svg($cat['fill']); ?>
                    </span>
                    <span>
                        <span class="font-heading block text-base font-bold text-[#111827] sm:text-lg"><?php echo esc_html($cat['title']); ?></span>
                        <span class="mt-1 block text-sm text-[#4B5563]"><?php echo esc_html($cat['desc']); ?></span>
                        <span class="mt-2 hidden text-sm font-bold text-[#FF5A5F] sm:inline-block">
                            <?php esc_html_e('Shop now', 'dawp'); ?>
                            <span class="inline-block transition group-hover:translate-x-1">→</span>
                        </span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     CUSTOMIZATION ENGINE DEMO
     ============================================================ -->
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6 sm:p-10 lg:grid-cols-2 lg:items-center lg:gap-14 lg:p-14">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#0056D2]"><?php esc_html_e('Try Our Customization Engine', 'dawp'); ?></span>
                <h2 class="font-heading mt-3 text-3xl font-bold text-[#111827] sm:text-4xl"><?php esc_html_e('Watch it change in real time', 'dawp'); ?></h2>
                <p class="mt-4 max-w-md text-base leading-relaxed text-[#4B5563]"><?php esc_html_e('Type anything — a name, a nickname, a vibe — and see it printed on the mockup instantly. This is exactly how easy it is on every product page.', 'dawp'); ?></p>

                <label class="mt-8 block text-sm font-bold text-[#111827]" for="demo-name-input"><?php esc_html_e('Your text', 'dawp'); ?></label>
                <input id="demo-name-input" type="text" maxlength="14" value="ALEX" class="mt-2 w-full max-w-xs rounded-[var(--radius-md)] border border-[#E5E7EB] bg-white px-4 py-3 text-base font-semibold text-[#111827] outline-none focus:border-[#FF5A5F]" placeholder="<?php esc_attr_e('Type your name...', 'dawp'); ?>">

                <div class="mt-4 flex flex-wrap gap-2">
                    <button type="button" data-demo-preset="DOG MOM" data-demo-color="#FF5A5F" class="demo-preset-btn is-active inline-flex items-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-4 py-2 text-xs font-bold text-[#111827] transition"><?php esc_html_e('Dog Mom', 'dawp'); ?></button>
                    <button type="button" data-demo-preset="CAT MOM" data-demo-color="#0056D2" class="demo-preset-btn inline-flex items-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-4 py-2 text-xs font-bold text-[#111827] transition"><?php esc_html_e('Cat Mom', 'dawp'); ?></button>
                    <button type="button" data-demo-preset="EST. 1998" data-demo-color="#111827" class="demo-preset-btn inline-flex items-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-4 py-2 text-xs font-bold text-[#111827] transition"><?php esc_html_e('Birth Year', 'dawp'); ?></button>
                </div>

                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#0056D2] px-8 py-3.5 text-sm font-bold text-white transition hover:bg-[#003F9E]">
                    <?php esc_html_e('Try It Yourself', 'dawp'); ?>
                </a>
            </div>

            <div class="relative mx-auto w-full max-w-xs">
                <div class="aspect-square w-full rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-10 shadow-[var(--shadow-card-hover)]">
                    <svg viewBox="0 0 200 200" class="h-full w-full" role="img" aria-label="<?php esc_attr_e('Live customization preview', 'dawp'); ?>">
                        <path id="demo-tee-fill" d="M62,18 L84,8 C90,24 110,24 116,8 L138,18 L172,48 L150,72 L138,60 L138,188 L62,188 L62,60 L50,72 L28,48 Z" fill="#FF5A5F"></path>
                        <text x="100" y="118" text-anchor="middle" font-family="Poppins, Montserrat, sans-serif" font-weight="800" font-size="20" fill="#FFFFFF"><tspan id="demo-print-text">ALEX</tspan></text>
                    </svg>
                </div>
                <span class="absolute -right-4 -top-4 inline-flex items-center gap-1 rounded-[var(--radius-pill)] bg-white px-3 py-1.5 text-xs font-bold text-[#111827] shadow-[var(--shadow-card)]">
                    <span class="h-2 w-2 rounded-full bg-[#16A34A]"></span>
                    <?php esc_html_e('Live preview', 'dawp'); ?>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     TRENDING PERSONALIZED DESIGNS
     ============================================================ -->
<section class="bg-[#F9FAFB] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#FF5A5F]"><?php esc_html_e('Trending Personalized Designs', 'dawp'); ?></span>
                <h2 class="font-heading mt-3 text-3xl font-bold text-[#111827] sm:text-4xl"><?php esc_html_e('Customer favorites this week', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url($shop_url); ?>" class="hidden text-sm font-bold text-[#0056D2] hover:text-[#003F9E] sm:inline-flex"><?php esc_html_e('Shop all designs →', 'dawp'); ?></a>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
            <?php
            $trending = [
                ['title' => __('The Ultimate Gamer Hoodie', 'dawp'), 'price' => '44.99', 'fill' => '#111827', 'label' => 'LVL UP', 'tags' => ['Best Seller']],
                ['title' => __('Vintage Birth Year Tee', 'dawp'), 'price' => '26.99', 'fill' => '#0056D2', 'label' => '1998', 'tags' => ['Customizable']],
                ['title' => __('Custom Pet Portrait Crewneck', 'dawp'), 'price' => '38.99', 'fill' => '#FF5A5F', 'label' => 'MAX', 'tags' => ['Best Seller', 'Customizable']],
                ['title' => __('Best Friends Matching Tee', 'dawp'), 'price' => '24.99', 'fill' => '#16A34A', 'label' => 'BFF', 'tags' => ['Customizable']],
            ];
            foreach ($trending as $item) :
                ?>
                <a href="<?php echo esc_url($shop_url); ?>" class="group overflow-hidden rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white shadow-[var(--shadow-card)] transition hover:-translate-y-0.5 hover:shadow-[var(--shadow-card-hover)]">
                    <span class="relative block aspect-square overflow-hidden bg-[#F9FAFB] p-6">
                        <span class="absolute left-2 top-2 z-10 flex flex-wrap gap-1">
                            <?php foreach ($item['tags'] as $tag) : ?>
                                <span class="rounded-[var(--radius-sm)] bg-[#111827] px-2 py-1 text-[0.625rem] font-extrabold uppercase tracking-wide text-white"><?php echo esc_html($tag); ?></span>
                            <?php endforeach; ?>
                        </span>
                        <span class="block h-full w-full transition duration-300 group-hover:scale-105">
                            <?php echo $dawp_tee_svg($item['fill'], $item['label']); ?>
                        </span>
                    </span>
                    <span class="block p-4">
                        <span class="font-heading block text-sm font-bold leading-snug text-[#111827]"><?php echo esc_html($item['title']); ?></span>
                        <span class="mt-2 block text-base font-extrabold text-[#FF5A5F]">$<?php echo esc_html($item['price']); ?></span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SOCIAL PROOF
     ============================================================ -->
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#FF5A5F]"><?php esc_html_e('Social Proof', 'dawp'); ?></span>
            <h2 class="font-heading mt-3 text-3xl font-bold text-[#111827] sm:text-4xl"><?php esc_html_e('Loved by 10,000+ Americans', 'dawp'); ?></h2>
        </div>

        <?php
        $testimonials = [
            ['name' => 'John D.', 'state' => 'Texas', 'quote' => __('The fabric is super soft and the name print is crisp and sharp. Ordering another one!', 'dawp')],
            ['name' => 'Maria S.', 'state' => 'California', 'quote' => __('Got the pet portrait crewneck for my mom and she cried happy tears. Shipping was fast too.', 'dawp')],
            ['name' => 'Kevin O.', 'state' => 'Ohio', 'quote' => __('So easy to personalize — I typed my son\'s name and saw it on the shirt before I even paid.', 'dawp')],
            ['name' => 'Priya R.', 'state' => 'New Jersey', 'quote' => __('Quality feels premium, not like a cheap print. Worth every penny for a gift that actually feels personal.', 'dawp')],
        ];
        ?>

        <div class="relative mt-10" data-carousel>
            <div class="flex snap-x snap-mandatory gap-4 overflow-x-auto pb-4 sm:gap-6" data-carousel-track>
                <?php foreach ($testimonials as $i => $t) :
                    $avatar_colors = ['#FF5A5F', '#0056D2', '#111827', '#16A34A'];
                    $avatar_color  = $avatar_colors[$i % count($avatar_colors)];
                    $initials      = mb_substr($t['name'], 0, 1) . mb_substr(strrchr($t['name'], ' ') ?: '', 1, 1);
                    ?>
                    <figure class="w-[85%] shrink-0 snap-start rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6 sm:w-[45%] lg:w-[23%]">
                        <div class="flex text-[#FF5A5F]" aria-hidden="true">
                            <?php for ($s = 0; $s < 5; $s++) : ?>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="m12 2 2.6 6.3L21 9l-4.9 4.3L17.4 20 12 16.7 6.6 20l1.3-6.7L3 9l6.4-.7Z"></path></svg>
                            <?php endfor; ?>
                        </div>
                        <blockquote class="mt-4 text-sm leading-relaxed text-[#374151]">"<?php echo esc_html($t['quote']); ?>"</blockquote>
                        <figcaption class="mt-5 flex items-center gap-3">
                            <span class="font-heading flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-sm font-extrabold text-white" style="background-color: <?php echo esc_attr($avatar_color); ?>"><?php echo esc_html(strtoupper($initials)); ?></span>
                            <span class="text-sm">
                                <span class="block font-bold text-[#111827]"><?php echo esc_html($t['name']); ?></span>
                                <span class="block text-[#6B7280]"><?php echo esc_html($t['state']); ?></span>
                            </span>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>

            <div class="mt-4 flex justify-center gap-3">
                <button type="button" data-carousel-prev class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#E5E7EB] text-[#111827] transition hover:bg-[#F9FAFB]" aria-label="<?php esc_attr_e('Previous reviews', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
                </button>
                <button type="button" data-carousel-next class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#E5E7EB] text-[#111827] transition hover:bg-[#F9FAFB]" aria-label="<?php esc_attr_e('Next reviews', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"></path></svg>
                </button>
            </div>
        </div>
    </div>
</section>
