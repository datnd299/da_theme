<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Route the single-product gallery (no theme template override exists for it) through the
// i0.wp.com CDN, matching the shop grid. Filters are added/removed tightly around the gallery
// render only, so they don't also catch the unrelated `dawp_product_responsive_image()` calls
// used by the related-products loop further down the same page.
add_action('woocommerce_before_single_product_summary', 'dawp_product_gallery_cdn_filters_on', 19);
add_action('woocommerce_before_single_product_summary', 'dawp_product_gallery_cdn_filters_off', 21);

function dawp_product_gallery_cdn_filters_on() {
    add_filter('wp_get_attachment_image_attributes', 'dawp_product_gallery_cdn_image_attributes');
    add_filter('wp_get_attachment_image_src', 'dawp_product_gallery_cdn_image_src');
    add_filter('wp_calculate_image_srcset', 'dawp_product_gallery_cdn_image_srcset');
}

function dawp_product_gallery_cdn_filters_off() {
    remove_filter('wp_get_attachment_image_attributes', 'dawp_product_gallery_cdn_image_attributes');
    remove_filter('wp_get_attachment_image_src', 'dawp_product_gallery_cdn_image_src');
    remove_filter('wp_calculate_image_srcset', 'dawp_product_gallery_cdn_image_srcset');
}

function dawp_product_gallery_cdn_image_attributes($attr) {
    if (!function_exists('dawp_cdn_image_url')) {
        return $attr;
    }

    $width = isset($attr['width']) ? (int) $attr['width'] : 0;

    if (!empty($attr['src'])) {
        $attr['src'] = dawp_cdn_image_url($attr['src'], $width);
    }
    if (!empty($attr['data-src'])) {
        $attr['data-src'] = dawp_cdn_image_url($attr['data-src']);
    }
    if (!empty($attr['data-large_image'])) {
        $attr['data-large_image'] = dawp_cdn_image_url($attr['data-large_image']);
    }

    return $attr;
}

function dawp_product_gallery_cdn_image_src($image) {
    if (!function_exists('dawp_cdn_image_url') || empty($image[0])) {
        return $image;
    }

    $image[0] = dawp_cdn_image_url($image[0], isset($image[1]) ? (int) $image[1] : 0);

    return $image;
}

function dawp_product_gallery_cdn_image_srcset($sources) {
    if (!function_exists('dawp_cdn_image_url') || empty($sources) || !is_array($sources)) {
        return $sources;
    }

    foreach ($sources as $width => $source) {
        if (!empty($source['url'])) {
            $sources[$width]['url'] = dawp_cdn_image_url($source['url'], (int) $width);
        }
    }

    return $sources;
}

/* =============================================================
   Single product — layout ported from the chronelshop branch.
   Brand → title → specs link → price → delivery note → actions → services,
   then Details / Specifications / Quality / Shipping / Reviews sections
   instead of tabs. Copy follows RoyalStyled's own policy pages.
   ============================================================= */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

add_action('woocommerce_before_single_product', 'woocommerce_breadcrumb', 5);
add_action('woocommerce_single_product_summary', 'dawp_pdp_brand', 4);
add_action('woocommerce_single_product_summary', 'dawp_pdp_reference', 6);
add_action('woocommerce_single_product_summary', 'dawp_pdp_price_note', 12);
add_action('woocommerce_single_product_summary', 'dawp_pdp_specialist', 35);
add_action('woocommerce_single_product_summary', 'dawp_pdp_services', 45);
add_action('woocommerce_after_single_product_summary', 'dawp_pdp_sections', 10);
add_action('woocommerce_after_single_product_summary', 'dawp_pdp_promise', 12);

