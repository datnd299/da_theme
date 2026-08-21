document.addEventListener('DOMContentLoaded', () => {
    const header  = document.getElementById('site-header');
    const banner  = document.getElementById('site-banner');
    const bar     = document.getElementById('site-bar');
    const dismiss = document.getElementById('site-banner-dismiss');
    const toggle  = document.querySelector('.menu-toggle');
    const nav     = document.querySelector('.main-navigation');

    // N12 announcement banner: retracts on scroll-down past a small threshold,
    // returns on scroll-up, docks the bar with a frosted background once scrolled.
    if (header && banner && bar) {
        const root = document.documentElement;
        let lastY = window.scrollY;
        let dismissed = false;

        const setBannerHeight = (px) => root.style.setProperty('--header-banner-h', px + 'px');
        setBannerHeight(banner.offsetHeight);

        const onScroll = () => {
            const y = window.scrollY;
            bar.classList.toggle('bg-surface/90', y > 8);
            bar.classList.toggle('backdrop-blur', y > 8);
            bar.classList.toggle('border-border', y > 8);
            bar.classList.toggle('shadow-card', y > 8);

            if (!dismissed) {
                const scrollingDown = y > lastY;
                if (scrollingDown && y > 48) {
                    header.classList.add('is-compact');
                    setBannerHeight(0);
                } else if (!scrollingDown || y <= 48) {
                    header.classList.remove('is-compact');
                    setBannerHeight(banner.offsetHeight);
                }
            }
            lastY = y;
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        if (dismiss) {
            dismiss.addEventListener('click', () => {
                dismissed = true;
                header.classList.add('is-dismissed');
                setBannerHeight(0);
            });
        }
    }

    // Mobile menu toggle
    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
            nav.classList.toggle('hidden');
        });

        // Close the menu on outside click
        document.addEventListener('click', (e) => {
            if (!header.contains(e.target) && !toggle.contains(e.target)) {
                toggle.setAttribute('aria-expanded', 'false');
                nav.classList.add('hidden');
            }
        });
    }

    // Product Gallery Thumbnails Scroll
    const initGalleryThumbsScroll = () => {
        const thumbsList = document.querySelector('.flex-control-thumbs');
        if (!thumbsList || thumbsList.classList.contains('has-scroll-arrows')) return !!thumbsList;
        
        // Ensure there are enough thumbnails to warrant scrolling
        if (thumbsList.scrollWidth <= thumbsList.clientWidth) return true;

        thumbsList.classList.add('has-scroll-arrows');
        
        const wrapper = document.createElement('div');
        wrapper.className = 'gallery-thumbs-wrapper';
        
        thumbsList.parentNode.insertBefore(wrapper, thumbsList);
        wrapper.appendChild(thumbsList);
        
        const prevBtn = document.createElement('button');
        prevBtn.className = 'gallery-thumbs-btn prev';
        prevBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>';
        prevBtn.setAttribute('aria-label', 'Scroll Left');
        
        const nextBtn = document.createElement('button');
        nextBtn.className = 'gallery-thumbs-btn next';
        nextBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>';
        nextBtn.setAttribute('aria-label', 'Scroll Right');
        
        wrapper.appendChild(prevBtn);
        wrapper.appendChild(nextBtn);
        
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const scrollAmount = thumbsList.clientWidth * 0.75;
            thumbsList.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
        
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const scrollAmount = thumbsList.clientWidth * 0.75;
            thumbsList.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
        
        const updateButtons = () => {
            if (thumbsList.scrollWidth <= thumbsList.clientWidth) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
                return;
            }
            prevBtn.style.display = thumbsList.scrollLeft > 5 ? 'flex' : 'none';
            nextBtn.style.display = Math.ceil(thumbsList.scrollLeft + thumbsList.clientWidth) >= thumbsList.scrollWidth - 5 ? 'none' : 'flex';
        };
        
        thumbsList.addEventListener('scroll', updateButtons, { passive: true });
        window.addEventListener('resize', updateButtons, { passive: true });
        updateButtons();
        
        setTimeout(updateButtons, 500); // Check again after images might have loaded
        return true;
    };

    // Retry finding the gallery as WooCommerce initializes it asynchronously
    if (!initGalleryThumbsScroll()) {
        let checkCount = 0;
        const interval = setInterval(() => {
            if (initGalleryThumbsScroll() || checkCount++ > 15) clearInterval(interval);
        }, 300);
    }

    // Related Products: fetched over AJAX (see dawp_ajax_load_related_products
    // in inc/theme-setup.php) once the placeholder scrolls near the viewport,
    // instead of running the query + render on every single-product load.
    const relatedProducts = document.getElementById('dawp-related-products');
    if (relatedProducts) {
        const loadRelatedProducts = () => {
            const { productId, nonce, ajaxUrl } = relatedProducts.dataset;
            const body = new URLSearchParams({
                action: 'dawp_load_related_products',
                product_id: productId,
                nonce: nonce,
            });

            fetch(ajaxUrl, { method: 'POST', body })
                .then((res) => res.json())
                .then((data) => {
                    if (data && data.success && data.data && data.data.html) {
                        relatedProducts.outerHTML = data.data.html;
                    }
                })
                .catch(() => {});
        };

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        obs.disconnect();
                        loadRelatedProducts();
                    }
                });
            }, { rootMargin: '400px 0px' });

            observer.observe(relatedProducts);
        } else {
            loadRelatedProducts();
        }
    }

    // Side cart (drawer): replaces the "Side Cart WooCommerce" plugin.
    // Opens on .xoo-wsc-cart-trigger clicks (header cart icon) and on
    // successful add-to-cart; updates itself via WooCommerce's own
    // wc-ajax=add_to_cart / remove_from_cart endpoints plus the
    // dawp_side_cart_update_qty action for the quantity stepper (see
    // inc/side-cart.php). All three share the woocommerce_add_to_cart_fragments
    // filter, so the drawer body, subtotal and header badge stay in sync.
    const sideCart = document.getElementById('side-cart');

    if (sideCart) {
        const ajaxUrl    = sideCart.dataset.ajaxUrl;
        const wcAjaxBase = sideCart.dataset.wcAjaxBase;
        const nonce      = sideCart.dataset.nonce;
        let lastFocused  = null;

        const wcAjaxUrl = (action) => {
            const sep = wcAjaxBase.indexOf('?') === -1 ? '?' : '&';
            return `${wcAjaxBase}${sep}wc-ajax=${action}`;
        };

        const openSideCart = (trigger) => {
            lastFocused = trigger || document.activeElement;
            sideCart.classList.add('is-open');
            sideCart.setAttribute('aria-hidden', 'false');
            document.body.classList.add('side-cart-open');
            const closeBtn = sideCart.querySelector('.side-cart__close');
            if (closeBtn) closeBtn.focus();
        };

        const closeSideCart = () => {
            sideCart.classList.remove('is-open');
            sideCart.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('side-cart-open');
            if (lastFocused && typeof lastFocused.focus === 'function') {
                lastFocused.focus();
            }
        };

        const applySideCartFragments = (fragments) => {
            if (!fragments) return;
            Object.keys(fragments).forEach((selector) => {
                document.querySelectorAll(selector).forEach((el) => {
                    el.outerHTML = fragments[selector];
                });
            });
        };

        const updateSideCartQty = (key, qty) => {
            const body = new URLSearchParams({
                action: 'dawp_side_cart_update_qty',
                nonce,
                cart_item_key: key,
                quantity: qty,
            });
            fetch(ajaxUrl, { method: 'POST', body })
                .then((res) => res.json())
                .then((data) => {
                    if (data && data.success) {
                        applySideCartFragments(data.data.fragments);
                    }
                })
                .catch(() => {});
        };

        const removeSideCartItem = (key) => {
            const body = new URLSearchParams({ cart_item_key: key });
            fetch(wcAjaxUrl('remove_from_cart'), { method: 'POST', body })
                .then((res) => res.json())
                .then((data) => {
                    if (data && !data.error) {
                        applySideCartFragments(data.fragments);
                    }
                })
                .catch(() => {});
        };

        document.addEventListener('click', (e) => {
            const trigger = e.target.closest('.xoo-wsc-cart-trigger');
            if (trigger) {
                e.preventDefault();
                openSideCart(trigger);
                return;
            }

            if (e.target.closest('[data-side-cart-close]')) {
                e.preventDefault();
                closeSideCart();
                return;
            }

            const removeBtn = e.target.closest('.side-cart-item__remove');
            if (removeBtn) {
                const row = removeBtn.closest('[data-cart-item-key]');
                if (row) removeSideCartItem(row.dataset.cartItemKey);
                return;
            }

            const qtyBtn = e.target.closest('.side-cart-item__qty-btn');
            if (qtyBtn) {
                const row   = qtyBtn.closest('[data-cart-item-key]');
                const input = row && row.querySelector('.side-cart-item__qty-input');
                if (!input) return;

                const max = input.getAttribute('max');
                let value = (parseInt(input.value, 10) || 1) + (qtyBtn.dataset.qtyAction === 'increase' ? 1 : -1);
                value = Math.max(1, value);
                if (max) value = Math.min(value, parseInt(max, 10));

                input.value = value;
                updateSideCartQty(row.dataset.cartItemKey, value);
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sideCart.classList.contains('is-open')) {
                closeSideCart();
            }
        });

        document.addEventListener('change', (e) => {
            if (!e.target.classList || !e.target.classList.contains('side-cart-item__qty-input')) return;

            const row = e.target.closest('[data-cart-item-key]');
            if (!row) return;

            const max = e.target.getAttribute('max');
            let value = Math.max(1, parseInt(e.target.value, 10) || 1);
            if (max) value = Math.min(value, parseInt(max, 10));

            e.target.value = value;
            updateSideCartQty(row.dataset.cartItemKey, value);
        });

        // Intercept WooCommerce's add-to-cart form (single product page) so
        // it adds over AJAX and opens the drawer instead of reloading.
        document.addEventListener('submit', (e) => {
            const form = e.target;
            if (!(form instanceof HTMLFormElement) || !form.matches('form.cart')) return;

            const submitter   = e.submitter;
            const formData    = new FormData(form);
            const variationId = parseInt(formData.get('variation_id'), 10) || 0;
            const productId   = variationId
                || parseInt((submitter && submitter.name === 'add-to-cart' ? submitter.value : formData.get('add-to-cart')), 10)
                || 0;

            if (!productId) return;

            e.preventDefault();
            formData.set('product_id', productId);
            if (!formData.get('quantity')) formData.set('quantity', 1);

            if (submitter) submitter.disabled = true;

            fetch(wcAjaxUrl('add_to_cart'), { method: 'POST', body: formData })
                .then((res) => res.json())
                .then((data) => {
                    if (data && data.error) {
                        window.location.href = data.product_url || window.location.href;
                        return;
                    }
                    applySideCartFragments(data.fragments);
                    openSideCart(submitter);
                })
                .catch(() => {
                    form.submit();
                })
                .finally(() => {
                    if (submitter) submitter.disabled = false;
                });
        });
    }

});
