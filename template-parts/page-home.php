<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Query: Best Sellers (8 products by popularity)
$best_sellers = function_exists( 'wc_get_products' ) ? wc_get_products( [
	'limit'   => 8,
	'orderby' => 'popularity',
	'order'   => 'DESC',
	'status'  => 'publish',
] ) : [];

$best_seller_ids = array_map( fn( $p ) => $p->get_id(), $best_sellers );

// Query: Explore More (8 newest products, exclude best sellers)
$explore_more = function_exists( 'wc_get_products' ) ? wc_get_products( [
	'limit'   => 8,
	'orderby' => 'date',
	'order'   => 'DESC',
	'status'  => 'publish',
	'exclude' => $best_seller_ids,
] ) : [];

function ese_render_stars( float $rating ): string {
	$stars = '';
	for ( $i = 1; $i <= 5; $i++ ) {
		if ( $rating >= $i ) {
			$stars .= '<svg width="12" height="12" viewBox="0 0 12 12" fill="#E8470A" xmlns="http://www.w3.org/2000/svg"><path d="M6 1l1.12 2.27L10 3.64l-2 1.95.47 2.75L6 7.02l-2.47 1.32.47-2.75-2-1.95 2.88-.37L6 1z"/></svg>';
		} elseif ( $rating >= $i - 0.5 ) {
			$stars .= '<svg width="12" height="12" viewBox="0 0 12 12" fill="#E8470A" xmlns="http://www.w3.org/2000/svg"><path d="M6 1l1.12 2.27L10 3.64l-2 1.95.47 2.75L6 7.02V1z"/><path d="M6 7.02l-2.47 1.32.47-2.75-2-1.95 2.88-.37L6 1v6.02z" fill="#E2E2E2"/></svg>';
		} else {
			$stars .= '<svg width="12" height="12" viewBox="0 0 12 12" fill="#E2E2E2" xmlns="http://www.w3.org/2000/svg"><path d="M6 1l1.12 2.27L10 3.64l-2 1.95.47 2.75L6 7.02l-2.47 1.32.47-2.75-2-1.95 2.88-.37L6 1z"/></svg>';
		}
	}
	return $stars;
}

function ese_product_card( $product, bool $eager = false ): void {
	if ( ! $product ) return;
	$img_url   = get_the_post_thumbnail_url( $product->get_id(), 'woocommerce_thumbnail' );
	$img_url   = $img_url ?: wc_placeholder_img_src( 'woocommerce_thumbnail' );
	$name      = $product->get_name();
	$permalink = $product->get_permalink();
	$rating    = (float) $product->get_average_rating();
	$reviews   = (int) $product->get_review_count();
	$price_html = $product->get_price_html();
	$on_sale   = $product->is_on_sale();
	$save_pct  = '';
	if ( $on_sale && $product->get_regular_price() > 0 ) {
		$save_pct = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
	}
	$loading = $eager ? 'eager' : 'lazy';
	?>
	<div class="ese-product-card group bg-white rounded-[6px] overflow-hidden flex flex-col" style="box-shadow:var(--shadow-card)">
		<a href="<?php echo esc_url( $permalink ); ?>" class="relative block aspect-square overflow-hidden bg-[--color-bg-subtle]">
			<img
				src="<?php echo esc_url( $img_url ); ?>"
				alt="<?php echo esc_attr( $name ); ?>"
				loading="<?php echo $loading; ?>"
				class="w-full h-full object-cover transition-transform duration-200 group-hover:scale-[1.03]"
			/>
			<?php if ( $on_sale && $save_pct ) : ?>
			<span class="absolute top-2 left-2 text-white text-[11px] font-semibold uppercase tracking-[0.04em] px-2 py-0.5 rounded-[6px]" style="background:var(--color-accent)">
				SAVE <?php echo (int) $save_pct; ?>%
			</span>
			<?php endif; ?>
		</a>
		<div class="flex flex-col flex-1 p-3 md:p-4 gap-1.5">
			<a href="<?php echo esc_url( $permalink ); ?>" class="text-[15px] font-medium leading-snug line-clamp-2" style="color:var(--color-text-primary)"><?php echo esc_html( $name ); ?></a>
			<?php if ( $reviews > 0 ) : ?>
			<div class="flex items-center gap-1">
				<div class="flex items-center gap-0.5"><?php echo ese_render_stars( $rating ); ?></div>
				<span class="text-[12px]" style="color:var(--color-text-muted)">(<?php echo (int) $reviews; ?>)</span>
			</div>
			<?php endif; ?>
			<div class="text-[18px] font-bold mt-auto" style="color:var(--color-text-primary)">
				<?php echo $price_html; ?>
			</div>
			<?php
			$add_to_cart_url = $product->get_type() === 'simple'
				? add_query_arg( [ 'add-to-cart' => $product->get_id() ], wc_get_cart_url() )
				: $permalink;
			$btn_label = $product->get_type() === 'simple' ? __( 'Add to Cart', 'dawp' ) : __( 'View Options', 'dawp' );
			?>
			<a href="<?php echo esc_url( $add_to_cart_url ); ?>" class="block text-center text-white text-[15px] font-semibold rounded-[6px] px-4 py-3 mt-1 min-h-[44px] flex items-center justify-center transition-colors" style="background:var(--color-accent)" onmouseover="this.style.background='var(--color-accent-hover)'" onmouseout="this.style.background='var(--color-accent)'">
				<?php echo esc_html( $btn_label ); ?>
			</a>
		</div>
	</div>
	<?php
}
?>

