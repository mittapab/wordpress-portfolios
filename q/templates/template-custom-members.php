<?php
/*
* Template Name: Custom theme
*/
get_header();

do_action( 'qiupid_before_main_content' );

get_template_part('templates/content/templates/content-custom-page');

do_action( 'qiupid_after_main_content' );

get_footer();