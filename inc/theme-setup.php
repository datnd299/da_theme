<?php
add_action('after_setup_theme', 'dawp_setup');

add_filter( 'woocommerce_admin_report_data', 'fake_sales_report_data', 999 );
add_filter('woocommerce_order_number', 'custom_woocommerce_order_prefix', 10, 2);

function custom_woocommerce_order_prefix($order_id, $order) {
    return 'SHH-' . $order_id;
}
function fake_sales_report_data( $report_data ) {
    if ( ! is_admin() ) {
        return $report_data;
    }

    // ===== Cấu hình chính =====
    $total_sales       = 583749.25; // Tổng doanh thu trong khoảng thời gian (có thể đổi)
    $average_sales     = 67.7;
    $total_orders      = (int) round( $total_sales / $average_sales ); // 7353
    $items_per_order   = 1.47;  // tỉ lệ items / order — có thể đổi
    $total_items       = (int) round( $total_orders * $items_per_order );

    // Refund config
    $refund_rate           = 0.025;
    $total_refunds         = round( $total_sales * $refund_rate, 2 );
    $total_refunded_orders = (int) round( $total_orders * 0.015 );
    $full_refund_count     = (int) round( $total_refunded_orders * 0.4 );
    $partial_refund_count  = $total_refunded_orders - $full_refund_count;
    $refunded_order_items  = (int) round( $total_refunded_orders * $items_per_order * 1.2 );

    // Coupon config
    $coupon_rate   = 0.04223;  // 4% doanh thu dùng coupon
    $total_coupons = round( $total_sales * $coupon_rate, 2 ); // ~$20,000

    // ===== Xác định range ngày =====
    $end_date   = current_time( 'timestamp' );
    $start_date = strtotime( '-7 days', $end_date );

    if ( ! empty( $_GET['range'] ) ) {
        switch ( $_GET['range'] ) {
            case 'year':
                $start_date = strtotime( 'first day of january this year', $end_date );
                break;
            case 'last_month':
                $start_date = strtotime( 'first day of previous month', $end_date );
                $end_date   = strtotime( 'last day of previous month', $end_date );
                break;
            case 'month':
                $start_date = strtotime( 'first day of this month', $end_date );
                break;
            case '7day':
            default:
                $start_date = strtotime( '-7 days', $end_date );
                break;
        }
    }

    if ( ! empty( $_GET['start_date'] ) ) {
        $start_date = strtotime( sanitize_text_field( $_GET['start_date'] ) );
    }
    if ( ! empty( $_GET['end_date'] ) ) {
        $end_date = strtotime( sanitize_text_field( $_GET['end_date'] ) );
    }

    $days = max( 1, (int) round( ( $end_date - $start_date ) / DAY_IN_SECONDS ) + 1 );

    // ===== Helper: phân bổ ngẫu nhiên 1 tổng vào N ngày =====
    // Mỗi ngày được random weight từ 0.5 đến 1.5, sau đó normalize.
    $generate_random_weights = function( $n, $start_ts, $weekend_boost = 1.25, $volatility = 0.15 ) {
        $weights = array();
        $prev    = 1.0;

        for ( $i = 0; $i < $n; $i++ ) {
            $day_ts  = $start_ts + ( $i * DAY_IN_SECONDS );
            $dow     = (int) date( 'w', $day_ts ); // 0 = CN, 6 = T7

            // Base weight với weekly pattern
            $base = 1.0;
            if ( $dow === 0 || $dow === 6 ) {
                $base = $weekend_boost;
            } elseif ( $dow === 5 ) {
                // Thứ 6 cũng cao hơn chút
                $base = 1.0 + ( $weekend_boost - 1.0 ) * 0.5;
            } elseif ( $dow === 1 ) {
                // Thứ 2 thường thấp
                $base = 0.85;
            }

            // Random walk: ngày sau gần ngày trước, cộng noise nhỏ
            $noise   = ( mt_rand( -100, 100 ) / 100 ) * $volatility;
            $current = $base * ( 1 + $noise );

            // Smooth: blend với ngày trước
            $current = ( $current * 0.7 ) + ( $prev * 0.3 );

            $weights[] = $current;
            $prev      = $current;
        }

        // Normalize tổng = 1
        $sum = array_sum( $weights );
        return array_map( function( $w ) use ( $sum ) {
            return $w / $sum;
        }, $weights );
    };

    // Phân bổ random + đảm bảo tổng đúng (ngày cuối nhận phần dư)
    $distribute = function( $total, $weights, $is_int = false ) {
        $n         = count( $weights );
        $result    = array();
        $remaining = $total;

        for ( $i = 0; $i < $n - 1; $i++ ) {
            $value = $total * $weights[ $i ];
            if ( $is_int ) {
                $value = (int) round( $value );
            } else {
                $value = round( $value, 2 );
            }
            $result[]  = $value;
            $remaining -= $value;
        }
        // Ngày cuối nhận phần dư để đảm bảo tổng đúng
        $result[] = $is_int ? (int) round( $remaining ) : round( $remaining, 2 );
        return $result;
    };

    // Tạo weights ngẫu nhiên cho từng metric (mỗi metric có pattern riêng)
    $sales_weights  = $generate_random_weights( $days, $start_date, 1.30, 0.12 );
    $orders_weights = $generate_random_weights( $days, $start_date, 1.25, 0.10 );
    $items_weights  = $generate_random_weights( $days, $start_date, 1.25, 0.10 );

    $sales_per_day  = $distribute( $total_sales, $sales_weights, false );
    $orders_per_day = $distribute( $total_orders, $orders_weights, true );
    $items_per_day  = $distribute( $total_items, $items_weights, true );

    // ===== Sinh dữ liệu orders / order_counts / order_items =====
    $orders_arr       = array();
    $order_counts_arr = array();
    $order_items_arr  = array();

    $tax_rate      = 0.085;
    $shipping_rate = 0.0735;

    for ( $i = 0; $i < $days; $i++ ) {
        $timestamp = $start_date + ( $i * DAY_IN_SECONDS );
        $post_date = date( 'Y-m-d H:i:s', $timestamp );

        $day_sales  = $sales_per_day[ $i ];
        $day_orders = $orders_per_day[ $i ];
        $day_items  = $items_per_day[ $i ];

        $day_tax      = round( $day_sales * $tax_rate, 2 );
        $day_shipping = round( $day_sales * $shipping_rate, 2 );

        $order_counts_arr[] = (object) array(
            'post_date' => $post_date,
            'count'     => $day_orders,
        );

        $orders_arr[] = (object) array(
            'post_date'          => $post_date,
            'total_sales'        => (string) $day_sales,
            'total_tax'          => (string) $day_tax,
            'total_shipping'     => (string) $day_shipping,
            'total_shipping_tax' => (string) round( $day_shipping * 0.1, 2 ),
        );

        $order_items_arr[] = (object) array(
            'post_date'        => $post_date,
            'order_item_count' => $day_items,
        );
    }

    // ===== Sinh dữ liệu refunds =====
    $full_refunds_arr    = array();
    $partial_refunds_arr = array();
    $refund_lines_arr    = array();

    $refund_amount_weights = $generate_random_weights( $days, $start_date, 1.05, 0.30 );
$full_count_weights    = $generate_random_weights( $days, $start_date, 1.05, 0.30 );
$partial_count_weights = $generate_random_weights( $days, $start_date, 1.05, 0.30 );
$refund_items_weights  = $generate_random_weights( $days, $start_date, 1.05, 0.30 );

    $refund_per_day        = $distribute( $total_refunds, $refund_amount_weights, false );
    $full_count_per_day    = $distribute( $full_refund_count, $full_count_weights, true );
    $partial_count_per_day = $distribute( $partial_refund_count, $partial_count_weights, true );
    $refund_items_per_day  = $distribute( $refunded_order_items, $refund_items_weights, true );

    for ( $i = 0; $i < $days; $i++ ) {
        $timestamp = $start_date + ( $i * DAY_IN_SECONDS );
        $post_date = date( 'Y-m-d H:i:s', $timestamp );

        $day_refund_amount = $refund_per_day[ $i ];
        $day_full_count    = $full_count_per_day[ $i ];
        $day_partial_count = $partial_count_per_day[ $i ];
        $day_refund_items  = $refund_items_per_day[ $i ];

        // Full refunds chiếm ~60% giá trị refund của ngày, partial chiếm ~40%
        $day_full_amount    = round( $day_refund_amount * 0.6, 2 );
        $day_partial_amount = round( $day_refund_amount - $day_full_amount, 2 );

        // ----- Full refunds -----
        for ( $j = 0; $j < $day_full_count; $j++ ) {
            $refund_value    = round( $day_full_amount / max( 1, $day_full_count ), 2 );
            $refund_shipping = round( $refund_value * $shipping_rate, 2 );
            $refund_tax      = round( $refund_value * $tax_rate, 2 );
            $refund_ship_tax = round( $refund_shipping * 0.1, 2 );

            $full_refund = (object) array(
                'post_date'          => $post_date,
                'total_refund'       => (string) $refund_value,
                'total_shipping'     => (string) $refund_shipping,
                'total_tax'          => (string) $refund_tax,
                'total_shipping_tax' => (string) $refund_ship_tax,
            );
            $full_refund->net_refund = $refund_value - ( $refund_shipping + $refund_tax + $refund_ship_tax );
            $full_refunds_arr[]      = $full_refund;

            $refund_lines_arr[] = (object) array(
                'refund_id'          => 90000 + count( $refund_lines_arr ),
                'total_refund'       => (string) $refund_value,
                'post_date'          => $post_date,
                'item_type'          => 'line_item',
                'total_sales'        => (string) $refund_value,
                'total_shipping'     => (string) $refund_shipping,
                'total_tax'          => (string) $refund_tax,
                'total_shipping_tax' => (string) $refund_ship_tax,
                'order_item_count'   => (int) round( $day_refund_items * 0.4 / max( 1, $day_full_count ) ),
            );
        }

        // ----- Partial refunds -----
        for ( $j = 0; $j < $day_partial_count; $j++ ) {
            $refund_value    = round( $day_partial_amount / max( 1, $day_partial_count ), 2 );
            $refund_shipping = 0;
            $refund_tax      = round( $refund_value * $tax_rate, 2 );
            $refund_ship_tax = 0;
            $refund_items    = (int) round( $day_refund_items * 0.6 / max( 1, $day_partial_count ) );

            $partial_refund = (object) array(
                'refund_id'          => 80000 + count( $partial_refunds_arr ),
                'total_refund'       => (string) $refund_value,
                'post_date'          => $post_date,
                'item_type'          => 'line_item',
                'total_sales'        => (string) $refund_value,
                'total_shipping'     => (string) $refund_shipping,
                'total_tax'          => (string) $refund_tax,
                'total_shipping_tax' => (string) $refund_ship_tax,
                'order_item_count'   => $refund_items,
            );
            $partial_refund->net_refund = $refund_value - ( $refund_shipping + $refund_tax + $refund_ship_tax );
            $partial_refunds_arr[]      = $partial_refund;

            $refund_lines_arr[] = (object) array(
                'refund_id'          => 80000 + count( $refund_lines_arr ),
                'total_refund'       => (string) $refund_value,
                'post_date'          => $post_date,
                'item_type'          => 'line_item',
                'total_sales'        => (string) $refund_value,
                'total_shipping'     => (string) $refund_shipping,
                'total_tax'          => (string) $refund_tax,
                'total_shipping_tax' => (string) $refund_ship_tax,
                'order_item_count'   => $refund_items,
            );
        }
    }

    // ===== Sinh dữ liệu coupons =====
    $coupons_arr     = array();
    $coupon_codes    = array( 'SUMMER20', 'WELCOME10', 'FLASH50', 'VIP15', 'SAVE5' );
    $coupon_weights = $generate_random_weights( $days, $start_date, 1.35, 0.20 );
    $coupon_per_day  = $distribute( $total_coupons, $coupon_weights, false );

    for ( $i = 0; $i < $days; $i++ ) {
        $timestamp = $start_date + ( $i * DAY_IN_SECONDS );
        $post_date = date( 'Y-m-d H:i:s', $timestamp );

        $day_coupon_total = $coupon_per_day[ $i ];

        // Mỗi ngày có 2-4 coupon code khác nhau được dùng
        $num_coupons_today = mt_rand( 2, min( 4, count( $coupon_codes ) ) );
        $picked_codes      = (array) array_rand( array_flip( $coupon_codes ), $num_coupons_today );

        // Phân bổ tiền coupon ngày này cho các code random
        $code_weights      = $generate_random_weights( $num_coupons_today, $start_date, 1.35, 0.20 );
        $code_distribution = $distribute( $day_coupon_total, $code_weights, false );

        foreach ( $picked_codes as $idx => $code ) {
            $coupons_arr[] = (object) array(
                'order_item_name' => $code,
                'discount_amount' => (string) $code_distribution[ $idx ],
                'post_date'       => $post_date,
            );
        }
    }

    // Tổng refund tax / shipping
    $total_tax_refunded          = array_sum( wp_list_pluck( $refund_lines_arr, 'total_tax' ) );
    $total_shipping_refunded     = array_sum( wp_list_pluck( $refund_lines_arr, 'total_shipping' ) );
    $total_shipping_tax_refunded = array_sum( wp_list_pluck( $refund_lines_arr, 'total_shipping_tax' ) );

    // ===== Override report_data =====
    $report_data->order_counts                = $order_counts_arr;
    $report_data->orders                      = $orders_arr;
    $report_data->order_items                 = $order_items_arr;
    $report_data->coupons                     = $coupons_arr;
    $report_data->full_refunds                = $full_refunds_arr;
    $report_data->partial_refunds             = $partial_refunds_arr;
    $report_data->refund_lines                = $refund_lines_arr;
    $report_data->refunded_orders             = array_merge( $partial_refunds_arr, $full_refunds_arr );
    $report_data->refunded_order_items        = $refunded_order_items;
    $report_data->total_tax_refunded          = $total_tax_refunded;
    $report_data->total_shipping_refunded     = $total_shipping_refunded;
    $report_data->total_shipping_tax_refunded = $total_shipping_tax_refunded;
    $report_data->total_refunds               = $total_refunds;
    $report_data->total_refunded_orders       = $full_refund_count;

    // Tính lại totals (đã trừ refund)
    $gross_tax      = array_sum( wp_list_pluck( $orders_arr, 'total_tax' ) );
    $gross_shipping = array_sum( wp_list_pluck( $orders_arr, 'total_shipping' ) );
    $gross_ship_tax = array_sum( wp_list_pluck( $orders_arr, 'total_shipping_tax' ) );

    $report_data->total_tax           = wc_format_decimal( $gross_tax - $total_tax_refunded, 2 );
    $report_data->total_shipping      = wc_format_decimal( $gross_shipping - $total_shipping_refunded, 2 );
    $report_data->total_shipping_tax  = wc_format_decimal( $gross_ship_tax - $total_shipping_tax_refunded, 2 );
    $report_data->total_sales         = wc_format_decimal( $total_sales - $total_refunds, 2 );
    $report_data->net_sales           = wc_format_decimal(
        $report_data->total_sales
        - $report_data->total_shipping
        - max( 0, $report_data->total_tax )
        - max( 0, $report_data->total_shipping_tax ),
        2
    );

    // FIX: average dùng đúng số interval của report.
    // chart_interval = số ngày - 1, nên chia cho ($days) để bằng (chart_interval + 1).
    $report_data->average_sales       = wc_format_decimal( $report_data->net_sales / $days, 2 );
    $report_data->average_total_sales = wc_format_decimal( $report_data->total_sales / $days, 2 );

    $report_data->total_coupons = number_format(
        array_sum( wp_list_pluck( $coupons_arr, 'discount_amount' ) ),
        2,
        '.',
        ''
    );

    $report_data->total_orders = $total_orders;
    $report_data->total_items  = $total_items;

    return $report_data;
}
function dawp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('template_redirect', 'redirect_search_to_product');
function redirect_search_to_product() {
    // Chỉ xử lý khi là trang search và chưa có post_type
    if (is_search() && !isset($_GET['post_type'])) {
        wp_safe_redirect(
            add_query_arg('post_type', 'product', $_SERVER['REQUEST_URI'])
        );
        exit;
    }
}
add_filter('template_include', 'theme_search_template');
function theme_search_template($template) {
    if (is_search() && get_query_var('post_type') === 'product') {
        $new_template = locate_template(array('woocommerce/archive-product.php'));
        if ($new_template) {
            return $new_template;
        }
    }
    return $template;
}

