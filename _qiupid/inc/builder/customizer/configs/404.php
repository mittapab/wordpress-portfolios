<?php
if ( ! function_exists( 'qiupid_customizer_404_config' ) ) {
	function qiupid_customizer_404_config( $configs ) {

		$section = 'qiupid_not_found';

		$config = array(
			array(
				'name'     => 'not_found_panel',
				'type'     => 'panel',
				'priority' => 22,
				'title'    => esc_html__( '404 Page Settings', 'qiupid' ),
			),

			// Image.
			array(
				'name'  => "qiupid_not_found_404",
				'type'  => 'section',
				'panel' => 'not_found_panel',
				'title' => esc_html__( '404 Image', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_not_found_404_img',
				'type'            => 'image',
				'section'         => 'qiupid_not_found_404',
				'title'           => esc_html__( 'Image for 404 Not found page', 'qiupid' ),
			),

			// Content.
			array(
				'name'  => "qiupid_not_found_404_content",
				'type'  => 'section',
				'panel' => 'not_found_panel',
				'title' => esc_html__( '404 Content', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_page_404_heading',
				'type'            => 'textarea',
				'section'         => 'qiupid_not_found_404_content',
				'title'           => esc_html__( 'Heading', 'qiupid' ),
				'default'         => esc_html__( 'Sorry, this page does not exist!', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_page_404_paragraph',
				'type'            => 'textarea',
				'section'         => 'qiupid_not_found_404_content',
				'title'           => esc_html__( 'Paragraph (sub-heading)', 'qiupid' ),
				'default'         => esc_html__( 'The link you clicked might be corrupted, or the page may have been removed.', 'qiupid' ),
			),

		);

		return array_merge( $configs, $config );
	}
}

add_filter( 'qiupid/customizer/config', 'qiupid_customizer_404_config' );
