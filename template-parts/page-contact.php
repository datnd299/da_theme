<?php
/**
 * Template part for displaying the Contact page
 */
?>

<main class="w-full bg-white font-['Be_Vietnam_Pro',sans-serif] selection:bg-black selection:text-white">

    <!-- ═══════════════════════════════════════════
         HEADER
    ════════════════════════════════════════════ -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 md:pt-32 pb-16">
        <h2 class="text-xs uppercase tracking-widest text-neutral-500 font-bold mb-4">Contact Us</h2>
        <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-neutral-900 mb-6">
            Let's <em class="font-serif not-italic text-neutral-400 font-normal">Connect.</em>
        </h1>
        <p class="text-lg md:text-xl text-neutral-600 max-w-2xl leading-relaxed">
            Have a question about your order, need sizing advice, or just want to say hi? We'd love to hear from you.
        </p>
    </section>

    <!-- ═══════════════════════════════════════════
         MAIN CONTENT (Contact Info & Form)
    ════════════════════════════════════════════ -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 md:pb-32">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24">
            
            <!-- Contact Information -->
            <div class="space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-neutral-900 mb-8">Get in Touch</h3>
                    <div class="space-y-8">
                        
                        <!-- Email -->
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-neutral-50 rounded-full flex items-center justify-center shrink-0 border border-neutral-200">
                                <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-neutral-900 uppercase tracking-wider mb-1">Email</h4>
                                <a href="mailto:support@werewear.co" class="text-neutral-600 hover:text-black transition-colors font-medium">support@werewear.co</a>
                                <p class="text-sm text-neutral-500 mt-1">We aim to reply within 1 business day.</p>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-neutral-50 rounded-full flex items-center justify-center shrink-0 border border-neutral-200">
                                <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-neutral-900 uppercase tracking-wider mb-1">Office</h4>
                                <p class="text-neutral-600 leading-relaxed">
                                    <strong class="font-medium text-black">Werewear</strong><br>
                                    2800 Post Oak Boulevard, Suite 4100<br>
                                    Houston, TX 77056, United States
                                </p>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-neutral-50 rounded-full flex items-center justify-center shrink-0 border border-neutral-200">
                                <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-neutral-900 uppercase tracking-wider mb-1">Business Hours</h4>
                                <p class="text-neutral-600 leading-relaxed">
                                    Monday – Friday<br>
                                    9:00 AM – 6:00 PM (CST)
                                </p>
                            </div>
                        </div>
                        
                        <!-- Social -->
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-neutral-50 rounded-full flex items-center justify-center shrink-0 border border-neutral-200">
                                <svg class="w-5 h-5 text-neutral-600" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-neutral-900 uppercase tracking-wider mb-1">Social</h4>
                                <a href="https://web.facebook.com/wewearclothing" target="_blank" class="text-neutral-600 hover:text-black transition-colors font-medium">Message us on Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Callout -->
                <div class="bg-neutral-50 p-8 rounded-3xl border border-neutral-200">
                    <h4 class="text-lg font-bold text-neutral-900 mb-2">Looking for quick answers?</h4>
                    <p class="text-neutral-600 mb-4 text-sm leading-relaxed">Check out our FAQ page for quick answers to common questions about shipping, returns, and more.</p>
                    <a href="<?php echo esc_url( home_url('/faq/') ); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-black uppercase tracking-wider hover:underline">
                        Read FAQ 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 md:p-12 rounded-[2.5rem] border border-neutral-200 shadow-sm h-fit">
                <h3 class="text-2xl font-bold text-neutral-900 mb-8">Send a Message</h3>
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="first_name" class="block text-xs font-bold uppercase tracking-wider text-neutral-500">First Name *</label>
                            <input type="text" id="first_name" name="first_name" required class="w-full px-4 py-3 bg-neutral-50 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition-all">
                        </div>
                        <div class="space-y-2">
                            <label for="last_name" class="block text-xs font-bold uppercase tracking-wider text-neutral-500">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" required class="w-full px-4 py-3 bg-neutral-50 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition-all">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-neutral-500">Email Address *</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 bg-neutral-50 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition-all">
                    </div>

                    <div class="space-y-2">
                        <label for="order_number" class="block text-xs font-bold uppercase tracking-wider text-neutral-500">Order Number <span class="text-neutral-400 normal-case font-normal tracking-normal">(Optional)</span></label>
                        <input type="text" id="order_number" name="order_number" placeholder="#WW12345" class="w-full px-4 py-3 bg-neutral-50 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition-all">
                    </div>

                    <div class="space-y-2">
                        <label for="message" class="block text-xs font-bold uppercase tracking-wider text-neutral-500">Message *</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 bg-neutral-50 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition-all resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full px-8 py-4 bg-black text-white text-sm font-bold uppercase tracking-wider rounded-xl hover:bg-neutral-800 transition-all active:scale-95 mt-4">
                        Send Message
                    </button>
                </form>
            </div>
            
        </div>
    </section>

</main>
