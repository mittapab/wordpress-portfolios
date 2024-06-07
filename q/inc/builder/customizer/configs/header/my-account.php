<?php

class qiupid_Builder_Item_My_Account {
	public $id = 'my_account';

	/**
	 * Register Builder item
	 *
	 * @return array
	 */
	function item() {
		return array(
			'name'    => esc_html__( 'My Account', 'qiupid' ),
			'id'      => $this->id,
			'col'     => 0,
			'width'   => '4',
			'section' => 'header_my_account',
		);
	}

	/**
	 * Optional, Register customize section and panel.
	 *
	 * @return array
	 */
	function customize() {
		// Render callback function.
		$fn     = array( $this, 'render' );
		$config = array(
			array(
				'name'     => 'header_my_account',
				'type'     => 'section',
				'panel'    => 'header_settings',
				'priority' => 200,
				'title'    => esc_html__( 'My Account', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_header_my_account_icon_max_height',
				'type'            => 'slider',
				'section'         => 'header_my_account',
				'default'         => array(),
				'max'             => 100,
				'device_settings' => true,
				'title'           => esc_html__( 'Icon Max Height', 'qiupid' ),
				'selector'        => 'format',
				'css_format'      => ".builder-item--my_account i { font-size: {{value}}; }",
			),
			array(
				'name'        => 'qiupid_header_my_account_styling',
				'type'        => 'styling',
				'section'     => 'header_my_account',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Styling', 'qiupid' ),
				'selector'    => array(
					'normal'            => ".builder-item--my_account li.menu-grid-item a, .builder-item--my_account a.menu-grid-item",
					'hover'             => ".builder-item--my_account:hover li.menu-grid-item a, .builder-item--my_account:hover a.menu-grid-item"
				),
				'fields'      => array(
					'normal_fields' => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'margin'        => false,
						'border'		=> false,
						'border_style' 	=> false,
					),
					'hover_fields'  => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'padding'       => false,
						'margin'        => false,
						'border'		=> false,
						'border_radius' => false,
						'box_shadow' 	=> false,
						'border_style' 	=> false,
					),
				),
			),
			array(
				'name'        => "qiupid_header_my_account_typography",
				'type'        => 'typography',
				'section'     => "header_my_account",
				'title'       => esc_html__( 'Typography', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => ".builder-item--my_account .qiupid-header-group-label",
			),
			array(
				'name'        => 'qiupid_header_my_account_styling_submenu',
				'type'        => 'styling',
				'section'     => 'header_my_account',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Dropdown Styling', 'qiupid' ),
				'selector'    => array(
					'normal'            => "body #dropdown-user-profile ul li a",
					'hover'             => "body #dropdown-user-profile ul li a:hover"
				),
				'fields'      => array(
					'normal_fields' => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'padding'       => false,
						'margin'        => false,
						'bg_color'      => false,
						'border'		=> false,
						'border_radius' => false,
						'box_shadow' 	=> false,
						'border_style' 	=> false,
					),
					'hover_fields'  => array(
						'link_color'    => false,
						'bg_cover'      => false,
						'bg_image'      => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
						'padding'       => false,
						'margin'        => false,
						'bg_color'      => false,
						'border'		=> false,
						'border_radius' => false,
						'box_shadow' 	=> false,
						'border_style' 	=> false,
					),
				),
			),
			array(
				'name'  		  => 'qiupid_header_my_account_icon',
				'type'  		  => 'icon',
				'section'         => 'header_my_account',
				'icon' 			  => 'fas fa-user-circle',
				'label' 		  => esc_html__( 'Icon', 'qiupid' ),
			),
			array(
				'name'           => 'qiupid_header_my_account__hide_icon',
				'type'           => 'checkbox',
				'section'        => 'header_my_account',
				'checkbox_label' => esc_html__( 'Hide icon', 'qiupid' ),
				'css_format'     => 'html_class',
			),
			array(
				'name'           => 'qiupid_header_my_account__hide_text',
				'type'           => 'checkbox',
				'section'        => 'header_my_account',
				'checkbox_label' => esc_html__( 'Hide text', 'qiupid' ),
				'css_format'     => 'html_class',
			),
		);

		// Item Layout.
		return array_merge( $config, qiupid_header_layout_settings( $this->id, 'header_my_account' ) );
	}

	/**
	 * Optional. Render item content
	 */
	function render() {
		$hide_icon = sanitize_text_field( qiupid()->get_setting( 'qiupid_header_my_account__hide_icon' ) );
		$hide_text = sanitize_text_field( qiupid()->get_setting( 'qiupid_header_my_account__hide_text' ) );

		$icon = Qiupid()->get_setting( 'qiupid_header_my_account_icon');
		if (empty(Qiupid()->get_setting( 'qiupid_header_my_account_icon'))) {
			$icon = 'fas fa-user-circle';
		} else {
			$icon = $icon['icon'];
		}
		
		echo '<div class="header-group-wrapper text-center">';
	        	if ( class_exists( "BuddyPress" ) || class_exists('Youzify') ) {
	        		$profile_page = youzify_get_profile_settings_url();
					$login_page = home_url(). '/login';
					echo '<div id="dropdown-user-profile" class="ddmenu">';
				        if(!$hide_icon) {
		  					echo '<a class="menu-grid-item" href="#"><i class="'.esc_html($icon).'"></i></a>';
						}
						if (is_user_logged_in()) {
					        if(!$hide_text) {
			 					echo '<div class="header-group">';
					            	echo '<a class="menu-grid-item qiupid-header-group-label" href="'.esc_attr($profile_page).'">'.esc_html__('My Profile','qiupid').'</a>';
						        echo '</div>';
					        }
							echo '</div>';
			 			} else { 
			 				if(!$hide_text) {
			 					echo '<div class="header-group">';
					            	echo '<a class="menu-grid-item qiupid-header-group-label" href="'.esc_attr($login_page).'">'.esc_html__('Log In','qiupid').'</a>';
						        echo '</div>';
					        }
					         echo '<div id="nav-menu-login" class="menu-grid-item">';
					        	do_action('farmacie_login_link_a');
					    	echo '</div>';

					    	echo '</div>';
						} 
				} elseif ( class_exists('woocommerce')) {
			       	echo '<div id="dropdown-user-profile" class="ddmenu">';
				        if(!$hide_icon) {
		  					echo '<a class="menu-grid-item" href="'.esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )).'"><i class="'.esc_html($icon).'"></i></a>';
						}
						if (is_user_logged_in()) {
					        if(!$hide_text) {
			 					echo '<div class="header-group">';
					            	echo '<a class="menu-grid-item qiupid-header-group-label" href="'.esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )).'">'.esc_html__('My Account','qiupid').'</a>';
						        echo '</div>';
					        }
					        ?>
							<ul>
								<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
									<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
										<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
							<?php 
							echo '</div>';
			 			} else { 
			 				if(!$hide_text) {
			 					echo '<div class="header-group">';
					            	echo '<a class="menu-grid-item qiupid-header-group-label" href="'.esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )).'">'.esc_html__('Log In','qiupid').'</a>';
						        echo '</div>';
					        }
					         echo '<div id="nav-menu-login" class="menu-grid-item">';
					        	do_action('farmacie_login_link_a');
					    	echo '</div>';

					    	echo '</div>';
						} 
	 			}
		echo '</div>';
	}
}

qiupid_Customize_Layout_Builder()->register_item( 'header', new qiupid_Builder_Item_My_Account() );
