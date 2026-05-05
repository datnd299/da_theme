<?php
/**
 * Template part for displaying the about page
 */
$theme_path = get_template_directory_uri();
?>

<main class="w-full bg-white font-['Be_Vietnam_Pro',sans-serif] overflow-hidden selection:bg-black selection:text-white">

    <!-- ═══════════════════════════════════════════
         HERO
    ════════════════════════════════════════════ -->
    <section class="relative min-h-[80vh] flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 py-32 text-center">
        <div class="max-w-4xl mx-auto space-y-8">
            <span class="inline-block rounded-full px-4 py-1.5 text-xs uppercase tracking-widest font-semibold bg-neutral-100 text-neutral-900">
                Est. 2026 · US-Based Fashion
            </span>

            <h1 class="text-5xl md:text-7xl lg:text-[6rem] leading-[0.9] font-bold tracking-tight text-neutral-900 animate-fade-up">
                Redefining Streetwear,<br>
                <em class="font-serif not-italic text-neutral-400 font-normal">Not Just</em><br>
                Clothes.
            </h1>

            <p class="text-lg md:text-xl text-neutral-600 max-w-2xl mx-auto leading-relaxed animate-fade-up" style="animation-delay: 100ms;">
                Since 2026, we've been helping youth culture express themselves with bold designs, premium fabrics, and a community-driven approach to fashion.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 items-center justify-center pt-6 animate-fade-up" style="animation-delay: 200ms;">
                <a href="<?php echo esc_url( home_url('/shop/') ); ?>"
                   class="inline-flex items-center justify-center px-8 py-4 bg-black text-white text-sm font-bold uppercase tracking-wider rounded-full hover:bg-neutral-800 transition-all active:scale-95">
                    Shop The Collection
                </a>
                <a href="#our-story"
                   class="inline-flex items-center justify-center px-8 py-4 bg-white text-black text-sm font-bold uppercase tracking-wider rounded-full border border-black hover:bg-black hover:text-white transition-all">
                    Read Our Story
                </a>
            </div>
        </div>
    </section>

    <!-- Hero image strip -->
    <div class="w-full h-[50vh] md:h-[70vh] overflow-hidden">
        <img
            src="<?php echo $theme_path; ?>/assets/img/banner3.jpeg"
            alt="Youth streetwear fashion modeling"
            class="w-full h-full object-cover scale-105 hover:scale-100 transition-transform duration-1000 ease-out"
        >
    </div>

    <!-- ═══════════════════════════════════════════
         SECTION 1 — OUR STORY
    ════════════════════════════════════════════ -->
    <section id="our-story" class="px-4 sm:px-6 lg:px-8 py-24 md:py-32 max-w-7xl mx-auto scroll-mt-20">
        <div class="grid md:grid-cols-[4fr_8fr] gap-12 md:gap-24 items-start">
            <div class="md:sticky md:top-32 space-y-4">
                <span class="text-xs uppercase tracking-widest text-neutral-500 font-semibold">Our Story</span>
                <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-neutral-900 leading-tight">
                    It Started With a Graphic Tee That Shrunk After One Wash.
                </h2>
            </div>

            <div class="space-y-6 text-neutral-600 text-lg leading-relaxed">
                <p>
                    We were tired of the streetwear scene. Either you paid $150 for a basic t-shirt just because of the logo, or you bought fast fashion that lost its shape and print after a single trip through the laundry. There was no middle ground for people who just wanted cool, high-quality clothes they could actually afford.
                </p>
                <p>
                    So we bought a used screen printing press, sourced the heaviest, softest cotton blanks we could find, and set up shop in a garage. We printed our own designs, tested them in the wash, wore them to skateparks, and perfected the fit. Friends started asking where we got our gear, and <strong class="text-black font-bold">Werewear</strong> was born.
                </p>
                <p>
                    Today, we're a dedicated team of designers, creators, and logistics experts. We outgrew the garage, but our mission hasn't changed: create premium, unapologetic fashion that empowers you to be yourself — without the insane markup.
                </p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         SECTION 2 — WHAT MAKES US DIFFERENT
    ════════════════════════════════════════════ -->
    <section class="px-4 sm:px-6 lg:px-8 pb-24 md:pb-32 max-w-7xl mx-auto">
        <div class="mb-12 md:mb-20 space-y-4 text-center md:text-left">
            <span class="text-xs uppercase tracking-widest text-neutral-500 font-semibold">Craft & Quality</span>
            <h2 class="text-4xl md:text-6xl font-bold tracking-tight text-neutral-900 max-w-3xl">
                Built Different.<br>
                <em class="font-serif not-italic text-neutral-400 font-normal">Literally.</em>
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 gap-6">
            <?php
            $differentiators = [
                [ 'icon' => '🧵', 'title' => 'Premium Heavyweight Fabrics',  'body' => 'We don\'t do thin, see-through shirts. Our tees are made from 250gsm heavyweight cotton, designed to drape perfectly and last for years without losing shape.' ],
                [ 'icon' => '🎨', 'title' => 'In-House Original Designs',    'body' => 'No generic stock graphics. Every print, embroidery, and cut is designed in-house by our creative team, drawing inspiration from urban culture and modern art.' ],
                [ 'icon' => '🤝', 'title' => 'Ethical Manufacturing',        'body' => 'We partner strictly with certified factories that provide fair wages and safe working conditions. Great clothes shouldn\'t come at the expense of human rights.' ],
                [ 'icon' => '💵', 'title' => 'Honest Direct-to-Consumer',    'body' => 'By cutting out retail middlemen and selling directly to you via werewear.co, we offer premium quality at a fraction of traditional streetwear prices.' ],
            ];
            foreach ( $differentiators as $d ) : ?>
            <div class="bg-neutral-50 p-8 md:p-12 rounded-3xl border border-neutral-200 hover:border-black transition-colors duration-300">
                <div class="text-3xl mb-6"><?php echo $d['icon']; ?></div>
                <h3 class="text-xl font-bold text-neutral-900 mb-3"><?php echo esc_html( $d['title'] ); ?></h3>
                <p class="text-neutral-600 leading-relaxed"><?php echo esc_html( $d['body'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         SECTION 3 — VALUES (Dark Mode)
    ════════════════════════════════════════════ -->
    <section class="bg-black text-white px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-7xl mx-auto">
            <div class="mb-16 md:mb-24 space-y-4">
                <span class="text-xs uppercase tracking-widest text-neutral-400 font-semibold">What We Stand For</span>
                <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold tracking-tight max-w-4xl leading-tight">
                    The Principles We Won't<br>Compromise On.
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-12 md:gap-16">
                <?php
                $values = [
                    [ 'title' => 'Express Yourself Unapologetically.', 'body' => 'Fashion is the easiest way to tell the world who you are without saying a word. We design bold pieces for people who aren\'t afraid to stand out.' ],
                    [ 'title' => 'Community Over Competition.',        'body' => 'We regularly collaborate with local artists, creators, and musicians. When you grow, we grow. We\'re building a culture, not just a brand.' ],
                    [ 'title' => 'No Fast Fashion Waste.',             'body' => 'We produce in limited, intentional drops rather than churning out endless junk. This reduces waste and ensures every piece you buy is special.' ],
                ];
                foreach ( $values as $v ) : ?>
                <div class="border-t border-neutral-800 pt-8 space-y-4">
                    <h3 class="text-xl font-bold"><?php echo esc_html( $v['title'] ); ?></h3>
                    <p class="text-neutral-400 leading-relaxed"><?php echo esc_html( $v['body'] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         SECTION 4 — BY THE NUMBERS
    ════════════════════════════════════════════ -->
    <section class="px-4 sm:px-6 lg:px-8 py-24 md:py-32 max-w-7xl mx-auto">
        <div class="mb-16 text-center space-y-4">
            <span class="text-xs uppercase tracking-widest text-neutral-500 font-semibold">Our Impact</span>
            <h2 class="text-4xl md:text-6xl font-bold tracking-tight text-neutral-900">
                Building a Brand<br>
                <em class="font-serif not-italic text-neutral-400 font-normal">Worth Wearing.</em>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php
            $stats = [
                [ 'number' => '250K+', 'label' => 'Orders Shipped Worldwide' ],
                [ 'number' => '15+',   'label' => 'Exclusive Artist Collabs' ],
                [ 'number' => '4.9 ★', 'label' => 'Average Customer Rating' ],
                [ 'number' => '100%',  'label' => 'Carbon Neutral Deliveries' ],
            ];
            foreach ( $stats as $s ) : ?>
            <div class="bg-neutral-50 p-6 md:p-8 rounded-3xl border border-neutral-200 text-center space-y-3">
                <div class="text-3xl md:text-5xl font-bold tracking-tight text-black">
                    <?php echo $s['number']; ?>
                </div>
                <div class="text-neutral-500 text-sm font-bold uppercase tracking-wider"><?php echo $s['label']; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         SECTION 5 — OUR PROMISE
    ════════════════════════════════════════════ -->
    <section class="px-4 sm:px-6 lg:px-8 pb-24 md:pb-32 max-w-7xl mx-auto">
        <div class="bg-neutral-50 rounded-[2.5rem] p-8 md:p-16 border border-neutral-200">
            <div class="grid md:grid-cols-[4fr_8fr] gap-12 md:gap-24 items-start">
                <div class="space-y-4">
                    <span class="text-xs uppercase tracking-widest text-neutral-500 font-semibold">Our Guarantee</span>
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-neutral-900">
                        The Werewear Promise.
                    </h2>
                    <p class="text-neutral-600 leading-relaxed">
                        We don't just stand behind our clothes — we stand behind your decision to wear them.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 gap-8">
                    <?php
                    $promises = [
                        [ 'icon' => '30',   'title' => '30-Day Returns',        'body' => 'Doesn\'t fit? Not your vibe? Send it back within 30 days, no questions asked.' ],
                        [ 'icon' => '🛡️',  'title' => 'Quality Guarantee',     'body' => 'If a seam rips or a print fades abnormally fast, we\'ll replace it.' ],
                        [ 'icon' => '🚚',   'title' => 'Insured Delivery',      'body' => 'Every order is tracked and 100% insured against loss or theft.' ],
                        [ 'icon' => '💬',   'title' => 'Real Support',          'body' => 'Email support@werewear.co and a real human will reply within 1 business day.' ],
                    ];
                    foreach ( $promises as $p ) : ?>
                    <div class="space-y-3">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-xl font-bold border border-neutral-200 shadow-sm text-black">
                            <?php echo $p['icon']; ?>
                        </div>
                        <h3 class="text-lg font-bold text-neutral-900"><?php echo esc_html( $p['title'] ); ?></h3>
                        <p class="text-neutral-600 text-sm leading-relaxed"><?php echo esc_html( $p['body'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         CLOSING CTA
    ════════════════════════════════════════════ -->
    <section class="border-t border-neutral-200 px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <h2 class="text-4xl md:text-6xl font-bold tracking-tight text-neutral-900">
                Ready to upgrade your<br>
                <em class="font-serif not-italic text-neutral-400 font-normal">wardrobe?</em>
            </h2>

            <p class="text-neutral-600 text-lg max-w-xl mx-auto leading-relaxed">
                Check out our latest drops or hit up our support team if you have any questions. We're here for you.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
                <a href="<?php echo esc_url( home_url('/shop/') ); ?>"
                   class="inline-flex items-center justify-center px-8 py-4 bg-black text-white text-sm font-bold uppercase tracking-wider rounded-full hover:bg-neutral-800 transition-all active:scale-95">
                    Shop The Latest Drop
                </a>
                <a href="mailto:support@werewear.co"
                   class="inline-flex items-center justify-center px-8 py-4 bg-white text-black text-sm font-bold uppercase tracking-wider rounded-full border border-black hover:bg-black hover:text-white transition-all">
                    Contact Support
                </a>
            </div>
        </div>
    </section>

</main>
