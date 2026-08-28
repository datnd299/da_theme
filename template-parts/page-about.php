<?php
/**
 * Template Part: page-about
 *
 * @package dawp
 */

if (!function_exists('qb_about_category_url')) {
    function qb_about_category_url($slug) {
        if (taxonomy_exists('product_cat')) {
            $term = get_term_by('slug', $slug, 'product_cat');
            if ($term && !is_wp_error($term)) {
                $link = get_term_link($term);
                if (!is_wp_error($link)) {
                    return $link;
                }
            }
        }

        return home_url('/product-category/' . trailingslashit($slug));
    }
}

if (!function_exists('qb_about_image')) {
    function qb_about_image($category_slug = '') {
        if (function_exists('wc_get_products')) {
            $args = [
                'limit'  => 1,
                'status' => 'publish',
            ];

            if ($category_slug) {
                $args['category'] = [$category_slug];
            }

            $products = wc_get_products($args);
            if (!empty($products)) {
                $image = wp_get_attachment_image_url($products[0]->get_image_id(), 'large');
                if ($image) {
                    return $image;
                }
            }
        }

        return function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('large') : '';
    }
}

$shop_url = home_url('/shop/');
$hero_image = get_template_directory_uri() . '/assets/images/home/image_about.png';
$owl_image = get_template_directory_uri() . '/assets/images/home/image_about_two.png';
?>

