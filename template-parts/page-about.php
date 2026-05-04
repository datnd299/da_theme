<?php
/**
 * Template part for displaying the about page
 */
?>

<main class="w-full bg-background overflow-hidden">

    <!-- ═══════════════════════════════════════════
         HERO
    ════════════════════════════════════════════ -->
    <section class="relative min-h-[90vh] flex flex-col items-center justify-center px-6 md:px-12 py-32 text-center">
        <div class="max-w-[1100px] mx-auto space-y-8">
            <span class="inline-block rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5">
                Est. 2014 · American Handcraft
            </span>

            <h1 class="font-heading text-[3.5rem] md:text-[6rem] lg:text-[8rem] leading-[0.88] tracking-[-0.04em] text-foreground">
                Crafting Homes,<br>
                <em class="font-serif not-italic text-muted opacity-80">Not Just</em><br>
                Furniture.
            </h1>

            <p class="text-lg md:text-xl text-foreground/60 max-w-2xl mx-auto leading-relaxed">
                Since 2014, we've been helping American families turn empty rooms into the places they love coming home to — one handcrafted piece at a time.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 items-center justify-center pt-2">
                <a href="<?php echo esc_url( home_url('/shop/') ); ?>"
                   class="inline-flex items-center gap-2 px-8 py-4 bg-foreground text-background text-sm font-medium tracking-wide rounded-full hover:bg-foreground/90 transition-colors">
                    Shop Our Collection
                </a>
                <a href="#"
                   class="inline-flex items-center gap-2 px-8 py-4 text-foreground text-sm font-medium tracking-wide rounded-full ring-1 ring-foreground/20 hover:ring-foreground/40 transition-colors">
                    Visit Our Showroom
                </a>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-foreground/30">
            <span class="text-[9px] uppercase tracking-[0.22em]">Scroll</span>
            <div class="w-px h-10 bg-foreground/20"></div>
        </div>
    </section>

    <!-- Hero image strip -->
    <div class="w-full h-[55vh] md:h-[75vh] overflow-hidden">
        <img
            src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=1800&q=80"
            alt="Handcrafted solid-wood furniture in a bright American living room"
            class="w-full h-full object-cover scale-[1.02]"
        >
    </div>


    <!-- ═══════════════════════════════════════════
         SECTION 1 — OUR STORY
    ════════════════════════════════════════════ -->
    <section class="px-6 md:px-12 lg:px-24 py-32 max-w-[1400px] mx-auto">
        <div class="grid md:grid-cols-[5fr_7fr] gap-12 md:gap-28 items-start">

            <div class="md:sticky md:top-32 space-y-5">
                <span class="text-[10px] uppercase tracking-[0.2em] text-foreground/40 font-medium">Our Story</span>
                <h2 class="font-heading text-[2rem] md:text-[3rem] lg:text-[3.5rem] leading-[1] tracking-[-0.03em] text-foreground">
                    It Started With a Living Room That Didn't Feel Like Home.
                </h2>
            </div>

            <div class="space-y-6 text-foreground/65 text-lg leading-[1.75]">
                <p>
                    In 2014, our founder moved into his first house in Portland, Oregon with a young family and a tight budget. After weeks of scrolling through big-box retailers, what he found was disappointing: flimsy particle board disguised as wood, sofas that sagged within months, and "modern" designs that all looked exactly the same.
                </p>
                <p>
                    So he did what any frustrated woodworker's son would do — he built a dining table himself. Then a bookshelf. Then a sofa frame. Friends started asking where he got his furniture, and within two years, that small garage workshop became <strong class="text-foreground font-semibold">Lumière Woodworks</strong>.
                </p>
                <p>
                    Today, we're a team of 47 designers, craftspeople, and customer advocates spread across three states — but our mission hasn't changed since day one: make beautifully built furniture that actually lasts, at a price that doesn't require a second mortgage.
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════
         SECTION 2 — WHAT MAKES US DIFFERENT
    ════════════════════════════════════════════ -->
    <section class="px-6 md:px-12 lg:px-24 pb-32 max-w-[1400px] mx-auto">

        <div class="mb-16 space-y-4">
            <span class="text-[10px] uppercase tracking-[0.2em] text-foreground/40 font-medium">Craft &amp; Quality</span>
            <h2 class="font-heading text-[2.5rem] md:text-[4rem] lg:text-[5rem] leading-[0.92] tracking-[-0.03em] text-foreground max-w-3xl">
                Built Different.<br>
                <em class="font-serif not-italic text-muted">Literally.</em>
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 gap-px bg-foreground/10 border border-foreground/10">
            <?php
            $differentiators = [
                [ 'icon' => '🪵', 'title' => 'Solid Wood, Not Smoke and Mirrors',  'body' => 'Every piece in our catalog is made from kiln-dried North American hardwoods — oak, walnut, maple, and cherry — sourced from FSC-certified forests in the Appalachians and Pacific Northwest. No MDF. No veneer trickery. No "engineered wood" buzzwords.' ],
                [ 'icon' => '🇺🇸', 'title' => 'Made in America, Truly',             'body' => 'Our furniture is designed in Brooklyn, NY and built in our workshops in North Carolina and Oregon. When you buy from us, you\'re supporting 100+ American jobs — woodworkers, upholsterers, finishers, and delivery teams.' ],
                [ 'icon' => '🛠️', 'title' => 'Heirloom-Grade Construction',        'body' => 'Mortise-and-tenon joinery. Hand-rubbed oil finishes. Eight-way hand-tied springs in every sofa. The kind of construction your grandparents\' furniture had — because that\'s the furniture that\'s still standing.' ],
                [ 'icon' => '💵', 'title' => 'Honest Pricing, No Middlemen',       'body' => 'We sell directly to you. No showroom markups, no wholesalers taking a cut. The same quality you\'d find at a high-end design store, at roughly half the price.' ],
            ];
            foreach ( $differentiators as $d ) : ?>
            <div class="bg-background p-10 md:p-12 space-y-4">
                <div class="text-2xl"><?php echo $d['icon']; ?></div>
                <h3 class="font-heading text-xl tracking-[-0.02em] text-foreground"><?php echo esc_html( $d['title'] ); ?></h3>
                <p class="text-foreground/55 leading-relaxed"><?php echo esc_html( $d['body'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════
         SECTION 3 — VALUES  (dark bg)
    ════════════════════════════════════════════ -->
    <section class="bg-foreground text-background px-6 md:px-12 lg:px-24 py-32">
        <div class="max-w-[1400px] mx-auto">

            <div class="mb-16 space-y-4">
                <span class="text-[10px] uppercase tracking-[0.2em] text-background/40 font-medium">What We Stand For</span>
                <h2 class="font-heading text-[2.5rem] md:text-[4rem] lg:text-[5rem] leading-[0.92] tracking-[-0.03em] max-w-3xl">
                    The Principles We Won't<br>Compromise On.
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-12 md:gap-16">
                <?php
                $values = [
                    [ 'title' => 'Sustainability isn\'t a marketing line.', 'body' => 'We plant two trees for every one we use. Our finishes are low-VOC. Our packaging is 100% recyclable. And our furniture is built to outlast trends — the most sustainable piece is the one you never have to replace.' ],
                    [ 'title' => 'People over profit margins.',               'body' => 'Our craftspeople earn a living wage with full benefits. Our customer service team is based in the U.S. and answers within 4 hours. And if something goes wrong, we make it right — no hoops, no fine print.' ],
                    [ 'title' => 'Design that respects you.',                 'body' => 'We don\'t chase TikTok trends or release 200 new SKUs a season. We design timeless, versatile pieces meant to anchor your home for decades — the kind of furniture you\'ll pass down, not throw out.' ],
                ];
                foreach ( $values as $v ) : ?>
                <div class="border-t border-background/20 pt-8 space-y-4">
                    <h3 class="font-heading text-xl tracking-[-0.02em]"><?php echo esc_html( $v['title'] ); ?></h3>
                    <p class="text-background/55 leading-relaxed"><?php echo esc_html( $v['body'] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════
         SECTION 4 — BY THE NUMBERS
    ════════════════════════════════════════════ -->
    <section class="px-6 md:px-12 lg:px-24 py-32 max-w-[1400px] mx-auto">

        <div class="mb-16 text-center space-y-4">
            <span class="text-[10px] uppercase tracking-[0.2em] text-foreground/40 font-medium">Impact</span>
            <h2 class="font-heading text-[2.5rem] md:text-[4rem] lg:text-[5rem] leading-[0.92] tracking-[-0.03em] text-foreground">
                A Decade of Building<br>
                <em class="font-serif not-italic text-muted">Things Worth Keeping.</em>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-px bg-foreground/10 border border-foreground/10">
            <?php
            $stats = [
                [ 'number' => '50,000+', 'label' => 'Homes furnished across all 50 states' ],
                [ 'number' => '47',      'label' => 'Craftspeople, designers &amp; team members' ],
                [ 'number' => '12 yrs',  'label' => 'Average product lifespan (and counting)' ],
                [ 'number' => '4.9 ★',   'label' => 'Average rating across 18,000+ reviews' ],
                [ 'number' => '100K+',   'label' => 'Trees planted through our reforestation partnership' ],
                [ 'number' => '0',       'label' => 'Pieces of furniture sent to landfill from our workshops' ],
            ];
            foreach ( $stats as $s ) : ?>
            <div class="bg-background p-8 md:p-12 text-center space-y-2">
                <div class="font-heading text-[2.5rem] md:text-[3.5rem] lg:text-[4rem] tracking-[-0.04em] text-foreground leading-none">
                    <?php echo $s['number']; ?>
                </div>
                <div class="text-foreground/45 text-sm leading-snug max-w-[180px] mx-auto"><?php echo $s['label']; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════
         SECTION 5 — MEET THE TEAM
    ════════════════════════════════════════════ -->
    <section class="px-6 md:px-12 lg:px-24 pb-32 max-w-[1400px] mx-auto">
        <div class="border-t border-foreground/10 pt-16 mb-16 space-y-4">
            <span class="text-[10px] uppercase tracking-[0.2em] text-foreground/40 font-medium">Our People</span>
            <h2 class="font-heading text-[2.5rem] md:text-[4rem] lg:text-[5rem] leading-[0.92] tracking-[-0.03em] text-foreground max-w-2xl">
                The People Behind<br>
                <em class="font-serif not-italic text-muted">Your Furniture.</em>
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10">
            <?php
            $team = [
                [
                    'name'  => 'James Whitfield',
                    'role'  => 'Founder &amp; Head of Design',
                    'bio'   => 'Former architect turned woodworker. Believes the best furniture disappears into your life until you really need it — then it\'s exactly right.',
                    'photo' => 'https://images.unsplash.com/photo-1556157382-97eda2f9e2bf?w=600&q=80',
                ],
                [
                    'name'  => 'Earl Tanner',
                    'role'  => 'Master Craftsman, NC Workshop',
                    'bio'   => 'Third-generation furniture maker. Has been hand-cutting dovetails since he was 14. If your dresser drawer glides like silk, thank him.',
                    'photo' => 'https://images.unsplash.com/photo-1504593811423-6dd665756598?w=600&q=80',
                ],
                [
                    'name'  => 'Giulia Ferretti',
                    'role'  => 'Lead Upholsterer',
                    'bio'   => 'Trained in Italy, based in Oregon. Personally inspects every sofa before it leaves the workshop.',
                    'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=600&q=80',
                ],
                [
                    'name'  => 'Maya Torres',
                    'role'  => 'Customer Experience Lead',
                    'bio'   => 'The voice on the other end of the phone when you have a question. Will absolutely talk to you about her dog.',
                    'photo' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=600&q=80',
                ],
            ];
            foreach ( $team as $member ) : ?>
            <div>
                <div class="aspect-[3/4] overflow-hidden rounded-sm mb-5 bg-foreground/5">
                    <img
                        src="<?php echo esc_url( $member['photo'] ); ?>"
                        alt="<?php echo esc_attr( $member['name'] ); ?>"
                        class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700"
                        loading="lazy"
                    >
                </div>
                <div class="space-y-1.5">
                    <div class="font-heading text-lg tracking-[-0.02em] text-foreground"><?php echo esc_html( $member['name'] ); ?></div>
                    <div class="text-[10px] uppercase tracking-[0.15em] text-muted"><?php echo $member['role']; ?></div>
                    <p class="text-sm text-foreground/50 leading-relaxed pt-1"><?php echo esc_html( $member['bio'] ); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════
         SECTION 6 — OUR PROMISE
    ════════════════════════════════════════════ -->
    <section class="px-6 md:px-12 lg:px-24 py-32 max-w-[1400px] mx-auto">
        <div class="grid md:grid-cols-[5fr_7fr] gap-12 md:gap-28 items-start">

            <div class="md:sticky md:top-32 space-y-5">
                <span class="text-[10px] uppercase tracking-[0.2em] text-foreground/40 font-medium">Our Guarantee</span>
                <h2 class="font-heading text-[2rem] md:text-[3rem] lg:text-[3.5rem] leading-[1] tracking-[-0.03em] text-foreground">
                    The Lumière Lifetime Promise.
                </h2>
                <p class="text-foreground/50 leading-relaxed">
                    We don't just stand behind our furniture — we stand behind your decision to buy it.
                </p>
            </div>

            <div>
                <?php
                $promises = [
                    [ 'icon' => '365',  'title' => '365-day home trial',            'body' => 'Live with it for a full year. If it\'s not right, send it back.' ],
                    [ 'icon' => '∞',    'title' => 'Lifetime structural warranty',   'body' => 'Frames, joinery, and hardware — covered forever.' ],
                    [ 'icon' => '🚚',   'title' => 'Free white-glove delivery',      'body' => 'To all 48 contiguous states, at no extra cost.' ],
                    [ 'icon' => '🛠',   'title' => 'Repair, don\'t replace',         'body' => 'Spill on your sofa? We\'ll send replacement cushions. Scratch on your table? We\'ll send a refinishing kit. Always.' ],
                ];
                foreach ( $promises as $p ) : ?>
                <div class="py-8 border-t border-foreground/10 flex gap-6 items-start last:border-b">
                    <div class="shrink-0 w-10 text-center font-heading text-xl text-foreground/40"><?php echo $p['icon']; ?></div>
                    <div>
                        <h3 class="font-heading text-lg tracking-[-0.02em] text-foreground mb-1.5"><?php echo esc_html( $p['title'] ); ?></h3>
                        <p class="text-foreground/50 leading-relaxed"><?php echo esc_html( $p['body'] ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════
         SECTION 7 — THE NEXT CHAPTER
    ════════════════════════════════════════════ -->
    <section class="px-6 md:px-12 lg:px-24 pb-32 max-w-[1400px] mx-auto">
        <div class="border-t border-foreground/10 pt-16">
            <div class="grid md:grid-cols-[5fr_7fr] gap-12 md:gap-28 items-start">

                <div class="space-y-4">
                    <span class="text-[10px] uppercase tracking-[0.2em] text-foreground/40 font-medium">Looking Ahead</span>
                    <h2 class="font-heading text-[2rem] md:text-[3rem] lg:text-[3.5rem] leading-[1] tracking-[-0.03em] text-foreground">
                        The Next Chapter.
                    </h2>
                </div>

                <div class="space-y-5 text-foreground/65 text-lg leading-[1.75]">
                    <p>We're a long way from that garage in Portland, but we're just getting started. In 2026, we're opening our first physical showrooms in Austin, Denver, and Charleston — places to touch the wood, sit on the sofas, and meet the people who built them.</p>
                    <p>We're also expanding our reclaimed wood collection, launching a custom design service, and partnering with Habitat for Humanity to furnish 500 homes for families in need by 2027.</p>
                    <p class="font-semibold text-foreground">Thanks for being part of the story.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════
         CLOSING CTA  (dark bg)
    ════════════════════════════════════════════ -->
    <section class="bg-foreground text-background px-6 md:px-12 lg:px-24 py-32 md:py-40">
        <div class="max-w-[1400px] mx-auto text-center space-y-10">

            <h2 class="font-heading text-[3rem] md:text-[5.5rem] lg:text-[7.5rem] leading-[0.88] tracking-[-0.04em] max-w-5xl mx-auto">
                Ready to find a piece<br>
                <em class="font-serif not-italic opacity-60">worth keeping?</em>
            </h2>

            <p class="text-background/55 text-lg max-w-xl mx-auto">
                Browse the collection, or come visit us — we'd love to meet you.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-2">
                <a href="<?php echo esc_url( home_url('/shop/') ); ?>"
                   class="inline-flex items-center gap-2 px-8 py-4 bg-background text-foreground text-sm font-medium tracking-wide rounded-full hover:bg-background/90 transition-colors">
                    Shop Now
                </a>
                <a href="#"
                   class="inline-flex items-center gap-2 px-8 py-4 text-background text-sm font-medium tracking-wide rounded-full ring-1 ring-background/30 hover:ring-background/50 transition-colors">
                    Book a Showroom Visit
                </a>
                <a href="<?php echo esc_url( home_url('/contact-us/') ); ?>"
                   class="inline-flex items-center gap-2 px-8 py-4 text-background text-sm font-medium tracking-wide rounded-full ring-1 ring-background/30 hover:ring-background/50 transition-colors">
                    Talk to a Designer
                </a>
            </div>
        </div>
    </section>

</main>
