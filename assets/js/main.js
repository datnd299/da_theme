document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('masthead') || document.getElementById('site-header');
    const toggle = document.querySelector('.menu-toggle');
    const nav    = document.querySelector('.main-navigation');
    const mobileMenuToggle = document.getElementById('sgs-mobile-toggle');
    const mobileMenu = document.getElementById('sgs-mobile-menu');
    const mobileSearchToggle = document.getElementById('sgs-mobile-search-toggle');
    const mobileSearch = document.getElementById('sgs-mobile-search');
    const mobileSearchInput = document.querySelector('#sgs-mobile-search .dgwt-wcas-search-input, #sgs-mobile-search-input');

    // Scroll shadow
    if (header) {
        const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 10);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // Mobile menu toggle
    if (toggle && nav && header) {
        toggle.addEventListener('click', () => {
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
            nav.classList.toggle('is-open');
        });

        // Đóng menu khi click bên ngoài
        document.addEventListener('click', (e) => {
            if (!header.contains(e.target) && !toggle.contains(e.target)) {
                toggle.setAttribute('aria-expanded', 'false');
                nav.classList.remove('is-open');
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
        prevBtn.type = 'button';
        prevBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>';
        prevBtn.setAttribute('aria-label', 'Previous product image thumbnails');
        
        const nextBtn = document.createElement('button');
        nextBtn.className = 'gallery-thumbs-btn next';
        nextBtn.type = 'button';
        nextBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>';
        nextBtn.setAttribute('aria-label', 'Next product image thumbnails');
        
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
            const canScroll = thumbsList.scrollWidth > thumbsList.clientWidth + 5;
            const atStart = thumbsList.scrollLeft <= 5;
            const atEnd = Math.ceil(thumbsList.scrollLeft + thumbsList.clientWidth) >= thumbsList.scrollWidth - 5;

            prevBtn.hidden = !canScroll || atStart;
            nextBtn.hidden = !canScroll || atEnd;
            prevBtn.disabled = !canScroll || atStart;
            nextBtn.disabled = !canScroll || atEnd;
        };
        
        thumbsList.addEventListener('scroll', updateButtons, { passive: true });
        window.addEventListener('resize', updateButtons, { passive: true });
        updateButtons();
        
        setTimeout(updateButtons, 500); // Check again after images might have loaded
        return true;
    };

    const initProductGallerySwipe = () => {
        const gallery = document.querySelector('.woocommerce-product-gallery');
        const viewport = gallery?.querySelector('.flex-viewport');
        const thumbsList = gallery?.querySelector('.flex-control-thumbs');

        if (!gallery || !viewport || gallery.classList.contains('has-main-image-swipe')) {
            return !!viewport;
        }

        gallery.classList.add('has-main-image-swipe');

        let startX = 0;
        let startY = 0;
        let tracking = false;

        const getFlexslider = () => {
            if (!window.jQuery) return null;
            const data = window.jQuery(gallery).data('flexslider');
            return data && typeof data.flexAnimate === 'function' ? data : null;
        };

        const getActiveThumbIndex = () => {
            const thumbs = Array.from(thumbsList?.querySelectorAll('img') || []);
            const activeIndex = thumbs.findIndex((thumb) => thumb.classList.contains('flex-active'));
            return { thumbs, activeIndex: activeIndex === -1 ? 0 : activeIndex };
        };

        const moveGallery = (direction) => {
            const flexslider = getFlexslider();

            if (flexslider) {
                const slideCount = flexslider.count || gallery.querySelectorAll('.woocommerce-product-gallery__image').length;
                if (slideCount <= 1) return;

                const current = flexslider.currentSlide || 0;
                const target = direction === 'next'
                    ? Math.min(current + 1, slideCount - 1)
                    : Math.max(current - 1, 0);

                if (target !== current) {
                    flexslider.flexAnimate(target);
                }
                return;
            }

            const { thumbs, activeIndex } = getActiveThumbIndex();
            const targetIndex = direction === 'next' ? activeIndex + 1 : activeIndex - 1;
            thumbs[targetIndex]?.click();
        };

        const startSwipe = (clientX, clientY) => {
            startX = clientX;
            startY = clientY;
            tracking = true;
        };

        const endSwipe = (clientX, clientY) => {
            if (!tracking) return;
            tracking = false;

            const deltaX = clientX - startX;
            const deltaY = clientY - startY;
            const isHorizontalSwipe = Math.abs(deltaX) > 48 && Math.abs(deltaX) > Math.abs(deltaY) * 1.4;

            if (!isHorizontalSwipe) return;
            moveGallery(deltaX < 0 ? 'next' : 'prev');
        };

        if (window.PointerEvent) {
            viewport.addEventListener('pointerdown', (event) => {
                if (event.pointerType === 'mouse' && event.button !== 0) return;
                startSwipe(event.clientX, event.clientY);
            });

            viewport.addEventListener('pointerup', (event) => {
                endSwipe(event.clientX, event.clientY);
            });

            viewport.addEventListener('pointercancel', () => {
                tracking = false;
            });
        } else {
            viewport.addEventListener('touchstart', (event) => {
                const touch = event.changedTouches[0];
                if (touch) startSwipe(touch.clientX, touch.clientY);
            }, { passive: true });

            viewport.addEventListener('touchend', (event) => {
                const touch = event.changedTouches[0];
                if (touch) endSwipe(touch.clientX, touch.clientY);
            }, { passive: true });
        }

        return true;
    };

    // Retry finding the gallery as WooCommerce initializes it asynchronously
    if (!initGalleryThumbsScroll() || !initProductGallerySwipe()) {
        let checkCount = 0;
        const interval = setInterval(() => {
            const thumbsReady = initGalleryThumbsScroll();
            const swipeReady = initProductGallerySwipe();
            if ((thumbsReady && swipeReady) || checkCount++ > 15) clearInterval(interval);
        }, 300);
    }

    function initMobileSnapSlider(config) {
        document.querySelectorAll(config.slider).forEach((slider) => {
            const track = slider.querySelector(config.track);
            const slides = Array.from(slider.querySelectorAll(config.slide));
            const dots = Array.from(slider.querySelectorAll(config.dot));
            const prevBtn = slider.querySelector(config.prev);
            const nextBtn = slider.querySelector(config.next);

            if (!track || slides.length === 0) return;

            const isMobileSlider = () => window.matchMedia('(max-width: 767px)').matches;

            const scrollToSlide = (index) => {
                const slide = slides[Math.max(0, Math.min(index, slides.length - 1))];
                if (!slide) return;
                track.scrollTo({ left: slide.offsetLeft - track.offsetLeft, behavior: 'smooth' });
            };

            const getActiveIndex = () => {
                const trackLeft = track.scrollLeft + track.offsetLeft;
                return slides.reduce((closestIndex, slide, index) => {
                    const currentDistance = Math.abs(slide.offsetLeft - trackLeft);
                    const closestDistance = Math.abs(slides[closestIndex].offsetLeft - trackLeft);
                    return currentDistance < closestDistance ? index : closestIndex;
                }, 0);
            };

            const updateSlider = () => {
                if (!isMobileSlider()) {
                    dots.forEach((dot) => dot.dataset.active = 'false');
                    if (prevBtn) prevBtn.disabled = true;
                    if (nextBtn) nextBtn.disabled = true;
                    return;
                }

                const activeIndex = getActiveIndex();
                dots.forEach((dot, index) => dot.dataset.active = String(index === activeIndex));
                if (prevBtn) prevBtn.disabled = activeIndex === 0;
                if (nextBtn) nextBtn.disabled = activeIndex === slides.length - 1;
            };

            let ticking = false;
            track.addEventListener('scroll', () => {
                if (ticking) return;
                ticking = true;
                window.requestAnimationFrame(() => {
                    updateSlider();
                    ticking = false;
                });
            }, { passive: true });

            prevBtn?.addEventListener('click', () => scrollToSlide(getActiveIndex() - 1));
            nextBtn?.addEventListener('click', () => scrollToSlide(getActiveIndex() + 1));
            dots.forEach((dot, index) => dot.addEventListener('click', () => scrollToSlide(index)));
            window.addEventListener('resize', updateSlider, { passive: true });
            updateSlider();
        });
    }

    // Mobile homepage sliders
    initMobileSnapSlider({
        slider: '[data-collection-slider]',
        track: '[data-collection-track]',
        slide: '[data-collection-slide]',
        dot: '[data-collection-dot]',
        prev: '[data-collection-prev]',
        next: '[data-collection-next]',
    });

    initMobileSnapSlider({
        slider: '[data-branch-slider]',
        track: '[data-branch-track]',
        slide: '[data-branch-slide]',
        dot: '[data-branch-dot]',
        prev: '[data-branch-prev]',
        next: '[data-branch-next]',
    });

    initMobileSnapSlider({
        slider: '[data-occasion-slider]',
        track: '[data-occasion-track]',
        slide: '[data-occasion-slide]',
        dot: '[data-occasion-dot]',
        prev: '[data-occasion-prev]',
        next: '[data-occasion-next]',
    });

    initMobileSnapSlider({
        slider: '[data-trust-slider]',
        track: '[data-trust-track]',
        slide: '[data-trust-slide]',
        dot: '[data-trust-dot]',
        prev: '[data-trust-prev]',
        next: '[data-trust-next]',
    });

    initMobileSnapSlider({
        slider: '[data-shipping-slider]',
        track: '[data-shipping-track]',
        slide: '[data-shipping-slide]',
        dot: '[data-shipping-dot]',
        prev: '[data-shipping-prev]',
        next: '[data-shipping-next]',
    });

    initMobileSnapSlider({
        slider: '[data-track-steps-slider]',
        track: '[data-track-steps-track]',
        slide: '[data-track-steps-slide]',
        dot: '[data-track-steps-dot]',
        prev: '[data-track-steps-prev]',
        next: '[data-track-steps-next]',
    });

    document.querySelectorAll('[data-review-slider]').forEach((slider) => {
        const track = slider.querySelector('[data-review-track]');
        const slides = Array.from(slider.querySelectorAll('[data-review-slide]'));
        const dots = Array.from(slider.querySelectorAll('[data-review-dot]'));
        const prevBtn = slider.querySelector('[data-review-prev]');
        const nextBtn = slider.querySelector('[data-review-next]');

        if (!track || slides.length === 0) return;

        const getActiveIndex = () => {
            const left = track.scrollLeft;
            return slides.reduce((closestIndex, slide, index) => {
                const currentDistance = Math.abs(slide.offsetLeft - track.offsetLeft - left);
                const closestDistance = Math.abs(slides[closestIndex].offsetLeft - track.offsetLeft - left);
                return currentDistance < closestDistance ? index : closestIndex;
            }, 0);
        };

        const scrollToSlide = (index) => {
            const slide = slides[Math.max(0, Math.min(index, slides.length - 1))];
            if (!slide) return;
            track.scrollTo({ left: slide.offsetLeft - track.offsetLeft, behavior: 'smooth' });
        };

        const updateSlider = () => {
            const activeIndex = getActiveIndex();
            const atEnd = Math.ceil(track.scrollLeft + track.clientWidth) >= track.scrollWidth - 2;

            dots.forEach((dot, index) => dot.dataset.active = String(index === activeIndex));
            if (prevBtn) prevBtn.disabled = track.scrollLeft <= 2;
            if (nextBtn) nextBtn.disabled = atEnd;
        };

        let ticking = false;
        track.addEventListener('scroll', () => {
            if (ticking) return;
            ticking = true;
            window.requestAnimationFrame(() => {
                updateSlider();
                ticking = false;
            });
        }, { passive: true });

        prevBtn?.addEventListener('click', () => scrollToSlide(getActiveIndex() - 1));
        nextBtn?.addEventListener('click', () => scrollToSlide(getActiveIndex() + 1));
        dots.forEach((dot, index) => dot.addEventListener('click', () => scrollToSlide(index)));
        window.addEventListener('resize', updateSlider, { passive: true });
        updateSlider();
    });

    // Newsletter signup (shared handler)
    function initNewsletterForm(formId, msgId, successColor, errorColor) {
        const form = document.getElementById(formId);
        const msg  = document.getElementById(msgId);
        if (!form || !msg || !window.dawpAjax) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const emailInput = form.querySelector('input[type="email"]');
            const submitBtn  = form.querySelector('button[type="submit"]');
            const origText   = submitBtn.textContent;

            submitBtn.disabled    = true;
            submitBtn.textContent = 'Sending...';
            msg.style.display     = 'none';

            const body = new FormData();
            body.append('action', 'dawp_newsletter');
            body.append('nonce', window.dawpAjax.nonce);
            body.append('email', emailInput.value.trim());

            try {
                const res  = await fetch(window.dawpAjax.url, { method: 'POST', body });
                const data = await res.json();
                msg.textContent   = data.data?.message ?? (data.success ? 'Thank you!' : 'Something went wrong.');
                msg.style.color   = data.success ? successColor : errorColor;
                msg.style.display = 'block';
                if (data.success) form.reset();
            } catch {
                msg.textContent   = 'Something went wrong. Please try again.';
                msg.style.color   = errorColor;
                msg.style.display = 'block';
            } finally {
                submitBtn.disabled    = false;
                submitBtn.textContent = origText;
            }
        });
    }

    // Contact form handler
    function initContactForm() {
        const form = document.getElementById('contact-form');
        const msg  = document.getElementById('contact-msg');
        if (!form || !msg || !window.dawpAjax) return;

        // ALTCHA widget: keep the latest solved payload in case its hidden input isn't in FormData.
        const captcha = form.querySelector('altcha-widget');
        let captchaPayload = '';
        captcha?.addEventListener('statechange', (e) => {
            captchaPayload = e.detail?.state === 'verified' ? (e.detail.payload || '') : '';
        });
        const showMsg = (text, ok) => {
            msg.textContent   = text;
            msg.style.color   = ok ? '#2e7d5e' : '#c0392b';
            msg.style.display = 'block';
        };

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            if (captcha && !captchaPayload && !new FormData(form).get('altcha')) {
                showMsg('Please complete the "I\'m not a robot" check.', false);
                return;
            }
            const submitBtn = form.querySelector('button[type="submit"]');
            const origText  = submitBtn.innerHTML;

            submitBtn.disabled    = true;
            submitBtn.innerHTML   = '<span>Sending...</span>';
            msg.style.display     = 'none';

            const body = new FormData(form);
            body.append('action', 'dawp_contact');
            body.append('nonce', window.dawpAjax.contactNonce);
            if (!body.get('altcha') && captchaPayload) body.set('altcha', captchaPayload);

            try {
                const res  = await fetch(window.dawpAjax.url, { method: 'POST', body });
                const data = await res.json();
                showMsg(data.data?.message ?? (data.success ? 'Message sent!' : 'Something went wrong.'), data.success);
                if (data.success) form.reset();
            } catch {
                showMsg('Something went wrong. Please try again.', false);
            } finally {
                submitBtn.disabled    = false;
                submitBtn.innerHTML   = origText;
                // A solved challenge is single-use, so require a fresh one for the next attempt.
                captchaPayload = '';
                captcha?.reset?.();
            }
        });
    }

    if (header) {
        const setExpanded = (button, panel, expanded) => {
            if (!button || !panel) return;
            button.setAttribute('aria-expanded', String(expanded));
            panel.classList.toggle('hidden', !expanded);
        };

        const closeMobilePanels = (exceptPanel = null) => {
            if (exceptPanel !== mobileMenu) setExpanded(mobileMenuToggle, mobileMenu, false);
            if (exceptPanel !== mobileSearch) setExpanded(mobileSearchToggle, mobileSearch, false);
        };

        mobileMenuToggle?.addEventListener('click', (event) => {
            event.stopPropagation();
            const expanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
            closeMobilePanels(expanded ? null : mobileMenu);
            setExpanded(mobileMenuToggle, mobileMenu, !expanded);
        });

        mobileSearchToggle?.addEventListener('click', (event) => {
            event.stopPropagation();
            const expanded = mobileSearchToggle.getAttribute('aria-expanded') === 'true';
            closeMobilePanels(expanded ? null : mobileSearch);
            setExpanded(mobileSearchToggle, mobileSearch, !expanded);
            if (!expanded) {
                window.setTimeout(() => mobileSearchInput?.focus(), 30);
            }
        });

        document.addEventListener('click', (event) => {
            // FiboSearch mounts its suggestions dropdown on <body>, outside the header
            if (!header.contains(event.target) && !event.target.closest('.dgwt-wcas-suggestions-wrapp, .dgwt-wcas-details-wrapp')) closeMobilePanels();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeMobilePanels();
        });

        window.addEventListener('resize', () => {
            if (window.matchMedia('(min-width: 1024px)').matches) closeMobilePanels();
        }, { passive: true });
    }

    // Side cart drawer
    function initCartDrawer() {
        const drawer  = document.getElementById('dawp-cart-drawer');
        const toggle  = document.getElementById('dawp-cart-toggle');
        const fab     = document.getElementById('dawp-cart-fab');
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
                const res  = await fetch(window.dawpCart.ajaxUrl, { method: 'POST', body, credentials: 'same-origin' });
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
    initContactForm();
    initCartDrawer();
});

