<?php
/**
 * About page for MyBaapStore.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@mybaapstore.com';
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$about_category_url = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$audiences = [
    [
        'title' => __('Home Users', 'dawp'),
        'copy'  => __('People looking for simple tools that support kitchen, storage, cleaning, and household routines.', 'dawp'),
    ],
    [
        'title' => __('Busy Everyday Shoppers', 'dawp'),
        'copy'  => __('Customers who prefer compact, useful products that are easy to understand and fit normal daily life.', 'dawp'),
    ],
    [
        'title' => __('Grooming & Care Buyers', 'dawp'),
        'copy'  => __('Men and women shopping for personal care devices for regular grooming and everyday care routines.', 'dawp'),
    ],
    [
        'title' => __('Tech Accessory Users', 'dawp'),
        'copy'  => __('Desk users, content creators, travelers, and gift shoppers looking for practical camera and device accessories.', 'dawp'),
    ],
];

$principles = [
    [
        'title' => __('Useful First', 'dawp'),
        'copy'  => __('Products should have a clear everyday purpose, not depend on hype, pressure, or exaggerated promises.', 'dawp'),
        'icon'  => 'check',
    ],
    [
        'title' => __('Simple Product Information', 'dawp'),
        'copy'  => __('We aim to describe what each item is, how it is used, what is included, and what customers should know before ordering.', 'dawp'),
        'icon'  => 'list',
    ],
    [
        'title' => __('Safe Mainstream Use', 'dawp'),
        'copy'  => __('Camera and tech accessories are presented for normal, lawful uses such as content creation, desk setups, and device organization.', 'dawp'),
        'icon'  => 'shield',
    ],
    [
        'title' => __('Clear Customer Care', 'dawp'),
        'copy'  => __('Support, shipping, returns, and product notes are kept visible so shoppers can make informed decisions.', 'dawp'),
        'icon'  => 'mail',
    ],
];

$categories = [
    [
        'name' => __('Smart Gadgets', 'dawp'),
        'copy' => __('Useful small gadgets selected for everyday convenience and simple routines.', 'dawp'),
        'url'  => $about_category_url('smart-gadgets'),
    ],
    [
        'name' => __('Home & Kitchen Gadgets', 'dawp'),
        'copy' => __('Helpful tools for kitchen prep, drinkware, storage, and everyday household tasks.', 'dawp'),
        'url'  => $about_category_url('home-kitchen-gadgets'),
    ],
    [
        'name' => __('Personal Care Devices', 'dawp'),
        'copy' => __('Simple grooming tools designed for regular personal care routines and easy handling.', 'dawp'),
        'url'  => $about_category_url('personal-care-devices'),
    ],
    [
        'name' => __('Camera & Tech Accessories', 'dawp'),
        'copy' => __('Practical camera, video, desk, and device accessories for normal daily use.', 'dawp'),
        'url'  => $about_category_url('camera-tech-accessories'),
    ],
    [
        'name' => __('Daily Tools', 'dawp'),
        'copy' => __('Compact accessories for travel, daily carry, and small everyday problem-solving.', 'dawp'),
        'url'  => $about_category_url('daily-tools'),
    ],
];

$care_cards = [
    [
        'title' => __('US-Focused Shipping', 'dawp'),
        'copy'  => __('Orders are processed within 2-4 business days. After dispatch, standard US shipping typically takes 5-10 business days depending on destination and carrier conditions.', 'dawp'),
    ],
    [
        'title' => __('30-Day Return Window', 'dawp'),
        'copy'  => __('Eligible unused items may be returned within 30 days of delivery after contacting support. Personal care devices may be subject to hygiene-related return conditions.', 'dawp'),
    ],
    [
        'title' => __('Support You Can Reach', 'dawp'),
        'copy'  => __('For product, order, delivery, or return questions, email support@mybaapstore.com. Business hours are Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'),
    ],
];

$policy_links = [
    [
        'title' => __('Shipping & Returns', 'dawp'),
        'url'   => home_url('/shipping-returns/'),
    ],
    [
        'title' => __('FAQ', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
    [
        'title' => __('Privacy Policy', 'dawp'),
        'url'   => home_url('/privacy-policy/'),
    ],
    [
        'title' => __('Terms & Conditions', 'dawp'),
        'url'   => home_url('/terms-conditions/'),
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'check'  => '<path d="m20 6-11 11-5-5"/>',
        'list'   => '<path d="M8 6h13"/><path d="M8 12h13"/><path d="M8 18h13"/><path d="M3 6h.01"/><path d="M3 12h.01"/><path d="M3 18h.01"/>',
        'shield' => '<path d="M20 13c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V5l8-3 8 3v8Z"/><path d="m9 12 2 2 4-4"/>',
        'mail'   => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF]" aria-labelledby="about-title">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[1fr_0.9fr] lg:items-center lg:px-8 lg:py-20">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('About MyBaapStore', 'dawp'); ?></p>
                <h1 id="about-title" class="mt-5 max-w-3xl text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Useful Gadgets For Everyday Life', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#667085]">
                    <?php esc_html_e('MyBaapStore is a practical gadget store focused on small, useful tools for home, kitchen, grooming, camera and tech accessories, and daily convenience.', 'dawp'); ?>
                </p>
                <p class="mt-4 max-w-2xl text-base leading-8 text-[#667085]">
                    <?php esc_html_e('We build the store around clear use cases, realistic product information, and customer care details that help shoppers choose everyday products with confidence.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                        <?php esc_html_e('Shop Practical Gadgets', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] bg-white px-6 text-sm font-bold text-[#2F80ED] transition hover:bg-white/70">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-white bg-white p-4 shadow-xl shadow-[#102A43]/15">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/About_Image.png'); ?>" alt="<?php esc_attr_e('Clean desk with practical everyday tech accessories', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-xl object-cover" loading="eager" decoding="async">
                <div class="mt-4 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-xl bg-[#F5F7FA] p-4">
                        <p class="text-sm font-extrabold text-[#102A43]"><?php esc_html_e('Home', 'dawp'); ?></p>
                        <p class="mt-1 text-xs leading-5 text-[#667085]"><?php esc_html_e('Kitchen and household helpers.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-xl bg-[#F5F7FA] p-4">
                        <p class="text-sm font-extrabold text-[#102A43]"><?php esc_html_e('Care', 'dawp'); ?></p>
                        <p class="mt-1 text-xs leading-5 text-[#667085]"><?php esc_html_e('Simple grooming routines.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-xl bg-[#F5F7FA] p-4">
                        <p class="text-sm font-extrabold text-[#102A43]"><?php esc_html_e('Tech', 'dawp'); ?></p>
                        <p class="mt-1 text-xs leading-5 text-[#667085]"><?php esc_html_e('Desk and device accessories.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20" aria-labelledby="about-mission-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5BA8A0]"><?php esc_html_e('Our Purpose', 'dawp'); ?></p>
                <h2 id="about-mission-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Making small daily tasks easier to handle.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#667085]">
                    <?php esc_html_e('MyBaapStore is for shoppers who like practical products that solve simple everyday needs. Our focus is not on viral trends or complicated electronics. It is on useful gadgets that are easy to understand, easy to compare, and relevant to normal routines.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <?php foreach ($audiences as $audience) : ?>
                    <article class="rounded-2xl border border-[#E5E7EB] bg-[#F5F7FA] p-6">
                        <h3 class="text-lg font-extrabold text-[#102A43]"><?php echo esc_html($audience['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($audience['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F5F7FA] py-16 sm:py-20" aria-labelledby="about-principles-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('How We Choose Products', 'dawp'); ?></p>
                <h2 id="about-principles-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Practical, clear, and appropriate for everyday shopping.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-7 text-[#667085]">
                    <?php esc_html_e('The store is shaped around mainstream ecommerce expectations: focused categories, realistic descriptions, transparent policies, and products presented for normal daily use.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($principles as $principle) : ?>
                    <article class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#102A43]/10">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#EAF4FF] text-[#2F80ED]">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($principle['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-extrabold text-[#102A43]"><?php echo esc_html($principle['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($principle['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20" aria-labelledby="about-categories-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/About_product.png'); ?>" alt="<?php esc_attr_e('Clean kitchen counter with useful home and kitchen tools', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-2xl object-cover" loading="lazy" decoding="async">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/About_productone.png'); ?>" alt="<?php esc_attr_e('Personal care items arranged on a bathroom vanity', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-2xl object-cover sm:mt-10" loading="lazy" decoding="async">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home/category-daily-tools.jpg'); ?>" alt="<?php esc_attr_e('Camera and tech accessories on a clean desk', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-2xl object-cover sm:col-span-2" loading="lazy" decoding="async">
            </div>

            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5BA8A0]"><?php esc_html_e('Focused Store Categories', 'dawp'); ?></p>
                <h2 id="about-categories-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('A clear gadget store, not a random marketplace.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#667085]">
                    <?php esc_html_e('MyBaapStore keeps its product direction focused on everyday gadgets and electronic-style tools that fit home routines, grooming, desk setups, camera use, travel, and daily convenience.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid gap-3">
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?php echo esc_url($category['url']); ?>" class="group rounded-2xl border border-[#E5E7EB] bg-[#F5F7FA] p-5 transition hover:border-[#2F80ED] hover:bg-[#EAF4FF]">
                            <h3 class="text-lg font-extrabold text-[#102A43] group-hover:text-[#2F80ED]"><?php echo esc_html($category['name']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#667085]"><?php echo esc_html($category['copy']); ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#EAF4FF] py-16 sm:py-20" aria-labelledby="about-gmc-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl bg-[#102A43] p-6 text-white shadow-xl shadow-[#102A43]/15 sm:p-8 lg:p-10">
                <div class="grid gap-8 lg:grid-cols-[0.78fr_1.22fr] lg:items-start">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#8FD4CD]"><?php esc_html_e('Responsible Product Communication', 'dawp'); ?></p>
                        <h2 id="about-gmc-title" class="mt-4 text-3xl font-extrabold leading-tight sm:text-4xl">
                            <?php esc_html_e('Clear boundaries for safer shopping.', 'dawp'); ?>
                        </h2>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <article class="rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="text-lg font-extrabold"><?php esc_html_e('Personal Care Devices', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-white/75">
                                <?php esc_html_e('Personal care products are presented for regular grooming and everyday care. We do not describe them as medical devices or make cure, treatment, or permanent-result claims.', 'dawp'); ?>
                            </p>
                        </article>
                        <article class="rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="text-lg font-extrabold"><?php esc_html_e('Camera & Tech Accessories', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-white/75">
                                <?php esc_html_e('Camera and tech products are positioned for normal uses such as video, desk setups, organization, and device support. We do not promote covert, privacy-invasive, or unlawful use.', 'dawp'); ?>
                            </p>
                        </article>
                        <article class="rounded-2xl border border-white/15 bg-white/10 p-5 md:col-span-2">
                            <h3 class="text-lg font-extrabold"><?php esc_html_e('What We Avoid', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-white/75">
                                <?php esc_html_e('The store avoids hidden surveillance positioning, weapons, counterfeit goods, adult products, supplements, medical-result claims, fake urgency, and exaggerated product promises.', 'dawp'); ?>
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20" aria-labelledby="about-care-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                    <h2 id="about-care-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('Transparent details before and after checkout.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('Our customer experience is designed around clear timelines, reachable support, and policy pages that explain shipping, returns, privacy, and website terms.', 'dawp'); ?>
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                            <?php echo esc_html($support_email); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] px-6 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                            <?php esc_html_e('Track Your Order', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid gap-5">
                    <?php foreach ($care_cards as $card) : ?>
                        <article class="rounded-2xl border border-[#E5E7EB] bg-[#F5F7FA] p-6">
                            <h3 class="text-lg font-extrabold text-[#102A43]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#667085]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($policy_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-2xl border border-[#E5E7EB] bg-white p-5 text-sm font-extrabold text-[#102A43] shadow-sm transition hover:-translate-y-1 hover:text-[#2F80ED] hover:shadow-xl hover:shadow-[#102A43]/10">
                        <?php echo esc_html($link['title']); ?>
                        <span class="ml-2 text-[#2F80ED]" aria-hidden="true">-&gt;</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
