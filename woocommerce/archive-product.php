<?php
/**
 * The Template for displaying product archives.
 */
defined('ABSPATH') || exit;

get_header();
?>

<div class="shop-page">

    <!-- Shop Hero -->
    <section class="shop-hero">
        <div class="shop-hero__inner container">
            <div class="shop-hero__eyebrow">
                <span class="eyebrow-pill">
                    <?php 
                        if ( is_product_category() || is_product_tag() ) {
                            woocommerce_page_title();
                        } else {
                            echo 'New Drops';
                        }
                    ?>
                </span>
            </div>
            <h1 class="shop-hero__title">
                Style that hits<br/>
                <span class="shop-hero__title--italic">different.</span>
            </h1>
            <p class="shop-hero__desc">
                Outfits built for the streets, the feeds, and everywhere in between.
            </p>
        </div>
        <!-- Decorative line -->
        <div class="shop-hero__divider"></div>
    </section>

    <!-- Shop Body -->
    <div class="shop-layout container">

        <!-- Sidebar Overlay (Mobile) -->
        <div class="shop-sidebar-overlay" id="shop-sidebar-overlay"></div>

        <!-- Sidebar -->
        <aside class="shop-sidebar" id="shop-sidebar">
            <div class="shop-sidebar__sticky">
                <?php get_sidebar('shop'); ?>
            </div>
        </aside>

        <!-- Main -->
        <div class="shop-main">

            <!-- Toolbar -->
            <div class="shop-toolbar">
                <span class="shop-toolbar__count">
                    <?php
                    global $wp_query;
                    $total = $wp_query->found_posts;
                    echo $total . ' ' . ($total === 1 ? 'item' : 'items');
                    ?>
                </span>

                <button class="shop-filter-toggle" id="filterToggle" aria-expanded="false" aria-controls="shop-sidebar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <line x1="4" y1="6" x2="20" y2="6"/>
                        <line x1="8" y1="12" x2="20" y2="12"/>
                        <line x1="12" y1="18" x2="20" y2="18"/>
                    </svg>
                    <span>Filter</span>
                </button>
            </div>

            <!-- Products -->
            <?php if (woocommerce_product_loop()) : ?>

                <?php woocommerce_product_loop_start(); ?>

                <?php if (wc_get_loop_prop('total')) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php wc_get_template_part('content', 'product'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php woocommerce_product_loop_end(); ?>

                <!-- Pagination -->
                <div class="shop-pagination">
                    <?php do_action('woocommerce_after_shop_loop'); ?>
                </div>

            <?php else : ?>
                <div class="shop-empty">
                    <p>No products found in this collection.</p>
                </div>
            <?php endif; ?>

        </div><!-- .shop-main -->
    </div><!-- .shop-layout -->

    <!-- Editorial closing statement -->
    <section class="shop-closing">
        <div class="shop-closing__inner container">
            <h2 class="shop-closing__text">
                Wear it<br/>
                <span class="shop-closing__text--italic">your</span> way.
            </h2>
        </div>
    </section>

</div><!-- .shop-page -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Mobile filter toggle
    const toggle = document.getElementById('filterToggle');
    const sidebar = document.getElementById('shop-sidebar');
    const overlay = document.getElementById('shop-sidebar-overlay');
    const closeBtn = document.getElementById('filterClose');

    function toggleSidebar() {
        const isOpen = sidebar.classList.toggle('is-open');
        if (overlay) overlay.classList.toggle('is-open');
        if (toggle) toggle.setAttribute('aria-expanded', isOpen);
        document.body.style.overflow = isOpen ? 'hidden' : ''; // Prevent body scroll
    }

    if (toggle && sidebar) {
        toggle.addEventListener('click', toggleSidebar);
    }
    if (overlay) {
        overlay.addEventListener('click', toggleSidebar);
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', toggleSidebar);
    }

    // Scroll reveal for products
    const reveals = document.querySelectorAll('.shop-hero, .shop-toolbar, .woocommerce-products-header');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    reveals.forEach(el => {
        el.classList.add('shop-reveal');
        observer.observe(el);
    });

    // Staggered product card reveal
    const products = document.querySelectorAll('.products .product');
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    entry.target.style.filter = 'blur(0)';
                }, i * 60);
                cardObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08 });

    products.forEach(p => {
        p.style.opacity = '0';
        p.style.transform = 'translateY(2rem)';
        p.style.filter = 'blur(4px)';
        p.style.transition = 'opacity 0.8s cubic-bezier(0.32,0.72,0,1), transform 0.8s cubic-bezier(0.32,0.72,0,1), filter 0.8s cubic-bezier(0.32,0.72,0,1)';
        cardObserver.observe(p);
    });
});
</script>

<?php get_footer(); ?>