// Most products have no category/tag, so Woo finds no related items:
// fall back to the same brand, then to the newest products.
add_filter('woocommerce_related_products', 'dawp_pdp_related_fallback', 10, 3);
add_filter('woocommerce_product_related_products_heading', function () {
    return __('You May Also Like', 'dawp');
});
function dawp_pdp_related_fallback($ids, $product_id, $args) {
    if (!empty($ids)) {
        return $ids;
    }
    $query = [
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => !empty($args['limit']) ? (int) $args['limit'] : 4,
        'post__not_in'   => [$product_id],
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ];
    $brands = wp_get_post_terms($product_id, 'product_brand', ['fields' => 'ids']);
    if (!is_wp_error($brands) && $brands) {
        $same_brand = get_posts($query + ['tax_query' => [['taxonomy' => 'product_brand', 'terms' => $brands]]]);
        if ($same_brand) {
            return $same_brand;
        }
    }
    return get_posts($query);
}

/**
 * First brand term of the product (WooCommerce Brands), or null.
 */
function dawp_pdp_get_brand($product) {
    if (!taxonomy_exists('product_brand')) {
        return null;
    }
    $terms = get_the_terms($product->get_id(), 'product_brand');
    return (!is_wp_error($terms) && !empty($terms)) ? $terms[0] : null;
}

function dawp_pdp_brand() {
    global $product;
    $brand = dawp_pdp_get_brand($product);
    if (!$brand) {
        return;
    }
    $link = get_term_link($brand);
    ?>
    <a class="pdp-brand" href="<?php echo esc_url(is_wp_error($link) ? '#' : $link); ?>"><?php echo esc_html($brand->name); ?></a>
    <?php
}

function dawp_pdp_reference() {
    ?>
    <div class="pdp-ref">
        <a href="#pdp-specs"><?php esc_html_e('View Specifications', 'dawp'); ?></a>
    </div>
    <?php
}

function dawp_pdp_price_note() {
    ?>
    <div class="pdp-delivery">
        <p class="pdp-delivery__free">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7"/><circle cx="7" cy="17.5" r="1.5"/><circle cx="17" cy="17.5" r="1.5"/></svg>
            <strong><?php esc_html_e('Free Shipping', 'dawp'); ?></strong>
            <span><?php esc_html_e('on every order + free 30-day returns', 'dawp'); ?></span>
        </p>
        <p class="pdp-delivery__note"><?php esc_html_e('Hand-assembled and tested after you order, then shipped from Hong Kong with tracking.', 'dawp'); ?> <a href="#pdp-shipping"><?php esc_html_e('Details', 'dawp'); ?></a></p>
    </div>
    <?php
}

function dawp_pdp_specialist() {
    ?>
    <a class="pdp-specialist" href="<?php echo esc_url(home_url('/contact-us/')); ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12a8.5 8.5 0 0 1-12.6 7.4L3 21l1.6-5.2A8.5 8.5 0 1 1 21 12z"/></svg>
        <?php esc_html_e('Questions? Ask a Watch Specialist', 'dawp'); ?>
    </a>
    <?php
}

