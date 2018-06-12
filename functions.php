<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*
 *constants
 */
if( !function_exists('adammobile_setup') ):

    function adammobile_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'adammobile', get_parent_theme_file_path( '/languages' ) );

        /**
         * plazart theme setup.
         *
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        //Enable support for Header (tz-demo)
        add_theme_support( 'custom-header' );

        //Enable support for Background (tz-demo)
        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menu('primary','Primary Menu');

        // add theme support title-tag
        add_theme_support( 'title-tag' );

        /*
	    * This theme styles the visual editor to resemble the theme style,
	    * specifically font, colors, icons, and column width.
	    */
        add_editor_style( array( 'css/editor-style.css', adammobile_fonts_url()) );
    }

    add_action( 'after_setup_theme', 'adammobile_setup' );

endif;

/*
* Required: include plugin theme scripts
*/
require get_parent_theme_file_path( '/extension/tz-process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
    /*
     * Required: Meta Box Framework
     */
    require get_parent_theme_file_path( '/extension/meta-box/meta-box-options.php' );
}

if ( ! function_exists( 'adammobile_check_rwmb_meta' ) ) {
    function adammobile_check_rwmb_meta( $adammobile_rwmb_metakey, $adammobile_opt_args = '', $adammobile_rwmb_post_id = null ) {
        return false;
    }
}

if ( ! function_exists( '_is_elementor_installed' ) ) :
    /*
     * Required: Elementor
     */
    require get_parent_theme_file_path( '/extension/elementor/elementor.php' );

endif;

if ( class_exists('Woocommerce') ) :
    /*
     * Required: Woocommerce
     */
    require get_parent_theme_file_path( '/extension/woocommerce/hooks.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/functions.php' );

endif;


/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'adammobile_widgets_init');

function adammobile_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'adammobile'),
        'id'            => 'adammobile-sidebar',
        'description'   => esc_html__( 'Display sidebar right or left on all page.', 'adammobile' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'adammobile' ),
        'id'            => 'adammobile-footer-1',
        'description'   => esc_html__( 'Display footer column 1 on all page.', 'adammobile' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'adammobile' ),
        'id'            => 'adammobile-footer-2',
        'description'   => esc_html__( 'Display footer column 2 on all page.', 'adammobile' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'adammobile' ),
        'id'            => 'adammobile-footer-3',
        'description'   => esc_html__( 'Display footer column 3 on all page.', 'adammobile' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'adammobile' ),
        'id'            => 'adammobile-footer-4',
        'description'   => esc_html__( 'Display footer column 4 on all page.', 'adammobile' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'adammobile_register_back_end_scripts');

function adammobile_register_back_end_scripts(){

    /* Start Get CSS Admin */
    wp_enqueue_style( 'adammobile-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}


//Register Front-End Styles
add_action('wp_enqueue_scripts', 'adammobile_register_front_end');

function adammobile_register_front_end() {

    /*
    * Start Get Css Front End
    * */

    /* Start Bootstrap Css */
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/css/bootstrap.min.css' ), array(), '4.0.0' );
    /* End Bootstrap Css */

    /* Start Font Awesome */
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ), array(), '4.7.0' );
    /* End Font Awesome */

    /* Start Font */
    wp_enqueue_style( 'adammobile-fonts', adammobile_fonts_url(), array(), null );
    /* End Font */

    /* Start Carousel Css */
    wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/css/owl.carousel.min.css' ), array(), '2.2.1' );
    wp_enqueue_style( 'owl-theme-default', get_theme_file_uri( '/css/owl.theme.default.min.css' ), array(), '2.2.1' );
    /* End Carousel Css */

    /*  Start Style Css   */
    wp_enqueue_style( 'adammobile-style', get_stylesheet_uri() );
    /*  Start Style Css   */

    /*
    * End Get Css Front End
    * */


    /*
    * Start Get Js Front End
    * */

    // Load the html5 shiv.

    wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.0' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/js/bootstrap.min.js' ), array('jquery'), '4.0.0', true );

    wp_register_script( 'owl-carousel', get_theme_file_uri( '/js/owl.carousel.min.js' ), array(), '2.2.1', true );

    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() || is_home()){

        /* Start Carousel Js */
        wp_enqueue_script( 'owl-carousel' );
        /* End Carousel Js */

    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'adammobile-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.0.0', true );
    wp_register_script( 'element-custom', get_theme_file_uri( '/js/element-custom.js' ), array(), '1.0.0', true );

    /*
   * End Get Js Front End
   * */

}

