<?php
/**
 * Template Part: Home Page
 * 
 * The premium ecommerce homepage for Bardic, strictly matching Google Stitch specifications.
 * "A modern artisan workshop inspired by ancient music and storytelling."
 */
?>

<!-- Section 1: Hero Section -->
<section class="relative bg-[#FAF6F0] py-16 md:py-24 lg:py-32 px-6 md:px-12 overflow-hidden border-b border-[#D9D2C5]/30">
    <div class="max-w-[1280px] mx-auto flex flex-col-reverse lg:flex-row items-center gap-12 lg:gap-16">
        <!-- Text Content -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center text-left">
            <span class="text-[#B08A57] text-xs md:text-sm font-bold tracking-[0.25em] uppercase mb-4 block">
                THE MAKER'S JOURNEY
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-[64px] font-serif text-[#4A3426] leading-[1.08] mb-6 font-medium">
                Craft Music With Your Own Hands
            </h1>
            <p class="text-[#7A6C5F] font-sans text-base md:text-lg leading-[1.75] mb-10 max-w-xl">
                Handcrafted DIY lyre kits inspired by ancient artistry and timeless folk traditions. No prior woodworking experience required—only the soul of a bard.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                <a href="/shop?series=walnut" class="bg-[#4A3426] text-[#FAF6F0] text-center font-sans font-semibold text-xs tracking-[0.2em] uppercase px-8 py-4.5 rounded-xl hover:bg-[#B08A57] transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                    BUILD YOUR LYRE
                </a>
                <a href="/shop" class="border border-[#B08A57] text-[#B08A57] text-center font-sans font-semibold text-xs tracking-[0.2em] uppercase px-8 py-4.5 rounded-xl hover:bg-[#B08A57] hover:text-[#FAF6F0] transition-all duration-300">
                    EXPLORE KITS
                </a>
            </div>
        </div>
        <!-- Media -->
        <div class="w-full lg:w-1/2">
            <div class="aspect-[4/3] sm:aspect-[16/10] lg:aspect-[4/3] rounded-[24px] overflow-hidden bg-[#EAE2D5] shadow-md relative">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTCrmSN5dqZRx_Cucaj56sUahLJAifEl8Ib7RMXlUUsNCe4Kzay6_YzX-mlx-v6H1T5xxVMrHw4dr-Bd6IQ5Waoo8vHMhEhm2xPTk4D4Z0L2VA-O4Hczq6BD3ZrS4zVXQNhUS3thn-6i08trsRVaY83LdC8oNTInB7xUsmlGaboiD6hAPstZ3XcHZ9dj57dWBHjAar8QFoFEWv0nWEyd9ifUN349bAolXYAglCRID0_J9MIl51LaxL8WTOqbxIVVPjEn6Hs5L-vA" alt="Artisan hands sanding and crafting a wooden lyre next to a warm candle" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-[#4A3426]/5 mix-blend-multiply"></div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Value Propositions (Two-Card Grid) -->
<section class="bg-[#FAF6F0] py-16 md:py-24 px-6 md:px-12 border-b border-[#D9D2C5]/30">
    <div class="max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            <!-- Card 1 -->
            <div class="bg-[#F3EDE2] p-8 md:p-12 rounded-[24px] border border-[#D9D2C5]/30 shadow-sm flex flex-col items-start text-left">
                <div class="w-12 h-12 rounded-xl bg-[#4A3426] flex items-center justify-center mb-6 text-[#FAF6F0]">
                    <!-- Crossed Tools Icon -->
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-serif text-[#4A3426] mb-4 font-medium">Handcrafted Experience</h3>
                <p class="text-[#7A6C5F] font-sans text-sm md:text-base leading-[1.7]">
                    Every piece of walnut and maple is hand-selected and pre-carved, ensuring a tactile connection to the raw material from the very first touch.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-[#F3EDE2] p-8 md:p-12 rounded-[24px] border border-[#D9D2C5]/30 shadow-sm flex flex-col items-start text-left">
                <div class="w-12 h-12 rounded-xl bg-[#4A3426] flex items-center justify-center mb-6 text-[#FAF6F0]">
                    <!-- Graduation Cap Icon -->
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-serif text-[#4A3426] mb-4 font-medium">Beginner Friendly</h3>
                <p class="text-[#7A6C5F] font-sans text-sm md:text-base leading-[1.7]">
                    Our comprehensive video guides and ancient scrolls lead you through assembly, stringing, and tuning your very first ancient instrument.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Collection Introduction -->
<section class="bg-[#FAF6F0] py-16 md:py-24 px-6 md:px-12 text-center">
    <div class="max-w-[1280px] mx-auto">
        <span class="text-[#B08A57] text-xs md:text-sm font-bold tracking-[0.25em] uppercase mb-4 block">
            COLLECTION
        </span>
        <h2 class="text-4xl md:text-5xl font-serif text-[#4A3426] mb-12 font-medium">
            The Artisan Series
        </h2>
        <div class="rounded-[24px] overflow-hidden bg-[#FAF6F0] shadow-sm max-w-[1000px] mx-auto aspect-[16/9] border border-[#D9D2C5]/30">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBwlCc9Tp5ZnEuJGDj2KhKiUCpJAPinClli75LlpsoYwmtnLoQTO_44JgzQdEJFkRWNhdizT2U29bfeDEC8NVQnzzogzdvDLPyqUbHtebH_1_aPBCNmR-WOV_Y38DlZY5cEBgyT012YvAEvKqSHrSYkzTBo11TrUQjhteoqHlXR1TaxD5mNfljJ9s4FGV6Z7lWwKXA8C8yYyKVA1zEdURAZdMfSqaUWKFKDK571U8ioyGcfZ-DZ_anq7C54ea7_XzdoFxdpmYgCCw" alt="A completed 10-string artisan lyre resting elegantly on a natural wool blanket in a rustic cottage" class="w-full h-full object-cover" />
        </div>
    </div>
</section>

<!-- Section 4: Product Showcase Grid -->
<section class="bg-[#FAF6F0] pb-24 md:pb-32 px-6 md:px-12 border-b border-[#D9D2C5]/30">
    <div class="max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
            <!-- Product A: Walnut Series -->
            <div class="flex flex-col text-left group">
                <div class="aspect-[4/5] rounded-[24px] overflow-hidden bg-[#FAF6F0] mb-6 relative border border-[#D9D2C5]/30 shadow-sm">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgKJUF7vWeRYursokcVissZIoHUuzMsPsYBiVNPy4syWjyTQgKhgalBCoSozXfmQAra99ItFRPrj_nyEBl46qAGYmIzfeHwbB5OMr7e1GYffP98Uu5JmqHaO1rjFuUVN2IkjCeH4JSpgLJI5snexIZXXsxVWXtE-EzuA1qKYsxN_Nbn3DVECEMuxOePb_dMxKAb64aK0DUHyCCkn1liEF8CDlNP9c9PhgvSThdFa1U7lnETb05m-mL6w5oMz9LSoZcHAmo516eQA" alt="Walnut Series Lyre Kit" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-700 ease-out" />
                </div>
                <div class="flex justify-between items-baseline mb-2">
                    <h3 class="text-3xl font-serif text-[#4A3426] font-medium">Walnut Series</h3>
                    <span class="text-2xl text-[#4A3426] font-sans font-light">$245</span>
                </div>
                <p class="text-[#7A6C5F] font-sans text-sm md:text-base mb-4">
                    Rich, deep resonance with aged brass strings.
                </p>
                <a href="/product/walnut-lyre" class="text-xs uppercase tracking-[0.2em] font-bold text-[#B08A57] hover:text-[#4A3426] transition-colors flex items-center gap-1.5 mt-2">
                    EXPLORE SERIES <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Product B: Nordic Series -->
            <div class="flex flex-col text-left group">
                <div class="aspect-[4/5] rounded-[24px] overflow-hidden bg-[#FAF6F0] mb-6 relative border border-[#D9D2C5]/30 shadow-sm">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/nordic-series.jpg' ); ?>" alt="Nordic Series Lyre Kit" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-700 ease-out" />
                </div>
                <div class="flex justify-between items-baseline mb-2">
                    <h3 class="text-3xl font-serif text-[#4A3426] font-medium">Nordic Series</h3>
                    <span class="text-2xl text-[#4A3426] font-sans font-light">$225</span>
                </div>
                <p class="text-[#7A6C5F] font-sans text-sm md:text-base mb-4">
                    Clean ash wood tones with silver-plated strings.
                </p>
                <a href="/product/nordic-lyre" class="text-xs uppercase tracking-[0.2em] font-bold text-[#B08A57] hover:text-[#4A3426] transition-colors flex items-center gap-1.5 mt-2">
                    EXPLORE SERIES <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Product C: Celtic Series -->
            <div class="flex flex-col text-left group">
                <div class="aspect-[4/5] rounded-[24px] overflow-hidden bg-[#FAF6F0] mb-6 relative border border-[#D9D2C5]/30 shadow-sm">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/celtic-series.jpg' ); ?>" alt="Celtic Series Oak Wood Lyre Kit" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-700 ease-out" />
                </div>
                <div class="flex justify-between items-baseline mb-2">
                    <h3 class="text-3xl font-serif text-[#4A3426] font-medium">Celtic Series</h3>
                    <span class="text-2xl text-[#4A3426] font-sans font-light">$265</span>
                </div>
                <p class="text-[#7A6C5F] font-sans text-sm md:text-base mb-4">
                    Timeless oak crafted for wandering souls.
                </p>
                <a href="/product/celtic-lyre" class="text-xs uppercase tracking-[0.2em] font-bold text-[#B08A57] hover:text-[#4A3426] transition-colors flex items-center gap-1.5 mt-2">
                    EXPLORE SERIES <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section 4.5: The Workshop Ethos -->
<section class="bg-[#F3EDE2] py-20 md:py-28 px-6 md:px-12 border-b border-[#D9D2C5]/30 relative overflow-hidden">
    <div class="max-w-[1280px] mx-auto flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
        <!-- Workbench Media Left -->
        <div class="w-full lg:w-1/2 relative group">
            <div class="aspect-[4/3] rounded-[24px] overflow-hidden bg-[#EAE2D5] shadow-md relative border border-[#D9D2C5]/40">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCp30j96Wtp8xb4FjDP8EXtykAI9anHYdZFyzhNU0pQj1HVD4by1flhUFi2YccAgB-y3AskC2TTT98xrKd3e0TRchabwqQyZEq2FXaWVkmnFDMspZLkxD2it8zKTQRius58kdo1UZdN2eLbzV99ZyBQK2up_OukKqt2pLkBh2IcMgEb5dxsdr5TNB6diO1ABuPlP0Xwgip1XJqPqyWTQhl2skL5tW1YKT__fw1SB72TDVnSb1i4llE8VgprOsMsZn5o_Qmu52lytw" alt="Artisan workbench with chisels, wood carvings, shavings, and natural wood grain planks" class="w-full h-full object-cover group-hover:scale-[1.01] transition-transform duration-700" />
                <div class="absolute inset-0 bg-[#4A3426]/5 mix-blend-multiply"></div>
                
                <!-- Handcrafted Gold Quality Seal overlayed bottom right -->
                <div class="absolute bottom-6 right-6 bg-[#4A3426] text-[#FAF6F0] p-4 rounded-full border border-[#B08A57] shadow-lg flex flex-col items-center justify-center w-20 h-20 rotate-6 hover:rotate-0 transition-transform duration-300">
                    <span class="text-[8px] font-sans tracking-[0.2em] uppercase font-bold opacity-60">Handmade</span>
                    <span class="text-base font-serif font-bold text-[#B08A57]">100%</span>
                    <span class="text-[8px] font-sans tracking-[0.2em] uppercase font-bold opacity-60">Quality</span>
                </div>
            </div>
        </div>
        
        <!-- Ethos Text Content Right -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center text-left">
            <span class="text-[#B08A57] text-xs md:text-sm font-bold tracking-[0.25em] uppercase mb-4 block">
                THE WORKSHOP ETHOS
            </span>
            <h2 class="text-4xl md:text-5xl font-serif text-[#4A3426] mb-6 font-medium leading-[1.12]">
                Honoring the Grain
            </h2>
            <p class="text-[#7A6C5F] font-sans text-base md:text-lg leading-[1.75] mb-10 max-w-xl">
                Every piece begins with a conversation between the artisan and the wood. We do not force shapes; we uncover them. By using traditional joinery and natural oils, we ensure that each Bardic instrument breathes, age, and develops its own unique voice over generations.
            </p>
            
            <!-- Badges List -->
            <div class="flex flex-wrap gap-3">
                <span class="bg-[#FAF6F0] text-[#7A6C5F] text-xs font-sans tracking-wider uppercase px-4 py-2 rounded-full border border-[#D9D2C5]/50 shadow-sm font-medium">
                    Aged Walnut
                </span>
                <span class="bg-[#FAF6F0] text-[#7A6C5F] text-xs font-sans tracking-wider uppercase px-4 py-2 rounded-full border border-[#D9D2C5]/50 shadow-sm font-medium">
                    Slow-Grown Spruce
                </span>
                <span class="bg-[#FAF6F0] text-[#7A6C5F] text-xs font-sans tracking-wider uppercase px-4 py-2 rounded-full border border-[#D9D2C5]/50 shadow-sm font-medium">
                    Antique Brass
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Community & Testimonials -->
<section class="bg-[#F3EDE2] py-20 md:py-28 px-6 md:px-12 border-b border-[#D9D2C5]/30">
    <div class="max-w-[1280px] mx-auto">
        <span class="text-[#B08A57] text-xs md:text-sm font-bold tracking-[0.25em] uppercase mb-4 block text-center">
            THE BARDIC COMMUNITY
        </span>
        <h2 class="text-4xl md:text-5xl font-serif text-[#4A3426] mb-16 font-medium text-center">
            Built By You
        </h2>
        
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-16 items-center">
            <!-- Collage Grid Left -->
            <!-- Collage Grid Left -->
            <div class="w-full lg:w-2/3 grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Large image -->
                <div class="sm:col-span-2 aspect-[4/3] rounded-[20px] overflow-hidden shadow-sm relative">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Thiết kế chưa có tên (1).png' ); ?>" alt="Customer carefully tuning their instrument under a soft warm light" class="w-full h-full object-cover" />
                </div>
                <!-- Column 3 Stacked Images -->
                <div class="sm:col-span-1 relative w-full sm:h-full">
                    <!-- Mobile Layout: Stack naturally with square aspect ratio -->
                    <div class="flex sm:hidden flex-col gap-6 w-full">
                        <div class="aspect-square rounded-[20px] overflow-hidden shadow-sm relative">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvpGDoCS6_GuZZIu9idqGJIit-kLwq19k4SUWS7Wx1TWy9NM0D82jQrHqzoVIAdT1LSa03ewTgwlDb2rphWk3Vd5Ij3AJsVFJ1Y5IySjm0ygzFZSidbNCJoJTqi79L3lzrG3eS5kwxr26POz5yv4OObypX4twUrR_HuN7JEGCWYYeBXO3CGtIsRvSFLvnM8V0bGzTd_EO0JDAZb1lZoTUddrWhfiA5aBSY88imr-hSnczK1seN5KzTy1TgtYl6HZk4roNliHcJuw" alt="Close-up of hands stringing a wooden lyre frame" class="w-full h-full object-cover" />
                        </div>
                        <div class="aspect-square rounded-[20px] overflow-hidden shadow-sm relative">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/d1d2a4ceb6065b94046272d12b34341c.jpg' ); ?>" alt="Finished lyre sitting on a rustic stone castle window" class="w-full h-full object-cover" />
                        </div>
                    </div>
                    <!-- Desktop/Tablet Layout: stretch to exactly the absolute height of the large image -->
                    <div class="hidden sm:flex absolute inset-0 flex-col gap-6">
                        <div class="flex-1 rounded-[20px] overflow-hidden shadow-sm relative">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvpGDoCS6_GuZZIu9idqGJIit-kLwq19k4SUWS7Wx1TWy9NM0D82jQrHqzoVIAdT1LSa03ewTgwlDb2rphWk3Vd5Ij3AJsVFJ1Y5IySjm0ygzFZSidbNCJoJTqi79L3lzrG3eS5kwxr26POz5yv4OObypX4twUrR_HuN7JEGCWYYeBXO3CGtIsRvSFLvnM8V0bGzTd_EO0JDAZb1lZoTUddrWhfiA5aBSY88imr-hSnczK1seN5KzTy1TgtYl6HZk4roNliHcJuw" alt="Close-up of hands stringing a wooden lyre frame" class="w-full h-full object-cover" />
                        </div>
                        <div class="flex-1 rounded-[20px] overflow-hidden shadow-sm relative">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/d1d2a4ceb6065b94046272d12b34341c.jpg' ); ?>" alt="Finished lyre sitting on a rustic stone castle window" class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Right -->
            <div class="w-full lg:w-1/3 flex flex-col items-center lg:items-start text-center lg:text-left">
                <div class="text-[#B08A57] text-7xl font-serif leading-none mb-4 font-semibold opacity-30 select-none">“</div>
                <blockquote class="text-[#4A3426] font-serif text-xl md:text-2xl leading-[1.65] italic mb-6">
                    "I never thought I could build something so beautiful. The wood feels alive."
                </blockquote>
                <cite class="text-[#7A6C5F] font-sans text-xs tracking-widest uppercase mb-10 block not-italic">
                    — Elara V.
                </cite>
                <a href="/join-workshop" class="border border-[#4A3426] text-[#4A3426] font-sans font-semibold text-xs tracking-[0.2em] uppercase px-8 py-4 rounded-xl hover:bg-[#4A3426] hover:text-[#FAF6F0] transition-colors duration-300">
                    JOIN THE WORKSHOP
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Philosophy Section -->
<section class="bg-[#FAF6F0] py-20 md:py-32 px-6 md:px-12 border-b border-[#D9D2C5]/30">
    <div class="max-w-[1280px] mx-auto flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
        <!-- Left Image -->
        <div class="w-full lg:w-1/2">
            <div class="aspect-[4/3] rounded-[24px] overflow-hidden bg-[#FAF6F0] shadow-sm border border-[#D9D2C5]/30">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCq1STlgC7RFhDB-zNkjUp_Zdmvg2TuIEPfkrcB-wTDaxKTCdok4WJI3Uf8zMiZWcP5WOk35qnUJ3IbBTaW2q606JNxl3iVhm40lQv7Vb8el989wDGwtL3xA4zvzC0xWLWCiGZTGC9T0KZ7e0HbofSghbHA7cPlhJvEu4cXGvXNkvOSNl-YvmCDj4m8zFGkFhjdB_ZrcgZB3LefA8eC5sDmzR1fPzomT6xWQEUhi6YWBwbm1nNmQbBxRfQhsJgB6UBseYd8HBP5Dg" alt="Rustic workshop table with blueprint rolls, inkwell, copper kettle" class="w-full h-full object-cover" />
            </div>
        </div>
        <!-- Right Story Column -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center text-left">
            <span class="text-[#B08A57] text-xs md:text-sm font-bold tracking-[0.25em] uppercase mb-4 block">
                PHILOSOPHY
            </span>
            <h2 class="text-4xl md:text-5xl font-serif text-[#4A3426] mb-8 font-medium leading-[1.12]">
                The Art of Ancient Sound
            </h2>
            <div class="text-[#7A6C5F] font-sans text-base md:text-lg leading-[1.75] space-y-6 max-w-xl">
                <p>
                    At Bardic, we believe music isn't just something you consume—it's something you inhabit. Our journey began in a small timber workshop, driven by a desire to reconnect with the acoustic resonance of our ancestors.
                </p>
                <p>
                    Each kit is a bridge across time. We use the same joinery principles used by master luthiers of the medieval era, simplified so you can master them in a single weekend. This is not assembly-line production; this is slow craftsmanship, reborn for the modern bard.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: FAQ (Common Inquiries) -->
<section class="bg-[#FAF6F0] py-20 md:py-28 px-6 md:px-12">
    <div class="max-w-[760px] mx-auto text-center">
        <h2 class="text-4xl md:text-5xl font-serif text-[#4A3426] mb-4 font-medium">
            Common Inquiries
        </h2>
        <p class="text-[#7A6C5F] font-sans text-sm md:text-base tracking-wide uppercase mb-16 opacity-75">
            Everything you need to know before you begin your craft.
        </p>

        <!-- Accordions -->
        <div class="space-y-4 text-left">
            <!-- Accordion 1 -->
            <details class="group bg-[#F3EDE2] border border-[#D9D2C5]/40 rounded-2xl p-6 transition-all duration-300 hover:shadow-sm" open>
                <summary class="flex justify-between items-center font-serif text-lg md:text-xl text-[#4A3426] font-medium cursor-pointer list-none focus:outline-none">
                    Do I need woodworking experience?
                    <span class="text-[#B08A57] transition-transform duration-300 group-open:rotate-185">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </summary>
                <p class="mt-4 text-[#7A6C5F] font-sans text-sm md:text-base leading-[1.7] border-t border-[#D9D2C5]/30 pt-4">
                    None at all. Our kits are "Ready-to-Assemble." The difficult shaping is done by us; the soul-enriching assembly and finishing are done by you. We provide step-by-step video tutorials for every stage.
                </p>
            </details>

            <!-- Accordion 2 -->
            <details class="group bg-[#F3EDE2] border border-[#D9D2C5]/40 rounded-2xl p-6 transition-all duration-300 hover:shadow-sm">
                <summary class="flex justify-between items-center font-serif text-lg md:text-xl text-[#4A3426] font-medium cursor-pointer list-none focus:outline-none">
                    How long does shipping take?
                    <span class="text-[#B08A57] transition-transform duration-300 group-open:rotate-185">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </summary>
                <p class="mt-4 text-[#7A6C5F] font-sans text-sm md:text-base leading-[1.7] border-t border-[#D9D2C5]/30 pt-4">
                    We currently ship only within the USA. Orders typically arrive within 7–10 business days. Each kit is packed in sustainable linen and recycled cardboard to protect the delicate wood components during transit.
                </p>
            </details>

            <!-- Accordion 3 -->
            <details class="group bg-[#F3EDE2] border border-[#D9D2C5]/40 rounded-2xl p-6 transition-all duration-300 hover:shadow-sm">
                <summary class="flex justify-between items-center font-serif text-lg md:text-xl text-[#4A3426] font-medium cursor-pointer list-none focus:outline-none">
                    What if I make a mistake during build?
                    <span class="text-[#B08A57] transition-transform duration-300 group-open:rotate-185">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </summary>
                <p class="mt-4 text-[#7A6C5F] font-sans text-sm md:text-base leading-[1.7] border-t border-[#D9D2C5]/30 pt-4">
                    We include "The Artisan's Insurance" with every kit. If you break or lose a component during assembly, we'll replace it for free—just cover the shipping. We want you to finish your instrument.
                </p>
            </details>
        </div>
    </div>
</section>