// ── MozTire: tire finder, shop filters, quantity shortcuts ──
document.addEventListener('DOMContentLoaded', () => {
    // Finder tabs (By Size / By Vehicle Type / By Brand)
    document.querySelectorAll('[data-tire-finder]').forEach((finder) => {
        const tabs = Array.from(finder.querySelectorAll('[role="tab"]'));
        const select = (tab) => {
            tabs.forEach((t) => {
                const on = t === tab;
                t.setAttribute('aria-selected', String(on));
                t.tabIndex = on ? 0 : -1;
                document.getElementById(t.getAttribute('aria-controls'))?.toggleAttribute('hidden', !on);
            });
        };
        tabs.forEach((tab, i) => {
            tab.addEventListener('click', () => select(tab));
            tab.addEventListener('keydown', (e) => {
                if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;
                const next = tabs[(i + (e.key === 'ArrowRight' ? 1 : tabs.length - 1)) % tabs.length];
                select(next);
                next.focus();
            });
        });

        // Drop empty selects so the URL only carries the chosen sizes
        finder.querySelectorAll('[data-tire-size-form]').forEach((form) => {
            form.addEventListener('submit', () => {
                form.querySelectorAll('select').forEach((s) => { s.disabled = !s.value; });
                window.setTimeout(() => form.querySelectorAll('select').forEach((s) => { s.disabled = false; }), 0);
            });
        });
    });

    // Shop filter drawer (mobile)
    const filters = document.getElementById('shop-filters');
    if (filters) {
        const openBtn = document.querySelector('[data-shop-filter-open]');
        const overlay = document.querySelector('.shop-filters__overlay');
        const setOpen = (open) => {
            filters.classList.toggle('is-open', open);
            overlay?.toggleAttribute('hidden', !open);
            openBtn?.setAttribute('aria-expanded', String(open));
            document.body.style.overflow = open ? 'hidden' : '';
            if (open) filters.querySelector('.shop-filters__close')?.focus();
        };
        openBtn?.addEventListener('click', () => setOpen(true));
        document.querySelectorAll('[data-shop-filter-close]').forEach((el) => el.addEventListener('click', () => setOpen(false)));
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && filters.classList.contains('is-open')) setOpen(false); });
    }
});

