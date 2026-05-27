<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();

$quick_links = array(
    array( 'title' => __( 'Shop All Footwear', 'dawp' ), 'url' => home_url( '/shop/' ) ),
    array( 'title' => __( 'Handmade Leather Shoes', 'dawp' ), 'url' => home_url( '/product-category/handmade-leather-shoes/' ) ),
    array( 'title' => __( 'Leather Sandals', 'dawp' ), 'url' => home_url( '/product-category/leather-sandals/' ) ),
    array( 'title' => __( 'Leather Boots', 'dawp' ), 'url' => home_url( '/product-category/leather-boots/' ) ),
    array( 'title' => __( 'Custom Leather Footwear', 'dawp' ), 'url' => home_url( '/product-category/custom-leather-footwear/' ) ),
);
?>

<style>
    .hcs-404 {
        --hcs-ink: #17212B;
        --hcs-pine: #2F4A43;
        --hcs-pine-deep: #243A35;
        --hcs-sage: #A7B7A5;
        --hcs-fog: #E7E8E3;
        --hcs-ivory: #F7F3EC;
        --hcs-charcoal: #202326;
        --hcs-slate: #6E7472;
        position: relative;
        display: grid;
        min-height: 100dvh;
        place-items: center;
        overflow: hidden;
        padding: 96px 16px;
        background:
            radial-gradient(circle at 18% 18%, rgba(167,183,165,.42), transparent 30%),
            linear-gradient(135deg, var(--hcs-ivory), var(--hcs-fog));
        color: var(--hcs-charcoal);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    .hcs-404-card {
        position: relative;
        z-index: 1;
        width: min(100%, 680px);
        text-align: center;
    }
    .hcs-404-code {
        margin: 0;
        color: var(--hcs-pine);
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(106px, 21vw, 190px);
        font-weight: 700;
        line-height: .82;
        opacity: .16;
    }
    .hcs-404-icon {
        display: inline-grid;
        width: 68px;
        height: 68px;
        margin: -28px 0 24px;
        place-items: center;
        border: 1px solid rgba(23,33,43,.1);
        border-radius: 18px;
        background: #fff;
        color: var(--hcs-pine);
        box-shadow: 0 16px 34px rgba(23,33,43,.08);
    }
    .hcs-404-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--hcs-pine);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-404-eyebrow::before,
    .hcs-404-eyebrow::after {
        content: "";
        width: 28px;
        height: 1px;
        background: var(--hcs-sage);
    }
    .hcs-404-title {
        margin: 12px 0 0;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(34px, 5vw, 56px);
        font-weight: 600;
        line-height: 1.05;
        letter-spacing: 0;
    }
    .hcs-404-copy {
        max-width: 590px;
        margin: 18px auto 0;
        color: var(--hcs-slate);
        font-size: 17px;
        line-height: 1.75;
    }
    .hcs-404-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
        margin-top: 30px;
    }
    .hcs-404-btn {
        display: inline-flex;
        min-height: 48px;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        padding: 13px 22px;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        transition: background .2s ease, border-color .2s ease, color .2s ease, transform .2s ease;
    }
    .hcs-404-btn:hover { transform: translateY(-1px); }
    .hcs-404-btn-primary {
        border: 1px solid var(--hcs-pine);
        background: var(--hcs-pine);
        color: #fff;
    }
    .hcs-404-btn-primary:hover {
        border-color: var(--hcs-pine-deep);
        background: var(--hcs-pine-deep);
        color: #fff;
    }
    .hcs-404-btn-secondary {
        border: 1px solid var(--hcs-pine);
        background: #fff;
        color: var(--hcs-pine);
    }
    .hcs-404-btn-secondary:hover {
        background: var(--hcs-ivory);
        color: var(--hcs-pine);
    }
    .hcs-404-links {
        margin-top: 42px;
        padding-top: 26px;
        border-top: 1px solid rgba(23,33,43,.1);
    }
    .hcs-404-links p {
        margin: 0 0 14px;
        color: var(--hcs-slate);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-404-link-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px 22px;
    }
    .hcs-404-link-list a {
        color: var(--hcs-charcoal);
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        transition: color .2s ease;
    }
    .hcs-404-link-list a:hover { color: var(--hcs-pine); }
    @media (max-width: 640px) {
        .hcs-404 { padding: 72px 16px; }
        .hcs-404-icon { margin-top: -18px; }
        .hcs-404-actions { display: grid; }
        .hcs-404-btn { width: 100%; }
    }
</style>

<main id="primary" class="site-main error-404 hcs-404">
    <div class="hcs-404-card">
        <p class="hcs-404-code" aria-hidden="true">404</p>

        <span class="hcs-404-icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M9 10h.01"></path>
                <path d="M15 10h.01"></path>
                <path d="M9 16c1.8-1.2 4.2-1.2 6 0"></path>
            </svg>
        </span>

        <span class="hcs-404-eyebrow"><?php esc_html_e( 'Page Not Found', 'dawp' ); ?></span>
        <h1 class="hcs-404-title"><?php esc_html_e( 'We could not find that page.', 'dawp' ); ?></h1>
        <p class="hcs-404-copy">
            <?php esc_html_e( 'The page may have moved, been removed, or the link may be outdated. Browse our handmade leather footwear collection or return to the homepage.', 'dawp' ); ?>
        </p>

        <div class="hcs-404-actions">
            <a class="hcs-404-btn hcs-404-btn-primary" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
                <?php esc_html_e( 'Shop All Footwear', 'dawp' ); ?>
            </a>
            <a class="hcs-404-btn hcs-404-btn-secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php esc_html_e( 'Back to Home', 'dawp' ); ?>
            </a>
        </div>

        <div class="hcs-404-links">
            <p><?php esc_html_e( 'You might be looking for', 'dawp' ); ?></p>
            <div class="hcs-404-link-list">
                <?php foreach ( $quick_links as $link ) : ?>
                    <a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
