<?php
/**
 * Template Part: Track Your Order
 * 
 * Rebuilt with UK Official Store industrial aesthetic.
 */

$support_email = 'support@ukofficialstore.com';
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$categories = function_exists('dawp_shop_category_items') ? dawp_shop_category_items() : [];
?>

<style>
    /* WooCommerce Tracking Form Overrides */
    .track_order {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    .track_order p {
        margin: 0 !important;
        color: var(--color-foreground-muted);
        font-size: 0.95rem;
        line-height: 1.6;
    }
    .track_order .form-row {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        width: 100% !important;
        float: none !important;
    }
    .track_order label {
        font-weight: 700;
        color: var(--color-navy);
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }
    .track_order input.input-text {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--color-border);
        border-radius: 0.75rem;
        background-color: white;
        transition: all 0.2s;
        outline: none;
    }
    .track_order input.input-text:focus {
        border-color: var(--color-blue);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }
    .track_order .button {
        background-color: var(--color-navy) !important;
        color: white !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        padding: 1rem 2rem !important;
        border-radius: 0.75rem !important;
        border: none !important;
        cursor: pointer !important;
        transition: all 0.2s !important;
        font-size: 0.875rem !important;
        margin-top: 0.5rem !important;
        width: 100% !important;
    }
    .track_order .button:hover {
        background-color: var(--color-blue) !important;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(11, 31, 51, 0.2);
    }

    /* WooCommerce Tracking Result Overrides */
    .track-order-result {
        color: var(--color-navy);
    }
    .track-order-result .order-info {
        position: relative;
        display: block;
        margin: 0 0 2.25rem !important;
        padding: 1.15rem 1.35rem;
        border: 1px solid rgba(37, 99, 235, 0.16);
        border-radius: 1.5rem;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.09), rgba(243, 245, 247, 0.9));
        color: var(--color-navy);
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.7;
        text-align: center;
    }
    .track-order-result mark,
    .track-order-result .order-info mark {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        background-color: rgba(37, 99, 235, 0.12);
        color: var(--color-blue);
        padding: 0.12rem 0.5rem;
        font-weight: 900;
        white-space: nowrap;
    }
    .track-order-result .woocommerce-order-details {
        overflow: hidden;
        margin-top: 0;
        border: 1px solid var(--color-border);
        border-radius: 1.5rem;
        background-color: #fff;
        box-shadow: 0 18px 45px rgba(11, 31, 51, 0.08);
    }
    .track-order-result .woocommerce-order-details__title {
        margin: 0;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--color-border);
        background-color: var(--color-navy);
        color: #fff;
        font-size: 0.85rem;
        font-weight: 900;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
    .track-order-result .shop_table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
        table-layout: fixed;
    }
    .track-order-result .shop_table th,
    .track-order-result .shop_table td {
        padding: 1rem 1.5rem;
        border: 0;
        border-bottom: 1px solid var(--color-border);
        color: var(--color-navy);
        text-align: left;
        vertical-align: middle;
    }
    .track-order-result .shop_table thead th {
        background-color: var(--color-surface-alt);
        color: var(--color-foreground-muted);
        font-size: 0.72rem;
        font-weight: 900;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
    .track-order-result .shop_table th:last-child,
    .track-order-result .shop_table td:last-child,
    .track-order-result .shop_table .product-total,
    .track-order-result .shop_table .woocommerce-table__product-total {
        text-align: right;
    }
    .track-order-result .shop_table tbody td {
        font-size: 0.95rem;
        font-weight: 700;
    }
    .track-order-result .shop_table tbody a {
        color: var(--color-navy);
        font-weight: 800;
        text-decoration: none;
    }
    .track-order-result .shop_table tbody a:hover {
        color: var(--color-blue);
    }
    .track-order-result .shop_table .product-quantity {
        color: var(--color-foreground-muted);
        font-weight: 600;
    }
    .track-order-result .shop_table tfoot th {
        color: var(--color-foreground-muted);
        font-size: 0.86rem;
        font-weight: 800;
    }
    .track-order-result .shop_table tfoot td {
        font-size: 0.95rem;
        font-weight: 900;
    }
    .track-order-result .shop_table tfoot tr:last-child th,
    .track-order-result .shop_table tfoot tr:last-child td {
        border-bottom: 0;
        background-color: rgba(243, 245, 247, 0.65);
        color: var(--color-navy);
        font-size: 1.05rem;
    }
    .track-order-result .shop_table .button,
    .track-order-result .shop_table a.button,
    .track-order-result .order-again .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 2.5rem;
        border-radius: 999px !important;
        background-color: var(--color-navy) !important;
        color: #fff !important;
        padding: 0.7rem 1.1rem !important;
        font-size: 0.72rem !important;
        font-weight: 900 !important;
        letter-spacing: 0.06em !important;
        line-height: 1 !important;
        text-transform: uppercase !important;
        text-decoration: none !important;
    }
    .track-order-result .shop_table .button:hover,
    .track-order-result .shop_table a.button:hover,
    .track-order-result .order-again .button:hover {
        background-color: var(--color-blue) !important;
        transform: translateY(-1px);
    }
    .track-order-result .woocommerce-customer-details {
        margin-top: 1.5rem;
        padding: 1.5rem;
        border: 1px solid var(--color-border);
        border-radius: 1.5rem;
        background-color: #fff;
    }
    .track-order-result .woocommerce-customer-details .woocommerce-column__title {
        margin: 0 0 1rem;
        color: var(--color-navy);
        font-size: 0.85rem;
        font-weight: 900;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
    .track-order-result .woocommerce-customer-details address {
        color: var(--color-foreground-muted);
        font-style: normal;
        font-weight: 600;
        line-height: 1.7;
    }
    @media (min-width: 640px) {
        .track_order .form-row-first, 
        .track_order .form-row-last {
            width: 100% !important;
        }
    }
    @media (max-width: 639px) {
        .track-order-result .order-info {
            margin-bottom: 1.5rem !important;
            padding: 1rem;
            border-radius: 1.25rem;
            font-size: 0.92rem;
            text-align: left;
        }
        .track-order-result .woocommerce-order-details {
            border-radius: 1.25rem;
        }
        .track-order-result .woocommerce-order-details__title {
            padding: 1rem;
        }
        .track-order-result .shop_table,
        .track-order-result .shop_table thead,
        .track-order-result .shop_table tbody,
        .track-order-result .shop_table tfoot,
        .track-order-result .shop_table tr,
        .track-order-result .shop_table th,
        .track-order-result .shop_table td {
            display: block;
            width: 100%;
        }
        .track-order-result .shop_table thead {
            display: none;
        }
        .track-order-result .shop_table tbody tr,
        .track-order-result .shop_table tfoot tr {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid var(--color-border);
        }
        .track-order-result .shop_table tbody tr:last-child,
        .track-order-result .shop_table tfoot tr:last-child {
            border-bottom: 0;
        }
        .track-order-result .shop_table th,
        .track-order-result .shop_table td {
            padding: 0.25rem 0;
            border-bottom: 0;
            text-align: left !important;
        }
        .track-order-result .shop_table tbody td,
        .track-order-result .shop_table tfoot tr {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .track-order-result .shop_table tbody td::before,
        .track-order-result .shop_table tfoot th {
            color: var(--color-foreground-muted);
            font-size: 0.7rem;
            font-weight: 900;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .track-order-result .shop_table tbody td::before {
            content: attr(data-title);
            flex: 0 0 auto;
        }
        .track-order-result .shop_table tfoot th,
        .track-order-result .shop_table tfoot td {
            display: block;
            padding: 0;
        }
        .track-order-result .shop_table tfoot tr:last-child {
            background-color: rgba(243, 245, 247, 0.65);
        }
        .track-order-result .shop_table tfoot tr:last-child th,
        .track-order-result .shop_table tfoot tr:last-child td {
            background-color: transparent;
        }
    }
</style>

<main class="bg-white min-h-screen">

    <!-- Header / Hero Section -->
    <section class="relative bg-navy py-20 lg:py-32 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2"></div>
        </div>
        
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 rounded-full bg-blue/20 px-4 py-1.5 text-xs font-black uppercase tracking-widest text-blue mb-6">
                <span class="flex h-2 w-2 rounded-full bg-blue animate-pulse"></span>
                <?php esc_html_e('Order Status', 'dawp'); ?>
            </span>
            <h1 class="text-4xl font-black tracking-tight text-white sm:text-6xl lg:text-7xl">
                TRACK YOUR <span class="text-blue">ORDER</span>
            </h1>
            <p class="mt-6 mx-auto max-w-2xl text-lg leading-relaxed text-white/70 font-medium">
                <?php esc_html_e('Enter your order details below to see your shipment status. We\'ll help you follow your UK Official Store order from checkout to delivery.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <!-- Tracking Form Section -->
    <section class="relative z-20 -mt-10 pb-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6">
            <div class="overflow-hidden rounded-[2.5rem] border border-border bg-white shadow-2xl">
                <div class="bg-surface-alt/50 px-8 py-10 sm:px-12">
                    <div class="track-order-result max-w-none">
                        <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                    </div>
                </div>
                
                <div class="border-t border-border bg-white p-8 sm:px-12">
                    <div class="flex flex-col sm:flex-row items-center gap-6">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-navy text-white">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-navy"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h4>
                            <p class="mt-1 text-sm font-medium text-foreground-muted leading-relaxed">
                                <?php esc_html_e('If you have any trouble, reach out to our support team at ', 'dawp'); ?>
                                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="font-bold text-blue hover:underline"><?php echo esc_html($support_email); ?></a>
                                <?php esc_html_e(' with your order number.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trust Badges -->
            <div class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="flex items-center gap-4 rounded-2xl border border-border bg-surface-alt/30 p-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-blue shadow-sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <span class="text-sm font-bold text-navy uppercase tracking-tight"><?php esc_html_e('Secure Tracking', 'dawp'); ?></span>
                </div>
                <div class="flex items-center gap-4 rounded-2xl border border-border bg-surface-alt/30 p-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-blue shadow-sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <span class="text-sm font-bold text-navy uppercase tracking-tight"><?php esc_html_e('Live Updates', 'dawp'); ?></span>
                </div>
                <div class="flex items-center gap-4 rounded-2xl border border-border bg-surface-alt/30 p-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-blue shadow-sm">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path></svg>
                    </div>
                    <span class="text-sm font-bold text-navy uppercase tracking-tight"><?php esc_html_e('Fast Delivery', 'dawp'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse Collections -->
    <section class="border-t border-border bg-surface-alt/20 py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 flex flex-col items-center text-center">
                <h2 class="text-3xl font-black tracking-tight text-navy sm:text-4xl">
                    BROWSE <span class="text-blue">COLLECTIONS</span>
                </h2>
                <p class="mt-4 max-w-2xl text-base font-medium text-foreground-muted">
                    <?php esc_html_e('Explore our latest high-performance activewear while you wait for your delivery.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($categories as $cat) : ?>
                    <a href="<?php echo esc_url($cat['url']); ?>" class="group relative overflow-hidden rounded-[2rem] bg-navy p-8 text-white transition-all hover:scale-[1.02] hover:shadow-xl">
                        <div class="relative z-10 flex h-full flex-col justify-between">
                            <div>
                                <h3 class="text-2xl font-black leading-tight tracking-tight"><?php echo esc_html($cat['title']); ?></h3>
                                <div class="mt-2 flex h-1 w-12 bg-blue transition-all group-hover:w-20"></div>
                            </div>
                            <div class="mt-8 flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-white/60 transition-colors group-hover:text-blue">
                                <?php esc_html_e('Shop Collection', 'dawp'); ?>
                                <svg class="transition-transform group-hover:translate-x-1" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14m-7-7 7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="absolute -right-4 -top-4 flex h-32 w-32 items-center justify-center rounded-full bg-white/5 transition-transform group-hover:scale-150"></div>
                    </a>
                <?php endforeach; ?>
                
                <a href="<?php echo esc_url($shop_url); ?>" class="group relative overflow-hidden rounded-[2rem] border-2 border-dashed border-navy/20 p-8 text-navy transition-all hover:border-blue hover:bg-blue/5">
                    <div class="flex h-full flex-col justify-center items-center text-center">
                        <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-navy text-white transition-transform group-hover:scale-110">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14m-7-7 7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-black"><?php esc_html_e('View All Products', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm font-medium text-foreground-muted"><?php esc_html_e('Check out our entire performance range.', 'dawp'); ?></p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Support Help Section -->
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[3rem] bg-navy p-8 sm:p-16 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue/20 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2"></div>
                
                <div class="relative z-10 grid gap-12 lg:grid-cols-2 items-center">
                    <div>
                        <h2 class="text-3xl font-black text-white sm:text-4xl lg:text-5xl tracking-tight leading-tight">
                            HAVE QUESTIONS <br class="hidden sm:block">
                            ABOUT YOUR <span class="text-blue">SHIPMENT?</span>
                        </h2>
                        <p class="mt-6 text-lg text-white/70 font-medium leading-relaxed">
                            <?php esc_html_e('Our support team is dedicated to ensuring you get your training gear as fast as possible. Check our policies or reach out directly.', 'dawp'); ?>
                        </p>
                    </div>
                    
                    <div class="grid gap-4 sm:grid-cols-2">
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="flex flex-col justify-between rounded-3xl bg-white/10 p-8 transition hover:bg-white/20">
                            <h3 class="text-lg font-bold text-white"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm text-white/60 mb-6"><?php esc_html_e('Detailed info on times, rates, and courier partners.', 'dawp'); ?></p>
                            <span class="text-xs font-black uppercase tracking-widest text-blue"><?php esc_html_e('Read Policy', 'dawp'); ?></span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="flex flex-col justify-between rounded-3xl bg-white/10 p-8 transition hover:bg-white/20">
                            <h3 class="text-lg font-bold text-white"><?php esc_html_e('Help & FAQ', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm text-white/60 mb-6"><?php esc_html_e('Quick answers to the most common delivery questions.', 'dawp'); ?></p>
                            <span class="text-xs font-black uppercase tracking-widest text-blue"><?php esc_html_e('Get Answers', 'dawp'); ?></span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="sm:col-span-2 flex items-center justify-between rounded-3xl bg-blue px-8 py-6 text-white transition hover:bg-blue/90">
                            <div class="flex items-center gap-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                </svg>
                                <span class="text-lg font-black tracking-tight uppercase"><?php esc_html_e('Contact Support', 'dawp'); ?></span>
                            </div>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14m-7-7 7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

