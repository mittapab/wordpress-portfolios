<?php
/**
 * Plugin name: Manage-multipost
 * Description: บริหารจัดการ post ในหลายๆไซต์พร้อมกัน
 * Author: Mr. Mittapab tiawsenghuad
 * Version: 1.0
 */

 if(!defined('ABSPATH')) exit;

 require_once(plugin_dir_path(__FILE__).'/includes/multi-database.php');
 require_once(plugin_dir_path(__FILE__).'/includes/admin-multisite.php');
 require_once(plugin_dir_path(__FILE__).'/includes/functions.php');
 require_once(plugin_dir_path(__FILE__).'/includes/send-postother.php');