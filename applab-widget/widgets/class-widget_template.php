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

/**
 * Awesomesauce widget class.
 *
 * @since 1.0.0
 */
class WidgetTemplate extends Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'widgettemplate', plugins_url( '/assets/css/style.css', ELEMENTOR_WT), array(), '1.0.0' );
	}

	public function get_name() {
		return 'widget template';
	}

	public function get_title() {
		return __( 'Custom Widget', 'elementor-alw' );
	}


	public function get_icon() {
		return 'eicon-elementor-circle';
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
				'label' => __( 'Partner', 'elementor-alw' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-alw' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'elementor-alw' ),
			)
		);

		$this->add_control(
            'image_partner_01',
            [
                'label' => __( 'Choose Image', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'advanced' );
		$this->add_inline_editing_attributes( 'image_partner_01', 'advanced' );
		// $this->add_inline_editing_attributes( 'description', 'basic' );
		// $this->add_inline_editing_attributes( 'content', 'advanced' );

		?>

        <section class="py-7">

        <div class="container">
        <div class="row">
            <div class="col-12 mx-auto align-items-center text-center">
            <p class="mb-4" <?php echo $this->get_render_attribute_string( 'title' ); ?>> <?php echo wp_kses( $settings['title'], array() ); ?></p>
            </div>
        </div>
        <div class="row align-items-center justify-content-center justify-content-lg-around">
            <!-- <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img src="<?php echo $settings['image_partner_01']['url']?>" alt="" /></div> -->
			<div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img src="<?php echo get_theme_file_uri('/public/assets/img/gallery/company-1.png');?>" alt="" /></div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img src="<?php echo get_theme_file_uri('/public/assets/img/gallery/company-2.png');?>" alt="" /></div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img src="<?php echo get_theme_file_uri('/public/assets/img/gallery/company-3.png');?>" alt="" /></div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img src="<?php echo get_theme_file_uri('/public/assets/img/gallery/company-4.png');?>" alt="" /></div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-2 px-md-0 mb-5 mb-lg-0 text-center"><img src="<?php echo get_theme_file_uri('/public/assets/img/gallery/company-1.png');?>" alt="" /></div>
        </div>
     </div>
</section>
<?php
	}

     protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'title', 'none' );
		#>
		<h2 {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</h2>
		<img src="{{ settings.image.url }}">
		<?php
	}

}

// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new WidgetTemplate() );