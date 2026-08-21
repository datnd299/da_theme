<?php
/**
 * The Atelier — brand story, craft process, movement, people.
 */

defined('ABSPATH') || exit;
?>

<!-- ============================================================ HERO -->
<section class="border-b border-border bg-background" aria-labelledby="about-hero-title">
    <div class="container py-16 lg:py-28">
        <nav class="mb-10 flex items-center gap-2 text-caption text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a class="transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <span class="text-foreground"><?php esc_html_e('The Atelier', 'dawp'); ?></span>
        </nav>

        <div class="max-w-4xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Est. 2016 — United States', 'dawp'); ?></p>
            <h1 id="about-hero-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('We build watches slowly, because there is no other way to build them well.', 'dawp'); ?></h1>
            <p class="c-lede"><?php esc_html_e('CHRONEL is a small independent atelier. We do not run a production line. We carefully select the automatic movements we build around, and we spend our time on everything that surrounds them.', 'dawp'); ?></p>
        </div>

        <dl class="mt-16 grid grid-cols-2 gap-px border border-border bg-border lg:grid-cols-4">
            <?php
            $dawp_facts = [
                ['t' => __('Founded', 'dawp'), 'v' => __('2016', 'dawp')],
                ['t' => __('Watchmakers', 'dawp'), 'v' => __('Nine', 'dawp')],
                ['t' => __('Watches a year', 'dawp'), 'v' => __('Under 900', 'dawp')],
                ['t' => __('Assembled in', 'dawp'), 'v' => __('The USA', 'dawp')],
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
            <p class="c-eyebrow"><?php esc_html_e('The beginning', 'dawp'); ?></p>
            <h2 id="story-title" class="c-title"><?php esc_html_e('It started with a watch that could not be repaired.', 'dawp'); ?></h2>
        </div>

        <div class="space-y-6 text-body text-foreground-muted">
            <p class="m-0"><?php esc_html_e('Our founder inherited a mechanical watch that had stopped in 1994. Three shops refused it. The parts were gone, the maker was gone, and nobody had kept a record of how it had been put together. It was, in every sense, disposable.', 'dawp'); ?></p>
            <p class="m-0"><?php esc_html_e('That is the problem CHRONEL was set up to solve. We build watches that can be opened, understood, and repaired — by us, decades from now, from a register that lists every component in every serial we have ever shipped.', 'dawp'); ?></p>
            <p class="m-0"><?php esc_html_e('That is also why we source our movements rather than making our own. Each automatic calibre is carefully selected for a tolerance and a consistency that a workshop of our size could not match, and their parts will still be available long after we are.', 'dawp'); ?></p>
            <p class="m-0 border-l border-accent pl-6 font-heading text-h3 leading-snug text-foreground"><?php esc_html_e('A watch you cannot service is a watch you are only renting.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<!-- ============================================================ CRAFT -->
<section class="border-b border-border bg-surface-alt section-y" aria-labelledby="craft-title">
    <div class="container">
        <div class="mb-14 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('How it is made', 'dawp'); ?></p>
            <h2 id="craft-title" class="c-title"><?php esc_html_e('Six benches. One watch at a time.', 'dawp'); ?></h2>
        </div>

        <div class="grid items-center gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-20">
            <div class="border border-border bg-background">
                <img src="<?php echo esc_url(dawp_asset_uri('assets/img/atelier/workbench.jpeg')); ?>"
                     alt="<?php esc_attr_e('A watchmaker\'s bench with a loupe, tweezers, and a movement in its holder', 'dawp'); ?>"
                     width="1200" height="896" loading="lazy" decoding="async" class="w-full">
            </div>

            <ol class="m-0 list-none p-0">
                <?php
                $dawp_stages = [
                    ['n' => '01', 't' => __('Inspection', 'dawp'), 'd' => __('Every movement is opened and checked against its specification before anything else happens. Roughly one in forty is returned.', 'dawp')],
                    ['n' => '02', 't' => __('Case finishing', 'dawp'), 'd' => __('316L steel is brushed along the lug and polished on the bevel. Each surface is masked and worked separately, by hand.', 'dawp')],
                    ['n' => '03', 't' => __('Dial and hands', 'dawp'), 'd' => __('Indices are applied under a loupe. Hands are fitted, checked for clearance at every hour, and refitted if they are not perfect.', 'dawp')],
                    ['n' => '04', 't' => __('Regulation', 'dawp'), 'd' => __('The movement is timed in five positions over 72 hours. It stays on the machine until it holds its rate.', 'dawp')],
                    ['n' => '05', 't' => __('Sealing and testing', 'dawp'), 'd' => __('Gaskets are seated, the case back is torqued, and the watch is pressure tested to its rated depth.', 'dawp')],
                    ['n' => '06', 't' => __('The register', 'dawp'), 'd' => __('The serial is engraved and entered with a full component list, so the watch can be serviced correctly in thirty years.', 'dawp')],
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
            <p class="text-eyebrow font-medium uppercase tracking-wide text-accent"><?php esc_html_e('Calibre CH-01', 'dawp'); ?></p>
            <h2 id="about-movement-title" class="mt-4 font-heading text-h2 font-light leading-[1.05] text-on-ink"><?php esc_html_e('Why we choose our movement with care.', 'dawp'); ?></h2>

            <div class="mt-8 space-y-5 text-body-sm text-on-ink-muted">
                <p class="m-0"><?php esc_html_e('Building a mechanical calibre from nothing takes decades and a factory. Building one badly takes a year. We chose neither.', 'dawp'); ?></p>
                <p class="m-0"><?php esc_html_e('Our automatic movements are sourced from a manufacturer that has been producing them for over half a century. They arrive with a tolerance we could not better, and with a parts supply that will outlast the watch.', 'dawp'); ?></p>
                <p class="m-0"><?php esc_html_e('Everything after that is ours: inspection, regulation in five positions, casing, sealing, and the final 72-hour test. That is where a watch is actually made or ruined.', 'dawp'); ?></p>
            </div>

            <dl class="mt-10 grid grid-cols-2 gap-px border border-border-ink bg-border-ink sm:grid-cols-3">
                <?php
                $dawp_specs = [
                    ['t' => __('Type', 'dawp'), 'v' => __('Automatic', 'dawp')],
                    ['t' => __('Jewels', 'dawp'), 'v' => __('24', 'dawp')],
                    ['t' => __('Frequency', 'dawp'), 'v' => __('28,800 vph', 'dawp')],
                    ['t' => __('Power reserve', 'dawp'), 'v' => __('~40 hours', 'dawp')],
                    ['t' => __('Regulation', 'dawp'), 'v' => __('5 positions', 'dawp')],
                    ['t' => __('Test period', 'dawp'), 'v' => __('72 hours', 'dawp')],
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
                 alt="<?php esc_attr_e('The calibre CH-01, a carefully selected automatic movement', 'dawp'); ?>"
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
                ['t' => __('Serviceable forever', 'dawp'), 'd' => __('Every serial is recorded with its full component list. We service what we build, for as long as it exists.', 'dawp')],
                ['t' => __('No hidden quantities', 'dawp'), 'd' => __('A limited series states its number and closes. We do not reopen a run because it sold well.', 'dawp')],
                ['t' => __('One watchmaker per watch', 'dawp'), 'd' => __('The person who cases your movement is the person who signs its certificate.', 'dawp')],
                ['t' => __('Honest description', 'dawp'), 'd' => __('We state what a watch is, what is inside it, and where each part comes from. Nothing more.', 'dawp')],
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
                <h2 id="about-cta-title" class="c-title"><?php esc_html_e('Come and see what we made.', 'dawp'); ?></h2>
                <p class="c-lede"><?php esc_html_e('Four collections, all built on the same calibre.', 'dawp'); ?></p>
            </div>
            <div class="flex shrink-0 flex-wrap gap-4">
                <a class="c-btn" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('The collections', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</section>
