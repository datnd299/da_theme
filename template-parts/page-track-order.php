<?php
/**
 * Jejak pesanan page for Imartmy.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@imartmy.com';
$business_hours = __('Isnin - Jumaat, 9:00 pagi - 5:00 petang, GMT+08:00 Waktu Malaysia', 'dawp');
$returns_url    = home_url('/return-refund-policy/');
$terms_url      = home_url('/terms-conditions/');
$privacy_url    = home_url('/privacy-policy/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$policy_links = [
    ['title' => __('Terma', 'dawp'), 'url' => $terms_url],
    ['title' => __('Pemulangan', 'dawp'), 'url' => $returns_url],
    ['title' => __('Privasi', 'dawp'), 'url' => $privacy_url],
    ['title' => __('Akaun Saya', 'dawp'), 'url' => $account_url],
];
?>

<div class="track-order-page">
    <section class="track-hero" aria-labelledby="track-order-title">
        <div class="track-hero__inner">
            <div class="track-hero__copy">
                <p class="track-eyebrow"><?php esc_html_e('Penjejakan Pesanan', 'dawp'); ?></p>
                <h1 id="track-order-title" class="track-hero__title"><?php esc_html_e('Jejak Pesanan Anda', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Masukkan ID pesanan dan e-mel bil untuk menyemak status terkini pembelian Imartmy anda.', 'dawp'); ?>
                </p>
                <div class="track-hero__actions">
                    <a href="#track-order-form" class="track-button track-button--primary"><?php esc_html_e('Semak Status Pesanan', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="track-button track-button--ghost"><?php esc_html_e('Continue Kedaiping', 'dawp'); ?></a>
                </div>
            </div>

            <div class="track-hero__panel" aria-label="<?php esc_attr_e('Garis masa pesanan', 'dawp'); ?>">
                <div class="track-timeline">
                    <div class="track-timeline__item">
                        <span class="track-timeline__icon" aria-hidden="true">âœ“</span>
                        <div>
                            <h2><?php esc_html_e('Sediakan butiran anda', 'dawp'); ?></h2>
                            <p><?php esc_html_e('Gunakan ID pesanan daripada e-mel pengesahan dan e-mel bil yang digunakan semasa checkout.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="track-timeline__item">
                        <span class="track-timeline__icon" aria-hidden="true">â†’</span>
                        <div>
                            <h2><?php esc_html_e('Kemas kini penjejakan', 'dawp'); ?></h2>
                            <p><?php esc_html_e('Butiran penghantaran muncul selepas pesanan diproses dan dihantar.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="track-order-form" class="track-form-section" aria-labelledby="track-form-title">
        <div class="track-form-section__inner">
            <div class="track-section-heading">
                <p class="track-eyebrow"><?php esc_html_e('Semakan', 'dawp'); ?></p>
                <h2 id="track-form-title"><?php esc_html_e('Cari butiran pesanan anda', 'dawp'); ?></h2>
                <p><?php esc_html_e('Use the order ID from your confirmation email and the billing email used at checkout.', 'dawp'); ?></p>
            </div>

            <div class="track-form-layout">
                <div class="track-form-card">
                    <div class="track-form-card__body">
                        <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                    </div>
                </div>

                <aside class="track-support-card" aria-labelledby="track-support-title">
                    <div class="track-support-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 16v-4"></path>
                            <path d="M12 8h.01"></path>
                        </svg>
                    </div>
                    <h2 id="track-support-title"><?php esc_html_e('Perlukan bantuan menjejak?', 'dawp'); ?></h2>
                    <p>
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('E-mel %1$s bersama nombor pesanan anda. Waktu operasi: %2$s.', 'dawp'),
                                '<a href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                esc_html($business_hours)
                            ),
                            [
                                'a' => [
                                    'href' => [],
                                ],
                            ]
                        );
                        ?>
                    </p>
                    <div class="track-policy-links">
                        <?php foreach ($policy_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>

            <div class="track-badges" aria-label="<?php esc_attr_e('Sorotan khidmat kedai', 'dawp'); ?>">
                <div class="track-badge">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    <?php esc_html_e('Semakan Selamat', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 17h4V5H3v12h2"></path><path d="M14 8h4l3 3v6h-3"></path><circle cx="7" cy="17" r="2"></circle><circle cx="16" cy="17" r="2"></circle></svg>
                    <?php esc_html_e('Penjejakan Selepas Dihantar', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                    <?php esc_html_e('Pemprosesan 1-3 Hari', 'dawp'); ?>
                </div>
            </div>
        </div>
    </section>
</div>
