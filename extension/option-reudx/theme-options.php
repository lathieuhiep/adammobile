<?php
/**
 * ReduxFramework Config File
 * TemPlaza Plazart Default Theme
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}


// This is your option name where all the Redux data is stored.
$adammobile_opt_name = "adammobile_options";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * */

$adammobile_theme = wp_get_theme(); // For use with some settings. Not necessary.

$adammobile_opt_args = array(

    'opt_name'             => $adammobile_opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $adammobile_theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $adammobile_theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => false,
    // Show the sections below the admin menu item or not
    'menu_title'           => $adammobile_theme->get( 'Name' ) . esc_html__(' Options', 'adammobile'),
    'page_title'           => $adammobile_theme->get( 'Name' ) . esc_html__(' Options', 'adammobile'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,

    // OPTIONAL -> Give you extra features
    'page_priority'        => 2,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'             =>  array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     =>  array(
            'color'     => 'red',
            'shadow'    =>  true,
            'rounded'   =>  false,
            'style'     =>  '',
        ),
        'tip_position'  =>  array(
            'my'        =>  'top left',
            'at'        =>  'bottom right',
        ),
        'tip_effect'    =>  array(
            'show'      =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'mouseover',
            ),
            'hide'  =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'click mouseleave',
            ),
        ),
    )
);
Redux::setArgs( $adammobile_opt_name, $adammobile_opt_args );
/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$adammobile_opt_tabs = array(
    array(
        'id'        =>  'redux-help-tab-1',
        'title'     =>  esc_html__( 'Theme Information 1', 'adammobile' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'adammobile' )
    ),
    array(
        'id'        =>  'redux-help-tab-2',
        'title'     =>  esc_html__( 'Theme Information 2', 'adammobile' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'adammobile' )
    )
);
Redux::setHelpTab( $adammobile_opt_name, $adammobile_opt_tabs );

// Set the help sidebar
$adammobile_opt_content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'adammobile' );
Redux::setHelpSidebar( $adammobile_opt_name, $adammobile_opt_content );


/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

// -> START option background

Redux::setSection( $adammobile_opt_name, array(
    'id'                =>   'adammobile_theme_option',
    'title'             =>   $adammobile_theme->get( 'Name' ).' '.$adammobile_theme->get( 'Version' ),
    'customizer_width'  =>   '400px',
    'icon'              =>   '',
));

// -> END option background

/* Start General Options */

Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( 'General Options', 'adammobile' ),
    'id'                =>  'adammobile_general',
    'desc'              =>  esc_html__( 'General all config', 'adammobile' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-th-large',
));

// Favicon Config
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Favicon', 'adammobile' ),
    'id'            =>  'adammobile_favicon_config',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'adammobile_favicon_upload',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload Favicon Image', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'Favicon image for your website', 'adammobile' ),
            'desc'      =>  esc_html__( '', 'adammobile' ),
            'default'   =>  false,
        ),
    )
));

//Loading config
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Loading config', 'adammobile' ),
    'id'            =>  'adammobile_general_loading',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'adammobile_general_show_loading',
            'type'      =>  'switch',
            'title'     =>  esc_html__( 'Loading On/Off', 'adammobile' ),
            'default'   =>  false,
        ),
        array(
            'id'        =>  'adammobile_general_image_loading',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload image loading', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'Upload image .gif', 'adammobile' ),
            'default'   =>  '',
            'required'  =>  array( 'adammobile_general_show_loading', '=', true ),
        ),
    )
));

//Background Options
Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( 'Background', 'adammobile' ),
    'id'                =>  'adammobile_background',
    'desc'              =>  esc_html__( 'Background all config', 'adammobile' ),
    'customizer_width'  =>  '400px',
    'subsection'        => true,
    'fields'            => array(
        array(
            'id'        =>  'adammobile_background_body',
            'output'    =>  'body',
            'type'      =>  'background',
            'clone'     =>  'true',
            'title'     =>  esc_html__( 'Body background', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'Body background with image, color, etc.', 'adammobile' ),
            'hint'      =>  array(
                'content'   =>  'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
            )
        ),
    ),
));

