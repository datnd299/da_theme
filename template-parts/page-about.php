<?php
/**
 * About Us template part.
 *
 * @package dawp
 */

$theme_uri = get_template_directory_uri();
$hero_img  = $theme_uri . '/assets/img/elite/home-lifestyle-hero.png';

$values = [
    [
        'number' => '01',
        'title'  => __('Practical Product Focus', 'dawp'),
        'copy'   => __('We focus on useful home, personal care, accessory, lifestyle, and giftable products that are easy to understand and simple to shop.', 'dawp'),
        'color'  => '#2563EB',
    ],
    [
        'number' => '02',
        'title'  => __('Organized Categories', 'dawp'),
        'copy'   => __('Our categories are built to help customers browse with clarity instead of sorting through an unfocused marketplace.', 'dawp'),
        'color'  => '#06B6D4',
    ],
    [
        'number' => '03',
        'title'  => __('Clear Product Details', 'dawp'),
        'copy'   => __('Product pages are written around everyday use, included details, care notes where relevant, and straightforward expectations.', 'dawp'),
        'color'  => '#C026D3',
    ],
    [
        'number' => '04',
        'title'  => __('Transparent Support', 'dawp'),
        'copy'   => __('Customers can reach us by email for order, shipping, return, product, and account questions during business hours.', 'dawp'),
        'color'  => '#65A30D',
    ],
];

$categories = [
    __('Home essentials for simple daily routines', 'dawp'),
    __('Beauty and personal care accessories without medical claims', 'dawp'),
    __('Fashion accessories made for everyday style', 'dawp'),
    __('Lifestyle accessories for travel, desk, and organization needs', 'dawp'),
    __('Giftable finds selected for practical everyday use', 'dawp'),
];
?>

<div class="bg-white font-body text-[#101828]">
    <section class="relative isolate overflow-hidden bg-gradient-to-b from-white via-[#F8FBFF] to-white py-16 lg:py-24">
        <div class="pointer-events-none absolute inset-x-6 top-14 -z-10 h-36 rounded-[2rem] bg-[#2563EB]/8 blur-3xl lg:inset-x-24 lg:top-20"></div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 rounded-[2rem] border border-[#E5E7EB] bg-white/95 p-5 shadow-[0_24px_80px_rgba(16,24,40,0.12)] sm:p-8 lg:grid-cols-[0.9fr_1.1fr] lg:gap-10 lg:p-10">
                <div class="rounded-[1.5rem] border border-[#DBEAFE] bg-gradient-to-br from-white to-[#EFF6FF] p-6 shadow-[0_18px_45px_rgba(37,99,235,0.14)] lg:self-start lg:p-8">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('Who We Are', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] drop-shadow-[0_8px_18px_rgba(16,24,40,0.12)] lg:text-4xl">
                        <?php esc_html_e('A focused lifestyle store, not a random marketplace.', 'dawp'); ?>
                    </h2>
                    <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                        <div class="border border-[#DBEAFE] bg-white/75 px-4 py-3">
                            <p class="text-lg font-black text-[#2563EB]"><?php esc_html_e('5', 'dawp'); ?></p>
                            <p class="mt-1 text-xs font-bold uppercase leading-5 tracking-wide text-[#475467]"><?php esc_html_e('Core Categories', 'dawp'); ?></p>
                        </div>
                        <div class="border border-[#DBEAFE] bg-white/75 px-4 py-3">
                            <p class="text-lg font-black text-[#06B6D4]"><?php esc_html_e('US', 'dawp'); ?></p>
                            <p class="mt-1 text-xs font-bold uppercase leading-5 tracking-wide text-[#475467]"><?php esc_html_e('Customer Focus', 'dawp'); ?></p>
                        </div>
                        <div class="border border-[#DBEAFE] bg-white/75 px-4 py-3">
                            <p class="text-lg font-black text-[#65A30D]"><?php esc_html_e('Clear', 'dawp'); ?></p>
                            <p class="mt-1 text-xs font-bold uppercase leading-5 tracking-wide text-[#475467]"><?php esc_html_e('Support Details', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="space-y-5 rounded-[1.5rem] border border-[#EEF2F7] bg-white p-6 text-base leading-8 text-[#475467] shadow-[0_16px_50px_rgba(16,24,40,0.08)] lg:p-8">
                    <p><?php esc_html_e('We built Meridova for customers who want practical everyday products presented in a clear, organized way. Our store covers daily-use categories such as home essentials, beauty and personal care accessories, fashion accessories, lifestyle accessories, and giftable finds.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Our goal is to make product discovery straightforward. We avoid exaggerated claims, fake urgency, counterfeit branding, and confusing product listings. Customers should be able to understand what an item is, how it may fit into daily routines, and where to find help if they need it.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Meridova serves customers in the United States with clear support information, order tracking after shipment, and transparent shipping and return expectations.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F3F7FB] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 max-w-3xl">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#06B6D4]"><?php esc_html_e('What Guides Us', 'dawp'); ?></p>
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Simple standards for a trustworthy shopping experience.', 'dawp'); ?>
                </h2>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($values as $value) : ?>
                    <article class="border border-[#E5E7EB] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full text-sm font-black text-white" style="background-color: <?php echo esc_attr($value['color']); ?>">
                            <?php echo esc_html($value['number']); ?>
                        </div>
                        <h3 class="font-heading text-xl font-black uppercase leading-tight text-[#101828]">
                            <?php echo esc_html($value['title']); ?>
                        </h3>
                        <p class="mt-3 text-sm leading-6 text-[#475467]">
                            <?php echo esc_html($value['copy']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
            <div class="overflow-hidden rounded-[2rem] bg-[#EEF2FF] p-3 shadow-xl shadow-[#101828]/10">
                <img src="<?php echo esc_url($hero_img); ?>"
                     alt="<?php esc_attr_e('Everyday lifestyle products arranged for simple home and personal routines', 'dawp'); ?>"
                     class="aspect-[4/5] w-full rounded-[1.35rem] object-cover sm:aspect-[5/4] lg:aspect-[4/5]">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('Product Direction', 'dawp'); ?></p>
                <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Useful categories for home, care, style, and gifting.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475467]">
                    <?php esc_html_e('Our assortment is intentionally mainstream and everyday-friendly. We do not position products as medical treatments, miracle solutions, luxury replicas, restricted goods, or unsupported branded items.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid grid-cols-1 gap-3">
                    <?php foreach ($categories as $category) : ?>
                        <div class="border-l-4 border-[#2563EB] bg-[#F8FAFC] px-5 py-4">
                            <p class="font-bold text-[#101828]"><?php echo esc_html($category); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

</div>
