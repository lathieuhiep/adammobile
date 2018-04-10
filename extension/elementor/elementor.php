<?php

namespace Elementor;

class adammobile_plugin_elementor_widgets {

    /**
     * Plugin constructor.
     */
    public function __construct() {
        $this->adammobile_elementor_add_actions();
    }

    private function adammobile_elementor_add_actions() {

        add_action( 'elementor/widgets/widgets_registered', [$this, 'adammobile_elementor_widgets_registered'] );
        add_action( 'elementor/init', [$this, 'adammobile_elementor_widgets_int'] );

        add_action( 'elementor/preview/enqueue_styles', [$this, 'adammobile_elementor_style_preview']);

    }

    public function adammobile_elementor_widgets_registered() {
        $this->adammobile_elementor_includes();
    }

    public function adammobile_elementor_widgets_int() {
        $this->adammobile_elementor_register_widget();
    }

    public function adammobile_elementor_style_preview() {
        wp_enqueue_style( 'adammobile-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );
    }

    private function adammobile_elementor_includes() {

        foreach(glob( get_parent_theme_file_path( '/extension/elementor/widgets/*.php' ) ) as $file){
            require $file;
        }

    }

    private function adammobile_elementor_register_widget() {

        Plugin::instance()->elements_manager->add_category(
            'adammobile-widgets',
            [
                'title' =>  esc_html__( 'adammobile Widgets', 'adammobile' ),
                'icon'  =>  'icon-goes-here'
            ]
        );

    }

}

new adammobile_plugin_elementor_widgets();