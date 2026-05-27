<?php
/**
 * Template Part: Handcraft Shoe - About Us Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$about_hero_image = get_template_directory_uri() . '/assets/img/about-hero-workshop.png';
$about_image      = get_template_directory_uri() . '/assets/img/handcraft-footwear-home.png';
$store_name    = 'Handcraft Shoe';
$support_email = 'support@handcraftshoe.com';

$values = array(
    array(
        'title' => __( 'Natural Leather Character', 'dawp' ),
        'text'  => __( 'We focus on leather footwear with warm texture, crafted details, and timeless everyday appeal.', 'dawp' ),
        'icon'  => 'grain',
    ),
    array(
        'title' => __( 'Practical Daily Wear', 'dawp' ),
        'text'  => __( 'Our shoes, sandals, and boots are presented for relaxed styling, smart casual outfits, and regular use.', 'dawp' ),
        'icon'  => 'shoe',
    ),
    array(
        'title' => __( 'Clear Product Guidance', 'dawp' ),
        'text'  => __( 'We keep sizing, fit notes, material details, care instructions, shipping, and returns easy to review.', 'dawp' ),
        'icon'  => 'check',
    ),
);

$categories = array(
    array(
        'title' => __( 'Handmade Leather Shoes', 'dawp' ),
        'text'  => __( 'Everyday leather shoes with crafted character and practical styling.', 'dawp' ),
        'url'   => home_url( '/product-category/handmade-leather-shoes/' ),
    ),
    array(
        'title' => __( 'Leather Sandals', 'dawp' ),
        'text'  => __( 'Simple leather sandals for warm days and relaxed outfits.', 'dawp' ),
        'url'   => home_url( '/product-category/leather-sandals/' ),
    ),
    array(
        'title' => __( 'Leather Boots', 'dawp' ),
        'text'  => __( 'Crafted-look leather boots for seasonal and daily wear.', 'dawp' ),
        'url'   => home_url( '/product-category/leather-boots/' ),
    ),
    array(
        'title' => __( 'Custom Leather Footwear', 'dawp' ),
        'text'  => __( 'Personal footwear options where product details support customization.', 'dawp' ),
        'url'   => home_url( '/product-category/custom-leather-footwear/' ),
    ),
);
?>

<style>
    .hcs-about {
        --hcs-ink: #17212B;
        --hcs-pine: #2F4A43;
        --hcs-pine-deep: #243A35;
        --hcs-sage: #A7B7A5;
        --hcs-line: var(--hcs-pine);
        --hcs-fog: #E7E8E3;
        --hcs-ivory: #F7F3EC;
        --hcs-charcoal: #202326;
        --hcs-slate: #6E7472;
        background: var(--hcs-ivory);
        color: var(--hcs-charcoal);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    .hcs-about-wrap { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .hcs-about-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--hcs-pine);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-about-eyebrow::before { content: ""; width: 34px; height: 1px; background: var(--hcs-line); }
    .hcs-about-title {
        margin: 0;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;
        line-height: 1.05;
        letter-spacing: 0;
    }
    .hcs-about-copy { color: var(--hcs-slate); line-height: 1.75; }
    .hcs-about-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 22px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 800;
        transition: background .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
    }
    .hcs-about-btn:hover { transform: translateY(-1px); }
    .hcs-about-btn-primary { background: var(--hcs-pine); border: 1px solid var(--hcs-pine); color: #fff; }
    .hcs-about-btn-primary:hover { background: var(--hcs-pine-deep); border-color: var(--hcs-pine-deep); color: #fff; }
    .hcs-about-btn-secondary { background: transparent; border: 1px solid var(--hcs-pine); color: var(--hcs-pine); }
    .hcs-about-btn-secondary:hover { background: var(--hcs-fog); color: var(--hcs-pine); }
    .hcs-about-hero {
        min-height: 620px;
        display: grid;
        align-items: end;
        background-image: linear-gradient(90deg, rgba(23,33,43,.9) 0%, rgba(23,33,43,.68) 44%, rgba(23,33,43,.2) 100%), var(--hcs-about-hero-image);
        background-position: center;
        background-size: cover;
    }
    .hcs-about-hero-content { max-width: 760px; padding: 96px 0 72px; }
    .hcs-about-hero .hcs-about-eyebrow,
    .hcs-about-hero .hcs-about-copy { color: rgba(247,243,236,.84); }
    .hcs-about-hero .hcs-about-eyebrow::before { background: var(--hcs-sage); }
    .hcs-about-hero .hcs-about-title { color: #fff; font-size: clamp(44px, 7vw, 78px); }
    .hcs-about-actions { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 30px; }
    .hcs-about-section { padding: 86px 0; }
    .hcs-about-section-alt { background: var(--hcs-fog); }
    .hcs-about-split { display: grid; grid-template-columns: .95fr 1.05fr; gap: 58px; align-items: center; }
    .hcs-about-image {
        aspect-ratio: 3 / 2;
        border: 12px solid #fff;
        border-radius: 24px;
        background-image: var(--hcs-about-image);
        background-position: center;
        background-size: cover;
        box-shadow: 0 18px 42px rgba(23,33,43,.12);
    }
    .hcs-about-card {
        border: 1px solid rgba(23,33,43,.1);
        border-radius: 24px;
        background: #fff;
        box-shadow: 0 14px 34px rgba(23,33,43,.08);
    }
    .hcs-about-story { padding: 36px; }
    .hcs-about-story .hcs-about-title { margin-top: 12px; font-size: clamp(34px, 4vw, 54px); }
    .hcs-about-story p { margin-top: 18px; }
    .hcs-about-values { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; margin-top: 34px; }
    .hcs-about-value { padding: 28px; }
    .hcs-about-icon {
        width: 52px;
        height: 52px;
        display: grid;
        place-items: center;
        margin-bottom: 20px;
        border-radius: 16px;
        background: rgba(167,183,165,.32);
        color: var(--hcs-pine);
    }
    .hcs-about-value h3,
    .hcs-about-category h3,
    .hcs-about-panel h3 { margin: 0; color: var(--hcs-ink); font-size: 18px; font-weight: 800; line-height: 1.3; }
    .hcs-about-value p,
    .hcs-about-category p,
    .hcs-about-panel p { margin: 10px 0 0; color: var(--hcs-slate); line-height: 1.65; }
    .hcs-about-head { display: flex; justify-content: space-between; gap: 32px; align-items: end; margin-bottom: 34px; }
    .hcs-about-head .hcs-about-title { margin-top: 12px; font-size: clamp(32px, 4vw, 50px); }
    .hcs-about-head .hcs-about-copy { max-width: 500px; }
    .hcs-about-categories { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 18px; }
    .hcs-about-category { padding: 26px; }
    .hcs-about-category a {
        display: inline-flex;
        margin-top: 18px;
        color: var(--hcs-pine);
        font-size: 14px;
        font-weight: 800;
        border-bottom: 2px solid var(--hcs-sage);
    }
    .hcs-about-trust {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }
    .hcs-about-panel { padding: 34px; }
    .hcs-about-panel.dark { background: var(--hcs-pine); color: #fff; }
    .hcs-about-panel.dark .hcs-about-title,
    .hcs-about-panel.dark h3,
    .hcs-about-panel.dark p,
    .hcs-about-panel.dark .hcs-about-copy { color: #fff; }
    .hcs-about-list { display: grid; gap: 12px; margin: 22px 0 0; padding: 0; list-style: none; }
    .hcs-about-list li { position: relative; padding-left: 24px; color: inherit; line-height: 1.6; }
    .hcs-about-list li::before {
        content: "";
        position: absolute;
        left: 0;
        top: .55em;
        width: 8px;
        height: 8px;
        border-radius: 99px;
        background: var(--hcs-pine);
        box-shadow: 0 0 0 3px rgba(167,183,165,.28);
    }
    .hcs-about-panel.dark .hcs-about-list li::before { background: #fff; }
    .hcs-about-contact {
        padding: 78px 0;
        background: var(--hcs-ink);
        color: #fff;
    }
    .hcs-about-contact-grid { display: grid; grid-template-columns: .95fr 1.05fr; gap: 42px; align-items: center; }
    .hcs-about-contact .hcs-about-eyebrow { color: #fff; }
    .hcs-about-contact .hcs-about-eyebrow::before { background: #fff; }
    .hcs-about-contact .hcs-about-title { color: #fff; font-size: clamp(32px, 4vw, 52px); }
    .hcs-about-contact .hcs-about-copy { color: rgba(247,243,236,.78); }
    .hcs-about-contact-card { padding: 28px; border: 1px solid rgba(247,243,236,.14); border-radius: 24px; background: rgba(247,243,236,.06); }
    .hcs-about-contact-card dl { display: grid; gap: 16px; margin: 0; }
    .hcs-about-contact-card div { padding-bottom: 16px; border-bottom: 1px solid rgba(247,243,236,.14); }
    .hcs-about-contact-card div:last-child { padding-bottom: 0; border-bottom: 0; }
    .hcs-about-contact-card dt { color: var(--hcs-sage); font-size: 12px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .hcs-about-contact-card dd { margin: 6px 0 0; color: #fff; font-weight: 800; line-height: 1.55; }
    .hcs-about-final { padding: 80px 0 92px; text-align: center; }
    .hcs-about-final .hcs-about-title { max-width: 780px; margin: 0 auto 18px; font-size: clamp(34px, 5vw, 58px); }
    .hcs-about-final .hcs-about-copy { max-width: 700px; margin: 0 auto 28px; }
    .hcs-about img {
        display: block;
        max-width: 100%;
        height: auto;
        margin-inline: auto;
        object-position: center center;
    }
    @media (max-width: 1023px) {
        .hcs-about-split,
        .hcs-about-trust,
        .hcs-about-contact-grid { grid-template-columns: 1fr; }
        .hcs-about-values,
        .hcs-about-categories { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .hcs-about-image { aspect-ratio: 3 / 2; }
    }
    @media (max-width: 700px) {
        .hcs-about-hero {
            min-height: 560px;
            background-position: 72% center;
        }
        .hcs-about-hero-content { padding: 74px 0 46px; }
        .hcs-about-section { padding: 62px 0; }
        .hcs-about-head { display: block; }
        .hcs-about-values,
        .hcs-about-categories { grid-template-columns: 1fr; }
        .hcs-about-image {
            width: min(100%, 520px);
            margin-inline: auto;
            background-position: center center;
        }
        .hcs-about img {
            margin-inline: auto;
            object-fit: cover;
            object-position: center center;
        }
        .hcs-about-story,
        .hcs-about-panel { padding: 24px; }
    }
</style>

<div class="hcs-about" style="--hcs-about-hero-image: url('<?php echo esc_url( $about_hero_image ); ?>'); --hcs-about-image: url('<?php echo esc_url( $about_image ); ?>');">
    <section class="hcs-about-hero" aria-label="<?php esc_attr_e( 'About Handcraft Shoe', 'dawp' ); ?>">
        <div class="hcs-about-wrap">
            <div class="hcs-about-hero-content">
                <span class="hcs-about-eyebrow"><?php echo esc_html( $store_name ); ?></span>
                <h1 class="hcs-about-title"><?php esc_html_e( 'About Our Handmade Leather Footwear Store', 'dawp' ); ?></h1>
                <p class="hcs-about-copy" style="margin-top:22px;font-size:18px;max-width:680px;">
                    <?php esc_html_e( 'Handcraft Shoe offers handmade leather shoes, leather sandals, leather boots, and custom leather footwear designed for daily wear, relaxed styling, and timeless leather appeal.', 'dawp' ); ?>
                </p>
                <div class="hcs-about-actions">
                    <a class="hcs-about-btn hcs-about-btn-primary" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Shop Leather Footwear', 'dawp' ); ?></a>
                    <a class="hcs-about-btn hcs-about-btn-secondary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" style="color:#fff;border-color:rgba(247,243,236,.72);"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="hcs-about-section">
        <div class="hcs-about-wrap hcs-about-split">
            <div class="hcs-about-image" aria-hidden="true"></div>
            <div class="hcs-about-card hcs-about-story">
                <span class="hcs-about-eyebrow"><?php esc_html_e( 'Our Story', 'dawp' ); ?></span>
                <h2 class="hcs-about-title"><?php esc_html_e( 'A focused store for natural leather character and crafted details.', 'dawp' ); ?></h2>
                <p class="hcs-about-copy">
                    <?php esc_html_e( 'Handcraft Shoe was built around a simple idea: leather footwear should feel warm, practical, and easy to wear without losing the crafted details that make each pair feel considered.', 'dawp' ); ?>
                </p>
                <p class="hcs-about-copy">
                    <?php esc_html_e( 'Our collection stays focused on four clear footwear paths: handmade leather shoes, leather sandals, leather boots, and custom leather footwear where customization is supported by product details.', 'dawp' ); ?>
                </p>
                <p class="hcs-about-copy">
                    <?php esc_html_e( 'We avoid fake luxury claims, replica styling, and unclear product promises. Instead, we prioritize useful product notes, natural leather appeal, fit guidance, care information, and transparent customer policies.', 'dawp' ); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="hcs-about-section hcs-about-section-alt">
        <div class="hcs-about-wrap">
            <div class="hcs-about-head">
                <div>
                    <span class="hcs-about-eyebrow"><?php esc_html_e( 'What We Value', 'dawp' ); ?></span>
                    <h2 class="hcs-about-title"><?php esc_html_e( 'Premium, approachable, and built around useful detail.', 'dawp' ); ?></h2>
                </div>
                <p class="hcs-about-copy"><?php esc_html_e( 'Our goal is to make buying leather footwear feel clear and trustworthy, from product discovery through sizing, delivery, and after-sale support.', 'dawp' ); ?></p>
            </div>

            <div class="hcs-about-values">
                <?php foreach ( $values as $value ) : ?>
                    <div class="hcs-about-card hcs-about-value">
                        <span class="hcs-about-icon" aria-hidden="true">
                            <?php if ( 'grain' === $value['icon'] ) : ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 20c6-8 10-8 16-16"/><path d="M4 12c4-2 6-2 10-8"/><path d="M10 20c3-4 5-5 10-6"/></svg>
                            <?php elseif ( 'shoe' === $value['icon'] ) : ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 20h12"/><path d="M7 16c3 1 7 1 10 0"/><path d="M8 4h8l1 12H7L8 4z"/></svg>
                            <?php else : ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>
                            <?php endif; ?>
                        </span>
                        <h3><?php echo esc_html( $value['title'] ); ?></h3>
                        <p><?php echo esc_html( $value['text'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="hcs-about-section">
        <div class="hcs-about-wrap">
            <div class="hcs-about-head">
                <div>
                    <span class="hcs-about-eyebrow"><?php esc_html_e( 'Our Collection', 'dawp' ); ?></span>
                    <h2 class="hcs-about-title"><?php esc_html_e( 'Four clear categories, all centered on leather footwear.', 'dawp' ); ?></h2>
                </div>
                <p class="hcs-about-copy"><?php esc_html_e( 'We keep the store easy to understand so customers can find the right leather style without unrelated categories or confusing product paths.', 'dawp' ); ?></p>
            </div>

            <div class="hcs-about-categories">
                <?php foreach ( $categories as $category ) : ?>
                    <div class="hcs-about-card hcs-about-category">
                        <h3><?php echo esc_html( $category['title'] ); ?></h3>
                        <p><?php echo esc_html( $category['text'] ); ?></p>
                        <a href="<?php echo esc_url( $category['url'] ); ?>"><?php esc_html_e( 'View Category', 'dawp' ); ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="hcs-about-section hcs-about-section-alt">
        <div class="hcs-about-wrap hcs-about-trust">
            <div class="hcs-about-card hcs-about-panel dark">
                <h2 class="hcs-about-title" style="font-size:clamp(30px,3.5vw,46px);"><?php esc_html_e( 'A more transparent way to shop leather footwear.', 'dawp' ); ?></h2>
                <p class="hcs-about-copy" style="margin-top:16px;"><?php esc_html_e( 'Every product page should help customers understand what they are buying before checkout, especially fit, finish, care, shipping, and return conditions.', 'dawp' ); ?></p>
                <ul class="hcs-about-list">
                    <li><?php esc_html_e( 'Size and fit notes for footwear selection.', 'dawp' ); ?></li>
                    <li><?php esc_html_e( 'Material or leather details where verified by product data.', 'dawp' ); ?></li>
                    <li><?php esc_html_e( 'Care guidance for cleaning, storage, and finish maintenance.', 'dawp' ); ?></li>
                    <li><?php esc_html_e( 'Custom footwear limitations explained before purchase.', 'dawp' ); ?></li>
                </ul>
            </div>
            <div class="hcs-about-card hcs-about-panel">
                <span class="hcs-about-eyebrow"><?php esc_html_e( 'Customer Care', 'dawp' ); ?></span>
                <h2 class="hcs-about-title" style="margin-top:12px;font-size:clamp(30px,3.5vw,46px);"><?php esc_html_e( 'Support for sizing, orders, and product questions.', 'dawp' ); ?></h2>
                <p class="hcs-about-copy" style="margin-top:16px;"><?php esc_html_e( 'Our support team can help with order questions, product details, tracking, return authorization, and guidance before placing an order.', 'dawp' ); ?></p>
                <ul class="hcs-about-list">
                    <li><?php esc_html_e( 'Business hours: Monday to Friday, 9:00 AM to 5:00 PM PST.', 'dawp' ); ?></li>
                    <li><?php esc_html_e( 'Order tracking is available after shipment confirmation.', 'dawp' ); ?></li>
                    <li><?php esc_html_e( 'Eligible footwear returns are accepted within 30 days from delivery.', 'dawp' ); ?></li>
                </ul>
                <div class="hcs-about-actions">
                    <a class="hcs-about-btn hcs-about-btn-secondary" href="<?php echo esc_url( home_url( '/refund-return-policy/' ) ); ?>"><?php esc_html_e( 'Return Policy', 'dawp' ); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="hcs-about-contact">
        <div class="hcs-about-wrap hcs-about-contact-grid">
            <div>
                <span class="hcs-about-eyebrow"><?php esc_html_e( 'Contact Information', 'dawp' ); ?></span>
                <h2 class="hcs-about-title" style="margin-top:12px;"><?php esc_html_e( 'Questions about a pair, a fit note, or an order?', 'dawp' ); ?></h2>
                <p class="hcs-about-copy" style="margin-top:18px;"><?php esc_html_e( 'Contact Handcraft Shoe for help with leather footwear selection, product information, shipping, returns, and order support.', 'dawp' ); ?></p>
                <div class="hcs-about-actions">
                    <a class="hcs-about-btn hcs-about-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" style="background:#fff;border-color:#fff;color:#2F4A43;"><?php esc_html_e( 'Contact Us', 'dawp' ); ?></a>
                    <a class="hcs-about-btn hcs-about-btn-secondary" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" style="color:#fff;border-color:rgba(247,243,236,.72);"><?php esc_html_e( 'Read FAQs', 'dawp' ); ?></a>
                </div>
            </div>
            <div class="hcs-about-contact-card">
                <dl>
                    <div><dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt><dd><?php echo esc_html( $store_name ); ?></dd></div>
                    <div><dt><?php esc_html_e( 'Website', 'dawp' ); ?></dt><dd><?php esc_html_e( 'handcraftshoe.com', 'dawp' ); ?></dd></div>
                    <div><dt><?php esc_html_e( 'Email', 'dawp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>" style="color:#fff;"><?php echo esc_html( $support_email ); ?></a></dd></div>
                    <div><dt><?php esc_html_e( 'Service Hours', 'dawp' ); ?></dt><dd><?php esc_html_e( 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)', 'dawp' ); ?></dd></div>
                </dl>
            </div>
        </div>
    </section>

    <section class="hcs-about-final">
        <div class="hcs-about-wrap">
            <h2 class="hcs-about-title"><?php esc_html_e( 'Leather footwear with natural character, made easier to choose.', 'dawp' ); ?></h2>
            <p class="hcs-about-copy"><?php esc_html_e( 'Explore handmade leather shoes, sandals, boots, and custom-style options with clear product notes and customer care designed to support confident shopping.', 'dawp' ); ?></p>
            <div class="hcs-about-actions" style="justify-content:center;">
                <a class="hcs-about-btn hcs-about-btn-primary" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Shop All Footwear', 'dawp' ); ?></a>
                <a class="hcs-about-btn hcs-about-btn-secondary" href="<?php echo esc_url( home_url( '/shipping-policy/' ) ); ?>"><?php esc_html_e( 'Shipping Policy', 'dawp' ); ?></a>
            </div>
        </div>
    </section>
</div>
