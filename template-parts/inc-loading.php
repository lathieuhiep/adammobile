<?php

global $adammobile_options;

$adammobile_show_loading = $adammobile_options['adammobile_general_show_loading'] == '' ? '0' : $adammobile_options['adammobile_general_show_loading'];

if(  $adammobile_show_loading == 1 ) :

    $adammobile_loading_url  = $adammobile_options['adammobile_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $adammobile_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $adammobile_loading_url ); ?>" alt="<?php esc_attr_e('loading...','adammobile') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','adammobile') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>