<?php
/**
 * Template Name: About Us
 * Template Part: page-about-us
 */

get_header();
?>

<main id="primary" class="bg-white text-slickText font-body">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28">
            <div class="max-w-3xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('About Slicktee', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Clean Apparel For Daily Rotation.', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Slicktee is a modern streetwear apparel brand built around graphic tees, oversized silhouettes, casual hoodies, and everyday essentials made for clean, confident styling.', 'dawp'); ?>
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-7 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                        <?php esc_html_e('Shop The Collection', 'dawp'); ?>
                    </a>

                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-3 shadow-2xl shadow-black/40">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/About_image.png'); ?>"
                         alt="<?php esc_attr_e('Slicktee modern streetwear apparel style', 'dawp'); ?>"
                         class="aspect-[4/5] w-full rounded-[1.35rem] object-cover">
                </div>

                <div class="absolute -bottom-7 -left-4 hidden max-w-[260px] rounded-2xl border border-white/10 bg-white p-5 text-slickText shadow-2xl lg:block">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-slickGreen">
                        <?php esc_html_e('Apparel First', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Graphic tees, relaxed fits, and essentials designed for everyday wear.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand Intro -->
    <section class="bg-slickSoft py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                    <?php esc_html_e('Who We Are', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em] text-slickText lg:text-6xl">
                    <?php esc_html_e('A modern graphic apparel brand without the noise.', 'dawp'); ?>
                </h2>
            </div>

            <div class="space-y-5 text-base leading-8 text-slickMuted">
                <p>
                    <?php esc_html_e('Slicktee was built for people who want clean graphic apparel that fits naturally into everyday life. Our focus is simple: wearable tees, relaxed silhouettes, comfortable hoodies, and streetwear essentials that feel easy to style.', 'dawp'); ?>
                </p>
                <p>
                    <?php esc_html_e('We are not here to create a random marketplace of loud novelty shirts. Slicktee is designed to feel like a focused apparel brand with consistent visuals, clean product presentation, and original streetwear direction.', 'dawp'); ?>
                </p>
                <p>
                    <?php esc_html_e('Every page, collection, and product experience is built around clear browsing, strong visuals, and a trustworthy ecommerce structure.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <!-- Brand Positioning Cards -->
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-10 max-w-3xl">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                    <?php esc_html_e('Brand Direction', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText lg:text-5xl">
                    <?php esc_html_e('Built For Clean Streetwear Energy.', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-7 text-slickMuted">
                    <?php esc_html_e('Slicktee keeps the product experience focused, modern, and apparel-native.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">
                        01
                    </div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('Graphic Tees', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Clean graphic apparel made for daily outfits, not one-time novelty wear.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">
                        02
                    </div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('Relaxed Fits', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Oversized silhouettes and casual shapes that feel modern, easy, and wearable.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">
                        03
                    </div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('Streetwear Basics', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Everyday essentials made for layering, rotating, and styling without effort.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">
                        04
                    </div>
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('Clear Shopping', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Focused categories, clean product cards, and transparent customer policies.', 'dawp'); ?>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Image + Philosophy Section -->
    <section class="bg-slickBlack py-16 text-white lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">

            <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-3">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/about_image%233.png'); ?>"
                     alt="<?php esc_attr_e('Urban streetwear outfit and apparel styling', 'dawp'); ?>"
                     class="aspect-[4/3] w-full rounded-2xl object-cover">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Our Apparel Philosophy', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em] lg:text-6xl">
                    <?php esc_html_e('Wearable first. Graphic second. Always clean.', 'dawp'); ?>
                </h2>

                <div class="mt-6 space-y-5 text-base leading-8 text-white/82">
                    <p>
                        <?php esc_html_e('We believe graphic apparel should be easy to wear, not hard to style. Every collection should feel intentional, clean, and useful for real outfits.', 'dawp'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('That means strong product imagery, consistent fits, clear categories, and graphics that support the look instead of overpowering it.', 'dawp'); ?>
                    </p>
                </div>

                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                        <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                            <?php esc_html_e('No Random Marketplace Feel', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm leading-6 text-white/70">
                            <?php esc_html_e('Focused apparel only.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                        <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                            <?php esc_html_e('No Copyright Noise', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm leading-6 text-white/70">
                            <?php esc_html_e('Original, brand-led direction.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- What We Avoid -->
    <section class="bg-slickSoft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-10 max-w-3xl">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                    <?php esc_html_e('Why Slicktee Feels Different', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText lg:text-5xl">
                    <?php esc_html_e('Not a POD spam store. Not a meme marketplace.', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-7 text-slickMuted">
                    <?php esc_html_e('The brand is built to feel focused, original, and apparel-native.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('We Avoid', 'dawp'); ?>
                    </p>
                    <h3 class="font-heading text-3xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Copyright-Heavy Graphics', 'dawp'); ?>
                    </h3>
                    <p class="mt-4 text-sm leading-7 text-slickMuted">
                        <?php esc_html_e('Slicktee is designed around clean original presentation, not celebrity images, anime references, fan merch, or trademarked designs.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('We Avoid', 'dawp'); ?>
                    </p>
                    <h3 class="font-heading text-3xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Overcrowded Product Walls', 'dawp'); ?>
                    </h3>
                    <p class="mt-4 text-sm leading-7 text-slickMuted">
                        <?php esc_html_e('Collections should feel curated and easy to browse, not like a marketplace filled with random shirt uploads.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('We Avoid', 'dawp'); ?>
                    </p>
                    <h3 class="font-heading text-3xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Fake Urgency Tactics', 'dawp'); ?>
                    </h3>
                    <p class="mt-4 text-sm leading-7 text-slickMuted">
                        <?php esc_html_e('No fake countdowns, exaggerated claims, or pressure-heavy shopping patterns. The experience should feel confident and clear.', 'dawp'); ?>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Trust / Values -->
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Customer Trust', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText lg:text-5xl">
                        <?php esc_html_e('Clear policies. Clean shopping. Real apparel focus.', 'dawp'); ?>
                    </h2>
                </div>

                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                   class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                    <?php esc_html_e('View Policies', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('A clear checkout flow designed for trustworthy ecommerce shopping.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('Tracking Included', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Customers receive tracking details once an order ships.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Eligible unworn and unwashed items may be returned within 30 days.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                        <?php esc_html_e('Support Available', 'dawp'); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-slickMuted">
                        <?php esc_html_e('Contact support for order, shipping, product, or return questions.', 'dawp'); ?>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="overflow-hidden bg-slickBlack text-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8 lg:py-24">

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Start Your Rotation', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em] lg:text-6xl">
                    <?php esc_html_e('Find your next everyday fit.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                    <?php esc_html_e('Explore graphic tees, oversized staples, hoodies, and streetwear essentials made for clean daily styling.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                        <?php esc_html_e('Shop Now', 'dawp'); ?>
                    </a>

                    <a href="<?php echo esc_url(home_url('/product-category/graphic-tees/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
                        <?php esc_html_e('Graphic Tees', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-3">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/about_image%232.png'); ?>"
                     alt="<?php esc_attr_e('Slicktee everyday streetwear apparel collection', 'dawp'); ?>"
                     class="aspect-[4/3] w-full rounded-2xl object-cover opacity-90">
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
