<?php

/** =========================   Customize Logo theme ================================== */

function custom_theme_option($wp_customize){

    $wp_customize->add_section('vvip_logo_section_area' , array('title' => __('Logo Theme' ,'btwint_168_r')));
    $wp_customize->add_setting('vvip_logo_setting');
    $wp_customize->add_control(new WP_Customize_Image_Control(
                $wp_customize ,
                'vvip_logo_control' ,
                array(
                     'label' => "upload Logo image" ,
                     'settings' => 'vvip_logo_setting' ,
                     'section' => 'vvip_logo_section_area'
                )
            ));
}

add_action('customize_register', 'custom_theme_option');