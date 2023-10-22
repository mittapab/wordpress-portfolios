<?php

namespace ElementorWidgetTemplate;

use \Elementor\Plugin;
use \Elementor\Widgets_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

class Widgets {


	private static $instance = null;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function include_widgets_files() {
		require_once 'widgets/class-widget_template.php';
		require_once 'widgets/class-widget_features.php';
		require_once 'widgets/class-widget_tab.php';
	}

	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();

		// Register the plugin widget classes.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\WidgetTemplate());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\WidgetFeatures());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\WidgetTab());
	}

	
	public function __construct() {
		// Register the widgets.
	   add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
      

	}
}


Widgets::instance();