<?php
/**
 * About Us — who we are, how we choose, the movement, what we hold to.
 */

defined('ABSPATH') || exit;
?>

<!-- ============================================================ HERO -->
<section class="border-b border-border bg-background" aria-labelledby="about-hero-title">
    <div class="container py-16 lg:py-28">
        <nav class="mb-10 flex items-center gap-2 text-caption text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a class="transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <span class="text-foreground"><?php esc_html_e('About Us', 'dawp'); ?></span>
        </nav>

        <div class="max-w-4xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Independent watch store — United States', 'dawp'); ?></p>
            <h1 id="about-hero-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('Fewer watches, chosen with care.', 'dawp'); ?></h1>
            <p class="c-lede"><?php esc_html_e('CHRONEL is an independent online watch store. We do not make watches. We choose them — a short list of dress, dive, statement, and pilot watches from established makers, each described plainly so you know exactly what you are buying.', 'dawp'); ?></p>
        </div>

        <dl class="mt-16 grid grid-cols-2 gap-px border border-border bg-border lg:grid-cols-4">
            <?php
            $dawp_facts = [
                ['t' => __('Collections', 'dawp'), 'v' => __('Four', 'dawp')],
                ['t' => __('Warranty', 'dawp'), 'v' => __('5 years', 'dawp')],
                ['t' => __('Returns', 'dawp'), 'v' => __('30 days', 'dawp')],
                ['t' => __('Ships to', 'dawp'), 'v' => __('The USA', 'dawp')],
            ];
            foreach ($dawp_facts as $fact) : ?>
                <div class="bg-background p-6 lg:p-8">
                    <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php echo esc_html($fact['t']); ?></dt>
                    <dd class="m-0 mt-3 font-heading text-h2 font-light leading-none text-foreground"><?php echo esc_html($fact['v']); ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </div>
</section>

