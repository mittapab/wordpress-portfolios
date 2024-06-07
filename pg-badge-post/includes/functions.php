<?php

function badge_post_script(){
    wp_enqueue_style('badge-post-style', plugins_url().'/pg-badge-post/assets/css/badge-post-style.css', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'badge_post_script');