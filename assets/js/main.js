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

    const menuToggle = document.querySelector('[data-cf-menu-toggle]');
    const menuClose = document.querySelector('[data-cf-menu-close]');
    const menuDrawer = document.getElementById('mobile-store-menu');
    const menuOverlay = document.querySelector('[data-cf-mobile-overlay]');
    const searchToggle = document.querySelector('[data-cf-search-toggle]');
    const searchPanel = document.getElementById('mobile-search-panel');
    const searchInput = document.getElementById('mobile-product-search');

    const closeSearchPanel = () => {
        if (!searchToggle || !searchPanel) return;
        searchToggle.setAttribute('aria-expanded', 'false');
        searchPanel.classList.remove('is-open');
    };

    const setMobileMenu = (open, returnFocus = false) => {
        if (!menuToggle || !menuDrawer) return;

        menuToggle.setAttribute('aria-expanded', String(open));
        menuDrawer.classList.toggle('is-open', open);
        menuDrawer.setAttribute('aria-hidden', String(!open));
        document.body.classList.toggle('cf-mobile-menu-open', open);

        if (menuOverlay) {
            menuOverlay.classList.toggle('is-open', open);
            menuOverlay.setAttribute('aria-hidden', String(!open));
        }

        if (open) {
            closeSearchPanel();
            const firstLink = menuDrawer.querySelector('a, button');
            if (firstLink) window.setTimeout(() => firstLink.focus(), 120);
        } else if (returnFocus) {
            menuToggle.focus({ preventScroll: true });
        }
    };

    if (menuToggle && menuDrawer) {
        menuToggle.addEventListener('click', () => {
            setMobileMenu(menuToggle.getAttribute('aria-expanded') !== 'true');
        });

        if (menuClose) {
            menuClose.addEventListener('click', () => setMobileMenu(false, true));
        }

        if (menuOverlay) {
            menuOverlay.addEventListener('click', () => setMobileMenu(false, true));
        }

        menuDrawer.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => setMobileMenu(false));
        });
    }

    if (searchToggle && searchPanel) {
        searchToggle.addEventListener('click', () => {
            const open = searchToggle.getAttribute('aria-expanded') !== 'true';
            searchToggle.setAttribute('aria-expanded', String(open));
            searchPanel.classList.toggle('is-open', open);

            if (open) {
                if (menuToggle && menuToggle.getAttribute('aria-expanded') === 'true') {
                    setMobileMenu(false);
                }
                if (searchInput) window.setTimeout(() => searchInput.focus(), 80);
            }
        });
    }

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;

        if (menuToggle && menuToggle.getAttribute('aria-expanded') === 'true') {
            setMobileMenu(false, true);
        }

        closeSearchPanel();
    });

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

    // Mobile image sliders
    document.querySelectorAll('[data-mobile-image-gallery], [data-organizer-gallery]').forEach((gallery) => {
        const track = gallery.querySelector('[data-mobile-image-gallery-track], [data-organizer-gallery-track]');
        if (!track) return;

        const slides = Array.from(track.querySelectorAll('[data-mobile-image-slide], [data-organizer-slide]'));
        const dots = Array.from(gallery.querySelectorAll('[data-mobile-image-slide-dot], [data-organizer-slide-dot]'));
        if (!slides.length || !dots.length) return;

        const setActiveDot = (activeIndex) => {
            dots.forEach((dot, index) => {
                const isActive = index === activeIndex;
                dot.classList.toggle('bg-[#2F2A28]', isActive);
                dot.classList.toggle('bg-[#D8C5BE]', !isActive);

                if (isActive) {
                    dot.setAttribute('aria-current', 'true');
                } else {
                    dot.removeAttribute('aria-current');
                }
            });
        };

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                const index = Number(dot.dataset.mobileImageSlideDot ?? dot.dataset.organizerSlideDot);
                const slide = slides[index];
                if (!slide) return;

                slide.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                setActiveDot(index);
            });
        });

        let scrollFrame = null;
        track.addEventListener('scroll', () => {
            if (scrollFrame) window.cancelAnimationFrame(scrollFrame);

            scrollFrame = window.requestAnimationFrame(() => {
                const trackRect = track.getBoundingClientRect();
                const trackCenter = trackRect.left + trackRect.width / 2;
                let closestIndex = 0;
                let closestDistance = Infinity;

                slides.forEach((slide, index) => {
                    const slideRect = slide.getBoundingClientRect();
                    const slideCenter = slideRect.left + slideRect.width / 2;
                    const distance = Math.abs(trackCenter - slideCenter);

                    if (distance < closestDistance) {
                        closestDistance = distance;
                        closestIndex = index;
                    }
                });

                setActiveDot(closestIndex);
            });
        }, { passive: true });

        setActiveDot(0);
    });

    // Slider nav buttons (e.g. reviews slider on desktop)
    document.querySelectorAll('[data-slider-nav]').forEach((nav) => {
        const track = document.getElementById(nav.dataset.sliderNav);
        const prevBtn = nav.querySelector('[data-slider-prev]');
        const nextBtn = nav.querySelector('[data-slider-next]');
        if (!track || !prevBtn || !nextBtn) return;

        const scrollAmount = () => track.clientWidth * 0.9;
        prevBtn.addEventListener('click', () => track.scrollBy({ left: -scrollAmount(), behavior: 'smooth' }));
        nextBtn.addEventListener('click', () => track.scrollBy({ left: scrollAmount(), behavior: 'smooth' }));

        const updateNav = () => {
            const atStart = track.scrollLeft <= 4;
            const atEnd = Math.ceil(track.scrollLeft + track.clientWidth) >= track.scrollWidth - 4;
            prevBtn.disabled = atStart;
            nextBtn.disabled = atEnd;
        };

        track.addEventListener('scroll', updateNav, { passive: true });
        window.addEventListener('resize', updateNav, { passive: true });
        updateNav();
    });

    // Product Gallery Thumbnails Scroll
    const initGalleryThumbsScroll = () => {
        const thumbsList = document.querySelector('.flex-control-thumbs');
        if (!thumbsList || thumbsList.classList.contains('has-scroll-arrows')) return !!thumbsList;
        if (thumbsList.closest('.gallery-thumbs-wrapper')) {
            thumbsList.classList.add('has-scroll-arrows');
            return true;
        }
        
        // Ensure there are enough thumbnails to warrant scrolling
        if (thumbsList.scrollWidth <= thumbsList.clientWidth) return true;

        thumbsList.classList.add('has-scroll-arrows');
        
        const wrapper = document.createElement('div');
        wrapper.className = 'gallery-thumbs-wrapper';
        
        thumbsList.parentNode.insertBefore(wrapper, thumbsList);
        wrapper.appendChild(thumbsList);
        
        const prevBtn = document.createElement('button');
        prevBtn.type = 'button';
        prevBtn.className = 'gallery-thumbs-btn prev';
        prevBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>';
        prevBtn.setAttribute('aria-label', 'Scroll Left');
        
        const nextBtn = document.createElement('button');
        nextBtn.type = 'button';
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
});
