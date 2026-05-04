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
                <span class="eyebrow-pill">The Collection</span>
            </div>
            <h1 class="shop-hero__title">
                Curated for<br/>
                <span class="shop-hero__title--italic">refined</span> living.
            </h1>
            <p class="shop-hero__desc">
                Furniture and objects that earn their place — crafted without compromise.
            </p>
        </div>
        <!-- Decorative line -->
        <div class="shop-hero__divider"></div>
    </section>

    <!-- Shop Body -->
    <div class="shop-layout container">

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
                    echo $total . ' ' . ($total === 1 ? 'piece' : 'pieces');
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
                Objects that<br/>
                <span class="shop-closing__text--italic">outlast</span> trends.
            </h2>
        </div>
    </section>

</div><!-- .shop-page -->

<style>
/* ── Shop Page Specific Styles ──────────────────────────────── */

/* Hero */
.shop-hero {
    padding: 8rem 0 0;
    position: relative;
}
.shop-hero__inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
}
.eyebrow-pill {
    display: inline-block;
    padding: 0.35rem 1.25rem;
    border-radius: 9999px;
    background: rgba(0,0,0,0.05);
    border: 1px solid rgba(0,0,0,0.07);
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-weight: 500;
    margin-bottom: 2rem;
}
.shop-hero__title {
    font-size: clamp(3.5rem, 8vw, 7rem);
    line-height: 0.95;
    letter-spacing: -0.04em;
    margin-bottom: 1.5rem;
}
.shop-hero__title--italic {
    font-style: italic;
    font-family: Georgia, serif;
    color: var(--color-muted);
    font-weight: 400;
}
.shop-hero__desc {
    font-size: 1.15rem;
    color: var(--color-muted);
    max-width: 44ch;
    margin-bottom: 4rem;
    line-height: 1.7;
}
.shop-hero__divider {
    width: 100%;
    height: 1px;
    background: var(--color-border);
    margin-top: 0;
}

/* Layout */
.shop-layout {
    display: grid;
    grid-template-columns: 260px 1fr;
    gap: 5rem;
    max-width: 1400px;
    margin: 0 auto;
    padding: 4rem 2rem 6rem;
    align-items: start;
}

/* Sidebar */
.shop-sidebar {
    position: relative;
}
.shop-sidebar__sticky {
    position: sticky;
    top: calc(80px + 2rem);
}
.shop-sidebar__widget {
    margin-bottom: 3rem;
    padding-bottom: 3rem;
    border-bottom: 1px solid var(--color-border);
}
.shop-sidebar__widget:last-child {
    border-bottom: none;
}
.shop-sidebar__title {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: var(--color-muted);
    margin-bottom: 1.5rem;
    font-family: var(--font-body);
    font-weight: 600;
}
.shop-sidebar__categories {
    list-style: none;
    padding: 0;
    margin: 0;
}
.shop-sidebar__categories li {
    margin-bottom: 0.75rem;
}
.shop-sidebar__categories a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1rem;
    padding: 0.35rem 0;
    border-bottom: 1px solid transparent;
    transition: color 0.4s var(--ease-fluid), border-color 0.4s var(--ease-fluid);
}
.shop-sidebar__categories a:hover {
    color: var(--color-muted);
    border-bottom-color: var(--color-border);
}
.shop-sidebar__count {
    font-size: 0.8rem;
    color: var(--color-muted);
}
.shop-sidebar__categories a.active {
    font-weight: 600;
    border-bottom-color: var(--color-text);
}

/* Toolbar */
.shop-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid var(--color-border);
}
.shop-toolbar__count {
    font-size: 0.85rem;
    color: var(--color-muted);
    text-transform: uppercase;
    letter-spacing: 0.1em;
}
.shop-filter-toggle {
    display: none; /* shown on mobile */
    align-items: center;
    gap: 0.5rem;
    background: none;
    border: 1px solid var(--color-border);
    border-radius: 9999px;
    padding: 0.5rem 1.25rem;
    font-size: 0.85rem;
    font-family: var(--font-body);
    cursor: pointer;
    transition: all 0.3s var(--ease-fluid);
}
.shop-filter-toggle:hover {
    background: var(--color-text);
    color: var(--color-bg);
    border-color: var(--color-text);
}

/* Products Grid — override WC default */
.shop-main .products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem 2rem;
    list-style: none;
    padding: 0;
    margin: 0;
}

