<?php

/**
 * Shop WooCommerce Hooks
 */

/**
 * Layout
 *
 * @see adammobile_woo_before_main_content()
 * @see adammobile_woo_before_shop_loop_open()
 * @see adammobile_woo_before_shop_loop_close()
 * @see adammobile_woo_after_main_content()
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'adammobile_loop_product_title_link', 10 );

add_action( 'woocommerce_before_main_content', 'adammobile_woo_before_main_content', 10 );

add_action( 'woocommerce_before_shop_loop', 'adammobile_woo_before_shop_loop_open',  5 );

add_action( 'woocommerce_before_shop_loop_item_title', 'adammobile_woo_product_image_open', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'adammobile_woo_product_image_close', 11 );

add_action( 'woocommerce_before_shop_loop', 'adammobile_woo_before_shop_loop_close',  35 );

add_action( 'adammobile_woo_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_after_main_content', 'adammobile_woo_after_main_content', 10 );

add_action( 'adammobile_woo_template_loop_price', 'woocommerce_template_loop_price', 10 );


/**
 * Single Product
 *
 * @see adammobile_woo_before_single_product()
 * @see adammobile_woo_before_single_product_summary_open_warp()
 * @see adammobile_woo_before_single_product_summary_open()
 * @see adammobile_woo_before_single_product_summary_close()
 * @see adammobile_woo_col_entry_summary_open()
 * @see adammobile_woo_col_entry_summary_close()
 * @see adammobile_woo_single_warranty()
 * @see adammobile_woo_after_single_product_summary_close_warp()
 * @see adammobile_woo_after_single_product()
 *
 */

remove_action(   'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );

add_action( 'woocommerce_before_single_product', 'adammobile_woo_before_single_product', 5 );

add_action( 'woocommerce_before_single_product_summary', 'adammobile_woo_before_single_product_summary_open_warp',  1 );

add_action( 'adammobile_woo_single_title', 'woocommerce_template_single_title', 5 );

add_action( 'woocommerce_before_single_product_summary', 'adammobile_woo_before_single_product_summary_open', 5 );
add_action( 'woocommerce_before_single_product_summary', 'adammobile_woo_before_single_product_summary_close', 30 );

add_action( 'woocommerce_before_single_product_summary', 'adammobile_woo_col_entry_summary_open', 35 );
add_action( 'woocommerce_after_single_product_summary', 'adammobile_woo_col_entry_summary_close', 3 );
add_action( 'woocommerce_after_single_product_summary', 'adammobile_woo_single_warranty', 4 );

add_action( 'woocommerce_after_single_product_summary', 'adammobile_woo_after_single_product_summary_close_warp', 5 );

add_action( 'woocommerce_after_single_product', 'adammobile_woo_after_single_product', 30 );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields',99 );
function custom_override_checkout_fields( $fields ) {

    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_address_2']);

    return $fields;
}