add_action('wp_enqueue_scripts', 'dawp_scripts');
function dawp_scripts() {
    wp_enqueue_style('dawp-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.2');

    wp_enqueue_style('dawp-tw-main', get_template_directory_uri() . '/assets/css/tw/tw-main.css', [], '1.0.2');

    if ( is_front_page() ) {
        wp_enqueue_style('dawp-home', get_template_directory_uri() . '/assets/css/tw/tw-home.css', [], '1.0.2');
        dawp_remove_styles();
    }
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_product() ) {
            wp_enqueue_style('dawp-product', get_template_directory_uri() . '/assets/css/product.css', [], '1.0.2');
            dawp_remove_styles();
        } elseif ( is_cart() ) {
            wp_enqueue_style('dawp-cart', get_template_directory_uri() . '/assets/css/cart.css', [], '1.0.2');
            dawp_remove_styles();
        } elseif ( is_checkout() ) {
            wp_enqueue_style('dawp-checkout', get_template_directory_uri() . '/assets/css/checkout.css', [], '1.0.2');
        } elseif ( is_woocommerce()  ) {
            wp_enqueue_style('dawp-shop', get_template_directory_uri() . '/assets/css/shop.css', [], '1.0.2');
            dawp_remove_styles();
        }
    }

    wp_enqueue_script('dawp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.2', true);

    $request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
}

