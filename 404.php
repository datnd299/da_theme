<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();
?>

<main id="primary" class="site-main error-404">
  <section class="not-found">
    <div class="not-found__inner">
      <div class="not-found__content">
        <p class="not-found__eyebrow">Page not found</p>
        <p class="not-found__code" aria-hidden="true">404</p>
        <h1 class="not-found__title">This note has drifted out of tune.</h1>
        <p class="not-found__text">
          The page you are looking for may have moved, but the workshop is still open. Return home or browse our lyre kit collections.
        </p>

        <div class="not-found__actions" aria-label="<?php esc_attr_e( '404 page actions', 'dawp' ); ?>">
          <a class="not-found__button not-found__button--primary" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
            Browse Kits
          </a>
          <a class="not-found__button not-found__button--secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            Back To Home
          </a>
        </div>
      </div>

      <aside class="not-found__panel" aria-label="<?php esc_attr_e( 'Helpful links', 'dawp' ); ?>">
        <div class="not-found__image">
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/nordic-series.jpg' ); ?>"
            alt="<?php esc_attr_e( 'Handcrafted lyre kit detail', 'dawp' ); ?>"
          />
        </div>

        <div class="not-found__links">
          <p class="not-found__links-title">Continue exploring</p>
          <?php
          $quick_links = [
            [ 'title' => 'Walnut Series', 'url' => home_url( '/shop?series=walnut' ) ],
            [ 'title' => 'Nordic Series', 'url' => home_url( '/shop?series=nordic' ) ],
            [ 'title' => 'Celtic Series', 'url' => home_url( '/shop?series=celtic' ) ],
            [ 'title' => 'Track Your Order', 'url' => home_url( '/track-order' ) ],
            [ 'title' => 'Contact Us', 'url' => home_url( '/contact-us' ) ],
          ];
          foreach ( $quick_links as $link ) :
            ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
          <?php endforeach; ?>
        </div>
      </aside>
    </div>
  </section>
</main>

<?php
get_footer();
