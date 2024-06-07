<?php
if ( ! function_exists( 'qiupid_customizer_blog_config' ) ) {
	function qiupid_customizer_blog_config( $configs ) {

		$section = 'qiupid_blog';

		$config = array(
			// Panel
			array(
				'name'     => 'blog_panel',
				'type'     => 'panel',
				'priority' => 22,
				'title'    => esc_html__( 'Blog Settings', 'qiupid' ),
			),

			// I. Blog Archive
			array(
				'name'  => "qiupid_blog_archive",
				'type'  => 'section',
				'panel' => 'blog_panel',
				'title' => esc_html__( 'Blog Archive', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_blog_archive_layout',
				'type'            => 'radio_group',
				'section'         => 'qiupid_blog_archive',
				'default'         => 'right-sidebar',
				'title'           => esc_html__( 'Blog Layout', 'qiupid' ),
				'choices'         => array(
					'left-sidebar'  	=> esc_html__( 'Left Sidebar', 'qiupid' ),
					'no-sidebar' 		=> esc_html__( 'Fullwidth', 'qiupid' ),
					'right-sidebar'  	=> esc_html__( 'Right Sidebar', 'qiupid' ),
				),
			),
			array(
				'name'        => 'qiupid_blog_article_card_styling',
				'type'        => 'styling',
				'section'     => 'qiupid_blog_archive',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Article Card Styling', 'qiupid' ),
				'selector'    => '.qiupid-article-wrapper .qiupid-article-inner',
				'fields'      => array(
					'normal_fields' => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
					)
				)
			),

			// II. Single Post
			array(
				'name'  => "qiupid_blog_single",
				'type'  => 'section',
				'panel' => 'blog_panel',
				'title' => esc_html__( 'Blog Single Article', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_blog_single_layout',
				'type'            => 'radio_group',
				'section'         => 'qiupid_blog_single',
				'default'         => 'no-sidebar',
				'title'           => esc_html__( 'Single Blog Layout', 'qiupid' ),
				'choices'         => array(
					'left-sidebar'  	=> esc_html__( 'Left Sidebar', 'qiupid' ),
					'no-sidebar' 		=> esc_html__( 'Fullwidth', 'qiupid' ),
					'right-sidebar'  	=> esc_html__( 'Right Sidebar', 'qiupid' ),
				),
			),
			array(
				'name'            => 'qiupid_blog_single_featured_image',
				'type'            => 'checkbox',
				'section'         => 'qiupid_blog_single',
				'default'         => 1,
				'title'           => esc_html__( 'Featured Image', 'qiupid' ),
				'description'     => esc_html__( 'Show or Hide the featured image from blog post page', 'qiupid' ),
			),
		);

		return array_merge( $configs, $config );
	}
}

add_filter( 'qiupid/customizer/config', 'qiupid_customizer_blog_config' );
