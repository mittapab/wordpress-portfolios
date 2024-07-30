<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Wc_setting_status_tab' ) ) :

    class Wc_setting_status_tab extends WC_Settings_Page{
        public function __construct() {
            $this->id = 'status_order';
            $this->label = __('Status Order', 'woocommerce');
            add_filter('woocommerce_settings_tabs_array', array($this, 'add_settings_page'), 20);
            add_action('woocommerce_settings_' . $this->id, array($this, 'output'));
            add_action('woocommerce_settings_save_' . $this->id, array($this, 'save'));
        }

        public function get_settings() {
            $settings = array(
                'section_title' => array(
                    'name'     => __( 'Show notify status', 'woocommerce' ),
                    'type'     => 'title',
                    'desc'     => '',
                    'id'       => 'status_order_check'
                ),
                'custom_checkbox_1' => array(
                    'name' => __( 'Status', 'woocommerce' ),
                    'type' => 'checkbox',
                    'id'   => 'custom_checkbox_1',
                    'desc' => __( 'On Hold', 'woocommerce' ),
                    'default' => 'no',
                ),
                'custom_checkbox_2' => array(
                  
                    'type' => 'checkbox',
                    'id'   => 'custom_checkbox_2',
                    'desc' => __( 'Process', 'woocommerce' ),
                    'default' => 'no',
                ),
                'custom_checkbox_3' => array(
                 
                    'type' => 'checkbox',
                    'id'   => 'custom_checkbox_3',
                    'desc' => __( 'Cancle', 'woocommerce' ),
                    'default' => 'no',
                ),
                'section_end' => array(
                    'type' => 'sectionend',
                    'id'   => 'status_order_check'
                )
            );
    
            return apply_filters('woocommerce_get_settings_' . $this->id, $settings);
        }
    
        public function output() {
            $settings = $this->get_settings();
            WC_Admin_Settings::output_fields($settings);
        }
    
        public function save() {
            $settings = $this->get_settings();
            WC_Admin_Settings::save_fields($settings);
        }
    }


    return new Wc_setting_status_tab();

endif;