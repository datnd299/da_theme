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
            'description' => __('The everyday dress watch. Clean enough for a boardroom, easy enough for a Saturday. Hand-assembled in 316L steel around a carefully selected automatic movement.', 'dawp'),
        ],
        'the-abyss' => [
            'name'        => __('The Abyss', 'dawp'),
            'description' => __('The dive watch. Rated for real use in the water, worn just as easily on land. Every gear train hand-finished, for those who look twice at a movement.', 'dawp'),
        ],
        'the-sovereign' => [
            'name'        => __('The Sovereign', 'dawp'),
            'description' => __('The statement piece. Finished entirely by hand in our atelier. Worn for the moments that call for more — built for the room, not just the wrist.', 'dawp'),
        ],
        'the-aviator' => [
            'name'        => __('The Aviator', 'dawp'),
            'description' => __('The pilot\'s watch. Vintage in line, modern in movement. Built for travel and worn just as well at a desk, for those who keep two clocks.', 'dawp'),
        ],
        'limited-editions' => [
            'name'        => __('Limited Editions', 'dawp'),
            'description' => __('Numbered series, produced once. Each piece carries its own serial and is retired when the run closes.', 'dawp'),
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
                __('39mm 316L steel case', 'dawp'),
                __('Sunburst silver dial', 'dawp'),
                __('100m water resistance', 'dawp'),
            ],
        ],
        [
            'slug'      => 'the-abyss',
            'name'      => __('The Abyss', 'dawp'),
            'kicker'    => __('Collection 02', 'dawp'),
            'tagline'   => __('The dive watch', 'dawp'),
            'summary'   => __('Built for the water — a long night dive, a swim off the dock — and worn just as well on land. Finished by hand, gear by gear, for those who notice.', 'dawp'),
            'image'     => 'assets/img/watches/abyss.jpeg',
            'specs'     => [
                __('41mm 316L steel case', 'dawp'),
                __('Unidirectional dive bezel', 'dawp'),
                __('200m water resistance', 'dawp'),
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
                __('40mm gold-finished 316L steel case', 'dawp'),
                __('Day and date display', 'dawp'),
                __('Five-link bracelet', 'dawp'),
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
                __('42mm 316L steel case', 'dawp'),
                __('Second time zone hand', 'dawp'),
                __('Deep blue lacquer dial', 'dawp'),
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
    $target_version = 'chronel-2026-08-collections-v2';

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
