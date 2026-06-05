<?php
/**
 * Template Part: About Us
 */

$theme_uri                = get_template_directory_uri();
$hero_image               = $theme_uri . '/assets/img/toyocartv/toyocartv-hero.png';
$accessory_image          = $theme_uri . '/assets/img/toyocartv/toyocartv-accessories.png';
?>

<section class="bg-white">
    <div class="relative min-h-[520px] overflow-hidden bg-[#080808]">
        <?php
        echo dawp_responsive_image($hero_image, [
            'alt'             => __('Truck and SUV accessory lifestyle scene', 'dawp'),
            'class'           => 'absolute inset-0 h-full w-full object-cover opacity-55',
            'width'           => 1672,
            'height'          => 941,
            'srcset_widths'   => [480, 768, 1180, 1440, 1672],
            'sizes'           => '100vw',
            'loading'         => 'eager',
            'fetchpriority'   => 'high',
        ]);
        ?>
        <div class="absolute inset-0 bg-gradient-to-r from-[#080808] via-[#080808]/85 to-[#080808]/35"></div>
        <div class="relative mx-auto flex min-h-[520px] w-[min(100%-32px,1180px)] items-center py-20">
            <div class="max-w-3xl">
                <span class="mb-5 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('About ToyocarTV', 'dawp'); ?></span>
                <h1 class="font-heading text-5xl font-black uppercase leading-none text-white md:text-7xl">
                    <?php esc_html_e('Built For Truck And SUV Accessory Shoppers', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/80">
                    <?php esc_html_e('ToyocarTV is an independent auto accessories store built for drivers who want practical interior, exterior, and lifestyle accessories organized by vehicle collection.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </div>

    <div class="mx-auto w-[min(100%-32px,1180px)] py-16 lg:py-20">
        <div class="grid gap-10 lg:grid-cols-[1fr_0.85fr] lg:items-center">
            <div>
                <span class="mb-4 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Independent Store', 'dawp'); ?></span>
                <h2 class="font-heading text-4xl font-black uppercase leading-tight text-[#111827] md:text-5xl">
                    <?php esc_html_e('Practical parts, clear collections, no official-brand claims.', 'dawp'); ?>
                </h2>
                <div class="mt-6 space-y-5 text-base leading-8 text-[#6B7280]">
                    <p><?php esc_html_e('The store is organized around Tacoma, 4Runner, FJ Cruiser, and Tundra-style collections so customers can start with the vehicle style they shop for, then review each product page before ordering.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Our focus is everyday usefulness: cabin organization, storage, protective exterior details, small garage accessories, and driver lifestyle merch that makes shopping straightforward.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Vehicle model names are used only to describe compatible-style shopping collections. Product details, dimensions, materials, and installation notes should always be checked before purchase.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="rounded-2xl border border-[#E5E7EB] bg-[#F7F8FA] p-5 shadow-card">
                <?php
                echo dawp_responsive_image($accessory_image, [
                    'alt'           => __('Auto accessories product scene', 'dawp'),
                    'class'         => 'aspect-[4/3] w-full rounded-xl object-cover',
                    'width'         => 920,
                    'height'        => 690,
                    'srcset_widths' => [360, 560, 768, 920],
                    'sizes'         => '(max-width: 1023px) calc(100vw - 32px), 520px',
                    'loading'       => 'lazy',
                ]);
                ?>
                <div class="mt-5 grid grid-cols-2 gap-3 text-sm">
                    <div class="rounded-lg bg-white p-4">
                        <strong class="block text-[#111827]"><?php esc_html_e('Interior', 'dawp'); ?></strong>
                        <span class="text-[#6B7280]"><?php esc_html_e('Organizers and daily-use upgrades', 'dawp'); ?></span>
                    </div>
                    <div class="rounded-lg bg-white p-4">
                        <strong class="block text-[#111827]"><?php esc_html_e('Exterior', 'dawp'); ?></strong>
                        <span class="text-[#6B7280]"><?php esc_html_e('Simple add-ons and protection', 'dawp'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#F7F8FA] py-16 lg:py-20">
        <div class="mx-auto w-[min(100%-32px,1180px)]">
            <div class="mb-10 max-w-2xl">
                <span class="mb-4 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('How We Work', 'dawp'); ?></span>
                <h2 class="font-heading text-4xl font-black uppercase text-[#111827]"><?php esc_html_e('Clear shopping, practical support.', 'dawp'); ?></h2>
            </div>
            <div class="-mx-4 grid grid-flow-col grid-cols-none auto-cols-[minmax(260px,86%)] gap-5 overflow-x-auto px-4 pb-5 scroll-px-4 snap-x snap-mandatory md:mx-0 md:grid-flow-row md:grid-cols-2 md:overflow-visible md:px-0 md:pb-0 lg:grid-cols-4">
                <?php
                $values = [
                    ['Clear Collections', 'Shop by vehicle collection or by use: interior, exterior, and driver lifestyle merch.'],
                    ['Compatibility Notes', 'Review product details and fitment notes before ordering any compatible-style item.'],
                    ['Tracking Included', 'Tracking details are provided once your order ships.'],
                    ['30-Day Returns', 'Eligible unused, uninstalled items may be returned within 30 days of delivery.'],
                ];
                foreach ($values as $value) :
                ?>
                    <article class="snap-start rounded-xl border border-[#E5E7EB] bg-white p-6">
                        <div class="mb-5 h-1 w-12 bg-[#D71920]"></div>
                        <h3 class="text-lg font-black text-[#111827]"><?php echo esc_html($value[0]); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($value[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="mx-auto w-[min(100%-32px,1180px)] py-16 lg:py-20">
        <div class="rounded-2xl bg-[#080808] p-8 text-white lg:p-12">
            <div class="grid gap-8 lg:grid-cols-[1fr_320px] lg:items-center">
                <div>
                    <span class="mb-4 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Important Disclaimer', 'dawp'); ?></span>
                    <h2 class="font-heading text-3xl font-black uppercase md:text-4xl"><?php esc_html_e('Independent auto accessories store.', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-white/72">
                        <?php esc_html_e('ToyocarTV is an independent auto accessories store and is not affiliated with, endorsed by, or sponsored by Toyota Motor Corporation or any vehicle manufacturer. Vehicle model names are used only to help customers identify compatible-style product collections.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-[#D71920] px-6 text-sm font-black uppercase text-white hover:bg-[#A70F14]">
                    <?php esc_html_e('Shop Accessories', 'dawp'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
