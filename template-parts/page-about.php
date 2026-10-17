<?php
/**
 * About Us — MozTire
 */
$f = dawp_store_facts();

dawp_page_hero([
    'title'   => 'Tire shopping, without the guesswork.',
    'eyebrow' => 'About MozTire',
    'lead'    => 'MozTire is an online tire store for U.S. drivers. We built it around one idea: you should be able to find a tire that fits your vehicle, see every spec that matters, and get it delivered without surprises.',
    'image'   => 'assets/img/hero/about-hero.jpg',
    'crumb'   => 'About Us',
]);

$values = [
    ['title' => 'Specs up front', 'text' => 'Size, load index, speed rating, load range, season, sidewall and tread warranty are listed on every tire, so you can compare without digging.'],
    ['title' => 'Search the way you think', 'text' => 'Type the size from your sidewall, pick it from the finder, or start with a brand, season or vehicle type. Filters narrow it down from there.'],
    ['title' => 'Honest delivery', 'text' => 'Free ground shipping to the contiguous U.S., clear processing and transit times, and tracking on every package. Ship home or to your installer.'],
    ['title' => 'People who answer', 'text' => 'Real support by email ' . $f['hours'] . '. Send your vehicle and current size and we will help you shortlist tires that fit.'],
];
?>

<section class="py-14 md:py-20">
    <div class="mz-container grid gap-10 lg:grid-cols-2 lg:items-center">
        <div>
            <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">Why we exist</p>
            <h2 class="mt-2 mb-4 font-heading text-3xl font-black md:text-4xl">Buying tires shouldn&rsquo;t feel like decoding a secret language.</h2>
            <div class="mz-prose">
                <p>Most drivers only shop for tires every few years. By then, the numbers on the sidewall are a mystery and every store seems to use different terms. MozTire organizes every tire by the same global attributes, from width, aspect ratio and rim diameter to season, vehicle type and speed rating, so results are consistent no matter how you search.</p>
                <p>We focus on doing the online part well: accurate listings, a fast tire finder, secure checkout and dependable delivery. Installation is handled by the local shop of your choice, so you stay in control of where and when your tires go on.</p>
            </div>
        </div>
        <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2">
            <li class="rounded-lg bg-ink p-6 text-white">
                <strong class="block font-heading text-4xl font-black text-accent-blush">$0</strong>
                <span class="text-white/70">Ground shipping to the contiguous U.S.</span>
            </li>
            <li class="rounded-lg bg-ink p-6 text-white">
                <strong class="block font-heading text-4xl font-black text-accent-blush"><?php echo (int) $f['return_window']; ?> days</strong>
                <span class="text-white/70">To return new, unmounted tires</span>
            </li>
            <li class="rounded-lg bg-surface p-6">
                <strong class="block font-heading text-4xl font-black"><?php echo esc_html($f['processing']); ?></strong>
                <span class="text-foreground-muted">Business days to process</span>
            </li>
            <li class="rounded-lg bg-surface p-6">
                <strong class="block font-heading text-4xl font-black">15+</strong>
                <span class="text-foreground-muted">Tire attributes to filter by</span>
            </li>
        </ul>
    </div>
</section>

<section class="bg-surface py-14 md:py-20">
    <div class="mz-container">
        <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">What we stand for</p>
        <h2 class="mt-2 mb-10 font-heading text-3xl font-black md:text-4xl">How we run MozTire</h2>
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($values as $i => $value) : ?>
                <article class="rounded-lg border border-border bg-background p-6">
                    <span class="font-heading text-sm font-black text-accent"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
                    <h3 class="mt-2 mb-2 font-heading text-xl font-black"><?php echo esc_html($value['title']); ?></h3>
                    <p class="m-0 text-foreground-muted"><?php echo esc_html($value['text']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-14 md:py-20">
    <div class="mz-container grid gap-6 rounded-lg bg-ink p-8 text-white md:grid-cols-[1fr_auto] md:items-center md:p-12">
        <div>
            <h2 class="m-0 font-heading text-3xl font-black">Ready to find your next set?</h2>
            <p class="mt-2 mb-0 text-white/70">Start with your size, or browse by brand and season.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a class="mz-btn mz-btn--primary" href="<?php echo esc_url(home_url('/#find')); ?>">Find Tires by Size</a>
            <a class="mz-btn mz-btn--ghost" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a>
        </div>
    </div>
</section>
