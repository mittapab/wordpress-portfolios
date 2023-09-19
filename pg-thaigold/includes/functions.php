<?php

function add_thai_gold_script(){
    wp_enqueue_style( 'thai-gold-style', plugins_url().'/pg-thaigold/assets/css/thaigold.css', array(), '1.0');
    wp_enqueue_style('bootstrap-gold' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',array(), '1.0');
    wp_enqueue_script('bootstrap-script' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' , array() , '1.0.0' , true);
}

add_action('wp_enqueue_scripts' , 'add_thai_gold_script');