<?php
defined( 'ABSPATH' ) || exit;

// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'qiupid_add_gutenberg_assets' );
/**
 * Load Gutenberg stylesheet.
 */
function qiupid_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'qiupid-gutenberg-editor-style', get_theme_file_uri( '/inc/gutenberg/assets/gutenberg-editor-style.css' ), false );
    wp_enqueue_style( 
        'qiupid-gutenberg-fonts', 
        '//fonts.googleapis.com/css?family=Poppins:regular,500,600,700,800,900,latin' 
    ); 
}