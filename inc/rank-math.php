<?php
/**
 * SEO metadata and schema for virtual pages served from template-parts.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('rank_math/frontend/title', 'dawp_rank_math_virtual_page_title');
function dawp_rank_math_virtual_page_title($title) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['seo_title'] : $title;
}

add_filter('rank_math/frontend/description', 'dawp_rank_math_virtual_page_description');
function dawp_rank_math_virtual_page_description($description) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['description'] : $description;
}

add_filter('rank_math/frontend/canonical', 'dawp_rank_math_virtual_page_canonical');
function dawp_rank_math_virtual_page_canonical($canonical) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? dawp_virtual_page_canonical($page) : $canonical;
}

add_filter('rank_math/frontend/robots', 'dawp_rank_math_virtual_page_robots');
function dawp_rank_math_virtual_page_robots($robots) {
    $page = dawp_get_current_virtual_page(true);

    if (!$page) {
        return $robots;
    }

    $robots['index']  = 'index';
    $robots['follow'] = 'follow';

    return $robots;
}

add_filter('rank_math/opengraph/type', 'dawp_rank_math_virtual_page_og_type');
function dawp_rank_math_virtual_page_og_type($type) {
    return dawp_get_current_virtual_page(true) ? 'website' : $type;
}

add_filter('rank_math/opengraph/url', 'dawp_rank_math_virtual_page_og_url');
function dawp_rank_math_virtual_page_og_url($url) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? dawp_virtual_page_canonical($page) : $url;
}

add_filter('rank_math/opengraph/site_name', 'dawp_rank_math_virtual_page_site_name');
function dawp_rank_math_virtual_page_site_name($site_name) {
    return dawp_get_current_virtual_page(true) ? get_bloginfo('name') : $site_name;
}

add_filter('rank_math/opengraph/facebook/image', 'dawp_rank_math_virtual_page_og_image');
add_filter('rank_math/opengraph/twitter/image', 'dawp_rank_math_virtual_page_og_image');
function dawp_rank_math_virtual_page_og_image($image) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? dawp_virtual_page_image_url($page) : $image;
}

add_filter('rank_math/opengraph/facebook/image_alt', 'dawp_rank_math_virtual_page_image_alt');
add_filter('rank_math/opengraph/twitter/image_alt', 'dawp_rank_math_virtual_page_image_alt');
function dawp_rank_math_virtual_page_image_alt($alt) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['title'] . ' - ' . get_bloginfo('name') : $alt;
}

add_filter('rank_math/opengraph/facebook/og:title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/facebook/og_title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/facebook/title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/twitter/twitter:title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/twitter/twitter_title', 'dawp_rank_math_virtual_page_social_title');
add_filter('rank_math/opengraph/twitter/title', 'dawp_rank_math_virtual_page_social_title');
function dawp_rank_math_virtual_page_social_title($title) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['seo_title'] : $title;
}

add_filter('rank_math/opengraph/facebook/og:description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/facebook/og_description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/facebook/description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/twitter/twitter:description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/twitter/twitter_description', 'dawp_rank_math_virtual_page_social_description');
add_filter('rank_math/opengraph/twitter/description', 'dawp_rank_math_virtual_page_social_description');
function dawp_rank_math_virtual_page_social_description($description) {
    $page = dawp_get_current_virtual_page(true);

    return $page ? $page['description'] : $description;
}

add_filter('rank_math/opengraph/twitter/card_type', 'dawp_rank_math_virtual_page_twitter_card');
function dawp_rank_math_virtual_page_twitter_card($type) {
    return dawp_get_current_virtual_page(true) ? 'summary_large_image' : $type;
}

add_filter('rank_math/sitemap/page_content', 'dawp_rank_math_virtual_page_sitemap');
function dawp_rank_math_virtual_page_sitemap($content) {
    $lastmod = '2026-05-30T00:00:00+00:00';

    foreach (dawp_virtual_page_map() as $path => $page) {
        if ($path === 'home') {
            continue;
        }

        $page['path'] = $path;
        $content .= "\n<url>\n";
        $content .= "\t<loc>" . esc_url(dawp_virtual_page_canonical($page)) . "</loc>\n";
        $content .= "\t<lastmod>" . esc_html($lastmod) . "</lastmod>\n";
        $content .= "</url>";
    }

    return $content;
}

add_filter('rank_math/json_ld', 'dawp_rank_math_virtual_page_schema', 99, 2);
function dawp_rank_math_virtual_page_schema($data, $jsonld) {
    $page = dawp_get_current_virtual_page(true);

    if (!$page) {
        return $data;
    }

    $canonical   = dawp_virtual_page_canonical($page);
    $schema_type = !empty($page['schema_type']) ? $page['schema_type'] : 'WebPage';
    $schema      = [
        '@type'        => $schema_type,
        '@id'          => $canonical . '#webpage',
        'url'          => $canonical,
        'name'         => $page['seo_title'],
        'description'  => $page['description'],
        'isPartOf'     => [
            '@id' => home_url('/#website'),
        ],
        'inLanguage'   => get_bloginfo('language') ?: 'en-US',
        'dateModified' => '2026-05-30',
    ];

    if ($page['path'] === 'faq') {
        $schema['mainEntity'] = dawp_rank_math_faq_entities();
    }

    $image = dawp_virtual_page_image_url($page);

    if ($image) {
        $schema['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url'   => $image,
        ];
        $schema['thumbnailUrl'] = $image;
    }

    $schema_key = $schema_type === 'FAQPage' ? 'FAQPage' : 'WebPage';

    if (!empty($data[$schema_key]) && is_array($data[$schema_key])) {
        $schema = array_merge($data[$schema_key], $schema);
    }

    $data[$schema_key] = $schema;

    return $data;
}

function dawp_rank_math_faq_entities() {
    $faq_items = [
        ['Where can I buy Proudlywear products?', 'Products shown on proudlywear.com are available for direct purchase through our online store. Customers can add available items to the cart and complete checkout on the website.'],
        ['Can my order be cancelled or changed after checkout?', 'Please contact us as soon as possible if you need to request a change or cancellation. We cannot guarantee changes after an order has entered processing, shipment preparation, or carrier handoff.'],
        ['Why was my order cancelled?', 'An order may be cancelled if an item becomes unavailable, billing or shipping information cannot be verified, a delivery limitation applies, or a pricing or product listing error must be corrected. If this happens, we will notify you using the contact information provided at checkout.'],
        ['Where do you ship?', 'Proudlywear currently ships exclusively within the United States. If a product, destination, or carrier limitation prevents delivery to your specific address, you will be notified at checkout before payment is completed.'],
        ['How much is shipping?', 'Standard U.S. shipping is free for all orders nationwide, with no minimum purchase requirement. Optional upgraded shipping, when available, will show its exact cost at checkout before you pay.'],
        ['How long does delivery take?', 'Orders are processed in 1-3 business days after purchase. Standard transit takes 5-7 business days, so the estimated delivery window is 6-10 business days total from the date of purchase.'],
        ['What is your order cutoff time?', 'Our order cutoff time is 5:00 PM (GMT-08:00) Pacific Standard Time. Orders placed after the cutoff begin processing on the following business day.'],
        ['How do I track my order?', 'After your order ships, we send a shipping confirmation email with a tracking link and carrier details. Orders may ship with USPS, UPS, FedEx, or DHL, depending on the package and destination.'],
        ['Why did I receive multiple tracking numbers?', 'Orders containing multiple patriotic apparel pieces, hats, accessories, custom gifts, or veteran-inspired items may ship separately from different fulfillment batches. Each shipment will have its own tracking number.'],
        ['What should I do if my package is delayed, lost, or marked delivered but missing?', 'Contact customer support within 30 days of the recorded delivery date or the expected delivery issue. Please include your order number, checkout email address, complete delivery address, and any carrier tracking details so we can investigate with the carrier.'],
        ['What if my item arrives damaged or incorrect?', 'Contact us within 30 days of delivery with your order number and clear photos of the item, packaging, and shipping label. For defective, damaged, incorrect, or carrier-damaged products, we cover the return shipping cost and will arrange the appropriate replacement or refund.'],
        ['What is your return window?', 'Eligible return requests must be initiated within 30 days of delivery. Items must be unworn, unused, undamaged, and returned in their original condition with packaging, tags, labels, care cards, garment bags, boxes, and included accessories.'],
        ['Do you charge a restocking fee?', 'No. Proudlywear does not charge restocking fees for eligible returns.'],
        ['Who pays for return shipping?', 'For defective, damaged, incorrect, or carrier-damaged products, Proudlywear covers 100% of return shipping and provides a prepaid label by email. For customer remorse, including wrong size, wrong color, changed mind, or does not fit, the customer is responsible for return shipping and the label cost may be deducted from the refund.'],
        ['When will I receive my refund?', 'After your return package is received, we inspect the item within 1-2 business days. If approved, the refund is issued to your original payment method within 7 business days. If you have not received a refund after 15 business days of approval, please contact us after checking with your bank or card issuer.'],
        ['How do I start a return?', 'Email us or use the Contact Us page within 30 days of delivery. Include your order number, checkout email, item(s) you want to return, reason for return, and photos or videos if the item is damaged, defective, or incorrect. Do not ship an item back without return authorization.'],
        ['Do you offer exchanges?', 'We do not process direct one-for-one exchanges. To get a different size, color, or style, please return the original eligible item for a refund and place a new order on the website.'],
        ['Which items are non-returnable?', 'Final sale or non-returnable items, gift cards, digital products, personalized or custom-made items, certain hygiene-sensitive items with broken seals, and items worn, washed, altered, or damaged after delivery are not eligible for return.'],
        ['Is checkout secure?', 'Yes. Checkout uses SSL-protected payment transmission through WooCommerce and certified third-party payment gateways. Proudlywear does not store raw credit card numbers on local storefront servers.'],
        ['What payment methods are available?', 'At least one conventional payment method is available during checkout, such as credit card, debit card, invoicing, or another supported payment option shown before order completion. The checkout page displays the full order cost before payment is submitted.'],
        ['How do you use my personal information?', 'We use order and device information to process payments, fulfill orders, coordinate shipping, communicate order status, screen transactions for risk, and improve the store experience according to our Privacy Policy.'],
    ];

    $entities = [];

    foreach ($faq_items as $item) {
        $entities[] = [
            '@type'          => 'Question',
            'name'           => $item[0],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $item[1],
            ],
        ];
    }

    return $entities;
}