/* End General Options */

/* Start Header Options */
Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( 'Header Options', 'adammobile' ),
    'id'                =>  'adammobile_header',
    'desc'              =>  esc_html__( 'Header all config', 'adammobile' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-up',
));

//Logo Config
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Logo', 'adammobile' ),
    'id'            =>  'adammobile_logo_config',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'adammobile_type_logo',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Logo Type', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'select type for logo', 'adammobile' ),
            'default'   =>  'logo_image',
            'options'   =>  array(
                'logo_image'    =>  'Logo Image',
                'logo_text'     =>  'Logo Text'
            )
        ),

        array(
            'id'        =>  'adammobile_logo_images',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload logo', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'logo image for your website', 'adammobile' ),
            'desc'      =>  esc_html__( '', 'adammobile' ),
            'default'   =>  false,
            'required'  =>  array( 'adammobile_type_logo', '=', array( 'logo_image' ) )
        ),

        array(
            'id'                => 'adammobile_logo_images_size',
            'type'              => 'dimensions',
            'units'             => array( 'em', 'px', '%' ),
            'title'             => esc_html__( 'Set width/height for logo', 'adammobile' ),
            'subtitle'          => esc_html__( '', 'adammobile' ),
            'units_extended'    => 'true',
            'default'           => array(
                'width'     =>  '',
                'height'    =>  '',
            ),
            'output'         => array('.adammobile_logo img'),
            'required' => array( 'adammobile_type_logo', '=', array( 'logo_image' ) )
        ),

        array(
            'id'            =>  'adammobile_logo_name',
            'type'          =>  'text',
            'title'         =>  esc_html__( 'Logo Text', 'adammobile' ),
            'subtitle'      =>  esc_html__( 'logo name for your website', 'adammobile' ),
            'desc'          =>  esc_html__( '', 'adammobile' ),
            'default'       =>  $adammobile_theme->get( 'Name' ),
            'placeholder'   =>  $adammobile_theme->get( 'Name' ),
            'required'      =>  array( 'adammobile_type_logo', '=', array( 'logo_text' ) )
        ),

        array(
            'id'        =>  'adammobile_logo_name_color',
            'type'      =>  'color',
            'title'     =>  esc_html__( 'Color text', 'adammobile' ),
            'desc'      =>  esc_html__( '', 'adammobile' ),
            'output'    =>  '.adammobile_logo .tz-logo-text',
            'required'  =>  array( 'adammobile_type_logo', '=', array( 'logo_text' ) )
        ),

    )
));

// information
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Information', 'adammobile' ),
    'id'            =>  'adammobile_information_config',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'adammobile_information_address',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Address', 'adammobile' ),
            'default'   =>  '988782, Our Street, S State.',
        ),

        array(
            'id'        =>  'adammobile_information_mail',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Mail', 'adammobile' ),
            'default'   =>  'info@domain.com',
        ),

        array(
            'id'        =>  'adammobile_information_phone',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Phone', 'adammobile' ),
            'default'   =>  '+1 234 567 186',
        ),

    )
));

/* End Header Options */

/* Start Social Network */
Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( 'Social Network', 'adammobile' ),
    'id'                =>  'adammobile_social_network',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-globe-alt',
    'fields'            =>  array(

        array(
            'id'        =>  'adammobile_social_network_facebook',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Facebook', 'adammobile' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'adammobile_social_network_twitter',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Twitter', 'adammobile' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'adammobile_social_network_google-plus',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Google Plus', 'adammobile' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'adammobile_social_network_linkedin',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Linkedin', 'adammobile' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'adammobile_social_network_pinterest',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Pinterest', 'adammobile' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'adammobile_social_network_youtube',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Youtube', 'adammobile' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'adammobile_social_network_instagram',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Instagram', 'adammobile' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'adammobile_social_network_vimeo',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Vimeo', 'adammobile' ),
            'default'   =>  '#',
        ),

    )
));
/* End Social Network */

