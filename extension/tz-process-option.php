<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action('wp_head','adammobile_config_theme');

        function adammobile_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $adammobile_options;
                    $adammobile_favicon = $adammobile_options['adammobile_favicon_upload']['url'];

                    if( $adammobile_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url($adammobile_favicon) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @since Plazart Theme 1.1
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'adammobile_custom_css', 99 );

        function adammobile_custom_css() {

            global $adammobile_options;

            $adammobile_typo_selecter_1   =   $adammobile_options['adammobile_custom_typography_1_selector'];

            $adammobile_typo1_font_family   =   $adammobile_options['adammobile_custom_typography_1']['font-family'] == '' ? '' : $adammobile_options['adammobile_custom_typography_1']['font-family'];

            $adammobile_css_style = '';

            if ( $adammobile_typo1_font_family != '' ) :
                $adammobile_css_style .= ' '.esc_attr( $adammobile_typo_selecter_1 ).' { font-family: '.balanceTags( $adammobile_typo1_font_family, true ).' }';
            endif;

            if ( $adammobile_css_style != '' ) :
                wp_add_inline_style( 'adammobile-style', $adammobile_css_style );
            endif;

        }

    endif;
