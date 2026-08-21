<?php
/**
 * Bespoke page — presents the commission service and ends in an enquiry form.
 * There is deliberately no configurator: see .plans/site.md §3.1.
 */

defined('ABSPATH') || exit;

$dawp_collections = dawp_collections();
?>

<!-- ============================================================ HERO -->
<section class="border-b border-border bg-background" aria-labelledby="custom-hero-title">
    <div class="container grid items-center gap-12 py-16 lg:grid-cols-[1.1fr_0.9fr] lg:gap-20 lg:py-28">
        <div>
            <nav class="mb-10 flex items-center gap-2 text-caption text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                <a class="transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span class="text-foreground"><?php esc_html_e('Bespoke', 'dawp'); ?></span>
            </nav>

            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Bespoke commission', 'dawp'); ?></p>
            <h1 id="custom-hero-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('One watch. Yours alone.', 'dawp'); ?></h1>
            <p class="c-lede"><?php esc_html_e('A commission is a conversation before it is a watch. You tell us how it will be worn; we draw it, quote it, and build it. Twelve weeks from the moment the specification is agreed.', 'dawp'); ?></p>

            <div class="mt-10 flex flex-wrap gap-4">
                <a class="c-btn" href="#enquiry"><?php esc_html_e('Begin an enquiry', 'dawp'); ?></a>
                <a class="c-btn-ghost" href="<?php echo esc_url(home_url('/collections/')); ?>"><?php esc_html_e('See the collections', 'dawp'); ?></a>
            </div>
        </div>

        <div class="border border-border bg-surface-alt">
            <img src="<?php echo esc_url(dawp_asset_uri('assets/img/atelier/workbench.jpeg')); ?>"
                 alt="<?php esc_attr_e('A watchmaker\'s bench with a loupe over a movement in its holder', 'dawp'); ?>"
                 width="1200" height="896" fetchpriority="high" decoding="async" class="w-full">
        </div>
    </div>
</section>

<!-- ============================================================ PROCESS -->
<section class="border-b border-border bg-surface-alt section-y" aria-labelledby="process-title">
    <div class="container">
        <div class="mb-14 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('The process', 'dawp'); ?></p>
            <h2 id="process-title" class="c-title"><?php esc_html_e('Four stages, twelve weeks.', 'dawp'); ?></h2>
        </div>

        <ol class="m-0 grid list-none grid-cols-1 gap-px border border-border bg-border p-0 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $dawp_steps = [
                [
                    'n' => '01',
                    't' => __('The conversation', 'dawp'),
                    'w' => __('Week 1', 'dawp'),
                    'd' => __('You send an enquiry. A specialist replies within two business days to understand how the watch will be worn, your wrist size, and what you want it to say.', 'dawp'),
                ],
                [
                    'n' => '02',
                    't' => __('The drawing', 'dawp'),
                    'w' => __('Weeks 2–3', 'dawp'),
                    'd' => __('We return a rendered specification: case, bezel, dial, hands, bracelet, and engraving, with a fixed quotation. Two revisions are included.', 'dawp'),
                ],
                [
                    'n' => '03',
                    't' => __('The build', 'dawp'),
                    'w' => __('Weeks 4–11', 'dawp'),
                    'd' => __('Components are sourced and the dial is finished. One watchmaker cases the movement and regulates it in five positions. You receive a note at each stage.', 'dawp'),
                ],
                [
                    'n' => '04',
                    't' => __('The delivery', 'dawp'),
                    'w' => __('Week 12', 'dawp'),
                    'd' => __('Pressure tested, sealed, numbered, and entered in the register. It ships insured with its certificate, service record, and a spare strap.', 'dawp'),
                ],
            ];
            foreach ($dawp_steps as $step) : ?>
                <li class="bg-background p-8">
                    <span class="block font-heading text-h2 font-light leading-none text-accent"><?php echo esc_html($step['n']); ?></span>
                    <span class="mt-6 block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($step['t']); ?></span>
                    <span class="mt-2 block text-eyebrow uppercase tracking-wide text-muted"><?php echo esc_html($step['w']); ?></span>
                    <span class="mt-4 block text-body-sm text-foreground-muted"><?php echo esc_html($step['d']); ?></span>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- ============================================================ WHAT CAN BE SPECIFIED -->
