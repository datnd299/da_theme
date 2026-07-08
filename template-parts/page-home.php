<?php
/**
 * Homepage — Rubyinstar
 * Tire ecommerce homepage with 7 sections.
 * Built from .plans/site.md, design_system.md, home_plan.md
 * Theme: Red / White / Black
 */
?>

<section class="home-page">

  <!-- ================================================================ -->
  <!-- SECTION 1 — Hero + Tire Finder                                    -->
  <!-- ================================================================ -->
  <div class="home-hero">
    <img
      class="home-hero__media"
      src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/hero-car.jpg"
      alt=""
      loading="eager"
    />

    <div class="home-hero__inner">
      <div class="home-hero__copy">
        <p class="home-eyebrow">Online Tire Shopping Made Simple</p>

        <h1>Find The Right Tires For Your Vehicle</h1>

        <p>
          Shop quality tires online with competitive prices,
          convenient delivery, and an easier buying experience.
        </p>

        <div class="home-actions">
          <a href="/shop/" class="home-btn home-btn--primary">Shop Tires</a>
          <a href="#tire-finder" class="home-btn home-btn--ghost">Find My Tire Size</a>
        </div>
      </div>

      <form class="home-finder" id="tire-finder" data-home-tire-finder action="<?php echo esc_url(home_url('/shop/')); ?>" method="get">
        <div class="home-finder__head">
          <div>
            <span>Find Tires For Your Vehicle</span>
            <h2>Tire Finder</h2>
          </div>
          <a href="/shop-by-rim-size/">Search By Size</a>
        </div>

        <div class="home-finder__grid">
          <label>
            <span>Year</span>
            <select name="vehicle_year" data-finder-year>
              <option value="">Select Year</option>
              <?php for ($year = (int) date('Y') + 1; $year >= 2000; $year--) : ?>
                <option value="<?php echo esc_attr($year); ?>"><?php echo esc_html($year); ?></option>
              <?php endfor; ?>
            </select>
          </label>
          <label>
            <span>Vehicle Type</span>
            <select name="vehicle_type" data-finder-type required>
              <option value="">Select Type</option>
              <option value="passenger">Passenger Car</option>
              <option value="suv">SUV / Crossover</option>
              <option value="truck">Pickup / Light Truck</option>
              <option value="performance">Performance</option>
              <option value="trailer">Trailer</option>
            </select>
          </label>
          <label>
            <span>Driving Need</span>
            <select name="driving_need" data-finder-need>
              <option value="">Select Need</option>
              <option value="daily">Daily Driving</option>
              <option value="comfort">Comfort / Touring</option>
              <option value="hauling">Hauling / Utility</option>
              <option value="handling">Responsive Handling</option>
              <option value="towing">Towing</option>
            </select>
          </label>
          <label>
            <span>Season</span>
            <select name="season" data-finder-season>
              <option value="">Select Season</option>
              <option value="all-season">All-Season</option>
              <option value="winter">Winter</option>
            </select>
          </label>
        </div>

        <button class="home-btn home-btn--primary" type="submit">Search Tires</button>
        <p>Don't know your tire size? Use our <a href="#tire-finder"><strong>Tire Finder</strong></a> — it only takes a minute.</p>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const finder = document.querySelector('[data-home-tire-finder]');
      if (!finder) return;

      const type = finder.querySelector('[data-finder-type]');
      const need = finder.querySelector('[data-finder-need]');
      const season = finder.querySelector('[data-finder-season]');

      const categoryUrls = {
        passenger: '<?php echo esc_url(dawp_product_category_url('all-season-tires')); ?>',
        suv: '<?php echo esc_url(dawp_product_category_url('suv-crossover-tires')); ?>',
        truck: '<?php echo esc_url(dawp_product_category_url('light-truck-tires')); ?>',
        performance: '<?php echo esc_url(dawp_product_category_url('performance-tires')); ?>',
        trailer: '<?php echo esc_url(dawp_product_category_url('trailer-tires')); ?>',
        winter: '<?php echo esc_url(dawp_product_category_url('winter-tires')); ?>'
      };

      finder.addEventListener('submit', function (event) {
        event.preventDefault();

        const selectedType = type ? type.value : '';
        const selectedNeed = need ? need.value : '';
        const selectedSeason = season ? season.value : '';
        let target = categoryUrls[selectedType] || '<?php echo esc_url(home_url('/shop/')); ?>';

        if (selectedSeason === 'winter') target = categoryUrls.winter;
        if (selectedSeason === 'all-season' && !selectedType) target = categoryUrls.passenger;
        if (selectedNeed === 'handling') target = categoryUrls.performance;
        if (selectedNeed === 'hauling') target = categoryUrls.truck;
        if (selectedNeed === 'towing') target = categoryUrls.trailer;

        window.location.href = target;
      });
    });
  </script>

  <!-- Trust strip -->
  <div class="home-strip" data-mobile-slider="home-strip">
    <div>✔ Secure Checkout</div>
    <div>✔ Fast Shipping</div>
    <div>✔ Order Tracking</div>
    <div>✔ Easy Returns</div>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 2 — Shop Tires By Category                                -->
  <!-- ================================================================ -->
  <div class="home-section">
    <div class="home-section__head">
      <div>
        <p class="home-eyebrow">Categories</p>
        <h2>Shop Tires By Category</h2>
      </div>
      <a class="home-btn home-btn--dark" href="/product-category/tires/">View All</a>
    </div>

    <div class="home-category-grid">
      <a href="/product-category/passenger/" class="home-category">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/cat-passenger.jpg" alt="Passenger Car Tires" loading="lazy" />
        <span>Passenger</span>
        <h3>Passenger Car Tires</h3>
        <p>Reliable tires for daily driving and everyday vehicles.</p>
      </a>

      <a href="/product-category/suv-crossover/" class="home-category">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/cat-suv.jpg" alt="SUV &amp; Crossover Tires" loading="lazy" />
        <span>SUV / Crossover</span>
        <h3>SUV &amp; Crossover Tires</h3>
        <p>Comfortable and dependable tires for family vehicles.</p>
      </a>

      <a href="/product-category/truck/" class="home-category">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/cat-truck.jpg" alt="Truck Tires" loading="lazy" />
        <span>Truck</span>
        <h3>Truck Tires</h3>
        <p>Durable options for pickups and work vehicles.</p>
      </a>

      <a href="/product-category/performance/" class="home-category">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/cat-performance.jpg" alt="Performance Tires" loading="lazy" />
        <span>Performance</span>
        <h3>Performance Tires</h3>
        <p>Designed for better handling and driving experience.</p>
      </a>

      <a href="/product-category/all-season/" class="home-category">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/cat-allseason.jpg" alt="All Season Tires" loading="lazy" />
        <span>All Season</span>
        <h3>All Season Tires</h3>
        <p>Convenient year-round tire solutions.</p>
      </a>

      <a href="/product-category/winter/" class="home-category">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/category-winter-tires.png" alt="Winter Tires" loading="lazy" />
        <span>Winter</span>
        <h3>Winter Tires</h3>
        <p>Extra traction for cold weather, snow, and icy roads.</p>
      </a>
    </div>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 3 — Featured Tire Products                                -->
  <!-- ================================================================ -->
  <?php
  $home_featured_products = [];

  if (function_exists('wc_get_products')) {
    $home_featured_products = wc_get_products([
      'status'   => 'publish',
      'limit'    => 4,
      'featured' => true,
      'orderby'  => 'date',
      'order'    => 'DESC',
    ]);

    if (empty($home_featured_products)) {
      $home_featured_products = wc_get_products([
        'status'  => 'publish',
        'limit'   => 4,
        'orderby' => 'date',
        'order'   => 'DESC',
      ]);
    }
  }
  ?>
  <div class="home-section home-section--surface">
    <div class="home-section__head">
      <div>
        <p class="home-eyebrow">Featured Tires</p>
        <h2>Popular Tires For Everyday Drivers</h2>
      </div>
      <a class="home-btn home-btn--dark" href="/shop/">View All Tires</a>
    </div>

    <div class="home-product-grid">
      <?php if (! empty($home_featured_products)) : ?>
        <?php foreach ($home_featured_products as $home_product) :
          $home_product_id = $home_product->get_id();
          $home_categories = wc_get_product_category_list($home_product_id, ', ');
          $home_badge = $home_product->is_on_sale() ? __('Sale', 'dawp') : __('Featured Tire', 'dawp');
          ?>
          <div class="home-product">
            <div class="home-product__image">
              <?php echo $home_product->get_image('woocommerce_single', ['loading' => 'lazy']); ?>
            </div>
            <span><?php echo esc_html($home_badge); ?></span>
            <h3><?php echo esc_html($home_product->get_name()); ?></h3>
            <p><?php echo wp_kses_post($home_categories ?: __('Tire product', 'dawp')); ?></p>
            <div class="home-product__foot">
              <strong><?php echo wp_kses_post($home_product->get_price_html()); ?></strong>
              <a href="<?php echo esc_url($home_product->get_permalink()); ?>"><?php esc_html_e('Shop Now', 'dawp'); ?></a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
      <!-- Product 1 -->
      <div class="home-product">
        <div class="home-product__image">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/product-michelin-defender-2.png" alt="Michelin Defender 2" loading="lazy" />
        </div>
        <span>Best Seller</span>
        <h3>Michelin Defender 2</h3>
        <p>215/55R17 · All Season</p>
        <div>
          <strong>$189.99</strong>
          <a href="/product/michelin-defender-2/">Shop Now</a>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="home-product">
        <div class="home-product__image">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/product-goodyear-assurance.png" alt="Goodyear Assurance" loading="lazy" />
        </div>
        <span>Popular Choice</span>
        <h3>Goodyear Assurance</h3>
        <p>225/60R18 · All Season</p>
        <div>
          <strong>$174.50</strong>
          <a href="/product/goodyear-assurance/">Shop Now</a>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="home-product">
        <div class="home-product__image">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/product-bridgestone-alenza.png" alt="Bridgestone Alenza" loading="lazy" />
        </div>
        <span>Free Shipping</span>
        <h3>Bridgestone Alenza</h3>
        <p>235/65R18 · Crossover/SUV</p>
        <div>
          <strong>$209.99</strong>
          <a href="/product/bridgestone-alenza/">Shop Now</a>
        </div>
      </div>

      <!-- Product 4 -->
      <div class="home-product">
        <div class="home-product__image">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/product-continental-truecontact.png" alt="Continental TrueContact" loading="lazy" />
        </div>
        <span>Best Seller</span>
        <h3>Continental TrueContact</h3>
        <p>205/55R16 · All Season</p>
        <div>
          <strong>$159.99</strong>
          <a href="/product/continental-truecontact/">Shop Now</a>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 4 — Best Deals / Seasonal Picks                           -->
  <!-- ================================================================ -->
  <div class="home-deal">
    <div>
      <p class="home-eyebrow">Best Deals</p>
      <h2>Quality Tires At Better Prices</h2>
      <p>Explore affordable tire options designed for everyday driving needs.</p>

      <div class="home-deal__chips">
        <span>All Season Deals</span>
        <span>SUV Tire Savings</span>
        <span>Truck Tire Offers</span>
      </div>

      <a class="home-btn home-btn--primary" href="/deals/">Shop Deals</a>
    </div>
    <img
      src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/deal-tires.jpg"
      alt="Tire stack"
      loading="lazy"
    />
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 5 — Why Choose Rubyinstar                                 -->
  <!-- ================================================================ -->
  <div class="home-section">
    <div class="home-section__center">
      <p class="home-eyebrow">Why Us</p>
      <h2>Why Drivers Choose Rubyinstar</h2>
    </div>

    <div class="home-trust-grid" data-mobile-slider="home-trust">
      <div class="home-trust">
        <div class="home-trust-icon">🛒</div>
        <h3>Easy Online Shopping</h3>
        <p>Find and order tires from the comfort of your home.</p>
      </div>

      <div class="home-trust">
        <div class="home-trust-icon">💰</div>
        <h3>Competitive Pricing</h3>
        <p>Affordable tire options for everyday drivers.</p>
      </div>

      <div class="home-trust">
        <div class="home-trust-icon">🚚</div>
        <h3>Reliable Delivery</h3>
        <p>Track your order from shipment to arrival.</p>
      </div>

      <div class="home-trust">
        <div class="home-trust-icon">🎧</div>
        <h3>Customer Support</h3>
        <p>Help when you need assistance choosing your tires.</p>
      </div>
    </div>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 6 — Customer Feedback (Social Proof)                      -->
  <!-- ================================================================ -->
  <div class="home-proof">
    <div>
      <p class="home-eyebrow">Testimonials</p>
      <h2>What Customers Say</h2>
    </div>

    <blockquote>
      “Easy shopping experience and clear product information.
      Found exactly what I needed without the headache.”
    </blockquote>

    <blockquote>
      “Great value and convenient delivery process.
      Will definitely order again.”
    </blockquote>

    <blockquote>
      “Found the right tires without the complicated process.
      Rubyinstar made it simple.”
    </blockquote>
  </div>

  <!-- ================================================================ -->
  <!-- SECTION 7 — Newsletter + Trust Footer                             -->
  <!-- ================================================================ -->
  <div class="home-newsletter">
    <div>
      <p class="home-eyebrow">Stay Updated</p>
      <h2>Get Tire Deals &amp; Updates</h2>
      <p>Receive new offers, tire tips, and product updates.</p>
    </div>

    <form action="#" method="post">
      <input type="email" placeholder="Enter your email" required />
      <button class="home-btn home-btn--primary" type="submit">Subscribe</button>
    </form>
  </div>

</section>
