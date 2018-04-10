<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class adammobile_widget_blog extends Widget_Base {

    public function get_categories() {
        return array( 'adammobile-widgets' );
    }

    public function get_name() {
        return 'blog';
    }

    public function get_title() {
        return esc_html__( 'Blog', 'adammobile' );
    }

    public function get_icon() {
        return 'eicon-document-file';
    }

    public function get_script_depends() {
        return ['owl-carousel'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' =>  esc_html__( 'General', 'adammobile' ),
            ]
        );

        $this->add_control(
            'widget_title',
            [
                'label'         =>  esc_html__( 'Tiêu đề', 'adammobile' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Tiêu bài viết', 'adammobile' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'widget_select_cat_blog',
            [
                'label'     =>  esc_html__( 'Danh mục bài viết', 'adammobile' ),
                'type'      =>  Controls_Manager::SELECT2,
                'options'   =>  adammobile_check_get_cat( 'category' ),
                'multiple'  =>  true,
            ]
        );

        $this->add_control(
            'widget_limit_post',
            [
                'label'     =>  esc_html__( 'Số bài viết cần lấy', 'adammobile' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  10,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'widget_order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'adammobile' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'    =>  esc_html__( 'ID', 'adammobile' ),
                    'name'  =>  esc_html__( 'Name', 'adammobile' ),
                    'date'  =>  esc_html__( 'Date', 'adammobile' ),
                ],
            ]
        );

        $this->add_control(
            'widget_order',
            [
                'label'     =>  esc_html__( 'Order', 'adammobile' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'ASC', 'adammobile' ),
                    'DESC'  =>  esc_html__( 'DESC', 'adammobile' ),
                ],
            ]
        );

        $this->add_control(
            'number_item',
            [
                'label'     =>  esc_html__( 'Số bài một hàng', 'adammobile' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  5,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Lặp Slider ?', 'adammobile'),
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

        $adammobile_elmentor_settings   =   $this->get_settings();
        $adammobile_blog_cat_id         =   $adammobile_elmentor_settings['widget_select_cat_blog'];

        $adammobile_slider_settings     =   [
            'number_item'           =>  $adammobile_elmentor_settings['number_item'],
            'margin_item'           =>  30,
            'loop'                  =>  ( 'yes' === $adammobile_elmentor_settings['loop'] ),
            'autoplay'              =>  ( 'yes' === $adammobile_elmentor_settings['autoplay'] ),
            'dots'                  =>  false,
            'nav'                   =>  false,
            'item_mobile'           =>  1,
            'margin_item_mobile'    =>  0,
            'item_tablet'           =>  3
        ];

        if ( !empty( $adammobile_blog_cat_id ) ) :

            $adammobile_our_blog_args = array(

                'post_type'         =>  'post',
                'cat'               =>  $adammobile_blog_cat_id,
                'posts_per_page'    =>  $this->get_settings( 'widget_limit_post' ),
                'orderby'           =>  $this->get_settings( 'widget_order_by' ),
                'order'             =>  $this->get_settings( 'widget_order' ),

            );

        else:

            $adammobile_our_blog_args = array(

                'post_type'         =>  'post',
                'posts_per_page'    =>  $this->get_settings( 'widget_limit_post' ),
                'orderby'           =>  $this->get_settings( 'widget_order_by' ),
                'order'             =>  $this->get_settings( 'widget_order' ),

            );

        endif;

        $adammobile_our_blog_post    =   new \ WP_Query( $adammobile_our_blog_args ) ;

?>
        <div class="element-blog">

            <?php if ( !empty( $adammobile_elmentor_settings['widget_title'] ) ) : ?>

                <h2 class="element-blog__title">
                    <?php echo esc_html( $adammobile_elmentor_settings['widget_title'] ); ?>
                </h2>

            <?php endif; ?>

            <div class="element-blog__container owl-carousel owl-theme" data-settings='<?php echo esc_attr( wp_json_encode( $adammobile_slider_settings ) ); ?>'>

                <?php
                while ( $adammobile_our_blog_post -> have_posts() ) :
                    $adammobile_our_blog_post -> the_post();

                ?>

                    <div class="element-blog__item d-lg-flex flex-lg-column">
                        <div class="element-blog__item--img d-lg-flex align-items-lg-center">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        </div>

                        <div class="element-blog__item--content">
                            <h3 class="element-blog__item--title text-center">
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <div class="element-blog__item--content">
                                <?php
                                if ( has_excerpt() ) :
                                    the_excerpt();
                                else:
                                ?>
                                    <p>
                                        <?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata();
                ?>

            </div>
        </div>

<?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new adammobile_widget_blog );