<section class="border-b border-border bg-background section-y" aria-labelledby="spec-title">
    <div class="container">
        <div class="mb-14 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('What you decide', 'dawp'); ?></p>
            <h2 id="spec-title" class="c-title"><?php esc_html_e('Every part of it, within reason.', 'dawp'); ?></h2>
            <p class="c-lede"><?php esc_html_e('We start from one of the four collections and change what needs changing. The movement stays as it is — it is the one part we do not compromise.', 'dawp'); ?></p>
        </div>

        <dl class="m-0 grid grid-cols-1 gap-px border border-border bg-border sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $dawp_options = [
                ['t' => __('Case', 'dawp'), 'd' => __('39mm to 42mm. Brushed, polished, or a mix of the two. Steel or a gold finish.', 'dawp')],
                ['t' => __('Bezel', 'dawp'), 'd' => __('Fluted, smooth, rotating dive, or a 24-hour scale in a colour of your choosing.', 'dawp')],
                ['t' => __('Dial', 'dawp'), 'd' => __('Sunburst, lacquer, or matte. Applied indices, painted numerals, or bare.', 'dawp')],
                ['t' => __('Hands', 'dawp'), 'd' => __('Baton, dauphine, or sword. Polished, blued, or filled with luminous material.', 'dawp')],
                ['t' => __('Bracelet', 'dawp'), 'd' => __('Three-link, five-link, or leather. Sized to your wrist before it ships.', 'dawp')],
                ['t' => __('Engraving', 'dawp'), 'd' => __('Case back engraving in a typeface of your choosing, up to forty characters.', 'dawp')],
            ];
            foreach ($dawp_options as $option) : ?>
                <div class="bg-background p-8">
                    <dt class="font-heading text-h3 leading-none text-foreground"><?php echo esc_html($option['t']); ?></dt>
                    <dd class="m-0 mt-3 text-body-sm text-foreground-muted"><?php echo esc_html($option['d']); ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>

        <p class="mt-8 text-caption text-muted"><?php esc_html_e('Commissions begin at the price of the collection they are based on. A fixed quotation is issued before any payment is taken.', 'dawp'); ?></p>
    </div>
</section>

