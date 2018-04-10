<?php

get_header();
global $adammobile_options;

$adammobile_title      = $adammobile_options['adammobile_404_title'];
$adammobile_content    = $adammobile_options['adammobile_404_editor'];
$adammobile_background = $adammobile_options['adammobile_404_background'];

?>

<div class="site-error">
    <div class="container">

        <?php if ( $adammobile_title != '' ): ?>

            <h1 class="site-title-404">
                <?php echo esc_html( $adammobile_title ); ?>
            </h1>

        <?php endif; ?>

        <?php if ( $adammobile_content != '' ) : ?>

            <div id="site-error-box-header">
                <?php echo balanceTags( $adammobile_content, true ); ?>
            </div>

        <?php endif; ?>

        <div id="site-error-box-body">
            <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'adammobile'); ?>">
                <?php esc_html_e('Go to the Home Page', 'adammobile'); ?>
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>