    </div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">

			<div class="footer-grid">

				<div class="footer-col footer-col--brand">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<span class="site-logo footer-logo-text"><?php bloginfo( 'name' ); ?></span>
					<?php endif; ?>

					<h4><?php esc_html_e( 'Contact Us', 'dawp' ); ?></h4>
					<address class="footer-address">
						2800 Post Oak Boulevard, Suite 4100<br>Houston, TX 77056<br>United States
					</address>
					<p>
						<?php esc_html_e( 'Email:', 'dawp' ); ?> <a href="mailto:<?php echo antispambot( 'info@example.com' ); ?>"><?php echo antispambot( 'info@example.com' ); ?></a>
					</p>

					<div class="footer-social">
						<a href="https://www.facebook.com/" class="footer-social__link" aria-label="Facebook" rel="noopener" target="_blank">
							<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12z"></path></svg>
						</a>
					</div>
				</div>

				<div class="footer-col">
					<h4><?php esc_html_e( 'Customer Service', 'dawp' ); ?></h4>
					<ul class="footer-menu">
						<li><a href="<?php echo esc_url( home_url( '/shipping-returns/' ) ); ?>"><?php esc_html_e( 'Shipping &amp; Returns', 'dawp' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>"><?php esc_html_e( 'Terms &amp; Conditions', 'dawp' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'dawp' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/frequently-asked-questions/' ) ); ?>"><?php esc_html_e( 'FAQ', 'dawp' ); ?></a></li>
					</ul>
				</div>

				<div class="footer-col">
					<h4><?php esc_html_e( 'Support', 'dawp' ); ?></h4>
					<ul class="footer-menu">
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'dawp' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/my-account/' ) ); ?>"><?php esc_html_e( 'My Account', 'dawp' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/track-order/' ) ); ?>"><?php esc_html_e( 'Track My Order', 'dawp' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/wishlist/' ) ); ?>"><?php esc_html_e( 'Wishlist', 'dawp' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'dawp' ); ?></a></li>
					</ul>
				</div>

				<div class="footer-col">
					<h4><?php esc_html_e( 'Sign Up for News &amp; Promotions', 'dawp' ); ?></h4>
					<p class="footer-newsletter__desc">
						<?php esc_html_e( 'By signing up, you confirm you are over 16 years of age and want to receive our emails.', 'dawp' ); ?>
					</p>

					<form class="footer-newsletter" action="#" method="post">
						<label for="newsletter-email" class="screen-reader-text"><?php esc_html_e( 'Email Address', 'dawp' ); ?></label>
						<input type="email" id="newsletter-email" name="email" placeholder="<?php esc_attr_e( 'Your email address', 'dawp' ); ?>" required>
						<button type="submit" aria-label="<?php esc_attr_e( 'Subscribe', 'dawp' ); ?>">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
								<line x1="5" y1="12" x2="19" y2="12" stroke-linecap="round"></line>
								<polyline points="13 6 19 12 13 18" stroke-linecap="round" stroke-linejoin="round"></polyline>
							</svg>
						</button>
					</form>

					<div class="payment-methods">
						<span class="payment-icon" aria-label="Visa" title="Visa">
							<svg viewBox="0 0 80 26" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Visa accepted"><rect width="80" height="26" fill="#fff" rx="3"></rect><text x="40" y="18" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-weight="800" font-style="italic" font-size="12" letter-spacing="1.2" fill="#1A1F71">VISA</text></svg>
						</span>
						<span class="payment-icon" aria-label="Mastercard" title="Mastercard">
							<svg viewBox="0 0 80 26" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Mastercard accepted"><rect width="80" height="26" fill="#fff" rx="3"></rect><circle cx="33" cy="13" r="7" fill="#EB001B"></circle><circle cx="47" cy="13" r="7" fill="#F79E1B"></circle><path fill="#FF5F00" d="M40 7.8a7 7 0 000 10.4 7 7 0 000-10.4z"></path></svg>
						</span>
						<span class="payment-icon" aria-label="American Express" title="American Express">
							<svg viewBox="0 0 80 26" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="American Express accepted"><rect width="80" height="26" fill="#1F72CD" rx="3"></rect><text x="40" y="12.5" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-weight="800" font-size="7" letter-spacing="0.4" fill="#fff">AMERICAN</text><text x="40" y="20.5" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-weight="800" font-size="7" letter-spacing="0.4" fill="#fff">EXPRESS</text></svg>
						</span>
						<span class="payment-icon" aria-label="PayPal" title="PayPal">
							<svg viewBox="0 0 80 26" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="PayPal accepted"><rect width="80" height="26" fill="#fff" rx="3"></rect><text x="40" y="18" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-weight="800" font-style="italic" font-size="12" letter-spacing="0" fill="#003087">Pay<tspan fill="#009CDE">Pal</tspan></text></svg>
						</span>
					</div>
				</div>

			</div>

			<div class="footer-bottom">
				<p class="footer-copyright">
					&copy; <?php bloginfo( 'name' ); ?> <?php echo esc_html( date( 'Y' ) ); ?>.
				</p>
				<ul class="footer-bottom__links">
					<li><a href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>"><?php esc_html_e( 'Terms', 'dawp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'dawp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Cookies', 'dawp' ); ?></a></li>
				</ul>
			</div>

		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
