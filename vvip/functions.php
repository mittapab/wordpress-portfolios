<?php

require_once get_template_directory().'/widgets/Sidebar-widget.php';
require_once get_template_directory().'/widgets/Topmenu-widget.php';
require_once get_template_directory().'/widgets/Referal-widget.php';
require_once get_template_directory().'/widgets/Topmenumobile-widget.php';
require_once get_template_directory().'/widgets/Menumobile-widget.php';
require_once get_template_directory().'/theme-options/logo-options.php';

function add_scriptions_lap(){

    wp_enqueue_style('vvip-style' , get_stylesheet_uri() , array() , '1.0');
    wp_enqueue_style('vvip-style-theme' , get_theme_file_uri('/public/css/style.css') , array() , '1.0');
    wp_enqueue_style('vvip-font-theme' , '//fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap', array() , '1.0');
    wp_enqueue_style('vvip-bootstrap-theme' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css', array() , '1.0');
    wp_enqueue_style('vvip-bootstrap-icon' , '//cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css', array() , '1.0');

    wp_enqueue_script('app-lab-popper' , '//cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js' , array() , '1.0.0' , true);
    wp_enqueue_script('app-lab-boot' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js', array() , '1.0.0' , true);
    
}

add_action('wp_enqueue_scripts','add_scriptions_lap');


function btwin_sidebar_menu() {
    register_sidebar( array(
        'name'          => 'Sidebar Menu',
        'id'            => 'sidebar-menu',
        'description'   => 'Add widgets here for the sidebar menu.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'btwin_sidebar_menu' );

function btwin_top_menu() {
    register_sidebar( array(
        'name'          => 'Btwin Top Menu',
        'id'            => 'btwin-top-menu',
        'description'   => 'Add widgets here for the sidebar menu.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'btwin_top_menu' );

function btwin_referal_button() {
    register_sidebar( array(
        'name'          => 'btwin referal button',
        'id'            => 'btwin-referal-button',
        'description'   => 'Add widgets here for the sidebar menu.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'btwin_referal_button' );

function btwin_top_menumobile() {
    register_sidebar( array(
        'name'          => 'Btwin Top Menu mobile',
        'id'            => 'btwin-top-menu-tmobile',
        'description'   => 'Add widgets here for the sidebar menu.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'btwin_top_menumobile' );

function btwin_menumobile() {
    register_sidebar( array(
        'name'          => 'Btwin Menu mobile',
        'id'            => 'btwin-top-menu-mobile',
        'description'   => 'Add widgets here for the sidebar menu.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'btwin_menumobile' );


function register_btwin_Sidebar__widget(){
   
   register_widget("Sidebar_widget");
   register_widget("Topmenu_widget");
   register_widget("Referral_widget");
   register_widget("Topmenumobile_widget");
   register_widget("Menumobile_widget");
}

add_action('widgets_init' , 'register_btwin_Sidebar__widget');

