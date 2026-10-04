<?php
/**
 * CHRONEL collections — the four product categories plus their presentation data.
 * See .plans/site.md §2.
 */

defined('ABSPATH') || exit;

function dawp_product_category_definitions() {
    return [
        'the-meridian' => [
            'name'        => __('The Meridian', 'dawp'),
            'description' => __('Everyday dress watches. Clean enough for a boardroom, easy enough for a Saturday. Case size, materials, and movement type are listed on each product page.', 'dawp'),
        ],
        'the-abyss' => [
            'name'        => __('The Abyss', 'dawp'),
            'description' => __('Dive-style watches with rotating bezels and legible dials, worn just as easily on land. Water resistance varies by model and is listed on each product page.', 'dawp'),
        ],
        'the-sovereign' => [
            'name'        => __('The Sovereign', 'dawp'),
            'description' => __('Statement watches. Bolder cases and finishes for the moments that call for more — built for the room, not just the wrist.', 'dawp'),
        ],
        'the-aviator' => [
            'name'        => __('The Aviator', 'dawp'),
            'description' => __('Pilot-style watches. Vintage lines and large, easy-to-read dials. Made for travel and worn just as well at a desk.', 'dawp'),
        ],
        'limited-editions' => [
            'name'        => __('Limited Editions', 'dawp'),
            'description' => __('Limited-availability pieces. Quantities are small; current stock is shown on each product page.', 'dawp'),
        ],
    ];
}

/**
 * Presentation data for the four headline collections.
 * Order here is the order shown across the site.
 */
function dawp_collections() {
    return [
        [
            'slug'      => 'the-meridian',
            'name'      => __('The Meridian', 'dawp'),
            'kicker'    => __('Collection 01', 'dawp'),
            'tagline'   => __('The everyday dress watch', 'dawp'),
            'summary'   => __('Restrained enough for a cuff, easy enough to wear from morning meetings to evening plans. One watch for the whole day.', 'dawp'),
            'image'     => 'assets/img/watches/meridian.jpeg',
            'specs'     => [
                __('Clean, uncluttered dials', 'dawp'),
                __('Everyday case sizes', 'dawp'),
                __('Bracelets and leather straps', 'dawp'),
            ],
        ],
        [
            'slug'      => 'the-abyss',
            'name'      => __('The Abyss', 'dawp'),
            'kicker'    => __('Collection 02', 'dawp'),
            'tagline'   => __('The dive watch', 'dawp'),
            'summary'   => __('Built for the water — a swim off the dock, a day on the boat — and worn just as well on land.', 'dawp'),
            'image'     => 'assets/img/watches/abyss.jpeg',
            'specs'     => [
                __('Rotating dive-style bezels', 'dawp'),
                __('Luminous hands and markers', 'dawp'),
                __('Water resistance listed per model', 'dawp'),
            ],
        ],
        [
            'slug'      => 'the-sovereign',
            'name'      => __('The Sovereign', 'dawp'),
            'kicker'    => __('Collection 03', 'dawp'),
            'tagline'   => __('The statement piece', 'dawp'),
            'summary'   => __('Weight and presence for the day you want to be noticed — a closing, a dinner, an entrance.', 'dawp'),
            'image'     => 'assets/img/watches/sovereign.jpeg',
            'specs'     => [
                __('Gold-tone and two-tone finishes', 'dawp'),
                __('Bold, detailed dials', 'dawp'),
                __('Link bracelets', 'dawp'),
            ],
        ],
        [
            'slug'      => 'the-aviator',
            'name'      => __('The Aviator', 'dawp'),
            'kicker'    => __('Collection 04', 'dawp'),
            'tagline'   => __('The pilot\'s watch', 'dawp'),
            'summary'   => __('A classic silhouette, worn modern — from a layover to a Monday meeting, for those who keep two clocks.', 'dawp'),
            'image'     => 'assets/img/watches/aviator.jpeg',
            'specs'     => [
                __('Large, legible numerals', 'dawp'),
                __('Pilot-style dials', 'dawp'),
                __('Leather and fabric straps', 'dawp'),
            ],
        ],
    ];
}

function dawp_product_category_url($slug) {
    $slug = sanitize_title($slug);

    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            $url = get_term_link($term, 'product_cat');

            if (! is_wp_error($url)) {
                return $url;
            }
        }
    }

    return home_url('/product-category/' . $slug . '/');
}

/**
 * Legacy paths from the previous brand, kept so old links do not 404.
 */
function dawp_product_category_redirects() {
    return [
        'best-sellers'            => 'the-meridian',
        'american-flag-tees'      => 'the-meridian',
        'bomber-jackets'          => 'the-aviator',
        'hats-beanies'            => 'the-meridian',
        'premium-t-shirts'        => 'the-meridian',
        'patches-pins'            => 'limited-editions',
        'america-250'             => 'limited-editions',
        'fathers-day-gifts'       => 'the-sovereign',
        'memorial-day-gifts'      => 'the-sovereign',
        'independence-day-gifts'  => 'the-sovereign',
        'meridian'                => 'the-meridian',
        'abyss'                   => 'the-abyss',
        'sovereign'               => 'the-sovereign',
        'aviator'                 => 'the-aviator',
    ];
}

add_action('template_redirect', 'dawp_redirect_legacy_product_category_links', 1);
function dawp_redirect_legacy_product_category_links() {
    $request_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path    = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && ($request_path === $home_path || strpos($request_path, $home_path . '/') === 0)) {
        $request_path = trim(substr($request_path, strlen($home_path)), '/');
    }

    $redirects = dawp_product_category_redirects();

    if (isset($redirects[$request_path])) {
        wp_safe_redirect(dawp_product_category_url($redirects[$request_path]), 301);
        exit;
    }

    if (preg_match('#^product-category/([^/]+)/?$#', $request_path, $matches)) {
        $legacy_slug = sanitize_title($matches[1]);

        if (isset($redirects[$legacy_slug]) && $redirects[$legacy_slug] !== $legacy_slug) {
            wp_safe_redirect(dawp_product_category_url($redirects[$legacy_slug]), 301);
            exit;
        }
    }
}

function dawp_seed_product_categories() {
    if (! taxonomy_exists('product_cat')) {
        return;
    }

    $seeded_version = get_option('dawp_seeded_product_categories_version');
    $target_version = 'chronel-2026-10-collections-v3';

    if ($seeded_version === $target_version) {
        return;
    }

    foreach (dawp_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (! $term) {
            wp_insert_term($category['name'], 'product_cat', [
                'slug'        => $slug,
                'description' => $category['description'],
            ]);
            continue;
        }

        wp_update_term($term->term_id, 'product_cat', [
            'name'        => $category['name'],
            'description' => $category['description'],
        ]);
    }

    update_option('dawp_seeded_product_categories_version', $target_version, false);
}
add_action('init', 'dawp_seed_product_categories', 20);
