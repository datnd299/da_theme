<?php
/**
 * Homepage - Veteran Gift
 * Patriotic apparel, personalized veteran gifts, and tribute keepsakes.
 */
$sgs_best_sellers_url = dawp_product_category_url('best-sellers');
$sgs_veteran_tribute_url = dawp_product_category_url('veteran-tribute');
$sgs_bomber_jackets_url = dawp_product_category_url('bomber-jackets');
$sgs_flag_tees_url = dawp_product_category_url('american-flag-tees');
$sgs_hats_url = dawp_product_category_url('hats-beanies');
$sgs_premium_tees_url = dawp_product_category_url('premium-t-shirts');
$sgs_accessories_url = dawp_product_category_url('patches-pins');
$sgs_drinkware_url = dawp_product_category_url('mugs-drinkware');

$sgs_home_cat_images = [
  'flag-tees' => 'assets/img/home/cat-flag-tees.png',
  'veteran' => 'assets/img/home/cat-veteran.png',
  'bomber' => 'assets/img/home/cat-bomber.png',
  'hats' => 'assets/img/home/cat-hats.png',
  'tees' => 'assets/img/home/cat-tees.png',
  'accessories' => 'assets/img/home/vg-category-gift-collage-v2.png',
];

$sgs_home_hero_bg = sprintf(
  "--sgs-hero-bg:url('%s');--sgs-hero-bg-tablet:url('%s');--sgs-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/home/vg-hero-gift-v2.png', 1600, 900)),
  esc_url(dawp_theme_cdn_image_url('assets/img/home/vg-hero-gift-v2.png', 900, 900)),
  esc_url(dawp_theme_cdn_image_url('assets/img/home/vg-hero-gift-v2.png', 640, 760))
);

$sgs_cat_bg = static function ($key) use ($sgs_home_cat_images) {
  $path = $sgs_home_cat_images[$key];
  return sprintf(
    "--sgs-cat-bg:url('%s');--sgs-cat-bg-mobile:url('%s')",
    esc_url(dawp_theme_cdn_image_url($path, 720, 900)),
    esc_url(dawp_theme_cdn_image_url($path, 720, 440))
  );
};
?>