/* Product Card */
.product-card__link {
    display: block;
    text-decoration: none;
    color: inherit;
}
.product-card__shell {
    background: rgba(0,0,0,0.02);
    border: 1px solid var(--color-border);
    border-radius: 1.75rem;
    padding: 0.4rem;
    margin-bottom: 1.25rem;
    transition: transform 0.7s var(--ease-fluid), box-shadow 0.7s var(--ease-fluid);
    will-change: transform;
}
.product-card__link:hover .product-card__shell {
    transform: translateY(-6px) scale(0.99);
    box-shadow: 0 24px 60px rgba(0,0,0,0.09);
}
.product-card__inner {
    background: var(--color-surface);
    border-radius: calc(1.75rem - 0.4rem);
    overflow: hidden;
    aspect-ratio: 4/5;
    position: relative;
    box-shadow: inset 0 1px 1px rgba(255,255,255,0.8);
}
.product-card__image {
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
}
.product-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 1.4s var(--ease-fluid);
    will-change: transform;
}
.product-card__link:hover .product-card__image img {
    transform: scale(1.06);
}
.product-card__badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: var(--color-text);
    color: var(--color-bg);
    font-size: 0.65rem;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    padding: 0.3rem 0.8rem;
    border-radius: 9999px;
    font-weight: 600;
    z-index: 2;
}
.product-card__add {
    position: absolute;
    bottom: 1.25rem;
    right: 1.25rem;
    width: 3rem;
    height: 3rem;
    background: var(--color-text);
    color: var(--color-bg);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transform: translateY(0.75rem);
    transition: opacity 0.4s var(--ease-fluid), transform 0.4s var(--ease-fluid), background 0.3s;
    z-index: 2;
    border: none;
    cursor: pointer;
}
.product-card__link:hover .product-card__add,
.product.hovered .product-card__add {
    opacity: 1;
    transform: translateY(0);
}
.product-card__add:hover {
    background: var(--color-muted);
}
.product-card__meta {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
}
.product-card__info {}
.product-card__title {
    font-size: 1.1rem;
    font-family: var(--font-heading);
    font-weight: 500;
    margin: 0 0 0.3rem;
    letter-spacing: -0.01em;
    line-height: 1.2;
}
.product-card__category {
    font-size: 0.8rem;
    color: var(--color-muted);
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.product-card__price {
    font-family: var(--font-heading);
    font-size: 1rem;
    color: var(--color-text);
    white-space: nowrap;
    padding-top: 0.1rem;
}
.product-card__price del {
    color: var(--color-muted);
    font-size: 0.85rem;
    margin-right: 0.4rem;
}
.product-card__price ins {
    text-decoration: none;
    color: #B5794A;
}

/* WooCommerce pagination override */
.shop-pagination .woocommerce-pagination {
    margin-top: 4rem;
    text-align: center;
}
.shop-pagination .woocommerce-pagination ul {
    display: inline-flex;
    gap: 0.5rem;
    list-style: none;
    padding: 0;
    margin: 0;
}
.shop-pagination .woocommerce-pagination ul li a,
.shop-pagination .woocommerce-pagination ul li span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    border: 1px solid var(--color-border);
    font-size: 0.9rem;
    transition: all 0.3s var(--ease-fluid);
}
.shop-pagination .woocommerce-pagination ul li a:hover {
    background: var(--color-text);
    color: var(--color-bg);
    border-color: var(--color-text);
}
.shop-pagination .woocommerce-pagination ul li span.current {
    background: var(--color-text);
    color: var(--color-bg);
    border-color: var(--color-text);
}

/* Closing section */
.shop-closing {
    padding: 8rem 0;
    text-align: center;
    border-top: 1px solid var(--color-border);
}
.shop-closing__text {
    font-size: clamp(3rem, 7vw, 6rem);
    line-height: 0.95;
    letter-spacing: -0.04em;
    color: rgba(26,21,18,0.08);
    transition: color 1.5s var(--ease-fluid);
    cursor: default;
    margin: 0;
}
.shop-closing:hover .shop-closing__text {
    color: var(--color-text);
}
.shop-closing__text--italic {
    font-style: italic;
    font-family: Georgia, serif;
    font-weight: 400;
}

/* Empty state */
.shop-empty {
    padding: 6rem 2rem;
    text-align: center;
    color: var(--color-muted);
    font-size: 1.15rem;
}

/* Scroll reveal */
.shop-reveal {
    opacity: 0;
    transform: translateY(2.5rem);
    filter: blur(6px);
    transition: opacity 0.9s var(--ease-fluid), transform 0.9s var(--ease-fluid), filter 0.9s var(--ease-fluid);
}
.shop-reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
    filter: blur(0);
}

/* ── Responsive ─────────────────────────────────────────────── */
@media (max-width: 1024px) {
    .shop-layout {
        grid-template-columns: 220px 1fr;
        gap: 3rem;
    }
    .shop-main .products {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .shop-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding: 2rem 1.25rem 4rem;
    }
    .shop-sidebar {
        display: none;
    }
    .shop-sidebar.is-open {
        display: block;
        animation: fadeDown 0.4s var(--ease-fluid) both;
    }
    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-1rem); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .shop-filter-toggle {
        display: flex;
    }
    .shop-main .products {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    .shop-hero__title {
        font-size: clamp(2.8rem, 10vw, 4rem);
    }
}

@media (max-width: 480px) {
    .shop-main .products {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Mobile filter toggle
    const toggle = document.getElementById('filterToggle');
    const sidebar = document.getElementById('shop-sidebar');
    if (toggle && sidebar) {
        toggle.addEventListener('click', function () {
            const isOpen = sidebar.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen);
        });
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
