<?php
require_once(plugin_dir_path(__FILE__)."/table-data.php");
require_once(plugin_dir_path(__FILE__).'/member-edit.php');


function admin_menu_regiser(){
    add_menu_page( "Member-regiser", "All Register","manage_options", "mrgt-all", "mrgt_all_data","dashicons-groups");
}

 function mrgt_all_data(){

   if(isset($_GET['id']) &&!empty($_GET['id']) && isset($_GET['type']) && checkTextField($_GET['type']) == 'delete'){
        
      $id = checkTextField($_GET['id']);
      delete_member($id);
      
  }else if(isset($_GET['id']) &&!empty($_GET['id']) && isset($_GET['type']) && checkTextField($_GET['type']) == 'edit'){

      $data = edit_member(checkTextField($_GET['id']));
      member_update($data);

  }else{ 
      
   show_register_data();
  }
  
 }

 add_action('admin_menu' , 'admin_menu_regiser');