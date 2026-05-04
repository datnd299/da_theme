<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();
?>
<?php wp_enqueue_style( '404-style', get_template_directory_uri() . '/assets/css/tw-404.css' ); ?>

<main id="primary" class="relative site-main error-404 min-h-[100dvh] flex items-center justify-center bg-background overflow-hidden px-4 py-24 md:py-40">
  
  <!-- Subtle noise overlay for physical paper feel -->
  <div class="fixed inset-0 z-50 pointer-events-none opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E');"></div>

  <div class="relative z-10 w-full max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-16 md:gap-24">
    
    <!-- Left side: Massive Typography (Editorial Split) -->
    <div class="w-full md:w-1/2 flex flex-col items-start space-y-8">
      <!-- Eyebrow -->
      <span class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium border border-foreground/10 text-foreground/70" style="opacity: 0; animation: fadeUp 1s cubic-bezier(0.32, 0.72, 0, 1) forwards;">
        Error 404
      </span>
      
      <!-- Heading -->
      <h1 class="font-heading text-7xl md:text-[8rem] lg:text-[10rem] leading-[0.85] tracking-tight text-foreground" style="opacity: 0; animation: fadeUp 1s cubic-bezier(0.32, 0.72, 0, 1) 0.15s forwards;">
        NOT<br/>
        <span class="text-muted italic font-light">FOUND.</span>
      </h1>
      
      <!-- Text -->
      <p class="font-sans text-lg md:text-xl text-foreground/60 max-w-md leading-relaxed" style="opacity: 0; animation: fadeUp 1s cubic-bezier(0.32, 0.72, 0, 1) 0.3s forwards;">
        <?php esc_html_e( 'The space you are looking for has vanished into the digital ether. It might have been moved, or it simply never existed.', 'dawp' ); ?>
      </p>
      
      <!-- Double Bezel CTA -->
      <div class="mt-8" style="opacity: 0; animation: fadeUp 1s cubic-bezier(0.32, 0.72, 0, 1) 0.45s forwards;">
        <div class="p-2 rounded-[3rem] bg-foreground/5 ring-1 ring-foreground/10 inline-block">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="group flex items-center gap-4 bg-foreground text-surface rounded-full pl-8 pr-2 py-2 font-sans font-medium text-sm transition-all duration-700 ease-fluid active:scale-[0.98] shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)] hover:bg-foreground/90">
            <span><?php esc_html_e( 'Return to Home', 'dawp' ); ?></span>
            <!-- Button-in-Button Trailing Icon -->
            <div class="w-10 h-10 rounded-full bg-surface/10 flex items-center justify-center transition-all duration-700 ease-fluid group-hover:translate-x-1 group-hover:-translate-y-[1px] group-hover:scale-105">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </div>
          </a>
        </div>
      </div>
    </div>
    
    <!-- Right side: The Asymmetrical Bento / Z-Axis Cascade -->
    <div class="w-full md:w-1/2 flex justify-center md:justify-end" style="opacity: 0; animation: fadeUp 1.2s cubic-bezier(0.32, 0.72, 0, 1) 0.6s forwards;">
      
      <div class="relative w-full max-w-lg mt-12 md:mt-0">
        <!-- Background offset card -->
        <div class="absolute -inset-4 md:-inset-8 bg-muted/10 rounded-[2.5rem] md:rounded-[3.5rem] transform -rotate-3 transition-transform duration-1000 ease-fluid hover:rotate-0"></div>
        
        <!-- Main Double-Bezel Card -->
        <div class="relative p-2 rounded-[2rem] md:rounded-[3rem] bg-foreground/5 ring-1 ring-foreground/10 backdrop-blur-sm transform rotate-2 transition-transform duration-1000 ease-fluid hover:rotate-0">
          <div class="w-full aspect-[4/5] rounded-[calc(2rem-0.5rem)] md:rounded-[calc(3rem-0.5rem)] bg-surface shadow-[inset_0_1px_1px_rgba(0,0,0,0.05)] overflow-hidden relative group">
            
            <!-- Interior Layout Grid -->
            <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-between">
              <!-- Top bar of card -->
              <div class="flex justify-between items-center border-b border-foreground/10 pb-4">
                <span class="font-sans text-xs text-foreground/50 tracking-widest uppercase">System</span>
                <span class="w-2 h-2 rounded-full bg-muted animate-pulse"></span>
              </div>
              
              <!-- Center massive 404 display -->
              <div class="flex-grow flex items-center justify-center">
                <div class="relative">
                  <!-- Blurred underlay for depth -->
                  <div class="absolute inset-0 font-heading text-[8rem] md:text-[12rem] leading-none text-muted blur-xl opacity-50 select-none">
                    404
                  </div>
                  <!-- Foreground sharp text -->
                  <div class="relative font-heading text-[8rem] md:text-[12rem] leading-none text-foreground select-none transition-transform duration-700 ease-fluid group-hover:scale-105 group-hover:-rotate-2">
                    404
                  </div>
                </div>
              </div>
              
              <!-- Bottom data block -->
              <div class="border-t border-foreground/10 pt-4 flex justify-between items-end">
                <div class="flex flex-col gap-1">
                  <span class="font-sans text-[10px] text-foreground/40 uppercase">Status Code</span>
                  <span class="font-heading text-sm text-foreground">Missing resource</span>
                </div>
                <div class="text-right flex flex-col gap-1">
                  <span class="font-sans text-[10px] text-foreground/40 uppercase">Coordinates</span>
                  <span class="font-heading text-sm text-foreground">0.00&deg; N, 0.00&deg; E</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  
  <style>
    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(3rem) scale(0.98);
        filter: blur(8px);
      }
      to {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
      }
    }
  </style>
</main>

<?php
get_footer();