<!-- ============================================================ ENQUIRY -->
<section id="enquiry" class="bg-ink text-on-ink section-y" aria-labelledby="enquiry-title">
    <div class="container grid gap-14 lg:grid-cols-[0.85fr_1.15fr] lg:gap-24">

        <div>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="text-eyebrow font-medium uppercase tracking-wide text-accent"><?php esc_html_e('Enquiry', 'dawp'); ?></p>
            <h2 id="enquiry-title" class="mt-4 font-heading text-h2 font-light leading-[1.05] text-on-ink"><?php esc_html_e('Tell us what you have in mind.', 'dawp'); ?></h2>
            <p class="mt-6 text-body-sm text-on-ink-muted"><?php esc_html_e('A specialist replies within two business days. Nothing is charged until the specification and the quotation are agreed.', 'dawp'); ?></p>

            <dl class="mt-10 space-y-6 border-t border-border-ink pt-8 text-caption">
                <div>
                    <dt class="text-eyebrow uppercase tracking-wide text-accent"><?php esc_html_e('Direct', 'dawp'); ?></dt>
                    <dd class="m-0 mt-1"><a class="text-on-ink transition-colors duration-400 ease-fluid hover:text-accent" href="mailto:<?php echo esc_attr(dawp_brand('atelier_email')); ?>"><?php echo esc_html(dawp_brand('atelier_email')); ?></a></dd>
                </div>
                <div>
                    <dt class="text-eyebrow uppercase tracking-wide text-accent"><?php esc_html_e('Hours', 'dawp'); ?></dt>
                    <dd class="m-0 mt-1 text-on-ink-muted"><?php echo esc_html(dawp_brand('hours')); ?></dd>
                </div>
                <div>
                    <dt class="text-eyebrow uppercase tracking-wide text-accent"><?php esc_html_e('Lead time', 'dawp'); ?></dt>
                    <dd class="m-0 mt-1 text-on-ink-muted"><?php esc_html_e('Approximately twelve weeks from agreement', 'dawp'); ?></dd>
                </div>
            </dl>
        </div>

        <form id="contact-form" class="border border-border-ink bg-ink-soft p-8 lg:p-12" novalidate>
            <input type="hidden" name="subject" value="bespoke">

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="c-label c-label--on-ink" for="bespoke-name"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-accent" aria-hidden="true">*</span></label>
                    <input class="c-field c-field--on-ink" id="bespoke-name" name="name" type="text" required autocomplete="name">
                </div>
                <div>
                    <label class="c-label c-label--on-ink" for="bespoke-email"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-accent" aria-hidden="true">*</span></label>
                    <input class="c-field c-field--on-ink" id="bespoke-email" name="email" type="email" required autocomplete="email">
                </div>
                <div>
                    <label class="c-label c-label--on-ink" for="bespoke-collection"><?php esc_html_e('Starting point', 'dawp'); ?></label>
                    <select class="c-field c-field--on-ink" id="bespoke-collection" name="collection">
                        <option value=""><?php esc_html_e('No preference yet', 'dawp'); ?></option>
                        <?php foreach ($dawp_collections as $collection) : ?>
                            <option value="<?php echo esc_attr($collection['name']); ?>"><?php echo esc_html($collection['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="c-label c-label--on-ink" for="bespoke-budget"><?php esc_html_e('Indicative budget', 'dawp'); ?></label>
                    <select class="c-field c-field--on-ink" id="bespoke-budget" name="budget">
                        <option value=""><?php esc_html_e('Prefer to discuss', 'dawp'); ?></option>
                        <option value="Under $2,500"><?php esc_html_e('Under $2,500', 'dawp'); ?></option>
                        <option value="$2,500 – $5,000"><?php esc_html_e('$2,500 – $5,000', 'dawp'); ?></option>
                        <option value="$5,000 – $10,000"><?php esc_html_e('$5,000 – $10,000', 'dawp'); ?></option>
                        <option value="Above $10,000"><?php esc_html_e('Above $10,000', 'dawp'); ?></option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <label class="c-label c-label--on-ink" for="bespoke-message"><?php esc_html_e('What do you have in mind?', 'dawp'); ?> <span class="text-accent" aria-hidden="true">*</span></label>
                <textarea class="c-field c-field--on-ink min-h-[160px] py-4" id="bespoke-message" name="message" rows="6" required placeholder="<?php esc_attr_e('Case size, dial colour, how you intend to wear it, any engraving, and when you need it.', 'dawp'); ?>"></textarea>
            </div>

            <button class="c-btn c-btn--on-ink mt-8 w-full sm:w-auto" type="submit"><?php esc_html_e('Send enquiry', 'dawp'); ?></button>
            <p id="contact-msg" class="c-form-msg c-form-msg--on-ink mt-4 text-caption" role="status" aria-live="polite"></p>
            <p class="mt-4 text-caption text-on-ink-muted"><?php esc_html_e('We use your details to answer this enquiry only. See our Privacy Policy.', 'dawp'); ?></p>
        </form>
    </div>
</section>

<!-- ============================================================ NOTES -->
<section class="bg-background section-y" aria-labelledby="bespoke-notes-title">
    <div class="container">
        <div class="mb-12 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <h2 id="bespoke-notes-title" class="c-title"><?php esc_html_e('Before you commission.', 'dawp'); ?></h2>
        </div>

        <ul class="m-0 grid list-none grid-cols-1 gap-px border border-border bg-border p-0 lg:grid-cols-3">
            <?php
            $dawp_notes = [
                ['t' => __('Payment', 'dawp'), 'd' => __('Half on agreement, half before dispatch. Both stages are invoiced and processed through our secure checkout.', 'dawp')],
                ['t' => __('Returns', 'dawp'), 'd' => __('A commissioned watch is made for one person and cannot be returned for a change of mind.', 'dawp')],
                ['t' => __('Cover', 'dawp'), 'd' => __('The five-year movement warranty and the lifetime service programme apply in full to every commission.', 'dawp')],
            ];
            foreach ($dawp_notes as $note) : ?>
                <li class="bg-background p-8">
                    <span class="block h-px w-8 bg-accent" aria-hidden="true"></span>
                    <span class="mt-6 block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($note['t']); ?></span>
                    <span class="mt-3 block text-body-sm text-foreground-muted"><?php echo esc_html($note['d']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