<!-- ===== HERO ===== -->
<section class="relative w-full overflow-hidden" style="background:#1B3A5C">
	<div class="relative w-full" style="aspect-ratio:16/9;max-height:560px">
		<img
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/banner2.jpeg' ); ?>"
			alt="Shop home, garden, pet and auto products — all with free shipping"
			fetchpriority="high"
			loading="eager"
			class="w-full h-full object-cover"
		/>
		<div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.65) 0%, transparent 60%)"></div>
		<div class="absolute bottom-0 left-0 p-6 md:p-12 max-w-2xl">
			<span class="inline-block text-white text-[11px] font-semibold uppercase tracking-[0.04em] px-3 py-1 rounded-[6px] mb-3" style="background:rgba(0,0,0,0.45)">
				FREE SHIPPING ON EVERY ORDER
			</span>
			<h1 class="text-white font-bold mb-3 leading-tight" style="font-size:clamp(1.75rem,5vw,3.25rem)">
				Everything Your Home Needs — Shipped Free
			</h1>
			<p class="text-white/85 text-[15px] md:text-[17px] mb-6">
				Shop Home &amp; Garden, Pet Care, and Auto Parts. Delivered to your door.
			</p>
			<div class="flex flex-wrap gap-3">
				<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="inline-flex items-center justify-center text-white font-semibold text-[15px] px-6 py-3 rounded-[6px] min-h-[44px] transition-colors" style="background:var(--color-accent)" onmouseover="this.style.background='var(--color-accent-hover)'" onmouseout="this.style.background='var(--color-accent)'">
					Shop Now
				</a>
				<a href="#categories" class="inline-flex items-center justify-center text-white font-medium text-[15px] px-4 py-3 min-h-[44px] underline underline-offset-2">
					Browse Categories
				</a>
			</div>
		</div>
	</div>
</section>