/* Start Shop */
Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( 'Shop', 'adammobile' ),
    'id'                =>  'adammobile_shop',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-shopping-cart',
    'fields'            =>  array(

        array(
            'id'        =>  'adammobile_shop_sidebar',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Show Sidebar', 'adammobile' ),
            'default'   =>  0,
            'options'   =>  array(
                0   =>  esc_html__( 'No', 'adammobile' ),
                1   =>  esc_html__( 'Yes', 'adammobile' ),
            )
        ),

        array(
            'id'        =>  'adammobile_shop_limit',
            'type'      =>  'slider',
            'title'     =>  esc_html__( 'Số sản phẩm trên một trang', 'adammobile' ),
            "default"   =>  15,
            "min"       =>  1,
            "step"      =>  1,
            "max"       =>  500,
        ),

    )
) );

/* End Shop */

/* Start Typography Options */
Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( 'Typography', 'adammobile' ),
    'id'                =>  'adammobile_typography',
    'desc'              =>  esc_html__( 'Typography all config', 'adammobile' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-fontsize'
));

// Body font
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Body Typography', 'adammobile' ),
    'id'            =>  'adammobile_body_typography',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'adammobile_body_typography_font',
            'type'      =>  'typography',
            'output'    =>  array( 'body' ),
            'title'     =>  esc_html__( 'Body Font', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'Specify the body font properties.', 'adammobile' ),
            'google'    =>  true,
            'default'   =>  array(
                'color'         =>  '',
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
            ),
        ),

        array(
            'id'        =>  'adammobile_link_color',
            'type'      =>  'link_color',
            'output'    =>  array( 'a' ),
            'title'     =>  esc_html__( 'Link Color', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'Controls the color of all text links.', 'adammobile' ),
            'default'   =>  ''
        ),
    )
));

// Header font
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Custom Typography', 'adammobile' ),
    'id'            =>  'adammobile_custom_typography',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'adammobile_custom_typography_1',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 1 Typography', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 1.', 'adammobile' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 1
        array(
            'id'        =>  'adammobile_custom_typography_1_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 1', 'adammobile' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'adammobile' ),
            'default'   =>  ''
        ),

        array(
            'id'        =>  'adammobile_custom_typography_2',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 2 Typography', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 2.', 'adammobile' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 2
        array(
            'id'        => 'adammobile_custom_typography_2_selector',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Selectors 2', 'adammobile' ),
            'desc'      => esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'adammobile' ),
            'default'   => ''
        ),

        array(
            'id'        =>  'adammobile_custom_typography_3',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 3 Typography', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 3.', 'adammobile' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
            'output'    =>  '',
        ),

        //selector custom typo 3
        array(
            'id'        =>  'adammobile_custom_typography_3_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 3', 'adammobile' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'adammobile' ),
            'default'   =>  ''
        ),

    )
));

/* End Typography Options */

/* Start Blog Single */
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Blog Single', 'adammobile' ),
    'id'            =>  'adammobile_blog_single',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'adammobile_blog_single_sidebar',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Sidebar', 'adammobile' ),
            'subtitle'  =>  esc_html__( '', 'adammobile' ),
            'default'   =>  1,
            'options'   =>  array(
                1 =>  array(
                    'alt'   =>  'None Sidebar',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/1col.png'
                ),

                2 =>  array(
                    'alt'   =>  'Sidebar Left',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cl.png'
                ),

                3 =>  array(
                    'alt'   =>  'Sidebar Right',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cr.png'
                ),

            ),
        ),

    )
));
/* End Blog Single */

/* Start 404 Options */
Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( '404 Options', 'adammobile' ),
    'id'                =>  'adammobile_404',
    'desc'              =>  esc_html__( '404 page all config', 'adammobile' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-warning-sign',
    'fields'            =>  array(

        array(
            'id'        =>  'adammobile_404_background',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( '404 Background', 'adammobile' ),
            'default'   =>  false,
        ),

        array(
            'id'        =>  'adammobile_404_title',
            'type'      =>  'text',
            'title'     =>  esc_html__( '404 Title', 'adammobile' ),
            'default'   =>  false,
        ),

        array(
            'id'        =>  'adammobile_404_editor',
            'type'      =>  'editor',
            'title'     =>  esc_html__( '404 Content', 'adammobile' ),
            'default'   =>  false,
        ),

    )
));
/* End 404 Options */

