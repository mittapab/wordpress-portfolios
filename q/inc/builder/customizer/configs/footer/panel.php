<?php

class Qiupid_Builder_Footer extends Qiupid_Customize_Builder_Panel {
	public $id = 'footer';

	function get_config() {
		return array(
			'id'         => 'footer',
			'title'      => esc_html__( 'Footer Builder', 'qiupid' ),
			'control_id' => 'footer_builder_panel',
			'panel'      => 'footer_settings',
			'section'    => 'footer_builder_panel',
			'devices'    => array(
				'desktop' => esc_html__( 'Footer Layout', 'qiupid' ),
			),
		);
	}

	function get_rows_config() {
		return array(
			'main'   => esc_html__( 'Footer Main', 'qiupid' ),
			'bottom' => esc_html__( 'Footer Bottom', 'qiupid' ),
		);
	}

	function customize() {
		$fn     = 'qiupid_customize_render_footer';
		$config = array(
			array(
				'name'     => 'footer_settings',
				'type'     => 'panel',
				'priority' => 98,
				'title'    => esc_html__( 'Footer', 'qiupid' ),
			),

			array(
				'name'  => 'footer_builder_panel',
				'type'  => 'section',
				'panel' => 'footer_settings',
				'title' => esc_html__( 'Footer Builder', 'qiupid' ),
			),

			array(
				'name'                => 'footer_builder_panel',
				'type'                => 'js_raw',
				'section'             => 'footer_builder_panel',
				'theme_supports'      => '',
				'title'               => esc_html__( 'Footer Builder', 'qiupid' ),
				'selector'            => '#site-footer',
				'render_callback'     => $fn,
				'container_inclusive' => true,
			),

		);

		return $config;
	}

	function row_config( $section = false, $section_name = false ) {
		$selector           = '#cb-row--' . str_replace( '_', '-', $section );
		$skin_mode_selector = '.footer--row-inner.' . str_replace( '_', '-', $section ) . '-inner';

		$fn = 'qiupid_customize_render_footer';

		$config = array(
			array(
				'name'           => $section,
				'type'           => 'section',
				'panel'          => 'footer_settings',
				'theme_supports' => '',
				'title'          => $section_name,
			),

			array(
				'name'            => $section . '_layout',
				'type'            => 'select',
				'section'         => $section,
				'title'           => esc_html__( 'Layout', 'qiupid' ),
				'selector'        => $selector,
				'render_callback' => $fn,
				'css_format'      => 'html_class',
				'default'         => 'layout-full-contained',
				'choices'         => array(
					'layout-full-contained' => esc_html__( 'Full width - Contained', 'qiupid' ),
					'layout-fullwidth'      => esc_html__( 'Full Width', 'qiupid' ),
					'layout-contained'      => esc_html__( 'Contained', 'qiupid' ),
				),
			),
			array(
				'name'       => "{$section}_background_color",
				'type'       => 'color',
				'section'    => $section,
				'title'      => esc_html__( 'Background Color', 'qiupid' ),
				'selector'   => "{$selector} .footer--row-inner",
				'css_format' => 'background-color: {{value}}',
			),
			array(
				'name'       => "{$section}_title_typography",
				'type'       => 'typography',
				'section'    => $section,
				'title'      => esc_html__( 'Menu Typography', 'qiupid' ),
				'selector'   => "{$selector} .footer--row-inner .widget-title",
				'css_format' => 'typography',
			),
			array(
				'name'       => "{$section}_title_color",
				'type'       => 'color',
				'section'    => $section,
				'title'      => esc_html__( 'Menu Title', 'qiupid' ),
				'selector'   => "{$selector} .footer--row-inner .widget-title",
				'css_format' => 'color: {{value}}',
			),
			array(
				'name'       => "{$section}_items_color",
				'type'       => 'color',
				'section'    => $section,
				'title'      => esc_html__( 'Menu Items', 'qiupid' ),
				'selector'   => "{$selector} .footer--row-inner .menu-item a",
				'css_format' => 'color: {{value}}',
			),
			array(
				'name'       => "{$section}_items_color_hover",
				'type'       => 'color',
				'section'    => $section,
				'title'      => esc_html__( 'Menu Items (Hover)', 'qiupid' ),
				'selector'   => "{$selector} .footer--row-inner .menu-item a:hover",
				'css_format' => 'color: {{value}}',
			),
			array(
				'name'       => "{$section}_separator_color",
				'type'       => 'color',
				'section'    => $section,
				'title'      => esc_html__( 'Separator', 'qiupid' ),
				'selector'   => "{$selector} .footer--row-inner .container",
				'css_format' => 'border-color: {{value}}',
			),
			array(
				'name'       	=> "{$section}_mobile_aligment",
				'type'          => 'text_align_no_justify',
				'section'    	=> $section,
				'title'         => esc_html__( 'Mobile Alignment', 'qiupid' ),
				'default'		=> 'left',
				'selector'      => "@media screen and (max-width: 1170px) { {$selector} div",
				'css_format' 	=> "text-align: {{value}};}",	
			),
		);
		$config = apply_filters( 'qiupid/builder/' . $this->id . '/rows/section_configs', $config, $section, $section_name );
		return $config;
	}
}

function qiupid_footer_layout_settings( $item_id, $section ) {

	global $wp_customize;

	if ( is_object( $wp_customize ) ) {
		global $wp_registered_sidebars;
		$name = $section;
		if ( is_array( $wp_registered_sidebars ) ) {
			if ( isset( $wp_registered_sidebars[ $item_id ] ) ) {
				$name = $wp_registered_sidebars[ $item_id ]['name'];
			}
		}
		$wp_customize->add_section(
			$section,
			array(
				'title' => $name,
			)
		);
	}

	if ( function_exists( 'qiupid_header_layout_settings' ) ) {
		return qiupid_header_layout_settings( $item_id, $section, 'qiupid_customize_render_footer', 'footer_' );
	}

	return false;
}

Qiupid_Customize_Layout_Builder()->register_builder( 'footer', new Qiupid_Builder_Footer() );