<!-- ===== CATEGORY SHORTCUTS ===== -->
<section id="categories" class="py-12 md:py-16" style="background:var(--color-bg)">
	<div class="max-w-[1280px] mx-auto px-4 md:px-6">
		<h2 class="text-center font-semibold mb-8" style="font-size:clamp(1.375rem,3vw,1.875rem);color:var(--color-text-primary)">
			Shop by Category
		</h2>

		<!-- Mobile: horizontal scroll | Desktop: 5 col grid -->
		<div class="flex md:grid md:grid-cols-5 gap-3 md:gap-4 overflow-x-auto pb-2 md:pb-0 md:overflow-visible">
			<?php
			$categories = [
				[
					'label' => 'Home &amp; Living',
					'slug'  => 'home-living',
					'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3 9.5L12 3l9 6.5V21a1 1 0 01-1 1H4a1 1 0 01-1-1V9.5z"/><path d="M9 22V12h6v10"/></svg>',
				],
				[
					'label' => 'Lawn &amp; Garden',
					'slug'  => 'lawn-garden',
					'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 22V12"/><path d="M12 12C12 7 7 4 3 5c0 4 3 8 9 7z"/><path d="M12 12c0-5 5-8 9-7 0 4-3 8-9 7z"/></svg>',
				],
				[
					'label' => 'Pet Care',
					'slug'  => 'pet-care',
					'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><ellipse cx="12" cy="14" rx="5" ry="4"/><circle cx="7" cy="8" r="1.5"/><circle cx="17" cy="8" r="1.5"/><circle cx="4" cy="12" r="1.5"/><circle cx="20" cy="12" r="1.5"/></svg>',
				],
				[
					'label' => 'Car Parts',
					'slug'  => 'car-parts',
					'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M5 17H3v-5l2-6h14l2 6v5h-2"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/><path d="M5 12h14"/></svg>',
				],
				[
					'label' => 'Automotive Tools',
					'slug'  => 'automotive-tools',
					'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3-3a6 6 0 01-7 7l-5.1 5.1a2.12 2.12 0 01-3-3L11 11a6 6 0 017-7l-3 3 .7-.7z"/></svg>',
				],
			];

			foreach ( $categories as $cat ) :
				$term      = get_term_by( 'slug', $cat['slug'], 'product_cat' );
				$term_link = $term ? get_term_link( $term ) : get_permalink( wc_get_page_id( 'shop' ) );
			?>
			<a href="<?php echo esc_url( $term_link ); ?>" class="ese-cat-tile flex-shrink-0 flex flex-col items-center justify-center gap-2 rounded-lg p-4 text-center transition-all duration-200 hover:-translate-y-0.5" style="background:var(--color-bg-subtle);min-width:100px;color:var(--color-navy)">
				<?php echo $cat['icon']; ?>
				<span class="text-[14px] font-medium leading-tight" style="color:var(--color-text-primary)"><?php echo $cat['label']; ?></span>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ===== BEST SELLERS ===== -->