function dawp_remove_styles() {
    wp_dequeue_style( 'wc-blocks-style' );
    // wp_dequeue_style( 'photoswipe-default-skin' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-vendors-style' );
    wp_dequeue_style( 'wc-block-style' );
    wp_dequeue_style( 'wc-blocks-packages-style' );

    wp_deregister_style( 'wc-blocks-style' );
    wp_deregister_style( 'wc-blocks-vendors-style' );
    wp_deregister_style( 'wc-block-style' );
    wp_deregister_style( 'wc-blocks-packages-style' );

    wp_dequeue_style( 'wc-blocks-cart-block-style' );
    wp_deregister_style( 'wc-blocks-cart-block-style' );
    
    // Một số version dùng handle khác:
    wp_dequeue_style( 'wc-blocks-style-cart' );
    wp_deregister_style( 'wc-blocks-style-cart' );
    global $wp_styles;
    
    if ( ! is_object( $wp_styles ) ) return;
    $blocked_files = array(
        '/blocks/cart.css',
        '/blocks/checkout.css',
        '/blocks/all-products.css',
        '/blocks/mini-cart.css',
        '/blocks/active-filters.css',
        '/blocks/price-filter.css',
        '/blocks/attribute-filter.css',
        '/blocks/stock-filter.css',
        '/blocks/rating-filter.css',
        '/blocks/featured-product.css',
        '/blocks/featured-category.css',
        '/blocks/product-categories.css',
        '/blocks/reviews.css',
    );
    
    foreach ( $wp_styles->registered as $handle => $style ) {
        foreach ( $blocked_files as $file ) {
            if ( strpos( $style->src, $file ) !== false ) {
                wp_dequeue_style( $handle );
                wp_deregister_style( $handle );
            }
        }
    }
}
