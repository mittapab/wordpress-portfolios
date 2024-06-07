<?php
/**
 * The template for displaying all single posts.
 *
 * @package qiupid
 */
get_header();

do_action( 'qiupid_before_main_content' );

get_template_part('templates/content/templates/content-single');

do_action( 'qiupid_after_main_content' );

get_footer();