// ── MozTire: shop filter sidebar (size dropdowns, brand search, price slider) ──
document.documentElement.classList.add('js-enabled');
document.addEventListener('DOMContentLoaded', () => {
    // Size dropdowns submit on change; empty fields are left out of the URL
    document.querySelectorAll('[data-shop-autosubmit]').forEach((form) => {
        const submit = () => {
            form.querySelectorAll('select').forEach((s) => { s.disabled = !s.value; });
            form.submit();
        };
        form.querySelectorAll('select').forEach((s) => s.addEventListener('change', submit));
    });

    // Brand: type-to-filter + "Show all N brands"
    document.querySelectorAll('[data-brand-filter]').forEach((box) => {
        const items = Array.from(box.querySelectorAll('li[data-brand-name]'));
        const search = box.querySelector('[data-brand-search]');
        const more = box.querySelector('[data-brand-more]');
        const empty = box.querySelector('[data-brand-empty]');
        let expanded = false;

        const render = () => {
            const q = (search?.value || '').trim().toLowerCase();
            let shown = 0;
            items.forEach((li) => {
                const visible = q ? li.dataset.brandName.includes(q) : (expanded || !li.classList.contains('is-extra'));
                li.hidden = !visible;
                if (visible) shown += 1;
            });
            if (empty) empty.hidden = shown > 0;
            if (more) more.hidden = Boolean(q);
        };

        search?.addEventListener('input', render);
        more?.addEventListener('click', () => {
            expanded = !expanded;
            more.setAttribute('aria-expanded', String(expanded));
            more.textContent = expanded ? 'Show fewer brands' : more.dataset.label;
            render();
        });
        if (more) more.dataset.label = more.textContent;
    });

    // Price: two range handles synced with the number inputs
    document.querySelectorAll('[data-price-filter]').forEach((form) => {
        const range = { min: form.querySelector('[data-price-range="min"]'), max: form.querySelector('[data-price-range="max"]') };
        const input = { min: form.querySelector('[data-price-input="min"]'), max: form.querySelector('[data-price-input="max"]') };
        const fill = form.querySelector('[data-price-fill]');
        if (!range.min || !range.max) return;

        const lo = Number(range.min.min);
        const hi = Number(range.min.max);
        const paint = () => {
            const a = ((Number(range.min.value) - lo) / (hi - lo)) * 100;
            const b = ((Number(range.max.value) - lo) / (hi - lo)) * 100;
            fill.style.left = `${a}%`;
            fill.style.width = `${b - a}%`;
        };
        const fromRange = (side) => {
            if (Number(range.min.value) > Number(range.max.value)) {
                range[side].value = side === 'min' ? range.max.value : range.min.value;
            }
            input.min.value = range.min.value;
            input.max.value = range.max.value;
            paint();
        };
        const fromInput = () => {
            range.min.value = Math.max(lo, Math.min(Number(input.min.value) || lo, hi));
            range.max.value = Math.min(hi, Math.max(Number(input.max.value) || hi, lo));
            paint();
        };

        ['min', 'max'].forEach((side) => {
            range[side].addEventListener('input', () => fromRange(side));
            range[side].addEventListener('change', () => form.requestSubmit());
            input[side].addEventListener('change', fromInput);
        });
        // Full range = no price filter in the URL
        form.addEventListener('submit', () => {
            if (Number(input.min.value) <= lo) input.min.disabled = true;
            if (Number(input.max.value) >= hi) input.max.disabled = true;
        });
        paint();
    });
});

