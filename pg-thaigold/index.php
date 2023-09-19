<?php
/**
 * Plugin name: Thai Gold
 * Description: Show Price Thai gold
 * Author: Mr.Mittapab Tiawsenghuad
 * Version:1.0
 */

 if(!defined("ABSPATH")) exit;

 require_once(plugin_dir_path(__FILE__).'/includes/functions.php');
 require_once(plugin_dir_path(__FILE__).'/includes/Thaigold-Widget.php');
 require_once(plugin_dir_path(__FILE__).'/includes/thaigold.php');

 function regsiter_thaigold_widget(){
     
    register_widget("Thaigold_Widget");
 }  

 add_action('widgets_init' , 'regsiter_thaigold_widget');