<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WC_Settings_Custom_Tab' ) ) :

class WC_Settings_Custom_Tab extends WC_Settings_Page {

    public function __construct() {
        $this->id    = 'linenotify';
        $this->label = __('Line notify', 'woocommerce');

        add_filter('woocommerce_settings_tabs_array', array($this, 'add_settings_page'), 20);
        add_action('woocommerce_settings_' . $this->id, array($this, 'output'));
        add_action('woocommerce_settings_save_' . $this->id, array($this, 'save'));
    }

    public function get_settings() {
        $settings = array(
            'section_title' => array(
                'name'     => __( 'Token Line notify Settings', 'woocommerce' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'custom_text_file_settings'
            ),
            'text_file_upload' => array(
                'name' => __( 'Token', 'woocommerce' ),
                'type' => 'text',
                'id'   => 'custom_text_file_upload',
                'desc' => __( 'setting token line notify.', 'woocommerce' ),
                'default' => '',
                'desc_tip' => true,
            ),
            'section_end' => array(
                'type' => 'sectionend',
                'id'   => 'custom_text_file_settings'
            )
        );

        return apply_filters('woocommerce_get_settings_' . $this->id, $settings);
    }

    public function output() {
        $settings = $this->get_settings();
        WC_Admin_Settings::output_fields($settings);

        wp_nonce_field('wc_settings_save_custom_tab', 'wc_custom_tab_nonce');
    }

    public function save() {
        
        if ( !isset($_POST['wc_custom_tab_nonce']) || !wp_verify_nonce($_POST['wc_custom_tab_nonce'], 'wc_settings_save_custom_tab') ) {
            wp_die(__('Nonce verification failed.', 'woocommerce'));
        }

        $settings = $this->get_settings();
        WC_Admin_Settings::save_fields($settings);
    }
}

return new WC_Settings_Custom_Tab();

endif;
