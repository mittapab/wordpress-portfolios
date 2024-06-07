<?php

class Qiupid_Builder_Item_My_Cart {
	public $id = 'my_cart';

	/**
	 * Register Builder item
	 *
	 * @return array
	 */
	function item() {
		return array(
			'name'    => esc_html__( 'My Cart', 'qiupid' ),
			'id'      => $this->id,
			'col'     => 0,
			'width'   => '4',
			'section' => 'header_my_cart',
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
				'name'     => 'header_my_cart',
				'type'     => 'section',
				'panel'    => 'header_settings',
				'priority' => 200,
				'title'    => esc_html__( 'My Cart', 'qiupid' ),
			),
			array(
				'name'        => 'qiupid_header_my_cart_styling',
				'type'        => 'styling',
				'section'     => 'header_my_cart',
				'css_format'  => 'styling',
				'title'       => esc_html__( 'Styling', 'qiupid' ),
				'selector'    => array(
					'normal'            => ".builder-item--my_cart a.menu-grid-item, a.qiupid-cart-contents, .qiupid-cart-contents span.amount, .header_mini_cart_group",
					'hover'             => ".builder-item--my_cart:hover a.menu-grid-item, .builder-item--my_cart:hover .header_mini_cart_group"
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
				'name'        => "qiupid_header_my_cart_typography",
				'type'        => 'typography',
				'section'     => "header_my_cart",
				'title'       => esc_html__( 'Typography', 'qiupid' ),
				'css_format'  => 'typography',
				'selector'    => ".builder-item--my_cart .qiupid-header-group-label, a.qiupid-cart-contents, .qiupid-cart-contents span.amount",
			),
			array(
				'name'            => 'qiupid_header_my_cart_icon_max_height',
				'type'            => 'slider',
				'section'         => 'header_my_cart',
				'default'         => array(),
				'max'             => 100,
				'device_settings' => true,
				'title'           => esc_html__( 'Icon Max Height', 'qiupid' ),
				'selector'        => 'format',
				'css_format'      => ".builder-item--my_cart i { font-size: {{value}}; }",
			),
			array(
				'name'  		  => 'qiupid_header_my_cart_icon',
				'type'  		  => 'icon',
				'section'         => 'header_my_cart',
				'icon' 			  => 'fas fa-shopping-basket',
				'label' 		  => esc_html__( 'Icon', 'qiupid' ),
			),
			array(
				'name'           => 'qiupid_header_my_cart__hide_icon',
				'type'           => 'checkbox',
				'section'        => 'header_my_cart',
				'checkbox_label' => esc_html__( 'Hide icon', 'qiupid' ),
				'css_format'     => 'html_class',
			),
			array(
				'name'           => 'qiupid_header_my_cart__hide_text',
				'type'           => 'checkbox',
				'section'        => 'header_my_cart',
				'checkbox_label' => esc_html__( 'Hide "My Cart" text', 'qiupid' ),
				'css_format'     => 'html_class',
			),
			array(
				'name'           => 'qiupid_header_my_cart__cart_contents',
				'type'           => 'checkbox',
				'section'        => 'header_my_cart',
				'checkbox_label' => esc_html__( 'Cart Contents', 'qiupid' ),
				'css_format'     => 'html_class',
			),

		);

		// Item Layout.
		return array_merge( $config, qiupid_header_layout_settings( $this->id, 'header_my_cart' ) );
	}

	/**
	 * Optional. Render item content
	 */
	function render() {
		$cart_url = "#";
		if ( class_exists( 'WooCommerce' ) ) {
		    $cart_url = wc_get_cart_url();
		}
		$hide_icon = sanitize_text_field( Qiupid()->get_setting( 'qiupid_header_my_cart__hide_icon' ) );
		$hide_text = sanitize_text_field( Qiupid()->get_setting( 'qiupid_header_my_cart__hide_text' ) );
		$cart_contents = sanitize_text_field( Qiupid()->get_setting( 'qiupid_header_my_cart__cart_contents' ) );

		$icon = Qiupid()->get_setting( 'qiupid_header_my_cart_icon');
		if (empty(Qiupid()->get_setting( 'qiupid_header_my_cart_icon'))) {
			$icon = 'fas fa-shopping-basket';
		} else {
			$icon = $icon['icon'];
		}
		echo '<div class="header-group-wrapper h-cart text-center">';

  			if(!$hide_icon) {
  				echo '<a  class="menu-grid-item" href="'.esc_url($cart_url).'">';
		  			echo '<i class="'.esc_html($icon).'"></i>';
				echo '</a>';
			}
    		echo '<div class="header_mini_cart_group">';
        		if(!$hide_text) {
	        		echo '<a  class="menu-grid-item qiupid-header-group-label" href="'.esc_url($cart_url).'">'.esc_html__('My Cart', 'qiupid').'</a>';
            	} 
			
				if ($cart_contents){ ?>
	                <a class="qiupid-cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'qiupid'); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'qiupid' ), WC()->cart->get_cart_contents_count() ); ?>, <?php echo WC()->cart->get_cart_total(); ?>
	                </a>
	            <?php }

    		echo '</div>';
	
    		echo '<div class="header_mini_cart">';
      			the_widget( 'WC_Widget_Cart' );
    		echo '</div>';
		echo '</div>';
	}
}

Qiupid_Customize_Layout_Builder()->register_item( 'header', new Qiupid_Builder_Item_My_Cart() );
