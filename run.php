<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @author  Haris Papadakis
 */

add_filter('gettext', 'change_backend_product_sale_price', 100, 3 );
function change_backend_product_sale_price( $translated_text, $text, $domain ) {
    global $pagenow;

    if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] )
        && 'product' === get_post_type( $_GET['post'] ) && 'Sale price' === $text  )
    {
        $translated_text =  __( 'Sale Price Precentage', $domain );
    }
    return $translated_text;
}

add_filter( 'woocommerce_format_sale_price', 'woocommerce_custom_sales_price', 10, 3 );
function woocommerce_custom_sales_price( $price, $regular_price, $sale_price ) {
    $regular_price = floatval( strip_tags($regular_price) );
    $sale_price = floatval( strip_tags($sale_price) );
    $sale_price*= 100;

    $percentage =  ($regular_price-($regular_price * $sale_price )/100) ;
        $percentDiff = ($regular_price * $sale_price )/100;

    return '<del>' . wc_price( $regular_price ) . '</del> <ins>' . wc_price( $percentage )  . '</ins>';
}