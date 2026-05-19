<?php
/**
 * Template Part: About Us
 * Bardic – Rediscover the Art of Ancient Sound
 */
?>

<!-- Page Hero -->
<section class="bg-[#FAF6F0] pt-20 pb-16 px-6 md:px-12 border-b border-[#D9D2C5]/40">
    <div class="max-w-[820px] mx-auto text-center">
        <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Our Story</span>
        <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-[#4A3426] leading-[1.1] mb-6 font-medium">
            About Us
        </h1>
        <p class="text-[#7A6C5F] font-sans text-base md:text-lg leading-[1.8] max-w-2xl mx-auto">
            Welcome to Bardic, your trusted destination for premium DIY Lyre Kits.
        </p>
    </div>
</section>

<!-- Artisan Image Banner -->
<section class="bg-[#4A3426] relative overflow-hidden" style="height:340px;">
    <div class="absolute inset-0 bg-cover bg-center opacity-40" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuBLKtP8OwAhPBrQ1XBZB3mEGk_O4pFOBTGa9smrq6pq8F-hPBh5N-z5W2G5GMt8Uw0wd2z0F7Pq_TtSmwRnmg0b7tHBWX_TjXpW6u0w7m4C5J8PqXlJWBUU4VaINz3Vc_lFl9-JuMqIl8eSS0T6VfJCAx2i26q_cOhuyZ22sIOmHEFIhfN8Kf3J23hpMv5f4e_6VGM3fZJuefuV0c1E1ZBrMz9EzGpYL6vu7pBVL4fQVFy3RxlhNDlzBDFe6TI5OVxDLlLIuSNVS_k=w1232-h924-no')"></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <p class="text-[#FAF6F0] font-serif text-2xl md:text-3xl lg:text-4xl italic text-center max-w-3xl px-8 leading-[1.4] opacity-95">
            "From the warmth of natural wood to the final tuned strings — every step is part of the experience."
        </p>
    </div>
</section>

<!-- Mission -->
<section class="bg-[#FAF6F0] py-20 px-6 md:px-12">
    <div class="max-w-[820px] mx-auto">
        <p class="text-[#7A6C5F] font-sans text-base md:text-lg leading-[1.9] mb-8">
            Our mission is simple: To provide music enthusiasts and hobbyists with high-quality, engaging, and rewarding kits that support your creative journey. We believe that every individual deserves the joy of creating music, and every crafter deserves peace of mind throughout the assembly process.
        </p>
        <p class="text-[#7A6C5F] font-sans text-base md:text-lg leading-[1.9]">
            We are proud to serve families and makers across the United States and look forward to being a small part of your musical journey.
        </p>
    </div>
</section>

<!-- Philosophy Grid (Why Choose Us?) -->
<section class="bg-[#F3EDE2] py-20 px-6 md:px-12 border-t border-[#D9D2C5]/40">
    <div class="max-w-[1100px] mx-auto">
        <div class="text-center mb-14">
            <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-3">Our Core Pillars</span>
            <h2 class="font-serif text-3xl md:text-4xl text-[#4A3426] font-medium">Why Choose Us?</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <?php
            $values = [
                ['icon' => '🪵', 'title' => 'Curated Quality', 'desc' => 'We carefully select every item in our collection, focusing on high-quality materials and functional designs to ensure a superior DIY experience.'],
                ['icon' => '🛡️', 'title' => 'The Artisan\'s Insurance', 'desc' => 'We stand behind the quality of our kits. If you break or lose a component during assembly, we provide a free replacement—you simply cover the shipping—to ensure you can successfully finish your instrument.'],
                ['icon' => '🚚', 'title' => 'Reliable Service', 'desc' => 'We offer free shipping within the Continental United States and a straightforward 30-day return policy to ensure a hassle-free shopping experience.'],
                ['icon' => '🤝', 'title' => 'Our Commitment', 'desc' => 'At Bardic, we prioritize your satisfaction and the quality of your finished instrument above all else. Every product we ship is inspected to meet our strict quality standards.'],
            ];
            foreach ($values as $v): ?>
            <div class="bg-[#FAF6F0] rounded-2xl p-8 border border-[#D9D2C5]/40 flex gap-5">
                <span class="text-3xl mt-0.5 shrink-0"><?= $v['icon'] ?></span>
                <div>
                    <h3 class="font-serif text-lg text-[#4A3426] mb-2 font-medium"><?= $v['title'] ?></h3>
                    <p class="text-[#7A6C5F] font-sans text-sm leading-[1.7]"><?= $v['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Handcrafted Character + Beginner Friendly -->
<section class="bg-[#FAF6F0] py-20 px-6 md:px-12 border-t border-[#D9D2C5]/40">
    <div class="max-w-[1100px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
            <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Handcrafted Character</span>
            <h2 class="font-serif text-2xl md:text-3xl text-[#4A3426] mb-4 font-medium">Every Piece is Unique</h2>
            <p class="text-[#7A6C5F] font-sans text-sm md:text-base leading-[1.8]">
                Because our kits use natural wood materials, each piece may feature subtle variations in grain, tone, texture, and appearance. These natural differences are part of the handcrafted character and individuality of every Bardic instrument.
            </p>
        </div>
        <div>
            <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Beginner Friendly</span>
            <h2 class="font-serif text-2xl md:text-3xl text-[#4A3426] mb-4 font-medium">No Experience Required</h2>
            <p class="text-[#7A6C5F] font-sans text-sm md:text-base leading-[1.8]">
                No musical or woodworking experience is required. Our kits are designed to be approachable, relaxing, and enjoyable for beginners and hobbyists alike. If you can follow steps, you can build a lyre.
            </p>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="bg-[#4A3426] py-16 px-6 md:px-12 text-center text-[#FAF6F0]">
    <div class="max-w-[600px] mx-auto">
        <h2 class="font-serif text-2xl md:text-3xl mb-4 font-medium">Questions? We're Here.</h2>
        <p class="text-[#FAF6F0]/70 font-sans text-sm leading-[1.7] mb-6">
            If you have any questions, our dedicated support team is ready to assist.
        </p>
        <div class="inline-block bg-[#FAF6F0]/5 border border-[#FAF6F0]/10 rounded-2xl p-6 text-left font-sans text-xs space-y-2 mb-8">
            <p><strong>Store Name:</strong> Bardic</p>
            <p><strong>Email:</strong> <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] hover:underline">contact@bardicshop.com</a></p>
            <p><strong>Address:</strong> 2000 Parkview Dr, South Holland, IL 60473</p>
            <p><strong>Customer Service Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM (EST)</p>
        </div>
        <div>
            <a href="mailto:contact@bardicshop.com" class="inline-flex items-center gap-2 bg-[#B08A57] text-[#FAF6F0] px-8 py-3 rounded-full font-sans text-sm font-semibold tracking-wide hover:bg-[#FAF6F0] hover:text-[#4A3426] transition-all duration-300">
                contact@bardicshop.com
            </a>
        </div>
    </div>
</section>
