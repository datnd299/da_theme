<?php
/**
 * Template Part: page-home
 */

$home_image = get_template_directory_uri() . '/assets/img/handcraft-footwear-home.png';
$everyday_image = get_template_directory_uri() . '/assets/img/Everyday_Leather_Shoes.png';

$categories = array(
    array(
        'title' => __('Handmade Leather Shoes', 'dawp'),
        'text'  => __('Handmade leather shoes with natural character, crafted details, and everyday wearability.', 'dawp'),
        'url'   => home_url('/product-category/handmade-leather-shoes/'),
        'image' => get_template_directory_uri() . '/assets/img/Handmade_Leather_Shoes.png',
        'pos'   => 'center center',
    ),
    array(
        'title' => __('Leather Sandals', 'dawp'),
        'text'  => __('Simple leather sandals designed for warm days, relaxed outfits, and easy everyday comfort.', 'dawp'),
        'url'   => home_url('/product-category/leather-sandals/'),
        'image' => get_template_directory_uri() . '/assets/img/Leather_Sandals.png',
        'pos'   => 'center center',
    ),
    array(
        'title' => __('Leather Boots', 'dawp'),
        'text'  => __('Leather boots with a crafted look for confident daily wear and seasonal styling.', 'dawp'),
        'url'   => home_url('/product-category/leather-boots/'),
        'image' => get_template_directory_uri() . '/assets/img/Leather_Boots.png',
        'pos'   => 'center center',
    ),
    array(
        'title' => __('Custom Leather Footwear', 'dawp'),
        'text'  => __('Custom leather footwear options for customers looking for a more personal fit, finish, or style direction.', 'dawp'),
        'url'   => home_url('/product-category/custom-leather-footwear/'),
        'image' => get_template_directory_uri() . '/assets/img/Custom_Leather_Footwear.png',
        'pos'   => 'center center',
    ),
);

$trust_items = array(
    __('Secure Checkout', 'dawp'),
    __('Tracking Included', 'dawp'),
    __('30-Day Returns', 'dawp'),
    __('Fit Notes', 'dawp'),
    __('Material Details', 'dawp'),
    __('Leather Care Instructions', 'dawp'),
    __('Custom Footwear Notes', 'dawp'),
);
?>

