<?php

/**
 * Add Panel Builder to WP Customize
 *
 * Class Qiupid_Customize_Layout_Builder
 */
class Qiupid_Customize_Layout_Builder {
	static $_instance;
	private $registered_items    = array();
	private $registered_builders = array();

	/**
	 * Initial
	 */
	function init() {

		do_action( 'qiupid/customize-builder/init' );

		if ( is_admin() ) {
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'scripts' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'template' ) );
			add_action( 'wp_ajax_qiupid_builder_save_template', array( $this, 'ajax_save_template' ) );
			add_action( 'wp_ajax_qiupid_builder_export_template', array( $this, 'ajax_export_template' ) );
		}

	}

	/**
	 * Register builder panel
	 *
	 * @see Qiupid_Customize_Builder_Panel
	 *
	 * @param string                            $id    ID of panel.
	 * @param Qiupid_Customize_Builder_Panel $class Panel class name.
	 *
	 * @return bool
	 */
	public function register_builder( $id, $class ) {
		if ( ! isset( $id ) ) {
			return false;
		}

		if ( ! is_object( $class ) ) {
			if ( ! class_exists( $class ) ) {
				return false;
			}

			$class = new $class();
		}

		if ( ! $class instanceof Qiupid_Customize_Builder_Panel ) {
			$name = get_class( $class );
			_doing_it_wrong( $name, sprintf( esc_html__( 'Class <strong>%s</strong> do not extends class <strong>Qiupid_Customize_Builder_Panel</strong>.', 'qiupid' ), $name ), '1.0.0' );
			return false;
		}

		add_filter( 'qiupid/customizer/config', array( $class, '_customize' ), 35, 2 );
		$this->registered_builders[ $id ] = $class;
	}

	/**
	 * Get builder class
	 *
	 * @since 0.2.9
	 *
	 * @param string $builder_id
	 * @return object|bool
	 */
	public function get_builder( $builder_id ) {
		return isset( $this->registered_builders[ $builder_id ] ) ? $this->registered_builders[ $builder_id ] : false;
	}


	/**
	 * Add an item builder to panel
	 *
	 * @see Qiupid_Customize_Layout_Builder::register_builder();
	 *
	 * @param string $builder_id Id of panel.
	 * @param object $class      Class to handle this item.
	 *
	 * @return bool
	 */
	function register_item( $builder_id, $class ) {
		if ( ! $builder_id ) {
			return false;
		}

		if ( is_object( $class ) ) {

		} else {
			if ( ! class_exists( $class ) ) {
				return false;
			}
			$class = new $class();
		}

		if ( ! isset( $this->registered_items[ $builder_id ] ) ) {
			$this->registered_items[ $builder_id ] = array();
		}

		$this->registered_items[ $builder_id ][ $class->id ] = $class;

		return true;

	}

	/**
	 * Get all items for builder panel
	 *
	 * @param string $builder_id Id of panel.
	 *
	 * @return array|mixed
	 */
	function get_builder_items( $builder_id ) {
		if ( ! $builder_id ) {
			return apply_filters( 'qiupid/builder/' . $builder_id . '/items', array() );
		}
		if ( ! isset( $this->registered_items[ $builder_id ] ) ) {
			return apply_filters( 'qiupid/builder/' . $builder_id . '/items', array() );
		}
		$items = array();
		foreach ( $this->registered_items[ $builder_id ] as $name => $obj ) {
			if ( method_exists( $obj, 'item' ) ) {
				$item                 = $obj->item();
				$items[ $item['id'] ] = $item;
			}
		}
		$items = apply_filters( 'qiupid/builder/' . $builder_id . '/items', $items );

		return $items;
	}

	/**
	 * Get all customize settings of all items for builder panel
	 *
	 * @param string               $builder_id   Id of panel.
	 * @param WP_Customize_Manager $wp_customize WP Customize.
	 *
	 * @return array|bool
	 */
	public function get_items_customize( $builder_id, $wp_customize = null ) {
		if ( ! $builder_id ) {
			return false;
		}
		if ( ! isset( $this->registered_items[ $builder_id ] ) ) {
			return false;
		}
		$items = array();
		foreach ( $this->registered_items[ $builder_id ] as $name => $obj ) {
			if ( method_exists( $obj, 'customize' ) ) {
				$item = $obj->customize( $wp_customize );
				if ( is_array( $item ) ) {
					foreach ( $item as $it ) {
						$items[] = $it;
					}
				}
			}
		}

		return $items;
	}

	/**
	 * Get a builder item for builder panel
	 *
	 * @param string $builder_id Id of panel.
	 * @param string $item_id    Builder item id.
	 *
	 * @return bool
	 */
	function get_builder_item( $builder_id, $item_id ) {
		if ( ! $builder_id ) {
			return false;
		}
		if ( ! isset( $this->registered_items[ $builder_id ] ) ) {
			return false;
		}

		if ( ! isset( $this->registered_items[ $builder_id ][ $item_id ] ) ) {
			return false;
		}

		return $this->registered_items[ $builder_id ][ $item_id ];
	}

	/**
	 * Handle event save template
	 */
	function ajax_save_template() {

		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_send_json_error( esc_html__( 'Access denied', 'qiupid' ) );
		}

		$id        = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : false;
		$control   = isset( $_POST['control'] ) ? sanitize_text_field( $_POST['control'] ) : '';
		$save_name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		if ( ! $save_name ) {
			$save_name = sprintf( esc_html__( 'Saved %s', 'qiupid' ), date_i18n( 'Y-m-d H:i:s' ) );
		}
		$fn = false;
		if ( ! isset( $this->registered_builders[ $id ] ) ) {
			wp_send_json_error( esc_html__( 'No Support', 'qiupid' ) );
		} else {
			$fn = array( $this->registered_builders[ $id ], '_customize' );
		}

		$theme_name  = wp_get_theme()->get( 'Name' );
		$option_name = "{$theme_name}_{$id}_saved_templates";

		$saved_templates = get_option( $option_name );
		if ( ! is_array( $saved_templates ) ) {
			$saved_templates = array();
		}

		if ( isset( $_POST['remove'] ) ) {
			$remove = sanitize_text_field( $_POST['remove'] );
			if ( isset( $saved_templates[ $remove ] ) ) {
				unset( $saved_templates[ $remove ] );
			}

			update_option( $option_name, $saved_templates );
			wp_send_json_success();
		}

		$config            = call_user_func_array( $fn, array() );
		$new_template_data = array();

		foreach ( $config as $k => $field ) {
			if ( 'panel' != $field['type'] && 'section' != $field['type'] ) {
				$name  = $field['name'];
				$value = get_theme_mod( $name );
				if ( is_array( $value ) ) {
					$value = array_filter( $value );
				}
				if ( $value && ! empty( $value ) ) {
					$new_template_data[ $name ] = $value;
				}
			}
		}

		if ( ! $save_name ) {
			$key_id    = date_i18n( 'Y-m-d H:i:s', current_time( 'timestamp' ) );
			$save_name = sprintf( esc_html__( 'Saved %s', 'qiupid' ), $key_id );
		} else {
			$key_id = $save_name;
		}

		$saved_templates[ $key_id ] = array(
			'name'  => $save_name,
			'image' => '',
			'data'  => $new_template_data,
		);

		update_option( $option_name, $saved_templates );
		$html = '<li class="saved_template li-boxed" data-control-id="' . esc_attr( $control ) . '" data-id="' . esc_attr( $key_id ) . '" data-data="' . esc_attr( wp_json_encode( $new_template_data ) ) . '">' . esc_html( $save_name ) . ' <a href="#" class="load-tpl">' . esc_html__( 'Load', 'qiupid' ) . '</a><a href="#" class="remove-tpl">' . esc_html__( 'Remove', 'qiupid' ) . '</a></li>'; // WPCS: XSS OK.
		wp_send_json_success(
			array(
				'key_id' => $key_id,
				'name'   => $save_name,
				'li'     => $html,
			)
		);
		die();
	}

	/**
	 * Handle event export template
	 */
	function ajax_export_template() {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_send_json_error( esc_html__( 'Access denied', 'qiupid' ) );
		}
		$id   = isset( $_GET['id'] ) ? sanitize_text_field( wp_unslash( $_GET['id'] ) ) : false;
		$name = isset( $_GET['name'] ) ? sanitize_text_field( wp_unslash( $_GET['name'] ) ) : false;

		$theme_name  = wp_get_theme()->get( 'Name' );
		$option_name = "{$theme_name}_{$id}_saved_templates";
		$data        = get_option( $option_name );
		$var         = null;
		if ( $name ) {
			if ( isset( $data[ $name ] ) ) {
				$var = $data[ $name ]['data'];
				$var = array_filter( $var );
			}
		} else {
			$var = $data;
		}
		var_export( $var ); // phpcs:ignore
		die();
	}

	/**
	 *  Get all builders registered.
	 *
	 * @return array
	 */
	public function get_builders() {
		$builders = array();
		foreach ( $this->registered_builders as $id => $builder ) {
			$config          = $builder->get_config();
			$config['items'] = apply_filters( 'qiupid/builder/' . $id . '/items', $this->get_builder_items( $id ) );
			$config['rows']  = apply_filters( 'qiupid/builder/' . $id . '/rows', $builder->get_rows_config() );
			$builders[ $id ] = $config;
		}

		return $builders;
	}

	/**
	 * Add script to Customize
	 */
	function scripts() {
		global $wp_version;
		$suffix = Qiupid()->get_asset_suffix();
		wp_enqueue_script(
			'qiupid-builder-v1',
			esc_url( get_template_directory_uri() ) . '/assets/js/customizer/builder-v1' . $suffix . '.js',
			array(
				'customize-controls',
				'jquery-ui-resizable',
				'jquery-ui-droppable',
				'jquery-ui-draggable',
			),
			false,
			true
		);
		wp_enqueue_script(
			'qiupid-builder-v2',
			esc_url( get_template_directory_uri() ) . '/assets/js/customizer/builder-v2' . $suffix . '.js',
			array(
				'customize-controls',
				'jquery-ui-resizable',
				'jquery-ui-droppable',
				'jquery-ui-draggable',
			),
			false,
			true
		);
		wp_enqueue_script(
			'qiupid-layout-builder',
			esc_url( get_template_directory_uri() ) . '/assets/js/customizer/builder' . $suffix . '.js',
			array(
				'qiupid-builder-v1',
				'qiupid-builder-v2',
			),
			false,
			true
		);

		$hide_sw = get_theme_mod( 'hide_header_builder_switcher' );

		$handle = 'jquery';
		if ( '5.5' == $wp_version ) {
			$handle = 'qiupid-layout-builder';
		}
		wp_localize_script(
			$handle,
			'Qiupid_Layout_Builder',
			array(
				'footer_moved_widgets_text' => '',
				'builders'                  => $this->get_builders(),
				'is_rtl'                    => is_rtl(),
				'change_version_nonce'      => wp_create_nonce( 'change_version_nonce' ),
				'swicth_version'            => esc_html__( 'Switch Builder Version', 'qiupid' ),
				'hide_switcher'             => apply_filters( 'qiupid_hide_header_builder_switcher', get_theme_mod( 'hide_header_builder_switcher', 'no' ) ), // Use get theme mod `hide_header_builder_switcher` for hide switcher.
				'header_builder_version'    => get_theme_mod( 'header_builder_version', $hide_sw ? 'v2' : '' ),
			)
		);
	}

	static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Panel Builder Template
	 */
	function template() {
		require_once get_template_directory() . '/inc/builder/panel-builder/v1/templates/rows.php';
		require_once get_template_directory() . '/inc/builder/panel-builder/v2/templates/rows.php';
		?>
		<script type="text/html" id="tmpl-qiupid--builder-panel">
			<div class="qiupid--customize-builder">
				<div class="qiupid--cb-inner">
					<div class="qiupid--cb-header">
						<div class="qiupid--cb-devices-switcher">
						</div>
						<div class="qiupid--cb-actions">
							<?php do_action( 'qiupid/builder-panel/actions-buttons' ); ?>
							<a data-id="{{ data.id }}_templates" class="focus-section button button-secondary" href="#"><?php _e( 'Templates', 'qiupid' ); ?></a>
							<a class="button button-secondary qiupid--panel-close" href="#">
								<span class="close-text"><?php _e( 'Close', 'qiupid' ); ?></span>
								<span class="panel-name-text">{{ data.title }}</span>
							</a>
						</div>
					</div>
					<div class="qiupid--cb-body"></div>
				</div>
			</div>
		</script>


		<script type="text/html" id="tmpl-qiupid--cb-item">
			<div class="grid-stack-item item-from-list for-s-{{ data.section }}"
				title="{{ data.name }}"
				data-id="{{ data.id }}"
				data-section="{{ data.section }}"
				data-control="{{ data.control }}"
				data-gs-x="{{ data.x }}"
				data-gs-y="{{ data.y }}"
				data-gs-width="{{ data.width }}"
				data-df-width="{{ data.width }}"
				data-gs-height="1"
			>
				<div class="item-tooltip" data-section="{{ data.section }}">{{ data.name }}</div>
				<div class="grid-stack-item-content">
					<span class="qiupid--cb-item-name" data-section="{{ data.section }}">{{ data.name }}</span>
					<span class="qiupid--cb-item-remove qiupid-cb-icon"></span>
					<span class="qiupid--cb-item-setting qiupid-cb-icon" data-section="{{ data.section }}"></span>
				</div>
			</div>
		</script>

		<?php
	}

}

/**
 * Alias of class Qiupid_Customize_Layout_Builder
 *
 * @see Qiupid_Customize_Layout_Builder
 *
 * @return Qiupid_Customize_Layout_Builder
 */
function Qiupid_Customize_Layout_Builder() {
	return Qiupid_Customize_Layout_Builder::get_instance();
}
