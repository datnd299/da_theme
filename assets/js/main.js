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

    const initMobileSlider = ({ sliderSelector, controlsSelector, slideSelector, prevSelector, nextSelector, dotsSelector, dotClass }) => {
        const slider = document.querySelector(sliderSelector);
        const controls = document.querySelector(controlsSelector);

        if (!slider || !controls) return;

        const slides = Array.from(slider.querySelectorAll(slideSelector));
        const prevButton = controls.querySelector(prevSelector);
        const nextButton = controls.querySelector(nextSelector);
        const dotsWrap = controls.querySelector(dotsSelector);
        let dots = [];

        if (dotsWrap) {
            dotsWrap.innerHTML = '';
            dots = slides.map((_, index) => {
                const dot = document.createElement('span');
                dot.className = dotClass;
                dot.dataset.slide = String(index);
                dotsWrap.appendChild(dot);
                return dot;
            });
        }

        const getActiveIndex = () => {
            if (!slides.length) return 0;

            return slides.reduce((activeIndex, slide, index) => {
                const activeDistance = Math.abs(slides[activeIndex].offsetLeft - slider.scrollLeft);
                const slideDistance = Math.abs(slide.offsetLeft - slider.scrollLeft);
                return slideDistance < activeDistance ? index : activeIndex;
            }, 0);
        };

        const scrollToSlide = (index) => {
            const target = slides[Math.max(0, Math.min(index, slides.length - 1))];
            if (target) {
                slider.scrollTo({ left: target.offsetLeft, behavior: 'smooth' });
            }
        };

        const updateSlider = () => {
            const activeIndex = getActiveIndex();
            dots.forEach((dot, index) => dot.classList.toggle('is-active', index === activeIndex));

            if (prevButton) prevButton.disabled = activeIndex === 0;
            if (nextButton) nextButton.disabled = activeIndex === slides.length - 1;
        };

        if (prevButton) {
            prevButton.addEventListener('click', () => scrollToSlide(getActiveIndex() - 1));
        }

        if (nextButton) {
            nextButton.addEventListener('click', () => scrollToSlide(getActiveIndex() + 1));
        }

        slider.addEventListener('scroll', updateSlider, { passive: true });
        window.addEventListener('resize', updateSlider, { passive: true });
        updateSlider();
    };

    initMobileSlider({
        sliderSelector: '.home-category-slider',
        controlsSelector: '.home-category-slider-controls',
        slideSelector: '.home-category-slide',
        prevSelector: '.home-category-slider-prev',
        nextSelector: '.home-category-slider-next',
        dotsSelector: '.home-category-slider-dots',
        dotClass: 'home-category-slider-dot',
    });

    initMobileSlider({
        sliderSelector: '.home-trust-slider',
        controlsSelector: '.home-trust-slider-controls',
        slideSelector: '.home-trust-slide',
        prevSelector: '.home-trust-slider-prev',
        nextSelector: '.home-trust-slider-next',
        dotsSelector: '.home-trust-slider-dots',
        dotClass: 'home-trust-slider-dot',
    });

    initMobileSlider({
        sliderSelector: '.home-care-slider',
        controlsSelector: '.home-care-slider-controls',
        slideSelector: '.home-care-slide',
        prevSelector: '.home-care-slider-prev',
        nextSelector: '.home-care-slider-next',
        dotsSelector: '.home-care-slider-dots',
        dotClass: 'home-care-slider-dot',
    });

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
});