<section class="sgs-home">
  <div class="sgs-hero" style="<?php echo esc_attr($sgs_home_hero_bg); ?>">
    <div class="sgs-hero__inner">
      <div class="sgs-hero__copy">
        <p class="sgs-eyebrow sgs-eyebrow--light">Personalized Veteran Gifts &amp; Patriotic Keepsakes</p>
        <h1>Honor Their Service<br>With A Gift That Lasts</h1>
        <p class="sgs-hero__text">Custom apparel, tribute keepsakes, drinkware, hats, and accessories made for veterans, military families, and proud Americans.</p>
        <div class="sgs-hero__actions">
          <a href="<?php echo esc_url($sgs_best_sellers_url); ?>" class="sgs-btn sgs-btn--primary sgs-btn--lg">Shop Veteran Gifts</a>
          <a href="<?php echo esc_url($sgs_veteran_tribute_url); ?>" class="sgs-btn sgs-btn--ghost sgs-btn--lg">Personalize A Gift</a>
        </div>
        <p class="sgs-hero__trust">Secure checkout. Tracking included. Personalized gifts made with care.</p>
      </div>
    </div>
  </div>

  <div class="sgs-strip sgs-strip--four">
    <a href="<?php echo esc_url($sgs_flag_tees_url); ?>" class="sgs-strip__card">
      <span>American Flag Tees</span>
      <span class="sgs-strip__cta">Shop Now -></span>
    </a>
    <a href="<?php echo esc_url($sgs_bomber_jackets_url); ?>" class="sgs-strip__card">
      <span>Bomber Jackets</span>
      <span class="sgs-strip__cta">Shop Now -></span>
    </a>
    <a href="<?php echo esc_url($sgs_veteran_tribute_url); ?>" class="sgs-strip__card">
      <span>Veteran Tribute</span>
      <span class="sgs-strip__cta">Shop Now -></span>
    </a>
    <a href="<?php echo esc_url($sgs_best_sellers_url); ?>" class="sgs-strip__card">
      <span>Best Sellers</span>
      <span class="sgs-strip__cta">Shop Now -></span>
    </a>
  </div>

  <div class="sgs-section">
    <div class="sgs-section__head">
      <div>
        <p class="sgs-eyebrow">Categories</p>
        <h2>Shop By Collection</h2>
      </div>
      <a href="/shop/" class="sgs-btn sgs-btn--dark sgs-btn--sm">View All -></a>
    </div>

    <div class="sgs-cat-slider" data-collection-slider>
      <div class="sgs-cat-grid" data-collection-track>
        <a href="<?php echo esc_url($sgs_flag_tees_url); ?>" class="sgs-cat" data-collection-slide style="<?php echo esc_attr($sgs_cat_bg('flag-tees')); ?>">
          <div class="sgs-cat__overlay"></div>
          <div class="sgs-cat__content">
            <span class="sgs-cat__eyebrow">American Flag Tees</span>
            <h3>Flag Collection</h3>
            <p>Bold flag designs, distressed prints, and eagle graphics.</p>
            <span class="sgs-cat__cta">Shop Collection</span>
          </div>
        </a>
        <a href="<?php echo esc_url($sgs_veteran_tribute_url); ?>" class="sgs-cat" data-collection-slide style="<?php echo esc_attr($sgs_cat_bg('veteran')); ?>">
          <div class="sgs-cat__overlay"></div>
          <div class="sgs-cat__content">
            <span class="sgs-cat__eyebrow">Veteran Tribute</span>
            <h3>Service Honor</h3>
            <p>Respectful apparel and keepsakes for service, memory, and legacy.</p>
            <span class="sgs-cat__cta">Shop Collection</span>
          </div>
        </a>
        <a href="<?php echo esc_url($sgs_bomber_jackets_url); ?>" class="sgs-cat" data-collection-slide style="<?php echo esc_attr($sgs_cat_bg('bomber')); ?>">
          <div class="sgs-cat__overlay"></div>
          <div class="sgs-cat__content">
            <span class="sgs-cat__eyebrow">Bomber Jackets</span>
            <h3>Custom Bombers</h3>
            <p>MA-1 style jackets with flag patches and custom name options.</p>
            <span class="sgs-cat__cta">Customize Yours</span>
          </div>
        </a>
        <a href="<?php echo esc_url($sgs_drinkware_url); ?>" class="sgs-cat" data-collection-slide style="<?php echo esc_attr($sgs_cat_bg('accessories')); ?>">
          <div class="sgs-cat__overlay"></div>
          <div class="sgs-cat__content">
            <span class="sgs-cat__eyebrow">Drinkware &amp; Mugs</span>
            <h3>Daily Tribute</h3>
            <p>Mugs, tumblers, patches, and small gifts for everyday pride.</p>
            <span class="sgs-cat__cta">Shop Drinkware</span>
          </div>
        </a>
        <a href="<?php echo esc_url($sgs_premium_tees_url); ?>" class="sgs-cat" data-collection-slide style="<?php echo esc_attr($sgs_cat_bg('tees')); ?>">
          <div class="sgs-cat__overlay"></div>
          <div class="sgs-cat__content">
            <span class="sgs-cat__eyebrow">Premium T-Shirts</span>
            <h3>Signature Tees</h3>
            <p>Heavy-weight cotton with vintage-style American heritage prints.</p>
            <span class="sgs-cat__cta">Shop Tees</span>
          </div>
        </a>
        <a href="<?php echo esc_url($sgs_hats_url); ?>" class="sgs-cat" data-collection-slide style="<?php echo esc_attr($sgs_cat_bg('hats')); ?>">
          <div class="sgs-cat__overlay"></div>
          <div class="sgs-cat__content">
            <span class="sgs-cat__eyebrow">Hats &amp; Accessories</span>
            <h3>Finishing Touches</h3>
            <p>Patriotic hats, beanies, patches, and pins for everyday wear.</p>
            <span class="sgs-cat__cta">Shop Accessories</span>
          </div>
        </a>
      </div>
      <div class="sgs-mobile-slider-controls" aria-label="Collection slider controls">
        <button class="sgs-mobile-slider-btn" type="button" data-collection-prev aria-label="Previous collection">&lsaquo;</button>
        <div class="sgs-mobile-slider-dots" aria-label="Collection slider pages">
          <?php for ($i = 0; $i < 6; $i++) : ?>
            <button type="button" data-collection-dot aria-label="<?php echo esc_attr(sprintf('Go to collection %d', $i + 1)); ?>"></button>
          <?php endfor; ?>
        </div>
        <button class="sgs-mobile-slider-btn" type="button" data-collection-next aria-label="Next collection">&rsaquo;</button>
      </div>
    </div>
  </div>

  <div class="sgs-section sgs-section--surface">
    <div class="sgs-section__head">
      <div>
        <p class="sgs-eyebrow">Best Sellers</p>
        <h2>Most-Gifted Picks For Veterans And Families</h2>
      </div>
      <a href="<?php echo esc_url($sgs_best_sellers_url); ?>" class="sgs-btn sgs-btn--dark sgs-btn--sm">View All -></a>
    </div>

    <div class="sgs-prod-grid">
      <?php
      $sgs_products = [];

      if (function_exists('wc_get_products')) {
        $sgs_products = wc_get_products([
          'status' => 'publish',
          'limit' => 8,
          'featured' => true,
          'orderby' => 'date',
          'order' => 'DESC',
        ]);

        if (count($sgs_products) < 8) {
          $sgs_existing_ids = array_map(
            static function ($product) {
              return $product instanceof WC_Product ? $product->get_id() : 0;
            },
            $sgs_products
          );

          $sgs_products = array_merge($sgs_products, wc_get_products([
            'status' => 'publish',
            'limit' => 8 - count($sgs_products),
            'exclude' => array_filter($sgs_existing_ids),
            'orderby' => 'date',
            'order' => 'DESC',
          ]));
        }
      }
      ?>
      <?php if (!empty($sgs_products)) : ?>
        <?php foreach ($sgs_products as $index => $product) : ?>
          <?php
          if (!$product instanceof WC_Product) {
            continue;
          }

          $sgs_product_image_id = $product->get_image_id();
          ?>
          <div class="sgs-prod">
            <?php if ($product->is_featured() || $index < 3) : ?>
              <span class="sgs-prod__badge">Best Seller</span>
            <?php elseif ((time() - get_post_time('U', true, $product->get_id())) <= MONTH_IN_SECONDS) : ?>
              <span class="sgs-prod__badge sgs-prod__badge--gold">New</span>
            <?php endif; ?>
            <div class="sgs-prod__img">
              <?php if ($sgs_product_image_id) : ?>
                <?php echo dawp_product_responsive_image($product, '', '(max-width: 640px) calc(100vw - 72px), (max-width: 1024px) calc((100vw - 96px) / 2), 280px'); ?>
              <?php else : ?>
                <?php echo wc_placeholder_img('woocommerce_thumbnail'); ?>
              <?php endif; ?>
            </div>
            <h3><?php echo esc_html($product->get_name()); ?></h3>
            <span class="sgs-prod__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
            <a href="<?php echo esc_url($product->get_permalink()); ?>" class="sgs-btn sgs-btn--primary">Shop Now</a>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p><?php esc_html_e('Products will appear here after they are imported and published.', 'veterangift'); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="sgs-section">
    <div class="sgs-feature">
      <div class="sgs-feature__copy">
        <p class="sgs-eyebrow">Personalized With Pride</p>
        <h2>Custom Gifts That Carry Name, Branch, And Service Years</h2>
        <p>Many Veteran Gift products can be personalized with details that matter, from a veteran's name to service years, rank, or branch-inspired artwork. These are meaningful gifts made to honor service and legacy.</p>
        <ul class="sgs-feature__list">
          <li>Custom name options</li>
          <li>Rank and service-year details</li>
          <li>Branch-inspired designs</li>
          <li>Optional tribute message</li>
        </ul>
        <a href="<?php echo esc_url($sgs_veteran_tribute_url); ?>" class="sgs-btn sgs-btn--secondary">Shop Custom Gifts -></a>
        <p class="sgs-feature__note">Please review all personalization details carefully before placing your order. Personalized items may require additional production time and may not be eligible for return unless defective, damaged, or incorrect.</p>
      </div>
      <div class="sgs-feature__visual">
        <img src="<?php echo esc_url(dawp_theme_cdn_image_url('assets/img/home/vg-feature-custom-gift-v2.png', 900, 1100)); ?>" alt="Personalized patriotic gifts with jacket, shirt, and mug" loading="lazy">
      </div>
    </div>
  </div>

  <div class="sgs-section sgs-section--warm">
    <div class="sgs-section__center">
      <p class="sgs-eyebrow">Gift By Occasion</p>
      <h2>Meaningful Patriotic Gifts For Moments That Matter</h2>
    </div>

    <div class="sgs-occ-slider" data-occasion-slider>
      <div class="sgs-occ-grid" data-occasion-track>
        <div class="sgs-occ" data-occasion-slide>
          <span class="sgs-occ__icon">FD</span>
          <h3>Father's Day Gifts</h3>
          <p>A meaningful gift for the veteran, dad, or grandpa who carries the story.</p>
          <a href="<?php echo esc_url(dawp_product_category_url('fathers-day-gifts')); ?>" class="sgs-occ__cta">Shop Gifts</a>
        </div>
        <div class="sgs-occ" data-occasion-slide>
          <span class="sgs-occ__icon">VD</span>
          <h3>Veterans Day Gifts</h3>
          <p>Personalized gifts made to honor service years and family legacy.</p>
          <a href="<?php echo esc_url(dawp_product_category_url('veterans-day-gifts')); ?>" class="sgs-occ__cta">Shop Gifts</a>
        </div>
        <div class="sgs-occ" data-occasion-slide>
          <span class="sgs-occ__icon">RT</span>
          <h3>Retirement Gifts</h3>
          <p>Custom keepsakes for the service member starting a new chapter.</p>
          <a href="<?php echo esc_url($sgs_veteran_tribute_url); ?>" class="sgs-occ__cta">Shop Gifts</a>
        </div>
        <div class="sgs-occ" data-occasion-slide>
          <span class="sgs-occ__icon">MD</span>
          <h3>Memorial Day Gifts</h3>
          <p>Remember and honor with respectful patriotic tribute products.</p>
          <a href="<?php echo esc_url(dawp_product_category_url('memorial-day-gifts')); ?>" class="sgs-occ__cta">Shop Gifts</a>
        </div>
        <div class="sgs-occ" data-occasion-slide>
          <span class="sgs-occ__icon">ID</span>
          <h3>Independence Day Gifts</h3>
          <p>Celebrate freedom with flag tees, hats, drinkware, and accessories.</p>
          <a href="<?php echo esc_url(dawp_product_category_url('independence-day-gifts')); ?>" class="sgs-occ__cta">Shop Gifts</a>
        </div>
        <div class="sgs-occ sgs-occ--gold" data-occasion-slide>
          <span class="sgs-occ__icon sgs-occ__icon--gold">250</span>
          <h3>America 250 Gifts</h3>
          <p>Limited patriotic picks for the 250th anniversary season.</p>
          <a href="<?php echo esc_url(dawp_product_category_url('america-250')); ?>" class="sgs-occ__cta">Shop Gifts</a>
        </div>
      </div>
      <div class="sgs-occ-slider__controls" aria-label="Gift occasion slider controls">
        <button class="sgs-occ-slider__arrow" type="button" data-occasion-prev aria-label="Previous occasion">&lsaquo;</button>
        <div class="sgs-occ-slider__dots" aria-label="Gift occasion slides">
          <?php for ($i = 0; $i < 6; $i++) : ?>
            <button class="sgs-occ-slider__dot" type="button" data-occasion-dot aria-label="<?php echo esc_attr(sprintf('Go to occasion %d', $i + 1)); ?>"></button>
          <?php endfor; ?>
        </div>
        <button class="sgs-occ-slider__arrow" type="button" data-occasion-next aria-label="Next occasion">&rsaquo;</button>
      </div>
    </div>
  </div>

  <div class="sgs-section sgs-section--dark">
    <div class="sgs-section__center sgs-section__center--light">
      <p class="sgs-eyebrow sgs-eyebrow--light">Customer Tributes</p>
      <h2>Gift Moments Built Around Service, Memory, And Pride</h2>
      <p class="sgs-tribute__intro">Many customers choose personalized veteran gifts as a way to honor service, remember family legacy, and give something with meaning.</p>
    </div>
    <div class="sgs-trib-grid">
      <blockquote class="sgs-trib">A gift that helps families honor a father's years of service.</blockquote>
      <blockquote class="sgs-trib">A personalized keepsake that carries name, rank, and service years with pride.</blockquote>
      <blockquote class="sgs-trib">A simple way to say thank you without needing too many words.</blockquote>
    </div>
    <div class="sgs-section__cta-center">
      <a href="<?php echo esc_url($sgs_best_sellers_url); ?>" class="sgs-btn sgs-btn--primary">Shop Meaningful Gifts</a>
    </div>
  </div>

  <div class="sgs-section">
    <div class="sgs-trust-slider" data-trust-slider>
      <div class="sgs-trust-grid" data-trust-track>
        <div class="sgs-trust" data-trust-slide>
          <span class="sgs-trust__icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg></span>
          <h3>Secure Checkout</h3>
          <p>A safe and simple checkout experience for every order.</p>
        </div>
        <div class="sgs-trust" data-trust-slide>
          <span class="sgs-trust__icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg></span>
          <h3>Tracking Included</h3>
          <p>Tracking details are provided once your order ships.</p>
        </div>
        <div class="sgs-trust" data-trust-slide>
          <span class="sgs-trust__icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></span>
          <h3>30-Day Returns</h3>
          <p>Eligible non-personalized items may be returned within 30 days.</p>
        </div>
        <div class="sgs-trust" data-trust-slide>
          <span class="sgs-trust__icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-5.2 7-12A7 7 0 0 0 5 9c0 6.8 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/></svg></span>
          <h3>Personalization Support</h3>
          <p>Review your custom name, rank, and service details carefully before ordering.</p>
        </div>
      </div>
      <div class="sgs-trust-slider__controls" aria-label="Trust slider controls">
        <button class="sgs-trust-slider__arrow" type="button" data-trust-prev aria-label="Previous trust item">&lsaquo;</button>
        <div class="sgs-trust-slider__dots" aria-label="Trust slides">
          <?php for ($i = 0; $i < 4; $i++) : ?>
            <button class="sgs-trust-slider__dot" type="button" data-trust-dot aria-label="<?php echo esc_attr(sprintf('Go to trust item %d', $i + 1)); ?>"></button>
          <?php endfor; ?>
        </div>
        <button class="sgs-trust-slider__arrow" type="button" data-trust-next aria-label="Next trust item">&rsaquo;</button>
      </div>
    </div>

    <div class="sgs-about">
      <h2>Patriotic Apparel And Gifts Made To Honor Service</h2>
      <p>Veteran Gift is a patriotic custom gift brand created for veterans, military families, and proud Americans who want meaningful products that carry service, legacy, gratitude, and American pride.</p>
      <a href="/about-us/" class="sgs-btn sgs-btn--secondary">Learn More -></a>
    </div>

    <div class="sgs-newsletter">
      <div>
        <h2>Get New Veteran Gift Ideas And Patriotic Drops</h2>
      </div>
      <form class="sgs-newsletter__form" onsubmit="event.preventDefault(); this.reset(); alert('Thanks for signing up!');">
        <label class="sr-only" for="sgs-hm-email">Email</label>
        <input id="sgs-hm-email" type="email" placeholder="Enter your email" required>
        <button class="sgs-btn sgs-btn--primary" type="submit">Sign Up</button>
      </form>
    </div>
  </div>
</section>
