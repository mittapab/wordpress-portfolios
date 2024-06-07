<?php

class Qiupid_Builder_Item_My_Orders {

	public $id = 'my_orders';

	/**
	 * Register Builder item
	 *
	 * @return array
	 */
	function item() {
		return array(
			'name'    => esc_html__( 'My Orders', 'qiupid' ),
			'id'      => $this->id,
			'col'     => 0,
			'width'   => '4',
			'section' => 'header_my_orders',
		);
	}

	/**
	 * Optional, Register customize section and panel.
	 *
	 * @return array
	 */
	function customize() {
		$fn     = array( $this, 'render' );
		$config = array(
			array(
				'name'     => 'header_my_orders',
				'type'     => 'section',
				'panel'    => 'header_settings',
				'priority' => 201,
				'title'    => esc_html__( 'My Orders', 'qiupid' ),
			),
			array(
				'name'        => 'qiupid_header_my_orders_styling',
				'type'        => 'styling',
				'section'     => 'header_my_orders',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Menu  Styling', 'qiupid' ),
				'description' => esc_html__( 'Only reffered to "My Orders" Button.', 'qiupid' ),
				'selector'    => array(
					'normal'            => ".builder-item--my_orders a.menu-grid-item",
					'hover'             => ".builder-item--my_orders a.menu-grid-item:hover"
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
				'name'        => "qiupid_header_my_orders_typography",
				'type'        => 'typography',
				'section'     => "header_my_orders",
				'title'       => esc_html__( 'Typography', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => ".builder-item--my_orders .qiupid-header-group-label",
			),
			array(
				'name'            => 'qiupid_header_my_orders_icon_max_height',
				'type'            => 'slider',
				'section'         => 'header_my_orders',
				'default'         => array(),
				'max'             => 100,
				'device_settings' => true,
				'title'           => esc_html__( 'Icon Max Height', 'qiupid' ),
				'selector'        => 'format',
				'css_format'      => ".builder-item--my_orders i { font-size: {{value}}; }",
			),
			array(
				'name'  		  => 'qiupid_header_my_orders_icon',
				'type'  		  => 'icon',
				'section'         => 'header_my_orders',
				'icon' 			  => 'fas fa-user-clock',
				'label' 		  => esc_html__( 'Icon', 'qiupid' ),
			),
			array(
				'name'           => 'qiupid_header_my_orders__hide_icon',
				'type'           => 'checkbox',
				'section'        => 'header_my_orders',
				'checkbox_label' => esc_html__( 'Hide icon', 'qiupid' ),
				'css_format'     => 'html_class',
			),
			array(
				'name'           => 'qiupid_header_my_orders__hide_text',
				'type'           => 'checkbox',
				'section'        => 'header_my_orders',
				'checkbox_label' => esc_html__( 'Hide text', 'qiupid' ),
				'css_format'     => 'html_class',
			),

		);

		// Item Layout.
		return array_merge( $config, qiupid_header_layout_settings( $this->id, 'header_my_orders' ) );
	}

	/**
	 * Optional. Render item content
	 */
	function render() {
		$hide_icon = sanitize_text_field( Qiupid()->get_setting( 'qiupid_header_my_orders__hide_icon' ) );
		$hide_text = sanitize_text_field( Qiupid()->get_setting( 'qiupid_header_my_orders__hide_text' ) );
		$icon = Qiupid()->get_setting( 'qiupid_header_my_orders_icon');
		if (empty(Qiupid()->get_setting( 'qiupid_header_my_orders_icon'))) {
			$icon = 'fa fa-clock-o';
		} else {
			$icon = $icon['icon'];
		}

		if ( class_exists('woocommerce')) {
			echo '<div class="header-group-wrapper text-center">';
				if(!$hide_icon) {
	  				echo '<a class= "menu-grid-item" href="'.esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'orders').'"><i class="'.esc_html($icon).'"></i></a>';
				}
				if(!$hide_text) {
					echo '<div class="header-group">';
			  			echo '<a class="menu-grid-item qiupid-header-group-label" href="'.esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'orders').'">';
			              	esc_html_e('Order Status', 'qiupid');
			            echo '</a>';
			        echo '</div>';
				}
			echo '</div>';
		}
	}
}

Qiupid_Customize_Layout_Builder()->register_item( 'header', new Qiupid_Builder_Item_My_Orders() );