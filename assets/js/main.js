document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('masthead') || document.getElementById('site-header');
    const toggle = document.querySelector('.menu-toggle');
    const nav    = document.querySelector('.main-navigation');
    const mobileMenuToggle = document.getElementById('sgs-mobile-toggle');
    const mobileMenu = document.getElementById('sgs-mobile-menu');
    const mobileSearchToggle = document.getElementById('sgs-mobile-search-toggle');
    const mobileSearch = document.getElementById('sgs-mobile-search');
    const mobileSearchInput = document.getElementById('sgs-mobile-search-input');

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

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
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

            try {
                const res  = await fetch(window.dawpAjax.url, { method: 'POST', body });
                const data = await res.json();
                msg.textContent   = data.data?.message ?? (data.success ? 'Message sent!' : 'Something went wrong.');
                msg.style.color   = data.success ? '#2e7d5e' : '#c0392b';
                msg.style.display = 'block';
                if (data.success) form.reset();
            } catch {
                msg.textContent   = 'Something went wrong. Please try again.';
                msg.style.color   = '#c0392b';
                msg.style.display = 'block';
            } finally {
                submitBtn.disabled    = false;
                submitBtn.innerHTML   = origText;
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
            if (!header.contains(event.target)) closeMobilePanels();
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
    initNewsletterForm('footer-newsletter-form', 'footer-newsletter-msg', '#a8f0c8', '#f9a8a8');
    initContactForm();
    initCartDrawer();
});
