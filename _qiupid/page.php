<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package qiupid
 */

get_header(); 

do_action( 'qiupid_before_main_content' );

get_template_part('templates/content/templates/content-page');

do_action( 'qiupid_after_main_content' );

get_footer();