<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class adammobile_widget_slides extends Widget_Base {

    public function get_categories() {
        return array( 'adammobile-widgets' );
    }

    public function get_name() {
        return 'slides-theme';
    }

    public function get_title() {
        return esc_html__( 'Slides Theme', 'adammobile' );
    }

    public function get_icon() {
        return 'eicon-slideshow';
    }

    public function get_script_depends() {
        return ['owl-carousel', 'element-custom'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Slides', 'adammobile' ),
            ]
        );

        $this->add_control(
            'slides-list',
            [
                'label'     =>  esc_html__( 'Slides', 'adammobile' ),
                'type'      =>  Controls_Manager::REPEATER,
                'default'   =>  [
                    [
                        'slides_title'    =>  esc_html__( 'Ready...set...Go!', 'adammobile' ),
                        'slides_content'  =>  esc_html__( 'I am slide content. Click edit button to change this text', 'adammobile' ),
                        'slides_button'   =>  esc_html__( 'Click Here', 'adammobile' ),
                        'slides_link'     =>  '#'
                    ],
                ],
                'fields' => [
                    [
                        'name'      =>  'slides_image',
                        'label'     =>  esc_html__( 'Image', 'adammobile' ),
                        'type'      =>  Controls_Manager::MEDIA,
                        'default'   =>  [
                            'url'   =>  Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name'          =>  'slides_title',
                        'label'         =>  esc_html__( 'Title & Description', 'adammobile' ),
                        'type'          =>  Controls_Manager::TEXT,
                        'default'       =>  esc_html__( 'Ready...set...Go!' , 'adammobile' ),
                        'label_block'   =>  true,
                    ],
                    [
                        'name'          =>  'slides_content',
                        'label'         =>  esc_html__( 'Content', 'adammobile' ),
                        'type'          =>  Controls_Manager::WYSIWYG,
                        'default'       =>  esc_html__( 'List Content' , 'adammobile' ),
                        'show_label'    =>  false,
                    ],
                    [
                        'name'          =>  'slides_button',
                        'label'         =>  esc_html__( 'Button Text', 'adammobile' ),
                        'type'          =>  Controls_Manager::TEXT,
                        'default'       =>  esc_html__( 'Click Here' , 'adammobile' ),
                        'label_block'   =>  false,
                    ],
                    [
                        'name'          =>  'slides_link',
                        'label'         =>  esc_html__( 'Link', 'adammobile' ),
                        'type'          =>  Controls_Manager::URL,
                        'label_block'   =>  true,
                        'default'       =>  [
                            'is_external'   =>  'true',
                        ],
                        'placeholder'   =>  esc_html__( 'https://your-link.com', 'adammobile' ),
                    ],
                ],
                'title_field'   =>  '{{{ slides_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_setting_slider',
            [
                'label' => esc_html__( 'Setting Slider', 'adammobile' ),
                'tab' => Controls_Manager::TAB_SETTINGS
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'adammobile'),
                'label_off'     =>  esc_html__('No', 'adammobile'),
                'label_on'      =>  esc_html__('Yes', 'adammobile'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         => esc_html__('Autoplay?', 'adammobile'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'adammobile'),
                'label_on'      => esc_html__('Yes', 'adammobile'),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $adammobile_element_settings  =   $this->get_settings_for_display();

        $adammobile_slider_settings     =   [
            'loop'      =>  ( 'yes' === $adammobile_element_settings['loop'] ),
            'autoplay'  =>  ( 'yes' === $adammobile_element_settings['autoplay'] ),
        ];

?>

      <div class="element-slides owl-carousel owl-theme" data-settings='<?php echo esc_attr( wp_json_encode( $adammobile_slider_settings ) ); ?>'>

        <?php
        foreach ( $adammobile_element_settings['slides-list'] as $adammobile_slides_list_item ) :

            $adammobile_slides_image_item   =   $adammobile_slides_list_item['slides_image'];
            $adammobile_slides_btn_item     =   $adammobile_slides_list_item['slides_link'];
        ?>

            <div class="element-slides__item">
                <?php echo wp_get_attachment_image( $adammobile_slides_image_item['id'], 'full' ); ?>

                <div class="element-slides__container d-flex flex-column align-items-center justify-content-center">
                    <h2 class="element-slides__title">
                        <?php echo esc_html( $adammobile_slides_list_item['slides_title'] ); ?>
                    </h2>

                    <div class="element-slides__content">
                        <?php echo wp_kses_post( $adammobile_slides_list_item['slides_content'] ); ?>
                    </div>

                    <a class="element-slides__link" href="<?php echo esc_url( $adammobile_slides_btn_item['url'] ); ?>" <?php echo ( $adammobile_slides_btn_item['is_external'] ? 'target="_blank"' : '' ); ?>>
                        <?php echo esc_html( $adammobile_slides_list_item['slides_button'] ); ?>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>

      </div>

<?php

    }
    
}

Plugin::instance()->widgets_manager->register_widget_type( new adammobile_widget_slides );