/**
 * Show full editor
 */
if ( !function_exists('adammobile_ilc_mce_buttons') ) :

    function adammobile_ilc_mce_buttons( $adammobile_buttons_TinyMCE ) {

        array_push( $adammobile_buttons_TinyMCE,
                "backcolor",
                "anchor",
                "hr",
                "sub",
                "sup",
                "fontselect",
                "fontsizeselect",
                "styleselect",
                "cleanup"
            );

        return $adammobile_buttons_TinyMCE;

    }

    add_filter("mce_buttons_2", "adammobile_ilc_mce_buttons");

endif;

// Start Customize mce editor font sizes
if ( ! function_exists( 'adammobile_mce_text_sizes' ) ) :

    function adammobile_mce_text_sizes( $adammobile_font_size_text ){
        $adammobile_font_size_text['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $adammobile_font_size_text;
    }

    add_filter( 'tiny_mce_before_init', 'adammobile_mce_text_sizes' );

endif;
// End Customize mce editor font sizes

/* callback comment list */
function adammobile_comments( $adammobile_comment, $adammobile_comment_args, $adammobile_comment_depth ) {

    if ( 'div' === $adammobile_comment_args['style'] ) :

        $adammobile_comment_tag       = 'div';
        $adammobile_comment_add_below = 'comment';

    else :

        $adammobile_comment_tag       = 'li';
        $adammobile_comment_add_below = 'div-comment';

    endif;

?>
    <<?php echo $adammobile_comment_tag ?> <?php comment_class( empty( $adammobile_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $adammobile_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <div class="comment-author vcard">
        <?php if ( $adammobile_comment_args['avatar_size'] != 0 ) echo get_avatar( $adammobile_comment, $adammobile_comment_args['avatar_size'] ); ?>

    </div>

    <?php if ( $adammobile_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
            <?php esc_html_e( 'Your comment is awaiting moderation.', 'adammobile' ); ?>
        </em>
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

            <?php edit_comment_link( esc_html__( 'Edit ', 'adammobile' ) ); ?>

            <?php comment_reply_link( array_merge( $adammobile_comment_args, array( 'add_below' => $adammobile_comment_add_below, 'depth' => $adammobile_comment_depth, 'max_depth' => $adammobile_comment_args['max_depth'] ) ) ); ?>

        </div>
        <div class="comment-text-box">
            <?php comment_text(); ?>
        </div>
    </div>

    <?php if ( 'div' != $adammobile_comment_args['style'] ) : ?>
        </div>
    <?php endif; ?>

<?php
}
/* callback comment list */

if ( ! function_exists( 'adammobile_fonts_url' ) ) :

    function adammobile_fonts_url() {
        $adammobile_fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $adammobile_font_google = _x( 'on', 'Open Sans font: on or off', 'adammobile' );

        if ( 'off' !== $adammobile_font_google ) {
            $adammobile_font_families = array();

            if ( 'off' !== $adammobile_font_google ) {
                $adammobile_font_families[] = 'Open Sans:400,700';
            }

            $adammobile_query_args = array(
                'family' => urlencode( implode( '|', $adammobile_font_families ) ),
                'subset' => urlencode( 'latin' ),
            );

            $adammobile_fonts_url = add_query_arg( $adammobile_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $adammobile_fonts_url );
    }

endif;

/*
 * Content Nav
 */

if ( ! function_exists( 'adammobile_comment_nav' ) ) :

    function adammobile_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
                    <?php _e( 'Comment navigation', 'adammobile' ); ?>
                </h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'adammobile' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'adammobile' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

    <?php
        endif;
    }

endif;

/*
 * TWITTER AMPERSAND ENTITY DECODE
 */
if( ! function_exists( 'adammobile_social_title' )):

    function adammobile_social_title( $adammobile_title ) {

        $adammobile_title = html_entity_decode( $adammobile_title );
        $adammobile_title = urlencode( $adammobile_title );

        return $adammobile_title;

    }

endif;

/****************************************************************************************************************
 * Fuction override post_class()
 * */

if ( ! function_exists( 'adammobile_post_classes' ) ) :

    function adammobile_post_classes( $adammobile_body_class ) {

        if ( is_category() || is_tag() || is_search() || is_author() || is_archive() || is_home() ) {
            $adammobile_body_class[] = 'site-post-item';
        }

        if ( is_single() ) {
            $adammobile_body_class[] = 'site-post-single-item';
        }
        return $adammobile_body_class;

    }

    add_filter( 'post_class', 'adammobile_post_classes' );

endif;

/**
 * Include the TGM_Plugin_Activation class.
 */
require get_parent_theme_file_path( '/plugins/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'adammobile_register_required_plugins' );
function adammobile_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $adammobile_plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Redux Framework',
            'slug'      =>  'redux-framework',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Meta Box',
            'slug'      =>  'meta-box',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Elementor',
            'slug'      =>  'elementor',
            'required'  =>  true,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $adammobile_config = array(
        'id'           => 'adammobile',          // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $adammobile_plugins, $adammobile_config );
}

/* Start Social Network */
function adammobile_get_social_url() {

    global $adammobile_options;
    $adammobile_social_networks = adammobile_get_social_network();

?>

    <ul class="site-social d-flex">

        <?php
        foreach( $adammobile_social_networks as $adammobile_social ) :

            $adammobile_social_url = $adammobile_options['adammobile_social_network_' . $adammobile_social['id']];

            if( $adammobile_social_url ) :

        ?>

                <li>
                    <a href="<?php echo esc_url( $adammobile_social_url ); ?>">
                        <i class="fa fa-<?php echo esc_attr( $adammobile_social['id'] ); ?>" aria-hidden="true"></i>
                    </a>
                </li>

        <?php
            endif;

        endforeach;
        ?>

    </ul>

<?php

}

function adammobile_get_social_network() {
    return array(

        array('id' => 'facebook', 'title' => 'Facebook'),
        array('id' => 'twitter', 'title' => 'Twitter'),
        array('id' => 'google-plus', 'title' => 'Google Plus'),
        array('id' => 'linkedin', 'title' => 'linkedin'),
        array('id' => 'pinterest', 'title' => 'Pinterest'),
        array('id' => 'youtube', 'title' => 'Youtube'),
        array('id' => 'instagram', 'title' => 'instagram'),
        array('id' => 'vimeo', 'title' => 'Vimeo'),

    );
}
/* End Social Network */

/* Start pagination */
function adammobile_pagination() {

    the_posts_pagination( array(
        'type' => 'list',
        'mid_size' => 2,
        'prev_text' => esc_html__( 'Previous', 'adammobile' ),
        'next_text' => esc_html__( 'Next', 'adammobile' ),
        'screen_reader_text' => esc_html__( '&nbsp;', 'adammobile' ),
    ) );

}

function adammobile_sanitize_pagination( $adammobile_content ) {
    // Remove role attribute
    $adammobile_content = str_replace('role="navigation"', '', $adammobile_content);

    // Remove h2 tag
    $adammobile_content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $adammobile_content);

    return $adammobile_content;
}

add_action('navigation_markup_template', 'adammobile_sanitize_pagination');
/* End pagination */

/* Start get Category check box */
function adammobile_check_get_cat( $adammobile_check_type_taxonomy ) {

    $adammobile_cat_check    =   array();
    $adammobile_category     =   get_categories( array( 'taxonomy'   =>  $adammobile_check_type_taxonomy ) );

    if ( isset( $adammobile_category ) && !empty( $adammobile_category ) ):

        foreach( $adammobile_category as $adammobile_cate ) {

            $adammobile_cat_check[$adammobile_cate->term_id]  =   $adammobile_cate->name;

        }

    endif;

    return $adammobile_cat_check;

}
/* End get Category check box */

// function remove editor menu admin
function adammobile_remove_editor_menu() {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'adammobile_remove_editor_menu', 1);