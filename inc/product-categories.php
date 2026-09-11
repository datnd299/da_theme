<?php
/**
 * Product category defaults for Reluxwatches — The Voyager, The Odyssey, The Eternal.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'voyager' => [
            'name'        => __('The Voyager', 'dawp'),
            'description' => __('The Voyager collection pairs rugged automatic movements with travel-ready details: GMT-inspired dials, durable stainless steel cases and exhibition casebacks built for pieces that go everywhere with you.', 'dawp'),
            'short'       => __('Automatic watches built for the journey.', 'dawp'),
            'image'       => '',
        ],
        'odyssey' => [
            'name'        => __('The Odyssey', 'dawp'),
            'description' => __('The Odyssey collection is Relux\'s everyday automatic lineup: balanced proportions, sunburst dials and versatile finishes that move easily from the office to the evening.', 'dawp'),
            'short'       => __('The everyday automatic, refined for every chapter.', 'dawp'),
            'image'       => '',
        ],
        'eternal' => [
            'name'        => __('The Eternal', 'dawp'),
            'description' => __('The Eternal collection is Relux at its most timeless: slim automatic cases, minimal dials and heirloom-grade finishing designed to be worn, and handed down, for a lifetime.', 'dawp'),
            'short'       => __('Timeless craftsmanship, made to endure.', 'dawp'),
            'image'       => '',
        ],
    ];
}

function dawp_lbq_retired_product_category_slugs() {
    return [
        'home-essentials',
        'furniture',
        'home-improvement',
        'home-garden-tools',
        'smart-home',
        'kitchen-dining',
        'outdoor-garden',
        'garden-tools',
        'beauty-personal-care',
        'personal-care',
        'school-office-art-supplies',
        'office-and-school-supplies',
        'pets',
    ];
}

function dawp_lbq_product_category_slug_aliases() {
    return [
        'watches'      => 'voyager',
        'new-arrivals' => 'voyager',
        'sport'        => 'voyager',
        'minimal'      => 'eternal',
        'accessories'  => 'eternal',
        'statement'    => 'odyssey',
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

    dawp_migrate_lbq_product_category_slugs();

    foreach (dawp_lbq_product_categories() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');
        $term_id = 0;

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

            $term_id = (int) $created['term_id'];
        } else {
            $term_id = (int) $term->term_id;

            wp_update_term(
                $term_id,
                'product_cat',
                [
                    'name'        => $category['name'],
                    'slug'        => $slug,
                    'description' => $category['description'],
                ]
            );
        }

        update_term_meta($term_id, 'dawp_category_card_copy', $category['short']);
        dawp_update_lbq_product_category_thumbnail($term_id, $category);
    }

    $home_term = get_term_by('slug', 'voyager', 'product_cat');
    if ($home_term && !is_wp_error($home_term)) {
        update_option('default_product_cat', (int) $home_term->term_id);
    }

    dawp_remove_non_lbq_product_categories();
}

function dawp_update_lbq_product_category_thumbnail($term_id, $category) {
    if (empty($category['image'])) {
        return;
    }

    $attachment_id = dawp_lbq_category_image_attachment_id($category['image']);

    if ($attachment_id) {
        update_term_meta((int) $term_id, 'thumbnail_id', $attachment_id);
    }
}

function dawp_lbq_category_image_attachment_id($filename) {
    $basename = basename($filename);
    $existing = get_posts([
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_query'     => [
            [
                'key'     => '_wp_attached_file',
                'value'   => $basename,
                'compare' => 'LIKE',
            ],
        ],
    ]);

    if (!empty($existing[0])) {
        return (int) $existing[0];
    }

    $source = get_template_directory() . '/assets/img/New_homepage/' . $filename;

    if (!file_exists($source) || !is_readable($source)) {
        return 0;
    }

    $upload = wp_upload_bits($basename, null, file_get_contents($source));

    if (!empty($upload['error']) || empty($upload['file'])) {
        return 0;
    }

    $filetype = wp_check_filetype($upload['file']);
    $attachment_id = wp_insert_attachment(
        [
            'post_mime_type' => $filetype['type'],
            'post_title'     => sanitize_file_name(pathinfo($basename, PATHINFO_FILENAME)),
            'post_content'   => '',
            'post_status'    => 'inherit',
        ],
        $upload['file']
    );

    if (is_wp_error($attachment_id) || !$attachment_id) {
        return 0;
    }

    require_once ABSPATH . 'wp-admin/includes/image.php';

    $metadata = wp_generate_attachment_metadata((int) $attachment_id, $upload['file']);
    wp_update_attachment_metadata((int) $attachment_id, $metadata);

    return (int) $attachment_id;
}

function dawp_migrate_lbq_product_category_slugs() {
    foreach (dawp_lbq_product_category_slug_aliases() as $old_slug => $new_slug) {
        $old_term = get_term_by('slug', $old_slug, 'product_cat');

        if (!$old_term || is_wp_error($old_term)) {
            continue;
        }

        $new_term = get_term_by('slug', $new_slug, 'product_cat');

        if (!$new_term || is_wp_error($new_term)) {
            wp_update_term((int) $old_term->term_id, 'product_cat', ['slug' => $new_slug]);
            continue;
        }

        $product_ids = get_posts([
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'tax_query'      => [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => (int) $old_term->term_id,
                ],
            ],
        ]);

        foreach ($product_ids as $product_id) {
            wp_set_object_terms((int) $product_id, (int) $new_term->term_id, 'product_cat', true);
        }
    }
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