/* Start Footer Options */
Redux::setSection( $adammobile_opt_name, array(
    'title'             =>  esc_html__( 'Footer Options', 'adammobile' ),
    'id'                =>  'adammobile_footer',
    'desc'              =>  esc_html__( 'Footer all config', 'adammobile' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-down'
));

//Footer Content
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Footer content', 'adammobile' ),
    'id'            =>  'adammobile_footer_content',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'adammobile_footer_column_col',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Number of Footer Columns', 'adammobile' ),
            'subtitle'  =>  esc_html__( 'Controls the number of columns in the footer', 'adammobile' ),
            'default'   =>  0,
            'options'   =>  array(
                '0' =>  array(
                    'alt'   =>  'No Footer',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/no-footer.png' )
                ),

                '1' =>  array(
                    'alt'   =>  '1 Columnn',
                    'img'   =>  get_theme_file_uri(  '/extension/assets/images/1column.png' )
                ),

                '2' =>  array(
                    'alt'   =>  '2 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/2column.png' )
                ),
                '3' =>  array(
                    'alt'   =>  '3 Columnn',
                    'img'   =>  get_theme_file_uri(   '/extension/assets/images/3column.png' )
                ),
                '4' =>  array(
                    'alt'   =>  '4 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/4column.png' )
                ),
            ),
        ),

        array(
            'id'            =>  'adammobile_footer_column_w1',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 1', 'adammobile' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'adammobile' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'adammobile' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'adammobile_footer_column_col', 'equals','1', '2', '3', '4' ),
                array( 'adammobile_footer_column_col', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'adammobile_footer_column_w2',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 2', 'adammobile' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'adammobile' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'adammobile' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'adammobile_footer_column_col', 'equals', '2', '3', '4' ),
                array( 'adammobile_footer_column_col', '!=', '1' ),
                array( 'adammobile_footer_column_col', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'adammobile_footer_column_w3',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 3', 'adammobile' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'adammobile' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'adammobile' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'adammobile_footer_column_col', 'equals', '3', '4' ),
                array( 'adammobile_footer_column_col', '!=', '1' ),
                array( 'adammobile_footer_column_col', '!=', '2' ),
                array( 'adammobile_footer_column_col', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'adammobile_footer_column_w4',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 4', 'adammobile' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'adammobile' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'adammobile' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'adammobile_footer_column_col',  'equals', '4' ),
                array( 'adammobile_footer_column_col', '!=', '1' ),
                array( 'adammobile_footer_column_col', '!=', '2' ),
                array( 'adammobile_footer_column_col', '!=', '3' ),
                array( 'adammobile_footer_column_col', '!=', '0' ),
            )
        ),
    )

));

//Copyright
Redux::setSection( $adammobile_opt_name, array(
    'title'         =>  esc_html__( 'Copyright', 'adammobile' ),
    'id'            =>  'adammobile_footer_copyright',
    'desc'          =>  esc_html__( '', 'adammobile' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'            =>  'adammobile_footer_copyright_editor',
            'type'          =>  'editor',
            'title'         =>  esc_html__( 'Enter content copyright', 'adammobile' ),
            'full_width'    =>  true,
            'default'       =>  'Copyright &amp; DiepLK',
            'args' => array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny'         => false,
                'quicktags'     => true,
            )
        ),
    )
));

/* End Footer Options */


/*
 * <--- END SECTIONS
 */

// Function to test the compiler hook and demo CSS output.
add_filter('redux/options/' . $adammobile_opt_name . '/compiler', 'compiler_action', 10, 3);

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        print_r($options); //Option values
        print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}
