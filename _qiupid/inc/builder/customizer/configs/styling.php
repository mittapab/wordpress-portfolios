<?php
if ( ! function_exists( 'qiupid_customizer_styling_config' ) ) {
	function qiupid_customizer_styling_config( $configs ) {
		$qiupid_buttons = qiupid_get_customizer_buttons_styling();
		$qiupid_buttons_hover = qiupid_get_customizer_buttons_hover_styling();
		$qiupid_fields = qiupid_get_customizer_fields_styling();
		$qiupid_fields_focus = qiupid_get_customizer_fields_styling_focus();
		$section = 'qiupid_styling_settings';
		$config = array(
			array(
				'name'     => 'styling_settings_panel',
				'type'     => 'panel',
				'priority' => 22,
				'title'    => esc_html__( 'Styling Settings', 'qiupid' ),
			),

			// I. General Tab
			array(
				'name'  => "qiupid_styling_settings_color",
				'type'  => 'section',
				'panel' => 'styling_settings_panel',
				'title' => esc_html__( 'General Site Colors', 'qiupid' ),
			),
			array(
				'name'    		=> 'qiupid_styling_settings_color_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_color',
				'title'   		=> esc_html__( 'Links Color Option', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_color_links_normal',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'default'		=> '#222',
				'title'      	=> esc_html__( 'Regular', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_color_links_hover',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'title'      	=> esc_html__( 'Hover', 'qiupid' ),
			),
			array(
				'name'    => 'qiupid_styling_settings_color_links_weight',
				'type'    => 'select',
				'section' => 'qiupid_styling_settings_color',
				'label'   => esc_html__( 'Weight', 'qiupid' ),
				'choices' => array(
					'default'   => esc_html__( 'Default', 'qiupid' ),
					'bold' 		=> esc_html__( 'Bold', 'qiupid' ),
					'100'  		=> esc_html__( '100', 'qiupid' ),
					'200'  		=> esc_html__( '200', 'qiupid' ),
					'300' 		=> esc_html__( '300', 'qiupid' ),
					'400' 		=> esc_html__( '400', 'qiupid' ),
					'500' 		=> esc_html__( '500', 'qiupid' ),
					'600' 		=> esc_html__( '600', 'qiupid' ),
					'700' 		=> esc_html__( '700', 'qiupid' ),
					'800' 		=> esc_html__( '800', 'qiupid' ),
				)
			),

			// 1. Main colors and Background
			array(
				'name'    		=> 'qiupid_styling_settings_color_bg_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_color',
				'title'   		=> esc_html__( 'Main colors & Background', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_color_text_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'default'   	=> '#2695ff',
				'title'      	=> esc_html__( 'Text color', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_main_bg_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'default'   	=> '#2695ff',
				'title'      	=> esc_html__( 'Background color', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_main_border_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'default'   	=> '#2695ff',
				'title'      	=> esc_html__( 'Border color', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_main_bg_color_hover',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'default'   	=> '#ffffff',
				'title'      	=> esc_html__( 'Background color (hover)', 'qiupid' ),
			),

			// 2. Text selection
			array(
				'name'    		=> 'qiupid_styling_settings_text_selection_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_color',
				'title'   		=> esc_html__( 'Text Selection Color & Background', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_selection_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'default'   	=> '#ffffff',
				'title'      	=> esc_html__( 'Color', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_selection_bg',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'   	=> 'format',
				'default'   	=> '#2695ff',
				'title'      	=> esc_html__( 'Background color', 'qiupid' ),
			),
			array(
				'name'    		=> 'qiupid_styling_settings_paragraph_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_color',
				'title'   		=> esc_html__( 'Body & Paragraphs Color', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_color_body_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_color',
				'selector'    	=> 'body',
				'css_format' 	=> 'color: {{value}};',
				'default'		=> '#6a6b76',
				'title'      	=> esc_html__( 'Color', 'qiupid' ),
			),

			// 3. Menu Styling Tab
			array(
				'name'  => "qiupid_styling_settings_navigation",
				'type'  => 'section',
				'panel' => 'styling_settings_panel',
				'title' => esc_html__( 'Primary Menu Styling', 'qiupid' ),
			),
			// a. Main Navigation
			array(
				'name'    		=> 'qiupid_styling_settings_main_navigation_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'title'   		=> esc_html__( 'Main Navigation', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_main_text_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'selector'   	=> '.builder-item--primary-menu .nav-menu-desktop .menu>li>a',
				'css_format' 	=> 'color: {{value}};',
				'title'      	=> esc_html__( 'Text Color', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_main_text_color_hover',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'selector'   	=> '.builder-item--primary-menu .nav-menu-desktop .menu>li>a:hover',
				'css_format' 	=> 'color: {{value}};',
				'title'      	=> esc_html__( 'Hover Text Color', 'qiupid' ),
			),
			// b. Submenu Navigation
			array(
				'name'    		=> 'qiupid_styling_settings_submenu_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'title'   		=> esc_html__( 'Submenus Styling', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_submenu_background',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'selector'    	=> ".nav-menu-desktop .sub-menu li a",
				'css_format' 	=> 'background-color: {{value}};',
				'title'      	=> esc_html__( 'Background Color', 'qiupid' ),
				'default'   	=> '#FFF',
			),
			array(
				'name'       	=> 'qiupid_styling_settings_submenu_text_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'selector'    	=> ".nav-menu-desktop .sub-menu li a",
				'css_format' 	=> 'color: {{value}};',
				'title'      	=> esc_html__( 'Text Color', 'qiupid' ),
				'default'   	=> '#484848',
			),
			array(
				'name'       	=> 'qiupid_styling_settings_submenu_background_hover',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'selector'    	=> ".nav-menu-desktop .sub-menu li a:hover",
				'css_format' 	=> 'background-color: {{value}};',
				'title'      	=> esc_html__( 'Hover Background Color', 'qiupid' ),
				'default'   	=> '#FFF',
			),
			array(
				'name'       	=> 'qiupid_styling_settings_submenu_text_color_hover',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'selector'    	=> ".nav-menu-desktop .sub-menu li a:hover",
				'css_format' 	=> 'color: {{value}};',
				'title'      	=> esc_html__( 'Hover Text Color', 'qiupid' ),
				'default'   	=> '#2695ff',
			),
			array(
				'name'       	=> 'qiupid_styling_settings_submenu_border_color_hover',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_navigation',
				'selector'    	=> ".nav-menu-desktop .sub-menu li",
				'css_format' 	=> 'border-bottom: 1px solid {{value}} !important;',
				'title'      	=> esc_html__( 'Border Color', 'qiupid' ),
				'default'   	=> '#ddd',
			),
			array(
				'name'        => 'qiupid_styling_settings_submenu_padding',
				'type'        => 'styling',
				'section'     => 'qiupid_styling_settings_navigation',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Styling Items', 'qiupid' ),
				'selector'    => array(
					'normal'            => ".nav-menu-desktop .sub-menu li a",
					'hover'             => ".nav-menu-desktop .sub-menu li a:hover"
				),
				'fields'      => array(
					'normal_fields' => array(
						'text_color'    => false,
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
						'border'		=> false,
						'border_radius' => false,
						'box_shadow' 	=> false,
						'border_style' 	=> false,
					),
					'hover_fields'  => array(
						'text_color'    => false,
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
						'border'		=> false,
						'border_radius' => false,
						'box_shadow' 	=> false,
						'border_style' 	=> false,
					),
				),
			),
			array(
				'name'        => 'qiupid_styling_settings_submenu_dropdown',
				'type'        => 'styling',
				'section'     => 'qiupid_styling_settings_navigation',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Styling Dropdown', 'qiupid' ),
				'selector'    => array(
					'normal'            => ".nav-menu-desktop .sub-menu",
					'hover'             => ".nav-menu-desktop .sub-menu:hover"
				),
				'fields'      => array(
					'normal_fields' => array(
						'text_color'    => false,
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
						'border'		=> false,
						'border_radius' => false,
						'box_shadow' 	=> false,
						'border_style' 	=> false,
					),
					'hover_fields'  => array(
						'text_color'    => false,
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
						'border'		=> false,
						'border_radius' => false,
						'box_shadow' 	=> false,
						'border_style' 	=> false,
					),
				),
			),

			// Mega Menu
			array(
				'name'  => "qiupid_styling_settings_mega_menu",
				'type'  => 'section',
				'panel' => 'styling_settings_panel',
				'title' => esc_html__( 'Mega Menu', 'qiupid' ),
			),
			// a. Main Navigation
			array(
				'name'    		=> 'qiupid_styling_settings_mega_menu_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_mega_menu',
				'title'   		=> esc_html__( 'Styling', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_styling_settings_mega_menu_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_mega_menu',
				'title'      	=> esc_html__( 'Links Color', 'qiupid' ),
				'selector'    	=> ".cf-mega-menu.sub-menu a",
				'css_format' 	=> 'color: {{value}};',
			),
			array(
				'name'       	=> 'qiupid_styling_settings_mega_menu_hover',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_mega_menu',
				'title'      	=> esc_html__( 'Links Hover', 'qiupid' ),
				'selector'    	=> ".cf-mega-menu.sub-menu a:hover",
				'css_format' 	=> 'color: {{value}};',
			),
			array(
				'name'            => 'qiupid_styling_settings_mega_menu_width',
				'type'            => 'slider',
				'device_settings' => true,
				'section' 		  => 'qiupid_styling_settings_mega_menu',
				'selector'        => ".cf-mega-menu.sub-menu",
				'css_format'      => 'width: {{value}};',
				'label'           => esc_html__( 'Width', 'qiupid' ),
			),

			// III. Buttons Tab
			array(
				'name'  => "qiupid_styling_settings_buttons",
				'type'  => 'section',
				'panel' => 'styling_settings_panel',
				'title' => esc_html__( 'Buttons', 'qiupid' ),
			),
			array(
				'name'        => "qiupid_styling_settings_buttons_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_buttons",
				'title'       => esc_html__( 'Typography', 'qiupid' ),
				'description' => esc_html__( 'Apply to buttons text.', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "{$qiupid_buttons}",
			), 
			array(
				'name'        => 'qiupid_styling_settings_buttons_styling',
				'type'        => 'styling',
				'section'     => 'qiupid_styling_settings_buttons',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Button Styling', 'qiupid' ),
				'selector'    => array(
					'normal'            => "{$qiupid_buttons}",
					'hover'             => "{$qiupid_buttons_hover}",
				),
				'fields'      => array(
					'normal_fields' => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
					),
					'hover_fields'  => array(
						'link_color'    => false,
						'padding'       => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'border_radius' => false,
					),
				)
			),
			

			// IV. Fields Tab
			array(
				'name'  => "qiupid_styling_settings_fields",
				'type'  => 'section',
				'panel' => 'styling_settings_panel',
				'title' => esc_html__( 'Fields', 'qiupid' ),
			),
			array(
				'name'        => 'qiupid_styling_settings_fields_styling',
				'type'        => 'styling',
				'section'     => 'qiupid_styling_settings_fields',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Fields Styling', 'qiupid' ),
				'selector'    => array(
					'normal'            => "{$qiupid_fields}"
				),
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
			array(
				'name'        => "qiupid_styling_settings_fields_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_fields",
				'title'       => esc_html__( 'Typography', 'qiupid' ),
				'description' => esc_html__( 'Apply to fields text.', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "{$qiupid_fields}",
			),
			array(
				'name'       	=> 'qiupid_styling_settings_fields_styling_focus',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_styling_settings_fields',
				'selector'    	=> "{$qiupid_fields_focus}",
				'css_format' 	=> 'border-color: {{value}};',
				'title'      	=> esc_html__( 'Fields Color on Focus', 'qiupid' ),
				'default'   	=> '#d3d3d3',
			),
			// IV. Typography
			array(
				'name'  => "qiupid_styling_settings_typo",
				'type'  => 'section',
				'panel' => 'styling_settings_panel',
				'title' => esc_html__( 'Site Typography', 'qiupid' ),
			),
			array(
				'name'        => "qiupid_styling_settings_body_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Body Font family', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "body, ul li, ol li, p",
			),
			array(
				'name'        => "qiupid_styling_settings_h1_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H1', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "h1, h1 span",
			),
			array(
				'name'        => "qiupid_styling_settings_h2_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H2', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "h2",
			),
			array(
				'name'        => "qiupid_styling_settings_h3_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H3', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "h3, .post-name, .qiupid-post-name a",
			),
			array(
				'name'        => "qiupid_styling_settings_h4_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H4', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "h4",
			),
			array(
				'name'        => "qiupid_styling_settings_h5_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H5', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "h5",
			),
			array(
				'name'        => "qiupid_styling_settings_h6_typo",
				'type'        => 'typography',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H6', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => "h6",
			),
			array(
				'name'    		=> 'qiupid_styling_settings_mobile_typo_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_typo',
				'title'   		=> esc_html__( 'Mobile Typography', 'qiupid' ),
			),
			array(
				'name'        => "qiupid_styling_settings_h1_size_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H1 Font size', 'qiupid' ),
				'default'	  => '26px',
			),
			array(
				'name'        => "qiupid_styling_settings_h1_lh_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H1 Line height', 'qiupid' ),
				'default'	  => '38px',
			),
			array(
				'name'        => "qiupid_styling_settings_h2_size_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H2 Font size', 'qiupid' ),
				'default'	  => '24px',
			),
			array(
				'name'        => "qiupid_styling_settings_h2_lh_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H2 Line height', 'qiupid' ),
				'default'	  => '28px',
			),
			array(
				'name'        => "qiupid_styling_settings_h3_size_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H3 Font size', 'qiupid' ),
				'default'	  => '22px',
			),
			array(
				'name'        => "qiupid_styling_settings_h3_lh_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H3 Line height', 'qiupid' ),
				'default'	  => '26px',
			),
			array(
				'name'        => "qiupid_styling_settings_h4_size_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H4 Font size', 'qiupid' ),
				'default'	  => '20px',
			),
			array(
				'name'        => "qiupid_styling_settings_h4_lh_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H4 Line height', 'qiupid' ),
				'default'	  => '24px',
			),
			array(
				'name'        => "qiupid_styling_settings_h5_size_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H5 Font size', 'qiupid' ),
				'default'	  => '18px',
			),
			array(
				'name'        => "qiupid_styling_settings_h5_lh_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H5 Line height', 'qiupid' ),
				'default'	  => '22px',
			),
			array(
				'name'        => "qiupid_styling_settings_h6_size_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H6 Font size', 'qiupid' ),
				'default'	  => '16px',
			),
			array(
				'name'        => "qiupid_styling_settings_h6_lh_mobile",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H6 Line height', 'qiupid' ),
				'default'	  => '20px',
			),
			array(
				'name'    		=> 'qiupid_styling_settings_tablet_typo_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_typo',
				'title'   		=> esc_html__( 'Tablet Typography', 'qiupid' ),
			),
			array(
				'name'        => "qiupid_styling_settings_h1_size_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H1 Font size', 'qiupid' ),
				'default'	  => '28px',
			),
			array(
				'name'        => "qiupid_styling_settings_h1_lh_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H1 Line height', 'qiupid' ),
				'default'	  => '32px',
			),
			array(
				'name'        => "qiupid_styling_settings_h2_size_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H2 Font size', 'qiupid' ),
				'default'	  => '26px',
			),
			array(
				'name'        => "qiupid_styling_settings_h2_lh_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H2 Line height', 'qiupid' ),
				'default'	  => '30px',
			),
			array(
				'name'        => "qiupid_styling_settings_h3_size_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H3 Font size', 'qiupid' ),
				'default'	  => '24px',
			),
			array(
				'name'        => "qiupid_styling_settings_h3_lh_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H3 Line height', 'qiupid' ),
				'default'	  => '28px',
			),
			array(
				'name'        => "qiupid_styling_settings_h4_size_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H4 Font size', 'qiupid' ),
				'default'	  => '22px',
			),
			array(
				'name'        => "qiupid_styling_settings_h4_lh_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H4 Line height', 'qiupid' ),
				'default'	  => '26px',
			),
			array(
				'name'        => "qiupid_styling_settings_h5_size_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H5 Font size', 'qiupid' ),
				'default'	  => '20px',
			),
			array(
				'name'        => "qiupid_styling_settings_h5_lh_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H5 Line height', 'qiupid' ),
				'default'	  => '23px',
			),
			array(
				'name'        => "qiupid_styling_settings_h6_size_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H6 Font size', 'qiupid' ),
				'default'	  => '18px',
			),
			array(
				'name'        => "qiupid_styling_settings_h6_lh_tablet",
				'type'        => 'text',
				'section'     => "qiupid_styling_settings_typo",
				'title'       => esc_html__( 'Heading H6 Line height', 'qiupid' ),
				'default'	  => '21px',
			),

			// IV. Typography
			array(
				'name'  	=> "qiupid_styling_settings_widgets",
				'type'  	=> 'section',
				'panel' 	=> 'styling_settings_panel',
				'title' 	=> esc_html__( 'Widgets Styling', 'qiupid' ),
			),
			array(
				'name'    	=> 'qiupid_styling_widgets_heading_1',
				'type'    	=> 'heading',
				'section' 	=> 'qiupid_styling_settings_widgets',
				'title'   	=> esc_html__( 'Sidebar Widgets', 'qiupid' ),
			),
			array(
				'name'        => 'qiupid_blog_widget_card_styling',
				'type'        => 'styling',
				'section'     => 'qiupid_styling_settings_widgets',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Card Styling', 'qiupid' ),
				'selector'    => '.sidebar-content .widget',
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
			array(
				'name'        => 'qiupid_blog_sidebar_title_styling',
				'type'        => 'typography',
				'section'     => 'qiupid_styling_settings_widgets',
				'css_format'  => 'typography',
				'title'       => esc_html__( 'Title Typography', 'qiupid' ),
				'selector'    => '.sidebar-content .widget-title, .sidebar-content .widget h2, .sidebar-content .widget .wp-block-search__label'
			),
			array(
				'name'    		=> 'qiupid_styling_widgets_social_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_styling_settings_widgets',
				'title'   		=> esc_html__( 'Widget: MT - Contact + Social Media', 'qiupid' ),
			),
			array(
				'name'        	=> 'qiupid_widget_contact_styling',
				'type'       	=> 'color',
				'section'     	=> 'qiupid_styling_settings_widgets',
				'title'       	=> esc_html__( 'Contact Links Styling', 'qiupid' ),
				'css_format' 	=> 'color: {{value}};',
				'selector'    	=> '.contact-details span, .contact-details span i',
			),
			array(
				'name'        	=> 'qiupid_widget_social_media_styling',
				'type'        	=> 'styling',
				'section'     	=> 'qiupid_styling_settings_widgets',
				'css_format'  	=> 'styling',
				'title'       	=> esc_html__( 'Social Icon Styling', 'qiupid' ),
				'selector'    	=> array(
					'normal'        => ".widget_mt_address_social_icons a",
					'hover'         => ".widget_mt_address_social_icons a:hover",
				),
				'fields'      	=> array(
					'normal_fields' => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
					),
					'hover_fields'  => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
					)
				)
			)
		);

		return array_merge( $configs, $config );
	}
}

add_filter( 'qiupid/customizer/config', 'qiupid_customizer_styling_config' );