<!-- ============================================================ STORY -->
<section class="border-b border-border bg-background section-y" aria-labelledby="story-title">
    <div class="container grid items-start gap-12 lg:grid-cols-2 lg:gap-24">
        <div>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Why we started', 'dawp'); ?></p>
            <h2 id="story-title" class="c-title"><?php esc_html_e('Buying a watch online should not be guesswork.', 'dawp'); ?></h2>
        </div>

        <div class="space-y-6 text-body text-foreground-muted">
            <p class="m-0"><?php esc_html_e('Most watch listings say too much about how a watch feels and too little about what it is. Case size buried in a footnote. Movement type left out. Water resistance rounded up.', 'dawp'); ?></p>
            <p class="m-0"><?php esc_html_e('CHRONEL keeps a smaller catalogue so each watch can be described properly. Brand, movement type, case size, materials, and water resistance are stated on every product page, as supplied by the maker.', 'dawp'); ?></p>
            <p class="m-0"><?php esc_html_e('What we carry is sorted into four collections by how a watch is worn — not by price, and not by hype — so it is easier to find the one that fits your day.', 'dawp'); ?></p>
            <p class="m-0 border-l border-accent pl-6 font-heading text-h3 leading-snug text-foreground"><?php esc_html_e('Know what you are buying before you buy it.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<!-- ============================================================ CRAFT -->
<section class="border-b border-border bg-surface-alt section-y" aria-labelledby="craft-title">
    <div class="container">
        <div class="mb-14 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('How we choose', 'dawp'); ?></p>
            <h2 id="craft-title" class="c-title"><?php esc_html_e('Five questions before a watch is listed.', 'dawp'); ?></h2>
        </div>

        <div class="grid items-center gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-20">
            <div class="border border-border bg-background">
                <img src="<?php echo esc_url(dawp_asset_uri('assets/img/atelier/workbench.jpeg')); ?>"
                     alt="<?php esc_attr_e('A loupe and watch tools on a bench', 'dawp'); ?>"
                     width="1200" height="896" loading="lazy" decoding="async" class="w-full">
            </div>

            <ol class="m-0 list-none p-0">
                <?php
                $dawp_stages = [
                    ['n' => '01', 't' => __('Design', 'dawp'), 'd' => __('Does it look right, and will it still look right in ten years? We pass on anything built around a trend.', 'dawp')],
                    ['n' => '02', 't' => __('Build', 'dawp'), 'd' => __('Case, crystal, and bracelet have to suit the way the watch will be worn. A dive-style watch that cannot go near water is not a dive watch.', 'dawp')],
                    ['n' => '03', 't' => __('Movement', 'dawp'), 'd' => __('Automatic, mechanical, or quartz — the type is stated on the product page. We do not blur the difference.', 'dawp')],
                    ['n' => '04', 't' => __('Value', 'dawp'), 'd' => __('The price has to make sense for what the watch is. If it does not, we do not carry it.', 'dawp')],
                    ['n' => '05', 't' => __('Description', 'dawp'), 'd' => __('Brand, movement type, case size, materials, and water resistance are listed before the watch goes on sale.', 'dawp')],
                ];
                foreach ($dawp_stages as $stage) : ?>
                    <li class="flex gap-6 border-t border-border py-6 last:border-b">
                        <span class="shrink-0 font-heading text-h3 text-accent"><?php echo esc_html($stage['n']); ?></span>
                        <span>
                            <span class="block text-body text-foreground"><?php echo esc_html($stage['t']); ?></span>
                            <span class="mt-1 block text-body-sm text-foreground-muted"><?php echo esc_html($stage['d']); ?></span>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</section>

<!-- ============================================================ MOVEMENT (deep section) -->
<section id="movement" class="bg-ink text-on-ink section-y" aria-labelledby="about-movement-title">
    <div class="container grid items-center gap-14 lg:grid-cols-[1.1fr_0.9fr] lg:gap-24">
        <div>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="text-eyebrow font-medium uppercase tracking-wide text-accent"><?php esc_html_e('The movement', 'dawp'); ?></p>
            <h2 id="about-movement-title" class="mt-4 font-heading text-h2 font-light leading-[1.05] text-on-ink"><?php esc_html_e('Know what is inside.', 'dawp'); ?></h2>

            <div class="mt-8 space-y-5 text-body-sm text-on-ink-muted">
                <p class="m-0"><?php esc_html_e('A watch\'s movement decides how it is powered, how accurate it is, and how it should be cared for. The three main types wear very differently.', 'dawp'); ?></p>
                <p class="m-0"><?php esc_html_e('Automatic and mechanical watches run on a spring — an automatic winds from the motion of your wrist, a mechanical by the crown. Quartz watches run on a battery and are generally the most accurate. Neither is better; they suit different owners.', 'dawp'); ?></p>
                <p class="m-0"><?php esc_html_e('The movement type of every watch we sell is stated on its product page, along with the maker\'s specifications.', 'dawp'); ?></p>
            </div>

            <dl class="mt-10 grid grid-cols-2 gap-px border border-border-ink bg-border-ink sm:grid-cols-3">
                <?php
                $dawp_specs = [
                    ['t' => __('Automatic', 'dawp'), 'v' => __('Self-winding', 'dawp')],
                    ['t' => __('Mechanical', 'dawp'), 'v' => __('Hand-wound', 'dawp')],
                    ['t' => __('Quartz', 'dawp'), 'v' => __('Battery', 'dawp')],
                    ['t' => __('Case size', 'dawp'), 'v' => __('Per model', 'dawp')],
                    ['t' => __('Crystal', 'dawp'), 'v' => __('Per model', 'dawp')],
                    ['t' => __('Water resistance', 'dawp'), 'v' => __('Per model', 'dawp')],
                ];
                foreach ($dawp_specs as $spec) : ?>
                    <div class="bg-ink p-5">
                        <dt class="text-eyebrow uppercase tracking-wide text-on-ink-muted"><?php echo esc_html($spec['t']); ?></dt>
                        <dd class="m-0 mt-2 font-heading text-h3 text-on-ink"><?php echo esc_html($spec['v']); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>

        <div>
            <img src="<?php echo esc_url(dawp_asset_uri('assets/img/atelier/movement.jpeg')); ?>"
                 alt="<?php esc_attr_e('An automatic watch movement', 'dawp'); ?>"
                 width="1024" height="1024" loading="lazy" decoding="async"
                 class="mx-auto w-full max-w-[420px]">
        </div>
    </div>
</section>

<!-- ============================================================ PRINCIPLES -->
<section class="border-b border-border bg-background section-y" aria-labelledby="principles-title">
    <div class="container">
        <div class="mb-14 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('What we hold to', 'dawp'); ?></p>
            <h2 id="principles-title" class="c-title"><?php esc_html_e('Four rules we do not bend.', 'dawp'); ?></h2>
        </div>

        <ul class="m-0 grid list-none grid-cols-1 gap-px border border-border bg-border p-0 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $dawp_principles = [
                ['t' => __('Plain descriptions', 'dawp'), 'd' => __('We state what a watch is, who makes it, and what is inside. Nothing more.', 'dawp')],
                ['t' => __('No invented claims', 'dawp'), 'd' => __('No borrowed heritage and no hype. If we do not know something about a watch, we do not claim it.', 'dawp')],
                ['t' => __('Clear policies', 'dawp'), 'd' => __('Warranty, delivery, and returns are written out in full and linked from every page.', 'dawp')],
                ['t' => __('Real answers', 'dawp'), 'd' => __('Questions about size, fit, or a specific model go to client care and are answered within one business day.', 'dawp')],
            ];
            foreach ($dawp_principles as $principle) : ?>
                <li class="bg-background p-8">
                    <span class="block h-px w-8 bg-accent" aria-hidden="true"></span>
                    <span class="mt-6 block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($principle['t']); ?></span>
                    <span class="mt-3 block text-body-sm text-foreground-muted"><?php echo esc_html($principle['d']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- ============================================================ CTA -->
<section class="bg-background pb-20 lg:pb-32" aria-labelledby="about-cta-title">
    <div class="container">
        <div class="grid items-center gap-10 border border-border bg-surface-alt p-10 lg:grid-cols-[1fr_auto] lg:gap-16 lg:p-20">
            <div class="max-w-2xl">
                <span class="c-rule" aria-hidden="true"></span>
                <h2 id="about-cta-title" class="c-title"><?php esc_html_e('See what we carry.', 'dawp'); ?></h2>
                <p class="c-lede"><?php esc_html_e('Four collections, sorted by how a watch is worn.', 'dawp'); ?></p>
            </div>
            <div class="flex shrink-0 flex-wrap gap-4">
                <a class="c-btn" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('The collections', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</section>
