<?php
/**
 * SEO data for Corvelshop virtual pages.
 * Fixes $wp_query state before Rank Math runs and injects title/description via Rank Math filters.
 *
 * @package dawp
 */

function dawp_get_virtual_seo() {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');

    $map = [
        'about-us' => [
            'title'       => "About Us – Corvelshop",
            'description' => "Corvelshop is a modern watch destination offering refined timepieces and watch accessories for everyday confidence.",
        ],
        'faq' => [
            'title'       => "FAQ – Corvelshop",
            'description' => "Find answers to common questions about orders, shipping, returns, refunds, watch details, and support at Corvelshop.",
        ],
        'contact-us' => [
            'title'       => "Contact Us – Corvelshop",
            'description' => "Contact Corvelshop for help with orders, returns, or product inquiries. Customer Service Hours: Monday-Friday, 9:00 AM-6:00 PM PST.",
        ],
        'shipping-policy' => [
            'title'       => "Shipping Policy – Corvelshop",
            'description' => "Review Corvelshop shipping policy, including U.S. shipping locations, 5:00 PM PST cutoff, 1-3 business day handling, 5-7 business day transit, free standard shipping, tracking, and delivery support.",
        ],
        'return-refund-policy' => [
            'title'       => "Return & Refund Policy – Corvelshop",
            'description' => "Review Corvelshop return and refund policy, including the 30-day return window, return by mail, no restocking fee, and refund timing.",
        ],
        'shipping-returns' => [
            'title'       => "Shipping & Returns – Corvelshop",
            'description' => "Choose the Corvelshop Shipping Policy or Return & Refund Policy for clear delivery, return, and refund details.",
        ],
        'terms-conditions' => [
            'title'       => "Terms & Conditions – Corvelshop",
            'description' => "Read the terms and conditions for shopping at Corvelshop, including purchase policies and site use guidelines.",
        ],
        'privacy-policy' => [
            'title'       => "Privacy Policy – Corvelshop",
            'description' => "Learn how Corvelshop collects, uses, and protects your personal information when you shop with us.",
        ],
        'track-order' => [
            'title'       => "Track Your Order – Corvelshop",
            'description' => "Track your Corvelshop order status. Enter your order number and email to check your delivery progress.",
        ],
    ];

    return $map[$uri] ?? null;
}

/**
 * Fix $wp_query state BEFORE Rank Math reads it.
 * Rank Math hooks into 'wp' at default priority; we run at 0 to go first.
 */
add_action('wp', 'dawp_fix_virtual_query_for_rankmath', 0);
function dawp_fix_virtual_query_for_rankmath() {
    global $wp_query;
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');

    if (!isset(dawp_virtual_page_map()[$uri])) {
        return;
    }

    $wp_query->is_404      = false;
    $wp_query->is_page     = true;
    $wp_query->is_singular = true;
    status_header(200);
}

// Inject correct title into Rank Math for virtual pages.
add_filter('rank_math/frontend/title', 'dawp_rankmath_virtual_title');
function dawp_rankmath_virtual_title($title) {
    $seo = dawp_get_virtual_seo();
    return $seo ? $seo['title'] : $title;
}

// Inject correct description into Rank Math for virtual pages.
add_filter('rank_math/frontend/description', 'dawp_rankmath_virtual_description');
function dawp_rankmath_virtual_description($desc) {
    $seo = dawp_get_virtual_seo();
    return $seo ? $seo['description'] : $desc;
}

// Force indexable robots for virtual pages (prevent noindex from 404 fallback).
add_filter('rank_math/frontend/robots', 'dawp_rankmath_virtual_robots');
function dawp_rankmath_virtual_robots($robots) {
    if (dawp_get_virtual_seo()) {
        return ['index' => 'index', 'follow' => 'follow'];
    }
    return $robots;
}
