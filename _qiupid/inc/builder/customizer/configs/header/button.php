<?php

class Qiupid_Builder_Item_Button {
	public $id = 'button';

	function __construct() {
		add_filter( 'qiupid/icon_used', array( $this, 'used_icon' ) );
	}

	function used_icon( $list = array() ) {
		$list[ $this->id ] = 1;

		return $list;
	}

	function item() {
		return array(
			'name'    => esc_html__( 'Button', 'qiupid' ),
			'id'      => 'button',
			'col'     => 0,
			'width'   => '4',
			'section' => 'header_button',
		);
	}

	function customize() {
		$fn       = array( $this, 'render' );
		$config   = array(
			array(
				'name'  => 'header_button',
				'type'  => 'section',
				'panel' => 'header_settings',
				'title' => esc_html__( 'Button', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_header_button_text',
				'type'            => 'text',
				'section'         => 'header_button',
				'theme_supports'  => '',
				'selector'        => 'a.item--button',
				'render_callback' => $fn,
				'title'           => esc_html__( 'Text', 'qiupid' ),
				'default'         => esc_html__( 'Button', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_header_button_icon',
				'type'            => 'icon',
				'section'         => 'header_button',
				'selector'        => 'a.item--button',
				'render_callback' => $fn,
				'theme_supports'  => '',
				'title'           => esc_html__( 'Icon', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_header_button_position',
				'type'            => 'radio_group',
				'section'         => 'header_button',
				'selector'        => 'a.item--button',
				'render_callback' => $fn,
				'default'         => 'before',
				'title'           => esc_html__( 'Icon Position', 'qiupid' ),
				'choices'         => array(
					'before' => esc_html__( 'Before', 'qiupid' ),
					'after'  => esc_html__( 'After', 'qiupid' ),
				),
			),

			array(
				'name'            => 'qiupid_header_button_link',
				'type'            => 'text',
				'section'         => 'header_button',
				'selector'        => 'a.item--button',
				'render_callback' => $fn,
				'title'           => esc_html__( 'Link', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_header_button_target',
				'type'            => 'checkbox',
				'section'         => 'header_button',
				'selector'        => 'a.item--button',
				'render_callback' => $fn,
				'checkbox_label'  => esc_html__( 'Open link in a new tab.', 'qiupid' ),
			),

			array(
				'name'        => 'qiupid_header_button_typography',
				'type'        => 'typography',
				'section'     => 'header_button',
				'title'       => esc_html__( 'Typography', 'qiupid' ),
				'description' => esc_html__( 'Advanced typography for button', 'qiupid' ),
				'selector'    => 'a.item--button',
				'css_format'  => 'typography',
				'default'     => array(),
			),

			array(
				'name'        => 'qiupid_header_button_styling',
				'type'        => 'styling',
				'section'     => 'header_button',
				'title'       => esc_html__( 'Styling', 'qiupid' ),
				'description' => esc_html__( 'Advanced styling for button', 'qiupid' ),
				'selector'    => array(
					'normal' => '.site-header-inner a.item--button',
					'hover'  => '.site-header-inner a.item--button:hover',
				),
				'css_format'  => 'styling',
				'default'     => array(),
				'fields'      => array(
					'normal_fields' => array(
						'link_color'    => false,
						'margin'        => false,
						'bg_image'      => false,
						'bg_cover'      => false,
						'bg_position'   => false,
						'bg_repeat'     => false,
						'bg_attachment' => false,
					),
					'hover_fields'  => array(
						'link_color' => false,
					),
				),
			),

		);

		// Item Layout.
		return array_merge( $config, qiupid_header_layout_settings( $this->id, 'header_button' ) );
	}


	function render() {
		$text          = Qiupid()->get_setting( 'qiupid_header_button_text' );
		$icon          = Qiupid()->get_setting( 'qiupid_header_button_icon' );
		$new_window    = Qiupid()->get_setting( 'qiupid_header_button_target' );
		$link          = Qiupid()->get_setting( 'qiupid_header_button_link' );
		$icon_position = Qiupid()->get_setting( 'qiupid_header_button_position' );
		$classes       = array( 'item--button', 'qiupid-btn qiupid-builder-btn' );

		$icon = wp_parse_args(
			$icon,
			array(
				'type' => '',
				'icon' => '',
			)
		);

		$target = '';
		if ( 1 == $new_window ) {
			$target = ' target="_blank" ';
		}

		$icon_html = '';
		if ( $icon['icon'] ) {
			$icon_html = '<i class="' . esc_attr( $icon['icon'] ) . '"></i> ';
		}
		$classes[] = 'is-icon-' . $icon_position;
		if ( ! $text ) {
			$text = esc_html__( 'Button', 'qiupid' );
		}

		echo '<a' . $target . ' href="' . esc_url( $link ) . '" class="' . esc_attr( join( ' ', $classes ) ) . '">';
		if ( 'after' != $icon_position ) {
			echo wp_kses_post($icon_html) . esc_html( $text );
		} else {
			echo esc_html( $text ) . $icon_html;
		}
		echo '</a>';
	}
}

Qiupid_Customize_Layout_Builder()->register_item( 'header', new Qiupid_Builder_Item_Button() );


