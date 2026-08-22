<?php
/**
 * Product category defaults for the watch store.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'rolex-watches' => [
            'name'        => __('Rolex Watches', 'dawp'),
            'description' => __('The world\'s most recognized name in fine watchmaking, prized for its Oyster case, in-house calibers and enduring value.', 'dawp'),
            'short'       => __('Iconic Oyster cases and enduring in-house calibers.', 'dawp'),
            'image'       => 'rolex-submariner.webp',
            'children'    => [
                'rolex-datejust'         => ['name' => __('Rolex Datejust', 'dawp'), 'image' => 'rolex-datejust.webp'],
                'rolex-daytona'          => ['name' => __('Rolex Daytona', 'dawp'), 'image' => 'rolex-daytona.webp'],
                'rolex-day-date'         => ['name' => __('Rolex Day-Date', 'dawp'), 'image' => 'rolex-day-date.webp'],
                'rolex-gmt-master'       => ['name' => __('Rolex GMT-Master', 'dawp'), 'image' => 'rolex-gmt-master.jpg'],
                'rolex-sky-dweller'      => ['name' => __('Rolex Sky-Dweller', 'dawp'), 'image' => 'rolex-sky-dweller.jpg'],
                'rolex-submariner'       => ['name' => __('Rolex Submariner', 'dawp'), 'image' => 'rolex-submariner.webp'],
                'rolex-oyster-perpetual' => ['name' => __('Rolex Oyster Perpetual', 'dawp'), 'image' => 'rolex-oyster-perpetual.jpg'],
                'rolex-milgauss'         => ['name' => __('Rolex Milgauss', 'dawp'), 'image' => 'rolex-milgauss.jpg'],
                'rolex-air-king'         => ['name' => __('Rolex Air-King', 'dawp'), 'image' => 'rolex-air-king.webp'],
                'rolex-explorer'         => ['name' => __('Rolex Explorer', 'dawp'), 'image' => 'rolex-explorer.jpg'],
                'rolex-cellini'          => ['name' => __('Rolex Cellini', 'dawp'), 'image' => 'rolex-cellini.jpg'],
                'rolex-sea-dweller'      => ['name' => __('Rolex Sea-Dweller', 'dawp'), 'image' => 'rolex-sea-dweller.jpg'],
                'rolex-land-dweller'     => ['name' => __('Rolex Land-Dweller', 'dawp'), 'image' => 'rolex-land-dweller.jpg'],
            ],
        ],
        'patek-philippe' => [
            'name'        => __('Patek Philippe', 'dawp'),
            'description' => __('Generational watchmaking defined by hand-finished movements and quietly confident design.', 'dawp'),
            'short'       => __('Generational craft and quietly confident design.', 'dawp'),
            'image'       => 'patek-philippe-nautilus.jpg',
            'children'    => [
                'patek-philippe-nautilus'       => ['name' => __('Patek Philippe Nautilus', 'dawp'), 'image' => 'patek-philippe-nautilus.jpg'],
                'patek-philippe-aquanaut'       => ['name' => __('Patek Philippe Aquanaut', 'dawp'), 'image' => 'patek-philippe-aquanaut.webp'],
                'patek-philippe-calatrava'      => ['name' => __('Patek Philippe Calatrava', 'dawp'), 'image' => 'patek-philippe-calatrava.webp'],
                'patek-philippe-complications'  => ['name' => __('Patek Philippe Complications', 'dawp'), 'image' => 'patek-philippe-complications.webp'],
            ],
        ],
        'audemars-piguet' => [
            'name'        => __('Audemars Piguet', 'dawp'),
            'description' => __('Bold octagonal bezels and the tapisserie dial that redefined luxury sports watches.', 'dawp'),
            'short'       => __('The octagonal bezel that redefined sports luxury.', 'dawp'),
            'image'       => 'ap-royal-oak-offshore.png',
            'children'    => [
                'audemars-piguet-royal-oak' => ['name' => __('Audemars Piguet Royal Oak', 'dawp'), 'image' => 'ap-royal-oak-jumbo.jpg'],
                'ap-royal-oak-offshore'     => ['name' => __('AP Royal Oak Offshore', 'dawp'), 'image' => 'ap-royal-oak-offshore.png'],
                'ap-royal-oak-tourbillon'   => ['name' => __('AP Royal Oak Tourbillon', 'dawp'), 'image' => 'ap-royal-oak-tourbillon.jpg'],
            ],
        ],
        'omega-watches' => [
            'name'        => __('Omega Watches', 'dawp'),
            'description' => __('Precision instruments trusted on the moon and at the Olympics, built for daily reliability.', 'dawp'),
            'short'       => __('Precision instruments trusted since the moon landing.', 'dawp'),
            'image'       => 'omega-seamaster.webp',
            'children'    => [
                'omega-seamaster'     => ['name' => __('Omega Seamaster', 'dawp'), 'image' => 'omega-seamaster.webp'],
                'omega-de-ville'      => ['name' => __('Omega De Ville', 'dawp'), 'image' => 'omega-de-ville.webp'],
                'omega-constellation' => ['name' => __('Omega Constellation', 'dawp'), 'image' => 'omega-constellation.webp'],
                'omega-speedmaster'   => ['name' => __('Omega Speedmaster', 'dawp'), 'image' => 'omega-speedmaster.jpg'],
            ],
        ],
        'richard-mille' => [
            'name'        => __('Richard Mille', 'dawp'),
            'description' => __('Ultra-light skeletonized movements engineered with motorsport-grade materials.', 'dawp'),
            'short'       => __('Skeletonized movements in motorsport-grade materials.', 'dawp'),
            'image'       => 'richard-mille-rm055.jpg',
            'children'    => [
                'richard-mille-rm011' => ['name' => __('Richard Mille RM 011', 'dawp'), 'image' => 'richard-mille-rm011.webp'],
                'richard-mille-rm027' => ['name' => __('Richard Mille RM 027', 'dawp'), 'image' => 'richard-mille-rm027.webp'],
                'richard-mille-rm035' => ['name' => __('Richard Mille RM 035', 'dawp'), 'image' => 'richard-mille-rm035.webp'],
                'richard-mille-rm052' => ['name' => __('Richard Mille RM 052', 'dawp'), 'image' => 'richard-mille-rm052.webp'],
                'richard-mille-rm055' => ['name' => __('Richard Mille RM 055', 'dawp'), 'image' => 'richard-mille-rm055.jpg'],
                'richard-mille-rm056' => ['name' => __('Richard Mille RM 056', 'dawp'), 'image' => 'richard-mille-rm056.webp'],
            ],
        ],
        'breitling' => [
            'name'        => __('Breitling', 'dawp'),
            'description' => __('Instrument-grade chronographs built for aviation, diving and everyday precision.', 'dawp'),
            'short'       => __('Instrument-grade chronographs for aviation and diving.', 'dawp'),
            'image'       => 'breitling-navitimer.webp',
            'children'    => [
                'breitling-avenger'      => ['name' => __('Breitling Avenger', 'dawp'), 'image' => 'breitling-avenger.webp'],
                'breitling-navitimer'    => ['name' => __('Breitling Navitimer', 'dawp'), 'image' => 'breitling-navitimer.webp'],
                'breitling-endurance-pro' => ['name' => __('Breitling Endurance Pro', 'dawp'), 'image' => 'breitling-endurance-pro.webp'],
            ],
        ],
        'hublot' => [
            'name'        => __('Hublot', 'dawp'),
            'description' => __('The art of fusion: bold cases pairing ceramic, titanium and rubber with mechanical depth.', 'dawp'),
            'short'       => __('The art of fusion in ceramic, titanium and rubber.', 'dawp'),
            'image'       => 'hublot-big-bang.jpg',
            'children'    => [
                'hublot-big-bang' => ['name' => __('Hublot Big Bang', 'dawp'), 'image' => 'hublot-big-bang.jpg'],
                'hublot-fusion'   => ['name' => __('Hublot Fusion', 'dawp'), 'image' => 'hublot-fusion.webp'],
            ],
        ],
        'tag-heuer' => [
            'name'        => __('Tag Heuer', 'dawp'),
            'description' => __('Swiss motorsport heritage with sharp, legible chronographs built for pace.', 'dawp'),
            'short'       => __('Swiss motorsport heritage, built for pace.', 'dawp'),
            'image'       => 'tag-heuer.jpg',
        ],
        'iced-out-watches' => [
            'name'        => __('Iced Out Watches', 'dawp'),
            'description' => __('Fully set diamond and gem timepieces for maximum statement and shine.', 'dawp'),
            'short'       => __('Fully set diamond timepieces for maximum shine.', 'dawp'),
            'image'       => 'iced-out.webp',
        ],
    ];
}

function dawp_lbq_flatten_categories() {
    $flat = [];

    foreach (dawp_lbq_product_categories() as $slug => $category) {
        $flat[$slug] = [
            'name'        => $category['name'],
            'description' => $category['description'] ?? '',
            'short'       => $category['short'] ?? '',
            'image'       => $category['image'] ?? '',
            'parent'      => '',
        ];

        foreach ($category['children'] ?? [] as $child_slug => $child_data) {
            $child_name = is_array($child_data) ? $child_data['name'] : $child_data;
            $child_image = is_array($child_data) ? ($child_data['image'] ?? '') : '';

            $flat[$child_slug] = [
                'name'        => $child_name,
                'description' => '',
                'short'       => '',
                'image'       => $child_image,
                'parent'      => $slug,
            ];
        }
    }

    return $flat;
}

function dawp_lbq_product_category_slugs() {
    return array_keys(dawp_lbq_flatten_categories());
}

function dawp_is_lbq_product_category_slug($slug) {
    return in_array($slug, dawp_lbq_product_category_slugs(), true);
}

function dawp_lbq_product_category_terms() {
    if (!function_exists('get_term_by') || !taxonomy_exists('product_cat')) {
        return [];
    }

    $terms = [];

    foreach (array_keys(dawp_lbq_product_categories()) as $slug) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $terms[] = $term;
        }
    }

    return $terms;
}

add_action('init', 'dawp_ensure_lbq_product_categories', 30);
function dawp_ensure_lbq_product_categories() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    foreach (dawp_lbq_product_categories() as $slug => $category) {
        $parent_id = dawp_lbq_ensure_term($slug, $category['name'], $category['description'] ?? '', 0);

        if ($parent_id) {
            update_term_meta($parent_id, 'dawp_category_card_copy', $category['short'] ?? '');
            if (!empty($category['image'])) {
                update_term_meta($parent_id, 'dawp_category_image', $category['image']);
            }
        }

        foreach ($category['children'] ?? [] as $child_slug => $child_data) {
            $child_name = is_array($child_data) ? $child_data['name'] : $child_data;
            $child_id = dawp_lbq_ensure_term($child_slug, $child_name, '', $parent_id);

            if ($child_id && is_array($child_data) && !empty($child_data['image'])) {
                update_term_meta($child_id, 'dawp_category_image', $child_data['image']);
            }
        }
    }

    dawp_remove_non_lbq_product_categories();
}

function dawp_lbq_ensure_term($slug, $name, $description, $parent_id) {
    $term = get_term_by('slug', $slug, 'product_cat');

    if (!$term || is_wp_error($term)) {
        $created = wp_insert_term(
            $name,
            'product_cat',
            [
                'slug'        => $slug,
                'description' => $description,
                'parent'      => $parent_id,
            ]
        );

        return is_wp_error($created) || empty($created['term_id']) ? 0 : (int) $created['term_id'];
    }

    $update_args = [];

    if ((int) $term->parent !== (int) $parent_id) {
        $update_args['parent'] = $parent_id;
    }

    if (empty($term->description) && $description) {
        $update_args['description'] = $description;
    }

    if (!empty($update_args)) {
        wp_update_term((int) $term->term_id, 'product_cat', $update_args);
    }

    return (int) $term->term_id;
}

function dawp_remove_non_lbq_product_categories() {
    $allowed_slugs = dawp_lbq_product_category_slugs();
    $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'fields'     => 'all',
    ]);

    if (is_wp_error($terms) || empty($terms)) {
        return;
    }

    foreach ($terms as $term) {
        if (in_array($term->slug, $allowed_slugs, true)) {
            continue;
        }

        wp_delete_term((int) $term->term_id, 'product_cat');
    }
}

function dawp_get_category_image_url($term_id) {
    $image_name = get_term_meta($term_id, 'dawp_category_image', true);

    if (empty($image_name)) {
        return '';
    }

    return get_theme_file_uri('assets/img/categories/' . $image_name);
}
