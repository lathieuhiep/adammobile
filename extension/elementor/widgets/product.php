<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class adammobile_widget_product extends Widget_Base {

    public function get_categories() {
        return array( 'adammobile-widgets' );
    }

    public function get_name() {
        return 'san-pham';
    }

    public function get_title() {
        return esc_html__( 'Sản Phẩm', 'adammobile' );
    }

    public function get_icon() {
        return 'fa fa-shopping-cart';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_product',
            [
                'label' => esc_html__( 'Sản Phẩm', 'adammobile' ),
            ]
        );

        $this->add_control(
            'widget_title',
            [
                'label'         =>  esc_html__( 'Tiêu đề', 'adammobile' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Title sản phẩm', 'adammobile' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'column_product_number',
            [
                'label'     =>  esc_html__( 'Số Cột', 'adammobile' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  5,
                'options'   =>  [
                    5   =>  esc_html__( '5 Cột', 'adammobile' ),
                    4   =>  esc_html__( '4 Cột', 'adammobile' ),
                    3   =>  esc_html__( '3 Cột', 'adammobile' ),
                    2   =>  esc_html__( '2 Cột', 'adammobile' ),
                    1   =>  esc_html__( '1 Cột', 'adammobile' ),
                ],
            ]
        );

        $this->add_control(
            'select_product_cat',
            [
                'label'     =>  esc_html__( 'Danh mục sản phẩm', 'adammobile' ),
                'type'      =>  Controls_Manager::SELECT2,
                'options'   =>  adammobile_check_get_cat( 'product_cat' ),
                'multiple'  =>  true,
            ]
        );

        $this->add_control(
            'product_limit',
            [
                'label'     =>  esc_html__( 'Số sản phẩm', 'adammobile' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  15,
                'min'       =>  1,
                'max'       =>  200,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'product_order_by',
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
            'product_order',
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

        $this->end_controls_section();

    }

    protected function render() {

        $adammobile_elmentor_settings   =   $this->get_settings();
        $adammobile_product_col_number  =   $adammobile_elmentor_settings['column_product_number'];
        $adammobile_prodcut_cat_id      =   $adammobile_elmentor_settings['select_product_cat'];

        if ( $adammobile_product_col_number == 5 ) :
            $adammobile_product_class_col =  'col-6 col-sm-4 col-md-4 col-lg-3 dst-col-2';
        elseif ( $adammobile_product_col_number == 4 ) :
            $adammobile_product_class_col = 'col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3';
        elseif ( $adammobile_product_col_number == 3 ) :
            $adammobile_product_class_col = 'col-6 col-sm-4 col-md-4 col-lg-4';
        elseif ( $adammobile_product_col_number == 2 ) :
            $adammobile_product_class_col = 'col-lg-6 col-md-6 col-sm-6';
        else:
            $adammobile_product_class_col = 'col-lg-12 col-md-12';
        endif;

        if ( !empty( $adammobile_prodcut_cat_id ) ) :

            $adammobile_product_args = array(

                'post_type'         =>  'product',
                'posts_per_page'    =>  $adammobile_elmentor_settings['product_limit'],
                'orderby'           =>  $adammobile_elmentor_settings['product_order_by'],
                'order'             =>  $adammobile_elmentor_settings['product_order'],
                'tax_query'         =>  array(
                    array(
                        'taxonomy'  =>  'product_cat',
                        'field'     =>  'id',
                        'terms'     =>   $adammobile_prodcut_cat_id
                    )
                )

            );

        else:

            $adammobile_product_args = array(

                'post_type'         =>  'product',
                'posts_per_page'    =>  $this->get_settings( 'product_limit' ),
                'orderby'           =>  $this->get_settings( 'product_order_by' ),
                'order'             =>  $this->get_settings( 'product_order' ),

            );

        endif;

        $adammobile_product_query    =   new \ WP_Query( $adammobile_product_args ) ;

        if ( $adammobile_product_query->have_posts() ) :

    ?>

            <div class="element-product text-center">

                <?php if ( !empty( $adammobile_elmentor_settings['widget_title'] ) ) : ?>

                    <h2 class="element-blog__title text-left">
                        <?php echo esc_html( $adammobile_elmentor_settings['widget_title'] ); ?>
                    </h2>

                <?php endif; ?>

                <div class="row">

                    <?php
                    while ( $adammobile_product_query->have_posts() ) :
                        $adammobile_product_query->the_post();
                    ?>

                        <div class="<?php echo esc_attr( $adammobile_product_class_col ); ?> element-product__col">
                            <div class="element-product__item d-lg-flex flex-lg-column">
                                <div class="element-product__item--image d-lg-flex align-items-lg-center">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                                        <?php the_post_thumbnail( 'medium_large' ); ?>
                                    </a>
                                </div>

                                <h4 class="element-product__item--title">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>

                                <?php do_action( 'adammobile_woo_template_loop_price' ); ?>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
            </div>

    <?php

        endif;
    }

    protected function _content_template() {

    ?>

        <div class="element-product">

        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new adammobile_widget_product );