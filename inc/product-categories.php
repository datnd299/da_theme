<?php
/**
 * Product category defaults for ProudlyWear.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        't-shirts' => [
            'name'        => __('T-Shirts', 'dawp'),
            'description' => __('Veteran and military family t-shirts in soft cotton, printed to order with original patriotic designs.', 'dawp'),
            'short'       => __('Soft cotton tees with bold patriotic prints.', 'dawp'),
        ],
        'hoodies' => [
            'name'        => __('Hoodies & Zip-Ups', 'dawp'),
            'description' => __('Pullover and zip-up hoodies for veterans and their families — warm, comfortable and printed to order.', 'dawp'),
            'short'       => __('Warm pullover and zip-up hoodies.', 'dawp'),
        ],
        'sweatshirts' => [
            'name'        => __('Sweatshirts', 'dawp'),
            'description' => __('Classic crewneck sweatshirts with veteran and patriotic designs, printed to order.', 'dawp'),
            'short'       => __('Classic crewnecks with a vintage feel.', 'dawp'),
        ],
        'polo-shirts' => [
            'name'        => __('Polo Shirts', 'dawp'),
            'description' => __('Veteran polo shirts that look sharp at reunions, ceremonies and everyday outings.', 'dawp'),
            'short'       => __('Sharp polos for reunions and everyday wear.', 'dawp'),
        ],
        'hawaiian-shirts' => [
            'name'        => __('Hawaiian Shirts', 'dawp'),
            'description' => __('Button-up Hawaiian shirts with veteran, branch and patriotic all-over prints, made to order.', 'dawp'),
            'short'       => __('All-over print button-ups for every branch.', 'dawp'),
        ],
        'bomber-jackets' => [
            'name'        => __('Bomber Jackets', 'dawp'),
            'description' => __('Flight-jacket style bomber jackets with veteran designs, made to order.', 'dawp'),
            'short'       => __('Flight-jacket style, made to order.', 'dawp'),
        ],
        'caps' => [
            'name'        => __('Hats & Caps', 'dawp'),
            'description' => __('Veteran caps and hats with embroidered or printed designs for every branch and era.', 'dawp'),
            'short'       => __('Embroidered and printed veteran caps.', 'dawp'),
        ],
        'flags' => [
            'name'        => __('Flags', 'dawp'),
            'description' => __('Garden and house flags with patriotic and veteran designs for the porch, yard or den.', 'dawp'),
            'short'       => __('Garden and house flags for the porch.', 'dawp'),
        ],
        'metal-signs' => [
            'name'        => __('Metal Signs', 'dawp'),
            'description' => __('Printed metal signs with veteran and patriotic designs for the den, garage or man cave.', 'dawp'),
            'short'       => __('Tin signs for the den or garage.', 'dawp'),
        ],
        'jackets-vests' => [
            'name'        => __('Leather Jackets & Vests', 'dawp'),
            'description' => __('Leather jackets and motorcycle vests with veteran and branch designs, made to order.', 'dawp'),
            'short'       => __('Leather jackets and motor vests.', 'dawp'),
        ],
        'baseball-jerseys' => [
            'name'        => __('Baseball Jerseys', 'dawp'),
            'description' => __('Button-up baseball jerseys with veteran and branch designs, printed to order.', 'dawp'),
            'short'       => __('Button-up jerseys for game day.', 'dawp'),
        ],
        'phone-cases' => [
            'name'        => __('Phone Cases', 'dawp'),
            'description' => __('Phone cases with veteran and branch designs, printed to order for popular phone models.', 'dawp'),
            'short'       => __('Veteran designs for your phone.', 'dawp'),
        ],
        'home-decor' => [
            'name'        => __('Home Decor', 'dawp'),
            'description' => __('Bedding sets, canvas prints, doormats and ornaments with veteran and patriotic designs.', 'dawp'),
            'short'       => __('Bedding, canvas, doormats and ornaments.', 'dawp'),
        ],
        'drinkware' => [
            'name'        => __('Mugs & Tumblers', 'dawp'),
            'description' => __('Coffee mugs and insulated tumblers with veteran and branch designs, printed to order.', 'dawp'),
            'short'       => __('Mugs and tumblers for every branch.', 'dawp'),
        ],
        'accessories' => [
            'name'        => __('Gifts & Accessories', 'dawp'),
            'description' => __('Dog tags, necklaces, decals, car seat covers and other veteran gifts, made to order.', 'dawp'),
            'short'       => __('Dog tags, decals and veteran gifts.', 'dawp'),
        ],
    ];
}

/**
 * Main product-type categories (slug => label) — shared by the header "Products" menu and the shop category nav.
 */
function dawp_main_product_categories() {
    return [
        't-shirts'       => __('T-Shirts', 'dawp'),
        'hoodies'        => __('Hoodies & Zip-Ups', 'dawp'),
        'sweatshirts'    => __('Sweatshirts', 'dawp'),
        'polo-shirts'     => __('Polo Shirts', 'dawp'),
        'hawaiian-shirts' => __('Hawaiian Shirts', 'dawp'),
        'bomber-jackets'  => __('Bomber Jackets', 'dawp'),
        'caps'           => __('Hats & Caps', 'dawp'),
        'flags'          => __('Flags', 'dawp'),
        'metal-signs'    => __('Metal Signs', 'dawp'),
        'phone-cases'    => __('Phone Cases', 'dawp'),
    ];
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
}
