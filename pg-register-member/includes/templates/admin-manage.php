<?php
require_once(plugin_dir_path(__FILE__)."/table-data.php");
require_once(plugin_dir_path(__FILE__).'/export-excel.php');

 function admin_menu_regiser(){
    add_menu_page( "Member-regiser", "All Register","manage_options", "mrgt-all", "mrgt_all_data","dashicons-groups");
   //  add_submenu_page("mrgt-all", "Export Report" ,"Export Report", "manage_options" ,"mrgt-report", "mrgt_report");
}

 function mrgt_all_data(){
    show_register_data();
 }

 function mrgt_report(){  exportExcel(); }

 add_action('admin_menu' , 'admin_menu_regiser');