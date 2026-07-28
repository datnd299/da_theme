<?php
/**
 * Product category defaults for Imartmy.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'home' => [
            'name'        => __('Utama', 'dawp'),
            'description' => __('Utama essentials, furniture, kitchen favorites and practical pieces for everyday living.', 'dawp'),
            'short'       => __('Keperluan harian dan pilihan rumah selesa.', 'dawp'),
        ],
        'garden-tools' => [
            'name'        => __('Taman & Peralatan', 'dawp'),
            'description' => __('Peralatan taman, patio dan projek rumah.', 'dawp'),
            'short'       => __('Kelengkapan taman, patio dan alat berguna.', 'dawp'),
        ],
        'electronics' => [
            'name'        => __('Elektronik', 'dawp'),
            'description' => __('TV, audio, aksesori komputer dan peranti rumah yang praktikal.', 'dawp'),
            'short'       => __('Keperluan audio, hiburan dan teknologi rumah.', 'dawp'),
        ],
        'sports-outdoors' => [
            'name'        => __('Sukan & Aktiviti Luar', 'dawp'),
            'description' => __('Produk sukan, kecergasan, rekreasi dan aktiviti luar.', 'dawp'),
            'short'       => __('Kelengkapan kecergasan, rekreasi dan aktiviti luar.', 'dawp'),
        ],
        'toys-outdoor-play' => [
            'name'        => __('Mainan & Permainan Luar', 'dawp'),
            'description' => __('Mainan, permainan dan produk aktiviti luar untuk kanak-kanak serta keluarga.', 'dawp'),
            'short'       => __('Pilihan mainan, permainan dan aktiviti luar.', 'dawp'),
        ],
        'beauty-personal-care' => [
            'name'        => __('Kecantikan & Penjagaan Diri', 'dawp'),
            'description' => __('Produk kecantikan, dandanan dan penjagaan diri untuk rutin harian.', 'dawp'),
            'short'       => __('Keperluan kecantikan, dandanan dan penjagaan diri.', 'dawp'),
        ],
        'pets' => [
            'name'        => __('Haiwan Peliharaan', 'dawp'),
            'description' => __('Makanan, penjagaan, mainan, katil dan bekalan harian haiwan peliharaan.', 'dawp'),
            'short'       => __('Penjagaan, keselesaan dan bekalan harian haiwan peliharaan.', 'dawp'),
        ],
        'school-office-art-supplies' => [
            'name'        => __('Sekolah, Pejabat & Seni', 'dawp'),
            'description' => __('Kelengkapan sekolah, pejabat, alat tulis dan bahan seni.', 'dawp'),
            'short'       => __('Kelengkapan sekolah, pejabat, alat tulis dan seni.', 'dawp'),
        ],
    ];
}

function dawp_lbq_retired_product_category_slugs() {
    return [
        'home-essentials',
        'furniture',
        'smart-home',
        'kitchen-dining',
        'outdoor-garden',
    ];
}

function dawp_lbq_product_category_slugs() {
    return array_keys(dawp_lbq_product_categories());
}

function dawp_is_lbq_product_category_slug($slug) {
    return in_array($slug, dawp_lbq_product_category_slugs(), true);
}

function dawp_lbq_product_category_terms() {
    if (!function_exists('get_term_by') || !taxonomy_exists('product_cat')) {
        return [];
    }

    $terms = [];

    foreach (dawp_lbq_product_category_slugs() as $slug) {
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
        $term = get_term_by('slug', $slug, 'product_cat');

        if (!$term || is_wp_error($term)) {
            $created = wp_insert_term(
                $category['name'],
                'product_cat',
                [
                    'slug'        => $slug,
                    'description' => $category['description'],
                ]
            );

            if (is_wp_error($created) || empty($created['term_id'])) {
                continue;
            }

            update_term_meta((int) $created['term_id'], 'dawp_category_card_copy', $category['short']);
            continue;
        }

        if (empty($term->description)) {
            wp_update_term(
                (int) $term->term_id,
                'product_cat',
                [
                    'description' => $category['description'],
                ]
            );
        }

        update_term_meta((int) $term->term_id, 'dawp_category_card_copy', $category['short']);
    }

    $home_term = get_term_by('slug', 'home', 'product_cat');
    if ($home_term && !is_wp_error($home_term)) {
        update_option('default_product_cat', (int) $home_term->term_id);
    }

    dawp_remove_non_lbq_product_categories();
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
