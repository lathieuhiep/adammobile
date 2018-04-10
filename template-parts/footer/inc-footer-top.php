<?php
//Global variable redux
global $adammobile_options;

$adammobile_footer_col     =   $adammobile_options ["adammobile_footer_column_col"];
$adammobile_footer_widthl  =   $adammobile_options ["adammobile_footer_column_w1"];
$adammobile_footer_width2  =   $adammobile_options ["adammobile_footer_column_w2"];
$adammobile_footer_width3  =   $adammobile_options ["adammobile_footer_column_w3"];
$adammobile_footer_width4  =   $adammobile_options ["adammobile_footer_column_w4"];

if( is_active_sidebar( 'adammobile-footer-1' ) || is_active_sidebar( 'adammobile-footer-2' ) || is_active_sidebar( 'adammobile-footer-3' ) || is_active_sidebar( 'adammobile-footer-4' ) ) :

?>

    <div class="site-footer__top">
        <div class="container">
            <div class="row">

                <?php

                for( $adammobile_i = 0; $adammobile_i < $adammobile_footer_col; $adammobile_i++ ):

                    $adammobile_j = $adammobile_i +1;

                    if ( $adammobile_i == 0 ) :

                        $adammobile_col = $adammobile_footer_widthl;

                    elseif ( $adammobile_i == 1 ) :

                        $adammobile_col = $adammobile_footer_width2;

                    elseif ( $adammobile_i == 2 ) :

                        $adammobile_col = $adammobile_footer_width3;

                    else :

                        $adammobile_col = $adammobile_footer_width4;

                    endif;

                    if( is_active_sidebar("adammobile-footer-".$adammobile_j ) ):

                ?>

                        <div class="col-md-<?php echo esc_attr( $adammobile_col ); ?>">

                            <?php dynamic_sidebar("adammobile-footer-".$adammobile_j); ?>

                        </div><!--end class footermenu-->

                <?php
                    endif;

                endfor;
                ?>

            </div>
        </div>
    </div>

<?php endif; ?>