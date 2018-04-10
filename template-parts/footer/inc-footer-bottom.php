<?php
//Global variable redux
global $adammobile_options;

$adammobile_copyright    =   $adammobile_options ["adammobile_footer_copyright_editor"] == '' ? 'Copyright &amp; Templaza' : $adammobile_options ["adammobile_footer_copyright_editor"];

?>

<div class="site-footer__bottom">
    <div class="container">
        <div class="site-copyright-menu">
            <div class="site-copyright">
                <?php echo wp_kses_post( $adammobile_copyright ); ?>
            </div>

        </div>
    </div>
</div>