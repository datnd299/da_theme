<?php
/**
 * Rank Math integration for theme virtual pages.
 *
 * Rank Math loads this file only when the plugin is active.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'dawp_rank_math_virtual_page_seo_map' ) ) {
    function dawp_rank_math_virtual_page_seo_map() {
        $image_base = trailingslashit( get_template_directory_uri() ) . 'assets/img/';

        return array(
            'home'                 => array(
                'slug'        => 'home',
                'title'       => 'Handmade Leather Footwear | Handcraft Shoe',
                'description' => 'Shop handmade leather shoes, sandals, boots, and custom leather footwear with natural character, clear sizing guidance, and practical store policies.',
                'image'       => $image_base . 'handcraft-footwear-home.png',
                'schema_type' => 'CollectionPage',
                'priority'    => '1.0',
            ),
            'about-us'             => array(
                'slug'        => 'about',
                'title'       => 'About Handcraft Shoe | Handmade Leather Footwear',
                'description' => 'Learn about Handcraft Shoe, a focused handmade leather footwear store built around natural materials, clear product details, and practical customer care.',
                'image'       => $image_base . 'about-hero-workshop.png',
                'schema_type' => 'AboutPage',
                'priority'    => '0.7',
            ),
            'faq'                  => array(
                'slug'        => 'faq',
                'title'       => 'FAQ | Orders, Shipping, Returns & Leather Care',
                'description' => 'Find answers about Handcraft Shoe orders, secure payments, U.S. shipping, tracking, returns, exchanges, sizing, custom footwear, and leather care.',
                'image'       => $image_base . 'handcraft-footwear-home.png',
                'schema_type' => 'FAQPage',
                'priority'    => '0.8',
            ),
            'contact-us'           => array(
                'slug'        => 'contact',
                'title'       => 'Contact Handcraft Shoe | Order & Product Support',
                'description' => 'Contact Handcraft Shoe support for help with leather footwear, sizing, order tracking, shipping, returns, refunds, and product questions.',
                'image'       => $image_base . 'handcraft-footwear-home.png',
                'schema_type' => 'ContactPage',
                'priority'    => '0.8',
            ),
            'shipping-policy'      => array(
                'slug'        => 'shipping-policy',
                'title'       => 'Shipping Policy | Handcraft Shoe',
                'description' => 'Review Handcraft Shoe shipping terms, U.S. delivery coverage, order cutoff time, handling time, transit estimates, tracking updates, and delivery support.',
                'image'       => $image_base . 'Everyday_Leather_Shoes.png',
                'schema_type' => 'WebPage',
                'priority'    => '0.6',
            ),
            'refund-return-policy' => array(
                'slug'        => 'refund-return-policy',
                'title'       => 'Refund & Return Policy | Handcraft Shoe',
                'description' => 'Read the Handcraft Shoe refund and return policy for eligible footwear returns, return shipping, damaged items, exchanges, and refund timing.',
                'image'       => $image_base . 'Handmade_Leather_Shoes.png',
                'schema_type' => 'WebPage',
                'priority'    => '0.6',
            ),
            'terms-conditions'     => array(
                'slug'        => 'terms-conditions',
                'title'       => 'Terms & Conditions | Handcraft Shoe',
                'description' => 'Review Handcraft Shoe terms and conditions for website use, purchases, product information, order processing, payments, returns, and limitations.',
                'image'       => $image_base . 'Leather_Boots.png',
                'schema_type' => 'WebPage',
                'priority'    => '0.5',
            ),
            'privacy-policy'       => array(
                'slug'        => 'privacy',
                'title'       => 'Privacy Policy | Handcraft Shoe',
                'description' => 'Learn how Handcraft Shoe collects, uses, protects, and shares order, support, payment, device, and custom footwear information.',
                'image'       => $image_base . 'Custom_Leather_Footwear.png',
                'schema_type' => 'WebPage',
                'priority'    => '0.5',
            ),
            'track-order'          => array(
                'slug'        => 'track-order',
                'title'       => 'Track Your Order | Handcraft Shoe',
                'description' => 'Track your Handcraft Shoe order status with your order details and review helpful links for shipping, returns, and customer support.',
                'image'       => $image_base . 'handcraft-footwear-home.png',
                'schema_type' => 'WebPage',
                'priority'    => '0.7',
            ),
        );
    }
}

if ( ! function_exists( 'dawp_rank_math_request_path' ) ) {
    function dawp_rank_math_request_path() {
        $request_path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ) ?? '', '/' );
        $site_path    = trim( parse_url( home_url( '/' ), PHP_URL_PATH ) ?? '', '/' );

        if ( '' !== $site_path && 0 === strpos( $request_path, $site_path . '/' ) ) {
            $request_path = substr( $request_path, strlen( $site_path ) + 1 );
        }

        return trim( $request_path, '/' );
    }
}

if ( ! function_exists( 'dawp_rank_math_current_virtual_page' ) ) {
    function dawp_rank_math_current_virtual_page() {
        $map  = dawp_rank_math_virtual_page_seo_map();
        $path = dawp_rank_math_request_path();

        if ( 'home' === $path && isset( $map['home'] ) ) {
            $map['home']['path'] = '';
            return $map['home'];
        }

        if ( isset( $map[ $path ] ) ) {
            $map[ $path ]['path'] = $path;
            return $map[ $path ];
        }

        if ( function_exists( 'is_front_page' ) && is_front_page() && isset( $map['home'] ) ) {
            $map['home']['path'] = '';
            return $map['home'];
        }

        return null;
    }
}

if ( ! function_exists( 'dawp_rank_math_virtual_page_url' ) ) {
    function dawp_rank_math_virtual_page_url( $page ) {
        $path = isset( $page['path'] ) ? $page['path'] : '';

        if ( '' === $path ) {
            return home_url( '/' );
        }

        return home_url( '/' . trim( $path, '/' ) . '/' );
    }
}

add_filter(
    'rank_math/frontend/title',
    function ( $title ) {
        $page = dawp_rank_math_current_virtual_page();
        return $page ? $page['title'] : $title;
    }
);

add_filter(
    'rank_math/frontend/description',
    function ( $description ) {
        $page = dawp_rank_math_current_virtual_page();
        return $page ? $page['description'] : $description;
    }
);

add_filter(
    'rank_math/frontend/canonical',
    function ( $canonical ) {
        $page = dawp_rank_math_current_virtual_page();
        return $page ? dawp_rank_math_virtual_page_url( $page ) : $canonical;
    }
);

add_filter(
    'rank_math/opengraph/type',
    function ( $type ) {
        return dawp_rank_math_current_virtual_page() ? 'website' : $type;
    }
);

add_filter(
    'rank_math/opengraph/url',
    function ( $url ) {
        $page = dawp_rank_math_current_virtual_page();
        return $page ? dawp_rank_math_virtual_page_url( $page ) : $url;
    }
);

foreach ( array( 'facebook', 'twitter' ) as $network ) {
    add_filter(
        "rank_math/opengraph/{$network}/image",
        function ( $image ) {
            $page = dawp_rank_math_current_virtual_page();
            return $page ? $page['image'] : $image;
        }
    );
}

add_filter(
    'rank_math/opengraph/twitter/card_type',
    function ( $type ) {
        return dawp_rank_math_current_virtual_page() ? 'summary_large_image' : $type;
    }
);

foreach ( array( 'facebook' => 'og', 'twitter' => 'twitter' ) as $network => $prefix ) {
    add_filter(
        "rank_math/opengraph/{$network}/{$prefix}_title",
        function ( $content ) {
            $page = dawp_rank_math_current_virtual_page();
            return $page ? $page['title'] : $content;
        }
    );

    add_filter(
        "rank_math/opengraph/{$network}/{$prefix}_description",
        function ( $content ) {
            $page = dawp_rank_math_current_virtual_page();
            return $page ? $page['description'] : $content;
        }
    );
}

add_filter(
    'rank_math/json_ld',
    function ( $data, $jsonld ) {
        $page = dawp_rank_math_current_virtual_page();

        if ( ! $page ) {
            return $data;
        }

        $url         = dawp_rank_math_virtual_page_url( $page );
        $schema_type = isset( $page['schema_type'] ) ? $page['schema_type'] : 'WebPage';

        $data['dawp_virtual_webpage'] = array(
            '@type'              => $schema_type,
            '@id'                => trailingslashit( $url ) . '#webpage',
            'url'                => $url,
            'name'               => $page['title'],
            'description'        => $page['description'],
            'isPartOf'           => array(
                '@id' => home_url( '/#website' ),
            ),
            'publisher'          => array(
                '@id' => home_url( '/#organization' ),
            ),
            'primaryImageOfPage' => array(
                '@type' => 'ImageObject',
                'url'   => $page['image'],
            ),
        );

        if ( 'FAQPage' === $schema_type ) {
            $data['dawp_virtual_faq'] = array(
                '@type'      => 'FAQPage',
                '@id'        => trailingslashit( $url ) . '#faq',
                'mainEntity' => array(
                    dawp_rank_math_faq_question( 'What products does Handcraft Shoe sell?', 'Handcraft Shoe offers handmade leather shoes, leather sandals, leather boots, and custom leather footwear with product details for material, size, fit, color, care, customization, and return limits where applicable.' ),
                    dawp_rank_math_faq_question( 'Where do you ship?', 'Handcraft Shoe currently ships eligible orders within the United States. Some products may have restrictions due to size, weight, carrier limits, product type, custom production needs, destination, or local regulations.' ),
                    dawp_rank_math_faq_question( 'How long does shipping take?', 'Handling time is usually 1-3 business days, and transit time is usually 5-7 business days, for an estimated delivery window of 6-10 business days from purchase.' ),
                    dawp_rank_math_faq_question( 'What is your return window?', 'Eligible items may be returned within 30 days from delivery when footwear is unused, unworn, undamaged, and in original condition with original packaging and included materials.' ),
                    dawp_rank_math_faq_question( 'How do I track my package?', 'Once your order ships, tracking information is sent to the checkout email address. Tracking pages may take 24-48 hours to update after the carrier receives the package.' ),
                ),
            );
        }

        return $data;
    },
    99,
    2
);

if ( ! function_exists( 'dawp_rank_math_faq_question' ) ) {
    function dawp_rank_math_faq_question( $question, $answer ) {
        return array(
            '@type'          => 'Question',
            'name'           => $question,
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => $answer,
            ),
        );
    }
}

add_filter( 'rank_math/sitemap/page_content', 'dawp_rank_math_virtual_pages_sitemap_content' );
add_filter( 'rank_math/sitemap/page/content', 'dawp_rank_math_virtual_pages_sitemap_content' );

if ( ! function_exists( 'dawp_rank_math_virtual_pages_sitemap_content' ) ) {
    function dawp_rank_math_virtual_pages_sitemap_content( $content = '' ) {
        $map     = dawp_rank_math_virtual_page_seo_map();
        $lastmod = gmdate( 'c', filemtime( __FILE__ ) );

        foreach ( $map as $path => $page ) {
            if ( 'home' === $path ) {
                continue;
            }

            $content .= "\n<url>\n";
            $content .= "\t<loc>" . esc_url( home_url( '/' . trim( $path, '/' ) . '/' ) ) . "</loc>\n";
            $content .= "\t<lastmod>" . esc_html( $lastmod ) . "</lastmod>\n";
            $content .= "\t<changefreq>weekly</changefreq>\n";
            $content .= "\t<priority>" . esc_html( $page['priority'] ) . "</priority>\n";
            $content .= "</url>";
        }

        return $content;
    }
}
