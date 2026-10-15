/**
 * POD variant selector — reads window.podVariantData (inlined by
 * inc/pod-variants.php) and wires up the Style/Color/Size selector on the
 * single product page: computes price, swaps gallery image, fills the
 * pod_variant_id/pod_size_id hidden inputs the cart hooks read.
 */
(function () {
    if (typeof podVariantData === 'undefined') {
        return;
    }

    var data = podVariantData;
    var state = { typeId: null, colorId: null, sizeId: null };
    // Image set currently in the gallery; PHP renders the first variant's.
    var galleryKey = data.variants[0] ? (data.variants[0].images || []).join('|') : null;

    function variantsForType(typeId) {
        return data.variants.filter(function (v) { return v.type_id === typeId; });
    }

    function findVariant(typeId, colorId) {
        var matches = data.variants.filter(function (v) {
            return v.type_id === typeId && v.color_id === colorId;
        });
        return matches[0] || null;
    }

    function sizesForType(typeId) {
        var prices = data.sizePrices[typeId] || {};
        return Object.keys(prices).map(function (id) { return parseInt(id, 10); });
    }

    function formatPrice(amount) {
        return data.currency + amount.toFixed(2);
    }

    function slugById(list, id) {
        var item = list.filter(function (i) { return i.id === id; })[0];
        return item ? item.slug : null;
    }

    function nameById(list, id) {
        var item = list.filter(function (i) { return i.id === id; })[0];
        return item ? item.name : null;
    }

    function setSelectedLabel(elId, name) {
        var el = document.getElementById(elId);
        if (el) {
            el.textContent = name ? ': ' + name : '';
        }
    }

    function idBySlug(list, slug) {
        var item = list.filter(function (i) { return i.slug === slug; })[0];
        return item ? item.id : null;
    }

    function readStateFromUrl() {
        var params = new URLSearchParams(window.location.search);
        var typeSlug  = params.get('pod_style');
        var colorSlug = params.get('pod_color');
        var sizeSlug  = params.get('pod_size');

        return {
            typeId:  typeSlug ? idBySlug(data.types, typeSlug) : null,
            colorId: colorSlug ? idBySlug(data.colors, colorSlug) : null,
            sizeId:  sizeSlug ? idBySlug(data.sizes, sizeSlug) : null,
        };
    }

    function updateUrl() {
        var params = new URLSearchParams(window.location.search);
        var typeSlug  = state.typeId !== null ? slugById(data.types, state.typeId) : null;
        var colorSlug = state.colorId !== null ? slugById(data.colors, state.colorId) : null;
        var sizeSlug  = state.sizeId !== null ? slugById(data.sizes, state.sizeId) : null;

        [['pod_style', typeSlug], ['pod_color', colorSlug], ['pod_size', sizeSlug]].forEach(function (pair) {
            if (pair[1]) {
                params.set(pair[0], pair[1]);
            } else {
                params.delete(pair[0]);
            }
        });

        var query  = params.toString();
        var newUrl = window.location.pathname + (query ? '?' + query : '') + window.location.hash;
        window.history.replaceState(null, '', newUrl);
    }

    // Rebuilding buttons on every click re-creates the Style thumbnails (and
    // flashes them while they reload), so only rebuild when the set of
    // options changes; otherwise just move the selected class.
    function renderOptions(containerId, items, selectedId, onSelect, availableIds, fillContent) {
        var el = document.getElementById(containerId);
        if (!el) {
            return;
        }
        var visible = items.filter(function (item) {
            return !availableIds || availableIds.indexOf(item.id) !== -1;
        });
        var key = visible.map(function (item) { return item.id; }).join(',');
        if (el.dataset.key === key) {
            el.querySelectorAll('.pod-option').forEach(function (btn) {
                btn.classList.toggle('is-selected', parseInt(btn.dataset.id, 10) === selectedId);
            });
            return;
        }
        el.dataset.key = key;
        el.innerHTML = '';
        visible.forEach(function (item) {
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'pod-option';
            btn.dataset.id = item.id;
            fillContent(btn, item);
            if (item.id === selectedId) {
                btn.classList.add('is-selected');
            }
            btn.addEventListener('click', function () { onSelect(item.id); });
            el.appendChild(btn);
        });
    }

    function fillTypeOption(btn, type) {
        btn.classList.add('pod-option--type');
        btn.title = type.name;
        var variant = variantsForType(type.id)[0];
        var img = document.createElement('img');
        img.className = 'pod-option-thumb';
        img.alt = '';
        img.loading = 'lazy';
        if (variant && variant.images && variant.images[0]) {
            img.src = variant.images[0];
        }
        btn.appendChild(img);
        var name = document.createElement('span');
        name.className = 'pod-option-name';
        name.textContent = type.name;
        btn.appendChild(name);
    }

    // No hex code → show the colour name as a text button, like sizes.
    function fillColorOption(btn, color) {
        btn.title = color.name;
        if (!color.hex) {
            btn.classList.add('pod-option--text');
            btn.textContent = color.name;
            return;
        }
        btn.classList.add('pod-option--color');
        btn.setAttribute('aria-label', color.name);
        var swatch = document.createElement('span');
        swatch.className = 'pod-option-swatch';
        swatch.style.backgroundColor = color.hex;
        btn.appendChild(swatch);
    }

    function fillSizeOption(btn, size) {
        btn.classList.add('pod-option--text');
        btn.textContent = size.name;
    }

    function setGroupHidden(group, hidden) {
        var el = document.querySelector('.pod-variant-group[data-group="' + group + '"]');
        if (el) {
            el.hidden = hidden;
        }
    }

    function currentVariant() {
        if (state.typeId === null || state.colorId === null) {
            return null;
        }
        return findVariant(state.typeId, state.colorId);
    }

    function selectType(id) {
        state.typeId = id;
        var colorIds = variantsForType(id).map(function (v) { return v.color_id; });
        if (colorIds.indexOf(state.colorId) === -1) {
            state.colorId = colorIds[0] !== undefined ? colorIds[0] : null;
        }
        var sizeIds = sizesForType(id);
        if (sizeIds.indexOf(state.sizeId) === -1) {
            state.sizeId = sizeIds[0] !== undefined ? sizeIds[0] : null;
        }
        render();
    }

    function selectColor(id) {
        state.colorId = id;
        render();
    }

    function selectSize(id) {
        state.sizeId = id;
        render();
    }

    function updatePriceAndImage() {
        var variant = currentVariant();
        var priceEl = document.querySelector('.summary .price');
        if (!variant) {
            return;
        }

        var base = variant.sale_price !== null ? variant.sale_price : variant.price;
        var surcharge = (data.sizePrices[state.typeId] && data.sizePrices[state.typeId][state.sizeId]) || 0;

        if (priceEl) {
            priceEl.textContent = formatPrice(base + surcharge);
        }

        // Only touch the gallery when the image set actually changes — a size
        // pick (same variant) must not reset or reload the images.
        var images = variant.images || [];
        var key = images.join('|');
        if (key === galleryKey) {
            return;
        }
        galleryKey = key;

        var mainImage = document.getElementById('pod-main-image');
        if (mainImage && images[0]) {
            mainImage.src = images[0];
        }

        var thumbs = getThumbsList();
        if (thumbs) {
            thumbs.innerHTML = '';
            thumbs.hidden = images.length < 2;
            if (images.length > 1) {
                images.forEach(function (url, i) {
                    var li = document.createElement('li');
                    var img = document.createElement('img');
                    img.src = url;
                    img.alt = '';
                    if (i === 0) {
                        img.className = 'flex-active';
                    }
                    li.appendChild(img);
                    thumbs.appendChild(li);
                });
            }
        }
    }

    // PHP only prints the thumbs list when the first variant has 2+ images;
    // create it on demand so later variants with more images still get one.
    function getThumbsList() {
        var thumbs = document.getElementById('pod-gallery-thumbs');
        var gallery = document.querySelector('.pod-gallery');
        if (!thumbs && gallery) {
            thumbs = document.createElement('ul');
            thumbs.className = 'flex-control-thumbs';
            thumbs.id = 'pod-gallery-thumbs';
            gallery.appendChild(thumbs);
            bindThumbs(thumbs);
        }
        return thumbs;
    }

    function bindThumbs(thumbs) {
        thumbs.addEventListener('click', function (e) {
            var img = e.target.closest('img');
            var mainImage = document.getElementById('pod-main-image');
            if (!img || !mainImage) {
                return;
            }
            mainImage.src = img.src;
            thumbs.querySelectorAll('img').forEach(function (t) { t.classList.remove('flex-active'); });
            img.classList.add('flex-active');
        });
    }

    function updateHiddenInputs() {
        var variant = currentVariant();
        var variantInput = document.getElementById('pod_variant_id');
        var sizeInput = document.getElementById('pod_size_id');
        if (variantInput) {
            variantInput.value = variant ? variant.id : '';
        }
        if (sizeInput) {
            sizeInput.value = state.sizeId !== null ? state.sizeId : '';
        }
    }

    function updateSubmitState() {
        var button = document.querySelector('.single_add_to_cart_button');
        if (!button) {
            return;
        }
        var valid = !!currentVariant() && state.sizeId !== null;
        button.disabled = !valid;
        button.classList.toggle('pod-disabled', !valid);
    }

    function render() {
        var availableTypeIds = data.types
            .map(function (t) { return t.id; })
            .filter(function (id) { return variantsForType(id).length > 0; });
        renderOptions('pod-type-options', data.types, state.typeId, selectType, availableTypeIds, fillTypeOption);

        var availableColorIds = state.typeId !== null
            ? variantsForType(state.typeId).map(function (v) { return v.color_id; })
            : [];
        renderOptions('pod-color-options', data.colors, state.colorId, selectColor, availableColorIds, fillColorOption);

        var availableSizeIds = state.typeId !== null ? sizesForType(state.typeId) : [];
        renderOptions('pod-size-options', data.sizes, state.sizeId, selectSize, availableSizeIds, fillSizeOption);

        // A single value is auto-selected (still sent to the cart) but there
        // is nothing to choose, so the group is hidden.
        setGroupHidden('type', availableTypeIds.length <= 1);
        setGroupHidden('color', availableColorIds.length <= 1);
        setGroupHidden('size', availableSizeIds.length <= 1);

        setSelectedLabel('pod-type-selected', nameById(data.types, state.typeId));
        setSelectedLabel('pod-color-selected', nameById(data.colors, state.colorId));
        setSelectedLabel('pod-size-selected', nameById(data.sizes, state.sizeId));

        updatePriceAndImage();
        updateHiddenInputs();
        updateSubmitState();
        updateUrl();
    }

    function initState() {
        var fromUrl = readStateFromUrl();
        var availableTypeIds = data.types
            .map(function (t) { return t.id; })
            .filter(function (id) { return variantsForType(id).length > 0; });

        var typeId = (fromUrl.typeId !== null && availableTypeIds.indexOf(fromUrl.typeId) !== -1)
            ? fromUrl.typeId
            : availableTypeIds[0];

        if (typeId === undefined) {
            render();
            return;
        }
        state.typeId = typeId;

        var colorIds = variantsForType(typeId).map(function (v) { return v.color_id; });
        state.colorId = (fromUrl.colorId !== null && colorIds.indexOf(fromUrl.colorId) !== -1)
            ? fromUrl.colorId
            : (colorIds[0] !== undefined ? colorIds[0] : null);

        var sizeIds = sizesForType(typeId);
        state.sizeId = (fromUrl.sizeId !== null && sizeIds.indexOf(fromUrl.sizeId) !== -1)
            ? fromUrl.sizeId
            : (sizeIds[0] !== undefined ? sizeIds[0] : null);

        render();
    }

    function initSizeChartModal() {
        var modal = document.getElementById('pod-sizechart-modal');
        if (!modal) {
            return;
        }

        var lastFocused = null;

        function switchPanel(typeId) {
            typeId = String(typeId);
            modal.querySelectorAll('.pod-sizechart-panel').forEach(function (panel) {
                panel.hidden = panel.dataset.typeId !== typeId;
            });
            modal.querySelectorAll('.pod-sizechart-tab').forEach(function (tab) {
                tab.classList.toggle('is-active', tab.dataset.typeId === typeId);
            });
        }

        function openModal(trigger) {
            lastFocused = trigger || document.activeElement;
            if (state.typeId !== null && modal.querySelector('.pod-sizechart-panel[data-type-id="' + state.typeId + '"]')) {
                switchPanel(state.typeId);
            }
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('pod-sizechart-open');
            var closeBtn = modal.querySelector('.pod-sizechart-modal__close');
            if (closeBtn) {
                closeBtn.focus();
            }
        }

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('pod-sizechart-open');
            if (lastFocused && typeof lastFocused.focus === 'function') {
                lastFocused.focus();
            }
        }

        document.addEventListener('click', function (e) {
            var opener = e.target.closest('[data-pod-sizechart-open]');
            if (opener) {
                e.preventDefault();
                openModal(opener);
                return;
            }

            if (e.target.closest('[data-pod-sizechart-close]')) {
                e.preventDefault();
                closeModal();
                return;
            }

            var tab = e.target.closest('.pod-sizechart-tab');
            if (tab) {
                switchPanel(tab.dataset.typeId);
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.classList.contains('is-open')) {
                closeModal();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        var thumbs = document.getElementById('pod-gallery-thumbs');
        if (thumbs) {
            bindThumbs(thumbs);
        }
        initState();
        initSizeChartModal();
    });
})();
