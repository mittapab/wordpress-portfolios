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


class WidgetFeatures extends Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
        
        //add style
		wp_register_style( 'widgettemplate', plugins_url( '/assets/css/widget-template.css', ELEMENTOR_WT), array(), '1.0.0' );
	}

	
	public function get_name() {
		return 'feature template';
	}

	public function get_title() {
		return __( 'App Lab Feature', 'elementor-alw' );
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
			'section_content',
			array(
				'label' => __( 'Features Genaral Sections', 'elementor-alw' ),
			)
		);

		$this->add_control(
			'feature_title',
			array(
				'label'   => __( 'feature title', 'elementor-alw' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'feature', 'elementor-alw' ),
			)
		);

        $this->add_control(
            'feature_description',
            array(
                'label' => __('feature description' , 'elementor-alw'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __( 'Increase productivity with a simple to-do app. app for <br/>managing your personal budgets.', 'elementor-alw' )
            )
        );

        $this->add_control(
            'image_feature',
            [
                'label' => __( 'Feature Image', 'elementor-alw' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();
        	
		$this->start_controls_section(
			'section_content_service_feature',
			array(
				'label' => __( 'Features Service Sections', 'elementor-alw' ),
			)
		);


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'fts_title',
            [
                'label' => __( 'feature service Title', 'elementor-alw' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab Title' , 'text-domain' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'fts_title_color',
            [
                'label' => __( 'feature service Color Title', 'elementor-alw' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .your-tab-class' => 'color: {{VALUE}}',
                ],
            ]
        );
    
        $repeater->add_control(
            'fts_content',
            [
                'label' => __( 'feature service Content', 'elementor-alw' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Tab Content' , 'text-domain' ),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'fts_icon',
            [
                'label' => __( 'feature service icon', 'elementor-alw' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        

        $this->add_control(
            'tabs_feature_service',
            [
                'label' => __( 'Tabs', 'elementor-alw' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'fts_title' => __( 'Tab #1', 'elementor-alw' ),
                        'fts_content' => __( 'Tab content #1', 'elementor-alw' ),
                    ],
                   
                ],
                'title_field' => '{{{ fts_title }}}',
            ]
        );

        $this->end_controls_section();




        $this->start_controls_section(
            'section_tab_style',
            [
                'label' => __( 'Tab', 'plugin-domain' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'tab_color',
            [
                'label' => __( 'Color', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .your-tab-class' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_typography',
                'label' => __( 'Typography', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .your-tab-class',
            ]
        );

        // $this->add_control(
        //     'example_typography',
        //     [
        //         'label' => __( 'Typography', 'plugin-domain' ),
        //         'type' => \Elementor\Controls_Manager::FONT,
        //         'default' => [
        //             'family' => 'Default',
        //             'weight' => '400',
        //             'text_transform' => 'None',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'font_weight',
        //     [
        //         'label' => __( 'Font Weight', 'plugin-domain' ),
        //         'type' => \Elementor\Controls_Manager::SELECT,
        //         'options' => [
        //             '400' => 'Regular',
        //             '700' => 'Bold',
        //             // สามารถเพิ่มตัวเลือกเพิ่มเติมตามต้องการ
        //         ],
        //         'default' => '400', // ตั้งค่าตามต้องการ
        //     ]
        // );
        
        $this->end_controls_section();
    
	}

	
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'feature_title', 'advanced' );
        $this->add_inline_editing_attributes('feature_description' , 'advanced');
        $this->add_inline_editing_attributes('image_feature' , 'advanced');
	    $list_items = $settings['tabs_feature_service']; //  key name tabs
		?>
    <section class="py-5" id="features">
        <div class="container-lg">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start"><img class="img-fluid" src="<?php echo  $settings['image_feature']['url']; ?>" width="550" alt="" /></div>
            <div class="col-md-7 col-lg-6 px-sm-5 px-md-0">
              <h6 class="fw-bold fs-4 display-3 lh-sm"><?php  echo $settings['feature_title'];  ?></h6>
              <p class="my-4"><?php  echo $settings['feature_description'];  ?></p>
              <?php    
                if(isset($settings['tabs_feature_service'])){
                    $list_items = $settings['tabs_feature_service'];
            
                    foreach ( $list_items as $item ) {   ?>
                       <div class="d-flex align-items-center mb-5">
                            <div><img class="img-fluid" src="<?php echo  $item['fts_icon']['url']; ?>" width="90" alt="" /></div> 
                            <div class="px-4">
                                <h5 class="fw-bold" style="color: <?php  echo $item['fts_title_color'];  ?>"><?php echo  $item['fts_title']; ?></h5>
                                <p> <?php echo $item['fts_content'];?></p>
                            </div>
                      </div>
                   <?php   
             
                }
            }
             ?>

              </div>
            </div>
          </div>
        </div>
      </section>

<?php
	}

	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'feature_title', 'none' );
		#>
		<h2 {{{ view.getRenderAttributeString( 'feature_title' ) }}}>{{{ settings.feature_title }}}</h2>
		<?php
	}

	

}

// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new WidgetFeatures() );