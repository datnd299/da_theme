document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('site-header');
    const toggle = document.querySelector('.menu-toggle');
    const nav    = document.querySelector('.main-navigation');

    // Scroll shadow
    if (header) {
        const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 10);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // Mobile menu toggle
    if (toggle && nav) {
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
            const submitBtn = form.querySelector('button[type="submit"]');
            const origText  = submitBtn.textContent;

            submitBtn.disabled    = true;
            submitBtn.textContent = 'Sending...';
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
                submitBtn.textContent = origText;
            }
        });
    }

    initNewsletterForm('newsletter-form', 'newsletter-msg', '#a8f0c8', '#f9a8a8');
    initNewsletterForm('footer-newsletter-form', 'footer-newsletter-msg', '#a8f0c8', '#f9a8a8');
    initContactForm();
});