<style>
  .qb-page {
    --qb-blush: #ffb7c5;
    --qb-peach: #ffd6a5;
    --qb-lavender: #d8c7ff;
    --qb-mint: #cff5e7;
    --qb-gold: #d8a94e;
    --qb-plum: #2f1f35;
    --qb-gray: #f7f7fa;
    --qb-text: #4f4355;
    --qb-border: #eadfe8;
    background: #fff;
    color: var(--qb-text);
    font-family: "DM Sans", "Inter", system-ui, sans-serif;
  }

  .qb-page * {
    box-sizing: border-box;
  }

  .qb-page a {
    text-decoration: none;
  }

  .qb-wrap {
    width: min(100% - 32px, 1280px);
    margin-inline: auto;
  }

  .qb-section {
    padding: 72px 0;
  }

  .qb-eyebrow {
    margin: 0 0 12px;
    color: var(--qb-gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .18em;
    text-transform: uppercase;
  }

  .qb-title {
    margin: 0;
    color: var(--qb-plum);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(34px, 4.2vw, 58px);
    line-height: 1.04;
    letter-spacing: 0;
  }

  .qb-copy {
    margin: 18px 0 0;
    max-width: 680px;
    color: var(--qb-text);
    font-size: 17px;
    line-height: 1.75;
  }

  .qb-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    margin-top: 30px;
  }

  .qb-button {
    display: inline-flex;
    min-height: 48px;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--qb-plum);
    border-radius: 999px;
    background: var(--qb-plum);
    color: #fff;
    padding: 0 24px;
    font-size: 14px;
    font-weight: 800;
    transition: .2s ease;
  }

  .qb-button:hover {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: var(--qb-plum);
  }

  .qb-button--secondary {
    background: #fff;
    color: var(--qb-plum);
  }

  .qb-button--secondary:hover {
    border-color: var(--qb-plum);
    background: #fff4f6;
    color: var(--qb-plum);
  }

  .qb-plum .qb-button {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: var(--qb-plum);
  }

  .qb-plum .qb-button:hover {
    border-color: #fff;
    background: #fff;
    color: var(--qb-plum);
  }

  .qb-plum .qb-button--secondary {
    border-color: rgba(255,255,255,.7);
    background: #fff;
    color: var(--qb-plum);
  }

  .qb-hero {
    overflow: hidden;
    background:
      linear-gradient(135deg, rgba(255,183,197,.35), rgba(255,214,165,.38) 48%, rgba(207,245,231,.4)),
      #fff;
  }

  .qb-hero__grid,
  .qb-split {
    display: grid;
    grid-template-columns: minmax(0, 1.02fr) minmax(320px, .98fr);
    gap: 48px;
    align-items: center;
  }

  .qb-hero__grid {
    padding: 78px 0;
  }

  .qb-photo {
    overflow: hidden;
    border: 10px solid rgba(255,255,255,.72);
    border-radius: 24px;
    background: #fff;
    box-shadow: 0 24px 70px rgba(47,31,53,.16);
  }

  .qb-photo img {
    display: block;
    width: 100%;
    aspect-ratio: 4 / 5;
    object-fit: cover;
  }

  .qb-pill-row {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 24px;
  }

  .qb-pill {
    border: 1px solid rgba(47,31,53,.12);
    border-radius: 999px;
    background: rgba(255,255,255,.72);
    padding: 9px 14px;
    color: var(--qb-plum);
    font-size: 13px;
    font-weight: 800;
  }

  .qb-soft {
    background: var(--qb-gray);
  }

  .qb-plum {
    background: var(--qb-plum);
    color: #fff;
  }

  .qb-plum .qb-title,
  .qb-plum .qb-copy {
    color: #fff;
  }

  .qb-heading-row {
    display: flex;
    gap: 24px;
    align-items: end;
    justify-content: space-between;
    margin-bottom: 34px;
  }

  .qb-heading-row .qb-copy {
    margin-top: 0;
    max-width: 540px;
  }

  .qb-card-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 18px;
  }

  .qb-card,
  .qb-care-card {
    border: 1px solid var(--qb-border);
    border-radius: 18px;
    background: #fff;
    padding: 22px;
    box-shadow: 0 12px 32px rgba(47,31,53,.06);
  }

  .qb-card h3,
  .qb-care-card h3 {
    margin: 0;
    color: var(--qb-plum);
    font-size: 19px;
    line-height: 1.25;
  }

  .qb-card p,
  .qb-care-card p {
    margin: 10px 0 0;
    color: #675a6c;
    font-size: 14px;
    line-height: 1.65;
  }

  .qb-list {
    display: grid;
    gap: 12px;
    margin: 26px 0 0;
    padding: 0;
    list-style: none;
  }

  .qb-list li {
    border: 1px solid rgba(216,169,78,.22);
    border-radius: 16px;
    background: rgba(255,255,255,.82);
    padding: 14px 16px;
    color: var(--qb-plum);
    font-size: 14px;
    font-weight: 800;
  }

  .qb-care-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
  }

  .qb-policy-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    margin-top: 34px;
  }

  .qb-policy-grid p {
    margin: 0;
    border-radius: 18px;
    background: rgba(255,255,255,.1);
    padding: 18px;
    color: rgba(255,255,255,.8);
    font-size: 14px;
    line-height: 1.65;
  }

  .qb-policy-links {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 28px;
  }

  .qb-policy-links a {
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 999px;
    padding: 10px 14px;
    color: #fff;
    font-size: 13px;
    font-weight: 800;
  }

  .qb-policy-links a:hover {
    border-color: var(--qb-gold);
    color: var(--qb-peach);
  }

  @media (max-width: 1080px) {
    .qb-card-grid,
    .qb-care-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }

  @media (max-width: 780px) {
    .qb-section {
      padding: 56px 0;
    }

    .qb-hero__grid,
    .qb-split {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .qb-hero__grid {
      padding: 58px 0;
    }

    .qb-heading-row {
      display: block;
    }

    .qb-heading-row .qb-copy {
      margin-top: 14px;
    }

    .qb-card-grid,
    .qb-care-grid,
    .qb-policy-grid {
      grid-template-columns: 1fr;
    }

    .qb-actions {
      flex-direction: column;
    }

    .qb-button {
      width: 100%;
    }
  }
</style>

<div class="qb-page qb-about">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e("About Corvelshop", 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('For The Stories You Wear Every Day.', 'dawp'); ?></h1>
        <p class="qb-copy">
          <?php esc_html_e("Corvelshop is a bracelet-focused fashion jewelry boutique offering elegant, modern, and giftable bracelet styles for daily wear, meaningful details, and personal expression.", 'dawp'); ?>
        </p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Bracelets', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        </div>
        <div class="qb-pill-row" aria-label="<?php esc_attr_e('Brand highlights', 'dawp'); ?>">
          <span class="qb-pill"><?php esc_html_e('Charm bracelets', 'dawp'); ?></span>
          <span class="qb-pill"><?php esc_html_e('Owl bracelets', 'dawp'); ?></span>
          <span class="qb-pill"><?php esc_html_e('Gift-ready styles', 'dawp'); ?></span>
        </div>
      </div>
      <div class="qb-photo">
        <?php if ($hero_image) : ?>
          <?php
          echo qb_responsive_image(
              $hero_image,
              __("Elegant bracelet style from Corvelshop", 'dawp'),
              [
                  'width'         => 900,
                  'height'        => 1125,
                  'widths'        => [420, 640, 768, 900],
                  'sizes'         => '(max-width: 780px) calc(100vw - 32px), 48vw',
                  'loading'       => 'eager',
                  'fetchpriority' => 'high',
              ]
          );
          ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-split">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Who We Are', 'dawp'); ?></p>
        <h2 class="qb-title"><?php esc_html_e('Bracelets made easy to choose, wear, and gift.', 'dawp'); ?></h2>
      </div>
      <div>
        <p class="qb-copy">
          <?php esc_html_e("Our store is built around one clear focus: women's bracelet styles. We bring together charm bracelets, owl-inspired bracelets, beaded pieces, chain styles, statement accents, and gift bracelets that feel feminine without pretending to be designer or luxury affiliated.", 'dawp'); ?>
        </p>
        <p class="qb-copy">
          <?php esc_html_e('Every product experience should help customers understand the bracelet type, finish or material notes, length or adjustable fit, clasp details where available, care guidance, and whether the style is suitable for gifting.', 'dawp'); ?>
        </p>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap">
      <div class="qb-heading-row">
        <div>
          <p class="qb-eyebrow"><?php esc_html_e('Our Bracelet Focus', 'dawp'); ?></p>
          <h2 class="qb-title"><?php esc_html_e('A clear jewelry niche customers can trust.', 'dawp'); ?></h2>
        </div>
        <p class="qb-copy">
          <?php esc_html_e('We keep the store focused on bracelet categories instead of presenting a random marketplace of unrelated accessories.', 'dawp'); ?>
        </p>
      </div>

      <div class="qb-card-grid">
        <a class="qb-card" href="<?php echo esc_url(qb_about_category_url('charm-bracelets')); ?>">
          <h3><?php esc_html_e('Charm Bracelets', 'dawp'); ?></h3>
          <p><?php esc_html_e('Meaningful charm details designed for personal expression, everyday styling, and thoughtful gifting.', 'dawp'); ?></p>
        </a>
        <a class="qb-card" href="<?php echo esc_url(qb_about_category_url('owl-bracelets')); ?>">
          <h3><?php esc_html_e('Owl Bracelets', 'dawp'); ?></h3>
          <p><?php esc_html_e('Owl-inspired bracelet designs with a symbolic charm look and easy daily styling appeal.', 'dawp'); ?></p>
        </a>
        <a class="qb-card" href="<?php echo esc_url(qb_about_category_url('beaded-bracelets')); ?>">
          <h3><?php esc_html_e('Beaded Bracelets', 'dawp'); ?></h3>
          <p><?php esc_html_e('Beaded bracelet styles made for layering, casual outfits, and simple everyday elegance.', 'dawp'); ?></p>
        </a>
        <a class="qb-card" href="<?php echo esc_url(qb_about_category_url('chain-bracelets')); ?>">
          <h3><?php esc_html_e('Chain Bracelets', 'dawp'); ?></h3>
          <p><?php esc_html_e('Gold-tone and silver-tone fashion chain styles that add a polished accent to daily looks.', 'dawp'); ?></p>
        </a>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-split">
      <div class="qb-photo">
        <?php if ($owl_image) : ?>
          <?php
          echo qb_responsive_image(
              $owl_image,
              __('Owl-inspired bracelet detail', 'dawp'),
              [
                  'width'  => 900,
                  'height' => 1125,
                  'widths' => [420, 640, 768, 900],
                  'sizes'  => '(max-width: 780px) calc(100vw - 32px), 48vw',
              ]
          );
          ?>
        <?php endif; ?>
      </div>
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Honest Product Direction', 'dawp'); ?></p>
        <h2 class="qb-title"><?php esc_html_e('Fashion jewelry without misleading claims.', 'dawp'); ?></h2>
        <p class="qb-copy">
          <?php esc_html_e("Corvelshop does not sell fake designer jewelry, replica bracelets, counterfeit charms, or products presented as affiliated with protected luxury brands.", 'dawp'); ?>
        </p>
        <ul class="qb-list">
          <li><?php esc_html_e('No replica, dupe, or designer-inspired wording', 'dawp'); ?></li>
          <li><?php esc_html_e('No unverified real gold, real silver, or gemstone claims', 'dawp'); ?></li>
          <li><?php esc_html_e('No healing, medical, or guaranteed benefit claims', 'dawp'); ?></li>
          <li><?php esc_html_e('Clear material, size, and care information on product pages', 'dawp'); ?></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap">
      <div class="qb-heading-row">
        <div>
          <p class="qb-eyebrow"><?php esc_html_e('Customer Care Standards', 'dawp'); ?></p>
          <h2 class="qb-title"><?php esc_html_e('Details customers should know before ordering.', 'dawp'); ?></h2>
        </div>
        <p class="qb-copy">
          <?php esc_html_e('Transparent support, clear policies, and product details help customers make confident jewelry purchases.', 'dawp'); ?>
        </p>
      </div>

      <div class="qb-care-grid">
        <div class="qb-care-card">
          <h3><?php esc_html_e('Product Details', 'dawp'); ?></h3>
          <p><?php esc_html_e('Bracelet product pages should include type, finish or material notes, bracelet length, adjustability, clasp information where available, charm details, styling notes, and care instructions.', 'dawp'); ?></p>
        </div>
        <div class="qb-care-card">
          <h3><?php esc_html_e('Shipping Timeline', 'dawp'); ?></h3>
          <p><?php esc_html_e('Orders have a 5:00 PM PST cutoff, 1-3 business day handling, Monday-Friday fulfillment, free standard U.S. shipping unless noted at checkout, and 5-7 business day transit.', 'dawp'); ?></p>
        </div>
        <div class="qb-care-card">
          <h3><?php esc_html_e('30-Day Returns', 'dawp'); ?></h3>
          <p><?php esc_html_e('Customers may request eligible returns within 30 days from the delivery date. Returns are by mail after contacting support first, with no restocking fee.', 'dawp'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-plum">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Store Information', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Support and policy information are easy to find.', 'dawp'); ?></h2>
      <p class="qb-copy">
        <?php esc_html_e("Corvelshop serves customers shopping from the United States market. For order help, product questions, sizing, shipping, returns, or policy questions, contact our support team.", 'dawp'); ?>
      </p>

      <div class="qb-policy-grid">
        <p><?php esc_html_e('Support email: support@corvelshop.com', 'dawp'); ?></p>
        <p><?php esc_html_e('Customer Service Hours: Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></p>
        <p><?php esc_html_e('Refunds are processed within 7 days after inspection approval.', 'dawp'); ?></p>
      </div>

      <div class="qb-actions">
        <a class="qb-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
        <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
      </div>

      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Store policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQ', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms of Service', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