function dawp_pdp_services() {
    $services = [
        [
            'title' => __('Free Shipping on Every Order', 'dawp'),
            'copy'  => __('Free tracked shipping with no minimum. Your watch ships from Hong Kong: allow 3-5 business days for assembly and testing, then 10-15 business days in transit, including customs clearance. Tracking is sent by email as soon as it ships.', 'dawp'),
            'link'  => home_url('/shipping-policy/'),
            'label' => __('Shipping Policy', 'dawp'),
            'icon'  => '<path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7"/><circle cx="7" cy="17.5" r="1.5"/><circle cx="17" cy="17.5" r="1.5"/>',
        ],
        [
            'title' => __('Inspected Before It Ships', 'dawp'),
            'copy'  => __('Every watch is checked for timekeeping, crown and clasp function, and finish before it is packed and handed to the carrier.', 'dawp'),
            'link'  => '#pdp-quality',
            'label' => __('Our Quality Check', 'dawp'),
            'icon'  => '<circle cx="12" cy="12" r="8"/><path d="M12 7v5l3 2"/>',
        ],
        [
            'title' => __('30-Day Returns', 'dawp'),
            'copy'  => __('Start a return within 30 days of delivery for an unworn watch with its box and papers. We cover return shipping for defective, damaged or incorrect items. Refunds go back to your original payment method.', 'dawp'),
            'link'  => home_url('/refund-return-policy/'),
            'label' => __('Refund & Return Policy', 'dawp'),
            'icon'  => '<path d="M4 4v6h6"/><path d="M5 15a8 8 0 1 0 1.5-8.5L4 10"/>',
        ],
        [
            'title' => __('Faults Covered on Arrival', 'dawp'),
            'copy'  => __('If a watch arrives faulty, contact us within 30 days for a replacement or full refund. Where a manufacturer warranty applies, its card is in the box and we can help you start a claim.', 'dawp'),
            'link'  => home_url('/contact-us/'),
            'label' => __('Contact Support', 'dawp'),
            'icon'  => '<path d="M12 3l7 3v5c0 4.6-2.9 8-7 10-4.1-2-7-5.4-7-10V6z"/><path d="M9 12l2 2 4-5"/>',
        ],
        [
            'title' => __('Secure Checkout', 'dawp'),
            'copy'  => __('Checkout runs over an encrypted SSL connection, and payments are handled by PCI-DSS certified payment gateways.', 'dawp'),
            'icon'  => '<rect x="5" y="11" width="14" height="10" rx="1"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/>',
        ],
    ];
    ?>
    <div class="pdp-services">
        <?php foreach ($services as $service) : ?>
            <details class="pdp-service">
                <summary>
                    <svg class="pdp-service__icon" viewBox="0 0 24 24" aria-hidden="true"><?php echo $service['icon']; ?></svg>
                    <span><?php echo esc_html($service['title']); ?></span>
                </summary>
                <div class="pdp-service__body">
                    <p><?php echo esc_html($service['copy']); ?></p>
                    <?php if (!empty($service['link'])) : ?>
                        <a href="<?php echo esc_url($service['link']); ?>"><?php echo esc_html($service['label']); ?></a>
                    <?php endif; ?>
                </div>
            </details>
        <?php endforeach; ?>
    </div>
    <?php
}

/**
 * Split product specs into the key specs shoppers check first (in priority order)
 * and the rest, grouped the way watch retailers do (General / Case / Dial / Movement / Strap).
 */
