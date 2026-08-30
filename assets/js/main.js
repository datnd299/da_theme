document.addEventListener('DOMContentLoaded', () => {
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
        prevBtn.type = 'button';
        prevBtn.innerHTML = '<span aria-hidden="true"></span>';
        prevBtn.setAttribute('aria-label', 'Scroll Left');
        
        const nextBtn = document.createElement('button');
        nextBtn.className = 'gallery-thumbs-btn next';
        nextBtn.type = 'button';
        nextBtn.innerHTML = '<span aria-hidden="true"></span>';
        nextBtn.setAttribute('aria-label', 'Scroll Right');
        
        wrapper.appendChild(prevBtn);
        wrapper.appendChild(nextBtn);
        
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (prevBtn.disabled) return;
            const scrollAmount = thumbsList.clientWidth * 0.75;
            thumbsList.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
        
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (nextBtn.disabled) return;
            const scrollAmount = thumbsList.clientWidth * 0.75;
            thumbsList.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
        
        const updateButtons = () => {
            if (thumbsList.scrollWidth <= thumbsList.clientWidth) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
                return;
            }
            const atStart = thumbsList.scrollLeft <= 5;
            const atEnd = Math.ceil(thumbsList.scrollLeft + thumbsList.clientWidth) >= thumbsList.scrollWidth - 5;

            prevBtn.disabled = atStart;
            nextBtn.disabled = atEnd;
            prevBtn.classList.toggle('is-disabled', atStart);
            nextBtn.classList.toggle('is-disabled', atEnd);
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

    // Side cart drawer — AJAX mini-cart. Markup: inc/side-cart.php, styles: main.css.
    function initCartDrawer() {
        const drawer = document.getElementById('dawp-cart-drawer');
        const toggle = document.getElementById('dawp-cart-toggle');
        const fab    = document.getElementById('dawp-cart-fab');
        if (!drawer || !window.dawpCart) return;

        const qtyTimers = {};
        let isAddingToCart = false;
        let lastFocus = null;

        const setLoading = (isLoading) => drawer.classList.toggle('is-loading', isLoading);

        const openDrawer = () => {
            lastFocus = document.activeElement;
            drawer.classList.add('is-open');
            drawer.setAttribute('aria-hidden', 'false');
            document.body.classList.add('dawp-cart-open');
            drawer.querySelector('.dawp-cart-drawer__close')?.focus();
        };

        const closeDrawer = () => {
            drawer.classList.remove('is-open');
            drawer.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('dawp-cart-open');
            if (lastFocus instanceof HTMLElement) lastFocus.focus();
        };

        const applyFragments = (fragments) => {
            if (!fragments) return;
            Object.keys(fragments).forEach((selector) => {
                document.querySelectorAll(selector).forEach((el) => {
                    el.outerHTML = fragments[selector];
                });
            });
        };

        const postCart = async (action, extra) => {
            const body = new FormData();
            body.append('action', action);
            body.append('nonce', window.dawpCart.nonce);
            Object.keys(extra || {}).forEach((key) => body.append(key, extra[key]));

            setLoading(true);
            try {
                const res  = await fetch(window.dawpCart.ajaxUrl, { method: 'POST', body, credentials: 'same-origin' });
                const json = await res.json();
                if (json.success) applyFragments(json.data);
                return json;
            } catch {
                return { success: false };
            } finally {
                setLoading(false);
            }
        };

        const queueQtyUpdate = (cartKey, qty) => {
            clearTimeout(qtyTimers[cartKey]);
            qtyTimers[cartKey] = setTimeout(() => {
                postCart('dawp_cart_update_qty', { cart_item_key: cartKey, quantity: qty });
            }, 400);
        };

        [toggle, fab].forEach((btn) => {
            btn?.addEventListener('click', (e) => {
                e.preventDefault();
                openDrawer();
            });
        });

        drawer.addEventListener('click', (e) => {
            if (e.target.closest('[data-cart-close]')) {
                closeDrawer();
                return;
            }

            const removeBtn = e.target.closest('[data-cart-remove]');
            if (removeBtn) {
                const item = removeBtn.closest('[data-cart-key]');
                if (item) postCart('dawp_cart_remove_item', { cart_item_key: item.dataset.cartKey });
                return;
            }

            const decrease = e.target.closest('[data-qty-decrease]');
            const increase = e.target.closest('[data-qty-increase]');
            if (decrease || increase) {
                const item  = (decrease || increase).closest('[data-cart-key]');
                const input = item?.querySelector('[data-qty-input]');
                if (!item || !input) return;
                const current = parseInt(input.value, 10) || 0;
                const next = decrease ? Math.max(0, current - 1) : current + 1;
                input.value = next;
                queueQtyUpdate(item.dataset.cartKey, next);
            }
        });

        drawer.addEventListener('change', (e) => {
            const input = e.target.closest('[data-qty-input]');
            if (!input) return;
            const item = input.closest('[data-cart-key]');
            if (!item) return;
            const next = Math.max(0, parseInt(input.value, 10) || 0);
            input.value = next;
            queueQtyUpdate(item.dataset.cartKey, next);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && drawer.classList.contains('is-open')) closeDrawer();
        });

        document.addEventListener('submit', async (e) => {
            const form = e.target;
            if (!(form instanceof HTMLFormElement) || !form.matches('form.cart')) return;
            if (!form.querySelector('[name="add-to-cart"]')) return;

            e.preventDefault();

            // CommerceKit's sticky add-to-cart bar clones form.cart into a second
            // form on the same page — guard against a double in-flight request.
            if (isAddingToCart) return;
            isAddingToCart = true;

            const submitBtn = form.querySelector('button[type="submit"], .single_add_to_cart_button');
            submitBtn?.setAttribute('disabled', 'disabled');

            const body = new FormData(form);
            const productId = body.get('add-to-cart') || (submitBtn?.name === 'add-to-cart' ? submitBtn.value : null);

            // WooCommerce's own form handler runs on wp_loaded during admin-ajax
            // and would add the item a second time if "add-to-cart" is present,
            // so send the id under a different key.
            body.delete('add-to-cart');
            if (productId) body.set('dawp_product_id', productId);
            body.set('action', 'dawp_cart_add');
            body.set('nonce', window.dawpCart.nonce);

            setLoading(true);
            try {
                const res  = await fetch(window.dawpCart.ajaxUrl, { method: 'POST', body, credentials: 'same-origin' });
                const json = await res.json();
                if (json.success) {
                    applyFragments(json.data);
                    openDrawer();
                } else if (json.data?.product_url) {
                    window.location.href = json.data.product_url;
                }
            } catch {
                // Don't fall back to a native submit: the AJAX request may have
                // already added the item server-side before failing client-side.
            } finally {
                isAddingToCart = false;
                setLoading(false);
                submitBtn?.removeAttribute('disabled');
            }
        });

        // WooCommerce's own ajax_add_to_cart buttons (fragments already carry
        // our drawer markup via woocommerce_add_to_cart_fragments).
        if (window.jQuery) {
            window.jQuery(document.body).on('added_to_cart', (e, fragments) => {
                applyFragments(fragments);
                openDrawer();
            });
        }
    }

    initCartDrawer();
});
