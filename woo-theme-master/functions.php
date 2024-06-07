<?php
require get_template_directory() . '/include/setup-theme.php';   

function theme_script_style(){

    // style

    //fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800
    wp_enqueue_style( 'kral-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style( 'kral-style-font', ' //fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800', array(), '1.0.0');
    wp_enqueue_style('karl-bootstrap', get_theme_file_uri('/css/bootstrap.min.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-owl', get_theme_file_uri('/css/owl.carousel.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-font', get_theme_file_uri('/css/font-awesome.min.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-themify', get_theme_file_uri('/css/themify-icons.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-magnific', get_theme_file_uri('/css/magnific-popup.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-animate', get_theme_file_uri('/css/animate.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-jquery', get_theme_file_uri('/css/jquery-ui.min.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-css', get_theme_file_uri('/css/core-style.css')  , array(), '1.0.0');
    wp_enqueue_style('karl-respone' , get_theme_file_uri('/css/core-style.css') , array() , '1.0.0');

    //script
    wp_enqueue_script('karl-script' , get_theme_file_uri('/js/jquery/jquery-2.2.4.min.js') , array() , '1.0.0' , true);
    wp_enqueue_script('karl-popper' , get_theme_file_uri('/js/popper.min.js') , array() , '1.0.0' , true);
    wp_enqueue_script('karl-bootstrap' , get_theme_file_uri('/js/bootstrap.min.js') , array() , '1.0.0' , true);
    wp_enqueue_script('karl-plugins' , get_theme_file_uri('/js/plugins.js') , array() , '1.0.0' , true);
    wp_enqueue_script('karl-active' , get_theme_file_uri('/js/active.js') , array() , '1.0.0' , true);

}

add_action('wp_enqueue_scripts' , 'theme_script_style');

