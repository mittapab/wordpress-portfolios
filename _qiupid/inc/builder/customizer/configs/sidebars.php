<?php

class Qiupid_Builder_Header_Sidebars {
	public $id = 'header_sidebars';

	function customize() {
		$section = 'header_sidebars';

		return array(
			array(
				'name'     => $section,
				'type'     => 'section',
				'panel'    => 'general_settings_panel',
				'priority' => 299,
				'title'    => esc_html__( 'Sidebars', 'qiupid' ),
			),
			array(
				'name'             => 'qiupid_general_sidebars',
				'type'             => 'repeater',
				'section'        	=> $section,
				'title'            => esc_html__( 'Custom Sidebars', 'qiupid' ),
				'live_title_field' => 'title',
				'default'          => array(
					array(
						'title' => esc_html__( 'Header Burger Sidebar', 'qiupid' ),
					),
				),
				'fields'           => array(
					array(
						'name'  => 'title',
						'type'  => 'text',
						'label' => esc_html__( 'Sidebar Name', 'qiupid' ),
					),
				),
			),
		);
	}
}

Qiupid_Customize_Layout_Builder()->register_item( 'header', new Qiupid_Builder_Header_Sidebars() );
