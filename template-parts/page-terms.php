<?php
/**
 * Template part for displaying the Terms & Conditions page
 */
?>

<!-- Noise Overlay -->
<div class="fixed inset-0 z-[50] pointer-events-none opacity-[0.03] bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

<main class="w-full bg-background min-h-screen overflow-hidden selection:bg-muted selection:text-background pb-32">

    <!-- HERO SECTION -->
    <section class="relative w-full flex flex-col items-start justify-end px-4 md:px-12 pt-32 pb-20 max-w-[1600px] mx-auto gap-8">

        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 animate-fade-up">
            Legal Documentation
        </div>

        <h1 class="font-heading text-[4rem] md:text-[7rem] lg:text-[9rem] leading-[0.88] tracking-[-0.04em] text-foreground animate-fade-up" style="animation-delay: 80ms;">
            Terms &amp; <br/>
            <span class="italic font-serif text-muted opacity-80">Conditions.</span>
        </h1>

        <div class="flex flex-col md:flex-row items-start md:items-end justify-between w-full gap-6 animate-fade-up" style="animation-delay: 160ms;">
            <p class="text-base text-foreground/50 font-sans max-w-lg leading-relaxed">
                These terms govern your use of goviloop.com and the purchase of products from Goviloop. Please read carefully before proceeding.
            </p>
            <div class="flex items-center gap-3 shrink-0">
                <div class="w-2 h-2 rounded-full bg-foreground/30"></div>
                <span class="font-sans text-xs uppercase tracking-widest text-foreground/40">Last Updated: April 27, 2026</span>
            </div>
        </div>

        <!-- Divider -->
        <div class="w-full h-px bg-black/8 mt-4 animate-fade-up" style="animation-delay: 200ms;"></div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="w-full px-4 md:px-12 max-w-[1600px] mx-auto">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-start">

            <!-- Sticky Table of Contents -->
            <aside class="hidden lg:block lg:w-72 shrink-0 sticky top-8">
                <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <p class="font-sans text-[10px] uppercase tracking-[0.2em] text-foreground/40 mb-6">Table of Contents</p>
                        <nav class="flex flex-col gap-1" id="toc-nav">
                            <a href="#acceptance" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Acceptance</a>
                            <a href="#terms-of-use" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Terms of Use</a>
                            <a href="#copyright" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Copyright</a>
                            <a href="#trademarks" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Trademarks</a>
                            <a href="#user-content" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">User Content</a>
                            <a href="#acceptable-use" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Acceptable Use</a>
                            <a href="#warranties-use" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Warranties</a>
                            <a href="#terms-of-sale" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Terms of Sale</a>
                            <a href="#delivery" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Delivery</a>
                            <a href="#cancellation" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Cancellation</a>
                            <a href="#governing-law" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Governing Law</a>
                            <a href="#contact" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Contact</a>
                        </nav>
                    </div>
                </div>
            </aside>

            <!-- Content Body -->
            <div class="flex-1 min-w-0 flex flex-col gap-6">

                <!-- Acceptance -->
                <div id="acceptance" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            01 &mdash; Acceptance
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-6">
                            Your agreement to these terms.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed">
                            If you do not agree to these Terms, you may not use the Site or place an order. We reserve the right to modify these Terms at any time, and your continued use of the Site after changes constitutes your agreement to the updated Terms. Changes will not affect orders accepted prior to the update.
                        </p>
                    </div>
                </div>

                <!-- Terms of Use -->
                <div id="terms-of-use" class="rounded-[2rem] bg-foreground text-background p-1.5 ring-1 ring-foreground/10 scroll-reveal">
                    <div class="relative rounded-[calc(2rem-0.375rem)] bg-foreground p-8 md:p-12 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)]">
                        <div class="absolute -top-20 -right-20 w-80 h-80 bg-muted/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10">
                            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-white/10 text-background ring-1 ring-white/10 inline-block mb-6">
                                02 &mdash; Terms of Use
                            </div>
                            <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-background mb-6">
                                General site usage.
                            </h2>
                            <p class="font-sans text-base text-background/70 leading-relaxed">
                                The information and rules governing the Site may change. The "Last Updated" date above indicates the latest revision. Your use of the Site after changes signifies your acceptance of the updated terms.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Copyright + Trademarks -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div id="copyright" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col justify-between min-h-[280px] shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center mb-6">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="12" cy="12" r="10"/><path d="M14.83 14.83A4 4 0 119.17 9.17"/>
                                </svg>
                            </div>
                            <div>
                                <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-4">03 &mdash; Copyright</div>
                                <h3 class="font-heading text-xl mb-3">All rights reserved.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">
                                    All Site design, text, graphics, and their arrangement are the property of goviloop.com, &copy; 2026. You may copy or print portions solely for personal use. Any other use without prior written permission is strictly prohibited.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="trademarks" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 100ms;">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col justify-between min-h-[280px] shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center mb-6">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/>
                                </svg>
                            </div>
                            <div>
                                <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-4">04 &mdash; Trademarks</div>
                                <h3 class="font-heading text-xl mb-3">Protected identities.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">
                                    The goviloop.com site, mark, and logo are service marks of goviloop.com. All other trademarks, product names, or logos on the Site are the property of their respective owners.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Content -->
                <div id="user-content" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            05 &mdash; User-Generated Content
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-6">
                            What you submit, and what it means.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed mb-8">
                            You may submit content such as comments, blogs, or product reviews. You are solely responsible for your User Content, which is considered non-confidential and non-proprietary. By submitting User Content, you warrant that it does not violate any intellectual property, privacy, or publicity rights, and that you have the legal right to authorize goviloop.com to use the content.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-3">License Granted</p>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">You grant goviloop.com a perpetual, worldwide, non-exclusive, royalty-free, sublicensable license to use, reproduce, distribute, modify, and exploit your User Content in any media, including future technologies.</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-3">Social Media Tags</p>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">By using #goviloop.com or @goviloop.com, you grant an unrestricted, irrevocable, royalty-free license to use uploaded images in marketing materials and social media channels.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Acceptable Use -->
                <div id="acceptable-use" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            06 &mdash; Acceptable Use Policy
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-8">
                            What we prohibit.
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Submit content violating third-party intellectual property or privacy rights.</p>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Post unlawful, harmful, abusive, defamatory, or obscene content.</p>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Impersonate others or misrepresent affiliations with any person or entity.</p>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Transmit unsolicited advertising or promotional materials (spam).</p>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Upload viruses or code that disrupts Site functionality or infrastructure.</p>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Violate applicable laws, regulations, or interfere with Site security.</p>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Collect or use others' personal information without explicit consent.</p>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </div>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Overburden, impair, or disrupt the Site or its connected networks.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Warranties + Liability -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div id="warranties-use" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col gap-6 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div>
                                <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-4">07 &mdash; Warranties</div>
                                <h3 class="font-heading text-xl mb-3">Provided "as is."</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">
                                    Information on the Site is provided "AS IS" and "AS AVAILABLE." Your use of the Site is at your sole risk. To the extent permitted by law, we disclaim all warranties, express or implied, including those for availability, non-infringement, security, accuracy, or completeness.
                                </p>
                            </div>
                            <div class="rounded-[1rem] bg-black/3 p-4 ring-1 ring-black/5">
                                <p class="font-sans text-xs text-foreground/50 leading-relaxed">Nothing in these terms excludes liability for death or personal injury caused by negligence, fraud, or fraudulent misrepresentation.</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 100ms;">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col gap-6 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div>
                                <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-4">08 &mdash; Liability</div>
                                <h3 class="font-heading text-xl mb-3">Limitation of liability.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">
                                    To the extent permitted by law, goviloop.com and its affiliates are not liable for any direct, indirect, special, incidental, punitive, or consequential damages arising from the use or inability to use the Site, even if advised of such possibilities.
                                </p>
                            </div>
                            <div class="rounded-[1rem] bg-black/3 p-4 ring-1 ring-black/5">
                                <p class="font-sans text-xs text-foreground/50 leading-relaxed">This does not affect liability for death or personal injury caused by negligence, fraud, or fraudulent misrepresentation.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Terms of Sale Header -->
                <div id="terms-of-sale" class="rounded-[2rem] bg-foreground text-background p-1.5 ring-1 ring-foreground/10 scroll-reveal">
                    <div class="relative rounded-[calc(2rem-0.375rem)] bg-foreground p-8 md:p-16 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] flex flex-col md:flex-row items-center justify-between gap-12">
                        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-muted/15 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10 w-full md:w-2/3">
                            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-white/10 text-background ring-1 ring-white/10 inline-block mb-6">
                                Part II &mdash; Terms of Sale
                            </div>
                            <h2 class="font-heading text-[2.5rem] md:text-[4rem] leading-[1] tracking-[-0.03em] text-background mb-4">
                                How we sell, <br/><span class="italic font-serif opacity-70">and how we deliver.</span>
                            </h2>
                        </div>
                        <div class="relative z-10 w-full md:w-auto flex flex-col gap-4 shrink-0">
                            <div class="rounded-[1.25rem] bg-white/10 p-5">
                                <p class="font-heading text-3xl text-background mb-1">1 day</p>
                                <p class="font-sans text-xs text-background/60 uppercase tracking-widest">Response time</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-white/10 p-5">
                                <p class="font-heading text-3xl text-background mb-1">100%</p>
                                <p class="font-sans text-xs text-background/60 uppercase tracking-widest">Satisfaction guaranteed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order + Products + Prices -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] flex flex-col gap-4">
                            <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="font-sans text-[9px] uppercase tracking-widest text-foreground/40 mb-2">09 &mdash; Order Acceptance</p>
                                <h3 class="font-heading text-lg mb-3">When your order is confirmed.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">Acceptance occurs when you receive our confirmation email. We will notify you promptly if products are unavailable and refund accordingly.</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 100ms;">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] flex flex-col gap-4">
                            <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                            </div>
                            <div>
                                <p class="font-sans text-[9px] uppercase tracking-widest text-foreground/40 mb-2">10 &mdash; Prices & Payment</p>
                                <h3 class="font-heading text-lg mb-3">Transparent pricing, always.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">Prices are as shown at time of purchase. Payment is required upon dispatch. For installment shipments, payment may be taken per shipment.</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 200ms;">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] flex flex-col gap-4">
                            <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </div>
                            <div>
                                <p class="font-sans text-[9px] uppercase tracking-widest text-foreground/40 mb-2">11 &mdash; Our Products</p>
                                <h3 class="font-heading text-lg mb-3">Accuracy we stand behind.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">We aim to ensure accurate descriptions and prices, but errors may occur. We reserve the right to correct errors, even after submission, and will notify you of any material impact.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery -->
                <div id="delivery" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            12 &mdash; Delivery
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-6">
                            From our hands to your home.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed mb-8">
                            We provide an estimated delivery date in the confirmation email and aim to deliver within that period unless otherwise agreed. Some products require a signature upon delivery. Delays due to circumstances beyond our control may occur, and we will notify you to minimize impact. We are not liable for such delays.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5 text-center">
                                <p class="font-heading text-2xl text-foreground mb-2">Free</p>
                                <p class="font-sans text-xs uppercase tracking-widest text-foreground/50">Storage &amp; Redelivery</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5 text-center">
                                <p class="font-heading text-2xl text-foreground mb-2">Tracked</p>
                                <p class="font-sans text-xs uppercase tracking-widest text-foreground/50">Every shipment</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5 text-center">
                                <p class="font-heading text-2xl text-foreground mb-2">White-Glove</p>
                                <p class="font-sans text-xs uppercase tracking-widest text-foreground/50">Premium placement</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Risk + Cancellation -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col gap-4 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block">13 &mdash; Risk &amp; Ownership</div>
                            <h3 class="font-heading text-xl">When it is yours.</h3>
                            <p class="font-sans text-sm text-foreground/60 leading-relaxed">
                                You assume responsibility for products upon delivery to the specified address. Ownership transfers once full payment is received.
                            </p>
                        </div>
                    </div>

                    <div id="cancellation" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 100ms;">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col gap-4 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block">14 &mdash; Right to Cancel</div>
                            <h3 class="font-heading text-xl">Your cancellation rights.</h3>
                            <p class="font-sans text-sm text-foreground/60 leading-relaxed">
                                Your cancellation rights are outlined in our Returns Policy and depend on the product, reason for return, and timing. Manufacturer warranties may provide additional rights directed to the manufacturer.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Governing Law -->
                <div id="governing-law" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            15 &mdash; Governing Law
                        </div>
                        <div class="flex flex-col md:flex-row justify-between items-start gap-8">
                            <div class="w-full md:w-1/2">
                                <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-4">
                                    Jurisdiction &amp; compliance.
                                </h2>
                                <p class="font-sans text-base text-foreground/70 leading-relaxed">
                                    These Terms and any related non-contractual obligations are governed by the laws of the United States. The Site is operated from our offices in Houston, TX. We make no representation that the Site's content is appropriate or legal in other jurisdictions.
                                </p>
                            </div>
                            <div class="w-full md:w-auto shrink-0">
                                <div class="rounded-[1.5rem] bg-black/3 p-6 ring-1 ring-black/5">
                                    <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-3">Jurisdiction</p>
                                    <p class="font-heading text-lg text-foreground">United States</p>
                                    <p class="font-sans text-sm text-foreground/50 mt-1">Houston, TX 77056</p>
                                    <p class="font-sans text-xs text-foreground/40 mt-3">2800 Post Oak Boulevard,<br/>Suite 4100</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact CTA -->
                <div id="contact" class="rounded-[2rem] bg-foreground text-background p-1.5 ring-1 ring-foreground/10 scroll-reveal">
                    <div class="relative rounded-[calc(2rem-0.375rem)] bg-foreground p-8 md:p-16 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] flex flex-col md:flex-row items-center justify-between gap-12 z-10">
                        <div class="absolute -top-20 -right-20 w-80 h-80 bg-muted/15 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10 w-full md:w-1/2">
                            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-white/10 text-background ring-1 ring-white/10 inline-block mb-6">
                                Questions?
                            </div>
                            <h2 class="font-heading text-[2.5rem] md:text-[3.5rem] leading-[1.05] tracking-[-0.02em] text-background mb-4">
                                We welcome <br/> your questions.
                            </h2>
                            <p class="font-sans text-background/70 text-base leading-relaxed">
                                We reply within 1 business day. Don't hesitate to reach out with any questions, comments, or concerns about these terms.
                            </p>
                        </div>
                        <div class="relative z-10 w-full md:w-auto flex flex-col gap-4 shrink-0">
                            <a href="mailto:info@goviloop.com" class="group flex items-center gap-4 rounded-full bg-white/10 hover:bg-white/20 ring-1 ring-white/15 px-8 py-5 transition-all duration-500">
                                <span class="font-sans font-medium text-background">info@goviloop.com</span>
                                <div class="w-8 h-8 rounded-full bg-background/10 flex items-center justify-center transition-transform duration-500 group-hover:translate-x-1">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7 17L17 7M17 7H7M17 7V17"/>
                                    </svg>
                                </div>
                            </a>
                            <div class="rounded-[1.25rem] bg-white/5 ring-1 ring-white/10 px-8 py-5">
                                <p class="font-sans text-xs text-background/40 uppercase tracking-widest mb-1">Address</p>
                                <p class="font-sans text-sm text-background/80">2800 Post Oak Blvd, Suite 4100<br/>Houston, TX 77056, United States</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CLOSING STATEMENT -->
    <section class="w-full py-32 md:py-48 flex items-center justify-center text-center px-4 scroll-reveal">
        <h2 class="font-heading text-[3.5rem] md:text-[6rem] lg:text-[8rem] leading-[0.9] tracking-[-0.04em] text-foreground/10 hover:text-foreground transition-colors duration-[1.5s] ease-fluid cursor-default">
            Built on <br/> <span class="italic font-serif">trust.</span>
        </h2>
    </section>

</main>

<style>
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(4rem); filter: blur(8px); }
    to   { opacity: 1; transform: translateY(0);    filter: blur(0);  }
}
.animate-fade-up {
    animation: fadeUp 1s cubic-bezier(0.32, 0.72, 0, 1) forwards;
    opacity: 0;
}
.scroll-reveal {
    opacity: 0;
    transform: translateY(4rem);
    filter: blur(8px);
    transition: all 1s cubic-bezier(0.32, 0.72, 0, 1);
}
.scroll-reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
    filter: blur(0);
}
.toc-link.is-active {
    background: rgba(0,0,0,0.05);
    color: var(--color-foreground, #111);
    font-weight: 500;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { root: null, rootMargin: '0px', threshold: 0.1 });

    document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

    const sections = document.querySelectorAll('[id]');
    const tocLinks = document.querySelectorAll('.toc-link');

    const tocObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                tocLinks.forEach(l => l.classList.remove('is-active'));
                const active = document.querySelector('.toc-link[href="#' + entry.target.id + '"]');
                if (active) active.classList.add('is-active');
            }
        });
    }, { root: null, rootMargin: '-20% 0px -70% 0px', threshold: 0 });

    sections.forEach(s => tocObserver.observe(s));
});
</script>
