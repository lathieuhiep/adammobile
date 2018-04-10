<?php

/**
 * General functions used to integrate this theme with WooCommerce.
 */

add_action( 'after_setup_theme', 'adammobile_shop_setup' );

function adammobile_shop_setup() {

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
//    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}

/* Start limit product */
add_filter('loop_shop_per_page', 'adammobile_show_products_per_page');

function adammobile_show_products_per_page() {
    global $adammobile_options;

    $adammobile_product_limit = $adammobile_options['adammobile_shop_limit'];
    return $adammobile_product_limit;

}
/* End limit product */

/*
* Lay Out Shop
*/

if ( ! function_exists( 'adammobile_woo_before_main_content' ) ) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     */
    function adammobile_woo_before_main_content() {
        global $adammobile_options;
    ?>

        <div class="site-shop">
            <div class="container">
                <div class="row">
                    <div class="<?php echo $adammobile_options['adammobile_shop_sidebar'] == 0 ? 'col-md-12' : 'col-md-9' ?>">

    <?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_after_main_content' ) ) :
    /**
     * After Content
     * Closes the wrapping divs
     */
    function adammobile_woo_after_main_content() {
        global $adammobile_options;
    ?>

                    </div><!-- .col-md-9 -->

                    <?php
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked adammobile_woo_sidebar - 10
                     */
                    if ( $adammobile_options['adammobile_shop_sidebar'] == 1 ) :

                        do_action( 'adammobile_woo_sidebar' );

                    endif;
                    ?>

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .site-shop -->

    <?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_before_shop_loop_open' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked adammobile_woo_before_shop_loop_open - 5
     */
    function adammobile_woo_before_shop_loop_open() {

    ?>

        <div class="site-shop__result-count-ordering d-flex align-items-center justify-content-between">

    <?php
    }

endif;

if ( ! function_exists( 'adammobile_woo_before_shop_loop_close' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked adammobile_woo_before_shop_loop_close - 35
     */
    function adammobile_woo_before_shop_loop_close() {

    ?>

        </div><!-- .site-shop__result-count-ordering -->

    <?php
    }

endif;

if ( ! function_exists( 'adammobile_woo_product_image_open' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop_item_title hook.
     *
     * @hooked adammobile_woo_product_image_open - 5
     */

    function adammobile_woo_product_image_open() {

?>

    <div class="site-product-loop-image">

<?php

    }

endif;
if ( ! function_exists( 'adammobile_woo_product_image_close' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop_item_title hook.
     *
     * @hooked adammobile_woo_product_image_close - 11
     */

    function adammobile_woo_product_image_close() {

?>

        </div><!-- .site-product-loop-image -->

<?php

    }
endif;

if ( ! function_exists( 'adammobile_loop_product_title_link' ) ) :

    function adammobile_loop_product_title_link() {
?>

        <h2 class="woocommerce-loop-product__title">
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                <?php the_title(); ?>
            </a>
        </h2>

<?php
    }

endif;

/*
* Single Shop
*/

// Change 'add to cart' text on archive product page
add_filter( 'woocommerce_product_add_to_cart_text', 'adammobile_custom_cart_button_text' );

/* Add to cart button text */
add_filter('woocommerce_product_single_add_to_cart_text', 'adammobile_custom_cart_button_text');

function adammobile_custom_cart_button_text() {
    return esc_html__('Đặt hàng', 'adammobile');
}

if ( ! function_exists( 'adammobile_woo_before_single_product' ) ) :

    /**
     * Before Content Single  product
     *
     * woocommerce_before_single_product hook.
     *
     * @hooked adammobile_woo_before_single_product - 5
     */

    function adammobile_woo_before_single_product() {

    ?>

        <div class="site-shop-single">

    <?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_after_single_product' ) ) :

    /**
     * After Content Single  product
     *
     * woocommerce_after_single_product hook.
     *
     * @hooked adammobile_woo_after_single_product - 30
     */

    function adammobile_woo_after_single_product() {

    ?>

        </div><!-- .site-shop-single -->

    <?php

    }

endif;

if ( !function_exists( 'adammobile_woo_before_single_product_summary_open_warp' ) ) :

    /**
     * Before single product summary
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked adammobile_woo_before_single_product_summary_open_warp - 1
     */

    function adammobile_woo_before_single_product_summary_open_warp() {

    ?>
        <div class="site-shop-single__title">
            <?php do_action( 'adammobile_woo_single_title' ); ?>
        </div>

        <div class="site-shop-single__warp">
            <div class="row">

    <?php

    }

endif;

if ( !function_exists( 'adammobile_woo_after_single_product_summary_close_warp' ) ) :

    /**
     * After single product summary
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked adammobile_woo_after_single_product_summary_close_warp - 5
     */

    function adammobile_woo_after_single_product_summary_close_warp() {

    ?>
            </div><!-- .row -->
        </div><!-- .site-shop-single__warp -->

    <?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_before_single_product_summary_open' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked adammobile_woo_before_single_product_summary_open - 5
     */

    function adammobile_woo_before_single_product_summary_open() {

    ?>

        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="site-shop-single__gallery-box">

    <?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_before_single_product_summary_close' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked adammobile_woo_before_single_product_summary_close - 30
     */

    function adammobile_woo_before_single_product_summary_close() {

    ?>

            </div><!-- .site-shop-single__gallery-box -->
        </div><!-- .col-md-4 -->

    <?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_col_entry_summary_open' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked adammobile_woo_col_entry_summary_open - 35
     */

    function adammobile_woo_col_entry_summary_open() {

?>

    <div class="col-xs-12 col-sm-6 col-md-4">

<?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_col_entry_summary_close' ) ) :

    /**
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked adammobile_woo_col_entry_summary_close - 3
     */

    function adammobile_woo_col_entry_summary_close() {

?>

    </div><!-- .col-md-4 -->

<?php

    }

endif;

if ( ! function_exists( 'adammobile_woo_single_warranty' ) ) :

    /**
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked adammobile_woo_single_warranty - 4
     */

    function adammobile_woo_single_warranty() {
        $adammobile_thong_so_kt    =   get_post_meta( get_the_ID(), 'thong_so_kt_id', true )

?>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="site-single-thong-so">
                <h2>
                    <?php esc_html_e( 'Thông số kỹ thuật', 'adammobile' ); ?>
                </h2>

                <ul>
                    <?php foreach ( $adammobile_thong_so_kt as $adammobile_thong_so_kt_item ) : ?>
                        <li>
                            <span>
                                <?php echo esc_html( $adammobile_thong_so_kt_item['bo_phan_sp'] ); ?>
                            </span>

                            <span>
                                <?php echo esc_html( $adammobile_thong_so_kt_item['chi_tiet_sp'] ); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- .site-single-warranty -->
        </div>

<?php

    }

endif;