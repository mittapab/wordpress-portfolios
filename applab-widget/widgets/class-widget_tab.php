<?php
/**
 * Widget Template class.
 *
 * @category   Class
 * @package    ElementorDevbank
 * @subpackage WordPress
 * @author     Mittapab Tiawsenghuad <mittapabt2536@gmaill.com>
 * @copyright  2022  Mittapab Tiawsenghuad
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link()
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorWidgetTemplate\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Base_UI_Control;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class WidgetTab extends Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
        
        //add style
		wp_register_style( 'widgettemplate', plugins_url( '/assets/css/style.css', ELEMENTOR_WT), array(), '1.0.0' );
	}

	
	public function get_name() {
		return 'altab template';
	}

	public function get_title() {
		return __( 'App Lab Tab Widget', 'elementor-alw' );
	}

	
	public function get_icon() {
		return ' eicon-gallery-grid';
	}

	
	public function get_categories() {
		return array( 'general' );
	}
	
	
	public function get_style_depends() {
		return array( 'Widget-Template' );
	}

	
	protected function _register_controls() {
        $this->start_controls_section(
            'section_tabs',
            [
                'label' => __( 'App Lab Tabs', 'text-domain' ),
            ]
        );
    
        $repeater = new \Elementor\Repeater(); // ใช้ copy ซ้ำ
    
        $repeater->add_control(
            'tab_title',
            [
                'label' => __( 'Tab Title', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab Title' , 'text-domain' ),
                'label_block' => true,
            ]
        );
    
        $repeater->add_control(
            'tab_content',
            [
                'label' => __( 'Tab Content', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Tab Content' , 'text-domain' ),
                'show_label' => false,
            ]
        );
    
        $this->add_control(
            'tabs',
            [
                'label' => __( 'Tabs', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => __( 'Tab #1', 'text-domain' ),
                        'tab_content' => __( 'Tab content #1', 'text-domain' ),
                    ],
                    [
                        'tab_title' => __( 'Tab #2', 'text-domain' ),
                        'tab_content' => __( 'Tab content #2', 'text-domain' ),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );
    
        $this->end_controls_section();
    }
    
	
	protected function render() {

        $settings = $this->get_settings();
        $list_items = $settings['tabs']; //  key name tabs

   
        if(isset($settings['tabs'])){
		$list_items = $settings['tabs'];

        foreach ( $list_items as $item ) {
            echo $item['tab_title'];
          }
        }

		?>
    <section class="py-5" id="features">
        <div class="container-lg">
  
        </div>
      </section>

<?php
	}

	protected function _content_template() {
        ?>
        <div class="custom-tabs">
            <div class="tabs-nav">
                <# if ( settings.tabs.length ) { #>
                    <ul>
                        <# _.each( settings.tabs, function( tab, index ) { #>
                            <li><a href="#tab{{ index + 1 }}">{{{ tab.tab_title }}}</a></li>
                        <# }); #>
                    </ul>
                <# } #>
            </div>
    
            <# if ( settings.tabs.length ) { #>
                <# _.each( settings.tabs, function( tab, index ) { #>
                    <div id="tab{{ index + 1 }}" class="tabcontent">
                        {{{ tab.tab_content }}}
                    </div>
                <# }); #>
            <# } #>
        </div>
        <?php
    }
    
	

}

// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new WidgetFeatures() );