function dawp_pdp_spec_groups($product) {
    // Priority slot => accepted labels (lowercase, letters only). Order = display order.
    $priority = [
        'brand'      => ['brand'],
        'collection' => ['collection', 'family', 'series'],
        'model'      => ['model', 'modelno', 'modelnumber', 'modelname'],
        'movement'   => ['movement', 'movementtype'],
        'caliber'    => ['caliber', 'calibre'],
        'case_size'  => ['casesize', 'casediameter', 'diameter'],
        'case_mat'   => ['casematerial'],
        'crystal'    => ['crystal', 'glass'],
        'dial_color' => ['dialcolor', 'dialcolour'],
        'water'      => ['waterresistance', 'waterresistant'],
        'power'      => ['powerreserve'],
        'functions'  => ['functions', 'function', 'complications'],
    ];
    $groups = [
        'general'  => ['title' => __('General', 'dawp'), 'rows' => []],
        'case'     => ['title' => __('Case', 'dawp'), 'rows' => []],
        'dial'     => ['title' => __('Dial', 'dawp'), 'rows' => []],
        'movement' => ['title' => __('Movement', 'dawp'), 'rows' => []],
        'strap'    => ['title' => __('Strap & Bracelet', 'dawp'), 'rows' => []],
    ];
    $keywords = [
        'case'     => ['case', 'bezel', 'crystal', 'glass', 'lug', 'thickness', 'diameter'],
        'dial'     => ['dial', 'hand', 'marker', 'index', 'indece', 'indice', 'lume', 'luminous'],
        'movement' => ['movement', 'mechanism', 'calibre', 'caliber', 'power', 'precision', 'jewel', 'display', 'battery', 'function', 'complication'],
        'strap'    => ['strap', 'band', 'bracelet', 'clasp', 'buckle'],
    ];

    $key  = array_fill_keys(array_keys($priority), null);
    $slot = [];
    foreach ($priority as $name => $aliases) {
        foreach ($aliases as $alias) {
            $slot[$alias] = $name;
        }
    }

    $add = function ($label, $value) use (&$key, &$groups, $slot, $keywords) {
        $norm = preg_replace('/[^a-z]/', '', strtolower($label));
        if (isset($slot[$norm]) && $key[$slot[$norm]] === null) {
            $key[$slot[$norm]] = [$label, $value];
            return;
        }
        $group = 'general';
        foreach ($keywords as $name => $words) {
            foreach ($words as $word) {
                if (stripos($label, $word) !== false) {
                    $group = $name;
                    break 2;
                }
            }
        }
        $groups[$group]['rows'][$label] = $value;
    };

    $brand = dawp_pdp_get_brand($product);
    if ($brand) {
        $add(__('Brand', 'dawp'), $brand->name);
    }
    foreach ($product->get_attributes() as $attribute) {
        if (!$attribute->get_visible()) {
            continue;
        }
        $label = ucwords(wc_attribute_label($attribute->get_name()));
        // Hide internal attributes whose name starts with "Watch" or "GMC" (case-insensitive).
        $raw_name = preg_replace('/^pa_/', '', $attribute->get_name());
        if (preg_match('/^\s*(watch|gmc)/i', $label) || preg_match('/^(watch|gmc)/i', $raw_name)) {
            continue;
        }
        // Reference numbers are not shown on the product page.
        if (in_array(preg_replace('/[^a-z]/', '', strtolower($label)), ['reference', 'referenceno', 'referencenumber', 'ref', 'refno'], true)) {
            continue;
        }
        if ($attribute->is_taxonomy()) {
            $values = wc_get_product_terms($product->get_id(), $attribute->get_name(), ['fields' => 'names']);
        } else {
            $values = $attribute->get_options();
        }
        $value = ucwords(implode(', ', array_map('wp_strip_all_tags', $values)));
        if ($value === '') {
            continue;
        }
        $add($label, $value);
    }

    if ($product->has_weight()) {
        $add(__('Weight', 'dawp'), wc_format_weight($product->get_weight()));
    }

    return [
        'key'    => array_values(array_filter($key)),
        'groups' => array_filter($groups, function ($group) {
            return !empty($group['rows']);
        }),
    ];
}

