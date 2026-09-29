<?php
/**
 * Product category defaults for Crowdfused.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'auto-tires' => [
            'name'        => __('Auto & Tires', 'dawp'),
            'description' => __('Road-ready vehicle accessories, tire care and practical tools for everyday drives.', 'dawp'),
            'short'       => __('Vehicle accessories, tire care and useful road-ready tools.', 'dawp'),
            'image'       => 'car_tire.jpg',
        ],
        'electronics' => [
            'name'        => __('Electronics', 'dawp'),
            'description' => __('Everyday electronics, connected devices and practical tech for modern homes.', 'dawp'),
            'short'       => __('Connected devices and everyday tech for modern living.', 'dawp'),
            'image'       => 'Smart_home_connected_devices_202607281526.jpeg',
        ],
        'home-improvement-essentials' => [
            'name'        => __('Home Improvement Essentials', 'dawp'),
            'description' => __('Practical tools, fixtures and upgrades that make home projects simpler.', 'dawp'),
            'short'       => __('Tools, fixtures and practical upgrades for easier home projects.', 'dawp'),
            'image'       => 'Home_improvement.jpg',
        ],
        'home-furniture-appliances' => [
            'name'        => __('Home, Furniture & Appliances', 'dawp'),
            'description' => __('Furniture, home essentials and appliances that make daily spaces easier to live in.', 'dawp'),
            'short'       => __('Furniture, appliances and useful pieces for comfortable home living.', 'dawp'),
            'image'       => 'Living_room_minimalist_design_ph…_202607281539.jpeg',
        ],
        'patio-garden' => [
            'name'        => __('Patio & Garden', 'dawp'),
            'description' => __('Garden gear, patio accents and outdoor care essentials for better open-air spaces.', 'dawp'),
            'short'       => __('Garden gear, patio accents and outdoor care essentials.', 'dawp'),
            'image'       => 'Garden_tools_outdoor_care_planting_202608020050.jpeg',
        ],
        'seasonal-decor' => [
            'name'        => __('Seasonal Decor', 'dawp'),
            'description' => __('Decor, accents and timely updates that help your home match the season.', 'dawp'),
            'short'       => __('Decor and accents for seasonal home updates.', 'dawp'),
            'image'       => 'Patio_picks_for_outdoor_living_202608020057.jpg',
        ],
        'sports-outdoors' => [
            'name'        => __('Sports & Outdoors', 'dawp'),
            'description' => __('Sports gear and outdoor essentials built for recreation, training and time outside.', 'dawp'),
            'short'       => __('Sports gear and outdoor essentials for active days.', 'dawp'),
            'image'       => 'Outdoor&Adventure.jpeg',
        ],
        'toys-outdoor-play' => [
            'name'        => __('Toys & Outdoor Play', 'dawp'),
            'description' => __('Playtime favorites and outdoor activity picks for kids, families and backyards.', 'dawp'),
            'short'       => __('Toys and outdoor activity picks for playful days.', 'dawp'),
            'image'       => 'Patio_garden_handy_tools_202607281516.jpeg',
        ],
        'toys' => [
            'name'        => __('Toys', 'dawp'),
            'description' => __('Fun, giftable toys and play essentials for everyday imagination.', 'dawp'),
            'short'       => __('Giftable toys and play essentials for everyday fun.', 'dawp'),
            'image'       => 'Kitchen_Home_Innovation_Smart_Tools_202607281513.jpeg',
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
        'home'                       => 'home-furniture-appliances',
        'home-essentials'            => 'home-furniture-appliances',
        'furniture'                  => 'home-furniture-appliances',
        'home-improvement'           => 'home-improvement-essentials',
        'smart-home'                 => 'electronics',
        'kitchen-dining'             => 'home-furniture-appliances',
        'outdoor-garden'             => 'patio-garden',
        'garden-tools'               => 'patio-garden',
        'home-garden-tools'          => 'patio-garden',
        'beauty-personal-care'       => 'seasonal-decor',
        'personal-care'              => 'seasonal-decor',
        'school-office-art-supplies' => 'home-improvement-essentials',
        'office-and-school-supplies' => 'home-improvement-essentials',
        'pets'                       => 'home-furniture-appliances',
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
