
<?php
    global $adammobile_options;

    $adammobile_information_address   =   $adammobile_options['adammobile_information_address'];
    $adammobile_information_mail      =   $adammobile_options['adammobile_information_mail'];
    $adammobile_information_phone     =   $adammobile_options['adammobile_information_phone'];
    $adammobile_logotype              =   $adammobile_options['adammobile_type_logo'] == '' ? 'logo_image' : $adammobile_options['adammobile_type_logo'];

?>
<header id="home" class="header">
    <nav id="navigation" class="navbar-expand-lg">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hotline">
                            <a href="tel:0966062468" title=""><i class="fa fa-phone"></i>Hà Nội: 0966.06.2468</a>
                            <a href="tel:0984768260" title=""><i class="fa fa-phone"></i>Sơn La: 0984.768.260</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="slogan">
                            <p>Adam Mobile – Hệ thống bán lẻ smartphone toàn quốc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="information">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">

                        <div class="site-logo">
                            <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">

                                <?php

                                if ( $adammobile_logotype == 'logo_image' ) :

                                    $adammobile_img_url    =   $adammobile_options['adammobile_logo_images'];

                                    if ( $adammobile_img_url['url'] != '' ) :

                                        echo'<img src="'.esc_url( $adammobile_img_url['url'] ).'" alt="'.get_bloginfo('title').'" />';
                                    else :

                                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';

                                    endif;

                                else :

                                    $adammobile_text = $adammobile_options['adammobile_logo_name'];

                                    echo ('<span class="tz-logo-text">'.esc_html($adammobile_text).'</span>');

                                endif;

                                ?>

                            </a>
                            <h1>Adam Mobile</h1>
                            <button class="navbar-toggler" data-toggle="collapse" data-target=".site-menu">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </div>

                    </div>

                    <div class="col-md-8">

                        <?php get_search_form(); ?>

                    </div>

                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom_warp d-lg-flex align-items-center justify-content-lg-end">

                    <div class="site-menu collapse navbar-collapse d-lg-flex justify-content-lg-end">

                        <?php

                        if ( has_nav_menu('primary') ) :

                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'navbar-nav',
                                'container'      => false,
                            ) ) ;

                        else:

                        ?>

                            <ul class="main-menu">
                                <li>
                                    <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                        <?php esc_html_e( 'ADD TO MENU','adammobile' ); ?>
                                    </a>
                                </li>
                            </ul>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>