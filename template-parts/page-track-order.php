<?php
/**
 * Track Order — MozTire. Styles: assets/css/track-order.css
 */
$f = dawp_store_facts();

dawp_page_hero([
    'title'   => 'Track your tire order',
    'eyebrow' => 'Order status',
    'lead'    => 'Enter your order number and the billing email used at checkout to see the latest status.',
    'image'   => 'assets/img/hero/tracking-hero.jpg',
    'crumb'   => 'Track Order',
]);

$steps = [
    ['title' => 'Order received', 'text' => 'You get a confirmation email right after checkout.'],
    ['title' => 'Processing', 'text' => 'We verify, pick and pack your tires in ' . $f['processing'] . '.'],
    ['title' => 'Shipped', 'text' => 'Tracking numbers are emailed. Tires often ship as separate packages.'],
    ['title' => 'Delivered', 'text' => 'Ground transit takes ' . $f['transit'] . '. Inspect tires before installing.'],
];
?>

<section class="track-page">
    <div class="mz-container track-page__grid">
        <div class="track-card">
            <h2 class="track-card__title">Look up an order</h2>
            <p class="track-card__lead">Your order number starts with <strong><?php echo esc_html($f['order_prefix']); ?></strong> and is in your confirmation email. You can enter it with or without the prefix.</p>
            <div class="track-form">
                <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
            </div>
            <p class="track-card__note">Have an account? <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">Sign in</a> to see every order and its tracking links.</p>
        </div>

        <aside class="track-side">
            <div class="track-timeline">
                <h2 class="track-timeline__title">What happens after you order</h2>
                <ol>
                    <?php foreach ($steps as $i => $step) : ?>
                        <li>
                            <span class="track-timeline__num"><?php echo (int) $i + 1; ?></span>
                            <div>
                                <strong><?php echo esc_html($step['title']); ?></strong>
                                <p><?php echo esc_html($step['text']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <div class="track-help">
                <h2 class="track-help__title">Package delayed or damaged?</h2>
                <p>Email <a href="mailto:<?php echo esc_attr($f['email']); ?>"><?php echo esc_html($f['email']); ?></a> with your order number. Report transit damage or missing packages within 7 days of the delivery scan.</p>
                <a class="mz-btn mz-btn--outline" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>">Shipping Policy</a>
            </div>
        </aside>
    </div>
</section>
