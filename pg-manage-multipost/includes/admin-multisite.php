<?php
require_once(plugin_dir_path(__FILE__).'/templates/all-site.php');
require_once(plugin_dir_path(__FILE__).'/templates/edit-site.php');
require_once(plugin_dir_path(__FILE__).'/templates/add-site.php');


function admin_menu_multisite(){

    add_menu_page("Manage Multi Post", "Multi Site Post ", 'manage_options', "mtsp-all", "mtsp_options_content" ,"dashicons-admin-site-alt2");
    add_submenu_page( "mtsp-all", "Add Site", "Add site APi ", "manage_options",  "mtsp-add", "mtsp_add_content" );
    add_submenu_page( "mtsp-all", "Setting", "Settings ", "manage_options",  "mtsp-setting", "mtsp_setting_content" );
   
}

function mtsp_options_content(){


    if(isset($_GET['id']) &&!empty($_GET['id']) && $_GET['type'] == 'delete'){
        
        $id = $_GET['id'];
        delete_site_mtsp($id);
        
    }else if(isset($_GET['id']) &&!empty($_GET['id']) && $_GET['type'] == 'edit'){

        $data = update_site_mtsp($_GET['id']);
        template_edit($data);

    }else{ 
        
        show_all_data_mtsp(); 
    }

}

function mtsp_add_content(){

    mtsp_add_site();
    template_add();
 }


 function mtsp_setting_content(){

}


add_action('admin_menu' , 'admin_menu_multisite');