<?php if ( ! empty( $best_sellers ) ) : ?>
<section class="py-12 md:py-16" style="background:var(--color-bg-subtle)">
	<div class="max-w-[1280px] mx-auto px-4 md:px-6">
		<div class="flex items-center justify-between mb-6">
			<h2 class="font-semibold" style="font-size:clamp(1.375rem,3vw,1.875rem);color:var(--color-text-primary)">Best Sellers</h2>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="text-[14px] font-medium hover:underline" style="color:var(--color-accent)">View All →</a>
		</div>
		<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
			<?php foreach ( $best_sellers as $i => $product ) : ?>
				<?php ese_product_card( $product, $i < 8 ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===== PROMO BANNER ===== -->
<section class="py-12 md:py-16" style="background:var(--color-navy)">
	<div class="max-w-[1280px] mx-auto px-4 md:px-6">
		<div class="flex flex-col md:flex-row items-center gap-8">
			<!-- Text -->
			<div class="flex-1 text-center md:text-left">
				<span class="inline-block text-white text-[11px] font-semibold uppercase tracking-[0.04em] px-3 py-1 rounded-[6px] mb-4" style="background:var(--color-accent)">
					LIMITED TIME
				</span>
				<h2 class="text-white font-bold mb-3 leading-tight" style="font-size:clamp(1.5rem,4vw,2.25rem)">
					Free Shipping on Every Order — No Minimum
				</h2>
				<p class="text-white/75 text-[15px] mb-6">
					Shop home, garden, pet, and auto products — all with free US delivery.
				</p>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="inline-flex items-center justify-center text-white font-semibold text-[15px] px-6 py-3 rounded-[6px] min-h-[44px] transition-colors" style="background:var(--color-accent)" onmouseover="this.style.background='var(--color-accent-hover)'" onmouseout="this.style.background='var(--color-accent)'">
					Shop All Products
				</a>
			</div>
			<!-- Image -->
			<div class="flex-1 w-full max-w-sm md:max-w-none rounded-lg overflow-hidden" style="max-height:320px">
				<img
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/banner1.jpeg' ); ?>"
					alt="Shop home, garden, pet and auto products with free shipping"
					loading="lazy"
					class="w-full h-full object-cover rounded-lg"
					style="max-height:320px"
				/>
			</div>
		</div>
	</div>
</section>

<!-- ===== EXPLORE MORE ===== -->
<?php if ( ! empty( $explore_more ) ) : ?>
<section class="py-12 md:py-16" style="background:var(--color-bg)">
	<div class="max-w-[1280px] mx-auto px-4 md:px-6">
		<div class="flex items-center justify-between mb-6">
			<h2 class="font-semibold" style="font-size:clamp(1.375rem,3vw,1.875rem);color:var(--color-text-primary)">Explore More Products</h2>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="text-[14px] font-medium hover:underline" style="color:var(--color-accent)">See All →</a>
		</div>
		<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
			<?php foreach ( $explore_more as $product ) : ?>
				<?php ese_product_card( $product, false ); ?>
			<?php endforeach; ?>
		</div>
		<div class="text-center mt-8">
			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="inline-flex items-center justify-center text-[15px] font-medium px-8 py-3 rounded-[6px] min-h-[44px] transition-colors border-2" style="color:var(--color-navy);border-color:var(--color-navy)" onmouseover="this.style.background='var(--color-navy)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='var(--color-navy)'">
				Load More
			</a>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===== WHY SHOP WITH US ===== -->
<section class="py-12 md:py-16" style="background:var(--color-bg-subtle)">
	<div class="max-w-[1280px] mx-auto px-4 md:px-6">
		<h2 class="text-center font-semibold mb-10" style="font-size:clamp(1.375rem,3vw,1.875rem);color:var(--color-text-primary)">
			Why Shop With Us
		</h2>
		<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
			<?php
			$trust_cards = [
				[
					'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="1.5"/><circle cx="18.5" cy="18.5" r="1.5"/></svg>',
					'heading' => 'Free Shipping on All Orders',
					'body' => 'Every order ships free — no minimum purchase required.',
				],
				[
					'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/></svg>',
					'heading' => '30-Day Return Policy',
					'body' => 'Not happy? Return any item within 30 days, hassle-free.',
				],
				[
					'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 11.5a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .82h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 8.77a16 16 0 006.32 6.32l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>',
					'heading' => 'US-Based Support',
					'body' => 'Real humans, Mon–Fri 9AM–6PM CST. Call us at <a href="tel:4072551197" class="underline">407-255-1197</a>.',
				],
			];
			foreach ( $trust_cards as $card ) : ?>
			<div class="rounded-lg p-6 flex flex-col gap-3" style="background:var(--color-bg)">
				<div style="color:var(--color-accent)"><?php echo $card['icon']; ?></div>
				<h3 class="text-[16px] font-semibold" style="color:var(--color-text-primary)"><?php echo esc_html( $card['heading'] ); ?></h3>
				<p class="text-[15px] leading-relaxed" style="color:var(--color-text-secondary)"><?php echo $card['body']; ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ===== NEWSLETTER ===== -->
<section class="py-12 md:py-16" style="background:var(--color-bg)">
	<div class="max-w-[1280px] mx-auto px-4 md:px-6">
		<div class="max-w-[480px] mx-auto text-center">
			<h2 class="font-semibold mb-2" style="font-size:clamp(1.375rem,3vw,1.875rem);color:var(--color-text-primary)">
				Get Deals in Your Inbox
			</h2>
			<p class="text-[15px] mb-6" style="color:var(--color-text-secondary)">
				Subscribe for exclusive offers, new arrivals, and tips.
			</p>
			<?php if ( function_exists( 'mc4wp_show_form' ) ) : ?>
				<?php mc4wp_show_form(); ?>
			<?php else : ?>
			<form class="flex flex-col sm:flex-row gap-2" onsubmit="return false;">
				<input
					type="email"
					placeholder="Your email address"
					required
					class="flex-1 w-full px-4 py-3 rounded-[6px] text-[15px] border min-h-[44px]"
					style="border-color:var(--color-border);color:var(--color-text-primary);outline-color:var(--color-navy)"
				/>
				<button type="submit" class="text-white font-semibold text-[15px] px-6 py-3 rounded-[6px] min-h-[44px] whitespace-nowrap transition-colors" style="background:var(--color-accent)" onmouseover="this.style.background='var(--color-accent-hover)'" onmouseout="this.style.background='var(--color-accent)'">
					Subscribe
				</button>
			</form>
			<?php endif; ?>
			<p class="text-[12px] mt-3" style="color:var(--color-text-muted)">No spam. Unsubscribe anytime.</p>
		</div>
	</div>
</section>
