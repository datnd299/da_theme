<?php
/**
 * Homepage template for Altrevia.
 *
 * @package dawp
 */

if (!function_exists('qb_home_category_url')) {
    function qb_home_category_url($slug) {
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

if (!function_exists('qb_home_category_image')) {
    function qb_home_category_image($slugs) {
        if (!class_exists('WooCommerce') || !taxonomy_exists('product_cat')) {
            return '';
        }

        foreach ((array) $slugs as $slug) {
            $term = get_term_by('slug', $slug, 'product_cat');
            if (!$term || is_wp_error($term)) {
                continue;
            }

            $thumbnail_id = absint(get_term_meta($term->term_id, 'thumbnail_id', true));
            if ($thumbnail_id) {
                $image = wp_get_attachment_image_url($thumbnail_id, 'large');
                if ($image) {
                    return $image;
                }
            }

            $products = wc_get_products([
                'limit'    => 1,
                'status'   => 'publish',
                'category' => [$slug],
            ]);

            if (!empty($products)) {
                $image = wp_get_attachment_image_url($products[0]->get_image_id(), 'large');
                if ($image) {
                    return $image;
                }
            }
        }

        return '';
    }
}

if (!function_exists('qb_home_asset_image')) {
    function qb_home_asset_image($filename) {
        $relative_path = 'assets/images/home/' . ltrim($filename, '/');
        $file_path = trailingslashit(get_template_directory()) . $relative_path;

        if (file_exists($file_path)) {
            return trailingslashit(get_template_directory_uri()) . $relative_path;
        }

        return '';
    }
}

if (!function_exists('qb_home_products')) {
    function qb_home_products($limit = 4, $categories = []) {
        if (!function_exists('wc_get_products')) {
            return [];
        }

        $args = [
            'limit'   => $limit,
            'orderby' => 'date',
            'order'   => 'DESC',
            'status'  => 'publish',
        ];

        if (!empty($categories)) {
            $args['category'] = array_values(array_unique(array_filter((array) $categories)));
        }

        return wc_get_products($args);
    }
}

if (!function_exists('qb_home_first_product_image')) {
    function qb_home_first_product_image($categories, $size = 'large') {
        $products = qb_home_products(1, $categories);

        if (empty($products)) {
            return '';
        }

        $image_id = $products[0]->get_image_id();

        return $image_id ? wp_get_attachment_image_url($image_id, $size) : '';
    }
}

$shop_url  = home_url('/shop/');

$categories = [
    [
        'slug'  => 'charm-bracelets',
        'title' => 'Charm Bracelets',
        'copy'  => 'Meaningful charm styles for personal expression and daily wear.',
        'image' => 'Charm_Bracelets.png',
        'query_slugs' => ['charm-bracelets', 'handmade-bracelets'],
    ],
    [
        'slug'  => 'owl-bracelets',
        'title' => 'Owl Bracelets',
        'copy'  => 'Owl-inspired designs with a thoughtful, symbolic charm look.',
        'image' => 'Owl_Bracelets.png',
        'query_slugs' => ['owl-bracelets'],
    ],
    [
        'slug'  => 'beaded-bracelets',
        'title' => 'Beaded Bracelets',
        'copy'  => 'Easy-to-layer beaded styles for casual elegance.',
        'image' => 'Beaded_Bracelets.png',
        'query_slugs' => ['beaded-bracelets', 'beaded-jewelry'],
    ],
    [
        'slug'  => 'chain-bracelets',
        'title' => 'Chain Bracelets',
        'copy'  => 'Polished gold-tone and silver-tone styles for everyday outfits.',
        'image' => 'Chain_Bracelets.png',
        'query_slugs' => ['chain-bracelets'],
    ],
    [
        'slug'  => 'gift-bracelets',
        'title' => 'Gift Bracelets',
        'copy'  => 'Thoughtful bracelet styles made for birthdays, holidays, and special moments.',
        'image' => 'Gift_Bracelets.png',
        'query_slugs' => ['gift-bracelets', 'artisan-gifts'],
    ],
];

$homepage_product_slugs = [];

foreach ($categories as $category) {
    $homepage_product_slugs = array_merge($homepage_product_slugs, $category['query_slugs']);
}

$homepage_product_slugs = array_values(array_unique($homepage_product_slugs));
$featured_products = qb_home_products(4, $homepage_product_slugs);
$hero_image = qb_home_asset_image('Modern_Bracelets_Giftable_Jewelry.png') ?: qb_home_first_product_image(['charm-bracelets', 'owl-bracelets', 'gift-bracelets', 'handmade-bracelets', 'artisan-gifts']);

if (!$hero_image && function_exists('wc_placeholder_img_src')) {
    $hero_image = wc_placeholder_img_src('large');
}
?>

<style>
  .qb-home {
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

  .qb-home * {
    box-sizing: border-box;
  }

  .qb-home a {
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
    font-size: clamp(34px, 4.4vw, 58px);
    line-height: 1.04;
    letter-spacing: 0;
  }

  .qb-copy {
    margin: 18px 0 0;
    max-width: 660px;
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
    border-radius: 999px;
    padding: 0 24px;
    border: 1px solid var(--qb-plum);
    background: var(--qb-plum);
    color: #fff;
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

  .qb-hero {
    overflow: hidden;
    background:
      linear-gradient(135deg, rgba(255,183,197,.35), rgba(255,214,165,.38) 48%, rgba(207,245,231,.4)),
      #fff;
  }

  .qb-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.02fr) minmax(320px, .98fr);
    gap: 48px;
    align-items: center;
    padding: 78px 0;
  }

  .qb-hero__trust {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 24px;
  }

  .qb-pill {
    border: 1px solid rgba(47,31,53,.12);
    border-radius: 999px;
    background: rgba(255,255,255,.68);
    padding: 9px 14px;
    color: var(--qb-plum);
    font-size: 13px;
    font-weight: 700;
  }

  .qb-hero__media {
    position: relative;
    min-height: 520px;
  }

  .qb-photo-card {
    overflow: hidden;
    border: 10px solid rgba(255,255,255,.72);
    border-radius: 24px;
    background: #fff;
    box-shadow: 0 24px 70px rgba(47,31,53,.16);
  }

  .qb-photo-card img {
    width: 100%;
    aspect-ratio: 4 / 5;
    object-fit: cover;
  }

  .qb-note {
    position: absolute;
    right: -6px;
    bottom: 34px;
    width: min(280px, 70%);
    border: 1px solid rgba(216,169,78,.28);
    border-radius: 20px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 18px 42px rgba(47,31,53,.14);
  }

  .qb-note strong {
    display: block;
    color: var(--qb-plum);
    font-size: 15px;
  }

  .qb-note span {
    display: block;
    margin-top: 6px;
    color: var(--qb-text);
    font-size: 14px;
    line-height: 1.55;
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
    max-width: 520px;
  }

  .qb-category-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 18px;
  }

  .qb-category-card {
    display: flex;
    min-height: 350px;
    overflow: hidden;
    position: relative;
    border: 1px solid var(--qb-border);
    border-radius: 22px;
    background: #fff;
    color: var(--qb-plum);
    box-shadow: 0 12px 32px rgba(47,31,53,.07);
  }

  .qb-category-card img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .45s ease;
  }

  .qb-category-card:hover img {
    transform: scale(1.05);
  }

  .qb-category-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(47,31,53,.84), rgba(47,31,53,.32) 48%, rgba(255,255,255,.08));
  }

  .qb-category-card__body {
    position: relative;
    z-index: 1;
    align-self: end;
    padding: 20px;
    color: #fff;
  }

  .qb-category-card h3,
  .qb-feature h3,
  .qb-gift-card h3,
  .qb-trust-card h3,
  .qb-product-card h3 {
    margin: 0;
    color: inherit;
  }

  .qb-category-card h3 {
    font-family: Georgia, "Times New Roman", serif;
    font-size: 25px;
    line-height: 1.08;
  }

  .qb-category-card p {
    margin: 10px 0 0;
    color: rgba(255,255,255,.88);
    font-size: 14px;
    line-height: 1.55;
  }

  .qb-feature {
    background: linear-gradient(135deg, rgba(216,199,255,.3), rgba(247,247,250,1));
  }

  .qb-feature__grid,
  .qb-gift__grid {
    display: grid;
    grid-template-columns: .95fr 1.05fr;
    gap: 42px;
    align-items: center;
  }

  .qb-feature__panel {
    border: 1px solid var(--qb-border);
    border-radius: 24px;
    background: rgba(255,255,255,.86);
    padding: clamp(26px, 4vw, 46px);
    box-shadow: 0 18px 46px rgba(47,31,53,.08);
  }

  .qb-list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
    margin: 26px 0 0;
    padding: 0;
    list-style: none;
  }

  .qb-list li {
    border: 1px solid rgba(216,169,78,.22);
    border-radius: 16px;
    background: #fff;
    padding: 13px 14px;
    color: var(--qb-plum);
    font-size: 14px;
    font-weight: 800;
  }

  .qb-safe-note {
    margin-top: 24px;
    border-left: 3px solid var(--qb-gold);
    padding-left: 14px;
    color: #68586d;
    font-size: 14px;
    line-height: 1.65;
  }

  .qb-products {
    background: #fff;
  }

  .qb-product-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
  }

  .qb-product-card {
    overflow: hidden;
    border: 1px solid var(--qb-border);
    border-radius: 20px;
    background: #fff;
    box-shadow: 0 12px 32px rgba(47,31,53,.06);
    transition: transform .2s ease, box-shadow .2s ease;
  }

  .qb-product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 18px 40px rgba(47,31,53,.12);
  }

  .qb-product-card img {
    display: block;
    width: 100%;
    aspect-ratio: 4 / 5;
    object-fit: cover;
    background: var(--qb-gray);
  }

  .qb-product-card__body {
    padding: 18px;
  }

  .qb-product-card h3 {
    min-height: 44px;
    color: var(--qb-plum);
    font-size: 16px;
    line-height: 1.4;
  }

  .qb-product-card__meta {
    margin: 8px 0 0;
    color: #77687b;
    font-size: 13px;
    line-height: 1.5;
  }

  .qb-product-card__price {
    margin-top: 10px;
    color: var(--qb-plum);
    font-size: 16px;
    font-weight: 800;
  }

  .qb-product-card__link {
    display: inline-flex;
    width: 100%;
    min-height: 44px;
    align-items: center;
    justify-content: center;
    margin-top: 14px;
    border-radius: 999px;
    background: var(--qb-plum);
    color: #fff;
    font-size: 13px;
    font-weight: 800;
  }

  .qb-gift {
    background: linear-gradient(135deg, rgba(255,214,165,.36), rgba(255,183,197,.2));
  }

  .qb-gift-card-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
    margin-top: 26px;
  }

  .qb-gift-card {
    border: 1px solid rgba(47,31,53,.09);
    border-radius: 18px;
    background: rgba(255,255,255,.74);
    padding: 18px;
  }

  .qb-gift-card h3 {
    color: var(--qb-plum);
    font-size: 17px;
  }

  .qb-gift-card p {
    margin: 8px 0 0;
    color: #65596b;
    font-size: 14px;
    line-height: 1.55;
  }

  .qb-trust {
    position: relative;
    overflow: hidden;
    background:
      radial-gradient(circle at 12% 14%, rgba(255,183,197,.28), transparent 26%),
      radial-gradient(circle at 88% 10%, rgba(207,245,231,.36), transparent 28%),
      linear-gradient(135deg, rgba(255,214,165,.24), rgba(255,255,255,1) 42%, rgba(216,199,255,.2));
    color: var(--qb-text);
  }

  .qb-trust .qb-wrap {
    position: relative;
    z-index: 1;
  }

  .qb-trust .qb-title,
  .qb-trust .qb-copy {
    color: var(--qb-plum);
  }

  .qb-trust .qb-copy {
    max-width: 720px;
  }

  .qb-trust__grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
    margin-top: 34px;
  }

  .qb-trust-card {
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(47,31,53,.08);
    border-radius: 20px;
    background: rgba(255,255,255,.84);
    padding: 24px;
    box-shadow: 0 14px 38px rgba(47,31,53,.08);
    transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
  }

  .qb-trust-card::before {
    content: "";
    position: absolute;
    inset: 0 0 auto;
    height: 5px;
    background: var(--trust-accent, var(--qb-gold));
  }

  .qb-trust-card:hover {
    transform: translateY(-3px);
    border-color: rgba(216,169,78,.34);
    box-shadow: 0 20px 48px rgba(47,31,53,.14);
  }

  .qb-trust-card--secure {
    --trust-accent: #d8a94e;
    --trust-soft: rgba(216,169,78,.14);
  }

  .qb-trust-card--tracking {
    --trust-accent: #66b89a;
    --trust-soft: rgba(102,184,154,.15);
  }

  .qb-trust-card--returns {
    --trust-accent: #ff9aa9;
    --trust-soft: rgba(255,154,169,.16);
  }

  .qb-trust-card--details {
    --trust-accent: #9b86d8;
    --trust-soft: rgba(155,134,216,.16);
  }

  .qb-trust-card__icon {
    display: inline-flex;
    width: 48px;
    height: 48px;
    align-items: center;
    justify-content: center;
    margin-bottom: 18px;
    border: 1px solid rgba(47,31,53,.08);
    border-radius: 16px;
    background: var(--trust-soft, rgba(216,169,78,.14));
    color: var(--qb-plum);
    font-size: 12px;
    font-weight: 900;
    letter-spacing: .08em;
  }

  .qb-trust-card h3 {
    color: var(--qb-plum);
    font-size: 18px;
  }

  .qb-trust-card p {
    margin: 10px 0 0;
    color: #65596b;
    font-size: 14px;
    line-height: 1.6;
  }

  .qb-policy-box {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    margin-top: 28px;
    border: 1px solid rgba(47,31,53,.08);
    border-radius: 22px;
    background: rgba(255,255,255,.72);
    padding: 14px;
    box-shadow: 0 18px 46px rgba(47,31,53,.08);
  }

  .qb-policy-box p {
    position: relative;
    margin: 0;
    border-radius: 16px;
    background: linear-gradient(180deg, rgba(255,255,255,.92), rgba(255,247,249,.82));
    padding: 18px 18px 18px 22px;
    color: #5f5266;
    font-size: 14px;
    line-height: 1.65;
  }

  .qb-policy-box p::before {
    content: "";
    position: absolute;
    left: 10px;
    top: 18px;
    bottom: 18px;
    width: 3px;
    border-radius: 999px;
    background: linear-gradient(180deg, var(--qb-gold), var(--qb-blush));
  }

  .qb-policy-links {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 28px;
  }

  .qb-policy-links a {
    border: 1px solid rgba(47,31,53,.12);
    border-radius: 999px;
    background: rgba(255,255,255,.78);
    padding: 10px 14px;
    color: var(--qb-plum);
    font-size: 13px;
    font-weight: 800;
    box-shadow: 0 8px 22px rgba(47,31,53,.05);
    transition: .2s ease;
  }

  .qb-policy-links a:hover {
    transform: translateY(-2px);
    border-color: rgba(216,169,78,.5);
    color: var(--qb-plum);
    background: #fff;
  }

  @media (max-width: 1080px) {
    .qb-category-grid,
    .qb-product-grid,
    .qb-trust__grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }

  @media (max-width: 780px) {
    .qb-section {
      padding: 56px 0;
    }

    .qb-hero__grid,
    .qb-feature__grid,
    .qb-gift__grid {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .qb-hero__grid {
      padding: 58px 0;
    }

    .qb-hero__media {
      min-height: auto;
    }

    .qb-note {
      position: static;
      width: auto;
      margin-top: 14px;
    }

    .qb-heading-row {
      display: block;
    }

    .qb-heading-row .qb-copy {
      margin-top: 14px;
    }

    .qb-category-grid,
    .qb-product-grid,
    .qb-trust__grid,
    .qb-policy-box,
    .qb-gift-card-grid,
    .qb-list {
      grid-template-columns: 1fr;
    }

    .qb-category-grid,
    .qb-product-grid,
    .qb-trust__grid,
    .qb-gift-card-grid {
      display: flex;
      gap: 14px;
      width: calc(100% + 16px);
      margin-right: -16px;
      padding: 2px 16px 12px 0;
      overflow-x: auto;
      overscroll-behavior-inline: contain;
      scroll-padding-inline: 0 16px;
      scroll-snap-type: x mandatory;
      scrollbar-width: none;
      -webkit-overflow-scrolling: touch;
    }

    .qb-product-grid,
    .qb-trust__grid,
    .qb-gift-card-grid {
      gap: 16px;
    }

    .qb-category-grid::-webkit-scrollbar,
    .qb-product-grid::-webkit-scrollbar,
    .qb-trust__grid::-webkit-scrollbar,
    .qb-gift-card-grid::-webkit-scrollbar {
      display: none;
    }

    .qb-category-card {
      flex: 0 0 min(78vw, 320px);
      min-height: 300px;
      scroll-snap-align: start;
    }

    .qb-product-card {
      flex: 0 0 min(82vw, 350px);
      scroll-snap-align: start;
      scroll-snap-stop: always;
    }

    .qb-product-card > a {
      display: block;
      aspect-ratio: 1 / 1;
      overflow: hidden;
      background: var(--qb-gray);
    }

    .qb-product-card > a img {
      width: 100%;
      height: 100%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      object-position: center;
    }

    .qb-trust-card {
      flex: 0 0 min(82vw, 350px);
      scroll-snap-align: start;
      scroll-snap-stop: always;
    }

    .qb-gift-card {
      flex: 0 0 min(82vw, 350px);
      scroll-snap-align: start;
      scroll-snap-stop: always;
    }

    .qb-actions {
      flex-direction: column;
    }

    .qb-button {
      width: 100%;
    }
  }
</style>

<div class="qb-home">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Modern Bracelets & Giftable Jewelry', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e("Bracelets For Everyday Confidence", 'dawp'); ?></h1>
        <p class="qb-copy">
          <?php esc_html_e('Discover elegant and modern bracelets designed for daily styling, meaningful gifts, and personal expression.', 'dawp'); ?>
        </p>

        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($shop_url); ?>">
            <?php esc_html_e('Shop Bracelets', 'dawp'); ?>
          </a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(qb_home_category_url('charm-bracelets')); ?>">
            <?php esc_html_e('Explore Charm Bracelets', 'dawp'); ?>
          </a>
        </div>

        <div class="qb-hero__trust" aria-label="<?php esc_attr_e('Store highlights', 'dawp'); ?>">
          <span class="qb-pill"><?php esc_html_e('Fresh styles', 'dawp'); ?></span>
          <span class="qb-pill"><?php esc_html_e('Giftable details', 'dawp'); ?></span>
          <span class="qb-pill"><?php esc_html_e('Everyday bracelet looks', 'dawp'); ?></span>
        </div>
      </div>

      <div class="qb-hero__media">
        <div class="qb-photo-card">
          <?php if ($hero_image) : ?>
            <?php
            echo qb_responsive_image(
                $hero_image,
                __("Elegant bracelet style from Altrevia", 'dawp'),
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
        <div class="qb-note">
          <strong><?php esc_html_e('Bracelet-focused boutique', 'dawp'); ?></strong>
          <span><?php esc_html_e('Charm, owl, beaded, chain, and gift-ready bracelet styles for simple everyday elegance.', 'dawp'); ?></span>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap">
      <div class="qb-heading-row">
        <div>
          <p class="qb-eyebrow"><?php esc_html_e('Shop By Bracelet Style', 'dawp'); ?></p>
          <h2 class="qb-title"><?php esc_html_e('Find Your Bracelet Look', 'dawp'); ?></h2>
        </div>
        <p class="qb-copy">
          <?php esc_html_e('Browse clear bracelet categories made for everyday outfits, meaningful details, and thoughtful gifts.', 'dawp'); ?>
        </p>
      </div>

      <div class="qb-category-grid">
        <?php foreach ($categories as $category) : ?>
          <?php $category_image = qb_home_asset_image($category['image']) ?: qb_home_category_image($category['query_slugs']); ?>
          <a class="qb-category-card" href="<?php echo esc_url(qb_home_category_url($category['slug'])); ?>">
            <?php if ($category_image) : ?>
              <?php
              echo qb_responsive_image(
                  $category_image,
                  $category['title'],
                  [
                      'width'  => 504,
                      'height' => 673,
                      'widths' => [240, 320, 400, 504],
                      'sizes'  => '(max-width: 780px) calc(100vw - 32px), (max-width: 1080px) 50vw, 20vw',
                  ]
              );
              ?>
            <?php endif; ?>
            <span class="qb-category-card__body">
              <h3><?php echo esc_html($category['title']); ?></h3>
              <p><?php echo esc_html($category['copy']); ?></p>
            </span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="qb-section qb-feature">
    <div class="qb-wrap qb-feature__grid">
      <div class="qb-photo-card">
        <?php $owl_image = qb_home_asset_image('Charm_Owl_Bracelets.png') ?: qb_home_category_image(['owl-bracelets', 'charm-bracelets', 'handmade-bracelets']) ?: $hero_image; ?>
        <?php if ($owl_image) : ?>
          <?php
          echo qb_responsive_image(
              $owl_image,
              __('Owl-inspired charm bracelet detail', 'dawp'),
              [
                  'width'  => 900,
                  'height' => 1125,
                  'widths' => [420, 640, 768, 900],
                  'sizes'  => '(max-width: 780px) calc(100vw - 32px), 46vw',
              ]
          );
          ?>
        <?php endif; ?>
      </div>

      <div class="qb-feature__panel">
        <p class="qb-eyebrow"><?php esc_html_e('Charm & Owl Bracelets', 'dawp'); ?></p>
        <h2 class="qb-title"><?php esc_html_e('Meaningful details made for everyday expression.', 'dawp'); ?></h2>
        <p class="qb-copy">
          <?php esc_html_e("From simple charm bracelets to owl-inspired designs, Altrevia offers feminine jewelry pieces that feel personal, easy to wear, and thoughtful to gift.", 'dawp'); ?>
        </p>

        <ul class="qb-list">
          <li><?php esc_html_e('Owl-inspired charms', 'dawp'); ?></li>
          <li><?php esc_html_e('Everyday bracelet styles', 'dawp'); ?></li>
          <li><?php esc_html_e('Giftable designs', 'dawp'); ?></li>
          <li><?php esc_html_e('Personal expression', 'dawp'); ?></li>
        </ul>

        <p class="qb-safe-note">
          <?php esc_html_e('Please review material, bracelet length, clasp type, and care details on each product page before ordering.', 'dawp'); ?>
        </p>

        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(qb_home_category_url('charm-bracelets')); ?>">
            <?php esc_html_e('Shop Charm Bracelets', 'dawp'); ?>
          </a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(qb_home_category_url('owl-bracelets')); ?>">
            <?php esc_html_e('View Owl Bracelets', 'dawp'); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php if (!empty($featured_products)) : ?>
    <section class="qb-section qb-products">
      <div class="qb-wrap">
        <div class="qb-heading-row">
          <div>
            <p class="qb-eyebrow"><?php esc_html_e('New Arrivals', 'dawp'); ?></p>
            <h2 class="qb-title"><?php esc_html_e('Fresh bracelet styles for daily looks and thoughtful gifts.', 'dawp'); ?></h2>
          </div>
          <p class="qb-copy">
            <?php esc_html_e('Browse charm bracelets, beaded styles, chain bracelets, and gift-ready pieces selected for everyday confidence.', 'dawp'); ?>
          </p>
        </div>

        <div class="qb-product-grid">
          <?php foreach ($featured_products as $product) : ?>
            <?php
            $product_image = wp_get_attachment_image_url($product->get_image_id(), 'woocommerce_single');
            $product_image = $product_image ?: (function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_single') : '');
            ?>
            <article class="qb-product-card">
              <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                <?php if ($product_image) : ?>
                  <?php
                  echo qb_responsive_image(
                      $product_image,
                      $product->get_name(),
                      [
                          'width'  => 420,
                          'height' => 525,
                          'widths' => [240, 320, 420, 560],
                          'sizes'  => '(max-width: 780px) 82vw, (max-width: 1080px) 50vw, 25vw',
                      ]
                  );
                  ?>
                <?php endif; ?>
              </a>
              <div class="qb-product-card__body">
                <h3><?php echo esc_html($product->get_name()); ?></h3>
                <p class="qb-product-card__meta"><?php esc_html_e('Review material, size, and care details before ordering.', 'dawp'); ?></p>
                <div class="qb-product-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                <a class="qb-product-card__link" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                  <?php esc_html_e('View Product', 'dawp'); ?>
                </a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="qb-section qb-gift">
    <div class="qb-wrap qb-gift__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Giftable Jewelry', 'dawp'); ?></p>
        <h2 class="qb-title"><?php esc_html_e('Small pieces with thoughtful meaning.', 'dawp'); ?></h2>
        <p class="qb-copy">
          <?php esc_html_e("Whether you are choosing a bracelet for yourself or someone special, Altrevia brings together easy-to-wear styles that feel personal, polished, and gift-ready.", 'dawp'); ?>
        </p>

        <div class="qb-gift-card-grid">
          <div class="qb-gift-card">
            <h3><?php esc_html_e('Birthday Gifts', 'dawp'); ?></h3>
            <p><?php esc_html_e('Elegant bracelet styles for personal, easy-to-wear birthday moments.', 'dawp'); ?></p>
          </div>
          <div class="qb-gift-card">
            <h3><?php esc_html_e('Holiday Gifts', 'dawp'); ?></h3>
            <p><?php esc_html_e('Giftable pieces for festive outfits and thoughtful seasonal giving.', 'dawp'); ?></p>
          </div>
          <div class="qb-gift-card">
            <h3><?php esc_html_e('Everyday Reminders', 'dawp'); ?></h3>
            <p><?php esc_html_e('Simple charm details for daily style and personal expression.', 'dawp'); ?></p>
          </div>
        </div>

        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(qb_home_category_url('gift-bracelets')); ?>">
            <?php esc_html_e('Explore Gift Bracelets', 'dawp'); ?>
          </a>
        </div>
      </div>

      <div class="qb-photo-card">
        <?php $gift_image = qb_home_asset_image('Giftable_Jewelry.png') ?: qb_home_category_image(['gift-bracelets', 'artisan-gifts']) ?: $hero_image; ?>
        <?php if ($gift_image) : ?>
          <?php
          echo qb_responsive_image(
              $gift_image,
              __('Giftable bracelet style', 'dawp'),
              [
                  'width'  => 900,
                  'height' => 1125,
                  'widths' => [420, 640, 768, 900],
                  'sizes'  => '(max-width: 780px) calc(100vw - 32px), 46vw',
              ]
          );
          ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="qb-section qb-trust">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Clear support from checkout to delivery.', 'dawp'); ?></h2>
      <p class="qb-copy">
        <?php esc_html_e('Shop bracelet styles with clear product details, order tracking, and customer support when you need help.', 'dawp'); ?>
      </p>

      <div class="qb-trust__grid">
        <div class="qb-trust-card qb-trust-card--secure">
          <span class="qb-trust-card__icon" aria-hidden="true">SSL</span>
          <h3><?php esc_html_e('Secure Checkout', 'dawp'); ?></h3>
          <p><?php esc_html_e('A clear shopping flow with protected order and payment details.', 'dawp'); ?></p>
        </div>
        <div class="qb-trust-card qb-trust-card--tracking">
          <span class="qb-trust-card__icon" aria-hidden="true">TRK</span>
          <h3><?php esc_html_e('Tracking Included', 'dawp'); ?></h3>
          <p><?php esc_html_e('Tracking information is provided once an order ships.', 'dawp'); ?></p>
        </div>
        <div class="qb-trust-card qb-trust-card--returns">
          <span class="qb-trust-card__icon" aria-hidden="true">30</span>
          <h3><?php esc_html_e('30-Day Returns', 'dawp'); ?></h3>
          <p><?php esc_html_e('Eligible items may be returned by mail within 30 days from the delivery date after contacting support first.', 'dawp'); ?></p>
        </div>
        <div class="qb-trust-card qb-trust-card--details">
          <span class="qb-trust-card__icon" aria-hidden="true">FIT</span>
          <h3><?php esc_html_e('Material & Size Details', 'dawp'); ?></h3>
          <p><?php esc_html_e('Product pages should include bracelet length, finish, clasp details, and care instructions.', 'dawp'); ?></p>
        </div>
      </div>

      <div class="qb-policy-box">
        <p><?php esc_html_e('Order cutoff is 5:00 PM Pacific Standard Time. Handling takes 1-3 business days, and fulfillment runs Monday-Friday excluding public holidays.', 'dawp'); ?></p>
        <p><?php esc_html_e('Standard U.S. shipping is free unless checkout shows otherwise, with 5-7 business day transit and usually 6-10 business days estimated delivery.', 'dawp'); ?></p>
        <p><?php esc_html_e('Eligible returns are accepted by mail within 30 days from delivery date after contacting support first. There is no restocking fee, and refunds are processed within 7 days after inspection approval.', 'dawp'); ?></p>
        <p><?php esc_html_e('For order support, contact support@altreviallc.com. Customer Service Hours: Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></p>
      </div>

    </div>
  </section>
</div>
