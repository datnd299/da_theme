<?php
/**
 * Homepage — ShopGraphicshirt
 * Patriotic apparel & custom gift brand.
 * Based on: site.md / design_system.md / home_plan.md
 * 7 sections: Hero + Strip | Categories | Best Sellers | Personalized | Occasions | Tributes | Trust
 */
$sgs_home_img = trailingslashit(get_template_directory_uri()) . 'assets/img/home/';
?>

<section class="sgs-home">

  <!-- ================================================================ -->
  <!-- SECTION 1 — Hero + Quick Shop Strip                              -->
  <!-- ================================================================ -->
  <div class="sgs-hero">
    <div class="sgs-hero__inner">
      <div class="sgs-hero__copy">
        <p class="sgs-eyebrow sgs-eyebrow--light">American Patriotic Apparel &amp; Custom Gifts</p>
        <h1>Wear The Freedom.<br>Live The Pride.</h1>
        <p class="sgs-hero__text">Premium graphic tees, bomber jackets, hats, hoodies, and accessories made for proud Americans.</p>
        <div class="sgs-hero__actions">
          <a href="/best-sellers/" class="sgs-btn sgs-btn--primary sgs-btn--lg">Shop Best Sellers</a>
          <a href="/product-category/bomber-jackets/" class="sgs-btn sgs-btn--ghost sgs-btn--lg">Customize Yours</a>
        </div>
        <p class="sgs-hero__trust">Secure checkout. Tracking included. Custom gifts made with care.</p>
      </div>
    </div>
  </div>

  <!-- Quick-shop strip -->
  <div class="sgs-strip">
    <a href="/product-category/american-flag-tees/" class="sgs-strip__card">
      <span>American Flag Tees</span>
      <span class="sgs-strip__cta">Shop Now →</span>
    </a>
    <a href="/product-category/bomber-jackets/" class="sgs-strip__card">
      <span>Bomber Jackets</span>
      <span class="sgs-strip__cta">Shop Now →</span>
    </a>
    <a href="/best-sellers/" class="sgs-strip__card">
      <span>Best Sellers</span>
      <span class="sgs-strip__cta">Shop Now →</span>
    </a>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 2 — Shop By Category                                     -->
  <!-- ================================================================ -->
  <div class="sgs-section">
    <div class="sgs-section__head">
      <div>
        <p class="sgs-eyebrow">Categories</p>
        <h2>Shop By Collection</h2>
      </div>
      <a href="/shop/" class="sgs-btn sgs-btn--dark sgs-btn--sm">View All →</a>
    </div>

    <div class="sgs-cat-slider" data-collection-slider>
      <div class="sgs-cat-grid" data-collection-track>
      <!-- Flag Tees -->
      <a href="/product-category/american-flag-tees/" class="sgs-cat" data-collection-slide style="background-image:url('<?php echo esc_url($sgs_home_img . 'cat-flag-tees.png'); ?>')">
        <div class="sgs-cat__overlay"></div>
        <div class="sgs-cat__content">
          <span class="sgs-cat__eyebrow">American Flag Tees</span>
          <h3>Flag Collection</h3>
          <p>Bold flag designs, distressed prints, and eagle graphics.</p>
          <span class="sgs-cat__cta">Shop Collection</span>
        </div>
      </a>
      <!-- Bomber Jackets -->
      <a href="/product-category/bomber-jackets/" class="sgs-cat" data-collection-slide style="background-image:url('<?php echo esc_url($sgs_home_img . 'cat-bomber.png'); ?>')">
        <div class="sgs-cat__overlay"></div>
        <div class="sgs-cat__content">
          <span class="sgs-cat__eyebrow">Bomber Jackets</span>
          <h3>Classic Bombers</h3>
          <p>MA-1 style with flag patches and custom embroidery.</p>
          <span class="sgs-cat__cta">Shop Collection</span>
        </div>
      </a>
      <!-- Hats & Beanies -->
      <a href="/product-category/hats-beanies/" class="sgs-cat" data-collection-slide style="background-image:url('<?php echo esc_url($sgs_home_img . 'cat-hats.png'); ?>')">
        <div class="sgs-cat__overlay"></div>
        <div class="sgs-cat__content">
          <span class="sgs-cat__eyebrow">Hats &amp; Beanies</span>
          <h3>Headwear</h3>
          <p>Snapbacks, dad hats, beanies with flag embroidery.</p>
          <span class="sgs-cat__cta">Shop Collection</span>
        </div>
      </a>
      <!-- Premium T-Shirts -->
      <a href="/product-category/premium-t-shirts/" class="sgs-cat" data-collection-slide style="background-image:url('<?php echo esc_url($sgs_home_img . 'cat-tees.png'); ?>')">
        <div class="sgs-cat__overlay"></div>
        <div class="sgs-cat__content">
          <span class="sgs-cat__eyebrow">Premium T-Shirts</span>
          <h3>Signature Tees</h3>
          <p>Heavy-weight cotton with vintage-style prints.</p>
          <span class="sgs-cat__cta">Shop Collection</span>
        </div>
      </a>
      <!-- Accessories -->
      <a href="/product-category/patches-pins/" class="sgs-cat" data-collection-slide style="background-image:url('<?php echo esc_url($sgs_home_img . 'cat-accessories.png'); ?>')">
        <div class="sgs-cat__overlay"></div>
        <div class="sgs-cat__content">
          <span class="sgs-cat__eyebrow">Patches &amp; Pins</span>
          <h3>Accessories</h3>
          <p>Patches, pins, mugs for everyday American pride.</p>
          <span class="sgs-cat__cta">Shop Collection</span>
        </div>
      </a>
      </div>
      <div class="sgs-mobile-slider-controls" aria-label="Collection slider controls">
        <button class="sgs-mobile-slider-btn" type="button" data-collection-prev aria-label="Previous collection">&lsaquo;</button>
        <div class="sgs-mobile-slider-dots" aria-label="Collection slider pages">
          <button type="button" data-collection-dot aria-label="Go to collection 1"></button>
          <button type="button" data-collection-dot aria-label="Go to collection 2"></button>
          <button type="button" data-collection-dot aria-label="Go to collection 3"></button>
          <button type="button" data-collection-dot aria-label="Go to collection 4"></button>
          <button type="button" data-collection-dot aria-label="Go to collection 5"></button>
        </div>
        <button class="sgs-mobile-slider-btn" type="button" data-collection-next aria-label="Next collection">&rsaquo;</button>
      </div>
    </div>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 3 — Best Sellers Product Grid                            -->
  <!-- ================================================================ -->
  <div class="sgs-section sgs-section--surface">
    <div class="sgs-section__head">
      <div>
        <p class="sgs-eyebrow">Best Sellers</p>
        <h2>Patriotic Favorites For Everyday Pride</h2>
      </div>
      <a href="/best-sellers/" class="sgs-btn sgs-btn--dark sgs-btn--sm">View All →</a>
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
            <?php echo wp_get_attachment_image($sgs_product_image_id, 'woocommerce_thumbnail', false, ['loading' => 'lazy', 'alt' => $product->get_name()]); ?>
          <?php else : ?>
            <?php echo wc_placeholder_img('woocommerce_thumbnail'); ?>
          <?php endif; ?>
        </div>
        <h3><?php echo esc_html($product->get_name()); ?></h3>
        <span class="sgs-prod__price">
          <?php echo wp_kses_post($product->get_price_html()); ?>
        </span>
        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="sgs-btn sgs-btn--primary">Shop Now</a>
      </div>
      <?php endforeach; ?>
      <?php else : ?>
        <p><?php esc_html_e('Products will appear here after they are imported and published.', 'shopgraphicshirt'); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 4 — Gift By Occasion                                     -->
  <!-- ================================================================ -->
  <div class="sgs-section sgs-section--warm">
    <div class="sgs-section__center">
      <p class="sgs-eyebrow">Gift By Occasion</p>
      <h2>Meaningful Patriotic Gifts For Moments That Matter</h2>
    </div>

    <div class="sgs-occ-slider" data-occasion-slider>
      <div class="sgs-occ-grid" data-occasion-track>
      <div class="sgs-occ" data-occasion-slide>
        <span class="sgs-occ__icon">🎁</span>
        <h3>Father's Day Gifts</h3>
        <p>A meaningful gift for dads who love classic American style.</p>
        <a href="/product-category/fathers-day/" class="sgs-occ__cta">Shop Gifts</a>
      </div>
      <div class="sgs-occ" data-occasion-slide>
        <span class="sgs-occ__icon">🕊️</span>
        <h3>Memorial Day Gifts</h3>
        <p>Remember and honor with patriotic tribute products.</p>
        <a href="/product-category/memorial-day/" class="sgs-occ__cta">Shop Gifts</a>
      </div>
      <div class="sgs-occ" data-occasion-slide>
        <span class="sgs-occ__icon">🎆</span>
        <h3>Independence Day Gifts</h3>
        <p>Celebrate freedom with flag tees, hats, and accessories.</p>
        <a href="/product-category/independence-day/" class="sgs-occ__cta">Shop Gifts</a>
      </div>
      <div class="sgs-occ sgs-occ--gold" data-occasion-slide>
        <span class="sgs-occ__icon sgs-occ__icon--gold">🏆</span>
        <h3>America 250th Anniversary</h3>
        <p>Exclusive collection celebrating 250 years of American pride.</p>
        <a href="/product-category/america-250/" class="sgs-occ__cta">Explore</a>
      </div>
      </div>
      <div class="sgs-occ-slider__controls" aria-label="Gift occasion slider controls">
        <button class="sgs-occ-slider__arrow" type="button" data-occasion-prev aria-label="Previous occasion">&lsaquo;</button>
        <div class="sgs-occ-slider__dots" aria-label="Gift occasion slides">
          <?php for ($i = 0; $i < 4; $i++) : ?>
            <button class="sgs-occ-slider__dot" type="button" data-occasion-dot aria-label="<?php echo esc_attr(sprintf('Go to occasion %d', $i + 1)); ?>"></button>
          <?php endfor; ?>
        </div>
        <button class="sgs-occ-slider__arrow" type="button" data-occasion-next aria-label="Next occasion">&rsaquo;</button>
      </div>
    </div>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 5 — Trust + About + Newsletter                           -->
  <!-- ================================================================ -->
  <div class="sgs-section">
    <div class="sgs-trust-slider" data-trust-slider>
    <div class="sgs-trust-grid" data-trust-track>
      <div class="sgs-trust" data-trust-slide>
        <span class="sgs-trust__icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg>
        </span>
        <h3>Secure Checkout</h3>
        <p>A safe and simple checkout experience for every order.</p>
      </div>
      <div class="sgs-trust" data-trust-slide>
        <span class="sgs-trust__icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg>
        </span>
        <h3>Tracking Included</h3>
        <p>Tracking details are provided once your order ships.</p>
      </div>
      <div class="sgs-trust" data-trust-slide>
        <span class="sgs-trust__icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        </span>
        <h3>30-Day Returns</h3>
        <p>Eligible non-personalized items may be returned within 30 days.</p>
      </div>
      <div class="sgs-trust" data-trust-slide>
        <span class="sgs-trust__icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-5.2 7-12A7 7 0 0 0 5 9c0 6.8 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
        </span>
        <h3>Personalization Support</h3>
        <p>Review your custom details carefully before ordering.</p>
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
      <h2>Patriotic Apparel And Gifts Made For American Pride</h2>
      <p>ShopGraphicshirt is a patriotic apparel and custom gift brand created for proud Americans who want meaningful products that carry classic style and American pride.</p>
      <a href="/about-us/" class="sgs-btn sgs-btn--secondary">Learn More →</a>
    </div>

    <div class="sgs-newsletter">
      <div>
        <h2>Get New Patriotic Drops And Gift Ideas</h2>
      </div>
      <form class="sgs-newsletter__form" onsubmit="event.preventDefault(); this.reset(); alert('Thanks for signing up!');">
        <label class="sr-only" for="sgs-hm-email">Email</label>
        <input id="sgs-hm-email" type="email" placeholder="Enter your email" required>
        <button class="sgs-btn sgs-btn--primary" type="submit">Sign Up</button>
      </form>
    </div>
  </div>

</section>
