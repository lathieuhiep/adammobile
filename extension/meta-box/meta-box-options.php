<?php

add_filter( 'rwmb_meta_boxes', 'adammobile_register_meta_boxes' );

function adammobile_register_meta_boxes() {

    /* Start 1st meta box */
    $adammobile_meta_boxes[] = array(
        'id'            =>  'personal',
        'title'         =>  esc_html__( 'Personal Information', 'adammobile' ),
        'post_types'    =>  array( 'post' ),
        'context'       =>  'normal',
        'priority'      =>  'high',
        'fields'        =>  array(
            array(
                'name'  =>  esc_html__( 'Full name', 'adammobile' ),
                'desc'  =>  'Format: First Last',
                'id'    =>  'rw_fname',
                'type'  =>  'text',
                'std'   =>  'Anh Tran',
                'class' =>  'custom-class',
                'clone' =>  true,
            ),
        )
    );
    /* End 1st meta box */

    /* Start meta box product */
    $adammobile_meta_boxes[]    =   array(
        'id'            =>  'product_option_metabox',
        'title'         =>  esc_html__( 'Thiết lập sản phẩm', 'adammobile' ),
        'post_types'    =>  array( 'product' ),
        'context'       =>  'normal',
        'priority'      =>  'low',
        'fields'        =>  array(

            array(
                'type'  =>  'heading',
                'name'  =>  esc_html__( 'Thông Số Kỹ Thuật', 'adammobile' ),
            ),

            array(
                'id'            =>  'thong_so_kt_id',
                'name'          =>  '',
                'type'          =>  'fieldset_text',
                'clone'         =>  true,
                'sort_clone'    =>  true,
                'class'         =>  'fie_css_custom',
                'options'       =>  array(
                    'bo_phan_sp'    =>  'Bộ phận',
                    'chi_tiet_sp'   =>  'Chi tiết',
                ),
            ),

        )
    );
    /* End meta box product */

    return $adammobile_meta_boxes;

}