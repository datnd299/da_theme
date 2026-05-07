<?php
/**
 * Template Part: Track Your Order
 * 
 * Simplified tracking page following Shop Kelli Design System.
 * Uses WooCommerce core shortcode to ensure compatibility and stability.
 */
?>

<div class="virtual-page--track-order">
    <section>
        <div class="text-center">
            <span class="subtitle-label">Order Status</span>
            <h1>Track Your Order</h1>
            <p class="intro-text">
                Enter your order details below to see your shipment status. We'll let you know exactly where your boutique treasures are.
            </p>
        </div>

        <div class="track-order-form-wrapper">
            <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>

            <div class="track-help-box">
                <div class="track-help-content">
                    <div class="track-help-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                    </div>
                    <div class="track-help-text">
                        <h4>Need help tracking?</h4>
                        <p>
                            If you have any trouble, please reach out to us at <a href="mailto:support@shopkelli.com">support@shopkelli.com</a> with your order number.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Trust badges -->
        <div class="track-trust-badges">
            <div class="trust-badge-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                Secure Tracking
            </div>
            <div class="trust-badge-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                Real-time Updates
            </div>
            <div class="trust-badge-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                Order Protection
            </div>
        </div>
    </section>
</div>


