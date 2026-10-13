document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('site-header') || document.getElementById('masthead');
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
            if (!header) return;

            if (!header.contains(e.target) && !toggle.contains(e.target)) {
                toggle.setAttribute('aria-expanded', 'false');
                nav.classList.remove('is-open');
            }
        });
    }

    const masthead = document.getElementById('masthead');
    const megaMenus = document.querySelectorAll('.dawp-mega');
    const mobileMenuToggle = document.getElementById('Mytire-mobile-menu-toggle');
    const mobileMenu = document.getElementById('Mytire-mobile-menu');
    const mobileSearchToggle = document.getElementById('Mytire-mobile-search-toggle');
    const mobileSearch = document.getElementById('Mytire-mobile-search');

    const setHeaderPanelTops = () => {
        if (!masthead) return;
        const headerBottom = Math.max(0, masthead.getBoundingClientRect().bottom);
        document.documentElement.style.setProperty(
            '--Mytire-mobile-panel-top',
            `${headerBottom}px`
        );
        document.documentElement.style.setProperty(
            '--Mytire-mega-panel-top',
            `${headerBottom}px`
        );
    };

    const closeMobileMenu = () => {
        if (!mobileMenu || !mobileMenuToggle) return;
        mobileMenu.classList.add('hidden');
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('dawp-mobile-menu-open');
    };

    const closeMobileSearch = () => {
        if (!mobileSearch || !mobileSearchToggle) return;
        mobileSearch.classList.add('hidden');
        mobileSearchToggle.setAttribute('aria-expanded', 'false');
    };

    const closeMobilePanels = () => {
        closeMobileMenu();
        closeMobileSearch();
    };

    megaMenus.forEach((megaMenu) => {
        let closeTimer;
        const panel = megaMenu.querySelector('.dawp-mega__panel');

        const openMegaMenu = () => {
            window.clearTimeout(closeTimer);
            setHeaderPanelTops();
            megaMenu.classList.add('is-open');
        };

        const scheduleCloseMegaMenu = () => {
            window.clearTimeout(closeTimer);
            closeTimer = window.setTimeout(() => {
                megaMenu.classList.remove('is-open');
            }, 20);
        };

        const pointerIsInsideMegaMenu = (target) => (
            megaMenu.contains(target) || (panel && panel.contains(target))
        );

        const closeMegaMenuIfOutside = (event) => {
            if (!pointerIsInsideMegaMenu(event.target)) {
                scheduleCloseMegaMenu();
            }
        };

        megaMenu.addEventListener('mouseenter', openMegaMenu);
        megaMenu.addEventListener('focusin', openMegaMenu);
        megaMenu.addEventListener('mouseleave', scheduleCloseMegaMenu);
        megaMenu.addEventListener('focusout', scheduleCloseMegaMenu);

        if (panel) {
            panel.addEventListener('mouseenter', openMegaMenu);
            panel.addEventListener('mouseleave', scheduleCloseMegaMenu);
        }

        document.addEventListener('pointermove', closeMegaMenuIfOutside, { passive: true });
    });

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');

            if (isOpen) {
                closeMobileMenu();
                return;
            }

            closeMobileSearch();
            setHeaderPanelTops();
            mobileMenu.classList.remove('hidden');
            mobileMenuToggle.setAttribute('aria-expanded', 'true');
            document.body.classList.add('dawp-mobile-menu-open');
        });

        window.addEventListener('resize', setHeaderPanelTops, { passive: true });
        window.addEventListener('orientationchange', setHeaderPanelTops, { passive: true });
        window.addEventListener('scroll', () => {
            if (!mobileMenu.classList.contains('hidden')) {
                setHeaderPanelTops();
            }
        }, { passive: true });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeMobilePanels();
            }
        });

        document.addEventListener('click', (e) => {
            if (!masthead || masthead.contains(e.target)) return;

            closeMobilePanels();
        });
    }

    if (mobileSearchToggle && mobileSearch) {
        mobileSearchToggle.addEventListener('click', () => {
            const isOpen = !mobileSearch.classList.contains('hidden');

            closeMobileMenu();
            mobileSearch.classList.toggle('hidden', isOpen);
            mobileSearchToggle.setAttribute('aria-expanded', String(!isOpen));
        });
    }

    setHeaderPanelTops();

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
