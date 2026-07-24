<?php
/**
 * Template Part: About Us
 */
$theme_uri = get_template_directory_uri();
?>

<section class="bg-white">
    <div class="relative min-h-[520px] overflow-hidden bg-white bg-cover bg-center" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/img/banner.jpeg'); ?>');">
        <div class="absolute inset-0" style="background: radial-gradient(1100px 620px at 82% 18%, rgba(215,25,32,.12), transparent 60%), linear-gradient(100deg, rgba(255,255,255,.82) 0%, rgba(255,255,255,.5) 34%, rgba(255,255,255,.16) 58%, rgba(255,255,255,0) 82%);"></div>
        <div class="relative mx-auto flex min-h-[520px] w-[min(100%-32px,1180px)] items-center py-20">
            <div class="max-w-3xl">
                <span class="mb-5 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('About Shopmivo', 'dawp'); ?></span>
                <h1 class="font-heading text-5xl font-black uppercase leading-none text-[#111827] md:text-7xl">
                    <?php esc_html_e('Built For Everyday, One-Stop Shoppers', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#6B7280]">
                    <?php esc_html_e('Shopmivo is an independent general merchandise store built for households who want tools, houseware, vehicle service essentials, gifts and toys, pet supplies, and clothing — all in one place.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </div>

    <div class="mx-auto w-[min(100%-32px,1180px)] py-16 lg:py-20">
        <div class="grid gap-10 lg:grid-cols-[1fr_0.85fr] lg:items-center">
            <div>
                <span class="mb-4 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Independent Store', 'dawp'); ?></span>
                <h2 class="font-heading text-4xl font-black uppercase leading-tight text-[#111827] md:text-5xl">
                    <?php esc_html_e('One catalog, six categories, no official-brand claims.', 'dawp'); ?>
                </h2>
                <div class="mt-6 space-y-5 text-base leading-8 text-[#6B7280]">
                    <p><?php esc_html_e('The store is organized around six main categories — Tools, Houseware, Vehicle Service, Gift and Toy, Pet Supplies, and Clothing and Accessories — so customers can start with the category they need, then review each product page before ordering.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Our focus is everyday usefulness: practical tools, household essentials, simple vehicle care, gift-ready picks, pet care items, and everyday apparel that makes shopping straightforward.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Product details, dimensions, materials, and included items should always be checked on the product page before purchase.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="rounded-2xl border border-[#E5E7EB] bg-[#F7F8FA] p-5 shadow-card">
                <div class="aspect-[4/3] w-full rounded-xl border border-[#E5E7EB] bg-cover bg-center" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/img/home-garage-essentials.jpeg'); ?>');"></div>
                <div class="mt-5 grid grid-cols-2 gap-3 text-sm">
                    <div class="rounded-lg bg-white p-4">
                        <strong class="block text-[#111827]"><?php esc_html_e('Tools & Houseware', 'dawp'); ?></strong>
                        <span class="text-[#6B7280]"><?php esc_html_e('Everyday home and garage essentials', 'dawp'); ?></span>
                    </div>
                    <div class="rounded-lg bg-white p-4">
                        <strong class="block text-[#111827]"><?php esc_html_e('Gifts & Pet Supplies', 'dawp'); ?></strong>
                        <span class="text-[#6B7280]"><?php esc_html_e('Easy picks for family and pets', 'dawp'); ?></span>
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
                    ['Clear Categories', 'Shop by category or by need: home & garage, gifts & toys, or pet care.'],
                    ['Everyday Low Prices', 'Review product details and pricing before ordering any item.'],
                    ['Tracking Included', 'Tracking details are provided once your order ships.'],
                    ['30-Day Returns', 'Eligible unused items may be returned within 30 days of delivery.'],
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
        <div class="rounded-2xl border border-[#E5E7EB] bg-[#F7F8FA] p-8 text-[#111827] lg:p-12">
            <div class="grid gap-8 lg:grid-cols-[1fr_320px] lg:items-center">
                <div>
                    <span class="mb-4 inline-flex text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Important Disclaimer', 'dawp'); ?></span>
                    <h2 class="font-heading text-3xl font-black uppercase md:text-4xl"><?php esc_html_e('Independent general merchandise store.', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#6B7280]">
                        <?php esc_html_e('Shopmivo is an independent general merchandise store and is not affiliated with, endorsed by, or sponsored by Walmart Inc. or any other retailer.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-[#D71920] px-6 text-sm font-black uppercase text-white hover:bg-[#A70F14]">
                    <?php esc_html_e('Shop All Categories', 'dawp'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