// ── MozTire: size picker (Width → Ratio → Rim over the size categories) ──
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-size-picker]').forEach((form) => {
        let tree = {};
        try { tree = JSON.parse(form.querySelector('[data-size-tree]')?.value || '{}'); } catch { return; }
        const sel = { w: form.querySelector('[data-size-level="w"]'), a: form.querySelector('[data-size-level="a"]'), r: form.querySelector('[data-size-level="r"]') };
        if (!sel.w || !sel.a || !sel.r) return;

        const fill = (select, values, label) => {
            const keep = select.value;
            select.innerHTML = '';
            select.add(new Option(values.length ? label : '—', ''));
            values.forEach((v) => select.add(new Option(select === sel.r ? `R${v}` : v, v)));
            select.disabled = !values.length;
            if (values.map(String).includes(keep)) select.value = keep;
        };
        const sortNum = (list) => list.slice().sort((x, y) => parseFloat(x) - parseFloat(y));

        sel.w.addEventListener('change', () => {
            fill(sel.a, sortNum(Object.keys(tree[sel.w.value] || {})), 'Select');
            fill(sel.r, [], '');
            sel.a.value = '';
            sel.a.focus();
        });
        sel.a.addEventListener('change', () => {
            fill(sel.r, sortNum((tree[sel.w.value] || {})[sel.a.value] || []), 'Select');
            sel.r.value = '';
            sel.r.focus();
        });
        if (form.hasAttribute('data-size-autosubmit')) {
            sel.r.addEventListener('change', () => { if (sel.r.value) form.requestSubmit(); });
        }
    });
});
