<?php

class Qiupid_Builder_Item_Wishlist {

	public $id = 'wishlist';

	/**
	 * Register Builder item
	 *
	 * @return array
	 */
	function item() {
		return array(
			'name'    => esc_html__( 'Wishlist', 'qiupid' ),
			'id'      => $this->id,
			'col'     => 0,
			'width'   => '4',
			'section' => 'header_wishlist',
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
				'name'     => 'header_wishlist',
				'type'     => 'section',
				'panel'    => 'header_settings',
				'priority' => 211,
				'title'    => esc_html__( 'Wishlist', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_header_wishlist_link',
				'type'            => 'text',
				'section'         => 'header_wishlist',
				'theme_supports'  => '',
				'default'         => esc_html__( '#', 'qiupid' ),
				'title'           => esc_html__( 'Wishlist Page Link', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_header_wishlist_icon_max_height',
				'type'            => 'slider',
				'section'         => 'header_wishlist',
				'default'         => array(),
				'max'             => 100,
				'device_settings' => true,
				'title'           => esc_html__( 'Icon Max Height', 'qiupid' ),
				'selector'        => 'format',
				'css_format'      => ".builder-item--wishlist i { font-size: {{value}}; }",
			),
			array(
				'name'        => 'qiupid_header_wishlist_styling',
				'type'        => 'styling',
				'section'     => 'header_wishlist',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Styling', 'qiupid' ),
				'selector'    => array(
					'normal'            => ".builder-item--wishlist .menu-grid-item",
					'hover'             => ".builder-item--wishlist .menu-grid-item:hover"
				),
				'fields'      => array(
					'normal_fields' => array(
						'link_color'    => false, // disable for special field.
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
				'name'        => "qiupid_header_wishlist_typography",
				'type'        => 'typography',
				'section'     => "header_wishlist",
				'title'       => esc_html__( 'Typography', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => ".builder-item--wishlist .qiupid-header-group-label",
			),
			array(
				'name'  		  => 'qiupid_header_wishlist_icon',
				'type'  		  => 'icon',
				'section'         => 'header_wishlist',
				'icon' 			  => 'fas fa-heart',
				'label' 		  => esc_html__( 'Icon', 'qiupid' ),
			),
			array(
				'name'           => 'qiupid_header_wishlist__hide_icon',
				'type'           => 'checkbox',
				'section'        => 'header_wishlist',
				'checkbox_label' => esc_html__( 'Hide icon', 'qiupid' ),
				'css_format'     => 'html_class',
			),
			array(
				'name'           => 'qiupid_header_wishlist__hide_text',
				'type'           => 'checkbox',
				'section'        => 'header_wishlist',
				'checkbox_label' => esc_html__( 'Hide text', 'qiupid' ),
				'css_format'     => 'html_class',
			),

		);

		// Item Layout.
		return array_merge( $config, qiupid_header_layout_settings( $this->id, 'header_wishlist' ) );
	}

	/**
	 * Optional. Render item content
	 */
	function render() {
		$hide_icon = sanitize_text_field( Qiupid()->get_setting( 'qiupid_header_wishlist__hide_icon' ) );
		$hide_text = sanitize_text_field( qiupid()->get_setting( 'qiupid_header_wishlist__hide_text' ) );
		$link = sanitize_text_field( qiupid()->get_setting( 'qiupid_header_wishlist_link' ) );
		$icon = Qiupid()->get_setting( 'qiupid_header_wishlist_icon');
		if (empty(Qiupid()->get_setting( 'qiupid_header_wishlist_icon'))) {
			$icon = 'fas fa-heart';
		} else {
			$icon = $icon['icon'];
		}

		echo '<div class="header-group-wrapper text-center">';
			if(!$hide_icon) {
  				echo '<a class="menu-grid-item" href="'.esc_url($link).'"><i class="'.esc_html($icon).'"></i></a>';
			}
			if(!$hide_text) {
				echo '<div class="header-group">';
		  			echo '<a class="menu-grid-item qiupid-header-group-label" href="'.esc_url($link).'">';
		              	esc_html_e('Wishlist', 'qiupid');
		            echo '</a>';
		        echo '</div>';
		    }
		echo '</div>';
	}
}

Qiupid_Customize_Layout_Builder()->register_item( 'header', new Qiupid_Builder_Item_Wishlist() );
