document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('site-header');
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.main-navigation');

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
});