<style>
    .hcs-home {
        --hcs-ink: #17212B;
        --hcs-pine: #2F4A43;
        --hcs-pine-deep: #243A35;
        --hcs-sage: #A7B7A5;
        --hcs-rose: #8B3A44;
        --hcs-fog: #E7E8E3;
        --hcs-ivory: #F7F3EC;
        --hcs-charcoal: #202326;
        --hcs-slate: #6E7472;
        background: var(--hcs-ivory);
        color: var(--hcs-charcoal);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    .hcs-wrap { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .hcs-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--hcs-pine);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-eyebrow::before { content: ""; width: 34px; height: 1px; background: var(--hcs-rose); }
    .hcs-title {
        font-family: Georgia, "Times New Roman", serif;
        line-height: 1.05;
        letter-spacing: 0;
        color: var(--hcs-ink);
    }
    .hcs-copy { color: var(--hcs-slate); line-height: 1.75; }
    .hcs-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 22px;
        border-radius: 999px;
        font-weight: 800;
        font-size: 14px;
        transition: background .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
    }
    .hcs-btn:hover { transform: translateY(-1px); }
    .hcs-btn:focus-visible { outline: 3px solid rgba(167,183,165,.72); outline-offset: 3px; }
    .hcs-btn-primary { background: var(--hcs-pine); color: #fff; border: 1px solid var(--hcs-pine); }
    .hcs-btn-primary:hover { background: var(--hcs-pine-deep); border-color: var(--hcs-pine-deep); color: #fff; }
    .hcs-btn-secondary { border: 1px solid var(--hcs-pine); color: var(--hcs-pine); background: transparent; }
    .hcs-btn-secondary:hover { background: var(--hcs-fog); color: var(--hcs-pine); }
    .hcs-hero .hcs-btn-secondary:hover { background: rgba(255,255,255,.12); color: #fff; border-color: #fff; }
    .hcs-hero {
        min-height: 690px;
        display: grid;
        align-items: end;
        position: relative;
        overflow: hidden;
        background-image: linear-gradient(90deg, rgba(23,33,43,.88) 0%, rgba(23,33,43,.68) 42%, rgba(23,33,43,.18) 100%), var(--hcs-hero-image);
        background-size: cover;
        background-position: center;
    }
    .hcs-hero-content { padding: 96px 0 72px; max-width: 710px; }
    .hcs-hero .hcs-eyebrow, .hcs-hero .hcs-copy { color: rgba(247,243,236,.86); }
    .hcs-hero .hcs-eyebrow::before { background: var(--hcs-sage); }
    .hcs-hero .hcs-title { color: #fff; font-size: clamp(44px, 7vw, 82px); }
    .hcs-hero-actions { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 30px; }
    .hcs-hero-panel {
        margin-top: 52px;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        border: 1px solid rgba(247,243,236,.22);
        background: rgba(247,243,236,.08);
        backdrop-filter: blur(8px);
        border-radius: 20px;
        overflow: hidden;
    }
    .hcs-hero-panel div { padding: 20px; border-right: 1px solid rgba(247,243,236,.18); }
    .hcs-hero-panel div:last-child { border-right: 0; }
    .hcs-hero-panel strong { display: block; color: #fff; font-size: 15px; margin-bottom: 5px; }
    .hcs-hero-panel span { display: block; color: rgba(247,243,236,.76); font-size: 13px; line-height: 1.5; }
    .hcs-section { padding: 86px 0; }
    .hcs-section-alt { background: var(--hcs-fog); }
    .hcs-section-head { display: flex; justify-content: space-between; gap: 32px; align-items: end; margin-bottom: 34px; }
    .hcs-section-head .hcs-title { font-size: clamp(32px, 4vw, 50px); margin-top: 12px; }
    .hcs-section-head .hcs-copy { max-width: 480px; }
    .hcs-cats { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
    .hcs-cat {
        min-height: 320px;
        border-radius: 22px;
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(23,33,43,.12);
        background: #fff;
        box-shadow: 0 14px 34px rgba(23,33,43,.08);
    }
    .hcs-cat-media {
        position: absolute;
        inset: 0;
        background-image: var(--hcs-card-image);
        background-color: #fff;
        background-repeat: no-repeat;
        background-size: contain;
        background-position: var(--hcs-card-position);
        transform: scale(1.01);
        transition: transform .35s ease;
    }
    .hcs-cat:hover .hcs-cat-media { transform: scale(1.05); }
    .hcs-cat::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(23,33,43,0) 18%, rgba(23,33,43,.18) 48%, rgba(23,33,43,.86) 100%);
    }
    .hcs-cat-content { position: absolute; z-index: 2; left: 22px; right: 22px; bottom: 22px; color: #fff; }
    .hcs-cat-content h3 { font-family: Georgia, "Times New Roman", serif; font-size: 27px; line-height: 1.1; margin-bottom: 10px; }
    .hcs-cat-content p { color: rgba(247,243,236,.84); line-height: 1.6; font-size: 14px; margin-bottom: 18px; }
    .hcs-cat-link { color: #fff; font-weight: 800; font-size: 14px; border-bottom: 2px solid var(--hcs-sage); padding-bottom: 4px; }
    .hcs-split { display: grid; grid-template-columns: 1fr .95fr; gap: 58px; align-items: center; }
    .hcs-image-frame {
        border-radius: 24px;
        min-height: 560px;
        background-image: var(--hcs-hero-image);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        border: 12px solid #fff;
        box-shadow: 0 18px 42px rgba(23,33,43,.12);
    }
    .hcs-detail-list { display: grid; gap: 16px; margin-top: 30px; }
    .hcs-detail {
        display: grid;
        grid-template-columns: 46px 1fr;
        gap: 15px;
        padding: 18px;
        border-radius: 18px;
        background: #fff;
        border: 1px solid rgba(23,33,43,.08);
    }
    .hcs-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: rgba(167,183,165,.32);
        color: var(--hcs-pine);
    }
    .hcs-detail h3 { font-size: 17px; font-weight: 800; color: var(--hcs-ink); margin-bottom: 4px; }
    .hcs-detail p { color: var(--hcs-slate); line-height: 1.6; font-size: 14px; }
    .hcs-feature-grid { display: grid; grid-template-columns: .9fr 1.1fr; gap: 22px; }
    .hcs-feature-card {
        padding: 34px;
        border-radius: 24px;
        background: #fff;
        border: 1px solid rgba(23,33,43,.1);
    }
    .hcs-feature-card.dark { background: var(--hcs-pine); color: #fff; }
    .hcs-feature-card.dark .hcs-title, .hcs-feature-card.dark .hcs-copy { color: #fff; }
    .hcs-feature-card .hcs-title { font-size: clamp(28px, 3.5vw, 44px); margin-bottom: 16px; }
    .hcs-feature-card ul { display: grid; gap: 12px; margin-top: 22px; }
    .hcs-feature-card li { color: inherit; line-height: 1.55; padding-left: 24px; position: relative; }
    .hcs-feature-card li::before { content: ""; width: 8px; height: 8px; border-radius: 99px; background: var(--hcs-pine); position: absolute; left: 0; top: .55em; }
    .hcs-feature-card.dark li::before { background: #fff; box-shadow: 0 0 0 3px rgba(167,183,165,.28); }
    .hcs-trust { background: var(--hcs-ink); color: #fff; padding: 78px 0; }
    .hcs-trust-head { display: grid; grid-template-columns: .95fr 1.05fr; gap: 42px; align-items: center; margin-bottom: 34px; }
    .hcs-trust .hcs-title { color: #fff; font-size: clamp(32px, 4vw, 52px); }
    .hcs-trust .hcs-copy { color: rgba(247,243,236,.78); }
    .hcs-trust-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px; }
    .hcs-trust-item { padding: 18px; border-radius: 16px; border: 1px solid rgba(247,243,236,.14); background: rgba(247,243,236,.06); font-weight: 800; color: #fff; }
    .hcs-final { padding: 80px 0 92px; text-align: center; }
    .hcs-final .hcs-title { font-size: clamp(34px, 5vw, 58px); max-width: 760px; margin: 0 auto 18px; }
    .hcs-final .hcs-copy { max-width: 680px; margin: 0 auto 28px; }
    @media (max-width: 1023px) {
        .hcs-hero { min-height: 620px; }
        .hcs-cats, .hcs-trust-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .hcs-split, .hcs-feature-grid, .hcs-trust-head { grid-template-columns: 1fr; }
        .hcs-image-frame { min-height: 430px; }
    }
    @media (max-width: 700px) {
        .hcs-hero-content { padding: 74px 0 46px; }
        .hcs-hero-panel, .hcs-cats, .hcs-trust-grid { grid-template-columns: 1fr; }
        .hcs-hero-panel div { border-right: 0; border-bottom: 1px solid rgba(247,243,236,.18); }
        .hcs-section { padding: 62px 0; }
        .hcs-section-head { display: block; }
        .hcs-cat { min-height: 300px; }
        .hcs-feature-card { padding: 24px; }
    }
</style>

<div class="hcs-home" style="--hcs-hero-image: url('<?php echo esc_url($home_image); ?>');">
    <section class="hcs-hero" aria-label="<?php esc_attr_e('Handcraft Shoe homepage hero', 'dawp'); ?>">
        <div class="hcs-wrap">
            <div class="hcs-hero-content">
                <span class="hcs-eyebrow"><?php esc_html_e('Handcraft Shoe', 'dawp'); ?></span>
                <h1 class="hcs-title"><?php esc_html_e('Handmade Leather Footwear With Natural Character', 'dawp'); ?></h1>
                <p class="hcs-copy" style="margin-top:22px;font-size:18px;max-width:650px;">
                    <?php esc_html_e('Discover handmade leather shoes, leather sandals, leather boots, and custom leather footwear designed for daily wear, relaxed style, and timeless leather appeal.', 'dawp'); ?>
                </p>
                <div class="hcs-hero-actions">
                    <a class="hcs-btn hcs-btn-primary" href="<?php echo esc_url(home_url('/product-category/handmade-leather-shoes/')); ?>">
                        <?php esc_html_e('Shop Handmade Leather Shoes', 'dawp'); ?>
                    </a>
                    <a class="hcs-btn hcs-btn-secondary" href="<?php echo esc_url(home_url('/product-category/leather-boots/')); ?>" style="color:#fff;border-color:rgba(247,243,236,.72);">
                        <?php esc_html_e('Explore Leather Boots', 'dawp'); ?>
                    </a>
                </div>
                <div class="hcs-hero-panel" aria-label="<?php esc_attr_e('Store highlights', 'dawp'); ?>">
                    <div><strong><?php esc_html_e('Natural Character', 'dawp'); ?></strong><span><?php esc_html_e('Leather finish, crafted details, and timeless everyday style.', 'dawp'); ?></span></div>
                    <div><strong><?php esc_html_e('Clear Fit Notes', 'dawp'); ?></strong><span><?php esc_html_e('Sizing, care, and return guidance made easy to review.', 'dawp'); ?></span></div>
                    <div><strong><?php esc_html_e('Customer Care', 'dawp'); ?></strong><span><?php esc_html_e('Support available Monday to Friday, 9:00 AM to 5:00 PM PST.', 'dawp'); ?></span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="hcs-section">
        <div class="hcs-wrap">
            <div class="hcs-section-head">
                <div>
                    <span class="hcs-eyebrow"><?php esc_html_e('Shop By Leather Style', 'dawp'); ?></span>
                    <h2 class="hcs-title"><?php esc_html_e('Four focused ways to find your next pair.', 'dawp'); ?></h2>
                </div>
                <p class="hcs-copy"><?php esc_html_e('Browse a clear leather footwear collection built around everyday shoes, warm-weather sandals, seasonal boots, and custom-style options.', 'dawp'); ?></p>
            </div>

            <div class="hcs-cats">
                <?php foreach ($categories as $category) : ?>
                    <a class="hcs-cat" href="<?php echo esc_url($category['url']); ?>" style="--hcs-card-image: url('<?php echo esc_url($category['image']); ?>'); --hcs-card-position: <?php echo esc_attr($category['pos']); ?>;">
                        <span class="hcs-cat-media" aria-hidden="true"></span>
                        <span class="hcs-cat-content">
                            <h3><?php echo esc_html($category['title']); ?></h3>
                            <p><?php echo esc_html($category['text']); ?></p>
                            <span class="hcs-cat-link"><?php esc_html_e('Shop This Style', 'dawp'); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="hcs-section hcs-section-alt">
        <div class="hcs-wrap hcs-split">
            <div class="hcs-image-frame" style="background-image: url('<?php echo esc_url($everyday_image); ?>');" aria-hidden="true"></div>
            <div>
                <span class="hcs-eyebrow"><?php esc_html_e('Everyday Leather Shoes', 'dawp'); ?></span>
                <h2 class="hcs-title" style="font-size:clamp(34px,4vw,54px);margin-top:12px;">
                    <?php esc_html_e('Crafted detail for daily routines and smart casual style.', 'dawp'); ?>
                </h2>
                <p class="hcs-copy" style="margin-top:18px;">
                    <?php esc_html_e('Our handmade leather shoes are presented for customers who value natural leather character, clean silhouettes, and dependable everyday wearability. Product pages should always be checked for exact material, size, fit, and care details.', 'dawp'); ?>
                </p>
                <div class="hcs-detail-list">
                    <div class="hcs-detail">
                        <span class="hcs-icon" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 20h12"/><path d="M7 16c3 1 7 1 10 0"/><path d="M8 4h8l1 12H7L8 4z"/></svg>
                        </span>
                        <div><h3><?php esc_html_e('Built Around Wearability', 'dawp'); ?></h3><p><?php esc_html_e('Casual leather shoes, slip-ons, and lace-up styles selected for practical daily outfits.', 'dawp'); ?></p></div>
                    </div>
                    <div class="hcs-detail">
                        <span class="hcs-icon" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16"/><path d="M7 7v13"/><path d="M17 7v13"/><path d="M9 4h6l2 3H7l2-3z"/></svg>
                        </span>
                        <div><h3><?php esc_html_e('Leather Care Guidance', 'dawp'); ?></h3><p><?php esc_html_e('Care notes help customers understand storage, cleaning, and finish maintenance before purchase.', 'dawp'); ?></p></div>
                    </div>
                </div>
                <div style="margin-top:28px;">
                    <a class="hcs-btn hcs-btn-primary" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Browse All Footwear', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="hcs-section">
        <div class="hcs-wrap hcs-feature-grid">
            <div class="hcs-feature-card dark">
                <h2 class="hcs-title"><?php esc_html_e('Leather Sandals & Leather Boots', 'dawp'); ?></h2>
                <p class="hcs-copy"><?php esc_html_e('Move between relaxed warm-weather sandals and crafted-look leather boots with a collection that stays focused on natural material appeal and practical styling.', 'dawp'); ?></p>
                <ul>
                    <li><?php esc_html_e('Sandals for warm days, easy outfits, and relaxed daily wear.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Boots for seasonal wardrobes, casual styling, and confident daily use.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Clear product notes for closure type, sole details, color options, and fit.', 'dawp'); ?></li>
                </ul>
            </div>
            <div class="hcs-feature-card">
                <span class="hcs-eyebrow"><?php esc_html_e('Custom Leather Footwear', 'dawp'); ?></span>
                <h2 class="hcs-title" style="margin-top:12px;"><?php esc_html_e('Personal options, explained clearly before checkout.', 'dawp'); ?></h2>
                <p class="hcs-copy"><?php esc_html_e('Where custom leather footwear is available, product pages should explain customization choices, sizing requirements, production timing, and any return limitations for custom, personalized, or modified footwear.', 'dawp'); ?></p>
                <ul>
                    <li><?php esc_html_e('Customization options are shown only where supported by product data.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Measurement and fit information should be reviewed before ordering.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Return conditions for custom footwear are stated clearly on relevant products.', 'dawp'); ?></li>
                </ul>
                <div style="margin-top:26px;">
                    <a class="hcs-btn hcs-btn-secondary" href="<?php echo esc_url(home_url('/product-category/custom-leather-footwear/')); ?>"><?php esc_html_e('Explore Custom Options', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="hcs-trust">
        <div class="hcs-wrap">
            <div class="hcs-trust-head">
                <h2 class="hcs-title"><?php esc_html_e('The details that make shopping easier.', 'dawp'); ?></h2>
                <p class="hcs-copy"><?php esc_html_e('Handcraft Shoe keeps the buying experience transparent with practical information about sizing, shipping, returns, product materials, and care. No countdown timers, fake claims, or unclear category paths.', 'dawp'); ?></p>
            </div>
            <div class="hcs-trust-grid">
                <?php foreach ($trust_items as $item) : ?>
                    <div class="hcs-trust-item"><?php echo esc_html($item); ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="hcs-final">
        <div class="hcs-wrap">
            <h2 class="hcs-title"><?php esc_html_e('Find handmade leather footwear for daily wear and timeless character.', 'dawp'); ?></h2>
            <p class="hcs-copy"><?php esc_html_e('Shop shoes, sandals, boots, and custom-style leather footwear with clear product notes, customer support, and policy pages designed to help you choose with confidence.', 'dawp'); ?></p>
            <div class="hcs-hero-actions" style="justify-content:center;">
                <a class="hcs-btn hcs-btn-primary" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Shop All Footwear', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
