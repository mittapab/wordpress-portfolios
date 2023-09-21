<?php
/**
 * Plugin name: Ems Tracking
 * Description: ระบบติดตามเลขพัสดุจากไปรษณีย์ไทย
 * Author: Mr. Mittapab tiawsenghuad
 * Version: 1.0
 */

 if(!defined('ABSPATH')) exit;

 require_once(plugin_dir_path(__FILE__).'/includes/functions.php');
 require_once(plugin_dir_path(__FILE__).'/includes/Emstracking-Widget.php');
 require_once(plugin_dir_path(__FILE__).'/includes/shortcode.php');

 function register_ems_tracking_widget(){
    
    register_widget("Emstracking_Widget");
 }

 add_action('widgets_init' , 'register_ems_tracking_widget');