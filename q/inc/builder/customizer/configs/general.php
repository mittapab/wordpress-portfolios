<?php
if ( ! function_exists( 'qiupid_customizer_general_settings_config' ) ) {
	function qiupid_customizer_general_settings_config( $configs ) {

		$section = 'qiupid_general_settings';

		$config = array(
			array(
				'name'     => 'general_settings_panel',
				'type'     => 'panel',
				'priority' => 22,
				'title'    => esc_html__( 'General Settings', 'qiupid' ),
			),

			// Breadcrumbs
			array(
				'name'  => "qiupid_general_settings_breadcrumbs",
				'type'  => 'section',
				'panel' => 'general_settings_panel',
				'title' => esc_html__( 'Breadcrumbs', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_enable_breadcrumbs',
				'type'            => 'checkbox',
				'section'         => 'qiupid_general_settings_breadcrumbs',
				'title'           => esc_html__( 'Breadcrumbs', 'qiupid' ),
				'description'     => esc_html__('Enable or disable breadcrumbs', 'qiupid'),
				'default'         => 1
			),
			array(
                'name'       	=> 'qiupid_breadcrumbs_delimitator',
                'type'     		=> 'text',
				'section'         => 'qiupid_general_settings_breadcrumbs',
                'title'    		=> esc_html__('Breadcrumbs delimitator', 'qiupid'),
                'description' 	=> esc_html__('(The theme is also compatible with Breadcrumb NavXT plugin, for an enhanced Breadcrumbs / SEO Ready Breadcrumbs feature. Install it and it will automatically replace the default breadcrumbs feature).', 'qiupid'),
                'default'  		=> '/'
            ),
			array(
				'name'    		=> 'qiupid_breadcrumbs_styling_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_general_settings_breadcrumbs',
				'title'   		=> esc_html__( 'Styling', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_breadcrumbs_alignment',
				'type'            => 'text_align_no_justify',
				'section'         => 'qiupid_general_settings_breadcrumbs',
				'title'           => esc_html__( 'Alignment', 'qiupid' ),
				'default'		  => 'left'	
			),
			array(
				'name'            => 'qiupid_breadcrumbs_bg_image',
				'type'            => 'image',
				'section'         => 'qiupid_general_settings_breadcrumbs',
				'title'           => esc_html__( 'Background', 'qiupid' ),
				'description' 	  => esc_html__('(Change the background color of the breadcrumbs with an image.)', 'qiupid'),
				'selector'   	  => ".qiupid-breadcrumbs, .youzify-search-landing-image-container",
				'css_format' 	  => 'background-image: url({{value}});',
			),
			array(
				'name'            => 'qiupid_enable_parallax',
				'type'            => 'checkbox',
				'section'         => 'qiupid_general_settings_breadcrumbs',
				'title'           => esc_html__( 'Parallax', 'qiupid' ),
				'description'     => esc_html__('Parallax on background', 'qiupid'),
				'default'         => 0
			),
			array(
				'name'        => 'qiupid_breadcrumbs_styling',
				'type'        => 'styling',
				'section'     => 'qiupid_general_settings_breadcrumbs',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Styling', 'qiupid' ),
				'selector'    => array(
					'normal'            => ".qiupid-breadcrumbs",
					'hover'             => ".qiupid-breadcrumbs:hover"
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
				'name'    		=> 'qiupid_breadcrumbs_title_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_general_settings_breadcrumbs',
				'title'   		=> esc_html__( 'Breadcrumb Title', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_breadcrumbs_title_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_general_settings_breadcrumbs',
				'selector'   	=> 'format',
				'title'      	=> esc_html__( 'Title Color', 'qiupid' ),
				'selector'   	=> ".qiupid-breadcrumbs h2, .qiupid-breadcrumbs h1, .qiupid-breadcrumbs h1 span",
				'css_format' 	=> 'color: {{value}};',
			),
			array(
				'name'        	=> "qiupid_breadcrumbs_title_typo",
				'type'        	=> 'typography',
				'section'     	=> "qiupid_general_settings_breadcrumbs",
				'title'       	=> esc_html__( 'Title Typography', 'qiupid' ),
				'css_format'  	=> 'typography',
				'selector'    	=> ".qiupid-breadcrumbs h2, .qiupid-breadcrumbs h1, .qiupid-breadcrumbs h1 span",
			),
			array(
				'name'    		=> 'qiupid_breadcrumbs_subtitle_heading',
				'type'    		=> 'heading',
				'section' 		=> 'qiupid_general_settings_breadcrumbs',
				'title'   		=> esc_html__( 'Breadcrumb Subtitle', 'qiupid' ),
			),
			array(
				'name'       	=> 'qiupid_breadcrumbs_subtitle_color',
				'type'       	=> 'color',
				'section' 		=> 'qiupid_general_settings_breadcrumbs',
				'selector'   	=> 'format',
				'title'      	=> esc_html__( 'Subtitle Color', 'qiupid' ),
				'selector'   	  => ".qiupid-breadcrumbs .breadcrumb .active, .breadcrumb, .breadcrumb a::after,.qiupid-breadcrumbs .breadcrumb a",
				'css_format' 	  => 'color: {{value}};',
			),
			array(
				'name'        	=> "qiupid_breadcrumbs_subtitle_typo",
				'type'        	=> 'typography',
				'section'     	=> "qiupid_general_settings_breadcrumbs",
				'title'       	=> esc_html__( 'Subtitle Typography', 'qiupid' ),
				'css_format'  	=> 'typography',
				'selector'    	=> ".qiupid-breadcrumbs .breadcrumb .active, .breadcrumb,.qiupid-breadcrumbs .breadcrumb a",
			),
			array(
				'name'    			=> 'qiupid_breadcrumbs_delimitator_heading',
				'type'    			=> 'heading',
				'section' 			=> 'qiupid_general_settings_breadcrumbs',
				'title'   			=> esc_html__( 'Delimitator', 'qiupid' ),
			),
			array(
				'name'       		=> 'qiupid_breadcrumbs_delimitator_color',
				'type'       		=> 'color',
				'section' 			=> 'qiupid_general_settings_breadcrumbs',
				'selector'   		=> 'format',
				'default'			=> 'rgba(0,150,57,0)',
				'title'      		=> esc_html__( 'Delimitator', 'qiupid' ),
				'selector'   	  	=> ".qiupid-breadcrumbs .row",
				'css_format' 	  	=> 'border-color: {{value}};',
			),

			// Preloader
			array(
				'name'  			=> "qiupid_general_settings_preloader",
				'type'  			=> 'section',
				'panel' 			=> 'general_settings_panel',
				'title' 			=> esc_html__( 'Preloader', 'qiupid' ),
			),
			array(
				'name'           	=> 'qiupid_enable_preloader',
				'type'            	=> 'checkbox',
				'section'         	=> 'qiupid_general_settings_preloader',
				'title'           	=> esc_html__( 'Preloader', 'qiupid' ),
				'description'     	=> esc_html__('Enable or disable preloader', 'qiupid'),
				'default'         	=> 0
			),
			array(
				'name'            	=> 'qiupid_preloader_image',
				'type'            	=> 'image',
				'section'         	=> 'qiupid_general_settings_preloader',
				'title'           	=> esc_html__( 'Image', 'qiupid' )
			),
			array(
				'name'            => 'qiupid_preloader_bg_color',
				'type'            => 'color',
				'section'         => 'qiupid_general_settings_preloader',
				'title'           => esc_html__( 'Background Color', 'qiupid' ),
				'default'         => '#000',
				'selector'    	  => ".qiupid_preloader_holder",
				'css_format' 	  => 'background-color: {{value}};'
			),

			// Popup
			array(
				'name'  			=> "qiupid_general_settings_popup",
				'type'  			=> 'section',
				'panel' 			=> 'general_settings_panel',
				'title' 			=> esc_html__( 'Popup', 'qiupid' ),
			),
			array(
				'name'           	=> 'qiupid_enable_popup',
				'type'            	=> 'checkbox',
				'section'         	=> 'qiupid_general_settings_popup',
				'title'           	=> esc_html__( 'Popup', 'qiupid' ),
				'description'     	=> esc_html__('Enable or disable popup', 'qiupid'),
				'default'         	=> 0
			),
			array(
				'name'    			=> 'qiupid_popup_design_heading',
				'type'    			=> 'heading',
				'section' 			=> 'qiupid_general_settings_popup',
				'title'   			=> esc_html__( 'Design', 'qiupid' ),
			),
			array(
				'name'            	=> 'qiupid_popup_image',
				'type'            	=> 'image',
				'section'         	=> 'qiupid_general_settings_popup',
				'title'           	=> esc_html__( 'Image', 'qiupid' ),
				'description' 	  	=> esc_html__('Set your popup image', 'qiupid'),
			),
			array(
				'name'            	=> 'qiupid_popup_content',
				'type'            	=> 'textarea',
				'section'         	=> 'qiupid_general_settings_popup',
				'default'         	=> esc_html__( 'Add custom text here or remove it', 'qiupid' ),
				'title'           	=> esc_html__( 'Content', 'qiupid' ),
				'description'     	=> esc_html__( 'Set texts and images to the content.', 'qiupid' ),
			),
			array(
				'name'    			=> 'qiupid_popup_settings_heading',
				'type'    			=> 'heading',
				'section' 			=> 'qiupid_general_settings_popup',
				'title'   			=> esc_html__( 'Settings', 'qiupid' ),
			),
			array(
                'name'       		=> 'qiupid_popup_url',
                'type'     			=> 'text',
                'title'    			=> esc_html__('URL', 'qiupid'),
                'section'       	=> 'qiupid_general_settings_popup',
            ),
			array(
				'name'            	=> 'qiupid_popup_expiring_cookie',
				'type'            	=> 'select',
				'section'         	=> 'qiupid_general_settings_popup',
				'title'           	=> esc_html__('Expiring Cookie', 'qiupid' ),
				'description'     	=> esc_html__('Select the days for when the cookies to expire.', 'qiupid'),
				'choices'         	=> array(
					'1' 	=> esc_html__( '1 Day', 'qiupid' ),
					'3'  	=> esc_html__( '3 Days', 'qiupid' ),
					'7'  	=> esc_html__( '1 Week', 'qiupid' ),
					'30'  	=> esc_html__( '1 Month', 'qiupid' ),
					'3000' 	=> esc_html__( 'Be Remembered', 'qiupid' ),
				),
				'default'   		=> '1',
			),
			array(
				'name'            	=> 'qiupid_popup_show_time',
				'type'            	=> 'select',
				'section'         	=> 'qiupid_general_settings_popup',
				'title'           	=> esc_html__('Show Popup', 'qiupid' ),
				'description'     	=> esc_html__('Select a specific time to show the popup.', 'qiupid'),
				'choices'         	=> array(
					'5000' 	=> esc_html__( '5 seconds', 'qiupid' ),
					'10000' => esc_html__( '10 seconds', 'qiupid' ),
					'20000' => esc_html__( '20 seconds', 'qiupid' )
				),
				'default'   		=> '5000',
			),

            // Contact Information
			array(
				'name'  => "qiupid_general_settings_contact",
				'type'  => 'section',
				'panel' => 'general_settings_panel',
				'title' => esc_html__( 'Contact Information', 'qiupid' ),
			),

			array(
                'name'       	=> 'qiupid_contact_address',
                'type'     		=> 'text',
                'title'    		=> esc_html__('Address', 'qiupid'),
                'section'       => 'qiupid_general_settings_contact',
            ),
            array(
                'name'       	=> 'qiupid_contact_email',
                'type'     		=> 'text',
                'title'    		=> esc_html__('Email', 'qiupid'),
                'section'       => 'qiupid_general_settings_contact',
            ),
            array(
                'name'       	=> 'qiupid_contact_phone',
                'type'     		=> 'text',
                'title'    		=> esc_html__('Phone', 'qiupid'),
                'section'       => 'qiupid_general_settings_contact',
            ),

			//Back to top
			array(
				'name'  => "qiupid_general_settings_back_to_top",
				'type'  => 'section',
				'panel' => 'general_settings_panel',
				'title' => esc_html__( 'Back to Top', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_backtotop_status',
				'type'            => 'checkbox',
				'section'         => 'qiupid_general_settings_back_to_top',
				'title'           => esc_html__( 'Back to Top Button Status', 'qiupid' ),
				'default'         => 1
			),
			array(
				'name'            => 'qiupid_backtotop_bg_color',
				'type'            => 'color',
				'section'         => 'qiupid_general_settings_back_to_top',
				'title'           => esc_html__( 'Background Color', 'qiupid' ),
				'default'         => '#2695FF',
				'selector'    	  => ".qiupid-back-to-top",
				'css_format' 	  => 'background-color: {{value}};'
			),
			array(
				'name'            => 'qiupid_backtotop_icon_color',
				'type'            => 'color',
				'section'         => 'qiupid_general_settings_back_to_top',
				'title'           => esc_html__( 'Icon Color', 'qiupid' ),
				'default'         => '#FFF',
				'selector'    	  => ".qiupid-back-to-top, .qiupid-back-to-top.qiupid-is-visible:visited",
				'css_format' 	  => 'color: {{value}};'
			),
			array(
				'name'            => 'qiupid_backtotop_bg_color_hover',
				'type'            => 'color',
				'section'         => 'qiupid_general_settings_back_to_top',
				'title'           => esc_html__( 'Background Color (Hover)', 'qiupid' ),
				'default'         => '#222',
				'selector'    	  => ".qiupid-back-to-top:hover",
				'css_format' 	  => 'background-color: {{value}};'
			),
			array(
				'name'            => 'qiupid_backtotop_icon_color_hover',
				'type'            => 'color',
				'section'         => 'qiupid_general_settings_back_to_top',
				'title'           => esc_html__( 'Icon Color (Hover)', 'qiupid' ),
				'default'         => '#FFF',
				'selector'    	  => ".qiupid-back-to-top:hover",
				'css_format' 	  => 'color: {{value}};'
			),
			array(
				'name'            	=> 'qiupid_backtotop_radius',
				'type'            	=> 'css_ruler',
				'section'    		=> 'qiupid_general_settings_back_to_top',
				'device_settings' 	=> true,
				'css_format'      	=> array(
					'top'    => 'border-bottom-right-radius: {{value}};',
					'right'  => 'border-top-right-radius: {{value}};',
					'bottom' => 'border-bottom-left-radius: {{value}};',
					'left'   => 'border-top-left-radius: {{value}};',
				),
				'selector'        	=> "body .qiupid-back-to-top",
				'label'           	=> esc_html__( 'Border Radius', 'qiupid' ),
			),
		);

		return array_merge( $configs, $config );
	}
}

add_filter( 'qiupid/customizer/config', 'qiupid_customizer_general_settings_config' );
