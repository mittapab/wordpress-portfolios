<?php

require_once(plugin_dir_path(__FILE__)."/database.php");
require_once(plugin_dir_path(__FILE__)."/templates/pg-form.php");
require_once(plugin_dir_path(__FILE__)."/templates/admin-manage.php");

function addScriptsPgRegisterFront(){
  wp_enqueue_style( "pg-regis-style", plugins_url()."/pg-register-member/assets/css/style.css", array(), "1.0");
  wp_enqueue_style('bootstrap-multisite' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',array(), '1.0');
  wp_enqueue_style('data-table-multisite' , '//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css',array(), '1.0');
  wp_enqueue_style('font-awesom' , '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',array(), '1.0');
  wp_enqueue_style('font-kanit' , '//fonts.googleapis.com/css2?family=Kanit&display=swap',array(), '1.0');
  
  wp_enqueue_script('data-table-multisite-script' , '///cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js' , array() , '1.0.0' , true);
  wp_enqueue_script('bootstrap-multisite-script' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' , array() , '1.0.0' , true);
  // wp_enqueue_script('main-script' , plugins_url().'/pg-register-member/assets/js/main.js' , array('jquery') , '1.0.0' , true);
 }

add_action('wp_enqueue_scripts','addScriptsPgRegisterFront');



function addScriptsPgRegister(){
  wp_enqueue_style( "pg-regis-style", plugins_url()."/pg-register-member/assets/css/style.css", array(), "1.0");
  wp_enqueue_style('bootstrap-multisite' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',array(), '1.0');
  wp_enqueue_style('data-table-multisite' , '//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css',array(), '1.0');
  wp_enqueue_style('font-awesom' , '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',array(), '1.0');
  wp_enqueue_style('font-kanit' , '//fonts.googleapis.com/css2?family=Kanit&display=swap',array(), '1.0');
  
  wp_enqueue_script('data-table-multisite-script' , '///cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js' , array() , '1.0.0' , true);
  wp_enqueue_script('bootstrap-multisite-script' , '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' , array() , '1.0.0' , true);
  wp_enqueue_script('main-script' , plugins_url().'/pg-register-member/assets/js/main.js' , array('jquery') , '1.0.0' , true);
 }

add_action('admin_enqueue_scripts','addScriptsPgRegister');

function delete_member($id){
  global $wpdb;
  $table = "pg_regsiter_member";
  $delete_member = $wpdb->delete($table , array("c_regis_id" => $id));
  echo("<script>location.href = '".admin_url( '/admin.php?page=mrgt-all' )."'</script>");
  exit;

}

function edit_member($id){
  global $wpdb;
  $table = "pg_regsiter_member";
  $query_prepare = $wpdb->prepare("SELECT * FROM  $table WHERE c_regis_id='".$id."'");
  $result = $wpdb->get_results($query_prepare);

  return json_decode(json_encode($result), true);
}

