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

    // Watchmaking craft image switcher
    document.querySelectorAll('[data-craft-image-frame]').forEach((frame) => {
        const image = frame.querySelector('img');
        const section = frame.closest('.lux-craft-grid');
        const notes = section ? Array.from(section.querySelectorAll('[data-craft-image]')) : [];
        if (!image || !notes.length) return;

        notes.forEach((note) => {
            const preload = new Image();
            preload.src = note.dataset.craftImage;
        });

        const setCraftImage = (activeNote) => {
            const nextSrc = activeNote.dataset.craftImage;
            const nextAlt = activeNote.dataset.craftAlt || '';
            const nextPosition = activeNote.dataset.craftPosition || '50% 50%';
            const currentSrc = image.getAttribute('src') || '';
            if (!nextSrc || currentSrc === nextSrc) return;

            notes.forEach((note) => {
                const isActive = note === activeNote;
                note.classList.toggle('is-active', isActive);
                note.setAttribute('aria-pressed', String(isActive));
            });

            frame.classList.add('is-changing');
            window.setTimeout(() => {
                image.src = nextSrc;
                image.alt = nextAlt;
                image.style.objectPosition = nextPosition;
            }, 120);
        };

        image.addEventListener('load', () => {
            frame.classList.remove('is-changing');
        });

        notes.forEach((note) => {
            note.addEventListener('click', () => setCraftImage(note));
            note.addEventListener('mouseenter', () => setCraftImage(note));
            note.addEventListener('focus', () => setCraftImage(note));
        });
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
