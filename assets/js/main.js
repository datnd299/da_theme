document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('site-header');
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.main-navigation');

    if (header) {
        const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 10);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
            nav.classList.toggle('is-open');
        });

        document.addEventListener('click', (e) => {
            if (!header.contains(e.target) && !toggle.contains(e.target)) {
                toggle.setAttribute('aria-expanded', 'false');
                nav.classList.remove('is-open');
            }
        });
    }

    const initGalleryThumbsScroll = () => {
        const thumbsList = document.querySelector('.flex-control-thumbs');
        if (!thumbsList || thumbsList.classList.contains('has-scroll-arrows')) return !!thumbsList;

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
            thumbsList.scrollBy({ left: -(thumbsList.clientWidth * 0.75), behavior: 'smooth' });
        });

        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            thumbsList.scrollBy({ left: thumbsList.clientWidth * 0.75, behavior: 'smooth' });
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
        setTimeout(updateButtons, 500);

        return true;
    };

    if (!initGalleryThumbsScroll()) {
        let checkCount = 0;
        const interval = setInterval(() => {
            if (initGalleryThumbsScroll() || checkCount++ > 15) clearInterval(interval);
        }, 300);
    }

    function initNewsletterForm(formId, msgId, successColor, errorColor) {
        const form = document.getElementById(formId);
        const msg = document.getElementById(msgId);
        if (!form || !msg || !window.dawpAjax) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const emailInput = form.querySelector('input[type="email"]');
            const submitBtn = form.querySelector('button[type="submit"]');
            const origText = submitBtn.textContent;

            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
            msg.style.display = 'none';

            const body = new FormData(form);
            body.set('action', 'dawp_newsletter');
            body.set('nonce', window.dawpAjax.nonce);
            body.set('email', emailInput.value.trim());

            try {
                const res = await fetch(window.dawpAjax.url, { method: 'POST', body });
                const data = await res.json();
                msg.textContent = data.data?.message ?? (data.success ? 'Thank you!' : 'Something went wrong.');
                msg.style.color = data.success ? successColor : errorColor;
                msg.style.display = 'block';
                if (data.success) form.reset();
            } catch {
                msg.textContent = 'Something went wrong. Please try again.';
                msg.style.color = errorColor;
                msg.style.display = 'block';
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = origText;
            }
        });
    }

    function initContactForm() {
        const form = document.getElementById('contact-form');
        const msg = document.getElementById('contact-msg');
        if (!form || !msg || !window.dawpAjax) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            const origText = submitBtn.textContent;

            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
            form.setAttribute('aria-busy', 'true');
            msg.style.display = 'none';

            const body = new FormData(form);
            body.set('action', 'dawp_contact');
            body.set('nonce', window.dawpAjax.contactNonce);

            try {
                const res = await fetch(window.dawpAjax.url, { method: 'POST', body });
                const data = await res.json();
                msg.textContent = data.data?.message ?? (data.success ? 'Message sent!' : 'Something went wrong.');
                msg.style.color = data.success ? '#2e7d5e' : '#c0392b';
                msg.style.display = 'block';
                if (data.success) form.reset();
            } catch {
                msg.textContent = 'Something went wrong. Please try again.';
                msg.style.color = '#c0392b';
                msg.style.display = 'block';
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = origText;
                form.removeAttribute('aria-busy');
            }
        });
    }

    // Side cart drawer
    function initCartDrawer() {
        const drawer = document.getElementById('dawp-cart-drawer');
        const toggle = document.getElementById('dawp-cart-toggle');
        const fab = document.getElementById('dawp-cart-fab');
        if (!drawer || !window.dawpCart) return;

        const qtyTimers = {};
        let isAddingToCart = false;

        const setLoading = (isLoading) => drawer.classList.toggle('is-loading', isLoading);

        const openDrawer = () => {
            drawer.classList.add('is-open');
            drawer.setAttribute('aria-hidden', 'false');
            document.body.classList.add('dawp-cart-open');
        };

        const closeDrawer = () => {
            drawer.classList.remove('is-open');
            drawer.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('dawp-cart-open');
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
                const res = await fetch(window.dawpCart.ajaxUrl, { method: 'POST', body, credentials: 'same-origin' });
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
                const item = (decrease || increase).closest('[data-cart-key]');
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

            // Some plugins (e.g. CommerceKit's sticky add-to-cart bar) clone
            // the whole form.cart element into a second, independent form on
            // the same page. This guard makes sure only one add-to-cart
            // request is ever in flight at a time, no matter which of those
            // forms — or a stray double submit — triggers it.
            if (isAddingToCart) return;
            isAddingToCart = true;

            const submitBtn = form.querySelector('button[type="submit"], .single_add_to_cart_button');
            submitBtn?.setAttribute('disabled', 'disabled');

            const body = new FormData(form);
            const productId = body.get('add-to-cart') || (submitBtn?.name === 'add-to-cart' ? submitBtn.value : null);

            // WooCommerce's own WC_Form_Handler::add_to_cart_action() runs on
            // the "wp_loaded" hook, which fires during admin-ajax.php's WP
            // bootstrap *before* our wp_ajax_dawp_cart_add handler runs. It
            // blindly adds to the cart whenever "add-to-cart" is present in
            // the request, so leaving that field in place caused every item
            // to be added twice. Send the product id under a different key.
            body.delete('add-to-cart');
            if (productId) {
                body.set('dawp_product_id', productId);
            }
            body.set('action', 'dawp_cart_add');
            body.set('nonce', window.dawpCart.nonce);

            setLoading(true);
            try {
                const res = await fetch(window.dawpCart.ajaxUrl, { method: 'POST', body, credentials: 'same-origin' });
                const json = await res.json();
                if (json.success) {
                    applyFragments(json.data);
                    openDrawer();
                } else if (json.data?.product_url) {
                    window.location.href = json.data.product_url;
                }
            } catch {
                // Don't fall back to a native form.submit() here: the AJAX
                // request may have already added the item server-side before
                // failing client-side (e.g. a malformed response), and
                // resubmitting the form would add it a second time. Leaving
                // the button re-enabled lets the user retry deliberately.
            } finally {
                isAddingToCart = false;
                setLoading(false);
                submitBtn?.removeAttribute('disabled');
            }
        });

        // Covers WooCommerce's own ajax_add_to_cart buttons (e.g. empty-cart
        // recommendations), whose fragments already include our drawer markup
        // via the woocommerce_add_to_cart_fragments filter.
        if (window.jQuery) {
            window.jQuery(document.body).on('added_to_cart', (e, fragments) => {
                applyFragments(fragments);
                openDrawer();
            });
        }
    }

    initNewsletterForm('newsletter-form', 'newsletter-msg', '#a8f0c8', '#f9a8a8');
    initNewsletterForm('footer-newsletter-form', 'footer-newsletter-msg', '#a8f0c8', '#f9a8a8');
    initContactForm();
    initCartDrawer();
});
document.querySelectorAll('img[data-lazy-src]').forEach(img => {
    const src = img.dataset.lazySrc;
    const srcset = img.dataset.lazySrcset;
    const sizes = img.dataset.lazySizes;

    if (src) img.src = src;
    if (srcset) img.srcset = srcset;
    if (sizes) img.sizes = sizes;

    img.loading = 'eager';
    img.removeAttribute('data-lazy-src');
    img.removeAttribute('data-lazy-srcset');
    img.removeAttribute('data-lazy-sizes');
});