function dawp_pdp_sections() {
    global $product;
    $specs       = dawp_pdp_spec_groups($product);
    $groups      = $specs['groups'];
    $has_specs   = $specs['key'] || $groups;
    $has_reviews = comments_open() && wc_review_ratings_enabled();
    ?>
    <div class="pdp-sections">
        <nav class="pdp-subnav" aria-label="<?php esc_attr_e('Product sections', 'dawp'); ?>">
            <a href="#pdp-details"><?php esc_html_e('Details', 'dawp'); ?></a>
            <?php if ($has_specs) : ?><a href="#pdp-specs"><?php esc_html_e('Specifications', 'dawp'); ?></a><?php endif; ?>
            <a href="#pdp-quality"><?php esc_html_e('Quality', 'dawp'); ?></a>
            <a href="#pdp-shipping"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
            <?php if ($has_reviews) : ?><a href="#pdp-reviews"><?php esc_html_e('Reviews', 'dawp'); ?></a><?php endif; ?>
        </nav>

        <section class="pdp-section pdp-details" id="pdp-details">
            <header class="pdp-section__head">
                <p class="pdp-eyebrow"><?php esc_html_e('The Timepiece', 'dawp'); ?></p>
                <h2><?php esc_html_e('Product Details', 'dawp'); ?></h2>
            </header>
            <div class="pdp-details__body">
                <div class="pdp-details__content is-collapsed" data-pdp-collapse>
                    <?php the_content(); ?>
                </div>
                <button type="button" class="pdp-details__toggle" data-pdp-toggle aria-expanded="false" hidden>
                    <span data-more><?php esc_html_e('Show More', 'dawp'); ?></span>
                    <span data-less hidden><?php esc_html_e('Show Less', 'dawp'); ?></span>
                </button>
            </div>
        </section>

        <?php if ($has_specs) : ?>
            <section class="pdp-section pdp-specs" id="pdp-specs">
                <header class="pdp-section__head">
                    <p class="pdp-eyebrow"><?php esc_html_e('Technical Data', 'dawp'); ?></p>
                    <h2><?php esc_html_e('Specifications', 'dawp'); ?></h2>
                </header>
                <div class="pdp-specs__body">
                <?php if ($specs['key']) : ?>
                    <dl class="pdp-specs__key">
                        <?php foreach ($specs['key'] as $row) : ?>
                            <div>
                                <dt><?php echo esc_html($row[0]); ?></dt>
                                <dd><?php echo esc_html($row[1]); ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                <?php endif; ?>
                <?php if ($groups) : ?>
                    <details class="pdp-specs__more"<?php echo $specs['key'] ? '' : ' open'; ?>>
                        <summary>
                            <span data-more><?php esc_html_e('View All Specifications', 'dawp'); ?></span>
                            <span data-less><?php esc_html_e('Hide Specifications', 'dawp'); ?></span>
                        </summary>
                        <div class="pdp-specs__grid">
                            <?php foreach ($groups as $group) : ?>
                                <div class="pdp-specs__group">
                                    <h3><?php echo esc_html($group['title']); ?></h3>
                                    <dl>
                                        <?php foreach ($group['rows'] as $label => $value) : ?>
                                            <div>
                                                <dt><?php echo esc_html($label); ?></dt>
                                                <dd><?php echo esc_html($value); ?></dd>
                                            </div>
                                        <?php endforeach; ?>
                                    </dl>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </details>
                <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php dawp_pdp_quality(); ?>
        <?php dawp_pdp_shipping(); ?>

        <?php if ($has_reviews) : ?>
            <section class="pdp-section pdp-reviews" id="pdp-reviews">
                <header class="pdp-section__head">
                    <p class="pdp-eyebrow"><?php esc_html_e('Customer Reviews', 'dawp'); ?></p>
                    <h2><?php esc_html_e('What People Are Saying', 'dawp'); ?></h2>
                </header>
                <div class="pdp-reviews__body">
                    <?php royalstyled_display_product_reviews(); ?>
                    <?php comments_template(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Review summary + list (chronelshop design), fed by the product's approved
 * WooCommerce reviews. Renders nothing until the product has a review, so
 * Woo's own empty state shows instead.
 */
function dawp_pdp_review_block() {
    global $product;
    if (!$product || !$product->get_review_count()) {
        return;
    }
    $reviews = get_comments([
        'post_id' => $product->get_id(),
        'status'  => 'approve',
        'type'    => 'review',
    ]);
    if (!$reviews) {
        return;
    }
    $average = (float) $product->get_average_rating();
    $count   = (int) $product->get_review_count();
    $stars   = function ($rating) {
        return '<span class="star-rating" role="img" aria-label="' . esc_attr(sprintf(__('Rated %s out of 5', 'dawp'), round($rating, 1))) . '">'
            . '<span style="width:' . ($rating * 20) . '%"></span></span>';
    };
    ?>
    <div class="pdp-review-summary">
        <strong class="pdp-review-summary__score"><?php echo esc_html(number_format($average, 1)); ?></strong>
        <div>
            <?php echo $stars($average); ?>
            <p><?php printf(esc_html(_n('Based on %d review', 'Based on %d reviews', $count, 'dawp')), $count); ?></p>
        </div>
    </div>
    <ol class="pdp-review-list">
        <?php foreach ($reviews as $review) : ?>
            <?php $rating = (float) get_comment_meta($review->comment_ID, 'rating', true); ?>
            <li class="pdp-review">
                <header class="pdp-review__head">
                    <span class="pdp-review__avatar" aria-hidden="true"><?php echo esc_html(strtoupper(mb_substr($review->comment_author, 0, 1))); ?></span>
                    <div>
                        <strong class="pdp-review__author"><?php echo esc_html($review->comment_author); ?></strong>
                        <time datetime="<?php echo esc_attr(get_comment_date('Y-m-d', $review)); ?>"><?php echo esc_html(get_comment_date('F j, Y', $review)); ?></time>
                    </div>
                    <?php if ($rating) echo $stars($rating); ?>
                </header>
                <p class="pdp-review__text"><?php echo esc_html(wp_strip_all_tags($review->comment_content)); ?></p>
            </li>
        <?php endforeach; ?>
    </ol>
    <?php
}

add_filter('woocommerce_product_review_comment_form_args', function ($args) {
    $args['title_reply'] = __('Write a Review', 'dawp');
    return $args;
});

function dawp_pdp_quality() {
    $points = [
        [
            __('Checked Before Packing', 'dawp'),
            __('Every watch is unboxed and inspected before it ships, so problems are caught here rather than on your wrist.', 'dawp'),
        ],
        [
            __('Timekeeping & Function', 'dawp'),
            __('We check that the movement runs, the crown sets time and date, and the clasp or buckle closes securely.', 'dawp'),
        ],
        [
            __('Covered on Arrival', 'dawp'),
            __('If a fault shows up within 30 days of delivery, we cover return shipping and send a replacement or a full refund.', 'dawp'),
        ],
    ];
    $icons = [
        'finish'   => '<path d="M12 3l2.6 5.3 5.9.9-4.3 4.1 1 5.8L12 16.4 6.8 19.1l1-5.8L3.5 9.2l5.9-.9z"/>',
        'movement' => '<circle cx="12" cy="12" r="8"/><path d="M12 7v5l3 2"/>',
        'pack'     => '<path d="M3 7l9-4 9 4v10l-9 4-9-4z"/><path d="M3 7l9 4 9-4M12 11v10"/>',
        'trust'    => '<path d="M12 3l8 3v6c0 4.5-3.4 8.3-8 9-4.6-.7-8-4.5-8-9V6z"/><path d="M8.5 12l2.5 2.5 4.5-5"/>',
    ];
    $checks = [
        [
            'icon'  => 'finish',
            'title' => __('Case, Dial & Finish', 'dawp'),
            'items' => [
                __('Crystal, dial and hands free of scratches, dust and marks', 'dawp'),
                __('Bezel, crown and case finish checked against the listing photos', 'dawp'),
            ],
        ],
        [
            'icon'  => 'movement',
            'title' => __('Movement', 'dawp'),
            'items' => [
                __('Movement running and keeping time', 'dawp'),
                __('Crown winds and sets time and date smoothly', 'dawp'),
            ],
        ],
        [
            'icon'  => 'pack',
            'title' => __('Strap & Packaging', 'dawp'),
            'items' => [
                __('Strap or bracelet, clasp and spare links checked', 'dawp'),
                __('Packed in its box with papers and padding for transit', 'dawp'),
            ],
        ],
        [
            'icon'  => 'trust',
            'title' => __('Buyer Protection', 'dawp'),
            'items' => [
                __('30-day returns on unworn watches', 'dawp'),
                __('Secure, encrypted checkout and tracked delivery', 'dawp'),
            ],
        ],
    ];
    ?>
    <section class="pdp-section pdp-quality" id="pdp-quality">
        <header class="pdp-section__head">
            <p class="pdp-eyebrow"><?php esc_html_e('Quality Check', 'dawp'); ?></p>
            <h2><?php esc_html_e('Inspected Before It Ships', 'dawp'); ?></h2>
        </header>
        <ol class="pdp-points">
            <?php foreach ($points as $point) : ?>
                <li>
                    <h3><?php echo esc_html($point[0]); ?></h3>
                    <p><?php echo esc_html($point[1]); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
        <div class="pdp-quality-check">
            <h3 class="pdp-quality-check__title"><?php esc_html_e('What We Check', 'dawp'); ?></h3>
            <div class="quality-check-grid">
                <?php foreach ($checks as $check) : ?>
                    <div class="quality-check-item">
                        <div class="quality-check-item__head">
                            <span class="quality-check-item__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?php echo $icons[$check['icon']]; // phpcs:ignore WordPress.Security.EscapeOutput -- static SVG ?></svg>
                            </span>
                            <h4><?php echo esc_html($check['title']); ?></h4>
                        </div>
                        <ul>
                            <?php foreach ($check['items'] as $item) : ?>
                                <li><?php echo esc_html($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function dawp_pdp_shipping() {
    $steps = [
        [
            __('3-5 business days', 'dawp'),
            __('Assembly & Testing', 'dawp'),
            __('After you order, your watch is assembled by hand and tested before it is handed to the carrier. This is why it takes a few days before it ships.', 'dawp'),
        ],
        [
            __('Free, tracked', 'dawp'),
            __('Ships from Hong Kong', 'dawp'),
            __('Your order ships from Hong Kong at no cost to you. A tracking link is emailed as soon as the parcel leaves.', 'dawp'),
        ],
        [
            __('10-15 business days', 'dawp'),
            __('Customs & Delivery', 'dawp'),
            __('Customs checks on international parcels are now stricter, so clearance takes longer than it used to. Tracking can pause for a few days at this stage. That is normal, and your parcel is still on its way.', 'dawp'),
        ],
    ];
    ?>
    <section class="pdp-section pdp-shipping" id="pdp-shipping">
        <header class="pdp-section__head">
            <p class="pdp-eyebrow"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></p>
            <h2><?php esc_html_e('Free Shipping on Every Order', 'dawp'); ?></h2>
        </header>
        <div class="pdp-shipping__body">
            <ol class="pdp-steps">
                <?php foreach ($steps as $step) : ?>
                    <li>
                        <span class="pdp-steps__time"><?php echo esc_html($step[0]); ?></span>
                        <h3><?php echo esc_html($step[1]); ?></h3>
                        <p><?php echo esc_html($step[2]); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
            <div class="pdp-returns">
                <h3><?php esc_html_e('30-Day Returns', 'dawp'); ?></h3>
                <ul>
                    <li><?php esc_html_e('Return an unworn watch with its box and papers within 30 days of delivery.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Defective, damaged or incorrect items get a prepaid return label.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Approved refunds are issued within 7 business days of inspection.', 'dawp'); ?></li>
                </ul>
                <p>
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                    <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></a>
                </p>
            </div>
        </div>
    </section>
    <?php
}

function dawp_pdp_promise() {
    $items = [
        [__('Free Shipping', 'dawp'), __('Free tracked shipping on every order, no minimum.', 'dawp')],
        [__('Inspected Before Shipping', 'dawp'), __('Every watch is checked for timekeeping, function and finish.', 'dawp')],
        [__('30-Day Returns', 'dawp'), __('Return an unworn watch within 30 days of delivery.', 'dawp')],
        [__('Secure Checkout', 'dawp'), __('SSL-encrypted checkout with PCI-DSS certified gateways.', 'dawp')],
    ];
    ?>
    <section class="pdp-promise" aria-label="<?php esc_attr_e('The RoyalStyled promise', 'dawp'); ?>">
        <p class="pdp-eyebrow"><?php esc_html_e('The RoyalStyled Promise', 'dawp'); ?></p>
        <h2><?php esc_html_e('Bought with Confidence', 'dawp'); ?></h2>
        <ul>
            <?php foreach ($items as $item) : ?>
                <li>
                    <strong><?php echo esc_html($item[0]); ?></strong>
                    <span><?php echo esc_html($item[1]); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <?php
}
