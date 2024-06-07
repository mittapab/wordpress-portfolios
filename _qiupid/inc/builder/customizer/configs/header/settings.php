<?php

class Qiupid_Builder_Header_Settings {
	public $id = 'header_settings';

	function customize() {
		$section = 'header_settings';

		return array(
			array(
				'name'     		=> $section,
				'type'     		=> 'section',
				'panel'    		=> 'header_settings',
				'priority' 		=> 299,
				'title'    		=> esc_html__( 'Settings', 'qiupid' ),
			),
			array(
				'name'          => 'qiupid_general_settings_look_htransparent',
				'type'          => 'checkbox',
				'section'   	=> $section,
				'title'         => esc_html__( 'Transparent Header', 'qiupid' ),
				'description'   => esc_html__('Enable or disable Transparent Header', 'qiupid'),
				'default'       => 0,
			),
			array(
				'name'      	=> 'qiupid_is_nav_sticky',
				'type'      	=> 'checkbox',
				'section'   	=> $section,
				'title'     	=> esc_html__( 'Fixed Navigation menu?', 'qiupid' ),
				'description'   => esc_html__('Enable or disable Sticky Header', 'qiupid'),
			),
		);
	}
}

Qiupid_Customize_Layout_Builder()->register_item( 'header', new Qiupid_Builder_Header_Settings() );
