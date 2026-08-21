/* =============================================================
   main.js — CHRONEL
   Header panels, shop filter drawer, product gallery, async forms.
   Pure JS, no dependencies.
   ============================================================= */

document.addEventListener('DOMContentLoaded', () => {

    /* ---------------------------------------------------------
       Header — scroll state, mobile menu, search panel
       --------------------------------------------------------- */

    const header = document.getElementById('masthead');

    if (header) {
        const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        const panels = [
            [document.getElementById('c-mobile-toggle'), document.getElementById('c-mobile-menu')],
            [document.getElementById('c-search-toggle'), document.getElementById('c-search-panel')],
        ].filter(([button, panel]) => button && panel);

        const searchInput = document.getElementById('c-search-input');

        const setPanel = (button, panel, open) => {
            button.setAttribute('aria-expanded', String(open));
            panel.classList.toggle('hidden', !open);
        };

        const closeAll = (except = null) => {
            panels.forEach(([button, panel]) => {
                if (panel !== except) setPanel(button, panel, false);
            });
        };

        panels.forEach(([button, panel]) => {
            button.addEventListener('click', (event) => {
                event.stopPropagation();
                const open = button.getAttribute('aria-expanded') !== 'true';
                closeAll(open ? panel : null);
                setPanel(button, panel, open);

                if (open && panel.contains(searchInput)) {
                    window.setTimeout(() => searchInput.focus(), 30);
                }
            });
        });

        document.addEventListener('click', (event) => {
            if (!header.contains(event.target)) closeAll();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeAll();
        });

        window.addEventListener('resize', () => {
            if (window.matchMedia('(min-width: 1024px)').matches) closeAll();
        }, { passive: true });
    }

    /* ---------------------------------------------------------
       Shop — collections drawer on mobile
       --------------------------------------------------------- */

    const shopSidebar = document.getElementById('shop-sidebar');
    const shopOverlay = document.querySelector('.shop-sidebar-overlay');
    const shopOpenBtn = document.querySelector('[data-shop-filter-open]');

    if (shopSidebar && shopOpenBtn) {
        const setDrawer = (open) => {
            shopSidebar.classList.toggle('is-open', open);
            shopOpenBtn.setAttribute('aria-expanded', String(open));
            document.body.style.overflow = open ? 'hidden' : '';

            if (shopOverlay) {
                shopOverlay.classList.toggle('is-open', open);
                shopOverlay.hidden = !open;
            }
        };

        shopOpenBtn.addEventListener('click', () => setDrawer(true));

        document.querySelectorAll('[data-shop-filter-close]').forEach((el) => {
            el.addEventListener('click', () => setDrawer(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && shopSidebar.classList.contains('is-open')) setDrawer(false);
        });

        window.addEventListener('resize', () => {
            if (window.matchMedia('(min-width: 1024px)').matches && shopSidebar.classList.contains('is-open')) {
                setDrawer(false);
            }
        }, { passive: true });
    }

    /* ---------------------------------------------------------
       Product gallery — thumbnail arrows
       WooCommerce builds the gallery asynchronously, so both
       initialisers are retried until they find their markup.
       --------------------------------------------------------- */

    const initGalleryThumbs = () => {
        const thumbs = document.querySelector('.flex-control-thumbs');
        if (!thumbs) return false;
        if (thumbs.classList.contains('has-scroll-arrows')) return true;
        if (thumbs.scrollWidth <= thumbs.clientWidth) return true;

        thumbs.classList.add('has-scroll-arrows');

        const wrapper = document.createElement('div');
        wrapper.className = 'gallery-thumbs-wrapper';
        thumbs.parentNode.insertBefore(wrapper, thumbs);
        wrapper.appendChild(thumbs);

        const makeButton = (direction, label, path) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = `gallery-thumbs-btn ${direction}`;
            button.setAttribute('aria-label', label);
            button.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="${path}"/></svg>`;
            button.addEventListener('click', () => {
                thumbs.scrollBy({ left: (direction === 'prev' ? -1 : 1) * thumbs.clientWidth * 0.75, behavior: 'smooth' });
            });
            wrapper.appendChild(button);
            return button;
        };

        const prev = makeButton('prev', 'Previous thumbnails', 'M15 18l-6-6 6-6');
        const next = makeButton('next', 'Next thumbnails', 'M9 18l6-6-6-6');

        const update = () => {
            const canScroll = thumbs.scrollWidth > thumbs.clientWidth + 5;
            const atStart = thumbs.scrollLeft <= 5;
            const atEnd = Math.ceil(thumbs.scrollLeft + thumbs.clientWidth) >= thumbs.scrollWidth - 5;

            prev.hidden = !canScroll || atStart;
            next.hidden = !canScroll || atEnd;
        };

        thumbs.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update, { passive: true });
        update();
        window.setTimeout(update, 500);

        return true;
    };

    /* ---------------------------------------------------------
       Product gallery — swipe the main image on touch devices
       --------------------------------------------------------- */

    const initGallerySwipe = () => {
        const gallery = document.querySelector('.woocommerce-product-gallery');
        const viewport = gallery && gallery.querySelector('.flex-viewport');

        if (!gallery || !viewport) return false;
        if (gallery.classList.contains('has-swipe')) return true;

        gallery.classList.add('has-swipe');

        let startX = 0;
        let startY = 0;
        let tracking = false;

        const move = (direction) => {
            const flex = window.jQuery && window.jQuery(gallery).data('flexslider');

            if (flex && typeof flex.flexAnimate === 'function') {
                const count = flex.count || gallery.querySelectorAll('.woocommerce-product-gallery__image').length;
                if (count <= 1) return;

                const current = flex.currentSlide || 0;
                const target = direction === 'next'
                    ? Math.min(current + 1, count - 1)
                    : Math.max(current - 1, 0);

                if (target !== current) flex.flexAnimate(target);
                return;
            }

            const images = Array.from(gallery.querySelectorAll('.flex-control-thumbs img'));
            const active = images.findIndex((img) => img.classList.contains('flex-active'));
            const target = (active === -1 ? 0 : active) + (direction === 'next' ? 1 : -1);
            if (images[target]) images[target].click();
        };

        const end = (x, y) => {
            if (!tracking) return;
            tracking = false;

            const dx = x - startX;
            const dy = y - startY;

            if (Math.abs(dx) > 48 && Math.abs(dx) > Math.abs(dy) * 1.4) {
                move(dx < 0 ? 'next' : 'prev');
            }
        };

        if (window.PointerEvent) {
            viewport.addEventListener('pointerdown', (event) => {
                if (event.pointerType === 'mouse' && event.button !== 0) return;
                startX = event.clientX;
                startY = event.clientY;
                tracking = true;
            });
            viewport.addEventListener('pointerup', (event) => end(event.clientX, event.clientY));
            viewport.addEventListener('pointercancel', () => { tracking = false; });
        } else {
            viewport.addEventListener('touchstart', (event) => {
                const touch = event.changedTouches[0];
                if (!touch) return;
                startX = touch.clientX;
                startY = touch.clientY;
                tracking = true;
            }, { passive: true });
            viewport.addEventListener('touchend', (event) => {
                const touch = event.changedTouches[0];
                if (touch) end(touch.clientX, touch.clientY);
            }, { passive: true });
        }

        return true;
    };

    if (document.querySelector('.woocommerce-product-gallery')) {
        let attempts = 0;
        const timer = window.setInterval(() => {
            const done = initGalleryThumbs() && initGallerySwipe();
            if (done || ++attempts > 15) window.clearInterval(timer);
        }, 300);
    }

    /* ---------------------------------------------------------
       Async forms — newsletter and contact / bespoke enquiry
       --------------------------------------------------------- */

    const showMessage = (element, text, ok) => {
        element.textContent = text;
        element.classList.remove('is-ok', 'is-error');
        element.classList.add('is-visible', ok ? 'is-ok' : 'is-error');
    };

    const submitForm = async ({ form, message, action, nonce, body, button, pendingLabel }) => {
        const original = button ? button.textContent : '';

        if (button) {
            button.disabled = true;
            button.textContent = pendingLabel;
        }
        message.classList.remove('is-visible');

        body.append('action', action);
        body.append('nonce', nonce);

        try {
            const response = await fetch(window.dawpAjax.url, { method: 'POST', body });
            const data = await response.json();

            showMessage(
                message,
                (data.data && data.data.message) || (data.success ? 'Thank you.' : 'Something went wrong.'),
                Boolean(data.success)
            );

            if (data.success) form.reset();
        } catch {
            showMessage(message, 'Something went wrong. Please try again.', false);
        } finally {
            if (button) {
                button.disabled = false;
                button.textContent = original;
            }
        }
    };

    const newsletterForm = document.getElementById('footer-newsletter-form');
    const newsletterMsg = document.getElementById('footer-newsletter-msg');

    if (newsletterForm && newsletterMsg && window.dawpAjax) {
        newsletterForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const email = newsletterForm.querySelector('input[type="email"]');
            const body = new FormData();
            body.append('email', email ? email.value.trim() : '');

            submitForm({
                form: newsletterForm,
                message: newsletterMsg,
                action: 'dawp_newsletter',
                nonce: window.dawpAjax.nonce,
                body,
                button: newsletterForm.querySelector('button[type="submit"]'),
                pendingLabel: 'Sending',
            });
        });
    }

    const contactForm = document.getElementById('contact-form');
    const contactMsg = document.getElementById('contact-msg');

    if (contactForm && contactMsg && window.dawpAjax) {
        contactForm.addEventListener('submit', (event) => {
            event.preventDefault();

            if (!contactForm.checkValidity()) {
                contactForm.reportValidity();
                return;
            }

            submitForm({
                form: contactForm,
                message: contactMsg,
                action: 'dawp_contact',
                nonce: window.dawpAjax.contactNonce,
                body: new FormData(contactForm),
                button: contactForm.querySelector('button[type="submit"]'),
                pendingLabel: 'Sending',
            });
        });
    }

    /* ---------------------------------------------------------
       Side cart — drawer holding the WooCommerce mini-cart.
       WooCommerce replaces div.widget_shopping_cart_content
       wholesale, so it is re-queried on every sync.
       --------------------------------------------------------- */

    const cartDrawer = document.getElementById('c-cart-drawer');

    if (cartDrawer) {
        const overlay = cartDrawer.querySelector('[data-cart-overlay]');
        const panel = cartDrawer.querySelector('[data-cart-panel]');
        const emptyState = cartDrawer.querySelector('[data-cart-empty]');
        const badge = document.querySelector('[data-cart-count]');
        const toggles = document.querySelectorAll('[data-cart-toggle]');
        let lastFocused = null;
        let closeTimer = null;

        // The panel's own transform is the source of truth: the root keeps the
        // `hidden` class through the slide-out so the animation stays visible.
        const isOpen = () => !panel.classList.contains('translate-x-full');

        const setCart = (open) => {
            if (open === isOpen()) return;

            toggles.forEach((el) => el.setAttribute('aria-expanded', String(open)));
            document.body.style.overflow = open ? 'hidden' : '';

            if (open) {
                lastFocused = document.activeElement;
                cartDrawer.classList.remove('hidden');

                // Let the panel paint off-screen before it slides in.
                window.requestAnimationFrame(() => {
                    panel.classList.remove('translate-x-full');
                    if (overlay) overlay.classList.remove('opacity-0');
                });

                const close = cartDrawer.querySelector('[data-cart-close]');
                if (close) window.setTimeout(() => close.focus(), 30);
                return;
            }

            panel.classList.add('translate-x-full');
            if (overlay) overlay.classList.add('opacity-0');

            // A reopen during the slide-out wins over this pending close.
            // The panel only ever transitions its slide, so no property check:
            // Tailwind animates `translate`, not `transform`.
            const finishClose = () => {
                window.clearTimeout(closeTimer);
                panel.removeEventListener('transitionend', onSlideEnd);
                if (!isOpen()) cartDrawer.classList.add('hidden');
            };

            const onSlideEnd = (event) => {
                if (event.target === panel) finishClose();
            };

            panel.addEventListener('transitionend', onSlideEnd);
            // Fallback: transitionend never fires if the panel is off-screen.
            closeTimer = window.setTimeout(finishClose, 500);

            if (lastFocused) lastFocused.focus();
        };

        // Item count and empty state both come from the current fragment.
        const syncCart = () => {
            const content = cartDrawer.querySelector('.widget_shopping_cart_content');
            if (!content) return;

            // The steppers replace the mini-cart's "2 × $120" line; the text
            // reading is the fallback for when that filter is not in play.
            const inputs = content.querySelectorAll('[data-cart-qty-input]');
            const fallback = content.querySelectorAll('.woocommerce-mini-cart-item .quantity');
            let count = 0;

            if (inputs.length) {
                inputs.forEach((el) => { count += parseInt(el.value, 10) || 0; });
            } else {
                fallback.forEach((el) => { count += parseInt(el.textContent, 10) || 0; });
            }

            content.hidden = count === 0;
            if (emptyState) emptyState.hidden = count > 0;

            if (badge) {
                badge.textContent = String(count);
                badge.hidden = count === 0;
            }
        };

        toggles.forEach((el) => {
            el.addEventListener('click', (event) => {
                event.preventDefault();
                setCart(!isOpen());
            });
        });

        cartDrawer.querySelectorAll('[data-cart-close]').forEach((el) => {
            el.addEventListener('click', () => setCart(false));
        });

        if (overlay) overlay.addEventListener('click', () => setCart(false));

        document.addEventListener('keydown', (event) => {
            if (!isOpen()) return;

            if (event.key === 'Escape') {
                setCart(false);
                return;
            }

            if (event.key !== 'Tab') return;

            const focusable = panel.querySelectorAll('a[href], button:not([disabled]), input, [tabindex]:not([tabindex="-1"])');
            const items = Array.from(focusable).filter((el) => el.offsetParent !== null);
            if (!items.length) return;

            const first = items[0];
            const last = items[items.length - 1];

            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault();
                first.focus();
            }
        });

        if (window.jQuery) {
            const $body = window.jQuery(document.body);

            $body.on('added_to_cart removed_from_cart wc_fragments_loaded wc_fragments_refreshed', syncCart);
            $body.on('added_to_cart', () => setCart(true));
        }

        syncCart();

        /* -----------------------------------------------------
           Side cart — quantity steppers and add-to-cart
           ----------------------------------------------------- */

        const ajax = window.dawpAjax;
        const cartBody = cartDrawer.querySelector('.side-cart');
        const notice = cartDrawer.querySelector('[data-cart-notice]');
        const endpoint = (action) => (ajax && ajax.wcAjaxUrl ? ajax.wcAjaxUrl.replace('%%endpoint%%', action) : '');

        let noticeTimer = null;

        const showNotice = (text) => {
            if (!notice) return;

            notice.textContent = text || '';
            notice.hidden = !text;
            window.clearTimeout(noticeTimer);

            if (text) noticeTimer = window.setTimeout(() => { notice.hidden = true; }, 5000);
        };

        const applyFragments = (fragments) => {
            Object.keys(fragments).forEach((selector) => {
                document.querySelectorAll(selector).forEach((el) => { el.outerHTML = fragments[selector]; });
            });

            syncCart();
        };

        const requestCart = (action, body) => {
            const url = endpoint(action);
            if (!url) return Promise.reject(new Error('no endpoint'));

            if (cartBody) cartBody.classList.add('is-busy');

            return fetch(url, { method: 'POST', body, credentials: 'same-origin' })
                .then((response) => response.json())
                .then((data) => {
                    if (!data) throw new Error('empty response');

                    // WooCommerce answers a failed add with { error, product_url }.
                    if (!data.fragments) {
                        if (!data.error) throw new Error('no fragments');
                        return data;
                    }

                    applyFragments(data.fragments);
                    if (window.jQuery) window.jQuery(document.body).trigger('wc_fragments_refreshed');

                    return data;
                })
                .finally(() => {
                    if (cartBody) cartBody.classList.remove('is-busy');
                });
        };

        // One request at a time: each response carries the whole cart, so
        // overlapping updates would race to overwrite each other.
        const queued = new Map();
        let queueTimer = null;
        let inFlight = false;

        const flushQueue = () => {
            if (inFlight || !queued.size) return;

            const [key, quantity] = queued.entries().next().value;
            queued.delete(key);
            inFlight = true;

            const body = new FormData();
            body.append('cart_item_key', key);
            body.append('quantity', String(quantity));
            body.append('nonce', ajax && ajax.cartNonce ? ajax.cartNonce : '');

            requestCart('dawp_cart_quantity', body)
                .then((data) => showNotice(data.notice))
                .catch(() => showNotice('Could not update the cart. Please try again.'))
                .finally(() => { inFlight = false; flushQueue(); });
        };

        const queueQuantity = (key, quantity) => {
            queued.set(key, quantity);
            window.clearTimeout(queueTimer);
            queueTimer = window.setTimeout(flushQueue, 350);
        };

        const clampQuantity = (input, value) => {
            const min = parseInt(input.min, 10) || 1;
            const max = parseInt(input.max, 10);
            let next = Math.max(min, value);

            if (!Number.isNaN(max) && max > 0) next = Math.min(max, next);

            return next;
        };

        // Delegated: the stepper markup lives inside the replaced fragment.
        cartDrawer.addEventListener('click', (event) => {
            const step = event.target.closest('[data-cart-qty-step]');
            if (!step) return;

            const item = step.closest('[data-cart-item]');
            const input = item && item.querySelector('[data-cart-qty-input]');
            if (!input) return;

            const next = clampQuantity(input, (parseInt(input.value, 10) || 0) + (parseInt(step.dataset.cartQtyStep, 10) || 0));
            if (String(next) === input.value) return;

            input.value = String(next);
            queueQuantity(item.dataset.cartItem, next);
        });

        cartDrawer.addEventListener('change', (event) => {
            const input = event.target.closest('[data-cart-qty-input]');
            if (!input) return;

            const item = input.closest('[data-cart-item]');
            if (!item) return;

            const next = clampQuantity(input, parseInt(input.value, 10) || 0);
            input.value = String(next);
            queueQuantity(item.dataset.cartItem, next);
        });

        /* -----------------------------------------------------
           Product page — add to cart into the drawer
           ----------------------------------------------------- */

        const addForm = document.querySelector('form.cart:not(.grouped_form)');

        if (addForm && endpoint('add_to_cart')) {
            addForm.addEventListener('submit', (event) => {
                const variation = addForm.querySelector('input[name="variation_id"]');
                const field = addForm.querySelector('[name="add-to-cart"]');
                const productId = (variation && parseInt(variation.value, 10))
                    || (field && parseInt(field.value, 10))
                    || 0;

                // Nothing to post — external and grouped products submit normally.
                if (!productId) return;

                event.preventDefault();

                const button = addForm.querySelector('.single_add_to_cart_button');
                const quantity = addForm.querySelector('input[name="quantity"]');
                const body = new FormData();

                body.append('product_id', String(productId));
                body.append('quantity', quantity ? quantity.value : '1');

                if (button) button.classList.add('loading');

                requestCart('add_to_cart', body)
                    .then((data) => {
                        if (data.error && data.product_url) {
                            window.location = data.product_url;
                            return;
                        }

                        showNotice('');
                        setCart(true);
                        if (window.jQuery) window.jQuery(document.body).trigger('added_to_cart', [data.fragments, data.cart_hash]);
                    })
                    .catch(() => addForm.submit())
                    .finally(() => {
                        if (button) button.classList.remove('loading');
                    });
            });
        }
    }
});
